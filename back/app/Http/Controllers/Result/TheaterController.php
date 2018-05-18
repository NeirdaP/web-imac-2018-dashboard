<?php

namespace App\Http\Controllers\Result;

use DB;
use Validator;
use App\Model\Theater;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class TheaterController extends Controller{

	public function __construct(Theater $theater){
		$this->theater = $theater;
	}

	public function store(Request $request){
		$validator = Validator::make($request->all(), [
			'name' => 'required'
		]);
		if ($validator->fails()) {
            return redirect('cinemas');
        }
        $theater = new $this->theater;
        $theater->name = $request->input('name');
        $theater->address = $request->input('address');
        $theater->postalCode = $request->input('postalCode');
        $theater->latitude = $request->input('latitude');
        $theater->longitude = $request->input('longitude');
        $theater->numberOfSeat = $request->input('numberOfSeat');
        $theater->numberOfRoom = $request->input('numberOfRoom');
        $theater->artHouse = $request->input('artHouse');
        $theater->save();

        return redirect()->route('cinemas');
	}

	public function update(Request $request, $id){
        $theater = $this->theater->query()->find($id);
        if (!empty($request->input('name'))){
	        $theater->name = $request->input('name');
        }
        if (!empty($request->input('address'))){
	        $theater->address = $request->input('address');
        }
        if (!empty($request->input('postalCode'))){
	        $theater->postalCode = $request->input('postalCode');
        }
        if (!empty($request->input('latitude'))){
        	$theater->latitude = $request->input('latitude');
        } 
        if (!empty($request->input('longitude'))){
	        $theater->longitude = $request->input('longitude');
        }
        if (!empty($request->input('numberOfSeat'))){
	        $theater->numberOfSeat = $request->input('numberOfSeat');
        }
        if (!empty($request->input('numberOfRoom'))){
	        $theater->numberOfRoom = $request->input('numberOfRoom');
        }
        if (!empty($request->input('artHouse'))){
	        $theater->artHouse = $request->input('artHouse');
        }
        $theater->save();

        return redirect()->route('cinemas');
	}

	public function destroy($id){
		$this->theater->query()->findOrFail($id)->delete();
		return redirect()->route('cinemas');
	}

	public function getTheater($id)
	{
		try {
			$jsonResponse = array();
			$theater = Theater::find($id);

			if (!$theater){
				return redirect()->route('cinemas');
			}

			/* Theater Informations */
			$jsonResponse["name"] = $theater["name"];
			$jsonResponse["address"] = $theater["address"];
			$jsonResponse["postalCode"] = $theater["postalCode"];
			$jsonResponse["numberOfRoom"] = $theater["numberOfRoom"];
			$jsonResponse["numberOfSeat"] = $theater["numberOfSeat"];

			//$theater->movies;

			/* Actors/Actresses Informations */
			$actor = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->join('actors', 'movies.id', '=', 'actors.movie_id')
				->join('casts', 'actors.cast_id', '=', 'casts.id')
				->select(DB::raw("count(*) as actorsNumber"))
				->where('sex', 'M')
				->where('theaters.id',$id)
				->first();
			$actress = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->join('actors', 'movies.id', '=', 'actors.movie_id')
				->join('casts', 'actors.cast_id', '=', 'casts.id')
				->select(DB::raw("count(*) as actressesNumber"))
				->where('sex', 'F')
				->where('theaters.id',$id)
				->first();
			$jsonResponse["actors"] = $actor["actorsNumber"];
			$jsonResponse["actresses"] = $actress["actressesNumber"];
			
			/* Directors/Directresses Informations */
			$director = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->join('directors', 'movies.id', '=', 'directors.movie_id')
				->join('casts', 'directors.cast_id', '=', 'casts.id')
				->select(DB::raw("count(*) as directorNumber"))
				->where('sex', 'M')
				->where('theaters.id',$id)
				->first();
			$directress = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->join('directors', 'movies.id', '=', 'directors.movie_id')
				->join('casts', 'directors.cast_id', '=', 'casts.id')
				->select(DB::raw("count(*) as directressNumber"))
				->where('sex', 'F')
				->where('theaters.id',$id)
				->first();
			$jsonResponse["directors"] = $director["directorNumber"];
			$jsonResponse["directresses"] = $directress["directressNumber"];

			/* Colorimetry percentage */
			$color = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->select(DB::raw("count(*) as colorNumber"))
				->where('blackAndWhite', '0')
				->where('theaters.id', $id)
				->first();
			$blackAndWhite = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->select(DB::raw("count(*) as blackAndWhiteNumber"))
				->where('blackAndWhite', '1')
				->where('theaters.id', $id)
				->first();
			$jsonResponse["color"] = $color["colorNumber"];
			$jsonResponse["blackAndWhite"] = $blackAndWhite["blackAndWhiteNumber"];

			/* Number of movie per genre */
			$genres = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->join('genre_movie', 'movies.id', '=', 'genre_movie.movie_id')
				->join('genres', 'genre_movie.genre_id', '=', 'genres.id')
				->select('genres.name', DB::raw('count(*) as genreNumber'))
				->where('theaters.id',$id)
				->groupBy('genres.name')
				->get();
			$jsonResponse["genres"] = $genres;

			/* Number of movie per nationality */
			$nationalities = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->join('nationalities', 'movies.nationalities', '=', 'nationalities.countryCode')
				->select('nationalities.countryName', DB::raw('count(*) as countryNumber'))
				->where('theaters.id',$id)
				->groupBy('nationalities.countryName')
				->get();
			$jsonResponse["nationalities"] = $nationalities;

			return response()->json($jsonResponse, 200);

		} catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
	}
}

?>

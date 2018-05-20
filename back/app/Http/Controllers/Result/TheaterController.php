<?php

namespace App\Http\Controllers\Result;

use DB;
use Validator;
use App\Model\Theater;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class TheaterController extends Controller {

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

			/* Actors/Actresses Informations */
			$actorsInformation = $this->getActorsInfo($theater);
			$jsonResponse["actors"] = $actorsInformation['actors'];
			$jsonResponse["actresses"] = $actorsInformation['actresses'];
		
			/* Directors/Directresses Informations */
			$directorsInformation = $this->getDirectorsInfo($theater);
			$jsonResponse["directors"] = $directorsInformation['directors'];
			$jsonResponse["directresses"] = $directorsInformation['directresses'];

			/* Colorimetry percentage */
			$colorimetryInformation = $this->getColorimetryInfo($theater);
			$jsonResponse["blackAndWhite"] = $colorimetryInformation['blackAndWhite'];
			$jsonResponse["color"] = $colorimetryInformation['color'];

			/* Number of movie per genre */
			$jsonResponse["genres"] =  $this->getGenresInfo($id);

			/* Number of movie per nationality */
			$jsonResponse["nationalities"] = $this->getNationalitiesInfo($id);

			return response()->json($jsonResponse, 200);

		} catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
	}

	/* 
	 * Return the distribution between male and female actors within the movies 
	 * displayed in the theater 
	*/
	public function getActorsInfo($theater){
		$response = array();
		$total = 0;
		$male = 0;
		$female = 0;
		foreach ($theater->movies as $movie){
			foreach($movie->actors as $actor){
				$total++;
				$male += ($actor['sex'] == 'M') ? 1 : 0;
				$female += ($actor['sex'] == 'F') ? 1 : 0;
			}
		}
		if ($total == 0){
			$response["actors"] = 0;
			$response["actresses"] = 0;
		} else {
			$response["actors"] = ($male*100)/$total;
			$response["actresses"] = ($female*100)/$total;
		}
		return $response;
	}

	/* 
	 * Return the distribution between male and female directors within the movies 
	 * displayed in the theater 
	*/
	public function getDirectorsInfo($theater){
		$response = array();
		$total = 0;
		$male = 0;
		$female = 0;
		foreach ($theater->movies as $movie){
			foreach($movie->directors as $directors){
				$total++;
				$male += ($directors['sex'] == 'M') ? 1 : 0;
				$female += ($directors['sex'] == 'F') ? 1 : 0;
			}
		}
		if ($total == 0){
			$response["directors"] = 0;
			$response["directresses"] = 0;
		} else {
			$response["directors"] = ($male*100)/$total;
			$response["directresses"] = ($female*100)/$total;
		}
		return $response;
	}

	/* 
	 * Return the distribution between colored and black and white movies 
	 * displayed in the theater 
	*/
	public function getColorimetryInfo($theater){
		$response = array();
		$total = 0;
		$BnW = 0;
		$colored = 0;
		foreach($theater->movies as $movie){
			$total++;
			$BnW += ($movie['blackAndWhite'] == 1)? 1 : 0;
			$colored += ($movie['blackAndWhite'] == 0)? 1 : 0;
		}
		if ($total == 0){
			$response["blackAndWhite"] = 0;
			$response["color"] = 0;
		} else {
			$response["blackAndWhite"] = ($BnW*100)/$total;
			$response["color"] = ($colored*100)/$total;
		}
		return $response;
	}

	/*
	 * Return the distribution of genres within the movies displayed in the theater
	*/
	public function getGenresInfo($id){
		$genres = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->join('genre_movie', 'movies.id', '=', 'genre_movie.movie_id')
				->join('genres', 'genre_movie.genre_id', '=', 'genres.id')
				->select('genres.name', DB::raw('count(*) as genreNumber'))
				->where('theaters.id',$id)
				->groupBy('genres.name')
				->get();
		return $genres;
	}

	/*
	 * Return the distribution of nationalities within the movies displayed in the 
	 * theater
	*/
	public function getNationalitiesInfo($id){
		$nationalities = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
				->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
				->join('nationalities', 'movies.nationalities', '=', 'nationalities.countryCode')
				->select('nationalities.countryName', DB::raw('count(*) as countryNumber'))
				->where('theaters.id',$id)
				->groupBy('nationalities.countryName')
				->get();
		return $nationalities;
	}

}
?>

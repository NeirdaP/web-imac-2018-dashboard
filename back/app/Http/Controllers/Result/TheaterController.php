<?php

namespace App\Http\Controllers\Result;

use DB;
use App\Model\Theater;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class TheaterController extends Controller{

	public function getTheater($id)
	{
		$jsonResponse = array();
		$theater = Theater::find($id);

		$jsonResponse["name"] = $theater["name"];
		$jsonResponse["address"] = $theater["address"];
		$jsonResponse["postalCode"] = $theater["postalCode"];
		$jsonResponse["numberOfRoom"] = $theater["numberOfRoom"];
		$jsonResponse["numberOfSeat"] = $theater["numberOfSeat"];

		$theater->movies;

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

		$genres = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
			->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
			->join('genre_movie', 'movies.id', '=', 'genre_movie.movie_id')
			->join('genres', 'genre_movie.genre_id', '=', 'genres.id')
			->select('genres.name', DB::raw('count(*) as genreNumber'))
			->where('theaters.id',$id)
			->groupBy('genres.name')
			->get();
		$jsonResponse["genres"] = $genres;

		$nationalities = Theater::join('movie_theater', 'theaters.id', '=', 'movie_theater.theater_id')
			->join('movies', 'movie_theater.movie_id', '=', 'movies.id')
			->join('nationalities', 'movies.nationalities', '=', 'nationalities.countryCode')
			->select('nationalities.countryName', DB::raw('count(*) as countryNumber'))
			->where('theaters.id',$id)
			->groupBy('nationalities.countryName')
			->get();
		$jsonResponse["nationalities"] = $nationalities;

		return response()->json($jsonResponse, 200);
	}

/* Get the best team */
/*
	public function getBestTeam(){
		$team = Team::join('match_team', 'teams.id', '=', 'match_team.team_id')
			->where('match_team.winner', 1)
			->select('id', 'name', DB::raw('count(*) as victories_count') )
			->orderBy("victories_count", 'desc')
			->first();
		$nb_match = Match::join('match_team', 'matches.id', '=', 'match_team.match_id')
			->join('teams', 'teams.id', '=', 'match_team.team_id')
			->where('teams.id',$team->id)
			->select(DB::raw('count(*) as nb_match'))
			->get();
		return response()->json([
			"id" => $team->id,
			"name" => $team->name,
			"victories_count" => $team->victories_count,
			"nb_match" => $nb_match,
			"players" => $team->players
		]);
	}
*/

}

?>

<?php

namespace App\Http\Controllers\Result;

use DB;
use App\Model\Movie;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class MovieController extends Controller {

	public function getMovie($id)
	{
		$movie = Movie::find($id);
		$movie->actors;
		$movie->directors;
		return response()->json($movie, 200);
	}

}

?>

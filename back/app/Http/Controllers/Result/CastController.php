<?php

namespace App\Http\Controllers\Result;

use DB;
use App\Model\Cast;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class CastController extends Controller {

	public function getCast($id)
	{
		$cast = Cast::find($id);
		$cast->moviesAsActor;
		$cast->movieAsDirector;
		return response()->json($cast, 200);
	}

}

?>

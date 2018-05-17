<?php

namespace App\Http\Controllers\Result;

use DB;
use App\Model\Theater;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class ResultController extends Controller{

	public function getTheater($id)
	{
		$theater = Theater::find($id);
		return response()->json($theater, 200);
	}

}

?>

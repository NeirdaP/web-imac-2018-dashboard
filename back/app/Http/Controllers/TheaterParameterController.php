<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use appHttpControllers\Controller;

class TheaterParameterController extends Controller
{
    /* 
     * Parse the parameters in the URL and store it in an array for the search 
     */
    public function getSearchTheaterParameters(Request $request){
        $where = array();
        if ($request->has('keyword')){
            $strings = explode(" ",$request->input('keyword'));
            foreach($strings as $str){
                array_push($where, [DB::raw('LOWER(name)'),"LIKE","%".strtolower($str)."%"]);
            }
        }
        if ($request->has('screens')){
            $strings = explode(",",$request->input('screens'));
            if (sizeof($strings) != 2){
                return "Invalid number of arguments for parameter screens";
            } else {
                array_push($where, ["numberOfRoom",">=",$strings[0]]);
                array_push($where, ["numberOfRoom","<=",$strings[1]]);
            }
        }
        if ($request->has('seats')){
            $strings = explode(",",$request->input('seats'));
            if (sizeof($strings) != 2){
                return "Invalid number of arguments for parameter seats";
            } else {
                array_push($where, ["numberOfSeat",">=",$strings[0]]);
                array_push($where, ["numberOfSeat","<=",$strings[1]]);
            }
        }
        return $where;
    }
}

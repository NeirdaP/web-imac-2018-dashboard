<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /* 
     * Search the theaters in the database
     * If a least one parameter is given, the method will try to search with it
     * If no parameters are given, the methos will return all the theaters in the database
     */
    public function searchTheater(Request $request){
        try {
            $select = array(
                        'name', 
                        'latitude', 
                        'longitude', 
                        'numberOfSeat', 
                        'numberOfRoom as numberOfScreen', 
                        'artHouse'
                    );
            $where = HomePage::getSearchTheaterParameters($request);
            $whereFlag = (empty($where))? 0 : 1;
            if (!$whereFlag){
                $jsonResponse = DB::table('theater')
                    ->select($select)
                    ->get();
            } else {
                $jsonResponse = DB::table('theater')
                    ->select($select)
                    ->where($where)                        
                    ->get();
            }
            return response()->json($jsonResponse);   
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }

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

    /*
    * Return the maximum and the minimum number of seats in the database
    */
    public function getSeats()
    {
        try {
            $jsonResponse = DB::table('theater')
                ->select(DB::raw('
                    min(numberOfSeat) as min, 
                    max(numberOfSeat) as max
                    '))
                ->get();
            return response()->json($jsonResponse);
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }

    /*
    * Return the maximum and the minimum number of rooms/screens in the database
    */
    public function getScreens()
    {
        try {
            $jsonResponse = DB::table('theater')
                ->select(DB::raw('
                    min(numberOfRoom) as min, 
                    max(numberOfRoom) as max
                    '))
                ->get();
            return response()->json($jsonResponse);
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }

    /*
    * Return the theater entry corresponding to the $id in the database
    */
    public function searchTeatherWithID($id)
    {
        try {
            $jsonResponse = DB::table('theater')
                ->select(
                    'name', 
                    'latitude', 
                    'longitude', 
                    'numberOfSeat', 
                    'numberOfRoom as numberOfScreen', 
                    'artHouse'
                    )
                -> where('id', '=', $id)
                ->get();
            return response()->json($jsonResponse);
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }
}
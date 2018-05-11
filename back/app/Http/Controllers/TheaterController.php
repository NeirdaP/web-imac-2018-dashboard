<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use appHttpControllers\Controller;

class TheaterController extends Controller
{
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

}

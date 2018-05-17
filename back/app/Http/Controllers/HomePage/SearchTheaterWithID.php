<?php

namespace App\Http\Controllers\HomePage;

use DB;
use Laravel\Lumen\Routing\Controller;

class searchTheaterWithID extends Controller
{
    /*
    * Return the theater entry corresponding to the $id in the database
    */
    public function searchTheaterWithID($id)
    {
        try {
            $jsonResponse = DB::table('theaters')
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

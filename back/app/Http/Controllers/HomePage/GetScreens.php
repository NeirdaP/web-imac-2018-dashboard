<?php

namespace App\Http\Controllers\HomePage;

use DB;
use Laravel\Lumen\Routing\Controller;

class GetScreens extends Controller
{
    /*
    * Return the maximum and the minimum number of rooms/screens in the database
    */
    public function getScreens()
    {
        try {
            $jsonResponse = DB::table('theaters')
                ->select(DB::raw('
                    min(numberOfRoom) as min, 
                    max(numberOfRoom) as max
                    '))
                ->get();
            return response()->json($jsonResponse, 200);
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }
}

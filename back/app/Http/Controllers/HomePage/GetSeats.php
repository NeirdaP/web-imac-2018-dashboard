<?php

namespace App\Http\Controllers\HomePage;

use DB;
use Laravel\Lumen\Routing\Controller;

class GetSeats extends Controller
{
   /*
    * Return the maximum and the minimum number of seats in the database
    */
    
    public function getSeats()
        {
            try {
                $jsonResponse = DB::table('theaters')
                    ->select(DB::raw('
                        min(numberOfSeat) as min, 
                        max(numberOfSeat) as max
                        '))
                    ->get();
                return response()->json($jsonResponse, 200);
            } catch (\Exception $e) {
                die("Could not connect to the database.  Please check your configuration.");
            }
        }
    
}

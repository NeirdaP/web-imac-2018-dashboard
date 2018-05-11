<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use app\Http\Request;       ??? est-ce que ça sert a qqch?
use app\Http\Controllers\Controller;

class SeatController extends Controller
{
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
    
}

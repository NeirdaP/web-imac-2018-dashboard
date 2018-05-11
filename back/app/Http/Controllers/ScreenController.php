<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use appHttpControllers\Controller;

class ScreenController extends Controller
{
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
}

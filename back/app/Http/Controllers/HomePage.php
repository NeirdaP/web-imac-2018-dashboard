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

    /* Return all the theater in database */
    public function allTheater()
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
                ->get();
            return response()->json($jsonResponse);
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }

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
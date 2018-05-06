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

    /* Testing Query Builder & JSON response */
    public function test()
    {
        
        // Test database connection
        try {
            $jsonResponse = DB::table('theater')
                ->join('frequenting', 'theater.id', '=', 'frequenting.idTheater')
                ->select(DB::raw('
                    name, 
                    latitude, 
                    longitude, 
                    numberOfSeat, 
                    numberOfRoom as numberOfScreen, 
                    artHouse,
                    sum(numbersOfEntries) as frequentation
                    '))
                ->groupBy('name')
                ->get();
                

            return response()->json($jsonResponse);

        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
        
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

    public function searchTeatherWithKeyword($string)
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
                -> where('name', 'like', '%'.$string.'%')
                ->get();
            return response()->json($jsonResponse);
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }

    public function searchTeatherWithSeats($min, $max)
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
                -> where([
                    ['numberOfSeat', '>=', $min],
                    ['numberOfSeat', '<=', $max],
                ])
                ->get();
            return response()->json($jsonResponse);
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }

    public function searchTheaterWithScreens($min, $max)
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
                -> where([
                    ['numberOfRoom', '>=', $min],
                    ['numberOfRoom', '<=', $max],
                ])
                ->get();
            return response()->json($jsonResponse);
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }
    }
    
}
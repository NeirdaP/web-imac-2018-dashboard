<?php

namespace App\Http\Controllers;

use DB;

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

    public function start()
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

    //
}
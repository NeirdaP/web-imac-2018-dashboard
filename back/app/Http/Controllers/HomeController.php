<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use app\Http\Controllers\Controller;

use app\Http\Controllers\ScreenController;
use app\Http\Controllers\SeatController;
use app\Http\Controllers\TheaterController;
use app\Http\Controllers\TheaterWithIdController;
use app\Http\Controllers\TheaterParameterController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        get('/seats', 'SeatController@getSeats');
        get('/screens', 'ScreenController@getScreens');
        get('/theater/{request????}', 'TheaterController@searchTheater');
        get('/theater/parameter/{request????}', 'TheaterParameterController@getSearchTheaterParameters');
        get('/theater/{id}', 'TheaterWithIdController@searchTheaterWithId')->where('id','[min-max]+');   
    }


    
}
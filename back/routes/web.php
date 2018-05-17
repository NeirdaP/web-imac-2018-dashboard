<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/* HomePage route : */

$router->get('/', function(){
	return redirect()->route('cinemas');
});

$router->get('/cinemas', [
	'as' => 'cinemas', 'uses' => 'HomePage\SearchTheater@searchTheater'
]);

$router->get('/seats', 'HomePage\GetSeats@getSeats');

$router->get('/screens', 'HomePage\GetScreens@getScreens');

$router->get('/cinema/{id:[0-9]+}', 'HomePage\SearchTheaterWithID@searchTheaterWithID');

/* Result route */

$router->get('/cast/{id:[0-9]+}', 'Result\CastController@getCast');

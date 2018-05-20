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

/* HomePage routes : */
/*
* route to the homepage
*/
$router->get('/', function(){
	return redirect()->route('cinemas');
});

/*
* return a list of theaters
*/
$router->get('/cinemas', [
	'as' => 'cinemas', 'uses' => 'HomePage\SearchTheater@searchTheater'
]);

/*
* return the minimum and the maximum number of seats
*/
$router->get('/seats', 'HomePage\GetSeats@getSeats');

/*
* return the minimum and the maximum number of screens
*/
$router->get('/screens', 'HomePage\GetScreens@getScreens');

/* Result routes : */
/*
* return all information about the theater
*/
$router->get('/cinema/{id:[0-9]+}', 'Result\TheaterController@getTheater');

/* CRUD for the table Theater (Create, "Read", Update, Delete) : */
/* Create */
$router->post('cinema', 'Result\TheaterController@store');

/* Update */
$router->put('cinema/{id:[0-9]+}', 'Result\TheaterController@update');

/* Delete */
$router->delete('cinema/{id:[0-9]+}', 'Result\TheaterController@destroy');


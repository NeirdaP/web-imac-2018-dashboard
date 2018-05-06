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

$router->get('/', function(){
	return redirect()->route('cinemas');
});

$router->get('/cinemas', [
	'as' => 'cinemas', 'uses' => 'HomePage@allTheater'
]);

$router->get('/seats', 'HomePage@getSeats');

$router->get('/screens', 'HomePage@getScreens');

$router->get('/cinema/{id:[0-9]+}', 'HomePage@searchTeatherWithID');

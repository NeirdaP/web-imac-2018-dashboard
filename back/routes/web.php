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

$router->get('/hello/world', function () {
    // Test database connection
	try {
	    DB::connection()->getPdo();
		return "connected successfully to database ".DB::connection()->getDatabaseName();
		//return $router->app->version();
	} catch (\Exception $e) {
	    die("Could not connect to the database.  Please check your configuration.");
	}
});

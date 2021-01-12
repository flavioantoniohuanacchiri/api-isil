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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get("/user", "UserController@index");
$router->get("/user/{dni}", "UserController@show");
$router->post("/user/{dni}/update", "UserController@update");

$router->get("/business", "BusinessController@index");
$router->get("/business/{number_identifer}", "BusinessController@show");
$router->post("/business/store", "BusinessController@store");
$router->post("/business/{number_identifer}/update", "BusinessController@update");
$router->post("/business/{number_identifer}/destroy", "BusinessController@destroy");
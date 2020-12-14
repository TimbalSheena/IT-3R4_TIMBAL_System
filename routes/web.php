<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'UserController@getUsers']);
   });


$router->get('/users',['uses' => 'UserController@getUsers']);
$router->get('/login', 'UserController@Login');
$router->post('/home', 'UserController@test');

//index
$router->get('/', 'UserController@index');
$router->post('/users', 'UserController@create');
$router->get('/users/{id}', 'UserController@read');
$router->put('/users/{id}', 'UserController@update');
$router->delete('/users/{id}', 'UserController@destroy');

//userjob
$router->get('/usersjob','UserJobController@index');
$router->get('/userjob/{id}','UserJobController@show'); // get user by id
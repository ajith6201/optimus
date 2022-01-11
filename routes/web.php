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

//catgeory routers
$router->get('/category', 'CategoryController@index');
$router->get('/category/{id}', 'CategoryController@singleCategory');
$router->put('/category/{id}', 'CategoryController@updateCategory');
$router->delete('/category/{id}', 'CategoryController@deleteCategory');
$router->post('/category', 'CategoryController@createcategory');
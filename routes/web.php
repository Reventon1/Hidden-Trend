<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\MaterialController;
use App\Models\Material;

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

$router->post('material/{material_id}/edit', 'MaterialController@edit');
$router->get('materials', 'MaterialController@showAll');
$router->post('material/add', 'MaterialController@add');
$router->get('material/{material_id}', 'MaterialController@show');
$router->delete('material/{material_id}/delete', 'MaterialController@delete');

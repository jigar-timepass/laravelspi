<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Snippet for a quick route reference
*/
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function($value, $key) {
        return url($key);
    })->values();   
});

Route::resource('customers', 'CustomerAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('emails', 'EmailAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('phones', 'PhoneAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('pictures', 'PictureAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);
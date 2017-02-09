<?php

use Illuminate\Http\Request;

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
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    route::get('/get/checkLists', 'ChecklistController@index');
    route::post('/crear/checkList', 'ChecklistController@create');

    //Items
    Route::get('/get/items/{id}', 'ItemsController@show');
    Route::post('/agregar/item', 'ItemsController@create');

    //Etapas
    Route::get('/get/etapas/{id}', 'EtapasController@show');
    route::post('/agregar/etapa', 'EtapasController@create');

});




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
    //Usuarios
    Route::get('/get/users', 'UsersController@index');
    Route::get('/get/users/revisores', 'UsersController@getRevisores');
    Route::post('/add/user', 'UsersController@create');

    //Roles
    Route::get('/get/roles', 'RolesController@index');

    //Checklist
    route::get('/get/checkLists', 'ChecklistController@index');
    route::get('/get/checklist/{id}', 'ChecklistController@show');
    route::post('/crear/checkList', 'ChecklistController@create');

    //Items
    Route::get('/get/items/{id}', 'ItemsController@show');
    Route::post('/agregar/item', 'ItemsController@create');

    //AgrupacionesendChecklist
    Route::post('/save/agrupacion', 'AgrupacionController@create');
    Route::get('/get/agrupaciones/{id}', 'AgrupacionController@show');

    //Opciones cumplimiento
    Route::get('/get/opciones/cumplimiento', 'EstadosCumplimientoController@index');

    //Evaluaciones

    Route::get('/get/evaluaciones/{id}', 'EvaluacionesController@show');
    Route::post('/save/evaluacion', 'EvaluacionesController@create');
    Route::post('/get/files', 'EvaluacionesController@files');
    Route::post('/end/checklist', 'EvaluacionesController@end');

    //Bodegas
    Route::get('/bodegas/all', 'BodegasController@index');

    //supervisor
    Route::post('/designar/checklist', 'SupervisorController@create');
    Route::get('/get/estados/checklists', 'SupervisorController@getState');
    Route::get('/get/asignacion/{id}', 'SupervisorController@getAsignacion');
    Route::get('/get/estados/get/checklist/{id}', 'SupervisorController@getChecklist');
    //Revisor
    Route::get('/get/asignaciones', 'RevisorController@index');


});




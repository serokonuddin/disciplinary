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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

});


Route::post('/searchOffence','Api\OffenceController@searchOffence');
Route::post('/searchEmployee','Api\EmployeeController@searchEmployee');
Route::post('/searchPunishment','Api\NatureofPunishmentController@searchPunishmentType');


Route::get('/getDisciplinary/{employee_id}','Api\DisciplinaryController@index');
Route::get('/getDisciplinaryById/{id}','Api\DisciplinaryController@show');
Route::post('/createDisciplinary','Api\DisciplinaryController@store');
Route::put('/updateDisciplinary/{id}','Api\DisciplinaryController@update');
Route::delete('/deleteDisciplinary/{id}','Api\DisciplinaryController@destroy');
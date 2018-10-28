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

Route::get('/projects','ApiController@getProjects');

Route::post('/create_project','ApiController@createProject');

Route::put('/validate/project_name','ApiController@validateProjectName');

Route::delete('/delete/project','ApiController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

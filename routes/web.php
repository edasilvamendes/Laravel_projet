<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

// Index Page (welcome page)
Route::get('/', 'FrontController@index');

// Routing pour les pages formations/stages
Route::get('/formation', 'FrontController@showPostByFormation')->where(['id' => '[0-9]+']);
Route::get('/stage', 'FrontController@showPostByStage')->where(['id' => '[0-9]+']);

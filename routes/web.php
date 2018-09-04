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

// Index Page (welcome page)
Route::get('/', 'FrontController@index');

// Routing pour les pages formations/stages (global)
Route::get('/formation', 'FrontController@showPostByFormation')->where(['id' => '[0-9]+']);
Route::get('/stage', 'FrontController@showPostByStage')->where(['id' => '[0-9]+']);

// Routing pour une page formation/stage (detail)
Route::get('/formation/{id}', 'FrontController@showPostByOneFormation')->where(['id' => '[0-9]+']);
Route::get('/stage/{id}', 'FrontController@showPostByOneStage')->where(['id' => '[0-9]+']);
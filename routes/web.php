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

/***********
*** FRONT ***
***********/
// Index Page (welcome page)
Route::get('/', 'FrontController@index');

// Routing pour les pages formations/stages (global)
Route::get('/formation', 'FrontController@showPostByFormation')->where(['id' => '[0-9]+']);
Route::get('/stage', 'FrontController@showPostByStage')->where(['id' => '[0-9]+']);

// Routing pour une page formation/stage (detail)
Route::get('/formation/{id}', 'FrontController@showPostByOneFormation')->where(['id' => '[0-9]+']);
Route::get('/stage/{id}', 'FrontController@showPostByOneStage')->where(['id' => '[0-9]+']);

// Route autogenere pour l'auth (redirection)
Route::get('/home', 'HomeController@index')->name('home');


/***********
*** BACK ***
***********/
// Routes Sécu | Index Admin
Route::resource('admin/post', 'PostController')->middleware('auth');
// Route destroy login
Route::get('/logout', 'Auth\LoginController@logout');
// SHOW
Route::get('admin/post/{id}', 'PostController@show')->name('post.show'); //Route::get('post/{id}', 'PostController@show')->name('post.show');
// EDIT
Route::get('admin/post/edit/{id}', 'PostController@edit')->name('post.edit'); //Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');

//Auth Routes
Auth::routes();

// Moteur de recherche
Route::get('search', 'FrontController@showResearch')->name('search');

// Page contact
/*
Route::post('/contact', 'OrderController@index')->name('contact');
Route::get('/contact', 'OrderController@ship')->name('contact');
*/

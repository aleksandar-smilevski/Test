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

Route::get('/front', 'FrontController@blog');
Route::get('/front/blog/{url}', 'FrontController@blog_post');
Route::get('/', 'FrontController@index');
Route::get('/test', 'FrontController@test');
Route::get('/welcome', function(){
   return view('welcome');
});
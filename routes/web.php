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

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('items','ApiController@index'); 
Route::get('items/{id}','ApiController@show');
Route::get('items/{column}/{sign}/{value}', 'ApiController@search'); 
Route::get('create', 'ApiController@create'); 
Route::post('store', 'ApiController@store'); 
Route::get('edit/{id}', 'ApiController@edit'); 
Route::post('update', 'ApiController@update');
Route::get('destroy/{id}', 'ApiController@destroy');


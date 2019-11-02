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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/','HomeController@index')->name('index');
Route::post('/add_catch','HomeController@add_catch')->name('add_catch');
Route::get('/editCach/{id}','HomeController@editCach')->name('editCach');
Route::post('/update_catch/{catch_id}','HomeController@update_catch')->name('update_catch');
Route::get('/clientlist','HomeController@clientlist')->name('clientlist');
Route::get('/deleteclient','HomeController@deleteclient')->name('deleteclient');
Route::get('/payrest','HomeController@payrest')->name('payrest');

Auth::routes();

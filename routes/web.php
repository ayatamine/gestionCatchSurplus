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
Route::group(['prefix'=>'admin-cpx'],function(){
      Route::get('/','AdminController@index')->name('admin.index');
      Route::post('/updateSiteSettings','AdminController@updateSiteSettings')->name('updateSiteSettings');
});
Route::get('/benificier','HomeController@index')->name('front.benificier');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

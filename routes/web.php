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
Route::group(['prefix'=>'admin-cpx','middleware'=>['auth','admin']],function(){
      Route::get('/','AdminController@index')->name('admin.index');
      Route::post('/updateSiteSettings','AdminController@updateSiteSettings')->name('updateSiteSettings');
      Route::get('/Beneficiaries','AdminController@Beneficiaries')->name('admin.Beneficiaries');
      Route::post('/addBenificier','AdminController@createBenificier')->name('admin.addBenificier');
      Route::get('/export_excel','AdminController@exportexcel')->name('export_excel.excel');
      Route::get('/import_excel','AdminController@importexcel')->name('import_excel.excel');

      // the login and register of admin
      //Route::get('/register','App\Http\Controllers\Auth\RegisterController@register');
      Route::get('register', '\App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
      Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm');

});
Route::get('/benificiers','HomeController@index')->name('front.benificier');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');

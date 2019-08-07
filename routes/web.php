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
      Route::post('/import_excel','AdminController@importexcel')->name('import_excel.excel');
      Route::get('/Supervisor','AdminController@Supervisorpage')->name('admin.Supervisor');

      // the login and register of admin
      //Route::get('/register','App\Http\Controllers\Auth\RegisterController@register');
      Route::get('register', '\App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
      Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm');
      Route::post('register_supervison', 'AdminController@register_supervison')->name('register_supervison');
      Route::get('/make_admin/{id}', 'AdminController@make_admin')->name('make_admin');

});
Route::get('/benificiers','HomeController@index')->name('front.benificier');
Route::get('/search_benificier','HomeController@search_benificier')->name('front.search_benificier');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'AdminController@index')->name('home');

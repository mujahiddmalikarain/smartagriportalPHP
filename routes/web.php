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

Route::get('/', 'PageController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@home');
Route::get('/materials', 'AdminController@materials');
Route::resource('/booklet','BookletController');
Route::resource('/mvideos','MvideosController');

Route::get('/crops', 'AdminController@crops');
Route::resource('/crop','CropsController');

Route::get('/as_stories', 'AdminController@as_stories');
Route::resource('/as_story','AsStoriesController');

Route::get('/soilHealth', 'AdminController@soilHealth');
Route::resource('/soil_health','SoilHealthController');


Route::resource('/gov_vendor', 'GovorgController');
Route::resource('/training', 'TrainingController');
Route::resource('/loan', 'LoanController');
Route::resource('/tender', 'TenderController');

Route::resource('/fertilizer', 'FertilizerController');
Route::resource('/machinery', 'MachineryController');
Route::resource('/pesticide', 'PesticideController');
Route::resource('/seed', 'SeedController');
Route::resource('/fourm', 'FourmController');
Route::resource('/contact', 'ContactController');


Route::get('/financial', 'LoanController@index');

//Route::get('/gov_vendor', 'GovVendorController@home');
Route::resource('/private_vendor', 'PrivateVendorController');

Route::get('/farmer', 'FarmerController@home');
Route::get('/org/private', 'FarmerController@private');
Route::get('/org/public', 'FarmerController@public');
Route::get('/farmer/booklets', 'FarmerController@booklets');
Route::get('/farmer/mvideos', 'FarmerController@mvideos');
Route::get('/farmer/sstories', 'FarmerController@sstories');
Route::get('/farmer/soilreport', 'FarmerController@soilreport');
Route::get('/farmer/weather', 'FarmerController@weather');
Route::resource('/weather', 'WeatherController');

Route::get('/private_details/{id}', 'FarmerController@private_details');

Route::post('/admin', 'AdminController@changeUserStatus')->name('changeUserStatus');



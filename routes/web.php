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

////////////     SIMPLE ROUTES    ///////////////////

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('home');
Route::post('/update_profile', 'HomeController@updateProfile');


Route::post('/home/user', 'HomeController@showUserInfo')->name('home.userinfo');

////////////     BASIC ROUTES    ///////////////////

Route::get('/economics', 'EconomicsController@index')->name('economics');

Route::get('/statistics', function () {
    return view('statistics.statistics');
});
////////////     BUILDINGS    ///////////////////
Route::get('/buildings/{id}', 'BuildingsController@index');
Route::get('/building_one/{id}', 'BuildingsController@show');
Route::post('/register_building', 'BuildingsController@store');

Route::get('/add_building', function () {
    return view('buildings.add');
});

////////////     MATERIALS    ///////////////////
Route::post('/materials/buy', 'BuildingsController@addMaterial');

////////////     CONTRACTS    ///////////////////
Route::post('/contracts/sign', 'BuildingsController@signContract');

////////////     TASKS    ///////////////////
Route::post('/tasks/add', 'BuildingsController@addTask');
Route::post('/tasks/done', 'PlansController@taskDone');
Route::post('/tasks/delete', 'PlansController@taskDelete');





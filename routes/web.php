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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/user', 'HomeController@showUserInfo')->name('home.userinfo');

Route::get('/economics', 'EconomicsController@index')->name('economics');

Route::get('/statistics', function () {
    return view('statistics.statistics');
});
////////////     BUILDINGS    ///////////////////
Route::get('/buildings', function () {
    return view('buildings.buildings');
});

Route::get('/add_building', function () {
    return view('buildings.add');
});

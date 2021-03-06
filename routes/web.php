<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/mood', 'MoodUpdateController@index')->name('mood.index');
Route::post('/mood', 'MoodUpdateController@store')->name('mood.store');

Route::get('/goals', 'GoalsControler@index')->name('goals.index');
Route::get('/goals/create', 'GoalsControler@create')->name('goals.create');
Route::post('/goals', 'GoalsControler@store')->name('goals.store');

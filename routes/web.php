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
Route::get('/habit/{$id}', 'HabitController@show')->name('habits.show');
Route::post('/habits/create', 'HabitController@store');
Route::put('/habits/{$id}', 'HabitController@update');
Route::post('/habits/{$id}/event/store', 'EventsController@store');
Route::resource('habits','HabitController');
Route::resource('events','EventsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/acasa', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/formular', 'FormController@index')->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
})->middleware('auth');

Route::get('/facultati-favorite', function () {
    return view('favorites');
})->middleware('auth');

Route::get('/intrebari', 'QuestionController@index')->middleware('auth');

Route::get('/admin', 'CountyController@index')->middleware('auth');

Auth::routes(['verify' => true]);

// Route::resource('facultati','CollegeController');

// Route::get('/home', 'HomeController@index')->name('home');



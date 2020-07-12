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

Route::view('/', 'welcome')->middleware('guest');

// TODO: Add the checkForm middleware to this routes
Route::view('/contact', 'contact')->name('contact')->middleware('auth');
Route::view('/facultati-favorite', 'favorites')->name('favorites')->middleware('auth');
Route::get('/intrebari', 'QuestionController@index')->name('questions')->middleware('auth');

Route::get('/form', 'InfoUserController@index')->name('form');
Route::post('/form', 'InfoUserController@store');
Route::resource('facultati', 'CollegeController');
 
//* Admin routes
Route::get('/admin', 'AdminController@index');
Route::get('/admin/profil', 'ProfilController@index');
Route::delete('/admin/profil/{profil}', 'ProfilController@destroy'); 

Auth::routes(['verify' => true]);

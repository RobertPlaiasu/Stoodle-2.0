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
Route::get('/intrebari', 'QuestionController@index')->name('questions')->middleware('auth');

//* Favorites Routes
Route::post('favorite/{college}', 'FavoritesController@favorite');
Route::post('unfavorite/{college}', 'FavoritesController@unFavorite');

Route::get('facultati-favorite', 'InfoUserController@myFavorites')->middleware('auth');

//* Form Routes
Route::get('/form', 'InfoUserController@index')->name('form');
Route::post('/form', 'InfoUserController@store');

//* College routes
Route::resource('facultati', 'CollegeController');
 
//* Admin routes
Route::get('/admin', 'AdminController@index');

//* Passion routes
Route::resource('admin/passion', 'PassionController');

//* Passion type routes
Route::resource('admin/passionType', 'PassionTypeController');

//* Profil routes
Route::resource('admin/profil', 'ProfilController');

//* Profil type routes
Route::resource('admin/profilType', 'ProfilTypeController');

//* Subjects routes
Route::resource('admin/subject', 'SubjectController'); 

//* Subjects type routes
Route::resource('admin/subjectType', 'SubjectTypeController');

//* Book routes
Route::resource('admin/book', 'BookController');

//* University routes
Route::resource('admin/university', 'UniversityController');

//* County routes
Route::resource('admin/county', 'CountyController');

//* Region routes
Route::resource('admin/region', 'RegionController');


Auth::routes(['verify' => true]);

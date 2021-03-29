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

Auth::routes();

Route::get('/', 'FrontController@index')->name('home');
Route::get('/events', 'FrontController@event')->name('event');
Route::get('/news', 'FrontController@news')->name('news');
Route::get('/classes', 'FrontController@classes')->name('classes');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/schedule', 'FrontController@schedule')->name('schedule');
Route::get('/teachers', 'FrontController@teachers')->name('teachers');
Route::get('/contacts', 'FrontController@contacts')->name('contacts');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController')->middleware('can:edit');


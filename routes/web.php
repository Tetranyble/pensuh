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
Route::resource('/events', 'EventController');
Route::resource('/news', 'BlogController');
Route::get('/classes', 'FrontController@classes')->name('classes');
Route::get('/about', 'FrontController@about')->name('about');
Route::Resource('/schedules', 'ScheduleController');
Route::get('/teachers', 'FrontController@teachers')->name('teachers');
Route::get('/contact', 'FrontController@contacts')->name('contact');
Route::resource('/contacts', 'ContactController');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('users', 'UsersController');
Route::resource('courses', 'CourseController');
Route::resource('admissions', 'AdmissionController');
Route::resource('syllabi', 'SyllabusController');
Route::resource('teachers', 'TeacherController');
Route::resource('roles', 'RolesController')->middleware('can:edit');


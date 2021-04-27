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
Route::resource('students', 'StudentController');
Route::resource('teachers', 'TeacherController');
Route::resource('attendances', 'AttendanceController');

Route::resource('roles', 'RolesController')->middleware('can:edit');
Route::group([ 'prefix' => 'console', 'namespace' => 'Console', 'middleware' => 'auth'], function(){
    Route::resource('schools', 'SchoolController');
    Route::get('courses/{teacher}', 'TeacherCourseController@index')->name('teacher.courses');
    Route::get('grades/{teacher}', 'GradesController@index')->name('grades.course');

    Route::resource('staff', 'StaffController');
});
Route::group([ 'prefix' => 'setup', 'namespace' => 'Administration'], function(){
    Route::get('admin/create', 'AdminController@create')->name('admin.create');
    Route::post('admin/store', 'AdminController@store')->name('admin.store');

    Route::resource('classes', 'ClassManagerController');
    Route::resource('sections', 'SectionManagerController');

    Route::get('teacher/create', 'TeacherOnboardingController@create')->name('teacher.create');
    Route::post('teacher/store', 'TeacherOnboardingController@store')->name('teacher.store');
});

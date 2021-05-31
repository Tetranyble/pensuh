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
Route::impersonate();
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
Route::resource('qrcodes', 'QrcodeController');
Route::resource('galleries', 'GalleryController');


Route::resource('roles', 'RolesController')->middleware('can:edit');

//user identity controller
Route::get('identifies/{user}', 'UserIdentityController@show')->name('identifies.show');


Route::group([ 'prefix' => 'console', 'namespace' => 'Console', 'middleware' => 'auth'], function(){
    Route::resource('schools', 'SchoolController');
    Route::resource('student', 'StudentOnboardingController');
    Route::get('courses/{teacher}', 'TeacherCourseController@index')->name('teacher.courses');

    Route::get('grades/{teacher}', 'GradesController@index')->name('grades.course');

    Route::resource('staff', 'StaffController');
    Route::resource('report', 'ReportCardManagerController');
    Route::resource('comments', 'ReportCardCommentController');
    Route::resource('psychometrics', 'PsychologicalRatingController');

    Route::post('students/import', 'StudentImportController@import')->name('students.import');
    Route::post('staff/import', 'StaffImportController@import')->name('staff.import');
    //Grade Manager and master sheets
    Route::resource('mastersheets', 'GradeManagerController');
});


Route::group([ 'prefix' => 'setup', 'namespace' => 'Administration','middleware' => 'auth', 'name' => 'setup'], function(){
    Route::get('admin/create', 'AdminController@create')->name('admin.create');
    Route::post('admin/store', 'AdminController@store')->name('admin.store');

    Route::get('sections/courses', 'SectionCourseController@index')->name('sections.courses');
    Route::resource('class', 'ClassManagerController');
    Route::resource('sections', 'SectionManagerController');
    Route::resource('course', 'CourseManagerController');



    Route::get('teacher/create', 'TeacherOnboardingController@create')->name('teacher.create');
    Route::post('teacher/store', 'TeacherOnboardingController@store')->name('teacher.store');
});
Route::group([ 'middleware' => 'auth'], function(){
    Route::resource('grades', 'GradeController');
    Route::resource('reports', 'ReportCardController');
    Route::resource('fees', 'FeeController');
    Route::resource('exams', 'ExamController');
    Route::put('exams/publish/{exam}', 'PublishExamController@update')->name('exams.publish');
    Route::resource('academics', 'AcademicCalendarController');
});
//Route::middleware(['auth', 'admin'])->prefix('academic')->name('academic.')->group(function () {});

Route::middleware(['auth'])->prefix('master')->namespace('Console')->group(function(){

    Route::resource('schools', 'SchoolController');
    Route::post('impersonates/enter', 'ImpersonateUserController@impersonate')->name('impersonates.enter');
//    Route::get('impersonates/leave', 'ImpersonateUserController@impersonate')->name('impersonates.leave');
    Route::get('users', 'SystemUsersController@index')->name('system.users');
});

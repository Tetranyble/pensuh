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
/**
 * Schools routes
 */

use App\Services\Schools;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\InitializeStoreByDomainOrSubdomain;
use App\Http\Middleware\PreventAccessFromStoreDomain;


Route::middleware([
    'web',
    PreventAccessFromStoreDomain::class,
    InitializeStoreByDomainOrSubdomain::class,
])->group(function () {
    Auth::routes(['verify' => true]);
    Route::impersonate();
    Route::get('/tenant', function (Schools $schools){
        dd($schools->school());
    });
    Route::get('/', 'FrontController@index')->name('home');
    Route::get('/legal', 'FrontController@termsOfService')->name('legal');
    Route::resource('/events', 'EventController');
    Route::resource('/news', 'BlogController');
    Route::get('/classes', 'FrontController@classes')->name('classes');
    Route::get('/about', 'FrontController@about')->name('about');
    Route::Resource('/schedules', 'ScheduleController');
//    Route::get('/teachers', 'FrontController@teachers')->name('teachers');
    Route::get('/contact', 'FrontController@contacts')->name('contact');
    Route::resource('/contacts', 'ContactController');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('users', 'UsersController');
    Route::resource('courses', 'CourseController');
    Route::resource('admissions', 'AdmissionController');
    Route::resource('syllabi', 'SyllabusController');
    Route::resource('students', 'StudentController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('reports', 'ReportCardController');
    Route::get('/profilesettings', 'ProfileSettingController@index')->name('profilesettings.index');
    Route::patch('/profilesettings/{user}', 'ProfileSettingController@changePassword')->name('profilesettings.password')->middleware('auth');
    Route::get('attendances/automatic', 'AutomaticAttendanceController@create')->name('attendances.automatic')->middleware('auth');
    Route::post('attendances/automatic', 'AutomaticAttendanceController@store')->name('attendances.automatics')->middleware('auth');
    Route::resource('attendances', 'AttendanceController');
    Route::resource('receipts', 'ReceiptController')->middleware('auth');
    Route::resource('transactions', 'TransactionController')->middleware('auth');

    Route::resource('qrcodes', 'QrcodeController');
    Route::resource('galleries', 'GalleryController');
    Route::resource('signatures', 'SignatureController')->middleware('auth');

    Route::resource('roles', 'RolesController')->middleware('can:edit');

//user identity controller
    Route::get('identifies/{user}', 'UserIdentityController@show')->name('identifies.show');


    Route::group(['prefix' => 'console', 'namespace' => 'Console', 'middleware' => 'auth'], function () {
        Route::resource('schools', 'SchoolController');
        Route::resource('student', 'StudentOnboardingController');
        Route::get('courses/{teacher}', 'TeacherCourseController@index')->name('teacher.courses');

        Route::get('grades/{teacher}', 'GradesController@index')->name('grades.course');

        Route::resource('staff', 'StaffController');
        Route::resource('report', 'ReportCardManagerController');
        Route::resource('download_reports', 'GenerateReportController');
        Route::resource('comments', 'ReportCardCommentController');
        Route::resource('psychometrics', 'PsychologicalRatingController');

        Route::post('students/import', 'StudentImportController@import')->name('students.import');
        Route::post('staff/import', 'StaffImportController@import')->name('staff.import');
        //Grade Manager and master sheets
        Route::resource('mastersheets', 'GradeManagerController');
        Route::get('cards/students', 'IdentityCardController@students')->name('cards.students');
        Route::get('cards/teachers', 'IdentityCardController@teachers')->name('cards.teachers');
    });

// sectup namespace route
    Route::group(['prefix' => 'setup', 'namespace' => 'Administration', 'middleware' => 'auth', 'name' => 'setup'], function () {
        Route::get('admin/create', 'AdminController@create')->name('admin.create');
        Route::post('admin/store', 'AdminController@store')->name('admin.store');

        Route::get('sections/courses', 'SectionCourseController@index')->name('sections.courses');
        Route::resource('class', 'ClassManagerController');
        Route::resource('sections', 'SectionManagerController');
        Route::resource('course', 'CourseManagerController');


        Route::get('teacher/create', 'TeacherOnboardingController@create')->name('teacher.create');
        Route::post('teacher/store', 'TeacherOnboardingController@store')->name('teacher.store');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('grades', 'GradeController');
        Route::resource('reports', 'ReportCardController');
        Route::resource('fees', 'FeeController');
        Route::resource('exams', 'ExamController');
        Route::put('exams/publish/{exam}', 'PublishExamController@update')->name('exams.publish');
        Route::resource('academics', 'AcademicCalendarController');
    });
//Route::middleware(['auth', 'admin'])->prefix('academic')->name('academic.')->group(function () {});

    Route::middleware(['auth'])->prefix('master')->namespace('Console')->group(function () {
        Route::resource('favicons', 'FaviconController');
        Route::resource('schools', 'SchoolController');
        Route::post('impersonates/enter', 'ImpersonateUserController@impersonate')->name('impersonates.enter');
//    Route::get('impersonates/leave', 'ImpersonateUserController@impersonate')->name('impersonates.leave');
        Route::get('users', 'SystemUsersController@index')->name('system.users');
        Route::get('users/create', 'SystemUsersController@create')->name('system.users.create');
        Route::post('users', 'SystemUsersController@store')->name('system.users.store');
    });
    Route::get('/reset', function (){
       $grades = \App\Grade::where('report_card_id', '>=', 228)->where('report_card_id', '<=', 262)->get();
       dd($grades);
    });
});

<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Classes;
use App\Course;
use App\Event;
use App\Services\SchoolManager;
use App\Services\Schools;
use App\User;

class FrontController extends Controller
{
    protected $schools;
    public function __construct(SchoolManager $schools)
    {
        $this->schools = $schools;
    }

    public function index( Schools $schools ){
        $events = Event::whereSchoolId($schools->id())->limit(3)->get();
        $courses = Course::whereSchoolId($schools->id())->limit(8)->get();
        $teachers = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->where('school_id',$schools->id())->limit(4)->get();
        $blogs = Blog::whereSchoolId($schools->id())->limit(3)->get();
        return view('frontend.home', compact( 'events', 'courses', 'teachers', 'blogs'));
    }

    public function news(){
        return 'no implementation';
    }
    public function event(){
        return 'no implementation';
    }
    public function about(Schools $schools){
        $courses = Course::whereSchoolId($schools->id())->get()->take(8);
        return view('frontend.about', compact( 'courses'));
    }
    public function classes(){
        return 'no implementation';
    }
    public function schedule(){
        return 'no implementation';
    }
    public function teachers(){
        return 'no implementation';
    }
    public function contacts(){
        return view('frontend.contact');
    }
    public function termsOfService(){

        return view('frontend.pensuh.terms_conditions');
    }

}

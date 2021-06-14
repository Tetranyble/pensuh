<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Classes;
use App\Contact;
use App\Course;
use App\Event;
use App\School;
use App\Services\Schools;
use App\User;

class FrontController extends Controller
{
    protected $schools;
    public function __construct(Schools $schools)
    {
        $this->schools = $schools;
    }

    public function index(){
        if($this->schools->school()->school_name == 'pensuh'){
            return view('frontend.pensuh.index');
        }
        $events = Event::whereSchoolId($this->schools->id())->limit(3)->get();
        $courses = Course::whereSchoolId($this->schools->id())->limit(8)->get();
        $teachers = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->where('school_id',$this->schools->id())->limit(4)->get();
        $blogs = Blog::whereSchoolId($this->schools->id())->limit(3)->get();
        $classes = Classes::whereSchoolId($this->schools->id())->get();
        return view('frontend.home', compact( 'events', 'courses', 'teachers', 'blogs', 'classes'));
    }

    public function news(){
        return 'no implementation';
    }
    public function event(){
        return 'no implementation';
    }
    public function about(){
        $courses = Course::whereSchoolId($this->schools->id())->get()->take(8);
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

}

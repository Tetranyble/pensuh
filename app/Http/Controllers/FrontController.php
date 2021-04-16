<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Classes;
use App\Contact;
use App\Course;
use App\Event;
use App\School;
use App\User;

class FrontController extends Controller
{
    public function index(){
        $events = Event::limit(3)->get();
        $courses = Course::limit(8)->get();
        $teachers = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->limit(4)->get();
        $blogs = Blog::limit(3)->get();
        $classes = Classes::get();
        return view('frontend.home', compact( 'events', 'courses', 'teachers', 'blogs', 'classes'));
    }

    public function news(){
        return 'no implementation';
    }
    public function event(){
        return 'no implementation';
    }
    public function about(){
        $courses = Course::get()->take(8);
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

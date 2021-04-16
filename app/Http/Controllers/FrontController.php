<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Course;
use App\Event;
use App\School;
use App\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $home = School::first();
        $events = Event::limit(3)->get();
        $courses = Course::limit(8)->get();
        $teachers = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->limit(4)->get();
        $blogs = Blog::limit(3)->get();
        return view('frontend.home', compact('home', 'events', 'courses', 'teachers', 'blogs'));
    }

    public function news(){
        return 'no implementation';
    }
    public function event(){
        return 'no implementation';
    }
    public function about(){
        $home = School::first();
        $courses = Course::get()->take(8);
        return view('frontend.about', compact('home', 'courses'));
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
        $home = School::first();
        return view('frontend.contact', compact('home'));
    }
}

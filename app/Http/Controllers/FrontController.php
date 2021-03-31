<?php

namespace App\Http\Controllers;

use App\Event;
use App\School;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $home = School::first();
        $events = Event::limit(3)->get();
        return view('frontend.home', compact('home', 'events'));
    }

    public function news(){
        return 'no implementation';
    }
    public function event(){
        return 'no implementation';
    }
    public function about(){
        $home = School::first();
        return view('frontend.about', compact('home'));
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
        return 'no implementation';
    }
}

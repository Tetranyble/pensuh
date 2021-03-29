<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $home = School::first();
        return view('frontend.home', compact('home'));
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

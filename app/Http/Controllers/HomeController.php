<?php

namespace App\Http\Controllers;

use App\Classes;
use App\School;
use App\Section;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teacher = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->count();
        $student = User::whereHas("roles", function($q){ $q->where("name", "student"); })->count();
        $class = Classes::count();
        $section = Section::count();
        return view('dashboard.index', compact('teacher', 'student', 'class', 'section'));
    }
}

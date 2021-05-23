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

        if (auth()->user()->roles->flatten()->pluck('slug')->contains('master')){
            $teacher = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->count();
            $student = User::whereHas("roles", function($q){ $q->where("name", "student"); })->count();
            $class = Classes::count();
            $section = Section::count();
        }else {
            $school = auth()->user()->school->id;
            $teacher = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->where('school_id', $school)->count();
            $student = User::whereHas("roles", function($q){ $q->where("name", "student"); })->where('school_id', $school)->count();
            $class = Classes::whereSchoolId($school)->count();
            $section = Section::whereSchoolId($school)->count();
        }


        return view('dashboard.index', compact('teacher', 'student', 'class', 'section'));
    }
}

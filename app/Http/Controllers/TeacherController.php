<?php

namespace App\Http\Controllers;

use App\School;
use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = School::first();
        $teachers = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->paginate();
        return view('frontend.teachers', compact('teachers', 'home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        $home = School::first();
        $teachers = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->paginate();
        return view('frontend.teacher', compact('teacher', 'home', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $teacher)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        //
    }
}

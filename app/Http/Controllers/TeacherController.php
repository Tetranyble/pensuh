<?php

namespace App\Http\Controllers;

use App\School;
use App\Services\Schools;
use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $schools;

    public function __construct(Schools $schools)
    {
        $this->schools = $schools;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->where('school_id', $this->schools->id())->paginate();
        return view('frontend.teachers', compact('teachers'));
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
        $teachers = User::whereHas("roles", function($q){ $q->where("name", "teacher"); })->where('school_id', $this->schools->id())->paginate();
        return view('frontend.teacher', compact('teacher', 'teachers'));
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

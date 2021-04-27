<?php

namespace App\Http\Controllers\Administration;

use App\Classes;
use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Section;
use App\User;
use Illuminate\Http\Request;

class SectionManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::where('school_id', auth()->user()->school_id)->get();
        $formteachers = User::where('school_id', auth()->user()->school_id)->whereHas("roles", function($q){ $q->where("name", "form_teacher"); })->get();
        $teachers = User::where('school_id', auth()->user()->school_id)->whereHas("roles", function($q){ $q->where("name", "teacher"); })->paginate();
        $departments = Department::all();
        return view('dashboard.section.create', compact('classes', 'formteachers', 'teachers', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {
        Section::create($request->except('_token'));
        return redirect()->back()->with('success', 'section created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}

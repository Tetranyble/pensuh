<?php

namespace App\Http\Controllers\Administration;

use App\Classes;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Section;
use App\User;
use Illuminate\Http\Request;

class SectionManagerController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::whereSchoolId(auth()->user()->school->id)->paginate(20);
        return view('dashboard.section.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = auth()->user()->school->id;
        $classes = Classes::where('school_id', $school)->get();
        $formteachers = User::where('school_id', $school)->whereHas("roles", function($q){ $q->where("slug", "form_teacher"); })->get();
        $teachers = User::where('school_id', $school)->whereHas("roles", function($q){ $q->where("name", "teacher"); })->get();
        return view('dashboard.section.create', compact('classes', 'formteachers', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {

        Section::create($request->except(['_token','class']));
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
        $section = Section::with(['formTeacher', 'classes'])->whereId($section->id)->first();
        return response()->json([
            'data' => $section
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreSectionRequest $request
     * @param \App\Section $section
     * @param $id
     * @return void
     */
    public function edit(Section $section)
    {
        $school = auth()->user()->school->id;
        $classes = Classes::where('school_id', $school)->get();
        $formteachers = User::where('school_id', $school)->whereHas("roles", function($q){ $q->where("slug", "form_teacher"); })->get();
        $teachers = User::where('school_id', $school)->whereHas("roles", function($q){ $q->where("name", "teacher"); })->get();
        return view('dashboard.section.edit', compact('classes', 'formteachers', 'teachers', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreSectionRequest $request
     * @param \App\Section $section
     * @param $id
     * @return void
     */
    public function update(StoreSectionRequest $request, Section $section)
    {
        $section->fill($request->all())->save();
        return redirect()->back()->with('success', 'section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {

    }
}

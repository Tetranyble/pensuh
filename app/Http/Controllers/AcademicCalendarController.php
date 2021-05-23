<?php

namespace App\Http\Controllers;

use App\AcademicCalendar;
use App\Http\Requests\StoreAcademicCalendarRequest;
use App\Session;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
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
        $academics = AcademicCalendar::with('session')->whereSchoolId(auth()->user()->school->id)->latest()->paginate(20);
        return view('dashboard.academicCalendar.index', compact('academics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessions = Session::whereSchoolId(auth()->user()->school->id)->get();
        return view('dashboard.academicCalendar.create', compact('sessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcademicCalendarRequest $request)
    {
        $a = AcademicCalendar::where('active', 1)->where('school_id', auth()->user()->school->id)->first();
        if($a){
            $a->active = 0;
            $a->save();
        }
        AcademicCalendar::create($request->all());
        return back()->with('success', 'academic calendar saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicCalendar  $academicCalendar
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicCalendar $academic)
    {
        return view('dashboard.academicCalendar.show', compact('academic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicCalendar  $academicCalendar
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicCalendar $academic)
    {
        $sessions = Session::whereSchoolId(auth()->user()->school->id)->get();
        return view('dashboard.academicCalendar.edit', compact('sessions', 'academic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicCalendar  $academicCalendar
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAcademicCalendarRequest $request, AcademicCalendar $academic)
    {
        $academic->fill($request->all())->save();
        return redirect()->route('academics.index')->with('success', 'exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicCalendar  $academicCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicCalendar $academic)
    {
        //
    }
}

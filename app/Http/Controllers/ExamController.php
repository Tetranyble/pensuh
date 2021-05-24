<?php

namespace App\Http\Controllers;

use App\AcademicCalendar;
use App\Exam;
use App\Http\Requests\StoreExamRequest;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::whereSchoolId(auth()->user()->school->id)->latest()->paginate(20);
        return view('dashboard.exam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calendars = AcademicCalendar::whereSchoolId(auth()->user()->school->id)->get();
        return view('dashboard.exam.create', compact('calendars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        $e = Exam::where('school_id', $request->school_id)->where('active', 1)->first();
        if ($e){
            $e->active = 0;
            $e->save();
        }
        Exam::create($request->all());
        return back()->with('success', 'exam save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $calendars = AcademicCalendar::whereSchoolId(auth()->user()->school->id)->get();
        return view('dashboard.exam.edit', compact('exam', 'calendars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExamRequest $request, Exam $exam)
    {
        $exam->fill($request->all())->save();
        return redirect()->route('exams.index')->with('success', 'exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {

    }
}

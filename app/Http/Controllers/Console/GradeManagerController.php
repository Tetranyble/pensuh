<?php

namespace App\Http\Controllers\Console;

use App\Exam;
use App\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\GradeManagerRequest;
use App\Services\ReportCard\GradeService;
use Illuminate\Http\Request;

class GradeManagerController extends Controller
{
    protected $gradeService;

    public function __construct(GradeService $gradeService)
    {
        $this->middleware('auth');
        $this->gradeService = $gradeService;
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradeManagerRequest $request)
    {
        $exam = $this->gradeService->schoolExam();
        $gradeSystemName = $this->gradeService->getCourseGradeSystemName($request->course_id);
        $gradeSystemByName = $this->gradeService->getGradeSystemByname($gradeSystemName);
        $this->gradeService->setGradeSystem($gradeSystemByName);
        $this->gradeService->masterSheet($request, $exam);
        return redirect()->route('grades.index', ['c' => $request->course_id, 'e' => $exam->id])->with('success', 'Master sheet generated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}

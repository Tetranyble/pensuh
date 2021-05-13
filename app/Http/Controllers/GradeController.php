<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Traits\AssignGrade;
use App\Services\ReportCard\GradeService;
use Illuminate\Http\Request;


class GradeController extends Controller
{
    use AssignGrade;
    protected $gradeService;

    /**
     * GradeController constructor.
     * @param GradeService $gradeService
     */
    public function __construct(GradeService $gradeService)
    {
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
    public function create(Request $request)
    {
        $exam = $this->gradeService->schoolExam();
        $this->giveGrade($request->get('t'), $request->get('c'), $exam->id, $request->get('s'));
        $grades = $this->gradeService->gradeWithCourseAndStudent($request->get('c'),$exam->id);
        $gradesystems = $this->gradeService->getGradeSystemBySchoolId($grades);
        return view('dashboard.grade.update', ['grades' => $grades,'request' => $request->all(), 'gradesystems' => $gradesystems]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        $gradeSystem = $this->gradeService->getGradeSystemByname($request->grade_system_name);
        $this->gradeService->setGradeSystem($gradeSystem);
        $this->gradeService->update($request);
        return back()->with('success', __('saved successfully'));
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

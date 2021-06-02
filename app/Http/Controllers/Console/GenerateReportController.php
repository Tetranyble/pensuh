<?php

namespace App\Http\Controllers\Console;

use App\Fee;
use App\GradeSystem;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportCardManagerRequest;
use App\Http\Traits\GenerateReportCard;
use App\ReportCard;
use App\Services\ReportCard\GradeService;
use App\Services\ReportCardService;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Knp\Snappy\Pdf;

class GenerateReportController extends Controller
{
    use GenerateReportCard;
    protected $gradeService;
    protected $reportCardService;
    public function __construct(GradeService $gradeService, ReportCardService $reportCardService)
    {
        $this->middleware('auth');
        $this->gradeService = $gradeService;
        $this->reportCardService = $reportCardService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReportCardManagerRequest $request)
    {
        $results = '';
        $reports = $this->reportCardService->getReportCardWithGradeStudentSchoolExam($request->section, $request->exam_id);

        foreach ($reports as $key => $report){

            $gradeSystem = GradeSystem::where('name',$report->grade[0]->course->grade_system_name)->where('school_id', auth()->user()->school->id)->get();
            $fees = Fee::where('school_id', auth()->user()->school->id)->where('school_type_id', $report->student->studentInfo->schoolType->id)->orWhere('school_type_id', null)->get();
            $result = View::make('frontend.print.report', compact('report', 'gradeSystem', 'fees'))->render();
            $results = $results.$result;
        }
        $view = View::make('frontend.print.index', compact('results'))->render();
        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML($view);

        return $pdf->stream('results.pdf');
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
     * @param  \App\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function show(ReportCard $reportCard, $report)
    {
        $report = $this->reportCardService->getReportCard($report);
        $gradeSystem = GradeSystem::where('name',$report->grade[0]->course->grade_system_name)->where('school_id', auth()->user()->school->id)->get();
        $fees = Fee::where('school_id', auth()->user()->school->id)->where('school_type_id', $report->student->studentInfo->schoolType->id)->orWhere('school_type_id', null)->get();
        $pdf = PDF::loadView('frontend.print.result', ['report'=> $report, 'gradeSystem'=> $gradeSystem, 'fees'=> $fees])->setPaper('a3', 'landscape');
        $name = $report->student->fullname;
        return $pdf->download($name . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportCard $reportCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportCard $reportCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportCard $reportCard)
    {
        //
    }
}

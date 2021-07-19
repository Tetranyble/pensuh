<?php

namespace App\Http\Controllers;

use App\Fee;
use App\GradeSystem;
use App\Http\Traits\GenerateReportCard;
use App\ReportCard;
use App\Services\ReportCard\GradeService;
use App\Services\ReportCardService;
use Illuminate\Http\Request;

class ReportCardController extends Controller
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
    public function index()
    {
        $reports = ReportCard::whereStudentId(auth()->user()->id)->paginate(10);
        return view('dashboard.reportcard.index', compact('reports'));
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
        dd($report->grade[0]);
        $gradeSystem = GradeSystem::where('name',$report->grade[0]->course->grade_system_name)->where('school_id', auth()->user()->school->id)->get();
        $fees = Fee::where('school_id', auth()->user()->school->id)->where('school_type_id', $report->student->studentInfo->schoolType->id)->orWhere('school_type_id', null)->get();
        return view('dashboard.reportcard.show', compact('report', 'gradeSystem', 'fees'));
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

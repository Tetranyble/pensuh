<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportCardManagerRequest;
use App\Http\Requests\ReportCardManagerUpdateRequest;
use App\Http\Traits\GenerateReportCard;
use App\ReportCard;
use App\Services\ReportCard\GradeService;

use App\Services\ReportCardService;
use Illuminate\Http\Request;

class ReportCardManagerController extends Controller
{
    use GenerateReportCard;
    protected $gradeService;
    protected $reportCardService;
    public function __construct(GradeService $gradeService, ReportCardService $reportCardService)
    {
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
        $reports = $this->reportCardService->reportWithStudent($request->section, $request->exam_id);
        return view('dashboard.reportcard.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ReportCardManagerRequest $request
     * @return void
     */
    public function create(ReportCardManagerRequest $request)
    {
        //$grades = $this->gradeService->getStudentGradeExamination($request->get('c'), $request->exam_id);
        $this->generateReportCard($request->get('section'), $request->get('exam_id'));
        $reports = $this->reportCardService->getReportCards($request->get('section'), $request->get('exam_id'));
        return view('dashboard.reportcard.update', ['reports' => $reports, 'request' => $request->all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportCardManagerUpdateRequest $request)
    {
        $this->reportCardService->update($request);
        return redirect()->route('report.index', ['section' => $request->section, 'exam_id' => $request->exam_id, 'form_teacher' => $request->form_teacher])->with('success', 'report updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ReportCard $reportCard
     * @param $report
     * @return void
     */
    public function show(ReportCard $reportCard, $report)
    {
        $report = $this->reportCardService->getReportCard($report);
        return view('dashboard.reportcard.show', compact('report'));
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

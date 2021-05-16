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
    public function index()
    {
        //
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
        return redirect()->route('sections.index')->with('success', 'report updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function show(ReportCard $reportCard)
    {
        //
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

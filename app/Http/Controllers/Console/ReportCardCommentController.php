<?php

namespace App\Http\Controllers\Console;

use App\Http\Requests\StoreReportCardCommentRequest;
use App\ReportCardComment;
use App\Http\Controllers\Controller;

class ReportCardCommentController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.reportCardComment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportCardCommentRequest $request)
    {
        $record = ReportCardComment::where('report_card_id', $request->report_card_id)->where('user_id', $request->user_id)->where('comment_by', auth()->user()->id)->where('role', $request->role)->first();
        if ($record){
            return redirect()->to($request->redirect)->with('warning', 'comment ignored. you\'ve commented already for the student earlier.');
        }
        ReportCardComment::create($request->all());
        return redirect()->to($request->redirect)->with('success', 'report comment saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportCardComment  $reportCardComment
     * @return \Illuminate\Http\Response
     */
    public function show(ReportCardComment $reportCardComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReportCardComment  $reportCardComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportCardComment $reportCardComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReportCardComment  $reportCardComment
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReportCardCommentRequest $request, ReportCardComment $reportCardComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReportCardComment  $reportCardComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportCardComment $reportCardComment)
    {
        //
    }
}

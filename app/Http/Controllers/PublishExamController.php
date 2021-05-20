<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

class PublishExamController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        $exam->fill($request->only('result_published'))->save();
        return redirect()->route('exams.index')->with('success', 'exam updated successfully');
    }

}

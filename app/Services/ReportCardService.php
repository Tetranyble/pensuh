<?php

namespace App\Services;

use App\Http\Requests\ReportCardManagerUpdateRequest;
use App\ReportCard;

class ReportCardService{


    public function getReportCards($section_id, $exam_id)
    {
        return ReportCard::where('section_id', $section_id)->where('exam_id', $exam_id)->get();
    }

    public function update(ReportCardManagerUpdateRequest $request)
    {
        $reports = $this->reportsByIds($request->id);
        try{
            foreach ($reports as $key => $report){
                $report->punctuality = $request->punctuality[$key];
                $report->attendance = $request->attendance[$key];
                $report->attentiveness = $request->attentiveness[$key];
                $report->initiative = $request->initiative[$key];
                $report->perseverance = $request->perseverance[$key];
                $report->carrying_out_assignment = $request->carrying_out_assignment[$key];
                $report->organisational_ability = $request->organisational_ability[$key];
                $report->neatness = $request->neatness[$key];
                $report->politeness = $request->politeness[$key];
                $report->honesty = $request->honesty[$key];
                $report->self_control = $request->self_control[$key];
                $report->spirit_of_cooperation = $request->spirit_of_cooperation[$key];
                $report->obedience = $request->obedience[$key];
                $report->sense_of_responsibility = $request->sense_of_responsibility[$key];
                $report->public_speaking = $request->public_speaking[$key];
                $report->handling_of_tools = $request->handling_of_tools[$key];
                $report->drawing = $request->drawing[$key];
                $report->handwriting = $request->handwriting[$key];
                $report->painting = $request->painting[$key];
                $report->sculpture = $request->sculpture[$key];
                $report->relationship_with_others = $request->relationship_with_others[$key];
                $report->participation_in_school_arts = $request->participation_in_school_arts[$key];
                //$tbc[] = $tb->attributesToArray();
                $report->save();
            }
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    private function reportsByIds($id)
    {
        return ReportCard::whereIn('id',$id)->get();
    }
}

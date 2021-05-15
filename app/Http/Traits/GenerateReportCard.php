<?php
namespace App\Http\Traits;

use App\AcademicCalendar;
use App\ReportCard;
use App\User;

trait GenerateReportCard {

    public function generateReportCard($gradesWith,$section_id, $exam_id) {
        // Check whether desired report card for a certain Examination are added in order to generate report or not
        $reportsCardCount = ReportCard::where('section_id',$section_id)
            ->where('exam_id', $exam_id)->count();

        if($reportsCardCount < 1){// Not added
            // Get student ids of that section
            $students = User::where('active',1)
                ->whereHas("roles", function($q){ $q->where("name", "student"); })
                ->whereHas("studentInfo", function($q) use($section_id){ $q->where("section_id", $section_id); })
                ->with('grade')->get();
                //->pluck('id')
                //->toArray();

            $reportCards = ReportCard::whereIn('student_id',$students->pluck('id')->toArray())
                ->where('exam_id', $exam_id)
                ->where('section_id', $section_id)
                ->pluck('student_id')
                ->toArray();

            $reportsCard_student_ids = array();

            foreach($reportCards as $reportCard){
                array_push($reportsCard_student_ids, $reportCard->student_id);
            }
            $positions = [];

            $calendar = AcademicCalendar::whereActive(1)->first();
            foreach($students->pluck('id')->toArray() as $key => $student_id){
                if(!in_array($student_id,$reportsCard_student_ids)){
                    // Put default values
                    $total = [];
                    foreach ($students[$key]->grade as $grade){
                        array_push($total, $grade->total);
                    }
                    array_push($positions, array_push($total));

                    $tb = new ReportCard;
                    $tb->school_id = auth()->user()->school->id;
                    $tb->student_id = $student_id;
                    $tb->exam_id = $exam_id;
                    $tb->section_id = $section_id;
                    $tb->user_id = auth()->user()->id;
                    $tb->academic_calendar_id = $calendar->id;

                    $tb->total = array_sum($total);
                    $tb->average = array_sum($total) / $students[$key]->grade->count();
                    $tb->position = 0;

                    $tb->punctuality = 0;
                    $tb->attendance = 0;
                    $tb->attentiveness = 0;
                    $tb->initiative = 0;
                    $tb->perseverance = 0;
                    $tb->carrying_out_assignment = 0;
                    $tb->organisational_ability = 0;
                    $tb->neatness = 0;
                    $tb->politeness = 0;
                    $tb->honesty = 0;
                    $tb->self_control = 0;
                    $tb->spirit_of_cooperation = 0;
                    $tb->obedience = 0;
                    $tb->sense_of_responsibility = 0;
                    $tb->public_speaking = 0;
                    $tb->handling_of_tools = 0;
                    $tb->drawing = 0;
                    $tb->painting = 0;
                    $tb->sculpture = 0;
                    $tb->relationship_with_others = 0;
                    $tb->participation_in_school_arts = 0;

                    $tb->created_at = date('Y-m-d H:i:s');
                    $tb->updated_at = date('Y-m-d H:i:s');
                    //$tbc[] = $tb->attributesToArray();
                    $tb->save();
                    foreach ($students[$key]->grade as $g){
                        $g->report_card_id = $tb->id;
                        $g->save();
                    }
                }
            }
            return true;
            try{
                if(count($tbc) > 0)
                    // Insert students of that section to give marks later for this course and Examination

                    $grad = Grade::insert($tbc);
                dd($grad);
                return;
            }catch(\Exception $e){
                return false;
            }
        } else {// Added desired course for desired exam
            return true;
        }
    }
}

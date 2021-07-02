<?php
namespace App\Http\Traits;

use App\Course;
use App\Grade as Grade;
use App\User;

trait AssignGrade {
    public function giveGrade($teacher_id,$course_id,$exam_id,$section_id) {
        // Check whether desired Course for a certain Examination are added in order to give marks or not
        $countGradeIds = Grade::where('course_id', $course_id)
            ->where('exam_id', $exam_id)
            ->count();

        if($countGradeIds < 1){// Not added
            // Get student ids of that section
            $students = User::where('active',1)
                ->whereHas("roles", function($q){ $q->where("name", "student"); })
                ->whereHas("studentInfo", function($q) use($section_id){ $q->where("section_id", $section_id); })
                ->pluck('id')
                ->toArray();

            $grades = Grade::whereIn('student_id',$students)
                ->where('course_id',$course_id)
                ->where('exam_id',$exam_id)
                ->pluck('student_id')
                ->toArray();
            $course = Course::whereId($course_id)->first();
            $grade_student_ids = array();

            foreach($grades as $grade){
                array_push($grade_student_ids, $grade->student_id);
            }

            foreach($students as $student_id){
                if(!in_array($student_id,$grade_student_ids)){
                    // Put default values
                    $tb = new Grade;
                    $tb->total = 0;
                    $tb->average = 0;
                    $tb->position = 0;
                    $tb->resumption_test = 0;
                    $tb->note = 0;
                    $tb->project = 0;
                    $tb->classwork = 0;
                    $tb->assignment = 0;
                    $tb->midterm_test = 0;
                    $tb->attendance = 0;
                    $tb->exam = 0;
                    $tb->grade = 0;
                    $tb->created_at = date('Y-m-d H:i:s');
                    $tb->updated_at = date('Y-m-d H:i:s');
                    $tb->school_id = auth()->user()->school->id;
                    $tb->exam_id = $exam_id;
                    $tb->student_id = $student_id;
                    $tb->teacher_id = $teacher_id;
                    $tb->course_id = $course_id;
                    $tb->course_name = $course->slug;
                    $tb->user_id = auth()->user()->id; // User id who is logged in while this command executes
                    //$tbc[] = $tb->attributesToArray();
                    $tb->save();
                }
            }
            return true;
            try{
                if(count($tbc) > 0)
                    // Insert students of that section to give marks later for this course and Examination

                    $grad = Grade::insert($tbc);

                return;
            }catch(\Exception $e){
                return false;
            }
        } else {// Added desired course for desired exam
            return true;
        }
    }
    public function checkMissOutStudentGrade($gradedStudentCount, $section_id){
        $students = User::where('active',1)
            ->whereHas("roles", function($q){ $q->where("name", "student"); })
            ->whereHas("studentInfo", function($q) use($section_id){ $q->where("section_id", $section_id); })
            ->get();
        if($students->count() !== $gradedStudentCount){

        }
    }
}

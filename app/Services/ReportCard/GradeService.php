<?php
namespace App\Services\ReportCard;

use App\Course;
use App\Exam;
use App\Grade;
use App\Gradesystem;
use App\Http\Requests\GradeManagerRequest;
use App\Http\Requests\StoreGradeRequest;
use App\User;


class GradeService {

    protected $gradeSystem;
    public function __construct()
    {
    }

    public function setGradeSystem($grade){
        $this->gradeSystem = $grade;
    }
    public function getGradeSystemByname($name)
    {
        return Gradesystem::where('school_id', auth()->user()->school->id)
            ->where('name', $name)
            ->get();
    }
    public function getGradeSystemBySchoolId($grades){
        $grade_system_name = isset($grades[0]->course->grade_system_name) ? $grades[0]->course->grade_system_name : false;
        return ($grade_system_name)?Gradesystem::where('school_id', auth()->user()->school->id)
            ->where('name', $grade_system_name)
            //->groupBy('grade_system_name')
            ->get() :
            Gradesystem::select('name')
            ->where('school_id', auth()->user()->school->id)
            ->distinct()
            ->get();
    }
    public function release(){}

    public function gradeWithCourseAndStudent($course, $exam)
    {
        return Grade::with('course','student')
            ->where('course_id', $course)
            ->where('exam_id',$exam)
            ->get();
    }

    public function schoolExam()
    {
        return Exam::where('school_id', auth()->user()->school->id)
            ->where('active',1)
            ->first();
    }
    public function gradeByIds($ids){
        return Grade::whereIn('id', $ids)->get();
    }
    protected $field = ['resumption_test', 'note', 'project', 'classwork', 'assignment', 'midterm_test', 'attendance', 'exam'];
    public function gradeMark($grade){

    }
    private function total($grades){
        $total = [];
        foreach ($grades as $key => $grade ){
            if (in_array($key, $this->field)){
                array_push($total,$grade);
            }
        }

        return array_sum($total);
    }
    private function grade($total){
        $g = 'F';

        foreach ($this->gradeSystem as $grade){
            if (in_array(round($total), range($grade->from_mark, $grade->to_mark))){
                $g = $grade->grade;
                break;
            }
        }
        return $g;
    }
    private function position($totalScores, $total){
        rsort($totalScores);
        return array_search($total, $totalScores) +1;
    }
    public function update($request)
    {
        $rawgrades = $this->gradeByIds($request->id);
        $studentScores = [];

        try{
            foreach ($rawgrades->toArray() as $g){
                array_push($studentScores, $this->total($g));
            }
            $class_average = array_sum($studentScores) / $rawgrades->count();
            foreach($rawgrades as $key => $grade){
                $total = $this->total($grade->toArray());

                $grade->total = $total;
                $grade->grade = $this->grade($total);
                $grade->average = $class_average;
                $grade->position = $this->position($studentScores, $total);


                $grade->resumption_test = $request->resumption_test[$key];
                $grade->note = $request->note[$key];
                $grade->project = $request->project[$key];
                $grade->classwork = $request->classwork[$key];
                $grade->assignment = $request->assignment[$key];
                $grade->midterm_test = $request->midterm_test[$key];
                $grade->attendance = $request->attendance[$key];
                $grade->exam = $request->exam[$key];
//                $grade->created_at = date('Y-m-d H:i:s');
//                $grade->updated_at = date('Y-m-d H:i:s');
                $grade->save();
                //$tbc[] = $grade->attributesToArray();

            }
            //\batch()->update(new Grade(), $tbc, 'id');
//            $g = new Grade();
//            return $g->update($tbc);
            return true;

        }catch (\Exception $e){

            return back()->with('error', __('Ops! something went wrong.'));
        }

    }

    public function gradeWithCourseStudentExam($course, $exam)
    {
        return Grade::with('course','student','examination')
            ->where('course_id', $course)
            ->where('exam_id',$exam)
            ->get();
    }

    public function getStudentGradeCourse($course_id, $exam_id)
    {
        Grade::with('course','student','examination')
            ->where('course_id', $course_id)
            ->where('exam_id',$exam_id)
            ->get();
        return User::whereHas("roles", function($q){ $q->where("name", "student"); })
            ->with('studentInfo','course','grade');
    }

    public function getGrade($course_id, $exam_id)
    {
        return Grade::where('course_id', $course_id)
            ->where('exam_id',$exam_id)
            ->get();
    }

    public function getStudentGradeExamination($course_id, $exam_id)
    {
        return Grade::with('student','examination')
            ->where('course_id', $course_id)
            ->where('exam_id',$exam_id)
            ->get();
    }

    public function computeGrade(StoreGradeRequest $request)
    {
        $rawgrades = $this->gradeByIds($request->id);
        $studentScores = [];

        try{
            foreach ($rawgrades->toArray() as $g){
                array_push($studentScores, $this->total($g));
            }
            $class_average = array_sum($studentScores) / $rawgrades->count();
            foreach($rawgrades as $key => $grade){
                $total = $this->total($grade->toArray());
                $grade->total = $total;
                $grade->grade = $this->grade($total);
                $grade->average = $class_average;
                $grade->position = $this->position($studentScores, $total);
                $grade->save();
                //$tbc[] = $grade->attributesToArray();
            }
            //\batch()->update(new Grade(), $tbc, 'id');
//            $g = new Grade();
//            return $g->insert($tbc);
            return true;
        }catch (\Exception $e){

            return back()->with('error', __('Ops! something went wrong.'));
        }
    }

    public function masterSheet(GradeManagerRequest $request, $exam)
    {
        $rawgrades = Grade::where('school_id', auth()->user()->school->id)
            ->where('course_name', $request->course_name)
            ->where('exam_id', $exam->id)->get();
        $studentScores = [];
        try{
            foreach ($rawgrades->toArray() as $g){
                array_push($studentScores, $this->total($g));
            }
            $class_average = array_sum($studentScores) / $rawgrades->count();
            foreach($rawgrades as $key => $grade){
                $total = $this->total($grade->toArray());
                $grade->total = $total;
                $grade->grade = $this->grade($total);
                $grade->average = $class_average;
                $grade->position = $this->position($studentScores, $total);
                $grade->save();
                //$tbc[] = $grade->attributesToArray();
            }
            //\batch()->update(new Grade(), $tbc, 'id');
//            $g = new Grade();
//            return $g->insert($tbc);
            return true;
        }catch (\Exception $e){
            dd($e);
            return back()->with('error', __('Ops! something went wrong.'));
        }

    }

    public function setCourseGradeSystem($gradeSystem, $course_id )
    {
        $course = Course::whereId($course_id)->first();
        $course->grade_system_name = $gradeSystem[0]->name;
        return $course->save();
    }

    public function getCourseGradeSystemName($course_id)
    {
        return Course::whereId($course_id)->first()->grade_system_name;
    }

    private function gradeSheet($rawgrades){
        try{
            foreach ($rawgrades->toArray() as $g){
                array_push($studentScores, $this->total($g));
            }
            $class_average = array_sum($studentScores) / $rawgrades->count();
            foreach($rawgrades as $key => $grade){
                $total = $this->total($grade->toArray());
                $grade->total = $total;
                $grade->grade = $this->grade($total);
                $grade->average = $class_average;
                $grade->position = $this->position($studentScores, $total);
                $grade->save();
                //$tbc[] = $grade->attributesToArray();
            }
            //\batch()->update(new Grade(), $tbc, 'id');
//            $g = new Grade();
//            return $g->insert($tbc);
            return true;
        }catch (\Exception $e){

            return back()->with('error', __('Ops! something went wrong.'));
        }
    }
}

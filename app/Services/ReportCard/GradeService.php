<?php
namespace App\Services\ReportCard;

use App\Exam;
use App\Grade;
use App\Gradesystem;
use App\Http\Requests\StoreGradeRequest;
use Illuminate\Http\Request;

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
            ->get() : Gradesystem::select('name')
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
                $grade->save();
                //$tbc[] = $tb->attributesToArray();
            }
            return true;
        }catch (\Exception $e){
            dd($e);
            return back()->with('error', __('Ops! something went wrong.'));
        }

    }
}

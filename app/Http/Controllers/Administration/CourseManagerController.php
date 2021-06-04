<?php

namespace App\Http\Controllers\Administration;

use App\Classes;
use App\Course;
use App\CourseType;
use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Schedule;
use App\Section;
use App\Services\UploadHandler;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CourseManagerController extends Controller
{
    protected $fileService;
    public function __construct(UploadHandler $uploadHandler)
    {
        $this->fileService = $uploadHandler;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::whereSchoolId(auth()->user()->school->id)->paginate();
        return view('dashboard.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = auth()->user()->school->id;
        $courseTypes = CourseType::whereSchoolId($school)->get();
        $sections = Section::whereSchoolId($school)->get();
        $schedules = Schedule::whereSchoolId($school)->get();
        //$departments = Department::whereSchoolId(auth()->user()->school->id)->get();
        $teachers = User::where('school_id', $school)->whereHas("roles", function($q){ $q->where("name", "teacher"); })->get();
        return view('dashboard.course.create', compact('courseTypes', 'sections', 'schedules', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseStoreRequest $request
     * @return void
     */
    public function store(CourseStoreRequest $request)
    {
        $this->fileService->save($request,'banner_x','banner',$request->name,['width'=>1919, 'height' => 700]);
        $this->fileService->save($request,'photo_x','photo',$request->name,['width'=>800, 'height'=>533]);
        foreach ($request->sections as $section){
            $request->merge(['section_id' => $section]);
            $course = Course::create($request->except(['teacher','schedule_id','_token','photo_x','banner_x', 'sections']));
            $course->assignTeacherTo($request->teacher);
            $course->attachSchedule($request->schedule_id);
        }
        return redirect()->back()->with('success', 'school updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $courseTypes = CourseType::whereSchoolId(auth()->user()->school->id)->get();
        $sections = Section::whereSchoolId(auth()->user()->school->id)->get();
        $schedules = Schedule::whereSchoolId(auth()->user()->school->id)->get();
        //$departments = Department::whereSchoolId(auth()->user()->school->id)->get();
        $teachers = User::where('school_id', auth()->user()->school_id)->whereHas("roles", function($q){ $q->where("name", "teacher"); })->get();
        return view('dashboard.course.edit', compact('courseTypes', 'sections', 'schedules', 'teachers', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $this->fileService->save($request,'banner_x','banner',$request->name,['width'=>1919, 'height' => 700]);
        $this->fileService->save($request,'photo_x','photo',$request->name,['width' =>800, 'height' =>533]);
        $course->fill($request->except(['_token', 'schedule_id','banner_x', 'photo_x','teacher']))->save();
        $course->assignTeacherTo($request->teacher);
        $course->attachSchedule($request->schedule_id);
        return redirect()->back()->with('success', 'course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}

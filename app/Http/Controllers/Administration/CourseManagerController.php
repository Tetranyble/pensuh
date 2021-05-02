<?php

namespace App\Http\Controllers\Administration;

use App\Classes;
use App\Course;
use App\CourseType;
use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Schedule;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CourseManagerController extends Controller
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
        $courses = Course::paginate();
        return view('dashboard.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseTypes = CourseType::whereSchoolId(auth()->user()->school->id)->get();
        $sections = Section::whereSchoolId(auth()->user()->school->id)->get();
        $schedules = Schedule::whereSchoolId(auth()->user()->school->id)->get();
        //$departments = Department::whereSchoolId(auth()->user()->school->id)->get();
        $teachers = User::where('school_id', auth()->user()->school_id)->whereHas("roles", function($q){ $q->where("name", "teacher"); })->get();
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

        $filenames = [ 'banner_x' => [1919,700], 'photo_x' => [800,533]];
        foreach ($filenames as $key => $file){
            if ($request->has($key)){
                $photo = $request->file($key);
                $photos = Image::make($photo->getRealPath())->resize($file[0], $file[1]);
                $newName = time() . Str::slug($request->get('school_name')) . '.' . $photo->getClientOriginalExtension();
                $request->merge([str_replace('_x','', $key) => 'storage/'.$newName]);
                $photos->save(storage_path('app/public/'.$newName));
            }
        }
        $course = Course::create($request->except(['teacher','schedule_id','_token','photo_x','banner_x']));
        $course->assignTeacherTo($request->teacher);
        $course->attachSchedule($request->schedule_id);
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
    public function update(CourseStoreRequest $request, Course $course)
    {
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

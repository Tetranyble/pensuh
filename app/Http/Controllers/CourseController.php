<?php

namespace App\Http\Controllers;

use App\Course;
use App\School;
use App\Services\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    protected $schools;
    public function __construct(Schools $schools)
    {
        $this->schools = $schools;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('q')) {
            $courses = Course::where('school_id', $this->schools->id())->where([

                ['name', 'LIKE', '%' . Str::lower(request('q')) . '%'],
            ])->paginate();

        }else{
            $courses = Course::where('school_id', $this->schools->id())->paginate();
        }
        return view('frontend.courses', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

        $courses = Course::where('school_id', $this->schools->id())->paginate(5);
        return view('frontend.course', compact('course', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
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

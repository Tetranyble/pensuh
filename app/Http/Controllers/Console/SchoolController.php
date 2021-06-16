<?php

namespace App\Http\Controllers\Console;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolRequest;
use App\Language;
use App\Role;
use App\School;
use App\Services\Schools;
use App\Services\UploadHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class SchoolController extends Controller
{
    protected $schools;
    private $fileService;

    public function __construct(Schools $schools, UploadHandler $uploadHandler)
    {
        $this->schools = $schools;
        $this->fileService = $uploadHandler;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gate::any(['creator', 'master','vendor']);

        if (!Gate::any(['creator', 'master','vendor'])){
            return redirect()->route('dashboard');
        }
        if (auth()->user()->roles->pluck('slug')->flatten()->contains('master')){
            $schools = School::paginate();
        }else {
            $schools = School::whereVendor(auth()->user()->id)->paginate();
        }
        return view('dashboard.master.schools', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = School::whereId(auth()->user()->school->id)->first();
        $languages = Language::get();
        return view('dashboard.school.school', compact('school', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolRequest $request)
    {
        $user = auth()->user();
        $filenames = [ 'mission_image_x' => [575,592], 'blog_banner_x' => [1340,894], 'school_logo_x' => [162,57], 'course_banner_x' => [1170,400],
            'banner_image_x' => [497,586], 'event_image_x' => [476,526], 'about_image_x' => [601,645], 'favicon_x' => [32,32]];
        foreach ($filenames as $key => $file){
            if ($request->has($key)){
                $this->fileService->save($request,$key,str_replace('_x','', $key),$request->school_name,['width'=>$file[0], 'height'=>$file[1]]);
            }
        }
        $school = School::create($request->all());
        if ($user->roles->flatten()->pluck('slug')->contains('creator')){
//            $role = Role::whereIn('slug',['creator', 'principal'])->get()->flatten()->pluck('id');
            $user->assignRole('principal');
            $user->removeRole('creator');
            $user->school_id = $school->id;
            $user->save();
        }
        return redirect()->route('schools.index')->with('success', 'school created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSchoolRequest $request, School $school)
    {
        $filenames = [ 'mission_image_x' => [575,592], 'blog_banner_x' => [1340,894], 'school_logo_x' => [162,57], 'course_banner_x' => [1170,400],
            'banner_image_x' => [497,586], 'event_image_x' => [476,526], 'about_image_x' => [601,645], 'favicon_x' => [32,32]];
        foreach ($filenames as $key => $file){
            if ($request->has($key)){
                $this->fileService->save($request,$key,str_replace('_x','', $key),$request->school_name,['width'=>$file[0], 'height'=>$file[1]]);
            }
        }
        School::whereId($request->id)->update($request->all());
        return redirect()->back()->with('success', 'school updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}

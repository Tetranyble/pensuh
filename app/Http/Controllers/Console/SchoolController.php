<?php

namespace App\Http\Controllers\Console;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolRequest;
use App\Language;
use App\School;
use App\Services\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class SchoolController extends Controller
{
    protected $schools;
    public function __construct(Schools $schools)
    {
        $this->schools = $schools;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = School::whereId($this->schools->id())->first();
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
        $validated = $request->validated();
        $filenames = [ 'mission_image_x' => [575,592], 'blog_banner_x' => [1340,894], 'school_logo_x' => [162,57], 'course_banner_x' => [1170,400],
            'banner_image_x' => [497,586], 'event_image_x' => [476,526], 'about_image_x' => [601,645], 'favicon_x' => [32,32]];
        foreach ($filenames as $key => $file){
            if ($request->has($key)){
                $photo = $request->file($key);
                $photos = Image::make($photo->getRealPath())->resize($file[0], $file[1]);
                $newName = time() . Str::slug($request->get('school_name')) . '.' . $photo->getClientOriginalExtension();
                $request->merge([str_replace('_x','', $key) => 'storage/'.$newName]);
                $photos->save(storage_path('app/public/'.$newName));
            }
        }
        School::whereId($request->id)->update($request->except(['_token', 'id', 'mission_image_x', 'blog_banner_x', 'school_logo_x', 'course_banner_x', 'banner_image_x',
            'event_image_x', 'about_image_x', 'favicon_x']));
        return redirect()->back()->with('success', 'school updated successfully');

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
    public function update(Request $request, School $school)
    {
        //
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

<?php

namespace App\Http\Controllers\Console;

use App\BloodGroup;
use App\Gender;
use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Nationality;
use App\Religion;
use App\SchoolType;
use App\Section;
use App\Session;
use App\StudentInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class StudentOnboardingController extends Controller
{
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
        $nationalities = Nationality::get();
        $genders = Gender::get();
        $bloods = BloodGroup::get();
        $groups = Group::whereSchoolId(auth()->user()->school->id)->get();
        $religions = Religion::all();
        $schools = SchoolType::all();
        $sections = Section::all();
        $sessions = Session::all();
        return view('dashboard.onboarding.student.create', compact('nationalities', 'genders', 'bloods', 'groups', 'religions', 'schools', 'sections', 'sessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {

        if ($request->has('photo_x')){
            $photo = $request->file('photo_x');
            $photos = Image::make($photo->getRealPath())->resize(505, 505);
            $newName = time() . Str::slug($request->get('lastname')) . '.' . $photo->getClientOriginalExtension();
            $request->merge(['photo' => 'storage/'.$newName]);
            $photos->save(storage_path('app/public/'.$newName));
        }
        DB::transaction(function () use($request){
            $user = new User();
            $user->fill($request->all())->save();
            $request->merge(['user_id' => $user->id]);
            $userInfo = new StudentInfo();
            $userInfo->fill($request->all())->save();
            $user->assignRole('student');
        });
        return redirect()->back()->with('success', 'student save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $student)
    {
        $user = User::whereUsername($student)->first();
        return view('dashboard.onboarding.student.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $student)
    {
        $user = User::whereUsername($student)->first();
        $nationalities = Nationality::get();
        $genders = Gender::get();
        $bloods = BloodGroup::get();
        $groups = Group::whereSchoolId(auth()->user()->school->id)->get();
        $religions = Religion::all();
        $schools = SchoolType::all();
        $sections = Section::all();
        $sessions = Session::all();
        return view('dashboard.onboarding.student.edit', compact('user','nationalities', 'genders', 'bloods', 'groups', 'religions', 'schools', 'sections', 'sessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, User $user, $student)
    {
        $user = User::whereUsername($student)->first();

        if ($request->has('photo_x')){
            Storage::delete($user->photo);
            $photo = $request->file('photo_x');
            $photos = Image::make($photo->getRealPath())->resize(505, 505);
            $newName = time() . Str::slug($request->get('lastname')) . '.' . $photo->getClientOriginalExtension();
            $request->merge(['photo' => 'storage/'.$newName]);
            $photos->save(storage_path('app/public/'.$newName));
        }
        DB::transaction(function () use($request, $user){
            $user->fill($request->all())->save();
            $userInfo = StudentInfo::whereUserId($user->id)->first();
            $userInfo->fill($request->all())->save();
        });
        return redirect()->back()->with('success', 'student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

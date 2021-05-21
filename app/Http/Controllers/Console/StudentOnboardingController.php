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
use App\Services\UploadHandler;
use App\Session;
use App\StudentInfo;
use App\User;
use Illuminate\Support\Facades\DB;

class StudentOnboardingController extends Controller
{
    protected $fileHandle;
    public function __construct(UploadHandler $fileHandle)
    {
        $this->fileHandle = $fileHandle;
        $this->middleware('auth');
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
        $school = auth()->user()->school->id;
        $nationalities = Nationality::get();
        $genders = Gender::whereSchoolId($school)->get();
        $bloods = BloodGroup::get();
        $groups = Group::whereSchoolId($school)->get();
        $religions = Religion::all();
        $schools = SchoolType::whereSchoolId($school)->get();
        $sections = Section::whereSchoolId($school)->get();
        $sessions = Session::whereSchoolId($school)->get();
        $counsellors = User::whereHas("roles", function($q){ $q->where("name", "guardian/counsellor")->orWhere("slug", "form_teacher"); })->get();
        return view('dashboard.onboarding.student.create', compact('nationalities', 'genders', 'bloods', 'groups', 'religions', 'schools', 'sections', 'sessions', 'counsellors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $this->fileHandle->save($request,'photo_x','photo','lastname', ['width'=> 480, 'height' => 480]);
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
        $school = auth()->user()->school->id;
        $nationalities = Nationality::get();
        $genders = Gender::whereSchoolId($school)->get();
        $bloods = BloodGroup::get();
        $groups = Group::whereSchoolId($school)->get();
        $religions = Religion::all();
        $schools = SchoolType::whereSchoolId($school)->get();
        $sections = Section::whereSchoolId($school)->get();
        $sessions = Session::whereSchoolId($school)->get();
        $counsellors = User::whereHas("roles", function($q){ $q->where("name", "guardian/counsellor")->orWhere("slug", "form_teacher"); })->get();
        return view('dashboard.onboarding.student.edit', compact('counsellors','user','nationalities', 'genders', 'bloods', 'groups', 'religions', 'schools', 'sections', 'sessions'));
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
        $this->fileHandle->save($request,'photo_x','photo','lastname', ['width'=> 480, 'height' => 480]);
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

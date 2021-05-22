<?php



namespace App\Http\Controllers\Console;
use App\BloodGroup;
use App\Department;
use App\Gender;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Nationality;
use App\Religion;
use App\Role;
use App\SchoolType;
use App\Services\UploadHandler;
use App\TeacherQualification;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class StaffController extends Controller
{
    private $fileHandle;

    public function __construct( UploadHandler $fileHandle)
    {
        $this->fileHandle = $fileHandle;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::whereHas("roles", function($q){ $q->where("name", "teacher")->orWhere("name", "staff")->orWhere("name", "security")->orWhere("name","admin"); })->where('school_id', auth()->user()->school->id)->paginate();
        return view('dashboard.staff.staff', compact('staffs'));
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
        $genders = Gender::where('school_id', $school)->orWhere('school_id', null)->get();
        $bloods = BloodGroup::get();
        $religions = Religion::all();
        $schools = SchoolType::where('school_id', $school)->get();
        $departments = Department::where('school_id', $school)->get();
        $roles = Role::all();
        return view('dashboard.onboarding.teacher.create', compact('nationalities', 'genders', 'bloods', 'religions', 'schools', 'departments', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {

        $this->fileHandle->save($request,'photo_x','photo','lastname', ['width'=> 480, 'height' => 480]);
        DB::transaction(function () use($request){
            $user = new User();
            $user->fill($request->all())->save();
            $request->merge(['user_id' => $user->id]);
            $staff = new TeacherQualification();
            $staff->fill($request->all())->save();
            $user->assignRole($request->roles);
        });
        return redirect()->back()->with('success', 'staff save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $staff)
    {
        abort_unless($user = User::whereUsername($staff)->first(), 404);
        $school = auth()->user()->school->id;

        $nationalities = Nationality::get();
        $genders = Gender::where('school_id', $school)->orWhere('school_id', null)->get();
        $bloods = BloodGroup::get();
        $religions = Religion::all();
        $schools = SchoolType::where('school_id', $school)->get();
        $departments = Department::where('school_id', $school)->get();
        $roles = Role::all();
        return view('dashboard.onboarding.teacher.edit', compact('nationalities', 'genders', 'bloods', 'religions', 'schools', 'departments', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, User $user, $staff)
    {
        $this->fileHandle->save($request,'photo_x','photo','lastname', ['width'=> 480, 'height' => 480]);
        DB::transaction(function () use($request, $user){
            $user->fill($request->all())->save();
            $user->assignRole($request->roles);
            $user->teacherQualification->fill($request->all())->save();
        });
        return redirect()->back()->with('success', 'staff updated successfully');

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

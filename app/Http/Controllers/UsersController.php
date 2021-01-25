<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Department;
use App\Role;
use App\Section;
use App\SectionUser;
use App\StudentInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
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
    public function index(Request $request)
    {
        $request->validate(['user' => 'string']);
        $role = Role::whereName($request->query('user'))->get();
        $users = User::whereIn('role_id',$role)->get();
        if(!$users){
            $users = User::all()->except();
        }else{

        }

        return $users;
        //$users = User::orderBy('id', 'desc')->get();
        //return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role, Classes $classes, Department $departments)
    {
        $roles = $role->get();
        $classes = $classes->get();
        $departments = $departments->get();
        return view('dashboard.user.create', compact('roles', 'classes', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = null;
        //$request->validate(['role_id' => 'required|string']);
        //$section = Section::whereName('name', $request->input('role_id'));
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required:between:8,255|confirmed',
            'password_confirmation' => 'required',
            'gender' => 'required|string',
            'role_id' => 'required|string',
            'blood_group' => 'nullable|string',
            'nationality' => 'nullable|string',
            'phone' => 'required|numeric:min:11',
            'address' => 'nullable|string',
            'about' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
            'department' => 'nullable|numeric'
        ]);

        $file_name = '';
        $file = $request->file('photo');
        if($file){
            $file_name = ($file) ? uniqid('photo_',true).Str::random(10).'.'.$file->getClientOriginalExtension() : '';
            if($file->isValid()){
                $file->storeAs('public',$file_name);
                //$request->file('image')->storePublicly('uploads/images');
            }
        }

        if ($request->input('role_id') === 'teacher' || $request->input('role_id') === 'form teacher'){
            $request->validate([ 'sections' => 'required|min:1']);
        }elseif ($request->input('role_id') === 'student'){
            $student = $request->validate([
                    'user_id' => 'numeric',
                    'session' => 'nullable|string',
                    'group' => 'nullable|string',
                    'birthday' => 'required|date',
                    'religion' => 'required|string',
                    'father_name' => 'required|string|max:255',
                    'father_phone_number' => 'required|numeric',
                    'father_national_id' => 'nullable|string',
                    'father_occupation' => 'nullable|string',
                    'father_designation' => 'nullable|string',
                    'father_annual_income' => 'nullable|numeric',
                    'mother_name' => 'required|string|max:255',
                    'mother_phone_number' => 'required|numeric',
                    'mother_national_id' => 'nullable|string',
                    'mother_occupation' => 'nullable|string',
                    'mother_designation' => 'nullable|string',
                    'mother_annual_income' => 'nullable|numeric',
                ]);
        }


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->student_code = Auth::id().date('y').substr(number_format(time() * mt_rand(), 0, '', ''), 0, 5);
        $user->gender = $request->gender;
        $user->role_id = Role::whereName($request->role_id)->firstOrFail()->id;
        $user->blood_group = $request->blood_group;
        $user->nationality = $request->nationality;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about = $request->about;
        $user->department_id = $request->department_id;
        $user->photo = $file_name;
        $user->save();


        if ($request->input('role_id') === 'teacher' || $request->input('role_id') === 'form teacher'){
            $request->validate([ 'sections' => 'required|min:1']);
            foreach ($request->sections as $section){
                $section = SectionUser::create(['user_id' => $user->id, 'section_id' => $section]);
            }
        }elseif ($request->input('role_id') === 'student'){

            $student = StudentInfo::create($student + ['user_id' => $user->id]);
        }


        return redirect('/users/create')->with('success', 'user saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('/users')->with('success', 'user updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users')->with('success','user deleted successfully');
    }
}

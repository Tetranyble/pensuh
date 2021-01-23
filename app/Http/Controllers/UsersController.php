<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $roles = $role->get();
        return view('dashboard.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required:between:8,255|confirmed',
            'password_confirmation' => 'required',
            'student_code' => auth()->user()->id.date('y').substr(number_format(time() * mt_rand(), 0, '', ''), 0, 5),
            'gender' => 'required|string',
            'role_id' => 'required|numeric',
            'blood_group' => 'required:string',
            'nationality' => 'nullable|string',
            'phone' => 'required|numeric:min:11',
            'address' => 'nullable|string',
            'about' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
            'section_id' => 'nullable|numeric',
            'session' => 'nullable|string',
            'group' => 'nullable|string',
            'birthday' => 'nullable|date',
            'religion' => 'nullable|string',
            'father_name' => 'nullable|string|max:255',
            'father_phone_number' => 'nullable|numeric',
            'father_national_id' => 'nullable|string',
            'father_occupation' => 'nullable|string',
            'father_designation' => 'nullable|string',
            'father_annual_income' => 'nullable|numeric',
            'mother_name' => 'nullable|string|max:255',
            'mother_phone_number' => 'nullable|numeric',
            'mother_national_id' => 'nullable|string',
            'mother_occupation' => 'nullable|string',
            'mother_designation' => 'nullable|string',
            'mother_annual_income' => 'nullable|numeric',
            'user_id' => 'numeric'
        ]);

        $file = $request->file('photo');
        $file_name = uniqid('photo_',true).Str::random(10).'.'.$file->getClientOriginalExtension();

        if($file->isValid()){
            $file->storeAs('public',$file_name);
            //$request->file('image')->storePublicly('uploads/images');
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->photo = $file_name;
        $user->phone = $request->phone;
        $user->save();
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

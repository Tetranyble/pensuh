<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserManagerRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserManagerRequest $request)
    {
        if ($request->input('search')) {
            $students = User::with('gender','studentInfo', 'blood')
                ->where('school_id', auth()->user()->school->id)
                ->where([['username', 'LIKE', '%' . Str::lower($request->input('search')) . '%']])
//                ->orWhere([['code', 'LIKE', '%' . $request->input('search') . '%']])
//                ->orWhere([['firstname', 'LIKE', '%' . $request->input('search') . '%']])
//                ->orWhere([['lastname', 'LIKE', '%' . $request->input('search') . '%']])
                ->whereHas("roles", function($q){
                    $q->where("slug", "student"); })
                ->paginate(10);
        }else{
            $students = User::whereHas("roles", function($q){
                $q->where("slug", "student"); })
                ->where('school_id', auth()->user()->school->id)
                ->with('gender','studentInfo', 'blood')->paginate(10);
        }

        return view('dashboard.student.students', compact('students'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

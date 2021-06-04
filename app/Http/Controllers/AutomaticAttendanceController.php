<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\AttendanceType;
use App\Http\Requests\StoreAttendanceRequest;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class AutomaticAttendanceController extends Controller
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
        $attendanceTypes = AttendanceType::get();
        return view('dashboard.attendance.automatic', compact('attendanceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        $att = new Attendance();
        $att = $att->where('user_id', $request->code)->where('created_at', Carbon::today())->where('attendance_type_id', $request->attendance_type_id)->first();
        if ($att){
            $att->status = 1;
            $att->save();
        }else{
            $att = $att->create($request->all());
            //fire of mass attendance creation
        }
        $user = User::whereCode($request->code)->first();
        return response()->json(
             ['message'=>'attendance taken successfully', 'user' => $user]
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}

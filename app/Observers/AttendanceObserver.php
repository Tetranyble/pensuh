<?php

namespace App\Observers;

use App\Attendance;
use App\Events\AttendanceEvent;
use App\User;


class AttendanceObserver
{
    /**
     * Handle the attendance "created" event.
     *
     * @param  \App\Attendance  $attendance
     * @return void
     */
    public function created(Attendance $attendance)
    {
//        $school = auth()->user()->school->id;
//        $students = User::whereHas("roles", function($q) use($school){ $q->where("slug", "student"); })->where('school_id', $school)->get();
//        dd($students);
        AttendanceEvent::dispatch($attendance);
    }

    /**
     * Handle the attendance "updated" event.
     *
     * @param  \App\Attendance  $attendance
     * @return void
     */
    public function updated(Attendance $attendance)
    {
        //
    }

    /**
     * Handle the attendance "deleted" event.
     *
     * @param  \App\Attendance  $attendance
     * @return void
     */
    public function deleted(Attendance $attendance)
    {
        //
    }

    /**
     * Handle the attendance "restored" event.
     *
     * @param  \App\Attendance  $attendance
     * @return void
     */
    public function restored(Attendance $attendance)
    {
        //
    }

    /**
     * Handle the attendance "force deleted" event.
     *
     * @param  \App\Attendance  $attendance
     * @return void
     */
    public function forceDeleted(Attendance $attendance)
    {
        //
    }
}

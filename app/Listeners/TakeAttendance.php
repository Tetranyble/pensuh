<?php

namespace App\Listeners;

use App\Attendance;
use App\Events\AttendanceEvent;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class TakeAttendance implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * Handle the event.
     *
     * @param  Attendance  $event
     * @return void
     */
    public function handle(AttendanceEvent $event)
    {
        $school = $event->attendance->user->school->id;
        $user = $event->attendance->user;
        //$att = AttendanceType::whereId($event->attendance->attendance_type_id)->first();
        if (($event->attendance->attendanceType->slug == 'class-morning-attendance' || $event->attendance->attendanceType->slug == 'class-afternoon-attendance') && $user->roles->pluck('slug')->flatten()->contains('student')){
            //$user->studentInfo->section->id;
            $students = User::whereHas("roles", function($q) use($school){ $q->where("slug", "student"); })->where('school_id', $school)->get();
            foreach ($students as $student){
                $att = Attendance::where('user_id', $student->code)->where('created_at', Carbon::today())->where('attendance_type_id', $event->attendance->attendance_type_id)->first();
                if(!$att){
                    Attendance::create(['user_id'=>$student->code, 'school_id' =>$school, 'attendance_type_id' => $event->attendance->attendance_type_id, 'status' => 0]);
                }
            }
        }
    }
}

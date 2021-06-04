<?php

namespace App;

use App\Listeners\TakeAttendance;
use Illuminate\Database\Eloquent\Model;


class Attendance extends Model
{


    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => TakeAttendance::class,
    ];
    protected $fillable = ['taken_by', 'attendance_type_id', 'school_id', 'user_id', 'status'];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function takenBy(){
        return $this->belongsTo(User::class, 'taken_by');
    }
    public function attendanceType(){
        return $this->belongsTo(AttendanceType::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'code');
    }
}

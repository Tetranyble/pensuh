<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Exam extends Model
{

    protected $fillable = ['name', 'user_id', 'school_id', 'academic_calendar_id', 'start', 'end', 'active', 'notice_published', 'result_published', 'session_id'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start', 'end'];

    public function academicCalendar(){
        return $this->belongsTo(AcademicCalendar::class, 'academic_calendar_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function session(){
        return $this->belongsTo(Session::class);
    }
    public function getStartAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
    public function getEndAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
}

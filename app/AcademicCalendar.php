<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AcademicCalendar extends Model
{
    protected $fillable = ['name', 'resumption', 'vacation', 'body', 'active', 'school_id', 'session_id'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['resumption', 'vacation'];

    public function getResumptionAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
    public function getVacationAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
    public function session(){
        return $this->belongsTo(Session::class);
    }
}

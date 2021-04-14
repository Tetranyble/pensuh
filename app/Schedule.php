<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Schedule extends Model
{
    protected $guarded = [];

    public function setStartAttribute($value)
    {
        $time = preg_replace('/\s*:\s*/', ':', $value);
        $this->attributes['start'] = date("H:i", strtotime($time));
    }
    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }


    public function getEndAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }

    public function setEndAttribute($value)
    {
        $time = preg_replace('/\s*:\s*/', ':', $value);
        $this->attributes['end'] = date("H:i", strtotime($time));
    }
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\This;

class Event extends Model
{
    protected $guarded = [];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function host(){
        return $this->belongsTo(User::class, 'host_id');
    }

    public function startTime(){
        return $this->start_date;
    }
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }
}

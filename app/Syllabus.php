<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{

    protected $fillable = ['name', 'school_id', 'slug', 'body'];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function school(){
        return $this->belongsTo(School::class);
    }
}

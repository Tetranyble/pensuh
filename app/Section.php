<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];
    public function classTeacher()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    /**
     * Get the class that owns the section.
     */
    public function classes()
    {
        return $this->belongsTo('App\Post');
    }
}

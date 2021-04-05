<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}

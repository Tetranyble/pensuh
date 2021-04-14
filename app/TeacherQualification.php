<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherQualification extends Model
{
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(User::class);
    }
}

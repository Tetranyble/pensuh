<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherQualification extends Model
{
    protected $fillable = ['department_id', 'education', 'description', 'experience', 'teaching', 'family_support', 'speaking', 'children_well_being', 'user_id', 'school_type_id'];

    public function teacher(){
        return $this->belongsTo(User::class);
    }
}

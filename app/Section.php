<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'classes_id', 'school_id', 'capacity', 'classroom', 'form_teacher'];

    public function classTeacher()
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * Get the class that owns the section.
     */
    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }

    public function formTeacher(){
        return $this->belongsTo(User::class, 'form_teacher');
    }

    public function assignFormTeacher($user){
        return $this->formTeacher()->sync($user);
    }

    public function assignClassTeacher($user){
        return $this->classTeacher()->sync($user);
    }
}

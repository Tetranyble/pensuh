<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'section_id', 'school_id', 'course_type_id', 'body', 'grade_system_name', 'banner', 'photo', 'duration', 'slug'];

    public function teacher(){
        return $this->belongsToMany(User::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    /**
     * Grant the given permission to a role.
     *
     * @param $teacher
     * @return mixed
     */
    public function assignTeacherTo( $teacher ){
        if(is_string($teacher)){
            $teacher = User::whereId($teacher)->firstOrFail();
        }elseif (is_array($teacher)){
            $this->teacher()->sync($teacher);
            return true;
        }
        return $this->teacher()->sync($teacher);
    }

    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
    public function attachSchedule($schedule){
        if(is_string($schedule)){
            $schedule = Schedule::whereId($schedule)->firstOrFail();
        }elseif (is_array($schedule)){
            $this->schedules()->sync($schedule);
            return true;
        }
        return $this->schedules()->sync($schedule);
    }
    public function courseType(){
        return $this->belongsTo(CourseType::class);
    }

    public function grade(){
        return $this->hasMany(Grade::class);
    }
}

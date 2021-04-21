<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function teacher(){
        return $this->belongsToMany(User::class,'course_user');
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
            $teacher = User::whereName($teacher)->firstOrFail();
        }elseif (is_array($teacher)){
            foreach ($teacher as $key => $teach){
                $teach = User::whereName($teach)->firstOrFail();
                $this->teacher()->sync($teach, false);
            }
            return true;
        }
        return $this->teacher()->sync($teacher, false);
    }

    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
    public function attachSchedule($schedule){
        if(is_string($schedule)){
            $schedule = Schedule::whereName($schedule)->firstOrFail();
        }elseif (is_array($schedule)){
            foreach ($schedule as $key => $time){
                $time = Schedule::whereName($time)->firstOrFail();
                $this->schedules()->sync($time, false);
            }
            return true;
        }
        return $this->schedules()->sync($schedule, false);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ReportCard extends Model
{
    protected $guarded = [];

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function grade(){

        return $this->hasMany(Grade::class);
    }
    public function school(){
        return $this->belongsTo(School::class);
    }
    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function studentInfo()
    {
        return $this->hasOneThrough(StudentInfo::class, User::class);
    }
    public function classes(){
        return $this->belongsTo(Classes::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comment(){
        return $this->hasMany(ReportCardComment::class);
    }
    public function comments($student){
        return $this->comment()->where('user_id', $student)->get();
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
}

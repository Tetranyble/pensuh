<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $fillable = ['session_id', 'group_id', 'school_type_id', 'section_id', 'father_name', 'father_phone_number',
        'father_email', 'father_national_id', 'father_designation', 'father_annual_income', 'father_occupation',
        'mother_name', 'mother_phone_number', 'mother_email', 'mother_national_id', 'mother_designation', 'mother_annual_income', 'mother_occupation', 'user_id'];
    protected $guarded = [];

    public function section(){
        return $this->belongsTo(Section::class);
    }
}

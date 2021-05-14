<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = ['school_id', 'school_type_id', 'name', 'description', 'amount'];

    public function schoolType(){
        return $this->belongsTo(SchoolType::class);
    }

    public function school(){
        return $this->belongsTo(School::class);
    }
}

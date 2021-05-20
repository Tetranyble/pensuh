<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fee extends Model
{
    use SoftDeletes;
    protected $fillable = ['school_id', 'school_type_id', 'name', 'description', 'amount'];

    public function schoolType(){
        return $this->belongsTo(SchoolType::class);
    }

    public function school(){
        return $this->belongsTo(School::class);
    }
}

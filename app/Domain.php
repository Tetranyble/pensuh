<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['domain', 'school_id'];

    public function school(){
        return $this->belongsTo(School::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['name', 'school_id', 'description', 'photo'];
    public function school(){
        return $this->belongsTo(School::class);
    }
}

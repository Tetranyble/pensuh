<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function school(){
        return $this->belongsTo(School::class);
    }
}

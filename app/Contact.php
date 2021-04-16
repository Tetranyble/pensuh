<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function classes(){
        return $this->belongsTo(Classes::class);
    }
}

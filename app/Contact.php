<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name' , 'email' , 'phone' , 'classes_id' , 'message', 'school_id'];

    public function classes(){
        return $this->belongsTo(Classes::class);
    }
}

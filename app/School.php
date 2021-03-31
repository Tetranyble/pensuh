<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }
}

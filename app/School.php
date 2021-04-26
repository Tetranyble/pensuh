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

    public function setCodeAttribute($value){
        $code = time();
        while(User::whereCode($code)->exists())
        {
            $code = time();
        }
        $this->attributes['code'] = $code;
    }
}

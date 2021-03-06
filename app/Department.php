<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];
    public function teachers(){
        return $this->hasMany('App\User','department_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}

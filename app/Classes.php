<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Classes extends Model
{
    protected $guarded = [];

    public function sections(){
        return $this->hasMany(Section::class);
    }

    /**
     * @param array $sections section of a class[es]
     * @return bool
     */
    public function giveSections($sections = []){
        if (is_array($sections)){
            foreach ($sections as $key => $class){
                $this->sections()->save($class)->withTimestamps();
            }
            return true;
        }
        return $this->sections()->save($sections)->withTimestamps();
    }
    public function syllabus(){
        return $this->belongsTo(Syllabus::class);
    }
    public function setSlugAttribute($value)
    {
        $slug = Str::lower($this->attributes['name']);
        $i = 0;
        while(Classes::whereSlug($slug)->exists())
        {
            $i++;
            $slug =  $slug . $i;
        }
        $this->attributes['slug'] = $slug;
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Blog extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function assignTags( $tags ){
        if(is_string($tags)){
            $tags = Tag::whereName($tags)->firstOrFail();
        }elseif (is_array($tags)){
            foreach ($tags as $key => $tag){
                $tag = Tag::whereName($tag)->firstOrFail();
                $this->tags()->sync($tag, false);
            }
            return true;
        }
        return $this->tags()->sync($tags, false);
    }
    public function assignCategories( $categories ){
        if(is_string($categories)){
            $categories = Category::whereName($categories)->firstOrFail();
        }elseif (is_array($categories)){
            foreach ($categories as $key => $category){
                $tag = Category::whereName($category)->firstOrFail();
                $this->categories()->sync($category, false);
            }
            return true;
        }
        return $this->categories()->sync($categories, false);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

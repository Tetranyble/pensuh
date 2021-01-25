<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $fillable = [
        'name', 'email', 'password','gender', 'student_code', 'role_id', 'blood_group', 'nationality', 'phone', 'address', 'about', 'photo', 'department',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo(Role::class)->withTimestamps();
    }

    public function assignRole($role){
        if(is_string($role)){
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->sync($role, false)->withTimestamps();
    }

    public function permissions(){
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }

    public function classes(){
        return $this->belongsToMany(Section::class)->withTimestamps();
    }
    public function assignClasses($classes){
        if(is_string($classes)){
            $section = Section::whereName($classes)->firstOrFail();
        }elseif (is_array($classes)){
            foreach ($classes as $key => $class){
                $class = Section::whereName($class)->firstOrFail();
                $this->classes()->sync($class, false)->withTimestamps();
            }
            return true;
        }
        return $this->classes()->sync($section, false)->withTimestamps();
    }
}

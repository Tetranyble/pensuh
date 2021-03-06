<?php

namespace App;

use App\Mail\SchoolAdminCreation;
use Facade\Ignition\Solutions\SolutionTransformer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Lab404\Impersonate\Models\Impersonate;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Impersonate;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'email', 'password','gender_id', 'code','date_of_birth', 'username',
        'blood_group_id', 'nationality_id', 'religion_id', 'phone', 'address', 'about', 'photo','twitter','active',
        'facebook','instagram','linkedin','school_id','address', 'signature'
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_of_birth',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($role){
        if(is_string($role)){
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->sync($role, false);
    }
    public function removeRole($role){
        if(is_string($role)){
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->detach($role);
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

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function hostEvents(){
        return $this->hasMany(Event::class, 'host_id');
    }

    public function formTeacher(){
        return $this->belongsToMany(Section::class);
    }
    public function courses(){
        return $this->belongsToMany(Course::class, 'course_user');
    }
    public function setLastnameAttribute($value){
        $this->attributes['lastname'] = Str::title($value);
    }
    public function setFirstnameAttribute($value){
        $this->attributes['firstname'] = Str::title($value);
    }
    public function setUsernameAttribute($value)
    {
        $firstName = Str::lower(isset($this->attributes['firstname']) ? $this->attributes['firstname'] : $value);
        $lastName = Str::lower(isset($this->attributes['lastname']) ? $this->attributes['lastname'] : $value);

        $username = $firstName . '.' . $lastName;

        $i = 0;
        while(User::whereUsername($username)->exists())
        {
            $i++;
            $username = $firstName . '.' . $lastName . $i;
        }

        $this->attributes['username'] = $username;
    }
    public function setCodeAttribute($value){
        $code = time();
        while(User::whereCode($code)->exists())
        {
            $code = time();
        }
        $this->attributes['code'] = $code;
    }
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function getDateOfBirthAttribute($value){
        return Carbon::parse($value)->format('F j, Y');
    }

    public function teacherQualification(){
        return $this->hasOne(TeacherQualification::class);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getLongNameAttribute()
    {
        $full = "{$this->firstname} {$this->middlename} {$this->lastname}";
        return Str::title($full);
    }

//    public function setUDateOfBirthAttribute($value){
//
//        $this->attributes['date_of_birth']  = Carbon::createFromFormat('d-m-y', $value)->format('Y-m-d');
//    }

    public function studentInfo(){
        return $this->hasOne(StudentInfo::class);
    }
    public function group(){
        return $this->belongsToMany(Group::class);
    }
    public function blood(){
        return $this->belongsTo(BloodGroup::class, 'blood_group_id');
    }
    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function nationality(){
        return $this->belongsTo(Nationality::class);
    }
    public function religion(){
        return $this->belongsTo(Religion::class);
    }

    public function grade(){
        return $this->hasMany(Grade::class,'student_id');
    }

    /*
     *
     * Impersonation sections
     * */
    /**
     * @return bool
     */
    public function canImpersonate()
    {
        return auth()->user()->roles->flatten()->pluck('slug')->contains('master');
    }
    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        // For example
        return !auth()->user()->roles->flatten()->pluck('slug')->contains('master');
    }

    public function grading(){
        return $this->hasMany(Grade::class,'student_id')->where('report_card_id', null);
    }
}

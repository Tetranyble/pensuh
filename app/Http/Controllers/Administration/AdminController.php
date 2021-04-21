<?php

namespace App\Http\Controllers\Administration;

use App\BloodGroup;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Nationality;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
//use Intervention\Image\Image;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function create(){
        $nationalities = Nationality::get();
        $genders = Gender::get();
        $bloods = BloodGroup::get();
        return view('frontend.admin.create', compact('nationalities', 'genders', 'bloods'));
    }
    public function store(Request $request){
//        dd($request->all());
        //phpinfo();
        //dd('hello');
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'gender_id' => 'required|numeric',
            'blood_group_id' => 'required|numeric',
            'nationality_id' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'about' => 'nullable|max:255',
            'twitter' => 'nullable|max:255',
            'facebook' => 'nullable|max:255',
            'linkedin' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'photo' => 'nullable|mimes:jpeg,png,jpg|max:10240',
        ]);
        if ($request->has('photo')){
            $photo = $request->file('photo');
            $photos = Image::make($photo->getRealPath())->resize(371, 505);
            $newName = time() . Str::slug($request->get('lastname')) . '.' . $photo->getClientOriginalExtension();
            $photos->save(storage_path('app/public/'.$newName));

            $request->merge(['photo' => $newName]);
        }
        $request->merge([ 'password' => Hash::make($request->get('password')), 'school_id' => '1', 'username' => $request->get('firstname').'.'. $request->get('lastname') ]);
        DB::transaction(function () use($request){
            User::create($request->all())->assignRole('principal');
        });

        return redirect()->back()->with('success', 'Account created successfully');

    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreStaffRequest extends FormRequest
{
    public function passedValidation()
    {
        $this->merge([
            'username' => Str::slug($this->firstname . '.' . $this->lastname),
            'code' => time(),
            'school_id' => auth()->user()->school->id,
            'password' => Hash::make($this->pass)
        ]);
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'religion_id' => 'required|numeric',
            'gender_id' => 'required|numeric',
            'blood_group_id' => 'required|numeric',
            'nationality_id' => 'required|numeric',
            'phone' => 'required|numeric|unique:users,phone',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date|date_format:Y-m-d',
            'about' => 'nullable|max:255',
            'photo_x' => 'nullable|mimes:jpeg,png,jpg|max:10240',
            'school_type_id' => 'required|numeric',

            'roles' => 'required|array',

            'pass' => 'required|string|min:8|confirmed',
            'twitter' => 'nullable|max:255',
            'facebook' => 'nullable|max:255',
            'linkedin' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',

            'department_id' => 'required|numeric',
            'education' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:6000',
            'experience' => 'nullable|string|max:255',
            'teaching' => 'nullable|numeric',
            'family_support' => 'nullable|numeric',
            'speaking' => 'nullable|numeric',
            'children_well_being' => 'nullable|numeric'
        ];
    }
}

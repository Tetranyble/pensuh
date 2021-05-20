<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreStudentRequest extends FormRequest
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
            'pass' => 'required|string|min:8|confirmed',
            'gender_id' => 'required|numeric',
            'blood_group_id' => 'required|numeric',
            'nationality_id' => 'required|numeric',
            'phone' => 'required|numeric|unique:users,phone',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date|date_format:Y-m-d',
            'about' => 'nullable|max:255',
            'photo_x' => 'nullable|mimes:jpeg,png,jpg|max:10240',
            'twitter' => 'nullable|max:255',
            'facebook' => 'nullable|max:255',
            'linkedin' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',

            'counsellor_id' => 'required|numeric',
            'session_id' => 'required|numeric',
            'group_id' => 'nullable|numeric',
            'religion_id' => 'required|numeric',
            'school_type_id' => 'required|numeric',
            'section_id' => 'required|numeric',
            'father_name' => 'required|string|max:255',
            'father_phone_number' => 'required|string|max:255',
            'father_email' => 'required|email|max:255',
            'father_national_id' => 'nullable|string|max:255',
            'father_designation' => 'nullable|string|max:255',
            'father_annual_income' => 'nullable|string|max:255',
            'father_occupation' => 'nullable|string|max:255',

            'mother_name' => 'required|string|max:255',
            'mother_phone_number' => 'required|string|max:255',
            'mother_email' => 'required|email|max:255',
            'mother_national_id' => 'nullable|string|max:255',
            'mother_designation' => 'nullable|string|max:255',
            'mother_annual_income' => 'nullable|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
        ];
    }
}

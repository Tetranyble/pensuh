<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreTeacherRequest extends FormRequest
{
    public function passedValidation()
    {
        $this->merge([
            'username' => Str::slug($this->firstname . '.' . $this->lastname),
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
            'school_id' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'gender_id' => 'required|numeric',
            'blood_group_id' => 'required|numeric',
            'nationality_id' => 'required|numeric',
            'phone' => 'required|numeric|unique:users,phone',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'about' => 'nullable|max:255',
            'photo_x' => 'nullable|mimes:jpeg,png,jpg|max:10240',
            'twitter' => 'nullable|max:255',
            'facebook' => 'nullable|max:255',
            'linkedin' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',

        ];
    }
}

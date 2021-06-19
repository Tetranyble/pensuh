<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorStoreAdminRequest extends FormRequest
{
    public function passedValidation()
    {
        $password = time().'peNsuH ';
        $this->merge([
            'role' => 'principal',
            'password' => Hash::make($password),
            'pass' => $password,
            'username' => Str::slug($this->firstname . '.' . $this->lastname)
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
            'lastname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'address' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:users,phone',
            'school' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'school_id' => 'required|numeric'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
//        $this->merge([
//            'authorization' => auth()->user()->roles->flatten()->pluck('slug')->contains('master') ? 'master' : ''
//        ]);
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
//            'old-password' => 'required_unless:authorization,null',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}

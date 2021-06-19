<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{


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
            'name' => 'required|min:3|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
            'classes_id' => 'nullable|numeric',
            'message' => 'required|string|max:6000'
        ];
    }
}

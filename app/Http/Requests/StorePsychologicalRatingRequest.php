<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePsychologicalRatingRequest extends FormRequest
{
    public function passedValidation()
    {
        $this->merge([
            'school_id' => auth()->user()->school->id
        ]);
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->roles->flatten()->pluck('slug')->contains('principal');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'key' => 'required|numeric',
            'name' => 'required|string|max:255'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicCalendarRequest extends FormRequest
{
    public function passedValidation()
    {
        $this->merge([
            'school_id' => auth()->user()->school->id,
            'active' => 1,
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
            'name' => 'required|string|max:255',
            'resumption' => 'required|date',
            'vacation' => 'required|date',
            'body' => 'required|string|max:6000',
            'session_id' => 'required|numeric',
        ];
    }
}

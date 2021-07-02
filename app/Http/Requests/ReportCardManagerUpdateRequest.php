<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportCardManagerUpdateRequest extends FormRequest
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
            'id.*' => 'required|numeric',
            'punctuality.*' => 'required|numeric|between:0,5',
            'attendance.*' => 'required|numeric|between:0,5',
            'attentiveness.*' => 'required|numeric|between:0,5',
            'initiative.*' => 'required|numeric|between:0,5',
            'perseverance.*' => 'required|numeric|between:0,5',
            'carrying_out_assignment.*' => 'required|numeric|between:0,5',
            'organisational_ability.*' => 'required|numeric|between:0,5',
            'neatness.*' => 'required|numeric|between:0,5',
            'politeness.*' => 'required|numeric|between:0,5',
            'honesty.*' => 'required|numeric|between:0,5',
            'self_control.*' => 'required|numeric|between:0,5',
            'spirit_of_cooperation.*' => 'required|numeric|between:0,5',
            'obedience.*' => 'required|numeric|between:0,5',
            'sense_of_responsibility.*' => 'required|numeric|between:0,5',
            'public_speaking.*' => 'required|numeric|between:0,5',
            'handwriting.*' => 'required|numeric|between:0,5',
            'handling_of_tools.*' => 'required|numeric|between:0,5',
            'drawing.*' => 'required|numeric|between:0,5',
            'painting.*' => 'required|numeric|between:0,5',
            'sculpture.*' => 'required|numeric|between:0,5',
            'relationship_with_others.*' => 'required|numeric|between:0,5',
            'participation_in_school_arts.*' => 'required|numeric|between:0,5',
        ];
    }
}

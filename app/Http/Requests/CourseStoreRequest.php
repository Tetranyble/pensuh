<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CourseStoreRequest extends FormRequest
{
    public function passedValidation()
    {
        $this->merge([
            'school_id' => auth()->user()->school->id,
            'slug' => Str::slug($this->name)
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
            'section_id' => 'required|numeric',
            'course_type_id' => 'required|numeric',
            'body' => 'required|string|max:6000',
            'banner_x' => 'nullable|mimes:jpeg,png,jpg|max:3240|dimensions:min_width=1919,min_height=700',
            'photo_x' => 'nullable|mimes:jpeg,png,jpg|max:3240|dimensions:min_width=800,min_height=533',
            'schedule_id' => 'required|array',
            'duration' => 'required|string|max:255',
            'teacher' => 'required|array',
        ];
    }
}

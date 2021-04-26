<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
            'established' => 'required|numeric',
            'language_id' => 'required|numeric|max:11',
            'school_name' => 'required|string|max:255',
            'school_name_code' => 'required|string|max:10',
            'theme' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'work_time' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_phone' => 'required|numeric',
            'school_excerpt' => 'required|string|max:255',
            'school_excerpt_header' => 'required|string|max:255',
            'school_welcome_header' => 'required|string|max:255',
            'school_welcome_body' => 'required|string|max:255',
            'school_class_header' => 'required|string|max:255',
            'school_class_body' => 'required|string|max:255',
            'school_teacher_header' => 'required|string|max:255',
            'school_teacher_body' =>'required|string|max:255',
            'map' => 'required|string|max:5000',
            'school_news_header' => 'required|string|max:255',
            'school_news_body' => 'required|string|max:255',
            'school_event_header' => 'required|string|max:255',
            'school_event_body' => 'required|string|max:255',
            'teacher_support' => 'required|string|max:255',
            'teacher_support_body' => 'required|string|max:255',
            'certificate_acceptance' => 'required|string|max:255',
            'certificate_acceptance_body' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'program_body' =>'required|string|max:255',
            'support' =>'required|string|max:255',
            'support_body' => 'required|string|max:255',
            'mission_header' => 'required|string|max:255',
            'mission_body' => 'required|string|max:255',
            'benefit_header' =>'required|string|max:255',
            'benefit_body' => 'required|string|max:255',

            'about_image_x' => 'nullable|mimes:jpeg,png,jpg|max:1240|dimensions:min_width=601,min_height=645',
            'banner_image_x' => 'nullable|mimes:jpeg,png,jpg|max:1240|dimensions:min_width=497,min_height=586', //497*586
            'blog_banner_x' => 'nullable|mimes:jpeg,png,jpg|max:1240|dimensions:min_width=1340,min_height=894', //1340*894
            'course_banner_x' => 'nullable|mimes:jpeg,png,jpg|max:1240|dimensions:min_width=1170,min_height=400', //1170*400
            'school_logo_x' => 'nullable|mimes:jpeg,png,jpg|max:1240|dimensions:min_width=162,min_height=57',
            'event_image_x' => 'nullable|mimes:jpeg,png,jpg|max:1240|dimensions:min_width=476,min_height=526', //476*526
            'mission_image_x' => 'nullable|mimes:jpeg,png,jpg|max:1240|dimensions:min_width=575,min_height=592', //575*592
            'favicon_x' => 'nullable|mimes:ico,png|max:1240|dimensions:max_width=32,max_height=32', //32*32
        ];
    }
}

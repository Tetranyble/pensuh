<?php

namespace App\Http\Requests;

use App\Rules\Favicon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFaviconRequest extends FormRequest
{
    public function passedValidation()
    {
        $this->merge([
            'school_id' => auth()->user()->id
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
            'favicon_x' => ['required', new Favicon()]
        ];
    }
}

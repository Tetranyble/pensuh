<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;


class AttendanceStoreRequest extends FormRequest
{

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'school_id' => auth()->user()->school->id,
            'attendant' => auth()->user()->id,
        ]);
    }
    public function passedValidation()
    {
        $user = User::whereCode($this->user)->firstOrFail();
        $this->merge([
            'user_id' => $user->id
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
            'attendance_type_id' => 'required|numeric',
            'user' => 'required|numeric|exists:users,code',
            'present' => 'required|numeric',
            'school_id' => 'required|numeric',
            'attendant' => 'required|numeric'
        ];
    }
}

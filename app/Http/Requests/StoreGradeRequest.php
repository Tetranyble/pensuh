<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
{

    public function passedValidation()
    {
        $this->merge([
            'school_id' => auth()->user()->school->id,
            'user_id' => auth()->user()->id,
        ]);
    }
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {

        $sum = [];
        $partial = [];
        foreach ($this->id as $key => $grade ){
        array_push($partial, $this->resumption_test[$key]);
        array_push($partial, $this->note[$key]);
        array_push($partial, $this->project[$key]);
        array_push($partial, $this->classwork[$key]);
        array_push($partial, $this->assignment[$key]);
        array_push($partial, $this->midterm_test[$key]);
        array_push($partial, $this->attendance[$key]);
        array_push($partial, $this->exam[$key]);
        array_push($sum,array_sum($partial));
        $partial = [];
        }

        $this->merge([
            'sum' => $sum,
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

            'resumption_test.*' => 'nullable|numeric|between:0,5',
            'project.*' => 'nullable|numeric|between:0,2',
            'note.*' => 'nullable|numeric|between:0,8',
            'classwork.*' => 'nullable|numeric|between:0,15',
            'assignment.*' => 'nullable|numeric|between:0,15',
            'midterm_test.*' => 'nullable|numeric|between:0,10',
            'attendance.*' => 'nullable|numeric|between:0,8',
            'exam.*' => 'nullable|numeric|between:0,100',
            't' => 'required|numeric',
            'c' => 'required|numeric',
            'grade_system_name' => 'required|string|min:2',
//            'grade_system_name' => 'required|string',
            'sum' => 'required',
            'sum.*' => 'numeric|between:1,100'
        ];
    }
}

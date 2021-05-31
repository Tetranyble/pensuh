<?php

namespace App\Http\Requests;

use App\ReportCardComment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReportCardCommentRequest extends FormRequest
{
    public function passedValidation()
    {

        $this->merge([
            'school_id' => auth()->user()->school->id,
            'comment_by' => auth()->user()->id
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
            'comment' => 'required|string|max:255',
            'user_id' => 'required|numeric',
            'report_card_id' => 'required|numeric',
            'role' => 'required|string|max:50',

        ];
    }
}

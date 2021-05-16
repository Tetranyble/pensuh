<?php

namespace App\Http\Requests;

use App\Services\ReportCard\GradeService;
use Illuminate\Foundation\Http\FormRequest;

class ReportCardManagerRequest extends FormRequest
{
    protected $gradeService;
    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null, GradeService $gradeService)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
        $this->gradeService = $gradeService;
    }

    public function passedValidation()
    {
        $exam = $this->gradeService->schoolExam();
        $this->merge([
            'school_id' => auth()->user()->school->id,
            'exam_id' => $exam->id
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
            'form_teacher' => 'required|numeric',
            'section' => 'required|numeric'
        ];
    }
}

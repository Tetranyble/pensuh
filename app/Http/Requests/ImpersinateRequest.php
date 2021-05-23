<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class ImpersinateRequest extends FormRequest
{
    public function passedValidation()
    {

        if ($this->school){
            $user = User::where('school_id', $this->school)->whereHas('roles',function ($q){$q->where('slug', 'admin')
                ->orWhere('slug', 'principal')->orWhere('slug', 'vice_principal_admin')
                ->orWhere('slug', 'vice_principal_academy');})
                ->first();
            abort_unless($user, 404);
            $this->request->remove('id');
            $this->merge([
                'id' => $user->id
            ]);

        }
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->roles->flatten()->pluck('slug')->contains('master');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|numeric|exists:users,id',
            'school' => 'nullable|numeric|exists:schools,id',
        ];
    }
}

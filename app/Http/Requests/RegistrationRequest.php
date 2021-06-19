<?php

namespace App\Http\Requests;

use App\Services\Schools;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function passedValidation()
    {
        $name = explode(' ', $this->name);
        $role = isset($this->vendor) ? 'vendor' : 'creator';
        if (count($name) >= 2){
            $this->merge([
                'username' => $name[0],
                'firstname' => $name[0],
                'lastname' => $name[1],
                'school_id' => Schools::schoolId(),
                'role' => $role
            ]);
        }else{
            $this->merge([
                'username' => $this->name,
                'firstname' => $this->name,
                'lastname' => $this->name,
                'school_id' => Schools::schoolId(),
                'role' => $role
            ]);
        }

        $this->request->remove('name');
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->all());
        return [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'vendor' => ['nullable']
        ];
    }
}

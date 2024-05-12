<?php

namespace App\Http\Requests\api;

use App\Http\Requests\api\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
          'email'=>'required|email',
          'password'=>'required'
        ];
    }
    public function messages(){
        return [
            'require'=>':attribute Không được để trống',
            'email.email'=>':attribute sai định dạng'
        ];
    }
}

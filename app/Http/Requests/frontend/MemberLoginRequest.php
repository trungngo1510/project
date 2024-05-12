<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class MemberLoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|email',
            'password'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute Không được để trống',
            'email.email' => ':attribute sai định dạng '
        ];
    }
}

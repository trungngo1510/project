<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'=>'required|max:191',
            'email'=>'required|email',
            'address'=>'required',
            'phone' => 'required',
            'avatar'=>'required|image|mines:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages(){
        return [
            'required'=>':attribute Khong duoc de trong',
            'max'=>':attribute khong duoc qua ki tu :max ky tu',
            'image'=>':attribute phai la hinh anh',
            'mines'=>':attribute dinh dang phai la:png,jpeg,jpg',
            'image.max'=>':attribute file anh toi da :max'
        ];
    }
}

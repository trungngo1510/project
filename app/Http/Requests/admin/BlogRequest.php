<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title'=>'required|max:191',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=>'required',
           
        ];
    }
    public function messages(){
        return [
            'required'=>':attribute Không được để trống',
            'max'=>':attribute Không được quá :max ký tự',
            'image'=>':attribute Phải là hình ảnh',
            'mimes'=>':attribute Phải định dạng như sau:jpeg,png,jpg,gif',
            'image.max'=>':attribute Hình ảnh không được quá :max dung lượng',
        ];
    }
}

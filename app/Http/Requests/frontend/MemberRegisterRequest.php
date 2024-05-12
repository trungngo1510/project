<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class MemberRegisterRequest extends FormRequest
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
            'password'=>'required',
            'email' => 'required|email|unique:users',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute :Không được để trống',
            'max'=>':attribute :Không được quá :max ký tự',
            'email.email' => ':attribute :email sai định dạng',
            'email.unique' => ':attribute :email đã tồn tại',
            'avatar' => ':attribute : Hình ảnh upload lên phải là hình ảnh',
            'mimes' => ':attribute : Hình ảnh upload lên phải định dạng như sau:jpeg,png,jpg,gif',
            'avatar.max' => ':attribute : Hình ảnh upload lên vướt quá kích thước cho phép :max'
        ];
    }
}

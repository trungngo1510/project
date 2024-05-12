<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>'max:50|min:5',
            'price'=>'integer',
            'company'=>'max:20',
            'image.*'=>'image|mines:jpeg,png,jpg',
        ];
    }
    public function messages()
    {
        return [
            'max'=>':attribute cannot more than :max character',
            'min'=>':attribute cannot less than :min character',            
            'integer' =>':attribute only accepts number',
            'image' => 'Image only allow image file',
            'mimes' => 'Image must be a file of type: :values',
        ];
    }
}

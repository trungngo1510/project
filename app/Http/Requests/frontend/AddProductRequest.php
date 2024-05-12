<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=>'required|min:5|max:50',
            'price'=>'required',
            'id_category'=>'required',
            'id_brand'=>'required',
            'status'=>'required',
            'company'=>'required|min:5|max:20',
            'image'=>'required',
            'image.*'=>'image|mimes:jpeg,png,jpg',
            'detail'=>'required',
        ];
    }
    public function messages(){
        return [
            'id_category.required'=>'Please choose category',
            'id_brand.required' => 'Please choose brand',
            'required'=>'Please enter :attribute',
            'max'=>':attribute cannot more than :max character',
            'min'=>':attribute cannot less than :min character',            
            'integer' =>':attribute only accepts number',
            'image' => 'Image only allow image file',
            'mimes' => 'Image must be a file of type: :values',
        ];
    }
}

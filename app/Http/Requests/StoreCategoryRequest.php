<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
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
            'cate_name' => 'required|unique:categories|max:255,'.$this->id,
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' =>'Please enter the name',
            'cate_name.unique' =>'The item name is already registered',
            'description.required' =>'Please enter a description',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('id', 0);
        return [
            'name' => "required|string|max:255|min:3|unique:categories,name,$id",
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:200|dimensions:min_width=150,min_height=150',
            'status' => 'in:public,archived,private',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field (:attribute) is required',
            'name.unique' => 'This name is already used',
            //'description.required' => 'الوصف مطلوب',
        ];
    }
}

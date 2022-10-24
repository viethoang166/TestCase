<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
        dd($this->all());
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('schools')->ignore($this->school)],
            'email' => [
                'required', 
                'string',
                'email',
                'regex:/^[a-zA-Z@.0-9]+$/',               
                Rule::unique('schools')->ignore($this->school)
            ],
            'phone' => ['required', 'numeric', 'digits_between:9,11'],
            'image' => 'present|array|max:5',
            'image.*' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'banner' => 'required',
            'address' => ['required', 'string',],
            'infor' => 'required',
            'major_ids' => ['required', 'array'],
            'country_id' => 'required',
            'city_id' => 'required',
            'min_price' =>'required|numeric|starts_with:1,2,3,4,5,6,7,8,9|regex:/^\d+(\.\d{1,3})?$/' ,
            'max_price' => 'required|numeric|starts_with:1,2,3,4,5,6,7,8,9|regex:/^\d+(\.\d{1,3})?$/|gt:min_price',
        
        ];
    }
}

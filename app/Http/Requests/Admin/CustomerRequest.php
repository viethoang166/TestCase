<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z@.0-9]+$/',
                Rule::unique('customers')->ignore($this->customer),
            ],
            'phone' => 'required|numeric',
            'password' => [
                'required',
                'min:8',
                'max:200',
            ],
            'age' => 'required|numeric',
            'sex' => 'required',
            'active' => 'required',
        ];
    }
}

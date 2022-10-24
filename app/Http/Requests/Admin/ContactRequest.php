<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'hotline' => 'required|numeric|digits_between:9,11',
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z@.0-9]+$/',
            ],
            'address' => 'required',
            'facebook' => 'required',
            'zalo' => 'required|numeric|digits_between:9,11',
            'map' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CityRequest extends FormRequest
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
            'image.*' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'country_id' => [
                'required',
                'numeric',
                'gt:0',
                Rule::exists('countries', 'id'),
            ],
        ];
    }
}

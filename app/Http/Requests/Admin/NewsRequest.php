<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|max:250',
            'content' => 'required',
            'status' => 'required|boolean',
            'image' => 'present|array|max:5',
            'image.*' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'banner' => 'required',
            'type' => 'required|boolean'
        ];
    }
}

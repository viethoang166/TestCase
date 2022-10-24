<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserRequest extends FormRequest
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
                Rule::unique('users')->ignore($this->user),
            ],
            'phone' => 'required|numeric',
            'address' => 'required',
            'age' => 'required|numeric',
            'password' => [
                'required_with:password_confirmation',
                'min:8',
                'max:200',
                'confirmed',
            ],
            'sex' => 'required',
            'avata' => 'nullable',
            'active' => 'boolean',
            'type' => ['numeric', Rule::in(User::TYPES)],
        ];
    }
}

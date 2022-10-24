<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required|max:250',
            'note' => 'required',
            'majors_id' => 'required',
            'tuition' => 'required|starts_with:1,2,3,4,5,6,7,8,9|regex:/^\d+(\.\d{1,3})?$/',
            'timestart'  =>  'required|after:today',
            'timeend'    =>  'required|date|after_or_equal:timestart'

        ];
    }
}

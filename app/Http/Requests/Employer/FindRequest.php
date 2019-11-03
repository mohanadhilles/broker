<?php

namespace App\Http\Requests\Employer;

use Illuminate\Foundation\Http\FormRequest;

class FindRequest extends FormRequest
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
            'job_type'=>'required|string',
            'wanted_at'=>'required|date',
            'salary'=>'required',
            'employer'=>'string',
            'place_size'=>'required',
            'place'=>'required',
            'country'=>'required',
            'gender'=>'required',
            'bed_rooms'=>'required',
            'child_no'=>'required',
            'type'=>'string',
        ];
    }
}

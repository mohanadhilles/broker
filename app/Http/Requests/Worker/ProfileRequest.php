<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'string',
            'whats_app'=>'numeric',
            'experience'=>'string',
            'worked_in'=>'string',
            'place_of_birth'=>'string',
            'job_type'=>'string',
            'nationality'=>'string',
            'arabic_lang'=>'string',
            'mandarin_lang'=>'string',
            'english_lang'=>'string',
            'currency'=>'string',
            'religion'=>'string',
            'skills'=>'string',
            'phone'=>'required|string',
            'date_of_birth'=>'date',
            'available_at'=>'date',
            'facebook'=>'required|string',
            'passport'=>'string',
            'passport_date_of_issue'=>'date',
            'passport_date_of_exp'=>'date',
            'exp_visa'=>'date',
            'marital_status'=>'string',
            'no_of_child'=>'numeric',
            'height'=>'numeric',
            'completion'=>'string',
            'weight'=>'numeric',
            'gender'=>'string',
            'bio'=>'required',
            'salary'=>'numeric',
            'education'=>'string',
            'country'=>'string'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


}

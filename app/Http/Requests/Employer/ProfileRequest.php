<?php

namespace app\Http\Requests\Employer;

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
            'name'=>'required',
            'email'=>'null',
            'password'=>'required',
            'brand'=>'null',
            'whats_app'=>'required',
            'experience'=>'null',
            'worked_in'=>'null',
            'place_of_birth'=>'null',
            'job_type'=>'null',
            'nationality'=>'required',
            'arabic_lang'=>'null',
            'mandarin_lang'=>'null',
            'english_lang'=>'null',
            'currency'=>'null',
            'religion'=>'null',
            'skills'=>'null',
            'phone'=>'required',
            'date_of_birth'=>'required',
            'photo'=>'null',
            'cv'=>'null',
            'available_at'=>'null',
            'date_join_training_center'=>'null',
            'age'=>'null',
            'status'=>'null',
            'city'=>'null',
            'facebook'=>'required',
            'passport'=>'null',
            'passport_date_of_issue'=>'null',
            'passport_date_of_exp'=>'null',
            'exp_visa'=>'null',
            'marital_status'=>'null',
            'no_of_child'=>'null',
            'height'=>'null',
            'completion'=>'null',
            'weight'=>'null',
            'gender'=>'null',
            'bio'=>'null',
            'code'=>'null',
            'provider_id'=>'null',
            'salary'=>'null',
            'education'=>'null',
            'country'=>'null'
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

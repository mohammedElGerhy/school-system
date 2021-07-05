<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentsRequest extends FormRequest
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
            //validate Father
            'Email' => 'required|unique:my__parents,Email,'.$this->id,
            'Password' => 'required_without:id',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my__parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
//validate Mother
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my__parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'Email.required' => trans('validation.required'),
            'Password.required' => trans('validation.required'),
            'Name_Father.required' => trans('validation.required'),
            'Name_Father_en.required' => trans('validation.required'),
            'Job_Father.required' => trans('validation.required'),
            'Job_Father_en.required' => trans('validation.required'),
            'National_ID_Father.required' => trans('validation.required'),
            'Passport_ID_Father.required' => trans('validation.required'),
            'Phone_Father.required' => trans('validation.required'),
            'Blood_Type_Father_id.required' => trans('validation.required'),
            'Nationality_Father_id.required' => trans('validation.required'),
            'Religion_Father_id.required' => trans('validation.required'),
            'Address_Father.required' => trans('validation.required'),
            'Name_Mother.required' => trans('validation.required'),
            'Name_Mother_en.required' => trans('validation.required'),
            'National_ID_Mother.required' => trans('validation.required'),
            'Passport_ID_Mother.required' => trans('validation.required'),
            'Phone_Mother.required' => trans('validation.required'),
            'Job_Mother.required' => trans('validation.required'),
            'Job_Mother_en.required' => trans('validation.required'),
            'Nationality_Mother_id.required' => trans('validation.required'),
            'Blood_Type_Mother_id.required' => trans('validation.required'),
            'Religion_Mother_id.required' => trans('validation.required'),
            'Address_Mother.required' => trans('validation.required'),

        ];
    }
}

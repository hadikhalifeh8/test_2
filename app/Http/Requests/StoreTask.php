<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest
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
            'name' =>'required',
            'user_id'=>'required',
            'department_id'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'please Enter the name',

            'user_id.required' => 'please Enter user',
           

            'department_id.required' => 'please Enter the department',

        
            

        ];
    }
}

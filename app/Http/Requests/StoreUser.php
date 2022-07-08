<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'email'=>'required|email|unique:users,email,'.$this->id,
            'department_id'=>'required',
            
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'please Enter the name',

            'email.required' => 'please Enter the Email',
            'email.email' => 'Must Be an Email Address @',
            'email.unique' => 'This Email already Exist, Please Enter a New Email Address',

            'password.required' => 'please Enter the password',

            'department_id.required' => 'please Enter the Department',
            

        ];
    }
}

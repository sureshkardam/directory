<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mannysoft\ApiFormRequest\ApiFormRequest;

class RegisterRequest extends ApiFormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
        ];
    }


    /*public function messages(){
        return [
            'company_name.required'=>'Please fill company name',
            'first_name.required' => 'Please fill name',
            'mobile.required' => 'The mobile number must be 10 digits',
            'email.required' => 'Please fill email address',
            'password.required' => 'Please fill password',
            'g-recaptcha-response.required' => 'Please fill the captcha',
            
        ];
    }
    */
}

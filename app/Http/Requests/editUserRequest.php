<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;


class editUserRequest extends FormRequest
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
            'name'=>'required',
            'password' => 'required',
            'email'=>'required',
            // 'oldpassword' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' =>'Vui lòng nhập tài khoản',
            'password.required' =>'Vui lòng nhập password',
            'email.required' =>'Vui lòng nhập Email',
            // 'oldpassword.required' =>'Vui lòng nhập mật khẩu cũ'
        ];

    }
}

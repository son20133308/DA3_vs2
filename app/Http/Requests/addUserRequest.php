<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class addUserRequest extends FormRequest
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
            
            'email' => 'required|email|unique:users,email',
            'name' => 'required|unique:users,name',
            'password' =>'required',
            'confirm_password'=>'required|same:password',
 

        ];
    }
    public function messages(){
        return [
            
            
            'email.required' => 'Vui lòng nhập Email',
            'email.unique' => 'Email này đã được sử dụng',
            'name.required' => 'Vui lòng nhập Tài khoản',
            'name.unique'=>'Tài khoản đã tồn tại',
            'password.required' =>' Vui lòng nhập Mật',
            'confirm_password.required'=>'Vui lòng nhập Xác thực mật khẩu',
            'confirm_password.same'=>'Xác thực mật khẩu không chính xác',
            
        ];
    }
}

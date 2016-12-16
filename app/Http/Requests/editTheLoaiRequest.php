<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editTheLoaiRequest extends FormRequest
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
            'ten' => 'required',
            'slug'=>'required'
        ];
    }
    public function messages(){
        return [
            'ten.required' => 'Vui lòng nhập tên thể loại',
            'slug.required'=>'Vui lòng nhập ẩn danh'
        ];
    }
}

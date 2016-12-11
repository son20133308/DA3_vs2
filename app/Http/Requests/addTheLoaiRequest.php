<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\theloai;

class addTheLoaiRequest extends FormRequest
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
            'ten' => 'required|unique:tbl_theloai,ten',
            // 'id_theloai' =>'required|unique:tbl_theloai,id_theloai'
            'slug'=>'unique:tbl_theloai,slug'
        ];
    }
    public function messages(){
        return [
            // 'id_theloai.required' => 'Vui lòng nhập Id thể loại',
            // 'id_theloai.unique' => 'Id đã tồn tại',
            'ten.required' => 'Vui lòng nhập tên thể loại',
            'ten.uniqie'   => 'Thể loại này đã tồn tại',
            'slug.unique'=>'Ẩn danh này đã tồn tại'
        ];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\danhgiaRequest;
use App\Models\danhgia;

class danhgiaController extends Controller
{
    public function gui_danh_gia(danhgiaRequest $request){
        $danhgia = new danhgia();
        $danhgia->email_khachhang = $request->email;
        $danhgia->noidung = $request->content;
        $danhgia->save();
        return redirect()->route('main')->with(['flash_level' => 'result_msg', 'flash_message' => 'Gửi đánh giá thành công!']);

    }
}

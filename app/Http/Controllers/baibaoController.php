<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theloai;
use App\Models\baibao;
use App\Http\Requests\timkiemRequest;

class baibaoController extends Controller
{
    public function lay_bai_bao(){
        $baibao1 = new baibao();
        $baibao = $baibao1->lay_bai_bao();
        $slider = $baibao1->lay_slider();
        return view('frontend.main', ['title' => 'Các bài viết mới nhất', 'baibao' => $baibao, 'slider' => $slider]);
    }
    public function lay_bai_bao_theo_the_loai($id){
        $baibao1 = new baibao();
        $baibao = $baibao1->lay_bai_bao_theo_id_the_loai($id);
        $theloai = new theloai();
        $tentheloai = $theloai->lay_ten_the_loai_theo_id($id);
        $slider = $baibao1->lay_slider_theo_the_loai($id);
        return view('frontend.main', ['title' => $tentheloai["ten"], 'baibao' => $baibao, 'slider' => $slider]);
    }

    public function tim_kiem_bai_viet(timkiemRequest $request){
        $baibao1 = new baibao();
        $baibao = $baibao1->tim_kiem_bai_bao($request->search);
        $slider = $baibao1->lay_slider();
        $count = $baibao1->lay_count($request->search);
        if($count != 0)
            return view('frontend.main', ['title' => 'Kết quả', 'baibao' => $baibao, 'slider' => $slider]);
        else return view ('frontend.main', ['title' => 'Không tìm thấy', 'baibao' => $baibao, 'slider' => $slider]);
    }
}

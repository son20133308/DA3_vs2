<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\danhgiaRequest;

class danhgia extends Model
{
    //
    protected $table = 'tbl_danhgia'; //Ten bang
	protected $guarded = []; //Cac tham so

	public function gui_danh_gia(danhgiaRequest $request){
        $danhgia = new danhgia();
        $danhgia->email_khachhang = $request->email;
        $danhgia->noidung = $request->content;
        return $danhgia->save();
    }
}

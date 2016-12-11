<?php

namespace App\Models;

use App\Models\theloai;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\timkiemRequest;

class baibao extends Model
{
    protected $table = 'tbl_baibao';
	protected $guarded = [];
	public $primaryKey = 'id_baibao';
	//Lay bai viet trong CSDL
	public function lay_bai_bao(){
		return baibao::skip(3)->latest()->paginate(10);
	}
	
	public function lay_bai_bao_theo_id_the_loai($id){
		return baibao::where('id_theloai', $id)->latest()->paginate(10);
	}

	public function lay_slider_theo_the_loai($id){
		return baibao::where('id_theloai', $id)->latest()->take(3)->get();
	}
	public function lay_slider(){
		return baibao::latest()->take(3)->get();
	}

	public function tim_kiem_bai_bao($request){
	    return $baibao = baibao::where('title_baibao', 'like', '%'.$request.'%')->latest()->paginate(10);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
	//
    protected $table = 'tbl_theloai'; //Ten bang
	protected $guarded = []; //Cac tham so
	public $primaryKey = 'id_theloai';
	public function lay_ten_the_loai_theo_id($id){
		return theloai::select('ten')->where('id_theloai',$id)->first();
	}
}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Models\baibao;
use App\Models\theloai;
use App\Models\admin;
use App\Models\AdminModel;



class AdminController extends Controller
{
	public function deleteUser($id){
		$user = new AdminModel;
		$user->deleteUser($id);
		return redirect('/admin/getListUser')->with(['flash_level'=>'success','flash_message'=>' Success !!! Xóa dữ liệu thành công']);
	}
	public function deleteTheLoai($id_theloai){
		$theloai =new AdminModel;
		$theloai->deleteTheLoai($id_theloai);
		return redirect('/admin/getListTheLoai')->with(['flash_level'=>'success','flash_message'=>' Success !!! Xóa dữ liệu thành công']);

	}
	public function deleteBaiBao($id_baibao){
		$baibao = new AdminModel;
		$baibao->deleteBaiBao($id_baibao);
		return redirect('/admin/getListBaiBao')->with(['flash_level'=>'success','flash_message'=>'Success !!! Xóa dữ liệu thành công']);
	}
}
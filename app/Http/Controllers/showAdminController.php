<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Models\baibao;
use App\Models\theloai;
use App\Models\admin;
use App\User;
use App\Models\AdminModel;
use App\Models\danhgia;
use App\Http\Requests\addTheLoaiRequest;
use App\Http\Requests\editBaiBaoRequest;
use App\Http\Requests\addUserRequest;
use App\Http\Requests\editUserRequest;
use App\Http\Requests\editTheLoaiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class showAdminController extends Controller
{
	public function index(){
		return View('admin.show.index');
	}
	public function getLogin(){
		return View('admin.show.Login');
	}
	//BaibaoController 
	public function getListBaiBao(){
		
		$baibao = baibao::select()->get();
		$theloai = theloai::select()->get();
		return View('admin.show.getListBaiBao',['baibao'=>$baibao,'theloai'=>$theloai]);
		
	}
	public function getEditBaiBao($id_baibao){
		$baibao= baibao::where('id_baibao',$id_baibao)->get();
		// $theloai= theloai::where('id_theloai',$baibao->id_theloai)->get();
		$theloais =theloai::select()->get();
		return View('admin.show.getEditBaiBao',['baibao'=>$baibao, 'theloais'=>$theloais]);
	}
	public function postEditBaiBao(editBaiBaoRequest $request,$id_baibao){
		$baibao =new AdminModel;
		$baibao->postEditBaiBao($request,$id_baibao);
		return redirect('admin/getListBaiBao')->with(['flash_level'=>'success','flash_message'=>'Success !!! Sửa dữ liệu thành công']);
	}
	//TheLoaiController
	public function getListTheLoai(){
		$theloai = theloai::select()->get();
		return View('admin.show.getListTheLoai',['theloai'=>$theloai]);
	}
	public function getAddTheLoai(){
		$theLoaiCha = theloai::select()->get();
		return View('admin.show.getAddTheLoai',['theLoaiCha'=>$theLoaiCha]);
	}
	public function postAddTheLoai(addTheLoaiRequest $request){
		$theloai =new AdminModel;
		$theloai->postAddBaiBao($request);
		return redirect('admin/getListTheLoai')->with(['flash_level'=>'success','flash_message'=>'Success !!! Thêm dữ liệu thành công']);
	}
	public function getEditTheLoai($id_theloai){
		$theloai =theloai::where('id_theloai',$id_theloai)->get();
		$theloais=theloai::select()->get();
		return View('admin.show.getEditTheLoai',['theloai'=>$theloai,'theloais'=>$theloais]);
	}
	public function postEditTheLoai(editTheLoaiRequest $request, $id_theloai){
		$theloai = new AdminModel;
		$theloai->postEditTheLoai($request,$id_theloai);
		return redirect('admin/getListTheLoai')->with(['flash_level'=>'success','flash_message'=>'Success !!! Sửa dữ liệu thành công']);
	}
	//UserController
	public function getListUser(){
		$user = User::select()->get();
		return View('admin.show.getListUser',['user'=>$user]);
	}
	public function getAddUser(){
		return View('admin.show.getAddUser');
	}
	public function postAddUser(addUserRequest $request){
		$user =new AdminModel;
		$user->postAddUser($request);
		return redirect('admin/getListUser')->with(['flash_level'=>'success','flash_message'=>'Success !!! Thêm dữ liệu thành công']);
	}
	public function getEditUser($id){
		$user = User::where('id',$id)->get();
		return View('admin.show.getEditUser',['user'=>$user]);


	}
	public function postEditUser(editUserRequest $request,$id){
		$user =new AdminModel;
		$user->postEditUser($request,$id);
		if(Auth::user()->role ==1){
		return redirect('admin/getListUser')->with(['flash_level'=>'success','flash_message'=>'Success !!! Sửa dữ liệu thành công']);
		}
		else{
			return redirect('/admin/index')->with(['flash_level'=>'success','flash_message'=>'Success !!! Sửa dữ liệu thành công']);
		}

	}
	//DanhGiaController
	public function getListDanhGia(){
		$danhgia = danhgia::select()->get();
		return View('admin.show.getListDanhGia',['danhgia'=>$danhgia]);
	}

}
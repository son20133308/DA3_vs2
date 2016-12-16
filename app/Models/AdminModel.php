<?php

namespace App\Models;

use App\Models\theloai;
use App\Models\baibao;
use App\User;
use App\Requests\editBaiBaoRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Eloquent\Model;


class AdminModel
{
	
	public function deleteBaiBao($id_baibao){
		$baibao = baibao::where('id_baibao',$id_baibao);
		$baibao->delete($id_baibao);	
	}
	public function deleteTheLoai($id_theloai){
		$theloai = theloai::where('id_theloai',$id_theloai);
		$theloai->delete($id_theloai);	
		$baibao = baibao::where('id_theloai',$id_theloai);
		$baibao->delete($id_theloai);
	}
	public function deleteUser($id){
		$user = User::where('id',$id);
		$user->delete($id);
	}
	public function postEditBaiBao($request,$id_baibao){
		$baibao= baibao::where('id_baibao',$id_baibao)->get()->first();
		$baibao->id_theloai = $request->ten;
		$baibao->url_image = $request->url_image;
		$baibao->title_baibao = $request->title_baibao;
		$baibao->content = $request->content;
		$baibao-> save();
	}
	public function postAddBaiBao($request){
		$theloai = new theloai;
		$theloai->id_theloai =$request->id_theloai;
		$theloai->ten=$request->ten;
		$theloai->slug=$request->slug;
		$theloai->parent_id=$request->theLoaiCha;
		$theloai->save();
	}
	public function postEditTheLoai($request, $id_theloai){
		$theloai = theloai::where('id_theloai',$id_theloai)->get()->first();
		$theloai->ten = $request->ten;
		$theloai->slug = $request ->slug; 
		$theloai->parent_id = $request ->theLoaiCha;
		$theloai -> save();
	}
	public function postAddUser($request){
		$user = new User;
		$user->name = $request ->name;
		$user->password = Hash::make($request->password);
		$user->role = $request ->role;
		$user->email =$request ->email;
		
		$user-> save();
	}
	public function postEditUser($request,$id){
		$user = User::where('id',$id)->get()->first();
		$user->name = $request ->name;
		$user->password = Hash::make($request->password);
		$user->email = $request->email;
		$user->role = $request->role;

		$user ->save();
	}
}
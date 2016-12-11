<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('logout','Auth\LoginController@logout');
Route::get('login','Auth\LoginController@getLogin');
Route::post('postLogin','Auth\LoginController@postLogin');
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
	// Route::get('login','Auth\LoginController@getLogin');
	// Route::post('postLogin','Auth\LoginController@postLogin');
	Route::get('index','showAdminController@index');
	Route::get('getListBaiBao','showAdminController@getListBaiBao');
	Route::get('getListTheLoai','showAdminController@getListTheLoai');
	Route::get('getListUser','showAdminController@getListUser');
	Route::get('getListDanhGia','showAdminController@getListDanhGia');
	//RouteTheLoai
	Route::get('deleteTheLoai/{id_theloai}',['as'=>'deleteTheLoai','uses'=>'AdminController@deleteTheLoai']);
	Route::get('getAddTheLoai','showAdminController@getAddTheLoai');
	Route::post('postAddTheLoai','showAdminController@postAddTheLoai');
	Route::get('getEditTheLoai/{id_theloai}',['as'=>'editTheLoai','uses'=>'showAdminController@getEditTheLoai']);
	Route::post('postEditTheLoai/{id_theloai}',['as'=>'postEditTheLoai','uses'=>'showAdminController@postEditTheLoai']);
	//RouteBaiBao
	Route::get('deleteBaiBao/{id_baibao}',['as'=>'deleteBaiBao','uses'=>'AdminController@deleteBaiBao']);
	Route::get('getEditBaiBao/{id_baibao}',['as'=>'editBaiBao','uses'=>'showAdminController@getEditBaiBao']);
	Route::post('postEditBaiBao/{id_baibao}',['as'=>'postEditBaiBao','uses'=>'showAdminController@postEditBaiBao']);
	//RouteUser
	Route::get('getAddUser','showAdminController@getAddUser');
	Route::post('postAddUser','showAdminController@postAddUser');
	Route::get('deleteUser/{id}',['as'=>'deleteUser','uses'=>'AdminController@deleteUser']);
	Route::get('getEditUser/{id}',['as'=>'editUser','uses'=>'showAdminController@getEditUser']);
	Route::post('postEditUser/{id}',['as'=>'postEditUser','uses'=>'showAdminController@postEditUser']);
	//RouteDanhGia
	Route::get('getListDanhGia','showAdminController@getListDanhGia');

});


//frontend

// Route::get('frontend', function(){
// 	return view('frontend.index');
// });
// Route::get('test', function(){
// 	return view('frontend.main');
// });
Route::get('/', ['as' => 'main', 'uses' => 'baibaoController@lay_bai_bao']);
Route::get('the-loai/{id}/{alias}','baibaoController@lay_bai_bao_theo_the_loai');
Route::post('danhgia', 'danhgiaController@gui_danh_gia');
Route::get('search','baibaoController@tim_kiem_bai_viet');

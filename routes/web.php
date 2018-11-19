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

Route::get('/', function () {
    return view('front.index');
});

Route::get('admin',function (){
   return redirect('admin/trangchu');
});

Route::get('admin/dangnhap','UsersController@getDangNhapAdmin');
Route::post('admin/dangnhap', 'UsersController@postDangNhapAdmin');
Route::get('admin/logout','UsersController@getDangXuatAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function(){

    Route::get('trangchu',function (){
        return view('admin.trangchu');
    });

    Route::group(['prefix' => 'bangso'],function (){
        Route::get('danhsach','BangSoController@getDanhSach');

        Route::get('them', 'BangSoController@getThem');
        Route::post('them','BangSoController@postThem');

        Route::get('sua/{id}', 'BangSoController@getSua');
        Route::post('sua/{id}','BangSoController@postSua');

        Route::get('xoa/{id}','BangSoController@getXoa');
    });

    Route::group(['prefix' => 'thisinh'],function (){
        Route::get('danhsach','ThiSinhController@getDanhSach');

        Route::get('them', 'ThiSinhController@getThem');
        Route::post('them','ThiSinhController@postThem');

        Route::get('sua/{id}', 'ThiSinhController@getSua');
        Route::post('sua/{id}','ThiSinhController@postSua');

        Route::get('xoa/{id}','ThiSinhController@getXoa');
    });

    Route::group(['prefix' => 'users', 'middleware' => 'adminPhanQuyen'],function (){
        Route::get('danhsach','UsersController@getDanhSach');

        Route::get('them', 'UsersController@getThem');
        Route::post('them','UsersController@postThem');

        Route::get('sua/{id}', 'UsersController@getSua');
        Route::post('sua/{id}','UsersController@postSua');

        Route::get('xoa/{id}','UsersController@getXoa');
    });

    Route::get('congbodiem','CongBoDiemController@getCongBoDiem')->middleware('adminPhanQuyen');
    Route::post('congbodiem','CongBoDiemController@postCongBoDiem')->middleware('adminPhanQuyen');
});

Route::group(['prefix' => 'ajax'],function (){
    Route::post('tracuu','AjaxController@postTraCuu');

    Route::get('top/{khoi}/{mon1}/{mon2}/{mon3}','AjaxController@getKhoi');

    Route::get('chart/{mon}','AjaxController@getChart');
});

Route::get('tbdiemg/{SBD?}','TBDiemController@getTBDiemg');
Route::get('tbdiem','TBDiemController@getTBDiem');
Route::post('tbdiem','TBDiemController@postTBDiem');

Route::get('xemdiem/{SBD}', 'XemDiemController@getXemDiem')->where('SBD', '^(([0-9]*)|(([0-9]*)\.([0-9]*)))$');;

Route::get('maildemo',function (){
    $user = (object)['email' => 'daivietmmo@gmail.com','name' => 'Trung Nghia'];
    var_dump($user);
    Mail::to($user)->send(new \App\Mail\DemoMail());
});

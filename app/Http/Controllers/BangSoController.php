<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BangSo;

class BangSoController extends Controller
{
    public function getDanhSach(){
        $bangso = BangSo::all();
        return view('admin.bangso.danhsach',['bangso'=>$bangso]);
    }

    public function getThem(){
        return view('admin.bangso.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'txtMaCum' =>'required|numeric|digits_between:2,2|unique:bangso,id',
                'txtTenSo' => 'required|min:5',
            ],
            [
                'txtMaCum.required' => 'Bạn chưa nhập Mã cụm',
                'txtMaCum.digits_between' => 'Mã cụm có 2 chữ số',
                'txtMaCum.numeric' => 'Mã cụm phải là chữ số. Ví dụ: 02',
                'txtMaCum.unique' => 'Mã cụm đã tồn tại',
                'txtTenSo.required' => 'Bạn chưa nhập Tên Đơn vị chủ trì',
                'txtTenSo.min' => 'Tên Đơn vị chủ trì phải có ít nhất 5 kí tự',
            ]);

        $bangso = new BangSo;
        $bangso->id = $request->txtMaCum;
        $bangso->TenSo = $request->txtTenSo;
        $bangso->save();
        return redirect('admin/bangso/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua($id){
        $bangso = BangSo::find($id);
        return view('admin.bangso.sua',['bangso' => $bangso]);
    }
    public function postSua(Request $request,$id){
        $bangso = BangSo::find($id);
        $this->validate($request,
            [
                'txtTenSo' => 'required|min:5|unique:bangso,TenSo',
            ],
            [
                'txtTenSo.required' => 'Bạn chưa nhập Tên Đơn vị chủ trì',
                'txtTenSo.min' => 'Tên Đơn vị chủ trì phải có ít nhất 5 kí tự',
                'txtTenSo.unique' => 'Tên Đơn vị chủ trì đã tồn tại',
            ]);
        $bangso->TenSo = $request->txtTenSo;
        $bangso->save();

        return redirect('admin/bangso/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
        $bangso = BangSo::find($id);
        $bangso->delete();

        return redirect('admin/bangso/danhsach')->with('thongbao','Bạn đã Xóa thành công!');
    }
}

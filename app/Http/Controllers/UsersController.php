<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller
{
    public function getDanhSach(){
        $users = Users::all();
        return view('admin.users.danhsach',['users'=>$users]);
    }

    public function getThem(){
        return view('admin.users.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'txtName' =>'required|min:3',
                'txtEmail' => 'required|email|unique:users,email',
                'txtPass' =>'required|min:6|max:32',
                'txtRePass' => 'required|same:txtPass',
            ],
            [
                'txtName.required' => 'Bạn phải nhập Họ tên.',
                'txtName.min' => 'Tên phải chứa ít nhất 3 kí tự.',
                'txtEmail.required' => 'Ban chưa nhập Email.',
                'txtEmail.email' => 'Email không đúng định dạng.',
                'txtEmail.unique' => 'Email đã tồn tại.',
                'txtPass.required' => 'Bạn phải nhập Password.',
                'txtPass.min' => 'Password chứa tối thiểu 6 kí tự.',
                'txtPass.max' => 'Password chứa tối đa 32 kí tự.',
                'txtRePass.required' => 'Bạn chưa nhập RePassword.',
                'txtRePass.same' => 'Password và RePassword không giống nhau.',
            ]
        );

        $user = new Users;
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->password = bcrypt($request->txtPass);
        $user->quyen = $request->quyen;
        $user->save();

        return redirect('admin/users/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua($id){
        $user = Users::find($id);
        return view('admin.users.sua',['user' => $user]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'txtName' =>'required|min:3',
            ],
            [
                'txtName.required' => 'Bạn phải nhập Họ tên.',
                'txtName.min' => 'Tên phải chứa ít nhất 3 kí tự.',
            ]
        );
        $user = Users::find($id);
        $user->name = $request->txtName;
        $user->quyen = $request->quyen;

        if($request->changePass == "on"){
            $this->validate($request,
                [
                    'txtPass' =>'required|min:6|max:32',
                    'txtRePass' => 'required|same:txtPass',
                ],
                [
                    'txtPass.required' => 'Bạn phải nhập Password.',
                    'txtPass.min' => 'Password chứa tối thiểu 6 kí tự.',
                    'txtPass.max' => 'Password chứa tối đa 32 kí tự.',
                    'txtRePass.required' => 'Bạn chưa nhập RePassword.',
                    'txtRePass.same' => 'Password và RePassword không giống nhau.',
                ]
            );
            $user->password = bcrypt($request->txtPass);
        }

        $user->save();

        return redirect('admin/users/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
        $user = Users::find($id);
        $user->delete();

        return redirect('admin/users/danhsach')->with('thongbao','Bạn đã Xóa thành công!');
    }

    public function getDangNhapAdmin(){
        return view('admin.login');
    }
    public function postDangNhapAdmin(Request $request){
        $this->validate($request,
            [
                'txtEmail' => 'required|email',
                'txtPass' =>'required|min:6|max:32',
            ],
            [
                'txtEmail.required' => 'Ban chưa nhập Email.',
                'txtEmail.email' => 'Email không đúng định dạng.',
                'txtPass.required' => 'Bạn phải nhập Password.',
                'txtPass.min' => 'Password chứa tối thiểu 6 kí tự.',
                'txtPass.max' => 'Password chứa tối đa 32 kí tự.',
            ]
        );

        if(Auth::attempt(['email' => $request->txtEmail, 'password' => $request->txtPass])){
            return redirect('admin/trangchu');
        }
        else{
            return redirect('admin/dangnhap')->with('thongbao','Sai Email hoặc Password');
        }
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}

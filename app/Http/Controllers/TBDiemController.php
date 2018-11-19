<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThiSinh;
use App\TKThiSinh;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class TBDiemController extends Controller
{
    public function getTBDiemg($SBD = null){
        return redirect('tbdiem')->with('sbd', $SBD);
    }

    public function getTBDiem(){
        return view('front.tbdiem');
    }
    public function postTBDiem(Request $request){

        $this->validate($request,[
            'txtSBD' => 'required|digits_between:8,8|numeric|exists:thisinh,SBD',
            'txtEmail' => 'required|email|unique:tkthisinh,email',
        ],[
            'txtSBD.required' => 'Bạn phải nhập Số báo danh.',
            'txtSBD.numeric' => 'Số báo danh phải là chữ số.',
            'txtSBD.digits_between' => 'Số báo danh có 8 chữ số.',
            'txtSBD.exists' => 'Số báo danh không tồn tại.',
            'txtEmail.required' => 'Bạn phải nhập Email.',
            'txtEmail.email' => 'Email không đúng định dạng.',
            'txtEmail.unique' => 'Email đã tồn tại.',
        ]);

        $SBD = $request->txtSBD;

        $ThiSinh = ThiSinh::where('SBD',$SBD)->first();
        if(TKThiSinh::find($ThiSinh->id) != null)
            return Redirect::back()->withErrors('Bạn đã đăng kí nhận thông báo rồi')->withInput();

        $this->validate($request,[
            'txtCMND' => ['required','digits_between:9,9','numeric',
                Rule::exists('thisinh', 'CMND')
                    ->where(function ($query) use($SBD){
                        $query->where('SBD', $SBD);
                    })],
        ],[
            'txtCMND.required' => 'Bạn phải nhập Số Chứng minh nhân dân.',
            'txtCMND.numeric' => 'Số Chứng minh nhân dân phải là chữ số.',
            'txtCMND.digits_between' => 'Số Chứng minh nhân dân có 9 chữ số.',
            'txtCMND.exists' => '<b>Số Chứng minh nhân dân</b> không đúng với Thí sinh có <b>Số báo danh</b> trên. Vì lí do bảo mật chỉ có Thí sinh mới có thể nhận Thông báo Điểm.',
        ]);
        $thisinh = ThiSinh::select('id')->where('SBD', $request->txtSBD)->first();

        $tkthisinh = new TKThiSinh;
        $tkthisinh->idThisinh = $thisinh->id;
        $tkthisinh->email = $request->txtEmail;
        $tkthisinh->save();

        return redirect('tbdiem')->with('thongbao','Đăng kí nhận Thông báo Điểm thành công. Chúng tôi sẽ gửi Thông báo về Email cho bạn khi có Điểm!');
    }
}

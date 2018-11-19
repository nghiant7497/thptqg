<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CongBoDiem;
use Carbon\Carbon;

class CongBoDiemController extends Controller
{
    public function getCongBoDiem(){
        $cbDiem = CongBoDiem::find(1);
        return view('admin.congbodiem',['cbdiem' => $cbDiem]);
    }

    public function postCongBoDiem(Request $request){
        $cbDiem = CongBoDiem::find(1);

        $this->validate($request,[
            'slCongBo' => 'required'
        ],[
            'slCongBo.required' => 'Trạng thái là bắt buộc.'
        ]);

        if($request->slCongBo == 0){//Chưa công bố
            $this->validate($request,[
                'slHanhDong' => 'required'
            ],[
                'slHanhDong.required' => 'Hành động là bắt buộc.'
            ]);

            if($request->slHanhDong == 1){//Công bố và gửi mail ngay bây giờ
                $cbDiem->DaCB = 1;
                $cbDiem->ThoiGian = null;
                $cbDiem->save();
            }
            else if($request->slHanhDong == 2){//Công bố nhưng không gửi Mail
                $cbDiem->DaCB = 1;
                $cbDiem->ThoiGian = null;
                $cbDiem->save();
            }
            else if($request->slHanhDong == 3){//Công bố sau
                $this->validate($request,[
                    'dtpThoiGian' => 'required|date'
                ],[
                    'dtpThoiGian.required' => 'Thời gian Công bố là bắt buộc.',
                    'dtpThoiGian.date' => 'Thời gian Công bố không đúng định dạng Thời gian.',
                ]);
                $cbDiem->DaCB = 0;
                $cbDiem->ThoiGian = Carbon::createFromFormat('m/d/Y H:i A',$request->dtpThoiGian);
                $cbDiem->save();
            }
        }
        else{// đã công bố
            $cbDiem->DaCB = 1;
            $cbDiem->ThoiGian = null;
            $cbDiem->save();
        }

        return redirect('admin/congbodiem')->with('thongbao', "Lưu thành công");
    }
}

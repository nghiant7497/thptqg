<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;
use App\ThiSinh;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function postTraCuu(Request $request){
        $validator = Validator::make($request->all(), [
            'tim' => 'required',
        ],[
            'tim.required' => 'Bạn phải nhập Tên thí sinh hoặc Số báo danh',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => true,
                'mess' => $validator->errors()
            ]);
        }

        $tracuu = $request->tim;

        if(is_numeric($tracuu)){//Tra cứu theo SBD
            if(strlen($tracuu) != 8)
                return Response::json([
                    'error' => true,
                    'mess' => 'Số báo danh phải chứa 8 số.'
                ]);
            $thisinh = ThiSinh::where('SBD',$tracuu)->get();

            $view = view('ajax.tracuu',['thisinh' => $thisinh])->render();
            return Response::json(['error' => false, 'html'=>$view]);
        }else{//Tên thí sinh
            $thisinh = ThiSinh::where('TenTS','like','%'.$tracuu.'%')->get();

            $view = view('ajax.tracuu',['thisinh' => $thisinh])->render();
            return Response::json(['error' => false, 'html'=>$view]);
        }
    }

    private function intToMon($i){
        switch ($i){
            case 1:
                return 'Toan';
            case 2:
                return 'Van';
            case 3:
                return 'NgoaiNgu';
            case 4:
                return 'VatLi';
            case 5:
                return 'HoaHoc';
            case 6:
                return 'Sinh';
            case 7:
                return 'DiaLi';
            case 8:
                return 'LichSu';
            case 9:
                return 'GDCD';
            default:
                return false;
        }
    }
    private function intToMonCoDau($i){
        switch ($i){
            case 1:
                return 'Toán';
            case 2:
                return 'Ngữ văn';
            case 3:
                return 'Ngoại ngữ';
            case 4:
                return 'Vật lí';
            case 5:
                return 'Hóa học';
            case 6:
                return 'Sinh';
            case 7:
                return 'Địa lí';
            case 8:
                return 'Lịch sử';
            case 9:
                return 'GDCD';
            default:
                return false;
        }
    }
    private function dbKhoi($mon1,$mon2,$mon3){
        return ThiSinh::select(DB::raw('SBD, TenTS, NgaySinh, MaCum, '.$mon1.' as Mon1, '.$mon2.' as Mon2, '.$mon3.' as Mon3, ('.$mon1.'+'.$mon2.'+'.$mon3.') as Tong'))
            ->orderBy('Tong', 'desc')
            ->limit(50)
            ->get();
    }
    public function getKhoi($khoi,$mon1,$mon2,$mon3){
        $mont1 = $this->intToMon($mon1);
        $mont2 = $this->intToMon($mon2);
        $mont3 = $this->intToMon($mon3);

        if($mont1 == false || $mont2 == false || $mont3 == false){
            return Response::json(['error' => true, 'mess' => 'Môn không hợp lệ.']);
        }

        $thisinh = $this->dbKhoi($mont1,$mont2,$mont3);

        $view = view('ajax.topkhoi',[
            'khoi' => $khoi,
            'mon1' => $this->intToMonCoDau($mon1),
            'mon2' => $this->intToMonCoDau($mon2),
            'mon3' => $this->intToMonCoDau($mon3),
            'thisinh' => $thisinh,
        ])->render();
        return Response::json(['error' => false, 'html'=>$view]);
    }

    //thống kê điểm rồi chuyển sang json string
    private function dbChart($mon){
        $tkdiem = "[";
        for($i = 0; $i <= 10; $i += 0.25){
            $thisinh = ThiSinh::select(DB::raw('count(*) as Count'))
                    ->where($mon,'=',$i)
                    ->first();
            if($i == 10)
                $tkdiem .= "[\"".$i."\", ".$thisinh->Count."]]";
            else
                $tkdiem .= "[\"".$i."\", ".$thisinh->Count."],";
        }
        return $tkdiem;
    }
    public function getChart($mon){
        $mont = $this->intToMon($mon);

        $chart = $this->dbChart($mont);
        $view = view('ajax.chart',['chart' => $chart,'mon' => $this->intToMonCoDau($mon)])->render();
        return Response::json(['error' => false, 'html'=>$view]);
    }
}

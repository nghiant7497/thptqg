<?php

namespace App\Http\Controllers;

use App\TKThiSinh;
use Illuminate\Http\Request;
use App\ThiSinh;
use App\BangSo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ThiSinhController extends Controller
{
    public function getDanhSach(){
        $thisinh = ThiSinh::all();
        return view('admin.thisinh.danhsach',['thisinh'=>$thisinh]);
    }

    public function getThem(){
        $bangso = BangSo::all();
        return view('admin.thisinh.them',['bangso'=> $bangso]);
    }
    public function postThem(Request $request){
        $this->validate($request,[
            'txtTen' => 'required|min:5|max:100',
            'txtCMND' => 'required|numeric|digits_between:9,9|unique:thisinh,CMND',
            'txtSBD' => 'required|numeric|digits_between:8,8|unique:thisinh,SBD',
            'txtNgaySinh' => 'required|date_format:d/m/Y',
            'slBangSo' => 'required|numeric|digits_between:2,2',
            'txtEmail' => 'nullable|email|unique:tkthisinh,email',
            'txtToan' => 'nullable|numeric|between:0,10',
            'txtVan' => 'nullable|numeric|between:0,10',
            'txtAnh' => 'nullable|numeric|between:0,10',
            'txtVatLi' => 'nullable|numeric|between:0,10',
            'txtHoa' => 'nullable|numeric|between:0,10',
            'txtSinh' => 'nullable|numeric|between:0,10',
            'txtSu' => 'nullable|numeric|between:0,10',
            'txtDia' => 'nullable|numeric|between:0,10',
            'txtGDCD' => 'nullable|numeric|between:0,10',
        ],[
            'txtTen.required' => 'Họ tên là bắt buộc',
            'txtTen.min' => 'Họ tên phải chứa ít nhất 5 kí tự',
            'txtTen.max' => 'Họ tên chứa tối đa 100 kí tự',

            'txtCMND.required' => 'CMND là bắt buộc',
            'txtCMND.numeric' => 'CMND phải là chữ số',
            'txtCMND.digits_between' => 'CMND có 9 chữ số',
            'txtCMND.unique' => 'CMND đã tồn tại',

            'txtSBD.required' => 'SBD là bắt buộc',
            'txtSBD.numeric' => 'SBD phải là chữ số',
            'txtSBD.digits_between' => 'SBD có 8 chữ số',
            'txtSBD.unique' => 'SBD đã tồn tại',

            'txtNgaySinh.required' => 'Ngày sinh là bắt buộc',
            'txtNgaySinh.date_format' => 'Ngày sinh không đúng định dạng (Phải là dd/mm/yyyy . VD: 07/04/1997)',

            'slBangSo.required' => 'Bạn phải chọn Cụm thi',

            'txtEmail.email' => 'Email không đúng định đạng',
            'txtEmail.unique' => 'Email đã tồn tại',

            'txtToan.numeric' => 'Điểm Toán phải là số (VD: 9.5)',
            'txtToan.between' => 'Điểm Toán phải nằm trong khoảng từ 0 đến 10',

            'txtVan.numeric' => 'Điểm Văn phải là số (VD: 9.5)',
            'txtVan.between' => 'Điểm Văn phải nằm trong khoảng từ 0 đến 10',

            'txtAnh.numeric' => 'Điểm Tiếng Anh phải là số (VD: 9.5)',
            'txtAnh.between' => 'Điểm Tiếng Anh phải nằm trong khoảng từ 0 đến 10',

            'txtVatLi.numeric' => 'Điểm Vật Lí phải là số (VD: 9.5)',
            'txtVatLi.between' => 'Điểm Vật Lí phải nằm trong khoảng từ 0 đến 10',

            'txtHoa.numeric' => 'Điểm Hóa phải là số (VD: 9.5)',
            'txtHoa.between' => 'Điểm Hóa phải nằm trong khoảng từ 0 đến 10',

            'txtSinh.numeric' => 'Điểm Sinh phải là số (VD: 9.5)',
            'txtSinh.between' => 'Điểm Sinh phải nằm trong khoảng từ 0 đến 10',

            'txtSu.numeric' => 'Điểm Sử phải là số (VD: 9.5)',
            'txtSu.between' => 'Điểm Sử phải nằm trong khoảng từ 0 đến 10',

            'txtDia.numeric' => 'Điểm Địa phải là số (VD: 9.5)',
            'txtDia.between' => 'Điểm Địa phải nằm trong khoảng từ 0 đến 10',

            'txtGDCD.numeric' => 'Điểm GDCD phải là số (VD: 9.5)',
            'txtGDCD.between' => 'Điểm GDCD phải nằm trong khoảng từ 0 đến 10',
        ]);

        $thisinh = new ThiSinh;
        $thisinh->SBD = $request->txtSBD;
        $thisinh->CMND = $request->txtCMND;
        $thisinh->TenTS = $request->txtTen;
        $thisinh->NgaySinh = Carbon::createFromFormat('d/m/Y',$request->txtNgaySinh);;
        $thisinh->MaCum = $request->slBangSo;
        $thisinh->Toan = $request->txtToan;
        $thisinh->Van = $request->txtVan;
        $thisinh->NgoaiNgu = $request->txtAnh;
        $thisinh->VatLi = $request->txtVatLi;
        $thisinh->HoaHoc = $request->txtHoa;
        $thisinh->Sinh = $request->txtSinh;
        $thisinh->DiaLi = $request->txtDia;
        $thisinh->LichSu = $request->txtSu;
        $thisinh->GDCD = $request->txtGDCD;
        $thisinh->save();

        if($request->txtEmail != null){
            $thisinhs = ThiSinh::where('SBD',$request->txtSBD)->first();
            $tkthisinh = new TKThiSinh;
            $tkthisinh->idThiSinh = $thisinhs->id;
            $tkthisinh->email = $request->txtEmail;
            $tkthisinh->save();
        }

        return redirect('admin/thisinh/them')->with('thongbao','Thêm thí sinh thành công!');
    }

    public function getSua($id){
        $bangso = BangSo::all();
        $thisinh = ThiSinh::find($id);
        return view('admin.thisinh.sua',['thisinh' => $thisinh,'bangso' => $bangso]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,[
            'txtTen' => 'required|min:5|max:100',
            'txtNgaySinh' => 'required|date_format:d/m/Y',
            'slBangSo' => 'required|numeric|digits_between:2,2',
        ],[
            'txtTen.required' => 'Họ tên là bắt buộc',
            'txtTen.min' => 'Họ tên phải chứa ít nhất 5 kí tự',
            'txtTen.max' => 'Họ tên chứa tối đa 100 kí tự',

            'txtNgaySinh.required' => 'Ngày sinh là bắt buộc',
            'txtNgaySinh.date_format' => 'Ngày sinh không đúng định dạng (Phải là dd/mm/yyyy . VD: 07/04/1997)',

            'slBangSo.required' => 'Bạn phải chọn Cụm thi',

            'txtEmail.email' => 'Email không đúng định đạng',
        ]);

        $thisinh = ThiSinh::find($id);
        $thisinh->TenTS = $request->txtTen;
        $thisinh->NgaySinh = Carbon::createFromFormat('d/m/Y',$request->txtNgaySinh);;
        $thisinh->MaCum = $request->slBangSo;

        if($request->txtEmail != null){
            $tkthisinh = TKThiSinh::where('idThiSinh',$id)->first();
            $tkthisinh->email = $request->txtEmail;
            $tkthisinh->save();
        }

        if($request->changeDiem == "on"){
            $this->validate($request,[
                'txtToan' => 'nullable|numeric|between:0,10',
                'txtVan' => 'nullable|numeric|between:0,10',
                'txtAnh' => 'nullable|numeric|between:0,10',
                'txtVatLi' => 'nullable|numeric|between:0,10',
                'txtHoa' => 'nullable|numeric|between:0,10',
                'txtSinh' => 'nullable|numeric|between:0,10',
                'txtSu' => 'nullable|numeric|between:0,10',
                'txtDia' => 'nullable|numeric|between:0,10',
                'txtGDCD' => 'nullable|numeric|between:0,10',
            ],[
                'txtToan.numeric' => 'Điểm Toán phải là số (VD: 9.5)',
                'txtToan.between' => 'Điểm Toán phải nằm trong khoảng từ 0 đến 10',

                'txtVan.numeric' => 'Điểm Văn phải là số (VD: 9.5)',
                'txtVan.between' => 'Điểm Văn phải nằm trong khoảng từ 0 đến 10',

                'txtAnh.numeric' => 'Điểm Tiếng Anh phải là số (VD: 9.5)',
                'txtAnh.between' => 'Điểm Tiếng Anh phải nằm trong khoảng từ 0 đến 10',

                'txtVatLi.numeric' => 'Điểm Vật Lí phải là số (VD: 9.5)',
                'txtVatLi.between' => 'Điểm Vật Lí phải nằm trong khoảng từ 0 đến 10',

                'txtHoa.numeric' => 'Điểm Hóa phải là số (VD: 9.5)',
                'txtHoa.between' => 'Điểm Hóa phải nằm trong khoảng từ 0 đến 10',

                'txtSinh.numeric' => 'Điểm Sinh phải là số (VD: 9.5)',
                'txtSinh.between' => 'Điểm Sinh phải nằm trong khoảng từ 0 đến 10',

                'txtSu.numeric' => 'Điểm Sử phải là số (VD: 9.5)',
                'txtSu.between' => 'Điểm Sử phải nằm trong khoảng từ 0 đến 10',

                'txtDia.numeric' => 'Điểm Địa phải là số (VD: 9.5)',
                'txtDia.between' => 'Điểm Địa phải nằm trong khoảng từ 0 đến 10',

                'txtGDCD.numeric' => 'Điểm GDCD phải là số (VD: 9.5)',
                'txtGDCD.between' => 'Điểm GDCD phải nằm trong khoảng từ 0 đến 10',
            ]);

            $thisinh->Toan = $request->txtToan;
            $thisinh->Van = $request->txtVan;
            $thisinh->NgoaiNgu = $request->txtAnh;
            $thisinh->VatLi = $request->txtVatLi;
            $thisinh->HoaHoc = $request->txtHoa;
            $thisinh->Sinh = $request->txtSinh;
            $thisinh->DiaLi = $request->txtDia;
            $thisinh->LichSu = $request->txtSu;
            $thisinh->GDCD = $request->txtGDCD;
        }

        $thisinh->save();

        //Gủi Email thông báo thay đổi
        if($request->changeDiem == "on"){
            $thisinhs = ThiSinh::find($id);

            //Kiểm tra xem User có đăng kí nhận thông báo ko
            if($thisinhs->tkthisinh != null){
                $ts = (object)['email' => $thisinhs->tkthisinh->email,'name' => $thisinhs->TenTS];
                Mail::to($ts)->send(new \App\Mail\ThayDoiDiemMail($thisinhs));
            }
        }

        return redirect('admin/thisinh/sua/'.$id)->with('thongbao', 'Sửa thông tin thí sinh thành công!');
    }

    public function getXoa($id){
        $thisinh = ThiSinh::find($id);
        $thisinh->delete();

        return redirect('admin/thisinh/danhsach')->with('thongbao','Bạn đã Xóa thành công!');
    }
}

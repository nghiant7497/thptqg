@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thí sinh
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên thí sinh</label>
                            <input class="form-control" name="txtTen" placeholder="Nhập Họ tên Thí sinh" value="{{$thisinh->TenTS}}" />
                        </div>
                        <div class="form-group">
                            <label>Số CMND</label>
                            <input class="form-control" name="txtCMND" placeholder="Nhập Số Chứng minh nhân dân" value="{{$thisinh->CMND}}" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Số báo danh</label>
                            <input class="form-control" name="txtSBD" placeholder="Nhập Số báo danh" value="{{$thisinh->SBD}}" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input class="form-control" name="txtNgaySinh" placeholder="Nhập ngày sinh (Định dạng dd/mm/yyyy)" value="{{$thisinh->NgaySinh->format('d/m/Y')}}" />
                        </div>
                        <div class="form-group">
                            <label>Cụm thi</label>
                            <select class="form-control" name="slBangSo">
                                @foreach($bangso as $bs)
                                    <option
                                            @if($thisinh->MaCum == $bs->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$bs->id}}">{{$bs->id." - ".$bs->TenSo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tài khoản thí sinh (Không bắt buộc)</label>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Email</label>
                                <input class="form-control" name="txtEmail" placeholder="Nhập Email" value="@if($thisinh->tkthisinh != null){{$thisinh->tkthisinh->email}} @endif"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="changeDiem" name="changeDiem">
                            <label>Thay đổi điểm (Không bắt buộc)</label>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Toán</label>
                                <input class="form-control diem" name="txtToan" placeholder="Nhập điểm môn Toán" value="{{$thisinh->Toan}}" disabled />
                            </div>
                            <div class="form-group diem" style="margin-left: 25px;">
                                <label>Ngữ văn</label>
                                <input class="form-control diem" name="txtVan" placeholder="Nhập điểm môn Ngữ văn" value="{{$thisinh->Van}}" disabled />
                            </div>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Ngoại ngữ (Tiếng Anh)</label>
                                <input class="form-control diem" name="txtAnh" placeholder="Nhập điểm môn Tiềng Anh" value="{{$thisinh->NgoaiNgu}}" disabled />
                            </div>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Vật lí</label>
                                <input class="form-control diem" name="txtVatLi" placeholder="Nhập điểm môn Vật lí" value="{{$thisinh->VatLi}}" value="{{$thisinh->HoaHoc}}" disabled/>
                            </div>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Hóa học</label>
                                <input class="form-control diem" name="txtHoa" placeholder="Nhập điểm môn Hóa học" value="{{$thisinh->HoaHoc}}" disabled/>
                            </div>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Sinh</label>
                                <input class="form-control diem" name="txtSinh" placeholder="Nhập điểm môn Sinh" value="{{$thisinh->Sinh}}" disabled/>
                            </div>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Lịch sử</label>
                                <input class="form-control diem" name="txtSu" placeholder="Nhập điểm môn Lịch sử" value="{{$thisinh->LichSu}}" disabled />
                            </div>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Địa lí</label>
                                <input class="form-control diem" name="txtDia" placeholder="Nhập điểm môn Địa lí" value="{{$thisinh->DiaLi}}" disabled />
                            </div>
                            <div class="form-group" style="margin-left: 25px;">
                                <label>Giáo dục công dân</label>
                                <input class="form-control diem" name="txtGDCD" placeholder="Nhập điểm môn Giáo dục công dân" value="{{$thisinh->GDCD}}" disabled />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Sửa thí sinh</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#changeDiem").change(function () {
                if($(this).is(":checked")){
                    $(".diem").removeAttr('disabled');
                }
                else{
                    $(".diem").attr('disabled','');
                }
            });
        });
    </script>
@endsection
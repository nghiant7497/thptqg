@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thí sinh
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                </div>
            @endif
            <table class="table table-bordered" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th rowspan="2">ID</th>
                    <th rowspan="2">SBD</th>
                    <th rowspan="2">CMND</th>
                    <th rowspan="2">Tên thí sinh</th>
                    <th rowspan="2">Ngày sinh</th>
                    <th rowspan="2">Mã cụm</th>
                    <th colspan="1">Tài khoản Thí sinh</th>
                    <th colspan="9">Điểm các môn</th>
                    <th rowspan="2">Edit</th>
                    <th rowspan="2">Delete</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>Toán</th>
                    <th>Ngữ văn</th>
                    <th>Ngoại ngữ</th>
                    <th>Lý</th>
                    <th>Hóa</th>
                    <th>Sinh</th>
                    <th>Sử</th>
                    <th>Địa</th>
                    <th>GDCD</th>
                </tr>
                </thead>
                <tbody>
                @foreach($thisinh as $ts)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ts->id}}</td>
                        <td>{{$ts->SBD}}</td>
                        <td>{{$ts->CMND}}</td>
                        <td>{{$ts->TenTS}}</td>
                        <td>{{$ts->NgaySinh->format('d/m/Y')}}</td>
                        <td>{{$ts->MaCum}}</td>
                        <td>@if($ts->tkthisinh != null){{$ts->tkthisinh->email}} @else  {{"Chưa Đăng kí"}} @endif</td>
                        <td>{{$ts->Toan}}</td>
                        <td>{{$ts->Van}}</td>
                        <td>{{$ts->NgoaiNgu}}</td>
                        <td>{{$ts->VatLi}}</td>
                        <td>{{$ts->HoaHoc}}</td>
                        <td>{{$ts->Sinh}}</td>
                        <td>{{$ts->DiaLi}}</td>
                        <td>{{$ts->LichSu}}</td>
                        <td>{{$ts->GDCD}}</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/thisinh/sua/{{$ts->id}}">Edit</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/thisinh/xoa/{{$ts->id}}"> Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('datatablesoption')
    scrollX: true,
    columnDefs: [
    { "width": "13%", "targets": 3 }
    ]
@endsection
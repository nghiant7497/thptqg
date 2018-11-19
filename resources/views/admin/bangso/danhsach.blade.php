@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cụm thi
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>Mã cụm</th>
                    <th>Đơn vị chủ trì</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($bangso as $bs)
                        <tr class="odd gradeX" align="center">
                            <td>{{$bs->id}}</td>
                            <td>{{$bs->TenSo}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bangso/sua/{{$bs->id}}">Sửa</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bangso/xoa/{{$bs->id}}"> Xóa</a></td>
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
@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users
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
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Quyền hạng</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr class="odd gradeX" align="center">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->quyen == 1)
                            {{"Admin"}}
                        @else
                            {{"Thường"}}
                        @endif
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/users/sua/{{$user->id}}">Sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/users/xoa/{{$user->id}}">Xóa</a></td>
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
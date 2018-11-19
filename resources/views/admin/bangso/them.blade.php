@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cụm thi
                    <small>Thêm</small>
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

                <form action="admin/bangso/them" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Mã cụm</label>
                        <input class="form-control" name="txtMaCum" placeholder="Nhập Mã cụm (2 chữ số)" />
                    </div>
                    <div class="form-group">
                        <label>Đơn vị chủ trì</label>
                        <input class="form-control" name="txtTenSo" placeholder="Nhập tên Đơn vị chủ trì" />
                    </div>

                    <button type="submit" class="btn btn-default">Thêm Cụm thi</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
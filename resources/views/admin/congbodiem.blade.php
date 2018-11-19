@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Công bố điểm
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
                            <label>Trạng thái Website</label>
                            <select class="form-control" name="slCongBo" id="slCongBo">
                                <option value="0" @if($cbdiem->DaCB == 0) {{"selected"}} @endif>Chưa công bố điểm</option>
                                <option value="1" @if($cbdiem->DaCB == 1) {{"selected"}} @endif>Đã công bố điểm</option>
                            </select>
                        </div>
                        <div id="ChuaCongBo">
                            <div class="form-group">
                                <label>Hành động</label>
                                <select class="form-control" name="slHanhDong" id="slHanhDong">
                                    <option value="1">Công bố và gửi Mail ngay bây giờ</option>
                                    <option value="2" @if($cbdiem->DaCB == 0 && $cbdiem->ThoiGian == null) {{"selected"}} @endif>Công bố nhưng KHÔNG gửi Mail</option>
                                    <option value="3" @if($cbdiem->DaCB == 0 && $cbdiem->ThoiGian != null) {{"selected"}} @endif>Công bố vào ngày</option>
                                </select>
                            </div>
                            <div id="CongBoSau">
                                <div class="form-group">
                                    <label>Thời gian Công bố Điểm</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="dtpThoiGian" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Lưu</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                defaultDate: "<?php echo $cbdiem->ThoiGian ?>"
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            if($("#slCongBo").val() == 0)
                $('#ChuaCongBo').show();
            else
                $('#ChuaCongBo').hide();

            if($("#slHanhDong").val() == 3)
                $('#CongBoSau').show();
            else
                $('#CongBoSau').hide();
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#slCongBo").change(function(){
                if($("#slCongBo").val() == 0)
                    $('#ChuaCongBo').show();
                else
                    $('#ChuaCongBo').hide();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#slHanhDong").change(function(){
                if($("#slHanhDong").val() == 3)
                    $('#CongBoSau').show();
                else
                    $('#CongBoSau').hide();
            });
        });
    </script>
@endsection
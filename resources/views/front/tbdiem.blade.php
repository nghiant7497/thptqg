@extends('front.layout.master')

@section('topmenu')
    <li class="active"><a href="">Home</a>
    </li>
    <li><a href="tbdiem"><i class="fa fa-envelope"></i> Nhận thông báo Điểm</a></li>
@endsection

@section('content')
    <div class="bradcame-area base-bg">
        <div class="container">
            <h1>Đăng kí nhận Thông báo khi có Điểm</h1>
        </div>
    </div>
    <div class="main-content mt95 pdb100">
        <div class="container">
            <div class="registration-form">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {!! $error !!}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <form action="" method="post">
                    {{csrf_field()}}
                    <p class="require-field">
                        * Required field
                    </p>
                    <div class="form-group">
                        <label for="form-SBD">Số báo danh *</label>
                        <input type="text" id="form-SBD" name="txtSBD" class="form-control" required="required" @if(session('sbd'))value="{{session('sbd')}}" @endif @if(old('txtSBD')) value="{{old('txtSBD')}}" @endif >
                    </div>
                    <div class="form-group">
                        <label for="form-email">Email *</label>
                        <input type="email" id="form-email" name="txtEmail" class="form-control" required="required" @if(old('txtEmail')) value="{{old('txtEmail')}}" @endif >
                    </div>
                    <div class="form-group">
                        <label for="form-CMND">Số CMND *</label>
                        <input type="text" id="form-CMND" name="txtCMND" class="form-control" required="required" @if(old('txtCMND')) value="{{old('txtCMND')}}" @endif >
                    </div>
                    <button type="submit" class="btn btn-primary base-bg">Đăng kí</button>
                </form>
            </div>
        </div>
    </div>
@endsection
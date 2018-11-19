@extends('front.layout.master')

@section('topmenu')
    <li class="active"><a href="">Home</a>
    </li>
    <li><a href="tbdiem"><i class="fa fa-envelope"></i> Nhận thông báo Điểm</a></li>
@endsection

@section('content')
    <div class="bradcame-area base-bg">
        <div class="container">
            <h1 style="font-size: 30px;">ĐIỂM THI</h1>
        </div>
    </div>
    <div class="main-content mt75 pdb70">
        <div class="container">
            <div class="row" align="center">
                <div class="col-md-12">
                    <div class="event-categories3-text" align="center">
                        <h3>Thí sinh: <strong><span class="base-color">{{$thisinh->TenTS}}</span></strong> </h3>
                        <div class="event-info">
                            <ul>
                                <li>
                                    <strong>Ngày sinh:</strong>
                                    {{$thisinh->NgaySinh->format('d/m/Y')}}
                                </li>
                                <li>
                                    <strong>Số báo danh: </strong>
                                    {{$thisinh->SBD}}
                                </li>
                                <li>
                                    <strong>Mã cụm: </strong>
                                    {{$thisinh->MaCum}} - {{$thisinh->bangso->TenSo}}
                                </li>
                            </ul>

                            <!-- bang diem-->
                            <div class="row">
                                @if($thisinh->Toan != null)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                    <div class="course-category-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon">
                                                {{$thisinh->Toan}}
                                            </div>
                                            <span class="course-name">Toán</span>
                                        </a>
                                    </div><!--/.course-category-item-->
                                </div>
                                @endif

                                @if($thisinh->Van != null)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                    <div class="course-category-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon">
                                                {{$thisinh->Van}}
                                            </div>
                                            <span class="course-name">Ngữ văn</span>
                                        </a>
                                    </div><!--/.course-category-item-->
                                </div>
                                @endif
                                @if($thisinh->NgoaiNgu != null)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                    <div class="course-category-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon">
                                                {{$thisinh->NgoaiNgu}}
                                            </div>
                                            <span class="course-name">Ngoại ngữ</span>
                                        </a>
                                    </div><!--/.course-category-item-->
                                </div>
                                @endif
                                @if($thisinh->VatLi != null)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                    <div class="course-category-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon">
                                                {{$thisinh->VatLi}}
                                            </div>
                                            <span class="course-name">Vật lí</span>
                                        </a>
                                    </div><!--/.course-category-item-->
                                </div>
                                @endif
                                @if($thisinh->HoaHoc != null)
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                        <div class="course-category-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon">
                                                    {{$thisinh->HoaHoc}}
                                                </div>
                                                <span class="course-name">Hóa học</span>
                                            </a>
                                        </div><!--/.course-category-item-->
                                    </div>
                                @endif
                                @if($thisinh->Sinh != null)
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                        <div class="course-category-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon">
                                                    {{$thisinh->Sinh}}
                                                </div>
                                                <span class="course-name">Sinh học</span>
                                            </a>
                                        </div><!--/.course-category-item-->
                                    </div>
                                @endif
                                @if($thisinh->LichSu != null)
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                        <div class="course-category-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon">
                                                    {{$thisinh->LichSu}}
                                                </div>
                                                <span class="course-name">Lịch sử</span>
                                            </a>
                                        </div><!--/.course-category-item-->
                                    </div>
                                @endif
                                @if($thisinh->DiaLi != null)
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                        <div class="course-category-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon">
                                                    {{$thisinh->DiaLi}}
                                                </div>
                                                <span class="course-name">Địa lí</span>
                                            </a>
                                        </div><!--/.course-category-item-->
                                    </div>
                                @endif
                                @if($thisinh->GDCD != null)
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 no-padding">
                                        <div class="course-category-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon">
                                                    {{$thisinh->GDCD}}
                                                </div>
                                                <span class="course-name">Giáo dục công dân</span>
                                            </a>
                                        </div><!--/.course-category-item-->
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
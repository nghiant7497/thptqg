@extends('front.layout.master')

@section('topmenu')
    <li class="active"><a href="">Home</a>
    </li>
    @if($isCongBo)
    <li><a href="javascript:void(0)">Top Thi sinh theo Khối thi </a>
        <ul class="dropdown">
            <li><a href="javascript:void(0)" class="topkhoi" dataurl="A00/1/4/5">A00 - Toán, Lý, Hóa</a></li>
            <li><a href="javascript:void(0)" class="topkhoi" dataurl="A01/1/4/3">A01 - Toán, Lý, Anh</a></li>
            <li><a href="javascript:void(0)" class="topkhoi" dataurl="B00/1/5/6">B00 - Toán, Hóa, Sinh</a></li>
            <li><a href="javascript:void(0)" class="topkhoi" dataurl="C00/2/7/8">C00 - Văn, Lịch sử, Địa lí</a></li>
            <li><a href="javascript:void(0)" class="topkhoi" dataurl="D01/2/1/3">D01 - Văn, Toán, Anh</a></li>
        </ul>
    </li>
    <li><a href="javascript:void(0)">Phổ điểm </a>
        <ul class="dropdown">
            <li><a href="javascript:void(0)" class="phodiem" dataurl="1">Toán</a></li>
            <li><a href="javascript:void(0)" class="phodiem" dataurl="2">Ngữ văn</a></li>
            <li><a href="javascript:void(0)" class="phodiem" dataurl="3">Tiếng Anh</a></li>
            <li><a href="javascript:void(0)" class="phodiem" dataurl="4">Vật lí</a></li>
            <li><a href="javascript:void(0)" class="phodiem" dataurl="5">Hóa học</a></li>
            <li><a href="javascript:void(0)" class="phodiem" dataurl="6">Sinh</a></li>
            <li><a href="javascript:void(0)" class="phodiem" dataurl="7">Lịch sử</a></li>
            <li><a href="javascript:void(0)" class="phodiem" dataurl="8">Địa lí</a></li>
            <li><a href="javascript:void(0)" class="phodiem" dataurl="9">Giáo dục công dân</a></li>
        </ul>
    </li>
    @endif
    <li><a href="tbdiem"><i class="fa fa-envelope"></i> Nhận thông báo Điểm</a></li>
@endsection

@section('content')
    <div class="banner-area text-center">
        <div class="container">
            <div class="banner-text">
                <h2 class="heading">
                    Tra cứu điểm thi THPT Quốc gia 2017
                </h2>
                <span class="sub-eading"></span>
            </div>
            <div class="course-search">
                <input class="caurse-search-input form-control" type="text"  placeholder="Nhập Tên thí sinh hoặc Số báo danh" id="tim">
                <span class="course-search-icons"><i class="fa fa-search"></i></span>
            </div>
            <div class="banner-mouse-icon">
                <img src="asset/images/mouse.png" alt="mouse">
            </div>
        </div>
    </div>
    <div id="dulieu"></div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0ac775;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chưa đến thời gian công bố điểm</h4>
                </div>
                <div class="modal-body">
                    <p>Hiện tại chưa đến thời gian công bố điểm THPT Quốc gia. Tuy nhiên bạn vẫn có thể Tra cứu để Nhận thông báo khi có điểm.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        @if(!$isCongBo) <?php echo "$(\".modal\").modal(\"show\");"; ?> @endif

        $(document).on("click", ".topkhoi", function(e) {
            var url = $(this).attr("dataurl");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: "json",
                method: "GET",
                url: "ajax/top/"+url,
                data: {

                },success:function (data) {
                    $("#dulieu").html(data.html);
                    $('html,body').animate({
                            scrollTop: $("#dulieu").offset().top},
                        'slow');
                }
            });
        });

        $(document).on("click", ".phodiem", function(e) {
            var url = $(this).attr("dataurl");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: "json",
                method: "GET",
                url: "ajax/chart/"+url,
                data: {

                },success:function (data) {
                    $("#dulieu").html(data.html);
                    $('html,body').animate({
                            scrollTop: $("#dulieu").offset().top},
                        'slow');
                }
            });
        });

        $(document).keypress(function(e) {
            if (13 == e.which) {
                //alert($("#tim").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    dataType: "json",
                    method: "POST",
                    url: "ajax/tracuu",
                    data: {
                        tim: $("#tim").val()
                    },success:function (data) {
                        $("#dulieu").html(data.html);
                        $('html,body').animate({
                                scrollTop: $("#dulieu").offset().top},
                            'slow');
                    }
                });
            }
        });
    </script>
@endsection
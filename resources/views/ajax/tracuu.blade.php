<section class="benifit-eschool-area section-padding">
<div class="container">
    <div class="section-heading text-center">
        <h2>Kết quả Tra cứu</h2>
    </div>
    <div>
        <table class="display responsive table table-hover table-striped table-bordered order-column dataTable dt-head-center" cellspacing="0" width="100%" id="myTable">
            <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">SBD</th>
                <th rowspan="2">Tên thí sinh</th>
                <th rowspan="2">Ngày sinh</th>
                <th rowspan="2">Mã cụm</th>
                <th colspan="9" align="center">Điểm các môn</th>
                <th rowspan="2">@if(!$isCongBo) {{"Thông báo"}} @else {{"Xem điểm"}} @endif </th>
            </tr>
            <tr>
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
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ts->SBD}}</td>
                    <td>{{$ts->TenTS}}</td>
                    <td>{{$ts->NgaySinh->format('d/m/Y')}}</td>
                    <td>{{$ts->MaCum}}</td>
                    @if($isCongBo)
                        <td>{{$ts->Toan}}</td>
                        <td>{{$ts->Van}}</td>
                        <td>{{$ts->NgoaiNgu}}</td>
                        <td>{{$ts->VatLi}}</td>
                        <td>{{$ts->HoaHoc}}</td>
                        <td>{{$ts->Sinh}}</td>
                        <td>{{$ts->DiaLi}}</td>
                        <td>{{$ts->LichSu}}</td>
                        <td>{{$ts->GDCD}}</td>
                    @else
                        <td colspan="9">Chưa có điểm. Nhưng bạn vẫn có thể Nhận thông báo khi có điểm ➤</td>
                    @endif
                    <td class="center">@if(!$isCongBo)<i class="fa fa-envelope fa-fw"></i><a target="_blank" href="tbdiemg/{{$ts->SBD}}"> Nhận thông báo điểm</a> @else <i class="fa fa-eye fa-fw"></i><a target="_blank" href="xemdiem/{{$ts->SBD}}"> Xem điểm</a> @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</section>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable({
            "searching": false,
            "lengthChange": false,
            "iDisplayLength": 20,
            responsive: false
        });
    });
</script>
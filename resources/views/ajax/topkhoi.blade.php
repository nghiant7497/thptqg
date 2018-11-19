<section class="benifit-eschool-area section-padding">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Top 50 Thí sinh Khối {{$khoi}} - {{$mon1}}, {{$mon2}}, {{$mon3}}</h2>
        </div>
        <table class="display responsive nowrap table table-hover table-striped table-bordered order-column dataTable dt-head-center" id="myTable">
            <thead>
            <tr align="center">
                <th rowspan="2">#</th>
                <th rowspan="2">SBD</th>
                <th rowspan="2">Tên thí sinh</th>
                <th rowspan="2">Ngày sinh</th>
                <th rowspan="2">Mã cụm</th>
                <th colspan="3">Điểm các môn</th>
                <th rowspan="2">Tổng điểm</th>
            </tr>
            <tr>
                <th>{{$mon1}}</th>
                <th>{{$mon2}}</th>
                <th>{{$mon3}}</th>
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
                    <td>{{$ts->Mon1}}</td>
                    <td>{{$ts->Mon2}}</td>
                    <td>{{$ts->Mon3}}</td>
                    <td>{{$ts->Tong}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable({
            "searching": false,
            "lengthChange": false,
            "iDisplayLength": 50,
            responsive: false
        });
    });
</script>
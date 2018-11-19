<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Điểm thi THPT Quốc gia 2017</title>

    <base href="{{asset('')}}">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ================= Favicon ================== -->
    <link rel="icon" sizes="92x79" href="asset/images/favicon/favicon-96x96.png">
    <!-- Google Font -->
    <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> -->
    <!-- Font Awesome css-->
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">
    <!-- Bootsrap css-->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <!-- Jquery Countdown -->
    <link rel="stylesheet" href="asset/css/jquery.countdown.css">
    <!-- Round Slider -->
    <link rel="stylesheet" href="asset/css/roundslider.css">
    <!-- Mega Menu -->
    <link rel="stylesheet" href="asset/css/menuzord.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.min.css">
    <!-- Style-->
    <link rel="stylesheet" href="asset/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="asset/css/responsive.css">

    <!-- <link rel="stylesheet" type="text/css" href="asset/js/DataTables/datatables.min.css"/> -->

    <!-- Modernizr-->
    <script src="asset/js/modernizr-2.8.3.min.js"></script>
</head>
<body>
<div class="preloader">
    <div class="loader">
        <div class="loader-inner line-scale-pulse-out">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- == Top bar  ==-->

@include('front.layout.header')

@yield('content')

@include('front.layout.footer')

<!-- // End Footer  -->
<!-- == jQuery Librery == -->
<script src="asset/js/jquery-2.2.4.min.js"></script>
<!-- == Bootsrap js File == -->
<script src="asset/js/bootstrap.min.js"></script>
<!-- == fitVids == -->
<script src="asset/js/jquery.fitvids.js"></script>
<!-- == Isotope == -->
<script src="asset/js/menuzord.js"></script>
<!-- == Round slider == -->
<script src="asset/js/roundslider.js"></script>
<!-- == OWl carousel == -->
<script src="asset/js/owl.carousel.min.js"></script>
<!-- == prallex JS == -->
<script src="asset/js/prallex.js"></script>
<!-- == jQuery Countdown == -->
<script src="asset/js/jquery.plugin.min.js"></script>
<script src="asset/js/jquery.countdown.min.js"></script>
<!-- == custom Js File == -->
<script src="asset/js/custom.js"></script>

<script type="text/javascript" src="asset/js/DataTables/datatables.min.js"></script>

<script src="asset/js/highcharts/highcharts.src.js"></script>

@yield('script')

</body>
</html>

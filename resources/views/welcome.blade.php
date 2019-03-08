<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png"> -->
    <title>Catalog Management</title>
    <!-- Custom CSS -->
    <!-- <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<!--
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
-->

    <div id="app"></div>
    <script type="text/javascript" src="{{mix('js/app.js')}}"></script>    
    <script src="{{ asset('js/libs/jquery/dist/jquery.min.js')}}"></script>

    
    <script src="{{ asset('js/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('js/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<!--     <script src="asset('extra-libs/sparkline/sparkline.js')}}"></script> -->
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <script src="{{ asset('js/libs/flot/excanvas.js')}}"></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('js/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
</body>

</html>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Penjualan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sistem Informasi Penjualan">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="text/css" href="../public/images/Ayesha.png">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.bundle.min.css">
    <link rel="stylesheet" href="/css/lib/css/normalize.css">
    <link rel="stylesheet" href="/css/lib/css/bootstrap.css">
    <link rel="stylesheet" href="/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/css/lib/datatable/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="/css/lib/datatable/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">


    <!-- Axios CDN link -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>
</head>
<!-- Contoh pengaturan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Panggil file JavaScript Anda -->
@yield('scripts')
<body>
    <!-- Left Panel -->
    @include('admin.dashboard.layouts.sidebar')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('admin.dashboard.layouts.header')
        <!-- /#header -->

        <!-- Content -->
        <div class="content">
            @yield('container')
        </div>
        <!-- /.content -->

        <!-- Footer -->
        @include('admin.dashboard.layouts.footer')
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/pooper.min.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="/js/pooper.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/matchheight.js"></script>
    <script src="/js/main.js"></script>

    <script src="/js/init/weather-init.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="/js/init/fullcalendar-init.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Data Tables -->
    <script src="/js/lib/data-table/datatables.min.js"></script>
    <script src="/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="/js/lib/data-table/jszip.min.js"></script>
    <script src="/js/lib/data-table/vfs_fonts.js"></script>
    <script src="/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="/js/lib/data-table/buttons.print.min.js"></script>
    <script src="/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="/js/init/datatables-init.js"></script>
    <script src="/js/multiinsert.js"></script>
    <script src="/js/jquerydua.js"></script>
</body>
</html>

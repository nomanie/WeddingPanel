<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content="" name="author"/>
    <meta content="###" name="description"/>
    <meta property="og:locale" content="pl_PL"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title"
          content="###"/>
    <meta property="og:description"
          content="###"/>
    <meta property="og:site_name" content="atlas "/>

    <title> - Panel administracyjny.</title>
    <link rel="icon" type="image/x-icon" href="{{URL::asset('assets/admin/img/logo.png')}}"/>

    <link rel="icon" href="{{URL::asset('assets/admin/img/logo.png')}}" type="image/png" sizes="16x16">
    <!--vendors-->
    <link rel='stylesheet' type='text/css' href='{{URL::asset('assets/admin/vendor/bootstrap/css/datepicker.min.css')}}'/>



    <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
    <link rel='stylesheet' href='{{URL::asset('assets/admin/fonts/jost/jost.css')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('assets/admin/vendor/select2/select2.min.css')}}'/>
    <!--Material Icons-->
    <link rel='stylesheet' type='text/css' href='{{URL::asset('assets/admin/fonts/material/materialdesignicons.min.css')}}'/>
    <!--Bootstrap + atmos Admin CSS-->
    <link rel='stylesheet' type='text/css' href='{{URL::asset('assets/admin/css/style.css')}}'/>
    <!-- Additional library for page -->
    <link rel='stylesheet' type='text/css' href='{{URL::asset('assets/admin/css/dataTables.css')}}'/>
    <!-- Nprogress CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
    <!-- jQuery JS -->
    <script src="{{URL::asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>



    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


    <style>
        .admin-sidebar:not(.sidebar-show) .ml-auto .admin-pin-sidebar{
            display:none;
        }
        a.admin-pin-sidebar svg{
            display: none;
        }
        .sidebar-show .ml-auto .admin-pin-sidebar svg{
            display: unset;
            color: white;
        }
    </style>

</head>
<body class=" page-home">
<div id="progressbar"></div>
@yield('sidebar')

<main class="admin-main">
    <!--site header begins-->
    @yield('header')

    <div id="content">

        @yield('body')
    </div>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
<script src='{{URL::asset('assets/admin/js/main.js')}}'></script>
<!--page specific scripts for demo-->
<!--Main script-->

<script src='{{URL::asset('assets/admin/js/hypedev.js')}}'></script>
<script src='{{URL::asset('assets/admin/js/dataTables.js')}}'></script>
<!--Additional Page includes-->
<script src='{{URL::asset('assets/admin/vendor/apexchart/apexchart.min.js')}}'></script>
<!--chart data for current dashboard-->
<script src='{{URL::asset('assets/admin/js/dashboard.js')}}'></script>
<script>
    init();

</script>
<script>
    if ($("#chart-09").length) {
        var options = {
            colors: [colors[14], colors[4]],
            chart: {height: 400, type: "bar"},
            plotOptions: {bar: {horizontal: false, endingShape: "rounded", columnWidth: "45%"}},
            dataLabels: {enabled: false},
            stroke: {show: true, width: 2, colors: ["transparent"]},
            series: [{name: "Użytkownicy", data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 45, 50, 55]}, {
                name: "Posty",
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 80, 75, 90]
            }],
            xaxis: {categories: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"]},
            fill: {opacity: 1},
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " Commits"
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart-09"), options);
        chart.render()
    }
</script>
</body>
</html>

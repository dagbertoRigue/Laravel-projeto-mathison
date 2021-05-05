<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="autor" content="Dagb Rigue" />
        <meta http-equiv="refresh" content="7; URL={!! route('relGer.index') !!}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/img/csnlogoSf.png" type="image/x-icon" />

        <title>{{ $title or "Preditiva | Relatórios" }}</title>

        <!-- Bootstrap Core CSS -->
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/grayscale.min.css" rel="stylesheet">
        <link href="/css/styleRelatorios.css" rel="stylesheet">

        <link href="/scss/loaderCodePen.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="/vendor/morrisjs/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="/vendor/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- AMCHARTS -->
        <script src="/plugins/amcharts/amcharts.js"></script>
        <script src="/plugins/amcharts/serial.js"></script>
        <script src="/plugins/amcharts/pie.js"></script>
        <script src="/plugins/amcharts/themes/light.js"></script>

        <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        @yield('content')

        <!-- scripts -->
        <script src="js/headerCsn.js"></script>
        <!-- jQuery -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Theme JavaScript -->
        <script src="/js/grayscale.min.js"></script>
        <!-- jQuery -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="/vendor/metisMenu/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="/dist/js/sb-admin-2.js"></script>
        <!-- scripts -->
    		<script src="/js/loaderCodePen.js"></script>

    </body>
</html>

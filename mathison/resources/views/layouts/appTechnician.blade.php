<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="autor" content="Dagb Rigue" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/img/csnlogoSf.png" type="image/x-icon" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title or "Preditiva | CSN PR" }}</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/styleAdmin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="/vendor/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="/vendor/fontawesome-free-5.0.7/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
        <link href="/css/jquery.timepicker.min.css" rel="stylesheet">
        <link href="/css/jquery-ui.css" rel="stylesheet">
        <link href="/css/tdEspaco.css" rel="stylesheet">

        <!-- AMCHARTS -->
        <script src="/plugins/amcharts/amcharts.js"></script>
        <script src="/plugins/amcharts/serial.js"></script>
        <script src="/plugins/amcharts/themes/light.js"></script>

        <script src="/plugins/amcharts/lib_3_amcharts.js"></script>
        <script src="/plugins/amcharts/lib_3_serial.js"></script>

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <link href="/css/jquery.timepicker.min.css" rel="stylesheet">
        <script src="/js/jquery-3.2.1.js"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="/js/jquery.timepicker.min.js"></script>
        <script src="/js/jquery-ui.js"></script>
        <script src="/js/jquery.validate.js"></script>
        <script src="/js/additional-methods.js"></script>
        <script src="/js/jquery-1.11.2.min.js"></script>
        <style media="screen">
        @font-face {
          font-family: Bot;
          src: url(/fonts/bot/Roboto-Light.ttf);
        }
        </style>

    </head>
    <body>

        @yield('content')

        <!-- Scripts -->
        <script src="/js/app.js"></script>
        <!-- Menu Toggle Script -->
        <script>
          $("#menu-toggle-side").click(function(e) {
              e.preventDefault();
              $("#wrapper-side").toggleClass("toggled-side");
          });
        </script>

<!-- jQuery -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#filtroAtividades').DataTable({
            responsive: true
        });
    });
    </script>

    </body>
</html>

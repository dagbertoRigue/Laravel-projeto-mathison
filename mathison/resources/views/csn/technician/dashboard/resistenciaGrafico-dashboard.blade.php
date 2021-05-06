<script src="/plugins/chartJs-master/chartBundle.js"></script>
<script src="/plugins/chartJs-master/Chart.min.js"></script>
<script src="/plugins/chartJs-master/utils.js"></script>

<div id="wrapper-side" style="margin-top: 50px;">
  <!-- Sidebar -->
   @include('csn.technician.includes.sidebar-dashboard')

   <div id="page-content-wrapper-side">
       <div class="container-fluid">
           <div class="row">
             <div class="col-md-10 col-md-offset-1">
                 <div class="panel panel-default" style="background-color:#f1f1f1;">

                   <div class="panel-heading">
                       <strong>Análise de Resistência - Espectro Amostrado da Coleta</strong>
                   </div>
                   <div class="panel-body">

                      <div class="box-chart">
                        <canvas id="GraficoLine" style="width:100%;"></canvas>
                      </div>
                   </div>

                      <div class="col-md-10 col-md-offset-1">
                        <a href="{{ route('resistencias.dashboard') }}"><button href= type="submit" class="btn btn-primary"> Próximo </button></a>
                      </div>

                    <div class="panel-body">
                        <p></p>
                    </div>

                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
    window.onload = function(){
        var ctx = document.getElementById("GraficoLine").getContext("2d");
        var LineChart = new Chart(ctx).Line(data, options);
    }
  </script>

<script type="text/javascript">
    var options = {
        responsive:true
    };

    var data = {
      type: 'line',
      labels: [{!! json_encode($testeString) !!}],
      datasets: [
          {
              label: "Amostra Coletada",
              fillColor: "rgba(151,187,205,0.2)",
              strokeColor: "rgba(151,187,205,1)",
              pointColor: "rgba(151,187,205,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(151,187,205,1)",
              data: [{!! json_encode($testeString2) !!}]
          }
      ]
    };

</script>

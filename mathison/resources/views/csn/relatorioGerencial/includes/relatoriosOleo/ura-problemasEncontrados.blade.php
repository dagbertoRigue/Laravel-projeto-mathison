@extends('csn.templates.templateRelatorios')

@section('content')
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerLB')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-Oleo')
    <div id="page-content-wrapper-side">
      <div class="container-fluid">

  <!-- - - - - - - - - - - - GRÁFICO GGOP-PR ANORMALIDADES - - - - - - - - - - - -->
      <div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
        <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-heading">
                  <strong><h4 style="color:#555; margin: 0 0 0px;">GGOP-PR</h4></strong>
              </div>
              <div class="panel-body">
                <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Óleo</strong>
                <div class="panel-body">
                  <div class="col-md-11">
                    <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Problemas Encontrados</strong></h6>
                    <div id="chartdiv" style="width:110%; height: 600px;"></div>
                    {{--
                    <div style="margin-left:30px;">
                      <input type="radio"  name="group" id="rb1" onclick="setDepth()">2D
                      <input type="radio" checked="true" name="group" id="rb2" onclick="setDepth()">3D
                    </div>
                  --}}
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="rowRelGer" style="margin-top:10px">
        <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-body" style="background-color:#f1f1f1;">
                  <div class="col-md-4">
                    <div id=""></div>
                  </div>
                  <div class="col-md-4">
                    <div id=""></div>
                  </div>
                  <div class="col-md-4">
                    <div id=""></div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
   var chart;

   var chartData = [
     {
         "mes": {!! json_encode($dataFAnt11) !!},
         "agua": {!! $agua12 !!},
         "particulado": {!! $particulado12 !!},
         "viscosidade": {!! $viscosidade12 !!},
         "demulsibilidade": {!! $demulsibilidade12 !!},
         "desgaste": {!! $desgaste12 !!}
     },{
         "mes": {!! json_encode($dataFAnt10) !!},
         "agua": {!! $agua11 !!},
         "particulado": {!! $particulado11 !!},
         "viscosidade": {!! $viscosidade11 !!},
         "demulsibilidade": {!! $demulsibilidade11 !!},
         "desgaste": {!! $desgaste11 !!}
     },{
         "mes": {!! json_encode($dataFAnt9) !!},
         "agua": {!! $agua10 !!},
         "particulado": {!! $particulado10 !!},
         "viscosidade": {!! $viscosidade10 !!},
         "demulsibilidade": {!! $demulsibilidade10 !!},
         "desgaste": {!! $desgaste10 !!}
     },{
         "mes": {!! json_encode($dataFAnt8) !!},
         "agua": {!! $agua9 !!},
         "particulado": {!! $particulado9 !!},
         "viscosidade": {!! $viscosidade9 !!},
         "demulsibilidade": {!! $demulsibilidade9 !!},
         "desgaste": {!! $desgaste9 !!}
     },{
         "mes": {!! json_encode($dataFAnt7) !!},
         "agua": {!! $agua8 !!},
         "particulado": {!! $particulado8 !!},
         "viscosidade": {!! $viscosidade8 !!},
         "demulsibilidade": {!! $demulsibilidade8 !!},
         "desgaste": {!! $desgaste8 !!}
     },{
         "mes": {!! json_encode($dataFAnt6) !!},
         "agua": {!! $agua7 !!},
         "particulado": {!! $particulado7 !!},
         "viscosidade": {!! $viscosidade7 !!},
         "demulsibilidade": {!! $demulsibilidade7 !!},
         "desgaste": {!! $desgaste7 !!}
     },{
         "mes": {!! json_encode($dataFAnt5) !!},
         "agua": {!! $agua6 !!},
         "particulado": {!! $particulado6 !!},
         "viscosidade": {!! $viscosidade6 !!},
         "demulsibilidade": {!! $demulsibilidade6 !!},
         "desgaste": {!! $desgaste6 !!}
     },{
         "mes": {!! json_encode($dataFAnt4) !!},
         "agua": {!! $agua5 !!},
         "particulado": {!! $particulado5 !!},
         "viscosidade": {!! $viscosidade5 !!},
         "demulsibilidade": {!! $demulsibilidade5 !!},
         "desgaste": {!! $desgaste5 !!}
     },{
         "mes": {!! json_encode($dataFAnt3) !!},
         "agua": {!! $agua4 !!},
         "particulado": {!! $particulado4 !!},
         "viscosidade": {!! $viscosidade4 !!},
         "demulsibilidade": {!! $demulsibilidade4 !!},
         "desgaste": {!! $desgaste4 !!}
     },{
         "mes": {!! json_encode($dataFAnt2) !!},
         "agua": {!! $agua3 !!},
         "particulado": {!! $particulado3 !!},
         "viscosidade": {!! $viscosidade3 !!},
         "demulsibilidade": {!! $demulsibilidade3 !!},
         "desgaste": {!! $desgaste3 !!}
     },{
         "mes": {!! json_encode($dataFAnt1) !!},
         "agua": {!! $agua2 !!},
         "particulado": {!! $particulado2 !!},
         "viscosidade": {!! $viscosidade2 !!},
         "demulsibilidade": {!! $demulsibilidade2 !!},
         "desgaste": {!! $desgaste2 !!}
     },{
         "mes": {!! json_encode($atualInicial) !!},
         "agua": {!! $agua1 !!},
         "particulado": {!! $particulado1 !!},
         "viscosidade": {!! $viscosidade1 !!},
         "demulsibilidade": {!! $demulsibilidade1 !!},
         "desgaste": {!! $desgaste1 !!}
     }
   ];

   AmCharts.ready(function () {
       // SERIAL CHART
       chart = new AmCharts.AmSerialChart();
       chart.dataProvider = chartData;
       chart.categoryField = "mes";
       chart.plotAreaBorderAlpha = 0.2;

       // AXES
       // category
       var categoryAxis = chart.categoryAxis;
       categoryAxis.gridAlpha = 0.1;
       categoryAxis.axisAlpha = 0;
       categoryAxis.gridPosition = "start";
       categoryAxis.parseDates = true;

       // value
       var valueAxis = new AmCharts.ValueAxis();
       valueAxis.stackType = "regular";
       valueAxis.gridAlpha = 0.1;
       valueAxis.axisAlpha = 0;
       chart.addValueAxis(valueAxis);

       // GRAPHS
       var graph = new AmCharts.AmGraph();
       graph.title = "Água";
       graph.labelText = "[[value]]";
       graph.valueField = "agua";
       graph.type = "column";
       graph.columnWidth = 20;
       graph.lineAlpha = 0;
       graph.fillAlphas = 1;
       graph.lineColor = "#3d9e8e";
       graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
       chart.addGraph(graph);

       graph = new AmCharts.AmGraph();
       graph.title = "Particulado";
       graph.labelText = "[[value]]";
       graph.valueField = "particulado";
       graph.type = "column";
       graph.columnWidth = 20;
       graph.lineAlpha = 0;
       graph.fillAlphas = 1;
       graph.lineColor = "#3d729e";
       graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
       chart.addGraph(graph);

       graph = new AmCharts.AmGraph();
       graph.title = "Viscosidade";
       graph.labelText = "[[value]]";
       graph.valueField = "viscosidade";
       graph.type = "column";
       graph.columnWidth = 20;
       graph.lineAlpha = 0;
       graph.fillAlphas = 1;
       graph.lineColor = "#555555";
       graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
       chart.addGraph(graph);

       graph = new AmCharts.AmGraph();
       graph.title = "Demulsibilidade";
       graph.labelText = "[[value]]";
       graph.valueField = "demulsibilidade";
       graph.type = "column";
       graph.columnWidth = 20;
       graph.lineAlpha = 0;
       graph.fillAlphas = 1;
       graph.lineColor = "#5a3d9e";
       graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
       chart.addGraph(graph);

       graph = new AmCharts.AmGraph();
       graph.title = "Desgaste";
       graph.labelText = "[[value]]";
       graph.valueField = "desgaste";
       graph.type = "column";
       graph.columnWidth = 20;
       graph.lineAlpha = 0;
       graph.fillAlphas = 1;
       graph.lineColor = "#859e3d";
       graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
       chart.addGraph(graph);

       // LEGEND
       var legend = new AmCharts.AmLegend();
       legend.borderAlpha = 0.2;
       legend.horizontalGap = 10;
       chart.addLegend(legend);

       // WRITE
       chart.parseDates = true;
       chart.write("chartdiv");
   });

   // this method sets chart 2D/3D
   function setDepth() {
       if (document.getElementById("rb2").checked) {
         chart.depth3D = 25;
         chart.angle = 30;
       } else {
         chart.depth3D = 25;
         chart.angle = 30;
       }
       chart.validateNow();
   }
</script>
@endsection

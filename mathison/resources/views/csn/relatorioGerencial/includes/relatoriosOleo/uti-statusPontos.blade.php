@extends('csn.templates.templateRelatorios')

@section('content')
<!-- Styles -->
<style>
#chartdivStatus {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
}
</style>
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerLB')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-Oleo')
    <div id="page-content-wrapper-side">
      <div class="container-fluid">

  <!-- - - - - - - - - - - - GRÁFICO GGOP-PR STATUS DOS PONTOS - - - - - - - - - - - -->
      <div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
        <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-heading">
                  <strong><h4 style="color:#555; margin: 0 0 0px;">UTI</h4></strong>
              </div>
              <div class="panel-body">
                <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Óleo</strong>
                <div class="panel-body">
                  <div class="col-md-11">
                    <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Status dos Pontos</strong></h6>
                    <div id="chartdivStatus"></div>  <!-- Gráfico Termografia Status dos Pontos -->
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="rowRelGer" style="margin-top:10px">
        <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-body">
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
    <!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdivStatus", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [{
        "periodo": {!! json_encode($dataFAnt11) !!},
        "alarme": {!! $alarme12 !!},
        "critico": {!! $critico12 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    },{
        "periodo": {!! json_encode($dataFAnt10) !!},
        "alarme": {!! $alarme11 !!},
        "critico": {!! $critico11 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt9) !!},
        "alarme": {!! $alarme10 !!},
        "critico": {!! $critico10 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt8) !!},
        "alarme": {!! $alarme9 !!},
        "critico": {!! $critico9 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt7) !!},
        "alarme": {!! $alarme8 !!},
        "critico": {!! $critico8 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt6) !!},
        "alarme": {!! $alarme7 !!},
        "critico": {!! $critico7 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt5) !!},
        "alarme": {!! $alarme6 !!},
        "critico": {!! $critico6 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt4) !!},
        "alarme": {!! $alarme5 !!},
        "critico": {!! $critico5 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt3) !!},
        "alarme": {!! $alarme4 !!},
        "critico": {!! $critico4 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt2) !!},
        "alarme": {!! $alarme3 !!},
        "critico": {!! $critico3 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($dataFAnt1) !!},
        "alarme": {!! $alarme2 !!},
        "critico": {!! $critico2 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualInicial) !!},
        "alarme": {!! $alarme1 !!},
        "critico": {!! $critico1 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }],
    "valueAxes": [{
        "unit": "%",
        "position": "left",
        "title": "Status",
    }],
    "startDuration": 2,
    "graphs": [{
        "balloonText": "Alarme: <b>[[value]]%</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "alarme",
        "type": "column",
        "columnWidth":15,
        "valueField": "alarme",
        "colorField": "color",
        "lineAlpha": 0.2,
        "fillAlphas": 0.75
    }, {
        "balloonText": "Crítico: <b>[[value]]%</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "critico",
        "type": "column",
        "clustered":false,
        "columnWidth":10,
        "valueField": "critico",
        "colorField": "colorCr",
        "lineAlpha": 0.2,
        "fillAlphas": 0.75

    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "periodo",
    "categoryAxis": {
        "gridPosition": "start",
        "parseDates": true
    },
    "export": {
      "enabled": true
     }
});
</script>
  </div>
@endsection

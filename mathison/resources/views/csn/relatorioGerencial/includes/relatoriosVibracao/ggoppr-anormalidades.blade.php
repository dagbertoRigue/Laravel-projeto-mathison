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
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerVB')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-Vibracao')
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
                <div class="row" style="margin-top: 0px;margin-bottom:0px;">
                  <div class="col-md-7">
                    <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Análise de Vibração</strong>
                  </div>
                  <div class="col-md-5">
                    <h6 style="color:#555; margin-top:10px; margin-left:10px; margin-bottom:0px"><strong>Total de Equipamentos Monitorados: {{$sum}}</strong></h6>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="col-md-11">
                    <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Anormalidades</strong></h6>
                    <div id="chartdivStatus"></div>  <!-- Gráfico Vibração Anormalidades -->
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
        "periodo": {!! json_encode($atualf12) !!},
        "alarme": {!! $alarme12 !!},
        "critico": {!! $critico12 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    },{
        "periodo": {!! json_encode($atualf11) !!},
        "alarme": {!! $alarme11 !!},
        "critico": {!! $critico11 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf10) !!},
        "alarme": {!! $alarme10 !!},
        "critico": {!! $critico10 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf9) !!},
        "alarme": {!! $alarme9 !!},
        "critico": {!! $critico9 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf8) !!},
        "alarme": {!! $alarme8 !!},
        "critico": {!! $critico8 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf7) !!},
        "alarme": {!! $alarme7 !!},
        "critico": {!! $critico7 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf6) !!},
        "alarme": {!! $alarme6 !!},
        "critico": {!! $critico6 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf5) !!},
        "alarme": {!! $alarme5 !!},
        "critico": {!! $critico5 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf4) !!},
        "alarme": {!! $alarme4 !!},
        "critico": {!! $critico4 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf3) !!},
        "alarme": {!! $alarme3 !!},
        "critico": {!! $critico3 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf2) !!},
        "alarme": {!! $alarme2 !!},
        "critico": {!! $critico2 !!},
        "color": "#FCD202",
        "colorCr": "#db1111"
    }, {
        "periodo": {!! json_encode($atualf1) !!},
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
    "startDuration": 1,
    "graphs": [{
        "balloonText": "Alarme: <b>[[value]]%</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "alarme",
        "labelText": "[[value]]%",
        "type": "column",
        "valueField": "alarme",
        "colorField": "color"
    }, {
        "balloonText": "Crítico: <b>[[value]]%</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "critico",
        "labelText": "[[value]]%",
        "type": "column",
        "clustered":false,
        "columnWidth":0.5,
        "valueField": "critico",
        "colorField": "colorCr"
    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "periodo",
    "categoryAxis": {
        "gridPosition": "start"
    },
    "export": {
      "enabled": true
     }
});
</script>
  </div>
@endsection

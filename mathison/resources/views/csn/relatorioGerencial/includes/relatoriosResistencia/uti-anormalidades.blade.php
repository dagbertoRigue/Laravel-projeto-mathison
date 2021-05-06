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
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerRM')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-Resistencia')
    <div id="page-content-wrapper-side">
      <div class="container-fluid">

  <!-- - - - - - - - - - - - GRÁFICO GGOP-PR STATUS DOS PONTOS - - - - - - - - - - - -->
      <div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
        <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-heading">
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Utilidades</h4></strong>
              </div>
              <div class="panel-body">
                <div class="row" style="margin-top: 0px;margin-bottom:0px;">
                  <div class="col-md-7">
                    <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Análise de Resistência</strong>
                  </div>
                  <div class="col-md-5">
                    <h6 style="color:#555; margin-top:10px; margin-left:10px; margin-bottom:0px"><strong>Total de Equipamentos Monitorados: {{$sum}}</strong></h6>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="col-md-11">
                    <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Anormalidades</strong></h6>
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
      "periodo": {!! json_encode($atualf12) !!},
      "alarme": {!! $uti_alarme12 !!},
      "critico": {!! $uti_critico12 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  },{
      "periodo": {!! json_encode($atualf11) !!},
      "alarme": {!! $uti_alarme11 !!},
      "critico": {!! $uti_critico11 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf10) !!},
      "alarme": {!! $uti_alarme10 !!},
      "critico": {!! $uti_critico10 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf9) !!},
      "alarme": {!! $uti_alarme9 !!},
      "critico": {!! $uti_critico9 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf8) !!},
      "alarme": {!! $uti_alarme8 !!},
      "critico": {!! $uti_critico8 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf7) !!},
      "alarme": {!! $uti_alarme7 !!},
      "critico": {!! $uti_critico7 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf6) !!},
      "alarme": {!! $uti_alarme6 !!},
      "critico": {!! $uti_critico6 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf5) !!},
      "alarme": {!! $uti_alarme5 !!},
      "critico": {!! $uti_critico5 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf4) !!},
      "alarme": {!! $uti_alarme4 !!},
      "critico": {!! $uti_critico4 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf3) !!},
      "alarme": {!! $uti_alarme3 !!},
      "critico": {!! $uti_critico3 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf2) !!},
      "alarme": {!! $uti_alarme2 !!},
      "critico": {!! $uti_critico2 !!},
      "color": "#FCD202",
      "colorCr": "#db1111"
  }, {
      "periodo": {!! json_encode($atualf1) !!},
      "alarme": {!! $uti_alarme1 !!},
      "critico": {!! $uti_critico1 !!},
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

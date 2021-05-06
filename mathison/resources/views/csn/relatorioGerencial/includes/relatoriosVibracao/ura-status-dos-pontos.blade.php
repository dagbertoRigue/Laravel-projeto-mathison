@extends('csn.templates.templateRelatorios')

@section('content')
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
                    <strong><h4 style="color:#555; margin: 0 0 0px;">Unidade de Regeneração de Ácido</h4></strong>
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
                      <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Status dos Pontos</strong></h6>
                      <div id="chartdiv"></div>  <!-- Gráfico principal Termografia Perfil Coletados -->
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

    <style>
    #chartdiv {
      width : 100%;
      height  : 470px;
    }
    </style>

    <!-- Chart code -->
    <script>
      var chartData = [{
        "date": {!! json_encode($atual12) !!},
        "normal": {!! json_encode($ura_normal12) !!},
        "alarme": {!! json_encode($ura_alarme12) !!},
        "critico": {!! json_encode($ura_critico12) !!},
        },{
        "date": {!! json_encode($atual11) !!},
        "normal": {!! json_encode($ura_normal11) !!},
        "alarme": {!! json_encode($ura_alarme11) !!},
        "critico": {!! json_encode($ura_critico11) !!},
        },{
        "date": {!! json_encode($atual10) !!},
        "normal": {!! json_encode($ura_normal10) !!},
        "alarme": {!! json_encode($ura_alarme10) !!},
        "critico": {!! json_encode($ura_critico10) !!},
        },{
        "date": {!! json_encode($atual9) !!},
        "normal": {!! json_encode($ura_normal9) !!},
        "alarme": {!! json_encode($ura_alarme9) !!},
        "critico": {!! json_encode($ura_critico9) !!},
        },{
        "date": {!! json_encode($atual8) !!},
        "normal": {!! json_encode($ura_normal8) !!},
        "alarme": {!! json_encode($ura_alarme8) !!},
        "critico": {!! json_encode($ura_critico8) !!},
        },{
        "date": {!! json_encode($atual7) !!},
        "normal": {!! json_encode($ura_normal7) !!},
        "alarme": {!! json_encode($ura_alarme7) !!},
        "critico": {!! json_encode($ura_critico7) !!},
        },{
        "date": {!! json_encode($atual6) !!},
        "normal": {!! json_encode($ura_normal6) !!},
        "alarme": {!! json_encode($ura_alarme6) !!},
        "critico": {!! json_encode($ura_critico6) !!},
        },{
        "date": {!! json_encode($atual5) !!},
        "normal": {!! json_encode($ura_normal5) !!},
        "alarme": {!! json_encode($ura_alarme5) !!},
        "critico": {!! json_encode($ura_critico5) !!},
        },{
        "date": {!! json_encode($atual4) !!},
        "normal": {!! json_encode($ura_normal4) !!},
        "alarme": {!! json_encode($ura_alarme4) !!},
        "critico": {!! json_encode($ura_critico4) !!},
        },{
        "date": {!! json_encode($atual3) !!},
        "normal": {!! json_encode($ura_normal3) !!},
        "alarme": {!! json_encode($ura_alarme3) !!},
        "critico": {!! json_encode($ura_critico3) !!},
        },{
        "date": {!! json_encode($atual2) !!},
        "normal": {!! json_encode($ura_normal2) !!},
        "alarme": {!! json_encode($ura_alarme2) !!},
        "critico": {!! json_encode($ura_critico2) !!},
        },{
        "date": {!! json_encode($atual1) !!},
        "normal": {!! json_encode($ura_normal1) !!},
        "alarme": {!! json_encode($ura_alarme1) !!},
        "critico": {!! json_encode($ura_critico1) !!}
      }];

      var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "light",
        "legend": {
            "useGraphSettings": true
        },
        "dataProvider": chartData,
        "synchronizeGrid":true,
        "graphs": [ {
            "valueAxis": "v3",
            "lineColor": "#FCD202",
            "bullet": "triangleUp",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "Alarme",
            "labelText": "[[value]]",
            "valueField": "alarme",
            "fillAlphas": 0
        }, {
            "valueAxis": "v1",
            "lineColor": "#db1111",
            "bullet": "round",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "Crítico",
            "labelText": "[[value]]",
            "valueField": "critico",
            "fillAlphas": 0
        }, {
            "valueAxis": "v2",
            "lineColor": "#2d9b1a",
            "bullet": "square",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "Normal",
            "labelText": "[[value]]",
            "valueField": "normal",
            "fillAlphas": 0
        }],
        "chartScrollbar": {},
        "chartCursor": {
            "cursorPosition": "mouse",
            "valueBalloonsEnabled": true,
            "avoidBalloonOverlapping": true,
            "categoryBalloonDateFormat": 'MMM YYYY',
            "LeaveAfterTouch": true,
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "axisColor": "#DADADA",
            "minorGridEnabled": true
        }
        });

    </script>
  </div>
</div>
@endsection

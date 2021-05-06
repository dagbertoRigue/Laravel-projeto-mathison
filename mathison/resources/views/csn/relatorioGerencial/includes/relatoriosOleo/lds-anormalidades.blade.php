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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">URA</h4></strong>
              </div>
              <div class="panel-body">
                <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Óleo</strong>
                <div class="panel-body">
                  <div class="col-md-11">
                    <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Anormalidades</strong></h6>
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
    "date": {!! json_encode($dataFAnt11) !!},
    "critico": {!!$critico12!!},
    "normal": {!!$normal12!!},
    "alarme": {!!$alarme12!!}
    },{
    "date": {!! json_encode($dataFAnt10) !!},
    "critico": {!!$critico11!!},
    "normal": {!!$normal11!!},
    "alarme": {!!$alarme11!!}
    },{
    "date": {!! json_encode($dataFAnt9) !!},
    "critico": {!!$critico10!!},
    "normal": {!!$normal10!!},
    "alarme": {!!$alarme10!!}
    },{
    "date": {!! json_encode($dataFAnt8) !!},
    "critico": {!!$critico9!!},
    "normal": {!!$normal9!!},
    "alarme": {!!$alarme9!!}
    },{
    "date": {!! json_encode($dataFAnt7) !!},
    "critico": {!!$critico8!!},
    "normal": {!!$normal8!!},
    "alarme": {!!$alarme8!!}
    },{
    "date": {!! json_encode($dataFAnt6) !!},
    "critico": {!!$critico7!!},
    "normal": {!!$normal7!!},
    "alarme": {!!$alarme7!!}
    },{
    "date": {!! json_encode($dataFAnt5) !!},
    "critico": {!!$critico6!!},
    "normal": {!!$normal6!!},
    "alarme": {!!$alarme6!!}
    },{
    "date": {!! json_encode($dataFAnt4) !!},
    "critico": {!!$critico5!!},
    "normal": {!!$normal5!!},
    "alarme": {!!$alarme5!!}
    },{
    "date": {!! json_encode($dataFAnt3) !!},
    "critico": {!!$critico4!!},
    "normal": {!!$normal4!!},
    "alarme": {!!$alarme4!!}
    },{
    "date": {!! json_encode($dataFAnt2) !!},
    "critico": {!!$critico3!!},
    "normal": {!!$normal3!!},
    "alarme": {!!$alarme3!!}
    },{
    "date": {!! json_encode($dataFAnt1) !!},
    "critico": {!!$critico2!!},
    "normal": {!!$normal2!!},
    "alarme": {!!$alarme2!!}
    },{
    "date": {!! json_encode($atualInicial) !!},
    "critico": {!!$critico1!!},
    "normal": {!!$normal1!!},
    "alarme": {!!$alarme1!!}
    }];

    var chart = AmCharts.makeChart("chartdiv", {

      "type": "serial",
      "theme": "light",
      "legend": {
          "useGraphSettings": true
      },
      "dataProvider": chartData,
      "synchronizeGrid":true,
      "valueAxes": [{
          "id":"v1",<!-- crítico -->
          "axisColor": "#db1111",
          "axisThickness": 2,
          "axisAlpha": 1,
          "position": "left"
      }, {
          "id":"v2",<!-- normal -->
          "axisColor": "#2d9b1a",
          "axisThickness": 2,
          "axisAlpha": 1,
          "position": "right"
      }, {
          "id":"v3",<!-- alarme -->
          "axisColor": "#FCD202",
          "axisThickness": 2,
          "gridAlpha": 0,
          "offset": 55,
          "axisAlpha": 1,
          "position": "left"
      }],
      "graphs": [ {
          "valueAxis": "v3",
          "lineColor": "#FCD202",
          "bullet": "triangleUp",
          "bulletBorderThickness": 1,
          "hideBulletsCount": 30,
          "title": "Alarme",
          "valueField": "alarme",
      "fillAlphas": 0
    }, {
          "valueAxis": "v1",
          "lineColor": "#db1111",
          "bullet": "round",
          "bulletBorderThickness": 1,
          "hideBulletsCount": 30,
          "title": "Crítico",
          "valueField": "critico",
      "fillAlphas": 0
      }, {
          "valueAxis": "v2",
          "lineColor": "#2d9b1a",
          "bullet": "square",
          "bulletBorderThickness": 1,
          "hideBulletsCount": 30,
          "title": "Normal",
          "valueField": "normal",
      "fillAlphas": 0
      }],
      "chartScrollbar": {},
      "chartCursor": {
          "cursorPosition": "mouse"
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
@endsection

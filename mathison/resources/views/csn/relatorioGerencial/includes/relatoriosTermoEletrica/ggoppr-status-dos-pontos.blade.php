@extends('csn.templates.templateRelatorios')

@section('content')
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerTE')

  <div id="wrapper-side" style="margin-top:0px">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-TermoEletrica')
    <div id="page-content-wrapper-side">
      <div class="container-fluid">

  <!-- - - - - - - - - - - - GRÁFICO GGOP-PR ANORMALIDADES - - - - - - - - - - - -->
      <div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
        <div class="col-md-9 col-md-offset-2" style="padding-left:40px">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-heading">
                  <strong><h4 style="color:#555; margin: 0 0 0px;">GGOP-PR</h4></strong>
                  <h6 style="float: right!important; margin:-15px 10px 35px;">Total de Equipamentos Monitorados: <strong>{{$sum}}</strong></h6>
              </div>
              <div class="panel-body">
                <div class="row" style="margin-top: 0px;margin-bottom:0px;">
                  <h5 style="color:#555; margin-top:-4px; margin-bottom: 4px; margin-left:15px;"><strong>Análise de Termografia Elétrica</strong>
                </div>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <h6 style="color:#555; margin-top:10px;"><strong>Status dos Pontos - Coletados Mês Atual</strong></h6>
                    <div id="chartdivTermoPerfilColetados"></div>  <!-- Gráfico principal Termografia Perfil Coletados -->
                  </div>
                  <div class="col-md-6">
                    <h6 style="color:#555; margin-top:10px;"><strong>Status dos Pontos - Não Coletados Mês Atual</strong></h6>
                    <div id="chartdiv1"></div>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="col-md-11">
                    <h6 style="color:#555; margin-top:10px; margin-bottom:0px;"><strong>Histórico Status dos Pontos</strong></h6>
                    <div id="chartdiv"></div>  <!-- Gráfico principal Termografia Perfil Coletados -->
                    <hr>
                  </div>

                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <style>
    #chartdiv {
      width : 100%;
      height  : 350px;
    }
    #chartdivTermoPerfilColetados {
      width: 70%;
      height: 200px;
    }
    #chartdiv1 {
      width: 70%;
      height: 200px;
    }
    </style>

    <!-- Chart code -->
    <script>
    var chartData = [{
      "date": {!! json_encode($atual12) !!},
      "normal": {!! json_encode($normal12) !!},
      "alarme": {!! json_encode($alarme12) !!},
      "critico": {!! json_encode($critico12) !!},
      },{
      "date": {!! json_encode($atual11) !!},
      "normal": {!! json_encode($normal11) !!},
      "alarme": {!! json_encode($alarme11) !!},
      "critico": {!! json_encode($critico11) !!},
      },{
      "date": {!! json_encode($atual10) !!},
      "normal": {!! json_encode($normal10) !!},
      "alarme": {!! json_encode($alarme10) !!},
      "critico": {!! json_encode($critico10) !!},
      },{
      "date": {!! json_encode($atual9) !!},
      "normal": {!! json_encode($normal9) !!},
      "alarme": {!! json_encode($alarme9) !!},
      "critico": {!! json_encode($critico9) !!},
      },{
      "date": {!! json_encode($atual8) !!},
      "normal": {!! json_encode($normal8) !!},
      "alarme": {!! json_encode($alarme8) !!},
      "critico": {!! json_encode($critico8) !!},
      },{
      "date": {!! json_encode($atual7) !!},
      "normal": {!! json_encode($normal7) !!},
      "alarme": {!! json_encode($alarme7) !!},
      "critico": {!! json_encode($critico7) !!},
      },{
      "date": {!! json_encode($atual6) !!},
      "normal": {!! json_encode($normal6) !!},
      "alarme": {!! json_encode($alarme6) !!},
      "critico": {!! json_encode($critico6) !!},
      },{
      "date": {!! json_encode($atual5) !!},
      "normal": {!! json_encode($normal5) !!},
      "alarme": {!! json_encode($alarme5) !!},
      "critico": {!! json_encode($critico5) !!},
      },{
      "date": {!! json_encode($atual4) !!},
      "normal": {!! json_encode($normal4) !!},
      "alarme": {!! json_encode($alarme4) !!},
      "critico": {!! json_encode($critico4) !!},
      },{
      "date": {!! json_encode($atual3) !!},
      "normal": {!! json_encode($normal3) !!},
      "alarme": {!! json_encode($alarme3) !!},
      "critico": {!! json_encode($critico3) !!},
      },{
      "date": {!! json_encode($atual2) !!},
      "normal": {!! json_encode($normal2) !!},
      "alarme": {!! json_encode($alarme2) !!},
      "critico": {!! json_encode($critico2) !!},
      },{
      "date": {!! json_encode($atual1) !!},
      "normal": {!! json_encode($normal1) !!},
      "alarme": {!! json_encode($alarme1) !!},
      "critico": {!! json_encode($critico1) !!}
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

        var chart = AmCharts.makeChart( "chartdivTermoPerfilColetados", {
          "type": "pie",
          "theme": "none",
          "dataProvider": [ {
            "status": "Crítico",
            "color": "#db1111",
            "value": {!!$critico!!},
            "mPercents": {!!$criticoP!!}
          }, {
            "status": "Alarme",
            "color": "#FCD202",
            "value": {!!$alarme!!},
            "mPercents": {!!$alarmeP!!}
          }, {
            "status": "Normal",
            "color": "#2d9b1a",
            "value": {!!$normal!!},
            "mPercents": {!!$normalP!!}
          } ],
          "valueField": "value",
          "colorField": "color",
          "titleField": "status",
          "outlineAlpha": 0.4,
          "depth3D": 20,
          "pullOutRadius": 0,
          "balloonText": "[[title]]: <span style='font-size:14px'><b>[[value]]</b></span>",
          "angle": 45,
          "export": {
            "enabled": true
          },
           "numberFormatter": {
                "precision": -1,
                "decimalSeparator": ",",
                "thousandsSeparator": ""
            }
        });

        var chart = AmCharts.makeChart( "chartdiv1", {
          "type": "pie",
          "theme": "none",
          "dataProvider": [ {
            "status": "Manutenção",
            "color": "#777d84",
            "value": {!! $manutencao !!},
            "mPercents": {!!$manutencaoP!!}
          }, {
            "status": "Stand By",
            "color": "#3e658e",
            "value": {!! $standBy !!},
            "mPercents": {!!$standByP!!}
          } ],
          "valueField": "value",
          "colorField": "color",
          "titleField": "status",
          "outlineAlpha": 0.4,
          "depth3D": 20,
          "pullOutRadius": 0,
          "balloonText": "[[title]]: <span style='font-size:14px'><b>[[value]]</b></span>",
          "angle": 45,
          "export": {
            "enabled": true
          },
           "numberFormatter": {
                "precision": -1,
                "decimalSeparator": ",",
                "thousandsSeparator": ""
            }
        });
    </script>
  </div>
@endsection

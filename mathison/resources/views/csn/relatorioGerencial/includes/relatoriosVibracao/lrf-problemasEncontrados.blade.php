@extends('csn.templates.templateRelatorios')

@section('content')
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerVB')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-Vibracao')
    <div id="page-content-wrapper-side">
      <div class="container-fluid">

  <!-- - - - - - - - - - - - GRÁFICO URA PROBLEMAS ENCONTRADOS - - - - - - - - - - - -->
      <div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
        <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-heading">
                <strong><h4 style="color:#555; margin: 0 0 0px;">Laminador Reversível a Frio</h4></strong>
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
                    <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Problemas Encontrados</strong></h6>
                    <div id="chartdiv" style="width:110%; height: 600px;"></div>
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
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "legend": {
        "horizontalGap": 20,
        "position": "right",
    "useGraphSettings": true,
    "markerSize": 10
    },
    "dataProvider": [{
      "mes": {!! json_encode($atualf12) !!},
      "desalinhamento": {!! $lrf_desalinhamento12 !!},
      "lubrificacao": {!! $lrf_lubrificacao12 !!},
      "rolamento": {!! $lrf_rolamento12 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento12 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga12 !!},
      "engrenamento": {!! $lrf_engrenamento12 !!},
      "cavitacao": {!! $lrf_cavitacao12 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica12 !!},

      },{
      "mes": {!! json_encode($atualf11) !!},
      "desalinhamento": {!! $lrf_desalinhamento11 !!},
      "lubrificacao": {!! $lrf_lubrificacao11 !!},
      "rolamento": {!! $lrf_rolamento11 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento11 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga11 !!},
      "engrenamento": {!! $lrf_engrenamento11 !!},
      "cavitacao": {!! $lrf_cavitacao11 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica11 !!},

      },{
      "mes": {!! json_encode($atualf10) !!},
      "desalinhamento": {!! $lrf_desalinhamento10 !!},
      "lubrificacao": {!! $lrf_lubrificacao10 !!},
      "rolamento": {!! $lrf_rolamento10 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento10 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga10 !!},
      "engrenamento": {!! $lrf_engrenamento10 !!},
      "cavitacao": {!! $lrf_cavitacao10 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica10 !!},

      },{
      "mes": {!! json_encode($atualf9) !!},
      "desalinhamento": {!! $lrf_desalinhamento9 !!},
      "lubrificacao": {!! $lrf_lubrificacao9 !!},
      "rolamento": {!! $lrf_rolamento9 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento9 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga9 !!},
      "engrenamento": {!! $lrf_engrenamento9 !!},
      "cavitacao": {!! $lrf_cavitacao9 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica9 !!},

      },{
      "mes": {!! json_encode($atualf8) !!},
      "desalinhamento": {!! $lrf_desalinhamento8 !!},
      "lubrificacao": {!! $lrf_lubrificacao8 !!},
      "rolamento": {!! $lrf_rolamento8 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento8 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga8 !!},
      "engrenamento": {!! $lrf_engrenamento8 !!},
      "cavitacao": {!! $lrf_cavitacao8 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica8 !!},

      },{
      "mes": {!! json_encode($atualf7) !!},
      "desalinhamento": {!! $lrf_desalinhamento7 !!},
      "lubrificacao": {!! $lrf_lubrificacao7 !!},
      "rolamento": {!! $lrf_rolamento7 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento7 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga7 !!},
      "engrenamento": {!! $lrf_engrenamento7 !!},
      "cavitacao": {!! $lrf_cavitacao7 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica7 !!},

      },{
      "mes": {!! json_encode($atualf6) !!},
      "desalinhamento": {!! $lrf_desalinhamento6 !!},
      "lubrificacao": {!! $lrf_lubrificacao6 !!},
      "rolamento": {!! $lrf_rolamento6 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento6 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga6 !!},
      "engrenamento": {!! $lrf_engrenamento6 !!},
      "cavitacao": {!! $lrf_cavitacao6 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica6 !!},

      },{
      "mes": {!! json_encode($atualf5) !!},
      "desalinhamento": {!! $lrf_desalinhamento5 !!},
      "lubrificacao": {!! $lrf_lubrificacao5 !!},
      "rolamento": {!! $lrf_rolamento5 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento5 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga5 !!},
      "engrenamento": {!! $lrf_engrenamento5 !!},
      "cavitacao": {!! $lrf_cavitacao5 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica5 !!},

      },{
      "mes": {!! json_encode($atualf4) !!},
      "desalinhamento": {!! $lrf_desalinhamento4 !!},
      "lubrificacao": {!! $lrf_lubrificacao4 !!},
      "rolamento": {!! $lrf_rolamento4 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento4 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga4 !!},
      "engrenamento": {!! $lrf_engrenamento4 !!},
      "cavitacao": {!! $lrf_cavitacao4 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica4 !!},

      },{
      "mes": {!! json_encode($atualf3) !!},
      "desalinhamento": {!! $lrf_desalinhamento3 !!},
      "lubrificacao": {!! $lrf_lubrificacao3 !!},
      "rolamento": {!! $lrf_rolamento3 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento3 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga3 !!},
      "engrenamento": {!! $lrf_engrenamento3 !!},
      "cavitacao": {!! $lrf_cavitacao3 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica3 !!},

      },{
      "mes": {!! json_encode($atualf2) !!},
      "desalinhamento": {!! $lrf_desalinhamento2 !!},
      "lubrificacao": {!! $lrf_lubrificacao2 !!},
      "rolamento": {!! $lrf_rolamento2 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento2 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga2 !!},
      "engrenamento": {!! $lrf_engrenamento2 !!},
      "cavitacao": {!! $lrf_cavitacao2 !!},
      "falhaEletrica": {!! $lrf_falhaEletrica2 !!},

      },{
      "mes": {!! json_encode($atualf1) !!},
      "desalinhamento": {!! $lrf_desalinhamento1 !!},
      "lubrificacao": {!! $lrf_lubrificacao1 !!},
      "rolamento": {!! $lrf_rolamento1 !!},
      "desbalanceamento": {!! $lrf_desbalanceamento1 !!},
      "desgasteFolga": {!! $lrf_desgasteFolga1 !!},
      "engrenamento": {!! $lrf_engrenamento1 !!},
      "cavitacao": {!! $lrf_cavitacao1  !!},
      "falhaEletrica": {!! $lrf_falhaEletrica1 !!},
    }],
    "valueAxes": [{
        "stackType": "regular",
        "gridAlpha": 0.1
    }],
    "graphs": [{
        "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Desgaste/Folga",
        "type": "column",
        "color": "#000000",
        "lineColor": "#859e3d",
        "valueField": "desgasteFolga"
    }, {
        "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Rolamento",
        "type": "column",
        "color": "#000000",
        "lineColor": "#555555",
        "valueField": "rolamento"
    }, {
        "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Desbalanceamento",
        "type": "column",
        "color": "#000000",
        "lineColor": "#5a3d9e",
        "valueField": "desbalanceamento"
    }, {
        "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Desalinhamento",
        "type": "column",
        "color": "#000000",
        "lineColor": "#3d9e8e",
        "valueField": "desalinhamento"
    }, {
        "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Lubrificacao",
        "type": "column",
        "color": "#000000",
        "lineColor": "#3d729e",
        "valueField": "lubrificacao"
    }, {
        "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Engrenamento",
        "type": "column",
        "color": "#000000",
        "lineColor": "#9e823d",
        "valueField": "engrenamento"
    }, {
        "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Cavitação",
        "type": "column",
        "color": "#000000",
        "lineColor": "#cc3db8",
        "valueField": "cavitacao"
    }, {
        "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Falha Eletrica",
        "type": "column",
        "color": "#000000",
        "lineColor": "#e0b123",

        "valueField": "falhaEletrica"
    }],
    "categoryField": "mes",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    },
    "export": {
      "enabled": true
     }

});
</script>
@endsection

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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Linha de Pintura Contínua</h4></strong>
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
      "desalinhamento": {!! $lpc_desalinhamento12 !!},
      "lubrificacao": {!! $lpc_lubrificacao12 !!},
      "rolamento": {!! $lpc_rolamento12 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento12 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga12 !!},
      "engrenamento": {!! $lpc_engrenamento12 !!},
      "cavitacao": {!! $lpc_cavitacao12 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica12 !!},

      },{
      "mes": {!! json_encode($atualf11) !!},
      "desalinhamento": {!! $lpc_desalinhamento11 !!},
      "lubrificacao": {!! $lpc_lubrificacao11 !!},
      "rolamento": {!! $lpc_rolamento11 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento11 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga11 !!},
      "engrenamento": {!! $lpc_engrenamento11 !!},
      "cavitacao": {!! $lpc_cavitacao11 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica11 !!},

      },{
      "mes": {!! json_encode($atualf10) !!},
      "desalinhamento": {!! $lpc_desalinhamento10 !!},
      "lubrificacao": {!! $lpc_lubrificacao10 !!},
      "rolamento": {!! $lpc_rolamento10 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento10 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga10 !!},
      "engrenamento": {!! $lpc_engrenamento10 !!},
      "cavitacao": {!! $lpc_cavitacao10 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica10 !!},

      },{
      "mes": {!! json_encode($atualf9) !!},
      "desalinhamento": {!! $lpc_desalinhamento9 !!},
      "lubrificacao": {!! $lpc_lubrificacao9 !!},
      "rolamento": {!! $lpc_rolamento9 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento9 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga9 !!},
      "engrenamento": {!! $lpc_engrenamento9 !!},
      "cavitacao": {!! $lpc_cavitacao9 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica9 !!},

      },{
      "mes": {!! json_encode($atualf8) !!},
      "desalinhamento": {!! $lpc_desalinhamento8 !!},
      "lubrificacao": {!! $lpc_lubrificacao8 !!},
      "rolamento": {!! $lpc_rolamento8 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento8 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga8 !!},
      "engrenamento": {!! $lpc_engrenamento8 !!},
      "cavitacao": {!! $lpc_cavitacao8 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica8 !!},

      },{
      "mes": {!! json_encode($atualf7) !!},
      "desalinhamento": {!! $lpc_desalinhamento7 !!},
      "lubrificacao": {!! $lpc_lubrificacao7 !!},
      "rolamento": {!! $lpc_rolamento7 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento7 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga7 !!},
      "engrenamento": {!! $lpc_engrenamento7 !!},
      "cavitacao": {!! $lpc_cavitacao7 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica7 !!},

      },{
      "mes": {!! json_encode($atualf6) !!},
      "desalinhamento": {!! $lpc_desalinhamento6 !!},
      "lubrificacao": {!! $lpc_lubrificacao6 !!},
      "rolamento": {!! $lpc_rolamento6 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento6 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga6 !!},
      "engrenamento": {!! $lpc_engrenamento6 !!},
      "cavitacao": {!! $lpc_cavitacao6 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica6 !!},

      },{
      "mes": {!! json_encode($atualf5) !!},
      "desalinhamento": {!! $lpc_desalinhamento5 !!},
      "lubrificacao": {!! $lpc_lubrificacao5 !!},
      "rolamento": {!! $lpc_rolamento5 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento5 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga5 !!},
      "engrenamento": {!! $lpc_engrenamento5 !!},
      "cavitacao": {!! $lpc_cavitacao5 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica5 !!},

      },{
      "mes": {!! json_encode($atualf4) !!},
      "desalinhamento": {!! $lpc_desalinhamento4 !!},
      "lubrificacao": {!! $lpc_lubrificacao4 !!},
      "rolamento": {!! $lpc_rolamento4 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento4 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga4 !!},
      "engrenamento": {!! $lpc_engrenamento4 !!},
      "cavitacao": {!! $lpc_cavitacao4 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica4 !!},

      },{
      "mes": {!! json_encode($atualf3) !!},
      "desalinhamento": {!! $lpc_desalinhamento3 !!},
      "lubrificacao": {!! $lpc_lubrificacao3 !!},
      "rolamento": {!! $lpc_rolamento3 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento3 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga3 !!},
      "engrenamento": {!! $lpc_engrenamento3 !!},
      "cavitacao": {!! $lpc_cavitacao3 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica3 !!},

      },{
      "mes": {!! json_encode($atualf2) !!},
      "desalinhamento": {!! $lpc_desalinhamento2 !!},
      "lubrificacao": {!! $lpc_lubrificacao2 !!},
      "rolamento": {!! $lpc_rolamento2 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento2 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga2 !!},
      "engrenamento": {!! $lpc_engrenamento2 !!},
      "cavitacao": {!! $lpc_cavitacao2 !!},
      "falhaEletrica": {!! $lpc_falhaEletrica2 !!},

      },{
      "mes": {!! json_encode($atualf1) !!},
      "desalinhamento": {!! $lpc_desalinhamento1 !!},
      "lubrificacao": {!! $lpc_lubrificacao1 !!},
      "rolamento": {!! $lpc_rolamento1 !!},
      "desbalanceamento": {!! $lpc_desbalanceamento1 !!},
      "desgasteFolga": {!! $lpc_desgasteFolga1 !!},
      "engrenamento": {!! $lpc_engrenamento1 !!},
      "cavitacao": {!! $lpc_cavitacao1  !!},
      "falhaEletrica": {!! $lpc_falhaEletrica1 !!},
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

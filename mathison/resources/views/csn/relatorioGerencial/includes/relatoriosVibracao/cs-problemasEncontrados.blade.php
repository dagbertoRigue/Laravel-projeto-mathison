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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Centro de Serviços</h4></strong>
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
      "desalinhamento": {!! $cs_desalinhamento12 !!},
      "lubrificacao": {!! $cs_lubrificacao12 !!},
      "rolamento": {!! $cs_rolamento12 !!},
      "desbalanceamento": {!! $cs_desbalanceamento12 !!},
      "desgasteFolga": {!! $cs_desgasteFolga12 !!},
      "engrenamento": {!! $cs_engrenamento12 !!},
      "cavitacao": {!! $cs_cavitacao12 !!},
      "falhaEletrica": {!! $cs_falhaEletrica12 !!},

      },{
      "mes": {!! json_encode($atualf11) !!},
      "desalinhamento": {!! $cs_desalinhamento11 !!},
      "lubrificacao": {!! $cs_lubrificacao11 !!},
      "rolamento": {!! $cs_rolamento11 !!},
      "desbalanceamento": {!! $cs_desbalanceamento11 !!},
      "desgasteFolga": {!! $cs_desgasteFolga11 !!},
      "engrenamento": {!! $cs_engrenamento11 !!},
      "cavitacao": {!! $cs_cavitacao11 !!},
      "falhaEletrica": {!! $cs_falhaEletrica11 !!},

      },{
      "mes": {!! json_encode($atualf10) !!},
      "desalinhamento": {!! $cs_desalinhamento10 !!},
      "lubrificacao": {!! $cs_lubrificacao10 !!},
      "rolamento": {!! $cs_rolamento10 !!},
      "desbalanceamento": {!! $cs_desbalanceamento10 !!},
      "desgasteFolga": {!! $cs_desgasteFolga10 !!},
      "engrenamento": {!! $cs_engrenamento10 !!},
      "cavitacao": {!! $cs_cavitacao10 !!},
      "falhaEletrica": {!! $cs_falhaEletrica10 !!},

      },{
      "mes": {!! json_encode($atualf9) !!},
      "desalinhamento": {!! $cs_desalinhamento9 !!},
      "lubrificacao": {!! $cs_lubrificacao9 !!},
      "rolamento": {!! $cs_rolamento9 !!},
      "desbalanceamento": {!! $cs_desbalanceamento9 !!},
      "desgasteFolga": {!! $cs_desgasteFolga9 !!},
      "engrenamento": {!! $cs_engrenamento9 !!},
      "cavitacao": {!! $cs_cavitacao9 !!},
      "falhaEletrica": {!! $cs_falhaEletrica9 !!},

      },{
      "mes": {!! json_encode($atualf8) !!},
      "desalinhamento": {!! $cs_desalinhamento8 !!},
      "lubrificacao": {!! $cs_lubrificacao8 !!},
      "rolamento": {!! $cs_rolamento8 !!},
      "desbalanceamento": {!! $cs_desbalanceamento8 !!},
      "desgasteFolga": {!! $cs_desgasteFolga8 !!},
      "engrenamento": {!! $cs_engrenamento8 !!},
      "cavitacao": {!! $cs_cavitacao8 !!},
      "falhaEletrica": {!! $cs_falhaEletrica8 !!},

      },{
      "mes": {!! json_encode($atualf7) !!},
      "desalinhamento": {!! $cs_desalinhamento7 !!},
      "lubrificacao": {!! $cs_lubrificacao7 !!},
      "rolamento": {!! $cs_rolamento7 !!},
      "desbalanceamento": {!! $cs_desbalanceamento7 !!},
      "desgasteFolga": {!! $cs_desgasteFolga7 !!},
      "engrenamento": {!! $cs_engrenamento7 !!},
      "cavitacao": {!! $cs_cavitacao7 !!},
      "falhaEletrica": {!! $cs_falhaEletrica7 !!},

      },{
      "mes": {!! json_encode($atualf6) !!},
      "desalinhamento": {!! $cs_desalinhamento6 !!},
      "lubrificacao": {!! $cs_lubrificacao6 !!},
      "rolamento": {!! $cs_rolamento6 !!},
      "desbalanceamento": {!! $cs_desbalanceamento6 !!},
      "desgasteFolga": {!! $cs_desgasteFolga6 !!},
      "engrenamento": {!! $cs_engrenamento6 !!},
      "cavitacao": {!! $cs_cavitacao6 !!},
      "falhaEletrica": {!! $cs_falhaEletrica6 !!},

      },{
      "mes": {!! json_encode($atualf5) !!},
      "desalinhamento": {!! $cs_desalinhamento5 !!},
      "lubrificacao": {!! $cs_lubrificacao5 !!},
      "rolamento": {!! $cs_rolamento5 !!},
      "desbalanceamento": {!! $cs_desbalanceamento5 !!},
      "desgasteFolga": {!! $cs_desgasteFolga5 !!},
      "engrenamento": {!! $cs_engrenamento5 !!},
      "cavitacao": {!! $cs_cavitacao5 !!},
      "falhaEletrica": {!! $cs_falhaEletrica5 !!},

      },{
      "mes": {!! json_encode($atualf4) !!},
      "desalinhamento": {!! $cs_desalinhamento4 !!},
      "lubrificacao": {!! $cs_lubrificacao4 !!},
      "rolamento": {!! $cs_rolamento4 !!},
      "desbalanceamento": {!! $cs_desbalanceamento4 !!},
      "desgasteFolga": {!! $cs_desgasteFolga4 !!},
      "engrenamento": {!! $cs_engrenamento4 !!},
      "cavitacao": {!! $cs_cavitacao4 !!},
      "falhaEletrica": {!! $cs_falhaEletrica4 !!},

      },{
      "mes": {!! json_encode($atualf3) !!},
      "desalinhamento": {!! $cs_desalinhamento3 !!},
      "lubrificacao": {!! $cs_lubrificacao3 !!},
      "rolamento": {!! $cs_rolamento3 !!},
      "desbalanceamento": {!! $cs_desbalanceamento3 !!},
      "desgasteFolga": {!! $cs_desgasteFolga3 !!},
      "engrenamento": {!! $cs_engrenamento3 !!},
      "cavitacao": {!! $cs_cavitacao3 !!},
      "falhaEletrica": {!! $cs_falhaEletrica3 !!},

      },{
      "mes": {!! json_encode($atualf2) !!},
      "desalinhamento": {!! $cs_desalinhamento2 !!},
      "lubrificacao": {!! $cs_lubrificacao2 !!},
      "rolamento": {!! $cs_rolamento2 !!},
      "desbalanceamento": {!! $cs_desbalanceamento2 !!},
      "desgasteFolga": {!! $cs_desgasteFolga2 !!},
      "engrenamento": {!! $cs_engrenamento2 !!},
      "cavitacao": {!! $cs_cavitacao2 !!},
      "falhaEletrica": {!! $cs_falhaEletrica2 !!},

      },{
      "mes": {!! json_encode($atualf1) !!},
      "desalinhamento": {!! $cs_desalinhamento1 !!},
      "lubrificacao": {!! $cs_lubrificacao1 !!},
      "rolamento": {!! $cs_rolamento1 !!},
      "desbalanceamento": {!! $cs_desbalanceamento1 !!},
      "desgasteFolga": {!! $cs_desgasteFolga1 !!},
      "engrenamento": {!! $cs_engrenamento1 !!},
      "cavitacao": {!! $cs_cavitacao1  !!},
      "falhaEletrica": {!! $cs_falhaEletrica1 !!},
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

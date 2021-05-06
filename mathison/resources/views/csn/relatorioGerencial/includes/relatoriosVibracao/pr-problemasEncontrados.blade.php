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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Pontes Rolantes</h4></strong>
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
      "desalinhamento": {!! $pr_desalinhamento12 !!},
      "lubrificacao": {!! $pr_lubrificacao12 !!},
      "rolamento": {!! $pr_rolamento12 !!},
      "desbalanceamento": {!! $pr_desbalanceamento12 !!},
      "desgasteFolga": {!! $pr_desgasteFolga12 !!},
      "engrenamento": {!! $pr_engrenamento12 !!},
      "cavitacao": {!! $pr_cavitacao12 !!},
      "falhaEletrica": {!! $pr_falhaEletrica12 !!},

      },{
      "mes": {!! json_encode($atualf11) !!},
      "desalinhamento": {!! $pr_desalinhamento11 !!},
      "lubrificacao": {!! $pr_lubrificacao11 !!},
      "rolamento": {!! $pr_rolamento11 !!},
      "desbalanceamento": {!! $pr_desbalanceamento11 !!},
      "desgasteFolga": {!! $pr_desgasteFolga11 !!},
      "engrenamento": {!! $pr_engrenamento11 !!},
      "cavitacao": {!! $pr_cavitacao11 !!},
      "falhaEletrica": {!! $pr_falhaEletrica11 !!},

      },{
      "mes": {!! json_encode($atualf10) !!},
      "desalinhamento": {!! $pr_desalinhamento10 !!},
      "lubrificacao": {!! $pr_lubrificacao10 !!},
      "rolamento": {!! $pr_rolamento10 !!},
      "desbalanceamento": {!! $pr_desbalanceamento10 !!},
      "desgasteFolga": {!! $pr_desgasteFolga10 !!},
      "engrenamento": {!! $pr_engrenamento10 !!},
      "cavitacao": {!! $pr_cavitacao10 !!},
      "falhaEletrica": {!! $pr_falhaEletrica10 !!},

      },{
      "mes": {!! json_encode($atualf9) !!},
      "desalinhamento": {!! $pr_desalinhamento9 !!},
      "lubrificacao": {!! $pr_lubrificacao9 !!},
      "rolamento": {!! $pr_rolamento9 !!},
      "desbalanceamento": {!! $pr_desbalanceamento9 !!},
      "desgasteFolga": {!! $pr_desgasteFolga9 !!},
      "engrenamento": {!! $pr_engrenamento9 !!},
      "cavitacao": {!! $pr_cavitacao9 !!},
      "falhaEletrica": {!! $pr_falhaEletrica9 !!},

      },{
      "mes": {!! json_encode($atualf8) !!},
      "desalinhamento": {!! $pr_desalinhamento8 !!},
      "lubrificacao": {!! $pr_lubrificacao8 !!},
      "rolamento": {!! $pr_rolamento8 !!},
      "desbalanceamento": {!! $pr_desbalanceamento8 !!},
      "desgasteFolga": {!! $pr_desgasteFolga8 !!},
      "engrenamento": {!! $pr_engrenamento8 !!},
      "cavitacao": {!! $pr_cavitacao8 !!},
      "falhaEletrica": {!! $pr_falhaEletrica8 !!},

      },{
      "mes": {!! json_encode($atualf7) !!},
      "desalinhamento": {!! $pr_desalinhamento7 !!},
      "lubrificacao": {!! $pr_lubrificacao7 !!},
      "rolamento": {!! $pr_rolamento7 !!},
      "desbalanceamento": {!! $pr_desbalanceamento7 !!},
      "desgasteFolga": {!! $pr_desgasteFolga7 !!},
      "engrenamento": {!! $pr_engrenamento7 !!},
      "cavitacao": {!! $pr_cavitacao7 !!},
      "falhaEletrica": {!! $pr_falhaEletrica7 !!},

      },{
      "mes": {!! json_encode($atualf6) !!},
      "desalinhamento": {!! $pr_desalinhamento6 !!},
      "lubrificacao": {!! $pr_lubrificacao6 !!},
      "rolamento": {!! $pr_rolamento6 !!},
      "desbalanceamento": {!! $pr_desbalanceamento6 !!},
      "desgasteFolga": {!! $pr_desgasteFolga6 !!},
      "engrenamento": {!! $pr_engrenamento6 !!},
      "cavitacao": {!! $pr_cavitacao6 !!},
      "falhaEletrica": {!! $pr_falhaEletrica6 !!},

      },{
      "mes": {!! json_encode($atualf5) !!},
      "desalinhamento": {!! $pr_desalinhamento5 !!},
      "lubrificacao": {!! $pr_lubrificacao5 !!},
      "rolamento": {!! $pr_rolamento5 !!},
      "desbalanceamento": {!! $pr_desbalanceamento5 !!},
      "desgasteFolga": {!! $pr_desgasteFolga5 !!},
      "engrenamento": {!! $pr_engrenamento5 !!},
      "cavitacao": {!! $pr_cavitacao5 !!},
      "falhaEletrica": {!! $pr_falhaEletrica5 !!},

      },{
      "mes": {!! json_encode($atualf4) !!},
      "desalinhamento": {!! $pr_desalinhamento4 !!},
      "lubrificacao": {!! $pr_lubrificacao4 !!},
      "rolamento": {!! $pr_rolamento4 !!},
      "desbalanceamento": {!! $pr_desbalanceamento4 !!},
      "desgasteFolga": {!! $pr_desgasteFolga4 !!},
      "engrenamento": {!! $pr_engrenamento4 !!},
      "cavitacao": {!! $pr_cavitacao4 !!},
      "falhaEletrica": {!! $pr_falhaEletrica4 !!},

      },{
      "mes": {!! json_encode($atualf3) !!},
      "desalinhamento": {!! $pr_desalinhamento3 !!},
      "lubrificacao": {!! $pr_lubrificacao3 !!},
      "rolamento": {!! $pr_rolamento3 !!},
      "desbalanceamento": {!! $pr_desbalanceamento3 !!},
      "desgasteFolga": {!! $pr_desgasteFolga3 !!},
      "engrenamento": {!! $pr_engrenamento3 !!},
      "cavitacao": {!! $pr_cavitacao3 !!},
      "falhaEletrica": {!! $pr_falhaEletrica3 !!},

      },{
      "mes": {!! json_encode($atualf2) !!},
      "desalinhamento": {!! $pr_desalinhamento2 !!},
      "lubrificacao": {!! $pr_lubrificacao2 !!},
      "rolamento": {!! $pr_rolamento2 !!},
      "desbalanceamento": {!! $pr_desbalanceamento2 !!},
      "desgasteFolga": {!! $pr_desgasteFolga2 !!},
      "engrenamento": {!! $pr_engrenamento2 !!},
      "cavitacao": {!! $pr_cavitacao2 !!},
      "falhaEletrica": {!! $pr_falhaEletrica2 !!},

      },{
      "mes": {!! json_encode($atualf1) !!},
      "desalinhamento": {!! $pr_desalinhamento1 !!},
      "lubrificacao": {!! $pr_lubrificacao1 !!},
      "rolamento": {!! $pr_rolamento1 !!},
      "desbalanceamento": {!! $pr_desbalanceamento1 !!},
      "desgasteFolga": {!! $pr_desgasteFolga1 !!},
      "engrenamento": {!! $pr_engrenamento1 !!},
      "cavitacao": {!! $pr_cavitacao1  !!},
      "falhaEletrica": {!! $pr_falhaEletrica1 !!},
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

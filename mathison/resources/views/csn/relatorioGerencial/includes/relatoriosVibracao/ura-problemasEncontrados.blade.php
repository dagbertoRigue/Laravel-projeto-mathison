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
      "desalinhamento": {!! $ura_desalinhamento12 !!},
      "lubrificacao": {!! $ura_lubrificacao12 !!},
      "rolamento": {!! $ura_rolamento12 !!},
      "desbalanceamento": {!! $ura_desbalanceamento12 !!},
      "desgasteFolga": {!! $ura_desgasteFolga12 !!},
      "engrenamento": {!! $ura_engrenamento12 !!},
      "cavitacao": {!! $ura_cavitacao12 !!},
      "falhaEletrica": {!! $ura_falhaEletrica12 !!},

      },{
      "mes": {!! json_encode($atualf11) !!},
      "desalinhamento": {!! $ura_desalinhamento11 !!},
      "lubrificacao": {!! $ura_lubrificacao11 !!},
      "rolamento": {!! $ura_rolamento11 !!},
      "desbalanceamento": {!! $ura_desbalanceamento11 !!},
      "desgasteFolga": {!! $ura_desgasteFolga11 !!},
      "engrenamento": {!! $ura_engrenamento11 !!},
      "cavitacao": {!! $ura_cavitacao11 !!},
      "falhaEletrica": {!! $ura_falhaEletrica11 !!},

      },{
      "mes": {!! json_encode($atualf10) !!},
      "desalinhamento": {!! $ura_desalinhamento10 !!},
      "lubrificacao": {!! $ura_lubrificacao10 !!},
      "rolamento": {!! $ura_rolamento10 !!},
      "desbalanceamento": {!! $ura_desbalanceamento10 !!},
      "desgasteFolga": {!! $ura_desgasteFolga10 !!},
      "engrenamento": {!! $ura_engrenamento10 !!},
      "cavitacao": {!! $ura_cavitacao10 !!},
      "falhaEletrica": {!! $ura_falhaEletrica10 !!},

      },{
      "mes": {!! json_encode($atualf9) !!},
      "desalinhamento": {!! $ura_desalinhamento9 !!},
      "lubrificacao": {!! $ura_lubrificacao9 !!},
      "rolamento": {!! $ura_rolamento9 !!},
      "desbalanceamento": {!! $ura_desbalanceamento9 !!},
      "desgasteFolga": {!! $ura_desgasteFolga9 !!},
      "engrenamento": {!! $ura_engrenamento9 !!},
      "cavitacao": {!! $ura_cavitacao9 !!},
      "falhaEletrica": {!! $ura_falhaEletrica9 !!},

      },{
      "mes": {!! json_encode($atualf8) !!},
      "desalinhamento": {!! $ura_desalinhamento8 !!},
      "lubrificacao": {!! $ura_lubrificacao8 !!},
      "rolamento": {!! $ura_rolamento8 !!},
      "desbalanceamento": {!! $ura_desbalanceamento8 !!},
      "desgasteFolga": {!! $ura_desgasteFolga8 !!},
      "engrenamento": {!! $ura_engrenamento8 !!},
      "cavitacao": {!! $ura_cavitacao8 !!},
      "falhaEletrica": {!! $ura_falhaEletrica8 !!},

      },{
      "mes": {!! json_encode($atualf7) !!},
      "desalinhamento": {!! $ura_desalinhamento7 !!},
      "lubrificacao": {!! $ura_lubrificacao7 !!},
      "rolamento": {!! $ura_rolamento7 !!},
      "desbalanceamento": {!! $ura_desbalanceamento7 !!},
      "desgasteFolga": {!! $ura_desgasteFolga7 !!},
      "engrenamento": {!! $ura_engrenamento7 !!},
      "cavitacao": {!! $ura_cavitacao7 !!},
      "falhaEletrica": {!! $ura_falhaEletrica7 !!},

      },{
      "mes": {!! json_encode($atualf6) !!},
      "desalinhamento": {!! $ura_desalinhamento6 !!},
      "lubrificacao": {!! $ura_lubrificacao6 !!},
      "rolamento": {!! $ura_rolamento6 !!},
      "desbalanceamento": {!! $ura_desbalanceamento6 !!},
      "desgasteFolga": {!! $ura_desgasteFolga6 !!},
      "engrenamento": {!! $ura_engrenamento6 !!},
      "cavitacao": {!! $ura_cavitacao6 !!},
      "falhaEletrica": {!! $ura_falhaEletrica6 !!},

      },{
      "mes": {!! json_encode($atualf5) !!},
      "desalinhamento": {!! $ura_desalinhamento5 !!},
      "lubrificacao": {!! $ura_lubrificacao5 !!},
      "rolamento": {!! $ura_rolamento5 !!},
      "desbalanceamento": {!! $ura_desbalanceamento5 !!},
      "desgasteFolga": {!! $ura_desgasteFolga5 !!},
      "engrenamento": {!! $ura_engrenamento5 !!},
      "cavitacao": {!! $ura_cavitacao5 !!},
      "falhaEletrica": {!! $ura_falhaEletrica5 !!},

      },{
      "mes": {!! json_encode($atualf4) !!},
      "desalinhamento": {!! $ura_desalinhamento4 !!},
      "lubrificacao": {!! $ura_lubrificacao4 !!},
      "rolamento": {!! $ura_rolamento4 !!},
      "desbalanceamento": {!! $ura_desbalanceamento4 !!},
      "desgasteFolga": {!! $ura_desgasteFolga4 !!},
      "engrenamento": {!! $ura_engrenamento4 !!},
      "cavitacao": {!! $ura_cavitacao4 !!},
      "falhaEletrica": {!! $ura_falhaEletrica4 !!},

      },{
      "mes": {!! json_encode($atualf3) !!},
      "desalinhamento": {!! $ura_desalinhamento3 !!},
      "lubrificacao": {!! $ura_lubrificacao3 !!},
      "rolamento": {!! $ura_rolamento3 !!},
      "desbalanceamento": {!! $ura_desbalanceamento3 !!},
      "desgasteFolga": {!! $ura_desgasteFolga3 !!},
      "engrenamento": {!! $ura_engrenamento3 !!},
      "cavitacao": {!! $ura_cavitacao3 !!},
      "falhaEletrica": {!! $ura_falhaEletrica3 !!},

      },{
      "mes": {!! json_encode($atualf2) !!},
      "desalinhamento": {!! $ura_desalinhamento2 !!},
      "lubrificacao": {!! $ura_lubrificacao2 !!},
      "rolamento": {!! $ura_rolamento2 !!},
      "desbalanceamento": {!! $ura_desbalanceamento2 !!},
      "desgasteFolga": {!! $ura_desgasteFolga2 !!},
      "engrenamento": {!! $ura_engrenamento2 !!},
      "cavitacao": {!! $ura_cavitacao2 !!},
      "falhaEletrica": {!! $ura_falhaEletrica2 !!},

      },{
      "mes": {!! json_encode($atualf1) !!},
      "desalinhamento": {!! $ura_desalinhamento1 !!},
      "lubrificacao": {!! $ura_lubrificacao1 !!},
      "rolamento": {!! $ura_rolamento1 !!},
      "desbalanceamento": {!! $ura_desbalanceamento1 !!},
      "desgasteFolga": {!! $ura_desgasteFolga1 !!},
      "engrenamento": {!! $ura_engrenamento1 !!},
      "cavitacao": {!! $ura_cavitacao1  !!},
      "falhaEletrica": {!! $ura_falhaEletrica1 !!},
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

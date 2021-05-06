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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Linha de Decapagem Semicontínua</h4></strong>
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
      "desalinhamento": {!! $lds_desalinhamento12 !!},
      "lubrificacao": {!! $lds_lubrificacao12 !!},
      "rolamento": {!! $lds_rolamento12 !!},
      "desbalanceamento": {!! $lds_desbalanceamento12 !!},
      "desgasteFolga": {!! $lds_desgasteFolga12 !!},
      "engrenamento": {!! $lds_engrenamento12 !!},
      "cavitacao": {!! $lds_cavitacao12 !!},
      "falhaEletrica": {!! $lds_falhaEletrica12 !!},

      },{
      "mes": {!! json_encode($atualf11) !!},
      "desalinhamento": {!! $lds_desalinhamento11 !!},
      "lubrificacao": {!! $lds_lubrificacao11 !!},
      "rolamento": {!! $lds_rolamento11 !!},
      "desbalanceamento": {!! $lds_desbalanceamento11 !!},
      "desgasteFolga": {!! $lds_desgasteFolga11 !!},
      "engrenamento": {!! $lds_engrenamento11 !!},
      "cavitacao": {!! $lds_cavitacao11 !!},
      "falhaEletrica": {!! $lds_falhaEletrica11 !!},

      },{
      "mes": {!! json_encode($atualf10) !!},
      "desalinhamento": {!! $lds_desalinhamento10 !!},
      "lubrificacao": {!! $lds_lubrificacao10 !!},
      "rolamento": {!! $lds_rolamento10 !!},
      "desbalanceamento": {!! $lds_desbalanceamento10 !!},
      "desgasteFolga": {!! $lds_desgasteFolga10 !!},
      "engrenamento": {!! $lds_engrenamento10 !!},
      "cavitacao": {!! $lds_cavitacao10 !!},
      "falhaEletrica": {!! $lds_falhaEletrica10 !!},

      },{
      "mes": {!! json_encode($atualf9) !!},
      "desalinhamento": {!! $lds_desalinhamento9 !!},
      "lubrificacao": {!! $lds_lubrificacao9 !!},
      "rolamento": {!! $lds_rolamento9 !!},
      "desbalanceamento": {!! $lds_desbalanceamento9 !!},
      "desgasteFolga": {!! $lds_desgasteFolga9 !!},
      "engrenamento": {!! $lds_engrenamento9 !!},
      "cavitacao": {!! $lds_cavitacao9 !!},
      "falhaEletrica": {!! $lds_falhaEletrica9 !!},

      },{
      "mes": {!! json_encode($atualf8) !!},
      "desalinhamento": {!! $lds_desalinhamento8 !!},
      "lubrificacao": {!! $lds_lubrificacao8 !!},
      "rolamento": {!! $lds_rolamento8 !!},
      "desbalanceamento": {!! $lds_desbalanceamento8 !!},
      "desgasteFolga": {!! $lds_desgasteFolga8 !!},
      "engrenamento": {!! $lds_engrenamento8 !!},
      "cavitacao": {!! $lds_cavitacao8 !!},
      "falhaEletrica": {!! $lds_falhaEletrica8 !!},

      },{
      "mes": {!! json_encode($atualf7) !!},
      "desalinhamento": {!! $lds_desalinhamento7 !!},
      "lubrificacao": {!! $lds_lubrificacao7 !!},
      "rolamento": {!! $lds_rolamento7 !!},
      "desbalanceamento": {!! $lds_desbalanceamento7 !!},
      "desgasteFolga": {!! $lds_desgasteFolga7 !!},
      "engrenamento": {!! $lds_engrenamento7 !!},
      "cavitacao": {!! $lds_cavitacao7 !!},
      "falhaEletrica": {!! $lds_falhaEletrica7 !!},

      },{
      "mes": {!! json_encode($atualf6) !!},
      "desalinhamento": {!! $lds_desalinhamento6 !!},
      "lubrificacao": {!! $lds_lubrificacao6 !!},
      "rolamento": {!! $lds_rolamento6 !!},
      "desbalanceamento": {!! $lds_desbalanceamento6 !!},
      "desgasteFolga": {!! $lds_desgasteFolga6 !!},
      "engrenamento": {!! $lds_engrenamento6 !!},
      "cavitacao": {!! $lds_cavitacao6 !!},
      "falhaEletrica": {!! $lds_falhaEletrica6 !!},

      },{
      "mes": {!! json_encode($atualf5) !!},
      "desalinhamento": {!! $lds_desalinhamento5 !!},
      "lubrificacao": {!! $lds_lubrificacao5 !!},
      "rolamento": {!! $lds_rolamento5 !!},
      "desbalanceamento": {!! $lds_desbalanceamento5 !!},
      "desgasteFolga": {!! $lds_desgasteFolga5 !!},
      "engrenamento": {!! $lds_engrenamento5 !!},
      "cavitacao": {!! $lds_cavitacao5 !!},
      "falhaEletrica": {!! $lds_falhaEletrica5 !!},

      },{
      "mes": {!! json_encode($atualf4) !!},
      "desalinhamento": {!! $lds_desalinhamento4 !!},
      "lubrificacao": {!! $lds_lubrificacao4 !!},
      "rolamento": {!! $lds_rolamento4 !!},
      "desbalanceamento": {!! $lds_desbalanceamento4 !!},
      "desgasteFolga": {!! $lds_desgasteFolga4 !!},
      "engrenamento": {!! $lds_engrenamento4 !!},
      "cavitacao": {!! $lds_cavitacao4 !!},
      "falhaEletrica": {!! $lds_falhaEletrica4 !!},

      },{
      "mes": {!! json_encode($atualf3) !!},
      "desalinhamento": {!! $lds_desalinhamento3 !!},
      "lubrificacao": {!! $lds_lubrificacao3 !!},
      "rolamento": {!! $lds_rolamento3 !!},
      "desbalanceamento": {!! $lds_desbalanceamento3 !!},
      "desgasteFolga": {!! $lds_desgasteFolga3 !!},
      "engrenamento": {!! $lds_engrenamento3 !!},
      "cavitacao": {!! $lds_cavitacao3 !!},
      "falhaEletrica": {!! $lds_falhaEletrica3 !!},

      },{
      "mes": {!! json_encode($atualf2) !!},
      "desalinhamento": {!! $lds_desalinhamento2 !!},
      "lubrificacao": {!! $lds_lubrificacao2 !!},
      "rolamento": {!! $lds_rolamento2 !!},
      "desbalanceamento": {!! $lds_desbalanceamento2 !!},
      "desgasteFolga": {!! $lds_desgasteFolga2 !!},
      "engrenamento": {!! $lds_engrenamento2 !!},
      "cavitacao": {!! $lds_cavitacao2 !!},
      "falhaEletrica": {!! $lds_falhaEletrica2 !!},

      },{
      "mes": {!! json_encode($atualf1) !!},
      "desalinhamento": {!! $lds_desalinhamento1 !!},
      "lubrificacao": {!! $lds_lubrificacao1 !!},
      "rolamento": {!! $lds_rolamento1 !!},
      "desbalanceamento": {!! $lds_desbalanceamento1 !!},
      "desgasteFolga": {!! $lds_desgasteFolga1 !!},
      "engrenamento": {!! $lds_engrenamento1 !!},
      "cavitacao": {!! $lds_cavitacao1  !!},
      "falhaEletrica": {!! $lds_falhaEletrica1 !!},
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

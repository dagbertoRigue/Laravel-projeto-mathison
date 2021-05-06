@extends('csn.templates.templateRelatorios')

@section('content')
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerVB')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-Vibracao')
    <div id="page-content-wrapper-side">
      <div class="container-fluid">

  <!-- - - - - - - - - - - - GRÁFICO GGOP PR PROBLEMAS ENCONTRADOS - - - - - - - - - - - -->
      <div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
        <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-heading">
                  <strong><h4 style="color:#555; margin: 0 0 0px;">GGOP-PR</h4></strong>
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
      "desalinhamento": {!! $desalinhamento12 !!},
      "lubrificacao": {!! $lubrificacao12 !!},
      "rolamento": {!! $rolamento12 !!},
      "desbalanceamento": {!! $desbalanceamento12 !!},
      "desgasteFolga": {!! $desgasteFolga12 !!},
      "engrenamento": {!! $engrenamento12 !!},
      "cavitacao": {!! $cavitacao12 !!},
      "falhaEletrica": {!! $falhaEletrica12 !!},
      },{
      "mes": {!! json_encode($atualf11) !!},
      "desalinhamento": {!! $desalinhamento11 !!},
      "lubrificacao": {!! $lubrificacao11 !!},
      "rolamento": {!! $rolamento11 !!},
      "desbalanceamento": {!! $desbalanceamento11 !!},
      "desgasteFolga": {!! $desgasteFolga11 !!},
      "engrenamento": {!! $engrenamento11 !!},
      "cavitacao": {!! $cavitacao11 !!},
      "falhaEletrica": {!! $falhaEletrica11 !!},
      },{
      "mes": {!! json_encode($atualf10) !!},
      "desalinhamento": {!! $desalinhamento10 !!},
      "lubrificacao": {!! $lubrificacao10 !!},
      "rolamento": {!! $rolamento10 !!},
      "desbalanceamento": {!! $desbalanceamento10 !!},
      "desgasteFolga": {!! $desgasteFolga10 !!},
      "engrenamento": {!! $engrenamento10 !!},
      "cavitacao": {!! $cavitacao10 !!},
      "falhaEletrica": {!! $falhaEletrica10 !!},
      },{
      "mes": {!! json_encode($atualf9) !!},
      "desalinhamento": {!! $desalinhamento9 !!},
      "lubrificacao": {!! $lubrificacao9 !!},
      "rolamento": {!! $rolamento9 !!},
      "desbalanceamento": {!! $desbalanceamento9 !!},
      "desgasteFolga": {!! $desgasteFolga9 !!},
      "engrenamento": {!! $engrenamento9 !!},
      "cavitacao": {!! $cavitacao9 !!},
      "falhaEletrica": {!! $falhaEletrica9 !!},
      },{
      "mes": {!! json_encode($atualf8) !!},
      "desalinhamento": {!! $desalinhamento8 !!},
      "lubrificacao": {!! $lubrificacao8 !!},
      "rolamento": {!! $rolamento8 !!},
      "desbalanceamento": {!! $desbalanceamento8 !!},
      "desgasteFolga": {!! $desgasteFolga8 !!},
      "engrenamento": {!! $engrenamento8 !!},
      "cavitacao": {!! $cavitacao8 !!},
      "falhaEletrica": {!! $falhaEletrica8 !!},
      },{
      "mes": {!! json_encode($atualf7) !!},
      "desalinhamento": {!! $desalinhamento7 !!},
      "lubrificacao": {!! $lubrificacao7 !!},
      "rolamento": {!! $rolamento7 !!},
      "desbalanceamento": {!! $desbalanceamento7 !!},
      "desgasteFolga": {!! $desgasteFolga7 !!},
      "engrenamento": {!! $engrenamento7 !!},
      "cavitacao": {!! $cavitacao7 !!},
      "falhaEletrica": {!! $falhaEletrica7 !!},
      },{
      "mes": {!! json_encode($atualf6) !!},
      "desalinhamento": {!! $desalinhamento6 !!},
      "lubrificacao": {!! $lubrificacao6 !!},
      "rolamento": {!! $rolamento6 !!},
      "desbalanceamento": {!! $desbalanceamento6 !!},
      "desgasteFolga": {!! $desgasteFolga6 !!},
      "engrenamento": {!! $engrenamento6 !!},
      "cavitacao": {!! $cavitacao6 !!},
      "falhaEletrica": {!! $falhaEletrica6 !!},
      },{
      "mes": {!! json_encode($atualf5) !!},
      "desalinhamento": {!! $desalinhamento5 !!},
      "lubrificacao": {!! $lubrificacao5 !!},
      "rolamento": {!! $rolamento5 !!},
      "desbalanceamento": {!! $desbalanceamento5 !!},
      "desgasteFolga": {!! $desgasteFolga5 !!},
      "engrenamento": {!! $engrenamento5 !!},
      "cavitacao": {!! $cavitacao5 !!},
      "falhaEletrica": {!! $falhaEletrica5 !!},
      },{
      "mes": {!! json_encode($atualf4) !!},
      "desalinhamento": {!! $desalinhamento4 !!},
      "lubrificacao": {!! $lubrificacao4 !!},
      "rolamento": {!! $rolamento4 !!},
      "desbalanceamento": {!! $desbalanceamento4 !!},
      "desgasteFolga": {!! $desgasteFolga4 !!},
      "engrenamento": {!! $engrenamento4 !!},
      "cavitacao": {!! $cavitacao4 !!},
      "falhaEletrica": {!! $falhaEletrica4 !!},
      },{
      "mes": {!! json_encode($atualf3) !!},
      "desalinhamento": {!! $desalinhamento3 !!},
      "lubrificacao": {!! $lubrificacao3 !!},
      "rolamento": {!! $rolamento3 !!},
      "desbalanceamento": {!! $desbalanceamento3 !!},
      "desgasteFolga": {!! $desgasteFolga3 !!},
      "engrenamento": {!! $engrenamento3 !!},
      "cavitacao": {!! $cavitacao3 !!},
      "falhaEletrica": {!! $falhaEletrica3 !!},
      },{
      "mes": {!! json_encode($atualf2) !!},
      "desalinhamento": {!! $desalinhamento2 !!},
      "lubrificacao": {!! $lubrificacao2 !!},
      "rolamento": {!! $rolamento2 !!},
      "desbalanceamento": {!! $desbalanceamento2 !!},
      "desgasteFolga": {!! $desgasteFolga2 !!},
      "engrenamento": {!! $engrenamento2 !!},
      "cavitacao": {!! $cavitacao2 !!},
      "falhaEletrica": {!! $falhaEletrica2 !!},
      },{
      "mes": {!! json_encode($atualf1) !!},
      "desalinhamento": {!! $desalinhamento1 !!},
      "lubrificacao": {!! $lubrificacao1 !!},
      "rolamento": {!! $rolamento1 !!},
      "desbalanceamento": {!! $desbalanceamento1 !!},
      "desgasteFolga": {!! $desgasteFolga1 !!},
      "engrenamento": {!! $engrenamento1 !!},
      "cavitacao": {!! $cavitacao1  !!},
      "falhaEletrica": {!! $falhaEletrica1 !!},
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

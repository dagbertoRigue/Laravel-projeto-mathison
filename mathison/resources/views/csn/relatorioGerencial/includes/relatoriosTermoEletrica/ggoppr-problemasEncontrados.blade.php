@extends('csn.templates.templateRelatorios')

@section('content')
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerTE')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-TermoEletrica')
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
                    <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Análise de Termografia Elétrica</strong>
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
     "faltaAperto": {!! $faltaAperto12 !!},
     "desbalDeFase": {!! $desbalDeFase12 !!},
     "compMalDimensionado": {!! $compMalDim12 !!},
     "caboRessecado": {!! $caboRessecado12 !!},
     "defeitoComp": {!! $defeitoComp12 !!},
     "conexaoTerminal": {!! $conexaoTerm12 !!},
 },{
     "mes": {!! json_encode($atualf11) !!},
     "faltaAperto": {!! $faltaAperto11 !!},
     "desbalDeFase": {!! $desbalDeFase11 !!},
     "compMalDimensionado": {!! $compMalDim11 !!},
     "caboRessecado": {!! $caboRessecado11 !!},
     "defeitoComp": {!! $defeitoComp11 !!},
     "conexaoTerminal": {!! $conexaoTerm11 !!},
 },{
     "mes": {!! json_encode($atualf10) !!},
     "faltaAperto": {!! $faltaAperto10 !!},
     "desbalDeFase": {!! $desbalDeFase10 !!},
     "compMalDimensionado": {!! $compMalDim10 !!},
     "caboRessecado": {!! $caboRessecado10 !!},
     "defeitoComp": {!! $defeitoComp10 !!},
     "conexaoTerminal": {!! $conexaoTerm10 !!},
 },{
     "mes": {!! json_encode($atualf9) !!},
     "faltaAperto": {!! $faltaAperto9 !!},
     "desbalDeFase": {!! $desbalDeFase9 !!},
     "compMalDimensionado": {!! $compMalDim9 !!},
     "caboRessecado": {!! $caboRessecado9 !!},
     "defeitoComp": {!! $defeitoComp9 !!},
     "conexaoTerminal": {!! $conexaoTerm9 !!},
 },{
     "mes": {!! json_encode($atualf8) !!},
     "faltaAperto": {!! $faltaAperto8 !!},
     "desbalDeFase": {!! $desbalDeFase8 !!},
     "compMalDimensionado": {!! $compMalDim8 !!},
     "caboRessecado": {!! $caboRessecado8 !!},
     "defeitoComp": {!! $defeitoComp8 !!},
     "conexaoTerminal": {!! $conexaoTerm8 !!},
 },{
     "mes": {!! json_encode($atualf7) !!},
     "faltaAperto": {!! $faltaAperto7 !!},
     "desbalDeFase": {!! $desbalDeFase7 !!},
     "compMalDimensionado": {!! $compMalDim7 !!},
     "caboRessecado": {!! $caboRessecado7 !!},
     "defeitoComp": {!! $defeitoComp7 !!},
     "conexaoTerminal": {!! $conexaoTerm7 !!},
 },{
     "mes": {!! json_encode($atualf6) !!},
     "faltaAperto": {!! $faltaAperto6 !!},
     "desbalDeFase": {!! $desbalDeFase6 !!},
     "compMalDimensionado": {!! $compMalDim6 !!},
     "caboRessecado": {!! $caboRessecado6 !!},
     "defeitoComp": {!! $defeitoComp6 !!},
     "conexaoTerminal": {!! $conexaoTerm6 !!},
 },{
     "mes": {!! json_encode($atualf5) !!},
     "faltaAperto": {!! $faltaAperto5 !!},
     "desbalDeFase": {!! $desbalDeFase5 !!},
     "compMalDimensionado": {!! $compMalDim5 !!},
     "caboRessecado": {!! $caboRessecado5 !!},
     "defeitoComp": {!! $defeitoComp5 !!},
     "conexaoTerminal": {!! $conexaoTerm5 !!},
 },{
     "mes": {!! json_encode($atualf4) !!},
     "faltaAperto": {!! $faltaAperto4 !!},
     "desbalDeFase": {!! $desbalDeFase4 !!},
     "compMalDimensionado": {!! $compMalDim4 !!},
     "caboRessecado": {!! $caboRessecado4 !!},
     "defeitoComp": {!! $defeitoComp4 !!},
     "conexaoTerminal": {!! $conexaoTerm4 !!},
 },{
     "mes": {!! json_encode($atualf3) !!},
     "faltaAperto": {!! $faltaAperto3 !!},
     "desbalDeFase": {!! $desbalDeFase3 !!},
     "compMalDimensionado": {!! $compMalDim3 !!},
     "caboRessecado": {!! $caboRessecado3 !!},
     "defeitoComp": {!! $defeitoComp3 !!},
     "conexaoTerminal": {!! $conexaoTerm3 !!},
 },{
     "mes": {!! json_encode($atualf2) !!},
     "faltaAperto": {!! $faltaAperto2 !!},
     "desbalDeFase": {!! $desbalDeFase2 !!},
     "compMalDimensionado": {!! $compMalDim2 !!},
     "caboRessecado": {!! $caboRessecado2 !!},
     "defeitoComp": {!! $defeitoComp2 !!},
     "conexaoTerminal": {!! $conexaoTerm2 !!},
 },{
     "mes": {!! json_encode($atualf1) !!},
     "faltaAperto": {!! $faltaAperto1 !!},
     "desbalDeFase": {!! $desbalDeFase1 !!},
     "compMalDimensionado": {!! $compMalDim1 !!},
     "caboRessecado": {!! $caboRessecado1 !!},
     "defeitoComp": {!! $defeitoComp1 !!},
     "conexaoTerminal": {!! $conexaoTerm1 !!},
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
       "title": "Falta de Aperto",
       "type": "column",
		    "color": "#000000",
       "lineColor": "#859e3d",
       "valueField": "faltaAperto"
   }, {
       "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
       "fillAlphas": 0.8,
       "labelText": "[[value]]",
       "lineAlpha": 0.3,
       "title": "Desbalanceamento de Fase",
       "type": "column",
		    "color": "#000000",
       "lineColor": "#555555",
       "valueField": "desbalDeFase"
   }, {
       "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
       "fillAlphas": 0.8,
       "labelText": "[[value]]",
       "lineAlpha": 0.3,
       "title": "Componente Mal Dimensionado",
       "type": "column",
		    "color": "#000000",
       "lineColor": "#5a3d9e",
       "valueField": "compMalDim"
   }, {
       "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
       "fillAlphas": 0.8,
       "labelText": "[[value]]",
       "lineAlpha": 0.3,
       "title": "Cabo Ressecado",
       "type": "column",
		    "color": "#000000",
       "lineColor": "#3d9e8e",
       "valueField": "caboRessecado"
   }, {
       "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
       "fillAlphas": 0.8,
       "labelText": "[[value]]",
       "lineAlpha": 0.3,
       "title": "Defeito no Componente",
       "type": "column",
		    "color": "#000000",
       "lineColor": "#3d729e",
       "valueField": "defeitoComp"
   }, {
       "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
       "fillAlphas": 0.8,
       "labelText": "[[value]]",
       "lineAlpha": 0.3,
       "title": "Conexão/Terminal",
       "type": "column",
		    "color": "#000000",
       "lineColor": "#9e823d",
       "valueField": "conexaoTerm"
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

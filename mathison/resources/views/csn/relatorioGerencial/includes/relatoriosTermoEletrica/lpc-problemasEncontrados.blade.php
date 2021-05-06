@extends('csn.templates.templateRelatorios')

@section('content')
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerTE')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-TermoEletrica')
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
      "faltaAperto": {!! $lpc_faltaAperto12 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase12 !!},
      "compMalDimensionado": {!! $lpc_compMalDim12 !!},
      "caboRessecado": {!! $lpc_caboRessecado12 !!},
      "defeitoComp": {!! $lpc_defeitoComp12 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm12 !!},
  },{
      "mes": {!! json_encode($atualf11) !!},
      "faltaAperto": {!! $lpc_faltaAperto11 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase11 !!},
      "compMalDimensionado": {!! $lpc_compMalDim11 !!},
      "caboRessecado": {!! $lpc_caboRessecado11 !!},
      "defeitoComp": {!! $lpc_defeitoComp11 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm11 !!},
  },{
      "mes": {!! json_encode($atualf10) !!},
      "faltaAperto": {!! $lpc_faltaAperto10 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase10 !!},
      "compMalDimensionado": {!! $lpc_compMalDim10 !!},
      "caboRessecado": {!! $lpc_caboRessecado10 !!},
      "defeitoComp": {!! $lpc_defeitoComp10 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm10 !!},
  },{
      "mes": {!! json_encode($atualf9) !!},
      "faltaAperto": {!! $lpc_faltaAperto9 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase9 !!},
      "compMalDimensionado": {!! $lpc_compMalDim9 !!},
      "caboRessecado": {!! $lpc_caboRessecado9 !!},
      "defeitoComp": {!! $lpc_defeitoComp9 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm9 !!},
  },{
      "mes": {!! json_encode($atualf8) !!},
      "faltaAperto": {!! $lpc_faltaAperto8 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase8 !!},
      "compMalDimensionado": {!! $lpc_compMalDim8 !!},
      "caboRessecado": {!! $lpc_caboRessecado8 !!},
      "defeitoComp": {!! $lpc_defeitoComp8 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm8 !!},
  },{
      "mes": {!! json_encode($atualf7) !!},
      "faltaAperto": {!! $lpc_faltaAperto7 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase7 !!},
      "compMalDimensionado": {!! $lpc_compMalDim7 !!},
      "caboRessecado": {!! $lpc_caboRessecado7 !!},
      "defeitoComp": {!! $lpc_defeitoComp7 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm7 !!},
  },{
      "mes": {!! json_encode($atualf6) !!},
      "faltaAperto": {!! $lpc_faltaAperto6 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase6 !!},
      "compMalDimensionado": {!! $lpc_compMalDim6 !!},
      "caboRessecado": {!! $lpc_caboRessecado6 !!},
      "defeitoComp": {!! $lpc_defeitoComp6 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm6 !!},
  },{
      "mes": {!! json_encode($atualf5) !!},
      "faltaAperto": {!! $lpc_faltaAperto5 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase5 !!},
      "compMalDimensionado": {!! $lpc_compMalDim5 !!},
      "caboRessecado": {!! $lpc_caboRessecado5 !!},
      "defeitoComp": {!! $lpc_defeitoComp5 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm5 !!},
  },{
      "mes": {!! json_encode($atualf4) !!},
      "faltaAperto": {!! $lpc_faltaAperto4 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase4 !!},
      "compMalDimensionado": {!! $lpc_compMalDim4 !!},
      "caboRessecado": {!! $lpc_caboRessecado4 !!},
      "defeitoComp": {!! $lpc_defeitoComp4 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm4 !!},
  },{
      "mes": {!! json_encode($atualf3) !!},
      "faltaAperto": {!! $lpc_faltaAperto3 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase3 !!},
      "compMalDimensionado": {!! $lpc_compMalDim3 !!},
      "caboRessecado": {!! $lpc_caboRessecado3 !!},
      "defeitoComp": {!! $lpc_defeitoComp3 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm3 !!},
  },{
      "mes": {!! json_encode($atualf2) !!},
      "faltaAperto": {!! $lpc_faltaAperto2 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase2 !!},
      "compMalDimensionado": {!! $lpc_compMalDim2 !!},
      "caboRessecado": {!! $lpc_caboRessecado2 !!},
      "defeitoComp": {!! $lpc_defeitoComp2 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm2 !!},
  },{
      "mes": {!! json_encode($atualf1) !!},
      "faltaAperto": {!! $lpc_faltaAperto1 !!},
      "desbalDeFase": {!! $lpc_desbalDeFase1 !!},
      "compMalDimensionado": {!! $lpc_compMalDim1 !!},
      "caboRessecado": {!! $lpc_caboRessecado1 !!},
      "defeitoComp": {!! $lpc_defeitoComp1 !!},
      "conexaoTerminal": {!! $lpc_conexaoTerm1 !!},
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

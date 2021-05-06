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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Linha de Galvanização Contínua</h4></strong>
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
      "faltaAperto": {!! $lgc_faltaAperto12 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase12 !!},
      "compMalDimensionado": {!! $lgc_compMalDim12 !!},
      "caboRessecado": {!! $lgc_caboRessecado12 !!},
      "defeitoComp": {!! $lgc_defeitoComp12 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm12 !!},
  },{
      "mes": {!! json_encode($atualf11) !!},
      "faltaAperto": {!! $lgc_faltaAperto11 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase11 !!},
      "compMalDimensionado": {!! $lgc_compMalDim11 !!},
      "caboRessecado": {!! $lgc_caboRessecado11 !!},
      "defeitoComp": {!! $lgc_defeitoComp11 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm11 !!},
  },{
      "mes": {!! json_encode($atualf10) !!},
      "faltaAperto": {!! $lgc_faltaAperto10 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase10 !!},
      "compMalDimensionado": {!! $lgc_compMalDim10 !!},
      "caboRessecado": {!! $lgc_caboRessecado10 !!},
      "defeitoComp": {!! $lgc_defeitoComp10 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm10 !!},
  },{
      "mes": {!! json_encode($atualf9) !!},
      "faltaAperto": {!! $lgc_faltaAperto9 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase9 !!},
      "compMalDimensionado": {!! $lgc_compMalDim9 !!},
      "caboRessecado": {!! $lgc_caboRessecado9 !!},
      "defeitoComp": {!! $lgc_defeitoComp9 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm9 !!},
  },{
      "mes": {!! json_encode($atualf8) !!},
      "faltaAperto": {!! $lgc_faltaAperto8 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase8 !!},
      "compMalDimensionado": {!! $lgc_compMalDim8 !!},
      "caboRessecado": {!! $lgc_caboRessecado8 !!},
      "defeitoComp": {!! $lgc_defeitoComp8 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm8 !!},
  },{
      "mes": {!! json_encode($atualf7) !!},
      "faltaAperto": {!! $lgc_faltaAperto7 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase7 !!},
      "compMalDimensionado": {!! $lgc_compMalDim7 !!},
      "caboRessecado": {!! $lgc_caboRessecado7 !!},
      "defeitoComp": {!! $lgc_defeitoComp7 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm7 !!},
  },{
      "mes": {!! json_encode($atualf6) !!},
      "faltaAperto": {!! $lgc_faltaAperto6 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase6 !!},
      "compMalDimensionado": {!! $lgc_compMalDim6 !!},
      "caboRessecado": {!! $lgc_caboRessecado6 !!},
      "defeitoComp": {!! $lgc_defeitoComp6 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm6 !!},
  },{
      "mes": {!! json_encode($atualf5) !!},
      "faltaAperto": {!! $lgc_faltaAperto5 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase5 !!},
      "compMalDimensionado": {!! $lgc_compMalDim5 !!},
      "caboRessecado": {!! $lgc_caboRessecado5 !!},
      "defeitoComp": {!! $lgc_defeitoComp5 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm5 !!},
  },{
      "mes": {!! json_encode($atualf4) !!},
      "faltaAperto": {!! $lgc_faltaAperto4 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase4 !!},
      "compMalDimensionado": {!! $lgc_compMalDim4 !!},
      "caboRessecado": {!! $lgc_caboRessecado4 !!},
      "defeitoComp": {!! $lgc_defeitoComp4 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm4 !!},
  },{
      "mes": {!! json_encode($atualf3) !!},
      "faltaAperto": {!! $lgc_faltaAperto3 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase3 !!},
      "compMalDimensionado": {!! $lgc_compMalDim3 !!},
      "caboRessecado": {!! $lgc_caboRessecado3 !!},
      "defeitoComp": {!! $lgc_defeitoComp3 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm3 !!},
  },{
      "mes": {!! json_encode($atualf2) !!},
      "faltaAperto": {!! $lgc_faltaAperto2 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase2 !!},
      "compMalDimensionado": {!! $lgc_compMalDim2 !!},
      "caboRessecado": {!! $lgc_caboRessecado2 !!},
      "defeitoComp": {!! $lgc_defeitoComp2 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm2 !!},
  },{
      "mes": {!! json_encode($atualf1) !!},
      "faltaAperto": {!! $lgc_faltaAperto1 !!},
      "desbalDeFase": {!! $lgc_desbalDeFase1 !!},
      "compMalDimensionado": {!! $lgc_compMalDim1 !!},
      "caboRessecado": {!! $lgc_caboRessecado1 !!},
      "defeitoComp": {!! $lgc_defeitoComp1 !!},
      "conexaoTerminal": {!! $lgc_conexaoTerm1 !!},
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

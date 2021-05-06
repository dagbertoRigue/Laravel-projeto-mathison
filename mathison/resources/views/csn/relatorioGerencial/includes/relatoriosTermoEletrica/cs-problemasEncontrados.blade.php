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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Centro de Serviços</h4></strong>
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
      "faltaAperto": {!! $cs_faltaAperto12 !!},
      "desbalDeFase": {!! $cs_desbalDeFase12 !!},
      "compMalDimensionado": {!! $cs_compMalDim12 !!},
      "caboRessecado": {!! $cs_caboRessecado12 !!},
      "defeitoComp": {!! $cs_defeitoComp12 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm12 !!},
  },{
      "mes": {!! json_encode($atualf11) !!},
      "faltaAperto": {!! $cs_faltaAperto11 !!},
      "desbalDeFase": {!! $cs_desbalDeFase11 !!},
      "compMalDimensionado": {!! $cs_compMalDim11 !!},
      "caboRessecado": {!! $cs_caboRessecado11 !!},
      "defeitoComp": {!! $cs_defeitoComp11 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm11 !!},
  },{
      "mes": {!! json_encode($atualf10) !!},
      "faltaAperto": {!! $cs_faltaAperto10 !!},
      "desbalDeFase": {!! $cs_desbalDeFase10 !!},
      "compMalDimensionado": {!! $cs_compMalDim10 !!},
      "caboRessecado": {!! $cs_caboRessecado10 !!},
      "defeitoComp": {!! $cs_defeitoComp10 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm10 !!},
  },{
      "mes": {!! json_encode($atualf9) !!},
      "faltaAperto": {!! $cs_faltaAperto9 !!},
      "desbalDeFase": {!! $cs_desbalDeFase9 !!},
      "compMalDimensionado": {!! $cs_compMalDim9 !!},
      "caboRessecado": {!! $cs_caboRessecado9 !!},
      "defeitoComp": {!! $cs_defeitoComp9 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm9 !!},
  },{
      "mes": {!! json_encode($atualf8) !!},
      "faltaAperto": {!! $cs_faltaAperto8 !!},
      "desbalDeFase": {!! $cs_desbalDeFase8 !!},
      "compMalDimensionado": {!! $cs_compMalDim8 !!},
      "caboRessecado": {!! $cs_caboRessecado8 !!},
      "defeitoComp": {!! $cs_defeitoComp8 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm8 !!},
  },{
      "mes": {!! json_encode($atualf7) !!},
      "faltaAperto": {!! $cs_faltaAperto7 !!},
      "desbalDeFase": {!! $cs_desbalDeFase7 !!},
      "compMalDimensionado": {!! $cs_compMalDim7 !!},
      "caboRessecado": {!! $cs_caboRessecado7 !!},
      "defeitoComp": {!! $cs_defeitoComp7 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm7 !!},
  },{
      "mes": {!! json_encode($atualf6) !!},
      "faltaAperto": {!! $cs_faltaAperto6 !!},
      "desbalDeFase": {!! $cs_desbalDeFase6 !!},
      "compMalDimensionado": {!! $cs_compMalDim6 !!},
      "caboRessecado": {!! $cs_caboRessecado6 !!},
      "defeitoComp": {!! $cs_defeitoComp6 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm6 !!},
  },{
      "mes": {!! json_encode($atualf5) !!},
      "faltaAperto": {!! $cs_faltaAperto5 !!},
      "desbalDeFase": {!! $cs_desbalDeFase5 !!},
      "compMalDimensionado": {!! $cs_compMalDim5 !!},
      "caboRessecado": {!! $cs_caboRessecado5 !!},
      "defeitoComp": {!! $cs_defeitoComp5 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm5 !!},
  },{
      "mes": {!! json_encode($atualf4) !!},
      "faltaAperto": {!! $cs_faltaAperto4 !!},
      "desbalDeFase": {!! $cs_desbalDeFase4 !!},
      "compMalDimensionado": {!! $cs_compMalDim4 !!},
      "caboRessecado": {!! $cs_caboRessecado4 !!},
      "defeitoComp": {!! $cs_defeitoComp4 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm4 !!},
  },{
      "mes": {!! json_encode($atualf3) !!},
      "faltaAperto": {!! $cs_faltaAperto3 !!},
      "desbalDeFase": {!! $cs_desbalDeFase3 !!},
      "compMalDimensionado": {!! $cs_compMalDim3 !!},
      "caboRessecado": {!! $cs_caboRessecado3 !!},
      "defeitoComp": {!! $cs_defeitoComp3 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm3 !!},
  },{
      "mes": {!! json_encode($atualf2) !!},
      "faltaAperto": {!! $cs_faltaAperto2 !!},
      "desbalDeFase": {!! $cs_desbalDeFase2 !!},
      "compMalDimensionado": {!! $cs_compMalDim2 !!},
      "caboRessecado": {!! $cs_caboRessecado2 !!},
      "defeitoComp": {!! $cs_defeitoComp2 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm2 !!},
  },{
      "mes": {!! json_encode($atualf1) !!},
      "faltaAperto": {!! $cs_faltaAperto1 !!},
      "desbalDeFase": {!! $cs_desbalDeFase1 !!},
      "compMalDimensionado": {!! $cs_compMalDim1 !!},
      "caboRessecado": {!! $cs_caboRessecado1 !!},
      "defeitoComp": {!! $cs_defeitoComp1 !!},
      "conexaoTerminal": {!! $cs_conexaoTerm1 !!},
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

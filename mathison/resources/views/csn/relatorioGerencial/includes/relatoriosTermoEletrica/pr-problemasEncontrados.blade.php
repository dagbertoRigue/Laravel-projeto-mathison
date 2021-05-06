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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Pontes Rolantes</h4></strong>
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
      "faltaAperto": {!! $pr_faltaAperto12 !!},
      "desbalDeFase": {!! $pr_desbalDeFase12 !!},
      "compMalDimensionado": {!! $pr_compMalDim12 !!},
      "caboRessecado": {!! $pr_caboRessecado12 !!},
      "defeitoComp": {!! $pr_defeitoComp12 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm12 !!},
  },{
      "mes": {!! json_encode($atualf11) !!},
      "faltaAperto": {!! $pr_faltaAperto11 !!},
      "desbalDeFase": {!! $pr_desbalDeFase11 !!},
      "compMalDimensionado": {!! $pr_compMalDim11 !!},
      "caboRessecado": {!! $pr_caboRessecado11 !!},
      "defeitoComp": {!! $pr_defeitoComp11 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm11 !!},
  },{
      "mes": {!! json_encode($atualf10) !!},
      "faltaAperto": {!! $pr_faltaAperto10 !!},
      "desbalDeFase": {!! $pr_desbalDeFase10 !!},
      "compMalDimensionado": {!! $pr_compMalDim10 !!},
      "caboRessecado": {!! $pr_caboRessecado10 !!},
      "defeitoComp": {!! $pr_defeitoComp10 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm10 !!},
  },{
      "mes": {!! json_encode($atualf9) !!},
      "faltaAperto": {!! $pr_faltaAperto9 !!},
      "desbalDeFase": {!! $pr_desbalDeFase9 !!},
      "compMalDimensionado": {!! $pr_compMalDim9 !!},
      "caboRessecado": {!! $pr_caboRessecado9 !!},
      "defeitoComp": {!! $pr_defeitoComp9 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm9 !!},
  },{
      "mes": {!! json_encode($atualf8) !!},
      "faltaAperto": {!! $pr_faltaAperto8 !!},
      "desbalDeFase": {!! $pr_desbalDeFase8 !!},
      "compMalDimensionado": {!! $pr_compMalDim8 !!},
      "caboRessecado": {!! $pr_caboRessecado8 !!},
      "defeitoComp": {!! $pr_defeitoComp8 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm8 !!},
  },{
      "mes": {!! json_encode($atualf7) !!},
      "faltaAperto": {!! $pr_faltaAperto7 !!},
      "desbalDeFase": {!! $pr_desbalDeFase7 !!},
      "compMalDimensionado": {!! $pr_compMalDim7 !!},
      "caboRessecado": {!! $pr_caboRessecado7 !!},
      "defeitoComp": {!! $pr_defeitoComp7 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm7 !!},
  },{
      "mes": {!! json_encode($atualf6) !!},
      "faltaAperto": {!! $pr_faltaAperto6 !!},
      "desbalDeFase": {!! $pr_desbalDeFase6 !!},
      "compMalDimensionado": {!! $pr_compMalDim6 !!},
      "caboRessecado": {!! $pr_caboRessecado6 !!},
      "defeitoComp": {!! $pr_defeitoComp6 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm6 !!},
  },{
      "mes": {!! json_encode($atualf5) !!},
      "faltaAperto": {!! $pr_faltaAperto5 !!},
      "desbalDeFase": {!! $pr_desbalDeFase5 !!},
      "compMalDimensionado": {!! $pr_compMalDim5 !!},
      "caboRessecado": {!! $pr_caboRessecado5 !!},
      "defeitoComp": {!! $pr_defeitoComp5 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm5 !!},
  },{
      "mes": {!! json_encode($atualf4) !!},
      "faltaAperto": {!! $pr_faltaAperto4 !!},
      "desbalDeFase": {!! $pr_desbalDeFase4 !!},
      "compMalDimensionado": {!! $pr_compMalDim4 !!},
      "caboRessecado": {!! $pr_caboRessecado4 !!},
      "defeitoComp": {!! $pr_defeitoComp4 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm4 !!},
  },{
      "mes": {!! json_encode($atualf3) !!},
      "faltaAperto": {!! $pr_faltaAperto3 !!},
      "desbalDeFase": {!! $pr_desbalDeFase3 !!},
      "compMalDimensionado": {!! $pr_compMalDim3 !!},
      "caboRessecado": {!! $pr_caboRessecado3 !!},
      "defeitoComp": {!! $pr_defeitoComp3 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm3 !!},
  },{
      "mes": {!! json_encode($atualf2) !!},
      "faltaAperto": {!! $pr_faltaAperto2 !!},
      "desbalDeFase": {!! $pr_desbalDeFase2 !!},
      "compMalDimensionado": {!! $pr_compMalDim2 !!},
      "caboRessecado": {!! $pr_caboRessecado2 !!},
      "defeitoComp": {!! $pr_defeitoComp2 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm2 !!},
  },{
      "mes": {!! json_encode($atualf1) !!},
      "faltaAperto": {!! $pr_faltaAperto1 !!},
      "desbalDeFase": {!! $pr_desbalDeFase1 !!},
      "compMalDimensionado": {!! $pr_compMalDim1 !!},
      "caboRessecado": {!! $pr_caboRessecado1 !!},
      "defeitoComp": {!! $pr_defeitoComp1 !!},
      "conexaoTerminal": {!! $pr_conexaoTerm1 !!},
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

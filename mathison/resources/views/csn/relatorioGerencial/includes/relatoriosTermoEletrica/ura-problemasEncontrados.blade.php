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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Unidade de Regeneração de Ácido</h4></strong>
              </div>
              <div class="panel-body">
                <div class="row" style="margin-top: 0px;margin-bottom:0px;">
                  <div class="col-md-7">
                    <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Análise Termografia Elétrica</strong>
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
      "faltaAperto": {!! $ura_faltaAperto12 !!},
      "desbalDeFase": {!! $ura_desbalDeFase12 !!},
      "compMalDimensionado": {!! $ura_compMalDim12 !!},
      "caboRessecado": {!! $ura_caboRessecado12 !!},
      "defeitoComp": {!! $ura_defeitoComp12 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm12 !!},
  },{
      "mes": {!! json_encode($atualf11) !!},
      "faltaAperto": {!! $ura_faltaAperto11 !!},
      "desbalDeFase": {!! $ura_desbalDeFase11 !!},
      "compMalDimensionado": {!! $ura_compMalDim11 !!},
      "caboRessecado": {!! $ura_caboRessecado11 !!},
      "defeitoComp": {!! $ura_defeitoComp11 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm11 !!},
  },{
      "mes": {!! json_encode($atualf10) !!},
      "faltaAperto": {!! $ura_faltaAperto10 !!},
      "desbalDeFase": {!! $ura_desbalDeFase10 !!},
      "compMalDimensionado": {!! $ura_compMalDim10 !!},
      "caboRessecado": {!! $ura_caboRessecado10 !!},
      "defeitoComp": {!! $ura_defeitoComp10 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm10 !!},
  },{
      "mes": {!! json_encode($atualf9) !!},
      "faltaAperto": {!! $ura_faltaAperto9 !!},
      "desbalDeFase": {!! $ura_desbalDeFase9 !!},
      "compMalDimensionado": {!! $ura_compMalDim9 !!},
      "caboRessecado": {!! $ura_caboRessecado9 !!},
      "defeitoComp": {!! $ura_defeitoComp9 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm9 !!},
  },{
      "mes": {!! json_encode($atualf8) !!},
      "faltaAperto": {!! $ura_faltaAperto8 !!},
      "desbalDeFase": {!! $ura_desbalDeFase8 !!},
      "compMalDimensionado": {!! $ura_compMalDim8 !!},
      "caboRessecado": {!! $ura_caboRessecado8 !!},
      "defeitoComp": {!! $ura_defeitoComp8 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm8 !!},
  },{
      "mes": {!! json_encode($atualf7) !!},
      "faltaAperto": {!! $ura_faltaAperto7 !!},
      "desbalDeFase": {!! $ura_desbalDeFase7 !!},
      "compMalDimensionado": {!! $ura_compMalDim7 !!},
      "caboRessecado": {!! $ura_caboRessecado7 !!},
      "defeitoComp": {!! $ura_defeitoComp7 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm7 !!},
  },{
      "mes": {!! json_encode($atualf6) !!},
      "faltaAperto": {!! $ura_faltaAperto6 !!},
      "desbalDeFase": {!! $ura_desbalDeFase6 !!},
      "compMalDimensionado": {!! $ura_compMalDim6 !!},
      "caboRessecado": {!! $ura_caboRessecado6 !!},
      "defeitoComp": {!! $ura_defeitoComp6 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm6 !!},
  },{
      "mes": {!! json_encode($atualf5) !!},
      "faltaAperto": {!! $ura_faltaAperto5 !!},
      "desbalDeFase": {!! $ura_desbalDeFase5 !!},
      "compMalDimensionado": {!! $ura_compMalDim5 !!},
      "caboRessecado": {!! $ura_caboRessecado5 !!},
      "defeitoComp": {!! $ura_defeitoComp5 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm5 !!},
  },{
      "mes": {!! json_encode($atualf4) !!},
      "faltaAperto": {!! $ura_faltaAperto4 !!},
      "desbalDeFase": {!! $ura_desbalDeFase4 !!},
      "compMalDimensionado": {!! $ura_compMalDim4 !!},
      "caboRessecado": {!! $ura_caboRessecado4 !!},
      "defeitoComp": {!! $ura_defeitoComp4 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm4 !!},
  },{
      "mes": {!! json_encode($atualf3) !!},
      "faltaAperto": {!! $ura_faltaAperto3 !!},
      "desbalDeFase": {!! $ura_desbalDeFase3 !!},
      "compMalDimensionado": {!! $ura_compMalDim3 !!},
      "caboRessecado": {!! $ura_caboRessecado3 !!},
      "defeitoComp": {!! $ura_defeitoComp3 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm3 !!},
  },{
      "mes": {!! json_encode($atualf2) !!},
      "faltaAperto": {!! $ura_faltaAperto2 !!},
      "desbalDeFase": {!! $ura_desbalDeFase2 !!},
      "compMalDimensionado": {!! $ura_compMalDim2 !!},
      "caboRessecado": {!! $ura_caboRessecado2 !!},
      "defeitoComp": {!! $ura_defeitoComp2 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm2 !!},
  },{
      "mes": {!! json_encode($atualf1) !!},
      "faltaAperto": {!! $ura_faltaAperto1 !!},
      "desbalDeFase": {!! $ura_desbalDeFase1 !!},
      "compMalDimensionado": {!! $ura_compMalDim1 !!},
      "caboRessecado": {!! $ura_caboRessecado1 !!},
      "defeitoComp": {!! $ura_defeitoComp1 !!},
      "conexaoTerminal": {!! $ura_conexaoTerm1 !!},
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

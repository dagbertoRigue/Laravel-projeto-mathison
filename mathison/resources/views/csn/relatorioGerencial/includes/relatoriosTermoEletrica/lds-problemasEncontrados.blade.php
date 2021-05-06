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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Linha de Decapagem Semicontínua</h4></strong>
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
      "faltaAperto": {!! $lds_faltaAperto12 !!},
      "desbalDeFase": {!! $lds_desbalDeFase12 !!},
      "compMalDimensionado": {!! $lds_compMalDim12 !!},
      "caboRessecado": {!! $lds_caboRessecado12 !!},
      "defeitoComp": {!! $lds_defeitoComp12 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm12 !!},
  },{
      "mes": {!! json_encode($atualf11) !!},
      "faltaAperto": {!! $lds_faltaAperto11 !!},
      "desbalDeFase": {!! $lds_desbalDeFase11 !!},
      "compMalDimensionado": {!! $lds_compMalDim11 !!},
      "caboRessecado": {!! $lds_caboRessecado11 !!},
      "defeitoComp": {!! $lds_defeitoComp11 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm11 !!},
  },{
      "mes": {!! json_encode($atualf10) !!},
      "faltaAperto": {!! $lds_faltaAperto10 !!},
      "desbalDeFase": {!! $lds_desbalDeFase10 !!},
      "compMalDimensionado": {!! $lds_compMalDim10 !!},
      "caboRessecado": {!! $lds_caboRessecado10 !!},
      "defeitoComp": {!! $lds_defeitoComp10 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm10 !!},
  },{
      "mes": {!! json_encode($atualf9) !!},
      "faltaAperto": {!! $lds_faltaAperto9 !!},
      "desbalDeFase": {!! $lds_desbalDeFase9 !!},
      "compMalDimensionado": {!! $lds_compMalDim9 !!},
      "caboRessecado": {!! $lds_caboRessecado9 !!},
      "defeitoComp": {!! $lds_defeitoComp9 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm9 !!},
  },{
      "mes": {!! json_encode($atualf8) !!},
      "faltaAperto": {!! $lds_faltaAperto8 !!},
      "desbalDeFase": {!! $lds_desbalDeFase8 !!},
      "compMalDimensionado": {!! $lds_compMalDim8 !!},
      "caboRessecado": {!! $lds_caboRessecado8 !!},
      "defeitoComp": {!! $lds_defeitoComp8 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm8 !!},
  },{
      "mes": {!! json_encode($atualf7) !!},
      "faltaAperto": {!! $lds_faltaAperto7 !!},
      "desbalDeFase": {!! $lds_desbalDeFase7 !!},
      "compMalDimensionado": {!! $lds_compMalDim7 !!},
      "caboRessecado": {!! $lds_caboRessecado7 !!},
      "defeitoComp": {!! $lds_defeitoComp7 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm7 !!},
  },{
      "mes": {!! json_encode($atualf6) !!},
      "faltaAperto": {!! $lds_faltaAperto6 !!},
      "desbalDeFase": {!! $lds_desbalDeFase6 !!},
      "compMalDimensionado": {!! $lds_compMalDim6 !!},
      "caboRessecado": {!! $lds_caboRessecado6 !!},
      "defeitoComp": {!! $lds_defeitoComp6 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm6 !!},
  },{
      "mes": {!! json_encode($atualf5) !!},
      "faltaAperto": {!! $lds_faltaAperto5 !!},
      "desbalDeFase": {!! $lds_desbalDeFase5 !!},
      "compMalDimensionado": {!! $lds_compMalDim5 !!},
      "caboRessecado": {!! $lds_caboRessecado5 !!},
      "defeitoComp": {!! $lds_defeitoComp5 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm5 !!},
  },{
      "mes": {!! json_encode($atualf4) !!},
      "faltaAperto": {!! $lds_faltaAperto4 !!},
      "desbalDeFase": {!! $lds_desbalDeFase4 !!},
      "compMalDimensionado": {!! $lds_compMalDim4 !!},
      "caboRessecado": {!! $lds_caboRessecado4 !!},
      "defeitoComp": {!! $lds_defeitoComp4 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm4 !!},
  },{
      "mes": {!! json_encode($atualf3) !!},
      "faltaAperto": {!! $lds_faltaAperto3 !!},
      "desbalDeFase": {!! $lds_desbalDeFase3 !!},
      "compMalDimensionado": {!! $lds_compMalDim3 !!},
      "caboRessecado": {!! $lds_caboRessecado3 !!},
      "defeitoComp": {!! $lds_defeitoComp3 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm3 !!},
  },{
      "mes": {!! json_encode($atualf2) !!},
      "faltaAperto": {!! $lds_faltaAperto2 !!},
      "desbalDeFase": {!! $lds_desbalDeFase2 !!},
      "compMalDimensionado": {!! $lds_compMalDim2 !!},
      "caboRessecado": {!! $lds_caboRessecado2 !!},
      "defeitoComp": {!! $lds_defeitoComp2 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm2 !!},
  },{
      "mes": {!! json_encode($atualf1) !!},
      "faltaAperto": {!! $lds_faltaAperto1 !!},
      "desbalDeFase": {!! $lds_desbalDeFase1 !!},
      "compMalDimensionado": {!! $lds_compMalDim1 !!},
      "caboRessecado": {!! $lds_caboRessecado1 !!},
      "defeitoComp": {!! $lds_defeitoComp1 !!},
      "conexaoTerminal": {!! $lds_conexaoTerm1 !!},
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

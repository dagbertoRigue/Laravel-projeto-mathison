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
                  <strong><h4 style="color:#555; margin: 0 0 0px;">UTILIDADES</h4></strong>
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
      "faltaAperto": {!! $uti_faltaAperto12 !!},
      "desbalDeFase": {!! $uti_desbalDeFase12 !!},
      "compMalDimensionado": {!! $uti_compMalDim12 !!},
      "caboRessecado": {!! $uti_caboRessecado12 !!},
      "defeitoComp": {!! $uti_defeitoComp12 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm12 !!},
  },{
      "mes": {!! json_encode($atualf11) !!},
      "faltaAperto": {!! $uti_faltaAperto11 !!},
      "desbalDeFase": {!! $uti_desbalDeFase11 !!},
      "compMalDimensionado": {!! $uti_compMalDim11 !!},
      "caboRessecado": {!! $uti_caboRessecado11 !!},
      "defeitoComp": {!! $uti_defeitoComp11 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm11 !!},
  },{
      "mes": {!! json_encode($atualf10) !!},
      "faltaAperto": {!! $uti_faltaAperto10 !!},
      "desbalDeFase": {!! $uti_desbalDeFase10 !!},
      "compMalDimensionado": {!! $uti_compMalDim10 !!},
      "caboRessecado": {!! $uti_caboRessecado10 !!},
      "defeitoComp": {!! $uti_defeitoComp10 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm10 !!},
  },{
      "mes": {!! json_encode($atualf9) !!},
      "faltaAperto": {!! $uti_faltaAperto9 !!},
      "desbalDeFase": {!! $uti_desbalDeFase9 !!},
      "compMalDimensionado": {!! $uti_compMalDim9 !!},
      "caboRessecado": {!! $uti_caboRessecado9 !!},
      "defeitoComp": {!! $uti_defeitoComp9 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm9 !!},
  },{
      "mes": {!! json_encode($atualf8) !!},
      "faltaAperto": {!! $uti_faltaAperto8 !!},
      "desbalDeFase": {!! $uti_desbalDeFase8 !!},
      "compMalDimensionado": {!! $uti_compMalDim8 !!},
      "caboRessecado": {!! $uti_caboRessecado8 !!},
      "defeitoComp": {!! $uti_defeitoComp8 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm8 !!},
  },{
      "mes": {!! json_encode($atualf7) !!},
      "faltaAperto": {!! $uti_faltaAperto7 !!},
      "desbalDeFase": {!! $uti_desbalDeFase7 !!},
      "compMalDimensionado": {!! $uti_compMalDim7 !!},
      "caboRessecado": {!! $uti_caboRessecado7 !!},
      "defeitoComp": {!! $uti_defeitoComp7 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm7 !!},
  },{
      "mes": {!! json_encode($atualf6) !!},
      "faltaAperto": {!! $uti_faltaAperto6 !!},
      "desbalDeFase": {!! $uti_desbalDeFase6 !!},
      "compMalDimensionado": {!! $uti_compMalDim6 !!},
      "caboRessecado": {!! $uti_caboRessecado6 !!},
      "defeitoComp": {!! $uti_defeitoComp6 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm6 !!},
  },{
      "mes": {!! json_encode($atualf5) !!},
      "faltaAperto": {!! $uti_faltaAperto5 !!},
      "desbalDeFase": {!! $uti_desbalDeFase5 !!},
      "compMalDimensionado": {!! $uti_compMalDim5 !!},
      "caboRessecado": {!! $uti_caboRessecado5 !!},
      "defeitoComp": {!! $uti_defeitoComp5 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm5 !!},
  },{
      "mes": {!! json_encode($atualf4) !!},
      "faltaAperto": {!! $uti_faltaAperto4 !!},
      "desbalDeFase": {!! $uti_desbalDeFase4 !!},
      "compMalDimensionado": {!! $uti_compMalDim4 !!},
      "caboRessecado": {!! $uti_caboRessecado4 !!},
      "defeitoComp": {!! $uti_defeitoComp4 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm4 !!},
  },{
      "mes": {!! json_encode($atualf3) !!},
      "faltaAperto": {!! $uti_faltaAperto3 !!},
      "desbalDeFase": {!! $uti_desbalDeFase3 !!},
      "compMalDimensionado": {!! $uti_compMalDim3 !!},
      "caboRessecado": {!! $uti_caboRessecado3 !!},
      "defeitoComp": {!! $uti_defeitoComp3 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm3 !!},
  },{
      "mes": {!! json_encode($atualf2) !!},
      "faltaAperto": {!! $uti_faltaAperto2 !!},
      "desbalDeFase": {!! $uti_desbalDeFase2 !!},
      "compMalDimensionado": {!! $uti_compMalDim2 !!},
      "caboRessecado": {!! $uti_caboRessecado2 !!},
      "defeitoComp": {!! $uti_defeitoComp2 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm2 !!},
  },{
      "mes": {!! json_encode($atualf1) !!},
      "faltaAperto": {!! $uti_faltaAperto1 !!},
      "desbalDeFase": {!! $uti_desbalDeFase1 !!},
      "compMalDimensionado": {!! $uti_compMalDim1 !!},
      "caboRessecado": {!! $uti_caboRessecado1 !!},
      "defeitoComp": {!! $uti_defeitoComp1 !!},
      "conexaoTerminal": {!! $uti_conexaoTerm1 !!},
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

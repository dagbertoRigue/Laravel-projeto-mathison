@extends('csn.templates.templateRelatorios')

@section('content')
  @include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerRM')

  <div id="wrapper-side">
    @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-Resistencia')
    <div id="page-content-wrapper-side">
      <div class="container-fluid">

  <!-- - - - - - - - - - - - GRÁFICO GGOP-PR ANORMALIDADES - - - - - - - - - - - -->
      <div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
        <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default"style="background-color:#f1f1f1;">
              <div class="panel-heading">
                  <strong><h4 style="color:#555; margin: 0 0 0px;">Unidade de Regeneração de Ácido</h4></strong>
              </div>
              <div class="panel-body">
                <div class="row" style="margin-top: 0px;margin-bottom:0px;">
                  <div class="col-md-7">
                    <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Análise de Resistência</strong>
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
         "umidade": {!! $ura_umidade12 !!},
         "sujeira": {!! $ura_sujeira12 !!},
         "curto_espiras": {!! $ura_curto_espiras12 !!},
         "cabo": {!! $ura_cabo12 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira12 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado12 !!}
     },{
         "mes": {!! json_encode($atualf11) !!},
         "umidade": {!! $ura_umidade11 !!},
         "sujeira": {!! $ura_sujeira11 !!},
         "curto_espiras": {!! $ura_curto_espiras11 !!},
         "cabo": {!! $ura_cabo11 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira11 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado11 !!}
     },{
         "mes": {!! json_encode($atualf10) !!},
         "umidade": {!! $ura_umidade10 !!},
         "sujeira": {!! $ura_sujeira10 !!},
         "curto_espiras": {!! $ura_curto_espiras10 !!},
         "cabo": {!! $ura_cabo10 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira10 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado10 !!}
     },{
         "mes": {!! json_encode($atualf9) !!},
         "umidade": {!! $ura_umidade9 !!},
         "sujeira": {!! $ura_sujeira9 !!},
         "curto_espiras": {!! $ura_curto_espiras9 !!},
         "cabo": {!! $ura_cabo9 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira9 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado9 !!}
     },{
         "mes": {!! json_encode($atualf8) !!},
         "umidade": {!! $ura_umidade8 !!},
         "sujeira": {!! $ura_sujeira8 !!},
         "curto_espiras": {!! $ura_curto_espiras8 !!},
         "cabo": {!! $ura_cabo8 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira8 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado8 !!}
     },{
         "mes": {!! json_encode($atualf7) !!},
         "umidade": {!! $ura_umidade7 !!},
         "sujeira": {!! $ura_sujeira7 !!},
         "curto_espiras": {!! $ura_curto_espiras7 !!},
         "cabo": {!! $ura_cabo7 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira7 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado7 !!}
     },{
         "mes": {!! json_encode($atualf6) !!},
         "umidade": {!! $ura_umidade6 !!},
         "sujeira": {!! $ura_sujeira6 !!},
         "curto_espiras": {!! $ura_curto_espiras6 !!},
         "cabo": {!! $ura_cabo6 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira6 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado6 !!}
     },{
         "mes": {!! json_encode($atualf5) !!},
         "umidade": {!! $ura_umidade5 !!},
         "sujeira": {!! $ura_sujeira5 !!},
         "curto_espiras": {!! $ura_curto_espiras5 !!},
         "cabo": {!! $ura_cabo5 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira5 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado5 !!}
     },{
         "mes": {!! json_encode($atualf4) !!},
         "umidade": {!! $ura_umidade4 !!},
         "sujeira": {!! $ura_sujeira4 !!},
         "curto_espiras": {!! $ura_curto_espiras4 !!},
         "cabo": {!! $ura_cabo4 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira4 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado4 !!}
     },{
         "mes": {!! json_encode($atualf3) !!},
         "umidade": {!! $ura_umidade3 !!},
         "sujeira": {!! $ura_sujeira3 !!},
         "curto_espiras": {!! $ura_curto_espiras3 !!},
         "cabo": {!! $ura_cabo3 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira3 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado3 !!}
     },{
         "mes": {!! json_encode($atualf2) !!},
         "umidade": {!! $ura_umidade2 !!},
         "sujeira": {!! $ura_sujeira2 !!},
         "curto_espiras": {!! $ura_curto_espiras2 !!},
         "cabo": {!! $ura_cabo2 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira2 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado2 !!}
     },{
         "mes": {!! json_encode($atualf11) !!},
         "umidade": {!! $ura_umidade1 !!},
         "sujeira": {!! $ura_sujeira1 !!},
         "curto_espiras": {!! $ura_curto_espiras1 !!},
         "cabo": {!! $ura_cabo1 !!},
         "umidade_sujeira": {!! $ura_umidade_sujeira1 !!},
         "isolamento_danificado": {!! $ura_isolamento_danificado1 !!}
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
       "title": "Umidade",
       "type": "column",
       "color": "#000000",
       "lineColor": "#3d9e8e",
       "valueField": "umidade"
   },{
     "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
     "fillAlphas": 0.8,
     "labelText": "[[value]]",
     "lineAlpha": 0.3,
     "title": "Sujeira",
     "type": "column",
     "color": "#000000",
     "lineColor": "#3d729e",
     "valueField": "sujeira"
 },{
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Umidade/Sujeira",
   "type": "column",
   "color": "#000000",
   "lineColor": "#859e3d",
   "valueField": "umidade_sujeira"
 },{
  "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[value]]",
  "lineAlpha": 0.3,
  "title": "Cabo",
  "type": "column",
  "color": "#000000",
  "lineColor": "#5a3d9e",
  "valueField": "cabo"
},{
  "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[value]]",
  "lineAlpha": 0.3,
  "title": "Curto Espiras",
  "type": "column",
  "color": "#000000",
  "lineColor": "#555555",
  "valueField": "curto_espiras"
},{
  "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[value]]",
  "lineAlpha": 0.3,
  "title": "Isolamento Danificado",
  "type": "column",
  "color": "#000000",
  "lineColor": "#9e823d",
  "valueField": "isolamento_danificado"
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

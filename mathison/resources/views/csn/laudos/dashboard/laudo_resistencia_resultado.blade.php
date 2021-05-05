<link href="/css/btnFlutuante.css" rel="stylesheet">
<style media="screen">
  #chartdiv_ri {
  	width	: 100%;
  	height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_ia {
  	width	: 100%;
  	height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_ip {
  	width	: 100%;
  	height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_ro {
  	width	: 100%;
  	height	: 500px;
  }
</style>
<style media="screen">
  .cab_cent {text-align: center};
</style>
<style>
  .buttondg {
    padding: 10px;
    width: 13.3%;
   -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: #636b6f;
   font-size: 16px;
   font-family: Arial Black;
   text-decoration: none;
   vertical-align: middle;
   }
.buttondg:hover {
   border-top-color: #11de29;
   background: #11de29;
   color: #fff;
   }
.buttondg:active {
   border-top-color: #f8ff1f;
   background: #f8ff1f;
   }
</style>
<style>
  .panel-relative{
    position: relative;
  }
  .btn-right{
    position: absolute;
    right: 15px;
  }
</style>

<form class="form" style= "max-width: none;">
<div id="wrapper-side">
  <!-- Sidebar -->
  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default" style="background-color:#f1f1f1;">
            <div class="panel-heading" style="height: 42px;">
              <div class="col-md-12">
                <div class="col-md-3">Laudo Nº:<strong> {{ $cod_laudo }} RM</strong></div>
              </div>
            </div>
            <div class="row" style="padding-top:15px; padding-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="col-md-7" style="padding-top:15px; padding-left:0px">
                  <div class="panel panel-default" style="height: 457px;padding-bottom:50px;">
                    <div class="panel-heading" style="height:75px;">
                      <div class="col-md-12">
                        <label for="text" style="padding-top:16px; font-size:16px;"><i class="fas fa-tag"></i> TAG:<strong> {{ $tag_ativ }}</strong></label><br>
                      </div>
                    </div>
                    <div class="row" style="padding-top:35px; padding-bottom:15px; font-size:16px;">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="form-group" style="padding-top:30px;">
                          <label id = "laudo_resistencia" for="text"><i class="fas fa-clipboard-list"></i> <strong>Dados do Laudo: </strong></label><br><br>
                          <label for="text">Data:<strong> {{ date('d-m-Y', strtotime(substr($data_analise, 0, 10))) }}</strong></label><br>
                          <label for="text">Linha:<strong> {{ $negocio_name }}</strong></label><br>
                          <label for="text">Sistema:<strong> {{ $sistema_name }}</strong></label><br>
                          <label for="text">Equipamento:<strong> {{ $ativo_name }}</strong></label><br>
                          @if ($descricao_ativ !== null)
                              <label for="text"> Descrição Equipamento:<strong> {{ $descricao_ativ }}</strong></label><br>
                          @else
                              <label for="text"> </label><br>
                          @endif

                          @if ($diagnostico_name !== null)
                              <label for="text"><i class="fas fa-capsules"></i>Diagnóstico:<strong> {{ $diagnostico_name }}</strong></label><br>
                          @else
                              <label for="text"> </label><br>
                          @endif
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-md-5" style="padding-top:15px; padding-right:0px" id="tag_equipamento">
                <div class="panel panel-default">
                  <div class="panel-heading text-center panel-relative" style="height:75px; background-color:{{$colorStatus }}">
                      <strong style="font-size:35px;">{{ $status }}</strong>
                  </div>
                  <style media="screen">
                  #divImg {
                    width: 100%;
                    height: 380px;
                    position: relative;
                  }
                  #imgDiv {
                    width:400px;
                    height:380px;
                    position:absolute;
                    top:50%;
                    left:50%;
                    margin-top:-190px;
                    margin-left:-200px;
                    }
                  </style>
                  <div id="divImg">
                    <img id="imgDiv" src="{{ '/'.$img_atividade }}" style="padding:15px 15px 15px 15px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong><i class="fas fa-history"></i> Laudos Anteriores</strong>
               </div>
               @if ($historicoCount == 1)
                 <div class="table-responsive">
                     <table class="table">
                       <tr>
                           <th colspan="1">Laudo Atual:</th>
                       </tr>
                       <tr>
                         @foreach ($historico as $key => $hist)
                           <td style="padding:15px">
                              <a
                                 type="button" class="btn buttondg"
                                 style="border-top: 1px solid #fff;
                                 color: {{$hist->color}};
                                 background: #fff;
                                 background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                 width:100%;">
                                {{$hist->laudo_id}} RM <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                              </a>
                           </td>
                          @endforeach
                       </tr>
                     </table>
                 </div>
                @elseif ($historicoCount > 1 AND $historicoCount < 7)
                 <div class="table-responsive">
                     <table class="table">
                             <tr>
                                 <th colspan={{$historicoCount-1}}>Histórico</th>
                                 <th colspan="1">Laudo Atual:</th>
                             </tr>
                             <tr>
                                 @foreach ($historico->slice(0, 7) as $key => $hist)
                                   @if($cod_laudo == $hist->laudo_id)
                                    <td style="padding:15px">
                                       <a
                                          type="button" class="btn buttondg"
                                          style="border-top: 1px solid #fff;
                                          color: {{$hist->color}};
                                          background: #fff;
                                          background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                          width:100%;">
                                         {{$hist->laudo_id}} RM <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                       </a>
                                    </td>
                                       @else
                                       <td style="padding:15px">
                                       <a href="/preditiva.csn.br/laudos/resistencia/laudo/equipamento/{{$hist->laudo_id}}"
                                          type="button" class="btn buttondg"
                                          style="border-top: 1px solid {{$hist->color}};
                                          background: {{$hist->color}};
                                          width:100%;">
                                         {{$hist->laudo_id}} RM <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                       </a>
                                       </td>
                                     @endif
                                   @endforeach
                             </tr>
                     </table>
                 </div>
                 @else
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                          <th colspan="5">Histórico</th>
                          <th colspan="1">Laudo Atual:</th>
                      </tr>
                      <tr>
                          @foreach ($historico->slice($historicoCount-6, $historicoCount) as $key => $hist)
                            @if($cod_laudo == $hist->laudo_id)
                             <td style="padding:15px">
                                <a
                                   type="button" class="btn buttondg"
                                   style="border-top: 1px solid #fff;
                                   color: {{$hist->color}};
                                   background: #fff;
                                   background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                   width:100%;">
                                  {{$hist->laudo_id}} RM <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                </a>
                             </td>
                                @else
                                <td style="padding:15px">
                                <a href="/preditiva.csn.br/laudos/resistencia/laudo/equipamento/{{$hist->laudo_id}}"
                                   type="button" class="btn buttondg"
                                   style="border-top: 1px solid {{$hist->color}};
                                   background: {{$hist->color}};
                                   width:100%;">
                                  {{$hist->laudo_id}} RM <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                </a>
                                </td>
                              @endif
                            @endforeach
                      </tr>
                    </table>
                  </div>
                @endif
                <div class="btnPesquisar">
                	<div class="col-3 btnPesquisarBtn">
                		<a href="{{$btnRetorno}}" type="button" class="btn btn-danger btnCircular btnPrincipal" style="width:125%"><i class="fas fa-arrow-left"></i></a>
                	</div>
                </div>
             </div>
           </div>
         </div>
         @if ($obs !== null)
            <div class="row" style="padding-top:0px; padding-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="row" style="padding-top:15px; padding-bottom:15px;">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="form-group" style="padding-top:15px;" id="obs">
                        <label for="text"><i class="fas fa-bookmark"></i> Observação:</label><br>
                        <div class="panel panel-default">
                          <label for="text"style="padding:15px 15px 15px 15px;"><strong> {{ $obs }}</strong></label><br>
                        </div>
                      </div>
                      @if ($recom !== null)
                      <div class="form-group" style="padding-top:15px;" id="edt">
                        <label for="text"><i class="fas fa-comment"></i> Recomendação:</label><br>
                        <div class="panel panel-default">
                          <label for="text"style="padding:15px 15px 15px 15px;"><strong> {{ $recom }}</strong></label><br>
                        </div>
                      </div>
                      @else
                      <div></div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @elseif($recom !== null)
            <div class="row" style="padding-top:0px; padding-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="row" style="padding-top:15px; padding-bottom:15px;">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="form-group" style="padding-top:15px;" id="edt">
                        <label for="text"><i class="fas fa-comment"></i> Recomendação:</label><br>
                        <div class="panel panel-default">
                          <label for="text"style="padding:15px 15px 15px 15px;"><strong> {{ $recom }}</strong></label><br>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div></div>
            @endif

          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Resistência de Isolamento</strong>
               </div>
               <div class="panel-body">
                 <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover">
                     <thead>
                       <tr>
                         <th colspan='8' class="cab_cent">Dados para este Laudo</th>
                       </tr>
                       <tr>
                         <th colspan='3' class="cab_cent">Teste: {{ $teste }}</th>
                         <th colspan='3' class="cab_cent">Resistência M&#937 (Normalizado a 40°C)</th>
                         <th colspan='2' class="cab_cent">Índice de Absorção e Polarização</th>
                       </tr>
                       <tr>
                         <th class="cab_cent">Tensão Aplicada</th>
                         <th class="cab_cent">Temp. Inicial</th>
                         <th class="cab_cent">Temp. Final</th>
                         <th class="cab_cent">30 s</th>
                         <th class="cab_cent">1 min</th>
                         <th class="cab_cent">10 min</th>
                         <th class="cab_cent">IA</th>
                         <th class="cab_cent">IP</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                           <td class="cab_cent">{{ $tensao }}</td>
                           <td class="cab_cent">{{ $tempIni }}°C</td>
                           <td class="cab_cent">{{ $tempFin }}°C</td>
                           <td class="cab_cent">{{ $temp30Norm }}</td>
                           <td class="cab_cent">{{ $temp1Norm }}</td>
                           <td class="cab_cent">{{ $temp10Norm }}</td>
                           <td class="cab_cent">{{ $ia }}</td>
                           <td class="cab_cent">{{ $ip }}</td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
               </div>
              </div>
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Histórico</strong>
               </div>
               <div class="panel-body">
                 <span class="cab_cent">
                   Resistência de Isolamento (M&#937)
                   <br>1min - Normalizado a 40°C<br>
                 </span>
                 <div id="chartdiv_ri"></div>
               </div>
               <div class="panel-body">
                 Índice de Absorção (IA)<br>
                 <div id="chartdiv_ia"></div>
               </div>
               <div class="panel-body">
                 Índice de Polarização (IP)<br>
                 <div id="chartdiv_ip"></div>
               </div>
              </div>
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Resistência de Ôhmica</strong>
               </div>
               <div class="panel-body">
                 <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover">
                     <thead>
                       <tr>
                         <th colspan='4' class="cab_cent">Dados para este Laudo</th>
                       </tr>
                       <tr>
                         <th class="cab_cent">RS</th>
                         <th class="cab_cent">RT</th>
                         <th class="cab_cent">ST</th>
                         <th class="cab_cent">RO</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td class="cab_cent">{{ $rs }}m&#937</td>
                         <td class="cab_cent">{{ $rt }}m&#937</td>
                         <td class="cab_cent">{{ $st }}m&#937</td>
                         <td class="cab_cent">{{ $ro }}%</td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
               </div>
              </div>
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Histórico</strong>
               </div>
              <div class="panel-body">
                Resistência Ôhmica (RO)%<br>
                <div id="chartdiv_ro"></div>
              </div>
            </div>
            <div class="row" style="padding-top:0px; padding-bottom:15px;">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="row" style="padding-top:15px; padding-bottom:15px;" id = "pagina3">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="form-group" id="nome_tecnico">
                        <label for="text"><i class="fas fa-user"></i> Analista:</label><br>
                        <div class="panel panel-default"  style="padding:15px;">
                          <label for="text"> <strong> {{ $user_name }}</strong></label><br>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
</form>

<script>
/*Gráfico Resistência de Isolamento*/
var chart = AmCharts.makeChart("chartdiv_ri", {
  "type": "serial",
  "theme": "light",
  "marginRight": 40,
  "marginLeft": 40,
  "autoMarginOffset": 20,
  "mouseWheelZoomEnabled":true,
  "dataDateFormat": "YYYY-MM-DD",
  "valueAxes": [{
    "logarithmic": true,
      "id": "v1",
      "axisAlpha": 0,
      "position": "left",
      "ignoreAxisWidth":true
  }],
  "balloon": {
      "borderThickness": 1,
      "shadowAlpha": 0
  },
  "graphs": [{
      "id": "g1",
      "balloon":{
        "drop":false,
        "adjustBorderColor":false,
        "color":"#ffffff"
      },
      "bullet": "round",
      "bulletBorderAlpha": 1,
      "bulletColor": "#FFFFFF",
      "bulletSize": 5,
      "hideBulletsCount": 50,
      "lineThickness": 2,
      "title": "red line",
      "useLineColorForBulletBorder": true,
      "valueField": "value",
      "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
  }],
  "chartScrollbar": {
      "graph": "g1",
      "oppositeAxis":false,
      "offset":30,
      "scrollbarHeight": 80,
      "backgroundAlpha": 0,
      "selectedBackgroundAlpha": 0.1,
      "selectedBackgroundColor": "#888888",
      "graphFillAlpha": 0,
      "graphLineAlpha": 0.5,
      "selectedGraphFillAlpha": 0,
      "selectedGraphLineAlpha": 1,
      "autoGridCount":true,
      "color":"#AAAAAA"
  },
  "chartCursor": {
      "pan": true,
      "valueLineEnabled": true,
      "valueLineBalloonEnabled": true,
      "cursorAlpha":1,
      "cursorColor":"#258cbb",
      "limitToGraph":"g1",
      "valueLineAlpha":0.2,
      "valueZoomable":true
  },
  "valueScrollbar":{
    "oppositeAxis":false,
    "offset":50,
    "scrollbarHeight":10
  },
  "categoryField": "date",
  "categoryAxis": {
      "parseDates": true,
      "dashLength": 1,
      "minorGridEnabled": true
  },
  "export": {
      "enabled": true
  },
  "dataProvider":
      {!!$array_graf_1min!!}
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
  chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}

/*Gráfico IA*/
var chart = AmCharts.makeChart("chartdiv_ia", {
  "type": "serial",
  "theme": "light",
  "marginRight": 40,
  "marginLeft": 40,
  "autoMarginOffset": 20,
  "mouseWheelZoomEnabled":true,
  "dataDateFormat": "YYYY-MM-DD",
  "valueAxes": [{
      "id": "v1",
      "axisAlpha": 0,
      "guides": [{
            "fillAlpha": 0.1,
            "fillColor": "#fff000",
            "lineAlpha": 0,
            "toValue": 1.1,
            "value": 1.5
        },{
            "fillAlpha": 0.1,
            "fillColor": "#ff0000",
            "lineAlpha": 0,
            "toValue": 1.1,
            "value": 0
          },{
            "fillAlpha": 0.1,
            "fillColor": "#00cc00",
            "lineAlpha": 0,
            "toValue": 10000,
            "value": 1.5
            }],
      "position": "left",
      "ignoreAxisWidth":true
  }],
  "balloon": {
      "borderThickness": 1,
      "shadowAlpha": 0
  },
  "graphs": [{
      "id": "g1",
      "balloon":{
        "drop":false,
        "adjustBorderColor":false,
        "color":"#ffffff"
      },
      "bullet": "round",
      "bulletBorderAlpha": 1,
      "bulletColor": "#FFFFFF",
      "bulletSize": 5,
      "hideBulletsCount": 50,
      "lineThickness": 2,
      "title": "red line",
      "useLineColorForBulletBorder": true,
      "valueField": "value",
      "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
  }],
  "chartScrollbar": {
      "graph": "g1",
      "oppositeAxis":false,
      "offset":30,
      "scrollbarHeight": 80,
      "backgroundAlpha": 0,
      "selectedBackgroundAlpha": 0.1,
      "selectedBackgroundColor": "#888888",
      "graphFillAlpha": 0,
      "graphLineAlpha": 0.5,
      "selectedGraphFillAlpha": 0,
      "selectedGraphLineAlpha": 1,
      "autoGridCount":true,
      "color":"#AAAAAA"
  },
  "chartCursor": {
      "pan": true,
      "valueLineEnabled": true,
      "valueLineBalloonEnabled": true,
      "cursorAlpha":1,
      "cursorColor":"#258cbb",
      "limitToGraph":"g1",
      "valueLineAlpha":0.2,
      "valueZoomable":true
  },
  "valueScrollbar":{
    "oppositeAxis":false,
    "offset":50,
    "scrollbarHeight":10
  },
  "categoryField": "date",
  "categoryAxis": {
      "parseDates": true,
      "dashLength": 1,
      "minorGridEnabled": true
  },
  "export": {
      "enabled": true
  },
  "dataProvider":
      {!!$array_graf_ia!!}
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
  chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}

/*Gráfico IP*/
var chart = AmCharts.makeChart("chartdiv_ip", {
  "type": "serial",
  "theme": "light",
  "marginRight": 40,
  "marginLeft": 40,
  "autoMarginOffset": 20,
  "mouseWheelZoomEnabled":true,
  "dataDateFormat": "YYYY-MM-DD",
  "valueAxes": [{
      "id": "v1",
      "axisAlpha": 0,
      "guides": [{
            "fillAlpha": 0.1,
            "fillColor": "#fff000",
            "lineAlpha": 0,
            "toValue": 3.0,
            "value": 1.5
        },{
            "fillAlpha": 0.1,
            "fillColor": "#ff0000",
            "lineAlpha": 0,
            "toValue": 1.5,
            "value": 0
          },{
            "fillAlpha": 0.1,
            "fillColor": "#00cc00",
            "lineAlpha": 0,
            "toValue": 10000,
            "value": 3.0
            }],
      "position": "left",
      "ignoreAxisWidth":true
  }],
  "balloon": {
      "borderThickness": 1,
      "shadowAlpha": 0
  },
  "graphs": [{
      "id": "g1",
      "balloon":{
        "drop":false,
        "adjustBorderColor":false,
        "color":"#ffffff"
      },
      "bullet": "round",
      "bulletBorderAlpha": 1,
      "bulletColor": "#FFFFFF",
      "bulletSize": 5,
      "hideBulletsCount": 50,
      "lineThickness": 2,
      "title": "red line",
      "useLineColorForBulletBorder": true,
      "valueField": "value",
      "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
  }],
  "chartScrollbar": {
      "graph": "g1",
      "oppositeAxis":false,
      "offset":30,
      "scrollbarHeight": 80,
      "backgroundAlpha": 0,
      "selectedBackgroundAlpha": 0.1,
      "selectedBackgroundColor": "#888888",
      "graphFillAlpha": 0,
      "graphLineAlpha": 0.5,
      "selectedGraphFillAlpha": 0,
      "selectedGraphLineAlpha": 1,
      "autoGridCount":true,
      "color":"#AAAAAA"
  },
  "chartCursor": {
      "pan": true,
      "valueLineEnabled": true,
      "valueLineBalloonEnabled": true,
      "cursorAlpha":1,
      "cursorColor":"#258cbb",
      "limitToGraph":"g1",
      "valueLineAlpha":0.2,
      "valueZoomable":true
  },
  "valueScrollbar":{
    "oppositeAxis":false,
    "offset":50,
    "scrollbarHeight":10
  },
  "categoryField": "date",
  "categoryAxis": {
      "parseDates": true,
      "dashLength": 1,
      "minorGridEnabled": true
  },
  "export": {
      "enabled": true
  },
  "dataProvider":
      {!!$array_graf_ip!!}
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
  chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}

/*Gráfico Resistência de Isolamento*/
var chart = AmCharts.makeChart("chartdiv_ro", {
  "type": "serial",
  "theme": "light",
  "marginRight": 40,
  "marginLeft": 40,
  "autoMarginOffset": 20,
  "mouseWheelZoomEnabled":true,
  "dataDateFormat": "YYYY-MM-DD",
  "valueAxes": [{
      "id": "v1",
      "axisAlpha": 0,
      "guides": [{
            "fillAlpha": 0.1,
            "fillColor": "#fff000",
            "lineAlpha": 0,
            "toValue": 5,
            "value": 3
        },{
              "fillAlpha": 0.1,
              "fillColor": "#fff000",
              "lineAlpha": 0,
              "toValue": -5,
              "value": -3
          },{
            "fillAlpha": 0.1,
            "fillColor": "#ff0000",
            "lineAlpha": 0,
            "toValue": 100,
            "value": 5
          },{
            "fillAlpha": 0.1,
            "fillColor": "#ff0000",
            "lineAlpha": 0,
            "toValue": -100,
            "value": -5
          },{
            "fillAlpha": 0.1,
            "fillColor": "#00cc00",
            "lineAlpha": 0,
            "toValue": 3,
            "value": -3
            }],
      "position": "left",
      "ignoreAxisWidth":true
  }],
  "balloon": {
      "borderThickness": 1,
      "shadowAlpha": 0
  },
  "graphs": [{
      "id": "g1",
      "balloon":{
        "drop":false,
        "adjustBorderColor":false,
        "color":"#ffffff"
      },
      "bullet": "round",
      "bulletBorderAlpha": 1,
      "bulletColor": "#FFFFFF",
      "bulletSize": 5,
      "hideBulletsCount": 50,
      "lineThickness": 2,
      "title": "red line",
      "useLineColorForBulletBorder": true,
      "valueField": "value",
      "balloonText": "<span style='font-size:18px;'>[[value]]%</span>"
  }],
  "chartScrollbar": {
      "graph": "g1",
      "oppositeAxis":false,
      "offset":30,
      "scrollbarHeight": 80,
      "backgroundAlpha": 0,
      "selectedBackgroundAlpha": 0.1,
      "selectedBackgroundColor": "#888888",
      "graphFillAlpha": 0,
      "graphLineAlpha": 0.5,
      "selectedGraphFillAlpha": 0,
      "selectedGraphLineAlpha": 1,
      "autoGridCount":true,
      "color":"#AAAAAA"
  },
  "chartCursor": {
      "pan": true,
      "valueLineEnabled": true,
      "valueLineBalloonEnabled": true,
      "cursorAlpha":1,
      "cursorColor":"#258cbb",
      "limitToGraph":"g1",
      "valueLineAlpha":0.2,
      "valueZoomable":true
  },
  "valueScrollbar":{
    "oppositeAxis":false,
    "offset":50,
    "scrollbarHeight":10
  },
  "categoryField": "date",
  "categoryAxis": {
      "parseDates": true,
      "dashLength": 1,
      "minorGridEnabled": true
  },
  "export": {
      "enabled": true
  },
  "dataProvider":
      {!!$array_graf_ro!!}
});
</script>

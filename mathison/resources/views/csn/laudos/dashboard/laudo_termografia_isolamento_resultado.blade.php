<link href="/css/btnFlutuante.css" rel="stylesheet">
<style media="screen">
  #chartdiv_modelo0 {
   width	: 100%;
   height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_modelo1 {
   width	: 100%;
   height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_modelo2 {
   width	: 100%;
   height	: 500px;
  }
</style>
<style media="screen">
  .cab_cent {text-align: center};
  .cab_right {text-align: right};
  .cab_left {text-align: left};
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
                <div class="col-md-3">
                  <label for="text" style="font-size:16px;">Laudo: <strong> {{ $id_laudo }} TR</strong></label><br>
                </div>
              </div>
            </div>
            <div class="row" style="padding-top:15px; padding-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="col-md-7" style="padding: 15px 0px 0px 0px;">
                  <div class="panel panel-default" style="height:482px;padding-bottom:75px;">
                    <div class="panel-heading" style="height:75px;">
                      <div class="col-md-12">
                        <label for="text" style="padding-top:16px; font-size:16px;"><i class="fas fa-tag"></i> TAG:<strong> {{ $tag_ativ }}</strong></label><br>
                      </div>
                    </div>
                    <div class="row" style="padding-top:35px; padding-bottom:15px; font-size:16px;">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="form-group" style="padding-top:30px;">
                          <label id = "laudo_termografia" for="text"><i class="fas fa-clipboard-list"></i> <strong>Dados do Laudo:</strong></label><br><br>
                          <label for="text">Data:<strong> {{ date('d-m-Y', strtotime(substr($data_analise, 0, 10))) }}</strong></label><br>
                          <label for="text">Linha:<strong> {{ $negocio_name }}</strong></label><br>
                          <label for="text">Sistema:<strong> {{ $sistema_name }}</strong></label><br>
                          <label for="text">Equipamento:<strong> {{ $ativo_name }}</strong></label><br>
                          @if ($descricao_ativ !== null)
                              <label for="text">Descrição Atividade:<strong> {{ $descricao_ativ }}</strong></label><br>
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
              <style media="screen">
              #divImg {
                width: 100%;
                height: 405px;
                position: relative;
              }
              #imgDiv {
                width:400px;
                height:400px;
                position:absolute;
                top:50%;
                left:50%;
                margin-top:-200px;
                margin-left:-200px;
                }
              </style>
              <div class="col-md-5" style="padding-top:15px; padding-right:0px" id="tag_equipamento">
                <div class="panel panel-default">
                  <div class="panel-heading text-center panel-relative" style="height:75px; background-color:{{$colorStatus }}">
                      <strong style="font-size:35px;">{{ $status }}</strong>
                  </div>
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
                               {{$hist->id}} TE <br>{{ date('d-m-Y', strtotime(substr($data_analise, 0, 10))) }}
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
                                   @if($id_laudo == $hist->id)
                                    <td style="padding:15px">
                                       <a
                                          type="button" class="btn buttondg"
                                          style="border-top: 1px solid #fff;
                                          color: {{$hist->color}};
                                          background: #fff;
                                          background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                          width:100%;">
                                         {{$hist->id}} TE <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                       </a>
                                    </td>
                                       @else
                                       <td style="padding:15px">
                                       <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/{{$hist->id}}"
                                          type="button" class="btn buttondg"
                                          style="border-top: 1px solid {{$hist->color}};
                                          background: {{$hist->color}};
                                          width:100%;">
                                         {{$hist->id}} TE <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
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
                                    @if($id_laudo == $hist->id)
                                    <td style="padding:15px">
                                       <a
                                          type="button" class="btn buttondg"
                                          style="border-top: 1px solid #fff;
                                          color: {{$hist->color}};
                                          background: #fff;
                                          background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                          width:100%;">
                                         {{$hist->id}} TE <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                       </a>
                                    </td>
                                    @else
                                        <td style="padding:15px">
                                          <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/{{$hist->id}}"
                                             type="button" class="btn buttondg"
                                             style="border-top: 1px solid {{$hist->color}};
                                             background: {{$hist->color}};
                                             width:100%;">
                                            {{$hist->id}} TE <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
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
                   <a href="{{$btnRetorno}}" type="button" class="btn btn-danger btnCircular btnPrincipal"  style="width:125%"><i class="fas fa-arrow-left"></i></a>
                 </div>
               </div>
             </div>
           </div>
          </div>
          @if($modelo_laudo == 0)
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                   <strong> Dados Para Este Laudo</strong>
                </div>
                <div class="panel-body">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                        <thead>
                          <tr>
                            <th class="cab_cent" style="width:16.7%">Temperatura</th>
                            <th class="cab_cent" style="width:16.7%">Zona</th>
                            <th class="cab_cent" style="width:16.7%">Temperatura Zona</th>
                            <th class="cab_cent" style="width:16.7%">Alarme</th>
                            <th class="cab_cent" style="width:16.7%">Crítico</th>
                            <th class="cab_cent" style="width:16.6%">Gradiente</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="cab_cent">{{$temp_medida}}°C</td>
                            <td class="cab_cent">{{$secao}}</td>
                            <td class="cab_cent">{{$temp_zona}}°C</td>
                            <td class="cab_cent">{{$alarme}}°C</td>
                            <td class="cab_cent">{{$critico}}°C</td>
                            <td class="cab_cent">{{$gradiente}}°C</td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped" style="margin-bottom:0px;">
                        <tbody>
                          <tr style="border: 1px solid #ddd;">
                            <td style="width: 50%;">
                              <span>Termograma:</span></br>
                              <img src="{{ ('/'.$img_termica)  }}" style="width: 100%; height:auto; padding:20px 20px 20px 20px;">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped table-hover">
                        <tbody>
                          <tr style="border: 1px solid #ddd;">
                            <td style="width: 35%;" class="cab_left">
                              <span>Foto:<strong> {{$termograma}}</strong></span>
                            </td>
                            <td style="width: 30%;" class="cab_cent">
                            </td>
                            <td style="width: 35 %;" class="cab_right">
                              <span>Câmera:<strong> {{$camera}}</strong></span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Histórico</strong>
               </div>
               <div class="panel-body">
                 <span class="cab_cent">Gráfico de Acompanhamento de Temperaturas (°C)</span>
                 <div id="chartdiv_modelo0"></div>
               </div>
              </div>
            </div>
          </div>
          @elseif($modelo_laudo == 1)
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                   <strong> Dados Para Este Laudo</strong>
                </div>
                <div class="panel-body">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                        <thead>
                          <tr>
                            <th class="cab_cent" style="width:20%">Temperatura</th>
                            <th class="cab_cent" style="width:20%">Zona</th>
                            <th class="cab_cent" style="width:20%">Temperatura Zona</th>
                            <th class="cab_cent" style="width:20%">Alarme</th>
                            <th class="cab_cent" style="width:20%">Crítico</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="cab_cent">{{$temp_medida}}°C</td>
                            <td class="cab_cent">{{$secao}}</td>
                            <td class="cab_cent">{{$temp_zona}}°C</td>
                            <td class="cab_cent">{{$alarme}}°C</td>
                            <td class="cab_cent">{{$critico}}°C</td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped" style="margin-bottom:0px;">
                        <tbody>
                          <tr style="border: 1px solid #ddd;">
                            <td style="width: 50%;">
                              <span>Termograma:</span></br>
                              <img src="{{ ('/'.$img_termica)  }}" style="width: 100%; height:auto; padding:20px 20px 20px 20px;">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped table-hover">
                        <tbody>
                          <tr style="border: 1px solid #ddd;">
                            <td style="width: 35%;" class="cab_left">
                              <span>Foto:<strong> {{$termograma}}</strong></span>
                            </td>
                            <td style="width: 30%;" class="cab_cent">
                            </td>
                            <td style="width: 35 %;" class="cab_right">
                              <span>Câmera:<strong> {{$camera}}</strong></span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Histórico</strong>
               </div>
               <div class="panel-body">
                 <span class="cab_cent">Gráfico de Acompanhamento de Temperaturas (°C)</span>
                 <div id="chartdiv_modelo1"></div>
               </div>
              </div>
            </div>
          </div>
          @else
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                   <strong> Dados Para Este Laudo</strong>
                </div>
                <div class="panel-body">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                        <thead>
                          <tr>
                            <th class="cab_cent" style="width:33.3%">Temperatura</th>
                            <th class="cab_cent" style="width:33.3%">Alarme</th>
                            <th class="cab_cent" style="width:33.3%">Crítico</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="cab_cent">{{$temp_medida}}°C</td>
                            <td class="cab_cent">{{$alarme}}°C</td>
                            <td class="cab_cent">{{$critico}}°C</td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped" style="margin-bottom:0px;">
                        <tbody>
                          <tr style="border: 1px solid #ddd;">
                            <td style="width: 50%;">
                              <span>Termograma:</span></br>
                              <img src="{{ ('/'.$img_termica)  }}" style="width: 100%; height:auto; padding:20px 20px 20px 20px;">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped table-hover">
                        <tbody>
                          <tr style="border: 1px solid #ddd;">
                            <td style="width: 35%;" class="cab_left">
                              <span>Foto:<strong> {{$termograma}}</strong></span>
                            </td>
                            <td style="width: 30%;" class="cab_cent">
                            </td>
                            <td style="width: 35 %;" class="cab_right">
                              <span>Câmera:<strong> {{$camera}}</strong></span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Histórico</strong>
               </div>
               <div class="panel-body">
                 <span class="cab_cent">Gráfico de Acompanhamento de Temperaturas (°C)</span>
                 <div id="chartdiv_modelo1"></div>
               </div>
              </div>
            </div>
          </div>
          @endif
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
          @endif
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                <div class="row" style="padding-top:15px; padding-bottom:15px;">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="form-group" style="padding-top:15px;" id="obs">
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
</form>

<!--  -->
<script>
var chart = AmCharts.makeChart("chartdiv_modelo0", {
  "type": "serial",
  "theme": "light",
  "legend": {
        "useGraphSettings": true
    },
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
            "fillColor": "#ff0000",
            "lineAlpha": 0,
            "toValue": {{$critico}},
            "value": 0
        },{
            "fillAlpha": 0.1,
            "fillColor": "#fff000",
            "lineAlpha": 0,
            "toValue": {{$alarme}},
            "value": {{$critico}}
          },{
            "fillAlpha": 0.1,
            "fillColor": "#00cc00",
            "lineAlpha": 0,
            "toValue": 10000,
            "value": {{$alarme}}
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
        "color":"#fffff1"
      },
      "bullet": "round",
      "bulletBorderAlpha": 1,
      "bulletColor": "#fffff1",
      "bulletSize": 5,
      "hideBulletsCount": 50,
      "lineThickness": 2,
      "title": "Gradiente",
      "useLineColorForBulletBorder": true,
      "valueField": "gradiente",
      "balloonText": "<span style='font-size:18px;'>[[gradiente]]</span>"
  }],
  "chartScrollbar": [{
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
  }],
  "chartCursor": [{
      "pan": true,
      "valueLineEnabled": true,
      "valueLineBalloonEnabled": true,
      "cursorAlpha":1,
      "cursorColor":"#258cbe",
      "valueLineAlpha":0.2,
      "valueZoomable":true
  }],
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
    {!!$array_graf_tc!!}
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
  chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}
</script>

<script>
var chart = AmCharts.makeChart("chartdiv_modelo1", {
  "type": "serial",
  "theme": "light",
  "legend": {
        "useGraphSettings": true
    },
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
            "fillColor": "#ff0000",
            "lineAlpha": 0,
            "toValue": 10000,
            "value": {{$critico}}
        },{
            "fillAlpha": 0.1,
            "fillColor": "#fff000",
            "lineAlpha": 0,
            "toValue": {{$critico}},
            "value": {{$alarme}}
          },{
            "fillAlpha": 0.1,
            "fillColor": "#00cc00",
            "lineAlpha": 0,
            "toValue": {{$alarme}},
            "value": 0
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
        "color":"#fffff1"
      },
      "bullet": "round",
      "bulletBorderAlpha": 1,
      "bulletColor": "#fffff1",
      "bulletSize": 5,
      "hideBulletsCount": 50,
      "lineThickness": 2,
      "title": "Temperatura",
      "useLineColorForBulletBorder": true,
      "valueField": "temp_medida",
      "balloonText": "<span style='font-size:18px;'>[[temp_medida]]</span>"
  }],
  "chartScrollbar": [{
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
  }],
  "chartCursor": [{
      "pan": true,
      "valueLineEnabled": true,
      "valueLineBalloonEnabled": true,
      "cursorAlpha":1,
      "cursorColor":"#258cbe",
      "valueLineAlpha":0.2,
      "valueZoomable":true
  }],
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
    {!!$array_graf_tc!!}
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
  chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}
</script>






















<!-- FIM  -->

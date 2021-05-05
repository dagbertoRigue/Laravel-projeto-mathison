<link href="/css/btnFlutuante.css" rel="stylesheet">
<style media="screen">
  #chartdiv_temp_corrig {
   width	: 100%;
   height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_maq_solda {
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
                  <label for="text" style="font-size:16px;">Laudo: <strong> {{ $cod_laudo }} TE</strong></label><br>
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
                              <label for="text">Descrição Equipamento:<strong> {{ $descricao_ativ }}</strong></label><br>
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
                                   @if($cod_laudo == $hist->id)
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
                                       <a href="/preditiva.csn.br/laudos/termografia/laudo/equipamento/{{$hist->id}}"
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
                                    @if($cod_laudo == $hist->id)
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
                                          <a href="/preditiva.csn.br/laudos/termografia/laudo/equipamento/{{$hist->id}}"
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

          @if ($modelo_atual == 0) <!--  ==============================MODELO 0 -->

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
          @endif <!--  ============================== FIM MODELO 0 -->
          @elseif ($modelo_atual == 1) <!-- =============================MODELO 1 -->
            <div class="row" style="padding-top:0px; padding-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="panel-heading">
                     <strong> Dados Para Este Laudo</strong>
                  </div>
                  <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="table-responsive">
                          @if ($i != 0)
                            @foreach ($img_termica_e as $key => $val)
                              <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                                <thead>
                                  <tr>
                                    <th colspan='3' class="cab_cent">Descrição do Ponto:<strong> {{$val->campo2}}</strong></th>
                                  </tr>
                                  <tr>
                                    <th class="cab_cent" style="width:40%">Temperatura Medida</th>
                                    <th class="cab_cent" style="width:40%">Temperatura Referência</th>
                                    <th class="cab_cent" style="width:20%">&#9651t</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="cab_cent">{{$array_img[$key]['tm']}}°C</td>
                                    <td class="cab_cent">{{$array_img[$key]['tr']}}°C</td>
                                    <td class="cab_cent">{{$array_img[$key]['dt']}}</td>
                                  </tr>
                                </tbody>
                              </table>
                              <table class="table table-striped" style="margin-bottom:0px;">
                                <tbody>
                                  <tr style="border: 1px solid #ddd;">
                                    <td style="width: 50%;">
                                      <span>Termograma:</span></br>
                                      <img src="{{ ('/'.$val->location)  }}" style="width: 100%; height:auto; padding:5px 5px 5px 0px;">
                                    </td>
                                    <td style="width: 50%;">
                                      <span>Foto Visível:</span></br>
                                      <img src="{{ ('/'.$val->campo1)  }}" style="width: 100%; height:auto; padding:5px 5px 5px 0px;">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <table class="table table-striped table-hover" style="margin-bottom:0px;">
                                <tbody>
                                  <tr style="border: 1px solid #ddd;">
                                    <td style="width: 35%;" class="cab_left">
                                      <span>Foto:<strong> {{$val->campo3}}</strong></span>
                                    </td>
                                    <td style="width: 35%;" class="cab_cent">
                                    </td>
                                    <td style="width: 30 %;" class="cab_right">
                                      <span>Câmera:<strong> {{$val->campo4}}</strong></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            @endforeach
                          @endif
                      </div>
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
            @endif<!-- ============================= FIM MODELO 1 -->
          @elseif ($modelo_atual == 2) <!-- =============================MODELO 2 -->
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                   <strong> Dados Para Este Laudo</strong>
                </div>
                <div class="panel-body">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive">
                        @if ($i != 0)
                          @foreach ($img_termica_e as $key => $val)
                            <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                              <thead>
                                <tr>
                                  <th class="cab_cent" style="width:40%">Descrição do Ponto:</th>
                                  <th class="cab_cent" style="width:40%">Temperatura Medida</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="cab_cent">{{$array_img[$key]['desc_ponto']}}</td>
                                  <td class="cab_cent">{{$array_img[$key]['tm']}}°C</td>
                                </tr>
                              </tbody>
                            </table>
                            <table class="table table-striped" style="margin-bottom:0px;">
                              <tbody>
                                <tr style="border: 1px solid #ddd;">
                                  <td style="width: 50%;">
                                    <span>Termograma:</span></br>
                                    <img src="{{ '/'.$array_img[$key]['location'] }}" style="width: 100%; height:auto; padding:5px 5px 5px 0px;">
                                  </td>
                                  <td style="width: 50%;">
                                    <span>Foto Visível:</span></br>
                                    <img src="{{ '/'.$array_img[$key]['img_visivel'] }}" style="width: 100%; height:auto; padding:5px 5px 5px 0px;">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class="table table-striped table-hover">
                              <tbody>
                                <tr style="border: 1px solid #ddd;">
                                  <td style="width: 35%;" class="cab_left">
                                    <span>Foto:<strong> {{ $array_img[$key]['nome_termo'] }}</strong></span>
                                  </td>
                                  <td style="width: 35%;" class="cab_cent">
                                  </td>
                                  <td style="width: 30 %;" class="cab_right">
                                    <span>Câmera:<strong> {{ $array_img[$key]['nome_camera'] }}</strong></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          @endforeach
                        @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Histórico</strong>
               </div>
               <div class="panel-body">
                 <span class="cab_cent">Gráfico de Acompanhamento da Temperatura (°C)</span>
                 <div id="chartdiv_maq_solda"></div>
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
          @endif<!-- ============================= FIM MODELO 2 -->

          @elseif ($modelo_atual == 3) <!-- =============================MODELO 3 -->
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                   <strong> Dados Para Este Laudo</strong>
                </div>
                <div class="panel-body">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive">
                        @if ($i != 0)
                          @foreach ($img_termica_e as $key => $val)
                            <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                              <thead>
                                <tr>
                                  <th colspan='5' class="cab_cent">Descrição do Ponto:<strong> {{$val->campo2}}</strong></th>
                                </tr>
                                <tr>
                                  <th class="cab_cent" style="width:20%">Temp.Medida</th>
                                  <th class="cab_cent" style="width:20%">Temp.Referência</th>
                                  <th class="cab_cent" style="width:20%">Veloc.Vento</th>
                                  <th class="cab_cent" style="width:20%">Temp.Corrigida</th>
                                  <th class="cab_cent" style="width:20%">Máx.Aquec.Adm.</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="cab_cent">{{ $temp_medida }}°C</td>
                                  <td class="cab_cent">{{ $temp_ref }}°C</td>
                                  <td class="cab_cent">{{ $veloc_vento }}m/s</td>
                                  <td class="cab_cent">{{ $temp_corrig }}°C</td>
                                  <td class="cab_cent">{{ $maa }}</td>
                                </tr>
                              </tbody>
                            </table>
                            <table class="table table-striped" style="margin-bottom:0px;">
                              <tbody>
                                <tr style="border: 1px solid #ddd;">
                                  <td style="width: 50%;">
                                    <span>Termograma:</span></br>
                                    <img src="{{ ('/'.$val->location)  }}" style="width: 100%; height:auto; padding:5px 5px 5px 0px;">
                                  </td>
                                  <td style="width: 50%;">
                                    <span>Foto Visível:</span></br>
                                    <img src="{{ ('/'.$val->campo1)  }}" style="width: 100%; height:auto; padding:5px 5px 5px 0px;">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class="table table-striped table-hover" style="margin-bottom:0px;">
                              <tbody>
                                <tr style="border: 1px solid #ddd;">
                                  <td style="width: 35%;" class="cab_left">
                                    <span>Foto:<strong> {{$val->campo3}}</strong></span>
                                  </td>
                                  <td style="width: 35%;" class="cab_cent">
                                  </td>
                                  <td style="width: 30 %;" class="cab_right">
                                    <span>Câmera:<strong> {{$val->campo4}}</strong></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          @endforeach
                        @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong>Histórico</strong>
               </div>
               <div class="panel-body">
                 <span class="cab_cent">Temperatura Corrigida (°C)</span>
                 <div id="chartdiv_temp_corrig"></div>
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
            @endif<!-- ============================= FIM MODELO 3 -->
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

<script>
/*Gráfico Temperatura Corrigida*/
var chart = AmCharts.makeChart("chartdiv_temp_corrig", {
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
      {!!$array_graf_tc!!}
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
  chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}

/*Gráfico Máquina de Solda (máximo de pontos)*/
var chart = AmCharts.makeChart("chartdiv_maq_solda", {
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
      "title": "Cabeçote Superior",
      "useLineColorForBulletBorder": true,
      "valueField": "value1",
      "balloonText": "<span style='font-size:18px;'>[[value1]]</span>"
  },{
      "id": "g2",
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
      "title": "Cabeçote Inferior",
      "useLineColorForBulletBorder": true,
      "valueField": "value2",
      "balloonText": "<span style='font-size:18px;'>[[value2]]</span>"
  },{
      "id": "g3",
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
      "title": "Cordoalha Inferior Frontal",
      "useLineColorForBulletBorder": true,
      "valueField": "value3",
      "balloonText": "<span style='font-size:18px;'>[[value3]]</span>"
  },{
      "id": "g4",
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
      "title": "Cordoalha Superior Frontal",
      "useLineColorForBulletBorder": true,
      "valueField": "value4",
      "balloonText": "<span style='font-size:18px;'>[[value4]]</span>"
  },{
      "id": "g5",
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
      "title": "Cordoalha Inferior Traseira",
      "useLineColorForBulletBorder": true,
      "valueField": "value5",
      "balloonText": "<span style='font-size:18px;'>[[value5]]</span>"
  },{
      "id": "g6",
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
      "title": "Cordoalha Superior Traseira",
      "useLineColorForBulletBorder": true,
      "valueField": "value6",
      "balloonText": "<span style='font-size:18px;'>[[value6]]</span>"
  },{
      "id": "g7",
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
      "title": "Suporte Lado Esquerdo Cabeçote Inferior",
      "useLineColorForBulletBorder": true,
      "valueField": "value7",
      "balloonText": "<span style='font-size:18px;'>[[value7]]</span>"
  },{
      "id": "g8",
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
      "title": "Suporte Lado Direito Cabeçote Inferior",
      "useLineColorForBulletBorder": true,
      "valueField": "value8",
      "balloonText": "<span style='font-size:18px;'>[[value8]]</span>"
  },],
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
    {!!$array_graf!!}
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
  chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}
</script>






















<!-- FIM  -->

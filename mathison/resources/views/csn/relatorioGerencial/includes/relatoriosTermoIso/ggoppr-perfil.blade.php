<!-- Styles -->
<link rel="stylesheet" href="/css/relatorioGerencial.css">
<link rel="stylesheet" href="/css/modal2.css">
<link rel="stylesheet" href="/plugins/w3schools/w3css_4_w3.css">
<link rel="stylesheet" href="/plugins/fontawesome-free-5.1.0-web/css/all.css">
<style>
  .w3-teal {
    color: #aaa!important;
    background-color: #fff!important;
  }
  .w3-riple {
    -webkit-transition: opacity 0s;
    transition: opacity 0s;
    -webkit-box-shadow: 1px 1px 3px 0 rgba(0,0,0,.5);
    -moz-box-shadow: 1px 1px 3px 0 rgba(0,0,0,.5);
    box-shadow: 1px 1px 3px 0 rgba(0,0,0,.5);
  }
  .w3-btn-floating {
    -webkit-transition: background-color .3s,color .15s,box-shadow .3s,opacity 0.3s,filter 0.3s;
    transition: background-color .3s,color .15s,box-shadow .3s,opacity 0.3s,filter 0.3s;
    width: 40px;
    height: 40px;
    line-height: 40px;
    display: inline-block;
    text-align: center;
    color: #fff;
    background-color: #000;
    position: relative;
    overflow: hidden;
    z-index: 1;
    padding: 0;
    border-radius: 50%;
    cursor: pointer;
    font-size: 24px;
  }
  .w3-btn-floating:hover {
    box-shadow: #ddd 0.2em 0.3em 0.2em;
  }
  .w3-container {
        padding: 0.01em 16px;
  }
  .w3-container::after {
    content: "";
    display: table;
    clear: both;
  }
</style>



<!-- - - - - - - - - - - - GRÁFICO GGOP-PR PERFIL DAS LINHAS - - - - - - - - - - - -->
<div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default" style="background-color:#f1f1f1;">
      <div class="panel-heading">
        <strong><h4 style="color:#555; margin: 0 0 0px;letter-spacing:0px;">Análise de Termografia de Isolamento - GGOP-PR</h4></strong>
        <h6 style="float: right!important; margin:-15px 10px 35px;letter-spacing:0px;">Total de Equipamentos Monitorados: <strong>{{$sum}}</strong></h6>
      </div>
      <div class="panel-body">
        <div class="row" id="dash" style="margin-bottom: 0px; margin-top: -5px;">
          <div class="col-md-5ths">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
                          <div class="col-xs-3">
                              <i class="fa fa-check fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge" style="font-size: 30px;">{{$normal}}</div>
                              <div>Normal</div>
                          </div>
                      </div>
                  </div>
                  <a onclick="document.getElementById('tab_normal').style.display='block'" style="cursor: pointer;">
                      <div class="panel-footer" style="background-color:#fff;border-top:0px;">
                          <span class="pull-left" style="font-size: 13px;">Lista Equipamentos</span>
                          <span class="pull-right" style="font-size: 13px;"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
                  <div id="tab_normal" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <table id="tbl_normal" width="100%" class="display table table-striped table-bordered table-hover" style="color:#555;margin-top:0px;margin-bottom:15px;">
                                <thead>
                                  <tr style="border: 1px solid #ddd;">
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Linha</th>
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Descrição</th>
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Laudos</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($tb_normal as $key => $val)
                                  <tr style="border: 1px solid #ddd;">
                                    <td class="cab_cent" style="border: 0px solid #ddd;">{{$tb_normal[$key]['descNegocio']}}</td>
                                    <td class="cab_left strlengcut" style="font-size:13px;border: 0px solid #ddd;">{{$tb_normal[$key]['descSistema']}}{{$tb_normal[$key]['descAtivo']}}{{$tb_normal[$key]['descAtividade']}}</td>
                                    <td class="cab_cent" style="border: 0px solid #ddd;">
                                      <a href = "/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/{{$tb_normal[$key]['idLaudo']}}" target="_blank" class="btn buttondg" style="background: {{$tb_normal[$key]['colorStatus']}};border-top: 1px solid {{$tb_normal[$key]['colorStatus']}};
                                                            border: 1px solid {{$tb_normal[$key]['colorStatus']}};">
                                        {{$tb_normal[$key]['idLaudo']}} TR <br> {{ date('d-m-Y', strtotime(substr($tb_normal[$key]['data'], 0, 10))) }}
                                      </a>
                                    </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-md-5ths">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
                        <div class="col-xs-3">
                            <i class="fa fa-exclamation-triangle fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 30px;">{{$alarme}}</div>
                            <div>Alarme</div>
                        </div>
                    </div>
                </div>
                <a onclick="document.getElementById('tab_alarme').style.display='block'" style="cursor: pointer;">
                    <div class="panel-footer" style="background-color:#fff;border-top:0px;">
                        <span class="pull-left" style="font-size: 13px;">Lista Equipamentos</span>
                        <span class="pull-right" style="font-size: 13px;"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <div id="tab_alarme" class="w3-modal">
                  <div class="w3-modal-content w3-animate-opacity w3-card-4">
                    <div class="w3-container">
                      <div class="panel-body" style="padding-top:45px;color:#555;">
                        <div class="row" style="margin-top: 0px;">
                          <div class="col-md-12">
                            <table id="tbl_alarme" width="100%" class="display table table-striped table-bordered table-hover" style="color:#555;margin-top:0px;margin-bottom:15px;">
                              <thead>
                                <tr style="border: 1px solid #ddd;">
                                  <th class="cab_cent"style="border: 0px solid #ddd;">Linha</th>
                                  <th class="cab_cent"style="border: 0px solid #ddd;">Descrição</th>
                                  <th class="cab_cent"style="border: 0px solid #ddd;">Laudos</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($tb_alarme as $key => $val)
                                <tr style="border: 1px solid #ddd;">
                                  <td class="cab_cent" style="border: 0px solid #ddd;">{{$tb_alarme[$key]['descNegocio']}}</td>
                                  <td class="cab_left strlengcut" style="border: 0px solid #ddd;">{{$tb_alarme[$key]['descSistema']}}{{$tb_alarme[$key]['descAtivo']}}{{$tb_alarme[$key]['descAtividade']}}</td>
                                  <td class="cab_cent" style="border: 0px solid #ddd;">
                                    <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/{{$tb_alarme[$key]['idLaudo']}}" target="_blank" class="btn buttondg"
                                        style="color:#888;background: {{$tb_alarme[$key]['colorStatus']}};border-top: 1px solid {{$tb_alarme[$key]['colorStatus']}};
                                                          border: 1px solid {{$tb_alarme[$key]['colorStatus']}};">
                                      {{$tb_alarme[$key]['idLaudo']}} TR <br> {{ date('d-m-Y', strtotime(substr($tb_alarme[$key]['data'], 0, 10))) }}
                                    </a>
                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-5ths">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
                        <div class="col-xs-3">
                            <i class="fa fa-times-circle fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 30px;">{{$critico}}</div>
                            <div>Crítico</div>
                        </div>
                    </div>
                </div>
                <a onclick="document.getElementById('tab_critico').style.display='block'" style="cursor: pointer;">
                    <div class="panel-footer" style="background-color:#fff;border-top:0px;">
                        <span class="pull-left" style="font-size: 13px;">Lista Equipamentos</span>
                        <span class="pull-right" style="font-size: 13px;"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <div id="tab_critico" class="w3-modal">
                  <div class="w3-modal-content w3-animate-opacity w3-card-4">
                    <div class="w3-container">
                      <div class="panel-body" style="padding-top:45px;color:#555;">
                        <div class="row" style="margin-top: 0px;">
                          <div class="col-md-12">
                            <table id="tbl_critico" width="100%" class="display table table-striped table-bordered table-hover" style="color:#555;margin-top:0px;margin-bottom:15px;">
                              <thead>
                                <tr style="border: 1px solid #ddd;">
                                  <th class="cab_cent"style="border: 0px solid #ddd;">Linha</th>
                                  <th class="cab_cent"style="border: 0px solid #ddd;">Descrição</th>
                                  <th class="cab_cent"style="border: 0px solid #ddd;">Laudos</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($tb_critico as $key => $val)
                                <tr style="border: 1px solid #ddd;">
                                  <td class="cab_cent" style="border: 0px solid #ddd;">{{$tb_critico[$key]['descNegocio']}}</td>
                                  <td class="cab_left strlengcut" style="border: 0px solid #ddd;">{{$tb_critico[$key]['descSistema']}}{{$tb_critico[$key]['descAtivo']}}{{$tb_critico[$key]['descAtividade']}}</td>
                                  <td class="cab_cent" style="border: 0px solid #ddd;">
                                    <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/{{$tb_critico[$key]['idLaudo']}}" target="_blank" class="btn buttondg" style="background: {{$tb_critico[$key]['colorStatus']}};border-top: 1px solid {{$tb_critico[$key]['colorStatus']}};
                                                          border: 1px solid {{$tb_critico[$key]['colorStatus']}};">
                                      {{$tb_critico[$key]['idLaudo']}} TR <br> {{ date('d-m-Y', strtotime(substr($tb_critico[$key]['data'], 0, 10))) }}
                                    </a>
                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-5ths" style="margin-top: -12px;">
              <div class="panel" style="background-color:grey; border-color:#ddd;">
                  <div class="panel-heading">
                      <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
                          <div class="col-xs-3">
                              <i class="fa fa-cog fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge" style="font-size: 30px;">{{$manutencao}}</div>
                              <div>Manutenção</div>
                          </div>
                      </div>
                  </div>
                  <a onclick="document.getElementById('tab_manutencao').style.display='block'" style="color:#777;cursor: pointer;">
                      <div class="panel-footer" style="background-color:#fff;border-top:0px;">
                          <span class="pull-left" style="font-size: 13px;">Lista Equipamentos</span>
                          <span class="pull-right" style="font-size: 13px;"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
                  <div id="tab_manutencao" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <table id="tbl_manutencao" width="100%" class="display table table-striped table-bordered table-hover" style="color:#555;margin-top:0px;margin-bottom:15px;">
                                <thead>
                                  <tr style="border: 1px solid #ddd;">
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Linha</th>
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Descrição</th>
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Laudos</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($tb_manutencao as $key => $val)
                                  <tr style="border: 1px solid #ddd;">
                                    <td class="cab_cent" style="border: 0px solid #ddd;">{{$tb_manutencao[$key]['descNegocio']}}</td>
                                    <td class="cab_left strlengcut" style="border: 0px solid #ddd;">{{$tb_manutencao[$key]['descSistema']}}{{$tb_manutencao[$key]['descAtivo']}}{{$tb_manutencao[$key]['descAtividade']}}</td>
                                    <td class="cab_cent" style="border: 0px solid #ddd;">
                                      <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/{{$tb_manutencao[$key]['idLaudo']}}" target="_blank" class="btn buttondg" style="color:#eee;background: {{$tb_manutencao[$key]['colorStatus']}};border-top: 1px solid {{$tb_manutencao[$key]['colorStatus']}};
                                                            border: 1px solid {{$tb_manutencao[$key]['colorStatus']}};">
                                        {{$tb_manutencao[$key]['idLaudo']}} TR <br> {{ date('d-m-Y', strtotime(substr($tb_manutencao[$key]['data'], 0, 10))) }}
                                      </a>

                                    </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-md-5ths" style="margin-top: -12px;">
              <div class="panel" style="background-color:#7592af; border-color:#ddd;">
                  <div class="panel-heading">
                      <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
                          <div class="col-xs-3">
                              <i class="fa fa-pause-circle fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge" style="font-size: 30px;">{{$standBy}}</div>
                              <div>Stand By</div>
                          </div>
                      </div>
                  </div>
                  <a onclick="document.getElementById('tab_standBy').style.display='block'" style="color:#7592af;cursor: pointer;">
                      <div class="panel-footer" style="background-color:#fff;border-top:0px;">
                          <span class="pull-left" style="font-size: 13px;">Lista Equipamentos</span>
                          <span class="pull-right" style="font-size: 13px;"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
                  <div id="tab_standBy" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <table id="tbl_standBy" width="100%" class="display table table-striped table-bordered table-hover" style="color:#555;margin-top:0px;margin-bottom:15px;">
                                <thead>
                                  <tr style="border: 1px solid #ddd;">
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Linha</th>
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Descrição</th>
                                    <th class="cab_cent"style="border: 0px solid #ddd;">Laudos</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($tb_standBy as $key => $val)
                                  <tr style="border: 1px solid #ddd;">
                                    <td class="cab_cent" style="border: 0px solid #ddd;">{{$tb_standBy[$key]['descNegocio']}}</td>
                                    <td class="cab_left strlengcut" style="border: 0px solid #ddd;">{{$tb_standBy[$key]['descSistema']}}{{$tb_standBy[$key]['descAtivo']}}{{$tb_standBy[$key]['descAtividade']}}</td>
                                    <td class="cab_cent" style="border: 0px solid #ddd;">
                                      <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/{{$tb_standBy[$key]['idLaudo']}}" target="_blank" class="btn buttondg" style="color:#ccc;background: {{$tb_standBy[$key]['colorStatus']}};border-top: 1px solid {{$tb_standBy[$key]['colorStatus']}};
                                                            border: 1px solid {{$tb_standBy[$key]['colorStatus']}};">
                                        {{$tb_standBy[$key]['idLaudo']}} TR <br> {{ date('d-m-Y', strtotime(substr($tb_standBy[$key]['data'], 0, 10))) }}
                                      </a>
                                    </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="row" id="slider" style="margin-bottom: 0px; margin-top: -5px;">
          <div class="col-md-6" style="margin-top:-10px;padding-right:7px;">
            <div class="panel panel-default">
              <div class="panel-body">
                <div id="g1-perfil1" class="tabcontent w3-animate-right">
                  <div id="chartdivPerfil" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div> <!-- Gráfico Perfil-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('ol_perfil').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="ol_perfil" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivPerfil_ol" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="g1-perfil2" class="tabcontent w3-animate-right">
                  <div id="chartdivPerfil2" style="margin-top:0px; margin-bottom:20px;"></div> <!-- Gráfico Perfil2-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('ol_perfil2').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="ol_perfil2" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivPerfil2_ol" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="g1-status" class="tabcontent w3-animate-right">
                  <div id="chartdivStatus" style="margin-top:0px; margin-bottom:20px;;"></div> <!-- Gráfico Status-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('ol_status').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="ol_status" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivStatus_ol" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="g1-anormalidades" class="tabcontent w3-animate-right">
                  <div id="chartdivAnormalidades" style="margin-top:0px; margin-bottom:20px;"></div> <!-- Gráfico Anormalidades-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('ol_anorm').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="ol_anorm" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivAnormalidades_ol" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="g1-problemas" class="tabcontent w3-animate-right">
                  <div id="chartdivProblemas" style="margin-top:0px; margin-bottom:20px;"></div> <!-- Gráfico Problemas Encontrados-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('ol_problem').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="ol_problem" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivProblemas_ol" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
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
          <div class="col-md-6" style="margin-top:-10px;padding-left:7px;">
            <div class="panel panel-default">
              <div class="panel-body">
                <div id="g2-perfil1" class="tabcontent w3-animate-zoom">
                  <div id="chartdivPerfil_2" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div> <!-- Gráfico Perfil 2-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('or_perfil').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="or_perfil" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivPerfil_or" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="g2-perfil2" class="tabcontent w3-animate-zoom">
                  <div id="chartdivPerfil2_2" style="margin-top:0px; margin-bottom:20px;"></div> <!-- Gráfico Perfil2 2-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('or_perfil2').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="or_perfil2" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivPerfil2_or" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="g2-status" class="tabcontent w3-animate-zoom">
                  <div id="chartdivStatus_2" style="margin-top:0px; margin-bottom:20px;"></div> <!-- Gráfico Status-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('or_status').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="or_status" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivStatus_or" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="g2-anormalidades" class="tabcontent w3-animate-zoom">
                  <div id="chartdivAnormalidades_2" style="margin-top:0px; margin-bottom:20px;"></div> <!-- Gráfico Anormalidades-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('or_anorm').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="or_anorm" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivAnormalidades_or" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="g2-problemas" class="tabcontent w3-animate-zoom">
                  <div id="chartdivProblemas_2" style="margin-top:0px; margin-bottom:20px;"></div> <!-- Gráfico Problemas Encontrados-->
                  <div class="col-md-12" style="margin-top:-10px;">
                    <div class="col-md-1 col-md-offset-10">
                      <div class="w3-container">
                        <a onclick="document.getElementById('or_problem').style.display='block'" class="w3-teal w3-riple w3-btn-floating"><i class="fa fa-expand"></i></a>
                      </div>
                    </div>
                  </div>
                  <div id="or_problem" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity w3-card-4">
                      <div class="w3-container">
                        <div class="panel-body" style="padding-top:45px;color:#555;">
                          <div class="row" style="margin-top: 0px;">
                            <div class="col-md-12">
                              <div id="chartdivProblemas_or" style="margin-top:0px;margin-bottom:20px;cursor: pointer;"></div>
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
        <div class="row" id="menu" style="margin-bottom: 0px; margin-top: -5px;cursor: pointer;">
          <div class="col-md-12 tab">
            <div class="panel panel-default">
              <div class="panel-body">
                <button class="col-md-5ths tablinks" style="padding:10px;" onclick="openCity(event, 'perfil1')" id="perfil1">
                  <h7 style="color:#555;">Perfil das Linhas</h7>
                  <div id="menuchartdivPerfil" style="cursor: pointer;"></div>
                </button>
                <button class="col-md-5ths tablinks" style="padding:10px;" onclick="openCity(event, 'perfil2')" id="perfil2">
                  <h7 style="color:#555;">Perfil [Alarme e Crítico]</h7>
                  <div id="menuchartdivPerfil2"></div>
                </button>
                <button class="col-md-5ths tablinks" style="padding:10px;" onclick="openCity(event, 'status')" id="status">
                  <h7 style="color:#555;">Status dos Pontos</h7>
                  <div id="menuchartdivStatus"></div>
                </button>
                <button class="col-md-5ths tablinks" style="padding:10px;" onclick="openCity(event, 'anormalidades')" id="anormalidades">
                  <h7 style="color:#555;">Anormalidades</h7>
                  <div id="menuchartdivAnormalidades"></div>
                </button>
                <button class="col-md-5ths tablinks" style="padding:10px;" onclick="openCity(event, 'problemas')" id="problemas">
                  <h7 style="color:#555;">Problemas Encontrados</h7>
                  <div id="menuchartdivProblemas"></div>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="row" id="tb" style="margin-top:0px;margin-bottom:15px;">
          <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading cab_cent" style="font-size:18px">
                    Equipamentos com Anormalidades Registradas [Status em Alarme ou Crítico]
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" style="color:#555;">
                  <div class="row" style="margin-top:0px;margin-bottom:15px;">
                    <div class="col-md-12">
                      <table id="tb_anormalidades" width="100%" class="display table table-striped table-bordered table-hover" style="color:#555;margin-top:0px;margin-bottom:15px;">
                        <thead>
                          <tr style="border: 1px solid #ddd;">
                            <th class="cab_cent"style="border: 0px solid #ddd;">Linha</th>
                            <th class="cab_cent"style="border: 0px solid #ddd;">Descrição</th>
                            <th class="cab_cent"style="border: 0px solid #ddd;">Laudos</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tb_anormalidades as $key => $val)
                          <tr style="border: 1px solid #ddd;">
                            <td class="cab_cent" style="border: 0px solid #ddd;">{{$tb_anormalidades[$key]['descNegocio']}}</td>
                            <td class="cab_left" style="border: 0px solid #ddd;">{{$tb_anormalidades[$key]['descSistema']}}{{$tb_anormalidades[$key]['descAtivo']}}{{$tb_anormalidades[$key]['descAtividade']}}</td>
                            <td class="cab_cent" style="border: 0px solid #ddd;">
                              <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/{{$tb_anormalidades[$key]['idLaudo']}}" target="_blank" class="btn buttondg" style="color:#888;background: {{$tb_anormalidades[$key]['colorStatus']}};border-top: 1px solid {{$tb_anormalidades[$key]['colorStatus']}};
                                                    border: 1px solid {{$tb_anormalidades[$key]['colorStatus']}};">
                                {{$tb_anormalidades[$key]['idLaudo']}} TR <br> {{ date('d-m-Y', strtotime(substr($tb_anormalidades[$key]['data'], 0, 10))) }}
                              </a>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                      </table>
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


<script>
var aux1 = "perfil1";
var aux2 = "perfil2";
var g1 = "g1-";
var g2 = "g2-";
function openCity(evt, cityName) {
//declarando todas as vari�veis
var i, tabcontent, tablinks;
var a1 = g1.concat(aux1);
var b1 = g2.concat(aux2);

//pega todos os elementos da class="tabcontent" e hide eles
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
  tabcontent[i].style.display = "none";
}
//pega todos os elementos da class="tablinks" e remove a class do css active
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
  tablinks[i].className = tablinks[i].className.replace(" active", "");
}
//mostra a tab atual e adiciona um "active" na classe do botao que abriu a tab
aux1 = aux2;
aux2 = cityName;
var a1 = g1.concat(aux1);
var b1 = g2.concat(aux2);
document.getElementById(a1).style.display = "block";
document.getElementById(b1).style.display = "block";
evt.currentTarget.className += " active";

}
document.getElementById(g1.concat(aux1)).style.display = "block";
document.getElementById(g2.concat(aux2)).style.display = "block";
// pega o elemento com o id="aux1" e com o id="aux2" e clica nele
//document.getElementById(aux1).click();
//document.getElementById(aux2).click();
</script>

<!-- Chart code Perfil-->
<script>
var chart;
var legend;
var selected;

var types = [{
type: "Normal",
percent: {!!$normal!!},
color: "#2d9b1a",
subs: [{
  type: "URA",
  percent: {!!$ura_normal!!}
}, {
  type: "LDS",
  percent: {!!$lds_normal!!}
}, {
  type: "LGC",
  percent: {!!$lgc_normal!!}
}, {
  type: "LPC",
  percent: {!!$lpc_normal!!}
}]
},{
type: "Alarme",
percent: {!!$alarme!!},
color: "#FCD202",
subs: [{
  type: "URA",
  percent: {!!$ura_alarme!!}
}, {
  type: "LDS",
  percent: {!!$lds_alarme!!}
}, {
  type: "LGC",
  percent: {!!$lgc_alarme!!}
}, {
  type: "LPC",
  percent: {!!$lpc_alarme!!}
}]
},{
type: "Crítico",
percent: {!!$critico!!},
color: "#db1111",
subs: [{
  type: "URA",
  percent: {!!$ura_critico!!}
}, {
  type: "LDS",
  percent: {!!$lds_critico!!}
}, {
  type: "LGC",
  percent: {!!$lgc_critico!!}
}, {
  type: "LPC",
  percent: {!!$lpc_critico!!}
}]
}];

function generateChartData() {
var chartData = [];
for (var i = 0; i < types.length; i++) {
  if (i == selected) {
    for (var x = 0; x < types[i].subs.length; x++) {
      chartData.push({
        type: types[i].subs[x].type,
        percent: types[i].subs[x].percent,
        color: types[i].color,
        pulled: true
      });
    }
  } else {
    chartData.push({
      type: types[i].type,
      percent: types[i].percent,
      color: types[i].color,
      id: i
    });
  }
}
return chartData;
}

AmCharts.makeChart("chartdivPerfil", {
"type": "pie",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Perfil das Linhas",
"size": 15
}],
"dataProvider": generateChartData(),
"labelText": "[[title]]: [[value]]",
"balloonText": "[[title]]: [[value]]",
"titleField": "type",
"valueField": "percent",
"outlineColor": "#FFFFFF",
"outlineAlpha": 0.8,
"outlineThickness": 2,
"colorField": "color",
"pulledField": "pulled",
"depth3D": 15,
"angle": 30,
"listeners": [{
  "event": "clickSlice",
  "method": function(event) {
    var chart = event.chart;
    if (event.dataItem.dataContext.id != undefined) {
      selected = event.dataItem.dataContext.id;
    } else {
      selected = undefined;
    }
    chart.dataProvider = generateChartData();
    chart.validateData();
  }
}],
"export": {
  "enabled": true
}
});
AmCharts.makeChart("chartdivPerfil_ol", {
"type": "pie",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Perfil das Linhas",
"size": 15
}],
"dataProvider": generateChartData(),
"labelText": "[[title]]: [[value]]",
"balloonText": "[[title]]: [[value]]",
"titleField": "type",
"valueField": "percent",
"outlineColor": "#FFFFFF",
"outlineAlpha": 0.8,
"outlineThickness": 2,
"colorField": "color",
"pulledField": "pulled",
"depth3D": 15,
"angle": 30,
"listeners": [{
  "event": "clickSlice",
  "method": function(event) {
    var chart = event.chart;
    if (event.dataItem.dataContext.id != undefined) {
      selected = event.dataItem.dataContext.id;
    } else {
      selected = undefined;
    }
    chart.dataProvider = generateChartData();
    chart.validateData();
  }
}],
"export": {
  "enabled": true
}
});
AmCharts.makeChart("chartdivPerfil_or", {
"type": "pie",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Perfil das Linhas",
"size": 15
}],
"dataProvider": generateChartData(),
"labelText": "[[title]]: [[value]]",
"balloonText": "[[title]]: [[value]]",
"titleField": "type",
"valueField": "percent",
"outlineColor": "#FFFFFF",
"outlineAlpha": 0.8,
"outlineThickness": 2,
"colorField": "color",
"pulledField": "pulled",
"depth3D": 15,
"angle": 30,
"listeners": [{
  "event": "clickSlice",
  "method": function(event) {
    var chart = event.chart;
    if (event.dataItem.dataContext.id != undefined) {
      selected = event.dataItem.dataContext.id;
    } else {
      selected = undefined;
    }
    chart.dataProvider = generateChartData();
    chart.validateData();
  }
}],
"export": {
  "enabled": true
}
});
</script>

<script>
<!--// Chart code Perfil2-->
var chart = AmCharts.makeChart("chartdivPerfil2", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Perfil das Linhas [Alarme e Crítico]",
"size": 15
}],
"fillColorsField": "colors",
"dataProvider": [{
    "status": "Alarme",
   "lineColor": "#9e823d",
    "ura": {!!$ura_alarme!!},
    "lds": {!!$lds_alarme!!},
    "lgc": {!!$lgc_alarme!!},
    "lpc": {!!$lpc_alarme!!}
}, {
    "status": "Crítico",
    "lineColor":"#db1111",
    "ura": {!!$ura_critico!!},
    "lds": {!!$lds_critico!!},
    "lgc": {!!$lgc_critico!!},
    "lpc": {!!$lpc_critico!!}
}],
"valueAxes": [{
    "stackType": "regular",
    "axisAlpha": 0.3,
    "gridAlpha": 0
}],
"graphs": [{
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[title]]: [[value]]",
    "lineAlpha": 0.3,
    "title": "URA",
    "type": "column",
    "color": "#000000",
   "lineColor": "#b59a6c",
    "valueField": "ura"
}, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[title]]: [[value]]",
    "lineAlpha": 0.3,
    "title": "LDS",
    "type": "column",
    "color": "#000000",
   "lineColor": "#b57f6c",
    "valueField": "lds"
}, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[title]]: [[value]]",
    "lineAlpha": 0.3,
    "title": "LRF",
    "type": "column",
    "color": "#000000",
   "lineColor": "#aeb56c",
    "valueField": "lrf"
}, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[title]]: [[value]]",
    "lineAlpha": 0.3,
    "title": "LGC",
    "type": "column",
    "color": "#000000",
   "lineColor": "#6c9bb5",
    "valueField": "lgc"
}, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[title]]: [[value]]",
    "lineAlpha": 0.3,
    "title": "LPC",
    "type": "column",
    "color": "#000000",
   "lineColor": "#6c7fb5",
    "valueField": "lpc"
}, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[title]]: [[value]]",
    "lineAlpha": 0.3,
    "title": "CS",
    "type": "column",
    "color": "#000000",
   "lineColor": "#836cb5",
    "valueField": "cs"
}, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[title]]: [[value]]",
    "lineAlpha": 0.3,
    "title": "PR",
    "type": "column",
    "color": "#000000",
   "lineColor": "#9e8200",
    "valueField": "pr"
}],
"categoryField": "status",
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
<script>
<!--// Chart code Perfil2_ol-->
var chart = AmCharts.makeChart("chartdivPerfil2_ol", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Perfil das Linhas [Alarme e Crítico]",
"size": 15
}],
"fillColorsField": "colors",
"dataProvider": [{
    "status": "Alarme",
   "lineColor": "#9e823d",
    "ura": {!!$ura_alarme!!},
    "lds": {!!$lds_alarme!!},
    "lgc": {!!$lgc_alarme!!},
    "lpc": {!!$lpc_alarme!!}
}, {
    "status": "Crítico",
    "lineColor":"#db1111",
    "ura": {!!$ura_critico!!},
    "lds": {!!$lds_critico!!},
    "lgc": {!!$lgc_critico!!},
    "lpc": {!!$lpc_critico!!}
}],
"valueAxes": [{
    "stackType": "regular",
    "axisAlpha": 0.3,
    "gridAlpha": 0
}],
"graphs": [{
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "URA",
  "type": "column",
  "color": "#000000",
 "lineColor": "#b59a6c",
  "valueField": "ura"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LDS",
  "type": "column",
  "color": "#000000",
 "lineColor": "#b57f6c",
  "valueField": "lds"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LRF",
  "type": "column",
  "color": "#000000",
 "lineColor": "#aeb56c",
  "valueField": "lrf"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LGC",
  "type": "column",
  "color": "#000000",
 "lineColor": "#6c9bb5",
  "valueField": "lgc"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LPC",
  "type": "column",
  "color": "#000000",
 "lineColor": "#6c7fb5",
  "valueField": "lpc"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "CS",
  "type": "column",
  "color": "#000000",
 "lineColor": "#836cb5",
  "valueField": "cs"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "PR",
  "type": "column",
  "color": "#000000",
 "lineColor": "#9e8200",
  "valueField": "pr"
}],
"categoryField": "status",
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
<script>
<!--// Chart code Perfil2_or-->
var chart = AmCharts.makeChart("chartdivPerfil2_or", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Perfil das Linhas [Alarme e Crítico]",
"size": 15
}],
"fillColorsField": "colors",
"dataProvider": [{
    "status": "Alarme",
   "lineColor": "#9e823d",
    "ura": {!!$ura_alarme!!},
    "lds": {!!$lds_alarme!!},
    "lgc": {!!$lgc_alarme!!},
    "lpc": {!!$lpc_alarme!!}
}, {
    "status": "Crítico",
    "lineColor":"#db1111",
    "ura": {!!$ura_critico!!},
    "lds": {!!$lds_critico!!},
    "lgc": {!!$lgc_critico!!},
    "lpc": {!!$lpc_critico!!}
}],
"valueAxes": [{
    "stackType": "regular",
    "axisAlpha": 0.3,
    "gridAlpha": 0
}],
"graphs": [{
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "URA",
  "type": "column",
  "color": "#000000",
 "lineColor": "#b59a6c",
  "valueField": "ura"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LDS",
  "type": "column",
  "color": "#000000",
 "lineColor": "#b57f6c",
  "valueField": "lds"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LRF",
  "type": "column",
  "color": "#000000",
 "lineColor": "#aeb56c",
  "valueField": "lrf"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LGC",
  "type": "column",
  "color": "#000000",
 "lineColor": "#6c9bb5",
  "valueField": "lgc"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LPC",
  "type": "column",
  "color": "#000000",
 "lineColor": "#6c7fb5",
  "valueField": "lpc"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "CS",
  "type": "column",
  "color": "#000000",
 "lineColor": "#836cb5",
  "valueField": "cs"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "PR",
  "type": "column",
  "color": "#000000",
 "lineColor": "#9e8200",
  "valueField": "pr"
}],
"categoryField": "status",
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

<!-- Chart code Status dos Pontos-->
<script>
var chartData = [{
"date": {!! json_encode($atual12) !!},
"normal": {!! json_encode($normal12) !!},
"alarme": {!! json_encode($alarme12) !!},
"critico": {!! json_encode($critico12) !!},
},{
"date": {!! json_encode($atual11) !!},
"normal": {!! json_encode($normal11) !!},
"alarme": {!! json_encode($alarme11) !!},
"critico": {!! json_encode($critico11) !!},
},{
"date": {!! json_encode($atual10) !!},
"normal": {!! json_encode($normal10) !!},
"alarme": {!! json_encode($alarme10) !!},
"critico": {!! json_encode($critico10) !!},
},{
"date": {!! json_encode($atual9) !!},
"normal": {!! json_encode($normal9) !!},
"alarme": {!! json_encode($alarme9) !!},
"critico": {!! json_encode($critico9) !!},
},{
"date": {!! json_encode($atual8) !!},
"normal": {!! json_encode($normal8) !!},
"alarme": {!! json_encode($alarme8) !!},
"critico": {!! json_encode($critico8) !!},
},{
"date": {!! json_encode($atual7) !!},
"normal": {!! json_encode($normal7) !!},
"alarme": {!! json_encode($alarme7) !!},
"critico": {!! json_encode($critico7) !!},
},{
"date": {!! json_encode($atual6) !!},
"normal": {!! json_encode($normal6) !!},
"alarme": {!! json_encode($alarme6) !!},
"critico": {!! json_encode($critico6) !!},
},{
"date": {!! json_encode($atual5) !!},
"normal": {!! json_encode($normal5) !!},
"alarme": {!! json_encode($alarme5) !!},
"critico": {!! json_encode($critico5) !!},
},{
"date": {!! json_encode($atual4) !!},
"normal": {!! json_encode($normal4) !!},
"alarme": {!! json_encode($alarme4) !!},
"critico": {!! json_encode($critico4) !!},
},{
"date": {!! json_encode($atual3) !!},
"normal": {!! json_encode($normal3) !!},
"alarme": {!! json_encode($alarme3) !!},
"critico": {!! json_encode($critico3) !!},
},{
"date": {!! json_encode($atual2) !!},
"normal": {!! json_encode($normal2) !!},
"alarme": {!! json_encode($alarme2) !!},
"critico": {!! json_encode($critico2) !!},
},{
"date": {!! json_encode($atual1) !!},
"normal": {!! json_encode($normal1) !!},
"alarme": {!! json_encode($alarme1) !!},
"critico": {!! json_encode($critico1) !!}
}];

var chart = AmCharts.makeChart("chartdivStatus", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Status dos Pontos",
"size": 15
}],
"legend": {
  "useGraphSettings": true
},
"dataProvider": chartData,
"synchronizeGrid":true,
"graphs": [ {
  "valueAxis": "v3",
  "lineColor": "#FCD202",
  "bullet": "triangleUp",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Alarme",
  "labelText": "[[value]]",
  "valueField": "alarme",
  "fillAlphas": 0
}, {
  "valueAxis": "v1",
  "lineColor": "#db1111",
  "bullet": "round",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Crítico",
  "labelText": "[[value]]",
  "valueField": "critico",
  "fillAlphas": 0
}, {
  "valueAxis": "v2",
  "lineColor": "#2d9b1a",
  "bullet": "square",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Normal",
  "labelText": "[[value]]",
  "valueField": "normal",
  "fillAlphas": 0
}],
"chartScrollbar": {},
"chartCursor": {
  "cursorPosition": "mouse",
  "valueBalloonsEnabled": true,
  "avoidBalloonOverlapping": true,
  "categoryBalloonDateFormat": 'MMM YYYY',
  "LeaveAfterTouch": true,
},
"categoryField": "date",
"categoryAxis": {
  "parseDates": true,
  "axisColor": "#DADADA",
  "minorGridEnabled": true
}
});
var chart = AmCharts.makeChart("chartdivStatus_ol", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Status dos Pontos",
"size": 15
}],
"legend": {
  "useGraphSettings": true
},
"dataProvider": chartData,
"synchronizeGrid":true,
"graphs": [ {
  "valueAxis": "v3",
  "lineColor": "#FCD202",
  "bullet": "triangleUp",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Alarme",
  "labelText": "[[value]]",
  "valueField": "alarme",
  "fillAlphas": 0
}, {
  "valueAxis": "v1",
  "lineColor": "#db1111",
  "bullet": "round",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Crítico",
  "labelText": "[[value]]",
  "valueField": "critico",
  "fillAlphas": 0
}, {
  "valueAxis": "v2",
  "lineColor": "#2d9b1a",
  "bullet": "square",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Normal",
  "labelText": "[[value]]",
  "valueField": "normal",
  "fillAlphas": 0
}],
"chartScrollbar": {},
"chartCursor": {
  "cursorPosition": "mouse",
  "valueBalloonsEnabled": true,
  "avoidBalloonOverlapping": true,
  "categoryBalloonDateFormat": 'MMM YYYY',
  "LeaveAfterTouch": true,
},
"categoryField": "date",
"categoryAxis": {
  "parseDates": true,
  "axisColor": "#DADADA",
  "minorGridEnabled": true
}
});
var chart = AmCharts.makeChart("chartdivStatus_or", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Status dos Pontos",
"size": 15
}],
"legend": {
  "useGraphSettings": true
},
"dataProvider": chartData,
"synchronizeGrid":true,
"graphs": [ {
  "valueAxis": "v3",
  "lineColor": "#FCD202",
  "bullet": "triangleUp",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Alarme",
  "labelText": "[[value]]",
  "valueField": "alarme",
  "fillAlphas": 0
}, {
  "valueAxis": "v1",
  "lineColor": "#db1111",
  "bullet": "round",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Crítico",
  "labelText": "[[value]]",
  "valueField": "critico",
  "fillAlphas": 0
}, {
  "valueAxis": "v2",
  "lineColor": "#2d9b1a",
  "bullet": "square",
  "bulletBorderThickness": 1,
  "hideBulletsCount": 30,
  "title": "Normal",
  "labelText": "[[value]]",
  "valueField": "normal",
  "fillAlphas": 0
}],
"chartScrollbar": {},
"chartCursor": {
  "cursorPosition": "mouse",
  "valueBalloonsEnabled": true,
  "avoidBalloonOverlapping": true,
  "categoryBalloonDateFormat": 'MMM YYYY',
  "LeaveAfterTouch": true,
},
"categoryField": "date",
"categoryAxis": {
  "parseDates": true,
  "axisColor": "#DADADA",
  "minorGridEnabled": true
}
});
</script>
<!-- Chart code Anormalidades-->
<script>
var chart = AmCharts.makeChart("chartdivAnormalidades", {
"theme": "light",
"type": "serial",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Anormalidades(%) [Alarme e Crítico]",
"size": 15
}],
"dataProvider": [{
"periodo": {!! json_encode($atualf12) !!},
"alarme": {!! $alarme12_anorm !!},
"critico": {!! $critico12_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
},{
"periodo": {!! json_encode($atualf11) !!},
"alarme": {!! $alarme11_anorm !!},
"critico": {!! $critico11_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf10) !!},
"alarme": {!! $alarme10_anorm !!},
"critico": {!! $critico10_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf9) !!},
"alarme": {!! $alarme9_anorm !!},
"critico": {!! $critico9_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf8) !!},
"alarme": {!! $alarme8_anorm !!},
"critico": {!! $critico8_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf7) !!},
"alarme": {!! $alarme7_anorm !!},
"critico": {!! $critico7_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf6) !!},
"alarme": {!! $alarme6_anorm !!},
"critico": {!! $critico6_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf5) !!},
"alarme": {!! $alarme5_anorm !!},
"critico": {!! $critico5_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf4) !!},
"alarme": {!! $alarme4_anorm !!},
"critico": {!! $critico4_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf3) !!},
"alarme": {!! $alarme3_anorm !!},
"critico": {!! $critico3_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf2) !!},
"alarme": {!! $alarme2_anorm !!},
"critico": {!! $critico2_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf1) !!},
"alarme": {!! $alarme1_anorm !!},
"critico": {!! $critico1_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}],
"valueAxes": [{
"unit": "%",
"position": "left",
"title": "Status",
}],
"startDuration": 1,
"graphs": [{
"balloonText": "Alarme: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "alarme",
"labelText": "[[value]]%",
"type": "column",
"valueField": "alarme",
"colorField": "color"
}, {
"balloonText": "Crítico: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "critico",
"labelText": "[[value]]%",
"type": "column",
"clustered":false,
"columnWidth":0.5,
"valueField": "critico",
"colorField": "colorCr"
}],
"plotAreaFillAlphas": 0.1,
"categoryField": "periodo",
"categoryAxis": {
"gridPosition": "start"
},
"export": {
"enabled": true
}
});
var chart = AmCharts.makeChart("chartdivAnormalidades_ol", {
"theme": "light",
"type": "serial",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Anormalidades(%) [Alarme e Crítico]",
"size": 15
}],
"dataProvider": [{
"periodo": {!! json_encode($atualf12) !!},
"alarme": {!! $alarme12_anorm !!},
"critico": {!! $critico12_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
},{
"periodo": {!! json_encode($atualf11) !!},
"alarme": {!! $alarme11_anorm !!},
"critico": {!! $critico11_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf10) !!},
"alarme": {!! $alarme10_anorm !!},
"critico": {!! $critico10_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf9) !!},
"alarme": {!! $alarme9_anorm !!},
"critico": {!! $critico9_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf8) !!},
"alarme": {!! $alarme8_anorm !!},
"critico": {!! $critico8_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf7) !!},
"alarme": {!! $alarme7_anorm !!},
"critico": {!! $critico7_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf6) !!},
"alarme": {!! $alarme6_anorm !!},
"critico": {!! $critico6_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf5) !!},
"alarme": {!! $alarme5_anorm !!},
"critico": {!! $critico5_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf4) !!},
"alarme": {!! $alarme4_anorm !!},
"critico": {!! $critico4_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf3) !!},
"alarme": {!! $alarme3_anorm !!},
"critico": {!! $critico3_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf2) !!},
"alarme": {!! $alarme2_anorm !!},
"critico": {!! $critico2_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf1) !!},
"alarme": {!! $alarme1_anorm !!},
"critico": {!! $critico1_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}],
"valueAxes": [{
"unit": "%",
"position": "left",
"title": "Status",
}],
"startDuration": 1,
"graphs": [{
"balloonText": "Alarme: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "alarme",
"labelText": "[[value]]%",
"type": "column",
"valueField": "alarme",
"colorField": "color"
}, {
"balloonText": "Crítico: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "critico",
"labelText": "[[value]]%",
"type": "column",
"clustered":false,
"columnWidth":0.5,
"valueField": "critico",
"colorField": "colorCr"
}],
"plotAreaFillAlphas": 0.1,
"categoryField": "periodo",
"categoryAxis": {
"gridPosition": "start"
},
"export": {
"enabled": true
}
});
var chart = AmCharts.makeChart("chartdivAnormalidades_or", {
"theme": "light",
"type": "serial",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Anormalidades(%) [Alarme e Crítico]",
"size": 15
}],
"dataProvider": [{
"periodo": {!! json_encode($atualf12) !!},
"alarme": {!! $alarme12_anorm !!},
"critico": {!! $critico12_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
},{
"periodo": {!! json_encode($atualf11) !!},
"alarme": {!! $alarme11_anorm !!},
"critico": {!! $critico11_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf10) !!},
"alarme": {!! $alarme10_anorm !!},
"critico": {!! $critico10_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf9) !!},
"alarme": {!! $alarme9_anorm !!},
"critico": {!! $critico9_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf8) !!},
"alarme": {!! $alarme8_anorm !!},
"critico": {!! $critico8_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf7) !!},
"alarme": {!! $alarme7_anorm !!},
"critico": {!! $critico7_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf6) !!},
"alarme": {!! $alarme6_anorm !!},
"critico": {!! $critico6_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf5) !!},
"alarme": {!! $alarme5_anorm !!},
"critico": {!! $critico5_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf4) !!},
"alarme": {!! $alarme4_anorm !!},
"critico": {!! $critico4_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf3) !!},
"alarme": {!! $alarme3_anorm !!},
"critico": {!! $critico3_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf2) !!},
"alarme": {!! $alarme2_anorm !!},
"critico": {!! $critico2_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf1) !!},
"alarme": {!! $alarme1_anorm !!},
"critico": {!! $critico1_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}],
"valueAxes": [{
"unit": "%",
"position": "left",
"title": "Status",
}],
"startDuration": 1,
"graphs": [{
"balloonText": "Alarme: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "alarme",
"labelText": "[[value]]%",
"type": "column",
"valueField": "alarme",
"colorField": "color"
}, {
"balloonText": "Crítico: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "critico",
"labelText": "[[value]]%",
"type": "column",
"clustered":false,
"columnWidth":0.5,
"valueField": "critico",
"colorField": "colorCr"
}],
"plotAreaFillAlphas": 0.1,
"categoryField": "periodo",
"categoryAxis": {
"gridPosition": "start"
},
"export": {
"enabled": true
}
});
</script>

<!-- Chart code Problemas Encontrados-->
<script>
var chart = AmCharts.makeChart("chartdivProblemas", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Problemas Encontrados",
"size": 15,
}],
"legend": {
"useGraphSettings": true,
"Columns": 4,
"position": "bottom",
"markerSize": 10,
"marginTop": 0,
"marginBottom": 0,
"verticalGap": 1,
"horizontalGap": 1,
"valueWidth": 1,
},
"dataProvider": [{
  "mes": {!! json_encode($atualf12) !!},
  "trincas": {!! $trincas12 !!},
  "faltaIsolamento": {!! $faltaIsolamento12 !!},
  "faltaRefrigera": {!! $faltaRefrigera12 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera12 !!},
  },{
  "mes": {!! json_encode($atualf11) !!},
  "trincas": {!! $trincas11 !!},
  "faltaIsolamento": {!! $faltaIsolamento11 !!},
  "faltaRefrigera": {!! $faltaRefrigera11 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera11 !!},
  },{
  "mes": {!! json_encode($atualf10) !!},
  "trincas": {!! $trincas10 !!},
  "faltaIsolamento": {!! $faltaIsolamento10 !!},
  "faltaRefrigera": {!! $faltaRefrigera10 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera10 !!},
  },{
  "mes": {!! json_encode($atualf9) !!},
  "trincas": {!! $trincas9 !!},
  "faltaIsolamento": {!! $faltaIsolamento9 !!},
  "faltaRefrigera": {!! $faltaRefrigera9 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera9 !!},
  },{
  "mes": {!! json_encode($atualf8) !!},
  "trincas": {!! $trincas8 !!},
  "faltaIsolamento": {!! $faltaIsolamento8 !!},
  "faltaRefrigera": {!! $faltaRefrigera8 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera8 !!},
  },{
  "mes": {!! json_encode($atualf7) !!},
  "trincas": {!! $trincas7 !!},
  "faltaIsolamento": {!! $faltaIsolamento7 !!},
  "faltaRefrigera": {!! $faltaRefrigera7 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera7 !!},
  },{
  "mes": {!! json_encode($atualf6) !!},
  "trincas": {!! $trincas6 !!},
  "faltaIsolamento": {!! $faltaIsolamento6 !!},
  "faltaRefrigera": {!! $faltaRefrigera6 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera6 !!},
  },{
  "mes": {!! json_encode($atualf5) !!},
  "trincas": {!! $trincas5 !!},
  "faltaIsolamento": {!! $faltaIsolamento5 !!},
  "faltaRefrigera": {!! $faltaRefrigera5 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera5 !!},
  },{
  "mes": {!! json_encode($atualf4) !!},
  "trincas": {!! $trincas4 !!},
  "faltaIsolamento": {!! $faltaIsolamento4 !!},
  "faltaRefrigera": {!! $faltaRefrigera4 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera4 !!},
  },{
  "mes": {!! json_encode($atualf3) !!},
  "trincas": {!! $trincas3 !!},
  "faltaIsolamento": {!! $faltaIsolamento3 !!},
  "faltaRefrigera": {!! $faltaRefrigera3 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera3 !!},
  },{
  "mes": {!! json_encode($atualf2) !!},
  "trincas": {!! $trincas2 !!},
  "faltaIsolamento": {!! $faltaIsolamento2 !!},
  "faltaRefrigera": {!! $faltaRefrigera2 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera2 !!},
  },{
  "mes": {!! json_encode($atualf1) !!},
  "trincas": {!! $trincas1 !!},
  "faltaIsolamento": {!! $faltaIsolamento1 !!},
  "faltaRefrigera": {!! $faltaRefrigera1 !!},
  "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera1 !!},
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
    "title": "Trincas",
    "type": "column",
     "color": "#000000",
    "lineColor": "#859e3d",
    "valueField": "trincas"
}, {
    "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Falta de Isolamento",
    "type": "column",
     "color": "#000000",
    "lineColor": "#555555",
    "valueField": "faltaIsolamento"
}, {
    "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Falta de Refrigeração",
    "type": "column",
     "color": "#000000",
    "lineColor": "#5a3d9e",
    "valueField": "faltaRefrigera"
}, {
    "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Trincas/Falta de Isolamento",
    "type": "column",
     "color": "#000000",
    "lineColor": "#3d9e8e",
    "valueField": "trincaFaltaRefrigera"
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
var chart = AmCharts.makeChart("chartdivProblemas_ol", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Problemas Encontrados",
"size": 15,
}],
"legend": {
"useGraphSettings": true,
"Columns": 4,
"position": "bottom",
"markerSize": 10,
"marginTop": 0,
"marginBottom": 0,
"verticalGap": 1,
"horizontalGap": 1,
"valueWidth": 1,
},
"dataProvider": [{
 "mes": {!! json_encode($atualf12) !!},
 "trincas": {!! $trincas12 !!},
 "faltaIsolamento": {!! $faltaIsolamento12 !!},
 "faltaRefrigera": {!! $faltaRefrigera12 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera12 !!},
},{
 "mes": {!! json_encode($atualf11) !!},
 "trincas": {!! $trincas11 !!},
 "faltaIsolamento": {!! $faltaIsolamento11 !!},
 "faltaRefrigera": {!! $faltaRefrigera11 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera11 !!},
},{
 "mes": {!! json_encode($atualf10) !!},
 "trincas": {!! $trincas10 !!},
 "faltaIsolamento": {!! $faltaIsolamento10 !!},
 "faltaRefrigera": {!! $faltaRefrigera10 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera10 !!},
},{
 "mes": {!! json_encode($atualf9) !!},
 "trincas": {!! $trincas9 !!},
 "faltaIsolamento": {!! $faltaIsolamento9 !!},
 "faltaRefrigera": {!! $faltaRefrigera9 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera9 !!},
},{
 "mes": {!! json_encode($atualf8) !!},
 "trincas": {!! $trincas8 !!},
 "faltaIsolamento": {!! $faltaIsolamento8 !!},
 "faltaRefrigera": {!! $faltaRefrigera8 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera8 !!},
},{
 "mes": {!! json_encode($atualf7) !!},
 "trincas": {!! $trincas7 !!},
 "faltaIsolamento": {!! $faltaIsolamento7 !!},
 "faltaRefrigera": {!! $faltaRefrigera7 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera7 !!},
},{
 "mes": {!! json_encode($atualf6) !!},
 "trincas": {!! $trincas6 !!},
 "faltaIsolamento": {!! $faltaIsolamento6 !!},
 "faltaRefrigera": {!! $faltaRefrigera6 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera6 !!},
},{
 "mes": {!! json_encode($atualf5) !!},
 "trincas": {!! $trincas5 !!},
 "faltaIsolamento": {!! $faltaIsolamento5 !!},
 "faltaRefrigera": {!! $faltaRefrigera5 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera5 !!},
},{
 "mes": {!! json_encode($atualf4) !!},
 "trincas": {!! $trincas4 !!},
 "faltaIsolamento": {!! $faltaIsolamento4 !!},
 "faltaRefrigera": {!! $faltaRefrigera4 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera4 !!},
},{
 "mes": {!! json_encode($atualf3) !!},
 "trincas": {!! $trincas3 !!},
 "faltaIsolamento": {!! $faltaIsolamento3 !!},
 "faltaRefrigera": {!! $faltaRefrigera3 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera3 !!},
},{
 "mes": {!! json_encode($atualf2) !!},
 "trincas": {!! $trincas2 !!},
 "faltaIsolamento": {!! $faltaIsolamento2 !!},
 "faltaRefrigera": {!! $faltaRefrigera2 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera2 !!},
},{
 "mes": {!! json_encode($atualf1) !!},
 "trincas": {!! $trincas1 !!},
 "faltaIsolamento": {!! $faltaIsolamento1 !!},
 "faltaRefrigera": {!! $faltaRefrigera1 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera1 !!},
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
   "title": "Trincas",
   "type": "column",
    "color": "#000000",
   "lineColor": "#859e3d",
   "valueField": "trincas"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Falta de Isolamento",
   "type": "column",
    "color": "#000000",
   "lineColor": "#555555",
   "valueField": "faltaIsolamento"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Falta de Refrigeração",
   "type": "column",
    "color": "#000000",
   "lineColor": "#5a3d9e",
   "valueField": "faltaRefrigera"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Trincas/Falta de Isolamento",
   "type": "column",
    "color": "#000000",
   "lineColor": "#3d9e8e",
   "valueField": "trincaFaltaRefrigera"
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
var chart = AmCharts.makeChart("chartdivProblemas_or", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Problemas Encontrados",
"size": 15,
}],
"legend": {
"useGraphSettings": true,
"Columns": 4,
"position": "bottom",
"markerSize": 10,
"marginTop": 0,
"marginBottom": 0,
"verticalGap": 1,
"horizontalGap": 1,
"valueWidth": 1,
},
"dataProvider": [{
 "mes": {!! json_encode($atualf12) !!},
 "trincas": {!! $trincas12 !!},
 "faltaIsolamento": {!! $faltaIsolamento12 !!},
 "faltaRefrigera": {!! $faltaRefrigera12 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera12 !!},
},{
 "mes": {!! json_encode($atualf11) !!},
 "trincas": {!! $trincas11 !!},
 "faltaIsolamento": {!! $faltaIsolamento11 !!},
 "faltaRefrigera": {!! $faltaRefrigera11 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera11 !!},
},{
 "mes": {!! json_encode($atualf10) !!},
 "trincas": {!! $trincas10 !!},
 "faltaIsolamento": {!! $faltaIsolamento10 !!},
 "faltaRefrigera": {!! $faltaRefrigera10 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera10 !!},
},{
 "mes": {!! json_encode($atualf9) !!},
 "trincas": {!! $trincas9 !!},
 "faltaIsolamento": {!! $faltaIsolamento9 !!},
 "faltaRefrigera": {!! $faltaRefrigera9 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera9 !!},
},{
 "mes": {!! json_encode($atualf8) !!},
 "trincas": {!! $trincas8 !!},
 "faltaIsolamento": {!! $faltaIsolamento8 !!},
 "faltaRefrigera": {!! $faltaRefrigera8 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera8 !!},
},{
 "mes": {!! json_encode($atualf7) !!},
 "trincas": {!! $trincas7 !!},
 "faltaIsolamento": {!! $faltaIsolamento7 !!},
 "faltaRefrigera": {!! $faltaRefrigera7 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera7 !!},
},{
 "mes": {!! json_encode($atualf6) !!},
 "trincas": {!! $trincas6 !!},
 "faltaIsolamento": {!! $faltaIsolamento6 !!},
 "faltaRefrigera": {!! $faltaRefrigera6 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera6 !!},
},{
 "mes": {!! json_encode($atualf5) !!},
 "trincas": {!! $trincas5 !!},
 "faltaIsolamento": {!! $faltaIsolamento5 !!},
 "faltaRefrigera": {!! $faltaRefrigera5 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera5 !!},
},{
 "mes": {!! json_encode($atualf4) !!},
 "trincas": {!! $trincas4 !!},
 "faltaIsolamento": {!! $faltaIsolamento4 !!},
 "faltaRefrigera": {!! $faltaRefrigera4 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera4 !!},
},{
 "mes": {!! json_encode($atualf3) !!},
 "trincas": {!! $trincas3 !!},
 "faltaIsolamento": {!! $faltaIsolamento3 !!},
 "faltaRefrigera": {!! $faltaRefrigera3 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera3 !!},
},{
 "mes": {!! json_encode($atualf2) !!},
 "trincas": {!! $trincas2 !!},
 "faltaIsolamento": {!! $faltaIsolamento2 !!},
 "faltaRefrigera": {!! $faltaRefrigera2 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera2 !!},
},{
 "mes": {!! json_encode($atualf1) !!},
 "trincas": {!! $trincas1 !!},
 "faltaIsolamento": {!! $faltaIsolamento1 !!},
 "faltaRefrigera": {!! $faltaRefrigera1 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera1 !!},
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
   "title": "Trincas",
   "type": "column",
    "color": "#000000",
   "lineColor": "#859e3d",
   "valueField": "trincas"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Falta de Isolamento",
   "type": "column",
    "color": "#000000",
   "lineColor": "#555555",
   "valueField": "faltaIsolamento"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Falta de Refrigeração",
   "type": "column",
    "color": "#000000",
   "lineColor": "#5a3d9e",
   "valueField": "faltaRefrigera"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Trincas/Falta de Isolamento",
   "type": "column",
    "color": "#000000",
   "lineColor": "#3d9e8e",
   "valueField": "trincaFaltaRefrigera"
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

<!-- Chart code Perfil 2-->
<script>
var chart;
var legend;
var selected;

var types = [{
type: "Normal",
percent: {!!$normal!!},
color: "#2d9b1a",
subs: [{
type: "URA",
percent: {!!$ura_normal!!}
}, {
type: "LDS",
percent: {!!$lds_normal!!}
}, {
type: "LGC",
percent: {!!$lgc_normal!!}
}, {
type: "LPC",
percent: {!!$lpc_normal!!}
}]
},{
type: "Alarme",
percent: {!!$alarme!!},
color: "#FCD202",
subs: [{
type: "URA",
percent: {!!$ura_alarme!!}
}, {
type: "LDS",
percent: {!!$lds_alarme!!}
}, {
type: "LGC",
percent: {!!$lgc_alarme!!}
}, {
type: "LPC",
percent: {!!$lpc_alarme!!}
}]
},{
type: "Crítico",
percent: {!!$critico!!},
color: "#db1111",
subs: [{
type: "URA",
percent: {!!$ura_critico!!}
}, {
type: "LDS",
percent: {!!$lds_critico!!}
}, {
type: "LGC",
percent: {!!$lgc_critico!!}
}, {
type: "LPC",
percent: {!!$lpc_critico!!}
}]
}];

function generateChartData() {
var chartData = [];
for (var i = 0; i < types.length; i++) {
if (i == selected) {
  for (var x = 0; x < types[i].subs.length; x++) {
    chartData.push({
      type: types[i].subs[x].type,
      percent: types[i].subs[x].percent,
      color: types[i].color,
      pulled: true
    });
  }
} else {
  chartData.push({
    type: types[i].type,
    percent: types[i].percent,
    color: types[i].color,
    id: i
  });
}
}
return chartData;
}

AmCharts.makeChart("chartdivPerfil_2", {
"type": "pie",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Perfil das Linhas",
"size": 15
}],
"dataProvider": generateChartData(),
"labelText": "[[title]]: [[value]]",
"balloonText": "[[title]]: [[value]]",
"titleField": "type",
"valueField": "percent",
"outlineColor": "#FFFFFF",
"outlineAlpha": 0.8,
"outlineThickness": 2,
"colorField": "color",
"pulledField": "pulled",
"depth3D": 15,
"angle": 30,
"listeners": [{
"event": "clickSlice",
"method": function(event) {
  var chart = event.chart;
  if (event.dataItem.dataContext.id != undefined) {
    selected = event.dataItem.dataContext.id;
  } else {
    selected = undefined;
  }
  chart.dataProvider = generateChartData();
  chart.validateData();
}
}],
"export": {
"enabled": true
}
});
</script>

<script>
<!--// Chart code Perfil2 2-->
var chart = AmCharts.makeChart("chartdivPerfil2_2", {
  "type": "serial",
  "theme": "light",
  "responsive": {
  "enabled": false
  },
  "titles": [{
  "text": "Perfil das Linhas [Alarme e Crítico]",
  "size": 15
  }],
  "fillColorsField": "colors",
  "dataProvider": [{
      "status": "Alarme",
     "lineColor": "#9e823d",
      "ura": {!!$ura_alarme!!},
      "lds": {!!$lds_alarme!!},
      "lgc": {!!$lgc_alarme!!},
      "lpc": {!!$lpc_alarme!!}
  }, {
      "status": "Crítico",
      "lineColor":"#db1111",
      "ura": {!!$ura_critico!!},
      "lds": {!!$lds_critico!!},
      "lgc": {!!$lgc_critico!!},
      "lpc": {!!$lpc_critico!!}
  }],
  "valueAxes": [{
      "stackType": "regular",
      "axisAlpha": 0.3,
      "gridAlpha": 0
  }],
  "graphs": [{
      "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
      "fillAlphas": 0.8,
      "labelText": "[[title]]: [[value]]",
      "lineAlpha": 0.3,
      "title": "URA",
      "type": "column",
      "color": "#000000",
     "lineColor": "#b59a6c",
      "valueField": "ura"
  }, {
      "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
      "fillAlphas": 0.8,
      "labelText": "[[title]]: [[value]]",
      "lineAlpha": 0.3,
      "title": "LDS",
      "type": "column",
      "color": "#000000",
     "lineColor": "#b57f6c",
      "valueField": "lds"
  }, {
      "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
      "fillAlphas": 0.8,
      "labelText": "[[title]]: [[value]]",
      "lineAlpha": 0.3,
      "title": "LRF",
      "type": "column",
      "color": "#000000",
     "lineColor": "#aeb56c",
      "valueField": "lrf"
  }, {
      "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
      "fillAlphas": 0.8,
      "labelText": "[[title]]: [[value]]",
      "lineAlpha": 0.3,
      "title": "LGC",
      "type": "column",
      "color": "#000000",
     "lineColor": "#6c9bb5",
      "valueField": "lgc"
  }, {
      "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
      "fillAlphas": 0.8,
      "labelText": "[[title]]: [[value]]",
      "lineAlpha": 0.3,
      "title": "LPC",
      "type": "column",
      "color": "#000000",
     "lineColor": "#6c7fb5",
      "valueField": "lpc"
  }, {
      "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
      "fillAlphas": 0.8,
      "labelText": "[[title]]: [[value]]",
      "lineAlpha": 0.3,
      "title": "CS",
      "type": "column",
      "color": "#000000",
     "lineColor": "#836cb5",
      "valueField": "cs"
  }, {
      "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
      "fillAlphas": 0.8,
      "labelText": "[[title]]: [[value]]",
      "lineAlpha": 0.3,
      "title": "PR",
      "type": "column",
      "color": "#000000",
     "lineColor": "#9e8200",
      "valueField": "pr"
  }],
  "categoryField": "status",
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

<!-- Chart code Status dos Pontos 2-->
<script>
var chartData = [{
"date": {!! json_encode($atual12) !!},
"normal": {!! json_encode($normal12) !!},
"alarme": {!! json_encode($alarme12) !!},
"critico": {!! json_encode($critico12) !!},
},{
"date": {!! json_encode($atual11) !!},
"normal": {!! json_encode($normal11) !!},
"alarme": {!! json_encode($alarme11) !!},
"critico": {!! json_encode($critico11) !!},
},{
"date": {!! json_encode($atual10) !!},
"normal": {!! json_encode($normal10) !!},
"alarme": {!! json_encode($alarme10) !!},
"critico": {!! json_encode($critico10) !!},
},{
"date": {!! json_encode($atual9) !!},
"normal": {!! json_encode($normal9) !!},
"alarme": {!! json_encode($alarme9) !!},
"critico": {!! json_encode($critico9) !!},
},{
"date": {!! json_encode($atual8) !!},
"normal": {!! json_encode($normal8) !!},
"alarme": {!! json_encode($alarme8) !!},
"critico": {!! json_encode($critico8) !!},
},{
"date": {!! json_encode($atual7) !!},
"normal": {!! json_encode($normal7) !!},
"alarme": {!! json_encode($alarme7) !!},
"critico": {!! json_encode($critico7) !!},
},{
"date": {!! json_encode($atual6) !!},
"normal": {!! json_encode($normal6) !!},
"alarme": {!! json_encode($alarme6) !!},
"critico": {!! json_encode($critico6) !!},
},{
"date": {!! json_encode($atual5) !!},
"normal": {!! json_encode($normal5) !!},
"alarme": {!! json_encode($alarme5) !!},
"critico": {!! json_encode($critico5) !!},
},{
"date": {!! json_encode($atual4) !!},
"normal": {!! json_encode($normal4) !!},
"alarme": {!! json_encode($alarme4) !!},
"critico": {!! json_encode($critico4) !!},
},{
"date": {!! json_encode($atual3) !!},
"normal": {!! json_encode($normal3) !!},
"alarme": {!! json_encode($alarme3) !!},
"critico": {!! json_encode($critico3) !!},
},{
"date": {!! json_encode($atual2) !!},
"normal": {!! json_encode($normal2) !!},
"alarme": {!! json_encode($alarme2) !!},
"critico": {!! json_encode($critico2) !!},
},{
"date": {!! json_encode($atual1) !!},
"normal": {!! json_encode($normal1) !!},
"alarme": {!! json_encode($alarme1) !!},
"critico": {!! json_encode($critico1) !!}
}];

var chart = AmCharts.makeChart("chartdivStatus_2", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Status dos Pontos",
"size": 15
}],
"legend": {
"useGraphSettings": true
},
"dataProvider": chartData,
"synchronizeGrid":true,
"graphs": [ {
"valueAxis": "v3",
"lineColor": "#FCD202",
"bullet": "triangleUp",
"bulletBorderThickness": 1,
"hideBulletsCount": 30,
"title": "Alarme",
"labelText": "[[value]]",
"valueField": "alarme",
"fillAlphas": 0
}, {
"valueAxis": "v1",
"lineColor": "#db1111",
"bullet": "round",
"bulletBorderThickness": 1,
"hideBulletsCount": 30,
"title": "Crítico",
"labelText": "[[value]]",
"valueField": "critico",
"fillAlphas": 0
}, {
"valueAxis": "v2",
"lineColor": "#2d9b1a",
"bullet": "square",
"bulletBorderThickness": 1,
"hideBulletsCount": 30,
"title": "Normal",
"labelText": "[[value]]",
"valueField": "normal",
"fillAlphas": 0
}],
"chartScrollbar": {},
"chartCursor": {
"cursorPosition": "mouse",
"valueBalloonsEnabled": true,
"avoidBalloonOverlapping": true,
"categoryBalloonDateFormat": 'MMM YYYY',
"LeaveAfterTouch": true,
},
"categoryField": "date",
"categoryAxis": {
"parseDates": true,
"axisColor": "#DADADA",
"minorGridEnabled": true
}
});
</script>
<!-- Chart code Anormalidades 2-->
<script>
var chart = AmCharts.makeChart("chartdivAnormalidades_2", {
"theme": "light",
"type": "serial",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Anormalidades(%) [Alarme e Crítico]",
"size": 15
}],
"dataProvider": [{
"periodo": {!! json_encode($atualf12) !!},
"alarme": {!! $alarme12_anorm !!},
"critico": {!! $critico12_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
},{
"periodo": {!! json_encode($atualf11) !!},
"alarme": {!! $alarme11_anorm !!},
"critico": {!! $critico11_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf10) !!},
"alarme": {!! $alarme10_anorm !!},
"critico": {!! $critico10_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf9) !!},
"alarme": {!! $alarme9_anorm !!},
"critico": {!! $critico9_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf8) !!},
"alarme": {!! $alarme8_anorm !!},
"critico": {!! $critico8_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf7) !!},
"alarme": {!! $alarme7_anorm !!},
"critico": {!! $critico7_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf6) !!},
"alarme": {!! $alarme6_anorm !!},
"critico": {!! $critico6_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf5) !!},
"alarme": {!! $alarme5_anorm !!},
"critico": {!! $critico5_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf4) !!},
"alarme": {!! $alarme4_anorm !!},
"critico": {!! $critico4_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf3) !!},
"alarme": {!! $alarme3_anorm !!},
"critico": {!! $critico3_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf2) !!},
"alarme": {!! $alarme2_anorm !!},
"critico": {!! $critico2_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf1) !!},
"alarme": {!! $alarme1_anorm !!},
"critico": {!! $critico1_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}],
"valueAxes": [{
"unit": "%",
"position": "left",
"title": "Status",
}],
"startDuration": 1,
"graphs": [{
"balloonText": "Alarme: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "alarme",
"labelText": "[[value]]%",
"type": "column",
"valueField": "alarme",
"colorField": "color"
}, {
"balloonText": "Crítico: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "critico",
"labelText": "[[value]]%",
"type": "column",
"clustered":false,
"columnWidth":0.5,
"valueField": "critico",
"colorField": "colorCr"
}],
"plotAreaFillAlphas": 0.1,
"categoryField": "periodo",
"categoryAxis": {
"gridPosition": "start"
},
"export": {
"enabled": true
}
});
</script>

<!-- Chart code Problemas Encontrados 2-->
<script>
var chart = AmCharts.makeChart("chartdivProblemas_2", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": false
},
"titles": [{
"text": "Problemas Encontrados",
"size": 15
}],
"legend": {
"useGraphSettings": true,
"Columns": 4,
"position": "bottom",
"markerSize": 10,
"marginTop": 0,
"marginBottom": 0,
"verticalGap": 1,
"horizontalGap": 1,
"valueWidth": 1,
},
"dataProvider": [{
 "mes": {!! json_encode($atualf12) !!},
 "trincas": {!! $trincas12 !!},
 "faltaIsolamento": {!! $faltaIsolamento12 !!},
 "faltaRefrigera": {!! $faltaRefrigera12 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera12 !!},
},{
 "mes": {!! json_encode($atualf11) !!},
 "trincas": {!! $trincas11 !!},
 "faltaIsolamento": {!! $faltaIsolamento11 !!},
 "faltaRefrigera": {!! $faltaRefrigera11 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera11 !!},
},{
 "mes": {!! json_encode($atualf10) !!},
 "trincas": {!! $trincas10 !!},
 "faltaIsolamento": {!! $faltaIsolamento10 !!},
 "faltaRefrigera": {!! $faltaRefrigera10 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera10 !!},
},{
 "mes": {!! json_encode($atualf9) !!},
 "trincas": {!! $trincas9 !!},
 "faltaIsolamento": {!! $faltaIsolamento9 !!},
 "faltaRefrigera": {!! $faltaRefrigera9 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera9 !!},
},{
 "mes": {!! json_encode($atualf8) !!},
 "trincas": {!! $trincas8 !!},
 "faltaIsolamento": {!! $faltaIsolamento8 !!},
 "faltaRefrigera": {!! $faltaRefrigera8 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera8 !!},
},{
 "mes": {!! json_encode($atualf7) !!},
 "trincas": {!! $trincas7 !!},
 "faltaIsolamento": {!! $faltaIsolamento7 !!},
 "faltaRefrigera": {!! $faltaRefrigera7 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera7 !!},
},{
 "mes": {!! json_encode($atualf6) !!},
 "trincas": {!! $trincas6 !!},
 "faltaIsolamento": {!! $faltaIsolamento6 !!},
 "faltaRefrigera": {!! $faltaRefrigera6 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera6 !!},
},{
 "mes": {!! json_encode($atualf5) !!},
 "trincas": {!! $trincas5 !!},
 "faltaIsolamento": {!! $faltaIsolamento5 !!},
 "faltaRefrigera": {!! $faltaRefrigera5 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera5 !!},
},{
 "mes": {!! json_encode($atualf4) !!},
 "trincas": {!! $trincas4 !!},
 "faltaIsolamento": {!! $faltaIsolamento4 !!},
 "faltaRefrigera": {!! $faltaRefrigera4 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera4 !!},
},{
 "mes": {!! json_encode($atualf3) !!},
 "trincas": {!! $trincas3 !!},
 "faltaIsolamento": {!! $faltaIsolamento3 !!},
 "faltaRefrigera": {!! $faltaRefrigera3 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera3 !!},
},{
 "mes": {!! json_encode($atualf2) !!},
 "trincas": {!! $trincas2 !!},
 "faltaIsolamento": {!! $faltaIsolamento2 !!},
 "faltaRefrigera": {!! $faltaRefrigera2 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera2 !!},
},{
 "mes": {!! json_encode($atualf1) !!},
 "trincas": {!! $trincas1 !!},
 "faltaIsolamento": {!! $faltaIsolamento1 !!},
 "faltaRefrigera": {!! $faltaRefrigera1 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera1 !!},
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
   "title": "Trincas",
   "type": "column",
    "color": "#000000",
   "lineColor": "#859e3d",
   "valueField": "trincas"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Falta de Isolamento",
   "type": "column",
    "color": "#000000",
   "lineColor": "#555555",
   "valueField": "faltaIsolamento"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Falta de Refrigeração",
   "type": "column",
    "color": "#000000",
   "lineColor": "#5a3d9e",
   "valueField": "faltaRefrigera"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Trincas/Falta de Isolamento",
   "type": "column",
    "color": "#000000",
   "lineColor": "#3d9e8e",
   "valueField": "trincaFaltaRefrigera"
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

<!-- Chart code menu Perfil-->
<script>
var chart;
var legend;
var selected;

var types = [{
type: "Normal",
percent: {!!$normal!!},
color: "#2d9b1a",
subs: [{
type: "URA",
percent: {!!$ura_normal!!}
}, {
type: "LDS",
percent: {!!$lds_normal!!}
}, {
type: "LGC",
percent: {!!$lgc_normal!!}
}, {
type: "LPC",
percent: {!!$lpc_normal!!}
}]
},{
type: "Alarme",
percent: {!!$alarme!!},
color: "#FCD202",
subs: [{
type: "URA",
percent: {!!$ura_alarme!!}
}, {
type: "LDS",
percent: {!!$lds_alarme!!}
}, {
type: "LGC",
percent: {!!$lgc_alarme!!}
}, {
type: "LPC",
percent: {!!$lpc_alarme!!}
}]
},{
type: "Crítico",
percent: {!!$critico!!},
color: "#db1111",
subs: [{
type: "URA",
percent: {!!$ura_critico!!}
}, {
type: "LDS",
percent: {!!$lds_critico!!}
}, {
type: "LGC",
percent: {!!$lgc_critico!!}
}, {
type: "LPC",
percent: {!!$lpc_critico!!}
}]
}];

function generateChartData() {
var chartData = [];
for (var i = 0; i < types.length; i++) {
if (i == selected) {
  for (var x = 0; x < types[i].subs.length; x++) {
    chartData.push({
      type: types[i].subs[x].type,
      percent: types[i].subs[x].percent,
      color: types[i].color,
      pulled: true
    });
  }
} else {
  chartData.push({
    type: types[i].type,
    percent: types[i].percent,
    color: types[i].color,
    id: i
  });
}
}
return chartData;
}

AmCharts.makeChart("menuchartdivPerfil", {
"type": "pie",
"theme": "light",
"responsive": {
"enabled": true
},
"titles": [{
"text": "Problemas Encontrados",
"size": 15
}],
"dataProvider": generateChartData(),
"labelText": "[[title]]: [[value]]",
"balloonText": "[[title]]: [[value]]",
"titleField": "type",
"valueField": "percent",
"outlineColor": "#FFFFFF",
"outlineAlpha": 0.8,
"outlineThickness": 2,
"colorField": "color",
"pulledField": "pulled",
"depth3D": 15,
"angle": 30,
"listeners": [{
"event": "clickSlice",
"method": function(event) {
  var chart = event.chart;
  if (event.dataItem.dataContext.id != undefined) {
    selected = event.dataItem.dataContext.id;
  } else {
    selected = undefined;
  }
  chart.dataProvider = generateChartData();
  chart.validateData();
}
}],
"export": {
"enabled": true
}
});
</script>

<script>
<!--// Chart code menu Perfil2-->
var chart = AmCharts.makeChart("menuchartdivPerfil2", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": true
},
"fillColorsField": "colors",
"dataProvider": [{
  "status": "Alarme",
 "lineColor": "#9e823d",
  "ura": {!!$ura_alarme!!},
  "lds": {!!$lds_alarme!!},
  "lgc": {!!$lgc_alarme!!},
  "lpc": {!!$lpc_alarme!!}
}, {
  "status": "Crítico",
  "lineColor":"#db1111",
  "ura": {!!$ura_critico!!},
  "lds": {!!$lds_critico!!},
  "lgc": {!!$lgc_critico!!},
  "lpc": {!!$lpc_critico!!}
}],
"valueAxes": [{
  "stackType": "regular",
  "axisAlpha": 0.3,
  "gridAlpha": 0
}],
"graphs": [{
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "URA",
  "type": "column",
  "color": "#000000",
 "lineColor": "#859e3d",
  "valueField": "ura"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LDS",
  "type": "column",
  "color": "#000000",
 "lineColor": "#555555",
  "valueField": "lds"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LRF",
  "type": "column",
  "color": "#000000",
 "lineColor": "#859e4d",
  "valueField": "lrf"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LGC",
  "type": "column",
  "color": "#000000",
 "lineColor": "#3d729e",
  "valueField": "lgc"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "LPC",
  "type": "column",
  "color": "#000000",
 "lineColor": "#9e823d",
  "valueField": "lpc"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "CS",
  "type": "column",
  "color": "#000000",
 "lineColor": "#9e003d",
  "valueField": "cs"
}, {
  "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
  "fillAlphas": 0.8,
  "labelText": "[[title]]: [[value]]",
  "lineAlpha": 0.3,
  "title": "PR",
  "type": "column",
  "color": "#000000",
 "lineColor": "#9e8200",
  "valueField": "pr"
}],
"categoryField": "status",
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

<!-- Chart code menu Status dos Pontos-->
<script>
var chartData = [{
"date": {!! json_encode($atual12) !!},
"normal": {!! json_encode($normal12) !!},
"alarme": {!! json_encode($alarme12) !!},
"critico": {!! json_encode($critico12) !!},
},{
"date": {!! json_encode($atual11) !!},
"normal": {!! json_encode($normal11) !!},
"alarme": {!! json_encode($alarme11) !!},
"critico": {!! json_encode($critico11) !!},
},{
"date": {!! json_encode($atual10) !!},
"normal": {!! json_encode($normal10) !!},
"alarme": {!! json_encode($alarme10) !!},
"critico": {!! json_encode($critico10) !!},
},{
"date": {!! json_encode($atual9) !!},
"normal": {!! json_encode($normal9) !!},
"alarme": {!! json_encode($alarme9) !!},
"critico": {!! json_encode($critico9) !!},
},{
"date": {!! json_encode($atual8) !!},
"normal": {!! json_encode($normal8) !!},
"alarme": {!! json_encode($alarme8) !!},
"critico": {!! json_encode($critico8) !!},
},{
"date": {!! json_encode($atual7) !!},
"normal": {!! json_encode($normal7) !!},
"alarme": {!! json_encode($alarme7) !!},
"critico": {!! json_encode($critico7) !!},
},{
"date": {!! json_encode($atual6) !!},
"normal": {!! json_encode($normal6) !!},
"alarme": {!! json_encode($alarme6) !!},
"critico": {!! json_encode($critico6) !!},
},{
"date": {!! json_encode($atual5) !!},
"normal": {!! json_encode($normal5) !!},
"alarme": {!! json_encode($alarme5) !!},
"critico": {!! json_encode($critico5) !!},
},{
"date": {!! json_encode($atual4) !!},
"normal": {!! json_encode($normal4) !!},
"alarme": {!! json_encode($alarme4) !!},
"critico": {!! json_encode($critico4) !!},
},{
"date": {!! json_encode($atual3) !!},
"normal": {!! json_encode($normal3) !!},
"alarme": {!! json_encode($alarme3) !!},
"critico": {!! json_encode($critico3) !!},
},{
"date": {!! json_encode($atual2) !!},
"normal": {!! json_encode($normal2) !!},
"alarme": {!! json_encode($alarme2) !!},
"critico": {!! json_encode($critico2) !!},
},{
"date": {!! json_encode($atual1) !!},
"normal": {!! json_encode($normal1) !!},
"alarme": {!! json_encode($alarme1) !!},
"critico": {!! json_encode($critico1) !!}
}];

var chart = AmCharts.makeChart("menuchartdivStatus", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": true
},
"dataProvider": chartData,
"synchronizeGrid":true,
"graphs": [ {
"valueAxis": "v3",
"lineColor": "#FCD202",
"bullet": "triangleUp",
"bulletBorderThickness": 1,
"hideBulletsCount": 30,
"title": "Alarme",
"labelText": "[[value]]",
"valueField": "alarme",
"fillAlphas": 0
}, {
"valueAxis": "v1",
"lineColor": "#db1111",
"bullet": "round",
"bulletBorderThickness": 1,
"hideBulletsCount": 30,
"title": "Crítico",
"labelText": "[[value]]",
"valueField": "critico",
"fillAlphas": 0
}, {
"valueAxis": "v2",
"lineColor": "#2d9b1a",
"bullet": "square",
"bulletBorderThickness": 1,
"hideBulletsCount": 30,
"title": "Normal",
"labelText": "[[value]]",
"valueField": "normal",
"fillAlphas": 0
}],
"chartScrollbar": {},
"chartCursor": {
"cursorPosition": "mouse",
"valueBalloonsEnabled": true,
"avoidBalloonOverlapping": true,
"categoryBalloonDateFormat": 'MMM YYYY',
"LeaveAfterTouch": true,
},
"categoryField": "date",
"categoryAxis": {
"parseDates": true,
"axisColor": "#DADADA",
"minorGridEnabled": true
}
});
</script>
<!-- Chart code menu Anormalidades-->
<script>
var chart = AmCharts.makeChart("menuchartdivAnormalidades", {
"theme": "light",
"type": "serial",
"responsive": {
"enabled": true
},
"dataProvider": [{
"periodo": {!! json_encode($atualf12) !!},
"alarme": {!! $alarme12_anorm !!},
"critico": {!! $critico12_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
},{
"periodo": {!! json_encode($atualf11) !!},
"alarme": {!! $alarme11_anorm !!},
"critico": {!! $critico11_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf10) !!},
"alarme": {!! $alarme10_anorm !!},
"critico": {!! $critico10_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf9) !!},
"alarme": {!! $alarme9_anorm !!},
"critico": {!! $critico9_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf8) !!},
"alarme": {!! $alarme8_anorm !!},
"critico": {!! $critico8_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf7) !!},
"alarme": {!! $alarme7_anorm !!},
"critico": {!! $critico7_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf6) !!},
"alarme": {!! $alarme6_anorm !!},
"critico": {!! $critico6_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf5) !!},
"alarme": {!! $alarme5_anorm !!},
"critico": {!! $critico5_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf4) !!},
"alarme": {!! $alarme4_anorm !!},
"critico": {!! $critico4_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf3) !!},
"alarme": {!! $alarme3_anorm !!},
"critico": {!! $critico3_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf2) !!},
"alarme": {!! $alarme2_anorm !!},
"critico": {!! $critico2_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}, {
"periodo": {!! json_encode($atualf1) !!},
"alarme": {!! $alarme1_anorm !!},
"critico": {!! $critico1_anorm !!},
"color": "#FCD202",
"colorCr": "#db1111"
}],
"valueAxes": [{
"unit": "%",
"position": "left",
"title": "Status",
}],
"startDuration": 1,
"graphs": [{
"balloonText": "Alarme: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "alarme",
"labelText": "[[value]]%",
"type": "column",
"valueField": "alarme",
"colorField": "color"
}, {
"balloonText": "Crítico: <b>[[value]]%</b>",
"fillAlphas": 0.9,
"lineAlpha": 0.2,
"title": "critico",
"labelText": "[[value]]%",
"type": "column",
"clustered":false,
"columnWidth":0.5,
"valueField": "critico",
"colorField": "colorCr"
}],
"plotAreaFillAlphas": 0.1,
"categoryField": "periodo",
"categoryAxis": {
"gridPosition": "start"
},
"export": {
"enabled": true
}
});
</script>

<!-- Chart code menu Problemas Encontrados-->
<script>
var chart = AmCharts.makeChart("menuchartdivProblemas", {
"type": "serial",
"theme": "light",
"responsive": {
"enabled": true
},
"legend": {
"useGraphSettings": false
},
"dataProvider": [{
 "mes": {!! json_encode($atualf12) !!},
 "trincas": {!! $trincas12 !!},
 "faltaIsolamento": {!! $faltaIsolamento12 !!},
 "faltaRefrigera": {!! $faltaRefrigera12 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera12 !!},
},{
 "mes": {!! json_encode($atualf11) !!},
 "trincas": {!! $trincas11 !!},
 "faltaIsolamento": {!! $faltaIsolamento11 !!},
 "faltaRefrigera": {!! $faltaRefrigera11 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera11 !!},
},{
 "mes": {!! json_encode($atualf10) !!},
 "trincas": {!! $trincas10 !!},
 "faltaIsolamento": {!! $faltaIsolamento10 !!},
 "faltaRefrigera": {!! $faltaRefrigera10 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera10 !!},
},{
 "mes": {!! json_encode($atualf9) !!},
 "trincas": {!! $trincas9 !!},
 "faltaIsolamento": {!! $faltaIsolamento9 !!},
 "faltaRefrigera": {!! $faltaRefrigera9 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera9 !!},
},{
 "mes": {!! json_encode($atualf8) !!},
 "trincas": {!! $trincas8 !!},
 "faltaIsolamento": {!! $faltaIsolamento8 !!},
 "faltaRefrigera": {!! $faltaRefrigera8 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera8 !!},
},{
 "mes": {!! json_encode($atualf7) !!},
 "trincas": {!! $trincas7 !!},
 "faltaIsolamento": {!! $faltaIsolamento7 !!},
 "faltaRefrigera": {!! $faltaRefrigera7 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera7 !!},
},{
 "mes": {!! json_encode($atualf6) !!},
 "trincas": {!! $trincas6 !!},
 "faltaIsolamento": {!! $faltaIsolamento6 !!},
 "faltaRefrigera": {!! $faltaRefrigera6 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera6 !!},
},{
 "mes": {!! json_encode($atualf5) !!},
 "trincas": {!! $trincas5 !!},
 "faltaIsolamento": {!! $faltaIsolamento5 !!},
 "faltaRefrigera": {!! $faltaRefrigera5 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera5 !!},
},{
 "mes": {!! json_encode($atualf4) !!},
 "trincas": {!! $trincas4 !!},
 "faltaIsolamento": {!! $faltaIsolamento4 !!},
 "faltaRefrigera": {!! $faltaRefrigera4 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera4 !!},
},{
 "mes": {!! json_encode($atualf3) !!},
 "trincas": {!! $trincas3 !!},
 "faltaIsolamento": {!! $faltaIsolamento3 !!},
 "faltaRefrigera": {!! $faltaRefrigera3 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera3 !!},
},{
 "mes": {!! json_encode($atualf2) !!},
 "trincas": {!! $trincas2 !!},
 "faltaIsolamento": {!! $faltaIsolamento2 !!},
 "faltaRefrigera": {!! $faltaRefrigera2 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera2 !!},
},{
 "mes": {!! json_encode($atualf1) !!},
 "trincas": {!! $trincas1 !!},
 "faltaIsolamento": {!! $faltaIsolamento1 !!},
 "faltaRefrigera": {!! $faltaRefrigera1 !!},
 "trincaFaltaRefrigera": {!! $trincaFaltaRefrigera1 !!},
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
   "title": "Trincas",
   "type": "column",
    "color": "#000000",
   "lineColor": "#859e3d",
   "valueField": "trincas"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Falta de Isolamento",
   "type": "column",
    "color": "#000000",
   "lineColor": "#555555",
   "valueField": "faltaIsolamento"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Falta de Refrigeração",
   "type": "column",
    "color": "#000000",
   "lineColor": "#5a3d9e",
   "valueField": "faltaRefrigera"
}, {
   "balloonText": "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>",
   "fillAlphas": 0.8,
   "labelText": "[[value]]",
   "lineAlpha": 0.3,
   "title": "Trincas/Falta de Isolamento",
   "type": "column",
    "color": "#000000",
   "lineColor": "#3d9e8e",
   "valueField": "trincaFaltaRefrigera"
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

<script src="/plugins/amcharts/plugins/responsive/responsive.min.js" type="text/javascript"></script>

<script>// Get the modal
var modal1 = document.getElementById('tab_normal');
var modal2 = document.getElementById('tab_alarme');
var modal3 = document.getElementById('tab_critico');
var modal4 = document.getElementById('tab_manutencao');
var modal5 = document.getElementById('tab_standBy');
var modal_ol_p = document.getElementById('ol_perfil');
var modal_ol_p2 = document.getElementById('ol_perfil2');
var modal_ol_s = document.getElementById('ol_status');
var modal_ol_a = document.getElementById('ol_anorm');
var modal_ol_probl = document.getElementById('ol_problem');
var modal_or_p = document.getElementById('or_perfil');
var modal_or_p2 = document.getElementById('or_perfil2');
var modal_or_s = document.getElementById('or_status');
var modal_or_a = document.getElementById('or_anorm');
var modal_or_probl = document.getElementById('or_problem');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal1) {
modal1.style.display = "none";
}
if (event.target == modal2) {
modal2.style.display = "none";
}
if (event.target == modal3) {
modal3.style.display = "none";
}
if (event.target == modal4) {
modal4.style.display = "none";
}
if (event.target == modal5) {
modal5.style.display = "none";
}
if (event.target == modal_ol_p) {
modal_ol_p.style.display = "none";
}
if (event.target == modal_ol_p2) {
modal_ol_p2.style.display = "none";
}
if (event.target == modal_ol_s) {
modal_ol_s.style.display = "none";
}
if (event.target == modal_ol_a) {
modal_ol_a.style.display = "none";
}
if (event.target == modal_ol_probl) {
modal_ol_probl.style.display = "none";
}
if (event.target == modal_or_p) {
modal_or_p.style.display = "none";
}
if (event.target == modal_or_p2) {
modal_or_p2.style.display = "none";
}
if (event.target == modal_or_s) {
modal_or_s.style.display = "none";
}
if (event.target == modal_or_a) {
modal_or_a.style.display = "none";
}
if (event.target == modal_or_probl) {
modal_or_probl.style.display = "none";
}
}
// Handle ESC key (key code 27)
document.addEventListener('keyup', function(e) {
if (e.keyCode == 27) {
  modal1.style.display = "none";
  modal2.style.display = "none";
  modal3.style.display = "none";
  modal4.style.display = "none";
  modal5.style.display = "none";
  modal_ol_p.style.display = "none";
  modal_ol_p2.style.display = "none";
  modal_ol_s.style.display = "none";
  modal_ol_a.style.display = "none";
  modal_ol_probl.style.display = "none";
  modal_or_p.style.display = "none";
  modal_or_p2.style.display = "none";
  modal_or_s.style.display = "none";
  modal_or_a.style.display = "none";
  modal_or_probl.style.display = "none";
}
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tb_anormalidades').DataTable({"ordering": false});
  });

  $(document).ready(function() {
    $('#tbl_normal').DataTable({"ordering": false});
  });

  $(document).ready(function() {
    $('#tbl_alarme').DataTable({"ordering": false});
  });

  $(document).ready(function() {
    $('#tbl_critico').DataTable({"ordering": false});
  });

  $(document).ready(function() {
    $('#tbl_manutencao').DataTable({"ordering": false});
  });

  $(document).ready(function() {
    $('#tbl_standBy').DataTable({"ordering": false});
  });
</script>
<!--
<script type="text/javascript">
//pega a largura da resolução da tela
var width = screen.width;
//pega a altura da resolução da tela
var height = screen.height;

//verifica se a resolução dará uma boa visão do site
if (width <= 1920 || height <= 1080)
document.body.style.transform = 0.75;
else
document.body.style.transform = 1.5 ;
</script>
-->

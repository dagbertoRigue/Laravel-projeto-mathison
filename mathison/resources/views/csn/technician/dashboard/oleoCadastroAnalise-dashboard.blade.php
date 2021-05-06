<script src="/plugins/chartJs-master/chartBundle.js"></script>
<script src="/plugins/chartJs-master/Chart.min.js"></script>
<script src="/plugins/chartJs-master/utils.js"></script>

<div id="wrapper-side" style="margin-top: 50px;">
  <!-- Sidebar -->
  @include('csn.technician.includes.sidebar-dashboard')

  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default" style="background-color:#f1f1f1;">
            <div class="panel-heading">
              <strong>Análise de Óleo</strong>
            </div>
            <div class="row" style="padding-top:30px">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default" style="margin-bottom:0px;margin-bottom: 30px;">
                  <div class="panel-heading">
                    Inserir Análise
                    <label style="float:right;">Amostras para Análise: {{$countPendencias}}</label>
                  </div>
                  <div class="row" style="padding-top:15px; padding-bottom:15px;">
                    <div class="col-md-12">
                      <div class="panel-body">
                        <div class="form-group" id="colunaNaoEnc">
                          <strong><label></label></strong>
                          <p></p>
                          <div class="col-md-12">
                            @if($countPendencias > 0)
                              @foreach ($pendencias as $value)
                                <form action="/preditiva.csn.br/tecnico-preditiva/analise-de-oleo/adiciona" id="myform" name="myform" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                  <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                  <input name="atividade_id" type="hidden" value="1">
                                  <input name="atividade_tag" type="hidden" value="{{$value->tag}}">
                                  <input name="sistema_id" type="hidden" value="1">
                                  <table id="tbl_normal" name="tbl_normal" width="100%" class="display table table-striped table-bordered table-hover" style="margin-top:-24px;">
                                  <tbody>
                                    <tr id="tr_mutavel" name="tr_mutavel" style="border: 1px solid #ddd;">
                                        <td class="cab_cent" style="border: 0px solid #ddd;max-width:95px;">
                                           <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/1"
                                              target="_blank" class="btn buttondg"
                                              style="background: grey;border-top: 1px solid black;color:#fff;min-width: 90px;">
                                             1 TR <br>
                                           </a>
                                        </td>
                                        <td class="cab_left strlengcut" style="font-size:12px;border:0px solid #ddd;padding-top:12px;"> {{$value->tag}} </td>
                                        <td class="cab_left strlengcut" style="font-size:12px;border:0px solid #ddd;padding-top:12px;">{{$value->ponto}}</td>
                                        <td class="cab_left" style="font-size:12px;border:0px solid #ddd;padding-top:12px;min-width:300px;">DESCRIÇÃO DA ATIVIDADE AQUI</td>
                                        <td class="cab_left strlengcut" style="font-size:12px;border: 0px solid #ddd;">
                                          <select class="form-control movewithstatus" id="selecionaStatus" name="status_id" style="width:115px;height:25px;padding:5px 12px;font-size:10px;">
                                            <option value="3">NORMAL</option>
                                            <option value="1">MANUTENCAO</option>
                                            <option value="2">STAND BY</option>
                                            <option value="4">ALARME</option>
                                            <option value="5">CRITICO</option>
                                          </select>
                                        </td>
                                        <td class="cab_left strlengcut" style="border: 0px solid #ddd;">
                                          <button type="submit" name="btngerar" id="btngerar" class="btn btn-primary" style="padding: 3px 10px;font-size: 12px;margin-left:0px;"> Gerar </button>
                                        </td>
                                      </tr>
                                      <tr class="expand">
                                        <td colspan="6" style="border: 0px solid #ddd;padding: 0px 0px 0px 0px;">
                                          <div class="expand">
                                            <p style="display: inline-block;width: 10%;float: left;text-align: right;line-height: 15%;padding-top: 1%;padding-bottom: 0%;">
                                                <label for="num_termo" style="font-size:12px;margin-right:15px;margin-bottom:15px;line-height: 280%;">Termograma: </label>
                                                <br/><label for="temperatura" style="font-size:12px;margin-right:15px;line-height: 280%;">Temperatura: </label>
                                                <br/><label for="secao" style="font-size:12px;margin-right:15px;line-height: 280%;">Seção: </label>
                                                <br/><label for="zona" style="font-size:12px;margin-right:15px;line-height: 280%;">Temp.Zona: </label>
                                                <br/><label for="gradiente" style="font-size:12px;margin-right:15px;line-height: 280%;">Gradiente: </label>
                                            </p>
                                            <p style="margin-bottom:5px;text-align: right;display: inline-block;width: 10%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;font-size: 1.1rem;">
                                                <input id="termograma" name="termograma" class="form-control" type="text" style="font-size:12px;margin-bottom:10px;"></input>
                                                <br/><input id="temperatura" name="temperatura" class="form-control calc" type="text" style="font-size:12px;"></input>
                                                <br/><select class="form-control calc" id="selecionaZona" name="selecionaZona">

                                                </select>
                                                <br/><input id="zona" name="zona" class="form-control calc" type="text" style="font-size:12px;background-color:#eee"></input>
                                                <br/><input id="gradiente" name="gradiente" class="form-control calc" type="text" style="font-size:12px;background-color:#eee"></input>
                                            </p>
                                            <p style="display: inline-block;width: 15%;float: left;text-align: right;line-height: 210%;padding-top: 1%;padding-bottom: 0%;">
                                              <label for="data" style="font-size:12px;margin-right:15px;margin-bottom:15px;line-height: 280%;">Data:</label>
                                              <br/><label for="camera" style="font-size:12px;margin-right:15px;line-height: 280%;">Câmera:</label>
                                              <br/><label for="alarme" style="font-size:12px;margin-right:15px;line-height: 280%;">Alarme:</label>
                                              <br/><label for="critico" style="font-size:12px;margin-right:15px;line-height: 280%;">Crítico:</label>
                                              <br/><label for="diagnostico" style="font-size:12px;margin-right:15px;line-height: 280%;" >Diagnóstico:</label>
                                            </p>
                                            <p style="margin-bottom:5px;display: inline-block;width: 15%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;font-size: 1.1rem;">
                                              <input id="dataanalise" name="dataanalise" class="form-control calc" type="text" style="font-size:12px;margin-bottom:10px;background-color:#eee"></input>
                                              <br/><select class="form-control" id="camera" name="camera">
                                                  <option value="3">FLIR T440 – 62107788</option>
                                                  <option value="1">FLIR C2 – 720064326</option>
                                                  <option value="2">FLIR C2 – 720063340</option>
                                                  <option value="4">FLIR AX8 – 71211845</option>
                                                  <option value="5">FLUKE – Ti45FT-0712299</option>
                                                </select>
                                                <br/><input id="alarme" name="alarme" class="form-control calc" type="text" style="font-size:12px;"></input>
                                                <br/><input id="critico" name="critico" class="form-control calc" type="text" style="font-size:12px;"></input>
                                                <br/>
                                            </p>
                                            <p style="margin-top:5px;margin-bottom:10px;text-align: right;display: inline-block;width: 45%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;padding-left: 5%;font-size: 1.1rem;">
                                              <label for="selecionaImagem" style="font-size:12px;line-height:10%">Selecione Imagem:</label>
                                               {{ csrf_field() }}
                                               <input id="imagem'+tag_id_r+'" name="imagem" type="file" style="margin-bottom:2px;">
                                               <br/><textarea type="text" class="text form-control" id="obs" name="obs" rows="3" placeholder="Observações" maxlength="2048"></textarea>
                                              <br/><textarea type="text" class="text form-control" id="rec" name="rec" rows="3" placeholder="Recomendações" maxlength="2048"></textarea>
                                              <br/>
                                            </p>
                                          </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </form>
                              @endforeach
                            @else
                            <table id="tbl_normal" name="tbl_normal" width="100%" class="display table table-striped table-bordered table-hover" style="margin-top:0px;margin-bottom:23px;">
                              <thead>
                                <tr style="border: 1px solid #ddd;font-size:12px">
                                  <th class="cab_left"style="border: 0px solid #ddd;min-width:100px;">Laudo Atual</th>
                                  <th class="cab_left"style="border: 0px solid #ddd;min-width:200px;">TAG</th>
                                  <th class="cab_left"style="border: 0px solid #ddd;min-width:200px;">Ativo</th>
                                  <th class="cab_left"style="border: 0px solid #ddd;min-width:300px;">Atividade</th>
                                  <th class="cab_left"style="border: 0px solid #ddd;min-width: 115px;">Status</th>
                                  <th class="cab_left"style="border: 0px solid #ddd;">Gerar</th>
                                </tr>
                              </thead>
                              <tbody id="embranco">
                                <tr>
                                  <td class="cab_left" style="border: 0px solid #ddd;width:100px">
                                     <a
                                        type="button" class="btn buttondg"
                                        style="border-top: 1px solid #fff;
                                        color: #c0c2c6;
                                        background: #fff;
                                        background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                        width:100px;">
                                       0 TR <br>{{ date('d-m-Y', strtotime(substr('29-11-2018', 0, 10))) }}
                                     </a>
                                  </td>
                                  <td class="cab_left"style="border: 0px solid #ddd;font-size:11px;">Nenhuma TAG Selecionada</td>
                                  <td class="cab_left"style="border: 0px solid #ddd;font-size:11px;">Nenhum Ativo Selecionado</td>
                                  <td class="cab_left"style="border: 0px solid #ddd;font-size:11px;">Nenhuma Atividade Selecionada</td>
                                  <td class="cab_left"style="border: 0px solid #ddd;font-size:11px;">Nenhum Status Selecionado</td>
                                  <td class="cab_left" style="border: 0px solid #ddd;padding:15px;width:30px">
                                     <a type="button" class="btn buttondg"
                                       style="border-top: 1px solid #fff;
                                       color: #c0c2c6;
                                       background: #fff;
                                       background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                       width:100%;
                                       font-size:11px;">
                                         Gerar
                                     </a>
                                  </td>
                                </tr>
                            	</tbody>
                            </table>
                            @endif

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
</div>

<link href="/css/checkSuccess.css" rel="stylesheet">
<link href="/css/jquery.timepicker.min.css" rel="stylesheet">
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/js/additional-methods.js"></script>
<link rel="stylesheet" href="/css/relatorioGerencial.css">
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
<style media="screen">

</style>
<div id="wrapper-side" style="margin-top: 50px;">
  <!-- Sidebar -->
  @include('csn.technician.includes.sidebar-dashboard')

  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default" style="background-color:#f1f1f1;">
            <div class="panel-heading">
                <strong>Análise Termográfica de Isolamentos - Inserir Nova Amostra</strong>
            </div>
            <div class="row" style="padding-top:30px">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      Filtrar atividade:
                  </div>
                  <div class="row" style="padding-top:35px; padding-bottom:25px;">
                    <div class="col-md-3 col-md-offset-1">
                      <!-- DROPDOWN LINHA -->
                      <div class="form-group" style="font-size:13px;">
                        <label for="title">Selecione uma Linha:</label>
                        <select name="negocio"  id="negocio" class="form-control" style="width:100%;">
                            <option>Linhas</option>
                            @foreach ($negocios as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                      <!-- DROPDOWN SISTEMAS -->
                      <div class="sidebar">
                        <div class="form-group" style="font-size:13px;">
                            <label for="title">Selecione um Sistema:</label>
                            <select name="sistemas" id="sistemas" class="form-control" style="width: 100%;">
                              <option value="0">Sistemas</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                      <!-- DROPDOWN DATA -->
                      <div class="sidebar">
                        <div class="form-group" style="font-size:13px;">
                            <label for="title">Data</label>
                            <input type="text" class="form-control mydata" id="datacoleta" name="mydata">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="zonas" name="zonas">
                    <!-- pode existir ou não, depende do sistema funcional -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="secoes" style="margin-top:0px;margin-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="panel-heading" style="font-size:14px">
                      Atividades
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                    <div class="row" style="margin-top:0px;margin-bottom:15px;">
                      <div class="col-md-12" id="table-container">
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
                        <div id="modific"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- FIM SECOES -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" href="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script>
  $(document).ready(function(){
      $("#sistemas").on('change', function() {
        var id_sistema = this.value;
        if(id_sistema == 256 || id_sistema == 264) { // PARA LPC - ESTUFAS PRIME E FINISH OVEN
          $('#zonas').empty();
          $('#zonas').append('<hr style="margin-top: 0px;margin-bottom: 0px;">\
          <div class="row" style="padding-top:15px; padding-bottom:15px;">\
            <div class="col-md-2 col-md-offset-1">\
              <div class="form-group">\
                  <label for="title" style="font-size:12px;">Zona #1:</label>\
                  <input class="form-control calc" type="text" id="z1" name="z1" style="width:75%;margin-left:3px;"></input>\
              </div>\
            </div>\
            <div class="col-md-2">\
              <div class="form-group">\
                  <label for="title" style="font-size:12px;">Zona #2:</label>\
                  <input class="form-control calc" type="text" id="z2" name="z2" style="width:75%;margin-left:3px;"></input>\
              </div>\
            </div>\
            <div class="col-md-2">\
              <div class="form-group">\
                  <label for="title" style="font-size:12px;">Zona #3:</label>\
                  <input class="form-control calc" type="text" id="z3" name="z3" style="width:75%;margin-left:3px;"></input>\
              </div>\
            </div>\
            <div class="col-md-2">\
              <div class="form-group">\
                  <label for="title" style="font-size:12px;">Zona #4:</label>\
                  <input class="form-control calc" type="text" id="z4" name="z4" style="width:75%;margin-left:3px;"></input>\
              </div>\
            </div>\
            <div class="col-md-2">\
              <div class="form-group">\
                  <label for="title" style="font-size:12px;">Pré-Heater:</label>\
                  <input class="form-control calc" type="text" id="preheater" name="preheater" style="width:75%;margin-left:3px;"></input>\
              </div>\
            </div>\
          </div>');
          $('#embranco').empty();
          $('#modific').empty();
          $.get("/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/myformTabela", {data: id_sistema}, function(data){
            var obj = JSON.parse(data);
            obj.forEach(function(o, index){
              var date = o.date_analise;
              var dateLaudo =  new Date(date);
              var dia = dateLaudo.getDate();
              if (dia.toString().length == 1)
                dia = "0"+dia;
              var mes = dateLaudo.getMonth()+1;
              if (mes.toString().length == 1)
                mes = "0"+mes;
              var ano = dateLaudo.getFullYear();
              formatted = dia+"-"+mes+"-"+ano;
              var id_laudo = o.laudo_id;
              var status_id = o.status_id;
              var colorStatus = "";
              if (o.laudo_id == null) {
                id_laudo = " - ";
                formatted = " - ";
              }
              if (status_id == "") {
                colorStatus = '#fff';
              }
              if (status_id == 1) {
                colorStatus = '#777d84';
              }
              if (status_id == 2) {
                colorStatus = '#3e658e';
              }
              if (status_id == 3) {
                colorStatus = '#00cc00';
              }
              if (status_id == 4) {
                colorStatus = '#fff000';
              }
              if (status_id == 5) {
                colorStatus = '#ff0000';
              }
              var secaolaudo = o.campo2;
              var optionHistorico = "<option value='0'>Seção</option><option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='3'>Zona #3</option><option value='4'>Zona #4</option><option value='5'>Pré-Heater</option>";
              if (secaolaudo == null || secaolaudo == "") {
                optionHistorico = optionHistorico;
              }
              if (secaolaudo == 1) {
                optionHistorico = "<option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='3'>Zona #3</option><option value='4'>Zona #4</option><option value='5'>Pré-Heater</option>";
              }
              if (secaolaudo == 2) {
                optionHistorico = "<option value='2'>Zona #2</option><option value='1'>Zona #1</option><option value='3'>Zona #3</option><option value='4'>Zona #4</option><option value='5'>Pré-Heater</option>";
              }
              if (secaolaudo == 3) {
                optionHistorico = "<option value='3'>Zona #3</option><option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='4'>Zona #4</option><option value='5'>Pré-Heater</option>";
              }
              if (secaolaudo == 4) {
                optionHistorico = "<option value='4'>Zona #4</option><option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='3'>Zona #3</option><option value='5'>Pré-Heater</option>";
              }
              if (secaolaudo == 5) {
                optionHistorico = "<option value='5'>Pré-Heater</option><option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='3'>Zona #3</option><option value='4'>Zona #4</option>";
              }
              var alarmeLaudo = o.campo5;
              if (alarmeLaudo == null) {
                alarmeLaudo = "";
              }
              var criticoLaudo = o.campo6;
              if (criticoLaudo == null) {
                criticoLaudo = "";
              }
              var atividade_id = o.id;
              var tag_id = o.tag_ativ;
              var tag_id_r = tag_id.replace(/ /g, "");
              var dataAnalise = $('#datacoleta').val();
              $('#modific').append('<form action="/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/adiciona" id="myform'+tag_id_r+'" name="myform'+tag_id_r+'" enctype="multipart/form-data">\
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>\
                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">\
                <input name="atividade_id" type="hidden" value="'+atividade_id+'">\
                <input name="atividade_tag" type="hidden" value="'+tag_id_r+'">\
                <input name="sistema_id" type="hidden" value="'+id_sistema+'">\
                <table id="tbl_normal" name="tbl_normal" width="100%" class="display table table-striped table-bordered table-hover" style="margin-top:-24px;">\
                <tbody>\
                  <tr id="tr_mutavel" name="tr_mutavel" style="border: 1px solid #ddd;">\
                      <td class="cab_cent" style="border: 0px solid #ddd;max-width:95px;">\
                         <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/'+o.laudo_id+'"\
                            target="_blank" class="btn buttondg" \
                            style="background: '+colorStatus+';border-top: 1px solid '+colorStatus+';color:#fff;min-width: 90px;">\
                           '+id_laudo+' TR <br> '+formatted+'\
                         </a>\
                      </td>\
                      <td class="cab_left strlengcut" style="font-size:12px;border:0px solid #ddd;padding-top:12px;">'+ tag_id +'</td>\
                      <td class="cab_left strlengcut" style="font-size:12px;border:0px solid #ddd;padding-top:12px;">'+ o.name_ativo +'</td>\
                      <td class="cab_left" style="font-size:12px;border:0px solid #ddd;padding-top:12px;min-width:300px;">'+ o.description_ativ +'</td>\
                      <td class="cab_left strlengcut" style="font-size:12px;border: 0px solid #ddd;">\
                        <select class="form-control movewithstatus" id="selecionaStatus'+tag_id_r+'" name="status_id" style="width:115px;height:25px;padding:5px 12px;font-size:10px;">\
                          <option value="3">NORMAL</option>\
                          <option value="1">MANUTENCAO</option>\
                          <option value="2">STAND BY</option>\
                          <option value="4">ALARME</option>\
                          <option value="5">CRITICO</option>\
                        </select>\
                      </td>\
                      <td class="cab_left strlengcut" style="border: 0px solid #ddd;">\
                        <button type="submit" name="btngerar" id="btngerar'+tag_id_r+'" class="btn btn-primary" style="padding: 3px 10px;font-size: 12px;margin-left:0px;"> Gerar </button>\
                      </td>\
                    </tr>\
                    <tr class="expand">\
                      <td colspan="6" style="border: 0px solid #ddd;padding: 0px 0px 0px 0px;">\
                        <div class="expand">\
                          <p style="display: inline-block;width: 10%;float: left;text-align: right;line-height: 15%;padding-top: 1%;padding-bottom: 0%;">\
                              <label for="num_termo" style="font-size:12px;margin-right:15px;margin-bottom:15px;line-height: 280%;">Termograma: </label>\
                              <br/><label for="temperatura" style="font-size:12px;margin-right:15px;line-height: 280%;">Temperatura: </label>\
                              <br/><label for="secao" style="font-size:12px;margin-right:15px;line-height: 280%;">Seção: </label>\
                              <br/><label for="zona" style="font-size:12px;margin-right:15px;line-height: 280%;">Temp.Zona: </label>\
                              <br/><label for="gradiente" style="font-size:12px;margin-right:15px;line-height: 280%;">Gradiente: </label>\
                          </p>\
                          <p style="margin-bottom:5px;text-align: right;display: inline-block;width: 10%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;font-size: 1.1rem;">\
                              <input id="termograma'+tag_id_r+'" name="termograma" class="form-control" type="text" style="font-size:12px;margin-bottom:10px;"></input>\
                              <br/><input id="temperatura'+tag_id_r+'" name="temperatura" class="form-control calc" type="text" style="font-size:12px;"></input>\
                              <br/><select class="form-control calc" id="selecionaZona'+tag_id_r+'" name="selecionaZona">\
                                '+optionHistorico+'\
                              </select>\
                              <br/><input id="zona'+tag_id_r+'" name="zona" class="form-control calc" type="text" style="font-size:12px;background-color:#eee"></input>\
                              <br/><input id="gradiente'+tag_id_r+'" name="gradiente" class="form-control calc" type="text" style="font-size:12px;background-color:#eee"></input>\
                          </p>\
                          <p style="display: inline-block;width: 15%;float: left;text-align: right;line-height: 210%;padding-top: 1%;padding-bottom: 0%;">\
                            <label for="data" style="font-size:12px;margin-right:15px;margin-bottom:15px;line-height: 280%;">Data:</label>\
                            <br/><label for="camera" style="font-size:12px;margin-right:15px;line-height: 280%;">Câmera:</label>\
                            <br/><label for="alarme" style="font-size:12px;margin-right:15px;line-height: 280%;">Alarme:</label>\
                            <br/><label for="critico" style="font-size:12px;margin-right:15px;line-height: 280%;">Crítico:</label>\
                            <br/><label for="diagnostico" style="font-size:12px;margin-right:15px;line-height: 280%;" >Diagnóstico:</label>\
                          </p>\
                          <p style="margin-bottom:5px;display: inline-block;width: 15%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;font-size: 1.1rem;">\
                            <input id="dataanalise'+tag_id_r+'" name="dataanalise" class="form-control calc" type="text" style="font-size:12px;margin-bottom:10px;background-color:#eee"></input>\
                            <br/><select class="form-control" id="camera'+tag_id_r+'" name="camera">\
                                <option value="3">FLIR T440 – 62107788</option>\
                                <option value="1">FLIR C2 – 720064326</option>\
                                <option value="2">FLIR C2 – 720063340</option>\
                                <option value="4">FLIR AX8 – 71211845</option>\
                                <option value="5">FLUKE – Ti45FT-0712299</option>\
                              </select>\
                              <br/><input id="alarme'+tag_id_r+'" name="alarme" class="form-control calc" type="text" style="font-size:12px;"></input>\
                              <br/><input id="critico'+tag_id_r+'" name="critico" class="form-control calc" type="text" style="font-size:12px;"></input>\
                              <br/><select class="form-control"  id="diagnostico_id'+tag_id_r+'" name="diagnostico_id">\
                                <option>Diagnósticos</option>\
                                @foreach($diagnosticos as $diagnosticos)\
                                  <option value="{{$diagnosticos->id}}">{{ $diagnosticos->name_diag }}</option>\
                                @endforeach\
                              </select>\
                          </p>\
                          <p style="margin-top:5px;margin-bottom:10px;text-align: right;display: inline-block;width: 45%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;padding-left: 5%;font-size: 1.1rem;">\
                            <label for="selecionaImagem" style="font-size:12px;line-height:10%">Selecione Imagem Termográfica:</label>\
                             {{ csrf_field() }}\
                             <input id="imagem'+tag_id_r+'" name="imagem" type="file" style="margin-bottom:2px;">\
                             <br/><textarea type="text" class="text form-control" id="obs'+tag_id_r+'" name="obs" rows="3" placeholder="Observações" maxlength="2048"></textarea>\
                            <br/><textarea type="text" class="text form-control" id="rec'+tag_id_r+'" name="rec" rows="3" placeholder="Recomendações" maxlength="2048"></textarea>\
                            <br/>\
                          </p>\
                        </div>\
                      </td>\
                    </tr>\
                  </tbody>\
                </table>\
              </form>');
            $("table tr td").find("div").hide();

            $('#selecionaStatus'+tag_id_r).on('click', function() {
              var dataAnalise = $('#datacoleta').val();
              $("#dataanalise"+tag_id_r).val(dataAnalise);
            });
              //CALCULO
              $('.calc').keyup(function(){
                var temperatura = parseFloat($("#temperatura"+tag_id_r).val().replace(".", "").replace(",", ".")) || 0.00;
                var z1 =  parseFloat($("#z1").val().replace(".", "").replace(",", ".")) || 0.00;
                var z2 =  parseFloat($("#z2").val().replace(".", "").replace(",", ".")) || 0.00;
                var z3 =  parseFloat($("#z3").val().replace(".", "").replace(",", ".")) || 0.00;
                var z4 =  parseFloat($("#z4").val().replace(".", "").replace(",", ".")) || 0.00;
                var z5 =  parseFloat($("#preheater").val().replace(".", "").replace(",", ".")) || 0.00;
                var secao =  parseFloat($("#selecionaZona"+tag_id_r).val().replace(".", "").replace(",", ".")) || 0.00;
                var zona = 0;
                var datacoleta = $("#datacoleta").val();

                if (temperatura != "") {
                  if (secao == 0) {
                    zona = zona;
                    var gradiente = 0;
                    var alarme = 0;
                    var critivo = 0;
                    $("#alarme"+tag_id_r).val(number_format(alarme,0, ',', '.'));
                    $("#critico"+tag_id_r).val(number_format(critico,0, ',', '.'));
                    $("#gradiente"+tag_id_r).val(number_format(gradiente,0, ',', '.'));
                    $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                    $("#dataanalise"+tag_id_r).val(datacoleta);
                  }
                  if (secao == 1) {
                    zona = z1;
                    var gradiente = zona-temperatura;
                    var alarme = zona*(0.3);
                    var critico = zona*(0.1);
                    $("#alarme"+tag_id_r).val(number_format(alarme,0, ',', '.'));
                    $("#critico"+tag_id_r).val(number_format(critico,0, ',', '.'));
                    $("#gradiente"+tag_id_r).val(number_format(gradiente,0, ',', '.'));
                    $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                    $("#dataanalise"+tag_id_r).val(datacoleta);
                  }
                  if (secao == 2) {
                    zona = z2;
                    var gradiente = zona-temperatura;
                    var alarme = zona*(0.3);
                    var critico = zona*(0.1);
                    $("#alarme"+tag_id_r).val(number_format(alarme,0, ',', '.'));
                    $("#critico"+tag_id_r).val(number_format(critico,0, ',', '.'));
                    $("#gradiente"+tag_id_r).val(number_format(gradiente,0, ',', '.'));
                    $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                    $("#dataanalise"+tag_id_r).val(datacoleta);
                  }
                  if (secao == 3) {
                    zona = z3;
                    var gradiente = zona-temperatura;
                    var alarme = zona*(0.3);
                    var critico = zona*(0.1);
                    $("#alarme"+tag_id_r).val(number_format(alarme,0, ',', '.'));
                    $("#critico"+tag_id_r).val(number_format(critico,0, ',', '.'));
                    $("#gradiente"+tag_id_r).val(number_format(gradiente,0, ',', '.'));
                    $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                    $("#dataanalise"+tag_id_r).val(datacoleta);
                  }
                  if (secao == 4) {
                    zona = z4;
                    var gradiente = zona-temperatura;
                    var alarme = zona*(0.3);
                    var critico = zona*(0.1);
                    $("#alarme"+tag_id_r).val(number_format(alarme,0, ',', '.'));
                    $("#critico"+tag_id_r).val(number_format(critico,0, ',', '.'));
                    $("#gradiente"+tag_id_r).val(number_format(gradiente,0, ',', '.'));
                    $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                    $("#dataanalise"+tag_id_r).val(datacoleta);
                  }
                  if (secao == 5) {
                    zona = z5;
                    var gradiente = zona-temperatura;
                    var alarme = zona*(0.3);
                    var critico = zona*(0.1);
                    $("#alarme"+tag_id_r).val(number_format(alarme,0, ',', '.'));
                    $("#critico"+tag_id_r).val(number_format(critico,0, ',', '.'));
                    $("#gradiente"+tag_id_r).val(number_format(gradiente,0, ',', '.'));
                    $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                    $("#dataanalise"+tag_id_r).val(datacoleta);
                  }
                }
              }); //FIM_CALCULO
              function number_format( number, decimals, dec_point, thousands_sep ) {
                var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
                var d = dec_point == undefined ? "," : dec_point;
                var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
                var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
              } //fim number_format
              $("table").click(function(event) {
                  event.stopPropagation();
                  var $target = $(event.target);
                  var id = $target.closest('.movewithstatus').val();
                  if ( id > 2) {
                    $target.closest("tr").next().find("div").slideDown();
                  } else {
                    $target.closest("tr").next().find("div").slideUp();
                  }
              });
              $('#myform'+tag_id_r).submit(function(e) {
                var formData = new FormData(this);
                $.ajax({
                       url: "/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/adiciona",
                       type: "POST",
                       data: formData, // serializes the form's elements.
                       success: function(data)
                       {
                           alert(data); // show response from the php script.
                           $("#btngerar"+tag_id_r).prop("disabled", true);
                       },
                      //
                      cache: false,
                      contentType: false,
                      processData: false,
                      xhr: function() { // Custom XMLHttpRequest
                          var myXhr = $.ajaxSettings.xhr();
                          if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                              myXhr.upload.addEventListener('progress', function() {
                                  /* faz alguma coisa durante o progresso do upload */
                              }, false);
                          }
                          return myXhr;
                      }
                      //
                     });
                e.preventDefault(); // avoid to execute the actual submit of the form.
              });
            }); //fim obj.forEach
          }); //fim função get
        } else {
          if(id_sistema == 163) {
            $('#zonas').empty();
            $('#zonas').append('<hr style="margin-top: 0px;margin-bottom: 0px;">\
            <div class="row" style="padding-top:15px; padding-bottom:15px;">\
              <div class="col-md-2 col-md-offset-1">\
                <div class="form-group">\
                    <label for="title" style="font-size:12px;">Zona #1:</label>\
                    <input class="form-control calc" type="text" id="z1" name="z1" style="width:75%;margin-left:3px;"></input>\
                </div>\
              </div>\
              <div class="col-md-2">\
                <div class="form-group">\
                    <label for="title" style="font-size:12px;">Zona #2:</label>\
                    <input class="form-control calc" type="text" id="z2" name="z2" style="width:75%;margin-left:3px;"></input>\
                </div>\
              </div>\
              <div class="col-md-2">\
                <div class="form-group">\
                    <label for="title" style="font-size:12px;">Zona #3:</label>\
                    <input class="form-control calc" type="text" id="z3" name="z3" style="width:75%;margin-left:3px;"></input>\
                </div>\
              </div>\
              <div class="col-md-2">\
                <div class="form-group">\
                    <label for="title" style="font-size:12px;">Zona #4:</label>\
                    <input class="form-control calc" type="text" id="z4" name="z4" style="width:75%;margin-left:3px;"></input>\
                </div>\
              </div>\
              <div class="col-md-2">\
                <div class="form-group">\
                    <label for="title" style="font-size:12px;">Pré-Heater:</label>\
                    <input class="form-control calc" type="text" id="preheater" name="preheater" style="width:75%;margin-left:3px;"></input>\
                </div>\
              </div>\
            </div>');
            $('#embranco').empty();
            $('#modific').empty();
            $.get("/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/myformTabela", {data: id_sistema}, function(data){
              var obj = JSON.parse(data);
              obj.forEach(function(o, index){
                var date = o.date_analise;
                var dateLaudo =  new Date(date);
                var dia = dateLaudo.getDate();
                if (dia.toString().length == 1)
                  dia = "0"+dia;
                var mes = dateLaudo.getMonth()+1;
                if (mes.toString().length == 1)
                  mes = "0"+mes;
                var ano = dateLaudo.getFullYear();
                formatted = dia+"-"+mes+"-"+ano;
                var id_laudo = o.laudo_id;
                var status_id = o.status_id;
                var colorStatus = "";
                if (o.laudo_id == null) {
                  id_laudo = " - ";
                  formatted = " - ";
                }
                if (status_id == "") {
                  colorStatus = '#fff';
                }
                if (status_id == 1) {
                  colorStatus = '#777d84';
                }
                if (status_id == 2) {
                  colorStatus = '#3e658e';
                }
                if (status_id == 3) {
                  colorStatus = '#00cc00';
                }
                if (status_id == 4) {
                  colorStatus = '#fff000';
                }
                if (status_id == 5) {
                  colorStatus = '#ff0000';
                }
                var secaolaudo = o.campo2;
                var optionHistorico = "<option value='0'>Seção</option><option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='3'>Zona #3</option><option value='4'>Zona #4</option><option value='5'>Pré-Heater</option>";
                if (secaolaudo == null || secaolaudo == "") {
                  optionHistorico = optionHistorico;
                }
                if (secaolaudo == 1) {
                  optionHistorico = "<option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='3'>Zona #3</option><option value='4'>Zona #4</option><option value='5'>Pré-Heater</option>";
                }
                if (secaolaudo == 2) {
                  optionHistorico = "<option value='2'>Zona #2</option><option value='1'>Zona #1</option><option value='3'>Zona #3</option><option value='4'>Zona #4</option><option value='5'>Pré-Heater</option>";
                }
                if (secaolaudo == 3) {
                  optionHistorico = "<option value='3'>Zona #3</option><option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='4'>Zona #4</option><option value='5'>Pré-Heater</option>";
                }
                if (secaolaudo == 4) {
                  optionHistorico = "<option value='4'>Zona #4</option><option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='3'>Zona #3</option><option value='5'>Pré-Heater</option>";
                }
                if (secaolaudo == 5) {
                  optionHistorico = "<option value='5'>Pré-Heater</option><option value='1'>Zona #1</option><option value='2'>Zona #2</option><option value='3'>Zona #3</option><option value='4'>Zona #4</option>";
                }
                var alarmeLaudo = o.campo5;
                if (alarmeLaudo == null) {
                  alarmeLaudo = "";
                }
                var criticoLaudo = o.campo6;
                if (criticoLaudo == null) {
                  criticoLaudo = "";
                }
                var atividade_id = o.id;
                var tag_id = o.tag_ativ;
                var tag_id_r = tag_id.replace(/ /g, "");
                var dataAnalise = $('#datacoleta').val();
                $('#modific').append('<form action="/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/adiciona" id="myform'+tag_id_r+'" name="myform'+tag_id_r+'" enctype="multipart/form-data">\
                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>\
                  <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">\
                  <input name="atividade_id" type="hidden" value="'+atividade_id+'">\
                  <input name="atividade_tag" type="hidden" value="'+tag_id_r+'">\
                  <input name="sistema_id" type="hidden" value="'+id_sistema+'">\
                  <table id="tbl_normal" name="tbl_normal" width="100%" class="display table table-striped table-bordered table-hover" style="margin-top:-24px;">\
                  <tbody>\
                    <tr id="tr_mutavel" name="tr_mutavel" style="border: 1px solid #ddd;">\
                        <td class="cab_cent" style="border: 0px solid #ddd;max-width:95px;">\
                           <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/'+o.laudo_id+'"\
                              target="_blank" class="btn buttondg" \
                              style="background: '+colorStatus+';border-top: 1px solid '+colorStatus+';color:#fff;min-width: 90px;">\
                             '+id_laudo+' TR <br> '+formatted+'\
                           </a>\
                        </td>\
                        <td class="cab_left strlengcut" style="font-size:12px;border:0px solid #ddd;padding-top:12px;">'+ tag_id +'</td>\
                        <td class="cab_left strlengcut" style="font-size:12px;border:0px solid #ddd;padding-top:12px;">'+ o.name_ativo +'</td>\
                        <td class="cab_left" style="font-size:12px;border:0px solid #ddd;padding-top:12px;min-width:300px;">'+ o.description_ativ +'</td>\
                        <td class="cab_left strlengcut" style="font-size:12px;border: 0px solid #ddd;">\
                          <select class="form-control movewithstatus" id="selecionaStatus'+tag_id_r+'" name="status_id" style="width:115px;height:25px;padding:5px 12px;font-size:10px;">\
                            <option value="3">NORMAL</option>\
                            <option value="1">MANUTENCAO</option>\
                            <option value="2">STAND BY</option>\
                            <option value="4">ALARME</option>\
                            <option value="5">CRITICO</option>\
                          </select>\
                        </td>\
                        <td class="cab_left strlengcut" style="border: 0px solid #ddd; width:30px">\
                          <button type="submit" name="btngerar" id="btngerar'+tag_id_r+'" class="btn btn-primary" style="padding: 3px 10px;font-size: 12px;"> Gerar </button>\
                        </td>\
                      </tr>\
                      <tr class="expand">\
                        <td colspan="6" style="border: 0px solid #ddd;padding: 0px 0px 0px 0px;">\
                          <div class="expand">\
                            <p style="display: inline-block;width: 10%;float: left;text-align: right;line-height: 15%;padding-top: 1%;padding-bottom: 0%;">\
                                <label for="num_termo" style="font-size:12px;margin-right:15px;margin-bottom:15px;line-height: 280%;">Termograma: </label>\
                                <br/><label for="temperatura" style="font-size:12px;margin-right:15px;line-height: 280%;">Temperatura: </label>\
                                <br/><label for="secao" style="font-size:12px;margin-right:15px;line-height: 280%;">Seção: </label>\
                                <br/><label for="zona" style="font-size:12px;margin-right:15px;line-height: 280%;">Temp.Zona: </label>\
                                <br/><label for="gradiente" style="font-size:12px;margin-right:15px;line-height: 280%;"> </label>\
                            </p>\
                            <p style="margin-bottom:5px;text-align: right;display: inline-block;width: 10%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;font-size: 1.1rem;">\
                                <input id="termograma'+tag_id_r+'" name="termograma" class="form-control" type="text" style="font-size:12px;margin-bottom:10px;"></input>\
                                <br/><input id="temperatura'+tag_id_r+'" name="temperatura" class="form-control calc" type="text" style="font-size:12px;"></input>\
                                <br/><select class="form-control calc" id="selecionaZona'+tag_id_r+'" name="selecionaZona">\
                                  '+optionHistorico+'\
                                </select>\
                                <br/><input id="zona'+tag_id_r+'" name="zona" class="form-control calc" type="text" style="font-size:12px;background-color:#eee"></input>\
                                <br/><input id="gradiente'+tag_id_r+'" name="gradiente" class="form-control calc" type="hidden" style="font-size:12px;background-color:#eee"></input>\
                            </p>\
                            <p style="display: inline-block;width: 15%;float: left;text-align: right;line-height: 210%;padding-top: 1%;padding-bottom: 0%;">\
                              <label for="data" style="font-size:12px;margin-right:15px;margin-bottom:15px;line-height: 280%;">Data:</label>\
                              <br/><label for="camera" style="font-size:12px;margin-right:15px;line-height: 280%;">Câmera:</label>\
                              <br/><label for="alarme" style="font-size:12px;margin-right:15px;line-height: 280%;">Alarme:</label>\
                              <br/><label for="critico" style="font-size:12px;margin-right:15px;line-height: 280%;">Crítico:</label>\
                              <br/><label for="diagnostico" style="font-size:12px;margin-right:15px;line-height: 280%;" >Diagnóstico:</label>\
                            </p>\
                            <p style="margin-bottom:5px;display: inline-block;width: 15%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;font-size: 1.1rem;">\
                              <input id="dataanalise'+tag_id_r+'" name="dataanalise" class="form-control calc" type="text" style="font-size:12px;margin-bottom:10px;background-color:#eee"></input>\
                              <br/><select class="form-control" id="camera'+tag_id_r+'" name="camera">\
                                  <option value="3">FLIR T440 – 62107788</option>\
                                  <option value="1">FLIR C2 – 720064326</option>\
                                  <option value="2">FLIR C2 – 720063340</option>\
                                  <option value="4">FLIR AX8 – 71211845</option>\
                                  <option value="5">FLUKE – Ti45FT-0712299</option>\
                                </select>\
                                <br/><input id="alarme'+tag_id_r+'" name="alarme" class="form-control calc" type="text" value="'+alarmeLaudo+'" style="font-size:12px;"></input>\
                                <br/><input id="critico'+tag_id_r+'" name="critico" class="form-control calc" type="text" value="'+criticoLaudo+'" style="font-size:12px;"></input>\
                                <br/><select class="form-control"  id="diagnostico_id'+tag_id_r+'" name="diagnostico_id">\
                                  <option>Diagnósticos</option>\
                                  @foreach($diagnosticos2 as $diagnosticos2)\
                                    <option value="{{$diagnosticos2->id}}">{{ $diagnosticos2->name_diag }}</option>\
                                  @endforeach\
                                </select>\
                            </p>\
                            <p style="margin-top:5px;margin-bottom:10px;text-align: right;display: inline-block;width: 45%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;padding-left: 5%;font-size: 1.1rem;">\
                              <label for="selecionaImagem" style="font-size:12px;line-height:10%">Selecione Imagem Termográfica:</label>\
                               {{ csrf_field() }}\
                               <input id="imagem'+tag_id_r+'" name="imagem" type="file" style="margin-bottom:2px;">\
                               <br/><textarea type="text" class="text form-control" id="obs'+tag_id_r+'" name="obs" rows="3" placeholder="Observações" maxlength="2048"></textarea>\
                              <br/><textarea type="text" class="text form-control" id="rec'+tag_id_r+'" name="rec" rows="3" placeholder="Recomendações" maxlength="2048"></textarea>\
                              <br/>\
                            </p>\
                          </div>\
                        </td>\
                      </tr>\
                    </tbody>\
                  </table>\
                </form>');
              $("table tr td").find("div").hide();

              $('#selecionaStatus'+tag_id_r).on('click', function() {
                var dataAnalise = $('#datacoleta').val();
                $("#dataanalise"+tag_id_r).val(dataAnalise);
              });
                //CALCULO
                $('.calc').keyup(function(){
                  var temperatura = parseFloat($("#temperatura"+tag_id_r).val().replace(".", "").replace(",", ".")) || 0.00;
                  var z1 =  parseFloat($("#z1").val().replace(".", "").replace(",", ".")) || 0.00;
                  var z2 =  parseFloat($("#z2").val().replace(".", "").replace(",", ".")) || 0.00;
                  var z3 =  parseFloat($("#z3").val().replace(".", "").replace(",", ".")) || 0.00;
                  var z4 =  parseFloat($("#z4").val().replace(".", "").replace(",", ".")) || 0.00;
                  var z5 =  parseFloat($("#preheater").val().replace(".", "").replace(",", ".")) || 0.00;
                  var secao =  parseFloat($("#selecionaZona"+tag_id_r).val().replace(".", "").replace(",", ".")) || 0.00;
                  var zona = 0;
                  var datacoleta = $("#datacoleta").val();

                  if (temperatura != "") {
                    if (secao == 0) {
                      zona = zona;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 1) {
                      zona = z1;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 2) {
                      zona = z2;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 3) {
                      zona = z3;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 4) {
                      zona = z4;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 5) {
                      zona = z5;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                  }
                }); //FIM_CALCULO
                function number_format( number, decimals, dec_point, thousands_sep ) {
                  var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
                  var d = dec_point == undefined ? "," : dec_point;
                  var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
                  var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
                } //fim number_format
                $("table").click(function(event) {
                    event.stopPropagation();
                    var $target = $(event.target);
                    var id = $target.closest('.movewithstatus').val();
                    if ( id > 2) {
                      $target.closest("tr").next().find("div").slideDown();
                    } else {
                      $target.closest("tr").next().find("div").slideUp();
                    }
                });
                $('#myform'+tag_id_r).submit(function(e) {
                  var formData = new FormData(this);
                  $.ajax({
                         url: "/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/adiciona",
                         type: "POST",
                         data: formData, // serializes the form's elements.
                         success: function(data)
                         {
                             alert(data); // show response from the php script.
                             $("#btngerar"+tag_id_r).prop("disabled", true);
                         },
                        //
                        cache: false,
                        contentType: false,
                        processData: false,
                        xhr: function() { // Custom XMLHttpRequest
                            var myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                                myXhr.upload.addEventListener('progress', function() {
                                    /* faz alguma coisa durante o progresso do upload */
                                }, false);
                            }
                            return myXhr;
                        }
                        //
                       });
                  e.preventDefault(); // avoid to execute the actual submit of the form.
                });
              }); //fim obj.forEach
            }); //fim função get
          } else {
            $('#zonas').empty();
            $('#embranco').empty();
            $('#modific').empty();
            $.get("/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/myformTabela", {data: id_sistema}, function(data){
              var obj = JSON.parse(data);
              obj.forEach(function(o, index){
                var date = o.date_analise;
                var dateLaudo =  new Date(date);
                var dia = dateLaudo.getDate();
                if (dia.toString().length == 1)
                  dia = "0"+dia;
                var mes = dateLaudo.getMonth()+1;
                if (mes.toString().length == 1)
                  mes = "0"+mes;
                var ano = dateLaudo.getFullYear();
                formatted = dia+"-"+mes+"-"+ano;
                var id_laudo = o.laudo_id;
                var status_id = o.status_id;
                var colorStatus = "";
                if (o.laudo_id == null) {
                  id_laudo = " - ";
                  formatted = " - ";
                }
                if (status_id == "") {
                  colorStatus = '#fff';
                }
                if (status_id == 1) {
                  colorStatus = '#777d84';
                }
                if (status_id == 2) {
                  colorStatus = '#3e658e';
                }
                if (status_id == 3) {
                  colorStatus = '#00cc00';
                }
                if (status_id == 4) {
                  colorStatus = '#fff000';
                }
                if (status_id == 5) {
                  colorStatus = '#ff0000';
                }
                var alarmeLaudo = o.campo5;
                if (alarmeLaudo == null) {
                  alarmeLaudo = "";
                }
                var criticoLaudo = o.campo6;
                if (criticoLaudo == null) {
                  criticoLaudo = "";
                }
                var atividade_id = o.id;
                var tag_id = o.tag_ativ;
                var tag_id_r = tag_id.replace(/ /g, "");
                var dataAnalise = $('#datacoleta').val();
                $('#modific').append('<form action="/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/adiciona" id="myform'+tag_id_r+'" name="myform'+tag_id_r+'" enctype="multipart/form-data">\
                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>\
                  <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">\
                  <input name="atividade_id" type="hidden" value="'+atividade_id+'">\
                  <input name="atividade_tag" type="hidden" value="'+tag_id_r+'">\
                  <input name="sistema_id" type="hidden" value="'+id_sistema+'">\
                  <table id="tbl_normal" name="tbl_normal" width="100%" class="display table table-striped table-bordered table-hover" style="margin-top:-24px;">\
                  <tbody>\
                    <tr id="tr_mutavel" name="tr_mutavel" style="border: 1px solid #ddd;">\
                        <td class="cab_cent" style="border: 0px solid #ddd;max-width:95px;">\
                           <a href="/preditiva.csn.br/laudos/termografia-isolamento/laudo/equipamento/'+o.laudo_id+'"\
                              target="_blank" class="btn buttondg" \
                              style="background: '+colorStatus+';border-top: 1px solid '+colorStatus+';color:#fff;min-width: 90px;">\
                             '+id_laudo+' TR <br> '+formatted+'\
                           </a>\
                        </td>\
                        <td class="cab_left strlengcut" style="font-size:12px;border:0px solid #ddd;padding-top:12px;">'+ tag_id +'</td>\
                        <td class="cab_left strlengcut" style="font-size:12px;border:0px solid #ddd;padding-top:12px;">'+ o.name_ativo +'</td>\
                        <td class="cab_left" style="font-size:12px;border:0px solid #ddd;padding-top:12px;min-width:300px;">'+ o.description_ativ +'</td>\
                        <td class="cab_left strlengcut" style="font-size:12px;border: 0px solid #ddd;">\
                          <select class="form-control movewithstatus" id="selecionaStatus'+tag_id_r+'" name="status_id" style="width:115px;height:25px;padding:5px 12px;font-size:10px;">\
                            <option value="3">NORMAL</option>\
                            <option value="1">MANUTENCAO</option>\
                            <option value="2">STAND BY</option>\
                            <option value="4">ALARME</option>\
                            <option value="5">CRITICO</option>\
                          </select>\
                        </td>\
                        <td class="cab_left strlengcut" style="border: 0px solid #ddd; width:30px">\
                          <button type="submit" name="btngerar" id="btngerar'+tag_id_r+'" class="btn btn-primary" style="padding: 3px 10px;font-size: 12px;"> Gerar </button>\
                        </td>\
                      </tr>\
                      <tr class="expand">\
                        <td colspan="6" style="border: 0px solid #ddd;padding: 0px 0px 0px 0px;">\
                          <div class="expand">\
                            <p style="display: inline-block;width: 10%;float: left;text-align: right;line-height: 15%;padding-top: 1%;padding-bottom: 0%;">\
                                <label for="num_termo" style="font-size:12px;margin-right:15px;margin-bottom:15px;line-height: 280%;">Termograma: </label>\
                                <br/><label for="temperatura" style="font-size:12px;margin-right:15px;line-height: 280%;">Temperatura: </label>\
                                <br/><label for="secao" style="font-size:12px;margin-right:15px;line-height: 280%;"> </label>\
                                <br/><label for="zona" style="font-size:12px;margin-right:15px;line-height: 280%;"> </label>\
                                <br/><label for="gradiente" style="font-size:12px;margin-right:15px;line-height: 280%;"> </label>\
                            </p>\
                            <p style="margin-bottom:5px;text-align: right;display: inline-block;width: 10%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;font-size: 1.1rem;">\
                                <input id="termograma'+tag_id_r+'" name="termograma" class="form-control" type="text" style="font-size:12px;margin-bottom:10px;"></input>\
                                <br/><input id="temperatura'+tag_id_r+'" name="temperatura" class="form-control calc" type="text" style="font-size:12px;"></input>\
                                <br/>\
                                <br/><input id="zona'+tag_id_r+'" name="zona" class="form-control calc" type="hidden" style="font-size:12px;background-color:#eee"></input>\
                                <br/><input id="gradiente'+tag_id_r+'" name="gradiente" class="form-control calc" type="hidden" style="font-size:12px;background-color:#eee"></input>\
                            </p>\
                            <p style="display: inline-block;width: 15%;float: left;text-align: right;line-height: 210%;padding-top: 1%;padding-bottom: 0%;">\
                              <label for="data" style="font-size:12px;margin-right:15px;margin-bottom:15px;line-height: 280%;">Data:</label>\
                              <br/><label for="camera" style="font-size:12px;margin-right:15px;line-height: 280%;">Câmera:</label>\
                              <br/><label for="alarme" style="font-size:12px;margin-right:15px;line-height: 280%;">Alarme:</label>\
                              <br/><label for="critico" style="font-size:12px;margin-right:15px;line-height: 280%;">Crítico:</label>\
                              <br/><label for="diagnostico" style="font-size:12px;margin-right:15px;line-height: 280%;" >Diagnóstico:</label>\
                            </p>\
                            <p style="margin-bottom:5px;display: inline-block;width: 15%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;font-size: 1.1rem;">\
                              <input id="dataanalise'+tag_id_r+'" name="dataanalise" class="form-control calc" type="text" style="font-size:12px;margin-bottom:10px;background-color:#eee"></input>\
                              <br/><select class="form-control" id="camera'+tag_id_r+'" name="camera">\
                                  <option value="3">FLIR T440 – 62107788</option>\
                                  <option value="1">FLIR C2 – 720064326</option>\
                                  <option value="2">FLIR C2 – 720063340</option>\
                                  <option value="4">FLIR AX8 – 71211845</option>\
                                  <option value="5">FLUKE – Ti45FT-0712299</option>\
                                </select>\
                                <br/><input id="alarme'+tag_id_r+'" name="alarme" class="form-control calc" type="text" value="'+alarmeLaudo+'" style="font-size:12px;"></input>\
                                <br/><input id="critico'+tag_id_r+'" name="critico" class="form-control calc" type="text" value="'+criticoLaudo+'" style="font-size:12px;"></input>\
                                <br/><select class="form-control"  id="diagnostico_id'+tag_id_r+'" name="diagnostico_id">\
                                  <option>Diagnósticos</option>\
                                  @foreach($diagnosticos3 as $diagnosticos3)\
                                    <option value="{{$diagnosticos3->id}}">{{ $diagnosticos3->name_diag }}</option>\
                                  @endforeach\
                                </select>\
                            </p>\
                            <p style="margin-top:5px;margin-bottom:10px;text-align: right;display: inline-block;width: 45%;float: left;text-align: left;line-height: 10%;padding-top: 1%;padding-bottom: 0%;padding-left: 5%;font-size: 1.1rem;">\
                              <label for="selecionaImagem" style="font-size:12px;line-height:10%">Selecione Imagem Termográfica:</label>\
                               {{ csrf_field() }}\
                               <input id="imagem'+tag_id_r+'" name="imagem" type="file" style="margin-bottom:2px;">\
                               <br/><textarea type="text" class="text form-control" id="obs'+tag_id_r+'" name="obs" rows="3" placeholder="Observações" maxlength="2048"></textarea>\
                              <br/><textarea type="text" class="text form-control" id="rec'+tag_id_r+'" name="rec" rows="3" placeholder="Recomendações" maxlength="2048"></textarea>\
                              <br/>\
                            </p>\
                          </div>\
                        </td>\
                      </tr>\
                    </tbody>\
                  </table>\
                </form>');
              $("table tr td").find("div").hide();

              $('#selecionaStatus'+tag_id_r).on('click', function() {
                var dataAnalise = $('#datacoleta').val();
                $("#dataanalise"+tag_id_r).val(dataAnalise);
              });
                //CALCULO
                $('.calc').keyup(function(){
                  var temperatura = parseFloat($("#temperatura"+tag_id_r).val().replace(".", "").replace(",", ".")) || 0.00;
                  var z1 =  parseFloat($("#z1").val().replace(".", "").replace(",", ".")) || 0.00;
                  var z2 =  parseFloat($("#z2").val().replace(".", "").replace(",", ".")) || 0.00;
                  var z3 =  parseFloat($("#z3").val().replace(".", "").replace(",", ".")) || 0.00;
                  var z4 =  parseFloat($("#z4").val().replace(".", "").replace(",", ".")) || 0.00;
                  var z5 =  parseFloat($("#preheater").val().replace(".", "").replace(",", ".")) || 0.00;
                  var secao =  parseFloat($("#selecionaZona"+tag_id_r).val().replace(".", "").replace(",", ".")) || 0.00;
                  var zona = 0;
                  var datacoleta = $("#datacoleta").val();

                  if (temperatura != "") {
                    if (secao == 0) {
                      zona = zona;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 1) {
                      zona = z1;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 2) {
                      zona = z2;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 3) {
                      zona = z3;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 4) {
                      zona = z4;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                    if (secao == 5) {
                      zona = z5;
                      $("#zona"+tag_id_r).val(number_format(zona,0, ',', '.'));
                      $("#dataanalise"+tag_id_r).val(datacoleta);
                    }
                  }
                }); //FIM_CALCULO
                function number_format( number, decimals, dec_point, thousands_sep ) {
                  var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
                  var d = dec_point == undefined ? "," : dec_point;
                  var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
                  var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
                } //fim number_format
                $("table").click(function(event) {
                    event.stopPropagation();
                    var $target = $(event.target);
                    var id = $target.closest('.movewithstatus').val();
                    if ( id > 2) {
                      $target.closest("tr").next().find("div").slideDown();
                    } else {
                      $target.closest("tr").next().find("div").slideUp();
                    }
                });
                $('#myform'+tag_id_r).submit(function(e) {
                  var formData = new FormData(this);
                  $.ajax({
                         url: "/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/adiciona",
                         type: "POST",
                         data: formData, // serializes the form's elements.
                         success: function(data)
                         {
                             alert(data); // show response from the php script.
                             $("#btngerar"+tag_id_r).prop("disabled", true);
                         },
                        //
                        cache: false,
                        contentType: false,
                        processData: false,
                        xhr: function() { // Custom XMLHttpRequest
                            var myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                                myXhr.upload.addEventListener('progress', function() {
                                    /* faz alguma coisa durante o progresso do upload */
                                }, false);
                            }
                            return myXhr;
                        }
                        //
                       });
                  e.preventDefault(); // avoid to execute the actual submit of the form.
                });
              }); //fim obj.forEach
            }); //fim função get

          } //fim else interno
        } //fim else externo
      });
    });

</script>

<script>
//FILTRO PARA O DROPDOWN SISTEMAS
$(document).ready(function() {
  $('select[name="negocio"]').on('change', function() {
      var negocioID = $(this).val();
      if(negocioID) {
          $.ajax({
              url: '/preditiva.csn.br/tecnico-preditiva/termografia-isolamento/sistemas/ajax/'+negocioID,
              type: "GET",
              dataType: "json",
              success:function(data) {
                  $('select[name="sistemas"]').empty();
                  $('select[name="sistemas"]').append('<option> Sistemas </option>');
                  $.each(data, function(key, name_sistema) {
                      $('select[name="sistemas"]').append('<option value="'+ key +'">'+ name_sistema +'</option>');
                  });
              }
          });
      }else{
          $('select[name="sistemas"]').empty();
      }
  });
});
</script>

<script>
    $(".mydata").datepicker({
        dateFormat: 'dd-mm-yy',
    }).datepicker("setDate", new Date());

    $('.timepickerIni').timepicker({
        timeFormat: 'HH:mm',
        interval: 15,
        defaultTime: '07:30',
        dropdown: true,
        scrollbar: true
    });
</script>

<script src='/js/jquery-2.2.4.min.js'></script>

<script>
  function moveScroll(){
      var scroll = $(window).scrollTop();
      var anchor_top = $('.table').offset().top;
      var anchor_bottom = $("#bottom_anchor").offset().top;
      if (scroll>anchor_top && scroll<anchor_bottom) {
      clone_table = $("#clone");
      if(clone_table.length == 0){
          clone_table = $('.table').clone();
          clone_table.attr('id', 'clone');
          clone_table.css({position:'fixed',
                   'pointer-events': 'none',
                   top:0});
          clone_table.width($('.table').width());
          $("#table-container").append(clone_table);
          $("#clone").css({visibility:'hidden'});
          $("#clone thead").css({visibility:'visible'});
      }
      } else {
      $("#clone").remove();
      }
  }
  $(window).scroll(moveScroll);
</script>








<!-- -->

<link href="/css/jquery.timepicker.min.css" rel="stylesheet">
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/js/additional-methods.js"></script>

<div id="wrapper-side" style="margin-top: 50px;">
  <!-- Sidebar -->
  @include('csn.technician.includes.sidebar-dashboard')

<form action="/preditiva.csn.br/tecnico-preditiva/resistencia/adiciona" method="post" name="myform" id="myform" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row" style="margin-top:-5px;">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default" style="background-color:#f1f1f1;">
            <div class="panel-heading">
                <strong>RESISTÊNCIA ÔHMICA E DE ISOLAMENTO</strong>
            </div>
            <div class="row" style="padding-top:20px;" id="pag_dois">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default" style="margin-bottom: -1px;" id="isolamento"><!-- PAINEL RESISTÊNCIA DE ISOLAMENTO -->
                  <div class="panel-heading" style="height: 45px;">
                    <div class="col-md-9">
                      Resistência de Isolamento (Mega Ohms):
                    </div>
                    <div class="col-md-3" style="margin-top: -2px">
                      <div class="sidebar">
                        <label for="title">Teste n°:</label>
                        <input type="text" name="teste" style="width: 50%; font-family: calibri;">
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding: 15px 15px 12px 45px;">
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">Temp.Inicial(°C):</label><br>
                        <input class="calc" type="text" id="tempInicial" name="tempInicial" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">Temp.Final(°C):</label><br>
                        <input class="calc" type="text" id="tempFinal" name="tempFinal" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">30segundos:</label><br>
                        <input class="calc" type="text" id="temp30" name="temp30" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">1minuto:</label><br>
                        <input class="calc" type="text" id="temp1" name="temp1" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">10minutos:</label><br>
                        <input class="calc" type="text" id="temp10" name="temp10" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">Tensão A.(V):</label><br>
                        <input class="calc" type="text" id="tensaoAplicada" name="tensaoAplicada" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                  </div>
                </div><!-- FIM PAINEL RESISTÊNCIA DE ISOLAMENTO -->

                <div class="panel panel-default" style="margin-bottom: 2px;" id="isolamento_norm"><!-- PAINEL NORMALIZADOS RESISTÊNCIA DE ISOLAMENTO-->
                  <div class="panel-heading">
                    Dados Normalizados (40°C):
                  </div>
                  <div class="row" style="padding: 15px 15px 12px 45px;">
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">30segundos:</label><br>
                        <input class="calc" type="text" id="temp30_norm" name="temp30_norm" style="width: 75%; margin-bottom:15px; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">1minuto:</label><br>
                        <input class="calc" type="text" id="temp1_norm" name="temp1_norm" style="width: 75%; margin-bottom:15px; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">10minutos:</label><br>
                        <input class="calc" type="text" id="temp10_norm" name="temp10_norm" style="width: 75%; margin-bottom:15px; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">IA:</label><br>
                        <input class="calc" type="text" id="ia" name="ia" style="width: 75%; margin-bottom:15px; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">IP:</label><br>
                        <input class="calc" type="text" id="ip" name="ip" style="width: 75%; margin-bottom:15px; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 3px;">
                      <div class="sidebar">
                        <label for="title" style="width:45%">Status IA: </label>
                        <input class="calc" type="text" id="status_ia" name="status_ia"
                          style="background-color: white; cursor: text; padding: 1px; border-width: 0px; border-style: none; border-color: transparent; border-image: none; width:45%;">
                      </div>
                      <div class="sidebar">
                        <label for="title" style="width:45%">Status IP: </label>
                        <input class="calc" type="text" id="status_ip" name="status_ip"
                          style="background-color: white; cursor: text; padding: 1px; border-width: 0px; border-style: none; border-color: transparent; border-image: none; width:45%;">
                      </div>
                    </div>

                  </div>
                </div> <!-- FIM PAINEL NORMALIZADOS RESISTÊNCIA DE ISOLAMENTO-->

                <div class="panel panel-default" style="margin-bottom: -2px;" id="ohmica"><!-- PAINEL RESISTÊNCIA ÔHMICA-->
                  <div class="panel-heading" style="height: 45px;">
                    <div class="col-md-5">
                      Resistência Ôhmica (mili Ohms):
                    </div>
                  </div>
                  <div class="row" style="padding: 15px 15px 12px 45px;">
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">RS:</label><br>
                        <input class="calc" type="text" id="rs" name="rs" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">RT:</label><br>
                        <input class="calc" type="text" id="rt" name="rt" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                          <label for="title">ST:</label><br>
                          <input class="calc" type="text" id="st" name="st" style="width: 75%; margin-bottom:15px; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">RS Ref:</label><br>
                        <input class="calc" type="text" id="rs_ref" name="rs_ref" value="{{ $rs_ref }}" style="width: 75%; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">RT Ref:</label><br>
                        <input class="calc" type="text" id="rt_ref" name="rt_ref" value="{{ $rt_ref }}" style="width: 75%; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">ST Ref:</label><br>
                        <input class="calc" type="text" id="st_ref" name="st_ref" value="{{ $st_ref }}" style="width: 75%; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                  </div>
                </div><!-- FIM PAINEL RESISTÊNCIA ÔHMICA-->
                <div class="panel panel-default" style="margin-bottom: 2px;" id="ohmica_norm"><!-- PAINEL NORMALIZADOS RESISTÊNCIA ÔHMICA-->
                  <div class="panel-heading">
                    Dados Normalizados (20°C):
                  </div>
                  <div class="row" style="padding: 15px 15px 12px 45px;">
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">RS:</label><br>
                        <input class="calc" type="text" id="rs_norm" name="rs_norm" style="width: 75%; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">RT:</label><br>
                        <input class="calc" type="text" id="rt_norm" name="rt_norm" style="width: 75%; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">ST:</label><br>
                        <input class="calc" type="text" id="st_norm" name="st_norm" style="width: 75%; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title">RO:</label><br>
                        <input class="calc" type="text" id="ro" name="ro" style="width: 75%; margin-bottom:15px; background:#eee; font-family: calibri;"><br>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="sidebar">
                        <label for="title" style="width:45%">Status RO: </label>
                        <input class="calc" type="text" id="status_ro" name="status_ro"
                          style="background-color: white; cursor: text; padding: 1px; border-width: 0px; border-style: none; border-color: transparent; border-image: none; width:45%;">
                      </div>
                    </div>
                  </div>
                </div> <!-- FIM PAINEL NORMALIZADOS RESISTÊNCIA ÔHMICA-->
              </div>
              <div class="row" style="padding-top: 20px;">
                <div class="col-md-12">
                  <div class="col-md-1 col-md-offset-1" style="padding: 5px 5px 5px 15px;">
                    <a href={{ route('resistencias.dashboard')}} class="btn btn-primary btn-block">Voltar</a>
                  </div>
                  <div class="col-md-1" style="padding: 5px 5px 5px 5px;">
                    <button type="button" class="btn btn-primary btn-block" id="proximo2">Próximo</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- =========================== PÁGINA 03 ================================= -->
            <div class="row" style="padding-top:12px;" id="pag_tres">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="row" style="padding-top:10px; padding-bottom:10px;">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="col-md-3" style="padding-top: 3px;">
                        <div class="sidebar">
                          <label for="title">Status IA: </label>
                          <input class="calc" type="text" id="status_ia_pg2" name="status_ia"
                            style="background-color: white; cursor: text; padding: 1px; border-width: 0px; border-style: none; border-color: transparent; border-image: none; width: 100%;">
                        </div>
                      </div>
                      <div class="col-md-3" style="padding-top: 3px;">
                        <div class="sidebar">
                          <label for="title">Status IP: </label>
                          <input class="calc" type="text" id="status_ip_pg2" name="status_ip"
                            style="background-color: white; cursor: text; padding: 1px; border-width: 0px; border-style: none; border-color: transparent; border-image: none; width: 100%;">
                        </div>
                      </div>
                      <div class="col-md-3" style="padding-top: 3px;">
                        <div class="sidebar">
                          <label for="title">Status RO: </label>
                          <input class="calc" type="text" id="status_ro_pg2" name="status_ro"
                            style="background-color: white; cursor: text; padding: 1px; border-width: 0px; border-style: none; border-color: transparent; border-image: none; width: 100%;">
                        </div>
                      </div>
                      <div class="col-md-3" style="padding-top: 3px;">
                        <div class="sidebar">
                          <label for="title">Status Sugerido: </label>
                          <input class="calc" type="text" id="status_final" name="status_final"
                            style="background-color: white; cursor: text; padding: 1px; border-width: 0px; border-style: none; border-color: transparent; border-image: none; width: 100%;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="padding-top: 90px;" id="pag_um">
                <div class="col-md-7 col-md-offset-1" style="padding-bottom:45px;">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        Histórico:
                    </div>
                    <div class="row" style="padding-top:15px; padding-bottom:15px;">
                      <div class="col-md-10 col-md-offset-1">
                      Tabela
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                <!-- CAPTURA O ID DO USUARIO LOGADO -->
                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                <input name="atividades" type="hidden" value="{{ $atividade_id }}">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      Inserir Dados da Coleta:
                  </div>
                  <div class="row" style="padding-top:15px; padding-bottom:15px;">
                    <div class="col-md-10 col-md-offset-1">
                    <!-- SELECAO DA DATA -->
                      <div class="sidebar" style="width: 100%;">
                        <label for="data">Data:</label>
                        <input type="text" class="form-control data" name="data"><br/>
                      </div><!-- -->
                    <!-- DROPDOWN STATUS -->
                    <div class="sidebar">
                      <div class="form-group">
                          <strong><label for="selecionaStatus">Selecione um Status:</label></strong>
                          <select class="form-control" id="selecionaStatus" name="status_id" style="width: 100%;">
                            <option>Status</option>
                            @foreach($status as $status)
                              <option value="{{$status->id}}">{{ $status->name_status }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div><!-- // -->
                    <!-- DROPDOWN DIAGNÓSTICOS -->
                    <div class="sidebar">
                      <div class="form-group" style="display: none;" id="dropDiag">
                          <strong><label for="selecionaDiagnostico">Selecione um Diagnóstico</label></strong>
                          <select class="form-control" id="selecionaDiagnostico" name="diagnostico_id" style="width: 100%;">
                            <option>Diagnósticos</option>
                            @foreach($diagnosticos as $diagnosticos)
                              <option value="{{$diagnosticos->id}}">{{ $diagnosticos->name_diag }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div><!-- // -->
                      </div>
                    </div>
                  </div>
                </div><!-- // FIM DA SEGUNDA COLUNA (DATA + DADOS INICIAIS DA COLETA)-->
                <div class="col-md-10 col-md-offset-1">
                  <!-- Caixa de texto para registrar as observações referentes as amostras-->
                  <div class="col-md-6">
                    <div class="sidebar">
                      <div class="form-group" style="display: none;" id="obs">&nbsp;
                        <strong><label>Observações</label></strong>
                        <br/>
                        <textarea type="text" class="text" name="observation" rows="4" maxlength="2048" style="width: 100%;"></textarea>
                      </div>
                    </div>
                  </div>
                   <!-- Caixa de texto para registrar as recomendações referentes as amostras-->
                   <div class="col-md-6">
                     <div class="sidebar">
                        <div class="form-group" style="display: none;" id="rec">&nbsp;
                          <strong><label>Recomendações</label></strong>
                          <br/>
                          <textarea type="text" class="text" name="recommendation" rows="4" maxlength="2048" style="width: 100%;"></textarea>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-1 col-md-offset-1" style="padding: 5px 5px 5px 15px;">
                  <button type="button" class="btn btn-primary btn-block" id="voltar3">Voltar</button>
                </div>
                <div class="col-md-1" style="padding: 5px 5px 5px 5px;">
                  <button type="button" class="btn btn-primary btn-block" id="proximo3" disabled="disabled">Próximo</button>
                </div>
                <div class="col-md-2" style="padding: 5px 50px 5px 10px;">
                  <button type="submit" class="btn btn-primary btn-block" id="cadastrar">Cadastrar</button>
                </div>
              </div>
            </div><!-- // FIM DA PRIMEIRA LINHA (FILTRO DE ATIVIDADE E DADOS INICIAIS DA COLETA)-->
        </div>
      </div>
    </div>
  </div>
</form>

<script>

  $(".data").datepicker({
      dateFormat: 'dd-mm-yy',
  }).datepicker("setDate", new Date());

  $('.timepickerIni').timepicker({
      timeFormat: 'HH:mm',
      interval: 15,
      defaultTime: '07:30',
      dropdown: true,
      scrollbar: true
  });

  $(document).ready(function(){
    $("#pag_dois").show();
    $("#pag_tres").hide();
      $("#proximo2").on('click', function(){
          $("#pag_dois").hide();
          $("#pag_tres").show();
      });
      $("#voltar3").on('click', function(){
        $("#pag_dois").show();
        $("#pag_tres").hide();
      });
  });

  $(document).ready(function() {
     $('#selecionaStatus').on('change', function() {
         switch(this.value) {
           //MANUTENÇÃO
           case '1':
             $("#obs").hide();
             $("#diag").hide();
             $("#rec").hide();
             $("#dropDiag").hide();
             break;
           //STAND BY
           case '2':
             $("#obs").hide();
             $("#rec").hide();
             $("#dropDiag").hide();
             break;
           //NORMAL
           case '3':
             $("#rec").show();
             $("#obs").show();
             $("#dropDiag").hide();
             break;
           //ALARME
           case '4':
             $("#obs").show();
             $("#dropDiag").show();
             $("#rec").show();
             break;
           //CRITICO
           case '5':
             $("#obs").show();
             $("#dropDiag").show();
             $("#rec").show();
             break;
           //OUTROS
           default:
             $("#obs").hide();
             $("#dropDiag").hide();
             $("#rec").hide();
             break;
         }
     });
  });
  $(document).ready(function(){
    $('.calc').keyup(function(){
        var tempInicial = parseFloat($('#tempInicial').val().replace(".", "").replace(",", ".")) || 0.00;
        var tempFinal = parseFloat($('#tempFinal').val().replace(".", "").replace(",", ".")) || 0.00;
        var temp30 = parseFloat($('#temp30').val().replace(".", "").replace(",", ".")) || 0.00;
        var temp1 = parseFloat($('#temp1').val().replace(".", "").replace(",", ".")) || 0.00;
        var temp10 = parseFloat($('#temp10').val().replace(".", "").replace(",", ".")) || 0.00;
        var rs = parseFloat($('#rs').val().replace(".", "").replace(",", ".")) || 0.00;
        var rt = parseFloat($('#rt').val().replace(".", "").replace(",", ".")) || 0.00;
        var st = parseFloat($('#st').val().replace(".", "").replace(",", ".")) || 0.00;
        var rs_ref = parseFloat($('#rs_ref').val().replace(".", "").replace(",", ".")) || 0.00;
        var rt_ref = parseFloat($('#rt_ref').val().replace(".", "").replace(",", ".")) || 0.00;
        var st_ref = parseFloat($('#st_ref').val().replace(".", "").replace(",", ".")) || 0.00;

        var t_1 = 0.0693147180564*tempInicial;
        var t10_1 = 0.0693147180564*tempFinal;
        var euler = Math.E;
        var t_2 = Math.pow(euler, t_1);
        var t_3 = 0.0625*t_2;
        var t10_2 = Math.pow(euler, t10_1);
        var t10_3 = 0.0625*t10_2;
        var temp30_norm = t_3*temp30;
        var temp1_norm = t_3*temp1;
        var temp10_norm = t10_3*temp10;
        var ia = temp1_norm/temp30_norm;
        var ip = temp10_norm/temp1_norm;
        var resist = 1+(0.0038*(tempFinal-20));
        var rs_norm_real = ((rs/resist)-rs_ref)/rs_ref;
        var rt_norm_real = ((rt/resist)-rt_ref)/rt_ref;
        var st_norm_real = ((st/resist)-st_ref)/st_ref;

        var rs_norm = rs_norm_real*100;
        var rt_norm = rt_norm_real*100;
        var st_norm = st_norm_real*100;

        if(rs_norm_real > 0) {
          var modulo_rs_n = rs_norm_real;
        } else {
          modulo_rs_n = rs_norm_real*(-1);
        }
        if(rt_norm_real > 0) {
          var modulo_rt_n = rt_norm_real;
        } else {
          modulo_rt_n = rt_norm_real*(-1);
        }
        if(st_norm_real > 0) {
          var modulo_st_n = st_norm_real;
        } else {
          modulo_st_n = st_norm_real*(-1);
        }

        if(modulo_rs_n > modulo_rt_n){
          var max_var = modulo_rs_n;
          var ro = rs_norm;
        } else {
          var max_var = modulo_rt_n;
          var ro = rt_norm;
        }
        if(max_var > modulo_st_n) {
          var ro = ro;
        } else {
          var ro = st_norm;
        }
        if (ia >= 1.1 || ia <= 1.499) {
          var status_ia = "Alarme";
        }
        if(ia >= 1.5) {
          var status_ia = "Normal";
        }
        if (ia < 1.1){
          var status_ia = "Crítico";
        }
        var status_ia_pg2 = status_ia;
        if (ip >= 1.5 || ip <= 3) {
          var status_ip = "Alarme";
        }
        if(ip > 3) {
          var status_ip = "Normal";
        }
        if (ip < 1.5){
          var status_ip = "Crítico";
        }
        var status_ip_pg2 = status_ip;
        var ro_abs = Math.abs (ro);
        if (ro_abs <= 5) {
          if (ro_abs <= 3) {
            var status_ro = "Normal";
          } else {
            var status_ro = "Alarme";
          }
        } else {
          var status_ro = "Crítico";
        }
        var status_ro_pg2 = status_ro;

        if (status_ia == "Crítico" || status_ip == "Crítico" || status_ro == "Crítico") {
          var status_final = "Crítico";
        } else if (status_ia == "Alarme" || status_ip == "Alarme" || status_ro == "Alarme") {
          var status_final = "Alarme";
        } else {
          var status_final = "Normal";
        }

        $('#temp30_norm').val(number_format(temp30_norm,3, ',', '.'));
        $('#temp1_norm').val(number_format(temp1_norm,3, ',', '.'));
        $('#temp10_norm').val(number_format(temp10_norm,3, ',', '.'));
        $('#ia').val(number_format(ia,2, ',', '.'));
        $('#ip').val(number_format(ip,2, ',', '.'));
        $('#rs_norm').val(number_format(rs_norm,2, ',', '.'));
        $('#rt_norm').val(number_format(rt_norm,2, ',', '.'));
        $('#st_norm').val(number_format(st_norm,2, ',', '.'));
        $('#ro').val(number_format(ro,2, ',', '.'));
        $('#status_ia').val(status_ia);
        $('#status_ip').val(status_ip);
        $('#status_ro').val(status_ro);
        $('#status_ia_pg2').val(status_ia_pg2);
        $('#status_ip_pg2').val(status_ip_pg2);
        $('#status_ro_pg2').val(status_ro_pg2);
        $('#status_final').val(status_final);
    });
  });

  function number_format( number, decimals, dec_point, thousands_sep ) {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
  }

  $("#myform").submit(function() {
    if($("#selecionaStatus").val() == null || $("#selecionaStatus").val() == "Status"){
        alert('Selecione o Status');
        return false;
    }
});

$("#myform").submit(function() {
    if($("#selecionaStatus").val() == "4" || $("#selecionaStatus").val() == "5"){
      if($("#selecionaDiagnostico").val() == "Diagnósticos"){
          alert('Selecione um Diagnóstico!');
          return false;
      }
    }
});

// Faz com que a tecla enter tenha efeito de TAB pulando de campo em campo
function gerenciaTeclaEnter() {
  $(document).ready(function() {
      $('input').keypress(function(e) {
          var code = null;
          code = (e.keyCode ? e.keyCode : e.which);
          return (code === 13) ? false : true;

      });

      $('input[type=text]').keydown(function(e) {
          // Obter o próximo índice do elemento de entrada de texto
          var next_idx = $('input[type=text]').index(this) + 1;

          // Obter o número de elemento de entrada de texto em um documento html
          var tot_idx = $('body').find('input[type=text]').length;

          // Entra na tecla no código ASCII
          if (e.keyCode === 13) {
              if (tot_idx === next_idx)
                  // Vá para o primeiro elemento de texto
                  $('input[type=text]:eq(0)').focus();
              else
                  // Vá para o elemento de entrada de texto seguinte
                  $('input[type=text]:eq(' + next_idx + ')').focus();
          }
      });
  });
}

</script>

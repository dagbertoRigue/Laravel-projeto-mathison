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
<div id="wrapper-side" style="margin-top: 50px;">
  <!-- Sidebar -->
  @include('csn.technician.includes.sidebar-dashboard')

  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default" style="background-color:#f1f1f1;">
            <div class="panel-heading">
                <strong>Análise Termográfica - Inserir Nova Amostra</strong>
            </div>
            <form action="/preditiva.csn.br/tecnico-preditiva/termografia/adiciona" method="post" name="myform" id="myform" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
              <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
              <div class="row" style="padding-top:30px">
                <div class="col-md-5 col-md-offset-1">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        Filtrar atividade:
                    </div>
                    <div class="row" style="padding-top:15px; padding-bottom:15px;">
                      <div class="col-md-10 col-md-offset-1">
                        <!-- DROPDOWN LINHA -->
                        <div class="form-group">
                          <label for="title">Selecione uma Linha:</label>
                          <select name="negocio"  id="negocio" class="form-control" style="width:100%;">
                              <option>Linhas</option>
                              @foreach ($negocios as $key => $value)
                                  <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                          </select>
                        </div>
                        <!-- DROPDOWN ATIVIDADES -->
                        <div class="sidebar">
                          <div class="form-group">
                              <label for="title">Selecione uma Atividade:</label>
                              <select name="atividades" id="atividades" class="form-control" style="width: 100%;">
                                <option value="0">Atividades</option>
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        Inserir Dados da Coleta:
                    </div>
                    <div class="row" style="padding-top:15px; padding-bottom:15px;">
                      <div class="col-md-5 col-md-offset-1">
                        <div class="sidebar">
                          <div class="form-group">
                            <label for="title">Status Sugerido: </label>
                            <input class="calc" type="text" id="status_final" name="status_final" placeholder="Aguarde.."
                              style="background-color: white; cursor: text; padding: 6px; border-width: 0px; border-style: none; border-color: transparent; border-image: none; width: 100%;"><br/>
                          </div>
                        </div>
                        <!-- DROPDOWN STATUS -->
                        <div class="sidebar">
                          <div class="form-group">
                              <label for="selecionaStatus">Selecione um Status:</label>
                              <select class="form-control" id="selecionaStatus" name="status_id" style="width: 87%;">
                                <option value="3">NORMAL</option>
                              @foreach($status as $status)
                                <option value="{{$status->id}}">{{ $status->name_status }}</option>
                              @endforeach
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <!-- SELECAO DA DATA -->
                        <div class="sidebar" style="width: 86%;">
                          <div class="form-group">
                            <label for="data">Data:</label>
                            <input type="text" class="form-control data" name="data">
                          </div>
                        </div>
                        <!-- DROPDOWN DIAGNÓSTICO -->
                        <div class="sidebar">
                          <div class="form-group" style="display: none;" id="dropDiag">
                            <label for="selecionaDiagnostico">Selecione um Diagnóstico</label>
                            <select class="form-control" id="selecionaDiagnostico" name="diagnostico_id" style="width: 86%;">
                              <option>Diagnósticos</option>
                              @foreach($diagnosticos as $diagnosticos)
                                <option value="{{$diagnosticos->id}}">{{ $diagnosticos->name_diag }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="padding-top:0px" style="display: none;">
                <div class="col-md-10 col-md-offset-1">
                  <div class="panel panel-default" id="pontos">
                    <div class="panel-heading">
                        Inserir Dados dos Pontos<input type="text" name="d_a" id="d_a" style="width: 450px; border-width: 0px;" placeholder=":">
                    </div>
                    <div class="input_fields_wrap">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="sidebar" style="padding:15px 55px;">
                            <div class="form-group" id="imgTermo">
                              <label for="selecionaImagem">Selecione o Termograma Ponto 1:</label>
                              {{ csrf_field() }}
                               <input name="uploadTermo1" type="file">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="sidebar" style="padding:15px 55px;">
                            <div class="form-group" id="imgVisivel">
                              <label for="selecionaImagem">Selecione a Imagem Visível Ponto 1:</label>
                              {{ csrf_field() }}
                               <input name="uploadVisivel1" type="file">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="sidebar" style="padding:15px 55px;">
                            <label for="desc_ponto">Nº Termograma:</label><br/>
                            <input type="text" name="nome_termo1" style="width: 95%"></input>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="sidebar" style="padding:15px 30px;">
                            <label for="desc_ponto">Câmera Utilizada:</label><br/>
                            <select class="form-control" name="camera_id1" id="camera_id1" style="width: 86%;">
                              <option value="3">FLIR T440 – 62107788</option>
                              <option value="1">FLIR C2 – 720064326</option>
                              <option value="2">FLIR C2 – 720063340</option>
                              <option value="4">FLIR AX8 – 71211845</option>
                              <option value="5">FLUKE – Ti45FT-0712299</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="sidebar" style="padding:15px 55px;">
                            <div class="form-group">
                              <label for="desc_ponto">Descrição do Ponto:</label><br/>
                              <input type="text" name="desc_ponto1" style="width: 95%"></input>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row" style="padding: 15px 15px 25px 45px;">
                        <div class="col-md-2">
                          <div class="sidebar">
                              <label for="tm" style="width: 90%">Temp.Medida(°C):</label><br/>
                              <input class="calc" type="text" placeholder="T.M." name="tempMax1" id="tempMax1" onchange="checkFilled();" style="width: 75%; margin-bottom:15px; font-family: calibri;"></input><br/>
                          </div>
                        </div>
                          <div class="col-md-2">
                            <div class="sidebar">
                              <label for="trta">Temp.Ref.(°C):</label><br/>
                              <input class="calc" type="text" placeholder="T.R./T.A." name="tempRef1" id="tempRef1" style="width: 75%; margin-bottom:15px; font-family: calibri;"></input><br/>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="sidebar">
                              <label for="vv">Veloc.Vento(m/s):</label><br/>
                              <input class="calc" type="text" placeholder="V.V." name="velVent1" id="velVent1" style="width: 75%; margin-bottom:15px; font-family: calibri;"></input><br/>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="sidebar">
                              <label for="dT">&#9651t:</label><br/>
                              <input class="calc" type="text" placeholder="&#9651t" name="dt1" id="dt1" style="width: 75%; background:#eee; font-family: calibri;"></input><br/>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="sidebar">
                              <label for="tc">Temp.Corrig(°C):</label><br/>
                              <input class="calc" type="text" placeholder="T.C." name="tc1" id="tc1" style="width: 75%; background:#eee; font-family: calibri;"></input><br/>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="sidebar">
                              <label for="maa" style="width: 90%">Máx.Aquec.Adm:</label><br/>
                              <input class="calc" type="text" placeholder="M.A.A." name="maa1" id="maa1" style="width: 75%; background:#eee; font-family: calibri;"></input><br/>
                            </div>
                          </div>
                          <input type="hidden" name="aux_status1" id="aux_status1">
                        </div>
                        <hr style="margin-top: 0px; margin-bottom: 0px;">
                      </div>
                      <div class="row">
                        <div class="col-md-1 col-md-offset-11">
                          <a class="add_field_button"><i class="fas fa-plus-circle" style="font-size:30px; color:#60a8ff; padding:5px 20px 0px 0px;"></i></i></a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="sidebar" style="padding:15px;">
                            <div class="form-group">
                              <label>Observações</label>
                              <br/>
                              <textarea type="text" class="text" name="observation" rows="3" maxlength="2048" style="width: 90%;"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                         <div class="sidebar" style="padding:15px;">
                            <div class="form-group">
                              <label>Recomendações</label>
                              <br/>
                              <textarea type="text" class="text" name="recommendation" rows="3" maxlength="2048" style="width: 90%;"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="x1" id="x1">
                  <div class="col-md-10 col-md-offset-1">
                    <button type="submit" class="btn btn-primary"> Gerar </button>
                  </div>
            </form>
            <div class="panel-body">
                <p></p>
            </div>
            <div class="row" id="tb" style="margin-top:0px;margin-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="panel-heading" style="font-size:18px">
                      Histórico
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body" style="color:#555;">
                    <div class="row" style="margin-top:0px;margin-bottom:15px;">
                      <div class="col-md-10 col-md-offset-1">
                        <p id="parag"></p>
                        <table id="tbl_normal" name="tbl_normal" width="100%" class="display table table-striped table-bordered table-hover" style="color:#555;margin-top:0px;margin-bottom:15px;">
                          <thead>
                            <tr style="border: 1px solid #ddd;">
                              <th class="cab_left"style="border: 0px solid #ddd;">Descrição</th>
                              <th class="cab_cent"style="border: 0px solid #ddd;">Laudos</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($tb_anormalidades as $key => $val)
                            <tr id="tr_mutavel" name="tr_mutavel" style="border: 1px solid #ddd;">
                              <td id="desc_ativo" class="cab_left strlengcut" style="font-size:13px;border: 0px solid #ddd;">{{$tb_anormalidades[$key]['descSistema']}}{{$tb_anormalidades[$key]['descAtivo']}}{{$tb_anormalidades[$key]['descAtividade']}}</td>
                              <td id="dados_laudo" class="cab_cent" style="border: 0px solid #ddd;">
                                <a href = "/preditiva.csn.br/laudos/termografia/laudo/equipamento/{{$tb_anormalidades[$key]['idLaudo']}}" target="_blank" class="btn buttondg" style="background: {{$tb_anormalidades[$key]['colorStatus']}};border-top: 1px solid {{$tb_anormalidades[$key]['colorStatus']}};
                                                      border: 1px solid {{$tb_anormalidades[$key]['colorStatus']}};">
                                  {{$tb_anormalidades[$key]['idLaudo']}} TE <br> {{ date('d-m-Y', strtotime(substr($tb_anormalidades[$key]['data'], 0, 10))) }}
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
  </div>
</div>

<script>
  $(document).ready(function(){
      $("#atividades").on('change', function() {
        var id_atividade = this.value;
        if(id_atividade) {
          $("#parag").empty();
          $('tbody').empty();
          //alert('ENTREI NA FUNÇÃO DA ATIVIDADE:\nId da Atividade: ' + id_atividade);
          $.get("/preditiva.csn.br/tecnico-preditiva/termografia/myformTabela", {data: id_atividade}, function(data){
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
              $('tbody').append('<tr id="tr_mutavel" name="tr_mutavel" style="border: 1px solid #ddd;">\
                <td id="desc_ativo" class="cab_left strlengcut" style="font-size:13px;border: 0px solid #ddd;">'+o.name_sistema+' - '+o.name_ativo+' - '+o.description_ativ+'</td>\
                <td id="dados_laudo" class="cab_cent" style="border: 0px solid #ddd;">\
                  <a href = "/preditiva.csn.br/laudos/termografia/laudo/equipamento/'+o.id+'" target="_blank" class="btn buttondg" style="background:'+o.color+';border-top: 1px solid '+o.color+';\
                                        border: 1px solid '+o.color+';">\
                    '+o.id+' TE <br> '+formatted+'\
                  </a>\
                </td>\
              </tr>');
                //alert(o.name_sistema);
            });
            //fim testar aqui
          });
        } else {}
      });
  });
</script>

<script>
$(document).ready(function(){
    $("#atividades").on('change', function() {
      var id_atividade = this.value;
      if(id_atividade) {
      //alert('ENTREI NA FUNÇÃO DA ATIVIDADE:\nId da Atividade: ' + id_atividade);
        $.get("/preditiva.csn.br/tecnico-preditiva/termografia/descricao-atividade", {data: id_atividade}, function(data){
          $("#d_a").val(data);
        });
      } else {}
    });
});

  $(document).ready(function() {
    $('#selecionaStatus').on('change', function() {
      switch(this.value) {
        //MANUTENCAO
        case '1':
          $("#dropDiag").hide();
          $("#pontos").hide();
          break;

        //STAND BY
        case '2':
          $("#dropDiag").hide();
          $("#pontos").hide();
          break;

        //NORMAL
        case '3':
          $("#dropDiag").hide();
          $("#pontos").show();
          break;

        //ALARME
        case '4':
          $("#dropDiag").show();
          $("#pontos").show();
          break;

        //CRITICO
        case '5':
          $("#dropDiag").show();
          $("#pontos").show();
          break;

        //OUTROS
        default:
          $("#dropDiag").hide();
          $("#pontos").hide();
          break;
      }
    });
  });

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

  //FILTRO PARA O DROPDOWN ATIVIDADES
  $(document).ready(function() {
    $('select[name="negocio"]').on('change', function() {
        var negocioID = $(this).val();
        if(negocioID) {
            $.ajax({
                url: '/preditiva.csn.br/tecnico-preditiva/termografia/atividades/ajax/'+negocioID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="atividades"]').empty();
                    $('select[name="atividades"]').append('<option> Atividades </option>');
                    $.each(data, function(key, tag_ativ) {
                        $('select[name="atividades"]').append('<option value="'+ key +'">'+ tag_ativ +'</option>');
                    });
                }
            });
        }else{
            $('select[name="atividades"]').empty();
        }
    });
  });

  $(document).ready(function() {
    $('.calc').keyup(function(){
      var tempMax1 = parseFloat($("#tempMax1").val().replace(".", "").replace(",", ".")) || 0.00;
      var tempRef1 = parseFloat($("#tempRef1").val().replace(".", "").replace(",", ".")) || 0.00;
      var velVent1 = parseFloat($("#velVent1").val().replace(".", "").replace(",", ".")) || 0.00;

      if (tempRef1 != "") {
        var dt1 = (tempMax1-tempRef1);
      } else {
        var dt1 = "";
      }
      if (velVent1 != "") {
        var tc1 = (dt1*((-0.0249*(Math.pow(velVent1,2)))+(0.4137*velVent1)+(0.6214)))+tempRef1;
        var maa1 = tc1/50;
      } else {
        var tc1 = "";
        var maa1 = "";
      }
      $("#dt1").val(number_format(dt1,2, ',', '.'));
      $("#tc1").val(number_format(tc1,2, ',', '.'));
      $("#maa1").val(number_format(maa1,2, ',', '.'));
      //----- status ----->
      if (velVent1 == null || velVent1 == "") {
        if (tempRef1 == null || tempRef1 == "") {
          if (tempMax1 < 60) {
            document.getElementById("dt1").style.background = "white";
            document.getElementById("maa1").style.background = "white";
            document.getElementById("tempMax1").style.background = "#99ef97";
              $("#aux_status1").val("Normal");
              $("#status_final").val("Normal");
          } else {
            if (tempMax1 < 80) {
              document.getElementById("dt1").style.background = "white";
              document.getElementById("maa1").style.background = "white";
              document.getElementById("tempMax1").style.background = "#ecef97";
              $("#aux_status1").val("Alarme");
              $("#status_final").val("Alarme");
            } else {
              document.getElementById("dt1").style.background = "white";
              document.getElementById("maa1").style.background = "white";
              document.getElementById("tempMax1").style.background = "#ef9797";
              $("#aux_status1").val("Crítico");
              $("#status_final").val("Crítico");
            }
          }
        } else {
          document.getElementById("tempMax1").style.background = "white";
          if (dt1 < 6) {
            document.getElementById("maa1").style.background = "white";
            document.getElementById("dt1").style.background = "#99ef97";
            $("#aux_status1").val("Normal");
            $("#status_final").val("Normal");
          } else {
            if (dt1 < 15) {
              document.getElementById("maa1").style.background = "white";
              document.getElementById("dt1").style.background = "#ecef97";
              $("#aux_status1").val("Alarme");
              $("#status_final").val("Alarme");
            } else {
              document.getElementById("maa1").style.background = "white";
              document.getElementById("dt1").style.background = "#ef9797";
              $("#aux_status1").val("Crítico");
              $("#status_final").val("Crítico");
            }
          }
        }
      } else {
        document.getElementById("dt1").style.background = "white";
        if (maa1 < 0.9) {
          document.getElementById("maa1").style.background = "#99ef97";
          $("#aux_status1").val("Normal");
          $("#status_final").val("Normal");
        } else {
          if (maa1 < 1.5) {
            document.getElementById("maa1").style.background = "#ecef97";
            $("#aux_status1").val("Alarme");
            $("#status_final").val("Alarme");
          } else {
            document.getElementById("maa1").style.background = "#ef9797";
            $("#aux_status1").val("Crítico");
            $("#status_final").val("Crítico");
          }
        }
      }
    });
  });


  function number_format( number, decimals, dec_point, thousands_sep ) {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
  }

$(document).ready(function() {

    var max_fields = 100; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count

    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $('#x1').val(x);
            $(wrapper).append('<div><div class="row">\
              <div class="col-md-6">\
                <div class="sidebar" style="padding:15px 55px;">\
                  <div class="form-group" id="imgTermo">\
                    <label for="selecionaImagem">Selecione o Termograma Ponto '+x+':</label>\
                    {{ csrf_field() }}\
                    <input name="uploadTermo'+x+'" id="uploadTermo'+x+'" type="file">\
                  </div>\
                </div>\
              </div>\
              <div class="col-md-6">\
                <div class="sidebar" style="padding:15px 55px;">\
                  <div class="form-group" id="imgTermo">\
                    <label for="selecionaImagem">Selecione a Imagem Visível Ponto '+x+':</label>\
                    {{ csrf_field() }}\
                    <input name="uploadVisivel'+x+'" id="uploadVisivel'+x+'" type="file">\
                  </div>\
                </div>\
              </div>\
            </div>\
            <div class="row">\
              <div class="col-md-3">\
                <div class="sidebar" style="padding:15px 55px;">\
                  <label for="desc_term">Nome do Termograma:</label><br/>\
                  <input type="text" name="nome_termo'+x+'" id="nome_termo'+x+'" style="width: 95%"></input>\
                </div>\
              </div>\
              <div class="col-md-3">\
                <div class="sidebar" style="padding:15px 30px;">\
                  <label for="desc_camera">Câmera Utilizada:</label><br/>\
                  <select class="form-control" name="camera_id'+x+'" id="camera_id'+x+'" style="width: 86%;">\
                  <option value="3">FLIR T440 – 62107788</option>\
                    <option value="1">FLIR C2 – 720064326</option>\
                    <option value="2">FLIR C2 – 720063340</option>\
                    <option value="4">FLIR AX8 – 71211845</option>\
                    <option value="5">FLUKE – Ti45FT-0712299</option>\
                  </select>\
                </div>\
              </div>\
              <div class="col-md-6">\
                <div class="sidebar" style="padding:15px 55px;">\
                  <div class="form-group">\
                    <label for="desc_ponto">Descrição do Ponto:</label><br/>\
                    <input type="text" name="desc_ponto'+x+'" id="desc_ponto'+x+'" style="width: 95%"></input>\
                  </div>\
                </div>\
              </div>\
            </div>\
          <div class="row" style="padding: 15px 15px 12px 45px;">\
            <div class="col-md-2">\
              <div class="sidebar">\
                  <label for="tm" style="width: 90%">Temp.Medida(°C):</label><br/>\
                  <input class="calcs" type="text" placeholder="T.M." name="tempMax'+x+'" id="tempMax'+x+'" onchange="checkFilled();" style="width: 75%; margin-bottom:15px; font-family: calibri;"></input><br/>\
              </div>\
            </div>\
              <div class="col-md-2">\
                <div class="sidebar">\
                  <label for="trta">Temp.Ref.(°C):</label><br/>\
                  <input class="calcs" type="text" placeholder="T.R./T.A." name="tempRef'+x+'" id="tempRef'+x+'" onchange="checkFilled();" style="width: 75%; margin-bottom:15px; font-family: calibri;"></input><br/>\
                </div>\
              </div>\
              <div class="col-md-2">\
                <div class="sidebar">\
                  <label for="vv">Veloc.Vento(m/s):</label><br/>\
                  <input class="calcs" type="text" placeholder="V.V." name="velVent'+x+'" id="velVent'+x+'" onchange="checkFilled();" style="width: 75%; margin-bottom:15px; font-family: calibri;"></input><br/>\
                </div>\
              </div>\
              <div class="col-md-2">\
                <div class="sidebar">\
                  <label for="dT">&#9651t:</label><br/>\
                  <input class="calcs" type="text" placeholder="&#9651t" name="dt'+x+'" id="dt'+x+'" onchange="checkFilled();" style="width: 75%; background:#eee; font-family: calibri;"></input><br/>\
                </div>\
              </div>\
              <div class="col-md-2">\
                <div class="sidebar">\
                  <label for="tc">Temp.Corrig(°C):</label><br/>\
                  <input class="calcs" type="text" placeholder="T.C." name="tc'+x+'" id="tc'+x+'" onchange="checkFilled();" style="width: 75%; background:#eee; font-family: calibri;"></input><br/>\
                </div>\
              </div>\
              <div class="col-md-2">\
                <div class="sidebar">\
                  <label for="maa" style="width: 90%">Máx.Aquec.Adm:</label><br/>\
                  <input class="calcs" type="text" placeholder="M.A.A." name="maa'+x+'" id="maa'+x+'" onchange="checkFilled();" style="width: 75%; background:#eee; font-family: calibri;"></input><br/>\
                </div>\
              </div>\
            </div>\
            <a href="#" class="remove_field"><i class="fas fa-minus-circle" style="font-size:30px; color:#ff6060; padding:15px;"></i></a>\
            <input class="calcs" type="hidden" name="xCase'+x+'" id="xCase'+x+'">\
            <input type="hidden" name="aux_status'+x+'" id="aux_status'+x+'">\
            <hr style="margin-top: 0px; margin-bottom: 0px;">\
            </div>');
            $(("#xCase"+x)).val(x);
            $('.calcs').keyup(function(){
              var tempMax = parseFloat($("#tempMax"+x).val().replace(".", "").replace(",", ".")) || 0.00;
              var tempRef = parseFloat($("#tempRef"+x).val().replace(".", "").replace(",", ".")) || 0.00;
              var velVent = parseFloat($("#velVent"+x).val().replace(".", "").replace(",", ".")) || 0.00;

              if (tempRef != "") {
                var dt = (tempMax-tempRef);
              } else {
                var dt = "";
              }
              if (velVent != "") {
                var tc = (dt*((-0.0249*(Math.pow(velVent,2)))+(0.4137*velVent)+(0.6214)))+tempRef;
                var maa = tc/50;
              } else {
                var tc = "";
                var maa = "";
              }
              $("#dt"+x).val(number_format(dt,2, ',', '.'));
              $("#tc"+x).val(number_format(tc,2, ',', '.'));
              $("#maa"+x).val(number_format(maa,2, ',', '.'));
              //----- status ----->
              if (velVent == null || velVent == "") {
                if (tempRef == null || tempRef == "") {
                  if (tempMax < 60) {
                    document.getElementById("dt"+x).style.background = "white";
                    document.getElementById("maa"+x).style.background = "white";
                    document.getElementById("tempMax"+x).style.background = "#99ef97";
                    $("#aux_status"+x).val("Normal");
                  } else {
                    if (tempMax < 80) {
                      document.getElementById("maa"+x).style.background = "white";
                      document.getElementById("dt"+x).style.background = "white";
                      document.getElementById("tempMax"+x).style.background = "#ecef97";
                      $("#aux_status"+x).val("Alarme");
                    } else {
                      document.getElementById("dt"+x).style.background = "white";
                      document.getElementById("tempMax"+x).style.background = "#ef9797";
                      $("#aux_status"+x).val("Crítico");
                    }
                  }
                } else {
                  document.getElementById("tempMax"+x).style.background = "white";
                  if (dt < 6) {
                    document.getElementById("dt"+x).style.background = "#99ef97";
                    document.getElementById("maa"+x).style.background = "white";
                    $("#aux_status"+x).val("Normal");
                  } else {
                    if (dt < 15) {
                      document.getElementById("dt"+x).style.background = "#ecef97";
                      document.getElementById("maa"+x).style.background = "white";
                      $("#aux_status"+x).val("Alarme");
                    } else {
                        document.getElementById("dt"+x).style.background = "#ef9797";
                        document.getElementById("maa"+x).style.background = "white";
                        $("#aux_status"+x).val("Crítico");
                    }
                  }
                }
              } else {
                document.getElementById("dt"+x).style.background = "white";
                if (maa < 0.9) {
                  document.getElementById("maa"+x).style.background = "#99ef97";
                  $("#aux_status"+x).val("Normal");
                } else {
                  if (maa < 1.5) {
                    document.getElementById("maa"+x).style.background = "#ecef97";
                    $("#aux_status"+x).val("Alarme");
                  } else {
                    document.getElementById("maa"+x).style.background = "#ef9797";
                    $("#aux_status"+x).val("Crítico");
                  }
                }
              }
              var flag = 0;
              for (var i = 1; i <= ($("#x1").val()); i++) {
                var set_critico = $("#aux_status"+i).val();
                if (set_critico == "Crítico") {
                  flag = 5;
                }
              }
              if (flag != 5) {
                for (var i = 1; i <= ($("#x1").val()); i++) {
                  var set_alarme = $("#aux_status"+i).val();
                  if (set_alarme == "Alarme") {
                    flag = 4;
                  }
                }
              }
              if (flag == 5) {
                $("#status_final").val("Crítico");
              } else if (flag == 4) {
                $("#status_final").val("Alarme");
              } else {
                $("#status_final").val("Normal");
              }
            });
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
  });

$("#myform").submit(function() {
  if(($("#negocio").val() == null || $("#negocio").val() == "Linhas") && ($("#atividades").val() == null || $("#atividades").val() == "Atividades")){
      alert('Selecione a Linha!');
      return false;
  }
  if ($("#negocio").val() != "Linhas" && $("#atividades").val() == "Atividades") {
      alert('Selecione a Atividade!');
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

//tabela
$(document).ready(function() {
    $('#tbl_normal').DataTable({
      "ordering": false
    });
});
</script>

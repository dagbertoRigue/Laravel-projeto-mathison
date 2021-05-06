<link href="/css/jquery.timepicker.min.css" rel="stylesheet">
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/js/additional-methods.js"></script>
<link rel="stylesheet" href="/css/relatorioGerencial.css">
<link rel="stylesheet" href="/plugins/summernote/dist/summernote.css">
<link rel="stylesheet" href="/plugins/summernote/dist/summernote.min.js">

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
                   <strong>Análise de Vibração - Inserir Nova Amostra</strong>
               </div>
                <form action="/preditiva.csn.br/tecnico-preditiva/vibracao/adiciona" method="post" name="myform" id="myform" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
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
                              <select name="negocio" id="negocio" class="form-control" style="width:100%;">
                                  <option>Linhas</option>
                                  @foreach ($negocios as $key => $value)
                                      <option value="{{ $key }}">{{ $value }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <hr align="center" width="100%" size="1" color=#fff>
                            <!-- DROPDOWN ATIVIDADES -->
                            <div class="sidebar">
                              <div class="form-group">
                                  <label for="title">Selecione uma Atividade:</label>
                                  <select name="atividades" id="atividades" class="form-control" style="width: 100%;">
                                    <option>Atividades</option>
                                  </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <!-- CAPTURA O ID DO USUARIO LOGADO -->
                      <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">

                      <div class="panel panel-default">
                        <div class="panel-heading">
                            Inserir Dados da Coleta:
                        </div>
                        <div class="row" style="padding-top:15px; padding-bottom:15px;">
                          <div class="col-md-10 col-md-offset-1">
                          <!-- SELECAO DA DATA -->
                            <div class="sidebar">
                              <div class="form-group">
                                <label for="data">Data:</label>
                                <input type="text" class="form-control data" name="data" style="width: 50%;">
                              </div>
                            </div>
                            <hr align="center" width="100%" size="1" color=#fff>
                            <!-- DROPDOWN STATUS -->
                            <div class="sidebar">
                              <div class="form-group">
                                  <strong><label for="selecionaStatus">Selecione um Status:</label></strong>
                                  <select class="form-control" id="selecionaStatus" name="status_id" style="width: 50%;">
                                    <option value="3">NORMAL</option>
                                  @foreach($status as $status)
                                    <option value="{{$status->id}}">{{ $status->name_status }}</option>
                                  @endforeach
                                  </select>
                              </div>
                            </div>
                            <!-- DROPDOWN DIAGNÓSTICOS -->
                            <div class="sidebar">
                              <div class="form-group" style="display: none;" id="dropDiag">
                                  <strong><label for="selecionaDiagnostico">Selecione um Diagnóstico</label></strong>
                                  <select class="form-control" id="selecionaDiagnostico" name="diagnostico_id" style="width: 50%;">
                                  <option>Diagnósticos</option>
                                  @foreach($diagnosticos as $diagnosticos)
                                    <option value="{{$diagnosticos->id}}">{{ $diagnosticos->name_diag }}</option>
                                  @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="sidebar">
                              <div class="form-group" style="display: none;" id="imagens">
                                <hr>
                                <strong><label for="selecionaImagem">Selecione as Imagens:</label></strong><br>
                                {{ csrf_field() }}
                                 <input name="uploads[]" type="file" multiple />
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- // FIM DA SEGUNDA COLUNA (DATA + DADOS INICIAIS DA COLETA)-->
                  </div><!-- // FIM DA PRIMEIRA LINHA (FILTRO DE ATIVIDADE E DADOS INICIAIS DA COLETA)-->

                  <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-6" style="margin-left: -15px; padding-right: 30px;">
                      <div class="sidebar">
                        <div class="form-group" style="display: none;" id="obs">&nbsp;
                          <strong><label>Observações</label></strong>
                          <br/>
                          <textarea id="observation" type="text" class="text" name="observation" rows="10" maxlength="2048" style="width: 100%;"></textarea>
                        </div>
                      </div>
                    </div>
                     <div class="col-md-6" style="padding-left: 50px; padding-right: 0px;">
                     <div class="sidebar">
                        <div class="form-group" style="display: none;" id="rec">&nbsp;
                          <strong><label>Recomendações</label></strong>
                          <br/>
                          <textarea id="textarea_rec" type="text" class="text" name="recommendation" rows="10" maxlength="2048" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    </div>
                  </div>
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
                                        <a href = "/preditiva.csn.br/laudos/vibracao/laudo/equipamento/{{$tb_anormalidades[$key]['idLaudo']}}" target="_blank" class="btn buttondg" style="background: {{$tb_anormalidades[$key]['colorStatus']}};border-top: 1px solid {{$tb_anormalidades[$key]['colorStatus']}};
                                                              border: 1px solid {{$tb_anormalidades[$key]['colorStatus']}};">
                                          {{$tb_anormalidades[$key]['idLaudo']}} VB <br> {{ date('d-m-Y', strtotime(substr($tb_anormalidades[$key]['data'], 0, 10))) }}
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
            $.get("/preditiva.csn.br/tecnico-preditiva/vibracao/myformTabela", {data: id_atividade}, function(data){
              //testar aqui
              // convertendo a string em objeto
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
                  <td id="desc_ativo" class="cab_left strlengcut" style="font-size:13px;border: 0px solid #ddd;">'+o.name_sistema+' - '+o.name_ativo+'</td>\
                  <td id="dados_laudo" class="cab_cent" style="border: 0px solid #ddd;">\
                    <a href = "/preditiva.csn.br/laudos/vibracao/laudo/equipamento/'+o.id+'" target="_blank" class="btn buttondg" style="background:'+o.color+';border-top: 1px solid '+o.color+';\
                                          border: 1px solid '+o.color+';">\
                      '+o.id+' VB <br> '+formatted+'\
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
 $(document).ready(function() {
    $('#selecionaStatus').on('change', function() {
        switch(this.value) {
          //MANUTENCAO
          case '1':
            $("#dropDiag").hide();
            $("#obs").hide();
            $("#rec").hide();
            $("#imagens").hide();
            break;

          //STAND BY
          case '2':
            $("#dropDiag").hide();
            $("#obs").hide();
            $("#rec").hide();
            $("#imagens").hide();
            break;

          //NORMAL
          case '3':
            $("#dropDiag").hide();
            $("#obs").hide();
            $("#rec").hide();
            $("#imagens").hide();
            break;

          //ALARME
          case '4':
            $("#dropDiag").show();
            $("#obs").show();
            $("#rec").show();
            $("#imagens").show();
            break;

          //CRITICO
          case '5':
            $("#dropDiag").show();
            $("#obs").show();
            $("#rec").show();
            $("#imagens").show();
            break;

          //OUTROS
          default:
            $("#dropDiag").show();
            $("#obs").hide();
            $("#rec").hide();
            $("#imagens").hide();
            break;
        }
    });
 });


  $(".data").datepicker({
      dateFormat: 'yy-mm-dd',
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
                url: '/preditiva.csn.br/tecnico-preditiva/vibracao/atividades/ajax/'+negocioID,
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

  $("#myform").submit(function() {
    if($("#negocio").val() == null || $("#negocio").val() == "Linhas"){
        alert('Selecione a Linha!');
        return false;
    }
  });
  $("#myform").submit(function() {
      if($("#atividades").val() == null || $("#atividades").val() == "Atividades"){
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
//textareas
  $(document).ready(function() {
            $('#observation').summernote({
              height:300,
            });
        });

</script>

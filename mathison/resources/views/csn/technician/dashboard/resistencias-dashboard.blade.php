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

<form action="/preditiva.csn.br/tecnico-preditiva/resistencia/inserir-coleta" method="post" name="myform" id="myform">
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row" style="margin-top:-5px;">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default" style="background-color:#f1f1f1;">
            <div class="panel-heading">
                <strong>RESISTÊNCIA ÔHMICA E DE ISOLAMENTO</strong>
            </div>
            <div class="row" style="padding-top: 90px;" id="pag_um">
              <div class="col-md-10 col-md-offset-1" style="padding-bottom:5px;">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      Filtrar atividade:
                  </div>
                  <div class="row" style="padding-top:15px; padding-bottom:15px;">
                    <div class="col-md-6 col-md-offset-3">
                      <!-- DROPDOWN LINHA -->
                      <div class="form-group">
                        <label for="title">Selecione uma Linha:</label>
                        <select name="negocio" class="form-control" style="width:100%;">
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
                      <!-- // -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="padding-top: 20px;">
                <div class="col-md-12">
                  <div class="col-md-1 col-md-offset-1" style="padding: 5px 5px 5px 15px;">
                    <button type="button" class="btn btn-primary btn-block" id="voltar" disabled="disabled">Voltar</button>
                  </div>
                  <div class="col-md-1" style="padding: 5px 5px 5px 5px;">
                    <button type="submit" class="btn btn-primary btn-block" id="proximo">Próximo</button>
                  </div>
                  <div class="panel-body">
                      <p></p>
                  </div>
                  <div class="row" id="tb" style="margin-top:45px;margin-bottom:15px;">
                    <div class="col-md-10 col-md-offset-1" style="padding-left: 28px;padding-right: 27px;">
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
                                      <a href = "/preditiva.csn.br/laudos/resistencia/laudo/equipamento/{{$tb_anormalidades[$key]['idLaudo']}}" target="_blank" class="btn buttondg" style="background: {{$tb_anormalidades[$key]['colorStatus']}};border-top: 1px solid {{$tb_anormalidades[$key]['colorStatus']}};
                                                            border: 1px solid {{$tb_anormalidades[$key]['colorStatus']}};">
                                        {{$tb_anormalidades[$key]['idLaudo']}} RM <br> {{ date('d-m-Y', strtotime(substr($tb_anormalidades[$key]['data'], 0, 10))) }}
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
  $(document).ready(function(){
      $("#atividades").on('change', function() {
        var id_atividade = this.value;
        if(id_atividade) {
          $("#parag").empty();
          $('tbody').empty();
          //alert('ENTREI NA FUNÇÃO DA ATIVIDADE:\nId da Atividade: ' + id_atividade);
          $.get("/preditiva.csn.br/tecnico-preditiva/resistencia/myformTabela", {data: id_atividade}, function(data){
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
                <td id="desc_ativo" class="cab_left strlengcut" style="font-size:13px;border: 0px solid #ddd;">'+o.name_sistema+' - '+o.name_ativo+' - '+o.description_ativ+'</td>\
                <td id="dados_laudo" class="cab_cent" style="border: 0px solid #ddd;">\
                  <a href = "/preditiva.csn.br/laudos/resistencia/laudo/equipamento/'+o.id+'" target="_blank" class="btn buttondg" style="background:'+o.color+';border-top: 1px solid '+o.color+';\
                                        border: 1px solid '+o.color+';">\
                    '+o.id+' RM <br> '+formatted+'\
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
                url: '/preditiva.csn.br/tecnico-preditiva/resistencia/atividades/ajax/'+negocioID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="atividades"]').empty();
                    $('select[name="atividades"]').append('<option> Atividades </option>');
                    $.each(data, function(key, value) {
                        $('select[name="atividades"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }else{
            $('select[name="atividades"]').empty();
        }
    });
  });

  $("#myform").submit(function() {
    if($("#atividades").val() == null || $("#atividades").val() == "Atividades"){
        alert('Selecione a Atividade!');
        return false;
    }
  });
  //desabilita o ENTER no formulário
  $('html').bind('keypress', function(e) {
   if(e.keyCode == 13) {
      return false;
   }
  });

  //tabela
  $(document).ready(function() {
      $('#tbl_normal').DataTable({
        "ordering": false
      });
  });
</script>

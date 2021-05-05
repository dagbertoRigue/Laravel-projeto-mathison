<link href="/css/jquery.timepicker.min.css" rel="stylesheet">
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/js/additional-methods.js"></script>
<script src="/js/jquery-1.11.2.min.js"></script>

<div id="wrapper-side" style="margin-top: 50px;">
  <!-- Sidebar -->
  @include('csn.technician.includes.sidebar-dashboard')

  <form action="/preditiva.csn.br/tecnico-preditiva/configuracoes/editar/atividade/termografia-isolamento/adiciona" method="post" name="myform" id="myform" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
    <input type="hidden" id="atividade_id" name="atividade_id" value="{{ $atividades }}"><br>
    <div id="page-content-wrapper-side">
      <div class="container-fluid">
        <div class="row" style="margin-top:-5px;">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="background-color:#f1f1f1;">
              <div class="panel-heading">
                <strong>Termografia de Isolamento</strong>
              </div>
              <div class="row" style="padding-top: 90px;">
                <div class="col-md-6 col-md-offset-3" style="padding-bottom:45px;">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar atividade:
                    </div>
                    <div class="row" style="padding-top:15px; padding-bottom:15px;">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="row" style="padding-top:15px; padding-bottom:15px;">
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="sidebar">
                                <label for="title">TAG:</label><br>
                                <input type="text" id="tag" name="tag" value="{{ $tag }}" style="width: 100%; background:#eee;"><br>
                                <br>
                                @if (session('alert2'))
                                    <div class="alert alert-danger">
                                        {{ session('alert2') }}
                                    </div>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="sidebar">
                                <label for="title">Descrição:</label><br>
                                <input type="text" id="descricao" name="descricao" value="{{ $descricao }}" style="width: 100%; background:#eee;"><br>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row" style="padding-top:15px; padding-bottom:15px;">
                          <div class="col-md-12" style="padding-right: 0px; padding-left: 0px;">
                            <div class="form-group">
                              <div class="col-md-7">
                                <div class="sidebar">
                                  <div class="form-group" id="imagemTR" style="padding-top:15px;">
                                    <strong><label>Selecione Imagem:</label></strong>
                                    {{ csrf_field() }}
                                    <input type="file" name="imagemTR">
                                  </div>
                                  <label for="title">Imagem atual:</label>
                                  <input type="text" id="imagem" name="imagem" value="{{substr($imagem, 32, 150)}}" style="width: 100%; background:#eee;" disabled="disabled"><br>
                                </div>
                              </div>
                              <div class="col-md-3 col-md-offset-2">
                                <div class="sidebar">
                                  <label for="title">Periodicidade:</label><br>
                                  <input type="text" id="periodicidade" name="periodicidade" value="{{ $periodicidade }}" style="width: 100%; background:#eee;"><br>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top:15px; padding-bottom:15px;">
                    <div class="col-md-8">
                      <div class="col-md-3" style="padding: 5px 5px 5px 5px;">
                        <a href={{ route('configEditarTR.dashboard')}} class="btn btn-primary btn-block">Voltar</a>
                      </div>
                      <div class="col-md-3" style="padding: 5px 5px 5px 5px;">
                        <button type="button" class="btn btn-primary btn-block" id="proximo3" disabled="disabled">Próximo</button>
                      </div>
                      <div class="col-md-4" style="padding: 5px 50px 5px 5px;">
                        <button type="submit" class="btn btn-primary btn-block" id="cadastrar">Editar</button>
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
</div>

<script>
//FILTRO PARA O DROPDOWN ATIVIDADES
$(document).ready(function() {
  $('select[name="negocio"]').on('change', function() {
      var negocioID = $(this).val();
      if(negocioID) {
          $.ajax({
              url: '/preditiva.csn.br/tecnico-preditiva/configuracoes/atividades/termografia-isolamento/ajaxZero/'+negocioID,
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
          $('select[name="atividades0"]').empty();
      }
  });
});


$(document).ready(function(){
  $('select[name="negocio"]').on('change', function() {
    var negocioID = $(this).val();
    if(negocioID) {
      $('#atividades0').empty(); //Limpando a tabela
      	$.ajax({
      		type:"GET",		//Definimos o método HTTP usado
      		dataType: "json",	//Definimos o tipo de retorno
      		url: '/preditiva.csn.br/tecnico-preditiva/configuracoes/atividades/termografia-isolamento/ajaxZero/'+negocioID,
      		success: function(data){

      			for(var i=0; i < 10; i++){
      				//Adicionando registros retornados na tabela
      				$('#atividades0').append('<tr><td>'+dados[i].tag_ativ+'</td><td>'+dados[i].description_ativ+'</td><td>'+dados[i].name_ativo+'</td><td>'+dados[i].image_ativ+'</td></tr>');
      			}
      		}
      	});
      }else{
          $('#atividades0').empty();
    }
  });
});

//desabilita o ENTER no formulário
$('html').bind('keypress', function(e) {
 if(e.keyCode == 13) {
    return false;
 }
});
</script>

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

  <form action="/preditiva.csn.br/tecnico-preditiva/configuracoes/editar/atividade/termografia-pag2" method="get" name="myform"  id="myform">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
    <div id="page-content-wrapper-side">
      <div class="container-fluid">
        <div class="row" style="margin-top:-5px;">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="background-color:#f1f1f1;">
              <div class="panel-heading">
                <strong>Análise Termografia Elétrica: Editar atividade</strong>
              </div>
              <div class="row" style="padding-top: 50px;">
                <div class="col-md-10 col-md-offset-1" style="padding-bottom:0px;">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        Filtrar atividade:
                    </div>
                    <div class="row" style="padding-top:30px; padding-bottom:30px;">
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
                        @if (session('alert'))
                            <div class="alert alert-success">
                                {{ session('alert') }}
                            </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top:-20px; padding-top: 0px; padding-bottom: 20px;">
                <div class="col-md-10 col-md-offset-1">
                  <div class="col-md-1" style="padding: 5px 5px 5px 5px;">
                    <button type="button" class="btn btn-primary btn-block" id="voltar" disabled="disabled">Voltar</button>
                  </div>
                  <div class="col-md-1" style="padding: 5px 5px 5px 5px;">
                    <button type="submit" class="btn btn-primary btn-block" id="proximo">Próximo</button>
                  </div>
                </div>
              </div>
              <!-- /.tabela -->
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                          Atividades:
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body" style="padding-top:45px;">
                        <div class="row">
                          <div class="col-md-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable" name="dataTable">
                              <thead>
                                <tr>
                                  <th>TAG</th>
                                  <th>Descrição</th>
                                  <th>Imagem</th>
                                  <th>Periodicidade</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($tableAtividades as $t)
                                <tr class="odd gradeX">
                                  <td>{{$t->tag_ativ}}</td>
                                  <td>{{$t->description_ativ}}</td>
                                  <td>{{substr($t->image_ativ, 27, 150)}}</td>
                                  <td>{{$t->periodicity}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
              url: '/preditiva.csn.br/tecnico-preditiva/configuracoes/atividades/termografia/ajax/'+negocioID,
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
      		url: '/preditiva.csn.br/tecnico-preditiva/configuracoes/atividades/termografia/ajax/'+negocioID,
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
    $('#dataTable').DataTable({
        responsive: true
    });
});
</script>

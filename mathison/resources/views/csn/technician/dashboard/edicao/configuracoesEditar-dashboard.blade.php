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

  <form action="/preditiva.csn.br/tecnico-preditiva/configuracoes/adiciona" method="post" name="myform">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
    <div id="page-content-wrapper-side">
      <div class="container-fluid">
        <div class="row" style="margin-top:-5px;">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="background-color:#f1f1f1;">
              <div class="panel-heading">
                <strong>Dashboard Configurações: Editar atividade</strong>
              </div>
              <div class="row" style="padding-top: 90px;">
                <div class="col-md-6 col-md-offset-3" style="padding-bottom:45px;">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        Filtrar atividade:
                    </div>
                    <div class="row" style="padding-top:15px; padding-bottom:15px;">
                      <div class="col-md-10 col-md-offset-1">                        
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
</div>

<script>
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
</script>

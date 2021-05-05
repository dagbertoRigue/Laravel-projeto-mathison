<link href="/css/jquery.timepicker.min.css" rel="stylesheet">
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/js/additional-methods.js"></script>

<div id="wrapper-side">
  <!-- Sidebar -->
  @include('csn.technician.includes.sidebar-dashboard')

  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              Dashboard Configurações: Editar atividade
              <div class="panel-body">

                <form action="/preditiva.csn.br/tecnico-preditiva/configuracoes/adiciona" method="post" name="myform">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                    <div class="sidebar">
                        <div class="form-group">
                            <label for="title">Atividade: {{$value}}</label>
                            <br/>
                            <input name="atividade_selecionada" type="text" style="width: 350px;" />
                            <br/>
                            <br/>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary"> Atualizar </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

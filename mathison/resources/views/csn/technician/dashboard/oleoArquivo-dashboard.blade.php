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

  <!-- Modal -->
  <div class="modal fade" id="modalPendencias" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pendências</h4>
        </div>
        <div class="modal-body">
          <strong><label>Existem {{$pendencias}} amostras para inserção!</label></strong>
        </div>
        <div class="modal-footer">
          <a href={{ route('cadastroOleo.dashboard') }} type="button" class="btn btn-default">Inserir</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default" style="background-color:#f1f1f1;margin-bottom: 30px;">
            <div class="panel-heading">
              <strong>Análise de Óleo</strong>
            </div>
            <form action="/preditiva.csn.br/tecnico-preditiva/analise-de-oleo/adiciona/arquivo" method="post" name="myform" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
              <div class="row" style="padding-top:30px">
                <div class="col-md-10 col-md-offset-1">
                  <div class="panel panel-default" style="margin-bottom:0px">
                    <div class="panel-heading">
                      Selecionar Planilha do Laboratório
                    </div>
                    <div class="row" style="padding-top:45px; padding-bottom:30px;">
                      <div class="col-md-10 col-md-offset-1">
                        <!--  CADASTRO DE ARQUIVO CSV-->
                        <div class="form-group" id="fileCSV">
                          <div class="row">
                            <div class="col-md-7 col-md-offset-3" style="padding-left: 0px;">
                              <strong><label>Selecione arquivo:</label></strong>
                              {{ csrf_field() }}
                              <input style="margin-bottom:30px;" type="file" name="arquivo">
                              <p></p>
                              <button type="submit" class="btn btn-primary"> Inserir Planilha <i style="color:#3097D1">_</i> <i class="fas fa-tasks"></i> </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top:15px; padding-bottom:15px;">
                    <div class="col-md-12" id="btnIrCadastro" style="display:none;">
                      <a href={{ route('cadastroOleo.dashboard') }} class="btn btn-primary" style="float:right"> Ir para Cadastro <i style="color:#3097D1">_</i> <i class="fas fa-arrow-right"></i> </a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var x = document.getElementById("btnIrCadastro");
    x.style.display = "none";
      if ({{$pendencias}} > 0) {
        $('#modalPendencias').modal('show');
        x.style.display = "block";
      } else {
      x.style.display = "none";
    }
  });
</script>

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

    <div id="page-content-wrapper-side">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color:#f1f1f1;">

                  <div class="panel-heading">
                      <strong>Inserir Imagem para o laudo de resistência</strong>
                  </div>                  

                    <form action="/preditiva.csn.br/tecnico-preditiva/resistencia/adiciona/imagem" method="post" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                    <div class="row" style="padding-top:30px">
                      <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">

                          <div class="panel-heading">
                              Selecionar Arquivo 
                          </div>

                          <div class="row" style="padding-top:15px; padding-bottom:15px;">
                            <div class="col-md-10 col-md-offset-1">
                              <!-- ADICIONA A IMAGEM TERMOGRAFICA REGISTRADA PELO TECNICO-->
                              <div class="container">
                                <div class="form-group" id="termografia">
                                  <strong><label>Selecione Imagem</label></strong>
                                    {{ csrf_field() }}
                                    <input type="file" name="imagemResistencia">
                                 </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row" style="padding-top:15px; padding-bottom:15px;">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary"> Cadastrar </button>
                        </div>
                      </div>

                      </form>

                      <div class="panel-body">
                        <p></p>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

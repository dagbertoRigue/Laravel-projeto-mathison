<link href="/css/jquery.timepicker.min.css" rel="stylesheet">
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/js/additional-methods.js"></script>

<div id="wrapper-side">
  <!-- Sidebar -->
  @include('csn.laudos.includes.sidebar-dashboard-laudo')

    <div id="page-content-wrapper-side">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="panel panel-default" style="background-color:#f1f1f1;">

                    <div class="panel-heading" style="height: 42px;">
                      <div class="col-md-12">
                        <div class="col-md-3">Laudo Nº:<strong> {{ $cod_laudo }}LB</strong></div>
                        <div class="col-md-3 col-md-offset-6">Data: {{Carbon\Carbon::parse($data_laudo)->format('d/m/Y')}} </div>
                      </div>
                    </div>
                    <div class="panel-heading" style="height: 42px;">
                      <div class="col-md-8">Ativo:
                          <label>{{ $nomeNegocio }}</label>
                          <label>{{ $nomeSistema }}</label>
                          <label>{{ $nomeAtivo }}</label>
                      </div>
                      <div class="col-md-4">TAG:
                          <label>{{ $tag_laudo }}</label>
                      </div>
                    </div>
                    <div class="panel-heading" style="height: 42px;">
                      <div class="col-md-12">Técnico Responsável:
                          <label>{{ $tecnico_laudo }}</label>
                      </div>
                    </div>

                    <div class="container">
                      <div class="col-md-6">
                        <img src="{{ $nova_string }}" style="width: 400px; height:auto; margin-top:15px; margin-bottom:25px; margin-left:25px;">
                      </div>
                      <div class="panel-body">
                        <div class="col-md-6" style="width: 400px; height:50px;">Status:
                            <label>{{ $status_laudo }}</label>
                        </div>
                        <div class="col-md-6" style="width: 400px; height:50px;">Diagnóstico:
                            <label>{{ $diagnosctico_laudo }}</label>
                        </div>
                        <div class="col-md-6" style="width: 400px; height:75px;">Observação:
                            <label>{{ $observacao_laudo }}</label>
                        </div>
                        <div class="col-md-6" style="width: 400px; height:75px;">Recomendação:
                            <label>{{ $recomendacao_laudo }}</label>
                        </div>
                      </div>
                    </div>

                    <div class="panel-heading" style="height: 65px;">
                      <div class="col-md-12"><strong>Condição Atual</strong></div>
                        <div class="col-md-4">Temperatura Máx:
                        <label>{{ $tempMax_laudo }}°C</label>
                        </div>
                        <div class="col-md-4">Temperatura Ref:
                            <label>{{ $tempRef_laudo }}°C</label>
                        </div>
                        <div class="col-md-4">Delta T:
                            <label>{{ $tempDelta_laudo }}°C</label>
                        </div>

                    </div>

                    <div class="panel-body">
                        <p></p>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

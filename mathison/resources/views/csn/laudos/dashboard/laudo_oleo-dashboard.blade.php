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

                    <div class="panel-heading">
                        <strong>Laudos Óleo</strong>
                    </div>

                      <form action="/preditiva.csn.br/laudos/oleo/laudo" method="post" name="laudo_oleo">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                              <div class="form-group">
                                <label for="usr">Insira o código do laudo</label>
                                <input type="text" class="form-control" id="codigo" name="codigoLaudo" style="width:30%";>
                              </div>
                      <button type="submit" class="btn btn-primary"> Buscar </button>
                    
                      <div class="panel-body">
                          <p></p>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
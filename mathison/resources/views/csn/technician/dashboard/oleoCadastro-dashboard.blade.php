<script src="/plugins/chartJs-master/chartBundle.js"></script>
<script src="/plugins/chartJs-master/Chart.min.js"></script>
<script src="/plugins/chartJs-master/utils.js"></script>

<div id="wrapper-side" style="margin-top: 50px;">
  <!-- Sidebar -->
  @include('csn.technician.includes.sidebar-dashboard')

  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default" style="background-color:#f1f1f1;">
            <div class="panel-heading">
              <strong>Análise de Óleo</strong>
            </div>
            <div class="row" style="padding-top:30px">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Inserção Planilha do Laboratório
                  </div>
                  <div class="row" style="padding-top:30px; padding-bottom:0px;">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="panel-body">
                        @if($colunaErrada)
                        <div class="form-group" id="colunaNaoEnc">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <strong><label style="margin-bottom: 20px;">{{$colunaErrada}}</label></strong>
                              <p></p>
                              <a href={{ route('addArquivo.dashboard') }}><button type="button" class="btn btn-primary"><i class="fas fa-arrow-left"></i>  Voltar Para Inserir Nova Planilha </button></a>
                            </div>
                          </div>
                        </div>
                        @else
                        <div class="form-group" id="inseridoComSuc">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3" style="margin-bottom:45px;">
                              <strong><label style="color: green;font-size:20px;">Inserido com sucesso!</label></strong>
                              @if($pendencias > 0)
                                <label style="font-weight:600;">Existem {{$pendencias}} laudos para análise.</label>
                              @elseif($pendencias == 0)
                              <label style="font-weight:600;">Atenção, foi inserido uma tabela vazia.</label>
                                <label style="font-weight:600;">Não existem laudos para análise.</label>
                              @endif
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <a href={{ route('addArquivo.dashboard') }}><button type="button" class="btn btn-primary"><i class="fas fa-arrow-left"></i><i style="color:#3097D1">_</i> Inserir Outra Planilha </button></a>
                            </div>
                            <div class="col-md-6">
                              <a href={{ route('cadastroOleo.dashboard') }} class="btn btn-primary" style="float:right"> Ir para Cadastro <i style="color:#3097D1">_</i> <i class="fas fa-arrow-right"></i> </a>
                            </div>
                          </div>
                        </div>
                        @endif
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

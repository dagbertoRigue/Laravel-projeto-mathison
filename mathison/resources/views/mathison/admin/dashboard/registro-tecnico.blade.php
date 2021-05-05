<div id="wrapper-side">
    <!-- Sidebar -->
    <div id="sidebar-wrapper-side">
        <ul class="sidebar-nav-side">
            <li class="sidebar-brand-side">
                <a href={{ route('admin.dashboard') }}><h4 class="fontlight">Dashboard Administrador</h4></a>
            </li>
            <li>
                <a href={{ route('registro.tecnico') }}><strong>Registrar Técnico Preditiva</strong></a>
            </li>
            <li>
                <a href={{ route('cadastro.tecnica') }}><strong>Cadastrar Nova Técnica</strong></a>
            </li>
            <li>
                <a href={{ route('reset.tecnico') }}><strong>Resetar Senha Esquecida</strong></a>
            </li>
        </ul>
    </div>

    <div id="page-content-wrapper-side">
        <div class="container-fluid">
            <div class="row">                   
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                          <div class="panel panel-default">
                              <div class="panel-heading">Registrar Novo Técnico Preditiva</div>
                              <div class="panel-body">
                                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                      {{ csrf_field() }}

                                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                          <label for="name" class="col-md-4 control-label">Nome</label>

                                          <div class="col-md-6">
                                              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                              @if ($errors->has('name'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('name') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                          <label for="email" class="col-md-4 control-label">E-Mail</label>

                                          <div class="col-md-6">
                                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                              @if ($errors->has('email'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                          <label for="password" class="col-md-4 control-label">Senha</label>

                                          <div class="col-md-6">
                                              <input id="password" type="password" class="form-control" name="password" required>

                                              @if ($errors->has('password'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label for="password-confirm" class="col-md-4 control-label">Confirmação</label>

                                          <div class="col-md-6">
                                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-md-6 col-md-offset-4">
                                              <button type="submit" class="btn btn-primary">
                                                  Registrar
                                              </button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> 
            </div>
        </div>
    </div>
</div>

<div id="wrapper-side">
    <!-- Sidebar -->
    <div id="sidebar-wrapper-side">
        <ul class="sidebar-nav-side" style="padding-left:15px;">
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
              <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          Dashboard Administrador
                      </div>
                      <div class="panel-body">
                          Bem vindo novamente, Sr. {{ Auth::user()->name }} <span></span>!
                          <p>Acesso como <strong>Administrador!</strong></p>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

  <div id="wrapper-side" style="margin-top: 50px;">
    <!-- Sidebar -->
    @include('csn.technician.includes.sidebar-dashboard')

    <div id="page-content-wrapper-side">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-default"style="background-color:#f1f1f1;">
                      <div class="panel-heading">
                          Dashboard Técnico Preditiva
                      </div>
                      <div class="panel-body">
                          Bem vindo novamente, {{ Auth::user()->name_user }} <span></span>!
                          <p>Acesso como <strong>Técnico Preditiva!</strong></p>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

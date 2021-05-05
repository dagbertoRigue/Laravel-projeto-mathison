<div id="sidebar-wrapper-side">
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="sidebar-nav-side">
        <ul class="nav" id="side-menu">
            <li class="sidebar-brand-side">
                <a href={{ route('technician.dashboard') }}><i class="fa fa-dashboard fa-fw"></i> <strong>Dashboard Preditiva</strong></a>
            </li>
            <!-- SIDEBAR PARA ACESSO À ÁREA DE TERMOGRAFIA -->
            <li>
                <a href={{ route('laudoTermografico.dashboard') }}><i class="fa fa-camera-retro fa-fw"></i> <strong>Laudo Termografia</strong><span class="fa arrow menu-dashboard"></span></a>
                <!-- /.nav-second-level -->
            </li>
            <!-- SIDEBAR PARA ACESSO À ÁREA DE VIBRAÇÃO -->
          <li>
              <a href={{ route('laudoVibracao.dashboard') }}><i class="fa fa-bar-chart-o fa-fw"></i> <strong>Laudo Vibração</strong><span class="fa arrow"></span></a>

          </li>
          <!-- SIDEBAR PARA ACESSO À ÁREA DE LUBRIFICANTES -->
          <li>
              <a href={{ route('laudoOleo.dashboard') }}><i class="fa fa-tint fa-fw"></i> <strong>Laudo Óleo</strong><span class="fa arrow"></span></a>

          </li>
          <!-- SIDEBAR PARA ACESSO À ÁREA DE RESISTÊNCIAS -->
          <li>
              <a href={{ route('laudoResistencia.dashboard') }}><i class="fa fa-bar-chart-o fa-fw"></i> <strong>Laudo Resitência</strong><span class="fa arrow"></span></a>

          </li>
        </ul>
      </ul>
    </div>
    <!-- /.sidebar-collapse -->
  </div>
</div>

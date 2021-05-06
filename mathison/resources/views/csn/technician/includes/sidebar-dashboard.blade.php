<div id="sidebar-wrapper-side">
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav sidebar-nav-side" id="side-menu">
        <li class="sidebar-brand-side">
          <a href={{ route('technician.dashboard') }}><i class="fas fa-tachometer-alt"></i> <strong>Dashboard Preditiva</strong></a>
        </li>
        <!-- TERMOGRAFIA ELETRICA LEVEL -->
        <li>
          <a href={{ route('termografia.dashboard') }}><i class="fa fa-camera-retro fa-fw"></i> <strong>Termografia Elétrica</strong><span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href={{ route('termografia.dashboard') }} style="padding-left:40px;">Inserir Análise <i class="far fa-plus-square fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li>
              <a href="#" style="padding-left:40px;">Editar Análise <i class="fas fa-edit fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li style="padding-left:25px;">
              <a href="#"><i class="fas fa-file-alt"></i>  Atividades<span class="fa arrow" style="padding-left:40px;"></span></a>
              <ul class="nav nav-third-level">
                <li>
                <a href={{ route('configEditarTerm.dashboard') }} style="padding-left:40px;">Editar Atividade <i class="fas fa-edit" style="float:right; margin-top:10px;margin-right:30px"></i></a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- TERMOGRAFIA ISOLAMENTO TERMICO LEVEL -->
        <li>
          <a href={{ route('termografia.dashboard') }}><i class="fa fa-camera-retro fa-fw"></i> <strong>Termografia Isolamento</strong><span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href={{ route('termografiaIsolamento.dashboard') }} style="padding-left:40px;">Inserir Análise <i class="far fa-plus-square fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li>
              <a href="#" style="padding-left:40px;">Editar Análise <i class="fas fa-edit fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li style="padding-left:25px;">
              <a href="#"><i class="fas fa-file-alt"></i>  Atividades<span class="fa arrow" style="padding-left:40px;"></span></a>
              <ul class="nav nav-third-level">
                <li>
                  <a href={{ route('configEditarTR.dashboard') }} style="padding-left:40px;">Editar Atividade <i class="fas fa-edit" style="float:right; margin-top:10px;margin-right:30px"></i></a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!--  VIBRACAO -->
        <li>
          <a href={{ route('vibracao.dashboard') }}><i class="fa fa-bar-chart-o fa-fw"></i> <strong>Análise de Vibração</strong><span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href={{ route('vibracao.dashboard') }} style="padding-left:40px;">Inserir Análise <i class="far fa-plus-square fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li>
              <a href="#" style="padding-left:40px;">Editar Análise <i class="fas fa-edit fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li style="padding-left:25px;">
              <a href="#"><i class="fas fa-file-alt"></i>  Atividades<span class="fa arrow" style="padding-left:40px;"></span></a>
              <ul class="nav nav-third-level">
                <li>
                  <a href={{ route('configEditarVib.dashboard') }} style="padding-left:40px;">Editar Atividade <i class="fas fa-edit" style="float:right; margin-top:10px;margin-right:30px"></i></a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- RESISTENCIA LEVEL -->
        <li>
          <a href={{ route('resistencias.dashboard') }}><i class="fa fa-bar-chart-o fa-fw"></i> <strong>Análise de Resistências</strong><span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href={{ route('resistencias.dashboard') }} style="padding-left:40px;">Inserir Análise <i class="far fa-plus-square fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li>
              <a href="#" style="padding-left:40px;">Editar Análise <i class="fas fa-edit fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li style="padding-left:25px;">
              <a href="#"><i class="fas fa-file-alt"></i>  Atividades<span class="fa arrow" style="padding-left:40px;"></span></a>
              <ul class="nav nav-third-level">
                <li>
                  <a href={{ route('configEditarResist.dashboard') }} style="padding-left:40px;">Editar Atividade <i class="fas fa-edit fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- ÓLEO LEVEL -->
        <li>
          <a href="#"><i class="fa fa-tint fa-fw"></i> <strong>Análise de Óleo</strong><span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href={{ route('addArquivo.dashboard') }} style="padding-left:40px;">Inserir Planilha <i class="fas fa-tasks fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li>
              <a href={{ route('cadastroOleo.dashboard') }} style="padding-left:40px;">Inserir Análise <i class="far fa-plus-square fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li>
              <a href="#" style="padding-left:40px;">Editar Análise <i class="fas fa-edit fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
            </li>
            <li style="padding-left:25px;">
              <a href="#"><i class="fas fa-file-alt"></i>  Atividades<span class="fa arrow" style="padding-left:40px;"></span></a>
              <ul class="nav nav-third-level">
                <li>
                  <a href={{ route('configEditarOleo.dashboard') }} style="padding-left:40px;">Editar Atividade <i class="fas fa-edit" style="float:right; margin-top:10px;margin-right:30px"></i></a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- CONFIG LEVEL -->
        <li>
          <a href={{ route('configuracoes.dashboard') }}><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> <strong>Configurações</strong><span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
              <li>
                  <a href={{ route('configuracoes.dashboard') }} style="padding-left:40px;">Inserir Atividade <i class="far fa-plus-square fa-fw" style="float:right; margin-top:10px;margin-right:30px"></i></a>
              </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
      </ul>
    </div>
  </div>
</div>

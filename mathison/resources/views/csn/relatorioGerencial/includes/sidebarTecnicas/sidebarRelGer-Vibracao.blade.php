<!-- navibar vibração -->
<div class="navbar-default sidebar" role="navigation" style="margin-top: 72px; background: rgba(0, 0, 0, 0.15);border-top:1px solid #ccc">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href={{ route('relGer.index') }} style="font-size: 17px;">
                  <i class="fas fa-tachometer-alt"></i>
                  Relatórios Gerenciais:
                </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> GGOP-PR | VB<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{ route('relGer.vb.GeralPerfil')}}>Dashboard</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.GeralStatusDosPontos')}}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.GeralAnormalidades')}}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.GeralProblemasEncontrados')}}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatórios Técnicos:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.ura')}} style="padding-left: 2px;">URA</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.decapagem-entrada')}} style="padding-left: 2px;">LDS</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.laminador')}} style="padding-left: 2px;">LRF</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.pr-pontes')}} style="padding-left: 2px;">PR </a></button>
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 15px; margin-left: 10px; border: 0; border-top: 1px">
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.galvanizacao-entrada')}} style="padding-left: 4px;">LGC</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.pintura-entrada')}} style="padding-left: 3px;">LPC</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.utilidades')}} style="padding-left: 4px;">UTI</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.cs-LCL')}} style="padding-left: 4px;">CS </a>
                      </button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> URA<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{ route('relGer.vb.UraPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.UraStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.UraAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.UraProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico URA:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.ura')}} style="padding-left: 2px;">URA</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LDS<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.vb.LdsPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LdsStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LdsAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LdsProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LDS:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.decapagem-entrada')}} style="padding-left: 2px;">LDS</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LRF<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                      <li>
                      <a href={{ route('relGer.vb.LrfPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LrfStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LrfAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LrfProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LRF:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.laminador')}} style="padding-left: 2px;">LRF</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> UTI<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.vb.UtiPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.UtiStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.UtiAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.UtiProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico UTI:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.utilidades')}} style="padding-left: 2px;">UTI</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LGC<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.vb.LgcPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LgcStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LgcAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LgcProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LGC:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.galvanizacao-entrada')}} style="padding-left: 2px;">LGC</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LPC<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.vb.LpcPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LpcStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LpcAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.LpcProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LPC:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.pintura-entrada')}} style="padding-left: 2px;">LPC</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> CS<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.vb.CsPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.CsStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.CsAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.CsProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico CS:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.cs-LCL')}} style="padding-left: 2px;">CS</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> PR<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.vb.PrPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.PrStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.PrAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.vb.PrProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico PR:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.vibracao.pr-pontes')}} style="padding-left: 2px;">PR</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

<script src="/js/jquery_3-3-1-jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
      $("li a").click(function(){
        var myhref = this.href;
        var s = myhref.indexOf("#");
        if(s < 0) {
        //alert('ENTREI NA FUNÇÃO DO CLICK:\n' + myhref);
          $.get("/preditiva.csn.br/relatorio-tecnico/voltar-relatorio-tecnico", {data: myhref}, function(data){
            //alert(data);
          });
        } else {
          //alert('sem link');
        }
      });
  });
</script>

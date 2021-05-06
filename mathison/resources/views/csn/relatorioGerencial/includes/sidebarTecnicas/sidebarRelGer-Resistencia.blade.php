<div class="navbar-default sidebar" role="navigation" style="margin-top: 72px; background: rgba(0, 0, 0, 0.15);">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href={{ route('relGer.index') }} style="font-size: 17px;">
                  <i class="fas fa-tachometer-alt"></i>
                  Relatórios Gerenciais:
                </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> GGOP-PR | RM<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                     <li>
                        <a href={{ route('relGer.rm.GeralPerfil') }}>Dashboard</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.GeralStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.GeralAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.GeralProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatórios Técnicos:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.ura')}} style="padding-left: 2px;">URA</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia-decapagem')}} style="padding-left: 2px;">LDS</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia-laminador')}} style="padding-left: 2px;">LRF</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.pr5')}} style="padding-left: 2px;">PR </a></button>
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 15px; margin-left: 10px; border: 0; border-top: 1px">
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.galvanizacao-entrada')}} style="padding-left: 4px;">LGC</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.pintura-entrada')}} style="padding-left: 3px;">LPC</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia-utilidades')}} style="padding-left: 4px;">UTI</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.cs-LCL')}} style="padding-left: 4px;">CS </a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> URA<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{ route('relGer.rm.UraPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.UraStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.UraAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.UraProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico URA:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.ura')}} style="padding-left: 2px;">URA</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LDS<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.rm.LdsPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LdsStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LdsAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LdsProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LDS:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia-decapagem')}} style="padding-left: 2px;">LDS</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LRF<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.rm.LrfPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LrfStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LrfAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LrfProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LRF:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia-laminador')}} style="padding-left: 2px;">LRF</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> UTI<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.rm.UtiPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.UtiStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.UtiAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.UtiProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico UTI:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia-utilidades')}} style="padding-left: 2px;">UTI</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LGC<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.rm.LgcPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LgcStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LgcAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LgcProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LGC:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.galvanizacao-entrada')}} style="padding-left: 2px;">LGC</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LPC<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.rm.LpcPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LpcStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LpcAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.LpcProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LPC:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.pintura-entrada')}} style="padding-left: 2px;">LPC</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> CS<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.rm.CsPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.CsStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.CsAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.CsProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico CS:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.cs-LCL')}} style="padding-left: 2px;">CS</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> PR<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.rm.PrPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.PrStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.PrAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.rm.PrProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico PR:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.resistencia.pr5')}} style="padding-left: 2px;">PR</a></button>
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

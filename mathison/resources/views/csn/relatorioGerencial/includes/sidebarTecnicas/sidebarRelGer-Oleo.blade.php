<div class="navbar-default sidebar" role="navigation" style="margin-top: 72px; background: rgba(0, 0, 0, 0.15);">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href={{ route('relGer.index') }} style="font-size: 17px;">
                  <i class="fa fa-dashboard fa-fw"></i>
                  Relatórios Gerenciais:
                </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> GGOP-PR | LB<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{ route('relGer.lb.GeralPerfil') }}>Perfil das Linhas</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.GeralAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.GeralStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.GeralProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatórios Técnicos:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.index')}} style="padding-left: 2px;">URA</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.decapagem-entrada')}} style="padding-left: 2px;">LDS</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.laminador-ofc')}} style="padding-left: 2px;">LRF</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.pr-pontes')}} style="padding-left: 2px;">PR </a></button>
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 15px; margin-left: 10px; border: 0; border-top: 1px">
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.galvanizacao-entrada')}} style="padding-left: 4px;">LGC</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.pintura-entrada')}} style="padding-left: 3px;">LPC</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.utilidades_chiller_LGC')}} style="padding-left: 4px;">UTI</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.cs-LCL')}} style="padding-left: 4px;">CS </a></button>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

             <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> URA<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{ route('relGer.lb.UraPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.UraAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.UraStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.UraProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico URA:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.index')}} style="padding-left: 2px;">URA</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Decapagem<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                     <li>
                      <a href={{ route('relGer.lb.LdsPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LdsAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LdsStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LdsProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LDS:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.decapagem-entrada')}} style="padding-left: 2px;">LDS</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Laminador<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                   <li>
                      <a href={{ route('relGer.lb.LrfPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LrfAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LrfStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LrfProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LRF:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.laminador-ofc')}} style="padding-left: 2px;">LRF</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Utilidades<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.lb.UtiPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.UtiAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.UtiStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.UtiProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico UTI:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.utilidades_chiller_LGC')}} style="padding-left: 2px;">UTI</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Galvanização<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                      <li>
                      <a href={{ route('relGer.lb.LgcPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LgcAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LgcStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LgcProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LGC:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.galvanizacao-entrada')}} style="padding-left: 2px;">LGC</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Pintura<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                   <li>
                      <a href={{ route('relGer.lb.LpcPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LpcAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LpcStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.LpcProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LPC:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.pintura-entrada')}} style="padding-left: 2px;">LPC</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Centro de Serviços<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.lb.CsPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.CsAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.CsStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.CsProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico CS:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.cs-LCL')}} style="padding-left: 2px;">CS</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Pontes Rolantes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.lb.PrPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.PrAnormalidades') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.PrStatusPontos') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.lb.PrProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico PR:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.oleo.pr-pontes')}} style="padding-left: 2px;">PR</a></button>
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

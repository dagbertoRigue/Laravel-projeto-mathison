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
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> GGOP-PR | TE<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{ route('relGer.te.GeralPerfil') }}>Dashboard</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.GeralStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.GeralAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.GeralProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatórios Técnicos:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.ura_painel_1')}} style="padding-left: 2px;">URA</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.decapagem_ets')}} style="padding-left: 2px;">LDS</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.laminador_ets')}} style="padding-left: 2px;">LRF</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.pr_pontes')}} style="padding-left: 2px;">PR </a></button>
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 15px; margin-left: 10px; border: 0; border-top: 1px">
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.galvanizacao_ets_entradaLimp')}} style="padding-left: 4px;">LGC</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.pintura_estacoesRemotas')}} style="padding-left: 3px;">LPC</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.utilidades_ccm')}} style="padding-left: 4px;">UTI</a></button>
                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.cs_LCL')}} style="padding-left: 4px;">CS </a></button>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> URA<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{ route('relGer.te.UraPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.UraStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.UraAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.UraProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico URA:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.ura_painel_1')}} style="padding-left: 2px;">URA</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LDS<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.te.LdsPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LdsStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LdsAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LdsProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LDS:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.decapagem_ets')}} style="padding-left: 2px;">LDS</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LRF<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.te.LrfPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LrfStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LrfAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LrfProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LRF:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.laminador_ets')}} style="padding-left: 2px;">LRF</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> UTI<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.te.UtiPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.UtiStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.UtiAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.UtiProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico UTI:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.utilidades_ccm')}} style="padding-left: 2px;">UTI</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LGC<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.te.LgcPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LgcStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LgcAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LgcProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LGC:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.galvanizacao_ets_entradaLimp')}} style="padding-left: 2px;">LGC</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> LPC<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.te.LpcPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LpcStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LpcAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.LpcProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico LPC:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.pintura_estacoesRemotas')}} style="padding-left: 2px;">LPC</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> CS<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.te.CsPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.CsStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.CsAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.CsProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                    <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico CS:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.cs_LCL')}} style="padding-left: 2px;">CS</a></button>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> PR<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href={{ route('relGer.te.PrPerfil') }}>Perfil da Linha</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.PrStatusDosPontos') }}>Status dos Pontos</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.PrAnormalidades') }}>Anormalidades</a>
                    </li>
                    <li>
                        <a href={{ route('relGer.te.PrProblemasEncontrados') }}>Problemas Encontrados</a>
                        <hr style="margin-top: 1px; margin-bottom: 1px; border: 0; border-top: 1px solid #eee;">
                    </li>
                     <li style="margin-top: 5px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">
                      Relatório Técnico PR:
                    </li>
                    <li style="margin-top: 10px; margin-bottom: 5px; margin-left: 10px; border: 0; border-top: 1px">

                      <button type="button" class="btn btn-outline btn-primary"><a href={{route('relTec.termografia.pr_pontes')}} style="padding-left: 2px;">PR</a></button>
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

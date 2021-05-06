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
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> GGOP-PR | TR<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Perfil das Linhas</a>
                    </li>
                    <li>
                        <a href="#">Status dos Pontos</a>
                    </li>
                    <li>
                        <a href="#">Anormalidades</a>
                    </li>
                    <li>
                        <a href="#">Problemas Encontrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> URA<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Perfil da Linha</a>
                    </li>
                    <li>
                        <a href="#">Status dos Pontos</a>
                    </li>
                    <li>
                        <a href="#">Anormalidades</a>
                    </li>
                    <li>
                        <a href="#">Problemas Encontrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Decapagem<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href="#">Perfil da Linha</a>
                    </li>
                    <li>
                        <a href="#">Status dos Pontos</a>
                    </li>
                    <li>
                        <a href="#">Anormalidades</a>
                    </li>
                    <li>
                        <a href="#">Problemas Encontrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Laminador<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href="#">Perfil da Linha</a>
                    </li>
                    <li>
                        <a href="#">Status dos Pontos</a>
                    </li>
                    <li>
                        <a href="#">Anormalidades</a>
                    </li>
                    <li>
                        <a href="#">Problemas Encontrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Galvanização<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href="#">Perfil da Linha</a>
                    </li>
                    <li>
                        <a href="#">Status dos Pontos</a>
                    </li>
                    <li>
                        <a href="#">Anormalidades</a>
                    </li>
                    <li>
                        <a href="#">Problemas Encontrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Pintura<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href="#">Perfil da Linha</a>
                    </li>
                    <li>
                        <a href="#">Status dos Pontos</a>
                    </li>
                    <li>
                        <a href="#">Anormalidades</a>
                    </li>
                    <li>
                        <a href="#">Problemas Encontrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Centro de Serviços<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href="#">Perfil da Linha</a>
                    </li>
                    <li>
                        <a href="#">Status dos Pontos</a>
                    </li>
                    <li>
                        <a href="#">Anormalidades</a>
                    </li>
                    <li>
                        <a href="#">Problemas Encontrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Pontes Rolantes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                      <a href="#">Perfil da Linha</a>
                    </li>
                    <li>
                        <a href="#">Status dos Pontos</a>
                    </li>
                    <li>
                        <a href="#">Anormalidades</a>
                    </li>
                    <li>
                        <a href="#">Problemas Encontrados</a>
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

<script>
  function AbrirSecao(secao) {
    document.getElementById( 'containerdiv' ).style.display = 'none';
    document.getElementById( 'loader' ).style.display = 'block';
    window.open(""+secao+"", "_parent");
  }
</script>

<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background: #fff;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                Menu <i class="fa fa-bars"></i>
            </button>
            <a href="{{ route('csn.home') }}" class="navbar-left menu">
                <img alt="CSN" src="/img/logos/csnlogo-pantone877c.png" class="imgLogo img-responsive">
            </a>
            <div class="navbar-left navbar-brand menu">
              <h1></h1>
            </div>
            <div class="collapse navbar-collapse navbar-left imgLogo preditivalogo img-responsive">
              <h2 class="titulo-preditiva" style="color:#8a8d8f">PREDITIVA | Relatório Gerencial</h2>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li>
                  <!-- DROPDOWN TÉCNICA -->
                  <div class="form-group">
                    <select name="tecnica_id" class="form-control" id="selecionaTecnica" onChange="AbrirSecao(this.value)"
                    style="width: 230px; margin-top: 10px; font-size:17px;
                    background-color: #fff; color: #555;
                    padding: 3px 15px; font-family: Montserrat,
                    "Helvetica Neue",Helvetica,Arial,sans-serif;">


                        <option value=""> Análise de Resistência</option>
                        <option value="/preditiva.csn.br/relatorio-gerencial"> Página Inicial</option>
                        <option value="/preditiva.csn.br/relatorio-gerencial/termografia-eletrica/ggop-pr/perfil"> Termografia Elétrica</option>
                        <option value="/preditiva.csn.br/relatorio-gerencial/termografia-isolamento/ggop-pr/perfil"> Termografia Isolamento</option>
                        <option value="/preditiva.csn.br/relatorio-gerencial/analise-de-vibracao/ggop-pr/perfil"> Análise de Vibração</option>
                        <!-- <option value="/preditiva.csn.br/relatorio-gerencial/analise-de-oleo/ggop-pr/perfil"> Análise de Óleo</option> -->
                    </select>
                </div>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

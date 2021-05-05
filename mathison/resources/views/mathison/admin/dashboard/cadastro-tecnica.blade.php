<div id="wrapper-side">
    <!-- Sidebar -->
    <div id="sidebar-wrapper-side">
        <ul class="sidebar-nav-side">
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
                        Cadastro Nova Técnica Preditiva
                    </div>
                    <!--Formulário para cadastro de técnicas-->
                    <div class="panel-body">
                      <form class="form" method="post" action="{{route('tecnica.store')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"></input>
                        {{--
                            {!! csrf_field() !!}
                        --}}
<!--=========================INSERE NOME DA TÉCNICA=========================-->
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Nome:" class="form-control">
                        </div>
<!--=========================INSERE TÉCNICO RESPONSÁVEL=========================-->
                        <div class="form-group">
                            <select name="fk_technician" class="form-control">
                                <option>Escolha o Técnico Responsável:</option>
                                @foreach($technician as $technician)
                                    <option value="{{$technician->nome}}">{{$technician->nome}}</option>
                                @endforeach
                            </select>
                        </div>
<!--=========================FIM DOS DADOS A INSERIR - INSERÇÃO=========================-->

                        <div class="form-group">
                            <button class="btn btn-primary">Enviar</button>
                        </div>
                      </form>
<!--=========================FIM DO FORMULÁRIO DE REGISTRO DE NOVO TÉCNICO=========================-->
                    </div>

                    <!--Tabela das técnicas cadastradas-->
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                          <tr>
                            <th>ID</th>
                            <th>Técnica Preditiva</th>
                            <th>Técnico Responável</th>
                          </tr>
                          @foreach ($tecnicas as $tecnica)
                            <tr>
                              <td>{{$tecnica->id_tecnica}}</td>
                              <td>{{$tecnica->name}}</td>
                              <td>{{$technician->nome}}</td>
                            </tr>
                          @endforeach
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
  $(document).ready(function() {
      $('#dataTables-example').DataTable({
          responsive: true
      });
  });
</script>

<link href="/css/jquery.timepicker.min.css" rel="stylesheet">
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/js/additional-methods.js"></script>
<script src="/js/jquery-1.11.2.min.js"></script>

<div id="wrapper-side" style="margin-top: 50px;">
  <!-- Sidebar -->
  @include('csn.technician.includes.sidebar-dashboard')

  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              Dashboard Configurações
            </div>
            <div class="row">
              <div class="col-md-6 col-md-offset-3" style="padding-bottom:45px;">
                <div class="panel-body">
                  <div class="panel panel-default" style="padding:30px 30px 30px 60px; margin-bottom:-30px;">
                   <form action="/preditiva.csn.br/tecnico-preditiva/configuracoes/adiciona" method="post" name="myform" id="myform" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                    <div class="form-group">
                      <label for="title">Selecione uma Linha:</label>
                      <select name="negocio" class="form-control" style="width:90%">
                          <option>Linhas</option>
                          @foreach ($negocios as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="title">Selecione um Sistema:</label>
                      <select name="sistema" class="form-control" style="width:90%">
                        <option>Sistemas</option>
                        @foreach ($sistemas as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="sidebar">
                      <div class="form-group">
                          <label for="title">Selecione um Ativo:</label>
                          <select name="ativo" id="ativo" class="form-control" style="width: 90%;">
                            <option>Ativos</option>
                            @foreach ($ativos as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="sidebar">
                      <div class="form-group">
                        <label for="title">Selecione uma Técnica:</label>
                        <select name="tecnica_id" id="tecnica_id" class="form-control" style="width: 90%;">
                          <option>Técnicas</option>
                          <option value="1"> Termografia Elétrica</option>
                          <option value="2"> Termografia Isolamento</option>
                          <option value="3"> Análise de Vibração </option>
                          <option value="4"> Análise de Óleo </option>
                          <option value="5"> Análise de Resistência </option>
                        </select>
                      </div>
                    </div>
                    <div class="sidebar">
                      <div class="form-group">
                        <label for="title">Atividade (TAG): </label>
                        <br/>
                        <input name="tag" id="tag" type="text" style="width: 90%;" placeholder="p.ex: LB 72 000 000 000 000 - 000000"></input>
                      </div>
                    </div>
                    <div class="sidebar">
                      <div class="form-group">
                        <label for="title">Descrição:</label><br/>
                        <input name="description" type="text" style="width: 90%;"></input>
                      </div>
                    </div>
                    <div class="sidebar">
                      <div class="form-group">
                        <label for="title">Periodicidade:</label><br/>
                        <input name="periodicidade" type="text" style="width: 90%;"/>
                      </div>
                    </div>
                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                    <div class="row" style="padding-left:15px">
                      <div class="form-group" id="imageNew">
                        <strong><label>Selecione Imagem:</label></strong>
                        {{ csrf_field() }}
                        <input type="file" name="imageNew">
                      </div>
                      <button type="submit" class="btn btn-primary"> Cadastrar </button><br/>
                    </div>
                    <p></p>
                    <div class="row">
                      <div class="col-md-11 col-offset-1">
                        @if (session('alert'))
                            <div class="alert alert-success">
                                {{ session('alert') }}
                            </div>
                        @endif
                        @if (session('alert2'))
                            <div class="alert alert-danger">
                                {{ session('alert2') }}
                            </div>
                        @endif
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
 //Filtro para o dropdown sistemas
  $(document).ready(function() {
    $('select[name="negocio"]').on('change', function() {
        var negocioID = $(this).val();
        if(negocioID) {
            $.ajax({
                url: '/preditiva.csn.br/tecnico-preditiva/configuracoes/ajax/'+negocioID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="sistema"]').empty();
                    $('select[name="ativo"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="sistema"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }else{
            $('select[name="sistema"]').empty();
        }
    });
  });

  //FILTRO PARA O DROPDOWN ATIVOS
  $(document).ready(function() {
    $('select[name="sistema"]').on('change', function() {
        var sistemaID = $(this).val();
        if(sistemaID) {
            $.ajax({
                url: '/preditiva.csn.br/tecnico-preditiva/configuracoes/ativos/ajax/'+sistemaID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="ativo"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="ativo"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }else{
            $('select[name="ativo"]').empty();
        }
    });
  });

  $("#myform").submit(function() {
    if($("#ativo").val() == null || $("#ativo").val() == "Ativos"){
      alert('Selecione um Ativo!');
      return false;
    }else {
      if($("#tecnica_id").val() == "Técnicas"){
        alert('Selecione uma Técnica Preditiva!');
        return false;
      }else {
        if($("#tag").val() == ""){
          alert('Por Favor! Preencha o campo TAG, corretamente!');
          return false;
        }
      }
    }

  });
//  $("#myform").submit(function() {
//      if($("#ativo").val() != "Ativos" || $("#tecnica_id").val() != "Técnicas"){
//        if($("#tag").val() == null || $("#tag").val() == "p.ex: TE 72..." || $("#tag").val() == ""){
//          alert('Por favor! Preencha a TAG do Ativoa!');
//          return false;
//        }
//      }
//  });

  //desabilita o ENTER no formulário
  $('html').bind('keypress', function(e) {
   if(e.keyCode == 13) {
      return false;
   }
  });
</script>

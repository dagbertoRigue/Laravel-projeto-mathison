<script src="js\itsolutionstuff.js"></script>




  <!-- DROPDOWN LINHA -->
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Selecione uma Atividade</div>
      <div class="panel-body">
            <div class="form-group">
                <label for="title">Selecione Linha:</label>
                <select name="negocio" class="form-control" style="width:350px">
                    <option value="">--- Selecione a Categoria ---</option>
                    @foreach ($negocios as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
    <!-- DROPDOWN SISTEMA -->
            <div class="form-group">
                <label for="title">Selecione Sistema:</label>
                <select name="sistema" class="form-control" style="width:350px">
                </select>
            </div>
      </div>
    </div>
  </div>





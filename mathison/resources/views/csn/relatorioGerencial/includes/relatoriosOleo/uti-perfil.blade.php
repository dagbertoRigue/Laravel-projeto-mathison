<!-- Styles -->
<style>
  #chartdivTermoPerfilColetados {
    width: 100%;
    height: 300px;
  }
  #chartdiv1 {
    width: 100%;
    height: 150px;
  }
</style>

<div id="wrapper-side">

  @include('csn.relatorioGerencial.includes.sidebarTecnicas.sidebarRelGer-Oleo')

  <div id="page-content-wrapper-side">
    <div class="container-fluid">

<!-- - - - - - - - - - - - GRÁFICO GGOP-PR PERFIL DAS LINHAS - - - - - - - - - - - -->
    <div class="rowRelGer" style="margin-top: 115px; margin-bottom: 0px;">
      <div class="col-md-8 col-md-offset-3">
        <div class="panel panel-default"style="background-color:#f1f1f1;">
            <div class="panel-heading">
                <strong><h4 style="color:#555; margin: 0 0 0px;">UTI</h4></strong>
            </div>
            <div class="panel-body">
              <h5 style="color:#555; margin-top: -4px; margin-bottom: 4px;"><strong>Óleo</strong>
              <div class="panel-body">
                <div class="col-md-11">
                  <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Perfil da Linha - Mês Atual - Coletados</strong></h6>
                  <div id="chartdivTermoPerfilColetados"></div>  <!-- Gráfico principal Termografia Perfil Coletados -->
                </div>
                <div class="col-md-6 col-md-offset-6">
                  <h6 style="color:#555; margin-top:10px; margin-left:10px;"><strong>Perfil da Linha - Mês Atual - Não Coletados</strong></h6>
                  <div id="chartdiv1"></div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="rowRelGer" style="margin-top:10px">
      <div class="col-md-8 col-md-offset-3">
        <div class="panel panel-default"style="background-color:#f1f1f1;">
            <div class="panel-body" style="background-color:#f1f1f1;">
                <div class="col-md-4">
                  <div id=""></div>
                </div>
                <div class="col-md-4">
                  <div id=""></div>
                </div>
                <div class="col-md-4">
                  <div id=""></div>
                </div>

            </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Styles -->
  <style>
    #chartdivTermoPerfilColetados {
      width: 88%;
      height: 400px;
    }
    #chartdiv1 {
      width: 100%;
      height: 200px;
    }
  </style>

  <!-- Chart code -->
  <script>
    var chart = AmCharts.makeChart( "chartdivTermoPerfilColetados", {
      "type": "pie",
      "theme": "none",
      "dataProvider": [ {
        "status": "Crítico",
        "color": "#db1111",
        "value": {!!$critico!!}
      }, {
        "status": "Alarme",
        "color": "#f7f32c",
        "value": {!!$alarme!!}
      }, {
        "status": "Normal",
        "color": "#2d9b1a",
        "value": {!!$normal!!}
      } ],
      "valueField": "value",
      "colorField": "color",
      "titleField": "status",
      "outlineAlpha": 0.4,
      "depth3D": 20,
      "pullOutRadius": 25,
      "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
      "angle": 45,
      "export": {
        "enabled": true
      }
    } );
  </script>

  <!-- Chart code -->
  <script>
    var chart = AmCharts.makeChart( "chartdiv1", {
      "type": "pie",
      "theme": "none",
      "dataProvider": [ {
        "status": "Manutenção",
        "color": "#777d84",
        "value": {!!$manutencao!!}
      }, {
        "status": "Stand By",
        "color": "#3e658e",
        "value": {!!$standBy!!}
      } ],
      "valueField": "value",
      "colorField": "color",
      "titleField": "status",
      "outlineAlpha": 0.4,
      "depth3D": 20,
      "pullOutRadius": 0,
      "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
      "angle": 30,
      "export": {
        "enabled": true
      }
    } );
  </script>
</div>

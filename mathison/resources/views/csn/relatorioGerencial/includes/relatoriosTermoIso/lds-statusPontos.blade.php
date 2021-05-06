<div id="page-content-wrapper-side">
  <div class="container-fluid">
<!-- - - - - - - - - - - - GRÁFICO GGOP-PR PERFIL DAS LINHAS - - - - - - - - - - - -->
    <div class="rowRelGer">
      <div class="col-md-8 col-md-offset-3">
        <div class="panel panel-default"style="background-color:#f1f1f1;">
            <div class="panel-heading">
                <strong><h4 style="color:#555; margin: 0 0 0px;">GGOP-PR</h4></strong>
            </div>
            <div class="panel-body">
              <h5 style="color:#555; margin: 0 0 0 0px;"><strong>Termografia</strong></h5>
              <div class="panel panel-default">
                <h6 style="color:#555;"><strong>Perfil das Linhas</strong></h6>
                <div id="chartdivTermoPerfilColetados"></div>  <!-- Gráfico principal Termografia Perfil Coletados -->
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="rowRelGer">
      <div class="col-md-8 col-md-offset-3">
        <div class="panel panel-default"style="background-color:#f1f1f1;">
            <div class="panel-body" style="background-color:#f1f1f1;">
                <div class="col-md-3">
                  <div id="chartdiv1"></div>
                </div>
                <div class="col-md-3">
                  <div id=""></div>
                </div>
                <div class="col-md-3">
                  <div id=""></div>
                </div>
                <div class="col-md-3">
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
        "value": {!!$criticoTermoEletrica!!}
      }, {
        "status": "Alarme",
        "color": "#f7f32c",
        "value": {!!$alarmeTermoEletrica!!}
      }, {
        "status": "Normal",
        "color": "#2d9b1a",
        "value": {!!$normalTermoEletrica!!}
      } ],
      "valueField": "value",
      "colorField": "color",
      "titleField": "status",
      "outlineAlpha": 0.4,
      "depth3D": 20,
      "innerRadius": 80,
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
        "value": 3
      }, {
        "status": "Stand By",
        "color": "#3e658e",
        "value": 11
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

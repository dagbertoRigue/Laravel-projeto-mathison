<link href="/css/btnFlutuante.css" rel="stylesheet">
<style media="screen">
  #chartdiv_ri {
  	width	: 100%;
  	height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_ia {
  	width	: 100%;
  	height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_ip {
  	width	: 100%;
  	height	: 500px;
  }
</style>
<style media="screen">
  #chartdiv_ro {
  	width	: 100%;
  	height	: 500px;
  }
</style>
<style media="screen">
  .cab_cent {text-align: center};
</style>
<style>
  .buttondg {
    padding: 10px;
    width: 13.3%;
   -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: #636b6f;
   font-size: 16px;
   font-family: Arial Black;
   text-decoration: none;
   vertical-align: middle;
   }
.buttondg:hover {
   border-top-color: #11de29;
   background: #11de29;
   color: #fff;
   }
.buttondg:active {
   border-top-color: #f8ff1f;
   background: #f8ff1f;
   }
</style>

<style>
  .panel-relative{
    position: relative;
  }
  .btn-right{
    position: absolute;
    right: 15px;
  }
</style>

<form class="form" style= "max-width: none;">
<div id="wrapper-side">
  <!-- Sidebar -->
  <div id="page-content-wrapper-side">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default" style="background-color:#f1f1f1;">
            <div class="panel-heading" style="height: 42px;">
              <div class="col-md-12">
                <div class="col-md-3">Laudo Nº:<strong> {{ $cod_laudo }} VB</strong></div>
              </div>
            </div>
            <div class="row" style="padding-top:15px; padding-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="col-md-7" style="padding:15px 0px 0px 0px;">
                  <div class="panel panel-default" style="height:472px;padding-bottom:75px;">
                    <div class="panel-heading" style="height:75px;">
                      <div class="col-md-12">
                        <label for="text" style="padding-top:16px; font-size:16px;"><i class="fas fa-tag"></i> TAG:<strong> {{ $tag_ativ }}</strong></label><br>
                      </div>
                    </div>
                    <div class="row" style="padding-top:35px; padding-bottom:15px; font-size:16px;">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="form-group" style="padding-top:30px;">
                          <label id = "laudo_vibracao" for="text"><i class="fas fa-clipboard-list"></i> <strong>Dados do Laudo:</strong></label><br><br>
                          <label for="text">Data:<strong> {{ date('d-m-Y', strtotime(substr($data_analise, 0, 10))) }}</strong></label><br>
                          <label for="text">Linha:<strong> {{ $negocio_name }}</strong></label><br>
                          <label for="text">Sistema:<strong> {{ $sistema_name }}</strong></label><br>
                          <label for="text">Equipamento:<strong> {{ $ativo_name }}</strong></label><br>
                          @if ($descricao_ativ !== null)
                              <label for="text"> Descrição Equipamento:<strong> {{ $descricao_ativ }}</strong></label><br>
                          @else
                              <label for="text"> </label><br>
                          @endif

                          @if ($diagnostico_name !== null)
                              <label for="text"><i class="fas fa-capsules"></i>Diagnóstico:<strong> {{ $diagnostico_name }}</strong></label><br>
                          @else
                              <label for="text"> </label><br>
                          @endif
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-md-5" style="padding-top:15px; padding-right:0px" id="tag_equipamento">
                <div class="panel panel-default">
                  <div class="panel-heading text-center panel-relative" style="height:75px; background-color:{{$colorStatus }}">
                      <strong style="font-size:35px;">{{ $status }}</strong>
                  </div>
                  <style media="screen">
                    #divImg {
                      width: 100%;
                      height: 395px;
                      position: relative;
                    }
                    #imgDiv {
                      width:400px;
                      height:395px;
                      position:absolute;
                      top:50%;
                      left:50%;
                      margin-top:-198px;
                      margin-left:-200px;
                    }
                  </style>
                  <div id="divImg">
                    <img id="imgDiv" src="{{ '/'.$img_atividade }}" style="padding:15px 15px 15px 15px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
               <div class="panel-heading">
                   <strong><i class="fas fa-history"></i> Laudos Anteriores</strong>
               </div>

               @if ($historicoCount == 1)
                 <div class="table-responsive">
                     <table class="table">
                       <tr>
                           <th colspan="1">Laudo Atual:</th>
                       </tr>
                       <tr>
                         @foreach ($historico as $key => $hist)
                          <td style="padding:15px">
                             <a
                                type="button" class="btn buttondg"
                                style="border-top: 1px solid #fff;
                                color: {{$hist->color}};
                                background: #fff;
                                background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                width:100%;">
                               {{$hist->id}} VB <br>{{ date('d-m-Y', strtotime(substr($data_analise, 0, 10))) }}
                             </a>

                          </td>
                        @endforeach
                       </tr>
                     </table>
                 </div>
               @elseif ($historicoCount > 1 AND $historicoCount < 7)
                 <div class="table-responsive">
                     <table class="table">
                             <tr>
                                 <th colspan={{$historicoCount-1}}>Histórico</th>
                                 <th colspan="1">Laudo Atual:</th>
                             </tr>
                             <tr>
                                 @foreach ($historico->slice(0, 7) as $key => $hist)
                                   @if($cod_laudo == $hist->id)
                                    <td style="padding:15px">
                                       <a
                                          type="button" class="btn buttondg"
                                          style="border-top: 1px solid #fff;
                                          color: {{$hist->color}};
                                          background: #fff;
                                          background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                          width:100%;">
                                         {{$hist->id}} VB <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                       </a>
                                    </td>
                                       @else
                                       <td style="padding:15px">
                                       <a href="/preditiva.csn.br/laudos/vibracao/laudo/equipamento/{{$hist->id}}"
                                          type="button" class="btn buttondg"
                                          style="border-top: 1px solid {{$hist->color}};
                                          background: {{$hist->color}};
                                          width:100%;">
                                         {{$hist->id}} VB <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                       </a>
                                       </td>
                                     @endif
                                   @endforeach
                             </tr>
                     </table>
                 </div>
                 @else
                  <div class="table-responsive">
                      <table class="table">
                              <tr>
                                  <th colspan="5">Histórico</th>
                                  <th colspan="1">Laudo Atual:</th>
                              </tr>
                              <tr>
                                  @foreach ($historico->slice($historicoCount-6, $historicoCount) as $key => $hist)
                                    @if($cod_laudo == $hist->id)
                                    <td style="padding:15px">
                                       <a
                                          type="button" class="btn buttondg"
                                          style="border-top: 1px solid #fff;
                                          color: {{$hist->color}};
                                          background: #fff;
                                          background: -webkit-gradient(linear, left top, left bottom, from(#c0c2c6), to(#fff));
                                          width:100%;">
                                         {{$hist->id}} VB <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                       </a>
                                    </td>
                                    @else
                                        <td style="padding:15px">
                                          <a href="/preditiva.csn.br/laudos/vibracao/laudo/equipamento/{{$hist->id}}"
                                             type="button" class="btn buttondg"
                                             style="border-top: 1px solid {{$hist->color}};
                                             background: {{$hist->color}};
                                             width:100%;">
                                            {{$hist->id}} VB <br>{{ date('d-m-Y', strtotime(substr($hist->date_analise, 0, 10))) }}
                                          </a>
                                        </td>
                                      @endif
                                    @endforeach
                              </tr>
                      </table>
                  </div>
               @endif
               <div class="btnPesquisar">
                 <div class="col-3 btnPesquisarBtn">
                   <a href="{{$btnRetorno}}" type="button" class="btn btn-danger btnCircular btnPrincipal"  style="width:125%"><i class="fas fa-arrow-left"></i></a>
                 </div>
               </div>
             </div>
           </div>
         </div>

          @if ($diagnostico_name !== null)
            <div class="row" style="padding-top:0px; padding-bottom:15px;">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="row" style="padding-top:15px; padding-bottom:15px;">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="form-group" style="padding-top:15px;" id="obs">
                        <label for="text"><i class="fas fa-bookmark"></i> Observação:</label><br>
                        <div class="panel panel-default">
                          <label for="text"style="padding:15px 15px 15px 15px;"><strong> {{ $obs }}</strong></label><br>
                        </div>
                      </div>
                      @if ($recom !== null)
                      <div class="form-group" style="padding-top:15px;" id="edt">
                        <label for="text"><i class="fas fa-comment"></i> Recomendação:</label><br>
                        <div class="panel panel-default">
                          <label for="text"style="padding:15px 15px 15px 15px;"><strong> {{ $recom }}</strong></label><br>
                        </div>
                      </div>
                      @else
                      <div></div>
                      @endif
                    </div>
                  </div>
                  <div class="row" style="padding-top:0px; padding-bottom:15px;" id = "pagina2">
                    <div class="col-md-10 col-md-offset-1">
                      @if ($i > 1)
                        <div class="panel panel-default">
                          <div class="row" style="padding-top:15px; padding-bottom:15px;">
                            <div class="col-md-12">
                              <label>{{ $img_laudo }}</label>
                              <div class="form-group" style="padding-top:15px;" id = "img">
                                @foreach ($img_laudo as $key => $value)
                                <div class="col-md-12">
                                  <img src="{{ ('/'.$value)  }}" style="width: 100%; height:auto; padding:15px 15px 15px 45px;">
                                </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      <div class="form-group" id="nome_tecnico">
                        <label for="text"><i class="fas fa-user"></i> Analista:</label><br>
                        <div class="panel panel-default"  style="padding:15px;">
                          <label for="text"> <strong> {{ $user_name }}</strong></label><br>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <input type="button" id="create_pdf" value="Gerar PDF">  -->
                </div>
              </div>
            </div>
          @else
          <div class="row" style="padding-top:0px; padding-bottom:15px;">
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                <div class="row" style="padding-top:0px; padding-bottom:15px;" id = "pagina2">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="form-group" style="padding-top:15px;" id="nome_tecnico">
                      <label for="text"><i class="fas fa-user"></i> Analista:</label><br>
                      <div class="panel panel-default"  style="padding:15px;">
                        <label for="text"> <strong> {{ $user_name }}</strong></label><br>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <input type="button" id="create_pdf" value="Gerar PDF">  -->
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      </div>
    </div>
  </div>
 </div>
</form>

<script>
(function () {
    var
     form = $('.form'),
     cache_width = form.width(),
     a4 = [400, -50]; // for a4 size paper width and height
//400
//-50

    $('#create_pdf').on('click', function () {
        $('body').scrollTop(0);
        var status_equip = document.getElementById("laudo_vibracao");
        //alert(status_equip);

        createPDF();
    });
    //create pdf
    function createPDF() {
        getCanvas().then(function (canvas) {
            var
             img = canvas.toDataURL("image/png"),
             doc = new jsPDF({
                 unit: 'px',
                 format: 'a4'
             });                      //L   A

             //var status_equip = document.getElementById('wrapper-side');
             //alert(status_equip);
/*
             //-------------
             doc.fromHTML(document.getElementById('wrapper-side'),
               margins.left, // x coord
               margins.top,
               {
                 // y coord
                 width: margins.width// max width of content on PDF
               },function(dispose) {
                 headerFooterFormatting(doc, doc.internal.getNumberOfPages());
               },
               margins);

               var iframe = document.createElement('iframe');
               iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:650px;

padding:20px;');
               document.body.appendChild(iframe);
               //iframe.src = doc.output('datauristring');
             //-------------
*/
            //status_equip = 3;           //-10
            doc.addImage(img, 'JPEG', -75, -10);

          //  if(status_equip != 3)
          //  {
            var ctx = canvas.getContext('2d');
                    ctx.scale(2, 2);
                    var imgData = canvas.toDataURL("image/png", 1.0);
                    var htmlH = $(".form").height();
                    var width = canvas.width;
                    var height = canvas.clientHeight;
                    doc.addPage();
                    doc.addImage(imgData, 'JPEG', -75, -645);
          //  }

            doc.save('Vibração_laudo.pdf');
            form.width(cache_width);

        });
    }



//------------
function headerFooterFormatting(doc, totalPages)
{
    for(var i = totalPages; i >= 1; i--)
    {
        doc.setPage(i);
        footer(doc, i, totalPages);
        doc.page++;
    }
};
//------------



//------------
function footer(doc, pageNumber, totalPages){

    var str = "Page " + pageNumber + " of " + totalPages

    doc.setFontSize(10);
    doc.text(str, margins.left, doc.internal.pageSize.height - 20);

};
//------------


    // create canvas object
    function getCanvas() {
        form.width((a4[0] * 3.00000) - 80).css('max-width', 'none');
        return html2canvas(form, {
            imageTimeout: 2000,
            removeContainer: true
        });
    }



}());


    /*
 * jQuery helper plugin for examples and tests
 */
    (function ($) {
        $.fn.html2canvas = function (options) {
            var date = new Date(),
            $message = null,
            timeoutTimer = false,
            timer = date.getTime();
            html2canvas.logging = options && options.logging;
            html2canvas.Preload(this[0], $.extend({
                complete: function (images) {
                    var queue = html2canvas.Parse(this[0], images, options),
                    $canvas = $(html2canvas.Renderer(queue, options)),
                    finishTime = new Date();

                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);
                    $canvas.siblings().toggle();

                    $(window).click(function () {
                        if (!$canvas.is(':visible')) {
                            $canvas.toggle().siblings().toggle();
                            throwMessage("Canvas Render visible");
                        } else {
                            $canvas.siblings().toggle();
                            $canvas.toggle();
                            throwMessage("Canvas Render hidden");
                        }
                    });
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />",

4000);
                }
            }, options));

            function throwMessage(msg, duration) {
                window.clearTimeout(timeoutTimer);
                timeoutTimer = window.setTimeout(function () {
                    $message.fadeOut(function () {
                        $message.remove();
                    });
                }, duration || 2000);
                if ($message)
                    $message.remove();
                $message = $('<div ></div>').html(msg).css({
                    margin: 0,
                    padding: 10,
                    background: "#000",
                    opacity: 0.7,
                    position: "auto",
                    top: 10,
                    right: 10,
                    fontFamily: 'Tahoma',
                    color: '#fff',
                    fontSize: 12,
                    borderRadius: 12,
                    width: 'auto',
                    height: 'auto',
                    textAlign: 'auto',
                    textDecoration: 'none'
                }).hide().fadeIn().appendTo('body');
            }
        };
    })(jQuery);

</script>

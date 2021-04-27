<?php

namespace App\Http\Controllers\Csn;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Models\Negocios;
use App\Models\Preditiva_status;
use App\Models\Diagnosticos;
use App\Models\Preditiva_analises;
use App\Models\Preditiva_atividades;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Symfony\Composer\Process\Process;
use Symfony\Composer\Process\Exception\ProcessFailedException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\storage;
use Image;
use File;
use DB;
use App\Http\Controllers\Csn\AuxFunc as aux;

class TermografiaIsoController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {

    $title = 'Preditiva | Termografia Isolamentos';

    $negocios = DB::table("negocios")
                      ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                      ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                      ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                      ->where("preditiva_atividades.tecnicas_id", "=", 2)
                      ->pluck("negocios.name_negocio","negocios.id");
    $status = Preditiva_status::all()->where('id', '<>', 3);
    $status2 = Preditiva_status::all()->where('id', '>', 3);
    $diagnosticos = Diagnosticos::all()->where('tecnica_id', '=', 2);
    $diagnosticos2 = Diagnosticos::all()->where('tecnica_id', '=', 2);
    $diagnosticos3 = Diagnosticos::all()->where('tecnica_id', '=', 2);
    $dateTime = Carbon::now();
    $image = Request::input('imagemTermograficaIso');
    $image_file = Request::file('imagemTermograficaIso');
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');

    return view('csn.technician.termografiaIso')
            ->with('negocios', $negocios)
            ->with('status', $status)
            ->with('diagnosticos', $diagnosticos)
            ->with('diagnosticos2', $diagnosticos2)
            ->with('diagnosticos3', $diagnosticos3)
            ->with('dateTime', $dateTime)
            ->with('title', $title);
  }

  /**
   * Get Ajax Request and restun Tag from Preditiva_atividades
   *
   * @return \Illuminate\Http\Response
   */
  public function myformAtividadesAjax($id) {

    $sistemas = DB::table("negocios")
                      ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                      ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                      ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                      ->where("preditiva_atividades.tecnicas_id", "=", 2)
                      ->where("negocios.id", "=", $id)
                      ->pluck("sistemas.name_sistema", "sistemas.id");

    return json_encode($sistemas);
  }

  function soNumero($str) {
    return preg_replace("/[^0-9]/", "", $str);
}

  public function myformTabela(Request $req) {

    $id_sist = Input::get('data');

    $atividadesPorSistema = DB::table("ativos")
                              ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                              ->where("preditiva_atividades.tecnicas_id", "=", 2)
                              ->where("ativos.sistema_id", "=", $id_sist)
                              ->select('preditiva_atividades.id', 'preditiva_atividades.description_ativ',
                                        'preditiva_atividades.tag_ativ', 'ativos.name_ativo')
                              ->orderBy('preditiva_atividades.description_ativ', 'asc')
                              ->get();

    $indice_tg = 0;
    $colorStatus = "";
    $tabela[0] = ([
                  'id' => '',
                  'date_analise' => "",
                  'status_id' => "",
                  'campo2' => "",
                  'campo5' => "",
                  'campo6' => "",
                  'colorStatus' => "",
                  'description_ativ' => '',
                  'tag_ativ' => '',
                  'name_ativo' => '',
                  'analise_id' => '',
                  'laudo_id' => ''
                  ]);

    foreach ($atividadesPorSistema as $value) {
      $id_ativ_aux = $value->id;
      $description_ativ_aux = $value->description_ativ;
      $max = 50;
      $description_ativ_aux =  substr_replace($description_ativ_aux, (strlen($description_ativ_aux) > $max ? '...' : ''), $max);
      $tag_ativ_aux = $value->tag_ativ;
      $name_ativ_aux = $value->name_ativo;

      $id_analise_aux = DB::table('preditiva_analises')->where('atividade_id', '=', $id_ativ_aux)->orderBy('id', 'desc')->first();
      $id_analise = $id_analise_aux->id;
      $date_analise = $id_analise_aux->date_analise;
      $id_status = $id_analise_aux->status_id;

      $id_laudo = DB::table('amostras')->where('analise_id', '=', $id_analise)->value('laudo_id');
      $secao = DB::table('amostras')->where('analise_id', '=', $id_analise)->value('campo2');
      $alarme = DB::table('amostras')->where('analise_id', '=', $id_analise)->value('campo5');
      $critico = DB::table('amostras')->where('analise_id', '=', $id_analise)->value('campo6');


      if ($id_ativ_aux != null) {
        $tabela[$indice_tg] = array(
                                    'id' => $id_ativ_aux,
                                    'date_analise' => $date_analise,
                                    'status_id' => $id_status,
                                    'campo2' => $secao,
                                    'campo5' => $alarme,
                                    'campo6' => $critico,
                                    'colorStatus' => $id_status,
                                    'description_ativ' => $description_ativ_aux,
                                    'tag_ativ' => $tag_ativ_aux,
                                    'name_ativo' => $name_ativ_aux,
                                    'analise_id' => $id_analise,
                                    'laudo_id' => $id_laudo
                                  );
      } else {}

      $indice_tg++;
    }

    $tabela = collect($tabela)->toArray();
    return json_encode($tabela);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {

    $user_id = Input::get('user_id');
    $tecnica = 2;
    $atividade_id = Input::get('atividade_id');
    $atividade_tag = Input::get('atividade_tag');
    $status = Input::get('status_id');
    $termograma = Input::get('termograma');
    $temperatura = Input::get('temperatura');
    $selecionaZona = Input::get('selecionaZona');
    $temperaturazona = Input::get('zona');
    $gradiente = Input::get('gradiente');
    $dataanalise = Input::get('dataanalise');
    $date = Carbon::createFromFormat('d-m-Y', $dataanalise);
    $camera = Input::get('camera');
    $alarme = Input::get('alarme');
    $critico = Input::get('critico');
    $diagnostico_id = Input::get('diagnostico_id');
    $imagem = Request::file('imagem');
    $observation = Input::get('obs');
    $recommendation = Input::get('rec');

    if($diagnostico_id == "Diagnósticos") {
      $diagnostico_id = "";
    } else {
        $diagnostico_id = $diagnostico_id;
    }

    switch ($camera) {
      case '0':
        $camera = 'Não informada.';
        break;
      case '1':
        $camera = 'FLIR C2 – 720064326';
        break;
      case '2':
        $camera = 'FLIR C2 – 720063340';
        break;
      case '3':
        $camera = 'FLIR T440 – 62107788';
        break;
      case '4':
        $camera = 'FLIR AX8 – 71211845';
        break;
      case '5':
        $camera = 'FLUKE – Ti45FT-0712299';
        break;
      case 'Câmeras':
        $camera = 'Não informada.';
        break;
      default:
        $camera = 'Não informada.';
        break;
    }
    $ok = 'Inserido com sucesso!';

    if ($status == '1' || $status == '2') { //1 - manutenção; 2 - stand by;
      $max_id_analise = DB::table('preditiva_analises')->max('id');
      DB::insert('insert into preditiva_analises (id, date_analise, atividade_id, user_id, status_id, tecnicas_id)
                  values (?,?,?,?,?,?)', array($max_id_analise+1, $date, $atividade_id, $user_id, $status, $tecnica));
      $id_laudo = DB::table('laudos')->max('id');
      DB::insert('insert into laudos (id, analise_id) values (?, ?)', array($id_laudo+1, $max_id_analise+1));
      return json_encode($ok);
    }
    if ($status == '3' || $status == '4' || $status == '5') { //outros status
      $max_id_analise = DB::table('Preditiva_analises')->max('id');
      DB::insert('insert into preditiva_analises (id, date_analise, atividade_id, user_id, status_id, observation_analise, diagnostico_id, recommendation_analise, tecnicas_id)
           values (?,?,?,?,?,?,?,?,?)', array($max_id_analise+1, $date, $atividade_id, $user_id, $status, $observation, $diagnostico_id, $recommendation, $tecnica));
      $id_laudo = DB::table('laudos')->max('id');
      DB::insert('insert into laudos (id, analise_id) values (?, ?)', array($id_laudo+1, $max_id_analise+1));
      if ($temperatura != null || $temperatura != "") {
        $id_amostras = DB::table('amostras')->max('id');
        DB::insert('insert into amostras (id, tecnicas_id, campo1, campo2, campo3, campo4, campo5, campo6, laudo_id, analise_id) values (?,?,?,?,?,?,?,?,?,?)',
        array($id_amostras+1, $tecnica, $temperatura, $selecionaZona, $temperaturazona, $gradiente,$alarme, $critico, $id_laudo+1, $max_id_analise+1));
        if(Input::hasFile('imagem')) {
          $id_imagem_laudo = DB::table('imagem_laudos')->max('id');
          $nameMathison  = time().'-'.$imagem->getClientOriginalName();
          $location = 'imagem_termo_isolamento\\'.$nameMathison;
          Image::make($imagem)->save($location);
          DB::insert('insert into imagem_laudos (id, location, laudo_id, campo2, campo3) values (?,?,?,?,?)',
          array($id_imagem_laudo+1, $location, $id_laudo+1, $termograma, $camera));
        } else {}
      } else { }
        return json_encode($ok);
    }
  }
}

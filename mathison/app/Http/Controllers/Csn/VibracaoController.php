<?php

namespace App\Http\Controllers\Csn;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use DB;
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
use Image;
use File;
use Illuminate\Support\Facades\storage;
use App\Http\Controllers\Csn\AuxFunc as aux;

class VibracaoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

      $title = 'Preditiva | Vibração';

      $negocios = DB::table("negocios")
                        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                        ->where("preditiva_atividades.tecnicas_id", "=", 3)
                        ->pluck("negocios.name_negocio","negocios.id");
                        
      $sistemas = DB::table("sistemas")->pluck("name_sistema","id");
      $ativos = DB::table("ativos")->pluck("name_ativo","id");
      $atividades = DB::table("preditiva_atividades")->pluck("tag_ativ","id");
      $status = Preditiva_status::all()->where('id', '<>', 3);
      $status2 = Preditiva_status::all()->where('id', '>', 3);
      $diagnosticos = Diagnosticos::all()->where('tecnica_id', '=', 3);
      $dateTime = Carbon::now();
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      // ============================================================ TABELA
      $tabela = aux::GeralAnormalidadesVib($atual1)->where('status_id', '>', 0);
      $indice_tg = 0;
      $colorStatus = "";
      $tb_anormalidades[0] = (['indice_tg' => $indice_tg,
                                'data' => "",
                                'idLaudo' => "",
                                'descAtividade' => "de Atividade ",
                                'descAtivo' => "Registro ",
                                'descSistema' => "Sem ",
                                'descNegocio' => "S/L",
                                'status' => "",
                                'colorStatus' => ""]);
      foreach ($tabela as $key => $value) {
       $dateAnalise = $value->date_analise;
       $datef = json_encode($dateAnalise);
       $data_analise = substr($datef, 1, 11);
       $statusAnalise = $value->status_id;
       if ($statusAnalise == 1) {
         $statusAnalise = 'Manutenção';
         $colorStatus = '#777d84';
       }
       if ($statusAnalise == 2) {
         $statusAnalise = 'StandBy';
         $colorStatus = '#3e658e';
       }
       if ($statusAnalise == 3) {
         $statusAnalise = 'Normal';
         $colorStatus = '#00cc00';
       }
       if ($statusAnalise == 4) {
         $statusAnalise = 'Alarme';
         $colorStatus = '#fff000';
       }
       if ($statusAnalise == 5) {
         $statusAnalise = 'Crítico';
         $colorStatus = '#ff0000';

       }
       $dado1 = $value->atividade_id;
       $dado2 = $value->id;
       $idLaudo = DB::table('laudos')->where('analise_id', '=', $dado2)->value('id');
       $descAtividade = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('description_ativ');
       $idAtivo = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('ativo_id');
       $descAtivo = DB::table('ativos')->where('id', '=', $idAtivo)->value('name_ativo');
       $idSistema = DB::table('ativos')->where('id', '=', $idAtivo)->value('sistema_id');
       $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema)->value('negocio_id');
       $nameSistema = DB::table('sistemas')->where('id', '=', $idSistema)->value('name_sistema');
       $nameNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
       if ($nameNegocio == "UNIDADE DE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
       if ($nameNegocio == "LAMINADOR REVERSIVEL DE TIRAS A FRIO 01") { $nameNegocio = "LRF"; }
       if ($nameNegocio == "DECAPAGEM 1") { $nameNegocio = "LDS"; }
       if ($nameNegocio == "GALVANIZACAO 1") { $nameNegocio = "LGC"; }
       if ($nameNegocio == "UNIDADE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
       if ($nameNegocio == "ESTACAO DE TRATAMENTO DE AFLUENTES (ETA)") { $nameNegocio = "ETA"; }
       if ($nameNegocio == "ESTACAO DE TRATAMENTO DE EFLUENTES (ETE)") { $nameNegocio = "ETE"; }
       if ($nameNegocio == "LCC 1") { $nameNegocio = "LCC1"; }
       if ($nameNegocio == "LCL 1") { $nameNegocio = "LCL1"; }
       if ($nameNegocio == "PINTURA 1") { $nameNegocio = "LPC"; }
       if ($nameNegocio == "PRODUCAO DE AR COMPRIMIDO") { $nameNegocio = "UTI"; }
       if ($nameNegocio == "PRODUCAO DE VAPOR") { $nameNegocio = "UTI"; }
       if ($nameNegocio == "PONTE ROLANTE 01") { $nameNegocio = "PR01"; }
       if ($nameNegocio == "PONTE ROLANTE 02") { $nameNegocio = "PR02"; }
       if ($nameNegocio == "PONTE ROLANTE 03") { $nameNegocio = "PR03"; }
       if ($nameNegocio == "PONTE ROLANTE 04") { $nameNegocio = "PR04"; }
       if ($nameNegocio == "PONTE ROLANTE 05") { $nameNegocio = "PR05"; }
       if ($nameNegocio == "PONTE ROLANTE 06") { $nameNegocio = "PR06"; }
       if ($nameNegocio == "PONTE ROLANTE 07") { $nameNegocio = "PR07"; }
       if ($nameNegocio == "PONTE ROLANTE 08") { $nameNegocio = "PR08"; }
       if ($nameNegocio == "PONTE ROLANTE 09") { $nameNegocio = "PR09"; }
       if ($nameNegocio == "PONTE ROLANTE 10") { $nameNegocio = "PR10"; }
       if ($nameNegocio == "PONTE ROLANTE 11") { $nameNegocio = "PR11"; }
       if ($nameNegocio == "PONTE ROLANTE 12") { $nameNegocio = "PR12"; }
       if ($nameNegocio == "PONTE ROLANTE 13") { $nameNegocio = "PR13"; }
       if ($nameNegocio == "PONTE ROLANTE 14") { $nameNegocio = "PR14"; }
       if ($nameNegocio == "PONTE ROLANTE 15") { $nameNegocio = "PR15"; }
       if ($nameNegocio == "PONTE ROLANTE 16") { $nameNegocio = "PR16"; }
       if ($nameNegocio == "PONTE ROLANTE 17") { $nameNegocio = "PR17"; }
       if ($nameNegocio == "PONTE ROLANTE 18") { $nameNegocio = "PR18"; }
       if ($nameNegocio == "PONTE ROLANTE 19") { $nameNegocio = "PR19"; }
       if ($nameNegocio == "PONTE ROLANTE 20") { $nameNegocio = "PR20"; }
       if ($nameNegocio == "PONTE ROLANTE 21") { $nameNegocio = "PR21"; }
       if ($nameNegocio == "PONTE ROLANTE 22") { $nameNegocio = "PR22"; }
       if ($nameNegocio == "PONTE ROLANTE 23") { $nameNegocio = "PR23"; }
       if ($nameNegocio == null) {$nameNegocio = ""; }
       if ($nameSistema == null) {$nameSistema = ""; } else {$nameSistema = $nameSistema." - ";}
       if ($descAtivo == null) {$descAtivo = ""; } else {$descAtivo = $descAtivo." - ";}
       $tb_anormalidades[$indice_tg] = array(
                                'indice_tg' => $indice_tg,
                                'data' => $data_analise,
                                'idLaudo' => $idLaudo,
                                'descAtividade' => $descAtividade,
                                'descAtivo' => $descAtivo,
                                'descSistema' => $nameSistema,
                                'descNegocio' => $nameNegocio,
                                'status' => $statusAnalise,
                                'colorStatus' => $colorStatus
                                );
       $indice_tg++;
      }
      $tb_anormalidades = collect($tb_anormalidades)->sortBy('data')->reverse()->toArray();

      return view('csn.technician.vibracao')
              ->with('negocios', $negocios)->with('sistemas', $sistemas)->with('ativos', $ativos)->with('preditiva_atividades', $atividades)
              ->with('status', $status)->with('status2', $status2)->with('diagnosticos', $diagnosticos)->with('dateTime', $dateTime)->with('title', $title)->with('tb_anormalidades', $tb_anormalidades);
    }
    /**
     * Get Ajax Request and restun Tag from Preditiva_atividades
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAtividadesAjax($id) {

      $atividades = DB::table("negocios")
                        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                        ->where("preditiva_atividades.tecnicas_id", "=", 3)
                        ->where("negocios.id", "=", $id)
                        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id");

      return json_encode($atividades);
    }

    public function myformTabela(Request $req) {

      $id_ativ = Input::get('data');

      $historico = DB::table('laudos')
                       ->join('preditiva_analises', 'preditiva_analises.id', '=', 'laudos.analise_id')
                       ->join('preditiva_status', 'preditiva_status.id', '=', 'preditiva_analises.status_id')
                       ->join('preditiva_atividades', 'preditiva_atividades.id', '=', 'preditiva_analises.atividade_id')
                       ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                       ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                       ->where('preditiva_analises.atividade_id', '=', $id_ativ)
                       ->orderby('laudos.id', 'desc')
                       ->select('preditiva_analises.date_analise', 'preditiva_status.color',  'laudos.id', 'ativos.name_ativo', 'sistemas.name_sistema', 'preditiva_atividades.description_ativ')
                       ->get();
      return json_encode($historico);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $date = Request::input('data');
        $atividade_id = Request::input('atividades');
        $user_id = Request::input('user_id');
        $status = Request::input('status_id');
        $diagnostico_id = Request::input('diagnostico_id');
        $observation = Request::input('observation');
        $recommendation = Request::input('recommendation');
        $tecnica = "3";
        $files = Request::file('uploads');
        $max_id_analise = DB::table('Preditiva_analises')->max('id');

        if ($status == '1' || $status == '2' || $status == '3') { //1 - manutenção; 2 - stand by; 3 - normal

            DB::insert('insert into Preditiva_analises (id, date_analise, atividade_id, user_id, status_id, observation_analise, recommendation_analise, tecnicas_id)
                    values (?,?,?,?,?,?,?,?)', array($max_id_analise+1, $date, $atividade_id, $user_id, $status, $observation, $recommendation, $tecnica));

            $id_analise = DB::table('Preditiva_analises')->max('id');
            $id_laudo = DB::table('laudos')->max('id');
            DB::insert('insert into laudos (id, analise_id) values (?, ?)', array($id_laudo+1, $id_analise));

        } else {

        DB::insert('insert into Preditiva_analises (id, date_analise, atividade_id, user_id, status_id, observation_analise, diagnostico_id, recommendation_analise, tecnicas_id)
            values (?,?,?,?,?,?,?,?,?)', array($max_id_analise+1, $date, $atividade_id, $user_id, $status, $observation, $diagnostico_id, $recommendation, $tecnica));

        $id_analise = DB::table('Preditiva_analises')->max('id');
        $id_laudo = DB::table('laudos')->max('id');
        DB::insert('insert into laudos (id, analise_id) values (?, ?)', array($id_laudo+1, $id_analise));

        $id_laudo = DB::table('laudos')->max('id');
        $id_imagem_laudos = DB::table('imagem_laudos')->max('id');
        $id_imagem_laudo = $id_imagem_laudos;
          if(Input::hasFile('uploads')) {
              foreach ($files as $file) {
                  $id_imagem_laudo = $id_imagem_laudo + 1;
                  $nameMathison  = time().'-'.$file->getClientOriginalName();
                  $location = 'imagem_vibracao\\'.$nameMathison;
                  Image::make($file)->save($location);

                  DB::insert('insert into imagem_laudos (id, location, laudo_id) values (?,?,?)', array($id_imagem_laudo, $location, $id_laudo));
              }
          }
        }
        return redirect()->route('vibracao.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}

<?php

namespace App\Http\Controllers\Csn;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use DB;
use App\Models\Status;
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


class LaudoOleoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('csn.laudos.laudo_oleo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

      $cod_laudo = Request::input('codigoLaudo');
     // dd($cod_laudo);

      $oleo = "4";
      $idAnalise_laudos = DB::table('laudos')->where('id', '=', $cod_laudo)->value('analise_id');
      $idAtividade_analises = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->where('tecnicas_id', '=', $oleo)->value('atividade_id');
    //  dd($idAtividade_analises);
    //  dd($idAtividade_analises);
      if($idAtividade_analises != null)
      {
         //$cod_laudo = Request::input('item1');
         //seleciona o caminho da imagem
       //  $laudo_resistencia = DB::table("laudos")->where('id', '=', $cod_laudo)->pluck("image_laudo", "id");
       //  select location, id from imagem_laudos where laudo_id = 14;
         //novo select
         $laudo_oleo = DB::table("imagem_laudos")->where('laudo_id', '=', $cod_laudo )->pluck("location", "id");

         //dd($laudo_resistencia);
         //$get = DB::select('select analise_id from preditiva.laudos where laudos.id = ?', [$cod_laudo]);

         $imagem_laudo = DB::select('select * from preditiva.preditiva_atividades where preditiva_atividades.id = (select atividade_id from preditiva.preditiva_analises where preditiva_analises.id = (select analise_id from preditiva.laudos where laudos.id = ?))', [$cod_laudo]);


       //  $tag_laudo = DB::select('select * from preditiva.preditiva_atividades where preditiva_atividades.id = (select atividade_id from preditiva.preditiva_analises where preditiva_analises.id = (select analise_id from preditiva.laudos where laudos.id = ?))', [$cod_laudo]);

       //  $data_inspecao = DB::select('select date_format(preditiva_analises.date_analise, "%d-%m-%Y") from preditiva.preditiva_analises where preditiva_analises.id = (select atividade_id from preditiva.preditiva_analises where preditiva_analises.id = (select analise_id from preditiva.laudos where laudos.id = ?))', [$cod_laudo]);


         $tag_laudo = DB::table('preditiva_atividades')->where('id', '=', $idAtividade_analises)->value('tag_ativ');
       //  dd($tag_laudo);
         $data_laudo = DB::table('preditiva_analises')
                             ->join('laudos', 'laudos.analise_id', '=', 'preditiva_analises.id')
                             ->where('laudos.id', '=', [$cod_laudo])
                             ->value('date_analise');

         $datef = json_encode($data_laudo);
         $data_format = substr($datef, 56, 10);
         //return($data_format);




         $userId_analises = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('user_id');
         $tecnico_laudo = DB::table('users')->where('id', '=', $userId_analises)->value('name_user');

         $observacao_laudo = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('observation_analise');

         $recomendacao_laudo = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('recommendation_analise');

         $status_id_analise = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('status_id');
         $status_laudo = DB::table('preditiva_status')->where('id', '=', $status_id_analise)->value('name_status');

         $diagnosticoId_analises = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('diagnostico_id');
         $diagnosctico_laudo = DB::table('preditiva_diagnosticos')->where('id', '=', $diagnosticoId_analises)->value('name_diag');

         $tempMax_laudo = DB::table('amostras')->where('analise_id', '=', $idAnalise_laudos)->value('campo1');

         $tempRef_laudo = DB::table('amostras')->where('analise_id', '=', $idAnalise_laudos)->value('campo2');

         $tempDelta_laudo = DB::table('amostras')->where('analise_id', '=', $idAnalise_laudos)->value('campo3');
         $ativoId_atividades = DB::table('preditiva_atividades')->where('id', '=', $idAtividade_analises)->value('ativo_id');
         $nomeAtivo = DB::table('ativos')->where('id', '=', $ativoId_atividades)->value('name_ativo');


         $idSistema_ativos = DB::table('ativos')->where('id', '=', $ativoId_atividades)->value('sistema_id');
         $nomeSistema = DB::table('sistemas')->where('id', '=', $idSistema_ativos)->value('name_sistema');

         $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema_ativos)->value('negocio_id');
         $nomeNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
         //Separa os elementos da string original
         $separa_string = substr($laudo_oleo, 48, 36);
         //substitui o tipo de barra de divisão
         $nova_string = str_replace('\\', '/', $separa_string);
         //dd($nova_string);


         //$data_format = substr($data_inspecao, 7, 20);
        //dd($data_inspecao);

         //Realiza os selects no banco para buscar os dados referêntes a um laudo termográfico
         //return($nomeAtivo);
         return view('csn.laudos.laudo_oleo_resultado')->with('cod_laudo', $cod_laudo)
                                                              ->with('imagem_laudo', $imagem_laudo)
                                                              ->with('data_format', $data_format)
                                                              ->with('tag_laudo', $tag_laudo)
                                                              ->with('tecnico_laudo', $tecnico_laudo)
                                                              ->with('observacao_laudo', $observacao_laudo)
                                                              ->with('recomendacao_laudo', $recomendacao_laudo)
                                                              ->with('status_laudo', $status_laudo)
                                                              ->with('diagnosctico_laudo', $diagnosctico_laudo)
                                                              ->with('tempMax_laudo', $tempMax_laudo)
                                                              ->with('tempRef_laudo', $tempRef_laudo)
                                                              ->with('tempDelta_laudo', $tempDelta_laudo)
                                                              ->with('nova_string', $nova_string)
                                                              ->with('nomeAtivo', $nomeAtivo)
                                                              ->with('nomeSistema', $nomeSistema)
                                                              ->with('nomeNegocio', $nomeNegocio)
                                                              ->with('data_laudo', $data_laudo);
      }
       return view('csn.laudos.laudo_oleo');
    }

    public function show_equipamento($id)
    {

        $cod_laudo = $id;
        $idAnalise_laudos = DB::table('laudos')->where('id', '=', $cod_laudo)->value('analise_id');
        $idAtividade_analises = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('atividade_id');


      //  $laudo_termografia = DB::table("laudos")->where('id', '=', $cod_laudo)->value("image_laudo", "id");
        $laudo_oleo = DB::table("imagem_laudos")->where('laudo_id', '=', $cod_laudo )->pluck("location", "id");
        //Separa os elementos da string original
        $separa_string = substr($laudo_oleo, 27, 1000);
        //substitui o tipo de barra de divisão
        $nova_string = str_replace('\\', '/', $separa_string);


        $tag_laudo = DB::table('preditiva_atividades')->where('id', '=', $idAtividade_analises)->value('tag_ativ');

        $data_laudo = DB::table('preditiva_analises')
                            ->join('laudos', 'laudos.analise_id', '=', 'preditiva_analises.id')
                            ->where('laudos.id', '=', [$cod_laudo])
                            ->value('date_analise');

        $userId_analises = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('user_id');
        $tecnico_laudo = DB::table('users')->where('id', '=', $userId_analises)->value('name_user');

        $observacao_laudo = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('observation_analise');

        $recomendacao_laudo = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('recommendation_analise');

        $status_id_analise = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('status_id');
        $status_laudo = DB::table('preditiva_status')->where('id', '=', $status_id_analise)->value('name_status');

        $diagnosticoId_analises = DB::table('preditiva_analises')->where('id', '=', $idAnalise_laudos)->value('diagnostico_id');
        $diagnosctico_laudo = DB::table('preditiva_diagnosticos')->where('id', '=', $diagnosticoId_analises)->value('name_diag');

        $tempMax_laudo = DB::table('amostras')->where('analise_id', '=', $idAnalise_laudos)->value('campo1');

        $tempRef_laudo = DB::table('amostras')->where('analise_id', '=', $idAnalise_laudos)->value('campo2');

        $tempDelta_laudo = DB::table('amostras')->where('analise_id', '=', $idAnalise_laudos)->value('campo3');

        $ativoId_atividades = DB::table('preditiva_atividades')->where('id', '=', $idAtividade_analises)->value('ativo_id');
        $nomeAtivo = DB::table('ativos')->where('id', '=', $ativoId_atividades)->value('name_ativo');


        $idSistema_ativos = DB::table('ativos')->where('id', '=', $ativoId_atividades)->value('sistema_id');
        $nomeSistema = DB::table('sistemas')->where('id', '=', $idSistema_ativos)->value('name_sistema');

        $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema_ativos)->value('negocio_id');
        $nomeNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
        return view('csn.laudos.laudo_oleo_resultado')->with('cod_laudo', $cod_laudo)
                                                             ->with('data_laudo', $data_laudo)
                                                             ->with('tag_laudo', $tag_laudo)
                                                             ->with('tecnico_laudo', $tecnico_laudo)
                                                             ->with('observacao_laudo', $observacao_laudo)
                                                             ->with('recomendacao_laudo', $recomendacao_laudo)
                                                             ->with('status_laudo', $status_laudo)
                                                             ->with('diagnosctico_laudo', $diagnosctico_laudo)
                                                             ->with('tempMax_laudo', $tempMax_laudo)
                                                             ->with('tempRef_laudo', $tempRef_laudo)
                                                             ->with('tempDelta_laudo', $tempDelta_laudo)
                                                             ->with('nova_string', $nova_string)
                                                             ->with('nomeAtivo', $nomeAtivo)
                                                             ->with('nomeSistema', $nomeSistema)
                                                             ->with('nomeNegocio', $nomeNegocio);
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

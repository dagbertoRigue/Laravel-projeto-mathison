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
use Illuminate\Support\Collection;


class LaudoTermografiaIsoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        return view('csn.laudos.laudo_termografia_isolamento');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show_equipamento($id) {

       $id_laudo = $id;

       $analise_id = DB::table('laudos')->where('id', '=', $id_laudo)->value('analise_id');
       $atividade_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('atividade_id');
       $tag_ativ = DB::table('preditiva_atividades')->where('id', '=', $atividade_id)->value('tag_ativ');

       $data_format = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('date_analise');
       $datef = json_encode($data_format);
       $data_analise = substr($datef, 1, 11);
       $ativo_id = DB::table('preditiva_atividades')->where('id', '=', $atividade_id)->value('ativo_id');
       $ativo_name = DB::table('ativos')->where('id', '=', $ativo_id)->value('name_ativo');
       $sistema_id = DB::table('ativos')->where('id', '=', $ativo_id)->value('sistema_id');
       $sistema_name = DB::table('sistemas')->where('id', '=', $sistema_id)->value('name_sistema');
       $negocio_id = DB::table('sistemas')->where('id', '=', $sistema_id)->value('negocio_id');
       $negocio_name =  DB::table('negocios')->where('id', '=', $negocio_id)->value('name_negocio');
       $descricao_ativ = DB::table( 'preditiva_atividades')->where('id', '=', $atividade_id)->value('description_ativ');
       $diagnóstico_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('diagnostico_id');
       $diagnostico_name = DB::table('preditiva_diagnosticos')->where('id', '=', $diagnóstico_id)->value('name_diag');

       $status_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('status_id');
       $statusF = DB::table('preditiva_status')->where('id', '=', $status_id)->value('name_status');
       switch ($statusF) {
        case 'MANUTENCAO':
          $status = 'MANUTENÇÃO';
          break;
        case 'CRITICO':
          $status = 'CRÍTICO';
          break;

        default:
          $status = $statusF;
          break;
       }
       $colorStatus = DB::table('preditiva_status')->where('id', '=', $status_id)->value('color');
       $img_atividade = DB::table('preditiva_atividades')->where('id', '=', $atividade_id)->value('image_ativ');

       /*Histórico de Laudos últimos 6 meses*/
       $historico = DB::table('laudos')
                       ->join('preditiva_analises', 'preditiva_analises.id', '=', 'laudos.analise_id')
                       ->join('preditiva_status', 'preditiva_status.id', '=', 'preditiva_analises.status_id')
                       ->where('preditiva_analises.atividade_id', '=', $atividade_id)
                       ->orderby('laudos.id', 'asc')
                       ->select('preditiva_analises.*', 'preditiva_status.color',  'laudos.id')
                       ->get();

       $historicoCount = $historico->count();

       $modelo_laudo = 0;
       if ($sistema_id == 256 || $sistema_id == 264) {
         $modelo_laudo = $modelo_laudo;
       } elseif ($sistema_id == 163) {
         $modelo_laudo = 1;
       } else {
         $modelo_laudo = 2;
       }

       $temp_medida = DB::table('amostras')->where('laudo_id', '=', $id_laudo)->value('campo1');
       $secao = DB::table('amostras')->where('laudo_id', '=', $id_laudo)->value('campo2');
       if ($secao == 1) {
         $secao = '#1';
       }elseif ($secao == 2) {
         $secao = '#2';
       }elseif ($secao == 3) {
         $secao = '#3';
       }elseif ($secao == 4) {
         $secao = '#4';
       }elseif ($secao == 5) {
         $secao = 'Pré-heater';
       }

       $temp_zona = DB::table('amostras')->where('laudo_id', '=', $id_laudo)->value('campo3');
       $gradiente = DB::table('amostras')->where('laudo_id', '=', $id_laudo)->value('campo4');
       $alarme = DB::table('amostras')->where('laudo_id', '=', $id_laudo)->value('campo5');
       $critico = DB::table('amostras')->where('laudo_id', '=', $id_laudo)->value('campo6');
       $img_termica = DB::table('imagem_laudos')->where('laudo_id', '=', $id_laudo)->value('location');
       $termograma = DB::table('imagem_laudos')->where('laudo_id', '=', $id_laudo)->value('campo2');
       $camera = DB::table('imagem_laudos')->where('laudo_id', '=', $id_laudo)->value('campo3');

       $obs = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('observation_analise');
       $recom = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('recommendation_analise');
       $user_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('user_id');
       $user_name = (DB::table('users')->where('id', '=', $user_id)->value('name_user'));

       /*Retorno Relatório Técnico*/
       $myIp = $_SERVER['REMOTE_ADDR'];
       $backRelTec = DB::table('historico')->where('ultimoip', '=', $myIp)->value('id');

       if ($backRelTec != null || $backRelTec != "") {
           $btnRetorno = DB::table('historico')->where('ultimoip', '=', $myIp)->value('ultimoregistro');
       } else {
           $btnRetorno = '/preditiva.csn.br/relatorio-tecnico/termografia/ura/painel1';
       }
       // = = = = = = = =  = = = = = = = = = = = = = = = = = = =  = = = = = = = = = =  = = = = = = = = = = = = = = = = = = =
       /*Gráfico Histórico Temperatura*/
       $graficos = DB::table('amostras')
                        ->join('preditiva_analises', 'preditiva_analises.id', '=', 'amostras.analise_id')
                        ->where('preditiva_analises.atividade_id', '=', $atividade_id)
                        ->orderBy('date_analise')
                        ->get();
       $primeiraData_tc = Carbon::now();
       $indice_tc = 0;
       $array_graf_tc[0] = (['date' => $primeiraData_tc,
                             'temp_medida' => null,
                             'gradiente' => null,
                             'alarme' => null,
                             'critico' => null,
                            ]);
       foreach ($graficos as $graf) {
         $temp_medida = $graf->campo1;
         $num_tm = str_replace(".", "", "$temp_medida");
         $num_tm2 = str_replace(",", ".", "$num_tm");
         $temp_medida = (float)$num_tm2;
         $gradiente = $graf->campo4;
         $num_g = str_replace(".", "", "$gradiente");
         $num_g2 = str_replace(",", ".", "$num_g");
         $gradiente = (float)$num_g2;
         $alarme = $graf->campo5;
         $num_a = str_replace(".", "", "$alarme");
         $num_a2 = str_replace(",", ".", "$num_a");
         $alarme = (float)$num_a2;
         $critico = $graf->campo6;
         $num_c = str_replace(".", "", "$critico");
         $num_c2 = str_replace(",", ".", "$num_c");
         $critico = (float)$num_c2;
         $array_graf_tc[$indice_tc] = array(
                                  'date' => $graf->date_analise,
                                  'temp_medida' => $temp_medida,
                                  'gradiente' => $gradiente,
                                  'alarme' => $alarme,
                                  'critico' => $critico,
                                  );
         $indice_tc++;
       }

      return view('csn.laudos.laudo_termografia_isolamento')->with('id_laudo', $id_laudo)
                                                 ->with('status', $status)
                                                 ->with('user_name', $user_name)
                                                 ->with('data_analise', $data_analise)
                                                 ->with('negocio_name', $negocio_name)
                                                 ->with('sistema_name', $sistema_name)
                                                 ->with('ativo_name', $ativo_name)
                                                 ->with('atividade_id', $atividade_id)
                                                 ->with('img_atividade', $img_atividade)
                                                 ->with('diagnostico_name', $diagnostico_name)
                                                 ->with('obs', $obs)
                                                 ->with('recom', $recom)
                                                 ->with('tag_ativ', $tag_ativ)
                                                 ->with('descricao_ativ', $descricao_ativ)
                                                 ->with('colorStatus', $colorStatus)
                                                 ->with('historico', $historico)
                                                 ->with('historicoCount', $historicoCount)
                                                 ->with('temp_medida', $temp_medida)
                                                 ->with('secao', $secao)
                                                 ->with('temp_zona', $temp_zona)
                                                 ->with('gradiente', $gradiente)
                                                 ->with('alarme', $alarme)
                                                 ->with('critico', $critico)
                                                 ->with('img_termica', $img_termica)
                                                 ->with('termograma', $termograma)
                                                 ->with('camera', $camera)
                                                 ->with('myIp', $myIp)
                                                 ->with('btnRetorno', $btnRetorno)
                                                 ->with('backRelTec', $backRelTec)
                                                 ->with('modelo_laudo', $modelo_laudo)
                                                 ->with('array_graf_tc', json_encode($array_graf_tc));
 }
}

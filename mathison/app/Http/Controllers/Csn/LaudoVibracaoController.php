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
use dompdf;

class LaudoVibracaoController extends Controller {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show_equipamento($id) {
       /*fase 1*/
       $cod_laudo = $id;
       $analise_id = DB::table('laudos')->where('id', '=', $cod_laudo)->value('analise_id');
       $user_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('user_id');
       $user_name = DB::table('users')->where('id', '=', $user_id)->value('name_user');
       $status_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('status_id');
       $obs = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('observation_analise');
       $recom = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('recommendation_analise');
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
       $atividade_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('atividade_id');
       $descricao_ativ = DB::table( 'preditiva_atividades')->where('id', '=', $atividade_id)->value('description_ativ');
       $tag_ativ = DB::table('preditiva_atividades')->where('id', '=', $atividade_id)->value('tag_ativ');
       $img_atividade = DB::table('preditiva_atividades')->where('id', '=', $atividade_id)->value('image_ativ');
       $ativo_id = DB::table('preditiva_atividades')->where('id', '=', $atividade_id)->value('ativo_id');
       $ativo_name = DB::table('ativos')->where('id', '=', $ativo_id)->value('name_ativo');
       $sistema_id = DB::table('ativos')->where('id', '=', $ativo_id)->value('sistema_id');
       $sistema_name = DB::table('sistemas')->where('id', '=', $sistema_id)->value('name_sistema');
       $negocio_id = DB::table('sistemas')->where('id', '=', $sistema_id)->value('negocio_id');
       $negocio_name =  DB::table('negocios')->where('id', '=', $negocio_id)->value('name_negocio');
       $data_format = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('date_analise');
       $datef = json_encode($data_format);
       $data_analise = substr($datef, 1, 11);
       $diagnóstico_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('diagnostico_id');
       $diagnostico_name = DB::table('preditiva_diagnosticos')->where('id', '=', $diagnóstico_id)->value('name_diag');
       $img_laudo = DB::table('imagem_laudos')->where('laudo_id', '=', $cod_laudo)->pluck('location');
       $i = 0;
       foreach ($img_laudo as $key => $value) {
         $i = $i+1;
       }

       /*Retorno Relatório Técnico*/
       $myIp = $_SERVER['REMOTE_ADDR'];
       $backRelTec = DB::table('historico')->where('ultimoip', '=', $myIp)->value('id');
       if ($backRelTec != null || $backRelTec != "") {
         $btnRetorno = DB::table('historico')->where('ultimoip', '=', $myIp)->value('ultimoregistro');
       } else {
         $btnRetorno = '/preditiva.csn.br/relatorio-tecnico/vibracao/ura';
       }

       /*Histórico de Laudos últimos 6 meses*/
       $historico = DB::table('laudos')
                        ->join('preditiva_analises', 'preditiva_analises.id', '=', 'laudos.analise_id')
                        ->join('preditiva_status', 'preditiva_status.id', '=', 'preditiva_analises.status_id')
                        ->where('preditiva_analises.atividade_id', '=', $atividade_id)
                        ->orderby('laudos.id', 'asc')
                        ->select('preditiva_analises.*', 'preditiva_status.color',  'laudos.id')
                        ->get();

       $historicoCount = $historico->count();

       return view('csn.laudos.laudo_vibracao')->with('cod_laudo', $cod_laudo)->with('status', $status)
                                                         ->with('negocio_name', $negocio_name)->with('sistema_name', $sistema_name)
                                                         ->with('data_analise', $data_analise)
                                                         ->with('diagnostico_name', $diagnostico_name)
                                                         ->with('img_atividade', $img_atividade)
                                                         ->with('ativo_name', $ativo_name)
                                                         ->with('user_name', $user_name)
                                                         ->with('obs', $obs)
                                                         ->with('recom', $recom)
                                                         ->with('tag_ativ', $tag_ativ)
                                                         ->with('img_laudo', $img_laudo)
                                                         ->with('i', $i)
                                                         ->with('descricao_ativ', $descricao_ativ)
                                                         ->with('colorStatus', $colorStatus)
                                                         ->with('historico', $historico)
                                                         ->with('historicoCount', $historicoCount)
                                                         ->with('atividade_id', $atividade_id)
                                                         ->with('myIp', $myIp)->with('btnRetorno', $btnRetorno)->with('backRelTec', $backRelTec);
   }
}

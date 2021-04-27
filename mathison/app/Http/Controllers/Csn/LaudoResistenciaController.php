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


class LaudoResistenciaController extends Controller {
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
       $diagnostico_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('diagnostico_id');
       $diagnostico_name = DB::table('preditiva_diagnosticos')->where('id', '=', $diagnostico_id)->value('name_diag');
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
         $btnRetorno = '/preditiva.csn.br/relatorio-tecnico/resistencia-ohmica-e-de-isolamento';
       }

       /*Histórico de Laudos últimos 6 meses*/
       $historico = DB::table('amostras')
                        ->join('laudos', 'laudos.id', '=', 'amostras.laudo_id')
                        ->join('preditiva_analises', 'preditiva_analises.id', '=', 'amostras.analise_id')
                        ->join('preditiva_status', 'preditiva_status.id', '=', 'preditiva_analises.status_id')
                        ->where('preditiva_analises.atividade_id', '=', $atividade_id)
                        ->orderby('laudos.id', 'asc')
                        ->get();

       $historicoCount = $historico->count();

       /*tabela Resistência de Isolamento*/
       $teste = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo1');
       $tensao = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo4');
       $tempIni = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo2');
       $tempFin = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo3');
       $rs = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo8');
       $rt = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo9');
       $st = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo10');
       $temp30Norm = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo11');
       $temp1Norm = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo12');
       $temp10Norm = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo13');
       $ia = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo14');
       $ip = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo15');
       $ro = DB::table('amostras')->where('analise_id', '=', $analise_id)->value('campo16');

       /*Históricos*/
       $graficos = DB::table('amostras')
                        ->join('preditiva_analises', 'preditiva_analises.id', '=', 'amostras.analise_id')
                        ->where('preditiva_analises.atividade_id', '=', $atividade_id)
                        ->orderBy('date_analise')
                        ->get();

      /*Histórico Resistência de Isolamento*/
      $primeiraData_ri = Carbon::now();
      $indice_ri = 0;
      $array_graf_1min[0] = (['date' => $primeiraData_ri, 'value' => 0]);

      foreach ($graficos as $value) {
        $value_ri_i = $value->campo12;
        $num_f = str_replace(".", "", "$value_ri_i");
        $num_f2 = str_replace(",", ".", "$num_f");
        $value_ri = (float)$num_f2;
        $array_graf_1min[$indice_ri] = array(
                                 'date' => $value->date_analise,
                                 'value' => $value_ri,
                                 );
        $indice_ri++;
       }
       /*Histórico IA*/
       $indice_ia = 0;
       $primeiraData_ia = Carbon::now();
       $array_graf_ia[0] = (['date' => $primeiraData_ia, 'value' => 0]);

       foreach ($graficos as $value) {
         $value_ia_i = $value->campo14;
         $num_f = str_replace(".", "", "$value_ia_i");
         $num_f2 = str_replace(",", ".", "$num_f");
         $value_ia = (float)$num_f2;
         $array_graf_ia[$indice_ia] = array(
                                  'date' => $value->date_analise,
                                  'value' => $value_ia,
                                  );
         $indice_ia++;
        }
       /*Histórico IP*/
       $indice_ip = 0;
       $primeiraData_ip = Carbon::now();
       $array_graf_ip[0] = (['date' => $primeiraData_ip, 'value' => 0]);

       foreach ($graficos as $value) {
         $value_ip_i = $value->campo15;
         $num_f = str_replace(".", "", "$value_ip_i");
         $num_f2 = str_replace(",", ".", "$num_f");
         $value_ip = (float)$num_f2;
         $array_graf_ip[$indice_ip] = array(
                                  'date' => $value->date_analise,
                                  'value' => $value_ip,
                                  );
         $indice_ip++;
        }
       /*Histórico Resistência ÔHMICA*/
       $indice_ro = 0;
       $primeiraData_ro = Carbon::now();
       $array_graf_ro[0] = (['date' => $primeiraData_ro, 'value' => 0]);

       foreach ($graficos as $value) {
         $value_ro_i = $value->campo16;
         $num_f = str_replace(".", "", "$value_ro_i");
         $num_f2 = str_replace(",", ".", "$num_f");
         $value_ro = (float)$num_f2;
         $array_graf_ro[$indice_ro] = array(
                                  'date' => $value->date_analise,
                                  'value' => $value_ro,
                                  );
         $indice_ro++;
        }

       return view('csn.laudos.laudo_resistencia')->with('analise_id', $analise_id)->with('atividade_id', $atividade_id)
              ->with('cod_laudo', $cod_laudo)->with('status', $status)->with('negocio_name', $negocio_name)
              ->with('sistema_name', $sistema_name)->with('data_analise', $data_analise)->with('diagnostico_name', $diagnostico_name)->with('img_atividade', $img_atividade)
              ->with('ativo_name', $ativo_name)->with('user_name', $user_name)->with('obs', $obs)->with('recom', $recom)->with('tag_ativ', $tag_ativ)->with('img_laudo', $img_laudo)
              ->with('i', $i)->with('descricao_ativ', $descricao_ativ)->with('teste', $teste)->with('colorStatus', $colorStatus)->with('tensao', $tensao)->with('tempIni', $tempIni)
              ->with('tempFin', $tempFin)->with('rs', $rs)->with('rt', $rt)->with('st', $st)->with('temp30Norm', $temp30Norm)->with('temp1Norm', $temp1Norm)
              ->with('temp10Norm', $temp10Norm)->with('ia', $ia)->with('ip', $ip)->with('ro', $ro)->with('ia', $ia)->with('ip', $ip)
              ->with('historico', $historico)->with('historicoCount', $historicoCount)
              ->with('myIp', $myIp)->with('btnRetorno', $btnRetorno)->with('backRelTec', $backRelTec)
              ->with('array_graf_1min', json_encode($array_graf_1min))
              ->with('array_graf_ia', json_encode($array_graf_ia))
              ->with('array_graf_ip', json_encode($array_graf_ip))
              ->with('array_graf_ro', json_encode($array_graf_ro));
     }
}

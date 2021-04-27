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

class LaudoTermografiaController extends Controller {

  public function show_equipamento_vazio() {
    return view('csn.laudos.laudo_vazio');
  }
  public function show_equipamento($id) {
    /*fase 1*/
    $cod_laudo = $id;
    $analise_id = DB::table('laudos')->where('id', '=', $cod_laudo)->value('analise_id');
    $user_id = DB::table('preditiva_analises')->where('id', '=', $analise_id)->value('user_id');
    $user_name = (DB::table('users')->where('id', '=', $user_id)->value('name_user'));
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
    $img_termica_e = DB::table('imagem_laudos')->where('laudo_id', '=', $cod_laudo)->orderby('id')->get();
    $amostra_e = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->orderby('id')->get();
    $amostra_e2 = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->orderby('id')->get();
    $amostra_e4 = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->orderby('id')->get();
    $i = 0;
    foreach ($img_termica_e as $key => $g_ms) {
      $i = $i+1;
    }
    $indice_amos = 0;
    $array_amos[0] = (['campo1' => ""]);
    foreach ($amostra_e as $key => $g_ms) {
      $tm = $g_ms->campo1;
      $array_amos[$indice_amos] = array(
                                'campo1' => $tm,
                                );
                                $indice_amos++;
    }
    $indice_amos2 = 0;
    $array_amos2[0] = (['campo2' => ""]);
    foreach ($amostra_e2 as $key2 => $g_ms2) {
      $tr = $g_ms2->campo2;
      $array_amos2[$indice_amos2] = array(
                                'campo2' => $tr,
                                );
                                $indice_amos2++;
    }
    $indice_amos4 = 0;
    $array_amos4[0] = (['campo4' => ""]);
    foreach ($amostra_e4 as $key4 => $g_ms4) {
      $dt = $g_ms4->campo4;
      $array_amos4[$indice_amos4] = array(
                                'campo4' => $dt,
                                );
                                $indice_amos4++;
    }


    $indice_img = 0;
    $array_img[0] = (['location' => "", 'img_visivel' => "", 'desc_ponto' => "", 'nome_termo' => "", 'nome_camera' => "", 'tm' => "", 'tr' => "", 'dt' => ""]);
    foreach ($img_termica_e as $key => $g_ms) {
      $location = $g_ms->location;
      $img_visivel = $g_ms->campo1;
      $desc_ponto = $g_ms->campo2;
      $nome_termo = $g_ms->campo3;
      $nome_camera = $g_ms->campo4;
      $tm = (implode(':', $array_amos[$key]));
      $tr = (implode(':', $array_amos2[$key]));
      $dt = (implode(':', $array_amos4[$key]));
      $array_img[$indice_img] = array(
                              'location' => $location,
                              'img_visivel' => $img_visivel,
                              'desc_ponto' => $desc_ponto,
                              'nome_termo' => $nome_termo,
                              'nome_camera' => $nome_camera,
                              'tm' => $tm,
                              'tr' => $tr,
                              'dt' => $dt,
                              );
      $indice_img++;
    }

    $dados_coleta1 = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->get();
    $dados_coleta2 = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->get();
    $dados_coleta3 = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->get();
    $modelo_atual = 0;
    $pontos = 0;
    $velocidades_vento = 0;
    $temp_ref = 0;

    /*Gráfico Histórico Máquina de Solda - PARTE 1*/
    $grafico_ms = DB::table('amostras')
                     ->leftJoin('preditiva_analises', 'preditiva_analises.id', '=', 'amostras.analise_id')
                     ->where('preditiva_analises.atividade_id', '=', $atividade_id)
                     ->orderBy('amostras.id')
                     ->get();

    $dataAtual_ms = $grafico_ms->pluck('date_analise')->first();
    $dataFinal_ms = $grafico_ms->pluck('date_analise')->last();

    $count_ms = DB::table('amostras')
                     ->leftJoin('preditiva_analises', 'preditiva_analises.id', '=', 'amostras.analise_id')
                     ->where('preditiva_analises.atividade_id', '=', $atividade_id)
                     ->where('preditiva_analises.date_analise', '=', $dataAtual_ms)
                     ->count();
    /*FIM Gráfico Histórico Máquina de Solda - PARTE 1*/
    $count_amostras = $grafico_ms->count();
    foreach ($dados_coleta1 as $key => $g_ms1) {
     $tm = $g_ms1->campo1;
     if ($tm != "") {
       $pontos ++;
     }
    }
    foreach ($dados_coleta2 as $key => $g_ms2) {
     $vv = $g_ms2->campo3;
     if ($vv != "") {
       $velocidades_vento ++;
     }
    }
    foreach ($dados_coleta3 as $key => $g_ms3) {
     $tr = $g_ms3->campo2;
     if ($tr != "") {
       $temp_ref ++;
     }
    }
    $conta = $pontos;
    if ($conta == 0) { //================================ MODELO 0 [APENAS TEMPERATURA MEDIDA]
     $modelo_atual = $modelo_atual;
     $array_graf[0] = array();
    } else {
     if ($conta == 1) { // ============================= MODELO 3 [SUBESTAÇÃO (POSSUI VELOCIDADE DO VENTO)]
       if ($velocidades_vento != "") {
         $modelo_atual = 3;
         $array_graf[0] = array();
       }else { // ====================================== MODELO 1 [COM APENAS 1 PONTO]
         $modelo_atual = 1;
         $array_graf[0] = array();
       }
     }else {
       if ($temp_ref != "") {// ====================================== MODELO 1 [COM APENAS VÁRIOS PONTOS]
         $modelo_atual = 1;
         $array_graf[0] = array();
       } else { // ========================================= MODELO 2 [MÁQUINA DE SOLDA]
         $modelo_atual = 2;
         /*Gráfico Histórico Máquina de Solda - PARTE 2*/
         $c = 0;
         $flag = 0;
         $indice_ms = 0;
         $nome_array = 'ms_cab_sup'.$c;

         foreach ($grafico_ms as $g_ms) {
           $date_ms = $g_ms->date_analise;
           if ($dataFinal_ms != $date_ms) {
             if ($date_ms == $dataAtual_ms) {
               $c++;
               $cp_sf = $g_ms->campo1;
               $num_f = str_replace(".", "", "$cp_sf");
               $num_f2 = str_replace(",", ".", "$num_f");
               $cp = (float)$num_f2;
               ${$nome_array}['date'] = $date_ms;
               ${$nome_array} += ['value'.$c => $cp];
             } else {
                 $array_graf[$indice_ms] = ${$nome_array};
                 $indice_ms++;
                 $c = 1;
                 $dataAtual_ms = $date_ms;
                 $cp_sf = $g_ms->campo1;
                 $num_f = str_replace(".", "", "$cp_sf");
                 $num_f2 = str_replace(",", ".", "$num_f");
                 $cp = (float)$num_f2;
                 ${$nome_array} = array();
                 ${$nome_array}['date'] = $date_ms;
                 ${$nome_array} += ['value'.$c => $cp];
               }
           } else {
             $array_graf[$indice_ms] = ${$nome_array};
             if ($date_ms == $dataAtual_ms) {
               $c++;
               $cp_sf = $g_ms->campo1;
               $num_f = str_replace(".", "", "$cp_sf");
               $num_f2 = str_replace(",", ".", "$num_f");
               $cp = (float)$num_f2;
               ${$nome_array}['date'] = $date_ms;
               ${$nome_array} += ['value'.$c => $cp];
             } else {
                 $array_graf[$indice_ms] = ${$nome_array};
                 $indice_ms++;
                 $c = 1;
                 $dataAtual_ms = $date_ms;
                 $cp_sf = $g_ms->campo1;
                 $num_f = str_replace(".", "", "$cp_sf");
                 $num_f2 = str_replace(",", ".", "$num_f");
                 $cp = (float)$num_f2;
                 ${$nome_array} = array();
                 ${$nome_array}['date'] = $date_ms;
                 ${$nome_array} += ['value'.$c => $cp];
                 $array_graf[$indice_ms] = ${$nome_array};
               }
               $array_graf[$indice_ms] = ${$nome_array};
           }
         }
       }

     }
    }

    $temp_medida = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->value('campo1');
    $temp_ref = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->value('campo2');
    $veloc_vento = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->value('campo3');
    $delta_t = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->value('campo4');
    $temp_corrig = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->value('campo5');
    $maa = DB::table('amostras')->where('laudo_id', '=', $cod_laudo)->value('campo6');

    /*Gráfico Histórico Temperatura Corrigida*/
    $graficos = DB::table('amostras')
                     ->join('preditiva_analises', 'preditiva_analises.id', '=', 'amostras.analise_id')
                     ->where('preditiva_analises.atividade_id', '=', $atividade_id)
                     ->orderBy('date_analise')
                     ->get();
    $primeiraData_tc = Carbon::now();
    $indice_tc = 0;
    $array_graf_tc[0] = (['date' => $primeiraData_tc, 'value' => 0]);
    foreach ($graficos as $g_ms) {
      $g_ms_tc = $g_ms->campo5;
      $num_f = str_replace(".", "", "$g_ms_tc");
      $num_f2 = str_replace(",", ".", "$num_f");
      $g_ms_tc = (float)$num_f2;
      $array_graf_tc[$indice_tc] = array(
                               'date' => $g_ms->date_analise,
                               'value' => $g_ms_tc,
                               );
      $indice_tc++;
    }




    /*Retorno Relatório Técnico*/
    $myIp = $_SERVER['REMOTE_ADDR'];
    $backRelTec = DB::table('historico')->where('ultimoip', '=', $myIp)->value('id');

    if ($backRelTec != null || $backRelTec != "")
    {
        $btnRetorno = DB::table('historico')->where('ultimoip', '=', $myIp)->value('ultimoregistro');
    }
    else
    {
        $btnRetorno = '/preditiva.csn.br/relatorio-tecnico/termografia/ura/painel1';
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

       return view('csn.laudos.laudo_termografia')->with('cod_laudo', $cod_laudo)
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
                                                  ->with('img_termica_e', $img_termica_e)
                                                  ->with('amostra_e', $amostra_e)
                                                  ->with('amostra_e2', $amostra_e2)
                                                  ->with('amostra_e4', $amostra_e4)
                                                  ->with('i', $i)
                                                  ->with('velocidades_vento', $velocidades_vento)
                                                  ->with('modelo_atual', $modelo_atual)
                                                  ->with('dados_coleta1', $dados_coleta1)
                                                  ->with('dados_coleta2', $dados_coleta2)
                                                  ->with('colorStatus', $colorStatus)
                                                  ->with('historico', $historico)
                                                  ->with('historicoCount', $historicoCount)
                                                  ->with('temp_medida', $temp_medida)
                                                  ->with('temp_ref', $temp_ref)
                                                  ->with('delta_t', $delta_t)
                                                  ->with('veloc_vento', $veloc_vento)
                                                  ->with('temp_corrig', $temp_corrig)
                                                  ->with('maa', $maa)
                                                  ->with('myIp', $myIp)
                                                  ->with('btnRetorno', $btnRetorno)
                                                  ->with('backRelTec', $backRelTec)
                                                  ->with('array_img', $array_img)
                                                  ->with('count_ms', $count_ms)
                                                  ->with('array_graf_tc', json_encode($array_graf_tc))
                                                  ->with('array_graf', json_encode($array_graf));
   }
}







// === === ===

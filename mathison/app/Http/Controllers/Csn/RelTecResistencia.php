<?php

namespace App\Http\Controllers\Csn;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use DB;
use App\Models\Tecnica;
use App\Models\Preditiva_analises;
use App\Models\Negocios;
use App\Models\Status;
use App\Models\Diagnosticos;
use App\Models\Preditiva_atividades;
use Carbon\Carbon;
use App\Http\Controllers\Csn\AuxFuncRelTec_RM as aux_rm;

class RelTecResistencia extends Controller {
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    //
  }

  public function ura() {
    //LAVADOR DE GASES
    $tag_resistenciaLG = "RM 72 200 240 039 053 - 000020";
    $idAtividadeLG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaLG)->value('id');
    $idAnaliseLG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLG)->max('id');
    $idLaudoLG = DB::table('laudos')->where('analise_id', '=', $idAnaliseLG)->value('id');
    $statusLG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLG)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_ura')
    ->with('idLaudoLG', $idLaudoLG)->with('statusLG', $statusLG)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function decapagem() {
    //1 DESENROLADEIRA //ACIONAMENTO PRINCIPAL DESENROLADEIRA
    $tag_resistenciaAPD = "RM 72 200 210 024 003 - 000020";
    $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPD)->value('id');
    $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
    $idLaudoAPD = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPD)->value('id');
    $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');
    //2 DESENROLADEIRA //DESEMPENADEIRA
    $tag_resistenciaDESEMP = "RM 72 200 210 048 003 - 000050";
    $idAtividadeDESEMP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDESEMP)->value('id');
    $idAnaliseDESEMP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEMP)->max('id');
    $idLaudoDESEMP = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEMP)->value('id');
    $statusDESEMP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEMP)->value('status_id');
    //TENSOR 1 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 01
    $tag_resistenciaART_MR_01 = "RM 72 200 210 246 042 - 000020";
    $idAtividadeART_MR_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaART_MR_01)->value('id');
    $idAnaliseART_MR_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_MR_01)->max('id');
    $idLaudoART_MR_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_MR_01)->value('id');
    $statusART_MR_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_MR_01)->value('status_id');
    //TENSOR 2 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 02
    $tag_resistenciaART_MR_02 = "RM 72 200 210 246 051 - 000020";
    $idAtividadeART_MR_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaART_MR_02)->value('id');
    $idAnaliseART_MR_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_MR_02)->max('id');
    $idLaudoART_MR_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_MR_02)->value('id');
    $statusART_MR_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_MR_02)->value('status_id');
    //TENSOR 3 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 03
    $tag_resistenciaART_MR_03 = "RM 72 200 210 246 060 - 000020";
    $idAtividadeART_MR_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaART_MR_03)->value('id');
    $idAnaliseART_MR_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_MR_03)->max('id');
    $idLaudoART_MR_03 = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_MR_03)->value('id');
    $statusART_MR_03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_MR_03)->value('status_id');
    //PICOTADEIRA
    $tag_resistenciaPIC = "RM 72 200 210 234 027 - 000020";
    $idAtividadePIC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPIC)->value('id');
    $idAnalisePIC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePIC)->max('id');
    $idLaudoPIC = DB::table('laudos')->where('analise_id', '=', $idAnalisePIC)->value('id');
    $statusPIC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePIC)->value('status_id');
    //ENROLADEIRA //ACIONAMENTO PRINCIPAL ENROLADEIRA
    $tag_resistenciaAPE = "RM 72 200 210 291 003 - 000030";
    $idAtividadeAPE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPE)->value('id');
    $idAnaliseAPE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE)->max('id');
    $idLaudoAPE = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPE)->value('id');
    $statusAPE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_decapagem')
    ->with('idLaudoAPD', $idLaudoAPD)->with('statusAPD', $statusAPD)
    ->with('idLaudoDESEMP', $idLaudoDESEMP)->with('statusDESEMP', $statusDESEMP)
    ->with('idLaudoART_MR_01', $idLaudoART_MR_01)->with('statusART_MR_01', $statusART_MR_01)
    ->with('idLaudoART_MR_02', $idLaudoART_MR_02)->with('statusART_MR_02', $statusART_MR_02)
    ->with('idLaudoART_MR_03', $idLaudoART_MR_03)->with('statusART_MR_03', $statusART_MR_03)
    ->with('idLaudoPIC', $idLaudoPIC)->with('statusPIC', $statusPIC)
    ->with('idLaudoAPE', $idLaudoAPE)->with('statusAPE', $statusAPE)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function laminador() {
    //MOTOR DA ENROLADEIRA //ROTOR MOTOR ELÉTRICO ACION.  ENROL. 2
    $tag_resistenciaMEA = "RM 72 300 310 201 000 - 000020";
    $idAtividadeMEA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaMEA)->value('id');
    $idAnaliseMEA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMEA)->max('id');
    $idLaudoMEA = DB::table('laudos')->where('analise_id', '=', $idAnaliseMEA)->value('id');
    $statusMEA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMEA)->value('status_id');
    //CAIXA ESTATOR
    $tag_resistenciaCE = "RM 72 300 310 201 000 - 000021";
    $idAtividadeCE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCE)->value('id');
    $idAnaliseCE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCE)->max('id');
    $idLaudoCE = DB::table('laudos')->where('analise_id', '=', $idAnaliseCE)->value('id');
    $statusCE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCE)->value('status_id');
    //EXAUSTOR DE GASES //SISTEMA DE EXAUSTÃO
    $tag_resistenciaSIS_EXA = "RM 72 300 310 300 000 - 000020";
    $idAtividadeSIS_EXA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSIS_EXA)->value('id');
    $idAnaliseSIS_EXA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSIS_EXA)->max('id');
    $idLaudoSIS_EXA = DB::table('laudos')->where('analise_id', '=', $idAnaliseSIS_EXA)->value('id');
    $statusSIS_EXA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSIS_EXA)->value('status_id');
    //MOTOR ACIONAMENTO DA CADEIRA //MOTOR DE ACIONAMENTO DA CADEIRA
    $tag_resistenciaAPE = "RM 72 300 310 168 000 - 000020";
    $idAtividadeAPE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPE)->value('id');
    $idAnaliseAPE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE)->max('id');
    $idLaudoAPE = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPE)->value('id');
    $statusAPE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE)->value('status_id');
    //CAIXA A
    $tag_resistenciaCA = "RM 72 300 310 168 000 - 000021";
    $idAtividadeCA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCA)->value('id');
    $idAnaliseCA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA)->max('id');
    $idLaudoCA = DB::table('laudos')->where('analise_id', '=', $idAnaliseCA)->value('id');
    $statusCA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA)->value('status_id');
    //CAIXA B
    $tag_resistenciaCB = "RM 72 300 310 168 000 - 000022";
    $idAtividadeCB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCB)->value('id');
    $idAnaliseCB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB)->max('id');
    $idLaudoCB = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB)->value('id');
    $statusCB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB)->value('status_id');
    //MOTOR DA ENROLADEIRA 1 //MOTOR ELÉT. ACIONAM. DA ENROLADEIRA 1
    $tag_resistenciaMEAE_1 = "RM 72 300 310 054 000 - 000020";
    $idAtividadeMEAE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaMEAE_1)->value('id');
    $idAnaliseMEAE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMEAE_1)->max('id');
    $idLaudoMEAE_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseMEAE_1)->value('id');
    $statusMEAE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMEAE_1)->value('status_id');
    //CAIXA ESTATOR 2
    $tag_resistenciaCE2 = "RM 72 300 310 054 000 - 000021";
    $idAtividadeCE2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCE2)->value('id');
    $idAnaliseCE2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCE2)->max('id');
    $idLaudoCE2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCE2)->value('id');
    $statusCE2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCE2)->value('status_id');
    //ACIONAMENTO MOTOR DA DESENROLADEIRA //CAIXA 1
    $tag_resistenciaC1 = "RM 72 300 310 021 000 - 000020";
    $idAtividadeC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaC1)->value('id');
    $idAnaliseC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC1)->max('id');
    $idLaudoC1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC1)->value('id');
    $statusC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC1)->value('status_id');
    //CAIXA 2
    $tag_resistenciaC2 = "RM 72 300 310 021 000 - 000021";
    $idAtividadeC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaC2)->value('id');
    $idAnaliseC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2)->max('id');
    $idLaudoC2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC2)->value('id');
    $statusC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();


    return view('csn.relatoriosTecnicos.resistencia_laminador')
    ->with('idLaudoMEA', $idLaudoMEA)->with('statusMEA', $statusMEA)->with('idLaudoCE', $idLaudoCE)->with('statusCE', $statusCE)
    ->with('idLaudoSIS_EXA', $idLaudoSIS_EXA)->with('statusSIS_EXA', $statusSIS_EXA)->with('idLaudoAPE', $idLaudoAPE)->with('statusAPE', $statusAPE)->with('idLaudoCA', $idLaudoCA)
    ->with('statusCA', $statusCA)->with('idLaudoCB', $idLaudoCB)->with('statusCB', $statusCB)->with('idLaudoMEAE_1', $idLaudoMEAE_1)->with('statusMEAE_1', $statusMEAE_1)
    ->with('idLaudoCE2', $idLaudoCE2)->with('statusCE2', $statusCE2)->with('idLaudoC1', $idLaudoC1)->with('statusC1', $statusC1)->with('idLaudoC2', $idLaudoC2)->with('statusC2', $statusC2)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function utilidades() {
    //GERACAO DE AR 0
    $tag_resistenciaGA0 = "RM 72 700 775 010 001 - 000020";
    $idAtividadeGA0 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA0)->value('id');
    $idAnaliseGA0 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA0)->max('id');
    $idLaudoGA0 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA0)->value('id');
    $statusGA0 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA0)->value('status_id');
    //GERACAO DE AR 1
    $tag_resistenciaGA1 = "RM 72 700 775 020 001 - 000020";
    $idAtividadeGA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA1)->value('id');
    $idAnaliseGA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA1)->max('id');
    $idLaudoGA1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA1)->value('id');
    $statusGA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA1)->value('status_id');
    //GERACAO DE AR 2
    $tag_resistenciaGA2 = "RM 72 700 775 030 001 - 000020";
    $idAtividadeGA2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA2)->value('id');
    $idAnaliseGA2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA2)->max('id');
    $idLaudoGA2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA2)->value('id');
    $statusGA2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA2)->value('status_id');
    //GERACAO DE AR 6
    $tag_resistenciaGA6 = "RM 72 700 775 130 001 - 000020";
    $idAtividadeGA6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA6)->value('id');
    $idAnaliseGA6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA6)->max('id');
    $idLaudoGA6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA6)->value('id');
    $statusGA6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA6)->value('status_id');
    //GERACAO DE AR 5
    $tag_resistenciaGA5 = "RM 72 700 775 060 001 - 000020";
    $idAtividadeGA5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA5)->value('id');
    $idAnaliseGA5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA5)->max('id');
    $idLaudoGA5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA5)->value('id');
    $statusGA5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA5)->value('status_id');
    //GERACAO DE AR 4
    $tag_resistenciaGA4 = "RM 72 700 775 050 001 - 000020";
    $idAtividadeGA4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA4)->value('id');
    $idAnaliseGA4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA4)->max('id');
    $idLaudoGA4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA4)->value('id');
    $statusGA4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA4)->value('status_id');
    //GERACAO DE AR 3
    $tag_resistenciaGA3 = "RM 72 700 775 040 001 - 000020";
    $idAtividadeGA3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA3)->value('id');
    $idAnaliseGA3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA3)->max('id');
    $idLaudoGA3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA3)->value('id');
    $statusGA3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA3)->value('status_id');
    //VENTILADOR DA TORRE 1
    $tag_resistenciaVT1 = "RM 72 700 725 070 530 - 000020";
    $idAtividadeVT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaVT1)->value('id');
    $idAnaliseVT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVT1)->max('id');
    $idLaudoVT1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseVT1)->value('id');
    $statusVT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVT1)->value('status_id');
    //VENTILADOR DA TORRE 2
    $tag_resistenciaVT2 = "RM 72 700 725 070 531 - 000020";
    $idAtividadeVT2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaVT2)->value('id');
    $idAnaliseVT2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVT2)->max('id');
    $idLaudoVT2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseVT2)->value('id');
    $statusVT2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVT2)->value('status_id');
    //TORRE DE RESFRIAMENTO 5
    $tag_resistenciaTR5 = "RM 72 700 725 070 516 - 000020";
    $idAtividadeTR5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR5)->value('id');
    $idAnaliseTR5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR5)->max('id');
    $idLaudoTR5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR5)->value('id');
    $statusTR5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR5)->value('status_id');
    //TORRE DE RESFRIAMENTO 4
    $tag_resistenciaTR4 = "RM 72 700 725 070 515 - 000020";
    $idAtividadeTR4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR4)->value('id');
    $idAnaliseTR4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR4)->max('id');
    $idLaudoTR4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR4)->value('id');
    $statusTR4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR4)->value('status_id');
    //TORRE DE RESFRIAMENTO 3
    $tag_resistenciaTR3 = "RM 72 700 725 070 514 - 000020";
    $idAtividadeTR3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR3)->value('id');
    $idAnaliseTR3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR3)->max('id');
    $idLaudoTR3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR3)->value('id');
    $statusTR3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR3)->value('status_id');
    //TORRE DE RESFRIAMENTO 2
    $tag_resistenciaTR2 = "RM 72 700 725 070 513 - 000020";
    $idAtividadeTR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR2)->value('id');
    $idAnaliseTR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR2)->max('id');
    $idLaudoTR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR2)->value('id');
    $statusTR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR2)->value('status_id');
    //TORRE DE RESFRIAMENTO 1
    $tag_resistenciaTR1 = "RM 72 700 725 070 512 - 000020";
    $idAtividadeTR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR1)->value('id');
    $idAnaliseTR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR1)->max('id');
    $idLaudoTR1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR1)->value('id');
    $statusTR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR1)->value('status_id');
    //AERACAO 2
    $tag_resistenciaA2 = "RM 72 700 740 030 501 - 000020";
    $idAtividadeA2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaA2)->value('id');
    $idAnaliseA2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA2)->max('id');
    $idLaudoA2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseA2)->value('id');
    $statusA2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA2)->value('status_id');
    //AERACAO 1
    $tag_resistenciaA1 = "RM 72 700 740 030 500 - 000020";
    $idAtividadeA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaA1)->value('id');
    $idAnaliseA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA1)->max('id');
    $idLaudoA1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseA1)->value('id');
    $statusA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA1)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_utilidades')
    ->with('idLaudoGA0', $idLaudoGA0)->with('statusGA0', $statusGA0)->with('idLaudoGA1', $idLaudoGA1)->with('statusGA1', $statusGA1)
    ->with('idLaudoGA2', $idLaudoGA2)->with('statusGA2', $statusGA2)->with('idLaudoGA6', $idLaudoGA6)->with('statusGA6', $statusGA6)
    ->with('idLaudoGA5', $idLaudoGA5)->with('statusGA5', $statusGA5)->with('idLaudoGA4', $idLaudoGA4)->with('statusGA4', $statusGA4)
    ->with('idLaudoGA3', $idLaudoGA3)->with('statusGA3', $statusGA3)->with('idLaudoVT1', $idLaudoVT1)->with('statusVT1', $statusVT1)
    ->with('idLaudoVT2', $idLaudoVT2)->with('statusVT2', $statusVT2)->with('idLaudoTR5', $idLaudoTR5)->with('statusTR5', $statusTR5)
    ->with('idLaudoTR4', $idLaudoTR4)->with('statusTR4', $statusTR4)->with('idLaudoTR3', $idLaudoTR3)->with('statusTR3', $statusTR3)
    ->with('idLaudoTR2', $idLaudoTR2)->with('statusTR2', $statusTR2)->with('idLaudoTR1', $idLaudoTR1)->with('statusTR1', $statusTR1)
    ->with('idLaudoA2', $idLaudoA2)->with('statusA2', $statusA2)->with('idLaudoA1', $idLaudoA1)->with('statusA1', $statusA1)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function utilidades_casa_bombas() {
    //BB01
    $tag_resistenciaBB01 = "RM 72 700 708 040 010 - 000020";
    $idAtividadeBB01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaBB01)->value('id');
    $idAnaliseBB01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBB01)->max('id');
    $idLaudoBB01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBB01)->value('id');
    $statusBB01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBB01)->value('status_id');
    //BB02
    $tag_resistenciaBB02 = "RM 72 700 708 040 009 - 000020";
    $idAtividadeBB02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaBB02)->value('id');
    $idAnaliseBB02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBB02)->max('id');
    $idLaudoBB02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBB02)->value('id');
    $statusBB02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBB02)->value('status_id');
    //BB01 B
    $tag_resistenciaBB01_B = "RM 72 700 708 040 012 - 000020";
    $idAtividadeBB01_B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaBB01_B)->value('id');
    $idAnaliseBB01_B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBB01_B)->max('id');
    $idLaudoBB01_B = DB::table('laudos')->where('analise_id', '=', $idAnaliseBB01_B)->value('id');
    $statusBB01_B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBB01_B)->value('status_id');
    //BB02 B
    $tag_resistenciaBB02_B = "RM 72 700 708 040 011 - 000020";
    $idAtividadeBB02_B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaBB02_B)->value('id');
    $idAnaliseBB02_B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBB02_B)->max('id');
    $idLaudoBB02_B = DB::table('laudos')->where('analise_id', '=', $idAnaliseBB02_B)->value('id');
    $statusBB02_B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBB02_B)->value('status_id');
    //M4
    $tag_resistenciaM4 = "RM 72 700 785 100 090 - 000020";
    $idAtividadeM4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM4)->value('id');
    $idAnaliseM4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM4)->max('id');
    $idLaudoM4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM4)->value('id');
    $statusM4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM4)->value('status_id');
    //M5
    $tag_resistenciaM5 = "RM 72 700 785 100 100 - 000020";
    $idAtividadeM5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM5)->value('id');
    $idAnaliseM5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM5)->max('id');
    $idLaudoM5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM5)->value('id');
    $statusM5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM5)->value('status_id');
    //M3
    $tag_resistenciaM3 = "RM 72 700 785 100 080 - 000020";
    $idAtividadeM3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM3)->value('id');
    $idAnaliseM3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM3)->max('id');
    $idLaudoM3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM3)->value('id');
    $statusM3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM3)->value('status_id');
    //M1
    $tag_resistenciaM1 = "RM 72 700 785 100 060 - 000020";
    $idAtividadeM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM1)->value('id');
    $idAnaliseM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM1)->max('id');
    $idLaudoM1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM1)->value('id');
    $statusM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM1)->value('status_id');
    //M2
    $tag_resistenciaM2 = "RM 72 700 785 100 070 - 000020";
    $idAtividadeM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM2)->value('id');
    $idAnaliseM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM2)->max('id');
    $idLaudoM2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM2)->value('id');
    $statusM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM2)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_utilidades_casa_bombas')
    ->with('idLaudoBB01', $idLaudoBB01)->with('statusBB01', $statusBB01)->with('idLaudoBB02', $idLaudoBB02)->with('statusBB02', $statusBB02)
    ->with('idLaudoBB01_B', $idLaudoBB01_B)->with('statusBB01_B', $statusBB01_B)->with('idLaudoBB02_B', $idLaudoBB02_B)->with('statusBB02_B', $statusBB02_B)
    ->with('idLaudoM4', $idLaudoM4)->with('statusM4', $statusM4)->with('idLaudoM5', $idLaudoM5)->with('statusM5', $statusM5)->with('idLaudoM3', $idLaudoM3)
    ->with('statusM3', $statusM3)->with('idLaudoM1', $idLaudoM1)->with('statusM1', $statusM1)->with('idLaudoM2', $idLaudoM2)->with('statusM2', $statusM2)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function utilidades_geracao_ar_cs() {
    //GERACAO DE AR 0
    $tag_resistenciaGA0 = "RM 72 700 775 120 001 - 000020";
    $idAtividadeGA0 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA0)->value('id');
    $idAnaliseGA0 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA0)->max('id');
    $idLaudoGA0 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA0)->value('id');
    $statusGA0 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA0)->value('status_id');
    //GERACAO DE AR 1
    $tag_resistenciaGA1 = "RM 72 700 775 080 001 - 000020";
    $idAtividadeGA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA1)->value('id');
    $idAnaliseGA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA1)->max('id');
    $idLaudoGA1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA1)->value('id');
    $statusGA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA1)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_utilidades_geracao_ar_cs')
    ->with('idLaudoGA0', $idLaudoGA0)->with('statusGA0', $statusGA0)
    ->with('idLaudoGA1', $idLaudoGA1)->with('statusGA1', $statusGA1)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_entrada() {
    //ACIONAMENTO PRINCIPAL DESENROLADEIRA Nº1
    $tag_resistenciaAPDESE_N1 = "RM 72 400 410 019 003 - 000020";
    $idAtividadeAPDESE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPDESE_N1)->value('id');
    $idAnaliseAPDESE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPDESE_N1)->max('id');
    $idLaudoAPDESE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPDESE_N1)->value('id');
    $statusAPDESE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPDESE_N1)->value('status_id');
    //ACIONAMENTO PRINCIPAL DESENROLADEIRA Nº2
    $tag_resistenciaAPDESE_N2 = "RM 72 400 410 069 003 - 000020";
    $idAtividadeAPDESE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPDESE_N2)->value('id');
    $idAnaliseAPDESE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPDESE_N2)->max('id');
    $idLaudoAPDESE_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPDESE_N2)->value('id');
    $statusAPDESE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPDESE_N2)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_galvanizacao_entrada')
    ->with('idLaudoAPDESE_N1', $idLaudoAPDESE_N1)->with('statusAPDESE_N1', $statusAPDESE_N1)->with('idLaudoAPDESE_N2', $idLaudoAPDESE_N2)->with('statusAPDESE_N2', $statusAPDESE_N2)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_forno() {
    return view('csn.relatoriosTecnicos.resistencia_galvanizacao_forno')
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_acumulador_entrada() {
    //ROLO 1 BRIDLE Nº 1
    $tag_resistenciaR1_BRIDLE_N1 = "RM 72 400 410 157 003 - 000020";
    $idAtividadeR1_BRIDLE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_N1)->value('id');
    $idAnaliseR1_BRIDLE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N1)->max('id');
    $idLaudoR1_BRIDLE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N1)->value('id');
    $statusR1_BRIDLE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N1)->value('status_id');
    //ROLO 2 BRIDLE Nº 1
    $tag_resistenciaR2_BRIDLE_N1 = "RM 72 400 410 158 003 - 000020";
    $idAtividadeR2_BRIDLE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_N1)->value('id');
    $idAnaliseR2_BRIDLE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N1)->max('id');
    $idLaudoR2_BRIDLE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N1)->value('id');
    $statusR2_BRIDLE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N1)->value('status_id');
    //ACIONAMENTO DO ACUMULADOR DE ENTRADA
    $tag_resistenciaAAE = "RM 72 400 410 165 003 - 000020";
    $idAtividadeAAE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAAE)->value('id');
    $idAnaliseAAE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAAE)->max('id');
    $idLaudoAAE = DB::table('laudos')->where('analise_id', '=', $idAnaliseAAE)->value('id');
    $statusAAE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAAE)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_galvanizacao_acumulador_entrada')->with('idLaudoR1_BRIDLE_N1', $idLaudoR1_BRIDLE_N1)
    ->with('statusR1_BRIDLE_N1', $statusR1_BRIDLE_N1)->with('idLaudoR2_BRIDLE_N1', $idLaudoR2_BRIDLE_N1)
    ->with('statusR2_BRIDLE_N1', $statusR2_BRIDLE_N1)->with('idLaudoAAE', $idLaudoAAE)->with('statusAAE', $statusAAE)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_defl_porao() {
    //DEFLETOR 16
    $tag_resistenciaDEF_16 = "RM 72 400 410 251 006 - 000020";
    $idAtividadeDEF_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDEF_16)->value('id');
    $idAnaliseDEF_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDEF_16)->max('id');
    $idLaudoDEF_16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDEF_16)->value('id');
    $statusDEF_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDEF_16)->value('status_id');
    //DEFLETOR 17
    $tag_resistenciaDEF_17 = "RM 72 400 410 253 006 - 000020";
    $idAtividadeDEF_17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDEF_17)->value('id');
    $idAnaliseDEF_17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDEF_17)->max('id');
    $idLaudoDEF_17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDEF_17)->value('id');
    $statusDEF_17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDEF_17)->value('status_id');
    //SISTEMA SOPRADOR NAVALHA DE AR 2
    $tag_resistenciaSSNA_2 = "RM 72 400 410 309 006 - 000020";
    $idAtividadeSSNA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSSNA_2)->value('id');
    $idAnaliseSSNA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSNA_2)->max('id');
    $idLaudoSSNA_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSSNA_2)->value('id');
    $statusSSNA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSNA_2)->value('status_id');
    //SISTEMA SOPRADOR NAVALHA DE AR 1
    $tag_resistenciaSSNA_1 = "RM 72 400 410 309 003 - 000020";
    $idAtividadeSSNA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSSNA_1)->value('id');
    $idAnaliseSSNA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSNA_1)->max('id');
    $idLaudoSSNA_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSSNA_1)->value('id');
    $statusSSNA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSNA_1)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_galvanizacao_defl_porao')
    ->with('idLaudoDEF_16', $idLaudoDEF_16)->with('statusDEF_16', $statusDEF_16)->with('idLaudoDEF_17', $idLaudoDEF_17)->with('statusDEF_17', $statusDEF_17)
    ->with('idLaudoSSNA_2', $idLaudoSSNA_2)->with('statusSSNA_2', $statusSSNA_2)->with('idLaudoSSNA_1', $idLaudoSSNA_1)->with('statusSSNA_1', $statusSSNA_1)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_saida_laminador() {
    //ACIONAMENTO PRINCIPAL LAMINADOR SUPERIOR
    $tag_resistenciaAPLS = "RM 72 400 410 344 003 - 000020";
    $idAtividadeAPLS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPLS)->value('id');
    $idAnaliseAPLS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPLS)->max('id');
    $idLaudoAPLS = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPLS)->value('id');
    $statusAPLS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPLS)->value('status_id');
    //ACIONAMENTO PRINCIPAL LAMINADOR INFERIOR
    $tag_resistenciaAPLI = "RM 72 400 410 344 006 - 000020";
    $idAtividadeAPLI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPLI)->value('id');
    $idAnaliseAPLI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPLI)->max('id');
    $idLaudoAPLI = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPLI)->value('id');
    $statusAPLI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPLI)->value('status_id');
    //ROLO 1 BRIDLE 5B
    $tag_resistenciaR1_BRIDLE_5B = "RM 72 400 410 377 003 - 000020";
    $idAtividadeR1_BRIDLE_5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_5B)->value('id');
    $idAnaliseR1_BRIDLE_5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_5B)->max('id');
    $idLaudoR1_BRIDLE_5B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_5B)->value('id');
    $statusR1_BRIDLE_5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_5B)->value('status_id');
    //ACUMULADOR SAIDA
    $tag_resistenciaAS = "RM 72 400 410 421 003 - 000020";
    $idAtividadeAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAS)->value('id');
    $idAnaliseAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAS)->max('id');
    $idLaudoAS = DB::table('laudos')->where('analise_id', '=', $idAnaliseAS)->value('id');
    $statusAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAS)->value('status_id');
    //ROLO 1 BRIDLE 5A
    $tag_resistenciaR1_BRIDLE_5A = "RM 72 400 410 375 003 - 000020";
    $idAtividadeR1_BRIDLE_5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_5A)->value('id');
    $idAnaliseR1_BRIDLE_5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_5A)->max('id');
    $idLaudoR1_BRIDLE_5A = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_5A)->value('id');
    $statusR1_BRIDLE_5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_5A)->value('status_id');
    //ROLO 2 BRIDLE 5B
    $tag_resistenciaR2_BRIDLE_5B = "RM 72 400 410 378 003 - 000020";
    $idAtividadeR2_BRIDLE_5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_5B)->value('id');
    $idAnaliseR2_BRIDLE_5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_5B)->max('id');
    $idLaudoR2_BRIDLE_5B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_5B)->value('id');
    $statusR2_BRIDLE_5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_5B)->value('status_id');
    // 6 ROLO 2 BRIDLE 5A
    $tag_resistenciaR2_BRIDLE_5A = "RM 72 400 410 376 003 - 000020";
    $idAtividadeR2_BRIDLE_5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_5A)->value('id');
    $idAnaliseR2_BRIDLE_5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_5A)->max('id');
    $idLaudoR2_BRIDLE_5A = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_5A)->value('id');
    $statusR2_BRIDLE_5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_5A)->value('status_id');
    // 9 ROLO 2 BRIDLE Nº 6
    $tag_resistenciaR2_BRIDLE_N6 = "RM 72 400 410 417 003 - 000020";
    $idAtividadeR2_BRIDLE_N6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_N6)->value('id');
    $idAnaliseR2_BRIDLE_N6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N6)->max('id');
    $idLaudoR2_BRIDLE_N6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N6)->value('id');
    $statusR2_BRIDLE_N6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N6)->value('status_id');
    // 10 ROLO 1 BRIDLE Nº 6
    $tag_resistenciaR1_BRIDLE_N6 = "RM 72 400 410 415 004 - 000020";
    $idAtividadeR1_BRIDLE_N6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_N6)->value('id');
    $idAnaliseR1_BRIDLE_N6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N6)->max('id');
    $idLaudoR1_BRIDLE_N6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N6)->value('id');
    $statusR1_BRIDLE_N6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N6)->value('status_id');
    // 1 ROLO 2 BRIDLE Nº 4B
    $tag_resistenciaR2_BRIDLE_N4B = "RM 72 400 410 340 003 - 000020";
    $idAtividadeR2_BRIDLE_N4B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_N4B)->value('id');
    $idAnaliseR2_BRIDLE_N4B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N4B)->max('id');
    $idLaudoR2_BRIDLE_N4B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N4B)->value('id');
    $statusR2_BRIDLE_N4B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N4B)->value('status_id');
    // 2 ROLO 1 BRIDLE Nº 4B
    $tag_resistenciaR1_BRIDLE_N4B = "RM 72 400 410 339 003 - 000020";
    $idAtividadeR1_BRIDLE_N4B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_N4B)->value('id');
    $idAnaliseR1_BRIDLE_N4B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N4B)->max('id');
    $idLaudoR1_BRIDLE_N4B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N4B)->value('id');
    $statusR1_BRIDLE_N4B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N4B)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_galvanizacao_saida_laminador')->with('idLaudoAPLS', $idLaudoAPLS)->with('statusAPLS', $statusAPLS)
    ->with('idLaudoAPLI', $idLaudoAPLI)->with('statusAPLI', $statusAPLI)->with('idLaudoR1_BRIDLE_5B', $idLaudoR1_BRIDLE_5B)->with('statusR1_BRIDLE_5B', $statusR1_BRIDLE_5B)
    ->with('idLaudoAS', $idLaudoAS)->with('statusAS', $statusAS)->with('idLaudoR1_BRIDLE_5A', $idLaudoR1_BRIDLE_5A)->with('statusR1_BRIDLE_5A', $statusR1_BRIDLE_5A)
    ->with('idLaudoR2_BRIDLE_5B', $idLaudoR2_BRIDLE_5B)->with('statusR2_BRIDLE_5B', $statusR2_BRIDLE_5B)->with('idLaudoR2_BRIDLE_5A', $idLaudoR2_BRIDLE_5A)
    ->with('statusR2_BRIDLE_5A', $statusR2_BRIDLE_5A)->with('idLaudoR2_BRIDLE_N6', $idLaudoR2_BRIDLE_N6)->with('statusR2_BRIDLE_N6', $statusR2_BRIDLE_N6)
    ->with('idLaudoR1_BRIDLE_N6', $idLaudoR1_BRIDLE_N6)->with('statusR1_BRIDLE_N6', $statusR1_BRIDLE_N6)->with('idLaudoR2_BRIDLE_N4B', $idLaudoR2_BRIDLE_N4B)
    ->with('statusR2_BRIDLE_N4B', $statusR2_BRIDLE_N4B)->with('idLaudoR1_BRIDLE_N4B', $idLaudoR1_BRIDLE_N4B)->with('statusR1_BRIDLE_N4B', $statusR1_BRIDLE_N4B)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_saida() {
    //2 ROLO 1 BRIDLE
    $tag_resistenciaR1_BRIDLE_N4B = "RM 72 400 410 455 003 - 000020";
    $idAtividadeR1_BRIDLE_N4B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_N4B)->value('id');
    $idAnaliseR1_BRIDLE_N4B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N4B)->max('id');
    $idLaudoR1_BRIDLE_N4B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N4B)->value('id');
    $statusR1_BRIDLE_N4B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N4B)->value('status_id');
    //ENROLADEIRA 1 //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº01
    $tag_resistenciaAPE_N1 = "RM 72 400 410 477 003 - 000020";
    $idAtividadeAPE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPE_N1)->value('id');
    $idAnaliseAPE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_N1)->max('id');
    $idLaudoAPE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPE_N1)->value('id');
    $statusAPE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_N1)->value('status_id');
    //ENROLADEIRA 2 //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº 02
    $tag_resistenciaAPE_N2 = "RM 72 400 410 501 003 - 000020";
    $idAtividadeAPE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPE_N2)->value('id');
    $idAnaliseAPE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_N2)->max('id');
    $idLaudoAPE_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPE_N2)->value('id');
    $statusAPE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_N2)->value('status_id');
    //1 ROLO 2 BRIDLE //ROLO 2 BRIDLE Nº 7
    $tag_resistenciaR2_BRIDLE_N7 = "RM 72 400 410 456 003 - 000020";
    $idAtividadeR2_BRIDLE_N7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_N7)->value('id');
    $idAnaliseR2_BRIDLE_N7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N7)->max('id');
    $idLaudoR2_BRIDLE_N7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N7)->value('id');
    $statusR2_BRIDLE_N7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N7)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_galvanizacao_saida')
    ->with('idLaudoR1_BRIDLE_N4B', $idLaudoR1_BRIDLE_N4B)->with('statusR1_BRIDLE_N4B', $statusR1_BRIDLE_N4B)->with('idLaudoAPE_N1', $idLaudoAPE_N1)
    ->with('statusAPE_N1', $statusAPE_N1)->with('idLaudoAPE_N2', $idLaudoAPE_N2)->with('statusAPE_N2', $statusAPE_N2)
    ->with('idLaudoR2_BRIDLE_N7', $idLaudoR2_BRIDLE_N7)->with('statusR2_BRIDLE_N7', $statusR2_BRIDLE_N7)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_entrada() {
    //DESENROLADEIRA 01
    $tag_resistenciaDESEN_01 = "RM 72 500 510 009 004 - 000020";
    $idAtividadeDESEN_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDESEN_01)->value('id');
    $idAnaliseDESEN_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEN_01)->max('id');
    $idLaudoDESEN_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEN_01)->value('id');
    $statusDESEN_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEN_01)->value('status_id');
    //DESENROLADEIRA 02
    $tag_resistenciaDESEN_02 = "RM 72 500 510 031 004 - 000020";
    $idAtividadeDESEN_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDESEN_02)->value('id');
    $idAnaliseDESEN_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEN_02)->max('id');
    $idLaudoDESEN_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEN_02)->value('id');
    $statusDESEN_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEN_02)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pintura_entrada')
    ->with('idLaudoDESEN_01', $idLaudoDESEN_01)->with('statusDESEN_01', $statusDESEN_01)->with('idLaudoDESEN_02', $idLaudoDESEN_02)->with('statusDESEN_02', $statusDESEN_02)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_acumulador_entrada() {
    //ACIONAMENTO ACUMULADOR DE ENTRADA
    $tag_resistenciaACIO_ACUM_ENTRADA = "RM 72 500 510 088 001 - 000020";
    $idAtividadeACIO_ACUM_ENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaACIO_ACUM_ENTRADA)->value('id');
    $idAnaliseACIO_ACUM_ENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACIO_ACUM_ENTRADA)->max('id');
    $idLaudoACIO_ACUM_ENTRADA = DB::table('laudos')->where('analise_id', '=', $idAnaliseACIO_ACUM_ENTRADA)->value('id');
    $statusACIO_ACUM_ENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACIO_ACUM_ENTRADA)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pintura_acumulador_entrada')
    ->with('idLaudoACIO_ACUM_ENTRADA', $idLaudoACIO_ACUM_ENTRADA)->with('statusACIO_ACUM_ENTRADA', $statusACIO_ACUM_ENTRADA)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_processo() {
    //CONJUNTO TENSOR 03 - ROLO 02
    $tag_resistenciaCONJ_TEN_03 = "RM 72 500 510 166 004 - 000020";
    $idAtividadeCONJ_TEN_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCONJ_TEN_03)->value('id');
    $idAnaliseCONJ_TEN_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_TEN_03)->max('id');
    $idLaudoCONJ_TEN_03 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCONJ_TEN_03)->value('id');
    $statusCONJ_TEN_03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_TEN_03)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pintura_processo')
    ->with('idLaudoCONJ_TEN_03', $idLaudoCONJ_TEN_03)->with('statusCONJ_TEN_03', $statusCONJ_TEN_03)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_estufas() {
    //ESTUFA PRIME //ZONA 4 SOPRADOR 2
    $tag_resistenciaZ4S2 = "RM 72 500 510 196 000 - 000020";
    $idAtividadeZ4S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ4S2)->value('id');
    $idAnaliseZ4S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ4S2)->max('id');
    $idLaudoZ4S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ4S2)->value('id');
    $statusZ4S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ4S2)->value('status_id');
    //ZONA 4 SOPRADOR 1
    $tag_resistenciaZ4S1 = "RM 72 500 510 194 000 - 000020";
    $idAtividadeZ4S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ4S1)->value('id');
    $idAnaliseZ4S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ4S1)->max('id');
    $idLaudoZ4S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ4S1)->value('id');
    $statusZ4S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ4S1)->value('status_id');
    //ZONA 3 SOPRADOR 2
    $tag_resistenciaZ3S2 = "RM 72 500 510 190 000 - 000020";
    $idAtividadeZ3S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ3S2)->value('id');
    $idAnaliseZ3S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ3S2)->max('id');
    $idLaudoZ3S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ3S2)->value('id');
    $statusZ3S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ3S2)->value('status_id');
    //ZONA 3 SOPRADOR 1
    $tag_resistenciaZ3S1 = "RM 72 500 510 188 000 - 000020";
    $idAtividadeZ3S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ3S1)->value('id');
    $idAnaliseZ3S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ3S1)->max('id');
    $idLaudoZ3S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ3S1)->value('id');
    $statusZ3S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ3S1)->value('status_id');
    //ZONA 2 SOPRADOR 2
    $tag_resistenciaZ2S2 = "RM 72 500 510 184 000 - 000020";
    $idAtividadeZ2S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ2S2)->value('id');
    $idAnaliseZ2S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ2S2)->max('id');
    $idLaudoZ2S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ2S2)->value('id');
    $statusZ2S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ2S2)->value('status_id');
    //ZONA 2 SOPRADOR 1
    $tag_resistenciaZ2S1 = "RM 72 500 510 182 000 - 000020";
    $idAtividadeZ2S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ2S1)->value('id');
    $idAnaliseZ2S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ2S1)->max('id');
    $idLaudoZ2S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ2S1)->value('id');
    $statusZ2S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ2S1)->value('status_id');
    //ZONA 1 SOPRADOR 2
    $tag_resistenciaZ1S2 = "RM 72 500 510 178 000 - 000020";
    $idAtividadeZ1S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ1S2)->value('id');
    $idAnaliseZ1S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ1S2)->max('id');
    $idLaudoZ1S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ1S2)->value('id');
    $statusZ1S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ1S2)->value('status_id');
    //ZONA 1 SOPRADOR 1
    $tag_resistenciaZ1S1 = "RM 72 500 510 176 000 - 000020";
    $idAtividadeZ1S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ1S1)->value('id');
    $idAnaliseZ1S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ1S1)->max('id');
    $idLaudoZ1S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ1S1)->value('id');
    $statusZ1S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ1S1)->value('status_id');
    //ESTUFA TINTA  //ZONA 4 SOPRADOR 2
    $tag_resistenciaETZ4S2 = "RM 72 500 510 242 000 - 000020";
    $idAtividadeETZ4S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ4S2)->value('id');
    $idAnaliseETZ4S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ4S2)->max('id');
    $idLaudoETZ4S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ4S2)->value('id');
    $statusETZ4S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ4S2)->value('status_id');
    //ZONA 4 SOPRADOR 1
    $tag_resistenciaETZ4S1 = "RM 72 500 510 240 000 - 000020";
    $idAtividadeETZ4S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ4S1)->value('id');
    $idAnaliseETZ4S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ4S1)->max('id');
    $idLaudoETZ4S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ4S1)->value('id');
    $statusETZ4S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ4S1)->value('status_id');
    //ZONA 3 SOPRADOR 2
    $tag_resistenciaETZ3S2 = "RM 72 500 510 236 000 - 000020";
    $idAtividadeETZ3S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ3S2)->value('id');
    $idAnaliseETZ3S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ3S2)->max('id');
    $idLaudoETZ3S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ3S2)->value('id');
    $statusETZ3S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ3S2)->value('status_id');
    //ZONA 3 SOPRADOR 1
    $tag_resistenciaETZ3S1 = "RM 72 500 510 234 000 - 000020";
    $idAtividadeETZ3S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ3S1)->value('id');
    $idAnaliseETZ3S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ3S1)->max('id');
    $idLaudoETZ3S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ3S1)->value('id');
    $statusETZ3S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ3S1)->value('status_id');
    //ZONA 2 SOPRADOR 2
    $tag_resistenciaETZ2S2 = "RM 72 500 510 230 000 - 000020";
    $idAtividadeETZ2S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ2S2)->value('id');
    $idAnaliseETZ2S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ2S2)->max('id');
    $idLaudoETZ2S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ2S2)->value('id');
    $statusETZ2S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ2S2)->value('status_id');
    //ZONA 2 SOPRADOR 1
    $tag_resistenciaETZ2S1 = "RM 72 500 510 228 000 - 000020";
    $idAtividadeETZ2S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ2S1)->value('id');
    $idAnaliseETZ2S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ2S1)->max('id');
    $idLaudoETZ2S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ2S1)->value('id');
    $statusETZ2S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ2S1)->value('status_id');
    //ZONA 1 SOPRADOR 2
    $tag_resistenciaETZ1S2 = "RM 72 500 510 224 000 - 000020";
    $idAtividadeETZ1S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ1S2)->value('id');
    $idAnaliseETZ1S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ1S2)->max('id');
    $idLaudoETZ1S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ1S2)->value('id');
    $statusETZ1S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ1S2)->value('status_id');
    //ZONA 1 SOPRADOR 1
    $tag_resistenciaETZ1S1 = "RM 72 500 510 222 000 - 000020";
    $idAtividadeETZ1S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ1S1)->value('id');
    $idAnaliseETZ1S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ1S1)->max('id');
    $idLaudoETZ1S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ1S1)->value('id');
    $statusETZ1S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ1S1)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pintura_estufas')
    ->with('idLaudoZ4S2', $idLaudoZ4S2)->with('statusZ4S2', $statusZ4S2)->with('idLaudoZ4S1', $idLaudoZ4S1)->with('statusZ4S1', $statusZ4S1)
    ->with('idLaudoZ3S2', $idLaudoZ3S2)->with('statusZ3S2', $statusZ3S2)->with('idLaudoZ3S1', $idLaudoZ3S1)->with('statusZ3S1', $statusZ3S1)
    ->with('idLaudoZ2S2', $idLaudoZ2S2)->with('statusZ2S2', $statusZ2S2)->with('idLaudoZ2S1', $idLaudoZ2S1)->with('statusZ2S1', $statusZ2S1)
    ->with('idLaudoZ1S2', $idLaudoZ1S2)->with('statusZ1S2', $statusZ1S2)->with('idLaudoZ1S1', $idLaudoZ1S1)->with('statusZ1S1', $statusZ1S1)
    ->with('idLaudoETZ4S2', $idLaudoETZ4S2)->with('statusETZ4S2', $statusETZ4S2)->with('idLaudoETZ4S1', $idLaudoETZ4S1)
    ->with('statusETZ4S1', $statusETZ4S1)->with('idLaudoETZ3S2', $idLaudoETZ3S2)->with('statusETZ3S2', $statusETZ3S2)
    ->with('idLaudoETZ3S1', $idLaudoETZ3S1)->with('statusETZ3S1', $statusETZ3S1)->with('idLaudoETZ2S2', $idLaudoETZ2S2)
    ->with('statusETZ2S2', $statusETZ2S2)->with('idLaudoETZ2S1', $idLaudoETZ2S1)->with('statusETZ2S1', $statusETZ2S1)
    ->with('idLaudoETZ1S2', $idLaudoETZ1S2)->with('statusETZ1S2', $statusETZ1S2)->with('idLaudoETZ1S1', $idLaudoETZ1S1)->with('statusETZ1S1', $statusETZ1S1)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_areaExterna() {
    //SOPRADOR PRINC. INCINERADOR - SUPPLY FAN
    $tag_resistenciaSPISF = "RM 72 500 510 328 010 - 000020";
    $idAtividadeSPISF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSPISF)->value('id');
    $idAnaliseSPISF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPISF)->max('id');
    $idLaudoSPISF = DB::table('laudos')->where('analise_id', '=', $idAnaliseSPISF)->value('id');
    $statusSPISF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPISF)->value('status_id');
    //ENXAGUE 1
    $tag_resistenciaE1 = "RM 72 500 510 320 000 - 000020";
    $idAtividadeE1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaE1)->value('id');
    $idAnaliseE1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeE1)->max('id');
    $idLaudoE1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseE1)->value('id');
    $statusE1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseE1)->value('status_id');
    //ENXAGUE 2
    $tag_resistenciaE2 = "RM 72 500 510 322 000 - 000020";
    $idAtividadeE2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaE2)->value('id');
    $idAnaliseE2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeE2)->max('id');
    $idLaudoE2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseE2)->value('id');
    $statusE2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseE2)->value('status_id');
    //AGUA GERAL
    $tag_resistenciaAG = "RM 72 500 510 324 000 - 000020";
    $idAtividadeAG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAG)->value('id');
    $idAnaliseAG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAG)->max('id');
    $idLaudoAG = DB::table('laudos')->where('analise_id', '=', $idAnaliseAG)->value('id');
    $statusAG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAG)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pintura_areaExterna')
    ->with('idLaudoSPISF', $idLaudoSPISF)->with('statusSPISF', $statusSPISF)->with('idLaudoE1', $idLaudoE1)->with('statusE1', $statusE1)
    ->with('idLaudoE2', $idLaudoE2)->with('statusE2', $statusE2)->with('idLaudoAG', $idLaudoAG)->with('statusAG', $statusAG)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_saida() {
    //BRIDLE ROLO 2 //CONJUNTO TENSOR 05 - ROLO 02
    $tag_resistenciaCONJ_TEN_05 = "RM 72 500 510 262 004 - 000020";
    $idAtividadeCONJ_TEN_05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCONJ_TEN_05)->value('id');
    $idAnaliseCONJ_TEN_05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_TEN_05)->max('id');
    $idLaudoCONJ_TEN_05 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCONJ_TEN_05)->value('id');
    $statusCONJ_TEN_05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_TEN_05)->value('status_id');
    //BRIDLE ROLO 1 //CONJUNTO TENSOR 05 - ROLO 01
    $tag_resistenciaCONJ_TEN_05_R1 = "RM 72 500 510 262 001 - 000020";
    $idAtividadeCONJ_TEN_05_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCONJ_TEN_05_R1)->value('id');
    $idAnaliseCONJ_TEN_05_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_TEN_05_R1)->max('id');
    $idLaudoCONJ_TEN_05_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCONJ_TEN_05_R1)->value('id');
    $statusCONJ_TEN_05_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_TEN_05_R1)->value('status_id');
    //BRIDLE 6 ROLO 1 //CONJUNTO TENSOR 06 - ROLO 01
    $tag_resistenciaCT_6_R1 = "RM 72 500 510 274 001 - 000020";
    $idAtividadeCT_6_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCT_6_R1)->value('id');
    $idAnaliseCT_6_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT_6_R1)->max('id');
    $idLaudoCT_6_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT_6_R1)->value('id');
    $statusCT_6_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT_6_R1)->value('status_id');
    //BRIDLE 6 ROLO 2 //CONJUNTO TENSOR 06 - ROLO 02
    $tag_resistenciaCT_06_R2 = "RM 72 500 510 274 004 - 000020";
    $idAtividadeCT_06_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCT_06_R2)->value('id');
    $idAnaliseCT_06_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT_06_R2)->max('id');
    $idLaudoCT_06_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT_06_R2)->value('id');
    $statusCT_06_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT_06_R2)->value('status_id');
    //ENROLADEIRA
    $tag_resistenciaENR = "RM 72 500 510 306 001 - 000020";
    $idAtividadeENR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaENR)->value('id');
    $idAnaliseENR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR)->max('id');
    $idLaudoENR = DB::table('laudos')->where('analise_id', '=', $idAnaliseENR)->value('id');
    $statusENR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR)->value('status_id');
    //ACIONAMENTO ACUMULADOR SAIDA
    $tag_resistenciaAAS = "RM 72 500 510 264 001 - 000020";
    $idAtividadeAAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAAS)->value('id');
    $idAnaliseAAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAAS)->max('id');
    $idLaudoAAS = DB::table('laudos')->where('analise_id', '=', $idAnaliseAAS)->value('id');
    $statusAAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAAS)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pintura_saida')
    ->with('idLaudoCONJ_TEN_05', $idLaudoCONJ_TEN_05)->with('statusCONJ_TEN_05', $statusCONJ_TEN_05)->with('idLaudoCONJ_TEN_05_R1', $idLaudoCONJ_TEN_05_R1)
    ->with('statusCONJ_TEN_05_R1', $statusCONJ_TEN_05_R1)->with('idLaudoCT_6_R1', $idLaudoCT_6_R1)->with('statusCT_6_R1', $statusCT_6_R1)->with('idLaudoCT_06_R2', $idLaudoCT_06_R2)
    ->with('statusCT_06_R2', $statusCT_06_R2)->with('idLaudoENR', $idLaudoENR)->with('statusENR', $statusENR)->with('idLaudoAAS', $idLaudoAAS)->with('statusAAS', $statusAAS)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function cs_LCL() {
    //ACIONAMENTO DESENROLADEIRA
    $tag_resistenciaAD = "RM 72 600 610 015 000 - 000020";
    $idAtividadeAD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAD)->value('id');
    $idAnaliseAD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAD)->max('id');
    $idLaudoAD = DB::table('laudos')->where('analise_id', '=', $idAnaliseAD)->value('id');
    $statusAD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAD)->value('status_id');
    //ACIONAMENTO ENROLADEIRA
    $tag_resistenciaAE = "RM 72 600 610 107 000 - 000020";
    $idAtividadeAE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAE)->value('id');
    $idAnaliseAE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE)->max('id');
    $idLaudoAE = DB::table('laudos')->where('analise_id', '=', $idAnaliseAE)->value('id');
    $statusAE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE)->value('status_id');
    //SLITTER E EMBOSSER
    $tag_resistenciaSEMB = "RM 72 600 610 059 000 - 000020";
    $idAtividadeSEMB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSEMB)->value('id');
    $idAnaliseSEMB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEMB)->max('id');
    $idLaudoSEMB = DB::table('laudos')->where('analise_id', '=', $idAnaliseSEMB)->value('id');
    $statusSEMB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEMB)->value('status_id');
    //UNIDADE HIDRAULICA DE SAIDA
    $tag_resistenciaUHS = "RM 72 600 610 117 000 - 000020";
    $idAtividadeUHS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaUHS)->value('id');
    $idAnaliseUHS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS)->max('id');
    $idLaudoUHS = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS)->value('id');
    $statusUHS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS)->value('status_id');
    //CADEIRA TENCIONADORA 2
    $tag_resistenciaCT2 = "RM 72 600 610 097 000 - 000021";
    $idAtividadeCT2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCT2)->value('id');
    $idAnaliseCT2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT2)->max('id');
    $idLaudoCT2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT2)->value('id');
    $statusCT2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT2)->value('status_id');
    //CADEIRA TENCIONADORA 1
    $tag_resistenciaCT1 = "RM 72 600 610 097 000 - 000020";
    $idAtividadeCT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCT1)->value('id');
    $idAnaliseCT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT1)->max('id');
    $idLaudoCT1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT1)->value('id');
    $statusCT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT1)->value('status_id');
    //ENTRADA
    $tag_resistenciaENT = "RM 72 600 610 027 000 - 000020";
    $idAtividadeENT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaENT)->value('id');
    $idAnaliseENT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENT)->max('id');
    $idLaudoENT = DB::table('laudos')->where('analise_id', '=', $idAnaliseENT)->value('id');
    $statusENT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENT)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_cs_LCL')
    ->with('idLaudoAD', $idLaudoAD)->with('statusAD', $statusAD)->with('idLaudoAE', $idLaudoAE)->with('statusAE', $statusAE)->with('idLaudoSEMB', $idLaudoSEMB)
    ->with('statusSEMB', $statusSEMB)->with('idLaudoUHS', $idLaudoUHS)->with('statusUHS', $statusUHS)->with('idLaudoCT2', $idLaudoCT2)->with('statusCT2', $statusCT2)
    ->with('idLaudoCT1', $idLaudoCT1)->with('statusCT1', $statusCT1)->with('idLaudoENT', $idLaudoENT)->with('statusENT', $statusENT)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function cs_LCT1() {
    //ESTEIRA ENTRADA DO EMPILHADOR
    $tag_resistenciaEEE = "RM 72 600 620 079 000 - 000020";
    $idAtividadeEEE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEEE)->value('id');
    $idAnaliseEEE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEEE)->max('id');
    $idLaudoEEE = DB::table('laudos')->where('analise_id', '=', $idAnaliseEEE)->value('id');
    $statusEEE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEEE)->value('status_id');
    //CONJ. SOPRADOR
    $tag_resistenciaCONJ_SOP = "RM 72 600 620 085 000 - 000020";
    $idAtividadeCONJ_SOP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCONJ_SOP)->value('id');
    $idAnaliseCONJ_SOP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_SOP)->max('id');
    $idLaudoCONJ_SOP = DB::table('laudos')->where('analise_id', '=', $idAnaliseCONJ_SOP)->value('id');
    $statusCONJ_SOP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_SOP)->value('status_id');
    //ROLO PUXADOR
    $tag_resistenciaRP = "RM 72 600 620 061 000 - 000020";
    $idAtividadeRP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaRP)->value('id');
    $idAnaliseRP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRP)->max('id');
    $idLaudoRP = DB::table('laudos')->where('analise_id', '=', $idAnaliseRP)->value('id');
    $statusRP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRP)->value('status_id');
    //ESTEIRA SAIDA DA TESOURA MECANICA
    $tag_resistenciaESTM = "RM 72 600 620 071 000 - 000020";
    $idAtividadeESTM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaESTM)->value('id');
    $idAnaliseESTM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTM)->max('id');
    $idLaudoESTM = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTM)->value('id');
    $statusESTM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTM)->value('status_id');
    //TESOURA MECANICA
    $tag_resistenciaTM = "RM 72 600 620 067 000 - 000020";
    $idAtividadeTM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTM)->value('id');
    $idAnaliseTM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTM)->max('id');
    $idLaudoTM = DB::table('laudos')->where('analise_id', '=', $idAnaliseTM)->value('id');
    $statusTM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTM)->value('status_id');
    //DESEMPENADEIRA
    $tag_resistenciaD1 = "RM 72 600 620 043 000 - 000020";
    $idAtividadeD1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaD1)->value('id');
    $idAnaliseD1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD1)->max('id');
    $idLaudoD1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseD1)->value('id');
    $statusD1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD1)->value('status_id');
    //UH ENTRADA
    $tag_resistenciaENT = "RM 72 600 620 027 000 - 000020";
    $idAtividadeENT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaENT)->value('id');
    $idAnaliseENT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENT)->max('id');
    $idLaudoENT = DB::table('laudos')->where('analise_id', '=', $idAnaliseENT)->value('id');
    $statusENT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENT)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_cs_LCT1')
    ->with('idLaudoEEE', $idLaudoEEE)->with('statusEEE', $statusEEE)->with('idLaudoCONJ_SOP', $idLaudoCONJ_SOP)->with('statusCONJ_SOP', $statusCONJ_SOP)
    ->with('idLaudoRP', $idLaudoRP)->with('statusRP', $statusRP)->with('idLaudoESTM', $idLaudoESTM)->with('statusESTM', $statusESTM) ->with('idLaudoTM', $idLaudoTM)
    ->with('statusTM', $statusTM) ->with('idLaudoD1', $idLaudoD1)->with('statusD1', $statusD1)->with('idLaudoENT', $idLaudoENT)->with('statusENT', $statusENT)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function cs_LCT2() {
    //TESOURA MECANICA
    $tag_resistenciaT_MEC = "RM 72 600 621 111 000 - 000020";
    $idAtividadeT_MEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaT_MEC)->value('id');
    $idAnaliseT_MEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT_MEC)->max('id');
    $idLaudoT_MEC = DB::table('laudos')->where('analise_id', '=', $idAnaliseT_MEC)->value('id');
    $statusT_MEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT_MEC)->value('status_id');
    //ROLO PUXADOR
    $tag_resistenciaROLO_P = "RM 72 600 621 105 000 - 000020";
    $idAtividadeROLO_P = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaROLO_P)->value('id');
    $idAnaliseROLO_P = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeROLO_P)->max('id');
    $idLaudoROLO_P = DB::table('laudos')->where('analise_id', '=', $idAnaliseROLO_P)->value('id');
    $statusROLO_P = DB::table('preditiva_analises')->where('id', '=', $idAnaliseROLO_P)->value('status_id');
    //DESEMPENADEIRA
    $tag_resistenciaD2 = "RM 72 600 621 073 000 - 000020";
    $idAtividadeD2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaD2)->value('id');
    $idAnaliseD2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD2)->max('id');
    $idLaudoD2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseD2)->value('id');
    $statusD2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD2)->value('status_id');
    //UH. M01
    $tag_resistenciaUH_M01 = "RM 72 600 621 093 000 - 000020";
    $idAtividadeUH_M01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaUH_M01)->value('id');
    $idAnaliseUH_M01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_M01)->max('id');
    $idLaudoUH_M01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_M01)->value('id');
    $statusUH_M01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_M01)->value('status_id');
    //TESOURA CIRCULAR
    $tag_resistenciaTES_CIR = "RM 72 600 621 047 000 - 000020";
    $idAtividadeTES_CIR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTES_CIR)->value('id');
    $idAnaliseTES_CIR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_CIR)->max('id');
    $idLaudoTES_CIR = DB::table('laudos')->where('analise_id', '=', $idAnaliseTES_CIR)->value('id');
    $statusTES_CIR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_CIR)->value('status_id');
    //RECOLHEDOR DE APARAS
    $tag_resistenciaREC_A = "RM 72 600 621 063 000 - 000020";
    $idAtividadeREC_A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaREC_A)->value('id');
    $idAnaliseREC_A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeREC_A)->max('id');
    $idLaudoREC_A = DB::table('laudos')->where('analise_id', '=', $idAnaliseREC_A)->value('id');
    $statusREC_A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseREC_A)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_cs_LCT2')
    ->with('idLaudoT_MEC', $idLaudoT_MEC)->with('statusT_MEC', $statusT_MEC)->with('idLaudoROLO_P', $idLaudoROLO_P)->with('statusROLO_P', $statusROLO_P)
    ->with('idLaudoD2', $idLaudoD2)->with('statusD2', $statusD2)->with('idLaudoUH_M01', $idLaudoUH_M01)->with('statusUH_M01', $statusUH_M01)
    ->with('idLaudoTES_CIR', $idLaudoTES_CIR)->with('statusTES_CIR', $statusTES_CIR)->with('idLaudoREC_A', $idLaudoREC_A)->with('statusREC_A', $statusREC_A)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function cs_LCC() {
    //ROLO PUXADOR
    $tag_resistenciaRP1 = "RM 72 600 640 113 000 - 000020";
    $idAtividadeRP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaRP1)->value('id');
    $idAnaliseRP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRP1)->max('id');
    $idLaudoRP1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRP1)->value('id');
    $statusRP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRP1)->value('status_id');
    //RECOLHEDOR DE APARAS
    $tag_resistenciaREC_APARAS = "RM 72 600 640 089 000 - 000020";
    $idAtividadeREC_APARAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaREC_APARAS)->value('id');
    $idAnaliseREC_APARAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeREC_APARAS)->max('id');
    $idLaudoREC_APARAS = DB::table('laudos')->where('analise_id', '=', $idAnaliseREC_APARAS)->value('id');
    $statusREC_APARAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseREC_APARAS)->value('status_id');
    //TESOURA CIRCULAR
    $tag_resistenciaTES_CIR1 = "RM 72 600 640 071 000 - 000020";
    $idAtividadeTES_CIR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTES_CIR1)->value('id');
    $idAnaliseTES_CIR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_CIR1)->max('id');
    $idLaudoTES_CIR1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTES_CIR1)->value('id');
    $statusTES_CIR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_CIR1)->value('status_id');
    //DESEMPENADEIRA
    $tag_resistenciaDES1 = "RM 72 600 640 049 000 - 000020";
    $idAtividadeDES1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDES1)->value('id');
    $idAnaliseDES1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES1)->max('id');
    $idLaudoDES1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDES1)->value('id');
    $statusDES1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES1)->value('status_id');
    //UH M02
    $tag_resistenciaUH_M02 = "RM 72 600 640 167 000 - 000021";
    $idAtividadeUH_M02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaUH_M02)->value('id');
    $idAnaliseUH_M02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_M02)->max('id');
    $idLaudoUH_M02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_M02)->value('id');
    $statusUH_M02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_M02)->value('status_id');
    //UH M01
    $tag_resistenciaUH_M1 = "RM 72 600 640 167 000 - 000020";
    $idAtividadeUH_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaUH_M1)->value('id');
    $idAnaliseUH_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_M1)->max('id');
    $idLaudoUH_M1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_M1)->value('id');
    $statusUH_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_M1)->value('status_id');
    //TESOURA MECANICA
    $tag_resistenciaTES_MEC = "RM 72 600 640 121 000 - 000020";
    $idAtividadeTES_MEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTES_MEC)->value('id');
    $idAnaliseTES_MEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_MEC)->max('id');
    $idLaudoTES_MEC = DB::table('laudos')->where('analise_id', '=', $idAnaliseTES_MEC)->value('id');
    $statusTES_MEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_MEC)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_cs_LCC')
    ->with('idLaudoRP1', $idLaudoRP1)->with('statusRP1', $statusRP1)->with('idLaudoREC_APARAS', $idLaudoREC_APARAS)
    ->with('statusREC_APARAS', $statusREC_APARAS)->with('idLaudoTES_CIR1', $idLaudoTES_CIR1)->with('statusTES_CIR1', $statusTES_CIR1)
    ->with('idLaudoDES1', $idLaudoDES1)->with('statusDES1', $statusDES1)->with('idLaudoUH_M02', $idLaudoUH_M02)->with('statusUH_M02', $statusUH_M02)
    ->with('idLaudoUH_M1', $idLaudoUH_M1)->with('statusUH_M1', $statusUH_M1)->with('idLaudoTES_MEC', $idLaudoTES_MEC)->with('statusTES_MEC', $statusTES_MEC)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr5() {
    //PONTE LD
    $tag_resistenciaPLD = "RM 72 600 005 005 000 - 000020";
    $idAtividadePLD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD)->value('id');
    $idAnalisePLD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD)->max('id');
    $idLaudoPLD = DB::table('laudos')->where('analise_id', '=', $idAnalisePLD)->value('id');
    $statusPLD = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE = "RM 72 600 005 003 000 - 000020";
    $idAtividadePLE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE)->value('id');
    $idAnalisePLE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE)->max('id');
    $idLaudoPLE = DB::table('laudos')->where('analise_id', '=', $idAnalisePLE)->value('id');
    $statusPLE = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE)->value('status_id');
    //CARRO
    $tag_resistenciaCAR = "RM 72 600 005 009 000 - 000020";
    $idAtividadeCAR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR)->value('id');
    $idAnaliseCAR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR)->max('id');
    $idLaudoCAR = DB::table('laudos')->where('analise_id', '=', $idAnaliseCAR)->value('id');
    $statusCAR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV = "RM 72 600 005 013 000 - 000020";
    $idAtividadeELEV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV)->value('id');
    $idAnaliseELEV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV)->max('id');
    $idLaudoELEV = DB::table('laudos')->where('analise_id', '=', $idAnaliseELEV)->value('id');
    $statusELEV = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr5')
    ->with('idLaudoPLD', $idLaudoPLD)->with('statusPLD', $statusPLD)->with('idLaudoPLE', $idLaudoPLE)->with('statusPLE', $statusPLE)
    ->with('idLaudoCAR', $idLaudoCAR)->with('statusCAR', $statusCAR)->with('idLaudoELEV', $idLaudoELEV)->with('statusELEV', $statusELEV)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr7() {
    //PONTE LD
    $tag_resistenciaPLD7 = "RM 72 500 007 005 000 - 000020";
    $idAtividadePLD7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD7)->value('id');
    $idAnalisePLD7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD7)->max('id');
    $idLaudoPLD7 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLD7)->value('id');
    $statusPLD7 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD7)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE7 = "RM 72 500 007 003 000 - 000020";
    $idAtividadePLE7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE7)->value('id');
    $idAnalisePLE7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE7)->max('id');
    $idLaudoPLE7 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLE7)->value('id');
    $statusPLE7 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE7)->value('status_id');
    //CARRO
    $tag_resistenciaCAR7 = "RM 72 500 007 009 000 - 000020";
    $idAtividadeCAR7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR7)->value('id');
    $idAnaliseCAR7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR7)->max('id');
    $idLaudoCAR7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCAR7)->value('id');
    $statusCAR7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR7)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV7 = "RM 72 500 007 013 000 - 000020";
    $idAtividadeELEV7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV7)->value('id');
    $idAnaliseELEV7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV7)->max('id');
    $idLaudoELEV7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseELEV7)->value('id');
    $statusELEV7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV7)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr7')
    ->with('idLaudoPLD7', $idLaudoPLD7)->with('statusPLD7', $statusPLD7)->with('idLaudoPLE7', $idLaudoPLE7)->with('statusPLE7', $statusPLE7)
    ->with('idLaudoCAR7', $idLaudoCAR7)->with('statusCAR7', $statusCAR7)->with('idLaudoELEV7', $idLaudoELEV7)->with('statusELEV7', $statusELEV7)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr8() {
    //PONTE LD
    $tag_resistenciaPLD8 = "RM 72 400 008 005 000 - 000020";
    $idAtividadePLD8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD8)->value('id');
    $idAnalisePLD8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD8)->max('id');
    $idLaudoPLD8 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLD8)->value('id');
    $statusPLD8 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD8)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE8 = "RM 72 400 008 003 000 - 000020";
    $idAtividadePLE8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE8)->value('id');
    $idAnalisePLE8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE8)->max('id');
    $idLaudoPLE8 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLE8)->value('id');
    $statusPLE8 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE8)->value('status_id');
    //CARRO
    $tag_resistenciaCAR8 = "RM 72 400 008 009 000 - 000020";
    $idAtividadeCAR8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR8)->value('id');
    $idAnaliseCAR8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR8)->max('id');
    $idLaudoCAR8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCAR8)->value('id');
    $statusCAR8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR8)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV8 = "RM 72 400 008 013 000 - 000020";
    $idAtividadeELEV8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV8)->value('id');
    $idAnaliseELEV8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV8)->max('id');
    $idLaudoELEV8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseELEV8)->value('id');
    $statusELEV8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV8)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr8')
    ->with('idLaudoPLD8', $idLaudoPLD8)->with('statusPLD8', $statusPLD8)->with('idLaudoPLE8', $idLaudoPLE8)->with('statusPLE8', $statusPLE8)
    ->with('idLaudoCAR8', $idLaudoCAR8)->with('statusCAR8', $statusCAR8)->with('idLaudoELEV8', $idLaudoELEV8)->with('statusELEV8', $statusELEV8)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr11() {
    //PONTE LD
    $tag_resistenciaPLD11 = "RM 72 400 011 005 000 - 000020";
    $idAtividadePLD11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD11)->value('id');
    $idAnalisePLD11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD11)->max('id');
    $idLaudoPLD11 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLD11)->value('id');
    $statusPLD11 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD11)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE11 = "RM 72 400 011 003 000 - 000020";
    $idAtividadePLE11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE11)->value('id');
    $idAnalisePLE11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE11)->max('id');
    $idLaudoPLE11 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLE11)->value('id');
    $statusPLE11 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE11)->value('status_id');
    //CARRO
    $tag_resistenciaCAR11 = "RM 72 400 011 009 000 - 000020";
    $idAtividadeCAR11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR11)->value('id');
    $idAnaliseCAR11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR11)->max('id');
    $idLaudoCAR11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCAR11)->value('id');
    $statusCAR11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR11)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV11 = "RM 72 400 011 013 000 - 000020";
    $idAtividadeELEV11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV11)->value('id');
    $idAnaliseELEV11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV11)->max('id');
    $idLaudoELEV11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseELEV11)->value('id');
    $statusELEV11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV11)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr11')
    ->with('idLaudoPLD11', $idLaudoPLD11)->with('statusPLD11', $statusPLD11)->with('idLaudoPLE11', $idLaudoPLE11)->with('statusPLE11', $statusPLE11)
    ->with('idLaudoCAR11', $idLaudoCAR11)->with('statusCAR11', $statusCAR11)->with('idLaudoELEV11', $idLaudoELEV11)->with('statusELEV11', $statusELEV11)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr12() {
    //PONTE LD
    $tag_resistenciaPLD12 = "RM 72 200 012 005 000 - 000020";
    $idAtividadePLD12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD12)->value('id');
    $idAnalisePLD12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD12)->max('id');
    $idLaudoPLD12 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLD12)->value('id');
    $statusPLD12 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD12)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE12 = "RM 72 200 012 003 000 - 000020";
    $idAtividadePLE12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE12)->value('id');
    $idAnalisePLE12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE12)->max('id');
    $idLaudoPLE12 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLE12)->value('id');
    $statusPLE12 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE12)->value('status_id');
    //CARRO
    $tag_resistenciaCAR12 = "RM 72 200 012 009 000 - 000020";
    $idAtividadeCAR12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR12)->value('id');
    $idAnaliseCAR12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR12)->max('id');
    $idLaudoCAR12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCAR12)->value('id');
    $statusCAR12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR12)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV12 = "RM 72 200 012 013 000 - 000020";
    $idAtividadeELEV12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV12)->value('id');
    $idAnaliseELEV12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV12)->max('id');
    $idLaudoELEV12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseELEV12)->value('id');
    $statusELEV12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV12)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr12')
    ->with('idLaudoPLD12', $idLaudoPLD12)->with('statusPLD12', $statusPLD12)->with('idLaudoPLE12', $idLaudoPLE12)->with('statusPLE12', $statusPLE12)
    ->with('idLaudoCAR12', $idLaudoCAR12)->with('statusCAR12', $statusCAR12)->with('idLaudoELEV12', $idLaudoELEV12)->with('statusELEV12', $statusELEV12)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr13() {
    //PONTE LD
    $tag_resistenciaPLD13 = "RM 72 200 013 005 000 - 000020";
    $idAtividadePLD13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD13)->value('id');
    $idAnalisePLD13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD13)->max('id');
    $idLaudoPLD13 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLD13)->value('id');
    $statusPLD13 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD13)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE13 = "RM 72 200 013 003 000 - 000020";
    $idAtividadePLE13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE13)->value('id');
    $idAnalisePLE13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE13)->max('id');
    $idLaudoPLE13 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLE13)->value('id');
    $statusPLE13 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE13)->value('status_id');
    //CARRO
    $tag_resistenciaCAR13 = "RM 72 200 013 009 000 - 000020";
    $idAtividadeCAR13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR13)->value('id');
    $idAnaliseCAR13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR13)->max('id');
    $idLaudoCAR13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCAR13)->value('id');
    $statusCAR13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR13)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV13 = "RM 72 200 013 013 000 - 000020";
    $idAtividadeELEV13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV13)->value('id');
    $idAnaliseELEV13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV13)->max('id');
    $idLaudoELEV13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseELEV13)->value('id');
    $statusELEV13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV13)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr13')
    ->with('idLaudoPLD13', $idLaudoPLD13)->with('statusPLD13', $statusPLD13)->with('idLaudoPLE13', $idLaudoPLE13)->with('statusPLE13', $statusPLE13)
    ->with('idLaudoCAR13', $idLaudoCAR13)->with('statusCAR13', $statusCAR13)->with('idLaudoELEV13', $idLaudoELEV13)->with('statusELEV13', $statusELEV13)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr14() {
    //PONTE LD
    $tag_resistenciaPLDI14 = "RM 72 900 008 005 000 - 000020";
    $idAtividadePLDI14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLDI14)->value('id');
    $idAnalisePLDI14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLDI14)->max('id');
    $idLaudoPLDI14 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLDI14)->value('id');
    $statusPLDI14 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLDI14)->value('status_id');
    //ELEVACAO PRINCIPAL
    $tag_resistenciaEP14 = "RM 72 900 008 013 000 - 000020";
    $idAtividadeEP14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEP14)->value('id');
    $idAnaliseEP14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP14)->max('id');
    $idLaudoEP14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP14)->value('id');
    $statusEP14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP14)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLES14 = "RM 72 900 008 003 000 - 000020";
    $idAtividadePLES14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLES14)->value('id');
    $idAnalisePLES14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLES14)->max('id');
    $idLaudoPLES14 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLES14)->value('id');
    $statusPLES14 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLES14)->value('status_id');
    //CARRO
    $tag_resistenciaCARRO14 = "RM 72 900 008 009 000 - 000020";
    $idAtividadeCARRO14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCARRO14)->value('id');
    $idAnaliseCARRO14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO14)->max('id');
    $idLaudoCARRO14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCARRO14)->value('id');
    $statusCARRO14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO14)->value('status_id');
    //ELEVACAO AUXILIAR
    $tag_resistenciaEA14 = "RM 72 900 008 014 000 - 000020";
    $idAtividadeEA14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEA14)->value('id');
    $idAnaliseEA14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEA14)->max('id');
    $idLaudoEA14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEA14)->value('id');
    $statusEA14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEA14)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr14')
    ->with('idLaudoPLDI14', $idLaudoPLDI14)->with('statusPLDI14', $statusPLDI14)->with('idLaudoEP14', $idLaudoEP14)->with('statusEP14', $statusEP14)
    ->with('idLaudoPLES14', $idLaudoPLES14)->with('statusPLES14', $statusPLES14)->with('idLaudoCARRO14', $idLaudoCARRO14)->with('statusCARRO14', $statusCARRO14)
    ->with('idLaudoEA14', $idLaudoEA14)->with('statusEA14', $statusEA14)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr20() {
    //PONTE LD
    $tag_resistenciaPLDI20 = "RM 72 800 020 005 000 - 000020";
    $idAtividadePLDI20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLDI20)->value('id');
    $idAnalisePLDI20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLDI20)->max('id');
    $idLaudoPLDI20 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLDI20)->value('id');
    $statusPLDI20 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLDI20)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLES20 = "RM 72 800 020 003 000 - 000020";
    $idAtividadePLES20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLES20)->value('id');
    $idAnalisePLES20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLES20)->max('id');
    $idLaudoPLES20 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLES20)->value('id');
    $statusPLES20 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLES20)->value('status_id');
    //CARRO LD
    $tag_resistenciaCARRO20 = "RM 72 800 020 009 000 - 000021";
    $idAtividadeCARRO20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCARRO20)->value('id');
    $idAnaliseCARRO20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO20)->max('id');
    $idLaudoCARRO20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCARRO20)->value('id');
    $statusCARRO20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO20)->value('status_id');
    //ELEVACAO PRINCIPAL
    $tag_resistenciaEP20 = "RM 72 800 020 013 000 - 000020";
    $idAtividadeEP20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEP20)->value('id');
    $idAnaliseEP20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP20)->max('id');
    $idLaudoEP20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP20)->value('id');
    $statusEP20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP20)->value('status_id');
    //CARRO LE
    $tag_resistenciaEA20 = "RM 72 800 020 009 000 - 000020";
    $idAtividadeEA20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEA20)->value('id');
    $idAnaliseEA20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEA20)->max('id');
    $idLaudoEA20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEA20)->value('id');
    $statusEA20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEA20)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr20')
    ->with('idLaudoPLDI20', $idLaudoPLDI20)->with('statusPLDI20', $statusPLDI20)->with('idLaudoPLES20', $idLaudoPLES20)->with('statusPLES20', $statusPLES20)
    ->with('idLaudoCARRO20', $idLaudoCARRO20)->with('statusCARRO20', $statusCARRO20)->with('idLaudoEP20', $idLaudoEP20)->with('statusEP20', $statusEP20)
    ->with('idLaudoEA20', $idLaudoEA20)->with('statusEA20', $statusEA20)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr23() {
    //PONTE LD
    $tag_resistenciaPLDI23 = "RM 72 800 013 005 000 - 000020";
    $idAtividadePLDI23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLDI23)->value('id');
    $idAnalisePLDI23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLDI23)->max('id');
    $idLaudoPLDI23 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLDI23)->value('id');
    $statusPLDI23 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLDI23)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLES23 = "RM 72 800 013 003 000 - 000020";
    $idAtividadePLES23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLES23)->value('id');
    $idAnalisePLES23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLES23)->max('id');
    $idLaudoPLES23 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLES23)->value('id');
    $statusPLES23 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLES23)->value('status_id');
    //CARRO
    $tag_resistenciaCARRO23 = "RM 72 800 013 009 000 - 000020";
    $idAtividadeCARRO23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCARRO23)->value('id');
    $idAnaliseCARRO23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO23)->max('id');
    $idLaudoCARRO23 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCARRO23)->value('id');
    $statusCARRO23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO23)->value('status_id');
    //ELEVACAO
    $tag_resistenciaEP23 = "RM 72 800 013 013 000 - 000020";
    $idAtividadeEP23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEP23)->value('id');
    $idAnaliseEP23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP23)->max('id');
    $idLaudoEP23 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP23)->value('id');
    $statusEP23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP23)->value('status_id');
    //URA
    $ura_status = aux_rm::ura_Menu();
    $ura_final_status = aux_rm::ura_final_Menu();
    $ura_normal = aux_rm::ura_normal_Menu();
    $ura_alarme = aux_rm::ura_alarme_Menu();
    $ura_critico = aux_rm::ura_critico_Menu();
    //LDS
    $lds_status = aux_rm::lds_Menu();
    $lds_final_status = aux_rm::lds_final_Menu();
    $lds_normal = aux_rm::lds_normal_Menu();
    $lds_alarme = aux_rm::lds_alarme_Menu();
    $lds_critico = aux_rm::lds_critico_Menu();
    //LRF
    $lrf_status = aux_rm::laminador_Menu();
    $lrf_final_status = aux_rm::lrf_final_Menu();
    $lrf_normal = aux_rm::lrf_normal_Menu();
    $lrf_alarme = aux_rm::lrf_alarme_Menu();
    $lrf_critico = aux_rm::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_rm::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_rm::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = aux_rm::utilidades_geracao_ar_cs_Menu();
    $uti_final_status = aux_rm::uti_final_Menu();
    $uti_normal = aux_rm::uti_normal_Menu();
    $uti_alarme = aux_rm::uti_alarme_Menu();
    $uti_critico = aux_rm::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_rm::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = aux_rm::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = aux_rm::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = aux_rm::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = aux_rm::galvanizacao_saida_Menu();
    $lgc_final_status = aux_rm::lgc_final_Menu();
    $lgc_normal = aux_rm::lgc_normal_Menu();
    $lgc_alarme = aux_rm::lgc_alarme_Menu();
    $lgc_critico = aux_rm::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_rm::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = aux_rm::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = aux_rm::pintura_processo_Menu();
    $pintura_estufas_status = aux_rm::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_rm::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_rm::pintura_saida_Menu();
    $lpc_final_status = aux_rm::lpc_final_Menu();
    $lpc_normal = aux_rm::lpc_normal_Menu();
    $lpc_alarme = aux_rm::lpc_alarme_Menu();
    $lpc_critico = aux_rm::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_rm::cs_LCL_Menu();
    $cs_LCT1_status = aux_rm::cs_LCT1_Menu();
    $cs_LCT2_status = aux_rm::cs_LCT2_Menu();
    $cs_LCC_status = aux_rm::cs_LCC_Menu();
    $cs_final_status = aux_rm::cs_final_Menu();
    $cs_normal = aux_rm::cs_normal_Menu();
    $cs_alarme = aux_rm::cs_alarme_Menu();
    $cs_critico = aux_rm::cs_critico_Menu();

    //PR
    $pr5_status = aux_rm::pr5_Menu();
    $pr7_status = aux_rm::pr7_Menu();
    $pr8_status = aux_rm::pr8_Menu();
    $pr11_status = aux_rm::pr11_Menu();
    $pr12_status = aux_rm::pr12_Menu();
    $pr13_status = aux_rm::pr13_Menu();
    $pr14_status = aux_rm::pr14_Menu();
    $pr20_status = aux_rm::pr20_Menu();
    $pr23_status = aux_rm::pr23_Menu();
    $pr_final_status = aux_rm::pr_final_Menu();
    $pr_normal = aux_rm::pr_normal_Menu();
    $pr_alarme = aux_rm::pr_alarme_Menu();
    $pr_critico = aux_rm::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.resistencia_pr23')
    ->with('idLaudoPLDI23', $idLaudoPLDI23)->with('statusPLDI23', $statusPLDI23)->with('idLaudoPLES23', $idLaudoPLES23)->with('statusPLES23', $statusPLES23)
    ->with('idLaudoCARRO23', $idLaudoCARRO23)->with('statusCARRO23', $statusCARRO23)->with('idLaudoEP23', $idLaudoEP23)->with('statusEP23', $statusEP23)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_geracao_ar_cs_status', $utilidades_geracao_ar_cs_status)
    ->with('uti_final_status', $uti_final_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_acumulador_entrada_status', $galvanizacao_acumulador_entrada_status)
    ->with('galvanizacao_defl_porao_status', $galvanizacao_defl_porao_status)->with('galvanizacao_saida_laminador_status', $galvanizacao_saida_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_final_status', $lgc_final_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_acumulador_entrada_status', $pintura_acumulador_entrada_status)->with('pintura_processo_status', $pintura_processo_status)
    ->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_final_status', $lpc_final_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_final_status', $cs_final_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)->with('pr12_status', $pr12_status)
    ->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }
}

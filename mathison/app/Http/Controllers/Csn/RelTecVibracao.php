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
use App\Http\Controllers\Csn\AuxFuncRelTec_Vib as aux_vib;

class RelTecVibracao extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao')->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
    ->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
    ->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
    ->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
    ->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
    ->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
    ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
    ->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
    ->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
    ->with('pintura_saida_status', $pintura_saida_status)
    ->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
    ->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
    ->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
    ->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function ura() {
    //EXAUSTOR DO SILO DE OXIDO
    $tag_vibracaoESO = "VB 72 200 240 015 000 - 000001";
    $idAtividadeESO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoESO)->value('id');
    $idAnaliseESO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESO)->max('id');
    $idLaudoESO = DB::table('laudos')->where('analise_id', '=', $idAnaliseESO)->value('id');
    $statusESO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESO)->value('status_id');
    //REATOR
    $tag_vibracaoREATOR = "VB 72 200 240 019 000 - 000001";
    $idAtividadeREATOR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoREATOR)->value('id');
    $idAnaliseREATOR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeREATOR)->max('id');
    $idLaudoREATOR = DB::table('laudos')->where('analise_id', '=', $idAnaliseREATOR)->value('id');
    $statusREATOR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseREATOR)->value('status_id');
    //LAVADOR DE GASES
    $tag_vibracaoLG = "VB 72 200 240 039 000 - 000001";
    $idAtividadeLG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLG)->value('id');
    $idAnaliseLG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLG)->max('id');
    $idLaudoLG = DB::table('laudos')->where('analise_id', '=', $idAnaliseLG)->value('id');
    $statusLG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLG)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_ura')
        ->with('idLaudoESO', $idLaudoESO)->with('statusESO', $statusESO)
        ->with('idLaudoREATOR', $idLaudoREATOR)->with('statusREATOR', $statusREATOR)
        ->with('idLaudoLG', $idLaudoLG)->with('statusLG', $statusLG)->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
        ->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
        ->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
        ->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
        ->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
        ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
        ->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
        ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
        ->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
        ->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
        ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
        ->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
        ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
        ->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
        ->with('pintura_saida_status', $pintura_saida_status)
        ->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
        ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
        ->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
        ->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
        ->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
        ->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function decapagem_entrada() {
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA RECIRCULAÇÃO
    $tag_vibracaoBOMBA_REC = "VB 72 200 210 318 000 - 000005";
    $idAtividadeBOMBA_REC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_REC)->value('id');
    $idAnaliseBOMBA_REC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_REC)->max('id');
    $idLaudoBOMBA_REC = DB::table('laudos')->where('analise_id', '=', $idAnaliseBOMBA_REC)->value('id');
    $statusBOMBA_REC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_REC)->value('status_id');
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA 04
    $tag_vibracaoBOMBA_4 = "VB 72 200 210 318 000 - 000004";
    $idAtividadeBOMBA_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_4)->value('id');
    $idAnaliseBOMBA_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_4)->max('id');
    $idLaudoBOMBA_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBOMBA_4)->value('id');
    $statusBOMBA_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_4)->value('status_id');
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA 03
    $tag_vibracaoBOMBA_3 = "VB 72 200 210 318 000 - 000003";
    $idAtividadeBOMBA_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_3)->value('id');
    $idAnaliseBOMBA_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_3)->max('id');
    $idLaudoBOMBA_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBOMBA_3)->value('id');
    $statusBOMBA_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_3)->value('status_id');
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA 02
    $tag_vibracaoBOMBA_2 = "VB 72 200 210 318 000 - 000002";
    $idAtividadeBOMBA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_2)->value('id');
    $idAnaliseBOMBA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_2)->max('id');
    $idLaudoBOMBA_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBOMBA_2)->value('id');
    $statusBOMBA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_2)->value('status_id');
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA 01
    $tag_vibracaoBOMBA_1 = "VB 72 200 210 318 000 - 000001";
    $idAtividadeBOMBA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_1)->value('id');
    $idAnaliseBOMBA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_1)->max('id');
    $idLaudoBOMBA_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBOMBA_1)->value('id');
    $statusBOMBA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_1)->value('status_id');
    //UNIDADE HIDRAULICA FIFE DESENROLADEIRA
    $tag_vibracaoUHFD = "VB 72 200 210 042 000 - 000001";
    $idAtividadeUHFD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFD)->value('id');
    $idAnaliseUHFD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFD)->max('id');
    $idLaudoUHFD = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFD)->value('id');
    $statusUHFD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFD)->value('status_id');
    //DESEMPENADEIRA
    $tag_vibracaoDESEMPENADEIRA = "VB 72 200 210 048 000 - 000001";
    $idAtividadeDESEMPENADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDESEMPENADEIRA)->value('id');
    $idAnaliseDESEMPENADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEMPENADEIRA)->max('id');
    $idLaudoDESEMPENADEIRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEMPENADEIRA)->value('id');
    $statusDESEMPENADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEMPENADEIRA)->value('status_id');
    //ACIONAMENTO PRICIPAL DESENROLADEIRA
    $tag_vibracaoAPD = "VB 72 200 210 024 000 - 000001";
    $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPD)->value('id');
    $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
    $idLaudoAPD = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPD)->value('id');
    $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_decapagem_entrada')
        ->with('idLaudoBOMBA_REC', $idLaudoBOMBA_REC)->with('statusBOMBA_REC', $statusBOMBA_REC)
        ->with('idLaudoBOMBA_4', $idLaudoBOMBA_4)->with('statusBOMBA_4', $statusBOMBA_4)
        ->with('idLaudoBOMBA_3', $idLaudoBOMBA_3)->with('statusBOMBA_3', $statusBOMBA_3)
        ->with('idLaudoBOMBA_2', $idLaudoBOMBA_2)->with('statusBOMBA_2', $statusBOMBA_2)
        ->with('idLaudoBOMBA_1', $idLaudoBOMBA_1)->with('statusBOMBA_1', $statusBOMBA_1)
        ->with('idLaudoUHFD', $idLaudoUHFD)->with('statusUHFD', $statusUHFD)
        ->with('idLaudoDESEMPENADEIRA', $idLaudoDESEMPENADEIRA)->with('statusDESEMPENADEIRA', $statusDESEMPENADEIRA)
        ->with('idLaudoAPD', $idLaudoAPD)->with('statusAPD', $statusAPD)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
        ->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
        ->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
        ->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
        ->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
        ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
        ->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
        ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
        ->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
        ->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
        ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
        ->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
        ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
        ->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
        ->with('pintura_saida_status', $pintura_saida_status)
        ->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
        ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
        ->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
        ->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
        ->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
        ->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function decapagem_processo() {
    //SISTEMA DE COMBUSTAO 01
    $tag_vibracaoSC_01 = "VB 72 050 150 001 000 - 000001";
    $idAtividadeSC_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC_01)->value('id');
    $idAnaliseSC_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_01)->max('id');
    $idLaudoSC_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_01)->value('id');
    $statusSC_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_01)->value('status_id');
    //SISTEMA DE COMBUSTAO 02
    $tag_vibracaoSC_02 = "VB 72 050 250 001 000 - 000001";
    $idAtividadeSC_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC_02)->value('id');
    $idAnaliseSC_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_02)->max('id');
    $idLaudoSC_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_02)->value('id');
    $statusSC_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_02)->value('status_id');
    //SISTEMA DE AGUA 01
    $tag_vibracaoSA_01 = "VB 72 050 150 003 000 - 000001";
    $idAtividadeSA_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSA_01)->value('id');
    $idAnaliseSA_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSA_01)->max('id');
    $idLaudoSA_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSA_01)->value('id');
    $statusSA_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSA_01)->value('status_id');
    //SISTEMA DE AGUA 02
    $tag_vibracaoAPD = "VB 72 050 250 003 000 - 000001";
    $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPD)->value('id');
    $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
    $idLaudoAPD = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPD)->value('id');
    $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');
    //BOMBA 01 SCRUBBER
    $tag_vibracaoB1_SCRUBBER = "VB 72 200 210 165 000 - 000001";
    $idAtividadeB1_SCRUBBER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoB1_SCRUBBER)->value('id');
    $idAnaliseB1_SCRUBBER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1_SCRUBBER)->max('id');
    $idLaudoB1_SCRUBBER = DB::table('laudos')->where('analise_id', '=', $idAnaliseB1_SCRUBBER)->value('id');
    $statusB1_SCRUBBER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1_SCRUBBER)->value('status_id');
    //BOMBA 02 SCRUBBER
    $tag_vibracaoB2_SCRUBBER = "VB 72 200 210 165 000 - 000002";
    $idAtividadeB2_SCRUBBER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoB2_SCRUBBER)->value('id');
    $idAnaliseB2_SCRUBBER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB2_SCRUBBER)->max('id');
    $idLaudoB2_SCRUBBER = DB::table('laudos')->where('analise_id', '=', $idAnaliseB2_SCRUBBER)->value('id');
    $statusB2_SCRUBBER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB2_SCRUBBER)->value('status_id');
    //EXAUSTOR DE GASES
    $tag_vibracaoEG = "VB 72 200 210 165 000 - 000003";
    $idAtividadeEG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEG)->value('id');
    $idAnaliseEG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEG)->max('id');
    $idLaudoEG = DB::table('laudos')->where('analise_id', '=', $idAnaliseEG)->value('id');
    $statusEG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEG)->value('status_id');
    //RECIRCULAÇÃO DA LAVAGEM - BOMBA 1 DOS TANQUES 1 E 2
    $tag_vibracaoRLB1T1_2 = "VB 72 200 210 156 000 - 000001";
    $idAtividadeRLB1T1_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB1T1_2)->value('id');
    $idAnaliseRLB1T1_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB1T1_2)->max('id');
    $idLaudoRLB1T1_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRLB1T1_2)->value('id');
    $statusRLB1T1_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB1T1_2)->value('status_id');
    //RECIRCULAÇÃO DA LAVAGEM - BOMBA 3SB DOS TANQUES 1 E 2
    $tag_vibracaoRLB_3SB = "VB 72 200 210 156 000 - 000003";
    $idAtividadeRLB_3SB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB_3SB)->value('id');
    $idAnaliseRLB_3SB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB_3SB)->max('id');
    $idLaudoRLB_3SB = DB::table('laudos')->where('analise_id', '=', $idAnaliseRLB_3SB)->value('id');
    $statusRLB_3SB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB_3SB)->value('status_id');
    //RECIRCULAÇÃO DA LAVAGEM - BOMBA 2 DOS TANQUES 1 E 2
    $tag_vibracaoAPD = "VB 72 200 210 156 000 - 000002";
    $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPD)->value('id');
    $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
    $idLaudoAPD = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPD)->value('id');
    $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');
    //SEGUNDO NIVEL DE ACESSO //RECIRCULAÇÃO DA LAVAGEM - BOMBA 1 DOS TANQUES 3 E 4
    $tag_vibracaoRLB1T3_4 = "VB 72 200 210 156 000 - 000004";
    $idAtividadeRLB1T3_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB1T3_4)->value('id');
    $idAnaliseRLB1T3_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB1T3_4)->max('id');
    $idLaudoRLB1T3_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRLB1T3_4)->value('id');
    $statusRLB1T3_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB1T3_4)->value('status_id');
    //SB //RECIRCULAÇÃO DA LAVAGEM - BOMBA 3SB DOS TANQUES 3 E 4
    $tag_vibracaoRLB_3SB_T3_4 = "VB 72 200 210 156 000 - 000006";
    $idAtividadeRLB_3SB_T3_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB_3SB_T3_4)->value('id');
    $idAnaliseRLB_3SB_T3_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB_3SB_T3_4)->max('id');
    $idLaudoRLB_3SB_T3_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRLB_3SB_T3_4)->value('id');
    $statusRLB_3SB_T3_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB_3SB_T3_4)->value('status_id');
    //02   //RECIRCULAÇÃO DA LAVAGEM - BOMBA 2 DOS TANQUES 3 E 4
    $tag_vibracaoRLB2T3_4 = "VB 72 200 210 156 000 - 000005";
    $idAtividadeRLB2T3_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB2T3_4)->value('id');
    $idAnaliseRLB2T3_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB2T3_4)->max('id');
    $idLaudoRLB2T3_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRLB2T3_4)->value('id');
    $statusRLB2T3_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB2T3_4)->value('status_id');
    //01 //RECIRCULAÇÃO DA LAVAGEM - BOMBA 1 DO TANQUE 5
    $tag_vibracaoRLB1_T5 = "VB 72 200 210 156 000 - 000007";
    $idAtividadeRLB1_T5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB1_T5)->value('id');
    $idAnaliseRLB1_T5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB1_T5)->max('id');
    $idLaudoRLB1_T5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRLB1_T5)->value('id');
    $statusRLB1_T5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB1_T5)->value('status_id');
    //02 //RECIRCULAÇÃO DA LAVAGEM - BOMBA 2 DO TANQUE 5
    $tag_vibracaoRLB2_T5 = "VB 72 200 210 156 000 - 000008";
    $idAtividadeRLB2_T5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB2_T5)->value('id');
    $idAnaliseRLB2_T5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB2_T5)->max('id');
    $idLaudoRLB2_T5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRLB2_T5)->value('id');
    $statusRLB2_T5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB2_T5)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_decapagem_processo')
      ->with('idLaudoSC_01', $idLaudoSC_01)->with('statusSC_01', $statusSC_01)
      ->with('idLaudoSC_02', $idLaudoSC_02)->with('statusSC_02', $statusSC_02)
      ->with('idLaudoSA_01', $idLaudoSA_01)->with('statusSA_01', $statusSA_01)
      ->with('idLaudoAPD', $idLaudoAPD)->with('statusAPD', $statusAPD)
      ->with('idLaudoB1_SCRUBBER', $idLaudoB1_SCRUBBER)->with('statusB1_SCRUBBER', $statusB1_SCRUBBER)
      ->with('idLaudoB2_SCRUBBER', $idLaudoB2_SCRUBBER)->with('statusB2_SCRUBBER', $statusB2_SCRUBBER)
      ->with('idLaudoEG', $idLaudoEG)->with('statusEG', $statusEG)
      ->with('idLaudoRLB1T1_2', $idLaudoRLB1T1_2)->with('statusRLB1T1_2', $statusRLB1T1_2)
      ->with('idLaudoRLB_3SB', $idLaudoRLB_3SB)->with('statusRLB_3SB', $statusRLB_3SB)
      ->with('idLaudoAPD', $idLaudoAPD)->with('statusAPD', $statusAPD)
      ->with('idLaudoRLB1T3_4', $idLaudoRLB1T3_4)->with('statusRLB1T3_4', $statusRLB1T3_4)
      ->with('idLaudoRLB_3SB_T3_4', $idLaudoRLB_3SB_T3_4)->with('statusRLB_3SB_T3_4', $statusRLB_3SB_T3_4)
      ->with('idLaudoRLB2T3_4', $idLaudoRLB2T3_4)->with('statusRLB2T3_4', $statusRLB2T3_4)
      ->with('idLaudoRLB1_T5', $idLaudoRLB1_T5)->with('statusRLB1_T5', $statusRLB1_T5)
      ->with('idLaudoRLB2_T5', $idLaudoRLB2_T5)->with('statusRLB2_T5', $statusRLB2_T5)
      ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
      ->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
      ->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
      ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
      ->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
      ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
      ->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
      ->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
      ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
      ->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
      ->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
      ->with('pintura_saida_status', $pintura_saida_status)
      ->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
      ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
      ->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
      ->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
      ->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
      ->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function decapagem_saida() {
    //NAVALHA DE AR QUENTE 01
    $tag_vibracaoNAR_Q1 = "VB 72 200 210 162 000 - 000001";
    $idAtividadeNAR_Q1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoNAR_Q1)->value('id');
    $idAnaliseNAR_Q1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_Q1)->max('id');
    $idLaudoNAR_Q1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseNAR_Q1)->value('id');
    $statusNAR_Q1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_Q1)->value('status_id');
    //NAVALHA DE AR QUENTE 02
    $tag_vibracaoNAR_Q2 = "VB 72 200 210 162 000 - 000002";
    $idAtividadeNAR_Q2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoNAR_Q2)->value('id');
    $idAnaliseNAR_Q2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_Q2)->max('id');
    $idLaudoNAR_Q2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseNAR_Q2)->value('id');
    $statusNAR_Q2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_Q2)->value('status_id');
    //NAVALHA DE AR QUENTE 03
    $tag_vibracaoNAR_Q3 = "VB 72 200 210 162 000 - 000003";
    $idAtividadeNAR_Q3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoNAR_Q3)->value('id');
    $idAnaliseNAR_Q3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_Q3)->max('id');
    $idLaudoNAR_Q3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseNAR_Q3)->value('id');
    $statusNAR_Q3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_Q3)->value('status_id');
    //CABECOTE APARADOR 1 //CABEÇOTE APARADOR AC APARADOR DE BORDAS -  ENGRENAGEM 6-8
    $tag_vibracaoCA_E6_8 = "VB 72 200 210 195 000 - 000002";
    $idAtividadeCA_E6_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCA_E6_8)->value('id');
    $idAnaliseCA_E6_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA_E6_8)->max('id');
    $idLaudoCA_E6_8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCA_E6_8)->value('id');
    $statusCA_E6_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA_E6_8)->value('status_id');
    //CABECOTE APARADOR 2 //CABEÇOTE APARADOR AC APARADOR DE BORDAS -  ENGRENAGEM 2-4
    $tag_vibracaoCA_E2_4 = "VB 72 200 210 195 000 - 000001";
    $idAtividadeCA_E2_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCA_E2_4)->value('id');
    $idAnaliseCA_E2_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA_E2_4)->max('id');
    $idLaudoCA_E2_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCA_E2_4)->value('id');
    $statusCA_E2_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA_E2_4)->value('status_id');
    //CABECOTE APARADOR 3 //CABEÇOTE APARADOR OP APARADOR DE BORDAS -  ENGRENAGEM 5-7
    $tag_vibracaoCA_E5_7 = "VB 72 200 210 192 000 - 000001";
    $idAtividadeCA_E5_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCA_E5_7)->value('id');
    $idAnaliseCA_E5_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA_E5_7)->max('id');
    $idLaudoCA_E5_7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCA_E5_7)->value('id');
    $statusCA_E5_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA_E5_7)->value('status_id');
    //CABECOTE APARADOR 4 //CABEÇOTE APARADOR OP APARADOR DE BORDAS -  ENGRENAGEM 1-3
    $tag_vibracaoCA_E1_3 = "VB 72 200 210 192 000 - 000002";
    $idAtividadeCA_E1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCA_E1_3)->value('id');
    $idAnaliseCA_E1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA_E1_3)->max('id');
    $idLaudoCA_E1_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCA_E1_3)->value('id');
    $statusCA_E1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA_E1_3)->value('status_id');
    //2 REDUTOR //ROLO PUXADOR DIRECIONAL - 2º REDUTOR
    $tag_vibracaoRPD_2R = "VB 72 200 210 171 000 - 000002";
    $idAtividadeRPD_2R = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRPD_2R)->value('id');
    $idAnaliseRPD_2R = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPD_2R)->max('id');
    $idLaudoRPD_2R = DB::table('laudos')->where('analise_id', '=', $idAnaliseRPD_2R)->value('id');
    $statusRPD_2R = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPD_2R)->value('status_id');
    //ACIONAMENTO PRINCIPAL ENROLADEIRA //ACIONAMENTO PRINCIPAL ENROLADEIRA - MOTOR E REDUTOR
    $tag_vibracaoAPE_MR = "VB 72 200 210 291 000 - 000001";
    $idAtividadeAPE_MR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPE_MR)->value('id');
    $idAnaliseAPE_MR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_MR)->max('id');
    $idLaudoAPE_MR = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPE_MR)->value('id');
    $statusAPE_MR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_MR)->value('status_id');
    //TENSOR 3 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 03
    $tag_vibracaoART_M3 = "VB 72 200 210 246 000 - 000003";
    $idAtividadeART_M3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoART_M3)->value('id');
    $idAnaliseART_M3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_M3)->max('id');
    $idLaudoART_M3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_M3)->value('id');
    $statusART_M3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_M3)->value('status_id');
    //TENSOR 2 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 02
    $tag_vibracaoART_M2 = "VB 72 200 210 246 000 - 000002";
    $idAtividadeART_M2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoART_M2)->value('id');
    $idAnaliseART_M2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_M2)->max('id');
    $idLaudoART_M2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_M2)->value('id');
    $statusART_M2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_M2)->value('status_id');
    //TENSOR 1 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 01
    $tag_vibracaoART_M1 = "VB 72 200 210 246 000 - 000001";
    $idAtividadeART_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoART_M1)->value('id');
    $idAnaliseART_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_M1)->max('id');
    $idLaudoART_M1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_M1)->value('id');
    $statusART_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_M1)->value('status_id');
    //PICOTADEIRA
    $tag_vibracaoPIC = "VB 72 200 210 234 000 - 000001";
    $idAtividadePIC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoPIC)->value('id');
    $idAnalisePIC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePIC)->max('id');
    $idLaudoPIC = DB::table('laudos')->where('analise_id', '=', $idAnalisePIC)->value('id');
    $statusPIC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePIC)->value('status_id');
    //FIFE PUXADOR DIRECIONADOR //ROLO PUXADOR DIRECIONAL - UNIDADE HIDRÁULICA FIFE
    $tag_vibracaoFIFE_PD = "VB 72 200 210 171 000 - 000003";
    $idAtividadeFIFE_PD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFIFE_PD)->value('id');
    $idAnaliseFIFE_PD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_PD)->max('id');
    $idLaudoFIFE_PD = DB::table('laudos')->where('analise_id', '=', $idAnaliseFIFE_PD)->value('id');
    $statusFIFE_PD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_PD)->value('status_id');
    //ROLO PUXADOR DIRECIONAL - MOTOR E 1º REDUTOR
    $tag_vibracaoRLB2_T5 = "VB 72 200 210 171 000 - 000001";
    $idAtividadeRLB2_T5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB2_T5)->value('id');
    $idAnaliseRLB2_T5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB2_T5)->max('id');
    $idLaudoRLB2_T5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRLB2_T5)->value('id');
    $statusRLB2_T5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB2_T5)->value('status_id');
    //FIFE ENROLADEIRA //CENTRALIZAÇÃO ENROLADEIRA - FIFE BOMBA PRINCIPAL
    $tag_vibracaoCE_FBP = "VB 72 200 210 294 000 - 000001";
    $idAtividadeCE_FBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCE_FBP)->value('id');
    $idAnaliseCE_FBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCE_FBP)->max('id');
    $idLaudoCE_FBP = DB::table('laudos')->where('analise_id', '=', $idAnaliseCE_FBP)->value('id');
    $statusCE_FBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCE_FBP)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA RECIRCULAÇÃO 5
    $tag_vibracaoSH_BR5 = "VB 72 200 210 321 000 - 000005";
    $idAtividadeSH_BR5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_BR5)->value('id');
    $idAnaliseSH_BR5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_BR5)->max('id');
    $idLaudoSH_BR5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSH_BR5)->value('id');
    $statusSH_BR5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_BR5)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA 04
    $tag_vibracaoSH_B4 = "VB 72 200 210 321 000 - 000004";
    $idAtividadeSH_B4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_B4)->value('id');
    $idAnaliseSH_B4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_B4)->max('id');
    $idLaudoSH_B4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSH_B4)->value('id');
    $statusSH_B4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_B4)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA  03
    $tag_vibracaoSH_B3 = "VB 72 200 210 321 000 - 000003";
    $idAtividadeSH_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_B3)->value('id');
    $idAnaliseSH_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_B3)->max('id');
    $idLaudoSH_B3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSH_B3)->value('id');
    $statusSH_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_B3)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA 02
    $tag_vibracaoSH_B2 = "VB 72 200 210 321 000 - 000002";
    $idAtividadeSH_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_B2)->value('id');
    $idAnaliseSH_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_B2)->max('id');
    $idLaudoSH_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSH_B2)->value('id');
    $statusSH_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_B2)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA 01
    $tag_vibracaoSH_B1 = "VB 72 200 210 321 000 - 000001";
    $idAtividadeSH_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_B1)->value('id');
    $idAnaliseSH_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_B1)->max('id');
    $idLaudoSH_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSH_B1)->value('id');
    $statusSH_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_B1)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_decapagem_saida')
        ->with('idLaudoNAR_Q1', $idLaudoNAR_Q1)->with('statusNAR_Q1', $statusNAR_Q1)->with('idLaudoNAR_Q2', $idLaudoNAR_Q2)->with('statusNAR_Q2', $statusNAR_Q2)
        ->with('idLaudoNAR_Q3', $idLaudoNAR_Q3)->with('statusNAR_Q3', $statusNAR_Q3)->with('idLaudoCA_E6_8', $idLaudoCA_E6_8)->with('statusCA_E6_8', $statusCA_E6_8)
        ->with('idLaudoCA_E2_4', $idLaudoCA_E2_4)->with('statusCA_E2_4', $statusCA_E2_4)->with('idLaudoCA_E5_7', $idLaudoCA_E5_7)->with('statusCA_E5_7', $statusCA_E5_7)
        ->with('idLaudoCA_E1_3', $idLaudoCA_E1_3)->with('statusCA_E1_3', $statusCA_E1_3)->with('idLaudoRPD_2R', $idLaudoRPD_2R)->with('statusRPD_2R', $statusRPD_2R)
        ->with('idLaudoAPE_MR', $idLaudoAPE_MR)->with('statusAPE_MR', $statusAPE_MR)->with('idLaudoART_M3', $idLaudoART_M3)->with('statusART_M3', $statusART_M3)
        ->with('idLaudoART_M2', $idLaudoART_M2)->with('statusART_M2', $statusART_M2)->with('idLaudoART_M1', $idLaudoART_M1)->with('statusART_M1', $statusART_M1)
        ->with('idLaudoPIC', $idLaudoPIC)->with('statusPIC', $statusPIC)->with('idLaudoFIFE_PD', $idLaudoFIFE_PD)->with('statusFIFE_PD', $statusFIFE_PD)
        ->with('idLaudoRLB2_T5', $idLaudoRLB2_T5)->with('statusRLB2_T5', $statusRLB2_T5)->with('idLaudoCE_FBP', $idLaudoCE_FBP)->with('statusCE_FBP', $statusCE_FBP)
        ->with('idLaudoSH_BR5', $idLaudoSH_BR5)->with('statusSH_BR5', $statusSH_BR5)->with('idLaudoSH_B4', $idLaudoSH_B4)->with('statusSH_B4', $statusSH_B4)
        ->with('idLaudoSH_B3', $idLaudoSH_B3)->with('statusSH_B3', $statusSH_B3)->with('idLaudoSH_B2', $idLaudoSH_B2)->with('statusSH_B2', $statusSH_B2)
        ->with('idLaudoSH_B1', $idLaudoSH_B1)->with('statusSH_B1', $statusSH_B1)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
        ->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
        ->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
        ->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
        ->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
        ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
        ->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
        ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
        ->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
        ->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
        ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
        ->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
        ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
        ->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
        ->with('pintura_saida_status', $pintura_saida_status)
        ->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
        ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
        ->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
        ->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
        ->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
        ->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function laminador() {
    //ENROLADEIRA 2
    $tag_vibracaoENR_2 = "VB 72 300 310 204 000 - 000001";
    $idAtividadeENR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoENR_2)->value('id');
    $idAnaliseENR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR_2)->max('id');
    $idLaudoENR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseENR_2)->value('id');
    $statusENR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR_2)->value('status_id');
    //SUPORTE ENROLADEIRA 2
    $tag_vibracaoSUP_ENR_2 = "VB 72 300 310 213 000 - 000001";
    $idAtividadeSUP_ENR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSUP_ENR_2)->value('id');
    $idAnaliseSUP_ENR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSUP_ENR_2)->max('id');
    $idLaudoSUP_ENR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSUP_ENR_2)->value('id');
    $statusSUP_ENR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSUP_ENR_2)->value('status_id');
    //ROLO MEDIDOR DE PLAN. ENROLADEIRA 2
    $tag_vibracaoRM_ENR_2 = "VB 72 300 310 189 000 - 000001";
    $idAtividadeRM_ENR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRM_ENR_2)->value('id');
    $idAnaliseRM_ENR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRM_ENR_2)->max('id');
    $idLaudoRM_ENR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRM_ENR_2)->value('id');
    $statusRM_ENR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRM_ENR_2)->value('status_id');
    //MOTOR DE ACIONAMENTO DA CALDEIRA
    $tag_vibracaoMAC = "VB 72 300 310 168 000 - 000001";
    $idAtividadeMAC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoMAC)->value('id');
    $idAnaliseMAC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMAC)->max('id');
    $idLaudoMAC = DB::table('laudos')->where('analise_id', '=', $idAnaliseMAC)->value('id');
    $statusMAC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMAC)->value('status_id');
    //ROLO MED. DE PLANIC. DA ENROLADEIRA 1
    $tag_vibracaoRMPE_1 = "VB 72 300 310 102 000 - 000001";
    $idAtividadeRMPE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRMPE_1)->value('id');
    $idAnaliseRMPE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRMPE_1)->max('id');
    $idLaudoRMPE_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRMPE_1)->value('id');
    $statusRMPE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRMPE_1)->value('status_id');
    //SUPORTE DA ENROLADEIRA 1
    $tag_vibracaoSUP_ENR_1 = "VB 72 300 310 066 000 - 000001";
    $idAtividadeSUP_ENR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSUP_ENR_1)->value('id');
    $idAnaliseSUP_ENR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSUP_ENR_1)->max('id');
    $idLaudoSUP_ENR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSUP_ENR_1)->value('id');
    $statusSUP_ENR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSUP_ENR_1)->value('status_id');
    //ENROLADEIRA 1
    $tag_vibracaoENR_1 = "VB 72 300 310 057 000 - 000001";
    $idAtividadeENR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoENR_1)->value('id');
    $idAnaliseENR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR_1)->max('id');
    $idLaudoENR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseENR_1)->value('id');
    $statusENR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR_1)->value('status_id');
    //ACIONAMENTO MOTOR DA DESENROLADEIRA
    $tag_vibracaoAMD = "VB 72 300 310 021 000 - 000001";
    $idAtividadeAMD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAMD)->value('id');
    $idAnaliseAMD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAMD)->max('id');
    $idLaudoAMD = DB::table('laudos')->where('analise_id', '=', $idAnaliseAMD)->value('id');
    $statusAMD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAMD)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_laminador')
        ->with('idLaudoENR_2', $idLaudoENR_2)->with('statusENR_2', $statusENR_2)
        ->with('idLaudoSUP_ENR_2', $idLaudoSUP_ENR_2)->with('statusSUP_ENR_2', $statusSUP_ENR_2)
        ->with('idLaudoRM_ENR_2', $idLaudoRM_ENR_2)->with('statusRM_ENR_2', $statusRM_ENR_2)
        ->with('idLaudoMAC', $idLaudoMAC)->with('statusMAC', $statusMAC)
        ->with('idLaudoRMPE_1', $idLaudoRMPE_1)->with('statusRMPE_1', $statusRMPE_1)
        ->with('idLaudoSUP_ENR_1', $idLaudoSUP_ENR_1)->with('statusSUP_ENR_1', $statusSUP_ENR_1)
        ->with('idLaudoENR_1', $idLaudoENR_1)->with('statusENR_1', $statusENR_1)
        ->with('idLaudoAMD', $idLaudoAMD)->with('statusAMD', $statusAMD)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
        ->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
        ->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
        ->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
        ->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
        ->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
        ->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
        ->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
        ->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
        ->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
        ->with('galvanizacao_saida_status', $galvanizacao_saida_status)
        ->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
        ->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
        ->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
        ->with('pintura_saida_status', $pintura_saida_status)
        ->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
        ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
        ->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
        ->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
        ->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
        ->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function laminador_porao() {
    //TANQUE DE RETORNO 1 //TANQUE DE EMULSÃO - SISTEMA DE EMULSÃO - BOMBA 01
    $tag_vibracaoTE_SE_B1 = "VB 72 300 310 295 000 - 000001";
    $idAtividadeTE_SE_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTE_SE_B1)->value('id');
    $idAnaliseTE_SE_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTE_SE_B1)->max('id');
    $idLaudoTE_SE_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTE_SE_B1)->value('id');
    $statusTE_SE_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTE_SE_B1)->value('status_id');
    //TANQUE DE EMULSÃO - SISTEMA DE EMULSÃO - BOMBA 02
    $tag_vibracaoTE_SE_B2 = "VB 72 300 310 295 000 - 000002";
    $idAtividadeTE_SE_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTE_SE_B2)->value('id');
    $idAnaliseTE_SE_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTE_SE_B2)->max('id');
    $idLaudoTE_SE_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTE_SE_B2)->value('id');
    $statusTE_SE_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTE_SE_B2)->value('status_id');
    //BAIXA PRESSAO RECIRCULACAO 1 //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - RECIRCULAÇÃO 01
    $tag_vibracaoSHBP_R1 = "VB 72 300 310 267 000 - 000005";
    $idAtividadeSHBP_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_R1)->value('id');
    $idAnaliseSHBP_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_R1)->max('id');
    $idLaudoSHBP_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHBP_R1)->value('id');
    $statusSHBP_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_R1)->value('status_id');
    //BAIXA PRESSAO RECIRCULACAO 2 //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - RECIRCULAÇÃO 02
    $tag_vibracaoSHBP_R2 = "VB 72 300 310 267 000 - 000006";
    $idAtividadeSHBP_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_R2)->value('id');
    $idAnaliseSHBP_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_R2)->max('id');
    $idLaudoSHBP_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHBP_R2)->value('id');
    $statusSHBP_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_R2)->value('status_id');
    //SISTEMA MOS BB01
    $tag_vibracaoSM_BB01 = "VB 72 300 310 270 000 - 000001";
    $idAtividadeSM_BB01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSM_BB01)->value('id');
    $idAnaliseSM_BB01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSM_BB01)->max('id');
    $idLaudoSM_BB01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSM_BB01)->value('id');
    $statusSM_BB01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSM_BB01)->value('status_id');
    //SISTEMA MOS BB02
    $tag_vibracaoSM_BB02 = "VB 72 300 310 270 000 - 000002";
    $idAtividadeSM_BB02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSM_BB02)->value('id');
    $idAnaliseSM_BB02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSM_BB02)->max('id');
    $idLaudoSM_BB02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSM_BB02)->value('id');
    $statusSM_BB02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSM_BB02)->value('status_id');
    //BAIXA PRESSAO 1
    //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - BOMBA 01
    $tag_vibracaoSHBP_B1 = "VB 72 300 310 267 000 - 000001";
    $idAtividadeSHBP_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_B1)->value('id');
    $idAnaliseSHBP_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_B1)->max('id');
    $idLaudoSHBP_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHBP_B1)->value('id');
    $statusSHBP_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_B1)->value('status_id');
    //BAIXA PRESSAO 2
    //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - BOMBA 02
    $tag_vibracaoSHBP_B2 = "VB 72 300 310 267 000 - 000002";
    $idAtividadeSHBP_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_B2)->value('id');
    $idAnaliseSHBP_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_B2)->max('id');
    $idLaudoSHBP_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHBP_B2)->value('id');
    $statusSHBP_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_B2)->value('status_id');
    //BAIXA PRESSAO 3
    //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - BOMBA 03
    $tag_vibracaoSHBP_B3 = "VB 72 300 310 267 000 - 000003";
    $idAtividadeSHBP_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_B3)->value('id');
    $idAnaliseSHBP_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_B3)->max('id');
    $idLaudoSHBP_B3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHBP_B3)->value('id');
    $statusSHBP_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_B3)->value('status_id');
    //BAIXA PRESSAO 4 //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - BOMBA 04
    $tag_vibracaoSHBP_B4 = "VB 72 300 310 267 000 - 000004";
    $idAtividadeSHBP_B4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_B4)->value('id');
    $idAnaliseSHBP_B4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_B4)->max('id');
    $idLaudoSHBP_B4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHBP_B4)->value('id');
    $statusSHBP_B4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_B4)->value('status_id');
    //ALTA PRESSAO RECIRCULACAO 2 //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO - BOMBA 02
    $tag_vibracaoSHAP_B2 = "VB 72 300 310 264 000 - 000004";
    $idAtividadeSHAP_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHAP_B2)->value('id');
    $idAnaliseSHAP_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP_B2)->max('id');
    $idLaudoSHAP_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHAP_B2)->value('id');
    $statusSHAP_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP_B2)->value('status_id');
    //ALTA PRESSAO RECIRCULACAO 1 //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO - BOMBA 01
    $tag_vibracaoSHAP_B1 = "VB 72 300 310 264 000 - 000003";
    $idAtividadeSHAP_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHAP_B1)->value('id');
    $idAnaliseSHAP_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP_B1)->max('id');
    $idLaudoSHAP_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHAP_B1)->value('id');
    $statusSHAP_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP_B1)->value('status_id');
    //SISTEMA ALTA PRESSAO 2 //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO - RECIRCULAÇÃO 02
    $tag_vibracaoSHAP_R2 = "VB 72 300 310 264 000 - 000002";
    $idAtividadeSHAP_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHAP_R2)->value('id');
    $idAnaliseSHAP_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP_R2)->max('id');
    $idLaudoSHAP_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHAP_R2)->value('id');
    $statusSHAP_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP_R2)->value('status_id');
    //SISTEMA ALTA PRESSAO 1 //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO - RECIRCULAÇÃO 01
    $tag_vibracaoSHAP_R1 = "VB 72 300 310 264 000 - 000001";
    $idAtividadeSHAP_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHAP_R1)->value('id');
    $idAnaliseSHAP_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP_R1)->max('id');
    $idLaudoSHAP_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHAP_R1)->value('id');
    $statusSHAP_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP_R1)->value('status_id');
    //SISTEMA ZOS BE01
    $tag_vibracaoSZ_B1 = "VB 72 300 310 273 000 - 000001";
    $idAtividadeSZ_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSZ_B1)->value('id');
    $idAnaliseSZ_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ_B1)->max('id');
    $idLaudoSZ_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSZ_B1)->value('id');
    $statusSZ_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ_B1)->value('status_id');
    //SISTEMA ZOS BE02
    $tag_vibracaoSZ_B2 = "VB 72 300 310 273 000 - 000002";
    $idAtividadeSZ_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSZ_B2)->value('id');
    $idAnaliseSZ_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ_B2)->max('id');
    $idLaudoSZ_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSZ_B2)->value('id');
    $statusSZ_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ_B2)->value('status_id');
    //SISTEMA DE VENTILAÇÃO - OIL CELLAR
    $tag_vibracaoSV_OC = "VB 72 300 310 297 000 - 000001";
    $idAtividadeSV_OC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSV_OC)->value('id');
    $idAnaliseSV_OC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSV_OC)->max('id');
    $idLaudoSV_OC = DB::table('laudos')->where('analise_id', '=', $idAnaliseSV_OC)->value('id');
    $statusSV_OC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSV_OC)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_laminador_porao')
        ->with('idLaudoTE_SE_B1', $idLaudoTE_SE_B1)->with('statusTE_SE_B1', $statusTE_SE_B1)->with('idLaudoTE_SE_B2', $idLaudoTE_SE_B2)->with('statusTE_SE_B2', $statusTE_SE_B2)
        ->with('idLaudoSHBP_R1', $idLaudoSHBP_R1)->with('statusSHBP_R1', $statusSHBP_R1)->with('idLaudoSHBP_R2', $idLaudoSHBP_R2)->with('statusSHBP_R2', $statusSHBP_R2)
        ->with('idLaudoSM_BB01', $idLaudoSM_BB01)->with('statusSM_BB01', $statusSM_BB01)->with('idLaudoSM_BB02', $idLaudoSM_BB02)->with('statusSM_BB02', $statusSM_BB02)
        ->with('idLaudoSHBP_B1', $idLaudoSHBP_B1)->with('statusSHBP_B1', $statusSHBP_B1)->with('idLaudoSHBP_B2', $idLaudoSHBP_B2)->with('statusSHBP_B2', $statusSHBP_B2)
        ->with('idLaudoSHBP_B3', $idLaudoSHBP_B3)->with('statusSHBP_B3', $statusSHBP_B3)->with('idLaudoSHBP_B4', $idLaudoSHBP_B4)->with('statusSHBP_B4', $statusSHBP_B4)
        ->with('idLaudoSHAP_B2', $idLaudoSHAP_B2)->with('statusSHAP_B2', $statusSHAP_B2)->with('idLaudoSHAP_B1', $idLaudoSHAP_B1)->with('statusSHAP_B1', $statusSHAP_B1)
        ->with('idLaudoSHAP_R2', $idLaudoSHAP_R2)->with('statusSHAP_R2', $statusSHAP_R2)->with('idLaudoSHAP_R1', $idLaudoSHAP_R1)->with('statusSHAP_R1', $statusSHAP_R1)
        ->with('idLaudoSZ_B1', $idLaudoSZ_B1)->with('statusSZ_B1', $statusSZ_B1)->with('idLaudoSZ_B2', $idLaudoSZ_B2)->with('statusSZ_B2', $statusSZ_B2)
        ->with('idLaudoSV_OC', $idLaudoSV_OC)->with('statusSV_OC', $statusSV_OC)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function laminador_oficina() {
    //FILTRO A VACUO BB01 //FILTRO A VÁCUO - SISTEMA DE EMULSÃO - BOMBA 01
    $tag_vibracaoFVSE_B1 = "VB 72 300 310 294 000 - 000001";
    $idAtividadeFVSE_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFVSE_B1)->value('id');
    $idAnaliseFVSE_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFVSE_B1)->max('id');
    $idLaudoFVSE_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFVSE_B1)->value('id');
    $statusFVSE_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFVSE_B1)->value('status_id');
    //FILTRO A VACUO BB02 //FILTRO A VÁCUO - SISTEMA DE EMULSÃO - BOMBA 02
    $tag_vibracaoTRSE_B2 = "VB 72 300 310 294 000 - 000002";
    $idAtividadeTRSE_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRSE_B2)->value('id');
    $idAnaliseTRSE_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRSE_B2)->max('id');
    $idLaudoTRSE_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRSE_B2)->value('id');
    $statusTRSE_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRSE_B2)->value('status_id');
    //WS 5 CARRO LONGITUDINAL (EIXO Z)
    $tag_vibracaoCL_EIXO_Z = "VB 72 900 920 018 000 - 000001";
    $idAtividadeCL_EIXO_Z = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCL_EIXO_Z)->value('id');
    $idAnaliseCL_EIXO_Z = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCL_EIXO_Z)->max('id');
    $idLaudoCL_EIXO_Z = DB::table('laudos')->where('analise_id', '=', $idAnaliseCL_EIXO_Z)->value('id');
    $statusCL_EIXO_Z = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCL_EIXO_Z)->value('status_id');
    //WS 5 CABECOTE MOVEL Z1 E C
    $tag_vibracaoCM_Z1_C = "VB 72 900 920 003 000 - 000001";
    $idAtividadeCM_Z1_C = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCM_Z1_C)->value('id');
    $idAnaliseCM_Z1_C = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCM_Z1_C)->max('id');
    $idLaudoCM_Z1_C = DB::table('laudos')->where('analise_id', '=', $idAnaliseCM_Z1_C)->value('id');
    $statusCM_Z1_C = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCM_Z1_C)->value('status_id');
    //WS 3 CABECOTE MOVEL Z
    $tag_vibracaoCM_Z = "VB 72 900 910 006 000 - 000001";
    $idAtividadeCM_Z = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCM_Z)->value('id');
    $idAnaliseCM_Z = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCM_Z)->max('id');
    $idLaudoCM_Z = DB::table('laudos')->where('analise_id', '=', $idAnaliseCM_Z)->value('id');
    $statusCM_Z = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCM_Z)->value('status_id');
    //SISTEMA  DE EMULSAO BB01 //TANQUE DE RETORNO - SISTEMA DE EMULSÃO - BOMBA 01
    $tag_vibracaoTRSE_B1 = "VB 72 300 310 285 000 - 000002";
    $idAtividadeTRSE_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRSE_B1)->value('id');
    $idAnaliseTRSE_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRSE_B1)->max('id');
    $idLaudoTRSE_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRSE_B1)->value('id');
    $statusTRSE_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRSE_B1)->value('status_id');
    //SISTEMA  DE EMULSAO BB02 //TANQUE DE RETORNO - SISTEMA DE EMULSÃO - BOMBA 02
    $tag_vibracaoTRSE_B2 = "VB 72 300 310 285 000 - 000001";
    $idAtividadeTRSE_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRSE_B2)->value('id');
    $idAnaliseTRSE_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRSE_B2)->max('id');
    $idLaudoTRSE_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRSE_B2)->value('id');
    $statusTRSE_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRSE_B2)->value('status_id');
    //SISTEMA  DE EXAUSTAO
    $tag_vibracaoSE = "VB 72 300 310 300 000 - 000001";
    $idAtividadeSE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSE)->value('id');
    $idAnaliseSE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSE)->max('id');
    $idLaudoSE = DB::table('laudos')->where('analise_id', '=', $idAnaliseSE)->value('id');
    $statusSE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSE)->value('status_id');
    //WS 5 CABECOTE FIXO
    $tag_vibracaoCF = "VB 72 900 920 006 000 - 000001";
    $idAtividadeCF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCF)->value('id');
    $idAnaliseCF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCF)->max('id');
    $idLaudoCF = DB::table('laudos')->where('analise_id', '=', $idAnaliseCF)->value('id');
    $statusCF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCF)->value('status_id');
    //WS 5 CABECOTE FIXO EIXO C
    $tag_vibracaoCF_EIXO_C = "VB 72 900 910 003 000 - 000001";
    $idAtividadeCF_EIXO_C = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCF_EIXO_C)->value('id');
    $idAnaliseCF_EIXO_C = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCF_EIXO_C)->max('id');
    $idLaudoCF_EIXO_C = DB::table('laudos')->where('analise_id', '=', $idAnaliseCF_EIXO_C)->value('id');
    $statusCF_EIXO_C = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCF_EIXO_C)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_laminador_oficina')
        ->with('idLaudoFVSE_B1', $idLaudoFVSE_B1)->with('statusFVSE_B1', $statusFVSE_B1)
        ->with('idLaudoTRSE_B2', $idLaudoTRSE_B2)->with('statusTRSE_B2', $statusTRSE_B2)
        ->with('idLaudoCL_EIXO_Z', $idLaudoCL_EIXO_Z)->with('statusCL_EIXO_Z', $statusCL_EIXO_Z)
        ->with('idLaudoCM_Z1_C', $idLaudoCM_Z1_C)->with('statusCM_Z1_C', $statusCM_Z1_C)
        ->with('idLaudoCM_Z', $idLaudoCM_Z)->with('statusCM_Z', $statusCM_Z)
        ->with('idLaudoTRSE_B1', $idLaudoTRSE_B1)->with('statusTRSE_B1', $statusTRSE_B1)
        ->with('idLaudoTRSE_B2', $idLaudoTRSE_B2)->with('statusTRSE_B2', $statusTRSE_B2)
        ->with('idLaudoSE', $idLaudoSE)->with('statusSE', $statusSE)
        ->with('idLaudoCF', $idLaudoCF)->with('statusCF', $statusCF)
        ->with('idLaudoCF_EIXO_C', $idLaudoCF_EIXO_C)->with('statusCF_EIXO_C', $statusCF_EIXO_C)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function utilidades() {
    //GERACAO AR 1
    $tag_vibracaoG1 = "VB 72 700 775 010 000 - 000001";
    $idAtividadeG1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoG1)->value('id');
    $idAnaliseG1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeG1)->max('id');
    $idLaudoG1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseG1)->value('id');
    $statusG1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseG1)->value('status_id');
    //GERACAO AR 2
    $tag_vibracaoG2 = "VB 72 700 775 020 000 - 000001";
    $idAtividadeG2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoG2)->value('id');
    $idAnaliseG2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeG2)->max('id');
    $idLaudoG2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseG2)->value('id');
    $statusG2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseG2)->value('status_id');
    //GERACAO AR 3
    $tag_vibracaoG3 = "VB 72 700 775 030 000 - 000001";
    $idAtividadeG3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoG3)->value('id');
    $idAnaliseG3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeG3)->max('id');
    $idLaudoG3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseG3)->value('id');
    $statusG3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseG3)->value('status_id');
    //GERAÇÃO AR 96 VSD160-FF
    $tag_vibracaoGA_96 = "VB 72 700 775 130 000 - 000001";
    $idAtividadeGA_96 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA_96)->value('id');
    $idAnaliseGA_96 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA_96)->max('id');
    $idLaudoGA_96 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA_96)->value('id');
    $statusGA_96 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA_96)->value('status_id');
    //GERACAO AR 5 - 94
    $tag_vibracaoGA_94 = "VB 72 700 775 050 000 - 000001";
    $idAtividadeGA_94 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA_94)->value('id');
    $idAnaliseGA_94 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA_94)->max('id');
    $idLaudoGA_94 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA_94)->value('id');
    $statusGA_94 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA_94)->value('status_id');
    //GERACAO AR 6 - 95
    $tag_vibracaoGA_95 = "VB 72 700 775 060 000 - 000001";
    $idAtividadeGA_95 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA_95)->value('id');
    $idAnaliseGA_95 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA_95)->max('id');
    $idLaudoGA_95 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA_95)->value('id');
    $statusGA_95 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA_95)->value('status_id');
    //GERACAO AR 7 - 93
    $tag_vibracaoGA_93 = "VB 72 700 775 040 000 - 000001";
    $idAtividadeGA_93 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA_93)->value('id');
    $idAnaliseGA_93 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA_93)->max('id');
    $idLaudoGA_93 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA_93)->value('id');
    $statusGA_93 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA_93)->value('status_id');
    //TORRE DE RESFRIAMENTO 5
    $tag_vibracaoTR_5 = "VB 72 700 725 070 000 - 000005";
    $idAtividadeTR_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_5)->value('id');
    $idAnaliseTR_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_5)->max('id');
    $idLaudoTR_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR_5)->value('id');
    $statusTR_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_5)->value('status_id');
    //TORRE DE RESFRIAMENTO 4
    $tag_vibracaoTR_4 = "VB 72 700 725 070 000 - 000004";
    $idAtividadeTR_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_4)->value('id');
    $idAnaliseTR_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_4)->max('id');
    $idLaudoTR_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR_4)->value('id');
    $statusTR_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_4)->value('status_id');
    //TORRE DE RESFRIAMENTO 3
    $tag_vibracaoTR_3 = "VB 72 700 725 070 000 - 000003";
    $idAtividadeTR_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_3)->value('id');
    $idAnaliseTR_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_3)->max('id');
    $idLaudoTR_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR_3)->value('id');
    $statusTR_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_3)->value('status_id');
    //TORRE DE RESFRIAMENTO 2
    $tag_vibracaoTR_2 = "VB 72 700 725 070 000 - 000002";
    $idAtividadeTR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_2)->value('id');
    $idAnaliseTR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_2)->max('id');
    $idLaudoTR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR_2)->value('id');
    $statusTR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_2)->value('status_id');
    //TORRE DE RESFRIAMENTO 1
    $tag_vibracaoTR_1 = "VB 72 700 725 070 000 - 000001";
    $idAtividadeTR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_1)->value('id');
    $idAnaliseTR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_1)->max('id');
    $idLaudoTR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTR_1)->value('id');
    $statusTR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_1)->value('status_id');
    //SISTEMA DE AERACAO - AERADOR 02
    $tag_vibracaoSAA_02 = "VB 72 700 740 030 000 - 000002";
    $idAtividadeSAA_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAA_02)->value('id');
    $idAnaliseSAA_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAA_02)->max('id');
    $idLaudoSAA_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAA_02)->value('id');
    $statusSAA_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAA_02)->value('status_id');
    //FLOCULAÇÃO - AGITADOR 02
    $tag_vibracaoFA_02 = "VB 72 700 740 120 000 - 000002";
    $idAtividadeFA_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFA_02)->value('id');
    $idAnaliseFA_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFA_02)->max('id');
    $idLaudoFA_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFA_02)->value('id');
    $statusFA_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFA_02)->value('status_id');
    //ULTRAFILTRACAO 1 //B05 ULTRAFILTRAÇÃO 2 MODULOS E VALVULAS - BOMBA B05P11
    $tag_vibracaoULT1_B05P11 = "VB 72 700 745 150 000 - 000002";
    $idAtividadeULT1_B05P11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoULT1_B05P11)->value('id');
    $idAnaliseULT1_B05P11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeULT1_B05P11)->max('id');
    $idLaudoULT1_B05P11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseULT1_B05P11)->value('id');
    $statusULT1_B05P11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseULT1_B05P11)->value('status_id');
    //ULTRAFILTRACAO 2 //B05 ULTRAFILTRAÇÃO 2 MODULOS E VALVULAS - BOMBA B05P01
    $tag_vibracaoULT2_B05P01 = "VB 72 700 745 150 000 - 000001";
    $idAtividadeULT2_B05P01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoULT2_B05P01)->value('id');
    $idAnaliseULT2_B05P01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeULT2_B05P01)->max('id');
    $idLaudoULT2_B05P01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseULT2_B05P01)->value('id');
    $statusULT2_B05P01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseULT2_B05P01)->value('status_id');
    //ULTRAFILTRACAO 3 //B03- ULTRAFILTRAÇÃO 1 MODULOS E VALVULAS - BOMBA B03P11
    $tag_vibracaoULT1_B03P11 = "VB 72 700 745 120 000 - 000002";
    $idAtividadeULT1_B03P11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoULT1_B03P11)->value('id');
    $idAnaliseULT1_B03P11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeULT1_B03P11)->max('id');
    $idLaudoULT1_B03P11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseULT1_B03P11)->value('id');
    $statusULT1_B03P11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseULT1_B03P11)->value('status_id');
    //COAGULACAO 1 //SIST. DE NEUTRALIZAÇÃO PRIM. COAGULAÇÃO - AGITADOR 02
    $tag_vibracaoSNPC_A02 = "VB 72 700 740 105 000 - 000002";
    $idAtividadeSNPC_A02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSNPC_A02)->value('id');
    $idAnaliseSNPC_A02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSNPC_A02)->max('id');
    $idLaudoSNPC_A02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSNPC_A02)->value('id');
    $statusSNPC_A02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSNPC_A02)->value('status_id');
    //COAGULACAO 2 //SIST. DE NEUTRALIZAÇÃO PRIM. COAGULAÇÃO - AGITADOR 01
    $tag_vibracaoSNPC_A1 = "VB 72 700 740 105 000 - 000001";
    $idAtividadeSNPC_A1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSNPC_A1)->value('id');
    $idAnaliseSNPC_A1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSNPC_A1)->max('id');
    $idLaudoSNPC_A1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSNPC_A1)->value('id');
    $statusSNPC_A1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSNPC_A1)->value('status_id');
    //ULTRAFILTRACAO 4 //B03- ULTRAFILTRAÇÃO 1 MODULOS E VALVULAS - BOMBA B03P01
    $tag_vibracaoULT1_B03P01 = "VB 72 700 745 120 000 - 000001";
    $idAtividadeULT1_B03P01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoULT1_B03P01)->value('id');
    $idAnaliseULT1_B03P01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeULT1_B03P01)->max('id');
    $idLaudoULT1_B03P01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseULT1_B03P01)->value('id');
    $statusULT1_B03P01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseULT1_B03P01)->value('status_id');
    //FLOCULACAO 1 //AJUSTE DE PH
    $tag_vibracaoA_PH = "VB 72 700 740 025 000 - 000001";
    $idAtividadeA_PH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoA_PH)->value('id');
    $idAnaliseA_PH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_PH)->max('id');
    $idLaudoA_PH = DB::table('laudos')->where('analise_id', '=', $idAnaliseA_PH)->value('id');
    $statusA_PH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_PH)->value('status_id');
    //FLOCULACAO 2 //SIST. DE FLOCULAÇÃO P/ESPESSADOR - AGITADOR 01
    $tag_vibracaoSFE_A1 = "VB 72 700 740 120 000 - 000001";
    $idAtividadeSFE_A1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSFE_A1)->value('id');
    $idAnaliseSFE_A1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSFE_A1)->max('id');
    $idLaudoSFE_A1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSFE_A1)->value('id');
    $statusSFE_A1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSFE_A1)->value('status_id');
    //SISTEMA DE AERACAO - AERADOR 01
    $tag_vibracaoSAA_01 = "VB 72 700 740 030 000 - 000001";
    $idAtividadeSAA_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAA_01)->value('id');
    $idAnaliseSAA_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAA_01)->max('id');
    $idLaudoSAA_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAA_01)->value('id');
    $statusSAA_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAA_01)->value('status_id');
    //ESPACADOR FLOCULADOR
    $tag_vibracaoEF = "VB 72 700 740 125 000 - 000001";
    $idAtividadeEF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEF)->value('id');
    $idAnaliseEF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEF)->max('id');
    $idLaudoEF = DB::table('laudos')->where('analise_id', '=', $idAnaliseEF)->value('id');
    $statusEF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEF)->value('status_id');
    //CENTRIFUGA
    $tag_vibracaoCENT = "VB 72 700 740 115 000 - 000001";
    $idAtividadeCENT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCENT)->value('id');
    $idAnaliseCENT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCENT)->max('id');
    $idLaudoCENT = DB::table('laudos')->where('analise_id', '=', $idAnaliseCENT)->value('id');
    $statusCENT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCENT)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_utilidades')
        ->with('idLaudoG1', $idLaudoG1)->with('statusG1', $statusG1)
        ->with('idLaudoG2', $idLaudoG2)->with('statusG2', $statusG2)
        ->with('idLaudoG3', $idLaudoG3)->with('statusG3', $statusG3)
        ->with('idLaudoGA_96', $idLaudoGA_96)->with('statusGA_96', $statusGA_96)
        ->with('idLaudoGA_94', $idLaudoGA_94)->with('statusGA_94', $statusGA_94)
        ->with('idLaudoGA_95', $idLaudoGA_95)->with('statusGA_95', $statusGA_95)
        ->with('idLaudoGA_93', $idLaudoGA_93)->with('statusGA_93', $statusGA_93)
        ->with('idLaudoTR_5', $idLaudoTR_5)->with('statusTR_5', $statusTR_5)
        ->with('idLaudoTR_4', $idLaudoTR_4)->with('statusTR_4', $statusTR_4)
        ->with('idLaudoTR_3', $idLaudoTR_3)->with('statusTR_3', $statusTR_3)
        ->with('idLaudoTR_2', $idLaudoTR_2)->with('statusTR_2', $statusTR_2)
        ->with('idLaudoTR_1', $idLaudoTR_1)->with('statusTR_1', $statusTR_1)
        ->with('idLaudoSAA_02', $idLaudoSAA_02)->with('statusSAA_02', $statusSAA_02)
        ->with('idLaudoFA_02', $idLaudoFA_02)->with('statusFA_02', $statusFA_02)
        ->with('idLaudoULT1_B05P11', $idLaudoULT1_B05P11)->with('statusULT1_B05P11', $statusULT1_B05P11)
        ->with('idLaudoULT2_B05P01', $idLaudoULT2_B05P01)->with('statusULT2_B05P01', $statusULT2_B05P01)
        ->with('idLaudoULT1_B03P11', $idLaudoULT1_B03P11)->with('statusULT1_B03P11', $statusULT1_B03P11)
        ->with('idLaudoSNPC_A02', $idLaudoSNPC_A02)->with('statusSNPC_A02', $statusSNPC_A02)
        ->with('idLaudoSNPC_A1', $idLaudoSNPC_A1)->with('statusSNPC_A1', $statusSNPC_A1)
        ->with('idLaudoULT1_B03P01', $idLaudoULT1_B03P01)->with('statusULT1_B03P01', $statusULT1_B03P01)
        ->with('idLaudoA_PH', $idLaudoA_PH)->with('statusA_PH', $statusA_PH)
        ->with('idLaudoSFE_A1', $idLaudoSFE_A1)->with('statusSFE_A1', $statusSFE_A1)
        ->with('idLaudoSAA_01', $idLaudoSAA_01)->with('statusSAA_01', $statusSAA_01)
        ->with('idLaudoEF', $idLaudoEF)->with('statusEF', $statusEF)
        ->with('idLaudoCENT', $idLaudoCENT)->with('statusCENT', $statusCENT)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function utilidades_casa_bombas() {
    //SISTEMA DE BOMBEIO BB01 //SISTEMA DE BOMBEIO P/ GAC BOMBA 01
    $tag_vibracaoGAC_B1 = "VB 72 700 708 040 000 - 000002";
    $idAtividadeGAC_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGAC_B1)->value('id');
    $idAnaliseGAC_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGAC_B1)->max('id');
    $idLaudoGAC_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGAC_B1)->value('id');
    $statusGAC_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGAC_B1)->value('status_id');
    //SISTEMA DE BOMBEIO BB02 //SISTEMA DE BOMBEIO P/ GAC BOMBA 02
    $tag_vibracaoGAC_B2 = "VB 72 700 708 040 000 - 000001";
    $idAtividadeGAC_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGAC_B2)->value('id');
    $idAnaliseGAC_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGAC_B2)->max('id');
    $idLaudoGAC_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGAC_B2)->value('id');
    $statusGAC_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGAC_B2)->value('status_id');
    //SISTEMA DE BOMBEIO BB01 //SISTEMA DE BOMBEIO P/AGUA INDUST. - BOMBA 01
    $tag_vibracaoAI_B1 = "VB 72 700 708 040 000 - 000004";
    $idAtividadeAI_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAI_B1)->value('id');
    $idAnaliseAI_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAI_B1)->max('id');
    $idLaudoAI_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAI_B1)->value('id');
    $statusAI_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAI_B1)->value('status_id');
    //SISTEMA DE BOMBEIO BB02 //SISTEMA DE BOMBEIO P/AGUA INDUST. - BOMBA 02
    $tag_vibracaoAI_B2 = "VB 72 700 708 040 000 - 000003";
    $idAtividadeAI_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAI_B2)->value('id');
    $idAnaliseAI_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAI_B2)->max('id');
    $idLaudoAI_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAI_B2)->value('id');
    $statusAI_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAI_B2)->value('status_id');
    //M5
    $tag_vibracaoM5 = "VB 72 700 785 100 000 - 000005";
    $idAtividadeM5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM5)->value('id');
    $idAnaliseM5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM5)->max('id');
    $idLaudoM5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM5)->value('id');
    $statusM5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM5)->value('status_id');
    //M4
    $tag_vibracaoM4 = "VB 72 700 785 100 000 - 000004";
    $idAtividadeM4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM4)->value('id');
    $idAnaliseM4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM4)->max('id');
    $idLaudoM4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM4)->value('id');
    $statusM4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM4)->value('status_id');
    //M3
    $tag_vibracaoM3 = "VB 72 700 785 100 000 - 000003";
    $idAtividadeM3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM3)->value('id');
    $idAnaliseM3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM3)->max('id');
    $idLaudoM3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM3)->value('id');
    $statusM3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM3)->value('status_id');
    //M6 //GERADOR/BOMBA DIESEL INCENDIO
    $tag_vibracaoM6 = "VB 72 700 785 070 000 - 000001";
    $idAtividadeM6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM6)->value('id');
    $idAnaliseM6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM6)->max('id');
    $idLaudoM6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM6)->value('id');
    $statusM6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM6)->value('status_id');
    //M1 //SISTEMA DE BOMBEIO DE AGUA - BOMBA M1
    $tag_vibracaoM1 = "VB 72 700 785 100 000 - 000001";
    $idAtividadeM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM1)->value('id');
    $idAnaliseM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM1)->max('id');
    $idLaudoM1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM1)->value('id');
    $statusM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM1)->value('status_id');
    //M2 //SISTEMA DE BOMBEIO DE AGUA - BOMBA M2
    $tag_vibracaoM2 = "VB 72 700 785 100 000 - 000002";
    $idAtividadeM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM2)->value('id');
    $idAnaliseM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM2)->max('id');
    $idLaudoM2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseM2)->value('id');
    $statusM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM2)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_utilidades_casa_bombas')
        ->with('idLaudoGAC_B1', $idLaudoGAC_B1)->with('statusGAC_B1', $statusGAC_B1)
        ->with('idLaudoGAC_B2', $idLaudoGAC_B2)->with('statusGAC_B2', $statusGAC_B2)
        ->with('idLaudoAI_B1', $idLaudoAI_B1)->with('statusAI_B1', $statusAI_B1)
        ->with('idLaudoAI_B2', $idLaudoAI_B2)->with('statusAI_B2', $statusAI_B2)
        ->with('idLaudoM5', $idLaudoM5)->with('statusM5', $statusM5)
        ->with('idLaudoM4', $idLaudoM4)->with('statusM4', $statusM4)
        ->with('idLaudoM3', $idLaudoM3)->with('statusM3', $statusM3)
        ->with('idLaudoM6', $idLaudoM6)->with('statusM6', $statusM6)
        ->with('idLaudoM1', $idLaudoM1)->with('statusM1', $statusM1)
        ->with('idLaudoM2', $idLaudoM2)->with('statusM2', $statusM2)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function utilidades_linhas() {
    //GERACAO AR 97 COMPRESSOR N1 CS
    $tag_vibracaoGA97 = "VB 72 700 775 120 000 - 000001";
    $idAtividadeGA97 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA97)->value('id');
    $idAnaliseGA97 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA97)->max('id');
    $idLaudoGA97 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA97)->value('id');
    $statusGA97 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA97)->value('status_id');
    //GERACAO AR 98 COMPRESSOR N2 CS
    $tag_vibracaoGA98 = "VB 72 700 775 080 000 - 000001";
    $idAtividadeGA98 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA98)->value('id');
    $idAnaliseGA98 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA98)->max('id');
    $idLaudoGA98 = DB::table('laudos')->where('analise_id', '=', $idAnaliseGA98)->value('id');
    $statusGA98 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA98)->value('status_id');
    //SISTEMA DE AGUA GELADA CHILLER LPC
    $tag_vibracaoSAGC_LPC = "VB 72 500 510 995 000 - 000001";
    $idAtividadeSAGC_LPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAGC_LPC)->value('id');
    $idAnaliseSAGC_LPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAGC_LPC)->max('id');
    $idLaudoSAGC_LPC = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAGC_LPC)->value('id');
    $statusSAGC_LPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAGC_LPC)->value('status_id');
    //SISTEMA DE AGUA GELADA CHILLER LGC 3
    $tag_vibracaoSAGC_LGC3 = "VB 72 400 410 921 000 - 000003";
    $idAtividadeSAGC_LGC3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAGC_LGC3)->value('id');
    $idAnaliseSAGC_LGC3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAGC_LGC3)->max('id');
    $idLaudoSAGC_LGC3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAGC_LGC3)->value('id');
    $statusSAGC_LGC3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAGC_LGC3)->value('status_id');
    //SISTEMA DE AGUA GELADA CHILLER LGC 2
    $tag_vibracaoSAGC_LGC2 = "VB 72 400 410 921 000 - 000002";
    $idAtividadeSAGC_LGC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAGC_LGC2)->value('id');
    $idAnaliseSAGC_LGC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAGC_LGC2)->max('id');
    $idLaudoSAGC_LGC2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAGC_LGC2)->value('id');
    $statusSAGC_LGC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAGC_LGC2)->value('status_id');
    //SISTEMA DE AGUA GELADA CHILLER LGC 1
    $tag_vibracaoSAGC_LC1 = "VB 72 400 410 921 000 - 000001";
    $idAtividadeSAGC_LC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAGC_LC1)->value('id');
    $idAnaliseSAGC_LC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAGC_LC1)->max('id');
    $idLaudoSAGC_LC1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAGC_LC1)->value('id');
    $statusSAGC_LC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAGC_LC1)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_utilidades_linhas')
        ->with('idLaudoGA97', $idLaudoGA97)->with('statusGA97', $statusGA97)->with('idLaudoGA98', $idLaudoGA98)->with('statusGA98', $statusGA98)
        ->with('idLaudoSAGC_LPC', $idLaudoSAGC_LPC)->with('statusSAGC_LPC', $statusSAGC_LPC)->with('idLaudoSAGC_LGC3', $idLaudoSAGC_LGC3)
        ->with('statusSAGC_LGC3', $statusSAGC_LGC3)->with('idLaudoSAGC_LGC2', $idLaudoSAGC_LGC2)->with('statusSAGC_LGC2', $statusSAGC_LGC2)
        ->with('idLaudoSAGC_LC1', $idLaudoSAGC_LC1)->with('statusSAGC_LC1', $statusSAGC_LC1)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_entrada() {
    //SISTEMA DE EXAUSTAO DE GASES 1
    $tag_vibracaoSEG_1 = "VB 72 400 410 141 000 - 000001";
    $idAtividadeSEG_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEG_1)->value('id');
    $idAnaliseSEG_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEG_1)->max('id');
    $idLaudoSEG_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSEG_1)->value('id');
    $statusSEG_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEG_1)->value('status_id');
    //SISTEMA DE EXAUSTAO DE GASES 2
    $tag_vibracaoSEG_2 = "VB 72 400 410 141 000 - 000002";
    $idAtividadeSEG_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEG_2)->value('id');
    $idAnaliseSEG_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEG_2)->max('id');
    $idLaudoSEG_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSEG_2)->value('id');
    $statusSEG_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEG_2)->value('status_id');
    //UH PRINCIPAL ENTRADA BOMBA 1
    $tag_vibracaoUHP_B1 = "VB 72 400 410 011 000 - 000001";
    $idAtividadeUHP_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_B1)->value('id');
    $idAnaliseUHP_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_B1)->max('id');
    $idLaudoUHP_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHP_B1)->value('id');
    $statusUHP_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_B1)->value('status_id');
    //UH PRINCIPAL ENTRADA BOMBA 2
    $tag_vibracaoUHP_B2 = "VB 72 400 410 011 000 - 000002";
    $idAtividadeUHP_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_B2)->value('id');
    $idAnaliseUHP_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_B2)->max('id');
    $idLaudoUHP_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHP_B2)->value('id');
    $statusUHP_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_B2)->value('status_id');
    //UH PRINCIPAL ENTRADA BOMBA 3
    $tag_vibracaoUHP_B3 = "VB 72 400 410 011 000 - 000003";
    $idAtividadeUHP_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_B3)->value('id');
    $idAnaliseUHP_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_B3)->max('id');
    $idLaudoUHP_B3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHP_B3)->value('id');
    $statusUHP_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_B3)->value('status_id');
    //DESENROLADEIRA 1
    $tag_vibracaoDES_1 = "VB 72 400 410 019 000 - 000001";
    $idAtividadeDES_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDES_1)->value('id');
    $idAnaliseDES_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES_1)->max('id');
    $idLaudoDES_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDES_1)->value('id');
    $statusDES_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES_1)->value('status_id');
    //DESENROLADEIRA 2
    $tag_vibracaoDES_2 = "VB 72 400 410 069 000 - 000001";
    $idAtividadeDES_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDES_2)->value('id');
    $idAnaliseDES_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES_2)->max('id');
    $idLaudoDES_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDES_2)->value('id');
    $statusDES_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES_2)->value('status_id');
    //UNIDADE HIDRÁULICA PRINCIPAL  - RECIRCULAÇÃO
    $tag_vibracaoUHP_REC = "VB 72 400 410 011 000 - 000004";
    $idAtividadeUHP_REC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_REC)->value('id');
    $idAnaliseUHP_REC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_REC)->max('id');
    $idLaudoUHP_REC = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHP_REC)->value('id');
    $statusUHP_REC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_REC)->value('status_id');
    //UH FIFE DESENROLADEIRA N1 //UNIDADE HIDR. FIFE DESENROLADEIRA Nº1 - BOMBA 02
    $tag_vibracaoUHF_N1_B2 = "VB 72 400 410 017 000 - 000002";
    $idAtividadeUHF_N1_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_N1_B2)->value('id');
    $idAnaliseUHF_N1_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_N1_B2)->max('id');
    $idLaudoUHF_N1_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHF_N1_B2)->value('id');
    $statusUHF_N1_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_N1_B2)->value('status_id');
    //UH FIFE DESENROLADEIRA N2 //UNIDADE HIDR. FIFE DESENROLADEIRA Nº2 - BOMBA 02
    $tag_vibracaoUHF_N2_B2 = "VB 72 400 410 067 000 - 000002";
    $idAtividadeUHF_N2_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_N2_B2)->value('id');
    $idAnaliseUHF_N2_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_N2_B2)->max('id');
    $idLaudoUHF_N2_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHF_N2_B2)->value('id');
    $statusUHF_N2_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_N2_B2)->value('status_id');
    //UH FIFE DESENROLADEIRA N1 //UNIDADE HIDR. FIFE DESENROLADEIRA Nº1 - BOMBA 01
    $tag_vibracaoUHF_N1_B1 = "VB 72 400 410 017 000 - 000001";
    $idAtividadeUHF_N1_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_N1_B1)->value('id');
    $idAnaliseUHF_N1_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_N1_B1)->max('id');
    $idLaudoUHF_N1_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHF_N1_B1)->value('id');
    $statusUHF_N1_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_N1_B1)->value('status_id');
    //UH FIFE DESENROLADEIRA N2 //UNIDADE HIDR. FIFE DESENROLADEIRA Nº2 - BOMBA 01
    $tag_vibracaoUHF_N2_B1 = "VB 72 400 410 067 000 - 000001";
    $idAtividadeUHF_N2_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_N2_B1)->value('id');
    $idAnaliseUHF_N2_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_N2_B1)->max('id');
    $idLaudoUHF_N2_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHF_N2_B1)->value('id');
    $statusUHF_N2_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_N2_B1)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_galvanizacao_entrada')
        ->with('idLaudoSEG_1', $idLaudoSEG_1)->with('statusSEG_1', $statusSEG_1)
        ->with('idLaudoSEG_2', $idLaudoSEG_2)->with('statusSEG_2', $statusSEG_2)
        ->with('idLaudoUHP_B1', $idLaudoUHP_B1)->with('statusUHP_B1', $statusUHP_B1)
        ->with('idLaudoUHP_B2', $idLaudoUHP_B2)->with('statusUHP_B2', $statusUHP_B2)
        ->with('idLaudoUHP_B3', $idLaudoUHP_B3)->with('statusUHP_B3', $statusUHP_B3)
        ->with('idLaudoDES_1', $idLaudoDES_1)->with('statusDES_1', $statusDES_1)
        ->with('idLaudoDES_2', $idLaudoDES_2)->with('statusDES_2', $statusDES_2)
        ->with('idLaudoUHP_REC', $idLaudoUHP_REC)->with('statusUHP_REC', $statusUHP_REC)
        ->with('idLaudoUHF_N1_B2', $idLaudoUHF_N1_B2)->with('statusUHF_N1_B2', $statusUHF_N1_B2)
        ->with('idLaudoUHF_N2_B2', $idLaudoUHF_N2_B2)->with('statusUHF_N2_B2', $statusUHF_N2_B2)
        ->with('idLaudoUHF_N1_B1', $idLaudoUHF_N1_B1)->with('statusUHF_N1_B1', $statusUHF_N1_B1)
        ->with('idLaudoUHF_N2_B1', $idLaudoUHF_N2_B1)->with('statusUHF_N2_B1', $statusUHF_N2_B1)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_limpeza_boiler() {
    //SECAGEM TIRA ESCOVAS LIMP STRIP DRIER 2
    $tag_vibracaoSTE_DRIER2 = "VB 72 400 410 203 000 - 000001";
    $idAtividadeSTE_DRIER2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSTE_DRIER2)->value('id');
    $idAnaliseSTE_DRIER2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSTE_DRIER2)->max('id');
    $idLaudoSTE_DRIER2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSTE_DRIER2)->value('id');
    $statusSTE_DRIER2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSTE_DRIER2)->value('status_id');
    //UNIDADE HIDRAULICA FIFE ROLO GUIA ENTRADA FORNO BOMBA 2
    $tag_vibracaoUHF_FB2 = "VB 72 400 410 210 000 - 000002";
    $idAtividadeUHF_FB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_FB2)->value('id');
    $idAnaliseUHF_FB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_FB2)->max('id');
    $idLaudoUHF_FB2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHF_FB2)->value('id');
    $statusUHF_FB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_FB2)->value('status_id');
    //UNIDADE HIDRAULICA FIFE ROLO GUIA ENTRADA FORNO BOMBA 1
    $tag_vibracaoUHF_FB1 = "VB 72 400 410 210 000 - 000001";
    $idAtividadeUHF_FB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_FB1)->value('id');
    $idAnaliseUHF_FB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_FB1)->max('id');
    $idLaudoUHF_FB1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHF_FB1)->value('id');
    $statusUHF_FB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_FB1)->value('status_id');
    // BOILER ENXAGUE CT6
    $tag_vibracaoBE_CT6 = "VB 72 400 410 191 000 - 000001";
    $idAtividadeBE_CT6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBE_CT6)->value('id');
    $idAnaliseBE_CT6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT6)->max('id');
    $idLaudoBE_CT6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBE_CT6)->value('id');
    $statusBE_CT6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT6)->value('status_id');
    //BOILER LIMPEZA ELETRONICA CT3
    $tag_vibracaoBL_CT3 = "VB 72 400 410 187 000 - 000001";
    $idAtividadeBL_CT3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBL_CT3)->value('id');
    $idAnaliseBL_CT3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBL_CT3)->max('id');
    $idLaudoBL_CT3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBL_CT3)->value('id');
    $statusBL_CT3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBL_CT3)->value('status_id');
    //BOILER ESCOVAS CT4
    $tag_vibracaoBE_CT4 = "VB 72 400 410 193 000 - 000001";
    $idAtividadeBE_CT4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBE_CT4)->value('id');
    $idAnaliseBE_CT4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT4)->max('id');
    $idLaudoBE_CT4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBE_CT4)->value('id');
    $statusBE_CT4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT4)->value('status_id');
    //BOILER ENXAGUE CT5
    $tag_vibracaoBE_CT5 = "VB 72 400 410 189 000 - 000001";
    $idAtividadeBE_CT5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBE_CT5)->value('id');
    $idAnaliseBE_CT5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT5)->max('id');
    $idLaudoBE_CT5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBE_CT5)->value('id');
    $statusBE_CT5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT5)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_galvanizacao_limpeza_boiler')
        ->with('idLaudoSTE_DRIER2', $idLaudoSTE_DRIER2)->with('statusSTE_DRIER2', $statusSTE_DRIER2)
        ->with('idLaudoUHF_FB2', $idLaudoUHF_FB2)->with('statusUHF_FB2', $statusUHF_FB2)->with('idLaudoUHF_FB1', $idLaudoUHF_FB1)->with('statusUHF_FB1', $statusUHF_FB1)
        ->with('idLaudoBE_CT6', $idLaudoBE_CT6)->with('statusBE_CT6', $statusBE_CT6)->with('idLaudoBL_CT3', $idLaudoBL_CT3)->with('statusBL_CT3', $statusBL_CT3)
        ->with('idLaudoBE_CT4', $idLaudoBE_CT4)->with('statusBE_CT4', $statusBE_CT4)->with('idLaudoBE_CT5', $idLaudoBE_CT5)->with('statusBE_CT5', $statusBE_CT5)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_limpeza_escovas() {
    //UNIDADE FIFE ROLO GUIA N1 1A - BOMBA 2
    $tag_vibracaoUFRG_N1_B2 = "VB 72 400 410 163 000 - 000002";
    $idAtividadeUFRG_N1_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUFRG_N1_B2)->value('id');
    $idAnaliseUFRG_N1_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFRG_N1_B2)->max('id');
    $idLaudoUFRG_N1_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUFRG_N1_B2)->value('id');
    $statusUFRG_N1_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFRG_N1_B2)->value('status_id');
    //UNIDADE FIFE ROLO GUIA N1 1B - BOMBA 1
    $tag_vibracaoUFRG_N1_B1 = "VB 72 400 410 163 000 - 000001";
    $idAtividadeUFRG_N1_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUFRG_N1_B1)->value('id');
    $idAnaliseUFRG_N1_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFRG_N1_B1)->max('id');
    $idLaudoUFRG_N1_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUFRG_N1_B1)->value('id');
    $statusUFRG_N1_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFRG_N1_B1)->value('status_id');
    //UNIDADE FIFE GUIA 1C - BOMBA 2
    $tag_vibracaoUFRG_1C_B2 = "VB 72 400 410 169 000 - 000002";
    $idAtividadeUFRG_1C_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUFRG_1C_B2)->value('id');
    $idAnaliseUFRG_1C_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFRG_1C_B2)->max('id');
    $idLaudoUFRG_1C_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUFRG_1C_B2)->value('id');
    $statusUFRG_1C_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFRG_1C_B2)->value('status_id');
    //UNIDADE FIFE GUIA 2C - BOMBA 1
    $tag_vibracaoUFG_2C_B1 = "VB 72 400 410 169 000 - 000001";
    $idAtividadeUFG_2C_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUFG_2C_B1)->value('id');
    $idAnaliseUFG_2C_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFG_2C_B1)->max('id');
    $idLaudoUFG_2C_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUFG_2C_B1)->value('id');
    $statusUFG_2C_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFG_2C_B1)->value('status_id');
    //ROLO 2 BRIDLE Nº 1
    $tag_vibracaoR2_BN1 = "VB 72 400 410 158 000 - 000001";
    $idAtividadeR2_BN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BN1)->value('id');
    $idAnaliseR2_BN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BN1)->max('id');
    $idLaudoR2_BN1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BN1)->value('id');
    $statusR2_BN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BN1)->value('status_id');
    //ROLO 1 BRIDLE Nº 1
    $tag_vibracaoR1_BN1 = "VB 72 400 410 157 000 - 000001";
    $idAtividadeR1_BN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BN1)->value('id');
    $idAnaliseR1_BN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BN1)->max('id');
    $idLaudoR1_BN1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BN1)->value('id');
    $statusR1_BN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BN1)->value('status_id');
    //TANQUE DE TRABALHO ESCOVAS DE LIMPEZA 4
    $tag_vibracaoTTEL_4 = "VB 72 400 410 199 000 - 000004";
    $idAtividadeTTEL_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTTEL_4)->value('id');
    $idAnaliseTTEL_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTEL_4)->max('id');
    $idLaudoTTEL_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTTEL_4)->value('id');
    $statusTTEL_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTEL_4)->value('status_id');
    //TANQUE DE TRABALHO ESCOVAS DE LIMPEZA 3
    $tag_vibracaoTTEL_3 = "VB 72 400 410 199 000 - 000003";
    $idAtividadeTTEL_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTTEL_3)->value('id');
    $idAnaliseTTEL_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTEL_3)->max('id');
    $idLaudoTTEL_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTTEL_3)->value('id');
    $statusTTEL_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTEL_3)->value('status_id');
    //TANQUE DE TRABALHO ESCOVAS DE LIMPEZA 2
    $tag_vibracaoTTEL_2 = "VB 72 400 410 199 000 - 000002";
    $idAtividadeTTEL_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTTEL_2 )->value('id');
    $idAnaliseTTEL_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTEL_2 )->max('id');
    $idLaudoTTEL_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTTEL_2 )->value('id');
    $statusTTEL_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTEL_2 )->value('status_id');
    //TANQUE DE TRABALHO ESCOVAS DE LIMPEZA 1
    $tag_vibracaoTTEL_1 = "VB 72 400 410 199 000 - 000001";
    $idAtividadeTTEL_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTTEL_1)->value('id');
    $idAnaliseTTEL_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTEL_1)->max('id');
    $idLaudoTTEL_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTTEL_1)->value('id');
    $statusTTEL_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTEL_1)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_galvanizacao_limpeza_escovas')
        ->with('idLaudoUFRG_N1_B2', $idLaudoUFRG_N1_B2)->with('statusUFRG_N1_B2', $statusUFRG_N1_B2)
        ->with('idLaudoUFRG_N1_B1', $idLaudoUFRG_N1_B1)->with('statusUFRG_N1_B1', $statusUFRG_N1_B1)
        ->with('idLaudoUFRG_1C_B2', $idLaudoUFRG_1C_B2)->with('statusUFRG_1C_B2', $statusUFRG_1C_B2)
        ->with('idLaudoUFG_2C_B1', $idLaudoUFG_2C_B1)->with('statusUFG_2C_B1', $statusUFG_2C_B1)
        ->with('idLaudoR2_BN1', $idLaudoR2_BN1)->with('statusR2_BN1', $statusR2_BN1)
        ->with('idLaudoR1_BN1', $idLaudoR1_BN1)->with('statusR1_BN1', $statusR1_BN1)
        ->with('idLaudoTTEL_4', $idLaudoTTEL_4)->with('statusTTEL_4', $statusTTEL_4)
        ->with('idLaudoTTEL_3', $idLaudoTTEL_3)->with('statusTTEL_3', $statusTTEL_3)
        ->with('idLaudoTTEL_2', $idLaudoTTEL_2)->with('statusTTEL_2', $statusTTEL_2)
        ->with('idLaudoTTEL_1', $idLaudoTTEL_1)->with('statusTTEL_1', $statusTTEL_1)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_forno() {
    //EXAUSTOR TUBE ZONA 5
    $tag_vibracaoETZ_5 = "VB 72 400 410 257 000 - 000004";
    $idAtividadeETZ_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoETZ_5 )->value('id');
    $idAnaliseETZ_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ_5 )->max('id');
    $idLaudoETZ_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETZ_5 )->value('id');
    $statusETZ_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ_5 )->value('status_id');
    //RADIANTE TUBE PILOT
    $tag_vibracaoRTP = "VB 72 400 410 267 000 - 000001";
    $idAtividadeRTP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRTP)->value('id');
    $idAnaliseRTP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRTP)->max('id');
    $idLaudoRTP = DB::table('laudos')->where('analise_id', '=', $idAnaliseRTP)->value('id');
    $statusRTP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRTP)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (DFF WASTE GAS)
    $tag_vibracaoEGF_DFF_WG = "VB 72 400 410 257 000 - 000001";
    $idAtividadeEGF_DFF_WG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF_DFF_WG)->value('id');
    $idAnaliseEGF_DFF_WG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF_DFF_WG)->max('id');
    $idLaudoEGF_DFF_WG = DB::table('laudos')->where('analise_id', '=', $idAnaliseEGF_DFF_WG)->value('id');
    $statusEGF_DFF_WG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF_DFF_WG)->value('status_id');
    //ZONA 1 DFF
    $tag_vibracaoZ1_DFF = "VB 72 400 410 259 000 - 000001";
    $idAtividadeZ1_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoZ1_DFF)->value('id');
    $idAnaliseZ1_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ1_DFF)->max('id');
    $idLaudoZ1_DFF = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ1_DFF)->value('id');
    $statusZ1_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ1_DFF)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (STACK DILUTION AIR)
    $tag_vibracaoEGF = "VB 72 400 410 257 000 - 000002";
    $idAtividadeEGF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF)->value('id');
    $idAnaliseEGF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF)->max('id');
    $idLaudoEGF = DB::table('laudos')->where('analise_id', '=', $idAnaliseEGF)->value('id');
    $statusEGF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF)->value('status_id');
    //SECAGEM TIRA ESCOVAS LIMP STRIP DRIER 2 - CAIXA AQUECEDORA
    $tag_vibracaoSTEL_CA = "VB 72 400 410 203 000 - 000002";
    $idAtividadeSTEL_CA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSTEL_CA)->value('id');
    $idAnaliseSTEL_CA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSTEL_CA)->max('id');
    $idLaudoSTEL_CA = DB::table('laudos')->where('analise_id', '=', $idAnaliseSTEL_CA)->value('id');
    $statusSTEL_CA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSTEL_CA)->value('status_id');
    //ROLO 1 BRIDLE Nº 2
    $tag_vibracaoR1_BRIDLE_N2 = "VB 72 400 410 204 000 - 000001";
    $idAtividadeR1_BRIDLE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_N2)->value('id');
    $idAnaliseR1_BRIDLE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N2)->max('id');
    $idLaudoR1_BRIDLE_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N2)->value('id');
    $statusR1_BRIDLE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N2)->value('status_id');
    //ROLO 2 BRIDLE Nº 2
    $tag_vibracaoR2_BRIDLE_N2 = "VB 72 400 410 205 000 - 000001";
    $idAtividadeR2_BRIDLE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_N2)->value('id');
    $idAnaliseR2_BRIDLE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N2)->max('id');
    $idLaudoR2_BRIDLE_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N2)->value('id');
    $statusR2_BRIDLE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N2)->value('status_id');
    //DEFLETOR 3 DFF
    $tag_vibracaoD3_DFF = "VB 72 400 410 217 000 - 000001";
    $idAtividadeD3_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD3_DFF)->value('id');
    $idAnaliseD3_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD3_DFF)->max('id');
    $idLaudoD3_DFF = DB::table('laudos')->where('analise_id', '=', $idAnaliseD3_DFF)->value('id');
    $statusD3_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD3_DFF)->value('status_id');
    //DEFLETOR 4 TH
    $tag_vibracaoD4_TH = "VB 72 400 410 219 000 - 000001";
    $idAtividadeD4_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD4_TH)->value('id');
    $idAnaliseD4_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD4_TH)->max('id');
    $idLaudoD4_TH = DB::table('laudos')->where('analise_id', '=', $idAnaliseD4_TH)->value('id');
    $statusD4_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD4_TH)->value('status_id');
    //DEFLETOR 6 TH
    $tag_vibracaoD6_TH = "VB 72 400 410 223 000 - 000001";
    $idAtividadeD6_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD6_TH)->value('id');
    $idAnaliseD6_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD6_TH)->max('id');
    $idLaudoD6_TH = DB::table('laudos')->where('analise_id', '=', $idAnaliseD6_TH)->value('id');
    $statusD6_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD6_TH)->value('status_id');
    //DEFLETOR 8 TH
    $tag_vibracaoD8_TH = "VB 72 400 410 227 000 - 000001";
    $idAtividadeD8_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD8_TH)->value('id');
    $idAnaliseD8_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD8_TH)->max('id');
    $idLaudoD8_TH = DB::table('laudos')->where('analise_id', '=', $idAnaliseD8_TH)->value('id');
    $statusD8_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD8_TH)->value('status_id');
    //DEFLETOR 10 TH
    $tag_vibracaoD10_TH = "VB 72 400 410 231 000 - 000001";
    $idAtividadeD10_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD10_TH)->value('id');
    $idAnaliseD10_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD10_TH)->max('id');
    $idLaudoD10_TH = DB::table('laudos')->where('analise_id', '=', $idAnaliseD10_TH)->value('id');
    $statusD10_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD10_TH)->value('status_id');
    //DEFLETOR 11 SC
    $tag_vibracaoD11_SC = "VB 72 400 410 233 000 - 000001";
    $idAtividadeD11_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD11_SC)->value('id');
    $idAnaliseD11_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD11_SC)->max('id');
    $idLaudoD11_SC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD11_SC)->value('id');
    $statusD11_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD11_SC)->value('status_id');
    //DEFLETOR 13 SC
    $tag_vibracaoD13_SC = "VB 72 400 410 237 000 - 000001";
    $idAtividadeD13_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD13_SC)->value('id');
    $idAnaliseD13_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD13_SC)->max('id');
    $idLaudoD13_SC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD13_SC)->value('id');
    $statusD13_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD13_SC)->value('status_id');
    //DEFLETOR 14 JC
    $tag_vibracaoD14_JC = "VB 72 400 410 239 000 - 000001";
    $idAtividadeD14_JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD14_JC)->value('id');
    $idAnaliseD14_JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD14_JC)->max('id');
    $idLaudoD14_JC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD14_JC)->value('id');
    $statusD14_JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD14_JC)->value('status_id');
    //DEFLETOR 16 JC
    $tag_vibracaoD16_JC = "VB 72 400 410 251 000 - 000001";
    $idAtividadeD16_JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD16_JC)->value('id');
    $idAnaliseD16_JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD16_JC)->max('id');
    $idLaudoD16_JC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD16_JC)->value('id');
    $statusD16_JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD16_JC)->value('status_id');
    //ZONA 3 DFF - (DFF PILOTO)
    $tag_vibracaoZ3_DFF = "VB 72 400 410 263 000 - 000002";
    $idAtividadeZ3_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoZ3_DFF)->value('id');
    $idAnaliseZ3_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ3_DFF)->max('id');
    $idLaudoZ3_DFF = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ3_DFF)->value('id');
    $statusZ3_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ3_DFF)->value('status_id');
    //DEFLETOR 17 JC
    $tag_vibracaoD17_JC = "VB 72 400 410 253 000 - 000001";
    $idAtividadeD17_JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD17_JC)->value('id');
    $idAnaliseD17_JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD17_JC)->max('id');
    $idLaudoD17_JC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD17_JC)->value('id');
    $statusD17_JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD17_JC)->value('status_id');
    //DEFLETOR 18 JC
    $tag_vibracaoD18_JC = "VB 72 400 410 255 000 - 000001";
    $idAtividadeD18_JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD18_JC)->value('id');
    $idAnaliseD18_JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD18_JC)->max('id');
    $idLaudoD18_JC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD18_JC)->value('id');
    $statusD18_JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD18_JC)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (ZONA 6 TH RADIANT TUBE SOAK)
    $tag_vibracaoEGF_Z6 = "VB 72 400 410 257 000 - 000005";
    $idAtividadeEGF_Z6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF_Z6)->value('id');
    $idAnaliseEGF_Z6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF_Z6)->max('id');
    $idLaudoEGF_Z6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEGF_Z6)->value('id');
    $statusEGF_Z6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF_Z6)->value('status_id');
    //ZONA 3 DFF - SOPRADOR PRINCIPAL
    $tag_vibracaoZ3_DFF_SP = "VB 72 400 410 263 000 - 000001";
    $idAtividadeZ3_DFF_SP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoZ3_DFF_SP)->value('id');
    $idAnaliseZ3_DFF_SP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ3_DFF_SP)->max('id');
    $idLaudoZ3_DFF_SP = DB::table('laudos')->where('analise_id', '=', $idAnaliseZ3_DFF_SP)->value('id');
    $statusZ3_DFF_SP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ3_DFF_SP)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (ZONA 4 TH RADIANT TUBE)
    $tag_vibracaoEGF_Z4 = "VB 72 400 410 257 000 - 000003";
    $idAtividadeEGF_Z4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF_Z4)->value('id');
    $idAnaliseEGF_Z4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF_Z4)->max('id');
    $idLaudoEGF_Z4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEGF_Z4)->value('id');
    $statusEGF_Z4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF_Z4)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (POST COMBUST)
    $tag_vibracaoEGF_PC = "VB 72 400 410 257 000 - 000006";
    $idAtividadeEGF_PC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF_PC)->value('id');
    $idAnaliseEGF_PC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF_PC)->max('id');
    $idLaudoEGF_PC = DB::table('laudos')->where('analise_id', '=', $idAnaliseEGF_PC)->value('id');
    $statusEGF_PC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF_PC)->value('status_id');
    //UNIDADE HIDR. FIFE ROLO GUIA 15 JC BOMBA 1
    $tag_vibracaoUHF_RG15JC_B1 = "VB 72 400 410 249 000 - 000001";
    $idAtividadeUHF_RG15JC_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_RG15JC_B1)->value('id');
    $idAnaliseUHF_RG15JC_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_RG15JC_B1)->max('id');
    $idLaudoUHF_RG15JC_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHF_RG15JC_B1)->value('id');
    $statusUHF_RG15JC_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_RG15JC_B1)->value('status_id');
    //UNIDADE HIDR. FIFE ROLO GUIA 15 JC BOMBA 2
    $tag_vibracaoUHF_RG15JC_B2 = "VB 72 400 410 249 000 - 000002";
    $idAtividadeUHF_RG15JC_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_RG15JC_B2)->value('id');
    $idAnaliseUHF_RG15JC_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_RG15JC_B2)->max('id');
    $idLaudoUHF_RG15JC_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHF_RG15JC_B2)->value('id');
    $statusUHF_RG15JC_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_RG15JC_B2)->value('status_id');
    //ROLO GUIA DO FORNO 15 JC
    $tag_vibracaoRGF_15JC = "VB 72 400 410 247 000 - 000001";
    $idAtividadeRGF_15JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRGF_15JC)->value('id');
    $idAnaliseRGF_15JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRGF_15JC)->max('id');
    $idLaudoRGF_15JC = DB::table('laudos')->where('analise_id', '=', $idAnaliseRGF_15JC)->value('id');
    $statusRGF_15JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRGF_15JC)->value('status_id');
    //DEFLETOR 12 SC
    $tag_vibracaoD12_SC = "VB 72 400 410 235 000 - 000001";
    $idAtividadeD12_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD12_SC)->value('id');
    $idAnaliseD12_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD12_SC)->max('id');
    $idLaudoD12_SC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD12_SC)->value('id');
    $statusD12_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD12_SC)->value('status_id');
    //DEFLETOR 9 TH
    $tag_vibracaoD9_TH = "VB 72 400 410 229 000 - 000001";
    $idAtividadeD9_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD9_TH)->value('id');
    $idAnaliseD9_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD9_TH)->max('id');
    $idLaudoD9_TH = DB::table('laudos')->where('analise_id', '=', $idAnaliseD9_TH)->value('id');
    $statusD9_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD9_TH)->value('status_id');
    //DEFLETOR 7 TH
    $tag_vibracaoD7_TH = "VB 72 400 410 225 000 - 000001";
    $idAtividadeD7_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD7_TH)->value('id');
    $idAnaliseD7_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD7_TH)->max('id');
    $idLaudoD7_TH = DB::table('laudos')->where('analise_id', '=', $idAnaliseD7_TH)->value('id');
    $statusD7_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD7_TH)->value('status_id');
    //DEFLETOR 5 TH
    $tag_vibracaoD5_TH = "VB 72 400 410 221 000 - 000001";
    $idAtividadeD5_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD5_TH)->value('id');
    $idAnaliseD5_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD5_TH)->max('id');
    $idLaudoD5_TH = DB::table('laudos')->where('analise_id', '=', $idAnaliseD5_TH)->value('id');
    $statusD5_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD5_TH)->value('status_id');
    //DEFLETOR 2 DFF
    $tag_vibracaoD2_DFF = "VB 72 400 410 215 000 - 000001";
    $idAtividadeD2_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD2_DFF)->value('id');
    $idAnaliseD2_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD2_DFF)->max('id');
    $idLaudoD2_DFF = DB::table('laudos')->where('analise_id', '=', $idAnaliseD2_DFF)->value('id');
    $statusD2_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD2_DFF)->value('status_id');
    //DEFLETOR 1 PH
    $tag_vibracaoD1_PH = "VB 72 400 410 213 000 - 000001";
    $idAtividadeD1_PH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD1_PH)->value('id');
    $idAnaliseD1_PH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD1_PH)->max('id');
    $idLaudoD1_PH = DB::table('laudos')->where('analise_id', '=', $idAnaliseD1_PH)->value('id');
    $statusD1_PH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD1_PH)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_galvanizacao_forno')
        ->with('idLaudoETZ_5', $idLaudoETZ_5)->with('statusETZ_5', $statusETZ_5)->with('idLaudoRTP', $idLaudoRTP)->with('statusRTP', $statusRTP)
        ->with('idLaudoEGF_DFF_WG', $idLaudoEGF_DFF_WG)->with('statusEGF_DFF_WG', $statusEGF_DFF_WG)->with('idLaudoZ1_DFF', $idLaudoZ1_DFF)->with('statusZ1_DFF', $statusZ1_DFF)
        ->with('idLaudoEGF', $idLaudoEGF)->with('statusEGF', $statusEGF)->with('idLaudoSTEL_CA', $idLaudoSTEL_CA)->with('statusSTEL_CA', $statusSTEL_CA)
        ->with('idLaudoR1_BRIDLE_N2', $idLaudoR1_BRIDLE_N2)->with('statusR1_BRIDLE_N2', $statusR1_BRIDLE_N2)
        ->with('idLaudoR2_BRIDLE_N2', $idLaudoR2_BRIDLE_N2)->with('statusR2_BRIDLE_N2', $statusR2_BRIDLE_N2)
        ->with('idLaudoD3_DFF', $idLaudoD3_DFF)->with('statusD3_DFF', $statusD3_DFF)->with('idLaudoD4_TH', $idLaudoD4_TH)->with('statusD4_TH', $statusD4_TH)
        ->with('idLaudoD6_TH', $idLaudoD6_TH)->with('statusD6_TH', $statusD6_TH)->with('idLaudoD8_TH', $idLaudoD8_TH)->with('statusD8_TH', $statusD8_TH)
        ->with('idLaudoD10_TH', $idLaudoD10_TH)->with('statusD10_TH', $statusD10_TH)->with('idLaudoD11_SC', $idLaudoD11_SC)->with('statusD11_SC', $statusD11_SC)
        ->with('idLaudoD13_SC', $idLaudoD13_SC)->with('statusD13_SC', $statusD13_SC)->with('idLaudoD14_JC', $idLaudoD14_JC)->with('statusD14_JC', $statusD14_JC)
        ->with('idLaudoD16_JC', $idLaudoD16_JC)->with('statusD16_JC', $statusD16_JC)->with('idLaudoZ3_DFF', $idLaudoZ3_DFF)->with('statusZ3_DFF', $statusZ3_DFF)
        ->with('idLaudoD17_JC', $idLaudoD17_JC)->with('statusD17_JC', $statusD17_JC)->with('idLaudoD18_JC', $idLaudoD18_JC)->with('statusD18_JC', $statusD18_JC)
        ->with('idLaudoEGF_Z6', $idLaudoEGF_Z6)->with('statusEGF_Z6', $statusEGF_Z6)->with('idLaudoZ3_DFF_SP', $idLaudoZ3_DFF_SP)->with('statusZ3_DFF_SP', $statusZ3_DFF_SP)
        ->with('idLaudoEGF_Z4', $idLaudoEGF_Z4)->with('statusEGF_Z4', $statusEGF_Z4)->with('idLaudoEGF_PC', $idLaudoEGF_PC)->with('statusEGF_PC', $statusEGF_PC)
        ->with('idLaudoUHF_RG15JC_B1', $idLaudoUHF_RG15JC_B1)->with('statusUHF_RG15JC_B1', $statusUHF_RG15JC_B1)
        ->with('idLaudoUHF_RG15JC_B2', $idLaudoUHF_RG15JC_B2)->with('statusUHF_RG15JC_B2', $statusUHF_RG15JC_B2)
        ->with('idLaudoRGF_15JC', $idLaudoRGF_15JC)->with('statusRGF_15JC', $statusRGF_15JC)->with('idLaudoD12_SC', $idLaudoD12_SC)->with('statusD12_SC', $statusD12_SC)
        ->with('idLaudoD9_TH', $idLaudoD9_TH)->with('statusD9_TH', $statusD9_TH)->with('idLaudoD7_TH', $idLaudoD7_TH)->with('statusD7_TH', $statusD7_TH)
        ->with('idLaudoD5_TH', $idLaudoD5_TH)->with('statusD5_TH', $statusD5_TH)->with('idLaudoD2_DFF', $idLaudoD2_DFF)->with('statusD2_DFF', $statusD2_DFF)
        ->with('idLaudoD1_PH', $idLaudoD1_PH)->with('statusD1_PH', $statusD1_PH)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_apc_porao() {
    //RESFRIAMENTO SAÍDA NAVALHA PRE-COOLER
    $tag_vibracaoRSN_PC = "VB 72 400 410 311 000 - 000001";
    $idAtividadeRSN_PC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRSN_PC)->value('id');
    $idAnaliseRSN_PC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRSN_PC)->max('id');
    $idLaudoRSN_PC = DB::table('laudos')->where('analise_id', '=', $idAnaliseRSN_PC)->value('id');
    $statusRSN_PC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRSN_PC)->value('status_id');
    //SISTEMA SOPRADOR NAVALHA DE AR - 02
    $tag_vibracaoSSNA_02 = "VB 72 400 410 309 000 - 000002";
    $idAtividadeSSNA_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSSNA_02)->value('id');
    $idAnaliseSSNA_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSNA_02)->max('id');
    $idLaudoSSNA_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSSNA_02)->value('id');
    $statusSSNA_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSNA_02)->value('status_id');
    //SIST RECIRCULAÇÃO E APLICAÇÃO MINIMIZADOR
    $tag_vibracaoSRAM = "VB 72 400 410 313 000 - 000001";
    $idAtividadeSRAM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSRAM)->value('id');
    $idAnaliseSRAM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSRAM)->max('id');
    $idLaudoSRAM = DB::table('laudos')->where('analise_id', '=', $idAnaliseSRAM)->value('id');
    $statusSRAM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSRAM)->value('status_id');
    //SIST EXAUSTÃO E FILTRAGEM MINIMIZADOR
    $tag_vibracaoSEFM = "VB 72 400 410 314 000 - 000001";
    $idAtividadeSEFM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEFM)->value('id');
    $idAnaliseSEFM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEFM)->max('id');
    $idLaudoSEFM = DB::table('laudos')->where('analise_id', '=', $idAnaliseSEFM)->value('id');
    $statusSEFM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEFM)->value('status_id');
    //APC 10
    $tag_vibracaoAPC10 = "VB 72 400 410 315 000 - 000010";
    $idAtividadeAPC10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPC10)->value('id');
    $idAnaliseAPC10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPC10)->max('id');
    $idLaudoAPC10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPC10)->value('id');
    $statusAPC10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPC10)->value('status_id');
    //QUENCH TANK 1 - SECADOR DA TIRA QUENCH TANK - VENTILADOR
    $tag_vibracaoQT1 = "VB 72 400 410 327 000 - 000001";
    $idAtividadeQT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoQT1)->value('id');
    $idAnaliseQT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQT1)->max('id');
    $idLaudoQT1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQT1)->value('id');
    $statusQT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQT1)->value('status_id');
    //QUENCH TANK 2 - SECADOR DA TIRA QUENCH TANK - CAIXA AQUECEDORA
    $tag_vibracaoQT2 = "VB 72 400 410 327 000 - 000002";
    $idAtividadeQT2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoQT2)->value('id');
    $idAnaliseQT2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQT2)->max('id');
    $idLaudoQT2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQT2)->value('id');
    $statusQT2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQT2)->value('status_id');
    //SISTEMA SOPRADOR NAVALHA DE AR - 01
    $tag_vibracaoSSNA_01 = "VB 72 400 410 309 000 - 000001";
    $idAtividadeSSNA_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSSNA_01)->value('id');
    $idAnaliseSSNA_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSNA_01)->max('id');
    $idLaudoSSNA_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSSNA_01)->value('id');
    $statusSSNA_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSNA_01)->value('status_id');
    //POTE ZINCO - REFRIGER. INDUTORES POTE ZINCO - BOMBA 02
    $tag_vibracaoRIPZ_B2 = "VB 72 400 410 303 000 - 000002";
    $idAtividadeRIPZ_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRIPZ_B2)->value('id');
    $idAnaliseRIPZ_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRIPZ_B2)->max('id');
    $idLaudoRIPZ_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRIPZ_B2)->value('id');
    $statusRIPZ_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRIPZ_B2)->value('status_id');
    //UNIDADE HIDRAULICA POTES
    $tag_vibracaoUHP = "VB 72 400 410 284 000 - 000001";
    $idAtividadeUHP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP)->value('id');
    $idAnaliseUHP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP)->max('id');
    $idLaudoUHP = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHP)->value('id');
    $statusUHP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP)->value('status_id');
    //UNIDADE HIDRÁULICA FIFE ROLO GUIA Nº 03 - BOMBA 01
    $tag_vibracaoUHFR_B1 = "VB 72 400 410 331 000 - 000001";
    $idAtividadeUHFR_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFR_B1)->value('id');
    $idAnaliseUHFR_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFR_B1)->max('id');
    $idLaudoUHFR_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFR_B1)->value('id');
    $statusUHFR_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFR_B1)->value('status_id');
    //UNIDADE HIDRÁULICA FIFE ROLO GUIA Nº 03 - BOMBA 02
    $tag_vibracaoUHFR_B2 = "VB 72 400 410 331 000 - 000002";
    $idAtividadeUHFR_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFR_B2)->value('id');
    $idAnaliseUHFR_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFR_B2)->max('id');
    $idLaudoUHFR_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFR_B2)->value('id');
    $statusUHFR_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFR_B2)->value('status_id');
    //REFRIGER. INDUTORES POTE ZINCO - BOMBA 01
    $tag_vibracaoRIPZ_B1 = "VB 72 400 410 303 000 - 000001";
    $idAtividadeRIPZ_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRIPZ_B1)->value('id');
    $idAnaliseRIPZ_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRIPZ_B1)->max('id');
    $idLaudoRIPZ_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRIPZ_B1)->value('id');
    $statusRIPZ_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRIPZ_B1)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 02
    $tag_vibracaoTRP_APC02 = "VB 72 400 410 315 000 - 000002";
    $idAtividadeTRP_APC02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC02)->value('id');
    $idAnaliseTRP_APC02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC02)->max('id');
    $idLaudoTRP_APC02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC02)->value('id');
    $statusTRP_APC02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC02)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 03
    $tag_vibracaoTRP_APC03 = "VB 72 400 410 315 000 - 000003";
    $idAtividadeTRP_APC03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC03)->value('id');
    $idAnaliseTRP_APC03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC03)->max('id');
    $idLaudoTRP_APC03 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC03)->value('id');
    $statusTRP_APC03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC03)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 01
    $tag_vibracaoTRP_APC01 = "VB 72 400 410 315 000 - 000001";
    $idAtividadeTRP_APC01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC01)->value('id');
    $idAnaliseTRP_APC01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC01)->max('id');
    $idLaudoTRP_APC01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC01)->value('id');
    $statusTRP_APC01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC01)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 09
    $tag_vibracaoTRP_APC09 = "VB 72 400 410 315 000 - 000009";
    $idAtividadeTRP_APC09 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC09)->value('id');
    $idAnaliseTRP_APC09 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC09)->max('id');
    $idLaudoTRP_APC09 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC09)->value('id');
    $statusTRP_APC09 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC09)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 04
    $tag_vibracaoTRP_APC04 = "VB 72 400 410 315 000 - 000004";
    $idAtividadeTRP_APC04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC04)->value('id');
    $idAnaliseTRP_APC04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC04)->max('id');
    $idLaudoTRP_APC04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC04)->value('id');
    $statusTRP_APC04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC04)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 08
    $tag_vibracaoTRP_APC08 = "VB 72 400 410 315 000 - 000008";
    $idAtividadeTRP_APC08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC08)->value('id');
    $idAnaliseTRP_APC08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC08)->max('id');
    $idLaudoTRP_APC08 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC08)->value('id');
    $statusTRP_APC08 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC08)->value('status_id');
    //SISTEMA CIRCULACAO DE AR PORAO POTE
    $tag_vibracaoSCAPP = "VB 72 400 410 304 000 - 000001";
    $idAtividadeSCAPP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSCAPP)->value('id');
    $idAnaliseSCAPP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSCAPP)->max('id');
    $idLaudoSCAPP = DB::table('laudos')->where('analise_id', '=', $idAnaliseSCAPP)->value('id');
    $statusSCAPP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSCAPP)->value('status_id');
    //REFRIGER. INDUTORES POTE GALVAL BOMBA 2
    $tag_vibracaoRIPGB2 = "VB 72 400 410 305 000 - 000002";
    $idAtividadeRIPGB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRIPGB2)->value('id');
    $idAnaliseRIPGB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRIPGB2)->max('id');
    $idLaudoRIPGB2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRIPGB2)->value('id');
    $statusRIPGB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRIPGB2)->value('status_id');
    //REFRIGER. INDUTORES POTE GALVAL BOMBA 1
    $tag_vibracaoSIPGB1 = "VB 72 400 410 305 000 - 000001";
    $idAtividadeSIPGB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSIPGB1)->value('id');
    $idAnaliseSIPGB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSIPGB1)->max('id');
    $idLaudoSIPGB1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSIPGB1)->value('id');
    $statusSIPGB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSIPGB1)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 05
    $tag_vibracaoTRP_APC05 = "VB 72 400 410 315 000 - 000005";
    $idAtividadeTRP_APC05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC05)->value('id');
    $idAnaliseTRP_APC05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC05)->max('id');
    $idLaudoTRP_APC05 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC05)->value('id');
    $statusTRP_APC05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC05)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 06
    $tag_vibracaoTRP_APC06 = "VB 72 400 410 315 000 - 000006";
    $idAtividadeTRP_APC06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC06)->value('id');
    $idAnaliseTRP_APC06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC06)->max('id');
    $idLaudoTRP_APC06 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC06)->value('id');
    $statusTRP_APC06 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC06)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 07
    $tag_vibracaoTRP_APC07 = "VB 72 400 410 315 000 - 000007";
    $idAtividadeTRP_APC07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC07)->value('id');
    $idAnaliseTRP_APC07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC07)->max('id');
    $idLaudoTRP_APC07 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRP_APC07)->value('id');
    $statusTRP_APC07 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC07)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_galvanizacao_apc_porao')
        ->with('idLaudoRSN_PC', $idLaudoRSN_PC)->with('statusRSN_PC', $statusRSN_PC)->with('idLaudoSSNA_02', $idLaudoSSNA_02)->with('statusSSNA_02', $statusSSNA_02)
        ->with('idLaudoSRAM', $idLaudoSRAM)->with('statusSRAM', $statusSRAM)->with('idLaudoSEFM', $idLaudoSEFM)->with('statusSEFM', $statusSEFM)
        ->with('idLaudoAPC10', $idLaudoAPC10)->with('statusAPC10', $statusAPC10)->with('idLaudoQT1', $idLaudoQT1)->with('statusQT1', $statusQT1)
        ->with('idLaudoQT2', $idLaudoQT2)->with('statusQT2', $statusQT2)->with('idLaudoSSNA_01', $idLaudoSSNA_01)->with('statusSSNA_01', $statusSSNA_01)
        ->with('idLaudoRIPZ_B2', $idLaudoRIPZ_B2)->with('statusRIPZ_B2', $statusRIPZ_B2)->with('idLaudoUHP', $idLaudoUHP)->with('statusUHP', $statusUHP)
        ->with('idLaudoUHFR_B1', $idLaudoUHFR_B1)->with('statusUHFR_B1', $statusUHFR_B1)->with('idLaudoUHFR_B2', $idLaudoUHFR_B2)->with('statusUHFR_B2', $statusUHFR_B2)
        ->with('idLaudoRIPZ_B1', $idLaudoRIPZ_B1)->with('statusRIPZ_B1', $statusRIPZ_B1)->with('idLaudoTRP_APC02', $idLaudoTRP_APC02)->with('statusTRP_APC02', $statusTRP_APC02)
        ->with('idLaudoTRP_APC03', $idLaudoTRP_APC03)->with('statusTRP_APC03', $statusTRP_APC03)->with('idLaudoTRP_APC01', $idLaudoTRP_APC01)->with('statusTRP_APC01', $statusTRP_APC01)
        ->with('idLaudoTRP_APC09', $idLaudoTRP_APC09)->with('statusTRP_APC09', $statusTRP_APC09)->with('idLaudoTRP_APC04', $idLaudoTRP_APC04)->with('statusTRP_APC04', $statusTRP_APC04)
        ->with('idLaudoTRP_APC08', $idLaudoTRP_APC08)->with('statusTRP_APC08', $statusTRP_APC08)->with('idLaudoSCAPP', $idLaudoSCAPP)->with('statusSCAPP', $statusSCAPP)
        ->with('idLaudoRIPGB2', $idLaudoRIPGB2)->with('statusRIPGB2', $statusRIPGB2)->with('idLaudoSIPGB1', $idLaudoSIPGB1)->with('statusSIPGB1', $statusSIPGB1)
        ->with('idLaudoTRP_APC05', $idLaudoTRP_APC05)->with('statusTRP_APC05', $statusTRP_APC05)->with('idLaudoTRP_APC06', $idLaudoTRP_APC06)->with('statusTRP_APC06', $statusTRP_APC06)
        ->with('idLaudoTRP_APC07', $idLaudoTRP_APC07)->with('statusTRP_APC07', $statusTRP_APC07)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_laminador() {
    //UNIDADE HIDRAULICA LAMINADOR - BOMBA 2
    $tag_vibracaoUHL_B2 = "VB 72 400 410 367 000 - 000002";
    $idAtividadeUHL_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHL_B2)->value('id');
    $idAnaliseUHL_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHL_B2)->max('id');
    $idLaudoUHL_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHL_B2)->value('id');
    $statusUHL_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHL_B2)->value('status_id');
    //CROMO 1 - BOMBA 2
    $tag_vibracaoCB_2 = "VB 72 400 410 402 000 - 000002";
    $idAtividadeCB_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCB_2)->value('id');
    $idAnaliseCB_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_2)->max('id');
    $idLaudoCB_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB_2)->value('id');
    $statusCB_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_2)->value('status_id');
    //CROMO 2 - BOMBA 1
    $tag_vibracaoCB_1 = "VB 72 400 410 402 000 - 000001";
    $idAtividadeCB_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCB_1)->value('id');
    $idAnaliseCB_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_1)->max('id');
    $idLaudoCB_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB_1)->value('id');
    $statusCB_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_1)->value('status_id');
    //UNIDADE HIDRAULICA LAMINADOR 2 - RECIRCULACAO
    $tag_vibracaoUHL_REC = "VB 72 400 410 367 000 - 000003";
    $idAtividadeUHL_REC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHL_REC)->value('id');
    $idAnaliseUHL_REC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHL_REC)->max('id');
    $idLaudoUHL_REC = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHL_REC)->value('id');
    $statusUHL_REC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHL_REC)->value('status_id');
    //UNIDADE HIDRAULICA LAMINADOR 3 - BOMBA 1
    $tag_vibracaoUHL_B1 = "VB 72 400 410 367 000 - 000001";
    $idAtividadeUHL_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHL_B1)->value('id');
    $idAnaliseUHL_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHL_B1)->max('id');
    $idLaudoUHL_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHL_B1)->value('id');
    $statusUHL_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHL_B1)->value('status_id');
    //UNIDADE HIDRÁULICA APLICADOR DE RESINA - BOMBA 02
    $tag_vibracaoUHAR_B2 = "VB 72 400 410 400 000 - 000002";
    $idAtividadeUHAR_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHAR_B2)->value('id');
    $idAnaliseUHAR_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHAR_B2)->max('id');
    $idLaudoUHAR_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHAR_B2)->value('id');
    $statusUHAR_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHAR_B2)->value('status_id');
    //FIFE ACUMULADOR SAIDA E ROLO GUIA 5 - 1
    $tag_vibracaoFASRG_5_1 = "VB 72 400 410 425 000 - 000002";
    $idAtividadeFASRG_5_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFASRG_5_1)->value('id');
    $idAnaliseFASRG_5_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFASRG_5_1)->max('id');
    $idLaudoFASRG_5_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFASRG_5_1)->value('id');
    $statusFASRG_5_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFASRG_5_1)->value('status_id');
    //UNIDADE HIDRÁULICA APLICADOR DE RESINA - BOMBA 01
    $tag_vibracaoUHAR_B1 = "VB 72 400 410 400 000 - 000001";
    $idAtividadeUHAR_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHAR_B1)->value('id');
    $idAnaliseUHAR_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHAR_B1)->max('id');
    $idLaudoUHAR_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHAR_B1)->value('id');
    $statusUHAR_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHAR_B1)->value('status_id');
    //FIFE ACUMULADOR SAIDA E ROLO GUIA 5 - 2 BOMBA 1
    $tag_vibracaoFASRG_5_B1 = "VB 72 400 410 425 000 - 000001";
    $idAtividadeFASRG_5_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFASRG_5_B1)->value('id');
    $idAnaliseFASRG_5_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFASRG_5_B1)->max('id');
    $idLaudoFASRG_5_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFASRG_5_B1)->value('id');
    $statusFASRG_5_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFASRG_5_B1)->value('status_id');
    //ROLO 1 BRIDLE 5B
    $tag_vibracaoR1_BRIDLE_5B = "VB 72 400 410 377 000 - 000001";
    $idAtividadeR1_BRIDLE_5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_5B)->value('id');
    $idAnaliseR1_BRIDLE_5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_5B)->max('id');
    $idLaudoR1_BRIDLE_5B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_5B)->value('id');
    $statusR1_BRIDLE_5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_5B)->value('status_id');
    //ROLO 1 BRIDLE 5A
    $tag_vibracaoR1_BRIDLE_5A = "VB 72 400 410 375 000 - 000001";
    $idAtividadeR1_BRIDLE_5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_5A)->value('id');
    $idAnaliseR1_BRIDLE_5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_5A)->max('id');
    $idLaudoR1_BRIDLE_5A = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_5A)->value('id');
    $statusR1_BRIDLE_5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_5A)->value('status_id');
    //ROLO 2 BRIDLE 5B
    $tag_vibracaoR2_BRIDLE_5B = "VB 72 400 410 378 000 - 000001";
    $idAtividadeR2_BRIDLE_5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_5B)->value('id');
    $idAnaliseR2_BRIDLE_5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_5B)->max('id');
    $idLaudoR2_BRIDLE_5B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_5B)->value('id');
    $statusR2_BRIDLE_5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_5B)->value('status_id');
    //ROLO 2 BRIDLE 5A
    $tag_vibracaoR2_BRIDLE_5A = "VB 72 400 410 376 000 - 000001";
    $idAtividadeR2_BRIDLE_5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_5A)->value('id');
    $idAnaliseR2_BRIDLE_5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_5A)->max('id');
    $idLaudoR2_BRIDLE_5A = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_5A)->value('id');
    $statusR2_BRIDLE_5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_5A)->value('status_id');
    //ROLO 2 BRIDLE Nº 6
    $tag_vibracaoR2_BRIDLE_N6 = "VB 72 400 410 417 000 - 000001";
    $idAtividadeR2_BRIDLE_N6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_N6)->value('id');
    $idAnaliseR2_BRIDLE_N6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N6)->max('id');
    $idLaudoR2_BRIDLE_N6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N6)->value('id');
    $statusR2_BRIDLE_N6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N6)->value('status_id');
    //ROLO 1 BRIDLE Nº 6
    $tag_vibracaoR1_BRIDLE_N6 = "VB 72 400 410 415 000 - 000001";
    $idAtividadeR1_BRIDLE_N6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_N6)->value('id');
    $idAnaliseR1_BRIDLE_N6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N6)->max('id');
    $idLaudoR1_BRIDLE_N6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N6)->value('id');
    $statusR1_BRIDLE_N6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N6)->value('status_id');
    //ROLO 3 BRIDLE Nº 4
    $tag_vibracaoR3_BRIDLE_N4 = "VB 72 400 410 342 000 - 000003";
    $idAtividadeR3_BRIDLE_N4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR3_BRIDLE_N4)->value('id');
    $idAnaliseR3_BRIDLE_N4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR3_BRIDLE_N4)->max('id');
    $idLaudoR3_BRIDLE_N4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR3_BRIDLE_N4)->value('id');
    $statusR3_BRIDLE_N4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR3_BRIDLE_N4)->value('status_id');
    //ROLO 4 BRIDLE Nº 4
    $tag_vibracaoR4_BRIDLE_N4 = "VB 72 400 410 343 000 - 000004";
    $idAtividadeR4_BRIDLE_N4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR4_BRIDLE_N4)->value('id');
    $idAnaliseR4_BRIDLE_N4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR4_BRIDLE_N4)->max('id');
    $idLaudoR4_BRIDLE_N4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR4_BRIDLE_N4)->value('id');
    $statusR4_BRIDLE_N4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR4_BRIDLE_N4)->value('status_id');
    //ROLO 1 BRIDLE Nº 4
    $tag_vibracaoR1_BRIDLE_N4 = "VB 72 400 410 339 000 - 000001";
    $idAtividadeR1_BRIDLE_N4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_N4)->value('id');
    $idAnaliseR1_BRIDLE_N4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N4)->max('id');
    $idLaudoR1_BRIDLE_N4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N4)->value('id');
    $statusR1_BRIDLE_N4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N4)->value('status_id');
    //ROLO 2 BRIDLE Nº 4
    $tag_vibracaoR2_BRIDLE_N4 = "VB 72 400 410 340 000 - 000002";
    $idAtividadeR2_BRIDLE_N4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_N4)->value('id');
    $idAnaliseR2_BRIDLE_N4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N4)->max('id');
    $idLaudoR2_BRIDLE_N4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N4)->value('id');
    $statusR2_BRIDLE_N4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N4)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_galvanizacao_laminador')
        ->with('idLaudoUHL_B2', $idLaudoUHL_B2)->with('statusUHL_B2', $statusUHL_B2)->with('idLaudoCB_2', $idLaudoCB_2)->with('statusCB_2', $statusCB_2)
        ->with('idLaudoCB_1', $idLaudoCB_1)->with('statusCB_1', $statusCB_1)->with('idLaudoUHL_REC', $idLaudoUHL_REC)->with('statusUHL_REC', $statusUHL_REC)
        ->with('idLaudoUHL_B1', $idLaudoUHL_B1)->with('statusUHL_B1', $statusUHL_B1)->with('idLaudoUHAR_B2', $idLaudoUHAR_B2)->with('statusUHAR_B2', $statusUHAR_B2)
        ->with('idLaudoFASRG_5_1', $idLaudoFASRG_5_1)->with('statusFASRG_5_1', $statusFASRG_5_1)->with('idLaudoUHAR_B1', $idLaudoUHAR_B1)->with('statusUHAR_B1', $statusUHAR_B1)
        ->with('idLaudoFASRG_5_B1', $idLaudoFASRG_5_B1)->with('statusFASRG_5_B1', $statusFASRG_5_B1)->with('idLaudoR1_BRIDLE_5B', $idLaudoR1_BRIDLE_5B)
        ->with('statusR1_BRIDLE_5B', $statusR1_BRIDLE_5B)->with('idLaudoR1_BRIDLE_5A', $idLaudoR1_BRIDLE_5A)->with('statusR1_BRIDLE_5A', $statusR1_BRIDLE_5A)
        ->with('idLaudoR2_BRIDLE_5B', $idLaudoR2_BRIDLE_5B)->with('statusR2_BRIDLE_5B', $statusR2_BRIDLE_5B)->with('idLaudoR2_BRIDLE_5A', $idLaudoR2_BRIDLE_5A)
        ->with('statusR2_BRIDLE_5A', $statusR2_BRIDLE_5A)->with('idLaudoR2_BRIDLE_N6', $idLaudoR2_BRIDLE_N6)->with('statusR2_BRIDLE_N6', $statusR2_BRIDLE_N6)
        ->with('idLaudoR1_BRIDLE_N6', $idLaudoR1_BRIDLE_N6)->with('statusR1_BRIDLE_N6', $statusR1_BRIDLE_N6)->with('idLaudoR3_BRIDLE_N4', $idLaudoR3_BRIDLE_N4)
        ->with('statusR3_BRIDLE_N4', $statusR3_BRIDLE_N4)->with('idLaudoR4_BRIDLE_N4', $idLaudoR4_BRIDLE_N4)->with('statusR4_BRIDLE_N4', $statusR4_BRIDLE_N4)
        ->with('idLaudoR1_BRIDLE_N4', $idLaudoR1_BRIDLE_N4)->with('statusR1_BRIDLE_N4', $statusR1_BRIDLE_N4)->with('idLaudoR2_BRIDLE_N4', $idLaudoR2_BRIDLE_N4)
        ->with('statusR2_BRIDLE_N4', $statusR2_BRIDLE_N4)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function galvanizacao_saida() {
    //SISTEMA EXAUSTAO COATERS
    $tag_vibracaoSEC = "VB 72 400 410 407 000 - 000001";
    $idAtividadeSEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEC)->value('id');
    $idAnaliseSEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEC)->max('id');
    $idLaudoSEC = DB::table('laudos')->where('analise_id', '=', $idAnaliseSEC)->value('id');
    $statusSEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEC)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - BOMBA 04
    $tag_vibracaoUHPS_B1 = "VB 72 400 410 541 000 - 000004";
    $idAtividadeUHPS_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_B1)->value('id');
    $idAnaliseUHPS_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_B1)->max('id');
    $idLaudoUHPS_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHPS_B1)->value('id');
    $statusUHPS_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_B1)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - RECIRCULACAO
    $tag_vibracaoUHPS_REC = "VB 72 400 410 541 000 - 000005";
    $idAtividadeUHPS_REC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_REC)->value('id');
    $idAnaliseUHPS_REC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_REC)->max('id');
    $idLaudoUHPS_REC = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHPS_REC)->value('id');
    $statusUHPS_REC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_REC)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - BOMBA 03
    $tag_vibracaoUHPS_B3 = "VB 72 400 410 541 000 - 000003";
    $idAtividadeUHPS_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_B3)->value('id');
    $idAnaliseUHPS_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_B3)->max('id');
    $idLaudoUHPS_B3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHPS_B3)->value('id');
    $statusUHPS_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_B3)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - BOMBA 02
    $tag_vibracaoUHPS_B4 = "VB 72 400 410 541 000 - 000002";
    $idAtividadeUHPS_B4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_B4)->value('id');
    $idAnaliseUHPS_B4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_B4)->max('id');
    $idLaudoUHPS_B4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHPS_B4)->value('id');
    $statusUHPS_B4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_B4)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - BOMBA 01
    $tag_vibracaoUHPS_B1 = "VB 72 400 410 541 000 - 000001";
    $idAtividadeUHPS_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_B1)->value('id');
    $idAnaliseUHPS_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_B1)->max('id');
    $idLaudoUHPS_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHPS_B1)->value('id');
    $statusUHPS_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_B1)->value('status_id');
    //UNIDADE HIDR. FIFE ENROLADEIRA Nº 01 - BOMBA 02
    $tag_vibracaoUHFE_N1_B2 = "VB 72 400 410 475 000 - 000002";
    $idAtividadeUHFE_N1_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFE_N1_B2)->value('id');
    $idAnaliseUHFE_N1_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N1_B2)->max('id');
    $idLaudoUHFE_N1_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFE_N1_B2)->value('id');
    $statusUHFE_N1_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N1_B2)->value('status_id');
    //UNIDADE HIDR. FIFE ENROLADEIRA Nº 01 - BOMBA 01
    $tag_vibracaoUHFE_N1_B1 = "VB 72 400 410 475 000 - 000001";
    $idAtividadeUHFE_N1_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFE_N1_B1)->value('id');
    $idAnaliseUHFE_N1_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N1_B1)->max('id');
    $idLaudoUHFE_N1_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFE_N1_B1)->value('id');
    $statusUHFE_N1_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N1_B1)->value('status_id');
    //UNIDADE HIDR. FIFE ENROLADEIRA Nº 02 - BOMBA 02
    $tag_vibracaoUHFE_N2_B2 = "VB 72 400 410 499 000 - 000002";
    $idAtividadeUHFE_N2_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFE_N2_B2)->value('id');
    $idAnaliseUHFE_N2_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N2_B2)->max('id');
    $idLaudoUHFE_N2_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFE_N2_B2)->value('id');
    $statusUHFE_N2_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N2_B2)->value('status_id');
    //UNIDADE HIDR. FIFE ENROLADEIRA Nº 02 - BOMBA 01
    $tag_vibracaoUHFE_N2_B1 = "VB 72 400 410 499 000 - 000001";
    $idAtividadeUHFE_N2_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFE_N2_B1)->value('id');
    $idAnaliseUHFE_N2_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N2_B1)->max('id');
    $idLaudoUHFE_N2_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFE_N2_B1)->value('id');
    $statusUHFE_N2_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N2_B1)->value('status_id');
    //SOPRADOR DE COMBUSTÃO TORRE INFRA-RED - COMBUSTÃO
    $tag_vibracaoSCT_COMB = "VB 72 400 410 410 000 - 000001";
    $idAtividadeSCT_COMB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSCT_COMB)->value('id');
    $idAnaliseSCT_COMB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSCT_COMB)->max('id');
    $idLaudoSCT_COMB = DB::table('laudos')->where('analise_id', '=', $idAnaliseSCT_COMB)->value('id');
    $statusSCT_COMB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSCT_COMB)->value('status_id');
    //SISTEMA DE EXAUSTAO INFRA-RED - RESFRIAMENTO
    $tag_vibracaoSEIR_RES = "VB 72 400 410 409 000 - 000002";
    $idAtividadeSEIR_RES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEIR_RES)->value('id');
    $idAnaliseSEIR_RES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEIR_RES)->max('id');
    $idLaudoSEIR_RES = DB::table('laudos')->where('analise_id', '=', $idAnaliseSEIR_RES)->value('id');
    $statusSEIR_RES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEIR_RES)->value('status_id');
    //SISTEMA DE EXAUSTAO INFRA-RED - CAIXA AQUECEDORA
    $tag_vibracaoSE_CA = "VB 72 400 410 409 000 - 000001";
    $idAtividadeSE_CA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSE_CA)->value('id');
    $idAnaliseSE_CA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSE_CA)->max('id');
    $idLaudoSE_CA = DB::table('laudos')->where('analise_id', '=', $idAnaliseSE_CA)->value('id');
    $statusSE_CA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSE_CA)->value('status_id');
    //ROLO 1 BRIDLE Nº 7
    $tag_vibracaoR1_BRIDLE_N7 = "VB 72 400 410 455 000 - 000001";
    $idAtividadeR1_BRIDLE_N7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_N7)->value('id');
    $idAnaliseR1_BRIDLE_N7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N7)->max('id');
    $idLaudoR1_BRIDLE_N7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N7)->value('id');
    $statusR1_BRIDLE_N7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N7)->value('status_id');
    //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº01
    $tag_vibracaoAPE_N1 = "VB 72 400 410 477 000 - 000001";
    $idAtividadeAPE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPE_N1)->value('id');
    $idAnaliseAPE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_N1)->max('id');
    $idLaudoAPE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPE_N1)->value('id');
    $statusAPE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_N1)->value('status_id');
    //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº02
    $tag_vibracaoAPE_N2 = "VB 72 400 410 501 000 - 000001";
    $idAtividadeAPE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPE_N2)->value('id');
    $idAnaliseAPE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_N2)->max('id');
    $idLaudoAPE_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPE_N2)->value('id');
    $statusAPE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_N2)->value('status_id');
    //ROLO 2 BRIDLE Nº 7
    $tag_vibracaoR2_BRIDLE_N7 = "VB 72 400 410 456 000 - 000001";
    $idAtividadeR2_BRIDLE_N7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_N7)->value('id');
    $idAnaliseR2_BRIDLE_N7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N7)->max('id');
    $idLaudoR2_BRIDLE_N7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N7)->value('id');
    $statusR2_BRIDLE_N7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N7)->value('status_id');
    //TORRE RESFRIAMENTO DOS COATERS - SOPRADOR 1
    $tag_vibracaoTRC_SOP1 = "VB 72 400 410 411 000 - 000001";
    $idAtividadeTRC_SOP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRC_SOP1)->value('id');
    $idAnaliseTRC_SOP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRC_SOP1)->max('id');
    $idLaudoTRC_SOP1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRC_SOP1)->value('id');
    $statusTRC_SOP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRC_SOP1)->value('status_id');
    //TORRE RESFRIAMENTO DOS COATERS - SOPRADOR 2
    $tag_vibracaoTRC_SOP2 = "VB 72 400 410 411 000 - 000002";
    $idAtividadeTRC_SOP2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRC_SOP2)->value('id');
    $idAnaliseTRC_SOP2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRC_SOP2)->max('id');
    $idLaudoTRC_SOP2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRC_SOP2)->value('id');
    $statusTRC_SOP2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRC_SOP2)->value('status_id');
    //TORRE RESFRIAMENTO DOS COATERS - SOPRADOR 3
    $tag_vibracaoTRC_SOP3 = "VB 72 400 410 411 000 - 000003";
    $idAtividadeTRC_SOP3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRC_SOP3)->value('id');
    $idAnaliseTRC_SOP3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRC_SOP3)->max('id');
    $idLaudoTRC_SOP3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRC_SOP3)->value('id');
    $statusTRC_SOP3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRC_SOP3)->value('status_id');
    //TORRE RESFRIAMENTO DOS COATERS - SOPRADOR 4
    $tag_vibracaoTRC_SOP4 = "VB 72 400 410 411 000 - 000004";
    $idAtividadeTRC_SOP4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRC_SOP4)->value('id');
    $idAnaliseTRC_SOP4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRC_SOP4)->max('id');
    $idLaudoTRC_SOP4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRC_SOP4)->value('id');
    $statusTRC_SOP4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRC_SOP4)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_galvanizacao_saida')
        ->with('idLaudoSEC', $idLaudoSEC)->with('statusSEC', $statusSEC)->with('idLaudoUHPS_B1', $idLaudoUHPS_B1)->with('statusUHPS_B1', $statusUHPS_B1)
        ->with('idLaudoUHPS_REC', $idLaudoUHPS_REC)->with('statusUHPS_REC', $statusUHPS_REC)->with('idLaudoUHPS_B3', $idLaudoUHPS_B3)->with('statusUHPS_B3', $statusUHPS_B3)
        ->with('idLaudoUHPS_B4', $idLaudoUHPS_B4)->with('statusUHPS_B4', $statusUHPS_B4)->with('idLaudoUHPS_B1', $idLaudoUHPS_B1)->with('statusUHPS_B1', $statusUHPS_B1)
        ->with('idLaudoUHFE_N1_B2', $idLaudoUHFE_N1_B2)->with('statusUHFE_N1_B2', $statusUHFE_N1_B2)->with('idLaudoUHFE_N1_B1', $idLaudoUHFE_N1_B1)->with('statusUHFE_N1_B1', $statusUHFE_N1_B1)
        ->with('idLaudoUHFE_N2_B2', $idLaudoUHFE_N2_B2)->with('statusUHFE_N2_B2', $statusUHFE_N2_B2)->with('idLaudoUHFE_N2_B1', $idLaudoUHFE_N2_B1)->with('statusUHFE_N2_B1', $statusUHFE_N2_B1)
        ->with('idLaudoSCT_COMB', $idLaudoSCT_COMB)->with('statusSCT_COMB', $statusSCT_COMB)->with('idLaudoSEIR_RES', $idLaudoSEIR_RES)->with('statusSEIR_RES', $statusSEIR_RES)
        ->with('idLaudoSE_CA', $idLaudoSE_CA)->with('statusSE_CA', $statusSE_CA)->with('idLaudoR1_BRIDLE_N7', $idLaudoR1_BRIDLE_N7)->with('statusR1_BRIDLE_N7', $statusR1_BRIDLE_N7)
        ->with('idLaudoAPE_N1', $idLaudoAPE_N1)->with('statusAPE_N1', $statusAPE_N1)->with('idLaudoAPE_N2', $idLaudoAPE_N2)->with('statusAPE_N2', $statusAPE_N2)
        ->with('idLaudoR2_BRIDLE_N7', $idLaudoR2_BRIDLE_N7)->with('statusR2_BRIDLE_N7', $statusR2_BRIDLE_N7)->with('idLaudoTRC_SOP1', $idLaudoTRC_SOP1)->with('statusTRC_SOP1', $statusTRC_SOP1)
        ->with('idLaudoTRC_SOP2', $idLaudoTRC_SOP2)->with('statusTRC_SOP2', $statusTRC_SOP2)->with('idLaudoTRC_SOP3', $idLaudoTRC_SOP3)->with('statusTRC_SOP3', $statusTRC_SOP3)
        ->with('idLaudoTRC_SOP4', $idLaudoTRC_SOP4)->with('statusTRC_SOP4', $statusTRC_SOP4)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_entrada() {
    //DESENROLADEIRA 01
    $tag_vibracaoDESENR_01 = "VB 72 500 510 009 000 - 000001";
    $idAtividadeDESENR_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDESENR_01)->value('id');
    $idAnaliseDESENR_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENR_01)->max('id');
    $idLaudoDESENR_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESENR_01)->value('id');
    $statusDESENR_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENR_01)->value('status_id');
    //ROLO PUXADOR 01
    $tag_vibracaoRP_01 = "VB 72 500 510 021 000 - 000001";
    $idAtividadeRP_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRP_01)->value('id');
    $idAnaliseRP_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRP_01)->max('id');
    $idLaudoRP_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRP_01)->value('id');
    $statusRP_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRP_01)->value('status_id');
    //DESENROLADEIRA 2
    $tag_vibracaoDESENR_02 = "VB 72 500 510 031 000 - 000001";
    $idAtividadeDESENR_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDESENR_02)->value('id');
    $idAnaliseDESENR_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENR_02)->max('id');
    $idLaudoDESENR_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESENR_02)->value('id');
    $statusDESENR_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENR_02)->value('status_id');
    //UNIDADE HIDRAULICA DE ENTRADA 2
    $tag_vibracaoUHE_2 = "VB 72 500 510 078 000 - 000002";
    $idAtividadeUHE_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHE_2)->value('id');
    $idAnaliseUHE_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_2)->max('id');
    $idLaudoUHE_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE_2)->value('id');
    $statusUHE_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_2)->value('status_id');
    //UNIDADE HIDRAULICA DE ENTRADA 1
    $tag_vibracaoUHE_1 = "VB 72 500 510 078 000 - 000001";
    $idAtividadeUHE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHE_1)->value('id');
    $idAnaliseUHE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_1)->max('id');
    $idLaudoUHE_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE_1)->value('id');
    $statusUHE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_1)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pintura_entrada')->with('idLaudoDESENR_01', $idLaudoDESENR_01)
        ->with('statusDESENR_01', $statusDESENR_01)->with('idLaudoRP_01', $idLaudoRP_01)->with('statusRP_01', $statusRP_01)
        ->with('idLaudoDESENR_02', $idLaudoDESENR_02)->with('statusDESENR_02', $statusDESENR_02)
        ->with('idLaudoUHE_2', $idLaudoUHE_2)->with('statusUHE_2', $statusUHE_2)->with('idLaudoUHE_1', $idLaudoUHE_1)->with('statusUHE_1', $statusUHE_1)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_processo1() {
    //CONJUNTO TENSOR 02 - ROLO 01
    $tag_vibracaoCT2_R1 = "VB 72 500 510 098 000 - 000001";
    $idAtividadeCT2_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT2_R1)->value('id');
    $idAnaliseCT2_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT2_R1)->max('id');
    $idLaudoCT2_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT2_R1)->value('id');
    $statusCT2_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT2_R1)->value('status_id');
    //CONJUNTO TENSOR 02 - ROLO 02
    $tag_vibracaoCT2_R2 = "VB 72 500 510 098 000 - 000002";
    $idAtividadeCT2_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT2_R2)->value('id');
    $idAnaliseCT2_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT2_R2)->max('id');
    $idLaudoCT2_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT2_R2)->value('id');
    $statusCT2_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT2_R2)->value('status_id');
    //CONJUNTO TENSOR 01 - ROLO 02
    $tag_vibracaoCT1_R2 = "VB 72 500 510 084 000 - 000002";
    $idAtividadeCT1_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT1_R2)->value('id');
    $idAnaliseCT1_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT1_R2)->max('id');
    $idLaudoCT1_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT1_R2)->value('id');
    $statusCT1_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT1_R2)->value('status_id');
    //SISTEMA CORRETOR 02 - BOMBA 01
    $tag_vibracaoSC2_B1 = "VB 72 500 510 096 000 - 000001";
    $idAtividadeSC2_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC2_B1)->value('id');
    $idAnaliseSC2_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC2_B1)->max('id');
    $idLaudoSC2_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC2_B1)->value('id');
    $statusSC2_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC2_B1)->value('status_id');
    //SISTEMA CORRETOR 02 - BOMBA 02
    $tag_vibracaoSC2_B2 = "VB 72 500 510 096 000 - 000002";
    $idAtividadeSC2_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC2_B2)->value('id');
    $idAnaliseSC2_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC2_B2)->max('id');
    $idLaudoSC2_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC2_B2)->value('id');
    $statusSC2_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC2_B2)->value('status_id');
    //CONJUNTO TENSOR 01 - ROLO 01
    $tag_vibracaoCT1_R1 = "VB 72 500 510 084 000 - 000001";
    $idAtividadeCT1_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT1_R1)->value('id');
    $idAnaliseCT1_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT1_R1)->max('id');
    $idLaudoCT1_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT1_R1)->value('id');
    $statusCT1_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT1_R1)->value('status_id');
    //SISTEMA CORRETOR 01 - BOMBA 01
    $tag_vibracaoSC1_B01 = "VB 72 500 510 086 000 - 000001";
    $idAtividadeSC1_B01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC1_B01)->value('id');
    $idAnaliseSC1_B01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC1_B01)->max('id');
    $idLaudoSC1_B01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC1_B01)->value('id');
    $statusSC1_B01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC1_B01)->value('status_id');
    //SISTEMA CORRETOR 01 - BOMBA 02
    $tag_vibracaoSC1_B02 = "VB 72 500 510 086 000 - 000002";
    $idAtividadeSC1_B02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC1_B02)->value('id');
    $idAnaliseSC1_B02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC1_B02)->max('id');
    $idLaudoSC1_B02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC1_B02)->value('id');
    $statusSC1_B02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC1_B02)->value('status_id');
    //SOPRADOR AR QUENTE 01
    $tag_vibracaoSARQ_01 = "VB 72 500 510 082 000 - 000001";
    $idAtividadeSARQ_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSARQ_01)->value('id');
    $idAnaliseSARQ_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSARQ_01)->max('id');
    $idLaudoSARQ_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSARQ_01)->value('id');
    $statusSARQ_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSARQ_01)->value('status_id');
    //LAVADOR DE GASES DO TRATAMENTO QUIMICO
    $tag_vibracaoLGTQ = "VB 72 500 510 150 000 - 000003";
    $idAtividadeLGTQ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLGTQ)->value('id');
    $idAnaliseLGTQ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLGTQ)->max('id');
    $idLaudoLGTQ = DB::table('laudos')->where('analise_id', '=', $idAnaliseLGTQ)->value('id');
    $statusLGTQ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLGTQ)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pintura_processo1')
        ->with('idLaudoCT2_R1', $idLaudoCT2_R1)->with('statusCT2_R1', $statusCT2_R1)->with('idLaudoCT2_R2', $idLaudoCT2_R2)->with('statusCT2_R2', $statusCT2_R2)
        ->with('idLaudoCT1_R2', $idLaudoCT1_R2)->with('statusCT1_R2', $statusCT1_R2)->with('idLaudoSC2_B1', $idLaudoSC2_B1)->with('statusSC2_B1', $statusSC2_B1)
        ->with('idLaudoSC2_B2', $idLaudoSC2_B2)->with('statusSC2_B2', $statusSC2_B2)->with('idLaudoCT1_R1', $idLaudoCT1_R1)->with('statusCT1_R1', $statusCT1_R1)
        ->with('idLaudoSC1_B01', $idLaudoSC1_B01)->with('statusSC1_B01', $statusSC1_B01)->with('idLaudoSC1_B02', $idLaudoSC1_B02)->with('statusSC1_B02', $statusSC1_B02)
        ->with('idLaudoSARQ_01', $idLaudoSARQ_01)->with('statusSARQ_01', $statusSARQ_01)->with('idLaudoLGTQ', $idLaudoLGTQ)->with('statusLGTQ', $statusLGTQ)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_processo2() {
    //SISTEMA CORRETOR 03 - BOMBA 01
    $tag_vibracaoSC3_B1 = "VB 72 500 510 164 000 - 000001";
    $idAtividadeSC3_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC3_B1)->value('id');
    $idAnaliseSC3_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC3_B1)->max('id');
    $idLaudoSC3_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC3_B1)->value('id');
    $statusSC3_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC3_B1)->value('status_id');
    //SISTEMA CORRETOR 03 - BOMBA 02
    $tag_vibracaoSC3_B2 = "VB 72 500 510 164 000 - 000002";
    $idAtividadeSC3_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC3_B2)->value('id');
    $idAnaliseSC3_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC3_B2)->max('id');
    $idLaudoSC3_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC3_B2)->value('id');
    $statusSC3_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC3_B2)->value('status_id');
    //CONJUNTO TENSOR 03 - ROLO 02
    $tag_vibracaoCT3_R2 = "VB 72 500 510 166 000 - 000002";
    $idAtividadeCT3_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT3_R2)->value('id');
    $idAnaliseCT3_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT3_R2)->max('id');
    $idLaudoCT3_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT3_R2)->value('id');
    $statusCT3_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT3_R2)->value('status_id');
    //CONJUNTO TENSOR 03 - ROLO 01
    $tag_vibracaoCT3_R1 = "VB 72 500 510 166 000 - 000001";
    $idAtividadeCT3_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT3_R1)->value('id');
    $idAnaliseCT3_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT3_R1)->max('id');
    $idLaudoCT3_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT3_R1)->value('id');
    $statusCT3_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT3_R1)->value('status_id');
    //SOPRADOR AR QUENTE 02
    $tag_vibracaoSARQ_02 = "VB 72 500 510 148 000 - 000001";
    $idAtividadeSARQ_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSARQ_02)->value('id');
    $idAnaliseSARQ_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSARQ_02)->max('id');
    $idLaudoSARQ_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSARQ_02)->value('id');
    $statusSARQ_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSARQ_02)->value('status_id');
    //SISTEMA CORRETOR 05 - BOMBA 02
    $tag_vibracaoSC5_B2 = "VB 72 500 510 212 000 - 000002";
    $idAtividadeSC5_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC5_B2)->value('id');
    $idAnaliseSC5_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC5_B2)->max('id');
    $idLaudoSC5_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC5_B2)->value('id');
    $statusSC5_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC5_B2)->value('status_id');
    //SISTEMA CORRETOR 05 - BOMBA 01
    $tag_vibracaoSC5_B1 = "VB 72 500 510 212 000 - 000001";
    $idAtividadeSC5_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC5_B1)->value('id');
    $idAnaliseSC5_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC5_B1)->max('id');
    $idLaudoSC5_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC5_B1)->value('id');
    $statusSC5_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC5_B1)->value('status_id');
    //CALDEIRA - BOMBA 01
    $tag_vibracaoCB_01 = "VB 72 500 510 152 000 - 000001";
    $idAtividadeCB_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCB_01)->value('id');
    $idAnaliseCB_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_01)->max('id');
    $idLaudoCB_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB_01)->value('id');
    $statusCB_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_01)->value('status_id');
    //CALDEIRA - BOMBA 02
    $tag_vibracaoCB_02 = "VB 72 500 510 152 000 - 000003";
    $idAtividadeCB_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCB_02)->value('id');
    $idAnaliseCB_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_02)->max('id');
    $idLaudoCB_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB_02)->value('id');
    $statusCB_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_02)->value('status_id');
    //CALDEIRA - EX
    $tag_vibracaoCEX = "VB 72 500 510 152 000 - 000002";
    $idAtividadeCEX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCEX)->value('id');
    $idAnaliseCEX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCEX)->max('id');
    $idLaudoCEX = DB::table('laudos')->where('analise_id', '=', $idAnaliseCEX)->value('id');
    $statusCEX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCEX)->value('status_id');
    //LAVADOR DE GASES DO CROMO - BOMBA 01
    $tag_vibracaoLGC_B1 = "VB 72 500 510 160 000 - 000001";
    $idAtividadeLGC_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLGC_B1)->value('id');
    $idAnaliseLGC_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLGC_B1)->max('id');
    $idLaudoLGC_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseLGC_B1)->value('id');
    $statusLGC_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLGC_B1)->value('status_id');
    //LAVADOR DE GASES DO CROMO - BOMBA 02
    $tag_vibracaoLGC_B2 = "VB 72 500 510 160 000 - 000002";
    $idAtividadeLGC_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLGC_B2)->value('id');
    $idAnaliseLGC_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLGC_B2)->max('id');
    $idLaudoLGC_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseLGC_B2)->value('id');
    $statusLGC_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLGC_B2)->value('status_id');
    //LAVADOR DE GASES DO CROMO - EX
    $tag_vibracaoLGC_EX = "VB 72 500 510 160 000 - 000003";
    $idAtividadeLGC_EX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLGC_EX)->value('id');
    $idAnaliseLGC_EX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLGC_EX)->max('id');
    $idLaudoLGC_EX = DB::table('laudos')->where('analise_id', '=', $idAnaliseLGC_EX)->value('id');
    $statusLGC_EX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLGC_EX)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pintura_processo2')->with('idLaudoSC3_B1', $idLaudoSC3_B1)->with('statusSC3_B1', $statusSC3_B1)
        ->with('idLaudoSC3_B2', $idLaudoSC3_B2)->with('statusSC3_B2', $statusSC3_B2)->with('idLaudoCT3_R2', $idLaudoCT3_R2)->with('statusCT3_R2', $statusCT3_R2)
        ->with('idLaudoCT3_R1', $idLaudoCT3_R1)->with('statusCT3_R1', $statusCT3_R1)->with('idLaudoSARQ_02', $idLaudoSARQ_02)->with('statusSARQ_02', $statusSARQ_02)
        ->with('idLaudoSC5_B2', $idLaudoSC5_B2)->with('statusSC5_B2', $statusSC5_B2)->with('idLaudoSC5_B1', $idLaudoSC5_B1)->with('statusSC5_B1', $statusSC5_B1)
        ->with('idLaudoCB_01', $idLaudoCB_01)->with('statusCB_01', $statusCB_01)->with('idLaudoCB_02', $idLaudoCB_02)->with('statusCB_02', $statusCB_02)
        ->with('idLaudoCEX', $idLaudoCEX)->with('statusCEX', $statusCEX)->with('idLaudoLGC_B1', $idLaudoLGC_B1)->with('statusLGC_B1', $statusLGC_B1)
        ->with('idLaudoLGC_B2', $idLaudoLGC_B2)->with('statusLGC_B2', $statusLGC_B2)->with('idLaudoLGC_EX', $idLaudoLGC_EX)->with('statusLGC_EX', $statusLGC_EX)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_estufas() {
    //SISTEMA CORRETOR 06 - BOMBA 02
    $tag_vibracaoSC6_B2 = "VB 72 500 510 256 000 - 000002";
    $idAtividadeSC6_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC6_B2)->value('id');
    $idAnaliseSC6_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC6_B2)->max('id');
    $idLaudoSC6_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC6_B2)->value('id');
    $statusSC6_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC6_B2)->value('status_id');
    //SISTEMA CORRETOR 06 - BOMBA 01
    $tag_vibracaoSC6_B1 = "VB 72 500 510 256 000 - 000001";
    $idAtividadeSC6_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC6_B1)->value('id');
    $idAnaliseSC6_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC6_B1)->max('id');
    $idLaudoSC6_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC6_B1)->value('id');
    $statusSC6_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC6_B1)->value('status_id');
    //SOPRADOR 02 ESTUFA PRIME ZONA 04
    $tag_vibracaoS2_EPZ4 = "VB 72 500 510 196 000 - 000001";
    $idAtividadeS2_EPZ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_EPZ4)->value('id');
    $idAnaliseS2_EPZ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EPZ4)->max('id');
    $idLaudoS2_EPZ4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EPZ4)->value('id');
    $statusS2_EPZ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EPZ4)->value('status_id');
    //SOPRADOR 01 ESTUFA PRIME ZONA 04
    $tag_vibracaoS1_EPZ4 = "VB 72 500 510 194 000 - 000001";
    $idAtividadeS1_EPZ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_EPZ4)->value('id');
    $idAnaliseS1_EPZ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EPZ4)->max('id');
    $idLaudoS1_EPZ4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EPZ4)->value('id');
    $statusS1_EPZ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EPZ4)->value('status_id');
    //SOPRADOR 02 ESTUFA PRIME ZONA 03
    $tag_vibracaoS2_EPZ3 = "VB 72 500 510 190 000 - 000001";
    $idAtividadeS2_EPZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_EPZ3)->value('id');
    $idAnaliseS2_EPZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EPZ3)->max('id');
    $idLaudoS2_EPZ3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EPZ3)->value('id');
    $statusS2_EPZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EPZ3)->value('status_id');
    //SOPRADOR 01 ESTUFA PRIME ZONA 03
    $tag_vibracaoS1_EPZ3 = "VB 72 500 510 188 000 - 000001";
    $idAtividadeS1_EPZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_EPZ3)->value('id');
    $idAnaliseS1_EPZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EPZ3)->max('id');
    $idLaudoS1_EPZ3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EPZ3)->value('id');
    $statusS1_EPZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EPZ3)->value('status_id');
    //SOPRADOR 02 ESTUFA PRIME ZONA 02
    $tag_vibracaoS2_EPZ2 = "VB 72 500 510 184 000 - 000001";
    $idAtividadeS2_EPZ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_EPZ2)->value('id');
    $idAnaliseS2_EPZ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EPZ2)->max('id');
    $idLaudoS2_EPZ2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EPZ2)->value('id');
    $statusS2_EPZ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EPZ2)->value('status_id');
    //SOPRADOR 01 ESTUFA PRIME ZONA 02
    $tag_vibracaoS1_EPZ2 = "VB 72 500 510 182 000 - 000001";
    $idAtividadeS1_EPZ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_EPZ2)->value('id');
    $idAnaliseS1_EPZ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EPZ2)->max('id');
    $idLaudoS1_EPZ2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EPZ2)->value('id');
    $statusS1_EPZ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EPZ2)->value('status_id');
    //SOPRADOR 02 ESTUFA PRIME ZONA 01
    $tag_vibracaoS2_EPZ1 = "VB 72 500 510 178 000 - 000001";
    $idAtividadeS2_EPZ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_EPZ1)->value('id');
    $idAnaliseS2_EPZ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EPZ1)->max('id');
    $idLaudoS2_EPZ1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EPZ1)->value('id');
    $statusS2_EPZ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EPZ1)->value('status_id');
    //SOPRADOR 01 ESTUFA PRIME ZONA 01
    $tag_vibracaoS1_EPZ1 = "VB 72 500 510 176 000 - 000001";
    $idAtividadeS1_EPZ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_EPZ1)->value('id');
    $idAnaliseS1_EPZ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EPZ1)->max('id');
    $idLaudoS1_EPZ1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EPZ1)->value('id');
    $statusS1_EPZ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EPZ1)->value('status_id');
    //SOPRADOR AR QUENTE 03
    $tag_vibracaoSARQ_3 = "VB 72 500 510 202 000 - 000001";
    $idAtividadeSARQ_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSARQ_3)->value('id');
    $idAnaliseSARQ_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSARQ_3)->max('id');
    $idLaudoSARQ_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSARQ_3)->value('id');
    $statusSARQ_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSARQ_3)->value('status_id');
    //EXAUSTOR DOS ENXAGUES 1 E 2
    $tag_vibracaoEE_1_2 = "VB 72 500 510 248 000 - 000001";
    $idAtividadeEE_1_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEE_1_2)->value('id');
    $idAnaliseEE_1_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEE_1_2)->max('id');
    $idLaudoEE_1_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEE_1_2)->value('id');
    $statusEE_1_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEE_1_2)->value('status_id');
    //SOPRADOR 01 ESTUFA TINTA ZONA 01
    $tag_vibracaoS1_ETZ1 = "VB 72 500 510 222 000 - 000001";
    $idAtividadeS1_ETZ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_ETZ1)->value('id');
    $idAnaliseS1_ETZ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_ETZ1)->max('id');
    $idLaudoS1_ETZ1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_ETZ1)->value('id');
    $statusS1_ETZ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_ETZ1)->value('status_id');
    //SOPRADOR 02 ESTUFA TINTA ZONA 01
    $tag_vibracaoS2_ETZ1 = "VB 72 500 510 224 000 - 000001";
    $idAtividadeS2_ETZ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_ETZ1)->value('id');
    $idAnaliseS2_ETZ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_ETZ1)->max('id');
    $idLaudoS2_ETZ1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_ETZ1)->value('id');
    $statusS2_ETZ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_ETZ1)->value('status_id');
    //SOPRADOR 01 ESTUFA TINTA ZONA 02
    $tag_vibracaoS1_ETZ2 = "VB 72 500 510 228 000 - 000001";
    $idAtividadeS1_ETZ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_ETZ2)->value('id');
    $idAnaliseS1_ETZ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_ETZ2)->max('id');
    $idLaudoS1_ETZ2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_ETZ2)->value('id');
    $statusS1_ETZ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_ETZ2)->value('status_id');
    //SOPRADOR 02 ESTUFA TINTA ZONA 02
    $tag_vibracaoS2_ETZ2 = "VB 72 500 510 230 000 - 000001";
    $idAtividadeS2_ETZ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_ETZ2)->value('id');
    $idAnaliseS2_ETZ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_ETZ2)->max('id');
    $idLaudoS2_ETZ2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_ETZ2)->value('id');
    $statusS2_ETZ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_ETZ2)->value('status_id');
    //SOPRADOR 01 ESTUFA TINTA ZONA 03
    $tag_vibracaoS1_ETZ3 = "VB 72 500 510 234 000 - 000001";
    $idAtividadeS1_ETZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_ETZ3)->value('id');
    $idAnaliseS1_ETZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_ETZ3)->max('id');
    $idLaudoS1_ETZ3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_ETZ3)->value('id');
    $statusS1_ETZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_ETZ3)->value('status_id');
    //SOPRADOR 02 ESTUFA TINTA ZONA 03
    $tag_vibracaoS2_ETZ3 = "VB 72 500 510 236 000 - 000001";
    $idAtividadeS2_ETZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_ETZ3)->value('id');
    $idAnaliseS2_ETZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_ETZ3)->max('id');
    $idLaudoS2_ETZ3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_ETZ3)->value('id');
    $statusS2_ETZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_ETZ3)->value('status_id');
    //SOPRADOR 01 ESTUFA TINTA ZONA 04
    $tag_vibracaoS1_ETZ4 = "VB 72 500 510 240 000 - 000001";
    $idAtividadeS1_ETZ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_ETZ4)->value('id');
    $idAnaliseS1_ETZ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_ETZ4)->max('id');
    $idLaudoS1_ETZ4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_ETZ4)->value('id');
    $statusS1_ETZ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_ETZ4)->value('status_id');
    //SOPRADOR 02 ESTUFA TINTA ZONA 04
    $tag_vibracaoS2_ETZ4 = "VB 72 500 510 242 000 - 000001";
    $idAtividadeS2_ETZ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_ETZ4)->value('id');
    $idAnaliseS2_ETZ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_ETZ4)->max('id');
    $idLaudoS2_ETZ4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_ETZ4)->value('id');
    $statusS2_ETZ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_ETZ4)->value('status_id');
    //EXAUSTOR DO LAMINADOR A QUENTE
    $tag_vibracaoELQ = "VB 72 500 510 246 000 - 000001";
    $idAtividadeELQ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoELQ)->value('id');
    $idAnaliseELQ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELQ)->max('id');
    $idLaudoELQ = DB::table('laudos')->where('analise_id', '=', $idAnaliseELQ)->value('id');
    $statusELQ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELQ)->value('status_id');
    //SOPRADOR AR QUENTE 04
    $tag_vibracaoSARQ_4 = "VB 72 500 510 254 000 - 000001";
    $idAtividadeSARQ_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSARQ_4)->value('id');
    $idAnaliseSARQ_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSARQ_4)->max('id');
    $idLaudoSARQ_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSARQ_4)->value('id');
    $statusSARQ_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSARQ_4)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pintura_estufa')->with('idLaudoSC6_B2', $idLaudoSC6_B2)->with('statusSC6_B2', $statusSC6_B2)
        ->with('idLaudoSC6_B1', $idLaudoSC6_B1)->with('statusSC6_B1', $statusSC6_B1)->with('idLaudoS2_EPZ4', $idLaudoS2_EPZ4)->with('statusS2_EPZ4', $statusS2_EPZ4)
        ->with('idLaudoS1_EPZ4', $idLaudoS1_EPZ4)->with('statusS1_EPZ4', $statusS1_EPZ4)->with('idLaudoS2_EPZ3', $idLaudoS2_EPZ3)->with('statusS2_EPZ3', $statusS2_EPZ3)
        ->with('idLaudoS1_EPZ3', $idLaudoS1_EPZ3)->with('statusS1_EPZ3', $statusS1_EPZ3)->with('idLaudoS2_EPZ2', $idLaudoS2_EPZ2)->with('statusS2_EPZ2', $statusS2_EPZ2)
        ->with('idLaudoS1_EPZ2', $idLaudoS1_EPZ2)->with('statusS1_EPZ2', $statusS1_EPZ2)->with('idLaudoS2_EPZ1', $idLaudoS2_EPZ1)->with('statusS2_EPZ1', $statusS2_EPZ1)
        ->with('idLaudoS1_EPZ1', $idLaudoS1_EPZ1)->with('statusS1_EPZ1', $statusS1_EPZ1)->with('idLaudoSARQ_3', $idLaudoSARQ_3)->with('statusSARQ_3', $statusSARQ_3)
        ->with('idLaudoEE_1_2', $idLaudoEE_1_2)->with('statusEE_1_2', $statusEE_1_2)->with('idLaudoS1_ETZ1', $idLaudoS1_ETZ1)->with('statusS1_ETZ1', $statusS1_ETZ1)
        ->with('idLaudoS2_ETZ1', $idLaudoS2_ETZ1)->with('statusS2_ETZ1', $statusS2_ETZ1)->with('idLaudoS1_ETZ2', $idLaudoS1_ETZ2)->with('statusS1_ETZ2', $statusS1_ETZ2)
        ->with('idLaudoS2_ETZ2', $idLaudoS2_ETZ2)->with('statusS2_ETZ2', $statusS2_ETZ2)->with('idLaudoS1_ETZ3', $idLaudoS1_ETZ3)->with('statusS1_ETZ3', $statusS1_ETZ3)
        ->with('idLaudoS2_ETZ3', $idLaudoS2_ETZ3)->with('statusS2_ETZ3', $statusS2_ETZ3)->with('idLaudoS1_ETZ4', $idLaudoS1_ETZ4)->with('statusS1_ETZ4', $statusS1_ETZ4)
        ->with('idLaudoS2_ETZ4', $idLaudoS2_ETZ4)->with('statusS2_ETZ4', $statusS2_ETZ4)->with('idLaudoELQ', $idLaudoELQ)->with('statusELQ', $statusELQ)
        ->with('idLaudoSARQ_4', $idLaudoSARQ_4)->with('statusSARQ_4', $statusSARQ_4)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_areaExterna() {
    //EXAUSTOR ESTUFA PRIME
    $tag_vibracaoEEP = "VB 72 500 510 334 000 - 000001";
    $idAtividadeEEP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEEP)->value('id');
    $idAnaliseEEP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEEP)->max('id');
    $idLaudoEEP = DB::table('laudos')->where('analise_id', '=', $idAnaliseEEP)->value('id');
    $statusEEP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEEP)->value('status_id');
    //EXAUSTOR ESTUFA TINTA
    $tag_vibracaoEET = "VB 72 500 510 336 000 - 000001";
    $idAtividadeEET = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEET)->value('id');
    $idAnaliseEET = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEET)->max('id');
    $idLaudoEET = DB::table('laudos')->where('analise_id', '=', $idAnaliseEET)->value('id');
    $statusEET = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEET)->value('status_id');
    //SOPRADOR PRINC. INCINERADOR - SUPPLY FAN
    $tag_vibracaoSPI_SF = "VB 72 500 510 328 000 - 000001";
    $idAtividadeSPI_SF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSPI_SF)->value('id');
    $idAnaliseSPI_SF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPI_SF)->max('id');
    $idLaudoSPI_SF = DB::table('laudos')->where('analise_id', '=', $idAnaliseSPI_SF)->value('id');
    $statusSPI_SF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPI_SF)->value('status_id');
    //EXAUST. SALAS APLIC. TINTA - OUTER COTER
    $tag_vibracaoESPT_OC = "VB 72 500 510 330 000 - 000001";
    $idAtividadeESPT_OC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoESPT_OC)->value('id');
    $idAnaliseESPT_OC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESPT_OC)->max('id');
    $idLaudoESPT_OC = DB::table('laudos')->where('analise_id', '=', $idAnaliseESPT_OC)->value('id');
    $statusESPT_OC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESPT_OC)->value('status_id');
    //EXAUST.SALAS APLIC.TINTA - INNER COATER
    $tag_vibracaoESAT_IC = "VB 72 500 510 332 000 - 000001";
    $idAtividadeESAT_IC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoESAT_IC)->value('id');
    $idAnaliseESAT_IC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESAT_IC)->max('id');
    $idLaudoESAT_IC = DB::table('laudos')->where('analise_id', '=', $idAnaliseESAT_IC)->value('id');
    $statusESAT_IC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESAT_IC)->value('status_id');
    //SOPRADOR AR COMBUSTÃO ESTUFA PRIME
    $tag_vibracaoSACEP = "VB 72 500 510 338 000 - 000001";
    $idAtividadeSACEP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSACEP)->value('id');
    $idAnaliseSACEP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSACEP)->max('id');
    $idLaudoSACEP = DB::table('laudos')->where('analise_id', '=', $idAnaliseSACEP)->value('id');
    $statusSACEP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSACEP)->value('status_id');
    //SOPRADOR AR COMBUSTÃO ESTUFA TINTA
    $tag_vibracaoSACET = "VB 72 500 510 340 000 - 000001";
    $idAtividadeSACET = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSACET)->value('id');
    $idAnaliseSACET = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSACET)->max('id');
    $idLaudoSACET = DB::table('laudos')->where('analise_id', '=', $idAnaliseSACET)->value('id');
    $statusSACET = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSACET)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pintura_areaExterna')
        ->with('idLaudoEEP', $idLaudoEEP)->with('statusEEP', $statusEEP)
        ->with('idLaudoEET', $idLaudoEET)->with('statusEET', $statusEET)
        ->with('idLaudoSPI_SF', $idLaudoSPI_SF)->with('statusSPI_SF', $statusSPI_SF)
        ->with('idLaudoESPT_OC', $idLaudoESPT_OC)->with('statusESPT_OC', $statusESPT_OC)
        ->with('idLaudoESAT_IC', $idLaudoESAT_IC)->with('statusESAT_IC', $statusESAT_IC)
        ->with('idLaudoSACEP', $idLaudoSACEP)->with('statusSACEP', $statusSACEP)
        ->with('idLaudoSACET', $idLaudoSACET)->with('statusSACET', $statusSACET)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pintura_saida() {
    //TESOURA DE SAÍDA
    $tag_vibracaoTS = "VB 72 500 510 292 000 - 000001";
    $idAtividadeTS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTS)->value('id');
    $idAnaliseTS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTS)->max('id');
    $idLaudoTS = DB::table('laudos')->where('analise_id', '=', $idAnaliseTS)->value('id');
    $statusTS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTS)->value('status_id');
    //CONJUNTO TENSOR 06 - ROLO 02
    $tag_vibracaoCT6_R2 = "VB 72 500 510 274 000 - 000002";
    $idAtividadeCT6_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT6_R2)->value('id');
    $idAnaliseCT6_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT6_R2)->max('id');
    $idLaudoCT6_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT6_R2)->value('id');
    $statusCT6_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT6_R2)->value('status_id');
    //CONJUNTO TENSOR 06 - ROLO 01
    $tag_vibracaoCT6_R1 = "VB 72 500 510 274 000 - 000001";
    $idAtividadeCT6_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT6_R1)->value('id');
    $idAnaliseCT6_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT6_R1)->max('id');
    $idLaudoCT6_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT6_R1)->value('id');
    $statusCT6_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT6_R1)->value('status_id');
    //CONJUNTO TENSOR 05 - ROLO 02
    $tag_vibracaoCT5_R2 = "VB 72 500 510 262 000 - 000002";
    $idAtividadeCT5_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT5_R2)->value('id');
    $idAnaliseCT5_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT5_R2)->max('id');
    $idLaudoCT5_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT5_R2)->value('id');
    $statusCT5_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT5_R2)->value('status_id');
    //CONJUNTO TENSOR 05 - ROLO 01
    $tag_vibracaoCT5_R1 = "VB 72 500 510 262 000 - 000001";
    $idAtividadeCT5_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT5_R1)->value('id');
    $idAnaliseCT5_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT5_R1)->max('id');
    $idLaudoCT5_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT5_R1)->value('id');
    $statusCT5_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT5_R1)->value('status_id');
    //CONJUNTO TENSOR 04 - ROLO 02
    $tag_vibracaoCT4_R2 = "VB 72 500 510 208 000 - 000002";
    $idAtividadeCT4_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT4_R2)->value('id');
    $idAnaliseCT4_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT4_R2)->max('id');
    $idLaudoCT4_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT4_R2)->value('id');
    $statusCT4_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT4_R2)->value('status_id');
    //CONJUNTO TENSOR 04 - ROLO 01
    $tag_vibracaoCT4_R1 = "VB 72 500 510 208 000 - 000001";
    $idAtividadeCT4_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT4_R1)->value('id');
    $idAnaliseCT4_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT4_R1)->max('id');
    $idLaudoCT4_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT4_R1)->value('id');
    $statusCT4_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT4_R1)->value('status_id');
    //SISTEMA CORRETOR 07 - BOMBA 01
    $tag_vibracaoSC7_B1 = "VB 72 500 510 272 000 - 000001";
    $idAtividadeSC7_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC7_B1)->value('id');
    $idAnaliseSC7_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC7_B1)->max('id');
    $idLaudoSC7_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC7_B1)->value('id');
    $statusSC7_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC7_B1)->value('status_id');
    //SISTEMA CORRETOR 07 - BOMBA 02
    $tag_vibracaoSC7_B2 = "VB 72 500 510 272 000 - 000002";
    $idAtividadeSC7_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC7_B2)->value('id');
    $idAnaliseSC7_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC7_B2)->max('id');
    $idLaudoSC7_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC7_B2)->value('id');
    $statusSC7_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC7_B2)->value('status_id');
    //ENROLADEIRA
    $tag_vibracaoENR = "VB 72 500 510 306 000 - 000001";
    $idAtividadeENR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoENR)->value('id');
    $idAnaliseENR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR)->max('id');
    $idLaudoENR = DB::table('laudos')->where('analise_id', '=', $idAnaliseENR)->value('id');
    $statusENR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR)->value('status_id');
    //SISTEMA CORRETOR 04 - BOMBA 02
    $tag_vibracaoSC4_B2 = "VB 72 500 510 204 000 - 000002";
    $idAtividadeSC4_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC4_B2)->value('id');
    $idAnaliseSC4_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC4_B2)->max('id');
    $idLaudoSC4_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC4_B2)->value('id');
    $statusSC4_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC4_B2)->value('status_id');
    //SISTEMA CORRETOR 04 - BOMBA 01
    $tag_vibracaoSC4_B1 = "VB 72 500 510 204 000 - 000001";
    $idAtividadeSC4_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC4_B1)->value('id');
    $idAnaliseSC4_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC4_B1)->max('id');
    $idLaudoSC4_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC4_B1)->value('id');
    $statusSC4_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC4_B1)->value('status_id');
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA 01
    $tag_vibracaoUHS_B1 = "VB 72 500 510 318 000 - 000001";
    $idAtividadeUHS_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHS_B1)->value('id');
    $idAnaliseUHS_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B1)->max('id');
    $idLaudoUHS_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS_B1)->value('id');
    $statusUHS_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B1)->value('status_id');
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA 02
    $tag_vibracaoUHS_B2 = "VB 72 500 510 318 000 - 000002";
    $idAtividadeUHS_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHS_B2)->value('id');
    $idAnaliseUHS_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B2)->max('id');
    $idLaudoUHS_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS_B2)->value('id');
    $statusUHS_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B2)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pintura_saida')->with('idLaudoTS', $idLaudoTS)->with('statusTS', $statusTS)
        ->with('idLaudoCT6_R2', $idLaudoCT6_R2)->with('statusCT6_R2', $statusCT6_R2)->with('idLaudoCT6_R1', $idLaudoCT6_R1)->with('statusCT6_R1', $statusCT6_R1)
        ->with('idLaudoCT5_R2', $idLaudoCT5_R2)->with('statusCT5_R2', $statusCT5_R2)->with('idLaudoCT5_R1', $idLaudoCT5_R1)->with('statusCT5_R1', $statusCT5_R1)
        ->with('idLaudoCT4_R2', $idLaudoCT4_R2)->with('statusCT4_R2', $statusCT4_R2)->with('idLaudoCT4_R1', $idLaudoCT4_R1)->with('statusCT4_R1', $statusCT4_R1)
        ->with('idLaudoSC7_B1', $idLaudoSC7_B1)->with('statusSC7_B1', $statusSC7_B1)->with('idLaudoSC7_B2', $idLaudoSC7_B2)->with('statusSC7_B2', $statusSC7_B2)
        ->with('idLaudoENR', $idLaudoENR)->with('statusENR', $statusENR)->with('idLaudoSC4_B2', $idLaudoSC4_B2)->with('statusSC4_B2', $statusSC4_B2)
        ->with('idLaudoSC4_B1', $idLaudoSC4_B1)->with('statusSC4_B1', $statusSC4_B1)->with('idLaudoUHS_B1', $idLaudoUHS_B1)->with('statusUHS_B1', $statusUHS_B1)
        ->with('idLaudoUHS_B2', $idLaudoUHS_B2)->with('statusUHS_B2', $statusUHS_B2)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function cs_LCL() {
    //LCL - SISTEMA DE GIRO DA DESENROLADEIRA
    $tag_vibracaoSGD = "VB 72 600 610 015 000 - 000001";
    $idAtividadeSGD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSGD)->value('id');
    $idAnaliseSGD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSGD)->max('id');
    $idLaudoSGD = DB::table('laudos')->where('analise_id', '=', $idAnaliseSGD)->value('id');
    $statusSGD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSGD)->value('status_id');
    //LCL - ACIONAMENTO DA CADEIRA TENCIONADORA INFERIOR
    $tag_vibracaoACTI = "VB 72 600 610 097 000 - 000002";
    $idAtividadeACTI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoACTI)->value('id');
    $idAnaliseACTI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACTI)->max('id');
    $idLaudoACTI = DB::table('laudos')->where('analise_id', '=', $idAnaliseACTI)->value('id');
    $statusACTI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACTI)->value('status_id');
    //LCL - SISTEMA DE GIRO ENROLADEIRA
    $tag_vibracaoSGE = "VB 72 600 610 107 000 - 000001";
    $idAtividadeSGE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSGE)->value('id');
    $idAnaliseSGE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSGE)->max('id');
    $idLaudoSGE = DB::table('laudos')->where('analise_id', '=', $idAnaliseSGE)->value('id');
    $statusSGE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSGE)->value('status_id');
    //LCL - ACIONAMENTO SLITTER E EMBOSSER
    $tag_vibracaoASE = "VB 72 600 610 059 000 - 000001";
    $idAtividadeASE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoASE)->value('id');
    $idAnaliseASE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeASE)->max('id');
    $idLaudoASE = DB::table('laudos')->where('analise_id', '=', $idAnaliseASE)->value('id');
    $statusASE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseASE)->value('status_id');
    //LCL - ACIONAMENTO DA CADEIRA TENCIONADORA SUPERIOR
    $tag_vibracaoACTS = "VB 72 600 610 097 000 - 000001";
    $idAtividadeACTS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoACTS)->value('id');
    $idAnaliseACTS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACTS)->max('id');
    $idLaudoACTS = DB::table('laudos')->where('analise_id', '=', $idAnaliseACTS)->value('id');
    $statusACTS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACTS)->value('status_id');
    //LCL - UNIDADE HIDRAULICA DE SAIDA
    $tag_vibracaoUHS = "VB 72 600 610 117 000 - 000001";
    $idAtividadeUHS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHS)->value('id');
    $idAnaliseUHS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS)->max('id');
    $idLaudoUHS2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS)->value('id');
    $statusUHS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS)->value('status_id');
    //LCL - UNIDADE HIDRAULICA DA ENTRADA
    $tag_vibracaoUHE = "VB 72 600 610 027 001 - 000001";
    $idAtividadeUHE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHE)->value('id');
    $idAnaliseUHE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE)->max('id');
    $idLaudoUHE = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE)->value('id');
    $statusUHE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_cs_LCL')
        ->with('idLaudoSGD', $idLaudoSGD)->with('statusSGD', $statusSGD)
        ->with('idLaudoACTI', $idLaudoACTI)->with('statusACTI', $statusACTI)
        ->with('idLaudoSGE', $idLaudoSGE)->with('statusSGE', $statusSGE)
        ->with('idLaudoASE', $idLaudoASE)->with('statusASE', $statusASE)
        ->with('idLaudoACTS', $idLaudoACTS)->with('statusACTS', $statusACTS)
        ->with('idLaudoUHS2', $idLaudoUHS2)->with('statusUHS', $statusUHS)
        ->with('idLaudoUHE', $idLaudoUHE)->with('statusUHE', $statusUHE)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function cs_LCT1() {
    //EQUIPAMENTO NAO CADASTRADO NO BANCO DE DADOS
    //EMBALAGEM - UNIDADE HIDRAULICA - BOMBA 01
    $tag_vibracaoUHEB1 = "VB 72 600 630 027 000 - 000001";
    $idAtividadeUHEB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHEB1)->value('id');
    $idAnaliseUHEB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHEB1)->max('id');
    $idLaudoUHEB1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHEB1)->value('id');
    $statusUHEB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHEB1)->value('status_id');
    //EMBALAGEM - UNIDADE HIDRAULICA - BOMBA 02
    $tag_vibracaoUHEB2 = "VB 72 600 630 027 000 - 000002";
    $idAtividadeUHEB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHEB2)->value('id');
    $idAnaliseUHEB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHEB2)->max('id');
    $idLaudoUHEB2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHEB2)->value('id');
    $statusUHEB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHEB2)->value('status_id');
    //LCT1 - SISTEMA DE GIRO DA DESENROLADEIRA
    $tag_vibracaoSIST_GD = "VB 72 600 620 013 000 - 000001";
    $idAtividadeSIST_GD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSIST_GD)->value('id');
    $idAnaliseSIST_GD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSIST_GD)->max('id');
    $idLaudoSIST_GD = DB::table('laudos')->where('analise_id', '=', $idAnaliseSIST_GD)->value('id');
    $statusSIST_GD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSIST_GD)->value('status_id');
    //LCT1 - ACION. TRANSPORT SAIDA TESOURA MECÂNICA
    $tag_vibracaoATSTM = "VB 72 600 620 071 000 - 000001";
    $idAtividadeATSTM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoATSTM)->value('id');
    $idAnaliseATSTM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATSTM)->max('id');
    $idLaudoATSTM = DB::table('laudos')->where('analise_id', '=', $idAnaliseATSTM)->value('id');
    $statusATSTM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATSTM)->value('status_id');
    //LCT1 - ACIONAMENTO DA TESOURA MECÂNICA
    $tag_vibracaoATM = "VB 72 600 620 067 000 - 000001";
    $idAtividadeATM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoATM)->value('id');
    $idAnaliseATM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATM)->max('id');
    $idLaudoATM = DB::table('laudos')->where('analise_id', '=', $idAnaliseATM)->value('id');
    $statusATM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATM)->value('status_id');
    //LCT1 - ACIONAMENTO DA DESEMPENADEIRA
    $tag_vibracaoAD = "VB 72 600 620 043 000 - 000001";
    $idAtividadeAD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAD)->value('id');
    $idAnaliseAD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAD)->max('id');
    $idLaudoAD = DB::table('laudos')->where('analise_id', '=', $idAnaliseAD)->value('id');
    $statusAD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAD)->value('status_id');
    //LCT1 - UNIDADE HIDRAULICA DA ENTRADA PRINCIPAL
    $tag_vibracaoUHEP = "VB 72 600 620 027 000 - 000001";
    $idAtividadeUHEP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHEP)->value('id');
    $idAnaliseUHEP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHEP)->max('id');
    $idLaudoUHEP = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHEP)->value('id');
    $statusUHEP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHEP)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_cs_LCT1')->with('idLaudoUHEB1', $idLaudoUHEB1)->with('statusUHEB1', $statusUHEB1)
        ->with('idLaudoUHEB2', $idLaudoUHEB2)->with('statusUHEB2', $statusUHEB2)->with('idLaudoSIST_GD', $idLaudoSIST_GD)->with('statusSIST_GD', $statusSIST_GD)
        ->with('idLaudoATSTM', $idLaudoATSTM)->with('statusATSTM', $statusATSTM)->with('idLaudoATM', $idLaudoATM)->with('statusATM', $statusATM)
        ->with('idLaudoAD', $idLaudoAD)->with('statusAD', $statusAD)->with('idLaudoUHEP', $idLaudoUHEP)->with('statusUHEP', $statusUHEP)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function cs_LCT2() {
    //LCT2 - MESA TRANSPORTADORA 1 ( TELESCOPICA)
    $tag_vibracaoMT1 = "VB 72 600 621 119 000 - 000001";
    $idAtividadeMT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoMT1)->value('id');
    $idAnaliseMT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMT1)->max('id');
    $idLaudoMT1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseMT1)->value('id');
    $statusMT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMT1)->value('status_id');
    //LCT2 - TESOURA MECÂNICA
    $tag_vibracaoTM = "VB 72 600 621 111 000 - 000001";
    $idAtividadeTM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTM)->value('id');
    $idAnaliseTM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTM)->max('id');
    $idLaudoTM = DB::table('laudos')->where('analise_id', '=', $idAnaliseTM)->value('id');
    $statusTM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTM)->value('status_id');
    //LCT2 - ROLOS CÍCLICOS
    $tag_vibracaoRC = "VB 72 600 621 105 000 - 000001";
    $idAtividadeRC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRC)->value('id');
    $idAnaliseRC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRC)->max('id');
    $idLaudoRC = DB::table('laudos')->where('analise_id', '=', $idAnaliseRC)->value('id');
    $statusRC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRC)->value('status_id');
    //LCT2 - ACIONAMENTO DA DESEMPENADEIRA
    $tag_vibracaoACI_DES = "VB 72 600 621 073 000 - 000001";
    $idAtividadeACI_DES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoACI_DES)->value('id');
    $idAnaliseACI_DES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACI_DES)->max('id');
    $idLaudoACI_DES = DB::table('laudos')->where('analise_id', '=', $idAnaliseACI_DES)->value('id');
    $statusACI_DES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACI_DES)->value('status_id');
    //LCT2 - ACIONAMENTO DA TESOURA CIRCULAR MECÂNICA
    $tag_vibracaoATCM = "VB 72 600 621 047 000 - 000001";
    $idAtividadeATCM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoATCM)->value('id');
    $idAnaliseATCM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATCM)->max('id');
    $idLaudoATCM = DB::table('laudos')->where('analise_id', '=', $idAnaliseATCM)->value('id');
    $statusATCM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATCM)->value('status_id');
    //LCT2 - UNIDADE HIDRAULICA
    $tag_vibracaoUH = "VB 72 600 621 093 000 - 000001";
    $idAtividadeUH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUH)->value('id');
    $idAnaliseUH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH)->max('id');
    $idLaudoUH = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH)->value('id');
    $statusUH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_cs_LCT2')->with('idLaudoMT1', $idLaudoMT1)->with('statusMT1', $statusMT1)->with('idLaudoTM', $idLaudoTM)
        ->with('statusTM', $statusTM)->with('idLaudoRC', $idLaudoRC)->with('statusRC', $statusRC)->with('idLaudoACI_DES', $idLaudoACI_DES)
        ->with('statusACI_DES', $statusACI_DES)->with('idLaudoATCM', $idLaudoATCM)->with('statusATCM', $statusATCM)->with('idLaudoUH', $idLaudoUH)->with('statusUH', $statusUH)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function cs_LCC() {
    //LCC - UNIDADE HIDRAULICA PRINCIPAL - BB01
    $tag_vibracaoUHP_BB01 = "VB 72 600 640 167 000 - 000001";
    $idAtividadeUHP_BB01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_BB01)->value('id');
    $idAnaliseUHP_BB01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_BB01)->max('id');
    $idLaudoUHP_BB01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHP_BB01)->value('id');
    $statusUHP_BB01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_BB01)->value('status_id');
    //LCC - UNIDADE HIDRAULICA PRINCIPAL - BB02
    $tag_vibracaoUHP_BB02 = "VB 72 600 640 167 000 - 000002";
    $idAtividadeUHP_BB02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_BB02)->value('id');
    $idAnaliseUHP_BB02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_BB02)->max('id');
    $idLaudoUHP_BB02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHP_BB02)->value('id');
    $statusUHP_BB02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_BB02)->value('status_id');
    //LCC - ACIONAMENTO DO ROLO ALIMENTADOR SLITTER
    $tag_vibracaoARAS = "VB 72 600 640 063 000 - 000001";
    $idAtividadeARAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoARAS)->value('id');
    $idAnaliseARAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARAS)->max('id');
    $idLaudoARAS = DB::table('laudos')->where('analise_id', '=', $idAnaliseARAS)->value('id');
    $statusARAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARAS)->value('status_id');
    //LCC - ACIONAMENTO ROLO ALIMENTADOR
    $tag_vibracaoARA = "VB 72 600 640 113 000 - 000001";
    $idAtividadeARA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoARA)->value('id');
    $idAnaliseARA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARA)->max('id');
    $idLaudoARA = DB::table('laudos')->where('analise_id', '=', $idAnaliseARA)->value('id');
    $statusARA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARA)->value('status_id');
    //LCC - ACIONAMENTO DESEMPENADEIRA
    $tag_vibracaoADES = "VB 72 600 640 049 000 - 000001";
    $idAtividadeADES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoADES)->value('id');
    $idAnaliseADES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeADES)->max('id');
    $idLaudoADES = DB::table('laudos')->where('analise_id', '=', $idAnaliseADES)->value('id');
    $statusADES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseADES)->value('status_id');
    //LCC - ACIONAMENTO TESOURA MECANICA
    $tag_vibracaoATMEC = "VB 72 600 640 121 000 - 000001";
    $idAtividadeATMEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoATMEC)->value('id');
    $idAnaliseATMEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATMEC)->max('id');
    $idLaudoATMEC = DB::table('laudos')->where('analise_id', '=', $idAnaliseATMEC)->value('id');
    $statusATMEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATMEC)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_cs_LCC')
        ->with('idLaudoUHP_BB01', $idLaudoUHP_BB01)->with('statusUHP_BB01', $statusUHP_BB01)
        ->with('idLaudoUHP_BB02', $idLaudoUHP_BB02)->with('statusUHP_BB02', $statusUHP_BB02)
        ->with('idLaudoARAS', $idLaudoARAS)->with('statusARAS', $statusARAS)
        ->with('idLaudoARA', $idLaudoARA)->with('statusARA', $statusARA)
        ->with('idLaudoADES', $idLaudoADES)->with('statusADES', $statusADES)
        ->with('idLaudoATMEC', $idLaudoATMEC)->with('statusATMEC', $statusATMEC)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  //--- PONTES ROLANTES
  public function pr_pontes() {
    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pr_ponte')
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr_pontes_pr12() {
    //PONTE ROLANTE 12
    $tag_vibracaoPR_12 = "VB 72 200 012 015 000 - 000001";
    $idAtividadePR_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoPR_12)->value('id');
    $idAnalisePR_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_12)->max('id');
    $idLaudoPR_12 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_12)->value('id');
    $statusPR_12 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_12)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pr_ponte_pr12')
        ->with('idLaudoPR_12', $idLaudoPR_12)->with('statusPR_12', $statusPR_12)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function pr_pontes_pr23() {
    //PONTE ROLANTE 23
    $tag_vibracaoPR_23 = "VB 72 800 013 013 000 - 000001";
    $idAtividadePR_23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoPR_23)->value('id');
    $idAnalisePR_23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_23)->max('id');
    $idLaudoPR_23 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_23)->value('id');
    $statusPR_23 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_23)->value('status_id');

    $ura_status = aux_vib::ura_Menu();
    $ura_final_status = aux_vib::ura_final_Menu();
    $ura_normal = aux_vib::ura_normal_Menu();
    $ura_alarme = aux_vib::ura_alarme_Menu();
    $ura_critico = aux_vib::ura_critico_Menu();
    //LDS
    $decapagem_entrada_status = aux_vib::decapagem_entrada_Menu();
    $decapagem_processo_status = aux_vib::decapagem_processo_Menu();
    $decapagem_saida_status = aux_vib::decapagem_saida_Menu();
    $lds_status = aux_vib::decapagem_Menu();
    $lds_normal = aux_vib::lds_normal_Menu();
    $lds_alarme = aux_vib::lds_alarme_Menu();
    $lds_critico = aux_vib::lds_critico_Menu();
    //LRF
    $laminador_status = aux_vib::laminador_Menu();
    $laminador_porao_status = aux_vib::laminador_porao_Menu();
    $laminador_oficina_status = aux_vib::laminador_oficina_Menu();
    $lrf_status = aux_vib::lrf_Menu();
    $lrf_normal = aux_vib::lrf_normal_Menu();
    $lrf_alarme = aux_vib::lrf_alarme_Menu();
    $lrf_critico = aux_vib::lrf_critico_Menu();
    //UTI
    $utilidades_status = aux_vib::utilidades_Menu();
    $utilidades_casa_bombas_status = aux_vib::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = aux_vib::utilidades_linhas_Menu();
    $uti_status = aux_vib::uti_Menu();
    $uti_normal = aux_vib::uti_normal_Menu();
    $uti_alarme = aux_vib::uti_alarme_Menu();
    $uti_critico = aux_vib::uti_critico_Menu();
    //LGC
    $galvanizacao_entrada_status = aux_vib::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = aux_vib::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = aux_vib::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = aux_vib::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = aux_vib::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = aux_vib::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = aux_vib::galvanizacao_saida_Menu();
    $lgc_status = aux_vib::lgc_Menu();
    $lgc_normal = aux_vib::lgc_normal_Menu();
    $lgc_alarme = aux_vib::lgc_alarme_Menu();
    $lgc_critico = aux_vib::lgc_critico_Menu();
    //LPC
    $pintura_entrada_status = aux_vib::pintura_entrada_Menu();
    $pintura_processo1_status = aux_vib::pintura_processo1_Menu();
    $pintura_processo2_status = aux_vib::pintura_processo2_Menu();
    $pintura_estufas_status = aux_vib::pintura_estufas_Menu();
    $pintura_areaExterna_status = aux_vib::pintura_areaExterna_Menu();
    $pintura_saida_status = aux_vib::pintura_saida_Menu();
    $lpc_status = aux_vib::lpc_Menu();
    $lpc_normal = aux_vib::lpc_normal_Menu();
    $lpc_alarme = aux_vib::lpc_alarme_Menu();
    $lpc_critico = aux_vib::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux_vib::cs_LCL_Menu();
    $cs_LCT1_status = aux_vib::cs_LCT1_Menu();
    $cs_LCT2_status = aux_vib::cs_LCT2_Menu();
    $cs_LCC_status = aux_vib::cs_LCC_Menu();
    $cs_status = aux_vib::cs_Menu();
    $cs_normal = aux_vib::cs_normal_Menu();
    $cs_alarme = aux_vib::cs_alarme_Menu();
    $cs_critico = aux_vib::cs_critico_Menu();
    //PR
    $pr_pontes_pr12_status = aux_vib::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = aux_vib::pr_pontes_pr23_Menu();
    $pr_status = aux_vib::pr_Menu();
    $pr_normal = aux_vib::pr_normal_Menu();
    $pr_alarme = aux_vib::pr_alarme_Menu();
    $pr_critico = aux_vib::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.vibracao_pr_ponte_pr23')
        ->with('idLaudoPR_23', $idLaudoPR_23)->with('statusPR_23', $statusPR_23)
        ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
->with('decapagem_entrada_status', $decapagem_entrada_status)->with('decapagem_processo_status', $decapagem_processo_status)->with('decapagem_saida_status', $decapagem_saida_status)
->with('lds_status', $lds_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
->with('laminador_status', $laminador_status)->with('laminador_porao_status', $laminador_porao_status)->with('laminador_oficina_status', $laminador_oficina_status)
->with('lrf_status', $lrf_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
->with('utilidades_status', $utilidades_status)->with('utilidades_casa_bombas_status', $utilidades_casa_bombas_status)->with('utilidades_linhas_status', $utilidades_linhas_status)
->with('uti_status', $uti_status)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
->with('galvanizacao_entrada_status', $galvanizacao_entrada_status)->with('galvanizacao_limpeza_boiler_status', $galvanizacao_limpeza_boiler_status)
->with('galvanizacao_limpeza_escovas_status', $galvanizacao_limpeza_escovas_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
->with('galvanizacao_apc_porao_status', $galvanizacao_apc_porao_status)->with('galvanizacao_laminador_status', $galvanizacao_laminador_status)
->with('galvanizacao_saida_status', $galvanizacao_saida_status)
->with('lgc_status', $lgc_status)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
->with('pintura_entrada_status', $pintura_entrada_status)->with('pintura_processo1_status', $pintura_processo1_status)
->with('pintura_processo2_status', $pintura_processo2_status)->with('pintura_estufas_status', $pintura_estufas_status)->with('pintura_areaExterna_status', $pintura_areaExterna_status)
->with('pintura_saida_status', $pintura_saida_status)
->with('lpc_status', $lpc_status)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)
->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)->with('$cs_LCT1_status', $cs_LCT1_status)
->with('cs_status', $cs_status)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)
->with('pr_status', $pr_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
      }
}

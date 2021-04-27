<?php

namespace App\Http\Controllers\Csn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Historico;
use DB;
use App\Http\Controllers\Csn\AuxFuncRelTec_TermoElet as aux;
use App\Http\Controllers\Csn\AuxFuncRelTec_Vib as aux_vib;
use App\Http\Controllers\Csn\AuxFuncRelTec_RM as aux_rm;

class CsnController extends Controller {
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  //ATENÇÃO: UTILIZAR PARA **TESTES** DE ATUALIZAÇÕES SOMENTE ============
  public function atualizacao() {
    $title = 'ATUALIZAÇÕES';
    return view('csn.home.index2')->with('title', $title);
  }

  public function index() {
    $title = 'CSN PR | PREDITIVA';
    return view('csn.home.index')->with('title', $title);
  }

  public function redirectIndex() {
    return redirect('/csnparana.gmu.br');
  }

  //controller para Relatório Gerencial
  public function RelatorioGerencial() {
    $title = 'Preditiva | Relatórios';
    return view('csn.relatorioGerencial.index')->with('title', $title);
  }

  //controllers para relatorios tecnicos
  public function termografia() {
    $title = 'Preditiva | Termografia';
    //URA
    $ura_painel_1_status = aux::ura_painel_1_Menu();
    $ura_painel_2_status = aux::ura_painel_2_Menu();
    $ura_menu = aux::ura_Menu();
    $ura_normal = aux::ura_normal_Menu();
    $ura_alarme = aux::ura_alarme_Menu();
    $ura_critico = aux::ura_critico_Menu();
    //LDS
    $ura_painel_caldeiras_status = aux::ura_painel_caldeiras_Menu();
    $decapagem_ets_status = aux::decapagem_ets_Menu();
    $decapagem_ccm1_status = aux::decapagem_ccm1_Menu();
    $decapagem_ccm2_status = aux::decapagem_ccm2_Menu();
    $decapagem_drives_status = aux::decapagem_drives_Menu();
    $lds_menu = aux::lds_Menu();
    $lds_normal = aux::lds_normal_Menu();
    $lds_alarme = aux::lds_alarme_Menu();
    $lds_critico = aux::lds_critico_Menu();
    //lRF
    $laminador_ets_status = aux::laminador_ets_Menu();
    $laminador_ccm1_status = aux::laminador_ccm1_Menu();
    $laminador_ccm2_status = aux::laminador_ccm2_Menu();
    $laminador_salaPLC_status = aux::laminador_salaPLC_Menu();
    $laminador_mainDrives_status = aux::laminador_mainDrives_Menu();
    $laminador_payOfReel_status = aux::laminador_payOfReel_Menu();
    $laminador_oficil_status = aux::laminador_oficil_Menu();
    $lrf_menu = aux::lrf_Menu();
    $lrf_normal = aux::lrf_normal_Menu();
    $lrf_alarme = aux::lrf_alarme_Menu();
    $lrf_critico = aux::lrf_critico_Menu();
    //UTI
    $utilidades_ccm_status = aux::utilidades_ccm_Menu();
    $utilidades_lv460V_status = aux::utilidades_lv460V_Menu();
    $utilidades_salaCompressores_status = aux::utilidades_salaCompressores_Menu();
    $utilidades_subestacao_status = aux::utilidades_subestacao_Menu();
    $uti_menu = aux::uti_Menu();
    $uti_normal = aux::uti_normal_Menu();
    $uti_alarme = aux::uti_alarme_Menu();
    $uti_critico = aux::uti_critico_Menu();
    //LGC
    $galvanizacao_ets_entradaLimp_status = aux::galvanizacao_ets_entradaLimp_Menu();
    $galvanizacao_forno_status = aux::galvanizacao_forno_Menu();
    $galvanizacao_infraSaida_status = aux::galvanizacao_infraSaida_Menu();
    $galvanizacao_ccm1_ccm7_status = aux::galvanizacao_ccm1_ccm7_Menu();
    $galvanizacao_ccm2_ccm3_status = aux::galvanizacao_ccm2_ccm3_Menu();
    $galvanizacao_alarme_ccm4_ccm5_status = aux::galvanizacao_alarme_ccm4_ccm5_Menu();
    $galvanizacao_drive_entrada_status = aux::galvanizacao_drive_entrada_Menu();
    $galvanizacao_drive_saida_status = aux::galvanizacao_drive_saida_Menu();
    $lgc_menu = aux::lgc_Menu();
    $lgc_normal = aux::lgc_normal_Menu();
    $lgc_alarme = aux::lgc_alarme_Menu();
    $lgc_critico = aux::lgc_critico_Menu();
    //LPC
    $pintura_estacoesRemotas_status = aux::pintura_estacoesRemotas_Menu();
    $pintura_paineis_drives_status = aux::pintura_paineis_drives_Menu();
    $pintura_paineis_emergencia_status = aux::pintura_paineis_emergencia_Menu();
    $pintura_paineis_ccm_status = aux::pintura_paineis_ccm_Menu();
    $lpc_menu = aux::lpc_Menu();
    $lpc_normal = aux::lpc_normal_Menu();
    $lpc_alarme = aux::lpc_alarme_Menu();
    $lpc_critico = aux::lpc_critico_Menu();
    //CS
    $cs_LCL_status = aux::cs_LCL_Menu();
    $cs_LCT1_status = aux::cs_LCT1_Menu();
    $cs_LCT2_status = aux::cs_LCT2_Menu();
    $cs_LCC_status = aux::cs_LCC_Menu();
    $cs_menu = aux::cs_Menu();
    $cs_normal = aux::cs_normal_Menu();
    $cs_alarme = aux::cs_alarme_Menu();
    $cs_critico = aux::cs_critico_Menu();
    //PR
    $pr_pontes_pr5_status = aux::pr_pontes_pr5_Menu();
    $pr_pontes_pr7_status = aux::pr_pontes_pr7_Menu();
    $pr_pontes_pr8_status = aux::pr_pontes_pr8_Menu();
    $pr_pontes_pr11_status = aux::pr_pontes_pr11_Menu();
    $pr_pontes_pr12_status = aux::pr_pontes_pr12_Menu();
    $pr_pontes_pr13_status = aux::pr_pontes_pr13_Menu();
    $pr_pontes_pr14_status = aux::pr_pontes_pr14_Menu();
    $pr_pontes_pr20_status = aux::pr_pontes_pr20_Menu();
    $pr_pontes_pr23_status = aux::pr_pontes_pr23_Menu();
    $pr_menu = aux::pr_Menu();
    $pr_normal = aux::pr_normal_Menu();
    $pr_alarme = aux::pr_alarme_Menu();
    $pr_critico = aux::pr_critico_Menu();

    return view('csn.relatoriosTecnicos.termografia')->with('title', $title)
    ->with('ura_painel_1_status', $ura_painel_1_status)->with('ura_painel_2_status', $ura_painel_2_status)
    ->with('ura_menu', $ura_menu)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('ura_painel_caldeiras_status', $ura_painel_caldeiras_status)->with('decapagem_ets_status', $decapagem_ets_status)
    ->with('decapagem_ccm1_status', $decapagem_ccm1_status)->with('decapagem_ccm2_status', $decapagem_ccm2_status)->with('decapagem_drives_status', $decapagem_drives_status)
    ->with('lds_menu', $lds_menu)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('laminador_ets_status', $laminador_ets_status)->with('laminador_ccm1_status', $laminador_ccm1_status)
    ->with('laminador_ccm2_status', $laminador_ccm2_status)->with('laminador_salaPLC_status', $laminador_salaPLC_status)->with('laminador_mainDrives_status', $laminador_mainDrives_status)
    ->with('laminador_payOfReel_status', $laminador_payOfReel_status)->with('laminador_oficil_status', $laminador_oficil_status)
    ->with('lrf_menu', $lrf_menu)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
    ->with('utilidades_ccm_status', $utilidades_ccm_status)->with('utilidades_lv460V_status', $utilidades_lv460V_status)->with('utilidades_salaCompressores_status', $utilidades_salaCompressores_status)
    ->with('utilidades_subestacao_status', $utilidades_subestacao_status)->with('uti_menu', $uti_menu)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
    ->with('galvanizacao_ets_entradaLimp_status', $galvanizacao_ets_entradaLimp_status)->with('galvanizacao_forno_status', $galvanizacao_forno_status)
    ->with('galvanizacao_infraSaida_status', $galvanizacao_infraSaida_status)->with('galvanizacao_ccm1_ccm7_status', $galvanizacao_ccm1_ccm7_status)
    ->with('galvanizacao_ccm2_ccm3_status', $galvanizacao_ccm2_ccm3_status)->with('galvanizacao_alarme_ccm4_ccm5_status', $galvanizacao_alarme_ccm4_ccm5_status)
    ->with('galvanizacao_drive_entrada_status', $galvanizacao_drive_entrada_status)->with('galvanizacao_drive_saida_status', $galvanizacao_drive_saida_status)
    ->with('lgc_menu', $lgc_menu)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
    ->with('pintura_estacoesRemotas_status', $pintura_estacoesRemotas_status)->with('pintura_paineis_drives_status', $pintura_paineis_drives_status)
    ->with('pintura_paineis_emergencia_status', $pintura_paineis_emergencia_status)->with('pintura_paineis_ccm_status', $pintura_paineis_ccm_status)
    ->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
    ->with('cs_LCL_status', $cs_LCL_status)->with('cs_LCT1_status', $cs_LCT1_status)->with('cs_LCT2_status', $cs_LCT2_status)->with('cs_LCC_status', $cs_LCC_status)
    ->with('cs_menu', $cs_menu)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
    ->with('pr_pontes_pr5_status', $pr_pontes_pr5_status)->with('pr_pontes_pr7_status', $pr_pontes_pr7_status)->with('pr_pontes_pr8_status', $pr_pontes_pr8_status)->with('pr_pontes_pr11_status', $pr_pontes_pr11_status)
    ->with('pr_pontes_pr12_status', $pr_pontes_pr12_status)->with('pr_pontes_pr13_status', $pr_pontes_pr13_status)->with('pr_pontes_pr14_status', $pr_pontes_pr14_status)->with('pr_pontes_pr20_status', $pr_pontes_pr20_status)
    ->with('pr_pontes_pr23_status', $pr_pontes_pr23_status)->with('pr_menu', $pr_menu)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  //controllers para relatorios tecnicos
  public function termografia_isolamento() {
    $title = 'Preditiva | Termografia Isolamento';
    return view('csn.relatoriosTecnicos.termografia_isolamento')->with('title', $title);
  }

  public function vibracao() {
    $title = 'Preditiva | Vibração';
    //URA
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

    return view('csn.relatoriosTecnicos.vibracao')->with('title', $title)
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

  public function oleo() {
    $title = 'Preditiva | Lubrificantes';
    return view('csn.relatoriosTecnicos.oleo')->with('title', $title);
  }

  public function resistencias() {
    $title = 'Preditiva | Resistências';
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
    //dd($uti_normal);
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

    return view('csn.relatoriosTecnicos.resistencias')->with('title', $title)
    ->with('ura_status', $ura_status)->with('ura_final_status', $ura_final_status)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
    ->with('lds_status', $lds_status)->with('lds_final_status', $lds_final_status)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
    ->with('lrf_status', $lrf_status)->with('lrf_final_status', $lrf_final_status)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
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
    ->with('pr5_status', $pr5_status)->with('pr7_status', $pr7_status)->with('pr8_status', $pr8_status)->with('pr11_status', $pr11_status)
    ->with('pr12_status', $pr12_status)->with('pr13_status', $pr13_status)->with('pr14_status', $pr14_status)->with('pr20_status', $pr20_status)->with('pr23_status', $pr23_status)
    ->with('pr_final_status', $pr_final_status)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico);
  }

  public function relGerCarregando() {
    $title = 'Preditiva | Relatórios';
    return view('csn.relatorioGerencial.carregando')->with('title', $title);
  }

  public function voltarRelTec(Request $req) {
    $myurl = (string)$req->input('data');
    $myip = (string)$req->ip();
    if ($myurl) {
      $ipexistente = DB::table('historico')->where('ultimoip', '=', $myip)->value('id');
      if($ipexistente == null || $ipexistente = "") {
        $id_historico = DB::table('historico')->max('id');
        DB::insert('insert into historico (id, ultimoregistro, ultimoip) values (?, ?, ?)', array($id_historico+1, $myurl, $myip));
      } else {
      DB::table('historico')->where('ultimoip', $myip)->update(['ultimoregistro' => $myurl]);
      }
    } else { }
  }
}


















//====================

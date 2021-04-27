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
use App\Http\Controllers\Csn\AuxFuncRelTec_Vib as AuxFuncRelTec;
use App\Http\Controllers\Csn\AuxFunc as aux;

class AuxFuncRelTec_Vib {

  public static function ura_Menu() {
    $ura_status = "";
    //EXAUSTOR DO SILO DE OXIDO
    $tag_vibracaoESO = "VB 72 200 240 015 000 - 000001";
    $idAtividadeESO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoESO)->value('id');
    $idAnaliseESO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESO)->max('id');
    $statusESO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESO)->value('status_id');
    //REATOR
    $tag_vibracaoREATOR = "VB 72 200 240 019 000 - 000001";
    $idAtividadeREATOR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoREATOR)->value('id');
    $idAnaliseREATOR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeREATOR)->max('id');
    $statusREATOR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseREATOR)->value('status_id');
    //LAVADOR DE GASES
    $tag_vibracaoLG = "VB 72 200 240 039 000 - 000001";
    $idAtividadeLG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLG)->value('id');
    $idAnaliseLG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLG)->max('id');
    $statusLG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLG)->value('status_id');

    if ($statusESO == 5 || $statusREATOR == 5 || $statusLG == 5) {
      $ura_status = 5;
    } elseif ($statusESO == 4 || $statusREATOR == 4 || $statusLG == 4) {
      $ura_status = 4;
    } elseif ($statusESO == 3 || $statusREATOR == 3 || $statusLG == 3) {
      $ura_status = 3;
    }
    else {
      $ura_status = "";
    }

    return $ura_status;
  }

  public static function ura_final_Menu() {
    $ura_final_status = "";
    $ura_status = AuxFuncRelTec::ura_Menu();

    if ($ura_status == 5) {
      $ura_final_status = 5;
    } elseif ($ura_status == 4) {
      $ura_final_status = 4;
    } elseif ($ura_status == 3) {
      $ura_final_status = 3;
    } else {
      $ura_final_status = "";
    }

    return $ura_final_status;
  }

  public static function ura_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_normal = aux::GeralPorLinhaVib($atual1, 3, $ura_linha1, $ura_linha2);
    return $ura_normal;
  }
  public static function ura_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_alarme = aux::GeralPorLinhaVib($atual1, 4, $ura_linha1, $ura_linha2);
    return $ura_alarme;
  }
  public static function ura_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_critico = aux::GeralPorLinhaVib($atual1, 5, $ura_linha1, $ura_linha2);
    return $ura_critico;
  }

  public static function decapagem_entrada_Menu() {
    $decapagem_entrada_status = "";
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA RECIRCULAÇÃO
    $tag_vibracaoBOMBA_REC = "VB 72 200 210 318 000 - 000005";
    $idAtividadeBOMBA_REC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_REC)->value('id');
    $idAnaliseBOMBA_REC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_REC)->max('id');
    $statusBOMBA_REC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_REC)->value('status_id');
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA 04
    $tag_vibracaoBOMBA_4 = "VB 72 200 210 318 000 - 000004";
    $idAtividadeBOMBA_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_4)->value('id');
    $idAnaliseBOMBA_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_4)->max('id');
    $statusBOMBA_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_4)->value('status_id');
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA 03
    $tag_vibracaoBOMBA_3 = "VB 72 200 210 318 000 - 000003";
    $idAtividadeBOMBA_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_3)->value('id');
    $idAnaliseBOMBA_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_3)->max('id');
    $statusBOMBA_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_3)->value('status_id');
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA 02
    $tag_vibracaoBOMBA_2 = "VB 72 200 210 318 000 - 000002";
    $idAtividadeBOMBA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_2)->value('id');
    $idAnaliseBOMBA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_2)->max('id');
    $statusBOMBA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_2)->value('status_id');
    //SISTEMA HIDRÁULICO DE ENTRADA - BOMBA 01
    $tag_vibracaoBOMBA_1 = "VB 72 200 210 318 000 - 000001";
    $idAtividadeBOMBA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBOMBA_1)->value('id');
    $idAnaliseBOMBA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBOMBA_1)->max('id');
    $statusBOMBA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBOMBA_1)->value('status_id');
    //UNIDADE HIDRAULICA FIFE DESENROLADEIRA
    $tag_vibracaoUHFD = "VB 72 200 210 042 000 - 000001";
    $idAtividadeUHFD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFD)->value('id');
    $idAnaliseUHFD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFD)->max('id');
    $statusUHFD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFD)->value('status_id');
    //DESEMPENADEIRA
    $tag_vibracaoDESEMPENADEIRA = "VB 72 200 210 048 000 - 000001";
    $idAtividadeDESEMPENADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDESEMPENADEIRA)->value('id');
    $idAnaliseDESEMPENADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEMPENADEIRA)->max('id');
    $statusDESEMPENADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEMPENADEIRA)->value('status_id');
    //ACIONAMENTO PRICIPAL DESENROLADEIRA
    $tag_vibracaoAPD = "VB 72 200 210 024 000 - 000001";
    $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPD)->value('id');
    $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
    $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');

    if ($statusBOMBA_REC  == 5 || $statusBOMBA_4  == 5 || $statusBOMBA_3  == 5 || $statusBOMBA_2  == 5 || $statusBOMBA_1  == 5 || $statusUHFD  == 5 || $statusDESEMPENADEIRA  == 5 || $statusAPD == 5) {
      $decapagem_entrada_status = 5;
    } elseif ($statusBOMBA_REC  == 4 || $statusBOMBA_4  == 4 || $statusBOMBA_3  == 4 || $statusBOMBA_2  == 4 || $statusBOMBA_1  == 4 || $statusUHFD  == 4 || $statusDESEMPENADEIRA  == 4 || $statusAPD == 4) {
      $decapagem_entrada_status = 4;
    } elseif ($statusBOMBA_REC  == 3 || $statusBOMBA_4  == 3 || $statusBOMBA_3  == 3 || $statusBOMBA_2  == 3 || $statusBOMBA_1  == 3 || $statusUHFD  == 3 || $statusDESEMPENADEIRA  == 3 || $statusAPD == 3) {
      $decapagem_entrada_status = 3;
    }
    else {
      $decapagem_entrada_status = "";
    }

    return $decapagem_entrada_status;
  }

  public static function decapagem_processo_Menu() {
    $decapagem_processo_status = "";
    //SISTEMA DE COMBUSTAO 01
    $tag_vibracaoSC_01 = "VB 72 050 150 001 000 - 000001";
    $idAtividadeSC_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC_01)->value('id');
    $idAnaliseSC_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_01)->max('id');
    $statusSC_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_01)->value('status_id');
    //SISTEMA DE COMBUSTAO 02
    $tag_vibracaoSC_02 = "VB 72 050 250 001 000 - 000001";
    $idAtividadeSC_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC_02)->value('id');
    $idAnaliseSC_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_02)->max('id');
    $statusSC_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_02)->value('status_id');
    //SISTEMA DE AGUA 01
    $tag_vibracaoSA_01 = "VB 72 050 150 003 000 - 000001";
    $idAtividadeSA_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSA_01)->value('id');
    $idAnaliseSA_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSA_01)->max('id');
    $statusSA_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSA_01)->value('status_id');
    //SISTEMA DE AGUA 02
    $tag_vibracaoAPD = "VB 72 050 250 003 000 - 000001";
    $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPD)->value('id');
    $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
    $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');
    //BOMBA 01 SCRUBBER
    $tag_vibracaoB1_SCRUBBER = "VB 72 200 210 165 000 - 000001";
    $idAtividadeB1_SCRUBBER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoB1_SCRUBBER)->value('id');
    $idAnaliseB1_SCRUBBER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1_SCRUBBER)->max('id');
    $statusB1_SCRUBBER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1_SCRUBBER)->value('status_id');
    //BOMBA 02 SCRUBBER
    $tag_vibracaoB2_SCRUBBER = "VB 72 200 210 165 000 - 000002";
    $idAtividadeB2_SCRUBBER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoB2_SCRUBBER)->value('id');
    $idAnaliseB2_SCRUBBER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB2_SCRUBBER)->max('id');
    $statusB2_SCRUBBER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB2_SCRUBBER)->value('status_id');
    //EXAUSTOR DE GASES
    $tag_vibracaoEG = "VB 72 200 210 165 000 - 000003";
    $idAtividadeEG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEG)->value('id');
    $idAnaliseEG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEG)->max('id');
    $statusEG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEG)->value('status_id');
    //RECIRCULAÇÃO DA LAVAGEM - BOMBA 1 DOS TANQUES 1 E 2
    $tag_vibracaoRLB1T1_2 = "VB 72 200 210 156 000 - 000001";
    $idAtividadeRLB1T1_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB1T1_2)->value('id');
    $idAnaliseRLB1T1_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB1T1_2)->max('id');
    $statusRLB1T1_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB1T1_2)->value('status_id');
    //RECIRCULAÇÃO DA LAVAGEM - BOMBA 3SB DOS TANQUES 1 E 2
    $tag_vibracaoRLB_3SB = "VB 72 200 210 156 000 - 000003";
    $idAtividadeRLB_3SB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB_3SB)->value('id');
    $idAnaliseRLB_3SB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB_3SB)->max('id');
    $statusRLB_3SB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB_3SB)->value('status_id');
    //RECIRCULAÇÃO DA LAVAGEM - BOMBA 2 DOS TANQUES 1 E 2
    $tag_vibracaoAPD = "VB 72 200 210 156 000 - 000002";
    $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPD)->value('id');
    $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
    $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');
    //SEGUNDO NIVEL DE ACESSO //RECIRCULAÇÃO DA LAVAGEM - BOMBA 1 DOS TANQUES 3 E 4
    $tag_vibracaoRLB1T3_4 = "VB 72 200 210 156 000 - 000004";
    $idAtividadeRLB1T3_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB1T3_4)->value('id');
    $idAnaliseRLB1T3_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB1T3_4)->max('id');
    $statusRLB1T3_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB1T3_4)->value('status_id');
    //SB //RECIRCULAÇÃO DA LAVAGEM - BOMBA 3SB DOS TANQUES 3 E 4
    $tag_vibracaoRLB_3SB_T3_4 = "VB 72 200 210 156 000 - 000006";
    $idAtividadeRLB_3SB_T3_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB_3SB_T3_4)->value('id');
    $idAnaliseRLB_3SB_T3_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB_3SB_T3_4)->max('id');
    $statusRLB_3SB_T3_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB_3SB_T3_4)->value('status_id');
    //02   //RECIRCULAÇÃO DA LAVAGEM - BOMBA 2 DOS TANQUES 3 E 4
    $tag_vibracaoRLB2T3_4 = "VB 72 200 210 156 000 - 000005";
    $idAtividadeRLB2T3_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB2T3_4)->value('id');
    $idAnaliseRLB2T3_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB2T3_4)->max('id');
    $statusRLB2T3_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB2T3_4)->value('status_id');
    //01 //RECIRCULAÇÃO DA LAVAGEM - BOMBA 1 DO TANQUE 5
    $tag_vibracaoRLB1_T5 = "VB 72 200 210 156 000 - 000007";
    $idAtividadeRLB1_T5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB1_T5)->value('id');
    $idAnaliseRLB1_T5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB1_T5)->max('id');
    $statusRLB1_T5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB1_T5)->value('status_id');
    //02 //RECIRCULAÇÃO DA LAVAGEM - BOMBA 2 DO TANQUE 5
    $tag_vibracaoRLB2_T5 = "VB 72 200 210 156 000 - 000008";
    $idAtividadeRLB2_T5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB2_T5)->value('id');
    $idAnaliseRLB2_T5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB2_T5)->max('id');
    $statusRLB2_T5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB2_T5)->value('status_id');

    if ($statusSC_01 == 5 || $statusSC_02 == 5 || $statusSA_01 == 5 || $statusAPD == 5 || $statusB1_SCRUBBER == 5 || $statusB2_SCRUBBER == 5 || $statusEG == 5 || $statusRLB1T1_2 == 5 ||
    $statusRLB_3SB == 5 || $statusAPD == 5 || $statusRLB1T3_4  == 5 || $statusRLB_3SB_T3_4 == 5 || $statusRLB2T3_4 == 5 || $statusRLB1_T5 == 5 || $statusRLB2_T5 == 5) {
      $decapagem_processo_status = 5;
    } elseif ($statusSC_01 == 4 || $statusSC_02 == 4 || $statusSA_01 == 4 || $statusAPD == 4 || $statusB1_SCRUBBER == 4 || $statusB2_SCRUBBER == 4 || $statusEG == 4 || $statusRLB1T1_2 == 4 ||
    $statusRLB_3SB == 4 || $statusAPD == 4 || $statusRLB1T3_4  == 4 || $statusRLB_3SB_T3_4 == 4 || $statusRLB2T3_4 == 4 || $statusRLB1_T5 == 4 || $statusRLB2_T5 == 4) {
      $decapagem_processo_status = 4;
    } elseif ($statusSC_01 == 3 || $statusSC_02 == 3 || $statusSA_01 == 3 || $statusAPD == 3 || $statusB1_SCRUBBER == 3 || $statusB2_SCRUBBER == 3 || $statusEG == 3 || $statusRLB1T1_2 == 3 ||
    $statusRLB_3SB == 3 || $statusAPD == 3 || $statusRLB1T3_4  == 3 || $statusRLB_3SB_T3_4 == 3 || $statusRLB2T3_4 == 3 || $statusRLB1_T5 == 3 || $statusRLB2_T5 == 3) {
      $decapagem_processo_status = 3;
    }
    else {
      $decapagem_processo_status = "";
    }

    return $decapagem_processo_status;
  }

  public static function decapagem_saida_Menu() {
    $decapagem_saida_status = "";
    //NAVALHA DE AR QUENTE 01
    $tag_vibracaoNAR_Q1 = "VB 72 200 210 162 000 - 000001";
    $idAtividadeNAR_Q1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoNAR_Q1)->value('id');
    $idAnaliseNAR_Q1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_Q1)->max('id');
    $statusNAR_Q1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_Q1)->value('status_id');
    //NAVALHA DE AR QUENTE 02
    $tag_vibracaoNAR_Q2 = "VB 72 200 210 162 000 - 000002";
    $idAtividadeNAR_Q2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoNAR_Q2)->value('id');
    $idAnaliseNAR_Q2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_Q2)->max('id');
    $statusNAR_Q2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_Q2)->value('status_id');
    //NAVALHA DE AR QUENTE 03
    $tag_vibracaoNAR_Q3 = "VB 72 200 210 162 000 - 000003";
    $idAtividadeNAR_Q3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoNAR_Q3)->value('id');
    $idAnaliseNAR_Q3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_Q3)->max('id');
    $statusNAR_Q3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_Q3)->value('status_id');
    //CABECOTE APARADOR 1 //CABEÇOTE APARADOR AC APARADOR DE BORDAS -  ENGRENAGEM 6-8
    $tag_vibracaoCA_E6_8 = "VB 72 200 210 195 000 - 000002";
    $idAtividadeCA_E6_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCA_E6_8)->value('id');
    $idAnaliseCA_E6_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA_E6_8)->max('id');
    $statusCA_E6_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA_E6_8)->value('status_id');
    //CABECOTE APARADOR 2 //CABEÇOTE APARADOR AC APARADOR DE BORDAS -  ENGRENAGEM 2-4
    $tag_vibracaoCA_E2_4 = "VB 72 200 210 195 000 - 000001";
    $idAtividadeCA_E2_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCA_E2_4)->value('id');
    $idAnaliseCA_E2_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA_E2_4)->max('id');
    $statusCA_E2_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA_E2_4)->value('status_id');
    //CABECOTE APARADOR 3 //CABEÇOTE APARADOR OP APARADOR DE BORDAS -  ENGRENAGEM 5-7
    $tag_vibracaoCA_E5_7 = "VB 72 200 210 192 000 - 000001";
    $idAtividadeCA_E5_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCA_E5_7)->value('id');
    $idAnaliseCA_E5_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA_E5_7)->max('id');
    $statusCA_E5_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA_E5_7)->value('status_id');
    //CABECOTE APARADOR 4 //CABEÇOTE APARADOR OP APARADOR DE BORDAS -  ENGRENAGEM 1-3
    $tag_vibracaoCA_E1_3 = "VB 72 200 210 192 000 - 000002";
    $idAtividadeCA_E1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCA_E1_3)->value('id');
    $idAnaliseCA_E1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA_E1_3)->max('id');
    $statusCA_E1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA_E1_3)->value('status_id');
    //2 REDUTOR //ROLO PUXADOR DIRECIONAL - 2º REDUTOR
    $tag_vibracaoRPD_2R = "VB 72 200 210 171 000 - 000002";
    $idAtividadeRPD_2R = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRPD_2R)->value('id');
    $idAnaliseRPD_2R = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPD_2R)->max('id');
    $statusRPD_2R = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPD_2R)->value('status_id');
    //ACIONAMENTO PRINCIPAL ENROLADEIRA //ACIONAMENTO PRINCIPAL ENROLADEIRA - MOTOR E REDUTOR
    $tag_vibracaoAPE_MR = "VB 72 200 210 291 000 - 000001";
    $idAtividadeAPE_MR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPE_MR)->value('id');
    $idAnaliseAPE_MR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_MR)->max('id');
    $statusAPE_MR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_MR)->value('status_id');
    //TENSOR 3 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 03
    $tag_vibracaoART_M3 = "VB 72 200 210 246 000 - 000003";
    $idAtividadeART_M3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoART_M3)->value('id');
    $idAnaliseART_M3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_M3)->max('id');
    $statusART_M3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_M3)->value('status_id');
    //TENSOR 2 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 02
    $tag_vibracaoART_M2 = "VB 72 200 210 246 000 - 000002";
    $idAtividadeART_M2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoART_M2)->value('id');
    $idAnaliseART_M2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_M2)->max('id');
    $statusART_M2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_M2)->value('status_id');
    //TENSOR 1 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 01
    $tag_vibracaoART_M1 = "VB 72 200 210 246 000 - 000001";
    $idAtividadeART_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoART_M1)->value('id');
    $idAnaliseART_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_M1)->max('id');
    $statusART_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_M1)->value('status_id');
    //PICOTADEIRA
    $tag_vibracaoPIC = "VB 72 200 210 234 000 - 000001";
    $idAtividadePIC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoPIC)->value('id');
    $idAnalisePIC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePIC)->max('id');
    $statusPIC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePIC)->value('status_id');
    //FIFE PUXADOR DIRECIONADOR //ROLO PUXADOR DIRECIONAL - UNIDADE HIDRÁULICA FIFE
    $tag_vibracaoFIFE_PD = "VB 72 200 210 171 000 - 000003";
    $idAtividadeFIFE_PD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFIFE_PD)->value('id');
    $idAnaliseFIFE_PD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_PD)->max('id');
    $statusFIFE_PD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_PD)->value('status_id');
    //ROLO PUXADOR DIRECIONAL - MOTOR E 1º REDUTOR
    $tag_vibracaoRLB2_T5 = "VB 72 200 210 171 000 - 000001";
    $idAtividadeRLB2_T5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRLB2_T5)->value('id');
    $idAnaliseRLB2_T5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRLB2_T5)->max('id');
    $statusRLB2_T5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRLB2_T5)->value('status_id');
    //FIFE ENROLADEIRA //CENTRALIZAÇÃO ENROLADEIRA - FIFE BOMBA PRINCIPAL
    $tag_vibracaoCE_FBP = "VB 72 200 210 294 000 - 000001";
    $idAtividadeCE_FBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCE_FBP)->value('id');
    $idAnaliseCE_FBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCE_FBP)->max('id');
    $statusCE_FBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCE_FBP)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA RECIRCULAÇÃO 5
    $tag_vibracaoSH_BR5 = "VB 72 200 210 321 000 - 000005";
    $idAtividadeSH_BR5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_BR5)->value('id');
    $idAnaliseSH_BR5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_BR5)->max('id');
    $statusSH_BR5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_BR5)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA 04
    $tag_vibracaoSH_B4 = "VB 72 200 210 321 000 - 000004";
    $idAtividadeSH_B4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_B4)->value('id');
    $idAnaliseSH_B4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_B4)->max('id');
    $statusSH_B4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_B4)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA  03
    $tag_vibracaoSH_B3 = "VB 72 200 210 321 000 - 000003";
    $idAtividadeSH_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_B3)->value('id');
    $idAnaliseSH_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_B3)->max('id');
    $statusSH_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_B3)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA 02
    $tag_vibracaoSH_B2 = "VB 72 200 210 321 000 - 000002";
    $idAtividadeSH_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_B2)->value('id');
    $idAnaliseSH_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_B2)->max('id');
    $statusSH_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_B2)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAIDA - BOMBA 01
    $tag_vibracaoSH_B1 = "VB 72 200 210 321 000 - 000001";
    $idAtividadeSH_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSH_B1)->value('id');
    $idAnaliseSH_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSH_B1)->max('id');
    $statusSH_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSH_B1)->value('status_id');

    if ($statusNAR_Q1 == 5 || $statusNAR_Q2 == 5 || $statusNAR_Q3 == 5 || $statusCA_E6_8 == 5 || $statusCA_E2_4 == 5 || $statusCA_E5_7 == 5 || $statusCA_E1_3 == 5 || $statusRPD_2R == 5 ||
    $statusAPE_MR == 5 || $statusART_M3 == 5 || $statusART_M2 == 5 || $statusART_M1 == 5 || $statusPIC == 5 || $statusFIFE_PD == 5 || $statusRLB2_T5 == 5 || $statusCE_FBP == 5 ||
    $statusSH_BR5 == 5 || $statusSH_B4 == 5 || $statusSH_B3 == 5 || $statusSH_B2 == 5 || $statusSH_B1 == 5) {
      $decapagem_saida_status = 5;
    } elseif ($statusNAR_Q1 == 4 || $statusNAR_Q2 == 4 || $statusNAR_Q3 == 4 || $statusCA_E6_8 == 4 || $statusCA_E2_4 == 4 || $statusCA_E5_7 == 4 || $statusCA_E1_3 == 4 || $statusRPD_2R == 4 ||
    $statusAPE_MR == 4 || $statusART_M3 == 4 || $statusART_M2 == 4 || $statusART_M1 == 4 || $statusPIC == 4 || $statusFIFE_PD == 4 || $statusRLB2_T5 == 4 || $statusCE_FBP == 4 ||
    $statusSH_BR5 == 4 || $statusSH_B4 == 4 || $statusSH_B3 == 4 || $statusSH_B2 == 4 || $statusSH_B1 == 4) {
      $decapagem_saida_status = 4;
    } elseif ($statusNAR_Q1 == 3 || $statusNAR_Q2 == 3 || $statusNAR_Q3 == 3 || $statusCA_E6_8 == 3 || $statusCA_E2_4 == 3 || $statusCA_E5_7 == 3 || $statusCA_E1_3 == 3 || $statusRPD_2R == 3 ||
    $statusAPE_MR == 3 || $statusART_M3 == 3 || $statusART_M2 == 3 || $statusART_M1 == 3 || $statusPIC == 3 || $statusFIFE_PD == 3 || $statusRLB2_T5 == 3 || $statusCE_FBP == 3 ||
    $statusSH_BR5 == 3 || $statusSH_B4 == 3 || $statusSH_B3 == 3 || $statusSH_B2 == 3 || $statusSH_B1 == 3) {
      $decapagem_saida_status = 3;
    }
    else {
      $decapagem_saida_status = "";
    }

    return $decapagem_saida_status;
  }

  public static function decapagem_Menu() {
    $lds_status = "";
    $decapagem_entrada_status = AuxFuncRelTec::decapagem_entrada_Menu();
    $decapagem_processo_status = AuxFuncRelTec::decapagem_processo_Menu();
    $decapagem_saida_status = AuxFuncRelTec::decapagem_saida_Menu();

    if ($decapagem_entrada_status == 5 || $decapagem_processo_status == 5 || $decapagem_saida_status == 5) {
      $lds_status = 5;
    } elseif ($decapagem_entrada_status == 4 || $decapagem_processo_status == 4 || $decapagem_saida_status == 4) {
      $lds_status = 4;
    } elseif ($decapagem_entrada_status == 3 || $decapagem_processo_status == 3 || $decapagem_saida_status == 3) {
      $lds_status = 3;
    } else {
      $lds_status = "";
    }

    return $lds_status;
  }

  public static function lds_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lds_linha1 = 10;
    $lds_linha2 = 22;
    $lds_normal = aux::GeralPorLinhaVib($atual1, 3, $lds_linha1, $lds_linha2);
    return $lds_normal;
  }
  public static function lds_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lds_linha1 = 10;
    $lds_linha2 = 22;
    $lds_alarme = aux::GeralPorLinhaVib($atual1, 4, $lds_linha1, $lds_linha2);
    return $lds_alarme;
  }
  public static function lds_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lds_linha1 = 10;
    $lds_linha2 = 22;
    $lds_critico = aux::GeralPorLinhaVib($atual1, 5, $lds_linha1, $lds_linha2);
    return $lds_critico;
  }

  public static function laminador_Menu() {
    $laminador_status = "";
    //ENROLADEIRA 2
    $tag_vibracaoENR_2 = "VB 72 300 310 204 000 - 000001";
    $idAtividadeENR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoENR_2)->value('id');
    $idAnaliseENR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR_2)->max('id');
    $statusENR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR_2)->value('status_id');
    //SUPORTE ENROLADEIRA 2
    $tag_vibracaoSUP_ENR_2 = "VB 72 300 310 213 000 - 000001";
    $idAtividadeSUP_ENR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSUP_ENR_2)->value('id');
    $idAnaliseSUP_ENR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSUP_ENR_2)->max('id');
    $statusSUP_ENR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSUP_ENR_2)->value('status_id');
    //ROLO MEDIDOR DE PLAN. ENROLADEIRA 2
    $tag_vibracaoRM_ENR_2 = "VB 72 300 310 189 000 - 000001";
    $idAtividadeRM_ENR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRM_ENR_2)->value('id');
    $idAnaliseRM_ENR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRM_ENR_2)->max('id');
    $statusRM_ENR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRM_ENR_2)->value('status_id');
    //MOTOR DE ACIONAMENTO DA CALDEIRA
    $tag_vibracaoMAC = "VB 72 300 310 168 000 - 000001";
    $idAtividadeMAC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoMAC)->value('id');
    $idAnaliseMAC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMAC)->max('id');
    $statusMAC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMAC)->value('status_id');
    //ROLO MED. DE PLANIC. DA ENROLADEIRA 1
    $tag_vibracaoRMPE_1 = "VB 72 300 310 102 000 - 000001";
    $idAtividadeRMPE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRMPE_1)->value('id');
    $idAnaliseRMPE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRMPE_1)->max('id');
    $statusRMPE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRMPE_1)->value('status_id');
    //SUPORTE DA ENROLADEIRA 1
    $tag_vibracaoSUP_ENR_1 = "VB 72 300 310 066 000 - 000001";
    $idAtividadeSUP_ENR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSUP_ENR_1)->value('id');
    $idAnaliseSUP_ENR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSUP_ENR_1)->max('id');
    $statusSUP_ENR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSUP_ENR_1)->value('status_id');
    //ENROLADEIRA 1
    $tag_vibracaoENR_1 = "VB 72 300 310 057 000 - 000001";
    $idAtividadeENR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoENR_1)->value('id');
    $idAnaliseENR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR_1)->max('id');
    $statusENR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR_1)->value('status_id');
    //ACIONAMENTO MOTOR DA DESENROLADEIRA
    $tag_vibracaoAMD = "VB 72 300 310 021 000 - 000001";
    $idAtividadeAMD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAMD)->value('id');
    $idAnaliseAMD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAMD)->max('id');
    $statusAMD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAMD)->value('status_id');

    if ($statusENR_2 == 5 || $statusSUP_ENR_2 == 5 || $statusRM_ENR_2 == 5 || $statusMAC == 5 || $statusRMPE_1 == 5 || $statusSUP_ENR_1 == 5 || $statusENR_1 == 5 || $statusAMD == 5) {
      $laminador_status = 5;
    } elseif ($statusENR_2 == 4 || $statusSUP_ENR_2 == 4 || $statusRM_ENR_2 == 4 || $statusMAC == 4 || $statusRMPE_1 == 4 || $statusSUP_ENR_1 == 4 || $statusENR_1 == 4 || $statusAMD == 4) {
      $laminador_status = 4;
    } elseif ($statusENR_2 == 3 || $statusSUP_ENR_2 == 3 || $statusRM_ENR_2 == 3 || $statusMAC == 3 || $statusRMPE_1 == 3 || $statusSUP_ENR_1 == 3 || $statusENR_1 == 3 || $statusAMD == 3) {
      $laminador_status = 3;
    }
    else {
      $laminador_status = "";
    }

    return $laminador_status;
  }

  public static function laminador_porao_Menu() {
    $laminador_porao_status = "";
    //TANQUE DE RETORNO 1 //TANQUE DE EMULSÃO - SISTEMA DE EMULSÃO - BOMBA 01
    $tag_vibracaoTE_SE_B1 = "VB 72 300 310 295 000 - 000001";
    $idAtividadeTE_SE_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTE_SE_B1)->value('id');
    $idAnaliseTE_SE_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTE_SE_B1)->max('id');
    $statusTE_SE_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTE_SE_B1)->value('status_id');
    //TANQUE DE EMULSÃO - SISTEMA DE EMULSÃO - BOMBA 02
    $tag_vibracaoTE_SE_B2 = "VB 72 300 310 295 000 - 000002";
    $idAtividadeTE_SE_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTE_SE_B2)->value('id');
    $idAnaliseTE_SE_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTE_SE_B2)->max('id');
    $statusTE_SE_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTE_SE_B2)->value('status_id');
    //BAIXA PRESSAO RECIRCULACAO 1 //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - RECIRCULAÇÃO 01
    $tag_vibracaoSHBP_R1 = "VB 72 300 310 267 000 - 000005";
    $idAtividadeSHBP_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_R1)->value('id');
    $idAnaliseSHBP_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_R1)->max('id');
    $statusSHBP_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_R1)->value('status_id');
    //BAIXA PRESSAO RECIRCULACAO 2 //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - RECIRCULAÇÃO 02
    $tag_vibracaoSHBP_R2 = "VB 72 300 310 267 000 - 000006";
    $idAtividadeSHBP_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_R2)->value('id');
    $idAnaliseSHBP_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_R2)->max('id');
    $statusSHBP_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_R2)->value('status_id');
    //SISTEMA MOS BB01
    $tag_vibracaoSM_BB01 = "VB 72 300 310 270 000 - 000001";
    $idAtividadeSM_BB01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSM_BB01)->value('id');
    $idAnaliseSM_BB01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSM_BB01)->max('id');
    $statusSM_BB01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSM_BB01)->value('status_id');
    //SISTEMA MOS BB02
    $tag_vibracaoSM_BB02 = "VB 72 300 310 270 000 - 000002";
    $idAtividadeSM_BB02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSM_BB02)->value('id');
    $idAnaliseSM_BB02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSM_BB02)->max('id');
    $statusSM_BB02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSM_BB02)->value('status_id');
    //BAIXA PRESSAO 1
    //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - BOMBA 01
    $tag_vibracaoSHBP_B1 = "VB 72 300 310 267 000 - 000001";
    $idAtividadeSHBP_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_B1)->value('id');
    $idAnaliseSHBP_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_B1)->max('id');
    $statusSHBP_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_B1)->value('status_id');
    //BAIXA PRESSAO 2
    //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - BOMBA 02
    $tag_vibracaoSHBP_B2 = "VB 72 300 310 267 000 - 000002";
    $idAtividadeSHBP_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_B2)->value('id');
    $idAnaliseSHBP_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_B2)->max('id');
    $statusSHBP_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_B2)->value('status_id');
    //BAIXA PRESSAO 3
    //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - BOMBA 03
    $tag_vibracaoSHBP_B3 = "VB 72 300 310 267 000 - 000003";
    $idAtividadeSHBP_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_B3)->value('id');
    $idAnaliseSHBP_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_B3)->max('id');
    $statusSHBP_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_B3)->value('status_id');
    //BAIXA PRESSAO 4 //SISTEMA HIDRÁULICO - BAIXA PRESSÃO - BOMBA 04
    $tag_vibracaoSHBP_B4 = "VB 72 300 310 267 000 - 000004";
    $idAtividadeSHBP_B4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHBP_B4)->value('id');
    $idAnaliseSHBP_B4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP_B4)->max('id');
    $statusSHBP_B4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP_B4)->value('status_id');
    //ALTA PRESSAO RECIRCULACAO 2 //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO - BOMBA 02
    $tag_vibracaoSHAP_B2 = "VB 72 300 310 264 000 - 000004";
    $idAtividadeSHAP_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHAP_B2)->value('id');
    $idAnaliseSHAP_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP_B2)->max('id');
    $statusSHAP_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP_B2)->value('status_id');
    //ALTA PRESSAO RECIRCULACAO 1 //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO - BOMBA 01
    $tag_vibracaoSHAP_B1 = "VB 72 300 310 264 000 - 000003";
    $idAtividadeSHAP_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHAP_B1)->value('id');
    $idAnaliseSHAP_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP_B1)->max('id');
    $statusSHAP_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP_B1)->value('status_id');
    //SISTEMA ALTA PRESSAO 2 //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO - RECIRCULAÇÃO 02
    $tag_vibracaoSHAP_R2 = "VB 72 300 310 264 000 - 000002";
    $idAtividadeSHAP_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHAP_R2)->value('id');
    $idAnaliseSHAP_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP_R2)->max('id');
    $statusSHAP_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP_R2)->value('status_id');
    //SISTEMA ALTA PRESSAO 1 //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO - RECIRCULAÇÃO 01
    $tag_vibracaoSHAP_R1 = "VB 72 300 310 264 000 - 000001";
    $idAtividadeSHAP_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSHAP_R1)->value('id');
    $idAnaliseSHAP_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP_R1)->max('id');
    $statusSHAP_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP_R1)->value('status_id');
    //SISTEMA ZOS BE01
    $tag_vibracaoSZ_B1 = "VB 72 300 310 273 000 - 000001";
    $idAtividadeSZ_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSZ_B1)->value('id');
    $idAnaliseSZ_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ_B1)->max('id');
    $statusSZ_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ_B1)->value('status_id');
    //SISTEMA ZOS BE02
    $tag_vibracaoSZ_B2 = "VB 72 300 310 273 000 - 000002";
    $idAtividadeSZ_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSZ_B2)->value('id');
    $idAnaliseSZ_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ_B2)->max('id');
    $statusSZ_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ_B2)->value('status_id');
    //SISTEMA DE VENTILAÇÃO - OIL CELLAR
    $tag_vibracaoSV_OC = "VB 72 300 310 297 000 - 000001";
    $idAtividadeSV_OC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSV_OC)->value('id');
    $idAnaliseSV_OC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSV_OC)->max('id');
    $statusSV_OC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSV_OC)->value('status_id');

    if ($statusTE_SE_B1 == 5 || $statusTE_SE_B2 == 5 || $statusSHBP_R1 == 5 || $statusSHBP_R2 == 5 || $statusSM_BB01 == 5 || $statusSM_BB02 == 5 ||
    $statusSHBP_B1 == 5 || $statusSHBP_B2 == 5 || $statusSHBP_B3 == 5 || $statusSHBP_B4 == 5 || $statusSHAP_B2 == 5 || $statusSHAP_B1 == 5 ||
    $statusSHAP_R2 == 5 || $statusSHAP_R1 == 5 || $statusSZ_B1 == 5 || $statusSZ_B2 == 5 || $statusSV_OC == 5) {
      $laminador_porao_status = 5;
    } elseif ($statusTE_SE_B1 == 4 || $statusTE_SE_B2 == 4 || $statusSHBP_R1 == 4 || $statusSHBP_R2 == 4 || $statusSM_BB01 == 4 || $statusSM_BB02 == 4 ||
    $statusSHBP_B1 == 4 || $statusSHBP_B2 == 4 || $statusSHBP_B3 == 4 || $statusSHBP_B4 == 4 || $statusSHAP_B2 == 4 || $statusSHAP_B1 == 4 ||
    $statusSHAP_R2 == 4 || $statusSHAP_R1 == 4 || $statusSZ_B1 == 4 || $statusSZ_B2 == 4 || $statusSV_OC == 4) {
      $laminador_porao_status = 4;
    } elseif ($statusTE_SE_B1 == 3 || $statusTE_SE_B2 == 3 || $statusSHBP_R1 == 3 || $statusSHBP_R2 == 3 || $statusSM_BB01 == 3 || $statusSM_BB02 == 3 ||
    $statusSHBP_B1 == 3 || $statusSHBP_B2 == 3 || $statusSHBP_B3 == 3 || $statusSHBP_B4 == 3 || $statusSHAP_B2 == 3 || $statusSHAP_B1 == 3 ||
    $statusSHAP_R2 == 3 || $statusSHAP_R1 == 3 || $statusSZ_B1 == 3 || $statusSZ_B2 == 3 || $statusSV_OC == 3) {
      $laminador_porao_status = 3;
    }
    else {
      $laminador_porao_status = "";
    }

    return $laminador_porao_status;
  }

  public static function laminador_oficina_Menu() {
    $laminador_oficina_status = "";
    //FILTRO A VACUO BB01 //FILTRO A VÁCUO - SISTEMA DE EMULSÃO - BOMBA 01
    $tag_vibracaoFVSE_B1 = "VB 72 300 310 294 000 - 000001";
    $idAtividadeFVSE_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFVSE_B1)->value('id');
    $idAnaliseFVSE_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFVSE_B1)->max('id');
    $statusFVSE_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFVSE_B1)->value('status_id');
    //FILTRO A VACUO BB02 //FILTRO A VÁCUO - SISTEMA DE EMULSÃO - BOMBA 02
    $tag_vibracaoTRSE_B2 = "VB 72 300 310 294 000 - 000002";
    $idAtividadeTRSE_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRSE_B2)->value('id');
    $idAnaliseTRSE_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRSE_B2)->max('id');
    $statusTRSE_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRSE_B2)->value('status_id');
    //WS 5 CARRO LONGITUDINAL (EIXO Z)
    $tag_vibracaoCL_EIXO_Z = "VB 72 900 920 018 000 - 000001";
    $idAtividadeCL_EIXO_Z = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCL_EIXO_Z)->value('id');
    $idAnaliseCL_EIXO_Z = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCL_EIXO_Z)->max('id');
    $statusCL_EIXO_Z = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCL_EIXO_Z)->value('status_id');
    //WS 5 CABECOTE MOVEL Z1 E C
    $tag_vibracaoCM_Z1_C = "VB 72 900 920 003 000 - 000001";
    $idAtividadeCM_Z1_C = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCM_Z1_C)->value('id');
    $idAnaliseCM_Z1_C = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCM_Z1_C)->max('id');
    $statusCM_Z1_C = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCM_Z1_C)->value('status_id');
    //WS 3 CABECOTE MOVEL Z
    $tag_vibracaoCM_Z = "VB 72 900 910 006 000 - 000001";
    $idAtividadeCM_Z = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCM_Z)->value('id');
    $idAnaliseCM_Z = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCM_Z)->max('id');
    $statusCM_Z = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCM_Z)->value('status_id');
    //SISTEMA  DE EMULSAO BB01 //TANQUE DE RETORNO - SISTEMA DE EMULSÃO - BOMBA 01
    $tag_vibracaoTRSE_B1 = "VB 72 300 310 285 000 - 000002";
    $idAtividadeTRSE_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRSE_B1)->value('id');
    $idAnaliseTRSE_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRSE_B1)->max('id');
    $statusTRSE_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRSE_B1)->value('status_id');
    //SISTEMA  DE EMULSAO BB02 //TANQUE DE RETORNO - SISTEMA DE EMULSÃO - BOMBA 02
    $tag_vibracaoTRSE_B2 = "VB 72 300 310 285 000 - 000001";
    $idAtividadeTRSE_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRSE_B2)->value('id');
    $idAnaliseTRSE_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRSE_B2)->max('id');
    $statusTRSE_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRSE_B2)->value('status_id');
    //SISTEMA  DE EXAUSTAO
    $tag_vibracaoSE = "VB 72 300 310 300 000 - 000001";
    $idAtividadeSE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSE)->value('id');
    $idAnaliseSE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSE)->max('id');
    $statusSE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSE)->value('status_id');
    //WS 5 CABECOTE FIXO
    $tag_vibracaoCF = "VB 72 900 920 006 000 - 000001";
    $idAtividadeCF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCF)->value('id');
    $idAnaliseCF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCF)->max('id');
    $statusCF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCF)->value('status_id');
    //WS 5 CABECOTE FIXO EIXO C
    $tag_vibracaoCF_EIXO_C = "VB 72 900 910 003 000 - 000001";
    $idAtividadeCF_EIXO_C = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCF_EIXO_C)->value('id');
    $idAnaliseCF_EIXO_C = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCF_EIXO_C)->max('id');
    $statusCF_EIXO_C = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCF_EIXO_C)->value('status_id');

    if ($statusFVSE_B1 == 5 || $statusTRSE_B2 == 5 || $statusCL_EIXO_Z == 5 || $statusCM_Z1_C == 5 || $statusCM_Z == 5 ||
    $statusTRSE_B1 == 5 || $statusTRSE_B2 == 5 || $statusSE == 5 || $statusCF == 5 || $statusCF_EIXO_C == 5) {
      $laminador_oficina_status = 5;
    } elseif ($statusFVSE_B1 == 4 || $statusTRSE_B2 == 4 || $statusCL_EIXO_Z == 4 || $statusCM_Z1_C == 4 || $statusCM_Z == 4 ||
    $statusTRSE_B1 == 4 || $statusTRSE_B2 == 4 || $statusSE == 4 || $statusCF == 4 || $statusCF_EIXO_C == 4) {
      $laminador_oficina_status = 4;
    } elseif ($statusFVSE_B1 == 3 || $statusTRSE_B2 == 3 || $statusCL_EIXO_Z == 3 || $statusCM_Z1_C == 3 || $statusCM_Z == 3 ||
    $statusTRSE_B1 == 3 || $statusTRSE_B2 == 3 || $statusSE == 3 || $statusCF == 3 || $statusCF_EIXO_C == 3) {
      $laminador_oficina_status = 3;
    }
    else {
      $laminador_oficina_status = "";
    }

    return $laminador_oficina_status;
  }

  public static function lrf_Menu() {
    $lrf_status = "";
    $laminador_status = AuxFuncRelTec::laminador_Menu();
    $laminador_porao_status = AuxFuncRelTec::laminador_porao_Menu();
    $laminador_oficina_status = AuxFuncRelTec::laminador_oficina_Menu();

    if ($laminador_status == 5 || $laminador_porao_status == 5 || $laminador_oficina_status == 5) {
      $lrf_status = 5;
    } elseif ($laminador_status == 4 || $laminador_porao_status == 4 || $laminador_oficina_status == 4) {
      $lrf_status = 4;
    } elseif ($laminador_status == 3 || $laminador_porao_status == 3 || $laminador_oficina_status == 3) {
      $lrf_status = 3;
    } else {
      $lrf_status = "";
    }

    return $lrf_status;
  }

  public static function lrf_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lrf_linha1 = 12;
    $lrf_linha2 = 0;
    $lrf_normal = aux::GeralPorLinhaVib($atual1, 3, $lrf_linha1, $lrf_linha2);
    return $lrf_normal;
  }
  public static function lrf_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lrf_linha1 = 12;
    $lrf_linha2 = 0;
    $lrf_alarme = aux::GeralPorLinhaVib($atual1, 4, $lrf_linha1, $lrf_linha2);
    return $lrf_alarme;
  }
  public static function lrf_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lrf_linha1 = 12;
    $lrf_linha2 = 0;
    $lrf_critico = aux::GeralPorLinhaVib($atual1, 5, $lrf_linha1, $lrf_linha2);
    return $lrf_critico;
  }

  public static function utilidades_Menu() {
    $utilidades_status = "";
    //GERACAO AR 1
    $tag_vibracaoG1 = "VB 72 700 775 010 000 - 000001";
    $idAtividadeG1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoG1)->value('id');
    $idAnaliseG1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeG1)->max('id');
    $statusG1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseG1)->value('status_id');
    //GERACAO AR 2
    $tag_vibracaoG2 = "VB 72 700 775 020 000 - 000001";
    $idAtividadeG2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoG2)->value('id');
    $idAnaliseG2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeG2)->max('id');
    $statusG2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseG2)->value('status_id');
    //GERACAO AR 3
    $tag_vibracaoG3 = "VB 72 700 775 030 000 - 000001";
    $idAtividadeG3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoG3)->value('id');
    $idAnaliseG3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeG3)->max('id');
    $statusG3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseG3)->value('status_id');
    //GERAÇÃO AR 96 VSD160-FF
    $tag_vibracaoGA_96 = "VB 72 700 775 130 000 - 000001";
    $idAtividadeGA_96 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA_96)->value('id');
    $idAnaliseGA_96 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA_96)->max('id');
    $statusGA_96 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA_96)->value('status_id');
    //GERACAO AR 5 - 94
    $tag_vibracaoGA_94 = "VB 72 700 775 050 000 - 000001";
    $idAtividadeGA_94 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA_94)->value('id');
    $idAnaliseGA_94 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA_94)->max('id');
    $statusGA_94 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA_94)->value('status_id');
    //GERACAO AR 6 - 95
    $tag_vibracaoGA_95 = "VB 72 700 775 060 000 - 000001";
    $idAtividadeGA_95 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA_95)->value('id');
    $idAnaliseGA_95 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA_95)->max('id');
    $statusGA_95 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA_95)->value('status_id');
    //GERACAO AR 7 - 93
    $tag_vibracaoGA_93 = "VB 72 700 775 040 000 - 000001";
    $idAtividadeGA_93 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA_93)->value('id');
    $idAnaliseGA_93 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA_93)->max('id');
    $statusGA_93 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA_93)->value('status_id');
    //TORRE DE RESFRIAMENTO 5
    $tag_vibracaoTR_5 = "VB 72 700 725 070 000 - 000005";
    $idAtividadeTR_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_5)->value('id');
    $idAnaliseTR_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_5)->max('id');
    $statusTR_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_5)->value('status_id');
    //TORRE DE RESFRIAMENTO 4
    $tag_vibracaoTR_4 = "VB 72 700 725 070 000 - 000004";
    $idAtividadeTR_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_4)->value('id');
    $idAnaliseTR_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_4)->max('id');
    $statusTR_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_4)->value('status_id');
    //TORRE DE RESFRIAMENTO 3
    $tag_vibracaoTR_3 = "VB 72 700 725 070 000 - 000003";
    $idAtividadeTR_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_3)->value('id');
    $idAnaliseTR_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_3)->max('id');
    $statusTR_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_3)->value('status_id');
    //TORRE DE RESFRIAMENTO 2
    $tag_vibracaoTR_2 = "VB 72 700 725 070 000 - 000002";
    $idAtividadeTR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_2)->value('id');
    $idAnaliseTR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_2)->max('id');
    $statusTR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_2)->value('status_id');
    //TORRE DE RESFRIAMENTO 1
    $tag_vibracaoTR_1 = "VB 72 700 725 070 000 - 000001";
    $idAtividadeTR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTR_1)->value('id');
    $idAnaliseTR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR_1)->max('id');
    $statusTR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR_1)->value('status_id');
    //SISTEMA DE AERACAO - AERADOR 02
    $tag_vibracaoSAA_02 = "VB 72 700 740 030 000 - 000002";
    $idAtividadeSAA_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAA_02)->value('id');
    $idAnaliseSAA_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAA_02)->max('id');
    $statusSAA_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAA_02)->value('status_id');
    //FLOCULAÇÃO - AGITADOR 02
    $tag_vibracaoFA_02 = "VB 72 700 740 120 000 - 000002";
    $idAtividadeFA_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFA_02)->value('id');
    $idAnaliseFA_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFA_02)->max('id');
    $statusFA_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFA_02)->value('status_id');
    //ULTRAFILTRACAO 1 //B05 ULTRAFILTRAÇÃO 2 MODULOS E VALVULAS - BOMBA B05P11
    $tag_vibracaoULT1_B05P11 = "VB 72 700 745 150 000 - 000002";
    $idAtividadeULT1_B05P11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoULT1_B05P11)->value('id');
    $idAnaliseULT1_B05P11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeULT1_B05P11)->max('id');
    $statusULT1_B05P11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseULT1_B05P11)->value('status_id');
    //ULTRAFILTRACAO 2 //B05 ULTRAFILTRAÇÃO 2 MODULOS E VALVULAS - BOMBA B05P01
    $tag_vibracaoULT2_B05P01 = "VB 72 700 745 150 000 - 000001";
    $idAtividadeULT2_B05P01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoULT2_B05P01)->value('id');
    $idAnaliseULT2_B05P01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeULT2_B05P01)->max('id');
    $statusULT2_B05P01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseULT2_B05P01)->value('status_id');
    //ULTRAFILTRACAO 3 //B03- ULTRAFILTRAÇÃO 1 MODULOS E VALVULAS - BOMBA B03P11
    $tag_vibracaoULT1_B03P11 = "VB 72 700 745 120 000 - 000002";
    $idAtividadeULT1_B03P11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoULT1_B03P11)->value('id');
    $idAnaliseULT1_B03P11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeULT1_B03P11)->max('id');
    $statusULT1_B03P11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseULT1_B03P11)->value('status_id');
    //COAGULACAO 1 //SIST. DE NEUTRALIZAÇÃO PRIM. COAGULAÇÃO - AGITADOR 02
    $tag_vibracaoSNPC_A02 = "VB 72 700 740 105 000 - 000002";
    $idAtividadeSNPC_A02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSNPC_A02)->value('id');
    $idAnaliseSNPC_A02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSNPC_A02)->max('id');
    $statusSNPC_A02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSNPC_A02)->value('status_id');
    //COAGULACAO 2 //SIST. DE NEUTRALIZAÇÃO PRIM. COAGULAÇÃO - AGITADOR 01
    $tag_vibracaoSNPC_A1 = "VB 72 700 740 105 000 - 000001";
    $idAtividadeSNPC_A1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSNPC_A1)->value('id');
    $idAnaliseSNPC_A1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSNPC_A1)->max('id');
    $statusSNPC_A1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSNPC_A1)->value('status_id');
    //ULTRAFILTRACAO 4 //B03- ULTRAFILTRAÇÃO 1 MODULOS E VALVULAS - BOMBA B03P01
    $tag_vibracaoULT1_B03P01 = "VB 72 700 745 120 000 - 000001";
    $idAtividadeULT1_B03P01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoULT1_B03P01)->value('id');
    $idAnaliseULT1_B03P01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeULT1_B03P01)->max('id');
    $statusULT1_B03P01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseULT1_B03P01)->value('status_id');
    //FLOCULACAO 1 //AJUSTE DE PH
    $tag_vibracaoA_PH = "VB 72 700 740 025 000 - 000001";
    $idAtividadeA_PH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoA_PH)->value('id');
    $idAnaliseA_PH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_PH)->max('id');
    $statusA_PH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_PH)->value('status_id');
    //FLOCULACAO 2 //SIST. DE FLOCULAÇÃO P/ESPESSADOR - AGITADOR 01
    $tag_vibracaoSFE_A1 = "VB 72 700 740 120 000 - 000001";
    $idAtividadeSFE_A1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSFE_A1)->value('id');
    $idAnaliseSFE_A1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSFE_A1)->max('id');
    $statusSFE_A1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSFE_A1)->value('status_id');
    //SISTEMA DE AERACAO - AERADOR 01
    $tag_vibracaoSAA_01 = "VB 72 700 740 030 000 - 000001";
    $idAtividadeSAA_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAA_01)->value('id');
    $idAnaliseSAA_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAA_01)->max('id');
    $statusSAA_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAA_01)->value('status_id');
    //ESPACADOR FLOCULADOR
    $tag_vibracaoEF = "VB 72 700 740 125 000 - 000001";
    $idAtividadeEF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEF)->value('id');
    $idAnaliseEF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEF)->max('id');
    $statusEF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEF)->value('status_id');
    //CENTRIFUGA
    $tag_vibracaoCENT = "VB 72 700 740 115 000 - 000001";
    $idAtividadeCENT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCENT)->value('id');
    $idAnaliseCENT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCENT)->max('id');
    $statusCENT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCENT)->value('status_id');

    if ($statusG1 == 5 || $statusG2 == 5 || $statusG3 == 5 || $statusGA_96 == 5 || $statusGA_94 == 5 || $statusGA_95 == 5 || $statusGA_93 == 5 ||
    $statusTR_5 == 5 || $statusTR_4 == 5 || $statusTR_3 == 5 || $statusTR_2 == 5 || $statusTR_1 == 5 || $statusSAA_02 == 5 || $statusFA_02 == 5 ||
    $statusULT1_B05P11 == 5 || $statusULT2_B05P01 == 5 || $statusULT1_B03P11 == 5 || $statusSNPC_A02 == 5 || $statusSNPC_A1 == 5 || $statusULT1_B03P01 == 5 ||
    $statusA_PH == 5 || $statusSFE_A1 == 5 || $statusSAA_01 == 5 || $statusEF == 5 || $statusCENT == 5) {
      $utilidades_status = 5;
    } elseif ($statusG1 == 4 || $statusG2 == 4 || $statusG3 == 4 || $statusGA_96 == 4 || $statusGA_94 == 4 || $statusGA_95 == 4 || $statusGA_93 == 4 ||
    $statusTR_5 == 4 || $statusTR_4 == 4 || $statusTR_3 == 4 || $statusTR_2 == 4 || $statusTR_1 == 4 || $statusSAA_02 == 4 || $statusFA_02 == 4 ||
    $statusULT1_B05P11 == 4 || $statusULT2_B05P01 == 4 || $statusULT1_B03P11 == 4 || $statusSNPC_A02 == 4 || $statusSNPC_A1 == 4 || $statusULT1_B03P01 == 4 ||
    $statusA_PH == 4 || $statusSFE_A1 == 4 || $statusSAA_01 == 4 || $statusEF == 4 || $statusCENT == 4) {
      $utilidades_status = 4;
    } elseif ($statusG1 == 3 || $statusG2 == 3 || $statusG3 == 3 || $statusGA_96 == 3 || $statusGA_94 == 3 || $statusGA_95 == 3 || $statusGA_93 == 3 ||
    $statusTR_5 == 3 || $statusTR_4 == 3 || $statusTR_3 == 3 || $statusTR_2 == 3 || $statusTR_1 == 3 || $statusSAA_02 == 3 || $statusFA_02 == 3 ||
    $statusULT1_B05P11 == 3 || $statusULT2_B05P01 == 3 || $statusULT1_B03P11 == 3 || $statusSNPC_A02 == 3 || $statusSNPC_A1 == 3 || $statusULT1_B03P01 == 3 ||
    $statusA_PH == 3 || $statusSFE_A1 == 3 || $statusSAA_01 == 3 || $statusEF == 3 || $statusCENT == 3) {
      $utilidades_status = 3;
    }
    else {
      $utilidades_status = "";
    }

    return $utilidades_status;
  }

  public static function utilidades_casa_bombas_Menu() {
    $utilidades_casa_bombas_status = "";
    //SISTEMA DE BOMBEIO BB01 //SISTEMA DE BOMBEIO P/ GAC BOMBA 01
    $tag_vibracaoGAC_B1 = "VB 72 700 708 040 000 - 000002";
    $idAtividadeGAC_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGAC_B1)->value('id');
    $idAnaliseGAC_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGAC_B1)->max('id');
    $statusGAC_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGAC_B1)->value('status_id');
    //SISTEMA DE BOMBEIO BB02 //SISTEMA DE BOMBEIO P/ GAC BOMBA 02
    $tag_vibracaoGAC_B2 = "VB 72 700 708 040 000 - 000001";
    $idAtividadeGAC_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGAC_B2)->value('id');
    $idAnaliseGAC_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGAC_B2)->max('id');
    $statusGAC_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGAC_B2)->value('status_id');
    //SISTEMA DE BOMBEIO BB01 //SISTEMA DE BOMBEIO P/AGUA INDUST. - BOMBA 01
    $tag_vibracaoAI_B1 = "VB 72 700 708 040 000 - 000004";
    $idAtividadeAI_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAI_B1)->value('id');
    $idAnaliseAI_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAI_B1)->max('id');
    $statusAI_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAI_B1)->value('status_id');
    //SISTEMA DE BOMBEIO BB02 //SISTEMA DE BOMBEIO P/AGUA INDUST. - BOMBA 02
    $tag_vibracaoAI_B2 = "VB 72 700 708 040 000 - 000003";
    $idAtividadeAI_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAI_B2)->value('id');
    $idAnaliseAI_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAI_B2)->max('id');
    $statusAI_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAI_B2)->value('status_id');
    //M5
    $tag_vibracaoM5 = "VB 72 700 785 100 000 - 000005";
    $idAtividadeM5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM5)->value('id');
    $idAnaliseM5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM5)->max('id');
    $statusM5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM5)->value('status_id');
    //M4
    $tag_vibracaoM4 = "VB 72 700 785 100 000 - 000004";
    $idAtividadeM4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM4)->value('id');
    $idAnaliseM4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM4)->max('id');
    $statusM4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM4)->value('status_id');
    //M3
    $tag_vibracaoM3 = "VB 72 700 785 100 000 - 000003";
    $idAtividadeM3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM3)->value('id');
    $idAnaliseM3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM3)->max('id');
    $statusM3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM3)->value('status_id');
    //M6 //GERADOR/BOMBA DIESEL INCENDIO
    $tag_vibracaoM6 = "VB 72 700 785 070 000 - 000001";
    $idAtividadeM6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM6)->value('id');
    $idAnaliseM6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM6)->max('id');
    $statusM6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM6)->value('status_id');
    //M1 //SISTEMA DE BOMBEIO DE AGUA - BOMBA M1
    $tag_vibracaoM1 = "VB 72 700 785 100 000 - 000001";
    $idAtividadeM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM1)->value('id');
    $idAnaliseM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM1)->max('id');
    $statusM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM1)->value('status_id');
    //M2 //SISTEMA DE BOMBEIO DE AGUA - BOMBA M2
    $tag_vibracaoM2 = "VB 72 700 785 100 000 - 000002";
    $idAtividadeM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoM2)->value('id');
    $idAnaliseM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM2)->max('id');
    $statusM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM2)->value('status_id');

    if ($statusGAC_B1 == 5 || $statusGAC_B2 == 5 || $statusAI_B1 == 5 || $statusAI_B2 == 5 || $statusM5 == 5 || $statusM4 == 5 ||
    $statusM3 == 5 || $statusM6 == 5 || $statusM1 == 5 || $statusM2 == 5) {
      $utilidades_casa_bombas_status = 5;
    } elseif ($statusGAC_B1 == 4 || $statusGAC_B2 == 4 || $statusAI_B1 == 4 || $statusAI_B2 == 4 || $statusM5 == 4 || $statusM4 == 4 ||
    $statusM3 == 4 || $statusM6 == 4 || $statusM1 == 4 || $statusM2 == 4) {
      $utilidades_casa_bombas_status = 4;
    } elseif ($statusGAC_B1 == 3 || $statusGAC_B2 == 3 || $statusAI_B1 == 3 || $statusAI_B2 == 3 || $statusM5 == 3 || $statusM4 == 3 ||
    $statusM3 == 3 || $statusM6 == 3 || $statusM1 == 3 || $statusM2 == 3) {
      $utilidades_casa_bombas_status = 3;
    }
    else {
      $utilidades_casa_bombas_status = "";
    }

    return $utilidades_casa_bombas_status;
  }

  public static function utilidades_linhas_Menu() {
    $utilidades_linhas_status = "";
    //GERACAO AR 97 COMPRESSOR N1 CS
    $tag_vibracaoGA97 = "VB 72 700 775 120 000 - 000001";
    $idAtividadeGA97 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA97)->value('id');
    $idAnaliseGA97 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA97)->max('id');
    $statusGA97 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA97)->value('status_id');
    //GERACAO AR 98 COMPRESSOR N2 CS
    $tag_vibracaoGA98 = "VB 72 700 775 080 000 - 000001";
    $idAtividadeGA98 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoGA98)->value('id');
    $idAnaliseGA98 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA98)->max('id');
    $statusGA98 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA98)->value('status_id');
    //SISTEMA DE AGUA GELADA CHILLER LPC
    $tag_vibracaoSAGC_LPC = "VB 72 500 510 995 000 - 000001";
    $idAtividadeSAGC_LPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAGC_LPC)->value('id');
    $idAnaliseSAGC_LPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAGC_LPC)->max('id');
    $statusSAGC_LPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAGC_LPC)->value('status_id');
    //SISTEMA DE AGUA GELADA CHILLER LGC 3
    $tag_vibracaoSAGC_LGC3 = "VB 72 400 410 921 000 - 000003";
    $idAtividadeSAGC_LGC3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAGC_LGC3)->value('id');
    $idAnaliseSAGC_LGC3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAGC_LGC3)->max('id');
    $statusSAGC_LGC3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAGC_LGC3)->value('status_id');
    //SISTEMA DE AGUA GELADA CHILLER LGC 2
    $tag_vibracaoSAGC_LGC2 = "VB 72 400 410 921 000 - 000002";
    $idAtividadeSAGC_LGC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAGC_LGC2)->value('id');
    $idAnaliseSAGC_LGC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAGC_LGC2)->max('id');
    $statusSAGC_LGC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAGC_LGC2)->value('status_id');
    //SISTEMA DE AGUA GELADA CHILLER LGC 1
    $tag_vibracaoSAGC_LC1 = "VB 72 400 410 921 000 - 000001";
    $idAtividadeSAGC_LC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSAGC_LC1)->value('id');
    $idAnaliseSAGC_LC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAGC_LC1)->max('id');
    $statusSAGC_LC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAGC_LC1)->value('status_id');

    if ($statusGA97 == 5 || $statusGA98 == 5 || $statusSAGC_LPC == 5 || $statusSAGC_LGC3 == 5 || $statusSAGC_LGC2 == 5 || $statusSAGC_LC1 == 5) {
      $utilidades_linhas_status = 5;
    } elseif ($statusGA97 == 4 || $statusGA98 == 4 || $statusSAGC_LPC == 4 || $statusSAGC_LGC3 == 4 || $statusSAGC_LGC2 == 4 || $statusSAGC_LC1 == 4) {
      $utilidades_linhas_status = 4;
    } elseif ($statusGA97 == 3 || $statusGA98 == 3 || $statusSAGC_LPC == 3 || $statusSAGC_LGC3 == 3 || $statusSAGC_LGC2 == 3 || $statusSAGC_LC1 == 3) {
      $utilidades_linhas_status = 3;
    }
    else {
      $utilidades_linhas_status = "";
    }

    return $utilidades_linhas_status;
  }

  public static function uti_Menu() {
    $uti_status = "";
    $utilidades_status = AuxFuncRelTec::utilidades_Menu();
    $utilidades_casa_bombas_status = AuxFuncRelTec::utilidades_casa_bombas_Menu();
    $utilidades_linhas_status = AuxFuncRelTec::utilidades_linhas_Menu();

    if ($utilidades_status == 5 || $utilidades_casa_bombas_status == 5 || $utilidades_linhas_status == 5) {
      $uti_status = 5;
    } elseif ($utilidades_status == 4 || $utilidades_casa_bombas_status == 4 || $utilidades_linhas_status == 4) {
      $uti_status = 4;
    } elseif ($utilidades_status == 3 || $utilidades_casa_bombas_status == 3 || $utilidades_linhas_status == 3) {
      $uti_status = 3;
    } else {
      $uti_status = "";
    }

    return $uti_status;
  }

  public static function uti_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_normal = aux::GeralPorLinha2Vib($atual1, 3, $uti_parent);
    return $uti_normal;
  }
  public static function uti_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_alarme = aux::GeralPorLinha2Vib($atual1, 4, $uti_parent);
    return $uti_alarme;
  }
  public static function uti_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_critico = aux::GeralPorLinha2Vib($atual1, 5, $uti_parent);
    return $uti_critico;
  }

  public static function galvanizacao_entrada_Menu() {
    $galvanizacao_entrada_status = "";
    //SISTEMA DE EXAUSTAO DE GASES 1
    $tag_vibracaoSEG_1 = "VB 72 400 410 141 000 - 000001";
    $idAtividadeSEG_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEG_1)->value('id');
    $idAnaliseSEG_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEG_1)->max('id');
    $statusSEG_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEG_1)->value('status_id');
    //SISTEMA DE EXAUSTAO DE GASES 2
    $tag_vibracaoSEG_2 = "VB 72 400 410 141 000 - 000002";
    $idAtividadeSEG_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEG_2)->value('id');
    $idAnaliseSEG_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEG_2)->max('id');
    $statusSEG_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEG_2)->value('status_id');
    //UH PRINCIPAL ENTRADA BOMBA 1
    $tag_vibracaoUHP_B1 = "VB 72 400 410 011 000 - 000001";
    $idAtividadeUHP_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_B1)->value('id');
    $idAnaliseUHP_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_B1)->max('id');
    $statusUHP_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_B1)->value('status_id');
    //UH PRINCIPAL ENTRADA BOMBA 2
    $tag_vibracaoUHP_B2 = "VB 72 400 410 011 000 - 000002";
    $idAtividadeUHP_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_B2)->value('id');
    $idAnaliseUHP_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_B2)->max('id');
    $statusUHP_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_B2)->value('status_id');
    //UH PRINCIPAL ENTRADA BOMBA 3
    $tag_vibracaoUHP_B3 = "VB 72 400 410 011 000 - 000003";
    $idAtividadeUHP_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_B3)->value('id');
    $idAnaliseUHP_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_B3)->max('id');
    $statusUHP_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_B3)->value('status_id');
    //DESENROLADEIRA 1
    $tag_vibracaoDES_1 = "VB 72 400 410 019 000 - 000001";
    $idAtividadeDES_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDES_1)->value('id');
    $idAnaliseDES_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES_1)->max('id');
    $statusDES_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES_1)->value('status_id');
    //DESENROLADEIRA 2
    $tag_vibracaoDES_2 = "VB 72 400 410 069 000 - 000001";
    $idAtividadeDES_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDES_2)->value('id');
    $idAnaliseDES_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES_2)->max('id');
    $statusDES_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES_2)->value('status_id');
    //UNIDADE HIDRÁULICA PRINCIPAL  - RECIRCULAÇÃO
    $tag_vibracaoUHP_REC = "VB 72 400 410 011 000 - 000004";
    $idAtividadeUHP_REC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_REC)->value('id');
    $idAnaliseUHP_REC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_REC)->max('id');
    $statusUHP_REC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_REC)->value('status_id');
    //UH FIFE DESENROLADEIRA N1 //UNIDADE HIDR. FIFE DESENROLADEIRA Nº1 - BOMBA 02
    $tag_vibracaoUHF_N1_B2 = "VB 72 400 410 017 000 - 000002";
    $idAtividadeUHF_N1_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_N1_B2)->value('id');
    $idAnaliseUHF_N1_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_N1_B2)->max('id');
    $statusUHF_N1_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_N1_B2)->value('status_id');
    //UH FIFE DESENROLADEIRA N2 //UNIDADE HIDR. FIFE DESENROLADEIRA Nº2 - BOMBA 02
    $tag_vibracaoUHF_N2_B2 = "VB 72 400 410 067 000 - 000002";
    $idAtividadeUHF_N2_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_N2_B2)->value('id');
    $idAnaliseUHF_N2_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_N2_B2)->max('id');
    $statusUHF_N2_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_N2_B2)->value('status_id');
    //UH FIFE DESENROLADEIRA N1 //UNIDADE HIDR. FIFE DESENROLADEIRA Nº1 - BOMBA 01
    $tag_vibracaoUHF_N1_B1 = "VB 72 400 410 017 000 - 000001";
    $idAtividadeUHF_N1_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_N1_B1)->value('id');
    $idAnaliseUHF_N1_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_N1_B1)->max('id');
    $statusUHF_N1_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_N1_B1)->value('status_id');
    //UH FIFE DESENROLADEIRA N2 //UNIDADE HIDR. FIFE DESENROLADEIRA Nº2 - BOMBA 01
    $tag_vibracaoUHF_N2_B1 = "VB 72 400 410 067 000 - 000001";
    $idAtividadeUHF_N2_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_N2_B1)->value('id');
    $idAnaliseUHF_N2_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_N2_B1)->max('id');
    $statusUHF_N2_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_N2_B1)->value('status_id');

    if ($statusSEG_1 == 5 || $statusSEG_2 == 5 || $statusUHP_B1 == 5 || $statusUHP_B2 == 5 || $statusUHP_B3 == 5 || $statusDES_1 == 5 || $statusDES_2 == 5 ||
    $statusUHP_REC == 5 || $statusUHF_N1_B2 == 5 || $statusUHF_N2_B2 == 5 || $statusUHF_N1_B1 == 5 || $statusUHF_N2_B1 == 5) {
      $galvanizacao_entrada_status = 5;
    } elseif ($statusSEG_1 == 4 || $statusSEG_2 == 4 || $statusUHP_B1 == 4 || $statusUHP_B2 == 4 || $statusUHP_B3 == 4 || $statusDES_1 == 4 || $statusDES_2 == 4 ||
    $statusUHP_REC == 4 || $statusUHF_N1_B2 == 4 || $statusUHF_N2_B2 == 4 || $statusUHF_N1_B1 == 4 || $statusUHF_N2_B1 == 4) {
      $galvanizacao_entrada_status = 4;
    } elseif ($statusSEG_1 == 3 || $statusSEG_2 == 3 || $statusUHP_B1 == 3 || $statusUHP_B2 == 3 || $statusUHP_B3 == 3 || $statusDES_1 == 3 || $statusDES_2 == 3 ||
    $statusUHP_REC == 3 || $statusUHF_N1_B2 == 3 || $statusUHF_N2_B2 == 3 || $statusUHF_N1_B1 == 3 || $statusUHF_N2_B1 == 3) {
      $galvanizacao_entrada_status = 3;
    }
    else {
      $galvanizacao_entrada_status = "";
    }

    return $galvanizacao_entrada_status;
  }

  public static function galvanizacao_limpeza_boiler_Menu() {
    $galvanizacao_limpeza_boiler_status = "";
    //SECAGEM TIRA ESCOVAS LIMP STRIP DRIER 2
    $tag_vibracaoSTE_DRIER2 = "VB 72 400 410 203 000 - 000001";
    $idAtividadeSTE_DRIER2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSTE_DRIER2)->value('id');
    $idAnaliseSTE_DRIER2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSTE_DRIER2)->max('id');
    $statusSTE_DRIER2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSTE_DRIER2)->value('status_id');
    //UNIDADE HIDRAULICA FIFE ROLO GUIA ENTRADA FORNO BOMBA 2
    $tag_vibracaoUHF_FB2 = "VB 72 400 410 210 000 - 000002";
    $idAtividadeUHF_FB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_FB2)->value('id');
    $idAnaliseUHF_FB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_FB2)->max('id');
    $statusUHF_FB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_FB2)->value('status_id');
    //UNIDADE HIDRAULICA FIFE ROLO GUIA ENTRADA FORNO BOMBA 1
    $tag_vibracaoUHF_FB1 = "VB 72 400 410 210 000 - 000001";
    $idAtividadeUHF_FB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_FB1)->value('id');
    $idAnaliseUHF_FB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_FB1)->max('id');
    $statusUHF_FB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_FB1)->value('status_id');
    // BOILER ENXAGUE CT6
    $tag_vibracaoBE_CT6 = "VB 72 400 410 191 000 - 000001";
    $idAtividadeBE_CT6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBE_CT6)->value('id');
    $idAnaliseBE_CT6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT6)->max('id');
    $statusBE_CT6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT6)->value('status_id');
    //BOILER LIMPEZA ELETRONICA CT3
    $tag_vibracaoBL_CT3 = "VB 72 400 410 187 000 - 000001";
    $idAtividadeBL_CT3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBL_CT3)->value('id');
    $idAnaliseBL_CT3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBL_CT3)->max('id');
    $statusBL_CT3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBL_CT3)->value('status_id');
    //BOILER ESCOVAS CT4
    $tag_vibracaoBE_CT4 = "VB 72 400 410 193 000 - 000001";
    $idAtividadeBE_CT4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBE_CT4)->value('id');
    $idAnaliseBE_CT4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT4)->max('id');
    $statusBE_CT4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT4)->value('status_id');
    //BOILER ENXAGUE CT5
    $tag_vibracaoBE_CT5 = "VB 72 400 410 189 000 - 000001";
    $idAtividadeBE_CT5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoBE_CT5)->value('id');
    $idAnaliseBE_CT5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT5)->max('id');
    $statusBE_CT5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT5)->value('status_id');

    if ($statusSTE_DRIER2 == 5 || $statusUHF_FB2 == 5 || $statusUHF_FB1 == 5 || $statusBE_CT6 == 5 || $statusBL_CT3 == 5 || $statusBE_CT4 == 5 || $statusBE_CT5 == 5) {
      $galvanizacao_limpeza_boiler_status = 5;
    } elseif ($statusSTE_DRIER2 == 4 || $statusUHF_FB2 == 4 || $statusUHF_FB1 == 4 || $statusBE_CT6 == 4 || $statusBL_CT3 == 4 || $statusBE_CT4 == 4 || $statusBE_CT5 == 4) {
      $galvanizacao_limpeza_boiler_status = 4;
    } elseif ($statusSTE_DRIER2 == 3 || $statusUHF_FB2 == 3 || $statusUHF_FB1 == 3 || $statusBE_CT6 == 3 || $statusBL_CT3 == 3 || $statusBE_CT4 == 3 || $statusBE_CT5 == 3) {
      $galvanizacao_limpeza_boiler_status = 3;
    }
    else {
      $galvanizacao_limpeza_boiler_status = "";
    }

    return $galvanizacao_limpeza_boiler_status;
  }

  public static function galvanizacao_limpeza_escovas_Menu() {
    $galvanizacao_limpeza_escovas_status = "";
    //UNIDADE FIFE ROLO GUIA N1 1A - BOMBA 2
    $tag_vibracaoUFRG_N1_B2 = "VB 72 400 410 163 000 - 000002";
    $idAtividadeUFRG_N1_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUFRG_N1_B2)->value('id');
    $idAnaliseUFRG_N1_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFRG_N1_B2)->max('id');
    $statusUFRG_N1_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFRG_N1_B2)->value('status_id');
    //UNIDADE FIFE ROLO GUIA N1 1B - BOMBA 1
    $tag_vibracaoUFRG_N1_B1 = "VB 72 400 410 163 000 - 000001";
    $idAtividadeUFRG_N1_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUFRG_N1_B1)->value('id');
    $idAnaliseUFRG_N1_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFRG_N1_B1)->max('id');
    $statusUFRG_N1_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFRG_N1_B1)->value('status_id');
    //UNIDADE FIFE GUIA 1C - BOMBA 2
    $tag_vibracaoUFRG_1C_B2 = "VB 72 400 410 169 000 - 000002";
    $idAtividadeUFRG_1C_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUFRG_1C_B2)->value('id');
    $idAnaliseUFRG_1C_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFRG_1C_B2)->max('id');
    $statusUFRG_1C_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFRG_1C_B2)->value('status_id');
    //UNIDADE FIFE GUIA 2C - BOMBA 1
    $tag_vibracaoUFG_2C_B1 = "VB 72 400 410 169 000 - 000001";
    $idAtividadeUFG_2C_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUFG_2C_B1)->value('id');
    $idAnaliseUFG_2C_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFG_2C_B1)->max('id');
    $statusUFG_2C_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFG_2C_B1)->value('status_id');
    //ROLO 2 BRIDLE Nº 1
    $tag_vibracaoR2_BN1 = "VB 72 400 410 158 000 - 000001";
    $idAtividadeR2_BN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BN1)->value('id');
    $idAnaliseR2_BN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BN1)->max('id');
    $statusR2_BN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BN1)->value('status_id');
    //ROLO 1 BRIDLE Nº 1
    $tag_vibracaoR1_BN1 = "VB 72 400 410 157 000 - 000001";
    $idAtividadeR1_BN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BN1)->value('id');
    $idAnaliseR1_BN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BN1)->max('id');
    $statusR1_BN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BN1)->value('status_id');
    //TANQUE DE TRABALHO ESCOVAS DE LIMPEZA 4
    $tag_vibracaoTTEL_4 = "VB 72 400 410 199 000 - 000004";
    $idAtividadeTTEL_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTTEL_4)->value('id');
    $idAnaliseTTEL_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTEL_4)->max('id');
    $statusTTEL_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTEL_4)->value('status_id');
    //TANQUE DE TRABALHO ESCOVAS DE LIMPEZA 3
    $tag_vibracaoTTEL_3 = "VB 72 400 410 199 000 - 000003";
    $idAtividadeTTEL_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTTEL_3)->value('id');
    $idAnaliseTTEL_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTEL_3)->max('id');
    $statusTTEL_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTEL_3)->value('status_id');
    //TANQUE DE TRABALHO ESCOVAS DE LIMPEZA 2
    $tag_vibracaoTTEL_2 = "VB 72 400 410 199 000 - 000002";
    $idAtividadeTTEL_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTTEL_2 )->value('id');
    $idAnaliseTTEL_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTEL_2 )->max('id');
    $statusTTEL_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTEL_2 )->value('status_id');
    //TANQUE DE TRABALHO ESCOVAS DE LIMPEZA 1
    $tag_vibracaoTTEL_1 = "VB 72 400 410 199 000 - 000001";
    $idAtividadeTTEL_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTTEL_1)->value('id');
    $idAnaliseTTEL_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTEL_1)->max('id');
    $statusTTEL_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTEL_1)->value('status_id');

    if ($statusUFRG_N1_B2 == 5 || $statusUFRG_N1_B1 == 5 || $statusUFRG_1C_B2 == 5 || $statusUFG_2C_B1 == 5 || $statusR2_BN1 == 5 ||
    $statusR1_BN1 == 5 || $statusTTEL_4 == 5 || $statusTTEL_3 == 5 || $statusTTEL_2 == 5 || $statusTTEL_1 == 5) {
      $galvanizacao_limpeza_escovas_status = 5;
    } elseif ($statusUFRG_N1_B2 == 4 || $statusUFRG_N1_B1 == 4 || $statusUFRG_1C_B2 == 4 || $statusUFG_2C_B1 == 4 || $statusR2_BN1 == 4 ||
    $statusR1_BN1 == 4 || $statusTTEL_4 == 4 || $statusTTEL_3 == 4 || $statusTTEL_2 == 4 || $statusTTEL_1 == 4) {
      $galvanizacao_limpeza_escovas_status = 4;
    } elseif ($statusUFRG_N1_B2 == 3 || $statusUFRG_N1_B1 == 3 || $statusUFRG_1C_B2 == 3 || $statusUFG_2C_B1 == 3 || $statusR2_BN1 == 3 ||
    $statusR1_BN1 == 3 || $statusTTEL_4 == 3 || $statusTTEL_3 == 3 || $statusTTEL_2 == 3 || $statusTTEL_1 == 3) {
      $galvanizacao_limpeza_escovas_status = 3;
    }
    else {
      $galvanizacao_limpeza_escovas_status = "";
    }

    return $galvanizacao_limpeza_escovas_status;
  }

  public static function galvanizacao_forno_Menu() {
    $galvanizacao_forno_status = "";
    //EXAUSTOR TUBE ZONA 5
    $tag_vibracaoETZ_5 = "VB 72 400 410 257 000 - 000004";
    $idAtividadeETZ_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoETZ_5 )->value('id');
    $idAnaliseETZ_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ_5 )->max('id');
    $statusETZ_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ_5 )->value('status_id');
    //RADIANTE TUBE PILOT
    $tag_vibracaoRTP = "VB 72 400 410 267 000 - 000001";
    $idAtividadeRTP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRTP)->value('id');
    $idAnaliseRTP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRTP)->max('id');
    $statusRTP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRTP)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (DFF WASTE GAS)
    $tag_vibracaoEGF_DFF_WG = "VB 72 400 410 257 000 - 000001";
    $idAtividadeEGF_DFF_WG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF_DFF_WG)->value('id');
    $idAnaliseEGF_DFF_WG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF_DFF_WG)->max('id');
    $statusEGF_DFF_WG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF_DFF_WG)->value('status_id');
    //ZONA 1 DFF
    $tag_vibracaoZ1_DFF = "VB 72 400 410 259 000 - 000001";
    $idAtividadeZ1_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoZ1_DFF)->value('id');
    $idAnaliseZ1_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ1_DFF)->max('id');
    $statusZ1_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ1_DFF)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (STACK DILUTION AIR)
    $tag_vibracaoEGF = "VB 72 400 410 257 000 - 000002";
    $idAtividadeEGF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF)->value('id');
    $idAnaliseEGF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF)->max('id');
    $statusEGF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF)->value('status_id');
    //SECAGEM TIRA ESCOVAS LIMP STRIP DRIER 2 - CAIXA AQUECEDORA
    $tag_vibracaoSTEL_CA = "VB 72 400 410 203 000 - 000002";
    $idAtividadeSTEL_CA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSTEL_CA)->value('id');
    $idAnaliseSTEL_CA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSTEL_CA)->max('id');
    $statusSTEL_CA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSTEL_CA)->value('status_id');
    //ROLO 1 BRIDLE Nº 2
    $tag_vibracaoR1_BRIDLE_N2 = "VB 72 400 410 204 000 - 000001";
    $idAtividadeR1_BRIDLE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_N2)->value('id');
    $idAnaliseR1_BRIDLE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N2)->max('id');
    $statusR1_BRIDLE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N2)->value('status_id');
    //ROLO 2 BRIDLE Nº 2
    $tag_vibracaoR2_BRIDLE_N2 = "VB 72 400 410 205 000 - 000001";
    $idAtividadeR2_BRIDLE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_N2)->value('id');
    $idAnaliseR2_BRIDLE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N2)->max('id');
    $statusR2_BRIDLE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N2)->value('status_id');
    //DEFLETOR 3 DFF
    $tag_vibracaoD3_DFF = "VB 72 400 410 217 000 - 000001";
    $idAtividadeD3_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD3_DFF)->value('id');
    $idAnaliseD3_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD3_DFF)->max('id');
    $statusD3_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD3_DFF)->value('status_id');
    //DEFLETOR 4 TH
    $tag_vibracaoD4_TH = "VB 72 400 410 219 000 - 000001";
    $idAtividadeD4_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD4_TH)->value('id');
    $idAnaliseD4_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD4_TH)->max('id');
    $statusD4_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD4_TH)->value('status_id');
    //DEFLETOR 6 TH
    $tag_vibracaoD6_TH = "VB 72 400 410 223 000 - 000001";
    $idAtividadeD6_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD6_TH)->value('id');
    $idAnaliseD6_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD6_TH)->max('id');
    $statusD6_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD6_TH)->value('status_id');
    //DEFLETOR 8 TH
    $tag_vibracaoD8_TH = "VB 72 400 410 227 000 - 000001";
    $idAtividadeD8_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD8_TH)->value('id');
    $idAnaliseD8_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD8_TH)->max('id');
    $statusD8_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD8_TH)->value('status_id');
    //DEFLETOR 10 TH
    $tag_vibracaoD10_TH = "VB 72 400 410 231 000 - 000001";
    $idAtividadeD10_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD10_TH)->value('id');
    $idAnaliseD10_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD10_TH)->max('id');
    $statusD10_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD10_TH)->value('status_id');
    //DEFLETOR 11 SC
    $tag_vibracaoD11_SC = "VB 72 400 410 233 000 - 000001";
    $idAtividadeD11_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD11_SC)->value('id');
    $idAnaliseD11_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD11_SC)->max('id');
    $statusD11_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD11_SC)->value('status_id');
    //DEFLETOR 13 SC
    $tag_vibracaoD13_SC = "VB 72 400 410 237 000 - 000001";
    $idAtividadeD13_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD13_SC)->value('id');
    $idAnaliseD13_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD13_SC)->max('id');
    $statusD13_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD13_SC)->value('status_id');
    //DEFLETOR 14 JC
    $tag_vibracaoD14_JC = "VB 72 400 410 239 000 - 000001";
    $idAtividadeD14_JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD14_JC)->value('id');
    $idAnaliseD14_JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD14_JC)->max('id');
    $statusD14_JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD14_JC)->value('status_id');
    //DEFLETOR 16 JC
    $tag_vibracaoD16_JC = "VB 72 400 410 251 000 - 000001";
    $idAtividadeD16_JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD16_JC)->value('id');
    $idAnaliseD16_JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD16_JC)->max('id');
    $statusD16_JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD16_JC)->value('status_id');
    //ZONA 3 DFF - (DFF PILOTO)
    $tag_vibracaoZ3_DFF = "VB 72 400 410 263 000 - 000002";
    $idAtividadeZ3_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoZ3_DFF)->value('id');
    $idAnaliseZ3_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ3_DFF)->max('id');
    $statusZ3_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ3_DFF)->value('status_id');
    //DEFLETOR 17 JC
    $tag_vibracaoD17_JC = "VB 72 400 410 253 000 - 000001";
    $idAtividadeD17_JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD17_JC)->value('id');
    $idAnaliseD17_JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD17_JC)->max('id');
    $statusD17_JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD17_JC)->value('status_id');
    //DEFLETOR 18 JC
    $tag_vibracaoD18_JC = "VB 72 400 410 255 000 - 000001";
    $idAtividadeD18_JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD18_JC)->value('id');
    $idAnaliseD18_JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD18_JC)->max('id');
    $statusD18_JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD18_JC)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (ZONA 6 TH RADIANT TUBE SOAK)
    $tag_vibracaoEGF_Z6 = "VB 72 400 410 257 000 - 000005";
    $idAtividadeEGF_Z6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF_Z6)->value('id');
    $idAnaliseEGF_Z6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF_Z6)->max('id');
    $statusEGF_Z6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF_Z6)->value('status_id');
    //ZONA 3 DFF - SOPRADOR PRINCIPAL
    $tag_vibracaoZ3_DFF_SP = "VB 72 400 410 263 000 - 000001";
    $idAtividadeZ3_DFF_SP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoZ3_DFF_SP)->value('id');
    $idAnaliseZ3_DFF_SP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ3_DFF_SP)->max('id');
    $statusZ3_DFF_SP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ3_DFF_SP)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (ZONA 4 TH RADIANT TUBE)
    $tag_vibracaoEGF_Z4 = "VB 72 400 410 257 000 - 000003";
    $idAtividadeEGF_Z4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF_Z4)->value('id');
    $idAnaliseEGF_Z4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF_Z4)->max('id');
    $statusEGF_Z4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF_Z4)->value('status_id');
    //EXAUSTÃO DE GASES DO FORNO - (POST COMBUST)
    $tag_vibracaoEGF_PC = "VB 72 400 410 257 000 - 000006";
    $idAtividadeEGF_PC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEGF_PC)->value('id');
    $idAnaliseEGF_PC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEGF_PC)->max('id');
    $statusEGF_PC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEGF_PC)->value('status_id');
    //UNIDADE HIDR. FIFE ROLO GUIA 15 JC BOMBA 1
    $tag_vibracaoUHF_RG15JC_B1 = "VB 72 400 410 249 000 - 000001";
    $idAtividadeUHF_RG15JC_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_RG15JC_B1)->value('id');
    $idAnaliseUHF_RG15JC_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_RG15JC_B1)->max('id');
    $statusUHF_RG15JC_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_RG15JC_B1)->value('status_id');
    //UNIDADE HIDR. FIFE ROLO GUIA 15 JC BOMBA 2
    $tag_vibracaoUHF_RG15JC_B2 = "VB 72 400 410 249 000 - 000002";
    $idAtividadeUHF_RG15JC_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHF_RG15JC_B2)->value('id');
    $idAnaliseUHF_RG15JC_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHF_RG15JC_B2)->max('id');
    $statusUHF_RG15JC_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHF_RG15JC_B2)->value('status_id');
    //ROLO GUIA DO FORNO 15 JC
    $tag_vibracaoRGF_15JC = "VB 72 400 410 247 000 - 000001";
    $idAtividadeRGF_15JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRGF_15JC)->value('id');
    $idAnaliseRGF_15JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRGF_15JC)->max('id');
    $statusRGF_15JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRGF_15JC)->value('status_id');
    //DEFLETOR 12 SC
    $tag_vibracaoD12_SC = "VB 72 400 410 235 000 - 000001";
    $idAtividadeD12_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD12_SC)->value('id');
    $idAnaliseD12_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD12_SC)->max('id');
    $statusD12_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD12_SC)->value('status_id');
    //DEFLETOR 9 TH
    $tag_vibracaoD9_TH = "VB 72 400 410 229 000 - 000001";
    $idAtividadeD9_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD9_TH)->value('id');
    $idAnaliseD9_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD9_TH)->max('id');
    $statusD9_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD9_TH)->value('status_id');
    //DEFLETOR 7 TH
    $tag_vibracaoD7_TH = "VB 72 400 410 225 000 - 000001";
    $idAtividadeD7_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD7_TH)->value('id');
    $idAnaliseD7_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD7_TH)->max('id');
    $statusD7_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD7_TH)->value('status_id');
    //DEFLETOR 5 TH
    $tag_vibracaoD5_TH = "VB 72 400 410 221 000 - 000001";
    $idAtividadeD5_TH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD5_TH)->value('id');
    $idAnaliseD5_TH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD5_TH)->max('id');
    $statusD5_TH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD5_TH)->value('status_id');
    //DEFLETOR 2 DFF
    $tag_vibracaoD2_DFF = "VB 72 400 410 215 000 - 000001";
    $idAtividadeD2_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD2_DFF)->value('id');
    $idAnaliseD2_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD2_DFF)->max('id');
    $statusD2_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD2_DFF)->value('status_id');
    //DEFLETOR 1 PH
    $tag_vibracaoD1_PH = "VB 72 400 410 213 000 - 000001";
    $idAtividadeD1_PH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoD1_PH)->value('id');
    $idAnaliseD1_PH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD1_PH)->max('id');
    $statusD1_PH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD1_PH)->value('status_id');

    if ($statusETZ_5 == 5 || $statusRTP == 5 || $statusEGF_DFF_WG == 5 || $statusZ1_DFF == 5 || $statusEGF == 5 || $statusSTEL_CA == 5 || $statusR1_BRIDLE_N2 == 5 ||
    $statusR2_BRIDLE_N2 == 5 || $statusD3_DFF == 5 || $statusD4_TH == 5 || $statusD6_TH == 5 || $statusD8_TH == 5 || $statusD10_TH == 5 || $statusD11_SC == 5 ||
    $statusD13_SC == 5 || $statusD14_JC == 5 || $statusD16_JC == 5 || $statusZ3_DFF == 5 || $statusD17_JC == 5 || $statusD18_JC == 5 || $statusEGF_Z6 == 5 ||
    $statusZ3_DFF_SP == 5 || $statusEGF_Z4 == 5 || $statusEGF_PC == 5 || $statusUHF_RG15JC_B1 == 5 || $statusUHF_RG15JC_B2 == 5 || $statusRGF_15JC == 5 ||
    $statusD12_SC == 5 || $statusD9_TH == 5 || $statusD7_TH == 5 || $statusD5_TH == 5 || $statusD2_DFF == 5 || $statusD1_PH == 5) {
      $galvanizacao_forno_status = 5;
    } elseif ($statusETZ_5 == 4 || $statusRTP == 4 || $statusEGF_DFF_WG == 4 || $statusZ1_DFF == 4 || $statusEGF == 4 || $statusSTEL_CA == 4 || $statusR1_BRIDLE_N2 == 4 ||
    $statusR2_BRIDLE_N2 == 4 || $statusD3_DFF == 4 || $statusD4_TH == 4 || $statusD6_TH == 4 || $statusD8_TH == 4 || $statusD10_TH == 4 || $statusD11_SC == 4 ||
    $statusD13_SC == 4 || $statusD14_JC == 4 || $statusD16_JC == 4 || $statusZ3_DFF == 4 || $statusD17_JC == 4 || $statusD18_JC == 4 || $statusEGF_Z6 == 4 ||
    $statusZ3_DFF_SP == 4 || $statusEGF_Z4 == 4 || $statusEGF_PC == 4 || $statusUHF_RG15JC_B1 == 4 || $statusUHF_RG15JC_B2 == 4 || $statusRGF_15JC == 4 ||
    $statusD12_SC == 4 || $statusD9_TH == 4 || $statusD7_TH == 4 || $statusD5_TH == 4 || $statusD2_DFF == 4 || $statusD1_PH == 4) {
      $galvanizacao_forno_status = 4;
    } elseif ($statusETZ_5 == 3 || $statusRTP == 3 || $statusEGF_DFF_WG == 3 || $statusZ1_DFF == 3 || $statusEGF == 3 || $statusSTEL_CA == 3 || $statusR1_BRIDLE_N2 == 3 ||
    $statusR2_BRIDLE_N2 == 3 || $statusD3_DFF == 3 || $statusD4_TH == 3 || $statusD6_TH == 3 || $statusD8_TH == 3 || $statusD10_TH == 3 || $statusD11_SC == 3 ||
    $statusD13_SC == 3 || $statusD14_JC == 3 || $statusD16_JC == 3 || $statusZ3_DFF == 3 || $statusD17_JC == 3 || $statusD18_JC == 3 || $statusEGF_Z6 == 3 ||
    $statusZ3_DFF_SP == 3 || $statusEGF_Z4 == 3 || $statusEGF_PC == 3 || $statusUHF_RG15JC_B1 == 3 || $statusUHF_RG15JC_B2 == 3 || $statusRGF_15JC == 3 ||
    $statusD12_SC == 3 || $statusD9_TH == 3 || $statusD7_TH == 3 || $statusD5_TH == 3 || $statusD2_DFF == 3 || $statusD1_PH == 3) {
      $galvanizacao_forno_status = 3;
    }
    else {
      $galvanizacao_forno_status = "";
    }

    return $galvanizacao_forno_status;
  }

  public static function galvanizacao_apc_porao_Menu() {
    $galvanizacao_apc_porao_status = "";
    //RESFRIAMENTO SAÍDA NAVALHA PRE-COOLER
    $tag_vibracaoRSN_PC = "VB 72 400 410 311 000 - 000001";
    $idAtividadeRSN_PC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRSN_PC)->value('id');
    $idAnaliseRSN_PC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRSN_PC)->max('id');
    $statusRSN_PC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRSN_PC)->value('status_id');
    //SISTEMA SOPRADOR NAVALHA DE AR - 02
    $tag_vibracaoSSNA_02 = "VB 72 400 410 309 000 - 000002";
    $idAtividadeSSNA_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSSNA_02)->value('id');
    $idAnaliseSSNA_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSNA_02)->max('id');
    $statusSSNA_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSNA_02)->value('status_id');
    //SIST RECIRCULAÇÃO E APLICAÇÃO MINIMIZADOR
    $tag_vibracaoSRAM = "VB 72 400 410 313 000 - 000001";
    $idAtividadeSRAM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSRAM)->value('id');
    $idAnaliseSRAM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSRAM)->max('id');
    $statusSRAM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSRAM)->value('status_id');
    //SIST EXAUSTÃO E FILTRAGEM MINIMIZADOR
    $tag_vibracaoSEFM = "VB 72 400 410 314 000 - 000001";
    $idAtividadeSEFM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEFM)->value('id');
    $idAnaliseSEFM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEFM)->max('id');
    $statusSEFM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEFM)->value('status_id');
    //APC 10
    $tag_vibracaoAPC10 = "VB 72 400 410 315 000 - 000010";
    $idAtividadeAPC10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPC10)->value('id');
    $idAnaliseAPC10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPC10)->max('id');
    $statusAPC10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPC10)->value('status_id');
    //QUENCH TANK 1 - SECADOR DA TIRA QUENCH TANK - VENTILADOR
    $tag_vibracaoQT1 = "VB 72 400 410 327 000 - 000001";
    $idAtividadeQT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoQT1)->value('id');
    $idAnaliseQT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQT1)->max('id');
    $statusQT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQT1)->value('status_id');
    //QUENCH TANK 2 - SECADOR DA TIRA QUENCH TANK - CAIXA AQUECEDORA
    $tag_vibracaoQT2 = "VB 72 400 410 327 000 - 000002";
    $idAtividadeQT2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoQT2)->value('id');
    $idAnaliseQT2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQT2)->max('id');
    $statusQT2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQT2)->value('status_id');
    //SISTEMA SOPRADOR NAVALHA DE AR - 01
    $tag_vibracaoSSNA_01 = "VB 72 400 410 309 000 - 000001";
    $idAtividadeSSNA_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSSNA_01)->value('id');
    $idAnaliseSSNA_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSNA_01)->max('id');
    $statusSSNA_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSNA_01)->value('status_id');
    //POTE ZINCO - REFRIGER. INDUTORES POTE ZINCO - BOMBA 02
    $tag_vibracaoRIPZ_B2 = "VB 72 400 410 303 000 - 000002";
    $idAtividadeRIPZ_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRIPZ_B2)->value('id');
    $idAnaliseRIPZ_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRIPZ_B2)->max('id');
    $statusRIPZ_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRIPZ_B2)->value('status_id');
    //UNIDADE HIDRAULICA POTES
    $tag_vibracaoUHP = "VB 72 400 410 284 000 - 000001";
    $idAtividadeUHP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP)->value('id');
    $idAnaliseUHP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP)->max('id');
    $statusUHP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP)->value('status_id');
    //UNIDADE HIDRÁULICA FIFE ROLO GUIA Nº 03 - BOMBA 01
    $tag_vibracaoUHFR_B1 = "VB 72 400 410 331 000 - 000001";
    $idAtividadeUHFR_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFR_B1)->value('id');
    $idAnaliseUHFR_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFR_B1)->max('id');
    $statusUHFR_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFR_B1)->value('status_id');
    //UNIDADE HIDRÁULICA FIFE ROLO GUIA Nº 03 - BOMBA 02
    $tag_vibracaoUHFR_B2 = "VB 72 400 410 331 000 - 000002";
    $idAtividadeUHFR_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFR_B2)->value('id');
    $idAnaliseUHFR_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFR_B2)->max('id');
    $statusUHFR_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFR_B2)->value('status_id');
    //REFRIGER. INDUTORES POTE ZINCO - BOMBA 01
    $tag_vibracaoRIPZ_B1 = "VB 72 400 410 303 000 - 000001";
    $idAtividadeRIPZ_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRIPZ_B1)->value('id');
    $idAnaliseRIPZ_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRIPZ_B1)->max('id');
    $statusRIPZ_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRIPZ_B1)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 02
    $tag_vibracaoTRP_APC02 = "VB 72 400 410 315 000 - 000002";
    $idAtividadeTRP_APC02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC02)->value('id');
    $idAnaliseTRP_APC02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC02)->max('id');
    $statusTRP_APC02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC02)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 03
    $tag_vibracaoTRP_APC03 = "VB 72 400 410 315 000 - 000003";
    $idAtividadeTRP_APC03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC03)->value('id');
    $idAnaliseTRP_APC03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC03)->max('id');
    $statusTRP_APC03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC03)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 01
    $tag_vibracaoTRP_APC01 = "VB 72 400 410 315 000 - 000001";
    $idAtividadeTRP_APC01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC01)->value('id');
    $idAnaliseTRP_APC01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC01)->max('id');
    $statusTRP_APC01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC01)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 09
    $tag_vibracaoTRP_APC09 = "VB 72 400 410 315 000 - 000009";
    $idAtividadeTRP_APC09 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC09)->value('id');
    $idAnaliseTRP_APC09 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC09)->max('id');
    $statusTRP_APC09 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC09)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 04
    $tag_vibracaoTRP_APC04 = "VB 72 400 410 315 000 - 000004";
    $idAtividadeTRP_APC04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC04)->value('id');
    $idAnaliseTRP_APC04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC04)->max('id');
    $statusTRP_APC04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC04)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 08
    $tag_vibracaoTRP_APC08 = "VB 72 400 410 315 000 - 000008";
    $idAtividadeTRP_APC08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC08)->value('id');
    $idAnaliseTRP_APC08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC08)->max('id');
    $statusTRP_APC08 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC08)->value('status_id');
    //SISTEMA CIRCULACAO DE AR PORAO POTE
    $tag_vibracaoSCAPP = "VB 72 400 410 304 000 - 000001";
    $idAtividadeSCAPP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSCAPP)->value('id');
    $idAnaliseSCAPP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSCAPP)->max('id');
    $statusSCAPP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSCAPP)->value('status_id');
    //REFRIGER. INDUTORES POTE GALVAL BOMBA 2
    $tag_vibracaoRIPGB2 = "VB 72 400 410 305 000 - 000002";
    $idAtividadeRIPGB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRIPGB2)->value('id');
    $idAnaliseRIPGB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRIPGB2)->max('id');
    $statusRIPGB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRIPGB2)->value('status_id');
    //REFRIGER. INDUTORES POTE GALVAL BOMBA 1
    $tag_vibracaoSIPGB1 = "VB 72 400 410 305 000 - 000001";
    $idAtividadeSIPGB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSIPGB1)->value('id');
    $idAnaliseSIPGB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSIPGB1)->max('id');
    $statusSIPGB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSIPGB1)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 05
    $tag_vibracaoTRP_APC05 = "VB 72 400 410 315 000 - 000005";
    $idAtividadeTRP_APC05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC05)->value('id');
    $idAnaliseTRP_APC05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC05)->max('id');
    $statusTRP_APC05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC05)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 06
    $tag_vibracaoTRP_APC06 = "VB 72 400 410 315 000 - 000006";
    $idAtividadeTRP_APC06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC06)->value('id');
    $idAnaliseTRP_APC06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC06)->max('id');
    $statusTRP_APC06 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC06)->value('status_id');
    //TORRE DE RESFRIAMENTO DO POTE - APC 07
    $tag_vibracaoTRP_APC07 = "VB 72 400 410 315 000 - 000007";
    $idAtividadeTRP_APC07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRP_APC07)->value('id');
    $idAnaliseTRP_APC07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRP_APC07)->max('id');
    $statusTRP_APC07 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRP_APC07)->value('status_id');

    if ($statusSSNA_02 == 5 || $statusSSNA_02 == 5 || $statusSRAM == 5 || $statusSEFM == 5 || $statusAPC10 == 5 || $statusQT1 == 5 || $statusQT2 == 5 || $statusSSNA_01 == 5 ||
    $statusRIPZ_B2 == 5 || $statusUHP == 5 || $statusUHFR_B1 == 5 || $statusUHFR_B2 == 5 || $statusRIPZ_B1 == 5 || $statusTRP_APC02 == 5 || $statusTRP_APC03 == 5 ||
    $statusTRP_APC01 == 5 || $statusTRP_APC09 == 5 || $statusTRP_APC04 == 5 || $statusTRP_APC08 == 5 || $statusSCAPP == 5 || $statusRIPGB2 == 5 || $statusSIPGB1 == 5 ||
    $statusTRP_APC05 == 5 || $statusTRP_APC06 == 5 || $statusTRP_APC07 == 5) {
      $galvanizacao_apc_porao_status = 5;
    } elseif ($statusSSNA_02 == 4 || $statusSSNA_02 == 4 || $statusSRAM == 4 || $statusSEFM == 4 || $statusAPC10 == 4 || $statusQT1 == 4 || $statusQT2 == 4 || $statusSSNA_01 == 4 ||
    $statusRIPZ_B2 == 4 || $statusUHP == 4 || $statusUHFR_B1 == 4 || $statusUHFR_B2 == 4 || $statusRIPZ_B1 == 4 || $statusTRP_APC02 == 4 || $statusTRP_APC03 == 4 ||
    $statusTRP_APC01 == 4 || $statusTRP_APC09 == 4 || $statusTRP_APC04 == 4 || $statusTRP_APC08 == 4 || $statusSCAPP == 4 || $statusRIPGB2 == 4 || $statusSIPGB1 == 4 ||
    $statusTRP_APC05 == 4 || $statusTRP_APC06 == 4 || $statusTRP_APC07 == 4) {
      $galvanizacao_apc_porao_status = 4;
    } elseif ($statusSSNA_02 == 3 || $statusSSNA_02 == 3 || $statusSRAM == 3 || $statusSEFM == 3 || $statusAPC10 == 3 || $statusQT1 == 3 || $statusQT2 == 3 || $statusSSNA_01 == 3 ||
    $statusRIPZ_B2 == 3 || $statusUHP == 3 || $statusUHFR_B1 == 3 || $statusUHFR_B2 == 3 || $statusRIPZ_B1 == 3 || $statusTRP_APC02 == 3 || $statusTRP_APC03 == 3 ||
    $statusTRP_APC01 == 3 || $statusTRP_APC09 == 3 || $statusTRP_APC04 == 3 || $statusTRP_APC08 == 3 || $statusSCAPP == 3 || $statusRIPGB2 == 3 || $statusSIPGB1 == 3 ||
    $statusTRP_APC05 == 3 || $statusTRP_APC06 == 3 || $statusTRP_APC07 == 3) {
      $galvanizacao_apc_porao_status = 3;
    }
    else {
      $galvanizacao_apc_porao_status = "";
    }


    return $galvanizacao_apc_porao_status;
  }

  public static function galvanizacao_laminador_Menu() {
    $galvanizacao_laminador_status = "";
    //UNIDADE HIDRAULICA LAMINADOR - BOMBA 2
    $tag_vibracaoUHL_B2 = "VB 72 400 410 367 000 - 000002";
    $idAtividadeUHL_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHL_B2)->value('id');
    $idAnaliseUHL_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHL_B2)->max('id');
    $statusUHL_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHL_B2)->value('status_id');
    //CROMO 1 - BOMBA 2
    $tag_vibracaoCB_2 = "VB 72 400 410 402 000 - 000002";
    $idAtividadeCB_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCB_2)->value('id');
    $idAnaliseCB_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_2)->max('id');
    $statusCB_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_2)->value('status_id');
    //CROMO 2 - BOMBA 1
    $tag_vibracaoCB_1 = "VB 72 400 410 402 000 - 000001";
    $idAtividadeCB_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCB_1)->value('id');
    $idAnaliseCB_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_1)->max('id');
    $statusCB_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_1)->value('status_id');
    //UNIDADE HIDRAULICA LAMINADOR 2 - RECIRCULACAO
    $tag_vibracaoUHL_REC = "VB 72 400 410 367 000 - 000003";
    $idAtividadeUHL_REC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHL_REC)->value('id');
    $idAnaliseUHL_REC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHL_REC)->max('id');
    $statusUHL_REC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHL_REC)->value('status_id');
    //UNIDADE HIDRAULICA LAMINADOR 3 - BOMBA 1
    $tag_vibracaoUHL_B1 = "VB 72 400 410 367 000 - 000001";
    $idAtividadeUHL_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHL_B1)->value('id');
    $idAnaliseUHL_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHL_B1)->max('id');
    $statusUHL_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHL_B1)->value('status_id');
    //UNIDADE HIDRÁULICA APLICADOR DE RESINA - BOMBA 02
    $tag_vibracaoUHAR_B2 = "VB 72 400 410 400 000 - 000002";
    $idAtividadeUHAR_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHAR_B2)->value('id');
    $idAnaliseUHAR_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHAR_B2)->max('id');
    $statusUHAR_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHAR_B2)->value('status_id');
    //FIFE ACUMULADOR SAIDA E ROLO GUIA 5 - 1
    $tag_vibracaoFASRG_5_1 = "VB 72 400 410 425 000 - 000002";
    $idAtividadeFASRG_5_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFASRG_5_1)->value('id');
    $idAnaliseFASRG_5_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFASRG_5_1)->max('id');
    $statusFASRG_5_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFASRG_5_1)->value('status_id');
    //UNIDADE HIDRÁULICA APLICADOR DE RESINA - BOMBA 01
    $tag_vibracaoUHAR_B1 = "VB 72 400 410 400 000 - 000001";
    $idAtividadeUHAR_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHAR_B1)->value('id');
    $idAnaliseUHAR_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHAR_B1)->max('id');
    $statusUHAR_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHAR_B1)->value('status_id');
    //FIFE ACUMULADOR SAIDA E ROLO GUIA 5 - 2 BOMBA 1
    $tag_vibracaoFASRG_5_B1 = "VB 72 400 410 425 000 - 000001";
    $idAtividadeFASRG_5_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoFASRG_5_B1)->value('id');
    $idAnaliseFASRG_5_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFASRG_5_B1)->max('id');
    $statusFASRG_5_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFASRG_5_B1)->value('status_id');
    //ROLO 1 BRIDLE 5B
    $tag_vibracaoR1_BRIDLE_5B = "VB 72 400 410 377 000 - 000001";
    $idAtividadeR1_BRIDLE_5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_5B)->value('id');
    $idAnaliseR1_BRIDLE_5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_5B)->max('id');
    $statusR1_BRIDLE_5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_5B)->value('status_id');
    //ROLO 1 BRIDLE 5A
    $tag_vibracaoR1_BRIDLE_5A = "VB 72 400 410 375 000 - 000001";
    $idAtividadeR1_BRIDLE_5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_5A)->value('id');
    $idAnaliseR1_BRIDLE_5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_5A)->max('id');
    $statusR1_BRIDLE_5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_5A)->value('status_id');
    //ROLO 2 BRIDLE 5B
    $tag_vibracaoR2_BRIDLE_5B = "VB 72 400 410 378 000 - 000001";
    $idAtividadeR2_BRIDLE_5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_5B)->value('id');
    $idAnaliseR2_BRIDLE_5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_5B)->max('id');
    $statusR2_BRIDLE_5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_5B)->value('status_id');
    //ROLO 2 BRIDLE 5A
    $tag_vibracaoR2_BRIDLE_5A = "VB 72 400 410 376 000 - 000001";
    $idAtividadeR2_BRIDLE_5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_5A)->value('id');
    $idAnaliseR2_BRIDLE_5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_5A)->max('id');
    $statusR2_BRIDLE_5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_5A)->value('status_id');
    //ROLO 2 BRIDLE Nº 6
    $tag_vibracaoR2_BRIDLE_N6 = "VB 72 400 410 417 000 - 000001";
    $idAtividadeR2_BRIDLE_N6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_N6)->value('id');
    $idAnaliseR2_BRIDLE_N6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N6)->max('id');
    $statusR2_BRIDLE_N6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N6)->value('status_id');
    //ROLO 1 BRIDLE Nº 6
    $tag_vibracaoR1_BRIDLE_N6 = "VB 72 400 410 415 000 - 000001";
    $idAtividadeR1_BRIDLE_N6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_N6)->value('id');
    $idAnaliseR1_BRIDLE_N6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N6)->max('id');
    $statusR1_BRIDLE_N6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N6)->value('status_id');
    //ROLO 3 BRIDLE Nº 4
    $tag_vibracaoR3_BRIDLE_N4 = "VB 72 400 410 342 000 - 000003";
    $idAtividadeR3_BRIDLE_N4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR3_BRIDLE_N4)->value('id');
    $idAnaliseR3_BRIDLE_N4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR3_BRIDLE_N4)->max('id');
    $statusR3_BRIDLE_N4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR3_BRIDLE_N4)->value('status_id');
    //ROLO 4 BRIDLE Nº 4
    $tag_vibracaoR4_BRIDLE_N4 = "VB 72 400 410 343 000 - 000004";
    $idAtividadeR4_BRIDLE_N4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR4_BRIDLE_N4)->value('id');
    $idAnaliseR4_BRIDLE_N4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR4_BRIDLE_N4)->max('id');
    $statusR4_BRIDLE_N4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR4_BRIDLE_N4)->value('status_id');
    //ROLO 1 BRIDLE Nº 4
    $tag_vibracaoR1_BRIDLE_N4 = "VB 72 400 410 339 000 - 000001";
    $idAtividadeR1_BRIDLE_N4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_N4)->value('id');
    $idAnaliseR1_BRIDLE_N4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N4)->max('id');
    $statusR1_BRIDLE_N4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N4)->value('status_id');
    //ROLO 2 BRIDLE Nº 4
    $tag_vibracaoR2_BRIDLE_N4 = "VB 72 400 410 340 000 - 000002";
    $idAtividadeR2_BRIDLE_N4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_N4)->value('id');
    $idAnaliseR2_BRIDLE_N4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N4)->max('id');
    $statusR2_BRIDLE_N4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N4)->value('status_id');

    if ($statusUHL_B2 == 5 || $statusCB_2 == 5 || $statusCB_1 == 5 || $statusUHL_REC == 5 || $statusUHL_B1 == 5 || $statusUHAR_B2 == 5 || $statusFASRG_5_1 == 5 || $statusUHAR_B1 == 5 ||
    $statusFASRG_5_B1 == 5 || $statusR1_BRIDLE_5B == 5 || $statusR1_BRIDLE_5A == 5 || $statusR2_BRIDLE_5B == 5 || $statusR2_BRIDLE_5A == 5 || $statusR2_BRIDLE_N6 == 5 ||
    $statusR1_BRIDLE_N6 == 5 || $statusR3_BRIDLE_N4 == 5 || $statusR4_BRIDLE_N4 == 5 || $statusR1_BRIDLE_N4 == 5 || $statusR2_BRIDLE_N4 == 5) {
      $galvanizacao_laminador_status = 5;
    } elseif ($statusUHL_B2 == 4 || $statusCB_2 == 4 || $statusCB_1 == 4 || $statusUHL_REC == 4 || $statusUHL_B1 == 4 || $statusUHAR_B2 == 4 || $statusFASRG_5_1 == 4 || $statusUHAR_B1 == 4 ||
    $statusFASRG_5_B1 == 4 || $statusR1_BRIDLE_5B == 4 || $statusR1_BRIDLE_5A == 4 || $statusR2_BRIDLE_5B == 4 || $statusR2_BRIDLE_5A == 4 || $statusR2_BRIDLE_N6 == 4 ||
    $statusR1_BRIDLE_N6 == 4 || $statusR3_BRIDLE_N4 == 4 || $statusR4_BRIDLE_N4 == 4 || $statusR1_BRIDLE_N4 == 4 || $statusR2_BRIDLE_N4 == 4) {
      $galvanizacao_laminador_status = 4;
    } elseif ($statusUHL_B2 == 3 || $statusCB_2 == 3 || $statusCB_1 == 3 || $statusUHL_REC == 3 || $statusUHL_B1 == 3 || $statusUHAR_B2 == 3 || $statusFASRG_5_1 == 3 || $statusUHAR_B1 == 3 ||
    $statusFASRG_5_B1 == 3 || $statusR1_BRIDLE_5B == 3 || $statusR1_BRIDLE_5A == 3 || $statusR2_BRIDLE_5B == 3 || $statusR2_BRIDLE_5A == 3 || $statusR2_BRIDLE_N6 == 3 ||
    $statusR1_BRIDLE_N6 == 3 || $statusR3_BRIDLE_N4 == 3 || $statusR4_BRIDLE_N4 == 3 || $statusR1_BRIDLE_N4 == 3 || $statusR2_BRIDLE_N4 == 3) {
      $galvanizacao_laminador_status = 3;
    }
    else {
      $galvanizacao_laminador_status = "";
    }

    return $galvanizacao_laminador_status;
  }

  public static function galvanizacao_saida_Menu() {
    $galvanizacao_saida_status = "";
    //SISTEMA EXAUSTAO COATERS
    $tag_vibracaoSEC = "VB 72 400 410 407 000 - 000001";
    $idAtividadeSEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEC)->value('id');
    $idAnaliseSEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEC)->max('id');
    $statusSEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEC)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - BOMBA 04
    $tag_vibracaoUHPS_B1 = "VB 72 400 410 541 000 - 000004";
    $idAtividadeUHPS_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_B1)->value('id');
    $idAnaliseUHPS_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_B1)->max('id');
    $statusUHPS_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_B1)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - RECIRCULACAO
    $tag_vibracaoUHPS_REC = "VB 72 400 410 541 000 - 000005";
    $idAtividadeUHPS_REC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_REC)->value('id');
    $idAnaliseUHPS_REC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_REC)->max('id');
    $statusUHPS_REC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_REC)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - BOMBA 03
    $tag_vibracaoUHPS_B3 = "VB 72 400 410 541 000 - 000003";
    $idAtividadeUHPS_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_B3)->value('id');
    $idAnaliseUHPS_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_B3)->max('id');
    $statusUHPS_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_B3)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - BOMBA 02
    $tag_vibracaoUHPS_B4 = "VB 72 400 410 541 000 - 000002";
    $idAtividadeUHPS_B4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_B4)->value('id');
    $idAnaliseUHPS_B4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_B4)->max('id');
    $statusUHPS_B4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_B4)->value('status_id');
    //UNIDADE HIDR. PRINCIPAL SAIDA - BOMBA 01
    $tag_vibracaoUHPS_B1 = "VB 72 400 410 541 000 - 000001";
    $idAtividadeUHPS_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHPS_B1)->value('id');
    $idAnaliseUHPS_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS_B1)->max('id');
    $statusUHPS_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS_B1)->value('status_id');
    //UNIDADE HIDR. FIFE ENROLADEIRA Nº 01 - BOMBA 02
    $tag_vibracaoUHFE_N1_B2 = "VB 72 400 410 475 000 - 000002";
    $idAtividadeUHFE_N1_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFE_N1_B2)->value('id');
    $idAnaliseUHFE_N1_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N1_B2)->max('id');
    $statusUHFE_N1_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N1_B2)->value('status_id');
    //UNIDADE HIDR. FIFE ENROLADEIRA Nº 01 - BOMBA 01
    $tag_vibracaoUHFE_N1_B1 = "VB 72 400 410 475 000 - 000001";
    $idAtividadeUHFE_N1_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFE_N1_B1)->value('id');
    $idAnaliseUHFE_N1_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N1_B1)->max('id');
    $statusUHFE_N1_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N1_B1)->value('status_id');
    //UNIDADE HIDR. FIFE ENROLADEIRA Nº 02 - BOMBA 02
    $tag_vibracaoUHFE_N2_B2 = "VB 72 400 410 499 000 - 000002";
    $idAtividadeUHFE_N2_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFE_N2_B2)->value('id');
    $idAnaliseUHFE_N2_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N2_B2)->max('id');
    $statusUHFE_N2_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N2_B2)->value('status_id');
    //UNIDADE HIDR. FIFE ENROLADEIRA Nº 02 - BOMBA 01
    $tag_vibracaoUHFE_N2_B1 = "VB 72 400 410 499 000 - 000001";
    $idAtividadeUHFE_N2_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHFE_N2_B1)->value('id');
    $idAnaliseUHFE_N2_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N2_B1)->max('id');
    $statusUHFE_N2_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N2_B1)->value('status_id');
    //SOPRADOR DE COMBUSTÃO TORRE INFRA-RED - COMBUSTÃO
    $tag_vibracaoSCT_COMB = "VB 72 400 410 410 000 - 000001";
    $idAtividadeSCT_COMB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSCT_COMB)->value('id');
    $idAnaliseSCT_COMB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSCT_COMB)->max('id');
    $statusSCT_COMB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSCT_COMB)->value('status_id');
    //SISTEMA DE EXAUSTAO INFRA-RED - RESFRIAMENTO
    $tag_vibracaoSEIR_RES = "VB 72 400 410 409 000 - 000002";
    $idAtividadeSEIR_RES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSEIR_RES)->value('id');
    $idAnaliseSEIR_RES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEIR_RES)->max('id');
    $statusSEIR_RES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEIR_RES)->value('status_id');
    //SISTEMA DE EXAUSTAO INFRA-RED - CAIXA AQUECEDORA
    $tag_vibracaoSE_CA = "VB 72 400 410 409 000 - 000001";
    $idAtividadeSE_CA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSE_CA)->value('id');
    $idAnaliseSE_CA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSE_CA)->max('id');
    $statusSE_CA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSE_CA)->value('status_id');
    //ROLO 1 BRIDLE Nº 7
    $tag_vibracaoR1_BRIDLE_N7 = "VB 72 400 410 455 000 - 000001";
    $idAtividadeR1_BRIDLE_N7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR1_BRIDLE_N7)->value('id');
    $idAnaliseR1_BRIDLE_N7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N7)->max('id');
    $statusR1_BRIDLE_N7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N7)->value('status_id');
    //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº01
    $tag_vibracaoAPE_N1 = "VB 72 400 410 477 000 - 000001";
    $idAtividadeAPE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPE_N1)->value('id');
    $idAnaliseAPE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_N1)->max('id');
    $statusAPE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_N1)->value('status_id');
    //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº02
    $tag_vibracaoAPE_N2 = "VB 72 400 410 501 000 - 000001";
    $idAtividadeAPE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAPE_N2)->value('id');
    $idAnaliseAPE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_N2)->max('id');
    $statusAPE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_N2)->value('status_id');
    //ROLO 2 BRIDLE Nº 7
    $tag_vibracaoR2_BRIDLE_N7 = "VB 72 400 410 456 000 - 000001";
    $idAtividadeR2_BRIDLE_N7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoR2_BRIDLE_N7)->value('id');
    $idAnaliseR2_BRIDLE_N7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N7)->max('id');
    $statusR2_BRIDLE_N7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N7)->value('status_id');
    //TORRE RESFRIAMENTO DOS COATERS - SOPRADOR 1
    $tag_vibracaoTRC_SOP1 = "VB 72 400 410 411 000 - 000001";
    $idAtividadeTRC_SOP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRC_SOP1)->value('id');
    $idAnaliseTRC_SOP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRC_SOP1)->max('id');
    $statusTRC_SOP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRC_SOP1)->value('status_id');
    //TORRE RESFRIAMENTO DOS COATERS - SOPRADOR 2
    $tag_vibracaoTRC_SOP2 = "VB 72 400 410 411 000 - 000002";
    $idAtividadeTRC_SOP2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRC_SOP2)->value('id');
    $idAnaliseTRC_SOP2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRC_SOP2)->max('id');
    $statusTRC_SOP2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRC_SOP2)->value('status_id');
    //TORRE RESFRIAMENTO DOS COATERS - SOPRADOR 3
    $tag_vibracaoTRC_SOP3 = "VB 72 400 410 411 000 - 000003";
    $idAtividadeTRC_SOP3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRC_SOP3)->value('id');
    $idAnaliseTRC_SOP3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRC_SOP3)->max('id');
    $statusTRC_SOP3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRC_SOP3)->value('status_id');
    //TORRE RESFRIAMENTO DOS COATERS - SOPRADOR 4
    $tag_vibracaoTRC_SOP4 = "VB 72 400 410 411 000 - 000004";
    $idAtividadeTRC_SOP4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTRC_SOP4)->value('id');
    $idAnaliseTRC_SOP4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRC_SOP4)->max('id');
    $statusTRC_SOP4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRC_SOP4)->value('status_id');

    if ($statusSEC == 5 || $statusUHPS_B1 == 5 || $statusUHPS_REC == 5 || $statusUHPS_B3 == 5 || $statusUHPS_B4 == 5 || $statusUHPS_B1 == 5 || $statusUHFE_N1_B2 == 5 ||
    $statusUHFE_N1_B1 == 5 || $statusUHFE_N2_B2 == 5 || $statusUHFE_N2_B1 == 5 || $statusSCT_COMB == 5 || $statusSEIR_RES == 5 || $statusSE_CA == 5 ||
    $statusR1_BRIDLE_N7 == 5 || $statusAPE_N1 == 5 || $statusAPE_N2 == 5 || $statusTRC_SOP1 == 5 || $statusTRC_SOP2 == 5 || $statusTRC_SOP3 == 5 || $statusTRC_SOP4 == 5) {
      $galvanizacao_saida_status = 5;
    } elseif ($statusSEC == 4 || $statusUHPS_B1 == 4 || $statusUHPS_REC == 4 || $statusUHPS_B3 == 4 || $statusUHPS_B4 == 4 || $statusUHPS_B1 == 4 || $statusUHFE_N1_B2 == 4 ||
    $statusUHFE_N1_B1 == 4 || $statusUHFE_N2_B2 == 4 || $statusUHFE_N2_B1 == 4 || $statusSCT_COMB == 4 || $statusSEIR_RES == 4 || $statusSE_CA == 4 ||
    $statusR1_BRIDLE_N7 == 4 || $statusAPE_N1 == 4 || $statusAPE_N2 == 4 || $statusTRC_SOP1 == 4 || $statusTRC_SOP2 == 4 || $statusTRC_SOP3 == 4 || $statusTRC_SOP4 == 4) {
      $galvanizacao_saida_status = 4;
    } elseif ($statusSEC == 3 || $statusUHPS_B1 == 3 || $statusUHPS_REC == 3 || $statusUHPS_B3 == 3 || $statusUHPS_B4 == 3 || $statusUHPS_B1 == 3 || $statusUHFE_N1_B2 == 3 ||
    $statusUHFE_N1_B1 == 3 || $statusUHFE_N2_B2 == 3 || $statusUHFE_N2_B1 == 3 || $statusSCT_COMB == 3 || $statusSEIR_RES == 3 || $statusSE_CA == 3 ||
    $statusR1_BRIDLE_N7 == 3 || $statusAPE_N1 == 3 || $statusAPE_N2 == 3 || $statusTRC_SOP1 == 3 || $statusTRC_SOP2 == 3 || $statusTRC_SOP3 == 3 || $statusTRC_SOP4 == 3) {
      $galvanizacao_saida_status = 3;
    }
    else {
      $galvanizacao_saida_status = "";
    }

    return $galvanizacao_saida_status;
  }

  public static function lgc_Menu() {
    $lgc_status = "";
    $galvanizacao_entrada_status = AuxFuncRelTec::galvanizacao_entrada_Menu();
    $galvanizacao_limpeza_boiler_status = AuxFuncRelTec::galvanizacao_limpeza_boiler_Menu();
    $galvanizacao_limpeza_escovas_status = AuxFuncRelTec::galvanizacao_limpeza_escovas_Menu();
    $galvanizacao_forno_status = AuxFuncRelTec::galvanizacao_forno_Menu();
    $galvanizacao_apc_porao_status = AuxFuncRelTec::galvanizacao_apc_porao_Menu();
    $galvanizacao_laminador_status = AuxFuncRelTec::galvanizacao_laminador_Menu();
    $galvanizacao_saida_status = AuxFuncRelTec::galvanizacao_saida_Menu();

    if ($galvanizacao_entrada_status == 5 || $galvanizacao_limpeza_boiler_status == 5 || $galvanizacao_limpeza_escovas_status == 5 ||
  $galvanizacao_forno_status == 5 || $galvanizacao_apc_porao_status == 5 || $galvanizacao_laminador_status == 5 || $galvanizacao_saida_status == 5) {
      $lgc_status = 5;
    } elseif ($galvanizacao_entrada_status == 4 || $galvanizacao_limpeza_boiler_status == 4 || $galvanizacao_limpeza_escovas_status == 4 ||
  $galvanizacao_forno_status == 4 || $galvanizacao_apc_porao_status == 4 || $galvanizacao_laminador_status == 4 || $galvanizacao_saida_status == 4) {
      $lgc_status = 4;
    } elseif ($galvanizacao_entrada_status == 3 || $galvanizacao_limpeza_boiler_status == 3 || $galvanizacao_limpeza_escovas_status == 3 ||
  $galvanizacao_forno_status == 3 || $galvanizacao_apc_porao_status == 3 || $galvanizacao_laminador_status == 3 || $galvanizacao_saida_status == 3) {
      $lgc_status = 3;
    } else {
      $lgc_status = "";
    }

    return $lgc_status;
  }

  public static function lgc_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_normal = aux::GeralPorLinhaVib($atual1, 3, $lgc_linha1, $lgc_linha2);
    return $lgc_normal;
  }
  public static function lgc_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_alarme = aux::GeralPorLinhaVib($atual1, 4, $lgc_linha1, $lgc_linha2);
    return $lgc_alarme;
  }
  public static function lgc_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_critico = aux::GeralPorLinhaVib($atual1, 5, $lgc_linha1, $lgc_linha2);
    return $lgc_critico;
  }

  public static function pintura_entrada_Menu() {
    $pintura_entrada_status = "";
    //DESENROLADEIRA 01
    $tag_vibracaoDESENR_01 = "VB 72 500 510 009 000 - 000001";
    $idAtividadeDESENR_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDESENR_01)->value('id');
    $idAnaliseDESENR_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENR_01)->max('id');
    $statusDESENR_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENR_01)->value('status_id');
    //ROLO PUXADOR 01
    $tag_vibracaoRP_01 = "VB 72 500 510 021 000 - 000001";
    $idAtividadeRP_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRP_01)->value('id');
    $idAnaliseRP_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRP_01)->max('id');
    $statusRP_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRP_01)->value('status_id');
    //DESENROLADEIRA 2
    $tag_vibracaoDESENR_02 = "VB 72 500 510 031 000 - 000001";
    $idAtividadeDESENR_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoDESENR_02)->value('id');
    $idAnaliseDESENR_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENR_02)->max('id');
    $statusDESENR_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENR_02)->value('status_id');
    //UNIDADE HIDRAULICA DE ENTRADA 2
    $tag_vibracaoUHE_2 = "VB 72 500 510 078 000 - 000002";
    $idAtividadeUHE_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHE_2)->value('id');
    $idAnaliseUHE_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_2)->max('id');
    $statusUHE_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_2)->value('status_id');
    //UNIDADE HIDRAULICA DE ENTRADA 1
    $tag_vibracaoUHE_1 = "VB 72 500 510 078 000 - 000001";
    $idAtividadeUHE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHE_1)->value('id');
    $idAnaliseUHE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_1)->max('id');
    $statusUHE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_1)->value('status_id');

    if ($statusDESENR_01 == 5 || $statusRP_01 == 5 || $statusDESENR_02 == 5 || $statusUHE_2 == 5 || $statusUHE_1 == 5) {
      $pintura_entrada_status = 5;
    } elseif ($statusDESENR_01 == 4 || $statusRP_01 == 4 || $statusDESENR_02 == 4 || $statusUHE_2 == 4 || $statusUHE_1 == 4) {
      $pintura_entrada_status = 4;
    } elseif ($statusDESENR_01 == 3 || $statusRP_01 == 3 || $statusDESENR_02 == 3 || $statusUHE_2 == 3 || $statusUHE_1 == 3) {
      $pintura_entrada_status = 3;
    }
    else {
      $pintura_entrada_status = "";
    }

    return $pintura_entrada_status;
  }

  public static function pintura_processo1_Menu() {
    $pintura_processo1_status = "";
    //CONJUNTO TENSOR 02 - ROLO 01
    $tag_vibracaoCT2_R1 = "VB 72 500 510 098 000 - 000001";
    $idAtividadeCT2_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT2_R1)->value('id');
    $idAnaliseCT2_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT2_R1)->max('id');
    $statusCT2_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT2_R1)->value('status_id');
    //CONJUNTO TENSOR 02 - ROLO 02
    $tag_vibracaoCT2_R2 = "VB 72 500 510 098 000 - 000002";
    $idAtividadeCT2_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT2_R2)->value('id');
    $idAnaliseCT2_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT2_R2)->max('id');
    $statusCT2_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT2_R2)->value('status_id');
    //CONJUNTO TENSOR 01 - ROLO 02
    $tag_vibracaoCT1_R2 = "VB 72 500 510 084 000 - 000002";
    $idAtividadeCT1_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT1_R2)->value('id');
    $idAnaliseCT1_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT1_R2)->max('id');
    $statusCT1_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT1_R2)->value('status_id');
    //SISTEMA CORRETOR 02 - BOMBA 01
    $tag_vibracaoSC2_B1 = "VB 72 500 510 096 000 - 000001";
    $idAtividadeSC2_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC2_B1)->value('id');
    $idAnaliseSC2_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC2_B1)->max('id');
    $statusSC2_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC2_B1)->value('status_id');
    //SISTEMA CORRETOR 02 - BOMBA 02
    $tag_vibracaoSC2_B2 = "VB 72 500 510 096 000 - 000002";
    $idAtividadeSC2_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC2_B2)->value('id');
    $idAnaliseSC2_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC2_B2)->max('id');
    $statusSC2_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC2_B2)->value('status_id');
    //CONJUNTO TENSOR 01 - ROLO 01
    $tag_vibracaoCT1_R1 = "VB 72 500 510 084 000 - 000001";
    $idAtividadeCT1_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT1_R1)->value('id');
    $idAnaliseCT1_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT1_R1)->max('id');
    $statusCT1_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT1_R1)->value('status_id');
    //SISTEMA CORRETOR 01 - BOMBA 01
    $tag_vibracaoSC1_B01 = "VB 72 500 510 086 000 - 000001";
    $idAtividadeSC1_B01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC1_B01)->value('id');
    $idAnaliseSC1_B01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC1_B01)->max('id');
    $statusSC1_B01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC1_B01)->value('status_id');
    //SISTEMA CORRETOR 01 - BOMBA 02
    $tag_vibracaoSC1_B02 = "VB 72 500 510 086 000 - 000002";
    $idAtividadeSC1_B02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC1_B02)->value('id');
    $idAnaliseSC1_B02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC1_B02)->max('id');
    $statusSC1_B02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC1_B02)->value('status_id');
    //SOPRADOR AR QUENTE 01
    $tag_vibracaoSARQ_01 = "VB 72 500 510 082 000 - 000001";
    $idAtividadeSARQ_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSARQ_01)->value('id');
    $idAnaliseSARQ_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSARQ_01)->max('id');
    $statusSARQ_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSARQ_01)->value('status_id');
    //LAVADOR DE GASES DO TRATAMENTO QUIMICO
    $tag_vibracaoLGTQ = "VB 72 500 510 150 000 - 000003";
    $idAtividadeLGTQ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLGTQ)->value('id');
    $idAnaliseLGTQ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLGTQ)->max('id');
    $statusLGTQ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLGTQ)->value('status_id');

    if ($statusCT2_R1 == 5 || $statusCT2_R2 == 5 || $statusCT1_R2 == 5 || $statusSC2_B1 == 5 || $statusSC2_B2 == 5 || $statusCT1_R1 == 5 ||
    $statusSC1_B01 == 5 || $statusSC1_B02 == 5 || $statusSARQ_01 == 5 || $statusLGTQ == 5) {
      $pintura_processo1_status = 5;
    } elseif ($statusCT2_R1 == 4 || $statusCT2_R2 == 4 || $statusCT1_R2 == 4 || $statusSC2_B1 == 4 || $statusSC2_B2 == 4 || $statusCT1_R1 == 4 ||
    $statusSC1_B01 == 4 || $statusSC1_B02 == 4 || $statusSARQ_01 == 4 || $statusLGTQ == 4) {
      $pintura_processo1_status = 4;
    } elseif ($statusCT2_R1 == 3 || $statusCT2_R2 == 3 || $statusCT1_R2 == 3 || $statusSC2_B1 == 3 || $statusSC2_B2 == 3 || $statusCT1_R1 == 3 ||
    $statusSC1_B01 == 3 || $statusSC1_B02 == 3 || $statusSARQ_01 == 3 || $statusLGTQ == 3) {
      $pintura_processo1_status = 3;
    }
    else {
      $pintura_processo1_status = "";
    }

    return $pintura_processo1_status;
  }

  public static function pintura_processo2_Menu() {
    $pintura_processo2_status = "";
    //SISTEMA CORRETOR 03 - BOMBA 01
    $tag_vibracaoSC3_B1 = "VB 72 500 510 164 000 - 000001";
    $idAtividadeSC3_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC3_B1)->value('id');
    $idAnaliseSC3_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC3_B1)->max('id');
    $statusSC3_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC3_B1)->value('status_id');
    //SISTEMA CORRETOR 03 - BOMBA 02
    $tag_vibracaoSC3_B2 = "VB 72 500 510 164 000 - 000002";
    $idAtividadeSC3_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC3_B2)->value('id');
    $idAnaliseSC3_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC3_B2)->max('id');
    $statusSC3_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC3_B2)->value('status_id');
    //CONJUNTO TENSOR 03 - ROLO 02
    $tag_vibracaoCT3_R2 = "VB 72 500 510 166 000 - 000002";
    $idAtividadeCT3_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT3_R2)->value('id');
    $idAnaliseCT3_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT3_R2)->max('id');
    $statusCT3_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT3_R2)->value('status_id');
    //CONJUNTO TENSOR 03 - ROLO 01
    $tag_vibracaoCT3_R1 = "VB 72 500 510 166 000 - 000001";
    $idAtividadeCT3_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT3_R1)->value('id');
    $idAnaliseCT3_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT3_R1)->max('id');
    $statusCT3_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT3_R1)->value('status_id');
    //SOPRADOR AR QUENTE 02
    $tag_vibracaoSARQ_02 = "VB 72 500 510 148 000 - 000001";
    $idAtividadeSARQ_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSARQ_02)->value('id');
    $idAnaliseSARQ_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSARQ_02)->max('id');
    $statusSARQ_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSARQ_02)->value('status_id');
    //SISTEMA CORRETOR 05 - BOMBA 02
    $tag_vibracaoSC5_B2 = "VB 72 500 510 212 000 - 000002";
    $idAtividadeSC5_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC5_B2)->value('id');
    $idAnaliseSC5_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC5_B2)->max('id');
    $statusSC5_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC5_B2)->value('status_id');
    //SISTEMA CORRETOR 05 - BOMBA 01
    $tag_vibracaoSC5_B1 = "VB 72 500 510 212 000 - 000001";
    $idAtividadeSC5_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC5_B1)->value('id');
    $idAnaliseSC5_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC5_B1)->max('id');
    $statusSC5_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC5_B1)->value('status_id');
    //CALDEIRA - BOMBA 01
    $tag_vibracaoCB_01 = "VB 72 500 510 152 000 - 000001";
    $idAtividadeCB_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCB_01)->value('id');
    $idAnaliseCB_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_01)->max('id');
    $statusCB_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_01)->value('status_id');
    //CALDEIRA - BOMBA 02
    $tag_vibracaoCB_02 = "VB 72 500 510 152 000 - 000003";
    $idAtividadeCB_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCB_02)->value('id');
    $idAnaliseCB_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_02)->max('id');
    $statusCB_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_02)->value('status_id');
    //CALDEIRA - EX
    $tag_vibracaoCEX = "VB 72 500 510 152 000 - 000002";
    $idAtividadeCEX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCEX)->value('id');
    $idAnaliseCEX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCEX)->max('id');
    $statusCEX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCEX)->value('status_id');
    //LAVADOR DE GASES DO CROMO - BOMBA 01
    $tag_vibracaoLGC_B1 = "VB 72 500 510 160 000 - 000001";
    $idAtividadeLGC_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLGC_B1)->value('id');
    $idAnaliseLGC_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLGC_B1)->max('id');
    $statusLGC_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLGC_B1)->value('status_id');
    //LAVADOR DE GASES DO CROMO - BOMBA 02
    $tag_vibracaoLGC_B2 = "VB 72 500 510 160 000 - 000002";
    $idAtividadeLGC_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLGC_B2)->value('id');
    $idAnaliseLGC_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLGC_B2)->max('id');
    $statusLGC_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLGC_B2)->value('status_id');
    //LAVADOR DE GASES DO CROMO - EX
    $tag_vibracaoLGC_EX = "VB 72 500 510 160 000 - 000003";
    $idAtividadeLGC_EX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoLGC_EX)->value('id');
    $idAnaliseLGC_EX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLGC_EX)->max('id');
    $statusLGC_EX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLGC_EX)->value('status_id');

    if ($statusSC3_B1 == 5 || $statusSC3_B2 == 5 || $statusCT3_R2 == 5 || $statusCT3_R1 == 5 || $statusSARQ_02 == 5 || $statusSC5_B2 == 5 ||
    $statusSC5_B1 == 5 || $statusCB_01 == 5 || $statusCB_02 == 5 || $statusCEX == 5 || $statusLGC_B1 == 5 || $statusLGC_B2 == 5 || $statusLGC_EX == 5) {
      $pintura_processo2_status = 5;
    } elseif ($statusSC3_B1 == 4 || $statusSC3_B2 == 4 || $statusCT3_R2 == 4 || $statusCT3_R1 == 4 || $statusSARQ_02 == 4 || $statusSC5_B2 == 4 ||
    $statusSC5_B1 == 4 || $statusCB_01 == 4 || $statusCB_02 == 4 || $statusCEX == 4 || $statusLGC_B1 == 4 || $statusLGC_B2 == 4 || $statusLGC_EX == 4) {
      $pintura_processo2_status = 4;
    } elseif ($statusSC3_B1 == 3 || $statusSC3_B2 == 3 || $statusCT3_R2 == 3 || $statusCT3_R1 == 3 || $statusSARQ_02 == 3 || $statusSC5_B2 == 3 ||
    $statusSC5_B1 == 3 || $statusCB_01 == 3 || $statusCB_02 == 3 || $statusCEX == 3 || $statusLGC_B1 == 3 || $statusLGC_B2 == 3 || $statusLGC_EX == 3) {
      $pintura_processo2_status = 3;
    }
    else {
      $pintura_processo2_status = "";
    }

    return $pintura_processo2_status;
  }

  public static function pintura_estufas_Menu() {
    $pintura_estufas_status = "";
    //SISTEMA CORRETOR 06 - BOMBA 02
    $tag_vibracaoSC6_B2 = "VB 72 500 510 256 000 - 000002";
    $idAtividadeSC6_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC6_B2)->value('id');
    $idAnaliseSC6_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC6_B2)->max('id');
    $statusSC6_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC6_B2)->value('status_id');
    //SISTEMA CORRETOR 06 - BOMBA 01
    $tag_vibracaoSC6_B1 = "VB 72 500 510 256 000 - 000001";
    $idAtividadeSC6_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC6_B1)->value('id');
    $idAnaliseSC6_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC6_B1)->max('id');
    $statusSC6_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC6_B1)->value('status_id');
    //SOPRADOR 02 ESTUFA PRIME ZONA 04
    $tag_vibracaoS2_EPZ4 = "VB 72 500 510 196 000 - 000001";
    $idAtividadeS2_EPZ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_EPZ4)->value('id');
    $idAnaliseS2_EPZ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EPZ4)->max('id');
    $statusS2_EPZ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EPZ4)->value('status_id');
    //SOPRADOR 01 ESTUFA PRIME ZONA 04
    $tag_vibracaoS1_EPZ4 = "VB 72 500 510 194 000 - 000001";
    $idAtividadeS1_EPZ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_EPZ4)->value('id');
    $idAnaliseS1_EPZ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EPZ4)->max('id');
    $statusS1_EPZ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EPZ4)->value('status_id');
    //SOPRADOR 02 ESTUFA PRIME ZONA 03
    $tag_vibracaoS2_EPZ3 = "VB 72 500 510 190 000 - 000001";
    $idAtividadeS2_EPZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_EPZ3)->value('id');
    $idAnaliseS2_EPZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EPZ3)->max('id');
    $statusS2_EPZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EPZ3)->value('status_id');
    //SOPRADOR 01 ESTUFA PRIME ZONA 03
    $tag_vibracaoS1_EPZ3 = "VB 72 500 510 188 000 - 000001";
    $idAtividadeS1_EPZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_EPZ3)->value('id');
    $idAnaliseS1_EPZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EPZ3)->max('id');
    $statusS1_EPZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EPZ3)->value('status_id');
    //SOPRADOR 02 ESTUFA PRIME ZONA 02
    $tag_vibracaoS2_EPZ2 = "VB 72 500 510 184 000 - 000001";
    $idAtividadeS2_EPZ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_EPZ2)->value('id');
    $idAnaliseS2_EPZ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EPZ2)->max('id');
    $statusS2_EPZ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EPZ2)->value('status_id');
    //SOPRADOR 01 ESTUFA PRIME ZONA 02
    $tag_vibracaoS1_EPZ2 = "VB 72 500 510 182 000 - 000001";
    $idAtividadeS1_EPZ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_EPZ2)->value('id');
    $idAnaliseS1_EPZ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EPZ2)->max('id');
    $statusS1_EPZ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EPZ2)->value('status_id');
    //SOPRADOR 02 ESTUFA PRIME ZONA 01
    $tag_vibracaoS2_EPZ1 = "VB 72 500 510 178 000 - 000001";
    $idAtividadeS2_EPZ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_EPZ1)->value('id');
    $idAnaliseS2_EPZ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EPZ1)->max('id');
    $statusS2_EPZ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EPZ1)->value('status_id');
    //SOPRADOR 01 ESTUFA PRIME ZONA 01
    $tag_vibracaoS1_EPZ1 = "VB 72 500 510 176 000 - 000001";
    $idAtividadeS1_EPZ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_EPZ1)->value('id');
    $idAnaliseS1_EPZ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EPZ1)->max('id');
    $statusS1_EPZ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EPZ1)->value('status_id');
    //SOPRADOR AR QUENTE 03
    $tag_vibracaoSARQ_3 = "VB 72 500 510 202 000 - 000001";
    $idAtividadeSARQ_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSARQ_3)->value('id');
    $idAnaliseSARQ_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSARQ_3)->max('id');
    $statusSARQ_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSARQ_3)->value('status_id');
    //EXAUSTOR DOS ENXAGUES 1 E 2
    $tag_vibracaoEE_1_2 = "VB 72 500 510 248 000 - 000001";
    $idAtividadeEE_1_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEE_1_2)->value('id');
    $idAnaliseEE_1_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEE_1_2)->max('id');
    $statusEE_1_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEE_1_2)->value('status_id');
    //SOPRADOR 01 ESTUFA TINTA ZONA 01
    $tag_vibracaoS1_ETZ1 = "VB 72 500 510 222 000 - 000001";
    $idAtividadeS1_ETZ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_ETZ1)->value('id');
    $idAnaliseS1_ETZ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_ETZ1)->max('id');
    $statusS1_ETZ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_ETZ1)->value('status_id');
    //SOPRADOR 02 ESTUFA TINTA ZONA 01
    $tag_vibracaoS2_ETZ1 = "VB 72 500 510 224 000 - 000001";
    $idAtividadeS2_ETZ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_ETZ1)->value('id');
    $idAnaliseS2_ETZ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_ETZ1)->max('id');
    $statusS2_ETZ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_ETZ1)->value('status_id');
    //SOPRADOR 01 ESTUFA TINTA ZONA 02
    $tag_vibracaoS1_ETZ2 = "VB 72 500 510 228 000 - 000001";
    $idAtividadeS1_ETZ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_ETZ2)->value('id');
    $idAnaliseS1_ETZ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_ETZ2)->max('id');
    $statusS1_ETZ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_ETZ2)->value('status_id');
    //SOPRADOR 02 ESTUFA TINTA ZONA 02
    $tag_vibracaoS2_ETZ2 = "VB 72 500 510 230 000 - 000001";
    $idAtividadeS2_ETZ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_ETZ2)->value('id');
    $idAnaliseS2_ETZ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_ETZ2)->max('id');
    $statusS2_ETZ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_ETZ2)->value('status_id');
    //SOPRADOR 01 ESTUFA TINTA ZONA 03
    $tag_vibracaoS1_ETZ3 = "VB 72 500 510 234 000 - 000001";
    $idAtividadeS1_ETZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_ETZ3)->value('id');
    $idAnaliseS1_ETZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_ETZ3)->max('id');
    $statusS1_ETZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_ETZ3)->value('status_id');
    //SOPRADOR 02 ESTUFA TINTA ZONA 03
    $tag_vibracaoS2_ETZ3 = "VB 72 500 510 236 000 - 000001";
    $idAtividadeS2_ETZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_ETZ3)->value('id');
    $idAnaliseS2_ETZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_ETZ3)->max('id');
    $statusS2_ETZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_ETZ3)->value('status_id');
    //SOPRADOR 01 ESTUFA TINTA ZONA 04
    $tag_vibracaoS1_ETZ4 = "VB 72 500 510 240 000 - 000001";
    $idAtividadeS1_ETZ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS1_ETZ4)->value('id');
    $idAnaliseS1_ETZ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_ETZ4)->max('id');
    $statusS1_ETZ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_ETZ4)->value('status_id');
    //SOPRADOR 02 ESTUFA TINTA ZONA 04
    $tag_vibracaoS2_ETZ4 = "VB 72 500 510 242 000 - 000001";
    $idAtividadeS2_ETZ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoS2_ETZ4)->value('id');
    $idAnaliseS2_ETZ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_ETZ4)->max('id');
    $statusS2_ETZ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_ETZ4)->value('status_id');
    //EXAUSTOR DO LAMINADOR A QUENTE
    $tag_vibracaoELQ = "VB 72 500 510 246 000 - 000001";
    $idAtividadeELQ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoELQ)->value('id');
    $idAnaliseELQ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELQ)->max('id');
    $statusELQ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELQ)->value('status_id');
    //SOPRADOR AR QUENTE 04
    $tag_vibracaoSARQ_4 = "VB 72 500 510 254 000 - 000001";
    $idAtividadeSARQ_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSARQ_4)->value('id');
    $idAnaliseSARQ_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSARQ_4)->max('id');
    $statusSARQ_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSARQ_4)->value('status_id');

    if ($statusSC6_B2 == 5 || $statusSC6_B1 == 5 || $statusS2_EPZ4 == 5 || $statusS1_EPZ4 == 5 || $statusS2_EPZ3 == 5 || $statusS1_EPZ3 == 5 || $statusS2_EPZ2 == 5 ||
    $statusS1_EPZ2 == 5 || $statusS2_EPZ1 == 5 || $statusS1_EPZ1 == 5 || $statusSARQ_3 == 5 || $statusEE_1_2 == 5 || $statusS1_ETZ1 == 5 || $statusS2_ETZ1 == 5 ||
    $statusS1_ETZ2 == 5 || $statusS2_ETZ2 == 5 || $statusS1_ETZ3 == 5 || $statusS2_ETZ3 == 5 || $statusS1_ETZ4 == 5 || $statusS2_ETZ4 == 5 || $statusELQ == 5 || $statusSARQ_4 == 5) {
      $pintura_estufas_status = 5;
    } elseif ($statusSC6_B2 == 4 || $statusSC6_B1 == 4 || $statusS2_EPZ4 == 4 || $statusS1_EPZ4 == 4 || $statusS2_EPZ3 == 4 || $statusS1_EPZ3 == 4 || $statusS2_EPZ2 == 4 ||
    $statusS1_EPZ2 == 4 || $statusS2_EPZ1 == 4 || $statusS1_EPZ1 == 4 || $statusSARQ_3 == 4 || $statusEE_1_2 == 4 || $statusS1_ETZ1 == 4 || $statusS2_ETZ1 == 4 ||
    $statusS1_ETZ2 == 4 || $statusS2_ETZ2 == 4 || $statusS1_ETZ3 == 4 || $statusS2_ETZ3 == 4 || $statusS1_ETZ4 == 4 || $statusS2_ETZ4 == 4 || $statusELQ == 4 || $statusSARQ_4 == 4) {
      $pintura_estufas_status = 4;
    } elseif ($statusSC6_B2 == 3 || $statusSC6_B1 == 3 || $statusS2_EPZ4 == 3 || $statusS1_EPZ4 == 3 || $statusS2_EPZ3 == 3 || $statusS1_EPZ3 == 3 || $statusS2_EPZ2 == 3 ||
    $statusS1_EPZ2 == 3 || $statusS2_EPZ1 == 3 || $statusS1_EPZ1 == 3 || $statusSARQ_3 == 3 || $statusEE_1_2 == 3 || $statusS1_ETZ1 == 3 || $statusS2_ETZ1 == 3 ||
    $statusS1_ETZ2 == 3 || $statusS2_ETZ2 == 3 || $statusS1_ETZ3 == 3 || $statusS2_ETZ3 == 3 || $statusS1_ETZ4 == 3 || $statusS2_ETZ4 == 3 || $statusELQ == 3 || $statusSARQ_4 == 3) {
      $pintura_estufas_status = 3;
    }
    else {
      $pintura_estufas_status = "";
    }

    return $pintura_estufas_status;
  }

  public static function pintura_areaExterna_Menu() {
    $pintura_areaExterna_status = "";
    //EXAUSTOR ESTUFA PRIME
    $tag_vibracaoEEP = "VB 72 500 510 334 000 - 000001";
    $idAtividadeEEP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEEP)->value('id');
    $idAnaliseEEP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEEP)->max('id');
    $statusEEP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEEP)->value('status_id');
    //EXAUSTOR ESTUFA TINTA
    $tag_vibracaoEET = "VB 72 500 510 336 000 - 000001";
    $idAtividadeEET = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoEET)->value('id');
    $idAnaliseEET = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEET)->max('id');
    $statusEET = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEET)->value('status_id');
    //SOPRADOR PRINC. INCINERADOR - SUPPLY FAN
    $tag_vibracaoSPI_SF = "VB 72 500 510 328 000 - 000001";
    $idAtividadeSPI_SF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSPI_SF)->value('id');
    $idAnaliseSPI_SF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPI_SF)->max('id');
    $statusSPI_SF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPI_SF)->value('status_id');
    //EXAUST. SALAS APLIC. TINTA - OUTER COTER
    $tag_vibracaoESPT_OC = "VB 72 500 510 330 000 - 000001";
    $idAtividadeESPT_OC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoESPT_OC)->value('id');
    $idAnaliseESPT_OC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESPT_OC)->max('id');
    $statusESPT_OC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESPT_OC)->value('status_id');
    //EXAUST.SALAS APLIC.TINTA - INNER COATER
    $tag_vibracaoESAT_IC = "VB 72 500 510 332 000 - 000001";
    $idAtividadeESAT_IC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoESAT_IC)->value('id');
    $idAnaliseESAT_IC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESAT_IC)->max('id');
    $statusESAT_IC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESAT_IC)->value('status_id');
    //SOPRADOR AR COMBUSTÃO ESTUFA PRIME
    $tag_vibracaoSACEP = "VB 72 500 510 338 000 - 000001";
    $idAtividadeSACEP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSACEP)->value('id');
    $idAnaliseSACEP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSACEP)->max('id');
    $statusSACEP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSACEP)->value('status_id');
    //SOPRADOR AR COMBUSTÃO ESTUFA TINTA
    $tag_vibracaoSACET = "VB 72 500 510 340 000 - 000001";
    $idAtividadeSACET = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSACET)->value('id');
    $idAnaliseSACET = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSACET)->max('id');
    $statusSACET = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSACET)->value('status_id');

    if ($statusEEP == 5 || $statusEET == 5 || $statusSPI_SF == 5 || $statusESPT_OC == 5 || $statusESAT_IC == 5 || $statusSACEP == 5 || $statusSACET == 5) {
      $pintura_areaExterna_status = 5;
    } elseif ($statusEEP == 4 || $statusEET == 4 || $statusSPI_SF == 4 || $statusESPT_OC == 4 || $statusESAT_IC == 4 || $statusSACEP == 4 || $statusSACET == 4) {
      $pintura_areaExterna_status = 4;
    } elseif ($statusEEP == 3 || $statusEET == 3 || $statusSPI_SF == 3 || $statusESPT_OC == 3 || $statusESAT_IC == 3 || $statusSACEP == 3 || $statusSACET == 3) {
      $pintura_areaExterna_status = 3;
    }
    else {
      $pintura_areaExterna_status = "";
    }

    return $pintura_areaExterna_status;
  }

  public static function pintura_saida_Menu() {
    $pintura_saida_status = "";
    //TESOURA DE SAÍDA
    $tag_vibracaoTS = "VB 72 500 510 292 000 - 000001";
    $idAtividadeTS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTS)->value('id');
    $idAnaliseTS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTS)->max('id');
    $statusTS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTS)->value('status_id');
    //CONJUNTO TENSOR 06 - ROLO 02
    $tag_vibracaoCT6_R2 = "VB 72 500 510 274 000 - 000002";
    $idAtividadeCT6_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT6_R2)->value('id');
    $idAnaliseCT6_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT6_R2)->max('id');
    $statusCT6_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT6_R2)->value('status_id');
    //CONJUNTO TENSOR 06 - ROLO 01
    $tag_vibracaoCT6_R1 = "VB 72 500 510 274 000 - 000001";
    $idAtividadeCT6_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT6_R1)->value('id');
    $idAnaliseCT6_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT6_R1)->max('id');
    $statusCT6_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT6_R1)->value('status_id');
    //CONJUNTO TENSOR 05 - ROLO 02
    $tag_vibracaoCT5_R2 = "VB 72 500 510 262 000 - 000002";
    $idAtividadeCT5_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT5_R2)->value('id');
    $idAnaliseCT5_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT5_R2)->max('id');
    $statusCT5_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT5_R2)->value('status_id');
    //CONJUNTO TENSOR 05 - ROLO 01
    $tag_vibracaoCT5_R1 = "VB 72 500 510 262 000 - 000001";
    $idAtividadeCT5_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT5_R1)->value('id');
    $idAnaliseCT5_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT5_R1)->max('id');
    $statusCT5_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT5_R1)->value('status_id');
    //CONJUNTO TENSOR 04 - ROLO 02
    $tag_vibracaoCT4_R2 = "VB 72 500 510 208 000 - 000002";
    $idAtividadeCT4_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT4_R2)->value('id');
    $idAnaliseCT4_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT4_R2)->max('id');
    $statusCT4_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT4_R2)->value('status_id');
    //CONJUNTO TENSOR 04 - ROLO 01
    $tag_vibracaoCT4_R1 = "VB 72 500 510 208 000 - 000001";
    $idAtividadeCT4_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoCT4_R1)->value('id');
    $idAnaliseCT4_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT4_R1)->max('id');
    $statusCT4_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT4_R1)->value('status_id');
    //SISTEMA CORRETOR 07 - BOMBA 01
    $tag_vibracaoSC7_B1 = "VB 72 500 510 272 000 - 000001";
    $idAtividadeSC7_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC7_B1)->value('id');
    $idAnaliseSC7_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC7_B1)->max('id');
    $statusSC7_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC7_B1)->value('status_id');
    //SISTEMA CORRETOR 07 - BOMBA 02
    $tag_vibracaoSC7_B2 = "VB 72 500 510 272 000 - 000002";
    $idAtividadeSC7_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC7_B2)->value('id');
    $idAnaliseSC7_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC7_B2)->max('id');
    $statusSC7_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC7_B2)->value('status_id');
    //ENROLADEIRA
    $tag_vibracaoENR = "VB 72 500 510 306 000 - 000001";
    $idAtividadeENR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoENR)->value('id');
    $idAnaliseENR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR)->max('id');
    $statusENR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR)->value('status_id');
    //SISTEMA CORRETOR 04 - BOMBA 02
    $tag_vibracaoSC4_B2 = "VB 72 500 510 204 000 - 000002";
    $idAtividadeSC4_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC4_B2)->value('id');
    $idAnaliseSC4_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC4_B2)->max('id');
    $statusSC4_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC4_B2)->value('status_id');
    //SISTEMA CORRETOR 04 - BOMBA 01
    $tag_vibracaoSC4_B1 = "VB 72 500 510 204 000 - 000001";
    $idAtividadeSC4_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSC4_B1)->value('id');
    $idAnaliseSC4_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC4_B1)->max('id');
    $statusSC4_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC4_B1)->value('status_id');
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA 01
    $tag_vibracaoUHS_B1 = "VB 72 500 510 318 000 - 000001";
    $idAtividadeUHS_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHS_B1)->value('id');
    $idAnaliseUHS_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B1)->max('id');
    $statusUHS_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B1)->value('status_id');
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA 02
    $tag_vibracaoUHS_B2 = "VB 72 500 510 318 000 - 000002";
    $idAtividadeUHS_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHS_B2)->value('id');
    $idAnaliseUHS_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B2)->max('id');
    $statusUHS_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B2)->value('status_id');

    if ($statusTS == 5 || $statusCT6_R2 == 5 || $statusCT6_R1 == 5 || $statusCT5_R2 == 5 || $statusCT5_R1 == 5 || $statusCT4_R2 == 5 || $statusCT4_R1 == 5 ||
    $statusSC7_B1 == 5 || $statusSC7_B2 == 5 || $statusENR == 5 || $statusSC4_B2 == 5 || $statusSC4_B1 == 5 || $statusUHS_B1 == 5 || $statusUHS_B2 == 5) {
      $pintura_saida_status = 5;
    } elseif ($statusTS == 4 || $statusCT6_R2 == 4 || $statusCT6_R1 == 4 || $statusCT5_R2 == 4 || $statusCT5_R1 == 4 || $statusCT4_R2 == 4 || $statusCT4_R1 == 4 ||
    $statusSC7_B1 == 4 || $statusSC7_B2 == 4 || $statusENR == 4 || $statusSC4_B2 == 4 || $statusSC4_B1 == 4 || $statusUHS_B1 == 4 || $statusUHS_B2 == 4) {
      $pintura_saida_status = 4;
    } elseif ($statusTS == 3 || $statusCT6_R2 == 3 || $statusCT6_R1 == 3 || $statusCT5_R2 == 3 || $statusCT5_R1 == 3 || $statusCT4_R2 == 3 || $statusCT4_R1 == 3 ||
    $statusSC7_B1 == 3 || $statusSC7_B2 == 3 || $statusENR == 3 || $statusSC4_B2 == 3 || $statusSC4_B1 == 3 || $statusUHS_B1 == 3 || $statusUHS_B2 == 3) {
      $pintura_saida_status = 3;
    }
    else {
      $pintura_saida_status = "";
    }

    return $pintura_saida_status;
  }

  public static function lpc_Menu() {
    $lpc_status = "";
    $pintura_entrada_status = AuxFuncRelTec::pintura_entrada_Menu();
    $pintura_processo1_status = AuxFuncRelTec::pintura_processo1_Menu();
    $pintura_processo2_status = AuxFuncRelTec::pintura_processo2_Menu();
    $pintura_estufas_status = AuxFuncRelTec::pintura_estufas_Menu();
    $pintura_areaExterna_status = AuxFuncRelTec::pintura_areaExterna_Menu();
    $pintura_saida_status = AuxFuncRelTec::pintura_saida_Menu();

    if ($pintura_entrada_status == 5 || $pintura_processo1_status == 5 || $pintura_processo2_status == 5 ||
  $pintura_estufas_status == 5 || $pintura_areaExterna_status == 5 || $pintura_saida_status == 5) {
      $lpc_status = 5;
    } elseif ($pintura_entrada_status == 4 || $pintura_processo1_status == 4 || $pintura_processo2_status == 4 ||
  $pintura_estufas_status == 4 || $pintura_areaExterna_status == 4 || $pintura_saida_status == 4) {
      $lpc_status = 4;
    } elseif ($pintura_entrada_status == 3 || $pintura_processo1_status == 3 || $pintura_processo2_status == 3 ||
  $pintura_estufas_status == 3 || $pintura_areaExterna_status == 3 || $pintura_saida_status == 3) {
      $lpc_status = 3;
    } else {
      $lpc_status = "";
    }

    return $lpc_status;
  }

  public static function lpc_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_normal = aux::GeralPorLinhaVib($atual1, 3, $lpc_linha1, $lpc_linha2);
    return $lpc_normal;
  }
  public static function lpc_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_alarme = aux::GeralPorLinhaVib($atual1, 4, $lpc_linha1, $lpc_linha2);
    return $lpc_alarme;
  }
  public static function lpc_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_critico = aux::GeralPorLinhaVib($atual1, 5, $lpc_linha1, $lpc_linha2);
    return $lpc_critico;
  }

  public static function cs_LCL_Menu() {
    $cs_LCL_status = "";
    //LCL - SISTEMA DE GIRO DA DESENROLADEIRA
    $tag_vibracaoSGD = "VB 72 600 610 015 000 - 000001";
    $idAtividadeSGD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSGD)->value('id');
    $idAnaliseSGD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSGD)->max('id');
    $statusSGD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSGD)->value('status_id');
    //LCL - ACIONAMENTO DA CADEIRA TENCIONADORA INFERIOR
    $tag_vibracaoACTI = "VB 72 600 610 097 000 - 000002";
    $idAtividadeACTI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoACTI)->value('id');
    $idAnaliseACTI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACTI)->max('id');
    $statusACTI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACTI)->value('status_id');
    //LCL - SISTEMA DE GIRO ENROLADEIRA
    $tag_vibracaoSGE = "VB 72 600 610 107 000 - 000001";
    $idAtividadeSGE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSGE)->value('id');
    $idAnaliseSGE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSGE)->max('id');
    $statusSGE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSGE)->value('status_id');
    //LCL - ACIONAMENTO SLITTER E EMBOSSER
    $tag_vibracaoASE = "VB 72 600 610 059 000 - 000001";
    $idAtividadeASE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoASE)->value('id');
    $idAnaliseASE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeASE)->max('id');
    $statusASE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseASE)->value('status_id');
    //LCL - ACIONAMENTO DA CADEIRA TENCIONADORA SUPERIOR
    $tag_vibracaoACTS = "VB 72 600 610 097 000 - 000001";
    $idAtividadeACTS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoACTS)->value('id');
    $idAnaliseACTS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACTS)->max('id');
    $statusACTS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACTS)->value('status_id');
    //LCL - UNIDADE HIDRAULICA DE SAIDA
    $tag_vibracaoUHS = "VB 72 600 610 117 000 - 000001";
    $idAtividadeUHS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHS)->value('id');
    $idAnaliseUHS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS)->max('id');
    $statusUHS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS)->value('status_id');
    //LCL - UNIDADE HIDRAULICA DA ENTRADA
    $tag_vibracaoUHE = "VB 72 600 610 027 001 - 000001";
    $idAtividadeUHE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHE)->value('id');
    $idAnaliseUHE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE)->max('id');
    $statusUHE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE)->value('status_id');

    if ($statusSGD == 5 || $statusACTI == 5 || $statusSGE == 5 || $statusASE == 5 || $statusACTS == 5 || $statusUHS == 5 || $statusUHE == 5) {
      $cs_LCL_status = 5;
    } elseif ($statusSGD == 4 || $statusACTI == 4 || $statusSGE == 4 || $statusASE == 4 || $statusACTS == 4 || $statusUHS == 4 || $statusUHE == 4) {
      $cs_LCL_status = 4;
    } elseif ($statusSGD == 3 || $statusACTI == 3 || $statusSGE == 3 || $statusASE == 3 || $statusACTS == 3 || $statusUHS == 3 || $statusUHE == 3) {
      $cs_LCL_status = 3;
    }
    else {
      $cs_LCL_status = "";
    }

    return $cs_LCL_status;
  }

  public static function cs_LCT1_Menu() {
    $cs_LCT1_status = "";
    //EQUIPAMENTO NAO CADASTRADO NO BANCO DE DADOS
    //EMBALAGEM - UNIDADE HIDRAULICA - BOMBA 01
    $tag_vibracaoUHEB1 = "VB 72 600 630 027 000 - 000001";
    $idAtividadeUHEB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHEB1)->value('id');
    $idAnaliseUHEB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHEB1)->max('id');
    $statusUHEB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHEB1)->value('status_id');
    //EMBALAGEM - UNIDADE HIDRAULICA - BOMBA 02
    $tag_vibracaoUHEB2 = "VB 72 600 630 027 000 - 000002";
    $idAtividadeUHEB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHEB2)->value('id');
    $idAnaliseUHEB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHEB2)->max('id');
    $statusUHEB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHEB2)->value('status_id');
    //LCT1 - SISTEMA DE GIRO DA DESENROLADEIRA
    $tag_vibracaoSIST_GD = "VB 72 600 620 013 000 - 000001";
    $idAtividadeSIST_GD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoSIST_GD)->value('id');
    $idAnaliseSIST_GD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSIST_GD)->max('id');
    $statusSIST_GD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSIST_GD)->value('status_id');
    //LCT1 - ACION. TRANSPORT SAIDA TESOURA MECÂNICA
    $tag_vibracaoATSTM = "VB 72 600 620 071 000 - 000001";
    $idAtividadeATSTM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoATSTM)->value('id');
    $idAnaliseATSTM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATSTM)->max('id');
    $statusATSTM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATSTM)->value('status_id');
    //LCT1 - ACIONAMENTO DA TESOURA MECÂNICA
    $tag_vibracaoATM = "VB 72 600 620 067 000 - 000001";
    $idAtividadeATM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoATM)->value('id');
    $idAnaliseATM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATM)->max('id');
    $statusATM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATM)->value('status_id');
    //LCT1 - ACIONAMENTO DA DESEMPENADEIRA
    $tag_vibracaoAD = "VB 72 600 620 043 000 - 000001";
    $idAtividadeAD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoAD)->value('id');
    $idAnaliseAD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAD)->max('id');
    $statusAD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAD)->value('status_id');
    //LCT1 - UNIDADE HIDRAULICA DA ENTRADA PRINCIPAL
    $tag_vibracaoUHEP = "VB 72 600 620 027 000 - 000001";
    $idAtividadeUHEP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHEP)->value('id');
    $idAnaliseUHEP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHEP)->max('id');
    $statusUHEP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHEP)->value('status_id');

    if ($statusUHEB1 == 5 || $statusUHEB2 == 5 || $statusSIST_GD == 5 || $statusATSTM == 5 || $statusATM == 5 || $statusAD == 5 || $statusUHEP == 5) {
      $cs_LCT1_status = 5;
    } elseif ($statusUHEB1 == 4 || $statusUHEB2 == 4 || $statusSIST_GD == 4 || $statusATSTM == 4 || $statusATM == 4 || $statusAD == 4 || $statusUHEP == 4) {
      $cs_LCT1_status = 4;
    } elseif ($statusUHEB1 == 3 || $statusUHEB2 == 3 || $statusSIST_GD == 3 || $statusATSTM == 3 || $statusATM == 3 || $statusAD == 3 || $statusUHEP == 3) {
      $cs_LCT1_status = 3;
    }
    else {
      $cs_LCT1_status = "";
    }

    return $cs_LCT1_status;
  }

  public static function cs_LCT2_Menu() {
    $cs_LCT2_status = "";
    //LCT2 - MESA TRANSPORTADORA 1 ( TELESCOPICA)
    $tag_vibracaoMT1 = "VB 72 600 621 119 000 - 000001";
    $idAtividadeMT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoMT1)->value('id');
    $idAnaliseMT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMT1)->max('id');
    $statusMT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMT1)->value('status_id');
    //LCT2 - TESOURA MECÂNICA
    $tag_vibracaoTM = "VB 72 600 621 111 000 - 000001";
    $idAtividadeTM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoTM)->value('id');
    $idAnaliseTM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTM)->max('id');
    $statusTM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTM)->value('status_id');
    //LCT2 - ROLOS CÍCLICOS
    $tag_vibracaoRC = "VB 72 600 621 105 000 - 000001";
    $idAtividadeRC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoRC)->value('id');
    $idAnaliseRC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRC)->max('id');
    $statusRC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRC)->value('status_id');
    //LCT2 - ACIONAMENTO DA DESEMPENADEIRA
    $tag_vibracaoACI_DES = "VB 72 600 621 073 000 - 000001";
    $idAtividadeACI_DES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoACI_DES)->value('id');
    $idAnaliseACI_DES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACI_DES)->max('id');
    $statusACI_DES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACI_DES)->value('status_id');
    //LCT2 - ACIONAMENTO DA TESOURA CIRCULAR MECÂNICA
    $tag_vibracaoATCM = "VB 72 600 621 047 000 - 000001";
    $idAtividadeATCM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoATCM)->value('id');
    $idAnaliseATCM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATCM)->max('id');
    $statusATCM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATCM)->value('status_id');
    //LCT2 - UNIDADE HIDRAULICA
    $tag_vibracaoUH = "VB 72 600 621 093 000 - 000001";
    $idAtividadeUH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUH)->value('id');
    $idAnaliseUH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH)->max('id');
    $statusUH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH)->value('status_id');

    if ($statusMT1 == 5 || $statusTM == 5 || $statusRC == 5 || $statusACI_DES == 5 || $statusATCM == 5 || $statusUH == 5) {
      $cs_LCT2_status = 5;
    } elseif ($statusMT1 == 4 || $statusTM == 4 || $statusRC == 4 || $statusACI_DES == 4 || $statusATCM == 4 || $statusUH == 4) {
      $cs_LCT2_status = 4;
    } elseif ($statusMT1 == 3 || $statusTM == 3 || $statusRC == 3 || $statusACI_DES == 3 || $statusATCM == 3 || $statusUH == 3) {
      $cs_LCT2_status = 3;
    }
    else {
      $cs_LCT2_status = "";
    }

    return $cs_LCT2_status;
  }

  public static function cs_LCC_Menu() {
    $cs_LCC_status = "";
    //LCC - UNIDADE HIDRAULICA PRINCIPAL - BB01
    $tag_vibracaoUHP_BB01 = "VB 72 600 640 167 000 - 000001";
    $idAtividadeUHP_BB01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_BB01)->value('id');
    $idAnaliseUHP_BB01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_BB01)->max('id');
    $statusUHP_BB01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_BB01)->value('status_id');
    //LCC - UNIDADE HIDRAULICA PRINCIPAL - BB02
    $tag_vibracaoUHP_BB02 = "VB 72 600 640 167 000 - 000002";
    $idAtividadeUHP_BB02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoUHP_BB02)->value('id');
    $idAnaliseUHP_BB02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHP_BB02)->max('id');
    $statusUHP_BB02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHP_BB02)->value('status_id');
    //LCC - ACIONAMENTO DO ROLO ALIMENTADOR SLITTER
    $tag_vibracaoARAS = "VB 72 600 640 063 000 - 000001";
    $idAtividadeARAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoARAS)->value('id');
    $idAnaliseARAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARAS)->max('id');
    $statusARAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARAS)->value('status_id');
    //LCC - ACIONAMENTO ROLO ALIMENTADOR
    $tag_vibracaoARA = "VB 72 600 640 113 000 - 000001";
    $idAtividadeARA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoARA)->value('id');
    $idAnaliseARA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARA)->max('id');
    $statusARA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARA)->value('status_id');
    //LCC - ACIONAMENTO DESEMPENADEIRA
    $tag_vibracaoADES = "VB 72 600 640 049 000 - 000001";
    $idAtividadeADES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoADES)->value('id');
    $idAnaliseADES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeADES)->max('id');
    $statusADES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseADES)->value('status_id');
    //LCC - ACIONAMENTO TESOURA MECANICA
    $tag_vibracaoATMEC = "VB 72 600 640 121 000 - 000001";
    $idAtividadeATMEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoATMEC)->value('id');
    $idAnaliseATMEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATMEC)->max('id');
    $statusATMEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATMEC)->value('status_id');

    if ($statusUHP_BB01 == 5 || $statusUHP_BB02 == 5 || $statusARAS == 5 || $statusARA == 5 || $statusADES == 5 || $statusATMEC == 5) {
      $cs_LCC_status = 5;
    } elseif ($statusUHP_BB01 == 4 || $statusUHP_BB02 == 4 || $statusARAS == 4 || $statusARA == 4 || $statusADES == 4 || $statusATMEC == 4) {
      $cs_LCC_status = 4;
    } elseif ($statusUHP_BB01 == 3 || $statusUHP_BB02 == 3 || $statusARAS == 3 || $statusARA == 3 || $statusADES == 3 || $statusATMEC == 3) {
      $cs_LCC_status = 3;
    }
    else {
      $cs_LCC_status = "";
    }

    return $cs_LCC_status;
  }

  public static function cs_Menu() {
    $cs_status = "";
    $cs_LCL_status = AuxFuncRelTec::cs_LCL_Menu();
    $cs_LCT1_status = AuxFuncRelTec::cs_LCT1_Menu();
    $cs_LCT2_status = AuxFuncRelTec::cs_LCT2_Menu();
    $cs_LCC_status = AuxFuncRelTec::cs_LCC_Menu();

    if ($cs_LCL_status == 5 || $cs_LCT1_status == 5 || $cs_LCT2_status == 5 || $cs_LCC_status == 5) {
      $cs_status = 5;
    } elseif ($cs_LCL_status == 4 || $cs_LCT1_status == 4 || $cs_LCT2_status == 4 || $cs_LCC_status == 4) {
      $cs_status = 4;
    } elseif ($cs_LCL_status == 3 || $cs_LCT1_status == 3 || $cs_LCT2_status == 3 || $cs_LCC_status == 3) {
      $cs_status = 3;
    } else {
      $cs_status = "";
    }

    return $cs_status;
  }

  public static function cs_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_normal = aux::GeralPorLinha2Vib($atual1, 3, $cs_parent);
    return $cs_normal;
  }
  public static function cs_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_alarme = aux::GeralPorLinha2Vib($atual1, 4, $cs_parent);
    return $cs_alarme;
  }
  public static function cs_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_critico = aux::GeralPorLinha2Vib($atual1, 5, $cs_parent);
    return $cs_critico;
  }

  //--- PONTES ROLANTES
  public static function pr_pontes_pr12_Menu() {
    $pr_pontes_pr12_status = "";
    //PONTE ROLANTE 12
    $tag_vibracaoPR_12 = "VB 72 200 012 015 000 - 000001";
    $idAtividadePR_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoPR_12)->value('id');
    $idAnalisePR_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_12)->max('id');
    $statusPR_12 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_12)->value('status_id');

    if ($statusPR_12 == 5) {
      $pr_pontes_pr12_status = 5;
    } elseif ($statusPR_12 == 4) {
      $pr_pontes_pr12_status = 4;
    } elseif ($statusPR_12 == 3) {
      $pr_pontes_pr12_status = 3;
    }
    else {
      $pr_pontes_pr12_status = "";
    }

    return $pr_pontes_pr12_status;
  }

  public static function pr_pontes_pr23_Menu() {
    $pr_pontes_pr23_status = "";
    //PONTE ROLANTE 23
    $tag_vibracaoPR_23 = "VB 72 800 013 013 000 - 000001";
    $idAtividadePR_23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_vibracaoPR_23)->value('id');
    $idAnalisePR_23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_23)->max('id');
    $statusPR_23 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_23)->value('status_id');

    if ($statusPR_23 == 5) {
      $pr_pontes_pr23_status = 5;
    } elseif ($statusPR_23 == 4) {
      $pr_pontes_pr23_status = 4;
    } elseif ($statusPR_23 == 3) {
      $pr_pontes_pr23_status = 3;
    }
    else {
      $pr_pontes_pr23_status = "";
    }

    return $pr_pontes_pr23_status;
  }

  public static function pr_Menu() {
    $pr_status = "";
    $pr_pontes_pr12_status = AuxFuncRelTec::pr_pontes_pr12_Menu();
    $pr_pontes_pr23_status = AuxFuncRelTec::pr_pontes_pr23_Menu();

    if ($pr_pontes_pr12_status == 5 || $pr_pontes_pr23_status == 5) {
      $pr_status = 5;
    } elseif ($pr_pontes_pr12_status == 4 || $pr_pontes_pr23_status == 4) {
      $pr_status = 4;
    } elseif ($pr_pontes_pr12_status == 3 || $pr_pontes_pr23_status == 3) {
      $pr_status = 3;
    } else {
      $pr_status = "";
    }

    return $pr_status;
  }

  public static function pr_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_normal = aux::GeralPorLinha2Vib($atual1, 3, $pr_parent);
    return $pr_normal;
  }
  public static function pr_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_alarme = aux::GeralPorLinha2Vib($atual1, 4, $pr_parent);
    return $pr_alarme;
  }
  public static function pr_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_critico = aux::GeralPorLinha2Vib($atual1, 5, $pr_parent);
    return $pr_critico;
  }

}

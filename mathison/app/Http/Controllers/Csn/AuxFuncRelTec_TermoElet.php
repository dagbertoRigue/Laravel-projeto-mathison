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
use App\Http\Controllers\Csn\AuxFuncRelTec_TermoElet as AuxFuncRelTec;
use App\Http\Controllers\Csn\AuxFunc as aux;

class AuxFuncRelTec_TermoElet {

  public static function ura_painel_1_Menu() {
    $ura_painel_1_status = "";
    //Equipamentos do primeiro painel de equipamentos da sala eletrica
    $tag_painel_alimentacao = "TE 72 200 240 090 000 - 000001";
    $idAtividadePA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_painel_alimentacao)->value('id');
    $idAnalisePA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePA)->max('id');
    $statusPA = DB::table('preditiva_analises')->where('id', '=', $idAnalisePA)->value('status_id');

    $tag_soprador = "TE 72 200 240 090 000 - 000022";
    $idAtividadeSO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_soprador)->value('id');
    $idAnaliseSO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSO)->max('id');
    $statusSO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSO)->value('status_id');

    $tag_moedor = "TE 72 200 240 090 000 - 000024";
    $idAtividadeMO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_moedor)->value('id');
    $idAnaliseMO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMO)->max('id');
    $statusMO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMO)->value('status_id');

    $tag_flap = "TE 72 200 240 090 000 - 000029";
    $idAtividadeFL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_flap)->value('id');
    $idAnaliseFL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFL)->max('id');
    $statusFL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFL)->value('status_id');

    $tag_valvula_ciclone = "TE 72 200 240 090 000 - 000028";
    $idAtividadeVC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_valvula_ciclone)->value('id');
    $idAnaliseVC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVC)->max('id');
    $statusVC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVC)->value('status_id');

    $tag_valvula_reator = "TE 72 200 240 090 000 - 000023";
    $idAtividadeVR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_valvula_reator)->value('id');
    $idAnaliseVR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVR)->max('id');
    $statusVR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVR)->value('status_id');

    $tag_bomba_ventur = "TE 72 200 240 090 000 - 000014";
    $idAtividadeBV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_ventur)->value('id');
    $idAnaliseBV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBV)->max('id');
    $statusBV = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBV)->value('status_id');

    $tag_bomba_reator = "TE 72 200 240 090 000 - 000025";
    $idAtividadeBR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_reator)->value('id');
    $idAnaliseBR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR)->max('id');
    $statusBR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR)->value('status_id');

    //Equipamentos do segundo painel de equipamentos da sala eletrica
    $tag_bomba_reator2 = "TE 72 200 240 090 000 - 000026";
    $idAtividadeBR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_reator2)->value('id');
    $idAnaliseBR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR2)->max('id');
    $statusBR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR2)->value('status_id');

    $tag_bomba_ventur2 = "TE 72 200 240 090 000 - 000015";
    $idAtividadeBV2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_ventur2)->value('id');
    $idAnaliseBV2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBV2)->max('id');
    $statusBV2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBV2)->value('status_id');

    $tag_bomba_absorvedor1 = "TE 72 200 240 090 000 - 000016";
    $idAtividadeBA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_absorvedor1)->value('id');
    $idAnaliseBA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBA1)->max('id');
    $statusBA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBA1)->value('status_id');

    $tag_bomba_absorvedor2 = "TE 72 200 240 090 000 - 000017";
    $idAtividadeBA2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_absorvedor2)->value('id');
    $idAnaliseBA2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBA2)->max('id');
    $statusBA2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBA2)->value('status_id');

    $tag_conjunto_bomba_412 = "TE 72 200 240 090 000 - 000018";
    $idAtividadeCB412 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_conjunto_bomba_412)->value('id');
    $idAnaliseCB412 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB412)->max('id');
    $statusCB412 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB412)->value('status_id');

    $tag_conjunto_bomba_404P1 = "TE 72 200 240 090 000 - 000019";
    $idAtividadeCBP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_conjunto_bomba_404P1)->value('id');
    $idAnaliseCBP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBP1)->max('id');
    $statusCBP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBP1)->value('status_id');

    $tag_conjunto_bomba_404P2 = "TE 72 200 240 090 000 - 000020";
    $idAtividadeCBP2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_conjunto_bomba_404P2)->value('id');
    $idAnaliseCBP2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBP2)->max('id');
    $statusCBP2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBP2)->value('status_id');

    if ($statusPA == 5 || $statusSO == 5 || $statusMO == 5 || $statusFL == 5 || $statusVC == 5 || $statusVR == 5 || $statusBV == 5 || $statusBR == 5 || $statusBR2 == 5 || $statusBV2 == 5 ||
        $statusBA1 == 5 || $statusBA2 == 5 || $statusCB412 == 5 || $statusCBP1 == 5 || $statusCBP2 == 5) {
      $ura_painel_1_status = 5;
    } elseif ($statusPA == 4 || $statusSO == 4 || $statusMO == 4 || $statusFL == 4 || $statusVC == 4 || $statusVR == 4 || $statusBV == 4 || $statusBR == 4 || $statusBR2 == 4 || $statusBV2 == 4 ||
        $statusBA1 == 4 || $statusBA2 == 4 || $statusCB412 == 4 || $statusCBP1 == 4 || $statusCBP2 == 4) {
      $ura_painel_1_status = 4;
    } elseif ($statusPA == 3 || $statusSO == 3 || $statusMO == 3 || $statusFL == 3 || $statusVC == 3 || $statusVR == 3 || $statusBV == 3 || $statusBR == 3 || $statusBR2 == 3 || $statusBV2 == 3 ||
        $statusBA1 == 3 || $statusBA2 == 3 || $statusCB312 == 3 || $statusCBP1 == 3 || $statusCBP2 == 3) {
      $ura_painel_1_status = 3;
    }
    else {
      $ura_painel_1_status = "";
    }

    return $ura_painel_1_status;
  }

  public static function ura_painel_2_Menu() {
    $ura_painel_2_status = "";
    //Armario 1
    $tag_exaustor_oxido = "TE 72 200 240 090 000 - 000021";
    $idAtividadeEO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_exaustor_oxido)->value('id');
    $idAnaliseEO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO)->max('id');
    $statusEO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO)->value('status_id');

    $tag_conjunto_embaladora = "TE 72 200 240 090 000 - 000031";
    $idAtividadeCE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_conjunto_embaladora)->value('id');
    $idAnaliseCE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCE)->max('id');
    $statusCE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCE)->value('status_id');

    $tag_balanca_embaladora = "TE 72 200 240 090 000 - 000032";
    $idAtividadeBE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_balanca_embaladora)->value('id');
    $idAnaliseBE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE)->max('id');
    $statusBE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE)->value('status_id');

    $tag_bomba_acido_novo1 = "TE 72 200 240 090 000 - 000006";
    $idAtividadeBAN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_novo1)->value('id');
    $idAnaliseBAN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAN1)->max('id');
    $statusBAN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAN1)->value('status_id');

    $tag_bomba_acido_novo2 = "TE 72 200 240 090 000 - 000007";
    $idAtividadeBAN2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_novo2)->value('id');
    $idAnaliseBAN2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAN2)->max('id');
    $statusBAN2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAN2)->value('status_id');

    $tag_bomba_acido_regenerado1 = "TE 72 200 240 090 000 - 000002";
    $idAtividadeBAR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_regenerado1)->value('id');
    $idAnaliseBAR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAR1)->max('id');
    $statusBAR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAR1)->value('status_id');

    $tag_valvula_rotativa_silo_oxido = "TE 72 200 240 090 000 - 000030";
    $idAtividadeVRSO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_valvula_rotativa_silo_oxido)->value('id');
    $idAnaliseVRSO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVRSO)->max('id');
    $statusVRSO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVRSO)->value('status_id');
    //Armario 2
    $tag_bomba_acido_regenerado2 = "TE 72 200 240 090 000 - 000003";
    $idAtividadeBAR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_regenerado2)->value('id');
    $idAnaliseBAR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAR2)->max('id');
    $statusBAR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAR2)->value('status_id');

    $tag_bomba_acido_usado1 = "TE 72 200 240 090 000 - 000004";
    $idAtividadeBAU1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_usado1)->value('id');
    $idAnaliseBAU1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAU1)->max('id');
    $statusBAU1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAU1)->value('status_id');

    $tag_bomba_acido_usado2 = "TE 72 200 240 090 000 - 000005";
    $idAtividadeBAU2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_usado2)->value('id');
    $idAnaliseBAU2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAU2)->max('id');
    $statusBAU2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAU2)->value('status_id');

    $tag_bomba_agua_lavagem1 = "TE 72 200 240 090 000 - 000010";
    $idAtividadeBAL1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_agua_lavagem1)->value('id');
    $idAnaliseBAL1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAL1)->max('id');
    $statusBAL1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAL1)->value('status_id');

    $tag_bomba_agua_lavagem2 = "TE 72 200 240 090 000 - 000011";
    $idAtividadeBAL2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_agua_lavagem2)->value('id');
    $idAnaliseBAL2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAL2)->max('id');
    $statusBAL2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAL2)->value('status_id');

    $tag_tanque_acido_novo1 = "TE 72 200 240 090 000 - 000008";
    $idAtividadeTAN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_tanque_acido_novo1)->value('id');
    $idAnaliseTAN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTAN1)->max('id');
    $statusTAN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTAN1)->value('status_id');

    $tag_tanque_exaustor_principal = "TE 72 200 240 090 000 - 000027";
    $idAtividadeEP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_tanque_exaustor_principal)->value('id');
    $idAnaliseEP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP)->max('id');
    $statusEP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP)->value('status_id');

    $tag_tanque_bomba_dosador_soda_caustica1 = "TE 72 200 240 090 000 - 000012";
    $idAtividadeBDSC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_tanque_bomba_dosador_soda_caustica1)->value('id');
    $idAnaliseBDSC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDSC1)->max('id');
    $statusBDSC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDSC1)->value('status_id');

    $tag_tanque_bomba_dosador_soda_caustica2 = "TE 72 200 240 090 000 - 000013";
    $idAtividadeBDSC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_tanque_bomba_dosador_soda_caustica2)->value('id');
    $idAnaliseBDSC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDSC2)->max('id');
    $statusBDSC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDSC2)->value('status_id');

    $tag_bomba_acido_novo = "TE 72 200 240 090 000 - 000009";
    $idAtividadeBAN = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_novo)->value('id');
    $idAnaliseBAN = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAN)->max('id');
    $statusBAN = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAN)->value('status_id');

    if ($statusEO == 5 || $statusCE == 5 || $statusBE == 5 || $statusBAN1 == 5 || $statusBAN2 == 5 || $statusBAR1 == 5 || $statusVRSO == 5 ||
        $statusBAR2 == 5 || $statusBAU1 == 5 || $statusBAU2 == 5 || $statusBAL1 == 5 || $statusBAL2 == 5 || $statusTAN1 == 5 || $statusEP == 5 ||
        $statusBDSC1 == 5 || $statusBDSC2 == 5 || $statusBAN == 5) {
      $ura_painel_2_status = 5;
    } elseif ($statusEO == 4 || $statusCE == 4 || $statusBE == 4 || $statusBAN1 == 4 || $statusBAN2 == 4 || $statusBAR1 == 4 || $statusVRSO == 4 ||
              $statusBAR2 == 4 || $statusBAU1 == 4 || $statusBAU2 == 4 || $statusBAL1 == 4 || $statusBAL2 == 4 || $statusTAN1 == 4 || $statusEP == 4 ||
              $statusBDSC1 == 4 || $statusBDSC2 == 4 || $statusBAN == 4) {
      $ura_painel_2_status = 4;
    } elseif ($statusEO == 3 || $statusCE == 3 || $statusBE == 3 || $statusBAN1 == 3 || $statusBAN2 == 3 || $statusBAR1 == 3 || $statusVRSO == 3 ||
              $statusBAR2 == 3 || $statusBAU1 == 3 || $statusBAU2 == 3 || $statusBAL1 == 3 || $statusBAL2 == 3 || $statusTAN1 == 3 || $statusEP == 3 ||
              $statusBDSC1 == 3 || $statusBDSC2 == 3 || $statusBAN == 3) {
      $ura_painel_2_status = 3;
    }else {
      $ura_painel_2_status = "";
    }

    return $ura_painel_2_status;
  }

  public static function ura_Menu() {
    $ura_menu = "";
    $ura_painel_1 = AuxFuncRelTec::ura_painel_1_Menu();
    $ura_painel_2 = AuxFuncRelTec::ura_painel_2_Menu();

    if ($ura_painel_1 == 5 || $ura_painel_2 == 5) {
      $ura_menu = 5;
    } elseif ($ura_painel_1 == 4 || $ura_painel_2 == 4) {
      $ura_menu = 4;
    } elseif ($ura_painel_1 == 3 || $ura_painel_2 == 3) {
      $ura_menu = 3;
    } else {
      $ura_menu = "";
    }

    return $ura_menu;
  }

  public static function ura_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_normal = aux::GeralPorLinhaTE($atual1, 3, $ura_linha1, $ura_linha2);
    return $ura_normal;
  }
  public static function ura_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_alarme = aux::GeralPorLinhaTE($atual1, 4, $ura_linha1, $ura_linha2);
    return $ura_alarme;
  }
  public static function ura_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_critico = aux::GeralPorLinhaTE($atual1, 5, $ura_linha1, $ura_linha2);
    return $ura_critico;
  }

  //--- DECAPAGEM
  public static function ura_painel_caldeiras_Menu() {
    $ura_painel_caldeiras_status = "";
    $tag_caldeira1 = "TE 72 050 150 007 003 - 000001";
    $idAtividadeCA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_caldeira1)->value('id');
    $idAnaliseCA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA1)->max('id');
    $statusCA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA1)->value('status_id');

    $tag_caldeira2 = "TE 72 050 250 007 003 - 000001";
    $idAtividadeCA2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_caldeira2)->value('id');
    $idAnaliseCA2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA2)->max('id');
    $statusCA2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA2)->value('status_id');

    if ($statusCA1 == 5 || $statusCA2 == 5) {
      $ura_painel_caldeiras_status = 5;
    } elseif ($statusCA1 == 4 || $statusCA2 == 4) {
      $ura_painel_caldeiras_status = 4;
    } elseif ($statusCA1 == 3 || $statusCA2 == 3) {
      $ura_painel_caldeiras_status = 3;
    }
    else {
      $ura_painel_caldeiras_status = "";
    }

    return $ura_painel_caldeiras_status;
  }

  public static function decapagem_ets_Menu() {
    $decapagem_ets_status = "";
    //SECAO ENTRADA
    $tag_ets11 = "TE 72 200 210 368 000 - 000001";
    $idAtividadeETS11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets11)->value('id');
    $idAnaliseETS11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS11)->max('id');
    $statusETS11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS11)->value('status_id');

    $tag_ets12 = "TE 72 200 210 368 000 - 000002";
    $idAtividadeETS12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets12)->value('id');
    $idAnaliseETS12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS12)->max('id');
    $statusETS12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS12)->value('status_id');

    $tag_ets13 = "TE 72 200 210 368 000 - 000003";
    $idAtividadeETS13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets13)->value('id');
    $idAnaliseETS13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS13)->max('id');
    $statusETS13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS13)->value('status_id');

    $tag_ets14 = "TE 72 200 210 368 000 - 000004";
    $idAtividadeETS14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets14)->value('id');
    $idAnaliseETS14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS14)->max('id');
    $statusETS14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS14)->value('status_id');
    //SECAO PROCESSO
    $tag_ets20 = "TE 72 200 210 370 000 - 000001";
    $idAtividadeETS20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets20)->value('id');
    $idAnaliseETS20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS20)->max('id');
    $statusETS20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS20)->value('status_id');

    $tag_ets21 = "TE 72 200 210 370 000 - 000002";
    $idAtividadeETS21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets21)->value('id');
    $idAnaliseETS21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS21)->max('id');
    $statusETS21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS21)->value('status_id');

    $tag_ets22 = "TE 72 200 210 370 000 - 000003";
    $idAtividadeETS22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets22)->value('id');
    $idAnaliseETS22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS22)->max('id');
    $statusETS22 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS22)->value('status_id');

    $tag_ets23 = "TE 72 200 210 370 000 - 000004";
    $idAtividadeETS23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets23)->value('id');
    $idAnaliseETS23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS23)->max('id');
    $statusETS23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS23)->value('status_id');

    $tag_ets24 = "TE 72 200 210 370 000 - 000005";
    $idAtividadeETS24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets24)->value('id');
    $idAnaliseETS24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS24)->max('id');
    $statusETS24 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS24)->value('status_id');
    //SECAO SAIDA
    $tag_ets30 = "TE 72 200 210 371 000 - 000001";
    $idAtividadeETS30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets30)->value('id');
    $idAnaliseETS30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS30)->max('id');
    $statusETS30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS30)->value('status_id');

    $tag_ets31 = "TE 72 200 210 371 000 - 000002";
    $idAtividadeETS31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets31)->value('id');
    $idAnaliseETS31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS31)->max('id');
    $statusETS31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS31)->value('status_id');

    $tag_ets32 = "TE 72 200 210 371 000 - 000003";
    $idAtividadeETS32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets32)->value('id');
    $idAnaliseETS32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS32)->max('id');
    $statusETS32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS32)->value('status_id');

    $tag_ets33 = "TE 72 200 210 371 000 - 000004";
    $idAtividadeETS33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets33)->value('id');
    $idAnaliseETS33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS33)->max('id');
    $statusETS33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS33)->value('status_id');

    $tag_ets34 = "TE 72 200 210 371 000 - 000005";
    $idAtividadeETS34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets34)->value('id');
    $idAnaliseETS34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS34)->max('id');
    $statusETS34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS34)->value('status_id');

    if ($statusETS11 == 5 || $statusETS12 == 5 || $statusETS13 == 5 || $statusETS14 == 5 || $statusETS20 == 5 ||
    $statusETS21 == 5 || $statusETS22 == 5 || $statusETS23 == 5 || $statusETS24 == 5 || $statusETS30 == 5 ||
    $statusETS31 == 5 || $statusETS32 == 5 || $statusETS33 == 5 || $statusETS34 == 5) {
      $decapagem_ets_status = 5;
    } elseif ($statusETS11 == 4 || $statusETS12 == 4 || $statusETS13 == 4 || $statusETS14 == 4 || $statusETS20 == 4 ||
    $statusETS21 == 4 || $statusETS22 == 4 || $statusETS23 == 4 || $statusETS24 == 4 || $statusETS30 == 4 ||
    $statusETS31 == 4 || $statusETS32 == 4 || $statusETS33 == 4 || $statusETS34 == 4) {
      $decapagem_ets_status = 4;
    } elseif ($statusETS11 == 3 || $statusETS12 == 3 || $statusETS13 == 3 || $statusETS13 == 3 || $statusETS20 == 3 ||
    $statusETS21 == 3 || $statusETS22 == 3 || $statusETS23 == 3 || $statusETS23 == 3 || $statusETS30 == 3 ||
    $statusETS31 == 3 || $statusETS32 == 3 || $statusETS33 == 3 || $statusETS33 == 3) {
      $decapagem_ets_status = 3;
    }
    else {
      $decapagem_ets_status = "";
    }

    return $decapagem_ets_status;
  }

  public static function decapagem_ccm1_Menu() {
    $decapagem_ccm1_status = "";
    //SISTEMA HIDRAULICO DE ENTRADA
    $tag_CCM1_recirculacao = "TE 72 200 210 327 000 - 000001";
    $idAtividadeCCM1_recirculacao = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_recirculacao)->value('id');
    $idAnaliseCCM1_recirculacao = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_recirculacao)->max('id');
    $statusCCM1_recirculacao = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_recirculacao)->value('status_id');

    $tag_CCM1_bomba1 = "TE 72 200 210 327 000 - 000002";
    $idAtividadeCCM1_bomba1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_bomba1)->value('id');
    $idAnaliseCCM1_bomba1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_bomba1)->max('id');
    $statusCCM1_bomba1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_bomba1)->value('status_id');

    $tag_CCM1_bomba2 = "TE 72 200 210 327 000 - 000003";
    $idAtividadeCCM1_bomba2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_bomba2)->value('id');
    $idAnaliseCCM1_bomba2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_bomba2)->max('id');
    $statusCCM1_bomba2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_bomba2)->value('status_id');

    $tag_CCM1_bomba3 = "TE 72 200 210 327 000 - 000004";
    $idAtividadeCCM1_bomba3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_bomba3)->value('id');
    $idAnaliseCCM1_bomba3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_bomba3)->max('id');
    $statusCCM1_bomba3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_bomba3)->value('status_id');

    $tag_CCM1_bomba4 = "TE 72 200 210 327 000 - 000005";
    $idAtividadeCCM1_bomba4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_bomba4)->value('id');
    $idAnaliseCCM1_bomba4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_bomba4)->max('id');
    $statusCCM1_bomba4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_bomba4)->value('status_id');
    //CARRO BOBINA
    $tag_CB = "TE 72 200 210 327 000 - 000006";
    $idAtividadeCB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CB)->value('id');
    $idAnaliseCB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB)->max('id');
    $statusCB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB)->value('status_id');
    //FIFE ENTRADA BOMBA UNIDADE HIDRAULICA DESENROLADEIRA
    $tag_FEB = "TE 72 200 210 327 000 - 000007";
    $idAtividadeFEB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FEB)->value('id');
    $idAnaliseFEB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFEB)->max('id');
    $statusFEB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFEB)->value('status_id');
    //BOMBA HIDRAULICA RECIRCULACAO FIFE
    $tag_BHRF = "TE 72 200 210 327 000 - 000008";
    $idAtividadeBHRF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BHRF)->value('id');
    $idAnaliseBHRF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBHRF)->max('id');
    $statusBHRF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBHRF)->value('status_id');
    //05B5CD03H
    $tag_05B5CD03H = "TE 72 200 210 327 000 - 000057";
    $idAtividade05B5CD03H = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_05B5CD03H)->value('id');
    $idAnalise05B5CD03H = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade05B5CD03H)->max('id');
    $status05B5CD03H = DB::table('preditiva_analises')->where('id', '=', $idAnalise05B5CD03H)->value('status_id');
    //BOMBA DE LUBRIFICACAO REDUTORA DA DESENROLADEIRA
    $tag_BLRD = "TE 72 200 210 327 000 - 000009";
    $idAtividadeBLRD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLRD)->value('id');
    $idAnaliseBLRD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLRD)->max('id');
    $statusBLRD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLRD)->value('status_id');
    //BOMBA DE LUBRIFICACAO ESTEIRA DE APARA
    $tag_BLEA = "TE 72 200 210 327 000 - 000010";
    $idAtividadeBLEA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLEA)->value('id');
    $idAnaliseBLEA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLEA)->max('id');
    $statusBLEA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLEA)->value('status_id');
    //BOMBA DE REFRIGERACAO DO CARRO DE ENTRADA
    $tag_BRCE = "TE 72 200 210 327 000 - 000026";
    $idAtividadeBRCE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRCE)->value('id');
    $idAnaliseBRCE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRCE)->max('id');
    $statusBRCE= DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRCE)->value('status_id');
    //BOMBA POCO QUIMICO ENTRADA
    $tag_BPQE = "TE 72 200 210 327 000 - 000022";
    $idAtividadeBPQE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BPQE)->value('id');
    $idAnaliseBPQE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBPQE)->max('id');
    $statusBPQE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBPQE)->value('status_id');
    //BOMBA LAVADOR DE GASES
    $tag_BLG = "TE 72 200 210 327 000 - 000023";
    $idAtividadeBLG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLG)->value('id');
    $idAnaliseBLG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLG)->max('id');
    $statusBLG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLG)->value('status_id');
    //BOMBA LAVADOR DE GASES STD-BY
    $tag_BLGS = "TE 72 200 210 327 000 - 000024";
    $idAtividadeBLGS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLGS)->value('id');
    $idAnaliseBLGS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLGS)->max('id');
    $statusBLGS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLGS)->value('status_id');
    //BOMBA POCO QUIMICO DE SAIDA
    $tag_BPQS = "TE 72 200 210 327 000 - 000025";
    $idAtividadeBPQS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BPQS)->value('id');
    $idAnaliseBPQS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBPQS)->max('id');
    $statusBPQS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBPQS)->value('status_id');
    //BOMBA DE TRANSFERENCIA DE ACIDO REGENERACAO
    $tag_BTAR = "TE 72 200 210 327 000 - 000017";
    $idAtividadeBTAR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTAR)->value('id');
    $idAnaliseBTAR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTAR)->max('id');
    $idLaudoBTAR = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTAR)->value('id');
    $statusBTAR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTAR)->value('status_id');
    //BOMBA DE TRANSFERENCIA DE ACIDO REGENERACAO STD-BY
    $tag_BTARS = "TE 72 200 210 327 000 - 000018";
    $idAtividadeBTARS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTARS)->value('id');
    $idAnaliseBTARS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTARS)->max('id');
    $statusBTARS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTARS)->value('status_id');
    //RECIRCULACAO DE ACIDO - BOMBA #5
    $tag_RAB5 = "TE 72 200 210 327 000 - 000027";
    $idAtividadeRAB5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB5)->value('id');
    $idAnaliseRAB5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB5)->max('id');
    $statusRAB5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB5)->value('status_id');
    //RECIRCULACAO DE ACIDO - BOMBA #6
    $tag_RAB6 = "TE 72 200 210 327 000 - 000019";
    $idAtividadeRAB6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB6)->value('id');
    $idAnaliseRAB6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB6)->max('id');
    $statusRAB6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB6)->value('status_id');
    //RECIRCULACAO DE ACIDO - BAMBA #6 - STAND BY
    $tag_RAB6S = "TE 72 200 210 327 000 - 000020";
    $idAtividadeRAB6S = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB6S)->value('id');
    $idAnaliseRAB6S = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB6S)->max('id');
    $statusRAB6S = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB6S)->value('status_id');
    //SCRUBBER FAN #1-1
    $tag_SF1 = "TE 72 200 210 327 000 - 000021";
    $idAtividadeSF1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SF1)->value('id');
    $idAnaliseSF1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSF1)->max('id');
    $statusSF1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSF1)->value('status_id');
    //BOMBA TRANSFERENCIA DE ACIDO SUJO
    $tag_BTAS = "TE 72 200 210 327 000 - 000011";
    $idAtividadeBTAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTAS)->value('id');
    $idAnaliseBTAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTAS)->max('id');
    $statusBTAS= DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTAS)->value('status_id');
    //BOMBA TRANSFERENCIA DE ACIDO SUJO STD-BY
    $tag_BTASS = "TE 72 200 210 327 000 - 000012";
    $idAtividadeBTASS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTASS)->value('id');
    $idAnaliseBTASS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTASS)->max('id');
    $statusBTASS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTASS)->value('status_id');
    //RECIRCULACAO DE ACIDO - BOMBA #1
    $tag_RAB1 = "TE 72 200 210 327 000 - 000013";
    $idAtividadeRAB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB1)->value('id');
    $idAnaliseRAB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB1)->max('id');
    $statusRAB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB1)->value('status_id');
    //RECIRCULACAO DE ACIDO - BOMBA #2
    $tag_RAB2 = "TE 72 200 210 327 000 - 000014";
    $idAtividadeRAB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB2)->value('id');
    $idAnaliseRAB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB2)->max('id');
    $statusRAB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB2)->value('status_id');
    //RECIRCULACAO DE ACIDO - BOMBA #3
    $tag_RAB3 = "TE 72 200 210 327 000 - 000015";
    $idAtividadeRAB3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB3)->value('id');
    $idAnaliseRAB3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB3)->max('id');
    $statusRAB3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB3)->value('status_id');
    //RECIRCULACAO DE ACIDO - BOMBA #4
    $tag_RAB4 = "TE 72 200 210 327 000 - 000016";
    $idAtividadeRAB4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB4)->value('id');
    $idAnaliseRAB4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB4)->max('id');
    $statusRAB4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB4)->value('status_id');

    if ($statusCCM1_recirculacao == 5 || $statusCCM1_bomba1 == 5 || $statusCCM1_bomba2 == 5 || $statusCCM1_bomba3 == 5 || $statusCCM1_bomba4 == 5 || $statusCB == 5 || $statusFEB == 5  ||
        $statusBHRF  == 5  || $status05B5CD03H == 5  || $statusBLRD == 5  || $statusBLEA == 5  || $statusBRCE == 5  || $statusBPQE == 5  || $statusBLG == 5 || $statusBLGS == 5 ||
        $statusBPQS == 5 || $statusBTAR == 5 || $statusBTARS == 5 || $statusRAB5 == 5 || $statusRAB6 == 5 || $statusRAB6S == 5 || $statusSF1 == 5 || $statusBTAS == 5 || $statusBTASS == 5 ||
        $statusRAB1 == 5 || $statusRAB2 == 5 || $statusRAB3 == 5 || $statusRAB4 == 5) {
      $decapagem_ccm1_status = 5;
    } elseif ($statusCCM1_recirculacao == 4 || $statusCCM1_bomba1 == 4 || $statusCCM1_bomba2 == 4 || $statusCCM1_bomba3 == 4 || $statusCCM1_bomba4 == 4 || $statusCB == 4 || $statusFEB == 4  ||
        $statusBHRF  == 4  || $status05B5CD03H == 4  || $statusBLRD == 4  || $statusBLEA == 4  || $statusBRCE == 4  || $statusBPQE == 4  || $statusBLG == 4 || $statusBLGS == 4 ||
        $statusBPQS == 4 || $statusBTAR == 4 || $statusBTARS == 4 || $statusRAB4 == 4 || $statusRAB6 == 4 || $statusRAB6S == 4 || $statusSF1 == 4 || $statusBTAS == 4 || $statusBTASS == 4 ||
        $statusRAB1 == 4 || $statusRAB2 == 4 || $statusRAB3 == 4 || $statusRAB4 == 4) {
      $decapagem_ccm1_status = 4;
    } elseif ($statusCCM1_recirculacao == 3 || $statusCCM1_bomba1 == 3 || $statusCCM1_bomba2 == 3 || $statusCCM1_bomba3 == 3 || $statusCCM1_bomba4 == 3 || $statusCB == 3 || $statusFEB == 3  ||
        $statusBHRF  == 3  || $status05B5CD03H == 3  || $statusBLRD == 3  || $statusBLEA == 3  || $statusBRCE == 3  || $statusBPQE == 3  || $statusBLG == 3 || $statusBLGS == 3 ||
        $statusBPQS == 3 || $statusBTAR == 3 || $statusBTARS == 3 || $statusRAB3 == 3 || $statusRAB6 == 3 || $statusRAB6S == 3 || $statusSF1 == 3 || $statusBTAS == 3 || $statusBTASS == 3 ||
        $statusRAB1 == 3 || $statusRAB2 == 3 || $statusRAB3 == 3 || $statusRAB4 == 3) {
      $decapagem_ccm1_status = 3;
    }
    else {
      $decapagem_ccm1_status = "";
    }

    return $decapagem_ccm1_status;
  }

  public static function decapagem_ccm2_Menu() {
    $decapagem_ccm2_status = "";
    //CD06 - AUXILIARY FEEDER #1
    $tag_AF1 = "TE 72 200 210 330 000 - 000029";
    $idAtividadeAF1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AF1)->value('id');
    $idAnaliseAF1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAF1)->max('id');
    $statusAF1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAF1)->value('status_id');
    //AUXILIARY FEEDER #2
    $tag_AF2 = "TE 72 200 210 330 000 - 000030";
    $idAtividadeAF2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AF2)->value('id');
    $idAnaliseAF2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAF2)->max('id');
    $statusAF2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAF2)->value('status_id');
    //SISTEMA DE REFRIGERAÇÃO DE SAÍDA BORDA GUIA HIDRÁULICO
    $tag_SRSBGH = "TE 72 200 210 330 000 - 000001";
    $idAtividadeSRSBGH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SRSBGH)->value('id');
    $idAnaliseSRSBGH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSRSBGH)->max('id');
    $statusSRSBGH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSRSBGH)->value('status_id');
    //ALIMENTAÇÃO PAINEL DA OLEADEIRA
    $tag_APO = "TE 72 200 210 330 000 - 000031";
    $idAtividadeAPO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_APO)->value('id');
    $idAnaliseAPO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPO)->max('id');
    $statusAPO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPO)->value('status_id');
    //EDGE TRIMMER PANEL PNL 3030.300
    $tag_ETP = "TE 72 200 210 330 000 - 000032";
    $idAtividadeETP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ETP)->value('id');
    $idAnaliseETP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETP)->max('id');
    $statusETP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETP)->value('status_id');
    //FEEDER FOR PLC PANEL
    $tag_FFPP = "TE 72 200 210 330 000 - 000033";
    $idAtividadeFFPP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FFPP)->value('id');
    $idAnaliseFFPP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFFPP)->max('id');
    $statusFFPP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFFPP)->value('status_id');
    //05B5CD06H
    $tag_05B5CD06H = "TE 72 200 210 330 000 - 000034";
    $idAtividade05B5CD06H = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_05B5CD06H)->value('id');
    $idAnalise05B5CD06H = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade05B5CD06H)->max('id');
    $status05B5CD06H = DB::table('preditiva_analises')->where('id', '=', $idAnalise05B5CD06H)->value('status_id');
    //AR CONDICIONADO
    $tag_AC = "TE 72 200 210 330 000 - 000035";
    $idAtividadeAC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AC)->value('id');
    $idAnaliseAC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAC)->max('id');
    $statusAC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAC)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA #1
    $tag_SHSB1 = "TE 72 200 210 330 000 - 000002";
    $idAtividadeSHSB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSB1)->value('id');
    $idAnaliseSHSB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSB1)->max('id');
    $statusSHSB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSB1)->value('status_id');
    //CD07
    //CARRO DE BOBINA DA SAÍDA - BOMBA HIDRÁULICA
    $tag_CBSBH = "TE 72 200 210 330 000 - 000003";
    $idAtividadeCBSBH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CBSBH)->value('id');
    $idAnaliseCBSBH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBSBH)->max('id');
    $statusCBSBH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBSBH)->value('status_id');
    //FIFE SAÍDA BOMBA UNIDADE HIDRAULICA ENROLADEIRA
    $tag_FSBUHE = "TE 72 200 210 330 000 - 000004";
    $idAtividadeFSBUHE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FSBUHE)->value('id');
    $idAnaliseFSBUHE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFSBUHE)->max('id');
    $statusFSBUHE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFSBUHE)->value('status_id');
    //ESTEIRA DE APARAS
    $tag_EA = "TE 72 200 210 330 000 - 000005";
    $idAtividadeEA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EA)->value('id');
    $idAnaliseEA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEA)->max('id');
    $statusEA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEA)->value('status_id');
    //CALHA DA ESTEIRA DE APARAS
    $tag_CEA = "TE 72 200 210 330 000 - 000006";
    $idAtividadeCEA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CEA)->value('id');
    $idAnaliseCEA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCEA)->max('id');
    $idLaudoCEA = DB::table('laudos')->where('analise_id', '=', $idAnaliseCEA)->value('id');
    $statusCEA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCEA)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA DE RECIRCULAÇÃO
    $tag_SHSBR = "TE 72 200 210 330 000 - 000007";
    $idAtividadeSHSBR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSBR)->value('id');
    $idAnaliseSHSBR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSBR)->max('id');
    $statusSHSBR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSBR)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA #2
    $tag_SHSB2 = "TE 72 200 210 330 000 - 000008";
    $idAtividadeSHSB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSB2)->value('id');
    $idAnaliseSHSB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSB2)->max('id');
    $statusSHSB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSB2)->value('status_id');
    //CD08
    //FIFE PROCESSO UNIDADE HIDRAULICA ROLO CORRETOR
    $tag_FPUHRC = "TE 72 200 210 330 000 - 000009";
    $idAtividadeFPUHRC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPUHRC)->value('id');
    $idAnaliseFPUHRC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPUHRC)->max('id');
    $statusFPUHRC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPUHRC)->value('status_id');
    //BOMBA DE LUBRIFICAÇÃO DA ENROLADEIRA
    $tag_BLE = "TE 72 200 210 330 000 - 000010";
    $idAtividadeBLE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLE)->value('id');
    $idAnaliseBLE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLE)->max('id');
    $statusBLE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLE)->value('status_id');
    //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA #3
    $tag_SHSB3 = "TE 72 200 210 330 000 - 000011";
    $idAtividadeSHSB3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSB3)->value('id');
    $idAnaliseSHSB3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSB3)->max('id');
    $statusSHSB3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSB3)->value('status_id');
    //CD09
    //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA #4
    $tag_SHSB4 = "TE 72 200 210 330 000 - 000012";
    $idAtividadeSHSB4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSB4)->value('id');
    $idAnaliseSHSB4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSB4)->max('id');
    $statusSHSB4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSB4)->value('status_id');
    //CD10
    //SCRUBBER FAN 1-2
    $tag_SF = "TE 72 200 210 330 000 - 000013";
    $idAtividadeSF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SF)->value('id');
    $idAnaliseSF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSF)->max('id');
    $statusSF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSF)->value('status_id');
    //CE09
    //NAVALHA DE AR QUENTE - SOPRADOR #1
    $tag_NAQS1 = "TE 72 200 210 330 000 - 000026";
    $idAtividadeNAQS1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAQS1)->value('id');
    $idAnaliseNAQS1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAQS1)->max('id');
    $statusNAQS1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAQS1)->value('status_id');
    //NAVALHA DE AR QUENTE - SOPRADOR #2
    $tag_NAQS2 = "TE 72 200 210 330 000 - 000027";
    $idAtividadeNAQS2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAQS2)->value('id');
    $idAnaliseNAQS2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAQS2)->max('id');
    $statusNAQS2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAQS2)->value('status_id');
    //NAVALHA DE AR QUENTE - SOPRADOR #3
    $tag_NAQS3 = "TE 72 200 210 330 000 - 000028";
    $idAtividadeNAQS3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAQS3)->value('id');
    $idAnaliseNAQS3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAQS3)->max('id');
    $statusNAQS3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAQS3)->value('status_id');
    //CE08
    //BOMBA TANQUE LIMPEZA
    $tag_BTL = "TE 72 200 210 330 000 - 000020";
    $idAtividadeBTL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTL)->value('id');
    $idAnaliseBTL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTL)->max('id');
    $statusBTL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTL)->value('status_id');
    //BOMBA STD-BY TRANSBORDO DE ENXAGUE
    $tag_BSTDE = "TE 72 200 210 330 000 - 000021";
    $idAtividadeBSTDE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BSTDE)->value('id');
    $idAnaliseBSTDE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBSTDE)->max('id');
    $statusBSTDE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBSTDE)->value('status_id');
    //BOMBA STD-BY TANQUE 1 E 2 ENXAGUE
    $tag_BST1_2_E = "TE 72 200 210 330 000 - 000022";
    $idAtividadeBST1_2_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SF)->value('id');
    $idAnaliseBST1_2_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSF)->max('id');
    $statusBST1_2_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSF)->value('status_id');
    //BOMBA STD-BY TANQUE 3 E 4 ENXAGUE
    $tag_BST3_4_E = "TE 72 200 210 330 000 - 000023";
    $idAtividadeBST3_4_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BST3_4_E)->value('id');
    $idAnaliseBST3_4_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBST3_4_E)->max('id');
    $statusBST3_4_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBST3_4_E)->value('status_id');
    //BOMBA STD-BY TANQUE 5 ENXAGUE
    $tag_BST5_E = "TE 72 200 210 330 000 - 000024";
    $idAtividadeBST5_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BST5_E)->value('id');
    $idAnaliseBST5_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBST5_E)->max('id');
    $statusBST5_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBST5_E)->value('status_id');
    //BOMBA TANQUE LIMPEZA STD-BT
    $tag_BTLS = "TE 72 200 210 330 000 - 000025";
    $idAtividadeBTLS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTLS)->value('id');
    $idAnaliseBTLS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTLS)->max('id');
    $statusBTLS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTLS)->value('status_id');
    //CE07
    //BOMBA DE TRANSBORDO DE ENXAGUE
    $tag_BDTE = "TE 72 200 210 330 000 - 000014";
    $idAtividadeBDTE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BDTE)->value('id');
    $idAnaliseBDTE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDTE)->max('id');
    $statusBDTE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDTE)->value('status_id');
    //BOMBA #1 TANQUE 1 E 2 ENXAGUE
    $tag_B1T_1_2_E = "TE 72 200 210 330 000 - 000015";
    $idAtividadeB1T_1_2_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1T_1_2_E)->value('id');
    $idAnaliseB1T_1_2_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1T_1_2_E)->max('id');
    $statusB1T_1_2_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1T_1_2_E)->value('status_id');
    //BOMBA #2 TANQUE 1 E 2 ENXAGUE
    $tag_B2T_1_2_E = "TE 72 200 210 330 000 - 000016";
    $idAtividadeB2T_1_2_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B2T_1_2_E)->value('id');
    $idAnaliseB2T_1_2_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB2T_1_2_E)->max('id');
    $statusB2T_1_2_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB2T_1_2_E)->value('status_id');
    //BOMBA #3 TANQUE 3 E 4 ENXAGUE
    $tag_B3T_3_4_E = "TE 72 200 210 330 000 - 000017";
    $idAtividadeB3T_3_4_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B3T_3_4_E)->value('id');
    $idAnaliseB3T_3_4_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB3T_3_4_E)->max('id');
    $statusB3T_3_4_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB3T_3_4_E)->value('status_id');
    //BOMBA #4 TANQUE 3 E 4 ENXAGUE
    $tag_B4T_3_4_E = "TE 72 200 210 330 000 - 000018";
    $idAtividadeB4T_3_4_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B4T_3_4_E)->value('id');
    $idAnaliseB4T_3_4_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB4T_3_4_E)->max('id');
    $statusB4T_3_4_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB4T_3_4_E)->value('status_id');
    //BOMBA #5 TANQUE 5 ENXAGUE
    $tag_B5T_5_E = "TE 72 200 210 330 000 - 000019";
    $idAtividadeB5T_5_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B5T_5_E)->value('id');
    $idAnaliseB5T_5_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB5T_5_E)->max('id');
    $statusB5T_5_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB5T_5_E)->value('status_id');

    if ($statusAF1 == 5 || $statusAF2 == 5 || $statusSRSBGH == 5 || $statusAPO == 5 || $statusETP == 5 || $statusFFPP == 5 || $status05B5CD06H == 5 ||
        $statusAC == 5 || $statusSHSB1 == 5 || $statusCBSBH == 5 || $statusFSBUHE == 5 || $statusEA == 5 || $statusCEA == 5 || $statusSHSBR == 5 ||
        $statusSHSB2 == 5 || $statusFPUHRC == 5 || $statusBLE == 5 || $statusSHSB3 == 5 || $statusSHSB4 == 5 || $statusSF == 5 || $statusNAQS1 == 5 ||
        $statusNAQS2 == 5 || $statusNAQS3 == 5 || $statusBTL == 5 || $statusBSTDE == 5 || $statusBST1_2_E == 5 || $statusBST3_4_E == 5 || $statusBST5_E == 5 ||
        $statusBTLS == 5 || $statusB1T_1_2_E == 5 || $statusB2T_1_2_E == 5 || $statusB3T_3_4_E == 5 || $statusB4T_3_4_E == 5 || $statusB5T_5_E == 5) {
      $decapagem_ccm2_status = 5;
    } elseif ($statusAF1 == 4 || $statusAF2 == 4 || $statusSRSBGH == 4 || $statusAPO == 4 || $statusETP == 4 || $statusFFPP == 4 || $status05B5CD06H == 4 ||
        $statusAC == 4 || $statusSHSB1 == 4 || $statusCBSBH == 4 || $statusFSBUHE == 4 || $statusEA == 4 || $statusCEA == 4 || $statusSHSBR == 4 ||
        $statusSHSB2 == 4 || $statusFPUHRC == 4 || $statusBLE == 4 || $statusSHSB3 == 4 || $statusSHSB4 == 4 || $statusSF == 4 || $statusNAQS1 == 4 ||
        $statusNAQS2 == 4 || $statusNAQS3 == 4 || $statusBTL == 4 || $statusBSTDE == 4 || $statusBST1_2_E == 4 || $statusBST3_4_E == 4 || $statusBST5_E == 4 ||
        $statusBTLS == 4 || $statusB1T_1_2_E == 4 || $statusB2T_1_2_E == 4 || $statusB3T_3_4_E == 4 || $statusB4T_3_4_E == 4 || $statusB5T_5_E == 4) {
      $decapagem_ccm2_status = 4;
    } elseif ($statusAF1 == 3 || $statusAF2 == 3 || $statusSRSBGH == 3 || $statusAPO == 3 || $statusETP == 3 || $statusFFPP == 3 || $status05B5CD06H == 3 ||
        $statusAC == 3 || $statusSHSB1 == 3 || $statusCBSBH == 3 || $statusFSBUHE == 3 || $statusEA == 3 || $statusCEA == 3 || $statusSHSBR == 3 ||
        $statusSHSB2 == 3 || $statusFPUHRC == 3 || $statusBLE == 3 || $statusSHSB3 == 3 || $statusSHSB4 == 3 || $statusSF == 3 || $statusNAQS1 == 3 ||
        $statusNAQS2 == 3 || $statusNAQS3 == 3 || $statusBTL == 3 || $statusBSTDE == 3 || $statusBST1_2_E == 3 || $statusBST3_4_E == 3 || $statusBST5_E == 3 ||
        $statusBTLS == 3 || $statusB1T_1_2_E == 3 || $statusB2T_1_2_E == 3 || $statusB3T_3_4_E == 3 || $statusB4T_3_4_E == 3 || $statusB5T_5_E == 3) {
      $decapagem_ccm2_status = 3;
    }
    else {
      $decapagem_ccm2_status = "";
    }

      return $decapagem_ccm2_status;
  }

  public static function decapagem_drives_Menu() {
    $decapagem_drives_status = "";
    //DESENROLADEIRA
    $tag_DESENROLADEIRA = "TE 72 200 210 363 000 - 000047";
    $idAtividadeDESENROLADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESENROLADEIRA)->value('id');
    $idAnaliseDESENROLADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENROLADEIRA)->max('id');
    $statusDESENROLADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENROLADEIRA)->value('status_id');
    //DESEMPENADEIRA
    $tag_DESEMPENADEIRA = "TE 72 200 210 363 000 - 000050";
    $idAtividadeDESEMPENADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESEMPENADEIRA)->value('id');
    $idAnaliseDESEMPENADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEMPENADEIRA)->max('id');
    $statusDESEMPENADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEMPENADEIRA)->value('status_id');
    //ROLO CORRETOR
    $tag_RC = "TE 72 200 210 363 000 - 000051";
    $idAtividadeRC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RC)->value('id');
    $idAnaliseRC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRC)->max('id');
    $statusRC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRC)->value('status_id');
    //MOTOR AUXILIAR CORTE DE APARA #1 LADO MOTOR
    $tag_MACA1LM = "TE 72 200 210 363 000 - 000052";
    $idAtividadeMACA1LM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MACA1LM)->value('id');
    $idAnaliseMACA1LM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMACA1LM)->max('id');
    $statusMACA1LM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMACA1LM)->value('status_id');
    //MOTOR AUXILIAR CORTE DE APARA #2 LADO OPERADOR
    $tag_MACA2LO = "TE 72 200 210 363 000 - 000009";
    $idAtividadeMACA2LO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MACA2LO)->value('id');
    $idAnaliseMACA2LO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMACA2LO)->max('id');
    $statusMACA2LO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMACA2LO)->value('status_id');
    //PICOTADEIRA
    $tag_PIC = "TE 72 200 210 363 000 - 000010";
    $idAtividadePIC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PIC)->value('id');
    $idAnalisePIC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePIC)->max('id');
    $statusPIC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePIC)->value('status_id');
    //TENSOR #1
    $tag_TEN1 = "TE 72 200 210 363 000 - 000011";
    $idAtividadeTEN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TEN1)->value('id');
    $idAnaliseTEN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTEN1)->max('id');
    $statusTEN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTEN1)->value('status_id');
    //APOIO TENSOR #1
    $tag_AT1 = "TE 72 200 210 363 000 - 000053";
    $idAtividadeAT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AT1)->value('id');
    $idAnaliseAT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAT1)->max('id');
    $statusAT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAT1)->value('status_id');
    //APOIO TENSOR #3
    $tag_AT3 = "TE 72 200 210 363 000 - 000012";
    $idAtividadeAT3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AT3)->value('id');
    $idAnaliseAT3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAT3)->max('id');
    $statusAT3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAT3)->value('status_id');
    //RETIFICADOR 630W - MASTER
    $tag_RM = "TE 72 200 210 363 000 - 000014";
    $idAtividadeRM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RM)->value('id');
    $idAnaliseRM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRM)->max('id');
    $statusRM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRM)->value('status_id');
    //RETIFICADOR 630W - SLAVE
    $tag_RS = "TE 72 200 210 363 000 - 000054";
    $idAtividadeRS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS)->value('id');
    $idAnaliseRS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS)->max('id');
    $statusRS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS)->value('status_id');
    //DRIVE ENROLADEIRA
    $tag_DE = "TE 72 200 210 363 000 - 000015";
    $idAtividadeDE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DE)->value('id');
    $idAnaliseDE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDE)->max('id');
    $statusDE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDE)->value('status_id');
    //ROLO SECADOR 1 - 17
    //ROLO SECADOR #1
    $tag_RS1 = "TE 72 200 210 363 000 - 000001";
    $idAtividadeRS1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS1)->value('id');
    $idAnaliseRS1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS1)->max('id');
    $statusRS1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS1)->value('status_id');
    //ROLO SECADOR #2
    $tag_RS2 = "TE 72 200 210 363 000 - 000016";
    $idAtividadeRS2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS2)->value('id');
    $idAnaliseRS2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS2)->max('id');
    $statusRS2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS2)->value('status_id');
    //ROLO SECADOR #3
    $tag_RS3 = "TE 72 200 210 363 000 - 000017";
    $idAtividadeRS3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS3)->value('id');
    $idAnaliseRS3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS3)->max('id');
    $statusRS3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS3)->value('status_id');
    //ROLO SECADOR #4
    $tag_RS4 = "TE 72 200 210 363 000 - 000018";
    $idAtividadeRS4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS4)->value('id');
    $idAnaliseRS4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS4)->max('id');
    $statusRS4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS4)->value('status_id');
    //ROLO SECADOR #5
    $tag_RS5 = "TE 72 200 210 363 000 - 000002";
    $idAtividadeRS5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS5)->value('id');
    $idAnaliseRS5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS5)->max('id');
    $statusRS5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS5)->value('status_id');
    //ROLO SECADOR #6
    $tag_RS6 = "TE 72 200 210 363 000 - 000019";
    $idAtividadeRS6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS6)->value('id');
    $idAnaliseRS6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS6)->max('id');
    $statusRS6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS6)->value('status_id');
    //ROLO SECADOR #7
    $tag_RS7 = "TE 72 200 210 363 000 - 000020";
    $idAtividadeRS7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS7)->value('id');
    $idAnaliseRS7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS7)->max('id');
    $statusRS7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS7)->value('status_id');
    //ROLO SECADOR #8
    $tag_RS8 = "TE 72 200 210 363 000 - 000021";
    $idAtividadeRS8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS8)->value('id');
    $idAnaliseRS8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS8)->max('id');
    $statusRS8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS8)->value('status_id');
    //ROLO SECADOR #9
    $tag_RS9 = "TE 72 200 210 363 000 - 000003";
    $idAtividadeRS9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS9)->value('id');
    $idAnaliseRS9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS9)->max('id');
    $statusRS9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS9)->value('status_id');
    //ROLO SECADOR #10
    $tag_RS10 = "TE 72 200 210 363 000 - 000022";
    $idAtividadeRS10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS10)->value('id');
    $idAnaliseRS10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS10)->max('id');
    $idLaudoRS10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS10)->value('id');
    $statusRS10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS10)->value('status_id');
    //ROLO SECADOR #11
    $tag_RS11 = "TE 72 200 210 363 000 - 000023";
    $idAtividadeRS11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS11)->value('id');
    $idAnaliseRS11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS11)->max('id');
    $statusRS11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS11)->value('status_id');
    //ROLO SECADOR #12
    $tag_RS12 = "TE 72 200 210 363 000 - 000024";
    $idAtividadeRS12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS12)->value('id');
    $idAnaliseRS12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS12)->max('id');
    $statusRS12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS12)->value('status_id');
    //ROLO SECADOR #13
    $tag_RS13 = "TE 72 200 210 363 000 - 000025";
    $idAtividadeRS13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS13)->value('id');
    $idAnaliseRS13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS13)->max('id');
    $statusRS13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS13)->value('status_id');
    //ROLO SECADOR #14
    $tag_RS14 = "TE 72 200 210 363 000 - 000004";
    $idAtividadeRS14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS14)->value('id');
    $idAnaliseRS14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS14)->max('id');
    $statusRS14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS14)->value('status_id');
    //ROLO SECADOR #15
    $tag_RS15 = "TE 72 200 210 363 000 - 000026";
    $idAtividadeRS15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS15)->value('id');
    $idAnaliseRS15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS15)->max('id');
    $statusRS15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS15)->value('status_id');
    //ROLO SECADOR #16
    $tag_RS16 = "TE 72 200 210 363 000 - 000027";
    $idAtividadeRS16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS16)->value('id');
    $idAnaliseRS16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS16)->max('id');
    $statusRS16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS16)->value('status_id');
    //ROLO SECADOR #17
    $tag_RS17 = "TE 72 200 210 363 000 - 000028";
    $idAtividadeRS17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS17)->value('id');
    $idAnaliseRS17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS17)->max('id');
    $statusRS17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS17)->value('status_id');
    //MOTOR DE AJUSTE LARGURA TRIMMER
    $tag_MALT = "TE 72 200 210 363 000 - 000005";
    $idAtividadeMALT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MALT)->value('id');
    $idAnaliseMALT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMALT)->max('id');
    $statusMALT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMALT)->value('status_id');
    //AJUSTE CORTE APARA GAP "A" LADO OPERADOR - 1
    $tag_ACAGALO_1 = "TE 72 200 210 363 000 - 000055";
    $idAtividadeACAGALO_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGALO_1)->value('id');
    $idAnaliseACAGALO_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGALO_1)->max('id');
    $statusACAGALO_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGALO_1)->value('status_id');
    //AJUSTE CORTE APARA GAP "A" LADO MOTOR - 2
    $tag_ACALM_2 = "TE 72 200 210 363 000 - 000056";
    $idAtividadeACALM_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACALM_2)->value('id');
    $idAnaliseACALM_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACALM_2)->max('id');
    $statusACALM_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACALM_2)->value('status_id');
    //AJUSTE CORTE APARA GAP "A" LADO OPERADOR - 3
    $tag_ACALO_3 = "TE 72 200 210 363 000 - 000057";
    $idAtividadeACALO_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACALO_3)->value('id');
    $idAnaliseACALO_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACALO_3)->max('id');
    $statusACALO_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACALO_3)->value('status_id');
    //AJUSTE CORTE APARA GAP "A" LADO MOTOR - 4
    $tag_ACALM_4 = "TE 72 200 210 363 000 - 000006";
    $idAtividadeACALM_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACALM_4)->value('id');
    $idAnaliseACALM_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACALM_4)->max('id');
    $statusACALM_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACALM_4)->value('status_id');
    //AJUSTE CORTE APARA GAP "B" LADO OPERADOR - 1
    $tag_ACAGBLO_1 = "TE 72 200 210 363 000 - 000058";
    $idAtividadeACAGBLO_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGBLO_1)->value('id');
    $idAnaliseACAGBLO_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGBLO_1)->max('id');
    $statusACAGBLO_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGBLO_1)->value('status_id');
    //AJUSTE CORTE APARA GAP "B" LADO MOTOR - 2
    $tag_ACAGBLM_2 = "TE 72 200 210 363 000 - 000059";
    $idAtividadeACAGBLM_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGBLM_2)->value('id');
    $idAnaliseACAGBLM_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGBLM_2)->max('id');
    $statusACAGBLM_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGBLM_2)->value('status_id');
    //AJUSTE CORTE APARA GAP "B" LADO OPERADOR - 3
    $tag_ACAGBLO_3 = "TE 72 200 210 363 000 - 000060";
    $idAtividadeACAGBLO_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGBLO_3)->value('id');
    $idAnaliseACAGBLO_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGBLO_3)->max('id');
    $statusACAGBLO_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGBLO_3)->value('status_id');
    //AJUSTE CORTE APARA GAP "B" LADO MOTOR - 4
    $tag_ACAGBLM_4 = "TE 72 200 210 363 000 - 000061";
    $idAtividadeACAGBLM_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGBLM_4)->value('id');
    $idAnaliseACAGBLM_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGBLM_4)->max('id');
    $statusACAGBLM_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGBLM_4)->value('status_id');
    //TENSOR #2
    $tag_TENSOR_2 = "TE 72 200 210 363 000 - 000007";
    $idAtividadeTENSOR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TENSOR_2)->value('id');
    $idAnaliseTENSOR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTENSOR_2)->max('id');
    $statusTENSOR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTENSOR_2)->value('status_id');
    //TENSOR #3
    $tag_TENSOR_3 = "TE 72 200 210 363 000 - 000029";
    $idAtividadeTENSOR_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TENSOR_3)->value('id');
    $idAnaliseTENSOR_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTENSOR_3)->max('id');
    $statusTENSOR_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTENSOR_3)->value('status_id');
    //ENTRADA
    $tag_ENTRADA = "TE 72 200 210 363 000 - 000030";
    $idAtividadeENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ENTRADA)->value('id');
    $idAnaliseENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENTRADA)->max('id');
    $statusENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENTRADA)->value('status_id');
    //MODULO DE FRENAGEM
    $tag_MDF = "TE 72 200 210 363 000 - 000037";
    $idAtividadeMDF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS17)->value('id');
    $idAnaliseMDF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS17)->max('id');
    $statusMDF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS17)->value('status_id');
    //SECCIONADORA ENROLADEIRA
    $tag_SE = "TE 72 200 210 363 000 - 000045";
    $idAtividadeSE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SE)->value('id');
    $idAnaliseSE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSE)->max('id');
    $statusSE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSE)->value('status_id');
    //PAINEL DE EMERGÊNCIA 05B5DB05
    $tag_PDE_05B5DB05 = "TE 72 200 210 404 003 - 000002";
    $idAtividadePDE_05B5DB05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PDE_05B5DB05)->value('id');
    $idAnalisePDE_05B5DB05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePDE_05B5DB05)->max('id');
    $statusPDE_05B5DB05 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePDE_05B5DB05)->value('status_id');
    //PAINEL DE EMERGÊNCIA 05B5DB06
    $tag_PDE_05B5DB06 = "TE 72 200 210 404 003 - 000001";
    $idAtividadePDE_05B5DB06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PDE_05B5DB06)->value('id');
    $idAnalisePDE_05B5DB06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePDE_05B5DB06)->max('id');
    $statusPDE_05B5DB06 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePDE_05B5DB06)->value('status_id');

    if ($statusDESENROLADEIRA == 5 || $statusDESEMPENADEIRA == 5 || $statusRC == 5 || $statusMACA1LM == 5 || $statusMACA2LO == 5 || $statusPIC == 5 || $statusTEN1 == 5 ||
    $statusAT1 == 5 || $statusAT3 == 5 || $statusRM == 5 || $statusRS == 5 || $statusDE == 5 || $statusRS1 == 5 || $statusRS2 == 5 || $statusRS3 == 5 ||
    $statusRS4 == 5 || $statusRS5 == 5 || $statusRS6 == 5 || $statusRS7 == 5 || $statusRS8 == 5 || $statusRS9 == 5 || $statusRS10 == 5 || $statusRS11 == 5 ||
    $statusRS12 == 5 || $statusRS13 == 5 || $statusRS14 == 5 || $statusRS15 == 5 || $statusRS16 == 5 || $statusRS17 == 5 || $statusMALT == 5 || $statusACAGALO_1 == 5 ||
    $statusACALM_2 == 5 || $statusACALO_3 == 5 || $statusACALM_4 == 5 || $statusACAGBLO_1 == 5 || $statusACAGBLM_2 == 5 || $statusACAGBLO_3 == 5 || $statusACAGBLM_4 == 5 ||
    $statusTENSOR_2 == 5 || $statusTENSOR_3 == 5 || $statusENTRADA == 5 || $statusMDF == 5 || $statusSE == 5 || $statusPDE_05B5DB05 == 5 || $statusPDE_05B5DB06 == 5) {
      $decapagem_drives_status = 5;
    } elseif ($statusDESENROLADEIRA == 4 || $statusDESEMPENADEIRA == 4 || $statusRC == 4 || $statusMACA1LM == 4 || $statusMACA2LO == 4 || $statusPIC == 4 || $statusTEN1 == 4 ||
    $statusAT1 == 4 || $statusAT3 == 4 || $statusRM == 4 || $statusRS == 4 || $statusDE == 4 || $statusRS1 == 4 || $statusRS2 == 4 || $statusRS3 == 4 ||
    $statusRS4 == 4 || $statusRS5 == 4 || $statusRS6 == 4 || $statusRS7 == 4 || $statusRS8 == 4 || $statusRS9 == 4 || $statusRS10 == 4 || $statusRS11 == 4 ||
    $statusRS12 == 4 || $statusRS13 == 4 || $statusRS14 == 4 || $statusRS15 == 4 || $statusRS16 == 4 || $statusRS17 == 4 || $statusMALT == 4 || $statusACAGALO_1 == 4 ||
    $statusACALM_2 == 4 || $statusACALO_3 == 4 || $statusACALM_4 == 4 || $statusACAGBLO_1 == 4 || $statusACAGBLM_2 == 4 || $statusACAGBLO_3 == 4 || $statusACAGBLM_4 == 4 ||
    $statusTENSOR_2 == 4 || $statusTENSOR_3 == 4 || $statusENTRADA == 4 || $statusMDF == 4 || $statusSE == 4 || $statusPDE_05B5DB05 == 4 || $statusPDE_05B5DB06 == 4) {
      $decapagem_drives_status = 4;
    } elseif ($statusDESENROLADEIRA == 3 || $statusDESEMPENADEIRA == 3 || $statusRC == 3 || $statusMACA1LM == 3 || $statusMACA2LO == 3 || $statusPIC == 3 || $statusTEN1 == 3 ||
    $statusAT1 == 3 || $statusAT3 == 3 || $statusRM == 3 || $statusRS == 3 || $statusDE == 3 || $statusRS1 == 3 || $statusRS2 == 3 || $statusRS3 == 3 ||
    $statusRS4 == 3 || $statusRS5 == 3 || $statusRS6 == 3 || $statusRS7 == 3 || $statusRS8 == 3 || $statusRS9 == 3 || $statusRS10 == 3 || $statusRS11 == 3 ||
    $statusRS12 == 3 || $statusRS13 == 3 || $statusRS14 == 3 || $statusRS15 == 3 || $statusRS16 == 3 || $statusRS17 == 3 || $statusMALT == 3 || $statusACAGALO_1 == 3 ||
    $statusACALM_2 == 3 || $statusACALO_3 == 3 || $statusACALM_4 == 3 || $statusACAGBLO_1 == 3 || $statusACAGBLM_2 == 3 || $statusACAGBLO_3 == 3 || $statusACAGBLM_4 == 3 ||
    $statusTENSOR_2 == 3 || $statusTENSOR_3 == 3 || $statusENTRADA == 3 || $statusMDF == 3 || $statusSE == 3 || $statusPDE_05B5DB05 == 3 || $statusPDE_05B5DB06 == 3) {
      $decapagem_drives_status = 3;
    }
    else {
      $decapagem_drives_status = "";
    }

    return $decapagem_drives_status;
  }

  public static function lds_Menu() {
    $lds_menu = "";
    $ura_painel_caldeiras_status = AuxFuncRelTec::ura_painel_caldeiras_Menu();
    $decapagem_ets_status = AuxFuncRelTec::decapagem_ets_Menu();
    $decapagem_ccm1_status = AuxFuncRelTec::decapagem_ccm1_Menu();
    $decapagem_ccm2_status = AuxFuncRelTec::decapagem_ccm2_Menu();
    $decapagem_drives_status = AuxFuncRelTec::decapagem_drives_Menu();

    if ($ura_painel_caldeiras_status == 5 || $decapagem_ets_status == 5 || $decapagem_ccm1_status == 5 || $decapagem_ccm2_status == 5 || $decapagem_drives_status == 5) {
      $lds_menu = 5;
    } elseif ($ura_painel_caldeiras_status == 4 || $decapagem_ets_status == 4 || $decapagem_ccm1_status == 4 || $decapagem_ccm2_status == 4 || $decapagem_drives_status == 4) {
      $lds_menu = 4;
    } elseif ($ura_painel_caldeiras_status == 3 || $decapagem_ets_status == 3 || $decapagem_ccm1_status == 3 || $decapagem_ccm2_status == 3 || $decapagem_drives_status == 3) {
      $lds_menu = 3;
    } else {
      $lds_menu = "";
    }

    return $lds_menu;
  }

    public static function lds_normal_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lds_linha1 = 10;
      $lds_linha2 = 22;
      $lds_normal = aux::GeralPorLinhaTE($atual1, 3, $lds_linha1, $lds_linha2);
      return $lds_normal;
    }
    public static function lds_alarme_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lds_linha1 = 10;
      $lds_linha2 = 22;
      $lds_alarme = aux::GeralPorLinhaTE($atual1, 4, $lds_linha1, $lds_linha2);
      return $lds_alarme;
    }
    public static function lds_critico_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lds_linha1 = 10;
      $lds_linha2 = 22;
      $lds_critico = aux::GeralPorLinhaTE($atual1, 5, $lds_linha1, $lds_linha2);
      return $lds_critico;
    }

  //--- LAMINADOR
  public static function laminador_ets_Menu() {
    $laminador_ets_status = "";
    //ESTAÇÃO REMOTA - ET01
    $tag_ER_1 = "TE 72 300 310 381 003 - 000001";
    $idAtividadeER_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_1)->value('id');
    $idAnaliseER_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_1)->max('id');
    $statusER_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_1)->value('status_id');
    //ESTAÇÃO REMOTA - ET02
    $tag_ER_2 = "TE 72 300 310 381 006 - 000001";
    $idAtividadeER_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_2)->value('id');
    $idAnaliseER_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_2)->max('id');
    $statusER_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_2)->value('status_id');
    //ESTAÇÃO REMOTA - ET03
    $tag_ER_3 = "TE 72 300 310 381 009 - 000001";
    $idAtividadeER_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_3)->value('id');
    $idAnaliseER_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_3)->max('id');
    $statusER_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_3)->value('status_id');
    //ESTAÇÃO REMOTA - ET04
    $tag_ER_4 = "TE 72 300 310 381 012 - 000001";
    $idAtividadeER_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_4)->value('id');
    $idAnaliseER_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_4)->max('id');
    $statusER_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_4)->value('status_id');
    //ESTAÇÃO REMOTA - ET05
    $tag_ER_5 = "TE 72 300 310 381 015 - 000001";
    $idAtividadeER_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_5)->value('id');
    $idAnaliseER_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_5)->max('id');
    $statusER_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_5)->value('status_id');
    //ESTAÇÃO REMOTA - ET06
    $tag_ER_6 = "TE 72 300 310 381 018 - 000001";
    $idAtividadeER_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_6)->value('id');
    $idAnaliseER_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_6)->max('id');
    $statusER_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_6)->value('status_id');
    //ESTAÇÃO REMOTA - ET07
    $tag_ER_7 = "TE 72 300 310 381 021 - 000001";
    $idAtividadeER_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_7)->value('id');
    $idAnaliseER_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_7)->max('id');
    $statusER_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_7)->value('status_id');
    //ESTAÇÃO REMOTA - ET08
    $tag_ER_8 = "TE 72 300 310 381 024 - 000001";
    $idAtividadeER_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_8)->value('id');
    $idAnaliseER_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_8)->max('id');
    $statusER_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_8)->value('status_id');

    if ($statusER_1 == 5 || $statusER_2 == 5 || $statusER_3 == 5 || $statusER_4 == 5 || $statusER_5 == 5 || $statusER_6 == 5 || $statusER_7 == 5 || $statusER_8 == 5) {
      $laminador_ets_status = 5;
    } elseif ($statusER_1 == 4 || $statusER_2 == 4 || $statusER_3 == 4 || $statusER_4 == 4 || $statusER_5 == 4 || $statusER_6 == 4 || $statusER_7 == 4 || $statusER_8 == 4) {
      $laminador_ets_status = 4;
    } elseif ($statusER_1 == 3 || $statusER_2 == 3 || $statusER_3 == 3 || $statusER_4 == 3 || $statusER_5 == 3 || $statusER_6 == 3 || $statusER_7 == 3 || $statusER_8 == 3) {
      $laminador_ets_status = 3;
    } else {
      $laminador_ets_status = "";
    }

    return $laminador_ets_status;
  }

  public static function laminador_ccm1_Menu() {
    $laminador_ccm1_status = "";
    //CCM1
    //BD02 - TANQUE AGITADOR PRINCIPAL
    $tag_TAP = "TE 72 300 310 318 000 - 000003";
    $idAtividadeTAP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TAP)->value('id');
    $idAnaliseTAP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTAP)->max('id');
    $statusTAP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTAP)->value('status_id');
    //BOMBA DE FILTRO A VÁCUO
    $tag_BDFV = "TE 72 300 310 318 000 - 000004";
    $idAtividadeBDFV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BDFV)->value('id');
    $idAnaliseBDFV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDFV)->max('id');
    $statusBDFV = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDFV)->value('status_id');
    //BD03 - BOMBA DE FILTRO A VÁCUO
    $tag_BDFV_2 = "TE 72 300 310 318 000 - 000005";
    $idAtividadeBDFV_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BDFV_2)->value('id');
    $idAnaliseBDFV_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDFV_2)->max('id');
    $statusBDFV_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDFV_2)->value('status_id');
    //BD05 - EXAUSTOR DE GASES
    $tag_EDG = "TE 72 300 310 318 000 - 000006";
    $idAtividadeEDG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EDG)->value('id');
    $idAnaliseEDG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEDG)->max('id');
    $statusEDG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEDG)->value('status_id');
    //BE03 - BOMBA Nº1 - SISTEMA HIDRÁULICO DE ALTA PRESSÃO
    $tag_B_2_SHAP = "TE 72 300 310 318 000 - 000012";
    $idAtividadeB_2_SHAP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_2_SHAP)->value('id');
    $idAnaliseB_2_SHAP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_2_SHAP)->max('id');
    $statusB_2_SHAP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_2_SHAP)->value('status_id');
    //BE02 - BOMBA Nº2 - SISTEMA HIDRÁULICO DE ALTA PRESSÃO
    $tag_B_1_SHAP = "TE 72 300 310 318 000 - 000011";
    $idAtividadeB_1_SHAP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_1_SHAP)->value('id');
    $idAnaliseB_1_SHAP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_1_SHAP)->max('id');
    $statusB_1_SHAP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_1_SHAP)->value('status_id');

    if ($statusTAP == 5 || $statusBDFV == 5 || $statusBDFV_2 == 5 || $statusEDG == 5 || $statusB_2_SHAP == 5 || $statusB_1_SHAP == 5) {
      $laminador_ccm1_status = 5;
    } elseif ($statusTAP == 4 || $statusBDFV == 4 || $statusBDFV_2 == 4 || $statusEDG == 4 || $statusB_2_SHAP == 4 || $statusB_1_SHAP == 4) {
      $laminador_ccm1_status = 4;
    } elseif ($statusTAP == 3 || $statusBDFV == 3 || $statusBDFV_2 == 3 || $statusEDG == 3 || $statusB_2_SHAP == 3 || $statusB_1_SHAP == 3) {
      $laminador_ccm1_status = 3;
    } else {
      $laminador_ccm1_status = "";
    }

    return $laminador_ccm1_status;
  }

  public static function laminador_ccm2_Menu() {
    $laminador_ccm2_status = "";
    //CCM2
    //BD09 - BOMBA N°3 - SISTEMA HIDRÁULICO DE BAIXA PRESSÃO
    $tag_B_3_SHBP = "TE 72 300 310 318 000 - 000009";
    $idAtividadeB_3_SHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_3_SHBP)->value('id');
    $idAnaliseB_3_SHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_3_SHBP)->max('id');
    $statusB_3_SHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_3_SHBP)->value('status_id');
    //BOMBA N°4 - SISTEMA HIDRÁULICO DE BAIXA PRESSÃO
    $tag_B_4_SHBP = "TE 72 300 310 318 000 - 000010";
    $idAtividadeB_4_SHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_4_SHBP)->value('id');
    $idAnaliseB_4_SHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_4_SHBP)->max('id');
    $statusB_4_SHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_4_SHBP)->value('status_id');
    //BD08 - BOMBA DE RECIRCULAÇÃO
    $tag_BR = "TE 72 300 310 318 000 - 000039";
    $idAtividadeBR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR)->value('id');
    $idAnaliseBR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR)->max('id');
    $statusBR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR)->value('status_id');
    //BOMBA N°1 - SISTEMA HIDRÁULICO DE BAIXA PRESSÃO
    $tag_B_1_SHBP = "TE 72 300 310 318 000 - 000007";
    $idAtividadeB_1_SHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_1_SHBP)->value('id');
    $idAnaliseB_1_SHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_1_SHBP)->max('id');
    $statusB_1_SHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_1_SHBP)->value('status_id');
    //BOMBA N°2 - SISTEMA HIDRÁULICO DE BAIXA PRESSÃO
    $tag_B_2_SHBP = "TE 72 300 310 318 000 - 000008";
    $idAtividadeB_2_SHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_2_SHBP)->value('id');
    $idAnaliseB_2_SHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_2_SHBP)->max('id');
    $statusB_2_SHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_2_SHBP)->value('status_id');
    //BA01 - BARRAMENTO DE ALIMENTAÇÃO
    $tag_BA_1 = "TE 72 300 310 318 000 - 000001";
    $idAtividadeBA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BA_1)->value('id');
    $idAnaliseBA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBA_1)->max('id');
    $statusBA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBA_1)->value('status_id');
    //BA02 - BARRAMENTO DE ALIMENTAÇÃO
    $tag_BA_2 = "TE 72 300 310 318 000 - 000002";
    $idAtividadeBA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BA_2)->value('id');
    $idAnaliseBA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBA_2)->max('id');
    $statusBA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBA_2)->value('status_id');
    //CB04 - ALIMENTAÇÃO ET'S - 06B5CB04B
    $tag_AE_06B5CB04B = "TE 72 300 310 802 000 - 000009";
    $idAtividadeAE_06B5CB04B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AE_06B5CB04B)->value('id');
    $idAnaliseAE_06B5CB04B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE_06B5CB04B)->max('id');
    $statusAE_06B5CB04B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE_06B5CB04B)->value('status_id');
    //ALIMENTAÇÃO ET'S - 06B5CB04A
    $tag_AE_06B5CB04A = "TE 72 300 310 802 000 - 000008";
    $idAtividadeAE_06B5CB04A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AE_06B5CB04A)->value('id');
    $idAnaliseAE_06B5CB04A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE_06B5CB04A)->max('id');
    $statusAE_06B5CB04A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE_06B5CB04A)->value('status_id');
    //CB03 - ALIMENTAÇÃO ET'S - 06B5CB03B
    $tag_AE_06B5CB03B = "TE 72 300 310 802 000 - 000007";
    $idAtividadeAE_06B5CB03B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AE_06B5CB03B)->value('id');
    $idAnaliseAE_06B5CB03B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE_06B5CB03B)->max('id');
    $statusAE_06B5CB03B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE_06B5CB03B)->value('status_id');
    //ALIMENTAÇÃO ET'S - 06B5CB03A
    $tag_AE_06B5CB03A = "TE 72 300 310 802 000 - 000006";
    $idAtividadeAE_06B5CB03A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AE_06B5CB03A)->value('id');
    $idAnaliseAE_06B5CB03A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE_06B5CB03A)->max('id');
    $statusAE_06B5CB03A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE_06B5CB03A)->value('status_id');

    if ($statusB_3_SHBP == 5 || $statusB_4_SHBP == 5 || $statusBR == 5 || $statusB_1_SHBP == 5 || $statusB_2_SHBP == 5 || $statusBA_1 == 5 || $statusBA_2 == 5 ||
    $statusAE_06B5CB04B == 5 || $statusAE_06B5CB04A == 5 || $statusAE_06B5CB03B == 5 || $statusAE_06B5CB03A == 5) {
      $laminador_ccm2_status = 5;
    } elseif ($statusB_3_SHBP == 4 || $statusB_4_SHBP == 4 || $statusBR == 4|| $statusB_1_SHBP == 4 || $statusB_2_SHBP == 4 || $statusBA_1 == 4 || $statusBA_2 == 4 ||
    $statusAE_06B5CB04B == 4 || $statusAE_06B5CB04A == 4 || $statusAE_06B5CB03B == 4 || $statusAE_06B5CB03A == 4) {
      $laminador_ccm2_status = 4;
    } elseif ($statusB_3_SHBP == 3 || $statusB_4_SHBP == 3 || $statusBR == 3 || $statusB_1_SHBP == 3 || $statusB_2_SHBP == 3 || $statusBA_1 == 3 || $statusBA_2 == 3 ||
    $statusAE_06B5CB04B == 3 || $statusAE_06B5CB04A == 3 || $statusAE_06B5CB03B == 3 || $statusAE_06B5CB03A == 3) {
      $laminador_ccm2_status = 3;
    } else {
      $laminador_ccm2_status = "";
    }

    return $laminador_ccm2_status;
  }

  public static function laminador_salaPLC_Menu() {
    $laminador_salaPLC_status = "";
    //PAINEL DE EMERGÊNCIA - 06B5CC01
    $tag_PE_06B5CC01 = "TE 72 300 310 802 000 - 000010";
    $idAtividadePE_06B5CC01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_06B5CC01)->value('id');
    $idAnalisePE_06B5CC01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_06B5CC01)->max('id');
    $statusPE_06B5CC01 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_06B5CC01)->value('status_id');
    //PAINEL DE EMERGÊNCIA - 06B5CC02
    $tag_PE_06B5CC02 = "TE 72 300 310 802 000 - 000011";
    $idAtividadePE_06B5CC02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_06B5CC02)->value('id');
    $idAnalisePE_06B5CC02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_06B5CC02)->max('id');
    $statusPE_06B5CC02 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_06B5CC02)->value('status_id');
    //PAINEL DE EMERGÊNCIA - 06B5CC03
    $tag_PE_06B5CC03 = "TE 72 300 310 802 000 - 000012";
    $idAtividadePE_06B5CC03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_06B5CC03)->value('id');
    $idAnalisePE_06B5CC03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_06B5CC03)->max('id');
    $statusPE_06B5CC03 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_06B5CC03)->value('status_id');
    //PAINEL DE EMERGÊNCIA - 06B5CC04
    $tag_PE_06B5CC04 = "TE 72 300 310 802 000 - 000013";
    $idAtividadePE_06B5CC04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_06B5CC04)->value('id');
    $idAnalisePE_06B5CC04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_06B5CC04)->max('id');
    $statusPE_06B5CC04 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_06B5CC04)->value('status_id');
    // S7 400 CPU MTX / MTN-RCH
    $tag_S7_400_CPU_MTX = "TE 72 300 310 802 000 - 000014";
    $idAtividadeS7_400_CPU_MTX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S7_400_CPU_MTX)->value('id');
    $idAnaliseS7_400_CPU_MTX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS7_400_CPU_MTX)->max('id');
    $statusS7_400_CPU_MTX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS7_400_CPU_MTX)->value('status_id');
    //S7 400 CPU EMU / MÊS
    $tag_S7_400_CPU_EMU = "TE 72 300 310 802 000 - 000017";
    $idAtividadeS7_400_CPU_EMU = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S7_400_CPU_EMU)->value('id');
    $idAnaliseS7_400_CPU_EMU = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS7_400_CPU_EMU)->max('id');
    $statusS7_400_CPU_EMU = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS7_400_CPU_EMU)->value('status_id');
    // OS6, OS7 / ES3 - RCM SERVER
    $tag_OS6_OS7_ES3 = "TE 72 300 310 802 000 - 000016";
    $idAtividadeOS6_OS7_ES3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_OS6_OS7_ES3)->value('id');
    $idAnaliseOS6_OS7_ES3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOS6_OS7_ES3)->max('id');
    $statusOS6_OS7_ES3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOS6_OS7_ES3)->value('status_id');
    //TDC (CPU COMFU)
    $tag_TDC_CPU_COMFU = "TE 72 300 310 802 000 - 000001";
    $idAtividadeTDC_CPU_COMFU = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TDC_CPU_COMFU)->value('id');
    $idAnaliseTDC_CPU_COMFU = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTDC_CPU_COMFU)->max('id');
    $statusTDC_CPU_COMFU = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTDC_CPU_COMFU)->value('status_id');
    //TDC (CPU STANDAR) / BFI
    $tag_TDC_CPU_STANDAR_BFI = "TE 72 300 310 802 000 - 000002";
    $idAtividadeTDC_CPU_STANDAR_BFI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TDC_CPU_STANDAR_BFI)->value('id');
    $idAnaliseTDC_CPU_STANDAR_BFI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTDC_CPU_STANDAR_BFI)->max('id');
    $statusTDC_CPU_STANDAR_BFI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTDC_CPU_STANDAR_BFI)->value('status_id');
    //MEMÓRIA DE DADOS GLOBAL
    $tag_MDG = "TE 72 300 310 802 000 - 000003";
    $idAtividadeMDG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MDG)->value('id');
    $idAnaliseMDG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMDG)->max('id');
    $statusMDG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMDG)->value('status_id');
    //ABB LOAD CELL
    $tag_ABB_LOAD_CELL = "TE 72 300 310 802 000 - 000004";
    $idAtividadeABB_LOAD_CELL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ABB_LOAD_CELL)->value('id');
    $idAnaliseABB_LOAD_CELL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeABB_LOAD_CELL)->max('id');
    $statusABB_LOAD_CELL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseABB_LOAD_CELL)->value('status_id');
    //SISTEMA DE MEDIÇÃO DA VELOCIDADE DO LASER
    $tag_SMVL = "TE 72 300 310 802 000 - 000005";
    $idAtividadeSMVL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SMVL)->value('id');
    $idAnaliseSMVL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSMVL)->max('id');
    $statusSMVL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSMVL)->value('status_id');
    //CONTROLE DO INVERSOR TR2
    $tag_CI_TR2 = "TE 72 300 310 802 000 - 000018";
    $idAtividadeCI_TR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CI_TR2)->value('id');
    $idAnaliseCI_TR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCI_TR2)->max('id');
    $statusCI_TR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCI_TR2)->value('status_id');
    //CONTROLE DO INVERSOR MS
    $tag_CI_MS = "TE 72 300 310 802 000 - 000019";
    $idAtividadeCI_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CI_MS)->value('id');
    $idAnaliseCI_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCI_MS)->max('id');
    $statusCI_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCI_MS)->value('status_id');
    //CONTROLE DO INVERSOR TR1
    $tag_CI_TR1 = "TE 72 300 310 802 000 - 000020";
    $idAtividadeCI_TR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CI_TR1)->value('id');
    $idAnaliseCI_TR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCI_TR1)->max('id');
    $statusCI_TR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCI_TR1)->value('status_id');

    if ($statusPE_06B5CC01 == 5 || $statusPE_06B5CC02 == 5 || $statusPE_06B5CC03 == 5 || $statusPE_06B5CC04 == 5 || $statusS7_400_CPU_MTX == 5 || $statusS7_400_CPU_EMU == 5 ||
    $statusOS6_OS7_ES3 == 5 || $statusTDC_CPU_COMFU == 5 || $statusTDC_CPU_STANDAR_BFI == 5 || $statusMDG == 5 || $statusABB_LOAD_CELL == 5 ||
    $statusSMVL == 5 || $statusCI_TR2 == 5 || $statusCI_MS == 5 || $statusCI_TR1 == 5) {
      $laminador_salaPLC_status = 5;
    } elseif ($statusPE_06B5CC01 == 4 || $statusPE_06B5CC02 == 4 || $statusPE_06B5CC03 == 4 || $statusPE_06B5CC04 == 4 || $statusS7_400_CPU_MTX == 4 || $statusS7_400_CPU_EMU == 4 ||
    $statusOS6_OS7_ES3 == 4 || $statusTDC_CPU_COMFU == 4 || $statusTDC_CPU_STANDAR_BFI == 4 || $statusMDG == 4 || $statusABB_LOAD_CELL == 4 ||
    $statusSMVL == 4 || $statusCI_TR2 == 4 || $statusCI_MS == 4 || $statusCI_TR1 == 4) {
      $laminador_salaPLC_status = 4;
    } elseif ($statusPE_06B5CC01 == 3 || $statusPE_06B5CC02 == 3 || $statusPE_06B5CC03 == 3 || $statusPE_06B5CC04 == 3 || $statusS7_400_CPU_MTX == 3 || $statusS7_400_CPU_EMU == 3 ||
    $statusOS6_OS7_ES3 == 3 || $statusTDC_CPU_COMFU == 3 || $statusTDC_CPU_STANDAR_BFI == 3 || $statusMDG == 3 || $statusABB_LOAD_CELL == 3 ||
    $statusSMVL == 3 || $statusCI_TR2 == 3 || $statusCI_MS == 3 || $statusCI_TR1 == 3) {
      $laminador_salaPLC_status = 3;
    } else {
      $laminador_salaPLC_status = "";
    }

    return $laminador_salaPLC_status;
  }

  public static function laminador_mainDrives_Menu() {
    $laminador_mainDrives_status = "";
    //VVVF - AUXILIARES DRIVES
    //----------- NÃO CADASTRADO - RETIFICADOR 250KW - MASTER
    $tag_RM_250 = "TE 72 300 310 397 000 - 000001";
    $idAtividadeRM_250 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RM_250)->value('id');
    $idAnaliseRM_250 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRM_250)->max('id');
    $statusRM_250 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRM_250)->value('status_id');
    //SISTEMA DE ALIMENTAÇÃO DE EMULSÃO - BOMBA #1
    $tag_SAE_B_1 = "TE 72 300 310 397 000 - 000002";
    $idAtividadeSAE_B_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAE_B_1)->value('id');
    $idAnaliseSAE_B_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAE_B_1)->max('id');
    $statusSAE_B_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAE_B_1)->value('status_id');
    //EMULSION SYSTEM RETURN PUMPS #2
    $tag_ESRP_2 = "TE 72 300 310 397 000 - 000072";
    $idAtividadeESRP_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ESRP_2)->value('id');
    $idAnaliseESRP_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESRP_2)->max('id');
    $statusESRP_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESRP_2)->value('status_id');
    //EMULSION SYSTEM RETURN PUMPS #1
    $tag_ESRP_1 = "TE 72 300 310 397 000 - 000003";
    $idAtividadeESRP_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ESRP_1)->value('id');
    $idAnaliseESRP_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESRP_1)->max('id');
    $statusESRP_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESRP_1)->value('status_id');
    //ROLO DEFLETOR DE ENTRADA
    $tag_RDE = "TE 72 300 310 397 000 - 000004";
    $idAtividadeRDE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDE)->value('id');
    $idAnaliseRDE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDE)->max('id');
    $statusRDE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDE)->value('status_id');
    //WORK ROLL CHANCING TONG TYPE CARRIAGE
    $tag_WRCTTC = "TE 72 300 310 397 000 - 000033";
    $idAtividadeWRCTTC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WRCTTC)->value('id');
    $idAnaliseWRCTTC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWRCTTC)->max('id');
    $statusWRCTTC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWRCTTC)->value('status_id');
    //WORK ROLL CHANCING SIDE SHIFTER
    $tag_WRCSS = "TE 72 300 310 397 000 - 000032";
    $idAtividadeWRCSS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WRCSS)->value('id');
    $idAnaliseWRCSS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWRCSS)->max('id');
    $statusWRCSS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWRCSS)->value('status_id');
    //WORK ROLL CHANCING UNDERCARRIAGER - 2
    $tag_WRCU_2 = "TE 72 300 310 397 000 - 000031";
    $idAtividadeWRCU_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WRCU_2)->value('id');
    $idAnaliseWRCU_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWRCU_2)->max('id');
    $statusWRCU_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWRCU_2)->value('status_id');
    //WORK ROLL CHANCING UNDERCARRIAGER - 1
    $tag_WRCU_1 = "TE 72 300 310 397 000 - 000005";
    $idAtividadeWRCU_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WRCU_1)->value('id');
    $idAnaliseWRCU_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWRCU_1)->max('id');
    $statusWRCU_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWRCU_1)->value('status_id');
    //SISTEMA DE ALIMENTAÇÃO DE EMULSÃO - BOMBA #2
    $tag_SAE_B_2 = "TE 72 300 310 397 000 - 000008";
    $idAtividadeSAE_B_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAE_B_2)->value('id');
    $idAnaliseSAE_B_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAE_B_2)->max('id');
    $statusSAE_B_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAE_B_2)->value('status_id');
    //MÓS FEED PUMPS #1
    $tag_MFP_1 = "TE 72 300 310 397 000 - 000009";
    $idAtividadeMFP_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MFP_1)->value('id');
    $idAnaliseMFP_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMFP_1)->max('id');
    $statusMFP_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMFP_1)->value('status_id');
    //MÓS FEED PUMPS #2
    $tag_MFP_2 = "TE 72 300 310 397 000 - 000073";
    $idAtividadeMFP_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MFP_2)->value('id');
    $idAnaliseMFP_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMFP_2)->max('id');
    $statusMFP_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMFP_2)->value('status_id');
    //ZÓS FEED PUMPS #1
    $tag_ZFP_1 = "TE 72 300 310 397 000 - 000074";
    $idAtividadeZFP_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ZFP_1)->value('id');
    $idAnaliseZFP_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZFP_1)->max('id');
    $statusZFP_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZFP_1)->value('status_id');
    //ZÓS FEED PUMPS #2
    $tag_ZFP_2 = "TE 72 300 310 397 000 - 000075";
    $idAtividadeZFP_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ZFP_2)->value('id');
    $idAnaliseZFP_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZFP_2)->max('id');
    $statusZFP_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZFP_2)->value('status_id');
    //ROLO DEFLETOR DE SAIDA 1
    $tag_RDS_1 = "TE 72 300 310 397 000 - 000010";
    $idAtividadeRDS_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDS_1)->value('id');
    $idAnaliseRDS_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDS_1)->max('id');
    $statusRDS_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDS_1)->value('status_id');
    //ROLO DEFLETOR DE SAIDA 2
    $tag_RDS_2 = "TE 72 300 310 397 000 - 000007";
    $idAtividadeRDS_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDS_2)->value('id');
    $idAnaliseRDS_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDS_2)->max('id');
    $statusRDS_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDS_2)->value('status_id');
    //ROLO DEFLETOR DE SAIDA 3
    $tag_RDS_3 = "TE 72 300 310 397 000 - 000038";
    $idAtividadeRDS_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDS_3)->value('id');
    $idAnaliseRDS_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDS_3)->max('id');
    $statusRDS_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDS_3)->value('status_id');
    //ROLO DEFLETOR DE SAIDA 4
    $tag_RDS_4 = "TE 72 300 310 397 000 - 000039";
    $idAtividadeRDS_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDS_4)->value('id');
    $idAnaliseRDS_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDS_4)->max('id');
    $statusRDS_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDS_4)->value('status_id');
    //INSPECTION REEL EXIT SECTION
    $tag_IRES = "TE 72 300 310 397 000 - 000011";
    $idAtividadeIRES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_IRES)->value('id');
    $idAnaliseIRES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeIRES)->max('id');
    $statusIRES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseIRES)->value('status_id');
    //PINCH ROLL UNIT EXIT SECTION
    $tag_PRUES = "TE 72 300 310 397 000 - 000044";
    $idAtividadePRUES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRUES)->value('id');
    $idAnalisePRUES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRUES)->max('id');
    $statusPRUES = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRUES)->value('status_id');
    //MAIN DRIVE - ROLO TENSIONADOR TR1
    $tag_RT_TR1 = "TE 72 300 310 397 000 - 000013";
    $idAtividadeRT_TR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RT_TR1)->value('id');
    $idAnaliseRT_TR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRT_TR1)->max('id');
    $statusRT_TR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRT_TR1)->value('status_id');
    //ALIMENTAÇÃO TR1
    $tag_A_TR1 = "TE 72 300 310 397 000 - 000014";
    $idAtividadeA_TR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_TR1)->value('id');
    $idAnaliseA_TR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_TR1)->max('id');
    $statusA_TR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_TR1)->value('status_id');
    //AUXILIARES TR1
    $tag_AUX_TR1 = "TE 72 300 310 397 000 - 000015";
    $idAtividadeAUX_TR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX_TR1)->value('id');
    $idAnaliseAUX_TR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX_TR1)->max('id');
    $statusAUX_TR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX_TR1)->value('status_id');
    //ALIMENTAÇÃO MS
    $tag_A_MS = "TE 72 300 310 397 000 - 000016";
    $idAtividadeA_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_MS)->value('id');
    $idAnaliseA_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_MS)->max('id');
    $statusA_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_MS)->value('status_id');
    //AUXILIARES MS
    $tag_AUX_MS = "TE 72 300 310 397 000 - 000017";
    $idAtividadeAUX_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX_MS)->value('id');
    $idAnaliseAUX_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX_MS)->max('id');
    $statusAUX_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX_MS)->value('status_id');
    //ROLO TENDIONADOR #2
    $tag_RT_TR2 = "TE 72 300 310 397 000 - 000018";
    $idAtividadeRT_TR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RT_TR2)->value('id');
    $idAnaliseRT_TR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRT_TR2)->max('id');
    $statusRT_TR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRT_TR2)->value('status_id');
    //ALIMENTAÇÃO TR2
    $tag_A_TR2 = "TE 72 300 310 397 000 - 000019";
    $idAtividadeA_TR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_TR2)->value('id');
    $idAnaliseA_TR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_TR2)->max('id');
    $statusA_TR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_TR2)->value('status_id');
    //AUXILIARES TR2
    $tag_AUX_TR2 = "TE 72 300 310 397 000 - 000020";
    $idAtividadeAUX_TR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX_TR2)->value('id');
    $idAnaliseAUX_TR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX_TR2)->max('id');
    $statusAUX_TR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX_TR2)->value('status_id');
    //TRANSFORMADOR AUX. TR2 16KVA
    $tag_TA_TR2_16 = "TE 72 300 310 397 000 - 000021";
    $idAtividadeTA_TR2_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TA_TR2_16)->value('id');
    $idAnaliseTA_TR2_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTA_TR2_16)->max('id');
    $statusTA_TR2_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTA_TR2_16)->value('status_id');
    //TRANSFORMADOR AUX. MS 28 KVA
    $tag_TA_MS_28 = "TE 72 300 310 397 000 - 000022";
    $idAtividadeTA_MS_28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TA_MS_28)->value('id');
    $idAnaliseTA_MS_28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTA_MS_28)->max('id');
    $statusTA_MS_28 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTA_MS_28)->value('status_id');
    //TRANSFORMADOR AUX. TR1 16KVA
    $tag_TA_TR1_16 = "TE 72 300 310 397 000 - 000023";
    $idAtividadeTA_TR1_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TA_TR1_16)->value('id');
    $idAnaliseTA_TR1_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTA_TR1_16)->max('id');
    $statusTA_TR1_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTA_TR1_16)->value('status_id');

    if ($statusRM_250 == 5 || $statusSAE_B_1 == 5 || $statusESRP_2 == 5 || $statusESRP_1 == 5 || $statusRDE == 5 || $statusWRCTTC == 5 || $statusWRCSS == 5 ||
        $statusWRCU_2 == 5 || $statusWRCU_1 == 5 || $statusSAE_B_2 == 5 || $statusMFP_1 == 5 || $statusMFP_2 == 5 || $statusZFP_1 == 5 || $statusZFP_2 == 5 ||
        $statusRDS_1 == 5 || $statusRDS_2 == 5 || $statusRDS_3 == 5 || $statusRDS_4 == 5 || $statusIRES == 5 || $statusPRUES == 5 || $statusRT_TR1 == 5 ||
        $statusA_TR1 == 5 || $statusAUX_TR1 == 5 || $statusA_MS == 5 || $statusAUX_MS == 5 || $statusRT_TR2 == 5 || $statusA_TR2 == 5 || $statusAUX_TR2 == 5 ||
        $statusTA_TR2_16 == 5 || $statusTA_MS_28 == 5 || $statusTA_TR1_16 == 5) {
      $laminador_mainDrives_status = 5;
    } elseif ($statusRM_250 == 4 || $statusSAE_B_1 == 4 || $statusESRP_2 == 4 || $statusESRP_1 == 4 || $statusRDE == 4 || $statusWRCTTC == 4 || $statusWRCSS == 4 ||
              $statusWRCU_2 == 4 || $statusWRCU_1 == 4 || $statusSAE_B_2 == 4 || $statusMFP_1 == 4 || $statusMFP_2 == 4 || $statusZFP_1 == 4 || $statusZFP_2 == 4 ||
              $statusRDS_1 == 4 || $statusRDS_2 == 4 || $statusRDS_3 == 4 || $statusRDS_4 == 4 || $statusIRES == 4 || $statusPRUES == 4 || $statusRT_TR1 == 4 ||
              $statusA_TR1 == 4 || $statusAUX_TR1 == 4 || $statusA_MS == 4 || $statusAUX_MS == 4 || $statusRT_TR2 == 4 || $statusA_TR2 == 4 || $statusAUX_TR2 == 4 ||
              $statusTA_TR2_16 == 4 || $statusTA_MS_28 == 4 || $statusTA_TR1_16 == 4) {
      $laminador_mainDrives_status = 4;
    } elseif ($statusRM_250 == 3 || $statusSAE_B_1 == 3 || $statusESRP_2 == 3 || $statusESRP_1 == 3 || $statusRDE == 3 || $statusWRCTTC == 3 || $statusWRCSS == 3 ||
              $statusWRCU_2 == 3 || $statusWRCU_1 == 3 || $statusSAE_B_2 == 3 || $statusMFP_1 == 3 || $statusMFP_2 == 3 || $statusZFP_1 == 3 || $statusZFP_2 == 3 ||
              $statusRDS_1 == 3 || $statusRDS_2 == 3 || $statusRDS_3 == 3 || $statusRDS_4 == 3 || $statusIRES == 3 || $statusPRUES == 3 || $statusRT_TR1 == 3 ||
              $statusA_TR1 == 3 || $statusAUX_TR1 == 3 || $statusA_MS == 3 || $statusAUX_MS == 3 || $statusRT_TR2 == 3 || $statusA_TR2 == 3 || $statusAUX_TR2 == 3 ||
              $statusTA_TR2_16 == 3 || $statusTA_MS_28 == 3 || $statusTA_TR1_16 == 3) {
      $laminador_mainDrives_status = 3;
    } else {
      $laminador_mainDrives_status = "";
    }

    return $laminador_mainDrives_status;
  }

  public static function laminador_payOfReel_Menu() {
    $laminador_payOfReel_status = "";
    //TOMADA AUXILIAR DE ABASTECIMENTO
    $tag_TAA = "TE 72 300 310 397 000 - 000070";
    $idAtividadeTAA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TAA)->value('id');
    $idAnaliseTAA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTAA)->max('id');
    $statusTAA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTAA)->value('status_id');
    //LINE REACTOR AUTO TRANSFORMER
    $tag_LRAT = "TE 72 300 310 397 000 - 000069";
    $idAtividadeLRAT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_LRAT)->value('id');
    $idAnaliseLRAT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLRAT)->max('id');
    $statusLRAT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLRAT)->value('status_id');
    //ALIMENTADOR DE ENTRADA UNIDADE DE REGENERAÇÃO
    $tag_AEUR = "TE 72 300 310 397 000 - 000068";
    $idAtividadeAEUR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AEUR)->value('id');
    $idAnaliseAEUR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAEUR)->max('id');
    $statusAEUR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAEUR)->value('status_id');
    //AUXILIARES
    $tag_AUX = "TE 72 300 310 397 000 - 000067";
    $idAtividadeAUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX)->value('id');
    $idAnaliseAUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX)->max('id');
    $statusAUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX)->value('status_id');
    //INVERSOR MESTRE
    $tag_IM = "TE 72 300 310 397 000 - 000066";
    $idAtividadeIM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_IM)->value('id');
    $idAnaliseIM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeIM)->max('id');
    $statusIM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseIM)->value('status_id');
    //INVERSOR ESCRAVO
    $tag_IE = "TE 72 300 310 397 000 - 000065";
    $idAtividadeIE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_IE)->value('id');
    $idAnaliseIE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeIE)->max('id');
    $statusIE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseIE)->value('status_id');

    if ($statusTAA == 5 || $statusLRAT == 5 ||  $statusAEUR == 5 || $statusAUX == 5 || $statusIM == 5 || $statusIE == 5) {
      $laminador_payOfReel_status = 5;
    } elseif ($statusTAA == 4 || $statusLRAT == 4 ||  $statusAEUR == 4 || $statusAUX == 4 || $statusIM == 4 || $statusIE == 4) {
      $laminador_payOfReel_status = 4;
    } elseif ($statusTAA == 3 || $statusLRAT == 3 ||  $statusAEUR == 3 || $statusAUX == 3 || $statusIM == 3 || $statusIE == 3) {
      $laminador_payOfReel_status = 3;
    } else {
      $laminador_payOfReel_status = "";
    }

    return $laminador_payOfReel_status;
  }

  public static function laminador_oficil_Menu() {
    $laminador_oficil_status = "";
    //WS5 - TRANSFORMADOR
    $tag_WS5_T = "TE 72 900 920 084 012 - 000001";
    $idAtividadeWS5_T = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_T)->value('id');
    $idAnaliseWS5_T = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_T)->max('id');
    $statusWS5_T = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_T)->value('status_id');
    //ALIMENTAÇÃO
    $tag_WS5_A = "TE 72 900 920 084 012 - 000002";
    $idAtividadeWS5_A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_A)->value('id');
    $idAnaliseWS5_A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_A)->max('id');
    $statusWS5_A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_A)->value('status_id');
    //SISTEMA DE ACIONAMENTO
    $tag_WS5_SA = "TE 72 900 920 084 012 - 000003";
    $idAtividadeWS5_SA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_SA)->value('id');
    $idAnaliseWS5_SA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_SA)->max('id');
    $statusWS5_SA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_SA)->value('status_id');
    //ACIONAMENTO AUXILIAR
    $tag_WS5_AAUX = "TE 72 900 920 084 012 - 000004";
    $idAtividadeWS5_AAUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_AAUX)->value('id');
    $idAnaliseWS5_AAUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_AAUX)->max('id');
    $statusWS5_AAUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_AAUX)->value('status_id');
    //SPS CNC
    $tag_WS5_SC = "TE 72 900 920 084 012 - 000005";
    $idAtividadeWS5_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_SC)->value('id');
    $idAnaliseWS5_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_SC)->max('id');
    $statusWS5_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_SC)->value('status_id');
    //CAMPO DE ENCAIXE COMPONENTES ELÉTRICOS
    $tag_WS5_CECE = "TE 72 900 920 084 012 - 000006";
    $idAtividadeWS5_CECE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_CECE)->value('id');
    $idAnaliseWS5_CECE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_CECE)->max('id');
    $statusWS5_CECE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_CECE)->value('status_id');
    //WS3 - TRANSFORMADOR
    $tag_WS3_T = "TE 72 900 910 087 012 - 000001";
    $idAtividadeWS3_T = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_T)->value('id');
    $idAnaliseWS3_T = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_T)->max('id');
    $statusWS3_T = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_T)->value('status_id');
    //ALIMENTAÇÃO
    $tag_WS3_A = "TE 72 900 910 087 012 - 000002";
    $idAtividadeWS3_A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_A)->value('id');
    $idAnaliseWS3_A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_A)->max('id');
    $statusWS3_A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_A)->value('status_id');
    //SISTEMA DE ACIONAMENTO
    $tag_WS3_SA = "TE 72 900 910 087 012 - 000003";
    $idAtividadeWS3_SA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_SA)->value('id');
    $idAnaliseWS3_SA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_SA)->max('id');
    $statusWS3_SA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_SA)->value('status_id');
    //ACIONAMENTO AUXILIAR
    $tag_WS3_AAUX = "TE 72 900 910 087 012 - 000004";
    $idAtividadeWS3_AAUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_AAUX)->value('id');
    $idAnaliseWS3_AAUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_AAUX)->max('id');
    $statusWS3_AAUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_AAUX)->value('status_id');
    //SPS CNC
    $tag_WS3_SC = "TE 72 900 910 087 012 - 000005";
    $idAtividadeWS3_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_SC)->value('id');
    $idAnaliseWS3_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_SC)->max('id');
    $statusWS3_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_SC)->value('status_id');
    //CAMPO DE ENCAIXE COMPONENTES ELÉTRICOS
    $tag_WS3_CECE = "TE 72 900 910 087 012 - 000006";
    $idAtividadeWS3_CECE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_CECE)->value('id');
    $idAnaliseWS3_CECE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_CECE)->max('id');
    $statusWS3_CECE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_CECE)->value('status_id');

    if ($statusWS5_T == 5 || $statusWS5_A == 5 || $statusWS5_SA == 5 || $statusWS5_AAUX == 5 || $statusWS5_SC == 5 || $statusWS5_CECE == 5 ||
    $statusWS3_T == 5 || $statusWS3_A == 5 || $statusWS3_SA == 5 || $statusWS3_AAUX == 5 || $statusWS3_SC == 5 || $statusWS3_CECE == 5) {
      $laminador_oficil_status = 5;
    } elseif ($statusWS5_T == 4 || $statusWS5_A == 4 || $statusWS5_SA == 4 || $statusWS5_AAUX == 4 || $statusWS5_SC == 4 || $statusWS5_CECE == 4 ||
    $statusWS3_T == 4 || $statusWS3_A == 4 || $statusWS3_SA == 4 || $statusWS3_AAUX == 4 || $statusWS3_SC == 4 || $statusWS3_CECE == 4) {
      $laminador_oficil_status = 4;
    } elseif ($statusWS5_T == 3 || $statusWS5_A == 3 || $statusWS5_SA == 3 || $statusWS5_AAUX == 3 || $statusWS5_SC == 3 || $statusWS5_CECE == 3 ||
    $statusWS3_T == 3 || $statusWS3_A == 3 || $statusWS3_SA == 3 || $statusWS3_AAUX == 3 || $statusWS3_SC == 3 || $statusWS3_CECE == 3) {
      $laminador_oficil_status = 3;
    } else {
      $laminador_oficil_status = "";
    }

    return $laminador_oficil_status;
  }

  public static function lrf_Menu() {
    $lrf_menu = "";
    $laminador_ets_status = AuxFuncRelTec::laminador_ets_Menu();
    $laminador_ccm1_status = AuxFuncRelTec::laminador_ccm1_Menu();
    //
    $laminador_ccm2_status = AuxFuncRelTec::laminador_ccm2_Menu();
    $laminador_salaPLC_status = AuxFuncRelTec::laminador_salaPLC_Menu();
    $laminador_mainDrives_status = AuxFuncRelTec::laminador_mainDrives_Menu();
    $laminador_payOfReel_status = AuxFuncRelTec::laminador_payOfReel_Menu();
    $laminador_oficil_status = AuxFuncRelTec::laminador_oficil_Menu();

    if ($laminador_ets_status == 5 || $laminador_ccm1_status == 5 || $laminador_ccm2_status == 5 ||
        $laminador_salaPLC_status == 5 || $laminador_mainDrives_status == 5 || $laminador_payOfReel_status == 5 || $laminador_oficil_status == 5) {
      $lrf_menu = 5;
    } elseif ($laminador_ets_status == 4 || $laminador_ccm1_status == 4 || $laminador_ccm2_status == 4 ||
        $laminador_salaPLC_status == 4 || $laminador_mainDrives_status == 4 || $laminador_payOfReel_status == 4 || $laminador_oficil_status == 4) {
      $lrf_menu = 4;
    } elseif ($laminador_ets_status == 3 || $laminador_ccm1_status == 3 || $laminador_ccm2_status == 3 ||
        $laminador_salaPLC_status == 3 || $laminador_mainDrives_status == 3 || $laminador_payOfReel_status == 3 || $laminador_oficil_status == 3) {
      $lrf_menu = 3;
    } else {
      $lrf_menu = "";
    }

    return $lrf_menu;
  }

    public static function lrf_normal_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lrf_linha1 = 12;
      $lrf_linha2 = 0;
      $lrf_normal = aux::GeralPorLinhaTE($atual1, 3, $lrf_linha1, $lrf_linha2);
      return $lrf_normal;
    }
    public static function lrf_alarme_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lrf_linha1 = 12;
      $lrf_linha2 = 0;
      $lrf_alarme = aux::GeralPorLinhaTE($atual1, 4, $lrf_linha1, $lrf_linha2);
      return $lrf_alarme;
    }
    public static function lrf_critico_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lrf_linha1 = 12;
      $lrf_linha2 = 0;
      $lrf_critico = aux::GeralPorLinhaTE($atual1, 5, $lrf_linha1, $lrf_linha2);
      return $lrf_critico;
    }

  //--- UTILIDADES
  public static function utilidades_ccm_Menu() {
    $utilidades_ccm_status = "";
    //BOMBA TORRE DE RESFRIAMENTO - M03
    $tag_BTR_M03 = "TE 72 700 815 020 000 - 000012";
    $idAtividadeBTR_M03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M03)->value('id');
    $idAnaliseBTR_M03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M03)->max('id');
    $statusBTR_M03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M03)->value('status_id');
    //VENTILADOR DA TORRE DE RESFRIAMENTO M01
    $tag_VTR_M01 = "TE 72 700 815 020 000 - 000015";
    $idAtividadeVTR_M01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_VTR_M01)->value('id');
    $idAnaliseVTR_M01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVTR_M01)->max('id');
    $statusVTR_M01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVTR_M01)->value('status_id');
    //VENTILADOR DA TORRE DE RESFRIAMENTO M02
    $tag_VTR_M02 = "TE 72 700 815 020 000 - 000016";
    $idAtividadeVTR_M02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_VTR_M02)->value('id');
    $idAnaliseVTR_M02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVTR_M02)->max('id');
    $statusVTR_M02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVTR_M02)->value('status_id');
    //BOMBA TORRE DE RESFRIAMENTO - M02
    $tag_BTR_M02 = "TE 72 700 815 020 000 - 000011";
    $idAtividadeBTR_M02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M02)->value('id');
    $idAnaliseBTR_M02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M02)->max('id');
    $statusBTR_M02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M02)->value('status_id');
    //BOMBA TORRE DE RESFRIAMENTO - M01
    $tag_BTR_M01 = "TE 72 700 815 020 000 - 000010";
    $idAtividadeBTR_M01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M01)->value('id');
    $idAnaliseBTR_M01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M01)->max('id');
    $statusBTR_M01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M01)->value('status_id');
    //BOMBA TORRE DE RESFRIAMENTO - M04
    $tag_BTR_M04 = "TE 72 700 815 020 000 - 000013";
    $idAtividadeBTR_M04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M04)->value('id');
    $idAnaliseBTR_M04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M04)->max('id');
    $statusBTR_M04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M04)->value('status_id');
    //BOMBA TORRE DE RESFRIAMENTO - M05
    $tag_BTR_M05 = "TE 72 700 815 020 000 - 000014";
    $idAtividadeBTR_M05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M05)->value('id');
    $idAnaliseBTR_M05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M05)->max('id');
    $statusBTR_M05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M05)->value('status_id');
    //BOMBA AGUA INDUSTRIAL - M02
    $tag_BAI_M02 = "TE 72 700 815 020 000 - 000021";
    $idAtividadeBAI_M02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BAI_M02)->value('id');
    $idAnaliseBAI_M02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAI_M02)->max('id');
    $statusBAI_M02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAI_M02)->value('status_id');
    //BOMBA ÁGUA INDUSTRIAL - M01
    $tag_BAI_M01 = "TE 72 700 815 020 000 - 000018";
    $idAtividadeBAI_M01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BAI_M01)->value('id');
    $idAnaliseBAI_M01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAI_M01)->max('id');
    $statusBAI_M01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAI_M01)->value('status_id');

    if ($statusBTR_M03 == 5 || $statusVTR_M01 == 5 || $statusVTR_M02 == 5 || $statusBTR_M02 == 5 || $statusBTR_M01 == 5 ||
        $statusBTR_M04 == 5 || $statusBTR_M05 == 5 || $statusBAI_M02 == 5 || $statusBAI_M01 == 5) {
      $utilidades_ccm_status = 5;
    } elseif ($statusBTR_M03 == 4 || $statusVTR_M01 == 4 || $statusVTR_M02 == 4 || $statusBTR_M02 == 4 || $statusBTR_M01 == 4 ||
              $statusBTR_M04 == 4 || $statusBTR_M05 == 4 || $statusBAI_M02 == 4 || $statusBAI_M01 == 4) {
      $utilidades_ccm_status = 4;
    } elseif ($statusBTR_M03 == 3 || $statusVTR_M01 == 3 || $statusVTR_M02 == 3 || $statusBTR_M02 == 3 || $statusBTR_M01 == 3 ||
              $statusBTR_M04 == 3 || $statusBTR_M05 == 3 || $statusBAI_M02 == 3 || $statusBAI_M01 == 3) {
      $utilidades_ccm_status = 3;
    } else {
      $utilidades_ccm_status = "";
    }

    return $utilidades_ccm_status;
  }

  public static function utilidades_lv460V_Menu() {
    $utilidades_lv460V_status = "";
    //COMPRESSOR 496
    $tag_C_496 = "TE 72 700 815 020 000 - 000001";
    $idAtividadeC_496 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_496)->value('id');
    $idAnaliseC_496 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_496)->max('id');
    $statusC_496 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_496)->value('status_id');
    //COMPRESSOR 491
    $tag_C_491 = "TE 72 700 815 020 000 - 000004";
    $idAtividadeC_491 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_491)->value('id');
    $idAnaliseC_491 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_491)->max('id');
    $statusC_491 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_491)->value('status_id');
    //COMPRESSOR 495
    $tag_C_495 = "TE 72 700 815 020 000 - 000007";
    $idAtividadeC_495 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_495)->value('id');
    $idAnaliseC_495 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_495)->max('id');
    $statusC_495 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_495)->value('status_id');
    //ALIMENTAÇÃO CCM DURR - SALA ELÉTRICA
    $tag_A_CCM_DURR = "TE 72 700 815 020 000 - 000002";
    $idAtividadeA_CCM_DURR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_CCM_DURR)->value('id');
    $idAnaliseA_CCM_DURR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_CCM_DURR)->max('id');
    $statusA_CCM_DURR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_CCM_DURR)->value('status_id');
    //COMPRESSOR 492
    $tag_C_492 = "TE 72 700 815 020 000 - 000005";
    $idAtividadeC_492 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_492)->value('id');
    $idAnaliseC_492 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_492)->max('id');
    $statusC_492 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_492)->value('status_id');
    //COMPRESSOR 494
    $tag_C_494 = "TE 72 700 815 020 000 - 000008";
    $idAtividadeC_494 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_494)->value('id');
    $idAnaliseC_494 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_494)->max('id');
    $statusC_494 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_494)->value('status_id');
    //ALIMENTAÇÃO CCM DEGREMONT - SALA ELÉTRICA
    $tag_A_CCM_DEGREMONT = "TE 72 700 815 020 000 - 000003";
    $idAtividadeA_CCM_DEGREMONT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_CCM_DEGREMONT)->value('id');
    $idAnaliseA_CCM_DEGREMONT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_CCM_DEGREMONT)->max('id');
    $statusA_CCM_DEGREMONT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_CCM_DEGREMONT)->value('status_id');
    //COMPRESSOR 493
    $tag_C_493 = "TE 72 700 815 020 000 - 000006";
    $idAtividadeC_493 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_493)->value('id');
    $idAnaliseC_493 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_493)->max('id');
    $statusC_493 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_493)->value('status_id');
    //COMPRESSOR 490
    $tag_C_490 = "TE 72 700 815 020 000 - 000009";
    $idAtividadeC_490 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_490)->value('id');
    $idAnaliseC_490 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_490)->max('id');
    $statusC_490 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_490)->value('status_id');

    if ($statusC_496 == 5 || $statusC_491 == 5 || $statusC_495 == 5 || $statusA_CCM_DURR == 5 || $statusC_492 == 5 || $statusC_494 == 5 || $statusA_CCM_DEGREMONT == 5 || $statusC_493 == 5 || $statusC_490 == 5) {
      $utilidades_lv460V_status = 5;
    } elseif ($statusC_496 == 4 || $statusC_491 == 4 || $statusC_495 == 4 || $statusA_CCM_DURR == 4 || $statusC_492 == 4 || $statusC_494 == 4 || $statusA_CCM_DEGREMONT == 4 || $statusC_493 == 4 || $statusC_490 == 4) {
      $utilidades_lv460V_status = 4;
    } elseif ($statusC_496 == 3 || $statusC_491 == 3 || $statusC_495 == 3 || $statusA_CCM_DURR == 3 || $statusC_492 == 3 || $statusC_494 == 3 || $statusA_CCM_DEGREMONT == 3 || $statusC_493 == 3 || $statusC_490 == 3) {
      $utilidades_lv460V_status = 3;
    } else {
      $utilidades_lv460V_status = "";
    }

    return $utilidades_lv460V_status;
  }

  public static function utilidades_salaCompressores_Menu() {
    $utilidades_salaCompressores_status = "";
    //SALA DOS COMPRESSORES UTILIDADES - COMPRESSOR 494
    $tag_C_494 = "TE 72 700 775 050 000 - 000001";
    $idAtividadeC_494 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_494)->value('id');
    $idAnaliseC_494 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_494)->max('id');
    $statusC_494 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_494)->value('status_id');
    //COMPRESSOR 495
    $tag_C_495 = "TE 72 700 775 060 000 - 000001";
    $idAtividadeC_495 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_495)->value('id');
    $idAnaliseC_495 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_495)->max('id');
    $statusC_495 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_495)->value('status_id');
    //COMPRESSOR 493
    $tag_C_493 = "TE 72 700 775 040 000 - 000001";
    $idAtividadeC_493 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_493)->value('id');
    $idAnaliseC_493 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_493)->max('id');
    $statusC_493 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_493)->value('status_id');
    //COMPRESSOR 490
    $tag_C_490 = "TE 72 700 775 010 000 - 000001";
    $idAtividadeC_490 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_490)->value('id');
    $idAnaliseC_490 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_490)->max('id');
    $statusC_490 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_490)->value('status_id');
    //COMPRESSOR 491
    $tag_C_491 = "TE 72 700 775 020 000 - 000001";
    $idAtividadeC_491 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_491)->value('id');
    $idAnaliseC_491 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_491)->max('id');
    $statusC_491 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_491)->value('status_id');
    //COMPRESSOR 492
    $tag_C_492 = "TE 72 700 775 030 000 - 000001";
    $idAtividadeC_492 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_492)->value('id');
    $idAnaliseC_492 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_492)->max('id');
    $statusC_492 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_492)->value('status_id');
    //COMPRESSOR 496
    $tag_C_496 = "TE 72 700 775 130 000 - 000001";
    $idAtividadeC_496 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_496)->value('id');
    $idAnaliseC_496 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_496)->max('id');
    $statusC_496 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_496)->value('status_id');
    //SALA DOS COMPRESSORES - CENTRO DE SERVIÇOS - COMPRESSOR 497 - CENTRO DE SERVIÇOS
    $tag_C_497 = "TE 72 700 775 120 000 - 000001";
    $idAtividadeC_497 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_497)->value('id');
    $idAnaliseC_497 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_497)->max('id');
    $statusC_497 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_497)->value('status_id');
    //COMPRESSOR 498 - CENTRO DE SERVIÇOS
    $tag_C_498 = "TE 72 700 775 080 000 - 000001";
    $idAtividadeC_498 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_498)->value('id');
    $idAnaliseC_498 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_498)->max('id');
    $statusC_498 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_498)->value('status_id');

    if ($statusC_494 == 5 || $statusC_495 == 5 || $statusC_493 == 5 || $statusC_490 == 5 || $statusC_491 == 5 || $statusC_492 == 5 || $statusC_496 == 5 || $statusC_497 == 5 || $statusC_498 == 5) {
      $utilidades_salaCompressores_status = 5;
    } elseif ($statusC_494 == 4 || $statusC_495 == 4 || $statusC_493 == 4 || $statusC_490 == 4 || $statusC_491 == 4 || $statusC_492 == 4 || $statusC_496 == 4 || $statusC_497 == 4 || $statusC_498 == 4) {
      $utilidades_salaCompressores_status = 4;
    } elseif ($statusC_494 == 3 || $statusC_495 == 3 || $statusC_493 == 3 || $statusC_490 == 3 || $statusC_491 == 3 || $statusC_492 == 3 || $statusC_496 == 3 || $statusC_497 == 3 || $statusC_498 == 3) {
      $utilidades_salaCompressores_status = 3;
    } else {
      $utilidades_salaCompressores_status = "";
    }

    return $utilidades_salaCompressores_status;
  }

  public static function utilidades_subestacao_Menu() {
    $utilidades_subestacao_status = "";
    //53
    $tag_uti_53 = " TE 72 700 750 020 000 - 000003";
    $idAtividade_53 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_53)->value('id');
    $idAnalise_53 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_53)->max('id');
    $status_53 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_53)->value('status_id');
    //56
    $tag_uti_56 = "TE 72 700 750 020 001 - 000003";
    $idAtividade_56 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_56)->value('id');
    $idAnalise_56 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_56)->max('id');
    $status_56 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_56)->value('status_id');
    //59
    $tag_uti_59 = "TE 72 700 750 020 001 - 000006";
    $idAtividade_59 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_59)->value('id');
    $idAnalise_59 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_59)->max('id');
    $status_59 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_59)->value('status_id');
    //62
    $tag_uti_62 = "TE 72 700 750 020 004 - 000001";
    $idAtividade_62 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_62)->value('id');
    $idAnalise_62 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_62)->max('id');
    $status_62 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_62)->value('status_id');
    //65
    $tag_uti_65 = "TE 72 700 750 020 004 - 000002";
    $idAtividade_65 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_65)->value('id');
    $idAnalise_65 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_65)->max('id');
    $status_65 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_65)->value('status_id');
    //68
    $tag_uti_68 = "TE 72 700 750 020 005 - 000003";
    $idAtividade_68 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_68)->value('id');
    $idAnalise_68 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_68)->max('id');
    $status_68 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_68)->value('status_id');
    //71
    $tag_uti_71 = "TE 72 700 750 020 005 - 000006";
    $idAtividade_71 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_71)->value('id');
    $idAnalise_71 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_71)->max('id');
    $status_71 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_71)->value('status_id');
    //74
    $tag_uti_74 = "TE 72 700 750 020 008 - 000001";
    $idAtividade_74 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_74)->value('id');
    $idAnalise_74 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_74)->max('id');
    $status_74 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_74)->value('status_id');
    //77
    $tag_uti_77 = "TE 72 700 750 020 013 - 000001";
    $idAtividade_77 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_77)->value('id');
    $idAnalise_77 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_77)->max('id');
    $status_77 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_77)->value('status_id');
    //80
    $tag_uti_80 = "TE 72 700 750 020 054 - 000001";
    $idAtividade_80 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_80)->value('id');
    $idAnalise_80 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_80)->max('id');
    $status_80 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_80)->value('status_id');
    //79
    $tag_uti_79 = "TE 72 700 750 020 053 - 000001";
    $idAtividade_79 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_79)->value('id');
    $idAnalise_79 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_79)->max('id');
    $status_79 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_79)->value('status_id');
    //73
    $tag_uti_73 = "TE 72 700 750 020 007 - 000001";
    $idAtividade_73 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_73)->value('id');
    $idAnalise_73 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_73)->max('id');
    $status_73 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_73)->value('status_id');
    //70
    $tag_uti_70 = "TE 72 700 750 020 005 - 000005";
    $idAtividade_70 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_70)->value('id');
    $idAnalise_70 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_70)->max('id');
    $status_70 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_70)->value('status_id');
    //67
    $tag_uti_67 = "TE 72 700 750 020 005 - 000002";
    $idAtividade_67 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_67)->value('id');
    $idAnalise_67 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_67)->max('id');
    $status_67 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_67)->value('status_id');
    //64
    $tag_uti_64 = "TE 72 700 750 020 003 - 000002";
    $idAtividade_64 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_64)->value('id');
    $idAnalise_64 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_64)->max('id');
    $status_64 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_64)->value('status_id');
    //61
    $tag_uti_61 = "TE 72 700 750 020 003 - 000001";
    $idAtividade_61 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_61)->value('id');
    $idAnalise_61 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_61)->max('id');
    $status_61 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_61)->value('status_id');
    //58
    $tag_uti_58 = "TE 72 700 750 020 001 - 000005";
    $idAtividade_58 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_58)->value('id');
    $idAnalise_58 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_58)->max('id');
    $status_58 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_58)->value('status_id');
    //55
    $tag_uti_55 = "TE 72 700 750 020 001 - 000002";
    $idAtividade_55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_55)->value('id');
    $idAnalise_55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_55)->max('id');
    $status_55 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_55)->value('status_id');
    //52
    $tag_uti_52 = "TE 72 700 775 080 000 - 000001";
    $idAtividade_52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_52)->value('id');
    $idAnalise_52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_52)->max('id');
    $status_52 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_52)->value('status_id');
    //78
    $tag_uti_78 = "TE 72 700 750 020 052 - 000001";
    $idAtividade_78 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_78)->value('id');
    $idAnalise_78 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_78)->max('id');
    $status_78 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_78)->value('status_id');
    //76
    $tag_uti_76 = "TE 72 700 750 020 012 - 000001";
    $idAtividade_76 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_76)->value('id');
    $idAnalise_76 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_76)->max('id');
    $status_76 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_76)->value('status_id');
    //75
    $tag_uti_75 = "TE 72 700 775 080 000 - 000001";
    $idAtividade_75 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_75)->value('id');
    $idAnalise_75 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_75)->max('id');
    $status_75 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_75)->value('status_id');
    //72
    $tag_uti_72 = "TE 72 700 750 020 006 - 000001";
    $idAtividade_72 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_72)->value('id');
    $idAnalise_72 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_72)->max('id');
    $status_72 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_72)->value('status_id');
    //69
    $tag_uti_69 = "TE 72 700 750 020 005 - 000004";
    $idAtividade_69 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_69)->value('id');
    $idAnalise_69 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_69)->max('id');
    $status_69 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_69)->value('status_id');
    //66
    $tag_uti_66 = "TE 72 700 750 020 005 - 000001";
    $idAtividade_66 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_66)->value('id');
    $idAnalise_66 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_66)->max('id');
    $status_66 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_66)->value('status_id');
    //63
    $tag_uti_63 = "TE 72 700 750 020 002 - 000002";
    $idAtividade_63 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_63)->value('id');
    $idAnalise_63 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_63)->max('id');
    $status_63 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_63)->value('status_id');
    //60
    $tag_uti_60 = "TE 72 700 750 020 002 - 000001";
    $idAtividade_60 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_60)->value('id');
    $idAnalise_60 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_60)->max('id');
    $status_60 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_60)->value('status_id');
    //57
    $tag_uti_57 = "TE 72 700 750 020 001 - 000004";
    $idAtividade_57 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_57)->value('id');
    $idAnalise_57 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_57)->max('id');
    $status_57 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_57)->value('status_id');
    //54
    $tag_uti_54 = "TE 72 700 750 020 001 - 000001";
    $idAtividade_54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_54)->value('id');
    $idAnalise_54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_54)->max('id');
    $status_54 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_54)->value('status_id');
    //51
    $tag_uti_51 = "TE 72 700 775 080 000 - 000001";
    $idAtividade_51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_51)->value('id');
    $idAnalise_51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_51)->max('id');
    $status_51 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_51)->value('status_id');
    //3
    $tag_uti_3 = "TE 72 700 750 005 003 - 000001";
    $idAtividade_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_3)->value('id');
    $idAnalise_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_3)->max('id');
    $status_3 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_3)->value('status_id');
    //6
    $tag_uti_6 = "TE 72 700 750 005 000 - 000003";
    $idAtividade_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_6)->value('id');
    $idAnalise_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_6)->max('id');
    $status_6 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_6)->value('status_id');
    //9
    $tag_uti_9 = "TE 72 700 750 005 004 - 000003";
    $idAtividade_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_9)->value('id');
    $idAnalise_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_9)->max('id');
    $status_9 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_9)->value('status_id');
    //12
    $tag_uti_12 = "TE 72 700 750 005 004 - 000006";
    $idAtividade_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_12)->value('id');
    $idAnalise_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_12)->max('id');
    $status_12 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_12)->value('status_id');
    //15
    $tag_uti_15 = "TE 72 700 750 010 009 - 000001";
    $idAtividade_15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_15)->value('id');
    $idAnalise_15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_15)->max('id');
    $status_15 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_15)->value('status_id');
    //21
    $tag_uti_21 = "TE 72 700 750 010 000 - 000003";
    $idAtividade_21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_21)->value('id');
    $idAnalise_21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_21)->max('id');
    $status_21 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_21)->value('status_id');
    //26
    $tag_uti_26 = "TE 72 700 750 015 001 - 000003";
    $idAtividade_26 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_26)->value('id');
    $idAnalise_26 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_26)->max('id');
    $status_26 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_26)->value('status_id');
    //29
    $tag_uti_29 = "TE 72 700 750 015 001 - 000006";
    $idAtividade_29 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_29)->value('id');
    $idAnalise_29 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_29)->max('id');
    $status_29 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_29)->value('status_id');
    //32
    $tag_uti_32 = "TE 72 700 750 015 004 - 000001";
    $idAtividade_32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_32)->value('id');
    $idAnalise_32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_32)->max('id');
    $status_32 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_32)->value('status_id');
    //35
    $tag_uti_35 = "TE 72 700 750 015 004 - 000002";
    $idAtividade_35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_35)->value('id');
    $idAnalise_35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_35)->max('id');
    $status_35 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_35)->value('status_id');
    //38
    $tag_uti_38 = "TE 72 700 750 015 005 - 000003";
    $idAtividade_38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_38)->value('id');
    $idAnalise_38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_38)->max('id');
    $status_38 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_38)->value('status_id');
    //41
    $tag_uti_41 = "TE 72 700 750 015 005 - 000006";
    $idAtividade_41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_41)->value('id');
    $idAnalise_41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_41)->max('id');
    $status_41 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_41)->value('status_id');
    //44
    $tag_uti_44 = "TE 72 700 750 015 008 - 000001";
    $idAtividade_44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_44)->value('id');
    $idAnalise_44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_44)->max('id');
    $status_44 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_44)->value('status_id');
    //47
    $tag_uti_47 = "TE 72 700 750 015 013 - 000001";
    $idAtividade_47 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_47)->value('id');
    $idAnalise_47 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_47)->max('id');
    $status_47 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_47)->value('status_id');
    //50
    $tag_uti_50 = "TE 72 700 750 015 054 - 000001";
    $idAtividade_50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_50)->value('id');
    $idAnalise_50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_50)->max('id');
    $status_50 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_50)->value('status_id');
    //49
    $tag_uti_49 = "TE 72 700 750 015 053 - 000001";
    $idAtividade_49 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_49)->value('id');
    $idAnalise_49 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_49)->max('id');
    $status_49 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_49)->value('status_id');
    //43
    $tag_uti_43 = "TE 72 700 750 015 007 - 000001";
    $idAtividade_43 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_43)->value('id');
    $idAnalise_43 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_43)->max('id');
    $status_43 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_43)->value('status_id');
    //40
    $tag_uti_40 = "TE 72 700 750 015 005 - 000005";
    $idAtividade_40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_40)->value('id');
    $idAnalise_40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_40)->max('id');
    $status_40 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_40)->value('status_id');
    //37
    $tag_uti_37 = "TE 72 700 750 015 005 - 000002";
    $idAtividade_37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_37)->value('id');
    $idAnalise_37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_37)->max('id');
    $status_37 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_37)->value('status_id');
    //34
    $tag_uti_34 = "TE 72 700 750 015 003 - 000002";
    $idAtividade_34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_34)->value('id');
    $idAnalise_34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_34)->max('id');
    $status_34 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_34)->value('status_id');
    //31
    $tag_uti_31 = "TE 72 700 750 015 003 - 000001";
    $idAtividade_31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_31)->value('id');
    $idAnalise_31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_31)->max('id');
    $status_31 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_31)->value('status_id');
    //28
    $tag_uti_28 = "TE 72 700 775 080 000 - 000001";
    $idAtividade_28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_28)->value('id');
    $idAnalise_28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_28)->max('id');
    $status_28 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_28)->value('status_id');
    //25
    $tag_uti_25 = "TE 72 700 750 015 001 - 000002";
    $idAtividade_25 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_25)->value('id');
    $idAnalise_25 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_25)->max('id');
    $status_25 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_25)->value('status_id');
    //20
    $tag_uti_20 = "TE 72 700 750 010 000 - 000002";
    $idAtividade_20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_20)->value('id');
    $idAnalise_20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_20)->max('id');
    $status_20 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_20)->value('status_id');
    //14
    $tag_uti_14 = "TE 72 700 750 010 008 - 000001";
    $idAtividade_14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_14)->value('id');
    $idAnalise_14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_14)->max('id');
    $status_14 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_14)->value('status_id');
    //11
    $tag_uti_11 = "TE 72 700 750 005 004 - 000005";
    $idAtividade_11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_11)->value('id');
    $idAnalise_11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_11)->max('id');
    $status_11 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_11)->value('status_id');
    //8
    $tag_uti_8 = "TE 72 700 750 005 004 - 000002";
    $idAtividade_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_8)->value('id');
    $idAnalise_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_8)->max('id');
    $status_8 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_8)->value('status_id');
    //5
    $tag_uti_5 = "TE 72 700 750 005 000 - 000002";
    $idAtividade_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_5)->value('id');
    $idAnalise_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_5)->max('id');
    $status_5 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_5)->value('status_id');
    //2
    $tag_uti_2 = "TE 72 700 750 005 002 - 000001";
    $idAtividade_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_2)->value('id');
    $idAnalise_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_2)->max('id');
    $status_2 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_2)->value('status_id');
    //46
    $tag_uti_46 = "TE 72 700 750 015 012 - 000001";
    $idAtividade_46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_46)->value('id');
    $idAnalise_46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_46)->max('id');
    $status_46 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_46)->value('status_id');
    //48
    $tag_uti_48 = "TE 72 700 750 015 052 - 000001";
    $idAtividade_48 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_48)->value('id');
    $idAnalise_48 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_48)->max('id');
    $status_48 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_48)->value('status_id');
    //45
    $tag_uti_45 = "TE 72 700 750 015 011 - 000001";
    $idAtividade_45 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_45)->value('id');
    $idAnalise_45 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_45)->max('id');
    $status_45 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_45)->value('status_id');
    //42
    $tag_uti_42 = "TE 72 700 750 015 006 - 000001";
    $idAtividade_42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_42)->value('id');
    $idAnalise_42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_42)->max('id');
    $status_42 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_42)->value('status_id');
    //39
    $tag_uti_39 = "TE 72 700 750 015 005 - 000004";
    $idAtividade_39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_39)->value('id');
    $idAnalise_39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_39)->max('id');
    $status_39 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_39)->value('status_id');
    //36
    $tag_uti_36 = "TE 72 700 750 015 005 - 000001";
    $idAtividade_36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_36)->value('id');
    $idAnalise_36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_36)->max('id');
    $status_36 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_36)->value('status_id');
    //33
    $tag_uti_33 = "TE 72 700 750 015 002 - 000002";
    $idAtividade_33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_33)->value('id');
    $idAnalise_33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_33)->max('id');
    $status_33 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_33)->value('status_id');
    //30
    $tag_uti_30 = "TE 72 700 750 015 002 - 000001";
    $idAtividade_30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_30)->value('id');
    $idAnalise_30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_30)->max('id');
    $status_30 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_30)->value('status_id');
    //27
    $tag_uti_27 = "TE 72 700 750 015 001 - 000004";
    $idAtividade_27 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_27)->value('id');
    $idAnalise_27 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_27)->max('id');
    $status_27 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_27)->value('status_id');
    //24
    $tag_uti_24 = "TE 72 700 750 015 001 - 000001";
    $idAtividade_24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_24)->value('id');
    $idAnalise_24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_24)->max('id');
    $status_24 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_24)->value('status_id');
    //23
    $tag_uti_23 = "TE 72 700 750 010 000 - 000005";
    $idAtividade_23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_23)->value('id');
    $idAnalise_23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_23)->max('id');
    $status_23 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_23)->value('status_id');
    //22
    $tag_uti_22 = "TE 72 700 750 010 000 - 000004";
    $idAtividade_22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_22)->value('id');
    $idAnalise_22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_22)->max('id');
    $status_22 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_22)->value('status_id');
    //19
    $tag_uti_19 = "TE 72 700 750 010 000 - 000001";
    $idAtividade_19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_19)->value('id');
    $idAnalise_19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_19)->max('id');
    $status_19 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_19)->value('status_id');
    //13
    $tag_uti_13 = "TE 72 700 750 010 007 - 000001";
    $idAtividade_13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_13)->value('id');
    $idAnalise_13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_13)->max('id');
    $status_13 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_13)->value('status_id');
    //10
    $tag_uti_10 = "TE 72 700 750 005 004 - 000004";
    $idAtividade_10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_10)->value('id');
    $idAnalise_10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_10)->max('id');
    $status_10 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_10)->value('status_id');
    //7
    $tag_uti_7 = "TE 72 700 750 005 004 - 000001";
    $idAtividade_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_7)->value('id');
    $idAnalise_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_7)->max('id');
    $status_7 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_7)->value('status_id');
    //4
    $tag_uti_4 = "TE 72 700 750 005 000 - 000001";
    $idAtividade_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_4)->value('id');
    $idAnalise_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_4)->max('id');
    $status_4 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_4)->value('status_id');
    //1
    $tag_uti_1 = "TE 72 700 750 005 001 - 000001";
    $idAtividade_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_1)->value('id');
    $idAnalise_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_1)->max('id');
    $status_1 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_1)->value('status_id');
    //16
    $tag_uti_16 = "TE 72 700 750 010 014 - 000001";
    $idAtividade_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_16)->value('id');
    $idAnalise_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_16)->max('id');
    $status_16 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_16)->value('status_id');
    //17
    $tag_uti_17 = "TE 72 700 750 010 015 - 000001";
    $idAtividade_17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_17)->value('id');
    $idAnalise_17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_17)->max('id');
    $status_17 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_17)->value('status_id');
    //18
    $tag_uti_18 = "TE 72 700 750 010 016 - 000001";
    $idAtividade_18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_18)->value('id');
    $idAnalise_18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_18)->max('id');
    $status_18 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_18)->value('status_id');

    if ($status_53 == 5 || $status_56 == 5 || $status_59 == 5 || $status_62 == 5 || $status_65 == 5 || $status_68 == 5 ||
    $status_71 == 5 || $status_74 == 5 || $status_77 == 5 || $status_80 == 5 || $status_79 == 5 || $status_73 == 5 ||
    $status_70 == 5 || $status_67 == 5 || $status_64 == 5 || $status_61 == 5 || $status_58 == 5 || $status_55 == 5 ||
    $status_52 == 5 || $status_78 == 5 || $status_76 == 5 || $status_75 == 5 || $status_72 == 5 || $status_69 == 5 ||
    $status_66 == 5 || $status_63 == 5 || $status_60 == 5 || $status_57 == 5 || $status_54 == 5 || $status_51 == 5 ||
    $status_3 == 5 || $status_6 == 5 || $status_9 == 5 || $status_12 == 5 || $status_15 == 5 || $status_21 == 5 ||
    $status_26 == 5 || $status_29 == 5 || $status_32 == 5 || $status_35 == 5 || $status_38 == 5 || $status_41 == 5 ||
    $status_44 == 5 || $status_47 == 5 || $status_50 == 5 || $status_49 == 5 || $status_43 == 5 || $status_40 == 5 ||
    $status_37 == 5 || $status_34 == 5 || $status_31 == 5 || $status_28 == 5 || $status_25 == 5 || $status_20 == 5 ||
    $status_14 == 5 || $status_11 == 5 || $status_8 == 5 || $status_5 == 5 || $status_2 == 5 || $status_46 == 5 ||
    $status_48 == 5 || $status_45 == 5 || $status_42 == 5 || $status_39 == 5 || $status_36 == 5 || $status_33 == 5 ||
    $status_30 == 5 || $status_27 == 5 || $status_24 == 5 || $status_23 == 5 || $status_22 == 5 || $status_19 == 5 ||
    $status_13 == 5 || $status_10 == 5 || $status_7 == 5 || $status_4 == 5 || $status_1 == 5 || $status_16 == 5 ||
    $status_17 == 5 || $status_18 == 5) {
      $utilidades_subestacao_status = 5;
    } elseif ($status_53 == 4 || $status_56 == 4 || $status_59 == 4 || $status_62 == 4 || $status_65 == 4 || $status_68 == 4 ||
    $status_71 == 4 || $status_74 == 4 || $status_77 == 4 || $status_80 == 4 || $status_79 == 4 || $status_73 == 4 ||
    $status_70 == 4 || $status_67 == 4 || $status_64 == 4 || $status_61 == 4 || $status_58 == 4 || $status_55 == 4 ||
    $status_52 == 4 || $status_78 == 4 || $status_76 == 4 || $status_75 == 4 || $status_72 == 4 || $status_69 == 4 ||
    $status_66 == 4 || $status_63 == 4 || $status_60 == 4 || $status_57 == 4 || $status_54 == 4 || $status_51 == 4 ||
    $status_3 == 4 || $status_6 == 4 || $status_9 == 4 || $status_12 == 4 || $status_15 == 4 || $status_21 == 4 ||
    $status_26 == 4 || $status_29 == 4 || $status_32 == 4 || $status_35 == 4 || $status_38 == 4 || $status_41 == 4 ||
    $status_44 == 4 || $status_47 == 4 || $status_50 == 4 || $status_49 == 4 || $status_43 == 4 || $status_40 == 4 ||
    $status_37 == 4 || $status_34 == 4 || $status_31 == 4 || $status_28 == 4 || $status_25 == 4 || $status_20 == 4 ||
    $status_14 == 4 || $status_11 == 4 || $status_8 == 4 || $status_5 == 4 || $status_2 == 4 || $status_46 == 4 ||
    $status_48 == 4 || $status_45 == 4 || $status_42 == 4 || $status_39 == 4 || $status_36 == 4 || $status_33 == 4 ||
    $status_30 == 4 || $status_27 == 4 || $status_24 == 4 || $status_23 == 4 || $status_22 == 4 || $status_19 == 4 ||
    $status_13 == 4 || $status_10 == 4 || $status_7 == 4 || $status_4 == 4 || $status_1 == 4 || $status_16 == 4 ||
    $status_17 == 4 || $status_18 == 4) {
      $utilidades_subestacao_status = 4;
    } elseif ($status_53 == 3 || $status_56 == 3 || $status_59 == 3 || $status_62 == 3 || $status_65 == 3 || $status_68 == 3 ||
    $status_71 == 3 || $status_74 == 3 || $status_77 == 3 || $status_80 == 3 || $status_79 == 3 || $status_73 == 3 ||
    $status_70 == 3 || $status_67 == 3 || $status_64 == 3 || $status_61 == 3 || $status_58 == 3 || $status_55 == 3 ||
    $status_52 == 3 || $status_78 == 3 || $status_76 == 3 || $status_75 == 3 || $status_72 == 3 || $status_69 == 3 ||
    $status_66 == 3 || $status_63 == 3 || $status_60 == 3 || $status_57 == 3 || $status_54 == 3 || $status_51 == 3 ||
    $status_3 == 3 || $status_6 == 3 || $status_9 == 3 || $status_12 == 3 || $status_15 == 3 || $status_21 == 3 ||
    $status_26 == 3 || $status_29 == 3 || $status_32 == 3 || $status_35 == 3 || $status_38 == 3 || $status_41 == 3 ||
    $status_44 == 3 || $status_47 == 3 || $status_50 == 3 || $status_49 == 3 || $status_43 == 3 || $status_40 == 3 ||
    $status_37 == 3 || $status_34 == 3 || $status_31 == 3 || $status_28 == 3 || $status_25 == 3 || $status_20 == 3 ||
    $status_14 == 3 || $status_11 == 3 || $status_8 == 3 || $status_5 == 3 || $status_2 == 3 || $status_46 == 3 ||
    $status_48 == 3 || $status_45 == 3 || $status_42 == 3 || $status_39 == 3 || $status_36 == 3 || $status_33 == 3 ||
    $status_30 == 3 || $status_27 == 3 || $status_24 == 3 || $status_23 == 3 || $status_22 == 3 || $status_19 == 3 ||
    $status_13 == 3 || $status_10 == 3 || $status_7 == 3 || $status_4 == 3 || $status_1 == 3 || $status_16 == 3 ||
    $status_17 == 3 || $status_18 == 3) {
      $utilidades_subestacao_status = 3;
    } else {
      $utilidades_subestacao_status = "";
    }
    return $utilidades_subestacao_status;
  }

  public static function uti_Menu() {
    $uti_menu = "";
    $utilidades_ccm_status = AuxFuncRelTec::utilidades_ccm_Menu();
    $utilidades_lv460V_status = AuxFuncRelTec::utilidades_lv460V_Menu();
    $utilidades_salaCompressores_status = AuxFuncRelTec::utilidades_salaCompressores_Menu();
    $utilidades_subestacao_status = AuxFuncRelTec::utilidades_subestacao_Menu();

    if ($utilidades_ccm_status == 5 || $utilidades_lv460V_status == 5 || $utilidades_salaCompressores_status == 5 || $utilidades_subestacao_status == 5) {
      $uti_menu = 5;
    } elseif ($utilidades_ccm_status == 4 || $utilidades_lv460V_status == 4 || $utilidades_salaCompressores_status == 4 || $utilidades_subestacao_status == 4) {
      $uti_menu = 4;
    } elseif ($utilidades_ccm_status == 3 || $utilidades_lv460V_status == 3 || $utilidades_salaCompressores_status == 3 || $utilidades_subestacao_status == 3) {
      $uti_menu = 3;
    } else {
      $uti_menu = "";
    }

    return $uti_menu;
  }

  public static function uti_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_normal = aux::GeralPorLinha2TE($atual1, 3, $uti_parent);
    return $uti_normal;
  }
  public static function uti_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_alarme = aux::GeralPorLinha2TE($atual1, 4, $uti_parent);
    return $uti_alarme;
  }
  public static function uti_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_critico = aux::GeralPorLinha2TE($atual1, 5, $uti_parent);
    return $uti_critico;
  }

  //--- GALVANIZACAO
  public static function galvanizacao_ets_entradaLimp_Menu() {
    $galvanizacao_ets_entradaLimp_status = "";
    //ESTAÇÃO REMOTA - ET018
    $tag_ET_18 = "TE 72 400 410 641 006 - 000001";
    $idAtividadeET_18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_18)->value('id');
    $idAnaliseET_18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_18)->max('id');
    $statusET_18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_18)->value('status_id');
    //ESTAÇÃO REMOTA - ET012
    $tag_ET_12 = "TE 72 700 775 060 000 - 000001";
    $idAtividadeET_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_12)->value('id');
    $idAnaliseET_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_12)->max('id');
    $statusET_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_12)->value('status_id');
    //ESTAÇÃO REMOTA - ET020
    $tag_ET_20 = "TE 72 400 410 633 012 - 000001";
    $idAtividadeET_20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_20)->value('id');
    $idAnaliseET_20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_20)->max('id');
    $statusET_20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_20)->value('status_id');
    //ESTAÇÃO REMOTA - ET014
    $tag_ET_14 = "TE 72 700 775 010 000 - 000001";
    $idAtividadeET_14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_14)->value('id');
    $idAnaliseET_14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_14)->max('id');
    $statusET_14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_14)->value('status_id');
    //MAQUINA DE SOLDA
    $tag_MS = "TE 72 400 410 120 000 - 000001";
    $idAtividadeMS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MS)->value('id');
    $idAnaliseMS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMS)->max('id');
    $statusMS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMS)->value('status_id');
    //MAQUINA DE SOLDA PAINEL PRINCIPAL
    $tag_MSPP = "TE 72 400 410 120 000 - 000002";
    $idAtividadeMSPP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MSPP)->value('id');
    $idAnaliseMSPP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMSPP)->max('id');
    $statusMSPP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMSPP)->value('status_id');
    //BOILER LIMPEZA ELETROLÍTICA CT3
    $tag_BLE_CT3 = "TE 72 400 410 187 000 - 000001";
    $idAtividadeBLE_CT3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLE_CT3)->value('id');
    $idAnaliseBLE_CT3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLE_CT3)->max('id');
    $statusBLE_CT3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLE_CT3)->value('status_id');
    //BOILER ESCOVAS CT4
    $tag_BE_CT4 = "TE 72 400 410 193 000 - 000001";
    $idAtividadeBE_CT4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BE_CT4)->value('id');
    $idAnaliseBE_CT4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT4)->max('id');
    $statusBE_CT4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT4)->value('status_id');
    //BOILER ENXÁGUE CT5
    $tag_BE_CT5 = "TE 72 400 410 189 000 - 000001";
    $idAtividadeBE_CT5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BE_CT5)->value('id');
    $idAnaliseBE_CT5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT5)->max('id');
    $statusBE_CT5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT5)->value('status_id');
    //BOILER ENXÁGUE CT6
    $tag_BE_CT6 = "TE 72 700 775 040 000 - 000001";
    $idAtividadeBE_CT6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BE_CT6)->value('id');
    $idAnaliseBE_CT6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT6)->max('id');
    $statusBE_CT6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT6)->value('status_id');
    //ESTAÇÃO REMOTA - ET033
    $tag_ET_33 = "TE 72 400 410 639 018 - 000001";
    $idAtividadeET_33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_33)->value('id');
    $idAnaliseET_33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_33)->max('id');
    $statusET_33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_33)->value('status_id');
    //ESTAÇÃO REMOTA - ET023
    $tag_ET_23 = "TE 72 400 410 633 021 - 000001";
    $idAtividadeET_23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_23)->value('id');
    $idAnaliseET_23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_23)->max('id');
    $statusET_23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_23)->value('status_id');
    //ESTAÇÃO REMOTA - ET34
    $tag_ET_34 = "TE 72 400 410 639 009 - 000001";
    $idAtividadeET_34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_34)->value('id');
    $idAnaliseET_34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_34)->max('id');
    $statusET_34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_34)->value('status_id');
    //ESTAÇÃO REMOTA - ET021
    $tag_ET_21 = "TE 72 400 410 639 006 - 000001";
    $idAtividadeET_21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_21)->value('id');
    $idAnaliseET_21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_21)->max('id');
    $statusET_21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_21)->value('status_id');
    //ESTAÇÃO REMOTA - ET030
    $tag_ET_30 = "TE 72 400 410 635 006 - 000001";
    $idAtividadeET_30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_30)->value('id');
    $idAnaliseET_30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_30)->max('id');
    $statusET_30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_30)->value('status_id');
    //LAUDO CABECOTE MAQUINA DE SOLDA - LAUDO DIFERENTE DOS OUTROS
    $tag_cabecote_maq_solda = "TE 72 400 410 115 000 - 000001";
    $idAtividade_cms = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_cabecote_maq_solda)->value('id');
    $idAnalise_cms = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_cms)->max('id');
    $status_cms = DB::table('preditiva_analises')->where('id', '=', $idAnalise_cms)->value('status_id');

    if ($statusET_18 == 5 || $statusET_12 == 5 || $statusET_20 == 5 || $statusET_14 == 5 || $statusMS == 5 || $statusMSPP == 5 || $statusBLE_CT3 == 5 || $statusBE_CT4 == 5 ||
    $statusBE_CT5 == 5 || $statusBE_CT6 == 5 || $statusET_33 == 5 || $statusET_23 == 5 || $statusET_34 == 5 || $statusET_21 == 5 || $statusET_30 == 5 || $status_cms == 5) {
      $galvanizacao_ets_entradaLimp_status = 5;
    } elseif ($statusET_18 == 4 || $statusET_12 == 4 || $statusET_20 == 4 || $statusET_14 == 4 || $statusMS == 4 || $statusMSPP == 4 || $statusBLE_CT3 == 4 || $statusBE_CT4 == 4 ||
    $statusBE_CT5 == 4 || $statusBE_CT6 == 4 || $statusET_33 == 4 || $statusET_23 == 4 || $statusET_34 == 4 || $statusET_21 == 4 || $statusET_30 == 4 || $status_cms == 4) {
      $galvanizacao_ets_entradaLimp_status = 4;
    } elseif ($statusET_18 == 3 || $statusET_12 == 3 || $statusET_20 == 3 || $statusET_14 == 3 || $statusMS == 3 || $statusMSPP == 3 || $statusBLE_CT3 == 3 || $statusBE_CT4 == 3 ||
    $statusBE_CT5 == 3 || $statusBE_CT6 == 3 || $statusET_33 == 3 || $statusET_23 == 3 || $statusET_34 == 3 || $statusET_21 == 3 || $statusET_30 == 3 || $status_cms == 3) {
      $galvanizacao_ets_entradaLimp_status = 3;
    } else {
      $galvanizacao_ets_entradaLimp_status = "";
    }

    return $galvanizacao_ets_entradaLimp_status;
  }

  public static function galvanizacao_forno_Menu() {
    $galvanizacao_forno_status = "";
    //PAINEL FFD (FORNO DE FOGO DIRETO) - QD. REMOTO E/S
    $tag_PFFD_QD_REMOTO = "TE 72 400 410 267 000 - 000016";
    $idAtividadePFFD_QD_REMOTO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PFFD_QD_REMOTO)->value('id');
    $idAnalisePFFD_QD_REMOTO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePFFD_QD_REMOTO)->max('id');
    $statusPFFD_QD_REMOTO = DB::table('preditiva_analises')->where('id', '=', $idAnalisePFFD_QD_REMOTO)->value('status_id');
    //PAINEL QD. REMOTO E/S - TUBO RADIOSO
    $tag_PR_TR = "TE 72 400 410 267 000 - 000015";
    $idAtividadePR_TR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PR_TR)->value('id');
    $idAnalisePR_TR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_TR)->max('id');
    $statusPR_TR = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_TR)->value('status_id');
    //PAINEL ARREFECIMENTO LENTO / ARREF. A JATO / QD. REMOTO E/S
    $tag_PAL_AJ_QD_R = "TE 72 400 410 268 000 - 000001";
    $idAtividadePAL_AJ_QD_R = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAL_AJ_QD_R)->value('id');
    $idAnalisePAL_AJ_QD_R = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAL_AJ_QD_R)->max('id');
    $statusPAL_AJ_QD_R = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAL_AJ_QD_R)->value('status_id');
    //PAINEL AQUECEDOR VELA INCANDESCENTE / QD. DE EGNIÇÃO
    $tag_PAVI_QD_E = "TE 72 400 410 259 000 - 000003";
    $idAtividadePAVI_QD_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAVI_QD_E)->value('id');
    $idAnalisePAVI_QD_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAVI_QD_E)->max('id');
    $statusPAVI_QD_E = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAVI_QD_E)->value('status_id');
    //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 1 - QD. SALVAGUARDA
    $tag_PSTR_CN1 = "TE 72 400 410 267 000 - 000001";
    $idAtividadePSTR_CN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN1)->value('id');
    $idAnalisePSTR_CN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN1)->max('id');
    $statusPSTR_CN1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN1)->value('status_id');
    //PAINEL FFD CHAMA ZONA 3 - QD. SALVAGUARDA
    $tag_PFFD_CZ3 = "TE 72 400 410 267 000 - 000017";
    $idAtividadePFFD_CZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PFFD_CZ3)->value('id');
    $idAnalisePFFD_CZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePFFD_CZ3)->max('id');
    $statusPFFD_CZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePFFD_CZ3)->value('status_id');
    //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 2- QD. SALVAGUARDA
    $tag_PSTR_CN2 = "TE 72 400 410 187 000 - 000001";
    $idAtividadePSTR_CN2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN2)->value('id');
    $idAnalisePSTR_CN2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN2)->max('id');
    $statusPSTR_CN2 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN2)->value('status_id');
    //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 3 - QD. SALVAGUARDA
    $tag_PSTR_CN3 = "TE 72 400 410 267 000 - 000003";
    $idAtividadePSTR_CN3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN3)->value('id');
    $idAnalisePSTR_CN3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN3)->max('id');
    $statusPSTR_CN3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN3)->value('status_id');
    //PAINEL FFD ZONA 2 - QD. CONTROLE LOCAL
    $tag_P_FFD_Z2 = "TE 72 400 410 267 000 - 000018";
    $idAtividadeP_FFD_Z2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z2)->value('id');
    $idAnaliseP_FFD_Z2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z2)->max('id');
    $statusP_FFD_Z2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z2)->value('status_id');
    //PAINEL FFD ZONA 3 - GÁS PILOTO - QD. CONTROLE LOCAL
    $tag_P_FFD_Z3_GP = "TE 72 400 410 267 000 - 000019";
    $idAtividadeP_FFD_Z3_GP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z3_GP)->value('id');
    $idAnaliseP_FFD_Z3_GP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z3_GP)->max('id');
    $statusP_FFD_Z3_GP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z3_GP)->value('status_id');
    //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 4 - QD. SALVAGUARDA
    $tag_PSTR_CN4 = "TE 72 400 410 267 000 - 000004";
    $idAtividadePSTR_CN4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN4)->value('id');
    $idAnalisePSTR_CN4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN4)->max('id');
    $statusPSTR_CN4 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN4)->value('status_id');
    //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 5 - QD. SALVAGUARDA
    $tag_PSTR_CN5 = "TE 72 400 410 267 000 - 000009";
    $idAtividadePSTR_CN5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN5)->value('id');
    $idAnalisePSTR_CN5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN5)->max('id');
    $statusPSTR_CN5 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN5)->value('status_id');
    //PAINEL FFD ZONA 1 - QD. CONTROLE LOCAL
    $tag_P_FFD_Z1 = "TE 72 400 410 267 000 - 000020";
    $idAtividadeP_FFD_Z1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z1)->value('id');
    $idAnaliseP_FFD_Z1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z1)->max('id');
    $statusP_FFD_Z1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z1)->value('status_id');
    //PAINEL FFD ZONA 6 - QD. CONTROLE LOCAL
    $tag_P_FFD_Z6 = "TE 72 400 410 267 000 - 000005";
    $idAtividadeP_FFD_Z6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z6)->value('id');
    $idAnaliseP_FFD_Z6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z6)->max('id');
    $statusP_FFD_Z6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z6)->value('status_id');
    //PAINEL FFD ZONA 4 - QD. CONTROLE LOCAL
    $tag_P_FFD_Z4 = "TE 72 400 410 267 000 - 000021";
    $idAtividadeP_FFD_Z4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z4)->value('id');
    $idAnaliseP_FFD_Z4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z4)->max('id');
    $statusP_FFD_Z4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z4)->value('status_id');
    //PAINEL FFD ZONA 5 - QD. CONTROLE LOCAL
    $tag_P_FFD_Z5 = "TE 72 400 410 267 000 - 000022";
    $idAtividadeP_FFD_Z5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z5)->value('id');
    $idAnaliseP_FFD_Z5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z5)->max('id');
    $statusP_FFD_Z5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z5)->value('status_id');
    //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 6 - QD. SALVAGUARDA
    $tag_PSTR_CN6 = "TE 72 400 410 267 000 - 000010";
    $idAtividadePSTR_CN6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN6)->value('id');
    $idAnalisePSTR_CN6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN6)->max('id');
    $statusPSTR_CN6 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN6)->value('status_id');
    //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 7 - QD. SALVAGUARDA
    $tag_PSTR_CN7 = "TE 72 400 410 267 000 - 000011";
    $idAtividadePSTR_CN7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN7)->value('id');
    $idAnalisePSTR_CN7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN7)->max('id');
    $statusPSTR_CN7 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN7)->value('status_id');

    if ($statusPFFD_QD_REMOTO == 5 || $statusPR_TR == 5 || $statusPAL_AJ_QD_R == 5 || $statusPAVI_QD_E == 5 || $statusPSTR_CN1 == 5 ||
        $statusPFFD_CZ3 == 5 || $statusPSTR_CN2 == 5 || $statusPSTR_CN3 == 5 || $statusP_FFD_Z2 == 5 || $statusP_FFD_Z3_GP == 5 ||
        $statusPSTR_CN4 == 5 || $statusPSTR_CN5 == 5 || $statusP_FFD_Z1 == 5 || $statusP_FFD_Z6 == 5 || $statusP_FFD_Z4 == 5 ||
        $statusP_FFD_Z5 == 5 || $statusPSTR_CN6 == 5 || $statusPSTR_CN7 == 5) {
      $galvanizacao_forno_status = 5;
    } elseif ($statusPFFD_QD_REMOTO == 4 || $statusPR_TR == 4 || $statusPAL_AJ_QD_R == 4 || $statusPAVI_QD_E == 4 || $statusPSTR_CN1 == 4 ||
              $statusPFFD_CZ3 == 4 || $statusPSTR_CN2 == 4 || $statusPSTR_CN3 == 4 || $statusP_FFD_Z2 == 4 || $statusP_FFD_Z3_GP == 4 ||
              $statusPSTR_CN4 == 4 || $statusPSTR_CN5 == 4 || $statusP_FFD_Z1 == 4 || $statusP_FFD_Z6 == 4 || $statusP_FFD_Z4 == 4 ||
              $statusP_FFD_Z5 == 4 || $statusPSTR_CN6 == 4 || $statusPSTR_CN7 == 4) {
      $galvanizacao_forno_status = 4;
    } elseif ($statusPFFD_QD_REMOTO == 3 || $statusPR_TR == 3 || $statusPAL_AJ_QD_R == 3 || $statusPAVI_QD_E == 3 || $statusPSTR_CN1 == 3 ||
              $statusPFFD_CZ3 == 3 || $statusPSTR_CN2 == 3 || $statusPSTR_CN3 == 3 || $statusP_FFD_Z2 == 3 || $statusP_FFD_Z3_GP == 3 ||
              $statusPSTR_CN4 == 3 || $statusPSTR_CN5 == 3 || $statusP_FFD_Z1 == 3 || $statusP_FFD_Z6 == 3 || $statusP_FFD_Z4 == 3 ||
              $statusP_FFD_Z5 == 3 || $statusPSTR_CN6 == 3 || $statusPSTR_CN7 == 3) {
      $galvanizacao_forno_status = 3;
    } else {
      $galvanizacao_forno_status = "";
    }

    return $galvanizacao_forno_status;
  }

  public static function galvanizacao_infraSaida_Menu() {
    $galvanizacao_infraSaida_status = "";
    //ESTAÇÃO REMOTA - ET060
    $tag_ET_60 = "TE 72 400 410 635 015 - 000001";
    $idAtividadeET_60 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_60)->value('id');
    $idAnaliseET_60 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_60)->max('id');
    $statusET_60 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_60)->value('status_id');
    //ESTAÇÃO REMOTA - ET063
    $tag_ET_63 = "TE 72 400 410 639 024 - 000001";
    $idAtividadeET_63 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_63)->value('id');
    $idAnaliseET_63 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_63)->max('id');
    $statusET_63 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_63)->value('status_id');
    //ESTAÇÃO REMOTA - ET067
    $tag_ET_67 = "TE 72 400 410 639 015 - 000001";
    $idAtividadeET_67 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_67)->value('id');
    $idAnaliseET_67 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_67)->max('id');
    $statusET_67 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_67)->value('status_id');
    //ESTAÇÃO REMOTA - ET064
    $tag_ET_64 = "TE 72 400 410 635 018 - 000001";
    $idAtividadeET_64 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_64)->value('id');
    $idAnaliseET_64 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_64)->max('id');
    $statusET_64 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_64)->value('status_id');
    //ESTAÇÃO REMOTA - ET062
    $tag_ET_62 = "TE 72 400 410 641 012 - 000001";
    $idAtividadeET_62 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_62)->value('id');
    $idAnaliseET_62 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_62)->max('id');
    $statusET_62 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_62)->value('status_id');
    //ESTAÇÃO REMOTA - ET050
    $tag_ET_50 = "TE 72 400 410 635 012 - 000001";
    $idAtividadeET_50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_50)->value('id');
    $idAnaliseET_50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_50)->max('id');
    $statusET_50 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_50)->value('status_id');
    //ESTAÇÃO REMOTA - ET055
    $tag_ET_55 = "TE 72 400 410 653 009 - 000001";
    $idAtividadeET_55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_55)->value('id');
    $idAnaliseET_55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_55)->max('id');
    $statusET_55 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_55)->value('status_id');
    //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#6
    $tag_PRAS_PR6 = "TE 72 400 410 267 000 - 000003";
    $idAtividadePRAS_PR6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR6)->value('id');
    $idAnalisePRAS_PR6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR6)->max('id');
    $statusPRAS_PR6 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR6)->value('status_id');
    //ESTAÇÃO REMOTA - ET054
    $tag_ET_54 = "TE 72 400 410 653 006 - 000001";
    $idAtividadeET_54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_54)->value('id');
    $idAnaliseET_54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_54)->max('id');
    $statusET_54 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_54)->value('status_id');
    //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#5
    $tag_PRAS_PR5 = "TE 72 400 410 431 000 - 000005";
    $idAtividadePRAS_PR5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR5)->value('id');
    $idAnalisePRAS_PR5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR5)->max('id');
    $statusPRAS_PR5 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR5)->value('status_id');
    //ESTAÇÃO REMOTA - ET088
    $tag_ET_88 = "TE 72 400 410 641 015 - 000001";
    $idAtividadeET_88 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_88)->value('id');
    $idAnaliseET_88 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_88)->max('id');
    $statusET_88 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_88)->value('status_id');
    //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#4
    $tag_PRAS_PR4 = "TE 72 400 410 431 000 - 000004";
    $idAtividadePRAS_PR4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR4)->value('id');
    $idAnalisePRAS_PR4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR4)->max('id');
    $statusPRAS_PR4 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR4)->value('status_id');
    //ESTAÇÃO REMOTA - ET052
    $tag_ET_52 = "TE 72 400 410 641 009 - 000001";
    $idAtividadeET_52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_52)->value('id');
    $idAnaliseET_52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_52)->max('id');
    $statusET_52 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_52)->value('status_id');
    //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#3
    $tag_PRAS_PR3 = "TE 72 400 410 431 000 - 000003";
    $idAtividadePRAS_PR3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR3)->value('id');
    $idAnalisePRAS_PR3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR3)->max('id');
    $statusPRAS_PR3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR3)->value('status_id');
    //OLEADEIRA
    $tag_OLE = "TE 72 400 410 609 006 - 000001";
    $idAtividadeOLE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_OLE)->value('id');
    $idAnaliseOLE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOLE)->max('id');
    $statusOLE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOLE)->value('status_id');
    //ESTAÇÃO REMOTA - ET065
    $tag_ET_65 = "TE 72 400 410 635 024 - 000001";
    $idAtividadeET_65 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_65)->value('id');
    $idAnaliseET_65 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_65)->max('id');
    $statusET_65 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_65)->value('status_id');
    //ESTAÇÃO REMOTA - ET051
    $tag_ET_51 = "TE 72 400 410 267 000 - 000010";
    $idAtividadeET_51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_51)->value('id');
    $idAnaliseET_51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_51)->max('id');
    $statusET_51 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_51)->value('status_id');
    //ESTAÇÃO REMOTA - ET072
    $tag_ET_72 = "TE 72 400 410 267 000 - 000011";
    $idAtividadeET_72 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_72)->value('id');
    $idAnaliseET_72 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_72)->max('id');
    $statusET_72 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_72)->value('status_id');
    //ESTAÇÃO REMOTA - ET071
    $tag_ET_71 = "TE 72 400 410 637 009 - 000001";
    $idAtividadeET_71 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_71)->value('id');
    $idAnaliseET_71 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_71)->max('id');
    $statusET_71 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_71)->value('status_id');
    //ESTAÇÃO REMOTA - ET070
    $tag_ET_70 = "TE 72 400 410 637 006 - 000001";
    $idAtividadeET_70 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_70)->value('id');
    $idAnaliseET_70 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_70)->max('id');
    $statusET_70 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_70)->value('status_id');
    //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#2
    $tag_PRAS_PR2 = "TE 72 400 410 431 000 - 000002";
    $idAtividadePRAS_PR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR2)->value('id');
    $idAnalisePRAS_PR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR2)->max('id');
    $statusPRAS_PR2 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR2)->value('status_id');
    //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#1
    $tag_PRAS_PR1 = "TE 72 400 410 431 000 - 000001";
    $idAtividadePRAS_PR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR1)->value('id');
    $idAnalisePRAS_PR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR1)->max('id');
    $statusPRAS_PR1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR1)->value('status_id');
    //ESTAÇÃO REMOTA - ET073
    $tag_ET_73 = "TE 72 400 410 637 015 - 000001";
    $idAtividadeET_73 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_73)->value('id');
    $idAnaliseET_73 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_73)->max('id');
    $statusET_73 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_73)->value('status_id');
    //ESTAÇÃO REMOTA - ET085
    $tag_ET_85 = "TE 72 400 410 639 027 - 000001";
    $idAtividadeET_85 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_85)->value('id');
    $idAnaliseET_85 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_85)->max('id');
    $statusET_85 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_85)->value('status_id');
    //ESTAÇÃO REMOTA - ET046
    $tag_ET_46 = "TE 72 400 410 635 021 - 000001";
    $idAtividadeET_46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_46)->value('id');
    $idAnaliseET_46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_46)->max('id');
    $statusET_46 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_46)->value('status_id');
    //ESTAÇÃO REMOTA - ET044
    $tag_ET_44 = "TE 72 400 410 639 021 - 000001";
    $idAtividadeET_44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_44)->value('id');
    $idAnaliseET_44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_44)->max('id');
    $statusET_44 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_44)->value('status_id');

    if ($statusET_60 == 5 || $statusET_63 == 5 || $statusET_67 == 5 || $statusET_64 == 5 || $statusET_62 == 5 || $statusET_50 == 5 || $statusET_55 == 5 ||
        $statusPRAS_PR6 == 5 || $statusET_54 == 5 || $statusPRAS_PR5 == 5 || $statusET_88 == 5 || $statusPRAS_PR4 == 5 || $statusET_52 == 5 ||
        $statusPRAS_PR3 == 5 || $statusOLE == 5 || $statusET_65 == 5 || $statusET_51 == 5 || $statusET_72 == 5 || $statusET_71 == 5 || $statusET_70 == 5 ||
        $statusPRAS_PR2 == 5 || $statusPRAS_PR1 == 5 || $statusET_73 == 5 || $statusET_85 == 5 || $statusET_46 == 5 || $statusET_44 == 5) {
      $galvanizacao_infraSaida_status = 5;
    } elseif ($statusET_60 == 4 || $statusET_63 == 4 || $statusET_67 == 4 || $statusET_64 == 4 || $statusET_62 == 4 || $statusET_50 == 4 || $statusET_55 == 4 ||
              $statusPRAS_PR6 == 4 || $statusET_54 == 4 || $statusPRAS_PR5 == 4 || $statusET_88 == 4 || $statusPRAS_PR4 == 4 || $statusET_52 == 4 ||
              $statusPRAS_PR3 == 4 || $statusOLE == 4 || $statusET_65 == 4 || $statusET_51 == 4 || $statusET_72 == 4 || $statusET_71 == 4 || $statusET_70 == 4 ||
              $statusPRAS_PR2 == 4 || $statusPRAS_PR1 == 4 || $statusET_73 == 4 || $statusET_85 == 4 || $statusET_46 == 4 || $statusET_44 == 4) {
      $galvanizacao_infraSaida_status = 4;
    } elseif ($statusET_60 == 3 || $statusET_63 == 3 || $statusET_67 == 3 || $statusET_64 == 3 || $statusET_62 == 3 || $statusET_50 == 3 || $statusET_55 == 3 ||
              $statusPRAS_PR6 == 3 || $statusET_54 == 3 || $statusPRAS_PR5 == 3 || $statusET_88 == 3 || $statusPRAS_PR4 == 3 || $statusET_52 == 3 ||
              $statusPRAS_PR3 == 3 || $statusOLE == 3 || $statusET_65 == 3 || $statusET_51 == 3 || $statusET_72 == 3 || $statusET_71 == 3 || $statusET_70 == 3 ||
              $statusPRAS_PR2 == 3 || $statusPRAS_PR1 == 3 || $statusET_73 == 3 || $statusET_85 == 3 || $statusET_46 == 3 || $statusET_44 == 3) {
      $galvanizacao_infraSaida_status = 3;
    } else {
      $galvanizacao_infraSaida_status = "";
    }

    return $galvanizacao_infraSaida_status;
  }

  public static function galvanizacao_ccm1_ccm7_Menu() {
    $galvanizacao_ccm1_ccm7_status = "";
    //BOMBA DE RETORNO #2 - FORNO
    $tag_BR_2 = "TE 72 400 410 969 087 - 000001";
    $idAtividadeBR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_2)->value('id');
    $idAnaliseBR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_2)->max('id');
    $statusBR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_2)->value('status_id');
    //BOMBA DE RETORNO #1 - FORNO
    $tag_BR_1 = "TE 72 400 410 969 066 - 000001";
    $idAtividadeBR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_1)->value('id');
    $idAnaliseBR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_1)->max('id');
    $statusBR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_1)->value('status_id');
    //04B5BE04F - ALIM DA UPS
    $tag_ALIM_UPS = "TE 72 400 410 969 039 - 000001";
    $idAtividadeALIM_UPS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_UPS)->value('id');
    $idAnaliseALIM_UPS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_UPS)->max('id');
    $statusALIM_UPS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_UPS)->value('status_id');
    //04B5BE04E - ALIM PAINEL MD
    $tag_ALIM_PMD = "TE 72 400 410 969 036 - 000001";
    $idAtividadeALIM_PMD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_PMD)->value('id');
    $idAnaliseALIM_PMD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_PMD)->max('id');
    $statusALIM_PMD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_PMD)->value('status_id');
    //ALIMENTAÇÃO EMERGÊNCIA POTE ZINCO - CANAL B
    $tag_ALIM_EMERG_PZB = "TE 72 400 410 969 033 - 000001";
    $idAtividadeALIM_EMERG_PZB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_EMERG_PZB)->value('id');
    $idAnaliseALIM_EMERG_PZB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_EMERG_PZB)->max('id');
    $statusALIM_EMERG_PZB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_EMERG_PZB)->value('status_id');
    //BOMBA DE REFRIGERAÇÃO #2 - POTE DE GALVALUME
    $tag_BR_2_PG = "TE 72 400 410 969 012 - 000001";
    $idAtividadeBR_2_PG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_2_PG)->value('id');
    $idAnaliseBR_2_PG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_2_PG)->max('id');
    $statusBR_2_PG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_2_PG)->value('status_id');
    //BOMBA DE REFRIGERAÇÃO #1 - POTE DE GALVALUME
    $tag_BR_1_PG = "TE 72 400 410 969 009 - 000001";
    $idAtividadeBR_1_PG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_1_PG)->value('id');
    $idAnaliseBR_1_PG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_1_PG)->max('id');
    $statusBR_1_PG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_1_PG)->value('status_id');
    //ALIMENTAÇÃO EMERGÊNCIA POTE ZINCO - CANAL A
    $tag_ALIM_EMERG_PZA = "TE 72 400 410 969 030 - 000001";
    $idAtividadeALIM_EMERG_PZA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_EMERG_PZA)->value('id');
    $idAnaliseALIM_EMERG_PZA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_EMERG_PZA)->max('id');
    $statusALIM_EMERG_PZA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_EMERG_PZA)->value('status_id');
    //BOMBA DE REFRIGERAÇÃO #2 - POTE DE ZINCO
    $tag_BR_2_PZ = "TE 72 400 410 969 006 - 000001";
    $idAtividadeBR_2_PZ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_2_PZ)->value('id');
    $idAnaliseBR_2_PZ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_2_PZ)->max('id');
    $statusBR_2_PZ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_2_PZ)->value('status_id');
    //BOMBA DE REFRIGERAÇÃO #1 - POTE DE ZINCO
    $tag_BR_1_PZ = "TE 72 400 410 969 003 - 000001";
    $idAtividadeBR_1_PZ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_1_PZ)->value('id');
    $idAnaliseBR_1_PZ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_1_PZ)->max('id');
    $statusBR_1_PZ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_1_PZ)->value('status_id');
    //SOPRADOR STRIP DRYER 2
    $tag_SSD_2 = "TE 72 400 410 964 237 - 000001";
    $idAtividadeSSD_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SSD_2)->value('id');
    $idAnaliseSSD_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSD_2)->max('id');
    $statusSSD_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSD_2)->value('status_id');
    //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA #3
    $tag_UHE_B3 = "TE 72 400 410 964 069 - 000001";
    $idAtividadeUHE_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_B3)->value('id');
    $idAnaliseUHE_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_B3)->max('id');
    $statusUHE_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_B3)->value('status_id');
    //DISTRIBUIÇÃO AUXILIAR 115V-220V
    $tag_DA_115_220 = "TE 72 400 410 964 096 - 000001";
    $idAtividadeDA_115_220 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DA_115_220)->value('id');
    $idAnaliseDA_115_220 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDA_115_220)->max('id');
    $statusDA_115_220 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDA_115_220)->value('status_id');
    //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA #2
    $tag_UHE_B2 = "TE 72 400 410 964 045 - 000001";
    $idAtividadeUHE_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_B2)->value('id');
    $idAnaliseUHE_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_B2)->max('id');
    $statusUHE_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_B2)->value('status_id');
    //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA #1
    $tag_UHE_B1 = "TE 72 400 410 964 042 - 000001";
    $idAtividadeUHE_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_B1)->value('id');
    $idAnaliseUHE_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_B1)->max('id');
    $statusUHE_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_B1)->value('status_id');
    //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA DE RECIRCULAÇÃO #1
    $tag_UHE_BR1 = "TE 72 400 410 964 009 - 000001";
    $idAtividadeUHE_BR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_BR1)->value('id');
    $idAnaliseUHE_BR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_BR1)->max('id');
    $statusUHE_BR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_BR1)->value('status_id');
    //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA DE RECIRCULAÇÃO #2
    $tag_UHE_BR2 = "TE 72 400 410 964 024 - 000001";
    $idAtividadeUHE_BR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_BR2)->value('id');
    $idAnaliseUHE_BR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_BR2)->max('id');
    $statusUHE_BR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_BR2)->value('status_id');

    if ($statusBR_2 == 5 || $statusBR_1 == 5 || $statusALIM_UPS == 5 || $statusALIM_PMD == 5 || $statusALIM_EMERG_PZB == 5 || $statusBR_2_PG == 5 ||
        $statusBR_1_PG == 5 || $statusALIM_EMERG_PZA == 5 || $statusBR_2_PZ == 5 || $statusBR_1_PZ == 5 || $statusSSD_2 == 5 || $statusUHE_B3 == 5 ||
        $statusDA_115_220 == 5 || $statusUHE_B2 == 5 || $statusUHE_B1 == 5 || $statusUHE_BR1 == 5 || $statusUHE_BR2 == 5) {
      $galvanizacao_ccm1_ccm7_status = 5;
    } elseif ($statusBR_2 == 4 || $statusBR_1 == 4 || $statusALIM_UPS == 4 || $statusALIM_PMD == 4 || $statusALIM_EMERG_PZB == 4 || $statusBR_2_PG == 4 ||
              $statusBR_1_PG == 4 || $statusALIM_EMERG_PZA == 4 || $statusBR_2_PZ == 4 || $statusBR_1_PZ == 4 || $statusSSD_2 == 4 || $statusUHE_B3 == 4 ||
              $statusDA_115_220 == 4 || $statusUHE_B2 == 4 || $statusUHE_B1 == 4 || $statusUHE_BR1 == 4 || $statusUHE_BR2 == 4) {
      $galvanizacao_ccm1_ccm7_status = 4;
    } elseif ($statusBR_2 == 3 || $statusBR_1 == 3 || $statusALIM_UPS == 3 || $statusALIM_PMD == 3 || $statusALIM_EMERG_PZB == 3 || $statusBR_2_PG == 3 ||
              $statusBR_1_PG == 3 || $statusALIM_EMERG_PZA == 3 || $statusBR_2_PZ == 3 || $statusBR_1_PZ == 3 || $statusSSD_2 == 3 || $statusUHE_B3 == 3 ||
              $statusDA_115_220 == 3 || $statusUHE_B2 == 3 || $statusUHE_B1 == 3 || $statusUHE_BR1 == 3 || $statusUHE_BR2 == 3) {
      $galvanizacao_ccm1_ccm7_status = 3;
    } else {
      $galvanizacao_ccm1_ccm7_status = "";
    }

    return $galvanizacao_ccm1_ccm7_status;
  }

  public static function galvanizacao_ccm2_ccm3_Menu() {
    $galvanizacao_ccm2_ccm3_status = "";
    //SOPRADOR APC #9
    $tag_SAPC_9 = "TE 72 400 410 966 042 - 000001";
    $idAtividadeSAPC_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_9)->value('id');
    $idAnaliseSAPC_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_9)->max('id');
    $statusSAPC_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_9)->value('status_id');
    //SOPRADOR APC #7
    $tag_SAPC_7 = "TE 72 400 410 966 030 - 000001";
    $idAtividadeSAPC_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_7)->value('id');
    $idAnaliseSAPC_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_7)->max('id');
    $statusSAPC_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_7)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - JET COOL 4-6
    $tag_RE_JET_COOL_4_6 = "TE 72 400 410 965 096 - 000001";
    $idAtividadeRE_JET_COOL_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_JET_COOL_4_6)->value('id');
    $idAnaliseRE_JET_COOL_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_JET_COOL_4_6)->max('id');
    $statusRE_JET_COOL_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_JET_COOL_4_6)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - RTS P SLOW 4-6
    $tag_RE_RTS_SLOW_4_6 = "TE 72 400 410 965 081 - 000001";
    $idAtividadeRE_RTS_SLOW_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_RTS_SLOW_4_6)->value('id');
    $idAnaliseRE_RTS_SLOW_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_RTS_SLOW_4_6)->max('id');
    $statusRE_RTS_SLOW_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_RTS_SLOW_4_6)->value('status_id');
    //EXAUSTOR TUBO RADIOSO - ZONA #5
    $tag_ETR_Z5 = "TE 72 400 410 965 060 - 000001";
    $idAtividadeETR_Z5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ETR_Z5)->value('id');
    $idAnaliseETR_Z5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETR_Z5)->max('id');
    $statusETR_Z5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETR_Z5)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - RTS P SLOW 1-3
    $tag_RE_RTS_SLOW_1_3 = "TE 72 400 410 965 078 - 000001";
    $idAtividadeRE_RTS_SLOW_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_RTS_SLOW_1_3)->value('id');
    $idAnaliseRE_RTS_SLOW_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_RTS_SLOW_1_3)->max('id');
    $statusRE_RTS_SLOW_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_RTS_SLOW_1_3)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - JET COOL 1-3
    $tag_RE_JET_COOL_1_3 = "TE 72 400 410 965 093 - 000001";
    $idAtividadeRE_JET_COOL_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_JET_COOL_1_3)->value('id');
    $idAnaliseRE_JET_COOL_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_JET_COOL_1_3)->max('id');
    $statusRE_JET_COOL_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_JET_COOL_1_3)->value('status_id');
    //SOPRADOR APC #6
    $tag_SAPC_6 = "TE 72 400 410 966 027 - 000001";
    $idAtividadeSAPC_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_6)->value('id');
    $idAnaliseSAPC_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_6)->max('id');
    $statusSAPC_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_6)->value('status_id');
    //SOPRADOR APC #8
    $tag_SAPC_8 = "TE 72 400 410 966 039 - 000001";
    $idAtividadeSAPC_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_8)->value('id');
    $idAnaliseSAPC_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_8)->max('id');
    $statusSAPC_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_8)->value('status_id');
    //EXAUSTOR TUBO RADIOSO - ZONA #4
    $tag_ETR_Z4 = "TE 72 400 410 965 057 - 000001";
    $idAtividadeETR_Z4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ETR_Z4)->value('id');
    $idAnaliseETR_Z4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETR_Z4)->max('id');
    $statusETR_Z4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETR_Z4)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - DFF P RTH 4-6
    $tag_RE_DFF_RTH_4_6 = "TE 72 400 410 965 075 - 000001";
    $idAtividadeRE_DFF_RTH_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_DFF_RTH_4_6)->value('id');
    $idAnaliseRE_DFF_RTH_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_DFF_RTH_4_6)->max('id');
    $statusRE_DFF_RTH_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_DFF_RTH_4_6)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - JET TOP 1-3
    $tag_RE_JET_TOP_1_3 = "TE 72 400 410 965 090 - 000001";
    $idAtividadeRE_JET_TOP_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_JET_TOP_1_3)->value('id');
    $idAnaliseRE_JET_TOP_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_JET_TOP_1_3)->max('id');
    $statusRE_JET_TOP_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_JET_TOP_1_3)->value('status_id');
    //SOPRADOR APC #3
    $tag_SAPC_3 = "TE 72 400 410 966 024 - 000001";
    $idAtividadeSAPC_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_3)->value('id');
    $idAnaliseSAPC_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_3)->max('id');
    $statusSAPC_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_3)->value('status_id');
    //SOPRADOR APC #5
    $tag_SAPC_5 = "TE 72 400 410 966 036 - 000001";
    $idAtividadeSAPC_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_5)->value('id');
    $idAnaliseSAPC_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_5)->max('id');
    $statusSAPC_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_5)->value('status_id');
    //EXAUSTOR DO DFF
    $tag_E_DFF = "TE 72 400 410 965 054 - 000001";
    $idAtividadeE_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_E_DFF)->value('id');
    $idAnaliseE_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeE_DFF)->max('id');
    $statusE_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseE_DFF)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - DFF P RTH 1-3
    $tag_UHE_BR2 = "TE 72 400 410 965 072 - 000001";
    $idAtividadeUHE_BR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_BR2)->value('id');
    $idAnaliseUHE_BR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_BR2)->max('id');
    $statusUHE_BR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_BR2)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - SLOW TOP 1-3
    $tag_REST_1_3 = "TE 72 400 410 965 087 - 000001";
    $idAtividadeREST_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_REST_1_3)->value('id');
    $idAnaliseREST_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeREST_1_3)->max('id');
    $statusREST_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseREST_1_3)->value('status_id');
    //SOPRADOR APC 2
    $tag_SAPC_2 = "TE 72 400 410 966 021 - 000001";
    $idAtividadeSAPC_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_2)->value('id');
    $idAnaliseSAPC_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_2)->max('id');
    $statusSAPC_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_2)->value('status_id');
    //SOPRADOR APC #4
    $tag_SAPC_4 = "TE 72 400 410 966 033 - 000001";
    $idAtividadeSAPC_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_4)->value('id');
    $idAnaliseSAPC_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_4)->max('id');
    $statusSAPC_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_4)->value('status_id');
    //SOPRADOR DE AR - PÓS COMBUSTÃO
    $tag_SAPC = "TE 72 400 410 965 051 - 000001";
    $idAtividadeSAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC)->value('id');
    $idAnaliseSAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC)->max('id');
    $statusSAPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC)->value('status_id');
    //EXAUSTOR TUBO RADIOSO - ZONA #6
    $tag_ETR_Z6 = "TE 72 400 410 965 069 - 000001";
    $idAtividadeETR_Z6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ETR_Z6)->value('id');
    $idAnaliseETR_Z6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETR_Z6)->max('id');
    $statusETR_Z6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETR_Z6)->value('status_id');
    //SOPRADOR DILUIÇÃO DE AR
    $tag_SDA = "TE 72 400 410 965 048 - 000001";
    $idAtividadeSDA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SDA)->value('id');
    $idAnaliseSDA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSDA)->max('id');
    $statusSDA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSDA)->value('status_id');
    //DISTRIBUIÇÃO AUXILIAR 115V
    $tag_DA_115V = "TE 72 400 410 965 045 - 000001";
    $idAtividadeDA_115V = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DA_115V)->value('id');
    $idAnaliseDA_115V = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDA_115V)->max('id');
    $statusDA_115V = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDA_115V)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - SLOW COOL 10-12
    $tag_RESC_10_12 = "TE 72 400 410 965 033 - 000001";
    $idAtividadeRESC_10_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RESC_10_12)->value('id');
    $idAnaliseRESC_10_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRESC_10_12)->max('id');
    $statusRESC_10_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRESC_10_12)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - SLOW COOL 7-9
    $tag_RESC_7_9 = "TE 72 400 410 965 030 - 000001";
    $idAtividadeRESC_7_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RESC_7_9)->value('id');
    $idAnaliseRESC_7_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRESC_7_9)->max('id');
    $statusRESC_7_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRESC_7_9)->value('status_id');
    //*********************** NÃO CADASTRADO NO BANCO
    //RESISTÊNCIA ELÉTRICA - 7-9
    $tag_RE_7_9 = "TE 72 400 410 965 015 - 000001";
    $idAtividadeRE_7_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_7_9)->value('id');
    $idAnaliseRE_7_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_7_9)->max('id');
    $statusRE_7_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_7_9)->value('status_id');
    //SOPRADOR APC #10
    $tag_SAPC_10 = "TE 72 400 410 966 012 - 000001";
    $idAtividadeSAPC_10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_10)->value('id');
    $idAnaliseSAPC_10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_10)->max('id');
    $statusSAPC_10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_10)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - SLOW COOL 4-6
    $tag_RESC_4_6 = "TE 72 400 410 965 027 - 000001";
    $idAtividadeRESC_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RESC_4_6)->value('id');
    $idAnaliseRESC_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRESC_4_6)->max('id');
    $statusRESC_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRESC_4_6)->value('status_id');
    //*********************** NÃO CADASTRADO NO BANCO
    //RESISTÊNCIA ELÉTRICA - 4-6
    $tag_RE_4_6 = "TE 72 400 410 965 012 - 000001";
    $idAtividadeRE_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_4_6)->value('id');
    $idAnaliseRE_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_4_6)->max('id');
    $statusRE_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_4_6)->value('status_id');
    //SOPRADOR - ZONA #3
    $tag_SZ_3 = "TE 72 400 410 965 042 - 000001";
    $idAtividadeSZ_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SZ_3)->value('id');
    $idAnaliseSZ_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ_3)->max('id');
    $statusSZ_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ_3)->value('status_id');
    //ALIMENTAÇÃO CARRO APC
    $tag_ACAPC = "TE 72 400 410 966 009 - 000001";
    $idAtividadeACAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAPC)->value('id');
    $idAnaliseACAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAPC)->max('id');
    $statusACAPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAPC)->value('status_id');
    //RESISTÊNCIA ELÉTRICA - SLOW COOL 1-3
    $tag_RESC_1_3 = "TE 72 400 410 965 024 - 000001";
    $idAtividadeRESC_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RESC_1_3)->value('id');
    $idAnaliseRESC_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRESC_1_3)->max('id');
    $statusRESC_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRESC_1_3)->value('status_id');
    //*********************** NÃO CADASTRADO NO BANCO
    //RESISTÊNCIA ELÉTRICA - 1-3
    $tag_RE_1_3 = "TE 72 400 410 965 009 - 000001";
    $idAtividadeRE_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_1_3)->value('id');
    $idAnaliseRE_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_1_3)->max('id');
    $statusRE_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_1_3)->value('status_id');
    //SOPRADOR APC #1
    $tag_SAPC_1 = "TE 72 400 410 966 006 - 000001";
    $idAtividadeSAPC_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_1)->value('id');
    $idAnaliseSAPC_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_1)->max('id');
    $statusSAPC_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_1)->value('status_id');
    //SOPRADORES ZONAS #1-#2
    $tag_SZ_1_2 = "TE 72 400 410 965 039 - 000001";
    $idAtividadeSZ_1_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SZ_1_2)->value('id');
    $idAnaliseSZ_1_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ_1_2)->max('id');
    $statusSZ_1_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ_1_2)->value('status_id');
    //SOPRADOR PILOTO TUBO RADIANTE
    $tag_SPTR = "TE 72 400 410 965 006 - 000001";
    $idAtividadeSPTR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SPTR)->value('id');
    $idAnaliseSPTR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPTR)->max('id');
    $statusSPTR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPTR)->value('status_id');
    //SOPRADOR PILOTO DFF
    $tag_SP_DFF = "TE 72 400 410 965 003 - 000003";
    $idAtividadeSP_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SP_DFF)->value('id');
    $idAnaliseSP_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSP_DFF)->max('id');
    $statusSP_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSP_DFF)->value('status_id');

    if ($statusSAPC_9 == 5 || $statusSAPC_7 == 5 || $statusRE_JET_COOL_4_6 == 5 || $statusRE_RTS_SLOW_4_6 == 5 || $statusETR_Z5 == 5 || $statusRE_RTS_SLOW_1_3 == 5 ||
        $statusRE_JET_COOL_1_3 == 5 || $statusSAPC_6 == 5 || $statusSAPC_8 == 5 || $statusETR_Z4 == 5 || $statusRE_DFF_RTH_4_6 == 5 || $statusRE_JET_TOP_1_3 == 5 ||
        $statusSAPC_3 == 5 || $statusSAPC_5 == 5 || $statusE_DFF == 5 || $statusUHE_BR2 == 5 || $statusREST_1_3 == 5 || $statusSAPC_2 == 5 || $statusSAPC_4 == 5 ||
        $statusSAPC == 5 || $statusETR_Z6 == 5 || $statusSDA == 5 || $statusDA_115V == 5 || $statusRESC_10_12 == 5 || $statusRESC_7_9 == 5 || $statusRE_7_9 == 5 ||
        $statusSAPC_10 == 5 || $statusRESC_4_6 == 5 || $statusRE_4_6 == 5 || $statusSZ_3 == 5 || $statusACAPC == 5 || $statusRESC_1_3 == 5 || $statusRE_1_3 == 5 ||
        $statusSAPC_1 == 5 || $statusSZ_1_2 == 5 || $statusSPTR == 5 || $statusSP_DFF == 5) {
      $galvanizacao_ccm2_ccm3_status = 5;
    } elseif ($statusSAPC_9 == 4 || $statusSAPC_7 == 4 || $statusRE_JET_COOL_4_6 == 4 || $statusRE_RTS_SLOW_4_6 == 4 || $statusETR_Z5 == 4 || $statusRE_RTS_SLOW_1_3 == 4 ||
              $statusRE_JET_COOL_1_3 == 4 || $statusSAPC_6 == 4 || $statusSAPC_8 == 4 || $statusETR_Z4 == 4 || $statusRE_DFF_RTH_4_6 == 4 || $statusRE_JET_TOP_1_3 == 4 ||
              $statusSAPC_3 == 4 || $statusSAPC_5 == 4 || $statusE_DFF == 4 || $statusUHE_BR2 == 4 || $statusREST_1_3 == 4 || $statusSAPC_2 == 4 || $statusSAPC_4 == 4 ||
              $statusSAPC == 4 || $statusETR_Z6 == 4 || $statusSDA == 4 || $statusDA_115V == 4 || $statusRESC_10_12 == 4 || $statusRESC_7_9 == 4 || $statusRE_7_9 == 4 ||
              $statusSAPC_10 == 4 || $statusRESC_4_6 == 4 || $statusRE_4_6 == 4 || $statusSZ_3 == 4 || $statusACAPC == 4 || $statusRESC_1_3 == 4 || $statusRE_1_3 == 4 ||
              $statusSAPC_1 == 4 || $statusSZ_1_2 == 4 || $statusSPTR == 4 || $statusSP_DFF == 4) {
      $galvanizacao_ccm2_ccm3_status = 4;
    } elseif ($statusSAPC_9 == 3 || $statusSAPC_7 == 3 || $statusRE_JET_COOL_4_6 == 3 || $statusRE_RTS_SLOW_4_6 == 3 || $statusETR_Z5 == 3 || $statusRE_RTS_SLOW_1_3 == 3 ||
              $statusRE_JET_COOL_1_3 == 3 || $statusSAPC_6 == 3 || $statusSAPC_8 == 3 || $statusETR_Z4 == 3 || $statusRE_DFF_RTH_4_6 == 3 || $statusRE_JET_TOP_1_3 == 3 ||
              $statusSAPC_3 == 3 || $statusSAPC_5 == 3 || $statusE_DFF == 3 || $statusUHE_BR2 == 3 || $statusREST_1_3 == 3 || $statusSAPC_2 == 3 || $statusSAPC_4 == 3 ||
              $statusSAPC == 3 || $statusETR_Z6 == 3 || $statusSDA == 3 || $statusDA_115V == 3 || $statusRESC_10_12 == 3 || $statusRESC_7_9 == 3 || $statusRE_7_9 == 3 ||
              $statusSAPC_10 == 3 || $statusRESC_4_6 == 3 || $statusRE_4_6 == 3 || $statusSZ_3 == 3 || $statusACAPC == 3 || $statusRESC_1_3 == 3 || $statusRE_1_3 == 3 ||
              $statusSAPC_1 == 3 || $statusSZ_1_2 == 3 || $statusSPTR == 3 || $statusSP_DFF == 3) {
      $galvanizacao_ccm2_ccm3_status = 3;
    } else {
      $galvanizacao_ccm2_ccm3_status = "";
    }

    return $galvanizacao_ccm2_ccm3_status;
  }

  public static function galvanizacao_alarme_ccm4_ccm5_Menu() {
    $galvanizacao_alarme_ccm4_ccm5_status = "";
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA #4
    $tag_UHS_B4 = "TE 72 400 410 968 246 - 000001";
    $idAtividadeUHS_B4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_B4)->value('id');
    $idAnaliseUHS_B4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B4)->max('id');
    $statusUHS_B4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B4)->value('status_id');
    //SOPRADOR PRINCIPAL - MOTOR #3
    $tag_SP_M3 = "TE 72 400 410 967 093 - 000002";
    $idAtividadeSP_M3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SP_M3)->value('id');
    $idAnaliseSP_M3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSP_M3)->max('id');
    $statusSP_M3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSP_M3)->value('status_id');
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA #3
    $tag_UHS_B3 = "TE 72 400 410 968 243 - 000001";
    $idAtividadeUHS_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_B3)->value('id');
    $idAnaliseUHS_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B3)->max('id');
    $statusUHS_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B3)->value('status_id');
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA #2
    $tag_UHS_B2 = "TE 72 400 410 968 240 - 000001";
    $idAtividadeUHS_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_B2)->value('id');
    $idAnaliseUHS_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B2)->max('id');
    $statusUHS_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B2)->value('status_id');
    //DISTRIBUIÇÃO AUXILIAR 115V
    $tag_D_AUX_115V = "TE 72 400 410 968 141 - 000001";
    $idAtividadeD_AUX_115V = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_D_AUX_115V)->value('id');
    $idAnaliseD_AUX_115V = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD_AUX_115V)->max('id');
    $statusD_AUX_115V = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD_AUX_115V)->value('status_id');
    //AR CONDICIONADO
    $tag_AR_CON = "TE 72 400 410 967 093 - 000001";
    $idAtividadeAR_CON = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AR_CON)->value('id');
    $idAnaliseAR_CON = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAR_CON)->max('id');
    $statusAR_CON = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAR_CON)->value('status_id');
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA #1
    $tag_UHS_B1 = "TE 72 400 410 968 237 - 000001";
    $idAtividadeUHS_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_B1)->value('id');
    $idAnaliseUHS_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B1)->max('id');
    $statusUHS_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B1)->value('status_id');
    //PAINEL DE EMERGÊNCIA  04B5DA08
    $tag_PE_DA08 = "TE 72 400 410 559 000 - 000004";
    $idAtividadePE_DA08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_DA08)->value('id');
    $idAnalisePE_DA08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_DA08)->max('id');
    $statusPE_DA08 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_DA08)->value('status_id');
    //PAINEL DE EMERGÊNCIA  04B5DA07
    $tag_PE_DA07 = "TE 72 400 410 559 000 - 000003";
    $idAtividadePE_DA07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_DA07)->value('id');
    $idAnalisePE_DA07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_DA07)->max('id');
    $statusPE_DA07 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_DA07)->value('status_id');
    //PAINEL DE EMERGÊNCIA  04B5DA06
    $tag_PE_DA06 = "TE 72 400 410 559 000 - 000002";
    $idAtividadePE_DA06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_DA06)->value('id');
    $idAnalisePE_DA06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_DA06)->max('id');
    $statusPE_DA06 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_DA06)->value('status_id');
    //PAINEL DE EMERGÊNCIA  04B5DA05
    $tag_PE_DA05 = "TE 72 400 410 559 000 - 000001";
    $idAtividadePE_DA05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_DA05)->value('id');
    $idAnalisePE_DA05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_DA05)->max('id');
    $statusPE_DA05 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_DA05)->value('status_id');
    //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA DE RECIRCULAÇÃO
    $tag_UHS_BR = "TE 72 400 410 968 231 - 000001";
    $idAtividadeUHS_BR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_BR)->value('id');
    $idAnaliseUHS_BR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_BR)->max('id');
    $statusUHS_BR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_BR)->value('status_id');

    if ($statusUHS_B4 == 5 || $statusSP_M3 == 5 || $statusUHS_B3 == 5 || $statusUHS_B2 == 5 || $statusD_AUX_115V == 5 || $statusAR_CON == 5 ||
    $statusUHS_B1 == 5 || $statusPE_DA08 == 5 || $statusPE_DA07 == 5 || $statusPE_DA06 == 5 || $statusPE_DA05 == 5 || $statusUHS_BR == 5) {
      $galvanizacao_alarme_ccm4_ccm5_status = 5;
    } elseif ($statusUHS_B4 == 4 || $statusSP_M3 == 4 || $statusUHS_B3 == 4 || $statusUHS_B2 == 4 || $statusD_AUX_115V == 4 || $statusAR_CON == 4 ||
    $statusUHS_B1 == 4 || $statusPE_DA08 == 4 || $statusPE_DA07 == 4 || $statusPE_DA06 == 4 || $statusPE_DA05 == 4 || $statusUHS_BR == 4) {
      $galvanizacao_alarme_ccm4_ccm5_status = 4;
    } elseif ($statusUHS_B4 == 3 || $statusSP_M3 == 3 || $statusUHS_B3 == 3 || $statusUHS_B2 == 3 || $statusD_AUX_115V == 3 || $statusAR_CON == 3 ||
    $statusUHS_B1 == 3 || $statusPE_DA08 == 3 || $statusPE_DA07 == 3 || $statusPE_DA06 == 3 || $statusPE_DA05 == 3 || $statusUHS_BR == 3) {
      $galvanizacao_alarme_ccm4_ccm5_status = 3;
    } else {
      $galvanizacao_alarme_ccm4_ccm5_status = "";
    }

    return $galvanizacao_alarme_ccm4_ccm5_status;
  }

  public static function galvanizacao_drive_entrada_Menu() {
    $galvanizacao_drive_entrada_status = "";
    //SOPRADOR #2 INFRARED
    $tag_S_2_INFRA = "TE 72 400 410 557 000 - 000582";
    $idAtividadeS_2_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S_2_INFRA)->value('id');
    $idAnaliseS_2_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS_2_INFRA)->max('id');
    $statusS_2_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS_2_INFRA)->value('status_id');
    //SOPRADOR #4 INFRARED
    $tag_S_4_INFRA = "TE 72 400 410 557 000 - 000578";
    $idAtividadeS_4_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S_4_INFRA)->value('id');
    $idAnaliseS_4_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS_4_INFRA)->max('id');
    $statusS_4_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS_4_INFRA)->value('status_id');
    //NAVALHA DE AR - SOPRADOR #2
    $tag_NAR_S2 = "TE 72 400 410 557 000 - 000573";
    $idAtividadeNAR_S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAR_S2)->value('id');
    $idAnaliseNAR_S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_S2)->max('id');
    $statusNAR_S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_S2)->value('status_id');
    //NAVALHA DE AR - SOPRADOR #1
    $tag_NAR_S1 = "TE 72 400 410 557 000 - 000569";
    $idAtividadeNAR_S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAR_S1)->value('id');
    $idAnaliseNAR_S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_S1)->max('id');
    $statusNAR_S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_S1)->value('status_id');
    //MÓDULO DE FRENAGEM (2)
    $tag_MOD_FRE_2 = "TE 72 400 410 557 000 - 000555";
    $idAtividadeMOD_FRE_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MOD_FRE_2)->value('id');
    $idAnaliseMOD_FRE_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMOD_FRE_2)->max('id');
    $statusMOD_FRE_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMOD_FRE_2)->value('status_id');
    //ENTRADA
    $tag_ENTRADA_1 = "TE 72 400 410 557 000 - 000551";
    $idAtividadeENTRADA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ENTRADA_1)->value('id');
    $idAnaliseENTRADA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENTRADA_1)->max('id');
    $statusENTRADA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENTRADA_1)->value('status_id');
    //MÓDULO DE FRENAGEM (2)
    $tag_MOD_FRE = "TE 72 400 410 557 000 - 000537";
    $idAtividadeMOD_FRE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MOD_FRE)->value('id');
    $idAnaliseMOD_FRE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMOD_FRE)->max('id');
    $statusMOD_FRE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMOD_FRE)->value('status_id');
    //ACUMULADOR DE ENTRADA
    $tag_A_ENTRADA = "TE 72 400 410 557 000 - 000531";
    $idAtividadeA_ENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_ENTRADA)->value('id');
    $idAnaliseA_ENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_ENTRADA)->max('id');
    $statusA_ENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_ENTRADA)->value('status_id');
    //TENSOR 1 ROLO #2
    $tag_T1_R2 = "TE 72 400 410 557 000 - 000529";
    $idAtividadeT1_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_T1_R2)->value('id');
    $idAnaliseT1_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT1_R2)->max('id');
    $statusT1_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT1_R2)->value('status_id');
    //TENSOR 1 ROLO #1
    $tag_T1_R1 = "TE 72 400 410 557 000 - 000527";
    $idAtividadeT1_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_T1_R1)->value('id');
    $idAnaliseT1_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT1_R1)->max('id');
    $statusT1_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT1_R1)->value('status_id');
    //SOPRADOR #1 INFRARED
    $tag_S1_INFRA = "TE 72 400 410 557 000 - 000525";
    $idAtividadeS1_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_INFRA)->value('id');
    $idAnaliseS1_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_INFRA)->max('id');
    $statusS1_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_INFRA)->value('status_id');
    //SOPRADOR #3 INFRARED
    $tag_S3_INFRA = "TE 72 400 410 557 000 - 000523";
    $idAtividadeS3_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S3_INFRA)->value('id');
    $idAnaliseS3_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS3_INFRA)->max('id');
    $statusS3_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS3_INFRA)->value('status_id');
    //ROLO DEFLETOR #15 - FORNO
    $tag_RD_15 = "TE 72 400 410 557 000 - 000509";
    $idAtividadeRD_15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_15)->value('id');
    $idAnaliseRD_15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_15)->max('id');
    $statusRD_15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_15)->value('status_id');
    //ROLO DEFLETOR #18 - FORNO
    $tag_RD_18 = "TE 72 400 410 557 000 - 000516";
    $idAtividadeRD_18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_18)->value('id');
    $idAnaliseRD_18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_18)->max('id');
    $statusRD_18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_18)->value('status_id');
    //ROLO DEFLETOR #17 - FORNO
    $tag_RD_17 = "TE 72 400 410 557 000 - 000507";
    $idAtividadeRD_17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_17)->value('id');
    $idAnaliseRD_17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_17)->max('id');
    $statusRD_17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_17)->value('status_id');
    //ROLO DEFLETOR #16 - FORNO
    $tag_RD_16 = "TE 72 400 410 557 000 - 000505";
    $idAtividadeRD_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_16)->value('id');
    $idAnaliseRD_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_16)->max('id');
    $statusRD_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_16)->value('status_id');
    //RETIFICADOR 630KW - MESTRE
    $tag_R_630_MESTRE = "TE 72 400 410 557 000 - 000502";
    $idAtividadeR_630_MESTRE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_R_630_MESTRE)->value('id');
    $idAnaliseR_630_MESTRE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR_630_MESTRE)->max('id');
    $statusR_630_MESTRE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR_630_MESTRE)->value('status_id');
    //RETIFICADOR 630KW - ESCRAVO 1
    $tag_R_630_ESCRAVO_1 = "TE 72 400 410 557 000 - 000587";
    $idAtividadeR_630_ESCRAVO_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_R_630_ESCRAVO_1)->value('id');
    $idAnaliseR_630_ESCRAVO_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR_630_ESCRAVO_1)->max('id');
    $statusR_630_ESCRAVO_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR_630_ESCRAVO_1)->value('status_id');
    //RETIFICADOR 630KW - ESCRAVO 2
    $tag_R_630_ESCRAVO_2 = "TE 72 400 410 557 000 - 000501";
    $idAtividadeR_630_ESCRAVO_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_R_630_ESCRAVO_2)->value('id');
    $idAnaliseR_630_ESCRAVO_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR_630_ESCRAVO_2)->max('id');
    $statusR_630_ESCRAVO_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR_630_ESCRAVO_2)->value('status_id');
    //DESENROLADEIRA 2
    $tag_DESENROLADEIRA_2 = "TE 72 400 410 557 000 - 000498";
    $idAtividadeDESENROLADEIRA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESENROLADEIRA_2)->value('id');
    $idAnaliseDESENROLADEIRA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENROLADEIRA_2)->max('id');
    $statusDESENROLADEIRA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENROLADEIRA_2)->value('status_id');
    //DESENROLADEIRA 1
    $tag_DESENROLADEIRA_1 = "TE 72 400 410 557 000 - 000494";
    $idAtividadeDESENROLADEIRA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESENROLADEIRA_1)->value('id');
    $idAnaliseDESENROLADEIRA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENROLADEIRA_1)->max('id');
    $statusDESENROLADEIRA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENROLADEIRA_1)->value('status_id');
    //FORNO - PRÉ AQUECIMENTO ROLO SELO #3B - INFERIOR
    $tag_FPARS_3B = "TE 72 400 410 557 000 - 000487";
    $idAtividadeFPARS_3B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_3B)->value('id');
    $idAnaliseFPARS_3B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_3B)->max('id');
    $statusFPARS_3B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_3B)->value('status_id');
    //FORNO - PRÉ AQUECIMENTO ROLO SELO #3A - SUPERIOR
    $tag_FPARS_3A = "TE 72 400 410 557 000 - 000480";
    $idAtividadeFPARS_3A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_3A)->value('id');
    $idAnaliseFPARS_3A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_3A)->max('id');
    $statusFPARS_3A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_3A)->value('status_id');
    //FORNO - PRÉ AQUECIMENTO ROLO SELO #2B - INFERIOR
    $tag_FPARS_2B = "TE 72 400 410 557 000 - 000473";
    $idAtividadeFPARS_2B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_2B)->value('id');
    $idAnaliseFPARS_2B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_2B)->max('id');
    $statusFPARS_2B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_2B)->value('status_id');
    //FORNO - PRÉ AQUECIMENTO ROLO SELO #2A - SUPERIOR
    $tag_FPARS_2A = "TE 72 400 410 557 000 - 000466";
    $idAtividadeFPARS_2A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_2A)->value('id');
    $idAnaliseFPARS_2A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_2A)->max('id');
    $statusFPARS_2A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_2A)->value('status_id');
    //FORNO - PRÉ AQUECIMENTO ROLO SELO #1B - SAÍDA
    $tag_FPARS_1B = "TE 72 400 410 557 000 - 000459";
    $idAtividadeFPARS_1B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_1B)->value('id');
    $idAnaliseFPARS_1B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_1B)->max('id');
    $statusFPARS_1B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_1B)->value('status_id');
    //FORNO - PRÉ AQUECIMENTO ROLO SELO #1A - ENTRADA
    $tag_FPARS_1A = "TE 72 400 410 557 000 - 000452";
    $idAtividadeFPARS_1A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_1A)->value('id');
    $idAnaliseFPARS_1A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_1A)->max('id');
    $statusFPARS_1A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_1A)->value('status_id');
    //SOPRADOR DE RESFRIAMENTO INFRARED
    $tag_SRI = "TE 72 400 410 557 000 - 000445";
    $idAtividadeSRI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SRI)->value('id');
    $idAnaliseSRI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSRI)->max('id');
    $statusSRI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSRI)->value('status_id');
    //EXAUSTOR DO INFRARED
    $tag_EXAS_INFRA = "TE 72 400 410 557 000 - 000438";
    $idAtividadeEXAS_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAS_INFRA)->value('id');
    $idAnaliseEXAS_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAS_INFRA)->max('id');
    $statusEXAS_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAS_INFRA)->value('status_id');
    //ELEVADOR DO FORNO
    $tag_ELEV_FORNO = "TE 72 400 410 557 000 - 000436";
    $idAtividadeELEV_FORNO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ELEV_FORNO)->value('id');
    $idAnaliseELEV_FORNO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV_FORNO)->max('id');
    $statusELEV_FORNO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV_FORNO)->value('status_id');
    //RESFRIAMENTO RÁPIDO - JET COOLER #8
    $tag_RR_JC_8 = "TE 72 400 410 557 000 - 000429";
    $idAtividadeRR_JC_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_8)->value('id');
    $idAnaliseRR_JC_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_8)->max('id');
    $statusRR_JC_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_8)->value('status_id');
    //RESFRIAMENTO RÁPIDO - JET COOLER #7
    $tag_RR_JC_7 = "TE 72 400 410 557 000 - 000422";
    $idAtividadeRR_JC_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_7)->value('id');
    $idAnaliseRR_JC_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_7)->max('id');
    $statusRR_JC_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_7)->value('status_id');
    //RESFRIAMENTO RÁPIDO - JET COOLER #6
    $tag_RR_JC_6 = "TE 72 400 410 557 000 - 000415";
    $idAtividadeRR_JC_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_6)->value('id');
    $idAnaliseRR_JC_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_6)->max('id');
    $statusRR_JC_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_6)->value('status_id');
    //RESFRIAMENTO RÁPIDO - JET COOLER #5
    $tag_RR_JC_5 = "TE 72 400 410 557 000 - 000408";
    $idAtividadeRR_JC_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_5)->value('id');
    $idAnaliseRR_JC_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_5)->max('id');
    $statusRR_JC_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_5)->value('status_id');
    //RESFRIAMENTO RÁPIDO - JET COOLER #4
    $tag_RR_JC_4 = "TE 72 400 410 557 000 - 000401";
    $idAtividadeRR_JC_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_4)->value('id');
    $idAnaliseRR_JC_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_4)->max('id');
    $statusRR_JC_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_4)->value('status_id');
    //RESFRIAMENTO RÁPIDO - JET COOLER #3
    $tag_RR_JC_3 = "TE 72 400 410 557 000 - 000394";
    $idAtividadeRR_JC_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_3)->value('id');
    $idAnaliseRR_JC_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_3)->max('id');
    $statusRR_JC_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_3)->value('status_id');
    //RESFRIAMENTO RÁPIDO - JET COOLER #2
    $tag_RR_JC_2 = "TE 72 400 410 557 000 - 000387";
    $idAtividadeRR_JC_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_2)->value('id');
    $idAnaliseRR_JC_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_2)->max('id');
    $statusRR_JC_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_2)->value('status_id');
    //RESFRIAMENTO RÁPIDO - JET COOLER #1
    $tag_RR_JC_1 = "TE 72 400 410 557 000 - 000380";
    $idAtividadeRR_JC_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_1)->value('id');
    $idAnaliseRR_JC_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_1)->max('id');
    $statusRR_JC_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_1)->value('status_id');
    //EXAUSTOR #4 - RESFRIAMENTO LENTO
    $tag_EXAUSTOR_4 = "TE 72 400 410 557 000 - 000373";
    $idAtividadeEXAUSTOR_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAUSTOR_4)->value('id');
    $idAnaliseEXAUSTOR_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAUSTOR_4)->max('id');
    $statusEXAUSTOR_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAUSTOR_4)->value('status_id');
    //EXAUSTOR #3 - RESFRIAMENTO LENTO
    $tag_EXAUSTOR_3 = "TE 72 400 410 557 000 - 000366";
    $idAtividadeEXAUSTOR_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAUSTOR_3)->value('id');
    $idAnaliseEXAUSTOR_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAUSTOR_3)->max('id');
    $statusEXAUSTOR_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAUSTOR_3)->value('status_id');
    //EXAUSTOR #2 - RESFRIAMENTO LENTO
    $tag_EXAUSTOR_2 = "TE 72 400 410 557 000 - 000359";
    $idAtividadeEXAUSTOR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAUSTOR_2)->value('id');
    $idAnaliseEXAUSTOR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAUSTOR_2)->max('id');
    $statusEXAUSTOR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAUSTOR_2)->value('status_id');
    //EXAUSTOR #1 - RESFRIAMENTO LENTO
    $tag_EXAUSTOR_1 = "TE 72 400 410 557 000 - 000352";
    $idAtividadeEXAUSTOR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAUSTOR_1)->value('id');
    $idAnaliseEXAUSTOR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAUSTOR_1)->max('id');
    $statusEXAUSTOR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAUSTOR_1)->value('status_id');
    //ROLO SECADOR #2 SPRAY DE ENXÁGUE - LIMPEZA ELETROLÍTICA
    $tag_RS_2_SELE = "TE 72 400 410 557 000 - 000345";
    $idAtividadeRS_2_SELE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_2_SELE)->value('id');
    $idAnaliseRS_2_SELE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_2_SELE)->max('id');
    $statusRS_2_SELE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_2_SELE)->value('status_id');
    //ROLO SECADOR #1 SPRAY DE ENXÁGUE - LIMPEZA ELETROLÍTICA
    $tag_RS_1_SELE = "TE 72 400 410 557 000 - 000338";
    $idAtividadeRS_1_SELE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_1_SELE)->value('id');
    $idAnaliseRS_1_SELE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_1_SELE)->max('id');
    $statusRS_1_SELE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_1_SELE)->value('status_id');
    //ROLO SECADOR - ESCOVA DE LIMPEZA
    $tag_RSEL = "TE 72 400 410 557 000 - 000331";
    $idAtividadeRSEL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RSEL)->value('id');
    $idAnaliseRSEL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRSEL)->max('id');
    $statusRSEL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRSEL)->value('status_id');
    //ROLO BACKUP #4 - ESCOVA DE LIMPEZA
    $tag_RB_4_EL = "TE 72 400 410 557 000 - 000324";
    $idAtividadeRB_4_EL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RB_4_EL)->value('id');
    $idAnaliseRB_4_EL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRB_4_EL)->max('id');
    $statusRB_4_EL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRB_4_EL)->value('status_id');
    //ROLO BACKUP #3 - ESCOVA DE LIMPEZA
    $tag_RB_3_EL = "TE 72 400 410 557 000 - 000317";
    $idAtividadeRB_3_EL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RB_3_EL)->value('id');
    $idAnaliseRB_3_EL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRB_3_EL)->max('id');
    $statusRB_3_EL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRB_3_EL)->value('status_id');
    //ROLO BACKUP #2 - ESCOVA DE LIMPEZA
    $tag_RB_2_EL = "TE 72 400 410 557 000 - 000310";
    $idAtividadeRB_2_EL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RB_2_EL)->value('id');
    $idAnaliseRB_2_EL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRB_2_EL)->max('id');
    $statusRB_2_EL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRB_2_EL)->value('status_id');
    //ROLO BACKUP #1 - ESCOVA DE LIMPEZA
    $tag_RB_1_EL = "TE 72 400 410 557 000 - 000303";
    $idAtividadeRB_1_EL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RB_1_EL)->value('id');
    $idAnaliseRB_1_EL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRB_1_EL)->max('id');
    $statusRB_1_EL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRB_1_EL)->value('status_id');
    //ROLO SECADOR - LIMPEZA ELETROLÍTICA
    $tag_RS_LE = "TE 72 400 410 557 000 - 000586";
    $idAtividadeRS_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_LE)->value('id');
    $idAnaliseRS_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_LE)->max('id');
    $statusRS_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_LE)->value('status_id');
    //ROLO DEFLETOR #4 - LIMPEZA ELETROLÍTICA
    $tag_RD_4_LE = "TE 72 400 410 557 000 - 000296";
    $idAtividadeRD_4_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_4_LE)->value('id');
    $idAnaliseRD_4_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_4_LE)->max('id');
    $statusRD_4_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_4_LE)->value('status_id');
    //ROLO DEFLETOR #3 - LIMPEZA ELETROLÍTICA
    $tag_RD_3_LE = "TE 72 400 410 557 000 - 000289";
    $idAtividadeRD_3_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_3_LE)->value('id');
    $idAnaliseRD_3_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_3_LE)->max('id');
    $statusRD_3_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_3_LE)->value('status_id');
    //ROLO DEFLETOR #2 - LIMPEZA ELETROLÍTICA
    $tag_RD_2_LE = "TE 72 400 410 557 000 - 000282";
    $idAtividadeRD_2_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_2_LE)->value('id');
    $idAnaliseRD_2_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_2_LE)->max('id');
    $statusRD_2_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_2_LE)->value('status_id');
    //ROLO DEFLETOR #1 - LIMPEZA ELETROLÍTICA
    $tag_RD_1_LE = "TE 72 400 410 557 000 - 000275";
    $idAtividadeRD_1_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_1_LE)->value('id');
    $idAnaliseRD_1_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_1_LE)->max('id');
    $statusRD_1_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_1_LE)->value('status_id');
    //ROLO PRESSIONADOR TENSOR #1
    $tag_RPT_1 = "TE 72 400 410 557 000 - 000268";
    $idAtividadeRPT_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RPT_1)->value('id');
    $idAnaliseRPT_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPT_1)->max('id');
    $statusRPT_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPT_1)->value('status_id');
    //PUXADORES #3
    $tag_PUXADOR_3 = "TE 72 400 410 557 000 - 000262";
    $idAtividadePUXADOR_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PUXADOR_3)->value('id');
    $idAnalisePUXADOR_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePUXADOR_3)->max('id');
    $statusPUXADOR_3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePUXADOR_3)->value('status_id');
    //PUXADOR DESEMPENADEIRA #1
    $tag_PD_1 = "TE 72 400 410 557 000 - 000255";
    $idAtividadePD_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PD_1)->value('id');
    $idAnalisePD_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePD_1)->max('id');
    $statusPD_1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePD_1)->value('status_id');
    //DESEMPENADEIRA #1
    $tag_DESEMP1 = "TE 72 400 410 557 000 - 000248";
    $idAtividadeDESEMP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESEMP1)->value('id');
    $idAnaliseDESEMP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEMP1)->max('id');
    $statusDESEMP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEMP1)->value('status_id');
    //ALIMENTAÇÃO DE ENTRADA
    $tag_ALIM_ENTRADA = "TE 72 400 410 557 000 - 000243";
    $idAtividadeALIM_ENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_ENTRADA)->value('id');
    $idAnaliseALIM_ENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_ENTRADA)->max('id');
    $statusALIM_ENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_ENTRADA)->value('status_id');
    //ROLO DEFLETOR DFF #1 - FORNO
    $tag_RD_DFF_1 = "TE 72 400 410 557 000 - 000222";
    $idAtividadeRD_DFF_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_DFF_1)->value('id');
    $idAnaliseRD_DFF_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_DFF_1)->max('id');
    $statusRD_DFF_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_DFF_1)->value('status_id');
    //ROLO DEFLETOR DFF #2 - FORNO
    $tag_RD_DFF_2 = "TE 72 400 410 557 000 - 000229";
    $idAtividadeRD_DFF_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_DFF_2)->value('id');
    $idAnaliseRD_DFF_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_DFF_2)->max('id');
    $statusRD_DFF_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_DFF_2)->value('status_id');
    //ROLO DEFLETOR DFF #3 - FORNO
    $tag_RD_DFF_3 = "TE 72 400 410 557 000 - 000236";
    $idAtividadeRD_DFF_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_DFF_3)->value('id');
    $idAnaliseRD_DFF_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_DFF_3)->max('id');
    $statusRD_DFF_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_DFF_3)->value('status_id');
    //ROLO DO QUENCH TANQUE
    $tag_RQT = "TE 72 400 410 557 000 - 000201";
    $idAtividadeRQT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RQT)->value('id');
    $idAnaliseRQT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRQT)->max('id');
    $statusRQT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRQT)->value('status_id');
    //ROLO SECADOR SUPERIOR - QUENCH TANQUE
    $tag_RSS_QT = "TE 72 400 410 557 000 - 000208";
    $idAtividadeRSS_QT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RSS_QT)->value('id');
    $idAnaliseRSS_QT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRSS_QT)->max('id');
    $statusRSS_QT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRSS_QT)->value('status_id');
    //ROLO SECADOR INFERIOR - QUENCH TANQUE
    $tag_RSI_QT = "TE 72 400 410 557 000 - 000215";
    $idAtividadeRSI_QT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RSI_QT)->value('id');
    $idAnaliseRSI_QT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRSI_QT)->max('id');
    $statusRSI_QT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRSI_QT)->value('status_id');
    //DEFLETOR #1 - TORRE DO APC
    $tag_D_1_TAPC = "TE 72 400 410 557 000 - 000173";
    $idAtividadeD_1_TAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_D_1_TAPC)->value('id');
    $idAnaliseD_1_TAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD_1_TAPC)->max('id');
    $statusD_1_TAPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD_1_TAPC)->value('status_id');
    //PRESSIONADOR DEFLETOR #1 - TORRE DO APC
    $tag_PD_1_TAPC = "TE 72 400 410 557 000 - 000180";
    $idAtividadePD_1_TAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PD_1_TAPC)->value('id');
    $idAnalisePD_1_TAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePD_1_TAPC)->max('id');
    $statusPD_1_TAPC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePD_1_TAPC)->value('status_id');
    //DEFLETOR #2 - TORRE DO APC
    $tag_D_2_TAPC = "TE 72 400 410 557 000 - 000187";
    $idAtividadeD_2_TAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_D_2_TAPC)->value('id');
    $idAnaliseD_2_TAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD_2_TAPC)->max('id');
    $statusD_2_TAPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD_2_TAPC)->value('status_id');
    //PRESSIONADOR DEFLETOR #2 - TORRE DO APC
    $tag_PD_2_TAPC = "TE 72 400 410 557 000 - 000194";
    $idAtividadePD_2_TAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PD_2_TAPC)->value('id');
    $idAnalisePD_2_TAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePD_2_TAPC)->max('id');
    $statusPD_2_TAPC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePD_2_TAPC)->value('status_id');
    //ROLO DEFLETOR #11 - FORNO
    $tag_RD_11 = "TE 72 400 410 557 000 - 000141";
    $idAtividadeRD_11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_11)->value('id');
    $idAnaliseRD_11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_11)->max('id');
    $statusRD_11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_11)->value('status_id');
    //ROLO DEFLETOR #12 - FORNO
    $tag_RD_12 = "TE 72 400 410 557 000 - 000148";
    $idAtividadeRD_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_12)->value('id');
    $idAnaliseRD_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_12)->max('id');
    $statusRD_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_12)->value('status_id');
    //ROLO DEFLETOR #13 - FORNO
    $tag_RD_13 = "TE 72 400 410 557 000 - 000155";
    $idAtividadeRD_13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_13)->value('id');
    $idAnaliseRD_13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_13)->max('id');
    $statusRD_13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_13)->value('status_id');
    //ROLO DEFLETOR #14 - FORNO
    $tag_RD_14 = "TE 72 400 410 557 000 - 000162";
    $idAtividadeRD_14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_14)->value('id');
    $idAnaliseRD_14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_14)->max('id');
    $statusRD_14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_14)->value('status_id');
    //ROLO DEFLETOR #7 - FORNO
    $tag_RD_7 = "TE 72 400 410 557 000 - 000113";
    $idAtividadeRD_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_7)->value('id');
    $idAnaliseRD_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_7)->max('id');
    $statusRD_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_7)->value('status_id');
    //ROLO DEFLETOR #8 - FORNO
    $tag_RD_8 = "TE 72 400 410 557 000 - 000120";
    $idAtividadeRD_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_8)->value('id');
    $idAnaliseRD_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_8)->max('id');
    $statusRD_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_8)->value('status_id');
    //ROLO DEFLETOR #9 - FORNO
    $tag_RD_9 = "TE 72 400 410 557 000 - 000127";
    $idAtividadeRD_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_9)->value('id');
    $idAnaliseRD_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_9)->max('id');
    $statusRD_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_9)->value('status_id');
    //ROLO DEFLETOR #10 - FORNO
    $tag_RD_10 = "TE 72 400 410 557 000 - 000134";
    $idAtividadeRD_10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_10)->value('id');
    $idAnaliseRD_10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_10)->max('id');
    $statusRD_10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_10)->value('status_id');
    //ROLO DEFLETOR #4 - FORNO
    $tag_RD_4 = "TE 72 400 410 557 000 - 000092";
    $idAtividadeRD_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_4)->value('id');
    $idAnaliseRD_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_4)->max('id');
    $statusRD_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_4)->value('status_id');
    //ROLO DEFLETOR #5 - FORNO
    $tag_RD_5 = "TE 72 400 410 557 000 - 000099";
    $idAtividadeRD_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_5)->value('id');
    $idAnaliseRD_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_5)->max('id');
    $statusRD_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_5)->value('status_id');
    //ROLO DEFLETOR #6 - FORNO
    $tag_RD_6 = "TE 72 400 410 557 000 - 000106";
    $idAtividadeRD_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_6)->value('id');
    $idAnaliseRD_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_6)->max('id');
    $statusRD_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_6)->value('status_id');
    //TENSOR N° 2 ROLO #1
    $tag_T_2_R_1 = "TE 72 400 410 557 000 - 000078";
    $idAtividadeT_2_R_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_T_2_R_1)->value('id');
    $idAnaliseT_2_R_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT_2_R_1)->max('id');
    $statusT_2_R_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT_2_R_1)->value('status_id');
    //TENSOR N° 2 ROLO #2
    $tag_T_2_R_2 = "TE 72 400 410 557 000 - 000085";
    $idAtividadeT_2_R_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_T_2_R_2)->value('id');
    $idAnaliseT_2_R_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT_2_R_2)->max('id');
    $statusT_2_R_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT_2_R_2)->value('status_id');
    //ROLO ESCOVA #3
    $tag_RE_3 = "TE 72 400 410 557 000 - 000064";
    $idAtividadeRE_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_3)->value('id');
    $idAnaliseRE_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_3)->max('id');
    $statusRE_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_3)->value('status_id');
    //ROLO ESCOVA #4
    $tag_RE_4 = "TE 72 400 410 557 000 - 000071";
    $idAtividadeRE_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_4)->value('id');
    $idAnaliseRE_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_4)->max('id');
    $statusRE_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_4)->value('status_id');
    //ROLO ESCOVA #1
    $tag_RE_1 = "TE 72 400 410 557 000 - 000050";
    $idAtividadeRE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_1)->value('id');
    $idAnaliseRE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_1)->max('id');
    $statusRE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_1)->value('status_id');
    //ROLO ESCOVA #2
    $tag_RE_2 = "TE 72 400 410 557 000 - 000057";
    $idAtividadeRE_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_2)->value('id');
    $idAnaliseRE_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_2)->max('id');
    $statusRE_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_2)->value('status_id');
    //ROLO SECADOR #1 LIMPEZA ALCALINA
    $tag_RS_1_LA = "TE 72 400 410 557 000 - 000022";
    $idAtividadeRS_1_LA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_1_LA)->value('id');
    $idAnaliseRS_1_LA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_1_LA)->max('id');
    $statusRS_1_LA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_1_LA)->value('status_id');
    //ROLO SECADOR #2 LIMPEZA ALCALINA
    $tag_RS_2_LA = "TE 72 400 410 557 000 - 000029";
    $idAtividadeRS_2_LA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_2_LA)->value('id');
    $idAnaliseRS_2_LA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_2_LA)->max('id');
    $statusRS_2_LA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_2_LA)->value('status_id');
    //ROLO SECADOR #1 SPRAY DE ENXÁGUE - LIMPEZA ALCALINA
    $tag_RS_1_SELA = "TE 72 400 410 557 000 - 000036";
    $idAtividadeRS_1_SELA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_1_SELA)->value('id');
    $idAnaliseRS_1_SELA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_1_SELA)->max('id');
    $statusRS_1_SELA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_1_SELA)->value('status_id');
    //ROLO SECADOR #2 SPRAY DE ENXÁGUE - LIMPEZA ALCALINA
    $tag_RS_2_SELA = "TE 72 400 410 557 000 - 000043";
    $idAtividadeRS_2_SELA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_2_SELA)->value('id');
    $idAnaliseRS_2_SELA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_2_SELA)->max('id');
    $statusRS_2_SELA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_2_SELA)->value('status_id');
    //DESEMPENADEIRA 2
    $tag_DESMP_2 = "TE 72 400 410 557 000 - 000001";
    $idAtividadeDESMP_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESMP_2)->value('id');
    $idAnaliseDESMP_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESMP_2)->max('id');
    $statusDESMP_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESMP_2)->value('status_id');
    //DESEMPENADEIRA 2 - PINCH ROLL
    $tag_DESEM_PR = "TE 72 400 410 557 000 - 000008";
    $idAtividadeDESEM_PR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESEM_PR)->value('id');
    $idAnaliseDESEM_PR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEM_PR)->max('id');
    $statusDESEM_PR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEM_PR)->value('status_id');
    //CORREIA TRANSPORTADORA PASS LINE
    $tag_CTPL = "TE 72 400 410 557 000 - 000015";
    $idAtividadeCTPL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CTPL)->value('id');
    $idAnaliseCTPL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCTPL)->max('id');
    $statusCTPL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCTPL)->value('status_id');



    if ($statusS_2_INFRA == 5 || $statusS_4_INFRA == 5 || $statusNAR_S2 == 5 || $statusNAR_S1 == 5 || $statusMOD_FRE_2 == 5 || $statusENTRADA_1 == 5 || $statusMOD_FRE == 5 ||
    $statusA_ENTRADA == 5 || $statusT1_R2 == 5 || $statusT1_R1 == 5 || $statusS1_INFRA == 5 || $statusS3_INFRA == 5 || $statusRD_15 == 5 || $statusRD_18 == 5 ||
    $statusRD_17 == 5 || $statusRD_16 == 5 || $statusR_630_MESTRE == 5 || $statusR_630_ESCRAVO_1 == 5 || $statusR_630_ESCRAVO_2 == 5 || $statusDESENROLADEIRA_2 == 5 ||
    $statusDESENROLADEIRA_1 == 5 || $statusFPARS_3B == 5 || $statusFPARS_3A == 5 || $statusFPARS_2B == 5 || $statusFPARS_2A == 5 || $statusFPARS_1B == 5 ||
    $statusFPARS_1A == 5 || $statusSRI == 5 || $statusEXAS_INFRA == 5 || $statusELEV_FORNO == 5 || $statusRR_JC_8 == 5 || $statusRR_JC_7 == 5 ||
    $statusRR_JC_6 == 5 || $statusRR_JC_5 == 5 || $statusRR_JC_4 == 5 || $statusRR_JC_3 == 5 || $statusRR_JC_2 == 5 || $statusRR_JC_1 == 5 || $statusEXAUSTOR_4 == 5 ||
    $statusEXAUSTOR_3 == 5 || $statusEXAUSTOR_2 == 5 || $statusEXAUSTOR_1 == 5 || $statusRS_2_SELE == 5 || $statusRS_1_SELE == 5 || $statusRSEL == 5 ||
    $statusRB_4_EL == 5 || $statusRB_3_EL == 5 || $statusRB_2_EL == 5 || $statusRB_1_EL == 5 || $statusRS_LE == 5 || $statusRD_4_LE == 5 || $statusRD_3_LE == 5 ||
    $statusRD_2_LE == 5 || $statusRD_1_LE == 5 || $statusRPT_1 == 5 || $statusPUXADOR_3 == 5 || $statusPD_1 == 5 || $statusDESEMP1 == 5 || $statusALIM_ENTRADA == 5 ||
    $statusRD_DFF_1 == 5 || $statusRD_DFF_2 == 5 || $statusRD_DFF_3 == 5 || $statusRQT == 5 || $statusRSS_QT == 5 || $statusRSI_QT == 5 || $statusD_1_TAPC == 5 ||
    $statusPD_1_TAPC == 5 || $statusD_2_TAPC == 5 || $statusPD_2_TAPC == 5 || $statusRD_11 == 5 || $statusRD_12 == 5 || $statusRD_13 == 5 || $statusRD_14 == 5 ||
    $statusRD_7 == 5 || $statusRD_8 == 5 || $statusRD_9 == 5 || $statusRD_10 == 5 || $statusRD_4 == 5 || $statusRD_5 == 5 || $statusRD_6 == 5 || $statusT_2_R_1 == 5 ||
    $statusT_2_R_2 == 5 || $statusRE_3 == 5 || $statusRE_4 == 5 || $statusRE_1 == 5 || $statusRE_2 == 5 || $statusRS_1_LA == 5 || $statusRS_2_LA == 5 || $statusRS_1_SELA == 5 ||
    $statusRS_2_SELA == 5 || $statusDESMP_2 == 5 || $statusDESEM_PR == 5 || $statusCTPL == 5) {
      $galvanizacao_drive_entrada_status = 5;
    } elseif ($statusS_2_INFRA == 4 || $statusS_4_INFRA == 4 || $statusNAR_S2 == 4 || $statusNAR_S1 == 4 || $statusMOD_FRE_2 == 4 || $statusENTRADA_1 == 4 || $statusMOD_FRE == 4 ||
    $statusA_ENTRADA == 4 || $statusT1_R2 == 4 || $statusT1_R1 == 4 || $statusS1_INFRA == 4 || $statusS3_INFRA == 4 || $statusRD_15 == 4 || $statusRD_18 == 4 ||
    $statusRD_17 == 4 || $statusRD_16 == 4 || $statusR_630_MESTRE == 4 || $statusR_630_ESCRAVO_1 == 4 || $statusR_630_ESCRAVO_2 == 4 || $statusDESENROLADEIRA_2 == 4 ||
    $statusDESENROLADEIRA_1 == 4 || $statusFPARS_3B == 4 || $statusFPARS_3A == 4 || $statusFPARS_2B == 4 || $statusFPARS_2A == 4 || $statusFPARS_1B == 4 ||
    $statusFPARS_1A == 4 || $statusSRI == 4 || $statusEXAS_INFRA == 4 || $statusELEV_FORNO == 4 || $statusRR_JC_8 == 4 || $statusRR_JC_7 == 4 ||
    $statusRR_JC_6 == 4 || $statusRR_JC_5 == 4 || $statusRR_JC_4 == 4 || $statusRR_JC_3 == 4 || $statusRR_JC_2 == 4 || $statusRR_JC_1 == 4 || $statusEXAUSTOR_4 == 4 ||
    $statusEXAUSTOR_3 == 4 || $statusEXAUSTOR_2 == 4 || $statusEXAUSTOR_1 == 4 || $statusRS_2_SELE == 4 || $statusRS_1_SELE == 4 || $statusRSEL == 4 ||
    $statusRB_4_EL == 4 || $statusRB_3_EL == 4 || $statusRB_2_EL == 4 || $statusRB_1_EL == 4 || $statusRS_LE == 4 || $statusRD_4_LE == 4 || $statusRD_3_LE == 4 ||
    $statusRD_2_LE == 4 || $statusRD_1_LE == 4 || $statusRPT_1 == 4 || $statusPUXADOR_3 == 4 || $statusPD_1 == 4 || $statusDESEMP1 == 4 || $statusALIM_ENTRADA == 4 ||
    $statusRD_DFF_1 == 4 || $statusRD_DFF_2 == 4 || $statusRD_DFF_3 == 4 || $statusRQT == 4 || $statusRSS_QT == 4 || $statusRSI_QT == 4 || $statusD_1_TAPC == 4 ||
    $statusPD_1_TAPC == 4 || $statusD_2_TAPC == 4 || $statusPD_2_TAPC == 4 || $statusRD_11 == 4 || $statusRD_12 == 4 || $statusRD_13 == 4 || $statusRD_14 == 4 ||
    $statusRD_7 == 4 || $statusRD_8 == 4 || $statusRD_9 == 4 || $statusRD_10 == 4 || $statusRD_4 == 4 || $statusRD_5 == 4 || $statusRD_6 == 4 || $statusT_2_R_1 == 4 ||
    $statusT_2_R_2 == 4 || $statusRE_3 == 4 || $statusRE_4 == 4 || $statusRE_1 == 4 || $statusRE_2 == 4 || $statusRS_1_LA == 4 || $statusRS_2_LA == 4 || $statusRS_1_SELA == 4 ||
    $statusRS_2_SELA == 4 || $statusDESMP_2 == 4 || $statusDESEM_PR == 4 || $statusCTPL == 4) {
      $galvanizacao_drive_entrada_status = 4;
    } elseif ($statusS_2_INFRA == 3 || $statusS_4_INFRA == 3 || $statusNAR_S2 == 3 || $statusNAR_S1 == 3 || $statusMOD_FRE_2 == 3 || $statusENTRADA_1 == 3 || $statusMOD_FRE == 3 ||
    $statusA_ENTRADA == 3 || $statusT1_R2 == 3 || $statusT1_R1 == 3 || $statusS1_INFRA == 3 || $statusS3_INFRA == 3 || $statusRD_15 == 3 || $statusRD_18 == 3 ||
    $statusRD_17 == 3 || $statusRD_16 == 3 || $statusR_630_MESTRE == 3 || $statusR_630_ESCRAVO_1 == 3 || $statusR_630_ESCRAVO_2 == 3 || $statusDESENROLADEIRA_2 == 3 ||
    $statusDESENROLADEIRA_1 == 3 || $statusFPARS_3B == 3 || $statusFPARS_3A == 3 || $statusFPARS_2B == 3 || $statusFPARS_2A == 3 || $statusFPARS_1B == 3 ||
    $statusFPARS_1A == 3 || $statusSRI == 3 || $statusEXAS_INFRA == 3 || $statusELEV_FORNO == 3 || $statusRR_JC_8 == 3 || $statusRR_JC_7 == 3 ||
    $statusRR_JC_6 == 3 || $statusRR_JC_5 == 3 || $statusRR_JC_4 == 3 || $statusRR_JC_3 == 3 || $statusRR_JC_2 == 3 || $statusRR_JC_1 == 3 || $statusEXAUSTOR_4 == 3 ||
    $statusEXAUSTOR_3 == 3 || $statusEXAUSTOR_2 == 3 || $statusEXAUSTOR_1 == 3 || $statusRS_2_SELE == 3 || $statusRS_1_SELE == 3 || $statusRSEL == 3 ||
    $statusRB_4_EL == 3 || $statusRB_3_EL == 3 || $statusRB_2_EL == 3 || $statusRB_1_EL == 3 || $statusRS_LE == 3 || $statusRD_4_LE == 3 || $statusRD_3_LE == 3 ||
    $statusRD_2_LE == 3 || $statusRD_1_LE == 3 || $statusRPT_1 == 3 || $statusPUXADOR_3 == 3 || $statusPD_1 == 3 || $statusDESEMP1 == 3 || $statusALIM_ENTRADA == 3 ||
    $statusRD_DFF_1 == 3 || $statusRD_DFF_2 == 3 || $statusRD_DFF_3 == 3 || $statusRQT == 3 || $statusRSS_QT == 3 || $statusRSI_QT == 3 || $statusD_1_TAPC == 3 ||
    $statusPD_1_TAPC == 3 || $statusD_2_TAPC == 3 || $statusPD_2_TAPC == 3 || $statusRD_11 == 3 || $statusRD_12 == 3 || $statusRD_13 == 3 || $statusRD_14 == 3 ||
    $statusRD_7 == 3 || $statusRD_8 == 3 || $statusRD_9 == 3 || $statusRD_10 == 3 || $statusRD_4 == 3 || $statusRD_5 == 3 || $statusRD_6 == 3 || $statusT_2_R_1 == 3 ||
    $statusT_2_R_2 == 3 || $statusRE_3 == 3 || $statusRE_4 == 3 || $statusRE_1 == 3 || $statusRE_2 == 3 || $statusRS_1_LA == 3 || $statusRS_2_LA == 3 || $statusRS_1_SELA == 3 ||
    $statusRS_2_SELA == 3 || $statusDESMP_2 == 3 || $statusDESEM_PR == 3 || $statusCTPL == 3) {
      $galvanizacao_drive_entrada_status = 3;
    } else {
      $galvanizacao_drive_entrada_status = "";
    }

    return $galvanizacao_drive_entrada_status;
  }

  public static function galvanizacao_drive_saida_Menu() {
    $galvanizacao_drive_saida_status = "";
    //RECOILER 2
    $tag_RECOILER_2 = "TE 72 400 410 565 000 - 000025";
    $idAtividadeRECOILER_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RECOILER_2)->value('id');
    $idAnaliseRECOILER_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRECOILER_2)->max('id');
    $statusRECOILER_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRECOILER_2)->value('status_id');
    //MÓDULO DE FRENAGEM INVERSOR 1 - 04B5MD07
    $tag_MFI_1 = "TE 72 400 410 565 000 - 000074";
    $idAtividadeMFI_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MFI_1)->value('id');
    $idAnaliseMFI_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMFI_1)->max('id');
    $statusMFI_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMFI_1)->value('status_id');
    //04B5MD06
    $tag_MD06 = "TE 72 400 410 565 000 - 000027";
    $idAtividadeMD06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MD06)->value('id');
    $idAnaliseMD06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMD06)->max('id');
    $statusMD06 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMD06)->value('status_id');
    //MÓDULO DE FRENAGEM INVERSOR 1 - 04B5MD05
    $tag_MFI_1_MD05 = "TE 72 400 410 565 000 - 000057";
    $idAtividadeMFI_1_MD05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MFI_1_MD05)->value('id');
    $idAnaliseMFI_1_MD05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMFI_1_MD05)->max('id');
    $statusMFI_1_MD05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMFI_1_MD05)->value('status_id');
    //MÓDULO DE FRENAGEM
    $tag_MF = "TE 72 400 410 565 000 - 000045";
    $idAtividadeMF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MF)->value('id');
    $idAnaliseMF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMF)->max('id');
    $statusMF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMF)->value('status_id');
    //BRIDLE 5 ROLO #4
    $tag_B_5_R_4 = "TE 72 400 410 565 000 - 000024";
    $idAtividadeB_5_R_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_5_R_4)->value('id');
    $idAnaliseB_5_R_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_5_R_4)->max('id');
    $statusB_5_R_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_5_R_4)->value('status_id');
    //BRIDLE 5 ROLO #2
    $tag_B_5_R_2 = "TE 72 400 410 565 000 - 000022";
    $idAtividadeB_5_R_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_5_R_2)->value('id');
    $idAnaliseB_5_R_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_5_R_2)->max('id');
    $statusB_5_R_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_5_R_2)->value('status_id');
    //RECOILER 1
    $tag_RECOILER_1 = "TE 72 400 410 565 000 - 000021";
    $idAtividadeRECOILER_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RECOILER_1)->value('id');
    $idAnaliseRECOILER_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRECOILER_1)->max('id');
    $statusRECOILER_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRECOILER_1)->value('status_id');
    //ACUMULADOR DE SAÍDA
    $tag_ACU_SAIDA = "TE 72 400 410 565 000 - 000019";
    $idAtividadeACU_SAIDA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACU_SAIDA)->value('id');
    $idAnaliseACU_SAIDA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACU_SAIDA)->max('id');
    $statusACU_SAIDA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACU_SAIDA)->value('status_id');
    //RETIFICADOR 630KW - MESTRE
    $tag_RET_630_MESTRE = "TE 72 400 410 565 000 - 000089";
    $idAtividadeRET_630_MESTRE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_630_MESTRE)->value('id');
    $idAnaliseRET_630_MESTRE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_630_MESTRE)->max('id');
    $statusRET_630_MESTRE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_630_MESTRE)->value('status_id');
    //RETIFICADOR 630KW - ESCRAVO 1
    $tag_RET_630_ESCRAVO_1 = "TE 72 400 410 565 000 - 000088";
    $idAtividadeRET_630_ESCRAVO_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_630_ESCRAVO_1)->value('id');
    $idAnaliseRET_630_ESCRAVO_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_630_ESCRAVO_1)->max('id');
    $statusRET_630_ESCRAVO_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_630_ESCRAVO_1)->value('status_id');
    //RETIFICADOR 630KW - ESCRAVO 2
    $tag_RET_630_ESCRAVO_2 = "TE 72 400 410 565 000 - 000087";
    $idAtividadeRET_630_ESCRAVO_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_630_ESCRAVO_2)->value('id');
    $idAnaliseRET_630_ESCRAVO_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_630_ESCRAVO_2)->max('id');
    $statusRET_630_ESCRAVO_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_630_ESCRAVO_2)->value('status_id');
    //BRIDLE 5 ROLO #3
    $tag_BRIDLE5_ROLO3 = "TE 72 400 410 565 000 - 000018";
    $idAtividadeBRIDLE5_ROLO3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE5_ROLO3)->value('id');
    $idAnaliseBRIDLE5_ROLO3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE5_ROLO3)->max('id');
    $statusBRIDLE5_ROLO3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE5_ROLO3)->value('status_id');
    //BRIDLE 5 ROLO #1
    $tag_BRIDLE5_ROLO1 = "TE 72 400 410 565 000 - 000016";
    $idAtividadeBRIDLE5_ROLO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE5_ROLO1)->value('id');
    $idAnaliseBRIDLE5_ROLO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE5_ROLO1)->max('id');
    $statusBRIDLE5_ROLO1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE5_ROLO1)->value('status_id');
    //BRIDLE 7 ROLO #2
    $tag_BRIDLE7_ROLO2 = "TE 72 400 410 565 000 - 000015";
    $idAtividadeBRIDLE7_ROLO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE7_ROLO2)->value('id');
    $idAnaliseBRIDLE7_ROLO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE7_ROLO2)->max('id');
    $statusBRIDLE7_ROLO2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE7_ROLO2)->value('status_id');
    //BRIDLE 7 ROLO #1
    $tag_BRIDLE7_ROLO1 = "TE 72 400 410 565 000 - 000014";
    $idAtividadeBRIDLE7_ROLO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE7_ROLO1)->value('id');
    $idAnaliseBRIDLE7_ROLO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE7_ROLO1)->max('id');
    $statusBRIDLE7_ROLO1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE7_ROLO1)->value('status_id');
    //COLETOR DE RESINA - ROLO #2
    $tag_COLETOR_RES_ROLO2 = "TE 72 400 410 565 000 - 000013";
    $idAtividadeCOLETOR_RES_ROLO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_COLETOR_RES_ROLO2)->value('id');
    $idAnaliseCOLETOR_RES_ROLO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCOLETOR_RES_ROLO2)->max('id');
    $statusCOLETOR_RES_ROLO2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCOLETOR_RES_ROLO2)->value('status_id');
    //APLICADOR DE RESINA ROLO #2
    $tag_ARR2 = "TE 72 400 410 565 000 - 000012";
    $idAtividadeARR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ARR2)->value('id');
    $idAnaliseARR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARR2)->max('id');
    $statusARR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARR2)->value('status_id');
    //COLETOR DE RESINA - ROLO #1
    $tag_CRR_1 = "TE 72 400 410 565 000 - 000011";
    $idAtividadeCRR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CRR_1)->value('id');
    $idAnaliseCRR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCRR_1)->max('id');
    $statusCRR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCRR_1)->value('status_id');
    //APLICADOR DE RESINA ROLO #1
    $tag_ARR_1 = "TE 72 400 410 565 000 - 000010";
    $idAtividadeARR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ARR_1)->value('id');
    $idAnaliseARR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARR_1)->max('id');
    $statusARR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARR_1)->value('status_id');
    //TENSION LEVELLER LONGITUDINAL ADJUST
    $tag_TLLA = "TE 72 400 410 565 000 - 000041";
    $idAtividadeTLLA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TLLA)->value('id');
    $idAnaliseTLLA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTLLA)->max('id');
    $statusTLLA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTLLA)->value('status_id');
    //BRIDLE 6 ROLO #2
    $tag_BRIDLE6_ROLO2 = "TE 72 400 410 565 000 - 000009";
    $idAtividadeBRIDLE6_ROLO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE6_ROLO2)->value('id');
    $idAnaliseBRIDLE6_ROLO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE6_ROLO2)->max('id');
    $statusBRIDLE6_ROLO2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE6_ROLO2)->value('status_id');
    //BRIDLE 6 ROLO #1
    $tag_BRIDLE6_ROLO1 = "TE 72 400 410 565 000 - 000008";
    $idAtividadeBRIDLE6_ROLO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE6_ROLO1)->value('id');
    $idAnaliseBRIDLE6_ROLO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE6_ROLO1)->max('id');
    $statusBRIDLE6_ROLO1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE6_ROLO1)->value('status_id');
    //BRIDLE 4 ROLO #4
    $tag_BRIDLE4_ROLO4 = "TE 72 400 410 565 000 - 000038";
    $idAtividadeBRIDLE4_ROLO4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE4_ROLO4)->value('id');
    $idAnaliseBRIDLE4_ROLO4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE4_ROLO4)->max('id');
    $statusBRIDLE4_ROLO4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE4_ROLO4)->value('status_id');
    //BRIDLE 4 ROLO #2
    $tag_BRIDLE4_ROLO2 = "TE 72 400 410 565 000 - 000037";
    $idAtividadeBRIDLE4_ROLO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE4_ROLO2)->value('id');
    $idAnaliseBRIDLE4_ROLO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE4_ROLO2)->max('id');
    $statusBRIDLE4_ROLO2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE4_ROLO2)->value('status_id');
    //ROLO DEFLETOR #1 - PINCH ROLL
    $tag_RD_1_PR = "TE 72 400 410 565 000 - 000034";
    $idAtividadeRD_1_PR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_1_PR)->value('id');
    $idAnaliseRD_1_PR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_1_PR)->max('id');
    $statusRD_1_PR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_1_PR)->value('status_id');
    //CARRYOVER CONVEYOR
    $tag_CC = "TE 72 400 410 565 000 - 000035";
    $idAtividadeCC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CC)->value('id');
    $idAnaliseCC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCC)->max('id');
    $statusCC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCC)->value('status_id');
    //ROLO DEFLETOR #2 - PINCH ROLL
    $tag_RD_2_PR = "TE 72 400 410 565 000 - 000036";
    $idAtividadeRD_2_PR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_2_PR)->value('id');
    $idAnaliseRD_2_PR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_2_PR)->max('id');
    $statusRD_2_PR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_2_PR)->value('status_id');
    //04B5MA09
    $tag_04B5MA09 = "TE 72 400 410 565 000 - 000033";
    $idAtividade04B5MA09 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_04B5MA09)->value('id');
    $idAnalise04B5MA09 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade04B5MA09)->max('id');
    $status04B5MA09 = DB::table('preditiva_analises')->where('id', '=', $idAnalise04B5MA09)->value('status_id');
    //COLETOR DE CROMO ROLO #2
    $tag_CCR_2 = "TE 72 400 410 565 000 - 000007";
    $idAtividadeCCR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCR_2)->value('id');
    $idAnaliseCCR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCR_2)->max('id');
    $statusCCR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCR_2)->value('status_id');
    //APLICADOR DE CROMO ROLO #2
    $tag_ACR_2 = "TE 72 400 410 565 000 - 000006";
    $idAtividadeACR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACR_2)->value('id');
    $idAnaliseACR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACR_2)->max('id');
    $statusACR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACR_2)->value('status_id');
    //COLETOR DE CROMO ROLO #1
    $tag_CCR_1 = "TE 72 400 410 565 000 - 000005";
    $idAtividadeCCR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCR_1)->value('id');
    $idAnaliseCCR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCR_1)->max('id');
    $statusCCR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCR_1)->value('status_id');
    //APLICADOR DE CROMO ROLO #1
    $tag_ACR_1 = "TE 72 400 410 565 000 - 000004";
    $idAtividadeACR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACR_1)->value('id');
    $idAnaliseACR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACR_1)->max('id');
    $statusACR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACR_1)->value('status_id');
    //SKIN PASS MILL BOTTON ROLL DRIVE
    $tag_SPMBRD = "TE 72 400 410 565 000 - 000003";
    $idAtividadeSPMBRD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SPMBRD)->value('id');
    $idAnaliseSPMBRD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPMBRD)->max('id');
    $statusSPMBRD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPMBRD)->value('status_id');
    //SKIN PASS MILL TOP ROLL DRIVE
    $tag_SPMTRD = "TE 72 400 410 565 000 - 000002";
    $idAtividadeSPMTRD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SPMTRD)->value('id');
    $idAnaliseSPMTRD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPMTRD)->max('id');
    $statusSPMTRD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPMTRD)->value('status_id');
    //BRIDLE 4 ROLO #3
    $tag_BRIDLE4_ROLO3 = "TE 72 400 410 565 000 - 000028";
    $idAtividadeBRIDLE4_ROLO3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE4_ROLO3)->value('id');
    $idAnaliseBRIDLE4_ROLO3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE4_ROLO3)->max('id');
    $statusBRIDLE4_ROLO3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE4_ROLO3)->value('status_id');
    //BRIDLE 4 ROLO #1
    $tag_BRIDLE4_ROLO1 = "TE 72 400 410 565 000 - 000001";
    $idAtividadeBRIDLE4_ROLO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE4_ROLO1)->value('id');
    $idAnaliseBRIDLE4_ROLO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE4_ROLO1)->max('id');
    $statusBRIDLE4_ROLO1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE4_ROLO1)->value('status_id');

    if ($statusRECOILER_2 == 5 || $statusMFI_1 == 5 || $statusMD06 == 5 || $statusMFI_1_MD05 == 5 || $statusMF == 5 || $statusB_5_R_4 == 5 || $statusB_5_R_2 == 5 ||
    $statusRECOILER_1 == 5 || $statusACU_SAIDA == 5 || $statusRET_630_MESTRE == 5 || $statusRET_630_ESCRAVO_1 == 5 || $statusRET_630_ESCRAVO_2 == 5 ||
    $statusBRIDLE5_ROLO3 == 5 || $statusBRIDLE5_ROLO1 == 5 || $statusBRIDLE7_ROLO2 == 5 || $statusBRIDLE7_ROLO1 == 5 || $statusCOLETOR_RES_ROLO2 == 5 ||
    $statusARR2 == 5 || $statusCRR_1 == 5 || $statusARR_1 == 5 || $statusTLLA == 5 || $statusBRIDLE6_ROLO2 == 5 || $statusBRIDLE6_ROLO1 == 5 ||
    $statusBRIDLE4_ROLO4 == 5 || $statusBRIDLE4_ROLO2 == 5 || $statusRD_1_PR == 5 || $statusCC == 5 || $statusRD_2_PR == 5 || $status04B5MA09 == 5 ||
    $statusCCR_2 == 5 || $statusCCR_1 == 5 || $statusACR_1 == 5 || $statusSPMBRD == 5 || $statusSPMTRD == 5 || $statusBRIDLE4_ROLO3 == 5 || $statusBRIDLE4_ROLO1 == 5) {
      $galvanizacao_drive_saida_status = 5;
    } elseif ($statusRECOILER_2 == 4 || $statusMFI_1 == 4 || $statusMD06 == 4 || $statusMFI_1_MD05 == 4 || $statusMF == 4 || $statusB_5_R_4 == 4 || $statusB_5_R_2 == 4 ||
    $statusRECOILER_1 == 4 || $statusACU_SAIDA == 4 || $statusRET_630_MESTRE == 4 || $statusRET_630_ESCRAVO_1 == 4 || $statusRET_630_ESCRAVO_2 == 4 ||
    $statusBRIDLE5_ROLO3 == 4 || $statusBRIDLE5_ROLO1 == 4 || $statusBRIDLE7_ROLO2 == 4 || $statusBRIDLE7_ROLO1 == 4 || $statusCOLETOR_RES_ROLO2 == 4 ||
    $statusARR2 == 4 || $statusCRR_1 == 4 || $statusARR_1 == 4 || $statusTLLA == 4 || $statusBRIDLE6_ROLO2 == 4 || $statusBRIDLE6_ROLO1 == 4 ||
    $statusBRIDLE4_ROLO4 == 4 || $statusBRIDLE4_ROLO2 == 4 || $statusRD_1_PR == 4 || $statusCC == 4 || $statusRD_2_PR == 4 || $status04B5MA09 == 4 ||
    $statusCCR_2 == 4 || $statusCCR_1 == 4 || $statusACR_1 == 4 || $statusSPMBRD == 4 || $statusSPMTRD == 4 || $statusBRIDLE4_ROLO3 == 4 || $statusBRIDLE4_ROLO1 == 4) {
      $galvanizacao_drive_saida_status = 4;
    } elseif ($statusRECOILER_2 == 3 || $statusMFI_1 == 3 || $statusMD06 == 3 || $statusMFI_1_MD05 == 3 || $statusMF == 3 || $statusB_5_R_4 == 3 || $statusB_5_R_2 == 3 ||
    $statusRECOILER_1 == 3 || $statusACU_SAIDA == 3 || $statusRET_630_MESTRE == 3 || $statusRET_630_ESCRAVO_1 == 3 || $statusRET_630_ESCRAVO_2 == 3 ||
    $statusBRIDLE5_ROLO3 == 3 || $statusBRIDLE5_ROLO1 == 3 || $statusBRIDLE7_ROLO2 == 3 || $statusBRIDLE7_ROLO1 == 3 || $statusCOLETOR_RES_ROLO2 == 3 ||
    $statusARR2 == 3 || $statusCRR_1 == 3 || $statusARR_1 == 3 || $statusTLLA == 3 || $statusBRIDLE6_ROLO2 == 3 || $statusBRIDLE6_ROLO1 == 3 ||
    $statusBRIDLE4_ROLO4 == 3 || $statusBRIDLE4_ROLO2 == 3 || $statusRD_1_PR == 3 || $statusCC == 3 || $statusRD_2_PR == 3 || $status04B5MA09 == 3 ||
    $statusCCR_2 == 3 || $statusCCR_1 == 3 || $statusACR_1 == 3 || $statusSPMBRD == 3 || $statusSPMTRD == 3 || $statusBRIDLE4_ROLO3 == 3 || $statusBRIDLE4_ROLO1 == 3) {
      $galvanizacao_drive_saida_status = 3;
    } else {
      $galvanizacao_drive_saida_status = "";
    }

    return $galvanizacao_drive_saida_status;
  }

  public static function lgc_Menu() {
    $lgc_menu = "";
    $galvanizacao_ets_entradaLimp_status = AuxFuncRelTec::galvanizacao_ets_entradaLimp_Menu();
    $galvanizacao_forno_status = AuxFuncRelTec::galvanizacao_forno_Menu();
    $galvanizacao_infraSaida_status = AuxFuncRelTec::galvanizacao_infraSaida_Menu();
    $galvanizacao_ccm1_ccm7_status = AuxFuncRelTec::galvanizacao_ccm1_ccm7_Menu();
    $galvanizacao_ccm2_ccm3_status = AuxFuncRelTec::galvanizacao_ccm2_ccm3_Menu();
    $galvanizacao_alarme_ccm4_ccm5_status = AuxFuncRelTec::galvanizacao_alarme_ccm4_ccm5_Menu();
    $galvanizacao_drive_entrada_status = AuxFuncRelTec::galvanizacao_drive_entrada_Menu();
    $galvanizacao_drive_saida_status = AuxFuncRelTec::galvanizacao_drive_saida_Menu();

    if ($galvanizacao_ets_entradaLimp_status == 5 || $galvanizacao_forno_status == 5 || $galvanizacao_infraSaida_status == 5 || $galvanizacao_ccm1_ccm7_status == 5 ||
        $galvanizacao_ccm2_ccm3_status == 5 || $galvanizacao_alarme_ccm4_ccm5_status == 5 || $galvanizacao_drive_entrada_status == 5 || $galvanizacao_drive_saida_status == 5) {
      $lgc_menu = 5;
    } elseif ($galvanizacao_ets_entradaLimp_status == 4 || $galvanizacao_forno_status == 4 || $galvanizacao_infraSaida_status == 4 || $galvanizacao_ccm1_ccm7_status == 4 ||
              $galvanizacao_ccm2_ccm3_status == 4 || $galvanizacao_alarme_ccm4_ccm5_status == 4 || $galvanizacao_drive_entrada_status == 4 || $galvanizacao_drive_saida_status == 4) {
      $lgc_menu = 4;
    } elseif ($galvanizacao_ets_entradaLimp_status == 3 || $galvanizacao_forno_status == 3 || $galvanizacao_infraSaida_status == 3 || $galvanizacao_ccm1_ccm7_status == 3 ||
              $galvanizacao_ccm2_ccm3_status == 3 || $galvanizacao_alarme_ccm4_ccm5_status == 3 || $galvanizacao_drive_entrada_status == 3 || $galvanizacao_drive_saida_status == 3) {
      $lgc_menu = 3;
    } else {
      $lgc_menu = "";
    }

    return $lgc_menu;
  }

  public static function lgc_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_normal = aux::GeralPorLinhaTE($atual1, 3, $lgc_linha1, $lgc_linha2);
    return $lgc_normal;
  }
  public static function lgc_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_alarme = aux::GeralPorLinhaTE($atual1, 4, $lgc_linha1, $lgc_linha2);
    return $lgc_alarme;
  }
  public static function lgc_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_critico = aux::GeralPorLinhaTE($atual1, 5, $lgc_linha1, $lgc_linha2);
    return $lgc_critico;
  }

  //--- PINTURA
  public static function pintura_estacoesRemotas_Menu() {
    $pintura_estacoesRemotas_status = "";
    //CONTROLE AR CONDICIONADO 460V
    $tag_CARC_460V = "TE 72 500 510 509 000 - 000058";
    $idAtividadeCARC_460V = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CARC_460V)->value('id');
    $idAnaliseCARC_460V = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARC_460V)->max('id');
    $statusCARC_460V = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARC_460V)->value('status_id');
    //ROLO CORRETOR 6
    $tag_RC6 = "TE 72 500 510 509 000 - 000059";
    $idAtividadeRC6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RC6)->value('id');
    $idAnaliseRC6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRC6)->max('id');
    $statusRC6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRC6)->value('status_id');
    //FIFE CORRETOR 4
    $tag_FIFE_COR4 = "TE 72 500 510 509 000 - 000057";
    $idAtividadeFIFE_COR4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_COR4)->value('id');
    $idAnaliseFIFE_COR4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_COR4)->max('id');
    $statusFIFE_COR4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_COR4)->value('status_id');
    //ESTAÇÕES OPERAÇÃO - OS-22-4
    $tag_EO_OS_22_4 = "TE 72 500 510 509 000 - 000054";
    $idAtividadeEO_OS_22_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_4)->value('id');
    $idAnaliseEO_OS_22_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_4)->max('id');
    $statusEO_OS_22_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_4)->value('status_id');
    //ROSS AIR SYSTEM - FINISH OVEN - PNL-8801
    $tag_RAS_FO_PNL_8801 = "TE 72 500 510 509 000 - 000016";
    $idAtividadeRAS_FO_PNL_8801 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAS_FO_PNL_8801)->value('id');
    $idAnaliseRAS_FO_PNL_8801 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAS_FO_PNL_8801)->max('id');
    $statusRAS_FO_PNL_8801 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAS_FO_PNL_8801)->value('status_id');
    //ESTAÇÕES REMOTAS - 43
    $tag_ER_43 = "TE 72 500 510 509 000 - 000055";
    $idAtividadeER_43 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_43)->value('id');
    $idAnaliseER_43 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_43)->max('id');
    $statusER_43 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_43)->value('status_id');
    //ESTAÇÕES REMOTAS - 51
    $tag_ER_51 = "TE 72 500 510 509 000 - 000017";
    $idAtividadeER_51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_51)->value('id');
    $idAnaliseER_51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_51)->max('id');
    $statusER_51 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_51)->value('status_id');
    //ESTAÇÕES REMOTAS - 50
    $tag_ER_50 = "TE 72 500 510 509 000 - 000018";
    $idAtividadeER_50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_50)->value('id');
    $idAnaliseER_50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_50)->max('id');
    $statusER_50 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_50)->value('status_id');
    //FIFE DA ENROLADEIRA
    $tag_FIFE_ENR = "TE 72 500 510 509 000 - 000003";
    $idAtividadeFIFE_ENR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_ENR)->value('id');
    $idAnaliseFIFE_ENR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_ENR)->max('id');
    $statusFIFE_ENR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_ENR)->value('status_id');
    //ESTAÇÕES REMOTAS - 46
    $tag_ET_46 = "TE 72 500 510 509 000 - 000056";
    $idAtividadeET_46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_46)->value('id');
    $idAnaliseET_46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_46)->max('id');
    $statusET_46 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_46)->value('status_id');
    //ESTAÇÕES REMOTAS - 57
    $tag_ET_57 = "TE 72 500 510 509 000 - 000001";
    $idAtividadeET_57 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_57)->value('id');
    $idAnaliseET_57 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_57)->max('id');
    $statusET_57 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_57)->value('status_id');
    //ESTAÇÕES REMOTAS - 56
    $tag_ET_56 = "TE 72 500 510 509 000 - 000002";
    $idAtividadeET_56 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_56)->value('id');
    $idAnaliseET_56 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_56)->max('id');
    $statusET_56 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_56)->value('status_id');
    //ESTAÇÕES REMOTAS - 53
    $tag_ET_53 = "TE 72 500 510 509 000 - 000005";
    $idAtividadeET_53 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_53)->value('id');
    $idAnaliseET_53 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_53)->max('id');
    $statusET_53 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_53)->value('status_id');
    //ESTAÇÕES REMOTAS - 55
    $tag_ET_55 = "TE 72 500 510 509 000 - 000006";
    $idAtividadeET_55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_55)->value('id');
    $idAnaliseET_55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_55)->max('id');
    $statusET_55 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_55)->value('status_id');
    //ESTAÇÕES REMOTAS - 54
    $tag_ET_54 = "TE 72 500 510 509 000 - 000007";
    $idAtividadeET_54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_54)->value('id');
    $idAnaliseET_54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_54)->max('id');
    $statusET_54 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_54)->value('status_id');
    //ESTAÇÕES OPERAÇÃO - OS-22-12
    $tag_EO_OS_22_12 = "TE 72 500 510 509 000 - 000008";
    $idAtividadeEO_OS_22_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_12)->value('id');
    $idAnaliseEO_OS_22_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_12)->max('id');
    $statusEO_OS_22_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_12)->value('status_id');
    //ESTAÇÕES OPERAÇÃO - OS-22-5
    $tag_EO_OS_22_5 = "TE 72 500 510 509 000 - 000009";
    $idAtividadeEO_OS_22_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_5)->value('id');
    $idAnaliseEO_OS_22_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_5)->max('id');
    $statusEO_OS_22_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_5)->value('status_id');
    //ESTAÇÕES REMOTAS - 52
    $tag_ET_52 = "TE 72 500 510 509 000 - 000010";
    $idAtividadeET_52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_52)->value('id');
    $idAnaliseET_52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_52)->max('id');
    $statusET_52 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_52)->value('status_id');
    //ESTAÇÕES REMOTAS - 48
    $tag_ER_48 = "TE 72 500 510 509 000 - 000011";
    $idAtividadeER_48 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_48)->value('id');
    $idAnaliseER_48 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_48)->max('id');
    $statusER_48 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_48)->value('status_id');
    //ESTAÇÕES REMOTAS - 47
    $tag_ET_47 = "TE 72 500 510 509 000 - 000012";
    $idAtividadeET_47 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_47)->value('id');
    $idAnaliseET_47 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_47)->max('id');
    $statusET_47 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_47)->value('status_id');
    //ESTAÇÕES REMOTAS - 45
    $tag_ET_45 = "TE 72 500 510 509 000 - 000013";
    $idAtividadeET_45 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_45)->value('id');
    $idAnaliseET_45 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_45)->max('id');
    $statusET_45 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_45)->value('status_id');
    //QD-CCL7-460V
    $tag_QD_CCL7_460V = "TE 72 500 510 509 000 - 000014";
    $idAtividadeQD_CCL7_460V = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_QD_CCL7_460V)->value('id');
    $idAnaliseQD_CCL7_460V = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQD_CCL7_460V)->max('id');
    $statusQD_CCL7_460V = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQD_CCL7_460V)->value('status_id');
    //ROSS AIR SYSTEM - PRIME OVEN - PNL-7401
    $tag_RAS_PO_PNL_7401 = "TE 72 500 510 509 000 - 000015";
    $idAtividadeRAS_PO_PNL_7401 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAS_PO_PNL_7401)->value('id');
    $idAnaliseRAS_PO_PNL_7401 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAS_PO_PNL_7401)->max('id');
    $statusRAS_PO_PNL_7401 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAS_PO_PNL_7401)->value('status_id');
    //ROSS AIR SYSTEM - OXIDIZER - PNL-23001
    $tag_RASO_PNL_23001 = "TE 72 500 510 509 000 - 000019";
    $idAtividadeRASO_PNL_23001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RASO_PNL_23001)->value('id');
    $idAnaliseRASO_PNL_23001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRASO_PNL_23001)->max('id');
    $statusRASO_PNL_23001 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRASO_PNL_23001)->value('status_id');
    //ESTAÇÕES OPERAÇÃO - OS-22-2
    $tag_EO_OS_22_2 = "TE 72 500 510 509 000 - 000020";
    $idAtividadeEO_OS_22_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_2)->value('id');
    $idAnaliseEO_OS_22_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_2)->max('id');
    $statusEO_OS_22_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_2)->value('status_id');
    //ESTAÇÕES OPERAÇÃO - OS-22-3
    $tag_EO_OS_22_3 = "TE 72 500 510 509 000 - 000021";
    $idAtividadeEO_OS_22_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_3)->value('id');
    $idAnaliseEO_OS_22_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_3)->max('id');
    $statusEO_OS_22_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_3)->value('status_id');
    //ESTAÇÕES REMOTAS - 44
    $tag_ET_44 = "TE 72 500 510 509 000 - 000022";
    $idAtividadeET_44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_44)->value('id');
    $idAnaliseET_44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_44)->max('id');
    $statusET_44 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_44)->value('status_id');
    //ESTAÇÕES REMOTAS - 42
    $tag_ET_42 = "TE 72 500 510 509 000 - 000023";
    $idAtividadeET_42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_42)->value('id');
    $idAnaliseET_42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_42)->max('id');
    $statusET_42 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_42)->value('status_id');
    //SECADOR DE CROMO - INFRARED - PLN-6701
    $tag_SCI_PLN_6701 = "TE 72 500 510 509 000 - 000053";
    $idAtividadeSCI_PLN_6701 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SCI_PLN_6701)->value('id');
    $idAnaliseSCI_PLN_6701 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSCI_PLN_6701)->max('id');
    $statusSCI_PLN_6701 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSCI_PLN_6701)->value('status_id');
    //FIFE DESENROLADEIRA 2 - CC1CGUC1.MC
    $tag_FIFE_DES2_CC1CGUC1_MC = "TE 72 500 510 509 000 - 000052";
    $idAtividadeFIFE_DES2_CC1CGUC1_MC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_DES2_CC1CGUC1_MC)->value('id');
    $idAnaliseFIFE_DES2_CC1CGUC1_MC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_DES2_CC1CGUC1_MC)->max('id');
    $statusFIFE_DES2_CC1CGUC1_MC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_DES2_CC1CGUC1_MC)->value('status_id');
    //FIFE DESENROLADEIRA 1 - PAINEL CC1CGUC2.MC
    $tag_FIFE_DES2_CC1CGUC2_MC = "TE 72 500 510 509 000 - 000049";
    $idAtividadeFIFE_DES2_CC1CGUC2_MC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_DES2_CC1CGUC2_MC)->value('id');
    $idAnaliseFIFE_DES2_CC1CGUC2_MC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_DES2_CC1CGUC2_MC)->max('id');
    $statusFIFE_DES2_CC1CGUC2_MC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_DES2_CC1CGUC2_MC)->value('status_id');
    //FIFE DESENROLADEIRA 2 - CC1CGUC1.CB
    $tag_FIFE_DES2_CC1CGUC1_CB = "TE 72 500 510 509 000 - 000051";
    $idAtividadeFIFE_DES2_CC1CGUC1_CB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_DES2_CC1CGUC1_CB)->value('id');
    $idAnaliseFIFE_DES2_CC1CGUC1_CB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_DES2_CC1CGUC1_CB)->max('id');
    $statusFIFE_DES2_CC1CGUC1_CB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_DES2_CC1CGUC1_CB)->value('status_id');
    //FIFE DESENROLADEIRA 1 - PAINEL CC1CGUC2.CB
    $tag_FIFE_DES1_CC1CGUC1_CB = "TE 72 500 510 509 000 - 000048";
    $idAtividadeFIFE_DES1_CC1CGUC1_CB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_DES1_CC1CGUC1_CB)->value('id');
    $idAnaliseFIFE_DES1_CC1CGUC1_CB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_DES1_CC1CGUC1_CB)->max('id');
    $statusFIFE_DES1_CC1CGUC1_CB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_DES1_CC1CGUC1_CB)->value('status_id');
    //ESTAÇÕES OPERAÇÃO - OS-22-1
    $tag_EO_OS_22_1 = "TE 72 500 510 509 000 - 000024";
    $idAtividadeEO_OS_22_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_1)->value('id');
    $idAnaliseEO_OS_22_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_1)->max('id');
    $statusEO_OS_22_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_1)->value('status_id');
    //ESTAÇÕES REMOTAS - 41
    $tag_ET_41 = "TE 72 500 510 509 000 - 000025";
    $idAtividadeET_41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_41)->value('id');
    $idAnaliseET_41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_41)->max('id');
    $statusET_41 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_41)->value('status_id');
    //ESTAÇÕES REMOTAS - 40
    $tag_ET_40 = "TE 72 500 510 509 000 - 000026";
    $idAtividadeET_40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_40)->value('id');
    $idAnaliseET_40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_40)->max('id');
    $statusET_40 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_40)->value('status_id');
    //ESTAÇÕES REMOTAS - 39
    $tag_ET_39 = "TE 72 500 510 509 000 - 000029";
    $idAtividadeET_39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_39)->value('id');
    $idAnaliseET_39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_39)->max('id');
    $statusET_39 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_39)->value('status_id');
    //ESTAÇÕES REMOTAS - 38
    $tag_ET_38 = "TE 72 500 510 509 000 - 000030";
    $idAtividadeET_38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_38)->value('id');
    $idAnaliseET_38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_38)->max('id');
    $statusET_38 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_38)->value('status_id');
    //ESTAÇÕES REMOTAS - 37
    $tag_ET_37 = "TE 72 500 510 509 000 - 000031";
    $idAtividadeET_37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_37)->value('id');
    $idAnaliseET_37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_37)->max('id');
    $statusET_37 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_37)->value('status_id');
    //ESTAÇÕES REMOTAS - 36
    $tag_ET_36 = "TE 72 500 510 509 000 - 000032";
    $idAtividadeET_36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_36)->value('id');
    $idAnaliseET_36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_36)->max('id');
    $idLaudoET_36 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_36)->value('id');
    $statusET_36 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_36)->value('status_id');
    //PAINEL REMOTO #2 - PC5000
    $tag_PR2_PC5000 = "TE 72 500 510 509 000 - 000033";
    $idAtividadePR2_PC5000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PR2_PC5000)->value('id');
    $idAnalisePR2_PC5000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR2_PC5000)->max('id');
    $statusPR2_PC5000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR2_PC5000)->value('status_id');
    //ESTAÇÕES REMOTAS - 35
    $tag_ET_35 = "TE 72 500 510 509 000 - 000034";
    $idAtividadeET_35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_35)->value('id');
    $idAnaliseET_35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_35)->max('id');
    $statusET_35 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_35)->value('status_id');
    //PAINEL HENKEL - PNL-5601
    $tag_PH_PNL_5601 = "TE 72 500 510 509 000 - 000035";
    $idAtividadePH_PNL_5601 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PH_PNL_5601)->value('id');
    $idAnalisePH_PNL_5601 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePH_PNL_5601)->max('id');
    $statusPH_PNL_5601 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePH_PNL_5601)->value('status_id');
    //ESTAÇÕES REMOTAS - 34
    $tag_ET_34 = "TE 72 500 510 509 000 - 000036";
    $idAtividadeET_34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_34)->value('id');
    $idAnaliseET_34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_34)->max('id');
    $statusET_34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_34)->value('status_id');
    //ESTAÇÕES REMOTAS - 33
    $tag_ET_33 = "TE 72 500 510 509 000 - 000037";
    $idAtividadeET_33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_33)->value('id');
    $idAnaliseET_33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_33)->max('id');
    $statusET_33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_33)->value('status_id');
    //ESTAÇÕES REMOTAS - 32
    $tag_ET_32 = "TE 72 500 510 509 000 - 000038";
    $idAtividadeET_32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_32)->value('id');
    $idAnaliseET_32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_32)->max('id');
    $statusET_32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_32)->value('status_id');
    //ESTAÇÕES REMOTAS - 31
    $tag_ET_31 = "TE 72 500 510 509 000 - 000039";
    $idAtividadeET_31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_31)->value('id');
    $idAnaliseET_31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_31)->max('id');
    $statusET_31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_31)->value('status_id');
    //ESTAÇÕES REMOTAS - 30
    $tag_ET_30 = "TE 72 500 510 509 000 - 000041";
    $idAtividadeET_30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_30)->value('id');
    $idAnaliseET_30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_30)->max('id');
    $statusET_30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_30)->value('status_id');
    //PAINEL REMOTO #1 - PC5000
    $tag_PR1_PC5000 = "TE 72 500 510 509 000 - 000040";
    $idAtividadePR1_PC5000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PR1_PC5000)->value('id');
    $idAnalisePR1_PC5000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR1_PC5000)->max('id');
    $statusPR1_PC5000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR1_PC5000)->value('status_id');
    //ESTAÇÕES REMOTAS - 16
    $tag_ET_16 = "TE 72 500 510 509 000 - 000042";
    $idAtividadeET_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_16)->value('id');
    $idAnaliseET_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_16)->max('id');
    $statusET_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_16)->value('status_id');
    //ESTAÇÕES REMOTAS - 15
    $tag_ET_15 = "TE 72 500 510 509 000 - 000043";
    $idAtividadeET_15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_15)->value('id');
    $idAnaliseET_15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_15)->max('id');
    $statusET_15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_15)->value('status_id');
    //ESTAÇÕES REMOTAS - 14
    $tag_ET_14 = "TE 72 500 510 509 000 - 000044";
    $idAtividadeET_14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_14)->value('id');
    $idAnaliseET_14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_14)->max('id');
    $statusET_14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_14)->value('status_id');
    //ESTAÇÕES REMOTAS - 13
    $tag_ET_13 = "TE 72 500 510 509 000 - 000045";
    $idAtividadeET_13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_13)->value('id');
    $idAnaliseET_13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_13)->max('id');
    $statusET_13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_13)->value('status_id');
    //ESTAÇÕES REMOTAS - 17
    $tag_ET_17 = "TE 72 500 510 509 000 - 000050";
    $idAtividadeET_17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_17)->value('id');
    $idAnaliseET_17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_17)->max('id');
    $statusET_17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_17)->value('status_id');
    //ESTAÇÕES REMOTAS - 12
    $tag_ET_12 = "TE 72 500 510 509 000 - 000047";
    $idAtividadeET_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_12)->value('id');
    $idAnaliseET_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_12)->max('id');
    $statusET_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_12)->value('status_id');
    //ESTAÇÕES REMOTAS - 11
    $tag_ET_11 = "TE 72 500 510 509 000 - 000046";
    $idAtividadeET_11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_11)->value('id');
    $idAnaliseET_11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_11)->max('id');
    $statusET_11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_11)->value('status_id');
    //ESTAÇÕES REMOTAS - 49
    $tag_ET_49 = "TE 72 500 510 509 000 - 000028";
    $idAtividadeET_49 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_49)->value('id');
    $idAnaliseET_49 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_49)->max('id');
    $statusET_49 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_49)->value('status_id');
    //PAINEL DA CALDEIRA - PNL-11001
    $tag_PC_PNL_1101 = "TE 72 500 510 509 000 - 000027";
    $idAtividadePC_PNL_1101 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_PNL_1101)->value('id');
    $idAnalisePC_PNL_1101 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_PNL_1101)->max('id');
    $statusPC_PNL_1101 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_PNL_1101)->value('status_id');

    if ($statusCARC_460V == 5 || $statusRC6 == 5 || $statusFIFE_COR4 == 5 || $statusEO_OS_22_4 == 5 || $statusRAS_FO_PNL_8801 == 5 || $statusER_43 == 5 || $statusER_51 == 5 || $statusER_50 == 5 || $statusFIFE_ENR == 5 ||
    $statusET_46 == 5 || $statusET_57 == 5 || $statusET_56 == 5 || $statusET_53 == 5 || $statusET_55 == 5 || $statusET_54 == 5 || $statusEO_OS_22_12 == 5 || $statusEO_OS_22_5 == 5 || $statusET_52 == 5 ||
    $statusER_48 == 5 || $statusET_47 == 5 || $statusET_45 == 5 || $statusQD_CCL7_460V == 5 || $statusRAS_PO_PNL_7401 == 5 || $statusRASO_PNL_23001 == 5 || $statusEO_OS_22_2 == 5 || $statusEO_OS_22_3 == 5 ||
    $statusET_44 == 5 || $statusET_42 == 5 || $statusSCI_PLN_6701 == 5 || $statusFIFE_DES2_CC1CGUC1_MC == 5 || $statusFIFE_DES2_CC1CGUC2_MC == 5 || $statusFIFE_DES2_CC1CGUC1_CB == 5 || $statusFIFE_DES1_CC1CGUC1_CB == 5 ||
    $statusEO_OS_22_1 == 5 || $statusET_41 == 5 || $statusET_40 == 5 || $statusET_39 == 5 || $statusET_38 == 5 || $statusET_37 == 5 || $statusET_36 == 5 || $statusPR2_PC5000 == 5 || $statusET_35 == 5 ||
    $statusPH_PNL_5601 == 5 || $statusET_34 == 5 || $statusET_33 == 5 || $statusET_32 == 5 || $statusET_31 == 5 || $statusET_30 == 5 || $statusPR1_PC5000 == 5 || $statusET_16 == 5 || $statusET_15 == 5 ||
    $statusET_14 == 5 || $statusET_13 == 5 || $statusET_17 == 5 || $statusET_12 == 5 || $statusET_11 == 5 || $statusET_49 == 5 || $statusPC_PNL_1101 == 5) {
      $pintura_estacoesRemotas_status = 5;
    } elseif ($statusCARC_460V == 4 || $statusRC6 == 4 || $statusFIFE_COR4 == 4 || $statusEO_OS_22_4 == 4 || $statusRAS_FO_PNL_8801 == 4 || $statusER_43 == 4 || $statusER_51 == 4 || $statusER_50 == 4 || $statusFIFE_ENR == 4 ||
    $statusET_46 == 4 || $statusET_57 == 4 || $statusET_56 == 4 || $statusET_53 == 4 || $statusET_55 == 4 || $statusET_54 == 4 || $statusEO_OS_22_12 == 4 || $statusEO_OS_22_5 == 4 || $statusET_52 == 4 ||
    $statusER_48 == 4 || $statusET_47 == 4 || $statusET_45 == 4 || $statusQD_CCL7_460V == 4 || $statusRAS_PO_PNL_7401 == 4 || $statusRASO_PNL_23001 == 4 || $statusEO_OS_22_2 == 4 || $statusEO_OS_22_3 == 4 ||
    $statusET_44 == 4 || $statusET_42 == 4 || $statusSCI_PLN_6701 == 4 || $statusFIFE_DES2_CC1CGUC1_MC == 4 || $statusFIFE_DES2_CC1CGUC2_MC == 4 || $statusFIFE_DES2_CC1CGUC1_CB == 4 || $statusFIFE_DES1_CC1CGUC1_CB == 4 ||
    $statusEO_OS_22_1 == 4 || $statusET_41 == 4 || $statusET_40 == 4 || $statusET_39 == 4 || $statusET_38 == 4 || $statusET_37 == 4 || $statusET_36 == 4 || $statusPR2_PC5000 == 4 || $statusET_35 == 4 ||
    $statusPH_PNL_5601 == 4 || $statusET_34 == 4 || $statusET_33 == 4 || $statusET_32 == 4 || $statusET_31 == 4 || $statusET_30 == 4 || $statusPR1_PC5000 == 4 || $statusET_16 == 4 || $statusET_15 == 4 ||
    $statusET_14 == 4 || $statusET_13 == 4 || $statusET_17 == 4 || $statusET_12 == 4 || $statusET_11 == 4 || $statusET_49 == 4 || $statusPC_PNL_1101 == 4) {
      $pintura_estacoesRemotas_status = 4;
    } elseif ($statusCARC_460V == 3 || $statusRC6 == 3 || $statusFIFE_COR4 == 3 || $statusEO_OS_22_4 == 3 || $statusRAS_FO_PNL_8801 == 3 || $statusER_43 == 3 || $statusER_51 == 3 || $statusER_50 == 3 || $statusFIFE_ENR == 3 ||
    $statusET_46 == 3 || $statusET_57 == 3 || $statusET_56 == 3 || $statusET_53 == 3 || $statusET_55 == 3 || $statusET_54 == 3 || $statusEO_OS_22_12 == 3 || $statusEO_OS_22_5 == 3 || $statusET_52 == 3 ||
    $statusER_48 == 3 || $statusET_47 == 3 || $statusET_45 == 3 || $statusQD_CCL7_460V == 3 || $statusRAS_PO_PNL_7401 == 3 || $statusRASO_PNL_23001 == 3 || $statusEO_OS_22_2 == 3 || $statusEO_OS_22_3 == 3 ||
    $statusET_44 == 3 || $statusET_42 == 3 || $statusSCI_PLN_6701 == 3 || $statusFIFE_DES2_CC1CGUC1_MC == 3 || $statusFIFE_DES2_CC1CGUC2_MC == 3 || $statusFIFE_DES2_CC1CGUC1_CB == 3 || $statusFIFE_DES1_CC1CGUC1_CB == 3 ||
    $statusEO_OS_22_1 == 3 || $statusET_41 == 3 || $statusET_40 == 3 || $statusET_39 == 3 || $statusET_38 == 3 || $statusET_37 == 3 || $statusET_36 == 3 || $statusPR2_PC5000 == 3 || $statusET_35 == 3 ||
    $statusPH_PNL_5601 == 3 || $statusET_34 == 3 || $statusET_33 == 3 || $statusET_32 == 3 || $statusET_31 == 3 || $statusET_30 == 3 || $statusPR1_PC5000 == 3 || $statusET_16 == 3 || $statusET_15 == 3 ||
    $statusET_14 == 3 || $statusET_13 == 3 || $statusET_17 == 3 || $statusET_12 == 3 || $statusET_11 == 3 || $statusET_49 == 3 || $statusPC_PNL_1101 == 3) {
      $pintura_estacoesRemotas_status = 3;
    } else {
      $pintura_estacoesRemotas_status = "";
    }

    return $pintura_estacoesRemotas_status;
  }

  public static function pintura_paineis_drives_Menu() {
        $pintura_paineis_drives_status = "";
        //BRIDLE N°6 - M2
        $tag_BRIDLE_N6_M2 = "TE 72 500 510 872 000 - 000040";
        $idAtividadeBRIDLE_N6_M2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N6_M2)->value('id');
        $idAnaliseBRIDLE_N6_M2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N6_M2)->max('id');
        $idLaudoBRIDLE_N6_M2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N6_M2)->value('id');
        $statusBRIDLE_N6_M2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N6_M2)->value('status_id');
        //BRIDLE N°6 - M1
        $tag_BRIDLE_N6_M1 = "TE 72 500 510 872 000 - 000039";
        $idAtividadeBRIDLE_N6_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N6_M1)->value('id');
        $idAnaliseBRIDLE_N6_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N6_M1)->max('id');
        $idLaudoBRIDLE_N6_M1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N6_M1)->value('id');
        $statusBRIDLE_N6_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N6_M1)->value('status_id');
        //BRIDLE N°5 - M2
        $tag_BRIDLE_N5_M2 = "TE 72 500 510 872 000 - 000038";
        $idAtividadeBRIDLE_N5_M2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N5_M2)->value('id');
        $idAnaliseBRIDLE_N5_M2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N5_M2)->max('id');
        $idLaudoBRIDLE_N5_M2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N5_M2)->value('id');
        $statusBRIDLE_N5_M2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N5_M2)->value('status_id');
        //BRIDLE N°5 - M1
        $tag_BRIDLE_N5_M1 = "TE 72 500 510 872 000 - 000037";
        $idAtividadeBRIDLE_N5_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N5_M1)->value('id');
        $idAnaliseBRIDLE_N5_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N5_M1)->max('id');
        $idLaudoBRIDLE_N5_M1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N5_M1)->value('id');
        $statusBRIDLE_N5_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N5_M1)->value('status_id');
        //MÓDULO DE FRENAGEM
        $tag_MF_170KW = "TE 72 500 510 872 000 - 000036";
        $idAtividadeMF_170KW = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MF_170KW)->value('id');
        $idAnaliseMF_170KW = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMF_170KW)->max('id');
        $idLaudoMF_170KW = DB::table('laudos')->where('analise_id', '=', $idAnaliseMF_170KW)->value('id');
        $statusMF_170KW = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMF_170KW)->value('status_id');
        //03B7DD05
        $tag_03B7DD05 = "TE 72 500 510 872 000 - 000035";
        $idAtividade_03B7DD05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_03B7DD05)->value('id');
        $idAnalise_03B7DD05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_03B7DD05)->max('id');
        $idLaudo_03B7DD05 = DB::table('laudos')->where('analise_id', '=', $idAnalise_03B7DD05)->value('id');
        $status_03B7DD05 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_03B7DD05)->value('status_id');
        //03B7DD04
        $tag_03B7DD04 = "TE 72 500 510 872 000 - 000034";
        $idAtividade_03B7DD04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_03B7DD04)->value('id');
        $idAnalise_03B7DD04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_03B7DD04)->max('id');
        $idLaudo_03B7DD04 = DB::table('laudos')->where('analise_id', '=', $idAnalise_03B7DD04)->value('id');
        $status_03B7DD04 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_03B7DD04)->value('status_id');
        //ROLO ESCOVA #4
        $tag_RE_4 = "TE 72 500 510 872 000 - 000075";
        $idAtividadeRE_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_4)->value('id');
        $idAnaliseRE_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_4)->max('id');
        $idLaudoRE_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_4)->value('id');
        $statusRE_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_4)->value('status_id');
        //ROLO ESCOVA #3
        $tag_RE_3 = "TE 72 500 510 872 000 - 000033";
        $idAtividadeRE_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_3)->value('id');
        $idAnaliseRE_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_3)->max('id');
        $idLaudoRE_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_3)->value('id');
        $statusRE_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_3)->value('status_id');
        //DESENROLADEIRA N°1
        $tag_DES_N1 = "TE 72 500 510 872 000 - 000031";
        $idAtividadeDES_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DES_N1)->value('id');
        $idAnaliseDES_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES_N1)->max('id');
        $idLaudoDES_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDES_N1)->value('id');
        $statusDES_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES_N1)->value('status_id');
        //ENROLADEIRA
        $tag_ENROLADEIRA = "TE 72 500 510 872 000 - 000029";
        $idAtividadeENROLADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ENROLADEIRA)->value('id');
        $idAnaliseENROLADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENROLADEIRA)->max('id');
        $idLaudoENROLADEIRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseENROLADEIRA)->value('id');
        $statusENROLADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENROLADEIRA)->value('status_id');
        //ACUMULADOR DE SAÍDA
        $tag_ACUM_SAIDA = "TE 72 500 510 872 000 - 000027";
        $idAtividadeACUM_SAIDA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACUM_SAIDA)->value('id');
        $idAnaliseACUM_SAIDA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACUM_SAIDA)->max('id');
        $idLaudoACUM_SAIDA = DB::table('laudos')->where('analise_id', '=', $idAnaliseACUM_SAIDA)->value('id');
        $statusACUM_SAIDA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACUM_SAIDA)->value('status_id');
        //RETIFICADOR - MASTER
        $tag_RET_MASTER = "TE 72 500 510 872 000 - 000026";
        $idAtividadeRET_MASTER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_MASTER)->value('id');
        $idAnaliseRET_MASTER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_MASTER)->max('id');
        $idLaudoRET_MASTER = DB::table('laudos')->where('analise_id', '=', $idAnaliseRET_MASTER)->value('id');
        $statusRET_MASTER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_MASTER)->value('status_id');
        //RETIFICADOR - SLAVE
        $tag_RET_SLAVE = "TE 72 500 510 872 000 - 000024";
        $idAtividadeRET_SLAVE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_SLAVE)->value('id');
        $idAnaliseRET_SLAVE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_SLAVE)->max('id');
        $idLaudoRET_SLAVE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRET_SLAVE)->value('id');
        $statusRET_SLAVE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_SLAVE)->value('status_id');
        //ROLO ESCOVA #1
        $tag_ROLO_ESCOVA_1 = "TE 72 500 510 872 000 - 000023";
        $idAtividadeROLO_ESCOVA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ROLO_ESCOVA_1)->value('id');
        $idAnaliseROLO_ESCOVA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeROLO_ESCOVA_1)->max('id');
        $idLaudoROLO_ESCOVA_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseROLO_ESCOVA_1)->value('id');
        $statusROLO_ESCOVA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseROLO_ESCOVA_1)->value('status_id');
        //ROLO ESCOVA #2
        $tag_ROLO_ESCOVA_2 = "TE 72 500 510 872 000 - 000074";
        $idAtividadeROLO_ESCOVA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ROLO_ESCOVA_2)->value('id');
        $idAnaliseROLO_ESCOVA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeROLO_ESCOVA_2)->max('id');
        $idLaudoROLO_ESCOVA_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseROLO_ESCOVA_2)->value('id');
        $statusROLO_ESCOVA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseROLO_ESCOVA_2)->value('status_id');
        //ACUMULADOR DE ENTRADA
        $tag_ACUM_ENTRADA = "TE 72 500 510 872 000 - 000022";
        $idAtividadeACUM_ENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACUM_ENTRADA)->value('id');
        $idAnaliseACUM_ENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACUM_ENTRADA)->max('id');
        $idLaudoACUM_ENTRADA = DB::table('laudos')->where('analise_id', '=', $idAnaliseACUM_ENTRADA)->value('id');
        $statusACUM_ENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACUM_ENTRADA)->value('status_id');
        //DESENROLADEIRA N°2
        $tag_DES_N2 = "TE 72 500 510 872 000 - 000021";
        $idAtividadeDES_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DES_N2)->value('id');
        $idAnaliseDES_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES_N2)->max('id');
        $idLaudoDES_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDES_N2)->value('id');
        $statusDES_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES_N2)->value('status_id');
        //03B7DB10 - FINISH OVEN EXHAUST FAN
        $tag_FOEF_03B7DB10 = "TE 72 500 510 872 000 - 000073";
        $idAtividadeFOEF_03B7DB10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FOEF_03B7DB10)->value('id');
        $idAnaliseFOEF_03B7DB10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFOEF_03B7DB10)->max('id');
        $idLaudoFOEF_03B7DB10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFOEF_03B7DB10)->value('id');
        $statusFOEF_03B7DB10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFOEF_03B7DB10)->value('status_id');
        //03B7DB10 - PRIME OVEN EXHAUST FAN
        $tag_POEF_03B7DB10 = "TE 72 500 510 872 000 - 000020";
        $idAtividadePOEF_03B7DB10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_POEF_03B7DB10)->value('id');
        $idAnalisePOEF_03B7DB10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePOEF_03B7DB10)->max('id');
        $idLaudoPOEF_03B7DB10 = DB::table('laudos')->where('analise_id', '=', $idAnalisePOEF_03B7DB10)->value('id');
        $statusPOEF_03B7DB10 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePOEF_03B7DB10)->value('status_id');
        //EXAUSTOR OXIDIZER
        $tag_EOXI = "TE 72 500 510 872 000 - 000019";
        $idAtividadeEOXI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EOXI)->value('id');
        $idAnaliseEOXI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEOXI)->max('id');
        $idLaudoEOXI = DB::table('laudos')->where('analise_id', '=', $idAnaliseEOXI)->value('id');
        $statusEOXI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEOXI)->value('status_id');
        //03B7DB09 - MAKE-UP AIR SUPPLY FAN - NÃO POSSUI TAG CADASTRADA
        $tag_MAKE_UP_ASF = "TE 72 500 510 872 000 - 000095";
        $idAtividadeMAKE_UP_ASF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MAKE_UP_ASF)->value('id');
        $idAnaliseMAKE_UP_ASF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMAKE_UP_ASF)->max('id');
        $idLaudoMAKE_UP_ASF = DB::table('laudos')->where('analise_id', '=', $idAnaliseMAKE_UP_ASF)->value('id');
        $statusMAKE_UP_ASF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMAKE_UP_ASF)->value('status_id');
        //03B7DB08 - COLD LAMINATOR TOP ROLL
        $tag_CLTR_03B7DB08 = "TE 72 500 510 872 000 - 000018";
        $idAtividadeCLTR_03B7DB08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CLTR_03B7DB08)->value('id');
        $idAnaliseCLTR_03B7DB08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCLTR_03B7DB08)->max('id');
        $idLaudoCLTR_03B7DB08 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCLTR_03B7DB08)->value('id');
        $statusCLTR_03B7DB08 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCLTR_03B7DB08)->value('status_id');
        //03B7DB08 - COLD LAMINATOR BOTTOM ROLL - NÃO POSSUI TAG CADASTRADA
        $tag_CLBR_03B7DB08 = "TE 72 500 510 872 000 - 000094";
        $idAtividadeCLBR_03B7DB08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CLBR_03B7DB08)->value('id');
        $idAnaliseCLBR_03B7DB08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCLBR_03B7DB08)->max('id');
        $idLaudoCLBR_03B7DB08 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCLBR_03B7DB08)->value('id');
        $statusCLBR_03B7DB08 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCLBR_03B7DB08)->value('status_id');
        //03B7DB07 - THREADING TURN SUPORT ROLL
        $tag_TTSR_03B7DB07 = "TE 72 500 510 872 000 - 000072";
        $idAtividadeTTSR_03B7DB07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TTSR_03B7DB07)->value('id');
        $idAnaliseTTSR_03B7DB07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTTSR_03B7DB07)->max('id');
        $idLaudoTTSR_03B7DB07 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTTSR_03B7DB07)->value('id');
        $statusTTSR_03B7DB07 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTTSR_03B7DB07)->value('status_id');
        //BRIDLE N°4 - M2
        $tag_BRIDLE_N4_M2 = "TE 72 500 510 872 000 - 000071";
        $idAtividadeBRIDLE_N4_M2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N4_M2)->value('id');
        $idAnaliseBRIDLE_N4_M2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N4_M2)->max('id');
        $idLaudoBRIDLE_N4_M2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N4_M2)->value('id');
        $statusBRIDLE_N4_M2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N4_M2)->value('status_id');
        //BRIDLE N°4 - M1
        $tag_BRIDLE_N4_M1 = "TE 72 500 510 872 000 - 000070";
        $idAtividadeBRIDLE_N4_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N4_M1)->value('id');
        $idAnaliseBRIDLE_N4_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N4_M1)->max('id');
        $idLaudoBRIDLE_N4_M1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N4_M1)->value('id');
        $statusBRIDLE_N4_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N4_M1)->value('status_id');
        //03B7DB07 - PRIME QUENCH ROLL
        $tag_PQR_03B7DB07 = "TE 72 500 510 872 000 - 000017";
        $idAtividadePQR_03B7DB07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PQR_03B7DB07)->value('id');
        $idAnalisePQR_03B7DB07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePQR_03B7DB07)->max('id');
        $idLaudoPQR_03B7DB07 = DB::table('laudos')->where('analise_id', '=', $idAnalisePQR_03B7DB07)->value('id');
        $statusPQR_03B7DB07 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePQR_03B7DB07)->value('status_id');
        //03B7DB06 - PRIME COATER - BOTTOM PICK-UP ROLL - NÃO POSSUI TAG CADASTRADA
        $tag_PCBPR_03B7DB06 = "TE 72 500 510 872 000 - 000093";
        $idAtividadePCBPR_03B7DB06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PCBPR_03B7DB06)->value('id');
        $idAnalisePCBPR_03B7DB06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePCBPR_03B7DB06)->max('id');
        $idLaudoPCBPR_03B7DB06 = DB::table('laudos')->where('analise_id', '=', $idAnalisePCBPR_03B7DB06)->value('id');
        $statusPCBPR_03B7DB06 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePCBPR_03B7DB06)->value('status_id');
        //03B7DB06 - PRIME COATER - BOTTOM APPLICATOR ROLL - NÃO POSSUI TAG CADASTRADA
        $tag_PCBAR_03B7DB06 = "TE 72 500 510 872 000 - 000092";
        $idAtividadePCBAR_03B7DB06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PCBAR_03B7DB06)->value('id');
        $idAnalisePCBAR_03B7DB06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePCBAR_03B7DB06)->max('id');
        $idLaudoPCBAR_03B7DB06 = DB::table('laudos')->where('analise_id', '=', $idAnalisePCBAR_03B7DB06)->value('id');
        $statusPCBAR_03B7DB06 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePCBAR_03B7DB06)->value('status_id');
        //03B7DB06 - PRIME COATER - TOP PICK-UP ROLL - NÃO POSSUI TAG CADASTRADA
        $tag_PCTPR_03B7DB06 = "TE 72 500 510 872 000 - 000091";
        $idAtividadePCTPR_03B7DB06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PCTPR_03B7DB06)->value('id');
        $idAnalisePCTPR_03B7DB06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePCTPR_03B7DB06)->max('id');
        $idLaudoPCTPR_03B7DB06 = DB::table('laudos')->where('analise_id', '=', $idAnalisePCTPR_03B7DB06)->value('id');
        $statusPCTPR_03B7DB06 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePCTPR_03B7DB06)->value('status_id');
        //03B7DB06 - PRIME COATER - TOP APPLICATOR ROLL
        $tag_PCTAR_03B7DB06 = "TE 72 500 510 872 000 - 000016";
        $idAtividadePCTAR_03B7DB06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PCTAR_03B7DB06)->value('id');
        $idAnalisePCTAR_03B7DB06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePCTAR_03B7DB06)->max('id');
        $idLaudoPCTAR_03B7DB06 = DB::table('laudos')->where('analise_id', '=', $idAnalisePCTAR_03B7DB06)->value('id');
        $statusPCTAR_03B7DB06 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePCTAR_03B7DB06)->value('status_id');
        //BRIDLE N°3 - M2 - NÃO POSSUI TAG CADASTRADA
        $tag_BRIDLE_N3_M2 = "TE 72 500 510 872 000 - 000090";
        $idAtividadeBRIDLE_N3_M2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N3_M2)->value('id');
        $idAnaliseBRIDLE_N3_M2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N3_M2)->max('id');
        $idLaudoBRIDLE_N3_M2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N3_M2)->value('id');
        $statusBRIDLE_N3_M2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N3_M2)->value('status_id');
        //BRIDLE N°3 - M1
        $tag_BRIDLE_N3_M1 = "TE 72 500 510 872 000 - 000015";
        $idAtividadeBRIDLE_N3_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N3_M1)->value('id');
        $idAnaliseBRIDLE_N3_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N3_M1)->max('id');
        $idLaudoBRIDLE_N3_M1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N3_M1)->value('id');
        $statusBRIDLE_N3_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N3_M1)->value('status_id');
        //03B7DB04 - CHEMICAL COATER - BOTTOM PICK-UP ROLL - NÃO POSSUI TAG CADASTRADA
        $tag_CCBPR_03B7DB04 = "TE 72 500 510 872 000 - 000089";
        $idAtividadeCCBPR_03B7DB04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCBPR_03B7DB04)->value('id');
        $idAnaliseCCBPR_03B7DB04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCBPR_03B7DB04)->max('id');
        $idLaudoCCBPR_03B7DB04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCBPR_03B7DB04)->value('id');
        $statusCCBPR_03B7DB04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCBPR_03B7DB04)->value('status_id');
        //03B7DB04 - CHEMICAL COATER - BOTTOM APPLICATOR ROLL - NÃO POSSUI TAG CADASTRADA
        $tag_CCBAR_03B7DB04 = "TE 72 500 510 872 000 - 000088";
        $idAtividadeCCBAR_03B7DB04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCBAR_03B7DB04)->value('id');
        $idAnaliseCCBAR_03B7DB04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCBAR_03B7DB04)->max('id');
        $idLaudoCCBAR_03B7DB04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCBAR_03B7DB04)->value('id');
        $statusCCBAR_03B7DB04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCBAR_03B7DB04)->value('status_id');
        //03B7DB04 - CHEMICAL COATER - TOP PICK-UP ROLL - NÃO POSSUI TAG CADASTRADA
        $tag_CCTPR_03B7DB04 = "TE 72 500 510 872 000 - 000087";
        $idAtividadeCCTPR_03B7DB04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCTPR_03B7DB04)->value('id');
        $idAnaliseCCTPR_03B7DB04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCTPR_03B7DB04)->max('id');
        $idLaudoCCTPR_03B7DB04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCTPR_03B7DB04)->value('id');
        $statusCCTPR_03B7DB04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCTPR_03B7DB04)->value('status_id');
        //03B7DB04 - CHEMICAL COATER - TOP APPLICATOR ROLL
        $tag_CCTAR_03B7DB04 = "TE 72 500 510 872 000 - 000014";
        $idAtividadeCCTAR_03B7DB04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCTAR_03B7DB04)->value('id');
        $idAnaliseCCTAR_03B7DB04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCTAR_03B7DB04)->max('id');
        $idLaudoCCTAR_03B7DB04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCTAR_03B7DB04)->value('id');
        $statusCCTAR_03B7DB04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCTAR_03B7DB04)->value('status_id');
        //BRIDLE N°2 - M2 - NÃO POSSUI TAG CADASTRADA
        $tag_BRIDLE_N2_M2 = "TE 72 500 510 872 000 - 000086";
        $idAtividadeBRIDLE_N2_M2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N2_M2)->value('id');
        $idAnaliseBRIDLE_N2_M2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N2_M2)->max('id');
        $idLaudoBRIDLE_N2_M2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N2_M2)->value('id');
        $statusBRIDLE_N2_M2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N2_M2)->value('status_id');
        //BRIDLE N°2 - M1
        $tag_BRIDLE_N2_M1 = "TE 72 500 510 872 000 - 000013";
        $idAtividadeBRIDLE_N2_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N2_M1)->value('id');
        $idAnaliseBRIDLE_N2_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N2_M1)->max('id');
        $idLaudoBRIDLE_N2_M1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N2_M1)->value('id');
        $statusBRIDLE_N2_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N2_M1)->value('status_id');
        //BRIDLE N°1 - ROLO PEGADOR - NÃO POSSUI TAG CADASTRADA
        $tag_BRIDLE_N1_RP = "TE 72 500 510 872 000 - 000085";
        $idAtividadeBRIDLE_N1_RP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N1_RP)->value('id');
        $idAnaliseBRIDLE_N1_RP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N1_RP)->max('id');
        $idLaudoBRIDLE_N1_RP = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N1_RP)->value('id');
        $statusBRIDLE_N1_RP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N1_RP)->value('status_id');
        //BRIDLE N°1 - M2 - NÃO POSSUI TAG CADASTRADA
        $tag_BRIDLE_N1_M2 = "TE 72 500 510 872 000 - 000084";
        $idAtividadeBRIDLE_N1_M2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N1_M2)->value('id');
        $idAnaliseBRIDLE_N1_M2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N1_M2)->max('id');
        $idLaudoBRIDLE_N1_M2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N1_M2)->value('id');
        $statusBRIDLE_N1_M2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N1_M2)->value('status_id');
        //BRIDLE N°1 - M1
        $tag_BRIDLE_N1_M1 = "TE 72 500 510 872 000 - 000012";
        $idAtividadeBRIDLE_N1_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE_N1_M1)->value('id');
        $idAnaliseBRIDLE_N1_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE_N1_M1)->max('id');
        $idLaudoBRIDLE_N1_M1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE_N1_M1)->value('id');
        $statusBRIDLE_N1_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE_N1_M1)->value('status_id');
        //ROLO ALIMENTADOR N°2 - SUPERIOR  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N2_SUP = "TE 72 500 510 872 000 - 000069";
        $idAtividadeRA_N2_SUP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N2_SUP)->value('id');
        $idAnaliseRA_N2_SUP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N2_SUP)->max('id');
        $idLaudoRA_N2_SUP = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N2_SUP)->value('id');
        $statusRA_N2_SUP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N2_SUP)->value('status_id');
        //ROLO ALIMENTADOR N°2 - INFERIOR  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N2_INF = "TE 72 500 510 872 000 - 000068";
        $idAtividadeRA_N2_INF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N2_INF)->value('id');
        $idAnaliseRA_N2_INF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N2_INF)->max('id');
        $idLaudoRA_N2_INF = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N2_INF)->value('id');
        $statusRA_N2_INF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N2_INF)->value('status_id');
        //ROLO ALIMENTADOR N°1 - SUPERIOR  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N1_SUPER = "TE 72 500 510 872 000 - 000067";
        $idAtividadeRA_N1_SUPER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N1_SUPER)->value('id');
        $idAnaliseRA_N1_SUPER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N1_SUPER)->max('id');
        $idLaudoRA_N1_SUPER = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N1_SUPER)->value('id');
        $statusRA_N1_SUPER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N1_SUPER)->value('status_id');
        //ROLO ALIMENTADOR N°1 - INFERIOR  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N1_INF = "TE 72 500 510 872 000 - 000011";
        $idAtividadeRA_N1_INF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N1_INF)->value('id');
        $idAnaliseRA_N1_INF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N1_INF)->max('id');
        $statusRA_N1_INF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N1_INF)->value('status_id');
        $idLaudoRA_N1_INF = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N1_INF)->value('id');
        //RETIFICADOR DO OXIDIZER  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RET_OXID = "TE 72 500 510 872 000 - 000010";
        $idAtividadeRET_OXID = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_OXID)->value('id');
        $idAnaliseRET_OXID = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_OXID)->max('id');
        $idLaudoRET_OXID = DB::table('laudos')->where('analise_id', '=', $idAnaliseRET_OXID)->value('id');
        $statusRET_OXID = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_OXID)->value('status_id');
        //ROLO ALIMENTADOR N°6 - INFERIOR  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N6_INF = "TE 72 500 510 872 000 - 000009";
        $idAtividadeRA_N6_INF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N6_INF)->value('id');
        $idAnaliseRA_N6_INF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N6_INF)->max('id');
        $idLaudoRA_N6_INF = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N6_INF)->value('id');
        $statusRA_N6_INF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N6_INF)->value('status_id');
        //ROLO ALIMENTADOR N°6 - SUPERIOR  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N6_SUPER = "TE 72 500 510 872 000 - 000061";
        $idAtividadeRA_N6_SUPER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N6_SUPER)->value('id');
        $idAnaliseRA_N6_SUPER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N6_SUPER)->max('id');
        $idLaudoRA_N6_SUPER = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N6_SUPER)->value('id');
        $statusRA_N6_SUPER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N6_SUPER)->value('status_id');
        //ROLO ALIMENTADOR N°7 - INFERIOR  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N7_INF = "TE 72 500 510 872 000 - 000062";
        $idAtividadeRA_N7_INF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N7_INF)->value('id');
        $idAnaliseRA_N7_INF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N7_INF)->max('id');
        $idLaudoRA_N7_INF = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N7_INF)->value('id');
        $statusRA_N7_INF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N7_INF)->value('status_id');
        //ROLO ALIMENTADOR N°7 - SUPERIOR  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N7_SUPER = "TE 72 500 510 872 000 - 000063";
        $idAtividadeRA_N7_SUPER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N7_SUPER)->value('id');
        $idAnaliseRA_N7_SUPER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N7_SUPER)->max('id');
        $idLaudoRA_N7_SUPER = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N7_SUPER)->value('id');
        $statusRA_N7_SUPER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N7_SUPER)->value('status_id');
        //03B7DA09 - TURN ROLL TO RECOILER  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_TRTR_03B7DA09 = "TE 72 500 510 872 000 - 000064";
        $idAtividadeTRTR_03B7DA09 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TRTR_03B7DA09)->value('id');
        $idAnaliseTRTR_03B7DA09 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTRTR_03B7DA09)->max('id');
        $idLaudoTRTR_03B7DA09 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTRTR_03B7DA09)->value('id');
        $statusTRTR_03B7DA09 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTRTR_03B7DA09)->value('status_id');
        //03B7DA08 - WAXER BOTTOM PICK-UP ROLL  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_WBPR_03B7DA08 = "TE 72 500 510 872 000 - 000008";
        $idAtividadeWBPR_03B7DA08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WBPR_03B7DA08)->value('id');
        $idAnaliseWBPR_03B7DA08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWBPR_03B7DA08)->max('id');
        $idLaudoWBPR_03B7DA08 = DB::table('laudos')->where('analise_id', '=', $idAnaliseWBPR_03B7DA08)->value('id');
        $statusWBPR_03B7DA08 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWBPR_03B7DA08)->value('status_id');
        //03B7DA08 - WAXER TOP PICK-UP ROLL  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_WTPR_03B7DA08 = "TE 72 500 510 872 000 - 000058";
        $idAtividadeWTPR_03B7DA08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WTPR_03B7DA08)->value('id');
        $idAnaliseWTPR_03B7DA08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWTPR_03B7DA08)->max('id');
        $idLaudoWTPR_03B7DA08 = DB::table('laudos')->where('analise_id', '=', $idAnaliseWTPR_03B7DA08)->value('id');
        $statusWTPR_03B7DA08 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWTPR_03B7DA08)->value('status_id');
        //03B7DA08 - WAXER BOTTOM APPLICATOR ROLL  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_WBAR_03B7DA08 = "TE 72 500 510 872 000 - 000059";
        $idAtividadeWBAR_03B7DA08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WBAR_03B7DA08)->value('id');
        $idAnaliseWBAR_03B7DA08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWBAR_03B7DA08)->max('id');
        $idLaudoWBAR_03B7DA08 = DB::table('laudos')->where('analise_id', '=', $idAnaliseWBAR_03B7DA08)->value('id');
        $statusWBAR_03B7DA08 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWBAR_03B7DA08)->value('status_id');
        //03B7DA08 - WAXER TOP APPLICATOR ROLL  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_WTAR_03B7DA08 = "TE 72 500 510 872 000 - 000060";
        $idAtividadeWTAR_03B7DA08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WTAR_03B7DA08)->value('id');
        $idAnaliseWTAR_03B7DA08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWTAR_03B7DA08)->max('id');
        $idLaudoWTAR_03B7DA08 = DB::table('laudos')->where('analise_id', '=', $idAnaliseWTAR_03B7DA08)->value('id');
        $statusWTAR_03B7DA08 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWTAR_03B7DA08)->value('status_id');
        //03B7DA07 - FINISH B COATER BOTTOM APPLICATOR ROLL
        $tag_FBCBAR_03B7DA07 = "TE 72 500 510 872 000 - 000007";
        $idAtividadeFBCBAR_03B7DA07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FBCBAR_03B7DA07)->value('id');
        $idAnaliseFBCBAR_03B7DA07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFBCBAR_03B7DA07)->max('id');
        $idLaudoFBCBAR_03B7DA07 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFBCBAR_03B7DA07)->value('id');
        $statusFBCBAR_03B7DA07 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFBCBAR_03B7DA07)->value('status_id');
        //03B7DA07 - FINISH B COATER BOTTOM METERING ROLL
        $tag_FBCBMR_03B7DA07 = "TE 72 500 510 872 000 - 000055";
        $idAtividadeFBCBMR_03B7DA07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FBCBMR_03B7DA07)->value('id');
        $idAnaliseFBCBMR_03B7DA07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFBCBMR_03B7DA07)->max('id');
        $idLaudoFBCBMR_03B7DA07 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFBCBMR_03B7DA07)->value('id');
        $statusFBCBMR_03B7DA07 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFBCBMR_03B7DA07)->value('status_id');
        //03B7DA07 - FINISH B COATER BOOTOM PICK-UP ROLL
        $tag_FBCBPR_03B7DA07 = "TE 72 500 510 872 000 - 000056";
        $idAtividadeFBCBPR_03B7DA07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FBCBPR_03B7DA07)->value('id');
        $idAnaliseFBCBPR_03B7DA07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFBCBPR_03B7DA07)->max('id');
        $idLaudoFBCBPR_03B7DA07 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFBCBPR_03B7DA07)->value('id');
        $statusFBCBPR_03B7DA07 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFBCBPR_03B7DA07)->value('status_id');
        //03B7DA07 - FINISH QUENCH ROLL  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_FQR_03B7DA07 = "TE 72 500 510 872 000 - 000057";
        $idAtividadeFQR_03B7DA07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FQR_03B7DA07)->value('id');
        $idAnaliseFQR_03B7DA07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFQR_03B7DA07)->max('id');
        $idLaudoFQR_03B7DA07 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFQR_03B7DA07)->value('id');
        $statusFQR_03B7DA07 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFQR_03B7DA07)->value('status_id');
        //03B7DA06 - FINISH B COATER TOP APPLICATOR ROLL
        $tag_FBCTAR_03B7DA06 = "TE 72 500 510 872 000 - 000006";
        $idAtividadeFBCTAR_03B7DA06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FBCTAR_03B7DA06)->value('id');
        $idAnaliseFBCTAR_03B7DA06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFBCTAR_03B7DA06)->max('id');
        $idLaudoFBCTAR_03B7DA06 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFBCTAR_03B7DA06)->value('id');
        $statusFBCTAR_03B7DA06 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFBCTAR_03B7DA06)->value('status_id');
        //03B7DA06 - FINISH B COATER TOP METERING ROLL
        $tag_FBCTMR_03B7DA06 = "TE 72 500 510 872 000 - 000053";
        $idAtividadeFBCTMR_03B7DA06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FBCTMR_03B7DA06)->value('id');
        $idAnaliseFBCTMR_03B7DA06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFBCTMR_03B7DA06)->max('id');
        $idLaudoFBCTMR_03B7DA06 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFBCTMR_03B7DA06)->value('id');
        $statusFBCTMR_03B7DA06 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFBCTMR_03B7DA06)->value('status_id');
        //03B7DA06 - FINISH B COATER TOP PICK-UP ROLL
        $tag_FBCTPR_03B7DA06 = "TE 72 500 510 872 000 - 000054";
        $idAtividadeFBCTPR_03B7DA06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FBCTPR_03B7DA06)->value('id');
        $idAnaliseFBCTPR_03B7DA06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFBCTPR_03B7DA06)->max('id');
        $idLaudoFBCTPR_03B7DA06 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFBCTPR_03B7DA06)->value('id');
        $statusFBCTPR_03B7DA06 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFBCTPR_03B7DA06)->value('status_id');
        //03B7DA05 - FINISH A2 COATER APPLICATOR ROLL
        $tag_FA2CAR_03B7DA05 = "TE 72 500 510 872 000 - 000005";
        $idAtividadeFA2CAR_03B7DA05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FA2CAR_03B7DA05)->value('id');
        $idAnaliseFA2CAR_03B7DA05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFA2CAR_03B7DA05)->max('id');
        $idLaudoFA2CAR_03B7DA05 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFA2CAR_03B7DA05)->value('id');
        $statusFA2CAR_03B7DA05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFA2CAR_03B7DA05)->value('status_id');
        //03B7DA05 - FINISH A2 COATER METERING ROLL
        $tag_FA2CMR_03B7DA05 = "TE 72 500 510 872 000 - 000051";
        $idAtividadeFA2CMR_03B7DA05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FA2CMR_03B7DA05)->value('id');
        $idAnaliseFA2CMR_03B7DA05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFA2CMR_03B7DA05)->max('id');
        $idLaudoFA2CMR_03B7DA05 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFA2CMR_03B7DA05)->value('id');
        $statusFA2CMR_03B7DA05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFA2CMR_03B7DA05)->value('status_id');
        //03B7DA05 - FINISH A2 COATER PICK-UP ROLL
        $tag_FA2CPR_03B7DA05 = "TE 72 500 510 872 000 - 000052";
        $idAtividadeFA2CPR_03B7DA05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FA2CPR_03B7DA05)->value('id');
        $idAnaliseFA2CPR_03B7DA05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFA2CPR_03B7DA05)->max('id');
        $idLaudoFA2CPR_03B7DA05 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFA2CPR_03B7DA05)->value('id');
        $statusFA2CPR_03B7DA05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFA2CPR_03B7DA05)->value('status_id');
        //03B7DA04 - FINISH A1 COATER APPLICATOR ROLL
        $tag_FA1CAR_03B7DA04 = "TE 72 500 510 872 000 - 000004";
        $idAtividadeFA1CAR_03B7DA04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FA1CAR_03B7DA04)->value('id');
        $idAnaliseFA1CAR_03B7DA04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFA1CAR_03B7DA04)->max('id');
        $idLaudoFA1CAR_03B7DA04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFA1CAR_03B7DA04)->value('id');
        $statusFA1CAR_03B7DA04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFA1CAR_03B7DA04)->value('status_id');
        //03B7DA04 - FINISH A1 COATER METERING ROLL
        $tag_FA1CMR_03B7DA04 = "TE 72 500 510 872 000 - 000049";
        $idAtividadeFA1CMR_03B7DA04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FA1CMR_03B7DA04)->value('id');
        $idAnaliseFA1CMR_03B7DA04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFA1CMR_03B7DA04)->max('id');
        $idLaudoFA1CMR_03B7DA04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFA1CMR_03B7DA04)->value('id');
        $statusFA1CMR_03B7DA04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFA1CMR_03B7DA04)->value('status_id');
        //03B7DA04 - FINISH A1 COATER PICK-UP ROLL
        $tag_FA1CPR_03B7DA04 = "TE 72 500 510 872 000 - 000050";
        $idAtividadeFA1CPR_03B7DA04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FA1CPR_03B7DA04)->value('id');
        $idAnaliseFA1CPR_03B7DA04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFA1CPR_03B7DA04)->max('id');
        $idLaudoFA1CPR_03B7DA04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFA1CPR_03B7DA04)->value('id');
        $statusFA1CPR_03B7DA04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFA1CPR_03B7DA04)->value('status_id');
        //ROLO ESCOVA #1 - BACK-UP
        $tag_RE_1_BACK_UP = "TE 72 500 510 872 000 - 000003";
        $idAtividadeRE_1_BACK_UP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_1_BACK_UP)->value('id');
        $idAnaliseRE_1_BACK_UP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_1_BACK_UP)->max('id');
        $idLaudoRE_1_BACK_UP = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_1_BACK_UP)->value('id');
        $statusRE_1_BACK_UP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_1_BACK_UP)->value('status_id');
        //ROLO ESCOVA #2 - BACK-UP
        $tag_RE_2_BACK_UP = "TE 72 500 510 872 000 - 000046";
        $idAtividadeRE_2_BACK_UP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_2_BACK_UP)->value('id');
        $idAnaliseRE_2_BACK_UP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_2_BACK_UP)->max('id');
        $idLaudoRE_2_BACK_UP = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_2_BACK_UP)->value('id');
        $statusRE_2_BACK_UP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_2_BACK_UP)->value('status_id');
        //ROLO ESCOVA #3 - BACK-UP
        $tag_RE_3_BACK_UP = "TE 72 500 510 872 000 - 000047";
        $idAtividadeRE_3_BACK_UP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_3_BACK_UP)->value('id');
        $idAnaliseRE_3_BACK_UP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_3_BACK_UP)->max('id');
        $idLaudoRE_3_BACK_UP = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_3_BACK_UP)->value('id');
        $statusRE_3_BACK_UP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_3_BACK_UP)->value('status_id');
        //ROLO ESCOVA #4 - BACK-UP
        $tag_RE_4_BACK_UP = "TE 72 500 510 872 000 - 000048";
        $idAtividadeRE_4_BACK_UP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_4_BACK_UP)->value('id');
        $idAnaliseRE_4_BACK_UP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_4_BACK_UP)->max('id');
        $idLaudoRE_4_BACK_UP = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_4_BACK_UP)->value('id');
        $statusRE_4_BACK_UP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_4_BACK_UP)->value('status_id');
        //ROLO ALIMENTADOR N°4 - CENTRAL  -  EQUIPAMENTO NÃO CADASTRADO
        $tag_RA_N4_CENTRAL = "TE 72 500 510 872 000 - 000002";
        $idAtividadeRA_N4_CENTRAL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N4_CENTRAL)->value('id');
        $idAnaliseRA_N4_CENTRAL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N4_CENTRAL)->max('id');
        $idLaudoRA_N4_CENTRAL = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N4_CENTRAL)->value('id');
        $statusRA_N4_CENTRAL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N4_CENTRAL)->value('status_id');
        //ROLO ALIMENTADOR N°4 - SUPERIOR
        $tag_RA_N4_SUPERIOR = "TE 72 500 510 872 000 - 000043";
        $idAtividadeRA_N4_SUPERIOR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N4_SUPERIOR)->value('id');
        $idAnaliseRA_N4_SUPERIOR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N4_SUPERIOR)->max('id');
        $idLaudoRA_N4_SUPERIOR = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N4_SUPERIOR)->value('id');
        $statusRA_N4_SUPERIOR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N4_SUPERIOR)->value('status_id');
        //ROLO ALIMENTADOR N°5 - INFERIOR
        $tag_RA_N5_INF = "TE 72 500 510 872 000 - 000044";
        $idAtividadeRA_N5_INF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N5_INF)->value('id');
        $idAnaliseRA_N5_INF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N5_INF)->max('id');
        $idLaudoRA_N5_INF = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N5_INF)->value('id');
        $statusRA_N5_INF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N5_INF)->value('status_id');
        //ROLO ALIMENTADOR N°5 - SUPERIOR
        $tag_RA_N5_SUPER = "TE 72 500 510 872 000 - 000045";
        $idAtividadeRA_N5_SUPER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N5_SUPER)->value('id');
        $idAnaliseRA_N5_SUPER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N5_SUPER)->max('id');
        $idLaudoRA_N5_SUPER = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N5_SUPER)->value('id');
        $statusRA_N5_SUPER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N5_SUPER)->value('status_id');
        //ROLO ALIMENTADOR N°3 - INFERIOR
        $tag_RA_N3_INF = "TE 72 500 510 872 000 - 000001";
        $idAtividadeRA_N3_INF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N3_INF)->value('id');
        $idAnaliseRA_N3_INF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N3_INF)->max('id');
        $idLaudoRA_N3_INF = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N3_INF)->value('id');
        $statusRA_N3_INF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N3_INF)->value('status_id');
        //ROLO ALIMENTADOR N°3 - SUPERIOR
        $tag_RA_N3_SUPER = "TE 72 500 510 872 000 - 000041";
        $idAtividadeRA_N3_SUPER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N3_SUPER)->value('id');
        $idAnaliseRA_N3_SUPER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N3_SUPER)->max('id');
        $idLaudoRA_N3_SUPER = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N3_SUPER)->value('id');
        $statusRA_N3_SUPER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N3_SUPER)->value('status_id');
        //ROLO ALIMENTADOR N°4 - INFERIOR
        $tag_RA_N4_INF = "TE 72 500 510 872 000 - 000042";
        $idAtividadeRA_N4_INF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RA_N4_INF)->value('id');
        $idAnaliseRA_N4_INF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRA_N4_INF)->max('id');
        $idLaudoRA_N4_INF = DB::table('laudos')->where('analise_id', '=', $idAnaliseRA_N4_INF)->value('id');
        $statusRA_N4_INF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRA_N4_INF)->value('status_id');


    if ($statusBRIDLE_N6_M2 == 5 || $statusBRIDLE_N6_M1 == 5 || $statusBRIDLE_N5_M2 == 5 || $statusBRIDLE_N5_M1 == 5 || $statusMF_170KW == 5 || $status_03B7DD05 == 5 || $status_03B7DD04 == 5 ||
    $statusRE_4 == 5 || $statusRE_3 == 5 || $statusDES_N1 == 5 || $statusENROLADEIRA == 5 || $statusACUM_SAIDA == 5 || $statusRET_MASTER == 5 || $statusRET_SLAVE == 5 || $statusROLO_ESCOVA_1 == 5 ||
    $statusROLO_ESCOVA_2 == 5 || $statusACUM_ENTRADA == 5 || $statusFOEF_03B7DB10 == 5 || $statusPOEF_03B7DB10 == 5 || $statusEOXI == 5 || $statusMAKE_UP_ASF == 5 || $statusCLTR_03B7DB08 == 5 ||
    $statusCLBR_03B7DB08 == 5 || $statusTTSR_03B7DB07 == 5 || $statusBRIDLE_N4_M2 == 5 || $statusBRIDLE_N4_M1 == 5 || $statusPQR_03B7DB07 == 5 || $statusPCBPR_03B7DB06 == 5 || $statusPCBAR_03B7DB06 == 5 ||
    $statusPCTPR_03B7DB06 == 5 || $statusPCTAR_03B7DB06 == 5 || $statusBRIDLE_N3_M2 == 5 || $statusBRIDLE_N3_M1 == 5 || $statusCCBPR_03B7DB04 == 5 || $statusCCBAR_03B7DB04 == 5 || $statusCCTPR_03B7DB04 == 5 ||
    $statusCCTAR_03B7DB04 == 5 || $statusBRIDLE_N2_M2 == 5 || $statusBRIDLE_N2_M1 == 5 || $statusBRIDLE_N1_RP == 5 || $statusBRIDLE_N1_M2 == 5 || $statusBRIDLE_N1_M1 == 5 || $statusRA_N2_SUP == 5 ||
    $statusRA_N2_INF == 5 || $statusRA_N1_SUPER == 5 || $statusRA_N1_INF == 5 || $statusRET_OXID == 5 || $statusRA_N6_INF == 5 || $statusRA_N6_SUPER == 5 || $statusRA_N7_INF == 5 || $statusRA_N7_SUPER == 5 ||
    $statusTRTR_03B7DA09 == 5 || $statusWBPR_03B7DA08 == 5 || $statusWTPR_03B7DA08 == 5 || $statusWBAR_03B7DA08 == 5 || $statusWTAR_03B7DA08 == 5 || $statusFBCBAR_03B7DA07 == 5 || $statusFBCBMR_03B7DA07 == 5 ||
    $statusFBCBPR_03B7DA07 == 5 || $statusFQR_03B7DA07 == 5 || $statusFBCTAR_03B7DA06 == 5 || $statusFBCTMR_03B7DA06 == 5 || $statusFBCTPR_03B7DA06 == 5 || $statusFA2CAR_03B7DA05 == 5 || $statusFA2CMR_03B7DA05 == 5 ||
    $statusFA2CPR_03B7DA05 == 5 || $statusFA1CAR_03B7DA04 == 5 || $statusFA1CMR_03B7DA04 == 5 || $statusFA1CPR_03B7DA04 == 5 || $statusRE_1_BACK_UP == 5 || $statusRE_2_BACK_UP == 5 || $statusRE_3_BACK_UP == 5 ||
    $statusRE_4_BACK_UP == 5 || $statusRA_N4_CENTRAL == 5 || $statusRA_N4_SUPERIOR == 5 || $statusRA_N5_INF == 5 || $statusRA_N5_SUPER == 5 || $statusRA_N3_INF == 5 || $statusRA_N3_SUPER == 5 || $statusRA_N4_INF == 5) {
      $pintura_paineis_drives_status = 5;
    } elseif ($statusBRIDLE_N6_M2 == 4 || $statusBRIDLE_N6_M1 == 4 || $statusBRIDLE_N5_M2 == 4 || $statusBRIDLE_N5_M1 == 4 || $statusMF_170KW == 4 || $status_03B7DD05 == 4 || $status_03B7DD04 == 4 ||
    $statusRE_4 == 4 || $statusRE_3 == 4 || $statusDES_N1 == 4 || $statusENROLADEIRA == 4 || $statusACUM_SAIDA == 4 || $statusRET_MASTER == 4 || $statusRET_SLAVE == 4 || $statusROLO_ESCOVA_1 == 4 ||
    $statusROLO_ESCOVA_2 == 4 || $statusACUM_ENTRADA == 4 || $statusFOEF_03B7DB10 == 4 || $statusPOEF_03B7DB10 == 4 || $statusEOXI == 4 || $statusMAKE_UP_ASF == 4 || $statusCLTR_03B7DB08 == 4 ||
    $statusCLBR_03B7DB08 == 4 || $statusTTSR_03B7DB07 == 4 || $statusBRIDLE_N4_M2 == 4 || $statusBRIDLE_N4_M1 == 4 || $statusPQR_03B7DB07 == 4 || $statusPCBPR_03B7DB06 == 4 || $statusPCBAR_03B7DB06 == 4 ||
    $statusPCTPR_03B7DB06 == 4 || $statusPCTAR_03B7DB06 == 4 || $statusBRIDLE_N3_M2 == 4 || $statusBRIDLE_N3_M1 == 4 || $statusCCBPR_03B7DB04 == 4 || $statusCCBAR_03B7DB04 == 4 || $statusCCTPR_03B7DB04 == 4 ||
    $statusCCTAR_03B7DB04 == 4 || $statusBRIDLE_N2_M2 == 4 || $statusBRIDLE_N2_M1 == 4 || $statusBRIDLE_N1_RP == 4 || $statusBRIDLE_N1_M2 == 4 || $statusBRIDLE_N1_M1 == 4 || $statusRA_N2_SUP == 4 ||
    $statusRA_N2_INF == 4 || $statusRA_N1_SUPER == 4 || $statusRA_N1_INF == 4 || $statusRET_OXID == 4 || $statusRA_N6_INF == 4 || $statusRA_N6_SUPER == 4 || $statusRA_N7_INF == 4 || $statusRA_N7_SUPER == 4 ||
    $statusTRTR_03B7DA09 == 4 || $statusWBPR_03B7DA08 == 4 || $statusWTPR_03B7DA08 == 4 || $statusWBAR_03B7DA08 == 4 || $statusWTAR_03B7DA08 == 4 || $statusFBCBAR_03B7DA07 == 4 || $statusFBCBMR_03B7DA07 == 4 ||
    $statusFBCBPR_03B7DA07 == 4 || $statusFQR_03B7DA07 == 4 || $statusFBCTAR_03B7DA06 == 4 || $statusFBCTMR_03B7DA06 == 4 || $statusFBCTPR_03B7DA06 == 4 || $statusFA2CAR_03B7DA05 == 4 || $statusFA2CMR_03B7DA05 == 4 ||
    $statusFA2CPR_03B7DA05 == 4 || $statusFA1CAR_03B7DA04 == 4 || $statusFA1CMR_03B7DA04 == 4 || $statusFA1CPR_03B7DA04 == 4 || $statusRE_1_BACK_UP == 4 || $statusRE_2_BACK_UP == 4 || $statusRE_3_BACK_UP == 4 ||
    $statusRE_4_BACK_UP == 4 || $statusRA_N4_CENTRAL == 4 || $statusRA_N4_SUPERIOR == 4 || $statusRA_N5_INF == 4 || $statusRA_N5_SUPER == 4 || $statusRA_N3_INF == 4 || $statusRA_N3_SUPER == 4 || $statusRA_N4_INF == 4) {
      $pintura_paineis_drives_status = 4;
    } elseif ($statusBRIDLE_N6_M2 == 3 || $statusBRIDLE_N6_M1 == 3 || $statusBRIDLE_N5_M2 == 3 || $statusBRIDLE_N5_M1 == 3 || $statusMF_170KW == 3 || $status_03B7DD05 == 3 || $status_03B7DD04 == 3 ||
    $statusRE_4 == 3 || $statusRE_3 == 3 || $statusDES_N1 == 3 || $statusENROLADEIRA == 3 || $statusACUM_SAIDA == 3 || $statusRET_MASTER == 3 || $statusRET_SLAVE == 3 || $statusROLO_ESCOVA_1 == 3 ||
    $statusROLO_ESCOVA_2 == 3 || $statusACUM_ENTRADA == 3 || $statusFOEF_03B7DB10 == 3 || $statusPOEF_03B7DB10 == 3 || $statusEOXI == 3 || $statusMAKE_UP_ASF == 3 || $statusCLTR_03B7DB08 == 3 ||
    $statusCLBR_03B7DB08 == 3 || $statusTTSR_03B7DB07 == 3 || $statusBRIDLE_N4_M2 == 3 || $statusBRIDLE_N4_M1 == 3 || $statusPQR_03B7DB07 == 3 || $statusPCBPR_03B7DB06 == 3 || $statusPCBAR_03B7DB06 == 3 ||
    $statusPCTPR_03B7DB06 == 3 || $statusPCTAR_03B7DB06 == 3 || $statusBRIDLE_N3_M2 == 3 || $statusBRIDLE_N3_M1 == 3 || $statusCCBPR_03B7DB04 == 3 || $statusCCBAR_03B7DB04 == 3 || $statusCCTPR_03B7DB04 == 3 ||
    $statusCCTAR_03B7DB04 == 3 || $statusBRIDLE_N2_M2 == 3 || $statusBRIDLE_N2_M1 == 3 || $statusBRIDLE_N1_RP == 3 || $statusBRIDLE_N1_M2 == 3 || $statusBRIDLE_N1_M1 == 3 || $statusRA_N2_SUP == 3 ||
    $statusRA_N2_INF == 3 || $statusRA_N1_SUPER == 3 || $statusRA_N1_INF == 3 || $statusRET_OXID == 3 || $statusRA_N6_INF == 3 || $statusRA_N6_SUPER == 3 || $statusRA_N7_INF == 3 || $statusRA_N7_SUPER == 3 ||
    $statusTRTR_03B7DA09 == 3 || $statusWBPR_03B7DA08 == 3 || $statusWTPR_03B7DA08 == 3 || $statusWBAR_03B7DA08 == 3 || $statusWTAR_03B7DA08 == 3 || $statusFBCBAR_03B7DA07 == 3 || $statusFBCBMR_03B7DA07 == 3 ||
    $statusFBCBPR_03B7DA07 == 3 || $statusFQR_03B7DA07 == 3 || $statusFBCTAR_03B7DA06 == 3 || $statusFBCTMR_03B7DA06 == 3 || $statusFBCTPR_03B7DA06 == 3 || $statusFA2CAR_03B7DA05 == 3 || $statusFA2CMR_03B7DA05 == 3 ||
    $statusFA2CPR_03B7DA05 == 3 || $statusFA1CAR_03B7DA04 == 3 || $statusFA1CMR_03B7DA04 == 3 || $statusFA1CPR_03B7DA04 == 3 || $statusRE_1_BACK_UP == 3 || $statusRE_2_BACK_UP == 3 || $statusRE_3_BACK_UP == 3 ||
    $statusRE_4_BACK_UP == 3 || $statusRA_N4_CENTRAL == 3 || $statusRA_N4_SUPERIOR == 3 || $statusRA_N5_INF == 3 || $statusRA_N5_SUPER == 3 || $statusRA_N3_INF == 3 || $statusRA_N3_SUPER == 3 || $statusRA_N4_INF == 3) {
      $pintura_paineis_drives_status = 3;
    } else {
      $pintura_paineis_drives_status = "";
    }

    return $pintura_paineis_drives_status;
  }

  public static function pintura_paineis_emergencia_Menu() {
    $pintura_paineis_emergencia_status = "";
    //03B7AD14 - PAINEL DE EMERGÊNCIA
    $tag_PE_03B7AD14 = "TE 72 500 510 736 000 - 000003";
    $idAtividadePE_03B7AD14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_03B7AD14)->value('id');
    $idAnalisePE_03B7AD14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_03B7AD14)->max('id');
    $statusPE_03B7AD14 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_03B7AD14)->value('status_id');
    //03B7AD15 - PAINEL DE EMERGÊNCIA
    $tag_PE_03B7AD15 = "TE 72 500 510 736 000 - 000004";
    $idAtividadePE_03B7AD15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_03B7AD15)->value('id');
    $idAnalisePE_03B7AD15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_03B7AD15)->max('id');
    $statusPE_03B7AD15 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_03B7AD15)->value('status_id');
    //03B7AD16 - PAINEL DE EMERGÊNCIA
    $tag_PE_03B7AD16 = "TE 72 500 510 736 000 - 000005";
    $idAtividadePE_03B7AD16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_03B7AD16)->value('id');
    $idAnalisePE_03B7AD16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_03B7AD16)->max('id');
    $statusPE_03B7AD16 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_03B7AD16)->value('status_id');
    //03B7AD17 - PAINEL DE EMERGÊNCIA
    $tag_PE_03B7AD17 = "TE 72 500 510 736 000 - 000006";
    $idAtividadePE_03B7AD17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_03B7AD17)->value('id');
    $idAnalisePE_03B7AD17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_03B7AD17)->max('id');
    $statusPE_03B7AD17 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_03B7AD17)->value('status_id');
    //03B7AD04 - PLC  -  EQUIPAMENTO NÃO CADASTRADO
    $tag_PLC_03B7AD04 = "TE 72 500 510 736 000 - 000002";
    $idAtividadePLC_03B7AD04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PLC_03B7AD04)->value('id');
    $idAnalisePLC_03B7AD04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLC_03B7AD04)->max('id');
    $statusPLC_03B7AD04 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLC_03B7AD04)->value('status_id');
    //03B7AD01 - PLC  -  EQUIPAMENTO NÃO CADASTRADO
    $tag_PLC_03B7AD01 = "TE 72 500 510 736 000 - 000001";
    $idAtividadePLC_03B7AD01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PLC_03B7AD01)->value('id');
    $idAnalisePLC_03B7AD01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLC_03B7AD01)->max('id');
    $statusPLC_03B7AD01 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLC_03B7AD01)->value('status_id');

    if ($statusPE_03B7AD14 == 5 || $statusPE_03B7AD15  == 5 || $statusPE_03B7AD16 == 5 || $statusPE_03B7AD17 == 5 || $statusPLC_03B7AD04 == 5 || $statusPLC_03B7AD01 == 5) {
      $pintura_paineis_emergencia_status = 5;
    } elseif ($statusPE_03B7AD14 == 4 || $statusPE_03B7AD15  == 4 || $statusPE_03B7AD16 == 4 || $statusPE_03B7AD17 == 4 || $statusPLC_03B7AD04 == 4 || $statusPLC_03B7AD01 == 4) {
      $pintura_paineis_emergencia_status = 4;
    } elseif ($statusPE_03B7AD14 == 3 || $statusPE_03B7AD15  == 3 || $statusPE_03B7AD16 == 3 || $statusPE_03B7AD17 == 3 || $statusPLC_03B7AD04 == 3 || $statusPLC_03B7AD01 == 3) {
      $pintura_paineis_emergencia_status = 3;
    } else {
      $pintura_paineis_emergencia_status = "";
    }

    return $pintura_paineis_emergencia_status;
  }

  public static function pintura_paineis_ccm_Menu() {
    $pintura_paineis_ccm_status = "";
    //03B5BC01 - ALIMENTAÇÃO
    $tag_ALIMENTACAO = "TE 72 500 510 736 000 - 000009";
    $idAtividadeALIMENTACAO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIMENTACAO)->value('id');
    $idAnaliseALIMENTACAO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIMENTACAO)->max('id');
    $statusALIMENTACAO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIMENTACAO)->value('status_id');
    //VVF STRIP DRIVERS
    $tag_VVF_SD = "TE 72 500 510 736 000 - 000008";
    $idAtividadeVVF_SD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_VVF_SD)->value('id');
    $idAnaliseVVF_SD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVVF_SD)->max('id');
    $statusVVF_SD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVVF_SD)->value('status_id');
    //SOPRADOR #1 - ESTUFA PRIMER ZONA #4
    $tag_S1_EP_ZONA_4 = "TE 72 500 510 736 000 - 000020";
    $idAtividadeS1_EP_ZONA_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EP_ZONA_4)->value('id');
    $idAnaliseS1_EP_ZONA_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EP_ZONA_4)->max('id');
    $statusS1_EP_ZONA_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EP_ZONA_4)->value('status_id');
    //SOPRADOR #2 - ESTUFA PRIMER ZONA #4
    $tag_S2_EP_Z_4 = "TE 72 500 510 736 000 - 000016";
    $idAtividadeS2_EP_Z_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EP_Z_4)->value('id');
    $idAnaliseS2_EP_Z_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EP_Z_4)->max('id');
    $statusS2_EP_Z_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EP_Z_4)->value('status_id');
    //SOPRADOR #1 - ESTUFA PRIMER ZONA #3
    $tag_S1_EP_Z_3 = "TE 72 500 510 736 000 - 000019";
    $idAtividadeS1_EP_Z_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EP_Z_3)->value('id');
    $idAnaliseS1_EP_Z_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EP_Z_3)->max('id');
    $statusS1_EP_Z_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EP_Z_3)->value('status_id');
    //SOPRADOR #2 - ESTUFA PRIMER ZONA #3
    $tag_S2_EP_Z_3 = "TE 72 500 510 736 000 - 000015";
    $idAtividadeS2_EP_Z_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EP_Z_3)->value('id');
    $idAnaliseS2_EP_Z_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EP_Z_3)->max('id');
    $statusS2_EP_Z_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EP_Z_3)->value('status_id');
    //SOPRADOR #2 - ESTUFA FISNISH ZONA #4
    $tag_S2_EF_Z_4 = "TE 72 500 510 736 000 - 000024";
    $idAtividadeS2_EF_Z_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EF_Z_4)->value('id');
    $idAnaliseS2_EF_Z_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EF_Z_4)->max('id');
    $statusS2_EF_Z_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EF_Z_4)->value('status_id');
    //SOPRADOR #1 - ESTUFA FISNISH ZONA #4
    $tag_S1_EF_Z_4 = "TE 72 500 510 736 000 - 000028";
    $idAtividadeS1_EF_Z_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EF_Z_4)->value('id');
    $idAnaliseS1_EF_Z_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EF_Z_4)->max('id');
    $statusS1_EF_Z_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EF_Z_4)->value('status_id');
    //SOPRADOR #1 - ESTUFA PRIMER ZONA #2
    $tag_S1_EP_Z_2 = "TE 72 500 510 736 000 - 000018";
    $idAtividadeS1_EP_Z_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EP_Z_2)->value('id');
    $idAnaliseS1_EP_Z_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EP_Z_2)->max('id');
    $statusS1_EP_Z_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EP_Z_2)->value('status_id');
    //SOPRADOR #2 - ESTUFA PRIMER ZONA #2
    $tag_S2_EP_Z_2 = "TE 72 500 510 736 000 - 000014";
    $idAtividadeS2_EP_Z_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EP_Z_2)->value('id');
    $idAnaliseS2_EP_Z_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EP_Z_2)->max('id');
    $statusS2_EP_Z_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EP_Z_2)->value('status_id');
    //SOPRADOR #2 - ESTUFA FISNISH ZONA #3
    $tag_S2_EF_Z_3 = "TE 72 500 510 736 000 - 000023";
    $idAtividadeS2_EF_Z_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EF_Z_3)->value('id');
    $idAnaliseS2_EF_Z_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EF_Z_3)->max('id');
    $statusS2_EF_Z_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EF_Z_3)->value('status_id');
    //SOPRADOR #1 - ESTUFA FISNISH ZONA #3
    $tag_S1_EF_Z_3 = "TE 72 500 510 736 000 - 000027";
    $idAtividadeS1_EF_Z_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EF_Z_3)->value('id');
    $idAnaliseS1_EF_Z_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EF_Z_3)->max('id');
    $statusS1_EF_Z_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EF_Z_3)->value('status_id');
    //SOPRADOR #1 - ESTUFA PRIMER ZONA #1
    $tag_S1_EP_Z_1 = "TE 72 500 510 736 000 - 000017";
    $idAtividadeS1_EP_Z_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EP_Z_1)->value('id');
    $idAnaliseS1_EP_Z_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EP_Z_1)->max('id');
    $statusS1_EP_Z_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EP_Z_1)->value('status_id');
    //SOPRADOR #2 - ESTUFA PRIMER ZONA #1
    $tag_S2_EP_Z_1 = "TE 72 500 510 736 000 - 000013";
    $idAtividadeS2_EP_Z_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EP_Z_1)->value('id');
    $idAnaliseS2_EP_Z_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EP_Z_1)->max('id');
    $statusS2_EP_Z_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EP_Z_1)->value('status_id');
    //SOPRADOR #2 - ESTUFA FISNISH ZONA #2
    $tag_S2_EF_Z_2 = "TE 72 500 510 736 000 - 000022";
    $idAtividadeS2_EF_Z_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EF_Z_2)->value('id');
    $idAnaliseS2_EF_Z_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EF_Z_2)->max('id');
    $statusS2_EF_Z_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EF_Z_2)->value('status_id');
    //SOPRADOR #1 - ESTUFA FISNISH ZONA #2
    $tag_S1_EF_Z_2 = "TE 72 500 510 736 000 - 000026";
    $idAtividadeS1_EF_Z_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EF_Z_2)->value('id');
    $idAnaliseS1_EF_Z_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EF_Z_2)->max('id');
    $statusS1_EF_Z_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EF_Z_2)->value('status_id');
    //ALIMENTAÇÃO PARA UPS
    $tag_ALIM_UPS = "TE 72 500 510 736 000 - 000029";
    $idAtividadeALIM_UPS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_UPS)->value('id');
    $idAnaliseALIM_UPS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_UPS)->max('id');
    $statusALIM_UPS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_UPS)->value('status_id');


    //CADASTRAR NOME DO EQUIPAMENTO NA VIEW
    $tag_BD15C = "TE 72 500 510 736 000 - 000007";
    $idAtividadeBD15C = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BD15C)->value('id');
    $idAnaliseBD15C = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBD15C)->max('id');
    $idLaudoBD15C = DB::table('laudos')->where('analise_id', '=', $idAnaliseBD15C)->value('id');
    $statusBD15C = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBD15C)->value('status_id');


    //SOPRADOR #2 - ESTUFA FISNISH ZONA #1
    $tag_S2_EF_Z_1 = "TE 72 500 510 736 000 - 000021";
    $idAtividadeS2_EF_Z_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EF_Z_1)->value('id');
    $idAnaliseS2_EF_Z_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EF_Z_1)->max('id');
    $statusS2_EF_Z_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EF_Z_1)->value('status_id');
    //SOPRADOR #1 - ESTUFA FISNISH ZONA #1
    $tag_S1_EF_Z_1 = "TE 72 500 510 736 000 - 000025";
    $idAtividadeS1_EF_Z_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EF_Z_1)->value('id');
    $idAnaliseS1_EF_Z_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EF_Z_1)->max('id');
    $statusS1_EF_Z_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EF_Z_1)->value('status_id');
    //CHILLER SYSTEM
    $tag_CHILLER_SYS = "TE 72 500 510 736 000 - 000096";
    $idAtividadeCHILLER_SYS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CHILLER_SYS)->value('id');
    $idAnaliseCHILLER_SYS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCHILLER_SYS)->max('id');
    $statusCHILLER_SYS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCHILLER_SYS)->value('status_id');
    //SOPRADOR #1  -  EQUIPAMENTO NÃO CADASTRADO
    $tag_SOPRADOR_1 = "TE 72 500 510 736 000 - 000092";
    $idAtividadeSOPRADOR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SOPRADOR_1)->value('id');
    $idAnaliseSOPRADOR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSOPRADOR_1)->max('id');
    $statusSOPRADOR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSOPRADOR_1)->value('status_id');

    if ($statusALIMENTACAO == 5 || $statusVVF_SD == 5 || $statusS1_EP_ZONA_4 == 5 || $statusS2_EP_Z_4 == 5 || $statusS1_EP_Z_3 == 5 || $statusS2_EP_Z_3 == 5 || $statusS2_EF_Z_4 == 5 ||
    $statusS1_EF_Z_4 == 5 || $statusS1_EP_Z_2 == 5 || $statusS2_EP_Z_2 == 5 || $statusS2_EF_Z_3 == 5 || $statusS1_EF_Z_3 == 5 || $statusS1_EP_Z_1 == 5 || $statusS2_EP_Z_1 == 5 ||
    $statusS2_EF_Z_2 == 5 || $statusS1_EF_Z_2 == 5 || $statusALIM_UPS == 5 || $statusBD15C == 5 || $statusS2_EF_Z_1 == 5 || $statusS1_EF_Z_1 == 5 || $statusCHILLER_SYS == 5 || $statusSOPRADOR_1 == 5) {
      $pintura_paineis_ccm_status = 5;
    } elseif ($statusALIMENTACAO == 4 || $statusVVF_SD == 4 || $statusS1_EP_ZONA_4 == 4 || $statusS2_EP_Z_4 == 4 || $statusS1_EP_Z_3 == 4 || $statusS2_EP_Z_3 == 4 || $statusS2_EF_Z_4 == 4 ||
    $statusS1_EF_Z_4 == 4 || $statusS1_EP_Z_2 == 4 || $statusS2_EP_Z_2 == 4 || $statusS2_EF_Z_3 == 4 || $statusS1_EF_Z_3 == 4 || $statusS1_EP_Z_1 == 4 || $statusS2_EP_Z_1 == 4 ||
    $statusS2_EF_Z_2 == 4 || $statusS1_EF_Z_2 == 4 || $statusALIM_UPS == 4 || $statusBD15C == 4 || $statusS2_EF_Z_1 == 4 || $statusS1_EF_Z_1 == 4 || $statusCHILLER_SYS == 4 || $statusSOPRADOR_1 == 4) {
      $pintura_paineis_ccm_status = 4;
    } elseif ($statusALIMENTACAO == 3 || $statusVVF_SD == 3 || $statusS1_EP_ZONA_4 == 3 || $statusS2_EP_Z_4 == 3 || $statusS1_EP_Z_3 == 3 || $statusS2_EP_Z_3 == 3 || $statusS2_EF_Z_4 == 3 ||
    $statusS1_EF_Z_4 == 3 || $statusS1_EP_Z_2 == 3 || $statusS2_EP_Z_2 == 3 || $statusS2_EF_Z_3 == 3 || $statusS1_EF_Z_3 == 3 || $statusS1_EP_Z_1 == 3 || $statusS2_EP_Z_1 == 3 ||
    $statusS2_EF_Z_2 == 3 || $statusS1_EF_Z_2 == 3 || $statusALIM_UPS == 3 || $statusBD15C == 3 || $statusS2_EF_Z_1 == 3 || $statusS1_EF_Z_1 == 3 || $statusCHILLER_SYS == 3 || $statusSOPRADOR_1 == 3) {
      $pintura_paineis_ccm_status = 3;
    } else {
      $pintura_paineis_ccm_status = "";
    }

      return $pintura_paineis_ccm_status;
  }

  public static function lpc_Menu() {
    $lpc_menu = "";
    $pintura_estacoesRemotas_status = AuxFuncRelTec::pintura_estacoesRemotas_Menu();
    $pintura_paineis_drives_status = AuxFuncRelTec::pintura_paineis_drives_Menu();
    $pintura_paineis_emergencia_status = AuxFuncRelTec::pintura_paineis_emergencia_Menu();
    $pintura_paineis_ccm_status = AuxFuncRelTec::pintura_paineis_ccm_Menu();

    if ($pintura_estacoesRemotas_status == 5 || $pintura_paineis_drives_status == 5 || $pintura_paineis_emergencia_status == 5 || $pintura_paineis_ccm_status == 5) {
      $lpc_menu = 5;
    } elseif ($pintura_estacoesRemotas_status == 4 || $pintura_paineis_drives_status == 4 || $pintura_paineis_emergencia_status == 4 || $pintura_paineis_ccm_status == 4) {
      $lpc_menu = 4;
    } elseif ($pintura_estacoesRemotas_status == 3 || $pintura_paineis_drives_status == 3 || $pintura_paineis_emergencia_status == 3 || $pintura_paineis_ccm_status == 3) {
      $lpc_menu = 3;
    } else {
      $lpc_menu = "";
    }

    return $lpc_menu;
  }

  public static function lpc_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_normal = aux::GeralPorLinhaTE($atual1, 3, $lpc_linha1, $lpc_linha2);
    return $lpc_normal;
  }
  public static function lpc_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_alarme = aux::GeralPorLinhaTE($atual1, 4, $lpc_linha1, $lpc_linha2);
    return $lpc_alarme;
  }
  public static function lpc_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_critico = aux::GeralPorLinhaTE($atual1, 5, $lpc_linha1, $lpc_linha2);
    return $lpc_critico;
  }

  //--- CENTRO DE SERVIÇOS
  public static function cs_LCL_Menu() {
    $cs_LCL_status = "";
    //A4A - PLC AND I/O
    $tag_A4A_PLC_IO = "TE 72 600 610 131 000 - 000001";
    $idAtividadeA4A_PLC_IO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A4A_PLC_IO)->value('id');
    $idAnaliseA4A_PLC_IO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA4A_PLC_IO)->max('id');
    $statusA4A_PLC_IO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA4A_PLC_IO)->value('status_id');
    //A4B - AC MOTOR STARTER  -  EQUIPAMENTO NÃO CADASTRADO
    $tag_A4B_AC_MS = "TE 72 600 610 131 000 - 000002";
    $idAtividadeA4B_AC_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A4B_AC_MS)->value('id');
    $idAnaliseA4B_AC_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA4B_AC_MS)->max('id');
    $statusA4B_AC_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA4B_AC_MS)->value('status_id');
    //A1A - UNCOILER (DESENROLADEIRA)
    $tag_A1A_DESENROLADEIRA = "TE 72 600 610 131 000 - 000003";
    $idAtividadeA1A_DESENROLADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A1A_DESENROLADEIRA)->value('id');
    $idAnaliseA1A_DESENROLADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA1A_DESENROLADEIRA)->max('id');
    $statusA1A_DESENROLADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA1A_DESENROLADEIRA)->value('status_id');
    //A1B - SLITTER EMBOSSER
    $tag_A1B_SE = "TE 72 600 610 131 000 - 000004";
    $idAtividadeA1B_SE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A1B_SE)->value('id');
    $idAnaliseA1B_SE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA1B_SE)->max('id');
    $statusA1B_SE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA1B_SE)->value('status_id');
    //A2B - UPPER TENSION
    $tag_A2B_UT = "TE 72 600 610 131 000 - 000006";
    $idAtividadeA2B_UT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A2B_UT)->value('id');
    $idAnaliseA2B_UT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA2B_UT)->max('id');
    $statusA2B_UT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA2B_UT)->value('status_id');
    //A2C - LOWER TENSION ROLL
    $tag_A2C_LTR = "TE 72 600 610 131 000 - 000007";
    $idAtividadeA2C_LTR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A2C_LTR)->value('id');
    $idAnaliseA2C_LTR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA2C_LTR)->max('id');
    $statusA2C_LTR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA2C_LTR)->value('status_id');
    //A3A - RECOILER (ENROLADEIRA)
    $tag_A3A_ENROLADEIRA = "TE 72 600 610 131 000 - 000008";
    $idAtividadeA3A_ENROLADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A3A_ENROLADEIRA)->value('id');
    $idAnaliseA3A_ENROLADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA3A_ENROLADEIRA)->max('id');
    $statusA3A_ENROLADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA3A_ENROLADEIRA)->value('status_id');
    //A3B - AUTOTRANSFORMER AND DISCONNECT
    $tag_A3B_AUTO_DISCO = "TE 72 600 610 131 000 - 000009";
    $idAtividadeA3B_AUTO_DISCO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A3B_AUTO_DISCO)->value('id');
    $idAnaliseA3B_AUTO_DISCO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA3B_AUTO_DISCO)->max('id');
    $statusA3B_AUTO_DISCO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA3B_AUTO_DISCO)->value('status_id');
    //A3C - REGEN RECTIFIER (RETIFICADOR)
    $tag_A3C_RR_RETIF = "TE 72 600 610 131 000 - 000010";
    $idAtividadeA3C_RR_RETIF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A3C_RR_RETIF)->value('id');
    $idAnaliseA3C_RR_RETIF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA3C_RR_RETIF)->max('id');
    $statusA3C_RR_RETIF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA3C_RR_RETIF)->value('status_id');
    //A3D - INCOMMING CELL  -  EQUIPAMENTO NÃO CADASTRADO
    $tag_A3D_INCOM_CELL = "TE 72 600 610 131 000 - 000011";
    $idAtividadeA3D_INCOM_CELL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A3D_INCOM_CELL)->value('id');
    $idAnaliseA3D_INCOM_CELL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA3D_INCOM_CELL)->max('id');
    $statusA3D_INCOM_CELL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA3D_INCOM_CELL)->value('status_id');

    if ($statusA4A_PLC_IO == 5 || $statusA4B_AC_MS == 5 || $statusA1A_DESENROLADEIRA == 5 || $statusA1B_SE == 5 || $statusA2B_UT == 5 || $statusA2C_LTR == 5 ||
    $statusA3A_ENROLADEIRA == 5 || $statusA3B_AUTO_DISCO == 5 || $statusA3C_RR_RETIF == 5 || $statusA3D_INCOM_CELL == 5) {
      $cs_LCL_status = 5;
    } elseif ($statusA4A_PLC_IO == 4 || $statusA4B_AC_MS == 4 || $statusA1A_DESENROLADEIRA == 4 || $statusA1B_SE == 4 || $statusA2B_UT == 4 || $statusA2C_LTR == 4 ||
    $statusA3A_ENROLADEIRA == 4 || $statusA3B_AUTO_DISCO == 4 || $statusA3C_RR_RETIF == 4 || $statusA3D_INCOM_CELL == 4) {
      $cs_LCL_status = 4;
    } elseif ($statusA4A_PLC_IO == 3 || $statusA4B_AC_MS == 3 || $statusA1A_DESENROLADEIRA == 3 || $statusA1B_SE == 3 || $statusA2B_UT == 3 || $statusA2C_LTR == 3 ||
    $statusA3A_ENROLADEIRA == 3 || $statusA3B_AUTO_DISCO == 3 || $statusA3C_RR_RETIF == 3 || $statusA3D_INCOM_CELL == 3) {
      $cs_LCL_status = 3;
    } else {
      $cs_LCL_status = "";
    }

      return $cs_LCL_status;
  }

  public static function cs_LCT1_Menu() {
    $cs_LCT1_status = "";
    //B1A - INCOMMING CELL
    $tag_B1A_INC_CELL = "TE 72 600 620 105 000 - 000001";
    $idAtividadeB1A_INC_CELL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1A_INC_CELL)->value('id');
    $idAnaliseB1A_INC_CELL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1A_INC_CELL)->max('id');
    $statusB1A_INC_CELL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1A_INC_CELL)->value('status_id');
    //B1B - RECTIFIER
    $tag_B1B_RECT = "TE 72 600 620 105 000 - 000002";
    $idAtividadeB1B_RECT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1B_RECT)->value('id');
    $idAnaliseB1B_RECT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1B_RECT)->max('id');
    $statusB1B_RECT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1B_RECT)->value('status_id');
    //B1C - EVELLER / FEED ROLL
    $tag_B1C_EVER_FR = "TE 72 600 620 105 000 - 000003";
    $idAtividadeB1C_EVER_FR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1C_EVER_FR)->value('id');
    $idAnaliseB1C_EVER_FR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1C_EVER_FR)->max('id');
    $statusB1C_EVER_FR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1C_EVER_FR)->value('status_id');
    //B1C - INSPECTION / REJECT/INFEED CONVEYOR
    $tag_B1C_INSP_RIC = "TE 72 600 620 105 000 - 000004";
    $idAtividadeB1C_INSP_RIC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1C_INSP_RIC)->value('id');
    $idAnaliseB1C_INSP_RIC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1C_INSP_RIC)->max('id');
    $statusB1C_INSP_RIC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1C_INSP_RIC)->value('status_id');
    //B2A - AC MOTOR STARTER
    $tag_B2A_AC_MS = "TE 72 600 620 105 000 - 000005";
    $idAtividadeB2A_AC_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B2A_AC_MS)->value('id');
    $idAnaliseB2A_AC_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB2A_AC_MS)->max('id');
    $statusB2A_AC_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB2A_AC_MS)->value('status_id');
    //B2B - PLC AND I/O
    $tag_B2B_PLC_IO = "TE 72 600 620 105 000 - 000006";
    $idAtividadeB2B_PLC_IO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B2B_PLC_IO)->value('id');
    $idAnaliseB2B_PLC_IO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB2B_PLC_IO)->max('id');
    $statusB2B_PLC_IO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB2B_PLC_IO)->value('status_id');
    //PAINEL DO EMPILHADOR - RITTAL (ENEW)
    $tag_PER = "TE 72 600 610 131 000 - 000010";
    $idAtividadePER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PER)->value('id');
    $idAnalisePER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePER)->max('id');
    $statusPER = DB::table('preditiva_analises')->where('id', '=', $idAnalisePER)->value('status_id');

    if ($statusB1A_INC_CELL == 5 || $statusB1B_RECT == 5 || $statusB1C_EVER_FR == 5 || $statusB1C_INSP_RIC == 5 || $statusB2A_AC_MS == 5 || $statusB2B_PLC_IO == 5 || $statusPER == 5) {
      $cs_LCT1_status = 5;
    } elseif ($statusB1A_INC_CELL == 4 || $statusB1B_RECT == 4 || $statusB1C_EVER_FR == 4 || $statusB1C_INSP_RIC == 4 || $statusB2A_AC_MS == 4 || $statusB2B_PLC_IO == 4 || $statusPER == 4) {
      $cs_LCT1_status = 4;
    } elseif ($statusB1A_INC_CELL == 3 || $statusB1B_RECT == 3 || $statusB1C_EVER_FR == 3 || $statusB1C_INSP_RIC == 3 || $statusB2A_AC_MS == 3 || $statusB2B_PLC_IO == 3 || $statusPER == 3) {
      $cs_LCT1_status = 3;
    } else {
      $cs_LCT1_status = "";
    }

    return $cs_LCT1_status;
  }

  public static function cs_LCT2_Menu() {
    $cs_LCT2_status = "";
    //PLC/ACIONAMENTOS - 03
    $tag_PLC_ACION_03 = "TE 72 600 621 171 000 - 000003";
    $idAtividadePLC_ACION_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PLC_ACION_03)->value('id');
    $idAnalisePLC_ACION_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLC_ACION_03)->max('id');
    $statusPLC_ACION_03 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLC_ACION_03)->value('status_id');
    //PLC/ACIONAMENTOS - 24
    $tag_PLC_ACION_24 = "TE 72 600 621 171 000 - 000024";
    $idAtividadePLC_ACION_24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PLC_ACION_24)->value('id');
    $idAnalisePLC_ACION_24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLC_ACION_24)->max('id');
    $statusPLC_ACION_24 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLC_ACION_24)->value('status_id');
    //RETIFICADOR E INVERSOR - ROLO CICLICO
    $tag_RI_RC = "TE 72 600 621 171 000 - 000002";
    $idAtividadeRI_RC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_RC)->value('id');
    $idAnaliseRI_RC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_RC)->max('id');
    $statusRI_RC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_RC)->value('status_id');
    //RETIFICADOR E INVERSOR - SLITTER
    $tag_RI_SLITTER = "TE 72 600 621 171 000 - 000010";
    $idAtividadeRI_SLITTER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_SLITTER)->value('id');
    $idAnaliseRI_SLITTER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_SLITTER)->max('id');
    $statusRI_SLITTER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_SLITTER)->value('status_id');
    //RETIFICADOR E INVERSOR - APLANADORA
    $tag_RI_APLANADORA = "TE 72 600 621 171 000 - 000012";
    $idAtividadeRI_APLANADORA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_APLANADORA)->value('id');
    $idAnaliseRI_APLANADORA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_APLANADORA)->max('id');
    $statusRI_APLANADORA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_APLANADORA)->value('status_id');
    //RETIFICADOR E INVERSOR - RECOLHEDOR DE APARAS
    $tag_RI_RA = "TE 72 600 621 171 000 - 000014";
    $idAtividadeRI_RA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_RA)->value('id');
    $idAnaliseRI_RA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_RA)->max('id');
    $statusRI_RA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_RA)->value('status_id');
    //RETIFICADOR E INVERSOR - 09A01
    $tag_RI_09A01 = "TE 72 600 621 171 000 - 000016";
    $idAtividadeRI_09A01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_09A01)->value('id');
    $idAnaliseRI_09A01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_09A01)->max('id');
    $statusRI_09A01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_09A01)->value('status_id');
    //INVERSORES E CONTATOR PRINCIPAL
    $tag_ICP = "TE 72 600 621 171 000 - 000001";
    $idAtividadeICP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ICP)->value('id');
    $idAnaliseICP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeICP)->max('id');
    $statusICP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseICP)->value('status_id');

    if ($statusPLC_ACION_03 == 5 || $statusPLC_ACION_24 == 5 || $statusRI_RC == 5 || $statusRI_SLITTER == 5 || $statusRI_APLANADORA == 5 || $statusRI_RA == 5 || $statusRI_09A01 == 5 || $statusICP == 5) {
      $cs_LCT2_status = 5;
    } elseif ($statusPLC_ACION_03 == 4 || $statusPLC_ACION_24 == 4 || $statusRI_RC == 4 || $statusRI_SLITTER == 4 || $statusRI_APLANADORA == 4 || $statusRI_RA == 4 || $statusRI_09A01 == 4 || $statusICP == 4) {
      $cs_LCT2_status = 4;
    } elseif ($statusPLC_ACION_03 == 3 || $statusPLC_ACION_24 == 3 || $statusRI_RC == 3 || $statusRI_SLITTER == 3 || $statusRI_APLANADORA == 3 || $statusRI_RA == 3 || $statusRI_09A01 == 3 || $statusICP == 3) {
      $cs_LCT2_status = 3;
    } else {
      $cs_LCT2_status = "";
    }

      return $cs_LCT2_status;
  }

  public static function cs_LCC_Menu() {
    $cs_LCC_status = "";
    //INVERSOR 29A02
    $tag_INV_29A02 = "TE 72 600 640 223 000 - 000017";
    $idAtividadeINV_29A02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_INV_29A02)->value('id');
    $idAnaliseINV_29A02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeINV_29A02)->max('id');
    $statusINV_29A02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseINV_29A02)->value('status_id');
    //ROLO APLICADOR FILME
    $tag_RAF = "TE 72 600 640 223 000 - 000015";
    $idAtividadeRAF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAF)->value('id');
    $idAnaliseRAF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAF)->max('id');
    $statusRAF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAF)->value('status_id');
    //INVERSOR 30A01
    $tag_INV_30A01 = "TE 72 600 640 223 000 - 000013";
    $idAtividadeINV_30A01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_INV_30A01)->value('id');
    $idAnaliseINV_30A01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeINV_30A01)->max('id');
    $statusINV_30A01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseINV_30A01)->value('status_id');
    //ENROLADOR DE REFILE
    $tag_ENR_REF = "TE 72 600 640 223 000 - 000011";
    $idAtividadeENR_REF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ENR_REF)->value('id');
    $idAnaliseENR_REF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR_REF)->max('id');
    $statusENR_REF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR_REF)->value('status_id');
    //ROLO CICLICO
    $tag_RC = "TE 72 600 640 223 000 - 000009";
    $idAtividadeRC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RC)->value('id');
    $idAnaliseRC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRC)->max('id');
    $statusRC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRC)->value('status_id');
    //TESOURA MECÂNICA
    $tag_TES_MEC = "TE 72 600 640 223 000 - 000007";
    $idAtividadeTES_MEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TES_MEC)->value('id');
    $idAnaliseTES_MEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_MEC)->max('id');
    $statusTES_MEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_MEC)->value('status_id');
    //DESEMPENADEIRA  -  EQUIPAMENTO NÃO CADASTRADO
    $tag_DES = "TE 72 600 640 223 000 - 000002";
    $idAtividadeDES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DES)->value('id');
    $idAnaliseDES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES)->max('id');
    $statusDES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES)->value('status_id');
    //LCC 1 - PAINEL DE FORÇA
    $tag_PF = "TE 72 600 640 223 000 - 000001";
    $idAtividadePF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF)->value('id');
    $idAnalisePF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF)->max('id');
    $statusPF = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF)->value('status_id');
    //PAINEL K67 - EMPILHADOR
    $tag_PK67 = "TE 72 600 640 221 000 - 000001";
    $idAtividadePK67 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PK67)->value('id');
    $idAnalisePK67 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePK67)->max('id');
    $statusPK67 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePK67)->value('status_id');
    //QGBT
    $tag_QGBT = "TE 72 600 640 223 000 - 000003";
    $idAtividadeQGBT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_QGBT)->value('id');
    $idAnaliseQGBT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQGBT)->max('id');
    $statusQGBT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQGBT)->value('status_id');


    if ($statusINV_29A02 == 5 || $statusRAF == 5 || $statusRAF == 5 || $statusINV_30A01 == 5 || $statusENR_REF == 5 || $statusRC == 5 || $statusTES_MEC == 5 || $statusDES == 5 || $statusPF == 5 || $statusPK67 == 5 || $statusQGBT == 5) {
      $cs_LCC_status = 5;
    } elseif ($statusINV_29A02 == 4 || $statusRAF == 4 || $statusRAF == 4 || $statusINV_30A01 == 4 || $statusENR_REF == 4 || $statusRC == 4 || $statusTES_MEC == 4 || $statusDES == 4 || $statusPF == 4 || $statusPK67 == 4 || $statusQGBT == 4) {
      $cs_LCC_status = 4;
    } elseif ($statusINV_29A02 == 3 || $statusRAF == 3 || $statusRAF == 3 || $statusINV_30A01 == 3 || $statusENR_REF == 3 || $statusRC == 3 || $statusTES_MEC == 3 || $statusDES == 3 || $statusPF == 3 || $statusPK67 == 3 || $statusQGBT == 3) {
      $cs_LCC_status = 3;
    } else {
      $cs_LCC_status = "";
    }

      return $cs_LCC_status;
  }

  public static function cs_Menu() {
    $cs_menu = "";
    $cs_LCL_status = AuxFuncRelTec::cs_LCL_Menu();
    $cs_LCT1_status = AuxFuncRelTec::cs_LCT1_Menu();
    $cs_LCT2_status = AuxFuncRelTec::cs_LCT2_Menu();
    $cs_LCC_status = AuxFuncRelTec::cs_LCC_Menu();

    if ($cs_LCL_status == 5 || $cs_LCT1_status == 5 || $cs_LCT2_status == 5 || $cs_LCC_status == 5) {
      $cs_menu = 5;
    } elseif ($cs_LCL_status == 4 || $cs_LCT1_status == 4 || $cs_LCT2_status == 4 || $cs_LCC_status == 4) {
      $cs_menu = 4;
    } elseif ($cs_LCL_status == 3 || $cs_LCT1_status == 3 || $cs_LCT2_status == 3 || $cs_LCC_status == 3) {
      $cs_menu = 3;
    } else {
      $cs_menu = "";
    }

    return $cs_menu;
  }

  public static function cs_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_normal = aux::GeralPorLinha2TE($atual1, 3, $cs_parent);
    return $cs_normal;
  }
  public static function cs_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_alarme = aux::GeralPorLinha2TE($atual1, 4, $cs_parent);
    return $cs_alarme;
  }
  public static function cs_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_critico = aux::GeralPorLinha2TE($atual1, 5, $cs_parent);
    return $cs_critico;
  }

  public static function pr_pontes_pr5_Menu() {
    $pr_pontes_pr5_status = "";
    //FREIO CARRO
    $tag_FC = "TE 72 600 005 011 000 - 000002";
    $idAtividadeFC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FC)->value('id');
    $idAnaliseFC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFC)->max('id');
    $statusFC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFC)->value('status_id');
    //FREIO PONTE
    $tag_FP = "TE 72 600 005 007 000 - 000001";
    $idAtividadeFP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FP)->value('id');
    $idAnaliseFP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFP)->max('id');
    $statusFP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFP)->value('status_id');
    //FREIO ELEVAÇÃO
    $tag_FE = "TE 72 600 005 015 000 - 000001";
    $idAtividadeFE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FE)->value('id');
    $idAnaliseFE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFE)->max('id');
    $statusFE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFE)->value('status_id');
    //PAINÉL DO INVERSOR
    $tag_PINV = "TE 72 600 005 007 000 - 000003";
    $idAtividadePINV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV)->value('id');
    $idAnalisePINV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV)->max('id');
    $statusPINV = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV)->value('status_id');
    //CARRO
    $tag_CARRO = "TE 72 600 005 011 000 - 000001";
    $idAtividadeCARRO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CARRO)->value('id');
    $idAnaliseCARRO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO)->max('id');
    $statusCARRO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO)->value('status_id');
    //PAINEL DE COMANDO / INVERSOR
    $tag_PC_INV = "TE 72 600 005 015 000 - 000002";
    $idAtividadePC_INV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_INV)->value('id');
    $idAnalisePC_INV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_INV)->max('id');
    $statusPC_INV = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_INV)->value('status_id');
    //PAINÉL DOS RELÉS
    $tag_PR = "TE 72 600 005 015 000 - 000003";
    $idAtividadePR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PR)->value('id');
    $idAnalisePR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR)->max('id');
    $statusPR = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR)->value('status_id');
    //PAINEL DE COMANDO - AUXILIARES
    $tag_PC_AUX = "TE 72 600 005 007 000 - 000002";
    $idAtividadePC_AUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_AUX)->value('id');
    $idAnalisePC_AUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_AUX)->max('id');
    $statusPC_AUX = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_AUX)->value('status_id');

    if ($statusFC == 5 || $statusFP == 5 || $statusFE == 5 || $statusPINV == 5 || $statusCARRO == 5 || $statusPC_INV == 5 || $statusPR == 5 || $statusPC_AUX == 5) {
      $pr_pontes_pr5_status = 5;
    } elseif ($statusFC == 4 || $statusFP == 4 || $statusFE == 4 || $statusPINV == 4 || $statusCARRO == 4 || $statusPC_INV == 4 || $statusPR == 4 || $statusPC_AUX == 4) {
      $pr_pontes_pr5_status = 4;
    } elseif ($statusFC == 3 || $statusFP == 3 || $statusFE == 3 || $statusPINV == 3 || $statusCARRO == 3 || $statusPC_INV == 3 || $statusPR == 3 || $statusPC_AUX == 3) {
      $pr_pontes_pr5_status = 3;
    } else {
      $pr_pontes_pr5_status = "";
    }

    return $pr_pontes_pr5_status;
  }

  public static function pr_pontes_pr7_Menu() {
    $pr_pontes_pr7_status = "";
    //PAINEL DE COMANDO - 02
    $tag_PC_02 = "TE 72 600 005 007 000 - 000002";
    $idAtividadePC_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_02)->value('id');
    $idAnalisePC_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_02)->max('id');
    $statusPC_02 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_02)->value('status_id');
    //PAINEL DE FORÇA - 01
    $tag_PF_01 = "TE 72 500 007 011 000 - 000001";
    $idAtividadePF_01  = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_01)->value('id');
    $idAnalisePF_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_01 )->max('id');
    $statusPF_01 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_01)->value('status_id');
    //PAINEL DE COMANDO - 007
    $tag_PC_007 = "TE 72 500 007 007 000 - 000002";
    $idAtividadePC_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_007)->value('id');
    $idAnalisePC_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_007)->max('id');
    $statusPC_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_007)->value('status_id');
    //PAINEL DE FORÇA - 001
    $tag_PF_001 = "TE 72 500 007 007 000 - 000001";
    $idAtividadePF_001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_001)->value('id');
    $idAnalisePF_001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_001)->max('id');
    $statusPF_001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_001)->value('status_id');
    //PAINÉL DO INVERSOR - 03
    $tag_PINV_03 = "TE 72 500 007 007 000 - 000003";
    $idAtividadePINV_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_03)->value('id');
    $idAnalisePINV_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_03)->max('id');
    $statusPINV_03 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_03)->value('status_id');
    //PAINEL DE COMANDO - 002
    $tag_PC_002 = "TE 72 500 007 015 000 - 000002";
    $idAtividadePC_002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_002)->value('id');
    $idAnalisePC_002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_002)->max('id');
    $statusPC_002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_002)->value('status_id');
    //PAINEL DE FORÇA
    $tag_PF_00001 = "TE 72 500 007 015 000 - 000001";
    $idAtividadePF_00001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_00001)->value('id');
    $idAnalisePF_00001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_00001)->max('id');
    $statusPF_00001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_00001)->value('status_id');
    //PAINEL DO INVERSOR - 0002
    $tag_PINV_0002 = "TE 72 500 007 015 000 - 000002";
    $idAtividadePINV_0002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_0002)->value('id');
    $idAnalisePINV_0002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_0002)->max('id');
    $statusPINV_0002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_0002)->value('status_id');

    if ($statusPC_02 == 5 || $statusPF_01 == 5 || $statusPC_007 == 5 || $statusPF_001 == 5 || $statusPINV_03 == 5 || $statusPC_002 == 5 || $statusPF_00001 == 5 || $statusPINV_0002 == 5) {
      $pr_pontes_pr7_status = 5;
    } elseif ($statusPC_02 == 4 || $statusPF_01 == 4 || $statusPC_007 == 4 || $statusPF_001 == 4 || $statusPINV_03 == 4 || $statusPC_002 == 4 || $statusPF_00001 == 4 || $statusPINV_0002 == 4) {
      $pr_pontes_pr7_status = 4;
    } elseif ($statusPC_02 == 3 || $statusPF_01 == 3 || $statusPC_007 == 3 || $statusPF_001 == 3 || $statusPINV_03 == 3 || $statusPC_002 == 3 || $statusPF_00001 == 3 || $statusPINV_0002 == 3) {
      $pr_pontes_pr7_status = 3;
    } else {
      $pr_pontes_pr7_status = "";
    }

    return $pr_pontes_pr7_status;
  }

  public static function pr_pontes_pr8_Menu() {
    $pr_pontes_pr8_status = "";
    //PAINEL DE COMANDO - 011
    $tag_PC_011 = "TE 72 400 008 011 000 - 000002";
    $idAtividadePC_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_011)->value('id');
    $idAnalisePC_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_011)->max('id');
    $statusPC_011 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_011)->value('status_id');
    //PAINEL DE FORÇA - 011
    $tag_PF_011 = "TE 72 400 008 011 000 - 000001";
    $idAtividadePF_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_011)->value('id');
    $idAnalisePF_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_011)->max('id');
    $statusPF_011 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_011)->value('status_id');
    //PAINEL INVERSOR
    $tag_PINV_0003 = "TE 72 400 008 011 000 - 000003";
    $idAtividadePINV_0003 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_0003)->value('id');
    $idAnalisePINV_0003 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_0003)->max('id');
    $statusPINV_0003 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_0003)->value('status_id');
    //PAINEL DE COMANDO
    $tag_PC_007_000002 = "TE 72 400 008 007 000 - 000002";
    $idAtividadePC_007_000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_007_000002)->value('id');
    $idAnalisePC_007_000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_007_000002)->max('id');
    $statusPC_007_000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_007_000002)->value('status_id');
    //PAINEL DE FORÇA
    $tag_PF_007_000001 = "TE 72 400 008 007 000 - 000001";
    $idAtividadePF_007_000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_007_000001)->value('id');
    $idAnalisePF_007_000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_007_000001)->max('id');
    $statusPF_007_000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_007_000001)->value('status_id');
    //PAINEL DE COMANDO
    $tag_PC_015_000002 = "TE 72 400 008 015 000 - 000002";
    $idAtividadePC_015_000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_015_000002)->value('id');
    $idAnalisePC_015_000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_015_000002)->max('id');
    $statusPC_015_000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_015_000002)->value('status_id');
    //PAINEL DE FORÇA
    $tag_PF_015_000001 = "TE 72 400 008 015 000 - 000001";
    $idAtividadePF_015_000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_015_000001)->value('id');
    $idAnalisePF_015_000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_015_000001)->max('id');
    $statusPF_015_000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_015_000001)->value('status_id');
    //CIRCUITO AUXILIAR
    $tag_CIRC_AUX = "TE 72 400 008 023 000 - 000001";
    $idAtividadeCIRC_AUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIRC_AUX)->value('id');
    $idAnaliseCIRC_AUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIRC_AUX)->max('id');
    $statusCIRC_AUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIRC_AUX)->value('status_id');
    //PAINEL DE COMANDO
    $tag_PC_023 = "TE 72 400 008 023 000 - 000002";
    $idAtividadePC_023 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_023)->value('id');
    $idAnalisePC_023 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_023)->max('id');
    $statusPC_023 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_023)->value('status_id');
    //BLOCO DE PASSAGEM CARRO
    $tag_BP_CARRO = "TE 72 400 008 023 000 - 000003";
    $idAtividadeBP_CARRO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BP_CARRO)->value('id');
    $idAnaliseBP_CARRO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBP_CARRO)->max('id');
    $statusBP_CARRO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBP_CARRO)->value('status_id');
    //BLOCO DE PASSAGEM PONTE
    $tag_BP_PONTE = "TE 72 400 008 023 000 - 000004";
    $idAtividadeBP_PONTE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BP_PONTE)->value('id');
    $idAnaliseBP_PONTE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBP_PONTE)->max('id');
    $statusBP_PONTE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBP_PONTE)->value('status_id');

    if ($statusPC_011 == 5 || $statusPF_011 == 5 || $statusPINV_0003 == 5 || $statusPC_007_000002 == 5 || $statusPF_007_000001 == 5 || $statusPC_015_000002 == 5 ||
    $statusPF_015_000001 == 5 || $statusCIRC_AUX == 5 || $statusPC_023 == 5 || $statusBP_CARRO == 5 || $statusBP_PONTE == 5) {
      $pr_pontes_pr8_status = 5;
    } elseif ($statusPC_011 == 4 || $statusPF_011 == 4 || $statusPINV_0003 == 4 || $statusPC_007_000002 == 4 || $statusPF_007_000001 == 4 || $statusPC_015_000002 == 4 ||
    $statusPF_015_000001 == 4 || $statusCIRC_AUX == 4 || $statusPC_023 == 4 || $statusBP_CARRO == 4 || $statusBP_PONTE == 4) {
      $pr_pontes_pr8_status = 4;
    } elseif ($statusPC_011 == 3 || $statusPF_011 == 3 || $statusPINV_0003 == 3 || $statusPC_007_000002 == 3 || $statusPF_007_000001 == 3 || $statusPC_015_000002 == 3 ||
    $statusPF_015_000001 == 3 || $statusCIRC_AUX == 3 || $statusPC_023 == 3 || $statusBP_CARRO == 3 || $statusBP_PONTE == 3) {
      $pr_pontes_pr8_status = 3;
    } else {
      $pr_pontes_pr8_status = "";
    }

    return $pr_pontes_pr8_status;
  }

  public static function pr_pontes_pr11_Menu() {
    $pr_pontes_pr11_status = "";
    //TRANSLACAO CARRO 1 - PAINEL DE COMANDO
    $tag_PC_000_000002 = "TE 72 400 011 011 000 - 000002";
    $idAtividadePC_000_000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_000_000002)->value('id');
    $idAnalisePC_000_000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_000_000002)->max('id');
    $statusPC_000_000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_000_000002)->value('status_id');
    //TRANSLACAO CARRO 2 - /DIREÇÃO CARRO
    $tag_DC = "TE 72 400 011 011 000 - 000001";
    $idAtividadeDC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DC)->value('id');
    $idAnaliseDC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDC)->max('id');
    $statusDC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDC)->value('status_id');
    //TRANSLACAO PONTE 1 - PAINEL DE COMANDO
    $tag_PC_011_0000002 = "TE 72 400 011 007 000 - 000002";
    $idAtividadePC_011_0000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_011_0000002)->value('id');
    $idAnalisePC_011_0000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_011_0000002)->max('id');
    $statusPC_011_0000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_011_0000002)->value('status_id');
    //TRANSLACAO PONTE 2 - PAINEL FUSIVEL
    $tag_PF_011_0000001 = "TE 72 400 011 007 000 - 000001";
    $idAtividadePF_011_0000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_011_0000001)->value('id');
    $idAnalisePF_011_0000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_011_0000001)->max('id');
    $statusPF_011_0000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_011_0000001)->value('status_id');
    //TRANSLACAO PONTE 3 - PAINEL INVERSOR
    $tag_PINV_000_0000003 = "TE 72 400 011 007 000 - 000003";
    $idAtividadePINV_000_0000003 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_000_0000003)->value('id');
    $idAnalisePINV_000_0000003 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_000_0000003)->max('id');
    $statusPINV_000_0000003 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_000_0000003)->value('status_id');
    //ELEVACAO GUINCHO 1 - PAINEL DE COMANDO
    $tag_PC_015_000_000002 = "TE 72 400 011 015 000 - 000002";
    $idAtividadePC_015_000_000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_015_000_000002)->value('id');
    $idAnalisePC_015_000_000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_015_000_000002)->max('id');
    $statusPC_015_000_000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_015_000_000002)->value('status_id');
    //ELEVACAO GUINCHO 2 - PAINEL FUSIVEL
    $tag_PF_015_000 = "TE 72 400 011 015 000 - 000001";
    $idAtividadePF_015_000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_015_000)->value('id');
    $idAnalisePF_015_000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_015_000)->max('id');
    $statusPF_015_000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_015_000)->value('status_id');
    //ELEVACAO GUINCHO 3 - PAINEL INVERSOR
    $tag_PINV_015 = "TE 72 400 011 015 000 - 000003";
    $idAtividadePINV_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_015)->value('id');
    $idAnalisePINV_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_015)->max('id');
    $statusPINV_015 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_015)->value('status_id');
    //ALIMENTACAO 4 - CIRCUITO AUXILIAR
    $tag_CIRCUITO_AUX = "TE 72 400 011 023 000 - 000001";
    $idAtividadeCIRCUITO_AUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIRCUITO_AUX)->value('id');
    $idAnaliseCIRCUITO_AUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIRCUITO_AUX)->max('id');
    $statusCIRCUITO_AUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIRCUITO_AUX)->value('status_id');
    //ALIMENTACAO 1 - PAINEL DE COMANDO
    $tag_PC_023_000 = "TE 72 400 011 023 000 - 000002";
    $idAtividadePC_023_000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_023_000)->value('id');
    $idAnalisePC_023_000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_023_000)->max('id');
    $statusPC_023_000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_023_000)->value('status_id');

    if ($statusPC_000_000002 == 5 || $statusDC == 5 || $statusPC_011_0000002 == 5 || $statusPF_011_0000001 == 5 || $statusPINV_000_0000003 == 5 || $statusPC_015_000_000002 == 5 ||
    $statusPF_015_000 == 5 || $statusPINV_015 == 5 || $statusCIRCUITO_AUX == 5 || $statusPC_023_000 == 5) {
      $pr_pontes_pr11_status = 5;
    } elseif ($statusPC_000_000002 == 4 || $statusDC == 4 || $statusPC_011_0000002 == 4 || $statusPF_011_0000001 == 4 || $statusPINV_000_0000003 == 4 || $statusPC_015_000_000002 == 4 ||
    $statusPF_015_000 == 4 || $statusPINV_015 == 4 || $statusCIRCUITO_AUX == 4 || $statusPC_023_000 == 4) {
      $pr_pontes_pr11_status = 4;
    } elseif ($statusPC_000_000002 == 3 || $statusDC == 3 || $statusPC_011_0000002 == 3 || $statusPF_011_0000001 == 3 || $statusPINV_000_0000003 == 3 || $statusPC_015_000_000002 == 3 ||
    $statusPF_015_000 == 3 || $statusPINV_015 == 3 || $statusCIRCUITO_AUX == 3 || $statusPC_023_000 == 3) {
      $pr_pontes_pr11_status = 3;
    } else {
      $pr_pontes_pr11_status = "";
    }

    return $pr_pontes_pr11_status;
  }

  public static function pr_pontes_pr12_Menu() {
    $pr_pontes_pr12_status = "";
    //TRANSLACAO CARRO 1 - PAINEL DE COMANDO
    $tag_PC_012_0000002 = "TE 72 200 012 011 000 - 000002";
    $idAtividadePC_012_0000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_012_0000002)->value('id');
    $idAnalisePC_012_0000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_012_0000002)->max('id');
    $statusPC_012_0000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_012_0000002)->value('status_id');
    //TRANSLACAO CARRO 2 - DIREÇÃO CARRO
    $tag_DC_012 = "TE 72 200 012 011 000 - 000001";
    $idAtividadeDC_012 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DC_012)->value('id');
    $idAnaliseDC_012 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDC_012)->max('id');
    $statusDC_012 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDC_012)->value('status_id');
    //TRANSLACAO PONTE 1 - PAINEL DE COMANDO
    $tag_PC_012_007 = "TE 72 200 012 007 000 - 000002";
    $idAtividadePC_012_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_012_007)->value('id');
    $idAnalisePC_012_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_012_007)->max('id');
    $statusPC_012_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_012_007)->value('status_id');
    //TRANSLACAO PONTE 2 - PAINEL FUSIVEL
    $tag_PC_012_000 = "TE 72 200 012 007 000 - 000001";
    $idAtividadePC_012_000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_012_000)->value('id');
    $idAnalisePC_012_000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_012_000)->max('id');
    $statusPC_012_000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_012_000)->value('status_id');
    //TRANSLACAO PONTE 3 - PAINEL INVERSOR
    $tag_PINV_012_007 = "TE 72 200 012 007 000 - 000003";
    $idAtividadePINV_012_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_012_007)->value('id');
    $idAnalisePINV_012_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_012_007)->max('id');
    $statusPINV_012_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_012_007)->value('status_id');
    //ELEVACAO GUINCHO 1- PAINEL DE COMANDO
    $tag_PC_012_015_000 = "TE 72 200 012 015 000 - 000002";
    $idAtividadePC_012_015_000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_012_015_000)->value('id');
    $idAnalisePC_012_015_000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_012_015_000)->max('id');
    $statusPC_012_015_000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_012_015_000)->value('status_id');
    //ELEVACAO GUINCHO 2 - PAINEL FUSIVEL
    $tag_PF_012_000001 = "TE 72 200 012 015 000 - 000001";
    $idAtividadePF_012_000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_012_000001)->value('id');
    $idAnalisePF_012_000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_012_000001)->max('id');
    $statusPF_012_000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_012_000001)->value('status_id');
    //ELEVACAO GUINCHO 3 -PAINEL INVERSOR
    $tag_PINV_012_0000003 = "TE 72 200 012 015 000 - 000003";
    $idAtividadePINV_012_0000003 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_012_0000003)->value('id');
    $idAnalisePINV_012_0000003 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_012_0000003)->max('id');
    $statusPINV_012_0000003 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_012_0000003)->value('status_id');
    //ALIMENTACAO 4 - CIRCUITO AUXILIAR
    $tag_CIRC_AUX_006 = "TE 72 200 012 023 006 - 000002";
    $idAtividadeCIRC_AUX_006 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIRC_AUX_006)->value('id');
    $idAnaliseCIRC_AUX_006 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIRC_AUX_006)->max('id');
    $statusCIRC_AUX_006 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIRC_AUX_006)->value('status_id');
    //ALIMENTACAO 1 - PAINEL DE COMANDO
    $tag_PC_023_000001 = "TE 72 200 012 023 006 - 000001";
    $idAtividadePC_023_000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_023_000001)->value('id');
    $idAnalisePC_023_000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_023_000001)->max('id');
    $statusPC_023_000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_023_000001)->value('status_id');
    //BLOCO DE PASSAGEM CARRO - BLOCO DE PASSAGEM
    $tag_BLC_PASS = "TE 72 200 012 011 000 - 000003";
    $idAtividadeBLC_PASS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLC_PASS)->value('id');
    $idAnaliseBLC_PASS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLC_PASS)->max('id');
    $statusBLC_PASS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLC_PASS)->value('status_id');

    if ($statusPC_012_0000002 == 5 || $statusDC_012 == 5 || $statusPC_012_007 == 5 || $statusPC_012_000 == 5 || $statusPINV_012_007 == 5 || $statusPC_012_015_000 == 5 ||
    $statusPF_012_000001 == 5 || $statusPINV_012_0000003 == 5 || $statusCIRC_AUX_006 == 5 || $statusPC_023_000001 == 5 || $statusBLC_PASS == 5) {
      $pr_pontes_pr12_status = 5;
    } elseif ($statusPC_012_0000002 == 4 || $statusDC_012 == 4 || $statusPC_012_007 == 4 || $statusPC_012_000 == 4 || $statusPINV_012_007 == 4 || $statusPC_012_015_000 == 4 ||
    $statusPF_012_000001 == 4 || $statusPINV_012_0000003 == 4 || $statusCIRC_AUX_006 == 4 || $statusPC_023_000001 == 4 || $statusBLC_PASS == 4) {
      $pr_pontes_pr12_status = 4;
    } elseif ($statusPC_012_0000002 == 3 || $statusDC_012 == 3 || $statusPC_012_007 == 3 || $statusPC_012_000 == 3 || $statusPINV_012_007 == 3 || $statusPC_012_015_000 == 3 ||
    $statusPF_012_000001 == 3 || $statusPINV_012_0000003 == 3 || $statusCIRC_AUX_006 == 3 || $statusPC_023_000001 == 3 || $statusBLC_PASS == 3) {
      $pr_pontes_pr12_status = 3;
    } else {
      $pr_pontes_pr12_status = "";
    }

      return $pr_pontes_pr12_status;
  }

  public static function pr_pontes_pr13_Menu() {
    $pr_pontes_pr13_status = "";
    //TRANSLACAO CARRO 1 - PAINEL DE COMANDO
    $tag_PAIN_COM_011 = "TE 72 200 013 011 000 - 000002";
    $idAtividadePAIN_COM_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COM_011)->value('id');
    $idAnalisePAIN_COM_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COM_011)->max('id');
    $statusPAIN_COM_011 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COM_011)->value('status_id');
    //TRANSLACAO CARRO 2 - /DIREÇÃO CARRO
    $tag_DIR_CARRO = "TE 72 200 013 011 000 - 000001";
    $idAtividadeDIR_CARRO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DIR_CARRO)->value('id');
    $idAnaliseDIR_CARRO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDIR_CARRO)->max('id');
    $statusDIR_CARRO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDIR_CARRO)->value('status_id');
    //TRANSLACAO PONTE 1 - PAINEL DE COMANDO
    $tag_PAIN_COM_007 = "TE 72 200 013 007 000 - 000002";
    $idAtividadePAIN_COM_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COM_007)->value('id');
    $idAnalisePAIN_COM_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COM_007)->max('id');
    $statusPAIN_COM_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COM_007)->value('status_id');
    //TRANSLACAO PONTE 2 - PAINEL FUSIVEL
    $tag_PAIN_FUS_007 = "TE 72 200 013 007 000 - 000003";
    $idAtividadePAIN_FUS_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FUS_007)->value('id');
    $idAnalisePAIN_FUS_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FUS_007)->max('id');
    $statusPAIN_FUS_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FUS_007)->value('status_id');
    //TRANSLACAO PONTE 3 - PAINEL INVERSOR
    $tag_PAIN_INV_013 = "TE 72 200 013 007 000 - 000001";
    $idAtividadePAIN_INV_013 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_013)->value('id');
    $idAnalisePAIN_INV_013 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_013)->max('id');
    $statusPAIN_INV_013 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_013)->value('status_id');
    //ELEVACAO GUINCHO 1 - PAINEL DE COMANDO
    $tag_PAIN_COM_015 = "TE 72 200 013 015 000 - 000002";
    $idAtividadePAIN_COM_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COM_015)->value('id');
    $idAnalisePAIN_COM_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COM_015)->max('id');
    $statusPAIN_COM_015 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COM_015)->value('status_id');
    //ELEVACAO GUINCHO 2 - PAINEL FUSIVEL
    $tag_PAIN_FUS_015 = "TE 72 200 013 015 000 - 000003";
    $idAtividadePAIN_FUS_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FUS_015)->value('id');
    $idAnalisePAIN_FUS_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FUS_015)->max('id');
    $statusPAIN_FUS_015 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FUS_015)->value('status_id');
    //ELEVACAO GUINCHO 3 - PAINEL INVERSOR
    $tag_PAIN_INV_012 = "TE 72 200 013 015 000 - 000001";
    $idAtividadePAIN_INV_012 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_012)->value('id');
    $idAnalisePAIN_INV_012 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_012)->max('id');
    $statusPAIN_INV_012 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_012)->value('status_id');
    //ALIMENTACAO 4 - CIRCUITO AUXILIAR
    $tag_CIR_AUX_012 = "TE 72 200 013 023 006 - 000001";
    $idAtividadeCIR_AUX_012 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIR_AUX_012)->value('id');
    $idAnaliseCIR_AUX_012 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIR_AUX_012)->max('id');
    $statusCIR_AUX_012 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIR_AUX_012)->value('status_id');
    //ALIMENTACAO 1 - PAINEL DE COMANDO
    $tag_PAIN_COMANDO_006 = "TE 72 200 013 023 006 - 000002";
    $idAtividadePAIN_COMANDO_006 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_006)->value('id');
    $idAnalisePAIN_COMANDO_006 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_006)->max('id');
    $statusPAIN_COMANDO_006 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_006)->value('status_id');

    if ($statusPAIN_COM_011 == 5 || $statusDIR_CARRO == 5 || $statusPAIN_COM_007 == 5 || $statusPAIN_FUS_007 == 5 || $statusPAIN_INV_013 == 5 || $statusPAIN_COM_015 == 5 ||
    $statusPAIN_FUS_015 == 5 || $statusPAIN_INV_012 == 5 || $statusCIR_AUX_012 == 5 || $statusPAIN_COMANDO_006 == 5) {
      $pr_pontes_pr13_status = 5;
    } elseif ($statusPAIN_COM_011 == 4 || $statusDIR_CARRO == 4 || $statusPAIN_COM_007 == 4 || $statusPAIN_FUS_007 == 4 || $statusPAIN_INV_013 == 4 || $statusPAIN_COM_015 == 4 ||
    $statusPAIN_FUS_015 == 4 || $statusPAIN_INV_012 == 4 || $statusCIR_AUX_012 == 4 || $statusPAIN_COMANDO_006 == 4) {
      $pr_pontes_pr13_status = 4;
    } elseif ($statusPAIN_COM_011 == 3 || $statusDIR_CARRO == 3 || $statusPAIN_COM_007 == 3 || $statusPAIN_FUS_007 == 3 || $statusPAIN_INV_013 == 3 || $statusPAIN_COM_015 == 3 ||
    $statusPAIN_FUS_015 == 3 || $statusPAIN_INV_012 == 3 || $statusCIR_AUX_012 == 3 || $statusPAIN_COMANDO_006 == 3) {
      $pr_pontes_pr13_status = 3;
    } else {
      $pr_pontes_pr13_status = "";
    }

    return $pr_pontes_pr13_status;
  }

  public static function pr_pontes_pr14_Menu() {
    $pr_pontes_pr14_status = "";
    //ENTRADA GERAL CARRO CIRCULACAO AUXILIARES 1 - CIRCUITO AUXILIAR
    $tag_CIRC_AUX_023 = "TE 72 900 008 023 000 - 000001";
    $idAtividadeCIRC_AUX_023 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIRC_AUX_023)->value('id');
    $idAnaliseCIRC_AUX_023 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIRC_AUX_023)->max('id');
    $statusCIRC_AUX_023 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIRC_AUX_023)->value('status_id');
    //ENTRADA GERAL CARRO CIRCULACAO AUXILIARES 2 - PAINEL DE COMANDO 1
    $tag_PAIN_COMANDO1 = "TE 72 900 008 023 000 - 000002";
    $idAtividadePAIN_COMANDO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO1)->value('id');
    $idAnalisePAIN_COMANDO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO1)->max('id');
    $statusPAIN_COMANDO1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO1)->value('status_id');
    //ENTRADA GERAL CARRO CIRCULACAO AUXILIARES 3 - PAINEL DE COMANDO 2
    $tag_PAIN_COMANDO2 = "TE 72 900 008 023 000 - 000003";
    $idAtividadePAIN_COMANDO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO2)->value('id');
    $idAnalisePAIN_COMANDO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO2)->max('id');
    $statusPAIN_COMANDO2 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO2)->value('status_id');
    //CARRO - PAINEL DE COMANDO
    $tag_PAIN_COMANDO_011 = "TE 72 900 008 011 000 - 000002";
    $idAtividadePAIN_COMANDO_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_011)->value('id');
    $idAnalisePAIN_COMANDO_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_011)->max('id');
    $statusPAIN_COMANDO_011 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_011)->value('status_id');
    //TRANSLACAO DA PONTE 1 - PAINEL DE COMANDO
    $tag_PAIN_COMANDO_015 = "TE 72 900 008 015 000 - 000002";
    $idAtividadePAIN_COMANDO_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_015)->value('id');
    $idAnalisePAIN_COMANDO_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_015)->max('id');
    $statusPAIN_COMANDO_015 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_015)->value('status_id');
    //TRANSLACAO DA PONTE 2 - PAINEL FUSIVEL
    $tag_PAIN_FUSIVEL = "TE 72 900 008 007 000 - 000001";
    $idAtividadePAIN_FUSIVEL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FUSIVEL)->value('id');
    $idAnalisePAIN_FUSIVEL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FUSIVEL)->max('id');
    $statusPAIN_FUSIVEL = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FUSIVEL)->value('status_id');
    //TRANSLACAO DA PONTE 3 - PAINEL INVERSOR
    $tag_PAIN_INV_007 = "TE 72 900 008 007 000 - 000003";
    $idAtividadePAIN_INV_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_007)->value('id');
    $idAnalisePAIN_INV_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_007)->max('id');
    $statusPAIN_INV_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_007)->value('status_id');
    //ELEVACAO AUXILIAR 1 - PAINEL DE COMANDO
    $tag_PAIN_COMANDO_008 = "TE 72 900 008 016 000 - 000002";
    $idAtividadePAIN_COMANDO_008 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_008)->value('id');
    $idAnalisePAIN_COMANDO_008 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_008)->max('id');
    $statusPAIN_COMANDO_008 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_008)->value('status_id');
    //ELEVACAO AUXILIAR 3 - PAINEL INVERSOR
    $tag_PAIN_INV_016 = "TE 72 900 008 016 000 - 000001";
    $idAtividadePAIN_INV_016 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_016)->value('id');
    $idAnalisePAIN_INV_016 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_016)->max('id');
    $statusPAIN_INV_016 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_016)->value('status_id');
    //ELEVACAO  1 - PAINEL DE COMANDO
    $tag_PAIN_COMANDO_020 = "TE 72 900 008 015 000 - 000002";
    $idAtividadePAIN_COMANDO_020 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_020)->value('id');
    $idAnalisePAIN_COMANDO_020 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_020)->max('id');
    $statusPAIN_COMANDO_020 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_020)->value('status_id');
    //ELEVACAO  2 - PAINEL FUSIVEL
    $tag_PAIN_FUSIVEL_008 = "TE 72 900 008 015 000 - 000001";
    $idAtividadePAIN_FUSIVEL_008 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FUSIVEL_008)->value('id');
    $idAnalisePAIN_FUSIVEL_008 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FUSIVEL_008)->max('id');
    $statusPAIN_FUSIVEL_008 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FUSIVEL_008)->value('status_id');
    //ELEVACAO  3 - PAINEL INVERSOR
    $tag_PAIN_INV_008 = "TE 72 900 008 015 000 - 000003";
    $idAtividadePAIN_INV_008 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_008)->value('id');
    $idAnalisePAIN_INV_008 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_008)->max('id');
    $statusPAIN_INV_008 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_008)->value('status_id');
    //BLOCO DE PASSAGEM CARRO - /DIREÇÃO CARRO
    $tag_DIR_CARRO_011 = "TE 72 900 008 011 000 - 000001";
    $idAtividadeDIR_CARRO_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DIR_CARRO_011)->value('id');
    $idAnaliseDIR_CARRO_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDIR_CARRO_011)->max('id');
    $statusDIR_CARRO_011 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDIR_CARRO_011)->value('status_id');

    if ($statusCIRC_AUX_023 == 5 || $statusPAIN_COMANDO1 == 5 || $statusPAIN_COMANDO2 == 5 || $statusPAIN_COMANDO_011 == 5 || $statusPAIN_COMANDO_015 == 5 || $statusPAIN_FUSIVEL == 5 ||
    $statusPAIN_INV_007 == 5 || $statusPAIN_COMANDO_008 == 5 || $statusPAIN_INV_016 == 5 || $statusPAIN_COMANDO_020 == 5 || $statusPAIN_FUSIVEL_008 == 5 || $statusPAIN_INV_008 == 5 || $statusDIR_CARRO_011 == 5) {
      $pr_pontes_pr14_status = 5;
    } elseif ($statusCIRC_AUX_023 == 4 || $statusPAIN_COMANDO1 == 4 || $statusPAIN_COMANDO2 == 4 || $statusPAIN_COMANDO_011 == 4 || $statusPAIN_COMANDO_015 == 4 || $statusPAIN_FUSIVEL == 4 ||
    $statusPAIN_INV_007 == 4 || $statusPAIN_COMANDO_008 == 4 || $statusPAIN_INV_016 == 4 || $statusPAIN_COMANDO_020 == 4 || $statusPAIN_FUSIVEL_008 == 4 || $statusPAIN_INV_008 == 4 || $statusDIR_CARRO_011 == 4) {
      $pr_pontes_pr14_status = 4;
    } elseif ($statusCIRC_AUX_023 == 3 || $statusPAIN_COMANDO1 == 3 || $statusPAIN_COMANDO2 == 3 || $statusPAIN_COMANDO_011 == 3 || $statusPAIN_COMANDO_015 == 3 || $statusPAIN_FUSIVEL == 3 ||
    $statusPAIN_INV_007 == 3 || $statusPAIN_COMANDO_008 == 3 || $statusPAIN_INV_016 == 3 || $statusPAIN_COMANDO_020 == 3 || $statusPAIN_FUSIVEL_008 == 3 || $statusPAIN_INV_008 == 3 || $statusDIR_CARRO_011 == 3) {
      $pr_pontes_pr14_status = 3;
    } else {
      $pr_pontes_pr14_status = "";
    }

    return $pr_pontes_pr14_status;
  }

  public static function pr_pontes_pr20_Menu() {
    $pr_pontes_pr20_status = "";
    //GERAL - PAINEL DE FORÇA
    $tag_PAIN_FORCA = "TE 72 800 020 015 000 - 000001";
    $idAtividadePAIN_FORCA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FORCA)->value('id');
    $idAnalisePAIN_FORCA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FORCA)->max('id');
    $statusPAIN_FORCA = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FORCA)->value('status_id');
    //ELEVACAO - PAINEL DE COMANDO
    $tag_DIR_CARRO_020 = "TE 72 800 020 015 000 - 000002";
    $idAtividadeDIR_CARRO_020 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DIR_CARRO_020)->value('id');
    $idAnaliseDIR_CARRO_020 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDIR_CARRO_020)->max('id');
    $statusDIR_CARRO_020 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDIR_CARRO_020)->value('status_id');
    //PAINEL DE FORÇA / INVERSOR
    $tag_PAIN_FORCA_INV = "TE 72 800 020 011 000 - 000001";
    $idAtividadePAIN_FORCA_INV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FORCA_INV)->value('id');
    $idAnalisePAIN_FORCA_INV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FORCA_INV)->max('id');
    $statusPAIN_FORCA_INV = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FORCA_INV)->value('status_id');
    //PAINEL DE COMANDO
    $tag_CARRO_COM = "TE 72 800 020 011 000 - 000002";
    $idAtividadeCARRO_COM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CARRO_COM)->value('id');
    $idAnaliseCARRO_COM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO_COM)->max('id');
    $statusCARRO_COM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO_COM)->value('status_id');
    //PAINEL DE FORÇA / INVEROSR
    $tag_PAIN_FORCA_INVE_007 = "TE 72 800 020 007 000 - 000001";
    $idAtividadePAIN_FORCA_INVE_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FORCA_INVE_007)->value('id');
    $idAnalisePAIN_FORCA_INVE_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FORCA_INVE_007)->max('id');
    $statusPAIN_FORCA_INVE_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FORCA_INVE_007)->value('status_id');
    //PAINEL DE COMANDO
    $tag_PAIN_COM_020_007 = "TE 72 800 020 007 000 - 000002";
    $idAtividadePAIN_COM_020_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COM_020_007)->value('id');
    $idAnalisePAIN_COM_020_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COM_020_007)->max('id');
    $statusPAIN_COM_020_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COM_020_007)->value('status_id');

    if ($statusPAIN_FORCA == 5 || $statusDIR_CARRO_020 == 5 || $statusPAIN_FORCA_INV == 5 || $statusCARRO_COM == 5 || $statusPAIN_FORCA_INVE_007 == 5 || $statusPAIN_COM_020_007 == 5) {
      $pr_pontes_pr20_status = 5;
    } elseif ($statusPAIN_FORCA == 4 || $statusDIR_CARRO_020 == 4 || $statusPAIN_FORCA_INV == 4 || $statusCARRO_COM == 4 || $statusPAIN_FORCA_INVE_007 == 4 || $statusPAIN_COM_020_007 == 4) {
      $pr_pontes_pr20_status = 4;
    } elseif ($statusPAIN_FORCA == 3 || $statusDIR_CARRO_020 == 3 || $statusPAIN_FORCA_INV == 3 || $statusCARRO_COM == 3 || $statusPAIN_FORCA_INVE_007 == 3 || $statusPAIN_COM_020_007 == 3) {
      $pr_pontes_pr20_status = 3;
    } else {
      $pr_pontes_pr20_status = "";
    }

    return $pr_pontes_pr20_status;
  }

  public static function pr_pontes_pr23_Menu() {
    $pr_pontes_pr23_status = "";
    //AUXILIARES
    $tag_AUX_007 = "TE 72 800 013 007 000 - 000002";
    $idAtividadeAUX_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX_007)->value('id');
    $idAnaliseAUX_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX_007)->max('id');
    $statusAUX_007 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX_007)->value('status_id');
    //INVERSOR
    $tag_INV_013 = "TE 72 800 013 007 000 - 000001";
    $idAtividadeINV_013 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_INV_013)->value('id');
    $idAnaliseINV_013 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeINV_013)->max('id');
    $statusINV_013 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseINV_013)->value('status_id');
    //CARRO
    $tag_CARRO_013_011 = "TE 72 800 013 011 000 - 000001";
    $idAtividadeCARRO_013_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CARRO_013_011)->value('id');
    $idAnaliseCARRO_013_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO_013_011)->max('id');
    $statusCARRO_013_011 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO_013_011)->value('status_id');
    //AUXILIARES
    $tag_AUXILIAR_013_015 = "TE 72 800 013 015 000 - 000002";
    $idAtividadeAUXILIAR_013_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUXILIAR_013_015)->value('id');
    $idAnaliseAUXILIAR_013_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUXILIAR_013_015)->max('id');
    $statusAUXILIAR_013_015 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUXILIAR_013_015)->value('status_id');
    //INVERSOR
    $tag_INVER_013_015 = "TE 72 800 013 015 000 - 000001";
    $idAtividadeINVER_013_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_INVER_013_015)->value('id');
    $idAnaliseINVER_013_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeINVER_013_015)->max('id');
    $statusINVER_013_015 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseINVER_013_015)->value('status_id');
    //PROTEÇÃO AUXILIARES
    $tag_PRO_AUX = "TE 72 800 013 023 006 - 000001";
    $idAtividadePRO_AUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRO_AUX)->value('id');
    $idAnalisePRO_AUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRO_AUX)->max('id');
    $statusPRO_AUX = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRO_AUX)->value('status_id');
    //TENAZ
    $tag_TENAZ = "TE 72 800 013 017 000 - 000001";
    $idAtividadeTENAZ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TENAZ)->value('id');
    $idAnaliseTENAZ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTENAZ)->max('id');
    $statusTENAZ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTENAZ)->value('status_id');
    //CONEXÃO PONTE AX1
    $tag_CONEXAO_PONTE = "TE 72 800 013 023 000 - 000001";
    $idAtividadeCONEXAO_PONTE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CONEXAO_PONTE)->value('id');
    $idAnaliseCONEXAO_PONTE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONEXAO_PONTE)->max('id');
    $statusCONEXAO_PONTE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONEXAO_PONTE)->value('status_id');

    if ($statusAUX_007 == 5 || $statusINV_013 == 5 || $statusCARRO_013_011 == 5 || $statusAUXILIAR_013_015 == 5 || $statusINVER_013_015 == 5 || $statusPRO_AUX == 5 || $statusTENAZ == 5 || $statusCONEXAO_PONTE == 5) {
      $pr_pontes_pr23_status = 5;
    } elseif ($statusAUX_007 == 4 || $statusINV_013 == 4 || $statusCARRO_013_011 == 4 || $statusAUXILIAR_013_015 == 4 || $statusINVER_013_015 == 4 || $statusPRO_AUX == 4 || $statusTENAZ == 4 || $statusCONEXAO_PONTE == 4) {
      $pr_pontes_pr23_status = 4;
    } elseif ($statusAUX_007 == 3 || $statusINV_013 == 3 || $statusCARRO_013_011 == 3 || $statusAUXILIAR_013_015 == 3 || $statusINVER_013_015 == 3 || $statusPRO_AUX == 3 || $statusTENAZ == 3 || $statusCONEXAO_PONTE == 3) {
      $pr_pontes_pr23_status = 3;
    } else {
      $pr_pontes_pr23_status = "";
    }

    return $pr_pontes_pr23_status;
  }

  public static function pr_Menu() {
    $pr_menu = "";
    $pr_pontes_pr5_status = AuxFuncRelTec::pr_pontes_pr5_Menu();
    $pr_pontes_pr7_status = AuxFuncRelTec::pr_pontes_pr7_Menu();
    $pr_pontes_pr8_status = AuxFuncRelTec::pr_pontes_pr8_Menu();
    $pr_pontes_pr11_status = AuxFuncRelTec::pr_pontes_pr11_Menu();
    $pr_pontes_pr12_status = AuxFuncRelTec::pr_pontes_pr12_Menu();
    $pr_pontes_pr13_status = AuxFuncRelTec::pr_pontes_pr13_Menu();
    $pr_pontes_pr14_status = AuxFuncRelTec::pr_pontes_pr14_Menu();
    $pr_pontes_pr20_status = AuxFuncRelTec::pr_pontes_pr20_Menu();
    $pr_pontes_pr23_status = AuxFuncRelTec::pr_pontes_pr23_Menu();

    if ($pr_pontes_pr5_status == 5 || $pr_pontes_pr7_status == 5 || $pr_pontes_pr8_status == 5 || $pr_pontes_pr11_status == 5 || $pr_pontes_pr12_status == 5 ||
        $pr_pontes_pr13_status == 5 || $pr_pontes_pr14_status == 5 || $pr_pontes_pr20_status == 5 || $pr_pontes_pr23_status == 5) {
      $pr_menu = 5;
    } elseif ($pr_pontes_pr5_status == 4 || $pr_pontes_pr7_status == 4 || $pr_pontes_pr8_status == 4 || $pr_pontes_pr11_status == 4 || $pr_pontes_pr12_status == 4 ||
              $pr_pontes_pr13_status == 4 || $pr_pontes_pr14_status == 4 || $pr_pontes_pr20_status == 4 || $pr_pontes_pr23_status == 4) {
      $pr_menu = 4;
    } elseif ($pr_pontes_pr5_status == 3 || $pr_pontes_pr7_status == 3 || $pr_pontes_pr8_status == 3 || $pr_pontes_pr11_status == 3 || $pr_pontes_pr12_status == 3 ||
              $pr_pontes_pr13_status == 3 || $pr_pontes_pr14_status == 3 || $pr_pontes_pr20_status == 3 || $pr_pontes_pr23_status == 3) {
      $pr_menu = 3;
    } else {
      $pr_menu = "";
    }

    return $pr_menu;
  }

  public static function pr_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_normal = aux::GeralPorLinha2TE($atual1, 3, $pr_parent);
    return $pr_normal;
  }
  public static function pr_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_alarme = aux::GeralPorLinha2TE($atual1, 4, $pr_parent);
    return $pr_alarme;
  }
  public static function pr_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_critico = aux::GeralPorLinha2TE($atual1, 5, $pr_parent);
    return $pr_critico;
  }
}

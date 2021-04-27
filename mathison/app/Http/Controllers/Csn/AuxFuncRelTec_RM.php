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
use App\Http\Controllers\Csn\AuxFuncRelTec_RM as AuxFuncRelTec;
use App\Http\Controllers\Csn\AuxFunc as aux;

class AuxFuncRelTec_RM {

  public static function ura_Menu() {
    $ura_status = "";
    //LAVADOR DE GASES
    $tag_resistenciaLG = "RM 72 200 240 039 053 - 000020";
    $idAtividadeLG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaLG)->value('id');
    $idAnaliseLG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLG)->max('id');
    $statusLG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLG)->value('status_id');

    if ($statusLG == 5) {
      $ura_status = 5;
    } elseif ($statusLG == 4) {
      $ura_status = 4;
    } elseif ($statusLG == 3) {
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
    $ura_normal = aux::GeralPorLinhaRM($atual1, 3, $ura_linha1, $ura_linha2);
    return $ura_normal;
  }
  public static function ura_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_alarme = aux::GeralPorLinhaRM($atual1, 4, $ura_linha1, $ura_linha2);
    return $ura_alarme;
  }
  public static function ura_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_critico = aux::GeralPorLinhaRM($atual1, 5, $ura_linha1, $ura_linha2);
    return $ura_critico;
  }

  public static function lds_Menu() {
    $decapagem_status = "";
    //1 DESENROLADEIRA //ACIONAMENTO PRINCIPAL DESENROLADEIRA
    $tag_resistenciaAPD = "RM 72 200 210 024 003 - 000020";
    $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPD)->value('id');
    $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
    $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');
    //2 DESENROLADEIRA //DESEMPENADEIRA
    $tag_resistenciaDESEMP = "RM 72 200 210 048 003 - 000050";
    $idAtividadeDESEMP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDESEMP)->value('id');
    $idAnaliseDESEMP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEMP)->max('id');
    $statusDESEMP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEMP)->value('status_id');
    //TENSOR 1 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 01
    $tag_resistenciaART_MR_01 = "RM 72 200 210 246 042 - 000020";
    $idAtividadeART_MR_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaART_MR_01)->value('id');
    $idAnaliseART_MR_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_MR_01)->max('id');
    $statusART_MR_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_MR_01)->value('status_id');
    //TENSOR 2 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 02
    $tag_resistenciaART_MR_02 = "RM 72 200 210 246 051 - 000020";
    $idAtividadeART_MR_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaART_MR_02)->value('id');
    $idAnaliseART_MR_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_MR_02)->max('id');
    $statusART_MR_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_MR_02)->value('status_id');
    //TENSOR 3 //ACIONAMENTO ROLOS TENSIONADORES - MOTOR E REDUTOR 03
    $tag_resistenciaART_MR_03 = "RM 72 200 210 246 060 - 000020";
    $idAtividadeART_MR_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaART_MR_03)->value('id');
    $idAnaliseART_MR_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_MR_03)->max('id');
    $statusART_MR_03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_MR_03)->value('status_id');
    //PICOTADEIRA
    $tag_resistenciaPIC = "RM 72 200 210 234 027 - 000020";
    $idAtividadePIC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPIC)->value('id');
    $idAnalisePIC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePIC)->max('id');
    $statusPIC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePIC)->value('status_id');
    //ENROLADEIRA //ACIONAMENTO PRINCIPAL ENROLADEIRA
    $tag_resistenciaAPE = "RM 72 200 210 291 003 - 000030";
    $idAtividadeAPE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPE)->value('id');
    $idAnaliseAPE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE)->max('id');
    $statusAPE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE)->value('status_id');

    if ($statusAPD == 5 || $statusDESEMP == 5 || $statusART_MR_01 == 5 || $statusART_MR_02 == 5 || $statusART_MR_03 == 5 || $statusPIC == 5 || $statusAPE == 5) {
      $decapagem_status = 5;
    } elseif ($statusAPD == 4 || $statusDESEMP == 4 || $statusART_MR_01 == 4 || $statusART_MR_02 == 4 || $statusART_MR_03 == 4 || $statusPIC == 4 || $statusAPE == 4) {
      $decapagem_status = 4;
    } elseif ($statusAPD == 3 || $statusDESEMP == 3 || $statusART_MR_01 == 3 || $statusART_MR_02 == 3 || $statusART_MR_03 == 3 || $statusPIC == 3 || $statusAPE == 3) {
      $decapagem_status = 3;
    }
    else {
      $decapagem_status = "";
    }

    return $decapagem_status;
  }

  public static function lds_final_Menu() {
    $lds_final_status = "";
    $decapagem_status = AuxFuncRelTec::lds_Menu();

    if ($decapagem_status == 5) {
      $lds_final_status = 5;
    } elseif ($decapagem_status == 4) {
      $lds_final_status = 4;
    } elseif ($decapagem_status == 3) {
      $lds_final_status = 3;
    } else {
      $lds_final_status = "";
    }

    return $lds_final_status;
  }

  public static function lds_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lds_linha1 = 10;
    $lds_linha2 = 22;
    $lds_normal = aux::GeralPorLinhaRM($atual1, 3, $lds_linha1, $lds_linha2);
    return $lds_normal;
  }
  public static function lds_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lds_linha1 = 10;
    $lds_linha2 = 22;
    $lds_alarme = aux::GeralPorLinhaRM($atual1, 4, $lds_linha1, $lds_linha2);
    return $lds_alarme;
  }
  public static function lds_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lds_linha1 = 10;
    $lds_linha2 = 22;
    $lds_critico = aux::GeralPorLinhaRM($atual1, 5, $lds_linha1, $lds_linha2);
    return $lds_critico;
  }

  public static function laminador_Menu() {
    $laminador_status = "";
    //MOTOR DA ENROLADEIRA //ROTOR MOTOR ELÉTRICO ACION.  ENROL. 2
    $tag_resistenciaMEA = "RM 72 300 310 201 000 - 000020";
    $idAtividadeMEA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaMEA)->value('id');
    $idAnaliseMEA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMEA)->max('id');
    $statusMEA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMEA)->value('status_id');
    //CAIXA ESTATOR
    $tag_resistenciaCE = "RM 72 300 310 201 000 - 000021";
    $idAtividadeCE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCE)->value('id');
    $idAnaliseCE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCE)->max('id');
    $statusCE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCE)->value('status_id');
    //EXAUSTOR DE GASES //SISTEMA DE EXAUSTÃO
    $tag_resistenciaSIS_EXA = "RM 72 300 310 300 000 - 000020";
    $idAtividadeSIS_EXA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSIS_EXA)->value('id');
    $idAnaliseSIS_EXA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSIS_EXA)->max('id');
    $statusSIS_EXA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSIS_EXA)->value('status_id');
    //MOTOR ACIONAMENTO DA CADEIRA //MOTOR DE ACIONAMENTO DA CADEIRA
    $tag_resistenciaAPE = "RM 72 300 310 168 000 - 000020";
    $idAtividadeAPE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPE)->value('id');
    $idAnaliseAPE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE)->max('id');
    $statusAPE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE)->value('status_id');
    //CAIXA A
    $tag_resistenciaCA = "RM 72 300 310 168 000 - 000021";
    $idAtividadeCA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCA)->value('id');
    $idAnaliseCA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA)->max('id');
    $statusCA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA)->value('status_id');
    //CAIXA B
    $tag_resistenciaCB = "RM 72 300 310 168 000 - 000022";
    $idAtividadeCB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCB)->value('id');
    $idAnaliseCB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB)->max('id');
    $statusCB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB)->value('status_id');
    //MOTOR DA ENROLADEIRA 1 //MOTOR ELÉT. ACIONAM. DA ENROLADEIRA 1
    $tag_resistenciaMEAE_1 = "RM 72 300 310 054 000 - 000020";
    $idAtividadeMEAE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaMEAE_1)->value('id');
    $idAnaliseMEAE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMEAE_1)->max('id');
    $statusMEAE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMEAE_1)->value('status_id');
    //CAIXA ESTATOR 2
    $tag_resistenciaCE2 = "RM 72 300 310 054 000 - 000021";
    $idAtividadeCE2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCE2)->value('id');
    $idAnaliseCE2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCE2)->max('id');
    $statusCE2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCE2)->value('status_id');
    //ACIONAMENTO MOTOR DA DESENROLADEIRA //CAIXA 1
    $tag_resistenciaC1 = "RM 72 300 310 021 000 - 000020";
    $idAtividadeC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaC1)->value('id');
    $idAnaliseC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC1)->max('id');
    $statusC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC1)->value('status_id');
    //CAIXA 2
    $tag_resistenciaC2 = "RM 72 300 310 021 000 - 000021";
    $idAtividadeC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaC2)->value('id');
    $idAnaliseC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2)->max('id');
    $statusC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2)->value('status_id');

    if ($statusMEA == 5 || $statusCE == 5 || $statusSIS_EXA == 5 || $statusAPE == 5 || $statusCA == 5 ||
    $statusCB == 5 || $statusMEAE_1 == 5 || $statusCE2 == 5 || $statusC1 == 5 || $statusC2 == 5) {
      $laminador_status = 5;
    } elseif ($statusMEA == 4 || $statusCE == 4 || $statusSIS_EXA == 4 || $statusAPE == 4 || $statusCA == 4 ||
    $statusCB == 4 || $statusMEAE_1 == 4 || $statusCE2 == 4 || $statusC1 == 4 || $statusC2 == 4) {
      $laminador_status = 4;
    } elseif ($statusMEA == 3 || $statusCE == 3 || $statusSIS_EXA == 3 || $statusAPE == 3 || $statusCA == 3 ||
    $statusCB == 3 || $statusMEAE_1 == 3 || $statusCE2 == 3 || $statusC1 == 3 || $statusC2 == 3) {
      $laminador_status = 3;
    }
    else {
      $laminador_status = "";
    }

    return $laminador_status;
  }

    public static function lrf_final_Menu() {
      $lrf_final_status = "";
      $laminador_status = AuxFuncRelTec::laminador_Menu();

      if ($laminador_status == 5) {
        $lrf_final_status = 5;
      } elseif ($laminador_status == 4) {
        $lrf_final_status = 4;
      } elseif ($laminador_status == 3) {
        $lrf_final_status = 3;
      } else {
        $lrf_final_status = "";
      }

      return $lrf_final_status;
    }

    public static function lrf_normal_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lrf_linha1 = 12;
      $lrf_linha2 = 0;
      $lrf_normal = aux::GeralPorLinhaRM($atual1, 3, $lrf_linha1, $lrf_linha2);
      return $lrf_normal;
    }
    public static function lrf_alarme_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lrf_linha1 = 12;
      $lrf_linha2 = 0;
      $lrf_alarme = aux::GeralPorLinhaRM($atual1, 4, $lrf_linha1, $lrf_linha2);
      return $lrf_alarme;
    }
    public static function lrf_critico_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lrf_linha1 = 12;
      $lrf_linha2 = 0;
      $lrf_critico = aux::GeralPorLinhaRM($atual1, 5, $lrf_linha1, $lrf_linha2);
      return $lrf_critico;
    }


  public static function utilidades_Menu() {
    $utilidades_status = "";
    //GERACAO DE AR 0
    $tag_resistenciaGA0 = "RM 72 700 775 010 001 - 000020";
    $idAtividadeGA0 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA0)->value('id');
    $idAnaliseGA0 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA0)->max('id');
    $statusGA0 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA0)->value('status_id');
    //GERACAO DE AR 1
    $tag_resistenciaGA1 = "RM 72 700 775 020 001 - 000020";
    $idAtividadeGA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA1)->value('id');
    $idAnaliseGA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA1)->max('id');
    $statusGA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA1)->value('status_id');
    //GERACAO DE AR 2
    $tag_resistenciaGA2 = "RM 72 700 775 030 001 - 000020";
    $idAtividadeGA2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA2)->value('id');
    $idAnaliseGA2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA2)->max('id');
    $statusGA2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA2)->value('status_id');
    //GERACAO DE AR 6
    $tag_resistenciaGA6 = "RM 72 700 775 130 001 - 000020";
    $idAtividadeGA6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA6)->value('id');
    $idAnaliseGA6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA6)->max('id');
    $statusGA6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA6)->value('status_id');
    //GERACAO DE AR 5
    $tag_resistenciaGA5 = "RM 72 700 775 060 001 - 000020";
    $idAtividadeGA5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA5)->value('id');
    $idAnaliseGA5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA5)->max('id');
    $statusGA5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA5)->value('status_id');
    //GERACAO DE AR 4
    $tag_resistenciaGA4 = "RM 72 700 775 050 001 - 000020";
    $idAtividadeGA4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA4)->value('id');
    $idAnaliseGA4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA4)->max('id');
    $statusGA4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA4)->value('status_id');
    //GERACAO DE AR 3
    $tag_resistenciaGA3 = "RM 72 700 775 040 001 - 000020";
    $idAtividadeGA3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA3)->value('id');
    $idAnaliseGA3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA3)->max('id');
    $statusGA3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA3)->value('status_id');
    //VENTILADOR DA TORRE 1
    $tag_resistenciaVT1 = "RM 72 700 725 070 530 - 000020";
    $idAtividadeVT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaVT1)->value('id');
    $idAnaliseVT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVT1)->max('id');
    $statusVT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVT1)->value('status_id');
    //VENTILADOR DA TORRE 2
    $tag_resistenciaVT2 = "RM 72 700 725 070 531 - 000020";
    $idAtividadeVT2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaVT2)->value('id');
    $idAnaliseVT2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVT2)->max('id');
    $statusVT2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVT2)->value('status_id');
    //TORRE DE RESFRIAMENTO 5
    $tag_resistenciaTR5 = "RM 72 700 725 070 516 - 000020";
    $idAtividadeTR5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR5)->value('id');
    $idAnaliseTR5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR5)->max('id');
    $statusTR5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR5)->value('status_id');
    //TORRE DE RESFRIAMENTO 4
    $tag_resistenciaTR4 = "RM 72 700 725 070 515 - 000020";
    $idAtividadeTR4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR4)->value('id');
    $idAnaliseTR4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR4)->max('id');
    $statusTR4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR4)->value('status_id');
    //TORRE DE RESFRIAMENTO 3
    $tag_resistenciaTR3 = "RM 72 700 725 070 514 - 000020";
    $idAtividadeTR3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR3)->value('id');
    $idAnaliseTR3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR3)->max('id');
    $statusTR3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR3)->value('status_id');
    //TORRE DE RESFRIAMENTO 2
    $tag_resistenciaTR2 = "RM 72 700 725 070 513 - 000020";
    $idAtividadeTR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR2)->value('id');
    $idAnaliseTR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR2)->max('id');
    $statusTR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR2)->value('status_id');
    //TORRE DE RESFRIAMENTO 1
    $tag_resistenciaTR1 = "RM 72 700 725 070 512 - 000020";
    $idAtividadeTR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTR1)->value('id');
    $idAnaliseTR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTR1)->max('id');
    $statusTR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTR1)->value('status_id');
    //AERACAO 2
    $tag_resistenciaA2 = "RM 72 700 740 030 501 - 000020";
    $idAtividadeA2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaA2)->value('id');
    $idAnaliseA2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA2)->max('id');
    $statusA2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA2)->value('status_id');
    //AERACAO 1
    $tag_resistenciaA1 = "RM 72 700 740 030 500 - 000020";
    $idAtividadeA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaA1)->value('id');
    $idAnaliseA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA1)->max('id');
    $statusA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA1)->value('status_id');

    if ($statusGA0 == 5 || $statusGA1 == 5 || $statusGA2 == 5 || $statusGA6 == 5 || $statusGA5 == 5 || $statusGA4 == 5 || $statusGA3 == 5 || $statusVT1 == 5 ||
    $statusVT2 == 5 || $statusTR5 == 5 || $statusTR4 == 5 || $statusTR3 == 5 || $statusTR2 == 5 || $statusTR1 == 5 || $statusA2 == 5 || $statusA1 == 5) {
      $utilidades_status = 5;
    } elseif ($statusGA0 == 4 || $statusGA1 == 4 || $statusGA2 == 4 || $statusGA6 == 4 || $statusGA5 == 4 || $statusGA4 == 4 || $statusGA3 == 4 || $statusVT1 == 4 ||
    $statusVT2 == 4 || $statusTR5 == 4 || $statusTR4 == 4 || $statusTR3 == 4 || $statusTR2 == 4 || $statusTR1 == 4 || $statusA2 == 4 || $statusA1 == 4) {
      $utilidades_status = 4;
    } elseif ($statusGA0 == 3 || $statusGA1 == 3 || $statusGA2 == 3 || $statusGA6 == 3 || $statusGA5 == 3 || $statusGA4 == 3 || $statusGA3 == 3 || $statusVT1 == 3 ||
    $statusVT2 == 3 || $statusTR5 == 3 || $statusTR4 == 3 || $statusTR3 == 3 || $statusTR2 == 3 || $statusTR1 == 3 || $statusA2 == 3 || $statusA1 == 3) {
      $utilidades_status = 3;
    }
    else {
      $utilidades_status = "";
    }

    return $utilidades_status;
  }

  public static function utilidades_casa_bombas_Menu() {
    $utilidades_casa_bombas_status = "";
    //BB01
    $tag_resistenciaBB01 = "RM 72 700 708 040 010 - 000020";
    $idAtividadeBB01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaBB01)->value('id');
    $idAnaliseBB01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBB01)->max('id');
    $statusBB01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBB01)->value('status_id');
    //BB02
    $tag_resistenciaBB02 = "RM 72 700 708 040 009 - 000020";
    $idAtividadeBB02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaBB02)->value('id');
    $idAnaliseBB02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBB02)->max('id');
    $statusBB02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBB02)->value('status_id');
    //BB01 B
    $tag_resistenciaBB01_B = "RM 72 700 708 040 012 - 000020";
    $idAtividadeBB01_B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaBB01_B)->value('id');
    $idAnaliseBB01_B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBB01_B)->max('id');
    $statusBB01_B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBB01_B)->value('status_id');
    //BB02 B
    $tag_resistenciaBB02_B = "RM 72 700 708 040 011 - 000020";
    $idAtividadeBB02_B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaBB02_B)->value('id');
    $idAnaliseBB02_B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBB02_B)->max('id');
    $statusBB02_B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBB02_B)->value('status_id');
    //M4
    $tag_resistenciaM4 = "RM 72 700 785 100 090 - 000020";
    $idAtividadeM4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM4)->value('id');
    $idAnaliseM4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM4)->max('id');
    $statusM4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM4)->value('status_id');
    //M5
    $tag_resistenciaM5 = "RM 72 700 785 100 100 - 000020";
    $idAtividadeM5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM5)->value('id');
    $idAnaliseM5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM5)->max('id');
    $statusM5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM5)->value('status_id');
    //M3
    $tag_resistenciaM3 = "RM 72 700 785 100 080 - 000020";
    $idAtividadeM3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM3)->value('id');
    $idAnaliseM3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM3)->max('id');
    $statusM3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM3)->value('status_id');
    //M1
    $tag_resistenciaM1 = "RM 72 700 785 100 060 - 000020";
    $idAtividadeM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM1)->value('id');
    $idAnaliseM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM1)->max('id');
    $statusM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM1)->value('status_id');
    //M2
    $tag_resistenciaM2 = "RM 72 700 785 100 070 - 000020";
    $idAtividadeM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaM2)->value('id');
    $idAnaliseM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeM2)->max('id');
    $statusM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseM2)->value('status_id');

    if ($statusBB01 == 5 || $statusBB02 == 5 || $statusBB01_B == 5 || $statusBB02_B == 5 || $statusM4 == 5 || $statusM5 == 5 || $statusM3 == 5 || $statusM1 == 5 || $statusM2 == 5) {
      $utilidades_casa_bombas_status = 5;
    } elseif ($statusBB01 == 4 || $statusBB02 == 4 || $statusBB01_B == 4 || $statusBB02_B == 4 || $statusM4 == 4 || $statusM5 == 4 || $statusM3 == 4 || $statusM1 == 4 || $statusM2 == 4) {
      $utilidades_casa_bombas_status = 4;
    } elseif ($statusBB01 == 3 || $statusBB02 == 3 || $statusBB01_B == 3 || $statusBB02_B == 3 || $statusM4 == 3 || $statusM5 == 3 || $statusM3 == 3 || $statusM1 == 3 || $statusM2 == 3) {
      $utilidades_casa_bombas_status = 3;
    }
    else {
      $utilidades_casa_bombas_status = "";
    }

    return $utilidades_casa_bombas_status;
  }

  public static function utilidades_geracao_ar_cs_Menu() {
    $utilidades_geracao_ar_cs_status = "";
    //GERACAO DE AR 0
    $tag_resistenciaGA0 = "RM 72 700 775 120 001 - 000020";
    $idAtividadeGA0 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA0)->value('id');
    $idAnaliseGA0 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA0)->max('id');
    $statusGA0 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA0)->value('status_id');
    //GERACAO DE AR 1
    $tag_resistenciaGA1 = "RM 72 700 775 080 001 - 000020";
    $idAtividadeGA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaGA1)->value('id');
    $idAnaliseGA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGA1)->max('id');
    $statusGA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGA1)->value('status_id');

    if ($statusGA0 == 5 || $statusGA1 == 5) {
      $utilidades_geracao_ar_cs_status = 5;
    } elseif ($statusGA0 == 4 || $statusGA1 == 4) {
      $utilidades_geracao_ar_cs_status = 4;
    } elseif ($statusGA0 == 3 || $statusGA1 == 3) {
      $utilidades_geracao_ar_cs_status = 3;
    }
    else {
      $utilidades_geracao_ar_cs_status = "";
    }

    return $utilidades_geracao_ar_cs_status;
  }

  public static function uti_final_Menu() {
    $uti_final_status = "";
    $utilidades_status = AuxFuncRelTec::utilidades_Menu();
    $utilidades_casa_bombas_status = AuxFuncRelTec::utilidades_casa_bombas_Menu();
    $utilidades_geracao_ar_cs_status = AuxFuncRelTec::utilidades_geracao_ar_cs_Menu();

    if ($utilidades_status == 5 || $utilidades_casa_bombas_status == 5 || $utilidades_geracao_ar_cs_status == 5) {
      $uti_final_status = 5;
    } elseif ($utilidades_status == 4 || $utilidades_casa_bombas_status == 4 || $utilidades_geracao_ar_cs_status == 4) {
      $uti_final_status = 4;
    } elseif ($utilidades_status == 3 || $utilidades_casa_bombas_status == 3 || $utilidades_geracao_ar_cs_status == 3) {
      $uti_final_status = 3;
    } else {
      $uti_final_status = "";
    }

    return $uti_final_status;
  }

  public static function uti_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_normal = aux::GeralPorLinha2RM($atual1, 3, $uti_parent);
    return $uti_normal;
  }
  public static function uti_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_alarme = aux::GeralPorLinha2RM($atual1, 4, $uti_parent);
    return $uti_alarme;
  }
  public static function uti_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $uti_parent = 7;
    $uti_critico = aux::GeralPorLinha2RM($atual1, 5, $uti_parent);
    return $uti_critico;
  }

  public static function galvanizacao_entrada_Menu() {
    $galvanizacao_entrada_status = "";
    //ACIONAMENTO PRINCIPAL DESENROLADEIRA Nº1
    $tag_resistenciaAPDESE_N1 = "RM 72 400 410 019 003 - 000020";
    $idAtividadeAPDESE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPDESE_N1)->value('id');
    $idAnaliseAPDESE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPDESE_N1)->max('id');
    $statusAPDESE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPDESE_N1)->value('status_id');
    //ACIONAMENTO PRINCIPAL DESENROLADEIRA Nº2
    $tag_resistenciaAPDESE_N2 = "RM 72 400 410 069 003 - 000020";
    $idAtividadeAPDESE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPDESE_N2)->value('id');
    $idAnaliseAPDESE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPDESE_N2)->max('id');
    $statusAPDESE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPDESE_N2)->value('status_id');

    if ($statusAPDESE_N1 == 5 || $statusAPDESE_N2 == 5) {
      $galvanizacao_entrada_status = 5;
    } elseif ($statusAPDESE_N1 == 4 || $statusAPDESE_N2 == 4) {
      $galvanizacao_entrada_status = 4;
    } elseif ($statusAPDESE_N1 == 3 || $statusAPDESE_N2 == 3) {
      $galvanizacao_entrada_status = 3;
    }
    else {
      $galvanizacao_entrada_status = "";
    }

    return $galvanizacao_entrada_status;
  }

  public static function galvanizacao_acumulador_entrada_Menu() {
    $galvanizacao_acumulador_entrada_status = "";
    //ROLO 1 BRIDLE Nº 1
    $tag_resistenciaR1_BRIDLE_N1 = "RM 72 400 410 157 003 - 000020";
    $idAtividadeR1_BRIDLE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_N1)->value('id');
    $idAnaliseR1_BRIDLE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N1)->max('id');
    $statusR1_BRIDLE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N1)->value('status_id');
    //ROLO 2 BRIDLE Nº 1
    $tag_resistenciaR2_BRIDLE_N1 = "RM 72 400 410 158 003 - 000020";
    $idAtividadeR2_BRIDLE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_N1)->value('id');
    $idAnaliseR2_BRIDLE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N1)->max('id');
    $statusR2_BRIDLE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N1)->value('status_id');
    //ACIONAMENTO DO ACUMULADOR DE ENTRADA
    $tag_resistenciaAAE = "RM 72 400 410 165 003 - 000020";
    $idAtividadeAAE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAAE)->value('id');
    $idAnaliseAAE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAAE)->max('id');
    $statusAAE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAAE)->value('status_id');

    if ($statusR1_BRIDLE_N1 == 5 || $statusR2_BRIDLE_N1 == 5 || $statusAAE == 5) {
      $galvanizacao_acumulador_entrada_status = 5;
    } elseif ($statusR1_BRIDLE_N1 == 4 || $statusR2_BRIDLE_N1 == 4 || $statusAAE == 4) {
      $galvanizacao_acumulador_entrada_status = 4;
    } elseif ($statusR1_BRIDLE_N1 == 3 || $statusR2_BRIDLE_N1 == 3 || $statusAAE == 3) {
      $galvanizacao_acumulador_entrada_status = 3;
    }
    else {
      $galvanizacao_acumulador_entrada_status = "";
    }

    return $galvanizacao_acumulador_entrada_status;
  }

  public static function galvanizacao_defl_porao_Menu() {
    $galvanizacao_defl_porao_status = "";
    //DEFLETOR 16
    $tag_resistenciaDEF_16 = "RM 72 400 410 251 006 - 000020";
    $idAtividadeDEF_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDEF_16)->value('id');
    $idAnaliseDEF_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDEF_16)->max('id');
    $statusDEF_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDEF_16)->value('status_id');
    //DEFLETOR 17
    $tag_resistenciaDEF_17 = "RM 72 400 410 253 006 - 000020";
    $idAtividadeDEF_17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDEF_17)->value('id');
    $idAnaliseDEF_17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDEF_17)->max('id');
    $statusDEF_17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDEF_17)->value('status_id');
    //SISTEMA SOPRADOR NAVALHA DE AR 2
    $tag_resistenciaSSNA_2 = "RM 72 400 410 309 006 - 000020";
    $idAtividadeSSNA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSSNA_2)->value('id');
    $idAnaliseSSNA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSNA_2)->max('id');
    $statusSSNA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSNA_2)->value('status_id');
    //SISTEMA SOPRADOR NAVALHA DE AR 1
    $tag_resistenciaSSNA_1 = "RM 72 400 410 309 003 - 000020";
    $idAtividadeSSNA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSSNA_1)->value('id');
    $idAnaliseSSNA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSNA_1)->max('id');
    $statusSSNA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSNA_1)->value('status_id');

    if ($statusDEF_16 == 5 || $statusDEF_17 == 5 || $statusSSNA_2 == 5 || $statusSSNA_1 == 5) {
      $galvanizacao_defl_porao_status = 5;
    } elseif ($statusDEF_16 == 4 || $statusDEF_17 == 4 || $statusSSNA_2 == 4 || $statusSSNA_1 == 4) {
      $galvanizacao_defl_porao_status = 4;
    } elseif ($statusDEF_16 == 3 || $statusDEF_17 == 3 || $statusSSNA_2 == 3 || $statusSSNA_1 == 3) {
      $galvanizacao_defl_porao_status = 3;
    }
    else {
      $galvanizacao_defl_porao_status = "";
    }

    return $galvanizacao_defl_porao_status;
  }

  public static function galvanizacao_saida_laminador_Menu() {
    $galvanizacao_saida_laminador_status = "";
    //ACIONAMENTO PRINCIPAL LAMINADOR SUPERIOR
    $tag_resistenciaAPLS = "RM 72 400 410 344 003 - 000020";
    $idAtividadeAPLS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPLS)->value('id');
    $idAnaliseAPLS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPLS)->max('id');
    $statusAPLS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPLS)->value('status_id');
    //ACIONAMENTO PRINCIPAL LAMINADOR INFERIOR
    $tag_resistenciaAPLI = "RM 72 400 410 344 006 - 000020";
    $idAtividadeAPLI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPLI)->value('id');
    $idAnaliseAPLI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPLI)->max('id');
    $statusAPLI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPLI)->value('status_id');
    //ROLO 1 BRIDLE 5B
    $tag_resistenciaR1_BRIDLE_5B = "RM 72 400 410 377 003 - 000020";
    $idAtividadeR1_BRIDLE_5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_5B)->value('id');
    $idAnaliseR1_BRIDLE_5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_5B)->max('id');
    $statusR1_BRIDLE_5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_5B)->value('status_id');
    //ACUMULADOR SAIDA
    $tag_resistenciaAS = "RM 72 400 410 421 003 - 000020";
    $idAtividadeAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAS)->value('id');
    $idAnaliseAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAS)->max('id');
    $statusAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAS)->value('status_id');
    //ROLO 1 BRIDLE 5A
    $tag_resistenciaR1_BRIDLE_5A = "RM 72 400 410 375 003 - 000020";
    $idAtividadeR1_BRIDLE_5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_5A)->value('id');
    $idAnaliseR1_BRIDLE_5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_5A)->max('id');
    $statusR1_BRIDLE_5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_5A)->value('status_id');
    //ROLO 2 BRIDLE 5B
    $tag_resistenciaR2_BRIDLE_5B = "RM 72 400 410 378 003 - 000020";
    $idAtividadeR2_BRIDLE_5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_5B)->value('id');
    $idAnaliseR2_BRIDLE_5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_5B)->max('id');
    $statusR2_BRIDLE_5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_5B)->value('status_id');
    // 6 ROLO 2 BRIDLE 5A
    $tag_resistenciaR2_BRIDLE_5A = "RM 72 400 410 376 003 - 000020";
    $idAtividadeR2_BRIDLE_5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_5A)->value('id');
    $idAnaliseR2_BRIDLE_5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_5A)->max('id');
    $statusR2_BRIDLE_5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_5A)->value('status_id');
    // 9 ROLO 2 BRIDLE Nº 6
    $tag_resistenciaR2_BRIDLE_N6 = "RM 72 400 410 417 003 - 000020";
    $idAtividadeR2_BRIDLE_N6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_N6)->value('id');
    $idAnaliseR2_BRIDLE_N6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N6)->max('id');
    $statusR2_BRIDLE_N6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N6)->value('status_id');
    // 10 ROLO 1 BRIDLE Nº 6
    $tag_resistenciaR1_BRIDLE_N6 = "RM 72 400 410 415 004 - 000020";
    $idAtividadeR1_BRIDLE_N6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_N6)->value('id');
    $idAnaliseR1_BRIDLE_N6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N6)->max('id');
    $statusR1_BRIDLE_N6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N6)->value('status_id');
    // 1 ROLO 2 BRIDLE Nº 4B
    $tag_resistenciaR2_BRIDLE_N4B = "RM 72 400 410 340 003 - 000020";
    $idAtividadeR2_BRIDLE_N4B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_N4B)->value('id');
    $idAnaliseR2_BRIDLE_N4B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N4B)->max('id');
    $statusR2_BRIDLE_N4B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N4B)->value('status_id');
    // 2 ROLO 1 BRIDLE Nº 4B
    $tag_resistenciaR1_BRIDLE_N4B = "RM 72 400 410 339 003 - 000020";
    $idAtividadeR1_BRIDLE_N4B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_N4B)->value('id');
    $idAnaliseR1_BRIDLE_N4B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N4B)->max('id');
    $statusR1_BRIDLE_N4B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N4B)->value('status_id');

    if ($statusAPLS == 5 || $statusAPLI == 5 || $statusR1_BRIDLE_5B == 5 || $statusAS == 5 || $statusR1_BRIDLE_5A == 5 || $statusR2_BRIDLE_5B == 5 ||
    $statusR2_BRIDLE_5A == 5 || $statusR2_BRIDLE_N6 == 5 || $statusR1_BRIDLE_N6 == 5 || $statusR2_BRIDLE_N4B == 5 || $statusR1_BRIDLE_N4B == 5) {
      $galvanizacao_saida_laminador_status = 5;
    } elseif ($statusAPLS == 4 || $statusAPLI == 4 || $statusR1_BRIDLE_5B == 4 || $statusAS == 4 || $statusR1_BRIDLE_5A == 4 || $statusR2_BRIDLE_5B == 4 ||
    $statusR2_BRIDLE_5A == 4 || $statusR2_BRIDLE_N6 == 4 || $statusR1_BRIDLE_N6 == 4 || $statusR2_BRIDLE_N4B == 4 || $statusR1_BRIDLE_N4B == 4) {
      $galvanizacao_saida_laminador_status = 4;
    } elseif ($statusAPLS == 3 || $statusAPLI == 3 || $statusR1_BRIDLE_5B == 3 || $statusAS == 3 || $statusR1_BRIDLE_5A == 3 || $statusR2_BRIDLE_5B == 3 ||
    $statusR2_BRIDLE_5A == 3 || $statusR2_BRIDLE_N6 == 3 || $statusR1_BRIDLE_N6 == 3 || $statusR2_BRIDLE_N4B == 3 || $statusR1_BRIDLE_N4B == 3) {
      $galvanizacao_saida_laminador_status = 3;
    }
    else {
      $galvanizacao_saida_laminador_status = "";
    }

    return $galvanizacao_saida_laminador_status;
  }

  public static function galvanizacao_saida_Menu() {
    $galvanizacao_saida_status = "";
    //2 ROLO 1 BRIDLE
    $tag_resistenciaR1_BRIDLE_N4B = "RM 72 400 410 455 003 - 000020";
    $idAtividadeR1_BRIDLE_N4B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR1_BRIDLE_N4B)->value('id');
    $idAnaliseR1_BRIDLE_N4B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N4B)->max('id');
    $statusR1_BRIDLE_N4B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N4B)->value('status_id');
    //ENROLADEIRA 1 //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº01
    $tag_resistenciaAPE_N1 = "RM 72 400 410 477 003 - 000020";
    $idAtividadeAPE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPE_N1)->value('id');
    $idAnaliseAPE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_N1)->max('id');
    $statusAPE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_N1)->value('status_id');
    //ENROLADEIRA 2 //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº 02
    $tag_resistenciaAPE_N2 = "RM 72 400 410 501 003 - 000020";
    $idAtividadeAPE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAPE_N2)->value('id');
    $idAnaliseAPE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE_N2)->max('id');
    $statusAPE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE_N2)->value('status_id');
    //1 ROLO 2 BRIDLE //ROLO 2 BRIDLE Nº 7
    $tag_resistenciaR2_BRIDLE_N7 = "RM 72 400 410 456 003 - 000020";
    $idAtividadeR2_BRIDLE_N7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaR2_BRIDLE_N7)->value('id');
    $idAnaliseR2_BRIDLE_N7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N7)->max('id');
    $statusR2_BRIDLE_N7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N7)->value('status_id');

    if ($statusR1_BRIDLE_N4B == 5 || $statusAPE_N1 == 5 || $statusAPE_N2 == 5 || $statusR2_BRIDLE_N7 == 5) {
      $galvanizacao_saida_status = 5;
    } elseif ($statusR1_BRIDLE_N4B == 4 || $statusAPE_N1 == 4 || $statusAPE_N2 == 4 || $statusR2_BRIDLE_N7 == 4) {
      $galvanizacao_saida_status = 4;
    } elseif ($statusR1_BRIDLE_N4B == 3 || $statusAPE_N1 == 3 || $statusAPE_N2 == 3 || $statusR2_BRIDLE_N7 == 3) {
      $galvanizacao_saida_status = 3;
    }
    else {
      $galvanizacao_saida_status = "";
    }

    return $galvanizacao_saida_status;
  }

  public static function lgc_final_Menu() {
    $lgc_final_status = "";
    $galvanizacao_entrada_status = AuxFuncRelTec::galvanizacao_entrada_Menu();
    $galvanizacao_acumulador_entrada_status = AuxFuncRelTec::galvanizacao_acumulador_entrada_Menu();
    $galvanizacao_defl_porao_status = AuxFuncRelTec::galvanizacao_defl_porao_Menu();
    $galvanizacao_saida_laminador_status = AuxFuncRelTec::galvanizacao_saida_laminador_Menu();
    $galvanizacao_saida_status = AuxFuncRelTec::galvanizacao_saida_Menu();

    if ($galvanizacao_entrada_status == 5 || $galvanizacao_acumulador_entrada_status == 5 || $galvanizacao_defl_porao_status == 5 ||
        $galvanizacao_saida_laminador_status == 5 || $galvanizacao_saida_status == 5) {
      $lgc_final_status = 5;
    } elseif ($galvanizacao_entrada_status == 4 || $galvanizacao_acumulador_entrada_status == 4 || $galvanizacao_defl_porao_status == 4 ||
              $galvanizacao_saida_laminador_status == 4 || $galvanizacao_saida_status == 4) {
      $lgc_final_status = 4;
    } elseif ($galvanizacao_entrada_status == 3 || $galvanizacao_acumulador_entrada_status == 3 || $galvanizacao_defl_porao_status == 3 ||
              $galvanizacao_saida_laminador_status == 3 || $galvanizacao_saida_status == 3) {
      $lgc_final_status = 3;
    } else {
      $lgc_final_status = "";
    }

    return $lgc_final_status;
  }

  public static function lgc_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_normal = aux::GeralPorLinhaRM($atual1, 3, $lgc_linha1, $lgc_linha2);
    return $lgc_normal;
  }
  public static function lgc_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_alarme = aux::GeralPorLinhaRM($atual1, 4, $lgc_linha1, $lgc_linha2);
    return $lgc_alarme;
  }
  public static function lgc_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_critico = aux::GeralPorLinhaRM($atual1, 5, $lgc_linha1, $lgc_linha2);
    return $lgc_critico;
  }

  public static function pintura_entrada_Menu() {
    $pintura_entrada_status = "";
    //DESENROLADEIRA 01
    $tag_resistenciaDESEN_01 = "RM 72 500 510 009 004 - 000020";
    $idAtividadeDESEN_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDESEN_01)->value('id');
    $idAnaliseDESEN_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEN_01)->max('id');
    $statusDESEN_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEN_01)->value('status_id');
    //DESENROLADEIRA 02
    $tag_resistenciaDESEN_02 = "RM 72 500 510 031 004 - 000020";
    $idAtividadeDESEN_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDESEN_02)->value('id');
    $idAnaliseDESEN_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEN_02)->max('id');
    $statusDESEN_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEN_02)->value('status_id');

    if ($statusDESEN_01 == 5 || $statusDESEN_02 == 5) {
      $pintura_entrada_status = 5;
    } elseif ($statusDESEN_01 == 4 || $statusDESEN_02 == 4) {
      $pintura_entrada_status = 4;
    } elseif ($statusDESEN_01 == 3 || $statusDESEN_02 == 3) {
      $pintura_entrada_status = 3;
    }
    else {
      $pintura_entrada_status = "";
    }

    return $pintura_entrada_status;
  }

  public static function pintura_acumulador_entrada_Menu() {
    $pintura_acumulador_entrada_status = "";
    //ACIONAMENTO ACUMULADOR DE ENTRADA
    $tag_resistenciaACIO_ACUM_ENTRADA = "RM 72 500 510 088 001 - 000020";
    $idAtividadeACIO_ACUM_ENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaACIO_ACUM_ENTRADA)->value('id');
    $idAnaliseACIO_ACUM_ENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACIO_ACUM_ENTRADA)->max('id');
    $statusACIO_ACUM_ENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACIO_ACUM_ENTRADA)->value('status_id');

    if ($statusACIO_ACUM_ENTRADA == 5) {
      $pintura_acumulador_entrada_status = 5;
    } elseif ($statusACIO_ACUM_ENTRADA == 4) {
      $pintura_acumulador_entrada_status = 4;
    } elseif ($statusACIO_ACUM_ENTRADA == 3) {
      $pintura_acumulador_entrada_status = 3;
    }
    else {
      $pintura_acumulador_entrada_status = "";
    }

    return $pintura_acumulador_entrada_status;
  }

  public static function pintura_processo_Menu() {
    $pintura_processo_status = "";
    //CONJUNTO TENSOR 03 - ROLO 02
    $tag_resistenciaCONJ_TEN_03 = "RM 72 500 510 166 004 - 000020";
    $idAtividadeCONJ_TEN_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCONJ_TEN_03)->value('id');
    $idAnaliseCONJ_TEN_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_TEN_03)->max('id');
    $statusCONJ_TEN_03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_TEN_03)->value('status_id');

    if ($statusCONJ_TEN_03 == 5) {
      $pintura_processo_status = 5;
    } elseif ($statusCONJ_TEN_03 == 4) {
      $pintura_processo_status = 4;
    } elseif ($statusCONJ_TEN_03 == 3) {
      $pintura_processo_status = 3;
    }
    else {
      $pintura_processo_status = "";
    }

    return $pintura_processo_status;
  }

  public static function pintura_estufas_Menu() {
    $pintura_estufas_status = "";
    //ESTUFA PRIME //ZONA 4 SOPRADOR 2
    $tag_resistenciaZ4S2 = "RM 72 500 510 196 000 - 000020";
    $idAtividadeZ4S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ4S2)->value('id');
    $idAnaliseZ4S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ4S2)->max('id');
    $statusZ4S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ4S2)->value('status_id');
    //ZONA 4 SOPRADOR 1
    $tag_resistenciaZ4S1 = "RM 72 500 510 194 000 - 000020";
    $idAtividadeZ4S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ4S1)->value('id');
    $idAnaliseZ4S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ4S1)->max('id');
    $statusZ4S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ4S1)->value('status_id');
    //ZONA 3 SOPRADOR 2
    $tag_resistenciaZ3S2 = "RM 72 500 510 190 000 - 000020";
    $idAtividadeZ3S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ3S2)->value('id');
    $idAnaliseZ3S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ3S2)->max('id');
    $statusZ3S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ3S2)->value('status_id');
    //ZONA 3 SOPRADOR 1
    $tag_resistenciaZ3S1 = "RM 72 500 510 188 000 - 000020";
    $idAtividadeZ3S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ3S1)->value('id');
    $idAnaliseZ3S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ3S1)->max('id');
    $statusZ3S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ3S1)->value('status_id');
    //ZONA 2 SOPRADOR 2
    $tag_resistenciaZ2S2 = "RM 72 500 510 184 000 - 000020";
    $idAtividadeZ2S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ2S2)->value('id');
    $idAnaliseZ2S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ2S2)->max('id');
    $statusZ2S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ2S2)->value('status_id');
    //ZONA 2 SOPRADOR 1
    $tag_resistenciaZ2S1 = "RM 72 500 510 182 000 - 000020";
    $idAtividadeZ2S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ2S1)->value('id');
    $idAnaliseZ2S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ2S1)->max('id');
    $statusZ2S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ2S1)->value('status_id');
    //ZONA 1 SOPRADOR 2
    $tag_resistenciaZ1S2 = "RM 72 500 510 178 000 - 000020";
    $idAtividadeZ1S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ1S2)->value('id');
    $idAnaliseZ1S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ1S2)->max('id');
    $statusZ1S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ1S2)->value('status_id');
    //ZONA 1 SOPRADOR 1
    $tag_resistenciaZ1S1 = "RM 72 500 510 176 000 - 000020";
    $idAtividadeZ1S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaZ1S1)->value('id');
    $idAnaliseZ1S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZ1S1)->max('id');
    $statusZ1S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZ1S1)->value('status_id');
    //ESTUFA TINTA  //ZONA 4 SOPRADOR 2
    $tag_resistenciaETZ4S2 = "RM 72 500 510 242 000 - 000020";
    $idAtividadeETZ4S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ4S2)->value('id');
    $idAnaliseETZ4S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ4S2)->max('id');
    $statusETZ4S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ4S2)->value('status_id');
    //ZONA 4 SOPRADOR 1
    $tag_resistenciaETZ4S1 = "RM 72 500 510 240 000 - 000020";
    $idAtividadeETZ4S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ4S1)->value('id');
    $idAnaliseETZ4S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ4S1)->max('id');
    $statusETZ4S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ4S1)->value('status_id');
    //ZONA 3 SOPRADOR 2
    $tag_resistenciaETZ3S2 = "RM 72 500 510 236 000 - 000020";
    $idAtividadeETZ3S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ3S2)->value('id');
    $idAnaliseETZ3S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ3S2)->max('id');
    $statusETZ3S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ3S2)->value('status_id');
    //ZONA 3 SOPRADOR 1
    $tag_resistenciaETZ3S1 = "RM 72 500 510 234 000 - 000020";
    $idAtividadeETZ3S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ3S1)->value('id');
    $idAnaliseETZ3S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ3S1)->max('id');
    $statusETZ3S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ3S1)->value('status_id');
    //ZONA 2 SOPRADOR 2
    $tag_resistenciaETZ2S2 = "RM 72 500 510 230 000 - 000020";
    $idAtividadeETZ2S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ2S2)->value('id');
    $idAnaliseETZ2S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ2S2)->max('id');
    $statusETZ2S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ2S2)->value('status_id');
    //ZONA 2 SOPRADOR 1
    $tag_resistenciaETZ2S1 = "RM 72 500 510 228 000 - 000020";
    $idAtividadeETZ2S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ2S1)->value('id');
    $idAnaliseETZ2S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ2S1)->max('id');
    $statusETZ2S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ2S1)->value('status_id');
    //ZONA 1 SOPRADOR 2
    $tag_resistenciaETZ1S2 = "RM 72 500 510 224 000 - 000020";
    $idAtividadeETZ1S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ1S2)->value('id');
    $idAnaliseETZ1S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ1S2)->max('id');
    $statusETZ1S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ1S2)->value('status_id');
    //ZONA 1 SOPRADOR 1
    $tag_resistenciaETZ1S1 = "RM 72 500 510 222 000 - 000020";
    $idAtividadeETZ1S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaETZ1S1)->value('id');
    $idAnaliseETZ1S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETZ1S1)->max('id');
    $statusETZ1S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETZ1S1)->value('status_id');

    if ($statusZ4S2 == 5 || $statusZ4S1 == 5 || $statusZ3S2 == 5 || $statusZ3S1 == 5 || $statusZ2S2 == 5 || $statusZ2S1 == 5 || $statusZ1S2 == 5 || $statusZ1S1 == 5 ||
    $statusETZ4S2 == 5 || $statusETZ4S1 == 5 || $statusETZ3S2 == 5 || $statusETZ2S2 == 5 || $statusETZ2S1 == 5 || $statusETZ1S2 == 5 || $statusETZ1S1 == 5) {
      $pintura_estufas_status = 5;
    } elseif ($statusZ4S2 == 4 || $statusZ4S1 == 4 || $statusZ3S2 == 4 || $statusZ3S1 == 4 || $statusZ2S2 == 4 || $statusZ2S1 == 4 || $statusZ1S2 == 4 || $statusZ1S1 == 4 ||
    $statusETZ4S2 == 4 || $statusETZ4S1 == 4 || $statusETZ3S2 == 4 || $statusETZ2S2 == 4 || $statusETZ2S1 == 4 || $statusETZ1S2 == 4 || $statusETZ1S1 == 4) {
      $pintura_estufas_status = 4;
    } elseif ($statusZ4S2 == 3 || $statusZ4S1 == 3 || $statusZ3S2 == 3 || $statusZ3S1 == 3 || $statusZ2S2 == 3 || $statusZ2S1 == 3 || $statusZ1S2 == 3 || $statusZ1S1 == 3 ||
    $statusETZ4S2 == 3 || $statusETZ4S1 == 3 || $statusETZ3S2 == 3 || $statusETZ2S2 == 3 || $statusETZ2S1 == 3 || $statusETZ1S2 == 3 || $statusETZ1S1 == 3) {
      $pintura_estufas_status = 3;
    }
    else {
      $pintura_estufas_status = "";
    }

    return $pintura_estufas_status;
  }

  public static function pintura_areaExterna_Menu() {
    $pintura_areaExterna_status = "";
    //SOPRADOR PRINC. INCINERADOR - SUPPLY FAN
    $tag_resistenciaSPISF = "RM 72 500 510 328 010 - 000020";
    $idAtividadeSPISF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSPISF)->value('id');
    $idAnaliseSPISF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPISF)->max('id');
    $statusSPISF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPISF)->value('status_id');
    //ENXAGUE 1
    $tag_resistenciaE1 = "RM 72 500 510 320 000 - 000020";
    $idAtividadeE1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaE1)->value('id');
    $idAnaliseE1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeE1)->max('id');
    $statusE1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseE1)->value('status_id');
    //ENXAGUE 2
    $tag_resistenciaE2 = "RM 72 500 510 322 000 - 000020";
    $idAtividadeE2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaE2)->value('id');
    $idAnaliseE2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeE2)->max('id');
    $statusE2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseE2)->value('status_id');
    //AGUA GERAL
    $tag_resistenciaAG = "RM 72 500 510 324 000 - 000020";
    $idAtividadeAG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAG)->value('id');
    $idAnaliseAG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAG)->max('id');
    $statusAG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAG)->value('status_id');

    if ($statusSPISF == 5 || $statusE1 == 5 || $statusE2 == 5 || $statusAG == 5) {
      $pintura_areaExterna_status = 5;
    } elseif ($statusSPISF == 4 || $statusE1 == 4 || $statusE2 == 4 || $statusAG == 4) {
      $pintura_areaExterna_status = 4;
    } elseif ($statusSPISF == 3 || $statusE1 == 3 || $statusE2 == 3 || $statusAG == 3) {
      $pintura_areaExterna_status = 3;
    }
    else {
      $pintura_areaExterna_status = "";
    }

    return $pintura_areaExterna_status;
  }

  public static function pintura_saida_Menu() {
    $pintura_saida_status = "";
    //BRIDLE ROLO 2 //CONJUNTO TENSOR 05 - ROLO 02
    $tag_resistenciaCONJ_TEN_05 = "RM 72 500 510 262 004 - 000020";
    $idAtividadeCONJ_TEN_05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCONJ_TEN_05)->value('id');
    $idAnaliseCONJ_TEN_05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_TEN_05)->max('id');
    $statusCONJ_TEN_05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_TEN_05)->value('status_id');
    //BRIDLE ROLO 1 //CONJUNTO TENSOR 05 - ROLO 01
    $tag_resistenciaCONJ_TEN_05_R1 = "RM 72 500 510 262 001 - 000020";
    $idAtividadeCONJ_TEN_05_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCONJ_TEN_05_R1)->value('id');
    $idAnaliseCONJ_TEN_05_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_TEN_05_R1)->max('id');
    $statusCONJ_TEN_05_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_TEN_05_R1)->value('status_id');
    //BRIDLE 6 ROLO 1 //CONJUNTO TENSOR 06 - ROLO 01
    $tag_resistenciaCT_6_R1 = "RM 72 500 510 274 001 - 000020";
    $idAtividadeCT_6_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCT_6_R1)->value('id');
    $idAnaliseCT_6_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT_6_R1)->max('id');
    $statusCT_6_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT_6_R1)->value('status_id');
    //BRIDLE 6 ROLO 2 //CONJUNTO TENSOR 06 - ROLO 02
    $tag_resistenciaCT_06_R2 = "RM 72 500 510 274 004 - 000020";
    $idAtividadeCT_06_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCT_06_R2)->value('id');
    $idAnaliseCT_06_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT_06_R2)->max('id');
    $statusCT_06_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT_06_R2)->value('status_id');
    //ENROLADEIRA
    $tag_resistenciaENR = "RM 72 500 510 306 001 - 000020";
    $idAtividadeENR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaENR)->value('id');
    $idAnaliseENR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR)->max('id');
    $statusENR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR)->value('status_id');
    //ACIONAMENTO ACUMULADOR SAIDA
    $tag_resistenciaAAS = "RM 72 500 510 264 001 - 000020";
    $idAtividadeAAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAAS)->value('id');
    $idAnaliseAAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAAS)->max('id');
    $statusAAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAAS)->value('status_id');

    if ($statusCONJ_TEN_05 == 5 || $statusCONJ_TEN_05_R1 == 5 || $statusCT_6_R1 == 5 || $statusCT_06_R2 == 5 || $statusENR == 5 || $statusAAS == 5) {
      $pintura_saida_status = 5;
    } elseif ($statusCONJ_TEN_05 == 4 || $statusCONJ_TEN_05_R1 == 4 || $statusCT_6_R1 == 4 || $statusCT_06_R2 == 4 || $statusENR == 4 || $statusAAS == 4) {
      $pintura_saida_status = 4;
    } elseif ($statusCONJ_TEN_05 == 3 || $statusCONJ_TEN_05_R1 == 3 || $statusCT_6_R1 == 3 || $statusCT_06_R2 == 3 || $statusENR == 3 || $statusAAS == 3) {
      $pintura_saida_status = 3;
    }
    else {
      $pintura_saida_status = "";
    }

    return $pintura_saida_status;
  }

  public static function lpc_final_Menu() {
    $lpc_final_status = "";
    $pintura_entrada_status = AuxFuncRelTec::pintura_entrada_Menu();
    $pintura_acumulador_entrada_status = AuxFuncRelTec::pintura_acumulador_entrada_Menu();
    $pintura_processo_status = AuxFuncRelTec::pintura_processo_Menu();
    $pintura_estufas_status = AuxFuncRelTec::pintura_estufas_Menu();
    $pintura_areaExterna_status = AuxFuncRelTec::pintura_areaExterna_Menu();
    $pintura_saida_status = AuxFuncRelTec::pintura_saida_Menu();

    if ($pintura_entrada_status == 5 || $pintura_acumulador_entrada_status == 5 || $pintura_processo_status == 5 ||
        $pintura_estufas_status == 5 || $pintura_areaExterna_status == 5 || $pintura_saida_status == 5) {
      $lpc_final_status = 5;
    } elseif ($pintura_entrada_status == 4 || $pintura_acumulador_entrada_status == 4 || $pintura_processo_status == 4 ||
              $pintura_estufas_status == 4 || $pintura_areaExterna_status == 4 || $pintura_saida_status == 4) {
      $lpc_final_status = 4;
    } elseif ($pintura_entrada_status == 3 || $pintura_acumulador_entrada_status == 3 || $pintura_processo_status == 3 ||
              $pintura_estufas_status == 3 || $pintura_areaExterna_status == 3 || $pintura_saida_status == 3) {
      $lpc_final_status = 3;
    } else {
      $lpc_final_status = "";
    }

    return $lpc_final_status;
  }

  public static function lpc_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_normal = aux::GeralPorLinhaRM($atual1, 3, $lpc_linha1, $lpc_linha2);
    return $lpc_normal;
  }
  public static function lpc_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_alarme = aux::GeralPorLinhaRM($atual1, 4, $lpc_linha1, $lpc_linha2);
    return $lpc_alarme;
  }
  public static function lpc_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_critico = aux::GeralPorLinhaRM($atual1, 5, $lpc_linha1, $lpc_linha2);
    return $lpc_critico;
  }

  public static function cs_LCL_Menu() {
    $cs_LCL_status = "";
    //ACIONAMENTO DESENROLADEIRA
    $tag_resistenciaAD = "RM 72 600 610 015 000 - 000020";
    $idAtividadeAD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAD)->value('id');
    $idAnaliseAD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAD)->max('id');
    $statusAD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAD)->value('status_id');
    //ACIONAMENTO ENROLADEIRA
    $tag_resistenciaAE = "RM 72 600 610 107 000 - 000020";
    $idAtividadeAE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaAE)->value('id');
    $idAnaliseAE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE)->max('id');
    $statusAE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE)->value('status_id');
    //SLITTER E EMBOSSER
    $tag_resistenciaSEMB = "RM 72 600 610 059 000 - 000020";
    $idAtividadeSEMB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaSEMB)->value('id');
    $idAnaliseSEMB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSEMB)->max('id');
    $statusSEMB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSEMB)->value('status_id');
    //UNIDADE HIDRAULICA DE SAIDA
    $tag_resistenciaUHS = "RM 72 600 610 117 000 - 000020";
    $idAtividadeUHS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaUHS)->value('id');
    $idAnaliseUHS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS)->max('id');
    $statusUHS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS)->value('status_id');
    //CADEIRA TENCIONADORA 2
    $tag_resistenciaCT2 = "RM 72 600 610 097 000 - 000021";
    $idAtividadeCT2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCT2)->value('id');
    $idAnaliseCT2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT2)->max('id');
    $statusCT2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT2)->value('status_id');
    //CADEIRA TENCIONADORA 1
    $tag_resistenciaCT1 = "RM 72 600 610 097 000 - 000020";
    $idAtividadeCT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCT1)->value('id');
    $idAnaliseCT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT1)->max('id');
    $statusCT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT1)->value('status_id');
    //ENTRADA
    $tag_resistenciaENT = "RM 72 600 610 027 000 - 000020";
    $idAtividadeENT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaENT)->value('id');
    $idAnaliseENT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENT)->max('id');
    $statusENT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENT)->value('status_id');

    if ($statusAD == 5 || $statusAE == 5 || $statusSEMB == 5 || $statusUHS == 5 || $statusCT2 == 5 || $statusCT1 == 5 || $statusENT == 5) {
      $cs_LCL_status = 5;
    } elseif ($statusAD == 4 || $statusAE == 4 || $statusSEMB == 4 || $statusUHS == 4 || $statusCT2 == 4 || $statusCT1 == 4 || $statusENT == 4) {
      $cs_LCL_status = 4;
    } elseif ($statusAD == 3 || $statusAE == 3 || $statusSEMB == 3 || $statusUHS == 3 || $statusCT2 == 3 || $statusCT1 == 3 || $statusENT == 3) {
      $cs_LCL_status = 3;
    }
    else {
      $cs_LCL_status = "";
    }

    return $cs_LCL_status;
  }

  public static function cs_LCT1_Menu() {
    $cs_LCT1_status = "";
    //ESTEIRA ENTRADA DO EMPILHADOR
    $tag_resistenciaEEE = "RM 72 600 620 079 000 - 000020";
    $idAtividadeEEE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEEE)->value('id');
    $idAnaliseEEE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEEE)->max('id');
    $statusEEE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEEE)->value('status_id');
    //CONJ. SOPRADOR
    $tag_resistenciaCONJ_SOP = "RM 72 600 620 085 000 - 000020";
    $idAtividadeCONJ_SOP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCONJ_SOP)->value('id');
    $idAnaliseCONJ_SOP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_SOP)->max('id');
    $statusCONJ_SOP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_SOP)->value('status_id');
    //ROLO PUXADOR
    $tag_resistenciaRP = "RM 72 600 620 061 000 - 000020";
    $idAtividadeRP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaRP)->value('id');
    $idAnaliseRP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRP)->max('id');
    $statusRP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRP)->value('status_id');
    //ESTEIRA SAIDA DA TESOURA MECANICA
    $tag_resistenciaESTM = "RM 72 600 620 071 000 - 000020";
    $idAtividadeESTM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaESTM)->value('id');
    $idAnaliseESTM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTM)->max('id');
    $statusESTM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTM)->value('status_id');
    //TESOURA MECANICA
    $tag_resistenciaTM = "RM 72 600 620 067 000 - 000020";
    $idAtividadeTM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTM)->value('id');
    $idAnaliseTM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTM)->max('id');
    $statusTM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTM)->value('status_id');
    //DESEMPENADEIRA
    $tag_resistenciaD1 = "RM 72 600 620 043 000 - 000020";
    $idAtividadeD1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaD1)->value('id');
    $idAnaliseD1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD1)->max('id');
    $statusD1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD1)->value('status_id');
    //UH ENTRADA
    $tag_resistenciaENT = "RM 72 600 620 027 000 - 000020";
    $idAtividadeENT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaENT)->value('id');
    $idAnaliseENT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENT)->max('id');
    $statusENT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENT)->value('status_id');

    if ($statusEEE == 5 || $statusCONJ_SOP == 5 || $statusRP == 5 || $statusESTM == 5 || $statusTM == 5 || $statusD1 == 5 || $statusENT == 5) {
      $cs_LCT1_status = 5;
    } elseif ($statusEEE == 4 || $statusCONJ_SOP == 4 || $statusRP == 4 || $statusESTM == 4 || $statusTM == 4 || $statusD1 == 4 || $statusENT == 4) {
      $cs_LCT1_status = 4;
    } elseif ($statusEEE == 3 || $statusCONJ_SOP == 3 || $statusRP == 3 || $statusESTM == 3 || $statusTM == 3 || $statusD1 == 3 || $statusENT == 3) {
      $cs_LCT1_status = 3;
    }
    else {
      $cs_LCT1_status = "";
    }

    return $cs_LCT1_status;
  }

  public static function cs_LCT2_Menu() {
    $cs_LCT2_status = "";
    //TESOURA MECANICA
    $tag_resistenciaT_MEC = "RM 72 600 621 111 000 - 000020";
    $idAtividadeT_MEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaT_MEC)->value('id');
    $idAnaliseT_MEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT_MEC)->max('id');
    $statusT_MEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT_MEC)->value('status_id');
    //ROLO PUXADOR
    $tag_resistenciaROLO_P = "RM 72 600 621 105 000 - 000020";
    $idAtividadeROLO_P = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaROLO_P)->value('id');
    $idAnaliseROLO_P = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeROLO_P)->max('id');
    $statusROLO_P = DB::table('preditiva_analises')->where('id', '=', $idAnaliseROLO_P)->value('status_id');
    //DESEMPENADEIRA
    $tag_resistenciaD2 = "RM 72 600 621 073 000 - 000020";
    $idAtividadeD2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaD2)->value('id');
    $idAnaliseD2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD2)->max('id');
    $statusD2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD2)->value('status_id');
    //UH. M01
    $tag_resistenciaUH_M01 = "RM 72 600 621 093 000 - 000020";
    $idAtividadeUH_M01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaUH_M01)->value('id');
    $idAnaliseUH_M01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_M01)->max('id');
    $statusUH_M01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_M01)->value('status_id');
    //TESOURA CIRCULAR
    $tag_resistenciaTES_CIR = "RM 72 600 621 047 000 - 000020";
    $idAtividadeTES_CIR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTES_CIR)->value('id');
    $idAnaliseTES_CIR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_CIR)->max('id');
    $statusTES_CIR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_CIR)->value('status_id');
    //RECOLHEDOR DE APARAS
    $tag_resistenciaREC_A = "RM 72 600 621 063 000 - 000020";
    $idAtividadeREC_A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaREC_A)->value('id');
    $idAnaliseREC_A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeREC_A)->max('id');
    $statusREC_A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseREC_A)->value('status_id');

    if ($statusT_MEC == 5 || $statusROLO_P == 5 || $statusD2 == 5 || $statusUH_M01 == 5 || $statusTES_CIR == 5 || $statusREC_A == 5) {
      $cs_LCT2_status = 5;
    } elseif ($statusT_MEC == 4 || $statusROLO_P == 4 || $statusD2 == 4 || $statusUH_M01 == 4 || $statusTES_CIR == 4 || $statusREC_A == 4) {
      $cs_LCT2_status = 4;
    } elseif ($statusT_MEC == 3 || $statusROLO_P == 3 || $statusD2 == 3 || $statusUH_M01 == 3 || $statusTES_CIR == 3 || $statusREC_A == 3) {
      $cs_LCT2_status = 3;
    }
    else {
      $cs_LCT2_status = "";
    }

    return $cs_LCT2_status;
  }

  public static function cs_LCC_Menu() {
    $cs_LCC_status = "";
    //ROLO PUXADOR
    $tag_resistenciaRP1 = "RM 72 600 640 113 000 - 000020";
    $idAtividadeRP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaRP1)->value('id');
    $idAnaliseRP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRP1)->max('id');
    $statusRP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRP1)->value('status_id');
    //RECOLHEDOR DE APARAS
    $tag_resistenciaREC_APARAS = "RM 72 600 640 089 000 - 000020";
    $idAtividadeREC_APARAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaREC_APARAS)->value('id');
    $idAnaliseREC_APARAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeREC_APARAS)->max('id');
    $statusREC_APARAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseREC_APARAS)->value('status_id');
    //TESOURA CIRCULAR
    $tag_resistenciaTES_CIR1 = "RM 72 600 640 071 000 - 000020";
    $idAtividadeTES_CIR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTES_CIR1)->value('id');
    $idAnaliseTES_CIR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_CIR1)->max('id');
    $statusTES_CIR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_CIR1)->value('status_id');
    //DESEMPENADEIRA
    $tag_resistenciaDES1 = "RM 72 600 640 049 000 - 000020";
    $idAtividadeDES1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaDES1)->value('id');
    $idAnaliseDES1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES1)->max('id');
    $statusDES1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES1)->value('status_id');
    //UH M02
    $tag_resistenciaUH_M02 = "RM 72 600 640 167 000 - 000021";
    $idAtividadeUH_M02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaUH_M02)->value('id');
    $idAnaliseUH_M02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_M02)->max('id');
    $statusUH_M02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_M02)->value('status_id');
    //UH M01
    $tag_resistenciaUH_M1 = "RM 72 600 640 167 000 - 000020";
    $idAtividadeUH_M1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaUH_M1)->value('id');
    $idAnaliseUH_M1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_M1)->max('id');
    $statusUH_M1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_M1)->value('status_id');
    //TESOURA MECANICA
    $tag_resistenciaTES_MEC = "RM 72 600 640 121 000 - 000020";
    $idAtividadeTES_MEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaTES_MEC)->value('id');
    $idAnaliseTES_MEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_MEC)->max('id');
    $statusTES_MEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_MEC)->value('status_id');

    if ($statusRP1 == 5 || $statusREC_APARAS == 5 || $statusTES_CIR1 == 5 || $statusDES1 == 5 || $statusUH_M02 == 5 || $statusUH_M1 == 5 || $statusTES_MEC == 5) {
      $cs_LCC_status = 5;
    } elseif ($statusRP1 == 4 || $statusREC_APARAS == 4 || $statusTES_CIR1 == 4 || $statusDES1 == 4 || $statusUH_M02 == 4 || $statusUH_M1 == 4 || $statusTES_MEC == 4) {
      $cs_LCC_status = 4;
    } elseif ($statusRP1 == 3 || $statusREC_APARAS == 3 || $statusTES_CIR1 == 3 || $statusDES1 == 3 || $statusUH_M02 == 3 || $statusUH_M1 == 3 || $statusTES_MEC == 3) {
      $cs_LCC_status = 3;
    }
    else {
      $cs_LCC_status = "";
    }

    return $cs_LCC_status;
  }

  public static function cs_final_Menu() {
    $cs_final_status = "";
    $cs_LCL_status = AuxFuncRelTec::cs_LCL_Menu();
    $cs_LCT1_status = AuxFuncRelTec::cs_LCT1_Menu();
    $cs_LCT2_status = AuxFuncRelTec::cs_LCT2_Menu();
    $cs_LCC_status = AuxFuncRelTec::cs_LCC_Menu();

    if ($cs_LCL_status == 5 || $cs_LCT1_status == 5 || $cs_LCT2_status == 5 || $cs_LCC_status == 5) {
      $cs_final_status = 5;
    } elseif ($cs_LCL_status == 4 || $cs_LCT1_status == 4 || $cs_LCT2_status == 4 || $cs_LCC_status == 4) {
      $cs_final_status = 4;
    } elseif ($cs_LCL_status == 3 || $cs_LCT1_status == 3 || $cs_LCT2_status == 3 || $cs_LCC_status == 3) {
      $cs_final_status = 3;
    } else {
      $cs_final_status = "";
    }

    return $cs_final_status;
  }

  public static function cs_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_normal = aux::GeralPorLinha2RM($atual1, 3, $cs_parent);
    return $cs_normal;
  }
  public static function cs_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_alarme = aux::GeralPorLinha2RM($atual1, 4, $cs_parent);
    return $cs_alarme;
  }
  public static function cs_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $cs_parent = 6;
    $cs_critico = aux::GeralPorLinha2RM($atual1, 5, $cs_parent);
    return $cs_critico;
  }

  public static function pr5_Menu() {
    $pr5_status = "";
    //PONTE LD
    $tag_resistenciaPLD = "RM 72 600 005 005 000 - 000020";
    $idAtividadePLD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD)->value('id');
    $idAnalisePLD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD)->max('id');
    $statusPLD = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE = "RM 72 600 005 003 000 - 000020";
    $idAtividadePLE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE)->value('id');
    $idAnalisePLE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE)->max('id');
    $statusPLE = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE)->value('status_id');
    //CARRO
    $tag_resistenciaCAR = "RM 72 600 005 009 000 - 000020";
    $idAtividadeCAR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR)->value('id');
    $idAnaliseCAR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR)->max('id');
    $statusCAR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV = "RM 72 600 005 013 000 - 000020";
    $idAtividadeELEV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV)->value('id');
    $idAnaliseELEV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV)->max('id');
    $statusELEV = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV)->value('status_id');

    if ($statusPLD == 5 || $statusPLE == 5 || $statusCAR == 5 || $statusELEV == 5) {
      $pr5_status = 5;
    } elseif ($statusPLD == 4 || $statusPLE == 4 || $statusCAR == 4 || $statusELEV == 4) {
      $pr5_status = 4;
    } elseif ($statusPLD == 3 || $statusPLE == 3 || $statusCAR == 3 || $statusELEV == 3) {
      $pr5_status = 3;
    }
    else {
      $pr5_status = "";
    }

    return $pr5_status;
  }

  public static function pr7_Menu() {
    $pr7_status = "";
    //PONTE LD
    $tag_resistenciaPLD7 = "RM 72 500 007 005 000 - 000020";
    $idAtividadePLD7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD7)->value('id');
    $idAnalisePLD7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD7)->max('id');
    $statusPLD7 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD7)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE7 = "RM 72 500 007 003 000 - 000020";
    $idAtividadePLE7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE7)->value('id');
    $idAnalisePLE7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE7)->max('id');
    $statusPLE7 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE7)->value('status_id');
    //CARRO
    $tag_resistenciaCAR7 = "RM 72 500 007 009 000 - 000020";
    $idAtividadeCAR7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR7)->value('id');
    $idAnaliseCAR7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR7)->max('id');
    $statusCAR7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR7)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV7 = "RM 72 500 007 013 000 - 000020";
    $idAtividadeELEV7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV7)->value('id');
    $idAnaliseELEV7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV7)->max('id');
    $statusELEV7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV7)->value('status_id');

    if ($statusPLD7 == 5 || $statusPLE7 == 5 || $statusCAR7 == 5 || $statusELEV7 == 5) {
      $pr7_status = 5;
    } elseif ($statusPLD7 == 4 || $statusPLE7 == 4 || $statusCAR7 == 4 || $statusELEV7 == 4) {
      $pr7_status = 4;
    } elseif ($statusPLD7 == 3 || $statusPLE7 == 3 || $statusCAR7 == 3 || $statusELEV7 == 3) {
      $pr7_status = 3;
    }
    else {
      $pr7_status = "";
    }

    return $pr7_status;
  }

  public static function pr8_Menu() {
    $pr8_status = "";
    //PONTE LD
    $tag_resistenciaPLD8 = "RM 72 400 008 005 000 - 000020";
    $idAtividadePLD8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD8)->value('id');
    $idAnalisePLD8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD8)->max('id');
    $statusPLD8 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD8)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE8 = "RM 72 400 008 003 000 - 000020";
    $idAtividadePLE8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE8)->value('id');
    $idAnalisePLE8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE8)->max('id');
    $statusPLE8 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE8)->value('status_id');
    //CARRO
    $tag_resistenciaCAR8 = "RM 72 400 008 009 000 - 000020";
    $idAtividadeCAR8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR8)->value('id');
    $idAnaliseCAR8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR8)->max('id');
    $statusCAR8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR8)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV8 = "RM 72 400 008 013 000 - 000020";
    $idAtividadeELEV8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV8)->value('id');
    $idAnaliseELEV8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV8)->max('id');
    $statusELEV8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV8)->value('status_id');

    if ($statusPLD8 == 5 || $statusPLE8 == 5 || $statusCAR8 == 5 || $statusELEV8 == 5) {
      $pr8_status = 5;
    } elseif ($statusPLD8 == 4 || $statusPLE8 == 4 || $statusCAR8 == 4 || $statusELEV8 == 4) {
      $pr8_status = 4;
    } elseif ($statusPLD8 == 3 || $statusPLE8 == 3 || $statusCAR8 == 3 || $statusELEV8 == 3) {
      $pr8_status = 3;
    }
    else {
      $pr8_status = "";
    }

    return $pr8_status;
  }

  public static function pr11_Menu() {
    $pr11_status = "";
    //PONTE LD
    $tag_resistenciaPLD11 = "RM 72 400 011 005 000 - 000020";
    $idAtividadePLD11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD11)->value('id');
    $idAnalisePLD11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD11)->max('id');
    $statusPLD11 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD11)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE11 = "RM 72 400 011 003 000 - 000020";
    $idAtividadePLE11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE11)->value('id');
    $idAnalisePLE11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE11)->max('id');
    $statusPLE11 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE11)->value('status_id');
    //CARRO
    $tag_resistenciaCAR11 = "RM 72 400 011 009 000 - 000020";
    $idAtividadeCAR11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR11)->value('id');
    $idAnaliseCAR11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR11)->max('id');
    $statusCAR11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR11)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV11 = "RM 72 400 011 013 000 - 000020";
    $idAtividadeELEV11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV11)->value('id');
    $idAnaliseELEV11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV11)->max('id');
    $statusELEV11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV11)->value('status_id');

    if ($statusPLD11 == 5 || $statusPLE11 == 5 || $statusCAR11 == 5 || $statusELEV11 == 5) {
      $pr11_status = 5;
    } elseif ($statusPLD11 == 4 || $statusPLE11 == 4 || $statusCAR11 == 4 || $statusELEV11 == 4) {
      $pr11_status = 4;
    } elseif ($statusPLD11 == 3 || $statusPLE11 == 3 || $statusCAR11 == 3 || $statusELEV11 == 3) {
      $pr11_status = 3;
    }
    else {
      $pr11_status = "";
    }

    return $pr11_status;
  }

  public static function pr12_Menu() {
    $pr12_status = "";
    //PONTE LD
    $tag_resistenciaPLD12 = "RM 72 200 012 005 000 - 000020";
    $idAtividadePLD12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD12)->value('id');
    $idAnalisePLD12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD12)->max('id');
    $statusPLD12 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD12)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE12 = "RM 72 200 012 003 000 - 000020";
    $idAtividadePLE12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE12)->value('id');
    $idAnalisePLE12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE12)->max('id');
    $statusPLE12 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE12)->value('status_id');
    //CARRO
    $tag_resistenciaCAR12 = "RM 72 200 012 009 000 - 000020";
    $idAtividadeCAR12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR12)->value('id');
    $idAnaliseCAR12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR12)->max('id');
    $statusCAR12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR12)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV12 = "RM 72 200 012 013 000 - 000020";
    $idAtividadeELEV12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV12)->value('id');
    $idAnaliseELEV12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV12)->max('id');
    $statusELEV12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV12)->value('status_id');

    if ($statusPLD12 == 5 || $statusPLE12 == 5 || $statusCAR12 == 5 || $statusELEV12 == 5) {
      $pr12_status = 5;
    } elseif ($statusPLD12 == 4 || $statusPLE12 == 4 || $statusCAR12 == 4 || $statusELEV12 == 4) {
      $pr12_status = 4;
    } elseif ($statusPLD12 == 3 || $statusPLE12 == 3 || $statusCAR12 == 3 || $statusELEV12 == 3) {
      $pr12_status = 3;
    }
    else {
      $pr12_status = "";
    }

    return $pr12_status;
  }

  public static function pr13_Menu() {
    $pr13_status = "";
    //PONTE LD
    $tag_resistenciaPLD13 = "RM 72 200 013 005 000 - 000020";
    $idAtividadePLD13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLD13)->value('id');
    $idAnalisePLD13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLD13)->max('id');
    $statusPLD13 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLD13)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLE13 = "RM 72 200 013 003 000 - 000020";
    $idAtividadePLE13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLE13)->value('id');
    $idAnalisePLE13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLE13)->max('id');
    $statusPLE13 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLE13)->value('status_id');
    //CARRO
    $tag_resistenciaCAR13 = "RM 72 200 013 009 000 - 000020";
    $idAtividadeCAR13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCAR13)->value('id');
    $idAnaliseCAR13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCAR13)->max('id');
    $statusCAR13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCAR13)->value('status_id');
    //ELEVACAO
    $tag_resistenciaELEV13 = "RM 72 200 013 013 000 - 000020";
    $idAtividadeELEV13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaELEV13)->value('id');
    $idAnaliseELEV13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV13)->max('id');
    $statusELEV13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV13)->value('status_id');

    if ($statusPLD13 == 5 || $statusPLE13 == 5 || $statusCAR13 == 5 || $statusELEV13 == 5) {
      $pr13_status = 5;
    } elseif ($statusPLD13 == 4 || $statusPLE13 == 4 || $statusCAR13 == 4 || $statusELEV13 == 4) {
      $pr13_status = 4;
    } elseif ($statusPLD13 == 3 || $statusPLE13 == 3 || $statusCAR13 == 3 || $statusELEV13 == 3) {
      $pr13_status = 3;
    }
    else {
      $pr13_status = "";
    }

    return $pr13_status;
  }

  public static function pr14_Menu() {
    $pr14_status = "";
    //PONTE LD
    $tag_resistenciaPLDI14 = "RM 72 900 008 005 000 - 000020";
    $idAtividadePLDI14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLDI14)->value('id');
    $idAnalisePLDI14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLDI14)->max('id');
    $statusPLDI14 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLDI14)->value('status_id');
    //ELEVACAO PRINCIPAL
    $tag_resistenciaEP14 = "RM 72 900 008 013 000 - 000020";
    $idAtividadeEP14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEP14)->value('id');
    $idAnaliseEP14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP14)->max('id');
    $statusEP14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP14)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLES14 = "RM 72 900 008 003 000 - 000020";
    $idAtividadePLES14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLES14)->value('id');
    $idAnalisePLES14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLES14)->max('id');
    $statusPLES14 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLES14)->value('status_id');
    //CARRO
    $tag_resistenciaCARRO14 = "RM 72 900 008 009 000 - 000020";
    $idAtividadeCARRO14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCARRO14)->value('id');
    $idAnaliseCARRO14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO14)->max('id');
    $statusCARRO14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO14)->value('status_id');
    //ELEVACAO AUXILIAR
    $tag_resistenciaEA14 = "RM 72 900 008 014 000 - 000020";
    $idAtividadeEA14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEA14)->value('id');
    $idAnaliseEA14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEA14)->max('id');
    $statusEA14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEA14)->value('status_id');

    if ($statusPLDI14 == 5 || $statusEP14 == 5 || $statusPLES14 == 5 || $statusCARRO14 == 5 || $statusEA14 == 5) {
      $pr14_status = 5;
    } elseif ($statusPLDI14 == 4 || $statusEP14 == 4 || $statusPLES14 == 4 || $statusCARRO14 == 4 || $statusEA14 == 4) {
      $pr14_status = 4;
    } elseif ($statusPLDI14 == 3 || $statusEP14 == 3 || $statusPLES14 == 3 || $statusCARRO14 == 3 || $statusEA14 == 3) {
      $pr14_status = 3;
    }
    else {
      $pr14_status = "";
    }

    return $pr14_status;
  }

  public static function pr20_Menu() {
    $pr20_status = "";
    //PONTE LD
    $tag_resistenciaPLDI20 = "RM 72 800 020 005 000 - 000020";
    $idAtividadePLDI20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLDI20)->value('id');
    $idAnalisePLDI20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLDI20)->max('id');
    $statusPLDI20 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLDI20)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLES20 = "RM 72 800 020 003 000 - 000020";
    $idAtividadePLES20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLES20)->value('id');
    $idAnalisePLES20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLES20)->max('id');
    $statusPLES20 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLES20)->value('status_id');
    //CARRO LD
    $tag_resistenciaCARRO20 = "RM 72 800 020 009 000 - 000021";
    $idAtividadeCARRO20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCARRO20)->value('id');
    $idAnaliseCARRO20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO20)->max('id');
    $statusCARRO20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO20)->value('status_id');
    //ELEVACAO PRINCIPAL
    $tag_resistenciaEP20 = "RM 72 800 020 013 000 - 000020";
    $idAtividadeEP20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEP20)->value('id');
    $idAnaliseEP20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP20)->max('id');
    $statusEP20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP20)->value('status_id');
    //CARRO LE
    $tag_resistenciaEA20 = "RM 72 800 020 009 000 - 000020";
    $idAtividadeEA20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEA20)->value('id');
    $idAnaliseEA20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEA20)->max('id');
    $statusEA20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEA20)->value('status_id');

    if ($statusPLDI20 == 5 || $statusPLES20 == 5 || $statusCARRO20 == 5 || $statusEP20 == 5 || $statusEA20 == 5) {
      $pr20_status = 5;
    } elseif ($statusPLDI20 == 4 || $statusPLES20 == 4 || $statusCARRO20 == 4 || $statusEP20 == 4 || $statusEA20 == 4) {
      $pr20_status = 4;
    } elseif ($statusPLDI20 == 3 || $statusPLES20 == 3 || $statusCARRO20 == 3 || $statusEP20 == 3 || $statusEA20 == 3) {
      $pr20_status = 3;
    }
    else {
      $pr20_status = "";
    }

    return $pr20_status;
  }

  public static function pr23_Menu() {
    $pr23_status = "";
    //PONTE LD
    $tag_resistenciaPLDI23 = "RM 72 800 013 005 000 - 000020";
    $idAtividadePLDI23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLDI23)->value('id');
    $idAnalisePLDI23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLDI23)->max('id');
    $statusPLDI23 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLDI23)->value('status_id');
    //PONTE LE
    $tag_resistenciaPLES23 = "RM 72 800 013 003 000 - 000020";
    $idAtividadePLES23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaPLES23)->value('id');
    $idAnalisePLES23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLES23)->max('id');
    $statusPLES23 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLES23)->value('status_id');
    //CARRO
    $tag_resistenciaCARRO23 = "RM 72 800 013 009 000 - 000020";
    $idAtividadeCARRO23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaCARRO23)->value('id');
    $idAnaliseCARRO23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO23)->max('id');
    $statusCARRO23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO23)->value('status_id');
    //ELEVACAO
    $tag_resistenciaEP23 = "RM 72 800 013 013 000 - 000020";
    $idAtividadeEP23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_resistenciaEP23)->value('id');
    $idAnaliseEP23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP23)->max('id');
    $statusEP23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP23)->value('status_id');

    if ($statusPLDI23 == 5 || $statusPLES23 == 5 || $statusCARRO23 == 5 || $statusEP23 == 5) {
      $pr23_status = 5;
    } elseif ($statusPLDI23 == 4 || $statusPLES23 == 4 || $statusCARRO23 == 4 || $statusEP23 == 4) {
      $pr23_status = 4;
    } elseif ($statusPLDI23 == 3 || $statusPLES23 == 3 || $statusCARRO23 == 3 || $statusEP23 == 3) {
      $pr23_status = 3;
    }
    else {
      $pr23_status = "";
    }

    return $pr23_status;
  }

  public static function pr_final_Menu() {
    $pr_final_status = "";
    $pr5_status = AuxFuncRelTec::pr5_Menu();
    $pr7_status = AuxFuncRelTec::pr7_Menu();
    $pr8_status = AuxFuncRelTec::pr8_Menu();
    $pr11_status = AuxFuncRelTec::pr11_Menu();
    $pr12_status = AuxFuncRelTec::pr12_Menu();
    $pr13_status = AuxFuncRelTec::pr13_Menu();
    $pr14_status = AuxFuncRelTec::pr14_Menu();
    $pr20_status = AuxFuncRelTec::pr20_Menu();
    $pr23_status = AuxFuncRelTec::pr23_Menu();

    if ($pr5_status == 5 || $pr7_status == 5 || $pr8_status == 5 || $pr11_status == 5 ||
         $pr12_status == 5 || $pr13_status == 5 || $pr14_status == 5 || $pr20_status == 5 || $pr23_status == 5) {
      $pr_final_status = 5;
    } elseif ($pr5_status == 4 || $pr7_status == 4 || $pr8_status == 4 || $pr11_status == 4 ||
              $pr12_status == 4 || $pr13_status == 4 || $pr14_status == 4 || $pr20_status == 4 || $pr23_status == 4) {
      $pr_final_status = 4;
    } elseif ($pr5_status == 3 || $pr7_status == 3 || $pr8_status == 3 || $pr11_status == 3 ||
              $pr12_status == 3 || $pr13_status == 3 || $pr14_status == 3 || $pr20_status == 3 || $pr23_status == 3) {
      $pr_final_status = 3;
    } else {
      $pr_final_status = "";
    }

    return $pr_final_status;
  }

  public static function pr_normal_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_normal = aux::GeralPorLinha2RM($atual1, 3, $pr_parent);
    return $pr_normal;
  }
  public static function pr_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_alarme = aux::GeralPorLinha2RM($atual1, 4, $pr_parent);
    return $pr_alarme;
  }
  public static function pr_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $pr_parent = 8;
    $pr_critico = aux::GeralPorLinha2RM($atual1, 5, $pr_parent);
    return $pr_critico;
  }

}

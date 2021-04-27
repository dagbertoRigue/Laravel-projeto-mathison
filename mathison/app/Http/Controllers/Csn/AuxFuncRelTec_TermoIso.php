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
use App\Http\Controllers\Csn\AuxFuncRelTec_TermoIso as AuxFuncRelTec;
use App\Http\Controllers\Csn\AuxFunc as aux;

class AuxFuncRelTec_TermoIso {

  public static function ura_queimadores() {
    
    $ura_queimadores_status = "";

    $tag_uraQ9 = "TR 72 200 240 019 085 - 000009";
    $idAtividadeQ9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ9)->value('id');
    $idAnaliseQ9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ9)->max('id');
    $statusQ9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ9)->value('status_id');

    $tag_uraQ10 = "TR 72 200 240 019 085 - 000010";
    $idAtividadeQ10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ10)->value('id');
    $idAnaliseQ10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ10)->max('id');
    $statusQ10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ10)->value('status_id');

    $tag_uraQ11 = "TR 72 200 240 019 085 - 000011";
    $idAtividadeQ11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ11)->value('id');
    $idAnaliseQ11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ11)->max('id');
    $statusQ11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ11)->value('status_id');

    $tag_uraQ8 = "TR 72 200 240 019 085 - 000008";
    $idAtividadeQ8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ8)->value('id');
    $idAnaliseQ8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ8)->max('id');
    $statusQ8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ8)->value('status_id');

    $tag_uraQ12 = "TR 72 200 240 019 085 - 000012";
    $idAtividadeQ12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ12)->value('id');
    $idAnaliseQ12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ12)->max('id');
    $statusQ12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ12)->value('status_id');

    $tag_uraQ13 = "TR 72 200 240 019 085 - 000013";
    $idAtividadeQ13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ13)->value('id');
    $idAnaliseQ13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ13)->max('id');
    $statusQ13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ13)->value('status_id');

    $tag_uraQ7 = "TR 72 200 240 019 085 - 000007";
    $idAtividadeQ7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ7)->value('id');
    $idAnaliseQ7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ7)->max('id');
    $statusQ7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ7)->value('status_id');

    $tag_uraQ20 = "TR 72 200 240 019 085 - 000020";
    $idAtividadeQ20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ20)->value('id');
    $idAnaliseQ20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ20)->max('id');
    $statusQ20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ20)->value('status_id');

    $tag_uraQ14 = "TR 72 200 240 019 085 - 000014";
    $idAtividadeQ14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ14)->value('id');
    $idAnaliseQ14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ14)->max('id');
    $statusQ14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ14)->value('status_id');

    $tag_uraQ18 = "TR 72 200 240 019 085 - 000018";
    $idAtividadeQ18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ18)->value('id');
    $idAnaliseQ18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ18)->max('id');
    $statusQ18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ18)->value('status_id');

    $tag_uraQ15 = "TR 72 200 240 019 085 - 000015";
    $idAtividadeQ15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ15)->value('id');
    $idAnaliseQ15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ15)->max('id');
    $statusQ15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ15)->value('status_id');

    $tag_uraQ19 = "TR 72 200 240 019 085 - 000019";
    $idAtividadeQ19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ19)->value('id');
    $idAnaliseQ19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ19)->max('id');
    $statusQ19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ19)->value('status_id');

    $tag_uraQ16 = "TR 72 200 240 019 085 - 000016";
    $idAtividadeQ16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ16)->value('id');
    $idAnaliseQ16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ16)->max('id');
    $statusQ16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ16)->value('status_id');

    $tag_uraQ17 = "TR 72 200 240 019 085 - 000017";
    $idAtividadeQ17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ17)->value('id');
    $idAnaliseQ17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ17)->max('id');
    $statusQ17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ17)->value('status_id');

    $tag_uraQ5 = "TR 72 200 240 019 085 - 000005";
    $idAtividadeQ5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ5)->value('id');
    $idAnaliseQ5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ5)->max('id');
    $statusQ5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ5)->value('status_id');

    $tag_uraQ6 = "TR 72 200 240 019 085 - 000006";
    $idAtividadeQ6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ6)->value('id');
    $idAnaliseQ6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ6)->max('id');
    $statusQ6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ6)->value('status_id');

    $tag_uraQ4 = "TR 72 200 240 019 085 - 000004";
    $idAtividadeQ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ4)->value('id');
    $idAnaliseQ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ4)->max('id');
    $statusQ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ4)->value('status_id');

    $tag_uraQ3 = "TR 72 200 240 019 085 - 000003";
    $idAtividadeQ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ3)->value('id');
    $idAnaliseQ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ3)->max('id');
    $statusQ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ3)->value('status_id');

    $tag_uraQ1 = "TR 72 200 240 019 085 - 000001";
    $idAtividadeQ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ1)->value('id');
    $idAnaliseQ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ1)->max('id');
    $statusQ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ1)->value('status_id');

    $tag_uraQ2 = "TR 72 200 240 019 085 - 000002";
    $idAtividadeQ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ2)->value('id');
    $idAnaliseQ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ2)->max('id');
    $statusQ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ2)->value('status_id');

    if ($statusQ9 == 5 || $statusQ10 == 5 || $statusQ11 == 5 || $statusQ8 == 5 || $statusQ12 == 5 || $statusQ13 == 5 ||
        $statusQ7 == 5 || $statusQ20 == 5 || $statusQ14 == 5 || $statusQ18 == 5 || $statusQ15 == 5 || $statusQ19 == 5 ||
        $statusQ16 == 5 || $statusQ17 == 5 || $statusQ5 == 5 || $statusQ6 == 5 || $statusQ4 == 5 || $statusQ3 == 5 ||
        $statusQ1 == 5 || $statusQ2 == 5) {
      $ura_queimadores_status = 5;
    }elseif ($statusQ9 == 4 || $statusQ10 == 4 || $statusQ11 == 4 || $statusQ8 == 4 || $statusQ12 == 4 || $statusQ13 == 4 ||
        $statusQ7 == 4 || $statusQ20 == 4 || $statusQ14 == 4 || $statusQ18 == 4 || $statusQ15 == 4 || $statusQ19 == 4 ||
        $statusQ16 == 4 || $statusQ17 == 4 || $statusQ5 == 4 || $statusQ6 == 4 || $statusQ4 == 4 || $statusQ3 == 4 ||
        $statusQ1 == 4 || $statusQ2 == 4) {
      $ura_queimadores_status = 4;
    } elseif ($statusQ9 == 3 || $statusQ10 == 3 || $statusQ11 == 3 || $statusQ8 == 3 || $statusQ12 == 3 || $statusQ13 == 3 ||
        $statusQ7 == 3 || $statusQ20 == 3 || $statusQ14 == 3 || $statusQ18 == 3 || $statusQ15 == 3 || $statusQ19 == 3 ||
        $statusQ16 == 3 || $statusQ17 == 3 || $statusQ5 == 3 || $statusQ6 == 3 || $statusQ4 == 3 || $statusQ3 == 3 ||
        $statusQ1 == 3 || $statusQ2 == 3) {
      $ura_queimadores_status = 3;
    }
      return $ura_queimadores_status;
  }

  public static function ura_Menu() {
    $ura_menu = "";
    $ura_queimadores = AuxFuncRelTec::ura_queimadores();

    if ($ura_queimadores == 5) {
      $ura_menu = 5;
    } elseif ($ura_queimadores == 4) {
      $ura_menu = 4;
    } elseif ($ura_queimadores == 3) {
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
    $ura_normal = aux::GeralPorLinhaTR($atual1, 3, $ura_linha1, $ura_linha2);
    return $ura_normal;
  }
  public static function ura_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_alarme = aux::GeralPorLinhaTR($atual1, 4, $ura_linha1, $ura_linha2);
    return $ura_alarme;
  }
  public static function ura_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $ura_linha1 = 11;
    $ura_linha2 = 0;
    $ura_critico = aux::GeralPorLinhaTR($atual1, 5, $ura_linha1, $ura_linha2);
    return $ura_critico;
  }

  public static function lds_caldeira01_Menu() {

    $lds_caldeira01 = "";

    $tag_lds_C6 = "TR 72 050 150 009 000 - 000006";
    $idAtividadeC6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C6)->value('id');
    $idAnaliseC6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC6)->max('id');
    $statusC6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC6)->value('status_id');

    $tag_lds_C3 = "TR 72 050 150 009 000 - 000003";
    $idAtividadeC3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C3)->value('id');
    $idAnaliseC3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC3)->max('id');
    $statusC3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC3)->value('status_id');

    $tag_lds_C5 = "TR 72 050 150 009 000 - 000005";
    $idAtividadeC5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C5)->value('id');
    $idAnaliseC5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC5)->max('id');
    $statusC5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC5)->value('status_id');

    $tag_lds_C4 = "TR 72 050 150 009 000 - 000004";
    $idAtividadeC4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C4)->value('id');
    $idAnaliseC4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC4)->max('id');
    $statusC4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC4)->value('status_id');

    $tag_lds_C2 = "TR 72 050 150 009 000 - 000002";
    $idAtividadeC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2)->value('id');
    $idAnaliseC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2)->max('id');
    $statusC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2)->value('status_id');

    $tag_lds_C1 = "TR 72 050 150 009 000 - 000001";
    $idAtividadeC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C1)->value('id');
    $idAnaliseC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC1)->max('id');
    $statusC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC1)->value('status_id');

    if ($statusC6 == 5 || $statusC3 == 5 || $statusC5 == 5 || $statusC4 == 5 || $statusC2 == 5 || $statusC1 == 5) {
      $lds_caldeira01 = 5;
    } elseif ($statusC6 == 4 || $statusC3 == 4 || $statusC5 == 4 || $statusC4 == 4 || $statusC2 == 4 || $statusC1 == 4) {
      $lds_caldeira01 = 4;
    } elseif ($statusC6 == 3 || $statusC3 == 3 || $statusC5 == 3 || $statusC4 == 3 || $statusC2 == 3 || $statusC1 == 3) {
      $lds_caldeira01 = 3;
    } else {
      $lds_caldeira01 = "";
    }

    return $lds_caldeira01;
  }

  public static function lds_caldeira02_Menu() {

    $lds_caldeira02 = "";

    $tag_lds_C2_C6 = "TR 72 050 250 009 000 - 000006";
    $idAtividadeC2_C6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C6)->value('id');
    $idAnaliseC2_C6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C6)->max('id');
    $statusC2_C6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C6)->value('status_id');

    $tag_lds_C2_C3 = "TR 72 050 250 009 000 - 000003";
    $idAtividadeC2_C3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C3)->value('id');
    $idAnaliseC2_C3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C3)->max('id');
    $statusC2_C3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C3)->value('status_id');

    $tag_lds_C2_C5 = "TR 72 050 250 009 000 - 000005";
    $idAtividadeC2_C5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C5)->value('id');
    $idAnaliseC2_C5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C5)->max('id');
    $statusC2_C5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C5)->value('status_id');

    $tag_lds_C2_C4 = "TR 72 050 250 009 000 - 000004";
    $idAtividadeC2_C4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C4)->value('id');
    $idAnaliseC2_C4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C4)->max('id');
    $statusC2_C4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C4)->value('status_id');

    $tag_lds_C2_C2 = "TR 72 050 250 009 000 - 000002";
    $idAtividadeC2_C2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C2)->value('id');
    $idAnaliseC2_C2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C2)->max('id');
    $statusC2_C2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C2)->value('status_id');

    $tag_lds_C2_C1 = "TR 72 050 250 009 000 - 000001";
    $idAtividadeC2_C1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C1)->value('id');
    $idAnaliseC2_C1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C1)->max('id');
    $statusC2_C1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C1)->value('status_id');

    if ($statusC2_C6 == 5 || $statusC2_C3 == 5 || $statusC2_C5 == 5 || $statusC2_C4 == 5 || $statusC2_C2 == 5 || $statusC2_C1 == 5) {
      $lds_caldeira02 = 5;
    } elseif ($statusC2_C6 == 4 || $statusC2_C3 == 4 || $statusC2_C5 == 4 || $statusC2_C4 == 4 || $statusC2_C2 == 4 || $statusC2_C1 == 4) {
      $lds_caldeira02 = 4;
    } elseif ($statusC2_C6 == 3 || $statusC2_C3 == 3 || $statusC2_C5 == 3 || $statusC2_C4 == 3 || $statusC2_C2 == 3 || $statusC2_C1 == 3) {
      $lds_caldeira02 = 3;
    } else {
      $lds_caldeira02 = "";
    }

    return $lds_caldeira02;
  }

  public static function lds_Menu() {
    $lds_menu = "";
    $lds_caldeira01 = AuxFuncRelTec::lds_caldeira01_Menu();
    $lds_caldeira02 = AuxFuncRelTec::lds_caldeira02_Menu();

    if ($lds_caldeira01 == 5 || $lds_caldeira02 == 5) {
      $lds_menu = 5;
    } elseif ($lds_caldeira01 == 4 || $lds_caldeira02 == 4) {
      $lds_menu = 4;
    } elseif ($lds_caldeira01 == 3 || $lds_caldeira02 == 3) {
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
      $lds_normal = aux::GeralPorLinhaTR($atual1, 3, $lds_linha1, $lds_linha2);
      return $lds_normal;
    }
    public static function lds_alarme_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lds_linha1 = 10;
      $lds_linha2 = 22;
      $lds_alarme = aux::GeralPorLinhaTR($atual1, 4, $lds_linha1, $lds_linha2);
      return $lds_alarme;
    }
    public static function lds_critico_Menu() {
      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
      $lds_linha1 = 10;
      $lds_linha2 = 22;
      $lds_critico = aux::GeralPorLinhaTR($atual1, 5, $lds_linha1, $lds_linha2);
      return $lds_critico;
    }

  public static function lgc_forno_Menu() {

    $lgc_forno = "";

    $tag_galva_F23 = "TR 72 400 410 259 000 - 000016";
    $idAtividadeF23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F23)->value('id');
    $idAnaliseF23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF23)->max('id');
    $statusF23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF23)->value('status_id');

    $tag_galva_F17 = "TR 72 400 410 259 000 - 000010";
    $idAtividadeF17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F17)->value('id');
    $idAnaliseF17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF17)->max('id');
    $statusF17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF17)->value('status_id');

    $tag_galva_F22 = "TR 72 400 410 259 000 - 000015";
    $idAtividadeF22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F22)->value('id');
    $idAnaliseF22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF22)->max('id');
    $statusF22 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF22)->value('status_id');

    $tag_galva_F16 = "TR 72 400 410 259 000 - 000009";
    $idAtividadeF16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F16)->value('id');
    $idAnaliseF16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF16)->max('id');
    $statusF16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF16)->value('status_id');

    $tag_galva_F11 = "TR 72 400 410 259 000 - 000004";
    $idAtividadeF11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F11)->value('id');
    $idAnaliseF11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF11)->max('id');
    $statusF11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF11)->value('status_id');

    $tag_galva_F21 = "TR 72 400 410 259 000 - 000014";
    $idAtividadeF21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F21)->value('id');
    $idAnaliseF21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF21)->max('id');
    $statusF21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF21)->value('status_id');

    $tag_galva_F15 = "TR 72 400 410 259 000 - 000008";
    $idAtividadeF15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F15)->value('id');
    $idAnaliseF15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF15)->max('id');
    $statusF15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF15)->value('status_id');

    $tag_galva_F58 = "TR 72 400 410 266 000 - 000001";
    $idAtividadeF58 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F58)->value('id');
    $idAnaliseF58 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF58)->max('id');
    $statusF58 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF58)->value('status_id');

    $tag_galva_F20 = "TR 72 400 410 259 000 - 000013";
    $idAtividadeF20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F20)->value('id');
    $idAnaliseF20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF20)->max('id');
    $statusF20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF20)->value('status_id');

    $tag_galva_F14 = "TR 72 400 410 259 000 - 000007";
    $idAtividadeF14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F14)->value('id');
    $idAnaliseF14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF14)->max('id');
    $statusF14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF14)->value('status_id');

    $tag_galva_F10 = "TR 72 400 410 259 000 - 000003";
    $idAtividadeF10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F10)->value('id');
    $idAnaliseF10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF10)->max('id');
    $statusF10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF10)->value('status_id');

    $tag_galva_F57 = "TR 72 400 410 257 000 - 000012";
    $idAtividadeF57 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F57)->value('id');
    $idAnaliseF57 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF57)->max('id');
    $statusF57 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF57)->value('status_id');

    $tag_galva_F19 = "TR 72 400 410 259 000 - 000012";
    $idAtividadeF19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F19)->value('id');
    $idAnaliseF19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF19)->max('id');
    $statusF19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF19)->value('status_id');

    $tag_galva_F13 = "TR 72 400 410 259 000 - 000006";
    $idAtividadeF13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F13)->value('id');
    $idAnaliseF13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF13)->max('id');
    $statusF13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF13)->value('status_id');

    $tag_galva_F18 = "TR 72 400 410 259 000 - 000011";
    $idAtividadeF18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F18)->value('id');
    $idAnaliseF18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF18)->max('id');
    $statusF18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF18)->value('status_id');

    $tag_galva_F12 = "TR 72 400 410 259 000 - 000005";
    $idAtividadeF12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F12)->value('id');
    $idAnaliseF12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF12)->max('id');
    $idLaudoF12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF12)->value('id');
    $statusF12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF12)->value('status_id');

    $tag_galva_F53 = "TR 72 400 410 263 000 - 000010";
    $idAtividadeF53 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F53)->value('id');
    $idAnaliseF53 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF53)->max('id');
    $statusF53 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF53)->value('status_id');

    $tag_galva_F45 = "TR 72 400 410 263 000 - 000002";
    $idAtividadeF45 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F45)->value('id');
    $idAnaliseF45 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF45)->max('id');
    $statusF45 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF45)->value('status_id');

    $tag_galva_F49 = "TR 72 400 410 263 000 - 000006";
    $idAtividadeF49 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F49)->value('id');
    $idAnaliseF49 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF49)->max('id');
    $statusF49 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF49)->value('status_id');

    $tag_galva_F52 = "TR 72 400 410 263 000 - 000009";
    $idAtividadeF52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F52)->value('id');
    $idAnaliseF52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF52)->max('id');
    $statusF52 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF52)->value('status_id');

    $tag_galva_F48 = "TR 72 400 410 263 000 - 000005";
    $idAtividadeF48 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F48)->value('id');
    $idAnaliseF48 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF48)->max('id');
    $statusF48 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF48)->value('status_id');

    $tag_galva_F56 = "TR 72 400 410 257 000 - 000011";
    $idAtividadeF56 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F56)->value('id');
    $idAnaliseF56 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF56)->max('id');
    $statusF56 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF56)->value('status_id');

    $tag_galva_F55 = "TR 72 400 410 257 000 - 000010";
    $idAtividadeF55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F55)->value('id');
    $idAnaliseF55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF55)->max('id');
    $statusF55 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF55)->value('status_id');

    $tag_galva_F51 = "TR 72 400 410 263 000 - 000008";
    $idAtividadeF51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F51)->value('id');
    $idAnaliseF51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF51)->max('id');
    $statusF51 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF51)->value('status_id');

    $tag_galva_F47 = "TR 72 400 410 263 000 - 000004";
    $idAtividadeF47 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F47)->value('id');
    $idAnaliseF47 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF47)->max('id');
    $statusF47 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF47)->value('status_id');

    $tag_galva_F4 = "TR 72 400 410 257 000 - 000004";
    $idAtividadeF4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F4)->value('id');
    $idAnaliseF4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF4)->max('id');
    $statusF4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF4)->value('status_id');

    $tag_galva_F50 = "TR 72 400 410 263 000 - 000007";
    $idAtividadeF50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F50)->value('id');
    $idAnaliseF50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF50)->max('id');
    $statusF50 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF50)->value('status_id');

    $tag_galva_F44 = "TR 72 400 410 263 000 - 000001";
    $idAtividadeF44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F44)->value('id');
    $idAnaliseF44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF44)->max('id');
    $statusF44 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF44)->value('status_id');

    $tag_galvaF46 = "TR 72 400 410 263 000 - 000003";
    $idAtividadeF46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galvaF46)->value('id');
    $idAnaliseF46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF46)->max('id');
    $statusF46 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF46)->value('status_id');

    $tag_galva_F54 = "TR 72 400 410 257 000 - 000009";
    $idAtividadeF54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F54)->value('id');
    $idAnaliseF54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF54)->max('id');
    $statusF54 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF54)->value('status_id');

    $tag_galva_F6 = "TR 72 400 410 258 000 - 000002";
    $idAtividadeF6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F6)->value('id');
    $idAnaliseF6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF6)->max('id');
    $statusF6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF6)->value('status_id');

    $tag_galva_F8 = "TR 72 400 410 259 000 - 000002";
    $idAtividadeF8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F8)->value('id');
    $idAnaliseF8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF8)->max('id');
    $statusF8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF8)->value('status_id');

    $tag_galva_F37 = "TR 72 400 410 261 000 - 000014";
    $idAtividadeF37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F37)->value('id');
    $idAnaliseF37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF37)->max('id');
    $statusF37 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF37)->value('status_id');

    $tag_galva_F25 = "TR 72 400 410 261 000 - 000002";
    $idAtividadeF25 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F25)->value('id');
    $idAnaliseF25 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF25)->max('id');
    $statusF25 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF25)->value('status_id');

    $tag_galva_F31 = "TR 72 400 410 261 000 - 000008";
    $idAtividadeF31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F31)->value('id');
    $idAnaliseF31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF31)->max('id');
    $statusF31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF31)->value('status_id');

    $tag_galva_F43 = "TR 72 400 410 257 000 - 000006";
    $idAtividadeF43 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F43)->value('id');
    $idAnaliseF43 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF43)->max('id');
    $statusF43 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF43)->value('status_id');

    $tag_galva_F9 = "TR 72 400 410 257 000 - 000013";
    $idAtividadeF9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F9)->value('id');
    $idAnaliseF9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF9)->max('id');
    $statusF9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF9)->value('status_id');

    $tag_galva_F3 = "TR 72 400 410 257 000 - 000003";
    $idAtividadeF3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F3)->value('id');
    $idAnaliseF3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF3)->max('id');
    $statusF3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF3)->value('status_id');

    $tag_galva_F2 = "TR 72 400 410 257 000 - 000002";
    $idAtividadeF2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F2)->value('id');
    $idAnaliseF2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF2)->max('id');
    $statusF2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF2)->value('status_id');

    $tag_galva_F36 = "TR 72 400 410 261 000 - 000013";
    $idAtividadeF36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F36)->value('id');
    $idAnaliseF36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF36)->max('id');
    $statusF36 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF36)->value('status_id');

    $tag_galva_F30 = "TR 72 400 410 261 000 - 000007";
    $idAtividadeF30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F30)->value('id');
    $idAnaliseF30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF30)->max('id');
    $statusF30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF30)->value('status_id');

    $tag_galva_F39 = "TR 72 400 410 258 000 - 000004";
    $idAtividadeF39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F39)->value('id');
    $idAnaliseF39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF39)->max('id');
    $statusF39 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF39)->value('status_id');

    $tag_galva_F7 = "TR 72 400 410 259 000 - 000001";
    $idAtividadeF7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F7)->value('id');
    $idAnaliseF7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF7)->max('id');
    $statusF7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF7)->value('status_id');

    $tag_galva_F5 = "TR 72 400 410 258 000 - 000001";
    $idAtividadeF5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F5)->value('id');
    $idAnaliseF5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF5)->max('id');
    $statusF5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF5)->value('status_id');

    $tag_galva_F35 = "TR 72 400 410 261 000 - 000012";
    $idAtividadeF35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F35)->value('id');
    $idAnaliseF35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF35)->max('id');
    $statusF35 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF35)->value('status_id');

    $tag_galva_F29 = "TR 72 400 410 261 000 - 000006";
    $idAtividadeF29 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F29)->value('id');
    $idAnaliseF29 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF29)->max('id');
    $statusF29 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF29)->value('status_id');

    $tag_galva_F42 = "TR 72 400 410 257 000 - 000007";
    $idAtividadeF42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F42)->value('id');
    $idAnaliseF42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF42)->max('id');
    $statusF42 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF42)->value('status_id');

    $tag_galva_F41 = "TR 72 400 410 257 000 - 000008";
    $idAtividadeF41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F41)->value('id');
    $idAnaliseF41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF41)->max('id');
    $statusF41 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF41)->value('status_id');

    $tag_galva_F34 = "TR 72 400 410 261 000 - 000011";
    $idAtividadeF34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F34)->value('id');
    $idAnaliseF34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF34)->max('id');
    $statusF34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF34)->value('status_id');

    $tag_galva_F24 = "TR 72 400 410 261 000 - 000001";
    $idAtividadeF24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F24)->value('id');
    $idAnaliseF24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF24)->max('id');
    $statusF24 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF24)->value('status_id');

    $tag_galva_F28 = "TR 72 400 410 261 000 - 000005";
    $idAtividadeF28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F28)->value('id');
    $idAnaliseF28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF28)->max('id');
    $statusF28 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF28)->value('status_id');

    $tag_galva_F33 = "TR 72 400 410 261 000 - 000010";
    $idAtividadeF33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F33)->value('id');
    $idAnaliseF33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF33)->max('id');
    $statusF33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF33)->value('status_id');

    $tag_galva_F27 = "TR 72 400 410 261 000 - 000004";
    $idAtividadeF27 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F27)->value('id');
    $idAnaliseF27 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF27)->max('id');
    $statusF27 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF27)->value('status_id');

    $tag_galva_F38 = "TR 72 400 410 258 000 - 000003";
    $idAtividadeF38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F38)->value('id');
    $idAnaliseF38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF38)->max('id');
    $statusF38 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF38)->value('status_id');

    $tag_galva_F40 = "TR 72 400 410 257 000 - 000005";
    $idAtividadeF40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F40)->value('id');
    $idAnaliseF40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF40)->max('id');
    $statusF40 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF40)->value('status_id');

    $tag_galva_F32 = "TR 72 400 410 261 000 - 000009";
    $idAtividadeF32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F32)->value('id');
    $idAnaliseF32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF32)->max('id');
    $statusF32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF32)->value('status_id');

    $tag_galva_F26 = "TR 72 400 410 261 000 - 000003";
    $idAtividadeF26 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F26)->value('id');
    $idAnaliseF26 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF26)->max('id');
    $statusF26 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF26)->value('status_id');

    $tag_galva_F1 = "TR 72 400 410 257 000 - 000001";
    $idAtividadeF1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F1)->value('id');
    $idAnaliseF1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF1)->max('id');
    $statusF1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF1)->value('status_id');

    if ($statusF23 == 5 || $statusF17 == 5 || $statusF22 == 5 || $statusF16 == 5 || $statusF11 == 5 || $statusF21 == 5 || $statusF15 == 5 || $statusF58 == 5 || $statusF20 == 5 ||
    $statusF14 == 5 || $statusF10 == 5 || $statusF57 == 5 || $statusF19 == 5 || $statusF13 == 5 || $statusF18 == 5 || $statusF12 == 5 || $statusF53 == 5 || $statusF45 == 5 ||
    $statusF49 == 5 || $statusF52 == 5 || $statusF48 == 5 || $statusF56 == 5 || $statusF55 == 5 || $statusF51 == 5 || $statusF47 == 5 || $statusF4 == 5 || $statusF50 == 5 ||
    $statusF44 == 5 || $statusF46 == 5 || $statusF54 == 5 || $statusF6 == 5 || $statusF8 == 5 || $statusF37 == 5 || $statusF25 == 5 || $statusF31 == 5 || $statusF43 == 5 ||
    $statusF9 == 5 || $statusF3 == 5 || $statusF2 == 5 || $statusF36 == 5 || $statusF30 == 5 || $statusF39 == 5 || $statusF7 == 5 || $statusF5 == 5 || $statusF35 == 5 ||
    $statusF29 == 5 || $statusF42 == 5 || $statusF41 == 5 || $statusF34 == 5 || $statusF24 == 5 || $statusF28 == 5 || $statusF33 == 5 || $statusF27 == 5 || $statusF38 == 5 ||
    $statusF40 == 5 || $statusF32 == 5 || $statusF26 == 5 || $statusF1 == 5) {
      $lgc_forno = 5;
    } elseif ($statusF23 == 4 || $statusF17 == 4 || $statusF22 == 4 || $statusF16 == 4 || $statusF11 == 4 || $statusF21 == 4 || $statusF15 == 4 || $statusF58 == 4 || $statusF20 == 4 ||
    $statusF14 == 4 || $statusF10 == 4 || $statusF57 == 4 || $statusF19 == 4 || $statusF13 == 4 || $statusF18 == 4 || $statusF12 == 4 || $statusF53 == 4 || $statusF45 == 4 ||
    $statusF49 == 4 || $statusF52 == 4 || $statusF48 == 4 || $statusF56 == 4 || $statusF55 == 4 || $statusF51 == 4 || $statusF47 == 4 || $statusF4 == 4 || $statusF50 == 4 ||
    $statusF44 == 4 || $statusF46 == 4 || $statusF54 == 4 || $statusF6 == 4 || $statusF8 == 4 || $statusF37 == 4 || $statusF25 == 4 || $statusF31 == 4 || $statusF43 == 4 ||
    $statusF9 == 4 || $statusF3 == 4 || $statusF2 == 4 || $statusF36 == 4 || $statusF30 == 4 || $statusF39 == 4 || $statusF7 == 4 || $statusF5 == 4 || $statusF35 == 4 ||
    $statusF29 == 4 || $statusF42 == 4 || $statusF41 == 4 || $statusF34 == 4 || $statusF24 == 4 || $statusF28 == 4 || $statusF33 == 4 || $statusF27 == 4 || $statusF38 == 4 ||
    $statusF40 == 4 || $statusF32 == 4 || $statusF26 == 4 || $statusF1 == 4) {
      $lgc_forno = 4;
    } elseif ($statusF23 == 3 || $statusF17 == 3 || $statusF22 == 3 || $statusF16 == 3 || $statusF11 == 3 || $statusF21 == 3 || $statusF15 == 3 || $statusF58 == 3 || $statusF20 == 3 ||
    $statusF14 == 3 || $statusF10 == 3 || $statusF57 == 3 || $statusF19 == 3 || $statusF13 == 3 || $statusF18 == 3 || $statusF12 == 3 || $statusF53 == 3 || $statusF45 == 3 ||
    $statusF49 == 3 || $statusF52 == 3 || $statusF48 == 3 || $statusF56 == 3 || $statusF55 == 3 || $statusF51 == 3 || $statusF47 == 3 || $statusF4 == 3 || $statusF50 == 3 ||
    $statusF44 == 3 || $statusF46 == 3 || $statusF54 == 3 || $statusF6 == 3 || $statusF8 == 3 || $statusF37 == 3 || $statusF25 == 3 || $statusF31 == 3 || $statusF43 == 3 ||
    $statusF9 == 3 || $statusF3 == 3 || $statusF2 == 3 || $statusF36 == 3 || $statusF30 == 3 || $statusF39 == 3 || $statusF7 == 3 || $statusF5 == 3 || $statusF35 == 3 ||
    $statusF29 == 3 || $statusF42 == 3 || $statusF41 == 3 || $statusF34 == 3 || $statusF24 == 3 || $statusF28 == 3 || $statusF33 == 3 || $statusF27 == 3 || $statusF38 == 3 ||
    $statusF40 == 3 || $statusF32 == 3 || $statusF26 == 3 || $statusF1 == 3) {
      $lgc_forno = 3;
    }  else {
      $lgc_forno = "";
    }

    return $lgc_forno;
  }

  public static function lgc_Menu() {
    $lgc_menu = "";
    $lgc_forno_Menu = AuxFuncRelTec::lgc_forno_Menu();

    if ($lgc_forno_Menu == 5) {
      $lgc_menu = 5;
    } elseif ($lgc_forno_Menu == 4) {
      $lgc_menu = 4;
    } elseif ($lgc_forno_Menu == 3) {
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
    $lgc_normal = aux::GeralPorLinhaTR($atual1, 3, $lgc_linha1, $lgc_linha2);
    return $lgc_normal;
  }
  public static function lgc_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_alarme = aux::GeralPorLinhaTR($atual1, 4, $lgc_linha1, $lgc_linha2);
    return $lgc_alarme;
  }
  public static function lgc_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;
    $lgc_critico = aux::GeralPorLinhaTR($atual1, 5, $lgc_linha1, $lgc_linha2);
    return $lgc_critico;
  }

  public static function lpc_caldeira01() {

    $lpc_caldeira01 = "";

    $tag_pintura_C6 = "TR 72 500 510 152 070 - 000006";
    $idAtividadePC6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_C6)->value('id');
    $idAnalisePC6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC6)->max('id');
    $idLaudoPC6 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC6)->value('id');
    $statusPC6 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC6)->value('status_id');

    $tag_pintura_C3 = "TR 72 500 510 152 070 - 000003";
    $idAtividadePC3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_C3)->value('id');
    $idAnalisePC3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC3)->max('id');
    $idLaudoPC3 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC3)->value('id');
    $statusPC3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC3)->value('status_id');

    $tag_pintura_C5 = "TR 72 500 510 152 070 - 000005";
    $idAtividadePC5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_C5)->value('id');
    $idAnalisePC5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC5)->max('id');
    $idLaudoPC5 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC5)->value('id');
    $statusPC5 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC5)->value('status_id');

    $tag_pintura_C4 = "TR 72 500 510 152 070 - 000004";
    $idAtividadePC4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_C4)->value('id');
    $idAnalisePC4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC4)->max('id');
    $idLaudoPC4 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC4)->value('id');
    $statusPC4 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC4)->value('status_id');

    $tag_pintura_C2 = "TR 72 500 510 152 070 - 000002";
    $idAtividadePC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_C2)->value('id');
    $idAnalisePC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC2)->max('id');
    $idLaudoPC2 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC2)->value('id');
    $statusPC2 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC2)->value('status_id');

    $tag_pintura_C1 = "TR 72 500 510 152 070 - 000001";
    $idAtividadePC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_C1)->value('id');
    $idAnalisePC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC1)->max('id');
    $idLaudoPC1 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC1)->value('id');
    $statusPC1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC1)->value('status_id');

    if ($statusPC6 == 5 || $statusPC3 == 5 || $statusPC5 == 5 || $statusPC4 == 5 || $statusPC2 == 5 || $statusPC1 == 5) {
      $lpc_caldeira01 = 5;
    } elseif ($statusPC6 == 4 || $statusPC3 == 4 || $statusPC5 == 4 || $statusPC4 == 4 || $statusPC2 == 4 || $statusPC1 == 4) {
      $lpc_caldeira01 = 4;
    } elseif ($statusPC6 == 3 || $statusPC3 == 3 || $statusPC5 == 3 || $statusPC4 == 3 || $statusPC2 == 3 || $statusPC1 == 3) {
      $lpc_caldeira01 = 3;
    } else {
      $lpc_caldeira01 = "";
    }

    return $lpc_caldeira01;
  }

  public static function lpc_oxidizer() {

    $lpc_oxidizer = "";

    $tag_pintura_OX18 = "TR 72 500 510 326 016 - 000005";
    $idAtividadeOX18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX18)->value('id');
    $idAnaliseOX18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX18)->max('id');
    $statusOX18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX18)->value('status_id');

    $tag_pintura_OX9 = "TR 72 500 510 326 016 - 000002";
    $idAtividadeOX9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX9)->value('id');
    $idAnaliseOX9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX9)->max('id');
    $statusOX9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX9)->value('status_id');

    $tag_pintura_OX13 = "TR 72 500 510 326 013 - 000007";
    $idAtividadeOX13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX13)->value('id');
    $idAnaliseOX13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX13)->max('id');
    $statusOX13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX13)->value('status_id');

    $tag_pintura_OX14 = "TR 72 500 510 326 025 - 000003";
    $idAtividadeOX14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX14)->value('id');
    $idAnaliseOX14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX14)->max('id');
    $statusOX14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX14)->value('status_id');

    $tag_pintura_OX17 = "TR 72 500 510 326 016 - 000004";
    $idAtividadeOX17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX17)->value('id');
    $idAnaliseOX17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX17)->max('id');
    $statusOX17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX17)->value('status_id');

    $tag_pintura_OX11 = "TR 72 500 510 326 025 - 000001";
    $idAtividadeOX11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX11)->value('id');
    $idAnaliseOX11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX11)->max('id');
    $statusOX11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX11)->value('status_id');

    $tag_pintura_OX16 = "TR 72 500 510 326 025 - 000005";
    $idAtividadeOX16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX16)->value('id');
    $idAnaliseOX16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX16)->max('id');
    $statusOX16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX16)->value('status_id');

    $tag_pintura_OX28 = "TR 72 500 510 326 022 - 000003";
    $idAtividadeOX28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX28)->value('id');
    $idAnaliseOX28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX28)->max('id');
    $statusOX28 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX28)->value('status_id');

    $tag_pintura_OX8 = "TR 72 500 510 326 022 - 000001";
    $idAtividadeOX8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX8)->value('id');
    $idAnaliseOX8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX8)->max('id');
    $statusOX8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX8)->value('status_id');

    $tag_pintura_OX7 = "TR 72 500 510 326 016 - 000001";
    $idAtividadeOX7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX7)->value('id');
    $idAnaliseOX7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX7)->max('id');
    $statusOX7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX7)->value('status_id');

    $tag_pintura_OX10 = "TR 72 500 510 326 016 - 000003";
    $idAtividadeOX10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX10)->value('id');
    $idAnaliseOX10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX10)->max('id');
    $statusOX10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX10)->value('status_id');

    $tag_pintura_OX12 = "TR 72 500 510 326 025 - 000002";
    $idAtividadeOX12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX12)->value('id');
    $idAnaliseOX12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX12)->max('id');
    $statusOX12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX12)->value('status_id');

    $tag_pintura_OX6 = "TR 72 500 510 326 013 - 000006";
    $idAtividadeOX6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX6)->value('id');
    $idAnaliseOX6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX6)->max('id');
    $statusOX6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX6)->value('status_id');

    $tag_pintura_OX5 = "TR 72 500 510 326 013 - 000005";
    $idAtividadeOX5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX5)->value('id');
    $idAnaliseOX5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX5)->max('id');
    $statusOX5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX5)->value('status_id');

    $tag_pintura_OX21 = "TR 72 500 510 326 019 - 000002";
    $idAtividadeOX21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX21)->value('id');
    $idAnaliseOX21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX21)->max('id');
    $statusOX21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX21)->value('status_id');

    $tag_pintura_OX20 = "TR 72 500 510 326 019 - 000001";
    $idAtividadeOX20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX20)->value('id');
    $idAnaliseOX20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX20)->max('id');
    $statusOX20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX20)->value('status_id');

    $tag_pintura_OX15 = "TR 72 500 510 326 025 - 000004";
    $idAtividadeOX15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX15)->value('id');
    $idAnaliseOX15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX15)->max('id');
    $statusOX15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX15)->value('status_id');

    $tag_pintura_OX19 = "TR 72 500 510 326 025 - 000006";
    $idAtividadeOX19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX19)->value('id');
    $idAnaliseOX19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX19)->max('id');
    $statusOX19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX19)->value('status_id');

    $tag_pintura_OX25 = "TR 72 500 510 326 025 - 000007";
    $idAtividadeOX25 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX25)->value('id');
    $idAnaliseOX25 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX25)->max('id');
    $statusOX25 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX25)->value('status_id');

    $tag_pintura_OX23 = "TR 72 500 510 326 019 - 000004";
    $idAtividadeOX23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX23)->value('id');
    $idAnaliseOX23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX23)->max('id');
    $statusOX23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX23)->value('status_id');

    $tag_pintura_OX22 = "TR 72 500 510 326 019 - 000003";
    $idAtividadeOX22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX22)->value('id');
    $idAnaliseOX22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX22)->max('id');
    $statusOX22 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX22)->value('status_id');

    $tag_pintura_OX26 = "TR 72 500 510 326 025 - 000008";
    $idAtividadeOX26 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX26)->value('id');
    $idAnaliseOX26 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX26)->max('id');
    $statusOX26 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX26)->value('status_id');

    $tag_pintura_OX4 = "TR 72 500 510 326 013 - 000004";
    $idAtividadeOX4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX4)->value('id');
    $idAnaliseOX4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX4)->max('id');
    $statusOX4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX4)->value('status_id');

    $tag_pintura_OX3 = "TR 72 500 510 326 013 - 000003";
    $idAtividadeOX3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX3)->value('id');
    $idAnaliseOX3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX3)->max('id');
    $statusOX3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX3)->value('status_id');

    $tag_pintura_OX2 = "TR 72 500 510 326 013 - 000002";
    $idAtividadeOX2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX2)->value('id');
    $idAnaliseOX2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX2)->max('id');
    $statusOX2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX2)->value('status_id');

    $tag_pintura_OX1 = "TR 72 500 510 326 000 - 000001";
    $idAtividadeOX1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX1)->value('id');
    $idAnaliseOX1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX1)->max('id');
    $statusOX1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX1)->value('status_id');

    $tag_pintura_OX24 = "TR 72 500 510 326 016 - 000006";
    $idAtividadeOX24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX24)->value('id');
    $idAnaliseOX24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX24)->max('id');
    $statusOX24 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX24)->value('status_id');

    $tag_pintura_OX27 = "TR 72 500 510 326 022 - 000002";
    $idAtividadeOX27 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX27)->value('id');
    $idAnaliseOX27 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX27)->max('id');
    $statusOX27 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX27)->value('status_id');

    if ($statusOX18 == 5 || $statusOX9 == 5 || $statusOX13 == 5 || $statusOX14 == 5 || $statusOX17 == 5 || $statusOX11 == 5 ||
    $statusOX16 == 5 || $statusOX28 == 5 || $statusOX8 == 5 || $statusOX7 == 5 || $statusOX10 == 5 || $statusOX12 == 5 ||
    $statusOX6 == 5 || $statusOX5 == 5 || $statusOX21 == 5 || $statusOX20 == 5 || $statusOX15 == 5 || $statusOX19 == 5 ||
    $statusOX25 == 5 || $statusOX23 == 5 || $statusOX22 == 5 || $statusOX26 == 5 || $statusOX4 == 5 || $statusOX3 == 5 ||
    $statusOX2 == 5 || $statusOX1 == 5 || $statusOX24 == 5 || $statusOX27 == 5) {
      $lpc_oxidizer = 5;
    } elseif ($statusOX18 == 4 || $statusOX9 == 4 || $statusOX13 == 4 || $statusOX14 == 4 || $statusOX17 == 4 || $statusOX11 == 4 ||
    $statusOX16 == 4 || $statusOX28 == 4 || $statusOX8 == 4 || $statusOX7 == 4 || $statusOX10 == 4 || $statusOX12 == 4 ||
    $statusOX6 == 4 || $statusOX5 == 4 || $statusOX21 == 4 || $statusOX20 == 4 || $statusOX15 == 4 || $statusOX19 == 4 ||
    $statusOX25 == 4 || $statusOX23 == 4 || $statusOX22 == 4 || $statusOX26 == 4 || $statusOX4 == 4 || $statusOX3 == 4 ||
    $statusOX2 == 4 || $statusOX1 == 4 || $statusOX24 == 4 || $statusOX27 == 4) {
      $lpc_oxidizer = 4;
    } elseif ($statusOX18 == 3 || $statusOX9 == 3 || $statusOX13 == 3 || $statusOX14 == 3 || $statusOX17 == 3 || $statusOX11 == 3 ||
    $statusOX16 == 3 || $statusOX28 == 3 || $statusOX8 == 3 || $statusOX7 == 3 || $statusOX10 == 3 || $statusOX12 == 3 ||
    $statusOX6 == 3 || $statusOX5 == 3 || $statusOX21 == 3 || $statusOX20 == 3 || $statusOX15 == 3 || $statusOX19 == 3 ||
    $statusOX25 == 3 || $statusOX23 == 3 || $statusOX22 == 3 || $statusOX26 == 3 || $statusOX4 == 3 || $statusOX3 == 3 ||
    $statusOX2 == 3 || $statusOX1 == 3 || $statusOX24 == 3 || $statusOX27 == 3) {
      $lpc_oxidizer = 3;
    } else {
      $lpc_oxidizer = "";
    }

    return $lpc_oxidizer;
  }

  public static function lpc_oxi_tubulacao() {

    $lpc_oxi_tubulacao = "";

    $tag_pintura_OX35 = "TR 72 500 510 326 022 - 000010";
    $idAtividadeOX35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX35)->value('id');
    $idAnaliseOX35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX35)->max('id');
    $statusOX35 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX35)->value('status_id');

    $tag_pintura_OX36 = "TR 72 500 510 326 022 - 000011";
    $idAtividadeOX36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX36)->value('id');
    $idAnaliseOX36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX36)->max('id');
    $statusOX36 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX36)->value('status_id');

    $tag_pintura_OX37 = "TR 72 500 510 326 022 - 000012";
    $idAtividadeOX37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX37)->value('id');
    $idAnaliseOX37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX37)->max('id');
    $statusOX37 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX37)->value('status_id');

    $tag_pintura_OX38 = "TR 72 500 510 326 022 - 000013";
    $idAtividadeOX38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX38)->value('id');
    $idAnaliseOX38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX38)->max('id');
    $statusOX38 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX38)->value('status_id');

    $tag_pintura_OX39 = "TR 72 500 510 326 022 - 000014";
    $idAtividadeOX39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX39)->value('id');
    $idAnaliseOX39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX39)->max('id');
    $statusOX39 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX39)->value('status_id');

    $tag_pintura_OX40 = "TR 72 500 510 326 022 - 000015";
    $idAtividadeOX40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX40)->value('id');
    $idAnaliseOX40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX40)->max('id');
    $statusOX40 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX40)->value('status_id');

    $tag_pintura_OX41 = "TR 72 500 510 326 022 - 000016";
    $idAtividadeOX41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX41)->value('id');
    $idAnaliseOX41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX41)->max('id');
    $statusOX41 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX41)->value('status_id');

    $tag_pintura_OX42 = "TR 72 500 510 326 022 - 000017";
    $idAtividadeOX42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX42)->value('id');
    $idAnaliseOX42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX42)->max('id');
    $statusOX42 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX42)->value('status_id');

    $tag_pintura_OX34 = "TR 72 500 510 326 022 - 000009";
    $idAtividadeOX34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX34)->value('id');
    $idAnaliseOX34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX34)->max('id');
    $statusOX34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX34)->value('status_id');

    $tag_pintura_OX33 = "TR 72 500 510 326 022 - 000008";
    $idAtividadeOX33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX33)->value('id');
    $idAnaliseOX33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX33)->max('id');
    $statusOX33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX33)->value('status_id');

    $tag_pintura_OX32 = "TR 72 500 510 326 022 - 000007";
    $idAtividadeOX32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX32)->value('id');
    $idAnaliseOX32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX32)->max('id');
    $statusOX32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX32)->value('status_id');

    $tag_pintura_OX31 = "TR 72 500 510 326 022 - 000006";
    $idAtividadeOX31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX31)->value('id');
    $idAnaliseOX31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX31)->max('id');
    $statusOX31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX31)->value('status_id');

    $tag_pintura_OX30 = "TR 72 500 510 326 022 - 000005";
    $idAtividadeOX30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX30)->value('id');
    $idAnaliseOX30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX30)->max('id');
    $statusOX30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX30)->value('status_id');

    $tag_pintura_OX29 = "TR 72 500 510 326 022 - 000004";
    $idAtividadeOX29 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX29)->value('id');
    $idAnaliseOX29 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX29)->max('id');
    $statusOX29 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX29)->value('status_id');

    if ($statusOX35 == 5 || $statusOX36 == 5 || $statusOX37 == 5 || $statusOX38 == 5 || $statusOX39 == 5 || $statusOX40 == 5 || $statusOX41 == 5 ||
    $statusOX42 == 5 || $statusOX34 == 5 || $statusOX33 == 5 || $statusOX32 == 5 || $statusOX31 == 5 || $statusOX30 == 5 || $statusOX29 == 5) {
      $lpc_oxi_tubulacao = 5;
    } elseif ($statusOX35 == 4 || $statusOX36 == 4 || $statusOX37 == 4 || $statusOX38 == 4 || $statusOX39 == 4 || $statusOX40 == 4 || $statusOX41 == 4 ||
    $statusOX42 == 4 || $statusOX34 == 4 || $statusOX33 == 4 || $statusOX32 == 4 || $statusOX31 == 4 || $statusOX30 == 4 || $statusOX29 == 4) {
      $lpc_oxi_tubulacao = 4;
    }elseif ($statusOX35 == 3 || $statusOX36 == 3 || $statusOX37 == 3 || $statusOX38 == 3 || $statusOX39 == 3 || $statusOX40 == 3 || $statusOX41 == 3 ||
    $statusOX42 == 3 || $statusOX34 == 3 || $statusOX33 == 3 || $statusOX32 == 3 || $statusOX31 == 3 || $statusOX30 == 3 || $statusOX29 == 3) {
      $lpc_oxi_tubulacao = 3;
    }else {
      $lpc_oxi_tubulacao = "";
    }

    return $lpc_oxi_tubulacao;
  }

  public static function lpc_prime() {

    $lpc_prime = "";

    $tag_pintura_ESTP51 = "TR 72 500 510 172 004 - 000051";
    $idAtividadeESTP51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP51)->value('id');
    $idAnaliseESTP51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP51)->max('id');
    $statusESTP51 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP51)->value('status_id');

    $tag_pintura_ESTP37 = "TR 72 500 510 172 004 - 000037";
    $idAtividadeESTP37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP37)->value('id');
    $idAnaliseESTP37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP37)->max('id');
    $statusESTP37 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP37)->value('status_id');

    $tag_pintura_ESTP23 = "TR 72 500 510 172 004 - 000023";
    $idAtividadeESTP23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP23)->value('id');
    $idAnaliseESTP23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP23)->max('id');
    $statusESTP23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP23)->value('status_id');

    $tag_pintura_ESTP8 = "TR 72 500 510 172 004 - 000008";
    $idAtividadeESTP8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP8)->value('id');
    $idAnaliseESTP8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP8)->max('id');
    $statusESTP8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP8)->value('status_id');

    $tag_pintura_ESTP58 = "TR 72 500 510 172 004 - 000058";
    $idAtividadeESTP58 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP58)->value('id');
    $idAnaliseESTP58 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP58)->max('id');
    $statusESTP58 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP58)->value('status_id');

    $tag_pintura_ESTP55 = "TR 72 500 510 172 004 - 000055";
    $idAtividadeESTP55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP55)->value('id');
    $idAnaliseESTP55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP55)->max('id');
    $statusESTP55 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP55)->value('status_id');

    $tag_pintura_ESTP45 = "TR 72 500 510 172 004 - 000045";
    $idAtividadeESTP45 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP45)->value('id');
    $idAnaliseESTP45 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP45)->max('id');
    $statusESTP45 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP45)->value('status_id');

    $tag_pintura_ESTP41 = "TR 72 500 510 172 004 - 000041";
    $idAtividadeESTP41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP41)->value('id');
    $idAnaliseESTP41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP41)->max('id');
    $statusESTP41 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP41)->value('status_id');

    $tag_pintura_ESTP31 = "TR 72 500 510 172 004 - 000031";
    $idAtividadeESTP31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP31)->value('id');
    $idAnaliseESTP31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP31)->max('id');
    $statusESTP31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP31)->value('status_id');

    $tag_pintura_ESTP27 = "TR 72 500 510 172 004 - 000027";
    $idAtividadeESTP27 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP27)->value('id');
    $idAnaliseESTP27 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP27)->max('id');
    $statusESTP27 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP27)->value('status_id');

    $tag_pintura_ESTP17 = "TR 72 500 510 172 004 - 000017";
    $idAtividadeESTP17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP17)->value('id');
    $idAnaliseESTP17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP17)->max('id');
    $statusESTP17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP17)->value('status_id');

    $tag_pintura_ESTP3 = "TR 72 500 510 172 004 - 000003";
    $idAtividadeESTP3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP3)->value('id');
    $idAnaliseESTP3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP3)->max('id');
    $statusESTP3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP3)->value('status_id');

    $tag_pintura_ESTP15 = "TR 72 500 510 172 004 - 000015";
    $idAtividadeESTP15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP15)->value('id');
    $idAnaliseESTP15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP15)->max('id');
    $statusESTP15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP15)->value('status_id');

    $tag_pintura_ESTP13 = "TR 72 500 510 172 004 - 000013";
    $idAtividadeESTP13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP13)->value('id');
    $idAnaliseESTP13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP13)->max('id');
    $statusESTP13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP13)->value('status_id');

    $tag_pintura_ESTP56 = "TR 72 500 510 172 004 - 000056";
    $idAtividadeESTP56 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP56)->value('id');
    $idAnaliseESTP56 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP56)->max('id');
    $statusESTP56 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP56)->value('status_id');

    $tag_pintura_ESTP46 = "TR 72 500 510 172 004 - 000046";
    $idAtividadeESTP46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP46)->value('id');
    $idAnaliseESTP46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP46)->max('id');
    $statusESTP46 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP46)->value('status_id');

    $tag_pintura_ESTP42 = "TR 72 500 510 172 004 - 000042";
    $idAtividadeESTP42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP42)->value('id');
    $idAnaliseESTP42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP42)->max('id');
    $statusESTP42 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP42)->value('status_id');

    $tag_pintura_ESTP32 = "TR 72 500 510 172 004 - 000032";
    $idAtividadeESTP32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP32)->value('id');
    $idAnaliseESTP32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP32)->max('id');
    $statusESTP32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP32)->value('status_id');

    $tag_pintura_ESTP28 = "TR 72 500 510 172 004 - 000028";
    $idAtividadeESTP28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP28)->value('id');
    $idAnaliseESTP28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP28)->max('id');
    $statusESTP28 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP28)->value('status_id');

    $tag_pintura_ESTP18 = "TR 72 500 510 172 004 - 000018";
    $idAtividadeESTP18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP18)->value('id');
    $idAnaliseESTP18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP18)->max('id');
    $statusESTP18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP18)->value('status_id');

    $tag_pintura_ESTP12 = "TR 72 500 510 172 004 - 000012";
    $idAtividadeESTP12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP12)->value('id');
    $idAnaliseESTP12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP12)->max('id');
    $statusESTP12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP12)->value('status_id');

    $tag_pintura_ESTP4 = "TR 72 500 510 172 004 - 000004";
    $idAtividadeESTP4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP4)->value('id');
    $idAnaliseESTP4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP4)->max('id');
    $statusESTP4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP4)->value('status_id');

    $tag_pintura_ESTP57 = "TR 72 500 510 172 004 - 000057";
    $idAtividadeESTP57 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP57)->value('id');
    $idAnaliseESTP57 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP57)->max('id');
    $statusESTP57 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP57)->value('status_id');

    $tag_pintura_ESTP44 = "TR 72 500 510 172 004 - 000044";
    $idAtividadeESTP44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP44)->value('id');
    $idAnaliseESTP44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP44)->max('id');
    $statusESTP44 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP44)->value('status_id');

    $tag_pintura_ESTP43 = "TR 72 500 510 172 004 - 000043";
    $idAtividadeESTP43 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP43)->value('id');
    $idAnaliseESTP43 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP43)->max('id');
    $statusESTP43 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP43)->value('status_id');

    $tag_pintura_ESTP30 = "TR 72 500 510 172 004 - 000030";
    $idAtividadeESTP30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP30)->value('id');
    $idAnaliseESTP30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP30)->max('id');
    $statusESTP30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP30)->value('status_id');

    $tag_pintura_ESTP29 = "TR 72 500 510 172 004 - 000029";
    $idAtividadeESTP29 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP29)->value('id');
    $idAnaliseESTP29 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP29)->max('id');
    $statusESTP29 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP29)->value('status_id');

    $tag_pintura_ESTP16 = "TR 72 500 510 172 004 - 000016";
    $idAtividadeESTP16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP16)->value('id');
    $idAnaliseESTP16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP16)->max('id');
    $statusESTP16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP16)->value('status_id');

    $tag_pintura_ESTP14 = "TR 72 500 510 172 004 - 000014";
    $idAtividadeESTP14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP14)->value('id');
    $idAnaliseESTP14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP14)->max('id');
    $statusESTP14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP14)->value('status_id');

    $tag_pintura_ESTP1 = "TR 72 500 510 172 004 - 000001";
    $idAtividadeESTP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP1)->value('id');
    $idAnaliseESTP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP1)->max('id');
    $statusESTP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP1)->value('status_id');

    $tag_pintura_ESTP54 = "TR 72 500 510 172 004 - 000054";
    $idAtividadeESTP54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP54)->value('id');
    $idAnaliseESTP54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP54)->max('id');
    $statusESTP54 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP54)->value('status_id');

    $tag_pintura_ESTP52 = "TR 72 500 510 172 004 - 000052";
    $idAtividadeESTP52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP52)->value('id');
    $idAnaliseESTP52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP52)->max('id');
    $statusESTP52 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP52)->value('status_id');

    $tag_pintura_ESTP48 = "TR 72 500 510 172 004 - 000048";
    $idAtividadeESTP48 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP48)->value('id');
    $idAnaliseESTP48 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP48)->max('id');
    $statusESTP48 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP48)->value('status_id');

    $tag_pintura_ESTP47 = "TR 72 500 510 172 004 - 000047";
    $idAtividadeESTP47 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP47)->value('id');
    $idAnaliseESTP47 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP47)->max('id');
    $statusESTP47 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP47)->value('status_id');

    $tag_pintura_ESTP40 = "TR 72 500 510 172 004 - 000040";
    $idAtividadeESTP40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP40)->value('id');
    $idAnaliseESTP40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP40)->max('id');
    $statusESTP40 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP40)->value('status_id');

    $tag_pintura_ESTP38 = "TR 72 500 510 172 004 - 000038";
    $idAtividadeESTP38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP38)->value('id');
    $idAnaliseESTP38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP38)->max('id');
    $statusESTP38 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP38)->value('status_id');

    $tag_pintura_ESTP34 = "TR 72 500 510 172 004 - 000034";
    $idAtividadeESTP34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP34)->value('id');
    $idAnaliseESTP34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP34)->max('id');
    $statusESTP34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP34)->value('status_id');

    $tag_pintura_ESTP33 = "TR 72 500 510 172 004 - 000033";
    $idAtividadeESTP33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP33)->value('id');
    $idAnaliseESTP33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP33)->max('id');
    $statusESTP33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP33)->value('status_id');

    $tag_pintura_ESTP26 = "TR 72 500 510 172 004 - 000026";
    $idAtividadeESTP26 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP26)->value('id');
    $idAnaliseESTP26 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP26)->max('id');
    $statusESTP26 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP26)->value('status_id');

    $tag_pintura_ESTP24 = "TR 72 500 510 172 004 - 000024";
    $idAtividadeESTP24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP24)->value('id');
    $idAnaliseESTP24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP24)->max('id');
    $statusESTP24 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP24)->value('status_id');

    $tag_pintura_ESTP20 = "TR 72 500 510 172 004 - 000020";
    $idAtividadeESTP20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP20)->value('id');
    $idAnaliseESTP20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP20)->max('id');
    $statusESTP20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP20)->value('status_id');

    $tag_pintura_ESTP19 = "TR 72 500 510 172 004 - 000019";
    $idAtividadeESTP19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP19)->value('id');
    $idAnaliseESTP19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP19)->max('id');
    $statusESTP19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP19)->value('status_id');

    $tag_pintura_ESTP11 = "TR 72 500 510 172 004 - 000011";
    $idAtividadeESTP11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP11)->value('id');
    $idAnaliseESTP11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP11)->max('id');
    $statusESTP11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP11)->value('status_id');

    $tag_pintura_ESTP9 = "TR 72 500 510 172 004 - 000009";
    $idAtividadeESTP9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP9)->value('id');
    $idAnaliseESTP9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP9)->max('id');
    $statusESTP9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP9)->value('status_id');

    $tag_pintura_ESTP5 = "TR 72 500 510 172 004 - 000005";
    $idAtividadeESTP5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP5)->value('id');
    $idAnaliseESTP5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP5)->max('id');
    $statusESTP5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP5  )->value('status_id');

    $tag_pintura_ESTP2 = "TR 72 500 510 172 004 - 000002";
    $idAtividadeESTP2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP2)->value('id');
    $idAnaliseESTP2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP2)->max('id');
    $statusESTP2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP2)->value('status_id');

    $tag_pintura_ESTP53 = "TR 72 500 510 172 004 - 000053";
    $idAtividadeESTP53 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP53)->value('id');
    $idAnaliseESTP53 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP53)->max('id');
    $statusESTP53 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP53)->value('status_id');

    $tag_pintura_ESTP49 = "TR 72 500 510 172 004 - 000049";
    $idAtividadeESTP49 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP49)->value('id');
    $idAnaliseESTP49 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP49)->max('id');
    $statusESTP49 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP49)->value('status_id');

    $tag_pintura_ESTP39 = "TR 72 500 510 172 004 - 000039";
    $idAtividadeESTP39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP39)->value('id');
    $idAnaliseESTP39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP39)->max('id');
    $statusESTP39 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP39)->value('status_id');

    $tag_pintura_ESTP35 = "TR 72 500 510 172 004 - 000035";
    $idAtividadeESTP35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP35)->value('id');
    $idAnaliseESTP35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP35)->max('id');
    $statusESTP35 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP35)->value('status_id');

    $tag_pintura_ESTP25 = "TR 72 500 510 172 004 - 000025";
    $idAtividadeESTP25 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP25)->value('id');
    $idAnaliseESTP25 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP25)->max('id');
    $statusESTP25 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP25)->value('status_id');

    $tag_pintura_ESTP21 = "TR 72 500 510 172 004 - 000021";
    $idAtividadeESTP21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP21)->value('id');
    $idAnaliseESTP21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP21)->max('id');
    $statusESTP21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP21)->value('status_id');

    $tag_pintura_ESTP10 = "TR 72 500 510 172 004 - 000010";
    $idAtividadeESTP10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP10)->value('id');
    $idAnaliseESTP10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP10)->max('id');
    $statusESTP10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP10)->value('status_id');

    $tag_pintura_ESTP6 = "TR 72 500 510 172 004 - 000006";
    $idAtividadeESTP6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP6)->value('id');
    $idAnaliseESTP6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP6)->max('id');
    $statusESTP6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP6)->value('status_id');

    $tag_pintura_ESTP50 = "TR 72 500 510 172 004 - 000050";
    $idAtividadeESTP50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP50)->value('id');
    $idAnaliseESTP50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP50)->max('id');
    $statusESTP50 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP50)->value('status_id');

    $tag_pintura_ESTP36 = "TR 72 500 510 172 004 - 000036";
    $idAtividadeESTP36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP36)->value('id');
    $idAnaliseESTP36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP36)->max('id');
    $statusESTP36 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP36)->value('status_id');

    $tag_pintura_ESTP22 = "TR 72 500 510 172 004 - 000022";
    $idAtividadeESTP22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP22)->value('id');
    $idAnaliseESTP22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP22)->max('id');
    $statusESTP22 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP22)->value('status_id');

    $tag_pintura_ESTP7 = "TR 72 500 510 172 004 - 000007";
    $idAtividadeESTP7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP7)->value('id');
    $idAnaliseESTP7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP7)->max('id');
    $statusESTP7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP7)->value('status_id');
    if ($statusESTP51 == 5 || $statusESTP37 == 5 || $statusESTP23 == 5 || $statusESTP8 == 5 || $statusESTP58 == 5 ||
    $statusESTP55 == 5 || $statusESTP45 == 5 || $statusESTP41 == 5 || $statusESTP31 == 5 || $statusESTP27 == 5 ||
    $statusESTP17 == 5 || $statusESTP3 == 5 || $statusESTP15 == 5 || $statusESTP13 == 5 || $statusESTP56 == 5 ||
    $statusESTP46 == 5 || $statusESTP42 == 5 || $statusESTP32 == 5 || $statusESTP28 == 5 || $statusESTP18 == 5 ||
    $statusESTP12 == 5 || $statusESTP4 == 5 || $statusESTP57 == 5 || $statusESTP44 == 5 || $statusESTP43 == 5 ||
    $statusESTP30 == 5 || $statusESTP29 == 5 || $statusESTP16 == 5 || $statusESTP14 == 5 || $statusESTP1 == 5 ||
    $statusESTP54 == 5 || $statusESTP52 == 5 || $statusESTP48 == 5 || $statusESTP47 == 5 || $statusESTP40 == 5 ||
    $statusESTP38 == 5 || $statusESTP34 == 5 || $statusESTP33 == 5 || $statusESTP26 == 5 || $statusESTP24 == 5 ||
    $statusESTP20 == 5 || $statusESTP19 == 5 || $statusESTP11 == 5 || $statusESTP9 == 5 || $statusESTP5 == 5 ||
    $statusESTP2 == 5 || $statusESTP53 == 5 || $statusESTP49 == 5 || $statusESTP39 == 5 || $statusESTP35 == 5 ||
    $statusESTP25 == 5 || $statusESTP21 == 5 || $statusESTP10 == 5 || $statusESTP6 == 5 || $statusESTP50 == 5 ||
    $statusESTP36 == 5 || $statusESTP22 == 5 || $statusESTP7 == 5) {
      $lpc_prime = 5;
    } elseif ($statusESTP51 == 4 || $statusESTP37 == 4 || $statusESTP23 == 4 || $statusESTP8 == 4 || $statusESTP58 == 4 ||
    $statusESTP55 == 4 || $statusESTP45 == 4 || $statusESTP41 == 4 || $statusESTP31 == 4 || $statusESTP27 == 4 ||
    $statusESTP17 == 4 || $statusESTP3 == 4 || $statusESTP15 == 4 || $statusESTP13 == 4 || $statusESTP56 == 4 ||
    $statusESTP46 == 4 || $statusESTP42 == 4 || $statusESTP32 == 4 || $statusESTP28 == 4 || $statusESTP18 == 4 ||
    $statusESTP12 == 4 || $statusESTP4 == 4 || $statusESTP57 == 4 || $statusESTP44 == 4 || $statusESTP43 == 4 ||
    $statusESTP30 == 4 || $statusESTP29 == 4 || $statusESTP16 == 4 || $statusESTP14 == 4 || $statusESTP1 == 4 ||
    $statusESTP54 == 4 || $statusESTP52 == 4 || $statusESTP48 == 4 || $statusESTP47 == 4 || $statusESTP40 == 4 ||
    $statusESTP38 == 4 || $statusESTP34 == 4 || $statusESTP33 == 4 || $statusESTP26 == 4 || $statusESTP24 == 4 ||
    $statusESTP20 == 4 || $statusESTP19 == 4 || $statusESTP11 == 4 || $statusESTP9 == 4 || $statusESTP5 == 4 ||
    $statusESTP2 == 4 || $statusESTP53 == 4 || $statusESTP49 == 4 || $statusESTP39 == 4 || $statusESTP35 == 4 ||
    $statusESTP25 == 4 || $statusESTP21 == 4 || $statusESTP10 == 4 || $statusESTP6 == 4 || $statusESTP50 == 4 ||
    $statusESTP36 == 4 || $statusESTP22 == 4 || $statusESTP7 == 4) {
      $lpc_prime = 4;
    } elseif ($statusESTP51 == 3 || $statusESTP37 == 3 || $statusESTP23 == 3 || $statusESTP8 == 3 || $statusESTP58 == 3 ||
    $statusESTP55 == 3 || $statusESTP45 == 3 || $statusESTP41 == 3 || $statusESTP31 == 3 || $statusESTP27 == 3 ||
    $statusESTP17 == 3 || $statusESTP3 == 3 || $statusESTP15 == 3 || $statusESTP13 == 3 || $statusESTP56 == 3 ||
    $statusESTP46 == 3 || $statusESTP42 == 3 || $statusESTP32 == 3 || $statusESTP28 == 3 || $statusESTP18 == 3 ||
    $statusESTP12 == 3 || $statusESTP4 == 3 || $statusESTP57 == 3 || $statusESTP44 == 3 || $statusESTP43 == 3 ||
    $statusESTP30 == 3 || $statusESTP29 == 3 || $statusESTP16 == 3 || $statusESTP14 == 3 || $statusESTP1 == 3 ||
    $statusESTP54 == 3 || $statusESTP52 == 3 || $statusESTP48 == 3 || $statusESTP47 == 3 || $statusESTP40 == 3 ||
    $statusESTP38 == 3 || $statusESTP34 == 3 || $statusESTP33 == 3 || $statusESTP26 == 3 || $statusESTP24 == 3 ||
    $statusESTP20 == 3 || $statusESTP19 == 3 || $statusESTP11 == 3 || $statusESTP9 == 3 || $statusESTP5 == 3 ||
    $statusESTP2 == 3 || $statusESTP53 == 3 || $statusESTP49 == 3 || $statusESTP39 == 3 || $statusESTP35 == 3 ||
    $statusESTP25 == 3 || $statusESTP21 == 3 || $statusESTP10 == 3 || $statusESTP6 == 3 || $statusESTP50 == 3 ||
    $statusESTP36 == 3 || $statusESTP22 == 3 || $statusESTP7 == 3) {
      $lpc_prime = 3;
    } else {
      $lpc_prime = "";
    }

    return $lpc_prime;
  }

  public static function lpc_finish() {

    $tag_pintura_ESTF109 = "TR 72 500 510 218 007 - 000051";
    $idAtividadeESTF109 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF109)->value('id');
    $idAnaliseESTF109 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF109)->max('id');
    $statusESTF109 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF109)->value('status_id');

    $tag_pintura_ESTF95 = "TR 72 500 510 218 007 - 000037";
    $idAtividadeESTF95 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF95)->value('id');
    $idAnaliseESTF95 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF95)->max('id');
    $statusESTF95 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF95)->value('status_id');

    $tag_pintura_ESTF81 = "TR 72 500 510 218 007 - 000023";
    $idAtividadeESTF81 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF81)->value('id');
    $idAnaliseESTF81 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF81)->max('id');
    $statusESTF81 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF81)->value('status_id');

    $tag_pintura_ESTF66 = "TR 72 500 510 218 007 - 000008";
    $idAtividadeESTF66 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF66)->value('id');
    $idAnaliseESTF66 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF66)->max('id');
    $statusESTF66 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF66)->value('status_id');

    $tag_pintura_ESTF116 = "TR 72 500 510 218 007 - 000058";
    $idAtividadeESTF116 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF116)->value('id');
    $idAnaliseESTF116 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF116)->max('id');
    $statusESTF116 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF116)->value('status_id');

    $tag_pintura_ESTF113 = "TR 72 500 510 218 007 - 000055";
    $idAtividadeESTF113 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF113)->value('id');
    $idAnaliseESTF113 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF113)->max('id');
    $statusESTF113 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF113)->value('status_id');

    $tag_pintura_ESTF103 = "TR 72 500 510 218 007 - 000045";
    $idAtividadeESTF103 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF103)->value('id');
    $idAnaliseESTF103 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF103)->max('id');
    $statusESTF103 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF103)->value('status_id');

    $tag_pintura_ESTF99 = "TR 72 500 510 218 007 - 000041";
    $idAtividadeESTF99 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF99)->value('id');
    $idAnaliseESTF99 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF99)->max('id');
    $statusESTF99 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF99)->value('status_id');

    $tag_pintura_ESTF89 = "TR 72 500 510 218 007 - 000031";
    $idAtividadeESTF89 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF89)->value('id');
    $idAnaliseESTF89 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF89)->max('id');
    $statusESTF89 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF89)->value('status_id');

    $tag_pintura_ESTF85 = "TR 72 500 510 218 007 - 000027";
    $idAtividadeESTF85 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF85)->value('id');
    $idAnaliseESTF85 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF85)->max('id');
    $statusESTF85 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF85)->value('status_id');

    $tag_pintura_ESTF75 = "TR 72 500 510 218 007 - 000017";
    $idAtividadeESTF75 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF75)->value('id');
    $idAnaliseESTF75 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF75)->max('id');
    $statusESTF75 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF75)->value('status_id');

    $tag_pintura_ESTF61 = "TR 72 500 510 218 007 - 000003";
    $idAtividadeESTF61 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF61)->value('id');
    $idAnaliseESTF61 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF61)->max('id');
    $statusESTF61 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF61)->value('status_id');

    $tag_pintura_ESTF73 = "TR 72 500 510 218 007 - 000015";
    $idAtividadeESTF73 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF73)->value('id');
    $idAnaliseESTF73 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF73)->max('id');
    $statusESTF73 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF73)->value('status_id');

    $tag_pintura_ESTF71 = "TR 72 500 510 218 007 - 000013";
    $idAtividadeESTF71 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF71)->value('id');
    $idAnaliseESTF71 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF71)->max('id');
    $statusESTF71 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF71)->value('status_id');

    $tag_pintura_ESTF114 = "TR 72 500 510 218 007 - 000056";
    $idAtividadeESTF114 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF114)->value('id');
    $idAnaliseESTF114 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF114)->max('id');
    $statusESTF114 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF114)->value('status_id');

    $tag_pintura_ESTF104 = "TR 72 500 510 218 007 - 000046";
    $idAtividadeESTF104 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF104)->value('id');
    $idAnaliseESTF104 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF104)->max('id');
    $statusESTF104 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF104)->value('status_id');

    $tag_pintura_ESTF100 = "TR 72 500 510 218 007 - 000042";
    $idAtividadeESTF100 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF100)->value('id');
    $idAnaliseESTF100 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF100)->max('id');
    $statusESTF100 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF100)->value('status_id');

    $tag_pintura_ESTF90 = "TR 72 500 510 218 007 - 000032";
    $idAtividadeESTF90 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF90)->value('id');
    $idAnaliseESTF90 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF90)->max('id');
    $statusESTF90 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF90)->value('status_id');

    $tag_pintura_ESTF86 = "TR 72 500 510 218 007 - 000028";
    $idAtividadeESTF86 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF86)->value('id');
    $idAnaliseESTF86 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF86)->max('id');
    $statusESTF86 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF86)->value('status_id');

    $tag_pintura_ESTF76 = "TR 72 500 510 218 007 - 000018";
    $idAtividadeESTF76 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF76)->value('id');
    $idAnaliseESTF76 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF76)->max('id');
    $statusESTF76 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF76)->value('status_id');

    $tag_pintura_ESTF70 = "TR 72 500 510 218 007 - 000012";
    $idAtividadeESTF70 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF70)->value('id');
    $idAnaliseESTF70 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF70)->max('id');
    $statusESTF70 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF70)->value('status_id');

    $tag_pintura_ESTF62 = "TR 72 500 510 218 007 - 000004";
    $idAtividadeESTF62 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF62)->value('id');
    $idAnaliseESTF62 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF62)->max('id');
    $statusESTF62 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF62)->value('status_id');

    $tag_pintura_ESTF115 = "TR 72 500 510 218 007 - 000057";
    $idAtividadeESTF115 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF115)->value('id');
    $idAnaliseESTF115 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF115)->max('id');
    $statusESTF115 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF115)->value('status_id');

    $tag_pintura_ESTF102 = "TR 72 500 510 218 007 - 000044";
    $idAtividadeESTF102 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF102)->value('id');
    $idAnaliseESTF102 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF102)->max('id');
    $statusESTF102 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF102)->value('status_id');

    $tag_pintura_ESTF101 = "TR 72 500 510 218 007 - 000043";
    $idAtividadeESTF101 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF101)->value('id');
    $idAnaliseESTF101 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF101)->max('id');
    $statusESTF101 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF101)->value('status_id');

    $tag_pintura_ESTF88 = "TR 72 500 510 218 007 - 000030";
    $idAtividadeESTF88 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF88)->value('id');
    $idAnaliseESTF88 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF88)->max('id');
    $statusESTF88 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF88)->value('status_id');

    $tag_pintura_ESTF87 = "TR 72 500 510 218 007 - 000029";
    $idAtividadeESTF87 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF87)->value('id');
    $idAnaliseESTF87 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF87)->max('id');
    $statusESTF87 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF87)->value('status_id');

    $tag_pintura_ESTF74 = "TR 72 500 510 218 007 - 000016";
    $idAtividadeESTF74 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF74)->value('id');
    $idAnaliseESTF74 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF74)->max('id');
    $statusESTF74 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF74)->value('status_id');

    $tag_pintura_ESTF72 = "TR 72 500 510 218 007 - 000014";
    $idAtividadeESTF72 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF72)->value('id');
    $idAnaliseESTF72 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF72)->max('id');
    $statusESTF72 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF72)->value('status_id');

    $tag_pintura_ESTF59 = "TR 72 500 510 218 007 - 000001";
    $idAtividadeESTF59 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF59)->value('id');
    $idAnaliseESTF59 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF59)->max('id');
    $statusESTF59 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF59)->value('status_id');

    $tag_pintura_ESTF112 = "TR 72 500 510 218 007 - 000054";
    $idAtividadeESTF112 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF112)->value('id');
    $idAnaliseESTF112 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF112)->max('id');
    $statusESTF112 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF112)->value('status_id');

    $tag_pintura_ESTF110 = "TR 72 500 510 218 007 - 000052";
    $idAtividadeESTF110 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF110)->value('id');
    $idAnaliseESTF110 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF110)->max('id');
    $statusESTF110 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF110)->value('status_id');

    $tag_pintura_ESTF106 = "TR 72 500 510 218 007 - 000048";
    $idAtividadeESTF106 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF106)->value('id');
    $idAnaliseESTF106 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF106)->max('id');
    $statusESTF106 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF106)->value('status_id');

    $tag_pintura_ESTF105 = "TR 72 500 510 218 007 - 000047";
    $idAtividadeESTF105 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF105)->value('id');
    $idAnaliseESTF105 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF105)->max('id');
    $statusESTF105 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF105)->value('status_id');

    $tag_pintura_ESTF98 = "TR 72 500 510 218 007 - 000040";
    $idAtividadeESTF98 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF98)->value('id');
    $idAnaliseESTF98 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF98)->max('id');
    $statusESTF98 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF98)->value('status_id');

    $tag_pintura_ESTF96 = "TR 72 500 510 218 007 - 000038";
    $idAtividadeESTF96 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF96)->value('id');
    $idAnaliseESTF96 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF96)->max('id');
    $statusESTF96 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF96)->value('status_id');

    $tag_pintura_ESTF92 = "TR 72 500 510 218 007 - 000034";
    $idAtividadeESTF92 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF92)->value('id');
    $idAnaliseESTF92 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF92)->max('id');
    $statusESTF92 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF92)->value('status_id');

    $tag_pintura_ESTF91 = "TR 72 500 510 218 007 - 000033";
    $idAtividadeESTF91 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF91)->value('id');
    $idAnaliseESTF91 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF91)->max('id');
    $statusESTF91 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF91)->value('status_id');

    $tag_pintura_ESTF84 = "TR 72 500 510 218 007 - 000026";
    $idAtividadeESTF84 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF84)->value('id');
    $idAnaliseESTF84 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF84)->max('id');
    $statusESTF84 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF84)->value('status_id');

    $tag_pintura_ESTF82 = "TR 72 500 510 218 007 - 000024";
    $idAtividadeESTF82 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF82)->value('id');
    $idAnaliseESTF82 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF82)->max('id');
    $statusESTF82 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF82)->value('status_id');

    $tag_pintura_ESTF78 = "TR 72 500 510 218 007 - 000020";
    $idAtividadeESTF78 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF78)->value('id');
    $idAnaliseESTF78 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF78)->max('id');
    $statusESTF78 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF78)->value('status_id');

    $tag_pintura_ESTF77 = "TR 72 500 510 218 007 - 000019";
    $idAtividadeESTF77 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF77)->value('id');
    $idAnaliseESTF77 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF77)->max('id');
    $statusESTF77 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF77)->value('status_id');

    $tag_pintura_ESTF69 = "TR 72 500 510 218 007 - 000011";
    $idAtividadeESTF69 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF69)->value('id');
    $idAnaliseESTF69 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF69)->max('id');
    $statusESTF69 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF69)->value('status_id');

    $tag_pintura_ESTF67 = "TR 72 500 510 218 007 - 000009";
    $idAtividadeESTF67 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF67)->value('id');
    $idAnaliseESTF67 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF67)->max('id');
    $idLaudoESTF67 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF67)->value('id');
    $statusESTF67 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF67)->value('status_id');

    $tag_pintura_ESTF63 = "TR 72 500 510 218 007 - 000005";
    $idAtividadeESTF63 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF63)->value('id');
    $idAnaliseESTF63 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF63)->max('id');
    $statusESTF63 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF63)->value('status_id');

    $tag_pintura_ESTF60 = "TR 72 500 510 218 007 - 000002";
    $idAtividadeESTF60 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF60)->value('id');
    $idAnaliseESTF60 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF60)->max('id');
    $statusESTF60 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF60)->value('status_id');

    $tag_pintura_ESTF111 = "TR 72 500 510 218 007 - 000053";
    $idAtividadeESTF111 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF111)->value('id');
    $idAnaliseESTF111 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF111)->max('id');
    $statusESTF111 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF111)->value('status_id');

    $tag_pintura_ESTF107 = "TR 72 500 510 218 007 - 000049";
    $idAtividadeESTF107 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF107)->value('id');
    $idAnaliseESTF107 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF107)->max('id');
    $statusESTF107 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF107)->value('status_id');

    $tag_pintura_ESTF97 = "TR 72 500 510 218 007 - 000039";
    $idAtividadeESTF97 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF97)->value('id');
    $idAnaliseESTF97 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF97)->max('id');
    $statusESTF97 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF97)->value('status_id');

    $tag_pintura_ESTF93 = "TR 72 500 510 218 007 - 000035";
    $idAtividadeESTF93 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF93)->value('id');
    $idAnaliseESTF93 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF93)->max('id');
    $statusESTF93 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF93)->value('status_id');

    $tag_pintura_ESTF83 = "TR 72 500 510 218 007 - 000025";
    $idAtividadeESTF83 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF83)->value('id');
    $idAnaliseESTF83 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF83)->max('id');
    $statusESTF83 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF83)->value('status_id');

    $tag_pintura_ESTF79 = "TR 72 500 510 218 007 - 000021";
    $idAtividadeESTF79 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF79)->value('id');
    $idAnaliseESTF79 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF79)->max('id');
    $statusESTF79 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF79)->value('status_id');

    $tag_pintura_ESTF68 = "TR 72 500 510 218 007 - 000010";
    $idAtividadeESTF68 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF68)->value('id');
    $idAnaliseESTF68 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF68)->max('id');
    $statusESTF68 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF68)->value('status_id');

    $tag_pintura_ESTF64 = "TR 72 500 510 218 007 - 000006";
    $idAtividadeESTF64 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF64)->value('id');
    $idAnaliseESTF64 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF64)->max('id');
    $statusESTF64 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF64)->value('status_id');

    $tag_pintura_ESTF108 = "TR 72 500 510 218 007 - 000050";
    $idAtividadeESTF108 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF108)->value('id');
    $idAnaliseESTF108 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF108)->max('id');
    $statusESTF108 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF108)->value('status_id');

    $tag_pintura_ESTF94 = "TR 72 500 510 218 007 - 000036";
    $idAtividadeESTF94 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF94)->value('id');
    $idAnaliseESTF94 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF94)->max('id');
    $statusESTF94 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF94)->value('status_id');

    $tag_pintura_ESTF80 = "TR 72 500 510 218 007 - 000022";
    $idAtividadeESTF80 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF80)->value('id');
    $idAnaliseESTF80 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF80)->max('id');
    $statusESTF80 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF80)->value('status_id');

    $tag_pintura_ESTF65 = "TR 72 500 510 218 007 - 000007";
    $idAtividadeESTF65 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF65)->value('id');
    $idAnaliseESTF65 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF65)->max('id');
    $statusESTF65 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF65)->value('status_id');

    if ($statusESTF109 == 5 || $statusESTF95 == 5 || $statusESTF81 == 5 || $statusESTF66 == 5 || $statusESTF116 == 5 || $statusESTF113
    == 5 || $statusESTF103 == 5 || $statusESTF99 == 5 || $statusESTF89 == 5 || $statusESTF85 == 5 || $statusESTF75 == 5 || $statusESTF61
    == 5 || $statusESTF73 == 5 || $statusESTF71 == 5 || $statusESTF114 == 5 || $statusESTF104 == 5 || $statusESTF100 == 5 || $statusESTF90
    == 5 || $statusESTF86 == 5 || $statusESTF76 == 5 || $statusESTF70 == 5 || $statusESTF62 == 5 || $statusESTF115 == 5 || $statusESTF102
    == 5 || $statusESTF101 == 5 || $statusESTF88 == 5 || $statusESTF87 == 5 || $statusESTF74 == 5 || $statusESTF72 == 5 || $statusESTF59
    == 5 || $statusESTF112 == 5 || $statusESTF110 == 5 || $statusESTF106 == 5 || $statusESTF105 == 5 || $statusESTF98 == 5 || $statusESTF96
    == 5 || $statusESTF92 == 5 || $statusESTF91 == 5 || $statusESTF84 == 5 || $statusESTF82 == 5 || $statusESTF78 == 5 || $statusESTF77
    == 5 || $statusESTF69 == 5 || $statusESTF67 == 5 || $statusESTF63 == 5 || $statusESTF60 == 5 || $statusESTF111 == 5 || $statusESTF107
    == 5 || $statusESTF97 == 5 || $statusESTF93 == 5 || $statusESTF83 == 5 || $statusESTF79 == 5 || $statusESTF68 == 5 || $statusESTF64
    == 5 || $statusESTF108 == 5 || $statusESTF94 == 5 || $statusESTF80 == 5 || $statusESTF65 == 5) {
      $lpc_finish = 5;
    } elseif ($statusESTF109 == 4 || $statusESTF95 == 4 || $statusESTF81 == 4 || $statusESTF66 == 4 || $statusESTF116 == 4 || $statusESTF113
    == 4 || $statusESTF103 == 4 || $statusESTF99 == 4 || $statusESTF89 == 4 || $statusESTF85 == 4 || $statusESTF75 == 4 || $statusESTF61
    == 4 || $statusESTF73 == 4 || $statusESTF71 == 4 || $statusESTF114 == 4 || $statusESTF104 == 4 || $statusESTF100 == 4 || $statusESTF90
    == 4 || $statusESTF86 == 4 || $statusESTF76 == 4 || $statusESTF70 == 4 || $statusESTF62 == 4 || $statusESTF115 == 4 || $statusESTF102
    == 4 || $statusESTF101 == 4 || $statusESTF88 == 4 || $statusESTF87 == 4 || $statusESTF74 == 4 || $statusESTF72 == 4 || $statusESTF59
    == 4 || $statusESTF112 == 4 || $statusESTF110 == 4 || $statusESTF106 == 4 || $statusESTF105 == 4 || $statusESTF98 == 4 || $statusESTF96
    == 4 || $statusESTF92 == 4 || $statusESTF91 == 4 || $statusESTF84 == 4 || $statusESTF82 == 4 || $statusESTF78 == 4 || $statusESTF77
    == 4 || $statusESTF69 == 4 || $statusESTF67 == 4 || $statusESTF63 == 4 || $statusESTF60 == 4 || $statusESTF111 == 4 || $statusESTF107
    == 4 || $statusESTF97 == 4 || $statusESTF93 == 4 || $statusESTF83 == 4 || $statusESTF79 == 4 || $statusESTF68 == 4 || $statusESTF64
    == 4 || $statusESTF108 == 4 || $statusESTF94 == 4 || $statusESTF80 == 4 || $statusESTF65 == 4) {
      $lpc_finish = 4;
    } elseif ($statusESTF109 == 3 || $statusESTF95 == 3 || $statusESTF81 == 3 || $statusESTF66 == 3 || $statusESTF116 == 3 || $statusESTF113
    == 3 || $statusESTF103 == 3 || $statusESTF99 == 3 || $statusESTF89 == 3 || $statusESTF85 == 3 || $statusESTF75 == 3 || $statusESTF61
    == 3 || $statusESTF73 == 3 || $statusESTF71 == 3 || $statusESTF114 == 3 || $statusESTF104 == 3 || $statusESTF100 == 3 || $statusESTF90
    == 3 || $statusESTF86 == 3 || $statusESTF76 == 3 || $statusESTF70 == 3 || $statusESTF62 == 3 || $statusESTF115 == 3 || $statusESTF102
    == 3 || $statusESTF101 == 3 || $statusESTF88 == 3 || $statusESTF87 == 3 || $statusESTF74 == 3 || $statusESTF72 == 3 || $statusESTF59
    == 3 || $statusESTF112 == 3 || $statusESTF110 == 3 || $statusESTF106 == 3 || $statusESTF105 == 3 || $statusESTF98 == 3 || $statusESTF96
    == 3 || $statusESTF92 == 3 || $statusESTF91 == 3 || $statusESTF84 == 3 || $statusESTF82 == 3 || $statusESTF78 == 3 || $statusESTF77
    == 3 || $statusESTF69 == 3 || $statusESTF67 == 3 || $statusESTF63 == 3 || $statusESTF60 == 3 || $statusESTF111 == 3 || $statusESTF107
    == 3 || $statusESTF97 == 3 || $statusESTF93 == 3 || $statusESTF83 == 3 || $statusESTF79 == 3 || $statusESTF68 == 3 || $statusESTF64
    == 3 || $statusESTF108 == 3 || $statusESTF94 == 3 || $statusESTF80 == 3 || $statusESTF65 == 3) {
      $lpc_finish = 3;
    } else {
      $lpc_finish = "";
    }

    return $lpc_finish;
  }
  public static function lpc_Menu() {
    $lpc_menu = "";

    $lpc_caldeira01 = AuxFuncRelTec::lpc_caldeira01();
    $lpc_oxidizer = AuxFuncRelTec::lpc_oxidizer();
    $lpc_oxi_tubulacao = AuxFuncRelTec::lpc_oxi_tubulacao();
    $lpc_prime = AuxFuncRelTec::lpc_prime();
    $lpc_finish = AuxFuncRelTec::lpc_finish();

    if ($lpc_caldeira01 == 5 || $lpc_oxidizer == 5 ||
    $lpc_oxi_tubulacao == 5 || $lpc_prime == 5 || $lpc_finish == 5) {
      $lpc_menu = 5;
    } elseif ($lpc_caldeira01 == 4 || $lpc_oxidizer == 4 ||
    $lpc_oxi_tubulacao == 4 || $lpc_prime == 4 || $lpc_finish == 4) {
      $lpc_menu = 4;
    } elseif ($lpc_caldeira01 == 3 || $lpc_oxidizer == 3 ||
    $lpc_oxi_tubulacao == 3 || $lpc_prime == 3 || $lpc_finish == 3) {
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
    $lpc_normal = aux::GeralPorLinhaTR($atual1, 3, $lpc_linha1, $lpc_linha2);
    return $lpc_normal;
  }
  public static function lpc_alarme_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_alarme = aux::GeralPorLinhaTR($atual1, 4, $lpc_linha1, $lpc_linha2);
    return $lpc_alarme;
  }
  public static function lpc_critico_Menu() {
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;
    $lpc_critico = aux::GeralPorLinhaTR($atual1, 5, $lpc_linha1, $lpc_linha2);
    return $lpc_critico;
  }
}

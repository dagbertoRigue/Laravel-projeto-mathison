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
use App\Http\Controllers\Csn\AuxFunc as aux;

class RelGerTermoIso extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
  */
  public function GeralPerfil() {

    $title = 'Perfil | GGOP PR';
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');

    // ============================================================ GGOP PR
    $manutencao = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 1)->count();
    $standBy = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 2)->count();
    $normal = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 3)->count();
    $alarme = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 4)->count();
    $critico = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 5)->count();

    if($manutencao == null){$manutencao = 0;}
    if($standBy == null){$standBy = 0;}
    if($normal == null){$normal = 0;}
    if($alarme == null){$alarme = 0;}
    if($critico == null){$critico = 0;}

    $sum = Preditiva_atividades::where('tecnicas_id', '=', 2)->count();
    $manutencaoP_format = ($manutencao / $sum)*100;
    $manutencaoP = number_format($manutencaoP_format,2,".",",");
    $standByP_format = ($standBy / $sum)*100;
    $standByP = number_format($standByP_format,2,".",",");
    $normalP_format = ($normal / $sum)*100;
    $normalP = number_format($normalP_format,2,".",",");
    $alarmeP_format = ($alarme / $sum)*100;
    $alarmeP = number_format($alarmeP_format,2,".",",");
    $criticoP_format = ($critico / $sum)*100;
    $criticoP = number_format($criticoP_format,2,".",",");

    // ============================================================ UNIDADE DE REGENERAÇÃO DE ÁCIDO
    $ura_linha1 = 11;
    $ura_linha2 = 0;

    $ura_manutencao = aux::GeralPorLinhaTR($atual1, 1, $ura_linha1, $ura_linha2);
    $ura_standBy = aux::GeralPorLinhaTR($atual1, 2, $ura_linha1, $ura_linha2);
    $ura_normal = aux::GeralPorLinhaTR($atual1, 3, $ura_linha1, $ura_linha2);
    $ura_alarme = aux::GeralPorLinhaTR($atual1, 4, $ura_linha1, $ura_linha2);
    $ura_critico = aux::GeralPorLinhaTR($atual1, 5, $ura_linha1, $ura_linha2);
    if($ura_manutencao == null){$ura_manutencao = 0;}
    if($ura_standBy == null){$ura_standBy = 0;}
    if($ura_normal == null){$ura_normal = 0;}
    if($ura_alarme == null){$ura_alarme = 0;}
    if($ura_critico == null){$ura_critico = 0;}

    $ura_sum1 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',11)
               ->where('preditiva_atividades.tecnicas_id', '=', 2)
               ->count('preditiva_atividades.id');

    $ura_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',0)
               ->where('preditiva_atividades.tecnicas_id', '=', 2)
               ->count('preditiva_atividades.id');

    $ura_sum = $ura_sum1+$ura_sum2;
    $ura_manutencaoP_format = ($ura_manutencao / $ura_sum)*100;
    $ura_manutencaoP = number_format($ura_manutencaoP_format,2,".",",");
    $ura_standByP_format = ($ura_standBy / $ura_sum)*100;
    $ura_standByP = number_format($ura_standByP_format,2,".",",");
    $ura_normalP_format = ($ura_normal / $ura_sum)*100;
    $ura_normalP = number_format($ura_normalP_format,2,".",",");
    $ura_alarmeP_format = ($ura_alarme / $ura_sum)*100;
    $ura_alarmeP = number_format($ura_alarmeP_format,2,".",",");
    $ura_criticoP_format = ($ura_critico / $ura_sum)*100;
    $ura_criticoP = number_format($ura_criticoP_format,2,".",",");

    // ============================================================ LINHA DE DECAPAGEM SEMICONTÍNUA
    $lds_linha1 = 10;
    $lds_linha2 = 22;

    $lds_manutencao = aux::GeralPorLinhaTR($atual1, 1, $lds_linha1, $lds_linha2);
    $lds_standBy = aux::GeralPorLinhaTR($atual1, 2, $lds_linha1, $lds_linha2);
    $lds_normal = aux::GeralPorLinhaTR($atual1, 3, $lds_linha1, $lds_linha2);
    $lds_alarme = aux::GeralPorLinhaTR($atual1, 4, $lds_linha1, $lds_linha2);
    $lds_critico = aux::GeralPorLinhaTR($atual1, 5, $lds_linha1, $lds_linha2);
    if($lds_manutencao == null){$lds_manutencao = 0;}
    if($lds_standBy == null){$lds_standBy = 0;}
    if($lds_normal == null){$lds_normal = 0;}
    if($lds_alarme == null){$lds_alarme = 0;}
    if($lds_critico == null){$lds_critico = 0;}

    $lds_sum1 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 10)
                ->where('preditiva_atividades.tecnicas_id', '=', 2)
                ->count('preditiva_atividades.id');

    $lds_sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 22)
                ->where('preditiva_atividades.tecnicas_id', '=', 2)
                ->count('preditiva_atividades.id');

    $lds_sum = $lds_sum1+$lds_sum2;

    $lds_manutencaoP_format = ($lds_manutencao / $lds_sum)*100;
    $lds_manutencaoP = number_format($lds_manutencaoP_format,2,".",",");
    $lds_standByP_format = ($lds_standBy / $lds_sum)*100;
    $lds_standByP = number_format($lds_standByP_format,2,".",",");
    $lds_normalP_format = ($lds_normal / $lds_sum)*100;
    $lds_normalP = number_format($lds_normalP_format,2,".",",");
    $lds_alarmeP_format = ($lds_alarme / $lds_sum)*100;
    $lds_alarmeP = number_format($lds_alarmeP_format,2,".",",");
    $lds_criticoP_format = ($lds_critico / $lds_sum)*100;
    $lds_criticoP = number_format($lds_criticoP_format,2,".",",");

    // ============================================================ LINHA DE GALVANIZAÇÃO CONTÍNUA
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;

    $lgc_manutencao = aux::GeralPorLinhaTR($atual1, 1, $lgc_linha1, $lgc_linha2);
    $lgc_standBy = aux::GeralPorLinhaTR($atual1, 2, $lgc_linha1, $lgc_linha2);
    $lgc_normal = aux::GeralPorLinhaTR($atual1, 3, $lgc_linha1, $lgc_linha2);
    $lgc_alarme = aux::GeralPorLinhaTR($atual1, 4, $lgc_linha1, $lgc_linha2);
    $lgc_critico = aux::GeralPorLinhaTR($atual1, 5, $lgc_linha1, $lgc_linha2);
    if($lgc_manutencao == null){$lgc_manutencao = 0;}
    if($lgc_standBy == null){$lgc_standBy = 0;}
    if($lgc_normal == null){$lgc_normal = 0;}
    if($lgc_alarme == null){$lgc_alarme = 0;}
    if($lgc_critico == null){$lgc_critico = 0;}

    $lgc_sum1 = DB::table('preditiva_atividades')
              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
              ->where('negocios.id','=',13)
              ->where('preditiva_atividades.tecnicas_id', '=', 1)
              ->count('preditiva_atividades.id');

    $lgc_sum2 = DB::table('preditiva_atividades')
              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
              ->where('negocios.id','=',0)
              ->where('preditiva_atividades.tecnicas_id', '=', 1)
              ->count('preditiva_atividades.id');

    $lgc_sum = $lgc_sum1+$lgc_sum2;
    $lgc_manutencaoP_format = ($lgc_manutencao / $lgc_sum)*100;
    $lgc_manutencaoP = number_format($lgc_manutencaoP_format,2,".",",");
    $lgc_standByP_format = ($lgc_standBy / $lgc_sum)*100;
    $lgc_standByP = number_format($lgc_standByP_format,2,".",",");
    $lgc_normalP_format = ($lgc_normal / $lgc_sum)*100;
    $lgc_normalP = number_format($lgc_normalP_format,2,".",",");
    $lgc_alarmeP_format = ($lgc_alarme / $lgc_sum)*100;
    $lgc_alarmeP = number_format($lgc_alarmeP_format,2,".",",");
    $lgc_criticoP_format = ($lgc_critico / $lgc_sum)*100;
    $lgc_criticoP = number_format($lgc_criticoP_format,2,".",",");

    // ============================================================ LINHA DE PINTURA CONTÍNUA
    $lpc_linha1 = 14;
    $lpc_linha2 = 0;

    $lpc_manutencao = aux::GeralPorLinhaTR($atual1, 1, $lpc_linha1, $lpc_linha2);
    $lpc_standBy = aux::GeralPorLinhaTR($atual1, 2, $lpc_linha1, $lpc_linha2);
    $lpc_normal = aux::GeralPorLinhaTR($atual1, 3, $lpc_linha1, $lpc_linha2);
    $lpc_alarme = aux::GeralPorLinhaTR($atual1, 4, $lpc_linha1, $lpc_linha2);
    $lpc_critico = aux::GeralPorLinhaTR($atual1, 5, $lpc_linha1, $lpc_linha2);
    if($lpc_manutencao == null){$lpc_manutencao = 0;}
    if($lpc_standBy == null){$lpc_standBy = 0;}
    if($lpc_normal == null){$lpc_normal = 0;}
    if($lpc_alarme == null){$lpc_alarme = 0;}
    if($lpc_critico == null){$lpc_critico = 0;}

   $lpc_sum1 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',14)
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
               ->count('preditiva_atividades.id');

   $lpc_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',0)
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
               ->count('preditiva_atividades.id');

   $lpc_sum = $lpc_sum1+$lpc_sum2;
   $lpc_manutencaoP_format = ($lpc_manutencao / $lpc_sum)*100;
   $lpc_manutencaoP = number_format($lpc_manutencaoP_format,2,".",",");
   $lpc_standByP_format = ($lpc_standBy / $lpc_sum)*100;
   $lpc_standByP = number_format($lpc_standByP_format,2,".",",");
   $lpc_normalP_format = ($lpc_normal / $lpc_sum)*100;
   $lpc_normalP = number_format($lpc_normalP_format,2,".",",");
   $lpc_alarmeP_format = ($lpc_alarme / $lpc_sum)*100;
   $lpc_alarmeP = number_format($lpc_alarmeP_format,2,".",",");
   $lpc_criticoP_format = ($lpc_critico / $lpc_sum)*100;
   $lpc_criticoP = number_format($lpc_criticoP_format,2,".",",");

 // ============================================================ TABELAS RELATÓRIO GERENCIAL
 // TABELA ANORMALIDADES - ALARME E CRITICO
 $tabela = aux::GeralAnormalidadesTR($atual1)->where('status_id', '>', 3);
 $indice_tg = 0;
 $tb_anormalidades[0] = (['indice_tg' => $indice_tg,
                           'data' => "",
                           'idLaudo' => "",
                           'descAtividade' => "de Atividade ",
                           'descAtivo' => "Registro ",
                           'descSistema' => "Sem ",
                           'descNegocio' => "S/L",
                           'status' => "",
                           'colorStatus' => ""]);
 foreach ($tabela as $key => $value) {
  $dateAnalise = $value->date_analise;
  $datef = json_encode($dateAnalise);
  $data_analise = substr($datef, 1, 11);
  $statusAnalise = $value->status_id;
  if ($statusAnalise == 4) {
    $statusAnalise = 'Alarme';
    $colorStatus = '#fff000';
  }
  if ($statusAnalise == 5) {
    $statusAnalise = 'Crítico';
    $colorStatus = '#ff0000';

  }
  $dado1 = $value->atividade_id;
  $dado2 = $value->id;
  $idLaudo = DB::table('laudos')->where('analise_id', '=', $dado2)->value('id');
  $descAtividade = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('description_ativ');
  $idAtivo = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('ativo_id');
  $descAtivo = DB::table('ativos')->where('id', '=', $idAtivo)->value('name_ativo');
  $idSistema = DB::table('ativos')->where('id', '=', $idAtivo)->value('sistema_id');
  $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema)->value('negocio_id');
  $nameSistema = DB::table('sistemas')->where('id', '=', $idSistema)->value('name_sistema');
  $nameNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
  if ($nameNegocio == "UNIDADE DE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "LAMINADOR REVERSIVEL DE TIRAS A FRIO 01") { $nameNegocio = "LRF"; }
  if ($nameNegocio == "DECAPAGEM 1") { $nameNegocio = "LDS"; }
  if ($nameNegocio == "GALVANIZACAO 1") { $nameNegocio = "LGC"; }
  if ($nameNegocio == "UNIDADE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE AFLUENTES (ETA)") { $nameNegocio = "ETA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE EFLUENTES (ETE)") { $nameNegocio = "ETE"; }
  if ($nameNegocio == "LCC 1") { $nameNegocio = "LCC1"; }
  if ($nameNegocio == "LCL 1") { $nameNegocio = "LCL1"; }
  if ($nameNegocio == "PINTURA 1") { $nameNegocio = "LPC"; }
  if ($nameNegocio == "PRODUCAO DE AR COMPRIMIDO") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PRODUCAO DE VAPOR") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PONTE ROLANTE 01") { $nameNegocio = "PR01"; }
  if ($nameNegocio == "PONTE ROLANTE 02") { $nameNegocio = "PR02"; }
  if ($nameNegocio == "PONTE ROLANTE 03") { $nameNegocio = "PR03"; }
  if ($nameNegocio == "PONTE ROLANTE 04") { $nameNegocio = "PR04"; }
  if ($nameNegocio == "PONTE ROLANTE 05") { $nameNegocio = "PR05"; }
  if ($nameNegocio == "PONTE ROLANTE 06") { $nameNegocio = "PR06"; }
  if ($nameNegocio == "PONTE ROLANTE 07") { $nameNegocio = "PR07"; }
  if ($nameNegocio == "PONTE ROLANTE 08") { $nameNegocio = "PR08"; }
  if ($nameNegocio == "PONTE ROLANTE 09") { $nameNegocio = "PR09"; }
  if ($nameNegocio == "PONTE ROLANTE 10") { $nameNegocio = "PR10"; }
  if ($nameNegocio == "PONTE ROLANTE 11") { $nameNegocio = "PR11"; }
  if ($nameNegocio == "PONTE ROLANTE 12") { $nameNegocio = "PR12"; }
  if ($nameNegocio == "PONTE ROLANTE 13") { $nameNegocio = "PR13"; }
  if ($nameNegocio == "PONTE ROLANTE 14") { $nameNegocio = "PR14"; }
  if ($nameNegocio == "PONTE ROLANTE 15") { $nameNegocio = "PR15"; }
  if ($nameNegocio == "PONTE ROLANTE 16") { $nameNegocio = "PR16"; }
  if ($nameNegocio == "PONTE ROLANTE 17") { $nameNegocio = "PR17"; }
  if ($nameNegocio == "PONTE ROLANTE 18") { $nameNegocio = "PR18"; }
  if ($nameNegocio == "PONTE ROLANTE 19") { $nameNegocio = "PR19"; }
  if ($nameNegocio == "PONTE ROLANTE 20") { $nameNegocio = "PR20"; }
  if ($nameNegocio == "PONTE ROLANTE 21") { $nameNegocio = "PR21"; }
  if ($nameNegocio == "PONTE ROLANTE 22") { $nameNegocio = "PR22"; }
  if ($nameNegocio == "PONTE ROLANTE 23") { $nameNegocio = "PR23"; }
  if ($nameNegocio == null) {$nameNegocio = ""; }
  if ($nameSistema == null) {$nameSistema = ""; } else {$nameSistema = $nameSistema." - ";}
  if ($descAtivo == null) {$descAtivo = ""; } else {$descAtivo = $descAtivo." - ";}
  $tb_anormalidades[$indice_tg] = array(
                           'indice_tg' => $indice_tg,
                           'data' => $data_analise,
                           'idLaudo' => $idLaudo,
                           'descAtividade' => $descAtividade,
                           'descAtivo' => $descAtivo,
                           'descSistema' => $nameSistema,
                           'descNegocio' => $nameNegocio,
                           'status' => $statusAnalise,
                           'colorStatus' => $colorStatus
                           );
  $indice_tg++;
 }
 $tb_anormalidades = collect($tb_anormalidades)->sortBy('data')->reverse()->toArray();

 // TABELA STATUS NORMAL
 $tabela_normal = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 3);
 $indice_normal = 0;
 $tb_normal[0] = (['indice_normal' => $indice_normal,
                           'data' => $atual1,
                           'idLaudo' => "",
                           'descAtividade' => "de Atividade ",
                           'descAtivo' => "Registro ",
                           'descSistema' => "Sem ",
                           'descNegocio' => "S/L",
                           'status' => "",
                           'colorStatus' => ""]);
 foreach ($tabela_normal as $key => $value) {
  $dateAnalise = $value->date_analise;
  $datef = json_encode($dateAnalise);
  $data_analise = substr($datef, 1, 11);
  $statusAnalise = $value->status_id;
  if ($statusAnalise == 3) {
    $statusAnalise = 'Normal';
    $colorStatus = '#00cc00';
  }
  $dado1 = $value->atividade_id;
  $dado2 = $value->id;
  $idLaudo = DB::table('laudos')->where('analise_id', '=', $dado2)->value('id');
  $descAtividade = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('description_ativ');
  $idAtivo = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('ativo_id');
  $descAtivo = DB::table('ativos')->where('id', '=', $idAtivo)->value('name_ativo');
  $idSistema = DB::table('ativos')->where('id', '=', $idAtivo)->value('sistema_id');
  $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema)->value('negocio_id');
  $nameSistema = DB::table('sistemas')->where('id', '=', $idSistema)->value('name_sistema');
  $nameNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
  if ($nameNegocio == "UNIDADE DE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "LAMINADOR REVERSIVEL DE TIRAS A FRIO 01") { $nameNegocio = "LRF"; }
  if ($nameNegocio == "DECAPAGEM 1") { $nameNegocio = "LDS"; }
  if ($nameNegocio == "GALVANIZACAO 1") { $nameNegocio = "LGC"; }
  if ($nameNegocio == "UNIDADE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE AFLUENTES (ETA)") { $nameNegocio = "ETA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE EFLUENTES (ETE)") { $nameNegocio = "ETE"; }
  if ($nameNegocio == "LCC 1") { $nameNegocio = "LCC1"; }
  if ($nameNegocio == "LCL 1") { $nameNegocio = "LCL1"; }
  if ($nameNegocio == "PINTURA 1") { $nameNegocio = "LPC"; }
  if ($nameNegocio == "PRODUCAO DE AR COMPRIMIDO") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PRODUCAO DE VAPOR") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PONTE ROLANTE 01") { $nameNegocio = "PR01"; }
  if ($nameNegocio == "PONTE ROLANTE 02") { $nameNegocio = "PR02"; }
  if ($nameNegocio == "PONTE ROLANTE 03") { $nameNegocio = "PR03"; }
  if ($nameNegocio == "PONTE ROLANTE 04") { $nameNegocio = "PR04"; }
  if ($nameNegocio == "PONTE ROLANTE 05") { $nameNegocio = "PR05"; }
  if ($nameNegocio == "PONTE ROLANTE 06") { $nameNegocio = "PR06"; }
  if ($nameNegocio == "PONTE ROLANTE 07") { $nameNegocio = "PR07"; }
  if ($nameNegocio == "PONTE ROLANTE 08") { $nameNegocio = "PR08"; }
  if ($nameNegocio == "PONTE ROLANTE 09") { $nameNegocio = "PR09"; }
  if ($nameNegocio == "PONTE ROLANTE 10") { $nameNegocio = "PR10"; }
  if ($nameNegocio == "PONTE ROLANTE 11") { $nameNegocio = "PR11"; }
  if ($nameNegocio == "PONTE ROLANTE 12") { $nameNegocio = "PR12"; }
  if ($nameNegocio == "PONTE ROLANTE 13") { $nameNegocio = "PR13"; }
  if ($nameNegocio == "PONTE ROLANTE 14") { $nameNegocio = "PR14"; }
  if ($nameNegocio == "PONTE ROLANTE 15") { $nameNegocio = "PR15"; }
  if ($nameNegocio == "PONTE ROLANTE 16") { $nameNegocio = "PR16"; }
  if ($nameNegocio == "PONTE ROLANTE 17") { $nameNegocio = "PR17"; }
  if ($nameNegocio == "PONTE ROLANTE 18") { $nameNegocio = "PR18"; }
  if ($nameNegocio == "PONTE ROLANTE 19") { $nameNegocio = "PR19"; }
  if ($nameNegocio == "PONTE ROLANTE 20") { $nameNegocio = "PR20"; }
  if ($nameNegocio == "PONTE ROLANTE 21") { $nameNegocio = "PR21"; }
  if ($nameNegocio == "PONTE ROLANTE 22") { $nameNegocio = "PR22"; }
  if ($nameNegocio == "PONTE ROLANTE 23") { $nameNegocio = "PR23"; }
  if ($nameNegocio == null) {$nameNegocio = ""; }
  if ($nameSistema == null) {$nameSistema = ""; } else {$nameSistema = $nameSistema." - ";}
  if ($descAtivo == null) {$descAtivo = ""; } else {$descAtivo = $descAtivo." - ";}
  $tb_normal[$indice_normal] = array(
                           'indice_normal' => $indice_normal,
                           'data' => $data_analise,
                           'idLaudo' => $idLaudo,
                           'descAtividade' => $descAtividade,
                           'descAtivo' => $descAtivo,
                           'descSistema' => $nameSistema,
                           'descNegocio' => $nameNegocio,
                           'status' => $statusAnalise,
                           'colorStatus' => $colorStatus
                           );
  $indice_normal++;
 }
 $tb_normal = collect($tb_normal)->sortBy('data')->reverse()->toArray();

 // TABELA STATUS ALARME
 $tabela_alarme = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 4);
 $indice_alarme = 0;
 $tb_alarme[0] = (['indice_alarme' => $indice_alarme,
                           'data' => $atual1,
                           'idLaudo' => "",
                           'descAtividade' => "de Atividade ",
                           'descAtivo' => "Registro ",
                           'descSistema' => "Sem ",
                           'descNegocio' => "S/L",
                           'status' => "",
                           'colorStatus' => ""]);
 foreach ($tabela_alarme as $key => $value) {
  $dateAnalise = $value->date_analise;
  $datef = json_encode($dateAnalise);
  $data_analise = substr($datef, 1, 11);
  $statusAnalise = $value->status_id;
  if ($statusAnalise == 4) {
    $statusAnalise = 'Alarme';
    $colorStatus = '#fff000';
  }
  $dado1 = $value->atividade_id;
  $dado2 = $value->id;
  $idLaudo = DB::table('laudos')->where('analise_id', '=', $dado2)->value('id');
  $descAtividade = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('description_ativ');
  $idAtivo = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('ativo_id');
  $descAtivo = DB::table('ativos')->where('id', '=', $idAtivo)->value('name_ativo');
  $idSistema = DB::table('ativos')->where('id', '=', $idAtivo)->value('sistema_id');
  $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema)->value('negocio_id');
  $nameSistema = DB::table('sistemas')->where('id', '=', $idSistema)->value('name_sistema');
  $nameNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
  if ($nameNegocio == "UNIDADE DE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "LAMINADOR REVERSIVEL DE TIRAS A FRIO 01") { $nameNegocio = "LRF"; }
  if ($nameNegocio == "DECAPAGEM 1") { $nameNegocio = "LDS"; }
  if ($nameNegocio == "GALVANIZACAO 1") { $nameNegocio = "LGC"; }
  if ($nameNegocio == "UNIDADE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE AFLUENTES (ETA)") { $nameNegocio = "ETA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE EFLUENTES (ETE)") { $nameNegocio = "ETE"; }
  if ($nameNegocio == "LCC 1") { $nameNegocio = "LCC1"; }
  if ($nameNegocio == "LCL 1") { $nameNegocio = "LCL1"; }
  if ($nameNegocio == "PINTURA 1") { $nameNegocio = "LPC"; }
  if ($nameNegocio == "PRODUCAO DE AR COMPRIMIDO") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PRODUCAO DE VAPOR") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PONTE ROLANTE 01") { $nameNegocio = "PR01"; }
  if ($nameNegocio == "PONTE ROLANTE 02") { $nameNegocio = "PR02"; }
  if ($nameNegocio == "PONTE ROLANTE 03") { $nameNegocio = "PR03"; }
  if ($nameNegocio == "PONTE ROLANTE 04") { $nameNegocio = "PR04"; }
  if ($nameNegocio == "PONTE ROLANTE 05") { $nameNegocio = "PR05"; }
  if ($nameNegocio == "PONTE ROLANTE 06") { $nameNegocio = "PR06"; }
  if ($nameNegocio == "PONTE ROLANTE 07") { $nameNegocio = "PR07"; }
  if ($nameNegocio == "PONTE ROLANTE 08") { $nameNegocio = "PR08"; }
  if ($nameNegocio == "PONTE ROLANTE 09") { $nameNegocio = "PR09"; }
  if ($nameNegocio == "PONTE ROLANTE 10") { $nameNegocio = "PR10"; }
  if ($nameNegocio == "PONTE ROLANTE 11") { $nameNegocio = "PR11"; }
  if ($nameNegocio == "PONTE ROLANTE 12") { $nameNegocio = "PR12"; }
  if ($nameNegocio == "PONTE ROLANTE 13") { $nameNegocio = "PR13"; }
  if ($nameNegocio == "PONTE ROLANTE 14") { $nameNegocio = "PR14"; }
  if ($nameNegocio == "PONTE ROLANTE 15") { $nameNegocio = "PR15"; }
  if ($nameNegocio == "PONTE ROLANTE 16") { $nameNegocio = "PR16"; }
  if ($nameNegocio == "PONTE ROLANTE 17") { $nameNegocio = "PR17"; }
  if ($nameNegocio == "PONTE ROLANTE 18") { $nameNegocio = "PR18"; }
  if ($nameNegocio == "PONTE ROLANTE 19") { $nameNegocio = "PR19"; }
  if ($nameNegocio == "PONTE ROLANTE 20") { $nameNegocio = "PR20"; }
  if ($nameNegocio == "PONTE ROLANTE 21") { $nameNegocio = "PR21"; }
  if ($nameNegocio == "PONTE ROLANTE 22") { $nameNegocio = "PR22"; }
  if ($nameNegocio == "PONTE ROLANTE 23") { $nameNegocio = "PR23"; }
  if ($nameNegocio == null) {$nameNegocio = ""; }
  if ($nameSistema == null) {$nameSistema = ""; } else {$nameSistema = $nameSistema." - ";}
  if ($descAtivo == null) {$descAtivo = ""; } else {$descAtivo = $descAtivo." - ";}
  $tb_alarme[$indice_alarme] = array(
                           'indice_alarme' => $indice_alarme,
                           'data' => $data_analise,
                           'idLaudo' => $idLaudo,
                           'descAtividade' => $descAtividade,
                           'descAtivo' => $descAtivo,
                           'descSistema' => $nameSistema,
                           'descNegocio' => $nameNegocio,
                           'status' => $statusAnalise,
                           'colorStatus' => $colorStatus
                           );
  $indice_alarme++;
 }
 $tb_alarme = collect($tb_alarme)->sortBy('data')->reverse()->toArray();

 // TABELA STATUS CRITICO
 $tabela_critico = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 5);
 $indice_critico = 0;
 $tb_critico[0] = (['indice_critico' => $indice_critico,
                           'data' => $atual1,
                           'idLaudo' => "",
                           'descAtividade' => "de Atividade ",
                           'descAtivo' => "Registro ",
                           'descSistema' => "Sem ",
                           'descNegocio' => "S/L",
                           'status' => "",
                           'colorStatus' => ""]);
 foreach ($tabela_critico as $key => $value) {
  $dateAnalise = $value->date_analise;
  $datef = json_encode($dateAnalise);
  $data_analise = substr($datef, 1, 11);
  $statusAnalise = $value->status_id;
  if ($statusAnalise == 5) {
    $statusAnalise = 'Crítico';
    $colorStatus = '#ff0000';
  }
  $dado1 = $value->atividade_id;
  $dado2 = $value->id;
  $idLaudo = DB::table('laudos')->where('analise_id', '=', $dado2)->value('id');
  $descAtividade = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('description_ativ');
  $idAtivo = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('ativo_id');
  $descAtivo = DB::table('ativos')->where('id', '=', $idAtivo)->value('name_ativo');
  $idSistema = DB::table('ativos')->where('id', '=', $idAtivo)->value('sistema_id');
  $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema)->value('negocio_id');
  $nameSistema = DB::table('sistemas')->where('id', '=', $idSistema)->value('name_sistema');
  $nameNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
  if ($nameNegocio == "UNIDADE DE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "LAMINADOR REVERSIVEL DE TIRAS A FRIO 01") { $nameNegocio = "LRF"; }
  if ($nameNegocio == "DECAPAGEM 1") { $nameNegocio = "LDS"; }
  if ($nameNegocio == "GALVANIZACAO 1") { $nameNegocio = "LGC"; }
  if ($nameNegocio == "UNIDADE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE AFLUENTES (ETA)") { $nameNegocio = "ETA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE EFLUENTES (ETE)") { $nameNegocio = "ETE"; }
  if ($nameNegocio == "LCC 1") { $nameNegocio = "LCC1"; }
  if ($nameNegocio == "LCL 1") { $nameNegocio = "LCL1"; }
  if ($nameNegocio == "PINTURA 1") { $nameNegocio = "LPC"; }
  if ($nameNegocio == "PRODUCAO DE AR COMPRIMIDO") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PRODUCAO DE VAPOR") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PONTE ROLANTE 01") { $nameNegocio = "PR01"; }
  if ($nameNegocio == "PONTE ROLANTE 02") { $nameNegocio = "PR02"; }
  if ($nameNegocio == "PONTE ROLANTE 03") { $nameNegocio = "PR03"; }
  if ($nameNegocio == "PONTE ROLANTE 04") { $nameNegocio = "PR04"; }
  if ($nameNegocio == "PONTE ROLANTE 05") { $nameNegocio = "PR05"; }
  if ($nameNegocio == "PONTE ROLANTE 06") { $nameNegocio = "PR06"; }
  if ($nameNegocio == "PONTE ROLANTE 07") { $nameNegocio = "PR07"; }
  if ($nameNegocio == "PONTE ROLANTE 08") { $nameNegocio = "PR08"; }
  if ($nameNegocio == "PONTE ROLANTE 09") { $nameNegocio = "PR09"; }
  if ($nameNegocio == "PONTE ROLANTE 10") { $nameNegocio = "PR10"; }
  if ($nameNegocio == "PONTE ROLANTE 11") { $nameNegocio = "PR11"; }
  if ($nameNegocio == "PONTE ROLANTE 12") { $nameNegocio = "PR12"; }
  if ($nameNegocio == "PONTE ROLANTE 13") { $nameNegocio = "PR13"; }
  if ($nameNegocio == "PONTE ROLANTE 14") { $nameNegocio = "PR14"; }
  if ($nameNegocio == "PONTE ROLANTE 15") { $nameNegocio = "PR15"; }
  if ($nameNegocio == "PONTE ROLANTE 16") { $nameNegocio = "PR16"; }
  if ($nameNegocio == "PONTE ROLANTE 17") { $nameNegocio = "PR17"; }
  if ($nameNegocio == "PONTE ROLANTE 18") { $nameNegocio = "PR18"; }
  if ($nameNegocio == "PONTE ROLANTE 19") { $nameNegocio = "PR19"; }
  if ($nameNegocio == "PONTE ROLANTE 20") { $nameNegocio = "PR20"; }
  if ($nameNegocio == "PONTE ROLANTE 21") { $nameNegocio = "PR21"; }
  if ($nameNegocio == "PONTE ROLANTE 22") { $nameNegocio = "PR22"; }
  if ($nameNegocio == "PONTE ROLANTE 23") { $nameNegocio = "PR23"; }
  if ($nameNegocio == null) {$nameNegocio = ""; }
  if ($nameSistema == null) {$nameSistema = ""; } else {$nameSistema = $nameSistema." - ";}
  if ($descAtivo == null) {$descAtivo = ""; } else {$descAtivo = $descAtivo." - ";}
  $tb_critico[$indice_critico] = array(
                           'indice_critico' => $indice_critico,
                           'data' => $data_analise,
                           'idLaudo' => $idLaudo,
                           'descAtividade' => $descAtividade,
                           'descAtivo' => $descAtivo,
                           'descSistema' => $nameSistema,
                           'descNegocio' => $nameNegocio,
                           'status' => $statusAnalise,
                           'colorStatus' => $colorStatus
                           );
  $indice_critico++;
 }
 $tb_critico = collect($tb_critico)->sortBy('data')->reverse()->toArray();

 // TABELA STATUS MANUTENCAO
 $tabela_manutencao = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 1);
 $indice_manutencao = 0;
 $tb_manutencao[0] = (['indice_manutencao' => $indice_manutencao,
                           'data' => $atual1,
                           'idLaudo' => "",
                           'descAtividade' => "de Atividade ",
                           'descAtivo' => "Registro ",
                           'descSistema' => "Sem ",
                           'descNegocio' => "S/L",
                           'status' => "",
                           'colorStatus' => ""]);
 foreach ($tabela_manutencao as $key => $value) {
  $dateAnalise = $value->date_analise;
  $datef = json_encode($dateAnalise);
  $data_analise = substr($datef, 1, 11);
  $statusAnalise = $value->status_id;
  if ($statusAnalise == 1) {
    $statusAnalise = 'Manutenção';
    $colorStatus = '#c0c2c6';
  }
  $dado1 = $value->atividade_id;
  $dado2 = $value->id;
  $idLaudo = DB::table('laudos')->where('analise_id', '=', $dado2)->value('id');
  $descAtividade = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('description_ativ');
  $idAtivo = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('ativo_id');
  $descAtivo = DB::table('ativos')->where('id', '=', $idAtivo)->value('name_ativo');
  $idSistema = DB::table('ativos')->where('id', '=', $idAtivo)->value('sistema_id');
  $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema)->value('negocio_id');
  $nameSistema = DB::table('sistemas')->where('id', '=', $idSistema)->value('name_sistema');
  $nameNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
  if ($nameNegocio == "UNIDADE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "LAMINADOR REVERSIVEL DE TIRAS A FRIO 01") { $nameNegocio = "LRF"; }
  if ($nameNegocio == "DECAPAGEM 1") { $nameNegocio = "LDS"; }
  if ($nameNegocio == "GALVANIZACAO 1") { $nameNegocio = "LGC"; }
  if ($nameNegocio == "UNIDADE DE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE AFLUENTES (ETA)") { $nameNegocio = "ETA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE EFLUENTES (ETE)") { $nameNegocio = "ETE"; }
  if ($nameNegocio == "LCC 1") { $nameNegocio = "LCC1"; }
  if ($nameNegocio == "LCL 1") { $nameNegocio = "LCL1"; }
  if ($nameNegocio == "PINTURA 1") { $nameNegocio = "LPC"; }
  if ($nameNegocio == "PRODUCAO DE AR COMPRIMIDO") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PRODUCAO DE VAPOR") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PONTE ROLANTE 01") { $nameNegocio = "PR01"; }
  if ($nameNegocio == "PONTE ROLANTE 02") { $nameNegocio = "PR02"; }
  if ($nameNegocio == "PONTE ROLANTE 03") { $nameNegocio = "PR03"; }
  if ($nameNegocio == "PONTE ROLANTE 04") { $nameNegocio = "PR04"; }
  if ($nameNegocio == "PONTE ROLANTE 05") { $nameNegocio = "PR05"; }
  if ($nameNegocio == "PONTE ROLANTE 06") { $nameNegocio = "PR06"; }
  if ($nameNegocio == "PONTE ROLANTE 07") { $nameNegocio = "PR07"; }
  if ($nameNegocio == "PONTE ROLANTE 08") { $nameNegocio = "PR08"; }
  if ($nameNegocio == "PONTE ROLANTE 09") { $nameNegocio = "PR09"; }
  if ($nameNegocio == "PONTE ROLANTE 10") { $nameNegocio = "PR10"; }
  if ($nameNegocio == "PONTE ROLANTE 11") { $nameNegocio = "PR11"; }
  if ($nameNegocio == "PONTE ROLANTE 12") { $nameNegocio = "PR12"; }
  if ($nameNegocio == "PONTE ROLANTE 13") { $nameNegocio = "PR13"; }
  if ($nameNegocio == "PONTE ROLANTE 14") { $nameNegocio = "PR14"; }
  if ($nameNegocio == "PONTE ROLANTE 15") { $nameNegocio = "PR15"; }
  if ($nameNegocio == "PONTE ROLANTE 16") { $nameNegocio = "PR16"; }
  if ($nameNegocio == "PONTE ROLANTE 17") { $nameNegocio = "PR17"; }
  if ($nameNegocio == "PONTE ROLANTE 18") { $nameNegocio = "PR18"; }
  if ($nameNegocio == "PONTE ROLANTE 19") { $nameNegocio = "PR19"; }
  if ($nameNegocio == "PONTE ROLANTE 20") { $nameNegocio = "PR20"; }
  if ($nameNegocio == "PONTE ROLANTE 21") { $nameNegocio = "PR21"; }
  if ($nameNegocio == "PONTE ROLANTE 22") { $nameNegocio = "PR22"; }
  if ($nameNegocio == "PONTE ROLANTE 23") { $nameNegocio = "PR23"; }
  if ($nameNegocio == null) {$nameNegocio = ""; }
  if ($nameSistema == null) {$nameSistema = ""; } else {$nameSistema = $nameSistema." - ";}
  if ($descAtivo == null) {$descAtivo = ""; } else {$descAtivo = $descAtivo." - ";}
  $tb_manutencao[$indice_manutencao] = array(
                           'indice_manutencao' => $indice_manutencao,
                           'data' => $data_analise,
                           'idLaudo' => $idLaudo,
                           'descAtividade' => $descAtividade,
                           'descAtivo' => $descAtivo,
                           'descSistema' => $nameSistema,
                           'descNegocio' => $nameNegocio,
                           'status' => $statusAnalise,
                           'colorStatus' => $colorStatus
                           );
  $indice_manutencao++;
 }
 $tb_manutencao = collect($tb_manutencao)->sortBy('data')->reverse()->toArray();

 // TABELA STATUS STANDBY
 $tabela_standBy = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 2);
 $indice_standBy = 0;
 $tb_standBy[0] = (['indice_standBy' => $indice_standBy,
                           'data' => $atual1,
                           'idLaudo' => "",
                           'descAtividade' => "de Atividade ",
                           'descAtivo' => "Registro ",
                           'descSistema' => "Sem ",
                           'descNegocio' => "S/L",
                           'status' => "",
                           'colorStatus' => ""]);
 foreach ($tabela_standBy as $key => $value) {
  $dateAnalise = $value->date_analise;
  $datef = json_encode($dateAnalise);
  $data_analise = substr($datef, 1, 11);
  $statusAnalise = $value->status_id;
  if ($statusAnalise == 2) {
    $statusAnalise = 'StandBy';
    $colorStatus = '#0066cc';
  }
  $dado1 = $value->atividade_id;
  $dado2 = $value->id;
  $idLaudo = DB::table('laudos')->where('analise_id', '=', $dado2)->value('id');
  $descAtividade = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('description_ativ');
  $idAtivo = DB::table('preditiva_atividades')->where('id', '=', $dado1)->value('ativo_id');
  $descAtivo = DB::table('ativos')->where('id', '=', $idAtivo)->value('name_ativo');
  $idSistema = DB::table('ativos')->where('id', '=', $idAtivo)->value('sistema_id');
  $idNegocio = DB::table('sistemas')->where('id', '=', $idSistema)->value('negocio_id');
  $nameSistema = DB::table('sistemas')->where('id', '=', $idSistema)->value('name_sistema');
  $nameNegocio = DB::table('negocios')->where('id', '=', $idNegocio)->value('name_negocio');
  if ($nameNegocio == "UNIDADE DE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "LAMINADOR REVERSIVEL DE TIRAS A FRIO 01") { $nameNegocio = "LRF"; }
  if ($nameNegocio == "DECAPAGEM 1") { $nameNegocio = "LDS"; }
  if ($nameNegocio == "GALVANIZACAO 1") { $nameNegocio = "LGC"; }
  if ($nameNegocio == "UNIDADE REGENERACAO DE ACIDO 1") { $nameNegocio = "URA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE AFLUENTES (ETA)") { $nameNegocio = "ETA"; }
  if ($nameNegocio == "ESTACAO DE TRATAMENTO DE EFLUENTES (ETE)") { $nameNegocio = "ETE"; }
  if ($nameNegocio == "LCC 1") { $nameNegocio = "LCC1"; }
  if ($nameNegocio == "LCL 1") { $nameNegocio = "LCL1"; }
  if ($nameNegocio == "PINTURA 1") { $nameNegocio = "LPC"; }
  if ($nameNegocio == "PRODUCAO DE AR COMPRIMIDO") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PRODUCAO DE VAPOR") { $nameNegocio = "UTI"; }
  if ($nameNegocio == "PONTE ROLANTE 01") { $nameNegocio = "PR01"; }
  if ($nameNegocio == "PONTE ROLANTE 02") { $nameNegocio = "PR02"; }
  if ($nameNegocio == "PONTE ROLANTE 03") { $nameNegocio = "PR03"; }
  if ($nameNegocio == "PONTE ROLANTE 04") { $nameNegocio = "PR04"; }
  if ($nameNegocio == "PONTE ROLANTE 05") { $nameNegocio = "PR05"; }
  if ($nameNegocio == "PONTE ROLANTE 06") { $nameNegocio = "PR06"; }
  if ($nameNegocio == "PONTE ROLANTE 07") { $nameNegocio = "PR07"; }
  if ($nameNegocio == "PONTE ROLANTE 08") { $nameNegocio = "PR08"; }
  if ($nameNegocio == "PONTE ROLANTE 09") { $nameNegocio = "PR09"; }
  if ($nameNegocio == "PONTE ROLANTE 10") { $nameNegocio = "PR10"; }
  if ($nameNegocio == "PONTE ROLANTE 11") { $nameNegocio = "PR11"; }
  if ($nameNegocio == "PONTE ROLANTE 12") { $nameNegocio = "PR12"; }
  if ($nameNegocio == "PONTE ROLANTE 13") { $nameNegocio = "PR13"; }
  if ($nameNegocio == "PONTE ROLANTE 14") { $nameNegocio = "PR14"; }
  if ($nameNegocio == "PONTE ROLANTE 15") { $nameNegocio = "PR15"; }
  if ($nameNegocio == "PONTE ROLANTE 16") { $nameNegocio = "PR16"; }
  if ($nameNegocio == "PONTE ROLANTE 17") { $nameNegocio = "PR17"; }
  if ($nameNegocio == "PONTE ROLANTE 18") { $nameNegocio = "PR18"; }
  if ($nameNegocio == "PONTE ROLANTE 19") { $nameNegocio = "PR19"; }
  if ($nameNegocio == "PONTE ROLANTE 20") { $nameNegocio = "PR20"; }
  if ($nameNegocio == "PONTE ROLANTE 21") { $nameNegocio = "PR21"; }
  if ($nameNegocio == "PONTE ROLANTE 22") { $nameNegocio = "PR22"; }
  if ($nameNegocio == "PONTE ROLANTE 23") { $nameNegocio = "PR23"; }
  if ($nameNegocio == null) {$nameNegocio = ""; }
  if ($nameSistema == null) {$nameSistema = ""; } else {$nameSistema = $nameSistema." - ";}
  if ($descAtivo == null) {$descAtivo = ""; } else {$descAtivo = $descAtivo." - ";}
  $tb_standBy[$indice_standBy] = array(
                           'indice_standBy' => $indice_standBy,
                           'data' => $data_analise,
                           'idLaudo' => $idLaudo,
                           'descAtividade' => $descAtividade,
                           'descAtivo' => $descAtivo,
                           'descSistema' => $nameSistema,
                           'descNegocio' => $nameNegocio,
                           'status' => $statusAnalise,
                           'colorStatus' => $colorStatus
                           );
  $indice_standBy++;
 }
 $tb_standBy = collect($tb_standBy)->sortBy('data')->reverse()->toArray();

 // ============================================================ STATUS DOS PONTOS
 $atual2 = Carbon::now()->subMonths(0)->format('Y-m-01');
 $atual3 = Carbon::now()->subMonths(1)->format('Y-m-01');
 $atual4 = Carbon::now()->subMonths(2)->format('Y-m-01');
 $atual5 = Carbon::now()->subMonths(3)->format('Y-m-01');
 $atual6 = Carbon::now()->subMonths(4)->format('Y-m-01');
 $atual7 = Carbon::now()->subMonths(5)->format('Y-m-01');
 $atual8 = Carbon::now()->subMonths(6)->format('Y-m-01');
 $atual9 = Carbon::now()->subMonths(7)->format('Y-m-01');
 $atual10 = Carbon::now()->subMonths(8)->format('Y-m-01');
 $atual11 = Carbon::now()->subMonths(9)->format('Y-m-01');
 $atual12 = Carbon::now()->subMonths(10)->format('Y-m-01');

 $normal1 = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 3)->count();
 $alarme1 = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 4)->count();
 $critico1 = aux::GeralAnormalidadesTR($atual1)->where('status_id', '=', 5)->count();
 $normal2 = aux::GeralAnormalidadesTR($atual2)->where('status_id', '=', 3)->count();
 $alarme2 = aux::GeralAnormalidadesTR($atual2)->where('status_id', '=', 4)->count();
 $critico2 = aux::GeralAnormalidadesTR($atual2)->where('status_id', '=', 5)->count();
 $normal3 = aux::GeralAnormalidadesTR($atual3)->where('status_id', '=', 3)->count();
 $alarme3 = aux::GeralAnormalidadesTR($atual3)->where('status_id', '=', 4)->count();
 $critico3 = aux::GeralAnormalidadesTR($atual3)->where('status_id', '=', 5)->count();
 $normal4 = aux::GeralAnormalidadesTR($atual4)->where('status_id', '=', 3)->count();
 $alarme4 = aux::GeralAnormalidadesTR($atual4)->where('status_id', '=', 4)->count();
 $critico4 = aux::GeralAnormalidadesTR($atual4)->where('status_id', '=', 5)->count();
 $normal5 = aux::GeralAnormalidadesTR($atual5)->where('status_id', '=', 3)->count();
 $alarme5 = aux::GeralAnormalidadesTR($atual5)->where('status_id', '=', 4)->count();
 $critico5 = aux::GeralAnormalidadesTR($atual5)->where('status_id', '=', 5)->count();
 $normal6 = aux::GeralAnormalidadesTR($atual6)->where('status_id', '=', 3)->count();
 $alarme6 = aux::GeralAnormalidadesTR($atual6)->where('status_id', '=', 4)->count();
 $critico6 = aux::GeralAnormalidadesTR($atual6)->where('status_id', '=', 5)->count();
 $normal7 = aux::GeralAnormalidadesTR($atual7)->where('status_id', '=', 3)->count();
 $alarme7 = aux::GeralAnormalidadesTR($atual7)->where('status_id', '=', 4)->count();
 $critico7 = aux::GeralAnormalidadesTR($atual7)->where('status_id', '=', 5)->count();
 $normal8 = aux::GeralAnormalidadesTR($atual8)->where('status_id', '=', 3)->count();
 $alarme8 = aux::GeralAnormalidadesTR($atual8)->where('status_id', '=', 4)->count();
 $critico8 = aux::GeralAnormalidadesTR($atual8)->where('status_id', '=', 5)->count();
 $normal9 = aux::GeralAnormalidadesTR($atual9)->where('status_id', '=', 3)->count();
 $alarme9 = aux::GeralAnormalidadesTR($atual9)->where('status_id', '=', 4)->count();
 $critico9 = aux::GeralAnormalidadesTR($atual9)->where('status_id', '=', 5)->count();
 $normal10 = aux::GeralAnormalidadesTR($atual10)->where('status_id', '=', 3)->count();
 $alarme10 = aux::GeralAnormalidadesTR($atual10)->where('status_id', '=', 4)->count();
 $critico10 = aux::GeralAnormalidadesTR($atual10)->where('status_id', '=', 5)->count();
 $normal11 = aux::GeralAnormalidadesTR($atual11)->where('status_id', '=', 3)->count();
 $alarme11 = aux::GeralAnormalidadesTR($atual11)->where('status_id', '=', 4)->count();
 $critico11 = aux::GeralAnormalidadesTR($atual11)->where('status_id', '=', 5)->count();
 $normal12 = aux::GeralAnormalidadesTR($atual12)->where('status_id', '=', 3)->count();
 $alarme12 = aux::GeralAnormalidadesTR($atual12)->where('status_id', '=', 4)->count();
 $critico12 = aux::GeralAnormalidadesTR($atual12)->where('status_id', '=', 5)->count();

// ============================================================ ANORMALIDADES
 $atualf1 = aux::FormatDateMonth(0);
 $atualf2 = aux::FormatDateMonth(1);
 $atualf3 = aux::FormatDateMonth(2);
 $atualf4 = aux::FormatDateMonth(3);
 $atualf5 = aux::FormatDateMonth(4);
 $atualf6 = aux::FormatDateMonth(5);
 $atualf7 = aux::FormatDateMonth(6);
 $atualf8 = aux::FormatDateMonth(7);
 $atualf9 = aux::FormatDateMonth(8);
 $atualf10 = aux::FormatDateMonth(9);
 $atualf11 = aux::FormatDateMonth(10);
 $atualf12 = aux::FormatDateMonth(11);

 if($alarme1 == null){$alarme1 = 0;}
 if($critico1 == null){$critico1 = 0;}
 $alarme1P_format = ($alarme1 / $sum)*100;
 $critico1P_format = ($critico1 / $sum)*100;
 $alarme1_anorm = number_format($alarme1P_format,2,".",",");
 $critico1_anorm = number_format($critico1P_format,2,".",",");

 if($alarme2 == null){$alarme2 = 0;}
 if($critico2 == null){$critico2 = 0;}
 $alarme2P_format = ($alarme2 / $sum)*100;
 $critico2P_format = ($critico2 / $sum)*100;
 $alarme2_anorm = number_format($alarme2P_format,2,".",",");
 $critico2_anorm = number_format($critico2P_format,2,".",",");

 if($alarme3 == null){$alarme3 = 0;}
 if($critico3 == null){$critico3 = 0;}
 $alarme3P_format = ($alarme3 / $sum)*100;
 $critico3P_format = ($critico3 / $sum)*100;
 $alarme3_anorm = number_format($alarme3P_format,2,".",",");
 $critico3_anorm = number_format($critico3P_format,2,".",",");

 if($alarme4 == null){$alarme4P = 0;}
 if($critico4 == null){$critico4P = 0;}
 $alarme4P_format = ($alarme4 / $sum)*100;
 $critico4P_format = ($critico4 / $sum)*100;
 $alarme4_anorm = number_format($alarme4P_format,2,".",",");
 $critico4_anorm = number_format($critico4P_format,2,".",",");

 if($alarme5 == null){$alarme5 = 0;}
 if($critico5 == null){$critico5 = 0;}
 $alarme5P_format = ($alarme5 / $sum)*100;
 $critico5P_format = ($critico5 / $sum)*100;
 $alarme5_anorm = number_format($alarme5P_format,2,".",",");
 $critico5_anorm = number_format($critico5P_format,2,".",",");

 if($alarme6 == null){$alarme6 = 0;}
 if($critico6 == null){$critico6 = 0;}
 $alarme6P_format = ($alarme6 / $sum)*100;
 $critico6P_format = ($critico6 / $sum)*100;
 $alarme6_anorm = number_format($alarme6P_format,2,".",",");
 $critico6_anorm = number_format($critico6P_format,2,".",",");

 if($alarme7 == null){$alarme7 = 0;}
 if($critico7 == null){$critico7 = 0;}
 $alarme7P_format = ($alarme7 / $sum)*100;
 $critico7P_format = ($critico7 / $sum)*100;
 $alarme7_anorm = number_format($alarme7P_format,2,".",",");
 $critico7_anorm = number_format($critico7P_format,2,".",",");

 if($alarme8 == null){$alarme8 = 0;}
 if($critico8 == null){$critico8 = 0;}
 $alarme8P_format = ($alarme8 / $sum)*100;
 $critico8P_format = ($critico8 / $sum)*100;
 $alarme8_anorm = number_format($alarme8P_format,2,".",",");
 $critico8_anorm = number_format($critico8P_format,2,".",",");

 if($alarme9 == null){$alarme9 = 0;}
 if($critico9 == null){$critico9 = 0;}
 $alarme9P_format = ($alarme9 / $sum)*100;
 $critico9P_format = ($critico9 / $sum)*100;
 $alarme9_anorm = number_format($alarme9P_format,2,".",",");
 $critico9_anorm = number_format($critico9P_format,2,".",",");

 if($alarme10 == null){$alarme10 = 0;}
 if($critico10 == null){$critico10 = 0;}
 $alarme10P_format = ($alarme10 / $sum)*100;
 $critico10P_format = ($critico10 / $sum)*100;
 $alarme10_anorm = number_format($alarme10P_format,2,".",",");
 $critico10_anorm = number_format($critico10P_format,2,".",",");

 if($alarme11 == null){$alarme11 = 0;}
 if($critico11 == null){$critico11 = 0;}
 $alarme11P_format = ($alarme11 / $sum)*100;
 $critico11P_format = ($critico11 / $sum)*100;
 $alarme11_anorm = number_format($alarme11P_format,2,".",",");
 $critico11_anorm = number_format($critico11P_format,2,".",",");

 if($alarme12 == null){$alarme12 = 0;}
 if($critico12 == null){$critico12 = 0;}
 $alarme12P_format = ($alarme12 / $sum)*100;
 $critico12P_format = ($critico12 / $sum)*100;
 $alarme12_anorm = number_format($alarme12P_format,2,".",",");
 $critico12_anorm = number_format($critico12P_format,2,".",",");

 // ============================================================ PROBLEMAS ENCONTRADOS
 $trincas1 = aux::GeralAnormalidadesTR($atual1)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento1 = aux::GeralAnormalidadesTR($atual1)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera1 = aux::GeralAnormalidadesTR($atual1)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera1 = aux::GeralAnormalidadesTR($atual1)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas2 = aux::GeralAnormalidadesTR($atual2)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento2 = aux::GeralAnormalidadesTR($atual2)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera2 = aux::GeralAnormalidadesTR($atual2)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera2 = aux::GeralAnormalidadesTR($atual2)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas3 = aux::GeralAnormalidadesTR($atual3)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento3 = aux::GeralAnormalidadesTR($atual3)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera3 = aux::GeralAnormalidadesTR($atual3)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera3 = aux::GeralAnormalidadesTR($atual3)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas4 = aux::GeralAnormalidadesTR($atual4)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento4 = aux::GeralAnormalidadesTR($atual4)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera4 = aux::GeralAnormalidadesTR($atual4)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera4 = aux::GeralAnormalidadesTR($atual4)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas5 = aux::GeralAnormalidadesTR($atual5)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento5 = aux::GeralAnormalidadesTR($atual5)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera5 = aux::GeralAnormalidadesTR($atual5)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera5 = aux::GeralAnormalidadesTR($atual5)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas6 = aux::GeralAnormalidadesTR($atual6)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento6 = aux::GeralAnormalidadesTR($atual6)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera6 = aux::GeralAnormalidadesTR($atual6)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera6 = aux::GeralAnormalidadesTR($atual6)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas7 = aux::GeralAnormalidadesTR($atual7)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento7 = aux::GeralAnormalidadesTR($atual7)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera7 = aux::GeralAnormalidadesTR($atual7)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera7 = aux::GeralAnormalidadesTR($atual7)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas8 = aux::GeralAnormalidadesTR($atual8)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento8 = aux::GeralAnormalidadesTR($atual8)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera8 = aux::GeralAnormalidadesTR($atual8)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera8 = aux::GeralAnormalidadesTR($atual8)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas9 = aux::GeralAnormalidadesTR($atual9)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento9 = aux::GeralAnormalidadesTR($atual9)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera9 = aux::GeralAnormalidadesTR($atual9)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera9 = aux::GeralAnormalidadesTR($atual9)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas10 = aux::GeralAnormalidadesTR($atual10)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento10 = aux::GeralAnormalidadesTR($atual10)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera10 = aux::GeralAnormalidadesTR($atual10)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera10 = aux::GeralAnormalidadesTR($atual10)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas11 = aux::GeralAnormalidadesTR($atual11)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento11 = aux::GeralAnormalidadesTR($atual11)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera11 = aux::GeralAnormalidadesTR($atual11)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera11 = aux::GeralAnormalidadesTR($atual11)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 $trincas12 = aux::GeralAnormalidadesTR($atual12)->where('diagnostico_id', '=', 6)->count('diagnostico_id');
 $faltaIsolamento12 = aux::GeralAnormalidadesTR($atual12)->where('diagnostico_id', '=', 7)->count('diagnostico_id');
 $faltaRefrigera12 = aux::GeralAnormalidadesTR($atual12)->where('diagnostico_id', '=', 8)->count('diagnostico_id');
 $trincaFaltaRefrigera12 = aux::GeralAnormalidadesTR($atual12)->where('diagnostico_id', '=', 38)->count('diagnostico_id');

 return view('csn.relatorioGerencial.includes.indexRelGerTR')->with('title', $title)->with('sum', $sum)
 ->with('normal', $normal)->with('alarme', $alarme)->with('critico', $critico)->with('manutencao', $manutencao)->with('standBy', $standBy)
 ->with('normalP', $normalP)->with('alarmeP', $alarmeP)->with('criticoP', $criticoP)->with('manutencaoP', $manutencaoP)->with('standByP', $standByP)
   ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)->with('ura_manutencao', $ura_manutencao)->with('ura_standBy', $standBy)
   ->with('ura_normalP', $ura_normalP)->with('ura_alarmeP', $ura_alarmeP)->with('ura_criticoP', $ura_criticoP)->with('ura_manutencaoP', $ura_manutencaoP)->with('ura_standByP', $ura_standByP)
     ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)->with('lds_manutencao', $lds_manutencao)->with('lds_standBy', $lds_standBy)
     ->with('lds_normalP', $lds_normalP)->with('lds_alarmeP', $lds_alarmeP)->with('lds_criticoP', $lds_criticoP)->with('lds_manutencaoP', $lds_manutencaoP)->with('lds_standByP', $lds_standByP)
        ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)->with('lgc_manutencao', $lgc_manutencao)->with('lgc_standBy', $lgc_standBy)
        ->with('lgc_normalP', $lgc_normalP)->with('lgc_alarmeP', $lgc_alarmeP)->with('lgc_criticoP', $lgc_criticoP)->with('lgc_manutencaoP', $lgc_manutencaoP)->with('lgc_standByP', $lgc_standByP)
          ->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)->with('lpc_manutencao', $lpc_manutencao)->with('lpc_standBy', $lpc_standBy)
          ->with('lpc_normalP', $lpc_normalP)->with('lpc_alarmeP', $lpc_alarmeP)->with('lpc_criticoP', $lpc_criticoP)->with('lpc_manutencaoP', $lpc_manutencaoP)->with('lpc_standByP', $lpc_standByP)
             ->with('tabela', $tabela)->with('tb_anormalidades', $tb_anormalidades)->with('tb_normal', $tb_normal)->with('tb_alarme', $tb_alarme)
             ->with('tb_critico', $tb_critico)->with('tb_manutencao', $tb_manutencao)->with('tb_standBy', $tb_standBy)
               ->with('atual1', $atual1)->with('normal1', $normal1)->with('alarme1', $alarme1)->with('critico1', $critico1)
               ->with('atual2', $atual2)->with('normal2', $normal2)->with('alarme2', $alarme2)->with('critico2', $critico2)
               ->with('atual3', $atual3)->with('normal3', $normal3)->with('alarme3', $alarme3)->with('critico3', $critico3)
               ->with('atual4', $atual4)->with('normal4', $normal4)->with('alarme4', $alarme4)->with('critico4', $critico4)
               ->with('atual5', $atual5)->with('normal5', $normal5)->with('alarme5', $alarme5)->with('critico5', $critico5)
               ->with('atual6', $atual6)->with('normal6', $normal6)->with('alarme6', $alarme6)->with('critico6', $critico6)
               ->with('atual7', $atual7)->with('normal7', $normal7)->with('alarme7', $alarme7)->with('critico7', $critico7)
               ->with('atual8', $atual8)->with('normal8', $normal8)->with('alarme8', $alarme8)->with('critico8', $critico8)
               ->with('atual9', $atual9)->with('normal9', $normal9)->with('alarme9', $alarme9)->with('critico9', $critico9)
               ->with('atual10', $atual10)->with('normal10', $normal10)->with('alarme10', $alarme10)->with('critico10', $critico10)
               ->with('atual11', $atual11)->with('normal11', $normal11)->with('alarme11', $alarme11)->with('critico11', $critico11)
               ->with('atual12', $atual12)->with('normal12', $normal12)->with('alarme12', $alarme12)->with('critico12', $critico12)
               ->with('atualf1', $atualf1)->with('alarme1_anorm', $alarme1_anorm)->with('critico1_anorm', $critico1_anorm)
               ->with('atualf2', $atualf2)->with('alarme2_anorm', $alarme2_anorm)->with('critico2_anorm', $critico2_anorm)
               ->with('atualf3', $atualf3)->with('alarme3_anorm', $alarme3_anorm)->with('critico3_anorm', $critico3_anorm)
               ->with('atualf4', $atualf4)->with('alarme4_anorm', $alarme4_anorm)->with('critico4_anorm', $critico4_anorm)
               ->with('atualf5', $atualf5)->with('alarme5_anorm', $alarme5_anorm)->with('critico5_anorm', $critico5_anorm)
               ->with('atualf6', $atualf6)->with('alarme6_anorm', $alarme6_anorm)->with('critico6_anorm', $critico6_anorm)
               ->with('atualf7', $atualf7)->with('alarme7_anorm', $alarme7_anorm)->with('critico7_anorm', $critico7_anorm)
               ->with('atualf8', $atualf8)->with('alarme8_anorm', $alarme8_anorm)->with('critico8_anorm', $critico8_anorm)
               ->with('atualf9', $atualf9)->with('alarme9_anorm', $alarme9_anorm)->with('critico9_anorm', $critico9_anorm)
               ->with('atualf10', $atualf10)->with('alarme10_anorm', $alarme10_anorm)->with('critico10_anorm', $critico10_anorm)
               ->with('atualf11', $atualf11)->with('alarme11_anorm', $alarme11_anorm)->with('critico11_anorm', $critico11_anorm)
               ->with('atualf12', $atualf12)->with('alarme12_anorm', $alarme12_anorm)->with('critico12_anorm', $critico12_anorm)
               ->with('trincas1', $trincas1)->with('faltaIsolamento1', $faltaIsolamento1)->with('faltaRefrigera1', $faltaRefrigera1)->with('trincaFaltaRefrigera1', $trincaFaltaRefrigera1)
               ->with('trincas2', $trincas2)->with('faltaIsolamento2', $faltaIsolamento2)->with('faltaRefrigera2', $faltaRefrigera2)->with('trincaFaltaRefrigera2', $trincaFaltaRefrigera2)
               ->with('trincas3', $trincas3)->with('faltaIsolamento3', $faltaIsolamento3)->with('faltaRefrigera3', $faltaRefrigera3)->with('trincaFaltaRefrigera3', $trincaFaltaRefrigera3)
               ->with('trincas4', $trincas4)->with('faltaIsolamento4', $faltaIsolamento4)->with('faltaRefrigera4', $faltaRefrigera4)->with('trincaFaltaRefrigera4', $trincaFaltaRefrigera4)
               ->with('trincas5', $trincas5)->with('faltaIsolamento5', $faltaIsolamento5)->with('faltaRefrigera5', $faltaRefrigera5)->with('trincaFaltaRefrigera5', $trincaFaltaRefrigera5)
               ->with('trincas6', $trincas6)->with('faltaIsolamento6', $faltaIsolamento6)->with('faltaRefrigera6', $faltaRefrigera6)->with('trincaFaltaRefrigera6', $trincaFaltaRefrigera6)
               ->with('trincas7', $trincas7)->with('faltaIsolamento7', $faltaIsolamento7)->with('faltaRefrigera7', $faltaRefrigera7)->with('trincaFaltaRefrigera7', $trincaFaltaRefrigera7)
               ->with('trincas8', $trincas8)->with('faltaIsolamento8', $faltaIsolamento8)->with('faltaRefrigera8', $faltaRefrigera8)->with('trincaFaltaRefrigera8', $trincaFaltaRefrigera8)
               ->with('trincas9', $trincas9)->with('faltaIsolamento9', $faltaIsolamento9)->with('faltaRefrigera9', $faltaRefrigera9)->with('trincaFaltaRefrigera9', $trincaFaltaRefrigera9)
               ->with('trincas10', $trincas10)->with('faltaIsolamento10', $faltaIsolamento10)->with('faltaRefrigera10', $faltaRefrigera10)->with('trincaFaltaRefrigera10', $trincaFaltaRefrigera10)
               ->with('trincas11', $trincas11)->with('faltaIsolamento11', $faltaIsolamento11)->with('faltaRefrigera11', $faltaRefrigera11)->with('trincaFaltaRefrigera11', $trincaFaltaRefrigera11)
               ->with('trincas12', $trincas12)->with('faltaIsolamento12', $faltaIsolamento12)->with('faltaRefrigera12', $faltaRefrigera12)->with('trincaFaltaRefrigera12', $trincaFaltaRefrigera12);
  }

}
//==========================================fim=================================================================

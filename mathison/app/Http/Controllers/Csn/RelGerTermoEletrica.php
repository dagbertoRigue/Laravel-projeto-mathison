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

class RelGerTermoEletrica extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
  */
  public function GeralPerfil() {

    $title = 'Perfil | GGOP PR';
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');

    // ============================================================ GGOP PR
    $manutencao = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 1)->count();
    $standBy = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 2)->count();
    $normal = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 3)->count();
    $alarme = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 4)->count();
    $critico = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 5)->count();

    if($manutencao == null){$manutencao = 0;}
    if($standBy == null){$standBy = 0;}
    if($normal == null){$normal = 0;}
    if($alarme == null){$alarme = 0;}
    if($critico == null){$critico = 0;}

    $sum = Preditiva_atividades::where('tecnicas_id', '=', 1)->count();
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

    $ura_manutencao = aux::GeralPorLinhaTE($atual1, 1, $ura_linha1, $ura_linha2);
    $ura_standBy = aux::GeralPorLinhaTE($atual1, 2, $ura_linha1, $ura_linha2);
    $ura_normal = aux::GeralPorLinhaTE($atual1, 3, $ura_linha1, $ura_linha2);
    $ura_alarme = aux::GeralPorLinhaTE($atual1, 4, $ura_linha1, $ura_linha2);
    $ura_critico = aux::GeralPorLinhaTE($atual1, 5, $ura_linha1, $ura_linha2);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
               ->count('preditiva_atividades.id');

    $ura_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',0)
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
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

    $lds_manutencao = aux::GeralPorLinhaTE($atual1, 1, $lds_linha1, $lds_linha2);
    $lds_standBy = aux::GeralPorLinhaTE($atual1, 2, $lds_linha1, $lds_linha2);
    $lds_normal = aux::GeralPorLinhaTE($atual1, 3, $lds_linha1, $lds_linha2);
    $lds_alarme = aux::GeralPorLinhaTE($atual1, 4, $lds_linha1, $lds_linha2);
    $lds_critico = aux::GeralPorLinhaTE($atual1, 5, $lds_linha1, $lds_linha2);
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
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $lds_sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 22)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
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

    // ============================================================ LINHA DE LAMINAÇÃO A FRIO
    $lrf_linha1 = 12;
    $lrf_linha2 = 0;

    $lrf_manutencao = aux::GeralPorLinhaTE($atual1, 1, $lrf_linha1, $lrf_linha2);
    $lrf_standBy = aux::GeralPorLinhaTE($atual1, 2, $lrf_linha1, $lrf_linha2);
    $lrf_normal = aux::GeralPorLinhaTE($atual1, 3, $lrf_linha1, $lrf_linha2);
    $lrf_alarme = aux::GeralPorLinhaTE($atual1, 4, $lrf_linha1, $lrf_linha2);
    $lrf_critico = aux::GeralPorLinhaTE($atual1, 5, $lrf_linha1, $lrf_linha2);
    if($lrf_manutencao == null){$lrf_manutencao = 0;}
    if($lrf_standBy == null){$lrf_standBy = 0;}
    if($lrf_normal == null){$lrf_normal = 0;}
    if($lrf_alarme == null){$lrf_alarme = 0;}
    if($lrf_critico == null){$lrf_critico = 0;}

    $lrf_sum1 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=', 12)
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
               ->count('preditiva_atividades.id');

    $lrf_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=', 0)
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
               ->count('preditiva_atividades.id');

    $lrf_sum = $lrf_sum1+$lrf_sum2;
    $lrf_manutencaoP_format = ($lrf_manutencao / $lrf_sum)*100;
    $lrf_manutencaoP = number_format($lrf_manutencaoP_format,2,".",",");
    $lrf_standByP_format = ($lrf_standBy / $lrf_sum)*100;
    $lrf_standByP = number_format($lrf_standByP_format,2,".",",");
    $lrf_normalP_format = ($lrf_normal / $lrf_sum)*100;
    $lrf_normalP = number_format($lrf_normalP_format,2,".",",");
    $lrf_alarmeP_format = ($lrf_alarme / $lrf_sum)*100;
    $lrf_alarmeP = number_format($lrf_alarmeP_format,2,".",",");
    $lrf_criticoP_format = ($lrf_critico / $lrf_sum)*100;
    $lrf_criticoP = number_format($lrf_criticoP_format,2,".",",");

    // ============================================================ UTILIDADES
    $uti_parent = 7;
    $uti_manutencao = aux::GeralPorLinha2TE($atual1, 1, $uti_parent);
    $uti_standBy = aux::GeralPorLinha2TE($atual1, 2, $uti_parent);
    $uti_normal = aux::GeralPorLinha2TE($atual1, 3, $uti_parent);
    $uti_alarme = aux::GeralPorLinha2TE($atual1, 4, $uti_parent);
    $uti_critico = aux::GeralPorLinha2TE($atual1, 5, $uti_parent);
    if($uti_manutencao == null){$uti_manutencao = 0;}
    if($uti_standBy == null){$uti_standBy = 0;}
    if($uti_normal == null){$uti_normal = 0;}
    if($uti_alarme == null){$uti_alarme = 0;}
    if($uti_critico == null){$uti_critico = 0;}

   $uti_sum = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.parent_id', '=', 7)
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
               ->count('preditiva_atividades.id');

   $uti_manutencaoP_format = ($uti_manutencao / $uti_sum)*100;
   $uti_manutencaoP = number_format($uti_manutencaoP_format,2,".",",");
   $uti_standByP_format = ($uti_standBy / $uti_sum)*100;
   $uti_standByP = number_format($uti_standByP_format,2,".",",");
   $uti_normalP_format = ($uti_normal / $uti_sum)*100;
   $uti_normalP = number_format($uti_normalP_format,2,".",",");
   $uti_alarmeP_format = ($uti_alarme / $uti_sum)*100;
   $uti_alarmeP = number_format($uti_alarmeP_format,2,".",",");
   $uti_criticoP_format = ($uti_critico / $uti_sum)*100;
   $uti_criticoP = number_format($uti_criticoP_format,2,".",",");

    // ============================================================ LINHA DE GALVANIZAÇÃO CONTÍNUA
    $lgc_linha1 = 13;
    $lgc_linha2 = 0;

    $lgc_manutencao = aux::GeralPorLinhaTE($atual1, 1, $lgc_linha1, $lgc_linha2);
    $lgc_standBy = aux::GeralPorLinhaTE($atual1, 2, $lgc_linha1, $lgc_linha2);
    $lgc_normal = aux::GeralPorLinhaTE($atual1, 3, $lgc_linha1, $lgc_linha2);
    $lgc_alarme = aux::GeralPorLinhaTE($atual1, 4, $lgc_linha1, $lgc_linha2);
    $lgc_critico = aux::GeralPorLinhaTE($atual1, 5, $lgc_linha1, $lgc_linha2);
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

    $lpc_manutencao = aux::GeralPorLinhaTE($atual1, 1, $lpc_linha1, $lpc_linha2);
    $lpc_standBy = aux::GeralPorLinhaTE($atual1, 2, $lpc_linha1, $lpc_linha2);
    $lpc_normal = aux::GeralPorLinhaTE($atual1, 3, $lpc_linha1, $lpc_linha2);
    $lpc_alarme = aux::GeralPorLinhaTE($atual1, 4, $lpc_linha1, $lpc_linha2);
    $lpc_critico = aux::GeralPorLinhaTE($atual1, 5, $lpc_linha1, $lpc_linha2);
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

   // ============================================================ CENTRO DE SERVIÇOS
   $cs_parent = 6;
   $cs_manutencao = aux::GeralPorLinha2TE($atual1, 1, $cs_parent);
   $cs_standBy = aux::GeralPorLinha2TE($atual1, 2, $cs_parent);
   $cs_normal = aux::GeralPorLinha2TE($atual1, 3, $cs_parent);
   $cs_alarme = aux::GeralPorLinha2TE($atual1, 4, $cs_parent);
   $cs_critico = aux::GeralPorLinha2TE($atual1, 5, $cs_parent);
   if($cs_manutencao == null){$cs_manutencao = 0;}
   if($cs_standBy == null){$cs_standBy = 0;}
   if($cs_normal == null){$cs_normal = 0;}
   if($cs_alarme == null){$cs_alarme = 0;}
   if($cs_critico == null){$cs_critico = 0;}

  $cs_sum = DB::table('preditiva_atividades')
              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
              ->where('negocios.parent_id', '=', 6)
              ->where('preditiva_atividades.tecnicas_id', '=', 1)
              ->count('preditiva_atividades.id');

  $cs_manutencaoP_format = ($cs_manutencao / $cs_sum)*100;
  $cs_manutencaoP = number_format($cs_manutencaoP_format,2,".",",");
  $cs_standByP_format = ($cs_standBy / $cs_sum)*100;
  $cs_standByP = number_format($cs_standByP_format,2,".",",");
  $cs_normalP_format = ($cs_normal / $cs_sum)*100;
  $cs_normalP = number_format($cs_normalP_format,2,".",",");
  $cs_alarmeP_format = ($cs_alarme / $cs_sum)*100;
  $cs_alarmeP = number_format($cs_alarmeP_format,2,".",",");
  $cs_criticoP_format = ($cs_critico / $cs_sum)*100;
  $cs_criticoP = number_format($cs_criticoP_format,2,".",",");

    // ============================================================ PONTES Rolantes
  $pr_parent = 8;
  $pr_manutencao = aux::GeralPorLinha2TE($atual1, 1, $pr_parent);
  $pr_standBy = aux::GeralPorLinha2TE($atual1, 2, $pr_parent);
  $pr_normal = aux::GeralPorLinha2TE($atual1, 3, $pr_parent);
  $pr_alarme = aux::GeralPorLinha2TE($atual1, 4, $pr_parent);
  $pr_critico = aux::GeralPorLinha2TE($atual1, 5, $pr_parent);
  if($pr_manutencao == null){$pr_manutencao = 0;}
  if($pr_standBy == null){$pr_standBy = 0;}
  if($pr_normal == null){$pr_normal = 0;}
  if($pr_alarme == null){$pr_alarme = 0;}
  if($pr_critico == null){$pr_critico = 0;}

 $pr_sum = DB::table('preditiva_atividades')
             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
             ->where('negocios.parent_id', '=', 8)
             ->where('preditiva_atividades.tecnicas_id', '=', 1)
             ->count('preditiva_atividades.id');

 $pr_manutencaoP_format = ($pr_manutencao / $pr_sum)*100;
 $pr_manutencaoP = number_format($pr_manutencaoP_format,2,".",",");
 $pr_standByP_format = ($pr_standBy / $pr_sum)*100;
 $pr_standByP = number_format($pr_standByP_format,2,".",",");
 $pr_normalP_format = ($pr_normal / $pr_sum)*100;
 $pr_normalP = number_format($pr_normalP_format,2,".",",");
 $pr_alarmeP_format = ($pr_alarme / $pr_sum)*100;
 $pr_alarmeP = number_format($pr_alarmeP_format,2,".",",");
 $pr_criticoP_format = ($pr_critico / $pr_sum)*100;
 $pr_criticoP = number_format($pr_criticoP_format,2,".",",");

 // ============================================================ TABELAS RELATÓRIO GERENCIAL
 // TABELA ANORMALIDADES - ALARME E CRITICO
 $tabela = aux::GeralAnormalidadesTE($atual1)->where('status_id', '>', 3);
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
 $tabela_normal = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 3);
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
 $tabela_alarme = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 4);
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
 $tabela_critico = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 5);
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
 $tabela_manutencao = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 1);
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
 $tabela_standBy = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 2);
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

 $normal1 = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 3)->count();
 $alarme1 = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 4)->count();
 $critico1 = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 5)->count();
 $normal2 = aux::GeralAnormalidadesTE($atual2)->where('status_id', '=', 3)->count();
 $alarme2 = aux::GeralAnormalidadesTE($atual2)->where('status_id', '=', 4)->count();
 $critico2 = aux::GeralAnormalidadesTE($atual2)->where('status_id', '=', 5)->count();
 $normal3 = aux::GeralAnormalidadesTE($atual3)->where('status_id', '=', 3)->count();
 $alarme3 = aux::GeralAnormalidadesTE($atual3)->where('status_id', '=', 4)->count();
 $critico3 = aux::GeralAnormalidadesTE($atual3)->where('status_id', '=', 5)->count();
 $normal4 = aux::GeralAnormalidadesTE($atual4)->where('status_id', '=', 3)->count();
 $alarme4 = aux::GeralAnormalidadesTE($atual4)->where('status_id', '=', 4)->count();
 $critico4 = aux::GeralAnormalidadesTE($atual4)->where('status_id', '=', 5)->count();
 $normal5 = aux::GeralAnormalidadesTE($atual5)->where('status_id', '=', 3)->count();
 $alarme5 = aux::GeralAnormalidadesTE($atual5)->where('status_id', '=', 4)->count();
 $critico5 = aux::GeralAnormalidadesTE($atual5)->where('status_id', '=', 5)->count();
 $normal6 = aux::GeralAnormalidadesTE($atual6)->where('status_id', '=', 3)->count();
 $alarme6 = aux::GeralAnormalidadesTE($atual6)->where('status_id', '=', 4)->count();
 $critico6 = aux::GeralAnormalidadesTE($atual6)->where('status_id', '=', 5)->count();
 $normal7 = aux::GeralAnormalidadesTE($atual7)->where('status_id', '=', 3)->count();
 $alarme7 = aux::GeralAnormalidadesTE($atual7)->where('status_id', '=', 4)->count();
 $critico7 = aux::GeralAnormalidadesTE($atual7)->where('status_id', '=', 5)->count();
 $normal8 = aux::GeralAnormalidadesTE($atual8)->where('status_id', '=', 3)->count();
 $alarme8 = aux::GeralAnormalidadesTE($atual8)->where('status_id', '=', 4)->count();
 $critico8 = aux::GeralAnormalidadesTE($atual8)->where('status_id', '=', 5)->count();
 $normal9 = aux::GeralAnormalidadesTE($atual9)->where('status_id', '=', 3)->count();
 $alarme9 = aux::GeralAnormalidadesTE($atual9)->where('status_id', '=', 4)->count();
 $critico9 = aux::GeralAnormalidadesTE($atual9)->where('status_id', '=', 5)->count();
 $normal10 = aux::GeralAnormalidadesTE($atual10)->where('status_id', '=', 3)->count();
 $alarme10 = aux::GeralAnormalidadesTE($atual10)->where('status_id', '=', 4)->count();
 $critico10 = aux::GeralAnormalidadesTE($atual10)->where('status_id', '=', 5)->count();
 $normal11 = aux::GeralAnormalidadesTE($atual11)->where('status_id', '=', 3)->count();
 $alarme11 = aux::GeralAnormalidadesTE($atual11)->where('status_id', '=', 4)->count();
 $critico11 = aux::GeralAnormalidadesTE($atual11)->where('status_id', '=', 5)->count();
 $normal12 = aux::GeralAnormalidadesTE($atual12)->where('status_id', '=', 3)->count();
 $alarme12 = aux::GeralAnormalidadesTE($atual12)->where('status_id', '=', 4)->count();
 $critico12 = aux::GeralAnormalidadesTE($atual12)->where('status_id', '=', 5)->count();

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
 $faltaAperto1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

 $faltaAperto12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
 $desbalDeFase12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
 $compMalDim12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
 $caboRessecado12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
 $defeitoComp12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
 $conexaoTerm12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     return view('csn.relatorioGerencial.includes.indexRelGerTE')->with('title', $title)->with('sum', $sum)
     ->with('normal', $normal)->with('alarme', $alarme)->with('critico', $critico)->with('manutencao', $manutencao)->with('standBy', $standBy)
     ->with('normalP', $normalP)->with('alarmeP', $alarmeP)->with('criticoP', $criticoP)->with('manutencaoP', $manutencaoP)->with('standByP', $standByP)
       ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)->with('ura_manutencao', $ura_manutencao)->with('ura_standBy', $standBy)
       ->with('ura_normalP', $ura_normalP)->with('ura_alarmeP', $ura_alarmeP)->with('ura_criticoP', $ura_criticoP)->with('ura_manutencaoP', $ura_manutencaoP)->with('ura_standByP', $ura_standByP)
         ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)->with('lds_manutencao', $lds_manutencao)->with('lds_standBy', $lds_standBy)
         ->with('lds_normalP', $lds_normalP)->with('lds_alarmeP', $lds_alarmeP)->with('lds_criticoP', $lds_criticoP)->with('lds_manutencaoP', $lds_manutencaoP)->with('lds_standByP', $lds_standByP)
          ->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)->with('lrf_manutencao', $lrf_manutencao)->with('lrf_standBy', $lrf_standBy)
          ->with('lrf_normalP', $lrf_normalP)->with('lrf_alarmeP', $lrf_alarmeP)->with('lrf_criticoP', $lrf_criticoP)->with('lrf_manutencaoP', $lrf_manutencaoP)->with('lrf_standByP', $lrf_standByP)
            ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)->with('lgc_manutencao', $lgc_manutencao)->with('lgc_standBy', $lgc_standBy)
            ->with('lgc_normalP', $lgc_normalP)->with('lgc_alarmeP', $lgc_alarmeP)->with('lgc_criticoP', $lgc_criticoP)->with('lgc_manutencaoP', $lgc_manutencaoP)->with('lgc_standByP', $lgc_standByP)
             ->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)->with('uti_manutencao', $uti_manutencao)->with('uti_standBy', $uti_standBy)
             ->with('uti_normalP', $uti_normalP)->with('uti_alarmeP', $uti_alarmeP)->with('uti_criticoP', $uti_criticoP)->with('uti_manutencaoP', $uti_manutencaoP)->with('uti_standByP', $uti_standByP)
              ->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)->with('lpc_manutencao', $lpc_manutencao)->with('lpc_standBy', $lpc_standBy)
              ->with('lpc_normalP', $lpc_normalP)->with('lpc_alarmeP', $lpc_alarmeP)->with('lpc_criticoP', $lpc_criticoP)->with('lpc_manutencaoP', $lpc_manutencaoP)->with('lpc_standByP', $lpc_standByP)
                ->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)->with('cs_manutencao', $cs_manutencao)->with('cs_standBy', $cs_standBy)
                ->with('cs_normalP', $cs_normalP)->with('cs_alarmeP', $cs_alarmeP)->with('cs_criticoP', $cs_criticoP)->with('cs_manutencaoP', $cs_manutencaoP)->with('cs_standByP', $cs_standByP)
                 ->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico)->with('pr_manutencao', $pr_manutencao)->with('pr_standBy', $pr_standBy)
                 ->with('pr_normalP', $pr_normalP)->with('pr_alarmeP', $pr_alarmeP)->with('pr_criticoP', $pr_criticoP)->with('pr_manutencaoP', $pr_manutencaoP)->with('pr_standByP', $pr_standByP)
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
                   ->with('faltaAperto1', $faltaAperto1)->with('desbalDeFase1', $desbalDeFase1)->with('compMalDim1', $compMalDim1)->with('caboRessecado1', $caboRessecado1)->with('defeitoComp1', $defeitoComp1)->with('conexaoTerm1', $conexaoTerm1)
                   ->with('faltaAperto2', $faltaAperto2)->with('desbalDeFase2', $desbalDeFase2)->with('compMalDim2', $compMalDim2)->with('caboRessecado2', $caboRessecado2)->with('defeitoComp2', $defeitoComp2)->with('conexaoTerm2', $conexaoTerm2)
                   ->with('faltaAperto3', $faltaAperto3)->with('desbalDeFase3', $desbalDeFase3)->with('compMalDim3', $compMalDim3)->with('caboRessecado3', $caboRessecado3)->with('defeitoComp3', $defeitoComp3)->with('conexaoTerm3', $conexaoTerm3)
                   ->with('faltaAperto4', $faltaAperto4)->with('desbalDeFase4', $desbalDeFase4)->with('compMalDim4', $compMalDim4)->with('caboRessecado4', $caboRessecado4)->with('defeitoComp4', $defeitoComp4)->with('conexaoTerm4', $conexaoTerm4)
                   ->with('faltaAperto5', $faltaAperto5)->with('desbalDeFase5', $desbalDeFase5)->with('compMalDim5', $compMalDim5)->with('caboRessecado5', $caboRessecado5)->with('defeitoComp5', $defeitoComp5)->with('conexaoTerm5', $conexaoTerm5)
                   ->with('faltaAperto6', $faltaAperto6)->with('desbalDeFase6', $desbalDeFase6)->with('compMalDim6', $compMalDim6)->with('caboRessecado6', $caboRessecado6)->with('defeitoComp6', $defeitoComp6)->with('conexaoTerm6', $conexaoTerm6)
                   ->with('faltaAperto7', $faltaAperto7)->with('desbalDeFase7', $desbalDeFase7)->with('compMalDim7', $compMalDim7)->with('caboRessecado7', $caboRessecado7)->with('defeitoComp7', $defeitoComp7)->with('conexaoTerm7', $conexaoTerm7)
                   ->with('faltaAperto8', $faltaAperto8)->with('desbalDeFase8', $desbalDeFase8)->with('compMalDim8', $compMalDim8)->with('caboRessecado8', $caboRessecado8)->with('defeitoComp8', $defeitoComp8)->with('conexaoTerm8', $conexaoTerm8)
                   ->with('faltaAperto9', $faltaAperto9)->with('desbalDeFase9', $desbalDeFase9)->with('compMalDim9', $compMalDim9)->with('caboRessecado9', $caboRessecado9)->with('defeitoComp9', $defeitoComp9)->with('conexaoTerm9', $conexaoTerm9)
                   ->with('faltaAperto10', $faltaAperto10)->with('desbalDeFase10', $desbalDeFase10)->with('compMalDim10', $compMalDim10)->with('caboRessecado10', $caboRessecado10)->with('defeitoComp10', $defeitoComp10)->with('conexaoTerm10', $conexaoTerm10)
                   ->with('faltaAperto11', $faltaAperto11)->with('desbalDeFase11', $desbalDeFase11)->with('compMalDim11', $compMalDim11)->with('caboRessecado11', $caboRessecado11)->with('defeitoComp11', $defeitoComp11)->with('conexaoTerm11', $conexaoTerm11)
                   ->with('faltaAperto12', $faltaAperto12)->with('desbalDeFase12', $desbalDeFase12)->with('compMalDim12', $compMalDim12)->with('caboRessecado12', $caboRessecado12)->with('defeitoComp12', $defeitoComp12)->with('conexaoTerm12', $conexaoTerm12);
  }

   public function GeralStatusDosPontos() {

     $title = 'Status Pontos | GGOP PR';
     $sum = Preditiva_atividades::where('tecnicas_id', '=', 1)->count();
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $normal1 = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 3)->count();
     $alarme1 = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 4)->count();
     $critico1 = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 5)->count();
     $normal2 = aux::GeralAnormalidadesTE($atual2)->where('status_id', '=', 3)->count();
     $alarme2 = aux::GeralAnormalidadesTE($atual2)->where('status_id', '=', 4)->count();
     $critico2 = aux::GeralAnormalidadesTE($atual2)->where('status_id', '=', 5)->count();
     $normal3 = aux::GeralAnormalidadesTE($atual3)->where('status_id', '=', 3)->count();
     $alarme3 = aux::GeralAnormalidadesTE($atual3)->where('status_id', '=', 4)->count();
     $critico3 = aux::GeralAnormalidadesTE($atual3)->where('status_id', '=', 5)->count();
     $normal4 = aux::GeralAnormalidadesTE($atual4)->where('status_id', '=', 3)->count();
     $alarme4 = aux::GeralAnormalidadesTE($atual4)->where('status_id', '=', 4)->count();
     $critico4 = aux::GeralAnormalidadesTE($atual4)->where('status_id', '=', 5)->count();
     $normal5 = aux::GeralAnormalidadesTE($atual5)->where('status_id', '=', 3)->count();
     $alarme5 = aux::GeralAnormalidadesTE($atual5)->where('status_id', '=', 4)->count();
     $critico5 = aux::GeralAnormalidadesTE($atual5)->where('status_id', '=', 5)->count();
     $normal6 = aux::GeralAnormalidadesTE($atual6)->where('status_id', '=', 3)->count();
     $alarme6 = aux::GeralAnormalidadesTE($atual6)->where('status_id', '=', 4)->count();
     $critico6 = aux::GeralAnormalidadesTE($atual6)->where('status_id', '=', 5)->count();
     $normal7 = aux::GeralAnormalidadesTE($atual7)->where('status_id', '=', 3)->count();
     $alarme7 = aux::GeralAnormalidadesTE($atual7)->where('status_id', '=', 4)->count();
     $critico7 = aux::GeralAnormalidadesTE($atual7)->where('status_id', '=', 5)->count();
     $normal8 = aux::GeralAnormalidadesTE($atual8)->where('status_id', '=', 3)->count();
     $alarme8 = aux::GeralAnormalidadesTE($atual8)->where('status_id', '=', 4)->count();
     $critico8 = aux::GeralAnormalidadesTE($atual8)->where('status_id', '=', 5)->count();
     $normal9 = aux::GeralAnormalidadesTE($atual9)->where('status_id', '=', 3)->count();
     $alarme9 = aux::GeralAnormalidadesTE($atual9)->where('status_id', '=', 4)->count();
     $critico9 = aux::GeralAnormalidadesTE($atual9)->where('status_id', '=', 5)->count();
     $normal10 = aux::GeralAnormalidadesTE($atual10)->where('status_id', '=', 3)->count();
     $alarme10 = aux::GeralAnormalidadesTE($atual10)->where('status_id', '=', 4)->count();
     $critico10 = aux::GeralAnormalidadesTE($atual10)->where('status_id', '=', 5)->count();
     $normal11 = aux::GeralAnormalidadesTE($atual11)->where('status_id', '=', 3)->count();
     $alarme11 = aux::GeralAnormalidadesTE($atual11)->where('status_id', '=', 4)->count();
     $critico11 = aux::GeralAnormalidadesTE($atual11)->where('status_id', '=', 5)->count();
     $normal12 = aux::GeralAnormalidadesTE($atual12)->where('status_id', '=', 3)->count();
     $alarme12 = aux::GeralAnormalidadesTE($atual12)->where('status_id', '=', 4)->count();
     $critico12 = aux::GeralAnormalidadesTE($atual12)->where('status_id', '=', 5)->count();

     $manutencao = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 1)->count();
     $standBy = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 2)->count();
     $normal = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 3)->count();
     $alarme = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 4)->count();
     $critico = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 5)->count();

     if($manutencao == null){$manutencao = 0;}
     if($standBy == null){$standBy = 0;}
     if($normal == null){$normal = 0;}
     if($alarme == null){$alarme = 0;}
     if($critico == null){$critico = 0;}

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

      return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.ggoppr-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
             ->with('manutencao', $manutencao)->with('standBy', $standBy)->with('normal', $normal)->with('alarme', $alarme)->with('critico', $critico)
             ->with('manutencaoP', $manutencaoP)->with('standByP', $standByP)->with('normalP', $normalP)->with('alarmeP', $alarmeP)->with('criticoP', $criticoP);
      }

   public function GeralAnormalidades() {

     $title = 'Anormalidades | GGOP PR';
     $sum = Preditiva_atividades::where('tecnicas_id', '=', 1)->count();
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $alarme1P = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 4)->count();
     $critico1P = aux::GeralAnormalidadesTE($atual1)->where('status_id', '=', 5)->count();
     $alarme2P = aux::GeralAnormalidadesTE($atual2)->where('status_id', '=', 4)->count();
     $critico2P = aux::GeralAnormalidadesTE($atual2)->where('status_id', '=', 5)->count();
     $alarme3P = aux::GeralAnormalidadesTE($atual3)->where('status_id', '=', 4)->count();
     $critico3P = aux::GeralAnormalidadesTE($atual3)->where('status_id', '=', 5)->count();
     $alarme4P = aux::GeralAnormalidadesTE($atual4)->where('status_id', '=', 4)->count();
     $critico4P = aux::GeralAnormalidadesTE($atual4)->where('status_id', '=', 5)->count();
     $alarme5P = aux::GeralAnormalidadesTE($atual5)->where('status_id', '=', 4)->count();
     $critico5P = aux::GeralAnormalidadesTE($atual5)->where('status_id', '=', 5)->count();
     $alarme6P = aux::GeralAnormalidadesTE($atual6)->where('status_id', '=', 4)->count();
     $critico6P = aux::GeralAnormalidadesTE($atual6)->where('status_id', '=', 5)->count();
     $alarme7P = aux::GeralAnormalidadesTE($atual7)->where('status_id', '=', 4)->count();
     $critico7P = aux::GeralAnormalidadesTE($atual7)->where('status_id', '=', 5)->count();
     $alarme8P = aux::GeralAnormalidadesTE($atual8)->where('status_id', '=', 4)->count();
     $critico8P = aux::GeralAnormalidadesTE($atual8)->where('status_id', '=', 5)->count();
     $alarme9P = aux::GeralAnormalidadesTE($atual9)->where('status_id', '=', 4)->count();
     $critico9P = aux::GeralAnormalidadesTE($atual9)->where('status_id', '=', 5)->count();
     $alarme10P = aux::GeralAnormalidadesTE($atual10)->where('status_id', '=', 4)->count();
     $critico10P = aux::GeralAnormalidadesTE($atual10)->where('status_id', '=', 5)->count();
     $alarme11P = aux::GeralAnormalidadesTE($atual11)->where('status_id', '=', 4)->count();
     $critico11P = aux::GeralAnormalidadesTE($atual11)->where('status_id', '=', 5)->count();
     $alarme12P = aux::GeralAnormalidadesTE($atual12)->where('status_id', '=', 4)->count();
     $critico12P = aux::GeralAnormalidadesTE($atual12)->where('status_id', '=', 5)->count();

     if($alarme1P == null){$alarme1P = 0;}
     if($critico1P == null){$critico1P = 0;}
     $alarme1P_format = ($alarme1P / $sum)*100;
     $critico1P_format = ($critico1P / $sum)*100;
     $alarme1 = number_format($alarme1P_format,2,".",",");
     $critico1 = number_format($critico1P_format,2,".",",");

     if($alarme2P == null){$alarme2P = 0;}
     if($critico2P == null){$critico2P = 0;}
     $alarme2P_format = ($alarme2P / $sum)*100;
     $critico2P_format = ($critico2P / $sum)*100;
     $alarme2 = number_format($alarme2P_format,2,".",",");
     $critico2 = number_format($critico2P_format,2,".",",");

     if($alarme3P == null){$alarme3P = 0;}
     if($critico3P == null){$critico3P = 0;}
     $alarme3P_format = ($alarme3P / $sum)*100;
     $critico3P_format = ($critico3P / $sum)*100;
     $alarme3 = number_format($alarme3P_format,2,".",",");
     $critico3 = number_format($critico3P_format,2,".",",");

     if($alarme4P == null){$alarme4P = 0;}
     if($critico4P == null){$critico4P = 0;}
     $alarme4P_format = ($alarme4P / $sum)*100;
     $critico4P_format = ($critico4P / $sum)*100;
     $alarme4 = number_format($alarme4P_format,2,".",",");
     $critico4 = number_format($critico4P_format,2,".",",");

     if($alarme5P == null){$alarme5P = 0;}
     if($critico5P == null){$critico5P = 0;}
     $alarme5P_format = ($alarme5P / $sum)*100;
     $critico5P_format = ($critico5P / $sum)*100;
     $alarme5 = number_format($alarme5P_format,2,".",",");
     $critico5 = number_format($critico5P_format,2,".",",");

     if($alarme6P == null){$alarme1P = 0;}
     if($critico6P == null){$critico6P = 0;}
     $alarme6P_format = ($alarme6P / $sum)*100;
     $critico6P_format = ($critico6P / $sum)*100;
     $alarme6 = number_format($alarme6P_format,2,".",",");
     $critico6 = number_format($critico6P_format,2,".",",");

     if($alarme7P == null){$alarme7P = 0;}
     if($critico7P == null){$critico7P = 0;}
     $alarme7P_format = ($alarme7P / $sum)*100;
     $critico7P_format = ($critico7P / $sum)*100;
     $alarme7 = number_format($alarme7P_format,2,".",",");
     $critico7 = number_format($critico7P_format,2,".",",");

     if($alarme8P == null){$alarme8P = 0;}
     if($critico8P == null){$critico8P = 0;}
     $alarme8P_format = ($alarme8P / $sum)*100;
     $critico8P_format = ($critico8P / $sum)*100;
     $alarme8 = number_format($alarme8P_format,2,".",",");
     $critico8 = number_format($critico8P_format,2,".",",");

     if($alarme9P == null){$alarme9P = 0;}
     if($critico9P == null){$critico9P = 0;}
     $alarme9P_format = ($alarme9P / $sum)*100;
     $critico9P_format = ($critico9P / $sum)*100;
     $alarme9 = number_format($alarme9P_format,2,".",",");
     $critico9 = number_format($critico9P_format,2,".",",");

     if($alarme10P == null){$alarme10P = 0;}
     if($critico10P == null){$critico10P = 0;}
     $alarme10P_format = ($alarme10P / $sum)*100;
     $critico10P_format = ($critico10P / $sum)*100;
     $alarme10 = number_format($alarme10P_format,2,".",",");
     $critico10 = number_format($critico10P_format,2,".",",");

     if($alarme11P == null){$alarme11P = 0;}
     if($critico11P == null){$critico11P = 0;}
     $alarme11P_format = ($alarme11P / $sum)*100;
     $critico11P_format = ($critico11P / $sum)*100;
     $alarme11 = number_format($alarme11P_format,2,".",",");
     $critico11 = number_format($critico11P_format,2,".",",");

     if($alarme12P == null){$alarme12P = 0;}
     if($critico12P == null){$critico12P = 0;}
     $alarme12P_format = ($alarme12P / $sum)*100;
     $critico12P_format = ($critico12P / $sum)*100;
     $alarme12 = number_format($alarme12P_format,2,".",",");
     $critico12 = number_format($critico12P_format,2,".",",");

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.ggoppr-anormalidades')->with('title', $title)->with('sum', $sum)
            ->with('atualf1', $atualf1)->with('alarme1', $alarme1)->with('critico1', $critico1)
            ->with('atualf2', $atualf2)->with('alarme2', $alarme2)->with('critico2', $critico2)
            ->with('atualf3', $atualf3)->with('alarme3', $alarme3)->with('critico3', $critico3)
            ->with('atualf4', $atualf4)->with('alarme4', $alarme4)->with('critico4', $critico4)
            ->with('atualf5', $atualf5)->with('alarme5', $alarme5)->with('critico5', $critico5)
            ->with('atualf6', $atualf6)->with('alarme6', $alarme6)->with('critico6', $critico6)
            ->with('atualf7', $atualf7)->with('alarme7', $alarme7)->with('critico7', $critico7)
            ->with('atualf8', $atualf8)->with('alarme8', $alarme8)->with('critico8', $critico8)
            ->with('atualf9', $atualf9)->with('alarme9', $alarme9)->with('critico9', $critico9)
            ->with('atualf10', $atualf10)->with('alarme10', $alarme10)->with('critico10', $critico10)
            ->with('atualf11', $atualf11)->with('alarme11', $alarme11)->with('critico11', $critico11)
            ->with('atualf12', $atualf12)->with('alarme12', $alarme12)->with('critico12', $critico12);
     }

   public function GeralProblemasEncontrados() {

     $title = 'Problemas Encontrados | GGOP PR';
     $sum = Preditiva_atividades::where('tecnicas_id', '=', 1)->count();
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $faltaAperto1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm1 = aux::GeralAnormalidadesTE($atual1)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm2 = aux::GeralAnormalidadesTE($atual2)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm3 = aux::GeralAnormalidadesTE($atual3)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm4 = aux::GeralAnormalidadesTE($atual4)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm5 = aux::GeralAnormalidadesTE($atual5)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm6 = aux::GeralAnormalidadesTE($atual6)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm7 = aux::GeralAnormalidadesTE($atual7)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm8 = aux::GeralAnormalidadesTE($atual8)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm9 = aux::GeralAnormalidadesTE($atual9)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm10 = aux::GeralAnormalidadesTE($atual10)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm11 = aux::GeralAnormalidadesTE($atual11)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     $faltaAperto12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 1)->count('diagnostico_id');
     $desbalDeFase12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 2)->count('diagnostico_id');
     $compMalDim12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 3)->count('diagnostico_id');
     $caboRessecado12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 4)->count('diagnostico_id');
     $defeitoComp12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 5)->count('diagnostico_id');
     $conexaoTerm12 = aux::GeralAnormalidadesTE($atual12)->where('diagnostico_id', '=', 37)->count('diagnostico_id');

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.ggoppr-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('faltaAperto1', $faltaAperto1)->with('desbalDeFase1', $desbalDeFase1)->with('compMalDim1', $compMalDim1)->with('caboRessecado1', $caboRessecado1)->with('defeitoComp1', $defeitoComp1)->with('conexaoTerm1', $conexaoTerm1)
       ->with('atualf2', $atualf2)->with('faltaAperto2', $faltaAperto2)->with('desbalDeFase2', $desbalDeFase2)->with('compMalDim2', $compMalDim2)->with('caboRessecado2', $caboRessecado2)->with('defeitoComp2', $defeitoComp2)->with('conexaoTerm2', $conexaoTerm2)
       ->with('atualf3', $atualf3)->with('faltaAperto3', $faltaAperto3)->with('desbalDeFase3', $desbalDeFase3)->with('compMalDim3', $compMalDim3)->with('caboRessecado3', $caboRessecado3)->with('defeitoComp3', $defeitoComp3)->with('conexaoTerm3', $conexaoTerm3)
       ->with('atualf4', $atualf4)->with('faltaAperto4', $faltaAperto4)->with('desbalDeFase4', $desbalDeFase4)->with('compMalDim4', $compMalDim4)->with('caboRessecado4', $caboRessecado4)->with('defeitoComp4', $defeitoComp4)->with('conexaoTerm4', $conexaoTerm4)
       ->with('atualf5', $atualf5)->with('faltaAperto5', $faltaAperto5)->with('desbalDeFase5', $desbalDeFase5)->with('compMalDim5', $compMalDim5)->with('caboRessecado5', $caboRessecado5)->with('defeitoComp5', $defeitoComp5)->with('conexaoTerm5', $conexaoTerm5)
       ->with('atualf6', $atualf6)->with('faltaAperto6', $faltaAperto6)->with('desbalDeFase6', $desbalDeFase6)->with('compMalDim6', $compMalDim6)->with('caboRessecado6', $caboRessecado6)->with('defeitoComp6', $defeitoComp6)->with('conexaoTerm6', $conexaoTerm6)
       ->with('atualf7', $atualf7)->with('faltaAperto7', $faltaAperto7)->with('desbalDeFase7', $desbalDeFase7)->with('compMalDim7', $compMalDim7)->with('caboRessecado7', $caboRessecado7)->with('defeitoComp7', $defeitoComp7)->with('conexaoTerm7', $conexaoTerm7)
       ->with('atualf8', $atualf8)->with('faltaAperto8', $faltaAperto8)->with('desbalDeFase8', $desbalDeFase8)->with('compMalDim8', $compMalDim8)->with('caboRessecado8', $caboRessecado8)->with('defeitoComp8', $defeitoComp8)->with('conexaoTerm8', $conexaoTerm8)
       ->with('atualf9', $atualf9)->with('faltaAperto9', $faltaAperto9)->with('desbalDeFase9', $desbalDeFase9)->with('compMalDim9', $compMalDim9)->with('caboRessecado9', $caboRessecado9)->with('defeitoComp9', $defeitoComp9)->with('conexaoTerm9', $conexaoTerm9)
       ->with('atualf10', $atualf10)->with('faltaAperto10', $faltaAperto10)->with('desbalDeFase10', $desbalDeFase10)->with('compMalDim10', $compMalDim10)->with('caboRessecado10', $caboRessecado10)->with('defeitoComp10', $defeitoComp10)->with('conexaoTerm10', $conexaoTerm10)
       ->with('atualf11', $atualf11)->with('faltaAperto11', $faltaAperto11)->with('desbalDeFase11', $desbalDeFase11)->with('compMalDim11', $compMalDim11)->with('caboRessecado11', $caboRessecado11)->with('defeitoComp11', $defeitoComp11)->with('conexaoTerm11', $conexaoTerm11)
       ->with('atualf12', $atualf12)->with('faltaAperto12', $faltaAperto12)->with('desbalDeFase12', $desbalDeFase12)->with('compMalDim12', $compMalDim12)->with('caboRessecado12', $caboRessecado12)->with('defeitoComp12', $defeitoComp12)->with('conexaoTerm12', $conexaoTerm12);
     }

   public function UraPerfil() {

    $title = 'Perfil URA';
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
    $linha1 = 11;
    $linha2 = 0;

    $ura_manutencao = aux::GeralPorLinhaTE($atual1, 1, $linha1, $linha2);
    $ura_standBy = aux::GeralPorLinhaTE($atual1, 2, $linha1, $linha2);
    $ura_normal = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
    $ura_alarme = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
    $ura_critico = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

    if($ura_manutencao == null){$ura_manutencao = 0;}
    if($ura_standBy == null){$ura_standBy = 0;}
    if($ura_normal == null){$ura_normal = 0;}
    if($ura_alarme == null){$ura_alarme = 0;}
    if($ura_critico == null){$ura_critico = 0;}

   $sum1 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',11)
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
               ->count('preditiva_atividades.id');

   $sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',0)
               ->where('preditiva_atividades.tecnicas_id', '=', 1)
               ->count('preditiva_atividades.id');

   $sum = $sum1+$sum2;

   $manutencaoP_format = ($ura_manutencao / $sum)*100;
   $ura_manutencaoP = number_format($manutencaoP_format,2,".",",");
   $standByP_format = ($ura_standBy / $sum)*100;
   $ura_standByP = number_format($standByP_format,2,".",",");
   $normalP_format = ($ura_normal / $sum)*100;
   $ura_normalP = number_format($normalP_format,2,".",",");
   $alarmeP_format = ($ura_alarme / $sum)*100;
   $ura_alarmeP = number_format($alarmeP_format,2,".",",");
   $criticoP_format = ($ura_critico / $sum)*100;
   $ura_criticoP = number_format($criticoP_format,2,".",",");

     return view('csn.relatorioGerencial.includes.indexRelGerTE_ura_perfil')->with('title', $title)->with('sum', $sum)
         ->with('ura_manutencao', $ura_manutencao)->with('ura_standBy', $ura_standBy)->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
         ->with('ura_manutencaoP', $ura_manutencaoP)->with('ura_standByP', $ura_standByP)->with('ura_normalP', $ura_normalP)->with('ura_alarmeP', $ura_alarmeP)->with('ura_criticoP', $ura_criticoP);
     }

   public function UraStatusDosPontos() {

     $title = 'Status Pontos | URA';
     $linha1 = 11;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',11)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $ura_normal1 = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
     $ura_alarme1 = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $ura_critico1 = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

     $ura_normal2 = aux::GeralPorLinhaTE($atual2, 3, $linha1, $linha2);
     $ura_alarme2 = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $ura_critico2 = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);

     $ura_normal3 = aux::GeralPorLinhaTE($atual3, 3, $linha1, $linha2);
     $ura_alarme3 = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $ura_critico3 = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);

     $ura_normal4 = aux::GeralPorLinhaTE($atual4, 3, $linha1, $linha2);
     $ura_alarme4 = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $ura_critico4 = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);

     $ura_normal5 = aux::GeralPorLinhaTE($atual5, 3, $linha1, $linha2);
     $ura_alarme5 = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $ura_critico5 = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);

     $ura_normal6 = aux::GeralPorLinhaTE($atual6, 3, $linha1, $linha2);
     $ura_alarme6 = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $ura_critico6 = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);

     $ura_normal7 = aux::GeralPorLinhaTE($atual7, 3, $linha1, $linha2);
     $ura_alarme7 = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $ura_critico7 = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);

     $ura_normal8 = aux::GeralPorLinhaTE($atual8, 3, $linha1, $linha2);
     $ura_alarme8 = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $ura_critico8 = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);

     $ura_normal9 = aux::GeralPorLinhaTE($atual9, 3, $linha1, $linha2);
     $ura_alarme9 = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $ura_critico9 = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);

     $ura_normal10 = aux::GeralPorLinhaTE($atual10, 3, $linha1, $linha2);
     $ura_alarme10 = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $ura_critico10 = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);

     $ura_normal11 = aux::GeralPorLinhaTE($atual11, 3, $linha1, $linha2);
     $ura_alarme11 = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $ura_critico11 = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);

     $ura_normal12 = aux::GeralPorLinhaTE($atual12, 3, $linha1, $linha2);
     $ura_alarme12 = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $ura_critico12 = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.ura-status-dos-pontos')->with('title', $title)->with('sum', $sum)
       ->with('atual1', $atual1)->with('ura_normal1', $ura_normal1)->with('ura_alarme1', $ura_alarme1)->with('ura_critico1', $ura_critico1)
       ->with('atual2', $atual2)->with('ura_normal2', $ura_normal2)->with('ura_alarme2', $ura_alarme2)->with('ura_critico2', $ura_critico2)
       ->with('atual3', $atual3)->with('ura_normal3', $ura_normal3)->with('ura_alarme3', $ura_alarme3)->with('ura_critico3', $ura_critico3)
       ->with('atual4', $atual4)->with('ura_normal4', $ura_normal4)->with('ura_alarme4', $ura_alarme4)->with('ura_critico4', $ura_critico4)
       ->with('atual5', $atual5)->with('ura_normal5', $ura_normal5)->with('ura_alarme5', $ura_alarme5)->with('ura_critico5', $ura_critico5)
       ->with('atual6', $atual6)->with('ura_normal6', $ura_normal6)->with('ura_alarme6', $ura_alarme6)->with('ura_critico6', $ura_critico6)
       ->with('atual7', $atual7)->with('ura_normal7', $ura_normal7)->with('ura_alarme7', $ura_alarme7)->with('ura_critico7', $ura_critico7)
       ->with('atual8', $atual8)->with('ura_normal8', $ura_normal8)->with('ura_alarme8', $ura_alarme8)->with('ura_critico8', $ura_critico8)
       ->with('atual9', $atual9)->with('ura_normal9', $ura_normal9)->with('ura_alarme9', $ura_alarme9)->with('ura_critico9', $ura_critico9)
       ->with('atual10', $atual10)->with('ura_normal10', $ura_normal10)->with('ura_alarme10', $ura_alarme10)->with('ura_critico10', $ura_critico10)
       ->with('atual11', $atual11)->with('ura_normal11', $ura_normal11)->with('ura_alarme11', $ura_alarme11)->with('ura_critico11', $ura_critico11)
       ->with('atual12', $atual12)->with('ura_normal12', $ura_normal12)->with('ura_alarme12', $ura_alarme12)->with('ura_critico12', $ura_critico12);
   }

   public function UraAnormalidades() {

     $title = 'Anormalidades | URA';
     $linha1 = 11;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',11)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $alarme1P = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     $ura_alarme1 = aux::FormatPercents($alarme1P, $sum);
     $ura_alarme2 = aux::FormatPercents($alarme2P, $sum);
     $ura_alarme3 = aux::FormatPercents($alarme3P, $sum);
     $ura_alarme4 = aux::FormatPercents($alarme4P, $sum);
     $ura_alarme5 = aux::FormatPercents($alarme5P, $sum);
     $ura_alarme6 = aux::FormatPercents($alarme6P, $sum);
     $ura_alarme7 = aux::FormatPercents($alarme7P, $sum);
     $ura_alarme8 = aux::FormatPercents($alarme8P, $sum);
     $ura_alarme9 = aux::FormatPercents($alarme9P, $sum);
     $ura_alarme10 = aux::FormatPercents($alarme10P, $sum);
     $ura_alarme11 = aux::FormatPercents($alarme11P, $sum);
     $ura_alarme12 = aux::FormatPercents($alarme12P, $sum);

     $ura_critico1 = aux::FormatPercents($critico1P, $sum);
     $ura_critico2 = aux::FormatPercents($critico2P, $sum);
     $ura_critico3 = aux::FormatPercents($critico3P, $sum);
     $ura_critico4 = aux::FormatPercents($critico4P, $sum);
     $ura_critico5 = aux::FormatPercents($critico5P, $sum);
     $ura_critico6 = aux::FormatPercents($critico6P, $sum);
     $ura_critico7 = aux::FormatPercents($critico7P, $sum);
     $ura_critico8 = aux::FormatPercents($critico8P, $sum);
     $ura_critico9 = aux::FormatPercents($critico9P, $sum);
     $ura_critico10 = aux::FormatPercents($critico10P, $sum);
     $ura_critico11 = aux::FormatPercents($critico11P, $sum);
     $ura_critico12 = aux::FormatPercents($critico12P, $sum);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.ura-anormalidades')
     ->with('title', $title)->with('sum', $sum)
     ->with('atualf1', $atualf1)->with('ura_alarme1', $ura_alarme1)->with('ura_critico1', $ura_critico1)
     ->with('atualf2', $atualf2)->with('ura_alarme2', $ura_alarme2)->with('ura_critico2', $ura_critico2)
     ->with('atualf3', $atualf3)->with('ura_alarme3', $ura_alarme3)->with('ura_critico3', $ura_critico3)
     ->with('atualf4', $atualf4)->with('ura_alarme4', $ura_alarme4)->with('ura_critico4', $ura_critico4)
     ->with('atualf5', $atualf5)->with('ura_alarme5', $ura_alarme5)->with('ura_critico5', $ura_critico5)
     ->with('atualf6', $atualf6)->with('ura_alarme6', $ura_alarme6)->with('ura_critico6', $ura_critico6)
     ->with('atualf7', $atualf7)->with('ura_alarme7', $ura_alarme7)->with('ura_critico7', $ura_critico7)
     ->with('atualf8', $atualf8)->with('ura_alarme8', $ura_alarme8)->with('ura_critico8', $ura_critico8)
     ->with('atualf9', $atualf9)->with('ura_alarme9', $ura_alarme9)->with('ura_critico9', $ura_critico9)
     ->with('atualf10', $atualf10)->with('ura_alarme10', $ura_alarme10)->with('ura_critico10', $ura_critico10)
     ->with('atualf11', $atualf11)->with('ura_alarme11', $ura_alarme11)->with('ura_critico11', $ura_critico11)
     ->with('atualf12', $atualf12)->with('ura_alarme12', $ura_alarme12)->with('ura_critico12', $ura_critico12);
   }

   public function UraProblemasEncontrados() {

     $title = 'Problemas Encontrados | URA';
     $linha1 = 11;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',11)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $ura_faltaAperto1 = aux::GeralPorLinhaEDiagTE($atual1, 1, $linha1, $linha2);
     $ura_desbalDeFase1 = aux::GeralPorLinhaEDiagTE($atual1, 2, $linha1, $linha2);
     $ura_compMalDim1 = aux::GeralPorLinhaEDiagTE($atual1, 3, $linha1, $linha2);
     $ura_caboRessecado1 = aux::GeralPorLinhaEDiagTE($atual1, 4, $linha1, $linha2);
     $ura_defeitoComp1 = aux::GeralPorLinhaEDiagTE($atual1, 5, $linha1, $linha2);
     $ura_conexaoTerm1 = aux::GeralPorLinhaEDiagTE($atual1, 37, $linha1, $linha2);

     $ura_faltaAperto2 = aux::GeralPorLinhaEDiagTE($atual2, 1, $linha1, $linha2);
     $ura_desbalDeFase2 = aux::GeralPorLinhaEDiagTE($atual2, 2, $linha1, $linha2);
     $ura_compMalDim2 = aux::GeralPorLinhaEDiagTE($atual2, 3, $linha1, $linha2);
     $ura_caboRessecado2 = aux::GeralPorLinhaEDiagTE($atual2, 4, $linha1, $linha2);
     $ura_defeitoComp2 = aux::GeralPorLinhaEDiagTE($atual2, 5, $linha1, $linha2);
     $ura_conexaoTerm2 = aux::GeralPorLinhaEDiagTE($atual2, 37, $linha1, $linha2);

     $ura_faltaAperto3 = aux::GeralPorLinhaEDiagTE($atual3, 1, $linha1, $linha2);
     $ura_desbalDeFase3 = aux::GeralPorLinhaEDiagTE($atual3, 2, $linha1, $linha2);
     $ura_compMalDim3 = aux::GeralPorLinhaEDiagTE($atual3, 3, $linha1, $linha2);
     $ura_caboRessecado3 = aux::GeralPorLinhaEDiagTE($atual3, 4, $linha1, $linha2);
     $ura_defeitoComp3 = aux::GeralPorLinhaEDiagTE($atual3, 5, $linha1, $linha2);
     $ura_conexaoTerm3 = aux::GeralPorLinhaEDiagTE($atual3, 37, $linha1, $linha2);

     $ura_faltaAperto4 = aux::GeralPorLinhaEDiagTE($atual4, 1, $linha1, $linha2);
     $ura_desbalDeFase4 = aux::GeralPorLinhaEDiagTE($atual4, 2, $linha1, $linha2);
     $ura_compMalDim4 = aux::GeralPorLinhaEDiagTE($atual4, 3, $linha1, $linha2);
     $ura_caboRessecado4 = aux::GeralPorLinhaEDiagTE($atual4, 4, $linha1, $linha2);
     $ura_defeitoComp4 = aux::GeralPorLinhaEDiagTE($atual4, 5, $linha1, $linha2);
     $ura_conexaoTerm4 = aux::GeralPorLinhaEDiagTE($atual4, 37, $linha1, $linha2);

     $ura_faltaAperto5 = aux::GeralPorLinhaEDiagTE($atual5, 1, $linha1, $linha2);
     $ura_desbalDeFase5 = aux::GeralPorLinhaEDiagTE($atual5, 2, $linha1, $linha2);
     $ura_compMalDim5 = aux::GeralPorLinhaEDiagTE($atual5, 3, $linha1, $linha2);
     $ura_caboRessecado5 = aux::GeralPorLinhaEDiagTE($atual5, 4, $linha1, $linha2);
     $ura_defeitoComp5 = aux::GeralPorLinhaEDiagTE($atual5, 5, $linha1, $linha2);
     $ura_conexaoTerm5 = aux::GeralPorLinhaEDiagTE($atual5, 37, $linha1, $linha2);

     $ura_faltaAperto6 = aux::GeralPorLinhaEDiagTE($atual6, 1, $linha1, $linha2);
     $ura_desbalDeFase6 = aux::GeralPorLinhaEDiagTE($atual6, 2, $linha1, $linha2);
     $ura_compMalDim6 = aux::GeralPorLinhaEDiagTE($atual6, 3, $linha1, $linha2);
     $ura_caboRessecado6 = aux::GeralPorLinhaEDiagTE($atual6, 4, $linha1, $linha2);
     $ura_defeitoComp6 = aux::GeralPorLinhaEDiagTE($atual6, 5, $linha1, $linha2);
     $ura_conexaoTerm6 = aux::GeralPorLinhaEDiagTE($atual6, 37, $linha1, $linha2);

     $ura_faltaAperto7 = aux::GeralPorLinhaEDiagTE($atual7, 1, $linha1, $linha2);
     $ura_desbalDeFase7 = aux::GeralPorLinhaEDiagTE($atual7, 2, $linha1, $linha2);
     $ura_compMalDim7 = aux::GeralPorLinhaEDiagTE($atual7, 3, $linha1, $linha2);
     $ura_caboRessecado7 = aux::GeralPorLinhaEDiagTE($atual7, 4, $linha1, $linha2);
     $ura_defeitoComp7 = aux::GeralPorLinhaEDiagTE($atual7, 5, $linha1, $linha2);
     $ura_conexaoTerm7 = aux::GeralPorLinhaEDiagTE($atual7, 37, $linha1, $linha2);

     $ura_faltaAperto8 = aux::GeralPorLinhaEDiagTE($atual8, 1, $linha1, $linha2);
     $ura_desbalDeFase8 = aux::GeralPorLinhaEDiagTE($atual8, 2, $linha1, $linha2);
     $ura_compMalDim8 = aux::GeralPorLinhaEDiagTE($atual8, 3, $linha1, $linha2);
     $ura_caboRessecado8 = aux::GeralPorLinhaEDiagTE($atual8, 4, $linha1, $linha2);
     $ura_defeitoComp8 = aux::GeralPorLinhaEDiagTE($atual8, 5, $linha1, $linha2);
     $ura_conexaoTerm8 = aux::GeralPorLinhaEDiagTE($atual8, 37, $linha1, $linha2);

     $ura_faltaAperto9 = aux::GeralPorLinhaEDiagTE($atual9, 1, $linha1, $linha2);
     $ura_desbalDeFase9 = aux::GeralPorLinhaEDiagTE($atual9, 2, $linha1, $linha2);
     $ura_compMalDim9 = aux::GeralPorLinhaEDiagTE($atual9, 3, $linha1, $linha2);
     $ura_caboRessecado9 = aux::GeralPorLinhaEDiagTE($atual9, 4, $linha1, $linha2);
     $ura_defeitoComp9 = aux::GeralPorLinhaEDiagTE($atual9, 5, $linha1, $linha2);
     $ura_conexaoTerm9 = aux::GeralPorLinhaEDiagTE($atual9, 37, $linha1, $linha2);

     $ura_faltaAperto10 = aux::GeralPorLinhaEDiagTE($atual10, 1, $linha1, $linha2);
     $ura_desbalDeFase10 = aux::GeralPorLinhaEDiagTE($atual10, 2, $linha1, $linha2);
     $ura_compMalDim10 = aux::GeralPorLinhaEDiagTE($atual10, 3, $linha1, $linha2);
     $ura_caboRessecado10 = aux::GeralPorLinhaEDiagTE($atual10, 4, $linha1, $linha2);
     $ura_defeitoComp10 = aux::GeralPorLinhaEDiagTE($atual10, 5, $linha1, $linha2);
     $ura_conexaoTerm10 = aux::GeralPorLinhaEDiagTE($atual10, 37, $linha1, $linha2);

     $ura_faltaAperto11 = aux::GeralPorLinhaEDiagTE($atual11, 1, $linha1, $linha2);
     $ura_desbalDeFase11 = aux::GeralPorLinhaEDiagTE($atual11, 2, $linha1, $linha2);
     $ura_compMalDim11 = aux::GeralPorLinhaEDiagTE($atual11, 3, $linha1, $linha2);
     $ura_caboRessecado11 = aux::GeralPorLinhaEDiagTE($atual11, 4, $linha1, $linha2);
     $ura_defeitoComp11 = aux::GeralPorLinhaEDiagTE($atual11, 5, $linha1, $linha2);
     $ura_conexaoTerm11 = aux::GeralPorLinhaEDiagTE($atual11, 37, $linha1, $linha2);

     $ura_faltaAperto12 = aux::GeralPorLinhaEDiagTE($atual12, 1, $linha1, $linha2);
     $ura_desbalDeFase12 = aux::GeralPorLinhaEDiagTE($atual12, 2, $linha1, $linha2);
     $ura_compMalDim12 = aux::GeralPorLinhaEDiagTE($atual12, 3, $linha1, $linha2);
     $ura_caboRessecado12 = aux::GeralPorLinhaEDiagTE($atual12, 4, $linha1, $linha2);
     $ura_defeitoComp12 = aux::GeralPorLinhaEDiagTE($atual12, 5, $linha1, $linha2);
     $ura_conexaoTerm12 = aux::GeralPorLinhaEDiagTE($atual12, 37, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.ura-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('ura_faltaAperto1', $ura_faltaAperto1)->with('ura_desbalDeFase1', $ura_desbalDeFase1)->with('ura_compMalDim1', $ura_compMalDim1)->with('ura_caboRessecado1', $ura_caboRessecado1)->with('ura_defeitoComp1', $ura_defeitoComp1)->with('ura_conexaoTerm1', $ura_conexaoTerm1)
       ->with('atualf2', $atualf2)->with('ura_faltaAperto2', $ura_faltaAperto2)->with('ura_desbalDeFase2', $ura_desbalDeFase2)->with('ura_compMalDim2', $ura_compMalDim2)->with('ura_caboRessecado2', $ura_caboRessecado2)->with('ura_defeitoComp2', $ura_defeitoComp2)->with('ura_conexaoTerm2', $ura_conexaoTerm2)
       ->with('atualf3', $atualf3)->with('ura_faltaAperto3', $ura_faltaAperto3)->with('ura_desbalDeFase3', $ura_desbalDeFase3)->with('ura_compMalDim3', $ura_compMalDim3)->with('ura_caboRessecado3', $ura_caboRessecado3)->with('ura_defeitoComp3', $ura_defeitoComp3)->with('ura_conexaoTerm3', $ura_conexaoTerm3)
       ->with('atualf4', $atualf4)->with('ura_faltaAperto4', $ura_faltaAperto4)->with('ura_desbalDeFase4', $ura_desbalDeFase4)->with('ura_compMalDim4', $ura_compMalDim4)->with('ura_caboRessecado4', $ura_caboRessecado4)->with('ura_defeitoComp4', $ura_defeitoComp4)->with('ura_conexaoTerm4', $ura_conexaoTerm4)
       ->with('atualf5', $atualf5)->with('ura_faltaAperto5', $ura_faltaAperto5)->with('ura_desbalDeFase5', $ura_desbalDeFase5)->with('ura_compMalDim5', $ura_compMalDim5)->with('ura_caboRessecado5', $ura_caboRessecado5)->with('ura_defeitoComp5', $ura_defeitoComp5)->with('ura_conexaoTerm5', $ura_conexaoTerm5)
       ->with('atualf6', $atualf6)->with('ura_faltaAperto6', $ura_faltaAperto6)->with('ura_desbalDeFase6', $ura_desbalDeFase6)->with('ura_compMalDim6', $ura_compMalDim6)->with('ura_caboRessecado6', $ura_caboRessecado6)->with('ura_defeitoComp6', $ura_defeitoComp6)->with('ura_conexaoTerm6', $ura_conexaoTerm6)
       ->with('atualf7', $atualf7)->with('ura_faltaAperto7', $ura_faltaAperto7)->with('ura_desbalDeFase7', $ura_desbalDeFase7)->with('ura_compMalDim7', $ura_compMalDim7)->with('ura_caboRessecado7', $ura_caboRessecado7)->with('ura_defeitoComp7', $ura_defeitoComp7)->with('ura_conexaoTerm7', $ura_conexaoTerm7)
       ->with('atualf8', $atualf8)->with('ura_faltaAperto8', $ura_faltaAperto8)->with('ura_desbalDeFase8', $ura_desbalDeFase8)->with('ura_compMalDim8', $ura_compMalDim8)->with('ura_caboRessecado8', $ura_caboRessecado8)->with('ura_defeitoComp8', $ura_defeitoComp8)->with('ura_conexaoTerm8', $ura_conexaoTerm8)
       ->with('atualf9', $atualf9)->with('ura_faltaAperto9', $ura_faltaAperto9)->with('ura_desbalDeFase9', $ura_desbalDeFase9)->with('ura_compMalDim9', $ura_compMalDim9)->with('ura_caboRessecado9', $ura_caboRessecado9)->with('ura_defeitoComp9', $ura_defeitoComp9)->with('ura_conexaoTerm9', $ura_conexaoTerm9)
       ->with('atualf10', $atualf10)->with('ura_faltaAperto10', $ura_faltaAperto10)->with('ura_desbalDeFase10', $ura_desbalDeFase10)->with('ura_compMalDim10', $ura_compMalDim10)->with('ura_caboRessecado10', $ura_caboRessecado10)->with('ura_defeitoComp10', $ura_defeitoComp10)->with('ura_conexaoTerm10', $ura_conexaoTerm10)
       ->with('atualf11', $atualf11)->with('ura_faltaAperto11', $ura_faltaAperto11)->with('ura_desbalDeFase11', $ura_desbalDeFase11)->with('ura_compMalDim11', $ura_compMalDim11)->with('ura_caboRessecado11', $ura_caboRessecado11)->with('ura_defeitoComp11', $ura_defeitoComp11)->with('ura_conexaoTerm11', $ura_conexaoTerm11)
       ->with('atualf12', $atualf12)->with('ura_faltaAperto12', $ura_faltaAperto12)->with('ura_desbalDeFase12', $ura_desbalDeFase12)->with('ura_compMalDim12', $ura_compMalDim12)->with('ura_caboRessecado12', $ura_caboRessecado12)->with('ura_defeitoComp12', $ura_defeitoComp12)->with('ura_conexaoTerm12', $ura_conexaoTerm12);
   }

   public function LdsPerfil() {

     $title = 'Perfil | LDS';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 10;
     $linha2 = 22;

     $lds_manutencao = aux::GeralPorLinhaTE($atual1, 1, $linha1, $linha2);
     $lds_standBy = aux::GeralPorLinhaTE($atual1, 2, $linha1, $linha2);
     $lds_normal = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
     $lds_alarme = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $lds_critico = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

     if($lds_manutencao == null){$lds_manutencao = 0;}
     if($lds_standBy == null){$lds_standBy = 0;}
     if($lds_normal == null){$lds_normal = 0;}
     if($lds_alarme == null){$lds_alarme = 0;}
     if($lds_critico == null){$lds_critico = 0;}

    $sum1 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 10)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 22)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum = $sum1+$sum2;

    $manutencaoP_format = ($lds_manutencao / $sum)*100;
    $lds_manutencaoP = number_format($manutencaoP_format,2,".",",");
    $standByP_format = ($lds_standBy / $sum)*100;
    $lds_standByP = number_format($standByP_format,2,".",",");
    $normalP_format = ($lds_normal / $sum)*100;
    $lds_normalP = number_format($normalP_format,2,".",",");
    $alarmeP_format = ($lds_alarme / $sum)*100;
    $lds_alarmeP = number_format($alarmeP_format,2,".",",");
    $criticoP_format = ($lds_critico / $sum)*100;
    $lds_criticoP = number_format($criticoP_format,2,".",",");

      return view('csn.relatorioGerencial.includes.indexRelGerTE_LDS_perfil')->with('title', $title)->with('sum', $sum)
      ->with('lds_manutencao', $lds_manutencao)->with('lds_standBy', $lds_standBy)->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lds_manutencaoP', $lds_manutencaoP)->with('lds_standByP', $lds_standByP)->with('lds_normalP', $lds_normalP)->with('lds_alarmeP', $lds_alarmeP)->with('lds_criticoP', $lds_criticoP);
   }

   public function LdsStatusDosPontos() {

     $title = 'Status Pontos | LDS';
     $linha1 = 10;
     $linha2 = 22;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',10)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $lds_normal1 = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
     $lds_alarme1 = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $lds_critico1 = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

     $lds_normal2 = aux::GeralPorLinhaTE($atual2, 3, $linha1, $linha2);
     $lds_alarme2 = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $lds_critico2 = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);

     $lds_normal3 = aux::GeralPorLinhaTE($atual3, 3, $linha1, $linha2);
     $lds_alarme3 = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $lds_critico3 = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);

     $lds_normal4 = aux::GeralPorLinhaTE($atual4, 3, $linha1, $linha2);
     $lds_alarme4 = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $lds_critico4 = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);

     $lds_normal5 = aux::GeralPorLinhaTE($atual5, 3, $linha1, $linha2);
     $lds_alarme5 = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $lds_critico5 = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);

     $lds_normal6 = aux::GeralPorLinhaTE($atual6, 3, $linha1, $linha2);
     $lds_alarme6 = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $lds_critico6 = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);

     $lds_normal7 = aux::GeralPorLinhaTE($atual7, 3, $linha1, $linha2);
     $lds_alarme7 = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $lds_critico7 = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);

     $lds_normal8 = aux::GeralPorLinhaTE($atual8, 3, $linha1, $linha2);
     $lds_alarme8 = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $lds_critico8 = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);

     $lds_normal9 = aux::GeralPorLinhaTE($atual9, 3, $linha1, $linha2);
     $lds_alarme9 = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $lds_critico9 = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);

     $lds_normal10 = aux::GeralPorLinhaTE($atual10, 3, $linha1, $linha2);
     $lds_alarme10 = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $lds_critico10 = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);

     $lds_normal11 = aux::GeralPorLinhaTE($atual11, 3, $linha1, $linha2);
     $lds_alarme11 = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $lds_critico11 = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);

     $lds_normal12 = aux::GeralPorLinhaTE($atual12, 3, $linha1, $linha2);
     $lds_alarme12 = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $lds_critico12 = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lds-status-dos-pontos')->with('title', $title)->with('sum', $sum)
     ->with('atual1', $atual1)->with('lds_normal1', $lds_normal1)->with('lds_alarme1', $lds_alarme1)->with('lds_critico1', $lds_critico1)
     ->with('atual2', $atual2)->with('lds_normal2', $lds_normal2)->with('lds_alarme2', $lds_alarme2)->with('lds_critico2', $lds_critico2)
     ->with('atual3', $atual3)->with('lds_normal3', $lds_normal3)->with('lds_alarme3', $lds_alarme3)->with('lds_critico3', $lds_critico3)
     ->with('atual4', $atual4)->with('lds_normal4', $lds_normal4)->with('lds_alarme4', $lds_alarme4)->with('lds_critico4', $lds_critico4)
     ->with('atual5', $atual5)->with('lds_normal5', $lds_normal5)->with('lds_alarme5', $lds_alarme5)->with('lds_critico5', $lds_critico5)
     ->with('atual6', $atual6)->with('lds_normal6', $lds_normal6)->with('lds_alarme6', $lds_alarme6)->with('lds_critico6', $lds_critico6)
     ->with('atual7', $atual7)->with('lds_normal7', $lds_normal7)->with('lds_alarme7', $lds_alarme7)->with('lds_critico7', $lds_critico7)
     ->with('atual8', $atual8)->with('lds_normal8', $lds_normal8)->with('lds_alarme8', $lds_alarme8)->with('lds_critico8', $lds_critico8)
     ->with('atual9', $atual9)->with('lds_normal9', $lds_normal9)->with('lds_alarme9', $lds_alarme9)->with('lds_critico9', $lds_critico9)
     ->with('atual10', $atual10)->with('lds_normal10', $lds_normal10)->with('lds_alarme10', $lds_alarme10)->with('lds_critico10', $lds_critico10)
     ->with('atual11', $atual11)->with('lds_normal11', $lds_normal11)->with('lds_alarme11', $lds_alarme11)->with('lds_critico11', $lds_critico11)
     ->with('atual12', $atual12)->with('lds_normal12', $lds_normal12)->with('lds_alarme12', $lds_alarme12)->with('lds_critico12', $lds_critico12);
   }

   public function LdsAnormalidades() {

     $title = 'Anormalidades | LDS';
     $linha1 = 10;
     $linha2 = 22;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',10)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $alarme1P = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     $lds_alarme1 = aux::FormatPercents($alarme1P, $sum);
     $lds_alarme2 = aux::FormatPercents($alarme2P, $sum);
     $lds_alarme3 = aux::FormatPercents($alarme3P, $sum);
     $lds_alarme4 = aux::FormatPercents($alarme4P, $sum);
     $lds_alarme5 = aux::FormatPercents($alarme5P, $sum);
     $lds_alarme6 = aux::FormatPercents($alarme6P, $sum);
     $lds_alarme7 = aux::FormatPercents($alarme7P, $sum);
     $lds_alarme8 = aux::FormatPercents($alarme8P, $sum);
     $lds_alarme9 = aux::FormatPercents($alarme9P, $sum);
     $lds_alarme10 = aux::FormatPercents($alarme10P, $sum);
     $lds_alarme11 = aux::FormatPercents($alarme11P, $sum);
     $lds_alarme12 = aux::FormatPercents($alarme12P, $sum);

     $lds_critico1 = aux::FormatPercents($critico1P, $sum);
     $lds_critico2 = aux::FormatPercents($critico2P, $sum);
     $lds_critico3 = aux::FormatPercents($critico3P, $sum);
     $lds_critico4 = aux::FormatPercents($critico4P, $sum);
     $lds_critico5 = aux::FormatPercents($critico5P, $sum);
     $lds_critico6 = aux::FormatPercents($critico6P, $sum);
     $lds_critico8 = aux::FormatPercents($critico8P, $sum);
     $lds_critico7 = aux::FormatPercents($critico7P, $sum);
     $lds_critico9 = aux::FormatPercents($critico9P, $sum);
     $lds_critico10 = aux::FormatPercents($critico10P, $sum);
     $lds_critico11 = aux::FormatPercents($critico11P, $sum);
     $lds_critico12 = aux::FormatPercents($critico12P, $sum);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lds-anormalidades')->with('title', $title)->with('sum', $sum)
     ->with('atualf1', $atualf1)->with('lds_alarme1', $lds_alarme1)->with('lds_critico1', $lds_critico1)
     ->with('atualf2', $atualf2)->with('lds_alarme2', $lds_alarme2)->with('lds_critico2', $lds_critico2)
     ->with('atualf3', $atualf3)->with('lds_alarme3', $lds_alarme3)->with('lds_critico3', $lds_critico3)
     ->with('atualf4', $atualf4)->with('lds_alarme4', $lds_alarme4)->with('lds_critico4', $lds_critico4)
     ->with('atualf5', $atualf5)->with('lds_alarme5', $lds_alarme5)->with('lds_critico5', $lds_critico5)
     ->with('atualf6', $atualf6)->with('lds_alarme6', $lds_alarme6)->with('lds_critico6', $lds_critico6)
     ->with('atualf7', $atualf7)->with('lds_alarme7', $lds_alarme7)->with('lds_critico7', $lds_critico7)
     ->with('atualf8', $atualf8)->with('lds_alarme8', $lds_alarme8)->with('lds_critico8', $lds_critico8)
     ->with('atualf9', $atualf9)->with('lds_alarme9', $lds_alarme9)->with('lds_critico9', $lds_critico9)
     ->with('atualf10', $atualf10)->with('lds_alarme10', $lds_alarme10)->with('lds_critico10', $lds_critico10)
     ->with('atualf11', $atualf11)->with('lds_alarme11', $lds_alarme11)->with('lds_critico11', $lds_critico11)
     ->with('atualf12', $atualf12)->with('lds_alarme12', $lds_alarme12)->with('lds_critico12', $lds_critico12);
   }

   public function LdsProblemasEncontrados() {

     $title = 'Problemas Encontrados | LDS';
     $linha1 = 10;
     $linha2 = 22;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 10)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $lds_faltaAperto1 = aux::GeralPorLinhaEDiagTE($atual1, 1, $linha1, $linha2);
     $lds_desbalDeFase1 = aux::GeralPorLinhaEDiagTE($atual1, 2, $linha1, $linha2);
     $lds_compMalDim1 = aux::GeralPorLinhaEDiagTE($atual1, 3, $linha1, $linha2);
     $lds_caboRessecado1 = aux::GeralPorLinhaEDiagTE($atual1, 4, $linha1, $linha2);
     $lds_defeitoComp1 = aux::GeralPorLinhaEDiagTE($atual1, 5, $linha1, $linha2);
     $lds_conexaoTerm1 = aux::GeralPorLinhaEDiagTE($atual1, 37, $linha1, $linha2);

     $lds_faltaAperto2 = aux::GeralPorLinhaEDiagTE($atual2, 1, $linha1, $linha2);
     $lds_desbalDeFase2 = aux::GeralPorLinhaEDiagTE($atual2, 2, $linha1, $linha2);
     $lds_compMalDim2 = aux::GeralPorLinhaEDiagTE($atual2, 3, $linha1, $linha2);
     $lds_caboRessecado2 = aux::GeralPorLinhaEDiagTE($atual2, 4, $linha1, $linha2);
     $lds_defeitoComp2 = aux::GeralPorLinhaEDiagTE($atual2, 5, $linha1, $linha2);
     $lds_conexaoTerm2 = aux::GeralPorLinhaEDiagTE($atual2, 37, $linha1, $linha2);

     $lds_faltaAperto3 = aux::GeralPorLinhaEDiagTE($atual3, 1, $linha1, $linha2);
     $lds_desbalDeFase3 = aux::GeralPorLinhaEDiagTE($atual3, 2, $linha1, $linha2);
     $lds_compMalDim3 = aux::GeralPorLinhaEDiagTE($atual3, 3, $linha1, $linha2);
     $lds_caboRessecado3 = aux::GeralPorLinhaEDiagTE($atual3, 4, $linha1, $linha2);
     $lds_defeitoComp3 = aux::GeralPorLinhaEDiagTE($atual3, 5, $linha1, $linha2);
     $lds_conexaoTerm3 = aux::GeralPorLinhaEDiagTE($atual3, 37, $linha1, $linha2);

     $lds_faltaAperto4 = aux::GeralPorLinhaEDiagTE($atual4, 1, $linha1, $linha2);
     $lds_desbalDeFase4 = aux::GeralPorLinhaEDiagTE($atual4, 2, $linha1, $linha2);
     $lds_compMalDim4 = aux::GeralPorLinhaEDiagTE($atual4, 3, $linha1, $linha2);
     $lds_caboRessecado4 = aux::GeralPorLinhaEDiagTE($atual4, 4, $linha1, $linha2);
     $lds_defeitoComp4 = aux::GeralPorLinhaEDiagTE($atual4, 5, $linha1, $linha2);
     $lds_conexaoTerm4 = aux::GeralPorLinhaEDiagTE($atual4, 37, $linha1, $linha2);

     $lds_faltaAperto5 = aux::GeralPorLinhaEDiagTE($atual5, 1, $linha1, $linha2);
     $lds_desbalDeFase5 = aux::GeralPorLinhaEDiagTE($atual5, 2, $linha1, $linha2);
     $lds_compMalDim5 = aux::GeralPorLinhaEDiagTE($atual5, 3, $linha1, $linha2);
     $lds_caboRessecado5 = aux::GeralPorLinhaEDiagTE($atual5, 4, $linha1, $linha2);
     $lds_defeitoComp5 = aux::GeralPorLinhaEDiagTE($atual5, 5, $linha1, $linha2);
     $lds_conexaoTerm5 = aux::GeralPorLinhaEDiagTE($atual5, 37, $linha1, $linha2);

     $lds_faltaAperto6 = aux::GeralPorLinhaEDiagTE($atual6, 1, $linha1, $linha2);
     $lds_desbalDeFase6 = aux::GeralPorLinhaEDiagTE($atual6, 2, $linha1, $linha2);
     $lds_compMalDim6 = aux::GeralPorLinhaEDiagTE($atual6, 3, $linha1, $linha2);
     $lds_caboRessecado6 = aux::GeralPorLinhaEDiagTE($atual6, 4, $linha1, $linha2);
     $lds_defeitoComp6 = aux::GeralPorLinhaEDiagTE($atual6, 5, $linha1, $linha2);
     $lds_conexaoTerm6 = aux::GeralPorLinhaEDiagTE($atual6, 37, $linha1, $linha2);

     $lds_faltaAperto7 = aux::GeralPorLinhaEDiagTE($atual7, 1, $linha1, $linha2);
     $lds_desbalDeFase7 = aux::GeralPorLinhaEDiagTE($atual7, 2, $linha1, $linha2);
     $lds_compMalDim7 = aux::GeralPorLinhaEDiagTE($atual7, 3, $linha1, $linha2);
     $lds_caboRessecado7 = aux::GeralPorLinhaEDiagTE($atual7, 4, $linha1, $linha2);
     $lds_defeitoComp7 = aux::GeralPorLinhaEDiagTE($atual7, 5, $linha1, $linha2);
     $lds_conexaoTerm7 = aux::GeralPorLinhaEDiagTE($atual7, 37, $linha1, $linha2);

     $lds_faltaAperto8 = aux::GeralPorLinhaEDiagTE($atual8, 1, $linha1, $linha2);
     $lds_desbalDeFase8 = aux::GeralPorLinhaEDiagTE($atual8, 2, $linha1, $linha2);
     $lds_compMalDim8 = aux::GeralPorLinhaEDiagTE($atual8, 3, $linha1, $linha2);
     $lds_caboRessecado8 = aux::GeralPorLinhaEDiagTE($atual8, 4, $linha1, $linha2);
     $lds_defeitoComp8 = aux::GeralPorLinhaEDiagTE($atual8, 5, $linha1, $linha2);
     $lds_conexaoTerm8 = aux::GeralPorLinhaEDiagTE($atual8, 37, $linha1, $linha2);

     $lds_faltaAperto9 = aux::GeralPorLinhaEDiagTE($atual9, 1, $linha1, $linha2);
     $lds_desbalDeFase9 = aux::GeralPorLinhaEDiagTE($atual9, 2, $linha1, $linha2);
     $lds_compMalDim9 = aux::GeralPorLinhaEDiagTE($atual9, 3, $linha1, $linha2);
     $lds_caboRessecado9 = aux::GeralPorLinhaEDiagTE($atual9, 4, $linha1, $linha2);
     $lds_defeitoComp9 = aux::GeralPorLinhaEDiagTE($atual9, 5, $linha1, $linha2);
     $lds_conexaoTerm9 = aux::GeralPorLinhaEDiagTE($atual9, 37, $linha1, $linha2);

     $lds_faltaAperto10 = aux::GeralPorLinhaEDiagTE($atual10, 1, $linha1, $linha2);
     $lds_desbalDeFase10 = aux::GeralPorLinhaEDiagTE($atual10, 2, $linha1, $linha2);
     $lds_compMalDim10 = aux::GeralPorLinhaEDiagTE($atual10, 3, $linha1, $linha2);
     $lds_caboRessecado10 = aux::GeralPorLinhaEDiagTE($atual10, 4, $linha1, $linha2);
     $lds_defeitoComp10 = aux::GeralPorLinhaEDiagTE($atual10, 5, $linha1, $linha2);
     $lds_conexaoTerm10 = aux::GeralPorLinhaEDiagTE($atual10, 37, $linha1, $linha2);

     $lds_faltaAperto11 = aux::GeralPorLinhaEDiagTE($atual11, 1, $linha1, $linha2);
     $lds_desbalDeFase11 = aux::GeralPorLinhaEDiagTE($atual11, 2, $linha1, $linha2);
     $lds_compMalDim11 = aux::GeralPorLinhaEDiagTE($atual11, 3, $linha1, $linha2);
     $lds_caboRessecado11 = aux::GeralPorLinhaEDiagTE($atual11, 4, $linha1, $linha2);
     $lds_defeitoComp11 = aux::GeralPorLinhaEDiagTE($atual11, 5, $linha1, $linha2);
     $lds_conexaoTerm11 = aux::GeralPorLinhaEDiagTE($atual11, 37, $linha1, $linha2);

     $lds_faltaAperto12 = aux::GeralPorLinhaEDiagTE($atual12, 1, $linha1, $linha2);
     $lds_desbalDeFase12 = aux::GeralPorLinhaEDiagTE($atual12, 2, $linha1, $linha2);
     $lds_compMalDim12 = aux::GeralPorLinhaEDiagTE($atual12, 3, $linha1, $linha2);
     $lds_caboRessecado12 = aux::GeralPorLinhaEDiagTE($atual12, 4, $linha1, $linha2);
     $lds_defeitoComp12 = aux::GeralPorLinhaEDiagTE($atual12, 5, $linha1, $linha2);
     $lds_conexaoTerm12 = aux::GeralPorLinhaEDiagTE($atual12, 37, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lds-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lds_faltaAperto1', $lds_faltaAperto1)->with('lds_desbalDeFase1', $lds_desbalDeFase1)->with('lds_compMalDim1', $lds_compMalDim1)->with('lds_caboRessecado1', $lds_caboRessecado1)->with('lds_defeitoComp1', $lds_defeitoComp1)->with('lds_conexaoTerm1', $lds_conexaoTerm1)
       ->with('atualf2', $atualf2)->with('lds_faltaAperto2', $lds_faltaAperto2)->with('lds_desbalDeFase2', $lds_desbalDeFase2)->with('lds_compMalDim2', $lds_compMalDim2)->with('lds_caboRessecado2', $lds_caboRessecado2)->with('lds_defeitoComp2', $lds_defeitoComp2)->with('lds_conexaoTerm2', $lds_conexaoTerm2)
       ->with('atualf3', $atualf3)->with('lds_faltaAperto3', $lds_faltaAperto3)->with('lds_desbalDeFase3', $lds_desbalDeFase3)->with('lds_compMalDim3', $lds_compMalDim3)->with('lds_caboRessecado3', $lds_caboRessecado3)->with('lds_defeitoComp3', $lds_defeitoComp3)->with('lds_conexaoTerm3', $lds_conexaoTerm3)
       ->with('atualf4', $atualf4)->with('lds_faltaAperto4', $lds_faltaAperto4)->with('lds_desbalDeFase4', $lds_desbalDeFase4)->with('lds_compMalDim4', $lds_compMalDim4)->with('lds_caboRessecado4', $lds_caboRessecado4)->with('lds_defeitoComp4', $lds_defeitoComp4)->with('lds_conexaoTerm4', $lds_conexaoTerm4)
       ->with('atualf5', $atualf5)->with('lds_faltaAperto5', $lds_faltaAperto5)->with('lds_desbalDeFase5', $lds_desbalDeFase5)->with('lds_compMalDim5', $lds_compMalDim5)->with('lds_caboRessecado5', $lds_caboRessecado5)->with('lds_defeitoComp5', $lds_defeitoComp5)->with('lds_conexaoTerm5', $lds_conexaoTerm5)
       ->with('atualf6', $atualf6)->with('lds_faltaAperto6', $lds_faltaAperto6)->with('lds_desbalDeFase6', $lds_desbalDeFase6)->with('lds_compMalDim6', $lds_compMalDim6)->with('lds_caboRessecado6', $lds_caboRessecado6)->with('lds_defeitoComp6', $lds_defeitoComp6)->with('lds_conexaoTerm6', $lds_conexaoTerm6)
       ->with('atualf7', $atualf7)->with('lds_faltaAperto7', $lds_faltaAperto7)->with('lds_desbalDeFase7', $lds_desbalDeFase7)->with('lds_compMalDim7', $lds_compMalDim7)->with('lds_caboRessecado7', $lds_caboRessecado7)->with('lds_defeitoComp7', $lds_defeitoComp7)->with('lds_conexaoTerm7', $lds_conexaoTerm7)
       ->with('atualf8', $atualf8)->with('lds_faltaAperto8', $lds_faltaAperto8)->with('lds_desbalDeFase8', $lds_desbalDeFase8)->with('lds_compMalDim8', $lds_compMalDim8)->with('lds_caboRessecado8', $lds_caboRessecado8)->with('lds_defeitoComp8', $lds_defeitoComp8)->with('lds_conexaoTerm8', $lds_conexaoTerm8)
       ->with('atualf9', $atualf9)->with('lds_faltaAperto9', $lds_faltaAperto9)->with('lds_desbalDeFase9', $lds_desbalDeFase9)->with('lds_compMalDim9', $lds_compMalDim9)->with('lds_caboRessecado9', $lds_caboRessecado9)->with('lds_defeitoComp9', $lds_defeitoComp9)->with('lds_conexaoTerm9', $lds_conexaoTerm9)
       ->with('atualf10', $atualf10)->with('lds_faltaAperto10', $lds_faltaAperto10)->with('lds_desbalDeFase10', $lds_desbalDeFase10)->with('lds_compMalDim10', $lds_compMalDim10)->with('lds_caboRessecado10', $lds_caboRessecado10)->with('lds_defeitoComp10', $lds_defeitoComp10)->with('lds_conexaoTerm10', $lds_conexaoTerm10)
       ->with('atualf11', $atualf11)->with('lds_faltaAperto11', $lds_faltaAperto11)->with('lds_desbalDeFase11', $lds_desbalDeFase11)->with('lds_compMalDim11', $lds_compMalDim11)->with('lds_caboRessecado11', $lds_caboRessecado11)->with('lds_defeitoComp11', $lds_defeitoComp11)->with('lds_conexaoTerm11', $lds_conexaoTerm11)
       ->with('atualf12', $atualf12)->with('lds_faltaAperto12', $lds_faltaAperto12)->with('lds_desbalDeFase12', $lds_desbalDeFase12)->with('lds_compMalDim12', $lds_compMalDim12)->with('lds_caboRessecado12', $lds_caboRessecado12)->with('lds_defeitoComp12', $lds_defeitoComp12)->with('lds_conexaoTerm12', $lds_conexaoTerm12);
   }

   public function LrfPerfil() {

     $title = 'Perfil | LRF';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 12;
     $linha2 = 0;

     $lrf_manutencao = aux::GeralPorLinhaTE($atual1, 1, $linha1, $linha2);
     $lrf_standBy = aux::GeralPorLinhaTE($atual1, 2, $linha1, $linha2);
     $lrf_normal = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
     $lrf_alarme = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $lrf_critico = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

     if($lrf_manutencao == null){$lrf_manutencao = 0;}
     if($lrf_standBy == null){$lrf_standBy = 0;}
     if($lrf_normal == null){$lrf_normal = 0;}
     if($lrf_alarme == null){$lrf_alarme = 0;}
     if($lrf_critico == null){$lrf_critico = 0;}

    $sum1 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 12)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 0)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum = $sum1+$sum2;

    $manutencaoP_format = ($lrf_manutencao / $sum)*100;
    $lrf_manutencaoP = number_format($manutencaoP_format,2,".",",");
    $standByP_format = ($lrf_standBy / $sum)*100;
    $lrf_standByP = number_format($standByP_format,2,".",",");
    $normalP_format = ($lrf_normal / $sum)*100;
    $lrf_normalP = number_format($normalP_format,2,".",",");
    $alarmeP_format = ($lrf_alarme / $sum)*100;
    $lrf_alarmeP = number_format($alarmeP_format,2,".",",");
    $criticoP_format = ($lrf_critico / $sum)*100;
    $lrf_criticoP = number_format($criticoP_format,2,".",",");

       return view('csn.relatorioGerencial.includes.indexRelGerTE_LRF_perfil')->with('title', $title)->with('sum', $sum)
        ->with('lrf_manutencao', $lrf_manutencao)->with('lrf_standBy', $lrf_standBy)->with('lrf_normal', $lrf_normal)->with('lrf_alarme', $lrf_alarme)->with('lrf_critico', $lrf_critico)
        ->with('lrf_manutencaoP', $lrf_manutencaoP)->with('lrf_standByP', $lrf_standByP)->with('lrf_normalP', $lrf_normalP)->with('lrf_alarmeP', $lrf_alarmeP)->with('lrf_criticoP', $lrf_criticoP);
   }

   public function LrfStatusDosPontos() {

    $title = 'Status Pontos | LRF';
    $linha1 = 12;
    $linha2 = 0;

    $sum1 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',12)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum = $sum1+$sum2;

    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

    $lrf_normal1 = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
    $lrf_alarme1 = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
    $lrf_critico1 = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

    $lrf_normal2 = aux::GeralPorLinhaTE($atual2, 3, $linha1, $linha2);
    $lrf_alarme2 = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
    $lrf_critico2 = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);

    $lrf_normal3 = aux::GeralPorLinhaTE($atual3, 3, $linha1, $linha2);
    $lrf_alarme3 = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
    $lrf_critico3 = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);

    $lrf_normal4 = aux::GeralPorLinhaTE($atual4, 3, $linha1, $linha2);
    $lrf_alarme4 = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
    $lrf_critico4 = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);

    $lrf_normal5 = aux::GeralPorLinhaTE($atual5, 3, $linha1, $linha2);
    $lrf_alarme5 = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
    $lrf_critico5 = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);

    $lrf_normal6 = aux::GeralPorLinhaTE($atual6, 3, $linha1, $linha2);
    $lrf_alarme6 = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
    $lrf_critico6 = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);

    $lrf_normal7 = aux::GeralPorLinhaTE($atual7, 3, $linha1, $linha2);
    $lrf_alarme7 = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
    $lrf_critico7 = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);

    $lrf_normal8 = aux::GeralPorLinhaTE($atual8, 3, $linha1, $linha2);
    $lrf_alarme8 = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
    $lrf_critico8 = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);

    $lrf_normal9 = aux::GeralPorLinhaTE($atual9, 3, $linha1, $linha2);
    $lrf_alarme9 = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
    $lrf_critico9 = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);

    $lrf_normal10 = aux::GeralPorLinhaTE($atual10, 3, $linha1, $linha2);
    $lrf_alarme10 = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
    $lrf_critico10 = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);

    $lrf_normal11 = aux::GeralPorLinhaTE($atual11, 3, $linha1, $linha2);
    $lrf_alarme11 = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
    $lrf_critico11 = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);

    $lrf_normal12 = aux::GeralPorLinhaTE($atual12, 3, $linha1, $linha2);
    $lrf_alarme12 = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
    $lrf_critico12 = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lrf-status-dos-pontos')->with('title', $title)->with('sum', $sum)
     ->with('atual1', $atual1)->with('lrf_normal1', $lrf_normal1)->with('lrf_alarme1', $lrf_alarme1)->with('lrf_critico1', $lrf_critico1)
     ->with('atual2', $atual2)->with('lrf_normal2', $lrf_normal2)->with('lrf_alarme2', $lrf_alarme2)->with('lrf_critico2', $lrf_critico2)
     ->with('atual3', $atual3)->with('lrf_normal3', $lrf_normal3)->with('lrf_alarme3', $lrf_alarme3)->with('lrf_critico3', $lrf_critico3)
     ->with('atual4', $atual4)->with('lrf_normal4', $lrf_normal4)->with('lrf_alarme4', $lrf_alarme4)->with('lrf_critico4', $lrf_critico4)
     ->with('atual5', $atual5)->with('lrf_normal5', $lrf_normal5)->with('lrf_alarme5', $lrf_alarme5)->with('lrf_critico5', $lrf_critico5)
     ->with('atual6', $atual6)->with('lrf_normal6', $lrf_normal6)->with('lrf_alarme6', $lrf_alarme6)->with('lrf_critico6', $lrf_critico6)
     ->with('atual7', $atual7)->with('lrf_normal7', $lrf_normal7)->with('lrf_alarme7', $lrf_alarme7)->with('lrf_critico7', $lrf_critico7)
     ->with('atual8', $atual8)->with('lrf_normal8', $lrf_normal8)->with('lrf_alarme8', $lrf_alarme8)->with('lrf_critico8', $lrf_critico8)
     ->with('atual9', $atual9)->with('lrf_normal9', $lrf_normal9)->with('lrf_alarme9', $lrf_alarme9)->with('lrf_critico9', $lrf_critico9)
     ->with('atual10', $atual10)->with('lrf_normal10', $lrf_normal10)->with('lrf_alarme10', $lrf_alarme10)->with('lrf_critico10', $lrf_critico10)
     ->with('atual11', $atual11)->with('lrf_normal11', $lrf_normal11)->with('lrf_alarme11', $lrf_alarme11)->with('lrf_critico11', $lrf_critico11)
     ->with('atual12', $atual12)->with('lrf_normal12', $lrf_normal12)->with('lrf_alarme12', $lrf_alarme12)->with('lrf_critico12', $lrf_critico12);
   }

   public function LrfAnormalidades() {

     $title = 'Anormalidades | LRF';
     $linha1 = 12;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',12)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $alarme1P = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     $lrf_alarme1 = aux::FormatPercents($alarme1P, $sum);
     $lrf_alarme2 = aux::FormatPercents($alarme2P, $sum);
     $lrf_alarme3 = aux::FormatPercents($alarme3P, $sum);
     $lrf_alarme4 = aux::FormatPercents($alarme4P, $sum);
     $lrf_alarme5 = aux::FormatPercents($alarme5P, $sum);
     $lrf_alarme6 = aux::FormatPercents($alarme6P, $sum);
     $lrf_alarme7 = aux::FormatPercents($alarme7P, $sum);
     $lrf_alarme8 = aux::FormatPercents($alarme8P, $sum);
     $lrf_alarme9 = aux::FormatPercents($alarme9P, $sum);
     $lrf_alarme10 = aux::FormatPercents($alarme10P, $sum);
     $lrf_alarme11 = aux::FormatPercents($alarme11P, $sum);
     $lrf_alarme12 = aux::FormatPercents($alarme12P, $sum);

     $lrf_critico1 = aux::FormatPercents($critico1P, $sum);
     $lrf_critico2 = aux::FormatPercents($critico2P, $sum);
     $lrf_critico3 = aux::FormatPercents($critico3P, $sum);
     $lrf_critico4 = aux::FormatPercents($critico4P, $sum);
     $lrf_critico5 = aux::FormatPercents($critico5P, $sum);
     $lrf_critico6 = aux::FormatPercents($critico6P, $sum);
     $lrf_critico7 = aux::FormatPercents($critico7P, $sum);
     $lrf_critico8 = aux::FormatPercents($critico8P, $sum);
     $lrf_critico9 = aux::FormatPercents($critico9P, $sum);
     $lrf_critico10 = aux::FormatPercents($critico10P, $sum);
     $lrf_critico11 = aux::FormatPercents($critico11P, $sum);
     $lrf_critico12 = aux::FormatPercents($critico12P, $sum);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lrf-anormalidades')->with('title', $title)->with('sum', $sum)
               ->with('atualf1', $atualf1)->with('lrf_alarme1', $lrf_alarme1)->with('lrf_critico1', $lrf_critico1)
               ->with('atualf2', $atualf2)->with('lrf_alarme2', $lrf_alarme2)->with('lrf_critico2', $lrf_critico2)
               ->with('atualf3', $atualf3)->with('lrf_alarme3', $lrf_alarme3)->with('lrf_critico3', $lrf_critico3)
               ->with('atualf4', $atualf4)->with('lrf_alarme4', $lrf_alarme4)->with('lrf_critico4', $lrf_critico4)
               ->with('atualf5', $atualf5)->with('lrf_alarme5', $lrf_alarme5)->with('lrf_critico5', $lrf_critico5)
               ->with('atualf6', $atualf6)->with('lrf_alarme6', $lrf_alarme6)->with('lrf_critico6', $lrf_critico6)
               ->with('atualf7', $atualf7)->with('lrf_alarme7', $lrf_alarme7)->with('lrf_critico7', $lrf_critico7)
               ->with('atualf8', $atualf8)->with('lrf_alarme8', $lrf_alarme8)->with('lrf_critico8', $lrf_critico8)
               ->with('atualf9', $atualf9)->with('lrf_alarme9', $lrf_alarme9)->with('lrf_critico9', $lrf_critico9)
               ->with('atualf10', $atualf10)->with('lrf_alarme10', $lrf_alarme10)->with('lrf_critico10', $lrf_critico10)
               ->with('atualf11', $atualf11)->with('lrf_alarme11', $lrf_alarme11)->with('lrf_critico11', $lrf_critico11)
               ->with('atualf12', $atualf12)->with('lrf_alarme12', $lrf_alarme12)->with('lrf_critico12', $lrf_critico12);
   }

   public function LrfProblemasEncontrados() {

     $title = 'Problemas Encontrados | LRF';
     $linha1 = 12;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 12)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $lrf_faltaAperto1 = aux::GeralPorLinhaEDiagTE($atual1, 1, $linha1, $linha2);
     $lrf_desbalDeFase1 = aux::GeralPorLinhaEDiagTE($atual1, 2, $linha1, $linha2);
     $lrf_compMalDim1 = aux::GeralPorLinhaEDiagTE($atual1, 3, $linha1, $linha2);
     $lrf_caboRessecado1 = aux::GeralPorLinhaEDiagTE($atual1, 4, $linha1, $linha2);
     $lrf_defeitoComp1 = aux::GeralPorLinhaEDiagTE($atual1, 5, $linha1, $linha2);
     $lrf_conexaoTerm1 = aux::GeralPorLinhaEDiagTE($atual1, 37, $linha1, $linha2);

     $lrf_faltaAperto2 = aux::GeralPorLinhaEDiagTE($atual2, 1, $linha1, $linha2);
     $lrf_desbalDeFase2 = aux::GeralPorLinhaEDiagTE($atual2, 2, $linha1, $linha2);
     $lrf_compMalDim2 = aux::GeralPorLinhaEDiagTE($atual2, 3, $linha1, $linha2);
     $lrf_caboRessecado2 = aux::GeralPorLinhaEDiagTE($atual2, 4, $linha1, $linha2);
     $lrf_defeitoComp2 = aux::GeralPorLinhaEDiagTE($atual2, 5, $linha1, $linha2);
     $lrf_conexaoTerm2 = aux::GeralPorLinhaEDiagTE($atual2, 37, $linha1, $linha2);

     $lrf_faltaAperto3 = aux::GeralPorLinhaEDiagTE($atual3, 1, $linha1, $linha2);
     $lrf_desbalDeFase3 = aux::GeralPorLinhaEDiagTE($atual3, 2, $linha1, $linha2);
     $lrf_compMalDim3 = aux::GeralPorLinhaEDiagTE($atual3, 3, $linha1, $linha2);
     $lrf_caboRessecado3 = aux::GeralPorLinhaEDiagTE($atual3, 4, $linha1, $linha2);
     $lrf_defeitoComp3 = aux::GeralPorLinhaEDiagTE($atual3, 5, $linha1, $linha2);
     $lrf_conexaoTerm3 = aux::GeralPorLinhaEDiagTE($atual3, 37, $linha1, $linha2);

     $lrf_faltaAperto4 = aux::GeralPorLinhaEDiagTE($atual4, 1, $linha1, $linha2);
     $lrf_desbalDeFase4 = aux::GeralPorLinhaEDiagTE($atual4, 2, $linha1, $linha2);
     $lrf_compMalDim4 = aux::GeralPorLinhaEDiagTE($atual4, 3, $linha1, $linha2);
     $lrf_caboRessecado4 = aux::GeralPorLinhaEDiagTE($atual4, 4, $linha1, $linha2);
     $lrf_defeitoComp4 = aux::GeralPorLinhaEDiagTE($atual4, 5, $linha1, $linha2);
     $lrf_conexaoTerm4 = aux::GeralPorLinhaEDiagTE($atual4, 37, $linha1, $linha2);

     $lrf_faltaAperto5 = aux::GeralPorLinhaEDiagTE($atual5, 1, $linha1, $linha2);
     $lrf_desbalDeFase5 = aux::GeralPorLinhaEDiagTE($atual5, 2, $linha1, $linha2);
     $lrf_compMalDim5 = aux::GeralPorLinhaEDiagTE($atual5, 3, $linha1, $linha2);
     $lrf_caboRessecado5 = aux::GeralPorLinhaEDiagTE($atual5, 4, $linha1, $linha2);
     $lrf_defeitoComp5 = aux::GeralPorLinhaEDiagTE($atual5, 5, $linha1, $linha2);
     $lrf_conexaoTerm5 = aux::GeralPorLinhaEDiagTE($atual5, 37, $linha1, $linha2);

     $lrf_faltaAperto6 = aux::GeralPorLinhaEDiagTE($atual6, 1, $linha1, $linha2);
     $lrf_desbalDeFase6 = aux::GeralPorLinhaEDiagTE($atual6, 2, $linha1, $linha2);
     $lrf_compMalDim6 = aux::GeralPorLinhaEDiagTE($atual6, 3, $linha1, $linha2);
     $lrf_caboRessecado6 = aux::GeralPorLinhaEDiagTE($atual6, 4, $linha1, $linha2);
     $lrf_defeitoComp6 = aux::GeralPorLinhaEDiagTE($atual6, 5, $linha1, $linha2);
     $lrf_conexaoTerm6 = aux::GeralPorLinhaEDiagTE($atual6, 37, $linha1, $linha2);

     $lrf_faltaAperto7 = aux::GeralPorLinhaEDiagTE($atual7, 1, $linha1, $linha2);
     $lrf_desbalDeFase7 = aux::GeralPorLinhaEDiagTE($atual7, 2, $linha1, $linha2);
     $lrf_compMalDim7 = aux::GeralPorLinhaEDiagTE($atual7, 3, $linha1, $linha2);
     $lrf_caboRessecado7 = aux::GeralPorLinhaEDiagTE($atual7, 4, $linha1, $linha2);
     $lrf_defeitoComp7 = aux::GeralPorLinhaEDiagTE($atual7, 5, $linha1, $linha2);
     $lrf_conexaoTerm7 = aux::GeralPorLinhaEDiagTE($atual7, 37, $linha1, $linha2);

     $lrf_faltaAperto8 = aux::GeralPorLinhaEDiagTE($atual8, 1, $linha1, $linha2);
     $lrf_desbalDeFase8 = aux::GeralPorLinhaEDiagTE($atual8, 2, $linha1, $linha2);
     $lrf_compMalDim8 = aux::GeralPorLinhaEDiagTE($atual8, 3, $linha1, $linha2);
     $lrf_caboRessecado8 = aux::GeralPorLinhaEDiagTE($atual8, 4, $linha1, $linha2);
     $lrf_defeitoComp8 = aux::GeralPorLinhaEDiagTE($atual8, 5, $linha1, $linha2);
     $lrf_conexaoTerm8 = aux::GeralPorLinhaEDiagTE($atual8, 37, $linha1, $linha2);

     $lrf_faltaAperto9 = aux::GeralPorLinhaEDiagTE($atual9, 1, $linha1, $linha2);
     $lrf_desbalDeFase9 = aux::GeralPorLinhaEDiagTE($atual9, 2, $linha1, $linha2);
     $lrf_compMalDim9 = aux::GeralPorLinhaEDiagTE($atual9, 3, $linha1, $linha2);
     $lrf_caboRessecado9 = aux::GeralPorLinhaEDiagTE($atual9, 4, $linha1, $linha2);
     $lrf_defeitoComp9 = aux::GeralPorLinhaEDiagTE($atual9, 5, $linha1, $linha2);
     $lrf_conexaoTerm9 = aux::GeralPorLinhaEDiagTE($atual9, 37, $linha1, $linha2);

     $lrf_faltaAperto10 = aux::GeralPorLinhaEDiagTE($atual10, 1, $linha1, $linha2);
     $lrf_desbalDeFase10 = aux::GeralPorLinhaEDiagTE($atual10, 2, $linha1, $linha2);
     $lrf_compMalDim10 = aux::GeralPorLinhaEDiagTE($atual10, 3, $linha1, $linha2);
     $lrf_caboRessecado10 = aux::GeralPorLinhaEDiagTE($atual10, 4, $linha1, $linha2);
     $lrf_defeitoComp10 = aux::GeralPorLinhaEDiagTE($atual10, 5, $linha1, $linha2);
     $lrf_conexaoTerm10 = aux::GeralPorLinhaEDiagTE($atual10, 37, $linha1, $linha2);

     $lrf_faltaAperto11 = aux::GeralPorLinhaEDiagTE($atual11, 1, $linha1, $linha2);
     $lrf_desbalDeFase11 = aux::GeralPorLinhaEDiagTE($atual11, 2, $linha1, $linha2);
     $lrf_compMalDim11 = aux::GeralPorLinhaEDiagTE($atual11, 3, $linha1, $linha2);
     $lrf_caboRessecado11 = aux::GeralPorLinhaEDiagTE($atual11, 4, $linha1, $linha2);
     $lrf_defeitoComp11 = aux::GeralPorLinhaEDiagTE($atual11, 5, $linha1, $linha2);
     $lrf_conexaoTerm11 = aux::GeralPorLinhaEDiagTE($atual11, 37, $linha1, $linha2);

     $lrf_faltaAperto12 = aux::GeralPorLinhaEDiagTE($atual12, 1, $linha1, $linha2);
     $lrf_desbalDeFase12 = aux::GeralPorLinhaEDiagTE($atual12, 2, $linha1, $linha2);
     $lrf_compMalDim12 = aux::GeralPorLinhaEDiagTE($atual12, 3, $linha1, $linha2);
     $lrf_caboRessecado12 = aux::GeralPorLinhaEDiagTE($atual12, 4, $linha1, $linha2);
     $lrf_defeitoComp12 = aux::GeralPorLinhaEDiagTE($atual12, 5, $linha1, $linha2);
     $lrf_conexaoTerm12 = aux::GeralPorLinhaEDiagTE($atual12, 37, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lrf-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lrf_faltaAperto1', $lrf_faltaAperto1)->with('lrf_desbalDeFase1', $lrf_desbalDeFase1)->with('lrf_compMalDim1', $lrf_compMalDim1)->with('lrf_caboRessecado1', $lrf_caboRessecado1)->with('lrf_defeitoComp1', $lrf_defeitoComp1)->with('lrf_conexaoTerm1', $lrf_conexaoTerm1)
       ->with('atualf2', $atualf2)->with('lrf_faltaAperto2', $lrf_faltaAperto2)->with('lrf_desbalDeFase2', $lrf_desbalDeFase2)->with('lrf_compMalDim2', $lrf_compMalDim2)->with('lrf_caboRessecado2', $lrf_caboRessecado2)->with('lrf_defeitoComp2', $lrf_defeitoComp2)->with('lrf_conexaoTerm2', $lrf_conexaoTerm2)
       ->with('atualf3', $atualf3)->with('lrf_faltaAperto3', $lrf_faltaAperto3)->with('lrf_desbalDeFase3', $lrf_desbalDeFase3)->with('lrf_compMalDim3', $lrf_compMalDim3)->with('lrf_caboRessecado3', $lrf_caboRessecado3)->with('lrf_defeitoComp3', $lrf_defeitoComp3)->with('lrf_conexaoTerm3', $lrf_conexaoTerm3)
       ->with('atualf4', $atualf4)->with('lrf_faltaAperto4', $lrf_faltaAperto4)->with('lrf_desbalDeFase4', $lrf_desbalDeFase4)->with('lrf_compMalDim4', $lrf_compMalDim4)->with('lrf_caboRessecado4', $lrf_caboRessecado4)->with('lrf_defeitoComp4', $lrf_defeitoComp4)->with('lrf_conexaoTerm4', $lrf_conexaoTerm4)
       ->with('atualf5', $atualf5)->with('lrf_faltaAperto5', $lrf_faltaAperto5)->with('lrf_desbalDeFase5', $lrf_desbalDeFase5)->with('lrf_compMalDim5', $lrf_compMalDim5)->with('lrf_caboRessecado5', $lrf_caboRessecado5)->with('lrf_defeitoComp5', $lrf_defeitoComp5)->with('lrf_conexaoTerm5', $lrf_conexaoTerm5)
       ->with('atualf6', $atualf6)->with('lrf_faltaAperto6', $lrf_faltaAperto6)->with('lrf_desbalDeFase6', $lrf_desbalDeFase6)->with('lrf_compMalDim6', $lrf_compMalDim6)->with('lrf_caboRessecado6', $lrf_caboRessecado6)->with('lrf_defeitoComp6', $lrf_defeitoComp6)->with('lrf_conexaoTerm6', $lrf_conexaoTerm6)
       ->with('atualf7', $atualf7)->with('lrf_faltaAperto7', $lrf_faltaAperto7)->with('lrf_desbalDeFase7', $lrf_desbalDeFase7)->with('lrf_compMalDim7', $lrf_compMalDim7)->with('lrf_caboRessecado7', $lrf_caboRessecado7)->with('lrf_defeitoComp7', $lrf_defeitoComp7)->with('lrf_conexaoTerm7', $lrf_conexaoTerm7)
       ->with('atualf8', $atualf8)->with('lrf_faltaAperto8', $lrf_faltaAperto8)->with('lrf_desbalDeFase8', $lrf_desbalDeFase8)->with('lrf_compMalDim8', $lrf_compMalDim8)->with('lrf_caboRessecado8', $lrf_caboRessecado8)->with('lrf_defeitoComp8', $lrf_defeitoComp8)->with('lrf_conexaoTerm8', $lrf_conexaoTerm8)
       ->with('atualf9', $atualf9)->with('lrf_faltaAperto9', $lrf_faltaAperto9)->with('lrf_desbalDeFase9', $lrf_desbalDeFase9)->with('lrf_compMalDim9', $lrf_compMalDim9)->with('lrf_caboRessecado9', $lrf_caboRessecado9)->with('lrf_defeitoComp9', $lrf_defeitoComp9)->with('lrf_conexaoTerm9', $lrf_conexaoTerm9)
       ->with('atualf10', $atualf10)->with('lrf_faltaAperto10', $lrf_faltaAperto10)->with('lrf_desbalDeFase10', $lrf_desbalDeFase10)->with('lrf_compMalDim10', $lrf_compMalDim10)->with('lrf_caboRessecado10', $lrf_caboRessecado10)->with('lrf_defeitoComp10', $lrf_defeitoComp10)->with('lrf_conexaoTerm10', $lrf_conexaoTerm10)
       ->with('atualf11', $atualf11)->with('lrf_faltaAperto11', $lrf_faltaAperto11)->with('lrf_desbalDeFase11', $lrf_desbalDeFase11)->with('lrf_compMalDim11', $lrf_compMalDim11)->with('lrf_caboRessecado11', $lrf_caboRessecado11)->with('lrf_defeitoComp11', $lrf_defeitoComp11)->with('lrf_conexaoTerm11', $lrf_conexaoTerm11)
       ->with('atualf12', $atualf12)->with('lrf_faltaAperto12', $lrf_faltaAperto12)->with('lrf_desbalDeFase12', $lrf_desbalDeFase12)->with('lrf_compMalDim12', $lrf_compMalDim12)->with('lrf_caboRessecado12', $lrf_caboRessecado12)->with('lrf_defeitoComp12', $lrf_defeitoComp12)->with('lrf_conexaoTerm12', $lrf_conexaoTerm12);
   }

   public function UtiPerfil() {

     $title = 'Perfil | Utilidades';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 7;

     $uti_manutencao = aux::GeralPorLinha2TE($atual1, 1, $parent);
     $uti_standBy = aux::GeralPorLinha2TE($atual1, 2, $parent);
     $uti_normal = aux::GeralPorLinha2TE($atual1, 3, $parent);
     $uti_alarme = aux::GeralPorLinha2TE($atual1, 4, $parent);
     $uti_critico = aux::GeralPorLinha2TE($atual1, 5, $parent);

     if($uti_manutencao == null){$uti_manutencao = 0;}
     if($uti_standBy == null){$uti_standBy = 0;}
     if($uti_normal == null){$uti_normal = 0;}
     if($uti_alarme == null){$uti_alarme = 0;}
     if($uti_critico == null){$uti_critico = 0;}

    $sum = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.parent_id', '=', 7)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $manutencaoP_format = ($uti_manutencao / $sum)*100;
    $uti_manutencaoP = number_format($manutencaoP_format,2,".",",");
    $standByP_format = ($uti_standBy / $sum)*100;
    $uti_standByP = number_format($standByP_format,2,".",",");
    $normalP_format = ($uti_normal / $sum)*100;
    $uti_normalP = number_format($normalP_format,2,".",",");
    $alarmeP_format = ($uti_alarme / $sum)*100;
    $uti_alarmeP = number_format($alarmeP_format,2,".",",");
    $criticoP_format = ($uti_critico / $sum)*100;
    $uti_criticoP = number_format($criticoP_format,2,".",",");

      return view('csn.relatorioGerencial.includes.indexRelGerTE_uti_perfil')->with('title', $title)->with('sum', $sum)
     ->with('uti_manutencao', $uti_manutencao)->with('uti_standBy', $uti_standBy)->with('uti_normal', $uti_normal)->with('uti_alarme', $uti_alarme)->with('uti_critico', $uti_critico)
     ->with('uti_manutencaoP', $uti_manutencaoP)->with('uti_standByP', $uti_standByP)->with('uti_normalP', $uti_normalP)->with('uti_alarmeP', $uti_alarmeP)->with('uti_criticoP', $uti_criticoP);
   }

    public function UtiStatusDosPontos() {

      $title = 'Status Pontos | Utilidades';
      $parent = 7;

      $sum = DB::table('preditiva_atividades')
                  ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                  ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                  ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                  ->where('negocios.parent_id', '=', 7)
                  ->where('preditiva_atividades.tecnicas_id', '=', 1)
                  ->count('preditiva_atividades.id');

      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

      $uti_normal1 = aux::GeralPorLinha2TE($atual1, 3, $parent);
      $uti_alarme1 = aux::GeralPorLinha2TE($atual1, 4, $parent);
      $uti_critico1 = aux::GeralPorLinha2TE($atual1, 5, $parent);

      $uti_normal2 = aux::GeralPorLinha2TE($atual2, 3, $parent);
      $uti_alarme2 = aux::GeralPorLinha2TE($atual2, 4, $parent);
      $uti_critico2 = aux::GeralPorLinha2TE($atual2, 5, $parent);

      $uti_normal3 = aux::GeralPorLinha2TE($atual3, 3, $parent);
      $uti_alarme3 = aux::GeralPorLinha2TE($atual3, 4, $parent);
      $uti_critico3 = aux::GeralPorLinha2TE($atual3, 5, $parent);

      $uti_normal4 = aux::GeralPorLinha2TE($atual4, 3, $parent);
      $uti_alarme4 = aux::GeralPorLinha2TE($atual4, 4, $parent);
      $uti_critico4 = aux::GeralPorLinha2TE($atual4, 5, $parent);

      $uti_normal5 = aux::GeralPorLinha2TE($atual5, 3, $parent);
      $uti_alarme5 = aux::GeralPorLinha2TE($atual5, 4, $parent);
      $uti_critico5 = aux::GeralPorLinha2TE($atual5, 5, $parent);

      $uti_normal6 = aux::GeralPorLinha2TE($atual6, 3, $parent);
      $uti_alarme6 = aux::GeralPorLinha2TE($atual6, 4, $parent);
      $uti_critico6 = aux::GeralPorLinha2TE($atual6, 5, $parent);

      $uti_normal7 = aux::GeralPorLinha2TE($atual7, 3, $parent);
      $uti_alarme7 = aux::GeralPorLinha2TE($atual7, 4, $parent);
      $uti_critico7 = aux::GeralPorLinha2TE($atual7, 5, $parent);

      $uti_normal8 = aux::GeralPorLinha2TE($atual8, 3, $parent);
      $uti_alarme8 = aux::GeralPorLinha2TE($atual8, 4, $parent);
      $uti_critico8 = aux::GeralPorLinha2TE($atual8, 5, $parent);

      $uti_normal9 = aux::GeralPorLinha2TE($atual9, 3, $parent);
      $uti_alarme9 = aux::GeralPorLinha2TE($atual9, 4, $parent);
      $uti_critico9 = aux::GeralPorLinha2TE($atual9, 5, $parent);

      $uti_normal10 = aux::GeralPorLinha2TE($atual10, 3, $parent);
      $uti_alarme10 = aux::GeralPorLinha2TE($atual10, 4, $parent);
      $uti_critico10 = aux::GeralPorLinha2TE($atual10, 5, $parent);

      $uti_normal11 = aux::GeralPorLinha2TE($atual11, 3, $parent);
      $uti_alarme11 = aux::GeralPorLinha2TE($atual11, 4, $parent);
      $uti_critico11 = aux::GeralPorLinha2TE($atual11, 5, $parent);

      $uti_normal12 = aux::GeralPorLinha2TE($atual12, 3, $parent);
      $uti_alarme12 = aux::GeralPorLinha2TE($atual12, 4, $parent);
      $uti_critico12 = aux::GeralPorLinha2TE($atual12, 5, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.uti-status-dos-pontos')->with('title', $title)->with('sum', $sum)
                 ->with('atual1', $atual1)->with('uti_normal1', $uti_normal1)->with('uti_alarme1', $uti_alarme1)->with('uti_critico1', $uti_critico1)
                 ->with('atual2', $atual2)->with('uti_normal2', $uti_normal2)->with('uti_alarme2', $uti_alarme2)->with('uti_critico2', $uti_critico2)
                 ->with('atual3', $atual3)->with('uti_normal3', $uti_normal3)->with('uti_alarme3', $uti_alarme3)->with('uti_critico3', $uti_critico3)
                 ->with('atual4', $atual4)->with('uti_normal4', $uti_normal4)->with('uti_alarme4', $uti_alarme4)->with('uti_critico4', $uti_critico4)
                 ->with('atual5', $atual5)->with('uti_normal5', $uti_normal5)->with('uti_alarme5', $uti_alarme5)->with('uti_critico5', $uti_critico5)
                 ->with('atual6', $atual6)->with('uti_normal6', $uti_normal6)->with('uti_alarme6', $uti_alarme6)->with('uti_critico6', $uti_critico6)
                 ->with('atual7', $atual7)->with('uti_normal7', $uti_normal7)->with('uti_alarme7', $uti_alarme7)->with('uti_critico7', $uti_critico7)
                 ->with('atual8', $atual8)->with('uti_normal8', $uti_normal8)->with('uti_alarme8', $uti_alarme8)->with('uti_critico8', $uti_critico8)
                 ->with('atual9', $atual9)->with('uti_normal9', $uti_normal9)->with('uti_alarme9', $uti_alarme9)->with('uti_critico9', $uti_critico9)
                 ->with('atual10', $atual10)->with('uti_normal10', $uti_normal10)->with('uti_alarme10', $uti_alarme10)->with('uti_critico10', $uti_critico10)
                 ->with('atual11', $atual11)->with('uti_normal11', $uti_normal11)->with('uti_alarme11', $uti_alarme11)->with('uti_critico11', $uti_critico11)
                 ->with('atual12', $atual12)->with('uti_normal12', $uti_normal12)->with('uti_alarme12', $uti_alarme12)->with('uti_critico12', $uti_critico12);
   }

    public function UtiAnormalidades() {
      $title = 'Anormalidades | Utilidades';
      $parent = 7;

      $sum = DB::table('preditiva_atividades')
                  ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                  ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                  ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                  ->where('negocios.parent_id', '=', 7)
                  ->where('preditiva_atividades.tecnicas_id', '=', 1)
                  ->count('preditiva_atividades.id');

      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

      $alarme1P = aux::GeralPorLinha2TE($atual1, 4, $parent);
      $critico1P = aux::GeralPorLinha2TE($atual1, 5, $parent);
      $alarme2P = aux::GeralPorLinha2TE($atual2, 4, $parent);
      $critico2P = aux::GeralPorLinha2TE($atual2, 5, $parent);
      $alarme3P = aux::GeralPorLinha2TE($atual3, 4, $parent);
      $critico3P = aux::GeralPorLinha2TE($atual3, 5, $parent);
      $alarme4P = aux::GeralPorLinha2TE($atual4, 4, $parent);
      $critico4P = aux::GeralPorLinha2TE($atual4, 5, $parent);
      $alarme5P = aux::GeralPorLinha2TE($atual5, 4, $parent);
      $critico5P = aux::GeralPorLinha2TE($atual5, 5, $parent);
      $alarme6P = aux::GeralPorLinha2TE($atual6, 4, $parent);
      $critico6P = aux::GeralPorLinha2TE($atual6, 5, $parent);
      $alarme7P = aux::GeralPorLinha2TE($atual7, 4, $parent);
      $critico7P = aux::GeralPorLinha2TE($atual7, 5, $parent);
      $alarme8P = aux::GeralPorLinha2TE($atual8, 4, $parent);
      $critico8P = aux::GeralPorLinha2TE($atual8, 5, $parent);
      $alarme9P = aux::GeralPorLinha2TE($atual9, 4, $parent);
      $critico9P = aux::GeralPorLinha2TE($atual9, 5, $parent);
      $alarme10P = aux::GeralPorLinha2TE($atual10, 4, $parent);
      $critico10P = aux::GeralPorLinha2TE($atual10, 5, $parent);
      $alarme11P = aux::GeralPorLinha2TE($atual11, 4, $parent);
      $critico11P = aux::GeralPorLinha2TE($atual11, 5, $parent);
      $alarme12P = aux::GeralPorLinha2TE($atual12, 4, $parent);
      $critico12P = aux::GeralPorLinha2TE($atual12, 5, $parent);

      $uti_alarme1 = aux::FormatPercents($alarme1P, $sum);
      $uti_alarme2 = aux::FormatPercents($alarme2P, $sum);
      $uti_alarme3 = aux::FormatPercents($alarme3P, $sum);
      $uti_alarme4 = aux::FormatPercents($alarme4P, $sum);
      $uti_alarme5 = aux::FormatPercents($alarme5P, $sum);
      $uti_alarme6 = aux::FormatPercents($alarme6P, $sum);
      $uti_alarme7 = aux::FormatPercents($alarme7P, $sum);
      $uti_alarme8 = aux::FormatPercents($alarme8P, $sum);
      $uti_alarme9 = aux::FormatPercents($alarme9P, $sum);
      $uti_alarme10 = aux::FormatPercents($alarme10P, $sum);
      $uti_alarme11 = aux::FormatPercents($alarme11P, $sum);
      $uti_alarme12 = aux::FormatPercents($alarme12P, $sum);

      $uti_critico1 = aux::FormatPercents($critico1P, $sum);
      $uti_critico2 = aux::FormatPercents($critico2P, $sum);
      $uti_critico3 = aux::FormatPercents($critico3P, $sum);
      $uti_critico4 = aux::FormatPercents($critico4P, $sum);
      $uti_critico5 = aux::FormatPercents($critico5P, $sum);
      $uti_critico6 = aux::FormatPercents($critico6P, $sum);
      $uti_critico7 = aux::FormatPercents($critico7P, $sum);
      $uti_critico8 = aux::FormatPercents($critico8P, $sum);
      $uti_critico9 = aux::FormatPercents($critico9P, $sum);
      $uti_critico10 = aux::FormatPercents($critico10P, $sum);
      $uti_critico11 = aux::FormatPercents($critico11P, $sum);
      $uti_critico12 = aux::FormatPercents($critico12P, $sum);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.uti-anormalidades')->with('title', $title)->with('sum', $sum)
               ->with('atualf1', $atualf1)->with('uti_alarme1', $uti_alarme1)->with('uti_critico1', $uti_critico1)
               ->with('atualf2', $atualf2)->with('uti_alarme2', $uti_alarme2)->with('uti_critico2', $uti_critico2)
               ->with('atualf3', $atualf3)->with('uti_alarme3', $uti_alarme3)->with('uti_critico3', $uti_critico3)
               ->with('atualf4', $atualf4)->with('uti_alarme4', $uti_alarme4)->with('uti_critico4', $uti_critico4)
               ->with('atualf5', $atualf5)->with('uti_alarme5', $uti_alarme5)->with('uti_critico5', $uti_critico5)
               ->with('atualf6', $atualf6)->with('uti_alarme6', $uti_alarme6)->with('uti_critico6', $uti_critico6)
               ->with('atualf7', $atualf7)->with('uti_alarme7', $uti_alarme7)->with('uti_critico7', $uti_critico7)
               ->with('atualf8', $atualf8)->with('uti_alarme8', $uti_alarme8)->with('uti_critico8', $uti_critico8)
               ->with('atualf9', $atualf9)->with('uti_alarme9', $uti_alarme9)->with('uti_critico9', $uti_critico9)
               ->with('atualf10', $atualf10)->with('uti_alarme10', $uti_alarme10)->with('uti_critico10', $uti_critico10)
               ->with('atualf11', $atualf11)->with('uti_alarme11', $uti_alarme11)->with('uti_critico11', $uti_critico11)
               ->with('atualf12', $atualf12)->with('uti_alarme12', $uti_alarme12)->with('uti_critico12', $uti_critico12);
   }

    public function UtiProblemasEncontrados() {

      $title = 'Problemas Encontrados | Utilidades';
      $parent = 7;

      $sum = DB::table('preditiva_atividades')
                  ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                  ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                  ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                  ->where('negocios.parent_id', '=', 7)
                  ->where('preditiva_atividades.tecnicas_id', '=', 1)
                  ->count('preditiva_atividades.id');

      $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

      $uti_faltaAperto1 = aux::GeralPorLinhaEDiag2TE($atual1, 1, $parent);
      $uti_desbalDeFase1 = aux::GeralPorLinhaEDiag2TE($atual1, 2, $parent);
      $uti_compMalDim1 = aux::GeralPorLinhaEDiag2TE($atual1, 3, $parent);
      $uti_caboRessecado1 = aux::GeralPorLinhaEDiag2TE($atual1, 4, $parent);
      $uti_defeitoComp1 = aux::GeralPorLinhaEDiag2TE($atual1, 5, $parent);
      $uti_conexaoTerm1 = aux::GeralPorLinhaEDiag2TE($atual1, 37, $parent);

      $uti_faltaAperto2 = aux::GeralPorLinhaEDiag2TE($atual2, 1, $parent);
      $uti_desbalDeFase2 = aux::GeralPorLinhaEDiag2TE($atual2, 2, $parent);
      $uti_compMalDim2 = aux::GeralPorLinhaEDiag2TE($atual2, 3, $parent);
      $uti_caboRessecado2 = aux::GeralPorLinhaEDiag2TE($atual2, 4, $parent);
      $uti_defeitoComp2 = aux::GeralPorLinhaEDiag2TE($atual2, 5, $parent);
      $uti_conexaoTerm2 = aux::GeralPorLinhaEDiag2TE($atual2, 37, $parent);

      $uti_faltaAperto3 = aux::GeralPorLinhaEDiag2TE($atual3, 1, $parent);
      $uti_desbalDeFase3 = aux::GeralPorLinhaEDiag2TE($atual3, 2, $parent);
      $uti_compMalDim3 = aux::GeralPorLinhaEDiag2TE($atual3, 3, $parent);
      $uti_caboRessecado3 = aux::GeralPorLinhaEDiag2TE($atual3, 4, $parent);
      $uti_defeitoComp3 = aux::GeralPorLinhaEDiag2TE($atual3, 5, $parent);
      $uti_conexaoTerm3 = aux::GeralPorLinhaEDiag2TE($atual3, 37, $parent);

      $uti_faltaAperto4 = aux::GeralPorLinhaEDiag2TE($atual4, 1, $parent);
      $uti_desbalDeFase4 = aux::GeralPorLinhaEDiag2TE($atual4, 2, $parent);
      $uti_compMalDim4 = aux::GeralPorLinhaEDiag2TE($atual4, 3, $parent);
      $uti_caboRessecado4 = aux::GeralPorLinhaEDiag2TE($atual4, 4, $parent);
      $uti_defeitoComp4 = aux::GeralPorLinhaEDiag2TE($atual4, 5, $parent);
      $uti_conexaoTerm4 = aux::GeralPorLinhaEDiag2TE($atual4, 37, $parent);

      $uti_faltaAperto5 = aux::GeralPorLinhaEDiag2TE($atual5, 1, $parent);
      $uti_desbalDeFase5 = aux::GeralPorLinhaEDiag2TE($atual5, 2, $parent);
      $uti_compMalDim5 = aux::GeralPorLinhaEDiag2TE($atual5, 3, $parent);
      $uti_caboRessecado5 = aux::GeralPorLinhaEDiag2TE($atual5, 4, $parent);
      $uti_defeitoComp5 = aux::GeralPorLinhaEDiag2TE($atual5, 5, $parent);
      $uti_conexaoTerm5 = aux::GeralPorLinhaEDiag2TE($atual5, 37, $parent);

      $uti_faltaAperto6 = aux::GeralPorLinhaEDiag2TE($atual6, 1, $parent);
      $uti_desbalDeFase6 = aux::GeralPorLinhaEDiag2TE($atual6, 2, $parent);
      $uti_compMalDim6 = aux::GeralPorLinhaEDiag2TE($atual6, 3, $parent);
      $uti_caboRessecado6 = aux::GeralPorLinhaEDiag2TE($atual6, 4, $parent);
      $uti_defeitoComp6 = aux::GeralPorLinhaEDiag2TE($atual6, 5, $parent);
      $uti_conexaoTerm6 = aux::GeralPorLinhaEDiag2TE($atual6, 37, $parent);

      $uti_faltaAperto7 = aux::GeralPorLinhaEDiag2TE($atual7, 1, $parent);
      $uti_desbalDeFase7 = aux::GeralPorLinhaEDiag2TE($atual7, 2, $parent);
      $uti_compMalDim7 = aux::GeralPorLinhaEDiag2TE($atual7, 3, $parent);
      $uti_caboRessecado7 = aux::GeralPorLinhaEDiag2TE($atual7, 4, $parent);
      $uti_defeitoComp7 = aux::GeralPorLinhaEDiag2TE($atual7, 5, $parent);
      $uti_conexaoTerm7 = aux::GeralPorLinhaEDiag2TE($atual7, 37, $parent);

      $uti_faltaAperto8 = aux::GeralPorLinhaEDiag2TE($atual8, 1, $parent);
      $uti_desbalDeFase8 = aux::GeralPorLinhaEDiag2TE($atual8, 2, $parent);
      $uti_compMalDim8 = aux::GeralPorLinhaEDiag2TE($atual8, 3, $parent);
      $uti_caboRessecado8 = aux::GeralPorLinhaEDiag2TE($atual8, 4, $parent);
      $uti_defeitoComp8 = aux::GeralPorLinhaEDiag2TE($atual8, 5, $parent);
      $uti_conexaoTerm8 = aux::GeralPorLinhaEDiag2TE($atual8, 37, $parent);

      $uti_faltaAperto9 = aux::GeralPorLinhaEDiag2TE($atual9, 1, $parent);
      $uti_desbalDeFase9 = aux::GeralPorLinhaEDiag2TE($atual9, 2, $parent);
      $uti_compMalDim9 = aux::GeralPorLinhaEDiag2TE($atual9, 3, $parent);
      $uti_caboRessecado9 = aux::GeralPorLinhaEDiag2TE($atual9, 4, $parent);
      $uti_defeitoComp9 = aux::GeralPorLinhaEDiag2TE($atual9, 5, $parent);
      $uti_conexaoTerm9 = aux::GeralPorLinhaEDiag2TE($atual9, 37, $parent);

      $uti_faltaAperto10 = aux::GeralPorLinhaEDiag2TE($atual10, 1, $parent);
      $uti_desbalDeFase10 = aux::GeralPorLinhaEDiag2TE($atual10, 2, $parent);
      $uti_compMalDim10 = aux::GeralPorLinhaEDiag2TE($atual10, 3, $parent);
      $uti_caboRessecado10 = aux::GeralPorLinhaEDiag2TE($atual10, 4, $parent);
      $uti_defeitoComp10 = aux::GeralPorLinhaEDiag2TE($atual10, 5, $parent);
      $uti_conexaoTerm10 = aux::GeralPorLinhaEDiag2TE($atual10, 37, $parent);

      $uti_faltaAperto11 = aux::GeralPorLinhaEDiag2TE($atual11, 1, $parent);
      $uti_desbalDeFase11 = aux::GeralPorLinhaEDiag2TE($atual11, 2, $parent);
      $uti_compMalDim11 = aux::GeralPorLinhaEDiag2TE($atual11, 3, $parent);
      $uti_caboRessecado11 = aux::GeralPorLinhaEDiag2TE($atual11, 4, $parent);
      $uti_defeitoComp11 = aux::GeralPorLinhaEDiag2TE($atual11, 5, $parent);
      $uti_conexaoTerm11 = aux::GeralPorLinhaEDiag2TE($atual11, 37, $parent);

      $uti_faltaAperto12 = aux::GeralPorLinhaEDiag2TE($atual12, 1, $parent);
      $uti_desbalDeFase12 = aux::GeralPorLinhaEDiag2TE($atual12, 2, $parent);
      $uti_compMalDim12 = aux::GeralPorLinhaEDiag2TE($atual12, 3, $parent);
      $uti_caboRessecado12 = aux::GeralPorLinhaEDiag2TE($atual12, 4, $parent);
      $uti_defeitoComp12 = aux::GeralPorLinhaEDiag2TE($atual12, 5, $parent);
      $uti_conexaoTerm12 = aux::GeralPorLinhaEDiag2TE($atual12, 37, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.uti-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('uti_faltaAperto1', $uti_faltaAperto1)->with('uti_desbalDeFase1', $uti_desbalDeFase1)->with('uti_compMalDim1', $uti_compMalDim1)->with('uti_caboRessecado1', $uti_caboRessecado1)->with('uti_defeitoComp1', $uti_defeitoComp1)->with('uti_conexaoTerm1', $uti_conexaoTerm1)
       ->with('atualf2', $atualf2)->with('uti_faltaAperto2', $uti_faltaAperto2)->with('uti_desbalDeFase2', $uti_desbalDeFase2)->with('uti_compMalDim2', $uti_compMalDim2)->with('uti_caboRessecado2', $uti_caboRessecado2)->with('uti_defeitoComp2', $uti_defeitoComp2)->with('uti_conexaoTerm2', $uti_conexaoTerm2)
       ->with('atualf3', $atualf3)->with('uti_faltaAperto3', $uti_faltaAperto3)->with('uti_desbalDeFase3', $uti_desbalDeFase3)->with('uti_compMalDim3', $uti_compMalDim3)->with('uti_caboRessecado3', $uti_caboRessecado3)->with('uti_defeitoComp3', $uti_defeitoComp3)->with('uti_conexaoTerm3', $uti_conexaoTerm3)
       ->with('atualf4', $atualf4)->with('uti_faltaAperto4', $uti_faltaAperto4)->with('uti_desbalDeFase4', $uti_desbalDeFase4)->with('uti_compMalDim4', $uti_compMalDim4)->with('uti_caboRessecado4', $uti_caboRessecado4)->with('uti_defeitoComp4', $uti_defeitoComp4)->with('uti_conexaoTerm4', $uti_conexaoTerm4)
       ->with('atualf5', $atualf5)->with('uti_faltaAperto5', $uti_faltaAperto5)->with('uti_desbalDeFase5', $uti_desbalDeFase5)->with('uti_compMalDim5', $uti_compMalDim5)->with('uti_caboRessecado5', $uti_caboRessecado5)->with('uti_defeitoComp5', $uti_defeitoComp5)->with('uti_conexaoTerm5', $uti_conexaoTerm5)
       ->with('atualf6', $atualf6)->with('uti_faltaAperto6', $uti_faltaAperto6)->with('uti_desbalDeFase6', $uti_desbalDeFase6)->with('uti_compMalDim6', $uti_compMalDim6)->with('uti_caboRessecado6', $uti_caboRessecado6)->with('uti_defeitoComp6', $uti_defeitoComp6)->with('uti_conexaoTerm6', $uti_conexaoTerm6)
       ->with('atualf7', $atualf7)->with('uti_faltaAperto7', $uti_faltaAperto7)->with('uti_desbalDeFase7', $uti_desbalDeFase7)->with('uti_compMalDim7', $uti_compMalDim7)->with('uti_caboRessecado7', $uti_caboRessecado7)->with('uti_defeitoComp7', $uti_defeitoComp7)->with('uti_conexaoTerm7', $uti_conexaoTerm7)
       ->with('atualf8', $atualf8)->with('uti_faltaAperto8', $uti_faltaAperto8)->with('uti_desbalDeFase8', $uti_desbalDeFase8)->with('uti_compMalDim8', $uti_compMalDim8)->with('uti_caboRessecado8', $uti_caboRessecado8)->with('uti_defeitoComp8', $uti_defeitoComp8)->with('uti_conexaoTerm8', $uti_conexaoTerm8)
       ->with('atualf9', $atualf9)->with('uti_faltaAperto9', $uti_faltaAperto9)->with('uti_desbalDeFase9', $uti_desbalDeFase9)->with('uti_compMalDim9', $uti_compMalDim9)->with('uti_caboRessecado9', $uti_caboRessecado9)->with('uti_defeitoComp9', $uti_defeitoComp9)->with('uti_conexaoTerm9', $uti_conexaoTerm9)
       ->with('atualf10', $atualf10)->with('uti_faltaAperto10', $uti_faltaAperto10)->with('uti_desbalDeFase10', $uti_desbalDeFase10)->with('uti_compMalDim10', $uti_compMalDim10)->with('uti_caboRessecado10', $uti_caboRessecado10)->with('uti_defeitoComp10', $uti_defeitoComp10)->with('uti_conexaoTerm10', $uti_conexaoTerm10)
       ->with('atualf11', $atualf11)->with('uti_faltaAperto11', $uti_faltaAperto11)->with('uti_desbalDeFase11', $uti_desbalDeFase11)->with('uti_compMalDim11', $uti_compMalDim11)->with('uti_caboRessecado11', $uti_caboRessecado11)->with('uti_defeitoComp11', $uti_defeitoComp11)->with('uti_conexaoTerm11', $uti_conexaoTerm11)
       ->with('atualf12', $atualf12)->with('uti_faltaAperto12', $uti_faltaAperto12)->with('uti_desbalDeFase12', $uti_desbalDeFase12)->with('uti_compMalDim12', $uti_compMalDim12)->with('uti_caboRessecado12', $uti_caboRessecado12)->with('uti_defeitoComp12', $uti_defeitoComp12)->with('uti_conexaoTerm12', $uti_conexaoTerm12);
   }

   public function LgcPerfil() {

     $title = 'Perfil | LGC';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 13;
     $linha2 = 0;

     $lgc_manutencao = aux::GeralPorLinhaTE($atual1, 1, $linha1, $linha2);
     $lgc_standBy = aux::GeralPorLinhaTE($atual1, 2, $linha1, $linha2);
     $lgc_normal = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
     $lgc_alarme = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $lgc_critico = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

     if($lgc_manutencao == null){$lgc_manutencao = 0;}
     if($lgc_standBy == null){$lgc_standBy = 0;}
     if($lgc_normal == null){$lgc_normal = 0;}
     if($lgc_alarme == null){$lgc_alarme = 0;}
     if($lgc_critico == null){$lgc_critico = 0;}

    $sum1 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',13)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum = $sum1+$sum2;

    $manutencaoP_format = ($lgc_manutencao / $sum)*100;
    $lgc_manutencaoP = number_format($manutencaoP_format,2,".",",");
    $standByP_format = ($lgc_standBy / $sum)*100;
    $lgc_standByP = number_format($standByP_format,2,".",",");
    $normalP_format = ($lgc_normal / $sum)*100;
    $lgc_normalP = number_format($normalP_format,2,".",",");
    $alarmeP_format = ($lgc_alarme / $sum)*100;
    $lgc_alarmeP = number_format($alarmeP_format,2,".",",");
    $criticoP_format = ($lgc_critico / $sum)*100;
    $lgc_criticoP = number_format($criticoP_format,2,".",",");

    return view('csn.relatorioGerencial.includes.indexRelGerTE_LGC_perfil')->with('title', $title)->with('sum', $sum)
        ->with('lgc_manutencao', $lgc_manutencao)->with('lgc_standBy', $lgc_standBy)->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
        ->with('lgc_manutencaoP', $lgc_manutencaoP)->with('lgc_standByP', $lgc_standByP)->with('lgc_normalP', $lgc_normalP)->with('lgc_alarmeP', $lgc_alarmeP)->with('lgc_criticoP', $lgc_criticoP);
   }

   public function LgcStatusDosPontos() {

     $title = 'Status Pontos | LGC';
     $linha1 = 13;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',13)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $lgc_normal1 = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
     $lgc_alarme1 = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $lgc_critico1 = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

     $lgc_normal2 = aux::GeralPorLinhaTE($atual2, 3, $linha1, $linha2);
     $lgc_alarme2 = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $lgc_critico2 = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);

     $lgc_normal3 = aux::GeralPorLinhaTE($atual3, 3, $linha1, $linha2);
     $lgc_alarme3 = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $lgc_critico3 = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);

     $lgc_normal4 = aux::GeralPorLinhaTE($atual4, 3, $linha1, $linha2);
     $lgc_alarme4 = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $lgc_critico4 = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);

     $lgc_normal5 = aux::GeralPorLinhaTE($atual5, 3, $linha1, $linha2);
     $lgc_alarme5 = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $lgc_critico5 = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);

     $lgc_normal6 = aux::GeralPorLinhaTE($atual6, 3, $linha1, $linha2);
     $lgc_alarme6 = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $lgc_critico6 = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);

     $lgc_normal7 = aux::GeralPorLinhaTE($atual7, 3, $linha1, $linha2);
     $lgc_alarme7 = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $lgc_critico7 = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);

     $lgc_normal8 = aux::GeralPorLinhaTE($atual8, 3, $linha1, $linha2);
     $lgc_alarme8 = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $lgc_critico8 = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);

     $lgc_normal9 = aux::GeralPorLinhaTE($atual9, 3, $linha1, $linha2);
     $lgc_alarme9 = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $lgc_critico9 = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);

     $lgc_normal10 = aux::GeralPorLinhaTE($atual10, 3, $linha1, $linha2);
     $lgc_alarme10 = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $lgc_critico10 = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);

     $lgc_normal11 = aux::GeralPorLinhaTE($atual11, 3, $linha1, $linha2);
     $lgc_alarme11 = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $lgc_critico11 = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);

     $lgc_normal12 = aux::GeralPorLinhaTE($atual12, 3, $linha1, $linha2);
     $lgc_alarme12 = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $lgc_critico12 = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

      return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lgc-status-dos-pontos')->with('title', $title)->with('sum', $sum)
                ->with('atual1', $atual1)->with('lgc_normal1', $lgc_normal1)->with('lgc_alarme1', $lgc_alarme1)->with('lgc_critico1', $lgc_critico1)
                ->with('atual2', $atual2)->with('lgc_normal2', $lgc_normal2)->with('lgc_alarme2', $lgc_alarme2)->with('lgc_critico2', $lgc_critico2)
                ->with('atual3', $atual3)->with('lgc_normal3', $lgc_normal3)->with('lgc_alarme3', $lgc_alarme3)->with('lgc_critico3', $lgc_critico3)
                ->with('atual4', $atual4)->with('lgc_normal4', $lgc_normal4)->with('lgc_alarme4', $lgc_alarme4)->with('lgc_critico4', $lgc_critico4)
                ->with('atual5', $atual5)->with('lgc_normal5', $lgc_normal5)->with('lgc_alarme5', $lgc_alarme5)->with('lgc_critico5', $lgc_critico5)
                ->with('atual6', $atual6)->with('lgc_normal6', $lgc_normal6)->with('lgc_alarme6', $lgc_alarme6)->with('lgc_critico6', $lgc_critico6)
                ->with('atual7', $atual7)->with('lgc_normal7', $lgc_normal7)->with('lgc_alarme7', $lgc_alarme7)->with('lgc_critico7', $lgc_critico7)
                ->with('atual8', $atual8)->with('lgc_normal8', $lgc_normal8)->with('lgc_alarme8', $lgc_alarme8)->with('lgc_critico8', $lgc_critico8)
                ->with('atual9', $atual9)->with('lgc_normal9', $lgc_normal9)->with('lgc_alarme9', $lgc_alarme9)->with('lgc_critico9', $lgc_critico9)
                ->with('atual10', $atual10)->with('lgc_normal10', $lgc_normal10)->with('lgc_alarme10', $lgc_alarme10)->with('lgc_critico10', $lgc_critico10)
                ->with('atual11', $atual11)->with('lgc_normal11', $lgc_normal11)->with('lgc_alarme11', $lgc_alarme11)->with('lgc_critico11', $lgc_critico11)
                ->with('atual12', $atual12)->with('lgc_normal12', $lgc_normal12)->with('lgc_alarme12', $lgc_alarme12)->with('lgc_critico12', $lgc_critico12);
   }

   public function LgcAnormalidades() {

     $title = 'Anormalidades | LGC';
     $linha1 = 13;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',13)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $alarme1P = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     $lgc_alarme1 = aux::FormatPercents($alarme1P, $sum);
     $lgc_alarme2 = aux::FormatPercents($alarme2P, $sum);
     $lgc_alarme3 = aux::FormatPercents($alarme3P, $sum);
     $lgc_alarme4 = aux::FormatPercents($alarme4P, $sum);
     $lgc_alarme5 = aux::FormatPercents($alarme5P, $sum);
     $lgc_alarme6 = aux::FormatPercents($alarme6P, $sum);
     $lgc_alarme7 = aux::FormatPercents($alarme7P, $sum);
     $lgc_alarme8 = aux::FormatPercents($alarme8P, $sum);
     $lgc_alarme9 = aux::FormatPercents($alarme9P, $sum);
     $lgc_alarme10 = aux::FormatPercents($alarme10P, $sum);
     $lgc_alarme11 = aux::FormatPercents($alarme11P, $sum);
     $lgc_alarme12 = aux::FormatPercents($alarme12P, $sum);

     $lgc_critico1 = aux::FormatPercents($critico1P, $sum);
     $lgc_critico2 = aux::FormatPercents($critico2P, $sum);
     $lgc_critico3 = aux::FormatPercents($critico3P, $sum);
     $lgc_critico4 = aux::FormatPercents($critico4P, $sum);
     $lgc_critico5 = aux::FormatPercents($critico5P, $sum);
     $lgc_critico6 = aux::FormatPercents($critico6P, $sum);
     $lgc_critico7 = aux::FormatPercents($critico7P, $sum);
     $lgc_critico8 = aux::FormatPercents($critico8P, $sum);
     $lgc_critico9 = aux::FormatPercents($critico9P, $sum);
     $lgc_critico10 = aux::FormatPercents($critico10P, $sum);
     $lgc_critico11 = aux::FormatPercents($critico11P, $sum);
     $lgc_critico12 = aux::FormatPercents($critico12P, $sum);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lgc-anormalidades')->with('title', $title)->with('sum', $sum)
             ->with('atualf1', $atualf1)->with('lgc_alarme1', $lgc_alarme1)->with('lgc_critico1', $lgc_critico1)
             ->with('atualf2', $atualf2)->with('lgc_alarme2', $lgc_alarme2)->with('lgc_critico2', $lgc_critico2)
             ->with('atualf3', $atualf3)->with('lgc_alarme3', $lgc_alarme3)->with('lgc_critico3', $lgc_critico3)
             ->with('atualf4', $atualf4)->with('lgc_alarme4', $lgc_alarme4)->with('lgc_critico4', $lgc_critico4)
             ->with('atualf5', $atualf5)->with('lgc_alarme5', $lgc_alarme5)->with('lgc_critico5', $lgc_critico5)
             ->with('atualf6', $atualf6)->with('lgc_alarme6', $lgc_alarme6)->with('lgc_critico6', $lgc_critico6)
             ->with('atualf7', $atualf7)->with('lgc_alarme7', $lgc_alarme7)->with('lgc_critico7', $lgc_critico7)
             ->with('atualf8', $atualf8)->with('lgc_alarme8', $lgc_alarme8)->with('lgc_critico8', $lgc_critico8)
             ->with('atualf9', $atualf9)->with('lgc_alarme9', $lgc_alarme9)->with('lgc_critico9', $lgc_critico9)
             ->with('atualf10', $atualf10)->with('lgc_alarme10', $lgc_alarme10)->with('lgc_critico10', $lgc_critico10)
             ->with('atualf11', $atualf11)->with('lgc_alarme11', $lgc_alarme11)->with('lgc_critico11', $lgc_critico11)
             ->with('atualf12', $atualf12)->with('lgc_alarme12', $lgc_alarme12)->with('lgc_critico12', $lgc_critico12);
   }

   public function LgcProblemasEncontrados() {

     $title = 'Problemas Encontrados | LGC';
     $linha1 = 13;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 13)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $lgc_faltaAperto1 = aux::GeralPorLinhaEDiagTE($atual1, 1, $linha1, $linha2);
     $lgc_desbalDeFase1 = aux::GeralPorLinhaEDiagTE($atual1, 2, $linha1, $linha2);
     $lgc_compMalDim1 = aux::GeralPorLinhaEDiagTE($atual1, 3, $linha1, $linha2);
     $lgc_caboRessecado1 = aux::GeralPorLinhaEDiagTE($atual1, 4, $linha1, $linha2);
     $lgc_defeitoComp1 = aux::GeralPorLinhaEDiagTE($atual1, 5, $linha1, $linha2);
     $lgc_conexaoTerm1 = aux::GeralPorLinhaEDiagTE($atual1, 37, $linha1, $linha2);

     $lgc_faltaAperto2 = aux::GeralPorLinhaEDiagTE($atual2, 1, $linha1, $linha2);
     $lgc_desbalDeFase2 = aux::GeralPorLinhaEDiagTE($atual2, 2, $linha1, $linha2);
     $lgc_compMalDim2 = aux::GeralPorLinhaEDiagTE($atual2, 3, $linha1, $linha2);
     $lgc_caboRessecado2 = aux::GeralPorLinhaEDiagTE($atual2, 4, $linha1, $linha2);
     $lgc_defeitoComp2 = aux::GeralPorLinhaEDiagTE($atual2, 5, $linha1, $linha2);
     $lgc_conexaoTerm2 = aux::GeralPorLinhaEDiagTE($atual2, 37, $linha1, $linha2);

     $lgc_faltaAperto3 = aux::GeralPorLinhaEDiagTE($atual3, 1, $linha1, $linha2);
     $lgc_desbalDeFase3 = aux::GeralPorLinhaEDiagTE($atual3, 2, $linha1, $linha2);
     $lgc_compMalDim3 = aux::GeralPorLinhaEDiagTE($atual3, 3, $linha1, $linha2);
     $lgc_caboRessecado3 = aux::GeralPorLinhaEDiagTE($atual3, 4, $linha1, $linha2);
     $lgc_defeitoComp3 = aux::GeralPorLinhaEDiagTE($atual3, 5, $linha1, $linha2);
     $lgc_conexaoTerm3 = aux::GeralPorLinhaEDiagTE($atual3, 37, $linha1, $linha2);

     $lgc_faltaAperto4 = aux::GeralPorLinhaEDiagTE($atual4, 1, $linha1, $linha2);
     $lgc_desbalDeFase4 = aux::GeralPorLinhaEDiagTE($atual4, 2, $linha1, $linha2);
     $lgc_compMalDim4 = aux::GeralPorLinhaEDiagTE($atual4, 3, $linha1, $linha2);
     $lgc_caboRessecado4 = aux::GeralPorLinhaEDiagTE($atual4, 4, $linha1, $linha2);
     $lgc_defeitoComp4 = aux::GeralPorLinhaEDiagTE($atual4, 5, $linha1, $linha2);
     $lgc_conexaoTerm4 = aux::GeralPorLinhaEDiagTE($atual4, 37, $linha1, $linha2);

     $lgc_faltaAperto5 = aux::GeralPorLinhaEDiagTE($atual5, 1, $linha1, $linha2);
     $lgc_desbalDeFase5 = aux::GeralPorLinhaEDiagTE($atual5, 2, $linha1, $linha2);
     $lgc_compMalDim5 = aux::GeralPorLinhaEDiagTE($atual5, 3, $linha1, $linha2);
     $lgc_caboRessecado5 = aux::GeralPorLinhaEDiagTE($atual5, 4, $linha1, $linha2);
     $lgc_defeitoComp5 = aux::GeralPorLinhaEDiagTE($atual5, 5, $linha1, $linha2);
     $lgc_conexaoTerm5 = aux::GeralPorLinhaEDiagTE($atual5, 37, $linha1, $linha2);

     $lgc_faltaAperto6 = aux::GeralPorLinhaEDiagTE($atual6, 1, $linha1, $linha2);
     $lgc_desbalDeFase6 = aux::GeralPorLinhaEDiagTE($atual6, 2, $linha1, $linha2);
     $lgc_compMalDim6 = aux::GeralPorLinhaEDiagTE($atual6, 3, $linha1, $linha2);
     $lgc_caboRessecado6 = aux::GeralPorLinhaEDiagTE($atual6, 4, $linha1, $linha2);
     $lgc_defeitoComp6 = aux::GeralPorLinhaEDiagTE($atual6, 5, $linha1, $linha2);
     $lgc_conexaoTerm6 = aux::GeralPorLinhaEDiagTE($atual6, 37, $linha1, $linha2);

     $lgc_faltaAperto7 = aux::GeralPorLinhaEDiagTE($atual7, 1, $linha1, $linha2);
     $lgc_desbalDeFase7 = aux::GeralPorLinhaEDiagTE($atual7, 2, $linha1, $linha2);
     $lgc_compMalDim7 = aux::GeralPorLinhaEDiagTE($atual7, 3, $linha1, $linha2);
     $lgc_caboRessecado7 = aux::GeralPorLinhaEDiagTE($atual7, 4, $linha1, $linha2);
     $lgc_defeitoComp7 = aux::GeralPorLinhaEDiagTE($atual7, 5, $linha1, $linha2);
     $lgc_conexaoTerm7 = aux::GeralPorLinhaEDiagTE($atual7, 37, $linha1, $linha2);

     $lgc_faltaAperto8 = aux::GeralPorLinhaEDiagTE($atual8, 1, $linha1, $linha2);
     $lgc_desbalDeFase8 = aux::GeralPorLinhaEDiagTE($atual8, 2, $linha1, $linha2);
     $lgc_compMalDim8 = aux::GeralPorLinhaEDiagTE($atual8, 3, $linha1, $linha2);
     $lgc_caboRessecado8 = aux::GeralPorLinhaEDiagTE($atual8, 4, $linha1, $linha2);
     $lgc_defeitoComp8 = aux::GeralPorLinhaEDiagTE($atual8, 5, $linha1, $linha2);
     $lgc_conexaoTerm8 = aux::GeralPorLinhaEDiagTE($atual8, 37, $linha1, $linha2);

     $lgc_faltaAperto9 = aux::GeralPorLinhaEDiagTE($atual9, 1, $linha1, $linha2);
     $lgc_desbalDeFase9 = aux::GeralPorLinhaEDiagTE($atual9, 2, $linha1, $linha2);
     $lgc_compMalDim9 = aux::GeralPorLinhaEDiagTE($atual9, 3, $linha1, $linha2);
     $lgc_caboRessecado9 = aux::GeralPorLinhaEDiagTE($atual9, 4, $linha1, $linha2);
     $lgc_defeitoComp9 = aux::GeralPorLinhaEDiagTE($atual9, 5, $linha1, $linha2);
     $lgc_conexaoTerm9 = aux::GeralPorLinhaEDiagTE($atual9, 37, $linha1, $linha2);

     $lgc_faltaAperto10 = aux::GeralPorLinhaEDiagTE($atual10, 1, $linha1, $linha2);
     $lgc_desbalDeFase10 = aux::GeralPorLinhaEDiagTE($atual10, 2, $linha1, $linha2);
     $lgc_compMalDim10 = aux::GeralPorLinhaEDiagTE($atual10, 3, $linha1, $linha2);
     $lgc_caboRessecado10 = aux::GeralPorLinhaEDiagTE($atual10, 4, $linha1, $linha2);
     $lgc_defeitoComp10 = aux::GeralPorLinhaEDiagTE($atual10, 5, $linha1, $linha2);
     $lgc_conexaoTerm10 = aux::GeralPorLinhaEDiagTE($atual10, 37, $linha1, $linha2);

     $lgc_faltaAperto11 = aux::GeralPorLinhaEDiagTE($atual11, 1, $linha1, $linha2);
     $lgc_desbalDeFase11 = aux::GeralPorLinhaEDiagTE($atual11, 2, $linha1, $linha2);
     $lgc_compMalDim11 = aux::GeralPorLinhaEDiagTE($atual11, 3, $linha1, $linha2);
     $lgc_caboRessecado11 = aux::GeralPorLinhaEDiagTE($atual11, 4, $linha1, $linha2);
     $lgc_defeitoComp11 = aux::GeralPorLinhaEDiagTE($atual11, 5, $linha1, $linha2);
     $lgc_conexaoTerm11 = aux::GeralPorLinhaEDiagTE($atual11, 37, $linha1, $linha2);

     $lgc_faltaAperto12 = aux::GeralPorLinhaEDiagTE($atual12, 1, $linha1, $linha2);
     $lgc_desbalDeFase12 = aux::GeralPorLinhaEDiagTE($atual12, 2, $linha1, $linha2);
     $lgc_compMalDim12 = aux::GeralPorLinhaEDiagTE($atual12, 3, $linha1, $linha2);
     $lgc_caboRessecado12 = aux::GeralPorLinhaEDiagTE($atual12, 4, $linha1, $linha2);
     $lgc_defeitoComp12 = aux::GeralPorLinhaEDiagTE($atual12, 5, $linha1, $linha2);
     $lgc_conexaoTerm12 = aux::GeralPorLinhaEDiagTE($atual12, 37, $linha1, $linha2);



     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lgc-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lgc_faltaAperto1', $lgc_faltaAperto1)->with('lgc_desbalDeFase1', $lgc_desbalDeFase1)->with('lgc_compMalDim1', $lgc_compMalDim1)->with('lgc_caboRessecado1', $lgc_caboRessecado1)->with('lgc_defeitoComp1', $lgc_defeitoComp1)->with('lgc_conexaoTerm1', $lgc_conexaoTerm1)
       ->with('atualf2', $atualf2)->with('lgc_faltaAperto2', $lgc_faltaAperto2)->with('lgc_desbalDeFase2', $lgc_desbalDeFase2)->with('lgc_compMalDim2', $lgc_compMalDim2)->with('lgc_caboRessecado2', $lgc_caboRessecado2)->with('lgc_defeitoComp2', $lgc_defeitoComp2)->with('lgc_conexaoTerm2', $lgc_conexaoTerm2)
       ->with('atualf3', $atualf3)->with('lgc_faltaAperto3', $lgc_faltaAperto3)->with('lgc_desbalDeFase3', $lgc_desbalDeFase3)->with('lgc_compMalDim3', $lgc_compMalDim3)->with('lgc_caboRessecado3', $lgc_caboRessecado3)->with('lgc_defeitoComp3', $lgc_defeitoComp3)->with('lgc_conexaoTerm3', $lgc_conexaoTerm3)
       ->with('atualf4', $atualf4)->with('lgc_faltaAperto4', $lgc_faltaAperto4)->with('lgc_desbalDeFase4', $lgc_desbalDeFase4)->with('lgc_compMalDim4', $lgc_compMalDim4)->with('lgc_caboRessecado4', $lgc_caboRessecado4)->with('lgc_defeitoComp4', $lgc_defeitoComp4)->with('lgc_conexaoTerm4', $lgc_conexaoTerm4)
       ->with('atualf5', $atualf5)->with('lgc_faltaAperto5', $lgc_faltaAperto5)->with('lgc_desbalDeFase5', $lgc_desbalDeFase5)->with('lgc_compMalDim5', $lgc_compMalDim5)->with('lgc_caboRessecado5', $lgc_caboRessecado5)->with('lgc_defeitoComp5', $lgc_defeitoComp5)->with('lgc_conexaoTerm5', $lgc_conexaoTerm5)
       ->with('atualf6', $atualf6)->with('lgc_faltaAperto6', $lgc_faltaAperto6)->with('lgc_desbalDeFase6', $lgc_desbalDeFase6)->with('lgc_compMalDim6', $lgc_compMalDim6)->with('lgc_caboRessecado6', $lgc_caboRessecado6)->with('lgc_defeitoComp6', $lgc_defeitoComp6)->with('lgc_conexaoTerm6', $lgc_conexaoTerm6)
       ->with('atualf7', $atualf7)->with('lgc_faltaAperto7', $lgc_faltaAperto7)->with('lgc_desbalDeFase7', $lgc_desbalDeFase7)->with('lgc_compMalDim7', $lgc_compMalDim7)->with('lgc_caboRessecado7', $lgc_caboRessecado7)->with('lgc_defeitoComp7', $lgc_defeitoComp7)->with('lgc_conexaoTerm7', $lgc_conexaoTerm7)
       ->with('atualf8', $atualf8)->with('lgc_faltaAperto8', $lgc_faltaAperto8)->with('lgc_desbalDeFase8', $lgc_desbalDeFase8)->with('lgc_compMalDim8', $lgc_compMalDim8)->with('lgc_caboRessecado8', $lgc_caboRessecado8)->with('lgc_defeitoComp8', $lgc_defeitoComp8)->with('lgc_conexaoTerm8', $lgc_conexaoTerm8)
       ->with('atualf9', $atualf9)->with('lgc_faltaAperto9', $lgc_faltaAperto9)->with('lgc_desbalDeFase9', $lgc_desbalDeFase9)->with('lgc_compMalDim9', $lgc_compMalDim9)->with('lgc_caboRessecado9', $lgc_caboRessecado9)->with('lgc_defeitoComp9', $lgc_defeitoComp9)->with('lgc_conexaoTerm9', $lgc_conexaoTerm9)
       ->with('atualf10', $atualf10)->with('lgc_faltaAperto10', $lgc_faltaAperto10)->with('lgc_desbalDeFase10', $lgc_desbalDeFase10)->with('lgc_compMalDim10', $lgc_compMalDim10)->with('lgc_caboRessecado10', $lgc_caboRessecado10)->with('lgc_defeitoComp10', $lgc_defeitoComp10)->with('lgc_conexaoTerm10', $lgc_conexaoTerm10)
       ->with('atualf11', $atualf11)->with('lgc_faltaAperto11', $lgc_faltaAperto11)->with('lgc_desbalDeFase11', $lgc_desbalDeFase11)->with('lgc_compMalDim11', $lgc_compMalDim11)->with('lgc_caboRessecado11', $lgc_caboRessecado11)->with('lgc_defeitoComp11', $lgc_defeitoComp11)->with('lgc_conexaoTerm11', $lgc_conexaoTerm11)
       ->with('atualf12', $atualf12)->with('lgc_faltaAperto12', $lgc_faltaAperto12)->with('lgc_desbalDeFase12', $lgc_desbalDeFase12)->with('lgc_compMalDim12', $lgc_compMalDim12)->with('lgc_caboRessecado12', $lgc_caboRessecado12)->with('lgc_defeitoComp12', $lgc_defeitoComp12)->with('lgc_conexaoTerm12', $lgc_conexaoTerm12);
   }

   public function LpcPerfil() {

     $title = 'Perfil | LPC';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 14;
     $linha2 = 0;

     $lpc_manutencao = aux::GeralPorLinhaTE($atual1, 1, $linha1, $linha2);
     $lpc_standBy = aux::GeralPorLinhaTE($atual1, 2, $linha1, $linha2);
     $lpc_normal = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
     $lpc_alarme = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $lpc_critico = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

     if($lpc_manutencao == null){$lpc_manutencao = 0;}
     if($lpc_standBy == null){$lpc_standBy = 0;}
     if($lpc_normal == null){$lpc_normal = 0;}
     if($lpc_alarme == null){$lpc_alarme = 0;}
     if($lpc_critico == null){$lpc_critico = 0;}

    $sum1 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',14)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $sum = $sum1+$sum2;

    $manutencaoP_format = ($lpc_manutencao / $sum)*100;
    $lpc_manutencaoP = number_format($manutencaoP_format,2,".",",");
    $standByP_format = ($lpc_standBy / $sum)*100;
    $lpc_standByP = number_format($standByP_format,2,".",",");
    $normalP_format = ($lpc_normal / $sum)*100;
    $lpc_normalP = number_format($normalP_format,2,".",",");
    $alarmeP_format = ($lpc_alarme / $sum)*100;
    $lpc_alarmeP = number_format($alarmeP_format,2,".",",");
    $criticoP_format = ($lpc_critico / $sum)*100;
    $lpc_criticoP = number_format($criticoP_format,2,".",",");

    return view('csn.relatorioGerencial.includes.indexRelGerTE_lpc_perfil')->with('title', $title)->with('sum', $sum)
        ->with('lpc_manutencao', $lpc_manutencao)->with('lpc_standBy', $lpc_standBy)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico)
        ->with('lpc_manutencaoP', $lpc_manutencaoP)->with('lpc_standByP', $lpc_standByP)->with('lpc_normalP', $lpc_normalP)->with('lpc_alarmeP', $lpc_alarmeP)->with('lpc_criticoP', $lpc_criticoP);
   }

   public function LpcStatusDosPontos() {

     $title = 'Status Pontos | LPC';
     $linha1 = 14;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',14)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $lpc_normal1 = aux::GeralPorLinhaTE($atual1, 3, $linha1, $linha2);
     $lpc_alarme1 = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $lpc_critico1 = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);

     $lpc_normal2 = aux::GeralPorLinhaTE($atual2, 3, $linha1, $linha2);
     $lpc_alarme2 = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $lpc_critico2 = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);

     $lpc_normal3 = aux::GeralPorLinhaTE($atual3, 3, $linha1, $linha2);
     $lpc_alarme3 = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $lpc_critico3 = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);

     $lpc_normal4 = aux::GeralPorLinhaTE($atual4, 3, $linha1, $linha2);
     $lpc_alarme4 = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $lpc_critico4 = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);

     $lpc_normal5 = aux::GeralPorLinhaTE($atual5, 3, $linha1, $linha2);
     $lpc_alarme5 = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $lpc_critico5 = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);

     $lpc_normal6 = aux::GeralPorLinhaTE($atual6, 3, $linha1, $linha2);
     $lpc_alarme6 = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $lpc_critico6 = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);

     $lpc_normal7 = aux::GeralPorLinhaTE($atual7, 3, $linha1, $linha2);
     $lpc_alarme7 = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $lpc_critico7 = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);

     $lpc_normal8 = aux::GeralPorLinhaTE($atual8, 3, $linha1, $linha2);
     $lpc_alarme8 = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $lpc_critico8 = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);

     $lpc_normal9 = aux::GeralPorLinhaTE($atual9, 3, $linha1, $linha2);
     $lpc_alarme9 = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $lpc_critico9 = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);

     $lpc_normal10 = aux::GeralPorLinhaTE($atual10, 3, $linha1, $linha2);
     $lpc_alarme10 = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $lpc_critico10 = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);

     $lpc_normal11 = aux::GeralPorLinhaTE($atual11, 3, $linha1, $linha2);
     $lpc_alarme11 = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $lpc_critico11 = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);

     $lpc_normal12 = aux::GeralPorLinhaTE($atual12, 3, $linha1, $linha2);
     $lpc_alarme12 = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $lpc_critico12 = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lpc-status-dos-pontos')->with('title', $title)->with('sum', $sum)
             ->with('atual1', $atual1)->with('lpc_normal1', $lpc_normal1)->with('lpc_alarme1', $lpc_alarme1)->with('lpc_critico1', $lpc_critico1)
             ->with('atual2', $atual2)->with('lpc_normal2', $lpc_normal2)->with('lpc_alarme2', $lpc_alarme2)->with('lpc_critico2', $lpc_critico2)
             ->with('atual3', $atual3)->with('lpc_normal3', $lpc_normal3)->with('lpc_alarme3', $lpc_alarme3)->with('lpc_critico3', $lpc_critico3)
             ->with('atual4', $atual4)->with('lpc_normal4', $lpc_normal4)->with('lpc_alarme4', $lpc_alarme4)->with('lpc_critico4', $lpc_critico4)
             ->with('atual5', $atual5)->with('lpc_normal5', $lpc_normal5)->with('lpc_alarme5', $lpc_alarme5)->with('lpc_critico5', $lpc_critico5)
             ->with('atual6', $atual6)->with('lpc_normal6', $lpc_normal6)->with('lpc_alarme6', $lpc_alarme6)->with('lpc_critico6', $lpc_critico6)
             ->with('atual7', $atual7)->with('lpc_normal7', $lpc_normal7)->with('lpc_alarme7', $lpc_alarme7)->with('lpc_critico7', $lpc_critico7)
             ->with('atual8', $atual8)->with('lpc_normal8', $lpc_normal8)->with('lpc_alarme8', $lpc_alarme8)->with('lpc_critico8', $lpc_critico8)
             ->with('atual9', $atual9)->with('lpc_normal9', $lpc_normal9)->with('lpc_alarme9', $lpc_alarme9)->with('lpc_critico9', $lpc_critico9)
             ->with('atual10', $atual10)->with('lpc_normal10', $lpc_normal10)->with('lpc_alarme10', $lpc_alarme10)->with('lpc_critico10', $lpc_critico10)
             ->with('atual11', $atual11)->with('lpc_normal11', $lpc_normal11)->with('lpc_alarme11', $lpc_alarme11)->with('lpc_critico11', $lpc_critico11)
             ->with('atual12', $atual12)->with('lpc_normal12', $lpc_normal12)->with('lpc_alarme12', $lpc_alarme12)->with('lpc_critico12', $lpc_critico12);
   }

   public function LpcAnormalidades() {

     $title = 'Anormalidades | LPC';
     $linha1 = 14;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',14)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $alarme1P = aux::GeralPorLinhaTE($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaTE($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaTE($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaTE($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaTE($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaTE($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaTE($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaTE($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaTE($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaTE($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaTE($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaTE($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaTE($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaTE($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaTE($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaTE($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaTE($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaTE($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaTE($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaTE($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaTE($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaTE($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaTE($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaTE($atual12, 5, $linha1, $linha2);

     $lpc_alarme1 = aux::FormatPercents($alarme1P, $sum);
     $lpc_alarme2 = aux::FormatPercents($alarme2P, $sum);
     $lpc_alarme3 = aux::FormatPercents($alarme3P, $sum);
     $lpc_alarme4 = aux::FormatPercents($alarme4P, $sum);
     $lpc_alarme5 = aux::FormatPercents($alarme5P, $sum);
     $lpc_alarme6 = aux::FormatPercents($alarme6P, $sum);
     $lpc_alarme7 = aux::FormatPercents($alarme7P, $sum);
     $lpc_alarme8 = aux::FormatPercents($alarme8P, $sum);
     $lpc_alarme9 = aux::FormatPercents($alarme9P, $sum);
     $lpc_alarme10 = aux::FormatPercents($alarme10P, $sum);
     $lpc_alarme11 = aux::FormatPercents($alarme11P, $sum);
     $lpc_alarme12 = aux::FormatPercents($alarme12P, $sum);

     $lpc_critico1 = aux::FormatPercents($critico1P, $sum);
     $lpc_critico2 = aux::FormatPercents($critico2P, $sum);
     $lpc_critico3 = aux::FormatPercents($critico3P, $sum);
     $lpc_critico4 = aux::FormatPercents($critico4P, $sum);
     $lpc_critico5 = aux::FormatPercents($critico5P, $sum);
     $lpc_critico6 = aux::FormatPercents($critico6P, $sum);
     $lpc_critico7 = aux::FormatPercents($critico7P, $sum);
     $lpc_critico8 = aux::FormatPercents($critico8P, $sum);
     $lpc_critico9 = aux::FormatPercents($critico9P, $sum);
     $lpc_critico10 = aux::FormatPercents($critico10P, $sum);
     $lpc_critico11 = aux::FormatPercents($critico11P, $sum);
     $lpc_critico12 = aux::FormatPercents($critico12P, $sum);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lpc-anormalidades')->with('title', $title)->with('sum', $sum)
               ->with('atualf1', $atualf1)->with('lpc_alarme1', $lpc_alarme1)->with('lpc_critico1', $lpc_critico1)
               ->with('atualf2', $atualf2)->with('lpc_alarme2', $lpc_alarme2)->with('lpc_critico2', $lpc_critico2)
               ->with('atualf3', $atualf3)->with('lpc_alarme3', $lpc_alarme3)->with('lpc_critico3', $lpc_critico3)
               ->with('atualf4', $atualf4)->with('lpc_alarme4', $lpc_alarme4)->with('lpc_critico4', $lpc_critico4)
               ->with('atualf5', $atualf5)->with('lpc_alarme5', $lpc_alarme5)->with('lpc_critico5', $lpc_critico5)
               ->with('atualf6', $atualf6)->with('lpc_alarme6', $lpc_alarme6)->with('lpc_critico6', $lpc_critico6)
               ->with('atualf7', $atualf7)->with('lpc_alarme7', $lpc_alarme7)->with('lpc_critico7', $lpc_critico7)
               ->with('atualf8', $atualf8)->with('lpc_alarme8', $lpc_alarme8)->with('lpc_critico8', $lpc_critico8)
               ->with('atualf9', $atualf9)->with('lpc_alarme9', $lpc_alarme9)->with('lpc_critico9', $lpc_critico9)
               ->with('atualf10', $atualf10)->with('lpc_alarme10', $lpc_alarme10)->with('lpc_critico10', $lpc_critico10)
               ->with('atualf11', $atualf11)->with('lpc_alarme11', $lpc_alarme11)->with('lpc_critico11', $lpc_critico11)
               ->with('atualf12', $atualf12)->with('lpc_alarme12', $lpc_alarme12)->with('lpc_critico12', $lpc_critico12);
   }

   public function LpcProblemasEncontrados() {

     $title = 'Problemas Encontrados | LPC';
     $linha1 = 14;
     $linha2 = 0;

     $sum1 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 14)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $sum = $sum1+$sum2;

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $lpc_faltaAperto1 = aux::GeralPorLinhaEDiagTE($atual1, 1, $linha1, $linha2);
     $lpc_desbalDeFase1 = aux::GeralPorLinhaEDiagTE($atual1, 2, $linha1, $linha2);
     $lpc_compMalDim1 = aux::GeralPorLinhaEDiagTE($atual1, 3, $linha1, $linha2);
     $lpc_caboRessecado1 = aux::GeralPorLinhaEDiagTE($atual1, 4, $linha1, $linha2);
     $lpc_defeitoComp1 = aux::GeralPorLinhaEDiagTE($atual1, 5, $linha1, $linha2);
     $lpc_conexaoTerm1 = aux::GeralPorLinhaEDiagTE($atual1, 37, $linha1, $linha2);

     $lpc_faltaAperto2 = aux::GeralPorLinhaEDiagTE($atual2, 1, $linha1, $linha2);
     $lpc_desbalDeFase2 = aux::GeralPorLinhaEDiagTE($atual2, 2, $linha1, $linha2);
     $lpc_compMalDim2 = aux::GeralPorLinhaEDiagTE($atual2, 3, $linha1, $linha2);
     $lpc_caboRessecado2 = aux::GeralPorLinhaEDiagTE($atual2, 4, $linha1, $linha2);
     $lpc_defeitoComp2 = aux::GeralPorLinhaEDiagTE($atual2, 5, $linha1, $linha2);
     $lpc_conexaoTerm2 = aux::GeralPorLinhaEDiagTE($atual2, 37, $linha1, $linha2);

     $lpc_faltaAperto3 = aux::GeralPorLinhaEDiagTE($atual3, 1, $linha1, $linha2);
     $lpc_desbalDeFase3 = aux::GeralPorLinhaEDiagTE($atual3, 2, $linha1, $linha2);
     $lpc_compMalDim3 = aux::GeralPorLinhaEDiagTE($atual3, 3, $linha1, $linha2);
     $lpc_caboRessecado3 = aux::GeralPorLinhaEDiagTE($atual3, 4, $linha1, $linha2);
     $lpc_defeitoComp3 = aux::GeralPorLinhaEDiagTE($atual3, 5, $linha1, $linha2);
     $lpc_conexaoTerm3 = aux::GeralPorLinhaEDiagTE($atual3, 37, $linha1, $linha2);

     $lpc_faltaAperto4 = aux::GeralPorLinhaEDiagTE($atual4, 1, $linha1, $linha2);
     $lpc_desbalDeFase4 = aux::GeralPorLinhaEDiagTE($atual4, 2, $linha1, $linha2);
     $lpc_compMalDim4 = aux::GeralPorLinhaEDiagTE($atual4, 3, $linha1, $linha2);
     $lpc_caboRessecado4 = aux::GeralPorLinhaEDiagTE($atual4, 4, $linha1, $linha2);
     $lpc_defeitoComp4 = aux::GeralPorLinhaEDiagTE($atual4, 5, $linha1, $linha2);
     $lpc_conexaoTerm4 = aux::GeralPorLinhaEDiagTE($atual4, 37, $linha1, $linha2);

     $lpc_faltaAperto5 = aux::GeralPorLinhaEDiagTE($atual5, 1, $linha1, $linha2);
     $lpc_desbalDeFase5 = aux::GeralPorLinhaEDiagTE($atual5, 2, $linha1, $linha2);
     $lpc_compMalDim5 = aux::GeralPorLinhaEDiagTE($atual5, 3, $linha1, $linha2);
     $lpc_caboRessecado5 = aux::GeralPorLinhaEDiagTE($atual5, 4, $linha1, $linha2);
     $lpc_defeitoComp5 = aux::GeralPorLinhaEDiagTE($atual5, 5, $linha1, $linha2);
     $lpc_conexaoTerm5 = aux::GeralPorLinhaEDiagTE($atual5, 37, $linha1, $linha2);

     $lpc_faltaAperto6 = aux::GeralPorLinhaEDiagTE($atual6, 1, $linha1, $linha2);
     $lpc_desbalDeFase6 = aux::GeralPorLinhaEDiagTE($atual6, 2, $linha1, $linha2);
     $lpc_compMalDim6 = aux::GeralPorLinhaEDiagTE($atual6, 3, $linha1, $linha2);
     $lpc_caboRessecado6 = aux::GeralPorLinhaEDiagTE($atual6, 4, $linha1, $linha2);
     $lpc_defeitoComp6 = aux::GeralPorLinhaEDiagTE($atual6, 5, $linha1, $linha2);
     $lpc_conexaoTerm6 = aux::GeralPorLinhaEDiagTE($atual6, 37, $linha1, $linha2);

     $lpc_faltaAperto7 = aux::GeralPorLinhaEDiagTE($atual7, 1, $linha1, $linha2);
     $lpc_desbalDeFase7 = aux::GeralPorLinhaEDiagTE($atual7, 2, $linha1, $linha2);
     $lpc_compMalDim7 = aux::GeralPorLinhaEDiagTE($atual7, 3, $linha1, $linha2);
     $lpc_caboRessecado7 = aux::GeralPorLinhaEDiagTE($atual7, 4, $linha1, $linha2);
     $lpc_defeitoComp7 = aux::GeralPorLinhaEDiagTE($atual7, 5, $linha1, $linha2);
     $lpc_conexaoTerm7 = aux::GeralPorLinhaEDiagTE($atual7, 37, $linha1, $linha2);

     $lpc_faltaAperto8 = aux::GeralPorLinhaEDiagTE($atual8, 1, $linha1, $linha2);
     $lpc_desbalDeFase8 = aux::GeralPorLinhaEDiagTE($atual8, 2, $linha1, $linha2);
     $lpc_compMalDim8 = aux::GeralPorLinhaEDiagTE($atual8, 3, $linha1, $linha2);
     $lpc_caboRessecado8 = aux::GeralPorLinhaEDiagTE($atual8, 4, $linha1, $linha2);
     $lpc_defeitoComp8 = aux::GeralPorLinhaEDiagTE($atual8, 5, $linha1, $linha2);
     $lpc_conexaoTerm8 = aux::GeralPorLinhaEDiagTE($atual8, 37, $linha1, $linha2);

     $lpc_faltaAperto9 = aux::GeralPorLinhaEDiagTE($atual9, 1, $linha1, $linha2);
     $lpc_desbalDeFase9 = aux::GeralPorLinhaEDiagTE($atual9, 2, $linha1, $linha2);
     $lpc_compMalDim9 = aux::GeralPorLinhaEDiagTE($atual9, 3, $linha1, $linha2);
     $lpc_caboRessecado9 = aux::GeralPorLinhaEDiagTE($atual9, 4, $linha1, $linha2);
     $lpc_defeitoComp9 = aux::GeralPorLinhaEDiagTE($atual9, 5, $linha1, $linha2);
     $lpc_conexaoTerm9 = aux::GeralPorLinhaEDiagTE($atual9, 37, $linha1, $linha2);

     $lpc_faltaAperto10 = aux::GeralPorLinhaEDiagTE($atual10, 1, $linha1, $linha2);
     $lpc_desbalDeFase10 = aux::GeralPorLinhaEDiagTE($atual10, 2, $linha1, $linha2);
     $lpc_compMalDim10 = aux::GeralPorLinhaEDiagTE($atual10, 3, $linha1, $linha2);
     $lpc_caboRessecado10 = aux::GeralPorLinhaEDiagTE($atual10, 4, $linha1, $linha2);
     $lpc_defeitoComp10 = aux::GeralPorLinhaEDiagTE($atual10, 5, $linha1, $linha2);
     $lpc_conexaoTerm10 = aux::GeralPorLinhaEDiagTE($atual10, 37, $linha1, $linha2);

     $lpc_faltaAperto11 = aux::GeralPorLinhaEDiagTE($atual11, 1, $linha1, $linha2);
     $lpc_desbalDeFase11 = aux::GeralPorLinhaEDiagTE($atual11, 2, $linha1, $linha2);
     $lpc_compMalDim11 = aux::GeralPorLinhaEDiagTE($atual11, 3, $linha1, $linha2);
     $lpc_caboRessecado11 = aux::GeralPorLinhaEDiagTE($atual11, 4, $linha1, $linha2);
     $lpc_defeitoComp11 = aux::GeralPorLinhaEDiagTE($atual11, 5, $linha1, $linha2);
     $lpc_conexaoTerm11 = aux::GeralPorLinhaEDiagTE($atual11, 37, $linha1, $linha2);

     $lpc_faltaAperto12 = aux::GeralPorLinhaEDiagTE($atual12, 1, $linha1, $linha2);
     $lpc_desbalDeFase12 = aux::GeralPorLinhaEDiagTE($atual12, 2, $linha1, $linha2);
     $lpc_compMalDim12 = aux::GeralPorLinhaEDiagTE($atual12, 3, $linha1, $linha2);
     $lpc_caboRessecado12 = aux::GeralPorLinhaEDiagTE($atual12, 4, $linha1, $linha2);
     $lpc_defeitoComp12 = aux::GeralPorLinhaEDiagTE($atual12, 5, $linha1, $linha2);
     $lpc_conexaoTerm12 = aux::GeralPorLinhaEDiagTE($atual12, 37, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lpc-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lpc_faltaAperto1', $lpc_faltaAperto1)->with('lpc_desbalDeFase1', $lpc_desbalDeFase1)->with('lpc_compMalDim1', $lpc_compMalDim1)->with('lpc_caboRessecado1', $lpc_caboRessecado1)->with('lpc_defeitoComp1', $lpc_defeitoComp1)->with('lpc_conexaoTerm1', $lpc_conexaoTerm1)
       ->with('atualf2', $atualf2)->with('lpc_faltaAperto2', $lpc_faltaAperto2)->with('lpc_desbalDeFase2', $lpc_desbalDeFase2)->with('lpc_compMalDim2', $lpc_compMalDim2)->with('lpc_caboRessecado2', $lpc_caboRessecado2)->with('lpc_defeitoComp2', $lpc_defeitoComp2)->with('lpc_conexaoTerm2', $lpc_conexaoTerm2)
       ->with('atualf3', $atualf3)->with('lpc_faltaAperto3', $lpc_faltaAperto3)->with('lpc_desbalDeFase3', $lpc_desbalDeFase3)->with('lpc_compMalDim3', $lpc_compMalDim3)->with('lpc_caboRessecado3', $lpc_caboRessecado3)->with('lpc_defeitoComp3', $lpc_defeitoComp3)->with('lpc_conexaoTerm3', $lpc_conexaoTerm3)
       ->with('atualf4', $atualf4)->with('lpc_faltaAperto4', $lpc_faltaAperto4)->with('lpc_desbalDeFase4', $lpc_desbalDeFase4)->with('lpc_compMalDim4', $lpc_compMalDim4)->with('lpc_caboRessecado4', $lpc_caboRessecado4)->with('lpc_defeitoComp4', $lpc_defeitoComp4)->with('lpc_conexaoTerm4', $lpc_conexaoTerm4)
       ->with('atualf5', $atualf5)->with('lpc_faltaAperto5', $lpc_faltaAperto5)->with('lpc_desbalDeFase5', $lpc_desbalDeFase5)->with('lpc_compMalDim5', $lpc_compMalDim5)->with('lpc_caboRessecado5', $lpc_caboRessecado5)->with('lpc_defeitoComp5', $lpc_defeitoComp5)->with('lpc_conexaoTerm5', $lpc_conexaoTerm5)
       ->with('atualf6', $atualf6)->with('lpc_faltaAperto6', $lpc_faltaAperto6)->with('lpc_desbalDeFase6', $lpc_desbalDeFase6)->with('lpc_compMalDim6', $lpc_compMalDim6)->with('lpc_caboRessecado6', $lpc_caboRessecado6)->with('lpc_defeitoComp6', $lpc_defeitoComp6)->with('lpc_conexaoTerm6', $lpc_conexaoTerm6)
       ->with('atualf7', $atualf7)->with('lpc_faltaAperto7', $lpc_faltaAperto7)->with('lpc_desbalDeFase7', $lpc_desbalDeFase7)->with('lpc_compMalDim7', $lpc_compMalDim7)->with('lpc_caboRessecado7', $lpc_caboRessecado7)->with('lpc_defeitoComp7', $lpc_defeitoComp7)->with('lpc_conexaoTerm7', $lpc_conexaoTerm7)
       ->with('atualf8', $atualf8)->with('lpc_faltaAperto8', $lpc_faltaAperto8)->with('lpc_desbalDeFase8', $lpc_desbalDeFase8)->with('lpc_compMalDim8', $lpc_compMalDim8)->with('lpc_caboRessecado8', $lpc_caboRessecado8)->with('lpc_defeitoComp8', $lpc_defeitoComp8)->with('lpc_conexaoTerm8', $lpc_conexaoTerm8)
       ->with('atualf9', $atualf9)->with('lpc_faltaAperto9', $lpc_faltaAperto9)->with('lpc_desbalDeFase9', $lpc_desbalDeFase9)->with('lpc_compMalDim9', $lpc_compMalDim9)->with('lpc_caboRessecado9', $lpc_caboRessecado9)->with('lpc_defeitoComp9', $lpc_defeitoComp9)->with('lpc_conexaoTerm9', $lpc_conexaoTerm9)
       ->with('atualf10', $atualf10)->with('lpc_faltaAperto10', $lpc_faltaAperto10)->with('lpc_desbalDeFase10', $lpc_desbalDeFase10)->with('lpc_compMalDim10', $lpc_compMalDim10)->with('lpc_caboRessecado10', $lpc_caboRessecado10)->with('lpc_defeitoComp10', $lpc_defeitoComp10)->with('lpc_conexaoTerm10', $lpc_conexaoTerm10)
       ->with('atualf11', $atualf11)->with('lpc_faltaAperto11', $lpc_faltaAperto11)->with('lpc_desbalDeFase11', $lpc_desbalDeFase11)->with('lpc_compMalDim11', $lpc_compMalDim11)->with('lpc_caboRessecado11', $lpc_caboRessecado11)->with('lpc_defeitoComp11', $lpc_defeitoComp11)->with('lpc_conexaoTerm11', $lpc_conexaoTerm11)
       ->with('atualf12', $atualf12)->with('lpc_faltaAperto12', $lpc_faltaAperto12)->with('lpc_desbalDeFase12', $lpc_desbalDeFase12)->with('lpc_compMalDim12', $lpc_compMalDim12)->with('lpc_caboRessecado12', $lpc_caboRessecado12)->with('lpc_defeitoComp12', $lpc_defeitoComp12)->with('lpc_conexaoTerm12', $lpc_conexaoTerm12);
   }

   public function CsPerfil() {

     $title = 'Perfil | CS';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 6;

     $cs_manutencao = aux::GeralPorLinha2TE($atual1, 1, $parent);
     $cs_standBy = aux::GeralPorLinha2TE($atual1, 2, $parent);
     $cs_normal = aux::GeralPorLinha2TE($atual1, 3, $parent);
     $cs_alarme = aux::GeralPorLinha2TE($atual1, 4, $parent);
     $cs_critico = aux::GeralPorLinha2TE($atual1, 5, $parent);

     if($cs_manutencao == null){$cs_manutencao = 0;}
     if($cs_standBy == null){$cs_standBy = 0;}
     if($cs_normal == null){$cs_normal = 0;}
     if($cs_alarme == null){$cs_alarme = 0;}
     if($cs_critico == null){$cs_critico = 0;}

    $sum = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.parent_id', '=', 6)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $manutencaoP_format = ($cs_manutencao / $sum)*100;
    $cs_manutencaoP = number_format($manutencaoP_format,2,".",",");
    $standByP_format = ($cs_standBy / $sum)*100;
    $cs_standByP = number_format($standByP_format,2,".",",");
    $normalP_format = ($cs_normal / $sum)*100;
    $cs_normalP = number_format($normalP_format,2,".",",");
    $alarmeP_format = ($cs_alarme / $sum)*100;
    $cs_alarmeP = number_format($alarmeP_format,2,".",",");
    $criticoP_format = ($cs_critico / $sum)*100;
    $cs_criticoP = number_format($criticoP_format,2,".",",");

      return view('csn.relatorioGerencial.includes.indexRelGerTE_cs_perfil')->with('title', $title)->with('sum', $sum)
     ->with('cs_manutencao', $cs_manutencao)->with('cs_standBy', $cs_standBy)->with('cs_normal', $cs_normal)->with('cs_alarme', $cs_alarme)->with('cs_critico', $cs_critico)
     ->with('cs_manutencaoP', $cs_manutencaoP)->with('cs_standByP', $cs_standByP)->with('cs_normalP', $cs_normalP)->with('cs_alarmeP', $cs_alarmeP)->with('cs_criticoP', $cs_criticoP);
   }

   public function CsStatusDosPontos() {

     $title = 'Status Pontos | CS';
     $parent = 6;

     $sum = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.parent_id', '=', 6)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $cs_normal1 = aux::GeralPorLinha2TE($atual1, 3, $parent);
     $cs_alarme1 = aux::GeralPorLinha2TE($atual1, 4, $parent);
     $cs_critico1 = aux::GeralPorLinha2TE($atual1, 5, $parent);

     $cs_normal2 = aux::GeralPorLinha2TE($atual2, 3, $parent);
     $cs_alarme2 = aux::GeralPorLinha2TE($atual2, 4, $parent);
     $cs_critico2 = aux::GeralPorLinha2TE($atual2, 5, $parent);

     $cs_normal3 = aux::GeralPorLinha2TE($atual3, 3, $parent);
     $cs_alarme3 = aux::GeralPorLinha2TE($atual3, 4, $parent);
     $cs_critico3 = aux::GeralPorLinha2TE($atual3, 5, $parent);

     $cs_normal4 = aux::GeralPorLinha2TE($atual4, 3, $parent);
     $cs_alarme4 = aux::GeralPorLinha2TE($atual4, 4, $parent);
     $cs_critico4 = aux::GeralPorLinha2TE($atual4, 5, $parent);

     $cs_normal5 = aux::GeralPorLinha2TE($atual5, 3, $parent);
     $cs_alarme5 = aux::GeralPorLinha2TE($atual5, 4, $parent);
     $cs_critico5 = aux::GeralPorLinha2TE($atual5, 5, $parent);

     $cs_normal6 = aux::GeralPorLinha2TE($atual6, 3, $parent);
     $cs_alarme6 = aux::GeralPorLinha2TE($atual6, 4, $parent);
     $cs_critico6 = aux::GeralPorLinha2TE($atual6, 5, $parent);

     $cs_normal7 = aux::GeralPorLinha2TE($atual7, 3, $parent);
     $cs_alarme7 = aux::GeralPorLinha2TE($atual7, 4, $parent);
     $cs_critico7 = aux::GeralPorLinha2TE($atual7, 5, $parent);

     $cs_normal8 = aux::GeralPorLinha2TE($atual8, 3, $parent);
     $cs_alarme8 = aux::GeralPorLinha2TE($atual8, 4, $parent);
     $cs_critico8 = aux::GeralPorLinha2TE($atual8, 5, $parent);

     $cs_normal9 = aux::GeralPorLinha2TE($atual9, 3, $parent);
     $cs_alarme9 = aux::GeralPorLinha2TE($atual9, 4, $parent);
     $cs_critico9 = aux::GeralPorLinha2TE($atual9, 5, $parent);

     $cs_normal10 = aux::GeralPorLinha2TE($atual10, 3, $parent);
     $cs_alarme10 = aux::GeralPorLinha2TE($atual10, 4, $parent);
     $cs_critico10 = aux::GeralPorLinha2TE($atual10, 5, $parent);

     $cs_normal11 = aux::GeralPorLinha2TE($atual11, 3, $parent);
     $cs_alarme11 = aux::GeralPorLinha2TE($atual11, 4, $parent);
     $cs_critico11 = aux::GeralPorLinha2TE($atual11, 5, $parent);

     $cs_normal12 = aux::GeralPorLinha2TE($atual12, 3, $parent);
     $cs_alarme12 = aux::GeralPorLinha2TE($atual12, 4, $parent);
     $cs_critico12 = aux::GeralPorLinha2TE($atual12, 5, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.cs-status-dos-pontos')
                 ->with('title', $title)->with('sum', $sum)
                 ->with('atual1', $atual1)->with('cs_normal1', $cs_normal1)->with('cs_alarme1', $cs_alarme1)->with('cs_critico1', $cs_critico1)
                 ->with('atual2', $atual2)->with('cs_normal2', $cs_normal2)->with('cs_alarme2', $cs_alarme2)->with('cs_critico2', $cs_critico2)
                 ->with('atual3', $atual3)->with('cs_normal3', $cs_normal3)->with('cs_alarme3', $cs_alarme3)->with('cs_critico3', $cs_critico3)
                 ->with('atual4', $atual4)->with('cs_normal4', $cs_normal4)->with('cs_alarme4', $cs_alarme4)->with('cs_critico4', $cs_critico4)
                 ->with('atual5', $atual5)->with('cs_normal5', $cs_normal5)->with('cs_alarme5', $cs_alarme5)->with('cs_critico5', $cs_critico5)
                 ->with('atual6', $atual6)->with('cs_normal6', $cs_normal6)->with('cs_alarme6', $cs_alarme6)->with('cs_critico6', $cs_critico6)
                 ->with('atual7', $atual7)->with('cs_normal7', $cs_normal7)->with('cs_alarme7', $cs_alarme7)->with('cs_critico7', $cs_critico7)
                 ->with('atual8', $atual8)->with('cs_normal8', $cs_normal8)->with('cs_alarme8', $cs_alarme8)->with('cs_critico8', $cs_critico8)
                 ->with('atual9', $atual9)->with('cs_normal9', $cs_normal9)->with('cs_alarme9', $cs_alarme9)->with('cs_critico9', $cs_critico9)
                 ->with('atual10', $atual10)->with('cs_normal10', $cs_normal10)->with('cs_alarme10', $cs_alarme10)->with('cs_critico10', $cs_critico10)
                 ->with('atual11', $atual11)->with('cs_normal11', $cs_normal11)->with('cs_alarme11', $cs_alarme11)->with('cs_critico11', $cs_critico11)
                 ->with('atual12', $atual12)->with('cs_normal12', $cs_normal12)->with('cs_alarme12', $cs_alarme12)->with('cs_critico12', $cs_critico12);
   }

   public function CsAnormalidades() {

     $title = 'Anormalidades | CS';
     $parent = 6;

     $sum = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.parent_id', '=', 6)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $alarme1P = aux::GeralPorLinha2TE($atual1, 4, $parent);
     $critico1P = aux::GeralPorLinha2TE($atual1, 5, $parent);
     $alarme2P = aux::GeralPorLinha2TE($atual2, 4, $parent);
     $critico2P = aux::GeralPorLinha2TE($atual2, 5, $parent);
     $alarme3P = aux::GeralPorLinha2TE($atual3, 4, $parent);
     $critico3P = aux::GeralPorLinha2TE($atual3, 5, $parent);
     $alarme4P = aux::GeralPorLinha2TE($atual4, 4, $parent);
     $critico4P = aux::GeralPorLinha2TE($atual4, 5, $parent);
     $alarme5P = aux::GeralPorLinha2TE($atual5, 4, $parent);
     $critico5P = aux::GeralPorLinha2TE($atual5, 5, $parent);
     $alarme6P = aux::GeralPorLinha2TE($atual6, 4, $parent);
     $critico6P = aux::GeralPorLinha2TE($atual6, 5, $parent);
     $alarme7P = aux::GeralPorLinha2TE($atual7, 4, $parent);
     $critico7P = aux::GeralPorLinha2TE($atual7, 5, $parent);
     $alarme8P = aux::GeralPorLinha2TE($atual8, 4, $parent);
     $critico8P = aux::GeralPorLinha2TE($atual8, 5, $parent);
     $alarme9P = aux::GeralPorLinha2TE($atual9, 4, $parent);
     $critico9P = aux::GeralPorLinha2TE($atual9, 5, $parent);
     $alarme10P = aux::GeralPorLinha2TE($atual10, 4, $parent);
     $critico10P = aux::GeralPorLinha2TE($atual10, 5, $parent);
     $alarme11P = aux::GeralPorLinha2TE($atual11, 4, $parent);
     $critico11P = aux::GeralPorLinha2TE($atual11, 5, $parent);
     $alarme12P = aux::GeralPorLinha2TE($atual12, 4, $parent);
     $critico12P = aux::GeralPorLinha2TE($atual12, 5, $parent);


     $cs_alarme1 = aux::FormatPercents($alarme1P, $sum);
     $cs_alarme2 = aux::FormatPercents($alarme2P, $sum);
     $cs_alarme3 = aux::FormatPercents($alarme3P, $sum);
     $cs_alarme4 = aux::FormatPercents($alarme4P, $sum);
     $cs_alarme5 = aux::FormatPercents($alarme5P, $sum);
     $cs_alarme6 = aux::FormatPercents($alarme6P, $sum);
     $cs_alarme7 = aux::FormatPercents($alarme7P, $sum);
     $cs_alarme8 = aux::FormatPercents($alarme8P, $sum);
     $cs_alarme9 = aux::FormatPercents($alarme9P, $sum);
     $cs_alarme10 = aux::FormatPercents($alarme10P, $sum);
     $cs_alarme11 = aux::FormatPercents($alarme11P, $sum);
     $cs_alarme12 = aux::FormatPercents($alarme12P, $sum);

     $cs_critico1 = aux::FormatPercents($critico1P, $sum);
     $cs_critico2 = aux::FormatPercents($critico2P, $sum);
     $cs_critico3 = aux::FormatPercents($critico3P, $sum);
     $cs_critico4 = aux::FormatPercents($critico4P, $sum);
     $cs_critico5 = aux::FormatPercents($critico5P, $sum);
     $cs_critico6 = aux::FormatPercents($critico6P, $sum);
     $cs_critico7 = aux::FormatPercents($critico7P, $sum);
     $cs_critico8 = aux::FormatPercents($critico8P, $sum);
     $cs_critico9 = aux::FormatPercents($critico9P, $sum);
     $cs_critico10 = aux::FormatPercents($critico10P, $sum);
     $cs_critico11 = aux::FormatPercents($critico11P, $sum);
     $cs_critico12 = aux::FormatPercents($critico12P, $sum);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.cs-anormalidades')->with('title', $title)->with('sum', $sum)
               ->with('atualf1', $atualf1)->with('cs_alarme1', $cs_alarme1)->with('cs_critico1', $cs_critico1)
               ->with('atualf2', $atualf2)->with('cs_alarme2', $cs_alarme2)->with('cs_critico2', $cs_critico2)
               ->with('atualf3', $atualf3)->with('cs_alarme3', $cs_alarme3)->with('cs_critico3', $cs_critico3)
               ->with('atualf4', $atualf4)->with('cs_alarme4', $cs_alarme4)->with('cs_critico4', $cs_critico4)
               ->with('atualf5', $atualf5)->with('cs_alarme5', $cs_alarme5)->with('cs_critico5', $cs_critico5)
               ->with('atualf6', $atualf6)->with('cs_alarme6', $cs_alarme6)->with('cs_critico6', $cs_critico6)
               ->with('atualf7', $atualf7)->with('cs_alarme7', $cs_alarme7)->with('cs_critico7', $cs_critico7)
               ->with('atualf8', $atualf8)->with('cs_alarme8', $cs_alarme8)->with('cs_critico8', $cs_critico8)
               ->with('atualf9', $atualf9)->with('cs_alarme9', $cs_alarme9)->with('cs_critico9', $cs_critico9)
               ->with('atualf10', $atualf10)->with('cs_alarme10', $cs_alarme10)->with('cs_critico10', $cs_critico10)
               ->with('atualf11', $atualf11)->with('cs_alarme11', $cs_alarme11)->with('cs_critico11', $cs_critico11)
               ->with('atualf12', $atualf12)->with('cs_alarme12', $cs_alarme12)->with('cs_critico12', $cs_critico12);
   }

   public function CsProblemasEncontrados() {

     $title = 'Problemas Encontrados | CS';
     $parent = 6;

     $sum = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.parent_id', '=', 6)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $cs_faltaAperto1 = aux::GeralPorLinhaEDiag2TE($atual1, 1, $parent);
     $cs_desbalDeFase1 = aux::GeralPorLinhaEDiag2TE($atual1, 2, $parent);
     $cs_compMalDim1 = aux::GeralPorLinhaEDiag2TE($atual1, 3, $parent);
     $cs_caboRessecado1 = aux::GeralPorLinhaEDiag2TE($atual1, 4, $parent);
     $cs_defeitoComp1 = aux::GeralPorLinhaEDiag2TE($atual1, 5, $parent);
     $cs_conexaoTerm1 = aux::GeralPorLinhaEDiag2TE($atual1, 37, $parent);

     $cs_faltaAperto2 = aux::GeralPorLinhaEDiag2TE($atual2, 1, $parent);
     $cs_desbalDeFase2 = aux::GeralPorLinhaEDiag2TE($atual2, 2, $parent);
     $cs_compMalDim2 = aux::GeralPorLinhaEDiag2TE($atual2, 3, $parent);
     $cs_caboRessecado2 = aux::GeralPorLinhaEDiag2TE($atual2, 4, $parent);
     $cs_defeitoComp2 = aux::GeralPorLinhaEDiag2TE($atual2, 5, $parent);
     $cs_conexaoTerm2 = aux::GeralPorLinhaEDiag2TE($atual2, 37, $parent);

     $cs_faltaAperto3 = aux::GeralPorLinhaEDiag2TE($atual3, 1, $parent);
     $cs_desbalDeFase3 = aux::GeralPorLinhaEDiag2TE($atual3, 2, $parent);
     $cs_compMalDim3 = aux::GeralPorLinhaEDiag2TE($atual3, 3, $parent);
     $cs_caboRessecado3 = aux::GeralPorLinhaEDiag2TE($atual3, 4, $parent);
     $cs_defeitoComp3 = aux::GeralPorLinhaEDiag2TE($atual3, 5, $parent);
     $cs_conexaoTerm3 = aux::GeralPorLinhaEDiag2TE($atual3, 37, $parent);

     $cs_faltaAperto4 = aux::GeralPorLinhaEDiag2TE($atual4, 1, $parent);
     $cs_desbalDeFase4 = aux::GeralPorLinhaEDiag2TE($atual4, 2, $parent);
     $cs_compMalDim4 = aux::GeralPorLinhaEDiag2TE($atual4, 3, $parent);
     $cs_caboRessecado4 = aux::GeralPorLinhaEDiag2TE($atual4, 4, $parent);
     $cs_defeitoComp4 = aux::GeralPorLinhaEDiag2TE($atual4, 5, $parent);
     $cs_conexaoTerm4 = aux::GeralPorLinhaEDiag2TE($atual4, 37, $parent);

     $cs_faltaAperto5 = aux::GeralPorLinhaEDiag2TE($atual5, 1, $parent);
     $cs_desbalDeFase5 = aux::GeralPorLinhaEDiag2TE($atual5, 2, $parent);
     $cs_compMalDim5 = aux::GeralPorLinhaEDiag2TE($atual5, 3, $parent);
     $cs_caboRessecado5 = aux::GeralPorLinhaEDiag2TE($atual5, 4, $parent);
     $cs_defeitoComp5 = aux::GeralPorLinhaEDiag2TE($atual5, 5, $parent);
     $cs_conexaoTerm5 = aux::GeralPorLinhaEDiag2TE($atual5, 37, $parent);

     $cs_faltaAperto6 = aux::GeralPorLinhaEDiag2TE($atual6, 1, $parent);
     $cs_desbalDeFase6 = aux::GeralPorLinhaEDiag2TE($atual6, 2, $parent);
     $cs_compMalDim6 = aux::GeralPorLinhaEDiag2TE($atual6, 3, $parent);
     $cs_caboRessecado6 = aux::GeralPorLinhaEDiag2TE($atual6, 4, $parent);
     $cs_defeitoComp6 = aux::GeralPorLinhaEDiag2TE($atual6, 5, $parent);
     $cs_conexaoTerm6 = aux::GeralPorLinhaEDiag2TE($atual6, 37, $parent);

     $cs_faltaAperto7 = aux::GeralPorLinhaEDiag2TE($atual7, 1, $parent);
     $cs_desbalDeFase7 = aux::GeralPorLinhaEDiag2TE($atual7, 2, $parent);
     $cs_compMalDim7 = aux::GeralPorLinhaEDiag2TE($atual7, 3, $parent);
     $cs_caboRessecado7 = aux::GeralPorLinhaEDiag2TE($atual7, 4, $parent);
     $cs_defeitoComp7 = aux::GeralPorLinhaEDiag2TE($atual7, 5, $parent);
     $cs_conexaoTerm7 = aux::GeralPorLinhaEDiag2TE($atual7, 37, $parent);

     $cs_faltaAperto8 = aux::GeralPorLinhaEDiag2TE($atual8, 1, $parent);
     $cs_desbalDeFase8 = aux::GeralPorLinhaEDiag2TE($atual8, 2, $parent);
     $cs_compMalDim8 = aux::GeralPorLinhaEDiag2TE($atual8, 3, $parent);
     $cs_caboRessecado8 = aux::GeralPorLinhaEDiag2TE($atual8, 4, $parent);
     $cs_defeitoComp8 = aux::GeralPorLinhaEDiag2TE($atual8, 5, $parent);
     $cs_conexaoTerm8 = aux::GeralPorLinhaEDiag2TE($atual8, 37, $parent);

     $cs_faltaAperto9 = aux::GeralPorLinhaEDiag2TE($atual9, 1, $parent);
     $cs_desbalDeFase9 = aux::GeralPorLinhaEDiag2TE($atual9, 2, $parent);
     $cs_compMalDim9 = aux::GeralPorLinhaEDiag2TE($atual9, 3, $parent);
     $cs_caboRessecado9 = aux::GeralPorLinhaEDiag2TE($atual9, 4, $parent);
     $cs_defeitoComp9 = aux::GeralPorLinhaEDiag2TE($atual9, 5, $parent);
     $cs_conexaoTerm9 = aux::GeralPorLinhaEDiag2TE($atual9, 37, $parent);

     $cs_faltaAperto10 = aux::GeralPorLinhaEDiag2TE($atual10, 1, $parent);
     $cs_desbalDeFase10 = aux::GeralPorLinhaEDiag2TE($atual10, 2, $parent);
     $cs_compMalDim10 = aux::GeralPorLinhaEDiag2TE($atual10, 3, $parent);
     $cs_caboRessecado10 = aux::GeralPorLinhaEDiag2TE($atual10, 4, $parent);
     $cs_defeitoComp10 = aux::GeralPorLinhaEDiag2TE($atual10, 5, $parent);
     $cs_conexaoTerm10 = aux::GeralPorLinhaEDiag2TE($atual10, 37, $parent);

     $cs_faltaAperto11 = aux::GeralPorLinhaEDiag2TE($atual11, 1, $parent);
     $cs_desbalDeFase11 = aux::GeralPorLinhaEDiag2TE($atual11, 2, $parent);
     $cs_compMalDim11 = aux::GeralPorLinhaEDiag2TE($atual11, 3, $parent);
     $cs_caboRessecado11 = aux::GeralPorLinhaEDiag2TE($atual11, 4, $parent);
     $cs_defeitoComp11 = aux::GeralPorLinhaEDiag2TE($atual11, 5, $parent);
     $cs_conexaoTerm11 = aux::GeralPorLinhaEDiag2TE($atual11, 37, $parent);

     $cs_faltaAperto12 = aux::GeralPorLinhaEDiag2TE($atual12, 1, $parent);
     $cs_desbalDeFase12 = aux::GeralPorLinhaEDiag2TE($atual12, 2, $parent);
     $cs_compMalDim12 = aux::GeralPorLinhaEDiag2TE($atual12, 3, $parent);
     $cs_caboRessecado12 = aux::GeralPorLinhaEDiag2TE($atual12, 4, $parent);
     $cs_defeitoComp12 = aux::GeralPorLinhaEDiag2TE($atual12, 5, $parent);
     $cs_conexaoTerm12 = aux::GeralPorLinhaEDiag2TE($atual12, 37, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.cs-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('cs_faltaAperto1', $cs_faltaAperto1)->with('cs_desbalDeFase1', $cs_desbalDeFase1)->with('cs_compMalDim1', $cs_compMalDim1)->with('cs_caboRessecado1', $cs_caboRessecado1)->with('cs_defeitoComp1', $cs_defeitoComp1)->with('cs_conexaoTerm1', $cs_conexaoTerm1)
       ->with('atualf2', $atualf2)->with('cs_faltaAperto2', $cs_faltaAperto2)->with('cs_desbalDeFase2', $cs_desbalDeFase2)->with('cs_compMalDim2', $cs_compMalDim2)->with('cs_caboRessecado2', $cs_caboRessecado2)->with('cs_defeitoComp2', $cs_defeitoComp2)->with('cs_conexaoTerm2', $cs_conexaoTerm2)
       ->with('atualf3', $atualf3)->with('cs_faltaAperto3', $cs_faltaAperto3)->with('cs_desbalDeFase3', $cs_desbalDeFase3)->with('cs_compMalDim3', $cs_compMalDim3)->with('cs_caboRessecado3', $cs_caboRessecado3)->with('cs_defeitoComp3', $cs_defeitoComp3)->with('cs_conexaoTerm3', $cs_conexaoTerm3)
       ->with('atualf4', $atualf4)->with('cs_faltaAperto4', $cs_faltaAperto4)->with('cs_desbalDeFase4', $cs_desbalDeFase4)->with('cs_compMalDim4', $cs_compMalDim4)->with('cs_caboRessecado4', $cs_caboRessecado4)->with('cs_defeitoComp4', $cs_defeitoComp4)->with('cs_conexaoTerm4', $cs_conexaoTerm4)
       ->with('atualf5', $atualf5)->with('cs_faltaAperto5', $cs_faltaAperto5)->with('cs_desbalDeFase5', $cs_desbalDeFase5)->with('cs_compMalDim5', $cs_compMalDim5)->with('cs_caboRessecado5', $cs_caboRessecado5)->with('cs_defeitoComp5', $cs_defeitoComp5)->with('cs_conexaoTerm5', $cs_conexaoTerm5)
       ->with('atualf6', $atualf6)->with('cs_faltaAperto6', $cs_faltaAperto6)->with('cs_desbalDeFase6', $cs_desbalDeFase6)->with('cs_compMalDim6', $cs_compMalDim6)->with('cs_caboRessecado6', $cs_caboRessecado6)->with('cs_defeitoComp6', $cs_defeitoComp6)->with('cs_conexaoTerm6', $cs_conexaoTerm6)
       ->with('atualf7', $atualf7)->with('cs_faltaAperto7', $cs_faltaAperto7)->with('cs_desbalDeFase7', $cs_desbalDeFase7)->with('cs_compMalDim7', $cs_compMalDim7)->with('cs_caboRessecado7', $cs_caboRessecado7)->with('cs_defeitoComp7', $cs_defeitoComp7)->with('cs_conexaoTerm7', $cs_conexaoTerm7)
       ->with('atualf8', $atualf8)->with('cs_faltaAperto8', $cs_faltaAperto8)->with('cs_desbalDeFase8', $cs_desbalDeFase8)->with('cs_compMalDim8', $cs_compMalDim8)->with('cs_caboRessecado8', $cs_caboRessecado8)->with('cs_defeitoComp8', $cs_defeitoComp8)->with('cs_conexaoTerm8', $cs_conexaoTerm8)
       ->with('atualf9', $atualf9)->with('cs_faltaAperto9', $cs_faltaAperto9)->with('cs_desbalDeFase9', $cs_desbalDeFase9)->with('cs_compMalDim9', $cs_compMalDim9)->with('cs_caboRessecado9', $cs_caboRessecado9)->with('cs_defeitoComp9', $cs_defeitoComp9)->with('cs_conexaoTerm9', $cs_conexaoTerm9)
       ->with('atualf10', $atualf10)->with('cs_faltaAperto10', $cs_faltaAperto10)->with('cs_desbalDeFase10', $cs_desbalDeFase10)->with('cs_compMalDim10', $cs_compMalDim10)->with('cs_caboRessecado10', $cs_caboRessecado10)->with('cs_defeitoComp10', $cs_defeitoComp10)->with('cs_conexaoTerm10', $cs_conexaoTerm10)
       ->with('atualf11', $atualf11)->with('cs_faltaAperto11', $cs_faltaAperto11)->with('cs_desbalDeFase11', $cs_desbalDeFase11)->with('cs_compMalDim11', $cs_compMalDim11)->with('cs_caboRessecado11', $cs_caboRessecado11)->with('cs_defeitoComp11', $cs_defeitoComp11)->with('cs_conexaoTerm11', $cs_conexaoTerm11)
       ->with('atualf12', $atualf12)->with('cs_faltaAperto12', $cs_faltaAperto12)->with('cs_desbalDeFase12', $cs_desbalDeFase12)->with('cs_compMalDim12', $cs_compMalDim12)->with('cs_caboRessecado12', $cs_caboRessecado12)->with('cs_defeitoComp12', $cs_defeitoComp12)->with('cs_conexaoTerm12', $cs_conexaoTerm12);
   }

   public function PrPerfil() {

     $title = 'Perfil | Pontes Rolantes';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 8;

     $pr_manutencao = aux::GeralPorLinha2TE($atual1, 1, $parent);
     $pr_standBy = aux::GeralPorLinha2TE($atual1, 2, $parent);
     $pr_normal = aux::GeralPorLinha2TE($atual1, 3, $parent);
     $pr_alarme = aux::GeralPorLinha2TE($atual1, 4, $parent);
     $pr_critico = aux::GeralPorLinha2TE($atual1, 5, $parent);

     if($pr_manutencao == null){$pr_manutencao = 0;}
     if($pr_standBy == null){$pr_standBy = 0;}
     if($pr_normal == null){$pr_normal = 0;}
     if($pr_alarme == null){$pr_alarme = 0;}
     if($pr_critico == null){$pr_critico = 0;}

    $sum = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.parent_id', '=', 8)
                ->where('preditiva_atividades.tecnicas_id', '=', 1)
                ->count('preditiva_atividades.id');

    $manutencaoP_format = ($pr_manutencao / $sum)*100;
    $pr_manutencaoP = number_format($manutencaoP_format,2,".",",");
    $standByP_format = ($pr_standBy / $sum)*100;
    $pr_standByP = number_format($standByP_format,2,".",",");
    $normalP_format = ($pr_normal / $sum)*100;
    $pr_normalP = number_format($normalP_format,2,".",",");
    $alarmeP_format = ($pr_alarme / $sum)*100;
    $pr_alarmeP = number_format($alarmeP_format,2,".",",");
    $criticoP_format = ($pr_critico / $sum)*100;
    $pr_criticoP = number_format($criticoP_format,2,".",",");

    return view('csn.relatorioGerencial.includes.indexRelGerTE_pr_perfil')->with('title', $title)->with('sum', $sum)
   ->with('pr_manutencao', $pr_manutencao)->with('pr_standBy', $pr_standBy)->with('pr_normal', $pr_normal)->with('pr_alarme', $pr_alarme)->with('pr_critico', $pr_critico)
   ->with('pr_manutencaoP', $pr_manutencaoP)->with('pr_standByP', $pr_standByP)->with('pr_normalP', $pr_normalP)->with('pr_alarmeP', $pr_alarmeP)->with('pr_criticoP', $pr_criticoP);
 }

   public function PrStatusDosPontos() {

     $title = 'Status Pontos | Pontes Rolantes';
     $parent = 8;

     $sum = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.parent_id', '=', 8)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $pr_normal1 = aux::GeralPorLinha2TE($atual1, 3, $parent);
     $pr_alarme1 = aux::GeralPorLinha2TE($atual1, 4, $parent);
     $pr_critico1 = aux::GeralPorLinha2TE($atual1, 5, $parent);

     $pr_normal2 = aux::GeralPorLinha2TE($atual2, 3, $parent);
     $pr_alarme2 = aux::GeralPorLinha2TE($atual2, 4, $parent);
     $pr_critico2 = aux::GeralPorLinha2TE($atual2, 5, $parent);

     $pr_normal3 = aux::GeralPorLinha2TE($atual3, 3, $parent);
     $pr_alarme3 = aux::GeralPorLinha2TE($atual3, 4, $parent);
     $pr_critico3 = aux::GeralPorLinha2TE($atual3, 5, $parent);

     $pr_normal4 = aux::GeralPorLinha2TE($atual4, 3, $parent);
     $pr_alarme4 = aux::GeralPorLinha2TE($atual4, 4, $parent);
     $pr_critico4 = aux::GeralPorLinha2TE($atual4, 5, $parent);

     $pr_normal5 = aux::GeralPorLinha2TE($atual5, 3, $parent);
     $pr_alarme5 = aux::GeralPorLinha2TE($atual5, 4, $parent);
     $pr_critico5 = aux::GeralPorLinha2TE($atual5, 5, $parent);

     $pr_normal6 = aux::GeralPorLinha2TE($atual6, 3, $parent);
     $pr_alarme6 = aux::GeralPorLinha2TE($atual6, 4, $parent);
     $pr_critico6 = aux::GeralPorLinha2TE($atual6, 5, $parent);

     $pr_normal7 = aux::GeralPorLinha2TE($atual7, 3, $parent);
     $pr_alarme7 = aux::GeralPorLinha2TE($atual7, 4, $parent);
     $pr_critico7 = aux::GeralPorLinha2TE($atual7, 5, $parent);

     $pr_normal8 = aux::GeralPorLinha2TE($atual8, 3, $parent);
     $pr_alarme8 = aux::GeralPorLinha2TE($atual8, 4, $parent);
     $pr_critico8 = aux::GeralPorLinha2TE($atual8, 5, $parent);

     $pr_normal9 = aux::GeralPorLinha2TE($atual9, 3, $parent);
     $pr_alarme9 = aux::GeralPorLinha2TE($atual9, 4, $parent);
     $pr_critico9 = aux::GeralPorLinha2TE($atual9, 5, $parent);

     $pr_normal10 = aux::GeralPorLinha2TE($atual10, 3, $parent);
     $pr_alarme10 = aux::GeralPorLinha2TE($atual10, 4, $parent);
     $pr_critico10 = aux::GeralPorLinha2TE($atual10, 5, $parent);

     $pr_normal11 = aux::GeralPorLinha2TE($atual11, 3, $parent);
     $pr_alarme11 = aux::GeralPorLinha2TE($atual11, 4, $parent);
     $pr_critico11 = aux::GeralPorLinha2TE($atual11, 5, $parent);

     $pr_normal12 = aux::GeralPorLinha2TE($atual12, 3, $parent);
     $pr_alarme12 = aux::GeralPorLinha2TE($atual12, 4, $parent);
     $pr_critico12 = aux::GeralPorLinha2TE($atual12, 5, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.pr-status-dos-pontos')->with('title', $title)->with('sum', $sum)
               ->with('atual1', $atual1)->with('pr_normal1', $pr_normal1)->with('pr_alarme1', $pr_alarme1)->with('pr_critico1', $pr_critico1)
               ->with('atual2', $atual2)->with('pr_normal2', $pr_normal2)->with('pr_alarme2', $pr_alarme2)->with('pr_critico2', $pr_critico2)
               ->with('atual3', $atual3)->with('pr_normal3', $pr_normal3)->with('pr_alarme3', $pr_alarme3)->with('pr_critico3', $pr_critico3)
               ->with('atual4', $atual4)->with('pr_normal4', $pr_normal4)->with('pr_alarme4', $pr_alarme4)->with('pr_critico4', $pr_critico4)
               ->with('atual5', $atual5)->with('pr_normal5', $pr_normal5)->with('pr_alarme5', $pr_alarme5)->with('pr_critico5', $pr_critico5)
               ->with('atual6', $atual6)->with('pr_normal6', $pr_normal6)->with('pr_alarme6', $pr_alarme6)->with('pr_critico6', $pr_critico6)
               ->with('atual7', $atual7)->with('pr_normal7', $pr_normal7)->with('pr_alarme7', $pr_alarme7)->with('pr_critico7', $pr_critico7)
               ->with('atual8', $atual8)->with('pr_normal8', $pr_normal8)->with('pr_alarme8', $pr_alarme8)->with('pr_critico8', $pr_critico8)
               ->with('atual9', $atual9)->with('pr_normal9', $pr_normal9)->with('pr_alarme9', $pr_alarme9)->with('pr_critico9', $pr_critico9)
               ->with('atual10', $atual10)->with('pr_normal10', $pr_normal10)->with('pr_alarme10', $pr_alarme10)->with('pr_critico10', $pr_critico10)
               ->with('atual11', $atual11)->with('pr_normal11', $pr_normal11)->with('pr_alarme11', $pr_alarme11)->with('pr_critico11', $pr_critico11)
               ->with('atual12', $atual12)->with('pr_normal12', $pr_normal12)->with('pr_alarme12', $pr_alarme12)->with('pr_critico12', $pr_critico12);
   }

   public function PrAnormalidades() {

     $title = 'Anormalidades | Pontes Rolantes';
     $parent = 8;

     $sum = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.parent_id', '=', 8)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $alarme1P = aux::GeralPorLinha2TE($atual1, 4, $parent);
     $critico1P = aux::GeralPorLinha2TE($atual1, 5, $parent);
     $alarme2P = aux::GeralPorLinha2TE($atual2, 4, $parent);
     $critico2P = aux::GeralPorLinha2TE($atual2, 5, $parent);
     $alarme3P = aux::GeralPorLinha2TE($atual3, 4, $parent);
     $critico3P = aux::GeralPorLinha2TE($atual3, 5, $parent);
     $alarme4P = aux::GeralPorLinha2TE($atual4, 4, $parent);
     $critico4P = aux::GeralPorLinha2TE($atual4, 5, $parent);
     $alarme5P = aux::GeralPorLinha2TE($atual5, 4, $parent);
     $critico5P = aux::GeralPorLinha2TE($atual5, 5, $parent);
     $alarme6P = aux::GeralPorLinha2TE($atual6, 4, $parent);
     $critico6P = aux::GeralPorLinha2TE($atual6, 5, $parent);
     $alarme7P = aux::GeralPorLinha2TE($atual7, 4, $parent);
     $critico7P = aux::GeralPorLinha2TE($atual7, 5, $parent);
     $alarme8P = aux::GeralPorLinha2TE($atual8, 4, $parent);
     $critico8P = aux::GeralPorLinha2TE($atual8, 5, $parent);
     $alarme9P = aux::GeralPorLinha2TE($atual9, 4, $parent);
     $critico9P = aux::GeralPorLinha2TE($atual9, 5, $parent);
     $alarme10P = aux::GeralPorLinha2TE($atual10, 4, $parent);
     $critico10P = aux::GeralPorLinha2TE($atual10, 5, $parent);
     $alarme11P = aux::GeralPorLinha2TE($atual11, 4, $parent);
     $critico11P = aux::GeralPorLinha2TE($atual11, 5, $parent);
     $alarme12P = aux::GeralPorLinha2TE($atual12, 4, $parent);
     $critico12P = aux::GeralPorLinha2TE($atual12, 5, $parent);


     $pr_alarme1 = aux::FormatPercents($alarme1P, $sum);
     $pr_alarme2 = aux::FormatPercents($alarme2P, $sum);
     $pr_alarme3 = aux::FormatPercents($alarme3P, $sum);
     $pr_alarme4 = aux::FormatPercents($alarme4P, $sum);
     $pr_alarme5 = aux::FormatPercents($alarme5P, $sum);
     $pr_alarme6 = aux::FormatPercents($alarme6P, $sum);
     $pr_alarme7 = aux::FormatPercents($alarme7P, $sum);
     $pr_alarme8 = aux::FormatPercents($alarme8P, $sum);
     $pr_alarme9 = aux::FormatPercents($alarme9P, $sum);
     $pr_alarme10 = aux::FormatPercents($alarme10P, $sum);
     $pr_alarme11 = aux::FormatPercents($alarme11P, $sum);
     $pr_alarme12 = aux::FormatPercents($alarme12P, $sum);

     $pr_critico1 = aux::FormatPercents($critico1P, $sum);
     $pr_critico2 = aux::FormatPercents($critico2P, $sum);
     $pr_critico3 = aux::FormatPercents($critico3P, $sum);
     $pr_critico4 = aux::FormatPercents($critico4P, $sum);
     $pr_critico5 = aux::FormatPercents($critico5P, $sum);
     $pr_critico6 = aux::FormatPercents($critico6P, $sum);
     $pr_critico7 = aux::FormatPercents($critico7P, $sum);
     $pr_critico8 = aux::FormatPercents($critico8P, $sum);
     $pr_critico9 = aux::FormatPercents($critico9P, $sum);
     $pr_critico10 = aux::FormatPercents($critico10P, $sum);
     $pr_critico11 = aux::FormatPercents($critico11P, $sum);
     $pr_critico12 = aux::FormatPercents($critico12P, $sum);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.pr-anormalidades')->with('title', $title)->with('sum', $sum)
     ->with('atualf1', $atualf1)->with('pr_alarme1', $pr_alarme1)->with('pr_critico1', $pr_critico1)
     ->with('atualf2', $atualf2)->with('pr_alarme2', $pr_alarme2)->with('pr_critico2', $pr_critico2)
     ->with('atualf3', $atualf3)->with('pr_alarme3', $pr_alarme3)->with('pr_critico3', $pr_critico3)
     ->with('atualf4', $atualf4)->with('pr_alarme4', $pr_alarme4)->with('pr_critico4', $pr_critico4)
     ->with('atualf5', $atualf5)->with('pr_alarme5', $pr_alarme5)->with('pr_critico5', $pr_critico5)
     ->with('atualf6', $atualf6)->with('pr_alarme6', $pr_alarme6)->with('pr_critico6', $pr_critico6)
     ->with('atualf7', $atualf7)->with('pr_alarme7', $pr_alarme7)->with('pr_critico7', $pr_critico7)
     ->with('atualf8', $atualf8)->with('pr_alarme8', $pr_alarme8)->with('pr_critico8', $pr_critico8)
     ->with('atualf9', $atualf9)->with('pr_alarme9', $pr_alarme9)->with('pr_critico9', $pr_critico9)
     ->with('atualf10', $atualf10)->with('pr_alarme10', $pr_alarme10)->with('pr_critico10', $pr_critico10)
     ->with('atualf11', $atualf11)->with('pr_alarme11', $pr_alarme11)->with('pr_critico11', $pr_critico11)
     ->with('atualf12', $atualf12)->with('pr_alarme12', $pr_alarme12)->with('pr_critico12', $pr_critico12);
   }

   public function PrProblemasEncontrados() {

     $title = 'Problemas Encontrados | Pontes Rolantes';
     $parent = 8;

     $sum = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.parent_id', '=', 8)
                 ->where('preditiva_atividades.tecnicas_id', '=', 1)
                 ->count('preditiva_atividades.id');

     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
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

     $pr_faltaAperto1 = aux::GeralPorLinhaEDiag2TE($atual1, 1, $parent);
     $pr_desbalDeFase1 = aux::GeralPorLinhaEDiag2TE($atual1, 2, $parent);
     $pr_compMalDim1 = aux::GeralPorLinhaEDiag2TE($atual1, 3, $parent);
     $pr_caboRessecado1 = aux::GeralPorLinhaEDiag2TE($atual1, 4, $parent);
     $pr_defeitoComp1 = aux::GeralPorLinhaEDiag2TE($atual1, 5, $parent);
     $pr_conexaoTerm1 = aux::GeralPorLinhaEDiag2TE($atual1, 37, $parent);

     $pr_faltaAperto2 = aux::GeralPorLinhaEDiag2TE($atual2, 1, $parent);
     $pr_desbalDeFase2 = aux::GeralPorLinhaEDiag2TE($atual2, 2, $parent);
     $pr_compMalDim2 = aux::GeralPorLinhaEDiag2TE($atual2, 3, $parent);
     $pr_caboRessecado2 = aux::GeralPorLinhaEDiag2TE($atual2, 4, $parent);
     $pr_defeitoComp2 = aux::GeralPorLinhaEDiag2TE($atual2, 5, $parent);
     $pr_conexaoTerm2 = aux::GeralPorLinhaEDiag2TE($atual2, 37, $parent);

     $pr_faltaAperto3 = aux::GeralPorLinhaEDiag2TE($atual3, 1, $parent);
     $pr_desbalDeFase3 = aux::GeralPorLinhaEDiag2TE($atual3, 2, $parent);
     $pr_compMalDim3 = aux::GeralPorLinhaEDiag2TE($atual3, 3, $parent);
     $pr_caboRessecado3 = aux::GeralPorLinhaEDiag2TE($atual3, 4, $parent);
     $pr_defeitoComp3 = aux::GeralPorLinhaEDiag2TE($atual3, 5, $parent);
     $pr_conexaoTerm3 = aux::GeralPorLinhaEDiag2TE($atual3, 37, $parent);

     $pr_faltaAperto4 = aux::GeralPorLinhaEDiag2TE($atual4, 1, $parent);
     $pr_desbalDeFase4 = aux::GeralPorLinhaEDiag2TE($atual4, 2, $parent);
     $pr_compMalDim4 = aux::GeralPorLinhaEDiag2TE($atual4, 3, $parent);
     $pr_caboRessecado4 = aux::GeralPorLinhaEDiag2TE($atual4, 4, $parent);
     $pr_defeitoComp4 = aux::GeralPorLinhaEDiag2TE($atual4, 5, $parent);
     $pr_conexaoTerm4 = aux::GeralPorLinhaEDiag2TE($atual4, 37, $parent);

     $pr_faltaAperto5 = aux::GeralPorLinhaEDiag2TE($atual5, 1, $parent);
     $pr_desbalDeFase5 = aux::GeralPorLinhaEDiag2TE($atual5, 2, $parent);
     $pr_compMalDim5 = aux::GeralPorLinhaEDiag2TE($atual5, 3, $parent);
     $pr_caboRessecado5 = aux::GeralPorLinhaEDiag2TE($atual5, 4, $parent);
     $pr_defeitoComp5 = aux::GeralPorLinhaEDiag2TE($atual5, 5, $parent);
     $pr_conexaoTerm5 = aux::GeralPorLinhaEDiag2TE($atual5, 37, $parent);

     $pr_faltaAperto6 = aux::GeralPorLinhaEDiag2TE($atual6, 1, $parent);
     $pr_desbalDeFase6 = aux::GeralPorLinhaEDiag2TE($atual6, 2, $parent);
     $pr_compMalDim6 = aux::GeralPorLinhaEDiag2TE($atual6, 3, $parent);
     $pr_caboRessecado6 = aux::GeralPorLinhaEDiag2TE($atual6, 4, $parent);
     $pr_defeitoComp6 = aux::GeralPorLinhaEDiag2TE($atual6, 5, $parent);
     $pr_conexaoTerm6 = aux::GeralPorLinhaEDiag2TE($atual6, 37, $parent);

     $pr_faltaAperto7 = aux::GeralPorLinhaEDiag2TE($atual7, 1, $parent);
     $pr_desbalDeFase7 = aux::GeralPorLinhaEDiag2TE($atual7, 2, $parent);
     $pr_compMalDim7 = aux::GeralPorLinhaEDiag2TE($atual7, 3, $parent);
     $pr_caboRessecado7 = aux::GeralPorLinhaEDiag2TE($atual7, 4, $parent);
     $pr_defeitoComp7 = aux::GeralPorLinhaEDiag2TE($atual7, 5, $parent);
     $pr_conexaoTerm7 = aux::GeralPorLinhaEDiag2TE($atual7, 37, $parent);

     $pr_faltaAperto8 = aux::GeralPorLinhaEDiag2TE($atual8, 1, $parent);
     $pr_desbalDeFase8 = aux::GeralPorLinhaEDiag2TE($atual8, 2, $parent);
     $pr_compMalDim8 = aux::GeralPorLinhaEDiag2TE($atual8, 3, $parent);
     $pr_caboRessecado8 = aux::GeralPorLinhaEDiag2TE($atual8, 4, $parent);
     $pr_defeitoComp8 = aux::GeralPorLinhaEDiag2TE($atual8, 5, $parent);
     $pr_conexaoTerm8 = aux::GeralPorLinhaEDiag2TE($atual8, 37, $parent);

     $pr_faltaAperto9 = aux::GeralPorLinhaEDiag2TE($atual9, 1, $parent);
     $pr_desbalDeFase9 = aux::GeralPorLinhaEDiag2TE($atual9, 2, $parent);
     $pr_compMalDim9 = aux::GeralPorLinhaEDiag2TE($atual9, 3, $parent);
     $pr_caboRessecado9 = aux::GeralPorLinhaEDiag2TE($atual9, 4, $parent);
     $pr_defeitoComp9 = aux::GeralPorLinhaEDiag2TE($atual9, 5, $parent);
     $pr_conexaoTerm9 = aux::GeralPorLinhaEDiag2TE($atual9, 37, $parent);

     $pr_faltaAperto10 = aux::GeralPorLinhaEDiag2TE($atual10, 1, $parent);
     $pr_desbalDeFase10 = aux::GeralPorLinhaEDiag2TE($atual10, 2, $parent);
     $pr_compMalDim10 = aux::GeralPorLinhaEDiag2TE($atual10, 3, $parent);
     $pr_caboRessecado10 = aux::GeralPorLinhaEDiag2TE($atual10, 4, $parent);
     $pr_defeitoComp10 = aux::GeralPorLinhaEDiag2TE($atual10, 5, $parent);
     $pr_conexaoTerm10 = aux::GeralPorLinhaEDiag2TE($atual10, 37, $parent);

     $pr_faltaAperto11 = aux::GeralPorLinhaEDiag2TE($atual11, 1, $parent);
     $pr_desbalDeFase11 = aux::GeralPorLinhaEDiag2TE($atual11, 2, $parent);
     $pr_compMalDim11 = aux::GeralPorLinhaEDiag2TE($atual11, 3, $parent);
     $pr_caboRessecado11 = aux::GeralPorLinhaEDiag2TE($atual11, 4, $parent);
     $pr_defeitoComp11 = aux::GeralPorLinhaEDiag2TE($atual11, 5, $parent);
     $pr_conexaoTerm11 = aux::GeralPorLinhaEDiag2TE($atual11, 37, $parent);

     $pr_faltaAperto12 = aux::GeralPorLinhaEDiag2TE($atual12, 1, $parent);
     $pr_desbalDeFase12 = aux::GeralPorLinhaEDiag2TE($atual12, 2, $parent);
     $pr_compMalDim12 = aux::GeralPorLinhaEDiag2TE($atual12, 3, $parent);
     $pr_caboRessecado12 = aux::GeralPorLinhaEDiag2TE($atual12, 4, $parent);
     $pr_defeitoComp12 = aux::GeralPorLinhaEDiag2TE($atual12, 5, $parent);
     $pr_conexaoTerm12 = aux::GeralPorLinhaEDiag2TE($atual12, 37, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosTermoEletrica.pr-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('pr_faltaAperto1', $pr_faltaAperto1)->with('pr_desbalDeFase1', $pr_desbalDeFase1)->with('pr_compMalDim1', $pr_compMalDim1)->with('pr_caboRessecado1', $pr_caboRessecado1)->with('pr_defeitoComp1', $pr_defeitoComp1)->with('pr_conexaoTerm1', $pr_conexaoTerm1)
       ->with('atualf2', $atualf2)->with('pr_faltaAperto2', $pr_faltaAperto2)->with('pr_desbalDeFase2', $pr_desbalDeFase2)->with('pr_compMalDim2', $pr_compMalDim2)->with('pr_caboRessecado2', $pr_caboRessecado2)->with('pr_defeitoComp2', $pr_defeitoComp2)->with('pr_conexaoTerm2', $pr_conexaoTerm2)
       ->with('atualf3', $atualf3)->with('pr_faltaAperto3', $pr_faltaAperto3)->with('pr_desbalDeFase3', $pr_desbalDeFase3)->with('pr_compMalDim3', $pr_compMalDim3)->with('pr_caboRessecado3', $pr_caboRessecado3)->with('pr_defeitoComp3', $pr_defeitoComp3)->with('pr_conexaoTerm3', $pr_conexaoTerm3)
       ->with('atualf4', $atualf4)->with('pr_faltaAperto4', $pr_faltaAperto4)->with('pr_desbalDeFase4', $pr_desbalDeFase4)->with('pr_compMalDim4', $pr_compMalDim4)->with('pr_caboRessecado4', $pr_caboRessecado4)->with('pr_defeitoComp4', $pr_defeitoComp4)->with('pr_conexaoTerm4', $pr_conexaoTerm4)
       ->with('atualf5', $atualf5)->with('pr_faltaAperto5', $pr_faltaAperto5)->with('pr_desbalDeFase5', $pr_desbalDeFase5)->with('pr_compMalDim5', $pr_compMalDim5)->with('pr_caboRessecado5', $pr_caboRessecado5)->with('pr_defeitoComp5', $pr_defeitoComp5)->with('pr_conexaoTerm5', $pr_conexaoTerm5)
       ->with('atualf6', $atualf6)->with('pr_faltaAperto6', $pr_faltaAperto6)->with('pr_desbalDeFase6', $pr_desbalDeFase6)->with('pr_compMalDim6', $pr_compMalDim6)->with('pr_caboRessecado6', $pr_caboRessecado6)->with('pr_defeitoComp6', $pr_defeitoComp6)->with('pr_conexaoTerm6', $pr_conexaoTerm6)
       ->with('atualf7', $atualf7)->with('pr_faltaAperto7', $pr_faltaAperto7)->with('pr_desbalDeFase7', $pr_desbalDeFase7)->with('pr_compMalDim7', $pr_compMalDim7)->with('pr_caboRessecado7', $pr_caboRessecado7)->with('pr_defeitoComp7', $pr_defeitoComp7)->with('pr_conexaoTerm7', $pr_conexaoTerm7)
       ->with('atualf8', $atualf8)->with('pr_faltaAperto8', $pr_faltaAperto8)->with('pr_desbalDeFase8', $pr_desbalDeFase8)->with('pr_compMalDim8', $pr_compMalDim8)->with('pr_caboRessecado8', $pr_caboRessecado8)->with('pr_defeitoComp8', $pr_defeitoComp8)->with('pr_conexaoTerm8', $pr_conexaoTerm8)
       ->with('atualf9', $atualf9)->with('pr_faltaAperto9', $pr_faltaAperto9)->with('pr_desbalDeFase9', $pr_desbalDeFase9)->with('pr_compMalDim9', $pr_compMalDim9)->with('pr_caboRessecado9', $pr_caboRessecado9)->with('pr_defeitoComp9', $pr_defeitoComp9)->with('pr_conexaoTerm9', $pr_conexaoTerm9)
       ->with('atualf10', $atualf10)->with('pr_faltaAperto10', $pr_faltaAperto10)->with('pr_desbalDeFase10', $pr_desbalDeFase10)->with('pr_compMalDim10', $pr_compMalDim10)->with('pr_caboRessecado10', $pr_caboRessecado10)->with('pr_defeitoComp10', $pr_defeitoComp10)->with('pr_conexaoTerm10', $pr_conexaoTerm10)
       ->with('atualf11', $atualf11)->with('pr_faltaAperto11', $pr_faltaAperto11)->with('pr_desbalDeFase11', $pr_desbalDeFase11)->with('pr_compMalDim11', $pr_compMalDim11)->with('pr_caboRessecado11', $pr_caboRessecado11)->with('pr_defeitoComp11', $pr_defeitoComp11)->with('pr_conexaoTerm11', $pr_conexaoTerm11)
       ->with('atualf12', $atualf12)->with('pr_faltaAperto12', $pr_faltaAperto12)->with('pr_desbalDeFase12', $pr_desbalDeFase12)->with('pr_compMalDim12', $pr_compMalDim12)->with('pr_caboRessecado12', $pr_caboRessecado12)->with('pr_defeitoComp12', $pr_defeitoComp12)->with('pr_conexaoTerm12', $pr_conexaoTerm12);
   }
}
//==========================================fim=================================================================

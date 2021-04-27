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

class RelGerResistencia extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
  */
  public function GeralPerfil() {

    $title = 'Perfil | GGOP PR';
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');

    // ============================================================ GGOP PR
    $manutencao = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 1)->count();
    $standBy = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 2)->count();
    $normal = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 3)->count();
    $alarme = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 4)->count();
    $critico = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 5)->count();

    if($manutencao == null){$manutencao = 0;}
    if($standBy == null){$standBy = 0;}
    if($normal == null){$normal = 0;}
    if($alarme == null){$alarme = 0;}
    if($critico == null){$critico = 0;}

    $sum = Preditiva_atividades::where('tecnicas_id', '=', 5)->count();
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

    $ura_manutencao = aux::GeralPorLinhaRM($atual1, 1, $ura_linha1, $ura_linha2);
    $ura_standBy = aux::GeralPorLinhaRM($atual1, 2, $ura_linha1, $ura_linha2);
    $ura_normal = aux::GeralPorLinhaRM($atual1, 3, $ura_linha1, $ura_linha2);
    $ura_alarme = aux::GeralPorLinhaRM($atual1, 4, $ura_linha1, $ura_linha2);
    $ura_critico = aux::GeralPorLinhaRM($atual1, 5, $ura_linha1, $ura_linha2);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 5)
               ->count('preditiva_atividades.id');

    $ura_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',0)
               ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

    $lds_manutencao = aux::GeralPorLinhaRM($atual1, 1, $lds_linha1, $lds_linha2);
    $lds_standBy = aux::GeralPorLinhaRM($atual1, 2, $lds_linha1, $lds_linha2);
    $lds_normal = aux::GeralPorLinhaRM($atual1, 3, $lds_linha1, $lds_linha2);
    $lds_alarme = aux::GeralPorLinhaRM($atual1, 4, $lds_linha1, $lds_linha2);
    $lds_critico = aux::GeralPorLinhaRM($atual1, 5, $lds_linha1, $lds_linha2);
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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
                ->count('preditiva_atividades.id');

    $lds_sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 22)
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

    $lrf_manutencao = aux::GeralPorLinhaRM($atual1, 1, $lrf_linha1, $lrf_linha2);
    $lrf_standBy = aux::GeralPorLinhaRM($atual1, 2, $lrf_linha1, $lrf_linha2);
    $lrf_normal = aux::GeralPorLinhaRM($atual1, 3, $lrf_linha1, $lrf_linha2);
    $lrf_alarme = aux::GeralPorLinhaRM($atual1, 4, $lrf_linha1, $lrf_linha2);
    $lrf_critico = aux::GeralPorLinhaRM($atual1, 5, $lrf_linha1, $lrf_linha2);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 5)
               ->count('preditiva_atividades.id');

    $lrf_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=', 0)
               ->where('preditiva_atividades.tecnicas_id', '=', 5)
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
    $uti_manutencao = aux::GeralPorLinha2RM($atual1, 1, $uti_parent);
    $uti_standBy = aux::GeralPorLinha2RM($atual1, 2, $uti_parent);
    $uti_normal = aux::GeralPorLinha2RM($atual1, 3, $uti_parent);
    $uti_alarme = aux::GeralPorLinha2RM($atual1, 4, $uti_parent);
    $uti_critico = aux::GeralPorLinha2RM($atual1, 5, $uti_parent);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

    $lgc_manutencao = aux::GeralPorLinhaRM($atual1, 1, $lgc_linha1, $lgc_linha2);
    $lgc_standBy = aux::GeralPorLinhaRM($atual1, 2, $lgc_linha1, $lgc_linha2);
    $lgc_normal = aux::GeralPorLinhaRM($atual1, 3, $lgc_linha1, $lgc_linha2);
    $lgc_alarme = aux::GeralPorLinhaRM($atual1, 4, $lgc_linha1, $lgc_linha2);
    $lgc_critico = aux::GeralPorLinhaRM($atual1, 5, $lgc_linha1, $lgc_linha2);
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
              ->where('preditiva_atividades.tecnicas_id', '=', 5)
              ->count('preditiva_atividades.id');

    $lgc_sum2 = DB::table('preditiva_atividades')
              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
              ->where('negocios.id','=',0)
              ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

    $lpc_manutencao = aux::GeralPorLinhaRM($atual1, 1, $lpc_linha1, $lpc_linha2);
    $lpc_standBy = aux::GeralPorLinhaRM($atual1, 2, $lpc_linha1, $lpc_linha2);
    $lpc_normal = aux::GeralPorLinhaRM($atual1, 3, $lpc_linha1, $lpc_linha2);
    $lpc_alarme = aux::GeralPorLinhaRM($atual1, 4, $lpc_linha1, $lpc_linha2);
    $lpc_critico = aux::GeralPorLinhaRM($atual1, 5, $lpc_linha1, $lpc_linha2);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 5)
               ->count('preditiva_atividades.id');

   $lpc_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',0)
               ->where('preditiva_atividades.tecnicas_id', '=', 5)
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
   $cs_manutencao = aux::GeralPorLinha2RM($atual1, 1, $cs_parent);
   $cs_standBy = aux::GeralPorLinha2RM($atual1, 2, $cs_parent);
   $cs_normal = aux::GeralPorLinha2RM($atual1, 3, $cs_parent);
   $cs_alarme = aux::GeralPorLinha2RM($atual1, 4, $cs_parent);
   $cs_critico = aux::GeralPorLinha2RM($atual1, 5, $cs_parent);
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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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
    $pr_manutencao = aux::GeralPorLinha2RM($atual1, 1, $pr_parent);
    $pr_standBy = aux::GeralPorLinha2RM($atual1, 2, $pr_parent);
    $pr_normal = aux::GeralPorLinha2RM($atual1, 3, $pr_parent);
    $pr_alarme = aux::GeralPorLinha2RM($atual1, 4, $pr_parent);
    $pr_critico = aux::GeralPorLinha2RM($atual1, 5, $pr_parent);
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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
    $tabela = aux::GeralAnormalidadesRM($atual1)->where('status_id', '>', 3);
    $indice_tg = 0;
    $tb_anormalidades[0] = (['indice_tg' => $indice_tg,
                              'data' => $atual1,
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
    $tabela_normal = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 3);
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
    $tabela_alarme = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 4);
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
    $tabela_critico = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 5);
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
    $tabela_manutencao = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 1);
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
    $tabela_standBy = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 2);
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

    $normal1 = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 3)->count();
    $alarme1 = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 4)->count();
    $critico1 = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 5)->count();
    $normal2 = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 3)->count();
    $alarme2 = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 4)->count();
    $critico2 = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 5)->count();
    $normal3 = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 3)->count();
    $alarme3 = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 4)->count();
    $critico3 = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 5)->count();
    $normal4 = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 3)->count();
    $alarme4 = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 4)->count();
    $critico4 = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 5)->count();
    $normal5 = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 3)->count();
    $alarme5 = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 4)->count();
    $critico5 = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 5)->count();
    $normal6 = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 3)->count();
    $alarme6 = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 4)->count();
    $critico6 = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 5)->count();
    $normal7 = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 3)->count();
    $alarme7 = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 4)->count();
    $critico7 = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 5)->count();
    $normal8 = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 3)->count();
    $alarme8 = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 4)->count();
    $critico8 = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 5)->count();
    $normal9 = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 3)->count();
    $alarme9 = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 4)->count();
    $critico9 = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 5)->count();
    $normal10 = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 3)->count();
    $alarme10 = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 4)->count();
    $critico10 = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 5)->count();
    $normal11 = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 3)->count();
    $alarme11 = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 4)->count();
    $critico11 = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 5)->count();
    $normal12 = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 3)->count();
    $alarme12 = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 4)->count();
    $critico12 = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 5)->count();

// ============================================================ STATUS DOS PONTOS
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

    $umidade1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

    $umidade2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

    $umidade3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

    $umidade4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

    $umidade5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 27)->count('diagnostico_id');


    $umidade6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 27)->count('diagnostico_id');


    $umidade7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 27)->count('diagnostico_id');


    $umidade8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

    $umidade9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

    $umidade10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

    $umidade11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

    $umidade12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
    $sujeira12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
    $curto_espiras12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
    $cabo12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
    $umidade_sujeira12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
    $isolamento_danificado12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     return view('csn.relatorioGerencial.includes.indexRelGerRM')->with('title', $title)->with('sum', $sum)
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
                           ->with('umidade1', $umidade1)->with('sujeira1', $sujeira1)->with('curto_espiras1', $curto_espiras1)->with('cabo1', $cabo1)->with('umidade_sujeira1', $umidade_sujeira1)->with('isolamento_danificado1', $isolamento_danificado1)
                           ->with('umidade2', $umidade2)->with('sujeira2', $sujeira2)->with('curto_espiras2', $curto_espiras2)->with('cabo2', $cabo2)->with('umidade_sujeira2', $umidade_sujeira2)->with('isolamento_danificado2', $isolamento_danificado2)
                           ->with('umidade3', $umidade3)->with('sujeira3', $sujeira3)->with('curto_espiras3', $curto_espiras3)->with('cabo3', $cabo3)->with('umidade_sujeira3', $umidade_sujeira3)->with('isolamento_danificado3', $isolamento_danificado3)
                           ->with('umidade4', $umidade4)->with('sujeira4', $sujeira4)->with('curto_espiras4', $curto_espiras4)->with('cabo4', $cabo4)->with('umidade_sujeira4', $umidade_sujeira4)->with('isolamento_danificado4', $isolamento_danificado4)
                           ->with('umidade5', $umidade5)->with('sujeira5', $sujeira5)->with('curto_espiras5', $curto_espiras5)->with('cabo5', $cabo5)->with('umidade_sujeira5', $umidade_sujeira5)->with('isolamento_danificado5', $isolamento_danificado5)
                           ->with('umidade6', $umidade6)->with('sujeira6', $sujeira6)->with('curto_espiras6', $curto_espiras6)->with('cabo6', $cabo6)->with('umidade_sujeira6', $umidade_sujeira6)->with('isolamento_danificado6', $isolamento_danificado6)
                           ->with('umidade7', $umidade7)->with('sujeira7', $sujeira7)->with('curto_espiras7', $curto_espiras7)->with('cabo7', $cabo7)->with('umidade_sujeira7', $umidade_sujeira7)->with('isolamento_danificado7', $isolamento_danificado7)
                           ->with('umidade8', $umidade8)->with('sujeira8', $sujeira8)->with('curto_espiras8', $curto_espiras8)->with('cabo8', $cabo8)->with('umidade_sujeira8', $umidade_sujeira8)->with('isolamento_danificado8', $isolamento_danificado8)
                           ->with('umidade9', $umidade9)->with('sujeira9', $sujeira9)->with('curto_espiras9', $curto_espiras9)->with('cabo9', $cabo9)->with('umidade_sujeira9', $umidade_sujeira9)->with('isolamento_danificado9', $isolamento_danificado9)
                           ->with('umidade10', $umidade10)->with('sujeira10', $sujeira10)->with('curto_espiras10', $curto_espiras10)->with('cabo10', $cabo10)->with('umidade_sujeira10', $umidade_sujeira10)->with('isolamento_danificado10', $isolamento_danificado10)
                           ->with('umidade11', $umidade11)->with('sujeira11', $sujeira11)->with('curto_espiras11', $curto_espiras11)->with('cabo11', $cabo11)->with('umidade_sujeira11', $umidade_sujeira11)->with('isolamento_danificado11', $isolamento_danificado11)
                           ->with('umidade12', $umidade12)->with('sujeira12', $sujeira12)->with('curto_espiras12', $curto_espiras12)->with('cabo12', $cabo12)->with('umidade_sujeira12', $umidade_sujeira12)->with('isolamento_danificado12', $isolamento_danificado12);
  }

   public function GeralStatusDosPontos() {

     $title = 'Status Pontos | GGOP PR';
     $sum = Preditiva_atividades::where('tecnicas_id', '=', 5)->count();
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

     $normal1 = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 3)->count();
     $alarme1 = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 4)->count();
     $critico1 = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 5)->count();
     $normal2 = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 3)->count();
     $alarme2 = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 4)->count();
     $critico2 = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 5)->count();
     $normal3 = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 3)->count();
     $alarme3 = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 4)->count();
     $critico3 = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 5)->count();
     $normal4 = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 3)->count();
     $alarme4 = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 4)->count();
     $critico4 = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 5)->count();
     $normal5 = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 3)->count();
     $alarme5 = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 4)->count();
     $critico5 = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 5)->count();
     $normal6 = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 3)->count();
     $alarme6 = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 4)->count();
     $critico6 = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 5)->count();
     $normal7 = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 3)->count();
     $alarme7 = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 4)->count();
     $critico7 = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 5)->count();
     $normal8 = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 3)->count();
     $alarme8 = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 4)->count();
     $critico8 = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 5)->count();
     $normal9 = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 3)->count();
     $alarme9 = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 4)->count();
     $critico9 = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 5)->count();
     $normal10 = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 3)->count();
     $alarme10 = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 4)->count();
     $critico10 = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 5)->count();
     $normal11 = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 3)->count();
     $alarme11 = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 4)->count();
     $critico11 = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 5)->count();
     $normal12 = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 3)->count();
     $alarme12 = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 4)->count();
     $critico12 = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 5)->count();

     $manutencao = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 1)->count();
     $standBy = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 2)->count();
     $normal = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 3)->count();
     $alarme = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 4)->count();
     $critico = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 5)->count();

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

      return view('csn.relatorioGerencial.includes.relatoriosResistencia.ggoppr-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
     $sum = Preditiva_atividades::where('tecnicas_id', '=', 5)->count();
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


     $normal1 = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 3)->count();
     $alarme1P = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 4)->count();
     $critico1P = aux::GeralAnormalidadesRM($atual1)->where('status_id', '=', 5)->count();
     $normal2 = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 3)->count();
     $alarme2P = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 4)->count();
     $critico2P = aux::GeralAnormalidadesRM($atual2)->where('status_id', '=', 5)->count();
     $normal3 = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 3)->count();
     $alarme3P = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 4)->count();
     $critico3P = aux::GeralAnormalidadesRM($atual3)->where('status_id', '=', 5)->count();
     $normal4 = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 3)->count();
     $alarme4P = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 4)->count();
     $critico4P = aux::GeralAnormalidadesRM($atual4)->where('status_id', '=', 5)->count();
     $normal5 = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 3)->count();
     $alarme5P = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 4)->count();
     $critico5P = aux::GeralAnormalidadesRM($atual5)->where('status_id', '=', 5)->count();
     $normal6 = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 3)->count();
     $alarme6P = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 4)->count();
     $critico6P = aux::GeralAnormalidadesRM($atual6)->where('status_id', '=', 5)->count();
     $normal7 = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 3)->count();
     $alarme7P = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 4)->count();
     $critico7P = aux::GeralAnormalidadesRM($atual7)->where('status_id', '=', 5)->count();
     $normal8 = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 3)->count();
     $alarme8P = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 4)->count();
     $critico8P = aux::GeralAnormalidadesRM($atual8)->where('status_id', '=', 5)->count();
     $normal9 = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 3)->count();
     $alarme9P = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 4)->count();
     $critico9P = aux::GeralAnormalidadesRM($atual9)->where('status_id', '=', 5)->count();
     $normal10 = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 3)->count();
     $alarme10P = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 4)->count();
     $critico10P = aux::GeralAnormalidadesRM($atual10)->where('status_id', '=', 5)->count();
     $normal11 = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 3)->count();
     $alarme11P = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 4)->count();
     $critico11P = aux::GeralAnormalidadesRM($atual11)->where('status_id', '=', 5)->count();
     $normal12 = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 3)->count();
     $alarme12P = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 4)->count();
     $critico12P = aux::GeralAnormalidadesRM($atual12)->where('status_id', '=', 5)->count();

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

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.ggoppr-anormalidades')
            ->with('title', $title)->with('sum', $sum)
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
     $sum = Preditiva_atividades::where('tecnicas_id', '=', 5)->count();
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

     $umidade1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado1 = aux::GeralAnormalidadesRM($atual1)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     $umidade2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado2 = aux::GeralAnormalidadesRM($atual2)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     $umidade3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado3 = aux::GeralAnormalidadesRM($atual3)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     $umidade4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado4 = aux::GeralAnormalidadesRM($atual4)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     $umidade5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado5 = aux::GeralAnormalidadesRM($atual5)->where('diagnostico_id', '=', 27)->count('diagnostico_id');


     $umidade6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado6 = aux::GeralAnormalidadesRM($atual6)->where('diagnostico_id', '=', 27)->count('diagnostico_id');


     $umidade7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado7 = aux::GeralAnormalidadesRM($atual7)->where('diagnostico_id', '=', 27)->count('diagnostico_id');


     $umidade8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado8 = aux::GeralAnormalidadesRM($atual8)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     $umidade9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado9 = aux::GeralAnormalidadesRM($atual9)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     $umidade10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado10 = aux::GeralAnormalidadesRM($atual10)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     $umidade11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado11 = aux::GeralAnormalidadesRM($atual11)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     $umidade12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 22)->count('diagnostico_id');
     $sujeira12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 23)->count('diagnostico_id');
     $curto_espiras12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 24)->count('diagnostico_id');
     $cabo12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 25)->count('diagnostico_id');
     $umidade_sujeira12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 26)->count('diagnostico_id');
     $isolamento_danificado12 = aux::GeralAnormalidadesRM($atual12)->where('diagnostico_id', '=', 27)->count('diagnostico_id');

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.ggoppr-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('umidade1', $umidade1)->with('sujeira1', $sujeira1)->with('curto_espiras1', $curto_espiras1)->with('cabo1', $cabo1)->with('umidade_sujeira1', $umidade_sujeira1)->with('isolamento_danificado1', $isolamento_danificado1)
       ->with('atualf2', $atualf2)->with('umidade2', $umidade2)->with('sujeira2', $sujeira2)->with('curto_espiras2', $curto_espiras2)->with('cabo2', $cabo2)->with('umidade_sujeira2', $umidade_sujeira2)->with('isolamento_danificado2', $isolamento_danificado2)
       ->with('atualf3', $atualf3)->with('umidade3', $umidade3)->with('sujeira3', $sujeira3)->with('curto_espiras3', $curto_espiras3)->with('cabo3', $cabo3)->with('umidade_sujeira3', $umidade_sujeira3)->with('isolamento_danificado3', $isolamento_danificado3)
       ->with('atualf4', $atualf4)->with('umidade4', $umidade4)->with('sujeira4', $sujeira4)->with('curto_espiras4', $curto_espiras4)->with('cabo4', $cabo4)->with('umidade_sujeira4', $umidade_sujeira4)->with('isolamento_danificado4', $isolamento_danificado4)
       ->with('atualf5', $atualf5)->with('umidade5', $umidade5)->with('sujeira5', $sujeira5)->with('curto_espiras5', $curto_espiras5)->with('cabo5', $cabo5)->with('umidade_sujeira5', $umidade_sujeira5)->with('isolamento_danificado5', $isolamento_danificado5)
       ->with('atualf6', $atualf6)->with('umidade6', $umidade6)->with('sujeira6', $sujeira6)->with('curto_espiras6', $curto_espiras6)->with('cabo6', $cabo6)->with('umidade_sujeira6', $umidade_sujeira6)->with('isolamento_danificado6', $isolamento_danificado6)
       ->with('atualf7', $atualf7)->with('umidade7', $umidade7)->with('sujeira7', $sujeira7)->with('curto_espiras7', $curto_espiras7)->with('cabo7', $cabo7)->with('umidade_sujeira7', $umidade_sujeira7)->with('isolamento_danificado7', $isolamento_danificado7)
       ->with('atualf8', $atualf8)->with('umidade8', $umidade8)->with('sujeira8', $sujeira8)->with('curto_espiras8', $curto_espiras8)->with('cabo8', $cabo8)->with('umidade_sujeira8', $umidade_sujeira8)->with('isolamento_danificado8', $isolamento_danificado8)
       ->with('atualf9', $atualf9)->with('umidade9', $umidade9)->with('sujeira9', $sujeira9)->with('curto_espiras9', $curto_espiras9)->with('cabo9', $cabo9)->with('umidade_sujeira9', $umidade_sujeira9)->with('isolamento_danificado9', $isolamento_danificado9)
       ->with('atualf10', $atualf10)->with('umidade10', $umidade10)->with('sujeira10', $sujeira10)->with('curto_espiras10', $curto_espiras10)->with('cabo10', $cabo10)->with('umidade_sujeira10', $umidade_sujeira10)->with('isolamento_danificado10', $isolamento_danificado10)
       ->with('atualf11', $atualf11)->with('umidade11', $umidade11)->with('sujeira11', $sujeira11)->with('curto_espiras11', $curto_espiras11)->with('cabo11', $cabo11)->with('umidade_sujeira11', $umidade_sujeira11)->with('isolamento_danificado11', $isolamento_danificado11)
       ->with('atualf12', $atualf12)->with('umidade12', $umidade12)->with('sujeira12', $sujeira12)->with('curto_espiras12', $curto_espiras12)->with('cabo12', $cabo12)->with('umidade_sujeira12', $umidade_sujeira12)->with('isolamento_danificado12', $isolamento_danificado12);
     }

   public function UraPerfil() {

     $title = 'Perfil | URA';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 11;
     $linha2 = 0;

     $ura_manutencao = aux::GeralPorLinhaRM($atual1, 1, $linha1, $linha2);
     $ura_standBy = aux::GeralPorLinhaRM($atual1, 2, $linha1, $linha2);
     $ura_normal = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $ura_alarme = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $ura_critico = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     return view('csn.relatorioGerencial.includes.indexRelGerRM_ura_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $ura_normal1 = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $ura_alarme1 = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $ura_critico1 = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

     $ura_normal2 = aux::GeralPorLinhaRM($atual2, 3, $linha1, $linha2);
     $ura_alarme2 = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $ura_critico2 = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);

     $ura_normal3 = aux::GeralPorLinhaRM($atual3, 3, $linha1, $linha2);
     $ura_alarme3 = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $ura_critico3 = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);

     $ura_normal4 = aux::GeralPorLinhaRM($atual4, 3, $linha1, $linha2);
     $ura_alarme4 = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $ura_critico4 = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);

     $ura_normal5 = aux::GeralPorLinhaRM($atual5, 3, $linha1, $linha2);
     $ura_alarme5 = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $ura_critico5 = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);

     $ura_normal6 = aux::GeralPorLinhaRM($atual6, 3, $linha1, $linha2);
     $ura_alarme6 = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $ura_critico6 = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);

     $ura_normal7 = aux::GeralPorLinhaRM($atual7, 3, $linha1, $linha2);
     $ura_alarme7 = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $ura_critico7 = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);

     $ura_normal8 = aux::GeralPorLinhaRM($atual8, 3, $linha1, $linha2);
     $ura_alarme8 = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $ura_critico8 = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);

     $ura_normal9 = aux::GeralPorLinhaRM($atual9, 3, $linha1, $linha2);
     $ura_alarme9 = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $ura_critico9 = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);

     $ura_normal10 = aux::GeralPorLinhaRM($atual10, 3, $linha1, $linha2);
     $ura_alarme10 = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $ura_critico10 = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);

     $ura_normal11 = aux::GeralPorLinhaRM($atual11, 3, $linha1, $linha2);
     $ura_alarme11 = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $ura_critico11 = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);

     $ura_normal12 = aux::GeralPorLinhaRM($atual12, 3, $linha1, $linha2);
     $ura_alarme12 = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $ura_critico12 = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.ura-status-dos-pontos')
                 ->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $alarme1P = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.ura-anormalidades')
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $ura_umidade1 = aux::GeralPorLinhaEDiagRM($atual1, 22, $linha1, $linha2);
     $ura_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 23, $linha1, $linha2);
     $ura_curto_espiras1 = aux::GeralPorLinhaEDiagRM($atual1, 24, $linha1, $linha2);
     $ura_cabo1 = aux::GeralPorLinhaEDiagRM($atual1, 25, $linha1, $linha2);
     $ura_umidade_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 26, $linha1, $linha2);
     $ura_isolamento_danificado1 = aux::GeralPorLinhaEDiagRM($atual1, 27, $linha1, $linha2);

     $ura_umidade2 = aux::GeralPorLinhaEDiagRM($atual2, 22, $linha1, $linha2);
     $ura_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 23, $linha1, $linha2);
     $ura_curto_espiras2 = aux::GeralPorLinhaEDiagRM($atual2, 24, $linha1, $linha2);
     $ura_cabo2 = aux::GeralPorLinhaEDiagRM($atual2, 25, $linha1, $linha2);
     $ura_umidade_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 26, $linha1, $linha2);
     $ura_isolamento_danificado2 = aux::GeralPorLinhaEDiagRM($atual2, 27, $linha1, $linha2);

     $ura_umidade3 = aux::GeralPorLinhaEDiagRM($atual3, 22, $linha1, $linha2);
     $ura_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 23, $linha1, $linha2);
     $ura_curto_espiras3 = aux::GeralPorLinhaEDiagRM($atual3, 24, $linha1, $linha2);
     $ura_cabo3 = aux::GeralPorLinhaEDiagRM($atual3, 25, $linha1, $linha2);
     $ura_umidade_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 26, $linha1, $linha2);
     $ura_isolamento_danificado3 = aux::GeralPorLinhaEDiagRM($atual3, 27, $linha1, $linha2);

     $ura_umidade4 = aux::GeralPorLinhaEDiagRM($atual4, 22, $linha1, $linha2);
     $ura_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 23, $linha1, $linha2);
     $ura_curto_espiras4 = aux::GeralPorLinhaEDiagRM($atual4, 24, $linha1, $linha2);
     $ura_cabo4 = aux::GeralPorLinhaEDiagRM($atual4, 25, $linha1, $linha2);
     $ura_umidade_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 26, $linha1, $linha2);
     $ura_isolamento_danificado4 = aux::GeralPorLinhaEDiagRM($atual4, 27, $linha1, $linha2);

     $ura_umidade5 = aux::GeralPorLinhaEDiagRM($atual5, 22, $linha1, $linha2);
     $ura_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 23, $linha1, $linha2);
     $ura_curto_espiras5 = aux::GeralPorLinhaEDiagRM($atual5, 24, $linha1, $linha2);
     $ura_cabo5 = aux::GeralPorLinhaEDiagRM($atual5, 25, $linha1, $linha2);
     $ura_umidade_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 26, $linha1, $linha2);
     $ura_isolamento_danificado5 = aux::GeralPorLinhaEDiagRM($atual5, 27, $linha1, $linha2);

     $ura_umidade6 = aux::GeralPorLinhaEDiagRM($atual6, 22, $linha1, $linha2);
     $ura_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 23, $linha1, $linha2);
     $ura_curto_espiras6 = aux::GeralPorLinhaEDiagRM($atual6, 24, $linha1, $linha2);
     $ura_cabo6 = aux::GeralPorLinhaEDiagRM($atual6, 25, $linha1, $linha2);
     $ura_umidade_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 26, $linha1, $linha2);
     $ura_isolamento_danificado6 = aux::GeralPorLinhaEDiagRM($atual6, 27, $linha1, $linha2);

     $ura_umidade7 = aux::GeralPorLinhaEDiagRM($atual7, 22, $linha1, $linha2);
     $ura_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 23, $linha1, $linha2);
     $ura_curto_espiras7 = aux::GeralPorLinhaEDiagRM($atual7, 24, $linha1, $linha2);
     $ura_cabo7 = aux::GeralPorLinhaEDiagRM($atual7, 25, $linha1, $linha2);
     $ura_umidade_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 26, $linha1, $linha2);
     $ura_isolamento_danificado7 = aux::GeralPorLinhaEDiagRM($atual7, 27, $linha1, $linha2);

     $ura_umidade8 = aux::GeralPorLinhaEDiagRM($atual8, 22, $linha1, $linha2);
     $ura_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 23, $linha1, $linha2);
     $ura_curto_espiras8 = aux::GeralPorLinhaEDiagRM($atual8, 24, $linha1, $linha2);
     $ura_cabo8 = aux::GeralPorLinhaEDiagRM($atual8, 25, $linha1, $linha2);
     $ura_umidade_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 26, $linha1, $linha2);
     $ura_isolamento_danificado8 = aux::GeralPorLinhaEDiagRM($atual8, 27, $linha1, $linha2);

     $ura_umidade9 = aux::GeralPorLinhaEDiagRM($atual9, 22, $linha1, $linha2);
     $ura_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 23, $linha1, $linha2);
     $ura_curto_espiras9 = aux::GeralPorLinhaEDiagRM($atual9, 24, $linha1, $linha2);
     $ura_cabo9 = aux::GeralPorLinhaEDiagRM($atual9, 25, $linha1, $linha2);
     $ura_umidade_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 26, $linha1, $linha2);
     $ura_isolamento_danificado9 = aux::GeralPorLinhaEDiagRM($atual9, 27, $linha1, $linha2);

     $ura_umidade10 = aux::GeralPorLinhaEDiagRM($atual10, 22, $linha1, $linha2);
     $ura_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 23, $linha1, $linha2);
     $ura_curto_espiras10 = aux::GeralPorLinhaEDiagRM($atual10, 24, $linha1, $linha2);
     $ura_cabo10 = aux::GeralPorLinhaEDiagRM($atual10, 25, $linha1, $linha2);
     $ura_umidade_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 26, $linha1, $linha2);
     $ura_isolamento_danificado10 = aux::GeralPorLinhaEDiagRM($atual10, 27, $linha1, $linha2);

     $ura_umidade11 = aux::GeralPorLinhaEDiagRM($atual11, 22, $linha1, $linha2);
     $ura_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 23, $linha1, $linha2);
     $ura_curto_espiras11 = aux::GeralPorLinhaEDiagRM($atual11, 24, $linha1, $linha2);
     $ura_cabo11 = aux::GeralPorLinhaEDiagRM($atual11, 25, $linha1, $linha2);
     $ura_umidade_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 26, $linha1, $linha2);
     $ura_isolamento_danificado11 = aux::GeralPorLinhaEDiagRM($atual11, 27, $linha1, $linha2);

     $ura_umidade12 = aux::GeralPorLinhaEDiagRM($atual12, 22, $linha1, $linha2);
     $ura_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 23, $linha1, $linha2);
     $ura_curto_espiras12 = aux::GeralPorLinhaEDiagRM($atual12, 24, $linha1, $linha2);
     $ura_cabo12 = aux::GeralPorLinhaEDiagRM($atual12, 25, $linha1, $linha2);
     $ura_umidade_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 26, $linha1, $linha2);
     $ura_isolamento_danificado12 = aux::GeralPorLinhaEDiagRM($atual12, 27, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.ura-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('ura_umidade1', $ura_umidade1)->with('ura_sujeira1', $ura_sujeira1)->with('ura_curto_espiras1', $ura_curto_espiras1)->with('ura_cabo1', $ura_cabo1)->with('ura_umidade_sujeira1', $ura_umidade_sujeira1)->with('ura_isolamento_danificado1', $ura_isolamento_danificado1)
       ->with('atualf2', $atualf2)->with('ura_umidade2', $ura_umidade2)->with('ura_sujeira2', $ura_sujeira2)->with('ura_curto_espiras2', $ura_curto_espiras2)->with('ura_cabo2', $ura_cabo2)->with('ura_umidade_sujeira2', $ura_umidade_sujeira2)->with('ura_isolamento_danificado2', $ura_isolamento_danificado2)
       ->with('atualf3', $atualf3)->with('ura_umidade3', $ura_umidade3)->with('ura_sujeira3', $ura_sujeira3)->with('ura_curto_espiras3', $ura_curto_espiras3)->with('ura_cabo3', $ura_cabo3)->with('ura_umidade_sujeira3', $ura_umidade_sujeira3)->with('ura_isolamento_danificado3', $ura_isolamento_danificado3)
       ->with('atualf4', $atualf4)->with('ura_umidade4', $ura_umidade4)->with('ura_sujeira4', $ura_sujeira4)->with('ura_curto_espiras4', $ura_curto_espiras4)->with('ura_cabo4', $ura_cabo4)->with('ura_umidade_sujeira4', $ura_umidade_sujeira4)->with('ura_isolamento_danificado4', $ura_isolamento_danificado4)
       ->with('atualf5', $atualf5)->with('ura_umidade5', $ura_umidade5)->with('ura_sujeira5', $ura_sujeira5)->with('ura_curto_espiras5', $ura_curto_espiras5)->with('ura_cabo5', $ura_cabo5)->with('ura_umidade_sujeira5', $ura_umidade_sujeira5)->with('ura_isolamento_danificado5', $ura_isolamento_danificado5)
       ->with('atualf6', $atualf6)->with('ura_umidade6', $ura_umidade6)->with('ura_sujeira6', $ura_sujeira6)->with('ura_curto_espiras6', $ura_curto_espiras6)->with('ura_cabo6', $ura_cabo6)->with('ura_umidade_sujeira6', $ura_umidade_sujeira6)->with('ura_isolamento_danificado6', $ura_isolamento_danificado6)
       ->with('atualf7', $atualf7)->with('ura_umidade7', $ura_umidade7)->with('ura_sujeira7', $ura_sujeira7)->with('ura_curto_espiras7', $ura_curto_espiras7)->with('ura_cabo7', $ura_cabo7)->with('ura_umidade_sujeira7', $ura_umidade_sujeira7)->with('ura_isolamento_danificado7', $ura_isolamento_danificado7)
       ->with('atualf8', $atualf8)->with('ura_umidade8', $ura_umidade8)->with('ura_sujeira8', $ura_sujeira8)->with('ura_curto_espiras8', $ura_curto_espiras8)->with('ura_cabo8', $ura_cabo8)->with('ura_umidade_sujeira8', $ura_umidade_sujeira8)->with('ura_isolamento_danificado8', $ura_isolamento_danificado8)
       ->with('atualf9', $atualf9)->with('ura_umidade9', $ura_umidade9)->with('ura_sujeira9', $ura_sujeira9)->with('ura_curto_espiras9', $ura_curto_espiras9)->with('ura_cabo9', $ura_cabo9)->with('ura_umidade_sujeira9', $ura_umidade_sujeira9)->with('ura_isolamento_danificado9', $ura_isolamento_danificado9)
       ->with('atualf10', $atualf10)->with('ura_umidade10', $ura_umidade10)->with('ura_sujeira10', $ura_sujeira10)->with('ura_curto_espiras10', $ura_curto_espiras10)->with('ura_cabo10', $ura_cabo10)->with('ura_umidade_sujeira10', $ura_umidade_sujeira10)->with('ura_isolamento_danificado10', $ura_isolamento_danificado10)
       ->with('atualf11', $atualf11)->with('ura_umidade11', $ura_umidade11)->with('ura_sujeira11', $ura_sujeira11)->with('ura_curto_espiras11', $ura_curto_espiras11)->with('ura_cabo11', $ura_cabo11)->with('ura_umidade_sujeira11', $ura_umidade_sujeira11)->with('ura_isolamento_danificado11', $ura_isolamento_danificado11)
       ->with('atualf12', $atualf12)->with('ura_umidade12', $ura_umidade12)->with('ura_sujeira12', $ura_sujeira12)->with('ura_curto_espiras12', $ura_curto_espiras12)->with('ura_cabo12', $ura_cabo12)->with('ura_umidade_sujeira12', $ura_umidade_sujeira12)->with('ura_isolamento_danificado12', $ura_isolamento_danificado12);
   }

   public function LdsPerfil() {

     $title = 'Perfil | LDS';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 10;
     $linha2 = 22;

     $lds_manutencao = aux::GeralPorLinhaRM($atual1, 1, $linha1, $linha2);
     $lds_standBy = aux::GeralPorLinhaRM($atual1, 2, $linha1, $linha2);
     $lds_normal = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $lds_alarme = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $lds_critico = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 22)
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

      return view('csn.relatorioGerencial.includes.indexRelGerRM_lds_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $lds_normal1 = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $lds_alarme1 = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $lds_critico1 = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

     $lds_normal2 = aux::GeralPorLinhaRM($atual2, 3, $linha1, $linha2);
     $lds_alarme2 = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $lds_critico2 = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);

     $lds_normal3 = aux::GeralPorLinhaRM($atual3, 3, $linha1, $linha2);
     $lds_alarme3 = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $lds_critico3 = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);

     $lds_normal4 = aux::GeralPorLinhaRM($atual4, 3, $linha1, $linha2);
     $lds_alarme4 = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $lds_critico4 = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);

     $lds_normal5 = aux::GeralPorLinhaRM($atual5, 3, $linha1, $linha2);
     $lds_alarme5 = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $lds_critico5 = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);

     $lds_normal6 = aux::GeralPorLinhaRM($atual6, 3, $linha1, $linha2);
     $lds_alarme6 = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $lds_critico6 = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);

     $lds_normal7 = aux::GeralPorLinhaRM($atual7, 3, $linha1, $linha2);
     $lds_alarme7 = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $lds_critico7 = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);

     $lds_normal8 = aux::GeralPorLinhaRM($atual8, 3, $linha1, $linha2);
     $lds_alarme8 = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $lds_critico8 = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);

     $lds_normal9 = aux::GeralPorLinhaRM($atual9, 3, $linha1, $linha2);
     $lds_alarme9 = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $lds_critico9 = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);

     $lds_normal10 = aux::GeralPorLinhaRM($atual10, 3, $linha1, $linha2);
     $lds_alarme10 = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $lds_critico10 = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);

     $lds_normal11 = aux::GeralPorLinhaRM($atual11, 3, $linha1, $linha2);
     $lds_alarme11 = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $lds_critico11 = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);

     $lds_normal12 = aux::GeralPorLinhaRM($atual12, 3, $linha1, $linha2);
     $lds_alarme12 = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $lds_critico12 = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lds-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $alarme1P = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lds-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $lds_umidade1 = aux::GeralPorLinhaEDiagRM($atual1, 22, $linha1, $linha2);
     $lds_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 23, $linha1, $linha2);
     $lds_curto_espiras1 = aux::GeralPorLinhaEDiagRM($atual1, 24, $linha1, $linha2);
     $lds_cabo1 = aux::GeralPorLinhaEDiagRM($atual1, 25, $linha1, $linha2);
     $lds_umidade_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 26, $linha1, $linha2);
     $lds_isolamento_danificado1 = aux::GeralPorLinhaEDiagRM($atual1, 27, $linha1, $linha2);

     $lds_umidade2 = aux::GeralPorLinhaEDiagRM($atual2, 22, $linha1, $linha2);
     $lds_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 23, $linha1, $linha2);
     $lds_curto_espiras2 = aux::GeralPorLinhaEDiagRM($atual2, 24, $linha1, $linha2);
     $lds_cabo2 = aux::GeralPorLinhaEDiagRM($atual2, 25, $linha1, $linha2);
     $lds_umidade_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 26, $linha1, $linha2);
     $lds_isolamento_danificado2 = aux::GeralPorLinhaEDiagRM($atual2, 27, $linha1, $linha2);

     $lds_umidade3 = aux::GeralPorLinhaEDiagRM($atual3, 22, $linha1, $linha2);
     $lds_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 23, $linha1, $linha2);
     $lds_curto_espiras3 = aux::GeralPorLinhaEDiagRM($atual3, 24, $linha1, $linha2);
     $lds_cabo3 = aux::GeralPorLinhaEDiagRM($atual3, 25, $linha1, $linha2);
     $lds_umidade_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 26, $linha1, $linha2);
     $lds_isolamento_danificado3 = aux::GeralPorLinhaEDiagRM($atual3, 27, $linha1, $linha2);

     $lds_umidade4 = aux::GeralPorLinhaEDiagRM($atual4, 22, $linha1, $linha2);
     $lds_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 23, $linha1, $linha2);
     $lds_curto_espiras4 = aux::GeralPorLinhaEDiagRM($atual4, 24, $linha1, $linha2);
     $lds_cabo4 = aux::GeralPorLinhaEDiagRM($atual4, 25, $linha1, $linha2);
     $lds_umidade_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 26, $linha1, $linha2);
     $lds_isolamento_danificado4 = aux::GeralPorLinhaEDiagRM($atual4, 27, $linha1, $linha2);

     $lds_umidade5 = aux::GeralPorLinhaEDiagRM($atual5, 22, $linha1, $linha2);
     $lds_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 23, $linha1, $linha2);
     $lds_curto_espiras5 = aux::GeralPorLinhaEDiagRM($atual5, 24, $linha1, $linha2);
     $lds_cabo5 = aux::GeralPorLinhaEDiagRM($atual5, 25, $linha1, $linha2);
     $lds_umidade_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 26, $linha1, $linha2);
     $lds_isolamento_danificado5 = aux::GeralPorLinhaEDiagRM($atual5, 27, $linha1, $linha2);

     $lds_umidade6 = aux::GeralPorLinhaEDiagRM($atual6, 22, $linha1, $linha2);
     $lds_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 23, $linha1, $linha2);
     $lds_curto_espiras6 = aux::GeralPorLinhaEDiagRM($atual6, 24, $linha1, $linha2);
     $lds_cabo6 = aux::GeralPorLinhaEDiagRM($atual6, 25, $linha1, $linha2);
     $lds_umidade_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 26, $linha1, $linha2);
     $lds_isolamento_danificado6 = aux::GeralPorLinhaEDiagRM($atual6, 27, $linha1, $linha2);

     $lds_umidade7 = aux::GeralPorLinhaEDiagRM($atual7, 22, $linha1, $linha2);
     $lds_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 23, $linha1, $linha2);
     $lds_curto_espiras7 = aux::GeralPorLinhaEDiagRM($atual7, 24, $linha1, $linha2);
     $lds_cabo7 = aux::GeralPorLinhaEDiagRM($atual7, 25, $linha1, $linha2);
     $lds_umidade_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 26, $linha1, $linha2);
     $lds_isolamento_danificado7 = aux::GeralPorLinhaEDiagRM($atual7, 27, $linha1, $linha2);

     $lds_umidade8 = aux::GeralPorLinhaEDiagRM($atual8, 22, $linha1, $linha2);
     $lds_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 23, $linha1, $linha2);
     $lds_curto_espiras8 = aux::GeralPorLinhaEDiagRM($atual8, 24, $linha1, $linha2);
     $lds_cabo8 = aux::GeralPorLinhaEDiagRM($atual8, 25, $linha1, $linha2);
     $lds_umidade_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 26, $linha1, $linha2);
     $lds_isolamento_danificado8 = aux::GeralPorLinhaEDiagRM($atual8, 27, $linha1, $linha2);

     $lds_umidade9 = aux::GeralPorLinhaEDiagRM($atual9, 22, $linha1, $linha2);
     $lds_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 23, $linha1, $linha2);
     $lds_curto_espiras9 = aux::GeralPorLinhaEDiagRM($atual9, 24, $linha1, $linha2);
     $lds_cabo9 = aux::GeralPorLinhaEDiagRM($atual9, 25, $linha1, $linha2);
     $lds_umidade_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 26, $linha1, $linha2);
     $lds_isolamento_danificado9 = aux::GeralPorLinhaEDiagRM($atual9, 27, $linha1, $linha2);

     $lds_umidade10 = aux::GeralPorLinhaEDiagRM($atual10, 22, $linha1, $linha2);
     $lds_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 23, $linha1, $linha2);
     $lds_curto_espiras10 = aux::GeralPorLinhaEDiagRM($atual10, 24, $linha1, $linha2);
     $lds_cabo10 = aux::GeralPorLinhaEDiagRM($atual10, 25, $linha1, $linha2);
     $lds_umidade_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 26, $linha1, $linha2);
     $lds_isolamento_danificado10 = aux::GeralPorLinhaEDiagRM($atual10, 27, $linha1, $linha2);

     $lds_umidade11 = aux::GeralPorLinhaEDiagRM($atual11, 22, $linha1, $linha2);
     $lds_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 23, $linha1, $linha2);
     $lds_curto_espiras11 = aux::GeralPorLinhaEDiagRM($atual11, 24, $linha1, $linha2);
     $lds_cabo11 = aux::GeralPorLinhaEDiagRM($atual11, 25, $linha1, $linha2);
     $lds_umidade_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 26, $linha1, $linha2);
     $lds_isolamento_danificado11 = aux::GeralPorLinhaEDiagRM($atual11, 27, $linha1, $linha2);

     $lds_umidade12 = aux::GeralPorLinhaEDiagRM($atual12, 22, $linha1, $linha2);
     $lds_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 23, $linha1, $linha2);
     $lds_curto_espiras12 = aux::GeralPorLinhaEDiagRM($atual12, 24, $linha1, $linha2);
     $lds_cabo12 = aux::GeralPorLinhaEDiagRM($atual12, 25, $linha1, $linha2);
     $lds_umidade_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 26, $linha1, $linha2);
     $lds_isolamento_danificado12 = aux::GeralPorLinhaEDiagRM($atual12, 27, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lds-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lds_umidade1', $lds_umidade1)->with('lds_sujeira1', $lds_sujeira1)->with('lds_curto_espiras1', $lds_curto_espiras1)->with('lds_cabo1', $lds_cabo1)->with('lds_umidade_sujeira1', $lds_umidade_sujeira1)->with('lds_isolamento_danificado1', $lds_isolamento_danificado1)
       ->with('atualf2', $atualf2)->with('lds_umidade2', $lds_umidade2)->with('lds_sujeira2', $lds_sujeira2)->with('lds_curto_espiras2', $lds_curto_espiras2)->with('lds_cabo2', $lds_cabo2)->with('lds_umidade_sujeira2', $lds_umidade_sujeira2)->with('lds_isolamento_danificado2', $lds_isolamento_danificado2)
       ->with('atualf3', $atualf3)->with('lds_umidade3', $lds_umidade3)->with('lds_sujeira3', $lds_sujeira3)->with('lds_curto_espiras3', $lds_curto_espiras3)->with('lds_cabo3', $lds_cabo3)->with('lds_umidade_sujeira3', $lds_umidade_sujeira3)->with('lds_isolamento_danificado3', $lds_isolamento_danificado3)
       ->with('atualf4', $atualf4)->with('lds_umidade4', $lds_umidade4)->with('lds_sujeira4', $lds_sujeira4)->with('lds_curto_espiras4', $lds_curto_espiras4)->with('lds_cabo4', $lds_cabo4)->with('lds_umidade_sujeira4', $lds_umidade_sujeira4)->with('lds_isolamento_danificado4', $lds_isolamento_danificado4)
       ->with('atualf5', $atualf5)->with('lds_umidade5', $lds_umidade5)->with('lds_sujeira5', $lds_sujeira5)->with('lds_curto_espiras5', $lds_curto_espiras5)->with('lds_cabo5', $lds_cabo5)->with('lds_umidade_sujeira5', $lds_umidade_sujeira5)->with('lds_isolamento_danificado5', $lds_isolamento_danificado5)
       ->with('atualf6', $atualf6)->with('lds_umidade6', $lds_umidade6)->with('lds_sujeira6', $lds_sujeira6)->with('lds_curto_espiras6', $lds_curto_espiras6)->with('lds_cabo6', $lds_cabo6)->with('lds_umidade_sujeira6', $lds_umidade_sujeira6)->with('lds_isolamento_danificado6', $lds_isolamento_danificado6)
       ->with('atualf7', $atualf7)->with('lds_umidade7', $lds_umidade7)->with('lds_sujeira7', $lds_sujeira7)->with('lds_curto_espiras7', $lds_curto_espiras7)->with('lds_cabo7', $lds_cabo7)->with('lds_umidade_sujeira7', $lds_umidade_sujeira7)->with('lds_isolamento_danificado7', $lds_isolamento_danificado7)
       ->with('atualf8', $atualf8)->with('lds_umidade8', $lds_umidade8)->with('lds_sujeira8', $lds_sujeira8)->with('lds_curto_espiras8', $lds_curto_espiras8)->with('lds_cabo8', $lds_cabo8)->with('lds_umidade_sujeira8', $lds_umidade_sujeira8)->with('lds_isolamento_danificado8', $lds_isolamento_danificado8)
       ->with('atualf9', $atualf9)->with('lds_umidade9', $lds_umidade9)->with('lds_sujeira9', $lds_sujeira9)->with('lds_curto_espiras9', $lds_curto_espiras9)->with('lds_cabo9', $lds_cabo9)->with('lds_umidade_sujeira9', $lds_umidade_sujeira9)->with('lds_isolamento_danificado9', $lds_isolamento_danificado9)
       ->with('atualf10', $atualf10)->with('lds_umidade10', $lds_umidade10)->with('lds_sujeira10', $lds_sujeira10)->with('lds_curto_espiras10', $lds_curto_espiras10)->with('lds_cabo10', $lds_cabo10)->with('lds_umidade_sujeira10', $lds_umidade_sujeira10)->with('lds_isolamento_danificado10', $lds_isolamento_danificado10)
       ->with('atualf11', $atualf11)->with('lds_umidade11', $lds_umidade11)->with('lds_sujeira11', $lds_sujeira11)->with('lds_curto_espiras11', $lds_curto_espiras11)->with('lds_cabo11', $lds_cabo11)->with('lds_umidade_sujeira11', $lds_umidade_sujeira11)->with('lds_isolamento_danificado11', $lds_isolamento_danificado11)
       ->with('atualf12', $atualf12)->with('lds_umidade12', $lds_umidade12)->with('lds_sujeira12', $lds_sujeira12)->with('lds_curto_espiras12', $lds_curto_espiras12)->with('lds_cabo12', $lds_cabo12)->with('lds_umidade_sujeira12', $lds_umidade_sujeira12)->with('lds_isolamento_danificado12', $lds_isolamento_danificado12);
   }

   public function LrfPerfil() {

     $title = 'Perfil | LRF';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 12;
     $linha2 = 0;

     $lrf_manutencao = aux::GeralPorLinhaRM($atual1, 1, $linha1, $linha2);
     $lrf_standBy = aux::GeralPorLinhaRM($atual1, 2, $linha1, $linha2);
     $lrf_normal = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $lrf_alarme = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $lrf_critico = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 0)
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

       return view('csn.relatorioGerencial.includes.indexRelGerRM_lrf_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $lrf_normal1 = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $lrf_alarme1 = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $lrf_critico1 = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

     $lrf_normal2 = aux::GeralPorLinhaRM($atual2, 3, $linha1, $linha2);
     $lrf_alarme2 = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $lrf_critico2 = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);

     $lrf_normal3 = aux::GeralPorLinhaRM($atual3, 3, $linha1, $linha2);
     $lrf_alarme3 = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $lrf_critico3 = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);

     $lrf_normal4 = aux::GeralPorLinhaRM($atual4, 3, $linha1, $linha2);
     $lrf_alarme4 = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $lrf_critico4 = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);

     $lrf_normal5 = aux::GeralPorLinhaRM($atual5, 3, $linha1, $linha2);
     $lrf_alarme5 = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $lrf_critico5 = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);

     $lrf_normal6 = aux::GeralPorLinhaRM($atual6, 3, $linha1, $linha2);
     $lrf_alarme6 = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $lrf_critico6 = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);

     $lrf_normal7 = aux::GeralPorLinhaRM($atual7, 3, $linha1, $linha2);
     $lrf_alarme7 = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $lrf_critico7 = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);

     $lrf_normal8 = aux::GeralPorLinhaRM($atual8, 3, $linha1, $linha2);
     $lrf_alarme8 = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $lrf_critico8 = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);

     $lrf_normal9 = aux::GeralPorLinhaRM($atual9, 3, $linha1, $linha2);
     $lrf_alarme9 = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $lrf_critico9 = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);

     $lrf_normal10 = aux::GeralPorLinhaRM($atual10, 3, $linha1, $linha2);
     $lrf_alarme10 = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $lrf_critico10 = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);

     $lrf_normal11 = aux::GeralPorLinhaRM($atual11, 3, $linha1, $linha2);
     $lrf_alarme11 = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $lrf_critico11 = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);

     $lrf_normal12 = aux::GeralPorLinhaRM($atual12, 3, $linha1, $linha2);
     $lrf_alarme12 = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $lrf_critico12 = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lrf-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $alarme1P = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lrf-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $lrf_umidade1 = aux::GeralPorLinhaEDiagRM($atual1, 22, $linha1, $linha2);
     $lrf_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 23, $linha1, $linha2);
     $lrf_curto_espiras1 = aux::GeralPorLinhaEDiagRM($atual1, 24, $linha1, $linha2);
     $lrf_cabo1 = aux::GeralPorLinhaEDiagRM($atual1, 25, $linha1, $linha2);
     $lrf_umidade_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 26, $linha1, $linha2);
     $lrf_isolamento_danificado1 = aux::GeralPorLinhaEDiagRM($atual1, 27, $linha1, $linha2);

     $lrf_umidade2 = aux::GeralPorLinhaEDiagRM($atual2, 22, $linha1, $linha2);
     $lrf_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 23, $linha1, $linha2);
     $lrf_curto_espiras2 = aux::GeralPorLinhaEDiagRM($atual2, 24, $linha1, $linha2);
     $lrf_cabo2 = aux::GeralPorLinhaEDiagRM($atual2, 25, $linha1, $linha2);
     $lrf_umidade_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 26, $linha1, $linha2);
     $lrf_isolamento_danificado2 = aux::GeralPorLinhaEDiagRM($atual2, 27, $linha1, $linha2);

     $lrf_umidade3 = aux::GeralPorLinhaEDiagRM($atual3, 22, $linha1, $linha2);
     $lrf_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 23, $linha1, $linha2);
     $lrf_curto_espiras3 = aux::GeralPorLinhaEDiagRM($atual3, 24, $linha1, $linha2);
     $lrf_cabo3 = aux::GeralPorLinhaEDiagRM($atual3, 25, $linha1, $linha2);
     $lrf_umidade_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 26, $linha1, $linha2);
     $lrf_isolamento_danificado3 = aux::GeralPorLinhaEDiagRM($atual3, 27, $linha1, $linha2);

     $lrf_umidade4 = aux::GeralPorLinhaEDiagRM($atual4, 22, $linha1, $linha2);
     $lrf_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 23, $linha1, $linha2);
     $lrf_curto_espiras4 = aux::GeralPorLinhaEDiagRM($atual4, 24, $linha1, $linha2);
     $lrf_cabo4 = aux::GeralPorLinhaEDiagRM($atual4, 25, $linha1, $linha2);
     $lrf_umidade_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 26, $linha1, $linha2);
     $lrf_isolamento_danificado4 = aux::GeralPorLinhaEDiagRM($atual4, 27, $linha1, $linha2);

     $lrf_umidade5 = aux::GeralPorLinhaEDiagRM($atual5, 22, $linha1, $linha2);
     $lrf_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 23, $linha1, $linha2);
     $lrf_curto_espiras5 = aux::GeralPorLinhaEDiagRM($atual5, 24, $linha1, $linha2);
     $lrf_cabo5 = aux::GeralPorLinhaEDiagRM($atual5, 25, $linha1, $linha2);
     $lrf_umidade_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 26, $linha1, $linha2);
     $lrf_isolamento_danificado5 = aux::GeralPorLinhaEDiagRM($atual5, 27, $linha1, $linha2);

     $lrf_umidade6 = aux::GeralPorLinhaEDiagRM($atual6, 22, $linha1, $linha2);
     $lrf_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 23, $linha1, $linha2);
     $lrf_curto_espiras6 = aux::GeralPorLinhaEDiagRM($atual6, 24, $linha1, $linha2);
     $lrf_cabo6 = aux::GeralPorLinhaEDiagRM($atual6, 25, $linha1, $linha2);
     $lrf_umidade_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 26, $linha1, $linha2);
     $lrf_isolamento_danificado6 = aux::GeralPorLinhaEDiagRM($atual6, 27, $linha1, $linha2);

     $lrf_umidade7 = aux::GeralPorLinhaEDiagRM($atual7, 22, $linha1, $linha2);
     $lrf_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 23, $linha1, $linha2);
     $lrf_curto_espiras7 = aux::GeralPorLinhaEDiagRM($atual7, 24, $linha1, $linha2);
     $lrf_cabo7 = aux::GeralPorLinhaEDiagRM($atual7, 25, $linha1, $linha2);
     $lrf_umidade_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 26, $linha1, $linha2);
     $lrf_isolamento_danificado7 = aux::GeralPorLinhaEDiagRM($atual7, 27, $linha1, $linha2);

     $lrf_umidade8 = aux::GeralPorLinhaEDiagRM($atual8, 22, $linha1, $linha2);
     $lrf_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 23, $linha1, $linha2);
     $lrf_curto_espiras8 = aux::GeralPorLinhaEDiagRM($atual8, 24, $linha1, $linha2);
     $lrf_cabo8 = aux::GeralPorLinhaEDiagRM($atual8, 25, $linha1, $linha2);
     $lrf_umidade_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 26, $linha1, $linha2);
     $lrf_isolamento_danificado8 = aux::GeralPorLinhaEDiagRM($atual8, 27, $linha1, $linha2);

     $lrf_umidade9 = aux::GeralPorLinhaEDiagRM($atual9, 22, $linha1, $linha2);
     $lrf_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 23, $linha1, $linha2);
     $lrf_curto_espiras9 = aux::GeralPorLinhaEDiagRM($atual9, 24, $linha1, $linha2);
     $lrf_cabo9 = aux::GeralPorLinhaEDiagRM($atual9, 25, $linha1, $linha2);
     $lrf_umidade_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 26, $linha1, $linha2);
     $lrf_isolamento_danificado9 = aux::GeralPorLinhaEDiagRM($atual9, 27, $linha1, $linha2);

     $lrf_umidade10 = aux::GeralPorLinhaEDiagRM($atual10, 22, $linha1, $linha2);
     $lrf_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 23, $linha1, $linha2);
     $lrf_curto_espiras10 = aux::GeralPorLinhaEDiagRM($atual10, 24, $linha1, $linha2);
     $lrf_cabo10 = aux::GeralPorLinhaEDiagRM($atual10, 25, $linha1, $linha2);
     $lrf_umidade_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 26, $linha1, $linha2);
     $lrf_isolamento_danificado10 = aux::GeralPorLinhaEDiagRM($atual10, 27, $linha1, $linha2);

     $lrf_umidade11 = aux::GeralPorLinhaEDiagRM($atual11, 22, $linha1, $linha2);
     $lrf_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 23, $linha1, $linha2);
     $lrf_curto_espiras11 = aux::GeralPorLinhaEDiagRM($atual11, 24, $linha1, $linha2);
     $lrf_cabo11 = aux::GeralPorLinhaEDiagRM($atual11, 25, $linha1, $linha2);
     $lrf_umidade_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 26, $linha1, $linha2);
     $lrf_isolamento_danificado11 = aux::GeralPorLinhaEDiagRM($atual11, 27, $linha1, $linha2);

     $lrf_umidade12 = aux::GeralPorLinhaEDiagRM($atual12, 22, $linha1, $linha2);
     $lrf_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 23, $linha1, $linha2);
     $lrf_curto_espiras12 = aux::GeralPorLinhaEDiagRM($atual12, 24, $linha1, $linha2);
     $lrf_cabo12 = aux::GeralPorLinhaEDiagRM($atual12, 25, $linha1, $linha2);
     $lrf_umidade_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 26, $linha1, $linha2);
     $lrf_isolamento_danificado12 = aux::GeralPorLinhaEDiagRM($atual12, 27, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lrf-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lrf_umidade1', $lrf_umidade1)->with('lrf_sujeira1', $lrf_sujeira1)->with('lrf_curto_espiras1', $lrf_curto_espiras1)->with('lrf_cabo1', $lrf_cabo1)->with('lrf_umidade_sujeira1', $lrf_umidade_sujeira1)->with('lrf_isolamento_danificado1', $lrf_isolamento_danificado1)
       ->with('atualf2', $atualf2)->with('lrf_umidade2', $lrf_umidade2)->with('lrf_sujeira2', $lrf_sujeira2)->with('lrf_curto_espiras2', $lrf_curto_espiras2)->with('lrf_cabo2', $lrf_cabo2)->with('lrf_umidade_sujeira2', $lrf_umidade_sujeira2)->with('lrf_isolamento_danificado2', $lrf_isolamento_danificado2)
       ->with('atualf3', $atualf3)->with('lrf_umidade3', $lrf_umidade3)->with('lrf_sujeira3', $lrf_sujeira3)->with('lrf_curto_espiras3', $lrf_curto_espiras3)->with('lrf_cabo3', $lrf_cabo3)->with('lrf_umidade_sujeira3', $lrf_umidade_sujeira3)->with('lrf_isolamento_danificado3', $lrf_isolamento_danificado3)
       ->with('atualf4', $atualf4)->with('lrf_umidade4', $lrf_umidade4)->with('lrf_sujeira4', $lrf_sujeira4)->with('lrf_curto_espiras4', $lrf_curto_espiras4)->with('lrf_cabo4', $lrf_cabo4)->with('lrf_umidade_sujeira4', $lrf_umidade_sujeira4)->with('lrf_isolamento_danificado4', $lrf_isolamento_danificado4)
       ->with('atualf5', $atualf5)->with('lrf_umidade5', $lrf_umidade5)->with('lrf_sujeira5', $lrf_sujeira5)->with('lrf_curto_espiras5', $lrf_curto_espiras5)->with('lrf_cabo5', $lrf_cabo5)->with('lrf_umidade_sujeira5', $lrf_umidade_sujeira5)->with('lrf_isolamento_danificado5', $lrf_isolamento_danificado5)
       ->with('atualf6', $atualf6)->with('lrf_umidade6', $lrf_umidade6)->with('lrf_sujeira6', $lrf_sujeira6)->with('lrf_curto_espiras6', $lrf_curto_espiras6)->with('lrf_cabo6', $lrf_cabo6)->with('lrf_umidade_sujeira6', $lrf_umidade_sujeira6)->with('lrf_isolamento_danificado6', $lrf_isolamento_danificado6)
       ->with('atualf7', $atualf7)->with('lrf_umidade7', $lrf_umidade7)->with('lrf_sujeira7', $lrf_sujeira7)->with('lrf_curto_espiras7', $lrf_curto_espiras7)->with('lrf_cabo7', $lrf_cabo7)->with('lrf_umidade_sujeira7', $lrf_umidade_sujeira7)->with('lrf_isolamento_danificado7', $lrf_isolamento_danificado7)
       ->with('atualf8', $atualf8)->with('lrf_umidade8', $lrf_umidade8)->with('lrf_sujeira8', $lrf_sujeira8)->with('lrf_curto_espiras8', $lrf_curto_espiras8)->with('lrf_cabo8', $lrf_cabo8)->with('lrf_umidade_sujeira8', $lrf_umidade_sujeira8)->with('lrf_isolamento_danificado8', $lrf_isolamento_danificado8)
       ->with('atualf9', $atualf9)->with('lrf_umidade9', $lrf_umidade9)->with('lrf_sujeira9', $lrf_sujeira9)->with('lrf_curto_espiras9', $lrf_curto_espiras9)->with('lrf_cabo9', $lrf_cabo9)->with('lrf_umidade_sujeira9', $lrf_umidade_sujeira9)->with('lrf_isolamento_danificado9', $lrf_isolamento_danificado9)
       ->with('atualf10', $atualf10)->with('lrf_umidade10', $lrf_umidade10)->with('lrf_sujeira10', $lrf_sujeira10)->with('lrf_curto_espiras10', $lrf_curto_espiras10)->with('lrf_cabo10', $lrf_cabo10)->with('lrf_umidade_sujeira10', $lrf_umidade_sujeira10)->with('lrf_isolamento_danificado10', $lrf_isolamento_danificado10)
       ->with('atualf11', $atualf11)->with('lrf_umidade11', $lrf_umidade11)->with('lrf_sujeira11', $lrf_sujeira11)->with('lrf_curto_espiras11', $lrf_curto_espiras11)->with('lrf_cabo11', $lrf_cabo11)->with('lrf_umidade_sujeira11', $lrf_umidade_sujeira11)->with('lrf_isolamento_danificado11', $lrf_isolamento_danificado11)
       ->with('atualf12', $atualf12)->with('lrf_umidade12', $lrf_umidade12)->with('lrf_sujeira12', $lrf_sujeira12)->with('lrf_curto_espiras12', $lrf_curto_espiras12)->with('lrf_cabo12', $lrf_cabo12)->with('lrf_umidade_sujeira12', $lrf_umidade_sujeira12)->with('lrf_isolamento_danificado12', $lrf_isolamento_danificado12);
   }

   public function UtiPerfil() {

     $title = 'Perfil | Utilidades';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 7;

     $uti_manutencao = aux::GeralPorLinha2RM($atual1, 1, $parent);
     $uti_standBy = aux::GeralPorLinha2RM($atual1, 2, $parent);
     $uti_normal = aux::GeralPorLinha2RM($atual1, 3, $parent);
     $uti_alarme = aux::GeralPorLinha2RM($atual1, 4, $parent);
     $uti_critico = aux::GeralPorLinha2RM($atual1, 5, $parent);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

      return view('csn.relatorioGerencial.includes.indexRelGerRM_uti_perfil')->with('title', $title)->with('sum', $sum)
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
                  ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

      $uti_normal1 = aux::GeralPorLinha2RM($atual1, 3, $parent);
      $uti_alarme1 = aux::GeralPorLinha2RM($atual1, 4, $parent);
      $uti_critico1 = aux::GeralPorLinha2RM($atual1, 5, $parent);

      $uti_normal2 = aux::GeralPorLinha2RM($atual2, 3, $parent);
      $uti_alarme2 = aux::GeralPorLinha2RM($atual2, 4, $parent);
      $uti_critico2 = aux::GeralPorLinha2RM($atual2, 5, $parent);

      $uti_normal3 = aux::GeralPorLinha2RM($atual3, 3, $parent);
      $uti_alarme3 = aux::GeralPorLinha2RM($atual3, 4, $parent);
      $uti_critico3 = aux::GeralPorLinha2RM($atual3, 5, $parent);

      $uti_normal4 = aux::GeralPorLinha2RM($atual4, 3, $parent);
      $uti_alarme4 = aux::GeralPorLinha2RM($atual4, 4, $parent);
      $uti_critico4 = aux::GeralPorLinha2RM($atual4, 5, $parent);

      $uti_normal5 = aux::GeralPorLinha2RM($atual5, 3, $parent);
      $uti_alarme5 = aux::GeralPorLinha2RM($atual5, 4, $parent);
      $uti_critico5 = aux::GeralPorLinha2RM($atual5, 5, $parent);

      $uti_normal6 = aux::GeralPorLinha2RM($atual6, 3, $parent);
      $uti_alarme6 = aux::GeralPorLinha2RM($atual6, 4, $parent);
      $uti_critico6 = aux::GeralPorLinha2RM($atual6, 5, $parent);

      $uti_normal7 = aux::GeralPorLinha2RM($atual7, 3, $parent);
      $uti_alarme7 = aux::GeralPorLinha2RM($atual7, 4, $parent);
      $uti_critico7 = aux::GeralPorLinha2RM($atual7, 5, $parent);

      $uti_normal8 = aux::GeralPorLinha2RM($atual8, 3, $parent);
      $uti_alarme8 = aux::GeralPorLinha2RM($atual8, 4, $parent);
      $uti_critico8 = aux::GeralPorLinha2RM($atual8, 5, $parent);

      $uti_normal9 = aux::GeralPorLinha2RM($atual9, 3, $parent);
      $uti_alarme9 = aux::GeralPorLinha2RM($atual9, 4, $parent);
      $uti_critico9 = aux::GeralPorLinha2RM($atual9, 5, $parent);

      $uti_normal10 = aux::GeralPorLinha2RM($atual10, 3, $parent);
      $uti_alarme10 = aux::GeralPorLinha2RM($atual10, 4, $parent);
      $uti_critico10 = aux::GeralPorLinha2RM($atual10, 5, $parent);

      $uti_normal11 = aux::GeralPorLinha2RM($atual11, 3, $parent);
      $uti_alarme11 = aux::GeralPorLinha2RM($atual11, 4, $parent);
      $uti_critico11 = aux::GeralPorLinha2RM($atual11, 5, $parent);

      $uti_normal12 = aux::GeralPorLinha2RM($atual12, 3, $parent);
      $uti_alarme12 = aux::GeralPorLinha2RM($atual12, 4, $parent);
      $uti_critico12 = aux::GeralPorLinha2RM($atual12, 5, $parent);

      return view('csn.relatorioGerencial.includes.relatoriosResistencia.uti-status-dos-pontos')
                  ->with('title', $title)->with('sum', $sum)
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
                  ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

      $alarme1P = aux::GeralPorLinha2RM($atual1, 4, $parent);
      $critico1P = aux::GeralPorLinha2RM($atual1, 5, $parent);
      $alarme2P = aux::GeralPorLinha2RM($atual2, 4, $parent);
      $critico2P = aux::GeralPorLinha2RM($atual2, 5, $parent);
      $alarme3P = aux::GeralPorLinha2RM($atual3, 4, $parent);
      $critico3P = aux::GeralPorLinha2RM($atual3, 5, $parent);
      $alarme4P = aux::GeralPorLinha2RM($atual4, 4, $parent);
      $critico4P = aux::GeralPorLinha2RM($atual4, 5, $parent);
      $alarme5P = aux::GeralPorLinha2RM($atual5, 4, $parent);
      $critico5P = aux::GeralPorLinha2RM($atual5, 5, $parent);
      $alarme6P = aux::GeralPorLinha2RM($atual6, 4, $parent);
      $critico6P = aux::GeralPorLinha2RM($atual6, 5, $parent);
      $alarme7P = aux::GeralPorLinha2RM($atual7, 4, $parent);
      $critico7P = aux::GeralPorLinha2RM($atual7, 5, $parent);
      $alarme8P = aux::GeralPorLinha2RM($atual8, 4, $parent);
      $critico8P = aux::GeralPorLinha2RM($atual8, 5, $parent);
      $alarme9P = aux::GeralPorLinha2RM($atual9, 4, $parent);
      $critico9P = aux::GeralPorLinha2RM($atual9, 5, $parent);
      $alarme10P = aux::GeralPorLinha2RM($atual10, 4, $parent);
      $critico10P = aux::GeralPorLinha2RM($atual10, 5, $parent);
      $alarme11P = aux::GeralPorLinha2RM($atual11, 4, $parent);
      $critico11P = aux::GeralPorLinha2RM($atual11, 5, $parent);
      $alarme12P = aux::GeralPorLinha2RM($atual12, 4, $parent);
      $critico12P = aux::GeralPorLinha2RM($atual12, 5, $parent);


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

      return view('csn.relatorioGerencial.includes.relatoriosResistencia.uti-anormalidades')->with('title', $title)->with('sum', $sum)
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
                  ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

      $uti_umidade1 = aux::GeralPorLinhaEDiag2RM($atual1, 22, $parent);
      $uti_sujeira1 = aux::GeralPorLinhaEDiag2RM($atual1, 23, $parent);
      $uti_curto_espiras1 = aux::GeralPorLinhaEDiag2RM($atual1, 24, $parent);
      $uti_cabo1 = aux::GeralPorLinhaEDiag2RM($atual1, 25, $parent);
      $uti_umidade_sujeira1 = aux::GeralPorLinhaEDiag2RM($atual1, 26, $parent);
      $uti_isolamento_danificado1 = aux::GeralPorLinhaEDiag2RM($atual1, 27, $parent);

      $uti_umidade2 = aux::GeralPorLinhaEDiag2RM($atual2, 22, $parent);
      $uti_sujeira2 = aux::GeralPorLinhaEDiag2RM($atual2, 23, $parent);
      $uti_curto_espiras2 = aux::GeralPorLinhaEDiag2RM($atual2, 24, $parent);
      $uti_cabo2 = aux::GeralPorLinhaEDiag2RM($atual2, 25, $parent);
      $uti_umidade_sujeira2 = aux::GeralPorLinhaEDiag2RM($atual2, 26, $parent);
      $uti_isolamento_danificado2 = aux::GeralPorLinhaEDiag2RM($atual2, 27, $parent);

      $uti_umidade3 = aux::GeralPorLinhaEDiag2RM($atual3, 22, $parent);
      $uti_sujeira3 = aux::GeralPorLinhaEDiag2RM($atual3, 23, $parent);
      $uti_curto_espiras3 = aux::GeralPorLinhaEDiag2RM($atual3, 24, $parent);
      $uti_cabo3 = aux::GeralPorLinhaEDiag2RM($atual3, 25, $parent);
      $uti_umidade_sujeira3 = aux::GeralPorLinhaEDiag2RM($atual3, 26, $parent);
      $uti_isolamento_danificado3 = aux::GeralPorLinhaEDiag2RM($atual3, 27, $parent);

      $uti_umidade4 = aux::GeralPorLinhaEDiag2RM($atual4, 22, $parent);
      $uti_sujeira4 = aux::GeralPorLinhaEDiag2RM($atual4, 23, $parent);
      $uti_curto_espiras4 = aux::GeralPorLinhaEDiag2RM($atual4, 24, $parent);
      $uti_cabo4 = aux::GeralPorLinhaEDiag2RM($atual4, 25, $parent);
      $uti_umidade_sujeira4 = aux::GeralPorLinhaEDiag2RM($atual4, 26, $parent);
      $uti_isolamento_danificado4 = aux::GeralPorLinhaEDiag2RM($atual4, 27, $parent);

      $uti_umidade5 = aux::GeralPorLinhaEDiag2RM($atual5, 22, $parent);
      $uti_sujeira5 = aux::GeralPorLinhaEDiag2RM($atual5, 23, $parent);
      $uti_curto_espiras5 = aux::GeralPorLinhaEDiag2RM($atual5, 24, $parent);
      $uti_cabo5 = aux::GeralPorLinhaEDiag2RM($atual5, 25, $parent);
      $uti_umidade_sujeira5 = aux::GeralPorLinhaEDiag2RM($atual5, 26, $parent);
      $uti_isolamento_danificado5 = aux::GeralPorLinhaEDiag2RM($atual5, 27, $parent);

      $uti_umidade6 = aux::GeralPorLinhaEDiag2RM($atual6, 22, $parent);
      $uti_sujeira6 = aux::GeralPorLinhaEDiag2RM($atual6, 23, $parent);
      $uti_curto_espiras6 = aux::GeralPorLinhaEDiag2RM($atual6, 24, $parent);
      $uti_cabo6 = aux::GeralPorLinhaEDiag2RM($atual6, 25, $parent);
      $uti_umidade_sujeira6 = aux::GeralPorLinhaEDiag2RM($atual6, 26, $parent);
      $uti_isolamento_danificado6 = aux::GeralPorLinhaEDiag2RM($atual6, 27, $parent);

      $uti_umidade7 = aux::GeralPorLinhaEDiag2RM($atual7, 22, $parent);
      $uti_sujeira7 = aux::GeralPorLinhaEDiag2RM($atual7, 23, $parent);
      $uti_curto_espiras7 = aux::GeralPorLinhaEDiag2RM($atual7, 24, $parent);
      $uti_cabo7 = aux::GeralPorLinhaEDiag2RM($atual7, 25, $parent);
      $uti_umidade_sujeira7 = aux::GeralPorLinhaEDiag2RM($atual7, 26, $parent);
      $uti_isolamento_danificado7 = aux::GeralPorLinhaEDiag2RM($atual7, 27, $parent);

      $uti_umidade8 = aux::GeralPorLinhaEDiag2RM($atual8, 22, $parent);
      $uti_sujeira8 = aux::GeralPorLinhaEDiag2RM($atual8, 23, $parent);
      $uti_curto_espiras8 = aux::GeralPorLinhaEDiag2RM($atual8, 24, $parent);
      $uti_cabo8 = aux::GeralPorLinhaEDiag2RM($atual8, 25, $parent);
      $uti_umidade_sujeira8 = aux::GeralPorLinhaEDiag2RM($atual8, 26, $parent);
      $uti_isolamento_danificado8 = aux::GeralPorLinhaEDiag2RM($atual8, 27, $parent);

      $uti_umidade9 = aux::GeralPorLinhaEDiag2RM($atual9, 22, $parent);
      $uti_sujeira9 = aux::GeralPorLinhaEDiag2RM($atual9, 23, $parent);
      $uti_curto_espiras9 = aux::GeralPorLinhaEDiag2RM($atual9, 24, $parent);
      $uti_cabo9 = aux::GeralPorLinhaEDiag2RM($atual9, 25, $parent);
      $uti_umidade_sujeira9 = aux::GeralPorLinhaEDiag2RM($atual9, 26, $parent);
      $uti_isolamento_danificado9 = aux::GeralPorLinhaEDiag2RM($atual9, 27, $parent);

      $uti_umidade10 = aux::GeralPorLinhaEDiag2RM($atual10, 22, $parent);
      $uti_sujeira10 = aux::GeralPorLinhaEDiag2RM($atual10, 23, $parent);
      $uti_curto_espiras10 = aux::GeralPorLinhaEDiag2RM($atual10, 24, $parent);
      $uti_cabo10 = aux::GeralPorLinhaEDiag2RM($atual10, 25, $parent);
      $uti_umidade_sujeira10 = aux::GeralPorLinhaEDiag2RM($atual10, 26, $parent);
      $uti_isolamento_danificado10 = aux::GeralPorLinhaEDiag2RM($atual10, 27, $parent);

      $uti_umidade11 = aux::GeralPorLinhaEDiag2RM($atual11, 22, $parent);
      $uti_sujeira11 = aux::GeralPorLinhaEDiag2RM($atual11, 23, $parent);
      $uti_curto_espiras11 = aux::GeralPorLinhaEDiag2RM($atual11, 24, $parent);
      $uti_cabo11 = aux::GeralPorLinhaEDiag2RM($atual11, 25, $parent);
      $uti_umidade_sujeira11 = aux::GeralPorLinhaEDiag2RM($atual11, 26, $parent);
      $uti_isolamento_danificado11 = aux::GeralPorLinhaEDiag2RM($atual11, 27, $parent);

      $uti_umidade12 = aux::GeralPorLinhaEDiag2RM($atual12, 22, $parent);
      $uti_sujeira12 = aux::GeralPorLinhaEDiag2RM($atual12, 23, $parent);
      $uti_curto_espiras12 = aux::GeralPorLinhaEDiag2RM($atual12, 24, $parent);
      $uti_cabo12 = aux::GeralPorLinhaEDiag2RM($atual12, 25, $parent);
      $uti_umidade_sujeira12 = aux::GeralPorLinhaEDiag2RM($atual12, 26, $parent);
      $uti_isolamento_danificado12 = aux::GeralPorLinhaEDiag2RM($atual12, 27, $parent);

      return view('csn.relatorioGerencial.includes.relatoriosResistencia.uti-problemasEncontrados')->with('title', $title)->with('sum', $sum)
        ->with('atualf1', $atualf1)->with('uti_umidade1', $uti_umidade1)->with('uti_sujeira1', $uti_sujeira1)->with('uti_curto_espiras1', $uti_curto_espiras1)->with('uti_cabo1', $uti_cabo1)->with('uti_umidade_sujeira1', $uti_umidade_sujeira1)->with('uti_isolamento_danificado1', $uti_isolamento_danificado1)
        ->with('atualf2', $atualf2)->with('uti_umidade2', $uti_umidade2)->with('uti_sujeira2', $uti_sujeira2)->with('uti_curto_espiras2', $uti_curto_espiras2)->with('uti_cabo2', $uti_cabo2)->with('uti_umidade_sujeira2', $uti_umidade_sujeira2)->with('uti_isolamento_danificado2', $uti_isolamento_danificado2)
        ->with('atualf3', $atualf3)->with('uti_umidade3', $uti_umidade3)->with('uti_sujeira3', $uti_sujeira3)->with('uti_curto_espiras3', $uti_curto_espiras3)->with('uti_cabo3', $uti_cabo3)->with('uti_umidade_sujeira3', $uti_umidade_sujeira3)->with('uti_isolamento_danificado3', $uti_isolamento_danificado3)
        ->with('atualf4', $atualf4)->with('uti_umidade4', $uti_umidade4)->with('uti_sujeira4', $uti_sujeira4)->with('uti_curto_espiras4', $uti_curto_espiras4)->with('uti_cabo4', $uti_cabo4)->with('uti_umidade_sujeira4', $uti_umidade_sujeira4)->with('uti_isolamento_danificado4', $uti_isolamento_danificado4)
        ->with('atualf5', $atualf5)->with('uti_umidade5', $uti_umidade5)->with('uti_sujeira5', $uti_sujeira5)->with('uti_curto_espiras5', $uti_curto_espiras5)->with('uti_cabo5', $uti_cabo5)->with('uti_umidade_sujeira5', $uti_umidade_sujeira5)->with('uti_isolamento_danificado5', $uti_isolamento_danificado5)
        ->with('atualf6', $atualf6)->with('uti_umidade6', $uti_umidade6)->with('uti_sujeira6', $uti_sujeira6)->with('uti_curto_espiras6', $uti_curto_espiras6)->with('uti_cabo6', $uti_cabo6)->with('uti_umidade_sujeira6', $uti_umidade_sujeira6)->with('uti_isolamento_danificado6', $uti_isolamento_danificado6)
        ->with('atualf7', $atualf7)->with('uti_umidade7', $uti_umidade7)->with('uti_sujeira7', $uti_sujeira7)->with('uti_curto_espiras7', $uti_curto_espiras7)->with('uti_cabo7', $uti_cabo7)->with('uti_umidade_sujeira7', $uti_umidade_sujeira7)->with('uti_isolamento_danificado7', $uti_isolamento_danificado7)
        ->with('atualf8', $atualf8)->with('uti_umidade8', $uti_umidade8)->with('uti_sujeira8', $uti_sujeira8)->with('uti_curto_espiras8', $uti_curto_espiras8)->with('uti_cabo8', $uti_cabo8)->with('uti_umidade_sujeira8', $uti_umidade_sujeira8)->with('uti_isolamento_danificado8', $uti_isolamento_danificado8)
        ->with('atualf9', $atualf9)->with('uti_umidade9', $uti_umidade9)->with('uti_sujeira9', $uti_sujeira9)->with('uti_curto_espiras9', $uti_curto_espiras9)->with('uti_cabo9', $uti_cabo9)->with('uti_umidade_sujeira9', $uti_umidade_sujeira9)->with('uti_isolamento_danificado9', $uti_isolamento_danificado9)
        ->with('atualf10', $atualf10)->with('uti_umidade10', $uti_umidade10)->with('uti_sujeira10', $uti_sujeira10)->with('uti_curto_espiras10', $uti_curto_espiras10)->with('uti_cabo10', $uti_cabo10)->with('uti_umidade_sujeira10', $uti_umidade_sujeira10)->with('uti_isolamento_danificado10', $uti_isolamento_danificado10)
        ->with('atualf11', $atualf11)->with('uti_umidade11', $uti_umidade11)->with('uti_sujeira11', $uti_sujeira11)->with('uti_curto_espiras11', $uti_curto_espiras11)->with('uti_cabo11', $uti_cabo11)->with('uti_umidade_sujeira11', $uti_umidade_sujeira11)->with('uti_isolamento_danificado11', $uti_isolamento_danificado11)
        ->with('atualf12', $atualf12)->with('uti_umidade12', $uti_umidade12)->with('uti_sujeira12', $uti_sujeira12)->with('uti_curto_espiras12', $uti_curto_espiras12)->with('uti_cabo12', $uti_cabo12)->with('uti_umidade_sujeira12', $uti_umidade_sujeira12)->with('uti_isolamento_danificado12', $uti_isolamento_danificado12);
    }


   public function LgcPerfil() {

     $title = 'Perfil | LGC';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 13;
     $linha2 = 0;

     $lgc_manutencao = aux::GeralPorLinhaRM($atual1, 1, $linha1, $linha2);
     $lgc_standBy = aux::GeralPorLinhaRM($atual1, 2, $linha1, $linha2);
     $lgc_normal = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $lgc_alarme = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $lgc_critico = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     return view('csn.relatorioGerencial.includes.indexRelGerRM_lgc_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $lgc_normal1 = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $lgc_alarme1 = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $lgc_critico1 = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

     $lgc_normal2 = aux::GeralPorLinhaRM($atual2, 3, $linha1, $linha2);
     $lgc_alarme2 = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $lgc_critico2 = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);

     $lgc_normal3 = aux::GeralPorLinhaRM($atual3, 3, $linha1, $linha2);
     $lgc_alarme3 = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $lgc_critico3 = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);

     $lgc_normal4 = aux::GeralPorLinhaRM($atual4, 3, $linha1, $linha2);
     $lgc_alarme4 = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $lgc_critico4 = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);

     $lgc_normal5 = aux::GeralPorLinhaRM($atual5, 3, $linha1, $linha2);
     $lgc_alarme5 = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $lgc_critico5 = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);

     $lgc_normal6 = aux::GeralPorLinhaRM($atual6, 3, $linha1, $linha2);
     $lgc_alarme6 = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $lgc_critico6 = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);

     $lgc_normal7 = aux::GeralPorLinhaRM($atual7, 3, $linha1, $linha2);
     $lgc_alarme7 = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $lgc_critico7 = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);

     $lgc_normal8 = aux::GeralPorLinhaRM($atual8, 3, $linha1, $linha2);
     $lgc_alarme8 = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $lgc_critico8 = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);

     $lgc_normal9 = aux::GeralPorLinhaRM($atual9, 3, $linha1, $linha2);
     $lgc_alarme9 = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $lgc_critico9 = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);

     $lgc_normal10 = aux::GeralPorLinhaRM($atual10, 3, $linha1, $linha2);
     $lgc_alarme10 = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $lgc_critico10 = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);

     $lgc_normal11 = aux::GeralPorLinhaRM($atual11, 3, $linha1, $linha2);
     $lgc_alarme11 = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $lgc_critico11 = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);

     $lgc_normal12 = aux::GeralPorLinhaRM($atual12, 3, $linha1, $linha2);
     $lgc_alarme12 = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $lgc_critico12 = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lgc-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $alarme1P = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lgc-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('negocios.id','=',13)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $lgc_umidade1 = aux::GeralPorLinhaEDiagRM($atual1, 22, $linha1, $linha2);
     $lgc_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 23, $linha1, $linha2);
     $lgc_curto_espiras1 = aux::GeralPorLinhaEDiagRM($atual1, 24, $linha1, $linha2);
     $lgc_cabo1 = aux::GeralPorLinhaEDiagRM($atual1, 25, $linha1, $linha2);
     $lgc_umidade_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 26, $linha1, $linha2);
     $lgc_isolamento_danificado1 = aux::GeralPorLinhaEDiagRM($atual1, 27, $linha1, $linha2);

     $lgc_umidade2 = aux::GeralPorLinhaEDiagRM($atual2, 22, $linha1, $linha2);
     $lgc_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 23, $linha1, $linha2);
     $lgc_curto_espiras2 = aux::GeralPorLinhaEDiagRM($atual2, 24, $linha1, $linha2);
     $lgc_cabo2 = aux::GeralPorLinhaEDiagRM($atual2, 25, $linha1, $linha2);
     $lgc_umidade_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 26, $linha1, $linha2);
     $lgc_isolamento_danificado2 = aux::GeralPorLinhaEDiagRM($atual2, 27, $linha1, $linha2);

     $lgc_umidade3 = aux::GeralPorLinhaEDiagRM($atual3, 22, $linha1, $linha2);
     $lgc_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 23, $linha1, $linha2);
     $lgc_curto_espiras3 = aux::GeralPorLinhaEDiagRM($atual3, 24, $linha1, $linha2);
     $lgc_cabo3 = aux::GeralPorLinhaEDiagRM($atual3, 25, $linha1, $linha2);
     $lgc_umidade_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 26, $linha1, $linha2);
     $lgc_isolamento_danificado3 = aux::GeralPorLinhaEDiagRM($atual3, 27, $linha1, $linha2);

     $lgc_umidade4 = aux::GeralPorLinhaEDiagRM($atual4, 22, $linha1, $linha2);
     $lgc_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 23, $linha1, $linha2);
     $lgc_curto_espiras4 = aux::GeralPorLinhaEDiagRM($atual4, 24, $linha1, $linha2);
     $lgc_cabo4 = aux::GeralPorLinhaEDiagRM($atual4, 25, $linha1, $linha2);
     $lgc_umidade_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 26, $linha1, $linha2);
     $lgc_isolamento_danificado4 = aux::GeralPorLinhaEDiagRM($atual4, 27, $linha1, $linha2);

     $lgc_umidade5 = aux::GeralPorLinhaEDiagRM($atual5, 22, $linha1, $linha2);
     $lgc_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 23, $linha1, $linha2);
     $lgc_curto_espiras5 = aux::GeralPorLinhaEDiagRM($atual5, 24, $linha1, $linha2);
     $lgc_cabo5 = aux::GeralPorLinhaEDiagRM($atual5, 25, $linha1, $linha2);
     $lgc_umidade_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 26, $linha1, $linha2);
     $lgc_isolamento_danificado5 = aux::GeralPorLinhaEDiagRM($atual5, 27, $linha1, $linha2);

     $lgc_umidade6 = aux::GeralPorLinhaEDiagRM($atual6, 22, $linha1, $linha2);
     $lgc_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 23, $linha1, $linha2);
     $lgc_curto_espiras6 = aux::GeralPorLinhaEDiagRM($atual6, 24, $linha1, $linha2);
     $lgc_cabo6 = aux::GeralPorLinhaEDiagRM($atual6, 25, $linha1, $linha2);
     $lgc_umidade_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 26, $linha1, $linha2);
     $lgc_isolamento_danificado6 = aux::GeralPorLinhaEDiagRM($atual6, 27, $linha1, $linha2);

     $lgc_umidade7 = aux::GeralPorLinhaEDiagRM($atual7, 22, $linha1, $linha2);
     $lgc_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 23, $linha1, $linha2);
     $lgc_curto_espiras7 = aux::GeralPorLinhaEDiagRM($atual7, 24, $linha1, $linha2);
     $lgc_cabo7 = aux::GeralPorLinhaEDiagRM($atual7, 25, $linha1, $linha2);
     $lgc_umidade_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 26, $linha1, $linha2);
     $lgc_isolamento_danificado7 = aux::GeralPorLinhaEDiagRM($atual7, 27, $linha1, $linha2);

     $lgc_umidade8 = aux::GeralPorLinhaEDiagRM($atual8, 22, $linha1, $linha2);
     $lgc_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 23, $linha1, $linha2);
     $lgc_curto_espiras8 = aux::GeralPorLinhaEDiagRM($atual8, 24, $linha1, $linha2);
     $lgc_cabo8 = aux::GeralPorLinhaEDiagRM($atual8, 25, $linha1, $linha2);
     $lgc_umidade_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 26, $linha1, $linha2);
     $lgc_isolamento_danificado8 = aux::GeralPorLinhaEDiagRM($atual8, 27, $linha1, $linha2);

     $lgc_umidade9 = aux::GeralPorLinhaEDiagRM($atual9, 22, $linha1, $linha2);
     $lgc_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 23, $linha1, $linha2);
     $lgc_curto_espiras9 = aux::GeralPorLinhaEDiagRM($atual9, 24, $linha1, $linha2);
     $lgc_cabo9 = aux::GeralPorLinhaEDiagRM($atual9, 25, $linha1, $linha2);
     $lgc_umidade_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 26, $linha1, $linha2);
     $lgc_isolamento_danificado9 = aux::GeralPorLinhaEDiagRM($atual9, 27, $linha1, $linha2);

     $lgc_umidade10 = aux::GeralPorLinhaEDiagRM($atual10, 22, $linha1, $linha2);
     $lgc_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 23, $linha1, $linha2);
     $lgc_curto_espiras10 = aux::GeralPorLinhaEDiagRM($atual10, 24, $linha1, $linha2);
     $lgc_cabo10 = aux::GeralPorLinhaEDiagRM($atual10, 25, $linha1, $linha2);
     $lgc_umidade_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 26, $linha1, $linha2);
     $lgc_isolamento_danificado10 = aux::GeralPorLinhaEDiagRM($atual10, 27, $linha1, $linha2);

     $lgc_umidade11 = aux::GeralPorLinhaEDiagRM($atual11, 22, $linha1, $linha2);
     $lgc_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 23, $linha1, $linha2);
     $lgc_curto_espiras11 = aux::GeralPorLinhaEDiagRM($atual11, 24, $linha1, $linha2);
     $lgc_cabo11 = aux::GeralPorLinhaEDiagRM($atual11, 25, $linha1, $linha2);
     $lgc_umidade_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 26, $linha1, $linha2);
     $lgc_isolamento_danificado11 = aux::GeralPorLinhaEDiagRM($atual11, 27, $linha1, $linha2);

     $lgc_umidade12 = aux::GeralPorLinhaEDiagRM($atual12, 22, $linha1, $linha2);
     $lgc_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 23, $linha1, $linha2);
     $lgc_curto_espiras12 = aux::GeralPorLinhaEDiagRM($atual12, 24, $linha1, $linha2);
     $lgc_cabo12 = aux::GeralPorLinhaEDiagRM($atual12, 25, $linha1, $linha2);
     $lgc_umidade_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 26, $linha1, $linha2);
     $lgc_isolamento_danificado12 = aux::GeralPorLinhaEDiagRM($atual12, 27, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lgc-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lgc_umidade1', $lgc_umidade1)->with('lgc_sujeira1', $lgc_sujeira1)->with('lgc_curto_espiras1', $lgc_curto_espiras1)->with('lgc_cabo1', $lgc_cabo1)->with('lgc_umidade_sujeira1', $lgc_umidade_sujeira1)->with('lgc_isolamento_danificado1', $lgc_isolamento_danificado1)
       ->with('atualf2', $atualf2)->with('lgc_umidade2', $lgc_umidade2)->with('lgc_sujeira2', $lgc_sujeira2)->with('lgc_curto_espiras2', $lgc_curto_espiras2)->with('lgc_cabo2', $lgc_cabo2)->with('lgc_umidade_sujeira2', $lgc_umidade_sujeira2)->with('lgc_isolamento_danificado2', $lgc_isolamento_danificado2)
       ->with('atualf3', $atualf3)->with('lgc_umidade3', $lgc_umidade3)->with('lgc_sujeira3', $lgc_sujeira3)->with('lgc_curto_espiras3', $lgc_curto_espiras3)->with('lgc_cabo3', $lgc_cabo3)->with('lgc_umidade_sujeira3', $lgc_umidade_sujeira3)->with('lgc_isolamento_danificado3', $lgc_isolamento_danificado3)
       ->with('atualf4', $atualf4)->with('lgc_umidade4', $lgc_umidade4)->with('lgc_sujeira4', $lgc_sujeira4)->with('lgc_curto_espiras4', $lgc_curto_espiras4)->with('lgc_cabo4', $lgc_cabo4)->with('lgc_umidade_sujeira4', $lgc_umidade_sujeira4)->with('lgc_isolamento_danificado4', $lgc_isolamento_danificado4)
       ->with('atualf5', $atualf5)->with('lgc_umidade5', $lgc_umidade5)->with('lgc_sujeira5', $lgc_sujeira5)->with('lgc_curto_espiras5', $lgc_curto_espiras5)->with('lgc_cabo5', $lgc_cabo5)->with('lgc_umidade_sujeira5', $lgc_umidade_sujeira5)->with('lgc_isolamento_danificado5', $lgc_isolamento_danificado5)
       ->with('atualf6', $atualf6)->with('lgc_umidade6', $lgc_umidade6)->with('lgc_sujeira6', $lgc_sujeira6)->with('lgc_curto_espiras6', $lgc_curto_espiras6)->with('lgc_cabo6', $lgc_cabo6)->with('lgc_umidade_sujeira6', $lgc_umidade_sujeira6)->with('lgc_isolamento_danificado6', $lgc_isolamento_danificado6)
       ->with('atualf7', $atualf7)->with('lgc_umidade7', $lgc_umidade7)->with('lgc_sujeira7', $lgc_sujeira7)->with('lgc_curto_espiras7', $lgc_curto_espiras7)->with('lgc_cabo7', $lgc_cabo7)->with('lgc_umidade_sujeira7', $lgc_umidade_sujeira7)->with('lgc_isolamento_danificado7', $lgc_isolamento_danificado7)
       ->with('atualf8', $atualf8)->with('lgc_umidade8', $lgc_umidade8)->with('lgc_sujeira8', $lgc_sujeira8)->with('lgc_curto_espiras8', $lgc_curto_espiras8)->with('lgc_cabo8', $lgc_cabo8)->with('lgc_umidade_sujeira8', $lgc_umidade_sujeira8)->with('lgc_isolamento_danificado8', $lgc_isolamento_danificado8)
       ->with('atualf9', $atualf9)->with('lgc_umidade9', $lgc_umidade9)->with('lgc_sujeira9', $lgc_sujeira9)->with('lgc_curto_espiras9', $lgc_curto_espiras9)->with('lgc_cabo9', $lgc_cabo9)->with('lgc_umidade_sujeira9', $lgc_umidade_sujeira9)->with('lgc_isolamento_danificado9', $lgc_isolamento_danificado9)
       ->with('atualf10', $atualf10)->with('lgc_umidade10', $lgc_umidade10)->with('lgc_sujeira10', $lgc_sujeira10)->with('lgc_curto_espiras10', $lgc_curto_espiras10)->with('lgc_cabo10', $lgc_cabo10)->with('lgc_umidade_sujeira10', $lgc_umidade_sujeira10)->with('lgc_isolamento_danificado10', $lgc_isolamento_danificado10)
       ->with('atualf11', $atualf11)->with('lgc_umidade11', $lgc_umidade11)->with('lgc_sujeira11', $lgc_sujeira11)->with('lgc_curto_espiras11', $lgc_curto_espiras11)->with('lgc_cabo11', $lgc_cabo11)->with('lgc_umidade_sujeira11', $lgc_umidade_sujeira11)->with('lgc_isolamento_danificado11', $lgc_isolamento_danificado11)
       ->with('atualf12', $atualf12)->with('lgc_umidade12', $lgc_umidade12)->with('lgc_sujeira12', $lgc_sujeira12)->with('lgc_curto_espiras12', $lgc_curto_espiras12)->with('lgc_cabo12', $lgc_cabo12)->with('lgc_umidade_sujeira12', $lgc_umidade_sujeira12)->with('lgc_isolamento_danificado12', $lgc_isolamento_danificado12);
   }

   public function LpcPerfil() {

     $title = 'Perfil | LPC';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 14;
     $linha2 = 0;

     $lpc_manutencao = aux::GeralPorLinhaRM($atual1, 1, $linha1, $linha2);
     $lpc_standBy = aux::GeralPorLinhaRM($atual1, 2, $linha1, $linha2);
     $lpc_normal = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $lpc_alarme = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $lpc_critico = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     return view('csn.relatorioGerencial.includes.indexRelGerRM_lpc_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $lpc_normal1 = aux::GeralPorLinhaRM($atual1, 3, $linha1, $linha2);
     $lpc_alarme1 = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $lpc_critico1 = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);

     $lpc_normal2 = aux::GeralPorLinhaRM($atual2, 3, $linha1, $linha2);
     $lpc_alarme2 = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $lpc_critico2 = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);

     $lpc_normal3 = aux::GeralPorLinhaRM($atual3, 3, $linha1, $linha2);
     $lpc_alarme3 = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $lpc_critico3 = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);

     $lpc_normal4 = aux::GeralPorLinhaRM($atual4, 3, $linha1, $linha2);
     $lpc_alarme4 = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $lpc_critico4 = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);

     $lpc_normal5 = aux::GeralPorLinhaRM($atual5, 3, $linha1, $linha2);
     $lpc_alarme5 = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $lpc_critico5 = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);

     $lpc_normal6 = aux::GeralPorLinhaRM($atual6, 3, $linha1, $linha2);
     $lpc_alarme6 = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $lpc_critico6 = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);

     $lpc_normal7 = aux::GeralPorLinhaRM($atual7, 3, $linha1, $linha2);
     $lpc_alarme7 = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $lpc_critico7 = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);

     $lpc_normal8 = aux::GeralPorLinhaRM($atual8, 3, $linha1, $linha2);
     $lpc_alarme8 = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $lpc_critico8 = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);

     $lpc_normal9 = aux::GeralPorLinhaRM($atual9, 3, $linha1, $linha2);
     $lpc_alarme9 = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $lpc_critico9 = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);

     $lpc_normal10 = aux::GeralPorLinhaRM($atual10, 3, $linha1, $linha2);
     $lpc_alarme10 = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $lpc_critico10 = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);

     $lpc_normal11 = aux::GeralPorLinhaRM($atual11, 3, $linha1, $linha2);
     $lpc_alarme11 = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $lpc_critico11 = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);

     $lpc_normal12 = aux::GeralPorLinhaRM($atual12, 3, $linha1, $linha2);
     $lpc_alarme12 = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $lpc_critico12 = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lpc-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $alarme1P = aux::GeralPorLinhaRM($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaRM($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaRM($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaRM($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaRM($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaRM($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaRM($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaRM($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaRM($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaRM($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaRM($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaRM($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaRM($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaRM($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaRM($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaRM($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaRM($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaRM($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaRM($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaRM($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaRM($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaRM($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaRM($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaRM($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lpc-anormalidades')
     ->with('title', $title)->with('sum', $sum)
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
                 ->where('negocios.id','=',14)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $lpc_umidade1 = aux::GeralPorLinhaEDiagRM($atual1, 22, $linha1, $linha2);
     $lpc_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 23, $linha1, $linha2);
     $lpc_curto_espiras1 = aux::GeralPorLinhaEDiagRM($atual1, 24, $linha1, $linha2);
     $lpc_cabo1 = aux::GeralPorLinhaEDiagRM($atual1, 25, $linha1, $linha2);
     $lpc_umidade_sujeira1 = aux::GeralPorLinhaEDiagRM($atual1, 26, $linha1, $linha2);
     $lpc_isolamento_danificado1 = aux::GeralPorLinhaEDiagRM($atual1, 27, $linha1, $linha2);

     $lpc_umidade2 = aux::GeralPorLinhaEDiagRM($atual2, 22, $linha1, $linha2);
     $lpc_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 23, $linha1, $linha2);
     $lpc_curto_espiras2 = aux::GeralPorLinhaEDiagRM($atual2, 24, $linha1, $linha2);
     $lpc_cabo2 = aux::GeralPorLinhaEDiagRM($atual2, 25, $linha1, $linha2);
     $lpc_umidade_sujeira2 = aux::GeralPorLinhaEDiagRM($atual2, 26, $linha1, $linha2);
     $lpc_isolamento_danificado2 = aux::GeralPorLinhaEDiagRM($atual2, 27, $linha1, $linha2);

     $lpc_umidade3 = aux::GeralPorLinhaEDiagRM($atual3, 22, $linha1, $linha2);
     $lpc_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 23, $linha1, $linha2);
     $lpc_curto_espiras3 = aux::GeralPorLinhaEDiagRM($atual3, 24, $linha1, $linha2);
     $lpc_cabo3 = aux::GeralPorLinhaEDiagRM($atual3, 25, $linha1, $linha2);
     $lpc_umidade_sujeira3 = aux::GeralPorLinhaEDiagRM($atual3, 26, $linha1, $linha2);
     $lpc_isolamento_danificado3 = aux::GeralPorLinhaEDiagRM($atual3, 27, $linha1, $linha2);

     $lpc_umidade4 = aux::GeralPorLinhaEDiagRM($atual4, 22, $linha1, $linha2);
     $lpc_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 23, $linha1, $linha2);
     $lpc_curto_espiras4 = aux::GeralPorLinhaEDiagRM($atual4, 24, $linha1, $linha2);
     $lpc_cabo4 = aux::GeralPorLinhaEDiagRM($atual4, 25, $linha1, $linha2);
     $lpc_umidade_sujeira4 = aux::GeralPorLinhaEDiagRM($atual4, 26, $linha1, $linha2);
     $lpc_isolamento_danificado4 = aux::GeralPorLinhaEDiagRM($atual4, 27, $linha1, $linha2);

     $lpc_umidade5 = aux::GeralPorLinhaEDiagRM($atual5, 22, $linha1, $linha2);
     $lpc_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 23, $linha1, $linha2);
     $lpc_curto_espiras5 = aux::GeralPorLinhaEDiagRM($atual5, 24, $linha1, $linha2);
     $lpc_cabo5 = aux::GeralPorLinhaEDiagRM($atual5, 25, $linha1, $linha2);
     $lpc_umidade_sujeira5 = aux::GeralPorLinhaEDiagRM($atual5, 26, $linha1, $linha2);
     $lpc_isolamento_danificado5 = aux::GeralPorLinhaEDiagRM($atual5, 27, $linha1, $linha2);

     $lpc_umidade6 = aux::GeralPorLinhaEDiagRM($atual6, 22, $linha1, $linha2);
     $lpc_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 23, $linha1, $linha2);
     $lpc_curto_espiras6 = aux::GeralPorLinhaEDiagRM($atual6, 24, $linha1, $linha2);
     $lpc_cabo6 = aux::GeralPorLinhaEDiagRM($atual6, 25, $linha1, $linha2);
     $lpc_umidade_sujeira6 = aux::GeralPorLinhaEDiagRM($atual6, 26, $linha1, $linha2);
     $lpc_isolamento_danificado6 = aux::GeralPorLinhaEDiagRM($atual6, 27, $linha1, $linha2);

     $lpc_umidade7 = aux::GeralPorLinhaEDiagRM($atual7, 22, $linha1, $linha2);
     $lpc_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 23, $linha1, $linha2);
     $lpc_curto_espiras7 = aux::GeralPorLinhaEDiagRM($atual7, 24, $linha1, $linha2);
     $lpc_cabo7 = aux::GeralPorLinhaEDiagRM($atual7, 25, $linha1, $linha2);
     $lpc_umidade_sujeira7 = aux::GeralPorLinhaEDiagRM($atual7, 26, $linha1, $linha2);
     $lpc_isolamento_danificado7 = aux::GeralPorLinhaEDiagRM($atual7, 27, $linha1, $linha2);

     $lpc_umidade8 = aux::GeralPorLinhaEDiagRM($atual8, 22, $linha1, $linha2);
     $lpc_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 23, $linha1, $linha2);
     $lpc_curto_espiras8 = aux::GeralPorLinhaEDiagRM($atual8, 24, $linha1, $linha2);
     $lpc_cabo8 = aux::GeralPorLinhaEDiagRM($atual8, 25, $linha1, $linha2);
     $lpc_umidade_sujeira8 = aux::GeralPorLinhaEDiagRM($atual8, 26, $linha1, $linha2);
     $lpc_isolamento_danificado8 = aux::GeralPorLinhaEDiagRM($atual8, 27, $linha1, $linha2);

     $lpc_umidade9 = aux::GeralPorLinhaEDiagRM($atual9, 22, $linha1, $linha2);
     $lpc_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 23, $linha1, $linha2);
     $lpc_curto_espiras9 = aux::GeralPorLinhaEDiagRM($atual9, 24, $linha1, $linha2);
     $lpc_cabo9 = aux::GeralPorLinhaEDiagRM($atual9, 25, $linha1, $linha2);
     $lpc_umidade_sujeira9 = aux::GeralPorLinhaEDiagRM($atual9, 26, $linha1, $linha2);
     $lpc_isolamento_danificado9 = aux::GeralPorLinhaEDiagRM($atual9, 27, $linha1, $linha2);

     $lpc_umidade10 = aux::GeralPorLinhaEDiagRM($atual10, 22, $linha1, $linha2);
     $lpc_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 23, $linha1, $linha2);
     $lpc_curto_espiras10 = aux::GeralPorLinhaEDiagRM($atual10, 24, $linha1, $linha2);
     $lpc_cabo10 = aux::GeralPorLinhaEDiagRM($atual10, 25, $linha1, $linha2);
     $lpc_umidade_sujeira10 = aux::GeralPorLinhaEDiagRM($atual10, 26, $linha1, $linha2);
     $lpc_isolamento_danificado10 = aux::GeralPorLinhaEDiagRM($atual10, 27, $linha1, $linha2);

     $lpc_umidade11 = aux::GeralPorLinhaEDiagRM($atual11, 22, $linha1, $linha2);
     $lpc_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 23, $linha1, $linha2);
     $lpc_curto_espiras11 = aux::GeralPorLinhaEDiagRM($atual11, 24, $linha1, $linha2);
     $lpc_cabo11 = aux::GeralPorLinhaEDiagRM($atual11, 25, $linha1, $linha2);
     $lpc_umidade_sujeira11 = aux::GeralPorLinhaEDiagRM($atual11, 26, $linha1, $linha2);
     $lpc_isolamento_danificado11 = aux::GeralPorLinhaEDiagRM($atual11, 27, $linha1, $linha2);

     $lpc_umidade12 = aux::GeralPorLinhaEDiagRM($atual12, 22, $linha1, $linha2);
     $lpc_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 23, $linha1, $linha2);
     $lpc_curto_espiras12 = aux::GeralPorLinhaEDiagRM($atual12, 24, $linha1, $linha2);
     $lpc_cabo12 = aux::GeralPorLinhaEDiagRM($atual12, 25, $linha1, $linha2);
     $lpc_umidade_sujeira12 = aux::GeralPorLinhaEDiagRM($atual12, 26, $linha1, $linha2);
     $lpc_isolamento_danificado12 = aux::GeralPorLinhaEDiagRM($atual12, 27, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.lpc-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lpc_umidade1', $lpc_umidade1)->with('lpc_sujeira1', $lpc_sujeira1)->with('lpc_curto_espiras1', $lpc_curto_espiras1)->with('lpc_cabo1', $lpc_cabo1)->with('lpc_umidade_sujeira1', $lpc_umidade_sujeira1)->with('lpc_isolamento_danificado1', $lpc_isolamento_danificado1)
       ->with('atualf2', $atualf2)->with('lpc_umidade2', $lpc_umidade2)->with('lpc_sujeira2', $lpc_sujeira2)->with('lpc_curto_espiras2', $lpc_curto_espiras2)->with('lpc_cabo2', $lpc_cabo2)->with('lpc_umidade_sujeira2', $lpc_umidade_sujeira2)->with('lpc_isolamento_danificado2', $lpc_isolamento_danificado2)
       ->with('atualf3', $atualf3)->with('lpc_umidade3', $lpc_umidade3)->with('lpc_sujeira3', $lpc_sujeira3)->with('lpc_curto_espiras3', $lpc_curto_espiras3)->with('lpc_cabo3', $lpc_cabo3)->with('lpc_umidade_sujeira3', $lpc_umidade_sujeira3)->with('lpc_isolamento_danificado3', $lpc_isolamento_danificado3)
       ->with('atualf4', $atualf4)->with('lpc_umidade4', $lpc_umidade4)->with('lpc_sujeira4', $lpc_sujeira4)->with('lpc_curto_espiras4', $lpc_curto_espiras4)->with('lpc_cabo4', $lpc_cabo4)->with('lpc_umidade_sujeira4', $lpc_umidade_sujeira4)->with('lpc_isolamento_danificado4', $lpc_isolamento_danificado4)
       ->with('atualf5', $atualf5)->with('lpc_umidade5', $lpc_umidade5)->with('lpc_sujeira5', $lpc_sujeira5)->with('lpc_curto_espiras5', $lpc_curto_espiras5)->with('lpc_cabo5', $lpc_cabo5)->with('lpc_umidade_sujeira5', $lpc_umidade_sujeira5)->with('lpc_isolamento_danificado5', $lpc_isolamento_danificado5)
       ->with('atualf6', $atualf6)->with('lpc_umidade6', $lpc_umidade6)->with('lpc_sujeira6', $lpc_sujeira6)->with('lpc_curto_espiras6', $lpc_curto_espiras6)->with('lpc_cabo6', $lpc_cabo6)->with('lpc_umidade_sujeira6', $lpc_umidade_sujeira6)->with('lpc_isolamento_danificado6', $lpc_isolamento_danificado6)
       ->with('atualf7', $atualf7)->with('lpc_umidade7', $lpc_umidade7)->with('lpc_sujeira7', $lpc_sujeira7)->with('lpc_curto_espiras7', $lpc_curto_espiras7)->with('lpc_cabo7', $lpc_cabo7)->with('lpc_umidade_sujeira7', $lpc_umidade_sujeira7)->with('lpc_isolamento_danificado7', $lpc_isolamento_danificado7)
       ->with('atualf8', $atualf8)->with('lpc_umidade8', $lpc_umidade8)->with('lpc_sujeira8', $lpc_sujeira8)->with('lpc_curto_espiras8', $lpc_curto_espiras8)->with('lpc_cabo8', $lpc_cabo8)->with('lpc_umidade_sujeira8', $lpc_umidade_sujeira8)->with('lpc_isolamento_danificado8', $lpc_isolamento_danificado8)
       ->with('atualf9', $atualf9)->with('lpc_umidade9', $lpc_umidade9)->with('lpc_sujeira9', $lpc_sujeira9)->with('lpc_curto_espiras9', $lpc_curto_espiras9)->with('lpc_cabo9', $lpc_cabo9)->with('lpc_umidade_sujeira9', $lpc_umidade_sujeira9)->with('lpc_isolamento_danificado9', $lpc_isolamento_danificado9)
       ->with('atualf10', $atualf10)->with('lpc_umidade10', $lpc_umidade10)->with('lpc_sujeira10', $lpc_sujeira10)->with('lpc_curto_espiras10', $lpc_curto_espiras10)->with('lpc_cabo10', $lpc_cabo10)->with('lpc_umidade_sujeira10', $lpc_umidade_sujeira10)->with('lpc_isolamento_danificado10', $lpc_isolamento_danificado10)
       ->with('atualf11', $atualf11)->with('lpc_umidade11', $lpc_umidade11)->with('lpc_sujeira11', $lpc_sujeira11)->with('lpc_curto_espiras11', $lpc_curto_espiras11)->with('lpc_cabo11', $lpc_cabo11)->with('lpc_umidade_sujeira11', $lpc_umidade_sujeira11)->with('lpc_isolamento_danificado11', $lpc_isolamento_danificado11)
       ->with('atualf12', $atualf12)->with('lpc_umidade12', $lpc_umidade12)->with('lpc_sujeira12', $lpc_sujeira12)->with('lpc_curto_espiras12', $lpc_curto_espiras12)->with('lpc_cabo12', $lpc_cabo12)->with('lpc_umidade_sujeira12', $lpc_umidade_sujeira12)->with('lpc_isolamento_danificado12', $lpc_isolamento_danificado12);
   }

   public function CsPerfil() {

     $title = 'Perfil | CS';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 6;


     $cs_manutencao = aux::GeralPorLinha2RM($atual1, 1, $parent);
     $cs_standBy = aux::GeralPorLinha2RM($atual1, 2, $parent);
     $cs_normal = aux::GeralPorLinha2RM($atual1, 3, $parent);
     $cs_alarme = aux::GeralPorLinha2RM($atual1, 4, $parent);
     $cs_critico = aux::GeralPorLinha2RM($atual1, 5, $parent);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

      return view('csn.relatorioGerencial.includes.indexRelGerRM_cs_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $cs_normal1 = aux::GeralPorLinha2RM($atual1, 3, $parent);
     $cs_alarme1 = aux::GeralPorLinha2RM($atual1, 4, $parent);
     $cs_critico1 = aux::GeralPorLinha2RM($atual1, 5, $parent);

     $cs_normal2 = aux::GeralPorLinha2RM($atual2, 3, $parent);
     $cs_alarme2 = aux::GeralPorLinha2RM($atual2, 4, $parent);
     $cs_critico2 = aux::GeralPorLinha2RM($atual2, 5, $parent);

     $cs_normal3 = aux::GeralPorLinha2RM($atual3, 3, $parent);
     $cs_alarme3 = aux::GeralPorLinha2RM($atual3, 4, $parent);
     $cs_critico3 = aux::GeralPorLinha2RM($atual3, 5, $parent);

     $cs_normal4 = aux::GeralPorLinha2RM($atual4, 3, $parent);
     $cs_alarme4 = aux::GeralPorLinha2RM($atual4, 4, $parent);
     $cs_critico4 = aux::GeralPorLinha2RM($atual4, 5, $parent);

     $cs_normal5 = aux::GeralPorLinha2RM($atual5, 3, $parent);
     $cs_alarme5 = aux::GeralPorLinha2RM($atual5, 4, $parent);
     $cs_critico5 = aux::GeralPorLinha2RM($atual5, 5, $parent);

     $cs_normal6 = aux::GeralPorLinha2RM($atual6, 3, $parent);
     $cs_alarme6 = aux::GeralPorLinha2RM($atual6, 4, $parent);
     $cs_critico6 = aux::GeralPorLinha2RM($atual6, 5, $parent);

     $cs_normal7 = aux::GeralPorLinha2RM($atual7, 3, $parent);
     $cs_alarme7 = aux::GeralPorLinha2RM($atual7, 4, $parent);
     $cs_critico7 = aux::GeralPorLinha2RM($atual7, 5, $parent);

     $cs_normal8 = aux::GeralPorLinha2RM($atual8, 3, $parent);
     $cs_alarme8 = aux::GeralPorLinha2RM($atual8, 4, $parent);
     $cs_critico8 = aux::GeralPorLinha2RM($atual8, 5, $parent);

     $cs_normal9 = aux::GeralPorLinha2RM($atual9, 3, $parent);
     $cs_alarme9 = aux::GeralPorLinha2RM($atual9, 4, $parent);
     $cs_critico9 = aux::GeralPorLinha2RM($atual9, 5, $parent);

     $cs_normal10 = aux::GeralPorLinha2RM($atual10, 3, $parent);
     $cs_alarme10 = aux::GeralPorLinha2RM($atual10, 4, $parent);
     $cs_critico10 = aux::GeralPorLinha2RM($atual10, 5, $parent);

     $cs_normal11 = aux::GeralPorLinha2RM($atual11, 3, $parent);
     $cs_alarme11 = aux::GeralPorLinha2RM($atual11, 4, $parent);
     $cs_critico11 = aux::GeralPorLinha2RM($atual11, 5, $parent);

     $cs_normal12 = aux::GeralPorLinha2RM($atual12, 3, $parent);
     $cs_alarme12 = aux::GeralPorLinha2RM($atual12, 4, $parent);
     $cs_critico12 = aux::GeralPorLinha2RM($atual12, 5, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.cs-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $alarme1P = aux::GeralPorLinha2RM($atual1, 4, $parent);
     $critico1P = aux::GeralPorLinha2RM($atual1, 5, $parent);
     $alarme2P = aux::GeralPorLinha2RM($atual2, 4, $parent);
     $critico2P = aux::GeralPorLinha2RM($atual2, 5, $parent);
     $alarme3P = aux::GeralPorLinha2RM($atual3, 4, $parent);
     $critico3P = aux::GeralPorLinha2RM($atual3, 5, $parent);
     $alarme4P = aux::GeralPorLinha2RM($atual4, 4, $parent);
     $critico4P = aux::GeralPorLinha2RM($atual4, 5, $parent);
     $alarme5P = aux::GeralPorLinha2RM($atual5, 4, $parent);
     $critico5P = aux::GeralPorLinha2RM($atual5, 5, $parent);
     $alarme6P = aux::GeralPorLinha2RM($atual6, 4, $parent);
     $critico6P = aux::GeralPorLinha2RM($atual6, 5, $parent);
     $alarme7P = aux::GeralPorLinha2RM($atual7, 4, $parent);
     $critico7P = aux::GeralPorLinha2RM($atual7, 5, $parent);
     $alarme8P = aux::GeralPorLinha2RM($atual8, 4, $parent);
     $critico8P = aux::GeralPorLinha2RM($atual8, 5, $parent);
     $alarme9P = aux::GeralPorLinha2RM($atual9, 4, $parent);
     $critico9P = aux::GeralPorLinha2RM($atual9, 5, $parent);
     $alarme10P = aux::GeralPorLinha2RM($atual10, 4, $parent);
     $critico10P = aux::GeralPorLinha2RM($atual10, 5, $parent);
     $alarme11P = aux::GeralPorLinha2RM($atual11, 4, $parent);
     $critico11P = aux::GeralPorLinha2RM($atual11, 5, $parent);
     $alarme12P = aux::GeralPorLinha2RM($atual12, 4, $parent);
     $critico12P = aux::GeralPorLinha2RM($atual12, 5, $parent);


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

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.cs-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $cs_umidade1 = aux::GeralPorLinhaEDiag2RM($atual1, 22, $parent);
     $cs_sujeira1 = aux::GeralPorLinhaEDiag2RM($atual1, 23, $parent);
     $cs_curto_espiras1 = aux::GeralPorLinhaEDiag2RM($atual1, 24, $parent);
     $cs_cabo1 = aux::GeralPorLinhaEDiag2RM($atual1, 25, $parent);
     $cs_umidade_sujeira1 = aux::GeralPorLinhaEDiag2RM($atual1, 26, $parent);
     $cs_isolamento_danificado1 = aux::GeralPorLinhaEDiag2RM($atual1, 27, $parent);

     $cs_umidade2 = aux::GeralPorLinhaEDiag2RM($atual2, 22, $parent);
     $cs_sujeira2 = aux::GeralPorLinhaEDiag2RM($atual2, 23, $parent);
     $cs_curto_espiras2 = aux::GeralPorLinhaEDiag2RM($atual2, 24, $parent);
     $cs_cabo2 = aux::GeralPorLinhaEDiag2RM($atual2, 25, $parent);
     $cs_umidade_sujeira2 = aux::GeralPorLinhaEDiag2RM($atual2, 26, $parent);
     $cs_isolamento_danificado2 = aux::GeralPorLinhaEDiag2RM($atual2, 27, $parent);

     $cs_umidade3 = aux::GeralPorLinhaEDiag2RM($atual3, 22, $parent);
     $cs_sujeira3 = aux::GeralPorLinhaEDiag2RM($atual3, 23, $parent);
     $cs_curto_espiras3 = aux::GeralPorLinhaEDiag2RM($atual3, 24, $parent);
     $cs_cabo3 = aux::GeralPorLinhaEDiag2RM($atual3, 25, $parent);
     $cs_umidade_sujeira3 = aux::GeralPorLinhaEDiag2RM($atual3, 26, $parent);
     $cs_isolamento_danificado3 = aux::GeralPorLinhaEDiag2RM($atual3, 27, $parent);

     $cs_umidade4 = aux::GeralPorLinhaEDiag2RM($atual4, 22, $parent);
     $cs_sujeira4 = aux::GeralPorLinhaEDiag2RM($atual4, 23, $parent);
     $cs_curto_espiras4 = aux::GeralPorLinhaEDiag2RM($atual4, 24, $parent);
     $cs_cabo4 = aux::GeralPorLinhaEDiag2RM($atual4, 25, $parent);
     $cs_umidade_sujeira4 = aux::GeralPorLinhaEDiag2RM($atual4, 26, $parent);
     $cs_isolamento_danificado4 = aux::GeralPorLinhaEDiag2RM($atual4, 27, $parent);

     $cs_umidade5 = aux::GeralPorLinhaEDiag2RM($atual5, 22, $parent);
     $cs_sujeira5 = aux::GeralPorLinhaEDiag2RM($atual5, 23, $parent);
     $cs_curto_espiras5 = aux::GeralPorLinhaEDiag2RM($atual5, 24, $parent);
     $cs_cabo5 = aux::GeralPorLinhaEDiag2RM($atual5, 25, $parent);
     $cs_umidade_sujeira5 = aux::GeralPorLinhaEDiag2RM($atual5, 26, $parent);
     $cs_isolamento_danificado5 = aux::GeralPorLinhaEDiag2RM($atual5, 27, $parent);

     $cs_umidade6 = aux::GeralPorLinhaEDiag2RM($atual6, 22, $parent);
     $cs_sujeira6 = aux::GeralPorLinhaEDiag2RM($atual6, 23, $parent);
     $cs_curto_espiras6 = aux::GeralPorLinhaEDiag2RM($atual6, 24, $parent);
     $cs_cabo6 = aux::GeralPorLinhaEDiag2RM($atual6, 25, $parent);
     $cs_umidade_sujeira6 = aux::GeralPorLinhaEDiag2RM($atual6, 26, $parent);
     $cs_isolamento_danificado6 = aux::GeralPorLinhaEDiag2RM($atual6, 27, $parent);

     $cs_umidade7 = aux::GeralPorLinhaEDiag2RM($atual7, 22, $parent);
     $cs_sujeira7 = aux::GeralPorLinhaEDiag2RM($atual7, 23, $parent);
     $cs_curto_espiras7 = aux::GeralPorLinhaEDiag2RM($atual7, 24, $parent);
     $cs_cabo7 = aux::GeralPorLinhaEDiag2RM($atual7, 25, $parent);
     $cs_umidade_sujeira7 = aux::GeralPorLinhaEDiag2RM($atual7, 26, $parent);
     $cs_isolamento_danificado7 = aux::GeralPorLinhaEDiag2RM($atual7, 27, $parent);

     $cs_umidade8 = aux::GeralPorLinhaEDiag2RM($atual8, 22, $parent);
     $cs_sujeira8 = aux::GeralPorLinhaEDiag2RM($atual8, 23, $parent);
     $cs_curto_espiras8 = aux::GeralPorLinhaEDiag2RM($atual8, 24, $parent);
     $cs_cabo8 = aux::GeralPorLinhaEDiag2RM($atual8, 25, $parent);
     $cs_umidade_sujeira8 = aux::GeralPorLinhaEDiag2RM($atual8, 26, $parent);
     $cs_isolamento_danificado8 = aux::GeralPorLinhaEDiag2RM($atual8, 27, $parent);

     $cs_umidade9 = aux::GeralPorLinhaEDiag2RM($atual9, 22, $parent);
     $cs_sujeira9 = aux::GeralPorLinhaEDiag2RM($atual9, 23, $parent);
     $cs_curto_espiras9 = aux::GeralPorLinhaEDiag2RM($atual9, 24, $parent);
     $cs_cabo9 = aux::GeralPorLinhaEDiag2RM($atual9, 25, $parent);
     $cs_umidade_sujeira9 = aux::GeralPorLinhaEDiag2RM($atual9, 26, $parent);
     $cs_isolamento_danificado9 = aux::GeralPorLinhaEDiag2RM($atual9, 27, $parent);

     $cs_umidade10 = aux::GeralPorLinhaEDiag2RM($atual10, 22, $parent);
     $cs_sujeira10 = aux::GeralPorLinhaEDiag2RM($atual10, 23, $parent);
     $cs_curto_espiras10 = aux::GeralPorLinhaEDiag2RM($atual10, 24, $parent);
     $cs_cabo10 = aux::GeralPorLinhaEDiag2RM($atual10, 25, $parent);
     $cs_umidade_sujeira10 = aux::GeralPorLinhaEDiag2RM($atual10, 26, $parent);
     $cs_isolamento_danificado10 = aux::GeralPorLinhaEDiag2RM($atual10, 27, $parent);

     $cs_umidade11 = aux::GeralPorLinhaEDiag2RM($atual11, 22, $parent);
     $cs_sujeira11 = aux::GeralPorLinhaEDiag2RM($atual11, 23, $parent);
     $cs_curto_espiras11 = aux::GeralPorLinhaEDiag2RM($atual11, 24, $parent);
     $cs_cabo11 = aux::GeralPorLinhaEDiag2RM($atual11, 25, $parent);
     $cs_umidade_sujeira11 = aux::GeralPorLinhaEDiag2RM($atual11, 26, $parent);
     $cs_isolamento_danificado11 = aux::GeralPorLinhaEDiag2RM($atual11, 27, $parent);

     $cs_umidade12 = aux::GeralPorLinhaEDiag2RM($atual12, 22, $parent);
     $cs_sujeira12 = aux::GeralPorLinhaEDiag2RM($atual12, 23, $parent);
     $cs_curto_espiras12 = aux::GeralPorLinhaEDiag2RM($atual12, 24, $parent);
     $cs_cabo12 = aux::GeralPorLinhaEDiag2RM($atual12, 25, $parent);
     $cs_umidade_sujeira12 = aux::GeralPorLinhaEDiag2RM($atual12, 26, $parent);
     $cs_isolamento_danificado12 = aux::GeralPorLinhaEDiag2RM($atual12, 27, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.cs-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('cs_umidade1', $cs_umidade1)->with('cs_sujeira1', $cs_sujeira1)->with('cs_curto_espiras1', $cs_curto_espiras1)->with('cs_cabo1', $cs_cabo1)->with('cs_umidade_sujeira1', $cs_umidade_sujeira1)->with('cs_isolamento_danificado1', $cs_isolamento_danificado1)
       ->with('atualf2', $atualf2)->with('cs_umidade2', $cs_umidade2)->with('cs_sujeira2', $cs_sujeira2)->with('cs_curto_espiras2', $cs_curto_espiras2)->with('cs_cabo2', $cs_cabo2)->with('cs_umidade_sujeira2', $cs_umidade_sujeira2)->with('cs_isolamento_danificado2', $cs_isolamento_danificado2)
       ->with('atualf3', $atualf3)->with('cs_umidade3', $cs_umidade3)->with('cs_sujeira3', $cs_sujeira3)->with('cs_curto_espiras3', $cs_curto_espiras3)->with('cs_cabo3', $cs_cabo3)->with('cs_umidade_sujeira3', $cs_umidade_sujeira3)->with('cs_isolamento_danificado3', $cs_isolamento_danificado3)
       ->with('atualf4', $atualf4)->with('cs_umidade4', $cs_umidade4)->with('cs_sujeira4', $cs_sujeira4)->with('cs_curto_espiras4', $cs_curto_espiras4)->with('cs_cabo4', $cs_cabo4)->with('cs_umidade_sujeira4', $cs_umidade_sujeira4)->with('cs_isolamento_danificado4', $cs_isolamento_danificado4)
       ->with('atualf5', $atualf5)->with('cs_umidade5', $cs_umidade5)->with('cs_sujeira5', $cs_sujeira5)->with('cs_curto_espiras5', $cs_curto_espiras5)->with('cs_cabo5', $cs_cabo5)->with('cs_umidade_sujeira5', $cs_umidade_sujeira5)->with('cs_isolamento_danificado5', $cs_isolamento_danificado5)
       ->with('atualf6', $atualf6)->with('cs_umidade6', $cs_umidade6)->with('cs_sujeira6', $cs_sujeira6)->with('cs_curto_espiras6', $cs_curto_espiras6)->with('cs_cabo6', $cs_cabo6)->with('cs_umidade_sujeira6', $cs_umidade_sujeira6)->with('cs_isolamento_danificado6', $cs_isolamento_danificado6)
       ->with('atualf7', $atualf7)->with('cs_umidade7', $cs_umidade7)->with('cs_sujeira7', $cs_sujeira7)->with('cs_curto_espiras7', $cs_curto_espiras7)->with('cs_cabo7', $cs_cabo7)->with('cs_umidade_sujeira7', $cs_umidade_sujeira7)->with('cs_isolamento_danificado7', $cs_isolamento_danificado7)
       ->with('atualf8', $atualf8)->with('cs_umidade8', $cs_umidade8)->with('cs_sujeira8', $cs_sujeira8)->with('cs_curto_espiras8', $cs_curto_espiras8)->with('cs_cabo8', $cs_cabo8)->with('cs_umidade_sujeira8', $cs_umidade_sujeira8)->with('cs_isolamento_danificado8', $cs_isolamento_danificado8)
       ->with('atualf9', $atualf9)->with('cs_umidade9', $cs_umidade9)->with('cs_sujeira9', $cs_sujeira9)->with('cs_curto_espiras9', $cs_curto_espiras9)->with('cs_cabo9', $cs_cabo9)->with('cs_umidade_sujeira9', $cs_umidade_sujeira9)->with('cs_isolamento_danificado9', $cs_isolamento_danificado9)
       ->with('atualf10', $atualf10)->with('cs_umidade10', $cs_umidade10)->with('cs_sujeira10', $cs_sujeira10)->with('cs_curto_espiras10', $cs_curto_espiras10)->with('cs_cabo10', $cs_cabo10)->with('cs_umidade_sujeira10', $cs_umidade_sujeira10)->with('cs_isolamento_danificado10', $cs_isolamento_danificado10)
       ->with('atualf11', $atualf11)->with('cs_umidade11', $cs_umidade11)->with('cs_sujeira11', $cs_sujeira11)->with('cs_curto_espiras11', $cs_curto_espiras11)->with('cs_cabo11', $cs_cabo11)->with('cs_umidade_sujeira11', $cs_umidade_sujeira11)->with('cs_isolamento_danificado11', $cs_isolamento_danificado11)
       ->with('atualf12', $atualf12)->with('cs_umidade12', $cs_umidade12)->with('cs_sujeira12', $cs_sujeira12)->with('cs_curto_espiras12', $cs_curto_espiras12)->with('cs_cabo12', $cs_cabo12)->with('cs_umidade_sujeira12', $cs_umidade_sujeira12)->with('cs_isolamento_danificado12', $cs_isolamento_danificado12);
   }

   public function PrPerfil() {

     $title = 'Perfil | Pontes Rolantes';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 8;


     $pr_manutencao = aux::GeralPorLinha2RM($atual1, 1, $parent);
     $pr_standBy = aux::GeralPorLinha2RM($atual1, 2, $parent);
     $pr_normal = aux::GeralPorLinha2RM($atual1, 3, $parent);
     $pr_alarme = aux::GeralPorLinha2RM($atual1, 4, $parent);
     $pr_critico = aux::GeralPorLinha2RM($atual1, 5, $parent);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 5)
                ->count('preditiva_atividades.id');

    if($sum == 0){
      $manutencaoP_format = 0;
      $standByP_format = 0;
      $normalP_format = 0;
      $alarmeP_format = 0;
      $criticoP_format = 0;
    } else {
      $manutencaoP_format = ($pr_manutencao / $sum)*100;
      $standByP_format = ($pr_standBy / $sum)*100;
      $normalP_format = ($pr_normal / $sum)*100;
      $alarmeP_format = ($pr_alarme / $sum)*100;
      $criticoP_format = ($pr_critico / $sum)*100;
    }
    $pr_manutencaoP = number_format($manutencaoP_format,2,".",",");
    $pr_standByP = number_format($standByP_format,2,".",",");
    $pr_normalP = number_format($normalP_format,2,".",",");
    $pr_alarmeP = number_format($alarmeP_format,2,".",",");
    $pr_criticoP = number_format($criticoP_format,2,".",",");

      return view('csn.relatorioGerencial.includes.indexRelGerRM_pr_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $pr_normal1 = aux::GeralPorLinha2RM($atual1, 3, $parent);
     $pr_alarme1 = aux::GeralPorLinha2RM($atual1, 4, $parent);
     $pr_critico1 = aux::GeralPorLinha2RM($atual1, 5, $parent);

     $pr_normal2 = aux::GeralPorLinha2RM($atual2, 3, $parent);
     $pr_alarme2 = aux::GeralPorLinha2RM($atual2, 4, $parent);
     $pr_critico2 = aux::GeralPorLinha2RM($atual2, 5, $parent);

     $pr_normal3 = aux::GeralPorLinha2RM($atual3, 3, $parent);
     $pr_alarme3 = aux::GeralPorLinha2RM($atual3, 4, $parent);
     $pr_critico3 = aux::GeralPorLinha2RM($atual3, 5, $parent);

     $pr_normal4 = aux::GeralPorLinha2RM($atual4, 3, $parent);
     $pr_alarme4 = aux::GeralPorLinha2RM($atual4, 4, $parent);
     $pr_critico4 = aux::GeralPorLinha2RM($atual4, 5, $parent);

     $pr_normal5 = aux::GeralPorLinha2RM($atual5, 3, $parent);
     $pr_alarme5 = aux::GeralPorLinha2RM($atual5, 4, $parent);
     $pr_critico5 = aux::GeralPorLinha2RM($atual5, 5, $parent);

     $pr_normal6 = aux::GeralPorLinha2RM($atual6, 3, $parent);
     $pr_alarme6 = aux::GeralPorLinha2RM($atual6, 4, $parent);
     $pr_critico6 = aux::GeralPorLinha2RM($atual6, 5, $parent);

     $pr_normal7 = aux::GeralPorLinha2RM($atual7, 3, $parent);
     $pr_alarme7 = aux::GeralPorLinha2RM($atual7, 4, $parent);
     $pr_critico7 = aux::GeralPorLinha2RM($atual7, 5, $parent);

     $pr_normal8 = aux::GeralPorLinha2RM($atual8, 3, $parent);
     $pr_alarme8 = aux::GeralPorLinha2RM($atual8, 4, $parent);
     $pr_critico8 = aux::GeralPorLinha2RM($atual8, 5, $parent);

     $pr_normal9 = aux::GeralPorLinha2RM($atual9, 3, $parent);
     $pr_alarme9 = aux::GeralPorLinha2RM($atual9, 4, $parent);
     $pr_critico9 = aux::GeralPorLinha2RM($atual9, 5, $parent);

     $pr_normal10 = aux::GeralPorLinha2RM($atual10, 3, $parent);
     $pr_alarme10 = aux::GeralPorLinha2RM($atual10, 4, $parent);
     $pr_critico10 = aux::GeralPorLinha2RM($atual10, 5, $parent);

     $pr_normal11 = aux::GeralPorLinha2RM($atual11, 3, $parent);
     $pr_alarme11 = aux::GeralPorLinha2RM($atual11, 4, $parent);
     $pr_critico11 = aux::GeralPorLinha2RM($atual11, 5, $parent);

     $pr_normal12 = aux::GeralPorLinha2RM($atual12, 3, $parent);
     $pr_alarme12 = aux::GeralPorLinha2RM($atual12, 4, $parent);
     $pr_critico12 = aux::GeralPorLinha2RM($atual12, 5, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.pr-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $alarme1P = aux::GeralPorLinha2RM($atual1, 4, $parent);
     $critico1P = aux::GeralPorLinha2RM($atual1, 5, $parent);
     $alarme2P = aux::GeralPorLinha2RM($atual2, 4, $parent);
     $critico2P = aux::GeralPorLinha2RM($atual2, 5, $parent);
     $alarme3P = aux::GeralPorLinha2RM($atual3, 4, $parent);
     $critico3P = aux::GeralPorLinha2RM($atual3, 5, $parent);
     $alarme4P = aux::GeralPorLinha2RM($atual4, 4, $parent);
     $critico4P = aux::GeralPorLinha2RM($atual4, 5, $parent);
     $alarme5P = aux::GeralPorLinha2RM($atual5, 4, $parent);
     $critico5P = aux::GeralPorLinha2RM($atual5, 5, $parent);
     $alarme6P = aux::GeralPorLinha2RM($atual6, 4, $parent);
     $critico6P = aux::GeralPorLinha2RM($atual6, 5, $parent);
     $alarme7P = aux::GeralPorLinha2RM($atual7, 4, $parent);
     $critico7P = aux::GeralPorLinha2RM($atual7, 5, $parent);
     $alarme8P = aux::GeralPorLinha2RM($atual8, 4, $parent);
     $critico8P = aux::GeralPorLinha2RM($atual8, 5, $parent);
     $alarme9P = aux::GeralPorLinha2RM($atual9, 4, $parent);
     $critico9P = aux::GeralPorLinha2RM($atual9, 5, $parent);
     $alarme10P = aux::GeralPorLinha2RM($atual10, 4, $parent);
     $critico10P = aux::GeralPorLinha2RM($atual10, 5, $parent);
     $alarme11P = aux::GeralPorLinha2RM($atual11, 4, $parent);
     $critico11P = aux::GeralPorLinha2RM($atual11, 5, $parent);
     $alarme12P = aux::GeralPorLinha2RM($atual12, 4, $parent);
     $critico12P = aux::GeralPorLinha2RM($atual12, 5, $parent);

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

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.pr-anormalidades')->with('title', $title)->with('sum', $sum)
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

     $title = 'Problemas Encontrados | CS';
     $parent = 8;

     $sum = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.parent_id', '=', 8)
                 ->where('preditiva_atividades.tecnicas_id', '=', 5)
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

     $pr_umidade1 = aux::GeralPorLinhaEDiag2RM($atual1, 22, $parent);
     $pr_sujeira1 = aux::GeralPorLinhaEDiag2RM($atual1, 23, $parent);
     $pr_curto_espiras1 = aux::GeralPorLinhaEDiag2RM($atual1, 24, $parent);
     $pr_cabo1 = aux::GeralPorLinhaEDiag2RM($atual1, 25, $parent);
     $pr_umidade_sujeira1 = aux::GeralPorLinhaEDiag2RM($atual1, 26, $parent);
     $pr_isolamento_danificado1 = aux::GeralPorLinhaEDiag2RM($atual1, 27, $parent);

     $pr_umidade2 = aux::GeralPorLinhaEDiag2RM($atual2, 22, $parent);
     $pr_sujeira2 = aux::GeralPorLinhaEDiag2RM($atual2, 23, $parent);
     $pr_curto_espiras2 = aux::GeralPorLinhaEDiag2RM($atual2, 24, $parent);
     $pr_cabo2 = aux::GeralPorLinhaEDiag2RM($atual2, 25, $parent);
     $pr_umidade_sujeira2 = aux::GeralPorLinhaEDiag2RM($atual2, 26, $parent);
     $pr_isolamento_danificado2 = aux::GeralPorLinhaEDiag2RM($atual2, 27, $parent);

     $pr_umidade3 = aux::GeralPorLinhaEDiag2RM($atual3, 22, $parent);
     $pr_sujeira3 = aux::GeralPorLinhaEDiag2RM($atual3, 23, $parent);
     $pr_curto_espiras3 = aux::GeralPorLinhaEDiag2RM($atual3, 24, $parent);
     $pr_cabo3 = aux::GeralPorLinhaEDiag2RM($atual3, 25, $parent);
     $pr_umidade_sujeira3 = aux::GeralPorLinhaEDiag2RM($atual3, 26, $parent);
     $pr_isolamento_danificado3 = aux::GeralPorLinhaEDiag2RM($atual3, 27, $parent);

     $pr_umidade4 = aux::GeralPorLinhaEDiag2RM($atual4, 22, $parent);
     $pr_sujeira4 = aux::GeralPorLinhaEDiag2RM($atual4, 23, $parent);
     $pr_curto_espiras4 = aux::GeralPorLinhaEDiag2RM($atual4, 24, $parent);
     $pr_cabo4 = aux::GeralPorLinhaEDiag2RM($atual4, 25, $parent);
     $pr_umidade_sujeira4 = aux::GeralPorLinhaEDiag2RM($atual4, 26, $parent);
     $pr_isolamento_danificado4 = aux::GeralPorLinhaEDiag2RM($atual4, 27, $parent);

     $pr_umidade5 = aux::GeralPorLinhaEDiag2RM($atual5, 22, $parent);
     $pr_sujeira5 = aux::GeralPorLinhaEDiag2RM($atual5, 23, $parent);
     $pr_curto_espiras5 = aux::GeralPorLinhaEDiag2RM($atual5, 24, $parent);
     $pr_cabo5 = aux::GeralPorLinhaEDiag2RM($atual5, 25, $parent);
     $pr_umidade_sujeira5 = aux::GeralPorLinhaEDiag2RM($atual5, 26, $parent);
     $pr_isolamento_danificado5 = aux::GeralPorLinhaEDiag2RM($atual5, 27, $parent);

     $pr_umidade6 = aux::GeralPorLinhaEDiag2RM($atual6, 22, $parent);
     $pr_sujeira6 = aux::GeralPorLinhaEDiag2RM($atual6, 23, $parent);
     $pr_curto_espiras6 = aux::GeralPorLinhaEDiag2RM($atual6, 24, $parent);
     $pr_cabo6 = aux::GeralPorLinhaEDiag2RM($atual6, 25, $parent);
     $pr_umidade_sujeira6 = aux::GeralPorLinhaEDiag2RM($atual6, 26, $parent);
     $pr_isolamento_danificado6 = aux::GeralPorLinhaEDiag2RM($atual6, 27, $parent);

     $pr_umidade7 = aux::GeralPorLinhaEDiag2RM($atual7, 22, $parent);
     $pr_sujeira7 = aux::GeralPorLinhaEDiag2RM($atual7, 23, $parent);
     $pr_curto_espiras7 = aux::GeralPorLinhaEDiag2RM($atual7, 24, $parent);
     $pr_cabo7 = aux::GeralPorLinhaEDiag2RM($atual7, 25, $parent);
     $pr_umidade_sujeira7 = aux::GeralPorLinhaEDiag2RM($atual7, 26, $parent);
     $pr_isolamento_danificado7 = aux::GeralPorLinhaEDiag2RM($atual7, 27, $parent);

     $pr_umidade8 = aux::GeralPorLinhaEDiag2RM($atual8, 22, $parent);
     $pr_sujeira8 = aux::GeralPorLinhaEDiag2RM($atual8, 23, $parent);
     $pr_curto_espiras8 = aux::GeralPorLinhaEDiag2RM($atual8, 24, $parent);
     $pr_cabo8 = aux::GeralPorLinhaEDiag2RM($atual8, 25, $parent);
     $pr_umidade_sujeira8 = aux::GeralPorLinhaEDiag2RM($atual8, 26, $parent);
     $pr_isolamento_danificado8 = aux::GeralPorLinhaEDiag2RM($atual8, 27, $parent);

     $pr_umidade9 = aux::GeralPorLinhaEDiag2RM($atual9, 22, $parent);
     $pr_sujeira9 = aux::GeralPorLinhaEDiag2RM($atual9, 23, $parent);
     $pr_curto_espiras9 = aux::GeralPorLinhaEDiag2RM($atual9, 24, $parent);
     $pr_cabo9 = aux::GeralPorLinhaEDiag2RM($atual9, 25, $parent);
     $pr_umidade_sujeira9 = aux::GeralPorLinhaEDiag2RM($atual9, 26, $parent);
     $pr_isolamento_danificado9 = aux::GeralPorLinhaEDiag2RM($atual9, 27, $parent);

     $pr_umidade10 = aux::GeralPorLinhaEDiag2RM($atual10, 22, $parent);
     $pr_sujeira10 = aux::GeralPorLinhaEDiag2RM($atual10, 23, $parent);
     $pr_curto_espiras10 = aux::GeralPorLinhaEDiag2RM($atual10, 24, $parent);
     $pr_cabo10 = aux::GeralPorLinhaEDiag2RM($atual10, 25, $parent);
     $pr_umidade_sujeira10 = aux::GeralPorLinhaEDiag2RM($atual10, 26, $parent);
     $pr_isolamento_danificado10 = aux::GeralPorLinhaEDiag2RM($atual10, 27, $parent);

     $pr_umidade11 = aux::GeralPorLinhaEDiag2RM($atual11, 22, $parent);
     $pr_sujeira11 = aux::GeralPorLinhaEDiag2RM($atual11, 23, $parent);
     $pr_curto_espiras11 = aux::GeralPorLinhaEDiag2RM($atual11, 24, $parent);
     $pr_cabo11 = aux::GeralPorLinhaEDiag2RM($atual11, 25, $parent);
     $pr_umidade_sujeira11 = aux::GeralPorLinhaEDiag2RM($atual11, 26, $parent);
     $pr_isolamento_danificado11 = aux::GeralPorLinhaEDiag2RM($atual11, 27, $parent);

     $pr_umidade12 = aux::GeralPorLinhaEDiag2RM($atual12, 22, $parent);
     $pr_sujeira12 = aux::GeralPorLinhaEDiag2RM($atual12, 23, $parent);
     $pr_curto_espiras12 = aux::GeralPorLinhaEDiag2RM($atual12, 24, $parent);
     $pr_cabo12 = aux::GeralPorLinhaEDiag2RM($atual12, 25, $parent);
     $pr_umidade_sujeira12 = aux::GeralPorLinhaEDiag2RM($atual12, 26, $parent);
     $pr_isolamento_danificado12 = aux::GeralPorLinhaEDiag2RM($atual12, 27, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosResistencia.pr-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('pr_umidade1', $pr_umidade1)->with('pr_sujeira1', $pr_sujeira1)->with('pr_curto_espiras1', $pr_curto_espiras1)->with('pr_cabo1', $pr_cabo1)->with('pr_umidade_sujeira1', $pr_umidade_sujeira1)->with('pr_isolamento_danificado1', $pr_isolamento_danificado1)
       ->with('atualf2', $atualf2)->with('pr_umidade2', $pr_umidade2)->with('pr_sujeira2', $pr_sujeira2)->with('pr_curto_espiras2', $pr_curto_espiras2)->with('pr_cabo2', $pr_cabo2)->with('pr_umidade_sujeira2', $pr_umidade_sujeira2)->with('pr_isolamento_danificado2', $pr_isolamento_danificado2)
       ->with('atualf3', $atualf3)->with('pr_umidade3', $pr_umidade3)->with('pr_sujeira3', $pr_sujeira3)->with('pr_curto_espiras3', $pr_curto_espiras3)->with('pr_cabo3', $pr_cabo3)->with('pr_umidade_sujeira3', $pr_umidade_sujeira3)->with('pr_isolamento_danificado3', $pr_isolamento_danificado3)
       ->with('atualf4', $atualf4)->with('pr_umidade4', $pr_umidade4)->with('pr_sujeira4', $pr_sujeira4)->with('pr_curto_espiras4', $pr_curto_espiras4)->with('pr_cabo4', $pr_cabo4)->with('pr_umidade_sujeira4', $pr_umidade_sujeira4)->with('pr_isolamento_danificado4', $pr_isolamento_danificado4)
       ->with('atualf5', $atualf5)->with('pr_umidade5', $pr_umidade5)->with('pr_sujeira5', $pr_sujeira5)->with('pr_curto_espiras5', $pr_curto_espiras5)->with('pr_cabo5', $pr_cabo5)->with('pr_umidade_sujeira5', $pr_umidade_sujeira5)->with('pr_isolamento_danificado5', $pr_isolamento_danificado5)
       ->with('atualf6', $atualf6)->with('pr_umidade6', $pr_umidade6)->with('pr_sujeira6', $pr_sujeira6)->with('pr_curto_espiras6', $pr_curto_espiras6)->with('pr_cabo6', $pr_cabo6)->with('pr_umidade_sujeira6', $pr_umidade_sujeira6)->with('pr_isolamento_danificado6', $pr_isolamento_danificado6)
       ->with('atualf7', $atualf7)->with('pr_umidade7', $pr_umidade7)->with('pr_sujeira7', $pr_sujeira7)->with('pr_curto_espiras7', $pr_curto_espiras7)->with('pr_cabo7', $pr_cabo7)->with('pr_umidade_sujeira7', $pr_umidade_sujeira7)->with('pr_isolamento_danificado7', $pr_isolamento_danificado7)
       ->with('atualf8', $atualf8)->with('pr_umidade8', $pr_umidade8)->with('pr_sujeira8', $pr_sujeira8)->with('pr_curto_espiras8', $pr_curto_espiras8)->with('pr_cabo8', $pr_cabo8)->with('pr_umidade_sujeira8', $pr_umidade_sujeira8)->with('pr_isolamento_danificado8', $pr_isolamento_danificado8)
       ->with('atualf9', $atualf9)->with('pr_umidade9', $pr_umidade9)->with('pr_sujeira9', $pr_sujeira9)->with('pr_curto_espiras9', $pr_curto_espiras9)->with('pr_cabo9', $pr_cabo9)->with('pr_umidade_sujeira9', $pr_umidade_sujeira9)->with('pr_isolamento_danificado9', $pr_isolamento_danificado9)
       ->with('atualf10', $atualf10)->with('pr_umidade10', $pr_umidade10)->with('pr_sujeira10', $pr_sujeira10)->with('pr_curto_espiras10', $pr_curto_espiras10)->with('pr_cabo10', $pr_cabo10)->with('pr_umidade_sujeira10', $pr_umidade_sujeira10)->with('pr_isolamento_danificado10', $pr_isolamento_danificado10)
       ->with('atualf11', $atualf11)->with('pr_umidade11', $pr_umidade11)->with('pr_sujeira11', $pr_sujeira11)->with('pr_curto_espiras11', $pr_curto_espiras11)->with('pr_cabo11', $pr_cabo11)->with('pr_umidade_sujeira11', $pr_umidade_sujeira11)->with('pr_isolamento_danificado11', $pr_isolamento_danificado11)
       ->with('atualf12', $atualf12)->with('pr_umidade12', $pr_umidade12)->with('pr_sujeira12', $pr_sujeira12)->with('pr_curto_espiras12', $pr_curto_espiras12)->with('pr_cabo12', $pr_cabo12)->with('pr_umidade_sujeira12', $pr_umidade_sujeira12)->with('pr_isolamento_danificado12', $pr_isolamento_danificado12);
     }
}
//==========================================fim=================================================================

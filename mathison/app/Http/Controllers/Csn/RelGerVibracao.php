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

class RelGerVibracao extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
  */
  public function GeralPerfil() {

    $title = 'Perfil | GGOP PR';
    $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');

    // ============================================================ GGOP PR
    $manutencao = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 1)->count();
    $standBy = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 2)->count();
    $normal = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 3)->count();
    $alarme = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 4)->count();
    $critico = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 5)->count();

    if($manutencao == null){$manutencao = 0;}
    if($standBy == null){$standBy = 0;}
    if($normal == null){$normal = 0;}
    if($alarme == null){$alarme = 0;}
    if($critico == null){$critico = 0;}

    $sum = Preditiva_atividades::where('tecnicas_id', '=', 3)->count();
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

    $ura_manutencao = aux::GeralPorLinhaVib($atual1, 1, $ura_linha1, $ura_linha2);
    $ura_standBy = aux::GeralPorLinhaVib($atual1, 2, $ura_linha1, $ura_linha2);
    $ura_normal = aux::GeralPorLinhaVib($atual1, 3, $ura_linha1, $ura_linha2);
    $ura_alarme = aux::GeralPorLinhaVib($atual1, 4, $ura_linha1, $ura_linha2);
    $ura_critico = aux::GeralPorLinhaVib($atual1, 5, $ura_linha1, $ura_linha2);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 3)
               ->count('preditiva_atividades.id');

    $ura_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',0)
               ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

    $lds_manutencao = aux::GeralPorLinhaVib($atual1, 1, $lds_linha1, $lds_linha2);
    $lds_standBy = aux::GeralPorLinhaVib($atual1, 2, $lds_linha1, $lds_linha2);
    $lds_normal = aux::GeralPorLinhaVib($atual1, 3, $lds_linha1, $lds_linha2);
    $lds_alarme = aux::GeralPorLinhaVib($atual1, 4, $lds_linha1, $lds_linha2);
    $lds_critico = aux::GeralPorLinhaVib($atual1, 5, $lds_linha1, $lds_linha2);
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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
                ->count('preditiva_atividades.id');

    $lds_sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 22)
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

    $lrf_manutencao = aux::GeralPorLinhaVib($atual1, 1, $lrf_linha1, $lrf_linha2);
    $lrf_standBy = aux::GeralPorLinhaVib($atual1, 2, $lrf_linha1, $lrf_linha2);
    $lrf_normal = aux::GeralPorLinhaVib($atual1, 3, $lrf_linha1, $lrf_linha2);
    $lrf_alarme = aux::GeralPorLinhaVib($atual1, 4, $lrf_linha1, $lrf_linha2);
    $lrf_critico = aux::GeralPorLinhaVib($atual1, 5, $lrf_linha1, $lrf_linha2);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 3)
               ->count('preditiva_atividades.id');

    $lrf_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=', 0)
               ->where('preditiva_atividades.tecnicas_id', '=', 3)
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
    $uti_manutencao = aux::GeralPorLinha2Vib($atual1, 1, $uti_parent);
    $uti_standBy = aux::GeralPorLinha2Vib($atual1, 2, $uti_parent);
    $uti_normal = aux::GeralPorLinha2Vib($atual1, 3, $uti_parent);
    $uti_alarme = aux::GeralPorLinha2Vib($atual1, 4, $uti_parent);
    $uti_critico = aux::GeralPorLinha2Vib($atual1, 5, $uti_parent);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

    $lgc_manutencao = aux::GeralPorLinhaVib($atual1, 1, $lgc_linha1, $lgc_linha2);
    $lgc_standBy = aux::GeralPorLinhaVib($atual1, 2, $lgc_linha1, $lgc_linha2);
    $lgc_normal = aux::GeralPorLinhaVib($atual1, 3, $lgc_linha1, $lgc_linha2);
    $lgc_alarme = aux::GeralPorLinhaVib($atual1, 4, $lgc_linha1, $lgc_linha2);
    $lgc_critico = aux::GeralPorLinhaVib($atual1, 5, $lgc_linha1, $lgc_linha2);
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
              ->where('preditiva_atividades.tecnicas_id', '=', 3)
              ->count('preditiva_atividades.id');

    $lgc_sum2 = DB::table('preditiva_atividades')
              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
              ->where('negocios.id','=',0)
              ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

    $lpc_manutencao = aux::GeralPorLinhaVib($atual1, 1, $lpc_linha1, $lpc_linha2);
    $lpc_standBy = aux::GeralPorLinhaVib($atual1, 2, $lpc_linha1, $lpc_linha2);
    $lpc_normal = aux::GeralPorLinhaVib($atual1, 3, $lpc_linha1, $lpc_linha2);
    $lpc_alarme = aux::GeralPorLinhaVib($atual1, 4, $lpc_linha1, $lpc_linha2);
    $lpc_critico = aux::GeralPorLinhaVib($atual1, 5, $lpc_linha1, $lpc_linha2);
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
               ->where('preditiva_atividades.tecnicas_id', '=', 3)
               ->count('preditiva_atividades.id');

   $lpc_sum2 = DB::table('preditiva_atividades')
               ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
               ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
               ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
               ->where('negocios.id','=',0)
               ->where('preditiva_atividades.tecnicas_id', '=', 3)
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
   $cs_manutencao = aux::GeralPorLinha2Vib($atual1, 1, $cs_parent);
   $cs_standBy = aux::GeralPorLinha2Vib($atual1, 2, $cs_parent);
   $cs_normal = aux::GeralPorLinha2Vib($atual1, 3, $cs_parent);
   $cs_alarme = aux::GeralPorLinha2Vib($atual1, 4, $cs_parent);
   $cs_critico = aux::GeralPorLinha2Vib($atual1, 5, $cs_parent);
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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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
    $pr_manutencao = aux::GeralPorLinha2Vib($atual1, 1, $pr_parent);
    $pr_standBy = aux::GeralPorLinha2Vib($atual1, 2, $pr_parent);
    $pr_normal = aux::GeralPorLinha2Vib($atual1, 3, $pr_parent);
    $pr_alarme = aux::GeralPorLinha2Vib($atual1, 4, $pr_parent);
    $pr_critico = aux::GeralPorLinha2Vib($atual1, 5, $pr_parent);
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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
    $tabela = aux::GeralAnormalidadesVib($atual1)->where('status_id', '>', 3);
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
    $tabela_normal = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 3);
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
    $tabela_alarme = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 4);
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
    $tabela_critico = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 5);
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
    $tabela_manutencao = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 1);
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
    $tabela_standBy = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 2);
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

    $normal1 = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 3)->count();
    $alarme1 = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 4)->count();
    $critico1 = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 5)->count();
    $normal2 = aux::GeralAnormalidadesVib($atual2)->where('status_id', '=', 3)->count();
    $alarme2 = aux::GeralAnormalidadesVib($atual2)->where('status_id', '=', 4)->count();
    $critico2 = aux::GeralAnormalidadesVib($atual2)->where('status_id', '=', 5)->count();
    $normal3 = aux::GeralAnormalidadesVib($atual3)->where('status_id', '=', 3)->count();
    $alarme3 = aux::GeralAnormalidadesVib($atual3)->where('status_id', '=', 4)->count();
    $critico3 = aux::GeralAnormalidadesVib($atual3)->where('status_id', '=', 5)->count();
    $normal4 = aux::GeralAnormalidadesVib($atual4)->where('status_id', '=', 3)->count();
    $alarme4 = aux::GeralAnormalidadesVib($atual4)->where('status_id', '=', 4)->count();
    $critico4 = aux::GeralAnormalidadesVib($atual4)->where('status_id', '=', 5)->count();
    $normal5 = aux::GeralAnormalidadesVib($atual5)->where('status_id', '=', 3)->count();
    $alarme5 = aux::GeralAnormalidadesVib($atual5)->where('status_id', '=', 4)->count();
    $critico5 = aux::GeralAnormalidadesVib($atual5)->where('status_id', '=', 5)->count();
    $normal6 = aux::GeralAnormalidadesVib($atual6)->where('status_id', '=', 3)->count();
    $alarme6 = aux::GeralAnormalidadesVib($atual6)->where('status_id', '=', 4)->count();
    $critico6 = aux::GeralAnormalidadesVib($atual6)->where('status_id', '=', 5)->count();
    $normal7 = aux::GeralAnormalidadesVib($atual7)->where('status_id', '=', 3)->count();
    $alarme7 = aux::GeralAnormalidadesVib($atual7)->where('status_id', '=', 4)->count();
    $critico7 = aux::GeralAnormalidadesVib($atual7)->where('status_id', '=', 5)->count();
    $normal8 = aux::GeralAnormalidadesVib($atual8)->where('status_id', '=', 3)->count();
    $alarme8 = aux::GeralAnormalidadesVib($atual8)->where('status_id', '=', 4)->count();
    $critico8 = aux::GeralAnormalidadesVib($atual8)->where('status_id', '=', 5)->count();
    $normal9 = aux::GeralAnormalidadesVib($atual9)->where('status_id', '=', 3)->count();
    $alarme9 = aux::GeralAnormalidadesVib($atual9)->where('status_id', '=', 4)->count();
    $critico9 = aux::GeralAnormalidadesVib($atual9)->where('status_id', '=', 5)->count();
    $normal10 = aux::GeralAnormalidadesVib($atual10)->where('status_id', '=', 3)->count();
    $alarme10 = aux::GeralAnormalidadesVib($atual10)->where('status_id', '=', 4)->count();
    $critico10 = aux::GeralAnormalidadesVib($atual10)->where('status_id', '=', 5)->count();
    $normal11 = aux::GeralAnormalidadesVib($atual11)->where('status_id', '=', 3)->count();
    $alarme11 = aux::GeralAnormalidadesVib($atual11)->where('status_id', '=', 4)->count();
    $critico11 = aux::GeralAnormalidadesVib($atual11)->where('status_id', '=', 5)->count();
    $normal12 = aux::GeralAnormalidadesVib($atual12)->where('status_id', '=', 3)->count();
    $alarme12 = aux::GeralAnormalidadesVib($atual12)->where('status_id', '=', 4)->count();
    $critico12 = aux::GeralAnormalidadesVib($atual12)->where('status_id', '=', 5)->count();

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
    $desalinhamento1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

    $desalinhamento12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
    $lubrificacao12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
    $rolamento12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
    $desbalanceamento12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
    $desgasteFolga12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
    $engrenamento12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
    $cavitacao12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
    $falhaEletrica12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     return view('csn.relatorioGerencial.includes.indexRelGerVB')->with('title', $title)->with('sum', $sum)
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
                           ->with('desalinhamento1', $desalinhamento1)->with('lubrificacao1', $lubrificacao1)->with('rolamento1', $rolamento1)->with('desbalanceamento1', $desbalanceamento1)->with('desgasteFolga1', $desgasteFolga1)->with('engrenamento1', $engrenamento1)->with('cavitacao1', $cavitacao1)->with('falhaEletrica1', $falhaEletrica1)
                           ->with('desalinhamento2', $desalinhamento2)->with('lubrificacao2', $lubrificacao2)->with('rolamento2', $rolamento2)->with('desbalanceamento2', $desbalanceamento2)->with('desgasteFolga2', $desgasteFolga2)->with('engrenamento2', $engrenamento2)->with('cavitacao2', $cavitacao2)->with('falhaEletrica2', $falhaEletrica2)
                           ->with('desalinhamento3', $desalinhamento2)->with('lubrificacao3', $lubrificacao3)->with('rolamento3', $rolamento3)->with('desbalanceamento3', $desbalanceamento3)->with('desgasteFolga3', $desgasteFolga3)->with('engrenamento3', $engrenamento3)->with('cavitacao3', $cavitacao3)->with('falhaEletrica3', $falhaEletrica3)
                           ->with('desalinhamento4', $desalinhamento2)->with('lubrificacao4', $lubrificacao4)->with('rolamento4', $rolamento4)->with('desbalanceamento4', $desbalanceamento4)->with('desgasteFolga4', $desgasteFolga4)->with('engrenamento4', $engrenamento4)->with('cavitacao4', $cavitacao4)->with('falhaEletrica4', $falhaEletrica4)
                           ->with('desalinhamento5', $desalinhamento5)->with('lubrificacao5', $lubrificacao5)->with('rolamento5', $rolamento5)->with('desbalanceamento5', $desbalanceamento5)->with('desgasteFolga5', $desgasteFolga5)->with('engrenamento5', $engrenamento5)->with('cavitacao5', $cavitacao5)->with('falhaEletrica5', $falhaEletrica5)
                           ->with('desalinhamento6', $desalinhamento6)->with('lubrificacao6', $lubrificacao6)->with('rolamento6', $rolamento6)->with('desbalanceamento6', $desbalanceamento6)->with('desgasteFolga6', $desgasteFolga6)->with('engrenamento6', $engrenamento6)->with('cavitacao6', $cavitacao6)->with('falhaEletrica6', $falhaEletrica6)
                           ->with('desalinhamento7', $desalinhamento7)->with('lubrificacao7', $lubrificacao7)->with('rolamento7', $rolamento7)->with('desbalanceamento7', $desbalanceamento7)->with('desgasteFolga7', $desgasteFolga7)->with('engrenamento7', $engrenamento7)->with('cavitacao7', $cavitacao7)->with('falhaEletrica7', $falhaEletrica7)
                           ->with('desalinhamento8', $desalinhamento8)->with('lubrificacao8', $lubrificacao8)->with('rolamento8', $rolamento8)->with('desbalanceamento8', $desbalanceamento8)->with('desgasteFolga8', $desgasteFolga8)->with('engrenamento8', $engrenamento8)->with('cavitacao8', $cavitacao8)->with('falhaEletrica8', $falhaEletrica8)
                           ->with('desalinhamento9', $desalinhamento9)->with('lubrificacao9', $lubrificacao9)->with('rolamento9', $rolamento9)->with('desbalanceamento9', $desbalanceamento9)->with('desgasteFolga9', $desgasteFolga9)->with('engrenamento9', $engrenamento9)->with('cavitacao9', $cavitacao9)->with('falhaEletrica9', $falhaEletrica9)
                           ->with('desalinhamento10', $desalinhamento10)->with('lubrificacao10', $lubrificacao10)->with('rolamento10', $rolamento10)->with('desbalanceamento10', $desbalanceamento10)->with('desgasteFolga10', $desgasteFolga10)->with('engrenamento10', $engrenamento10)->with('cavitacao10', $cavitacao10)->with('falhaEletrica10', $falhaEletrica10)
                           ->with('desalinhamento11', $desalinhamento11)->with('lubrificacao11', $lubrificacao11)->with('rolamento11', $rolamento11)->with('desbalanceamento11', $desbalanceamento11)->with('desgasteFolga11', $desgasteFolga11)->with('engrenamento11', $engrenamento11)->with('cavitacao11', $cavitacao11)->with('falhaEletrica11', $falhaEletrica11)
                           ->with('desalinhamento12', $desalinhamento12)->with('lubrificacao12', $lubrificacao12)->with('rolamento12', $rolamento12)->with('desbalanceamento12', $desbalanceamento12)->with('desgasteFolga12', $desgasteFolga12)->with('engrenamento12', $engrenamento12)->with('cavitacao12', $cavitacao12)->with('falhaEletrica12', $falhaEletrica12);
  }

   public function GeralStatusDosPontos() {

      $title = 'Status Pontos | GGOP PR';
      $sum = Preditiva_atividades::where('tecnicas_id', '=', 3)->count();
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

      $normal1 = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 3)->count();
      $alarme1 = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 4)->count();
      $critico1 = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 5)->count();
      $normal2 = aux::GeralAnormalidadesVib($atual2)->where('status_id', '=', 3)->count();
      $alarme2 = aux::GeralAnormalidadesVib($atual2)->where('status_id', '=', 4)->count();
      $critico2 = aux::GeralAnormalidadesVib($atual2)->where('status_id', '=', 5)->count();
      $normal3 = aux::GeralAnormalidadesVib($atual3)->where('status_id', '=', 3)->count();
      $alarme3 = aux::GeralAnormalidadesVib($atual3)->where('status_id', '=', 4)->count();
      $critico3 = aux::GeralAnormalidadesVib($atual3)->where('status_id', '=', 5)->count();
      $normal4 = aux::GeralAnormalidadesVib($atual4)->where('status_id', '=', 3)->count();
      $alarme4 = aux::GeralAnormalidadesVib($atual4)->where('status_id', '=', 4)->count();
      $critico4 = aux::GeralAnormalidadesVib($atual4)->where('status_id', '=', 5)->count();
      $normal5 = aux::GeralAnormalidadesVib($atual5)->where('status_id', '=', 3)->count();
      $alarme5 = aux::GeralAnormalidadesVib($atual5)->where('status_id', '=', 4)->count();
      $critico5 = aux::GeralAnormalidadesVib($atual5)->where('status_id', '=', 5)->count();
      $normal6 = aux::GeralAnormalidadesVib($atual6)->where('status_id', '=', 3)->count();
      $alarme6 = aux::GeralAnormalidadesVib($atual6)->where('status_id', '=', 4)->count();
      $critico6 = aux::GeralAnormalidadesVib($atual6)->where('status_id', '=', 5)->count();
      $normal7 = aux::GeralAnormalidadesVib($atual7)->where('status_id', '=', 3)->count();
      $alarme7 = aux::GeralAnormalidadesVib($atual7)->where('status_id', '=', 4)->count();
      $critico7 = aux::GeralAnormalidadesVib($atual7)->where('status_id', '=', 5)->count();
      $normal8 = aux::GeralAnormalidadesVib($atual8)->where('status_id', '=', 3)->count();
      $alarme8 = aux::GeralAnormalidadesVib($atual8)->where('status_id', '=', 4)->count();
      $critico8 = aux::GeralAnormalidadesVib($atual8)->where('status_id', '=', 5)->count();
      $normal9 = aux::GeralAnormalidadesVib($atual9)->where('status_id', '=', 3)->count();
      $alarme9 = aux::GeralAnormalidadesVib($atual9)->where('status_id', '=', 4)->count();
      $critico9 = aux::GeralAnormalidadesVib($atual9)->where('status_id', '=', 5)->count();
      $normal10 = aux::GeralAnormalidadesVib($atual10)->where('status_id', '=', 3)->count();
      $alarme10 = aux::GeralAnormalidadesVib($atual10)->where('status_id', '=', 4)->count();
      $critico10 = aux::GeralAnormalidadesVib($atual10)->where('status_id', '=', 5)->count();
      $normal11 = aux::GeralAnormalidadesVib($atual11)->where('status_id', '=', 3)->count();
      $alarme11 = aux::GeralAnormalidadesVib($atual11)->where('status_id', '=', 4)->count();
      $critico11 = aux::GeralAnormalidadesVib($atual11)->where('status_id', '=', 5)->count();
      $normal12 = aux::GeralAnormalidadesVib($atual12)->where('status_id', '=', 3)->count();
      $alarme12 = aux::GeralAnormalidadesVib($atual12)->where('status_id', '=', 4)->count();
      $critico12 = aux::GeralAnormalidadesVib($atual12)->where('status_id', '=', 5)->count();

      $manutencao = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 1)->count();
      $standBy = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 2)->count();
      $normal = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 3)->count();
      $alarme = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 4)->count();
      $critico = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 5)->count();

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

      return view('csn.relatorioGerencial.includes.relatoriosVibracao.ggoppr-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
     $sum = Preditiva_atividades::where('tecnicas_id', '=', 3)->count();
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

     $alarme1P = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 4)->count();
     $critico1P = aux::GeralAnormalidadesVib($atual1)->where('status_id', '=', 3)->count();
     $alarme2P = aux::GeralAnormalidadesVib($atual2)->where('status_id', '=', 4)->count();
     $critico2P = aux::GeralAnormalidadesVib($atual2)->where('status_id', '=', 3)->count();
     $alarme3P = aux::GeralAnormalidadesVib($atual3)->where('status_id', '=', 4)->count();
     $critico3P = aux::GeralAnormalidadesVib($atual3)->where('status_id', '=', 3)->count();
     $alarme4P = aux::GeralAnormalidadesVib($atual4)->where('status_id', '=', 4)->count();
     $critico4P = aux::GeralAnormalidadesVib($atual4)->where('status_id', '=', 3)->count();
     $alarme5P = aux::GeralAnormalidadesVib($atual5)->where('status_id', '=', 4)->count();
     $critico5P = aux::GeralAnormalidadesVib($atual5)->where('status_id', '=', 3)->count();
     $alarme6P = aux::GeralAnormalidadesVib($atual6)->where('status_id', '=', 4)->count();
     $critico6P = aux::GeralAnormalidadesVib($atual6)->where('status_id', '=', 3)->count();
     $alarme7P = aux::GeralAnormalidadesVib($atual7)->where('status_id', '=', 4)->count();
     $critico7P = aux::GeralAnormalidadesVib($atual7)->where('status_id', '=', 3)->count();
     $alarme8P = aux::GeralAnormalidadesVib($atual8)->where('status_id', '=', 4)->count();
     $critico8P = aux::GeralAnormalidadesVib($atual8)->where('status_id', '=', 3)->count();
     $alarme9P = aux::GeralAnormalidadesVib($atual9)->where('status_id', '=', 4)->count();
     $critico9P = aux::GeralAnormalidadesVib($atual9)->where('status_id', '=', 3)->count();
     $alarme10P = aux::GeralAnormalidadesVib($atual10)->where('status_id', '=', 4)->count();
     $critico10P = aux::GeralAnormalidadesVib($atual10)->where('status_id', '=', 3)->count();
     $alarme11P = aux::GeralAnormalidadesVib($atual11)->where('status_id', '=', 4)->count();
     $critico11P = aux::GeralAnormalidadesVib($atual11)->where('status_id', '=', 3)->count();
     $alarme12P = aux::GeralAnormalidadesVib($atual12)->where('status_id', '=', 4)->count();
     $critico12P = aux::GeralAnormalidadesVib($atual12)->where('status_id', '=', 3)->count();

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

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.ggoppr-anormalidades')->with('title', $title)->with('sum', $sum)
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
     $sum = Preditiva_atividades::where('tecnicas_id', '=', 3)->count();
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

     $desalinhamento1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica1 = aux::GeralAnormalidadesVib($atual1)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica2 = aux::GeralAnormalidadesVib($atual2)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica3 = aux::GeralAnormalidadesVib($atual3)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica4 = aux::GeralAnormalidadesVib($atual4)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica5 = aux::GeralAnormalidadesVib($atual5)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica6 = aux::GeralAnormalidadesVib($atual6)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica7 = aux::GeralAnormalidadesVib($atual7)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica8 = aux::GeralAnormalidadesVib($atual8)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica9 = aux::GeralAnormalidadesVib($atual9)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica10 = aux::GeralAnormalidadesVib($atual10)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica11 = aux::GeralAnormalidadesVib($atual11)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     $desalinhamento12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 9)->count('diagnostico_id');
     $lubrificacao12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 10)->count('diagnostico_id');
     $rolamento12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 11)->count('diagnostico_id');
     $desbalanceamento12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 12)->count('diagnostico_id');
     $desgasteFolga12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 13)->count('diagnostico_id');
     $engrenamento12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 14)->count('diagnostico_id');
     $cavitacao12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 15)->count('diagnostico_id');
     $falhaEletrica12 = aux::GeralAnormalidadesVib($atual12)->where('diagnostico_id', '=', 16)->count('diagnostico_id');

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.ggoppr-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('desalinhamento1', $desalinhamento1)->with('lubrificacao1', $lubrificacao1)->with('rolamento1', $rolamento1)->with('desbalanceamento1', $desbalanceamento1)->with('desgasteFolga1', $desgasteFolga1)->with('engrenamento1', $engrenamento1)->with('cavitacao1', $cavitacao1)->with('falhaEletrica1', $falhaEletrica1)
       ->with('atualf2', $atualf2)->with('desalinhamento2', $desalinhamento2)->with('lubrificacao2', $lubrificacao2)->with('rolamento2', $rolamento2)->with('desbalanceamento2', $desbalanceamento2)->with('desgasteFolga2', $desgasteFolga2)->with('engrenamento2', $engrenamento2)->with('cavitacao2', $cavitacao2)->with('falhaEletrica2', $falhaEletrica2)
       ->with('atualf3', $atualf3)->with('desalinhamento3', $desalinhamento2)->with('lubrificacao3', $lubrificacao3)->with('rolamento3', $rolamento3)->with('desbalanceamento3', $desbalanceamento3)->with('desgasteFolga3', $desgasteFolga3)->with('engrenamento3', $engrenamento3)->with('cavitacao3', $cavitacao3)->with('falhaEletrica3', $falhaEletrica3)
       ->with('atualf4', $atualf4)->with('desalinhamento4', $desalinhamento2)->with('lubrificacao4', $lubrificacao4)->with('rolamento4', $rolamento4)->with('desbalanceamento4', $desbalanceamento4)->with('desgasteFolga4', $desgasteFolga4)->with('engrenamento4', $engrenamento4)->with('cavitacao4', $cavitacao4)->with('falhaEletrica4', $falhaEletrica4)
       ->with('atualf5', $atualf5)->with('desalinhamento5', $desalinhamento5)->with('lubrificacao5', $lubrificacao5)->with('rolamento5', $rolamento5)->with('desbalanceamento5', $desbalanceamento5)->with('desgasteFolga5', $desgasteFolga5)->with('engrenamento5', $engrenamento5)->with('cavitacao5', $cavitacao5)->with('falhaEletrica5', $falhaEletrica5)
       ->with('atualf6', $atualf6)->with('desalinhamento6', $desalinhamento6)->with('lubrificacao6', $lubrificacao6)->with('rolamento6', $rolamento6)->with('desbalanceamento6', $desbalanceamento6)->with('desgasteFolga6', $desgasteFolga6)->with('engrenamento6', $engrenamento6)->with('cavitacao6', $cavitacao6)->with('falhaEletrica6', $falhaEletrica6)
       ->with('atualf7', $atualf7)->with('desalinhamento7', $desalinhamento7)->with('lubrificacao7', $lubrificacao7)->with('rolamento7', $rolamento7)->with('desbalanceamento7', $desbalanceamento7)->with('desgasteFolga7', $desgasteFolga7)->with('engrenamento7', $engrenamento7)->with('cavitacao7', $cavitacao7)->with('falhaEletrica7', $falhaEletrica7)
       ->with('atualf8', $atualf8)->with('desalinhamento8', $desalinhamento8)->with('lubrificacao8', $lubrificacao8)->with('rolamento8', $rolamento8)->with('desbalanceamento8', $desbalanceamento8)->with('desgasteFolga8', $desgasteFolga8)->with('engrenamento8', $engrenamento8)->with('cavitacao8', $cavitacao8)->with('falhaEletrica8', $falhaEletrica8)
       ->with('atualf9', $atualf9)->with('desalinhamento9', $desalinhamento9)->with('lubrificacao9', $lubrificacao9)->with('rolamento9', $rolamento9)->with('desbalanceamento9', $desbalanceamento9)->with('desgasteFolga9', $desgasteFolga9)->with('engrenamento9', $engrenamento9)->with('cavitacao9', $cavitacao9)->with('falhaEletrica9', $falhaEletrica9)
       ->with('atualf10', $atualf10)->with('desalinhamento10', $desalinhamento10)->with('lubrificacao10', $lubrificacao10)->with('rolamento10', $rolamento10)->with('desbalanceamento10', $desbalanceamento10)->with('desgasteFolga10', $desgasteFolga10)->with('engrenamento10', $engrenamento10)->with('cavitacao10', $cavitacao10)->with('falhaEletrica10', $falhaEletrica10)
       ->with('atualf11', $atualf11)->with('desalinhamento11', $desalinhamento11)->with('lubrificacao11', $lubrificacao11)->with('rolamento11', $rolamento11)->with('desbalanceamento11', $desbalanceamento11)->with('desgasteFolga11', $desgasteFolga11)->with('engrenamento11', $engrenamento11)->with('cavitacao11', $cavitacao11)->with('falhaEletrica11', $falhaEletrica11)
       ->with('atualf12', $atualf12)->with('desalinhamento12', $desalinhamento12)->with('lubrificacao12', $lubrificacao12)->with('rolamento12', $rolamento12)->with('desbalanceamento12', $desbalanceamento12)->with('desgasteFolga12', $desgasteFolga12)->with('engrenamento12', $engrenamento12)->with('cavitacao12', $cavitacao12)->with('falhaEletrica12', $falhaEletrica12);
  }

   public function UraPerfil() {

     $title = 'Perfil | URA';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 11;
     $linha2 = 0;

     $ura_manutencao = aux::GeralPorLinhaVib($atual1, 1, $linha1, $linha2);
     $ura_standBy = aux::GeralPorLinhaVib($atual1, 2, $linha1, $linha2);
     $ura_normal = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $ura_alarme = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $ura_critico = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

    return view('csn.relatorioGerencial.includes.indexRelGerVB_ura_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $ura_normal1 = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $ura_alarme1 = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $ura_critico1 = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

     $ura_normal2 = aux::GeralPorLinhaVib($atual2, 3, $linha1, $linha2);
     $ura_alarme2 = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $ura_critico2 = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);

     $ura_normal3 = aux::GeralPorLinhaVib($atual3, 3, $linha1, $linha2);
     $ura_alarme3 = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $ura_critico3 = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);

     $ura_normal4 = aux::GeralPorLinhaVib($atual4, 3, $linha1, $linha2);
     $ura_alarme4 = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $ura_critico4 = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);

     $ura_normal5 = aux::GeralPorLinhaVib($atual5, 3, $linha1, $linha2);
     $ura_alarme5 = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $ura_critico5 = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);

     $ura_normal6 = aux::GeralPorLinhaVib($atual6, 3, $linha1, $linha2);
     $ura_alarme6 = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $ura_critico6 = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);

     $ura_normal7 = aux::GeralPorLinhaVib($atual7, 3, $linha1, $linha2);
     $ura_alarme7 = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $ura_critico7 = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);

     $ura_normal8 = aux::GeralPorLinhaVib($atual8, 3, $linha1, $linha2);
     $ura_alarme8 = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $ura_critico8 = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);

     $ura_normal9 = aux::GeralPorLinhaVib($atual9, 3, $linha1, $linha2);
     $ura_alarme9 = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $ura_critico9 = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);

     $ura_normal10 = aux::GeralPorLinhaVib($atual10, 3, $linha1, $linha2);
     $ura_alarme10 = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $ura_critico10 = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);

     $ura_normal11 = aux::GeralPorLinhaVib($atual11, 3, $linha1, $linha2);
     $ura_alarme11 = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $ura_critico11 = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);

     $ura_normal12 = aux::GeralPorLinhaVib($atual12, 3, $linha1, $linha2);
     $ura_alarme12 = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $ura_critico12 = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.ura-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $alarme1P = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.ura-anormalidades')
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $ura_desalinhamento1 = aux::GeralPorLinhaEDiagVib($atual1, 9, $linha1, $linha2);
     $ura_lubrificacao1 = aux::GeralPorLinhaEDiagVib($atual1, 10, $linha1, $linha2);
     $ura_rolamento1 = aux::GeralPorLinhaEDiagVib($atual1, 11, $linha1, $linha2);
     $ura_desbalanceamento1 = aux::GeralPorLinhaEDiagVib($atual1, 12, $linha1, $linha2);
     $ura_desgasteFolga1 = aux::GeralPorLinhaEDiagVib($atual1, 13, $linha1, $linha2);
     $ura_engrenamento1 = aux::GeralPorLinhaEDiagVib($atual1, 14, $linha1, $linha2);
     $ura_cavitacao1 = aux::GeralPorLinhaEDiagVib($atual1, 15, $linha1, $linha2);
     $ura_falhaEletrica1 = aux::GeralPorLinhaEDiagVib($atual1, 16, $linha1, $linha2);

     $ura_desalinhamento2 = aux::GeralPorLinhaEDiagVib($atual2, 9, $linha1, $linha2);
     $ura_lubrificacao2 = aux::GeralPorLinhaEDiagVib($atual2, 10, $linha1, $linha2);
     $ura_rolamento2 = aux::GeralPorLinhaEDiagVib($atual2, 11, $linha1, $linha2);
     $ura_desbalanceamento2 = aux::GeralPorLinhaEDiagVib($atual2, 12, $linha1, $linha2);
     $ura_desgasteFolga2 = aux::GeralPorLinhaEDiagVib($atual2, 13, $linha1, $linha2);
     $ura_engrenamento2 = aux::GeralPorLinhaEDiagVib($atual2, 14, $linha1, $linha2);
     $ura_cavitacao2 = aux::GeralPorLinhaEDiagVib($atual2, 15, $linha1, $linha2);
     $ura_falhaEletrica2 = aux::GeralPorLinhaEDiagVib($atual2, 16, $linha1, $linha2);

     $ura_desalinhamento3 = aux::GeralPorLinhaEDiagVib($atual3, 9, $linha1, $linha2);
     $ura_lubrificacao3 = aux::GeralPorLinhaEDiagVib($atual3, 10, $linha1, $linha2);
     $ura_rolamento3 = aux::GeralPorLinhaEDiagVib($atual3, 11, $linha1, $linha2);
     $ura_desbalanceamento3 = aux::GeralPorLinhaEDiagVib($atual3, 12, $linha1, $linha2);
     $ura_desgasteFolga3 = aux::GeralPorLinhaEDiagVib($atual3, 13, $linha1, $linha2);
     $ura_engrenamento3 = aux::GeralPorLinhaEDiagVib($atual3, 14, $linha1, $linha2);
     $ura_cavitacao3 = aux::GeralPorLinhaEDiagVib($atual3, 15, $linha1, $linha2);
     $ura_falhaEletrica3 = aux::GeralPorLinhaEDiagVib($atual3, 16, $linha1, $linha2);

     $ura_desalinhamento4 = aux::GeralPorLinhaEDiagVib($atual4, 9, $linha1, $linha2);
     $ura_lubrificacao4 = aux::GeralPorLinhaEDiagVib($atual4, 10, $linha1, $linha2);
     $ura_rolamento4 = aux::GeralPorLinhaEDiagVib($atual4, 11, $linha1, $linha2);
     $ura_desbalanceamento4 = aux::GeralPorLinhaEDiagVib($atual4, 12, $linha1, $linha2);
     $ura_desgasteFolga4 = aux::GeralPorLinhaEDiagVib($atual4, 13, $linha1, $linha2);
     $ura_engrenamento4 = aux::GeralPorLinhaEDiagVib($atual4, 14, $linha1, $linha2);
     $ura_cavitacao4 = aux::GeralPorLinhaEDiagVib($atual4, 15, $linha1, $linha2);
     $ura_falhaEletrica4 = aux::GeralPorLinhaEDiagVib($atual4, 16, $linha1, $linha2);

     $ura_desalinhamento5 = aux::GeralPorLinhaEDiagVib($atual5, 9, $linha1, $linha2);
     $ura_lubrificacao5 = aux::GeralPorLinhaEDiagVib($atual5, 10, $linha1, $linha2);
     $ura_rolamento5 = aux::GeralPorLinhaEDiagVib($atual5, 11, $linha1, $linha2);
     $ura_desbalanceamento5 = aux::GeralPorLinhaEDiagVib($atual5, 12, $linha1, $linha2);
     $ura_desgasteFolga5 = aux::GeralPorLinhaEDiagVib($atual5, 13, $linha1, $linha2);
     $ura_engrenamento5 = aux::GeralPorLinhaEDiagVib($atual5, 14, $linha1, $linha2);
     $ura_cavitacao5 = aux::GeralPorLinhaEDiagVib($atual5, 15, $linha1, $linha2);
     $ura_falhaEletrica5 = aux::GeralPorLinhaEDiagVib($atual5, 16, $linha1, $linha2);

     $ura_desalinhamento6 = aux::GeralPorLinhaEDiagVib($atual6, 9, $linha1, $linha2);
     $ura_lubrificacao6 = aux::GeralPorLinhaEDiagVib($atual6, 10, $linha1, $linha2);
     $ura_rolamento6 = aux::GeralPorLinhaEDiagVib($atual6, 11, $linha1, $linha2);
     $ura_desbalanceamento6 = aux::GeralPorLinhaEDiagVib($atual6, 12, $linha1, $linha2);
     $ura_desgasteFolga6 = aux::GeralPorLinhaEDiagVib($atual6, 13, $linha1, $linha2);
     $ura_engrenamento6 = aux::GeralPorLinhaEDiagVib($atual6, 14, $linha1, $linha2);
     $ura_cavitacao6 = aux::GeralPorLinhaEDiagVib($atual6, 15, $linha1, $linha2);
     $ura_falhaEletrica6 = aux::GeralPorLinhaEDiagVib($atual6, 16, $linha1, $linha2);

     $ura_desalinhamento7 = aux::GeralPorLinhaEDiagVib($atual7, 9, $linha1, $linha2);
     $ura_lubrificacao7 = aux::GeralPorLinhaEDiagVib($atual7, 10, $linha1, $linha2);
     $ura_rolamento7 = aux::GeralPorLinhaEDiagVib($atual7, 11, $linha1, $linha2);
     $ura_desbalanceamento7 = aux::GeralPorLinhaEDiagVib($atual7, 12, $linha1, $linha2);
     $ura_desgasteFolga7 = aux::GeralPorLinhaEDiagVib($atual7, 13, $linha1, $linha2);
     $ura_engrenamento7 = aux::GeralPorLinhaEDiagVib($atual7, 14, $linha1, $linha2);
     $ura_cavitacao7 = aux::GeralPorLinhaEDiagVib($atual7, 15, $linha1, $linha2);
     $ura_falhaEletrica7 = aux::GeralPorLinhaEDiagVib($atual7, 16, $linha1, $linha2);

     $ura_desalinhamento8 = aux::GeralPorLinhaEDiagVib($atual8, 9, $linha1, $linha2);
     $ura_lubrificacao8 = aux::GeralPorLinhaEDiagVib($atual8, 10, $linha1, $linha2);
     $ura_rolamento8 = aux::GeralPorLinhaEDiagVib($atual8, 11, $linha1, $linha2);
     $ura_desbalanceamento8 = aux::GeralPorLinhaEDiagVib($atual8, 12, $linha1, $linha2);
     $ura_desgasteFolga8 = aux::GeralPorLinhaEDiagVib($atual8, 13, $linha1, $linha2);
     $ura_engrenamento8 = aux::GeralPorLinhaEDiagVib($atual8, 14, $linha1, $linha2);
     $ura_cavitacao8 = aux::GeralPorLinhaEDiagVib($atual8, 15, $linha1, $linha2);
     $ura_falhaEletrica8 = aux::GeralPorLinhaEDiagVib($atual8, 16, $linha1, $linha2);

     $ura_desalinhamento9 = aux::GeralPorLinhaEDiagVib($atual9, 9, $linha1, $linha2);
     $ura_lubrificacao9 = aux::GeralPorLinhaEDiagVib($atual9, 10, $linha1, $linha2);
     $ura_rolamento9 = aux::GeralPorLinhaEDiagVib($atual9, 11, $linha1, $linha2);
     $ura_desbalanceamento9 = aux::GeralPorLinhaEDiagVib($atual9, 12, $linha1, $linha2);
     $ura_desgasteFolga9 = aux::GeralPorLinhaEDiagVib($atual9, 13, $linha1, $linha2);
     $ura_engrenamento9 = aux::GeralPorLinhaEDiagVib($atual9, 14, $linha1, $linha2);
     $ura_cavitacao9 = aux::GeralPorLinhaEDiagVib($atual9, 15, $linha1, $linha2);
     $ura_falhaEletrica9 = aux::GeralPorLinhaEDiagVib($atual9, 16, $linha1, $linha2);

     $ura_desalinhamento10 = aux::GeralPorLinhaEDiagVib($atual10, 9, $linha1, $linha2);
     $ura_lubrificacao10 = aux::GeralPorLinhaEDiagVib($atual10, 10, $linha1, $linha2);
     $ura_rolamento10 = aux::GeralPorLinhaEDiagVib($atual10, 11, $linha1, $linha2);
     $ura_desbalanceamento10 = aux::GeralPorLinhaEDiagVib($atual10, 12, $linha1, $linha2);
     $ura_desgasteFolga10 = aux::GeralPorLinhaEDiagVib($atual10, 13, $linha1, $linha2);
     $ura_engrenamento10 = aux::GeralPorLinhaEDiagVib($atual10, 14, $linha1, $linha2);
     $ura_cavitacao10 = aux::GeralPorLinhaEDiagVib($atual10, 15, $linha1, $linha2);
     $ura_falhaEletrica10 = aux::GeralPorLinhaEDiagVib($atual10, 16, $linha1, $linha2);

     $ura_desalinhamento11 = aux::GeralPorLinhaEDiagVib($atual11, 9, $linha1, $linha2);
     $ura_lubrificacao11 = aux::GeralPorLinhaEDiagVib($atual11, 10, $linha1, $linha2);
     $ura_rolamento11 = aux::GeralPorLinhaEDiagVib($atual11, 11, $linha1, $linha2);
     $ura_desbalanceamento11 = aux::GeralPorLinhaEDiagVib($atual11, 12, $linha1, $linha2);
     $ura_desgasteFolga11 = aux::GeralPorLinhaEDiagVib($atual11, 13, $linha1, $linha2);
     $ura_engrenamento11 = aux::GeralPorLinhaEDiagVib($atual11, 14, $linha1, $linha2);
     $ura_cavitacao11 = aux::GeralPorLinhaEDiagVib($atual11, 15, $linha1, $linha2);
     $ura_falhaEletrica11 = aux::GeralPorLinhaEDiagVib($atual11, 16, $linha1, $linha2);


     $ura_desalinhamento12 = aux::GeralPorLinhaEDiagVib($atual12, 9, $linha1, $linha2);
     $ura_lubrificacao12 = aux::GeralPorLinhaEDiagVib($atual12, 10, $linha1, $linha2);
     $ura_rolamento12 = aux::GeralPorLinhaEDiagVib($atual12, 11, $linha1, $linha2);
     $ura_desbalanceamento12 = aux::GeralPorLinhaEDiagVib($atual12, 12, $linha1, $linha2);
     $ura_desgasteFolga12 = aux::GeralPorLinhaEDiagVib($atual12, 13, $linha1, $linha2);
     $ura_engrenamento12 = aux::GeralPorLinhaEDiagVib($atual12, 14, $linha1, $linha2);
     $ura_cavitacao12 = aux::GeralPorLinhaEDiagVib($atual12, 15, $linha1, $linha2);
     $ura_falhaEletrica12 = aux::GeralPorLinhaEDiagVib($atual12, 16, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.ura-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('ura_desalinhamento1', $ura_desalinhamento1)->with('ura_lubrificacao1', $ura_lubrificacao1)->with('ura_rolamento1', $ura_rolamento1)->with('ura_desbalanceamento1', $ura_desbalanceamento1)->with('ura_desgasteFolga1', $ura_desgasteFolga1)->with('ura_engrenamento1', $ura_engrenamento1)->with('ura_cavitacao1', $ura_cavitacao1)->with('ura_falhaEletrica1', $ura_falhaEletrica1)
       ->with('atualf2', $atualf2)->with('ura_desalinhamento2', $ura_desalinhamento2)->with('ura_lubrificacao2', $ura_lubrificacao2)->with('ura_rolamento2', $ura_rolamento2)->with('ura_desbalanceamento2', $ura_desbalanceamento2)->with('ura_desgasteFolga2', $ura_desgasteFolga2)->with('ura_engrenamento2', $ura_engrenamento2)->with('ura_cavitacao2', $ura_cavitacao2)->with('ura_falhaEletrica2', $ura_falhaEletrica2)
       ->with('atualf3', $atualf3)->with('ura_desalinhamento3', $ura_desalinhamento3)->with('ura_lubrificacao3', $ura_lubrificacao3)->with('ura_rolamento3', $ura_rolamento3)->with('ura_desbalanceamento3', $ura_desbalanceamento3)->with('ura_desgasteFolga3', $ura_desgasteFolga3)->with('ura_engrenamento3', $ura_engrenamento3)->with('ura_cavitacao3', $ura_cavitacao3)->with('ura_falhaEletrica3', $ura_falhaEletrica3)
       ->with('atualf4', $atualf4)->with('ura_desalinhamento4', $ura_desalinhamento4)->with('ura_lubrificacao4', $ura_lubrificacao4)->with('ura_rolamento4', $ura_rolamento4)->with('ura_desbalanceamento4', $ura_desbalanceamento4)->with('ura_desgasteFolga4', $ura_desgasteFolga4)->with('ura_engrenamento4', $ura_engrenamento4)->with('ura_cavitacao4', $ura_cavitacao4)->with('ura_falhaEletrica4', $ura_falhaEletrica4)
       ->with('atualf5', $atualf5)->with('ura_desalinhamento5', $ura_desalinhamento5)->with('ura_lubrificacao5', $ura_lubrificacao5)->with('ura_rolamento5', $ura_rolamento5)->with('ura_desbalanceamento5', $ura_desbalanceamento5)->with('ura_desgasteFolga5', $ura_desgasteFolga5)->with('ura_engrenamento5', $ura_engrenamento5)->with('ura_cavitacao5', $ura_cavitacao5)->with('ura_falhaEletrica5', $ura_falhaEletrica5)
       ->with('atualf6', $atualf6)->with('ura_desalinhamento6', $ura_desalinhamento6)->with('ura_lubrificacao6', $ura_lubrificacao6)->with('ura_rolamento6', $ura_rolamento6)->with('ura_desbalanceamento6', $ura_desbalanceamento6)->with('ura_desgasteFolga6', $ura_desgasteFolga6)->with('ura_engrenamento6', $ura_engrenamento6)->with('ura_cavitacao6', $ura_cavitacao6)->with('ura_falhaEletrica6', $ura_falhaEletrica6)
       ->with('atualf7', $atualf7)->with('ura_desalinhamento7', $ura_desalinhamento7)->with('ura_lubrificacao7', $ura_lubrificacao7)->with('ura_rolamento7', $ura_rolamento7)->with('ura_desbalanceamento7', $ura_desbalanceamento7)->with('ura_desgasteFolga7', $ura_desgasteFolga7)->with('ura_engrenamento7', $ura_engrenamento7)->with('ura_cavitacao7', $ura_cavitacao7)->with('ura_falhaEletrica7', $ura_falhaEletrica7)
       ->with('atualf8', $atualf8)->with('ura_desalinhamento8', $ura_desalinhamento8)->with('ura_lubrificacao8', $ura_lubrificacao8)->with('ura_rolamento8', $ura_rolamento8)->with('ura_desbalanceamento8', $ura_desbalanceamento8)->with('ura_desgasteFolga8', $ura_desgasteFolga8)->with('ura_engrenamento8', $ura_engrenamento8)->with('ura_cavitacao8', $ura_cavitacao8)->with('ura_falhaEletrica8', $ura_falhaEletrica8)
       ->with('atualf9', $atualf9)->with('ura_desalinhamento9', $ura_desalinhamento9)->with('ura_lubrificacao9', $ura_lubrificacao9)->with('ura_rolamento9', $ura_rolamento9)->with('ura_desbalanceamento9', $ura_desbalanceamento9)->with('ura_desgasteFolga9', $ura_desgasteFolga9)->with('ura_engrenamento9', $ura_engrenamento9)->with('ura_cavitacao9', $ura_cavitacao9)->with('ura_falhaEletrica9', $ura_falhaEletrica9)
       ->with('atualf10', $atualf10)->with('ura_desalinhamento10', $ura_desalinhamento10)->with('ura_lubrificacao10', $ura_lubrificacao10)->with('ura_rolamento10', $ura_rolamento10)->with('ura_desbalanceamento10', $ura_desbalanceamento10)->with('ura_desgasteFolga10', $ura_desgasteFolga10)->with('ura_engrenamento10', $ura_engrenamento10)->with('ura_cavitacao10', $ura_cavitacao10)->with('ura_falhaEletrica10', $ura_falhaEletrica10)
       ->with('atualf11', $atualf11)->with('ura_desalinhamento11', $ura_desalinhamento11)->with('ura_lubrificacao11', $ura_lubrificacao11)->with('ura_rolamento11', $ura_rolamento11)->with('ura_desbalanceamento11', $ura_desbalanceamento11)->with('ura_desgasteFolga11', $ura_desgasteFolga11)->with('ura_engrenamento11', $ura_engrenamento11)->with('ura_cavitacao11', $ura_cavitacao11)->with('ura_falhaEletrica11', $ura_falhaEletrica11)
       ->with('atualf12', $atualf12)->with('ura_desalinhamento12', $ura_desalinhamento12)->with('ura_lubrificacao12', $ura_lubrificacao12)->with('ura_rolamento12', $ura_rolamento12)->with('ura_desbalanceamento12', $ura_desbalanceamento12)->with('ura_desgasteFolga12', $ura_desgasteFolga12)->with('ura_engrenamento12', $ura_engrenamento12)->with('ura_cavitacao12', $ura_cavitacao12)->with('ura_falhaEletrica12', $ura_falhaEletrica12);
   }

   public function LdsPerfil() {

     $title = 'Perfil | LDS';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 10;
     $linha2 = 22;

     $lds_manutencao = aux::GeralPorLinhaVib($atual1, 1, $linha1, $linha2);
     $lds_standBy = aux::GeralPorLinhaVib($atual1, 2, $linha1, $linha2);
     $lds_normal = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $lds_alarme = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $lds_critico = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 22)
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      return view('csn.relatorioGerencial.includes.indexRelGerVB_lds_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $lds_normal1 = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $lds_alarme1 = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $lds_critico1 = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

     $lds_normal2 = aux::GeralPorLinhaVib($atual2, 3, $linha1, $linha2);
     $lds_alarme2 = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $lds_critico2 = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);

     $lds_normal3 = aux::GeralPorLinhaVib($atual3, 3, $linha1, $linha2);
     $lds_alarme3 = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $lds_critico3 = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);

     $lds_normal4 = aux::GeralPorLinhaVib($atual4, 3, $linha1, $linha2);
     $lds_alarme4 = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $lds_critico4 = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);

     $lds_normal5 = aux::GeralPorLinhaVib($atual5, 3, $linha1, $linha2);
     $lds_alarme5 = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $lds_critico5 = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);

     $lds_normal6 = aux::GeralPorLinhaVib($atual6, 3, $linha1, $linha2);
     $lds_alarme6 = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $lds_critico6 = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);

     $lds_normal7 = aux::GeralPorLinhaVib($atual7, 3, $linha1, $linha2);
     $lds_alarme7 = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $lds_critico7 = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);

     $lds_normal8 = aux::GeralPorLinhaVib($atual8, 3, $linha1, $linha2);
     $lds_alarme8 = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $lds_critico8 = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);

     $lds_normal9 = aux::GeralPorLinhaVib($atual9, 3, $linha1, $linha2);
     $lds_alarme9 = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $lds_critico9 = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);

     $lds_normal10 = aux::GeralPorLinhaVib($atual10, 3, $linha1, $linha2);
     $lds_alarme10 = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $lds_critico10 = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);

     $lds_normal11 = aux::GeralPorLinhaVib($atual11, 3, $linha1, $linha2);
     $lds_alarme11 = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $lds_critico11 = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);

     $lds_normal12 = aux::GeralPorLinhaVib($atual12, 3, $linha1, $linha2);
     $lds_alarme12 = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $lds_critico12 = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lds-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $alarme1P = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lds-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 22)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $lds_desalinhamento1 = aux::GeralPorLinhaEDiagVib($atual1, 9, $linha1, $linha2);
     $lds_lubrificacao1 = aux::GeralPorLinhaEDiagVib($atual1, 10, $linha1, $linha2);
     $lds_rolamento1 = aux::GeralPorLinhaEDiagVib($atual1, 11, $linha1, $linha2);
     $lds_desbalanceamento1 = aux::GeralPorLinhaEDiagVib($atual1, 12, $linha1, $linha2);
     $lds_desgasteFolga1 = aux::GeralPorLinhaEDiagVib($atual1, 13, $linha1, $linha2);
     $lds_engrenamento1 = aux::GeralPorLinhaEDiagVib($atual1, 14, $linha1, $linha2);
     $lds_cavitacao1 = aux::GeralPorLinhaEDiagVib($atual1, 15, $linha1, $linha2);
     $lds_falhaEletrica1 = aux::GeralPorLinhaEDiagVib($atual1, 16, $linha1, $linha2);

     $lds_desalinhamento2 = aux::GeralPorLinhaEDiagVib($atual2, 9, $linha1, $linha2);
     $lds_lubrificacao2 = aux::GeralPorLinhaEDiagVib($atual2, 10, $linha1, $linha2);
     $lds_rolamento2 = aux::GeralPorLinhaEDiagVib($atual2, 11, $linha1, $linha2);
     $lds_desbalanceamento2 = aux::GeralPorLinhaEDiagVib($atual2, 12, $linha1, $linha2);
     $lds_desgasteFolga2 = aux::GeralPorLinhaEDiagVib($atual2, 13, $linha1, $linha2);
     $lds_engrenamento2 = aux::GeralPorLinhaEDiagVib($atual2, 14, $linha1, $linha2);
     $lds_cavitacao2 = aux::GeralPorLinhaEDiagVib($atual2, 15, $linha1, $linha2);
     $lds_falhaEletrica2 = aux::GeralPorLinhaEDiagVib($atual2, 16, $linha1, $linha2);

     $lds_desalinhamento3 = aux::GeralPorLinhaEDiagVib($atual3, 9, $linha1, $linha2);
     $lds_lubrificacao3 = aux::GeralPorLinhaEDiagVib($atual3, 10, $linha1, $linha2);
     $lds_rolamento3 = aux::GeralPorLinhaEDiagVib($atual3, 11, $linha1, $linha2);
     $lds_desbalanceamento3 = aux::GeralPorLinhaEDiagVib($atual3, 12, $linha1, $linha2);
     $lds_desgasteFolga3 = aux::GeralPorLinhaEDiagVib($atual3, 13, $linha1, $linha2);
     $lds_engrenamento3 = aux::GeralPorLinhaEDiagVib($atual3, 14, $linha1, $linha2);
     $lds_cavitacao3 = aux::GeralPorLinhaEDiagVib($atual3, 15, $linha1, $linha2);
     $lds_falhaEletrica3 = aux::GeralPorLinhaEDiagVib($atual3, 16, $linha1, $linha2);

     $lds_desalinhamento4 = aux::GeralPorLinhaEDiagVib($atual4, 9, $linha1, $linha2);
     $lds_lubrificacao4 = aux::GeralPorLinhaEDiagVib($atual4, 10, $linha1, $linha2);
     $lds_rolamento4 = aux::GeralPorLinhaEDiagVib($atual4, 11, $linha1, $linha2);
     $lds_desbalanceamento4 = aux::GeralPorLinhaEDiagVib($atual4, 12, $linha1, $linha2);
     $lds_desgasteFolga4 = aux::GeralPorLinhaEDiagVib($atual4, 13, $linha1, $linha2);
     $lds_engrenamento4 = aux::GeralPorLinhaEDiagVib($atual4, 14, $linha1, $linha2);
     $lds_cavitacao4 = aux::GeralPorLinhaEDiagVib($atual4, 15, $linha1, $linha2);
     $lds_falhaEletrica4 = aux::GeralPorLinhaEDiagVib($atual4, 16, $linha1, $linha2);

     $lds_desalinhamento5 = aux::GeralPorLinhaEDiagVib($atual5, 9, $linha1, $linha2);
     $lds_lubrificacao5 = aux::GeralPorLinhaEDiagVib($atual5, 10, $linha1, $linha2);
     $lds_rolamento5 = aux::GeralPorLinhaEDiagVib($atual5, 11, $linha1, $linha2);
     $lds_desbalanceamento5 = aux::GeralPorLinhaEDiagVib($atual5, 12, $linha1, $linha2);
     $lds_desgasteFolga5 = aux::GeralPorLinhaEDiagVib($atual5, 13, $linha1, $linha2);
     $lds_engrenamento5 = aux::GeralPorLinhaEDiagVib($atual5, 14, $linha1, $linha2);
     $lds_cavitacao5 = aux::GeralPorLinhaEDiagVib($atual5, 15, $linha1, $linha2);
     $lds_falhaEletrica5 = aux::GeralPorLinhaEDiagVib($atual5, 16, $linha1, $linha2);

     $lds_desalinhamento6 = aux::GeralPorLinhaEDiagVib($atual6, 9, $linha1, $linha2);
     $lds_lubrificacao6 = aux::GeralPorLinhaEDiagVib($atual6, 10, $linha1, $linha2);
     $lds_rolamento6 = aux::GeralPorLinhaEDiagVib($atual6, 11, $linha1, $linha2);
     $lds_desbalanceamento6 = aux::GeralPorLinhaEDiagVib($atual6, 12, $linha1, $linha2);
     $lds_desgasteFolga6 = aux::GeralPorLinhaEDiagVib($atual6, 13, $linha1, $linha2);
     $lds_engrenamento6 = aux::GeralPorLinhaEDiagVib($atual6, 14, $linha1, $linha2);
     $lds_cavitacao6 = aux::GeralPorLinhaEDiagVib($atual6, 15, $linha1, $linha2);
     $lds_falhaEletrica6 = aux::GeralPorLinhaEDiagVib($atual6, 16, $linha1, $linha2);

     $lds_desalinhamento7 = aux::GeralPorLinhaEDiagVib($atual7, 9, $linha1, $linha2);
     $lds_lubrificacao7 = aux::GeralPorLinhaEDiagVib($atual7, 10, $linha1, $linha2);
     $lds_rolamento7 = aux::GeralPorLinhaEDiagVib($atual7, 11, $linha1, $linha2);
     $lds_desbalanceamento7 = aux::GeralPorLinhaEDiagVib($atual7, 12, $linha1, $linha2);
     $lds_desgasteFolga7 = aux::GeralPorLinhaEDiagVib($atual7, 13, $linha1, $linha2);
     $lds_engrenamento7 = aux::GeralPorLinhaEDiagVib($atual7, 14, $linha1, $linha2);
     $lds_cavitacao7 = aux::GeralPorLinhaEDiagVib($atual7, 15, $linha1, $linha2);
     $lds_falhaEletrica7 = aux::GeralPorLinhaEDiagVib($atual7, 16, $linha1, $linha2);

     $lds_desalinhamento8 = aux::GeralPorLinhaEDiagVib($atual8, 9, $linha1, $linha2);
     $lds_lubrificacao8 = aux::GeralPorLinhaEDiagVib($atual8, 10, $linha1, $linha2);
     $lds_rolamento8 = aux::GeralPorLinhaEDiagVib($atual8, 11, $linha1, $linha2);
     $lds_desbalanceamento8 = aux::GeralPorLinhaEDiagVib($atual8, 12, $linha1, $linha2);
     $lds_desgasteFolga8 = aux::GeralPorLinhaEDiagVib($atual8, 13, $linha1, $linha2);
     $lds_engrenamento8 = aux::GeralPorLinhaEDiagVib($atual8, 14, $linha1, $linha2);
     $lds_cavitacao8 = aux::GeralPorLinhaEDiagVib($atual8, 15, $linha1, $linha2);
     $lds_falhaEletrica8 = aux::GeralPorLinhaEDiagVib($atual8, 16, $linha1, $linha2);

     $lds_desalinhamento9 = aux::GeralPorLinhaEDiagVib($atual9, 9, $linha1, $linha2);
     $lds_lubrificacao9 = aux::GeralPorLinhaEDiagVib($atual9, 10, $linha1, $linha2);
     $lds_rolamento9 = aux::GeralPorLinhaEDiagVib($atual9, 11, $linha1, $linha2);
     $lds_desbalanceamento9 = aux::GeralPorLinhaEDiagVib($atual9, 12, $linha1, $linha2);
     $lds_desgasteFolga9 = aux::GeralPorLinhaEDiagVib($atual9, 13, $linha1, $linha2);
     $lds_engrenamento9 = aux::GeralPorLinhaEDiagVib($atual9, 14, $linha1, $linha2);
     $lds_cavitacao9 = aux::GeralPorLinhaEDiagVib($atual9, 15, $linha1, $linha2);
     $lds_falhaEletrica9 = aux::GeralPorLinhaEDiagVib($atual9, 16, $linha1, $linha2);

     $lds_desalinhamento10 = aux::GeralPorLinhaEDiagVib($atual10, 9, $linha1, $linha2);
     $lds_lubrificacao10 = aux::GeralPorLinhaEDiagVib($atual10, 10, $linha1, $linha2);
     $lds_rolamento10 = aux::GeralPorLinhaEDiagVib($atual10, 11, $linha1, $linha2);
     $lds_desbalanceamento10 = aux::GeralPorLinhaEDiagVib($atual10, 12, $linha1, $linha2);
     $lds_desgasteFolga10 = aux::GeralPorLinhaEDiagVib($atual10, 13, $linha1, $linha2);
     $lds_engrenamento10 = aux::GeralPorLinhaEDiagVib($atual10, 14, $linha1, $linha2);
     $lds_cavitacao10 = aux::GeralPorLinhaEDiagVib($atual10, 15, $linha1, $linha2);
     $lds_falhaEletrica10 = aux::GeralPorLinhaEDiagVib($atual10, 16, $linha1, $linha2);

     $lds_desalinhamento11 = aux::GeralPorLinhaEDiagVib($atual11, 9, $linha1, $linha2);
     $lds_lubrificacao11 = aux::GeralPorLinhaEDiagVib($atual11, 10, $linha1, $linha2);
     $lds_rolamento11 = aux::GeralPorLinhaEDiagVib($atual11, 11, $linha1, $linha2);
     $lds_desbalanceamento11 = aux::GeralPorLinhaEDiagVib($atual11, 12, $linha1, $linha2);
     $lds_desgasteFolga11 = aux::GeralPorLinhaEDiagVib($atual11, 13, $linha1, $linha2);
     $lds_engrenamento11 = aux::GeralPorLinhaEDiagVib($atual11, 14, $linha1, $linha2);
     $lds_cavitacao11 = aux::GeralPorLinhaEDiagVib($atual11, 15, $linha1, $linha2);
     $lds_falhaEletrica11 = aux::GeralPorLinhaEDiagVib($atual11, 16, $linha1, $linha2);

     $lds_desalinhamento12 = aux::GeralPorLinhaEDiagVib($atual12, 9, $linha1, $linha2);
     $lds_lubrificacao12 = aux::GeralPorLinhaEDiagVib($atual12, 10, $linha1, $linha2);
     $lds_rolamento12 = aux::GeralPorLinhaEDiagVib($atual12, 11, $linha1, $linha2);
     $lds_desbalanceamento12 = aux::GeralPorLinhaEDiagVib($atual12, 12, $linha1, $linha2);
     $lds_desgasteFolga12 = aux::GeralPorLinhaEDiagVib($atual12, 13, $linha1, $linha2);
     $lds_engrenamento12 = aux::GeralPorLinhaEDiagVib($atual12, 14, $linha1, $linha2);
     $lds_cavitacao12 = aux::GeralPorLinhaEDiagVib($atual12, 15, $linha1, $linha2);
     $lds_falhaEletrica12 = aux::GeralPorLinhaEDiagVib($atual12, 16, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lds-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lds_desalinhamento1', $lds_desalinhamento1)->with('lds_lubrificacao1', $lds_lubrificacao1)->with('lds_rolamento1', $lds_rolamento1)->with('lds_desbalanceamento1', $lds_desbalanceamento1)->with('lds_desgasteFolga1', $lds_desgasteFolga1)->with('lds_engrenamento1', $lds_engrenamento1)->with('lds_cavitacao1', $lds_cavitacao1)->with('lds_falhaEletrica1', $lds_falhaEletrica1)->with('lds_desalinhamento1', $lds_desalinhamento1)
       ->with('atualf2', $atualf2)->with('lds_desalinhamento2', $lds_desalinhamento2)->with('lds_lubrificacao2', $lds_lubrificacao2)->with('lds_rolamento2', $lds_rolamento2)->with('lds_desbalanceamento2', $lds_desbalanceamento2)->with('lds_desgasteFolga2', $lds_desgasteFolga2)->with('lds_engrenamento2', $lds_engrenamento2)->with('lds_cavitacao2', $lds_cavitacao2)->with('lds_falhaEletrica2', $lds_falhaEletrica2)->with('lds_desalinhamento2', $lds_desalinhamento2)
       ->with('atualf3', $atualf3)->with('lds_desalinhamento3', $lds_desalinhamento2)->with('lds_lubrificacao3', $lds_lubrificacao3)->with('lds_rolamento3', $lds_rolamento3)->with('lds_desbalanceamento3', $lds_desbalanceamento3)->with('lds_desgasteFolga3', $lds_desgasteFolga3)->with('lds_engrenamento3', $lds_engrenamento3)->with('lds_cavitacao3', $lds_cavitacao3)->with('lds_falhaEletrica3', $lds_falhaEletrica3)->with('lds_desalinhamento3', $lds_desalinhamento3)
       ->with('atualf4', $atualf4)->with('lds_desalinhamento4', $lds_desalinhamento2)->with('lds_lubrificacao4', $lds_lubrificacao4)->with('lds_rolamento4', $lds_rolamento4)->with('lds_desbalanceamento4', $lds_desbalanceamento4)->with('lds_desgasteFolga4', $lds_desgasteFolga4)->with('lds_engrenamento4', $lds_engrenamento4)->with('lds_cavitacao4', $lds_cavitacao4)->with('lds_falhaEletrica4', $lds_falhaEletrica4)->with('lds_desalinhamento4', $lds_desalinhamento4)
       ->with('atualf5', $atualf5)->with('lds_desalinhamento5', $lds_desalinhamento5)->with('lds_lubrificacao5', $lds_lubrificacao5)->with('lds_rolamento5', $lds_rolamento5)->with('lds_desbalanceamento5', $lds_desbalanceamento5)->with('lds_desgasteFolga5', $lds_desgasteFolga5)->with('lds_engrenamento5', $lds_engrenamento5)->with('lds_cavitacao5', $lds_cavitacao5)->with('lds_falhaEletrica5', $lds_falhaEletrica5)->with('lds_desalinhamento5', $lds_desalinhamento5)
       ->with('atualf6', $atualf6)->with('lds_desalinhamento6', $lds_desalinhamento6)->with('lds_lubrificacao6', $lds_lubrificacao6)->with('lds_rolamento6', $lds_rolamento6)->with('lds_desbalanceamento6', $lds_desbalanceamento6)->with('lds_desgasteFolga6', $lds_desgasteFolga6)->with('lds_engrenamento6', $lds_engrenamento6)->with('lds_cavitacao6', $lds_cavitacao6)->with('lds_falhaEletrica6', $lds_falhaEletrica6)->with('lds_desalinhamento6', $lds_desalinhamento6)
       ->with('atualf7', $atualf7)->with('lds_desalinhamento7', $lds_desalinhamento7)->with('lds_lubrificacao7', $lds_lubrificacao7)->with('lds_rolamento7', $lds_rolamento7)->with('lds_desbalanceamento7', $lds_desbalanceamento7)->with('lds_desgasteFolga7', $lds_desgasteFolga7)->with('lds_engrenamento7', $lds_engrenamento7)->with('lds_cavitacao7', $lds_cavitacao7)->with('lds_falhaEletrica7', $lds_falhaEletrica7)->with('lds_desalinhamento7', $lds_desalinhamento7)
       ->with('atualf8', $atualf8)->with('lds_desalinhamento8', $lds_desalinhamento8)->with('lds_lubrificacao8', $lds_lubrificacao8)->with('lds_rolamento8', $lds_rolamento8)->with('lds_desbalanceamento8', $lds_desbalanceamento8)->with('lds_desgasteFolga8', $lds_desgasteFolga8)->with('lds_engrenamento8', $lds_engrenamento8)->with('lds_cavitacao8', $lds_cavitacao8)->with('lds_falhaEletrica8', $lds_falhaEletrica8)->with('lds_desalinhamento8', $lds_desalinhamento8)
       ->with('atualf9', $atualf9)->with('lds_desalinhamento9', $lds_desalinhamento9)->with('lds_lubrificacao9', $lds_lubrificacao9)->with('lds_rolamento9', $lds_rolamento9)->with('lds_desbalanceamento9', $lds_desbalanceamento9)->with('lds_desgasteFolga9', $lds_desgasteFolga9)->with('lds_engrenamento9', $lds_engrenamento9)->with('lds_cavitacao9', $lds_cavitacao9)->with('lds_falhaEletrica9', $lds_falhaEletrica9)->with('lds_desalinhamento9', $lds_desalinhamento9)
       ->with('atualf10', $atualf10)->with('lds_desalinhamento10', $lds_desalinhamento10)->with('lds_lubrificacao10', $lds_lubrificacao10)->with('lds_rolamento10', $lds_rolamento10)->with('lds_desbalanceamento10', $lds_desbalanceamento10)->with('lds_desgasteFolga10', $lds_desgasteFolga10)->with('lds_engrenamento10', $lds_engrenamento10)->with('lds_cavitacao10', $lds_cavitacao10)->with('lds_falhaEletrica10', $lds_falhaEletrica10)->with('lds_desalinhamento10', $lds_desalinhamento10)
       ->with('atualf11', $atualf11)->with('lds_desalinhamento11', $lds_desalinhamento11)->with('lds_lubrificacao11', $lds_lubrificacao11)->with('lds_rolamento11', $lds_rolamento11)->with('lds_desbalanceamento11', $lds_desbalanceamento11)->with('lds_desgasteFolga11', $lds_desgasteFolga11)->with('lds_engrenamento11', $lds_engrenamento11)->with('lds_cavitacao11', $lds_cavitacao11)->with('lds_falhaEletrica11', $lds_falhaEletrica11)->with('lds_desalinhamento11', $lds_desalinhamento11)
       ->with('atualf12', $atualf12)->with('lds_desalinhamento12', $lds_desalinhamento12)->with('lds_lubrificacao12', $lds_lubrificacao12)->with('lds_rolamento12', $lds_rolamento12)->with('lds_desbalanceamento12', $lds_desbalanceamento12)->with('lds_desgasteFolga12', $lds_desgasteFolga12)->with('lds_engrenamento12', $lds_engrenamento12)->with('lds_cavitacao12', $lds_cavitacao12)->with('lds_falhaEletrica12', $lds_falhaEletrica12)->with('lds_desalinhamento12', $lds_desalinhamento12);
   }

   public function LrfPerfil() {

     $title = 'Perfil | LRF';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 12;
     $linha2 = 0;

     $lrf_manutencao = aux::GeralPorLinhaVib($atual1, 1, $linha1, $linha2);
     $lrf_standBy = aux::GeralPorLinhaVib($atual1, 2, $linha1, $linha2);
     $lrf_normal = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $lrf_alarme = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $lrf_critico = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=', 0)
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

       return view('csn.relatorioGerencial.includes.indexRelGerVB_lrf_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $lrf_normal1 = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $lrf_alarme1 = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $lrf_critico1 = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

     $lrf_normal2 = aux::GeralPorLinhaVib($atual2, 3, $linha1, $linha2);
     $lrf_alarme2 = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $lrf_critico2 = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);

     $lrf_normal3 = aux::GeralPorLinhaVib($atual3, 3, $linha1, $linha2);
     $lrf_alarme3 = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $lrf_critico3 = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);

     $lrf_normal4 = aux::GeralPorLinhaVib($atual4, 3, $linha1, $linha2);
     $lrf_alarme4 = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $lrf_critico4 = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);

     $lrf_normal5 = aux::GeralPorLinhaVib($atual5, 3, $linha1, $linha2);
     $lrf_alarme5 = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $lrf_critico5 = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);

     $lrf_normal6 = aux::GeralPorLinhaVib($atual6, 3, $linha1, $linha2);
     $lrf_alarme6 = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $lrf_critico6 = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);

     $lrf_normal7 = aux::GeralPorLinhaVib($atual7, 3, $linha1, $linha2);
     $lrf_alarme7 = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $lrf_critico7 = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);

     $lrf_normal8 = aux::GeralPorLinhaVib($atual8, 3, $linha1, $linha2);
     $lrf_alarme8 = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $lrf_critico8 = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);

     $lrf_normal9 = aux::GeralPorLinhaVib($atual9, 3, $linha1, $linha2);
     $lrf_alarme9 = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $lrf_critico9 = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);

     $lrf_normal10 = aux::GeralPorLinhaVib($atual10, 3, $linha1, $linha2);
     $lrf_alarme10 = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $lrf_critico10 = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);

     $lrf_normal11 = aux::GeralPorLinhaVib($atual11, 3, $linha1, $linha2);
     $lrf_alarme11 = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $lrf_critico11 = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);

     $lrf_normal12 = aux::GeralPorLinhaVib($atual12, 3, $linha1, $linha2);
     $lrf_alarme12 = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $lrf_critico12 = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lrf-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $alarme1P = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lrf-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $lrf_desalinhamento1 = aux::GeralPorLinhaEDiagVib($atual1, 9, $linha1, $linha2);
     $lrf_lubrificacao1 = aux::GeralPorLinhaEDiagVib($atual1, 10, $linha1, $linha2);
     $lrf_rolamento1 = aux::GeralPorLinhaEDiagVib($atual1, 11, $linha1, $linha2);
     $lrf_desbalanceamento1 = aux::GeralPorLinhaEDiagVib($atual1, 12, $linha1, $linha2);
     $lrf_desgasteFolga1 = aux::GeralPorLinhaEDiagVib($atual1, 13, $linha1, $linha2);
     $lrf_engrenamento1 = aux::GeralPorLinhaEDiagVib($atual1, 14, $linha1, $linha2);
     $lrf_cavitacao1 = aux::GeralPorLinhaEDiagVib($atual1, 15, $linha1, $linha2);
     $lrf_falhaEletrica1 = aux::GeralPorLinhaEDiagVib($atual1, 16, $linha1, $linha2);

     $lrf_desalinhamento2 = aux::GeralPorLinhaEDiagVib($atual2, 9, $linha1, $linha2);
     $lrf_lubrificacao2 = aux::GeralPorLinhaEDiagVib($atual2, 10, $linha1, $linha2);
     $lrf_rolamento2 = aux::GeralPorLinhaEDiagVib($atual2, 11, $linha1, $linha2);
     $lrf_desbalanceamento2 = aux::GeralPorLinhaEDiagVib($atual2, 12, $linha1, $linha2);
     $lrf_desgasteFolga2 = aux::GeralPorLinhaEDiagVib($atual2, 13, $linha1, $linha2);
     $lrf_engrenamento2 = aux::GeralPorLinhaEDiagVib($atual2, 14, $linha1, $linha2);
     $lrf_cavitacao2 = aux::GeralPorLinhaEDiagVib($atual2, 15, $linha1, $linha2);
     $lrf_falhaEletrica2 = aux::GeralPorLinhaEDiagVib($atual2, 16, $linha1, $linha2);

     $lrf_desalinhamento3 = aux::GeralPorLinhaEDiagVib($atual3, 9, $linha1, $linha2);
     $lrf_lubrificacao3 = aux::GeralPorLinhaEDiagVib($atual3, 10, $linha1, $linha2);
     $lrf_rolamento3 = aux::GeralPorLinhaEDiagVib($atual3, 11, $linha1, $linha2);
     $lrf_desbalanceamento3 = aux::GeralPorLinhaEDiagVib($atual3, 12, $linha1, $linha2);
     $lrf_desgasteFolga3 = aux::GeralPorLinhaEDiagVib($atual3, 13, $linha1, $linha2);
     $lrf_engrenamento3 = aux::GeralPorLinhaEDiagVib($atual3, 14, $linha1, $linha2);
     $lrf_cavitacao3 = aux::GeralPorLinhaEDiagVib($atual3, 15, $linha1, $linha2);
     $lrf_falhaEletrica3 = aux::GeralPorLinhaEDiagVib($atual3, 16, $linha1, $linha2);

     $lrf_desalinhamento4 = aux::GeralPorLinhaEDiagVib($atual4, 9, $linha1, $linha2);
     $lrf_lubrificacao4 = aux::GeralPorLinhaEDiagVib($atual4, 10, $linha1, $linha2);
     $lrf_rolamento4 = aux::GeralPorLinhaEDiagVib($atual4, 11, $linha1, $linha2);
     $lrf_desbalanceamento4 = aux::GeralPorLinhaEDiagVib($atual4, 12, $linha1, $linha2);
     $lrf_desgasteFolga4 = aux::GeralPorLinhaEDiagVib($atual4, 13, $linha1, $linha2);
     $lrf_engrenamento4 = aux::GeralPorLinhaEDiagVib($atual4, 14, $linha1, $linha2);
     $lrf_cavitacao4 = aux::GeralPorLinhaEDiagVib($atual4, 15, $linha1, $linha2);
     $lrf_falhaEletrica4 = aux::GeralPorLinhaEDiagVib($atual4, 16, $linha1, $linha2);

     $lrf_desalinhamento5 = aux::GeralPorLinhaEDiagVib($atual5, 9, $linha1, $linha2);
     $lrf_lubrificacao5 = aux::GeralPorLinhaEDiagVib($atual5, 10, $linha1, $linha2);
     $lrf_rolamento5 = aux::GeralPorLinhaEDiagVib($atual5, 11, $linha1, $linha2);
     $lrf_desbalanceamento5 = aux::GeralPorLinhaEDiagVib($atual5, 12, $linha1, $linha2);
     $lrf_desgasteFolga5 = aux::GeralPorLinhaEDiagVib($atual5, 13, $linha1, $linha2);
     $lrf_engrenamento5 = aux::GeralPorLinhaEDiagVib($atual5, 14, $linha1, $linha2);
     $lrf_cavitacao5 = aux::GeralPorLinhaEDiagVib($atual5, 15, $linha1, $linha2);
     $lrf_falhaEletrica5 = aux::GeralPorLinhaEDiagVib($atual5, 16, $linha1, $linha2);

     $lrf_desalinhamento6 = aux::GeralPorLinhaEDiagVib($atual6, 9, $linha1, $linha2);
     $lrf_lubrificacao6 = aux::GeralPorLinhaEDiagVib($atual6, 10, $linha1, $linha2);
     $lrf_rolamento6 = aux::GeralPorLinhaEDiagVib($atual6, 11, $linha1, $linha2);
     $lrf_desbalanceamento6 = aux::GeralPorLinhaEDiagVib($atual6, 12, $linha1, $linha2);
     $lrf_desgasteFolga6 = aux::GeralPorLinhaEDiagVib($atual6, 13, $linha1, $linha2);
     $lrf_engrenamento6 = aux::GeralPorLinhaEDiagVib($atual6, 14, $linha1, $linha2);
     $lrf_cavitacao6 = aux::GeralPorLinhaEDiagVib($atual6, 15, $linha1, $linha2);
     $lrf_falhaEletrica6 = aux::GeralPorLinhaEDiagVib($atual6, 16, $linha1, $linha2);

     $lrf_desalinhamento7 = aux::GeralPorLinhaEDiagVib($atual7, 9, $linha1, $linha2);
     $lrf_lubrificacao7 = aux::GeralPorLinhaEDiagVib($atual7, 10, $linha1, $linha2);
     $lrf_rolamento7 = aux::GeralPorLinhaEDiagVib($atual7, 11, $linha1, $linha2);
     $lrf_desbalanceamento7 = aux::GeralPorLinhaEDiagVib($atual7, 12, $linha1, $linha2);
     $lrf_desgasteFolga7 = aux::GeralPorLinhaEDiagVib($atual7, 13, $linha1, $linha2);
     $lrf_engrenamento7 = aux::GeralPorLinhaEDiagVib($atual7, 14, $linha1, $linha2);
     $lrf_cavitacao7 = aux::GeralPorLinhaEDiagVib($atual7, 15, $linha1, $linha2);
     $lrf_falhaEletrica7 = aux::GeralPorLinhaEDiagVib($atual7, 16, $linha1, $linha2);

     $lrf_desalinhamento8 = aux::GeralPorLinhaEDiagVib($atual8, 9, $linha1, $linha2);
     $lrf_lubrificacao8 = aux::GeralPorLinhaEDiagVib($atual8, 10, $linha1, $linha2);
     $lrf_rolamento8 = aux::GeralPorLinhaEDiagVib($atual8, 11, $linha1, $linha2);
     $lrf_desgasteFolga8 = aux::GeralPorLinhaEDiagVib($atual8, 13, $linha1, $linha2);
     $lrf_desbalanceamento8 = aux::GeralPorLinhaEDiagVib($atual8, 12, $linha1, $linha2);
     $lrf_engrenamento8 = aux::GeralPorLinhaEDiagVib($atual8, 14, $linha1, $linha2);
     $lrf_cavitacao8 = aux::GeralPorLinhaEDiagVib($atual8, 15, $linha1, $linha2);
     $lrf_falhaEletrica8 = aux::GeralPorLinhaEDiagVib($atual8, 16, $linha1, $linha2);

     $lrf_desalinhamento9 = aux::GeralPorLinhaEDiagVib($atual9, 9, $linha1, $linha2);
     $lrf_lubrificacao9 = aux::GeralPorLinhaEDiagVib($atual9, 10, $linha1, $linha2);
     $lrf_rolamento9 = aux::GeralPorLinhaEDiagVib($atual9, 11, $linha1, $linha2);
     $lrf_desbalanceamento9 = aux::GeralPorLinhaEDiagVib($atual9, 12, $linha1, $linha2);
     $lrf_desgasteFolga9 = aux::GeralPorLinhaEDiagVib($atual9, 13, $linha1, $linha2);
     $lrf_engrenamento9 = aux::GeralPorLinhaEDiagVib($atual9, 14, $linha1, $linha2);
     $lrf_cavitacao9 = aux::GeralPorLinhaEDiagVib($atual9, 15, $linha1, $linha2);
     $lrf_falhaEletrica9 = aux::GeralPorLinhaEDiagVib($atual9, 16, $linha1, $linha2);

     $lrf_desalinhamento10 = aux::GeralPorLinhaEDiagVib($atual10, 9, $linha1, $linha2);
     $lrf_lubrificacao10 = aux::GeralPorLinhaEDiagVib($atual10, 10, $linha1, $linha2);
     $lrf_rolamento10 = aux::GeralPorLinhaEDiagVib($atual10, 11, $linha1, $linha2);
     $lrf_desbalanceamento10 = aux::GeralPorLinhaEDiagVib($atual10, 12, $linha1, $linha2);
     $lrf_desgasteFolga10 = aux::GeralPorLinhaEDiagVib($atual10, 13, $linha1, $linha2);
     $lrf_engrenamento10 = aux::GeralPorLinhaEDiagVib($atual10, 14, $linha1, $linha2);
     $lrf_cavitacao10 = aux::GeralPorLinhaEDiagVib($atual10, 15, $linha1, $linha2);
     $lrf_falhaEletrica10 = aux::GeralPorLinhaEDiagVib($atual10, 16, $linha1, $linha2);

     $lrf_desalinhamento11 = aux::GeralPorLinhaEDiagVib($atual11, 9, $linha1, $linha2);
     $lrf_lubrificacao11 = aux::GeralPorLinhaEDiagVib($atual11, 10, $linha1, $linha2);
     $lrf_rolamento11 = aux::GeralPorLinhaEDiagVib($atual11, 11, $linha1, $linha2);
     $lrf_desbalanceamento11 = aux::GeralPorLinhaEDiagVib($atual11, 12, $linha1, $linha2);
     $lrf_desgasteFolga11 = aux::GeralPorLinhaEDiagVib($atual11, 13, $linha1, $linha2);
     $lrf_engrenamento11 = aux::GeralPorLinhaEDiagVib($atual11, 14, $linha1, $linha2);
     $lrf_cavitacao11 = aux::GeralPorLinhaEDiagVib($atual11, 15, $linha1, $linha2);
     $lrf_falhaEletrica11 = aux::GeralPorLinhaEDiagVib($atual11, 16, $linha1, $linha2);

     $lrf_desalinhamento12 = aux::GeralPorLinhaEDiagVib($atual12, 9, $linha1, $linha2);
     $lrf_lubrificacao12 = aux::GeralPorLinhaEDiagVib($atual12, 10, $linha1, $linha2);
     $lrf_rolamento12 = aux::GeralPorLinhaEDiagVib($atual12, 11, $linha1, $linha2);
     $lrf_desbalanceamento12 = aux::GeralPorLinhaEDiagVib($atual12, 12, $linha1, $linha2);
     $lrf_desgasteFolga12 = aux::GeralPorLinhaEDiagVib($atual12, 13, $linha1, $linha2);
     $lrf_engrenamento12 = aux::GeralPorLinhaEDiagVib($atual12, 14, $linha1, $linha2);
     $lrf_cavitacao12 = aux::GeralPorLinhaEDiagVib($atual12, 15, $linha1, $linha2);
     $lrf_falhaEletrica12 = aux::GeralPorLinhaEDiagVib($atual12, 16, $linha1, $linha2);

        return view('csn.relatorioGerencial.includes.relatoriosVibracao.lrf-problemasEncontrados')->with('title', $title)->with('sum', $sum)
        ->with('atualf1', $atualf1)->with('lrf_desalinhamento1', $lrf_desalinhamento1)->with('lrf_lubrificacao1', $lrf_lubrificacao1)->with('lrf_rolamento1', $lrf_rolamento1)->with('lrf_desbalanceamento1', $lrf_desbalanceamento1)->with('lrf_desgasteFolga1', $lrf_desgasteFolga1)->with('lrf_engrenamento1', $lrf_engrenamento1)->with('lrf_cavitacao1', $lrf_cavitacao1)->with('lrf_falhaEletrica1', $lrf_falhaEletrica1)->with('lrf_desalinhamento1', $lrf_desalinhamento1)
        ->with('atualf2', $atualf2)->with('lrf_desalinhamento2', $lrf_desalinhamento2)->with('lrf_lubrificacao2', $lrf_lubrificacao2)->with('lrf_rolamento2', $lrf_rolamento2)->with('lrf_desbalanceamento2', $lrf_desbalanceamento2)->with('lrf_desgasteFolga2', $lrf_desgasteFolga2)->with('lrf_engrenamento2', $lrf_engrenamento2)->with('lrf_cavitacao2', $lrf_cavitacao2)->with('lrf_falhaEletrica2', $lrf_falhaEletrica2)->with('lrf_desalinhamento2', $lrf_desalinhamento2)
        ->with('atualf3', $atualf3)->with('lrf_desalinhamento3', $lrf_desalinhamento2)->with('lrf_lubrificacao3', $lrf_lubrificacao3)->with('lrf_rolamento3', $lrf_rolamento3)->with('lrf_desbalanceamento3', $lrf_desbalanceamento3)->with('lrf_desgasteFolga3', $lrf_desgasteFolga3)->with('lrf_engrenamento3', $lrf_engrenamento3)->with('lrf_cavitacao3', $lrf_cavitacao3)->with('lrf_falhaEletrica3', $lrf_falhaEletrica3)->with('lrf_desalinhamento3', $lrf_desalinhamento3)
        ->with('atualf4', $atualf4)->with('lrf_desalinhamento4', $lrf_desalinhamento2)->with('lrf_lubrificacao4', $lrf_lubrificacao4)->with('lrf_rolamento4', $lrf_rolamento4)->with('lrf_desbalanceamento4', $lrf_desbalanceamento4)->with('lrf_desgasteFolga4', $lrf_desgasteFolga4)->with('lrf_engrenamento4', $lrf_engrenamento4)->with('lrf_cavitacao4', $lrf_cavitacao4)->with('lrf_falhaEletrica4', $lrf_falhaEletrica4)->with('lrf_desalinhamento4', $lrf_desalinhamento4)
        ->with('atualf5', $atualf5)->with('lrf_desalinhamento5', $lrf_desalinhamento5)->with('lrf_lubrificacao5', $lrf_lubrificacao5)->with('lrf_rolamento5', $lrf_rolamento5)->with('lrf_desbalanceamento5', $lrf_desbalanceamento5)->with('lrf_desgasteFolga5', $lrf_desgasteFolga5)->with('lrf_engrenamento5', $lrf_engrenamento5)->with('lrf_cavitacao5', $lrf_cavitacao5)->with('lrf_falhaEletrica5', $lrf_falhaEletrica5)->with('lrf_desalinhamento5', $lrf_desalinhamento5)
        ->with('atualf6', $atualf6)->with('lrf_desalinhamento6', $lrf_desalinhamento6)->with('lrf_lubrificacao6', $lrf_lubrificacao6)->with('lrf_rolamento6', $lrf_rolamento6)->with('lrf_desbalanceamento6', $lrf_desbalanceamento6)->with('lrf_desgasteFolga6', $lrf_desgasteFolga6)->with('lrf_engrenamento6', $lrf_engrenamento6)->with('lrf_cavitacao6', $lrf_cavitacao6)->with('lrf_falhaEletrica6', $lrf_falhaEletrica6)->with('lrf_desalinhamento6', $lrf_desalinhamento6)
        ->with('atualf7', $atualf7)->with('lrf_desalinhamento7', $lrf_desalinhamento7)->with('lrf_lubrificacao7', $lrf_lubrificacao7)->with('lrf_rolamento7', $lrf_rolamento7)->with('lrf_desbalanceamento7', $lrf_desbalanceamento7)->with('lrf_desgasteFolga7', $lrf_desgasteFolga7)->with('lrf_engrenamento7', $lrf_engrenamento7)->with('lrf_cavitacao7', $lrf_cavitacao7)->with('lrf_falhaEletrica7', $lrf_falhaEletrica7)->with('lrf_desalinhamento7', $lrf_desalinhamento7)
        ->with('atualf8', $atualf8)->with('lrf_desalinhamento8', $lrf_desalinhamento8)->with('lrf_lubrificacao8', $lrf_lubrificacao8)->with('lrf_rolamento8', $lrf_rolamento8)->with('lrf_desbalanceamento8', $lrf_desbalanceamento8)->with('lrf_desgasteFolga8', $lrf_desgasteFolga8)->with('lrf_engrenamento8', $lrf_engrenamento8)->with('lrf_cavitacao8', $lrf_cavitacao8)->with('lrf_falhaEletrica8', $lrf_falhaEletrica8)->with('lrf_desalinhamento8', $lrf_desalinhamento8)
        ->with('atualf9', $atualf9)->with('lrf_desalinhamento9', $lrf_desalinhamento9)->with('lrf_lubrificacao9', $lrf_lubrificacao9)->with('lrf_rolamento9', $lrf_rolamento9)->with('lrf_desbalanceamento9', $lrf_desbalanceamento9)->with('lrf_desgasteFolga9', $lrf_desgasteFolga9)->with('lrf_engrenamento9', $lrf_engrenamento9)->with('lrf_cavitacao9', $lrf_cavitacao9)->with('lrf_falhaEletrica9', $lrf_falhaEletrica9)->with('lrf_desalinhamento9', $lrf_desalinhamento9)
        ->with('atualf10', $atualf10)->with('lrf_desalinhamento10', $lrf_desalinhamento10)->with('lrf_lubrificacao10', $lrf_lubrificacao10)->with('lrf_rolamento10', $lrf_rolamento10)->with('lrf_desbalanceamento10', $lrf_desbalanceamento10)->with('lrf_desgasteFolga10', $lrf_desgasteFolga10)->with('lrf_engrenamento10', $lrf_engrenamento10)->with('lrf_cavitacao10', $lrf_cavitacao10)->with('lrf_falhaEletrica10', $lrf_falhaEletrica10)->with('lrf_desalinhamento10', $lrf_desalinhamento10)
        ->with('atualf11', $atualf11)->with('lrf_desalinhamento11', $lrf_desalinhamento11)->with('lrf_lubrificacao11', $lrf_lubrificacao11)->with('lrf_rolamento11', $lrf_rolamento11)->with('lrf_desbalanceamento11', $lrf_desbalanceamento11)->with('lrf_desgasteFolga11', $lrf_desgasteFolga11)->with('lrf_engrenamento11', $lrf_engrenamento11)->with('lrf_cavitacao11', $lrf_cavitacao11)->with('lrf_falhaEletrica11', $lrf_falhaEletrica11)->with('lrf_desalinhamento11', $lrf_desalinhamento11)
        ->with('atualf12', $atualf12)->with('lrf_desalinhamento12', $lrf_desalinhamento12)->with('lrf_lubrificacao12', $lrf_lubrificacao12)->with('lrf_rolamento12', $lrf_rolamento12)->with('lrf_desbalanceamento12', $lrf_desbalanceamento12)->with('lrf_desgasteFolga12', $lrf_desgasteFolga12)->with('lrf_engrenamento12', $lrf_engrenamento12)->with('lrf_cavitacao12', $lrf_cavitacao12)->with('lrf_falhaEletrica12', $lrf_falhaEletrica12)->with('lrf_desalinhamento12', $lrf_desalinhamento12);
      }

   public function UtiPerfil() {

     $title = 'Perfil | Utilidades';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 7;

     $uti_manutencao = aux::GeralPorLinha2Vib($atual1, 1, $parent);
     $uti_standBy = aux::GeralPorLinha2Vib($atual1, 2, $parent);
     $uti_normal = aux::GeralPorLinha2Vib($atual1, 3, $parent);
     $uti_alarme = aux::GeralPorLinha2Vib($atual1, 4, $parent);
     $uti_critico = aux::GeralPorLinha2Vib($atual1, 5, $parent);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      return view('csn.relatorioGerencial.includes.indexRelGerVB_uti_perfil')->with('title', $title)->with('sum', $sum)
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
                  ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      $uti_normal1 = aux::GeralPorLinha2Vib($atual1, 3, $parent);
      $uti_alarme1 = aux::GeralPorLinha2Vib($atual1, 4, $parent);
      $uti_critico1 = aux::GeralPorLinha2Vib($atual1, 5, $parent);

      $uti_normal2 = aux::GeralPorLinha2Vib($atual2, 3, $parent);
      $uti_alarme2 = aux::GeralPorLinha2Vib($atual2, 4, $parent);
      $uti_critico2 = aux::GeralPorLinha2Vib($atual2, 5, $parent);

      $uti_normal3 = aux::GeralPorLinha2Vib($atual3, 3, $parent);
      $uti_alarme3 = aux::GeralPorLinha2Vib($atual3, 4, $parent);
      $uti_critico3 = aux::GeralPorLinha2Vib($atual3, 5, $parent);

      $uti_normal4 = aux::GeralPorLinha2Vib($atual4, 3, $parent);
      $uti_alarme4 = aux::GeralPorLinha2Vib($atual4, 4, $parent);
      $uti_critico4 = aux::GeralPorLinha2Vib($atual4, 5, $parent);

      $uti_normal5 = aux::GeralPorLinha2Vib($atual5, 3, $parent);
      $uti_alarme5 = aux::GeralPorLinha2Vib($atual5, 4, $parent);
      $uti_critico5 = aux::GeralPorLinha2Vib($atual5, 5, $parent);

      $uti_normal6 = aux::GeralPorLinha2Vib($atual6, 3, $parent);
      $uti_alarme6 = aux::GeralPorLinha2Vib($atual6, 4, $parent);
      $uti_critico6 = aux::GeralPorLinha2Vib($atual6, 5, $parent);

      $uti_normal7 = aux::GeralPorLinha2Vib($atual7, 3, $parent);
      $uti_alarme7 = aux::GeralPorLinha2Vib($atual7, 4, $parent);
      $uti_critico7 = aux::GeralPorLinha2Vib($atual7, 5, $parent);

      $uti_normal8 = aux::GeralPorLinha2Vib($atual8, 3, $parent);
      $uti_alarme8 = aux::GeralPorLinha2Vib($atual8, 4, $parent);
      $uti_critico8 = aux::GeralPorLinha2Vib($atual8, 5, $parent);

      $uti_normal9 = aux::GeralPorLinha2Vib($atual9, 3, $parent);
      $uti_alarme9 = aux::GeralPorLinha2Vib($atual9, 4, $parent);
      $uti_critico9 = aux::GeralPorLinha2Vib($atual9, 5, $parent);

      $uti_normal10 = aux::GeralPorLinha2Vib($atual10, 3, $parent);
      $uti_alarme10 = aux::GeralPorLinha2Vib($atual10, 4, $parent);
      $uti_critico10 = aux::GeralPorLinha2Vib($atual10, 5, $parent);

      $uti_normal11 = aux::GeralPorLinha2Vib($atual11, 3, $parent);
      $uti_alarme11 = aux::GeralPorLinha2Vib($atual11, 4, $parent);
      $uti_critico11 = aux::GeralPorLinha2Vib($atual11, 5, $parent);

      $uti_normal12 = aux::GeralPorLinha2Vib($atual12, 3, $parent);
      $uti_alarme12 = aux::GeralPorLinha2Vib($atual12, 4, $parent);
      $uti_critico12 = aux::GeralPorLinha2Vib($atual12, 5, $parent);

      return view('csn.relatorioGerencial.includes.relatoriosVibracao.uti-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                  ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      $alarme1P = aux::GeralPorLinha2Vib($atual1, 4, $parent);
      $critico1P = aux::GeralPorLinha2Vib($atual1, 5, $parent);
      $alarme2P = aux::GeralPorLinha2Vib($atual2, 4, $parent);
      $critico2P = aux::GeralPorLinha2Vib($atual2, 5, $parent);
      $alarme3P = aux::GeralPorLinha2Vib($atual3, 4, $parent);
      $critico3P = aux::GeralPorLinha2Vib($atual3, 5, $parent);
      $alarme4P = aux::GeralPorLinha2Vib($atual4, 4, $parent);
      $critico4P = aux::GeralPorLinha2Vib($atual4, 5, $parent);
      $alarme5P = aux::GeralPorLinha2Vib($atual5, 4, $parent);
      $critico5P = aux::GeralPorLinha2Vib($atual5, 5, $parent);
      $alarme6P = aux::GeralPorLinha2Vib($atual6, 4, $parent);
      $critico6P = aux::GeralPorLinha2Vib($atual6, 5, $parent);
      $alarme7P = aux::GeralPorLinha2Vib($atual7, 4, $parent);
      $critico7P = aux::GeralPorLinha2Vib($atual7, 5, $parent);
      $alarme8P = aux::GeralPorLinha2Vib($atual8, 4, $parent);
      $critico8P = aux::GeralPorLinha2Vib($atual8, 5, $parent);
      $alarme9P = aux::GeralPorLinha2Vib($atual9, 4, $parent);
      $critico9P = aux::GeralPorLinha2Vib($atual9, 5, $parent);
      $alarme10P = aux::GeralPorLinha2Vib($atual10, 4, $parent);
      $critico10P = aux::GeralPorLinha2Vib($atual10, 5, $parent);
      $alarme11P = aux::GeralPorLinha2Vib($atual11, 4, $parent);
      $critico11P = aux::GeralPorLinha2Vib($atual11, 5, $parent);
      $alarme12P = aux::GeralPorLinha2Vib($atual12, 4, $parent);
      $critico12P = aux::GeralPorLinha2Vib($atual12, 5, $parent);

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

      return view('csn.relatorioGerencial.includes.relatoriosVibracao.uti-anormalidades')->with('title', $title)->with('sum', $sum)
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
                  ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      $uti_desalinhamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 9, $parent);
      $uti_lubrificacao1 = aux::GeralPorLinhaEDiag2Vib($atual1, 10, $parent);
      $uti_rolamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 11, $parent);
      $uti_desbalanceamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 12, $parent);
      $uti_desgasteFolga1 = aux::GeralPorLinhaEDiag2Vib($atual1, 13, $parent);
      $uti_engrenamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 14, $parent);
      $uti_cavitacao1 = aux::GeralPorLinhaEDiag2Vib($atual1, 15, $parent);
      $uti_falhaEletrica1 = aux::GeralPorLinhaEDiag2Vib($atual1, 16, $parent);

      $uti_desalinhamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 9, $parent);
      $uti_lubrificacao2 = aux::GeralPorLinhaEDiag2Vib($atual2, 10, $parent);
      $uti_rolamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 11, $parent);
      $uti_desbalanceamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 12, $parent);
      $uti_desgasteFolga2 = aux::GeralPorLinhaEDiag2Vib($atual2, 13, $parent);
      $uti_engrenamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 14, $parent);
      $uti_cavitacao2 = aux::GeralPorLinhaEDiag2Vib($atual2, 15, $parent);
      $uti_falhaEletrica2 = aux::GeralPorLinhaEDiag2Vib($atual2, 16, $parent);

      $uti_desalinhamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 9, $parent);
      $uti_lubrificacao3 = aux::GeralPorLinhaEDiag2Vib($atual3, 10, $parent);
      $uti_rolamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 11, $parent);
      $uti_desbalanceamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 12, $parent);
      $uti_desgasteFolga3 = aux::GeralPorLinhaEDiag2Vib($atual3, 13, $parent);
      $uti_engrenamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 14, $parent);
      $uti_cavitacao3 = aux::GeralPorLinhaEDiag2Vib($atual3, 15, $parent);
      $uti_falhaEletrica3 = aux::GeralPorLinhaEDiag2Vib($atual3, 16, $parent);

      $uti_desalinhamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 9, $parent);
      $uti_lubrificacao4 = aux::GeralPorLinhaEDiag2Vib($atual4, 10, $parent);
      $uti_rolamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 11, $parent);
      $uti_desbalanceamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 12, $parent);
      $uti_desgasteFolga4 = aux::GeralPorLinhaEDiag2Vib($atual4, 13, $parent);
      $uti_engrenamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 14, $parent);
      $uti_cavitacao4 = aux::GeralPorLinhaEDiag2Vib($atual4, 15, $parent);
      $uti_falhaEletrica4 = aux::GeralPorLinhaEDiag2Vib($atual4, 16, $parent);

      $uti_desalinhamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 9, $parent);
      $uti_lubrificacao5 = aux::GeralPorLinhaEDiag2Vib($atual5, 10, $parent);
      $uti_rolamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 11, $parent);
      $uti_desbalanceamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 12, $parent);
      $uti_desgasteFolga5 = aux::GeralPorLinhaEDiag2Vib($atual5, 13, $parent);
      $uti_engrenamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 14, $parent);
      $uti_cavitacao5 = aux::GeralPorLinhaEDiag2Vib($atual5, 15, $parent);
      $uti_falhaEletrica5 = aux::GeralPorLinhaEDiag2Vib($atual5, 16, $parent);

      $uti_desalinhamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 9, $parent);
      $uti_lubrificacao6 = aux::GeralPorLinhaEDiag2Vib($atual6, 10, $parent);
      $uti_rolamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 11, $parent);
      $uti_desbalanceamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 12, $parent);
      $uti_desgasteFolga6 = aux::GeralPorLinhaEDiag2Vib($atual6, 13, $parent);
      $uti_engrenamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 14, $parent);
      $uti_cavitacao6 = aux::GeralPorLinhaEDiag2Vib($atual6, 15, $parent);
      $uti_falhaEletrica6 = aux::GeralPorLinhaEDiag2Vib($atual6, 16, $parent);

      $uti_desalinhamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 9, $parent);
      $uti_lubrificacao7 = aux::GeralPorLinhaEDiag2Vib($atual7, 10, $parent);
      $uti_rolamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 11, $parent);
      $uti_desbalanceamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 12, $parent);
      $uti_desgasteFolga7 = aux::GeralPorLinhaEDiag2Vib($atual7, 13, $parent);
      $uti_engrenamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 14, $parent);
      $uti_cavitacao7 = aux::GeralPorLinhaEDiag2Vib($atual7, 15, $parent);
      $uti_falhaEletrica7 = aux::GeralPorLinhaEDiag2Vib($atual7, 16, $parent);

      $uti_desalinhamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 9, $parent);
      $uti_lubrificacao8 = aux::GeralPorLinhaEDiag2Vib($atual8, 10, $parent);
      $uti_rolamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 11, $parent);
      $uti_desbalanceamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 12, $parent);
      $uti_desgasteFolga8 = aux::GeralPorLinhaEDiag2Vib($atual8, 13, $parent);
      $uti_engrenamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 14, $parent);
      $uti_cavitacao8 = aux::GeralPorLinhaEDiag2Vib($atual8, 15, $parent);
      $uti_falhaEletrica8 = aux::GeralPorLinhaEDiag2Vib($atual8, 16, $parent);

      $uti_desalinhamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 9, $parent);
      $uti_lubrificacao9 = aux::GeralPorLinhaEDiag2Vib($atual9, 10, $parent);
      $uti_rolamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 11, $parent);
      $uti_desbalanceamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 12, $parent);
      $uti_desgasteFolga9 = aux::GeralPorLinhaEDiag2Vib($atual9, 13, $parent);
      $uti_engrenamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 14, $parent);
      $uti_cavitacao9 = aux::GeralPorLinhaEDiag2Vib($atual9, 15, $parent);
      $uti_falhaEletrica9 = aux::GeralPorLinhaEDiag2Vib($atual9, 16, $parent);

      $uti_desalinhamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 9, $parent);
      $uti_lubrificacao10 = aux::GeralPorLinhaEDiag2Vib($atual10, 10, $parent);
      $uti_rolamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 11, $parent);
      $uti_desbalanceamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 12, $parent);
      $uti_desgasteFolga10 = aux::GeralPorLinhaEDiag2Vib($atual10, 13, $parent);
      $uti_engrenamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 14, $parent);
      $uti_cavitacao10 = aux::GeralPorLinhaEDiag2Vib($atual10, 15, $parent);
      $uti_falhaEletrica10 = aux::GeralPorLinhaEDiag2Vib($atual10, 16, $parent);

      $uti_desalinhamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 9, $parent);
      $uti_lubrificacao11 = aux::GeralPorLinhaEDiag2Vib($atual11, 10, $parent);
      $uti_rolamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 11, $parent);
      $uti_desbalanceamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 12, $parent);
      $uti_desgasteFolga11 = aux::GeralPorLinhaEDiag2Vib($atual11, 13, $parent);
      $uti_engrenamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 14, $parent);
      $uti_cavitacao11 = aux::GeralPorLinhaEDiag2Vib($atual11, 15, $parent);
      $uti_falhaEletrica11 = aux::GeralPorLinhaEDiag2Vib($atual11, 16, $parent);

      $uti_desalinhamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 9, $parent);
      $uti_lubrificacao12 = aux::GeralPorLinhaEDiag2Vib($atual12, 10, $parent);
      $uti_rolamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 11, $parent);
      $uti_desbalanceamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 12, $parent);
      $uti_desgasteFolga12 = aux::GeralPorLinhaEDiag2Vib($atual12, 13, $parent);
      $uti_engrenamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 14, $parent);
      $uti_cavitacao12 = aux::GeralPorLinhaEDiag2Vib($atual12, 15, $parent);
      $uti_falhaEletrica12 = aux::GeralPorLinhaEDiag2Vib($atual12, 16, $parent);

      return view('csn.relatorioGerencial.includes.relatoriosVibracao.uti-problemasEncontrados')->with('title', $title)->with('sum', $sum)
        ->with('atualf1', $atualf1)->with('uti_desalinhamento1', $uti_desalinhamento1)->with('uti_lubrificacao1', $uti_lubrificacao1)->with('uti_rolamento1', $uti_rolamento1)->with('uti_desbalanceamento1', $uti_desbalanceamento1)->with('uti_desgasteFolga1', $uti_desgasteFolga1)->with('uti_engrenamento1', $uti_engrenamento1)->with('uti_cavitacao1', $uti_cavitacao1)->with('uti_falhaEletrica1', $uti_falhaEletrica1)->with('uti_desalinhamento1', $uti_desalinhamento1)
        ->with('atualf2', $atualf2)->with('uti_desalinhamento2', $uti_desalinhamento2)->with('uti_lubrificacao2', $uti_lubrificacao2)->with('uti_rolamento2', $uti_rolamento2)->with('uti_desbalanceamento2', $uti_desbalanceamento2)->with('uti_desgasteFolga2', $uti_desgasteFolga2)->with('uti_engrenamento2', $uti_engrenamento2)->with('uti_cavitacao2', $uti_cavitacao2)->with('uti_falhaEletrica2', $uti_falhaEletrica2)->with('uti_desalinhamento2', $uti_desalinhamento2)
        ->with('atualf3', $atualf3)->with('uti_desalinhamento3', $uti_desalinhamento2)->with('uti_lubrificacao3', $uti_lubrificacao3)->with('uti_rolamento3', $uti_rolamento3)->with('uti_desbalanceamento3', $uti_desbalanceamento3)->with('uti_desgasteFolga3', $uti_desgasteFolga3)->with('uti_engrenamento3', $uti_engrenamento3)->with('uti_cavitacao3', $uti_cavitacao3)->with('uti_falhaEletrica3', $uti_falhaEletrica3)->with('uti_desalinhamento3', $uti_desalinhamento3)
        ->with('atualf4', $atualf4)->with('uti_desalinhamento4', $uti_desalinhamento2)->with('uti_lubrificacao4', $uti_lubrificacao4)->with('uti_rolamento4', $uti_rolamento4)->with('uti_desbalanceamento4', $uti_desbalanceamento4)->with('uti_desgasteFolga4', $uti_desgasteFolga4)->with('uti_engrenamento4', $uti_engrenamento4)->with('uti_cavitacao4', $uti_cavitacao4)->with('uti_falhaEletrica4', $uti_falhaEletrica4)->with('uti_desalinhamento4', $uti_desalinhamento4)
        ->with('atualf5', $atualf5)->with('uti_desalinhamento5', $uti_desalinhamento5)->with('uti_lubrificacao5', $uti_lubrificacao5)->with('uti_rolamento5', $uti_rolamento5)->with('uti_desbalanceamento5', $uti_desbalanceamento5)->with('uti_desgasteFolga5', $uti_desgasteFolga5)->with('uti_engrenamento5', $uti_engrenamento5)->with('uti_cavitacao5', $uti_cavitacao5)->with('uti_falhaEletrica5', $uti_falhaEletrica5)->with('uti_desalinhamento5', $uti_desalinhamento5)
        ->with('atualf6', $atualf6)->with('uti_desalinhamento6', $uti_desalinhamento6)->with('uti_lubrificacao6', $uti_lubrificacao6)->with('uti_rolamento6', $uti_rolamento6)->with('uti_desbalanceamento6', $uti_desbalanceamento6)->with('uti_desgasteFolga6', $uti_desgasteFolga6)->with('uti_engrenamento6', $uti_engrenamento6)->with('uti_cavitacao6', $uti_cavitacao6)->with('uti_falhaEletrica6', $uti_falhaEletrica6)->with('uti_desalinhamento6', $uti_desalinhamento6)
        ->with('atualf7', $atualf7)->with('uti_desalinhamento7', $uti_desalinhamento7)->with('uti_lubrificacao7', $uti_lubrificacao7)->with('uti_rolamento7', $uti_rolamento7)->with('uti_desbalanceamento7', $uti_desbalanceamento7)->with('uti_desgasteFolga7', $uti_desgasteFolga7)->with('uti_engrenamento7', $uti_engrenamento7)->with('uti_cavitacao7', $uti_cavitacao7)->with('uti_falhaEletrica7', $uti_falhaEletrica7)->with('uti_desalinhamento7', $uti_desalinhamento7)
        ->with('atualf8', $atualf8)->with('uti_desalinhamento8', $uti_desalinhamento8)->with('uti_lubrificacao8', $uti_lubrificacao8)->with('uti_rolamento8', $uti_rolamento8)->with('uti_desbalanceamento8', $uti_desbalanceamento8)->with('uti_desgasteFolga8', $uti_desgasteFolga8)->with('uti_engrenamento8', $uti_engrenamento8)->with('uti_cavitacao8', $uti_cavitacao8)->with('uti_falhaEletrica8', $uti_falhaEletrica8)->with('uti_desalinhamento8', $uti_desalinhamento8)
        ->with('atualf9', $atualf9)->with('uti_desalinhamento9', $uti_desalinhamento9)->with('uti_lubrificacao9', $uti_lubrificacao9)->with('uti_rolamento9', $uti_rolamento9)->with('uti_desbalanceamento9', $uti_desbalanceamento9)->with('uti_desgasteFolga9', $uti_desgasteFolga9)->with('uti_engrenamento9', $uti_engrenamento9)->with('uti_cavitacao9', $uti_cavitacao9)->with('uti_falhaEletrica9', $uti_falhaEletrica9)->with('uti_desalinhamento9', $uti_desalinhamento9)
        ->with('atualf10', $atualf10)->with('uti_desalinhamento10', $uti_desalinhamento10)->with('uti_lubrificacao10', $uti_lubrificacao10)->with('uti_rolamento10', $uti_rolamento10)->with('uti_desbalanceamento10', $uti_desbalanceamento10)->with('uti_desgasteFolga10', $uti_desgasteFolga10)->with('uti_engrenamento10', $uti_engrenamento10)->with('uti_cavitacao10', $uti_cavitacao10)->with('uti_falhaEletrica10', $uti_falhaEletrica10)->with('uti_desalinhamento10', $uti_desalinhamento10)
        ->with('atualf11', $atualf11)->with('uti_desalinhamento11', $uti_desalinhamento11)->with('uti_lubrificacao11', $uti_lubrificacao11)->with('uti_rolamento11', $uti_rolamento11)->with('uti_desbalanceamento11', $uti_desbalanceamento11)->with('uti_desgasteFolga11', $uti_desgasteFolga11)->with('uti_engrenamento11', $uti_engrenamento11)->with('uti_cavitacao11', $uti_cavitacao11)->with('uti_falhaEletrica11', $uti_falhaEletrica11)->with('uti_desalinhamento11', $uti_desalinhamento11)
        ->with('atualf12', $atualf12)->with('uti_desalinhamento12', $uti_desalinhamento12)->with('uti_lubrificacao12', $uti_lubrificacao12)->with('uti_rolamento12', $uti_rolamento12)->with('uti_desbalanceamento12', $uti_desbalanceamento12)->with('uti_desgasteFolga12', $uti_desgasteFolga12)->with('uti_engrenamento12', $uti_engrenamento12)->with('uti_cavitacao12', $uti_cavitacao12)->with('uti_falhaEletrica12', $uti_falhaEletrica12)->with('uti_desalinhamento12', $uti_desalinhamento12);
   }

   public function LgcPerfil() {

     $title = 'Perfil | LGC';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 13;
     $linha2 = 0;

     $lgc_manutencao = aux::GeralPorLinhaVib($atual1, 1, $linha1, $linha2);
     $lgc_standBy = aux::GeralPorLinhaVib($atual1, 2, $linha1, $linha2);
     $lgc_normal = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $lgc_alarme = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $lgc_critico = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      return view('csn.relatorioGerencial.includes.indexRelGerVB_lgc_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $lgc_normal1 = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $lgc_alarme1 = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $lgc_critico1 = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

     $lgc_normal2 = aux::GeralPorLinhaVib($atual2, 3, $linha1, $linha2);
     $lgc_alarme2 = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $lgc_critico2 = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);

     $lgc_normal3 = aux::GeralPorLinhaVib($atual3, 3, $linha1, $linha2);
     $lgc_alarme3 = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $lgc_critico3 = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);

     $lgc_normal4 = aux::GeralPorLinhaVib($atual4, 3, $linha1, $linha2);
     $lgc_alarme4 = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $lgc_critico4 = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);

     $lgc_normal5 = aux::GeralPorLinhaVib($atual5, 3, $linha1, $linha2);
     $lgc_alarme5 = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $lgc_critico5 = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);

     $lgc_normal6 = aux::GeralPorLinhaVib($atual6, 3, $linha1, $linha2);
     $lgc_alarme6 = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $lgc_critico6 = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);

     $lgc_normal7 = aux::GeralPorLinhaVib($atual7, 3, $linha1, $linha2);
     $lgc_alarme7 = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $lgc_critico7 = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);

     $lgc_normal8 = aux::GeralPorLinhaVib($atual8, 3, $linha1, $linha2);
     $lgc_alarme8 = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $lgc_critico8 = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);

     $lgc_normal9 = aux::GeralPorLinhaVib($atual9, 3, $linha1, $linha2);
     $lgc_alarme9 = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $lgc_critico9 = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);

     $lgc_normal10 = aux::GeralPorLinhaVib($atual10, 3, $linha1, $linha2);
     $lgc_alarme10 = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $lgc_critico10 = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);

     $lgc_normal11 = aux::GeralPorLinhaVib($atual11, 3, $linha1, $linha2);
     $lgc_alarme11 = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $lgc_critico11 = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);

     $lgc_normal12 = aux::GeralPorLinhaVib($atual12, 3, $linha1, $linha2);
     $lgc_alarme12 = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $lgc_critico12 = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lgc-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $alarme1P = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lgc-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $lgc_desalinhamento1 = aux::GeralPorLinhaEDiagVib($atual1, 9, $linha1, $linha2);
     $lgc_lubrificacao1 = aux::GeralPorLinhaEDiagVib($atual1, 10, $linha1, $linha2);
     $lgc_rolamento1 = aux::GeralPorLinhaEDiagVib($atual1, 11, $linha1, $linha2);
     $lgc_desbalanceamento1 = aux::GeralPorLinhaEDiagVib($atual1, 12, $linha1, $linha2);
     $lgc_desgasteFolga1 = aux::GeralPorLinhaEDiagVib($atual1, 13, $linha1, $linha2);
     $lgc_engrenamento1 = aux::GeralPorLinhaEDiagVib($atual1, 14, $linha1, $linha2);
     $lgc_cavitacao1 = aux::GeralPorLinhaEDiagVib($atual1, 15, $linha1, $linha2);
     $lgc_falhaEletrica1 = aux::GeralPorLinhaEDiagVib($atual1, 16, $linha1, $linha2);

     $lgc_desalinhamento2 = aux::GeralPorLinhaEDiagVib($atual2, 9, $linha1, $linha2);
     $lgc_lubrificacao2 = aux::GeralPorLinhaEDiagVib($atual2, 10, $linha1, $linha2);
     $lgc_rolamento2 = aux::GeralPorLinhaEDiagVib($atual2, 11, $linha1, $linha2);
     $lgc_desbalanceamento2 = aux::GeralPorLinhaEDiagVib($atual2, 12, $linha1, $linha2);
     $lgc_desgasteFolga2 = aux::GeralPorLinhaEDiagVib($atual2, 13, $linha1, $linha2);
     $lgc_engrenamento2 = aux::GeralPorLinhaEDiagVib($atual2, 14, $linha1, $linha2);
     $lgc_cavitacao2 = aux::GeralPorLinhaEDiagVib($atual2, 15, $linha1, $linha2);
     $lgc_falhaEletrica2 = aux::GeralPorLinhaEDiagVib($atual2, 16, $linha1, $linha2);

     $lgc_desalinhamento3 = aux::GeralPorLinhaEDiagVib($atual3, 9, $linha1, $linha2);
     $lgc_lubrificacao3 = aux::GeralPorLinhaEDiagVib($atual3, 10, $linha1, $linha2);
     $lgc_rolamento3 = aux::GeralPorLinhaEDiagVib($atual3, 11, $linha1, $linha2);
     $lgc_desbalanceamento3 = aux::GeralPorLinhaEDiagVib($atual3, 12, $linha1, $linha2);
     $lgc_desgasteFolga3 = aux::GeralPorLinhaEDiagVib($atual3, 13, $linha1, $linha2);
     $lgc_engrenamento3 = aux::GeralPorLinhaEDiagVib($atual3, 14, $linha1, $linha2);
     $lgc_cavitacao3 = aux::GeralPorLinhaEDiagVib($atual3, 15, $linha1, $linha2);
     $lgc_falhaEletrica3 = aux::GeralPorLinhaEDiagVib($atual3, 16, $linha1, $linha2);

     $lgc_desalinhamento4 = aux::GeralPorLinhaEDiagVib($atual4, 9, $linha1, $linha2);
     $lgc_lubrificacao4 = aux::GeralPorLinhaEDiagVib($atual4, 10, $linha1, $linha2);
     $lgc_rolamento4 = aux::GeralPorLinhaEDiagVib($atual4, 11, $linha1, $linha2);
     $lgc_desbalanceamento4 = aux::GeralPorLinhaEDiagVib($atual4, 12, $linha1, $linha2);
     $lgc_desgasteFolga4 = aux::GeralPorLinhaEDiagVib($atual4, 13, $linha1, $linha2);
     $lgc_engrenamento4 = aux::GeralPorLinhaEDiagVib($atual4, 14, $linha1, $linha2);
     $lgc_cavitacao4 = aux::GeralPorLinhaEDiagVib($atual4, 15, $linha1, $linha2);
     $lgc_falhaEletrica4 = aux::GeralPorLinhaEDiagVib($atual4, 16, $linha1, $linha2);

     $lgc_desalinhamento5 = aux::GeralPorLinhaEDiagVib($atual5, 9, $linha1, $linha2);
     $lgc_lubrificacao5 = aux::GeralPorLinhaEDiagVib($atual5, 10, $linha1, $linha2);
     $lgc_rolamento5 = aux::GeralPorLinhaEDiagVib($atual5, 11, $linha1, $linha2);
     $lgc_desbalanceamento5 = aux::GeralPorLinhaEDiagVib($atual5, 12, $linha1, $linha2);
     $lgc_engrenamento5 = aux::GeralPorLinhaEDiagVib($atual5, 14, $linha1, $linha2);
     $lgc_desgasteFolga5 = aux::GeralPorLinhaEDiagVib($atual5, 13, $linha1, $linha2);
     $lgc_cavitacao5 = aux::GeralPorLinhaEDiagVib($atual5, 15, $linha1, $linha2);
     $lgc_falhaEletrica5 = aux::GeralPorLinhaEDiagVib($atual5, 16, $linha1, $linha2);

     $lgc_desalinhamento6 = aux::GeralPorLinhaEDiagVib($atual6, 9, $linha1, $linha2);
     $lgc_lubrificacao6 = aux::GeralPorLinhaEDiagVib($atual6, 10, $linha1, $linha2);
     $lgc_rolamento6 = aux::GeralPorLinhaEDiagVib($atual6, 11, $linha1, $linha2);
     $lgc_desbalanceamento6 = aux::GeralPorLinhaEDiagVib($atual6, 12, $linha1, $linha2);
     $lgc_desgasteFolga6 = aux::GeralPorLinhaEDiagVib($atual6, 13, $linha1, $linha2);
     $lgc_engrenamento6 = aux::GeralPorLinhaEDiagVib($atual6, 14, $linha1, $linha2);
     $lgc_cavitacao6 = aux::GeralPorLinhaEDiagVib($atual6, 15, $linha1, $linha2);
     $lgc_falhaEletrica6 = aux::GeralPorLinhaEDiagVib($atual6, 16, $linha1, $linha2);

     $lgc_desalinhamento7 = aux::GeralPorLinhaEDiagVib($atual7, 9, $linha1, $linha2);
     $lgc_lubrificacao7 = aux::GeralPorLinhaEDiagVib($atual7, 10, $linha1, $linha2);
     $lgc_rolamento7 = aux::GeralPorLinhaEDiagVib($atual7, 11, $linha1, $linha2);
     $lgc_desbalanceamento7 = aux::GeralPorLinhaEDiagVib($atual7, 12, $linha1, $linha2);
     $lgc_desgasteFolga7 = aux::GeralPorLinhaEDiagVib($atual7, 13, $linha1, $linha2);
     $lgc_engrenamento7 = aux::GeralPorLinhaEDiagVib($atual7, 14, $linha1, $linha2);
     $lgc_cavitacao7 = aux::GeralPorLinhaEDiagVib($atual7, 15, $linha1, $linha2);
     $lgc_falhaEletrica7 = aux::GeralPorLinhaEDiagVib($atual7, 16, $linha1, $linha2);

     $lgc_desalinhamento8 = aux::GeralPorLinhaEDiagVib($atual8, 9, $linha1, $linha2);
     $lgc_lubrificacao8 = aux::GeralPorLinhaEDiagVib($atual8, 10, $linha1, $linha2);
     $lgc_rolamento8 = aux::GeralPorLinhaEDiagVib($atual8, 11, $linha1, $linha2);
     $lgc_desgasteFolga8 = aux::GeralPorLinhaEDiagVib($atual8, 13, $linha1, $linha2);
     $lgc_desbalanceamento8 = aux::GeralPorLinhaEDiagVib($atual8, 12, $linha1, $linha2);
     $lgc_engrenamento8 = aux::GeralPorLinhaEDiagVib($atual8, 14, $linha1, $linha2);
     $lgc_cavitacao8 = aux::GeralPorLinhaEDiagVib($atual8, 15, $linha1, $linha2);
     $lgc_falhaEletrica8 = aux::GeralPorLinhaEDiagVib($atual8, 16, $linha1, $linha2);

     $lgc_desalinhamento9 = aux::GeralPorLinhaEDiagVib($atual9, 9, $linha1, $linha2);
     $lgc_lubrificacao9 = aux::GeralPorLinhaEDiagVib($atual9, 10, $linha1, $linha2);
     $lgc_rolamento9 = aux::GeralPorLinhaEDiagVib($atual9, 11, $linha1, $linha2);
     $lgc_desbalanceamento9 = aux::GeralPorLinhaEDiagVib($atual9, 12, $linha1, $linha2);
     $lgc_desgasteFolga9 = aux::GeralPorLinhaEDiagVib($atual9, 13, $linha1, $linha2);
     $lgc_engrenamento9 = aux::GeralPorLinhaEDiagVib($atual9, 14, $linha1, $linha2);
     $lgc_cavitacao9 = aux::GeralPorLinhaEDiagVib($atual9, 15, $linha1, $linha2);
     $lgc_falhaEletrica9 = aux::GeralPorLinhaEDiagVib($atual9, 16, $linha1, $linha2);

     $lgc_desalinhamento10 = aux::GeralPorLinhaEDiagVib($atual10, 9, $linha1, $linha2);
     $lgc_lubrificacao10 = aux::GeralPorLinhaEDiagVib($atual10, 10, $linha1, $linha2);
     $lgc_rolamento10 = aux::GeralPorLinhaEDiagVib($atual10, 11, $linha1, $linha2);
     $lgc_desbalanceamento10 = aux::GeralPorLinhaEDiagVib($atual10, 12, $linha1, $linha2);
     $lgc_desgasteFolga10 = aux::GeralPorLinhaEDiagVib($atual10, 13, $linha1, $linha2);
     $lgc_engrenamento10 = aux::GeralPorLinhaEDiagVib($atual10, 14, $linha1, $linha2);
     $lgc_cavitacao10 = aux::GeralPorLinhaEDiagVib($atual10, 15, $linha1, $linha2);
     $lgc_falhaEletrica10 = aux::GeralPorLinhaEDiagVib($atual10, 16, $linha1, $linha2);

     $lgc_desalinhamento11 = aux::GeralPorLinhaEDiagVib($atual11, 9, $linha1, $linha2);
     $lgc_lubrificacao11 = aux::GeralPorLinhaEDiagVib($atual11, 10, $linha1, $linha2);
     $lgc_rolamento11 = aux::GeralPorLinhaEDiagVib($atual11, 11, $linha1, $linha2);
     $lgc_desbalanceamento11 = aux::GeralPorLinhaEDiagVib($atual11, 12, $linha1, $linha2);
     $lgc_desgasteFolga11 = aux::GeralPorLinhaEDiagVib($atual11, 13, $linha1, $linha2);
     $lgc_engrenamento11 = aux::GeralPorLinhaEDiagVib($atual11, 14, $linha1, $linha2);
     $lgc_cavitacao11 = aux::GeralPorLinhaEDiagVib($atual11, 15, $linha1, $linha2);
     $lgc_falhaEletrica11 = aux::GeralPorLinhaEDiagVib($atual11, 16, $linha1, $linha2);

     $lgc_desalinhamento12 = aux::GeralPorLinhaEDiagVib($atual12, 9, $linha1, $linha2);
     $lgc_lubrificacao12 = aux::GeralPorLinhaEDiagVib($atual12, 10, $linha1, $linha2);
     $lgc_rolamento12 = aux::GeralPorLinhaEDiagVib($atual12, 11, $linha1, $linha2);
     $lgc_desbalanceamento12 = aux::GeralPorLinhaEDiagVib($atual12, 12, $linha1, $linha2);
     $lgc_desgasteFolga12 = aux::GeralPorLinhaEDiagVib($atual12, 13, $linha1, $linha2);
     $lgc_engrenamento12 = aux::GeralPorLinhaEDiagVib($atual12, 14, $linha1, $linha2);
     $lgc_cavitacao12 = aux::GeralPorLinhaEDiagVib($atual12, 15, $linha1, $linha2);
     $lgc_falhaEletrica12 = aux::GeralPorLinhaEDiagVib($atual12, 16, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lgc-problemasEncontrados')->with('title', $title)->with('sum', $sum)
               ->with('atualf1', $atualf1)->with('lgc_desalinhamento1', $lgc_desalinhamento1)->with('lgc_lubrificacao1', $lgc_lubrificacao1)->with('lgc_rolamento1', $lgc_rolamento1)->with('lgc_desbalanceamento1', $lgc_desbalanceamento1)->with('lgc_desgasteFolga1', $lgc_desgasteFolga1)->with('lgc_engrenamento1', $lgc_engrenamento1)->with('lgc_cavitacao1', $lgc_cavitacao1)->with('lgc_falhaEletrica1', $lgc_falhaEletrica1)->with('lgc_desalinhamento1', $lgc_desalinhamento1)
               ->with('atualf2', $atualf2)->with('lgc_desalinhamento2', $lgc_desalinhamento2)->with('lgc_lubrificacao2', $lgc_lubrificacao2)->with('lgc_rolamento2', $lgc_rolamento2)->with('lgc_desbalanceamento2', $lgc_desbalanceamento2)->with('lgc_desgasteFolga2', $lgc_desgasteFolga2)->with('lgc_engrenamento2', $lgc_engrenamento2)->with('lgc_cavitacao2', $lgc_cavitacao2)->with('lgc_falhaEletrica2', $lgc_falhaEletrica2)->with('lgc_desalinhamento2', $lgc_desalinhamento2)
               ->with('atualf3', $atualf3)->with('lgc_desalinhamento3', $lgc_desalinhamento2)->with('lgc_lubrificacao3', $lgc_lubrificacao3)->with('lgc_rolamento3', $lgc_rolamento3)->with('lgc_desbalanceamento3', $lgc_desbalanceamento3)->with('lgc_desgasteFolga3', $lgc_desgasteFolga3)->with('lgc_engrenamento3', $lgc_engrenamento3)->with('lgc_cavitacao3', $lgc_cavitacao3)->with('lgc_falhaEletrica3', $lgc_falhaEletrica3)->with('lgc_desalinhamento3', $lgc_desalinhamento3)
               ->with('atualf4', $atualf4)->with('lgc_desalinhamento4', $lgc_desalinhamento2)->with('lgc_lubrificacao4', $lgc_lubrificacao4)->with('lgc_rolamento4', $lgc_rolamento4)->with('lgc_desbalanceamento4', $lgc_desbalanceamento4)->with('lgc_desgasteFolga4', $lgc_desgasteFolga4)->with('lgc_engrenamento4', $lgc_engrenamento4)->with('lgc_cavitacao4', $lgc_cavitacao4)->with('lgc_falhaEletrica4', $lgc_falhaEletrica4)->with('lgc_desalinhamento4', $lgc_desalinhamento4)
               ->with('atualf5', $atualf5)->with('lgc_desalinhamento5', $lgc_desalinhamento5)->with('lgc_lubrificacao5', $lgc_lubrificacao5)->with('lgc_rolamento5', $lgc_rolamento5)->with('lgc_desbalanceamento5', $lgc_desbalanceamento5)->with('lgc_desgasteFolga5', $lgc_desgasteFolga5)->with('lgc_engrenamento5', $lgc_engrenamento5)->with('lgc_cavitacao5', $lgc_cavitacao5)->with('lgc_falhaEletrica5', $lgc_falhaEletrica5)->with('lgc_desalinhamento5', $lgc_desalinhamento5)
               ->with('atualf6', $atualf6)->with('lgc_desalinhamento6', $lgc_desalinhamento6)->with('lgc_lubrificacao6', $lgc_lubrificacao6)->with('lgc_rolamento6', $lgc_rolamento6)->with('lgc_desbalanceamento6', $lgc_desbalanceamento6)->with('lgc_desgasteFolga6', $lgc_desgasteFolga6)->with('lgc_engrenamento6', $lgc_engrenamento6)->with('lgc_cavitacao6', $lgc_cavitacao6)->with('lgc_falhaEletrica6', $lgc_falhaEletrica6)->with('lgc_desalinhamento6', $lgc_desalinhamento6)
               ->with('atualf7', $atualf7)->with('lgc_desalinhamento7', $lgc_desalinhamento7)->with('lgc_lubrificacao7', $lgc_lubrificacao7)->with('lgc_rolamento7', $lgc_rolamento7)->with('lgc_desbalanceamento7', $lgc_desbalanceamento7)->with('lgc_desgasteFolga7', $lgc_desgasteFolga7)->with('lgc_engrenamento7', $lgc_engrenamento7)->with('lgc_cavitacao7', $lgc_cavitacao7)->with('lgc_falhaEletrica7', $lgc_falhaEletrica7)->with('lgc_desalinhamento7', $lgc_desalinhamento7)
               ->with('atualf8', $atualf8)->with('lgc_desalinhamento8', $lgc_desalinhamento8)->with('lgc_lubrificacao8', $lgc_lubrificacao8)->with('lgc_rolamento8', $lgc_rolamento8)->with('lgc_desbalanceamento8', $lgc_desbalanceamento8)->with('lgc_desgasteFolga8', $lgc_desgasteFolga8)->with('lgc_engrenamento8', $lgc_engrenamento8)->with('lgc_cavitacao8', $lgc_cavitacao8)->with('lgc_falhaEletrica8', $lgc_falhaEletrica8)->with('lgc_desalinhamento8', $lgc_desalinhamento8)
               ->with('atualf9', $atualf9)->with('lgc_desalinhamento9', $lgc_desalinhamento9)->with('lgc_lubrificacao9', $lgc_lubrificacao9)->with('lgc_rolamento9', $lgc_rolamento9)->with('lgc_desbalanceamento9', $lgc_desbalanceamento9)->with('lgc_desgasteFolga9', $lgc_desgasteFolga9)->with('lgc_engrenamento9', $lgc_engrenamento9)->with('lgc_cavitacao9', $lgc_cavitacao9)->with('lgc_falhaEletrica9', $lgc_falhaEletrica9)->with('lgc_desalinhamento9', $lgc_desalinhamento9)
               ->with('atualf10', $atualf10)->with('lgc_desalinhamento10', $lgc_desalinhamento10)->with('lgc_lubrificacao10', $lgc_lubrificacao10)->with('lgc_rolamento10', $lgc_rolamento10)->with('lgc_desbalanceamento10', $lgc_desbalanceamento10)->with('lgc_desgasteFolga10', $lgc_desgasteFolga10)->with('lgc_engrenamento10', $lgc_engrenamento10)->with('lgc_cavitacao10', $lgc_cavitacao10)->with('lgc_falhaEletrica10', $lgc_falhaEletrica10)->with('lgc_desalinhamento10', $lgc_desalinhamento10)
               ->with('atualf11', $atualf11)->with('lgc_desalinhamento11', $lgc_desalinhamento11)->with('lgc_lubrificacao11', $lgc_lubrificacao11)->with('lgc_rolamento11', $lgc_rolamento11)->with('lgc_desbalanceamento11', $lgc_desbalanceamento11)->with('lgc_desgasteFolga11', $lgc_desgasteFolga11)->with('lgc_engrenamento11', $lgc_engrenamento11)->with('lgc_cavitacao11', $lgc_cavitacao11)->with('lgc_falhaEletrica11', $lgc_falhaEletrica11)->with('lgc_desalinhamento11', $lgc_desalinhamento11)
               ->with('atualf12', $atualf12)->with('lgc_desalinhamento12', $lgc_desalinhamento12)->with('lgc_lubrificacao12', $lgc_lubrificacao12)->with('lgc_rolamento12', $lgc_rolamento12)->with('lgc_desbalanceamento12', $lgc_desbalanceamento12)->with('lgc_desgasteFolga12', $lgc_desgasteFolga12)->with('lgc_engrenamento12', $lgc_engrenamento12)->with('lgc_cavitacao12', $lgc_cavitacao12)->with('lgc_falhaEletrica12', $lgc_falhaEletrica12)->with('lgc_desalinhamento12', $lgc_desalinhamento12);
   }

   public function LpcPerfil() {

     $title = 'Perfil | LPC';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $linha1 = 14;
     $linha2 = 0;

     $lpc_manutencao = aux::GeralPorLinhaVib($atual1, 1, $linha1, $linha2);
     $lpc_standBy = aux::GeralPorLinhaVib($atual1, 2, $linha1, $linha2);
     $lpc_normal = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $lpc_alarme = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $lpc_critico = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
                ->count('preditiva_atividades.id');

    $sum2 = DB::table('preditiva_atividades')
                ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                ->where('negocios.id','=',0)
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      return view('csn.relatorioGerencial.includes.indexRelGerVB_lpc_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $lpc_normal1 = aux::GeralPorLinhaVib($atual1, 3, $linha1, $linha2);
     $lpc_alarme1 = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $lpc_critico1 = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);

     $lpc_normal2 = aux::GeralPorLinhaVib($atual2, 3, $linha1, $linha2);
     $lpc_alarme2 = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $lpc_critico2 = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);

     $lpc_normal3 = aux::GeralPorLinhaVib($atual3, 3, $linha1, $linha2);
     $lpc_alarme3 = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $lpc_critico3 = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);

     $lpc_normal4 = aux::GeralPorLinhaVib($atual4, 3, $linha1, $linha2);
     $lpc_alarme4 = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $lpc_critico4 = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);

     $lpc_normal5 = aux::GeralPorLinhaVib($atual5, 3, $linha1, $linha2);
     $lpc_alarme5 = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $lpc_critico5 = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);

     $lpc_normal6 = aux::GeralPorLinhaVib($atual6, 3, $linha1, $linha2);
     $lpc_alarme6 = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $lpc_critico6 = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);

     $lpc_normal7 = aux::GeralPorLinhaVib($atual7, 3, $linha1, $linha2);
     $lpc_alarme7 = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $lpc_critico7 = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);

     $lpc_normal8 = aux::GeralPorLinhaVib($atual8, 3, $linha1, $linha2);
     $lpc_alarme8 = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $lpc_critico8 = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);

     $lpc_normal9 = aux::GeralPorLinhaVib($atual9, 3, $linha1, $linha2);
     $lpc_alarme9 = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $lpc_critico9 = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);

     $lpc_normal10 = aux::GeralPorLinhaVib($atual10, 3, $linha1, $linha2);
     $lpc_alarme10 = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $lpc_critico10 = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);

     $lpc_normal11 = aux::GeralPorLinhaVib($atual11, 3, $linha1, $linha2);
     $lpc_alarme11 = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $lpc_critico11 = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);

     $lpc_normal12 = aux::GeralPorLinhaVib($atual12, 3, $linha1, $linha2);
     $lpc_alarme12 = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $lpc_critico12 = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lpc-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=',0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $alarme1P = aux::GeralPorLinhaVib($atual1, 4, $linha1, $linha2);
     $critico1P = aux::GeralPorLinhaVib($atual1, 5, $linha1, $linha2);
     $alarme2P = aux::GeralPorLinhaVib($atual2, 4, $linha1, $linha2);
     $critico2P = aux::GeralPorLinhaVib($atual2, 5, $linha1, $linha2);
     $alarme3P = aux::GeralPorLinhaVib($atual3, 4, $linha1, $linha2);
     $critico3P = aux::GeralPorLinhaVib($atual3, 5, $linha1, $linha2);
     $alarme4P = aux::GeralPorLinhaVib($atual4, 4, $linha1, $linha2);
     $critico4P = aux::GeralPorLinhaVib($atual4, 5, $linha1, $linha2);
     $alarme5P = aux::GeralPorLinhaVib($atual5, 4, $linha1, $linha2);
     $critico5P = aux::GeralPorLinhaVib($atual5, 5, $linha1, $linha2);
     $alarme6P = aux::GeralPorLinhaVib($atual6, 4, $linha1, $linha2);
     $critico6P = aux::GeralPorLinhaVib($atual6, 5, $linha1, $linha2);
     $alarme7P = aux::GeralPorLinhaVib($atual7, 4, $linha1, $linha2);
     $critico7P = aux::GeralPorLinhaVib($atual7, 5, $linha1, $linha2);
     $alarme8P = aux::GeralPorLinhaVib($atual8, 4, $linha1, $linha2);
     $critico8P = aux::GeralPorLinhaVib($atual8, 5, $linha1, $linha2);
     $alarme9P = aux::GeralPorLinhaVib($atual9, 4, $linha1, $linha2);
     $critico9P = aux::GeralPorLinhaVib($atual9, 5, $linha1, $linha2);
     $alarme10P = aux::GeralPorLinhaVib($atual10, 4, $linha1, $linha2);
     $critico10P = aux::GeralPorLinhaVib($atual10, 5, $linha1, $linha2);
     $alarme11P = aux::GeralPorLinhaVib($atual11, 4, $linha1, $linha2);
     $critico11P = aux::GeralPorLinhaVib($atual11, 5, $linha1, $linha2);
     $alarme12P = aux::GeralPorLinhaVib($atual12, 4, $linha1, $linha2);
     $critico12P = aux::GeralPorLinhaVib($atual12, 5, $linha1, $linha2);

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

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lpc-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
                 ->count('preditiva_atividades.id');

     $sum2 = DB::table('preditiva_atividades')
                 ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                 ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                 ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                 ->where('negocios.id','=', 0)
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $lpc_desalinhamento1 = aux::GeralPorLinhaEDiagVib($atual1, 9, $linha1, $linha2);
     $lpc_lubrificacao1 = aux::GeralPorLinhaEDiagVib($atual1, 10, $linha1, $linha2);
     $lpc_rolamento1 = aux::GeralPorLinhaEDiagVib($atual1, 11, $linha1, $linha2);
     $lpc_desbalanceamento1 = aux::GeralPorLinhaEDiagVib($atual1, 12, $linha1, $linha2);
     $lpc_desgasteFolga1 = aux::GeralPorLinhaEDiagVib($atual1, 13, $linha1, $linha2);
     $lpc_engrenamento1 = aux::GeralPorLinhaEDiagVib($atual1, 14, $linha1, $linha2);
     $lpc_cavitacao1 = aux::GeralPorLinhaEDiagVib($atual1, 15, $linha1, $linha2);
     $lpc_falhaEletrica1 = aux::GeralPorLinhaEDiagVib($atual1, 16, $linha1, $linha2);

     $lpc_desalinhamento2 = aux::GeralPorLinhaEDiagVib($atual2, 9, $linha1, $linha2);
     $lpc_lubrificacao2 = aux::GeralPorLinhaEDiagVib($atual2, 10, $linha1, $linha2);
     $lpc_rolamento2 = aux::GeralPorLinhaEDiagVib($atual2, 11, $linha1, $linha2);
     $lpc_desbalanceamento2 = aux::GeralPorLinhaEDiagVib($atual2, 12, $linha1, $linha2);
     $lpc_desgasteFolga2 = aux::GeralPorLinhaEDiagVib($atual2, 13, $linha1, $linha2);
     $lpc_engrenamento2 = aux::GeralPorLinhaEDiagVib($atual2, 14, $linha1, $linha2);
     $lpc_cavitacao2 = aux::GeralPorLinhaEDiagVib($atual2, 15, $linha1, $linha2);
     $lpc_falhaEletrica2 = aux::GeralPorLinhaEDiagVib($atual2, 16, $linha1, $linha2);

     $lpc_desalinhamento3 = aux::GeralPorLinhaEDiagVib($atual3, 9, $linha1, $linha2);
     $lpc_lubrificacao3 = aux::GeralPorLinhaEDiagVib($atual3, 10, $linha1, $linha2);
     $lpc_rolamento3 = aux::GeralPorLinhaEDiagVib($atual3, 11, $linha1, $linha2);
     $lpc_desbalanceamento3 = aux::GeralPorLinhaEDiagVib($atual3, 12, $linha1, $linha2);
     $lpc_desgasteFolga3 = aux::GeralPorLinhaEDiagVib($atual3, 13, $linha1, $linha2);
     $lpc_engrenamento3 = aux::GeralPorLinhaEDiagVib($atual3, 14, $linha1, $linha2);
     $lpc_cavitacao3 = aux::GeralPorLinhaEDiagVib($atual3, 15, $linha1, $linha2);
     $lpc_falhaEletrica3 = aux::GeralPorLinhaEDiagVib($atual3, 16, $linha1, $linha2);

     $lpc_desalinhamento4 = aux::GeralPorLinhaEDiagVib($atual4, 9, $linha1, $linha2);
     $lpc_lubrificacao4 = aux::GeralPorLinhaEDiagVib($atual4, 10, $linha1, $linha2);
     $lpc_rolamento4 = aux::GeralPorLinhaEDiagVib($atual4, 11, $linha1, $linha2);
     $lpc_desbalanceamento4 = aux::GeralPorLinhaEDiagVib($atual4, 12, $linha1, $linha2);
     $lpc_desgasteFolga4 = aux::GeralPorLinhaEDiagVib($atual4, 13, $linha1, $linha2);
     $lpc_engrenamento4 = aux::GeralPorLinhaEDiagVib($atual4, 14, $linha1, $linha2);
     $lpc_cavitacao4 = aux::GeralPorLinhaEDiagVib($atual4, 15, $linha1, $linha2);
     $lpc_falhaEletrica4 = aux::GeralPorLinhaEDiagVib($atual4, 16, $linha1, $linha2);

     $lpc_desalinhamento5 = aux::GeralPorLinhaEDiagVib($atual5, 9, $linha1, $linha2);
     $lpc_lubrificacao5 = aux::GeralPorLinhaEDiagVib($atual5, 10, $linha1, $linha2);
     $lpc_rolamento5 = aux::GeralPorLinhaEDiagVib($atual5, 11, $linha1, $linha2);
     $lpc_desbalanceamento5 = aux::GeralPorLinhaEDiagVib($atual5, 12, $linha1, $linha2);
     $lpc_engrenamento5 = aux::GeralPorLinhaEDiagVib($atual5, 14, $linha1, $linha2);
     $lpc_desgasteFolga5 = aux::GeralPorLinhaEDiagVib($atual5, 13, $linha1, $linha2);
     $lpc_cavitacao5 = aux::GeralPorLinhaEDiagVib($atual5, 15, $linha1, $linha2);
     $lpc_falhaEletrica5 = aux::GeralPorLinhaEDiagVib($atual5, 16, $linha1, $linha2);

     $lpc_desalinhamento6 = aux::GeralPorLinhaEDiagVib($atual6, 9, $linha1, $linha2);
     $lpc_lubrificacao6 = aux::GeralPorLinhaEDiagVib($atual6, 10, $linha1, $linha2);
     $lpc_rolamento6 = aux::GeralPorLinhaEDiagVib($atual6, 11, $linha1, $linha2);
     $lpc_desbalanceamento6 = aux::GeralPorLinhaEDiagVib($atual6, 12, $linha1, $linha2);
     $lpc_desgasteFolga6 = aux::GeralPorLinhaEDiagVib($atual6, 13, $linha1, $linha2);
     $lpc_engrenamento6 = aux::GeralPorLinhaEDiagVib($atual6, 14, $linha1, $linha2);
     $lpc_cavitacao6 = aux::GeralPorLinhaEDiagVib($atual6, 15, $linha1, $linha2);
     $lpc_falhaEletrica6 = aux::GeralPorLinhaEDiagVib($atual6, 16, $linha1, $linha2);

     $lpc_desalinhamento7 = aux::GeralPorLinhaEDiagVib($atual7, 9, $linha1, $linha2);
     $lpc_lubrificacao7 = aux::GeralPorLinhaEDiagVib($atual7, 10, $linha1, $linha2);
     $lpc_rolamento7 = aux::GeralPorLinhaEDiagVib($atual7, 11, $linha1, $linha2);
     $lpc_desbalanceamento7 = aux::GeralPorLinhaEDiagVib($atual7, 12, $linha1, $linha2);
     $lpc_desgasteFolga7 = aux::GeralPorLinhaEDiagVib($atual7, 13, $linha1, $linha2);
     $lpc_engrenamento7 = aux::GeralPorLinhaEDiagVib($atual7, 14, $linha1, $linha2);
     $lpc_cavitacao7 = aux::GeralPorLinhaEDiagVib($atual7, 15, $linha1, $linha2);
     $lpc_falhaEletrica7 = aux::GeralPorLinhaEDiagVib($atual7, 16, $linha1, $linha2);

     $lpc_desalinhamento8 = aux::GeralPorLinhaEDiagVib($atual8, 9, $linha1, $linha2);
     $lpc_lubrificacao8 = aux::GeralPorLinhaEDiagVib($atual8, 10, $linha1, $linha2);
     $lpc_rolamento8 = aux::GeralPorLinhaEDiagVib($atual8, 11, $linha1, $linha2);
     $lpc_desgasteFolga8 = aux::GeralPorLinhaEDiagVib($atual8, 13, $linha1, $linha2);
     $lpc_desbalanceamento8 = aux::GeralPorLinhaEDiagVib($atual8, 12, $linha1, $linha2);
     $lpc_engrenamento8 = aux::GeralPorLinhaEDiagVib($atual8, 14, $linha1, $linha2);
     $lpc_cavitacao8 = aux::GeralPorLinhaEDiagVib($atual8, 15, $linha1, $linha2);
     $lpc_falhaEletrica8 = aux::GeralPorLinhaEDiagVib($atual8, 16, $linha1, $linha2);

     $lpc_desalinhamento9 = aux::GeralPorLinhaEDiagVib($atual9, 9, $linha1, $linha2);
     $lpc_lubrificacao9 = aux::GeralPorLinhaEDiagVib($atual9, 10, $linha1, $linha2);
     $lpc_rolamento9 = aux::GeralPorLinhaEDiagVib($atual9, 11, $linha1, $linha2);
     $lpc_desbalanceamento9 = aux::GeralPorLinhaEDiagVib($atual9, 12, $linha1, $linha2);
     $lpc_desgasteFolga9 = aux::GeralPorLinhaEDiagVib($atual9, 13, $linha1, $linha2);
     $lpc_engrenamento9 = aux::GeralPorLinhaEDiagVib($atual9, 14, $linha1, $linha2);
     $lpc_cavitacao9 = aux::GeralPorLinhaEDiagVib($atual9, 15, $linha1, $linha2);
     $lpc_falhaEletrica9 = aux::GeralPorLinhaEDiagVib($atual9, 16, $linha1, $linha2);

     $lpc_desalinhamento10 = aux::GeralPorLinhaEDiagVib($atual10, 9, $linha1, $linha2);
     $lpc_lubrificacao10 = aux::GeralPorLinhaEDiagVib($atual10, 10, $linha1, $linha2);
     $lpc_rolamento10 = aux::GeralPorLinhaEDiagVib($atual10, 11, $linha1, $linha2);
     $lpc_desbalanceamento10 = aux::GeralPorLinhaEDiagVib($atual10, 12, $linha1, $linha2);
     $lpc_desgasteFolga10 = aux::GeralPorLinhaEDiagVib($atual10, 13, $linha1, $linha2);
     $lpc_engrenamento10 = aux::GeralPorLinhaEDiagVib($atual10, 14, $linha1, $linha2);
     $lpc_cavitacao10 = aux::GeralPorLinhaEDiagVib($atual10, 15, $linha1, $linha2);
     $lpc_falhaEletrica10 = aux::GeralPorLinhaEDiagVib($atual10, 16, $linha1, $linha2);

     $lpc_desalinhamento11 = aux::GeralPorLinhaEDiagVib($atual11, 9, $linha1, $linha2);
     $lpc_lubrificacao11 = aux::GeralPorLinhaEDiagVib($atual11, 10, $linha1, $linha2);
     $lpc_rolamento11 = aux::GeralPorLinhaEDiagVib($atual11, 11, $linha1, $linha2);
     $lpc_desbalanceamento11 = aux::GeralPorLinhaEDiagVib($atual11, 12, $linha1, $linha2);
     $lpc_desgasteFolga11 = aux::GeralPorLinhaEDiagVib($atual11, 13, $linha1, $linha2);
     $lpc_engrenamento11 = aux::GeralPorLinhaEDiagVib($atual11, 14, $linha1, $linha2);
     $lpc_cavitacao11 = aux::GeralPorLinhaEDiagVib($atual11, 15, $linha1, $linha2);
     $lpc_falhaEletrica11 = aux::GeralPorLinhaEDiagVib($atual11, 16, $linha1, $linha2);

     $lpc_desalinhamento12 = aux::GeralPorLinhaEDiagVib($atual12, 9, $linha1, $linha2);
     $lpc_lubrificacao12 = aux::GeralPorLinhaEDiagVib($atual12, 10, $linha1, $linha2);
     $lpc_rolamento12 = aux::GeralPorLinhaEDiagVib($atual12, 11, $linha1, $linha2);
     $lpc_desbalanceamento12 = aux::GeralPorLinhaEDiagVib($atual12, 12, $linha1, $linha2);
     $lpc_desgasteFolga12 = aux::GeralPorLinhaEDiagVib($atual12, 13, $linha1, $linha2);
     $lpc_engrenamento12 = aux::GeralPorLinhaEDiagVib($atual12, 14, $linha1, $linha2);
     $lpc_cavitacao12 = aux::GeralPorLinhaEDiagVib($atual12, 15, $linha1, $linha2);
     $lpc_falhaEletrica12 = aux::GeralPorLinhaEDiagVib($atual12, 16, $linha1, $linha2);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.lpc-problemasEncontrados')->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('lpc_desalinhamento1', $lpc_desalinhamento1)->with('lpc_lubrificacao1', $lpc_lubrificacao1)->with('lpc_rolamento1', $lpc_rolamento1)->with('lpc_desbalanceamento1', $lpc_desbalanceamento1)->with('lpc_desgasteFolga1', $lpc_desgasteFolga1)->with('lpc_engrenamento1', $lpc_engrenamento1)->with('lpc_cavitacao1', $lpc_cavitacao1)->with('lpc_falhaEletrica1', $lpc_falhaEletrica1)->with('lpc_desalinhamento1', $lpc_desalinhamento1)
       ->with('atualf2', $atualf2)->with('lpc_desalinhamento2', $lpc_desalinhamento2)->with('lpc_lubrificacao2', $lpc_lubrificacao2)->with('lpc_rolamento2', $lpc_rolamento2)->with('lpc_desbalanceamento2', $lpc_desbalanceamento2)->with('lpc_desgasteFolga2', $lpc_desgasteFolga2)->with('lpc_engrenamento2', $lpc_engrenamento2)->with('lpc_cavitacao2', $lpc_cavitacao2)->with('lpc_falhaEletrica2', $lpc_falhaEletrica2)->with('lpc_desalinhamento2', $lpc_desalinhamento2)
       ->with('atualf3', $atualf3)->with('lpc_desalinhamento3', $lpc_desalinhamento2)->with('lpc_lubrificacao3', $lpc_lubrificacao3)->with('lpc_rolamento3', $lpc_rolamento3)->with('lpc_desbalanceamento3', $lpc_desbalanceamento3)->with('lpc_desgasteFolga3', $lpc_desgasteFolga3)->with('lpc_engrenamento3', $lpc_engrenamento3)->with('lpc_cavitacao3', $lpc_cavitacao3)->with('lpc_falhaEletrica3', $lpc_falhaEletrica3)->with('lpc_desalinhamento3', $lpc_desalinhamento3)
       ->with('atualf4', $atualf4)->with('lpc_desalinhamento4', $lpc_desalinhamento2)->with('lpc_lubrificacao4', $lpc_lubrificacao4)->with('lpc_rolamento4', $lpc_rolamento4)->with('lpc_desbalanceamento4', $lpc_desbalanceamento4)->with('lpc_desgasteFolga4', $lpc_desgasteFolga4)->with('lpc_engrenamento4', $lpc_engrenamento4)->with('lpc_cavitacao4', $lpc_cavitacao4)->with('lpc_falhaEletrica4', $lpc_falhaEletrica4)->with('lpc_desalinhamento4', $lpc_desalinhamento4)
       ->with('atualf5', $atualf5)->with('lpc_desalinhamento5', $lpc_desalinhamento5)->with('lpc_lubrificacao5', $lpc_lubrificacao5)->with('lpc_rolamento5', $lpc_rolamento5)->with('lpc_desbalanceamento5', $lpc_desbalanceamento5)->with('lpc_desgasteFolga5', $lpc_desgasteFolga5)->with('lpc_engrenamento5', $lpc_engrenamento5)->with('lpc_cavitacao5', $lpc_cavitacao5)->with('lpc_falhaEletrica5', $lpc_falhaEletrica5)->with('lpc_desalinhamento5', $lpc_desalinhamento5)
       ->with('atualf6', $atualf6)->with('lpc_desalinhamento6', $lpc_desalinhamento6)->with('lpc_lubrificacao6', $lpc_lubrificacao6)->with('lpc_rolamento6', $lpc_rolamento6)->with('lpc_desbalanceamento6', $lpc_desbalanceamento6)->with('lpc_desgasteFolga6', $lpc_desgasteFolga6)->with('lpc_engrenamento6', $lpc_engrenamento6)->with('lpc_cavitacao6', $lpc_cavitacao6)->with('lpc_falhaEletrica6', $lpc_falhaEletrica6)->with('lpc_desalinhamento6', $lpc_desalinhamento6)
       ->with('atualf7', $atualf7)->with('lpc_desalinhamento7', $lpc_desalinhamento7)->with('lpc_lubrificacao7', $lpc_lubrificacao7)->with('lpc_rolamento7', $lpc_rolamento7)->with('lpc_desbalanceamento7', $lpc_desbalanceamento7)->with('lpc_desgasteFolga7', $lpc_desgasteFolga7)->with('lpc_engrenamento7', $lpc_engrenamento7)->with('lpc_cavitacao7', $lpc_cavitacao7)->with('lpc_falhaEletrica7', $lpc_falhaEletrica7)->with('lpc_desalinhamento7', $lpc_desalinhamento7)
       ->with('atualf8', $atualf8)->with('lpc_desalinhamento8', $lpc_desalinhamento8)->with('lpc_lubrificacao8', $lpc_lubrificacao8)->with('lpc_rolamento8', $lpc_rolamento8)->with('lpc_desbalanceamento8', $lpc_desbalanceamento8)->with('lpc_desgasteFolga8', $lpc_desgasteFolga8)->with('lpc_engrenamento8', $lpc_engrenamento8)->with('lpc_cavitacao8', $lpc_cavitacao8)->with('lpc_falhaEletrica8', $lpc_falhaEletrica8)->with('lpc_desalinhamento8', $lpc_desalinhamento8)
       ->with('atualf9', $atualf9)->with('lpc_desalinhamento9', $lpc_desalinhamento9)->with('lpc_lubrificacao9', $lpc_lubrificacao9)->with('lpc_rolamento9', $lpc_rolamento9)->with('lpc_desbalanceamento9', $lpc_desbalanceamento9)->with('lpc_desgasteFolga9', $lpc_desgasteFolga9)->with('lpc_engrenamento9', $lpc_engrenamento9)->with('lpc_cavitacao9', $lpc_cavitacao9)->with('lpc_falhaEletrica9', $lpc_falhaEletrica9)->with('lpc_desalinhamento9', $lpc_desalinhamento9)
       ->with('atualf10', $atualf10)->with('lpc_desalinhamento10', $lpc_desalinhamento10)->with('lpc_lubrificacao10', $lpc_lubrificacao10)->with('lpc_rolamento10', $lpc_rolamento10)->with('lpc_desbalanceamento10', $lpc_desbalanceamento10)->with('lpc_desgasteFolga10', $lpc_desgasteFolga10)->with('lpc_engrenamento10', $lpc_engrenamento10)->with('lpc_cavitacao10', $lpc_cavitacao10)->with('lpc_falhaEletrica10', $lpc_falhaEletrica10)->with('lpc_desalinhamento10', $lpc_desalinhamento10)
       ->with('atualf11', $atualf11)->with('lpc_desalinhamento11', $lpc_desalinhamento11)->with('lpc_lubrificacao11', $lpc_lubrificacao11)->with('lpc_rolamento11', $lpc_rolamento11)->with('lpc_desbalanceamento11', $lpc_desbalanceamento11)->with('lpc_desgasteFolga11', $lpc_desgasteFolga11)->with('lpc_engrenamento11', $lpc_engrenamento11)->with('lpc_cavitacao11', $lpc_cavitacao11)->with('lpc_falhaEletrica11', $lpc_falhaEletrica11)->with('lpc_desalinhamento11', $lpc_desalinhamento11)
       ->with('atualf12', $atualf12)->with('lpc_desalinhamento12', $lpc_desalinhamento12)->with('lpc_lubrificacao12', $lpc_lubrificacao12)->with('lpc_rolamento12', $lpc_rolamento12)->with('lpc_desbalanceamento12', $lpc_desbalanceamento12)->with('lpc_desgasteFolga12', $lpc_desgasteFolga12)->with('lpc_engrenamento12', $lpc_engrenamento12)->with('lpc_cavitacao12', $lpc_cavitacao12)->with('lpc_falhaEletrica12', $lpc_falhaEletrica12)->with('lpc_desalinhamento12', $lpc_desalinhamento12);
   }

   public function CsPerfil() {

     $title = 'Perfil | CS';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 6;

     $cs_manutencao = aux::GeralPorLinha2Vib($atual1, 1, $parent);
     $cs_standBy = aux::GeralPorLinha2Vib($atual1, 2, $parent);
     $cs_normal = aux::GeralPorLinha2Vib($atual1, 3, $parent);
     $cs_alarme = aux::GeralPorLinha2Vib($atual1, 4, $parent);
     $cs_critico = aux::GeralPorLinha2Vib($atual1, 5, $parent);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      return view('csn.relatorioGerencial.includes.indexRelGerVB_cs_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $cs_normal1 = aux::GeralPorLinha2Vib($atual1, 3, $parent);
     $cs_alarme1 = aux::GeralPorLinha2Vib($atual1, 4, $parent);
     $cs_critico1 = aux::GeralPorLinha2Vib($atual1, 5, $parent);

     $cs_normal2 = aux::GeralPorLinha2Vib($atual2, 3, $parent);
     $cs_alarme2 = aux::GeralPorLinha2Vib($atual2, 4, $parent);
     $cs_critico2 = aux::GeralPorLinha2Vib($atual2, 5, $parent);

     $cs_normal3 = aux::GeralPorLinha2Vib($atual3, 3, $parent);
     $cs_alarme3 = aux::GeralPorLinha2Vib($atual3, 4, $parent);
     $cs_critico3 = aux::GeralPorLinha2Vib($atual3, 5, $parent);

     $cs_normal4 = aux::GeralPorLinha2Vib($atual4, 3, $parent);
     $cs_alarme4 = aux::GeralPorLinha2Vib($atual4, 4, $parent);
     $cs_critico4 = aux::GeralPorLinha2Vib($atual4, 5, $parent);

     $cs_normal5 = aux::GeralPorLinha2Vib($atual5, 3, $parent);
     $cs_alarme5 = aux::GeralPorLinha2Vib($atual5, 4, $parent);
     $cs_critico5 = aux::GeralPorLinha2Vib($atual5, 5, $parent);

     $cs_normal6 = aux::GeralPorLinha2Vib($atual6, 3, $parent);
     $cs_alarme6 = aux::GeralPorLinha2Vib($atual6, 4, $parent);
     $cs_critico6 = aux::GeralPorLinha2Vib($atual6, 5, $parent);

     $cs_normal7 = aux::GeralPorLinha2Vib($atual7, 3, $parent);
     $cs_alarme7 = aux::GeralPorLinha2Vib($atual7, 4, $parent);
     $cs_critico7 = aux::GeralPorLinha2Vib($atual7, 5, $parent);

     $cs_normal8 = aux::GeralPorLinha2Vib($atual8, 3, $parent);
     $cs_alarme8 = aux::GeralPorLinha2Vib($atual8, 4, $parent);
     $cs_critico8 = aux::GeralPorLinha2Vib($atual8, 5, $parent);

     $cs_normal9 = aux::GeralPorLinha2Vib($atual9, 3, $parent);
     $cs_alarme9 = aux::GeralPorLinha2Vib($atual9, 4, $parent);
     $cs_critico9 = aux::GeralPorLinha2Vib($atual9, 5, $parent);

     $cs_normal10 = aux::GeralPorLinha2Vib($atual10, 3, $parent);
     $cs_alarme10 = aux::GeralPorLinha2Vib($atual10, 4, $parent);
     $cs_critico10 = aux::GeralPorLinha2Vib($atual10, 5, $parent);

     $cs_normal11 = aux::GeralPorLinha2Vib($atual11, 3, $parent);
     $cs_alarme11 = aux::GeralPorLinha2Vib($atual11, 4, $parent);
     $cs_critico11 = aux::GeralPorLinha2Vib($atual11, 5, $parent);

     $cs_normal12 = aux::GeralPorLinha2Vib($atual12, 3, $parent);
     $cs_alarme12 = aux::GeralPorLinha2Vib($atual12, 4, $parent);
     $cs_critico12 = aux::GeralPorLinha2Vib($atual12, 5, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.cs-status-dos-pontos')
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $alarme1P = aux::GeralPorLinha2Vib($atual1, 4, $parent);
     $critico1P = aux::GeralPorLinha2Vib($atual1, 5, $parent);
     $alarme2P = aux::GeralPorLinha2Vib($atual2, 4, $parent);
     $critico2P = aux::GeralPorLinha2Vib($atual2, 5, $parent);
     $alarme3P = aux::GeralPorLinha2Vib($atual3, 4, $parent);
     $critico3P = aux::GeralPorLinha2Vib($atual3, 5, $parent);
     $alarme4P = aux::GeralPorLinha2Vib($atual4, 4, $parent);
     $critico4P = aux::GeralPorLinha2Vib($atual4, 5, $parent);
     $alarme5P = aux::GeralPorLinha2Vib($atual5, 4, $parent);
     $critico5P = aux::GeralPorLinha2Vib($atual5, 5, $parent);
     $alarme6P = aux::GeralPorLinha2Vib($atual6, 4, $parent);
     $critico6P = aux::GeralPorLinha2Vib($atual6, 5, $parent);
     $alarme7P = aux::GeralPorLinha2Vib($atual7, 4, $parent);
     $critico7P = aux::GeralPorLinha2Vib($atual7, 5, $parent);
     $alarme8P = aux::GeralPorLinha2Vib($atual8, 4, $parent);
     $critico8P = aux::GeralPorLinha2Vib($atual8, 5, $parent);
     $alarme9P = aux::GeralPorLinha2Vib($atual9, 4, $parent);
     $critico9P = aux::GeralPorLinha2Vib($atual9, 5, $parent);
     $alarme10P = aux::GeralPorLinha2Vib($atual10, 4, $parent);
     $critico10P = aux::GeralPorLinha2Vib($atual10, 5, $parent);
     $alarme11P = aux::GeralPorLinha2Vib($atual11, 4, $parent);
     $critico11P = aux::GeralPorLinha2Vib($atual11, 5, $parent);
     $alarme12P = aux::GeralPorLinha2Vib($atual12, 4, $parent);
     $critico12P = aux::GeralPorLinha2Vib($atual12, 5, $parent);


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

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.cs-anormalidades') ->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $cs_desalinhamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 9, $parent);
     $cs_lubrificacao1 = aux::GeralPorLinhaEDiag2Vib($atual1, 10, $parent);
     $cs_rolamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 11, $parent);
     $cs_desbalanceamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 12, $parent);
     $cs_desgasteFolga1 = aux::GeralPorLinhaEDiag2Vib($atual1, 13, $parent);
     $cs_engrenamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 14, $parent);
     $cs_cavitacao1 = aux::GeralPorLinhaEDiag2Vib($atual1, 15, $parent);
     $cs_falhaEletrica1 = aux::GeralPorLinhaEDiag2Vib($atual1, 16, $parent);

     $cs_desalinhamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 9, $parent);
     $cs_lubrificacao2 = aux::GeralPorLinhaEDiag2Vib($atual2, 10, $parent);
     $cs_rolamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 11, $parent);
     $cs_desbalanceamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 12, $parent);
     $cs_desgasteFolga2 = aux::GeralPorLinhaEDiag2Vib($atual2, 13, $parent);
     $cs_engrenamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 14, $parent);
     $cs_cavitacao2 = aux::GeralPorLinhaEDiag2Vib($atual2, 15, $parent);
     $cs_falhaEletrica2 = aux::GeralPorLinhaEDiag2Vib($atual2, 16, $parent);

     $cs_desalinhamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 9, $parent);
     $cs_lubrificacao3 = aux::GeralPorLinhaEDiag2Vib($atual3, 10, $parent);
     $cs_rolamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 11, $parent);
     $cs_desbalanceamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 12, $parent);
     $cs_desgasteFolga3 = aux::GeralPorLinhaEDiag2Vib($atual3, 13, $parent);
     $cs_engrenamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 14, $parent);
     $cs_cavitacao3 = aux::GeralPorLinhaEDiag2Vib($atual3, 15, $parent);
     $cs_falhaEletrica3 = aux::GeralPorLinhaEDiag2Vib($atual3, 16, $parent);

     $cs_desalinhamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 9, $parent);
     $cs_lubrificacao4 = aux::GeralPorLinhaEDiag2Vib($atual4, 10, $parent);
     $cs_rolamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 11, $parent);
     $cs_desbalanceamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 12, $parent);
     $cs_desgasteFolga4 = aux::GeralPorLinhaEDiag2Vib($atual4, 13, $parent);
     $cs_engrenamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 14, $parent);
     $cs_cavitacao4 = aux::GeralPorLinhaEDiag2Vib($atual4, 15, $parent);
     $cs_falhaEletrica4 = aux::GeralPorLinhaEDiag2Vib($atual4, 16, $parent);

     $cs_desalinhamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 9, $parent);
     $cs_lubrificacao5 = aux::GeralPorLinhaEDiag2Vib($atual5, 10, $parent);
     $cs_rolamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 11, $parent);
     $cs_desbalanceamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 12, $parent);
     $cs_desgasteFolga5 = aux::GeralPorLinhaEDiag2Vib($atual5, 13, $parent);
     $cs_engrenamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 14, $parent);
     $cs_cavitacao5 = aux::GeralPorLinhaEDiag2Vib($atual5, 15, $parent);
     $cs_falhaEletrica5 = aux::GeralPorLinhaEDiag2Vib($atual5, 16, $parent);

     $cs_desalinhamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 9, $parent);
     $cs_lubrificacao6 = aux::GeralPorLinhaEDiag2Vib($atual6, 10, $parent);
     $cs_rolamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 11, $parent);
     $cs_desbalanceamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 12, $parent);
     $cs_desgasteFolga6 = aux::GeralPorLinhaEDiag2Vib($atual6, 13, $parent);
     $cs_engrenamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 14, $parent);
     $cs_cavitacao6 = aux::GeralPorLinhaEDiag2Vib($atual6, 15, $parent);
     $cs_falhaEletrica6 = aux::GeralPorLinhaEDiag2Vib($atual6, 16, $parent);

     $cs_desalinhamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 9, $parent);
     $cs_lubrificacao7 = aux::GeralPorLinhaEDiag2Vib($atual7, 10, $parent);
     $cs_rolamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 11, $parent);
     $cs_desbalanceamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 12, $parent);
     $cs_desgasteFolga7 = aux::GeralPorLinhaEDiag2Vib($atual7, 13, $parent);
     $cs_engrenamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 14, $parent);
     $cs_cavitacao7 = aux::GeralPorLinhaEDiag2Vib($atual7, 15, $parent);
     $cs_falhaEletrica7 = aux::GeralPorLinhaEDiag2Vib($atual7, 16, $parent);

     $cs_desalinhamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 9, $parent);
     $cs_lubrificacao8 = aux::GeralPorLinhaEDiag2Vib($atual8, 10, $parent);
     $cs_rolamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 11, $parent);
     $cs_desbalanceamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 12, $parent);
     $cs_desgasteFolga8 = aux::GeralPorLinhaEDiag2Vib($atual8, 13, $parent);
     $cs_engrenamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 14, $parent);
     $cs_cavitacao8 = aux::GeralPorLinhaEDiag2Vib($atual8, 15, $parent);
     $cs_falhaEletrica8 = aux::GeralPorLinhaEDiag2Vib($atual8, 16, $parent);

     $cs_desalinhamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 9, $parent);
     $cs_lubrificacao9 = aux::GeralPorLinhaEDiag2Vib($atual9, 10, $parent);
     $cs_rolamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 11, $parent);
     $cs_desbalanceamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 12, $parent);
     $cs_desgasteFolga9 = aux::GeralPorLinhaEDiag2Vib($atual9, 13, $parent);
     $cs_engrenamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 14, $parent);
     $cs_cavitacao9 = aux::GeralPorLinhaEDiag2Vib($atual9, 15, $parent);
     $cs_falhaEletrica9 = aux::GeralPorLinhaEDiag2Vib($atual9, 16, $parent);

     $cs_desalinhamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 9, $parent);
     $cs_lubrificacao10 = aux::GeralPorLinhaEDiag2Vib($atual10, 10, $parent);
     $cs_rolamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 11, $parent);
     $cs_desbalanceamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 12, $parent);
     $cs_desgasteFolga10 = aux::GeralPorLinhaEDiag2Vib($atual10, 13, $parent);
     $cs_engrenamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 14, $parent);
     $cs_cavitacao10 = aux::GeralPorLinhaEDiag2Vib($atual10, 15, $parent);
     $cs_falhaEletrica10 = aux::GeralPorLinhaEDiag2Vib($atual10, 16, $parent);

     $cs_desalinhamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 9, $parent);
     $cs_lubrificacao11 = aux::GeralPorLinhaEDiag2Vib($atual11, 10, $parent);
     $cs_rolamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 11, $parent);
     $cs_desbalanceamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 12, $parent);
     $cs_desgasteFolga11 = aux::GeralPorLinhaEDiag2Vib($atual11, 13, $parent);
     $cs_engrenamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 14, $parent);
     $cs_cavitacao11 = aux::GeralPorLinhaEDiag2Vib($atual11, 15, $parent);
     $cs_falhaEletrica11 = aux::GeralPorLinhaEDiag2Vib($atual11, 16, $parent);

     $cs_desalinhamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 9, $parent);
     $cs_lubrificacao12 = aux::GeralPorLinhaEDiag2Vib($atual12, 10, $parent);
     $cs_rolamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 11, $parent);
     $cs_desbalanceamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 12, $parent);
     $cs_desgasteFolga12 = aux::GeralPorLinhaEDiag2Vib($atual12, 13, $parent);
     $cs_engrenamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 14, $parent);
     $cs_cavitacao12 = aux::GeralPorLinhaEDiag2Vib($atual12, 15, $parent);
     $cs_falhaEletrica12 = aux::GeralPorLinhaEDiag2Vib($atual12, 16, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.cs-problemasEncontrados')
       ->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('cs_desalinhamento1', $cs_desalinhamento1)->with('cs_lubrificacao1', $cs_lubrificacao1)->with('cs_rolamento1', $cs_rolamento1)->with('cs_desbalanceamento1', $cs_desbalanceamento1)->with('cs_desgasteFolga1', $cs_desgasteFolga1)->with('cs_engrenamento1', $cs_engrenamento1)->with('cs_cavitacao1', $cs_cavitacao1)->with('cs_falhaEletrica1', $cs_falhaEletrica1)->with('cs_desalinhamento1', $cs_desalinhamento1)
       ->with('atualf2', $atualf2)->with('cs_desalinhamento2', $cs_desalinhamento2)->with('cs_lubrificacao2', $cs_lubrificacao2)->with('cs_rolamento2', $cs_rolamento2)->with('cs_desbalanceamento2', $cs_desbalanceamento2)->with('cs_desgasteFolga2', $cs_desgasteFolga2)->with('cs_engrenamento2', $cs_engrenamento2)->with('cs_cavitacao2', $cs_cavitacao2)->with('cs_falhaEletrica2', $cs_falhaEletrica2)->with('cs_desalinhamento2', $cs_desalinhamento2)
       ->with('atualf3', $atualf3)->with('cs_desalinhamento3', $cs_desalinhamento2)->with('cs_lubrificacao3', $cs_lubrificacao3)->with('cs_rolamento3', $cs_rolamento3)->with('cs_desbalanceamento3', $cs_desbalanceamento3)->with('cs_desgasteFolga3', $cs_desgasteFolga3)->with('cs_engrenamento3', $cs_engrenamento3)->with('cs_cavitacao3', $cs_cavitacao3)->with('cs_falhaEletrica3', $cs_falhaEletrica3)->with('cs_desalinhamento3', $cs_desalinhamento3)
       ->with('atualf4', $atualf4)->with('cs_desalinhamento4', $cs_desalinhamento2)->with('cs_lubrificacao4', $cs_lubrificacao4)->with('cs_rolamento4', $cs_rolamento4)->with('cs_desbalanceamento4', $cs_desbalanceamento4)->with('cs_desgasteFolga4', $cs_desgasteFolga4)->with('cs_engrenamento4', $cs_engrenamento4)->with('cs_cavitacao4', $cs_cavitacao4)->with('cs_falhaEletrica4', $cs_falhaEletrica4)->with('cs_desalinhamento4', $cs_desalinhamento4)
       ->with('atualf5', $atualf5)->with('cs_desalinhamento5', $cs_desalinhamento5)->with('cs_lubrificacao5', $cs_lubrificacao5)->with('cs_rolamento5', $cs_rolamento5)->with('cs_desbalanceamento5', $cs_desbalanceamento5)->with('cs_desgasteFolga5', $cs_desgasteFolga5)->with('cs_engrenamento5', $cs_engrenamento5)->with('cs_cavitacao5', $cs_cavitacao5)->with('cs_falhaEletrica5', $cs_falhaEletrica5)->with('cs_desalinhamento5', $cs_desalinhamento5)
       ->with('atualf6', $atualf6)->with('cs_desalinhamento6', $cs_desalinhamento6)->with('cs_lubrificacao6', $cs_lubrificacao6)->with('cs_rolamento6', $cs_rolamento6)->with('cs_desbalanceamento6', $cs_desbalanceamento6)->with('cs_desgasteFolga6', $cs_desgasteFolga6)->with('cs_engrenamento6', $cs_engrenamento6)->with('cs_cavitacao6', $cs_cavitacao6)->with('cs_falhaEletrica6', $cs_falhaEletrica6)->with('cs_desalinhamento6', $cs_desalinhamento6)
       ->with('atualf7', $atualf7)->with('cs_desalinhamento7', $cs_desalinhamento7)->with('cs_lubrificacao7', $cs_lubrificacao7)->with('cs_rolamento7', $cs_rolamento7)->with('cs_desbalanceamento7', $cs_desbalanceamento7)->with('cs_desgasteFolga7', $cs_desgasteFolga7)->with('cs_engrenamento7', $cs_engrenamento7)->with('cs_cavitacao7', $cs_cavitacao7)->with('cs_falhaEletrica7', $cs_falhaEletrica7)->with('cs_desalinhamento7', $cs_desalinhamento7)
       ->with('atualf8', $atualf8)->with('cs_desalinhamento8', $cs_desalinhamento8)->with('cs_lubrificacao8', $cs_lubrificacao8)->with('cs_rolamento8', $cs_rolamento8)->with('cs_desbalanceamento8', $cs_desbalanceamento8)->with('cs_desgasteFolga8', $cs_desgasteFolga8)->with('cs_engrenamento8', $cs_engrenamento8)->with('cs_cavitacao8', $cs_cavitacao8)->with('cs_falhaEletrica8', $cs_falhaEletrica8)->with('cs_desalinhamento8', $cs_desalinhamento8)
       ->with('atualf9', $atualf9)->with('cs_desalinhamento9', $cs_desalinhamento9)->with('cs_lubrificacao9', $cs_lubrificacao9)->with('cs_rolamento9', $cs_rolamento9)->with('cs_desbalanceamento9', $cs_desbalanceamento9)->with('cs_desgasteFolga9', $cs_desgasteFolga9)->with('cs_engrenamento9', $cs_engrenamento9)->with('cs_cavitacao9', $cs_cavitacao9)->with('cs_falhaEletrica9', $cs_falhaEletrica9)->with('cs_desalinhamento9', $cs_desalinhamento9)
       ->with('atualf10', $atualf10)->with('cs_desalinhamento10', $cs_desalinhamento10)->with('cs_lubrificacao10', $cs_lubrificacao10)->with('cs_rolamento10', $cs_rolamento10)->with('cs_desbalanceamento10', $cs_desbalanceamento10)->with('cs_desgasteFolga10', $cs_desgasteFolga10)->with('cs_engrenamento10', $cs_engrenamento10)->with('cs_cavitacao10', $cs_cavitacao10)->with('cs_falhaEletrica10', $cs_falhaEletrica10)->with('cs_desalinhamento10', $cs_desalinhamento10)
       ->with('atualf11', $atualf11)->with('cs_desalinhamento11', $cs_desalinhamento11)->with('cs_lubrificacao11', $cs_lubrificacao11)->with('cs_rolamento11', $cs_rolamento11)->with('cs_desbalanceamento11', $cs_desbalanceamento11)->with('cs_desgasteFolga11', $cs_desgasteFolga11)->with('cs_engrenamento11', $cs_engrenamento11)->with('cs_cavitacao11', $cs_cavitacao11)->with('cs_falhaEletrica11', $cs_falhaEletrica11)->with('cs_desalinhamento11', $cs_desalinhamento11)
       ->with('atualf12', $atualf12)->with('cs_desalinhamento12', $cs_desalinhamento12)->with('cs_lubrificacao12', $cs_lubrificacao12)->with('cs_rolamento12', $cs_rolamento12)->with('cs_desbalanceamento12', $cs_desbalanceamento12)->with('cs_desgasteFolga12', $cs_desgasteFolga12)->with('cs_engrenamento12', $cs_engrenamento12)->with('cs_cavitacao12', $cs_cavitacao12)->with('cs_falhaEletrica12', $cs_falhaEletrica12)->with('cs_desalinhamento12', $cs_desalinhamento12);
   }

   public function PrPerfil() {

     $title = 'Perfil | Pontes Rolantes';
     $atual1 = Carbon::now()->subMonths(-1)->format('Y-m-01');
     $parent = 8;

     $pr_manutencao = aux::GeralPorLinha2Vib($atual1, 1, $parent);
     $pr_standBy = aux::GeralPorLinha2Vib($atual1, 2, $parent);
     $pr_normal = aux::GeralPorLinha2Vib($atual1, 3, $parent);
     $pr_alarme = aux::GeralPorLinha2Vib($atual1, 4, $parent);
     $pr_critico = aux::GeralPorLinha2Vib($atual1, 5, $parent);

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
                ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

      return view('csn.relatorioGerencial.includes.indexRelGerVB_pr_perfil')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $pr_normal1 = aux::GeralPorLinha2Vib($atual1, 3, $parent);
     $pr_alarme1 = aux::GeralPorLinha2Vib($atual1, 4, $parent);
     $pr_critico1 = aux::GeralPorLinha2Vib($atual1, 5, $parent);

     $pr_normal2 = aux::GeralPorLinha2Vib($atual2, 3, $parent);
     $pr_alarme2 = aux::GeralPorLinha2Vib($atual2, 4, $parent);
     $pr_critico2 = aux::GeralPorLinha2Vib($atual2, 5, $parent);

     $pr_normal3 = aux::GeralPorLinha2Vib($atual3, 3, $parent);
     $pr_alarme3 = aux::GeralPorLinha2Vib($atual3, 4, $parent);
     $pr_critico3 = aux::GeralPorLinha2Vib($atual3, 5, $parent);

     $pr_normal4 = aux::GeralPorLinha2Vib($atual4, 3, $parent);
     $pr_alarme4 = aux::GeralPorLinha2Vib($atual4, 4, $parent);
     $pr_critico4 = aux::GeralPorLinha2Vib($atual4, 5, $parent);

     $pr_normal5 = aux::GeralPorLinha2Vib($atual5, 3, $parent);
     $pr_alarme5 = aux::GeralPorLinha2Vib($atual5, 4, $parent);
     $pr_critico5 = aux::GeralPorLinha2Vib($atual5, 5, $parent);

     $pr_normal6 = aux::GeralPorLinha2Vib($atual6, 3, $parent);
     $pr_alarme6 = aux::GeralPorLinha2Vib($atual6, 4, $parent);
     $pr_critico6 = aux::GeralPorLinha2Vib($atual6, 5, $parent);

     $pr_normal7 = aux::GeralPorLinha2Vib($atual7, 3, $parent);
     $pr_alarme7 = aux::GeralPorLinha2Vib($atual7, 4, $parent);
     $pr_critico7 = aux::GeralPorLinha2Vib($atual7, 5, $parent);

     $pr_normal8 = aux::GeralPorLinha2Vib($atual8, 3, $parent);
     $pr_alarme8 = aux::GeralPorLinha2Vib($atual8, 4, $parent);
     $pr_critico8 = aux::GeralPorLinha2Vib($atual8, 5, $parent);

     $pr_normal9 = aux::GeralPorLinha2Vib($atual9, 3, $parent);
     $pr_alarme9 = aux::GeralPorLinha2Vib($atual9, 4, $parent);
     $pr_critico9 = aux::GeralPorLinha2Vib($atual9, 5, $parent);

     $pr_normal10 = aux::GeralPorLinha2Vib($atual10, 3, $parent);
     $pr_alarme10 = aux::GeralPorLinha2Vib($atual10, 4, $parent);
     $pr_critico10 = aux::GeralPorLinha2Vib($atual10, 5, $parent);

     $pr_normal11 = aux::GeralPorLinha2Vib($atual11, 3, $parent);
     $pr_alarme11 = aux::GeralPorLinha2Vib($atual11, 4, $parent);
     $pr_critico11 = aux::GeralPorLinha2Vib($atual11, 5, $parent);

     $pr_normal12 = aux::GeralPorLinha2Vib($atual12, 3, $parent);
     $pr_alarme12 = aux::GeralPorLinha2Vib($atual12, 4, $parent);
     $pr_critico12 = aux::GeralPorLinha2Vib($atual12, 5, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.pr-status-dos-pontos')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $alarme1P = aux::GeralPorLinha2Vib($atual1, 4, $parent);
     $critico1P = aux::GeralPorLinha2Vib($atual1, 5, $parent);
     $alarme2P = aux::GeralPorLinha2Vib($atual2, 4, $parent);
     $critico2P = aux::GeralPorLinha2Vib($atual2, 5, $parent);
     $alarme3P = aux::GeralPorLinha2Vib($atual3, 4, $parent);
     $critico3P = aux::GeralPorLinha2Vib($atual3, 5, $parent);
     $alarme4P = aux::GeralPorLinha2Vib($atual4, 4, $parent);
     $critico4P = aux::GeralPorLinha2Vib($atual4, 5, $parent);
     $alarme5P = aux::GeralPorLinha2Vib($atual5, 4, $parent);
     $critico5P = aux::GeralPorLinha2Vib($atual5, 5, $parent);
     $alarme6P = aux::GeralPorLinha2Vib($atual6, 4, $parent);
     $critico6P = aux::GeralPorLinha2Vib($atual6, 5, $parent);
     $alarme7P = aux::GeralPorLinha2Vib($atual7, 4, $parent);
     $critico7P = aux::GeralPorLinha2Vib($atual7, 5, $parent);
     $alarme8P = aux::GeralPorLinha2Vib($atual8, 4, $parent);
     $critico8P = aux::GeralPorLinha2Vib($atual8, 5, $parent);
     $alarme9P = aux::GeralPorLinha2Vib($atual9, 4, $parent);
     $critico9P = aux::GeralPorLinha2Vib($atual9, 5, $parent);
     $alarme10P = aux::GeralPorLinha2Vib($atual10, 4, $parent);
     $critico10P = aux::GeralPorLinha2Vib($atual10, 5, $parent);
     $alarme11P = aux::GeralPorLinha2Vib($atual11, 4, $parent);
     $critico11P = aux::GeralPorLinha2Vib($atual11, 5, $parent);
     $alarme12P = aux::GeralPorLinha2Vib($atual12, 4, $parent);
     $critico12P = aux::GeralPorLinha2Vib($atual12, 5, $parent);


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

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.pr-anormalidades')->with('title', $title)->with('sum', $sum)
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
                 ->where('preditiva_atividades.tecnicas_id', '=', 3)
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

     $pr_desalinhamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 9, $parent);
     $pr_lubrificacao1 = aux::GeralPorLinhaEDiag2Vib($atual1, 10, $parent);
     $pr_rolamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 11, $parent);
     $pr_desbalanceamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 12, $parent);
     $pr_desgasteFolga1 = aux::GeralPorLinhaEDiag2Vib($atual1, 13, $parent);
     $pr_engrenamento1 = aux::GeralPorLinhaEDiag2Vib($atual1, 14, $parent);
     $pr_cavitacao1 = aux::GeralPorLinhaEDiag2Vib($atual1, 15, $parent);
     $pr_falhaEletrica1 = aux::GeralPorLinhaEDiag2Vib($atual1, 16, $parent);

     $pr_desalinhamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 9, $parent);
     $pr_lubrificacao2 = aux::GeralPorLinhaEDiag2Vib($atual2, 10, $parent);
     $pr_rolamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 11, $parent);
     $pr_desbalanceamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 12, $parent);
     $pr_desgasteFolga2 = aux::GeralPorLinhaEDiag2Vib($atual2, 13, $parent);
     $pr_engrenamento2 = aux::GeralPorLinhaEDiag2Vib($atual2, 14, $parent);
     $pr_cavitacao2 = aux::GeralPorLinhaEDiag2Vib($atual2, 15, $parent);
     $pr_falhaEletrica2 = aux::GeralPorLinhaEDiag2Vib($atual2, 16, $parent);

     $pr_desalinhamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 9, $parent);
     $pr_lubrificacao3 = aux::GeralPorLinhaEDiag2Vib($atual3, 10, $parent);
     $pr_rolamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 11, $parent);
     $pr_desbalanceamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 12, $parent);
     $pr_desgasteFolga3 = aux::GeralPorLinhaEDiag2Vib($atual3, 13, $parent);
     $pr_engrenamento3 = aux::GeralPorLinhaEDiag2Vib($atual3, 14, $parent);
     $pr_cavitacao3 = aux::GeralPorLinhaEDiag2Vib($atual3, 15, $parent);
     $pr_falhaEletrica3 = aux::GeralPorLinhaEDiag2Vib($atual3, 16, $parent);

     $pr_desalinhamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 9, $parent);
     $pr_lubrificacao4 = aux::GeralPorLinhaEDiag2Vib($atual4, 10, $parent);
     $pr_rolamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 11, $parent);
     $pr_desbalanceamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 12, $parent);
     $pr_desgasteFolga4 = aux::GeralPorLinhaEDiag2Vib($atual4, 13, $parent);
     $pr_engrenamento4 = aux::GeralPorLinhaEDiag2Vib($atual4, 14, $parent);
     $pr_cavitacao4 = aux::GeralPorLinhaEDiag2Vib($atual4, 15, $parent);
     $pr_falhaEletrica4 = aux::GeralPorLinhaEDiag2Vib($atual4, 16, $parent);

     $pr_desalinhamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 9, $parent);
     $pr_lubrificacao5 = aux::GeralPorLinhaEDiag2Vib($atual5, 10, $parent);
     $pr_rolamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 11, $parent);
     $pr_desbalanceamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 12, $parent);
     $pr_desgasteFolga5 = aux::GeralPorLinhaEDiag2Vib($atual5, 13, $parent);
     $pr_engrenamento5 = aux::GeralPorLinhaEDiag2Vib($atual5, 14, $parent);
     $pr_cavitacao5 = aux::GeralPorLinhaEDiag2Vib($atual5, 15, $parent);
     $pr_falhaEletrica5 = aux::GeralPorLinhaEDiag2Vib($atual5, 16, $parent);

     $pr_desalinhamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 9, $parent);
     $pr_lubrificacao6 = aux::GeralPorLinhaEDiag2Vib($atual6, 10, $parent);
     $pr_rolamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 11, $parent);
     $pr_desbalanceamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 12, $parent);
     $pr_desgasteFolga6 = aux::GeralPorLinhaEDiag2Vib($atual6, 13, $parent);
     $pr_engrenamento6 = aux::GeralPorLinhaEDiag2Vib($atual6, 14, $parent);
     $pr_cavitacao6 = aux::GeralPorLinhaEDiag2Vib($atual6, 15, $parent);
     $pr_falhaEletrica6 = aux::GeralPorLinhaEDiag2Vib($atual6, 16, $parent);

     $pr_desalinhamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 9, $parent);
     $pr_lubrificacao7 = aux::GeralPorLinhaEDiag2Vib($atual7, 10, $parent);
     $pr_rolamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 11, $parent);
     $pr_desbalanceamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 12, $parent);
     $pr_desgasteFolga7 = aux::GeralPorLinhaEDiag2Vib($atual7, 13, $parent);
     $pr_engrenamento7 = aux::GeralPorLinhaEDiag2Vib($atual7, 14, $parent);
     $pr_cavitacao7 = aux::GeralPorLinhaEDiag2Vib($atual7, 15, $parent);
     $pr_falhaEletrica7 = aux::GeralPorLinhaEDiag2Vib($atual7, 16, $parent);

     $pr_desalinhamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 9, $parent);
     $pr_lubrificacao8 = aux::GeralPorLinhaEDiag2Vib($atual8, 10, $parent);
     $pr_rolamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 11, $parent);
     $pr_desbalanceamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 12, $parent);
     $pr_desgasteFolga8 = aux::GeralPorLinhaEDiag2Vib($atual8, 13, $parent);
     $pr_engrenamento8 = aux::GeralPorLinhaEDiag2Vib($atual8, 14, $parent);
     $pr_cavitacao8 = aux::GeralPorLinhaEDiag2Vib($atual8, 15, $parent);
     $pr_falhaEletrica8 = aux::GeralPorLinhaEDiag2Vib($atual8, 16, $parent);

     $pr_desalinhamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 9, $parent);
     $pr_lubrificacao9 = aux::GeralPorLinhaEDiag2Vib($atual9, 10, $parent);
     $pr_rolamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 11, $parent);
     $pr_desbalanceamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 12, $parent);
     $pr_desgasteFolga9 = aux::GeralPorLinhaEDiag2Vib($atual9, 13, $parent);
     $pr_engrenamento9 = aux::GeralPorLinhaEDiag2Vib($atual9, 14, $parent);
     $pr_cavitacao9 = aux::GeralPorLinhaEDiag2Vib($atual9, 15, $parent);
     $pr_falhaEletrica9 = aux::GeralPorLinhaEDiag2Vib($atual9, 16, $parent);

     $pr_desalinhamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 9, $parent);
     $pr_lubrificacao10 = aux::GeralPorLinhaEDiag2Vib($atual10, 10, $parent);
     $pr_rolamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 11, $parent);
     $pr_desbalanceamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 12, $parent);
     $pr_desgasteFolga10 = aux::GeralPorLinhaEDiag2Vib($atual10, 13, $parent);
     $pr_engrenamento10 = aux::GeralPorLinhaEDiag2Vib($atual10, 14, $parent);
     $pr_cavitacao10 = aux::GeralPorLinhaEDiag2Vib($atual10, 15, $parent);
     $pr_falhaEletrica10 = aux::GeralPorLinhaEDiag2Vib($atual10, 16, $parent);

     $pr_desalinhamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 9, $parent);
     $pr_lubrificacao11 = aux::GeralPorLinhaEDiag2Vib($atual11, 10, $parent);
     $pr_rolamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 11, $parent);
     $pr_desbalanceamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 12, $parent);
     $pr_desgasteFolga11 = aux::GeralPorLinhaEDiag2Vib($atual11, 13, $parent);
     $pr_engrenamento11 = aux::GeralPorLinhaEDiag2Vib($atual11, 14, $parent);
     $pr_cavitacao11 = aux::GeralPorLinhaEDiag2Vib($atual11, 15, $parent);
     $pr_falhaEletrica11 = aux::GeralPorLinhaEDiag2Vib($atual11, 16, $parent);

     $pr_desalinhamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 9, $parent);
     $pr_lubrificacao12 = aux::GeralPorLinhaEDiag2Vib($atual12, 10, $parent);
     $pr_rolamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 11, $parent);
     $pr_desbalanceamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 12, $parent);
     $pr_desgasteFolga12 = aux::GeralPorLinhaEDiag2Vib($atual12, 13, $parent);
     $pr_engrenamento12 = aux::GeralPorLinhaEDiag2Vib($atual12, 14, $parent);
     $pr_cavitacao12 = aux::GeralPorLinhaEDiag2Vib($atual12, 15, $parent);
     $pr_falhaEletrica12 = aux::GeralPorLinhaEDiag2Vib($atual12, 16, $parent);

     return view('csn.relatorioGerencial.includes.relatoriosVibracao.pr-problemasEncontrados')
       ->with('title', $title)->with('sum', $sum)
       ->with('atualf1', $atualf1)->with('pr_desalinhamento1', $pr_desalinhamento1)->with('pr_lubrificacao1', $pr_lubrificacao1)->with('pr_rolamento1', $pr_rolamento1)->with('pr_desbalanceamento1', $pr_desbalanceamento1)->with('pr_desgasteFolga1', $pr_desgasteFolga1)->with('pr_engrenamento1', $pr_engrenamento1)->with('pr_cavitacao1', $pr_cavitacao1)->with('pr_falhaEletrica1', $pr_falhaEletrica1)->with('pr_desalinhamento1', $pr_desalinhamento1)
       ->with('atualf2', $atualf2)->with('pr_desalinhamento2', $pr_desalinhamento2)->with('pr_lubrificacao2', $pr_lubrificacao2)->with('pr_rolamento2', $pr_rolamento2)->with('pr_desbalanceamento2', $pr_desbalanceamento2)->with('pr_desgasteFolga2', $pr_desgasteFolga2)->with('pr_engrenamento2', $pr_engrenamento2)->with('pr_cavitacao2', $pr_cavitacao2)->with('pr_falhaEletrica2', $pr_falhaEletrica2)->with('pr_desalinhamento2', $pr_desalinhamento2)
       ->with('atualf3', $atualf3)->with('pr_desalinhamento3', $pr_desalinhamento3)->with('pr_lubrificacao3', $pr_lubrificacao3)->with('pr_rolamento3', $pr_rolamento3)->with('pr_desbalanceamento3', $pr_desbalanceamento3)->with('pr_desgasteFolga3', $pr_desgasteFolga3)->with('pr_engrenamento3', $pr_engrenamento3)->with('pr_cavitacao3', $pr_cavitacao3)->with('pr_falhaEletrica3', $pr_falhaEletrica3)->with('pr_desalinhamento3', $pr_desalinhamento3)
       ->with('atualf4', $atualf4)->with('pr_desalinhamento4', $pr_desalinhamento4)->with('pr_lubrificacao4', $pr_lubrificacao4)->with('pr_rolamento4', $pr_rolamento4)->with('pr_desbalanceamento4', $pr_desbalanceamento4)->with('pr_desgasteFolga4', $pr_desgasteFolga4)->with('pr_engrenamento4', $pr_engrenamento4)->with('pr_cavitacao4', $pr_cavitacao4)->with('pr_falhaEletrica4', $pr_falhaEletrica4)->with('pr_desalinhamento4', $pr_desalinhamento4)
       ->with('atualf5', $atualf5)->with('pr_desalinhamento5', $pr_desalinhamento5)->with('pr_lubrificacao5', $pr_lubrificacao5)->with('pr_rolamento5', $pr_rolamento5)->with('pr_desbalanceamento5', $pr_desbalanceamento5)->with('pr_desgasteFolga5', $pr_desgasteFolga5)->with('pr_engrenamento5', $pr_engrenamento5)->with('pr_cavitacao5', $pr_cavitacao5)->with('pr_falhaEletrica5', $pr_falhaEletrica5)->with('pr_desalinhamento5', $pr_desalinhamento5)
       ->with('atualf6', $atualf6)->with('pr_desalinhamento6', $pr_desalinhamento6)->with('pr_lubrificacao6', $pr_lubrificacao6)->with('pr_rolamento6', $pr_rolamento6)->with('pr_desbalanceamento6', $pr_desbalanceamento6)->with('pr_desgasteFolga6', $pr_desgasteFolga6)->with('pr_engrenamento6', $pr_engrenamento6)->with('pr_cavitacao6', $pr_cavitacao6)->with('pr_falhaEletrica6', $pr_falhaEletrica6)->with('pr_desalinhamento6', $pr_desalinhamento6)
       ->with('atualf7', $atualf7)->with('pr_desalinhamento7', $pr_desalinhamento7)->with('pr_lubrificacao7', $pr_lubrificacao7)->with('pr_rolamento7', $pr_rolamento7)->with('pr_desbalanceamento7', $pr_desbalanceamento7)->with('pr_desgasteFolga7', $pr_desgasteFolga7)->with('pr_engrenamento7', $pr_engrenamento7)->with('pr_cavitacao7', $pr_cavitacao7)->with('pr_falhaEletrica7', $pr_falhaEletrica7)->with('pr_desalinhamento7', $pr_desalinhamento7)
       ->with('atualf8', $atualf8)->with('pr_desalinhamento8', $pr_desalinhamento8)->with('pr_lubrificacao8', $pr_lubrificacao8)->with('pr_rolamento8', $pr_rolamento8)->with('pr_desbalanceamento8', $pr_desbalanceamento8)->with('pr_desgasteFolga8', $pr_desgasteFolga8)->with('pr_engrenamento8', $pr_engrenamento8)->with('pr_cavitacao8', $pr_cavitacao8)->with('pr_falhaEletrica8', $pr_falhaEletrica8)->with('pr_desalinhamento8', $pr_desalinhamento8)
       ->with('atualf9', $atualf9)->with('pr_desalinhamento9', $pr_desalinhamento9)->with('pr_lubrificacao9', $pr_lubrificacao9)->with('pr_rolamento9', $pr_rolamento9)->with('pr_desbalanceamento9', $pr_desbalanceamento9)->with('pr_desgasteFolga9', $pr_desgasteFolga9)->with('pr_engrenamento9', $pr_engrenamento9)->with('pr_cavitacao9', $pr_cavitacao9)->with('pr_falhaEletrica9', $pr_falhaEletrica9)->with('pr_desalinhamento9', $pr_desalinhamento9)
       ->with('atualf10', $atualf10)->with('pr_desalinhamento10', $pr_desalinhamento10)->with('pr_lubrificacao10', $pr_lubrificacao10)->with('pr_rolamento10', $pr_rolamento10)->with('pr_desbalanceamento10', $pr_desbalanceamento10)->with('pr_desgasteFolga10', $pr_desgasteFolga10)->with('pr_engrenamento10', $pr_engrenamento10)->with('pr_cavitacao10', $pr_cavitacao10)->with('pr_falhaEletrica10', $pr_falhaEletrica10)->with('pr_desalinhamento10', $pr_desalinhamento10)
       ->with('atualf11', $atualf11)->with('pr_desalinhamento11', $pr_desalinhamento11)->with('pr_lubrificacao11', $pr_lubrificacao11)->with('pr_rolamento11', $pr_rolamento11)->with('pr_desbalanceamento11', $pr_desbalanceamento11)->with('pr_desgasteFolga11', $pr_desgasteFolga11)->with('pr_engrenamento11', $pr_engrenamento11)->with('pr_cavitacao11', $pr_cavitacao11)->with('pr_falhaEletrica11', $pr_falhaEletrica11)->with('pr_desalinhamento11', $pr_desalinhamento11)
       ->with('atualf12', $atualf12)->with('pr_desalinhamento12', $pr_desalinhamento12)->with('pr_lubrificacao12', $pr_lubrificacao12)->with('pr_rolamento12', $pr_rolamento12)->with('pr_desbalanceamento12', $pr_desbalanceamento12)->with('pr_desgasteFolga12', $pr_desgasteFolga12)->with('pr_engrenamento12', $pr_engrenamento12)->with('pr_cavitacao12', $pr_cavitacao12)->with('pr_falhaEletrica12', $pr_falhaEletrica12)->with('pr_desalinhamento12', $pr_desalinhamento12);
   }
}
//==========================================fim=================================================================

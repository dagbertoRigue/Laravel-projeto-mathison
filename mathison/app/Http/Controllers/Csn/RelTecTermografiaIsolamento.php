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
use App\Http\Controllers\Csn\AuxFuncRelTec_TermoIso as aux;

class RelTecTermografiaIsolamento extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();
        return view('csn.relatoriosTecnicos.termografia_isolamento')
        ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
        ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
        ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
        ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
        ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
        ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
        ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
        ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }

    public function ura_queimadores() {

      $tag_uraQ9 = "TR 72 200 240 019 085 - 000009";
      $idAtividadeQ9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ9)->value('id');
      $idAnaliseQ9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ9)->max('id');
      $idLaudoQ9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ9)->value('id');
      $statusQ9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ9)->value('status_id');

      $tag_uraQ10 = "TR 72 200 240 019 085 - 000010";
      $idAtividadeQ10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ10)->value('id');
      $idAnaliseQ10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ10)->max('id');
      $idLaudoQ10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ10)->value('id');
      $statusQ10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ10)->value('status_id');

      $tag_uraQ11 = "TR 72 200 240 019 085 - 000011";
      $idAtividadeQ11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ11)->value('id');
      $idAnaliseQ11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ11)->max('id');
      $idLaudoQ11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ11)->value('id');
      $statusQ11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ11)->value('status_id');

      $tag_uraQ8 = "TR 72 200 240 019 085 - 000008";
      $idAtividadeQ8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ8)->value('id');
      $idAnaliseQ8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ8)->max('id');
      $idLaudoQ8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ8)->value('id');
      $statusQ8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ8)->value('status_id');

      $tag_uraQ12 = "TR 72 200 240 019 085 - 000012";
      $idAtividadeQ12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ12)->value('id');
      $idAnaliseQ12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ12)->max('id');
      $idLaudoQ12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ12)->value('id');
      $statusQ12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ12)->value('status_id');

      $tag_uraQ13 = "TR 72 200 240 019 085 - 000013";
      $idAtividadeQ13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ13)->value('id');
      $idAnaliseQ13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ13)->max('id');
      $idLaudoQ13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ13)->value('id');
      $statusQ13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ13)->value('status_id');

      $tag_uraQ7 = "TR 72 200 240 019 085 - 000007";
      $idAtividadeQ7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ7)->value('id');
      $idAnaliseQ7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ7)->max('id');
      $idLaudoQ7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ7)->value('id');
      $statusQ7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ7)->value('status_id');

      $tag_uraQ20 = "TR 72 200 240 019 085 - 000020";
      $idAtividadeQ20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ20)->value('id');
      $idAnaliseQ20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ20)->max('id');
      $idLaudoQ20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ20)->value('id');
      $statusQ20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ20)->value('status_id');

      $tag_uraQ14 = "TR 72 200 240 019 085 - 000014";
      $idAtividadeQ14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ14)->value('id');
      $idAnaliseQ14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ14)->max('id');
      $idLaudoQ14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ14)->value('id');
      $statusQ14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ14)->value('status_id');

      $tag_uraQ18 = "TR 72 200 240 019 085 - 000018";
      $idAtividadeQ18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ18)->value('id');
      $idAnaliseQ18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ18)->max('id');
      $idLaudoQ18 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ18)->value('id');
      $statusQ18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ18)->value('status_id');

      $tag_uraQ15 = "TR 72 200 240 019 085 - 000015";
      $idAtividadeQ15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ15)->value('id');
      $idAnaliseQ15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ15)->max('id');
      $idLaudoQ15 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ15)->value('id');
      $statusQ15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ15)->value('status_id');

      $tag_uraQ19 = "TR 72 200 240 019 085 - 000019";
      $idAtividadeQ19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ19)->value('id');
      $idAnaliseQ19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ19)->max('id');
      $idLaudoQ19 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ19)->value('id');
      $statusQ19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ19)->value('status_id');

      $tag_uraQ16 = "TR 72 200 240 019 085 - 000016";
      $idAtividadeQ16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ16)->value('id');
      $idAnaliseQ16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ16)->max('id');
      $idLaudoQ16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ16)->value('id');
      $statusQ16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ16)->value('status_id');

      $tag_uraQ17 = "TR 72 200 240 019 085 - 000017";
      $idAtividadeQ17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ17)->value('id');
      $idAnaliseQ17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ17)->max('id');
      $idLaudoQ17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ17)->value('id');
      $statusQ17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ17)->value('status_id');

      $tag_uraQ5 = "TR 72 200 240 019 085 - 000005";
      $idAtividadeQ5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ5)->value('id');
      $idAnaliseQ5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ5)->max('id');
      $idLaudoQ5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ5)->value('id');
      $statusQ5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ5)->value('status_id');

      $tag_uraQ6 = "TR 72 200 240 019 085 - 000006";
      $idAtividadeQ6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ6)->value('id');
      $idAnaliseQ6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ6)->max('id');
      $idLaudoQ6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ6)->value('id');
      $statusQ6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ6)->value('status_id');

      $tag_uraQ4 = "TR 72 200 240 019 085 - 000004";
      $idAtividadeQ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ4)->value('id');
      $idAnaliseQ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ4)->max('id');
      $idLaudoQ4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ4)->value('id');
      $statusQ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ4)->value('status_id');

      $tag_uraQ3 = "TR 72 200 240 019 085 - 000003";
      $idAtividadeQ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ3)->value('id');
      $idAnaliseQ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ3)->max('id');
      $idLaudoQ3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ3)->value('id');
      $statusQ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ3)->value('status_id');

      $tag_uraQ1 = "TR 72 200 240 019 085 - 000001";
      $idAtividadeQ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ1)->value('id');
      $idAnaliseQ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ1)->max('id');
      $idLaudoQ1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ1)->value('id');
      $statusQ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ1)->value('status_id');

      $tag_uraQ2 = "TR 72 200 240 019 085 - 000002";
      $idAtividadeQ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ2)->value('id');
      $idAnaliseQ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ2)->max('id');
      $idLaudoQ2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ2)->value('id');
      $statusQ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ2)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_ura_queimadores')
      ->with('idLaudoQ1', $idLaudoQ1)->with('statusQ1', $statusQ1)->with('idLaudoQ2', $idLaudoQ2)->with('statusQ2', $statusQ2)
      ->with('idLaudoQ3', $idLaudoQ3)->with('statusQ3', $statusQ3)->with('idLaudoQ4', $idLaudoQ4)->with('statusQ4', $statusQ4)
      ->with('idLaudoQ5', $idLaudoQ5)->with('statusQ5', $statusQ5)->with('idLaudoQ6', $idLaudoQ6)->with('statusQ6', $statusQ6)
      ->with('idLaudoQ7', $idLaudoQ7)->with('statusQ7', $statusQ7)->with('idLaudoQ8', $idLaudoQ8)->with('statusQ8', $statusQ8)
      ->with('idLaudoQ9', $idLaudoQ9)->with('statusQ9', $statusQ9)->with('idLaudoQ10', $idLaudoQ10)->with('statusQ10', $statusQ10)
      ->with('idLaudoQ11', $idLaudoQ11)->with('statusQ11', $statusQ11)->with('idLaudoQ12', $idLaudoQ12)->with('statusQ12', $statusQ12)
      ->with('idLaudoQ13', $idLaudoQ13)->with('statusQ13', $statusQ13)->with('idLaudoQ14', $idLaudoQ14)->with('statusQ14', $statusQ14)
      ->with('idLaudoQ15', $idLaudoQ15)->with('statusQ15', $statusQ15)->with('idLaudoQ16', $idLaudoQ16)->with('statusQ16', $statusQ16)
      ->with('idLaudoQ17', $idLaudoQ17)->with('statusQ17', $statusQ17)->with('idLaudoQ18', $idLaudoQ18)->with('statusQ18', $statusQ18)
      ->with('idLaudoQ19', $idLaudoQ19)->with('statusQ19', $statusQ19)->with('idLaudoQ20', $idLaudoQ20)->with('statusQ20', $statusQ20)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);

    }

    public function atualizacao_queimadores() {

      $tag_uraQ9 = "TR 72 200 240 019 085 - 000009";
      $idAtividadeQ9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ9)->value('id');
      $idAnaliseQ9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ9)->max('id');
      $idLaudoQ9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ9)->value('id');
      $statusQ9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ9)->value('status_id');

      $tag_uraQ10 = "TR 72 200 240 019 085 - 000010";
      $idAtividadeQ10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ10)->value('id');
      $idAnaliseQ10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ10)->max('id');
      $idLaudoQ10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ10)->value('id');
      $statusQ10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ10)->value('status_id');

      $tag_uraQ11 = "TR 72 200 240 019 085 - 000011";
      $idAtividadeQ11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ11)->value('id');
      $idAnaliseQ11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ11)->max('id');
      $idLaudoQ11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ11)->value('id');
      $statusQ11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ11)->value('status_id');

      $tag_uraQ8 = "TR 72 200 240 019 085 - 000008";
      $idAtividadeQ8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ8)->value('id');
      $idAnaliseQ8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ8)->max('id');
      $idLaudoQ8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ8)->value('id');
      $statusQ8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ8)->value('status_id');

      $tag_uraQ12 = "TR 72 200 240 019 085 - 000012";
      $idAtividadeQ12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ12)->value('id');
      $idAnaliseQ12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ12)->max('id');
      $idLaudoQ12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ12)->value('id');
      $statusQ12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ12)->value('status_id');

      $tag_uraQ13 = "TR 72 200 240 019 085 - 000013";
      $idAtividadeQ13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ13)->value('id');
      $idAnaliseQ13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ13)->max('id');
      $idLaudoQ13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ13)->value('id');
      $statusQ13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ13)->value('status_id');

      $tag_uraQ7 = "TR 72 200 240 019 085 - 000007";
      $idAtividadeQ7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ7)->value('id');
      $idAnaliseQ7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ7)->max('id');
      $idLaudoQ7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ7)->value('id');
      $statusQ7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ7)->value('status_id');

      $tag_uraQ20 = "TR 72 200 240 019 085 - 000020";
      $idAtividadeQ20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ20)->value('id');
      $idAnaliseQ20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ20)->max('id');
      $idLaudoQ20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ20)->value('id');
      $statusQ20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ20)->value('status_id');

      $tag_uraQ14 = "TR 72 200 240 019 085 - 000014";
      $idAtividadeQ14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ14)->value('id');
      $idAnaliseQ14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ14)->max('id');
      $idLaudoQ14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ14)->value('id');
      $statusQ14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ14)->value('status_id');

      $tag_uraQ18 = "TR 72 200 240 019 085 - 000018";
      $idAtividadeQ18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ18)->value('id');
      $idAnaliseQ18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ18)->max('id');
      $idLaudoQ18 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ18)->value('id');
      $statusQ18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ18)->value('status_id');

      $tag_uraQ15 = "TR 72 200 240 019 085 - 000015";
      $idAtividadeQ15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ15)->value('id');
      $idAnaliseQ15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ15)->max('id');
      $idLaudoQ15 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ15)->value('id');
      $statusQ15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ15)->value('status_id');

      $tag_uraQ19 = "TR 72 200 240 019 085 - 000019";
      $idAtividadeQ19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ19)->value('id');
      $idAnaliseQ19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ19)->max('id');
      $idLaudoQ19 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ19)->value('id');
      $statusQ19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ19)->value('status_id');

      $tag_uraQ16 = "TR 72 200 240 019 085 - 000016";
      $idAtividadeQ16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ16)->value('id');
      $idAnaliseQ16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ16)->max('id');
      $idLaudoQ16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ16)->value('id');
      $statusQ16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ16)->value('status_id');

      $tag_uraQ17 = "TR 72 200 240 019 085 - 000017";
      $idAtividadeQ17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ17)->value('id');
      $idAnaliseQ17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ17)->max('id');
      $idLaudoQ17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ17)->value('id');
      $statusQ17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ17)->value('status_id');

      $tag_uraQ5 = "TR 72 200 240 019 085 - 000005";
      $idAtividadeQ5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ5)->value('id');
      $idAnaliseQ5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ5)->max('id');
      $idLaudoQ5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ5)->value('id');
      $statusQ5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ5)->value('status_id');

      $tag_uraQ6 = "TR 72 200 240 019 085 - 000006";
      $idAtividadeQ6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ6)->value('id');
      $idAnaliseQ6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ6)->max('id');
      $idLaudoQ6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ6)->value('id');
      $statusQ6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ6)->value('status_id');

      $tag_uraQ4 = "TR 72 200 240 019 085 - 000004";
      $idAtividadeQ4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ4)->value('id');
      $idAnaliseQ4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ4)->max('id');
      $idLaudoQ4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ4)->value('id');
      $statusQ4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ4)->value('status_id');

      $tag_uraQ3 = "TR 72 200 240 019 085 - 000003";
      $idAtividadeQ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ3)->value('id');
      $idAnaliseQ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ3)->max('id');
      $idLaudoQ3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ3)->value('id');
      $statusQ3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ3)->value('status_id');

      $tag_uraQ1 = "TR 72 200 240 019 085 - 000001";
      $idAtividadeQ1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ1)->value('id');
      $idAnaliseQ1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ1)->max('id');
      $idLaudoQ1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ1)->value('id');
      $statusQ1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ1)->value('status_id');

      $tag_uraQ2 = "TR 72 200 240 019 085 - 000002";
      $idAtividadeQ2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uraQ2)->value('id');
      $idAnaliseQ2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQ2)->max('id');
      $idLaudoQ2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseQ2)->value('id');
      $statusQ2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQ2)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_atualizacao_queimadores')
      ->with('idLaudoQ1', $idLaudoQ1)->with('statusQ1', $statusQ1)->with('idLaudoQ2', $idLaudoQ2)->with('statusQ2', $statusQ2)
      ->with('idLaudoQ3', $idLaudoQ3)->with('statusQ3', $statusQ3)->with('idLaudoQ4', $idLaudoQ4)->with('statusQ4', $statusQ4)
      ->with('idLaudoQ5', $idLaudoQ5)->with('statusQ5', $statusQ5)->with('idLaudoQ6', $idLaudoQ6)->with('statusQ6', $statusQ6)
      ->with('idLaudoQ7', $idLaudoQ7)->with('statusQ7', $statusQ7)->with('idLaudoQ8', $idLaudoQ8)->with('statusQ8', $statusQ8)
      ->with('idLaudoQ9', $idLaudoQ9)->with('statusQ9', $statusQ9)->with('idLaudoQ10', $idLaudoQ10)->with('statusQ10', $statusQ10)
      ->with('idLaudoQ11', $idLaudoQ11)->with('statusQ11', $statusQ11)->with('idLaudoQ12', $idLaudoQ12)->with('statusQ12', $statusQ12)
      ->with('idLaudoQ13', $idLaudoQ13)->with('statusQ13', $statusQ13)->with('idLaudoQ14', $idLaudoQ14)->with('statusQ14', $statusQ14)
      ->with('idLaudoQ15', $idLaudoQ15)->with('statusQ15', $statusQ15)->with('idLaudoQ16', $idLaudoQ16)->with('statusQ16', $statusQ16)
      ->with('idLaudoQ17', $idLaudoQ17)->with('statusQ17', $statusQ17)->with('idLaudoQ18', $idLaudoQ18)->with('statusQ18', $statusQ18)
      ->with('idLaudoQ19', $idLaudoQ19)->with('statusQ19', $statusQ19)->with('idLaudoQ20', $idLaudoQ20)->with('statusQ20', $statusQ20)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);

    }

    public function decapagem_caldeira1() {

      $tag_lds_C6 = "TR 72 050 150 009 000 - 000006";
      $idAtividadeC6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C6)->value('id');
      $idAnaliseC6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC6)->max('id');
      $idLaudoC6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC6)->value('id');
      $statusC6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC6)->value('status_id');

      $tag_lds_C3 = "TR 72 050 150 009 000 - 000003";
      $idAtividadeC3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C3)->value('id');
      $idAnaliseC3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC3)->max('id');
      $idLaudoC3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC3)->value('id');
      $statusC3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC3)->value('status_id');

      $tag_lds_C5 = "TR 72 050 150 009 000 - 000005";
      $idAtividadeC5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C5)->value('id');
      $idAnaliseC5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC5)->max('id');
      $idLaudoC5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC5)->value('id');
      $statusC5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC5)->value('status_id');

      $tag_lds_C4 = "TR 72 050 150 009 000 - 000004";
      $idAtividadeC4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C4)->value('id');
      $idAnaliseC4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC4)->max('id');
      $idLaudoC4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC4)->value('id');
      $statusC4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC4)->value('status_id');

      $tag_lds_C2 = "TR 72 050 150 009 000 - 000002";
      $idAtividadeC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2)->value('id');
      $idAnaliseC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2)->max('id');
      $idLaudoC2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC2)->value('id');
      $statusC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2)->value('status_id');

      $tag_lds_C1 = "TR 72 050 150 009 000 - 000001";
      $idAtividadeC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C1)->value('id');
      $idAnaliseC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC1)->max('id');
      $idLaudoC1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC1)->value('id');
      $statusC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC1)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_decapagem_caldeira1')
      ->with('idLaudoC1', $idLaudoC1)->with('statusC1', $statusC1)
      ->with('idLaudoC2', $idLaudoC2)->with('statusC2', $statusC2)
      ->with('idLaudoC3', $idLaudoC3)->with('statusC3', $statusC3)
      ->with('idLaudoC4', $idLaudoC4)->with('statusC4', $statusC4)
      ->with('idLaudoC5', $idLaudoC5)->with('statusC5', $statusC5)
      ->with('idLaudoC6', $idLaudoC6)->with('statusC6', $statusC6)
      ->with('ura_menu', $ura_menu)->with('ura_normal', $ura_normal)
      ->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('ura_queimadores', $ura_queimadores)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }

    public function decapagem_caldeira2() {

      $tag_lds_C2_C6 = "TR 72 050 250 009 000 - 000006";
      $idAtividadeC2_C6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C6)->value('id');
      $idAnaliseC2_C6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C6)->max('id');
      $idLaudoC2_C6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC2_C6)->value('id');
      $statusC2_C6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C6)->value('status_id');

      $tag_lds_C2_C3 = "TR 72 050 250 009 000 - 000003";
      $idAtividadeC2_C3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C3)->value('id');
      $idAnaliseC2_C3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C3)->max('id');
      $idLaudoC2_C3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC2_C3)->value('id');
      $statusC2_C3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C3)->value('status_id');

      $tag_lds_C2_C5 = "TR 72 050 250 009 000 - 000005";
      $idAtividadeC2_C5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C5)->value('id');
      $idAnaliseC2_C5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C5)->max('id');
      $idLaudoC2_C5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC2_C5)->value('id');
      $statusC2_C5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C5)->value('status_id');

      $tag_lds_C2_C4 = "TR 72 050 250 009 000 - 000004";
      $idAtividadeC2_C4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C4)->value('id');
      $idAnaliseC2_C4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C4)->max('id');
      $idLaudoC2_C4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC2_C4)->value('id');
      $statusC2_C4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C4)->value('status_id');

      $tag_lds_C2_C2 = "TR 72 050 250 009 000 - 000002";
      $idAtividadeC2_C2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C2)->value('id');
      $idAnaliseC2_C2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C2)->max('id');
      $idLaudoC2_C2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC2_C2)->value('id');
      $statusC2_C2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C2)->value('status_id');

      $tag_lds_C2_C1 = "TR 72 050 250 009 000 - 000001";
      $idAtividadeC2_C1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_lds_C2_C1)->value('id');
      $idAnaliseC2_C1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC2_C1)->max('id');
      $idLaudoC2_C1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC2_C1)->value('id');
      $statusC2_C1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC2_C1)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_decapagem_caldeira2')
      ->with('idLaudoC2_C1', $idLaudoC2_C1)->with('statusC2_C1', $statusC2_C1)
      ->with('idLaudoC2_C2', $idLaudoC2_C2)->with('statusC2_C2', $statusC2_C2)
      ->with('idLaudoC2_C3', $idLaudoC2_C3)->with('statusC2_C3', $statusC2_C3)
      ->with('idLaudoC2_C4', $idLaudoC2_C4)->with('statusC2_C4', $statusC2_C4)
      ->with('idLaudoC2_C5', $idLaudoC2_C5)->with('statusC2_C5', $statusC2_C5)
      ->with('idLaudoC2_C6', $idLaudoC2_C6)->with('statusC2_C6', $statusC2_C6)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }

    public function galvanizacao_forno() {

      $tag_galva_F23 = "TR 72 400 410 259 000 - 000016";
      $idAtividadeF23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F23)->value('id');
      $idAnaliseF23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF23)->max('id');
      $idLaudoF23 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF23)->value('id');
      $statusF23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF23)->value('status_id');

      $tag_galva_F17 = "TR 72 400 410 259 000 - 000010";
      $idAtividadeF17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F17)->value('id');
      $idAnaliseF17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF17)->max('id');
      $idLaudoF17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF17)->value('id');
      $statusF17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF17)->value('status_id');

      $tag_galva_F22 = "TR 72 400 410 259 000 - 000015";
      $idAtividadeF22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F22)->value('id');
      $idAnaliseF22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF22)->max('id');
      $idLaudoF22 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF22)->value('id');
      $statusF22 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF22)->value('status_id');

      $tag_galva_F16 = "TR 72 400 410 259 000 - 000009";
      $idAtividadeF16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F16)->value('id');
      $idAnaliseF16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF16)->max('id');
      $idLaudoF16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF16)->value('id');
      $statusF16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF16)->value('status_id');

      $tag_galva_F11 = "TR 72 400 410 259 000 - 000004";
      $idAtividadeF11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F11)->value('id');
      $idAnaliseF11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF11)->max('id');
      $idLaudoF11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF11)->value('id');
      $statusF11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF11)->value('status_id');

      $tag_galva_F21 = "TR 72 400 410 259 000 - 000014";
      $idAtividadeF21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F21)->value('id');
      $idAnaliseF21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF21)->max('id');
      $idLaudoF21 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF21)->value('id');
      $statusF21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF21)->value('status_id');

      $tag_galva_F15 = "TR 72 400 410 259 000 - 000008";
      $idAtividadeF15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F15)->value('id');
      $idAnaliseF15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF15)->max('id');
      $idLaudoF15 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF15)->value('id');
      $statusF15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF15)->value('status_id');

      $tag_galva_F58 = "TR 72 400 410 266 000 - 000001";
      $idAtividadeF58 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F58)->value('id');
      $idAnaliseF58 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF58)->max('id');
      $idLaudoF58 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF58)->value('id');
      $statusF58 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF58)->value('status_id');

      $tag_galva_F20 = "TR 72 400 410 259 000 - 000013";
      $idAtividadeF20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F20)->value('id');
      $idAnaliseF20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF20)->max('id');
      $idLaudoF20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF20)->value('id');
      $statusF20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF20)->value('status_id');

      $tag_galva_F14 = "TR 72 400 410 259 000 - 000007";
      $idAtividadeF14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F14)->value('id');
      $idAnaliseF14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF14)->max('id');
      $idLaudoF14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF14)->value('id');
      $statusF14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF14)->value('status_id');

      $tag_galva_F10 = "TR 72 400 410 259 000 - 000003";
      $idAtividadeF10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F10)->value('id');
      $idAnaliseF10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF10)->max('id');
      $idLaudoF10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF10)->value('id');
      $statusF10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF10)->value('status_id');

      $tag_galva_F57 = "TR 72 400 410 257 000 - 000012";
      $idAtividadeF57 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F57)->value('id');
      $idAnaliseF57 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF57)->max('id');
      $idLaudoF57 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF57)->value('id');
      $statusF57 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF57)->value('status_id');

      $tag_galva_F19 = "TR 72 400 410 259 000 - 000012";
      $idAtividadeF19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F19)->value('id');
      $idAnaliseF19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF19)->max('id');
      $idLaudoF19 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF19)->value('id');
      $statusF19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF19)->value('status_id');

      $tag_galva_F13 = "TR 72 400 410 259 000 - 000006";
      $idAtividadeF13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F13)->value('id');
      $idAnaliseF13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF13)->max('id');
      $idLaudoF13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF13)->value('id');
      $statusF13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF13)->value('status_id');

      $tag_galva_F18 = "TR 72 400 410 259 000 - 000011";
      $idAtividadeF18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F18)->value('id');
      $idAnaliseF18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF18)->max('id');
      $idLaudoF18 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF18)->value('id');
      $statusF18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF18)->value('status_id');

      $tag_galva_F12 = "TR 72 400 410 259 000 - 000005";
      $idAtividadeF12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F12)->value('id');
      $idAnaliseF12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF12)->max('id');
      $idLaudoF12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF12)->value('id');
      $statusF12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF12)->value('status_id');

      $tag_galva_F53 = "TR 72 400 410 263 000 - 000010";
      $idAtividadeF53 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F53)->value('id');
      $idAnaliseF53 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF53)->max('id');
      $idLaudoF53 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF53)->value('id');
      $statusF53 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF53)->value('status_id');

      $tag_galva_F45 = "TR 72 400 410 263 000 - 000002";
      $idAtividadeF45 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F45)->value('id');
      $idAnaliseF45 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF45)->max('id');
      $idLaudoF45 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF45)->value('id');
      $statusF45 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF45)->value('status_id');

      $tag_galva_F49 = "TR 72 400 410 263 000 - 000006";
      $idAtividadeF49 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F49)->value('id');
      $idAnaliseF49 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF49)->max('id');
      $idLaudoF49 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF49)->value('id');
      $statusF49 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF49)->value('status_id');

      $tag_galva_F52 = "TR 72 400 410 263 000 - 000009";
      $idAtividadeF52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F52)->value('id');
      $idAnaliseF52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF52)->max('id');
      $idLaudoF52 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF52)->value('id');
      $statusF52 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF52)->value('status_id');

      $tag_galva_F48 = "TR 72 400 410 263 000 - 000005";
      $idAtividadeF48 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F48)->value('id');
      $idAnaliseF48 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF48)->max('id');
      $idLaudoF48 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF48)->value('id');
      $statusF48 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF48)->value('status_id');

      $tag_galva_F56 = "TR 72 400 410 257 000 - 000011";
      $idAtividadeF56 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F56)->value('id');
      $idAnaliseF56 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF56)->max('id');
      $idLaudoF56 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF56)->value('id');
      $statusF56 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF56)->value('status_id');

      $tag_galva_F55 = "TR 72 400 410 257 000 - 000010";
      $idAtividadeF55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F55)->value('id');
      $idAnaliseF55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF55)->max('id');
      $idLaudoF55 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF55)->value('id');
      $statusF55 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF55)->value('status_id');

      $tag_galva_F51 = "TR 72 400 410 263 000 - 000008";
      $idAtividadeF51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F51)->value('id');
      $idAnaliseF51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF51)->max('id');
      $idLaudoF51 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF51)->value('id');
      $statusF51 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF51)->value('status_id');

      $tag_galva_F47 = "TR 72 400 410 263 000 - 000004";
      $idAtividadeF47 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F47)->value('id');
      $idAnaliseF47 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF47)->max('id');
      $idLaudoF47 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF47)->value('id');
      $statusF47 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF47)->value('status_id');

      $tag_galva_F4 = "TR 72 400 410 257 000 - 000004";
      $idAtividadeF4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F4)->value('id');
      $idAnaliseF4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF4)->max('id');
      $idLaudoF4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF4)->value('id');
      $statusF4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF4)->value('status_id');

      $tag_galva_F50 = "TR 72 400 410 263 000 - 000007";
      $idAtividadeF50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F50)->value('id');
      $idAnaliseF50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF50)->max('id');
      $idLaudoF50 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF50)->value('id');
      $statusF50 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF50)->value('status_id');

      $tag_galva_F44 = "TR 72 400 410 263 000 - 000001";
      $idAtividadeF44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F44)->value('id');
      $idAnaliseF44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF44)->max('id');
      $idLaudoF44 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF44)->value('id');
      $statusF44 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF44)->value('status_id');

      $tag_galvaF46 = "TR 72 400 410 263 000 - 000003";
      $idAtividadeF46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galvaF46)->value('id');
      $idAnaliseF46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF46)->max('id');
      $idLaudoF46 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF46)->value('id');
      $statusF46 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF46)->value('status_id');

      $tag_galva_F54 = "TR 72 400 410 257 000 - 000009";
      $idAtividadeF54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F54)->value('id');
      $idAnaliseF54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF54)->max('id');
      $idLaudoF54 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF54)->value('id');
      $statusF54 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF54)->value('status_id');

      $tag_galva_F6 = "TR 72 400 410 258 000 - 000002";
      $idAtividadeF6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F6)->value('id');
      $idAnaliseF6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF6)->max('id');
      $idLaudoF6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF6)->value('id');
      $statusF6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF6)->value('status_id');

      $tag_galva_F8 = "TR 72 400 410 259 000 - 000002";
      $idAtividadeF8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F8)->value('id');
      $idAnaliseF8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF8)->max('id');
      $idLaudoF8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF8)->value('id');
      $statusF8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF8)->value('status_id');

      $tag_galva_F37 = "TR 72 400 410 261 000 - 000014";
      $idAtividadeF37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F37)->value('id');
      $idAnaliseF37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF37)->max('id');
      $idLaudoF37 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF37)->value('id');
      $statusF37 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF37)->value('status_id');

      $tag_galva_F25 = "TR 72 400 410 261 000 - 000002";
      $idAtividadeF25 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F25)->value('id');
      $idAnaliseF25 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF25)->max('id');
      $idLaudoF25 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF25)->value('id');
      $statusF25 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF25)->value('status_id');

      $tag_galva_F31 = "TR 72 400 410 261 000 - 000008";
      $idAtividadeF31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F31)->value('id');
      $idAnaliseF31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF31)->max('id');
      $idLaudoF31 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF31)->value('id');
      $statusF31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF31)->value('status_id');

      $tag_galva_F43 = "TR 72 400 410 257 000 - 000006";
      $idAtividadeF43 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F43)->value('id');
      $idAnaliseF43 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF43)->max('id');
      $idLaudoF43 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF43)->value('id');
      $statusF43 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF43)->value('status_id');

      $tag_galva_F9 = "TR 72 400 410 257 000 - 000013";
      $idAtividadeF9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F9)->value('id');
      $idAnaliseF9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF9)->max('id');
      $idLaudoF9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF9)->value('id');
      $statusF9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF9)->value('status_id');

      $tag_galva_F3 = "TR 72 400 410 257 000 - 000003";
      $idAtividadeF3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F3)->value('id');
      $idAnaliseF3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF3)->max('id');
      $idLaudoF3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF3)->value('id');
      $statusF3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF3)->value('status_id');

      $tag_galva_F2 = "TR 72 400 410 257 000 - 000002";
      $idAtividadeF2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F2)->value('id');
      $idAnaliseF2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF2)->max('id');
      $idLaudoF2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF2)->value('id');
      $statusF2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF2)->value('status_id');

      $tag_galva_F36 = "TR 72 400 410 261 000 - 000013";
      $idAtividadeF36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F36)->value('id');
      $idAnaliseF36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF36)->max('id');
      $idLaudoF36 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF36)->value('id');
      $statusF36 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF36)->value('status_id');

      $tag_galva_F30 = "TR 72 400 410 261 000 - 000007";
      $idAtividadeF30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F30)->value('id');
      $idAnaliseF30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF30)->max('id');
      $idLaudoF30 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF30)->value('id');
      $statusF30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF30)->value('status_id');

      $tag_galva_F39 = "TR 72 400 410 258 000 - 000004";
      $idAtividadeF39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F39)->value('id');
      $idAnaliseF39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF39)->max('id');
      $idLaudoF39 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF39)->value('id');
      $statusF39 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF39)->value('status_id');

      $tag_galva_F7 = "TR 72 400 410 259 000 - 000001";
      $idAtividadeF7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F7)->value('id');
      $idAnaliseF7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF7)->max('id');
      $idLaudoF7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF7)->value('id');
      $statusF7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF7)->value('status_id');

      $tag_galva_F5 = "TR 72 400 410 258 000 - 000001";
      $idAtividadeF5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F5)->value('id');
      $idAnaliseF5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF5)->max('id');
      $idLaudoF5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF5)->value('id');
      $statusF5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF5)->value('status_id');

      $tag_galva_F35 = "TR 72 400 410 261 000 - 000012";
      $idAtividadeF35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F35)->value('id');
      $idAnaliseF35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF35)->max('id');
      $idLaudoF35 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF35)->value('id');
      $statusF35 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF35)->value('status_id');

      $tag_galva_F29 = "TR 72 400 410 261 000 - 000006";
      $idAtividadeF29 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F29)->value('id');
      $idAnaliseF29 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF29)->max('id');
      $idLaudoF29 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF29)->value('id');
      $statusF29 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF29)->value('status_id');

      $tag_galva_F42 = "TR 72 400 410 257 000 - 000007";
      $idAtividadeF42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F42)->value('id');
      $idAnaliseF42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF42)->max('id');
      $idLaudoF42 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF42)->value('id');
      $statusF42 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF42)->value('status_id');

      $tag_galva_F41 = "TR 72 400 410 257 000 - 000008";
      $idAtividadeF41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F41)->value('id');
      $idAnaliseF41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF41)->max('id');
      $idLaudoF41 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF41)->value('id');
      $statusF41 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF41)->value('status_id');

      $tag_galva_F34 = "TR 72 400 410 261 000 - 000011";
      $idAtividadeF34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F34)->value('id');
      $idAnaliseF34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF34)->max('id');
      $idLaudoF34 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF34)->value('id');
      $statusF34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF34)->value('status_id');

      $tag_galva_F24 = "TR 72 400 410 261 000 - 000001";
      $idAtividadeF24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F24)->value('id');
      $idAnaliseF24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF24)->max('id');
      $idLaudoF24 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF24)->value('id');
      $statusF24 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF24)->value('status_id');

      $tag_galva_F28 = "TR 72 400 410 261 000 - 000005";
      $idAtividadeF28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F28)->value('id');
      $idAnaliseF28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF28)->max('id');
      $idLaudoF28 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF28)->value('id');
      $statusF28 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF28)->value('status_id');

      $tag_galva_F33 = "TR 72 400 410 261 000 - 000010";
      $idAtividadeF33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F33)->value('id');
      $idAnaliseF33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF33)->max('id');
      $idLaudoF33 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF33)->value('id');
      $statusF33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF33)->value('status_id');

      $tag_galva_F27 = "TR 72 400 410 261 000 - 000004";
      $idAtividadeF27 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F27)->value('id');
      $idAnaliseF27 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF27)->max('id');
      $idLaudoF27 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF27)->value('id');
      $statusF27 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF27)->value('status_id');

      $tag_galva_F38 = "TR 72 400 410 258 000 - 000003";
      $idAtividadeF38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F38)->value('id');
      $idAnaliseF38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF38)->max('id');
      $idLaudoF38 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF38)->value('id');
      $statusF38 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF38)->value('status_id');

      $tag_galva_F40 = "TR 72 400 410 257 000 - 000005";
      $idAtividadeF40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F40)->value('id');
      $idAnaliseF40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF40)->max('id');
      $idLaudoF40 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF40)->value('id');
      $statusF40 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF40)->value('status_id');

      $tag_galva_F32 = "TR 72 400 410 261 000 - 000009";
      $idAtividadeF32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F32)->value('id');
      $idAnaliseF32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF32)->max('id');
      $idLaudoF32 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF32)->value('id');
      $statusF32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF32)->value('status_id');

      $tag_galva_F26 = "TR 72 400 410 261 000 - 000003";
      $idAtividadeF26 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F26)->value('id');
      $idAnaliseF26 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF26)->max('id');
      $idLaudoF26 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF26)->value('id');
      $statusF26 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF26)->value('status_id');

      $tag_galva_F1 = "TR 72 400 410 257 000 - 000001";
      $idAtividadeF1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_galva_F1)->value('id');
      $idAnaliseF1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeF1)->max('id');
      $idLaudoF1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseF1)->value('id');
      $statusF1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseF1)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_galvanizacao_forno')
      ->with('idLaudoF1', $idLaudoF1)->with('statusF1', $statusF1)->with('idLaudoF2', $idLaudoF2)->with('statusF2', $statusF2)
      ->with('idLaudoF3', $idLaudoF3)->with('statusF3', $statusF3)->with('idLaudoF4', $idLaudoF4)->with('statusF4', $statusF4)
      ->with('idLaudoF5', $idLaudoF5)->with('statusF5', $statusF5)->with('idLaudoF6', $idLaudoF6)->with('statusF6', $statusF6)
      ->with('idLaudoF7', $idLaudoF7)->with('statusF7', $statusF7)->with('idLaudoF8', $idLaudoF8)->with('statusF8', $statusF8)
      ->with('idLaudoF9', $idLaudoF9)->with('statusF9', $statusF9)->with('idLaudoF10', $idLaudoF10)->with('statusF10', $statusF10)
      ->with('idLaudoF11', $idLaudoF11)->with('statusF11', $statusF11)->with('idLaudoF12', $idLaudoF12)->with('statusF12', $statusF12)
      ->with('idLaudoF13', $idLaudoF13)->with('statusF13', $statusF13)->with('idLaudoF14', $idLaudoF14)->with('statusF14', $statusF14)
      ->with('idLaudoF15', $idLaudoF15)->with('statusF15', $statusF15)->with('idLaudoF16', $idLaudoF16)->with('statusF16', $statusF16)
      ->with('idLaudoF17', $idLaudoF17)->with('statusF17', $statusF17)->with('idLaudoF18', $idLaudoF18)->with('statusF18', $statusF18)
      ->with('idLaudoF19', $idLaudoF19)->with('statusF19', $statusF19)->with('idLaudoF20', $idLaudoF20)->with('statusF20', $statusF20)
      ->with('idLaudoF21', $idLaudoF21)->with('statusF21', $statusF21)->with('idLaudoF22', $idLaudoF22)->with('statusF22', $statusF22)
      ->with('idLaudoF23', $idLaudoF23)->with('statusF23', $statusF23)->with('idLaudoF24', $idLaudoF24)->with('statusF24', $statusF24)
      ->with('idLaudoF25', $idLaudoF25)->with('statusF25', $statusF25)->with('idLaudoF26', $idLaudoF26)->with('statusF26', $statusF26)
      ->with('idLaudoF27', $idLaudoF27)->with('statusF27', $statusF27)->with('idLaudoF28', $idLaudoF28)->with('statusF28', $statusF28)
      ->with('idLaudoF29', $idLaudoF29)->with('statusF29', $statusF29)->with('idLaudoF30', $idLaudoF30)->with('statusF30', $statusF30)
      ->with('idLaudoF31', $idLaudoF31)->with('statusF31', $statusF31)->with('idLaudoF32', $idLaudoF32)->with('statusF32', $statusF32)
      ->with('idLaudoF33', $idLaudoF33)->with('statusF33', $statusF33)->with('idLaudoF34', $idLaudoF34)->with('statusF34', $statusF34)
      ->with('idLaudoF35', $idLaudoF35)->with('statusF35', $statusF35)->with('idLaudoF36', $idLaudoF36)->with('statusF36', $statusF36)
      ->with('idLaudoF37', $idLaudoF37)->with('statusF37', $statusF37)->with('idLaudoF38', $idLaudoF38)->with('statusF38', $statusF38)
      ->with('idLaudoF39', $idLaudoF39)->with('statusF39', $statusF39)->with('idLaudoF40', $idLaudoF40)->with('statusF40', $statusF40)
      ->with('idLaudoF41', $idLaudoF41)->with('statusF41', $statusF41)->with('idLaudoF42', $idLaudoF42)->with('statusF42', $statusF42)
      ->with('idLaudoF43', $idLaudoF43)->with('statusF43', $statusF43)->with('idLaudoF44', $idLaudoF44)->with('statusF44', $statusF44)
      ->with('idLaudoF45', $idLaudoF45)->with('statusF45', $statusF45)->with('idLaudoF46', $idLaudoF46)->with('statusF46', $statusF46)
      ->with('idLaudoF47', $idLaudoF47)->with('statusF47', $statusF47)->with('idLaudoF48', $idLaudoF48)->with('statusF48', $statusF48)
      ->with('idLaudoF49', $idLaudoF49)->with('statusF49', $statusF49)->with('idLaudoF50', $idLaudoF50)->with('statusF50', $statusF50)
      ->with('idLaudoF51', $idLaudoF51)->with('statusF51', $statusF51)->with('idLaudoF52', $idLaudoF52)->with('statusF52', $statusF52)
      ->with('idLaudoF53', $idLaudoF53)->with('statusF53', $statusF53)->with('idLaudoF54', $idLaudoF54)->with('statusF54', $statusF54)
      ->with('idLaudoF55', $idLaudoF55)->with('statusF55', $statusF55)->with('idLaudoF56', $idLaudoF56)->with('statusF56', $statusF56)
      ->with('idLaudoF57', $idLaudoF57)->with('statusF57', $statusF57)->with('idLaudoF58', $idLaudoF58)->with('statusF58', $statusF58)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }

    public function pintura_caldeira1() {

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

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_pintura_caldeira1')
      ->with('idLaudoPC1', $idLaudoPC1)->with('statusPC1', $statusPC1)->with('idLaudoPC2', $idLaudoPC2)->with('statusPC2', $statusPC2)
      ->with('idLaudoPC3', $idLaudoPC3)->with('statusPC3', $statusPC3)->with('idLaudoPC4', $idLaudoPC4)->with('statusPC4', $statusPC4)
      ->with('idLaudoPC5', $idLaudoPC5)->with('statusPC5', $statusPC5)->with('idLaudoPC6', $idLaudoPC6)->with('statusPC6', $statusPC6)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }

    public function pintura_oxidizer() {

      $tag_pintura_OX18 = "TR 72 500 510 326 016 - 000005";
      $idAtividadeOX18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX18)->value('id');
      $idAnaliseOX18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX18)->max('id');
      $idLaudoOX18 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX18)->value('id');
      $statusOX18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX18)->value('status_id');

      $tag_pintura_OX9 = "TR 72 500 510 326 016 - 000002";
      $idAtividadeOX9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX9)->value('id');
      $idAnaliseOX9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX9)->max('id');
      $idLaudoOX9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX9)->value('id');
      $statusOX9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX9)->value('status_id');

      $tag_pintura_OX13 = "TR 72 500 510 326 013 - 000007";
      $idAtividadeOX13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX13)->value('id');
      $idAnaliseOX13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX13)->max('id');
      $idLaudoOX13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX13)->value('id');
      $statusOX13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX13)->value('status_id');

      $tag_pintura_OX14 = "TR 72 500 510 326 025 - 000003";
      $idAtividadeOX14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX14)->value('id');
      $idAnaliseOX14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX14)->max('id');
      $idLaudoOX14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX14)->value('id');
      $statusOX14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX14)->value('status_id');

      $tag_pintura_OX17 = "TR 72 500 510 326 016 - 000004";
      $idAtividadeOX17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX17)->value('id');
      $idAnaliseOX17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX17)->max('id');
      $idLaudoOX17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX17)->value('id');
      $statusOX17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX17)->value('status_id');

      $tag_pintura_OX11 = "TR 72 500 510 326 025 - 000001";
      $idAtividadeOX11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX11)->value('id');
      $idAnaliseOX11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX11)->max('id');
      $idLaudoOX11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX11)->value('id');
      $statusOX11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX11)->value('status_id');

      $tag_pintura_OX16 = "TR 72 500 510 326 025 - 000005";
      $idAtividadeOX16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX16)->value('id');
      $idAnaliseOX16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX16)->max('id');
      $idLaudoOX16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX16)->value('id');
      $statusOX16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX16)->value('status_id');

      $tag_pintura_OX28 = "TR 72 500 510 326 022 - 000003";
      $idAtividadeOX28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX28)->value('id');
      $idAnaliseOX28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX28)->max('id');
      $idLaudoOX28 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX28)->value('id');
      $statusOX28 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX28)->value('status_id');

      $tag_pintura_OX8 = "TR 72 500 510 326 022 - 000001";
      $idAtividadeOX8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX8)->value('id');
      $idAnaliseOX8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX8)->max('id');
      $idLaudoOX8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX8)->value('id');
      $statusOX8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX8)->value('status_id');

      $tag_pintura_OX7 = "TR 72 500 510 326 016 - 000001";
      $idAtividadeOX7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX7)->value('id');
      $idAnaliseOX7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX7)->max('id');
      $idLaudoOX7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX7)->value('id');
      $statusOX7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX7)->value('status_id');

      $tag_pintura_OX10 = "TR 72 500 510 326 016 - 000003";
      $idAtividadeOX10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX10)->value('id');
      $idAnaliseOX10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX10)->max('id');
      $idLaudoOX10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX10)->value('id');
      $statusOX10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX10)->value('status_id');

      $tag_pintura_OX12 = "TR 72 500 510 326 025 - 000002";
      $idAtividadeOX12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX12)->value('id');
      $idAnaliseOX12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX12)->max('id');
      $idLaudoOX12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX12)->value('id');
      $statusOX12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX12)->value('status_id');

      $tag_pintura_OX6 = "TR 72 500 510 326 013 - 000006";
      $idAtividadeOX6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX6)->value('id');
      $idAnaliseOX6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX6)->max('id');
      $idLaudoOX6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX6)->value('id');
      $statusOX6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX6)->value('status_id');

      $tag_pintura_OX5 = "TR 72 500 510 326 013 - 000005";
      $idAtividadeOX5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX5)->value('id');
      $idAnaliseOX5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX5)->max('id');
      $idLaudoOX5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX5)->value('id');
      $statusOX5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX5)->value('status_id');

      $tag_pintura_OX21 = "TR 72 500 510 326 019 - 000002";
      $idAtividadeOX21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX21)->value('id');
      $idAnaliseOX21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX21)->max('id');
      $idLaudoOX21 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX21)->value('id');
      $statusOX21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX21)->value('status_id');

      $tag_pintura_OX20 = "TR 72 500 510 326 019 - 000001";
      $idAtividadeOX20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX20)->value('id');
      $idAnaliseOX20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX20)->max('id');
      $idLaudoOX20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX20)->value('id');
      $statusOX20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX20)->value('status_id');

      $tag_pintura_OX15 = "TR 72 500 510 326 025 - 000004";
      $idAtividadeOX15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX15)->value('id');
      $idAnaliseOX15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX15)->max('id');
      $idLaudoOX15 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX15)->value('id');
      $statusOX15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX15)->value('status_id');

      $tag_pintura_OX19 = "TR 72 500 510 326 025 - 000006";
      $idAtividadeOX19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX19)->value('id');
      $idAnaliseOX19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX19)->max('id');
      $idLaudoOX19 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX19)->value('id');
      $statusOX19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX19)->value('status_id');

      $tag_pintura_OX25 = "TR 72 500 510 326 025 - 000007";
      $idAtividadeOX25 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX25)->value('id');
      $idAnaliseOX25 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX25)->max('id');
      $idLaudoOX25 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX25)->value('id');
      $statusOX25 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX25)->value('status_id');

      $tag_pintura_OX23 = "TR 72 500 510 326 019 - 000004";
      $idAtividadeOX23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX23)->value('id');
      $idAnaliseOX23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX23)->max('id');
      $idLaudoOX23 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX23)->value('id');
      $statusOX23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX23)->value('status_id');

      $tag_pintura_OX22 = "TR 72 500 510 326 019 - 000003";
      $idAtividadeOX22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX22)->value('id');
      $idAnaliseOX22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX22)->max('id');
      $idLaudoOX22 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX22)->value('id');
      $statusOX22 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX22)->value('status_id');

      $tag_pintura_OX26 = "TR 72 500 510 326 025 - 000008";
      $idAtividadeOX26 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX26)->value('id');
      $idAnaliseOX26 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX26)->max('id');
      $idLaudoOX26 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX26)->value('id');
      $statusOX26 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX26)->value('status_id');

      $tag_pintura_OX4 = "TR 72 500 510 326 013 - 000004";
      $idAtividadeOX4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX4)->value('id');
      $idAnaliseOX4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX4)->max('id');
      $idLaudoOX4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX4)->value('id');
      $statusOX4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX4)->value('status_id');

      $tag_pintura_OX3 = "TR 72 500 510 326 013 - 000003";
      $idAtividadeOX3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX3)->value('id');
      $idAnaliseOX3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX3)->max('id');
      $idLaudoOX3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX3)->value('id');
      $statusOX3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX3)->value('status_id');

      $tag_pintura_OX2 = "TR 72 500 510 326 013 - 000002";
      $idAtividadeOX2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX2)->value('id');
      $idAnaliseOX2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX2)->max('id');
      $idLaudoOX2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX2)->value('id');
      $statusOX2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX2)->value('status_id');

      $tag_pintura_OX1 = "TR 72 500 510 326 000 - 000001";
      $idAtividadeOX1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX1)->value('id');
      $idAnaliseOX1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX1)->max('id');
      $idLaudoOX1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX1)->value('id');
      $statusOX1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX1)->value('status_id');

      $tag_pintura_OX24 = "TR 72 500 510 326 016 - 000006";
      $idAtividadeOX24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX24)->value('id');
      $idAnaliseOX24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX24)->max('id');
      $idLaudoOX24 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX24)->value('id');
      $statusOX24 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX24)->value('status_id');

      $tag_pintura_OX27 = "TR 72 500 510 326 022 - 000002";
      $idAtividadeOX27 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX27)->value('id');
      $idAnaliseOX27 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX27)->max('id');
      $idLaudoOX27 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX27)->value('id');
      $statusOX27 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX27)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_pintura_oxidizer')
      ->with('idLaudoOX1', $idLaudoOX1)->with('statusOX1', $statusOX1)->with('idLaudoOX2', $idLaudoOX2)->with('statusOX2', $statusOX2)
      ->with('idLaudoOX3', $idLaudoOX3)->with('statusOX3', $statusOX3)->with('idLaudoOX4', $idLaudoOX4)->with('statusOX4', $statusOX4)
      ->with('idLaudoOX5', $idLaudoOX5)->with('statusOX5', $statusOX5)->with('idLaudoOX6', $idLaudoOX6)->with('statusOX6', $statusOX6)
      ->with('idLaudoOX7', $idLaudoOX7)->with('statusOX7', $statusOX7)->with('idLaudoOX8', $idLaudoOX8)->with('statusOX8', $statusOX8)
      ->with('idLaudoOX9', $idLaudoOX9)->with('statusOX9', $statusOX9)->with('idLaudoOX10', $idLaudoOX10)->with('statusOX10', $statusOX10)
      ->with('idLaudoOX11', $idLaudoOX11)->with('statusOX11', $statusOX11)->with('idLaudoOX12', $idLaudoOX12)->with('statusOX12', $statusOX12)
      ->with('idLaudoOX13', $idLaudoOX13)->with('statusOX13', $statusOX13)->with('idLaudoOX14', $idLaudoOX14)->with('statusOX14', $statusOX14)
      ->with('idLaudoOX15', $idLaudoOX15)->with('statusOX15', $statusOX15)->with('idLaudoOX16', $idLaudoOX16)->with('statusOX16', $statusOX16)
      ->with('idLaudoOX17', $idLaudoOX17)->with('statusOX17', $statusOX17)->with('idLaudoOX18', $idLaudoOX18)->with('statusOX18', $statusOX18)
      ->with('idLaudoOX19', $idLaudoOX19)->with('statusOX19', $statusOX19)->with('idLaudoOX20', $idLaudoOX20)->with('statusOX20', $statusOX20)
      ->with('idLaudoOX21', $idLaudoOX21)->with('statusOX21', $statusOX21)->with('idLaudoOX22', $idLaudoOX22)->with('statusOX22', $statusOX22)
      ->with('idLaudoOX23', $idLaudoOX23)->with('statusOX23', $statusOX23)->with('idLaudoOX24', $idLaudoOX24)->with('statusOX24', $statusOX24)
      ->with('idLaudoOX25', $idLaudoOX25)->with('statusOX25', $statusOX25)->with('idLaudoOX26', $idLaudoOX26)->with('statusOX26', $statusOX26)
      ->with('idLaudoOX27', $idLaudoOX27)->with('statusOX27', $statusOX27)->with('idLaudoOX28', $idLaudoOX28)->with('statusOX28', $statusOX28)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }

    public function pintura_oxidizer_tubulacao() {

      $tag_pintura_OX35 = "TR 72 500 510 326 022 - 000010";
      $idAtividadeOX35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX35)->value('id');
      $idAnaliseOX35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX35)->max('id');
      $idLaudoOX35 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX35)->value('id');
      $statusOX35 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX35)->value('status_id');

      $tag_pintura_OX36 = "TR 72 500 510 326 022 - 000011";
      $idAtividadeOX36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX36)->value('id');
      $idAnaliseOX36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX36)->max('id');
      $idLaudoOX36 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX36)->value('id');
      $statusOX36 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX36)->value('status_id');

      $tag_pintura_OX37 = "TR 72 500 510 326 022 - 000012";
      $idAtividadeOX37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX37)->value('id');
      $idAnaliseOX37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX37)->max('id');
      $idLaudoOX37 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX37)->value('id');
      $statusOX37 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX37)->value('status_id');

      $tag_pintura_OX38 = "TR 72 500 510 326 022 - 000013";
      $idAtividadeOX38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX38)->value('id');
      $idAnaliseOX38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX38)->max('id');
      $idLaudoOX38 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX38)->value('id');
      $statusOX38 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX38)->value('status_id');

      $tag_pintura_OX39 = "TR 72 500 510 326 022 - 000014";
      $idAtividadeOX39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX39)->value('id');
      $idAnaliseOX39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX39)->max('id');
      $idLaudoOX39 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX39)->value('id');
      $statusOX39 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX39)->value('status_id');

      $tag_pintura_OX40 = "TR 72 500 510 326 022 - 000015";
      $idAtividadeOX40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX40)->value('id');
      $idAnaliseOX40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX40)->max('id');
      $idLaudoOX40 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX40)->value('id');
      $statusOX40 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX40)->value('status_id');

      $tag_pintura_OX41 = "TR 72 500 510 326 022 - 000016";
      $idAtividadeOX41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX41)->value('id');
      $idAnaliseOX41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX41)->max('id');
      $idLaudoOX41 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX41)->value('id');
      $statusOX41 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX41)->value('status_id');

      $tag_pintura_OX42 = "TR 72 500 510 326 022 - 000017";
      $idAtividadeOX42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX42)->value('id');
      $idAnaliseOX42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX42)->max('id');
      $idLaudoOX42 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX42)->value('id');
      $statusOX42 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX42)->value('status_id');

      $tag_pintura_OX34 = "TR 72 500 510 326 022 - 000009";
      $idAtividadeOX34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX34)->value('id');
      $idAnaliseOX34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX34)->max('id');
      $idLaudoOX34 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX34)->value('id');
      $statusOX34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX34)->value('status_id');

      $tag_pintura_OX33 = "TR 72 500 510 326 022 - 000008";
      $idAtividadeOX33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX33)->value('id');
      $idAnaliseOX33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX33)->max('id');
      $idLaudoOX33 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX33)->value('id');
      $statusOX33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX33)->value('status_id');

      $tag_pintura_OX32 = "TR 72 500 510 326 022 - 000007";
      $idAtividadeOX32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX32)->value('id');
      $idAnaliseOX32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX32)->max('id');
      $idLaudoOX32 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX32)->value('id');
      $statusOX32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX32)->value('status_id');

      $tag_pintura_OX31 = "TR 72 500 510 326 022 - 000006";
      $idAtividadeOX31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX31)->value('id');
      $idAnaliseOX31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX31)->max('id');
      $idLaudoOX31 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX31)->value('id');
      $statusOX31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX31)->value('status_id');

      $tag_pintura_OX30 = "TR 72 500 510 326 022 - 000005";
      $idAtividadeOX30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX30)->value('id');
      $idAnaliseOX30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX30)->max('id');
      $idLaudoOX30 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX30)->value('id');
      $statusOX30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX30)->value('status_id');

      $tag_pintura_OX29 = "TR 72 500 510 326 022 - 000004";
      $idAtividadeOX29 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_OX29)->value('id');
      $idAnaliseOX29 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOX29)->max('id');
      $idLaudoOX29 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOX29)->value('id');
      $statusOX29 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOX29)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_pintura_oxidizer_tubulacao')
      ->with('idLaudoOX29', $idLaudoOX29)->with('statusOX29', $statusOX29)->with('idLaudoOX30', $idLaudoOX30)->with('statusOX30', $statusOX30)
      ->with('idLaudoOX31', $idLaudoOX31)->with('statusOX31', $statusOX31)->with('idLaudoOX32', $idLaudoOX32)->with('statusOX32', $statusOX32)
      ->with('idLaudoOX33', $idLaudoOX33)->with('statusOX33', $statusOX33)->with('idLaudoOX34', $idLaudoOX34)->with('statusOX34', $statusOX34)
      ->with('idLaudoOX35', $idLaudoOX35)->with('statusOX35', $statusOX35)->with('idLaudoOX36', $idLaudoOX36)->with('statusOX36', $statusOX36)
      ->with('idLaudoOX37', $idLaudoOX37)->with('statusOX37', $statusOX37)->with('idLaudoOX38', $idLaudoOX38)->with('statusOX38', $statusOX38)
      ->with('idLaudoOX39', $idLaudoOX39)->with('statusOX39', $statusOX39)->with('idLaudoOX40', $idLaudoOX40)->with('statusOX40', $statusOX40)
      ->with('idLaudoOX41', $idLaudoOX41)->with('statusOX41', $statusOX41)->with('idLaudoOX42', $idLaudoOX42)->with('statusOX42', $statusOX42)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }

    public function pintura_estufa_prime() {

      $tag_pintura_ESTP51 = "TR 72 500 510 172 004 - 000051";
      $idAtividadeESTP51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP51)->value('id');
      $idAnaliseESTP51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP51)->max('id');
      $idLaudoESTP51 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP51)->value('id');
      $statusESTP51 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP51)->value('status_id');

      $tag_pintura_ESTP37 = "TR 72 500 510 172 004 - 000037";
      $idAtividadeESTP37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP37)->value('id');
      $idAnaliseESTP37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP37)->max('id');
      $idLaudoESTP37 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP37)->value('id');
      $statusESTP37 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP37)->value('status_id');

      $tag_pintura_ESTP23 = "TR 72 500 510 172 004 - 000023";
      $idAtividadeESTP23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP23)->value('id');
      $idAnaliseESTP23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP23)->max('id');
      $idLaudoESTP23 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP23)->value('id');
      $statusESTP23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP23)->value('status_id');

      $tag_pintura_ESTP8 = "TR 72 500 510 172 004 - 000008";
      $idAtividadeESTP8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP8)->value('id');
      $idAnaliseESTP8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP8)->max('id');
      $idLaudoESTP8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP8)->value('id');
      $statusESTP8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP8)->value('status_id');

      $tag_pintura_ESTP58 = "TR 72 500 510 172 004 - 000058";
      $idAtividadeESTP58 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP58)->value('id');
      $idAnaliseESTP58 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP58)->max('id');
      $idLaudoESTP58 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP58)->value('id');
      $statusESTP58 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP58)->value('status_id');

      $tag_pintura_ESTP55 = "TR 72 500 510 172 004 - 000055";
      $idAtividadeESTP55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP55)->value('id');
      $idAnaliseESTP55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP55)->max('id');
      $idLaudoESTP55 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP55)->value('id');
      $statusESTP55 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP55)->value('status_id');

      $tag_pintura_ESTP45 = "TR 72 500 510 172 004 - 000045";
      $idAtividadeESTP45 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP45)->value('id');
      $idAnaliseESTP45 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP45)->max('id');
      $idLaudoESTP45 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP45)->value('id');
      $statusESTP45 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP45)->value('status_id');

      $tag_pintura_ESTP41 = "TR 72 500 510 172 004 - 000041";
      $idAtividadeESTP41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP41)->value('id');
      $idAnaliseESTP41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP41)->max('id');
      $idLaudoESTP41 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP41)->value('id');
      $statusESTP41 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP41)->value('status_id');

      $tag_pintura_ESTP31 = "TR 72 500 510 172 004 - 000031";
      $idAtividadeESTP31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP31)->value('id');
      $idAnaliseESTP31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP31)->max('id');
      $idLaudoESTP31 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP31)->value('id');
      $statusESTP31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP31)->value('status_id');

      $tag_pintura_ESTP27 = "TR 72 500 510 172 004 - 000027";
      $idAtividadeESTP27 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP27)->value('id');
      $idAnaliseESTP27 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP27)->max('id');
      $idLaudoESTP27 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP27)->value('id');
      $statusESTP27 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP27)->value('status_id');

      $tag_pintura_ESTP17 = "TR 72 500 510 172 004 - 000017";
      $idAtividadeESTP17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP17)->value('id');
      $idAnaliseESTP17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP17)->max('id');
      $idLaudoESTP17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP17)->value('id');
      $statusESTP17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP17)->value('status_id');

      $tag_pintura_ESTP3 = "TR 72 500 510 172 004 - 000003";
      $idAtividadeESTP3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP3)->value('id');
      $idAnaliseESTP3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP3)->max('id');
      $idLaudoESTP3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP3)->value('id');
      $statusESTP3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP3)->value('status_id');

      $tag_pintura_ESTP15 = "TR 72 500 510 172 004 - 000015";
      $idAtividadeESTP15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP15)->value('id');
      $idAnaliseESTP15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP15)->max('id');
      $idLaudoESTP15 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP15)->value('id');
      $statusESTP15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP15)->value('status_id');

      $tag_pintura_ESTP13 = "TR 72 500 510 172 004 - 000013";
      $idAtividadeESTP13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP13)->value('id');
      $idAnaliseESTP13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP13)->max('id');
      $idLaudoESTP13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP13)->value('id');
      $statusESTP13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP13)->value('status_id');

      $tag_pintura_ESTP56 = "TR 72 500 510 172 004 - 000056";
      $idAtividadeESTP56 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP56)->value('id');
      $idAnaliseESTP56 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP56)->max('id');
      $idLaudoESTP56 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP56)->value('id');
      $statusESTP56 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP56)->value('status_id');

      $tag_pintura_ESTP46 = "TR 72 500 510 172 004 - 000046";
      $idAtividadeESTP46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP46)->value('id');
      $idAnaliseESTP46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP46)->max('id');
      $idLaudoESTP46 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP46)->value('id');
      $statusESTP46 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP46)->value('status_id');

      $tag_pintura_ESTP42 = "TR 72 500 510 172 004 - 000042";
      $idAtividadeESTP42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP42)->value('id');
      $idAnaliseESTP42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP42)->max('id');
      $idLaudoESTP42 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP42)->value('id');
      $statusESTP42 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP42)->value('status_id');

      $tag_pintura_ESTP32 = "TR 72 500 510 172 004 - 000032";
      $idAtividadeESTP32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP32)->value('id');
      $idAnaliseESTP32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP32)->max('id');
      $idLaudoESTP32 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP32)->value('id');
      $statusESTP32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP32)->value('status_id');

      $tag_pintura_ESTP28 = "TR 72 500 510 172 004 - 000028";
      $idAtividadeESTP28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP28)->value('id');
      $idAnaliseESTP28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP28)->max('id');
      $idLaudoESTP28 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP28)->value('id');
      $statusESTP28 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP28)->value('status_id');

      $tag_pintura_ESTP18 = "TR 72 500 510 172 004 - 000018";
      $idAtividadeESTP18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP18)->value('id');
      $idAnaliseESTP18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP18)->max('id');
      $idLaudoESTP18 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP18)->value('id');
      $statusESTP18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP18)->value('status_id');

      $tag_pintura_ESTP12 = "TR 72 500 510 172 004 - 000012";
      $idAtividadeESTP12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP12)->value('id');
      $idAnaliseESTP12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP12)->max('id');
      $idLaudoESTP12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP12)->value('id');
      $statusESTP12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP12)->value('status_id');

      $tag_pintura_ESTP4 = "TR 72 500 510 172 004 - 000004";
      $idAtividadeESTP4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP4)->value('id');
      $idAnaliseESTP4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP4)->max('id');
      $idLaudoESTP4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP4)->value('id');
      $statusESTP4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP4)->value('status_id');

      $tag_pintura_ESTP57 = "TR 72 500 510 172 004 - 000057";
      $idAtividadeESTP57 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP57)->value('id');
      $idAnaliseESTP57 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP57)->max('id');
      $idLaudoESTP57 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP57)->value('id');
      $statusESTP57 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP57)->value('status_id');

      $tag_pintura_ESTP44 = "TR 72 500 510 172 004 - 000044";
      $idAtividadeESTP44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP44)->value('id');
      $idAnaliseESTP44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP44)->max('id');
      $idLaudoESTP44 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP44)->value('id');
      $statusESTP44 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP44)->value('status_id');

      $tag_pintura_ESTP43 = "TR 72 500 510 172 004 - 000043";
      $idAtividadeESTP43 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP43)->value('id');
      $idAnaliseESTP43 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP43)->max('id');
      $idLaudoESTP43 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP43)->value('id');
      $statusESTP43 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP43)->value('status_id');

      $tag_pintura_ESTP30 = "TR 72 500 510 172 004 - 000030";
      $idAtividadeESTP30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP30)->value('id');
      $idAnaliseESTP30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP30)->max('id');
      $idLaudoESTP30 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP30)->value('id');
      $statusESTP30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP30)->value('status_id');

      $tag_pintura_ESTP29 = "TR 72 500 510 172 004 - 000029";
      $idAtividadeESTP29 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP29)->value('id');
      $idAnaliseESTP29 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP29)->max('id');
      $idLaudoESTP29 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP29)->value('id');
      $statusESTP29 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP29)->value('status_id');

      $tag_pintura_ESTP16 = "TR 72 500 510 172 004 - 000016";
      $idAtividadeESTP16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP16)->value('id');
      $idAnaliseESTP16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP16)->max('id');
      $idLaudoESTP16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP16)->value('id');
      $statusESTP16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP16)->value('status_id');

      $tag_pintura_ESTP14 = "TR 72 500 510 172 004 - 000014";
      $idAtividadeESTP14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP14)->value('id');
      $idAnaliseESTP14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP14)->max('id');
      $idLaudoESTP14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP14)->value('id');
      $statusESTP14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP14)->value('status_id');

      $tag_pintura_ESTP1 = "TR 72 500 510 172 004 - 000001";
      $idAtividadeESTP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP1)->value('id');
      $idAnaliseESTP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP1)->max('id');
      $idLaudoESTP1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP1)->value('id');
      $statusESTP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP1)->value('status_id');

      $tag_pintura_ESTP54 = "TR 72 500 510 172 004 - 000054";
      $idAtividadeESTP54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP54)->value('id');
      $idAnaliseESTP54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP54)->max('id');
      $idLaudoESTP54 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP54)->value('id');
      $statusESTP54 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP54)->value('status_id');

      $tag_pintura_ESTP52 = "TR 72 500 510 172 004 - 000052";
      $idAtividadeESTP52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP52)->value('id');
      $idAnaliseESTP52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP52)->max('id');
      $idLaudoESTP52 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP52)->value('id');
      $statusESTP52 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP52)->value('status_id');

      $tag_pintura_ESTP48 = "TR 72 500 510 172 004 - 000048";
      $idAtividadeESTP48 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP48)->value('id');
      $idAnaliseESTP48 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP48)->max('id');
      $idLaudoESTP48 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP48)->value('id');
      $statusESTP48 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP48)->value('status_id');

      $tag_pintura_ESTP47 = "TR 72 500 510 172 004 - 000047";
      $idAtividadeESTP47 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP47)->value('id');
      $idAnaliseESTP47 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP47)->max('id');
      $idLaudoESTP47 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP47)->value('id');
      $statusESTP47 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP47)->value('status_id');

      $tag_pintura_ESTP40 = "TR 72 500 510 172 004 - 000040";
      $idAtividadeESTP40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP40)->value('id');
      $idAnaliseESTP40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP40)->max('id');
      $idLaudoESTP40 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP40)->value('id');
      $statusESTP40 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP40)->value('status_id');

      $tag_pintura_ESTP38 = "TR 72 500 510 172 004 - 000038";
      $idAtividadeESTP38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP38)->value('id');
      $idAnaliseESTP38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP38)->max('id');
      $idLaudoESTP38 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP38)->value('id');
      $statusESTP38 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP38)->value('status_id');

      $tag_pintura_ESTP34 = "TR 72 500 510 172 004 - 000034";
      $idAtividadeESTP34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP34)->value('id');
      $idAnaliseESTP34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP34)->max('id');
      $idLaudoESTP34 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP34)->value('id');
      $statusESTP34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP34)->value('status_id');

      $tag_pintura_ESTP33 = "TR 72 500 510 172 004 - 000033";
      $idAtividadeESTP33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP33)->value('id');
      $idAnaliseESTP33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP33)->max('id');
      $idLaudoESTP33 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP33)->value('id');
      $statusESTP33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP33)->value('status_id');

      $tag_pintura_ESTP26 = "TR 72 500 510 172 004 - 000026";
      $idAtividadeESTP26 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP26)->value('id');
      $idAnaliseESTP26 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP26)->max('id');
      $idLaudoESTP26 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP26)->value('id');
      $statusESTP26 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP26)->value('status_id');

      $tag_pintura_ESTP24 = "TR 72 500 510 172 004 - 000024";
      $idAtividadeESTP24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP24)->value('id');
      $idAnaliseESTP24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP24)->max('id');
      $idLaudoESTP24 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP24)->value('id');
      $statusESTP24 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP24)->value('status_id');

      $tag_pintura_ESTP20 = "TR 72 500 510 172 004 - 000020";
      $idAtividadeESTP20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP20)->value('id');
      $idAnaliseESTP20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP20)->max('id');
      $idLaudoESTP20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP20)->value('id');
      $statusESTP20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP20)->value('status_id');

      $tag_pintura_ESTP19 = "TR 72 500 510 172 004 - 000019";
      $idAtividadeESTP19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP19)->value('id');
      $idAnaliseESTP19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP19)->max('id');
      $idLaudoESTP19 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP19)->value('id');
      $statusESTP19 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP19)->value('status_id');

      $tag_pintura_ESTP11 = "TR 72 500 510 172 004 - 000011";
      $idAtividadeESTP11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP11)->value('id');
      $idAnaliseESTP11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP11)->max('id');
      $idLaudoESTP11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP11)->value('id');
      $statusESTP11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP11)->value('status_id');

      $tag_pintura_ESTP9 = "TR 72 500 510 172 004 - 000009";
      $idAtividadeESTP9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP9)->value('id');
      $idAnaliseESTP9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP9)->max('id');
      $idLaudoESTP9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP9)->value('id');
      $statusESTP9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP9)->value('status_id');

      $tag_pintura_ESTP5 = "TR 72 500 510 172 004 - 000005";
      $idAtividadeESTP5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP5)->value('id');
      $idAnaliseESTP5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP5)->max('id');
      $idLaudoESTP5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP5)->value('id');
      $statusESTP5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP5  )->value('status_id');

      $tag_pintura_ESTP2 = "TR 72 500 510 172 004 - 000002";
      $idAtividadeESTP2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP2)->value('id');
      $idAnaliseESTP2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP2)->max('id');
      $idLaudoESTP2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP2)->value('id');
      $statusESTP2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP2)->value('status_id');

      $tag_pintura_ESTP53 = "TR 72 500 510 172 004 - 000053";
      $idAtividadeESTP53 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP53)->value('id');
      $idAnaliseESTP53 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP53)->max('id');
      $idLaudoESTP53 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP53)->value('id');
      $statusESTP53 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP53)->value('status_id');

      $tag_pintura_ESTP49 = "TR 72 500 510 172 004 - 000049";
      $idAtividadeESTP49 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP49)->value('id');
      $idAnaliseESTP49 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP49)->max('id');
      $idLaudoESTP49 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP49)->value('id');
      $statusESTP49 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP49)->value('status_id');

      $tag_pintura_ESTP39 = "TR 72 500 510 172 004 - 000039";
      $idAtividadeESTP39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP39)->value('id');
      $idAnaliseESTP39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP39)->max('id');
      $idLaudoESTP39 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP39)->value('id');
      $statusESTP39 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP39)->value('status_id');

      $tag_pintura_ESTP35 = "TR 72 500 510 172 004 - 000035";
      $idAtividadeESTP35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP35)->value('id');
      $idAnaliseESTP35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP35)->max('id');
      $idLaudoESTP35 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP35)->value('id');
      $statusESTP35 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP35)->value('status_id');

      $tag_pintura_ESTP25 = "TR 72 500 510 172 004 - 000025";
      $idAtividadeESTP25 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP25)->value('id');
      $idAnaliseESTP25 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP25)->max('id');
      $idLaudoESTP25 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP25)->value('id');
      $statusESTP25 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP25)->value('status_id');

      $tag_pintura_ESTP21 = "TR 72 500 510 172 004 - 000021";
      $idAtividadeESTP21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP21)->value('id');
      $idAnaliseESTP21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP21)->max('id');
      $idLaudoESTP21 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP21)->value('id');
      $statusESTP21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP21)->value('status_id');

      $tag_pintura_ESTP10 = "TR 72 500 510 172 004 - 000010";
      $idAtividadeESTP10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP10)->value('id');
      $idAnaliseESTP10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP10)->max('id');
      $idLaudoESTP10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP10)->value('id');
      $statusESTP10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP10)->value('status_id');

      $tag_pintura_ESTP6 = "TR 72 500 510 172 004 - 000006";
      $idAtividadeESTP6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP6)->value('id');
      $idAnaliseESTP6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP6)->max('id');
      $idLaudoESTP6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP6)->value('id');
      $statusESTP6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP6)->value('status_id');

      $tag_pintura_ESTP50 = "TR 72 500 510 172 004 - 000050";
      $idAtividadeESTP50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP50)->value('id');
      $idAnaliseESTP50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP50)->max('id');
      $idLaudoESTP50 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP50)->value('id');
      $statusESTP50 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP50)->value('status_id');

      $tag_pintura_ESTP36 = "TR 72 500 510 172 004 - 000036";
      $idAtividadeESTP36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP36)->value('id');
      $idAnaliseESTP36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP36)->max('id');
      $idLaudoESTP36 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP36)->value('id');
      $statusESTP36 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP36)->value('status_id');

      $tag_pintura_ESTP22 = "TR 72 500 510 172 004 - 000022";
      $idAtividadeESTP22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP22)->value('id');
      $idAnaliseESTP22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP22)->max('id');
      $idLaudoESTP22 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP22)->value('id');
      $statusESTP22 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP22)->value('status_id');

      $tag_pintura_ESTP7 = "TR 72 500 510 172 004 - 000007";
      $idAtividadeESTP7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTP7)->value('id');
      $idAnaliseESTP7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTP7)->max('id');
      $idLaudoESTP7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTP7)->value('id');
      $statusESTP7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTP7)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_pintura_estufa_prime')
      ->with('idLaudoESTP1', $idLaudoESTP1)->with('statusESTP1', $statusESTP1)->with('idLaudoESTP2', $idLaudoESTP2)->with('statusESTP2', $statusESTP2)
      ->with('idLaudoESTP3', $idLaudoESTP3)->with('statusESTP3', $statusESTP3)->with('idLaudoESTP4', $idLaudoESTP4)->with('statusESTP4', $statusESTP4)
      ->with('idLaudoESTP5', $idLaudoESTP5)->with('statusESTP5', $statusESTP5)->with('idLaudoESTP6', $idLaudoESTP6)->with('statusESTP6', $statusESTP6)
      ->with('idLaudoESTP7', $idLaudoESTP7)->with('statusESTP7', $statusESTP7)->with('idLaudoESTP8', $idLaudoESTP8)->with('statusESTP8', $statusESTP8)
      ->with('idLaudoESTP9', $idLaudoESTP9)->with('statusESTP9', $statusESTP9)->with('idLaudoESTP10', $idLaudoESTP10)->with('statusESTP10', $statusESTP10)
      ->with('idLaudoESTP11', $idLaudoESTP11)->with('statusESTP11', $statusESTP11)->with('idLaudoESTP12', $idLaudoESTP12)->with('statusESTP12', $statusESTP12)
      ->with('idLaudoESTP13', $idLaudoESTP13)->with('statusESTP13', $statusESTP13)->with('idLaudoESTP14', $idLaudoESTP14)->with('statusESTP14', $statusESTP14)
      ->with('idLaudoESTP15', $idLaudoESTP15)->with('statusESTP15', $statusESTP15)->with('idLaudoESTP16', $idLaudoESTP16)->with('statusESTP16', $statusESTP16)
      ->with('idLaudoESTP17', $idLaudoESTP17)->with('statusESTP17', $statusESTP17)->with('idLaudoESTP18', $idLaudoESTP18)->with('statusESTP18', $statusESTP18)
      ->with('idLaudoESTP19', $idLaudoESTP19)->with('statusESTP19', $statusESTP19)->with('idLaudoESTP20', $idLaudoESTP20)->with('statusESTP20', $statusESTP20)
      ->with('idLaudoESTP21', $idLaudoESTP21)->with('statusESTP21', $statusESTP21)->with('idLaudoESTP22', $idLaudoESTP22)->with('statusESTP22', $statusESTP22)
      ->with('idLaudoESTP23', $idLaudoESTP23)->with('statusESTP23', $statusESTP23)->with('idLaudoESTP24', $idLaudoESTP24)->with('statusESTP24', $statusESTP24)
      ->with('idLaudoESTP25', $idLaudoESTP25)->with('statusESTP25', $statusESTP25)->with('idLaudoESTP26', $idLaudoESTP26)->with('statusESTP26', $statusESTP26)
      ->with('idLaudoESTP27', $idLaudoESTP27)->with('statusESTP27', $statusESTP27)->with('idLaudoESTP28', $idLaudoESTP28)->with('statusESTP28', $statusESTP28)
      ->with('idLaudoESTP29', $idLaudoESTP29)->with('statusESTP29', $statusESTP29)->with('idLaudoESTP30', $idLaudoESTP30)->with('statusESTP30', $statusESTP30)
      ->with('idLaudoESTP31', $idLaudoESTP31)->with('statusESTP31', $statusESTP31)->with('idLaudoESTP32', $idLaudoESTP32)->with('statusESTP32', $statusESTP32)
      ->with('idLaudoESTP33', $idLaudoESTP33)->with('statusESTP33', $statusESTP33)->with('idLaudoESTP34', $idLaudoESTP34)->with('statusESTP34', $statusESTP34)
      ->with('idLaudoESTP35', $idLaudoESTP35)->with('statusESTP35', $statusESTP35)->with('idLaudoESTP36', $idLaudoESTP36)->with('statusESTP36', $statusESTP36)
      ->with('idLaudoESTP37', $idLaudoESTP37)->with('statusESTP37', $statusESTP37)->with('idLaudoESTP38', $idLaudoESTP38)->with('statusESTP38', $statusESTP38)
      ->with('idLaudoESTP39', $idLaudoESTP39)->with('statusESTP39', $statusESTP39)->with('idLaudoESTP40', $idLaudoESTP40)->with('statusESTP40', $statusESTP40)
      ->with('idLaudoESTP41', $idLaudoESTP41)->with('statusESTP41', $statusESTP41)->with('idLaudoESTP42', $idLaudoESTP42)->with('statusESTP42', $statusESTP42)
      ->with('idLaudoESTP43', $idLaudoESTP43)->with('statusESTP43', $statusESTP43)->with('idLaudoESTP44', $idLaudoESTP44)->with('statusESTP44', $statusESTP44)
      ->with('idLaudoESTP45', $idLaudoESTP45)->with('statusESTP45', $statusESTP45)->with('idLaudoESTP46', $idLaudoESTP46)->with('statusESTP46', $statusESTP46)
      ->with('idLaudoESTP47', $idLaudoESTP47)->with('statusESTP47', $statusESTP47)->with('idLaudoESTP48', $idLaudoESTP48)->with('statusESTP48', $statusESTP48)
      ->with('idLaudoESTP49', $idLaudoESTP49)->with('statusESTP49', $statusESTP49)->with('idLaudoESTP50', $idLaudoESTP50)->with('statusESTP50', $statusESTP50)
      ->with('idLaudoESTP51', $idLaudoESTP51)->with('statusESTP51', $statusESTP51)->with('idLaudoESTP52', $idLaudoESTP52)->with('statusESTP52', $statusESTP52)
      ->with('idLaudoESTP53', $idLaudoESTP53)->with('statusESTP53', $statusESTP53)->with('idLaudoESTP54', $idLaudoESTP54)->with('statusESTP54', $statusESTP54)
      ->with('idLaudoESTP55', $idLaudoESTP55)->with('statusESTP55', $statusESTP55)->with('idLaudoESTP56', $idLaudoESTP56)->with('statusESTP56', $statusESTP56)
      ->with('idLaudoESTP57', $idLaudoESTP57)->with('statusESTP57', $statusESTP57)->with('idLaudoESTP58', $idLaudoESTP58)->with('statusESTP58', $statusESTP58)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }

    public function pintura_estufa_finish() {

      $tag_pintura_ESTF109 = "TR 72 500 510 218 007 - 000051";
      $idAtividadeESTF109 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF109)->value('id');
      $idAnaliseESTF109 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF109)->max('id');
      $idLaudoESTF109 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF109)->value('id');
      $statusESTF109 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF109)->value('status_id');

      $tag_pintura_ESTF95 = "TR 72 500 510 218 007 - 000037";
      $idAtividadeESTF95 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF95)->value('id');
      $idAnaliseESTF95 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF95)->max('id');
      $idLaudoESTF95 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF95)->value('id');
      $statusESTF95 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF95)->value('status_id');

      $tag_pintura_ESTF81 = "TR 72 500 510 218 007 - 000023";
      $idAtividadeESTF81 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF81)->value('id');
      $idAnaliseESTF81 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF81)->max('id');
      $idLaudoESTF81 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF81)->value('id');
      $statusESTF81 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF81)->value('status_id');

      $tag_pintura_ESTF66 = "TR 72 500 510 218 007 - 000008";
      $idAtividadeESTF66 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF66)->value('id');
      $idAnaliseESTF66 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF66)->max('id');
      $idLaudoESTF66 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF66)->value('id');
      $statusESTF66 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF66)->value('status_id');

      $tag_pintura_ESTF116 = "TR 72 500 510 218 007 - 000058";
      $idAtividadeESTF116 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF116)->value('id');
      $idAnaliseESTF116 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF116)->max('id');
      $idLaudoESTF116 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF116)->value('id');
      $statusESTF116 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF116)->value('status_id');

      $tag_pintura_ESTF113 = "TR 72 500 510 218 007 - 000055";
      $idAtividadeESTF113 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF113)->value('id');
      $idAnaliseESTF113 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF113)->max('id');
      $idLaudoESTF113 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF113)->value('id');
      $statusESTF113 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF113)->value('status_id');

      $tag_pintura_ESTF103 = "TR 72 500 510 218 007 - 000045";
      $idAtividadeESTF103 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF103)->value('id');
      $idAnaliseESTF103 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF103)->max('id');
      $idLaudoESTF103 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF103)->value('id');
      $statusESTF103 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF103)->value('status_id');

      $tag_pintura_ESTF99 = "TR 72 500 510 218 007 - 000041";
      $idAtividadeESTF99 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF99)->value('id');
      $idAnaliseESTF99 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF99)->max('id');
      $idLaudoESTF99 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF99)->value('id');
      $statusESTF99 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF99)->value('status_id');

      $tag_pintura_ESTF89 = "TR 72 500 510 218 007 - 000031";
      $idAtividadeESTF89 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF89)->value('id');
      $idAnaliseESTF89 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF89)->max('id');
      $idLaudoESTF89 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF89)->value('id');
      $statusESTF89 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF89)->value('status_id');

      $tag_pintura_ESTF85 = "TR 72 500 510 218 007 - 000027";
      $idAtividadeESTF85 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF85)->value('id');
      $idAnaliseESTF85 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF85)->max('id');
      $idLaudoESTF85 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF85)->value('id');
      $statusESTF85 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF85)->value('status_id');

      $tag_pintura_ESTF75 = "TR 72 500 510 218 007 - 000017";
      $idAtividadeESTF75 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF75)->value('id');
      $idAnaliseESTF75 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF75)->max('id');
      $idLaudoESTF75 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF75)->value('id');
      $statusESTF75 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF75)->value('status_id');

      $tag_pintura_ESTF61 = "TR 72 500 510 218 007 - 000003";
      $idAtividadeESTF61 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF61)->value('id');
      $idAnaliseESTF61 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF61)->max('id');
      $idLaudoESTF61 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF61)->value('id');
      $statusESTF61 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF61)->value('status_id');

      //73
      $tag_pintura_ESTF73 = "TR 72 500 510 218 007 - 000015";
      $idAtividadeESTF73 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF73)->value('id');
      $idAnaliseESTF73 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF73)->max('id');
      $idLaudoESTF73 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF73)->value('id');
      $statusESTF73 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF73)->value('status_id');

      //71
      $tag_pintura_ESTF71 = "TR 72 500 510 218 007 - 000013";
      $idAtividadeESTF71 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF71)->value('id');
      $idAnaliseESTF71 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF71)->max('id');
      $idLaudoESTF71 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF71)->value('id');
      $statusESTF71 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF71)->value('status_id');

      //114
      $tag_pintura_ESTF114 = "TR 72 500 510 218 007 - 000056";
      $idAtividadeESTF114 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF114)->value('id');
      $idAnaliseESTF114 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF114)->max('id');
      $idLaudoESTF114 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF114)->value('id');
      $statusESTF114 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF114)->value('status_id');

      //104
      $tag_pintura_ESTF104 = "TR 72 500 510 218 007 - 000046";
      $idAtividadeESTF104 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF104)->value('id');
      $idAnaliseESTF104 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF104)->max('id');
      $idLaudoESTF104 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF104)->value('id');
      $statusESTF104 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF104)->value('status_id');

      //100
      $tag_pintura_ESTF100 = "TR 72 500 510 218 007 - 000042";
      $idAtividadeESTF100 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF100)->value('id');
      $idAnaliseESTF100 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF100)->max('id');
      $idLaudoESTF100 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF100)->value('id');
      $statusESTF100 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF100)->value('status_id');

      //90
      $tag_pintura_ESTF90 = "TR 72 500 510 218 007 - 000032";
      $idAtividadeESTF90 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF90)->value('id');
      $idAnaliseESTF90 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF90)->max('id');
      $idLaudoESTF90 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF90)->value('id');
      $statusESTF90 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF90)->value('status_id');

      //86
      $tag_pintura_ESTF86 = "TR 72 500 510 218 007 - 000028";
      $idAtividadeESTF86 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF86)->value('id');
      $idAnaliseESTF86 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF86)->max('id');
      $idLaudoESTF86 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF86)->value('id');
      $statusESTF86 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF86)->value('status_id');

      //76
      $tag_pintura_ESTF76 = "TR 72 500 510 218 007 - 000018";
      $idAtividadeESTF76 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF76)->value('id');
      $idAnaliseESTF76 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF76)->max('id');
      $idLaudoESTF76 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF76)->value('id');
      $statusESTF76 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF76)->value('status_id');

      //70
      $tag_pintura_ESTF70 = "TR 72 500 510 218 007 - 000012";
      $idAtividadeESTF70 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF70)->value('id');
      $idAnaliseESTF70 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF70)->max('id');
      $idLaudoESTF70 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF70)->value('id');
      $statusESTF70 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF70)->value('status_id');

      //62
      $tag_pintura_ESTF62 = "TR 72 500 510 218 007 - 000004";
      $idAtividadeESTF62 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF62)->value('id');
      $idAnaliseESTF62 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF62)->max('id');
      $idLaudoESTF62 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF62)->value('id');
      $statusESTF62 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF62)->value('status_id');

      //115
      $tag_pintura_ESTF115 = "TR 72 500 510 218 007 - 000057";
      $idAtividadeESTF115 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF115)->value('id');
      $idAnaliseESTF115 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF115)->max('id');
      $idLaudoESTF115 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF115)->value('id');
      $statusESTF115 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF115)->value('status_id');

      //102
      $tag_pintura_ESTF102 = "TR 72 500 510 218 007 - 000044";
      $idAtividadeESTF102 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF102)->value('id');
      $idAnaliseESTF102 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF102)->max('id');
      $idLaudoESTF102 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF102)->value('id');
      $statusESTF102 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF102)->value('status_id');

      //101
      $tag_pintura_ESTF101 = "TR 72 500 510 218 007 - 000043";
      $idAtividadeESTF101 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF101)->value('id');
      $idAnaliseESTF101 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF101)->max('id');
      $idLaudoESTF101 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF101)->value('id');
      $statusESTF101 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF101)->value('status_id');

      //88
      $tag_pintura_ESTF88 = "TR 72 500 510 218 007 - 000030";
      $idAtividadeESTF88 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF88)->value('id');
      $idAnaliseESTF88 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF88)->max('id');
      $idLaudoESTF88 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF88)->value('id');
      $statusESTF88 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF88)->value('status_id');

      //87
      $tag_pintura_ESTF87 = "TR 72 500 510 218 007 - 000029";
      $idAtividadeESTF87 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF87)->value('id');
      $idAnaliseESTF87 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF87)->max('id');
      $idLaudoESTF87 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF87)->value('id');
      $statusESTF87 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF87)->value('status_id');

      //74
      $tag_pintura_ESTF74 = "TR 72 500 510 218 007 - 000016";
      $idAtividadeESTF74 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF74)->value('id');
      $idAnaliseESTF74 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF74)->max('id');
      $idLaudoESTF74 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF74)->value('id');
      $statusESTF74 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF74)->value('status_id');

      //72
      $tag_pintura_ESTF72 = "TR 72 500 510 218 007 - 000014";
      $idAtividadeESTF72 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF72)->value('id');
      $idAnaliseESTF72 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF72)->max('id');
      $idLaudoESTF72 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF72)->value('id');
      $statusESTF72 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF72)->value('status_id');

      //59
      $tag_pintura_ESTF59 = "TR 72 500 510 218 007 - 000001";
      $idAtividadeESTF59 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF59)->value('id');
      $idAnaliseESTF59 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF59)->max('id');
      $idLaudoESTF59 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF59)->value('id');
      $statusESTF59 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF59)->value('status_id');

      //112
      $tag_pintura_ESTF112 = "TR 72 500 510 218 007 - 000054";
      $idAtividadeESTF112 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF112)->value('id');
      $idAnaliseESTF112 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF112)->max('id');
      $idLaudoESTF112 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF112)->value('id');
      $statusESTF112 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF112)->value('status_id');

      //110
      $tag_pintura_ESTF110 = "TR 72 500 510 218 007 - 000052";
      $idAtividadeESTF110 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF110)->value('id');
      $idAnaliseESTF110 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF110)->max('id');
      $idLaudoESTF110 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF110)->value('id');
      $statusESTF110 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF110)->value('status_id');

      //106
      $tag_pintura_ESTF106 = "TR 72 500 510 218 007 - 000048";
      $idAtividadeESTF106 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF106)->value('id');
      $idAnaliseESTF106 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF106)->max('id');
      $idLaudoESTF106 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF106)->value('id');
      $statusESTF106 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF106)->value('status_id');

      //105
      $tag_pintura_ESTF105 = "TR 72 500 510 218 007 - 000047";
      $idAtividadeESTF105 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF105)->value('id');
      $idAnaliseESTF105 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF105)->max('id');
      $idLaudoESTF105 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF105)->value('id');
      $statusESTF105 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF105)->value('status_id');

      //98
      $tag_pintura_ESTF98 = "TR 72 500 510 218 007 - 000040";
      $idAtividadeESTF98 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF98)->value('id');
      $idAnaliseESTF98 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF98)->max('id');
      $idLaudoESTF98 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF98)->value('id');
      $statusESTF98 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF98)->value('status_id');

      //96
      $tag_pintura_ESTF96 = "TR 72 500 510 218 007 - 000038";
      $idAtividadeESTF96 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF96)->value('id');
      $idAnaliseESTF96 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF96)->max('id');
      $idLaudoESTF96 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF96)->value('id');
      $statusESTF96 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF96)->value('status_id');

      //92
      $tag_pintura_ESTF92 = "TR 72 500 510 218 007 - 000034";
      $idAtividadeESTF92 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF92)->value('id');
      $idAnaliseESTF92 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF92)->max('id');
      $idLaudoESTF92 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF92)->value('id');
      $statusESTF92 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF92)->value('status_id');

      //91
      $tag_pintura_ESTF91 = "TR 72 500 510 218 007 - 000033";
      $idAtividadeESTF91 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF91)->value('id');
      $idAnaliseESTF91 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF91)->max('id');
      $idLaudoESTF91 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF91)->value('id');
      $statusESTF91 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF91)->value('status_id');

      //84
      $tag_pintura_ESTF84 = "TR 72 500 510 218 007 - 000026";
      $idAtividadeESTF84 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF84)->value('id');
      $idAnaliseESTF84 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF84)->max('id');
      $idLaudoESTF84 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF84)->value('id');
      $statusESTF84 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF84)->value('status_id');

      //82
      $tag_pintura_ESTF82 = "TR 72 500 510 218 007 - 000024";
      $idAtividadeESTF82 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF82)->value('id');
      $idAnaliseESTF82 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF82)->max('id');
      $idLaudoESTF82 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF82)->value('id');
      $statusESTF82 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF82)->value('status_id');

      //78
      $tag_pintura_ESTF78 = "TR 72 500 510 218 007 - 000020";
      $idAtividadeESTF78 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF78)->value('id');
      $idAnaliseESTF78 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF78)->max('id');
      $idLaudoESTF78 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF78)->value('id');
      $statusESTF78 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF78)->value('status_id');

      //77
      $tag_pintura_ESTF77 = "TR 72 500 510 218 007 - 000019";
      $idAtividadeESTF77 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF77)->value('id');
      $idAnaliseESTF77 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF77)->max('id');
      $idLaudoESTF77 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF77)->value('id');
      $statusESTF77 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF77)->value('status_id');

      //69
      $tag_pintura_ESTF69 = "TR 72 500 510 218 007 - 000011";
      $idAtividadeESTF69 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF69)->value('id');
      $idAnaliseESTF69 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF69)->max('id');
      $idLaudoESTF69 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF69)->value('id');
      $statusESTF69 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF69)->value('status_id');

      //67
      $tag_pintura_ESTF67 = "TR 72 500 510 218 007 - 000009";
      $idAtividadeESTF67 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF67)->value('id');
      $idAnaliseESTF67 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF67)->max('id');
      $idLaudoESTF67 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF67)->value('id');
      $statusESTF67 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF67)->value('status_id');

      //63
      $tag_pintura_ESTF63 = "TR 72 500 510 218 007 - 000005";
      $idAtividadeESTF63 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF63)->value('id');
      $idAnaliseESTF63 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF63)->max('id');
      $idLaudoESTF63 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF63)->value('id');
      $statusESTF63 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF63)->value('status_id');

      //60
      $tag_pintura_ESTF60 = "TR 72 500 510 218 007 - 000002";
      $idAtividadeESTF60 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF60)->value('id');
      $idAnaliseESTF60 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF60)->max('id');
      $idLaudoESTF60 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF60)->value('id');
      $statusESTF60 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF60)->value('status_id');

      //111
      $tag_pintura_ESTF111 = "TR 72 500 510 218 007 - 000053";
      $idAtividadeESTF111 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF111)->value('id');
      $idAnaliseESTF111 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF111)->max('id');
      $idLaudoESTF111 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF111)->value('id');
      $statusESTF111 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF111)->value('status_id');

      //107
      $tag_pintura_ESTF107 = "TR 72 500 510 218 007 - 000049";
      $idAtividadeESTF107 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF107)->value('id');
      $idAnaliseESTF107 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF107)->max('id');
      $idLaudoESTF107 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF107)->value('id');
      $statusESTF107 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF107)->value('status_id');

      //97
      $tag_pintura_ESTF97 = "TR 72 500 510 218 007 - 000039";
      $idAtividadeESTF97 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF97)->value('id');
      $idAnaliseESTF97 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF97)->max('id');
      $idLaudoESTF97 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF97)->value('id');
      $statusESTF97 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF97)->value('status_id');

      //93
      $tag_pintura_ESTF93 = "TR 72 500 510 218 007 - 000035";
      $idAtividadeESTF93 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF93)->value('id');
      $idAnaliseESTF93 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF93)->max('id');
      $idLaudoESTF93 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF93)->value('id');
      $statusESTF93 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF93)->value('status_id');

      //83
      $tag_pintura_ESTF83 = "TR 72 500 510 218 007 - 000025";
      $idAtividadeESTF83 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF83)->value('id');
      $idAnaliseESTF83 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF83)->max('id');
      $idLaudoESTF83 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF83)->value('id');
      $statusESTF83 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF83)->value('status_id');

      //79
      $tag_pintura_ESTF79 = "TR 72 500 510 218 007 - 000021";
      $idAtividadeESTF79 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF79)->value('id');
      $idAnaliseESTF79 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF79)->max('id');
      $idLaudoESTF79 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF79)->value('id');
      $statusESTF79 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF79)->value('status_id');

      //68
      $tag_pintura_ESTF68 = "TR 72 500 510 218 007 - 000010";
      $idAtividadeESTF68 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF68)->value('id');
      $idAnaliseESTF68 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF68)->max('id');
      $idLaudoESTF68 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF68)->value('id');
      $statusESTF68 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF68)->value('status_id');

      //64
      $tag_pintura_ESTF64 = "TR 72 500 510 218 007 - 000006";
      $idAtividadeESTF64 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF64)->value('id');
      $idAnaliseESTF64 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF64)->max('id');
      $idLaudoESTF64 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF64)->value('id');
      $statusESTF64 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF64)->value('status_id');

      //108
      $tag_pintura_ESTF108 = "TR 72 500 510 218 007 - 000050";
      $idAtividadeESTF108 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF108)->value('id');
      $idAnaliseESTF108 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF108)->max('id');
      $idLaudoESTF108 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF108)->value('id');
      $statusESTF108 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF108)->value('status_id');

      //94
      $tag_pintura_ESTF94 = "TR 72 500 510 218 007 - 000036";
      $idAtividadeESTF94 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF94)->value('id');
      $idAnaliseESTF94 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF94)->max('id');
      $idLaudoESTF94 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF94)->value('id');
      $statusESTF94 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF94)->value('status_id');

      //80
      $tag_pintura_ESTF80 = "TR 72 500 510 218 007 - 000022";
      $idAtividadeESTF80 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF80)->value('id');
      $idAnaliseESTF80 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF80)->max('id');
      $idLaudoESTF80 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF80)->value('id');
      $statusESTF80 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF80)->value('status_id');

      //65
      $tag_pintura_ESTF65 = "TR 72 500 510 218 007 - 000007";
      $idAtividadeESTF65 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_pintura_ESTF65)->value('id');
      $idAnaliseESTF65 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESTF65)->max('id');
      $idLaudoESTF65 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESTF65)->value('id');
      $statusESTF65 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESTF65)->value('status_id');

      //URA
      $ura_queimadores = aux::ura_queimadores();
      $ura_menu = aux::ura_Menu();
      $ura_normal = aux::ura_normal_Menu();
      $ura_alarme = aux::ura_alarme_Menu();
      $ura_critico = aux::ura_critico_Menu();
      //LDS
      $lds_caldeira01 = aux::lds_caldeira01_Menu();
      $lds_caldeira02 = aux::lds_caldeira02_Menu();
      $lds_menu = aux::lds_Menu();
      $lds_normal = aux::lds_normal_Menu();
      $lds_alarme = aux::lds_alarme_Menu();
      $lds_critico = aux::lds_critico_Menu();
      //LGC
      $lgc_forno = aux::lgc_forno_Menu();
      $lgc_menu = aux::lgc_Menu();
      $lgc_normal = aux::lgc_normal_Menu();
      $lgc_alarme = aux::lgc_alarme_Menu();
      $lgc_critico = aux::lgc_critico_Menu();
      //LPC
      $lpc_caldeira01 = aux::lpc_caldeira01();
      $lpc_oxidizer = aux::lpc_oxidizer();
      $lpc_oxi_tubulacao = aux::lpc_oxi_tubulacao();
      $lpc_prime = aux::lpc_prime();
      $lpc_finish = aux::lpc_finish();
      $lpc_menu = aux::lpc_Menu();
      $lpc_normal = aux::lpc_normal_Menu();
      $lpc_alarme = aux::lpc_alarme_Menu();
      $lpc_critico = aux::lpc_critico_Menu();

      return view('csn.relatoriosTecnicos.termografia_isolamento_pintura_estufa_finish')
      ->with('idLaudoESTF59', $idLaudoESTF59)->with('statusESTF59', $statusESTF59)->with('idLaudoESTF60', $idLaudoESTF60)->with('statusESTF60', $statusESTF60)
      ->with('idLaudoESTF61', $idLaudoESTF61)->with('statusESTF61', $statusESTF61)->with('idLaudoESTF62', $idLaudoESTF62)->with('statusESTF62', $statusESTF62)
      ->with('idLaudoESTF63', $idLaudoESTF63)->with('statusESTF63', $statusESTF63)->with('idLaudoESTF64', $idLaudoESTF64)->with('statusESTF64', $statusESTF64)
      ->with('idLaudoESTF65', $idLaudoESTF65)->with('statusESTF65', $statusESTF65)->with('idLaudoESTF66', $idLaudoESTF66)->with('statusESTF66', $statusESTF66)
      ->with('idLaudoESTF67', $idLaudoESTF67)->with('statusESTF67', $statusESTF67)->with('idLaudoESTF68', $idLaudoESTF68)->with('statusESTF68', $statusESTF68)
      ->with('idLaudoESTF69', $idLaudoESTF69)->with('statusESTF69', $statusESTF69)->with('idLaudoESTF70', $idLaudoESTF70)->with('statusESTF70', $statusESTF70)
      ->with('idLaudoESTF71', $idLaudoESTF71)->with('statusESTF71', $statusESTF71)->with('idLaudoESTF72', $idLaudoESTF72)->with('statusESTF72', $statusESTF72)
      ->with('idLaudoESTF73', $idLaudoESTF73)->with('statusESTF73', $statusESTF73)->with('idLaudoESTF74', $idLaudoESTF74)->with('statusESTF74', $statusESTF74)
      ->with('idLaudoESTF75', $idLaudoESTF75)->with('statusESTF75', $statusESTF75)->with('idLaudoESTF76', $idLaudoESTF76)->with('statusESTF76', $statusESTF76)
      ->with('idLaudoESTF77', $idLaudoESTF77)->with('statusESTF77', $statusESTF77)->with('idLaudoESTF78', $idLaudoESTF78)->with('statusESTF78', $statusESTF78)
      ->with('idLaudoESTF79', $idLaudoESTF79)->with('statusESTF79', $statusESTF79)->with('idLaudoESTF80', $idLaudoESTF80)->with('statusESTF80', $statusESTF80)
      ->with('idLaudoESTF81', $idLaudoESTF81)->with('statusESTF81', $statusESTF81)->with('idLaudoESTF82', $idLaudoESTF82)->with('statusESTF82', $statusESTF82)
      ->with('idLaudoESTF83', $idLaudoESTF83)->with('statusESTF83', $statusESTF83)->with('idLaudoESTF84', $idLaudoESTF84)->with('statusESTF84', $statusESTF84)
      ->with('idLaudoESTF85', $idLaudoESTF85)->with('statusESTF85', $statusESTF85)->with('idLaudoESTF86', $idLaudoESTF86)->with('statusESTF86', $statusESTF86)
      ->with('idLaudoESTF87', $idLaudoESTF87)->with('statusESTF87', $statusESTF87)->with('idLaudoESTF88', $idLaudoESTF88)->with('statusESTF88', $statusESTF88)
      ->with('idLaudoESTF89', $idLaudoESTF89)->with('statusESTF89', $statusESTF89)->with('idLaudoESTF90', $idLaudoESTF90)->with('statusESTF90', $statusESTF90)
      ->with('idLaudoESTF91', $idLaudoESTF91)->with('statusESTF91', $statusESTF91)->with('idLaudoESTF92', $idLaudoESTF92)->with('statusESTF92', $statusESTF92)
      ->with('idLaudoESTF93', $idLaudoESTF93)->with('statusESTF93', $statusESTF93)->with('idLaudoESTF94', $idLaudoESTF94)->with('statusESTF94', $statusESTF94)
      ->with('idLaudoESTF95', $idLaudoESTF95)->with('statusESTF95', $statusESTF95)->with('idLaudoESTF96', $idLaudoESTF96)->with('statusESTF96', $statusESTF96)
      ->with('idLaudoESTF97', $idLaudoESTF97)->with('statusESTF97', $statusESTF97)->with('idLaudoESTF98', $idLaudoESTF98)->with('statusESTF98', $statusESTF98)
      ->with('idLaudoESTF99', $idLaudoESTF99)->with('statusESTF99', $statusESTF99)->with('idLaudoESTF100', $idLaudoESTF100)->with('statusESTF100', $statusESTF100)
      ->with('idLaudoESTF101', $idLaudoESTF101)->with('statusESTF101', $statusESTF101)->with('idLaudoESTF102', $idLaudoESTF102)->with('statusESTF102', $statusESTF102)
      ->with('idLaudoESTF103', $idLaudoESTF103)->with('statusESTF103', $statusESTF103)->with('idLaudoESTF104', $idLaudoESTF104)->with('statusESTF104', $statusESTF104)
      ->with('idLaudoESTF105', $idLaudoESTF105)->with('statusESTF105', $statusESTF105)->with('idLaudoESTF106', $idLaudoESTF106)->with('statusESTF106', $statusESTF106)
      ->with('idLaudoESTF107', $idLaudoESTF107)->with('statusESTF107', $statusESTF107)->with('idLaudoESTF108', $idLaudoESTF108)->with('statusESTF108', $statusESTF108)
      ->with('idLaudoESTF109', $idLaudoESTF109)->with('statusESTF109', $statusESTF109)->with('idLaudoESTF110', $idLaudoESTF110)->with('statusESTF110', $statusESTF110)
      ->with('idLaudoESTF111', $idLaudoESTF111)->with('statusESTF111', $statusESTF111)->with('idLaudoESTF112', $idLaudoESTF112)->with('statusESTF112', $statusESTF112)
      ->with('idLaudoESTF113', $idLaudoESTF113)->with('statusESTF113', $statusESTF113)->with('idLaudoESTF114', $idLaudoESTF114)->with('statusESTF114', $statusESTF114)
      ->with('idLaudoESTF115', $idLaudoESTF115)->with('statusESTF115', $statusESTF115)->with('idLaudoESTF116', $idLaudoESTF116)->with('statusESTF116', $statusESTF116)
      ->with('ura_queimadores', $ura_queimadores)->with('ura_menu', $ura_menu)
      ->with('ura_normal', $ura_normal)->with('ura_alarme', $ura_alarme)->with('ura_critico', $ura_critico)
      ->with('lds_caldeira01', $lds_caldeira01)->with('lds_caldeira02', $lds_caldeira02)->with('lds_menu', $lds_menu)
      ->with('lds_normal', $lds_normal)->with('lds_alarme', $lds_alarme)->with('lds_critico', $lds_critico)
      ->with('lgc_forno', $lgc_forno)->with('lgc_menu', $lgc_menu)
      ->with('lgc_normal', $lgc_normal)->with('lgc_alarme', $lgc_alarme)->with('lgc_critico', $lgc_critico)
      ->with('lpc_caldeira01', $lpc_caldeira01)->with('lpc_oxidizer', $lpc_oxidizer)->with('lpc_oxi_tubulacao', $lpc_oxi_tubulacao)->with('lpc_prime', $lpc_prime)
      ->with('lpc_finish', $lpc_finish)->with('lpc_menu', $lpc_menu)->with('lpc_normal', $lpc_normal)->with('lpc_alarme', $lpc_alarme)->with('lpc_critico', $lpc_critico);
    }
}

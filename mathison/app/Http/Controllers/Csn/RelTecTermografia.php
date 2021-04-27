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
use App\Http\Controllers\Csn\AuxFuncRelTec_TermoElet as aux;

class RelTecTermografia extends Controller {


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ura_painel_1() {
      //Equipamentos do primeiro painel de equipamentos da sala eletrica
        $tag_painel_alimentacao = "TE 72 200 240 090 000 - 000001";
        $idAtividadePA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_painel_alimentacao)->value('id');
        $idAnalisePA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePA)->max('id');
        $idLaudoPA = DB::table('laudos')->where('analise_id', '=', $idAnalisePA)->value('id');
        $statusPA = DB::table('preditiva_analises')->where('id', '=', $idAnalisePA)->value('status_id');

        $tag_soprador = "TE 72 200 240 090 000 - 000022";
        $idAtividadeSO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_soprador)->value('id');
        $idAnaliseSO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSO)->max('id');
        $idLaudoSO = DB::table('laudos')->where('analise_id', '=', $idAnaliseSO)->value('id');
        $statusSO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSO)->value('status_id');

        $tag_moedor = "TE 72 200 240 090 000 - 000024";
        $idAtividadeMO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_moedor)->value('id');
        $idAnaliseMO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMO)->max('id');
        $idLaudoMO = DB::table('laudos')->where('analise_id', '=', $idAnaliseMO)->value('id');
        $statusMO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMO)->value('status_id');

        $tag_flap = "TE 72 200 240 090 000 - 000029";
        $idAtividadeFL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_flap)->value('id');
        $idAnaliseFL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFL)->max('id');
        $idLaudoFL = DB::table('laudos')->where('analise_id', '=', $idAnaliseFL)->value('id');
        $statusFL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFL)->value('status_id');

        $tag_valvula_ciclone = "TE 72 200 240 090 000 - 000028";
        $idAtividadeVC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_valvula_ciclone)->value('id');
        $idAnaliseVC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVC)->max('id');
        $idLaudoVC = DB::table('laudos')->where('analise_id', '=', $idAnaliseVC)->value('id');
        $statusVC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVC)->value('status_id');

        $tag_valvula_reator = "TE 72 200 240 090 000 - 000023";
        $idAtividadeVR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_valvula_reator)->value('id');
        $idAnaliseVR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVR)->max('id');
        $idLaudoVR = DB::table('laudos')->where('analise_id', '=', $idAnaliseVR)->value('id');
        $statusVR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVR)->value('status_id');

        $tag_bomba_ventur = "TE 72 200 240 090 000 - 000014";
        $idAtividadeBV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_ventur)->value('id');
        $idAnaliseBV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBV)->max('id');
        $idLaudoBV = DB::table('laudos')->where('analise_id', '=', $idAnaliseBV)->value('id');
        $statusBV = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBV)->value('status_id');

        $tag_bomba_reator = "TE 72 200 240 090 000 - 000025";
        $idAtividadeBR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_reator)->value('id');
        $idAnaliseBR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR)->max('id');
        $idLaudoBR = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR)->value('id');
        $statusBR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR)->value('status_id');
        //Equipamentos do segundo painel de equipamentos da sala eletrica
        $tag_bomba_reator2 = "TE 72 200 240 090 000 - 000026";
        $idAtividadeBR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_reator2)->value('id');
        $idAnaliseBR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR2)->max('id');
        $idLaudoBR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR2)->value('id');
        $statusBR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR2)->value('status_id');

        $tag_bomba_ventur2 = "TE 72 200 240 090 000 - 000015";
        $idAtividadeBV2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_ventur2)->value('id');
        $idAnaliseBV2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBV2)->max('id');
        $idLaudoBV2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBV2)->value('id');
        $statusBV2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBV2)->value('status_id');

        $tag_bomba_absorvedor1 = "TE 72 200 240 090 000 - 000016";
        $idAtividadeBA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_absorvedor1)->value('id');
        $idAnaliseBA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBA1)->max('id');
        $idLaudoBA1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBA1)->value('id');
        $statusBA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBA1)->value('status_id');

        $tag_bomba_absorvedor2 = "TE 72 200 240 090 000 - 000017";
        $idAtividadeBA2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_absorvedor2)->value('id');
        $idAnaliseBA2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBA2)->max('id');
        $idLaudoBA2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBA2)->value('id');
        $statusBA2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBA2)->value('status_id');

        $tag_conjunto_bomba_412 = "TE 72 200 240 090 000 - 000018";
        $idAtividadeCB412 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_conjunto_bomba_412)->value('id');
        $idAnaliseCB412 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB412)->max('id');
        $idLaudoCB412 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB412)->value('id');
        $statusCB412 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB412)->value('status_id');

        $tag_conjunto_bomba_404P1 = "TE 72 200 240 090 000 - 000019";
        $idAtividadeCBP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_conjunto_bomba_404P1)->value('id');
        $idAnaliseCBP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBP1)->max('id');
        $idLaudoCBP1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCBP1)->value('id');
        $statusCBP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBP1)->value('status_id');

        $tag_conjunto_bomba_404P2 = "TE 72 200 240 090 000 - 000020";
        $idAtividadeCBP2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_conjunto_bomba_404P2)->value('id');
        $idAnaliseCBP2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBP2)->max('id');
        $idLaudoCBP2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCBP2)->value('id');
        $statusCBP2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBP2)->value('status_id');

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

        return view('csn.relatoriosTecnicos.termografia-painel_1')->with('idLaudoPA', $idLaudoPA)
        ->with('statusPA', $statusPA)->with('idLaudoSO', $idLaudoSO)->with('statusSO', $statusSO)->with('idLaudoMO', $idLaudoMO)->with('statusMO', $statusMO)
        ->with('idLaudoFL', $idLaudoFL)->with('statusFL', $statusFL)->with('idLaudoVC', $idLaudoVC)->with('statusVC', $statusVC)->with('idLaudoVR', $idLaudoVR)->with('statusVR', $statusVR)
        ->with('idLaudoBV', $idLaudoBV)->with('statusBV', $statusBV)->with('idLaudoBR', $idLaudoBR)->with('statusBR', $statusBR)->with('idLaudoBR2', $idLaudoBR2)->with('statusBR2', $statusBR2)
        ->with('idLaudoBV2', $idLaudoBV2)->with('statusBV2', $statusBV2)->with('idLaudoBA1', $idLaudoBA1)->with('statusBA1', $statusBA1)->with('idLaudoBA2', $idLaudoBA2)->with('statusBA2', $statusBA2)
        ->with('idLaudoCB412', $idLaudoCB412)->with('statusCB412', $statusCB412)->with('idLaudoCBP1', $idLaudoCBP1)->with('statusCBP1', $statusCBP1)
        ->with('idLaudoCBP2', $idLaudoCBP2)->with('statusCBP2', $statusCBP2)
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

    public function ura_painel_2() {
        //Armario 1
        $tag_exaustor_oxido = "TE 72 200 240 090 000 - 000021";
        $idAtividadeEO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_exaustor_oxido)->value('id');
        $idAnaliseEO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO)->max('id');
        $idLaudoEO = DB::table('laudos')->where('analise_id', '=', $idAnaliseEO)->value('id');
        $statusEO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO)->value('status_id');

        $tag_conjunto_embaladora = "TE 72 200 240 090 000 - 000031";
        $idAtividadeCE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_conjunto_embaladora)->value('id');
        $idAnaliseCE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCE)->max('id');
        $idLaudoCE = DB::table('laudos')->where('analise_id', '=', $idAnaliseCE)->value('id');
        $statusCE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCE)->value('status_id');

        $tag_balanca_embaladora = "TE 72 200 240 090 000 - 000032";
        $idAtividadeBE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_balanca_embaladora)->value('id');
        $idAnaliseBE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE)->max('id');
        $idLaudoBE = DB::table('laudos')->where('analise_id', '=', $idAnaliseBE)->value('id');
        $statusBE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE)->value('status_id');

        $tag_bomba_acido_novo1 = "TE 72 200 240 090 000 - 000006";
        $idAtividadeBAN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_novo1)->value('id');
        $idAnaliseBAN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAN1)->max('id');
        $idLaudoBAN1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAN1)->value('id');
        $statusBAN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAN1)->value('status_id');

        $tag_bomba_acido_novo2 = "TE 72 200 240 090 000 - 000007";
        $idAtividadeBAN2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_novo2)->value('id');
        $idAnaliseBAN2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAN2)->max('id');
        $idLaudoBAN2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAN2)->value('id');
        $statusBAN2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAN2)->value('status_id');

        $tag_bomba_acido_regenerado1 = "TE 72 200 240 090 000 - 000002";
        $idAtividadeBAR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_regenerado1)->value('id');
        $idAnaliseBAR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAR1)->max('id');
        $idLaudoBAR1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAR1)->value('id');
        $statusBAR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAR1)->value('status_id');

        $tag_valvula_rotativa_silo_oxido = "TE 72 200 240 090 000 - 000030";
        $idAtividadeVRSO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_valvula_rotativa_silo_oxido)->value('id');
        $idAnaliseVRSO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVRSO)->max('id');
        $idLaudoVRSO = DB::table('laudos')->where('analise_id', '=', $idAnaliseVRSO)->value('id');
        $statusVRSO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVRSO)->value('status_id');
        //Armario 2
        $tag_bomba_acido_regenerado2 = "TE 72 200 240 090 000 - 000003";
        $idAtividadeBAR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_regenerado2)->value('id');
        $idAnaliseBAR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAR2)->max('id');
        $idLaudoBAR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAR2)->value('id');
        $statusBAR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAR2)->value('status_id');

        $tag_bomba_acido_usado1 = "TE 72 200 240 090 000 - 000004";
        $idAtividadeBAU1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_usado1)->value('id');
        $idAnaliseBAU1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAU1)->max('id');
        $idLaudoBAU1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAU1)->value('id');
        $statusBAU1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAU1)->value('status_id');

        $tag_bomba_acido_usado2 = "TE 72 200 240 090 000 - 000005";
        $idAtividadeBAU2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_usado2)->value('id');
        $idAnaliseBAU2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAU2)->max('id');
        $idLaudoBAU2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAU2)->value('id');
        $statusBAU2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAU2)->value('status_id');

        $tag_bomba_agua_lavagem1 = "TE 72 200 240 090 000 - 000010";
        $idAtividadeBAL1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_agua_lavagem1)->value('id');
        $idAnaliseBAL1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAL1)->max('id');
        $idLaudoBAL1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAL1)->value('id');
        $statusBAL1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAL1)->value('status_id');

        $tag_bomba_agua_lavagem2 = "TE 72 200 240 090 000 - 000011";
        $idAtividadeBAL2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_agua_lavagem2)->value('id');
        $idAnaliseBAL2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAL2)->max('id');
        $idLaudoBAL2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAL2)->value('id');
        $statusBAL2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAL2)->value('status_id');

        $tag_tanque_acido_novo1 = "TE 72 200 240 090 000 - 000008";
        $idAtividadeTAN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_tanque_acido_novo1)->value('id');
        $idAnaliseTAN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTAN1)->max('id');
        $idLaudoTAN1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTAN1)->value('id');
        $statusTAN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTAN1)->value('status_id');

        $tag_tanque_exaustor_principal = "TE 72 200 240 090 000 - 000027";
        $idAtividadeEP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_tanque_exaustor_principal)->value('id');
        $idAnaliseEP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP)->max('id');
        $idLaudoEP = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP)->value('id');
        $statusEP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP)->value('status_id');

        $tag_tanque_bomba_dosador_soda_caustica1 = "TE 72 200 240 090 000 - 000012";
        $idAtividadeBDSC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_tanque_bomba_dosador_soda_caustica1)->value('id');
        $idAnaliseBDSC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDSC1)->max('id');
        $idLaudoBDSC1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBDSC1)->value('id');
        $statusBDSC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDSC1)->value('status_id');

        $tag_tanque_bomba_dosador_soda_caustica2 = "TE 72 200 240 090 000 - 000013";
        $idAtividadeBDSC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_tanque_bomba_dosador_soda_caustica2)->value('id');
        $idAnaliseBDSC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDSC2)->max('id');
        $idLaudoBDSC2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBDSC2)->value('id');
        $statusBDSC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDSC2)->value('status_id');

        $tag_bomba_acido_novo = "TE 72 200 240 090 000 - 000009";
        $idAtividadeBAN = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_bomba_acido_novo)->value('id');
        $idAnaliseBAN = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAN)->max('id');
        $idLaudoBAN = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAN)->value('id');
        $statusBAN = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAN)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia-painel_2')->with('idLaudoEO', $idLaudoEO)->with('statusEO', $statusEO)->with('idLaudoCE', $idLaudoCE)->with('statusCE', $statusCE)
        ->with('idLaudoBE', $idLaudoBE)->with('statusBE', $statusBE)->with('idLaudoBAN1', $idLaudoBAN1)->with('statusBAN1', $statusBAN1)->with('idLaudoBAN2', $idLaudoBAN2)->with('statusBAN2', $statusBAN2)
        ->with('idLaudoBAR1', $idLaudoBAR1)->with('statusBAR1', $statusBAR1)->with('idLaudoVRSO', $idLaudoVRSO)->with('statusVRSO', $statusVRSO)->with('idLaudoBAR2', $idLaudoBAR2)->with('statusBAR2', $statusBAR2)
        ->with('idLaudoBAU1', $idLaudoBAU1)->with('statusBAU1', $statusBAU1)->with('idLaudoBAU2', $idLaudoBAU2)->with('statusBAU2', $statusBAU2)->with('idLaudoBAL1', $idLaudoBAL1)->with('statusBAL1', $statusBAL1)
        ->with('idLaudoBAL2', $idLaudoBAL2)->with('statusBAL2', $statusBAL2)->with('idLaudoEP', $idLaudoEP)->with('statusEP', $statusEP)->with('idLaudoBDSC1', $idLaudoVRSO)->with('statusBDSC1', $statusBDSC1)
        ->with('idLaudoBDSC2', $idLaudoVRSO)->with('statusBDSC2', $statusBDSC2)->with('idLaudoTAN1', $idLaudoTAN1)->with('statusTAN1', $statusTAN1)->with('idLaudoBAN', $idLaudoBAN)->with('statusBAN', $statusBAN)
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

    public function ura_painel_caldeiras() {
        $tag_caldeira1 = "TE 72 050 150 007 003 - 000001";
        $idAtividadeCA1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_caldeira1)->value('id');
        $idAnaliseCA1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA1)->max('id');
        $idLaudoCA1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCA1)->value('id');
        $statusCA1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA1)->value('status_id');

        $tag_caldeira2 = "TE 72 050 250 007 003 - 000001";
        $idAtividadeCA2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_caldeira2)->value('id');
        $idAnaliseCA2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCA2)->max('id');
        $idLaudoCA2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCA2)->value('id');
        $statusCA2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCA2)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia-painel_caldeiras')->with('idLaudoCA1', $idLaudoCA1)->with('statusCA1', $statusCA1)
              ->with('idLaudoCA2', $idLaudoCA2)->with('statusCA2', $statusCA2)
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

    public function ura_laudo_refratarios() {
        return view('csn.relatoriosTecnicos.termografia-laudo_refratarios');
    }

    //--- DECAPAGEM
    public function decapagem_ets() {

        //SECAO ENTRADA
        $tag_ets11 = "TE 72 200 210 368 000 - 000001";
        $idAtividadeETS11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets11)->value('id');
        $idAnaliseETS11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS11)->max('id');
        $idLaudoETS11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS11)->value('id');
        $statusETS11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS11)->value('status_id');

        $tag_ets12 = "TE 72 200 210 368 000 - 000002";
        $idAtividadeETS12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets12)->value('id');
        $idAnaliseETS12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS12)->max('id');
        $idLaudoETS12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS12)->value('id');
        $statusETS12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS12)->value('status_id');

        $tag_ets13 = "TE 72 200 210 368 000 - 000003";
        $idAtividadeETS13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets13)->value('id');
        $idAnaliseETS13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS13)->max('id');
        $idLaudoETS13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS13)->value('id');
        $statusETS13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS13)->value('status_id');

        $tag_ets14 = "TE 72 200 210 368 000 - 000004";
        $idAtividadeETS14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets14)->value('id');
        $idAnaliseETS14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS14)->max('id');
        $idLaudoETS14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS14)->value('id');
        $statusETS14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS14)->value('status_id');
        //SECAO PROCESSO
        $tag_ets20 = "TE 72 200 210 370 000 - 000001";
        $idAtividadeETS20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets20)->value('id');
        $idAnaliseETS20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS20)->max('id');
        $idLaudoETS20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS20)->value('id');
        $statusETS20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS20)->value('status_id');

        $tag_ets21 = "TE 72 200 210 370 000 - 000002";
        $idAtividadeETS21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets21)->value('id');
        $idAnaliseETS21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS21)->max('id');
        $idLaudoETS21 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS21)->value('id');
        $statusETS21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS21)->value('status_id');

        $tag_ets22 = "TE 72 200 210 370 000 - 000003";
        $idAtividadeETS22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets22)->value('id');
        $idAnaliseETS22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS22)->max('id');
        $idLaudoETS22 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS22)->value('id');
        $statusETS22 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS22)->value('status_id');

        $tag_ets23 = "TE 72 200 210 370 000 - 000004";
        $idAtividadeETS23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets23)->value('id');
        $idAnaliseETS23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS23)->max('id');
        $idLaudoETS23 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS23)->value('id');
        $statusETS23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS23)->value('status_id');

        $tag_ets24 = "TE 72 200 210 370 000 - 000005";
        $idAtividadeETS24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets24)->value('id');
        $idAnaliseETS24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS24)->max('id');
        $idLaudoETS24 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS24)->value('id');
        $statusETS24 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS24)->value('status_id');
        //SECAO SAIDA
        $tag_ets30 = "TE 72 200 210 371 000 - 000001";
        $idAtividadeETS30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets30)->value('id');
        $idAnaliseETS30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS30)->max('id');
        $idLaudoETS30 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS30)->value('id');
        $statusETS30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS30)->value('status_id');

        $tag_ets31 = "TE 72 200 210 371 000 - 000002";
        $idAtividadeETS31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets31)->value('id');
        $idAnaliseETS31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS31)->max('id');
        $idLaudoETS31 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS31)->value('id');
        $statusETS31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS31)->value('status_id');

        $tag_ets32 = "TE 72 200 210 371 000 - 000003";
        $idAtividadeETS32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets32)->value('id');
        $idAnaliseETS32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS32)->max('id');
        $idLaudoETS32 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS32)->value('id');
        $statusETS32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS32)->value('status_id');

        $tag_ets33 = "TE 72 200 210 371 000 - 000004";
        $idAtividadeETS33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets33)->value('id');
        $idAnaliseETS33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS33)->max('id');
        $idLaudoETS33 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS33)->value('id');
        $statusETS33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS33)->value('status_id');

        $tag_ets34 = "TE 72 200 210 371 000 - 000005";
        $idAtividadeETS34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ets34)->value('id');
        $idAnaliseETS34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETS34)->max('id');
        $idLaudoETS34 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETS34)->value('id');
        $statusETS34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETS34)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_decapagem_ets')->with('idLaudoETS11', $idLaudoETS11)->with('statusETS11', $statusETS11)
              ->with('idLaudoETS12', $idLaudoETS12)->with('statusETS12', $statusETS12)
              ->with('idLaudoETS13', $idLaudoETS13)->with('statusETS13', $statusETS13)
              ->with('idLaudoETS14', $idLaudoETS14)->with('statusETS14', $statusETS14)
              ->with('idLaudoETS20', $idLaudoETS20)->with('statusETS20', $statusETS20)
              ->with('idLaudoETS21', $idLaudoETS21)->with('statusETS21', $statusETS21)
              ->with('idLaudoETS22', $idLaudoETS22)->with('statusETS22', $statusETS22)
              ->with('idLaudoETS23', $idLaudoETS23)->with('statusETS23', $statusETS23)
              ->with('idLaudoETS24', $idLaudoETS24)->with('statusETS24', $statusETS24)
              ->with('idLaudoETS30', $idLaudoETS30)->with('statusETS30', $statusETS30)
              ->with('idLaudoETS31', $idLaudoETS31)->with('statusETS31', $statusETS31)
              ->with('idLaudoETS32', $idLaudoETS32)->with('statusETS32', $statusETS32)
              ->with('idLaudoETS33', $idLaudoETS33)->with('statusETS33', $statusETS33)
              ->with('idLaudoETS34', $idLaudoETS34)->with('statusETS34', $statusETS34)
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

    public function decapagem_ccm1() {
        //SISTEMA HIDRAULICO DE ENTRADA
        $tag_CCM1_recirculacao = "TE 72 200 210 327 000 - 000001";
        $idAtividadeCCM1_recirculacao = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_recirculacao)->value('id');
        $idAnaliseCCM1_recirculacao = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_recirculacao)->max('id');
        $idLaudoCCM1_recirculacao = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCM1_recirculacao)->value('id');
        $statusCCM1_recirculacao = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_recirculacao)->value('status_id');

        $tag_CCM1_bomba1 = "TE 72 200 210 327 000 - 000002";
        $idAtividadeCCM1_bomba1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_bomba1)->value('id');
        $idAnaliseCCM1_bomba1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_bomba1)->max('id');
        $idLaudoCCM1_bomba1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCM1_bomba1)->value('id');
        $statusCCM1_bomba1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_bomba1)->value('status_id');

        $tag_CCM1_bomba2 = "TE 72 200 210 327 000 - 000003";
        $idAtividadeCCM1_bomba2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_bomba2)->value('id');
        $idAnaliseCCM1_bomba2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_bomba2)->max('id');
        $idLaudoCCM1_bomba2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCM1_bomba2)->value('id');
        $statusCCM1_bomba2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_bomba2)->value('status_id');

        $tag_CCM1_bomba3 = "TE 72 200 210 327 000 - 000004";
        $idAtividadeCCM1_bomba3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_bomba3)->value('id');
        $idAnaliseCCM1_bomba3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_bomba3)->max('id');
        $idLaudoCCM1_bomba3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCM1_bomba3)->value('id');
        $statusCCM1_bomba3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_bomba3)->value('status_id');

        $tag_CCM1_bomba4 = "TE 72 200 210 327 000 - 000005";
        $idAtividadeCCM1_bomba4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCM1_bomba4)->value('id');
        $idAnaliseCCM1_bomba4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCM1_bomba4)->max('id');
        $idLaudoCCM1_bomba4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCM1_bomba4)->value('id');
        $statusCCM1_bomba4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCM1_bomba4)->value('status_id');
        //CARRO BOBINA
        $tag_CB = "TE 72 200 210 327 000 - 000006";
        $idAtividadeCB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CB)->value('id');
        $idAnaliseCB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB)->max('id');
        $idLaudoCB = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB)->value('id');
        $statusCB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB)->value('status_id');
        //FIFE ENTRADA BOMBA UNIDADE HIDRAULICA DESENROLADEIRA
        $tag_FEB = "TE 72 200 210 327 000 - 000007";
        $idAtividadeFEB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FEB)->value('id');
        $idAnaliseFEB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFEB)->max('id');
        $idLaudoFEB = DB::table('laudos')->where('analise_id', '=', $idAnaliseFEB)->value('id');
        $statusFEB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFEB)->value('status_id');
        //BOMBA HIDRAULICA RECIRCULACAO FIFE
        $tag_BHRF = "TE 72 200 210 327 000 - 000008";
        $idAtividadeBHRF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BHRF)->value('id');
        $idAnaliseBHRF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBHRF)->max('id');
        $idLaudoBHRF = DB::table('laudos')->where('analise_id', '=', $idAnaliseBHRF)->value('id');
        $statusBHRF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBHRF)->value('status_id');
        //05B5CD03H
        $tag_05B5CD03H = "TE 72 200 210 327 000 - 000057";
        $idAtividade05B5CD03H = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_05B5CD03H)->value('id');
        $idAnalise05B5CD03H = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade05B5CD03H)->max('id');
        $idLaudo05B5CD03H = DB::table('laudos')->where('analise_id', '=', $idAnalise05B5CD03H)->value('id');
        $status05B5CD03H = DB::table('preditiva_analises')->where('id', '=', $idAnalise05B5CD03H)->value('status_id');
        //BOMBA DE LUBRIFICACAO REDUTORA DA DESENROLADEIRA
        $tag_BLRD = "TE 72 200 210 327 000 - 000009";
        $idAtividadeBLRD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLRD)->value('id');
        $idAnaliseBLRD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLRD)->max('id');
        $idLaudoBLRD = DB::table('laudos')->where('analise_id', '=', $idAnaliseBLRD)->value('id');
        $statusBLRD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLRD)->value('status_id');
        //BOMBA DE LUBRIFICACAO ESTEIRA DE APARA
        $tag_BLEA = "TE 72 200 210 327 000 - 000010";
        $idAtividadeBLEA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLEA)->value('id');
        $idAnaliseBLEA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLEA)->max('id');
        $idLaudoBLEA = DB::table('laudos')->where('analise_id', '=', $idAnaliseBLEA)->value('id');
        $statusBLEA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLEA)->value('status_id');
        //BOMBA DE REFRIGERACAO DO CARRO DE ENTRADA
        $tag_BRCE = "TE 72 200 210 327 000 - 000026";
        $idAtividadeBRCE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRCE)->value('id');
        $idAnaliseBRCE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRCE)->max('id');
        $idLaudoBRCE = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRCE)->value('id');
        $statusBRCE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRCE)->value('status_id');
        //BOMBA POCO QUIMICO ENTRADA
        $tag_BPQE = "TE 72 200 210 327 000 - 000022";
        $idAtividadeBPQE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BPQE)->value('id');
        $idAnaliseBPQE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBPQE)->max('id');
        $idLaudoBPQE = DB::table('laudos')->where('analise_id', '=', $idAnaliseBPQE)->value('id');
        $statusBPQE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBPQE)->value('status_id');
        //BOMBA LAVADOR DE GASES
        $tag_BLG = "TE 72 200 210 327 000 - 000023";
        $idAtividadeBLG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLG)->value('id');
        $idAnaliseBLG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLG)->max('id');
        $idLaudoBLG = DB::table('laudos')->where('analise_id', '=', $idAnaliseBLG)->value('id');
        $statusBLG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLG)->value('status_id');
        //BOMBA LAVADOR DE GASES STD-BY
        $tag_BLGS = "TE 72 200 210 327 000 - 000024";
        $idAtividadeBLGS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLGS)->value('id');
        $idAnaliseBLGS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLGS)->max('id');
        $idLaudoBLGS = DB::table('laudos')->where('analise_id', '=', $idAnaliseBLGS)->value('id');
        $statusBLGS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLGS)->value('status_id');
        //BOMBA POCO QUIMICO DE SAIDA
        $tag_BPQS = "TE 72 200 210 327 000 - 000025";
        $idAtividadeBPQS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BPQS)->value('id');
        $idAnaliseBPQS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBPQS)->max('id');
        $idLaudoBPQS = DB::table('laudos')->where('analise_id', '=', $idAnaliseBPQS)->value('id');
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
        $idLaudoBTARS = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTARS)->value('id');
        $statusBTARS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTARS)->value('status_id');
        //RECIRCULACAO DE ACIDO - BOMBA #5
        $tag_RAB5 = "TE 72 200 210 327 000 - 000027";
        $idAtividadeRAB5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB5)->value('id');
        $idAnaliseRAB5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB5)->max('id');
        $idLaudoRAB5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAB5)->value('id');
        $statusRAB5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB5)->value('status_id');
        //RECIRCULACAO DE ACIDO - BOMBA #6
        $tag_RAB6 = "TE 72 200 210 327 000 - 000019";
        $idAtividadeRAB6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB6)->value('id');
        $idAnaliseRAB6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB6)->max('id');
        $idLaudoRAB6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAB6)->value('id');
        $statusRAB6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB6)->value('status_id');
        //RECIRCULACAO DE ACIDO - BAMBA #6 - STAND BY
        $tag_RAB6S = "TE 72 200 210 327 000 - 000020";
        $idAtividadeRAB6S = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB6S)->value('id');
        $idAnaliseRAB6S = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB6S)->max('id');
        $idLaudoRAB6S = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAB6S)->value('id');
        $statusRAB6S = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB6S)->value('status_id');
        //SCRUBBER FAN #1-1
        $tag_SF1 = "TE 72 200 210 327 000 - 000021";
        $idAtividadeSF1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SF1)->value('id');
        $idAnaliseSF1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSF1)->max('id');
        $idLaudoSF1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSF1)->value('id');
        $statusSF1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSF1)->value('status_id');
        //BOMBA TRANSFERENCIA DE ACIDO SUJO
        $tag_BTAS = "TE 72 200 210 327 000 - 000011";
        $idAtividadeBTAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTAS)->value('id');
        $idAnaliseBTAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTAS)->max('id');
        $idLaudoBTAS = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTAS)->value('id');
        $statusBTAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTAS)->value('status_id');
        //BOMBA TRANSFERENCIA DE ACIDO SUJO STD-BY
        $tag_BTASS = "TE 72 200 210 327 000 - 000012";
        $idAtividadeBTASS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTASS)->value('id');
        $idAnaliseBTASS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTASS)->max('id');
        $idLaudoBTASS = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTASS)->value('id');
        $statusBTASS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTASS)->value('status_id');
        //RECIRCULACAO DE ACIDO - BOMBA #1
        $tag_RAB1 = "TE 72 200 210 327 000 - 000013";
        $idAtividadeRAB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB1)->value('id');
        $idAnaliseRAB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB1)->max('id');
        $idLaudoRAB1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAB1)->value('id');
        $statusRAB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB1)->value('status_id');
        //RECIRCULACAO DE ACIDO - BOMBA #2
        $tag_RAB2 = "TE 72 200 210 327 000 - 000014";
        $idAtividadeRAB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB2)->value('id');
        $idAnaliseRAB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB2)->max('id');
        $idLaudoRAB2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAB2)->value('id');
        $statusRAB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB2)->value('status_id');
        //RECIRCULACAO DE ACIDO - BOMBA #3
        $tag_RAB3 = "TE 72 200 210 327 000 - 000015";
        $idAtividadeRAB3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB3)->value('id');
        $idAnaliseRAB3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB3)->max('id');
        $idLaudoRAB3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAB3)->value('id');
        $statusRAB3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB3)->value('status_id');
        //RECIRCULACAO DE ACIDO - BOMBA #4
        $tag_RAB4 = "TE 72 200 210 327 000 - 000016";
        $idAtividadeRAB4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAB4)->value('id');
        $idAnaliseRAB4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAB4)->max('id');
        $idLaudoRAB4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAB4)->value('id');
        $statusRAB4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAB4)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_decapagem_ccm1')
                ->with('idLaudoCCM1_recirculacao', $idLaudoCCM1_recirculacao)->with('statusCCM1_recirculacao', $statusCCM1_recirculacao)
                ->with('idLaudoCCM1_bomba1', $idLaudoCCM1_bomba1)->with('statusCCM1_bomba1', $statusCCM1_bomba1)
                ->with('idLaudoCCM1_bomba2', $idLaudoCCM1_bomba2)->with('statusCCM1_bomba2', $statusCCM1_bomba2)
                ->with('idLaudoCCM1_bomba3', $idLaudoCCM1_bomba3)->with('statusCCM1_bomba3', $statusCCM1_bomba3)
                ->with('idLaudoCCM1_bomba4', $idLaudoCCM1_bomba4)->with('statusCCM1_bomba4', $statusCCM1_bomba4)
                ->with('idLaudoCB', $idLaudoCB)->with('statusCB', $statusCB)
                ->with('idLaudoFEB', $idLaudoFEB)->with('statusFEB', $statusFEB)
                ->with('idLaudoBHRF', $idLaudoBHRF)->with('statusBHRF', $statusBHRF)
                ->with('idLaudo05B5CD03H', $idLaudo05B5CD03H)->with('status05B5CD03H', $status05B5CD03H)
                ->with('idLaudoBLRD', $idLaudoBLRD)->with('statusBLRD', $statusBLRD)
                ->with('idLaudoBLEA', $idLaudoBLEA)->with('statusBLEA', $statusBLEA)
                ->with('idLaudoBRCE', $idLaudoBRCE)->with('statusBRCE', $statusBRCE)
                ->with('idLaudoBPQE', $idLaudoBPQE)->with('statusBPQE', $statusBPQE)
                ->with('idLaudoBLG', $idLaudoBLG)->with('statusBLG', $statusBLG)
                ->with('idLaudoBLGS', $idLaudoBLGS)->with('statusBLGS', $statusBLGS)
                ->with('idLaudoBPQS', $idLaudoBPQS)->with('statusBPQS', $statusBPQS)
                ->with('idLaudoBTAR', $idLaudoBTAR)->with('statusBTAR', $statusBTAR)
                ->with('idLaudoBTARS', $idLaudoBTARS)->with('statusBTARS', $statusBTARS)
                ->with('idLaudoRAB5', $idLaudoRAB5)->with('statusRAB5', $statusRAB5)
                ->with('idLaudoRAB6', $idLaudoRAB6)->with('statusRAB6', $statusRAB6)
                ->with('idLaudoRAB6S', $idLaudoRAB6S)->with('statusRAB6S', $statusRAB6S)
                ->with('idLaudoSF1', $idLaudoSF1)->with('statusSF1', $statusSF1)
                ->with('idLaudoBTAS', $idLaudoBTAS)->with('statusBTAS', $statusBTAS)
                ->with('idLaudoBTASS', $idLaudoBTASS)->with('statusBTASS', $statusBTASS)
                ->with('idLaudoRAB1', $idLaudoRAB1)->with('statusRAB1', $statusRAB1)
                ->with('idLaudoRAB2', $idLaudoRAB2)->with('statusRAB2', $statusRAB2)
                ->with('idLaudoRAB3', $idLaudoRAB3)->with('statusRAB3', $statusRAB3)
                ->with('idLaudoRAB4', $idLaudoRAB4)->with('statusRAB4', $statusRAB4)
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

    public function decapagem_ccm2() {
    //CD06
        //AUXILIARY FEEDER #1
        $tag_AF1 = "TE 72 200 210 330 000 - 000029";
        $idAtividadeAF1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AF1)->value('id');
        $idAnaliseAF1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAF1)->max('id');
        $idLaudoAF1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAF1)->value('id');
        $statusAF1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAF1)->value('status_id');
        //AUXILIARY FEEDER #2
        $tag_AF2 = "TE 72 200 210 330 000 - 000030";
        $idAtividadeAF2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AF2)->value('id');
        $idAnaliseAF2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAF2)->max('id');
        $idLaudoAF2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAF2)->value('id');
        $statusAF2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAF2)->value('status_id');
        //SISTEMA DE REFRIGERAÇÃO DE SAÍDA BORDA GUIA HIDRÁULICO
        $tag_SRSBGH = "TE 72 200 210 330 000 - 000001";
        $idAtividadeSRSBGH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SRSBGH)->value('id');
        $idAnaliseSRSBGH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSRSBGH)->max('id');
        $idLaudoSRSBGH = DB::table('laudos')->where('analise_id', '=', $idAnaliseSRSBGH)->value('id');
        $statusSRSBGH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSRSBGH)->value('status_id');
        //ALIMENTAÇÃO PAINEL DA OLEADEIRA
        $tag_APO = "TE 72 200 210 330 000 - 000031";
        $idAtividadeAPO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_APO)->value('id');
        $idAnaliseAPO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPO)->max('id');
        $idLaudoAPO = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPO)->value('id');
        $statusAPO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPO)->value('status_id');
        //EDGE TRIMMER PANEL PNL 3030.300
        $tag_ETP = "TE 72 200 210 330 000 - 000032";
        $idAtividadeETP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ETP)->value('id');
        $idAnaliseETP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETP)->max('id');
        $idLaudoETP = DB::table('laudos')->where('analise_id', '=', $idAnaliseETP)->value('id');
        $statusETP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETP)->value('status_id');
        //FEEDER FOR PLC PANEL
        $tag_FFPP = "TE 72 200 210 330 000 - 000033";
        $idAtividadeFFPP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FFPP)->value('id');
        $idAnaliseFFPP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFFPP)->max('id');
        $idLaudoFFPP = DB::table('laudos')->where('analise_id', '=', $idAnaliseFFPP)->value('id');
        $statusFFPP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFFPP)->value('status_id');
        //05B5CD06H
        $tag_05B5CD06H = "TE 72 200 210 330 000 - 000034";
        $idAtividade05B5CD06H = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_05B5CD06H)->value('id');
        $idAnalise05B5CD06H = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade05B5CD06H)->max('id');
        $idLaudo05B5CD06H = DB::table('laudos')->where('analise_id', '=', $idAnalise05B5CD06H)->value('id');
        $status05B5CD06H = DB::table('preditiva_analises')->where('id', '=', $idAnalise05B5CD06H)->value('status_id');
        //AR CONDICIONADO
        $tag_AC = "TE 72 200 210 330 000 - 000035";
        $idAtividadeAC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AC)->value('id');
        $idAnaliseAC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAC)->max('id');
        $idLaudoAC = DB::table('laudos')->where('analise_id', '=', $idAnaliseAC)->value('id');
        $statusAC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAC)->value('status_id');
        //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA #1
        $tag_SHSB1 = "TE 72 200 210 330 000 - 000002";
        $idAtividadeSHSB1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSB1)->value('id');
        $idAnaliseSHSB1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSB1)->max('id');
        $idLaudoSHSB1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHSB1)->value('id');
        $statusSHSB1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSB1)->value('status_id');
    //CD07
        //CARRO DE BOBINA DA SAÍDA - BOMBA HIDRÁULICA
        $tag_CBSBH = "TE 72 200 210 330 000 - 000003";
        $idAtividadeCBSBH = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CBSBH)->value('id');
        $idAnaliseCBSBH = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBSBH)->max('id');
        $idLaudoCBSBH = DB::table('laudos')->where('analise_id', '=', $idAnaliseCBSBH)->value('id');
        $statusCBSBH = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBSBH)->value('status_id');
        //FIFE SAÍDA BOMBA UNIDADE HIDRAULICA ENROLADEIRA
        $tag_FSBUHE = "TE 72 200 210 330 000 - 000004";
        $idAtividadeFSBUHE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FSBUHE)->value('id');
        $idAnaliseFSBUHE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFSBUHE)->max('id');
        $idLaudoFSBUHE = DB::table('laudos')->where('analise_id', '=', $idAnaliseFSBUHE)->value('id');
        $statusFSBUHE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFSBUHE)->value('status_id');
        //ESTEIRA DE APARAS
        $tag_EA = "TE 72 200 210 330 000 - 000005";
        $idAtividadeEA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EA)->value('id');
        $idAnaliseEA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEA)->max('id');
        $idLaudoEA = DB::table('laudos')->where('analise_id', '=', $idAnaliseEA)->value('id');
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
        $idLaudoSHSBR = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHSBR)->value('id');
        $statusSHSBR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSBR)->value('status_id');
        //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA #2
        $tag_SHSB2 = "TE 72 200 210 330 000 - 000008";
        $idAtividadeSHSB2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSB2)->value('id');
        $idAnaliseSHSB2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSB2)->max('id');
        $idLaudoSHSB2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHSB2)->value('id');
        $statusSHSB2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSB2)->value('status_id');
    //CD08
        //FIFE PROCESSO UNIDADE HIDRAULICA ROLO CORRETOR
        $tag_FPUHRC = "TE 72 200 210 330 000 - 000009";
        $idAtividadeFPUHRC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPUHRC)->value('id');
        $idAnaliseFPUHRC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPUHRC)->max('id');
        $idLaudoFPUHRC = DB::table('laudos')->where('analise_id', '=', $idAnaliseFPUHRC)->value('id');
        $statusFPUHRC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPUHRC)->value('status_id');
        //BOMBA DE LUBRIFICAÇÃO DA ENROLADEIRA
        $tag_BLE = "TE 72 200 210 330 000 - 000010";
        $idAtividadeBLE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLE)->value('id');
        $idAnaliseBLE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLE)->max('id');
        $idLaudoBLE = DB::table('laudos')->where('analise_id', '=', $idAnaliseBLE)->value('id');
        $statusBLE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLE)->value('status_id');
        //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA #3
        $tag_SHSB3 = "TE 72 200 210 330 000 - 000011";
        $idAtividadeSHSB3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSB3)->value('id');
        $idAnaliseSHSB3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSB3)->max('id');
        $idLaudoSHSB3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHSB3)->value('id');
        $statusSHSB3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSB3)->value('status_id');
    //CD09
        //SISTEMA HIDRÁULICO DE SAÍDA - BOMBA #4
        $tag_SHSB4 = "TE 72 200 210 330 000 - 000012";
        $idAtividadeSHSB4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SHSB4)->value('id');
        $idAnaliseSHSB4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHSB4)->max('id');
        $idLaudoSHSB4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHSB4)->value('id');
        $statusSHSB4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHSB4)->value('status_id');
    //CD10
        //SCRUBBER FAN 1-2
        $tag_SF = "TE 72 200 210 330 000 - 000013";
        $idAtividadeSF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SF)->value('id');
        $idAnaliseSF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSF)->max('id');
        $idLaudoSF = DB::table('laudos')->where('analise_id', '=', $idAnaliseSF)->value('id');
        $statusSF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSF)->value('status_id');
    //CE09
        //NAVALHA DE AR QUENTE - SOPRADOR #1
        $tag_NAQS1 = "TE 72 200 210 330 000 - 000026";
        $idAtividadeNAQS1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAQS1)->value('id');
        $idAnaliseNAQS1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAQS1)->max('id');
        $idLaudoNAQS1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseNAQS1)->value('id');
        $statusNAQS1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAQS1)->value('status_id');
        //NAVALHA DE AR QUENTE - SOPRADOR #2
        $tag_NAQS2 = "TE 72 200 210 330 000 - 000027";
        $idAtividadeNAQS2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAQS2)->value('id');
        $idAnaliseNAQS2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAQS2)->max('id');
        $idLaudoNAQS2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseNAQS2)->value('id');
        $statusNAQS2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAQS2)->value('status_id');
        //NAVALHA DE AR QUENTE - SOPRADOR #3
        $tag_NAQS3 = "TE 72 200 210 330 000 - 000028";
        $idAtividadeNAQS3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAQS3)->value('id');
        $idAnaliseNAQS3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAQS3)->max('id');
        $idLaudoNAQS3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseNAQS3)->value('id');
        $statusNAQS3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAQS3)->value('status_id');
    //CE08
        //BOMBA TANQUE LIMPEZA
        $tag_BTL = "TE 72 200 210 330 000 - 000020";
        $idAtividadeBTL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTL)->value('id');
        $idAnaliseBTL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTL)->max('id');
        $idLaudoBTL = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTL)->value('id');
        $statusBTL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTL)->value('status_id');
        //BOMBA STD-BY TRANSBORDO DE ENXAGUE
        $tag_BSTDE = "TE 72 200 210 330 000 - 000021";
        $idAtividadeBSTDE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BSTDE)->value('id');
        $idAnaliseBSTDE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBSTDE)->max('id');
        $idLaudoBSTDE = DB::table('laudos')->where('analise_id', '=', $idAnaliseBSTDE)->value('id');
        $statusBSTDE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBSTDE)->value('status_id');
        //BOMBA STD-BY TANQUE 1 E 2 ENXAGUE
        $tag_BST1_2_E = "TE 72 200 210 330 000 - 000022";
        $idAtividadeBST1_2_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BST1_2_E)->value('id');
        $idAnaliseBST1_2_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBST1_2_E)->max('id');
        $idLaudoBST1_2_E = DB::table('laudos')->where('analise_id', '=', $idAnaliseBST1_2_E)->value('id');
        $statusBST1_2_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBST1_2_E)->value('status_id');
        //BOMBA STD-BY TANQUE 3 E 4 ENXAGUE
        $tag_BST3_4_E = "TE 72 200 210 330 000 - 000023";
        $idAtividadeBST3_4_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BST3_4_E)->value('id');
        $idAnaliseBST3_4_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBST3_4_E)->max('id');
        $idLaudoBST3_4_E = DB::table('laudos')->where('analise_id', '=', $idAnaliseBST3_4_E)->value('id');
        $statusBST3_4_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBST3_4_E)->value('status_id');
        //BOMBA STD-BY TANQUE 5 ENXAGUE
        $tag_BST5_E = "TE 72 200 210 330 000 - 000024";
        $idAtividadeBST5_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BST5_E)->value('id');
        $idAnaliseBST5_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBST5_E)->max('id');
        $idLaudoBST5_E = DB::table('laudos')->where('analise_id', '=', $idAnaliseBST5_E)->value('id');
        $statusBST5_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBST5_E)->value('status_id');
        //BOMBA TANQUE LIMPEZA STD-BT
        $tag_BTLS = "TE 72 200 210 330 000 - 000025";
        $idAtividadeBTLS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTLS)->value('id');
        $idAnaliseBTLS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTLS)->max('id');
        $idLaudoBTLS = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTLS)->value('id');
        $statusBTLS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTLS)->value('status_id');
    //CE07
        //BOMBA DE TRANSBORDO DE ENXAGUE
        $tag_BDTE = "TE 72 200 210 330 000 - 000014";
        $idAtividadeBDTE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BDTE)->value('id');
        $idAnaliseBDTE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDTE)->max('id');
        $idLaudoBDTE = DB::table('laudos')->where('analise_id', '=', $idAnaliseBDTE)->value('id');
        $statusBDTE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDTE)->value('status_id');
        //BOMBA #1 TANQUE 1 E 2 ENXAGUE
        $tag_B1T_1_2_E = "TE 72 200 210 330 000 - 000015";
        $idAtividadeB1T_1_2_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1T_1_2_E)->value('id');
        $idAnaliseB1T_1_2_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1T_1_2_E)->max('id');
        $idLaudoB1T_1_2_E = DB::table('laudos')->where('analise_id', '=', $idAnaliseB1T_1_2_E)->value('id');
        $statusB1T_1_2_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1T_1_2_E)->value('status_id');
        //BOMBA #2 TANQUE 1 E 2 ENXAGUE
        $tag_B2T_1_2_E = "TE 72 200 210 330 000 - 000016";
        $idAtividadeB2T_1_2_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B2T_1_2_E)->value('id');
        $idAnaliseB2T_1_2_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB2T_1_2_E)->max('id');
        $idLaudoB2T_1_2_E = DB::table('laudos')->where('analise_id', '=', $idAnaliseB2T_1_2_E)->value('id');
        $statusB2T_1_2_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB2T_1_2_E)->value('status_id');
        //BOMBA #3 TANQUE 3 E 4 ENXAGUE
        $tag_B3T_3_4_E = "TE 72 200 210 330 000 - 000017";
        $idAtividadeB3T_3_4_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B3T_3_4_E)->value('id');
        $idAnaliseB3T_3_4_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB3T_3_4_E)->max('id');
        $idLaudoB3T_3_4_E = DB::table('laudos')->where('analise_id', '=', $idAnaliseB3T_3_4_E)->value('id');
        $statusB3T_3_4_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB3T_3_4_E)->value('status_id');
        //BOMBA #4 TANQUE 3 E 4 ENXAGUE
        $tag_B4T_3_4_E = "TE 72 200 210 330 000 - 000018";
        $idAtividadeB4T_3_4_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B4T_3_4_E)->value('id');
        $idAnaliseB4T_3_4_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB4T_3_4_E)->max('id');
        $idLaudoB4T_3_4_E = DB::table('laudos')->where('analise_id', '=', $idAnaliseB4T_3_4_E)->value('id');
        $statusB4T_3_4_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB4T_3_4_E)->value('status_id');
        //BOMBA #5 TANQUE 5 ENXAGUE
        $tag_B5T_5_E = "TE 72 200 210 330 000 - 000019";
        $idAtividadeB5T_5_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B5T_5_E)->value('id');
        $idAnaliseB5T_5_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB5T_5_E)->max('id');
        $idLaudoB5T_5_E = DB::table('laudos')->where('analise_id', '=', $idAnaliseB5T_5_E)->value('id');
        $statusB5T_5_E = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB5T_5_E)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_decapagem_ccm2')
        ->with('idLaudoAF1', $idLaudoAF1)->with('statusAF1', $statusAF1)
        ->with('idLaudoAF2', $idLaudoAF2)->with('statusAF2', $statusAF2)
        ->with('idLaudoSRSBGH', $idLaudoSRSBGH)->with('statusSRSBGH', $statusSRSBGH)
        ->with('idLaudoAPO', $idLaudoAPO)->with('statusAPO', $statusAPO)
        ->with('idLaudoETP', $idLaudoETP)->with('statusETP', $statusETP)
        ->with('idLaudoFFPP', $idLaudoFFPP)->with('statusFFPP', $statusFFPP)
        ->with('idLaudo05B5CD06H', $idLaudo05B5CD06H)->with('status05B5CD06H', $status05B5CD06H)
        ->with('idLaudoAC', $idLaudoAC)->with('statusAC', $statusAC)
        ->with('idLaudoSHSB1', $idLaudoSHSB1)->with('statusSHSB1', $statusSHSB1)
        ->with('idLaudoCBSBH', $idLaudoCBSBH)->with('statusCBSBH', $statusCBSBH)
        ->with('idLaudoFSBUHE', $idLaudoFSBUHE)->with('statusFSBUHE', $statusFSBUHE)
        ->with('idLaudoEA', $idLaudoEA)->with('statusEA', $statusEA)
        ->with('idLaudoCEA', $idLaudoCEA)->with('statusCEA', $statusCEA)
        ->with('idLaudoSHSBR', $idLaudoSHSBR)->with('statusSHSBR', $statusSHSBR)
        ->with('idLaudoSHSB2', $idLaudoSHSB2)->with('statusSHSB2', $statusSHSB2)
        ->with('idLaudoFPUHRC', $idLaudoFPUHRC)->with('statusFPUHRC', $statusFPUHRC)
        ->with('idLaudoBLE', $idLaudoBLE)->with('statusBLE', $statusBLE)
        ->with('idLaudoSHSB3', $idLaudoSHSB3)->with('statusSHSB3', $statusSHSB3)
        ->with('idLaudoSHSB4', $idLaudoSHSB4)->with('statusSHSB4', $statusSHSB4)
        ->with('idLaudoSF', $idLaudoSF)->with('statusSF', $statusSF)
        ->with('idLaudoNAQS1', $idLaudoNAQS1)->with('statusNAQS1', $statusNAQS1)
        ->with('idLaudoNAQS2', $idLaudoNAQS2)->with('statusNAQS2', $statusNAQS2)
        ->with('idLaudoNAQS3', $idLaudoNAQS3)->with('statusNAQS3', $statusNAQS3)
        ->with('idLaudoBTL', $idLaudoBTL)->with('statusBTL', $statusBTL)
        ->with('idLaudoBSTDE', $idLaudoBSTDE)->with('statusBSTDE', $statusBSTDE)
        ->with('idLaudoBST1_2_E', $idLaudoBST1_2_E)->with('statusBST1_2_E', $statusBST1_2_E)
        ->with('idLaudoBST3_4_E', $idLaudoBST3_4_E)->with('statusBST3_4_E', $statusBST3_4_E)
        ->with('idLaudoBST5_E', $idLaudoBST5_E)->with('statusBST5_E', $statusBST5_E)
        ->with('idLaudoBTLS', $idLaudoBTLS)->with('statusBTLS', $statusBTLS)
        ->with('idLaudoBDTE', $idLaudoBDTE)->with('statusBDTE', $statusBDTE)
        ->with('idLaudoB1T_1_2_E', $idLaudoB1T_1_2_E)->with('statusB1T_1_2_E', $statusB1T_1_2_E)
        ->with('idLaudoB2T_1_2_E', $idLaudoB2T_1_2_E)->with('statusB2T_1_2_E', $statusB2T_1_2_E)
        ->with('idLaudoB3T_3_4_E', $idLaudoB3T_3_4_E)->with('statusB3T_3_4_E', $statusB3T_3_4_E)
        ->with('idLaudoAF2', $idLaudoAF2)->with('statusAF2', $statusAF2)
        ->with('idLaudoB4T_3_4_E', $idLaudoB4T_3_4_E)->with('statusB4T_3_4_E', $statusB4T_3_4_E)
        ->with('idLaudoB5T_5_E', $idLaudoB5T_5_E)->with('statusB5T_5_E', $statusB5T_5_E)
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

    public function decapagem_drives() {
        //DESENROLADEIRA
        $tag_DESENROLADEIRA = "TE 72 200 210 363 000 - 000047";
        $idAtividadeDESENROLADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESENROLADEIRA)->value('id');
        $idAnaliseDESENROLADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENROLADEIRA)->max('id');
        $idLaudoDESENROLADEIRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESENROLADEIRA)->value('id');
        $statusDESENROLADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENROLADEIRA)->value('status_id');
        //DESEMPENADEIRA
        $tag_DESEMPENADEIRA = "TE 72 200 210 363 000 - 000050";
        $idAtividadeDESEMPENADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESEMPENADEIRA)->value('id');
        $idAnaliseDESEMPENADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEMPENADEIRA)->max('id');
        $idLaudoDESEMPENADEIRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEMPENADEIRA)->value('id');
        $statusDESEMPENADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEMPENADEIRA)->value('status_id');
        //ROLO CORRETOR
        $tag_RC = "TE 72 200 210 363 000 - 000051";
        $idAtividadeRC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RC)->value('id');
        $idAnaliseRC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRC)->max('id');
        $idLaudoRC = DB::table('laudos')->where('analise_id', '=', $idAnaliseRC)->value('id');
        $statusRC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRC)->value('status_id');
        //MOTOR AUXILIAR CORTE DE APARA #1 LADO MOTOR
        $tag_MACA1LM = "TE 72 200 210 363 000 - 000052";
        $idAtividadeMACA1LM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MACA1LM)->value('id');
        $idAnaliseMACA1LM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMACA1LM)->max('id');
        $idLaudoMACA1LM = DB::table('laudos')->where('analise_id', '=', $idAnaliseMACA1LM)->value('id');
        $statusMACA1LM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMACA1LM)->value('status_id');
        //MOTOR AUXILIAR CORTE DE APARA #2 LADO OPERADOR
        $tag_MACA2LO = "TE 72 200 210 363 000 - 000009";
        $idAtividadeMACA2LO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MACA2LO)->value('id');
        $idAnaliseMACA2LO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMACA2LO)->max('id');
        $idLaudoMACA2LO = DB::table('laudos')->where('analise_id', '=', $idAnaliseMACA2LO)->value('id');
        $statusMACA2LO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMACA2LO)->value('status_id');
        //PICOTADEIRA
        $tag_PIC = "TE 72 200 210 363 000 - 000010";
        $idAtividadePIC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PIC)->value('id');
        $idAnalisePIC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePIC)->max('id');
        $idLaudoPIC = DB::table('laudos')->where('analise_id', '=', $idAnalisePIC)->value('id');
        $statusPIC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePIC)->value('status_id');
        //TENSOR #1
        $tag_TEN1 = "TE 72 200 210 363 000 - 000011";
        $idAtividadeTEN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TEN1)->value('id');
        $idAnaliseTEN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTEN1)->max('id');
        $idLaudoTEN1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTEN1)->value('id');
        $statusTEN1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTEN1)->value('status_id');
        //APOIO TENSOR #1
        $tag_AT1 = "TE 72 200 210 363 000 - 000053";
        $idAtividadeAT1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AT1)->value('id');
        $idAnaliseAT1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAT1)->max('id');
        $idLaudoAT1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAT1)->value('id');
        $statusAT1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAT1)->value('status_id');
        //APOIO TENSOR #3
        $tag_AT3 = "TE 72 200 210 363 000 - 000012";
        $idAtividadeAT3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AT3)->value('id');
        $idAnaliseAT3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAT3)->max('id');
        $idLaudoAT3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAT3)->value('id');
        $statusAT3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAT3)->value('status_id');
        //RETIFICADOR 630W - MASTER
        $tag_RM = "TE 72 200 210 363 000 - 000014";
        $idAtividadeRM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RM)->value('id');
        $idAnaliseRM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRM)->max('id');
        $idLaudoRM = DB::table('laudos')->where('analise_id', '=', $idAnaliseRM)->value('id');
        $statusRM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRM)->value('status_id');
        //RETIFICADOR 630W - SLAVE
        $tag_RS = "TE 72 200 210 363 000 - 000054";
        $idAtividadeRS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS)->value('id');
        $idAnaliseRS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS)->max('id');
        $idLaudoRS = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS)->value('id');
        $statusRS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS)->value('status_id');
        //DRIVE ENROLADEIRA
        $tag_DE = "TE 72 200 210 363 000 - 000015";
        $idAtividadeDE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DE)->value('id');
        $idAnaliseDE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDE)->max('id');
        $idLaudoDE = DB::table('laudos')->where('analise_id', '=', $idAnaliseDE)->value('id');
        $statusDE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDE)->value('status_id');
    //ROLO SECADOR 1 - 17
        //ROLO SECADOR #1
        $tag_RS1 = "TE 72 200 210 363 000 - 000001";
        $idAtividadeRS1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS1)->value('id');
        $idAnaliseRS1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS1)->max('id');
        $idLaudoRS1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS1)->value('id');
        $statusRS1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS1)->value('status_id');
        //ROLO SECADOR #2
        $tag_RS2 = "TE 72 200 210 363 000 - 000016";
        $idAtividadeRS2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS2)->value('id');
        $idAnaliseRS2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS2)->max('id');
        $idLaudoRS2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS2)->value('id');
        $statusRS2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS2)->value('status_id');
        //ROLO SECADOR #3
        $tag_RS3 = "TE 72 200 210 363 000 - 000017";
        $idAtividadeRS3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS3)->value('id');
        $idAnaliseRS3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS3)->max('id');
        $idLaudoRS3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS3)->value('id');
        $statusRS3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS3)->value('status_id');
        //ROLO SECADOR #4
        $tag_RS4 = "TE 72 200 210 363 000 - 000018";
        $idAtividadeRS4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS4)->value('id');
        $idAnaliseRS4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS4)->max('id');
        $idLaudoRS4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS4)->value('id');
        $statusRS4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS4)->value('status_id');
        //ROLO SECADOR #5
        $tag_RS5 = "TE 72 200 210 363 000 - 000002";
        $idAtividadeRS5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS5)->value('id');
        $idAnaliseRS5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS5)->max('id');
        $idLaudoRS5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS5)->value('id');
        $statusRS5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS5)->value('status_id');
        //ROLO SECADOR #6
        $tag_RS6 = "TE 72 200 210 363 000 - 000019";
        $idAtividadeRS6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS6)->value('id');
        $idAnaliseRS6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS6)->max('id');
        $idLaudoRS6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS6)->value('id');
        $statusRS6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS6)->value('status_id');
        //ROLO SECADOR #7
        $tag_RS7 = "TE 72 200 210 363 000 - 000020";
        $idAtividadeRS7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS7)->value('id');
        $idAnaliseRS7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS7)->max('id');
        $idLaudoRS7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS7)->value('id');
        $statusRS7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS7)->value('status_id');
        //ROLO SECADOR #8
        $tag_RS8 = "TE 72 200 210 363 000 - 000021";
        $idAtividadeRS8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS8)->value('id');
        $idAnaliseRS8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS8)->max('id');
        $idLaudoRS8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS8)->value('id');
        $statusRS8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS8)->value('status_id');
        //ROLO SECADOR #9
        $tag_RS9 = "TE 72 200 210 363 000 - 000003";
        $idAtividadeRS9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS9)->value('id');
        $idAnaliseRS9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS9)->max('id');
        $idLaudoRS9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS9)->value('id');
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
        $idLaudoRS11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS11)->value('id');
        $statusRS11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS11)->value('status_id');
        //ROLO SECADOR #12
        $tag_RS12 = "TE 72 200 210 363 000 - 000024";
        $idAtividadeRS12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS12)->value('id');
        $idAnaliseRS12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS12)->max('id');
        $idLaudoRS12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS12)->value('id');
        $statusRS12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS12)->value('status_id');
        //ROLO SECADOR #13
        $tag_RS13 = "TE 72 200 210 363 000 - 000025";
        $idAtividadeRS13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS13)->value('id');
        $idAnaliseRS13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS13)->max('id');
        $idLaudoRS13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS13)->value('id');
        $statusRS13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS13)->value('status_id');
        //ROLO SECADOR #14
        $tag_RS14 = "TE 72 200 210 363 000 - 000004";
        $idAtividadeRS14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS14)->value('id');
        $idAnaliseRS14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS14)->max('id');
        $idLaudoRS14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS14)->value('id');
        $statusRS14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS14)->value('status_id');
        //ROLO SECADOR #15
        $tag_RS15 = "TE 72 200 210 363 000 - 000026";
        $idAtividadeRS15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS15)->value('id');
        $idAnaliseRS15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS15)->max('id');
        $idLaudoRS15 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS15)->value('id');
        $statusRS15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS15)->value('status_id');
        //ROLO SECADOR #16
        $tag_RS16 = "TE 72 200 210 363 000 - 000027";
        $idAtividadeRS16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS16)->value('id');
        $idAnaliseRS16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS16)->max('id');
        $idLaudoRS16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS16)->value('id');
        $statusRS16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS16)->value('status_id');
        //ROLO SECADOR #17
        $tag_RS17 = "TE 72 200 210 363 000 - 000028";
        $idAtividadeRS17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS17)->value('id');
        $idAnaliseRS17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS17)->max('id');
        $idLaudoRS17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS17)->value('id');
        $statusRS17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS17)->value('status_id');
        //MOTOR DE AJUSTE LARGURA TRIMMER
        $tag_MALT = "TE 72 200 210 363 000 - 000005";
        $idAtividadeMALT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MALT)->value('id');
        $idAnaliseMALT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMALT)->max('id');
        $idLaudoMALT = DB::table('laudos')->where('analise_id', '=', $idAnaliseMALT)->value('id');
        $statusMALT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMALT)->value('status_id');
        //AJUSTE CORTE APARA GAP "A" LADO OPERADOR - 1
        $tag_ACAGALO_1 = "TE 72 200 210 363 000 - 000055";
        $idAtividadeACAGALO_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGALO_1)->value('id');
        $idAnaliseACAGALO_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGALO_1)->max('id');
        $idLaudoACAGALO_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACAGALO_1)->value('id');
        $statusACAGALO_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGALO_1)->value('status_id');
        //AJUSTE CORTE APARA GAP "A" LADO MOTOR - 2
        $tag_ACALM_2 = "TE 72 200 210 363 000 - 000056";
        $idAtividadeACALM_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACALM_2)->value('id');
        $idAnaliseACALM_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACALM_2)->max('id');
        $idLaudoACALM_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACALM_2)->value('id');
        $statusACALM_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACALM_2)->value('status_id');
        //AJUSTE CORTE APARA GAP "A" LADO OPERADOR - 3
        $tag_ACALO_3 = "TE 72 200 210 363 000 - 000057";
        $idAtividadeACALO_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACALO_3)->value('id');
        $idAnaliseACALO_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACALO_3)->max('id');
        $idLaudoACALO_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACALO_3)->value('id');
        $statusACALO_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACALO_3)->value('status_id');
        //AJUSTE CORTE APARA GAP "A" LADO MOTOR - 4
        $tag_ACALM_4 = "TE 72 200 210 363 000 - 000006";
        $idAtividadeACALM_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACALM_4)->value('id');
        $idAnaliseACALM_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACALM_4)->max('id');
        $idLaudoACALM_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACALM_4)->value('id');
        $statusACALM_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACALM_4)->value('status_id');
        //AJUSTE CORTE APARA GAP "B" LADO OPERADOR - 1
        $tag_ACAGBLO_1 = "TE 72 200 210 363 000 - 000058";
        $idAtividadeACAGBLO_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGBLO_1)->value('id');
        $idAnaliseACAGBLO_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGBLO_1)->max('id');
        $idLaudoACAGBLO_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACAGBLO_1)->value('id');
        $statusACAGBLO_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGBLO_1)->value('status_id');
        //AJUSTE CORTE APARA GAP "B" LADO MOTOR - 2
        $tag_ACAGBLM_2 = "TE 72 200 210 363 000 - 000059";
        $idAtividadeACAGBLM_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGBLM_2)->value('id');
        $idAnaliseACAGBLM_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGBLM_2)->max('id');
        $idLaudoACAGBLM_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACAGBLM_2)->value('id');
        $statusACAGBLM_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGBLM_2)->value('status_id');
        //AJUSTE CORTE APARA GAP "B" LADO OPERADOR - 3
        $tag_ACAGBLO_3 = "TE 72 200 210 363 000 - 000060";
        $idAtividadeACAGBLO_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGBLO_3)->value('id');
        $idAnaliseACAGBLO_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGBLO_3)->max('id');
        $idLaudoACAGBLO_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACAGBLO_3)->value('id');
        $statusACAGBLO_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGBLO_3)->value('status_id');
        //AJUSTE CORTE APARA GAP "B" LADO MOTOR - 4
        $tag_ACAGBLM_4 = "TE 72 200 210 363 000 - 000061";
        $idAtividadeACAGBLM_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAGBLM_4)->value('id');
        $idAnaliseACAGBLM_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAGBLM_4)->max('id');
        $idLaudoACAGBLM_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACAGBLM_4)->value('id');
        $statusACAGBLM_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAGBLM_4)->value('status_id');
        //TENSOR #2
        $tag_TENSOR_2 = "TE 72 200 210 363 000 - 000007";
        $idAtividadeTENSOR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TENSOR_2)->value('id');
        $idAnaliseTENSOR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTENSOR_2)->max('id');
        $idLaudoTENSOR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTENSOR_2)->value('id');
        $statusTENSOR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTENSOR_2)->value('status_id');
        //TENSOR #3
        $tag_TENSOR_3 = "TE 72 200 210 363 000 - 000029";
        $idAtividadeTENSOR_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TENSOR_3)->value('id');
        $idAnaliseTENSOR_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTENSOR_3)->max('id');
        $idLaudoTENSOR_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTENSOR_3)->value('id');
        $statusTENSOR_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTENSOR_3)->value('status_id');
        //ENTRADA
        $tag_ENTRADA = "TE 72 200 210 363 000 - 000030";
        $idAtividadeENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ENTRADA)->value('id');
        $idAnaliseENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENTRADA)->max('id');
        $idLaudoENTRADA = DB::table('laudos')->where('analise_id', '=', $idAnaliseENTRADA)->value('id');
        $statusENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENTRADA)->value('status_id');
        //MODULO DE FRENAGEM
        $tag_MDF = "TE 72 200 210 363 000 - 000037";
        $idAtividadeMDF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MDF)->value('id');
        $idAnaliseMDF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMDF)->max('id');
        $idLaudoMDF = DB::table('laudos')->where('analise_id', '=', $idAnaliseMDF)->value('id');
        $statusMDF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMDF)->value('status_id');
        //SECCIONADORA ENROLADEIRA
        $tag_SE = "TE 72 200 210 363 000 - 000045";
        $idAtividadeSE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SE)->value('id');
        $idAnaliseSE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSE)->max('id');
        $idLaudoSE = DB::table('laudos')->where('analise_id', '=', $idAnaliseSE)->value('id');
        $statusSE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSE)->value('status_id');
        //PAINEL DE EMERGÊNCIA 05B5DB05
        $tag_PDE_05B5DB05 = "TE 72 200 210 404 003 - 000002";
        $idAtividadePDE_05B5DB05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PDE_05B5DB05)->value('id');
        $idAnalisePDE_05B5DB05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePDE_05B5DB05)->max('id');
        $idLaudoPDE_05B5DB05 = DB::table('laudos')->where('analise_id', '=', $idAnalisePDE_05B5DB05)->value('id');
        $statusPDE_05B5DB05 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePDE_05B5DB05)->value('status_id');
        //PAINEL DE EMERGÊNCIA 05B5DB06
        $tag_PDE_05B5DB06 = "TE 72 200 210 404 003 - 000001";
        $idAtividadePDE_05B5DB06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PDE_05B5DB06)->value('id');
        $idAnalisePDE_05B5DB06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePDE_05B5DB06)->max('id');
        $idLaudoPDE_05B5DB06 = DB::table('laudos')->where('analise_id', '=', $idAnalisePDE_05B5DB06)->value('id');
        $statusPDE_05B5DB06 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePDE_05B5DB06)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_decapagem_drives')
                ->with('idLaudoDESENROLADEIRA', $idLaudoDESENROLADEIRA)->with('statusDESENROLADEIRA', $statusDESENROLADEIRA)
                ->with('idLaudoDESEMPENADEIRA', $idLaudoDESEMPENADEIRA)->with('statusDESEMPENADEIRA', $statusDESEMPENADEIRA)
                ->with('idLaudoRC', $idLaudoRC)->with('statusRC', $statusRC)
                ->with('idLaudoMACA1LM', $idLaudoMACA1LM)->with('statusMACA1LM', $statusMACA1LM)
                ->with('idLaudoMACA2LO', $idLaudoMACA2LO)->with('statusMACA2LO', $statusMACA2LO)
                ->with('idLaudoPIC', $idLaudoPIC)->with('statusPIC', $statusPIC)
                ->with('idLaudoTEN1', $idLaudoTEN1)->with('statusTEN1', $statusTEN1)
                ->with('idLaudoAT1', $idLaudoAT1)->with('statusAT1', $statusAT1)
                ->with('idLaudoAT3', $idLaudoAT3)->with('statusAT3', $statusAT3)
                ->with('idLaudoRM', $idLaudoRM)->with('statusRM', $statusRM)
                ->with('idLaudoRS', $idLaudoRS)->with('statusRS', $statusRS)
                ->with('idLaudoDE', $idLaudoDE)->with('statusDE', $statusDE)
                ->with('idLaudoRS1', $idLaudoRS1)->with('statusRS1', $statusRS1)
                ->with('idLaudoRS2', $idLaudoRS2)->with('statusRS2', $statusRS2)
                ->with('idLaudoRS3', $idLaudoRS3)->with('statusRS3', $statusRS3)
                ->with('idLaudoRS4', $idLaudoRS4)->with('statusRS4', $statusRS4)
                ->with('idLaudoRS5', $idLaudoRS5)->with('statusRS5', $statusRS5)
                ->with('idLaudoRS6', $idLaudoRS6)->with('statusRS6', $statusRS6)
                ->with('idLaudoRS7', $idLaudoRS7)->with('statusRS7', $statusRS7)
                ->with('idLaudoRS8', $idLaudoRS8)->with('statusRS8', $statusRS8)
                ->with('idLaudoRS9', $idLaudoRS9)->with('statusRS9', $statusRS9)
                ->with('idLaudoRS10', $idLaudoRS10)->with('statusRS10', $statusRS10)
                ->with('idLaudoRS11', $idLaudoRS11)->with('statusRS11', $statusRS11)
                ->with('idLaudoRS12', $idLaudoRS12)->with('statusRS12', $statusRS12)
                ->with('idLaudoRS13', $idLaudoRS13)->with('statusRS13', $statusRS13)
                ->with('idLaudoRS14', $idLaudoRS14)->with('statusRS14', $statusRS14)
                ->with('idLaudoRS15', $idLaudoRS15)->with('statusRS15', $statusRS15)
                ->with('idLaudoRS16', $idLaudoRS16)->with('statusRS16', $statusRS16)
                ->with('idLaudoRS17', $idLaudoRS17)->with('statusRS17', $statusRS17)
                ->with('idLaudoMALT', $idLaudoMALT)->with('statusMALT', $statusMALT)
                ->with('idLaudoACAGALO_1', $idLaudoACAGALO_1)->with('statusACAGALO_1', $statusACAGALO_1)
                ->with('idLaudoACALM_2', $idLaudoACALM_2)->with('statusACALM_2', $statusACALM_2)
                ->with('idLaudoACALO_3', $idLaudoACALO_3)->with('statusACALO_3', $statusACALO_3)
                ->with('idLaudoACALM_4', $idLaudoACALM_4)->with('statusACALM_4', $statusACALM_4)
                ->with('idLaudoACAGBLO_1', $idLaudoACAGBLO_1)->with('statusACAGBLO_1', $statusACAGBLO_1)
                ->with('idLaudoACAGBLM_2', $idLaudoACAGBLM_2)->with('statusACAGBLM_2', $statusACAGBLM_2)
                ->with('idLaudoACAGBLO_3', $idLaudoACAGBLO_3)->with('statusACAGBLO_3', $statusACAGBLO_3)
                ->with('idLaudoACAGBLM_4', $idLaudoACAGBLM_4)->with('statusACAGBLM_4', $statusACAGBLM_4)
                ->with('idLaudoTENSOR_2', $idLaudoTENSOR_2)->with('statusTENSOR_2', $statusTENSOR_2)
                ->with('idLaudoTENSOR_3', $idLaudoTENSOR_3)->with('statusTENSOR_3', $statusTENSOR_3)
                ->with('idLaudoENTRADA', $idLaudoENTRADA)->with('statusENTRADA', $statusENTRADA)
                ->with('idLaudoMDF', $idLaudoMDF)->with('statusMDF', $statusMDF)
                ->with('idLaudoSE', $idLaudoSE)->with('statusSE', $statusSE)
                ->with('idLaudoPDE_05B5DB05', $idLaudoPDE_05B5DB05)->with('statusPDE_05B5DB05', $statusPDE_05B5DB05)
                ->with('idLaudoPDE_05B5DB06', $idLaudoPDE_05B5DB06)->with('statusPDE_05B5DB06', $statusPDE_05B5DB06)
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

    public function decapagem_emergencia() {
        //NÃO UTILIZAR
        return view('csn.relatoriosTecnicos.termografia_decapagem_emergencia');
    }
    //--- LAMINADOR
    public function laminador_ets() {
        //ESTAÇÃO REMOTA - ET01
        $tag_ER_1 = "TE 72 300 310 381 003 - 000001";
        $idAtividadeER_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_1)->value('id');
        $idAnaliseER_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_1)->max('id');
        $idLaudoER_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_1)->value('id');
        $statusER_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_1)->value('status_id');
        //ESTAÇÃO REMOTA - ET02
        $tag_ER_2 = "TE 72 300 310 381 006 - 000001";
        $idAtividadeER_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_2)->value('id');
        $idAnaliseER_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_2)->max('id');
        $idLaudoER_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_2)->value('id');
        $statusER_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_2)->value('status_id');
        //ESTAÇÃO REMOTA - ET03
        $tag_ER_3 = "TE 72 300 310 381 009 - 000001";
        $idAtividadeER_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_3)->value('id');
        $idAnaliseER_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_3)->max('id');
        $idLaudoER_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_3)->value('id');
        $statusER_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_3)->value('status_id');
        //ESTAÇÃO REMOTA - ET04
        $tag_ER_4 = "TE 72 300 310 381 012 - 000001";
        $idAtividadeER_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_4)->value('id');
        $idAnaliseER_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_4)->max('id');
        $idLaudoER_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_4)->value('id');
        $statusER_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_4)->value('status_id');
        //ESTAÇÃO REMOTA - ET05
        $tag_ER_5 = "TE 72 300 310 381 015 - 000001";
        $idAtividadeER_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_5)->value('id');
        $idAnaliseER_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_5)->max('id');
        $idLaudoER_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_5)->value('id');
        $statusER_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_5)->value('status_id');
        //ESTAÇÃO REMOTA - ET06
        $tag_ER_6 = "TE 72 300 310 381 018 - 000001";
        $idAtividadeER_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_6)->value('id');
        $idAnaliseER_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_6)->max('id');
        $idLaudoER_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_6)->value('id');
        $statusER_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_6)->value('status_id');
        //ESTAÇÃO REMOTA - ET07
        $tag_ER_7 = "TE 72 300 310 381 021 - 000001";
        $idAtividadeER_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_7)->value('id');
        $idAnaliseER_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_7)->max('id');
        $idLaudoER_7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_7)->value('id');
        $statusER_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_7)->value('status_id');
        //ESTAÇÃO REMOTA - ET08
        $tag_ER_8 = "TE 72 300 310 381 024 - 000001";
        $idAtividadeER_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_8)->value('id');
        $idAnaliseER_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_8)->max('id');
        $idLaudoER_8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_8)->value('id');
        $statusER_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_8)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_laminador_ets')
        ->with('idLaudoER_1', $idLaudoER_1)->with('statusER_1', $statusER_1)
        ->with('idLaudoER_2', $idLaudoER_2)->with('statusER_2', $statusER_2)
        ->with('idLaudoER_3', $idLaudoER_3)->with('statusER_3', $statusER_3)
        ->with('idLaudoER_4', $idLaudoER_4)->with('statusER_4', $statusER_4)
        ->with('idLaudoER_5', $idLaudoER_5)->with('statusER_5', $statusER_5)
        ->with('idLaudoER_6', $idLaudoER_6)->with('statusER_6', $statusER_6)
        ->with('idLaudoER_7', $idLaudoER_7)->with('statusER_7', $statusER_7)
        ->with('idLaudoER_8', $idLaudoER_8)->with('statusER_8', $statusER_8)
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

    public function laminador_ccm1() {
    //CCM1
        //BD02 - TANQUE AGITADOR PRINCIPAL
        $tag_TAP = "TE 72 300 310 318 000 - 000003";
        $idAtividadeTAP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TAP)->value('id');
        $idAnaliseTAP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTAP)->max('id');
        $idLaudoTAP = DB::table('laudos')->where('analise_id', '=', $idAnaliseTAP)->value('id');
        $statusTAP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTAP)->value('status_id');
        //BOMBA DE FILTRO A VÁCUO
        $tag_BDFV = "TE 72 300 310 318 000 - 000004";
        $idAtividadeBDFV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BDFV)->value('id');
        $idAnaliseBDFV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDFV)->max('id');
        $idLaudoBDFV = DB::table('laudos')->where('analise_id', '=', $idAnaliseBDFV)->value('id');
        $statusBDFV = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDFV)->value('status_id');
        //BD03 - BOMBA DE FILTRO A VÁCUO
        $tag_BDFV_2 = "TE 72 300 310 318 000 - 000005";
        $idAtividadeBDFV_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BDFV_2)->value('id');
        $idAnaliseBDFV_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBDFV_2)->max('id');
        $idLaudoBDFV_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBDFV_2)->value('id');
        $statusBDFV_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBDFV_2)->value('status_id');
        //BD05 - EXAUSTOR DE GASES
        $tag_EDG = "TE 72 300 310 318 000 - 000006";
        $idAtividadeEDG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EDG)->value('id');
        $idAnaliseEDG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEDG)->max('id');
        $idLaudoEDG = DB::table('laudos')->where('analise_id', '=', $idAnaliseEDG)->value('id');
        $statusEDG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEDG)->value('status_id');
        //BE03 - BOMBA Nº1 - SISTEMA HIDRÁULICO DE ALTA PRESSÃO
        $tag_B_2_SHAP = "TE 72 300 310 318 000 - 000012";
        $idAtividadeB_2_SHAP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_2_SHAP)->value('id');
        $idAnaliseB_2_SHAP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_2_SHAP)->max('id');
        $idLaudoB_2_SHAP = DB::table('laudos')->where('analise_id', '=', $idAnaliseB_2_SHAP)->value('id');
        $statusB_2_SHAP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_2_SHAP)->value('status_id');
        //BE02 - BOMBA Nº2 - SISTEMA HIDRÁULICO DE ALTA PRESSÃO
        $tag_B_1_SHAP = "TE 72 300 310 318 000 - 000011";
        $idAtividadeB_1_SHAP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_1_SHAP)->value('id');
        $idAnaliseB_1_SHAP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_1_SHAP)->max('id');
        $idLaudoB_1_SHAP = DB::table('laudos')->where('analise_id', '=', $idAnaliseB_1_SHAP)->value('id');
        $statusB_1_SHAP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_1_SHAP)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_laminador_ccm1')
              ->with('idLaudoTAP', $idLaudoTAP)->with('statusTAP', $statusTAP)
              ->with('idLaudoBDFV', $idLaudoBDFV)->with('statusBDFV', $statusBDFV)
              ->with('idLaudoBDFV_2', $idLaudoBDFV_2)->with('statusBDFV_2', $statusBDFV_2)
              ->with('idLaudoEDG', $idLaudoEDG)->with('statusEDG', $statusEDG)
              ->with('idLaudoB_2_SHAP', $idLaudoB_2_SHAP)->with('statusB_2_SHAP', $statusB_2_SHAP)
              ->with('idLaudoB_1_SHAP', $idLaudoB_1_SHAP)->with('statusB_1_SHAP', $statusB_1_SHAP)
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

    public function laminador_ccm2() {
         //CCM2
        //BD09 - BOMBA N°3 - SISTEMA HIDRÁULICO DE BAIXA PRESSÃO
        $tag_B_3_SHBP = "TE 72 300 310 318 000 - 000009";
        $idAtividadeB_3_SHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_3_SHBP)->value('id');
        $idAnaliseB_3_SHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_3_SHBP)->max('id');
        $idLaudoB_3_SHBP = DB::table('laudos')->where('analise_id', '=', $idAnaliseB_3_SHBP)->value('id');
        $statusB_3_SHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_3_SHBP)->value('status_id');
        //BOMBA N°4 - SISTEMA HIDRÁULICO DE BAIXA PRESSÃO
        $tag_B_4_SHBP = "TE 72 300 310 318 000 - 000010";
        $idAtividadeB_4_SHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_4_SHBP)->value('id');
        $idAnaliseB_4_SHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_4_SHBP)->max('id');
        $idLaudoB_4_SHBP = DB::table('laudos')->where('analise_id', '=', $idAnaliseB_4_SHBP)->value('id');
        $statusB_4_SHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_4_SHBP)->value('status_id');
        //BD08 - BOMBA DE RECIRCULAÇÃO
        $tag_BR = "TE 72 300 310 318 000 - 000039";
        $idAtividadeBR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR)->value('id');
        $idAnaliseBR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR)->max('id');
        $idLaudoBR = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR)->value('id');
        $statusBR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR)->value('status_id');
        //BOMBA N°1 - SISTEMA HIDRÁULICO DE BAIXA PRESSÃO
        $tag_B_1_SHBP = "TE 72 300 310 318 000 - 000007";
        $idAtividadeB_1_SHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_1_SHBP)->value('id');
        $idAnaliseB_1_SHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_1_SHBP)->max('id');
        $idLaudoB_1_SHBP = DB::table('laudos')->where('analise_id', '=', $idAnaliseB_1_SHBP)->value('id');
        $statusB_1_SHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_1_SHBP)->value('status_id');
        //BOMBA N°2 - SISTEMA HIDRÁULICO DE BAIXA PRESSÃO
        $tag_B_2_SHBP = "TE 72 300 310 318 000 - 000008";
        $idAtividadeB_2_SHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_2_SHBP)->value('id');
        $idAnaliseB_2_SHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_2_SHBP)->max('id');
        $idLaudoB_2_SHBP = DB::table('laudos')->where('analise_id', '=', $idAnaliseB_2_SHBP)->value('id');
        $statusB_2_SHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_2_SHBP)->value('status_id');
        //BA01 - BARRAMENTO DE ALIMENTAÇÃO
        $tag_BA_1 = "TE 72 300 310 318 000 - 000001";
        $idAtividadeBA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BA_1)->value('id');
        $idAnaliseBA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBA_1)->max('id');
        $idLaudoBA_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBA_1)->value('id');
        $statusBA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBA_1)->value('status_id');
        //BA02 - BARRAMENTO DE ALIMENTAÇÃO
        $tag_BA_2 = "TE 72 300 310 318 000 - 000002";
        $idAtividadeBA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BA_2)->value('id');
        $idAnaliseBA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBA_2)->max('id');
        $idLaudoBA_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBA_2)->value('id');
        $statusBA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBA_2)->value('status_id');
        //CB04 - ALIMENTAÇÃO ET'S - 06B5CB04B
        $tag_AE_06B5CB04B = "TE 72 300 310 802 000 - 000009";
        $idAtividadeAE_06B5CB04B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AE_06B5CB04B)->value('id');
        $idAnaliseAE_06B5CB04B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE_06B5CB04B)->max('id');
        $idLaudoAE_06B5CB04B = DB::table('laudos')->where('analise_id', '=', $idAnaliseAE_06B5CB04B)->value('id');
        $statusAE_06B5CB04B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE_06B5CB04B)->value('status_id');
        //ALIMENTAÇÃO ET'S - 06B5CB04A
        $tag_AE_06B5CB04A = "TE 72 300 310 802 000 - 000008";
        $idAtividadeAE_06B5CB04A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AE_06B5CB04A)->value('id');
        $idAnaliseAE_06B5CB04A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE_06B5CB04A)->max('id');
        $idLaudoAE_06B5CB04A = DB::table('laudos')->where('analise_id', '=', $idAnaliseAE_06B5CB04A)->value('id');
        $statusAE_06B5CB04A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE_06B5CB04A)->value('status_id');
        //CB03 - ALIMENTAÇÃO ET'S - 06B5CB03B
        $tag_AE_06B5CB03B = "TE 72 300 310 802 000 - 000007";
        $idAtividadeAE_06B5CB03B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AE_06B5CB03B)->value('id');
        $idAnaliseAE_06B5CB03B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE_06B5CB03B)->max('id');
        $idLaudoAE_06B5CB03B = DB::table('laudos')->where('analise_id', '=', $idAnaliseAE_06B5CB03B)->value('id');
        $statusAE_06B5CB03B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE_06B5CB03B)->value('status_id');
        //ALIMENTAÇÃO ET'S - 06B5CB03A
        $tag_AE_06B5CB03A = "TE 72 300 310 802 000 - 000006";
        $idAtividadeAE_06B5CB03A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AE_06B5CB03A)->value('id');
        $idAnaliseAE_06B5CB03A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAE_06B5CB03A)->max('id');
        $idLaudoAE_06B5CB03A = DB::table('laudos')->where('analise_id', '=', $idAnaliseAE_06B5CB03A)->value('id');
        $statusAE_06B5CB03A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAE_06B5CB03A)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_laminador_ccm2')
                ->with('idLaudoB_3_SHBP', $idLaudoB_3_SHBP)->with('statusB_3_SHBP', $statusB_3_SHBP)
                ->with('idLaudoB_4_SHBP', $idLaudoB_4_SHBP)->with('statusB_4_SHBP', $statusB_4_SHBP)
                ->with('idLaudoBR', $idLaudoBR)->with('statusBR', $statusBR)
                ->with('idLaudoB_1_SHBP', $idLaudoB_1_SHBP)->with('statusB_1_SHBP', $statusB_1_SHBP)
                ->with('idLaudoB_2_SHBP', $idLaudoB_2_SHBP)->with('statusB_2_SHBP', $statusB_2_SHBP)
                ->with('idLaudoBA_1', $idLaudoBA_1)->with('statusBA_1', $statusBA_1)
                ->with('idLaudoBA_2', $idLaudoBA_2)->with('statusBA_2', $statusBA_2)
                ->with('idLaudoAE_06B5CB04B', $idLaudoAE_06B5CB04B)->with('statusAE_06B5CB04B', $statusAE_06B5CB04B)
                ->with('idLaudoAE_06B5CB04A', $idLaudoAE_06B5CB04A)->with('statusAE_06B5CB04A', $statusAE_06B5CB04A)
                ->with('idLaudoAE_06B5CB03B', $idLaudoAE_06B5CB03B)->with('statusAE_06B5CB03B', $statusAE_06B5CB03B)
                ->with('idLaudoAE_06B5CB03A', $idLaudoAE_06B5CB03A)->with('statusAE_06B5CB03A', $statusAE_06B5CB03A)
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

    public function laminador_salaPLC() {
        //PAINEL DE EMERGÊNCIA - 06B5CC01
        $tag_PE_06B5CC01 = "TE 72 300 310 802 000 - 000010";
        $idAtividadePE_06B5CC01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_06B5CC01)->value('id');
        $idAnalisePE_06B5CC01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_06B5CC01)->max('id');
        $idLaudoPE_06B5CC01 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_06B5CC01)->value('id');
        $statusPE_06B5CC01 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_06B5CC01)->value('status_id');
        //PAINEL DE EMERGÊNCIA - 06B5CC02
        $tag_PE_06B5CC02 = "TE 72 300 310 802 000 - 000011";
        $idAtividadePE_06B5CC02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_06B5CC02)->value('id');
        $idAnalisePE_06B5CC02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_06B5CC02)->max('id');
        $idLaudoPE_06B5CC02 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_06B5CC02)->value('id');
        $statusPE_06B5CC02 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_06B5CC02)->value('status_id');
        //PAINEL DE EMERGÊNCIA - 06B5CC03
        $tag_PE_06B5CC03 = "TE 72 300 310 802 000 - 000012";
        $idAtividadePE_06B5CC03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_06B5CC03)->value('id');
        $idAnalisePE_06B5CC03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_06B5CC03)->max('id');
        $idLaudoPE_06B5CC03 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_06B5CC03)->value('id');
        $statusPE_06B5CC03 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_06B5CC03)->value('status_id');
        //PAINEL DE EMERGÊNCIA - 06B5CC04
        $tag_PE_06B5CC04 = "TE 72 300 310 802 000 - 000013";
        $idAtividadePE_06B5CC04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_06B5CC04)->value('id');
        $idAnalisePE_06B5CC04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_06B5CC04)->max('id');
        $idLaudoPE_06B5CC04 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_06B5CC04)->value('id');
        $statusPE_06B5CC04 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_06B5CC04)->value('status_id');
        // S7 400 CPU MTX / MTN-RCH
        $tag_S7_400_CPU_MTX = "TE 72 300 310 802 000 - 000014";
        $idAtividadeS7_400_CPU_MTX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S7_400_CPU_MTX)->value('id');
        $idAnaliseS7_400_CPU_MTX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS7_400_CPU_MTX)->max('id');
        $idLaudoS7_400_CPU_MTX = DB::table('laudos')->where('analise_id', '=', $idAnaliseS7_400_CPU_MTX)->value('id');
        $statusS7_400_CPU_MTX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS7_400_CPU_MTX)->value('status_id');
        //S7 400 CPU EMU / MÊS
        $tag_S7_400_CPU_EMU = "TE 72 300 310 802 000 - 000017";
        $idAtividadeS7_400_CPU_EMU = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S7_400_CPU_EMU)->value('id');
        $idAnaliseS7_400_CPU_EMU = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS7_400_CPU_EMU)->max('id');
        $idLaudoS7_400_CPU_EMU = DB::table('laudos')->where('analise_id', '=', $idAnaliseS7_400_CPU_EMU)->value('id');
        $statusS7_400_CPU_EMU = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS7_400_CPU_EMU)->value('status_id');
        // OS6, OS7 / ES3 - RCM SERVER
        $tag_OS6_OS7_ES3 = "TE 72 300 310 802 000 - 000016";
        $idAtividadeOS6_OS7_ES3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_OS6_OS7_ES3)->value('id');
        $idAnaliseOS6_OS7_ES3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOS6_OS7_ES3)->max('id');
        $idLaudoOS6_OS7_ES3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseOS6_OS7_ES3)->value('id');
        $statusOS6_OS7_ES3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOS6_OS7_ES3)->value('status_id');
        //TDC (CPU COMFU)
        $tag_TDC_CPU_COMFU = "TE 72 300 310 802 000 - 000001";
        $idAtividadeTDC_CPU_COMFU = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TDC_CPU_COMFU)->value('id');
        $idAnaliseTDC_CPU_COMFU = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTDC_CPU_COMFU)->max('id');
        $idLaudoTDC_CPU_COMFU = DB::table('laudos')->where('analise_id', '=', $idAnaliseTDC_CPU_COMFU)->value('id');
        $statusTDC_CPU_COMFU = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTDC_CPU_COMFU)->value('status_id');
        //TDC (CPU STANDAR) / BFI
        $tag_TDC_CPU_STANDAR_BFI = "TE 72 300 310 802 000 - 000002";
        $idAtividadeTDC_CPU_STANDAR_BFI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TDC_CPU_STANDAR_BFI)->value('id');
        $idAnaliseTDC_CPU_STANDAR_BFI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTDC_CPU_STANDAR_BFI)->max('id');
        $idLaudoTDC_CPU_STANDAR_BFI = DB::table('laudos')->where('analise_id', '=', $idAnaliseTDC_CPU_STANDAR_BFI)->value('id');
        $statusTDC_CPU_STANDAR_BFI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTDC_CPU_STANDAR_BFI)->value('status_id');
        //MEMÓRIA DE DADOS GLOBAL
        $tag_MDG = "TE 72 300 310 802 000 - 000003";
        $idAtividadeMDG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MDG)->value('id');
        $idAnaliseMDG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMDG)->max('id');
        $idLaudoMDG = DB::table('laudos')->where('analise_id', '=', $idAnaliseMDG)->value('id');
        $statusMDG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMDG)->value('status_id');
        //ABB LOAD CELL
        $tag_ABB_LOAD_CELL = "TE 72 300 310 802 000 - 000004";
        $idAtividadeABB_LOAD_CELL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ABB_LOAD_CELL)->value('id');
        $idAnaliseABB_LOAD_CELL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeABB_LOAD_CELL)->max('id');
        $idLaudoABB_LOAD_CELL = DB::table('laudos')->where('analise_id', '=', $idAnaliseABB_LOAD_CELL)->value('id');
        $statusABB_LOAD_CELL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseABB_LOAD_CELL)->value('status_id');
        //SISTEMA DE MEDIÇÃO DA VELOCIDADE DO LASER
        $tag_SMVL = "TE 72 300 310 802 000 - 000005";
        $idAtividadeSMVL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SMVL)->value('id');
        $idAnaliseSMVL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSMVL)->max('id');
        $idLaudoSMVL = DB::table('laudos')->where('analise_id', '=', $idAnaliseSMVL)->value('id');
        $statusSMVL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSMVL)->value('status_id');
        //CONTROLE DO INVERSOR TR2
        $tag_CI_TR2 = "TE 72 300 310 802 000 - 000018";
        $idAtividadeCI_TR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CI_TR2)->value('id');
        $idAnaliseCI_TR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCI_TR2)->max('id');
        $idLaudoCI_TR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCI_TR2)->value('id');
        $statusCI_TR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCI_TR2)->value('status_id');
        //CONTROLE DO INVERSOR MS
        $tag_CI_MS = "TE 72 300 310 802 000 - 000019";
        $idAtividadeCI_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CI_MS)->value('id');
        $idAnaliseCI_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCI_MS)->max('id');
        $idLaudoCI_MS = DB::table('laudos')->where('analise_id', '=', $idAnaliseCI_MS)->value('id');
        $statusCI_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCI_MS)->value('status_id');
        //CONTROLE DO INVERSOR TR1
        $tag_CI_TR1 = "TE 72 300 310 802 000 - 000020";
        $idAtividadeCI_TR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CI_TR1)->value('id');
        $idAnaliseCI_TR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCI_TR1)->max('id');
        $idLaudoCI_TR1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCI_TR1)->value('id');
        $statusCI_TR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCI_TR1)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_laminador_salaPLC')
                ->with('idLaudoPE_06B5CC01', $idLaudoPE_06B5CC01)->with('statusPE_06B5CC01', $statusPE_06B5CC01)
                ->with('idLaudoPE_06B5CC02', $idLaudoPE_06B5CC02)->with('statusPE_06B5CC02', $statusPE_06B5CC02)
                ->with('idLaudoPE_06B5CC03', $idLaudoPE_06B5CC03)->with('statusPE_06B5CC03', $statusPE_06B5CC03)
                ->with('idLaudoPE_06B5CC04', $idLaudoPE_06B5CC04)->with('statusPE_06B5CC04', $statusPE_06B5CC04)
                ->with('idLaudoS7_400_CPU_MTX', $idLaudoS7_400_CPU_MTX)->with('statusS7_400_CPU_MTX', $statusS7_400_CPU_MTX)
                ->with('idLaudoS7_400_CPU_EMU', $idLaudoS7_400_CPU_EMU)->with('statusS7_400_CPU_EMU', $statusS7_400_CPU_EMU)
                ->with('idLaudoOS6_OS7_ES3', $idLaudoOS6_OS7_ES3)->with('statusOS6_OS7_ES3', $statusOS6_OS7_ES3)
                ->with('idLaudoTDC_CPU_COMFU', $idLaudoTDC_CPU_COMFU)->with('statusTDC_CPU_COMFU', $statusTDC_CPU_COMFU)
                ->with('idLaudoTDC_CPU_STANDAR_BFI', $idLaudoTDC_CPU_STANDAR_BFI)->with('statusTDC_CPU_STANDAR_BFI', $statusTDC_CPU_STANDAR_BFI)
                ->with('idLaudoMDG', $idLaudoMDG)->with('statusMDG', $statusMDG)
                ->with('idLaudoABB_LOAD_CELL', $idLaudoABB_LOAD_CELL)->with('statusABB_LOAD_CELL', $statusABB_LOAD_CELL)
                ->with('idLaudoSMVL', $idLaudoSMVL)->with('statusSMVL', $statusSMVL)
                ->with('idLaudoCI_TR2', $idLaudoCI_TR2)->with('statusCI_TR2', $statusCI_TR2)
                ->with('idLaudoCI_MS', $idLaudoCI_MS)->with('statusCI_MS', $statusCI_MS)
                ->with('idLaudoCI_TR1', $idLaudoCI_TR1)->with('statusCI_TR1', $statusCI_TR1)
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

    public function laminador_mainDrives() {
      //VVVF - AUXILIARES DRIVES
        //----------- NÃO CADASTRADO - RETIFICADOR 250KW - MASTER
        $tag_RM_250 = "TE 72 300 310 397 000 - 000001";
        $idAtividadeRM_250 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RM_250)->value('id');
        $idAnaliseRM_250 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRM_250)->max('id');
        $idLaudoRM_250 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRM_250)->value('id');
        $statusRM_250 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRM_250)->value('status_id');
        //SISTEMA DE ALIMENTAÇÃO DE EMULSÃO - BOMBA #1
        $tag_SAE_B_1 = "TE 72 300 310 397 000 - 000002";
        $idAtividadeSAE_B_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAE_B_1)->value('id');
        $idAnaliseSAE_B_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAE_B_1)->max('id');
        $idLaudoSAE_B_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAE_B_1)->value('id');
        $statusSAE_B_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAE_B_1)->value('status_id');
        //EMULSION SYSTEM RETURN PUMPS #2
        $tag_ESRP_2 = "TE 72 300 310 397 000 - 000072";
        $idAtividadeESRP_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ESRP_2)->value('id');
        $idAnaliseESRP_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESRP_2)->max('id');
        $idLaudoESRP_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESRP_2)->value('id');
        $statusESRP_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESRP_2)->value('status_id');
        //EMULSION SYSTEM RETURN PUMPS #1
        $tag_ESRP_1 = "TE 72 300 310 397 000 - 000003";
        $idAtividadeESRP_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ESRP_1)->value('id');
        $idAnaliseESRP_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeESRP_1)->max('id');
        $idLaudoESRP_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseESRP_1)->value('id');
        $statusESRP_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseESRP_1)->value('status_id');
        //ROLO DEFLETOR DE ENTRADA
        $tag_RDE = "TE 72 300 310 397 000 - 000004";
        $idAtividadeRDE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDE)->value('id');
        $idAnaliseRDE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDE)->max('id');
        $idLaudoRDE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRDE)->value('id');
        $statusRDE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDE)->value('status_id');
        //WORK ROLL CHANCING TONG TYPE CARRIAGE
        $tag_WRCTTC = "TE 72 300 310 397 000 - 000033";
        $idAtividadeWRCTTC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WRCTTC)->value('id');
        $idAnaliseWRCTTC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWRCTTC)->max('id');
        $idLaudoWRCTTC = DB::table('laudos')->where('analise_id', '=', $idAnaliseWRCTTC)->value('id');
        $statusWRCTTC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWRCTTC)->value('status_id');
        //WORK ROLL CHANCING SIDE SHIFTER
        $tag_WRCSS = "TE 72 300 310 397 000 - 000032";
        $idAtividadeWRCSS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WRCSS)->value('id');
        $idAnaliseWRCSS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWRCSS)->max('id');
        $idLaudoWRCSS = DB::table('laudos')->where('analise_id', '=', $idAnaliseWRCSS)->value('id');
        $statusWRCSS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWRCSS)->value('status_id');
        //WORK ROLL CHANCING UNDERCARRIAGER - 2
        $tag_WRCU_2 = "TE 72 300 310 397 000 - 000031";
        $idAtividadeWRCU_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WRCU_2)->value('id');
        $idAnaliseWRCU_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWRCU_2)->max('id');
        $idLaudoWRCU_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseWRCU_2)->value('id');
        $statusWRCU_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWRCU_2)->value('status_id');
        //WORK ROLL CHANCING UNDERCARRIAGER - 1
        $tag_WRCU_1 = "TE 72 300 310 397 000 - 000005";
        $idAtividadeWRCU_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WRCU_1)->value('id');
        $idAnaliseWRCU_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWRCU_1)->max('id');
        $idLaudoWRCU_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseWRCU_1)->value('id');
        $statusWRCU_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWRCU_1)->value('status_id');
        //SISTEMA DE ALIMENTAÇÃO DE EMULSÃO - BOMBA #2
        $tag_SAE_B_2 = "TE 72 300 310 397 000 - 000008";
        $idAtividadeSAE_B_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAE_B_2)->value('id');
        $idAnaliseSAE_B_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAE_B_2)->max('id');
        $idLaudoSAE_B_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAE_B_2)->value('id');
        $statusSAE_B_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAE_B_2)->value('status_id');
        //MÓS FEED PUMPS #1
        $tag_MFP_1 = "TE 72 300 310 397 000 - 000009";
        $idAtividadeMFP_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MFP_1)->value('id');
        $idAnaliseMFP_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMFP_1)->max('id');
        $idLaudoMFP_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseMFP_1)->value('id');
        $statusMFP_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMFP_1)->value('status_id');
        //MÓS FEED PUMPS #2
        $tag_MFP_2 = "TE 72 300 310 397 000 - 000073";
        $idAtividadeMFP_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MFP_2)->value('id');
        $idAnaliseMFP_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMFP_2)->max('id');
        $idLaudoMFP_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseMFP_2)->value('id');
        $statusMFP_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMFP_2)->value('status_id');
        //ZÓS FEED PUMPS #1
        $tag_ZFP_1 = "TE 72 300 310 397 000 - 000074";
        $idAtividadeZFP_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ZFP_1)->value('id');
        $idAnaliseZFP_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZFP_1)->max('id');
        $idLaudoZFP_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZFP_1)->value('id');
        $statusZFP_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZFP_1)->value('status_id');
        //ZÓS FEED PUMPS #2
        $tag_ZFP_2 = "TE 72 300 310 397 000 - 000075";
        $idAtividadeZFP_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ZFP_2)->value('id');
        $idAnaliseZFP_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeZFP_2)->max('id');
        $idLaudoZFP_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseZFP_2)->value('id');
        $statusZFP_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseZFP_2)->value('status_id');
        //ROLO DEFLETOR DE SAIDA 1
        $tag_RDS_1 = "TE 72 300 310 397 000 - 000010";
        $idAtividadeRDS_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDS_1)->value('id');
        $idAnaliseRDS_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDS_1)->max('id');
        $idLaudoRDS_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRDS_1)->value('id');
        $statusRDS_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDS_1)->value('status_id');
        //ROLO DEFLETOR DE SAIDA 2
        $tag_RDS_2 = "TE 72 300 310 397 000 - 000007";
        $idAtividadeRDS_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDS_2)->value('id');
        $idAnaliseRDS_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDS_2)->max('id');
        $idLaudoRDS_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRDS_2)->value('id');
        $statusRDS_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDS_2)->value('status_id');
        //ROLO DEFLETOR DE SAIDA 3
        $tag_RDS_3 = "TE 72 300 310 397 000 - 000038";
        $idAtividadeRDS_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDS_3)->value('id');
        $idAnaliseRDS_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDS_3)->max('id');
        $idLaudoRDS_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRDS_3)->value('id');
        $statusRDS_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDS_3)->value('status_id');
        //ROLO DEFLETOR DE SAIDA 4
        $tag_RDS_4 = "TE 72 300 310 397 000 - 000039";
        $idAtividadeRDS_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RDS_4)->value('id');
        $idAnaliseRDS_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRDS_4)->max('id');
        $idLaudoRDS_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRDS_4)->value('id');
        $statusRDS_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRDS_4)->value('status_id');
        //INSPECTION REEL EXIT SECTION
        $tag_IRES = "TE 72 300 310 397 000 - 000011";
        $idAtividadeIRES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_IRES)->value('id');
        $idAnaliseIRES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeIRES)->max('id');
        $idLaudoIRES = DB::table('laudos')->where('analise_id', '=', $idAnaliseIRES)->value('id');
        $statusIRES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseIRES)->value('status_id');
        //PINCH ROLL UNIT EXIT SECTION
        $tag_PRUES = "TE 72 300 310 397 000 - 000044";
        $idAtividadePRUES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRUES)->value('id');
        $idAnalisePRUES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRUES)->max('id');
        $idLaudoPRUES = DB::table('laudos')->where('analise_id', '=', $idAnalisePRUES)->value('id');
        $statusPRUES = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRUES)->value('status_id');
    //MAIN DRIVE - ROLO TENSIONADOR TR1
        $tag_RT_TR1 = "TE 72 300 310 397 000 - 000013";
        $idAtividadeRT_TR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RT_TR1)->value('id');
        $idAnaliseRT_TR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRT_TR1)->max('id');
        $idLaudoRT_TR1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRT_TR1)->value('id');
        $statusRT_TR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRT_TR1)->value('status_id');
        //ALIMENTAÇÃO TR1
        $tag_A_TR1 = "TE 72 300 310 397 000 - 000014";
        $idAtividadeA_TR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_TR1)->value('id');
        $idAnaliseA_TR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_TR1)->max('id');
        $idLaudoA_TR1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseA_TR1)->value('id');
        $statusA_TR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_TR1)->value('status_id');
        //AUXILIARES TR1
        $tag_AUX_TR1 = "TE 72 300 310 397 000 - 000015";
        $idAtividadeAUX_TR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX_TR1)->value('id');
        $idAnaliseAUX_TR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX_TR1)->max('id');
        $idLaudoAUX_TR1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAUX_TR1)->value('id');
        $statusAUX_TR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX_TR1)->value('status_id');
        //ALIMENTAÇÃO MS
        $tag_A_MS = "TE 72 300 310 397 000 - 000016";
        $idAtividadeA_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_MS)->value('id');
        $idAnaliseA_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_MS)->max('id');
        $idLaudoA_MS = DB::table('laudos')->where('analise_id', '=', $idAnaliseA_MS)->value('id');
        $statusA_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_MS)->value('status_id');
        //AUXILIARES MS
        $tag_AUX_MS = "TE 72 300 310 397 000 - 000017";
        $idAtividadeAUX_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX_MS)->value('id');
        $idAnaliseAUX_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX_MS)->max('id');
        $idLaudoAUX_MS = DB::table('laudos')->where('analise_id', '=', $idAnaliseAUX_MS)->value('id');
        $statusAUX_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX_MS)->value('status_id');
        //ROLO TENDIONADOR #2
        $tag_RT_TR2 = "TE 72 300 310 397 000 - 000018";
        $idAtividadeRT_TR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RT_TR2)->value('id');
        $idAnaliseRT_TR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRT_TR2)->max('id');
        $idLaudoRT_TR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRT_TR2)->value('id');
        $statusRT_TR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRT_TR2)->value('status_id');
        //ALIMENTAÇÃO TR2
        $tag_A_TR2 = "TE 72 300 310 397 000 - 000019";
        $idAtividadeA_TR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_TR2)->value('id');
        $idAnaliseA_TR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_TR2)->max('id');
        $idLaudoA_TR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseA_TR2)->value('id');
        $statusA_TR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_TR2)->value('status_id');
        //AUXILIARES TR2
        $tag_AUX_TR2 = "TE 72 300 310 397 000 - 000020";
        $idAtividadeAUX_TR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX_TR2)->value('id');
        $idAnaliseAUX_TR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX_TR2)->max('id');
        $idLaudoAUX_TR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAUX_TR2)->value('id');
        $statusAUX_TR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX_TR2)->value('status_id');
        //TRANSFORMADOR AUX. TR2 16KVA
        $tag_TA_TR2_16 = "TE 72 300 310 397 000 - 000021";
        $idAtividadeTA_TR2_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TA_TR2_16)->value('id');
        $idAnaliseTA_TR2_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTA_TR2_16)->max('id');
        $idLaudoTA_TR2_16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTA_TR2_16)->value('id');
        $statusTA_TR2_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTA_TR2_16)->value('status_id');
        //TRANSFORMADOR AUX. MS 28 KVA
        $tag_TA_MS_28 = "TE 72 300 310 397 000 - 000022";
        $idAtividadeTA_MS_28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TA_MS_28)->value('id');
        $idAnaliseTA_MS_28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTA_MS_28)->max('id');
        $idLaudoTA_MS_28 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTA_MS_28)->value('id');
        $statusTA_MS_28 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTA_MS_28)->value('status_id');
        //TRANSFORMADOR AUX. TR1 16KVA
        $tag_TA_TR1_16 = "TE 72 300 310 397 000 - 000023";
        $idAtividadeTA_TR1_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TA_TR1_16)->value('id');
        $idAnaliseTA_TR1_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTA_TR1_16)->max('id');
        $idLaudoTA_TR1_16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseTA_TR1_16)->value('id');
        $statusTA_TR1_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTA_TR1_16)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_laminador_mainDrives')
                ->with('idLaudoRM_250', $idLaudoRM_250)->with('statusRM_250', $statusRM_250)
                ->with('idLaudoSAE_B_1', $idLaudoSAE_B_1)->with('statusSAE_B_1', $statusSAE_B_1)
                ->with('idLaudoESRP_2', $idLaudoESRP_2)->with('statusESRP_2', $statusESRP_2)
                ->with('idLaudoESRP_1', $idLaudoESRP_1)->with('statusESRP_1', $statusESRP_1)
                ->with('idLaudoRDE', $idLaudoRDE)->with('statusRDE', $statusRDE)
                ->with('idLaudoWRCTTC', $idLaudoWRCTTC)->with('statusWRCTTC', $statusWRCTTC)
                ->with('idLaudoWRCSS', $idLaudoWRCSS)->with('statusWRCSS', $statusWRCSS)
                ->with('idLaudoWRCU_2', $idLaudoWRCU_2)->with('statusWRCU_2', $statusWRCU_2)
                ->with('idLaudoWRCU_1', $idLaudoWRCU_1)->with('statusWRCU_1', $statusWRCU_1)
                ->with('idLaudoSAE_B_2', $idLaudoSAE_B_2)->with('statusSAE_B_2', $statusSAE_B_2)
                ->with('idLaudoMFP_1', $idLaudoMFP_1)->with('statusMFP_1', $statusMFP_1)
                ->with('idLaudoMFP_2', $idLaudoMFP_2)->with('statusMFP_2', $statusMFP_2)
                ->with('idLaudoZFP_1', $idLaudoZFP_1)->with('statusZFP_1', $statusZFP_1)
                ->with('idLaudoZFP_2', $idLaudoZFP_2)->with('statusZFP_2', $statusZFP_2)
                ->with('idLaudoRDS_1', $idLaudoRDS_1)->with('statusRDS_1', $statusRDS_1)
                ->with('idLaudoRDS_2', $idLaudoRDS_2)->with('statusRDS_2', $statusRDS_2)
                ->with('idLaudoRDS_3', $idLaudoRDS_3)->with('statusRDS_3', $statusRDS_3)
                ->with('idLaudoRDS_4', $idLaudoRDS_4)->with('statusRDS_4', $statusRDS_4)
                ->with('idLaudoIRES', $idLaudoIRES)->with('statusIRES', $statusIRES)
                ->with('idLaudoPRUES', $idLaudoPRUES)->with('statusPRUES', $statusPRUES)
                ->with('idLaudoRT_TR1', $idLaudoRT_TR1)->with('statusRT_TR1', $statusRT_TR1)
                ->with('idLaudoA_TR1', $idLaudoA_TR1)->with('statusA_TR1', $statusA_TR1)
                ->with('idLaudoAUX_TR1', $idLaudoAUX_TR1)->with('statusAUX_TR1', $statusAUX_TR1)
                ->with('idLaudoA_MS', $idLaudoA_MS)->with('statusA_MS', $statusA_MS)
                ->with('idLaudoAUX_MS', $idLaudoAUX_MS)->with('statusAUX_MS', $statusAUX_MS)
                ->with('idLaudoRT_TR2', $idLaudoRT_TR2)->with('statusRT_TR2', $statusRT_TR2)
                ->with('idLaudoA_TR2', $idLaudoA_TR2)->with('statusA_TR2', $statusA_TR2)
                ->with('idLaudoAUX_TR2', $idLaudoAUX_TR2)->with('statusAUX_TR2', $statusAUX_TR2)
                ->with('idLaudoTA_TR2_16', $idLaudoTA_TR2_16)->with('statusTA_TR2_16', $statusTA_TR2_16)
                ->with('idLaudoTA_MS_28', $idLaudoTA_MS_28)->with('statusTA_MS_28', $statusTA_MS_28)
                ->with('idLaudoTA_TR1_16', $idLaudoTA_TR1_16)->with('statusTA_TR1_16', $statusTA_TR1_16)
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

    public function laminador_auxiliaresDrives() {
        return view('csn.relatoriosTecnicos.termografia_laminador_auxiliaresDrives');
    }

    public function laminador_drives() {
        return view('csn.relatoriosTecnicos.termografia_laminador_drives');
    }

    public function laminador_payOfReel() {
        //TOMADA AUXILIAR DE ABASTECIMENTO
        $tag_TAA = "TE 72 300 310 397 000 - 000070";
        $idAtividadeTAA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TAA)->value('id');
        $idAnaliseTAA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTAA)->max('id');
        $idLaudoTAA = DB::table('laudos')->where('analise_id', '=', $idAnaliseTAA)->value('id');
        $statusTAA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTAA)->value('status_id');
        //LINE REACTOR AUTO TRANSFORMER
        $tag_LRAT = "TE 72 300 310 397 000 - 000069";
        $idAtividadeLRAT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_LRAT)->value('id');
        $idAnaliseLRAT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLRAT)->max('id');
        $idLaudoLRAT = DB::table('laudos')->where('analise_id', '=', $idAnaliseLRAT)->value('id');
        $statusLRAT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLRAT)->value('status_id');
        //ALIMENTADOR DE ENTRADA UNIDADE DE REGENERAÇÃO
        $tag_AEUR = "TE 72 300 310 397 000 - 000068";
        $idAtividadeAEUR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AEUR)->value('id');
        $idAnaliseAEUR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAEUR)->max('id');
        $idLaudoAEUR = DB::table('laudos')->where('analise_id', '=', $idAnaliseAEUR)->value('id');
        $statusAEUR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAEUR)->value('status_id');
        //AUXILIARES
        $tag_AUX = "TE 72 300 310 397 000 - 000067";
        $idAtividadeAUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX)->value('id');
        $idAnaliseAUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX)->max('id');
        $idLaudoAUX = DB::table('laudos')->where('analise_id', '=', $idAnaliseAUX)->value('id');
        $statusAUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX)->value('status_id');
        //INVERSOR MESTRE
        $tag_IM = "TE 72 300 310 397 000 - 000066";
        $idAtividadeIM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_IM)->value('id');
        $idAnaliseIM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeIM)->max('id');
        $idLaudoIM = DB::table('laudos')->where('analise_id', '=', $idAnaliseIM)->value('id');
        $statusIM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseIM)->value('status_id');
        //INVERSOR ESCRAVO
        $tag_IE = "TE 72 300 310 397 000 - 000065";
        $idAtividadeIE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_IE)->value('id');
        $idAnaliseIE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeIE)->max('id');
        $idLaudoIE = DB::table('laudos')->where('analise_id', '=', $idAnaliseIE)->value('id');
        $statusIE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseIE)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_laminador_payOfReel')
        ->with('idLaudoTAA', $idLaudoTAA)->with('statusTAA', $statusTAA)
        ->with('idLaudoLRAT', $idLaudoLRAT)->with('statusLRAT', $statusLRAT)
        ->with('idLaudoAEUR', $idLaudoAEUR)->with('statusAEUR', $statusAEUR)
        ->with('idLaudoAUX', $idLaudoAUX)->with('statusAUX', $statusAUX)
        ->with('idLaudoIM', $idLaudoIM)->with('statusIM', $statusIM)
        ->with('idLaudoIE', $idLaudoIE)->with('statusIE', $statusIE)
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

    public function laminador_oficil() {
    //WS5 - TRANSFORMADOR
        $tag_WS5_T = "TE 72 900 920 084 012 - 000001";
        $idAtividadeWS5_T = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_T)->value('id');
        $idAnaliseWS5_T = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_T)->max('id');
        $idLaudoWS5_T = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS5_T)->value('id');
        $statusWS5_T = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_T)->value('status_id');
        //ALIMENTAÇÃO
        $tag_WS5_A = "TE 72 900 920 084 012 - 000002";
        $idAtividadeWS5_A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_A)->value('id');
        $idAnaliseWS5_A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_A)->max('id');
        $idLaudoWS5_A = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS5_A)->value('id');
        $statusWS5_A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_A)->value('status_id');
        //SISTEMA DE ACIONAMENTO
        $tag_WS5_SA = "TE 72 900 920 084 012 - 000003";
        $idAtividadeWS5_SA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_SA)->value('id');
        $idAnaliseWS5_SA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_SA)->max('id');
        $idLaudoWS5_SA = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS5_SA)->value('id');
        $statusWS5_SA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_SA)->value('status_id');
        //ACIONAMENTO AUXILIAR
        $tag_WS5_AAUX = "TE 72 900 920 084 012 - 000004";
        $idAtividadeWS5_AAUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_AAUX)->value('id');
        $idAnaliseWS5_AAUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_AAUX)->max('id');
        $idLaudoWS5_AAUX = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS5_AAUX)->value('id');
        $statusWS5_AAUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_AAUX)->value('status_id');
        //SPS CNC
        $tag_WS5_SC = "TE 72 900 920 084 012 - 000005";
        $idAtividadeWS5_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_SC)->value('id');
        $idAnaliseWS5_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_SC)->max('id');
        $idLaudoWS5_SC = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS5_SC)->value('id');
        $statusWS5_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_SC)->value('status_id');
        //CAMPO DE ENCAIXE COMPONENTES ELÉTRICOS
        $tag_WS5_CECE = "TE 72 900 920 084 012 - 000006";
        $idAtividadeWS5_CECE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS5_CECE)->value('id');
        $idAnaliseWS5_CECE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS5_CECE)->max('id');
        $idLaudoWS5_CECE = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS5_CECE)->value('id');
        $statusWS5_CECE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS5_CECE)->value('status_id');
    //WS3 - TRANSFORMADOR
        $tag_WS3_T = "TE 72 900 910 087 012 - 000001";
        $idAtividadeWS3_T = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_T)->value('id');
        $idAnaliseWS3_T = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_T)->max('id');
        $idLaudoWS3_T = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS3_T)->value('id');
        $statusWS3_T = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_T)->value('status_id');
        //ALIMENTAÇÃO
        $tag_WS3_A = "TE 72 900 910 087 012 - 000002";
        $idAtividadeWS3_A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_A)->value('id');
        $idAnaliseWS3_A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_A)->max('id');
        $idLaudoWS3_A = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS3_A)->value('id');
        $statusWS3_A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_A)->value('status_id');
        //SISTEMA DE ACIONAMENTO
        $tag_WS3_SA = "TE 72 900 910 087 012 - 000003";
        $idAtividadeWS3_SA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_SA)->value('id');
        $idAnaliseWS3_SA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_SA)->max('id');
        $idLaudoWS3_SA = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS3_SA)->value('id');
        $statusWS3_SA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_SA)->value('status_id');
        //ACIONAMENTO AUXILIAR
        $tag_WS3_AAUX = "TE 72 900 910 087 012 - 000004";
        $idAtividadeWS3_AAUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_AAUX)->value('id');
        $idAnaliseWS3_AAUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_AAUX)->max('id');
        $idLaudoWS3_AAUX = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS3_AAUX)->value('id');
        $statusWS3_AAUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_AAUX)->value('status_id');
        //SPS CNC
        $tag_WS3_SC = "TE 72 900 910 087 012 - 000005";
        $idAtividadeWS3_SC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_SC)->value('id');
        $idAnaliseWS3_SC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_SC)->max('id');
        $idLaudoWS3_SC = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS3_SC)->value('id');
        $statusWS3_SC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_SC)->value('status_id');
        //CAMPO DE ENCAIXE COMPONENTES ELÉTRICOS
        $tag_WS3_CECE = "TE 72 900 910 087 012 - 000006";
        $idAtividadeWS3_CECE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_WS3_CECE)->value('id');
        $idAnaliseWS3_CECE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeWS3_CECE)->max('id');
        $idLaudoWS3_CECE = DB::table('laudos')->where('analise_id', '=', $idAnaliseWS3_CECE)->value('id');
        $statusWS3_CECE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseWS3_CECE)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_laminador_oficil')
        ->with('idLaudoWS5_T', $idLaudoWS5_T)->with('statusWS5_T', $statusWS5_T)
        ->with('idLaudoWS5_A', $idLaudoWS5_A)->with('statusWS5_A', $statusWS5_A)
        ->with('idLaudoWS5_SA', $idLaudoWS5_SA)->with('statusWS5_SA', $statusWS5_SA)
        ->with('idLaudoWS5_AAUX', $idLaudoWS5_AAUX)->with('statusWS5_AAUX', $statusWS5_AAUX)
        ->with('idLaudoWS5_SC', $idLaudoWS5_SC)->with('statusWS5_SC', $statusWS5_SC)
        ->with('idLaudoWS5_CECE', $idLaudoWS5_CECE)->with('statusWS5_CECE', $statusWS5_CECE)
        ->with('idLaudoWS3_T', $idLaudoWS3_T)->with('statusWS3_T', $statusWS3_T)
        ->with('idLaudoWS3_A', $idLaudoWS3_A)->with('statusWS3_A', $statusWS3_A)
        ->with('idLaudoWS3_SA', $idLaudoWS3_SA)->with('statusWS3_SA', $statusWS3_SA)
        ->with('idLaudoWS3_AAUX', $idLaudoWS3_AAUX)->with('statusWS3_AAUX', $statusWS3_AAUX)
        ->with('idLaudoWS3_SC', $idLaudoWS3_SC)->with('statusWS3_SC', $statusWS3_SC)
        ->with('idLaudoWS3_CECE', $idLaudoWS3_CECE)->with('statusWS3_CECE', $statusWS3_CECE)
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
    //--- UTILIDADES
    public function utilidades_ccm() {
        //BOMBA TORRE DE RESFRIAMENTO - M03
        $tag_BTR_M03 = "TE 72 700 815 020 000 - 000012";
        $idAtividadeBTR_M03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M03)->value('id');
        $idAnaliseBTR_M03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M03)->max('id');
        $idLaudoBTR_M03 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTR_M03)->value('id');
        $statusBTR_M03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M03)->value('status_id');
        //VENTILADOR DA TORRE DE RESFRIAMENTO M01
        $tag_VTR_M01 = "TE 72 700 815 020 000 - 000015";
        $idAtividadeVTR_M01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_VTR_M01)->value('id');
        $idAnaliseVTR_M01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVTR_M01)->max('id');
        $idLaudoVTR_M01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseVTR_M01)->value('id');
        $statusVTR_M01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVTR_M01)->value('status_id');
        //VENTILADOR DA TORRE DE RESFRIAMENTO M02
        $tag_VTR_M02 = "TE 72 700 815 020 000 - 000016";
        $idAtividadeVTR_M02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_VTR_M02)->value('id');
        $idAnaliseVTR_M02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVTR_M02)->max('id');
        $idLaudoVTR_M02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseVTR_M02)->value('id');
        $statusVTR_M02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVTR_M02)->value('status_id');
        //BOMBA TORRE DE RESFRIAMENTO - M02
        $tag_BTR_M02 = "TE 72 700 815 020 000 - 000011";
        $idAtividadeBTR_M02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M02)->value('id');
        $idAnaliseBTR_M02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M02)->max('id');
        $idLaudoBTR_M02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTR_M02)->value('id');
        $statusBTR_M02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M02)->value('status_id');
        //BOMBA TORRE DE RESFRIAMENTO - M01
        $tag_BTR_M01 = "TE 72 700 815 020 000 - 000010";
        $idAtividadeBTR_M01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M01)->value('id');
        $idAnaliseBTR_M01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M01)->max('id');
        $idLaudoBTR_M01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTR_M01)->value('id');
        $statusBTR_M01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M01)->value('status_id');
        //BOMBA TORRE DE RESFRIAMENTO - M04
        $tag_BTR_M04 = "TE 72 700 815 020 000 - 000013";
        $idAtividadeBTR_M04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M04)->value('id');
        $idAnaliseBTR_M04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M04)->max('id');
        $idLaudoBTR_M04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTR_M04)->value('id');
        $statusBTR_M04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M04)->value('status_id');
        //BOMBA TORRE DE RESFRIAMENTO - M05
        $tag_BTR_M05 = "TE 72 700 815 020 000 - 000014";
        $idAtividadeBTR_M05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BTR_M05)->value('id');
        $idAnaliseBTR_M05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBTR_M05)->max('id');
        $idLaudoBTR_M05 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBTR_M05)->value('id');
        $statusBTR_M05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBTR_M05)->value('status_id');
        //BOMBA AGUA INDUSTRIAL - M02
        $tag_BAI_M02 = "TE 72 700 815 020 000 - 000021";
        $idAtividadeBAI_M02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BAI_M02)->value('id');
        $idAnaliseBAI_M02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAI_M02)->max('id');
        $idLaudoBAI_M02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAI_M02)->value('id');
        $statusBAI_M02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAI_M02)->value('status_id');
        //BOMBA ÁGUA INDUSTRIAL - M01
        $tag_BAI_M01 = "TE 72 700 815 020 000 - 000018";
        $idAtividadeBAI_M01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BAI_M01)->value('id');
        $idAnaliseBAI_M01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBAI_M01)->max('id');
        $idLaudoBAI_M01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBAI_M01)->value('id');
        $statusBAI_M01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBAI_M01)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_utilidades_ccm')
        ->with('idLaudoBTR_M03', $idLaudoBTR_M03)->with('statusBTR_M03', $statusBTR_M03)
        ->with('idLaudoVTR_M01', $idLaudoVTR_M01)->with('statusVTR_M01', $statusVTR_M01)
        ->with('idLaudoVTR_M02', $idLaudoVTR_M02)->with('statusVTR_M02', $statusVTR_M02)
        ->with('idLaudoBTR_M02', $idLaudoBTR_M02)->with('statusBTR_M02', $statusBTR_M02)
        ->with('idLaudoBTR_M01', $idLaudoBTR_M01)->with('statusBTR_M01', $statusBTR_M01)
        ->with('idLaudoBTR_M04', $idLaudoBTR_M04)->with('statusBTR_M04', $statusBTR_M04)
        ->with('idLaudoBTR_M05', $idLaudoBTR_M05)->with('statusBTR_M05', $statusBTR_M05)
        ->with('idLaudoBAI_M02', $idLaudoBAI_M02)->with('statusBAI_M02', $statusBAI_M02)
        ->with('idLaudoBAI_M01', $idLaudoBAI_M01)->with('statusBAI_M01', $statusBAI_M01)
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

    public function utilidades_lv460V() {
        //COMPRESSOR 496
        $tag_C_496 = "TE 72 700 815 020 000 - 000001";
        $idAtividadeC_496 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_496)->value('id');
        $idAnaliseC_496 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_496)->max('id');
        $idLaudoC_496 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_496)->value('id');
        $statusC_496 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_496)->value('status_id');
        //COMPRESSOR 491
        $tag_C_491 = "TE 72 700 815 020 000 - 000004";
        $idAtividadeC_491 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_491)->value('id');
        $idAnaliseC_491 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_491)->max('id');
        $idLaudoC_491 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_491)->value('id');
        $statusC_491 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_491)->value('status_id');
        //COMPRESSOR 495
        $tag_C_495 = "TE 72 700 815 020 000 - 000007";
        $idAtividadeC_495 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_495)->value('id');
        $idAnaliseC_495 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_495)->max('id');
        $idLaudoC_495 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_495)->value('id');
        $statusC_495 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_495)->value('status_id');
        //ALIMENTAÇÃO CCM DURR - SALA ELÉTRICA
        $tag_A_CCM_DURR = "TE 72 700 815 020 000 - 000002";
        $idAtividadeA_CCM_DURR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_CCM_DURR)->value('id');
        $idAnaliseA_CCM_DURR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_CCM_DURR)->max('id');
        $idLaudoA_CCM_DURR = DB::table('laudos')->where('analise_id', '=', $idAnaliseA_CCM_DURR)->value('id');
        $statusA_CCM_DURR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_CCM_DURR)->value('status_id');
        //COMPRESSOR 492
        $tag_C_492 = "TE 72 700 815 020 000 - 000005";
        $idAtividadeC_492 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_492)->value('id');
        $idAnaliseC_492 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_492)->max('id');
        $idLaudoC_492 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_492)->value('id');
        $statusC_492 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_492)->value('status_id');
        //COMPRESSOR 494
        $tag_C_494 = "TE 72 700 815 020 000 - 000008";
        $idAtividadeC_494 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_494)->value('id');
        $idAnaliseC_494 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_494)->max('id');
        $idLaudoC_494 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_494)->value('id');
        $statusC_494 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_494)->value('status_id');
        //ALIMENTAÇÃO CCM DEGREMONT - SALA ELÉTRICA
        $tag_A_CCM_DEGREMONT = "TE 72 700 815 020 000 - 000003";
        $idAtividadeA_CCM_DEGREMONT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_CCM_DEGREMONT)->value('id');
        $idAnaliseA_CCM_DEGREMONT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_CCM_DEGREMONT)->max('id');
        $idLaudoA_CCM_DEGREMONT = DB::table('laudos')->where('analise_id', '=', $idAnaliseA_CCM_DEGREMONT)->value('id');
        $statusA_CCM_DEGREMONT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_CCM_DEGREMONT)->value('status_id');
        //COMPRESSOR 493
        $tag_C_493 = "TE 72 700 815 020 000 - 000006";
        $idAtividadeC_493 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_493)->value('id');
        $idAnaliseC_493 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_493)->max('id');
        $idLaudoC_493 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_493)->value('id');
        $statusC_493 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_493)->value('status_id');
        //COMPRESSOR 490
        $tag_C_490 = "TE 72 700 815 020 000 - 000009";
        $idAtividadeC_490 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_490)->value('id');
        $idAnaliseC_490 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_490)->max('id');
        $idLaudoC_490 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_490)->value('id');
        $statusC_490 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_490)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_utilidades_lv460V')
        ->with('idLaudoC_496', $idLaudoC_496)->with('statusC_496', $statusC_496)
        ->with('idLaudoC_491', $idLaudoC_491)->with('statusC_491', $statusC_491)
        ->with('idLaudoC_495', $idLaudoC_495)->with('statusC_495', $statusC_495)
        ->with('idLaudoA_CCM_DURR', $idLaudoA_CCM_DURR)->with('statusA_CCM_DURR', $statusA_CCM_DURR)
        ->with('idLaudoC_492', $idLaudoC_492)->with('statusC_492', $statusC_492)
        ->with('idLaudoC_494', $idLaudoC_494)->with('statusC_494', $statusC_494)
        ->with('idLaudoA_CCM_DEGREMONT', $idLaudoA_CCM_DEGREMONT)->with('statusA_CCM_DEGREMONT', $statusA_CCM_DEGREMONT)
        ->with('idLaudoC_493', $idLaudoC_493)->with('statusC_493', $statusC_493)
        ->with('idLaudoC_490', $idLaudoC_490)->with('statusC_490', $statusC_490)
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

    public function utilidades_salaCompressores() {
        //SALA DOS COMPRESSORES UTILIDADES - COMPRESSOR 494
        $tag_C_494 = "TE 72 700 775 050 000 - 000001";
        $idAtividadeC_494 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_494)->value('id');
        $idAnaliseC_494 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_494)->max('id');
        $idLaudoC_494 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_494)->value('id');
        $statusC_494 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_494)->value('status_id');
        //COMPRESSOR 495
        $tag_C_495 = "TE 72 700 775 060 000 - 000001";
        $idAtividadeC_495 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_495)->value('id');
        $idAnaliseC_495 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_495)->max('id');
        $idLaudoC_495 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_495)->value('id');
        $statusC_495 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_495)->value('status_id');
        //COMPRESSOR 493
        $tag_C_493 = "TE 72 700 775 040 000 - 000001";
        $idAtividadeC_493 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_493)->value('id');
        $idAnaliseC_493 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_493)->max('id');
        $idLaudoC_493 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_493)->value('id');
        $statusC_493 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_493)->value('status_id');
        //COMPRESSOR 490
        $tag_C_490 = "TE 72 700 775 010 000 - 000001";
        $idAtividadeC_490 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_490)->value('id');
        $idAnaliseC_490 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_490)->max('id');
        $idLaudoC_490 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_490)->value('id');
        $statusC_490 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_490)->value('status_id');
        //COMPRESSOR 491
        $tag_C_491 = "TE 72 700 775 020 000 - 000001";
        $idAtividadeC_491 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_491)->value('id');
        $idAnaliseC_491 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_491)->max('id');
        $idLaudoC_491 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_491)->value('id');
        $statusC_491 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_491)->value('status_id');
        //COMPRESSOR 492
        $tag_C_492 = "TE 72 700 775 030 000 - 000001";
        $idAtividadeC_492 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_492)->value('id');
        $idAnaliseC_492 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_492)->max('id');
        $idLaudoC_492 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_492)->value('id');
        $statusC_492 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_492)->value('status_id');
        //COMPRESSOR 496
        $tag_C_496 = "TE 72 700 775 130 000 - 000001";
        $idAtividadeC_496 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_496)->value('id');
        $idAnaliseC_496 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_496)->max('id');
        $idLaudoC_496 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_496)->value('id');
        $statusC_496 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_496)->value('status_id');
        //SALA DOS COMPRESSORES - CENTRO DE SERVIÇOS - COMPRESSOR 497 - CENTRO DE SERVIÇOS
        $tag_C_497 = "TE 72 700 775 120 000 - 000001";
        $idAtividadeC_497 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_497)->value('id');
        $idAnaliseC_497 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_497)->max('id');
        $idLaudoC_497 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_497)->value('id');
        $statusC_497 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_497)->value('status_id');
        //COMPRESSOR 498 - CENTRO DE SERVIÇOS
        $tag_C_498 = "TE 72 700 775 080 000 - 000001";
        $idAtividadeC_498 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_C_498)->value('id');
        $idAnaliseC_498 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeC_498)->max('id');
        $idLaudoC_498 = DB::table('laudos')->where('analise_id', '=', $idAnaliseC_498)->value('id');
        $statusC_498 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseC_498)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_utilidades_salaCompressores')
        ->with('idLaudoC_496', $idLaudoC_496)->with('statusC_496', $statusC_496)
        ->with('idLaudoC_491', $idLaudoC_491)->with('statusC_491', $statusC_491)
        ->with('idLaudoC_495', $idLaudoC_495)->with('statusC_495', $statusC_495)
        ->with('idLaudoC_498', $idLaudoC_498)->with('statusC_498', $statusC_498)
        ->with('idLaudoC_492', $idLaudoC_492)->with('statusC_492', $statusC_492)
        ->with('idLaudoC_494', $idLaudoC_494)->with('statusC_494', $statusC_494)
        ->with('idLaudoC_497', $idLaudoC_497)->with('statusC_497', $statusC_497)
        ->with('idLaudoC_493', $idLaudoC_493)->with('statusC_493', $statusC_493)
        ->with('idLaudoC_490', $idLaudoC_490)->with('statusC_490', $statusC_490)
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

    public function utilidades_subestacao() {
      //53
      $tag_uti_53 = " TE 72 700 750 020 000 - 000003";
      $idAtividade_53 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_53)->value('id');
      $idAnalise_53 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_53)->max('id');
      $idLaudo_53 = DB::table('laudos')->where('analise_id', '=', $idAnalise_53)->value('id');
      $status_53 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_53)->value('status_id');
      //56
      $tag_uti_56 = "TE 72 700 750 020 001 - 000003";
      $idAtividade_56 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_56)->value('id');
      $idAnalise_56 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_56)->max('id');
      $idLaudo_56 = DB::table('laudos')->where('analise_id', '=', $idAnalise_56)->value('id');
      $status_56 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_56)->value('status_id');
      //59
      $tag_uti_59 = "TE 72 700 750 020 001 - 000006";
      $idAtividade_59 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_59)->value('id');
      $idAnalise_59 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_59)->max('id');
      $idLaudo_59 = DB::table('laudos')->where('analise_id', '=', $idAnalise_59)->value('id');
      $status_59 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_59)->value('status_id');
      //62
      $tag_uti_62 = "TE 72 700 750 020 004 - 000001";
      $idAtividade_62 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_62)->value('id');
      $idAnalise_62 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_62)->max('id');
      $idLaudo_62 = DB::table('laudos')->where('analise_id', '=', $idAnalise_62)->value('id');
      $status_62 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_62)->value('status_id');
      //65
      $tag_uti_65 = "TE 72 700 750 020 004 - 000002";
      $idAtividade_65 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_65)->value('id');
      $idAnalise_65 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_65)->max('id');
      $idLaudo_65 = DB::table('laudos')->where('analise_id', '=', $idAnalise_65)->value('id');
      $status_65 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_65)->value('status_id');
      //68
      $tag_uti_68 = "TE 72 700 750 020 005 - 000003";
      $idAtividade_68 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_68)->value('id');
      $idAnalise_68 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_68)->max('id');
      $idLaudo_68 = DB::table('laudos')->where('analise_id', '=', $idAnalise_68)->value('id');
      $status_68 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_68)->value('status_id');
      //71
      $tag_uti_71 = "TE 72 700 750 020 005 - 000006";
      $idAtividade_71 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_71)->value('id');
      $idAnalise_71 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_71)->max('id');
      $idLaudo_71 = DB::table('laudos')->where('analise_id', '=', $idAnalise_71)->value('id');
      $status_71 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_71)->value('status_id');
      //74
      $tag_uti_74 = "TE 72 700 750 020 008 - 000001";
      $idAtividade_74 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_74)->value('id');
      $idAnalise_74 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_74)->max('id');
      $idLaudo_74 = DB::table('laudos')->where('analise_id', '=', $idAnalise_74)->value('id');
      $status_74 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_74)->value('status_id');
      //77
      $tag_uti_77 = "TE 72 700 750 020 013 - 000001";
      $idAtividade_77 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_77)->value('id');
      $idAnalise_77 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_77)->max('id');
      $idLaudo_77 = DB::table('laudos')->where('analise_id', '=', $idAnalise_77)->value('id');
      $status_77 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_77)->value('status_id');
      //80
      $tag_uti_80 = "TE 72 700 750 020 054 - 000001";
      $idAtividade_80 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_80)->value('id');
      $idAnalise_80 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_80)->max('id');
      $idLaudo_80 = DB::table('laudos')->where('analise_id', '=', $idAnalise_80)->value('id');
      $status_80 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_80)->value('status_id');
      //79
      $tag_uti_79 = "TE 72 700 750 020 053 - 000001";
      $idAtividade_79 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_79)->value('id');
      $idAnalise_79 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_79)->max('id');
      $idLaudo_79 = DB::table('laudos')->where('analise_id', '=', $idAnalise_79)->value('id');
      $status_79 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_79)->value('status_id');
      //73
      $tag_uti_73 = "TE 72 700 750 020 007 - 000001";
      $idAtividade_73 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_73)->value('id');
      $idAnalise_73 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_73)->max('id');
      $idLaudo_73 = DB::table('laudos')->where('analise_id', '=', $idAnalise_73)->value('id');
      $status_73 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_73)->value('status_id');
      //70
      $tag_uti_70 = "TE 72 700 750 020 005 - 000005";
      $idAtividade_70 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_70)->value('id');
      $idAnalise_70 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_70)->max('id');
      $idLaudo_70 = DB::table('laudos')->where('analise_id', '=', $idAnalise_70)->value('id');
      $status_70 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_70)->value('status_id');
      //67
      $tag_uti_67 = "TE 72 700 750 020 005 - 000002";
      $idAtividade_67 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_67)->value('id');
      $idAnalise_67 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_67)->max('id');
      $idLaudo_67 = DB::table('laudos')->where('analise_id', '=', $idAnalise_67)->value('id');
      $status_67 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_67)->value('status_id');
      //64
      $tag_uti_64 = "TE 72 700 750 020 003 - 000002";
      $idAtividade_64 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_64)->value('id');
      $idAnalise_64 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_64)->max('id');
      $idLaudo_64 = DB::table('laudos')->where('analise_id', '=', $idAnalise_64)->value('id');
      $status_64 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_64)->value('status_id');
      //61
      $tag_uti_61 = "TE 72 700 750 020 003 - 000001";
      $idAtividade_61 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_61)->value('id');
      $idAnalise_61 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_61)->max('id');
      $idLaudo_61 = DB::table('laudos')->where('analise_id', '=', $idAnalise_61)->value('id');
      $status_61 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_61)->value('status_id');
      //58
      $tag_uti_58 = "TE 72 700 750 020 001 - 000005";
      $idAtividade_58 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_58)->value('id');
      $idAnalise_58 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_58)->max('id');
      $idLaudo_58 = DB::table('laudos')->where('analise_id', '=', $idAnalise_58)->value('id');
      $status_58 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_58)->value('status_id');
      //55
      $tag_uti_55 = "TE 72 700 750 020 001 - 000002";
      $idAtividade_55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_55)->value('id');
      $idAnalise_55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_55)->max('id');
      $idLaudo_55 = DB::table('laudos')->where('analise_id', '=', $idAnalise_55)->value('id');
      $status_55 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_55)->value('status_id');
      //52
      $tag_uti_52 = "TE 72 700 775 080 000 - 000001";
      $idAtividade_52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_52)->value('id');
      $idAnalise_52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_52)->max('id');
      $idLaudo_52 = DB::table('laudos')->where('analise_id', '=', $idAnalise_52)->value('id');
      $status_52 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_52)->value('status_id');
      //78
      $tag_uti_78 = "TE 72 700 750 020 052 - 000001";
      $idAtividade_78 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_78)->value('id');
      $idAnalise_78 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_78)->max('id');
      $idLaudo_78 = DB::table('laudos')->where('analise_id', '=', $idAnalise_78)->value('id');
      $status_78 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_78)->value('status_id');
      //76
      $tag_uti_76 = "TE 72 700 750 020 012 - 000001";
      $idAtividade_76 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_76)->value('id');
      $idAnalise_76 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_76)->max('id');
      $idLaudo_76 = DB::table('laudos')->where('analise_id', '=', $idAnalise_76)->value('id');
      $status_76 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_76)->value('status_id');
      //75
      $tag_uti_75 = "TE 72 700 775 080 000 - 000001";
      $idAtividade_75 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_75)->value('id');
      $idAnalise_75 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_75)->max('id');
      $idLaudo_75 = DB::table('laudos')->where('analise_id', '=', $idAnalise_75)->value('id');
      $status_75 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_75)->value('status_id');
      //72
      $tag_uti_72 = "TE 72 700 750 020 006 - 000001";
      $idAtividade_72 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_72)->value('id');
      $idAnalise_72 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_72)->max('id');
      $idLaudo_72 = DB::table('laudos')->where('analise_id', '=', $idAnalise_72)->value('id');
      $status_72 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_72)->value('status_id');
      //69
      $tag_uti_69 = "TE 72 700 750 020 005 - 000004";
      $idAtividade_69 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_69)->value('id');
      $idAnalise_69 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_69)->max('id');
      $idLaudo_69 = DB::table('laudos')->where('analise_id', '=', $idAnalise_69)->value('id');
      $status_69 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_69)->value('status_id');
      //66
      $tag_uti_66 = "TE 72 700 750 020 005 - 000001";
      $idAtividade_66 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_66)->value('id');
      $idAnalise_66 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_66)->max('id');
      $idLaudo_66 = DB::table('laudos')->where('analise_id', '=', $idAnalise_66)->value('id');
      $status_66 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_66)->value('status_id');
      //63
      $tag_uti_63 = "TE 72 700 750 020 002 - 000002";
      $idAtividade_63 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_63)->value('id');
      $idAnalise_63 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_63)->max('id');
      $idLaudo_63 = DB::table('laudos')->where('analise_id', '=', $idAnalise_63)->value('id');
      $status_63 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_63)->value('status_id');
      //60
      $tag_uti_60 = "TE 72 700 750 020 002 - 000001";
      $idAtividade_60 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_60)->value('id');
      $idAnalise_60 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_60)->max('id');
      $idLaudo_60 = DB::table('laudos')->where('analise_id', '=', $idAnalise_60)->value('id');
      $status_60 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_60)->value('status_id');
      //57
      $tag_uti_57 = "TE 72 700 750 020 001 - 000004";
      $idAtividade_57 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_57)->value('id');
      $idAnalise_57 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_57)->max('id');
      $idLaudo_57 = DB::table('laudos')->where('analise_id', '=', $idAnalise_57)->value('id');
      $status_57 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_57)->value('status_id');
      //54
      $tag_uti_54 = "TE 72 700 750 020 001 - 000001";
      $idAtividade_54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_54)->value('id');
      $idAnalise_54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_54)->max('id');
      $idLaudo_54 = DB::table('laudos')->where('analise_id', '=', $idAnalise_54)->value('id');
      $status_54 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_54)->value('status_id');
      //51
      $tag_uti_51 = "TE 72 700 775 080 000 - 000001";
      $idAtividade_51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_51)->value('id');
      $idAnalise_51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_51)->max('id');
      $idLaudo_51 = DB::table('laudos')->where('analise_id', '=', $idAnalise_51)->value('id');
      $status_51 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_51)->value('status_id');
      //3
      $tag_uti_3 = "TE 72 700 750 005 003 - 000001";
      $idAtividade_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_3)->value('id');
      $idAnalise_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_3)->max('id');
      $idLaudo_3 = DB::table('laudos')->where('analise_id', '=', $idAnalise_3)->value('id');
      $status_3 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_3)->value('status_id');
      //6
      $tag_uti_6 = "TE 72 700 750 005 000 - 000003";
      $idAtividade_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_6)->value('id');
      $idAnalise_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_6)->max('id');
      $idLaudo_6 = DB::table('laudos')->where('analise_id', '=', $idAnalise_6)->value('id');
      $status_6 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_6)->value('status_id');
      //9
      $tag_uti_9 = "TE 72 700 750 005 004 - 000003";
      $idAtividade_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_9)->value('id');
      $idAnalise_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_9)->max('id');
      $idLaudo_9 = DB::table('laudos')->where('analise_id', '=', $idAnalise_9)->value('id');
      $status_9 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_9)->value('status_id');
      //12
      $tag_uti_12 = "TE 72 700 750 005 004 - 000006";
      $idAtividade_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_12)->value('id');
      $idAnalise_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_12)->max('id');
      $idLaudo_12 = DB::table('laudos')->where('analise_id', '=', $idAnalise_12)->value('id');
      $status_12 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_12)->value('status_id');
      //15
      $tag_uti_15 = "TE 72 700 750 010 009 - 000001";
      $idAtividade_15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_15)->value('id');
      $idAnalise_15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_15)->max('id');
      $idLaudo_15 = DB::table('laudos')->where('analise_id', '=', $idAnalise_15)->value('id');
      $status_15 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_15)->value('status_id');
      //21
      $tag_uti_21 = "TE 72 700 750 010 000 - 000003";
      $idAtividade_21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_21)->value('id');
      $idAnalise_21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_21)->max('id');
      $idLaudo_21 = DB::table('laudos')->where('analise_id', '=', $idAnalise_21)->value('id');
      $status_21 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_21)->value('status_id');
      //26
      $tag_uti_26 = "TE 72 700 750 015 001 - 000003";
      $idAtividade_26 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_26)->value('id');
      $idAnalise_26 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_26)->max('id');
      $idLaudo_26 = DB::table('laudos')->where('analise_id', '=', $idAnalise_26)->value('id');
      $status_26 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_26)->value('status_id');
      //29
      $tag_uti_29 = "TE 72 700 750 015 001 - 000006";
      $idAtividade_29 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_29)->value('id');
      $idAnalise_29 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_29)->max('id');
      $idLaudo_29 = DB::table('laudos')->where('analise_id', '=', $idAnalise_29)->value('id');
      $status_29 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_29)->value('status_id');
      //32
      $tag_uti_32 = "TE 72 700 750 015 004 - 000001";
      $idAtividade_32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_32)->value('id');
      $idAnalise_32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_32)->max('id');
      $idLaudo_32 = DB::table('laudos')->where('analise_id', '=', $idAnalise_32)->value('id');
      $status_32 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_32)->value('status_id');
      //35
      $tag_uti_35 = "TE 72 700 750 015 004 - 000002";
      $idAtividade_35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_35)->value('id');
      $idAnalise_35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_35)->max('id');
      $idLaudo_35 = DB::table('laudos')->where('analise_id', '=', $idAnalise_35)->value('id');
      $status_35 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_35)->value('status_id');
      //38
      $tag_uti_38 = "TE 72 700 750 015 005 - 000003";
      $idAtividade_38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_38)->value('id');
      $idAnalise_38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_38)->max('id');
      $idLaudo_38 = DB::table('laudos')->where('analise_id', '=', $idAnalise_38)->value('id');
      $status_38 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_38)->value('status_id');
      //41
      $tag_uti_41 = "TE 72 700 750 015 005 - 000006";
      $idAtividade_41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_41)->value('id');
      $idAnalise_41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_41)->max('id');
      $idLaudo_41 = DB::table('laudos')->where('analise_id', '=', $idAnalise_41)->value('id');
      $status_41 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_41)->value('status_id');
      //44
      $tag_uti_44 = "TE 72 700 750 015 008 - 000001";
      $idAtividade_44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_44)->value('id');
      $idAnalise_44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_44)->max('id');
      $idLaudo_44 = DB::table('laudos')->where('analise_id', '=', $idAnalise_44)->value('id');
      $status_44 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_44)->value('status_id');
      //47
      $tag_uti_47 = "TE 72 700 750 015 013 - 000001";
      $idAtividade_47 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_47)->value('id');
      $idAnalise_47 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_47)->max('id');
      $idLaudo_47 = DB::table('laudos')->where('analise_id', '=', $idAnalise_47)->value('id');
      $status_47 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_47)->value('status_id');
      //50
      $tag_uti_50 = "TE 72 700 750 015 054 - 000001";
      $idAtividade_50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_50)->value('id');
      $idAnalise_50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_50)->max('id');
      $idLaudo_50 = DB::table('laudos')->where('analise_id', '=', $idAnalise_50)->value('id');
      $status_50 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_50)->value('status_id');
      //49
      $tag_uti_49 = "TE 72 700 750 015 053 - 000001";
      $idAtividade_49 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_49)->value('id');
      $idAnalise_49 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_49)->max('id');
      $idLaudo_49 = DB::table('laudos')->where('analise_id', '=', $idAnalise_49)->value('id');
      $status_49 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_49)->value('status_id');
      //43
      $tag_uti_43 = "TE 72 700 750 015 007 - 000001";
      $idAtividade_43 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_43)->value('id');
      $idAnalise_43 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_43)->max('id');
      $idLaudo_43 = DB::table('laudos')->where('analise_id', '=', $idAnalise_43)->value('id');
      $status_43 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_43)->value('status_id');
      //40
      $tag_uti_40 = "TE 72 700 750 015 005 - 000005";
      $idAtividade_40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_40)->value('id');
      $idAnalise_40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_40)->max('id');
      $idLaudo_40 = DB::table('laudos')->where('analise_id', '=', $idAnalise_40)->value('id');
      $status_40 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_40)->value('status_id');
      //37
      $tag_uti_37 = "TE 72 700 750 015 005 - 000002";
      $idAtividade_37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_37)->value('id');
      $idAnalise_37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_37)->max('id');
      $idLaudo_37 = DB::table('laudos')->where('analise_id', '=', $idAnalise_37)->value('id');
      $status_37 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_37)->value('status_id');
      //34
      $tag_uti_34 = "TE 72 700 750 015 003 - 000002";
      $idAtividade_34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_34)->value('id');
      $idAnalise_34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_34)->max('id');
      $idLaudo_34 = DB::table('laudos')->where('analise_id', '=', $idAnalise_34)->value('id');
      $status_34 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_34)->value('status_id');
      //31
      $tag_uti_31 = "TE 72 700 750 015 003 - 000001";
      $idAtividade_31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_31)->value('id');
      $idAnalise_31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_31)->max('id');
      $idLaudo_31 = DB::table('laudos')->where('analise_id', '=', $idAnalise_31)->value('id');
      $status_31 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_31)->value('status_id');
      //28
      $tag_uti_28 = "TE 72 700 775 080 000 - 000001";
      $idAtividade_28 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_28)->value('id');
      $idAnalise_28 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_28)->max('id');
      $idLaudo_28 = DB::table('laudos')->where('analise_id', '=', $idAnalise_28)->value('id');
      $status_28 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_28)->value('status_id');
      //25
      $tag_uti_25 = "TE 72 700 750 015 001 - 000002";
      $idAtividade_25 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_25)->value('id');
      $idAnalise_25 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_25)->max('id');
      $idLaudo_25 = DB::table('laudos')->where('analise_id', '=', $idAnalise_25)->value('id');
      $status_25 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_25)->value('status_id');
      //20
      $tag_uti_20 = "TE 72 700 750 010 000 - 000002";
      $idAtividade_20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_20)->value('id');
      $idAnalise_20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_20)->max('id');
      $idLaudo_20 = DB::table('laudos')->where('analise_id', '=', $idAnalise_20)->value('id');
      $status_20 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_20)->value('status_id');
      //14
      $tag_uti_14 = "TE 72 700 750 010 008 - 000001";
      $idAtividade_14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_14)->value('id');
      $idAnalise_14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_14)->max('id');
      $idLaudo_14 = DB::table('laudos')->where('analise_id', '=', $idAnalise_14)->value('id');
      $status_14 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_14)->value('status_id');
      //11
      $tag_uti_11 = "TE 72 700 750 005 004 - 000005";
      $idAtividade_11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_11)->value('id');
      $idAnalise_11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_11)->max('id');
      $idLaudo_11 = DB::table('laudos')->where('analise_id', '=', $idAnalise_11)->value('id');
      $status_11 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_11)->value('status_id');
      //8
      $tag_uti_8 = "TE 72 700 750 005 004 - 000002";
      $idAtividade_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_8)->value('id');
      $idAnalise_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_8)->max('id');
      $idLaudo_8 = DB::table('laudos')->where('analise_id', '=', $idAnalise_8)->value('id');
      $status_8 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_8)->value('status_id');
      //5
      $tag_uti_5 = "TE 72 700 750 005 000 - 000002";
      $idAtividade_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_5)->value('id');
      $idAnalise_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_5)->max('id');
      $idLaudo_5 = DB::table('laudos')->where('analise_id', '=', $idAnalise_5)->value('id');
      $status_5 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_5)->value('status_id');
      //2
      $tag_uti_2 = "TE 72 700 750 005 002 - 000001";
      $idAtividade_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_2)->value('id');
      $idAnalise_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_2)->max('id');
      $idLaudo_2 = DB::table('laudos')->where('analise_id', '=', $idAnalise_2)->value('id');
      $status_2 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_2)->value('status_id');
      //46
      $tag_uti_46 = "TE 72 700 750 015 012 - 000001";
      $idAtividade_46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_46)->value('id');
      $idAnalise_46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_46)->max('id');
      $idLaudo_46 = DB::table('laudos')->where('analise_id', '=', $idAnalise_46)->value('id');
      $status_46 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_46)->value('status_id');
      //48
      $tag_uti_48 = "TE 72 700 750 015 052 - 000001";
      $idAtividade_48 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_48)->value('id');
      $idAnalise_48 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_48)->max('id');
      $idLaudo_48 = DB::table('laudos')->where('analise_id', '=', $idAnalise_48)->value('id');
      $status_48 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_48)->value('status_id');
      //45
      $tag_uti_45 = "TE 72 700 750 015 011 - 000001";
      $idAtividade_45 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_45)->value('id');
      $idAnalise_45 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_45)->max('id');
      $idLaudo_45 = DB::table('laudos')->where('analise_id', '=', $idAnalise_45)->value('id');
      $status_45 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_45)->value('status_id');
      //42
      $tag_uti_42 = "TE 72 700 750 015 006 - 000001";
      $idAtividade_42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_42)->value('id');
      $idAnalise_42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_42)->max('id');
      $idLaudo_42 = DB::table('laudos')->where('analise_id', '=', $idAnalise_42)->value('id');
      $status_42 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_42)->value('status_id');
      //39
      $tag_uti_39 = "TE 72 700 750 015 005 - 000004";
      $idAtividade_39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_39)->value('id');
      $idAnalise_39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_39)->max('id');
      $idLaudo_39 = DB::table('laudos')->where('analise_id', '=', $idAnalise_39)->value('id');
      $status_39 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_39)->value('status_id');
      //36
      $tag_uti_36 = "TE 72 700 750 015 005 - 000001";
      $idAtividade_36 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_36)->value('id');
      $idAnalise_36 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_36)->max('id');
      $idLaudo_36 = DB::table('laudos')->where('analise_id', '=', $idAnalise_36)->value('id');
      $status_36 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_36)->value('status_id');
      //33
      $tag_uti_33 = "TE 72 700 750 015 002 - 000002";
      $idAtividade_33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_33)->value('id');
      $idAnalise_33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_33)->max('id');
      $idLaudo_33 = DB::table('laudos')->where('analise_id', '=', $idAnalise_33)->value('id');
      $status_33 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_33)->value('status_id');
      //30
      $tag_uti_30 = "TE 72 700 750 015 002 - 000001";
      $idAtividade_30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_30)->value('id');
      $idAnalise_30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_30)->max('id');
      $idLaudo_30 = DB::table('laudos')->where('analise_id', '=', $idAnalise_30)->value('id');
      $status_30 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_30)->value('status_id');
      //27
      $tag_uti_27 = "TE 72 700 750 015 001 - 000004";
      $idAtividade_27 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_27)->value('id');
      $idAnalise_27 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_27)->max('id');
      $idLaudo_27 = DB::table('laudos')->where('analise_id', '=', $idAnalise_27)->value('id');
      $status_27 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_27)->value('status_id');
      //24
      $tag_uti_24 = "TE 72 700 750 015 001 - 000001";
      $idAtividade_24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_24)->value('id');
      $idAnalise_24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_24)->max('id');
      $idLaudo_24 = DB::table('laudos')->where('analise_id', '=', $idAnalise_24)->value('id');
      $status_24 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_24)->value('status_id');
      //23
      $tag_uti_23 = "TE 72 700 750 010 000 - 000005";
      $idAtividade_23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_23)->value('id');
      $idAnalise_23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_23)->max('id');
      $idLaudo_23 = DB::table('laudos')->where('analise_id', '=', $idAnalise_23)->value('id');
      $status_23 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_23)->value('status_id');
      //22
      $tag_uti_22 = "TE 72 700 750 010 000 - 000004";
      $idAtividade_22 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_22)->value('id');
      $idAnalise_22 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_22)->max('id');
      $idLaudo_22 = DB::table('laudos')->where('analise_id', '=', $idAnalise_22)->value('id');
      $status_22 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_22)->value('status_id');
      //19
      $tag_uti_19 = "TE 72 700 750 010 000 - 000001";
      $idAtividade_19 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_19)->value('id');
      $idAnalise_19 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_19)->max('id');
      $idLaudo_19 = DB::table('laudos')->where('analise_id', '=', $idAnalise_19)->value('id');
      $status_19 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_19)->value('status_id');
      //13
      $tag_uti_13 = "TE 72 700 750 010 007 - 000001";
      $idAtividade_13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_13)->value('id');
      $idAnalise_13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_13)->max('id');
      $idLaudo_13 = DB::table('laudos')->where('analise_id', '=', $idAnalise_13)->value('id');
      $status_13 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_13)->value('status_id');
      //10
      $tag_uti_10 = "TE 72 700 750 005 004 - 000004";
      $idAtividade_10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_10)->value('id');
      $idAnalise_10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_10)->max('id');
      $idLaudo_10 = DB::table('laudos')->where('analise_id', '=', $idAnalise_10)->value('id');
      $status_10 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_10)->value('status_id');
      //7
      $tag_uti_7 = "TE 72 700 750 005 004 - 000001";
      $idAtividade_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_7)->value('id');
      $idAnalise_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_7)->max('id');
      $idLaudo_7 = DB::table('laudos')->where('analise_id', '=', $idAnalise_7)->value('id');
      $status_7 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_7)->value('status_id');
      //4
      $tag_uti_4 = "TE 72 700 750 005 000 - 000001";
      $idAtividade_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_4)->value('id');
      $idAnalise_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_4)->max('id');
      $idLaudo_4 = DB::table('laudos')->where('analise_id', '=', $idAnalise_4)->value('id');
      $status_4 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_4)->value('status_id');
      //1
      $tag_uti_1 = "TE 72 700 750 005 001 - 000001";
      $idAtividade_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_1)->value('id');
      $idAnalise_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_1)->max('id');
      $idLaudo_1 = DB::table('laudos')->where('analise_id', '=', $idAnalise_1)->value('id');
      $status_1 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_1)->value('status_id');
      //16
      $tag_uti_16 = "TE 72 700 750 010 014 - 000001";
      $idAtividade_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_16)->value('id');
      $idAnalise_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_16)->max('id');
      $idLaudo_16 = DB::table('laudos')->where('analise_id', '=', $idAnalise_16)->value('id');
      $status_16 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_16)->value('status_id');
      //17
      $tag_uti_17 = "TE 72 700 750 010 015 - 000001";
      $idAtividade_17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_17)->value('id');
      $idAnalise_17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_17)->max('id');
      $idLaudo_17 = DB::table('laudos')->where('analise_id', '=', $idAnalise_17)->value('id');
      $status_17 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_17)->value('status_id');
      //18
      $tag_uti_18 = "TE 72 700 750 010 016 - 000001";
      $idAtividade_18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_uti_18)->value('id');
      $idAnalise_18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_18)->max('id');
      $idLaudo_18 = DB::table('laudos')->where('analise_id', '=', $idAnalise_18)->value('id');
      $status_18 = DB::table('preditiva_analises')->where('id', '=', $idAnalise_18)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_utilidades_subestacao')->with('idLaudo_1', $idLaudo_1)->with('status_1', $status_1)
        ->with('idLaudo_2', $idLaudo_2)->with('status_2', $status_2)->with('idLaudo_3', $idLaudo_3)->with('status_3', $status_3)
        ->with('idLaudo_4', $idLaudo_4)->with('status_4', $status_4)->with('idLaudo_5', $idLaudo_5)->with('status_5', $status_5)
        ->with('idLaudo_6', $idLaudo_6)->with('status_6', $status_6)->with('idLaudo_7', $idLaudo_7)->with('status_7', $status_7)
        ->with('idLaudo_8', $idLaudo_8)->with('status_8', $status_8)->with('idLaudo_9', $idLaudo_9)->with('status_9', $status_9)
        ->with('idLaudo_10', $idLaudo_10)->with('status_10', $status_10)->with('idLaudo_11', $idLaudo_11)->with('status_11', $status_11)
        ->with('idLaudo_12', $idLaudo_12)->with('status_12', $status_12)->with('idLaudo_13', $idLaudo_13)->with('status_13', $status_13)
        ->with('idLaudo_14', $idLaudo_14)->with('status_14', $status_14)->with('idLaudo_15', $idLaudo_15)->with('status_15', $status_15)
        ->with('idLaudo_16', $idLaudo_16)->with('status_16', $status_16)->with('idLaudo_17', $idLaudo_17)->with('status_17', $status_17)
        ->with('idLaudo_18', $idLaudo_18)->with('status_18', $status_18)->with('idLaudo_19', $idLaudo_19)->with('status_19', $status_19)
        ->with('idLaudo_20', $idLaudo_20)->with('status_20', $status_20)->with('idLaudo_21', $idLaudo_21)->with('status_21', $status_21)
        ->with('idLaudo_22', $idLaudo_22)->with('status_22', $status_22)->with('idLaudo_23', $idLaudo_23)->with('status_23', $status_23)
        ->with('idLaudo_24', $idLaudo_24)->with('status_24', $status_24)->with('idLaudo_25', $idLaudo_25)->with('status_25', $status_25)
        ->with('idLaudo_26', $idLaudo_26)->with('status_26', $status_26)->with('idLaudo_27', $idLaudo_27)->with('status_27', $status_27)
        ->with('idLaudo_28', $idLaudo_28)->with('status_28', $status_28)->with('idLaudo_29', $idLaudo_29)->with('status_29', $status_29)
        ->with('idLaudo_30', $idLaudo_30)->with('status_30', $status_30)->with('idLaudo_31', $idLaudo_31)->with('status_31', $status_31)
        ->with('idLaudo_32', $idLaudo_32)->with('status_32', $status_32)->with('idLaudo_33', $idLaudo_33)->with('status_33', $status_33)
        ->with('idLaudo_34', $idLaudo_34)->with('status_34', $status_34)->with('idLaudo_35', $idLaudo_35)->with('status_35', $status_35)
        ->with('idLaudo_36', $idLaudo_36)->with('status_36', $status_36)->with('idLaudo_37', $idLaudo_37)->with('status_37', $status_37)
        ->with('idLaudo_38', $idLaudo_38)->with('status_38', $status_38)->with('idLaudo_39', $idLaudo_39)->with('status_39', $status_39)
        ->with('idLaudo_40', $idLaudo_40)->with('status_40', $status_40)->with('idLaudo_41', $idLaudo_41)->with('status_41', $status_41)
        ->with('idLaudo_42', $idLaudo_42)->with('status_42', $status_42)->with('idLaudo_43', $idLaudo_43)->with('status_43', $status_43)
        ->with('idLaudo_44', $idLaudo_44)->with('status_44', $status_44)->with('idLaudo_45', $idLaudo_45)->with('status_45', $status_45)
        ->with('idLaudo_46', $idLaudo_46)->with('status_46', $status_46)->with('idLaudo_47', $idLaudo_47)->with('status_47', $status_47)
        ->with('idLaudo_48', $idLaudo_48)->with('status_48', $status_48)->with('idLaudo_49', $idLaudo_49)->with('status_49', $status_49)
        ->with('idLaudo_50', $idLaudo_50)->with('status_50', $status_50)->with('idLaudo_51', $idLaudo_51)->with('status_51', $status_51)
        ->with('idLaudo_52', $idLaudo_52)->with('status_52', $status_52)->with('idLaudo_53', $idLaudo_53)->with('status_53', $status_53)
        ->with('idLaudo_54', $idLaudo_54)->with('status_54', $status_54)->with('idLaudo_55', $idLaudo_55)->with('status_55', $status_55)
        ->with('idLaudo_56', $idLaudo_56)->with('status_56', $status_56)->with('idLaudo_57', $idLaudo_57)->with('status_57', $status_57)
        ->with('idLaudo_58', $idLaudo_58)->with('status_58', $status_58)->with('idLaudo_59', $idLaudo_59)->with('status_59', $status_59)
        ->with('idLaudo_60', $idLaudo_60)->with('status_60', $status_60)->with('idLaudo_61', $idLaudo_61)->with('status_61', $status_61)
        ->with('idLaudo_62', $idLaudo_62)->with('status_62', $status_62)->with('idLaudo_63', $idLaudo_63)->with('status_63', $status_63)
        ->with('idLaudo_64', $idLaudo_64)->with('status_64', $status_64)->with('idLaudo_65', $idLaudo_65)->with('status_65', $status_65)
        ->with('idLaudo_66', $idLaudo_66)->with('status_66', $status_66)->with('idLaudo_67', $idLaudo_67)->with('status_67', $status_67)
        ->with('idLaudo_68', $idLaudo_68)->with('status_68', $status_68)->with('idLaudo_69', $idLaudo_69)->with('status_69', $status_69)
        ->with('idLaudo_70', $idLaudo_70)->with('status_70', $status_70)->with('idLaudo_71', $idLaudo_71)->with('status_71', $status_71)
        ->with('idLaudo_72', $idLaudo_72)->with('status_72', $status_72)->with('idLaudo_73', $idLaudo_73)->with('status_73', $status_73)
        ->with('idLaudo_74', $idLaudo_74)->with('status_74', $status_74)->with('idLaudo_75', $idLaudo_75)->with('status_75', $status_75)
        ->with('idLaudo_76', $idLaudo_76)->with('status_76', $status_76)->with('idLaudo_77', $idLaudo_77)->with('status_77', $status_77)
        ->with('idLaudo_78', $idLaudo_78)->with('status_78', $status_78)->with('idLaudo_79', $idLaudo_79)->with('status_79', $status_79)
        ->with('idLaudo_80', $idLaudo_80)->with('status_80', $status_80)
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
    //--- GALVANIZACAO
    public function galvanizacao_ets_entradaLimp() {
        //ESTAÇÃO REMOTA - ET018
        $tag_ET_18 = "TE 72 400 410 641 006 - 000001";
        $idAtividadeET_18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_18)->value('id');
        $idAnaliseET_18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_18)->max('id');
        $idLaudoET_18 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_18)->value('id');
        $statusET_18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_18)->value('status_id');
        //ESTAÇÃO REMOTA - ET012
        $tag_ET_12 = "TE 72 700 775 060 000 - 000001";
        $idAtividadeET_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_12)->value('id');
        $idAnaliseET_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_12)->max('id');
        $idLaudoET_12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_12)->value('id');
        $statusET_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_12)->value('status_id');
        //ESTAÇÃO REMOTA - ET020
        $tag_ET_20 = "TE 72 400 410 633 012 - 000001";
        $idAtividadeET_20 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_20)->value('id');
        $idAnaliseET_20 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_20)->max('id');
        $idLaudoET_20 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_20)->value('id');
        $statusET_20 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_20)->value('status_id');
        //ESTAÇÃO REMOTA - ET014
        $tag_ET_14 = "TE 72 700 775 010 000 - 000001";
        $idAtividadeET_14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_14)->value('id');
        $idAnaliseET_14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_14)->max('id');
        $idLaudoET_14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_14)->value('id');
        $statusET_14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_14)->value('status_id');
        //MAQUINA DE SOLDA
        $tag_MS = "TE 72 400 410 120 000 - 000001";
        $idAtividadeMS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MS)->value('id');
        $idAnaliseMS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMS)->max('id');
        $idLaudoMS = DB::table('laudos')->where('analise_id', '=', $idAnaliseMS)->value('id');
        $statusMS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMS)->value('status_id');
        //MAQUINA DE SOLDA PAINEL PRINCIPAL
        $tag_MSPP = "TE 72 400 410 120 000 - 000002";
        $idAtividadeMSPP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MSPP)->value('id');
        $idAnaliseMSPP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMSPP)->max('id');
        $idLaudoMSPP = DB::table('laudos')->where('analise_id', '=', $idAnaliseMSPP)->value('id');
        $statusMSPP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMSPP)->value('status_id');
        //BOILER LIMPEZA ELETROLÍTICA CT3
        $tag_BLE_CT3 = "TE 72 400 410 187 000 - 000001";
        $idAtividadeBLE_CT3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLE_CT3)->value('id');
        $idAnaliseBLE_CT3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLE_CT3)->max('id');
        $idLaudoBLE_CT3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBLE_CT3)->value('id');
        $statusBLE_CT3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLE_CT3)->value('status_id');
        //BOILER ESCOVAS CT4
        $tag_BE_CT4 = "TE 72 400 410 193 000 - 000001";
        $idAtividadeBE_CT4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BE_CT4)->value('id');
        $idAnaliseBE_CT4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT4)->max('id');
        $idLaudoBE_CT4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBE_CT4)->value('id');
        $statusBE_CT4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT4)->value('status_id');
        //BOILER ENXÁGUE CT5
        $tag_BE_CT5 = "TE 72 400 410 189 000 - 000001";
        $idAtividadeBE_CT5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BE_CT5)->value('id');
        $idAnaliseBE_CT5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT5)->max('id');
        $idLaudoBE_CT5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBE_CT5)->value('id');
        $statusBE_CT5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT5)->value('status_id');
        //BOILER ENXÁGUE CT6
        $tag_BE_CT6 = "TE 72 700 775 040 000 - 000001";
        $idAtividadeBE_CT6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BE_CT6)->value('id');
        $idAnaliseBE_CT6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBE_CT6)->max('id');
        $idLaudoBE_CT6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBE_CT6)->value('id');
        $statusBE_CT6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBE_CT6)->value('status_id');
        //ESTAÇÃO REMOTA - ET033
        $tag_ET_33 = "TE 72 400 410 639 018 - 000001";
        $idAtividadeET_33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_33)->value('id');
        $idAnaliseET_33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_33)->max('id');
        $idLaudoET_33 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_33)->value('id');
        $statusET_33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_33)->value('status_id');
        //ESTAÇÃO REMOTA - ET023
        $tag_ET_23 = "TE 72 400 410 633 021 - 000001";
        $idAtividadeET_23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_23)->value('id');
        $idAnaliseET_23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_23)->max('id');
        $idLaudoET_23 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_23)->value('id');
        $statusET_23 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_23)->value('status_id');
        //ESTAÇÃO REMOTA - ET34
        $tag_ET_34 = "TE 72 400 410 639 009 - 000001";
        $idAtividadeET_34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_34)->value('id');
        $idAnaliseET_34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_34)->max('id');
        $idLaudoET_34 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_34)->value('id');
        $statusET_34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_34)->value('status_id');
        //ESTAÇÃO REMOTA - ET021
        $tag_ET_21 = "TE 72 400 410 639 006 - 000001";
        $idAtividadeET_21 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_21)->value('id');
        $idAnaliseET_21 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_21)->max('id');
        $idLaudoET_21 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_21)->value('id');
        $statusET_21 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_21)->value('status_id');
        //ESTAÇÃO REMOTA - ET030
        $tag_ET_30 = "TE 72 400 410 635 006 - 000001";
        $idAtividadeET_30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_30)->value('id');
        $idAnaliseET_30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_30)->max('id');
        $idLaudoET_30 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_30)->value('id');
        $statusET_30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_30)->value('status_id');
        //LAUDO CABECOTE MAQUINA DE SOLDA - LAUDO DIFERENTE DOS OUTROS
        $tag_cabecote_maq_solda = "TE 72 400 410 115 000 - 000001";
        $idAtividade_cms = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_cabecote_maq_solda)->value('id');
        $idAnalise_cms = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade_cms)->max('id');
        $idLaudo_cms = DB::table('laudos')->where('analise_id', '=', $idAnalise_cms)->value('id');
        $status_cms = DB::table('preditiva_analises')->where('id', '=', $idAnalise_cms)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_galvanizacao_ets_entradaLimp')
        ->with('idLaudoET_18', $idLaudoET_18)->with('statusET_18', $statusET_18)
        ->with('idLaudoET_12', $idLaudoET_12)->with('statusET_12', $statusET_12)
        ->with('idLaudoET_20', $idLaudoET_20)->with('statusET_20', $statusET_20)
        ->with('idLaudoET_14', $idLaudoET_14)->with('statusET_14', $statusET_14)
        ->with('idLaudoMS', $idLaudoMS)->with('statusMS', $statusMS)
        ->with('idLaudoMSPP', $idLaudoMSPP)->with('statusMSPP', $statusMSPP)
        ->with('idLaudoBLE_CT3', $idLaudoBLE_CT3)->with('statusBLE_CT3', $statusBLE_CT3)
        ->with('idLaudoBE_CT4', $idLaudoBE_CT4)->with('statusBE_CT4', $statusBE_CT4)
        ->with('idLaudoBE_CT5', $idLaudoBE_CT5)->with('statusBE_CT5', $statusBE_CT5)
        ->with('idLaudoBE_CT6', $idLaudoBE_CT6)->with('statusBE_CT6', $statusBE_CT6)
        ->with('idLaudoET_33', $idLaudoET_33)->with('statusET_33', $statusET_33)
        ->with('idLaudoET_23', $idLaudoET_23)->with('statusET_23', $statusET_23)
        ->with('idLaudoET_34', $idLaudoET_34)->with('statusET_34', $statusET_34)
        ->with('idLaudoET_21', $idLaudoET_21)->with('statusET_21', $statusET_21)
        ->with('idLaudoET_30', $idLaudoET_30)->with('statusET_30', $statusET_30)
        ->with('idLaudo_cms', $idLaudo_cms)->with('status_cms', $status_cms)
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

    public function galvanizacao_forno() {
        //PAINEL FFD (FORNO DE FOGO DIRETO) - QD. REMOTO E/S
        $tag_PFFD_QD_REMOTO = "TE 72 400 410 267 000 - 000016";
        $idAtividadePFFD_QD_REMOTO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PFFD_QD_REMOTO)->value('id');
        $idAnalisePFFD_QD_REMOTO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePFFD_QD_REMOTO)->max('id');
        $idLaudoPFFD_QD_REMOTO = DB::table('laudos')->where('analise_id', '=', $idAnalisePFFD_QD_REMOTO)->value('id');
        $statusPFFD_QD_REMOTO = DB::table('preditiva_analises')->where('id', '=', $idAnalisePFFD_QD_REMOTO)->value('status_id');
        //PAINEL QD. REMOTO E/S - TUBO RADIOSO
        $tag_PR_TR = "TE 72 400 410 267 000 - 000015";
        $idAtividadePR_TR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PR_TR)->value('id');
        $idAnalisePR_TR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_TR)->max('id');
        $idLaudoPR_TR = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_TR)->value('id');
        $statusPR_TR = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_TR)->value('status_id');
        //PAINEL ARREFECIMENTO LENTO / ARREF. A JATO / QD. REMOTO E/S
        $tag_PAL_AJ_QD_R = "TE 72 400 410 268 000 - 000001";
        $idAtividadePAL_AJ_QD_R = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAL_AJ_QD_R)->value('id');
        $idAnalisePAL_AJ_QD_R = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAL_AJ_QD_R)->max('id');
        $idLaudoPAL_AJ_QD_R = DB::table('laudos')->where('analise_id', '=', $idAnalisePAL_AJ_QD_R)->value('id');
        $statusPAL_AJ_QD_R = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAL_AJ_QD_R)->value('status_id');
        //PAINEL AQUECEDOR VELA INCANDESCENTE / QD. DE EGNIÇÃO
        $tag_PAVI_QD_E = "TE 72 400 410 259 000 - 000003";
        $idAtividadePAVI_QD_E = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAVI_QD_E)->value('id');
        $idAnalisePAVI_QD_E = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAVI_QD_E)->max('id');
        $idLaudoPAVI_QD_E = DB::table('laudos')->where('analise_id', '=', $idAnalisePAVI_QD_E)->value('id');
        $statusPAVI_QD_E = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAVI_QD_E)->value('status_id');
        //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 1 - QD. SALVAGUARDA
        $tag_PSTR_CN1 = "TE 72 400 410 267 000 - 000001";
        $idAtividadePSTR_CN1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN1)->value('id');
        $idAnalisePSTR_CN1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN1)->max('id');
        $idLaudoPSTR_CN1 = DB::table('laudos')->where('analise_id', '=', $idAnalisePSTR_CN1)->value('id');
        $statusPSTR_CN1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN1)->value('status_id');
        //PAINEL FFD CHAMA ZONA 3 - QD. SALVAGUARDA
        $tag_PFFD_CZ3 = "TE 72 400 410 267 000 - 000017";
        $idAtividadePFFD_CZ3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PFFD_CZ3)->value('id');
        $idAnalisePFFD_CZ3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePFFD_CZ3)->max('id');
        $idLaudoPFFD_CZ3 = DB::table('laudos')->where('analise_id', '=', $idAnalisePFFD_CZ3)->value('id');
        $statusPFFD_CZ3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePFFD_CZ3)->value('status_id');
        //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 2- QD. SALVAGUARDA
        $tag_PSTR_CN2 = "TE 72 400 410 187 000 - 000001";
        $idAtividadePSTR_CN2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN2)->value('id');
        $idAnalisePSTR_CN2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN2)->max('id');
        $idLaudoPSTR_CN2 = DB::table('laudos')->where('analise_id', '=', $idAnalisePSTR_CN2)->value('id');
        $statusPSTR_CN2 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN2)->value('status_id');
        //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 3 - QD. SALVAGUARDA
        $tag_PSTR_CN3 = "TE 72 400 410 267 000 - 000003";
        $idAtividadePSTR_CN3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN3)->value('id');
        $idAnalisePSTR_CN3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN3)->max('id');
        $idLaudoPSTR_CN3 = DB::table('laudos')->where('analise_id', '=', $idAnalisePSTR_CN3)->value('id');
        $statusPSTR_CN3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN3)->value('status_id');
        //PAINEL FFD ZONA 2 - QD. CONTROLE LOCAL
        $tag_P_FFD_Z2 = "TE 72 400 410 267 000 - 000018";
        $idAtividadeP_FFD_Z2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z2)->value('id');
        $idAnaliseP_FFD_Z2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z2)->max('id');
        $idLaudoP_FFD_Z2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseP_FFD_Z2)->value('id');
        $statusP_FFD_Z2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z2)->value('status_id');
        //PAINEL FFD ZONA 3 - GÁS PILOTO - QD. CONTROLE LOCAL
        $tag_P_FFD_Z3_GP = "TE 72 400 410 267 000 - 000019";
        $idAtividadeP_FFD_Z3_GP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z3_GP)->value('id');
        $idAnaliseP_FFD_Z3_GP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z3_GP)->max('id');
        $idLaudoP_FFD_Z3_GP = DB::table('laudos')->where('analise_id', '=', $idAnaliseP_FFD_Z3_GP)->value('id');
        $statusP_FFD_Z3_GP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z3_GP)->value('status_id');
        //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 4 - QD. SALVAGUARDA
        $tag_PSTR_CN4 = "TE 72 400 410 267 000 - 000004";
        $idAtividadePSTR_CN4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN4)->value('id');
        $idAnalisePSTR_CN4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN4)->max('id');
        $idLaudoPSTR_CN4 = DB::table('laudos')->where('analise_id', '=', $idAnalisePSTR_CN4)->value('id');
        $statusPSTR_CN4 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN4)->value('status_id');
        //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 5 - QD. SALVAGUARDA
        $tag_PSTR_CN5 = "TE 72 400 410 267 000 - 000009";
        $idAtividadePSTR_CN5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN5)->value('id');
        $idAnalisePSTR_CN5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN5)->max('id');
        $idLaudoPSTR_CN5 = DB::table('laudos')->where('analise_id', '=', $idAnalisePSTR_CN5)->value('id');
        $statusPSTR_CN5 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN5)->value('status_id');
        //PAINEL FFD ZONA 1 - QD. CONTROLE LOCAL
        $tag_P_FFD_Z1 = "TE 72 400 410 267 000 - 000020";
        $idAtividadeP_FFD_Z1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z1)->value('id');
        $idAnaliseP_FFD_Z1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z1)->max('id');
        $idLaudoP_FFD_Z1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseP_FFD_Z1)->value('id');
        $statusP_FFD_Z1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z1)->value('status_id');
        //PAINEL FFD ZONA 6 - QD. CONTROLE LOCAL
        $tag_P_FFD_Z6 = "TE 72 400 410 267 000 - 000005";
        $idAtividadeP_FFD_Z6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z6)->value('id');
        $idAnaliseP_FFD_Z6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z6)->max('id');
        $idLaudoP_FFD_Z6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseP_FFD_Z6)->value('id');
        $statusP_FFD_Z6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z6)->value('status_id');
        //PAINEL FFD ZONA 4 - QD. CONTROLE LOCAL
        $tag_P_FFD_Z4 = "TE 72 400 410 267 000 - 000021";
        $idAtividadeP_FFD_Z4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z4)->value('id');
        $idAnaliseP_FFD_Z4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z4)->max('id');
        $idLaudoP_FFD_Z4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseP_FFD_Z4)->value('id');
        $statusP_FFD_Z4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z4)->value('status_id');
        //PAINEL FFD ZONA 5 - QD. CONTROLE LOCAL
        $tag_P_FFD_Z5 = "TE 72 400 410 267 000 - 000022";
        $idAtividadeP_FFD_Z5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_P_FFD_Z5)->value('id');
        $idAnaliseP_FFD_Z5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeP_FFD_Z5)->max('id');
        $idLaudoP_FFD_Z5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseP_FFD_Z5)->value('id');
        $statusP_FFD_Z5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseP_FFD_Z5)->value('status_id');
        //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 6 - QD. SALVAGUARDA
        $tag_PSTR_CN6 = "TE 72 400 410 267 000 - 000010";
        $idAtividadePSTR_CN6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN6)->value('id');
        $idAnalisePSTR_CN6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN6)->max('id');
        $idLaudoPSTR_CN6 = DB::table('laudos')->where('analise_id', '=', $idAnalisePSTR_CN6)->value('id');
        $statusPSTR_CN6 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN6)->value('status_id');
        //PAINEL SEÇÃO DE TUBO RADIOSO - CHAMA NIVEL 7 - QD. SALVAGUARDA
        $tag_PSTR_CN7 = "TE 72 400 410 267 000 - 000011";
        $idAtividadePSTR_CN7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PSTR_CN7)->value('id');
        $idAnalisePSTR_CN7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePSTR_CN7)->max('id');
        $idLaudoPSTR_CN7 = DB::table('laudos')->where('analise_id', '=', $idAnalisePSTR_CN7)->value('id');
        $statusPSTR_CN7 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePSTR_CN7)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_galvanizacao_forno')
        ->with('idLaudoPFFD_QD_REMOTO', $idLaudoPFFD_QD_REMOTO)->with('statusPFFD_QD_REMOTO', $statusPFFD_QD_REMOTO)
        ->with('idLaudoPR_TR', $idLaudoPR_TR)->with('statusPR_TR', $statusPR_TR)
        ->with('idLaudoPAL_AJ_QD_R', $idLaudoPAL_AJ_QD_R)->with('statusPAL_AJ_QD_R', $statusPAL_AJ_QD_R)
        ->with('idLaudoPAVI_QD_E', $idLaudoPAVI_QD_E)->with('statusPAVI_QD_E', $statusPAVI_QD_E)
        ->with('idLaudoPSTR_CN1', $idLaudoPSTR_CN1)->with('statusPSTR_CN1', $statusPSTR_CN1)
        ->with('idLaudoPFFD_CZ3', $idLaudoPFFD_CZ3)->with('statusPFFD_CZ3', $statusPFFD_CZ3)
        ->with('idLaudoPSTR_CN2', $idLaudoPSTR_CN2)->with('statusPSTR_CN2', $statusPSTR_CN2)
        ->with('idLaudoPSTR_CN3', $idLaudoPSTR_CN3)->with('statusPSTR_CN3', $statusPSTR_CN3)
        ->with('idLaudoP_FFD_Z2', $idLaudoP_FFD_Z2)->with('statusP_FFD_Z2', $statusP_FFD_Z2)
        ->with('idLaudoP_FFD_Z3_GP', $idLaudoP_FFD_Z3_GP)->with('statusP_FFD_Z3_GP', $statusP_FFD_Z3_GP)
        ->with('idLaudoPSTR_CN4', $idLaudoPSTR_CN4)->with('statusPSTR_CN4', $statusPSTR_CN4)
        ->with('idLaudoPSTR_CN5', $idLaudoPSTR_CN5)->with('statusPSTR_CN5', $statusPSTR_CN5)
        ->with('idLaudoP_FFD_Z1', $idLaudoP_FFD_Z1)->with('statusP_FFD_Z1', $statusP_FFD_Z1)
        ->with('idLaudoP_FFD_Z6', $idLaudoP_FFD_Z6)->with('statusP_FFD_Z6', $statusP_FFD_Z6)
        ->with('idLaudoP_FFD_Z4', $idLaudoP_FFD_Z4)->with('statusP_FFD_Z4', $statusP_FFD_Z4)
        ->with('idLaudoP_FFD_Z5', $idLaudoP_FFD_Z5)->with('statusP_FFD_Z5', $statusP_FFD_Z5)
        ->with('idLaudoPSTR_CN6', $idLaudoPSTR_CN6)->with('statusPSTR_CN6', $statusPSTR_CN6)
        ->with('idLaudoPSTR_CN7', $idLaudoPSTR_CN7)->with('statusPSTR_CN7', $statusPSTR_CN7)
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

    public function galvanizacao_infraSaida() {
        //ESTAÇÃO REMOTA - ET060
        $tag_ET_60 = "TE 72 400 410 635 015 - 000001";
        $idAtividadeET_60 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_60)->value('id');
        $idAnaliseET_60 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_60)->max('id');
        $idLaudoET_60 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_60)->value('id');
        $statusET_60 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_60)->value('status_id');
        //ESTAÇÃO REMOTA - ET063
        $tag_ET_63 = "TE 72 400 410 639 024 - 000001";
        $idAtividadeET_63 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_63)->value('id');
        $idAnaliseET_63 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_63)->max('id');
        $idLaudoET_63 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_63)->value('id');
        $statusET_63 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_63)->value('status_id');
        //ESTAÇÃO REMOTA - ET067
        $tag_ET_67 = "TE 72 400 410 639 015 - 000001";
        $idAtividadeET_67 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_67)->value('id');
        $idAnaliseET_67 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_67)->max('id');
        $idLaudoET_67 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_67)->value('id');
        $statusET_67 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_67)->value('status_id');
        //ESTAÇÃO REMOTA - ET064
        $tag_ET_64 = "TE 72 400 410 635 018 - 000001";
        $idAtividadeET_64 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_64)->value('id');
        $idAnaliseET_64 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_64)->max('id');
        $idLaudoET_64 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_64)->value('id');
        $statusET_64 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_64)->value('status_id');
        //ESTAÇÃO REMOTA - ET062
        $tag_ET_62 = "TE 72 400 410 641 012 - 000001";
        $idAtividadeET_62 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_62)->value('id');
        $idAnaliseET_62 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_62)->max('id');
        $idLaudoET_62 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_62)->value('id');
        $statusET_62 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_62)->value('status_id');
        //ESTAÇÃO REMOTA - ET050
        $tag_ET_50 = "TE 72 400 410 635 012 - 000001";
        $idAtividadeET_50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_50)->value('id');
        $idAnaliseET_50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_50)->max('id');
        $idLaudoET_50 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_50)->value('id');
        $statusET_50 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_50)->value('status_id');
        //ESTAÇÃO REMOTA - ET055
        $tag_ET_55 = "TE 72 400 410 653 009 - 000001";
        $idAtividadeET_55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_55)->value('id');
        $idAnaliseET_55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_55)->max('id');
        $idLaudoET_55 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_55)->value('id');
        $statusET_55 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_55)->value('status_id');
        //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#6
        $tag_PRAS_PR6 = "TE 72 400 410 267 000 - 000003";
        $idAtividadePRAS_PR6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR6)->value('id');
        $idAnalisePRAS_PR6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR6)->max('id');
        $idLaudoPRAS_PR6 = DB::table('laudos')->where('analise_id', '=', $idAnalisePRAS_PR6)->value('id');
        $statusPRAS_PR6 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR6)->value('status_id');
        //ESTAÇÃO REMOTA - ET054
        $tag_ET_54 = "TE 72 400 410 653 006 - 000001";
        $idAtividadeET_54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_54)->value('id');
        $idAnaliseET_54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_54)->max('id');
        $idLaudoET_54 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_54)->value('id');
        $statusET_54 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_54)->value('status_id');
        //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#5
        $tag_PRAS_PR5 = "TE 72 400 410 431 000 - 000005";
        $idAtividadePRAS_PR5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR5)->value('id');
        $idAnalisePRAS_PR5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR5)->max('id');
        $idLaudoPRAS_PR5 = DB::table('laudos')->where('analise_id', '=', $idAnalisePRAS_PR5)->value('id');
        $statusPRAS_PR5 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR5)->value('status_id');
        //ESTAÇÃO REMOTA - ET088
        $tag_ET_88 = "TE 72 400 410 641 015 - 000001";
        $idAtividadeET_88 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_88)->value('id');
        $idAnaliseET_88 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_88)->max('id');
        $idLaudoET_88 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_88)->value('id');
        $statusET_88 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_88)->value('status_id');
        //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#4
        $tag_PRAS_PR4 = "TE 72 400 410 431 000 - 000004";
        $idAtividadePRAS_PR4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR4)->value('id');
        $idAnalisePRAS_PR4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR4)->max('id');
        $idLaudoPRAS_PR4 = DB::table('laudos')->where('analise_id', '=', $idAnalisePRAS_PR4)->value('id');
        $statusPRAS_PR4 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR4)->value('status_id');
        //ESTAÇÃO REMOTA - ET052
        $tag_ET_52 = "TE 72 400 410 641 009 - 000001";
        $idAtividadeET_52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_52)->value('id');
        $idAnaliseET_52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_52)->max('id');
        $idLaudoET_52 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_52)->value('id');
        $statusET_52 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_52)->value('status_id');
        //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#3
        $tag_PRAS_PR3 = "TE 72 400 410 431 000 - 000003";
        $idAtividadePRAS_PR3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR3)->value('id');
        $idAnalisePRAS_PR3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR3)->max('id');
        $idLaudoPRAS_PR3 = DB::table('laudos')->where('analise_id', '=', $idAnalisePRAS_PR3)->value('id');
        $statusPRAS_PR3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR3)->value('status_id');
        //OLEADEIRA
        $tag_OLE = "TE 72 400 410 609 006 - 000001";
        $idAtividadeOLE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_OLE)->value('id');
        $idAnaliseOLE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeOLE)->max('id');
        $idLaudoOLE = DB::table('laudos')->where('analise_id', '=', $idAnaliseOLE)->value('id');
        $statusOLE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseOLE)->value('status_id');
        //ESTAÇÃO REMOTA - ET065
        $tag_ET_65 = "TE 72 400 410 635 024 - 000001";
        $idAtividadeET_65 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_65)->value('id');
        $idAnaliseET_65 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_65)->max('id');
        $idLaudoET_65 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_65)->value('id');
        $statusET_65 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_65)->value('status_id');
        //ESTAÇÃO REMOTA - ET051
        $tag_ET_51 = "TE 72 400 410 267 000 - 000010";
        $idAtividadeET_51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_51)->value('id');
        $idAnaliseET_51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_51)->max('id');
        $idLaudoET_51 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_51)->value('id');
        $statusET_51 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_51)->value('status_id');
        //ESTAÇÃO REMOTA - ET072
        $tag_ET_72 = "TE 72 400 410 267 000 - 000011";
        $idAtividadeET_72 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_72)->value('id');
        $idAnaliseET_72 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_72)->max('id');
        $idLaudoET_72 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_72)->value('id');
        $statusET_72 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_72)->value('status_id');
        //ESTAÇÃO REMOTA - ET071
        $tag_ET_71 = "TE 72 400 410 637 009 - 000001";
        $idAtividadeET_71 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_71)->value('id');
        $idAnaliseET_71 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_71)->max('id');
        $idLaudoET_71 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_71)->value('id');
        $statusET_71 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_71)->value('status_id');
        //ESTAÇÃO REMOTA - ET070
        $tag_ET_70 = "TE 72 400 410 637 006 - 000001";
        $idAtividadeET_70 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_70)->value('id');
        $idAnaliseET_70 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_70)->max('id');
        $idLaudoET_70 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_70)->value('id');
        $statusET_70 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_70)->value('status_id');
        //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#2
        $tag_PRAS_PR2 = "TE 72 400 410 431 000 - 000002";
        $idAtividadePRAS_PR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR2)->value('id');
        $idAnalisePRAS_PR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR2)->max('id');
        $idLaudoPRAS_PR2 = DB::table('laudos')->where('analise_id', '=', $idAnalisePRAS_PR2)->value('id');
        $statusPRAS_PR2 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR2)->value('status_id');
        //PAINEL ROSS AIR SYSTEM INC - SOMERVILLE NJ - PR#1
        $tag_PRAS_PR1 = "TE 72 400 410 431 000 - 000001";
        $idAtividadePRAS_PR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRAS_PR1)->value('id');
        $idAnalisePRAS_PR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRAS_PR1)->max('id');
        $idLaudoPRAS_PR1 = DB::table('laudos')->where('analise_id', '=', $idAnalisePRAS_PR1)->value('id');
        $statusPRAS_PR1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRAS_PR1)->value('status_id');
        //ESTAÇÃO REMOTA - ET073
        $tag_ET_73 = "TE 72 400 410 637 015 - 000001";
        $idAtividadeET_73 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_73)->value('id');
        $idAnaliseET_73 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_73)->max('id');
        $idLaudoET_73 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_73)->value('id');
        $statusET_73 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_73)->value('status_id');
        //ESTAÇÃO REMOTA - ET085
        $tag_ET_85 = "TE 72 400 410 639 027 - 000001";
        $idAtividadeET_85 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_85)->value('id');
        $idAnaliseET_85 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_85)->max('id');
        $idLaudoET_85 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_85)->value('id');
        $statusET_85 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_85)->value('status_id');
        //ESTAÇÃO REMOTA - ET046
        $tag_ET_46 = "TE 72 400 410 635 021 - 000001";
        $idAtividadeET_46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_46)->value('id');
        $idAnaliseET_46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_46)->max('id');
        $idLaudoET_46 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_46)->value('id');
        $statusET_46 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_46)->value('status_id');
        //ESTAÇÃO REMOTA - ET044
        $tag_ET_44 = "TE 72 400 410 639 021 - 000001";
        $idAtividadeET_44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_44)->value('id');
        $idAnaliseET_44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_44)->max('id');
        $idLaudoET_44 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_44)->value('id');
        $statusET_44 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_44)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_galvanizacao_infraSaida')
        ->with('idLaudoET_60', $idLaudoET_60)->with('statusET_60', $statusET_60)
        ->with('idLaudoET_63', $idLaudoET_63)->with('statusET_63', $statusET_63)
        ->with('idLaudoET_67', $idLaudoET_67)->with('statusET_67', $statusET_67)
        ->with('idLaudoET_64', $idLaudoET_64)->with('statusET_64', $statusET_64)
        ->with('idLaudoET_62', $idLaudoET_62)->with('statusET_62', $statusET_62)
        ->with('idLaudoET_50', $idLaudoET_50)->with('statusET_50', $statusET_50)
        ->with('idLaudoET_55', $idLaudoET_55)->with('statusET_55', $statusET_55)
        ->with('idLaudoPRAS_PR6', $idLaudoPRAS_PR6)->with('statusPRAS_PR6', $statusPRAS_PR6)
        ->with('idLaudoET_54', $idLaudoET_54)->with('statusET_54', $statusET_54)
        ->with('idLaudoPRAS_PR5', $idLaudoPRAS_PR5)->with('statusPRAS_PR5', $statusPRAS_PR5)
        ->with('idLaudoET_88', $idLaudoET_88)->with('statusET_88', $statusET_88)
        ->with('idLaudoPRAS_PR4', $idLaudoPRAS_PR4)->with('statusPRAS_PR4', $statusPRAS_PR4)
        ->with('idLaudoET_52', $idLaudoET_52)->with('statusET_52', $statusET_52)
        ->with('idLaudoPRAS_PR3', $idLaudoPRAS_PR3)->with('statusPRAS_PR3', $statusPRAS_PR3)
        ->with('idLaudoOLE', $idLaudoOLE)->with('statusOLE', $statusOLE)
        ->with('idLaudoET_65', $idLaudoET_65)->with('statusET_65', $statusET_65)
        ->with('idLaudoET_51', $idLaudoET_51)->with('statusET_51', $statusET_51)
        ->with('idLaudoET_72', $idLaudoET_72)->with('statusET_72', $statusET_72)
        ->with('idLaudoET_71', $idLaudoET_71)->with('statusET_71', $statusET_71)
        ->with('idLaudoET_70', $idLaudoET_70)->with('statusET_70', $statusET_70)
        ->with('idLaudoPRAS_PR2', $idLaudoPRAS_PR2)->with('statusPRAS_PR2', $statusPRAS_PR2)
        ->with('idLaudoPRAS_PR1', $idLaudoPRAS_PR1)->with('statusPRAS_PR1', $statusPRAS_PR1)
        ->with('idLaudoET_73', $idLaudoET_73)->with('statusET_73', $statusET_73)
        ->with('idLaudoET_85', $idLaudoET_85)->with('statusET_85', $statusET_85)
        ->with('idLaudoET_46', $idLaudoET_46)->with('statusET_46', $statusET_46)
        ->with('idLaudoET_44', $idLaudoET_44)->with('statusET_44', $statusET_44)
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

    public function galvanizacao_ccm1_ccm7() {
        //BOMBA DE RETORNO #2 - FORNO
        $tag_BR_2 = "TE 72 400 410 969 087 - 000001";
        $idAtividadeBR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_2)->value('id');
        $idAnaliseBR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_2)->max('id');
        $idLaudoBR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR_2)->value('id');
        $statusBR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_2)->value('status_id');
        //BOMBA DE RETORNO #1 - FORNO
        $tag_BR_1 = "TE 72 400 410 969 066 - 000001";
        $idAtividadeBR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_1)->value('id');
        $idAnaliseBR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_1)->max('id');
        $idLaudoBR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR_1)->value('id');
        $statusBR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_1)->value('status_id');
        //04B5BE04F - ALIM DA UPS
        $tag_ALIM_UPS = "TE 72 400 410 969 039 - 000001";
        $idAtividadeALIM_UPS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_UPS)->value('id');
        $idAnaliseALIM_UPS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_UPS)->max('id');
        $idLaudoALIM_UPS = DB::table('laudos')->where('analise_id', '=', $idAnaliseALIM_UPS)->value('id');
        $statusALIM_UPS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_UPS)->value('status_id');
        //04B5BE04E - ALIM PAINEL MD
        $tag_ALIM_PMD = "TE 72 400 410 969 036 - 000001";
        $idAtividadeALIM_PMD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_PMD)->value('id');
        $idAnaliseALIM_PMD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_PMD)->max('id');
        $idLaudoALIM_PMD = DB::table('laudos')->where('analise_id', '=', $idAnaliseALIM_PMD)->value('id');
        $statusALIM_PMD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_PMD)->value('status_id');
        //ALIMENTAÇÃO EMERGÊNCIA POTE ZINCO - CANAL B
        $tag_ALIM_EMERG_PZB = "TE 72 400 410 969 033 - 000001";
        $idAtividadeALIM_EMERG_PZB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_EMERG_PZB)->value('id');
        $idAnaliseALIM_EMERG_PZB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_EMERG_PZB)->max('id');
        $idLaudoALIM_EMERG_PZB = DB::table('laudos')->where('analise_id', '=', $idAnaliseALIM_EMERG_PZB)->value('id');
        $statusALIM_EMERG_PZB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_EMERG_PZB)->value('status_id');
        //BOMBA DE REFRIGERAÇÃO #2 - POTE DE GALVALUME
        $tag_BR_2_PG = "TE 72 400 410 969 012 - 000001";
        $idAtividadeBR_2_PG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_2_PG)->value('id');
        $idAnaliseBR_2_PG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_2_PG)->max('id');
        $idLaudoBR_2_PG = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR_2_PG)->value('id');
        $statusBR_2_PG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_2_PG)->value('status_id');
        //BOMBA DE REFRIGERAÇÃO #1 - POTE DE GALVALUME
        $tag_BR_1_PG = "TE 72 400 410 969 009 - 000001";
        $idAtividadeBR_1_PG = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_1_PG)->value('id');
        $idAnaliseBR_1_PG = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_1_PG)->max('id');
        $idLaudoBR_1_PG = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR_1_PG)->value('id');
        $statusBR_1_PG = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_1_PG)->value('status_id');
        //ALIMENTAÇÃO EMERGÊNCIA POTE ZINCO - CANAL A
        $tag_ALIM_EMERG_PZA = "TE 72 400 410 969 030 - 000001";
        $idAtividadeALIM_EMERG_PZA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_EMERG_PZA)->value('id');
        $idAnaliseALIM_EMERG_PZA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_EMERG_PZA)->max('id');
        $idLaudoALIM_EMERG_PZA = DB::table('laudos')->where('analise_id', '=', $idAnaliseALIM_EMERG_PZA)->value('id');
        $statusALIM_EMERG_PZA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_EMERG_PZA)->value('status_id');
        //BOMBA DE REFRIGERAÇÃO #2 - POTE DE ZINCO
        $tag_BR_2_PZ = "TE 72 400 410 969 006 - 000001";
        $idAtividadeBR_2_PZ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_2_PZ)->value('id');
        $idAnaliseBR_2_PZ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_2_PZ)->max('id');
        $idLaudoBR_2_PZ = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR_2_PZ)->value('id');
        $statusBR_2_PZ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_2_PZ)->value('status_id');
        //BOMBA DE REFRIGERAÇÃO #1 - POTE DE ZINCO
        $tag_BR_1_PZ = "TE 72 400 410 969 003 - 000001";
        $idAtividadeBR_1_PZ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BR_1_PZ)->value('id');
        $idAnaliseBR_1_PZ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBR_1_PZ)->max('id');
        $idLaudoBR_1_PZ = DB::table('laudos')->where('analise_id', '=', $idAnaliseBR_1_PZ)->value('id');
        $statusBR_1_PZ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBR_1_PZ)->value('status_id');
        //SOPRADOR STRIP DRYER 2
        $tag_SSD_2 = "TE 72 400 410 964 237 - 000001";
        $idAtividadeSSD_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SSD_2)->value('id');
        $idAnaliseSSD_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSSD_2)->max('id');
        $idLaudoSSD_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSSD_2)->value('id');
        $statusSSD_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSSD_2)->value('status_id');
        //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA #3
        $tag_UHE_B3 = "TE 72 400 410 964 069 - 000001";
        $idAtividadeUHE_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_B3)->value('id');
        $idAnaliseUHE_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_B3)->max('id');
        $idLaudoUHE_B3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE_B3)->value('id');
        $statusUHE_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_B3)->value('status_id');
        //DISTRIBUIÇÃO AUXILIAR 115V-220V
        $tag_DA_115_220 = "TE 72 400 410 964 096 - 000001";
        $idAtividadeDA_115_220 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DA_115_220)->value('id');
        $idAnaliseDA_115_220 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDA_115_220)->max('id');
        $idLaudoDA_115_220 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDA_115_220)->value('id');
        $statusDA_115_220 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDA_115_220)->value('status_id');
        //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA #2
        $tag_UHE_B2 = "TE 72 400 410 964 045 - 000001";
        $idAtividadeUHE_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_B2)->value('id');
        $idAnaliseUHE_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_B2)->max('id');
        $idLaudoUHE_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE_B2)->value('id');
        $statusUHE_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_B2)->value('status_id');
        //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA #1
        $tag_UHE_B1 = "TE 72 400 410 964 042 - 000001";
        $idAtividadeUHE_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_B1)->value('id');
        $idAnaliseUHE_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_B1)->max('id');
        $idLaudoUHE_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE_B1)->value('id');
        $statusUHE_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_B1)->value('status_id');
        //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA DE RECIRCULAÇÃO #1
        $tag_UHE_BR1 = "TE 72 400 410 964 009 - 000001";
        $idAtividadeUHE_BR1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_BR1)->value('id');
        $idAnaliseUHE_BR1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_BR1)->max('id');
        $idLaudoUHE_BR1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE_BR1)->value('id');
        $statusUHE_BR1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_BR1)->value('status_id');
        //UNIDADE HIDRÁULICA DE ENTRADA - BOMBA DE RECIRCULAÇÃO #2
        $tag_UHE_BR2 = "TE 72 400 410 964 024 - 000001";
        $idAtividadeUHE_BR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_BR2)->value('id');
        $idAnaliseUHE_BR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_BR2)->max('id');
        $idLaudoUHE_BR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE_BR2)->value('id');
        $statusUHE_BR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_BR2)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_galvanizacao_ccm1_ccm7')
        ->with('idLaudoBR_2', $idLaudoBR_2)->with('statusBR_2', $statusBR_2)
        ->with('idLaudoBR_1', $idLaudoBR_1)->with('statusBR_1', $statusBR_1)
        ->with('idLaudoALIM_UPS', $idLaudoALIM_UPS)->with('statusALIM_UPS', $statusALIM_UPS)
        ->with('idLaudoALIM_PMD', $idLaudoALIM_PMD)->with('statusALIM_PMD', $statusALIM_PMD)
        ->with('idLaudoALIM_EMERG_PZB', $idLaudoALIM_EMERG_PZB)->with('statusALIM_EMERG_PZB', $statusALIM_EMERG_PZB)
        ->with('idLaudoBR_2_PG', $idLaudoBR_2_PG)->with('statusBR_2_PG', $statusBR_2_PG)
        ->with('idLaudoBR_1_PG', $idLaudoBR_1_PG)->with('statusBR_1_PG', $statusBR_1_PG)
        ->with('idLaudoALIM_EMERG_PZA', $idLaudoALIM_EMERG_PZA)->with('statusALIM_EMERG_PZA', $statusALIM_EMERG_PZA)
        ->with('idLaudoBR_2_PZ', $idLaudoBR_2_PZ)->with('statusBR_2_PZ', $statusBR_2_PZ)
        ->with('idLaudoBR_1_PZ', $idLaudoBR_1_PZ)->with('statusBR_1_PZ', $statusBR_1_PZ)
        ->with('idLaudoSSD_2', $idLaudoSSD_2)->with('statusSSD_2', $statusSSD_2)
        ->with('idLaudoUHE_B3', $idLaudoUHE_B3)->with('statusUHE_B3', $statusUHE_B3)
        ->with('idLaudoDA_115_220', $idLaudoDA_115_220)->with('statusDA_115_220', $statusDA_115_220)
        ->with('idLaudoUHE_B2', $idLaudoUHE_B2)->with('statusUHE_B2', $statusUHE_B2)
        ->with('idLaudoUHE_B1', $idLaudoUHE_B1)->with('statusUHE_B1', $statusUHE_B1)
        ->with('idLaudoUHE_BR1', $idLaudoUHE_BR1)->with('statusUHE_BR1', $statusUHE_BR1)
        ->with('idLaudoUHE_BR2', $idLaudoUHE_BR2)->with('statusUHE_BR2', $statusUHE_BR2)
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

    public function galvanizacao_ccm2_ccm3() {
        //SOPRADOR APC #9
        $tag_SAPC_9 = "TE 72 400 410 966 042 - 000001";
        $idAtividadeSAPC_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_9)->value('id');
        $idAnaliseSAPC_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_9)->max('id');
        $idLaudoSAPC_9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_9)->value('id');
        $statusSAPC_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_9)->value('status_id');
        //SOPRADOR APC #7
        $tag_SAPC_7 = "TE 72 400 410 966 030 - 000001";
        $idAtividadeSAPC_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_7)->value('id');
        $idAnaliseSAPC_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_7)->max('id');
        $idLaudoSAPC_7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_7)->value('id');
        $statusSAPC_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_7)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - JET COOL 4-6
        $tag_RE_JET_COOL_4_6 = "TE 72 400 410 965 096 - 000001";
        $idAtividadeRE_JET_COOL_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_JET_COOL_4_6)->value('id');
        $idAnaliseRE_JET_COOL_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_JET_COOL_4_6)->max('id');
        $idLaudoRE_JET_COOL_4_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_JET_COOL_4_6)->value('id');
        $statusRE_JET_COOL_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_JET_COOL_4_6)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - RTS P SLOW 4-6
        $tag_RE_RTS_SLOW_4_6 = "TE 72 400 410 965 081 - 000001";
        $idAtividadeRE_RTS_SLOW_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_RTS_SLOW_4_6)->value('id');
        $idAnaliseRE_RTS_SLOW_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_RTS_SLOW_4_6)->max('id');
        $idLaudoRE_RTS_SLOW_4_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_RTS_SLOW_4_6)->value('id');
        $statusRE_RTS_SLOW_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_RTS_SLOW_4_6)->value('status_id');
        //EXAUSTOR TUBO RADIOSO - ZONA #5
        $tag_ETR_Z5 = "TE 72 400 410 965 060 - 000001";
        $idAtividadeETR_Z5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ETR_Z5)->value('id');
        $idAnaliseETR_Z5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETR_Z5)->max('id');
        $idLaudoETR_Z5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETR_Z5)->value('id');
        $statusETR_Z5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETR_Z5)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - RTS P SLOW 1-3
        $tag_RE_RTS_SLOW_1_3 = "TE 72 400 410 965 078 - 000001";
        $idAtividadeRE_RTS_SLOW_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_RTS_SLOW_1_3)->value('id');
        $idAnaliseRE_RTS_SLOW_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_RTS_SLOW_1_3)->max('id');
        $idLaudoRE_RTS_SLOW_1_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_RTS_SLOW_1_3)->value('id');
        $statusRE_RTS_SLOW_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_RTS_SLOW_1_3)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - JET COOL 1-3
        $tag_RE_JET_COOL_1_3 = "TE 72 400 410 965 093 - 000001";
        $idAtividadeRE_JET_COOL_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_JET_COOL_1_3)->value('id');
        $idAnaliseRE_JET_COOL_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_JET_COOL_1_3)->max('id');
        $idLaudoRE_JET_COOL_1_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_JET_COOL_1_3)->value('id');
        $statusRE_JET_COOL_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_JET_COOL_1_3)->value('status_id');
        //SOPRADOR APC #6
        $tag_SAPC_6 = "TE 72 400 410 966 027 - 000001";
        $idAtividadeSAPC_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_6)->value('id');
        $idAnaliseSAPC_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_6)->max('id');
        $idLaudoSAPC_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_6)->value('id');
        $statusSAPC_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_6)->value('status_id');
        //SOPRADOR APC #8
        $tag_SAPC_8 = "TE 72 400 410 966 039 - 000001";
        $idAtividadeSAPC_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_8)->value('id');
        $idAnaliseSAPC_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_8)->max('id');
        $idLaudoSAPC_8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_8)->value('id');
        $statusSAPC_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_8)->value('status_id');
        //EXAUSTOR TUBO RADIOSO - ZONA #4
        $tag_ETR_Z4 = "TE 72 400 410 965 057 - 000001";
        $idAtividadeETR_Z4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ETR_Z4)->value('id');
        $idAnaliseETR_Z4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETR_Z4)->max('id');
        $idLaudoETR_Z4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETR_Z4)->value('id');
        $statusETR_Z4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETR_Z4)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - DFF P RTH 4-6
        $tag_RE_DFF_RTH_4_6 = "TE 72 400 410 965 075 - 000001";
        $idAtividadeRE_DFF_RTH_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_DFF_RTH_4_6)->value('id');
        $idAnaliseRE_DFF_RTH_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_DFF_RTH_4_6)->max('id');
        $idLaudoRE_DFF_RTH_4_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_DFF_RTH_4_6)->value('id');
        $statusRE_DFF_RTH_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_DFF_RTH_4_6)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - JET TOP 1-3
        $tag_RE_JET_TOP_1_3 = "TE 72 400 410 965 090 - 000001";
        $idAtividadeRE_JET_TOP_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_JET_TOP_1_3)->value('id');
        $idAnaliseRE_JET_TOP_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_JET_TOP_1_3)->max('id');
        $idLaudoRE_JET_TOP_1_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_JET_TOP_1_3)->value('id');
        $statusRE_JET_TOP_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_JET_TOP_1_3)->value('status_id');
        //SOPRADOR APC #3
        $tag_SAPC_3 = "TE 72 400 410 966 024 - 000001";
        $idAtividadeSAPC_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_3)->value('id');
        $idAnaliseSAPC_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_3)->max('id');
        $idLaudoSAPC_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_3)->value('id');
        $statusSAPC_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_3)->value('status_id');
        //SOPRADOR APC #5
        $tag_SAPC_5 = "TE 72 400 410 966 036 - 000001";
        $idAtividadeSAPC_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_5)->value('id');
        $idAnaliseSAPC_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_5)->max('id');
        $idLaudoSAPC_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_5)->value('id');
        $statusSAPC_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_5)->value('status_id');
        //EXAUSTOR DO DFF
        $tag_E_DFF = "TE 72 400 410 965 054 - 000001";
        $idAtividadeE_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_E_DFF)->value('id');
        $idAnaliseE_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeE_DFF)->max('id');
        $idLaudoE_DFF = DB::table('laudos')->where('analise_id', '=', $idAnaliseE_DFF)->value('id');
        $statusE_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseE_DFF)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - DFF P RTH 1-3
        $tag_UHE_BR2 = "TE 72 400 410 965 072 - 000001";
        $idAtividadeUHE_BR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHE_BR2)->value('id');
        $idAnaliseUHE_BR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE_BR2)->max('id');
        $idLaudoUHE_BR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE_BR2)->value('id');
        $statusUHE_BR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE_BR2)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - SLOW TOP 1-3
        $tag_REST_1_3 = "TE 72 400 410 965 087 - 000001";
        $idAtividadeREST_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_REST_1_3)->value('id');
        $idAnaliseREST_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeREST_1_3)->max('id');
        $idLaudoREST_1_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseREST_1_3)->value('id');
        $statusREST_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseREST_1_3)->value('status_id');
        //SOPRADOR APC 2
        $tag_SAPC_2 = "TE 72 400 410 966 021 - 000001";
        $idAtividadeSAPC_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_2)->value('id');
        $idAnaliseSAPC_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_2)->max('id');
        $idLaudoSAPC_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_2)->value('id');
        $statusSAPC_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_2)->value('status_id');
        //SOPRADOR APC #4
        $tag_SAPC_4 = "TE 72 400 410 966 033 - 000001";
        $idAtividadeSAPC_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_4)->value('id');
        $idAnaliseSAPC_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_4)->max('id');
        $idLaudoSAPC_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_4)->value('id');
        $statusSAPC_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_4)->value('status_id');
        //SOPRADOR DE AR - PÓS COMBUSTÃO
        $tag_SAPC = "TE 72 400 410 965 051 - 000001";
        $idAtividadeSAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC)->value('id');
        $idAnaliseSAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC)->max('id');
        $idLaudoSAPC = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC)->value('id');
        $statusSAPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC)->value('status_id');
        //EXAUSTOR TUBO RADIOSO - ZONA #6
        $tag_ETR_Z6 = "TE 72 400 410 965 069 - 000001";
        $idAtividadeETR_Z6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ETR_Z6)->value('id');
        $idAnaliseETR_Z6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeETR_Z6)->max('id');
        $idLaudoETR_Z6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseETR_Z6)->value('id');
        $statusETR_Z6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseETR_Z6)->value('status_id');
        //SOPRADOR DILUIÇÃO DE AR
        $tag_SDA = "TE 72 400 410 965 048 - 000001";
        $idAtividadeSDA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SDA)->value('id');
        $idAnaliseSDA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSDA)->max('id');
        $idLaudoSDA = DB::table('laudos')->where('analise_id', '=', $idAnaliseSDA)->value('id');
        $statusSDA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSDA)->value('status_id');
        //DISTRIBUIÇÃO AUXILIAR 115V
        $tag_DA_115V = "TE 72 400 410 965 045 - 000001";
        $idAtividadeDA_115V = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DA_115V)->value('id');
        $idAnaliseDA_115V = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDA_115V)->max('id');
        $idLaudoDA_115V = DB::table('laudos')->where('analise_id', '=', $idAnaliseDA_115V)->value('id');
        $statusDA_115V = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDA_115V)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - SLOW COOL 10-12
        $tag_RESC_10_12 = "TE 72 400 410 965 033 - 000001";
        $idAtividadeRESC_10_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RESC_10_12)->value('id');
        $idAnaliseRESC_10_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRESC_10_12)->max('id');
        $idLaudoRESC_10_12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRESC_10_12)->value('id');
        $statusRESC_10_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRESC_10_12)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - SLOW COOL 7-9
        $tag_RESC_7_9 = "TE 72 400 410 965 030 - 000001";
        $idAtividadeRESC_7_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RESC_7_9)->value('id');
        $idAnaliseRESC_7_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRESC_7_9)->max('id');
        $idLaudoRESC_7_9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRESC_7_9)->value('id');
        $statusRESC_7_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRESC_7_9)->value('status_id');
        //*********************** NÃO CADASTRADO NO BANCO
        //RESISTÊNCIA ELÉTRICA - 7-9
        $tag_RE_7_9 = "TE 72 400 410 965 015 - 000001";
        $idAtividadeRE_7_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_7_9)->value('id');
        $idAnaliseRE_7_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_7_9)->max('id');
        $idLaudoRE_7_9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_7_9)->value('id');
        $statusRE_7_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_7_9)->value('status_id');
        //SOPRADOR APC #10
        $tag_SAPC_10 = "TE 72 400 410 966 012 - 000001";
        $idAtividadeSAPC_10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_10)->value('id');
        $idAnaliseSAPC_10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_10)->max('id');
        $idLaudoSAPC_10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_10)->value('id');
        $statusSAPC_10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_10)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - SLOW COOL 4-6
        $tag_RESC_4_6 = "TE 72 400 410 965 027 - 000001";
        $idAtividadeRESC_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RESC_4_6)->value('id');
        $idAnaliseRESC_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRESC_4_6)->max('id');
        $idLaudoRESC_4_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRESC_4_6)->value('id');
        $statusRESC_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRESC_4_6)->value('status_id');
        //*********************** NÃO CADASTRADO NO BANCO
        //RESISTÊNCIA ELÉTRICA - 4-6
        $tag_RE_4_6 = "TE 72 400 410 965 012 - 000001";
        $idAtividadeRE_4_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_4_6)->value('id');
        $idAnaliseRE_4_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_4_6)->max('id');
        $idLaudoRE_4_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_4_6)->value('id');
        $statusRE_4_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_4_6)->value('status_id');
        //SOPRADOR - ZONA #3
        $tag_SZ_3 = "TE 72 400 410 965 042 - 000001";
        $idAtividadeSZ_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SZ_3)->value('id');
        $idAnaliseSZ_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ_3)->max('id');
        $idLaudoSZ_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSZ_3)->value('id');
        $statusSZ_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ_3)->value('status_id');
        //ALIMENTAÇÃO CARRO APC
        $tag_ACAPC = "TE 72 400 410 966 009 - 000001";
        $idAtividadeACAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACAPC)->value('id');
        $idAnaliseACAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACAPC)->max('id');
        $idLaudoACAPC = DB::table('laudos')->where('analise_id', '=', $idAnaliseACAPC)->value('id');
        $statusACAPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACAPC)->value('status_id');
        //RESISTÊNCIA ELÉTRICA - SLOW COOL 1-3
        $tag_RESC_1_3 = "TE 72 400 410 965 024 - 000001";
        $idAtividadeRESC_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RESC_1_3)->value('id');
        $idAnaliseRESC_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRESC_1_3)->max('id');
        $idLaudoRESC_1_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRESC_1_3)->value('id');
        $statusRESC_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRESC_1_3)->value('status_id');
        //*********************** NÃO CADASTRADO NO BANCO
        //RESISTÊNCIA ELÉTRICA - 1-3
        $tag_RE_1_3 = "TE 72 400 410 965 009 - 000001";
        $idAtividadeRE_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_1_3)->value('id');
        $idAnaliseRE_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_1_3)->max('id');
        $idLaudoRE_1_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_1_3)->value('id');
        $statusRE_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_1_3)->value('status_id');
        //SOPRADOR APC #1
        $tag_SAPC_1 = "TE 72 400 410 966 006 - 000001";
        $idAtividadeSAPC_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SAPC_1)->value('id');
        $idAnaliseSAPC_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSAPC_1)->max('id');
        $idLaudoSAPC_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSAPC_1)->value('id');
        $statusSAPC_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSAPC_1)->value('status_id');
        //SOPRADORES ZONAS #1-#2
        $tag_SZ_1_2 = "TE 72 400 410 965 039 - 000001";
        $idAtividadeSZ_1_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SZ_1_2)->value('id');
        $idAnaliseSZ_1_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ_1_2)->max('id');
        $idLaudoSZ_1_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSZ_1_2)->value('id');
        $statusSZ_1_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ_1_2)->value('status_id');
        //SOPRADOR PILOTO TUBO RADIANTE
        $tag_SPTR = "TE 72 400 410 965 006 - 000001";
        $idAtividadeSPTR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SPTR)->value('id');
        $idAnaliseSPTR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPTR)->max('id');
        $idLaudoSPTR = DB::table('laudos')->where('analise_id', '=', $idAnaliseSPTR)->value('id');
        $statusSPTR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPTR)->value('status_id');
        //SOPRADOR PILOTO DFF
        $tag_SP_DFF = "TE 72 400 410 965 003 - 000003";
        $idAtividadeSP_DFF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SP_DFF)->value('id');
        $idAnaliseSP_DFF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSP_DFF)->max('id');
        $idLaudoSP_DFF = DB::table('laudos')->where('analise_id', '=', $idAnaliseSP_DFF)->value('id');
        $statusSP_DFF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSP_DFF)->value('status_id');

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

        return view('csn.relatoriosTecnicos.termografia_galvanizacao_ccm2_ccm3')
        ->with('idLaudoSAPC_9', $idLaudoSAPC_9)->with('statusSAPC_9', $statusSAPC_9)
        ->with('idLaudoSAPC_7', $idLaudoSAPC_7)->with('statusSAPC_7', $statusSAPC_7)
        ->with('idLaudoRE_JET_COOL_4_6', $idLaudoRE_JET_COOL_4_6)->with('statusRE_JET_COOL_4_6', $statusRE_JET_COOL_4_6)
        ->with('idLaudoRE_RTS_SLOW_4_6', $idLaudoRE_RTS_SLOW_4_6)->with('statusRE_RTS_SLOW_4_6', $statusRE_RTS_SLOW_4_6)
        ->with('idLaudoETR_Z5', $idLaudoETR_Z5)->with('statusETR_Z5', $statusETR_Z5)
        ->with('idLaudoRE_RTS_SLOW_1_3', $idLaudoRE_RTS_SLOW_1_3)->with('statusRE_RTS_SLOW_1_3', $statusRE_RTS_SLOW_1_3)
        ->with('idLaudoRE_JET_COOL_1_3', $idLaudoRE_JET_COOL_1_3)->with('statusRE_JET_COOL_1_3', $statusRE_JET_COOL_1_3)
        ->with('idLaudoSAPC_6', $idLaudoSAPC_6)->with('statusSAPC_6', $statusSAPC_6)
        ->with('idLaudoSAPC_8', $idLaudoSAPC_8)->with('statusSAPC_8', $statusSAPC_8)
        ->with('idLaudoETR_Z4', $idLaudoETR_Z4)->with('statusETR_Z4', $statusETR_Z4)
        ->with('idLaudoRE_DFF_RTH_4_6', $idLaudoRE_DFF_RTH_4_6)->with('statusRE_DFF_RTH_4_6', $statusRE_DFF_RTH_4_6)
        ->with('idLaudoRE_JET_TOP_1_3', $idLaudoRE_JET_TOP_1_3)->with('statusRE_JET_TOP_1_3', $statusRE_JET_TOP_1_3)
        ->with('idLaudoSAPC_3', $idLaudoSAPC_3)->with('statusSAPC_3', $statusSAPC_3)
        ->with('idLaudoSAPC_5', $idLaudoSAPC_5)->with('statusSAPC_5', $statusSAPC_5)
        ->with('idLaudoE_DFF', $idLaudoE_DFF)->with('statusE_DFF', $statusE_DFF)
        ->with('idLaudoUHE_BR2', $idLaudoUHE_BR2)->with('statusUHE_BR2', $statusUHE_BR2)
        ->with('idLaudoREST_1_3', $idLaudoREST_1_3)->with('statusREST_1_3', $statusREST_1_3)
        ->with('idLaudoSAPC_2', $idLaudoSAPC_2)->with('statusSAPC_2', $statusSAPC_2)
        ->with('idLaudoSAPC_4', $idLaudoSAPC_4)->with('statusSAPC_4', $statusSAPC_4)
        ->with('idLaudoSAPC', $idLaudoSAPC)->with('statusSAPC', $statusSAPC)
        ->with('idLaudoETR_Z6', $idLaudoETR_Z6)->with('statusETR_Z6', $statusETR_Z6)
        ->with('idLaudoSDA', $idLaudoSDA)->with('statusSDA', $statusSDA)
        ->with('idLaudoDA_115V', $idLaudoDA_115V)->with('statusDA_115V', $statusDA_115V)
        ->with('idLaudoRESC_10_12', $idLaudoRESC_10_12)->with('statusRESC_10_12', $statusRESC_10_12)
        ->with('idLaudoRESC_7_9', $idLaudoRESC_7_9)->with('statusRESC_7_9', $statusRESC_7_9)
        ->with('idLaudoRE_7_9', $idLaudoRE_7_9)->with('statusRE_7_9', $statusRE_7_9)
        ->with('idLaudoSAPC_10', $idLaudoSAPC_10)->with('statusSAPC_10', $statusSAPC_10)
        ->with('idLaudoRESC_4_6', $idLaudoRESC_4_6)->with('statusRESC_4_6', $statusRESC_4_6)
        ->with('idLaudoRE_4_6', $idLaudoRE_4_6)->with('statusRE_4_6', $statusRE_4_6)
        ->with('idLaudoSZ_3', $idLaudoSZ_3)->with('statusSZ_3', $statusSZ_3)
        ->with('idLaudoACAPC', $idLaudoACAPC)->with('statusACAPC', $statusACAPC)
        ->with('idLaudoRESC_1_3', $idLaudoRESC_1_3)->with('statusRESC_1_3', $statusRESC_1_3)
        ->with('idLaudoRE_1_3', $idLaudoRE_1_3)->with('statusRE_1_3', $statusRE_1_3)
        ->with('idLaudoSAPC_1', $idLaudoSAPC_1)->with('statusSAPC_1', $statusSAPC_1)
        ->with('idLaudoSZ_1_2', $idLaudoSZ_1_2)->with('statusSZ_1_2', $statusSZ_1_2)
        ->with('idLaudoSPTR', $idLaudoSPTR)->with('statusSPTR', $statusSPTR)
        ->with('idLaudoSP_DFF', $idLaudoSP_DFF)->with('statusSP_DFF', $statusSP_DFF)
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

    public function galvanizacao_alarme_ccm4_ccm5() {
        //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA #4
        $tag_UHS_B4 = "TE 72 400 410 968 246 - 000001";
        $idAtividadeUHS_B4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_B4)->value('id');
        $idAnaliseUHS_B4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B4)->max('id');
        $idLaudoUHS_B4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS_B4)->value('id');
        $statusUHS_B4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B4)->value('status_id');
        //SOPRADOR PRINCIPAL - MOTOR #3
        $tag_SP_M3 = "TE 72 400 410 967 093 - 000002";
        $idAtividadeSP_M3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SP_M3)->value('id');
        $idAnaliseSP_M3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSP_M3)->max('id');
        $idLaudoSP_M3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSP_M3)->value('id');
        $statusSP_M3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSP_M3)->value('status_id');
        //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA #3
        $tag_UHS_B3 = "TE 72 400 410 968 243 - 000001";
        $idAtividadeUHS_B3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_B3)->value('id');
        $idAnaliseUHS_B3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B3)->max('id');
        $idLaudoUHS_B3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS_B3)->value('id');
        $statusUHS_B3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B3)->value('status_id');
        //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA #2
        $tag_UHS_B2 = "TE 72 400 410 968 240 - 000001";
        $idAtividadeUHS_B2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_B2)->value('id');
        $idAnaliseUHS_B2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B2)->max('id');
        $idLaudoUHS_B2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS_B2)->value('id');
        $statusUHS_B2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B2)->value('status_id');
        //DISTRIBUIÇÃO AUXILIAR 115V
        $tag_D_AUX_115V = "TE 72 400 410 968 141 - 000001";
        $idAtividadeD_AUX_115V = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_D_AUX_115V)->value('id');
        $idAnaliseD_AUX_115V = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD_AUX_115V)->max('id');
        $idLaudoD_AUX_115V = DB::table('laudos')->where('analise_id', '=', $idAnaliseD_AUX_115V)->value('id');
        $statusD_AUX_115V = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD_AUX_115V)->value('status_id');
        //AR CONDICIONADO
        $tag_AR_CON = "TE 72 400 410 967 093 - 000001";
        $idAtividadeAR_CON = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AR_CON)->value('id');
        $idAnaliseAR_CON = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAR_CON)->max('id');
        $idLaudoAR_CON = DB::table('laudos')->where('analise_id', '=', $idAnaliseAR_CON)->value('id');
        $statusAR_CON = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAR_CON)->value('status_id');
        //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA #1
        $tag_UHS_B1 = "TE 72 400 410 968 237 - 000001";
        $idAtividadeUHS_B1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_B1)->value('id');
        $idAnaliseUHS_B1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_B1)->max('id');
        $idLaudoUHS_B1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS_B1)->value('id');
        $statusUHS_B1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_B1)->value('status_id');
        //PAINEL DE EMERGÊNCIA  04B5DA08
        $tag_PE_DA08 = "TE 72 400 410 559 000 - 000004";
        $idAtividadePE_DA08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_DA08)->value('id');
        $idAnalisePE_DA08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_DA08)->max('id');
        $idLaudoPE_DA08 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_DA08)->value('id');
        $statusPE_DA08 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_DA08)->value('status_id');
        //PAINEL DE EMERGÊNCIA  04B5DA07
        $tag_PE_DA07 = "TE 72 400 410 559 000 - 000003";
        $idAtividadePE_DA07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_DA07)->value('id');
        $idAnalisePE_DA07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_DA07)->max('id');
        $idLaudoPE_DA07 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_DA07)->value('id');
        $statusPE_DA07 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_DA07)->value('status_id');
        //PAINEL DE EMERGÊNCIA  04B5DA06
        $tag_PE_DA06 = "TE 72 400 410 559 000 - 000002";
        $idAtividadePE_DA06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_DA06)->value('id');
        $idAnalisePE_DA06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_DA06)->max('id');
        $idLaudoPE_DA06 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_DA06)->value('id');
        $statusPE_DA06 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_DA06)->value('status_id');
        //PAINEL DE EMERGÊNCIA  04B5DA05
        $tag_PE_DA05 = "TE 72 400 410 559 000 - 000001";
        $idAtividadePE_DA05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_DA05)->value('id');
        $idAnalisePE_DA05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_DA05)->max('id');
        $idLaudoPE_DA05 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_DA05)->value('id');
        $statusPE_DA05 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_DA05)->value('status_id');
        //UNIDADE HIDRÁULICA DE SAÍDA - BOMBA DE RECIRCULAÇÃO
        $tag_UHS_BR = "TE 72 400 410 968 231 - 000001";
        $idAtividadeUHS_BR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_UHS_BR)->value('id');
        $idAnaliseUHS_BR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS_BR)->max('id');
        $idLaudoUHS_BR = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS_BR)->value('id');
        $statusUHS_BR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS_BR)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_galvanizacao_galvanizacao_alarme_ccm4_ccm5')
        ->with('idLaudoUHS_B4', $idLaudoUHS_B4)->with('statusUHS_B4', $statusUHS_B4)
        ->with('idLaudoSP_M3', $idLaudoSP_M3)->with('statusSP_M3', $statusSP_M3)
        ->with('idLaudoUHS_B3', $idLaudoUHS_B3)->with('statusUHS_B3', $statusUHS_B3)
        ->with('idLaudoUHS_B2', $idLaudoUHS_B2)->with('statusUHS_B2', $statusUHS_B2)
        ->with('idLaudoD_AUX_115V', $idLaudoD_AUX_115V)->with('statusD_AUX_115V', $statusD_AUX_115V)
        ->with('idLaudoAR_CON', $idLaudoAR_CON)->with('statusAR_CON', $statusAR_CON)
        ->with('idLaudoUHS_B1', $idLaudoUHS_B1)->with('statusUHS_B1', $statusUHS_B1)
        ->with('idLaudoPE_DA08', $idLaudoPE_DA08)->with('statusPE_DA08', $statusPE_DA08)
        ->with('idLaudoPE_DA07', $idLaudoPE_DA07)->with('statusPE_DA07', $statusPE_DA07)
        ->with('idLaudoPE_DA06', $idLaudoPE_DA06)->with('statusPE_DA06', $statusPE_DA06)
        ->with('idLaudoPE_DA05', $idLaudoPE_DA05)->with('statusPE_DA05', $statusPE_DA05)
        ->with('idLaudoUHS_BR', $idLaudoUHS_BR)->with('statusUHS_BR', $statusUHS_BR)
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

    public function galvanizacao_drive_entrada() {
        //SOPRADOR #2 INFRARED
        $tag_S_2_INFRA = "TE 72 400 410 557 000 - 000582";
        $idAtividadeS_2_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S_2_INFRA)->value('id');
        $idAnaliseS_2_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS_2_INFRA)->max('id');
        $idLaudoS_2_INFRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseS_2_INFRA)->value('id');
        $statusS_2_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS_2_INFRA)->value('status_id');
        //SOPRADOR #4 INFRARED
        $tag_S_4_INFRA = "TE 72 400 410 557 000 - 000578";
        $idAtividadeS_4_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S_4_INFRA)->value('id');
        $idAnaliseS_4_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS_4_INFRA)->max('id');
        $idLaudoS_4_INFRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseS_4_INFRA)->value('id');
        $statusS_4_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS_4_INFRA)->value('status_id');
        //NAVALHA DE AR - SOPRADOR #2
        $tag_NAR_S2 = "TE 72 400 410 557 000 - 000573";
        $idAtividadeNAR_S2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAR_S2)->value('id');
        $idAnaliseNAR_S2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_S2)->max('id');
        $idLaudoNAR_S2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseNAR_S2)->value('id');
        $statusNAR_S2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_S2)->value('status_id');
        //NAVALHA DE AR - SOPRADOR #1
        $tag_NAR_S1 = "TE 72 400 410 557 000 - 000569";
        $idAtividadeNAR_S1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_NAR_S1)->value('id');
        $idAnaliseNAR_S1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeNAR_S1)->max('id');
        $idLaudoNAR_S1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseNAR_S1)->value('id');
        $statusNAR_S1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseNAR_S1)->value('status_id');
        //-----------


        //MÓDULO DE FRENAGEM (2)
        $tag_MOD_FRE_2 = "TE 72 400 410 557 000 - 000555";
        $idAtividadeMOD_FRE_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MOD_FRE_2)->value('id');
        $idAnaliseMOD_FRE_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMOD_FRE_2)->max('id');
        $idLaudoMOD_FRE_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseMOD_FRE_2)->value('id');
        $statusMOD_FRE_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMOD_FRE_2)->value('status_id');
        //ENTRADA
        $tag_ENTRADA_1 = "TE 72 400 410 557 000 - 000551";
        $idAtividadeENTRADA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ENTRADA_1)->value('id');
        $idAnaliseENTRADA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENTRADA_1)->max('id');
        $idLaudoENTRADA_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseENTRADA_1)->value('id');
        $statusENTRADA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENTRADA_1)->value('status_id');
        //MÓDULO DE FRENAGEM (2)
        $tag_MOD_FRE = "TE 72 400 410 557 000 - 000537";
        $idAtividadeMOD_FRE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MOD_FRE)->value('id');
        $idAnaliseMOD_FRE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMOD_FRE)->max('id');
        $idLaudoMOD_FRE = DB::table('laudos')->where('analise_id', '=', $idAnaliseMOD_FRE)->value('id');
        $statusMOD_FRE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMOD_FRE)->value('status_id');
        //ACUMULADOR DE ENTRADA
        $tag_A_ENTRADA = "TE 72 400 410 557 000 - 000531";
        $idAtividadeA_ENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A_ENTRADA)->value('id');
        $idAnaliseA_ENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA_ENTRADA)->max('id');
        $idLaudoA_ENTRADA = DB::table('laudos')->where('analise_id', '=', $idAnaliseA_ENTRADA)->value('id');
        $statusA_ENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA_ENTRADA)->value('status_id');
        //TENSOR 1 ROLO #2
        $tag_T1_R2 = "TE 72 400 410 557 000 - 000529";
        $idAtividadeT1_R2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_T1_R2)->value('id');
        $idAnaliseT1_R2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT1_R2)->max('id');
        $idLaudoT1_R2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseT1_R2)->value('id');
        $statusT1_R2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT1_R2)->value('status_id');
        //TENSOR 1 ROLO #1
        $tag_T1_R1 = "TE 72 400 410 557 000 - 000527";
        $idAtividadeT1_R1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_T1_R1)->value('id');
        $idAnaliseT1_R1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT1_R1)->max('id');
        $idLaudoT1_R1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseT1_R1)->value('id');
        $statusT1_R1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT1_R1)->value('status_id');
        //SOPRADOR #1 INFRARED
        $tag_S1_INFRA = "TE 72 400 410 557 000 - 000525";
        $idAtividadeS1_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_INFRA)->value('id');
        $idAnaliseS1_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_INFRA)->max('id');
        $idLaudoS1_INFRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_INFRA)->value('id');
        $statusS1_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_INFRA)->value('status_id');
        //SOPRADOR #3 INFRARED
        $tag_S3_INFRA = "TE 72 400 410 557 000 - 000523";
        $idAtividadeS3_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S3_INFRA)->value('id');
        $idAnaliseS3_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS3_INFRA)->max('id');
        $idLaudoS3_INFRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseS3_INFRA)->value('id');
        $statusS3_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS3_INFRA)->value('status_id');
        //ROLO DEFLETOR #15 - FORNO
        $tag_RD_15 = "TE 72 400 410 557 000 - 000509";
        $idAtividadeRD_15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_15)->value('id');
        $idAnaliseRD_15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_15)->max('id');
        $idLaudoRD_15 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_15)->value('id');
        $statusRD_15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_15)->value('status_id');
        //ROLO DEFLETOR #18 - FORNO
        $tag_RD_18 = "TE 72 400 410 557 000 - 000516";
        $idAtividadeRD_18 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_18)->value('id');
        $idAnaliseRD_18 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_18)->max('id');
        $idLaudoRD_18 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_18)->value('id');
        $statusRD_18 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_18)->value('status_id');
        //ROLO DEFLETOR #17 - FORNO
        $tag_RD_17 = "TE 72 400 410 557 000 - 000507";
        $idAtividadeRD_17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_17)->value('id');
        $idAnaliseRD_17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_17)->max('id');
        $idLaudoRD_17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_17)->value('id');
        $statusRD_17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_17)->value('status_id');
        //ROLO DEFLETOR #16 - FORNO
        $tag_RD_16 = "TE 72 400 410 557 000 - 000505";
        $idAtividadeRD_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_16)->value('id');
        $idAnaliseRD_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_16)->max('id');
        $idLaudoRD_16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_16)->value('id');
        $statusRD_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_16)->value('status_id');
        //RETIFICADOR 630KW - MESTRE
        $tag_R_630_MESTRE = "TE 72 400 410 557 000 - 000502";
        $idAtividadeR_630_MESTRE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_R_630_MESTRE)->value('id');
        $idAnaliseR_630_MESTRE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR_630_MESTRE)->max('id');
        $idLaudoR_630_MESTRE = DB::table('laudos')->where('analise_id', '=', $idAnaliseR_630_MESTRE)->value('id');
        $statusR_630_MESTRE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR_630_MESTRE)->value('status_id');
        //RETIFICADOR 630KW - ESCRAVO 1
        $tag_R_630_ESCRAVO_1 = "TE 72 400 410 557 000 - 000587";
        $idAtividadeR_630_ESCRAVO_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_R_630_ESCRAVO_1)->value('id');
        $idAnaliseR_630_ESCRAVO_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR_630_ESCRAVO_1)->max('id');
        $idLaudoR_630_ESCRAVO_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR_630_ESCRAVO_1)->value('id');
        $statusR_630_ESCRAVO_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR_630_ESCRAVO_1)->value('status_id');
        //RETIFICADOR 630KW - ESCRAVO 2
        $tag_R_630_ESCRAVO_2 = "TE 72 400 410 557 000 - 000501";
        $idAtividadeR_630_ESCRAVO_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_R_630_ESCRAVO_2)->value('id');
        $idAnaliseR_630_ESCRAVO_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR_630_ESCRAVO_2)->max('id');
        $idLaudoR_630_ESCRAVO_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR_630_ESCRAVO_2)->value('id');
        $statusR_630_ESCRAVO_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR_630_ESCRAVO_2)->value('status_id');
        //DESENROLADEIRA 2
        $tag_DESENROLADEIRA_2 = "TE 72 400 410 557 000 - 000498";
        $idAtividadeDESENROLADEIRA_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESENROLADEIRA_2)->value('id');
        $idAnaliseDESENROLADEIRA_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENROLADEIRA_2)->max('id');
        $idLaudoDESENROLADEIRA_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESENROLADEIRA_2)->value('id');
        $statusDESENROLADEIRA_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENROLADEIRA_2)->value('status_id');
        //DESENROLADEIRA 1
        $tag_DESENROLADEIRA_1 = "TE 72 400 410 557 000 - 000494";
        $idAtividadeDESENROLADEIRA_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESENROLADEIRA_1)->value('id');
        $idAnaliseDESENROLADEIRA_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESENROLADEIRA_1)->max('id');
        $idLaudoDESENROLADEIRA_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESENROLADEIRA_1)->value('id');
        $statusDESENROLADEIRA_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESENROLADEIRA_1)->value('status_id');
        //FORNO - PRÉ AQUECIMENTO ROLO SELO #3B - INFERIOR
        $tag_FPARS_3B = "TE 72 400 410 557 000 - 000487";
        $idAtividadeFPARS_3B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_3B)->value('id');
        $idAnaliseFPARS_3B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_3B)->max('id');
        $idLaudoFPARS_3B = DB::table('laudos')->where('analise_id', '=', $idAnaliseFPARS_3B)->value('id');
        $statusFPARS_3B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_3B)->value('status_id');
        //FORNO - PRÉ AQUECIMENTO ROLO SELO #3A - SUPERIOR
        $tag_FPARS_3A = "TE 72 400 410 557 000 - 000480";
        $idAtividadeFPARS_3A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_3A)->value('id');
        $idAnaliseFPARS_3A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_3A)->max('id');
        $idLaudoFPARS_3A = DB::table('laudos')->where('analise_id', '=', $idAnaliseFPARS_3A)->value('id');
        $statusFPARS_3A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_3A)->value('status_id');
        //FORNO - PRÉ AQUECIMENTO ROLO SELO #2B - INFERIOR
        $tag_FPARS_2B = "TE 72 400 410 557 000 - 000473";
        $idAtividadeFPARS_2B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_2B)->value('id');
        $idAnaliseFPARS_2B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_2B)->max('id');
        $idLaudoFPARS_2B = DB::table('laudos')->where('analise_id', '=', $idAnaliseFPARS_2B)->value('id');
        $statusFPARS_2B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_2B)->value('status_id');
        //FORNO - PRÉ AQUECIMENTO ROLO SELO #2A - SUPERIOR
        $tag_FPARS_2A = "TE 72 400 410 557 000 - 000466";
        $idAtividadeFPARS_2A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_2A)->value('id');
        $idAnaliseFPARS_2A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_2A)->max('id');
        $idLaudoFPARS_2A = DB::table('laudos')->where('analise_id', '=', $idAnaliseFPARS_2A)->value('id');
        $statusFPARS_2A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_2A)->value('status_id');
        //FORNO - PRÉ AQUECIMENTO ROLO SELO #1B - SAÍDA
        $tag_FPARS_1B = "TE 72 400 410 557 000 - 000459";
        $idAtividadeFPARS_1B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_1B)->value('id');
        $idAnaliseFPARS_1B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_1B)->max('id');
        $idLaudoFPARS_1B = DB::table('laudos')->where('analise_id', '=', $idAnaliseFPARS_1B)->value('id');
        $statusFPARS_1B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_1B)->value('status_id');
        //FORNO - PRÉ AQUECIMENTO ROLO SELO #1A - ENTRADA
        $tag_FPARS_1A = "TE 72 400 410 557 000 - 000452";
        $idAtividadeFPARS_1A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FPARS_1A)->value('id');
        $idAnaliseFPARS_1A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFPARS_1A)->max('id');
        $idLaudoFPARS_1A = DB::table('laudos')->where('analise_id', '=', $idAnaliseFPARS_1A)->value('id');
        $statusFPARS_1A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFPARS_1A)->value('status_id');
        //SOPRADOR DE RESFRIAMENTO INFRARED
        $tag_SRI = "TE 72 400 410 557 000 - 000445";
        $idAtividadeSRI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SRI)->value('id');
        $idAnaliseSRI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSRI)->max('id');
        $idLaudoSRI = DB::table('laudos')->where('analise_id', '=', $idAnaliseSRI)->value('id');
        $statusSRI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSRI)->value('status_id');
        //EXAUSTOR DO INFRARED
        $tag_EXAS_INFRA = "TE 72 400 410 557 000 - 000438";
        $idAtividadeEXAS_INFRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAS_INFRA)->value('id');
        $idAnaliseEXAS_INFRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAS_INFRA)->max('id');
        $idLaudoEXAS_INFRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseEXAS_INFRA)->value('id');
        $statusEXAS_INFRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAS_INFRA)->value('status_id');
        //ELEVADOR DO FORNO
        $tag_ELEV_FORNO = "TE 72 400 410 557 000 - 000436";
        $idAtividadeELEV_FORNO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ELEV_FORNO)->value('id');
        $idAnaliseELEV_FORNO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeELEV_FORNO)->max('id');
        $idLaudoELEV_FORNO = DB::table('laudos')->where('analise_id', '=', $idAnaliseELEV_FORNO)->value('id');
        $statusELEV_FORNO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseELEV_FORNO)->value('status_id');
        //RESFRIAMENTO RÁPIDO - JET COOLER #8
        $tag_RR_JC_8 = "TE 72 400 410 557 000 - 000429";
        $idAtividadeRR_JC_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_8)->value('id');
        $idAnaliseRR_JC_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_8)->max('id');
        $idLaudoRR_JC_8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRR_JC_8)->value('id');
        $statusRR_JC_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_8)->value('status_id');
        //RESFRIAMENTO RÁPIDO - JET COOLER #7
        $tag_RR_JC_7 = "TE 72 400 410 557 000 - 000422";
        $idAtividadeRR_JC_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_7)->value('id');
        $idAnaliseRR_JC_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_7)->max('id');
        $idLaudoRR_JC_7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRR_JC_7)->value('id');
        $statusRR_JC_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_7)->value('status_id');
        //RESFRIAMENTO RÁPIDO - JET COOLER #6
        $tag_RR_JC_6 = "TE 72 400 410 557 000 - 000415";
        $idAtividadeRR_JC_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_6)->value('id');
        $idAnaliseRR_JC_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_6)->max('id');
        $idLaudoRR_JC_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRR_JC_6)->value('id');
        $statusRR_JC_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_6)->value('status_id');
        //RESFRIAMENTO RÁPIDO - JET COOLER #5
        $tag_RR_JC_5 = "TE 72 400 410 557 000 - 000408";
        $idAtividadeRR_JC_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_5)->value('id');
        $idAnaliseRR_JC_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_5)->max('id');
        $idLaudoRR_JC_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRR_JC_5)->value('id');
        $statusRR_JC_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_5)->value('status_id');
        //RESFRIAMENTO RÁPIDO - JET COOLER #4
        $tag_RR_JC_4 = "TE 72 400 410 557 000 - 000401";
        $idAtividadeRR_JC_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_4)->value('id');
        $idAnaliseRR_JC_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_4)->max('id');
        $idLaudoRR_JC_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRR_JC_4)->value('id');
        $statusRR_JC_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_4)->value('status_id');
        //RESFRIAMENTO RÁPIDO - JET COOLER #3
        $tag_RR_JC_3 = "TE 72 400 410 557 000 - 000394";
        $idAtividadeRR_JC_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_3)->value('id');
        $idAnaliseRR_JC_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_3)->max('id');
        $idLaudoRR_JC_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRR_JC_3)->value('id');
        $statusRR_JC_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_3)->value('status_id');
        //RESFRIAMENTO RÁPIDO - JET COOLER #2
        $tag_RR_JC_2 = "TE 72 400 410 557 000 - 000387";
        $idAtividadeRR_JC_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_2)->value('id');
        $idAnaliseRR_JC_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_2)->max('id');
        $idLaudoRR_JC_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRR_JC_2)->value('id');
        $statusRR_JC_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_2)->value('status_id');
        //RESFRIAMENTO RÁPIDO - JET COOLER #1
        $tag_RR_JC_1 = "TE 72 400 410 557 000 - 000380";
        $idAtividadeRR_JC_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RR_JC_1)->value('id');
        $idAnaliseRR_JC_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRR_JC_1)->max('id');
        $idLaudoRR_JC_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRR_JC_1)->value('id');
        $statusRR_JC_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRR_JC_1)->value('status_id');
        //EXAUSTOR #4 - RESFRIAMENTO LENTO
        $tag_EXAUSTOR_4 = "TE 72 400 410 557 000 - 000373";
        $idAtividadeEXAUSTOR_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAUSTOR_4)->value('id');
        $idAnaliseEXAUSTOR_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAUSTOR_4)->max('id');
        $idLaudoEXAUSTOR_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEXAUSTOR_4)->value('id');
        $statusEXAUSTOR_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAUSTOR_4)->value('status_id');
        //EXAUSTOR #3 - RESFRIAMENTO LENTO
        $tag_EXAUSTOR_3 = "TE 72 400 410 557 000 - 000366";
        $idAtividadeEXAUSTOR_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAUSTOR_3)->value('id');
        $idAnaliseEXAUSTOR_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAUSTOR_3)->max('id');
        $idLaudoEXAUSTOR_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEXAUSTOR_3)->value('id');
        $statusEXAUSTOR_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAUSTOR_3)->value('status_id');
        //EXAUSTOR #2 - RESFRIAMENTO LENTO
        $tag_EXAUSTOR_2 = "TE 72 400 410 557 000 - 000359";
        $idAtividadeEXAUSTOR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAUSTOR_2)->value('id');
        $idAnaliseEXAUSTOR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAUSTOR_2)->max('id');
        $idLaudoEXAUSTOR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEXAUSTOR_2)->value('id');
        $statusEXAUSTOR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAUSTOR_2)->value('status_id');
        //EXAUSTOR #1 - RESFRIAMENTO LENTO
        $tag_EXAUSTOR_1 = "TE 72 400 410 557 000 - 000352";
        $idAtividadeEXAUSTOR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EXAUSTOR_1)->value('id');
        $idAnaliseEXAUSTOR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEXAUSTOR_1)->max('id');
        $idLaudoEXAUSTOR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEXAUSTOR_1)->value('id');
        $statusEXAUSTOR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEXAUSTOR_1)->value('status_id');
        //ROLO SECADOR #2 SPRAY DE ENXÁGUE - LIMPEZA ELETROLÍTICA
        $tag_RS_2_SELE = "TE 72 400 410 557 000 - 000345";
        $idAtividadeRS_2_SELE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_2_SELE)->value('id');
        $idAnaliseRS_2_SELE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_2_SELE)->max('id');
        $idLaudoRS_2_SELE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS_2_SELE)->value('id');
        $statusRS_2_SELE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_2_SELE)->value('status_id');
        //ROLO SECADOR #1 SPRAY DE ENXÁGUE - LIMPEZA ELETROLÍTICA
        $tag_RS_1_SELE = "TE 72 400 410 557 000 - 000338";
        $idAtividadeRS_1_SELE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_1_SELE)->value('id');
        $idAnaliseRS_1_SELE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_1_SELE)->max('id');
        $idLaudoRS_1_SELE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS_1_SELE)->value('id');
        $statusRS_1_SELE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_1_SELE)->value('status_id');
        //ROLO SECADOR - ESCOVA DE LIMPEZA
        $tag_RSEL = "TE 72 400 410 557 000 - 000331";
        $idAtividadeRSEL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RSEL)->value('id');
        $idAnaliseRSEL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRSEL)->max('id');
        $idLaudoRSEL = DB::table('laudos')->where('analise_id', '=', $idAnaliseRSEL)->value('id');
        $statusRSEL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRSEL)->value('status_id');
        //ROLO BACKUP #4 - ESCOVA DE LIMPEZA
        $tag_RB_4_EL = "TE 72 400 410 557 000 - 000324";
        $idAtividadeRB_4_EL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RB_4_EL)->value('id');
        $idAnaliseRB_4_EL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRB_4_EL)->max('id');
        $idLaudoRB_4_EL = DB::table('laudos')->where('analise_id', '=', $idAnaliseRB_4_EL)->value('id');
        $statusRB_4_EL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRB_4_EL)->value('status_id');
        //ROLO BACKUP #3 - ESCOVA DE LIMPEZA
        $tag_RB_3_EL = "TE 72 400 410 557 000 - 000317";
        $idAtividadeRB_3_EL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RB_3_EL)->value('id');
        $idAnaliseRB_3_EL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRB_3_EL)->max('id');
        $idLaudoRB_3_EL = DB::table('laudos')->where('analise_id', '=', $idAnaliseRB_3_EL)->value('id');
        $statusRB_3_EL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRB_3_EL)->value('status_id');
        //ROLO BACKUP #2 - ESCOVA DE LIMPEZA
        $tag_RB_2_EL = "TE 72 400 410 557 000 - 000310";
        $idAtividadeRB_2_EL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RB_2_EL)->value('id');
        $idAnaliseRB_2_EL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRB_2_EL)->max('id');
        $idLaudoRB_2_EL = DB::table('laudos')->where('analise_id', '=', $idAnaliseRB_2_EL)->value('id');
        $statusRB_2_EL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRB_2_EL)->value('status_id');
        //ROLO BACKUP #1 - ESCOVA DE LIMPEZA
        $tag_RB_1_EL = "TE 72 400 410 557 000 - 000303";
        $idAtividadeRB_1_EL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RB_1_EL)->value('id');
        $idAnaliseRB_1_EL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRB_1_EL)->max('id');
        $idLaudoRB_1_EL = DB::table('laudos')->where('analise_id', '=', $idAnaliseRB_1_EL)->value('id');
        $statusRB_1_EL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRB_1_EL)->value('status_id');
        //ROLO SECADOR - LIMPEZA ELETROLÍTICA
        $tag_RS_LE = "TE 72 400 410 557 000 - 000586";
        $idAtividadeRS_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_LE)->value('id');
        $idAnaliseRS_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_LE)->max('id');
        $idLaudoRS_LE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS_LE)->value('id');
        $statusRS_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_LE)->value('status_id');
        //ROLO DEFLETOR #4 - LIMPEZA ELETROLÍTICA
        $tag_RD_4_LE = "TE 72 400 410 557 000 - 000296";
        $idAtividadeRD_4_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_4_LE)->value('id');
        $idAnaliseRD_4_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_4_LE)->max('id');
        $idLaudoRD_4_LE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_4_LE)->value('id');
        $statusRD_4_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_4_LE)->value('status_id');
        //ROLO DEFLETOR #3 - LIMPEZA ELETROLÍTICA
        $tag_RD_3_LE = "TE 72 400 410 557 000 - 000289";
        $idAtividadeRD_3_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_3_LE)->value('id');
        $idAnaliseRD_3_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_3_LE)->max('id');
        $idLaudoRD_3_LE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_3_LE)->value('id');
        $statusRD_3_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_3_LE)->value('status_id');
        //ROLO DEFLETOR #2 - LIMPEZA ELETROLÍTICA
        $tag_RD_2_LE = "TE 72 400 410 557 000 - 000282";
        $idAtividadeRD_2_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_2_LE)->value('id');
        $idAnaliseRD_2_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_2_LE)->max('id');
        $idLaudoRD_2_LE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_2_LE)->value('id');
        $statusRD_2_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_2_LE)->value('status_id');
        //ROLO DEFLETOR #1 - LIMPEZA ELETROLÍTICA
        $tag_RD_1_LE = "TE 72 400 410 557 000 - 000275";
        $idAtividadeRD_1_LE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_1_LE)->value('id');
        $idAnaliseRD_1_LE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_1_LE)->max('id');
        $idLaudoRD_1_LE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_1_LE)->value('id');
        $statusRD_1_LE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_1_LE)->value('status_id');
        //ROLO PRESSIONADOR TENSOR #1
        $tag_RPT_1 = "TE 72 400 410 557 000 - 000268";
        $idAtividadeRPT_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RPT_1)->value('id');
        $idAnaliseRPT_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPT_1)->max('id');
        $idLaudoRPT_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRPT_1)->value('id');
        $statusRPT_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPT_1)->value('status_id');
        //PUXADORES #3
        $tag_PUXADOR_3 = "TE 72 400 410 557 000 - 000262";
        $idAtividadePUXADOR_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PUXADOR_3)->value('id');
        $idAnalisePUXADOR_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePUXADOR_3)->max('id');
        $idLaudoPUXADOR_3 = DB::table('laudos')->where('analise_id', '=', $idAnalisePUXADOR_3)->value('id');
        $statusPUXADOR_3 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePUXADOR_3)->value('status_id');
        //PUXADOR DESEMPENADEIRA #1
        $tag_PD_1 = "TE 72 400 410 557 000 - 000255";
        $idAtividadePD_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PD_1)->value('id');
        $idAnalisePD_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePD_1)->max('id');
        $idLaudoPD_1 = DB::table('laudos')->where('analise_id', '=', $idAnalisePD_1)->value('id');
        $statusPD_1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePD_1)->value('status_id');
        //DESEMPENADEIRA #1
        $tag_DESEMP1 = "TE 72 400 410 557 000 - 000248";
        $idAtividadeDESEMP1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESEMP1)->value('id');
        $idAnaliseDESEMP1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEMP1)->max('id');
        $idLaudoDESEMP1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEMP1)->value('id');
        $statusDESEMP1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEMP1)->value('status_id');
        //ALIMENTAÇÃO DE ENTRADA
        $tag_ALIM_ENTRADA = "TE 72 400 410 557 000 - 000243";
        $idAtividadeALIM_ENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_ENTRADA)->value('id');
        $idAnaliseALIM_ENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_ENTRADA)->max('id');
        $idLaudoALIM_ENTRADA = DB::table('laudos')->where('analise_id', '=', $idAnaliseALIM_ENTRADA)->value('id');
        $statusALIM_ENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIM_ENTRADA)->value('status_id');
        //ROLO DEFLETOR DFF #1 - FORNO
        $tag_RD_DFF_1 = "TE 72 400 410 557 000 - 000222";
        $idAtividadeRD_DFF_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_DFF_1)->value('id');
        $idAnaliseRD_DFF_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_DFF_1)->max('id');
        $idLaudoRD_DFF_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_DFF_1)->value('id');
        $statusRD_DFF_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_DFF_1)->value('status_id');
        //ROLO DEFLETOR DFF #2 - FORNO
        $tag_RD_DFF_2 = "TE 72 400 410 557 000 - 000229";
        $idAtividadeRD_DFF_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_DFF_2)->value('id');
        $idAnaliseRD_DFF_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_DFF_2)->max('id');
        $idLaudoRD_DFF_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_DFF_2)->value('id');
        $statusRD_DFF_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_DFF_2)->value('status_id');
        //ROLO DEFLETOR DFF #3 - FORNO
        $tag_RD_DFF_3 = "TE 72 400 410 557 000 - 000236";
        $idAtividadeRD_DFF_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_DFF_3)->value('id');
        $idAnaliseRD_DFF_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_DFF_3)->max('id');
        $idLaudoRD_DFF_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_DFF_3)->value('id');
        $statusRD_DFF_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_DFF_3)->value('status_id');
        //ROLO DO QUENCH TANQUE
        $tag_RQT = "TE 72 400 410 557 000 - 000201";
        $idAtividadeRQT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RQT)->value('id');
        $idAnaliseRQT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRQT)->max('id');
        $idLaudoRQT = DB::table('laudos')->where('analise_id', '=', $idAnaliseRQT)->value('id');
        $statusRQT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRQT)->value('status_id');
        //ROLO SECADOR SUPERIOR - QUENCH TANQUE
        $tag_RSS_QT = "TE 72 400 410 557 000 - 000208";
        $idAtividadeRSS_QT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RSS_QT)->value('id');
        $idAnaliseRSS_QT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRSS_QT)->max('id');
        $idLaudoRSS_QT = DB::table('laudos')->where('analise_id', '=', $idAnaliseRSS_QT)->value('id');
        $statusRSS_QT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRSS_QT)->value('status_id');
        //ROLO SECADOR INFERIOR - QUENCH TANQUE
        $tag_RSI_QT = "TE 72 400 410 557 000 - 000215";
        $idAtividadeRSI_QT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RSI_QT)->value('id');
        $idAnaliseRSI_QT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRSI_QT)->max('id');
        $idLaudoRSI_QT = DB::table('laudos')->where('analise_id', '=', $idAnaliseRSI_QT)->value('id');
        $statusRSI_QT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRSI_QT)->value('status_id');
        //DEFLETOR #1 - TORRE DO APC
        $tag_D_1_TAPC = "TE 72 400 410 557 000 - 000173";
        $idAtividadeD_1_TAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_D_1_TAPC)->value('id');
        $idAnaliseD_1_TAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD_1_TAPC)->max('id');
        $idLaudoD_1_TAPC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD_1_TAPC)->value('id');
        $statusD_1_TAPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD_1_TAPC)->value('status_id');
        //PRESSIONADOR DEFLETOR #1 - TORRE DO APC
        $tag_PD_1_TAPC = "TE 72 400 410 557 000 - 000180";
        $idAtividadePD_1_TAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PD_1_TAPC)->value('id');
        $idAnalisePD_1_TAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePD_1_TAPC)->max('id');
        $idLaudoPD_1_TAPC = DB::table('laudos')->where('analise_id', '=', $idAnalisePD_1_TAPC)->value('id');
        $statusPD_1_TAPC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePD_1_TAPC)->value('status_id');
        //DEFLETOR #2 - TORRE DO APC
        $tag_D_2_TAPC = "TE 72 400 410 557 000 - 000187";
        $idAtividadeD_2_TAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_D_2_TAPC)->value('id');
        $idAnaliseD_2_TAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD_2_TAPC)->max('id');
        $idLaudoD_2_TAPC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD_2_TAPC)->value('id');
        $statusD_2_TAPC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD_2_TAPC)->value('status_id');
        //PRESSIONADOR DEFLETOR #2 - TORRE DO APC
        $tag_PD_2_TAPC = "TE 72 400 410 557 000 - 000194";
        $idAtividadePD_2_TAPC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PD_2_TAPC)->value('id');
        $idAnalisePD_2_TAPC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePD_2_TAPC)->max('id');
        $idLaudoPD_2_TAPC = DB::table('laudos')->where('analise_id', '=', $idAnalisePD_2_TAPC)->value('id');
        $statusPD_2_TAPC = DB::table('preditiva_analises')->where('id', '=', $idAnalisePD_2_TAPC)->value('status_id');
        //ROLO DEFLETOR #11 - FORNO
        $tag_RD_11 = "TE 72 400 410 557 000 - 000141";
        $idAtividadeRD_11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_11)->value('id');
        $idAnaliseRD_11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_11)->max('id');
        $idLaudoRD_11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_11)->value('id');
        $statusRD_11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_11)->value('status_id');
        //ROLO DEFLETOR #12 - FORNO
        $tag_RD_12 = "TE 72 400 410 557 000 - 000148";
        $idAtividadeRD_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_12)->value('id');
        $idAnaliseRD_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_12)->max('id');
        $idLaudoRD_12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_12)->value('id');
        $statusRD_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_12)->value('status_id');
        //ROLO DEFLETOR #13 - FORNO
        $tag_RD_13 = "TE 72 400 410 557 000 - 000155";
        $idAtividadeRD_13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_13)->value('id');
        $idAnaliseRD_13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_13)->max('id');
        $idLaudoRD_13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_13)->value('id');
        $statusRD_13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_13)->value('status_id');
        //ROLO DEFLETOR #14 - FORNO
        $tag_RD_14 = "TE 72 400 410 557 000 - 000162";
        $idAtividadeRD_14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_14)->value('id');
        $idAnaliseRD_14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_14)->max('id');
        $idLaudoRD_14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_14)->value('id');
        $statusRD_14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_14)->value('status_id');
        //ROLO DEFLETOR #7 - FORNO
        $tag_RD_7 = "TE 72 400 410 557 000 - 000113";
        $idAtividadeRD_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_7)->value('id');
        $idAnaliseRD_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_7)->max('id');
        $idLaudoRD_7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_7)->value('id');
        $statusRD_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_7)->value('status_id');
        //ROLO DEFLETOR #8 - FORNO
        $tag_RD_8 = "TE 72 400 410 557 000 - 000120";
        $idAtividadeRD_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_8)->value('id');
        $idAnaliseRD_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_8)->max('id');
        $idLaudoRD_8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_8)->value('id');
        $statusRD_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_8)->value('status_id');
        //ROLO DEFLETOR #9 - FORNO
        $tag_RD_9 = "TE 72 400 410 557 000 - 000127";
        $idAtividadeRD_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_9)->value('id');
        $idAnaliseRD_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_9)->max('id');
        $idLaudoRD_9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_9)->value('id');
        $statusRD_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_9)->value('status_id');
        //ROLO DEFLETOR #10 - FORNO
        $tag_RD_10 = "TE 72 400 410 557 000 - 000134";
        $idAtividadeRD_10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_10)->value('id');
        $idAnaliseRD_10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_10)->max('id');
        $idLaudoRD_10 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_10)->value('id');
        $statusRD_10 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_10)->value('status_id');
        //ROLO DEFLETOR #4 - FORNO
        $tag_RD_4 = "TE 72 400 410 557 000 - 000092";
        $idAtividadeRD_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_4)->value('id');
        $idAnaliseRD_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_4)->max('id');
        $idLaudoRD_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_4)->value('id');
        $statusRD_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_4)->value('status_id');
        //ROLO DEFLETOR #5 - FORNO
        $tag_RD_5 = "TE 72 400 410 557 000 - 000099";
        $idAtividadeRD_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_5)->value('id');
        $idAnaliseRD_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_5)->max('id');
        $idLaudoRD_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_5)->value('id');
        $statusRD_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_5)->value('status_id');
        //ROLO DEFLETOR #6 - FORNO
        $tag_RD_6 = "TE 72 400 410 557 000 - 000106";
        $idAtividadeRD_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_6)->value('id');
        $idAnaliseRD_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_6)->max('id');
        $idLaudoRD_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_6)->value('id');
        $statusRD_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_6)->value('status_id');
        //TENSOR N° 2 ROLO #1
        $tag_T_2_R_1 = "TE 72 400 410 557 000 - 000078";
        $idAtividadeT_2_R_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_T_2_R_1)->value('id');
        $idAnaliseT_2_R_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT_2_R_1)->max('id');
        $idLaudoT_2_R_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseT_2_R_1)->value('id');
        $statusT_2_R_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT_2_R_1)->value('status_id');
        //TENSOR N° 2 ROLO #2
        $tag_T_2_R_2 = "TE 72 400 410 557 000 - 000085";
        $idAtividadeT_2_R_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_T_2_R_2)->value('id');
        $idAnaliseT_2_R_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeT_2_R_2)->max('id');
        $idLaudoT_2_R_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseT_2_R_2)->value('id');
        $statusT_2_R_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseT_2_R_2)->value('status_id');
        //ROLO ESCOVA #3
        $tag_RE_3 = "TE 72 400 410 557 000 - 000064";
        $idAtividadeRE_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_3)->value('id');
        $idAnaliseRE_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_3)->max('id');
        $idLaudoRE_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_3)->value('id');
        $statusRE_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_3)->value('status_id');
        //ROLO ESCOVA #4
        $tag_RE_4 = "TE 72 400 410 557 000 - 000071";
        $idAtividadeRE_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_4)->value('id');
        $idAnaliseRE_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_4)->max('id');
        $idLaudoRE_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_4)->value('id');
        $statusRE_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_4)->value('status_id');
        //ROLO ESCOVA #1
        $tag_RE_1 = "TE 72 400 410 557 000 - 000050";
        $idAtividadeRE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_1)->value('id');
        $idAnaliseRE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_1)->max('id');
        $idLaudoRE_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_1)->value('id');
        $statusRE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_1)->value('status_id');
        //ROLO ESCOVA #2
        $tag_RE_2 = "TE 72 400 410 557 000 - 000057";
        $idAtividadeRE_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RE_2)->value('id');
        $idAnaliseRE_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRE_2)->max('id');
        $idLaudoRE_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRE_2)->value('id');
        $statusRE_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRE_2)->value('status_id');
        //ROLO SECADOR #1 LIMPEZA ALCALINA
        $tag_RS_1_LA = "TE 72 400 410 557 000 - 000022";
        $idAtividadeRS_1_LA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_1_LA)->value('id');
        $idAnaliseRS_1_LA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_1_LA)->max('id');
        $idLaudoRS_1_LA = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS_1_LA)->value('id');
        $statusRS_1_LA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_1_LA)->value('status_id');
        //ROLO SECADOR #2 LIMPEZA ALCALINA
        $tag_RS_2_LA = "TE 72 400 410 557 000 - 000029";
        $idAtividadeRS_2_LA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_2_LA)->value('id');
        $idAnaliseRS_2_LA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_2_LA)->max('id');
        $idLaudoRS_2_LA = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS_2_LA)->value('id');
        $statusRS_2_LA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_2_LA)->value('status_id');
        //ROLO SECADOR #1 SPRAY DE ENXÁGUE - LIMPEZA ALCALINA
        $tag_RS_1_SELA = "TE 72 400 410 557 000 - 000036";
        $idAtividadeRS_1_SELA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_1_SELA)->value('id');
        $idAnaliseRS_1_SELA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_1_SELA)->max('id');
        $idLaudoRS_1_SELA = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS_1_SELA)->value('id');
        $statusRS_1_SELA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_1_SELA)->value('status_id');
        //ROLO SECADOR #2 SPRAY DE ENXÁGUE - LIMPEZA ALCALINA
        $tag_RS_2_SELA = "TE 72 400 410 557 000 - 000043";
        $idAtividadeRS_2_SELA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RS_2_SELA)->value('id');
        $idAnaliseRS_2_SELA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRS_2_SELA)->max('id');
        $idLaudoRS_2_SELA = DB::table('laudos')->where('analise_id', '=', $idAnaliseRS_2_SELA)->value('id');
        $statusRS_2_SELA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRS_2_SELA)->value('status_id');
        //DESEMPENADEIRA 2
        $tag_DESMP_2 = "TE 72 400 410 557 000 - 000001";
        $idAtividadeDESMP_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESMP_2)->value('id');
        $idAnaliseDESMP_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESMP_2)->max('id');
        $idLaudoDESMP_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESMP_2)->value('id');
        $statusDESMP_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESMP_2)->value('status_id');
        //DESEMPENADEIRA 2 - PINCH ROLL
        $tag_DESEM_PR = "TE 72 400 410 557 000 - 000008";
        $idAtividadeDESEM_PR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DESEM_PR)->value('id');
        $idAnaliseDESEM_PR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEM_PR)->max('id');
        $idLaudoDESEM_PR = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEM_PR)->value('id');
        $statusDESEM_PR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEM_PR)->value('status_id');
        //CORREIA TRANSPORTADORA PASS LINE
        $tag_CTPL = "TE 72 400 410 557 000 - 000015";
        $idAtividadeCTPL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CTPL)->value('id');
        $idAnaliseCTPL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCTPL)->max('id');
        $idLaudoCTPL = DB::table('laudos')->where('analise_id', '=', $idAnaliseCTPL)->value('id');
        $statusCTPL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCTPL)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_galvanizacao_drive_entrada')
        ->with('idLaudoS_2_INFRA', $idLaudoS_2_INFRA)->with('statusS_2_INFRA', $statusS_2_INFRA)
        ->with('idLaudoS_4_INFRA', $idLaudoS_4_INFRA)->with('statusS_4_INFRA', $statusS_4_INFRA)
        ->with('idLaudoNAR_S2', $idLaudoNAR_S2)->with('statusNAR_S2', $statusNAR_S2)
        ->with('idLaudoNAR_S1', $idLaudoNAR_S1)->with('statusNAR_S1', $statusNAR_S1)
        ->with('idLaudoMOD_FRE_2', $idLaudoMOD_FRE_2)->with('statusMOD_FRE_2', $statusMOD_FRE_2)
        ->with('idLaudoENTRADA_1', $idLaudoENTRADA_1)->with('statusENTRADA_1', $statusENTRADA_1)
        ->with('idLaudoMOD_FRE', $idLaudoMOD_FRE)->with('statusMOD_FRE', $statusMOD_FRE)
        ->with('idLaudoA_ENTRADA', $idLaudoA_ENTRADA)->with('statusA_ENTRADA', $statusA_ENTRADA)
        ->with('idLaudoT1_R2', $idLaudoT1_R2)->with('statusT1_R2', $statusT1_R2)
        ->with('idLaudoT1_R1', $idLaudoT1_R1)->with('statusT1_R1', $statusT1_R1)
        ->with('idLaudoS1_INFRA', $idLaudoS1_INFRA)->with('statusS1_INFRA', $statusS1_INFRA)
        ->with('idLaudoS3_INFRA', $idLaudoS3_INFRA)->with('statusS3_INFRA', $statusS3_INFRA)
        ->with('idLaudoRD_15', $idLaudoRD_15)->with('statusRD_15', $statusRD_15)
        ->with('idLaudoRD_18', $idLaudoRD_18)->with('statusRD_18', $statusRD_18)
        ->with('idLaudoRD_17', $idLaudoRD_17)->with('statusRD_17', $statusRD_17)
        ->with('idLaudoRD_16', $idLaudoRD_16)->with('statusRD_16', $statusRD_16)
        ->with('idLaudoR_630_MESTRE', $idLaudoR_630_MESTRE)->with('statusR_630_MESTRE', $statusR_630_MESTRE)
        ->with('idLaudoR_630_ESCRAVO_1', $idLaudoR_630_ESCRAVO_1)->with('statusR_630_ESCRAVO_1', $statusR_630_ESCRAVO_1)
        ->with('idLaudoR_630_ESCRAVO_2', $idLaudoR_630_ESCRAVO_2)->with('statusR_630_ESCRAVO_2', $statusR_630_ESCRAVO_2)
        ->with('idLaudoDESENROLADEIRA_2', $idLaudoDESENROLADEIRA_2)->with('statusDESENROLADEIRA_2', $statusDESENROLADEIRA_2)
        ->with('idLaudoDESENROLADEIRA_1', $idLaudoDESENROLADEIRA_1)->with('statusDESENROLADEIRA_1', $statusDESENROLADEIRA_1)
        ->with('idLaudoFPARS_3B', $idLaudoFPARS_3B)->with('statusFPARS_3B', $statusFPARS_3B)
        ->with('idLaudoFPARS_3A', $idLaudoFPARS_3A)->with('statusFPARS_3A', $statusFPARS_3A)
        ->with('idLaudoFPARS_2B', $idLaudoFPARS_2B)->with('statusFPARS_2B', $statusFPARS_2B)
        ->with('idLaudoFPARS_2A', $idLaudoFPARS_2A)->with('statusFPARS_2A', $statusFPARS_2A)
        ->with('idLaudoFPARS_1B', $idLaudoFPARS_1B)->with('statusFPARS_1B', $statusFPARS_1B)
        ->with('idLaudoFPARS_1A', $idLaudoFPARS_1A)->with('statusFPARS_1A', $statusFPARS_1A)
        ->with('idLaudoSRI', $idLaudoSRI)->with('statusSRI', $statusSRI)
        ->with('idLaudoEXAS_INFRA', $idLaudoEXAS_INFRA)->with('statusEXAS_INFRA', $statusEXAS_INFRA)
        ->with('idLaudoELEV_FORNO', $idLaudoELEV_FORNO)->with('statusELEV_FORNO', $statusELEV_FORNO)
        ->with('idLaudoRR_JC_8', $idLaudoRR_JC_8)->with('statusRR_JC_8', $statusRR_JC_8)
        ->with('idLaudoRR_JC_7', $idLaudoRR_JC_7)->with('statusRR_JC_7', $statusRR_JC_7)
        ->with('idLaudoRR_JC_6', $idLaudoRR_JC_6)->with('statusRR_JC_6', $statusRR_JC_6)
        ->with('idLaudoRR_JC_5', $idLaudoRR_JC_5)->with('statusRR_JC_5', $statusRR_JC_5)
        ->with('idLaudoRR_JC_4', $idLaudoRR_JC_4)->with('statusRR_JC_4', $statusRR_JC_4)
        ->with('idLaudoRR_JC_3', $idLaudoRR_JC_3)->with('statusRR_JC_3', $statusRR_JC_3)
        ->with('idLaudoRR_JC_2', $idLaudoRR_JC_2)->with('statusRR_JC_2', $statusRR_JC_2)
        ->with('idLaudoRR_JC_1', $idLaudoRR_JC_1)->with('statusRR_JC_1', $statusRR_JC_1)
        ->with('idLaudoEXAUSTOR_4', $idLaudoEXAUSTOR_4)->with('statusEXAUSTOR_4', $statusEXAUSTOR_4)
        ->with('idLaudoEXAUSTOR_3', $idLaudoEXAUSTOR_3)->with('statusEXAUSTOR_3', $statusEXAUSTOR_3)
        ->with('idLaudoEXAUSTOR_2', $idLaudoEXAUSTOR_2)->with('statusEXAUSTOR_2', $statusEXAUSTOR_2)
        ->with('idLaudoEXAUSTOR_1', $idLaudoEXAUSTOR_1)->with('statusEXAUSTOR_1', $statusEXAUSTOR_1)
        ->with('idLaudoRS_2_SELE', $idLaudoRS_2_SELE)->with('statusRS_2_SELE', $statusRS_2_SELE)
        ->with('idLaudoRS_1_SELE', $idLaudoRS_1_SELE)->with('statusRS_1_SELE', $statusRS_1_SELE)
        ->with('idLaudoRSEL', $idLaudoRSEL)->with('statusRSEL', $statusRSEL)
        ->with('idLaudoRB_4_EL', $idLaudoRB_4_EL)->with('statusRB_4_EL', $statusRB_4_EL)
        ->with('idLaudoRB_3_EL', $idLaudoRB_3_EL)->with('statusRB_3_EL', $statusRB_3_EL)
        ->with('idLaudoRB_2_EL', $idLaudoRB_2_EL)->with('statusRB_2_EL', $statusRB_2_EL)
        ->with('idLaudoRB_1_EL', $idLaudoRB_1_EL)->with('statusRB_1_EL', $statusRB_1_EL)
        ->with('idLaudoRS_LE', $idLaudoRS_LE)->with('statusRS_LE', $statusRS_LE)
        ->with('idLaudoRD_4_LE', $idLaudoRD_4_LE)->with('statusRD_4_LE', $statusRD_4_LE)
        ->with('idLaudoRD_3_LE', $idLaudoRD_3_LE)->with('statusRD_3_LE', $statusRD_3_LE)
        ->with('idLaudoRD_2_LE', $idLaudoRD_2_LE)->with('statusRD_2_LE', $statusRD_2_LE)
        ->with('idLaudoRD_1_LE', $idLaudoRD_1_LE)->with('statusRD_1_LE', $statusRD_1_LE)
        ->with('idLaudoRPT_1', $idLaudoRPT_1)->with('statusRPT_1', $statusRPT_1)
        ->with('idLaudoPUXADOR_3', $idLaudoPUXADOR_3)->with('statusPUXADOR_3', $statusPUXADOR_3)
        ->with('idLaudoPD_1', $idLaudoPD_1)->with('statusPD_1', $statusPD_1)
        ->with('idLaudoDESEMP1', $idLaudoDESEMP1)->with('statusDESEMP1', $statusDESEMP1)
        ->with('idLaudoALIM_ENTRADA', $idLaudoALIM_ENTRADA)->with('statusALIM_ENTRADA', $statusALIM_ENTRADA)
        ->with('idLaudoRD_DFF_1', $idLaudoRD_DFF_1)->with('statusRD_DFF_1', $statusRD_DFF_1)
        ->with('idLaudoRD_DFF_2', $idLaudoRD_DFF_2)->with('statusRD_DFF_2', $statusRD_DFF_2)
        ->with('idLaudoRD_DFF_3', $idLaudoRD_DFF_3)->with('statusRD_DFF_3', $statusRD_DFF_3)
        ->with('idLaudoRQT', $idLaudoRQT)->with('statusRQT', $statusRQT)
        ->with('idLaudoRSS_QT', $idLaudoRSS_QT)->with('statusRSS_QT', $statusRSS_QT)
        ->with('idLaudoRSI_QT', $idLaudoRSI_QT)->with('statusRSI_QT', $statusRSI_QT)
        ->with('idLaudoD_1_TAPC', $idLaudoD_1_TAPC)->with('statusD_1_TAPC', $statusD_1_TAPC)
        ->with('idLaudoPD_1_TAPC', $idLaudoPD_1_TAPC)->with('statusPD_1_TAPC', $statusPD_1_TAPC)
        ->with('idLaudoD_2_TAPC', $idLaudoD_2_TAPC)->with('statusD_2_TAPC', $statusD_2_TAPC)
        ->with('idLaudoPD_2_TAPC', $idLaudoPD_2_TAPC)->with('statusPD_2_TAPC', $statusPD_2_TAPC)
        ->with('idLaudoRD_11', $idLaudoRD_11)->with('statusRD_11', $statusRD_11)
        ->with('idLaudoRD_12', $idLaudoRD_12)->with('statusRD_12', $statusRD_12)
        ->with('idLaudoRD_13', $idLaudoRD_13)->with('statusRD_13', $statusRD_13)
        ->with('idLaudoRD_14', $idLaudoRD_14)->with('statusRD_14', $statusRD_14)
        ->with('idLaudoRD_7', $idLaudoRD_7)->with('statusRD_7', $statusRD_7)
        ->with('idLaudoRD_8', $idLaudoRD_8)->with('statusRD_8', $statusRD_8)
        ->with('idLaudoRD_9', $idLaudoRD_9)->with('statusRD_9', $statusRD_9)
        ->with('idLaudoRD_10', $idLaudoRD_10)->with('statusRD_10', $statusRD_10)
        ->with('idLaudoRD_4', $idLaudoRD_4)->with('statusRD_4', $statusRD_4)
        ->with('idLaudoRD_5', $idLaudoRD_5)->with('statusRD_5', $statusRD_5)
        ->with('idLaudoRD_6', $idLaudoRD_6)->with('statusRD_6', $statusRD_6)
        ->with('idLaudoT_2_R_1', $idLaudoT_2_R_1)->with('statusT_2_R_1', $statusT_2_R_1)
        ->with('idLaudoT_2_R_2', $idLaudoT_2_R_2)->with('statusT_2_R_2', $statusT_2_R_2)
        ->with('idLaudoRE_3', $idLaudoRE_3)->with('statusRE_3', $statusRE_3)
        ->with('idLaudoRE_4', $idLaudoRE_4)->with('statusRE_4', $statusRE_4)
        ->with('idLaudoRE_1', $idLaudoRE_1)->with('statusRE_1', $statusRE_1)
        ->with('idLaudoRE_2', $idLaudoRE_2)->with('statusRE_2', $statusRE_2)
        ->with('idLaudoRS_1_LA', $idLaudoRS_1_LA)->with('statusRS_1_LA', $statusRS_1_LA)
        ->with('idLaudoRS_2_LA', $idLaudoRS_2_LA)->with('statusRS_2_LA', $statusRS_2_LA)
        ->with('idLaudoRS_1_SELA', $idLaudoRS_1_SELA)->with('statusRS_1_SELA', $statusRS_1_SELA)
        ->with('idLaudoRS_2_SELA', $idLaudoRS_2_SELA)->with('statusRS_2_SELA', $statusRS_2_SELA)
        ->with('idLaudoDESMP_2', $idLaudoDESMP_2)->with('statusDESMP_2', $statusDESMP_2)
        ->with('idLaudoDESEM_PR', $idLaudoDESEM_PR)->with('statusDESEM_PR', $statusDESEM_PR)
        ->with('idLaudoCTPL', $idLaudoCTPL)->with('statusCTPL', $statusCTPL)
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

    public function galvanizacao_drive_saida() {
        //RECOILER 2
        $tag_RECOILER_2 = "TE 72 400 410 565 000 - 000025";
        $idAtividadeRECOILER_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RECOILER_2)->value('id');
        $idAnaliseRECOILER_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRECOILER_2)->max('id');
        $idLaudoRECOILER_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRECOILER_2)->value('id');
        $statusRECOILER_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRECOILER_2)->value('status_id');
        //MÓDULO DE FRENAGEM INVERSOR 1 - 04B5MD07
        $tag_MFI_1 = "TE 72 400 410 565 000 - 000074";
        $idAtividadeMFI_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MFI_1)->value('id');
        $idAnaliseMFI_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMFI_1)->max('id');
        $idLaudoMFI_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseMFI_1)->value('id');
        $statusMFI_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMFI_1)->value('status_id');
        //04B5MD06
        $tag_MD06 = "TE 72 400 410 565 000 - 000027";
        $idAtividadeMD06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MD06)->value('id');
        $idAnaliseMD06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMD06)->max('id');
        $idLaudoMD06 = DB::table('laudos')->where('analise_id', '=', $idAnaliseMD06)->value('id');
        $statusMD06 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMD06)->value('status_id');
        //MÓDULO DE FRENAGEM INVERSOR 1 - 04B5MD05
        $tag_MFI_1_MD05 = "TE 72 400 410 565 000 - 000057";
        $idAtividadeMFI_1_MD05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MFI_1_MD05)->value('id');
        $idAnaliseMFI_1_MD05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMFI_1_MD05)->max('id');
        $idLaudoMFI_1_MD05 = DB::table('laudos')->where('analise_id', '=', $idAnaliseMFI_1_MD05)->value('id');
        $statusMFI_1_MD05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMFI_1_MD05)->value('status_id');
        //MÓDULO DE FRENAGEM
        $tag_MF = "TE 72 400 410 565 000 - 000045";
        $idAtividadeMF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_MF)->value('id');
        $idAnaliseMF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeMF)->max('id');
        $idLaudoMF = DB::table('laudos')->where('analise_id', '=', $idAnaliseMF)->value('id');
        $statusMF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseMF)->value('status_id');
        //BRIDLE 5 ROLO #4
        $tag_B_5_R_4 = "TE 72 400 410 565 000 - 000024";
        $idAtividadeB_5_R_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_5_R_4)->value('id');
        $idAnaliseB_5_R_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_5_R_4)->max('id');
        $idLaudoB_5_R_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseB_5_R_4)->value('id');
        $statusB_5_R_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_5_R_4)->value('status_id');
        //BRIDLE 5 ROLO #2
        $tag_B_5_R_2 = "TE 72 400 410 565 000 - 000022";
        $idAtividadeB_5_R_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B_5_R_2)->value('id');
        $idAnaliseB_5_R_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB_5_R_2)->max('id');
        $idLaudoB_5_R_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseB_5_R_2)->value('id');
        $statusB_5_R_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB_5_R_2)->value('status_id');
        //RECOILER 1
        $tag_RECOILER_1 = "TE 72 400 410 565 000 - 000021";
        $idAtividadeRECOILER_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RECOILER_1)->value('id');
        $idAnaliseRECOILER_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRECOILER_1)->max('id');
        $idLaudoRECOILER_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRECOILER_1)->value('id');
        $statusRECOILER_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRECOILER_1)->value('status_id');
        //ACUMULADOR DE SAÍDA
        $tag_ACU_SAIDA = "TE 72 400 410 565 000 - 000019";
        $idAtividadeACU_SAIDA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACU_SAIDA)->value('id');
        $idAnaliseACU_SAIDA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACU_SAIDA)->max('id');
        $idLaudoACU_SAIDA = DB::table('laudos')->where('analise_id', '=', $idAnaliseACU_SAIDA)->value('id');
        $statusACU_SAIDA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACU_SAIDA)->value('status_id');
        //RETIFICADOR 630KW - MESTRE
        $tag_RET_630_MESTRE = "TE 72 400 410 565 000 - 000089";
        $idAtividadeRET_630_MESTRE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_630_MESTRE)->value('id');
        $idAnaliseRET_630_MESTRE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_630_MESTRE)->max('id');
        $idLaudoRET_630_MESTRE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRET_630_MESTRE)->value('id');
        $statusRET_630_MESTRE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_630_MESTRE)->value('status_id');
        //RETIFICADOR 630KW - ESCRAVO 1
        $tag_RET_630_ESCRAVO_1 = "TE 72 400 410 565 000 - 000088";
        $idAtividadeRET_630_ESCRAVO_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_630_ESCRAVO_1)->value('id');
        $idAnaliseRET_630_ESCRAVO_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_630_ESCRAVO_1)->max('id');
        $idLaudoRET_630_ESCRAVO_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRET_630_ESCRAVO_1)->value('id');
        $statusRET_630_ESCRAVO_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_630_ESCRAVO_1)->value('status_id');
        //RETIFICADOR 630KW - ESCRAVO 2
        $tag_RET_630_ESCRAVO_2 = "TE 72 400 410 565 000 - 000087";
        $idAtividadeRET_630_ESCRAVO_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RET_630_ESCRAVO_2)->value('id');
        $idAnaliseRET_630_ESCRAVO_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRET_630_ESCRAVO_2)->max('id');
        $idLaudoRET_630_ESCRAVO_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRET_630_ESCRAVO_2)->value('id');
        $statusRET_630_ESCRAVO_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRET_630_ESCRAVO_2)->value('status_id');
        //BRIDLE 5 ROLO #3
        $tag_BRIDLE5_ROLO3 = "TE 72 400 410 565 000 - 000018";
        $idAtividadeBRIDLE5_ROLO3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE5_ROLO3)->value('id');
        $idAnaliseBRIDLE5_ROLO3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE5_ROLO3)->max('id');
        $idLaudoBRIDLE5_ROLO3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE5_ROLO3)->value('id');
        $statusBRIDLE5_ROLO3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE5_ROLO3)->value('status_id');
        //BRIDLE 5 ROLO #1
        $tag_BRIDLE5_ROLO1 = "TE 72 400 410 565 000 - 000016";
        $idAtividadeBRIDLE5_ROLO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE5_ROLO1)->value('id');
        $idAnaliseBRIDLE5_ROLO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE5_ROLO1)->max('id');
        $idLaudoBRIDLE5_ROLO1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE5_ROLO1)->value('id');
        $statusBRIDLE5_ROLO1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE5_ROLO1)->value('status_id');
        //BRIDLE 7 ROLO #2
        $tag_BRIDLE7_ROLO2 = "TE 72 400 410 565 000 - 000015";
        $idAtividadeBRIDLE7_ROLO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE7_ROLO2)->value('id');
        $idAnaliseBRIDLE7_ROLO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE7_ROLO2)->max('id');
        $idLaudoBRIDLE7_ROLO2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE7_ROLO2)->value('id');
        $statusBRIDLE7_ROLO2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE7_ROLO2)->value('status_id');
        //BRIDLE 7 ROLO #1
        $tag_BRIDLE7_ROLO1 = "TE 72 400 410 565 000 - 000014";
        $idAtividadeBRIDLE7_ROLO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE7_ROLO1)->value('id');
        $idAnaliseBRIDLE7_ROLO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE7_ROLO1)->max('id');
        $idLaudoBRIDLE7_ROLO1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE7_ROLO1)->value('id');
        $statusBRIDLE7_ROLO1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE7_ROLO1)->value('status_id');
        //COLETOR DE RESINA - ROLO #2
        $tag_COLETOR_RES_ROLO2 = "TE 72 400 410 565 000 - 000013";
        $idAtividadeCOLETOR_RES_ROLO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_COLETOR_RES_ROLO2)->value('id');
        $idAnaliseCOLETOR_RES_ROLO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCOLETOR_RES_ROLO2)->max('id');
        $idLaudoCOLETOR_RES_ROLO2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCOLETOR_RES_ROLO2)->value('id');
        $statusCOLETOR_RES_ROLO2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCOLETOR_RES_ROLO2)->value('status_id');
        //APLICADOR DE RESINA ROLO #2
        $tag_ARR2 = "TE 72 400 410 565 000 - 000012";
        $idAtividadeARR2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ARR2)->value('id');
        $idAnaliseARR2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARR2)->max('id');
        $idLaudoARR2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseARR2)->value('id');
        $statusARR2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARR2)->value('status_id');
        //COLETOR DE RESINA - ROLO #1
        $tag_CRR_1 = "TE 72 400 410 565 000 - 000011";
        $idAtividadeCRR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CRR_1)->value('id');
        $idAnaliseCRR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCRR_1)->max('id');
        $idLaudoCRR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCRR_1)->value('id');
        $statusCRR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCRR_1)->value('status_id');
        //APLICADOR DE RESINA ROLO #1
        $tag_ARR_1 = "TE 72 400 410 565 000 - 000010";
        $idAtividadeARR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ARR_1)->value('id');
        $idAnaliseARR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARR_1)->max('id');
        $idLaudoARR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseARR_1)->value('id');
        $statusARR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARR_1)->value('status_id');
        //TENSION LEVELLER LONGITUDINAL ADJUST
        $tag_TLLA = "TE 72 400 410 565 000 - 000041";
        $idAtividadeTLLA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TLLA)->value('id');
        $idAnaliseTLLA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTLLA)->max('id');
        $idLaudoTLLA = DB::table('laudos')->where('analise_id', '=', $idAnaliseTLLA)->value('id');
        $statusTLLA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTLLA)->value('status_id');
        //BRIDLE 6 ROLO #2
        $tag_BRIDLE6_ROLO2 = "TE 72 400 410 565 000 - 000009";
        $idAtividadeBRIDLE6_ROLO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE6_ROLO2)->value('id');
        $idAnaliseBRIDLE6_ROLO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE6_ROLO2)->max('id');
        $idLaudoBRIDLE6_ROLO2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE6_ROLO2)->value('id');
        $statusBRIDLE6_ROLO2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE6_ROLO2)->value('status_id');
        //BRIDLE 6 ROLO #1
        $tag_BRIDLE6_ROLO1 = "TE 72 400 410 565 000 - 000008";
        $idAtividadeBRIDLE6_ROLO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE6_ROLO1)->value('id');
        $idAnaliseBRIDLE6_ROLO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE6_ROLO1)->max('id');
        $idLaudoBRIDLE6_ROLO1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE6_ROLO1)->value('id');
        $statusBRIDLE6_ROLO1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE6_ROLO1)->value('status_id');
        //BRIDLE 4 ROLO #4
        $tag_BRIDLE4_ROLO4 = "TE 72 400 410 565 000 - 000038";
        $idAtividadeBRIDLE4_ROLO4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE4_ROLO4)->value('id');
        $idAnaliseBRIDLE4_ROLO4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE4_ROLO4)->max('id');
        $idLaudoBRIDLE4_ROLO4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE4_ROLO4)->value('id');
        $statusBRIDLE4_ROLO4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE4_ROLO4)->value('status_id');
        //BRIDLE 4 ROLO #2
        $tag_BRIDLE4_ROLO2 = "TE 72 400 410 565 000 - 000037";
        $idAtividadeBRIDLE4_ROLO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE4_ROLO2)->value('id');
        $idAnaliseBRIDLE4_ROLO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE4_ROLO2)->max('id');
        $idLaudoBRIDLE4_ROLO2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE4_ROLO2)->value('id');
        $statusBRIDLE4_ROLO2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE4_ROLO2)->value('status_id');
        //ROLO DEFLETOR #1 - PINCH ROLL
        $tag_RD_1_PR = "TE 72 400 410 565 000 - 000034";
        $idAtividadeRD_1_PR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_1_PR)->value('id');
        $idAnaliseRD_1_PR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_1_PR)->max('id');
        $idLaudoRD_1_PR = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_1_PR)->value('id');
        $statusRD_1_PR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_1_PR)->value('status_id');
        //CARRYOVER CONVEYOR
        $tag_CC = "TE 72 400 410 565 000 - 000035";
        $idAtividadeCC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CC)->value('id');
        $idAnaliseCC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCC)->max('id');
        $idLaudoCC = DB::table('laudos')->where('analise_id', '=', $idAnaliseCC)->value('id');
        $statusCC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCC)->value('status_id');
        //ROLO DEFLETOR #2 - PINCH ROLL
        $tag_RD_2_PR = "TE 72 400 410 565 000 - 000036";
        $idAtividadeRD_2_PR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RD_2_PR)->value('id');
        $idAnaliseRD_2_PR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRD_2_PR)->max('id');
        $idLaudoRD_2_PR = DB::table('laudos')->where('analise_id', '=', $idAnaliseRD_2_PR)->value('id');
        $statusRD_2_PR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRD_2_PR)->value('status_id');
        //04B5MA09
        $tag_04B5MA09 = "TE 72 400 410 565 000 - 000033";
        $idAtividade04B5MA09 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_04B5MA09)->value('id');
        $idAnalise04B5MA09 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade04B5MA09)->max('id');
        $idLaudo04B5MA09 = DB::table('laudos')->where('analise_id', '=', $idAnalise04B5MA09)->value('id');
        $status04B5MA09 = DB::table('preditiva_analises')->where('id', '=', $idAnalise04B5MA09)->value('status_id');
        //COLETOR DE CROMO ROLO #2
        $tag_CCR_2 = "TE 72 400 410 565 000 - 000007";
        $idAtividadeCCR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCR_2)->value('id');
        $idAnaliseCCR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCR_2)->max('id');
        $idLaudoCCR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCR_2)->value('id');
        $statusCCR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCR_2)->value('status_id');
        //APLICADOR DE CROMO ROLO #2
        $tag_ACR_2 = "TE 72 400 410 565 000 - 000006";
        $idAtividadeACR_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACR_2)->value('id');
        $idAnaliseACR_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACR_2)->max('id');
        $idLaudoACR_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACR_2)->value('id');
        $statusACR_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACR_2)->value('status_id');
        //COLETOR DE CROMO ROLO #1
        $tag_CCR_1 = "TE 72 400 410 565 000 - 000005";
        $idAtividadeCCR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CCR_1)->value('id');
        $idAnaliseCCR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCCR_1)->max('id');
        $idLaudoCCR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCCR_1)->value('id');
        $statusCCR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCCR_1)->value('status_id');
        //APLICADOR DE CROMO ROLO #1
        $tag_ACR_1 = "TE 72 400 410 565 000 - 000004";
        $idAtividadeACR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ACR_1)->value('id');
        $idAnaliseACR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACR_1)->max('id');
        $idLaudoACR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACR_1)->value('id');
        $statusACR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACR_1)->value('status_id');
        //SKIN PASS MILL BOTTON ROLL DRIVE
        $tag_SPMBRD = "TE 72 400 410 565 000 - 000003";
        $idAtividadeSPMBRD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SPMBRD)->value('id');
        $idAnaliseSPMBRD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPMBRD)->max('id');
        $idLaudoSPMBRD = DB::table('laudos')->where('analise_id', '=', $idAnaliseSPMBRD)->value('id');
        $statusSPMBRD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPMBRD)->value('status_id');
        //SKIN PASS MILL TOP ROLL DRIVE
        $tag_SPMTRD = "TE 72 400 410 565 000 - 000002";
        $idAtividadeSPMTRD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SPMTRD)->value('id');
        $idAnaliseSPMTRD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSPMTRD)->max('id');
        $idLaudoSPMTRD = DB::table('laudos')->where('analise_id', '=', $idAnaliseSPMTRD)->value('id');
        $statusSPMTRD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSPMTRD)->value('status_id');
        //BRIDLE 4 ROLO #3
        $tag_BRIDLE4_ROLO3 = "TE 72 400 410 565 000 - 000028";
        $idAtividadeBRIDLE4_ROLO3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE4_ROLO3)->value('id');
        $idAnaliseBRIDLE4_ROLO3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE4_ROLO3)->max('id');
        $idLaudoBRIDLE4_ROLO3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE4_ROLO3)->value('id');
        $statusBRIDLE4_ROLO3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE4_ROLO3)->value('status_id');
        //BRIDLE 4 ROLO #1
        $tag_BRIDLE4_ROLO1 = "TE 72 400 410 565 000 - 000001";
        $idAtividadeBRIDLE4_ROLO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BRIDLE4_ROLO1)->value('id');
        $idAnaliseBRIDLE4_ROLO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBRIDLE4_ROLO1)->max('id');
        $idLaudoBRIDLE4_ROLO1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseBRIDLE4_ROLO1)->value('id');
        $statusBRIDLE4_ROLO1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBRIDLE4_ROLO1)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_galvanizacao_drive_saida')
        ->with('idLaudoRECOILER_2', $idLaudoRECOILER_2)->with('statusRECOILER_2', $statusRECOILER_2)
        ->with('idLaudoMFI_1', $idLaudoMFI_1)->with('statusMFI_1', $statusMFI_1)
        ->with('idLaudoMD06', $idLaudoMD06)->with('statusMD06', $statusMD06)
        ->with('idLaudoMFI_1_MD05', $idLaudoMFI_1_MD05)->with('statusMFI_1_MD05', $statusMFI_1_MD05)
        ->with('idLaudoMF', $idLaudoMF)->with('statusMF', $statusMF)
        ->with('idLaudoB_5_R_4', $idLaudoB_5_R_4)->with('statusB_5_R_4', $statusB_5_R_4)
        ->with('idLaudoB_5_R_2', $idLaudoB_5_R_2)->with('statusB_5_R_2', $statusB_5_R_2)
        ->with('idLaudoRECOILER_1', $idLaudoRECOILER_1)->with('statusRECOILER_1', $statusRECOILER_1)
        ->with('idLaudoACU_SAIDA', $idLaudoACU_SAIDA)->with('statusACU_SAIDA', $statusACU_SAIDA)
        ->with('idLaudoRET_630_MESTRE', $idLaudoRET_630_MESTRE)->with('statusRET_630_MESTRE', $statusRET_630_MESTRE)
        ->with('idLaudoRET_630_ESCRAVO_1', $idLaudoRET_630_ESCRAVO_1)->with('statusRET_630_ESCRAVO_1', $statusRET_630_ESCRAVO_1)
        ->with('idLaudoRET_630_ESCRAVO_2', $idLaudoRET_630_ESCRAVO_2)->with('statusRET_630_ESCRAVO_2', $statusRET_630_ESCRAVO_2)
        ->with('idLaudoBRIDLE5_ROLO3', $idLaudoBRIDLE5_ROLO3)->with('statusBRIDLE5_ROLO3', $statusBRIDLE5_ROLO3)
        ->with('idLaudoBRIDLE5_ROLO1', $idLaudoBRIDLE5_ROLO1)->with('statusBRIDLE5_ROLO1', $statusBRIDLE5_ROLO1)
        ->with('idLaudoBRIDLE7_ROLO2', $idLaudoBRIDLE7_ROLO2)->with('statusBRIDLE7_ROLO2', $statusBRIDLE7_ROLO2)
        ->with('idLaudoBRIDLE7_ROLO1', $idLaudoBRIDLE7_ROLO1)->with('statusBRIDLE7_ROLO1', $statusBRIDLE7_ROLO1)
        ->with('idLaudoCOLETOR_RES_ROLO2', $idLaudoCOLETOR_RES_ROLO2)->with('statusCOLETOR_RES_ROLO2', $statusCOLETOR_RES_ROLO2)
        ->with('idLaudoARR2', $idLaudoARR2)->with('statusARR2', $statusARR2)
        ->with('idLaudoCRR_1', $idLaudoCRR_1)->with('statusCRR_1', $statusCRR_1)
        ->with('idLaudoARR_1', $idLaudoARR_1)->with('statusARR_1', $statusARR_1)
        ->with('idLaudoTLLA', $idLaudoTLLA)->with('statusTLLA', $statusTLLA)
        ->with('idLaudoBRIDLE6_ROLO2', $idLaudoBRIDLE6_ROLO2)->with('statusBRIDLE6_ROLO2', $statusBRIDLE6_ROLO2)
        ->with('idLaudoBRIDLE6_ROLO1', $idLaudoBRIDLE6_ROLO1)->with('statusBRIDLE6_ROLO1', $statusBRIDLE6_ROLO1)
        ->with('idLaudoBRIDLE4_ROLO4', $idLaudoBRIDLE4_ROLO4)->with('statusBRIDLE4_ROLO4', $statusBRIDLE4_ROLO4)
        ->with('idLaudoBRIDLE4_ROLO2', $idLaudoBRIDLE4_ROLO2)->with('statusBRIDLE4_ROLO2', $statusBRIDLE4_ROLO2)
        ->with('idLaudoRD_1_PR', $idLaudoRD_1_PR)->with('statusRD_1_PR', $statusRD_1_PR)
        ->with('idLaudoCC', $idLaudoCC)->with('statusCC', $statusCC)
        ->with('idLaudoRD_2_PR', $idLaudoRD_2_PR)->with('statusRD_2_PR', $statusRD_2_PR)
        ->with('idLaudo04B5MA09', $idLaudo04B5MA09)->with('status04B5MA09', $status04B5MA09)
        ->with('idLaudoCCR_2', $idLaudoCCR_2)->with('statusCCR_2', $statusCCR_2)
        ->with('idLaudoACR_2', $idLaudoACR_2)->with('statusACR_2', $statusACR_2)
        ->with('idLaudoCCR_1', $idLaudoCCR_1)->with('statusCCR_1', $statusCCR_1)
        ->with('idLaudoACR_1', $idLaudoACR_1)->with('statusACR_1', $statusACR_1)
        ->with('idLaudoSPMBRD', $idLaudoSPMBRD)->with('statusSPMBRD', $statusSPMBRD)
        ->with('idLaudoSPMTRD', $idLaudoSPMTRD)->with('statusSPMTRD', $statusSPMTRD)
        ->with('idLaudoBRIDLE4_ROLO3', $idLaudoBRIDLE4_ROLO3)->with('statusBRIDLE4_ROLO3', $statusBRIDLE4_ROLO3)
        ->with('idLaudoBRIDLE4_ROLO1', $idLaudoBRIDLE4_ROLO1)->with('statusBRIDLE4_ROLO1', $statusBRIDLE4_ROLO1)
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

    public function galvanizacao_refratarios() {
        return view('csn.relatoriosTecnicos.termografia_galvanizacao_refratarios');
    }
    //--- PINTURA
    public function pintura_estacoesRemotas() {
        //CONTROLE AR CONDICIONADO 460V
        $tag_CARC_460V = "TE 72 500 510 509 000 - 000058";
        $idAtividadeCARC_460V = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CARC_460V)->value('id');
        $idAnaliseCARC_460V = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARC_460V)->max('id');
        $idLaudoCARC_460V = DB::table('laudos')->where('analise_id', '=', $idAnaliseCARC_460V)->value('id');
        $statusCARC_460V = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARC_460V)->value('status_id');
        //ROLO CORRETOR 6
        $tag_RC6 = "TE 72 500 510 509 000 - 000059";
        $idAtividadeRC6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RC6)->value('id');
        $idAnaliseRC6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRC6)->max('id');
        $idLaudoRC6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRC6)->value('id');
        $statusRC6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRC6)->value('status_id');
        //FIFE CORRETOR 4
        $tag_FIFE_COR4 = "TE 72 500 510 509 000 - 000057";
        $idAtividadeFIFE_COR4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_COR4)->value('id');
        $idAnaliseFIFE_COR4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_COR4)->max('id');
        $idLaudoFIFE_COR4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFIFE_COR4)->value('id');
        $statusFIFE_COR4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_COR4)->value('status_id');
        //ESTAÇÕES OPERAÇÃO - OS-22-4
        $tag_EO_OS_22_4 = "TE 72 500 510 509 000 - 000054";
        $idAtividadeEO_OS_22_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_4)->value('id');
        $idAnaliseEO_OS_22_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_4)->max('id');
        $idLaudoEO_OS_22_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEO_OS_22_4)->value('id');
        $statusEO_OS_22_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_4)->value('status_id');
        //ROSS AIR SYSTEM - FINISH OVEN - PNL-8801
        $tag_RAS_FO_PNL_8801 = "TE 72 500 510 509 000 - 000016";
        $idAtividadeRAS_FO_PNL_8801 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAS_FO_PNL_8801)->value('id');
        $idAnaliseRAS_FO_PNL_8801 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAS_FO_PNL_8801)->max('id');
        $idLaudoRAS_FO_PNL_8801 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAS_FO_PNL_8801)->value('id');
        $statusRAS_FO_PNL_8801 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAS_FO_PNL_8801)->value('status_id');
        //ESTAÇÕES REMOTAS - 43
        $tag_ER_43 = "TE 72 500 510 509 000 - 000055";
        $idAtividadeER_43 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_43)->value('id');
        $idAnaliseER_43 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_43)->max('id');
        $idLaudoER_43 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_43)->value('id');
        $statusER_43 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_43)->value('status_id');
        //ESTAÇÕES REMOTAS - 51
        $tag_ER_51 = "TE 72 500 510 509 000 - 000017";
        $idAtividadeER_51 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_51)->value('id');
        $idAnaliseER_51 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_51)->max('id');
        $idLaudoER_51 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_51)->value('id');
        $statusER_51 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_51)->value('status_id');
        //ESTAÇÕES REMOTAS - 50
        $tag_ER_50 = "TE 72 500 510 509 000 - 000018";
        $idAtividadeER_50 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_50)->value('id');
        $idAnaliseER_50 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_50)->max('id');
        $idLaudoER_50 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_50)->value('id');
        $statusER_50 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_50)->value('status_id');
        //FIFE DA ENROLADEIRA
        $tag_FIFE_ENR = "TE 72 500 510 509 000 - 000003";
        $idAtividadeFIFE_ENR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_ENR)->value('id');
        $idAnaliseFIFE_ENR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_ENR)->max('id');
        $idLaudoFIFE_ENR = DB::table('laudos')->where('analise_id', '=', $idAnaliseFIFE_ENR)->value('id');
        $statusFIFE_ENR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_ENR)->value('status_id');
        //ESTAÇÕES REMOTAS - 46
        $tag_ET_46 = "TE 72 500 510 509 000 - 000056";
        $idAtividadeET_46 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_46)->value('id');
        $idAnaliseET_46 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_46)->max('id');
        $idLaudoET_46 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_46)->value('id');
        $statusET_46 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_46)->value('status_id');
        //ESTAÇÕES REMOTAS - 57
        $tag_ET_57 = "TE 72 500 510 509 000 - 000001";
        $idAtividadeET_57 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_57)->value('id');
        $idAnaliseET_57 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_57)->max('id');
        $idLaudoET_57 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_57)->value('id');
        $statusET_57 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_57)->value('status_id');
        //ESTAÇÕES REMOTAS - 56
        $tag_ET_56 = "TE 72 500 510 509 000 - 000002";
        $idAtividadeET_56 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_56)->value('id');
        $idAnaliseET_56 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_56)->max('id');
        $idLaudoET_56 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_56)->value('id');
        $statusET_56 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_56)->value('status_id');
        //ESTAÇÕES REMOTAS - 53
        $tag_ET_53 = "TE 72 500 510 509 000 - 000005";
        $idAtividadeET_53 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_53)->value('id');
        $idAnaliseET_53 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_53)->max('id');
        $idLaudoET_53 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_53)->value('id');
        $statusET_53 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_53)->value('status_id');
        //ESTAÇÕES REMOTAS - 55
        $tag_ET_55 = "TE 72 500 510 509 000 - 000006";
        $idAtividadeET_55 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_55)->value('id');
        $idAnaliseET_55 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_55)->max('id');
        $idLaudoET_55 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_55)->value('id');
        $statusET_55 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_55)->value('status_id');
        //ESTAÇÕES REMOTAS - 54
        $tag_ET_54 = "TE 72 500 510 509 000 - 000007";
        $idAtividadeET_54 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_54)->value('id');
        $idAnaliseET_54 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_54)->max('id');
        $idLaudoET_54 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_54)->value('id');
        $statusET_54 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_54)->value('status_id');
        //ESTAÇÕES OPERAÇÃO - OS-22-12
        $tag_EO_OS_22_12 = "TE 72 500 510 509 000 - 000008";
        $idAtividadeEO_OS_22_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_12)->value('id');
        $idAnaliseEO_OS_22_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_12)->max('id');
        $idLaudoEO_OS_22_12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEO_OS_22_12)->value('id');
        $statusEO_OS_22_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_12)->value('status_id');
        //ESTAÇÕES OPERAÇÃO - OS-22-5
        $tag_EO_OS_22_5 = "TE 72 500 510 509 000 - 000009";
        $idAtividadeEO_OS_22_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_5)->value('id');
        $idAnaliseEO_OS_22_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_5)->max('id');
        $idLaudoEO_OS_22_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEO_OS_22_5)->value('id');
        $statusEO_OS_22_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_5)->value('status_id');
        //ESTAÇÕES REMOTAS - 52
        $tag_ET_52 = "TE 72 500 510 509 000 - 000010";
        $idAtividadeET_52 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_52)->value('id');
        $idAnaliseET_52 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_52)->max('id');
        $idLaudoET_52 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_52)->value('id');
        $statusET_52 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_52)->value('status_id');
        //ESTAÇÕES REMOTAS - 48
        $tag_ER_48 = "TE 72 500 510 509 000 - 000011";
        $idAtividadeER_48 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ER_48)->value('id');
        $idAnaliseER_48 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeER_48)->max('id');
        $idLaudoER_48 = DB::table('laudos')->where('analise_id', '=', $idAnaliseER_48)->value('id');
        $statusER_48 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseER_48)->value('status_id');
        //ESTAÇÕES REMOTAS - 47
        $tag_ET_47 = "TE 72 500 510 509 000 - 000012";
        $idAtividadeET_47 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_47)->value('id');
        $idAnaliseET_47 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_47)->max('id');
        $idLaudoET_47 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_47)->value('id');
        $statusET_47 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_47)->value('status_id');
        //ESTAÇÕES REMOTAS - 45
        $tag_ET_45 = "TE 72 500 510 509 000 - 000013";
        $idAtividadeET_45 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_45)->value('id');
        $idAnaliseET_45 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_45)->max('id');
        $idLaudoET_45 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_45)->value('id');
        $statusET_45 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_45)->value('status_id');
        //QD-CCL7-460V
        $tag_QD_CCL7_460V = "TE 72 500 510 509 000 - 000014";
        $idAtividadeQD_CCL7_460V = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_QD_CCL7_460V)->value('id');
        $idAnaliseQD_CCL7_460V = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQD_CCL7_460V)->max('id');
        $idLaudoQD_CCL7_460V = DB::table('laudos')->where('analise_id', '=', $idAnaliseQD_CCL7_460V)->value('id');
        $statusQD_CCL7_460V = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQD_CCL7_460V)->value('status_id');
        //ROSS AIR SYSTEM - PRIME OVEN - PNL-7401
        $tag_RAS_PO_PNL_7401 = "TE 72 500 510 509 000 - 000015";
        $idAtividadeRAS_PO_PNL_7401 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAS_PO_PNL_7401)->value('id');
        $idAnaliseRAS_PO_PNL_7401 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAS_PO_PNL_7401)->max('id');
        $idLaudoRAS_PO_PNL_7401 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAS_PO_PNL_7401)->value('id');
        $statusRAS_PO_PNL_7401 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAS_PO_PNL_7401)->value('status_id');
        //ROSS AIR SYSTEM - OXIDIZER - PNL-23001
        $tag_RASO_PNL_23001 = "TE 72 500 510 509 000 - 000019";
        $idAtividadeRASO_PNL_23001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RASO_PNL_23001)->value('id');
        $idAnaliseRASO_PNL_23001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRASO_PNL_23001)->max('id');
        $idLaudoRASO_PNL_23001 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRASO_PNL_23001)->value('id');
        $statusRASO_PNL_23001 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRASO_PNL_23001)->value('status_id');
        //ESTAÇÕES OPERAÇÃO - OS-22-2
        $tag_EO_OS_22_2 = "TE 72 500 510 509 000 - 000020";
        $idAtividadeEO_OS_22_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_2)->value('id');
        $idAnaliseEO_OS_22_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_2)->max('id');
        $idLaudoEO_OS_22_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEO_OS_22_2)->value('id');
        $statusEO_OS_22_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_2)->value('status_id');
        //ESTAÇÕES OPERAÇÃO - OS-22-3
        $tag_EO_OS_22_3 = "TE 72 500 510 509 000 - 000021";
        $idAtividadeEO_OS_22_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_3)->value('id');
        $idAnaliseEO_OS_22_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_3)->max('id');
        $idLaudoEO_OS_22_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEO_OS_22_3)->value('id');
        $statusEO_OS_22_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_3)->value('status_id');
        //ESTAÇÕES REMOTAS - 44
        $tag_ET_44 = "TE 72 500 510 509 000 - 000022";
        $idAtividadeET_44 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_44)->value('id');
        $idAnaliseET_44 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_44)->max('id');
        $idLaudoET_44 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_44)->value('id');
        $statusET_44 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_44)->value('status_id');
        //ESTAÇÕES REMOTAS - 42
        $tag_ET_42 = "TE 72 500 510 509 000 - 000023";
        $idAtividadeET_42 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_42)->value('id');
        $idAnaliseET_42 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_42)->max('id');
        $idLaudoET_42 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_42)->value('id');
        $statusET_42 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_42)->value('status_id');
        //SECADOR DE CROMO - INFRARED - PLN-6701
        $tag_SCI_PLN_6701 = "TE 72 500 510 509 000 - 000053";
        $idAtividadeSCI_PLN_6701 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SCI_PLN_6701)->value('id');
        $idAnaliseSCI_PLN_6701 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSCI_PLN_6701)->max('id');
        $idLaudoSCI_PLN_6701 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSCI_PLN_6701)->value('id');
        $statusSCI_PLN_6701 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSCI_PLN_6701)->value('status_id');
        //FIFE DESENROLADEIRA 2 - CC1CGUC1.MC
        $tag_FIFE_DES2_CC1CGUC1_MC = "TE 72 500 510 509 000 - 000052";
        $idAtividadeFIFE_DES2_CC1CGUC1_MC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_DES2_CC1CGUC1_MC)->value('id');
        $idAnaliseFIFE_DES2_CC1CGUC1_MC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_DES2_CC1CGUC1_MC)->max('id');
        $idLaudoFIFE_DES2_CC1CGUC1_MC = DB::table('laudos')->where('analise_id', '=', $idAnaliseFIFE_DES2_CC1CGUC1_MC)->value('id');
        $statusFIFE_DES2_CC1CGUC1_MC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_DES2_CC1CGUC1_MC)->value('status_id');
        //FIFE DESENROLADEIRA 1 - PAINEL CC1CGUC2.MC
        $tag_FIFE_DES2_CC1CGUC2_MC = "TE 72 500 510 509 000 - 000049";
        $idAtividadeFIFE_DES2_CC1CGUC2_MC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_DES2_CC1CGUC2_MC)->value('id');
        $idAnaliseFIFE_DES2_CC1CGUC2_MC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_DES2_CC1CGUC2_MC)->max('id');
        $idLaudoFIFE_DES2_CC1CGUC2_MC = DB::table('laudos')->where('analise_id', '=', $idAnaliseFIFE_DES2_CC1CGUC2_MC)->value('id');
        $statusFIFE_DES2_CC1CGUC2_MC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_DES2_CC1CGUC2_MC)->value('status_id');
        //FIFE DESENROLADEIRA 2 - CC1CGUC1.CB
        $tag_FIFE_DES2_CC1CGUC1_CB = "TE 72 500 510 509 000 - 000051";
        $idAtividadeFIFE_DES2_CC1CGUC1_CB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_DES2_CC1CGUC1_CB)->value('id');
        $idAnaliseFIFE_DES2_CC1CGUC1_CB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_DES2_CC1CGUC1_CB)->max('id');
        $idLaudoFIFE_DES2_CC1CGUC1_CB = DB::table('laudos')->where('analise_id', '=', $idAnaliseFIFE_DES2_CC1CGUC1_CB)->value('id');
        $statusFIFE_DES2_CC1CGUC1_CB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_DES2_CC1CGUC1_CB)->value('status_id');
        //FIFE DESENROLADEIRA 1 - PAINEL CC1CGUC2.CB
        $tag_FIFE_DES1_CC1CGUC1_CB = "TE 72 500 510 509 000 - 000048";
        $idAtividadeFIFE_DES1_CC1CGUC1_CB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FIFE_DES1_CC1CGUC1_CB)->value('id');
        $idAnaliseFIFE_DES1_CC1CGUC1_CB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_DES1_CC1CGUC1_CB)->max('id');
        $idLaudoFIFE_DES1_CC1CGUC1_CB = DB::table('laudos')->where('analise_id', '=', $idAnaliseFIFE_DES1_CC1CGUC1_CB)->value('id');
        $statusFIFE_DES1_CC1CGUC1_CB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_DES1_CC1CGUC1_CB)->value('status_id');
        //ESTAÇÕES OPERAÇÃO - OS-22-1
        $tag_EO_OS_22_1 = "TE 72 500 510 509 000 - 000024";
        $idAtividadeEO_OS_22_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_EO_OS_22_1)->value('id');
        $idAnaliseEO_OS_22_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEO_OS_22_1)->max('id');
        $idLaudoEO_OS_22_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEO_OS_22_1)->value('id');
        $statusEO_OS_22_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEO_OS_22_1)->value('status_id');
        //ESTAÇÕES REMOTAS - 41
        $tag_ET_41 = "TE 72 500 510 509 000 - 000025";
        $idAtividadeET_41 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_41)->value('id');
        $idAnaliseET_41 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_41)->max('id');
        $idLaudoET_41 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_41)->value('id');
        $statusET_41 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_41)->value('status_id');
        //ESTAÇÕES REMOTAS - 40
        $tag_ET_40 = "TE 72 500 510 509 000 - 000026";
        $idAtividadeET_40 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_40)->value('id');
        $idAnaliseET_40 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_40)->max('id');
        $idLaudoET_40 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_40)->value('id');
        $statusET_40 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_40)->value('status_id');
        //ESTAÇÕES REMOTAS - 39
        $tag_ET_39 = "TE 72 500 510 509 000 - 000029";
        $idAtividadeET_39 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_39)->value('id');
        $idAnaliseET_39 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_39)->max('id');
        $idLaudoET_39 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_39)->value('id');
        $statusET_39 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_39)->value('status_id');
        //ESTAÇÕES REMOTAS - 38
        $tag_ET_38 = "TE 72 500 510 509 000 - 000030";
        $idAtividadeET_38 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_38)->value('id');
        $idAnaliseET_38 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_38)->max('id');
        $idLaudoET_38 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_38)->value('id');
        $statusET_38 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_38)->value('status_id');
        //ESTAÇÕES REMOTAS - 37
        $tag_ET_37 = "TE 72 500 510 509 000 - 000031";
        $idAtividadeET_37 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_37)->value('id');
        $idAnaliseET_37 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_37)->max('id');
        $idLaudoET_37 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_37)->value('id');
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
        $idLaudoPR2_PC5000 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR2_PC5000)->value('id');
        $statusPR2_PC5000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR2_PC5000)->value('status_id');
        //ESTAÇÕES REMOTAS - 35
        $tag_ET_35 = "TE 72 500 510 509 000 - 000034";
        $idAtividadeET_35 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_35)->value('id');
        $idAnaliseET_35 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_35)->max('id');
        $idLaudoET_35 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_35)->value('id');
        $statusET_35 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_35)->value('status_id');
        //PAINEL HENKEL - PNL-5601
        $tag_PH_PNL_5601 = "TE 72 500 510 509 000 - 000035";
        $idAtividadePH_PNL_5601 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PH_PNL_5601)->value('id');
        $idAnalisePH_PNL_5601 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePH_PNL_5601)->max('id');
        $idLaudoPH_PNL_5601 = DB::table('laudos')->where('analise_id', '=', $idAnalisePH_PNL_5601)->value('id');
        $statusPH_PNL_5601 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePH_PNL_5601)->value('status_id');
        //ESTAÇÕES REMOTAS - 34
        $tag_ET_34 = "TE 72 500 510 509 000 - 000036";
        $idAtividadeET_34 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_34)->value('id');
        $idAnaliseET_34 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_34)->max('id');
        $idLaudoET_34 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_34)->value('id');
        $statusET_34 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_34)->value('status_id');
        //ESTAÇÕES REMOTAS - 33
        $tag_ET_33 = "TE 72 500 510 509 000 - 000037";
        $idAtividadeET_33 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_33)->value('id');
        $idAnaliseET_33 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_33)->max('id');
        $idLaudoET_33 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_33)->value('id');
        $statusET_33 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_33)->value('status_id');
        //ESTAÇÕES REMOTAS - 32
        $tag_ET_32 = "TE 72 500 510 509 000 - 000038";
        $idAtividadeET_32 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_32)->value('id');
        $idAnaliseET_32 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_32)->max('id');
        $idLaudoET_32 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_32)->value('id');
        $statusET_32 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_32)->value('status_id');
        //ESTAÇÕES REMOTAS - 31
        $tag_ET_31 = "TE 72 500 510 509 000 - 000039";
        $idAtividadeET_31 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_31)->value('id');
        $idAnaliseET_31 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_31)->max('id');
        $idLaudoET_31 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_31)->value('id');
        $statusET_31 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_31)->value('status_id');
        //ESTAÇÕES REMOTAS - 30
        $tag_ET_30 = "TE 72 500 510 509 000 - 000041";
        $idAtividadeET_30 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_30)->value('id');
        $idAnaliseET_30 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_30)->max('id');
        $idLaudoET_30 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_30)->value('id');
        $statusET_30 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_30)->value('status_id');
        //PAINEL REMOTO #1 - PC5000
        $tag_PR1_PC5000 = "TE 72 500 510 509 000 - 000040";
        $idAtividadePR1_PC5000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PR1_PC5000)->value('id');
        $idAnalisePR1_PC5000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR1_PC5000)->max('id');
        $idLaudoPR1_PC5000 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR1_PC5000)->value('id');
        $statusPR1_PC5000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR1_PC5000)->value('status_id');
        //ESTAÇÕES REMOTAS - 16
        $tag_ET_16 = "TE 72 500 510 509 000 - 000042";
        $idAtividadeET_16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_16)->value('id');
        $idAnaliseET_16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_16)->max('id');
        $idLaudoET_16 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_16)->value('id');
        $statusET_16 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_16)->value('status_id');
        //ESTAÇÕES REMOTAS - 15
        $tag_ET_15 = "TE 72 500 510 509 000 - 000043";
        $idAtividadeET_15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_15)->value('id');
        $idAnaliseET_15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_15)->max('id');
        $idLaudoET_15 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_15)->value('id');
        $statusET_15 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_15)->value('status_id');
        //ESTAÇÕES REMOTAS - 14
        $tag_ET_14 = "TE 72 500 510 509 000 - 000044";
        $idAtividadeET_14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_14)->value('id');
        $idAnaliseET_14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_14)->max('id');
        $idLaudoET_14 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_14)->value('id');
        $statusET_14 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_14)->value('status_id');
        //ESTAÇÕES REMOTAS - 13
        $tag_ET_13 = "TE 72 500 510 509 000 - 000045";
        $idAtividadeET_13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_13)->value('id');
        $idAnaliseET_13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_13)->max('id');
        $idLaudoET_13 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_13)->value('id');
        $statusET_13 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_13)->value('status_id');
        //ESTAÇÕES REMOTAS - 17
        $tag_ET_17 = "TE 72 500 510 509 000 - 000050";
        $idAtividadeET_17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_17)->value('id');
        $idAnaliseET_17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_17)->max('id');
        $idLaudoET_17 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_17)->value('id');
        $statusET_17 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_17)->value('status_id');
        //ESTAÇÕES REMOTAS - 12
        $tag_ET_12 = "TE 72 500 510 509 000 - 000047";
        $idAtividadeET_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_12)->value('id');
        $idAnaliseET_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_12)->max('id');
        $idLaudoET_12 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_12)->value('id');
        $statusET_12 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_12)->value('status_id');
        //ESTAÇÕES REMOTAS - 11
        $tag_ET_11 = "TE 72 500 510 509 000 - 000046";
        $idAtividadeET_11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_11)->value('id');
        $idAnaliseET_11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_11)->max('id');
        $idLaudoET_11 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_11)->value('id');
        $statusET_11 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_11)->value('status_id');
        //ESTAÇÕES REMOTAS - 49
        $tag_ET_49 = "TE 72 500 510 509 000 - 000028";
        $idAtividadeET_49 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ET_49)->value('id');
        $idAnaliseET_49 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeET_49)->max('id');
        $idLaudoET_49 = DB::table('laudos')->where('analise_id', '=', $idAnaliseET_49)->value('id');
        $statusET_49 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseET_49)->value('status_id');
        //PAINEL DA CALDEIRA - PNL-11001
        $tag_PC_PNL_1101 = "TE 72 500 510 509 000 - 000027";
        $idAtividadePC_PNL_1101 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_PNL_1101)->value('id');
        $idAnalisePC_PNL_1101 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_PNL_1101)->max('id');
        $idLaudoPC_PNL_1101 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_PNL_1101)->value('id');
        $statusPC_PNL_1101 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_PNL_1101)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pintura_estacoesRemotas')
        ->with('idLaudoCARC_460V', $idLaudoCARC_460V)->with('statusCARC_460V', $statusCARC_460V)
        ->with('idLaudoRC6', $idLaudoRC6)->with('statusRC6', $statusRC6)
        ->with('idLaudoFIFE_COR4', $idLaudoFIFE_COR4)->with('statusFIFE_COR4', $statusFIFE_COR4)
        ->with('idLaudoEO_OS_22_4', $idLaudoEO_OS_22_4)->with('statusEO_OS_22_4', $statusEO_OS_22_4)
        ->with('idLaudoRAS_FO_PNL_8801', $idLaudoRAS_FO_PNL_8801)->with('statusRAS_FO_PNL_8801', $statusRAS_FO_PNL_8801)
        ->with('idLaudoER_43', $idLaudoER_43)->with('statusER_43', $statusER_43)
        ->with('idLaudoER_51', $idLaudoER_51)->with('statusER_51', $statusER_51)
        ->with('idLaudoER_50', $idLaudoER_50)->with('statusER_50', $statusER_50)
        ->with('idLaudoFIFE_ENR', $idLaudoFIFE_ENR)->with('statusFIFE_ENR', $statusFIFE_ENR)
        ->with('idLaudoET_46', $idLaudoET_46)->with('statusET_46', $statusET_46)
        ->with('idLaudoET_57', $idLaudoET_57)->with('statusET_57', $statusET_57)
        ->with('idLaudoET_56', $idLaudoET_56)->with('statusET_56', $statusET_56)
        ->with('idLaudoET_53', $idLaudoET_53)->with('statusET_53', $statusET_53)
        ->with('idLaudoET_55', $idLaudoET_55)->with('statusET_55', $statusET_55)
        ->with('idLaudoET_54', $idLaudoET_54)->with('statusET_54', $statusET_54)
        ->with('idLaudoEO_OS_22_12', $idLaudoEO_OS_22_12)->with('statusEO_OS_22_12', $statusEO_OS_22_12)
        ->with('idLaudoEO_OS_22_5', $idLaudoEO_OS_22_5)->with('statusEO_OS_22_5', $statusEO_OS_22_5)
        ->with('idLaudoET_52', $idLaudoET_52)->with('statusET_52', $statusET_52)
        ->with('idLaudoER_48', $idLaudoER_48)->with('statusER_48', $statusER_48)
        ->with('idLaudoET_47', $idLaudoET_47)->with('statusET_47', $statusET_47)
        ->with('idLaudoET_45', $idLaudoET_45)->with('statusET_45', $statusET_45)
        ->with('idLaudoQD_CCL7_460V', $idLaudoQD_CCL7_460V)->with('statusQD_CCL7_460V', $statusQD_CCL7_460V)
        ->with('idLaudoRAS_PO_PNL_7401', $idLaudoRAS_PO_PNL_7401)->with('statusRAS_PO_PNL_7401', $statusRAS_PO_PNL_7401)
        ->with('idLaudoRASO_PNL_23001', $idLaudoRASO_PNL_23001)->with('statusRASO_PNL_23001', $statusRASO_PNL_23001)
        ->with('idLaudoEO_OS_22_2', $idLaudoEO_OS_22_2)->with('statusEO_OS_22_2', $statusEO_OS_22_2)
        ->with('idLaudoEO_OS_22_3', $idLaudoEO_OS_22_3)->with('statusEO_OS_22_3', $statusEO_OS_22_3)
        ->with('idLaudoET_44', $idLaudoET_44)->with('statusET_44', $statusET_44)
        ->with('idLaudoET_42', $idLaudoET_42)->with('statusET_42', $statusET_42)
        ->with('idLaudoSCI_PLN_6701', $idLaudoSCI_PLN_6701)->with('statusSCI_PLN_6701', $statusSCI_PLN_6701)
        ->with('idLaudoFIFE_DES2_CC1CGUC1_MC', $idLaudoFIFE_DES2_CC1CGUC1_MC)->with('statusFIFE_DES2_CC1CGUC1_MC', $statusFIFE_DES2_CC1CGUC1_MC)
        ->with('idLaudoFIFE_DES2_CC1CGUC2_MC', $idLaudoFIFE_DES2_CC1CGUC2_MC)->with('statusFIFE_DES2_CC1CGUC2_MC', $statusFIFE_DES2_CC1CGUC2_MC)
        ->with('idLaudoFIFE_DES2_CC1CGUC1_CB', $idLaudoFIFE_DES2_CC1CGUC1_CB)->with('statusFIFE_DES2_CC1CGUC1_CB', $statusFIFE_DES2_CC1CGUC1_CB)
        ->with('idLaudoFIFE_DES1_CC1CGUC1_CB', $idLaudoFIFE_DES1_CC1CGUC1_CB)->with('statusFIFE_DES1_CC1CGUC1_CB', $statusFIFE_DES1_CC1CGUC1_CB)
        ->with('idLaudoEO_OS_22_1', $idLaudoEO_OS_22_1)->with('statusEO_OS_22_1', $statusEO_OS_22_1)
        ->with('idLaudoET_41', $idLaudoET_41)->with('statusET_41', $statusET_41)
        ->with('idLaudoET_40', $idLaudoET_40)->with('statusET_40', $statusET_40)
        ->with('idLaudoET_39', $idLaudoET_39)->with('statusET_39', $statusET_39)
        ->with('idLaudoET_38', $idLaudoET_38)->with('statusET_38', $statusET_38)
        ->with('idLaudoET_37', $idLaudoET_37)->with('statusET_37', $statusET_37)
        ->with('idLaudoET_36', $idLaudoET_36)->with('statusET_36', $statusET_36)
        ->with('idLaudoPR2_PC5000', $idLaudoPR2_PC5000)->with('statusPR2_PC5000', $statusPR2_PC5000)
        ->with('idLaudoET_35', $idLaudoET_35)->with('statusET_35', $statusET_35)
        ->with('idLaudoPH_PNL_5601', $idLaudoPH_PNL_5601)->with('statusPH_PNL_5601', $statusPH_PNL_5601)
        ->with('idLaudoET_34', $idLaudoET_34)->with('statusET_34', $statusET_34)
        ->with('idLaudoET_33', $idLaudoET_33)->with('statusET_33', $statusET_33)
        ->with('idLaudoET_32', $idLaudoET_32)->with('statusET_32', $statusET_32)
        ->with('idLaudoET_31', $idLaudoET_31)->with('statusET_31', $statusET_31)
        ->with('idLaudoET_30', $idLaudoET_30)->with('statusET_30', $statusET_30)
        ->with('idLaudoPR1_PC5000', $idLaudoPR1_PC5000)->with('statusPR1_PC5000', $statusPR1_PC5000)
        ->with('idLaudoET_16', $idLaudoET_16)->with('statusET_16', $statusET_16)
        ->with('idLaudoET_15', $idLaudoET_15)->with('statusET_15', $statusET_15)
        ->with('idLaudoET_14', $idLaudoET_14)->with('statusET_14', $statusET_14)
        ->with('idLaudoET_13', $idLaudoET_13)->with('statusET_13', $statusET_13)
        ->with('idLaudoET_17', $idLaudoET_17)->with('statusET_17', $statusET_17)
        ->with('idLaudoET_12', $idLaudoET_12)->with('statusET_12', $statusET_12)
        ->with('idLaudoET_11', $idLaudoET_11)->with('statusET_11', $statusET_11)
        ->with('idLaudoET_49', $idLaudoET_49)->with('statusET_49', $statusET_49)
        ->with('idLaudoPC_PNL_1101', $idLaudoPC_PNL_1101)->with('statusPC_PNL_1101', $statusPC_PNL_1101)
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

    public function pintura_paineis_drives() {
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


        return view('csn.relatoriosTecnicos.termografia_pintura_paineis_drives')
        ->with('idLaudoBRIDLE_N6_M2', $idLaudoBRIDLE_N6_M2)->with('statusBRIDLE_N6_M2', $statusBRIDLE_N6_M2)
        ->with('idLaudoBRIDLE_N6_M1', $idLaudoBRIDLE_N6_M1)->with('statusBRIDLE_N6_M1', $statusBRIDLE_N6_M1)
        ->with('idLaudoBRIDLE_N5_M2', $idLaudoBRIDLE_N5_M2)->with('statusBRIDLE_N5_M2', $statusBRIDLE_N5_M2)
        ->with('idLaudoBRIDLE_N5_M1', $idLaudoBRIDLE_N5_M1)->with('statusBRIDLE_N5_M1', $statusBRIDLE_N5_M1)
        ->with('idLaudoMF_170KW', $idLaudoMF_170KW)->with('statusMF_170KW', $statusMF_170KW)
        ->with('idLaudo_03B7DD05', $idLaudo_03B7DD05)->with('status_03B7DD05', $status_03B7DD05)
        ->with('idLaudo_03B7DD04', $idLaudo_03B7DD04)->with('status_03B7DD04', $status_03B7DD04)
        ->with('idLaudoRE_4', $idLaudoRE_4)->with('statusRE_4', $statusRE_4)
        ->with('idLaudoRE_3', $idLaudoRE_3)->with('statusRE_3', $statusRE_3)
        ->with('idLaudoDES_N1', $idLaudoDES_N1)->with('statusDES_N1', $statusDES_N1)
        ->with('idLaudoENROLADEIRA', $idLaudoENROLADEIRA)->with('statusENROLADEIRA', $statusENROLADEIRA)
        ->with('idLaudoACUM_SAIDA', $idLaudoACUM_SAIDA)->with('statusACUM_SAIDA', $statusACUM_SAIDA)
        ->with('idLaudoRET_MASTER', $idLaudoRET_MASTER)->with('statusRET_MASTER', $statusRET_MASTER)
        ->with('idLaudoRET_SLAVE', $idLaudoRET_SLAVE)->with('statusRET_SLAVE', $statusRET_SLAVE)
        ->with('idLaudoROLO_ESCOVA_1', $idLaudoROLO_ESCOVA_1)->with('statusROLO_ESCOVA_1', $statusROLO_ESCOVA_1)
        ->with('idLaudoROLO_ESCOVA_2', $idLaudoROLO_ESCOVA_2)->with('statusROLO_ESCOVA_2', $statusROLO_ESCOVA_2)
        ->with('idLaudoACUM_ENTRADA', $idLaudoACUM_ENTRADA)->with('statusACUM_ENTRADA', $statusACUM_ENTRADA)
        ->with('idLaudoDES_N2', $idLaudoDES_N2)->with('statusDES_N2', $statusDES_N2)
        ->with('idLaudoFOEF_03B7DB10', $idLaudoFOEF_03B7DB10)->with('statusFOEF_03B7DB10', $statusFOEF_03B7DB10)
        ->with('idLaudoPOEF_03B7DB10', $idLaudoPOEF_03B7DB10)->with('statusPOEF_03B7DB10', $statusPOEF_03B7DB10)
        ->with('idLaudoEOXI', $idLaudoEOXI)->with('statusEOXI', $statusEOXI)
        ->with('idLaudoMAKE_UP_ASF', $idLaudoMAKE_UP_ASF)->with('statusMAKE_UP_ASF', $statusMAKE_UP_ASF)
        ->with('idLaudoCLTR_03B7DB08', $idLaudoCLTR_03B7DB08)->with('statusCLTR_03B7DB08', $statusCLTR_03B7DB08)
        ->with('idLaudoCLBR_03B7DB08', $idLaudoCLBR_03B7DB08)->with('statusCLBR_03B7DB08', $statusCLBR_03B7DB08)
        ->with('idLaudoTTSR_03B7DB07', $idLaudoTTSR_03B7DB07)->with('statusTTSR_03B7DB07', $statusTTSR_03B7DB07)
        ->with('idLaudoBRIDLE_N4_M2', $idLaudoBRIDLE_N4_M2)->with('statusBRIDLE_N4_M2', $statusBRIDLE_N4_M2)
        ->with('idLaudoBRIDLE_N4_M1', $idLaudoBRIDLE_N4_M1)->with('statusBRIDLE_N4_M1', $statusBRIDLE_N4_M1)
        ->with('idLaudoPQR_03B7DB07', $idLaudoPQR_03B7DB07)->with('statusPQR_03B7DB07', $statusPQR_03B7DB07)
        ->with('idLaudoPCBPR_03B7DB06', $idLaudoPCBPR_03B7DB06)->with('statusPCBPR_03B7DB06', $statusPCBPR_03B7DB06)
        ->with('idLaudoPCBAR_03B7DB06', $idLaudoPCBAR_03B7DB06)->with('statusPCBAR_03B7DB06', $statusPCBAR_03B7DB06)
        ->with('idLaudoPCTPR_03B7DB06', $idLaudoPCTPR_03B7DB06)->with('statusPCTPR_03B7DB06', $statusPCTPR_03B7DB06)
        ->with('idLaudoPCTAR_03B7DB06', $idLaudoPCTAR_03B7DB06)->with('statusPCTAR_03B7DB06', $statusPCTAR_03B7DB06)
        ->with('idLaudoBRIDLE_N3_M2', $idLaudoBRIDLE_N3_M2)->with('statusBRIDLE_N3_M2', $statusBRIDLE_N3_M2)
        ->with('idLaudoBRIDLE_N3_M1', $idLaudoBRIDLE_N3_M1)->with('statusBRIDLE_N3_M1', $statusBRIDLE_N3_M1)
        ->with('idLaudoCCBPR_03B7DB04', $idLaudoCCBPR_03B7DB04)->with('statusCCBPR_03B7DB04', $statusCCBPR_03B7DB04)
        ->with('idLaudoCCBAR_03B7DB04', $idLaudoCCBAR_03B7DB04)->with('statusCCBAR_03B7DB04', $statusCCBAR_03B7DB04)
        ->with('idLaudoCCTPR_03B7DB04', $idLaudoCCTPR_03B7DB04)->with('statusCCTPR_03B7DB04', $statusCCTPR_03B7DB04)
        ->with('idLaudoCCTAR_03B7DB04', $idLaudoCCTAR_03B7DB04)->with('statusCCTAR_03B7DB04', $statusCCTAR_03B7DB04)
        ->with('idLaudoBRIDLE_N2_M2', $idLaudoBRIDLE_N2_M2)->with('statusBRIDLE_N2_M2', $statusBRIDLE_N2_M2)
        ->with('idLaudoBRIDLE_N2_M1', $idLaudoBRIDLE_N2_M1)->with('statusBRIDLE_N2_M1', $statusBRIDLE_N2_M1)
        ->with('idLaudoBRIDLE_N1_RP', $idLaudoBRIDLE_N1_RP)->with('statusBRIDLE_N1_RP', $statusBRIDLE_N1_RP)
        ->with('idLaudoBRIDLE_N1_M2', $idLaudoBRIDLE_N1_M2)->with('statusBRIDLE_N1_M2', $statusBRIDLE_N1_M2)
        ->with('idLaudoBRIDLE_N1_M1', $idLaudoBRIDLE_N1_M1)->with('statusBRIDLE_N1_M1', $statusBRIDLE_N1_M1)
        ->with('idLaudoRA_N2_SUP', $idLaudoRA_N2_SUP)->with('statusRA_N2_SUP', $statusRA_N2_SUP)
        ->with('idLaudoRA_N2_INF', $idLaudoRA_N2_INF)->with('statusRA_N2_INF', $statusRA_N2_INF)
        ->with('idLaudoRA_N1_SUPER', $idLaudoRA_N1_SUPER)->with('statusRA_N1_SUPER', $statusRA_N1_SUPER)
        ->with('statusRA_N1_INF', $statusRA_N1_INF)->with('idLaudoRA_N1_INF', $idLaudoRA_N1_INF)
        ->with('idLaudoRET_OXID', $idLaudoRET_OXID)->with('statusRET_OXID', $statusRET_OXID)
        ->with('idLaudoRA_N6_INF', $idLaudoRA_N6_INF)->with('statusRA_N6_INF', $statusRA_N6_INF)
        ->with('idLaudoRA_N6_SUPER', $idLaudoRA_N6_SUPER)->with('statusRA_N6_SUPER', $statusRA_N6_SUPER)
        ->with('idLaudoRA_N7_INF', $idLaudoRA_N7_INF)->with('statusRA_N7_INF', $statusRA_N7_INF)
        ->with('idLaudoRA_N7_SUPER', $idLaudoRA_N7_SUPER)->with('statusRA_N7_SUPER', $statusRA_N7_SUPER)
        ->with('idLaudoTRTR_03B7DA09', $idLaudoTRTR_03B7DA09)->with('statusTRTR_03B7DA09', $statusTRTR_03B7DA09)
        ->with('idLaudoWBPR_03B7DA08', $idLaudoWBPR_03B7DA08)->with('statusWBPR_03B7DA08', $statusWBPR_03B7DA08)
        ->with('idLaudoWTPR_03B7DA08', $idLaudoWTPR_03B7DA08)->with('statusWTPR_03B7DA08', $statusWTPR_03B7DA08)
        ->with('idLaudoWBAR_03B7DA08', $idLaudoWBAR_03B7DA08)->with('statusWBAR_03B7DA08', $statusWBAR_03B7DA08)
        ->with('idLaudoWTAR_03B7DA08', $idLaudoWTAR_03B7DA08)->with('statusWTAR_03B7DA08', $statusWTAR_03B7DA08)
        ->with('idLaudoFBCBAR_03B7DA07', $idLaudoFBCBAR_03B7DA07)->with('statusFBCBAR_03B7DA07', $statusFBCBAR_03B7DA07)
        ->with('idLaudoFBCBMR_03B7DA07', $idLaudoFBCBMR_03B7DA07)->with('statusFBCBMR_03B7DA07', $statusFBCBMR_03B7DA07)
        ->with('idLaudoFBCBPR_03B7DA07', $idLaudoFBCBPR_03B7DA07)->with('statusFBCBPR_03B7DA07', $statusFBCBPR_03B7DA07)
        ->with('idLaudoFQR_03B7DA07', $idLaudoFQR_03B7DA07)->with('statusFQR_03B7DA07', $statusFQR_03B7DA07)
        ->with('idLaudoFBCTAR_03B7DA06', $idLaudoFBCTAR_03B7DA06)->with('statusFBCTAR_03B7DA06', $statusFBCTAR_03B7DA06)
        ->with('idLaudoFBCTMR_03B7DA06', $idLaudoFBCTMR_03B7DA06)->with('statusFBCTMR_03B7DA06', $statusFBCTMR_03B7DA06)
        ->with('idLaudoFBCTPR_03B7DA06', $idLaudoFBCTPR_03B7DA06)->with('statusFBCTPR_03B7DA06', $statusFBCTPR_03B7DA06)
        ->with('idLaudoFA2CAR_03B7DA05', $idLaudoFA2CAR_03B7DA05)->with('statusFA2CAR_03B7DA05', $statusFA2CAR_03B7DA05)
        ->with('idLaudoFA2CMR_03B7DA05', $idLaudoFA2CMR_03B7DA05)->with('statusFA2CMR_03B7DA05', $statusFA2CMR_03B7DA05)
        ->with('idLaudoFA2CPR_03B7DA05', $idLaudoFA2CPR_03B7DA05)->with('statusFA2CPR_03B7DA05', $statusFA2CPR_03B7DA05)
        ->with('idLaudoFA1CAR_03B7DA04', $idLaudoFA1CAR_03B7DA04)->with('statusFA1CAR_03B7DA04', $statusFA1CAR_03B7DA04)
        ->with('idLaudoFA1CMR_03B7DA04', $idLaudoFA1CMR_03B7DA04)->with('statusFA1CMR_03B7DA04', $statusFA1CMR_03B7DA04)
        ->with('idLaudoFA1CPR_03B7DA04', $idLaudoFA1CPR_03B7DA04)->with('statusFA1CPR_03B7DA04', $statusFA1CPR_03B7DA04)
        ->with('idLaudoRE_1_BACK_UP', $idLaudoRE_1_BACK_UP)->with('statusRE_1_BACK_UP', $statusRE_1_BACK_UP)
        ->with('idLaudoRE_2_BACK_UP', $idLaudoRE_2_BACK_UP)->with('statusRE_2_BACK_UP', $statusRE_2_BACK_UP)
        ->with('idLaudoRE_3_BACK_UP', $idLaudoRE_3_BACK_UP)->with('statusRE_3_BACK_UP', $statusRE_3_BACK_UP)
        ->with('idLaudoRE_4_BACK_UP', $idLaudoRE_4_BACK_UP)->with('statusRE_4_BACK_UP', $statusRE_4_BACK_UP)
        ->with('idLaudoRA_N4_CENTRAL', $idLaudoRA_N4_CENTRAL)->with('statusRA_N4_CENTRAL', $statusRA_N4_CENTRAL)
        ->with('idLaudoRA_N4_SUPERIOR', $idLaudoRA_N4_SUPERIOR)->with('statusRA_N4_SUPERIOR', $statusRA_N4_SUPERIOR)
        ->with('idLaudoRA_N5_INF', $idLaudoRA_N5_INF)->with('statusRA_N5_INF', $statusRA_N5_INF)
        ->with('idLaudoRA_N5_SUPER', $idLaudoRA_N5_SUPER)->with('statusRA_N5_SUPER', $statusRA_N5_SUPER)
        ->with('idLaudoRA_N3_INF', $idLaudoRA_N3_INF)->with('statusRA_N3_INF', $statusRA_N3_INF)
        ->with('idLaudoRA_N3_SUPER', $idLaudoRA_N3_SUPER)->with('statusRA_N3_SUPER', $statusRA_N3_SUPER)
        ->with('idLaudoRA_N4_INF', $idLaudoRA_N4_INF)->with('statusRA_N4_INF', $statusRA_N4_INF)
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

    public function pintura_paineis_emergencia() {
      //03B7AD14 - PAINEL DE EMERGÊNCIA
      $tag_PE_03B7AD14 = "TE 72 500 510 736 000 - 000003";
      $idAtividadePE_03B7AD14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_03B7AD14)->value('id');
      $idAnalisePE_03B7AD14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_03B7AD14)->max('id');
      $idLaudoPE_03B7AD14 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_03B7AD14)->value('id');
      $statusPE_03B7AD14 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_03B7AD14)->value('status_id');
      //03B7AD15 - PAINEL DE EMERGÊNCIA
      $tag_PE_03B7AD15 = "TE 72 500 510 736 000 - 000004";
      $idAtividadePE_03B7AD15 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_03B7AD15)->value('id');
      $idAnalisePE_03B7AD15 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_03B7AD15)->max('id');
      $idLaudoPE_03B7AD15 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_03B7AD15)->value('id');
      $statusPE_03B7AD15 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_03B7AD15)->value('status_id');
      //03B7AD16 - PAINEL DE EMERGÊNCIA
      $tag_PE_03B7AD16 = "TE 72 500 510 736 000 - 000005";
      $idAtividadePE_03B7AD16 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_03B7AD16)->value('id');
      $idAnalisePE_03B7AD16 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_03B7AD16)->max('id');
      $idLaudoPE_03B7AD16 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_03B7AD16)->value('id');
      $statusPE_03B7AD16 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_03B7AD16)->value('status_id');
      //03B7AD17 - PAINEL DE EMERGÊNCIA
      $tag_PE_03B7AD17 = "TE 72 500 510 736 000 - 000006";
      $idAtividadePE_03B7AD17 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PE_03B7AD17)->value('id');
      $idAnalisePE_03B7AD17 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePE_03B7AD17)->max('id');
      $idLaudoPE_03B7AD17 = DB::table('laudos')->where('analise_id', '=', $idAnalisePE_03B7AD17)->value('id');
      $statusPE_03B7AD17 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePE_03B7AD17)->value('status_id');
      //03B7AD04 - PLC  -  EQUIPAMENTO NÃO CADASTRADO
      $tag_PLC_03B7AD04 = "TE 72 500 510 736 000 - 000002";
      $idAtividadePLC_03B7AD04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PLC_03B7AD04)->value('id');
      $idAnalisePLC_03B7AD04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLC_03B7AD04)->max('id');
      $idLaudoPLC_03B7AD04 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLC_03B7AD04)->value('id');
      $statusPLC_03B7AD04 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLC_03B7AD04)->value('status_id');
      //03B7AD01 - PLC  -  EQUIPAMENTO NÃO CADASTRADO
      $tag_PLC_03B7AD01 = "TE 72 500 510 736 000 - 000001";
      $idAtividadePLC_03B7AD01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PLC_03B7AD01)->value('id');
      $idAnalisePLC_03B7AD01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLC_03B7AD01)->max('id');
      $idLaudoPLC_03B7AD01 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLC_03B7AD01)->value('id');
      $statusPLC_03B7AD01 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLC_03B7AD01)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pintura_paineis_emergencia')
        ->with('idLaudoPE_03B7AD14', $idLaudoPE_03B7AD14)->with('statusPE_03B7AD14', $statusPE_03B7AD14)
        ->with('idLaudoPE_03B7AD15', $idLaudoPE_03B7AD15)->with('statusPE_03B7AD15', $statusPE_03B7AD15)
        ->with('idLaudoPE_03B7AD16', $idLaudoPE_03B7AD16)->with('statusPE_03B7AD16', $statusPE_03B7AD16)
        ->with('idLaudoPE_03B7AD17', $idLaudoPE_03B7AD17)->with('statusPE_03B7AD17', $statusPE_03B7AD17)
        ->with('idLaudoPLC_03B7AD04', $idLaudoPLC_03B7AD04)->with('statusPLC_03B7AD04', $statusPLC_03B7AD04)
        ->with('idLaudoPLC_03B7AD01', $idLaudoPLC_03B7AD01)->with('statusPLC_03B7AD01', $statusPLC_03B7AD01)
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

    public function pintura_paineis_ccm() {
      //03B5BC01 - ALIMENTAÇÃO
      $tag_ALIMENTACAO = "TE 72 500 510 736 000 - 000009";
      $idAtividadeALIMENTACAO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIMENTACAO)->value('id');
      $idAnaliseALIMENTACAO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIMENTACAO)->max('id');
      $idLaudoALIMENTACAO = DB::table('laudos')->where('analise_id', '=', $idAnaliseALIMENTACAO)->value('id');
      $statusALIMENTACAO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseALIMENTACAO)->value('status_id');
      //VVF STRIP DRIVERS
      $tag_VVF_SD = "TE 72 500 510 736 000 - 000008";
      $idAtividadeVVF_SD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_VVF_SD)->value('id');
      $idAnaliseVVF_SD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeVVF_SD)->max('id');
      $idLaudoVVF_SD = DB::table('laudos')->where('analise_id', '=', $idAnaliseVVF_SD)->value('id');
      $statusVVF_SD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseVVF_SD)->value('status_id');
      //SOPRADOR #1 - ESTUFA PRIMER ZONA #4
      $tag_S1_EP_ZONA_4 = "TE 72 500 510 736 000 - 000020";
      $idAtividadeS1_EP_ZONA_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EP_ZONA_4)->value('id');
      $idAnaliseS1_EP_ZONA_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EP_ZONA_4)->max('id');
      $idLaudoS1_EP_ZONA_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EP_ZONA_4)->value('id');
      $statusS1_EP_ZONA_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EP_ZONA_4)->value('status_id');
      //SOPRADOR #2 - ESTUFA PRIMER ZONA #4
      $tag_S2_EP_Z_4 = "TE 72 500 510 736 000 - 000016";
      $idAtividadeS2_EP_Z_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EP_Z_4)->value('id');
      $idAnaliseS2_EP_Z_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EP_Z_4)->max('id');
      $idLaudoS2_EP_Z_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EP_Z_4)->value('id');
      $statusS2_EP_Z_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EP_Z_4)->value('status_id');
      //SOPRADOR #1 - ESTUFA PRIMER ZONA #3
      $tag_S1_EP_Z_3 = "TE 72 500 510 736 000 - 000019";
      $idAtividadeS1_EP_Z_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EP_Z_3)->value('id');
      $idAnaliseS1_EP_Z_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EP_Z_3)->max('id');
      $idLaudoS1_EP_Z_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EP_Z_3)->value('id');
      $statusS1_EP_Z_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EP_Z_3)->value('status_id');
      //SOPRADOR #2 - ESTUFA PRIMER ZONA #3
      $tag_S2_EP_Z_3 = "TE 72 500 510 736 000 - 000015";
      $idAtividadeS2_EP_Z_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EP_Z_3)->value('id');
      $idAnaliseS2_EP_Z_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EP_Z_3)->max('id');
      $idLaudoS2_EP_Z_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EP_Z_3)->value('id');
      $statusS2_EP_Z_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EP_Z_3)->value('status_id');
      //SOPRADOR #2 - ESTUFA FISNISH ZONA #4
      $tag_S2_EF_Z_4 = "TE 72 500 510 736 000 - 000024";
      $idAtividadeS2_EF_Z_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EF_Z_4)->value('id');
      $idAnaliseS2_EF_Z_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EF_Z_4)->max('id');
      $idLaudoS2_EF_Z_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EF_Z_4)->value('id');
      $statusS2_EF_Z_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EF_Z_4)->value('status_id');
      //SOPRADOR #1 - ESTUFA FISNISH ZONA #4
      $tag_S1_EF_Z_4 = "TE 72 500 510 736 000 - 000028";
      $idAtividadeS1_EF_Z_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EF_Z_4)->value('id');
      $idAnaliseS1_EF_Z_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EF_Z_4)->max('id');
      $idLaudoS1_EF_Z_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EF_Z_4)->value('id');
      $statusS1_EF_Z_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EF_Z_4)->value('status_id');
      //SOPRADOR #1 - ESTUFA PRIMER ZONA #2
      $tag_S1_EP_Z_2 = "TE 72 500 510 736 000 - 000018";
      $idAtividadeS1_EP_Z_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EP_Z_2)->value('id');
      $idAnaliseS1_EP_Z_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EP_Z_2)->max('id');
      $idLaudoS1_EP_Z_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EP_Z_2)->value('id');
      $statusS1_EP_Z_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EP_Z_2)->value('status_id');
      //SOPRADOR #2 - ESTUFA PRIMER ZONA #2
      $tag_S2_EP_Z_2 = "TE 72 500 510 736 000 - 000014";
      $idAtividadeS2_EP_Z_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EP_Z_2)->value('id');
      $idAnaliseS2_EP_Z_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EP_Z_2)->max('id');
      $idLaudoS2_EP_Z_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EP_Z_2)->value('id');
      $statusS2_EP_Z_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EP_Z_2)->value('status_id');
      //SOPRADOR #2 - ESTUFA FISNISH ZONA #3
      $tag_S2_EF_Z_3 = "TE 72 500 510 736 000 - 000023";
      $idAtividadeS2_EF_Z_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EF_Z_3)->value('id');
      $idAnaliseS2_EF_Z_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EF_Z_3)->max('id');
      $idLaudoS2_EF_Z_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EF_Z_3)->value('id');
      $statusS2_EF_Z_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EF_Z_3)->value('status_id');
      //SOPRADOR #1 - ESTUFA FISNISH ZONA #3
      $tag_S1_EF_Z_3 = "TE 72 500 510 736 000 - 000027";
      $idAtividadeS1_EF_Z_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EF_Z_3)->value('id');
      $idAnaliseS1_EF_Z_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EF_Z_3)->max('id');
      $idLaudoS1_EF_Z_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EF_Z_3)->value('id');
      $statusS1_EF_Z_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EF_Z_3)->value('status_id');
      //SOPRADOR #1 - ESTUFA PRIMER ZONA #1
      $tag_S1_EP_Z_1 = "TE 72 500 510 736 000 - 000017";
      $idAtividadeS1_EP_Z_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EP_Z_1)->value('id');
      $idAnaliseS1_EP_Z_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EP_Z_1)->max('id');
      $idLaudoS1_EP_Z_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EP_Z_1)->value('id');
      $statusS1_EP_Z_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EP_Z_1)->value('status_id');
      //SOPRADOR #2 - ESTUFA PRIMER ZONA #1
      $tag_S2_EP_Z_1 = "TE 72 500 510 736 000 - 000013";
      $idAtividadeS2_EP_Z_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EP_Z_1)->value('id');
      $idAnaliseS2_EP_Z_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EP_Z_1)->max('id');
      $idLaudoS2_EP_Z_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EP_Z_1)->value('id');
      $statusS2_EP_Z_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EP_Z_1)->value('status_id');
      //SOPRADOR #2 - ESTUFA FISNISH ZONA #2
      $tag_S2_EF_Z_2 = "TE 72 500 510 736 000 - 000022";
      $idAtividadeS2_EF_Z_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S2_EF_Z_2)->value('id');
      $idAnaliseS2_EF_Z_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS2_EF_Z_2)->max('id');
      $idLaudoS2_EF_Z_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EF_Z_2)->value('id');
      $statusS2_EF_Z_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EF_Z_2)->value('status_id');
      //SOPRADOR #1 - ESTUFA FISNISH ZONA #2
      $tag_S1_EF_Z_2 = "TE 72 500 510 736 000 - 000026";
      $idAtividadeS1_EF_Z_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EF_Z_2)->value('id');
      $idAnaliseS1_EF_Z_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EF_Z_2)->max('id');
      $idLaudoS1_EF_Z_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EF_Z_2)->value('id');
      $statusS1_EF_Z_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EF_Z_2)->value('status_id');
      //ALIMENTAÇÃO PARA UPS
      $tag_ALIM_UPS = "TE 72 500 510 736 000 - 000029";
      $idAtividadeALIM_UPS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ALIM_UPS)->value('id');
      $idAnaliseALIM_UPS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeALIM_UPS)->max('id');
      $idLaudoALIM_UPS = DB::table('laudos')->where('analise_id', '=', $idAnaliseALIM_UPS)->value('id');
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
      $idLaudoS2_EF_Z_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS2_EF_Z_1)->value('id');
      $statusS2_EF_Z_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS2_EF_Z_1)->value('status_id');
      //SOPRADOR #1 - ESTUFA FISNISH ZONA #1
      $tag_S1_EF_Z_1 = "TE 72 500 510 736 000 - 000025";
      $idAtividadeS1_EF_Z_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_S1_EF_Z_1)->value('id');
      $idAnaliseS1_EF_Z_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeS1_EF_Z_1)->max('id');
      $idLaudoS1_EF_Z_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseS1_EF_Z_1)->value('id');
      $statusS1_EF_Z_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseS1_EF_Z_1)->value('status_id');
      //CHILLER SYSTEM
      $tag_CHILLER_SYS = "TE 72 500 510 736 000 - 000096";
      $idAtividadeCHILLER_SYS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CHILLER_SYS)->value('id');
      $idAnaliseCHILLER_SYS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCHILLER_SYS)->max('id');
      $idLaudoCHILLER_SYS = DB::table('laudos')->where('analise_id', '=', $idAnaliseCHILLER_SYS)->value('id');
      $statusCHILLER_SYS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCHILLER_SYS)->value('status_id');
      //SOPRADOR #1  -  EQUIPAMENTO NÃO CADASTRADO
      $tag_SOPRADOR_1 = "TE 72 500 510 736 000 - 000092";
      $idAtividadeSOPRADOR_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_SOPRADOR_1)->value('id');
      $idAnaliseSOPRADOR_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSOPRADOR_1)->max('id');
      $idLaudoSOPRADOR_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSOPRADOR_1)->value('id');
      $statusSOPRADOR_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSOPRADOR_1)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pintura_paineis_ccm')
        ->with('idLaudoALIMENTACAO', $idLaudoALIMENTACAO)->with('statusALIMENTACAO', $statusALIMENTACAO)
        ->with('idLaudoVVF_SD', $idLaudoVVF_SD)->with('statusVVF_SD', $statusVVF_SD)
        ->with('idLaudoS1_EP_ZONA_4', $idLaudoS1_EP_ZONA_4)->with('statusS1_EP_ZONA_4', $statusS1_EP_ZONA_4)
        ->with('idLaudoS2_EP_Z_4', $idLaudoS2_EP_Z_4)->with('statusS2_EP_Z_4', $statusS2_EP_Z_4)
        ->with('idLaudoS1_EP_Z_3', $idLaudoS1_EP_Z_3)->with('statusS1_EP_Z_3', $statusS1_EP_Z_3)
        ->with('idLaudoS2_EP_Z_3', $idLaudoS2_EP_Z_3)->with('statusS2_EP_Z_3', $statusS2_EP_Z_3)
        ->with('idLaudoS2_EF_Z_4', $idLaudoS2_EF_Z_4)->with('statusS2_EF_Z_4', $statusS2_EF_Z_4)
        ->with('idAnaliseS1_EF_Z_4', $idAnaliseS1_EF_Z_4)->with('statusS1_EF_Z_4', $statusS1_EF_Z_4)
        ->with('idLaudoS1_EP_Z_2', $idLaudoS1_EP_Z_2)->with('statusS1_EP_Z_2', $statusS1_EP_Z_2)
        ->with('idLaudoS2_EP_Z_2', $idLaudoS2_EP_Z_2)->with('statusS2_EP_Z_2', $statusS2_EP_Z_2)
        ->with('idLaudoS2_EF_Z_3', $idLaudoS2_EF_Z_3)->with('statusS2_EF_Z_3', $statusS2_EF_Z_3)
        ->with('idLaudoS1_EF_Z_3', $idLaudoS1_EF_Z_3)->with('statusS1_EF_Z_3', $statusS1_EF_Z_3)
        ->with('idLaudoS1_EP_Z_1', $idLaudoS1_EP_Z_1)->with('statusS1_EP_Z_1', $statusS1_EP_Z_1)
        ->with('idLaudoS2_EP_Z_1', $idLaudoS2_EP_Z_1)->with('statusS2_EP_Z_1', $statusS2_EP_Z_1)
        ->with('idLaudoS2_EF_Z_2', $idLaudoS2_EF_Z_2)->with('statusS2_EF_Z_2', $statusS2_EF_Z_2)
        ->with('idLaudoS1_EF_Z_2', $idLaudoS1_EF_Z_2)->with('statusS1_EF_Z_2', $statusS1_EF_Z_2)
        ->with('idLaudoALIM_UPS', $idLaudoALIM_UPS)->with('statusALIM_UPS', $statusALIM_UPS)
        ->with('idLaudoBD15C', $idLaudoBD15C)->with('statusBD15C', $statusBD15C)
        ->with('idLaudoS2_EF_Z_1', $idLaudoS2_EF_Z_1)->with('statusS2_EF_Z_1', $statusS2_EF_Z_1)
        ->with('idLaudoS1_EF_Z_1', $idLaudoS1_EF_Z_1)->with('statusS1_EF_Z_1', $statusS1_EF_Z_1)
        ->with('idLaudoCHILLER_SYS', $idLaudoCHILLER_SYS)->with('statusCHILLER_SYS', $statusCHILLER_SYS)
        ->with('idLaudoSOPRADOR_1', $idLaudoSOPRADOR_1)->with('statusSOPRADOR_1', $statusSOPRADOR_1)
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

    public function pintura_refratarios() {
        return view('csn.relatoriosTecnicos.termografia_pintura_refratarios');
    }
//--- CENTRO DE SERVIÇOS
    public function cs_LCL() {
      //A4A - PLC AND I/O
      $tag_A4A_PLC_IO = "TE 72 600 610 131 000 - 000001";
      $idAtividadeA4A_PLC_IO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A4A_PLC_IO)->value('id');
      $idAnaliseA4A_PLC_IO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA4A_PLC_IO)->max('id');
      $idLaudoA4A_PLC_IO = DB::table('laudos')->where('analise_id', '=', $idAnaliseA4A_PLC_IO)->value('id');
      $statusA4A_PLC_IO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA4A_PLC_IO)->value('status_id');
      //A4B - AC MOTOR STARTER  -  EQUIPAMENTO NÃO CADASTRADO
      $tag_A4B_AC_MS = "TE 72 600 610 131 000 - 000002";
      $idAtividadeA4B_AC_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A4B_AC_MS)->value('id');
      $idAnaliseA4B_AC_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA4B_AC_MS)->max('id');
      $idLaudoA4B_AC_MS = DB::table('laudos')->where('analise_id', '=', $idAnaliseA4B_AC_MS)->value('id');
      $statusA4B_AC_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA4B_AC_MS)->value('status_id');
      //A1A - UNCOILER (DESENROLADEIRA)
      $tag_A1A_DESENROLADEIRA = "TE 72 600 610 131 000 - 000003";
      $idAtividadeA1A_DESENROLADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A1A_DESENROLADEIRA)->value('id');
      $idAnaliseA1A_DESENROLADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA1A_DESENROLADEIRA)->max('id');
      $idLaudoA1A_DESENROLADEIRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseA1A_DESENROLADEIRA)->value('id');
      $statusA1A_DESENROLADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA1A_DESENROLADEIRA)->value('status_id');
      //A1B - SLITTER EMBOSSER
      $tag_A1B_SE = "TE 72 600 610 131 000 - 000004";
      $idAtividadeA1B_SE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A1B_SE)->value('id');
      $idAnaliseA1B_SE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA1B_SE)->max('id');
      $idLaudoA1B_SE = DB::table('laudos')->where('analise_id', '=', $idAnaliseA1B_SE)->value('id');
      $statusA1B_SE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA1B_SE)->value('status_id');
      //A2B - UPPER TENSION
      $tag_A2B_UT = "TE 72 600 610 131 000 - 000006";
      $idAtividadeA2B_UT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A2B_UT)->value('id');
      $idAnaliseA2B_UT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA2B_UT)->max('id');
      $idLaudoA2B_UT = DB::table('laudos')->where('analise_id', '=', $idAnaliseA2B_UT)->value('id');
      $statusA2B_UT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA2B_UT)->value('status_id');
      //A2C - LOWER TENSION ROLL
      $tag_A2C_LTR = "TE 72 600 610 131 000 - 000007";
      $idAtividadeA2C_LTR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A2C_LTR)->value('id');
      $idAnaliseA2C_LTR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA2C_LTR)->max('id');
      $idLaudoA2C_LTR = DB::table('laudos')->where('analise_id', '=', $idAnaliseA2C_LTR)->value('id');
      $statusA2C_LTR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA2C_LTR)->value('status_id');
      //A3A - RECOILER (ENROLADEIRA)
      $tag_A3A_ENROLADEIRA = "TE 72 600 610 131 000 - 000008";
      $idAtividadeA3A_ENROLADEIRA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A3A_ENROLADEIRA)->value('id');
      $idAnaliseA3A_ENROLADEIRA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA3A_ENROLADEIRA)->max('id');
      $idLaudoA3A_ENROLADEIRA = DB::table('laudos')->where('analise_id', '=', $idAnaliseA3A_ENROLADEIRA)->value('id');
      $statusA3A_ENROLADEIRA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA3A_ENROLADEIRA)->value('status_id');
      //A3B - AUTOTRANSFORMER AND DISCONNECT
      $tag_A3B_AUTO_DISCO = "TE 72 600 610 131 000 - 000009";
      $idAtividadeA3B_AUTO_DISCO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A3B_AUTO_DISCO)->value('id');
      $idAnaliseA3B_AUTO_DISCO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA3B_AUTO_DISCO)->max('id');
      $idLaudoA3B_AUTO_DISCO = DB::table('laudos')->where('analise_id', '=', $idAnaliseA3B_AUTO_DISCO)->value('id');
      $statusA3B_AUTO_DISCO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA3B_AUTO_DISCO)->value('status_id');
      //A3C - REGEN RECTIFIER (RETIFICADOR)
      $tag_A3C_RR_RETIF = "TE 72 600 610 131 000 - 000010";
      $idAtividadeA3C_RR_RETIF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A3C_RR_RETIF)->value('id');
      $idAnaliseA3C_RR_RETIF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA3C_RR_RETIF)->max('id');
      $idLaudoA3C_RR_RETIF = DB::table('laudos')->where('analise_id', '=', $idAnaliseA3C_RR_RETIF)->value('id');
      $statusA3C_RR_RETIF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA3C_RR_RETIF)->value('status_id');
      //A3D - INCOMMING CELL  -  EQUIPAMENTO NÃO CADASTRADO
      $tag_A3D_INCOM_CELL = "TE 72 600 610 131 000 - 000011";
      $idAtividadeA3D_INCOM_CELL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_A3D_INCOM_CELL)->value('id');
      $idAnaliseA3D_INCOM_CELL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeA3D_INCOM_CELL)->max('id');
      $idLaudoA3D_INCOM_CELL = DB::table('laudos')->where('analise_id', '=', $idAnaliseA3D_INCOM_CELL)->value('id');
      $statusA3D_INCOM_CELL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseA3D_INCOM_CELL)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_cs_LCL')
        ->with('idLaudoA4A_PLC_IO', $idLaudoA4A_PLC_IO)->with('statusA4A_PLC_IO', $statusA4A_PLC_IO)
        ->with('idLaudoA4B_AC_MS', $idLaudoA4B_AC_MS)->with('statusA4B_AC_MS', $statusA4B_AC_MS)
        ->with('idLaudoA1A_DESENROLADEIRA', $idLaudoA1A_DESENROLADEIRA)->with('statusA1A_DESENROLADEIRA', $statusA1A_DESENROLADEIRA)
        ->with('idLaudoA1B_SE', $idLaudoA1B_SE)->with('statusA1B_SE', $statusA1B_SE)
        ->with('idLaudoA2B_UT', $idLaudoA2B_UT)->with('statusA2B_UT', $statusA2B_UT)
        ->with('idLaudoA2C_LTR', $idLaudoA2C_LTR)->with('statusA2C_LTR', $statusA2C_LTR)
        ->with('idLaudoA3A_ENROLADEIRA', $idLaudoA3A_ENROLADEIRA)->with('statusA3A_ENROLADEIRA', $statusA3A_ENROLADEIRA)
        ->with('idLaudoA3B_AUTO_DISCO', $idLaudoA3B_AUTO_DISCO)->with('statusA3B_AUTO_DISCO', $statusA3B_AUTO_DISCO)
        ->with('idLaudoA3C_RR_RETIF', $idLaudoA3C_RR_RETIF)->with('statusA3C_RR_RETIF', $statusA3C_RR_RETIF)
        ->with('idLaudoA3D_INCOM_CELL', $idLaudoA3D_INCOM_CELL)->with('statusA3D_INCOM_CELL', $statusA3D_INCOM_CELL)
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

    public function cs_LCT1() {
      //B1A - INCOMMING CELL
      $tag_B1A_INC_CELL = "TE 72 600 620 105 000 - 000001";
      $idAtividadeB1A_INC_CELL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1A_INC_CELL)->value('id');
      $idAnaliseB1A_INC_CELL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1A_INC_CELL)->max('id');
      $idLaudoB1A_INC_CELL = DB::table('laudos')->where('analise_id', '=', $idAnaliseB1A_INC_CELL)->value('id');
      $statusB1A_INC_CELL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1A_INC_CELL)->value('status_id');
      //B1B - RECTIFIER
      $tag_B1B_RECT = "TE 72 600 620 105 000 - 000002";
      $idAtividadeB1B_RECT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1B_RECT)->value('id');
      $idAnaliseB1B_RECT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1B_RECT)->max('id');
      $idLaudoB1B_RECT = DB::table('laudos')->where('analise_id', '=', $idAnaliseB1B_RECT)->value('id');
      $statusB1B_RECT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1B_RECT)->value('status_id');
      //B1C - EVELLER / FEED ROLL
      $tag_B1C_EVER_FR = "TE 72 600 620 105 000 - 000003";
      $idAtividadeB1C_EVER_FR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1C_EVER_FR)->value('id');
      $idAnaliseB1C_EVER_FR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1C_EVER_FR)->max('id');
      $idLaudoB1C_EVER_FR = DB::table('laudos')->where('analise_id', '=', $idAnaliseB1C_EVER_FR)->value('id');
      $statusB1C_EVER_FR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1C_EVER_FR)->value('status_id');
      //B1C - INSPECTION / REJECT/INFEED CONVEYOR
      $tag_B1C_INSP_RIC = "TE 72 600 620 105 000 - 000004";
      $idAtividadeB1C_INSP_RIC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B1C_INSP_RIC)->value('id');
      $idAnaliseB1C_INSP_RIC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB1C_INSP_RIC)->max('id');
      $idLaudoB1C_INSP_RIC = DB::table('laudos')->where('analise_id', '=', $idAnaliseB1C_INSP_RIC)->value('id');
      $statusB1C_INSP_RIC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB1C_INSP_RIC)->value('status_id');
      //B2A - AC MOTOR STARTER
      $tag_B2A_AC_MS = "TE 72 600 620 105 000 - 000005";
      $idAtividadeB2A_AC_MS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B2A_AC_MS)->value('id');
      $idAnaliseB2A_AC_MS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB2A_AC_MS)->max('id');
      $idLaudoB2A_AC_MS = DB::table('laudos')->where('analise_id', '=', $idAnaliseB2A_AC_MS)->value('id');
      $statusB2A_AC_MS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB2A_AC_MS)->value('status_id');
      //B2B - PLC AND I/O
      $tag_B2B_PLC_IO = "TE 72 600 620 105 000 - 000006";
      $idAtividadeB2B_PLC_IO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_B2B_PLC_IO)->value('id');
      $idAnaliseB2B_PLC_IO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeB2B_PLC_IO)->max('id');
      $idLaudoB2B_PLC_IO = DB::table('laudos')->where('analise_id', '=', $idAnaliseB2B_PLC_IO)->value('id');
      $statusB2B_PLC_IO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseB2B_PLC_IO)->value('status_id');
      //PAINEL DO EMPILHADOR - RITTAL (ENEW)
      $tag_PER = "TE 72 600 610 131 000 - 000010";
      $idAtividadePER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PER)->value('id');
      $idAnalisePER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePER)->max('id');
      $idLaudoPER = DB::table('laudos')->where('analise_id', '=', $idAnalisePER)->value('id');
      $statusPER = DB::table('preditiva_analises')->where('id', '=', $idAnalisePER)->value('status_id');

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


      return view('csn.relatoriosTecnicos.termografia_cs_LCT1')
      ->with('idLaudoB1A_INC_CELL', $idLaudoB1A_INC_CELL)->with('statusB1A_INC_CELL', $statusB1A_INC_CELL)
      ->with('idLaudoB1B_RECT', $idLaudoB1B_RECT)->with('statusB1B_RECT', $statusB1B_RECT)
      ->with('idLaudoB1C_EVER_FR', $idLaudoB1C_EVER_FR)->with('statusB1C_EVER_FR', $statusB1C_EVER_FR)
      ->with('idLaudoB1C_INSP_RIC', $idLaudoB1C_INSP_RIC)->with('statusB1C_INSP_RIC', $statusB1C_INSP_RIC)
      ->with('idLaudoB2A_AC_MS', $idLaudoB2A_AC_MS)->with('statusB2A_AC_MS', $statusB2A_AC_MS)
      ->with('idLaudoB2B_PLC_IO', $idLaudoB2B_PLC_IO)->with('statusB2B_PLC_IO', $statusB2B_PLC_IO)
      ->with('idLaudoPER', $idLaudoPER)->with('statusPER', $statusPER)
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

    public function cs_LCT2() {
      //PLC/ACIONAMENTOS - 03
      $tag_PLC_ACION_03 = "TE 72 600 621 171 000 - 000003";
      $idAtividadePLC_ACION_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PLC_ACION_03)->value('id');
      $idAnalisePLC_ACION_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLC_ACION_03)->max('id');
      $idLaudoPLC_ACION_03 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLC_ACION_03)->value('id');
      $statusPLC_ACION_03 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLC_ACION_03)->value('status_id');
      //PLC/ACIONAMENTOS - 24
      $tag_PLC_ACION_24 = "TE 72 600 621 171 000 - 000024";
      $idAtividadePLC_ACION_24 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PLC_ACION_24)->value('id');
      $idAnalisePLC_ACION_24 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePLC_ACION_24)->max('id');
      $idLaudoPLC_ACION_24 = DB::table('laudos')->where('analise_id', '=', $idAnalisePLC_ACION_24)->value('id');
      $statusPLC_ACION_24 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePLC_ACION_24)->value('status_id');
      //RETIFICADOR E INVERSOR - ROLO CICLICO
      $tag_RI_RC = "TE 72 600 621 171 000 - 000002";
      $idAtividadeRI_RC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_RC)->value('id');
      $idAnaliseRI_RC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_RC)->max('id');
      $idLaudoRI_RC = DB::table('laudos')->where('analise_id', '=', $idAnaliseRI_RC)->value('id');
      $statusRI_RC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_RC)->value('status_id');
      //RETIFICADOR E INVERSOR - SLITTER
      $tag_RI_SLITTER = "TE 72 600 621 171 000 - 000010";
      $idAtividadeRI_SLITTER = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_SLITTER)->value('id');
      $idAnaliseRI_SLITTER = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_SLITTER)->max('id');
      $idLaudoRI_SLITTER = DB::table('laudos')->where('analise_id', '=', $idAnaliseRI_SLITTER)->value('id');
      $statusRI_SLITTER = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_SLITTER)->value('status_id');
      //RETIFICADOR E INVERSOR - APLANADORA
      $tag_RI_APLANADORA = "TE 72 600 621 171 000 - 000012";
      $idAtividadeRI_APLANADORA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_APLANADORA)->value('id');
      $idAnaliseRI_APLANADORA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_APLANADORA)->max('id');
      $idLaudoRI_APLANADORA = DB::table('laudos')->where('analise_id', '=', $idAnaliseRI_APLANADORA)->value('id');
      $statusRI_APLANADORA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_APLANADORA)->value('status_id');
      //RETIFICADOR E INVERSOR - RECOLHEDOR DE APARAS
      $tag_RI_RA = "TE 72 600 621 171 000 - 000014";
      $idAtividadeRI_RA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_RA)->value('id');
      $idAnaliseRI_RA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_RA)->max('id');
      $idLaudoRI_RA = DB::table('laudos')->where('analise_id', '=', $idAnaliseRI_RA)->value('id');
      $statusRI_RA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_RA)->value('status_id');
      //RETIFICADOR E INVERSOR - 09A01
      $tag_RI_09A01 = "TE 72 600 621 171 000 - 000016";
      $idAtividadeRI_09A01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RI_09A01)->value('id');
      $idAnaliseRI_09A01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRI_09A01)->max('id');
      $idLaudoRI_09A01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseRI_09A01)->value('id');
      $statusRI_09A01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRI_09A01)->value('status_id');
      //INVERSORES E CONTATOR PRINCIPAL
      $tag_ICP = "TE 72 600 621 171 000 - 000001";
      $idAtividadeICP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ICP)->value('id');
      $idAnaliseICP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeICP)->max('id');
      $idLaudoICP = DB::table('laudos')->where('analise_id', '=', $idAnaliseICP)->value('id');
      $statusICP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseICP)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_cs_LCT2')
        ->with('idLaudoPLC_ACION_03', $idLaudoPLC_ACION_03)->with('statusPLC_ACION_03', $statusPLC_ACION_03)
        ->with('idLaudoPLC_ACION_24', $idLaudoPLC_ACION_24)->with('statusPLC_ACION_24', $statusPLC_ACION_24)
        ->with('idLaudoRI_RC', $idLaudoRI_RC)->with('statusRI_RC', $statusRI_RC)
        ->with('idLaudoRI_SLITTER', $idLaudoRI_SLITTER)->with('statusRI_SLITTER', $statusRI_SLITTER)
        ->with('idLaudoRI_APLANADORA', $idLaudoRI_APLANADORA)->with('statusRI_APLANADORA', $statusRI_APLANADORA)
        ->with('idLaudoRI_RA', $idLaudoRI_RA)->with('statusRI_RA', $statusRI_RA)
        ->with('idLaudoRI_09A01', $idLaudoRI_09A01)->with('statusRI_09A01', $statusRI_09A01)
        ->with('idLaudoICP', $idLaudoICP)->with('statusICP', $statusICP)
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

    public function cs_LCC() {
      //INVERSOR 29A02
      $tag_INV_29A02 = "TE 72 600 640 223 000 - 000017";
      $idAtividadeINV_29A02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_INV_29A02)->value('id');
      $idAnaliseINV_29A02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeINV_29A02)->max('id');
      $idLaudoINV_29A02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseINV_29A02)->value('id');
      $statusINV_29A02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseINV_29A02)->value('status_id');
      //ROLO APLICADOR FILME
      $tag_RAF = "TE 72 600 640 223 000 - 000015";
      $idAtividadeRAF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RAF)->value('id');
      $idAnaliseRAF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRAF)->max('id');
      $idLaudoRAF = DB::table('laudos')->where('analise_id', '=', $idAnaliseRAF)->value('id');
      $statusRAF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRAF)->value('status_id');
      //INVERSOR 30A01
      $tag_INV_30A01 = "TE 72 600 640 223 000 - 000013";
      $idAtividadeINV_30A01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_INV_30A01)->value('id');
      $idAnaliseINV_30A01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeINV_30A01)->max('id');
      $idLaudoINV_30A01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseINV_30A01)->value('id');
      $statusINV_30A01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseINV_30A01)->value('status_id');
      //ENROLADOR DE REFILE
      $tag_ENR_REF = "TE 72 600 640 223 000 - 000011";
      $idAtividadeENR_REF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_ENR_REF)->value('id');
      $idAnaliseENR_REF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR_REF)->max('id');
      $idLaudoENR_REF = DB::table('laudos')->where('analise_id', '=', $idAnaliseENR_REF)->value('id');
      $statusENR_REF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR_REF)->value('status_id');
      //ROLO CICLICO
      $tag_RC = "TE 72 600 640 223 000 - 000009";
      $idAtividadeRC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_RC)->value('id');
      $idAnaliseRC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRC)->max('id');
      $idLaudoRC = DB::table('laudos')->where('analise_id', '=', $idAnaliseRC)->value('id');
      $statusRC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRC)->value('status_id');
      //TESOURA MECÂNICA
      $tag_TES_MEC = "TE 72 600 640 223 000 - 000007";
      $idAtividadeTES_MEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TES_MEC)->value('id');
      $idAnaliseTES_MEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_MEC)->max('id');
      $idLaudoTES_MEC = DB::table('laudos')->where('analise_id', '=', $idAnaliseTES_MEC)->value('id');
      $statusTES_MEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_MEC)->value('status_id');
      //DESEMPENADEIRA  -  EQUIPAMENTO NÃO CADASTRADO
      $tag_DES = "TE 72 600 640 223 000 - 000002";
      $idAtividadeDES = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DES)->value('id');
      $idAnaliseDES = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDES)->max('id');
      $idLaudoDES = DB::table('laudos')->where('analise_id', '=', $idAnaliseDES)->value('id');
      $statusDES = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDES)->value('status_id');
      //LCC 1 - PAINEL DE FORÇA
      $tag_PF = "TE 72 600 640 223 000 - 000001";
      $idAtividadePF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF)->value('id');
      $idAnalisePF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF)->max('id');
      $idLaudoPF = DB::table('laudos')->where('analise_id', '=', $idAnalisePF)->value('id');
      $statusPF = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF)->value('status_id');
      //PAINEL K67 - EMPILHADOR
      $tag_PK67 = "TE 72 600 640 221 000 - 000001";
      $idAtividadePK67 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PK67)->value('id');
      $idAnalisePK67 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePK67)->max('id');
      $idLaudoPK67 = DB::table('laudos')->where('analise_id', '=', $idAnalisePK67)->value('id');
      $statusPK67 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePK67)->value('status_id');
      //QGBT
      $tag_QGBT = "TE 72 600 640 223 000 - 000003";
      $idAtividadeQGBT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_QGBT)->value('id');
      $idAnaliseQGBT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeQGBT)->max('id');
      $idLaudoQGBT = DB::table('laudos')->where('analise_id', '=', $idAnaliseQGBT)->value('id');
      $statusQGBT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseQGBT)->value('status_id');


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


        return view('csn.relatoriosTecnicos.termografia_cs_LCC')
        ->with('idLaudoINV_29A02', $idLaudoINV_29A02)->with('statusINV_29A02', $statusINV_29A02)
        ->with('idLaudoRAF', $idLaudoRAF)->with('statusRAF', $statusRAF)
        ->with('idLaudoINV_30A01', $idLaudoINV_30A01)->with('statusINV_30A01', $statusINV_30A01)
        ->with('idLaudoENR_REF', $idLaudoENR_REF)->with('statusENR_REF', $statusENR_REF)
        ->with('idLaudoRC', $idLaudoRC)->with('statusRC', $statusRC)
        ->with('idLaudoTES_MEC', $idLaudoTES_MEC)->with('statusTES_MEC', $statusTES_MEC)
        ->with('idLaudoDES', $idLaudoDES)->with('statusDES', $statusDES)
        ->with('idLaudoPF', $idLaudoPF)->with('statusPF', $statusPF)
        ->with('idLaudoPK67', $idLaudoPK67)->with('statusPK67', $statusPK67)
        ->with('idLaudoQGBT', $idLaudoQGBT)->with('statusQGBT', $statusQGBT)
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

    //--- PONTES ROLANTES
    public function pr_pontes() {
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

        return view('csn.relatoriosTecnicos.termografia_pr_ponte')->with('ura_painel_1_status', $ura_painel_1_status)->with('ura_painel_2_status', $ura_painel_2_status)
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

    public function pr_pontes_pr5() {
      //FREIO CARRO
      $tag_FC = "TE 72 600 005 011 000 - 000002";
      $idAtividadeFC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FC)->value('id');
      $idAnaliseFC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFC)->max('id');
      $idLaudoFC = DB::table('laudos')->where('analise_id', '=', $idAnaliseFC)->value('id');
      $statusFC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFC)->value('status_id');
      //FREIO PONTE
      $tag_FP = "TE 72 600 005 007 000 - 000001";
      $idAtividadeFP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FP)->value('id');
      $idAnaliseFP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFP)->max('id');
      $idLaudoFP = DB::table('laudos')->where('analise_id', '=', $idAnaliseFP)->value('id');
      $statusFP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFP)->value('status_id');
      //FREIO ELEVAÇÃO
      $tag_FE = "TE 72 600 005 015 000 - 000001";
      $idAtividadeFE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_FE)->value('id');
      $idAnaliseFE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFE)->max('id');
      $idLaudoFE = DB::table('laudos')->where('analise_id', '=', $idAnaliseFE)->value('id');
      $statusFE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFE)->value('status_id');
      //PAINÉL DO INVERSOR
      $tag_PINV = "TE 72 600 005 007 000 - 000003";
      $idAtividadePINV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV)->value('id');
      $idAnalisePINV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV)->max('id');
      $idLaudoPINV = DB::table('laudos')->where('analise_id', '=', $idAnalisePINV)->value('id');
      $statusPINV = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV)->value('status_id');
      //CARRO
      $tag_CARRO = "TE 72 600 005 011 000 - 000001";
      $idAtividadeCARRO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CARRO)->value('id');
      $idAnaliseCARRO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO)->max('id');
      $idLaudoCARRO = DB::table('laudos')->where('analise_id', '=', $idAnaliseCARRO)->value('id');
      $statusCARRO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO)->value('status_id');
      //PAINEL DE COMANDO / INVERSOR
      $tag_PC_INV = "TE 72 600 005 015 000 - 000002";
      $idAtividadePC_INV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_INV)->value('id');
      $idAnalisePC_INV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_INV)->max('id');
      $idLaudoPC_INV = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_INV)->value('id');
      $statusPC_INV = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_INV)->value('status_id');
      //PAINÉL DOS RELÉS
      $tag_PR = "TE 72 600 005 015 000 - 000003";
      $idAtividadePR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PR)->value('id');
      $idAnalisePR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR)->max('id');
      $idLaudoPR = DB::table('laudos')->where('analise_id', '=', $idAnalisePR)->value('id');
      $statusPR = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR)->value('status_id');
      //PAINEL DE COMANDO - AUXILIARES
      $tag_PC_AUX = "TE 72 600 005 007 000 - 000002";
      $idAtividadePC_AUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_AUX)->value('id');
      $idAnalisePC_AUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_AUX)->max('id');
      $idLaudoPC_AUX = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_AUX)->value('id');
      $statusPC_AUX = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_AUX)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr5')
        ->with('idLaudoFC', $idLaudoFC)->with('statusFC', $statusFC)
        ->with('idLaudoFP', $idLaudoFP)->with('statusFP', $statusFP)
        ->with('idLaudoFE', $idLaudoFE)->with('statusFE', $statusFE)
        ->with('idLaudoPINV', $idLaudoPINV)->with('statusPINV', $statusPINV)
        ->with('idLaudoCARRO', $idLaudoCARRO)->with('statusCARRO', $statusCARRO)
        ->with('idLaudoPC_INV', $idLaudoPC_INV)->with('statusPC_INV', $statusPC_INV)
        ->with('idLaudoPR', $idLaudoPR)->with('statusPR', $statusPR)
        ->with('idLaudoPC_AUX', $idLaudoPC_AUX)->with('statusPC_AUX', $statusPC_AUX)
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

    public function pr_pontes_pr7() {
      //PAINEL DE COMANDO - 02
      $tag_PC_02 = "TE 72 600 005 007 000 - 000002";
      $idAtividadePC_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_02)->value('id');
      $idAnalisePC_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_02)->max('id');
      $idLaudoPC_02 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_02)->value('id');
      $statusPC_02 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_02)->value('status_id');
      //PAINEL DE FORÇA - 01
      $tag_PF_01 = "TE 72 500 007 011 000 - 000001";
      $idAtividadePF_01  = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_01)->value('id');
      $idAnalisePF_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_01 )->max('id');
      $idLaudoPF_01 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_01)->value('id');
      $statusPF_01 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_01)->value('status_id');
      //PAINEL DE COMANDO - 007
      $tag_PC_007 = "TE 72 500 007 007 000 - 000002";
      $idAtividadePC_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_007)->value('id');
      $idAnalisePC_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_007)->max('id');
      $idLaudoPC_007 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_007)->value('id');
      $statusPC_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_007)->value('status_id');
      //PAINEL DE FORÇA - 001
      $tag_PF_001 = "TE 72 500 007 007 000 - 000001";
      $idAtividadePF_001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_001)->value('id');
      $idAnalisePF_001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_001)->max('id');
      $idLaudoPF_001 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_001)->value('id');
      $statusPF_001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_001)->value('status_id');
      //PAINÉL DO INVERSOR - 03
      $tag_PINV_03 = "TE 72 500 007 007 000 - 000003";
      $idAtividadePINV_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_03)->value('id');
      $idAnalisePINV_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_03)->max('id');
      $idLaudoPINV_03 = DB::table('laudos')->where('analise_id', '=', $idAnalisePINV_03)->value('id');
      $statusPINV_03 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_03)->value('status_id');
      //PAINEL DE COMANDO - 002
      $tag_PC_002 = "TE 72 500 007 015 000 - 000002";
      $idAtividadePC_002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_002)->value('id');
      $idAnalisePC_002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_002)->max('id');
      $idLaudoPC_002 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_002)->value('id');
      $statusPC_002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_002)->value('status_id');
      //PAINEL DE FORÇA
      $tag_PF_00001 = "TE 72 500 007 015 000 - 000001";
      $idAtividadePF_00001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_00001)->value('id');
      $idAnalisePF_00001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_00001)->max('id');
      $idLaudoPF_00001 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_00001)->value('id');
      $statusPF_00001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_00001)->value('status_id');
      //PAINEL DO INVERSOR - 0002
      $tag_PINV_0002 = "TE 72 500 007 015 000 - 000002";
      $idAtividadePINV_0002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_0002)->value('id');
      $idAnalisePINV_0002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_0002)->max('id');
      $idLaudoPINV_0002 = DB::table('laudos')->where('analise_id', '=', $idAnalisePINV_0002)->value('id');
      $statusPINV_0002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_0002)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr7')
        ->with('idLaudoPC_02', $idLaudoPC_02)->with('statusPC_02', $statusPC_02)
        ->with('idLaudoPF_01', $idLaudoPF_01)->with('statusPF_01', $statusPF_01)
        ->with('idLaudoPC_007', $idLaudoPC_007)->with('statusPC_007', $statusPC_007)
        ->with('idLaudoPF_001', $idLaudoPF_001)->with('statusPF_001', $statusPF_001)
        ->with('idLaudoPINV_03', $idLaudoPINV_03)->with('statusPINV_03', $statusPINV_03)
        ->with('idLaudoPC_002', $idLaudoPC_002)->with('statusPC_002', $statusPC_002)
        ->with('idLaudoPF_00001', $idLaudoPF_00001)->with('statusPF_00001', $statusPF_00001)
        ->with('idLaudoPINV_0002', $idLaudoPINV_0002)->with('statusPINV_0002', $statusPINV_0002)
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

    public function pr_pontes_pr8() {
      //PAINEL DE COMANDO - 011
      $tag_PC_011 = "TE 72 400 008 011 000 - 000002";
      $idAtividadePC_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_011)->value('id');
      $idAnalisePC_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_011)->max('id');
      $idLaudoPC_011 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_011)->value('id');
      $statusPC_011 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_011)->value('status_id');
      //PAINEL DE FORÇA - 011
      $tag_PF_011 = "TE 72 400 008 011 000 - 000001";
      $idAtividadePF_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_011)->value('id');
      $idAnalisePF_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_011)->max('id');
      $idLaudoPF_011 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_011)->value('id');
      $statusPF_011 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_011)->value('status_id');
      //PAINEL INVERSOR
      $tag_PINV_0003 = "TE 72 400 008 011 000 - 000003";
      $idAtividadePINV_0003 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_0003)->value('id');
      $idAnalisePINV_0003 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_0003)->max('id');
      $idLaudoPINV_0003 = DB::table('laudos')->where('analise_id', '=', $idAnalisePINV_0003)->value('id');
      $statusPINV_0003 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_0003)->value('status_id');
      //PAINEL DE COMANDO
      $tag_PC_007_000002 = "TE 72 400 008 007 000 - 000002";
      $idAtividadePC_007_000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_007_000002)->value('id');
      $idAnalisePC_007_000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_007_000002)->max('id');
      $idLaudoPC_007_000002 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_007_000002)->value('id');
      $statusPC_007_000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_007_000002)->value('status_id');
      //PAINEL DE FORÇA
      $tag_PF_007_000001 = "TE 72 400 008 007 000 - 000001";
      $idAtividadePF_007_000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_007_000001)->value('id');
      $idAnalisePF_007_000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_007_000001)->max('id');
      $idLaudoPF_007_000001 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_007_000001)->value('id');
      $statusPF_007_000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_007_000001)->value('status_id');
      //PAINEL DE COMANDO
      $tag_PC_015_000002 = "TE 72 400 008 015 000 - 000002";
      $idAtividadePC_015_000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_015_000002)->value('id');
      $idAnalisePC_015_000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_015_000002)->max('id');
      $idLaudoPC_015_000002 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_015_000002)->value('id');
      $statusPC_015_000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_015_000002)->value('status_id');
      //PAINEL DE FORÇA
      $tag_PF_015_000001 = "TE 72 400 008 015 000 - 000001";
      $idAtividadePF_015_000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_015_000001)->value('id');
      $idAnalisePF_015_000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_015_000001)->max('id');
      $idLaudoPF_015_000001 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_015_000001)->value('id');
      $statusPF_015_000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_015_000001)->value('status_id');
      //CIRCUITO AUXILIAR
      $tag_CIRC_AUX = "TE 72 400 008 023 000 - 000001";
      $idAtividadeCIRC_AUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIRC_AUX)->value('id');
      $idAnaliseCIRC_AUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIRC_AUX)->max('id');
      $idLaudoCIRC_AUX = DB::table('laudos')->where('analise_id', '=', $idAnaliseCIRC_AUX)->value('id');
      $statusCIRC_AUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIRC_AUX)->value('status_id');
      //PAINEL DE COMANDO
      $tag_PC_023 = "TE 72 400 008 023 000 - 000002";
      $idAtividadePC_023 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_023)->value('id');
      $idAnalisePC_023 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_023)->max('id');
      $idLaudoPC_023 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_023)->value('id');
      $statusPC_023 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_023)->value('status_id');
      //BLOCO DE PASSAGEM CARRO
      $tag_BP_CARRO = "TE 72 400 008 023 000 - 000003";
      $idAtividadeBP_CARRO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BP_CARRO)->value('id');
      $idAnaliseBP_CARRO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBP_CARRO)->max('id');
      $idLaudoBP_CARRO = DB::table('laudos')->where('analise_id', '=', $idAnaliseBP_CARRO)->value('id');
      $statusBP_CARRO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBP_CARRO)->value('status_id');
      //BLOCO DE PASSAGEM PONTE
      $tag_BP_PONTE = "TE 72 400 008 023 000 - 000004";
      $idAtividadeBP_PONTE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BP_PONTE)->value('id');
      $idAnaliseBP_PONTE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBP_PONTE)->max('id');
      $idLaudoBP_PONTE = DB::table('laudos')->where('analise_id', '=', $idAnaliseBP_PONTE)->value('id');
      $statusBP_PONTE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBP_PONTE)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr8')
        ->with('idLaudoPC_011', $idLaudoPC_011)->with('statusPC_011', $statusPC_011)
        ->with('idLaudoPF_011', $idLaudoPF_011)->with('statusPF_011', $statusPF_011)
        ->with('idLaudoPINV_0003', $idLaudoPINV_0003)->with('statusPINV_0003', $statusPINV_0003)
        ->with('idLaudoPC_007_000002', $idLaudoPC_007_000002)->with('statusPC_007_000002', $statusPC_007_000002)
        ->with('idLaudoPF_007_000001', $idLaudoPF_007_000001)->with('statusPF_007_000001', $statusPF_007_000001)
        ->with('idLaudoPC_015_000002', $idLaudoPC_015_000002)->with('statusPC_015_000002', $statusPC_015_000002)
        ->with('idLaudoPF_015_000001', $idLaudoPF_015_000001)->with('statusPF_015_000001', $statusPF_015_000001)
        ->with('idLaudoCIRC_AUX', $idLaudoCIRC_AUX)->with('statusCIRC_AUX', $statusCIRC_AUX)
        ->with('idLaudoPC_023', $idLaudoPC_023)->with('statusPC_023', $statusPC_023)
        ->with('idLaudoBP_CARRO', $idLaudoBP_CARRO)->with('statusBP_CARRO', $statusBP_CARRO)
        ->with('idLaudoBP_PONTE', $idLaudoBP_PONTE)->with('statusBP_PONTE', $statusBP_PONTE)
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

    public function pr_pontes_pr11() {
//TRANSLACAO CARRO 1 - PAINEL DE COMANDO
      $tag_PC_000_000002 = "TE 72 400 011 011 000 - 000002";
      $idAtividadePC_000_000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_000_000002)->value('id');
      $idAnalisePC_000_000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_000_000002)->max('id');
      $idLaudoPC_000_000002 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_000_000002)->value('id');
      $statusPC_000_000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_000_000002)->value('status_id');

//TRANSLACAO CARRO 2 - /DIREÇÃO CARRO
      $tag_DC = "TE 72 400 011 011 000 - 000001";
      $idAtividadeDC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DC)->value('id');
      $idAnaliseDC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDC)->max('id');
      $idLaudoDC = DB::table('laudos')->where('analise_id', '=', $idAnaliseDC)->value('id');
      $statusDC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDC)->value('status_id');
//TRANSLACAO PONTE 1 - PAINEL DE COMANDO
      $tag_PC_011_0000002 = "TE 72 400 011 007 000 - 000002";
      $idAtividadePC_011_0000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_011_0000002)->value('id');
      $idAnalisePC_011_0000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_011_0000002)->max('id');
      $idLaudoPC_011_0000002 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_011_0000002)->value('id');
      $statusPC_011_0000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_011_0000002)->value('status_id');
//TRANSLACAO PONTE 2 - PAINEL FUSIVEL
      $tag_PF_011_0000001 = "TE 72 400 011 007 000 - 000001";
      $idAtividadePF_011_0000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_011_0000001)->value('id');
      $idAnalisePF_011_0000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_011_0000001)->max('id');
      $idLaudoPF_011_0000001 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_011_0000001)->value('id');
      $statusPF_011_0000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_011_0000001)->value('status_id');
//TRANSLACAO PONTE 3 - PAINEL INVERSOR
      $tag_PINV_000_0000003 = "TE 72 400 011 007 000 - 000003";
      $idAtividadePINV_000_0000003 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_000_0000003)->value('id');
      $idAnalisePINV_000_0000003 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_000_0000003)->max('id');
      $idLaudoPINV_000_0000003 = DB::table('laudos')->where('analise_id', '=', $idAnalisePINV_000_0000003)->value('id');
      $statusPINV_000_0000003 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_000_0000003)->value('status_id');
//ELEVACAO GUINCHO 1 - PAINEL DE COMANDO
      $tag_PC_015_000_000002 = "TE 72 400 011 015 000 - 000002";
      $idAtividadePC_015_000_000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_015_000_000002)->value('id');
      $idAnalisePC_015_000_000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_015_000_000002)->max('id');
      $idLaudoPC_015_000_000002 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_015_000_000002)->value('id');
      $statusPC_015_000_000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_015_000_000002)->value('status_id');
//ELEVACAO GUINCHO 2 - PAINEL FUSIVEL
      $tag_PF_015_000 = "TE 72 400 011 015 000 - 000001";
      $idAtividadePF_015_000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_015_000)->value('id');
      $idAnalisePF_015_000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_015_000)->max('id');
      $idLaudoPF_015_000 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_015_000)->value('id');
      $statusPF_015_000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_015_000)->value('status_id');
//ELEVACAO GUINCHO 3 - PAINEL INVERSOR
      $tag_PINV_015 = "TE 72 400 011 015 000 - 000003";
      $idAtividadePINV_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_015)->value('id');
      $idAnalisePINV_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_015)->max('id');
      $idLaudoPINV_015 = DB::table('laudos')->where('analise_id', '=', $idAnalisePINV_015)->value('id');
      $statusPINV_015 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_015)->value('status_id');
//ALIMENTACAO 4 - CIRCUITO AUXILIAR
      $tag_CIRCUITO_AUX = "TE 72 400 011 023 000 - 000001";
      $idAtividadeCIRCUITO_AUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIRCUITO_AUX)->value('id');
      $idAnaliseCIRCUITO_AUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIRCUITO_AUX)->max('id');
      $idLaudoCIRCUITO_AUX = DB::table('laudos')->where('analise_id', '=', $idAnaliseCIRCUITO_AUX)->value('id');
      $statusCIRCUITO_AUX = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIRCUITO_AUX)->value('status_id');
//ALIMENTACAO 1 - PAINEL DE COMANDO
      $tag_PC_023_000 = "TE 72 400 011 023 000 - 000002";
      $idAtividadePC_023_000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_023_000)->value('id');
      $idAnalisePC_023_000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_023_000)->max('id');
      $idLaudoPC_023_000 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_023_000)->value('id');
      $statusPC_023_000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_023_000)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr11')
        ->with('idLaudoPC_000_000002', $idLaudoPC_000_000002)->with('statusPC_000_000002', $statusPC_000_000002)
        ->with('idLaudoDC', $idLaudoDC)->with('statusDC', $statusDC)
        ->with('idLaudoPC_011_0000002', $idLaudoPC_011_0000002)->with('statusPC_011_0000002', $statusPC_011_0000002)
        ->with('idLaudoPF_011_0000001', $idLaudoPF_011_0000001)->with('statusPF_011_0000001', $statusPF_011_0000001)
        ->with('idLaudoPINV_000_0000003', $idLaudoPINV_000_0000003)->with('statusPINV_000_0000003', $statusPINV_000_0000003)
        ->with('idLaudoPC_015_000_000002', $idLaudoPC_015_000_000002)->with('statusPC_015_000_000002', $statusPC_015_000_000002)
        ->with('idLaudoPF_015_000', $idLaudoPF_015_000)->with('statusPF_015_000', $statusPF_015_000)
        ->with('idLaudoPINV_015', $idLaudoPINV_015)->with('statusPINV_015', $statusPINV_015)
        ->with('idLaudoCIRCUITO_AUX', $idLaudoCIRCUITO_AUX)->with('statusCIRCUITO_AUX', $statusCIRCUITO_AUX)
        ->with('idLaudoPC_023_000', $idLaudoPC_023_000)->with('statusPC_023_000', $statusPC_023_000)
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

    public function pr_pontes_pr12() {
//TRANSLACAO CARRO 1 - PAINEL DE COMANDO
      $tag_PC_012_0000002 = "TE 72 200 012 011 000 - 000002";
      $idAtividadePC_012_0000002 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_012_0000002)->value('id');
      $idAnalisePC_012_0000002 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_012_0000002)->max('id');
      $idLaudoPC_012_0000002 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_012_0000002)->value('id');
      $statusPC_012_0000002 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_012_0000002)->value('status_id');
//TRANSLACAO CARRO 2 - DIREÇÃO CARRO
      $tag_DC_012 = "TE 72 200 012 011 000 - 000001";
      $idAtividadeDC_012 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DC_012)->value('id');
      $idAnaliseDC_012 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDC_012)->max('id');
      $idLaudoDC_012 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDC_012)->value('id');
      $statusDC_012 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDC_012)->value('status_id');
//TRANSLACAO PONTE 1 - PAINEL DE COMANDO
      $tag_PC_012_007 = "TE 72 200 012 007 000 - 000002";
      $idAtividadePC_012_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_012_007)->value('id');
      $idAnalisePC_012_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_012_007)->max('id');
      $idLaudoPC_012_007 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_012_007)->value('id');
      $statusPC_012_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_012_007)->value('status_id');
//TRANSLACAO PONTE 2 - PAINEL FUSIVEL
      $tag_PC_012_000 = "TE 72 200 012 007 000 - 000001";
      $idAtividadePC_012_000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_012_000)->value('id');
      $idAnalisePC_012_000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_012_000)->max('id');
      $idLaudoPC_012_000 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_012_000)->value('id');
      $statusPC_012_000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_012_000)->value('status_id');
//TRANSLACAO PONTE 3 - PAINEL INVERSOR
      $tag_PINV_012_007 = "TE 72 200 012 007 000 - 000003";
      $idAtividadePINV_012_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_012_007)->value('id');
      $idAnalisePINV_012_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_012_007)->max('id');
      $idLaudoPINV_012_007 = DB::table('laudos')->where('analise_id', '=', $idAnalisePINV_012_007)->value('id');
      $statusPINV_012_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_012_007)->value('status_id');
//ELEVACAO GUINCHO 1- PAINEL DE COMANDO
      $tag_PC_012_015_000 = "TE 72 200 012 015 000 - 000002";
      $idAtividadePC_012_015_000 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_012_015_000)->value('id');
      $idAnalisePC_012_015_000 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_012_015_000)->max('id');
      $idLaudoPC_012_015_000 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_012_015_000)->value('id');
      $statusPC_012_015_000 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_012_015_000)->value('status_id');
//ELEVACAO GUINCHO 2 - PAINEL FUSIVEL
      $tag_PF_012_000001 = "TE 72 200 012 015 000 - 000001";
      $idAtividadePF_012_000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PF_012_000001)->value('id');
      $idAnalisePF_012_000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePF_012_000001)->max('id');
      $idLaudoPF_012_000001 = DB::table('laudos')->where('analise_id', '=', $idAnalisePF_012_000001)->value('id');
      $statusPF_012_000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePF_012_000001)->value('status_id');
//ELEVACAO GUINCHO 3 -PAINEL INVERSOR
      $tag_PINV_012_0000003 = "TE 72 200 012 015 000 - 000003";
      $idAtividadePINV_012_0000003 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PINV_012_0000003)->value('id');
      $idAnalisePINV_012_0000003 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePINV_012_0000003)->max('id');
      $idLaudoPINV_012_0000003 = DB::table('laudos')->where('analise_id', '=', $idAnalisePINV_012_0000003)->value('id');
      $statusPINV_012_0000003 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePINV_012_0000003)->value('status_id');
//ALIMENTACAO 4 - CIRCUITO AUXILIAR
      $tag_CIRC_AUX_006 = "TE 72 200 012 023 006 - 000002";
      $idAtividadeCIRC_AUX_006 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIRC_AUX_006)->value('id');
      $idAnaliseCIRC_AUX_006 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIRC_AUX_006)->max('id');
      $idLaudoCIRC_AUX_006 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCIRC_AUX_006)->value('id');
      $statusCIRC_AUX_006 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIRC_AUX_006)->value('status_id');
//ALIMENTACAO 1 - PAINEL DE COMANDO
      $tag_PC_023_000001 = "TE 72 200 012 023 006 - 000001";
      $idAtividadePC_023_000001 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PC_023_000001)->value('id');
      $idAnalisePC_023_000001 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePC_023_000001)->max('id');
      $idLaudoPC_023_000001 = DB::table('laudos')->where('analise_id', '=', $idAnalisePC_023_000001)->value('id');
      $statusPC_023_000001 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePC_023_000001)->value('status_id');
//BLOCO DE PASSAGEM CARRO - BLOCO DE PASSAGEM
      $tag_BLC_PASS = "TE 72 200 012 011 000 - 000003";
      $idAtividadeBLC_PASS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_BLC_PASS)->value('id');
      $idAnaliseBLC_PASS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeBLC_PASS)->max('id');
      $idLaudoBLC_PASS = DB::table('laudos')->where('analise_id', '=', $idAnaliseBLC_PASS)->value('id');
      $statusBLC_PASS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseBLC_PASS)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr12')
        ->with('idLaudoPC_012_0000002', $idLaudoPC_012_0000002)->with('statusPC_012_0000002', $statusPC_012_0000002)
        ->with('idLaudoDC_012', $idLaudoDC_012)->with('statusDC_012', $statusDC_012)
        ->with('idLaudoPC_012_007', $idLaudoPC_012_007)->with('statusPC_012_007', $statusPC_012_007)
        ->with('idLaudoPC_012_000', $idLaudoPC_012_000)->with('statusPC_012_000', $statusPC_012_000)
        ->with('idLaudoPINV_012_007', $idLaudoPINV_012_007)->with('statusPINV_012_007', $statusPINV_012_007)
        ->with('idLaudoPC_012_015_000', $idLaudoPC_012_015_000)->with('statusPC_012_015_000', $statusPC_012_015_000)
        ->with('idLaudoPF_012_000001', $idLaudoPF_012_000001)->with('statusPF_012_000001', $statusPF_012_000001)
        ->with('idLaudoPINV_012_0000003', $idLaudoPINV_012_0000003)->with('statusPINV_012_0000003', $statusPINV_012_0000003)
        ->with('idLaudoCIRC_AUX_006', $idLaudoCIRC_AUX_006)->with('statusCIRC_AUX_006', $statusCIRC_AUX_006)
        ->with('idLaudoPC_023_000001', $idLaudoPC_023_000001)->with('statusPC_023_000001', $statusPC_023_000001)
        ->with('idLaudoBLC_PASS', $idLaudoBLC_PASS)->with('statusBLC_PASS', $statusBLC_PASS)
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

    public function pr_pontes_pr13() {
      //TRANSLACAO CARRO 1 - PAINEL DE COMANDO
      $tag_PAIN_COM_011 = "TE 72 200 013 011 000 - 000002";
      $idAtividadePAIN_COM_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COM_011)->value('id');
      $idAnalisePAIN_COM_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COM_011)->max('id');
      $idLaudoPAIN_COM_011 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COM_011)->value('id');
      $statusPAIN_COM_011 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COM_011)->value('status_id');
      //TRANSLACAO CARRO 2 - /DIREÇÃO CARRO
      $tag_DIR_CARRO = "TE 72 200 013 011 000 - 000001";
      $idAtividadeDIR_CARRO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DIR_CARRO)->value('id');
      $idAnaliseDIR_CARRO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDIR_CARRO)->max('id');
      $idLaudoDIR_CARRO = DB::table('laudos')->where('analise_id', '=', $idAnaliseDIR_CARRO)->value('id');
      $statusDIR_CARRO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDIR_CARRO)->value('status_id');
      //TRANSLACAO PONTE 1 - PAINEL DE COMANDO
      $tag_PAIN_COM_007 = "TE 72 200 013 007 000 - 000002";
      $idAtividadePAIN_COM_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COM_007)->value('id');
      $idAnalisePAIN_COM_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COM_007)->max('id');
      $idLaudoPAIN_COM_007 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COM_007)->value('id');
      $statusPAIN_COM_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COM_007)->value('status_id');
      //TRANSLACAO PONTE 2 - PAINEL FUSIVEL
      $tag_PAIN_FUS_007 = "TE 72 200 013 007 000 - 000003";
      $idAtividadePAIN_FUS_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FUS_007)->value('id');
      $idAnalisePAIN_FUS_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FUS_007)->max('id');
      $idLaudoPAIN_FUS_007 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_FUS_007)->value('id');
      $statusPAIN_FUS_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FUS_007)->value('status_id');
      //TRANSLACAO PONTE 3 - PAINEL INVERSOR
      $tag_PAIN_INV_013 = "TE 72 200 013 007 000 - 000001";
      $idAtividadePAIN_INV_013 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_013)->value('id');
      $idAnalisePAIN_INV_013 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_013)->max('id');
      $idLaudoPAIN_INV_013 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_INV_013)->value('id');
      $statusPAIN_INV_013 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_013)->value('status_id');
      //ELEVACAO GUINCHO 1 - PAINEL DE COMANDO
      $tag_PAIN_COM_015 = "TE 72 200 013 015 000 - 000002";
      $idAtividadePAIN_COM_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COM_015)->value('id');
      $idAnalisePAIN_COM_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COM_015)->max('id');
      $idLaudoPAIN_COM_015 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COM_015)->value('id');
      $statusPAIN_COM_015 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COM_015)->value('status_id');
      //ELEVACAO GUINCHO 2 - PAINEL FUSIVEL
      $tag_PAIN_FUS_015 = "TE 72 200 013 015 000 - 000003";
      $idAtividadePAIN_FUS_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FUS_015)->value('id');
      $idAnalisePAIN_FUS_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FUS_015)->max('id');
      $idLaudoPAIN_FUS_015 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_FUS_015)->value('id');
      $statusPAIN_FUS_015 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FUS_015)->value('status_id');
      //ELEVACAO GUINCHO 3 - PAINEL INVERSOR
      $tag_PAIN_INV_012 = "TE 72 200 013 015 000 - 000001";
      $idAtividadePAIN_INV_012 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_012)->value('id');
      $idAnalisePAIN_INV_012 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_012)->max('id');
      $idLaudoPAIN_INV_012 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_INV_012)->value('id');
      $statusPAIN_INV_012 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_012)->value('status_id');
      //ALIMENTACAO 4 - CIRCUITO AUXILIAR
      $tag_CIR_AUX_012 = "TE 72 200 013 023 006 - 000001";
      $idAtividadeCIR_AUX_012 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIR_AUX_012)->value('id');
      $idAnaliseCIR_AUX_012 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIR_AUX_012)->max('id');
      $idLaudoCIR_AUX_012 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCIR_AUX_012)->value('id');
      $statusCIR_AUX_012 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIR_AUX_012)->value('status_id');
      //ALIMENTACAO 1 - PAINEL DE COMANDO
      $tag_PAIN_COMANDO_006 = "TE 72 200 013 023 006 - 000002";
      $idAtividadePAIN_COMANDO_006 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_006)->value('id');
      $idAnalisePAIN_COMANDO_006 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_006)->max('id');
      $idLaudoPAIN_COMANDO_006 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COMANDO_006)->value('id');
      $statusPAIN_COMANDO_006 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_006)->value('status_id');

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


      return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr13')
      ->with('idLaudoPAIN_COM_011', $idLaudoPAIN_COM_011)->with('statusPAIN_COM_011', $statusPAIN_COM_011)
      ->with('idLaudoDIR_CARRO', $idLaudoDIR_CARRO)->with('statusDIR_CARRO', $statusDIR_CARRO)
      ->with('idLaudoPAIN_COM_007', $idLaudoPAIN_COM_007)->with('statusPAIN_COM_007', $statusPAIN_COM_007)
      ->with('idLaudoPAIN_FUS_007', $idLaudoPAIN_FUS_007)->with('statusPAIN_FUS_007', $statusPAIN_FUS_007)
      ->with('idLaudoPAIN_INV_013', $idLaudoPAIN_INV_013)->with('statusPAIN_INV_013', $statusPAIN_INV_013)
      ->with('idLaudoPAIN_COM_015', $idLaudoPAIN_COM_015)->with('statusPAIN_COM_015', $statusPAIN_COM_015)
      ->with('idLaudoPAIN_FUS_015', $idLaudoPAIN_FUS_015)->with('statusPAIN_FUS_015', $statusPAIN_FUS_015)
      ->with('idLaudoPAIN_INV_012', $idLaudoPAIN_INV_012)->with('statusPAIN_INV_012', $statusPAIN_INV_012)
      ->with('idLaudoCIR_AUX_012', $idLaudoCIR_AUX_012)->with('statusCIR_AUX_012', $statusCIR_AUX_012)
      ->with('idLaudoPAIN_COMANDO_006', $idLaudoPAIN_COMANDO_006)->with('statusPAIN_COMANDO_006', $statusPAIN_COMANDO_006)
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

    public function pr_pontes_pr14() {
      //ENTRADA GERAL CARRO CIRCULACAO AUXILIARES 1 - CIRCUITO AUXILIAR
      $tag_CIRC_AUX_023 = "TE 72 900 008 023 000 - 000001";
      $idAtividadeCIRC_AUX_023 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CIRC_AUX_023)->value('id');
      $idAnaliseCIRC_AUX_023 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCIRC_AUX_023)->max('id');
      $idLaudoCIRC_AUX_023 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCIRC_AUX_023)->value('id');
      $statusCIRC_AUX_023 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCIRC_AUX_023)->value('status_id');
      //ENTRADA GERAL CARRO CIRCULACAO AUXILIARES 2 - PAINEL DE COMANDO 1
      $tag_PAIN_COMANDO1 = "TE 72 900 008 023 000 - 000002";
      $idAtividadePAIN_COMANDO1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO1)->value('id');
      $idAnalisePAIN_COMANDO1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO1)->max('id');
      $idLaudoPAIN_COMANDO1 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COMANDO1)->value('id');
      $statusPAIN_COMANDO1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO1)->value('status_id');
      //ENTRADA GERAL CARRO CIRCULACAO AUXILIARES 3 - PAINEL DE COMANDO 2
      $tag_PAIN_COMANDO2 = "TE 72 900 008 023 000 - 000003";
      $idAtividadePAIN_COMANDO2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO2)->value('id');
      $idAnalisePAIN_COMANDO2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO2)->max('id');
      $idLaudoPAIN_COMANDO2 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COMANDO2)->value('id');
      $statusPAIN_COMANDO2 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO2)->value('status_id');
      //CARRO - PAINEL DE COMANDO
      $tag_PAIN_COMANDO_011 = "TE 72 900 008 011 000 - 000002";
      $idAtividadePAIN_COMANDO_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_011)->value('id');
      $idAnalisePAIN_COMANDO_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_011)->max('id');
      $idLaudoPAIN_COMANDO_011 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COMANDO_011)->value('id');
      $statusPAIN_COMANDO_011 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_011)->value('status_id');
      //TRANSLACAO DA PONTE 1 - PAINEL DE COMANDO
      $tag_PAIN_COMANDO_015 = "TE 72 900 008 015 000 - 000002";
      $idAtividadePAIN_COMANDO_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_015)->value('id');
      $idAnalisePAIN_COMANDO_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_015)->max('id');
      $idLaudoPAIN_COMANDO_015 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COMANDO_015)->value('id');
      $statusPAIN_COMANDO_015 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_015)->value('status_id');
      //TRANSLACAO DA PONTE 2 - PAINEL FUSIVEL
      $tag_PAIN_FUSIVEL = "TE 72 900 008 007 000 - 000001";
      $idAtividadePAIN_FUSIVEL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FUSIVEL)->value('id');
      $idAnalisePAIN_FUSIVEL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FUSIVEL)->max('id');
      $idLaudoPAIN_FUSIVEL = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_FUSIVEL)->value('id');
      $statusPAIN_FUSIVEL = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FUSIVEL)->value('status_id');
      //TRANSLACAO DA PONTE 3 - PAINEL INVERSOR
      $tag_PAIN_INV_007 = "TE 72 900 008 007 000 - 000003";
      $idAtividadePAIN_INV_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_007)->value('id');
      $idAnalisePAIN_INV_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_007)->max('id');
      $idLaudoPAIN_INV_007 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_INV_007)->value('id');
      $statusPAIN_INV_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_007)->value('status_id');
      //ELEVACAO AUXILIAR 1 - PAINEL DE COMANDO
      $tag_PAIN_COMANDO_008 = "TE 72 900 008 016 000 - 000002";
      $idAtividadePAIN_COMANDO_008 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_008)->value('id');
      $idAnalisePAIN_COMANDO_008 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_008)->max('id');
      $idLaudoPAIN_COMANDO_008 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COMANDO_008)->value('id');
      $statusPAIN_COMANDO_008 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_008)->value('status_id');

      //ELEVACAO AUXILIAR 3 - PAINEL INVERSOR
      $tag_PAIN_INV_016 = "TE 72 900 008 016 000 - 000001";
      $idAtividadePAIN_INV_016 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_016)->value('id');
      $idAnalisePAIN_INV_016 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_016)->max('id');
      $idLaudoPAIN_INV_016 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_INV_016)->value('id');
      $statusPAIN_INV_016 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_016)->value('status_id');
      //ELEVACAO  1 - PAINEL DE COMANDO
      $tag_PAIN_COMANDO_020 = "TE 72 900 008 015 000 - 000002";
      $idAtividadePAIN_COMANDO_020 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COMANDO_020)->value('id');
      $idAnalisePAIN_COMANDO_020 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COMANDO_020)->max('id');
      $idLaudoPAIN_COMANDO_020 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COMANDO_020)->value('id');
      $statusPAIN_COMANDO_020 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COMANDO_020)->value('status_id');
      //ELEVACAO  2 - PAINEL FUSIVEL
      $tag_PAIN_FUSIVEL_008 = "TE 72 900 008 015 000 - 000001";
      $idAtividadePAIN_FUSIVEL_008 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FUSIVEL_008)->value('id');
      $idAnalisePAIN_FUSIVEL_008 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FUSIVEL_008)->max('id');
      $idLaudoPAIN_FUSIVEL_008 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_FUSIVEL_008)->value('id');
      $statusPAIN_FUSIVEL_008 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FUSIVEL_008)->value('status_id');
      //ELEVACAO  3 - PAINEL INVERSOR
      $tag_PAIN_INV_008 = "TE 72 900 008 015 000 - 000003";
      $idAtividadePAIN_INV_008 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_INV_008)->value('id');
      $idAnalisePAIN_INV_008 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_INV_008)->max('id');
      $idLaudoPAIN_INV_008 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_INV_008)->value('id');
      $statusPAIN_INV_008 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_INV_008)->value('status_id');
      //BLOCO DE PASSAGEM CARRO - /DIREÇÃO CARRO
      $tag_DIR_CARRO_011 = "TE 72 900 008 011 000 - 000001";
      $idAtividadeDIR_CARRO_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DIR_CARRO_011)->value('id');
      $idAnaliseDIR_CARRO_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDIR_CARRO_011)->max('id');
      $idLaudoDIR_CARRO_011 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDIR_CARRO_011)->value('id');
      $statusDIR_CARRO_011 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDIR_CARRO_011)->value('status_id');

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


      return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr14')
      ->with('idLaudoCIRC_AUX_023', $idLaudoCIRC_AUX_023)->with('statusCIRC_AUX_023', $statusCIRC_AUX_023)
      ->with('idLaudoPAIN_COMANDO1', $idLaudoPAIN_COMANDO1)->with('statusPAIN_COMANDO1', $statusPAIN_COMANDO1)
      ->with('idLaudoPAIN_COMANDO2', $idLaudoPAIN_COMANDO2)->with('statusPAIN_COMANDO2', $statusPAIN_COMANDO2)
      ->with('idLaudoPAIN_COMANDO_011', $idLaudoPAIN_COMANDO_011)->with('statusPAIN_COMANDO_011', $statusPAIN_COMANDO_011)
      ->with('idLaudoPAIN_COMANDO_015', $idLaudoPAIN_COMANDO_015)->with('statusPAIN_COMANDO_015', $statusPAIN_COMANDO_015)
      ->with('idLaudoPAIN_FUSIVEL', $idLaudoPAIN_FUSIVEL)->with('statusPAIN_FUSIVEL', $statusPAIN_FUSIVEL)
      ->with('idLaudoPAIN_INV_007', $idLaudoPAIN_INV_007)->with('statusPAIN_INV_007', $statusPAIN_INV_007)
      ->with('idLaudoPAIN_COMANDO_008', $idLaudoPAIN_COMANDO_008)->with('statusPAIN_COMANDO_008', $statusPAIN_COMANDO_008)
      ->with('idLaudoPAIN_INV_016', $idLaudoPAIN_INV_016)->with('statusPAIN_INV_016', $statusPAIN_INV_016)
      ->with('idLaudoPAIN_COMANDO_020', $idLaudoPAIN_COMANDO_020)->with('statusPAIN_COMANDO_020', $statusPAIN_COMANDO_020)
      ->with('idLaudoPAIN_FUSIVEL_008', $idLaudoPAIN_FUSIVEL_008)->with('statusPAIN_FUSIVEL_008', $statusPAIN_FUSIVEL_008)
      ->with('idLaudoPAIN_INV_008', $idLaudoPAIN_INV_008)->with('statusPAIN_INV_008', $statusPAIN_INV_008)
      ->with('idLaudoDIR_CARRO_011', $idLaudoDIR_CARRO_011)->with('statusDIR_CARRO_011', $statusDIR_CARRO_011)
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

    public function pr_pontes_pr20() {
      //GERAL - PAINEL DE FORÇA
      $tag_PAIN_FORCA = "TE 72 800 020 015 000 - 000001";
      $idAtividadePAIN_FORCA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FORCA)->value('id');
      $idAnalisePAIN_FORCA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FORCA)->max('id');
      $idLaudoPAIN_FORCA = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_FORCA)->value('id');
      $statusPAIN_FORCA = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FORCA)->value('status_id');
      //ELEVACAO - PAINEL DE COMANDO
      $tag_DIR_CARRO_020 = "TE 72 800 020 015 000 - 000002";
      $idAtividadeDIR_CARRO_020 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_DIR_CARRO_020)->value('id');
      $idAnaliseDIR_CARRO_020 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDIR_CARRO_020)->max('id');
      $idLaudoDIR_CARRO_020 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDIR_CARRO_020)->value('id');
      $statusDIR_CARRO_020 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDIR_CARRO_020)->value('status_id');
      //PAINEL DE FORÇA / INVERSOR
      $tag_PAIN_FORCA_INV = "TE 72 800 020 011 000 - 000001";
      $idAtividadePAIN_FORCA_INV = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FORCA_INV)->value('id');
      $idAnalisePAIN_FORCA_INV = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FORCA_INV)->max('id');
      $idLaudoPAIN_FORCA_INV = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_FORCA_INV)->value('id');
      $statusPAIN_FORCA_INV = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FORCA_INV)->value('status_id');
      //PAINEL DE COMANDO
      $tag_CARRO_COM = "TE 72 800 020 011 000 - 000002";
      $idAtividadeCARRO_COM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CARRO_COM)->value('id');
      $idAnaliseCARRO_COM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO_COM)->max('id');
      $idLaudoCARRO_COM = DB::table('laudos')->where('analise_id', '=', $idAnaliseCARRO_COM)->value('id');
      $statusCARRO_COM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO_COM)->value('status_id');
      //PAINEL DE FORÇA / INVEROSR
      $tag_PAIN_FORCA_INVE_007 = "TE 72 800 020 007 000 - 000001";
      $idAtividadePAIN_FORCA_INVE_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_FORCA_INVE_007)->value('id');
      $idAnalisePAIN_FORCA_INVE_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_FORCA_INVE_007)->max('id');
      $idLaudoPAIN_FORCA_INVE_007 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_FORCA_INVE_007)->value('id');
      $statusPAIN_FORCA_INVE_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_FORCA_INVE_007)->value('status_id');
      //PAINEL DE COMANDO
      $tag_PAIN_COM_020_007 = "TE 72 800 020 007 000 - 000002";
      $idAtividadePAIN_COM_020_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PAIN_COM_020_007)->value('id');
      $idAnalisePAIN_COM_020_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePAIN_COM_020_007)->max('id');
      $idLaudoPAIN_COM_020_007 = DB::table('laudos')->where('analise_id', '=', $idAnalisePAIN_COM_020_007)->value('id');
      $statusPAIN_COM_020_007 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePAIN_COM_020_007)->value('status_id');

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


      return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr20')
      ->with('idLaudoPAIN_FORCA', $idLaudoPAIN_FORCA)->with('statusPAIN_FORCA', $statusPAIN_FORCA)
      ->with('idLaudoDIR_CARRO_020', $idLaudoDIR_CARRO_020)->with('statusDIR_CARRO_020', $statusDIR_CARRO_020)
      ->with('idLaudoPAIN_FORCA_INV', $idLaudoPAIN_FORCA_INV)->with('statusPAIN_FORCA_INV', $statusPAIN_FORCA_INV)
      ->with('idLaudoCARRO_COM', $idLaudoCARRO_COM)->with('statusCARRO_COM', $statusCARRO_COM)
      ->with('idLaudoPAIN_FORCA_INVE_007', $idLaudoPAIN_FORCA_INVE_007)->with('statusPAIN_FORCA_INVE_007', $statusPAIN_FORCA_INVE_007)
      ->with('idLaudoPAIN_COM_020_007', $idLaudoPAIN_COM_020_007)->with('statusPAIN_COM_020_007', $statusPAIN_COM_020_007)
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

    public function pr_pontes_pr23() {
      //AUXILIARES
      $tag_AUX_007 = "TE 72 800 013 007 000 - 000002";
      $idAtividadeAUX_007 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUX_007)->value('id');
      $idAnaliseAUX_007 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUX_007)->max('id');
      $idLaudoAUX_007 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAUX_007)->value('id');
      $statusAUX_007 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUX_007)->value('status_id');
      //INVERSOR
      $tag_INV_013 = "TE 72 800 013 007 000 - 000001";
      $idAtividadeINV_013 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_INV_013)->value('id');
      $idAnaliseINV_013 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeINV_013)->max('id');
      $idLaudoINV_013 = DB::table('laudos')->where('analise_id', '=', $idAnaliseINV_013)->value('id');
      $statusINV_013 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseINV_013)->value('status_id');
      //CARRO
      $tag_CARRO_013_011 = "TE 72 800 013 011 000 - 000001";
      $idAtividadeCARRO_013_011 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CARRO_013_011)->value('id');
      $idAnaliseCARRO_013_011 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCARRO_013_011)->max('id');
      $idLaudoCARRO_013_011 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCARRO_013_011)->value('id');
      $statusCARRO_013_011 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCARRO_013_011)->value('status_id');
      //AUXILIARES
      $tag_AUXILIAR_013_015 = "TE 72 800 013 015 000 - 000002";
      $idAtividadeAUXILIAR_013_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_AUXILIAR_013_015)->value('id');
      $idAnaliseAUXILIAR_013_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAUXILIAR_013_015)->max('id');
      $idLaudoAUXILIAR_013_015 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAUXILIAR_013_015)->value('id');
      $statusAUXILIAR_013_015 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAUXILIAR_013_015)->value('status_id');
      //INVERSOR
      $tag_INVER_013_015 = "TE 72 800 013 015 000 - 000001";
      $idAtividadeINVER_013_015 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_INVER_013_015)->value('id');
      $idAnaliseINVER_013_015 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeINVER_013_015)->max('id');
      $idLaudoINVER_013_015 = DB::table('laudos')->where('analise_id', '=', $idAnaliseINVER_013_015)->value('id');
      $statusINVER_013_015 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseINVER_013_015)->value('status_id');
      //PROTEÇÃO AUXILIARES
      $tag_PRO_AUX = "TE 72 800 013 023 006 - 000001";
      $idAtividadePRO_AUX = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_PRO_AUX)->value('id');
      $idAnalisePRO_AUX = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePRO_AUX)->max('id');
      $idLaudoPRO_AUX = DB::table('laudos')->where('analise_id', '=', $idAnalisePRO_AUX)->value('id');
      $statusPRO_AUX = DB::table('preditiva_analises')->where('id', '=', $idAnalisePRO_AUX)->value('status_id');
      //TENAZ
      $tag_TENAZ = "TE 72 800 013 017 000 - 000001";
      $idAtividadeTENAZ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_TENAZ)->value('id');
      $idAnaliseTENAZ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTENAZ)->max('id');
      $idLaudoTENAZ = DB::table('laudos')->where('analise_id', '=', $idAnaliseTENAZ)->value('id');
      $statusTENAZ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTENAZ)->value('status_id');
      //CONEXÃO PONTE AX1
      $tag_CONEXAO_PONTE = "TE 72 800 013 023 000 - 000001";
      $idAtividadeCONEXAO_PONTE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_CONEXAO_PONTE)->value('id');
      $idAnaliseCONEXAO_PONTE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONEXAO_PONTE)->max('id');
      $idLaudoCONEXAO_PONTE = DB::table('laudos')->where('analise_id', '=', $idAnaliseCONEXAO_PONTE)->value('id');
      $statusCONEXAO_PONTE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONEXAO_PONTE)->value('status_id');

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


        return view('csn.relatoriosTecnicos.termografia_pr_ponte_pr23')
        ->with('idLaudoAUX_007', $idLaudoAUX_007)->with('statusAUX_007', $statusAUX_007)
        ->with('idLaudoINV_013', $idLaudoINV_013)->with('statusINV_013', $statusINV_013)
        ->with('idLaudoCARRO_013_011', $idLaudoCARRO_013_011)->with('statusCARRO_013_011', $statusCARRO_013_011)
        ->with('idLaudoAUXILIAR_013_015', $idLaudoAUXILIAR_013_015)->with('statusAUXILIAR_013_015', $statusAUXILIAR_013_015)
        ->with('idLaudoINVER_013_015', $idLaudoINVER_013_015)->with('statusINVER_013_015', $statusINVER_013_015)
        ->with('idLaudoPRO_AUX', $idLaudoPRO_AUX)->with('statusPRO_AUX', $statusPRO_AUX)
        ->with('idLaudoTENAZ', $idLaudoTENAZ)->with('statusTENAZ', $statusTENAZ)
        ->with('idLaudoCONEXAO_PONTE', $idLaudoCONEXAO_PONTE)->with('statusCONEXAO_PONTE', $statusCONEXAO_PONTE)
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
->with('galvanizacao_ccm2_ccm3_status', $galvanizacao_ccm2_ccm3_status)->with('galvanizacao_alarme_ccm4_ccm5_status', $$galvanizacao_alarme_ccm4_ccm5_status);
    }
}

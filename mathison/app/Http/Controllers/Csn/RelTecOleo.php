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

class RelTecOleo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function decapagem_entrada()
    {
      //SISTEMA HIDRAULICO DE ENTRADA
      $tag_oleoSHE = "LB 72 200 210 318 000 - 000001";
      $idAtividadeSHE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSHE)->value('id');
      $idAnaliseSHE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHE)->max('id');
      $idLaudoSHE = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHE)->value('id');
      $statusSHE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHE)->value('status_id');

      //SISTEMA CENTRALIZAÇÃO DA TIRA DA  ENTRADA - FIFE DESENR.
      $tag_oleoSCTE_FD = "LB 72 200 210 027 000 - 000001";
      $idAtividadeSCTE_FD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSCTE_FD)->value('id');
      $idAnaliseSCTE_FD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSCTE_FD)->max('id');
      $idLaudoSCTE_FD = DB::table('laudos')->where('analise_id', '=', $idAnaliseSCTE_FD)->value('id');
      $statusSCTE_FD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSCTE_FD)->value('status_id');

      //DESEMPENADEIRA - REDUTORA
      $tag_oleoDR = "LB 72 200 210 048 000 - 000001";
      $idAtividadeDR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoDR)->value('id');
      $idAnaliseDR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDR)->max('id');
      $idLaudoDR = DB::table('laudos')->where('analise_id', '=', $idAnaliseDR)->value('id');
      $statusDR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDR)->value('status_id');

      //DESEMPENADEIRA - MULTIPLICADOR DE EIXOS
      $tag_oleoDME = "LB 72 200 210 048 000 - 000002";
      $idAtividadeDME = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoDME)->value('id');
      $idAnaliseDME = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDME)->max('id');
      $idLaudoDME = DB::table('laudos')->where('analise_id', '=', $idAnaliseDME)->value('id');
      $statusDME = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDME)->value('status_id');

      //ACIONAMENTO PRINCIPAL DESENROLADEIRA
      $tag_oleoAPD = "LB 72 200 210 024 000 - 000001";
      $idAtividadeAPD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPD)->value('id');
      $idAnaliseAPD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD)->max('id');
      $idLaudoAPD = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPD)->value('id');
      $statusAPD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD)->value('status_id');

      //CARRO BOBINA ENTRADA
      $tag_oleoCBE = "LB 72 200 210 012 000 - 000001";
      $idAtividadeCBE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCBE)->value('id');
      $idAnaliseCBE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBE)->max('id');
      $idLaudoCBE = DB::table('laudos')->where('analise_id', '=', $idAnaliseCBE)->value('id');
      $statusCBE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBE)->value('status_id');


        return view('csn.relatoriosTecnicos.oleo_decapagem_entrada')
        ->with('idLaudoSHE', $idLaudoSHE)->with('statusSHE', $statusSHE)
        ->with('idLaudoSCTE_FD', $idLaudoSCTE_FD)->with('statusSCTE_FD', $statusSCTE_FD)
        ->with('idLaudoDR', $idLaudoDR)->with('statusDR', $statusDR)
        ->with('idLaudoDME', $idLaudoDME)->with('statusDME', $statusDME)
        ->with('idLaudoAPD', $idLaudoAPD)->with('statusAPD', $statusAPD)
        ->with('idLaudoCBE', $idLaudoCBE)->with('statusCBE', $statusCBE);
    }

    public function decapagem_saida()
    {

      //CARRO DE BOBINA DA SAÍDA
      $tag_oleoCBS = "LB 72 200 210 306 000 - 000001";
      $idAtividadeCBS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCBS)->value('id');
      $idAnaliseCBS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBS)->max('id');
      $idLaudoCBS = DB::table('laudos')->where('analise_id', '=', $idAnaliseCBS)->value('id');
      $statusCBS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBS)->value('status_id');

      //APARADOR DE BORDAS - A LM ENG. 2-4
      $tag_oleoAB_2_4 = "LB 72 200 210 195 000 - 000001";
      $idAtividadeAB_2_4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAB_2_4)->value('id');
      $idAnaliseAB_2_4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAB_2_4)->max('id');
      $idLaudoAB_2_4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAB_2_4)->value('id');
      $statusAB_2_4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAB_2_4)->value('status_id');

      //APARADOR DE BORDAS - B LM ENG. 6-8
      $tag_oleoAB_6_8 = "LB 72 200 210 195 000 - 000002";
      $idAtividadeAB_6_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAB_6_8)->value('id');
      $idAnaliseAB_6_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAB_6_8)->max('id');
      $idLaudoAB_6_8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAB_6_8)->value('id');
      $statusAB_6_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAB_6_8)->value('status_id');

      //REDUTOR DA PICOTADEIRA  LADO OPERADOR
      $tag_oleoRPLO = "LB 72 200 210 234 000 - 000003";
      $idAtividadeRPLO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoRPLO)->value('id');
      $idAnaliseRPLO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPLO)->max('id');
      $idLaudoRPLO = DB::table('laudos')->where('analise_id', '=', $idAnaliseRPLO)->value('id');
      $statusRPLO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPLO)->value('status_id');

      //APARADOR DE BORDAS - A LO ENG 1-3
      $tag_oleoAB_A_ENG_1_3 = "LB 72 200 210 192 000 - 000001";
      $idAtividadeAB_A_ENG_1_3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAB_A_ENG_1_3)->value('id');
      $idAnaliseAB_A_ENG_1_3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAB_A_ENG_1_3)->max('id');
      $idLaudoAB_A_ENG_1_3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAB_A_ENG_1_3)->value('id');
      $statusAB_A_ENG_1_3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAB_A_ENG_1_3)->value('status_id');


      //APARADOR DE BORDAS - B LO ENG. 5-7
      $tag_oleoAB_ENG_5_7 = "LB 72 200 210 192 000 - 000002";
      $idAtividadeAB_ENG_5_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAB_ENG_5_7)->value('id');
      $idAnaliseAB_ENG_5_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAB_ENG_5_7)->max('id');
      $idLaudoAB_ENG_5_7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAB_ENG_5_7)->value('id');
      $statusAB_ENG_5_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAB_ENG_5_7)->value('status_id');


      //REDUTOR DA PICOTADEIRA LADO MOTOR
      $tag_oleoARPLM = "LB 72 200 210 234 000 - 000002";
      $idAtividadeARPLM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoARPLM)->value('id');
      $idAnaliseARPLM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeARPLM)->max('id');
      $idLaudoARPLM = DB::table('laudos')->where('analise_id', '=', $idAnaliseARPLM)->value('id');
      $statusARPLM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseARPLM)->value('status_id');



      //ACIONAMENTO ROLOS TENSIONADORES - RED. AC ENT. 1
      $tag_oleoART_RAE = "LB 72 200 210 246 000 - 000001";
      $idAtividadeART_RAE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoART_RAE)->value('id');
      $idAnaliseART_RAE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_RAE)->max('id');
      $idLaudoART_RAE = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_RAE)->value('id');
      $statusART_RAE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_RAE)->value('status_id');

      //ACIONAMENTO ROLOS TENSIONADORES - RED. AC ENT. 2
      $tag_oleoART_RE2 = "LB 72 200 210 246 000 - 000002";
      $idAtividadeART_RE2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoART_RE2)->value('id');
      $idAnaliseART_RE2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_RE2)->max('id');
      $idLaudoART_RE2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_RE2)->value('id');
      $statusART_RE2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_RE2)->value('status_id');

      //ACIONAMENTO ROLOS TENSIONADORES - RED. AC ENT. 3
      $tag_oleoART_RE3 = "LB 72 200 210 246 000 - 000003";
      $idAtividadeART_RE3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoART_RE3)->value('id');
      $idAnaliseART_RE3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeART_RE3)->max('id');
      $idLaudoART_RE3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseART_RE3)->value('id');
      $statusART_RE3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseART_RE3)->value('status_id');

      //REDUTOR DA PICOTADEIRA PRINCIPAL
      $tag_oleoRPP = "LB 72 200 210 234 000 - 000001";
      $idAtividadeRPP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoRPP)->value('id');
      $idAnaliseRPP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPP)->max('id');
      $idLaudoRPP = DB::table('laudos')->where('analise_id', '=', $idAnaliseRPP)->value('id');
      $statusRPP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPP)->value('status_id');

      //ACIONAMENTO PRINCIPAL ENROLADEIRA
      $tag_oleoAPE = "LB 72 200 210 291 000 - 000001";
      $idAtividadeAPE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPE)->value('id');
      $idAnaliseAPE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPE)->max('id');
      $idLaudoAPE = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPE)->value('id');
      $statusAPE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPE)->value('status_id');

      //ROLO PUXADOR DIRECIONAL - MULTIPLICADORA DE EIXOS
      $tag_oleoRPD_ME = "LB 72 200 210 171 000 - 000001";
      $idAtividadeRPD_ME = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoRPD_ME)->value('id');
      $idAnaliseRPD_ME = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPD_ME)->max('id');
      $idLaudoRPD_ME = DB::table('laudos')->where('analise_id', '=', $idAnaliseRPD_ME)->value('id');
      $statusRPD_ME = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPD_ME)->value('status_id');

      //ROLO PUXADOR DIRECIONAL - FIFE
      $tag_oleoRPD_FIFE = "LB 72 200 210 171 000 - 000003";
      $idAtividadeRPD_FIFE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoRPD_FIFE)->value('id');
      $idAnaliseRPD_FIFE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPD_FIFE)->max('id');
      $idLaudoRPD_FIFE = DB::table('laudos')->where('analise_id', '=', $idAnaliseRPD_FIFE)->value('id');
      $statusRPD_FIFE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPD_FIFE)->value('status_id');

      //ROLO PUXADOR DIRECIONAL - REDUTORA
      $tag_oleoRPD_RED = "LB 72 200 210 171 000 - 000002";
      $idAtividadeRPD_RED = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoRPD_RED)->value('id');
      $idAnaliseRPD_RED = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeRPD_RED)->max('id');
      $idLaudoRPD_RED = DB::table('laudos')->where('analise_id', '=', $idAnaliseRPD_RED)->value('id');
      $statusRPD_RED = DB::table('preditiva_analises')->where('id', '=', $idAnaliseRPD_RED)->value('status_id');

      //ACIONAMENTO CENTRALIZAÇÃO ENROLADEIRA - FIFE ENROLAD.
      $tag_oleoACE_FE = "LB 72 200 210 294 000 - 000001";
      $idAtividadeACE_FE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoACE_FE)->value('id');
      $idAnaliseACE_FE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACE_FE)->max('id');
      $idLaudoACE_FE = DB::table('laudos')->where('analise_id', '=', $idAnaliseACE_FE)->value('id');
      $statusACE_FE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACE_FE)->value('status_id');

      //SISTEMA HIDRAULICO DE SAIDA
      $tag_oleoSHS = "LB 72 200 210 321 000 - 000001";
      $idAtividadeSHS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSHS)->value('id');
      $idAnaliseSHS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHS)->max('id');
      $idLaudoSHS = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHS)->value('id');
      $statusSHS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHS)->value('status_id');




        return view('csn.relatoriosTecnicos.oleo_decapagem_saida')
        ->with('idLaudoCBS', $idLaudoCBS)->with('statusCBS', $statusCBS)
        ->with('idLaudoAB_2_4', $idLaudoAB_2_4)->with('statusAB_2_4', $statusAB_2_4)
        ->with('idLaudoAB_6_8', $idLaudoAB_6_8)->with('statusAB_6_8', $statusAB_6_8)
        ->with('idLaudoRPLO', $idLaudoRPLO)->with('statusRPLO', $statusRPLO)
        ->with('idLaudoAB_A_ENG_1_3', $idLaudoAB_A_ENG_1_3)->with('statusAB_A_ENG_1_3', $statusAB_A_ENG_1_3)
        ->with('idLaudoAB_ENG_5_7', $idLaudoAB_ENG_5_7)->with('statusAB_ENG_5_7', $statusAB_ENG_5_7)
        ->with('idLaudoARPLM', $idLaudoARPLM)->with('statusARPLM', $statusARPLM)
        ->with('idLaudoART_RAE', $idLaudoART_RAE)->with('statusART_RAE', $statusART_RAE)
        ->with('idLaudoART_RE2', $idLaudoART_RE2)->with('statusART_RE2', $statusART_RE2)
        ->with('idLaudoART_RE3', $idLaudoART_RE3)->with('statusART_RE3', $statusART_RE3)
        ->with('idLaudoRPP', $idLaudoRPP)->with('statusRPD_ME', $statusRPD_ME)
        ->with('idLaudoAPE', $idLaudoAPE)->with('statusAPE', $statusAPE)
        ->with('idLaudoRPD_ME', $idLaudoRPD_ME)->with('statusRPD_ME', $statusRPD_ME)
        ->with('idLaudoRPD_FIFE', $idLaudoRPD_FIFE)->with('statusRPD_FIFE', $statusRPD_FIFE)
        ->with('idLaudoRPD_RED', $idLaudoRPD_RED)->with('statusRPD_RED', $statusRPD_RED)
        ->with('idLaudoACE_FE', $idLaudoACE_FE)->with('statusACE_FE', $statusACE_FE)
        ->with('idLaudoSHS', $idLaudoSHS)->with('statusSHS', $statusSHS);


    }

    public function laminador()
    {

      //CARRO BOBINA DA DESENROLADEIRA
      $tag_oleoCBD = "LB 72 300 310 006 084 - 000004";
      $idAtividadeCBD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCBD)->value('id');
      $idAnaliseCBD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBD)->max('id');
      $idLaudoCBD = DB::table('laudos')->where('analise_id', '=', $idAnaliseCBD)->value('id');
      $statusCBD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBD)->value('status_id');

      //CARRO BOBINA Nº2 DA ENROLADEIRA 1
      $tag_oleoCB_N2_E1 = "LB 72 300 310 090 084 - 000004";
      $idAtividadeCB_N2_E1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCB_N2_E1)->value('id');
      $idAnaliseCB_N2_E1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_N2_E1)->max('id');
      $idLaudoCB_N2_E1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB_N2_E1)->value('id');
      $statusCB_N2_E1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_N2_E1)->value('status_id');

      //CARRO BOBINA Nº1 DA ENROLADEIRA 1
      $tag_oleoCB_N1_E1 = "LB 72 300 310 087 084 - 000006";
      $idAtividadeCB_N1_E1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCB_N1_E1)->value('id');
      $idAnaliseCB_N1_E1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_N1_E1)->max('id');
      $idLaudoCB_N1_E1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB_N1_E1)->value('id');
      $statusCB_N1_E1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_N1_E1)->value('status_id');

      //CARRO BOBINA Nº2 DA ENROLADEIRA 2
      $tag_oleoCB_N2_E2 = "LB 72 300 310 225 084 - 000006";
      $idAtividadeCB_N2_E2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCB_N2_E2)->value('id');
      $idAnaliseCB_N2_E2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_N2_E2)->max('id');
      $idLaudoCB_N2_E2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB_N2_E2)->value('id');
      $statusCB_N2_E2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_N2_E2)->value('status_id');

      //CARRO BOBINA Nº1 DA ENROLADEIRA 2
      $tag_oleoCB_N1_E2 = "LB 72 300 310 222 084 - 000006";
      $idAtividadeCB_N1_E2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCB_N1_E2)->value('id');
      $idAnaliseCB_N1_E2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCB_N1_E2)->max('id');
      $idLaudoCB_N1_E2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCB_N1_E2)->value('id');
      $statusCB_N1_E2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCB_N1_E2)->value('status_id');

      //CARRO BOBINA DA INSPEÇÃO
      $tag_oleoCBI = "LB 72 300 310 246 084 - 000004";
      $idAtividadeCBI = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCBI)->value('id');
      $idAnaliseCBI = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCBI)->max('id');
      $idLaudoCBI = DB::table('laudos')->where('analise_id', '=', $idAnaliseCBI)->value('id');
      $statusCBI = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCBI)->value('status_id');


        return view('csn.relatoriosTecnicos.oleo_laminador')
        ->with('idLaudoCBD', $idLaudoCBD)->with('statusCBD', $statusCBD)
        ->with('idLaudoCB_N2_E1', $idLaudoCB_N2_E1)->with('statusCB_N2_E1', $statusCB_N2_E1)
        ->with('idLaudoCB_N1_E1', $idLaudoCB_N1_E1)->with('statusCB_N1_E1', $statusCB_N1_E1)
        ->with('idLaudoCB_N2_E2', $idLaudoCB_N2_E2)->with('statusCB_N2_E2', $statusCB_N2_E2)
        ->with('idLaudoCB_N1_E2', $idLaudoCB_N1_E2)->with('statusCB_N1_E2', $statusCB_N1_E2)
        ->with('idLaudoCBI', $idLaudoCBI)->with('statusCBI', $statusCBI);
    }

    public function laminador_porao()
    {

      //SISTEMA HIDRÁULICO - BAIXA PRESSÃO
      $tag_oleoSHBP = "LB 72 300 310 267 003 - 000005";
      $idAtividadeSHBP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSHBP)->value('id');
      $idAnaliseSHBP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHBP)->max('id');
      $idLaudoSHBP = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHBP)->value('id');
      $statusSHBP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHBP)->value('status_id');

      //SISTEMA MÓS
      $tag_oleoSM_1 = "LB 72 300 310 270 006 - 000007";
      $idAtividadeSM_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSM_1)->value('id');
      $idAnaliseSM_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSM_1)->max('id');
      $idLaudoSM_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSM_1)->value('id');
      $statusSM_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSM_1)->value('status_id');

      //SISTEMAS HIDRÁULICOS - ALTA PRESSÃO
      $tag_oleoSHAP = "LB 72 300 310 264 003 - 000005";
      $idAtividadeSHAP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSHAP)->value('id');
      $idAnaliseSHAP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSHAP)->max('id');
      $idLaudoSHAP = DB::table('laudos')->where('analise_id', '=', $idAnaliseSHAP)->value('id');
      $statusSHAP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSHAP)->value('status_id');

      //SISTEMA MÓS 2
      $tag_oleoSM_2 = "LB 72 300 310 270 003 - 000007";
      $idAtividadeSM_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSM_2)->value('id');
      $idAnaliseSM_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSM_2)->max('id');
      $idLaudoSM_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSM_2)->value('id');
      $statusSM_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSM_2)->value('status_id');

      //SISTEMA ZÓS
      $tag_oleoSZ = "LB 72 300 310 273 003 - 000007";
      $idAtividadeSZ = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSZ)->value('id');
      $idAnaliseSZ = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSZ)->max('id');
      $idLaudoSZ = DB::table('laudos')->where('analise_id', '=', $idAnaliseSZ)->value('id');
      $statusSZ = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSZ)->value('status_id');

      //SIST LUBRIFICAÇÃO ACIONADORES PRINCIPAIS
      $tag_oleoSLAP = "LB 72 300 310 372 000 - 000008";
      $idAtividadeSLAP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSLAP)->value('id');
      $idAnaliseSLAP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSLAP)->max('id');
      $idLaudoSLAP = DB::table('laudos')->where('analise_id', '=', $idAnaliseSLAP)->value('id');
      $statusSLAP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSLAP)->value('status_id');





        return view('csn.relatoriosTecnicos.oleo_laminador_porao')
        ->with('idLaudoSHBP', $idLaudoSHBP)->with('statusSHBP', $statusSHBP)
        ->with('idLaudoSM_1', $idLaudoSM_1)->with('statusSM_1', $statusSM_1)
        ->with('idLaudoSHAP', $idLaudoSHAP)->with('statusSHAP', $statusSHAP)
        ->with('idLaudoSM_2', $idLaudoSM_2)->with('statusSM_2', $statusSM_2)
        ->with('idLaudoSZ', $idLaudoSZ)->with('statusSZ', $statusSZ)
        ->with('idLaudoSLAP', $idLaudoSLAP)->with('statusSLAP', $statusSLAP);



    }

    public function laminador_ofc()
    {

      //UNIDADE HIDRÁULICA WS3
      $tag_oleoUH_WS3 = "LB 72 900 910 078 003 - 000001";
      $idAtividadeUH_WS3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUH_WS3)->value('id');
      $idAnaliseUH_WS3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_WS3)->max('id');
      $idLaudoUH_WS3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_WS3)->value('id');
      $statusUH_WS3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_WS3)->value('status_id');

      //SIST. LUB. DOS EIXOS Z & X
      $tag_oleoSLE_Z_X = "LB 72 900 910 072 000 - 000001";
      $idAtividadeSLE_Z_X = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSLE_Z_X)->value('id');
      $idAnaliseSLE_Z_X = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSLE_Z_X)->max('id');
      $idLaudoSLE_Z_X = DB::table('laudos')->where('analise_id', '=', $idAnaliseSLE_Z_X)->value('id');
      $statusSLE_Z_X = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSLE_Z_X)->value('status_id');

      //UNIDADE HIDRÁULICA WS5
      $tag_oleoUH_WS5 = "LB 72 900 920 078 003 - 000001";
      $idAtividadeUH_WS5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUH_WS5)->value('id');
      $idAnaliseUH_WS5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_WS5)->max('id');
      $idLaudoUH_WS5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_WS5)->value('id');
      $statusUH_WS5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_WS5)->value('status_id');

        return view('csn.relatoriosTecnicos.oleo_laminador_ofc')
        ->with('idLaudoUH_WS3', $idLaudoUH_WS3)->with('statusUH_WS3', $statusUH_WS3)
        ->with('idLaudoSLE_Z_X', $idLaudoSLE_Z_X)->with('statusSLE_Z_X', $statusSLE_Z_X)
        ->with('idLaudoUH_WS5', $idLaudoUH_WS5)->with('statusUH_WS5', $statusUH_WS5);

    }

    public function utilidades_chiller_LGC()
    {

      //SISTEMA DE REFRIGERAÇÃO - CHILLER 1 - CIRCUITO 1
      $tag_oleoSR_CH1_C1 = "LB 72 400 410 921 000 - 000002";
      $idAtividadeSR_CH1_C1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSR_CH1_C1)->value('id');
      $idAnaliseSR_CH1_C1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSR_CH1_C1)->max('id');
      $idLaudoSR_CH1_C1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSR_CH1_C1)->value('id');
      $statusSR_CH1_C1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSR_CH1_C1)->value('status_id');

      //SISTEMA DE REFRIGERAÇÃO - CHILLER 1 - CIRCUITO 2
      $tag_oleoSR_CH1_C2 = "LB 72 400 410 921 000 - 000004";
      $idAtividadeSR_CH1_C2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSR_CH1_C2)->value('id');
      $idAnaliseSR_CH1_C2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSR_CH1_C2)->max('id');
      $idLaudoSR_CH1_C2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSR_CH1_C2)->value('id');
      $statusSR_CH1_C2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSR_CH1_C2)->value('status_id');

      //SISTEMA DE REFRIGERAÇÃO - CHILLER 2 - CIRCUITO 1
      $tag_oleoSR_CH2_C1 = "LB 72 400 410 924 000 - 000002";
      $idAtividadeSR_CH2_C1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSR_CH2_C1)->value('id');
      $idAnaliseSR_CH2_C1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSR_CH2_C1)->max('id');
      $idLaudoSR_CH2_C1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSR_CH2_C1)->value('id');
      $statusSR_CH2_C1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSR_CH2_C1)->value('status_id');

      //SISTEMA DE REFRIGERAÇÃO - CHILLER 2 - CIRCUITO 2
      $tag_oleoSR_CH2_C2 = "LB 72 400 410 924 000 - 000004";
      $idAtividadeSR_CH2_C2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSR_CH2_C2)->value('id');
      $idAnaliseSR_CH2_C2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSR_CH2_C2)->max('id');
      $idLaudoSR_CH2_C2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSR_CH2_C2)->value('id');
      $statusSR_CH2_C2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSR_CH2_C2)->value('status_id');






        return view('csn.relatoriosTecnicos.oleo_utilidades_chiller_LGC')
        ->with('idLaudoSR_CH1_C1', $idLaudoSR_CH1_C1)->with('statusSR_CH1_C1', $statusSR_CH1_C1)
        ->with('idLaudoSR_CH1_C2', $idLaudoSR_CH1_C2)->with('statusSR_CH1_C2', $statusSR_CH1_C2)
        ->with('idLaudoSR_CH2_C1', $idLaudoSR_CH2_C1)->with('statusSR_CH2_C1', $statusSR_CH2_C1)
        ->with('idLaudoSR_CH2_C2', $idLaudoSR_CH2_C2)->with('statusSR_CH2_C2', $statusSR_CH2_C2);
    }

    public function utilidades_chiller_LPC()
    {

      //SISTEMA DE REFRIGERAÇÃO - CHILLER - CIRCUTO 1
      $tag_oleoSR_CC1 = "LB 72 500 510 995 018 - 000008";
      $idAtividadeSR_CC1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSR_CC1)->value('id');
      $idAnaliseSR_CC1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSR_CC1)->max('id');
      $idLaudoSR_CC1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSR_CC1)->value('id');
      $statusSR_CC1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSR_CC1)->value('status_id');

      //SISTEMA DE REFRIGERAÇÃO - CHILLER - CIRCUTO 2
      $tag_oleoSR_CC2 = "LB 72 500 510 995 018 - 000008";
      $idAtividadeSR_CC2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSR_CC2)->value('id');
      $idAnaliseSR_CC2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSR_CC2)->max('id');
      $idLaudoSR_CC2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSR_CC2)->value('id');
      $statusSR_CC2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSR_CC2)->value('status_id');


        return view('csn.relatoriosTecnicos.oleo_utilidades_chiller_LPC')
        ->with('idLaudoSR_CC1', $idLaudoSR_CC1)->with('statusSR_CC1', $statusSR_CC1)
        ->with('idLaudoSR_CC2', $idLaudoSR_CC2)->with('statusSR_CC2', $statusSR_CC2);
    }

    public function galvanizacao_entrada()
    {

      //UNIDADE HIDRAULICA CARRO ENTRADA Nº1
      $tag_oleoUHCE_N1 = "LB 72 400 410 007 048 - 000001";
      $idAtividadeUHCE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHCE_N1)->value('id');
      $idAnaliseUHCE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHCE_N1)->max('id');
      $idLaudoUHCE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHCE_N1)->value('id');
      $statusUHCE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHCE_N1)->value('status_id');

      //UNIDADE HIDRAULICA CARRO ENTRADA Nº2
      $tag_oleoUHCE_N2 = "LB 72 400 410 059 048 - 000001";
      $idAtividadeUHCE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHCE_N2)->value('id');
      $idAnaliseUHCE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHCE_N2)->max('id');
      $idLaudoUHCE_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHCE_N2)->value('id');
      $statusUHCE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHCE_N2)->value('status_id');

      //ACIONA. DOS CABEÇOTES MAQUINA DE SOLDA
      $tag_oleoACMS = "LB 72 400 410 115 024 - 000004";
      $idAtividadeACMS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoACMS)->value('id');
      $idAnaliseACMS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACMS)->max('id');
      $idLaudoACMS = DB::table('laudos')->where('analise_id', '=', $idAnaliseACMS)->value('id');
      $statusACMS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACMS)->value('status_id');

      //ACIONA. DOS CABEÇOTES MAQUINA DE SOLDA
      $tag_oleoACMS_2 = "LB 72 400 410 115 021 - 000004";
      $idAtividadeACMS_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoACMS_2)->value('id');
      $idAnaliseACMS_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACMS_2)->max('id');
      $idLaudoACMS_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseACMS_2)->value('id');
      $statusACMS_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACMS_2)->value('status_id');

      //DESEMPENADEIRA Nº2
      $tag_oleoDESP_N2 = "LB 72 400 410 085 006 - 000006";
      $idAtividadeDESP_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoDESP_N2)->value('id');
      $idAnaliseDESP_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESP_N2)->max('id');
      $idLaudoDESP_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESP_N2)->value('id');
      $statusDESP_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESP_N2)->value('status_id');

      //PUXADOR TIRA DESEMPENADEIRA Nº2
      $tag_oleoPTD_N2 = "LB 72 400 410 083 033 - 000002";
      $idAtividadePTD_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPTD_N2)->value('id');
      $idAnalisePTD_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePTD_N2)->max('id');
      $idLaudoPTD_N2 = DB::table('laudos')->where('analise_id', '=', $idAnalisePTD_N2)->value('id');
      $statusPTD_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePTD_N2)->value('status_id');

      //DESEMPENADEIRA Nº1
      $tag_oleoDESP_N1 = "LB 72 400 410 035 006 - 000008";
      $idAtividadeDESP_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoDESP_N1)->value('id');
      $idAnaliseDESP_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESP_N1)->max('id');
      $idLaudoDESP_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESP_N1)->value('id');
      $statusDESP_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESP_N1)->value('status_id');

      //PUXADOR TIRA DESEMPENADEIRA Nº1
      $tag_oleoPTD_N1 = "LB 72 400 410 033 033 - 000002";
      $idAtividadePTD_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPTD_N1)->value('id');
      $idAnalisePTD_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePTD_N1)->max('id');
      $idLaudoPTD_N1 = DB::table('laudos')->where('analise_id', '=', $idAnalisePTD_N1)->value('id');
      $statusPTD_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePTD_N1)->value('status_id');

      //ACIONAMENTO PRINCIPAL DESENROLADEIRA Nº1
      $tag_oleoAPD_N1 = "LB 72 400 410 019 009 - 000006";
      $idAtividadeAPD_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPD_N1)->value('id');
      $idAnaliseAPD_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD_N1)->max('id');
      $idLaudoAPD_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPD_N1)->value('id');
      $statusAPD_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD_N1)->value('status_id');

      //ACIONAMENTO PRINCIPAL DESENROLADEIRA Nº2
      $tag_oleoAPD_N2 = "LB 72 400 410 069 009 - 000005";
      $idAtividadeAPD_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPD_N2)->value('id');
      $idAnaliseAPD_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPD_N2)->max('id');
      $idLaudoAPD_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPD_N2)->value('id');
      $statusAPD_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPD_N2)->value('status_id');

      //3HI PINCH ROLL
      $tag_oleo3HI_PR = "LB 72 400 410 105 003 - 000001";
      $idAtividade3HI_PR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleo3HI_PR)->value('id');
      $idAnalise3HI_PR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividade3HI_PR)->max('id');
      $idLaudo3HI_PR = DB::table('laudos')->where('analise_id', '=', $idAnalise3HI_PR)->value('id');
      $status3HI_PR = DB::table('preditiva_analises')->where('id', '=', $idAnalise3HI_PR)->value('status_id');

      //UNIDADE HIDRÁULICA PRINCIPAL ENTRADA
      $tag_oleoUHPE = "LB 72 400 410 011 039 - 000001";
      $idAtividadeUHPE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHPE)->value('id');
      $idAnaliseUHPE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPE)->max('id');
      $idLaudoUHPE = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHPE)->value('id');
      $statusUHPE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPE)->value('status_id');

      //UNIDADE HIDR. FIFE DESENROLADEIRA Nº1
      $tag_oleoUHFD_N1 = "LB 72 400 410 017 036 - 000002";
      $idAtividadeUHFD_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHFD_N1)->value('id');
      $idAnaliseUHFD_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFD_N1)->max('id');
      $idLaudoUHFD_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFD_N1)->value('id');
      $statusUHFD_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFD_N1)->value('status_id');

      //UNIDADE HIDR. FIFE DESENROLADEIRA Nº2
      $tag_oleoUHFD_N2 = "LB 72 400 410 067 036 - 000001";
      $idAtividadeUHFD_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHFD_N2)->value('id');
      $idAnaliseUHFD_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFD_N2)->max('id');
      $idLaudoUHFD_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFD_N2)->value('id');
      $statusUHFD_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFD_N2)->value('status_id');




        return view('csn.relatoriosTecnicos.oleo_galvanizacao_entrada')
        ->with('idLaudoUHCE_N1', $idLaudoUHCE_N1)->with('statusUHCE_N1', $statusUHCE_N1)
        ->with('idLaudoUHCE_N2', $idLaudoUHCE_N2)->with('statusUHCE_N2', $statusUHCE_N2)
        ->with('idLaudoACMS', $idLaudoACMS)->with('statusACMS', $statusACMS)
        ->with('idLaudoACMS_2', $idLaudoACMS_2)->with('statusACMS_2', $statusACMS_2)
        ->with('idLaudoDESP_N2', $idLaudoDESP_N2)->with('statusDESP_N2', $statusDESP_N2)
        ->with('idLaudoPTD_N2', $idLaudoPTD_N2)->with('statusPTD_N2', $statusPTD_N2)
        ->with('idLaudoDESP_N1', $idLaudoDESP_N1)->with('statusDESP_N1', $statusDESP_N1)
        ->with('idLaudoPTD_N1', $idLaudoPTD_N1)->with('statusPTD_N1', $statusPTD_N1)
        ->with('idLaudoAPD_N1', $idLaudoAPD_N1)->with('statusAPD_N1', $statusAPD_N1)
        ->with('idLaudoAPD_N2', $idLaudoAPD_N2)->with('statusAPD_N2', $statusAPD_N2)
        ->with('idLaudo3HI_PR', $idLaudo3HI_PR)->with('status3HI_PR', $status3HI_PR)
        ->with('idLaudoUHPE', $idLaudoUHPE)->with('statusUHPE', $statusUHPE)
        ->with('idLaudoUHFD_N1', $idLaudoUHFD_N1)->with('statusUHFD_N1', $statusUHFD_N1)
        ->with('idLaudoUHFD_N2', $idLaudoUHFD_N2)->with('statusUHFD_N2', $statusUHFD_N2);
    }

    public function galvanizacao_limpeza_boiler()
    {

      //UNIDADE HIDR. FIFE ROLO GUIA ENTR. FORNO
      $tag_oleoUHFGEF = "LB 72 400 410 210 036 - 000003";
      $idAtividadeUHFGEF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHFGEF)->value('id');
      $idAnaliseUHFGEF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFGEF)->max('id');
      $idLaudoUHFGEF = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFGEF)->value('id');
      $statusUHFGEF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFGEF)->value('status_id');


        return view('csn.relatoriosTecnicos.oleo_galvanizacao_limpeza_boiler')
        ->with('idLaudoUHFGEF', $idLaudoUHFGEF)->with('statusUHFGEF', $statusUHFGEF);
    }

    public function galvanizacao_limpeza_escovas()
    {

      //UNIDADE FIFE ROLO GUIA Nº 1, 1A E 1B
      $tag_oleoUFRG_N1 = "LB 72 400 410 163 036 - 000001";
      $idAtividadeUFRG_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUFRG_N1)->value('id');
      $idAnaliseUFRG_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFRG_N1)->max('id');
      $idLaudoUFRG_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUFRG_N1)->value('id');
      $statusUFRG_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFRG_N1)->value('status_id');

      //UNID FIFE GUIA 1C E 2 ACUMULADOR ENTRADA
      $tag_oleoUFG_1C_2 = "LB 72 400 410 169 033 - 000002";
      $idAtividadeUFG_1C_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUFG_1C_2)->value('id');
      $idAnaliseUFG_1C_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFG_1C_2)->max('id');
      $idLaudoUFG_1C_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUFG_1C_2)->value('id');
      $statusUFG_1C_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFG_1C_2)->value('status_id');

      //ACIONAMENTO DO ACUMULADOR DE ENTRADA
      $tag_oleoAAE = "LB 72 400 410 165 012 - 000003";
      $idAtividadeAAE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAAE)->value('id');
      $idAnaliseAAE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAAE)->max('id');
      $idLaudoAAE = DB::table('laudos')->where('analise_id', '=', $idAnaliseAAE)->value('id');
      $statusAAE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAAE)->value('status_id');

      //ROLO 1 BRIDLE Nº 1
      $tag_oleoR1_BRIDLE_N1 = "LB 72 400 410 157 015 - 000005";
      $idAtividadeR1_BRIDLE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR1_BRIDLE_N1)->value('id');
      $idAnaliseR1_BRIDLE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BRIDLE_N1)->max('id');
      $idLaudoR1_BRIDLE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BRIDLE_N1)->value('id');
      $statusR1_BRIDLE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BRIDLE_N1)->value('status_id');

      //ROLO 2 BRIDLE Nº 1
      $tag_oleoR2_BRIDLE_N1 = "LB 72 400 410 158 015 - 000005";
      $idAtividadeR2_BRIDLE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR2_BRIDLE_N1)->value('id');
      $idAnaliseR2_BRIDLE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BRIDLE_N1)->max('id');
      $idLaudoR2_BRIDLE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BRIDLE_N1)->value('id');
      $statusR2_BRIDLE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BRIDLE_N1)->value('status_id');

        return view('csn.relatoriosTecnicos.oleo_galvanizacao_limpeza_escovas')
        ->with('idLaudoUFRG_N1', $idLaudoUFRG_N1)->with('statusUFRG_N1', $statusUFRG_N1)
        ->with('idLaudoUFG_1C_2', $idLaudoUFG_1C_2)->with('statusUFG_1C_2', $statusUFG_1C_2)
        ->with('idLaudoAAE', $idLaudoAAE)->with('statusAAE', $statusAAE)
        ->with('idLaudoR1_BRIDLE_N1', $idLaudoR1_BRIDLE_N1)->with('statusR1_BRIDLE_N1', $statusR1_BRIDLE_N1)
        ->with('idLaudoR2_BRIDLE_N1', $idLaudoR2_BRIDLE_N1)->with('statusR2_BRIDLE_N1', $statusR2_BRIDLE_N1);

    }

    public function galvanizacao_forno()
    {

      //ROLO 2 BRIDLE Nº 2
      $tag_oleoR2_BN2 = "LB 72 400 410 205 018 - 000004";
      $idAtividadeR2_BN2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR2_BN2)->value('id');
      $idAnaliseR2_BN2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BN2)->max('id');
      $idLaudoR2_BN2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BN2)->value('id');
      $statusR2_BN2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BN2)->value('status_id');

      //ROLO 1 BRIDLE Nº 2
      $tag_oleoR1_BN2 = "LB 72 400 410 204 015 - 000004";
      $idAtividadeR1_BN2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR1_BN2)->value('id');
      $idAnaliseR1_BN2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BN2)->max('id');
      $idLaudoR1_BN2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BN2)->value('id');
      $statusR1_BN2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BN2)->value('status_id');

      //DEFLETOR 16 JC
      $tag_oleoD_16JC = "LB 72 400 410 251 009 - 000002";
      $idAtividadeD_16JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoD_16JC)->value('id');
      $idAnaliseD_16JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD_16JC)->max('id');
      $idLaudoD_16JC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD_16JC)->value('id');
      $statusD_16JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD_16JC)->value('status_id');

      //DEFLETOR 17 JC
      $tag_oleoD_17JC = "LB 72 400 410 253 009 - 000005";
      $idAtividadeD_17JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoD_17JC)->value('id');
      $idAnaliseD_17JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeD_17JC)->max('id');
      $idLaudoD_17JC = DB::table('laudos')->where('analise_id', '=', $idAnaliseD_17JC)->value('id');
      $statusD_17JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseD_17JC)->value('status_id');

      //UNIDADE HIDR. FIFE ROLO GUIA 15 JC
      $tag_oleoUHFRG_15JC = "LB 72 400 410 249 033 - 000003";
      $idAtividadeUHFRG_15JC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHFRG_15JC)->value('id');
      $idAnaliseUHFRG_15JC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFRG_15JC)->max('id');
      $idLaudoUHFRG_15JC = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFRG_15JC)->value('id');
      $statusUHFRG_15JC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFRG_15JC)->value('status_id');




        return view('csn.relatoriosTecnicos.oleo_galvanizacao_forno')
        ->with('idLaudoR2_BN2', $idLaudoR2_BN2)->with('statusR2_BN2', $statusR2_BN2)
        ->with('idLaudoR1_BN2', $idLaudoR1_BN2)->with('statusR1_BN2', $statusR1_BN2)
        ->with('idLaudoD_16JC', $idLaudoD_16JC)->with('statusD_16JC', $statusD_16JC)
        ->with('idLaudoD_17JC', $idLaudoD_17JC)->with('statusD_17JC', $statusD_17JC)
        ->with('idLaudoUHFRG_15JC', $idLaudoUHFRG_15JC)->with('statusUHFRG_15JC', $statusUHFRG_15JC);
    }

    public function galvanizacao_apc_porao()
    {

      //ROLO 1 BRIDLE Nº 4
      $tag_oleoR1_BN4 = "LB 72 400 410 339 027 - 000005";
      $idAtividadeR1_BN4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR1_BN4)->value('id');
      $idAnaliseR1_BN4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BN4)->max('id');
      $idLaudoR1_BN4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BN4)->value('id');
      $statusR1_BN4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BN4)->value('status_id');

      //ROLO 4 BRIDLE Nº 4
      $tag_oleoR4_BN4 = "LB 72 400 410 343 027 - 000002";
      $idAtividadeR4_BN4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR4_BN4)->value('id');
      $idAnaliseR4_BN4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR4_BN4)->max('id');
      $idLaudoR4_BN4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR4_BN4)->value('id');
      $statusR4_BN4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR4_BN4)->value('status_id');

      //ROLO 2 BRIDLE Nº 4
      $tag_oleoR2_BN4 = "LB 72 400 410 340 027 - 000005";
      $idAtividadeR2_BN4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR2_BN4)->value('id');
      $idAnaliseR2_BN4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BN4)->max('id');
      $idLaudoR2_BN4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BN4)->value('id');
      $statusR2_BN4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BN4)->value('status_id');

      //ROLO 3 BRIDLE Nº 4
      $tag_oleoR3_BN4 = "LB 72 400 410 342 027 - 000002";
      $idAtividadeR3_BN4 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR3_BN4)->value('id');
      $idAnaliseR3_BN4 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR3_BN4)->max('id');
      $idLaudoR3_BN4 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR3_BN4)->value('id');
      $statusR3_BN4 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR3_BN4)->value('status_id');

      //UNIDADE HIDRÁULICA DOS POTES FIFE
      $tag_oleoUHPF = "LB 72 400 410 284 003 - 000001";
      $idAtividadeUHPF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHPF)->value('id');
      $idAnaliseUHPF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPF)->max('id');
      $idLaudoUHPF = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHPF)->value('id');
      $statusUHPF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPF)->value('status_id');

      //UNIDADE HIDRÁULICA FIFE ROLO GUIA Nº 03
      $tag_oleoUHFRG_N3 = "LB 72 400 410 331 036 - 000004";
      $idAtividadeUHFRG_N3 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHFRG_N3)->value('id');
      $idAnaliseUHFRG_N3 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFRG_N3)->max('id');
      $idLaudoUHFRG_N3 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFRG_N3)->value('id');
      $statusUHFRG_N3 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFRG_N3)->value('status_id');

      //ELEVAÇÃO DOS POTES 7
      $tag_oleoEP_7 = "LB 72 400 410 283 063 - 000003";
      $idAtividadeEP_7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoEP_7)->value('id');
      $idAnaliseEP_7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP_7)->max('id');
      $idLaudoEP_7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP_7)->value('id');
      $statusEP_7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP_7)->value('status_id');

      //ELEVAÇÃO DOS POTES 9
      $tag_oleoEP_9 = "LB 72 400 410 283 069 - 000004";
      $idAtividadeEP_9 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoEP_9)->value('id');
      $idAnaliseEP_9 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP_9)->max('id');
      $idLaudoEP_9 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP_9)->value('id');
      $statusEP_9 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP_9)->value('status_id');

      //ELEVAÇÃO DOS POTES 5
      $tag_oleoEP_5 = "LB 72 400 410 283 027 - 000005";
      $idAtividadeEP_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoEP_5)->value('id');
      $idAnaliseEP_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP_5)->max('id');
      $idLaudoEP_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP_5)->value('id');
      $statusEP_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP_5)->value('status_id');

      //ELEVAÇÃO DOS POTES 6
      $tag_oleoEP_6 = "LB 72 400 410 283 060 - 000001";
      $idAtividadeEP_6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoEP_6)->value('id');
      $idAnaliseEP_6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP_6)->max('id');
      $idLaudoEP_6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP_6)->value('id');
      $statusEP_6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP_6)->value('status_id');

      //ELEVAÇÃO DOS POTES 8
      $tag_oleoEP_8 = "LB 72 400 410 283 066 - 000002";
      $idAtividadeEP_8 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoEP_8)->value('id');
      $idAnaliseEP_8 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeEP_8)->max('id');
      $idLaudoEP_8 = DB::table('laudos')->where('analise_id', '=', $idAnaliseEP_8)->value('id');
      $statusEP_8 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseEP_8)->value('status_id');




        return view('csn.relatoriosTecnicos.oleo_galvanizacao_apc_porao')
        ->with('idLaudoR1_BN4', $idLaudoR1_BN4)->with('statusR1_BN4', $statusR1_BN4)
        ->with('idLaudoR4_BN4', $idLaudoR4_BN4)->with('statusR4_BN4', $statusR4_BN4)
        ->with('idLaudoR2_BN4', $idLaudoR2_BN4)->with('statusR2_BN4', $statusR2_BN4)
        ->with('idLaudoR3_BN4', $idLaudoR3_BN4)->with('statusR3_BN4', $statusR3_BN4)
        ->with('idLaudoUHPF', $idLaudoUHPF)->with('statusUHPF', $statusUHPF)
        ->with('idLaudoUHFRG_N3', $idLaudoUHFRG_N3)->with('statusUHFRG_N3', $statusUHFRG_N3)
        ->with('idLaudoEP_7', $idLaudoEP_7)->with('statusEP_7', $statusEP_7)
        ->with('idLaudoEP_9', $idLaudoEP_9)->with('statusEP_9', $statusEP_9)
        ->with('idLaudoEP_5', $idLaudoEP_5)->with('statusEP_5', $statusEP_5)
        ->with('idLaudoEP_6', $idLaudoEP_6)->with('statusEP_6', $statusEP_6)
        ->with('idLaudoEP_8', $idLaudoEP_8)->with('statusEP_8', $statusEP_8);



    }

    public function galvanizacao_saida_laminador()
    {


      //UNIDADE HIDRAULICA LAMINADOR
      $tag_oleoUHL = "LB 72 400 410 367 023 - 000003";
      $idAtividadeUHL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHL)->value('id');
      $idAnaliseUHL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHL)->max('id');
      $idLaudoUHL = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHL)->value('id');
      $statusUHL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHL)->value('status_id');

      //UNIDADE HIDRÁULICA APLICADOR DE RESINA 7
      $tag_oleoUHAR = "LB 72 400 410 400 030 - 000001";
      $idAtividadeUHAR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHAR)->value('id');
      $idAnaliseUHAR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHAR)->max('id');
      $idLaudoUHAR = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHAR)->value('id');
      $statusUHAR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHAR)->value('status_id');

      //UNIDADE HIDRÁULICA APLICADOR DE CROMO 8
      $tag_oleoUHAC = "LB 72 400 410 402 030 - 000001";
      $idAtividadeUHAC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHAC)->value('id');
      $idAnaliseUHAC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHAC)->max('id');
      $idLaudoUHAC = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHAC)->value('id');
      $statusUHAC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHAC)->value('status_id');

      //UNID. FIFE ACUMUL. SAIDA E ROLO GUIA 5
      $tag_oleoUFASRG_5 = "LB 72 400 410 425 036 - 000001";
      $idAtividadeUFASRG_5 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUFASRG_5)->value('id');
      $idAnaliseUFASRG_5 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUFASRG_5)->max('id');
      $idLaudoUFASRG_5 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUFASRG_5)->value('id');
      $statusUFASRG_5 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUFASRG_5)->value('status_id');

      //ACIONAMENTO PRINCIPAL DO LAMINADOR 2
      $tag_oleoAPL = "LB 72 400 410 344 012 - 000004";
      $idAtividadeAPL = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPL)->value('id');
      $idAnaliseAPL = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPL)->max('id');
      $idLaudoAPL = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPL)->value('id');
      $statusAPL = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPL)->value('status_id');

      //ACIONAMENTO PRINCIPAL DO LAMINADOR 1
      $tag_oleoAPL_1 = "LB 72 400 410 344 009 - 000006";
      $idAtividadeAPL_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPL_1)->value('id');
      $idAnaliseAPL_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPL_1)->max('id');
      $idLaudoAPL_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPL_1)->value('id');
      $statusAPL_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPL_1)->value('status_id');

      //ACIONAMENTO DO ACUMULADOR DE SAÍDA
      $tag_oleoAAS = "LB 72 400 410 421 012 - 000003";
      $idAtividadeAAS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAAS)->value('id');
      $idAnaliseAAS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAAS)->max('id');
      $idLaudoAAS = DB::table('laudos')->where('analise_id', '=', $idAnaliseAAS)->value('id');
      $statusAAS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAAS)->value('status_id');

      //ROLO 1 BRIDLE 5B
      $tag_oleoR1_B5B = "LB 72 400 410 377 015 - 000005";
      $idAtividadeR1_B5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR1_B5B)->value('id');
      $idAnaliseR1_B5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_B5B)->max('id');
      $idLaudoR1_B5B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_B5B)->value('id');
      $statusR1_B5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_B5B)->value('status_id');

      //ROLO 1 BRIDLE 5A
      $tag_oleoR1_B5A = "LB 72 400 410 375 015 - 000005";
      $idAtividadeR1_B5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR1_B5A)->value('id');
      $idAnaliseR1_B5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_B5A)->max('id');
      $idLaudoR1_B5A = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_B5A)->value('id');
      $statusR1_B5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_B5A)->value('status_id');

      //ROLO 2 BRIDLE 5A
      $tag_oleoR2_B5A = "LB 72 400 410 376 015 - 000004";
      $idAtividadeR2_B5A = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR2_B5A)->value('id');
      $idAnaliseR2_B5A = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_B5A)->max('id');
      $idLaudoR2_B5A = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_B5A)->value('id');
      $statusR2_B5A = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_B5A)->value('status_id');

      //ROLO 2 BRIDLE 5B
      $tag_oleoR2_B5B = "LB 72 400 410 378 015 - 000003";
      $idAtividadeR2_B5B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR2_B5B)->value('id');
      $idAnaliseR2_B5B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_B5B)->max('id');
      $idLaudoR2_B5B = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_B5B)->value('id');
      $statusR2_B5B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_B5B)->value('status_id');

      //ROLO 2 BRIDLE Nº 6
      $tag_oleoR2_BN6 = "LB 72 400 410 417 015 - 000002";
      $idAtividadeR2_BN6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR2_BN6)->value('id');
      $idAnaliseR2_BN6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BN6)->max('id');
      $idLaudoR2_BN6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BN6)->value('id');
      $statusR2_BN6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BN6)->value('status_id');

      //ROLO 1 BRIDLE Nº 6
      $tag_oleoR1_BN6 = "LB 72 400 410 415 015 - 000005";
      $idAtividadeR1_BN6 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR1_BN6)->value('id');
      $idAnaliseR1_BN6 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BN6)->max('id');
      $idLaudoR1_BN6 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BN6)->value('id');
      $statusR1_BN6 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BN6)->value('status_id');





        return view('csn.relatoriosTecnicos.oleo_galvanizacao_saida_laminador')
        ->with('idLaudoUHL', $idLaudoUHL)->with('statusUHL', $statusUHL)
        ->with('idLaudoUHAR', $idLaudoUHAR)->with('statusUHAR', $statusUHAR)
        ->with('idLaudoUHAC', $idLaudoUHAC)->with('statusUHAC', $statusUHAC)
        ->with('idLaudoUFASRG_5', $idLaudoUFASRG_5)->with('statusUFASRG_5', $statusUFASRG_5)
        ->with('idLaudoAPL', $idLaudoAPL)->with('statusAPL', $statusAPL)
        ->with('idLaudoAPL_1', $idLaudoAPL_1)->with('statusAPL_1', $statusAPL_1)
        ->with('idLaudoAAS', $idLaudoAAS)->with('statusAAS', $statusAAS)
        ->with('idLaudoR1_B5B', $idLaudoR1_B5B)->with('statusR1_B5B', $statusR1_B5B)
        ->with('idLaudoR1_B5A', $idLaudoR1_B5A)->with('statusR1_B5A', $statusR1_B5A)
        ->with('idLaudoR2_B5A', $idLaudoR2_B5A)->with('statusR2_B5A', $statusR2_B5A)
        ->with('idLaudoR2_B5B', $idLaudoR2_B5B)->with('statusR2_B5B', $statusR2_B5B)
        ->with('idLaudoR2_BN6', $idLaudoR2_BN6)->with('statusR2_BN6', $statusR2_BN6)
        ->with('idLaudoR1_BN6', $idLaudoR1_BN6)->with('statusR1_BN6', $statusR1_BN6);


    }

    public function galvanizacao_saida()
    {

      //UNIDADE HIDR. PRINCIPAL SAIDA
      $tag_oleoUHPS = "LB 72 400 410 541 063 - 000001";
      $idAtividadeUHPS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHPS)->value('id');
      $idAnaliseUHPS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHPS)->max('id');
      $idLaudoUHPS = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHPS)->value('id');
      $statusUHPS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHPS)->value('status_id');

      //UNIDADE HIDR. FIFE ENROLADEIRA Nº 01
      $tag_oleoUHFE_N1 = "LB 72 400 410 475 036 - 000001";
      $idAtividadeUHFE_N1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHFE_N1)->value('id');
      $idAnaliseUHFE_N1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N1)->max('id');
      $idLaudoUHFE_N1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFE_N1)->value('id');
      $statusUHFE_N1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N1)->value('status_id');

      //UNIDADE HIDR. FIFE ENROLADEIRA Nº 02
      $tag_oleoUHFE_N2 = "LB 72 400 410 499 036 - 000001";
      $idAtividadeUHFE_N2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHFE_N2)->value('id');
      $idAnaliseUHFE_N2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHFE_N2)->max('id');
      $idLaudoUHFE_N2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHFE_N2)->value('id');
      $statusUHFE_N2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHFE_N2)->value('status_id');

      //ROLO 1 BRIDLE Nº 7
      $tag_oleoR1_BN7 = "LB 72 400 410 455 015 - 000004";
      $idAtividadeR1_BN7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR1_BN7)->value('id');
      $idAnaliseR1_BN7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR1_BN7)->max('id');
      $idLaudoR1_BN7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR1_BN7)->value('id');
      $statusR1_BN7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR1_BN7)->value('status_id');

      //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº01
      $tag_oleoAPEN_1 = "LB 72 400 410 477 009 - 000005";
      $idAtividadeAPEN_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPEN_1)->value('id');
      $idAnaliseAPEN_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPEN_1)->max('id');
      $idLaudoAPEN_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPEN_1)->value('id');
      $statusAPEN_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPEN_1)->value('status_id');

      //ACIONAMENTO PRINCIPAL ENROLADEIRA Nº 02
      $tag_oleoAPEN_2 = "LB 72 400 410 501 009 - 000004";
      $idAtividadeAPEN_2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPEN_2)->value('id');
      $idAnaliseAPEN_2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPEN_2)->max('id');
      $idLaudoAPEN_2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPEN_2)->value('id');
      $statusAPEN_2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPEN_2)->value('status_id');

      //ROLO 2 BRIDLE Nº 7
      $tag_oleoR2_BN7 = "LB 72 400 410 456 015 - 000004";
      $idAtividadeR2_BN7 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoR2_BN7)->value('id');
      $idAnaliseR2_BN7 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeR2_BN7)->max('id');
      $idLaudoR2_BN7 = DB::table('laudos')->where('analise_id', '=', $idAnaliseR2_BN7)->value('id');
      $statusR2_BN7 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseR2_BN7)->value('status_id');





        return view('csn.relatoriosTecnicos.oleo_galvanizacao_saida')
        ->with('idLaudoUHPS', $idLaudoUHPS)->with('statusUHPS', $statusUHPS)
        ->with('idLaudoUHFE_N1', $idLaudoUHFE_N1)->with('statusUHFE_N1', $statusUHFE_N1)
        ->with('idLaudoUHFE_N2', $idLaudoUHFE_N2)->with('statusUHFE_N2', $statusUHFE_N2)
        ->with('idLaudoR1_BN7', $idLaudoR1_BN7)->with('statusR1_BN7', $statusR1_BN7)
        ->with('idLaudoAPEN_1', $idLaudoAPEN_1)->with('statusAPEN_1', $statusAPEN_1)
        ->with('idLaudoAPEN_2', $idLaudoAPEN_2)->with('statusAPEN_2', $statusAPEN_2)
        ->with('idLaudoR2_BN7', $idLaudoR2_BN7)->with('statusR2_BN7', $statusR2_BN7);

    }

    public function pintura_entrada()
    {

      //UNID. HIDRÁULICA CARRO BOBINA 02
      $tag_oleoUHCB_02 = "LB 72 500 510 027 037 - 000001";
      $idAtividadeUHCB_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHCB_02)->value('id');
      $idAnaliseUHCB_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHCB_02)->max('id');
      $idLaudoUHCB_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHCB_02)->value('id');
      $statusUHCB_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHCB_02)->value('status_id');

      //UNID. HIDRÁULICA CARRO BOBINA ENTRADA 01
      $tag_oleoUHCBE_1 = "LB 72 500 510 005 037 - 000002";
      $idAtividadeUHCBE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHCBE_1)->value('id');
      $idAnaliseUHCBE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHCBE_1)->max('id');
      $idLaudoUHCBE_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHCBE_1)->value('id');
      $statusUHCBE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHCBE_1)->value('status_id');

      //GRAMPEADEIRA
      $tag_oleoGRAMP = "LB 72 500 510 066 019 - 000001";
      $idAtividadeGRAMP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoGRAMP)->value('id');
      $idAnaliseGRAMP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeGRAMP)->max('id');
      $idLaudoGRAMP = DB::table('laudos')->where('analise_id', '=', $idAnaliseGRAMP)->value('id');
      $statusGRAMP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseGRAMP)->value('status_id');

      //DESENROLADEIRA 01
      $tag_oleoDESEN_01 = "LB 72 500 510 009 001 - 000003";
      $idAtividadeDESEN_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoDESEN_01)->value('id');
      $idAnaliseDESEN_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEN_01)->max('id');
      $idLaudoDESEN_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEN_01)->value('id');
      $statusDESEN_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEN_01)->value('status_id');

      //DESENROLADEIRA 02
      $tag_oleoDESEN_02 = "LB 72 500 510 031 001 - 000009";
      $idAtividadeDESEN_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoDESEN_02)->value('id');
      $idAnaliseDESEN_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeDESEN_02)->max('id');
      $idLaudoDESEN_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseDESEN_02)->value('id');
      $statusDESEN_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseDESEN_02)->value('status_id');

      //FIFE DESENROLADEIRA 01
      $tag_oleoFD_01 = "LB 72 500 510 007 021 - 000002";
      $idAtividadeFD_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoFD_01)->value('id');
      $idAnaliseFD_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFD_01)->max('id');
      $idLaudoFD_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFD_01)->value('id');
      $statusFD_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFD_01)->value('status_id');

      //FIFE DESENROLADEIRA 02
      $tag_oleoFD_02 = "LB 72 500 510 029 021 - 000001";
      $idAtividadeFD_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoFD_02)->value('id');
      $idAnaliseFD_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFD_02)->max('id');
      $idLaudoFD_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseFD_02)->value('id');
      $statusFD_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFD_02)->value('status_id');

      //UNIDADE HIDRÁULICA DE ENTRADA
      $tag_oleoUHE = "LB 72 500 510 078 022 - 000001";
      $idAtividadeUHE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHE)->value('id');
      $idAnaliseUHE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHE)->max('id');
      $idLaudoUHE = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHE)->value('id');
      $statusUHE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHE)->value('status_id');




        return view('csn.relatoriosTecnicos.oleo_pintura_entrada')
        ->with('idLaudoUHCB_02', $idLaudoUHCB_02)->with('statusUHCB_02', $statusUHCB_02)
        ->with('idLaudoUHCBE_1', $idLaudoUHCBE_1)->with('statusUHCBE_1', $statusUHCBE_1)
        ->with('idLaudoGRAMP', $idLaudoGRAMP)->with('statusGRAMP', $statusGRAMP)
        ->with('idLaudoDESEN_01', $idLaudoDESEN_01)->with('statusDESEN_01', $statusDESEN_01)
        ->with('idLaudoDESEN_02', $idLaudoDESEN_02)->with('statusDESEN_02', $statusDESEN_02)
        ->with('idLaudoFD_01', $idLaudoFD_01)->with('statusFD_01', $statusFD_01)
        ->with('idLaudoFD_02', $idLaudoFD_02)->with('statusFD_02', $statusFD_02)
        ->with('idLaudoUHE', $idLaudoUHE)->with('statusUHE', $statusUHE);


    }

    public function pintura_processo1()
    {

      //CONJUNTO TENSOR 01 - ROLO M1
      $tag_oleoCT1_RM1 = "LB 72 500 510 084 013 - 000010";
      $idAtividadeCT1_RM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT1_RM1)->value('id');
      $idAnaliseCT1_RM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT1_RM1)->max('id');
      $idLaudoCT1_RM1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT1_RM1)->value('id');
      $statusCT1_RM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT1_RM1)->value('status_id');

      //4 CONJUNTO TENSOR 02 - ROLO M2
      $tag_oleoCT2_RM2 = "LB 72 500 510 098 016 - 000010";
      $idAtividadeCT2_RM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT2_RM2)->value('id');
      $idAnaliseCT2_RM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT2_RM2)->max('id');
      $idLaudoCT2_RM2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT2_RM2)->value('id');
      $statusCT2_RM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT2_RM2)->value('status_id');

      //3 CONJUNTO TENSOR 02 - ROLO M1
      $tag_oleoCT2_RM1 = "LB 72 500 510 098 013 - 000010";
      $idAtividadeCT2_RM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT2_RM1)->value('id');
      $idAnaliseCT2_RM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT2_RM1)->max('id');
      $idLaudoCT2_RM1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT2_RM1)->value('id');
      $statusCT2_RM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT2_RM1)->value('status_id');

      //CONJUNTO TENSOR 01 - ROLO M2
      $tag_oleoCT1_RM2 = "LB 72 500 510 084 016 - 000010";
      $idAtividadeCT1_RM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT1_RM2)->value('id');
      $idAnaliseCT1_RM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT1_RM2)->max('id');
      $idLaudoCT1_RM2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT1_RM2)->value('id');
      $statusCT1_RM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT1_RM2)->value('status_id');

      //SISTEMA CORRETOR 02
      $tag_oleoSC_02 = "LB 72 500 510 096 025 - 000001";
      $idAtividadeSC_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSC_02)->value('id');
      $idAnaliseSC_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_02)->max('id');
      $idLaudoSC_02 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_02)->value('id');
      $statusSC_02 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_02)->value('status_id');

      //SISTEMA CORRETOR 01
      $tag_oleoSC_01 = "LB 72 500 510 086 025 - 000001";
      $idAtividadeSC_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSC_01)->value('id');
      $idAnaliseSC_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_01)->max('id');
      $idLaudoSC_01 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_01)->value('id');
      $statusSC_01 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_01)->value('status_id');

      //ACIONAMENTO ACUMULADOR DE ENTRADA
      $tag_oleoAAE_1 = "LB 72 500 510 088 007 - 000003";
      $idAtividadeAAE_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAAE_1)->value('id');
      $idAnaliseAAE_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAAE_1)->max('id');
      $idLaudoAAE_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseAAE_1)->value('id');
      $statusAAE_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAAE_1)->value('status_id');




        return view('csn.relatoriosTecnicos.oleo_pintura_processo1')
        ->with('idLaudoCT1_RM1', $idLaudoCT1_RM1)->with('statusCT1_RM1', $statusCT1_RM1)
        ->with('idLaudoCT2_RM2', $idLaudoCT2_RM2)->with('statusCT2_RM2', $statusCT2_RM2)
        ->with('idLaudoCT2_RM1', $idLaudoCT2_RM1)->with('statusCT2_RM1', $statusCT2_RM1)
        ->with('idLaudoCT1_RM2', $idLaudoCT1_RM2)->with('statusCT1_RM2', $statusCT1_RM2)
        ->with('idLaudoSC_02', $idLaudoSC_02)->with('statusSC_02', $statusSC_02)
        ->with('idLaudoSC_01', $idLaudoSC_01)->with('statusSC_01', $statusSC_01)
        ->with('idLaudoAAE_1', $idLaudoAAE_1)->with('statusAAE_1', $statusAAE_1);

    }

    public function pintura_processo2()
    {

      //2 CONJUNTO TENSOR 03 - ROLO M2
      $tag_oleoCT3_RM2 = "LB 72 500 510 166 016 - 000002";
      $idAtividadeCT3_RM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT3_RM2)->value('id');
      $idAnaliseCT3_RM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT3_RM2)->max('id');
      $idLaudoCT3_RM2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT3_RM2)->value('id');
      $statusCT3_RM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT3_RM2)->value('status_id');

      //CONJUNTO TENSOR 03 - ROLO M1
      $tag_oleoCT3_RM1 = "LB 72 500 510 166 013 - 000002";
      $idAtividadeCT3_RM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT3_RM1)->value('id');
      $idAnaliseCT3_RM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT3_RM1)->max('id');
      $idLaudoCT3_RM1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT3_RM1)->value('id');
      $statusCT3_RM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT3_RM1)->value('status_id');

      //SISTEMA CORRETOR 03
      $tag_oleoSC_03 = "LB 72 500 510 164 025 - 000001";
      $idAtividadeSC_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSC_03)->value('id');
      $idAnaliseSC_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_03)->max('id');
      $idLaudoSC_03 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_03)->value('id');
      $statusSC_03 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_03)->value('status_id');

      //APLICADOR DE TINTA A
      $tag_oleoATA = "LB 72 500 510 214 011 - 000002";
      $idAtividadeATA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoATA)->value('id');
      $idAnaliseATA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeATA)->max('id');
      $idLaudoATA = DB::table('laudos')->where('analise_id', '=', $idAnaliseATA)->value('id');
      $statusATA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseATA)->value('status_id');

      //APLICADOR DE PRIME
      $tag_oleoAPLIC_PR = "LB 72 500 510 170 009 - 000002";
      $idAtividadeAPLIC_PR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPLIC_PR)->value('id');
      $idAnaliseAPLIC_PR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPLIC_PR)->max('id');
      $idLaudoAPLIC_PR = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPLIC_PR)->value('id');
      $statusAPLIC_PR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPLIC_PR)->value('status_id');

      //SISTEMA CORRETOR 05
      $tag_oleoSC_05 = "LB 72 500 510 212 025 - 000001";
      $idAtividadeSC_05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSC_05)->value('id');
      $idAnaliseSC_05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_05)->max('id');
      $idLaudoSC_05 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_05)->value('id');
      $statusSC_05 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_05)->value('status_id');

      //APLICADOR DE CROMO
      $tag_oleoAPLIC_CR = "LB 72 500 510 156 009 - 000003";
      $idAtividadeAPLIC_CR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPLIC_CR)->value('id');
      $idAnaliseAPLIC_CR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPLIC_CR)->max('id');
      $idLaudoAPLIC_CR = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPLIC_CR)->value('id');
      $statusAPLIC_CR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPLIC_CR)->value('status_id');






        return view('csn.relatoriosTecnicos.oleo_pintura_processo2')
        ->with('idLaudoCT3_RM2', $idLaudoCT3_RM2)->with('statusCT3_RM2', $statusCT3_RM2)
        ->with('idLaudoCT3_RM1', $idLaudoCT3_RM1)->with('statusCT3_RM1', $statusCT3_RM1)
        ->with('idLaudoSC_03', $idLaudoSC_03)->with('statusSC_03', $statusSC_03)
        ->with('idLaudoATA', $idLaudoATA)->with('statusATA', $statusATA)
        ->with('idLaudoAPLIC_PR', $idLaudoAPLIC_PR)->with('statusAPLIC_PR', $statusAPLIC_PR)
        ->with('idLaudoSC_05', $idLaudoSC_05)->with('statusSC_05', $statusSC_05)
        ->with('idLaudoAPLIC_CR', $idLaudoAPLIC_CR)->with('statusAPLIC_CR', $statusAPLIC_CR);


    }

    public function pintura_estufas()
    {

      //APLICADOR DE TINTA B
      $tag_oleoAPLIC_TINTA_B = "LB 72 500 510 216 009 - 000002";
      $idAtividadeAPLIC_TINTA_B = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPLIC_TINTA_B)->value('id');
      $idAnaliseAPLIC_TINTA_B = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPLIC_TINTA_B)->max('id');
      $idLaudoAPLIC_TINTA_B = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPLIC_TINTA_B)->value('id');
      $statusAPLIC_TINTA_B = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPLIC_TINTA_B)->value('status_id');

      //SISTEMA CORRETOR 06
      $tag_oleoSC_06 = "LB 72 500 510 256 025 - 000001";
      $idAtividadeSC_06 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSC_06)->value('id');
      $idAnaliseSC_06 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_06)->max('id');
      $idLaudoSC_06 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_06)->value('id');
      $statusSC_06 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_06)->value('status_id');





        return view('csn.relatoriosTecnicos.oleo_pintura_estufas')
        ->with('idLaudoAPLIC_TINTA_B', $idLaudoAPLIC_TINTA_B)->with('statusAPLIC_TINTA_B', $statusAPLIC_TINTA_B)
        ->with('idLaudoSC_06', $idLaudoSC_06)->with('statusSC_06', $statusSC_06);
    }

    public function pintura_saida()
    {

      //UNIDADE HIDRÁULICA CARRO BOBINA SAÍDA
      $tag_oleoUHCBS = "LB 72 500 510 314 019 - 000001";
      $idAtividadeUHCBS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHCBS)->value('id');
      $idAnaliseUHCBS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHCBS)->max('id');
      $idLaudoUHCBS = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHCBS)->value('id');
      $statusUHCBS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHCBS)->value('status_id');

      //CONJUNTO TENSOR 04 - ROLO M2
      $tag_oleoCT4_RM2 = "LB 72 500 510 208 016 - 000010";
      $idAtividadeCT4_RM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT4_RM2)->value('id');
      $idAnaliseCT4_RM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT4_RM2)->max('id');
      $idLaudoCT4_RM2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT4_RM2)->value('id');
      $statusCT4_RM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT4_RM2)->value('status_id');

      //CONJUNTO TENSOR 04 - ROLO M1
      $tag_oleoCT4_RM1 = "LB 72 500 510 208 013 - 000010";
      $idAtividadeCT4_RM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT4_RM1)->value('id');
      $idAnaliseCT4_RM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT4_RM1)->max('id');
      $idLaudoCT4_RM1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT4_RM1)->value('id');
      $statusCT4_RM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT4_RM1)->value('status_id');

      //CONJUNTO TENSOR 05 - ROLO M2
      $tag_oleoCT5_RM2 = "LB 72 500 510 262 016 - 000002";
      $idAtividadeCT5_RM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT5_RM2)->value('id');
      $idAnaliseCT5_RM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT5_RM2)->max('id');
      $idLaudoCT5_RM2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT5_RM2)->value('id');
      $statusCT5_RM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT5_RM2)->value('status_id');

      //CONJUNTO TENSOR 05 - ROLO M1
      $tag_oleoCT5_RM1 = "LB 72 500 510 262 013 - 000002";
      $idAtividadeCT5_RM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT5_RM1)->value('id');
      $idAnaliseCT5_RM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT5_RM1)->max('id');
      $idLaudoCT5_RM1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT5_RM1)->value('id');
      $statusCT5_RM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT5_RM1)->value('status_id');

//**************************
      //CONJUNTO TENSOR 06 - ROLO M2
      $tag_oleoCT6_RM2 = "LB 72 500 510 274 016 - 000010";
      $idAtividadeCT6_RM2 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT6_RM2)->value('id');
      $idAnaliseCT6_RM2 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT6_RM2)->max('id');
      $idLaudoCT6_RM2 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT6_RM2)->value('id');
      $statusCT6_RM2 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT6_RM2)->value('status_id');
//**************************


      //CONJUNTO TENSOR 06 - ROLO M1
      $tag_oleoCT6_RM1 = "LB 72 500 510 274 013 - 000010";
      $idAtividadeCT6_RM1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCT6_RM1)->value('id');
      $idAnaliseCT6_RM1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCT6_RM1)->max('id');
      $idLaudoCT6_RM1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseCT6_RM1)->value('id');
      $statusCT6_RM1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCT6_RM1)->value('status_id');

      //APLICADOR DE CERA
      $tag_oleoAPL_CERA = "LB 72 500 510 278 009 - 000002";
      $idAtividadeAPL_CERA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAPL_CERA)->value('id');
      $idAnaliseAPL_CERA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAPL_CERA)->max('id');
      $idLaudoAPL_CERA = DB::table('laudos')->where('analise_id', '=', $idAnaliseAPL_CERA)->value('id');
      $statusAPL_CERA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAPL_CERA)->value('status_id');

      //ENROLADEIRA
      $tag_oleoENR = "LB 72 500 510 306 002 - 000005";
      $idAtividadeENR = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoENR)->value('id');
      $idAnaliseENR = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeENR)->max('id');
      $idLaudoENR = DB::table('laudos')->where('analise_id', '=', $idAnaliseENR)->value('id');
      $statusENR = DB::table('preditiva_analises')->where('id', '=', $idAnaliseENR)->value('status_id');

      //SISTEMA CORRETOR 04
      $tag_oleoSC_04 = "LB 72 500 510 204 025 - 000001";
      $idAtividadeSC_04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSC_04)->value('id');
      $idAnaliseSC_04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_04)->max('id');
      $idLaudoSC_04 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_04)->value('id');
      $statusSC_04 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_04)->value('status_id');

      //SISTEMA CORRETOR 07
      $tag_oleoSC_07 = "LB 72 500 510 272 025 - 000001";
      $idAtividadeSC_07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSC_07)->value('id');
      $idAnaliseSC_07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSC_07)->max('id');
      $idLaudoSC_07 = DB::table('laudos')->where('analise_id', '=', $idAnaliseSC_07)->value('id');
      $statusSC_07 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSC_07)->value('status_id');

      //ACIONAMENTO ACUMULADOR DE SAÍDA
      $tag_oleoAA_SAIDA = "LB 72 500 510 264 007 - 000002";
      $idAtividadeAA_SAIDA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoAA_SAIDA)->value('id');
      $idAnaliseAA_SAIDA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeAA_SAIDA)->max('id');
      $idLaudoAA_SAIDA = DB::table('laudos')->where('analise_id', '=', $idAnaliseAA_SAIDA)->value('id');
      $statusAA_SAIDA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseAA_SAIDA)->value('status_id');

      //UNIDADE HIDRÁULICA DE SAÍDA
      $tag_oleoUHS = "LB 72 500 510 318 019 - 000001";
      $idAtividadeUHS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHS)->value('id');
      $idAnaliseUHS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHS)->max('id');
      $idLaudoUHS = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHS)->value('id');
      $statusUHS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHS)->value('status_id');

      //FIFE DE SAÍDA
      $tag_oleoFIFE_SAIDA = "LB 72 500 510 304 025 - 000001";
      $idAtividadeFIFE_SAIDA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoFIFE_SAIDA)->value('id');
      $idAnaliseFIFE_SAIDA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeFIFE_SAIDA)->max('id');
      $idLaudoFIFE_SAIDA = DB::table('laudos')->where('analise_id', '=', $idAnaliseFIFE_SAIDA)->value('id');
      $statusFIFE_SAIDA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseFIFE_SAIDA)->value('status_id');



        return view('csn.relatoriosTecnicos.oleo_pintura_saida')
        ->with('idLaudoUHCBS', $idLaudoUHCBS)->with('statusUHCBS', $statusUHCBS)
        ->with('idLaudoCT4_RM2', $idLaudoCT4_RM2)->with('statusCT4_RM2', $statusCT4_RM2)
        ->with('idLaudoCT4_RM1', $idLaudoCT4_RM1)->with('statusCT4_RM1', $statusCT4_RM1)
        ->with('idLaudoCT5_RM2', $idLaudoCT5_RM2)->with('statusCT5_RM2', $statusCT5_RM2)
        ->with('idLaudoCT5_RM1', $idLaudoCT5_RM1)->with('statusCT5_RM1', $statusCT5_RM1)
        ->with('idLaudoCT6_RM2', $idLaudoCT6_RM2)->with('statusCT6_RM2', $statusCT6_RM2)
        ->with('idLaudoCT6_RM1', $idLaudoCT6_RM1)->with('statusCT6_RM1', $statusCT6_RM1)
        ->with('idLaudoAPL_CERA', $idLaudoAPL_CERA)->with('statusAPL_CERA', $statusAPL_CERA)
        ->with('idLaudoENR', $idLaudoENR)->with('statusENR', $statusENR)
        ->with('idLaudoSC_04', $idLaudoSC_04)->with('statusSC_04', $statusSC_04)
        ->with('idLaudoSC_07', $idLaudoSC_07)->with('statusSC_07', $statusSC_07)
        ->with('idLaudoAA_SAIDA', $idLaudoAA_SAIDA)->with('statusAA_SAIDA', $statusAA_SAIDA)
        ->with('idLaudoUHS', $idLaudoUHS)->with('statusUHS', $statusUHS)
        ->with('idLaudoFIFE_SAIDA', $idLaudoFIFE_SAIDA)->with('statusFIFE_SAIDA', $statusFIFE_SAIDA);

    }

    public function cs_LCL()
    {

      //CONJUNTO DO EMBOSSER
      $tag_oleoCONJ_EMB = "LB 72 600 610 063 001 - 000003";
      $idAtividadeCONJ_EMB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoCONJ_EMB)->value('id');
      $idAnaliseCONJ_EMB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeCONJ_EMB)->max('id');
      $idLaudoCONJ_EMB = DB::table('laudos')->where('analise_id', '=', $idAnaliseCONJ_EMB)->value('id');
      $statusCONJ_EMB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseCONJ_EMB)->value('status_id');

      //UNID. HID. CARRO BOBINA DE ENTRADA
      $tag_oleoUHCB = "LB 72 600 610 009 010 - 000004";
      $idAtividadeUHCB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHCB)->value('id');
      $idAnaliseUHCB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHCB)->max('id');
      $idLaudoUHCB = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHCB)->value('id');
      $statusUHCB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHCB)->value('status_id');

      //UNIDADE HIDRAULICA DO CARRO BOBINA SAIDA
      $tag_oleoUHCBSS = "LB 72 600 610 127 010 - 000001";
      $idAtividadeUHCBSS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHCBSS)->value('id');
      $idAnaliseUHCBSS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHCBSS)->max('id');
      $idLaudoUHCBSS = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHCBSS)->value('id');
      $statusUHCBSS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHCBSS)->value('status_id');

      //SISTEMA DE GIRO DA DESENROLADEIRA
      $tag_oleoSGD = "LB 72 600 610 015 013 - 000003";
      $idAtividadeSGD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSGD)->value('id');
      $idAnaliseSGD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSGD)->max('id');
      $idLaudoSGD = DB::table('laudos')->where('analise_id', '=', $idAnaliseSGD)->value('id');
      $statusSGD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSGD)->value('status_id');

      //ACIONAMENTO SLITTER E EMBOSSER
      $tag_oleoASE = "LB 72 600 610 059 010 - 000003";
      $idAtividadeASE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoASE)->value('id');
      $idAnaliseASE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeASE)->max('id');
      $idLaudoASE = DB::table('laudos')->where('analise_id', '=', $idAnaliseASE)->value('id');
      $statusASE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseASE)->value('status_id');

      //SISTEMA DE GIRO ENROLADEIRA
      $tag_oleoSGE = "LB 72 600 610 107 019 - 000002";
      $idAtividadeSGE = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSGE)->value('id');
      $idAnaliseSGE = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSGE)->max('id');
      $idLaudoSGE = DB::table('laudos')->where('analise_id', '=', $idAnaliseSGE)->value('id');
      $statusSGE = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSGE)->value('status_id');

      //ACIONAMENTO DA CADEIRA TENCIONADORA - INFERIOR
      $tag_oleoACT_INF = "LB 72 600 610 097 022 - 000003";
      $idAtividadeACT_INF = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoACT_INF)->value('id');
      $idAnaliseACT_INF = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACT_INF)->max('id');
      $idLaudoACT_INF = DB::table('laudos')->where('analise_id', '=', $idAnaliseACT_INF)->value('id');
      $statusACT_INF = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACT_INF)->value('status_id');

      //ACIONAMENTO DA CADEIRA TENCIONADORA - SUPERIOR
      $tag_oleoACT_SUP = "LB 72 600 610 097 019 - 000003";
      $idAtividadeACT_SUP = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoACT_SUP)->value('id');
      $idAnaliseACT_SUP = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACT_SUP)->max('id');
      $idLaudoACT_SUP = DB::table('laudos')->where('analise_id', '=', $idAnaliseACT_SUP)->value('id');
      $statusACT_SUP = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACT_SUP)->value('status_id');

      //UNIDADE HIDRÁULICA DE SAÍDA
      $tag_oleoUHSS = "LB 72 600 610 117 007 - 000003";
      $idAtividadeUHSS = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHSS)->value('id');
      $idAnaliseUHSS = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHSS)->max('id');
      $idLaudoUHSS = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHSS)->value('id');
      $statusUHSS = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHSS)->value('status_id');

      //UNIDADE HIDRÁULICA DA ENTRADA
      $tag_oleoUHENT = "LB 72 600 610 027 007 - 000004";
      $idAtividadeUHENT = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHENT)->value('id');
      $idAnaliseUHENT = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHENT)->max('id');
      $idLaudoUHENT = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHENT)->value('id');
      $statusUHENT = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHENT)->value('status_id');




        return view('csn.relatoriosTecnicos.oleo_cs_LCL')
        ->with('idLaudoCONJ_EMB', $idLaudoCONJ_EMB)->with('statusCONJ_EMB', $statusCONJ_EMB)
        ->with('idLaudoUHCB', $idLaudoUHCB)->with('statusUHCB', $statusUHCB)
        ->with('idLaudoUHCBSS', $idLaudoUHCBSS)->with('statusUHCBSS', $statusUHCBSS)
        ->with('idLaudoSGD', $idLaudoSGD)->with('statusSGD', $statusSGD)
        ->with('idLaudoASE', $idLaudoASE)->with('statusASE', $statusASE)
        ->with('idLaudoSGE', $idLaudoSGE)->with('statusSGE', $statusSGE)
        ->with('idLaudoACT_INF', $idLaudoACT_INF)->with('statusACT_INF', $statusACT_INF)
        ->with('idLaudoACT_SUP', $idLaudoACT_SUP)->with('statusACT_SUP', $statusACT_SUP)
        ->with('idLaudoUHSS', $idLaudoUHSS)->with('statusUHSS', $statusUHSS)
        ->with('idLaudoUHENT', $idLaudoUHENT)->with('statusUHENT', $statusUHENT);
    }

    public function cs_LCT1()
    {

      //UNIDADE HIDRÁULICA EMBALAGEM
      $tag_oleoUH_EMB = "LB 72 600 630 027 028 - 000003";
      $idAtividadeUH_EMB = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUH_EMB)->value('id');
      $idAnaliseUH_EMB = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_EMB)->max('id');
      $idLaudoUH_EMB = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_EMB)->value('id');
      $statusUH_EMB = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_EMB)->value('status_id');

      //SISTEMA LUBRIFICAÇÃO DA DESEMPENADEIRA
      $tag_oleoSLD = "LB 72 600 620 047 010 - 000003";
      $idAtividadeSLD = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSLD)->value('id');
      $idAnaliseSLD = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSLD)->max('id');
      $idLaudoSLD = DB::table('laudos')->where('analise_id', '=', $idAnaliseSLD)->value('id');
      $statusSLD = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSLD)->value('status_id');

      //UNIDADE HIDRÁULICA DO CARRO BOBINA
      $tag_oleoUHCB_X = "LB 72 600 620 009 010 - 000001";
      $idAtividadeUHCB_X = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHCB_X)->value('id');
      $idAnaliseUHCB_X = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHCB_X)->max('id');
      $idLaudoUHCB_X = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHCB_X)->value('id');
      $statusUHCB_X = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHCB_X)->value('status_id');

      //UNIDADE HIDRAULICA DA ENTRADA
      $tag_oleoUH_ENTRADA = "LB 72 600 620 027 019 - 000005";
      $idAtividadeUH_ENTRADA = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUH_ENTRADA)->value('id');
      $idAnaliseUH_ENTRADA = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_ENTRADA)->max('id');
      $idLaudoUH_ENTRADA = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_ENTRADA)->value('id');
      $statusUH_ENTRADA = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_ENTRADA)->value('status_id');


        return view('csn.relatoriosTecnicos.oleo_cs_LCT1')
        ->with('idLaudoUH_EMB', $idLaudoUH_EMB)->with('statusUH_EMB', $statusUH_EMB)
        ->with('idLaudoSLD', $idLaudoSLD)->with('statusSLD', $statusSLD)
        ->with('idLaudoUHCB_X', $idLaudoUHCB_X)->with('statusUHCB_X', $statusUHCB_X)
        ->with('idLaudoUH_ENTRADA', $idLaudoUH_ENTRADA)->with('statusUH_ENTRADA', $statusUH_ENTRADA);

    }

    public function cs_LCT2()
    {

      //TESOURA MECANICA
      $tag_oleoTES_MEC = "LB 72 600 621 111 016 - 000002";
      $idAtividadeTES_MEC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoTES_MEC)->value('id');
      $idAnaliseTES_MEC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeTES_MEC)->max('id');
      $idLaudoTES_MEC = DB::table('laudos')->where('analise_id', '=', $idAnaliseTES_MEC)->value('id');
      $statusTES_MEC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseTES_MEC)->value('status_id');

      //ACIONAMENTO DA DESEMPENADEIRA
      $tag_oleoACI_DESEM = "LB 72 600 621 073 010 - 000005";
      $idAtividadeACI_DESEM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoACI_DESEM)->value('id');
      $idAnaliseACI_DESEM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeACI_DESEM)->max('id');
      $idLaudoACI_DESEM = DB::table('laudos')->where('analise_id', '=', $idAnaliseACI_DESEM)->value('id');
      $statusACI_DESEM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseACI_DESEM)->value('status_id');

      //UNIDADE HIDRÁULICA
      $tag_oleoUH_1 = "LB 72 600 621 093 013 - 000004";
      $idAtividadeUH_1 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUH_1)->value('id');
      $idAnaliseUH_1 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_1)->max('id');
      $idLaudoUH_1 = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_1)->value('id');
      $statusUH_1 = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_1)->value('status_id');



        return view('csn.relatoriosTecnicos.oleo_cs_LCT2')
        ->with('idLaudoTES_MEC', $idLaudoTES_MEC)->with('statusTES_MEC', $statusTES_MEC)
        ->with('idLaudoACI_DESEM', $idLaudoACI_DESEM)->with('statusACI_DESEM', $statusACI_DESEM)
        ->with('idLaudoUH_1', $idLaudoUH_1)->with('statusUH_1', $statusUH_1);
    }

    public function cs_LCC()
    {

      //UNIDADE HID. TRANSPORTE. EMBALAGEM 1 LO
      $tag_oleoUHTE_1LO = "LB 72 600 640 169 013 - 000001";
      $idAtividadeUHTE_1LO = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUHTE_1LO)->value('id');
      $idAnaliseUHTE_1LO = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUHTE_1LO)->max('id');
      $idLaudoUHTE_1LO = DB::table('laudos')->where('analise_id', '=', $idAnaliseUHTE_1LO)->value('id');
      $statusUHTE_1LO = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUHTE_1LO)->value('status_id');

      //UNIDADE HIDRÁULICA PRINCIPAL
      $tag_oleoUH_PRINC = "LB 72 600 640 167 019 - 000001";
      $idAtividadeUH_PRINC = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoUH_PRINC)->value('id');
      $idAnaliseUH_PRINC = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeUH_PRINC)->max('id');
      $idLaudoUH_PRINC = DB::table('laudos')->where('analise_id', '=', $idAnaliseUH_PRINC)->value('id');
      $statusUH_PRINC = DB::table('preditiva_analises')->where('id', '=', $idAnaliseUH_PRINC)->value('status_id');

      //LUBRIFICAÇÃO DA DESEMPENADEIRA (MULTIPLICADOR EIXOS)
      $tag_oleoLDME = "LB 72 600 640 055 010 - 000005";
      $idAtividadeLDME = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoLDME)->value('id');
      $idAnaliseLDME = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeLDME)->max('id');
      $idLaudoLDME = DB::table('laudos')->where('analise_id', '=', $idAnaliseLDME)->value('id');
      $statusLDME = DB::table('preditiva_analises')->where('id', '=', $idAnaliseLDME)->value('status_id');

      //SIST TRANSMISSAO ACION. TESOURA MECANICA
      $tag_oleoSTATM = "LB 72 600 640 122 007 - 000003";
      $idAtividadeSTATM = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoSTATM)->value('id');
      $idAnaliseSTATM = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadeSTATM)->max('id');
      $idLaudoSTATM = DB::table('laudos')->where('analise_id', '=', $idAnaliseSTATM)->value('id');
      $statusSTATM = DB::table('preditiva_analises')->where('id', '=', $idAnaliseSTATM)->value('status_id');


        return view('csn.relatoriosTecnicos.oleo_cs_LCC')
        ->with('idLaudoUHTE_1LO', $idLaudoUHTE_1LO)->with('statusUHTE_1LO', $statusUHTE_1LO)
        ->with('idLaudoUH_PRINC', $idLaudoUH_PRINC)->with('statusUH_PRINC', $statusUH_PRINC)
        ->with('idLaudoLDME', $idLaudoLDME)->with('statusLDME', $statusLDME)
        ->with('idLaudoSTATM', $idLaudoSTATM)->with('statusSTATM', $statusSTATM);
    }

    public function pr_pontes()
    {

      //ELEVAÇÃO DO GUINCHO AUXILIAR - #PR14
      $tag_oleoPR_AUX14 = "LB 72 900 008 014 012 - 000015";
      $idAtividadePR_AUX14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_AUX14)->value('id');
      $idAnalisePR_AUX14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_AUX14)->max('id');
      $idLaudoPR_AUX14 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_AUX14)->value('id');
      $statusPR_AUX14 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_AUX14)->value('status_id');

      //ELEVAÇÃO DO GUINCHO PRINCIPAL - #PR14
      $tag_oleoPR_ELEV14 = "LB 72 900 008 013 012 - 000015";
      $idAtividadePR_ELEV14 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_ELEV14)->value('id');
      $idAnalisePR_ELEV14 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_ELEV14)->max('id');
      $idLaudoPR_ELEV14 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_ELEV14)->value('id');
      $statusPR_ELEV14 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_ELEV14)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR11
      $tag_oleoPR_11 = "LB 72 400 011 013 012 - 000014";
      $idAtividadePR_11 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_11)->value('id');
      $idAnalisePR_11 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_11)->max('id');
      $idLaudoPR_11 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_11)->value('id');
      $statusPR_11 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_11)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR04
      $tag_oleoPR_04 = "LB 72 600 004 013 012 - 000013";
      $idAtividadePR_04 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_04)->value('id');
      $idAnalisePR_04 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_04)->max('id');
      $idLaudoPR_04 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_04)->value('id');
      $statusPR_04 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_04)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR02
      $tag_oleoPR_02 = "LB 72 600 002 013 012 - 000013";
      $idAtividadePR_02 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_02)->value('id');
      $idAnalisePR_02 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_02)->max('id');
      $idLaudoPR_02 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_02)->value('id');
      $statusPR_02 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_02)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR03
      $tag_oleoPR_03 = "LB 72 600 003 013 012 - 000009";
      $idAtividadePR_03 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_03)->value('id');
      $idAnalisePR_03 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_03)->max('id');
      $idLaudoPR_03 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_03)->value('id');
      $statusPR_03 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_03)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR01
      $tag_oleoPR_01 = "LB 72 600 001 013 012 - 000011";
      $idAtividadePR_01 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_01)->value('id');
      $idAnalisePR_01 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_01)->max('id');
      $idLaudoPR_01 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_01)->value('id');
      $statusPR_01 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_01)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR08
      $tag_oleoPR_08 = "LB 72 400 008 013 012 - 000015";
      $idAtividadePR_08 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_08)->value('id');
      $idAnalisePR_08 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_08)->max('id');
      $idLaudoPR_08 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_08)->value('id');
      $statusPR_08 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_08)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR10
      $tag_oleoPR_10 = "LB 72 400 006 013 006 - 000016";
      $idAtividadePR_10 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_10)->value('id');
      $idAnalisePR_10 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_10)->max('id');
      $idLaudoPR_10 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_10)->value('id');
      $statusPR_10 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_10)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR12
      $tag_oleoPR_12 = "LB 72 200 012 013 012 - 000018";
      $idAtividadePR_12 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_12)->value('id');
      $idAnalisePR_12 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_12)->max('id');
      $idLaudoPR_12 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_12)->value('id');
      $statusPR_12 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_12)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR13
      $tag_oleoPR_13 = "LB 72 200 013 013 012 - 000010";
      $idAtividadePR_13 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_13)->value('id');
      $idAnalisePR_13 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_13)->max('id');
      $idLaudoPR_13 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_13)->value('id');
      $statusPR_13 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_13)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR07
      $tag_oleoPR_07 = "LB 72 500 007 013 012 - 000015";
      $idAtividadePR_07 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_07)->value('id');
      $idAnalisePR_07 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_07)->max('id');
      $idLaudoPR_07 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_07)->value('id');
      $statusPR_07 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_07)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR23
      $tag_oleoPR_23 = "LB 72 800 013 013 012 - 000015";
      $idAtividadePR_23 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_23)->value('id');
      $idAnalisePR_23 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_23)->max('id');
      $idLaudoPR_23 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_23)->value('id');
      $statusPR_23 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_23)->value('status_id');

      //ELEVAÇÃO DO GUINCHO - #PR05
      $tag_oleoPR_05 = "LB 72 600 005 013 012 - 000013";
      $idAtividadePR_05 = DB::table('preditiva_atividades')->where('tag_ativ', '=', $tag_oleoPR_05)->value('id');
      $idAnalisePR_05 = DB::table('preditiva_analises')->where('atividade_id', '=', $idAtividadePR_05)->max('id');
      $idLaudoPR_05 = DB::table('laudos')->where('analise_id', '=', $idAnalisePR_05)->value('id');
      $statusPR_05 = DB::table('preditiva_analises')->where('id', '=', $idAnalisePR_05)->value('status_id');






        return view('csn.relatoriosTecnicos.oleo_pr_pontes')
        ->with('idLaudoPR_AUX14', $idLaudoPR_AUX14)->with('statusPR_AUX14', $statusPR_AUX14)
        ->with('idLaudoPR_ELEV14', $idLaudoPR_ELEV14)->with('statusPR_ELEV14', $statusPR_ELEV14)
        ->with('idLaudoPR_11', $idLaudoPR_11)->with('statusPR_11', $statusPR_11)
        ->with('idLaudoPR_04', $idLaudoPR_04)->with('statusPR_04', $statusPR_04)
        ->with('idLaudoPR_02', $idLaudoPR_02)->with('statusPR_02', $statusPR_02)
        ->with('idLaudoPR_03', $idLaudoPR_03)->with('statusPR_03', $statusPR_03)
        ->with('idLaudoPR_01', $idLaudoPR_01)->with('statusPR_01', $statusPR_01)
        ->with('idLaudoPR_08', $idLaudoPR_08)->with('statusPR_08', $statusPR_08)
        ->with('idLaudoPR_10', $idLaudoPR_10)->with('statusPR_10', $statusPR_10)
        ->with('idLaudoPR_12', $idLaudoPR_12)->with('statusPR_12', $statusPR_12)
        ->with('idLaudoPR_13', $idLaudoPR_13)->with('statusPR_13', $statusPR_13)
        ->with('idLaudoPR_07', $idLaudoPR_07)->with('statusPR_07', $statusPR_07)
        ->with('idLaudoPR_23', $idLaudoPR_23)->with('statusPR_23', $statusPR_23)
        ->with('idLaudoPR_05', $idLaudoPR_05)->with('statusPR_05', $statusPR_05);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php
//==========================rotas para páginas SEM NECESSIDADE DE AUTENTICAÇÃO=================================//
//rota para home do MATHISON
Route:: group(['namespace' => 'Mathison', 'prefix' => '/csnparana.gmu.br'], function() {
	Route::get('/', 'MathisonController@index')->name('mathison.home');
});

//rota para home da PREDITIVA CSN
Route::get('/', 'Csn\CsnController@redirectIndex');

Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br'], function() {

	Route::get('/', 'CsnController@index')->name('csn.home');
	//Rotas para Relatórios Técnicos
	Route::get('/relatorio-tecnico/termografia-eletrica', 'CsnController@termografia')->name('termografia.relatorio.tecnico');
	Route::get('/relatorio-tecnico/termografia-isolamento', 'CsnController@termografia_isolamento')->name('termografia_isolamento.relatorio.tecnico');
	Route::get('/relatorio-tecnico/analise-de-vibracao', 'CsnController@vibracao')->name('vibracao.relatorio.tecnico');
	Route::get('/relatorio-tecnico/analise-de-oleo', 'CsnController@oleo')->name('oleo.relatorio.tecnico');
	Route::get('/relatorio-tecnico/resistencia-ohmica-e-de-isolamento', 'CsnController@resistencias')->name('resistecia.relatorio.tecnico');
	Route::get('/relatorio-tecnico/voltar-relatorio-tecnico', 'CsnController@voltarRelTec');
	Route::get('/relatorio-gerencial', 'CsnController@RelatorioGerencial')->name('relGer.index');
	Route::get('/relatorio-gerencial/carregando', 'CsnController@relGerCarregando')->name('relGerCarregando.index');
});

	// - - - - - - - - - - - - - - - - - - -  ROTAS PARA LAUDOS 	- - - - - - - - - - - - - - - - -
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/laudos'], function() {

	Route::get('/', 'LaudoController@index')->name('laudo.dashboard');

	Route::get('/termografia/laudo/equipamento/{id}', 'LaudoTermografiaController@show_equipamento')->name('laudoTermografia_show_equipamento.dashboard');
	Route::get('/vibracao/laudo/equipamento/{id}', 'LaudoVibracaoController@show_equipamento')->name('laudoVibracao_show_equipamento.dashboard');
	Route::get('/oleo/laudo/equipamento/{id}', 'LaudoOleoController@show_equipamento')->name('laudoOleo_show_equipamento.dashboard');
	Route::get('/resistencia/laudo/equipamento/{id}', 'LaudoResistenciaController@show_equipamento')->name('laudoResistencia_show_equipamento.dashboard');
	Route::get('/termografia-isolamento/laudo/equipamento/{id}', 'LaudoTermografiaIsoController@show_equipamento')->name('laudoTermografiaIso_show_equipamento.dashboard');

	Route::get('/termografia/laudo/equipamento/', 'LaudoTermografiaController@show_equipamento_vazio')->name('laudoTermografia_show_equipamento_vazio.dashboard');
	Route::get('/vibracao/laudo/equipamento/', 'LaudoTermografiaController@show_equipamento_vazio');
	Route::get('/oleo/laudo/equipamento/', 'LaudoTermografiaController@show_equipamento_vazio');
	Route::get('/resistencia/laudo/equipamento/', 'LaudoTermografiaController@show_equipamento_vazio');
	Route::get('/termografia-isolamento/laudo/equipamento/', 'LaudoTermografiaController@show_equipamento_vazio');

	Route::post('/vibracao/pdf', 'LaudoVibracaoController@gerar_pdf')->name('laudoVibracao_gerar_pdf.dashboard');
});

// - - - - - - - - - - - - - - - - - - - Rotas para Relatório Gerencial Análise de Vibração - - - - - - - - - - - - - - - - -
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-gerencial/analise-de-vibracao'], function() {

Route::get('/ggop-pr/perfil', 'RelGerVibracao@GeralPerfil')->name('relGer.vb.GeralPerfil');
Route::get('/ggop-pr/status-dos-pontos', 'RelGerVibracao@GeralStatusDosPontos')->name('relGer.vb.GeralStatusDosPontos');
Route::get('/ggop-pr/anormalidades', 'RelGerVibracao@GeralAnormalidades')->name('relGer.vb.GeralAnormalidades');
Route::get('/ggop-pr/problemas-encontrados', 'RelGerVibracao@GeralProblemasEncontrados')->name('relGer.vb.GeralProblemasEncontrados');

Route::get('/ura/perfil', 'RelGerVibracao@UraPerfil')->name('relGer.vb.UraPerfil');
Route::get('/ura/status-dos-pontos', 'RelGerVibracao@UraStatusDosPontos')->name('relGer.vb.UraStatusDosPontos');
Route::get('/ura/anormalidades', 'RelGerVibracao@UraAnormalidades')->name('relGer.vb.UraAnormalidades');
Route::get('/ura/problemas-encontrados', 'RelGerVibracao@UraProblemasEncontrados')->name('relGer.vb.UraProblemasEncontrados');

Route::get('/lds/perfil', 'RelGerVibracao@LdsPerfil')->name('relGer.vb.LdsPerfil');
Route::get('/lds/status-dos-pontos', 'RelGerVibracao@LdsStatusDosPontos')->name('relGer.vb.LdsStatusDosPontos');
Route::get('/lds/anormalidades', 'RelGerVibracao@LdsAnormalidades')->name('relGer.vb.LdsAnormalidades');
Route::get('/lds/problemas-encontrados', 'RelGerVibracao@LdsProblemasEncontrados')->name('relGer.vb.LdsProblemasEncontrados');

Route::get('/lrf/perfil', 'RelGerVibracao@LrfPerfil')->name('relGer.vb.LrfPerfil');
Route::get('/lrf/status-dos-pontos', 'RelGerVibracao@LrfStatusDosPontos')->name('relGer.vb.LrfStatusDosPontos');
Route::get('/lrf/anormalidades', 'RelGerVibracao@LrfAnormalidades')->name('relGer.vb.LrfAnormalidades');
Route::get('/lrf/problemas-encontrados', 'RelGerVibracao@LrfProblemasEncontrados')->name('relGer.vb.LrfProblemasEncontrados');

Route::get('/uti/perfil', 'RelGerVibracao@UtiPerfil')->name('relGer.vb.UtiPerfil');
Route::get('/uti/status-dos-pontos', 'RelGerVibracao@UtiStatusDosPontos')->name('relGer.vb.UtiStatusDosPontos');
Route::get('/uti/anormalidades', 'RelGerVibracao@UtiAnormalidades')->name('relGer.vb.UtiAnormalidades');
Route::get('/uti/problemas-encontrados', 'RelGerVibracao@UtiProblemasEncontrados')->name('relGer.vb.UtiProblemasEncontrados');

Route::get('/lgc/perfil', 'RelGerVibracao@LgcPerfil')->name('relGer.vb.LgcPerfil');
Route::get('/lgc/status-dos-pontos', 'RelGerVibracao@LgcStatusDosPontos')->name('relGer.vb.LgcStatusDosPontos');
Route::get('/lgc/anormalidades', 'RelGerVibracao@LgcAnormalidades')->name('relGer.vb.LgcAnormalidades');
Route::get('/lgc/problemas-encontrados', 'RelGerVibracao@LgcProblemasEncontrados')->name('relGer.vb.LgcProblemasEncontrados');

Route::get('/lpc/perfil', 'RelGerVibracao@LpcPerfil')->name('relGer.vb.LpcPerfil');
Route::get('/lpc/status-dos-pontos', 'RelGerVibracao@LpcStatusDosPontos')->name('relGer.vb.LpcStatusDosPontos');
Route::get('/lpc/anormalidades', 'RelGerVibracao@LpcAnormalidades')->name('relGer.vb.LpcAnormalidades');
Route::get('/lpc/problemas-encontrados', 'RelGerVibracao@LpcProblemasEncontrados')->name('relGer.vb.LpcProblemasEncontrados');

Route::get('/cs/perfil', 'RelGerVibracao@CsPerfil')->name('relGer.vb.CsPerfil');
Route::get('/cs/status-dos-pontos', 'RelGerVibracao@CsStatusDosPontos')->name('relGer.vb.CsStatusDosPontos');
Route::get('/cs/anormalidades', 'RelGerVibracao@CsAnormalidades')->name('relGer.vb.CsAnormalidades');
Route::get('/cs/problemas-encontrados', 'RelGerVibracao@CsProblemasEncontrados')->name('relGer.vb.CsProblemasEncontrados');

Route::get('/pontes-rolantes/perfil', 'RelGerVibracao@PrPerfil')->name('relGer.vb.PrPerfil');
Route::get('/pontes-rolantes/status-dos-pontos', 'RelGerVibracao@PrStatusDosPontos')->name('relGer.vb.PrStatusDosPontos');
Route::get('/pontes-rolantes/anormalidades', 'RelGerVibracao@PrAnormalidades')->name('relGer.vb.PrAnormalidades');
Route::get('/pontes-rolantes/problemas-encontrados', 'RelGerVibracao@PrProblemasEncontrados')->name('relGer.vb.PrProblemasEncontrados');
});

	// - - - - - - - - - - - - - - - - - - - Rotas para Relatório Gerencial Termografia Elétrica - - - - - - - - - - - - - - - - -
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-gerencial/termografia-eletrica'], function() {

	Route::get('/ggop-pr', 'RelGerTermoEletrica@GeralPerfilLinhas')->name('relGer.te.GeralPerfilLinhas');
	Route::get('/ggop-pr/perfil', 'RelGerTermoEletrica@GeralPerfil')->name('relGer.te.GeralPerfil');
	Route::get('/ggop-pr/status-dos-pontos', 'RelGerTermoEletrica@GeralStatusDosPontos')->name('relGer.te.GeralStatusDosPontos');
	Route::get('/ggop-pr/anormalidades', 'RelGerTermoEletrica@GeralAnormalidades')->name('relGer.te.GeralAnormalidades');
	Route::get('/ggop-pr/problemas-encontrados', 'RelGerTermoEletrica@GeralProblemasEncontrados')->name('relGer.te.GeralProblemasEncontrados');

	Route::get('/ura/perfil', 'RelGerTermoEletrica@UraPerfil')->name('relGer.te.UraPerfil');
	Route::get('/ura/status-dos-pontos', 'RelGerTermoEletrica@UraStatusDosPontos')->name('relGer.te.UraStatusDosPontos');
	Route::get('/ura/anormalidades', 'RelGerTermoEletrica@UraAnormalidades')->name('relGer.te.UraAnormalidades');
	Route::get('/ura/problemas-encontrados', 'RelGerTermoEletrica@UraProblemasEncontrados')->name('relGer.te.UraProblemasEncontrados');

	Route::get('/lds/perfil', 'RelGerTermoEletrica@LdsPerfil')->name('relGer.te.LdsPerfil');
	Route::get('/lds/status-dos-pontos', 'RelGerTermoEletrica@LdsStatusDosPontos')->name('relGer.te.LdsStatusDosPontos');
	Route::get('/lds/anormalidades', 'RelGerTermoEletrica@LdsAnormalidades')->name('relGer.te.LdsAnormalidades');
	Route::get('/lds/problemas-encontrados', 'RelGerTermoEletrica@LdsProblemasEncontrados')->name('relGer.te.LdsProblemasEncontrados');

	Route::get('/lrf/perfil', 'RelGerTermoEletrica@LrfPerfil')->name('relGer.te.LrfPerfil');
	Route::get('/lrf/status-dos-pontos', 'RelGerTermoEletrica@LrfStatusDosPontos')->name('relGer.te.LrfStatusDosPontos');
	Route::get('/lrf/anormalidades', 'RelGerTermoEletrica@LrfAnormalidades')->name('relGer.te.LrfAnormalidades');
	Route::get('/lrf/problemas-encontrados', 'RelGerTermoEletrica@LrfProblemasEncontrados')->name('relGer.te.LrfProblemasEncontrados');

	Route::get('/uti/perfil', 'RelGerTermoEletrica@UtiPerfil')->name('relGer.te.UtiPerfil');
	Route::get('/uti/status-dos-pontos', 'RelGerTermoEletrica@UtiStatusDosPontos')->name('relGer.te.UtiStatusDosPontos');
	Route::get('/uti/anormalidades', 'RelGerTermoEletrica@UtiAnormalidades')->name('relGer.te.UtiAnormalidades');
	Route::get('/uti/problemas-encontrados', 'RelGerTermoEletrica@UtiProblemasEncontrados')->name('relGer.te.UtiProblemasEncontrados');

	Route::get('/lgc/perfil', 'RelGerTermoEletrica@LgcPerfil')->name('relGer.te.LgcPerfil');
	Route::get('/lgc/status-dos-pontos', 'RelGerTermoEletrica@LgcStatusDosPontos')->name('relGer.te.LgcStatusDosPontos');
	Route::get('/lgc/anormalidades', 'RelGerTermoEletrica@LgcAnormalidades')->name('relGer.te.LgcAnormalidades');
	Route::get('/lgc/problemas-encontrados', 'RelGerTermoEletrica@LgcProblemasEncontrados')->name('relGer.te.LgcProblemasEncontrados');

	Route::get('/lpc/perfil', 'RelGerTermoEletrica@LpcPerfil')->name('relGer.te.LpcPerfil');
	Route::get('/lpc/status-dos-pontos', 'RelGerTermoEletrica@LpcStatusDosPontos')->name('relGer.te.LpcStatusDosPontos');
	Route::get('/lpc/anormalidades', 'RelGerTermoEletrica@LpcAnormalidades')->name('relGer.te.LpcAnormalidades');
	Route::get('/lpc/problemas-encontrados', 'RelGerTermoEletrica@LpcProblemasEncontrados')->name('relGer.te.LpcProblemasEncontrados');

	Route::get('/cs/perfil', 'RelGerTermoEletrica@CsPerfil')->name('relGer.te.CsPerfil');
	Route::get('/cs/status-dos-pontos', 'RelGerTermoEletrica@CsStatusDosPontos')->name('relGer.te.CsStatusDosPontos');
	Route::get('/cs/anormalidades', 'RelGerTermoEletrica@CsAnormalidades')->name('relGer.te.CsAnormalidades');
	Route::get('/cs/problemas-encontrados', 'RelGerTermoEletrica@CsProblemasEncontrados')->name('relGer.te.CsProblemasEncontrados');

	Route::get('/pontes-rolantes/perfil', 'RelGerTermoEletrica@PrPerfil')->name('relGer.te.PrPerfil');
	Route::get('/pontes-rolantes/status-dos-pontos', 'RelGerTermoEletrica@PrStatusDosPontos')->name('relGer.te.PrStatusDosPontos');
	Route::get('/pontes-rolantes/anormalidades', 'RelGerTermoEletrica@PrAnormalidades')->name('relGer.te.PrAnormalidades');
	Route::get('/pontes-rolantes/problemas-encontrados', 'RelGerTermoEletrica@PrProblemasEncontrados')->name('relGer.te.PrProblemasEncontrados');
});

	// - - - - - - - - - - - - - - - - - - - Rotas para Relatório Gerencial Termografia Isolamento - - - - - - - - - - - - - - - - -
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-gerencial/termografia-isolamento'], function() {

	Route::get('/ggop-pr/perfil', 'RelGerTermoIso@GeralPerfil')->name('relGer.tr.GeralPerfil');
	Route::get('/ggop-pr/anormalidades', 'RelGerTermoIso@GeralAnormalidades')->name('relGer.tr.GeralAnormalidades');
	Route::get('/ggop-pr/status-pontos', 'RelGerTermoIso@GeralStatusPontos')->name('relGer.tr.GeralStatusPontos');
	Route::get('/ggop-pr/problemas-encontrados', 'RelGerTermoIso@GeralProblemasEncontrados')->name('relGer.tr.GeralProblemasEncontrados');

	Route::get('/ura/perfil', 'RelGerTermoIso@UraPerfil')->name('relGer.tr.UraPerfil');
	Route::get('/ura/anormalidades', 'RelGerTermoIso@UraAnormalidades')->name('relGer.tr.UraAnormalidades');
	Route::get('/ura/status-pontos', 'RelGerTermoIso@UraStatusPontos')->name('relGer.tr.UraStatusPontos');
	Route::get('/ura/problemas-encontrados', 'RelGerTermoIso@UraProblemasEncontrados')->name('relGer.tr.UraProblemasEncontrados');

	Route::get('/lds/perfil', 'RelGerTermoIso@LdsPerfil')->name('relGer.tr.LdsPerfil');
	Route::get('/lds/anormalidades', 'RelGerTermoIso@LdsAnormalidades')->name('relGer.tr.LdsAnormalidades');
	Route::get('/lds/status-pontos', 'RelGerTermoIso@LdsStatusPontos')->name('relGer.tr.LdsStatusPontos');
	Route::get('/lds/problemas-encontrados', 'RelGerTermoIso@LdsProblemasEncontrados')->name('relGer.tr.LdsProblemasEncontrados');

	Route::get('/lrf/perfil', 'RelGerTermoIso@LrfPerfil')->name('relGer.tr.LrfPerfil');
	Route::get('/lrf/anormalidades', 'RelGerTermoIso@LrfAnormalidades')->name('relGer.tr.LrfAnormalidades');
	Route::get('/lrf/status-pontos', 'RelGerTermoIso@LrfStatusPontos')->name('relGer.tr.LrfStatusPontos');
	Route::get('/lrf/problemas-encontrados', 'RelGerTermoIso@LrfProblemasEncontrados')->name('relGer.tr.LrfProblemasEncontrados');

	Route::get('/lgc/perfil', 'RelGerTermoIso@LgcPerfil')->name('relGer.tr.LgcPerfil');
	Route::get('/lgc/anormalidades', 'RelGerTermoIso@LgcAnormalidades')->name('relGer.tr.LgcAnormalidades');
	Route::get('/lgc/status-pontos', 'RelGerTermoIso@LgcStatusPontos')->name('relGer.tr.LgcStatusPontos');
	Route::get('/lgc/problemas-encontrados', 'RelGerTermoIso@LgcProblemasEncontrados')->name('relGer.tr.LgcProblemasEncontrados');

	Route::get('/lpc/perfil', 'RelGerTermoIso@LpcPerfil')->name('relGer.tr.LpcPerfil');
	Route::get('/lpc/anormalidades', 'RelGerTermoIso@LpcAnormalidades')->name('relGer.tr.LpcAnormalidades');
	Route::get('/lpc/status-pontos', 'RelGerTermoIso@LpcStatusPontos')->name('relGer.tr.LpcStatusPontos');
	Route::get('/lpc/problemas-encontrados', 'RelGerTermoIso@LpcProblemasEncontrados')->name('relGer.tr.LpcProblemasEncontrados');

	Route::get('/cs/perfil', 'RelGerTermoIso@CsPerfil')->name('relGer.tr.CsPerfil');
	Route::get('/cs/anormalidades', 'RelGerTermoIso@CsAnormalidades')->name('relGer.tr.CsAnormalidades');
	Route::get('/cs/status-pontos', 'RelGerTermoIso@CsStatusPontos')->name('relGer.tr.CsStatusPontos');
	Route::get('/cs/problemas-encontrados', 'RelGerTermoIso@CsProblemasEncontrados')->name('relGer.tr.CsProblemasEncontrados');

	Route::get('/pontes-rolantes/perfil', 'RelGerTermoIso@PrPerfil')->name('relGer.tr.PrPerfil');
	Route::get('/pontes-rolantes/anormalidades', 'RelGerTermoIso@PrAnormalidades')->name('relGer.tr.PrAnormalidades');
	Route::get('/pontes-rolantes/status-pontos', 'RelGerTermoIso@PrStatusPontos')->name('relGer.tr.PrStatusPontos');
	Route::get('/pontes-rolantes/problemas-encontrados', 'RelGerTermoIso@PrProblemasEncontrados')->name('relGer.tr.PrProblemasEncontrados');
});

	// - - - - - - - - - - - - - - - - - - - Rotas para Relatório Gerencial Análise de Óleo - - - - - - - - - - - - - - - - -
	Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-gerencial/analise-de-oleo'], function() {

	Route::get('/ggop-pr/perfil', 'RelGerOleo@GeralPerfil')->name('relGer.lb.GeralPerfil');
	Route::get('/ggop-pr/anormalidades', 'RelGerOleo@GeralAnormalidades')->name('relGer.lb.GeralAnormalidades');
	Route::get('/ggop-pr/status-pontos', 'RelGerOleo@GeralStatusPontos')->name('relGer.lb.GeralStatusPontos');
	Route::get('/ggop-pr/problemas-encontrados', 'RelGerOleo@GeralProblemasEncontrados')->name('relGer.lb.GeralProblemasEncontrados');

	Route::get('/ura/perfil', 'RelGerOleo@UraPerfil')->name('relGer.lb.UraPerfil');
	Route::get('/ura/anormalidades', 'RelGerOleo@UraAnormalidades')->name('relGer.lb.UraAnormalidades');
	Route::get('/ura/status-pontos', 'RelGerOleo@UraStatusPontos')->name('relGer.lb.UraStatusPontos');
	Route::get('/ura/problemas-encontrados', 'RelGerOleo@UraProblemasEncontrados')->name('relGer.lb.UraProblemasEncontrados');

	Route::get('/lds/perfil', 'RelGerOleo@LdsPerfil')->name('relGer.lb.LdsPerfil');
	Route::get('/lds/anormalidades', 'RelGerOleo@LdsAnormalidades')->name('relGer.lb.LdsAnormalidades');
	Route::get('/lds/status-pontos', 'RelGerOleo@LdsStatusPontos')->name('relGer.lb.LdsStatusPontos');
	Route::get('/lds/problemas-encontrados', 'RelGerOleo@LdsProblemasEncontrados')->name('relGer.lb.LdsProblemasEncontrados');

	Route::get('/lrf/perfil', 'RelGerOleo@LrfPerfil')->name('relGer.lb.LrfPerfil');
	Route::get('/lrf/anormalidades', 'RelGerOleo@LrfAnormalidades')->name('relGer.lb.LrfAnormalidades');
	Route::get('/lrf/status-pontos', 'RelGerOleo@LrfStatusPontos')->name('relGer.lb.LrfStatusPontos');
	Route::get('/lrf/problemas-encontrados', 'RelGerOleo@LrfProblemasEncontrados')->name('relGer.lb.LrfProblemasEncontrados');

	Route::get('/uti/perfil', 'RelGerOleo@UtiPerfil')->name('relGer.lb.UtiPerfil');
	Route::get('/uti/anormalidades', 'RelGerOleo@UtiAnormalidades')->name('relGer.lb.UtiAnormalidades');
	Route::get('/uti/status-pontos', 'RelGerOleo@UtiStatusPontos')->name('relGer.lb.UtiStatusPontos');
	Route::get('/uti/problemas-encontrados', 'RelGerOleo@UtiProblemasEncontrados')->name('relGer.lb.UtiProblemasEncontrados');

	Route::get('/lgc/perfil', 'RelGerOleo@LgcPerfil')->name('relGer.lb.LgcPerfil');
	Route::get('/lgc/anormalidades', 'RelGerOleo@LgcAnormalidades')->name('relGer.lb.LgcAnormalidades');
	Route::get('/lgc/status-pontos', 'RelGerOleo@LgcStatusPontos')->name('relGer.lb.LgcStatusPontos');
	Route::get('/lgc/problemas-encontrados', 'RelGerOleo@LgcProblemasEncontrados')->name('relGer.lb.LgcProblemasEncontrados');

	Route::get('/lpc/perfil', 'RelGerOleo@LpcPerfil')->name('relGer.lb.LpcPerfil');
	Route::get('/lpc/anormalidades', 'RelGerOleo@LpcAnormalidades')->name('relGer.lb.LpcAnormalidades');
	Route::get('/lpc/status-pontos', 'RelGerOleo@LpcStatusPontos')->name('relGer.lb.LpcStatusPontos');
	Route::get('/lpc/problemas-encontrados', 'RelGerOleo@LpcProblemasEncontrados')->name('relGer.lb.LpcProblemasEncontrados');

	Route::get('/cs/perfil', 'RelGerOleo@CsPerfil')->name('relGer.lb.CsPerfil');
	Route::get('/cs/anormalidades', 'RelGerOleo@CsAnormalidades')->name('relGer.lb.CsAnormalidades');
	Route::get('/cs/status-pontos', 'RelGerOleo@CsStatusPontos')->name('relGer.lb.CsStatusPontos');
	Route::get('/cs/problemas-encontrados', 'RelGerOleo@CsProblemasEncontrados')->name('relGer.lb.CsProblemasEncontrados');

	Route::get('/pontes-rolantes/perfil', 'RelGerOleo@PrPerfil')->name('relGer.lb.PrPerfil');
	Route::get('/pontes-rolantes/anormalidades', 'RelGerOleo@PrAnormalidades')->name('relGer.lb.PrAnormalidades');
	Route::get('/pontes-rolantes/status-pontos', 'RelGerOleo@PrStatusPontos')->name('relGer.lb.PrStatusPontos');
	Route::get('/pontes-rolantes/problemas-encontrados', 'RelGerOleo@PrProblemasEncontrados')->name('relGer.lb.PrProblemasEncontrados');

});

	// - - - - - - - - - - - - - - - - - - - Rotas para Relatório Gerencial Resistência de Motores - - - - - - - - - - - - - - - - -
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-gerencial/analise-de-resistencia'], function() {

	Route::get('/ggop-pr/perfil', 'RelGerResistencia@GeralPerfil')->name('relGer.rm.GeralPerfil');
	Route::get('/ggop-pr/status-dos-pontos', 'RelGerResistencia@GeralStatusDosPontos')->name('relGer.rm.GeralStatusDosPontos');
	Route::get('/ggop-pr/anormalidades', 'RelGerResistencia@GeralAnormalidades')->name('relGer.rm.GeralAnormalidades');
	Route::get('/ggop-pr/problemas-encontrados', 'RelGerResistencia@GeralProblemasEncontrados')->name('relGer.rm.GeralProblemasEncontrados');

	Route::get('/ura/perfil', 'RelGerResistencia@UraPerfil')->name('relGer.rm.UraPerfil');
	Route::get('/ura/status-dos-pontos', 'RelGerResistencia@UraStatusDosPontos')->name('relGer.rm.UraStatusDosPontos');
	Route::get('/ura/anormalidades', 'RelGerResistencia@UraAnormalidades')->name('relGer.rm.UraAnormalidades');
	Route::get('/ura/problemas-encontrados', 'RelGerResistencia@UraProblemasEncontrados')->name('relGer.rm.UraProblemasEncontrados');

	Route::get('/lds/perfil', 'RelGerResistencia@LdsPerfil')->name('relGer.rm.LdsPerfil');
	Route::get('/lds/status-dos-pontos', 'RelGerResistencia@LdsStatusDosPontos')->name('relGer.rm.LdsStatusDosPontos');
	Route::get('/lds/anormalidades', 'RelGerResistencia@LdsAnormalidades')->name('relGer.rm.LdsAnormalidades');
	Route::get('/lds/problemas-encontrados', 'RelGerResistencia@LdsProblemasEncontrados')->name('relGer.rm.LdsProblemasEncontrados');

	Route::get('/lrf/perfil', 'RelGerResistencia@LrfPerfil')->name('relGer.rm.LrfPerfil');
	Route::get('/lrf/status-dos-pontos', 'RelGerResistencia@LrfStatusDosPontos')->name('relGer.rm.LrfStatusDosPontos');
	Route::get('/lrf/anormalidades', 'RelGerResistencia@LrfAnormalidades')->name('relGer.rm.LrfAnormalidades');
	Route::get('/lrf/problemas-encontrados', 'RelGerResistencia@LrfProblemasEncontrados')->name('relGer.rm.LrfProblemasEncontrados');

	Route::get('/uti/perfil', 'RelGerResistencia@UtiPerfil')->name('relGer.rm.UtiPerfil');
	Route::get('/uti/status-dos-pontos', 'RelGerResistencia@UtiStatusDosPontos')->name('relGer.rm.UtiStatusDosPontos');
	Route::get('/uti/anormalidades', 'RelGerResistencia@UtiAnormalidades')->name('relGer.rm.UtiAnormalidades');
	Route::get('/uti/problemas-encontrados', 'RelGerResistencia@UtiProblemasEncontrados')->name('relGer.rm.UtiProblemasEncontrados');

	Route::get('/lgc/perfil', 'RelGerResistencia@LgcPerfil')->name('relGer.rm.LgcPerfil');
	Route::get('/lgc/status-dos-pontos', 'RelGerResistencia@LgcStatusDosPontos')->name('relGer.rm.LgcStatusDosPontos');
	Route::get('/lgc/anormalidades', 'RelGerResistencia@LgcAnormalidades')->name('relGer.rm.LgcAnormalidades');
	Route::get('/lgc/problemas-encontrados', 'RelGerResistencia@LgcProblemasEncontrados')->name('relGer.rm.LgcProblemasEncontrados');

	Route::get('/lpc/perfil', 'RelGerResistencia@LpcPerfil')->name('relGer.rm.LpcPerfil');
	Route::get('/lpc/status-dos-pontos', 'RelGerResistencia@LpcStatusDosPontos')->name('relGer.rm.LpcStatusDosPontos');
	Route::get('/lpc/anormalidades', 'RelGerResistencia@LpcAnormalidades')->name('relGer.rm.LpcAnormalidades');
	Route::get('/lpc/problemas-encontrados', 'RelGerResistencia@LpcProblemasEncontrados')->name('relGer.rm.LpcProblemasEncontrados');

	Route::get('/cs/perfil', 'RelGerResistencia@CsPerfil')->name('relGer.rm.CsPerfil');
	Route::get('/cs/status-dos-pontos', 'RelGerResistencia@CsStatusDosPontos')->name('relGer.rm.CsStatusDosPontos');
	Route::get('/cs/anormalidades', 'RelGerResistencia@CsAnormalidades')->name('relGer.rm.CsAnormalidades');
	Route::get('/cs/problemas-encontrados', 'RelGerResistencia@CsProblemasEncontrados')->name('relGer.rm.CsProblemasEncontrados');

	Route::get('/pontes-rolantes/perfil', 'RelGerResistencia@PrPerfil')->name('relGer.rm.PrPerfil');
	Route::get('/pontes-rolantes/status-dos-pontos', 'RelGerResistencia@PrStatusDosPontos')->name('relGer.rm.PrStatusDosPontos');
	Route::get('/pontes-rolantes/anormalidades', 'RelGerResistencia@PrAnormalidades')->name('relGer.rm.PrAnormalidades');
	Route::get('/pontes-rolantes/problemas-encontrados', 'RelGerResistencia@PrProblemasEncontrados')->name('relGer.rm.PrProblemasEncontrados');

});

Auth::routes();

Route::get('/home', 'HomeController@index');


//============================ ROTAS PARA RELATÓRIOS TÉCNICOS - TERMOGRAFIA ===============================//
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-tecnico/termografia'], function() {

	Route::get('/', 'RelTecTermografia@index')->name('relTec.termografia.index');

	Route::get('ura/painel1', 'RelTecTermografia@ura_painel_1')->name('relTec.termografia.ura_painel_1');
	Route::get('ura/painel2', 'RelTecTermografia@ura_painel_2')->name('relTec.termografia.ura_painel_2');
	Route::get('ura/painelCaldeiras', 'RelTecTermografia@ura_painel_caldeiras')->name('relTec.termografia.ura_painel_caldeiras');
	Route::get('ura/laudoRefratarios', 'RelTecTermografia@ura_laudo_refratarios')->name('relTec.termografia.laudo_refratarios');

	Route::get('decapagem/ets', 'RelTecTermografia@decapagem_ets')->name('relTec.termografia.decapagem_ets');
	Route::get('decapagem/ccm1', 'RelTecTermografia@decapagem_ccm1')->name('relTec.termografia.decapagem_ccm1');
	Route::get('decapagem/ccm2', 'RelTecTermografia@decapagem_ccm2')->name('relTec.termografia.decapagem_ccm2');
	Route::get('decapagem/drives', 'RelTecTermografia@decapagem_drives')->name('relTec.termografia.decapagem_drives');
	Route::get('decapagem/emergencia', 'RelTecTermografia@decapagem_emergencia')->name('relTec.termografia.decapagem_emergencia');

	Route::get('laminador/ets', 'RelTecTermografia@laminador_ets')->name('relTec.termografia.laminador_ets');
	Route::get('laminador/ccm1', 'RelTecTermografia@laminador_ccm1')->name('relTec.termografia.laminador_ccm1');
	Route::get('laminador/ccm2', 'RelTecTermografia@laminador_ccm2')->name('relTec.termografia.laminador_ccm2');
	Route::get('laminador/salaPLC', 'RelTecTermografia@laminador_salaPLC')->name('relTec.termografia.laminador_salaPLC');
	Route::get('laminador/mainDrives', 'RelTecTermografia@laminador_mainDrives')->name('relTec.termografia.laminador_mainDrives');
	Route::get('laminador/auxiliaresDrives', 'RelTecTermografia@laminador_auxiliaresDrives')->name('relTec.termografia.laminador_auxiliaresDrives');
	Route::get('laminador/drives', 'RelTecTermografia@laminador_drives')->name('relTec.termografia.laminador_drives');
	Route::get('laminador/payOfReel', 'RelTecTermografia@laminador_payOfReel')->name('relTec.termografia.laminador_payOfReel');
	Route::get('laminador/oficil', 'RelTecTermografia@laminador_oficil')->name('relTec.termografia.laminador_oficil');

	Route::get('utilidades/ccm', 'RelTecTermografia@utilidades_ccm')->name('relTec.termografia.utilidades_ccm');
	Route::get('utilidades/lv460V', 'RelTecTermografia@utilidades_lv460V')->name('relTec.termografia.utilidades_lv460V');
	Route::get('utilidades/salaCompressores', 'RelTecTermografia@utilidades_salaCompressores')->name('relTec.termografia.utilidades_salaCompressores');
	Route::get('utilidades/subestacao', 'RelTecTermografia@utilidades_subestacao')->name('relTec.termografia.utilidades_subestacao');

	Route::get('galvanizacao/ets/entradaLimp', 'RelTecTermografia@galvanizacao_ets_entradaLimp')->name('relTec.termografia.galvanizacao_ets_entradaLimp');
	Route::get('galvanizacao/ets/forno', 'RelTecTermografia@galvanizacao_forno')->name('relTec.termografia.galvanizacao_forno');
	Route::get('galvanizacao/ets/infraSaida', 'RelTecTermografia@galvanizacao_infraSaida')->name('relTec.termografia.galvanizacao_infraSaida');
	Route::get('galvanizacao/ccm1/ccm7', 'RelTecTermografia@galvanizacao_ccm1_ccm7')->name('relTec.termografia.galvanizacao_ccm1_ccm7');
	Route::get('galvanizacao/ccm2/ccm3', 'RelTecTermografia@galvanizacao_ccm2_ccm3')->name('relTec.termografia.galvanizacao_ets_entradaLimp');
	Route::get('galvanizacao/ets/alarme/ccm4/ccm5', 'RelTecTermografia@galvanizacao_alarme_ccm4_ccm5')->name('relTec.termografia.galvanizacao_galvanizacao_alarme_ccm4_ccm5');
	Route::get('galvanizacao/drive/entrada', 'RelTecTermografia@galvanizacao_drive_entrada')->name('relTec.termografia.galvanizacao_drive_entrada');
	Route::get('galvanizacao/drive/saida', 'RelTecTermografia@galvanizacao_drive_saida')->name('relTec.termografia.galvanizacao_drive_saida');
	Route::get('galvanizacao/refratarios', 'RelTecTermografia@galvanizacao_refratarios')->name('relTec.termografia.galvanizacao_refratarios');

	Route::get('pintura/estacoesRemotas', 'RelTecTermografia@pintura_estacoesRemotas')->name('relTec.termografia.pintura_estacoesRemotas');
	Route::get('pintura/paineis/drives', 'RelTecTermografia@pintura_paineis_drives')->name('relTec.termografia.pintura_paineis_drives');
	Route::get('pintura/paineis/emergencia', 'RelTecTermografia@pintura_paineis_emergencia')->name('relTec.termografia.pintura_paineis_emergencia');
	Route::get('pintura/paineis/ccm', 'RelTecTermografia@pintura_paineis_ccm')->name('relTec.termografia.pintura_paineis_ccm');
	Route::get('pintura/refratarios', 'RelTecTermografia@pintura_refratarios')->name('relTec.termografia.pintura_refratarios');

	Route::get('cs/LCL', 'RelTecTermografia@cs_LCL')->name('relTec.termografia.cs_LCL');
	Route::get('cs/LCT1', 'RelTecTermografia@cs_LCT1')->name('relTec.termografia.cs_LCT1');
	Route::get('cs/LCT2', 'RelTecTermografia@cs_LCT2')->name('relTec.termografia.cs_LCT2');
	Route::get('cs/LCC', 'RelTecTermografia@cs_LCC')->name('relTec.termografia.cs_LCC');

	Route::get('pr/pontes', 'RelTecTermografia@pr_pontes')->name('relTec.termografia.pr_pontes');
	Route::get('pr/pr5', 'RelTecTermografia@pr_pontes_pr5')->name('relTec.termografia.pr_pontes_pr5');
	Route::get('pr/pr7', 'RelTecTermografia@pr_pontes_pr7')->name('relTec.termografia.pr_pontes_pr7');
	Route::get('pr/pr8', 'RelTecTermografia@pr_pontes_pr8')->name('relTec.termografia.pr_pontes_pr8');
	Route::get('pr/pr11', 'RelTecTermografia@pr_pontes_pr11')->name('relTec.termografia.pr_pontes_pr11');
	Route::get('pr/pr12', 'RelTecTermografia@pr_pontes_pr12')->name('relTec.termografia.pr_pontes_pr12');
	Route::get('pr/pr13', 'RelTecTermografia@pr_pontes_pr13')->name('relTec.termografia.pr_pontes_pr13');
	Route::get('pr/pr14', 'RelTecTermografia@pr_pontes_pr14')->name('relTec.termografia.pr_pontes_pr14');
	Route::get('pr/pr20', 'RelTecTermografia@pr_pontes_pr20')->name('relTec.termografia.pr_pontes_pr20');
	Route::get('pr/pr23', 'RelTecTermografia@pr_pontes_pr23')->name('relTec.termografia.pr_pontes_pr23');

});


//============================ ROTAS PARA RELATÓRIOS TÉCNICOS - TERMOGRAFIA DE ISOLAMENTO TÉRMICO ===============================//
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-tecnico/termografia-isolamento'], function() {

	Route::get('/', 'RelTecTermografiaIsolamento@index')->name('relTec.termografia_refratarios.index');

	Route::get('ura/queimadores', 'RelTecTermografiaIsolamento@ura_queimadores')->name('relTec.termografia_isolamento.ura_queimadores');
	Route::get('atualizacao/queimadores', 'RelTecTermografiaIsolamento@atualizacao_queimadores');

	Route::get('decapagem/caldeira/1', 'RelTecTermografiaIsolamento@decapagem_caldeira1')->name('relTec.termografia_isolamento.decapagem_caldeira1');
	Route::get('decapagem/caldeira/2', 'RelTecTermografiaIsolamento@decapagem_caldeira2')->name('relTec.termografia_isolamento.decapagem_caldeira2');

	Route::get('galvanizacao/forno', 'RelTecTermografiaIsolamento@galvanizacao_forno')->name('relTec.termografia_isolamento.galvanizacao_forno');

	Route::get('pintura/caldeira/1', 'RelTecTermografiaIsolamento@pintura_caldeira1')->name('relTec.termografia_isolamento.pintura_caldeira1');
	Route::get('pintura/oxidizer', 'RelTecTermografiaIsolamento@pintura_oxidizer')->name('relTec.termografia_isolamento.pintura_oxidizer');
	Route::get('pintura/oxidizer/tubulacao', 'RelTecTermografiaIsolamento@pintura_oxidizer_tubulacao')->name('relTec.termografia_isolamento.pintura_oxidizer_tubulacao');
	Route::get('pintura/estufa/prime', 'RelTecTermografiaIsolamento@pintura_estufa_prime')->name('relTec.termografia_isolamento.pintura_estufa_prime');
	Route::get('pintura/estufa/finish', 'RelTecTermografiaIsolamento@pintura_estufa_finish')->name('relTec.termografia_isolamento.pintura_estufa_finish');
});

//============================ ROTAS PARA RELATÓRIOS TÉCNICOS - VIBRACAO ===============================//
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-tecnico/vibracao'], function() {

	Route::get('/', 'RelTecVibracao@index')->name('relTec.vibracao.index');
	Route::get('/ura', 'RelTecVibracao@ura')->name('relTec.vibracao.ura');

	Route::get('/decapagem/entrada', 'RelTecVibracao@decapagem_entrada')->name('relTec.vibracao.decapagem-entrada');
	Route::get('/decapagem/processo', 'RelTecVibracao@decapagem_processo')->name('relTec.vibracao.decapagem-processo');
	Route::get('/decapagem/saida', 'RelTecVibracao@decapagem_saida')->name('relTec.vibracao.decapagem-saida');

	Route::get('/laminador', 'RelTecVibracao@laminador')->name('relTec.vibracao.laminador');
	Route::get('/laminador/porao-do-laminador', 'RelTecVibracao@laminador_porao')->name('relTec.vibracao.laminador-porao');
	Route::get('/laminador/oficina', 'RelTecVibracao@laminador_oficina')->name('relTec.vibracao.laminador-oficina');

	Route::get('/utilidades', 'RelTecVibracao@utilidades')->name('relTec.vibracao.utilidades');
	Route::get('/utilidades/casa-de-bombas', 'RelTecVibracao@utilidades_casa_bombas')->name('relTec.vibracao.utilidades-casa-bombas');
	Route::get('/utilidades/linhas', 'RelTecVibracao@utilidades_linhas')->name('relTec.vibracao.utilidades-linhas');

	Route::get('/galvanizacao/entrada', 'RelTecVibracao@galvanizacao_entrada')->name('relTec.vibracao.galvanizacao-entrada');
	Route::get('/galvanizacao/limpeza/boiler', 'RelTecVibracao@galvanizacao_limpeza_boiler')->name('relTec.vibracao.galvanizacao-limpeza-boiler');
	Route::get('/galvanizacao/limpeza/escovas', 'RelTecVibracao@galvanizacao_limpeza_escovas')->name('relTec.vibracao.galvanizacao-limpeza-escova');
	Route::get('/galvanizacao/forno', 'RelTecVibracao@galvanizacao_forno')->name('relTec.vibracao.galvanizacao-forno');
	Route::get('/galvanizacao/apc/porao', 'RelTecVibracao@galvanizacao_apc_porao')->name('relTec.vibracao.galvanizacao-apc-porao');
	Route::get('/galvanizacao/laminador', 'RelTecVibracao@galvanizacao_laminador')->name('relTec.vibracao.galvanizacao-laminador');
	Route::get('/galvanizacao/saida', 'RelTecVibracao@galvanizacao_saida')->name('relTec.vibracao.galvanizacao-saida');

	Route::get('/pintura/entrada', 'RelTecVibracao@pintura_entrada')->name('relTec.vibracao.pintura-entrada');
	Route::get('/pintura/processo1', 'RelTecVibracao@pintura_processo1')->name('relTec.vibracao.pintura-processo1');
	Route::get('/pintura/processo2', 'RelTecVibracao@pintura_processo2')->name('relTec.vibracao.pintura-processo2');
	Route::get('/pintura/estufas', 'RelTecVibracao@pintura_estufas')->name('relTec.vibracao.pintura-estufas');
	Route::get('/pintura/area-externa', 'RelTecVibracao@pintura_areaExterna')->name('relTec.vibracao.pintura-areaExterna');
	Route::get('/pintura/saida', 'RelTecVibracao@pintura_saida')->name('relTec.vibracao.pintura-saida');

	Route::get('/cs/LCL', 'RelTecVibracao@cs_LCL')->name('relTec.vibracao.cs-LCL');
	Route::get('/cs/LCT1', 'RelTecVibracao@cs_LCT1')->name('relTec.vibracao.cs-LCT1');
	Route::get('/cs/LCT2', 'RelTecVibracao@cs_LCT2')->name('relTec.vibracao.cs-LCT2');
	Route::get('/cs/LCC', 'RelTecVibracao@cs_LCC')->name('relTec.vibracao.cs-LCC');

	Route::get('/pr/pontes', 'RelTecVibracao@pr_pontes')->name('relTec.vibracao.pr-pontes');
	Route::get('pr/pr12', 'RelTecVibracao@pr_pontes_pr12')->name('relTec.vibracao.pr_pontes_pr12');
	Route::get('pr/pr23', 'RelTecVibracao@pr_pontes_pr23')->name('relTec.vibracao.pr_pontes_pr23');
});


//============================ ROTAS PARA RELATÓRIOS TÉCNICOS - OLEO ===============================//
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-tecnico/oleo'], function() {

	Route::get('/', 'RelTecOleo@index')->name('relTec.oleo.index');

	Route::get('/decapagem/entrada', 'RelTecOleo@decapagem_entrada')->name('relTec.oleo.decapagem-entrada');
	Route::get('/decapagem/saida', 'RelTecOleo@decapagem_saida')->name('relTec.oleo.decapagem-saida');

	Route::get('/laminador/ofc', 'RelTecOleo@laminador_ofc')->name('relTec.oleo.laminador-ofc');
	Route::get('/laminador', 'RelTecOleo@laminador')->name('relTec.oleo.laminador');
	Route::get('/laminador/porao', 'RelTecOleo@laminador_porao')->name('relTec.oleo.laminador-porao');

	Route::get('/utilidades/chiller/LGC', 'RelTecOleo@utilidades_chiller_LGC')->name('relTec.oleo.utilidades_chiller_LGC');
	Route::get('/utilidades/chiller/LPC', 'RelTecOleo@utilidades_chiller_LPC')->name('relTec.oleo.utilidades_chiller_LPC');

	Route::get('/galvanizacao/entrada', 'RelTecOleo@galvanizacao_entrada')->name('relTec.oleo.galvanizacao-entrada');
	Route::get('/galvanizacao/limpeza/escovas', 'RelTecOleo@galvanizacao_limpeza_escovas')->name('relTec.oleo.galvanizacao-limpeza-escova');
	Route::get('/galvanizacao/limpeza/boiler', 'RelTecOleo@galvanizacao_limpeza_boiler')->name('relTec.oleo.galvanizacao-limpeza-boiler');
	Route::get('/galvanizacao/forno', 'RelTecOleo@galvanizacao_forno')->name('relTec.oleo.galvanizacao-forno');
	Route::get('/galvanizacao/apc/porao', 'RelTecOleo@galvanizacao_apc_porao')->name('relTec.oleo.galvanizacao-apc-porao');
	Route::get('/galvanizacao/saida/laminador', 'RelTecOleo@galvanizacao_saida_laminador')->name('relTec.oleo.galvanizacao_saida_laminador');
	Route::get('/galvanizacao/saida', 'RelTecOleo@galvanizacao_saida')->name('relTec.oleo.galvanizacao-saida');

	Route::get('/pintura/entrada', 'RelTecOleo@pintura_entrada')->name('relTec.oleo.pintura-entrada');
	Route::get('/pintura/processo1', 'RelTecOleo@pintura_processo1')->name('relTec.oleo.pintura-processo1');
	Route::get('/pintura/processo2', 'RelTecOleo@pintura_processo2')->name('relTec.oleo.pintura-processo2');
	Route::get('/pintura/estufas', 'RelTecOleo@pintura_estufas')->name('relTec.oleo.pintura-estufas');
	Route::get('/pintura/saida', 'RelTecOleo@pintura_saida')->name('relTec.oleo.pintura-saida');

	Route::get('/cs/LCL', 'RelTecOleo@cs_LCL')->name('relTec.oleo.cs-LCL');
	Route::get('/cs/LCT1', 'RelTecOleo@cs_LCT1')->name('relTec.oleo.cs-LCT1');
	Route::get('/cs/LCT2', 'RelTecOleo@cs_LCT2')->name('relTec.oleo.cs-LCT2');
	Route::get('/cs/LCC', 'RelTecOleo@cs_LCC')->name('relTec.oleo.cs-LCC');

	Route::get('/pr/pontes', 'RelTecOleo@pr_pontes')->name('relTec.oleo.pr-pontes');



});


//============================ ROTAS PARA RELATÓRIOS TÉCNICOS - RESISTENCIA ===============================//
Route:: group(['namespace' => 'Csn', 'prefix' => '/preditiva.csn.br/relatorio-tecnico/resistencia'], function() {

	Route::get('/', 'RelTecResistencia@index')->name('relTec.resistencia.index');

	Route::get('/ura', 'RelTecResistencia@ura')->name('relTec.resistencia.ura');

	Route::get('/decapagem', 'RelTecResistencia@decapagem')->name('relTec.resistencia-decapagem');

	Route::get('/laminador', 'RelTecResistencia@laminador')->name('relTec.resistencia-laminador');

	Route::get('/utilidades', 'RelTecResistencia@utilidades')->name('relTec.resistencia-utilidades');
	Route::get('/utilidades/casa-bombas', 'RelTecResistencia@utilidades_casa_bombas')->name('relTec.resistencia-utilidades_casa_bombas');
	Route::get('/utilidades/geracao-ar-cs', 'RelTecResistencia@utilidades_geracao_ar_cs')->name('relTec.resistencia-utilidades_geracao_ar_cs');


	Route::get('/galvanizacao/entrada', 'RelTecResistencia@galvanizacao_entrada')->name('relTec.resistencia.galvanizacao-entrada');
	Route::get('/galvanizacao/acumulador/entrada', 'RelTecResistencia@galvanizacao_acumulador_entrada')->name('relTec.resistencia.galvanizacao-limpeza-escova');
	Route::get('/galvanizacao/defl/porao', 'RelTecResistencia@galvanizacao_defl_porao')->name('relTec.resistencia.galvanizacao-limpeza-boiler');
	Route::get('/galvanizacao/saida/laminador', 'RelTecResistencia@galvanizacao_saida_laminador')->name('relTec.resistencia.galvanizacao-forno');
	Route::get('/galvanizacao/saida', 'RelTecResistencia@galvanizacao_saida')->name('relTec.resistencia.galvanizacao-apc-porao');

	Route::get('/pintura/entrada', 'RelTecResistencia@pintura_entrada')->name('relTec.resistencia.pintura-entrada');
	Route::get('/pintura/acumulador/entrada', 'RelTecResistencia@pintura_acumulador_entrada')->name('relTec.resistencia.pintura_acumulador_entrada');
	Route::get('/pintura/processo', 'RelTecResistencia@pintura_processo')->name('relTec.resistencia.pintura_processo');
	Route::get('/pintura/estufas', 'RelTecResistencia@pintura_estufas')->name('relTec.resistencia.pintura-estufas');
	Route::get('/pintura/areaExterna', 'RelTecResistencia@pintura_areaExterna')->name('relTec.resistencia.pintura_areaExterna');
	Route::get('/pintura/saida', 'RelTecResistencia@pintura_saida')->name('relTec.resistencia.pintura-saida');

	Route::get('/cs/LCL', 'RelTecResistencia@cs_LCL')->name('relTec.resistencia.cs-LCL');
	Route::get('/cs/LCT1', 'RelTecResistencia@cs_LCT1')->name('relTec.resistencia.cs-LCT1');
	Route::get('/cs/LCT2', 'RelTecResistencia@cs_LCT2')->name('relTec.resistencia.cs-LCT2');
	Route::get('/cs/LCC', 'RelTecResistencia@cs_LCC')->name('relTec.resistencia.cs-LCC');

	Route::get('/pontes-rolantes/5', 'RelTecResistencia@pr5')->name('relTec.resistencia.pr5');
	Route::get('/pontes-rolantes/7', 'RelTecResistencia@pr7')->name('relTec.resistencia.pr7');
	Route::get('/pontes-rolantes/8', 'RelTecResistencia@pr8')->name('relTec.resistencia.pr8');
	Route::get('/pontes-rolantes/11', 'RelTecResistencia@pr11')->name('relTec.resistencia.pr11');
	Route::get('/pontes-rolantes/12', 'RelTecResistencia@pr12')->name('relTec.resistencia.pr12');
	Route::get('/pontes-rolantes/13', 'RelTecResistencia@pr13')->name('relTec.resistencia.pr13');
	Route::get('/pontes-rolantes/14', 'RelTecResistencia@pr14')->name('relTec.resistencia.pr14');
	Route::get('/pontes-rolantes/20', 'RelTecResistencia@pr20')->name('relTec.resistencia.pr20');
	Route::get('/pontes-rolantes/23', 'RelTecResistencia@pr23')->name('relTec.resistencia.pr23');
});

//============================rotas para páginas COM NECESSIDADE DE AUTENTICAÇÃO===============================//

//----------------------------rota para o ADMINISTRADOR DO MATHISON---------------------------------------
Route:: group(['prefix' => '/mathison.dev.br/admin'], function() {

	//rotas para autenticação
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');

	//rotas para gerenciamento de novo técnico
	Route::get('/register', 'AdminController@registroTecnico')->name('registro.tecnico');
	Route::get('/registro-tecnico', 'AdminController@registroTecnico')->name('registro.tecnico');
	Route::get('/reset-senha-tecnico', 'AdminController@resetSenhaTecnico')->name('reset.tecnico');

	//rotas de cadastro de nova técnica preditiva
	Route::get('/cadastro-tecnica', 'AdminController@cadastroTecnica')->name('cadastro.tecnica');
	Route::post('/cadastro-tecnica/store', 'Mathison\TecnicaController@store')->name('tecnica.store');

	//rota de logout
	Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

	// Rotas para troca de senha do Admin
	Route::post('/trocar-senha', 'Auth\AdminResetPasswordController@reset');
	Route::get('/trocar-senha', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});



//----------------------rota para o TÉCNICO PREDITIVA COMPANHIA SIDERÚRGICA NACIONAL-----------------------------------
Route:: group(['prefix' => '/preditiva.csn.br/tecnico-preditiva',
							 'middleware' => 'auth'], function() {
	Route::get('/', 'Csn\TechnicianController@index')->name('technician.dashboard');
	Route::post('/logout', 'Auth\LoginController@logout')->name('technician.logout');


	//-------------------------ROTAS PARA TERMOGRAFIA ELÉTRICA------------------------------
	Route::get('/termografia', 'Csn\TermografiaController@index')->name('termografia.dashboard');
	Route::get('/termografia/atividades/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\TermografiaController@myformAtividadesAjax'));
	Route::get('/termografia/myformTabela', 'Csn\TermografiaController@myformTabela');
	Route::post('/termografia/adiciona', 'Csn\TermografiaController@store')->name('storeTermo.dashboard');
	Route::get('/termografia/descricao-atividade', 'Csn\TermografiaController@descricaoAtividade');

	//-------------------------ROTAS PARA TERMOGRAFIA ISOLAMENTO------------------------------
	Route::get('/termografia-isolamento', 'Csn\TermografiaIsoController@index')->name('termografiaIsolamento.dashboard');
	Route::get('/termografia-isolamento/sistemas/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\TermografiaIsoController@myformAtividadesAjax'));
	Route::get('/termografia-isolamento/myformTabela', 'Csn\TermografiaIsoController@myformTabela');
	Route::post('/termografia-isolamento/adiciona', 'Csn\TermografiaIsoController@store')->name('storeTermoIsolamento.dashboard');

	//-------------------------ROTAS PARA VIBRACAO---------------------------------
	Route::get('/vibracao', 'Csn\VibracaoController@index')->name('vibracao.dashboard');
	Route::get('/vibracao/atividades/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\VibracaoController@myformAtividadesAjax'));
	Route::post('/vibracao/adiciona', 'Csn\VibracaoController@store')->name('storeVib.dashboard');
	Route::get('/vibracao/myformTabela', 'Csn\VibracaoController@myformTabela');
	Route::get('/vibracao/arquivo', 'Csn\VibracaoController@addArquivo')->name('addArquivoVib.dashboard');
	Route::post('/vibracao/adiciona/arquivo', 'Csn\VibracaoController@addVibracao')->name('addVibracao.dashboard');
	Route::post('/vibracao/grafico-amostra', 'Csn\VibracaoController@graficoAmostra')->name('graficoAmostra.dashboard');
	Route::post('/vibracao/adiciona/imagem', 'Csn\VibracaoController@addVibracaoImagem')->name('addVibracaoImagem.dashboard');

	//-------------------------ROTAS PARA OLEO---------------------------------
	Route::get('/analise-de-oleo/arquivo', 'Csn\OleoController@addArquivo')->name('addArquivo.dashboard');
	Route::post('/analise-de-oleo/adiciona/arquivo', 'Csn\OleoController@addOleo')->name('addOleo.dashboard');
	Route::get('/analise-de-oleo/cadastro', 'Csn\OleoController@cadastroOleo')->name('cadastroOleo.dashboard');

	Route::get('/oleo/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\OleoController@myformAjax'));
	Route::get('/oleo/ativos/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\OleoController@myformAtivosAjax'));
	Route::get('/oleo/atividades/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\OleoController@myformAtividadesAjax'));

	Route::post('/oleo/adiciona', 'Csn\OleoController@store')->name('storeOleo.dashboard');
	Route::post('/oleo/adiciona/imagem', 'Csn\OleoController@addOleoImagem')->name('addOleoImagem.dashboard');

	//-------------------------ROTAS PARA RESISTENCIA---------------------------------
	Route::get('/resistencia/inserir-atividade', 'Csn\ResistenciaController@index')->name('resistencias.dashboard');
	Route::post('/resistencia/inserir-coleta', 'Csn\ResistenciaController@index2')->name('resistencias2.dashboard');
	Route::get('/resistencia/atividades/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\ResistenciaController@myformAtividadesAjax'));
	Route::get('/resistencia/myformTabela', 'Csn\ResistenciaController@myformTabela');
	Route::get('/resistencia/arquivo', 'Csn\ResistenciaController@addArquivo')->name('addArquivoResistencia.dashboard');
	Route::post('/resistencia/adiciona', 'Csn\ResistenciaController@store')->name('storeResis.dashboard');
	Route::post('/resistencia/adiciona/imagem', 'Csn\ResistenciaController@addResistenciaImagem')->name('addResistenciaImagem.dashboard');
	Route::post('/resistencia/adiciona/analise', 'Csn\ResistenciaController@addResistencia')->name('addAnalise.dashboard');
	Route::post('/resistencia/grafico-amostra', 'Csn\ResistenciaController@graficoAmostra')->name('graficoAmostraResistencia.dashboard');

	//-------------------------ROTAS PARA CONFIGURACOES---------------------------------
	Route::get('/configuracoes', 'Csn\ConfiguracoesController@index')->name('configuracoes.dashboard');
	Route::get('/configuracoes/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\ConfiguracoesController@myformAjax'));
	Route::get('/configuracoes/ativos/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\ConfiguracoesController@myformAtivosAjax'));
	Route::post('/configuracoes/adiciona', 'Csn\ConfiguracoesController@store')->name('storeConf.dashboard');

	//-------------------------ROTAS PARA EDITAR AS ATIVIDADES DE CADA TECNICA---------------------------------
	//Acessando através do sidebar de cada técnica
	Route::get('/configuracoes/editar/atividade/termografia', 'Csn\ConfiguracoesController@configEditarTerm')->name('configEditarTerm.dashboard');
	Route::get('/configuracoes/editar/atividade/vibracao', 'Csn\ConfiguracoesController@configEditarVib')->name('configEditarVib.dashboard');
	Route::get('/configuracoes/editar/atividade/oleo', 'Csn\ConfiguracoesController@configEditarOleo')->name('configEditarOleo.dashboard');
	Route::get('/configuracoes/editar/atividade/resistencia', 'Csn\ConfiguracoesController@configEditarResist')->name('configEditarResist.dashboard');
	Route::get('/configuracoes/editar/atividade/termografia-isolamento', 'Csn\ConfiguracoesController@configEditarTR')->name('configEditarTR.dashboard');
	//Rotas para os DROPDOWNS de seleção de atividades
	Route::get('/configuracoes/atividades/termografia/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\ConfiguracoesController@myformAtividadesAjaxTermZero'));
	Route::get('/configuracoes/atividades/vibracao/ajaxZero/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\ConfiguracoesController@myformAtividadesAjaxVibZero'));
	Route::get('/configuracoes/atividades/oleo/ajax/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\ConfiguracoesController@myformAtividadesAjaxOleoZero'));
	Route::get('/configuracoes/atividades/resistencia/ajaxZero/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\ConfiguracoesController@myformAtividadesAjaxResistZero'));
	Route::get('/configuracoes/atividades/termografia-isolamento/ajaxZero/{id}', array('as' => 'dropdowns', 'uses' => 'Csn\ConfiguracoesController@myformAtividadesAjaxTRZero'));
	//Acessando através do submit do botão na rota acima
	Route::get('/configuracoes/editar/atividade/termografia-pag2', 'Csn\ConfiguracoesController@configEditarTerm2')->name('configEditarTerm2.dashboard');
	Route::get('/configuracoes/editar/atividade/vibracao-pag2', 'Csn\ConfiguracoesController@configEditarVib2')->name('configEditarVib2.dashboard');
	Route::get('/configuracoes/editar/atividade/oleo-pag2', 'Csn\ConfiguracoesController@configEditarOleo2')->name('configEditarOleo2.dashboard');
	Route::get('/configuracoes/editar/atividade/resistencia-pag2', 'Csn\ConfiguracoesController@configEditarResist2')->name('configEditarResist2.dashboard');
	Route::get('/configuracoes/editar/atividade/termografia-isolamento-pag2', 'Csn\ConfiguracoesController@configEditarTR2')->name('configEditarTR2.dashboard');
	//Efetivando a alteração feita através do submit acima
	Route::post('/configuracoes/editar/atividade/termografia/adiciona', 'Csn\ConfiguracoesController@storeEditarTerm')->name('storeEditarTerm.dashboard');
	Route::post('/configuracoes/editar/atividade/vibracao/adiciona', 'Csn\ConfiguracoesController@storeEditarVib')->name('storeEditarVib.dashboard');
	Route::post('/configuracoes/editar/atividade/oleo/adiciona', 'Csn\ConfiguracoesController@storeEditarOleo')->name('storeEditarOleo.dashboard');
	Route::post('/configuracoes/editar/atividade/resistencia/adiciona', 'Csn\ConfiguracoesController@storeEditarResist')->name('storeEditarResist.dashboard');
	Route::post('/configuracoes/editar/atividade/termografia-isolamento/adiciona', 'Csn\ConfiguracoesController@storeEditarTR')->name('storeEditarTR.dashboard');

	Route::post('/upload/vibracao', 'Csn\TechnicianController@move_uploaded_file')->name('upload-vibracao-post.dashboard');
	Route::post('/upload/resistencia', 'Csn\TechnicianController@move_uploaded_file')->name('upload-resistencia-post.dashboard');
});














//==================================================FIM=====================================================================

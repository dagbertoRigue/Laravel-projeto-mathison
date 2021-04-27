<?php

namespace App\Http\Controllers\Csn;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Preditiva_atividades;
use Illuminate\Support\Facades\DB;
use App\Models\Negocios;
use App\Models\Ativos;
use App\Models\Diagnosticos;
use App\Models\Status;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Input;
use Symfony\Composer\Process\Process;
use Symfony\Composer\Process\Exception\ProcessFailedException;



class TechnicianController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function index() {

	 	return view('csn.technician.technician');
	}

	public function oleo() {

	 	return view('csn.technician.oleo');
	}

	public function resistencias() {

	  $negocio = Negocios::all();
		$sistema = DB::select('select sistemas.name, negocios.name AS name_negocios from sistemas left join negocios on (sistemas.negocio_id = negocios.id)');

		$atividade = DB::select('select tag from preditiva_atividades');
		$status = Status::all();
		$diagnostico = Diagnosticos::all();

	 	return view('csn.technician.resistencias')->with('negocio', $negocio)
										   	   	  ->with('sistema', $sistema)
										          ->with('tag', $atividade)
										          ->with('status', $status)
										          ->with('diagnosticos', $diagnostico);
	}

	public function vibracao() {

		$negocio = Negocios::all();
		$sistema = DB::select('select sistemas.name, negocios.name AS name_negocios from sistemas left join negocios on (sistemas.negocio_id = negocios.id)');

		$atividade = DB::select('select tag from preditiva_atividades');
		$status = Status::all();
		$diagnostico = Diagnosticos::all();

	 	return view('csn.technician.vibracao')->with('negocio', $negocio)
										   	  ->with('sistema', $sistema)
										      ->with('tag', $atividade)
										      ->with('status', $status)
										      ->with('diagnosticos', $diagnostico);
	}

	public function configuracoes()	{
		return view('csn.technician.configuracoes');
	}


	/*
	* Salva o arquivo cadastrado no diretório padrão do laravel
	* C:\Users\administrator.AUTOMATIONPR\Recent
	*/
	public function move_csv_file() {
		//retorna o arquivo que foi carregado pelo usuário
		$file = \Input::file('file_upload');

		var_dump($file);
		//Verifica se o arquivo foi carregado corretamente
		var_dump(\Input::file('file_upload'));

		//diretório padrão do Laravel
		$destinationPath = public_path();
		$fileName = '01.'.pathinfo('img')['extension'];

		var_dump($file->move($destinationPath, $fileName));

		/*
		* Utiliza um Script em python para ler o arquivo cadastrado pelo usuário,
		* e recuperar essas informações para envia-las para o SVM.
		*/
		//$readFile = exec('python C:\Users\administrator.AUTOMATIONPR\Recent teste.txt');

		$process = new Process('python /Luiz Rossa/Script percorreTXT.py');
		$process->run();

		//Verifica se o Script executou corretamente
		if(!$process->isSuccessful())
		{
			throw new ProcessFailedException($process);
		}

		echo $process->getOutput();
	}
}

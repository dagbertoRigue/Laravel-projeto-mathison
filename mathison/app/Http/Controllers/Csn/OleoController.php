<?php

namespace App\Http\Controllers\Csn;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use DB;
use App\Models\Preditiva_status;
use App\Models\Diagnosticos;
use App\Models\Preditiva_analises;
use App\Models\Preditiva_atividades;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Symfony\Composer\Process\Process;
use Symfony\Composer\Process\Exception\ProcessFailedException;
use Symfony\Component\HttpFoundation\Response;
use Image;
use File;
use Illuminate\Support\Facades\storage;
use Illuminate\Console\Command;

class OleoController extends Controller {

    public function addArquivo()
    {
      $title = 'Preditiva | Análise de Óleo';
      $pendencias = DB::table('amostras_oleo')->count('id_amostra');
      $pendencias = $pendencias - 1;

      return view ('csn.technician.oleoArquivo')->with('title', $title)->with('pendencias', $pendencias);
    }

    public function addOleo(Request $request)
    {
      $title = 'Preditiva | Análise de Óleo';
      $arquivo = Request::file('arquivo');
      $name = "file_oil_upload";
      $fileName  = $name.'.'.$arquivo->getClientOriginalExtension();
      $location = public_path('oleo_csv/'.$name);
      $arquivo->move($location, $fileName);
      $colunaErrada = "";

      exec("python oleo_csv/file_oil_upload/readExcel.py", $getOutput);

      //recebe o nome da coluna que não foi encontrada no arquivo Excel, isso pode acontecer
      //caso o nome da coluna no arquivo esteja diferente do esperado no script C#.
      foreach ($getOutput as $key => $value)
      {
         $colunaErrada = $value;
      }

      $pendencias = DB::table('amostras_oleo')->count('id_amostra');
      $pendencias = $pendencias - 1;

      return view('csn.technician.oleoCadastro')->with('title', $title)->with('colunaErrada', $colunaErrada)->with('pendencias', $pendencias);
    }

    public function cadastroOleo() {

      $title = 'Preditiva | Análise de Óleo';
      $pendencias = DB::table('amostras_oleo')->orderby('id_amostra')->get();
      $countPendencias = $pendencias->count()-1;
      $tecnica = "4";
      $status = Preditiva_status::all()->where('id', '<', 6);
      $diagnosticos = Diagnosticos::all()->where('tecnica_id', '=', 4);

      return view('csn.technician.oleoCadastroAnalise')
                  ->with('title', $title)
                  ->with('pendencias', $pendencias)
                  ->with('countPendencias', $countPendencias)
                  ->with('tecnica', $tecnica)
                  ->with('status', $status)
                  ->with('diagnosticos', $diagnosticos);
    }

    public function addOleoImagem(Request $request) {

        $oleo = "4";
        $image = Request::file('imagemOleo');
        $analise_id = DB::table('preditiva_analises')->max('id');



        $fileMathison  = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('imagens_oleo\\'.$fileMathison);
        Image::make($image)->save($location);

        //Realiza a inserção dos dados referentes ao laudo no banco de dados
        DB::insert('insert into laudos (analise_id, image_laudo) values (?,?)', array($analise_id, $location));

        //Recupera o id do ultimo laudo cadastrado no banco
        $laudo = DB::table('laudos')->max('id');

        $campo1 = "";
        $campo2 = "";
        $campo3 = "";
        $campo5 = "";
        $campo6 = "";

        //Realiza a inserção dos dados referentes as amostras no banco de dados
        DB::insert('insert into amostras (tecnicas_id, campo1, campo2, campo3, campo5, campo6, laudo_id, analise_id)
            values (?,?,?,?,?,?,?,?)', array($oleo, $campo1, $campo2, $campo3, $campo5, $campo6, $laudo, $analise_id));

        return view('csn.technician.index');
    }
    /**
    * Get Ajax Request and restun Data
    *
    * @return \Illuminate\Http\Response
    */
    public function myformAjax($id) {
      $sistemas = DB::table("sistemas")
                ->where("negocio_id",$id)
                ->pluck("name_sistema","id");
      return json_encode($sistemas);
    }

    /**
    * Get Ajax Request and restun name ativos from Ativos
    *
    * @return \Illuminate\Http\Response
    */
    public function myformAtivosAjax($id) {
      $ativos = DB::table("ativos")
                ->where("sistema_id",$id)
                ->pluck("name_ativo","id");
      return json_encode($ativos);
    }

    /**
    * Get Ajax Request and restun Tag from Preditiva_atividades
    *
    * @return \Illuminate\Http\Response
    */
    public function myformAtividadesAjax($id) {
      $atividades = DB::table("preditiva_atividades")
                ->where("ativo_id",$id)
                ->where('tag_ativ', 'like', 'L%')
                ->pluck("tag_ativ","id");
      return json_encode($atividades);
    }

}

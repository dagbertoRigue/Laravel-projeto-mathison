<?php

namespace App\Http\Controllers\Csn;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use DB;
use App\Models\Negocios;
use App\Models\Status;
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


class ConfiguracoesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

      $negocios = DB::table("negocios")->where('parent_id', '>', 1)->pluck("name_negocio","id");
      $sistemas = DB::table("sistemas")->pluck("name_sistema","id");
      $ativos = DB::table("ativos")->pluck("name_ativo","id");
      $atividades = DB::table("preditiva_atividades")->pluck("tag_ativ","id");

      return view('csn.technician.configuracoes')
        ->with('negocios', $negocios)
        ->with('sistemas', $sistemas)
        ->with('ativos', $ativos)
        ->with('preditiva_atividades', $atividades);
    }

        /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id) {
        $sistemas = DB::table("sistemas")
                    ->where("negocio_id",$id)
                    ->orderBy("name_sistema")
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $tag = strtoupper(Request::input('tag'));
        $tag_equal = DB::table('Preditiva_atividades')->where('tag_ativ', '=', $tag)->value('id');

        if ($tag_equal == null || $tag_equal == "") {
          $description = Request::input('description');
          $ativo_id = Request::input('ativo');
          $slug = ' ';
          $imagem = 'default.png';
          $periodicidade = Request::input('periodicidade');
          $tecnica = Request::input('tecnica_id');

          $ativ_id_atual = DB::table('Preditiva_atividades')->max('id');
          $ativ_id = $ativ_id_atual+1;

          $image_file = Request::file('imageNew');
          if($image_file == null) {
            DB::insert('insert into Preditiva_atividades (id,tag_ativ, description_ativ, ativo_id, slug, image_ativ, periodicity, tecnicas_id)
                values (?,?,?,?,?,?,?,?)', array($ativ_id, $tag, $description, $ativo_id, $slug, $imagem, $periodicidade, $tecnica));
          } else {
            switch ($tecnica) {
              case '1':
                $frac_location = 'img\atividades\termografia\\';
                break;
              case '2':
                $frac_location = 'img\atividades\termo_isolamento\\';
                break;
              case '3':
                $frac_location = 'img\atividades\vibracao\\';
                break;
              case '4':
                $frac_location = 'img\atividades\oleo\\';
                break;
              case '5':
                $frac_location = 'img\atividades\resistencia\\';
                break;
              default:
                $frac_location = 'img\atividades\\';
                break;
            }

            $location = $frac_location.$tag.'.png';
            Image::make($image_file)->save($location);
            DB::insert('insert into Preditiva_atividades (id, tag_ativ, description_ativ, ativo_id, slug, image_ativ, periodicity, tecnicas_id)
                values (?,?,?,?,?,?,?,?)', array($ativ_id, $tag, $description, $ativo_id, $slug, $location, $periodicidade, $tecnica));
          }
          return redirect()->action('Csn\ConfiguracoesController@index')->with('alert', 'Inserido com Sucesso!');
        } else {
          return redirect()->back()->with('alert2', 'TAG já existe!');
        }

    }

    // ======================== TERMOGRAFIA ELÉTRICA ========================== //
    public function configEditarTerm() {
      $negocios = DB::table("negocios")->where('parent_id', '>', 1)->pluck("name_negocio","id");
      $atividades = DB::table("preditiva_atividades")->pluck("tag_ativ","id");
      $tableAtividades = Preditiva_atividades::all()->where('tecnicas_id', '=', 1);

      return view('csn.technician.configuracoesEditarTerm')
        ->with('negocios', $negocios)
        ->with('atividades', $atividades)
        ->with('tableAtividades', $tableAtividades);
    }

    public function myformAtividadesAjaxTerm($id) {
      $atividades = DB::table("negocios")
                        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                        ->where("preditiva_atividades.tecnicas_id", "=", 1)
                        ->where("negocios.id", "=", $id)
                        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id");

      return json_encode($atividades);
    }

    public function myformAtividadesAjaxTermZero($id)
    {
      $atividades0 = DB::table("negocios")
        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
        ->where("preditiva_atividades.tecnicas_id", "=", 1)
        ->where("negocios.id", "=", $id)
        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id",
                "preditiva_atividades.description_ativ", "ativos.name_ativo",
                "preditiva_atividades.image_ativ");

      return json_encode($atividades0);
    }


    public function configEditarTerm2()
    {
            $atividades = Request::input('atividades');
            $tag = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('tag_ativ');
            $descricao = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('description_ativ');
            $imagem = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('image_ativ');
            $periodicidade = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('periodicity');

            return view('csn.technician.configuracoesEditarTerm2')
              ->with('atividades', $atividades)
              ->with('tag', $tag)
              ->with('descricao', $descricao)
              ->with('imagem', $imagem)
              ->with('periodicidade', $periodicidade);
    }


    public function storeEditarTerm(Request $request) {

      $tag = strtoupper(Request::input('tag'));
      $atividade_id = Request::input('atividade_id');
      $tag_ativ_atual = DB::table('Preditiva_atividades')->where('id', '=', $atividade_id)->value('tag_ativ');

      if ($tag_ativ_atual == $tag) {
        $descricao = Request::input('descricao');
        $periodicidade = Request::input('periodicidade');
        $image_file = Request::file('imagemTerm');
        if($image_file == null) {
          DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                    array($tag, $descricao, $periodicidade, $atividade_id));
        } else {
          $location = 'img\atividades\termografia\\'.$tag.'.png';
          Image::make($image_file)->save($location);

          DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                    array($tag, $descricao, $location, $periodicidade, $atividade_id));
        }
        return redirect()->Route('configEditarTerm.dashboard')->with('alert', 'Alterado com Sucesso!');

      }else {
        $tag_equal = DB::table('Preditiva_atividades')->where('tag_ativ', '=', $tag)->value('id');
        if ($tag_equal == null || $tag_equal == "") {
          //dd('TAG NÃO EXISTE');
          $tag = strtoupper(Request::input('tag'));
          $descricao = Request::input('descricao');
          $periodicidade = Request::input('periodicidade');
          $image_file = Request::file('imagemTerm');
          if($image_file == null) {
            //dd('TAG NÃO EXISTE E IMAGEM NULL');
            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $periodicidade, $atividade_id));
          } else {
            //dd('TAG NÃO EXISTE E IMAGEM NÃO NULL');
            $location = 'img\atividades\termografia\\'.$tag.'.png';
            Image::make($image_file)->save($location);

            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $location, $periodicidade, $atividade_id));
          }
          return redirect()->Route('configEditarTerm.dashboard')->with('alert', 'Alterado com Sucesso!');
        } else {
          return redirect()->back()->with('alert2', 'TAG já existe!');
        }
      }
    }


    // ======================== VIBRACAO ========================== //
    public function configEditarVib() {

      $negocios = DB::table("negocios")->where('parent_id', '>', 1)->pluck("name_negocio","id");
      $atividades = DB::table("preditiva_atividades")->pluck("tag_ativ","id");
      $tableAtividades = Preditiva_atividades::all()->where('tecnicas_id', '=', 3);

      return view('csn.technician.configuracoesEditarVib')
        ->with('negocios', $negocios)
        ->with('atividades', $atividades)
        ->with('tableAtividades', $tableAtividades);
    }

    /**
     * Get Ajax Request and restun Tag from Preditiva_atividades
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAtividadesAjaxVib($id) {

      $atividades = DB::table("negocios")
                        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                        ->where("preditiva_atividades.tecnicas_id", "=", 3)
                        ->where("negocios.id", "=", $id)
                        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id");

      return json_encode($atividades);
    }


    /**
     * Get Ajax Request and restun Tag from Preditiva_atividades
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAtividadesAjaxVibZero($id) {

      $atividades0 = DB::table("negocios")
        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
        ->where("preditiva_atividades.tecnicas_id", "=", 3)
        ->where("negocios.id", "=", $id)
        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id",
                "preditiva_atividades.description_ativ", "ativos.name_ativo",
                "preditiva_atividades.image_ativ");

      return json_encode($atividades0);
    }

    public function configEditarVib2() {

      $atividades = Request::input('atividades');
      $tag = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('tag_ativ');
      $descricao = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('description_ativ');
      $imagem = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('image_ativ');
      $periodicidade = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('periodicity');

      return view('csn.technician.configuracoesEditarVib2')
        ->with('atividades', $atividades)
        ->with('tag', $tag)
        ->with('descricao', $descricao)
        ->with('imagem', $imagem)
        ->with('periodicidade', $periodicidade);
    }

    public function storeEditarVib(Request $request) {

      $tag = strtoupper(Request::input('tag'));
      $atividade_id = Request::input('atividade_id');
      $tag_ativ_atual = DB::table('Preditiva_atividades')->where('id', '=', $atividade_id)->value('tag_ativ');

      if ($tag_ativ_atual == $tag) {
        $descricao = Request::input('descricao');
        $periodicidade = Request::input('periodicidade');
        $image_file = Request::file('imagemVib');
        if($image_file == null) {
          DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                    array($tag, $descricao, $periodicidade, $atividade_id));
        } else {
          $location = 'img\atividades\vibracao\\'.$tag.'.png';
          Image::make($image_file)->save($location);

          DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                    array($tag, $descricao, $location, $periodicidade, $atividade_id));
        }
        return redirect()->Route('configEditarVib.dashboard')->with('alert', 'Alterado com Sucesso!');

      }else {
        $tag_equal = DB::table('Preditiva_atividades')->where('tag_ativ', '=', $tag)->value('id');
        if ($tag_equal == null || $tag_equal == "") {
          //dd('TAG NÃO EXISTE');
          $tag = strtoupper(Request::input('tag'));
          $descricao = Request::input('descricao');
          $periodicidade = Request::input('periodicidade');
          $image_file = Request::file('imagemVib');
          if($image_file == null) {
            //dd('TAG NÃO EXISTE E IMAGEM NULL');
            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $periodicidade, $atividade_id));
          } else {
            //dd('TAG NÃO EXISTE E IMAGEM NÃO NULL');
            $location = 'img\atividades\vibracao\\'.$tag.'.png';
            Image::make($image_file)->save($location);

            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $location, $periodicidade, $atividade_id));
          }
          return redirect()->Route('configEditarVib.dashboard')->with('alert', 'Alterado com Sucesso!');
        } else {
          return redirect()->back()->with('alert2', 'TAG já existe!');
        }
      }
    }

    // ============================ RESISTENCIA ============================== //

    public function configEditarResist() {

      $negocios = DB::table("negocios")->where('parent_id', '>', 1)->pluck("name_negocio","id");
      $atividades = DB::table("preditiva_atividades")->pluck("tag_ativ","id");
      $tableAtividades = Preditiva_atividades::all()->where('tecnicas_id', '=', 5);

      return view('csn.technician.configuracoesEditarResist')
        ->with('negocios', $negocios)
        ->with('atividades', $atividades)
        ->with('tableAtividades', $tableAtividades);
    }
    /**
     * Get Ajax Request and restun Tag from Preditiva_atividades
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAtividadesAjaxResist($id) {

      $atividades = DB::table("negocios")
                        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                        ->where("preditiva_atividades.tecnicas_id", "=", 5)
                        ->where("negocios.id", "=", $id)
                        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id");

      return json_encode($atividades);
    }
    /**
     * Get Ajax Request and restun Tag from Preditiva_atividades
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAtividadesAjaxResistZero($id) {

      $atividades0 = DB::table("negocios")
        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
        ->where("preditiva_atividades.tecnicas_id", "=", 5)
        ->where("negocios.id", "=", $id)
        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id",
                "preditiva_atividades.description_ativ", "ativos.name_ativo",
                "preditiva_atividades.image_ativ");

      return json_encode($atividades0);
    }

    public function configEditarResist2() {

      $atividades = Request::input('atividades');
      $tag = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('tag_ativ');
      $descricao = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('description_ativ');
      $imagem = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('image_ativ');
      $periodicidade = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('periodicity');

      return view('csn.technician.configuracoesEditarResist2')
        ->with('atividades', $atividades)
        ->with('tag', $tag)
        ->with('descricao', $descricao)
        ->with('imagem', $imagem)
        ->with('periodicidade', $periodicidade);
    }

    public function storeEditarResist(Request $request) {

      $tag = strtoupper(Request::input('tag'));
      $atividade_id = Request::input('atividade_id');
      $tag_ativ_atual = DB::table('Preditiva_atividades')->where('id', '=', $atividade_id)->value('tag_ativ');

      if ($tag_ativ_atual == $tag) {
        $descricao = Request::input('descricao');
        $periodicidade = Request::input('periodicidade');
        $image_file = Request::file('imagemRM');
        if($image_file == null) {
          DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                    array($tag, $descricao, $periodicidade, $atividade_id));
        } else {
          $location = 'img\atividades\resistencia\\'.$tag.'.png';
          Image::make($image_file)->save($location);

          DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                    array($tag, $descricao, $location, $periodicidade, $atividade_id));
        }
        return redirect()->Route('configEditarResist.dashboard')->with('alert', 'Alterado com Sucesso!');

      }else {
        $tag_equal = DB::table('Preditiva_atividades')->where('tag_ativ', '=', $tag)->value('id');
        if ($tag_equal == null || $tag_equal == "") {
          $tag = strtoupper(Request::input('tag'));
          $descricao = Request::input('descricao');
          $periodicidade = Request::input('periodicidade');
          $image_file = Request::file('imagemRM');
          if($image_file == null) {
            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $periodicidade, $atividade_id));
          } else {
            $location = 'img\atividades\resistencia\\'.$tag.'.png';
            Image::make($image_file)->save($location);

            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $location, $periodicidade, $atividade_id));
          }
          return redirect()->Route('configEditarResist.dashboard')->with('alert', 'Alterado com Sucesso!');
        } else {
          return redirect()->back()->with('alert2', 'TAG já existe!');
        }
      }
    }

    // ============================ Termografia Isolamento (Refratários) ============================== //

    public function configEditarTR() {

      $negocios = DB::table("negocios")
                        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                        ->where("preditiva_atividades.tecnicas_id", "=", 2)
                        ->pluck("negocios.name_negocio","negocios.id");
      $atividades = DB::table("preditiva_atividades")->pluck("tag_ativ","id");
      $tableAtividades = Preditiva_atividades::all()->where('tecnicas_id', '=', 2);

      return view('csn.technician.configuracoesEditarTR')
        ->with('negocios', $negocios)
        ->with('atividades', $atividades)
        ->with('tableAtividades', $tableAtividades);
    }
    /**
     * Get Ajax Request and restun Tag from Preditiva_atividades
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAtividadesAjaxTR($id) {

      $atividades = DB::table("negocios")
                        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
                        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
                        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
                        ->where("preditiva_atividades.tecnicas_id", "=", 2)
                        ->where("negocios.id", "=", $id)
                        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id");

      return json_encode($atividades);
    }
    /**
     * Get Ajax Request and restun Tag from Preditiva_atividades
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAtividadesAjaxTRZero($id) {

      $atividades0 = DB::table("negocios")
        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
        ->where("preditiva_atividades.tecnicas_id", "=", 2)
        ->where("negocios.id", "=", $id)
        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id",
                "preditiva_atividades.description_ativ", "ativos.name_ativo",
                "preditiva_atividades.image_ativ");

      return json_encode($atividades0);
    }

    public function configEditarTR2() {

      $atividades = Request::input('atividades');
      $tag = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('tag_ativ');
      $descricao = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('description_ativ');
      $imagem = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('image_ativ');
      $periodicidade = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('periodicity');

      return view('csn.technician.configuracoesEditarTR2')
        ->with('atividades', $atividades)
        ->with('tag', $tag)
        ->with('descricao', $descricao)
        ->with('imagem', $imagem)
        ->with('periodicidade', $periodicidade);
    }

    public function storeEditarTR(Request $request) {

        $tag = strtoupper(Request::input('tag'));
        $atividade_id = Request::input('atividade_id');
        $tag_ativ_atual = DB::table('Preditiva_atividades')->where('id', '=', $atividade_id)->value('tag_ativ');

        if ($tag_ativ_atual == $tag) {
          $descricao = Request::input('descricao');
          $periodicidade = Request::input('periodicidade');
          $image_file = Request::file('imagemTR');
          if($image_file == null) {
            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $periodicidade, $atividade_id));
          } else {
            $location = 'img\atividades\termo_isolamento\\'.$tag.'.png';
            Image::make($image_file)->save($location);

            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $location, $periodicidade, $atividade_id));
          }
          return redirect()->Route('configEditarTR.dashboard')->with('alert', 'Alterado com Sucesso!');

        }else {
          $tag_equal = DB::table('Preditiva_atividades')->where('tag_ativ', '=', $tag)->value('id');
          if ($tag_equal == null || $tag_equal == "") {
            $tag = strtoupper(Request::input('tag'));
            $descricao = Request::input('descricao');
            $periodicidade = Request::input('periodicidade');
            $image_file = Request::file('imagemTR');
            if($image_file == null) {
              DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                        array($tag, $descricao, $periodicidade, $atividade_id));
            } else {
              $location = 'img\atividades\termo_isolamento\\'.$tag.'.png';
              Image::make($image_file)->save($location);

              DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                        array($tag, $descricao, $location, $periodicidade, $atividade_id));
            }
            return redirect()->Route('configEditarTR.dashboard')->with('alert', 'Alterado com Sucesso!');
          } else { // ================================= SE EXISTIR...
            return redirect()->back()->with('alert2', 'TAG já existe!');
          }
        }
    }

    // ============================ Análise de Óleo ============================== //
    public function configEditarOleo()
    {
      $negocios = DB::table("negocios")->where('parent_id', '>', 1)->pluck("name_negocio","id");
      $atividades = DB::table("preditiva_atividades")->pluck("tag_ativ","id");
      $tableAtividades = Preditiva_atividades::all()->where('tecnicas_id', '=', 4);

      return view('csn.technician.configuracoesEditarLB')
        ->with('negocios', $negocios)
        ->with('atividades', $atividades)
        ->with('tableAtividades', $tableAtividades);
    }

    public function myformAtividadesAjaxOleo($id)
    {

      $atividades0 = DB::table("negocios")
        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
        ->where("preditiva_atividades.tecnicas_id", "=", 4)
        ->where("negocios.id", "=", $id)
        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id",
                "preditiva_atividades.description_ativ", "ativos.name_ativo",
                "preditiva_atividades.image_ativ");

      return json_encode($atividades0);
    }


    public function storeEditarOleo(Request $request) {

      $tag = strtoupper(Request::input('tag'));
      $atividade_id = Request::input('atividade_id');
      $tag_ativ_atual = DB::table('Preditiva_atividades')->where('id', '=', $atividade_id)->value('tag_ativ');

      if ($tag_ativ_atual == $tag) {
        $descricao = Request::input('descricao');
        $periodicidade = Request::input('periodicidade');
        $image_file = Request::file('imagemVib');
        if($image_file == null) {
          DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                    array($tag, $descricao, $periodicidade, $atividade_id));
        } else {
          $location = 'img\atividades\vibracao\\'.$tag.'.png';
          Image::make($image_file)->save($location);

          DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                    array($tag, $descricao, $location, $periodicidade, $atividade_id));
        }
        return redirect()->Route('configEditarVib.dashboard')->with('alert', 'Alterado com Sucesso!');

      }else {
        $tag_equal = DB::table('Preditiva_atividades')->where('tag_ativ', '=', $tag)->value('id');
        if ($tag_equal == null || $tag_equal == "") {
          //dd('TAG NÃO EXISTE');
          $tag = strtoupper(Request::input('tag'));
          $descricao = Request::input('descricao');
          $periodicidade = Request::input('periodicidade');
          $image_file = Request::file('imagemLB');
          if($image_file == null) {
            //dd('TAG NÃO EXISTE E IMAGEM NULL');
            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $periodicidade, $atividade_id));
          } else {
            //dd('TAG NÃO EXISTE E IMAGEM NÃO NULL');
            $location = 'img\atividades\vibracao\\'.$tag.'.png';
            Image::make($image_file)->save($location);

            DB::update('update preditiva_atividades set tag_ativ = ?, description_ativ = ?, image_ativ = ?, periodicity = ? where id = ?',
                      array($tag, $descricao, $location, $periodicidade, $atividade_id));
          }
          return redirect()->Route('configEditarVib.dashboard')->with('alert', 'Alterado com Sucesso!');
        } else {
          return redirect()->back()->with('alert2', 'TAG já existe!');
        }
      }
    }


    public function configEditarOleo2()
    {
            $atividades = Request::input('atividades');
            $tag = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('tag_ativ');
            $descricao = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('description_ativ');
            $imagem = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('image_ativ');
            $periodicidade = DB::table('preditiva_atividades')->where('id', '=', $atividades)->value('periodicity');

            return view('csn.technician.configuracoesEditarLB2')
              ->with('atividades', $atividades)
              ->with('tag', $tag)
              ->with('descricao', $descricao)
              ->with('imagem', $imagem)
              ->with('periodicidade', $periodicidade);
    }


    /**
     * Get Ajax Request and restun Tag from Preditiva_atividades
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAtividadesAjaxOleoZero($id) {

      $atividades0 = DB::table("negocios")
        ->join("sistemas", "sistemas.negocio_id", "=", "negocios.id")
        ->join("ativos", "ativos.sistema_id", "=", "sistemas.id")
        ->join("preditiva_atividades", "preditiva_atividades.ativo_id", "=", "ativos.id")
        ->where("preditiva_atividades.tecnicas_id", "=", 4)
        ->where("negocios.id", "=", $id)
        ->pluck("preditiva_atividades.tag_ativ", "preditiva_atividades.id",
                "preditiva_atividades.description_ativ", "ativos.name_ativo",
                "preditiva_atividades.image_ativ");

      return json_encode($atividades0);
    }

    // ====================VERIFICAR UTILIDADE ========================== //

    public function editarAtividadeVib($id) {
        $atividade_id = $id;

        return view('csn.technician.editarAtividade')->with('value', $atividade_id);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}

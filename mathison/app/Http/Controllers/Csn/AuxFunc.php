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

class AuxFunc {
  //===================== FUNÇÕES AUXILIARES DIVERSAS ==========================
    public static function FormatDateMonth($month) {

      $monthformat = Carbon::now()->subMonths($month)->format('M');
      switch ($monthformat) {
        case 'Jan':
          return $monthformat;
          break;
        case 'Feb':
          return 'Fev';
          break;
        case 'Mar':
          return $monthformat;
          break;
        case 'Apr':
          return 'Abr';
          break;
        case 'May':
          return 'Mai';
          break;
        case 'Jun':
          return $monthformat;
          break;
        case 'Jul':
          return $monthformat;
          break;
        case 'Aug':
          return 'Ago';
          break;
        case 'Sep':
          return 'Set';
          break;
        case 'Oct':
          return 'Out';
          break;
        case 'Nov':
          return $monthformat;
          break;
        case 'Dec':
          return 'Dez';
          break;

        default:
          return $monthformat;
          break;
      }
    }

    public static function FormatPercents($geralPorLinha, $sum) {

      if($geralPorLinha == null){$geralPorLinha = 0;}
      if($sum == 0) {
        $geralPorLinha_format = 0;
      } else {
        $geralPorLinha_format = ($geralPorLinha / $sum)*100;
      }
      $geralPorLinha = number_format($geralPorLinha_format,2,".",",");

      return $geralPorLinha;
    }

//===================== FUNÇÕES AUXILIARES PARA ANÁLISE DE VIBRAÇÃO ==========================
    public static function GeralAnormalidadesVib($data) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 3);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
        return $call;
    }

    public static function GeralPorLinhaVib($data, $status, $linha1, $linha2) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 3);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }

      $porStatus = $call->where('status_id', '=', $status)->pluck('atividade_id');

      $porLinha1 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porStatus)
                             ->where('negocios.id','=', $linha1)->count('tag_ativ');
       $porLinha2 = DB::table('preditiva_atividades')
                              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                              ->whereIn('preditiva_atividades.id', $porStatus)
                              ->where('negocios.id','=', $linha2)->count('tag_ativ');

      $porLinha = $porLinha1+$porLinha2;
      return $porLinha;
    }
    //especial para uti e cs, por exemplo
    public static function GeralPorLinha2Vib($data, $status, $parent) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 3);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }

      $porStatus = $call->where('status_id', '=', $status)->pluck('atividade_id');

      $porLinha2 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porStatus)
                             ->where('negocios.parent_id','=', $parent)->count('tag_ativ');

      return $porLinha2;
    }

    public static function GeralPorLinhaEDiagVib($data, $diag, $linha1, $linha2) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 3);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
      $porDiag = $call->where('diagnostico_id', '=', $diag)->pluck('atividade_id');
      $porLinha1 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porDiag)
                             ->where('negocios.id','=', $linha1)->count('tag_ativ');
       $porLinha2 = DB::table('preditiva_atividades')
                              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                              ->whereIn('preditiva_atividades.id', $porDiag)
                              ->where('negocios.id','=', $linha2)->count('tag_ativ');

      $porLinha = $porLinha1+$porLinha2;
      return $porLinha;
    }

    public static function GeralPorLinhaEDiag2Vib($data, $diag, $parent) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 3);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
      $porDiag = $call->where('diagnostico_id', '=', $diag)->pluck('atividade_id');
      $porLinha = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porDiag)
                             ->where('negocios.parent_id','=', $parent)->count('tag_ativ');

      return $porLinha;
    }

//===================== FUNÇÕES AUXILIARES PARA TERMOGRAFIA ELÉTRICA ==========================
    public static function GeralAnormalidadesTE($data) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 1);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
        return $call;
    }

    public static function GeralPorLinhaTE($data, $status, $linha1, $linha2) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 1);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }

      $porStatus = $call->where('status_id', '=', $status)->pluck('atividade_id');

      $porLinha1 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porStatus)
                             ->where('negocios.id','=', $linha1)->count('tag_ativ');
       $porLinha2 = DB::table('preditiva_atividades')
                              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                              ->whereIn('preditiva_atividades.id', $porStatus)
                              ->where('negocios.id','=', $linha2)->count('tag_ativ');

      $porLinha = $porLinha1+$porLinha2;
      return $porLinha;
    }
    //especial para uti e cs, por exemplo
    public static function GeralPorLinha2TE($data, $status, $parent) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 1);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }

      $porStatus = $call->where('status_id', '=', $status)->pluck('atividade_id');

      $porLinha2 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porStatus)
                             ->where('negocios.parent_id','=', $parent)->count('tag_ativ');

      return $porLinha2;
    }

    public static function GeralPorLinhaEDiagTE($data, $diag, $linha1, $linha2) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 1);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
      $porDiag = $call->where('diagnostico_id', '=', $diag)->pluck('atividade_id');
      $porLinha1 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porDiag)
                             ->where('negocios.id','=', $linha1)->count('tag_ativ');
       $porLinha2 = DB::table('preditiva_atividades')
                              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                              ->whereIn('preditiva_atividades.id', $porDiag)
                              ->where('negocios.id','=', $linha2)->count('tag_ativ');

      $porLinha = $porLinha1+$porLinha2;
      return $porLinha;
    }

    public static function GeralPorLinhaEDiag2TE($data, $diag, $parent) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 1);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
      $porDiag = $call->where('diagnostico_id', '=', $diag)->pluck('atividade_id');
      $porLinha = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porDiag)
                             ->where('negocios.parent_id','=', $parent)->count('tag_ativ');

      return $porLinha;
    }

    //===================== FUNÇÕES AUXILIARES PARA TERMOGRAFIA ISOLAMENTOS ==========================
    public static function GeralPorLinhaTR($data, $status, $linha1, $linha2) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 2);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }

      $porStatus = $call->where('status_id', '=', $status)->pluck('atividade_id');

      $porLinha1 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porStatus)
                             ->where('negocios.id','=', $linha1)->count('tag_ativ');
       $porLinha2 = DB::table('preditiva_atividades')
                              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                              ->whereIn('preditiva_atividades.id', $porStatus)
                              ->where('negocios.id','=', $linha2)->count('tag_ativ');

      $porLinha = $porLinha1+$porLinha2;
      return $porLinha;
    }
    public static function GeralAnormalidadesTR($data) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 2);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
        return $call;
    }
    //especial para uti e cs, por exemplo
    public static function GeralPorLinha2TR($data, $status, $parent) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 2);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }

      $porStatus = $call->where('status_id', '=', $status)->pluck('atividade_id');

      $porLinha2 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porStatus)
                             ->where('negocios.parent_id','=', $parent)->count('tag_ativ');

      return $porLinha2;
    }

    public static function GeralPorSistemaTR($id_sist) {

      $porSistema = DB::table('amostras')
                        ->join('preditiva_analises', 'preditiva_analises.id', '=', 'amostras.analise_id')
                        ->join('preditiva_atividades', 'preditiva_atividades.id', '=', 'preditiva_analises.atividade_id')
                        ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                        ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                        ->where('preditiva_analises.tecnicas_id', '=', 2)
                        ->where('ativos.sistema_id', '=', $id_sist)
                        ->orderBy('preditiva_analises.atividade_id');

      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porSistema as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
      }

      return $call;

    }
    //===================== FUNÇÕES AUXILIARES PARA RESISTÊNCIA DOS MOTORES ==========================

    public static function GeralAnormalidadesRM($data) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 5);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
        return $call;
    }

    public static function GeralPorLinhaRM($data, $status, $linha1, $linha2) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 5);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }

      $porStatus = $call->where('status_id', '=', $status)->pluck('atividade_id');

      $porLinha1 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porStatus)
                             ->where('negocios.id','=', $linha1)->count('tag_ativ');
       $porLinha2 = DB::table('preditiva_atividades')
                              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                              ->whereIn('preditiva_atividades.id', $porStatus)
                              ->where('negocios.id','=', $linha2)->count('tag_ativ');

      $porLinha = $porLinha1+$porLinha2;
      return $porLinha;
    }
    //especial para uti e cs, por exemplo
    public static function GeralPorLinha2RM($data, $status, $parent) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 5);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }

      $porStatus = $call->where('status_id', '=', $status)->pluck('atividade_id');

      $porLinha2 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porStatus)
                             ->where('negocios.parent_id','=', $parent)->count('tag_ativ');

      return $porLinha2;
    }


    public static function GeralPorLinhaEDiagRM($data, $diag, $linha1, $linha2) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 5);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
      $porDiag = $call->where('diagnostico_id', '=', $diag)->pluck('atividade_id');
      $porLinha1 = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porDiag)
                             ->where('negocios.id','=', $linha1)->count('tag_ativ');
       $porLinha2 = DB::table('preditiva_atividades')
                              ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                              ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                              ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                              ->whereIn('preditiva_atividades.id', $porDiag)
                              ->where('negocios.id','=', $linha2)->count('tag_ativ');

      $porLinha = $porLinha1+$porLinha2;
      return $porLinha;
    }

    public static function GeralPorLinhaEDiag2RM($data, $diag, $parent) {

      $limite = Carbon::now()->subMonths(11)->format('Y-m-01');
      $tabelao = DB::table('preditiva_analises');
      $tecnica = $tabelao->where('tecnicas_id', '=', 5);
      $porData = $tecnica->whereBetween('date_analise', [$limite, $data])->get();
      $porDataSort = $porData->sortBy('atividade_id');
      $porDataCount = $porDataSort->count()-1;
      $call = new Collection();
      $i = 0;
      $n = 0;
      $flag = true;

      foreach ($porDataSort as $value) {
        if ($flag) {
          $id_aux = $value->id;
          $data_aux = $value->date_analise;
          $ativ_id_aux = $value->atividade_id;
          $call->push($value);
          $flag = false;
        }
        if ($ativ_id_aux == $value->atividade_id) {
          if ($data_aux < $value->date_analise || $data_aux == $value->date_analise) {
            if($id_aux < $value->id) {
              $id_aux = $value->id;
              $data_aux = $value->date_analise;
              $ativ_id_aux = $value->atividade_id;
              $call[$n] = $value;
            }
          }
        } else {
            $id_aux = $value->id;
            $data_aux = $value->date_analise;
            $ativ_id_aux = $value->atividade_id;
            $call->push($value);
            $n = $n+1;
          }
        }
      $porDiag = $call->where('diagnostico_id', '=', $diag)->pluck('atividade_id');
      $porLinha = DB::table('preditiva_atividades')
                             ->join('ativos', 'ativos.id', '=', 'preditiva_atividades.ativo_id')
                             ->join('sistemas', 'sistemas.id', '=', 'ativos.sistema_id')
                             ->join('negocios', 'negocios.id', '=', 'sistemas.negocio_id')
                             ->whereIn('preditiva_atividades.id', $porDiag)
                             ->where('negocios.parent_id','=', $parent)->count('tag_ativ');

      return $porLinha;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preditiva_analises extends Model {

    protected $table = 'preditiva_analises';

    protected $fillabel = array('id', 'atividade_id', 'user_id', 'status_id', 'observation_analise',
                                'diagnostico_id', 'recommendation_analise', 'created_at', 'updated_at', 'tecnicas_id');

    protected  $atual  = [ ' date_analise ' ];

    protected $guarded = ['id'];

}

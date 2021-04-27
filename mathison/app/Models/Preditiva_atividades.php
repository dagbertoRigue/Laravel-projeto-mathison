<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preditiva_atividades extends Model {

    protected $table = 'Preditiva_atividades';

    public $timestemps = false;

    protected $fillabel = array('id', 'tag_ativ', 'description_ativ', 'ativo_id', 'slug', 'image_ativ', 'periodicity', 'tecnicas_id');

    protected $guarded = ['id'];
}

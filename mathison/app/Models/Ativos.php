<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ativos extends Model {

    protected $table = 'ativos';

    public $timestemps = false;

    protected $fillabel = array('id', 'name_ativo', 'tag_ativo', 'image_ativo', 'slug', 'sistema_id');

    protected $guarded = ['id'];
}

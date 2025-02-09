<?php

namespace App\\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model {

    protected $table = 'historico';

    public $timestemps = false;

    protected $fillabel = array('id', 'ultimoregistro', 'ultimoip');

    protected $guarded = [];
}

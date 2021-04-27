<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosticos extends Model {

     protected $table = 'preditiva_diagnosticos';

    public $timestemps = false;

    protected $fillabel = array('id', 'name_diag', 'modalidade_id');

    protected $guarded = ['id'];
}

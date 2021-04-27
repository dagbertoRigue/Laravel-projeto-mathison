<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preditiva_status extends Model {

    protected $table = 'preditiva_status';

    public $timestemps = false;

    protected $fillabel = array('id', 'name_status');

    protected $guarded = ['id'];

    public function Preditiva_analises() {

    	return $this->belongs_to('Preditiva_analises');
    }
}

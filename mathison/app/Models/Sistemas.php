<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sistemas extends Model {

    protected $table = 'sistemas';

    public $timestemps = false;

    protected $fillabel = array('id', 'name_sistema', 'negocio_id');

    protected $guarded = ['id'];

    public function negocios() {
    	return $this->belongs_to('Negocios');
    }
}

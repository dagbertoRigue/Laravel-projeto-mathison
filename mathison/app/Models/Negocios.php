<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negocios extends Model
{
    protected $table = 'negocios';

    public $timestemps = false;

    protected $fillabel = array('id', 'name_negocio', 'tag_negocio');

    protected $guarded = ['id'];

    public function sistemas()
    {
    	return $this->has_many('sistemas');
    }
}

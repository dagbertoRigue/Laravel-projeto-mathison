<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem_laudos extends Model {

    protected $table = 'imagem_laudos';

    protected $fillabel = array('id', 'location', 'laudo_id');

    protected $guarded = ['id'];
}

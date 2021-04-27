<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preditiva_amostras extends Model
{
    protected $table = 'amostras';

    public $timestemps = false;

    protected $fillabel = array('id',
            						        'tecnicas_id', 'campo1', 'campo2', 'campo3', 'campo5', 'campo6', 'campo7', 'campo8', 'campo9', 'campo10', 'campo11', 'campo12',
            						        'laudo_id', 'analise_id', 'created_at', 'updated_at', 'campo13', 'campo14', 'campo15', 'campo16', 'campo17', 'campo18',
                                'campo19', 'campo20', 'campo21', 'campo22' 'campo4',);

    protected $guarded = [];
}

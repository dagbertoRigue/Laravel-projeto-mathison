<?php

namespace App\\Models;

use Illuminate\Database\Eloquent\Model;

class Laudo extends Model {

    protected $table = 'laudos';

    public $timestemps = false;

    protected $fillabel = array('id', 'analise_id', 'created_at', 'updated_at');

    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnica extends Model {

    protected $table = 'tecnicas';

    public $timestemps = false;

    protected $fillabel = array('id', 'name_tecnica', 'users_id',);

    protected $guarded = [];
}

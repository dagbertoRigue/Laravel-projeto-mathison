<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PreditivaAmostras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $table->increments('id');
            $table->float('tempMax');
            $table->float('tempRef');
            $table->float('deltaT');
            $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }
}

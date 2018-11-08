<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_indices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_sub_indice');
            $table->string('descripcion');
            $table->integer('estado');
            $table->unsignedInteger('indice_id');
            $table->foreign('indice_id')->references('id')->on('indices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_indices');
    }
}

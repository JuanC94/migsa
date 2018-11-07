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
            $table->increments('id_sub_indice');
            $table->string('nombre_sub_indice');
            $table->string('descripcion');
            $table->integer('estado');
            $table->unsignedInteger('id_indice');
            $table->timestamps();
            
            $table->foreign('id_indice')->references('id_indice')->on('indices');
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

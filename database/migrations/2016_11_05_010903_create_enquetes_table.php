<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquetes', function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->string('pergunta');
            $table->boolean('quantidade_respostas');
            $table->string('resposta1');
            $table->string('resposta2')->nullable();
            $table->string('resposta3')->nullable();
            $table->string('resposta4')->nullable();
            $table->string('resposta5')->nullable();
            $table->string('resposta6')->nullable();
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enquetes');
    }
}

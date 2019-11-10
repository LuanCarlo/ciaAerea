<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo')->nullable();
            $table->integer('classe')->nullable();
            $table->string('assento')->nullable();
            $table->string('portao')->nullable();
            $table->float('preco');
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('voo_id')->unsigned()->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('voo_id')->references('id')->on('voos');

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
        Schema::dropIfExists('passagem');
    }
}

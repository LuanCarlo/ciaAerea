<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicoVoo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos_voos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('local');
            $table->integer('servico_id')->unsigned();
            $table->integer('passagem_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servicos');
            $table->foreign('passagem_id')->references('id')->on('passagens');
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
        Schema::dropIfExists('servico_voo');
    }
}

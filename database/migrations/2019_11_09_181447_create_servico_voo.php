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
            $table->string('descricao');
            $table->integer('servico_id')->unsigned();
            $table->integer('passagem_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');;
            $table->foreign('passagem_id')->references('id')->on('passagens')->onDelete('cascade');;
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

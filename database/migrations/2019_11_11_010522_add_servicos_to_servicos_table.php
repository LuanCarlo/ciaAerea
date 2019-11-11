<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServicosToServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('servicos')->insert(
            array(
                'nome' => 'Bagagem',
                'descricao' => 'despacho de bagagem',
                'preco' => 70.0,
            )
        );

        DB::table('servicos')->insert(
            array(
                'nome' => 'Carga viva',
                'descricao' => 'Despacho de carga viva',
                'preco' => 100.0,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportadaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importada_usuarios', function (Blueprint $table) {
            $table->id();
            $table->char('tipoPessoa', 2);
            $table->integer('atrasoDividaDias')->nullable();
            $table->string('faixaAtrasoDividaAnos')->nullable();
            $table->string('faixaIdadeCliente')->nullable();
            $table->string('portifolio')->nullable();
            $table->string('estadoUF')->nullable();
            $table->string('regiaoDevedor')->nullable();
            $table->string('statusDivida')->nullable();
            $table->string('valorDivida')->nullable();
            $table->string('Processo')->nullable();
            $table->unsignedBigInteger('idEstadoUF')->nullable();

            $table->foreign('idEstadoUF')->references('id')->on('estado_uf');
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
        Schema::dropIfExists('importada_usuarios');
    }
}

<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoUfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_uf', function (Blueprint $table) {
            $table->id();
            $table->string('sigla', 2)->unique();
            $table->string('nome', 255);
        });

        // Insira as siglas dos estados do Brasil após criar a tabela
        DB::table('estado_uf')->insert([
            ['sigla' => 'AC', 'nome' => 'Acre'],
                ['sigla' => 'AL', 'nome' => 'Alagoas'],
                ['sigla' => 'AP', 'nome' => 'Amapá'],
                ['sigla' => 'AM', 'nome' => 'Amazonas'],
                ['sigla' => 'BA', 'nome' => 'Bahia'],
                ['sigla' => 'CE', 'nome' => 'Ceará'],
                ['sigla' => 'DF', 'nome' => 'Distrito Federal'],
                ['sigla' => 'ES', 'nome' => 'Espírito Santo'],
                ['sigla' => 'GO', 'nome' => 'Goiás'],
                ['sigla' => 'MA', 'nome' => 'Maranhão'],
                ['sigla' => 'MT', 'nome' => 'Mato Grosso'],
                ['sigla' => 'MS', 'nome' => 'Mato Grosso do Sul'],
                ['sigla' => 'MG', 'nome' => 'Minas Gerais'],
                ['sigla' => 'PA', 'nome' => 'Pará'],
                ['sigla' => 'PB', 'nome' => 'Paraíba'],
                ['sigla' => 'PR', 'nome' => 'Paraná'],
                ['sigla' => 'PE', 'nome' => 'Pernambuco'],
                ['sigla' => 'PI', 'nome' => 'Piauí'],
                ['sigla' => 'RJ', 'nome' => 'Rio de Janeiro'],
                ['sigla' => 'RN', 'nome' => 'Rio Grande do Norte'],
                ['sigla' => 'RS', 'nome' => 'Rio Grande do Sul'],
                ['sigla' => 'RO', 'nome' => 'Rondônia'],
                ['sigla' => 'RR', 'nome' => 'Roraima'],
                ['sigla' => 'SC', 'nome' => 'Santa Catarina'],
                ['sigla' => 'SP', 'nome' => 'São Paulo'],
                ['sigla' => 'SE', 'nome' => 'Sergipe'],
                ['sigla' => 'TO', 'nome' => 'Tocantins'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_uf');
    }
}

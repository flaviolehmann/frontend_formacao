<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filials', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome');
            $table->string('numero', 4);
            $table->string('rua', 100);
            $table->string('bairro', 100);
            $table->string('complemento', 200);
            $table->string('cidade', 100);
            $table->string('uf', 2);
            $table->string('cep', 8);
            $table->string('inscricao_estadual', 12);
            $table->string('cnpj', 18);

            $table->softDeletes();
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
        Schema::dropIfExists('filials');
    }
}

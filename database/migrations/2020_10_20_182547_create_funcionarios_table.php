<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome', 100);
            $table->date('data_aniversario');
            $table->string('sexo', 1);
            $table->string('cpf', 11);
            $table->integer('numero');
            $table->string('rua', 100);
            $table->string('bairro', 100);
            $table->string('complemento', 200);
            $table->string('cidade', 100);
            $table->string('uf', 2);
            $table->string('cep', 8);
            $table->double('salario', 10, 2);
            $table->boolean('status');
            $table->string('senha', 6);
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->foreignId('filial_id')->constrained('filials');

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
        Schema::dropIfExists('funcionarios');
    }
}

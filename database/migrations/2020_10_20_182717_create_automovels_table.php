<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovels', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome', 100);
            $table->bigInteger('ano');
            $table->string('cor', 100);
            $table->string('nr_chassi', 100);
            $table->foreignId('modelo_id')->constrained('modelos');
            $table->foreignId('categoria_id')->constrained('categorias');
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
        Schema::dropIfExists('automovels');
    }
}

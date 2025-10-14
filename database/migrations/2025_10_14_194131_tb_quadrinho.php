<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbquadrinho', function (Blueprint $table) {
            $table->id();
            $table->string('nomeQuadrinho');
            $table->string('caminhoImagemQuadrinho');
            $table->string('sinopseQuadrinho');
            $table->string('autorQuadrinho');
            $table->double('valorQuadrinho', 15, 2);
            $table->date('dataDeLancamentoQuadrinho');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbquadrinho');
    }
};

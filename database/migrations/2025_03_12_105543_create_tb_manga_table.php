<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbmanga', function (Blueprint $table) {
            $table->id(); // Cria a chave primária
            $table->string('nomeManga');
            $table->string('caminhoImagemManga');
            $table->string('sinopseManga');
            $table->string('autorManga');
            $table->double('valorManga',15,2);
            $table->date('dataDeLancamentoManga');
            $table->timestamps();
            $table->engine = 'InnoDB'; // Assegura que a tabela usa InnoDB
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_manga');
    }
};
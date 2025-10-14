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
        Schema::create('tbcategoria', function (Blueprint $table) {
            $table->id(); // Cria a chave primária
            $table->string('nomeCategoria');
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
        Schema::dropIfExists('tbcategoriaquadrinho'); // nome correto da tabela
        Schema::dropIfExists('tbcategoriamanga'); // nome correto da tabela
        Schema::dropIfExists('tbcategoria');
    }
};

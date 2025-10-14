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
        Schema::create('tbcategoriamanga', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('idcategoria');
            $table->foreign('idcategoria')->references('id')->on('tbcategoria')->onDelete('cascade');
            $table->unsignedBigInteger('idmanga'); 
            $table->foreign('idmanga')->references('id')->on('tbmanga')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB'; 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::dropIfExists('tbcategoriamanga'); // nome correto da tabela
    }
};
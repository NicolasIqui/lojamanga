<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbcategoriaquadrinho', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idquadrinho');
            $table->unsignedBigInteger('idcategoria');

            $table->foreign('idquadrinho')->references('id')->on('tbquadrinho')->onDelete('cascade');
            $table->foreign('idcategoria')->references('id')->on('tbcategoria')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbcategoriaquadrinho');
    }
};

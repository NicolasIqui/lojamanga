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
        Schema::create('tbfonecliente', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroFone');
            $table->unsignedBigInteger('idcliente'); 
            $table->foreign('idcliente')->references('id')->on('tbcliente')->onDelete('cascade');
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
        Schema::dropIfExists('tbfone_cliente');
    }
};

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
        Schema::create('tbpedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idcliente'); 
            $table->foreign('idcliente')->references('id')->on('tbcliente')->onDelete('cascade');
            $table->datetime('dataPedido');
            $table->string('statusPedido');
            $table->double('valortotal',15,2);
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
        Schema::dropIfExists('tbpedido');
    }
};

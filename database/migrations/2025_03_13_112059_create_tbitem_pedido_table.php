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
        Schema::create('tbitempedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPedido');
            $table->foreign('idPedido')->references('id')->on('tbPedido')->onDelete('cascade');
            $table->unsignedBigInteger('idManga');
            $table->foreign('idManga')->references('id')->on('tbManga')->onDelete('cascade');
            $table->integer('quantidade');
            $table->double('precoUnitario',15,2);
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
        Schema::dropIfExists('tbitem_pedido');
    }
};

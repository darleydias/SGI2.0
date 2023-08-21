<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimentacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quant')->nullable();
            $table->integer('id_produto')->unsigned();
            $table->timestamps();
            $table->foreign('id_produto')->references('id')->on('produto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacao');
    }
};

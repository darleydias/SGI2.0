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
        Schema::create('servico', function (Blueprint $table) {
           
           $table->increments('id');
           $table->integer('id_produto')->unsigned();
           $table->integer('id_setor')->unsigned();
           $table->integer('id_responsavel')->unsigned();
           $table->timestamp('dtInicio')->nullable();
           $table->timestamp('dtFim')->nullable();
           $table->integer('id_tipoServico')->unsigned();
           $table->softDeletes();
           $table->timestamps();

           $table->foreign('id_produto')->references('id')->on('produto');
           $table->foreign('id_tipoServico')->references('id')->on('tipo_servico');
           $table->foreign('id_setor')->references('id')->on('setor');
           $table->foreign('id_responsavel')->references('id')->on('pessoa');
           
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servico');
    }
};

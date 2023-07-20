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
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('CNPJ');
            $table->string('cel');
            $table->string('email');
            $table->string('contato');
            $table->string('insEst');
            $table->string('insMun');
            $table->integer('seguimento_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('seguimento_id')->references('id')->on('seguimento');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};

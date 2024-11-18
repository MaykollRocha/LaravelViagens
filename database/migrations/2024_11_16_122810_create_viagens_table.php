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
        Schema::create('viagens', function (Blueprint $table) {
            $table->id();
            $table->string('renavam');
            $table->string('cnh');
            $table->float('KmInicial');
            $table->float('KmFinal');
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('renavam')->references('renavam')->on('veiculos');
            $table->foreign('cnh')->references('cnh')->on('motoristas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagens');
    }
};

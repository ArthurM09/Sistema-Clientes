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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cnpj_cpf')->unique(); 
            $table->string('contato')->nullable(); 
            $table->string('email')->unique()->nullable(); 
            $table->string('whatsapp')->nullable(); 
            $table->string('endereco_rua');
            $table->string('endereco_numero');
            $table->string('endereco_complemento')->nullable(); 
            $table->string('endereco_bairro');
            $table->string('endereco_cep');
            $table->string('endereco_cidade');
            $table->string('endereco_estado');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

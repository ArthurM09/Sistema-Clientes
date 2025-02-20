<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('icone'); // Nome do arquivo da imagem
            $table->string('slug')->unique();
            $table->date('initial_date');
            $table->date('end_date')->nullable(); // Pode ser nulo se a data final não for definida
            $table->enum('status', ['pending', 'doing', 'done', 'canceled'])->default('pending');
            $table->integer('percent')->default(0);
            $table->string('resp_nome');
            $table->string('resp_email');
            $table->string('resp_telefone')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};

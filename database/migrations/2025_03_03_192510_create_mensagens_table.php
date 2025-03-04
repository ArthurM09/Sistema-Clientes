<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atendimento_id');
            $table->unsignedBigInteger('user_id')->nullable(); // Pode ser nulo se a mensagem não for de um usuário
            $table->boolean('visualizacao')->default(false);
            $table->text('mensagem');
            $table->string('anexo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('atendimento_id')->references('id')->on('atendimentos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Define o que acontece se o usuário for excluído
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mensagens');
    }
};

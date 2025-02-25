<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('assunto');
            $table->text('descricao')->nullable();
            $table->enum('status', ['pending', 'closed', 'canceled', 'finalized'])->default('pending');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('id')->on('projetos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};

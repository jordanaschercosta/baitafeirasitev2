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
        Schema::create('participacao_banca', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('banca_id');
            $table->unsignedBigInteger('participacao_id');

            $table->foreign('banca_id')
                  ->references('id')->on('bancas')
                  ->onDelete('cascade');

            $table->foreign('participacao_id')
                  ->references('id')->on('participacoes')
                  ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['banca_id', 'participacao_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participacao_banca');
    }
};

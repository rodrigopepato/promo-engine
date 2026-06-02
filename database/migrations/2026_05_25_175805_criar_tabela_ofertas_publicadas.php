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
        Schema::create('ofertas_publicadas', function (Blueprint $table) {
            $table->id();
            $table->string('marketplace');
            $table->string('produto_id');
            $table->string('titulo');
            $table->string('produto_url');
            $table->decimal('preco_atual', 10, 2);
            $table->decimal('preco_original', 10, 2)->nullable();
            $table->boolean('tem_cupom')->default(false);
            $table->string('cupom_codigo')->nullable();
            $table->timestamp('publicado_em')->nullable();
            $table->timestamps();

            $table->index(['marketplace', 'produto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas_publicadas');
    }
};

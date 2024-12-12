<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incrementada
            $table->string('nome'); // Nome completo
            $table->string('email')->unique(); // E-mail (único)
            $table->string('telefone')->nullable(); // Telefone
            $table->date('data_nascimento')->nullable(); // Data de nascimento
            $table->string('cpf', 11)->unique()->nullable(); // CPF (único)
            $table->string('rg')->nullable(); // RG (opcional)
            $table->text('endereco')->nullable(); // Endereço completo
            $table->string('cidade')->nullable(); // Cidade
            $table->string('estado')->nullable(); // Estado
            $table->enum('status', ['ativo', 'inativo'])->default('ativo'); // Status do cliente
            $table->timestamps(); // Campos de data de criação e atualização
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

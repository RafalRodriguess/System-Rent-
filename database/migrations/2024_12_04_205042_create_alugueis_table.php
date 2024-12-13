<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlugueisTable extends Migration
{
    public function up()
{
    Schema::create('alugueis', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('cliente_id'); // Garantir que seja o tipo correto
        $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        $table->foreignId('veiculo_id')->constrained('veiculos')->onDelete('cascade');
        $table->date('data_inicio');
        $table->date('data_fim');
        $table->enum('status', ['ativo', 'concluido', 'cancelado'])->default('ativo');
        $table->decimal('valor_total', 10, 2);
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('alugueis');
    }
}

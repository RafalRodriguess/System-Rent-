<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('marca');
            $table->string('modelo');
            $table->year('ano');
            $table->enum('categoria', ['carro', 'moto']);
            $table->decimal('valor_diaria', 10, 2);
            $table->enum('status', ['disponivel', 'alugado', 'manutencao'])->default('disponivel');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}

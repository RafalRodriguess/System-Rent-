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
        Schema::table('veiculos', function (Blueprint $table) {
            $table->boolean('ar_condicionado')->default(false); // Ar-condicionado (booleano)
            $table->enum('combustivel', ['gasolina', 'alcool', 'flex'])->nullable(); // Combustível (gasolina, alcool, flex)
            $table->enum('portas', [2, 4])->nullable(); // Portas (2 ou 4)
            $table->enum('assentos', [5, 7])->nullable(); // Assentos (5 ou 7)
            $table->decimal('caucao', 10, 2)->nullable(); // Caução (valor numérico)
        });
    }

    public function down()
    {
        Schema::table('veiculos', function (Blueprint $table) {
            $table->dropColumn(['ar_condicionado', 'combustivel', 'portas', 'assentos', 'caucao']);
        });
    }

};

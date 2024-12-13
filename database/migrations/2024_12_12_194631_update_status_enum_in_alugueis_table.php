<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusEnumInAlugueisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE alugueis MODIFY COLUMN status ENUM('ativo', 'concluido', 'cancelado', 'em andamento') DEFAULT 'ativo';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE alugueis MODIFY COLUMN status ENUM('ativo', 'concluido', 'cancelado') DEFAULT 'ativo';");
    }
}

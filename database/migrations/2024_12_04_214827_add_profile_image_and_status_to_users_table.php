<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileImageAndStatusToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->after('email'); // Coluna para imagem de perfil
            $table->boolean('status')->default(true)->after('profile_image'); // Coluna para status (ativo/inativo)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_image');
            $table->dropColumn('status');
        });
    }
}

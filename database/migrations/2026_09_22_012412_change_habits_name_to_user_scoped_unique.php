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
        Schema::table('habits', function (Blueprint $table): void {
            $table->dropUnique('habits_name_unique');
            $table->unique(['user_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('habits', function (Blueprint $table): void {
            $table->dropUnique('habits_user_id_name_unique');
            $table->unique('name');
        });
    }
};

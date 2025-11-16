<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lists', function (Blueprint $table) {
            // Add these only if they don't exist yet

            $table->string('title')->nullable();
            $table->text('description')->nullable();

            // Add user_id column and link it to users table
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('lists', function (Blueprint $table) {
            // Reverse the changes if we rollback
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'title', 'description']);
        });
    }
};

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
        // This code will be executed when you run 'php artisan migrate'
        // It adds the 'username' column to the 'users' table.
        Schema::table('users', function (Blueprint $table) {
            // Adds a string column named 'username'
            // ->unique() ensures no two users can have the same username
            // ->nullable() means existing users without a username won't break anything (you'll need to fill them in)
            // ->after('email') places it after the 'email' column for better organization
            $table->string('username')->unique()->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This code will be executed if you run 'php artisan migrate:rollback'
        // It removes the 'username' column, reversing the 'up' method's changes.
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
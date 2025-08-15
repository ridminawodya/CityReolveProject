<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Use this migration if your complaints table already exists
     * and you need to add the status and admin_notes columns
     */
    public function up(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            // Add status column if it doesn't exist
            if (!Schema::hasColumn('complaints', 'status')) {
                $table->enum('status', ['pending', 'in_progress', 'resolved', 'closed'])
                      ->default('pending')
                      ->after('photo');
            }
            
            // Add admin_notes column if it doesn't exist
            if (!Schema::hasColumn('complaints', 'admin_notes')) {
                $table->text('admin_notes')
                      ->nullable()
                      ->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn(['status', 'admin_notes']);
        });
    }
};
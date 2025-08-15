<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // First, add the new columns
        Schema::table('users', function (Blueprint $table) {
            // Add role (if not already present)
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('user')->after('email');
            }

            // Add department_id if it doesn't exist
            if (!Schema::hasColumn('users', 'department_id')) {
                $table->unsignedBigInteger('department_id')->nullable()->after('role');
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            }
        });

        // Then, migrate data from usertype to role (after the column is created)
        if (Schema::hasColumn('users', 'usertype') && Schema::hasColumn('users', 'role')) {
            DB::table('users')->whereNotNull('usertype')->update(['role' => DB::raw('usertype')]);
        }

        // Finally, modify and drop columns
        Schema::table('users', function (Blueprint $table) {
            // Convert status to enum (if it exists as a string)
            if (Schema::hasColumn('users', 'status')) {
                $table->dropColumn('status');
            }
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Drop usertype and user_type if they exist
            $columnsToDrop = [];
            if (Schema::hasColumn('users', 'usertype')) {
                $columnsToDrop[] = 'usertype';
            }
            if (Schema::hasColumn('users', 'user_type')) {
                $columnsToDrop[] = 'user_type';
            }
            
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Restore usertype and user_type
            if (!Schema::hasColumn('users', 'usertype')) {
                $table->string('usertype')->default('user')->after('password');
            }
            if (!Schema::hasColumn('users', 'user_type')) {
                $table->string('user_type')->nullable()->after('usertype');
            }

            // Restore status as string
            if (Schema::hasColumn('users', 'status')) {
                $table->dropColumn('status');
            }
            $table->string('status')->default('active');

            // Drop foreign key and department_id
            if (Schema::hasColumn('users', 'department_id')) {
                $table->dropForeign(['department_id']);
                $table->dropColumn('department_id');
            }

            // Drop role
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
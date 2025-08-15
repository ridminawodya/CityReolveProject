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
        Schema::table('tax_payments', function (Blueprint $table) {
            // Add new fields for enhanced functionality
            $table->string('transaction_id')->unique()->nullable()->after('status');
            $table->string('receipt_number')->unique()->nullable()->after('transaction_id');
            
            // Tax information
            $table->string('tax_type')->nullable()->after('receipt_number');
            $table->string('tax_year')->nullable()->after('tax_type');
            $table->string('reference_number')->nullable()->after('tax_year');
            
            // Payment details (JSON for storing method-specific info)
            $table->json('payment_details')->nullable()->after('reference_number');
            
            // Contact information
            $table->string('email')->after('payment_details');
            $table->string('phone')->nullable()->after('email');
            
            // Receipt preferences
            $table->boolean('email_receipt')->default(true)->after('phone');
            $table->boolean('downloadable_receipt')->default(true)->after('email_receipt');
            $table->boolean('print_receipt')->default(false)->after('downloadable_receipt');
            
            // Payment timestamp
            $table->timestamp('payment_date')->nullable()->after('print_receipt');
            
            // Add indexes for better performance
            $table->index(['user_id', 'status']);
            $table->index('payment_date');
            $table->index('tax_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tax_payments', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'status']);
            $table->dropIndex(['payment_date']);
            $table->dropIndex(['tax_year']);
            
            $table->dropColumn([
                'transaction_id',
                'receipt_number',
                'tax_type',
                'tax_year',
                'reference_number',
                'payment_details',
                'email',
                'phone',
                'email_receipt',
                'downloadable_receipt',
                'print_receipt',
                'payment_date'
            ]);
        });
    }
};
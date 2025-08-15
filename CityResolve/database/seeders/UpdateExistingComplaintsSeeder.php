<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;

class UpdateExistingComplaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update all existing complaints that don't have a status
        Complaint::whereNull('status')->update([
            'status' => 'pending'
        ]);

        $this->command->info('Updated existing complaints with pending status.');
    }
}
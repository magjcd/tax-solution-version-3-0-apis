<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeeAppliedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FeeApplied::insert([
            ['fee_applied' => 'Yes'],
            ['fee_applied' => 'No'],
        ]);
    }
}

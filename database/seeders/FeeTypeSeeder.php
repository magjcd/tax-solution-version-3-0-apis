<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FeeType::insert([
            ['fee_type_name' => 'Income Tax'],
            ['fee_type_name' => 'Sales Tax'],
            ['fee_type_name' => 'With Holding Tax'],
            ['fee_type_name' => 'BRB'],
            ['fee_type_name' => 'SRB'],
            ['fee_type_name' => 'PRB'],
            ['fee_type_name' => 'KP'],
        ]);
    }
}

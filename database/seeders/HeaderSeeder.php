<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Header::insert([
            ['header_name' => 'Assets'],
            ['header_name' => 'Liabilities'],
            ['header_name' => "Owner's Equity"],
            ['header_name' => 'Revenue'],
            ['header_name' => 'Expences'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusinessStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BusinessStatus::insert([
            [
                'business_status' => 'AOP',
                'bus_stat_details' => 'Lorem Ipsum',
            ],
            [
                'business_status' => 'Company',
                'bus_stat_details' => 'Lorem Ipsum',
            ],
            [
                'business_status' => 'Indivisual',
                'bus_stat_details' => 'Lorem Ipsum',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\City::insert([
            [
                'city_name' => 'Jacobabad',
            ],
            [
                'city_name' => 'Sukkur',
            ],
            [
                'city_name' => 'Karachi',
            ],
        ]);
    }
}

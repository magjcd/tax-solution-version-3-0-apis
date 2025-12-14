<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Classification::insert([
            ['classification_name' => 'A1', 'classification_short_detail' => 'Lorem'],
            ['classification_name' => 'A', 'classification_short_detail' => 'Lorem'],
            ['classification_name' => 'B', 'classification_short_detail' => 'Lorem'],
            ['classification_name' => 'C', 'classification_short_detail' => 'Lorem'],
        ]);
    }
}

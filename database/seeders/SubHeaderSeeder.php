<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SubHeader::insert([
            [
                'header_id' => 1,
                'sub_header_name' => 'Accounts Receivale',
            ],
            [
                'header_id' => 1,
                'sub_header_name' => 'Representative',
            ],
            [
                'header_id' => 4,
                'sub_header_name' => 'Services',
            ],
        ]);
    }
}

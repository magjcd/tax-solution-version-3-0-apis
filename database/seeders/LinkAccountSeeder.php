<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LinkAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\LinkAccount::insert([
            ['link_acc_name' => 'Link Account 1'],
            ['link_acc_name' => 'Link Account 2'],
            ['link_acc_name' => 'Link Account 3'],
            ['link_acc_name' => 'Link Account 4'],
            ['link_acc_name' => 'Link Account 5'],
        ]);
    }
}

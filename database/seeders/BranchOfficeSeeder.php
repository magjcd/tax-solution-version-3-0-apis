<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BranchOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BranchOffice::insert([
            [
                'branch_office_name' => 'Jacobabad',
                'branch_office_details' => 'Lorem Ipsum',
                'city_id' => 1,
            ], [
                'branch_office_name' => 'Sukkur',
                'branch_office_details' => 'Lorem Ipsum',
                'city_id' => 1,
            ], [
                'branch_office_name' => 'Hyder Abad',
                'branch_office_details' => 'Lorem Ipsum',
                'city_id' => 1,
            ], [
                'branch_office_name' => 'Karachi',
                'branch_office_details' => 'Lorem Ipsum',
                'city_id' => 1,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acc = \App\Models\Client::create(
            // [
            //     'header_id' => 1,
            //     'sub_header_id' => 1,
            //     'client_name' => 1,
            // ],
            // [
            //     'header_id' => 1,
            //     'sub_header_id' => 2,
            //     'client_name' => 1,
            // ],
            [
                'business_status_id' => 1,
                'client_name' => 'Revenue Earned - Services',
                'header_id' => 4,
                'sub_header_id' => 3,
                'city_id' => 1,
                'cnic_ntn_no' => '1234567089081234',
                'user_id' => 1,

            ],
        );

        $acc = \App\Models\ClientProfile::create([
            'client_id' => $acc->id,
        ]);

    }
}

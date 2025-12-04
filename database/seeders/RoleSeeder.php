<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Role::truncate();
        \App\Models\Role::insert([
            [
                'role_name' => 'admin',
                'role_details' => 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.',
            ],
            [
                'role_name' => 'director',
                'role_details' => 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.',
            ],
            [
                'role_name' => 'represenative',
                'role_details' => 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.',
            ],
        ]);
    }
}

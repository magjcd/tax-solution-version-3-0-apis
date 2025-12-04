<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Permission::truncate();
        \App\Models\Permission::insert([
            [
                'permission_name' => 'add_user',
                'permission_details' => 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.',
            ],
            [
                'permission_name' => 'update_user',
                'permission_details' => 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.',
            ],
            [
                'permission_name' => 'delete_user',
                'permission_details' => 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.',
            ],
            [
                'permission_name' => 'view_user',
                'permission_details' => 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.',
            ],
        ]);
    }
}

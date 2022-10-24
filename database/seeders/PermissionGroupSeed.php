<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_groups')->insert([
            [
                'name' => 'Permission Group',
            ],
            [
                'name' => 'Permission',
            ],
            [
                'name' => 'Role',
            ],
        ]);
    }
}

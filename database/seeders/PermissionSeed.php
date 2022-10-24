<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PermissionGroup;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionGroups = PermissionGroup::all();
        if ($permissionGroup = $permissionGroups->firstWhere('name', 'Permission Group')->id) {
            DB::table('permissions')->insert([
                [
                    'name' => 'Permission Group: Index',
                    'key' => 'view-any-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
                [
                    'name' => 'Permission Group: Show',
                    'key' => 'view-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
                [
                    'name' => 'Permission Group: Create',
                    'key' => 'create-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
                [
                    'name' => 'Permission Group: Edit',
                    'key' => 'update-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
                [
                    'name' => 'Permission Group: Delete',
                    'key' => 'delete-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
            ]);
        }
    }
}

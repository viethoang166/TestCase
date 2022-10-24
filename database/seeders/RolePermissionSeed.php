<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermissionGroup;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RolePermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addBoth('Permission Group', 'Administrator');
        $this->addBoth('Permission', 'Administrator');
        $this->addBoth('Role', 'Administrator');
    }
    private function addBoth($permissionGroupName, $roleName)
    {
        if (! $permissionGroup = PermissionGroup::all()->firstWhere('name', $permissionGroupName)) {
            return;
        }
        if (! $role = Role::all()->firstWhere('name', $roleName)) {
            return;
        }
        foreach ($permissionGroup->permissions as $permission) {
            DB::table('roles_permissions')->insert([
                'permission_id' => $permission->id,
                'role_id' => $role->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

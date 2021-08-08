<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'transport-list',
            'transport-create',
            'transport-edit',
            'transport-delete',
            'card-type-list',
            'card-type-create',
            'card-type-edit',
            'card-type-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete'
        ];

        /** @var Permission $permissionModel */
        $permissionModel = Permission::class;

        foreach ($permissions as $permission) {
            $permissionModel::create(['name' => $permission]);
        }
    }
}

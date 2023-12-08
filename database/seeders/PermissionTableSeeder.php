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
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'log-activity-list',
        ];
        $dynamicID = [
            '102',
            '102',
            '102',
            '102',
            '101',
            '101',
            '101',
            '101',
            '103',
         ];

         for ($i=0; $i < count($permissions); $i++) {
            Permission::create([
                'name' => $permissions[$i],
                'dynamic_menu_id' => $dynamicID[$i],
               ]);
         }

    }
}

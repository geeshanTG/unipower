<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class DynamicMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('dynamic_menu')->count() == 0){

            DB::table('dynamic_menu')->insert([

                [
                    'id' => 1,
                    'icon' => 'fa fa-lg fa-fw fa-american-sign-language-interpreting',
                    'title' => 'Home',
                    'page_id' => 1,
                    'url' => '#',
                    'parent_id' => 0,
                    'is_parent' => 1,
                    'show_menu' => 1,
                    'parent_order' => 1,
                    'child_order' => 0,
                    'fOrder' => 1.00,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 100,
                    'icon' => 'fa fa-lg fa-fw fa-user',
                    'title' => 'Admin',
                    'page_id' => 100,
                    'url' => '#',
                    'parent_id' => 0,
                    'is_parent' => 1,
                    'show_menu' => 1,
                    'parent_order' => 2,
                    'child_order' => 1,
                    'fOrder' => 100.00,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 101,
                    'icon' => '',
                    'title' => 'User',
                    'page_id' => 101,
                    'url' => 'users-list',
                    'parent_id' => 100,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'parent_order' => NULL,
                    'child_order' => 1,
                    'fOrder' => 100.01,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 102,
                    'icon' => '',
                    'title' => 'Role',
                    'page_id' => 102,
                    'url' => 'roles.index',
                    'parent_id' => 100,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'parent_order' => NULL,
                    'child_order' => 2,
                    'fOrder' => 100.02,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 103,
                    'icon' => '',
                    'title' => 'Logs',
                    'page_id' => 103,
                    'url' => 'log-activity-list',
                    'parent_id' => 100,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'parent_order' => NULL,
                    'child_order' => 3,
                    'fOrder' => 100.03,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}

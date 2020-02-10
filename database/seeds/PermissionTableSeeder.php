<?php

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

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'study-list',
            'study-create',
            'study-edit',
            'study-delete',
            'site-list',
            'site-create',
            'site-edit',
            'site-delete'
         ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}

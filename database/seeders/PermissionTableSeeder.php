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
           'client-list',
           'client-create',
           'client-edit',
           'client-delete',
           'modele-list',
           'modele-create',
           'modele-edit',
           'modele-delete',
           'vehicule-list',
           'vehicule-create',
           'vehicule-edit',
           'vehicule-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

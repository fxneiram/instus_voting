<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin'
        ]);

        $admin->givePermissionTo('gestion usuarios');
        $admin->givePermissionTo('gestion roles');
        $admin->givePermissionTo('gestion permisos');

        $web = Role::create([
            'name' => 'Comun'
        ]);

        $web->givePermissionTo('autogestion');
        $web->givePermissionTo('votar');
    }
}

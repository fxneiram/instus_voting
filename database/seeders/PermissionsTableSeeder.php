<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'gestion usuarios'
        ]);

        Permission::create([
            'name' => 'gestion roles'
        ]);

        Permission::create([
            'name' => 'gestion permisos'
        ]);

        Permission::create([
            'name' => 'gestion votacion'
        ]);

        Permission::create([
            'name' => 'autogestion'
        ]);

        Permission::create([
            'name' => 'votar'
        ]);

    }
}

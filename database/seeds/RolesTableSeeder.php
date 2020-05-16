<?php

use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin =
            [
                'name' => 'super_administrador',
                'display_name' => 'Super Administrador',
                'description' => 'Rol para el  usuario Super Administrador.',
                'group' => 'super_administrador'
            ];

        Role::create($roleSuperAdmin);
    }
}

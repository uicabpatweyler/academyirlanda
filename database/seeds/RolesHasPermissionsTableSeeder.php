<?php

use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RolesHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::findByName('super_administrador');
        $roleSuperAdmin->givePermissionTo('*.*');
    }

}

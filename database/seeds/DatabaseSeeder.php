<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesHasPermissionsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(OptionsTableSeeder::class);

        //$roleAdmin = Role::findByName('administrador');
        //$roleManager = Role::findByName('supervisor');


//
//        $roleAdmin->givePermissionTo('roles.viewAny');
//        $roleAdmin->givePermissionTo('roles.create');
//        $roleAdmin->givePermissionTo('roles.update');
//        $roleAdmin->givePermissionTo('roles.soft_delete');
//
//        $roleAdmin->givePermissionTo('users.viewAny');
//        $roleAdmin->givePermissionTo('users.view');

        //$roleManager->givePermissionTo('roles.index');


        //$userAdmin = User::where('email','admin@example.com')->first();
        //$userManager = User::where('email','manager@example.com')->first();


        //$userAdmin->assignRole('administrador');
        //$userManager->assignRole('supervisor');
    }
}

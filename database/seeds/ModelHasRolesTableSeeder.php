<?php

use App\Models\Admin\User;
use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userSuperAdmin = User::where('email','sa@example.com')->first();
        $userSuperAdmin->assignRole('super_administrador');
    }
}

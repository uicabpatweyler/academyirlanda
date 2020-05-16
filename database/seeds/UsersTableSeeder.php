<?php

use App\Models\Admin\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Weyler A.',
            'last_name' => 'Uicab Pat',
            'email' => 'sa@example.com',
            'password' => Hash::make('password'),
        ]);
//        User::create([
//            'first_name' => 'Manuela de J.',
//            'last_name' => 'Kú Tah',
//            'email' => 'admin@example.com',
//            'password' => Hash::make('password'),
//        ]);
//        User::create([
//            'first_name' => 'Jesus R.',
//            'last_name' => 'Uicab Kú',
//            'email' => 'manager@example.com',
//            'password' => Hash::make('password'),
//        ]);
    }
}

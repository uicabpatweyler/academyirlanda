<?php

use App\Models\Admin\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'module_id' => 1,
                'opt_position' => 0,
                'opt_name' => 'Roles',
                'opt_type' => 'option_mod',
                'opt_resource' => 'roles'
            ],
            [
                'module_id' => 1,
                'opt_position' => 1,
                'opt_name' => 'Usuarios',
                'opt_type' => 'option_mod',
                'opt_resource' => 'users'
            ],
            [
                'module_id' => 2,
                'opt_position' => 0,
                'opt_name' => 'Escuelas',
                'opt_type' => 'option_mod',
                'opt_resource' => 'schools'
            ],
            [
                'module_id' => 2,
                'opt_position' => 1,
                'opt_name' => 'Ciclos Escolares',
                'opt_type' => 'option_mod',
                'opt_resource' => 'school_cycles'
            ],
            [
              'module_id' => 2,
              'opt_position' => 2,
              'opt_name' => 'Grados Escolares',
              'opt_type' => 'option_mod',
              'opt_resource' => 'school_grades'
            ],
            [
              'module_id' => 2,
              'opt_position' => 3,
              'opt_name' => 'Cuotas Escolares',
              'opt_type' => 'option_mod',
              'opt_resource' => 'school_fees'
            ]
        ];

        foreach ($options as $key => $value)
        {
            Option::create($value);
        }
    }
}

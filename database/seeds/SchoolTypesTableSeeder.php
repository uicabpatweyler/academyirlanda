<?php

use App\Models\SchoolType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolTypes = [
            [
                'name' => 'Educación Básica',
                'status' => true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Educación Especial',
                'status' => true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Educación Media Superior',
                'status' => true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Capacitación para el Trabajo',
                'status' => true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Educación Superior',
                'status' => true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($schoolTypes as $key => $value) {
            SchoolType::create($value);
        }
    }
}

<?php

use App\Models\SchoolLevel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolLevels = [
            [
                'school_type_id'=>1,
                'name'=>'Preescolar',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'name'=>'Primaria',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'name'=>'Secundaria',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>2,
                'name'=>'USAER',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>2,
                'name'=>'CAM',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>3,
                'name'=>'Bachillerato',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>3,
                'name'=>'Profesional Técnico',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>4,
                'name'=>'Capacitación para el Trabajo',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'name'=>'Licenciatura',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'name'=>'Licenciatura S.A.',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'name'=>'Posgrado',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'name'=>'Posgrado S.A.',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($schoolLevels as $key => $value)
        {
            SchoolLevel::create($value);
        }
    }
}

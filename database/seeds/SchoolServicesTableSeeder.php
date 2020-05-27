<?php

use App\Models\SchoolService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolServices = [
            [
                'school_type_id'=>1,
                'school_level_id'=>1,
                'name'=>'CENDI',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>1,
                'name'=>'Preescolar General',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>1,
                'name'=>'Preescolar Indígena',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>1,
                'name'=>'Preescolar CONAFE',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>2,
                'name'=>'Primaria General',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>2,
                'name'=>'Primaria Indigena',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>2,
                'name'=>'Primaria CONAFE',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>3,
                'name'=>'Secundaria General',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>3,
                'name'=>'Secundaria Técnica',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>3,
                'name'=>'Telesecundaria',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>3,
                'name'=>'Secundaria Comunitaria',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>3,
                'name'=>'Secundaria Migrante',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>1,
                'school_level_id'=>3,
                'name'=>'Secundaria Para Trabajadores',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>2,
                'school_level_id'=>4,
                'name'=>'USAER',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>2,
                'school_level_id'=>5,
                'name'=>'CAM',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>3,
                'school_level_id'=>6,
                'name'=>'Bachillerato General',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>3,
                'school_level_id'=>6,
                'name'=>'Bachillerato Técnico',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>3,
                'school_level_id'=>6,
                'name'=>'Profesional Técnico B',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>3,
                'school_level_id'=>7,
                'name'=>'Profesional Técnico',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>4,
                'school_level_id'=>8,
                'name'=>'Formación para el Trabajo',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>9,
                'name'=>'Lic. Univ. y Téc.',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>9,
                'name'=>'Técnico Superior',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>9,
                'name'=>'Normal',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>10,
                'name'=>'Lic. Univ. y Téc. S.A.',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>10,
                'name'=>'Técnico Superior S.A.',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>11,
                'name'=>'Especialidad',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>11,
                'name'=>'Maestría',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>11,
                'name'=>'Doctorado',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>12,
                'name'=>'Especialidad S.A.',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>12,
                'name'=>'Maestría S.A.',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'school_type_id'=>5,
                'school_level_id'=>12,
                'name'=>'Doctorado S.A.',
                'status'=>true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($schoolServices as $key => $value)
        {
            SchoolService::create($value);
        }
    }
}

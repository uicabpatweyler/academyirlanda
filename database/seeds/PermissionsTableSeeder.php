<?php

use App\Models\Admin\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*---- Todos los permisos para el Super Administrador ----*/
        Permission::create([
            'belongs_to' => 'to_nobody',
            'position' => 0,
            'name' => '*.*',
            'display_name' => 'Todos los permisos del sistema',
            'guard_name' => 'web'
        ]);
        /*---- Permisos para los menus del sistema ----*/
        Permission::create([
            'belongs_to' => null,
            'position' => 0,
            'name' => 'access.administration.module',
            'display_name' => 'Menu: Administración',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'belongs_to' => null,
            'position' => 1,
            'name' => 'access.setting.module',
            'display_name' => 'Menu: Configuración',
            'guard_name' => 'web'
        ]);

        /*---- Permisos para los opciones de los menus del sistema ----*/

        Permission::create([
            'belongs_to' => null,
            'position' => 0,
            'name' => 'roles',
            'display_name' => 'Roles',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'belongs_to' => null,
            'position' => 1,
            'name' => 'users',
            'display_name' => 'Usuarios',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'belongs_to' => null,
            'position' => 2,
            'name' => 'schools',
            'display_name' => 'Escuelas',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'belongs_to' => null,
            'position' => 3,
            'name' => 'school_cycles',
            'display_name' => 'Ciclos Escolares',
            'guard_name' => 'web'
        ]);

        Permission::create([
          'belongs_to' => null,
          'position' => 4,
          'name' => 'school_grades',
          'display_name' => 'Grados Escolares',
          'guard_name' => 'web'
        ]);

        Permission::create([
          'belongs_to' => null,
          'position' => 5,
          'name' => 'school_fees',
          'display_name' => 'Cuotas Escolares',
          'guard_name' => 'web'
        ]);

        /*---- Permisos para los roles de usuario ----*/

        Permission::create([
            'belongs_to' => 'roles',
            'position' => 1,
            'name' => 'roles.viewAny',
            'display_name' => 'Navegar/Listado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'roles',
            'position' => 2,
            'name' => 'roles.view',
            'display_name' => 'Mostrar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'roles',
            'position' => 3,
            'name' => 'roles.create',
            'display_name' => 'Crear',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'roles',
            'position' => 4,
            'name' => 'roles.update',
            'display_name' => 'Editar/Actualizar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'roles',
            'position' => 5,
            'name' => 'roles.soft_delete',
            'display_name' => 'Borrar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'roles',
            'position' => 6,
            'name' => 'roles.delete',
            'display_name' => 'Eliminar',
            'guard_name' => 'web'
        ]);

        /*---- Permisos para la administración de los usuarios del sistema----*/

        Permission::create([
            'belongs_to' => 'users',
            'position' => 1,
            'name' => 'users.viewAny',
            'display_name' => 'Navegar/Listado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'users',
            'position' => 2,
            'name' => 'users.view',
            'display_name' => 'Mostrar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'users',
            'position' => 3,
            'name' => 'users.create',
            'display_name' => 'Crear',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'users',
            'position' => 4,
            'name' => 'users.update',
            'display_name' => 'Editar/Actualizar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'users',
            'position' => 5,
            'name' => 'users.soft_delete',
            'display_name' => 'Borrar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'users',
            'position' => 6,
            'name' => 'users.delete',
            'display_name' => 'Eliminar',
            'guard_name' => 'web'
        ]);

        /*---- Permisos para la administración de las escuelas del sistema----*/

        Permission::create([
            'belongs_to' => 'schools',
            'position' => 1,
            'name' => 'schools.viewAny',
            'display_name' => 'Navegar/Listado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'schools',
            'position' => 2,
            'name' => 'schools.view',
            'display_name' => 'Mostrar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'schools',
            'position' => 3,
            'name' => 'schools.create',
            'display_name' => 'Crear',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'schools',
            'position' => 4,
            'name' => 'schools.update',
            'display_name' => 'Editar/Actualizar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'schools',
            'position' => 5,
            'name' => 'schools.soft_delete',
            'display_name' => 'Borrar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'schools',
            'position' => 6,
            'name' => 'schools.delete',
            'display_name' => 'Eliminar',
            'guard_name' => 'web'
        ]);

        /*---- Permisos para la administración de los ciclos escolares----*/

        Permission::create([
            'belongs_to' => 'school_cycles',
            'position' => 1,
            'name' => 'school_cycles.viewAny',
            'display_name' => 'Navegar/Listado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'school_cycles',
            'position' => 2,
            'name' => 'school_cycles.view',
            'display_name' => 'Mostrar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'school_cycles',
            'position' => 3,
            'name' => 'school_cycles.create',
            'display_name' => 'Crear',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'school_cycles',
            'position' => 4,
            'name' => 'school_cycles.update',
            'display_name' => 'Editar/Actualizar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'school_cycles',
            'position' => 5,
            'name' => 'school_cycles.soft_delete',
            'display_name' => 'Borrar',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'belongs_to' => 'school_cycles',
            'position' => 6,
            'name' => 'school_cycles.delete',
            'display_name' => 'Eliminar',
            'guard_name' => 'web'
        ]);

        /*---- Permisos para la administración de los grados escolares----*/

        Permission::create([
          'belongs_to' => 'school_grades',
          'position' => 1,
          'name' => 'school_grades.viewAny',
          'display_name' => 'Navegar/Listado',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_grades',
          'position' => 2,
          'name' => 'school_grades.view',
          'display_name' => 'Mostrar',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_grades',
          'position' => 3,
          'name' => 'school_grades.create',
          'display_name' => 'Crear',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_grades',
          'position' => 4,
          'name' => 'school_grades.update',
          'display_name' => 'Editar/Actualizar',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_grades',
          'position' => 5,
          'name' => 'school_grades.soft_delete',
          'display_name' => 'Borrar',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_grades',
          'position' => 6,
          'name' => 'school_grades.delete',
          'display_name' => 'Eliminar',
          'guard_name' => 'web'
        ]);

        /*---- Permisos para la administración de las cutoas escolares----*/

        Permission::create([
          'belongs_to' => 'school_fees',
          'position' => 1,
          'name' => 'school_fees.viewAny',
          'display_name' => 'Navegar/Listado',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_fees',
          'position' => 2,
          'name' => 'school_fees.view',
          'display_name' => 'Mostrar',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_fees',
          'position' => 3,
          'name' => 'school_fees.create',
          'display_name' => 'Crear',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_fees',
          'position' => 4,
          'name' => 'school_fees.update',
          'display_name' => 'Editar/Actualizar',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_fees',
          'position' => 5,
          'name' => 'school_fees.soft_delete',
          'display_name' => 'Borrar',
          'guard_name' => 'web'
        ]);
        Permission::create([
          'belongs_to' => 'school_fees',
          'position' => 6,
          'name' => 'school_fees.delete',
          'display_name' => 'Eliminar',
          'guard_name' => 'web'
        ]);

    }
}

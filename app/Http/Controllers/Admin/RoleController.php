<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;
use App\Models\Admin\Module;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    public function index()
    {
        $roles = Role::query()
            ->withCount('users')
            ->filterRoles(Auth::user())
            ->orderBy('created_at', 'ASC')
            ->paginate(10);

        return response()
            ->view('admin.roles.index',
                [
                    'roles' => $roles
                ],
                200);
    }

    public function create()
    {
        $modules = Module::with('options')
            ->orderBy('position','asc')
            ->get();

        return response()
            ->view('admin.roles.create',
                [
                    'modules' => $modules
                ],
                200);
    }

    public function store(StoreRole $request)
    {
        $role = $request->createRol();
        if($request->filled('permissions'))
        {
            $role->syncPermissions(array_values($request->input('permissions')));
        }
        return response()
            ->json([
                'message' => 'El rol se ha creado correctamente.',
                'url' => route('roles.index')
            ]);
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        $modules = Module::with('options')
            ->orderBy('position','asc')
            ->get();

        return response()
            ->view('admin.roles.edit',[
                'role' => $role,
                'habilities' => $role->permissions,
                'modules' => $modules
            ],200);
    }

    public function update(UpdateRole $request, Role $role)
    {
        $request->updateRole($role);
        if($request->filled('permissions'))
        {
            $role->syncPermissions(array_values($request->input('permissions')));
        }
        else{
            $role->syncPermissions([]);
        }

        return response()
            ->json([
                'message' => 'El rol se ha actualizado correctamente.',
                'url' => route('roles.index')
            ]);
    }

    public function delete(Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();
        return response()
            ->json([
                'message' => 'El rol se ha borrado correctamente.',
                'url' => route('roles.index')
            ]);
        //return redirect()->route('roles.index');
    }

    public function restore($roleId)
    {
        $role = Role::withTrashed()->where('id', $roleId)->first();
        $role->restore();
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}

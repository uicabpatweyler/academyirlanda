<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\Admin\Role;
use App\Models\Admin\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        $users = User::all();
        return response()
            ->view('admin.users.index', ['users' => $users],200);
    }

    public function create()
    {
        $roles = Role::query()
            ->withCount('users')
            ->filterRoles(Auth::user())
            ->orderBy('created_at', 'ASC')
            ->get();
        return response()
            ->view('admin.users.create',['roles' => $roles],200);
    }

    public function store(StoreUser $request)
    {
        $user = $request->createUser();
        if($request->filled('role')){
            $user->syncRoles($request->input('role'));
        }
        return response()
            ->json([
                'message' => 'El usuario se ha creado correctamente.',
                'url' => route('users.index')
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        $roles = Role::query()
            ->withCount('users')
            ->filterRoles(Auth::user())
            ->orderBy('created_at', 'ASC')
            ->get();
        return response()
            ->view('admin.users.edit',['user'=>$user, 'roles' => $roles],200);
    }

    public function update(UpdateUser $request, User $user)
    {
        if($request->input('password')!=null)
        {
            $this->validate($request, [
                'password' => ['required', 'string', 'min:8']
            ]);
            $request->updateUser($user,$request->input('password'));
        }
        else{
            $request->updateUser($user,null);
        }

        if($request->filled('role')){
            $user->syncRoles($request->input('role'));
        }
        else{
            $user->syncRoles([]);
        }

        return response()
            ->json([
                'message' => 'El usuario se ha actualizado correctamente.',
                'url' => route('users.index')
            ]);
    }

    public function delete(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return response()
            ->json([
                'message' => 'El usuario se ha borrado correctamente.',
                'url' => route('users.index')
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

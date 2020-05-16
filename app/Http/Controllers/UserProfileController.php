<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfile;
use Auth;
use Illuminate\Http\Request;
use App\Models\Admin\User;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(Auth::id() == $id)
        {
            $user = User::findOrFail($id);
            return response()
                ->view('userprofile.edit', ['user' => $user], 200);
        }
        abort(403, 'This action is unauthorized.');
    }

    public function update(UpdateUserProfile $request, $id)
    {
        $user = User::findOrFail($id);

        if($request->input('password')!=null)
        {
            $this->validate($request, [
                'password' => ['required', 'string', 'min:8']
            ]);
            $request->updateUserProfile($user, $request->input('password'));
        }
        else
        {
           $request->updateUserProfile($user,null);
        }
        return response()
            ->json([
                'message' => 'Los datos se han actualizado correctamente.',
                'url' => route('home')
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

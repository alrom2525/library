<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUser;
use App\Models\Admin\Role;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles:id,name')->orderBy('id')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('id')->pluck('name', 'id')->toArray();
        $cancelRoute = route('user.index');
        return view('admin.user.create', compact('roles','cancelRoute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateUser $request)
    {   
        
        $user = User::create($request->all());
        $user->roles()->sync($request->role_id);
        if ($request->input('changepassword') == 1) {
            Password::sendResetLink($request->only(['email']));
        }
        return redirect('admin/user')->with('message', 'Utilisateur créé avec succès');
        
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::orderBy('id')->pluck('name', 'id')->toArray();
        $user =  User::with('roles')->findOrFail($id);
        $cancelRoute = route('user.index');
        return view('admin.user.edit', compact('cancelRoute','user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUser $request, $id)
    {   
        $user = User::findOrFail($id);
        $user->update(array_filter($request->all()));
        $user->roles()->sync($request->role_id);
        if ($request->input('changepassword') == 1) {
            Password::sendResetLink($request->only(['email']));
        }
        return redirect('admin/user')->with('message', 'Utilisateur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = User::findOrFail($id);
            $user->roles()->detach();
            $user->delete();
            return response()->json(['message' => 'ok']);
         } else {
            abort(404);
        }
    }
}

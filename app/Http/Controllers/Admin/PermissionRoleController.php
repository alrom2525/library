<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role ::orderBy('id')->pluck('name','id')->toArray();
        $permissions = Permission::get();
        $permissionsRoles = Permission::with('roles')->get()->pluck('roles', 'id')->toArray();
        return view('admin.permission-role.index', compact('roles', 'permissions', 'permissionsRoles'));
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
        if ($request->ajax()) {
            $permissions = new Permission();
            if ($request->input('status') == 1) {
                $permissions->find($request->input('permission_id'))->roles()->attach($request->input('role_id'));
                return response()->json(['response' => "L'autorisation a été assigné correctement "]);
            } else {
                $permissions->find($request->input('permission_id'))->roles()->detach($request->input('role_id'));
                return response()->json(['response' => "L'autorisation a été supprimé de ce rôle"]);
            }
        } else {
            abort(404);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

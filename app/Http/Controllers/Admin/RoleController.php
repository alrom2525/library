<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Role;
use App\Http\Requests\StoreRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $roles = Role::orderBy('id')->get();
        $cancelRoute = route('role.index');
        return view('admin.role.index', compact('roles','cancelRoute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $cancelRoute = route('role.index');
        return view('admin.role.create', compact('cancelRoute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        Role::create($request->all());
        return redirect('admin/role')->with('message', 'Role créé avec succès');
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
        $role = Role::findOrFail($id);
        $cancelRoute = route('role.index');
        return view('admin.role.edit', compact('role','cancelRoute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRole $request, $id)
    {
        Role::findOrFail($id)->update($request->all());
        return redirect('admin/role')->with('message', 'Role modifié avec succès');
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
            if (Role::destroy($id)) {
                return response()->json(['message' => 'ok']);
            } else {
                return response()->json(['message' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}

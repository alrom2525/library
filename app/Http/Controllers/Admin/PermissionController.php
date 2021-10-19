<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePermission;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $permissions = Permission::orderBy('id')->get();
        return view('admin.permission.index', compact('permissions','cancelRoute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cancelRoute = route('permission.index');
        return view('admin.permission.create', compact('cancelRoute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePermission $request)
    {
        Permission::create($request->all());
        return redirect('admin/permission')->with('message', 'Autorisation créé avec succès');
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
        $permission = Permission::findOrFail($id);
        $cancelRoute = route('permission.index');
        return view('admin.permission.edit', compact('permission','cancelRoute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePermission $request, $id)
    {
        Permission::findOrFail($id)->update($request->all());
        return redirect('admin/permission')->with('message', 'Autorisation modifié avec succès');
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
            if (Permission::destroy($id)) {
                return response()->json(['message' => 'ok']);
            } else {
                return response()->json(['message' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}

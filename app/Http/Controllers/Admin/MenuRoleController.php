<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Role;

class MenuRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id')->pluck('name','id')->toArray();
        $menus = Menu::getMenu();
        $menusRoles = Menu::with('roles')->get()->pluck('roles','id')->toArray();
        return view('admin.menu-role.index',compact('roles', 'menus', 'menusRoles'));
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
            $menus = new Menu();
            if ($request->input('status') == 1) {
                $menus->find($request->input('menu_id'))->roles()->attach($request->input('role_id'));
                return response()->json(['response' => 'Le menu a été assigné correctement ']);
            } else {
                $menus->find($request->input('menu_id'))->roles()->detach($request->input('role_id'));
                return response()->json(['response' => 'Le menu a été supprimé de ce rôle']);
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

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenu;
use App\Models\Admin\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::getMenu();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $cancelRoute = route('menu.index');
        return view('admin.menu.create', compact('cancelRoute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenu $request)
    {
        Menu::create($request->all());
        return redirect('admin/menu/create')->with('message', 'Menu créé avec succès');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrder(Request $request)
    {   
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->storeOrder($request->menu);
            return response()->json(['answer' => 'ok']);
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
        return "from show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $menu = Menu::findOrFail($id);
        $cancelRoute = route('menu.index');
        return view('admin.menu.edit', compact('menu', 'cancelRoute'));
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
        Menu::findOrFail($id)->update($request->all());
        return redirect('admin/menu')->with('message', 'Menu modifié avec succès');
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
            if (Menu::destroy($id)) {
                return response()->json(['message' => 'ok']);
            } else {
                return response()->json(['message' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}

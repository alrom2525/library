<?php

use App\Models\Admin\Permission;

if (!function_exists('getActiveMenu')) {
    function getActiveMenu($path)
    {
        if (request()->is($path) || request()->is($path . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}


if (!function_exists('canUser')) {
    function can($permission, $redirect = true)
    {
        if (session()->get('role_name') == 'Administrator') {
            return true;
        } else {
            $roleid = session()->get('role_id');
            $permissions = cache()->tags('permission')->rememberForever("permission.roleid.$roleid", function () {
                return Permission::whereHas('roles', function ($query) {
                    $query->where('role_id', session()->get('role_id'));
                })->get()->pluck('slug')->toArray();
            });
            if (!in_array($permission, $permissions)) {
                if ($redirect) {
                    if (!request()->ajax())
                        return redirect()->route('start')->with('message', "Vous n'êtes pas autorisé à entrer dans ce module")->send();
                    abort(403, "Vous n'êtes pas autorisé à entrer dans ce module");
                } else {
                    return false;
                }
            }
            return true;
        }
    }
} 
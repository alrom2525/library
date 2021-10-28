<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Set session variables according to user profile .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setSession(Request $request)
    {
        if ($request->ajax()) {
            $request->session()->put(
                [
                    'role_id' => $request->input('role_id'),
                    'role_name' => $request->input('role_name')
                ]
            );
            return response()->json(['messaje' => 'ok']);
        } else {
            abort(404);
        }
    }

}

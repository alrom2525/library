<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if($this->permission()) {
            return $next($request);
        }
        else {    
            return redirect(route('start'))->with('message', 'Cette section est pour les administrateurs');
        }
        
    }

    private function permission()
    {
        return session()->get('role_name') == 'Administrator';
    }

}

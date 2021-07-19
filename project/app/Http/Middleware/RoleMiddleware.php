<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
//    biến role truyền vào lấy bên route
    public function handle($request, Closure $next,$role)
    {
        //nếu không tồn tại user
        if (!Auth::user()|| (Auth::user()->role_id) != $role ) {

            return redirect()->route('login');
        }
//        var_dump(Auth::user()->role_id);
        return $next($request);
    }
}

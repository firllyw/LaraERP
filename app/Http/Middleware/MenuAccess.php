<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersAccess;

class MenuAccess
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
        $usersAccess = UsersAccess::where('users_id', Auth::id())->get()->toArray();
        $access = array();
        foreach ($usersAccess as $acc){
            $access[] = $acc['module_id'];
        }
        $access = implode(",", $access);
        session(['access' => $access]);
        return $next($request);
    }
}

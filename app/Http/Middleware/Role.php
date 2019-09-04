<?php


namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Role extends Middleware
{
    public function handle($request, Closure $next, ... $roles)
    {
        $user = Auth::user();
        if($user->authorizeRoles($roles))
            return $next($request);
    }
}
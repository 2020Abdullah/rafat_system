<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null) :Response
    {
        // $guards = empty($guards) ? [null] : $guards;

        if(auth('web')->check() || auth('manager')->check() || auth('agent')->check()){
             if ($guard == 'web' || auth('web')->check()) {
                  return redirect('admin/dashboard');
             }
             if ($guard == 'manager' || auth('manager')->check()) {
                  return redirect('manager/dashboard');
             }
             if ($guard == 'agent' || auth('agent')->check()) {
                  return redirect('Agent/dashboard');
             }
        }
        return $next($request);
    }
}

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

        if ($guard == 'web' && auth('web')->check()) {
             redirect('admin/dashboard');
        }
        if ($guard == 'manager' && auth('manager')->check()) {
             redirect('manager/dashboard');
        }
        if ($guard == 'agent' && auth('agent')->check()) {
             redirect('Agent/dashboard');
        }
        else {
             redirect('login');
        }
        return $next($request);
    }
}

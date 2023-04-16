<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if($userType == 'admin'){
             redirect(RouteServiceProvider::ADMIN);
        }
        else if ($userType == 'agent'){
             redirect(RouteServiceProvider::AGENT);
        }
        else if ($userType == 'manager'){
             redirect(RouteServiceProvider::MANAGER);
        }
        else {
             redirect()->route('login')->with('error' , 'غير مسموح لك بالدخول إلي هذه الصفحة .');
        }
        return $next($request);
    }
}

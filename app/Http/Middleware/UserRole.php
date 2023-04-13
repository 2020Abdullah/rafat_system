<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role == 1){
            return redirect()->route('admin.dashboard');
        }
        if(auth()->user()->role == 2){
            return redirect()->route('manager.dashboard');
        }
        if(auth()->user()->role == 3){
            return redirect()->route('Agent.dashboard');
        }
        return redirect()->route('login')->with(['error' => 'غير مسموح لك بالدخول إلي هذه الصفحة .']);
    }
}

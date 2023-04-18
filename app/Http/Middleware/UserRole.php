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
    public function handle(Request $request, Closure $next): Response
    {
          if(auth('manager')->check() && auth('manager')->user()->status == 0){
               Auth::logout();
               return redirect()->back()->with('info', 'تم تعطيل حسابك برجاء التواصل مع الدعم');
          }
          if(auth('agent')->check() && auth('agent')->user()->status == 0){
               Auth::logout();
               return redirect()->back()->with('info', 'تم تعطيل حسابك برجاء التواصل مع الدعم');
          }
          return $next($request);
    }
}

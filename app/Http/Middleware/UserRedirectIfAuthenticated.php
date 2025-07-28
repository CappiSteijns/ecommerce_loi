<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    // Hier controleren we of de gebruiker is ingelogd.
    // Als de gebruiker is ingelogd, wordt de aanvraag doorgestuurd naar de volgende middleware.
    // Als de gebruiker niet is ingelogd, wordt hij doorgestuurd naar de inlogpagina.
    {
        
        if (Auth::check() && Auth::user()) {
           return $next($request);
        }else {
            return redirect()->route('login');
        }      
  

    }
}
<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (Auth::user()->roles[0]->name) {
                    case 'ketua panitia':
                        return RouteServiceProvider::COMMITTEE;
                        break;
                    case 'panitia':
                        return RouteServiceProvider::COMMITTEE;
                        break;
                    case 'kandidat calon':
                        return RouteServiceProvider::CANDIDATEE;
                        break;
                    default:
                        return \abort(403);
                        break;
                }
            }
        }

        return $next($request);
    }
}

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
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($guard == 'participant') {
                return redirect()->route('participant.voting.index');
            }

            $role = Auth::user()->roles[0]->name;
            switch ($role) {
                case 'ketua panitia':
                    return redirect()->route('committee.dashboard.index');
                    break;
                case 'panitia':
                    return redirect()->route('committee.dashboard.index');
                    break;
                case 'kandidat':
                    return redirect()->route('candidate.dashboard.index');
                    break;
                default:
                    return \abort(403);
                    break;
            }
        }

        return $next($request);
    }
}

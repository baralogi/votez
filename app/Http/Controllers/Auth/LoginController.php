<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
        $role = Auth::user()->roles[0]->name;
        switch ($role) {
            case 'ketua panitia':
                return RouteServiceProvider::COMMITTEE;
                break;
            case 'panitia':
                return RouteServiceProvider::COMMITTEE;
                break;
            case 'kandidat':
                return RouteServiceProvider::CANDIDATEE;
                break;
            case 'pengawas':
                return RouteServiceProvider::SUPERVISOR;
                break;
            default:
                return \abort(403);
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }
}

<?php

namespace App\Http\Controllers\Auth\Participant;

use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends DefaultLoginController
{
    protected $redirectTo = RouteServiceProvider::PARTICIPANT;

    public function __construct()
    {
        $this->middleware('guest:participant')->except('logout');
    }

    public function showLoginForm()
    {
        return view('pages.participant.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'identity_number' => 'required',
            'token' => 'required|min:5'
        ]);

        $credential = [
            'identity_number' => $request->identity_number,
            'password' => $request->token,
            'have_voted' => 0
        ];
        // Attempt to log the user in
        if (Auth::guard('participant')->attempt($credential)) {
            // If login succesful, then redirect to their intended location

            return redirect()->intended('/participant/voting');
        }
        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->with(['error' => 'NIM atau Token Salah! atau Sudah Pernah Melakukan Voting!']);
    }


    public function username()
    {
        return 'identity_number';
    }
    protected function guard()
    {
        return Auth::guard('participant');
    }
}

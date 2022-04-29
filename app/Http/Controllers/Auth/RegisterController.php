<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidatePartner;
use App\Models\Organization;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $organizations = Organization::all();
        return view('pages.auth.register')->with(['organizations' => $organizations]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'organization_id' => ['required'],
            'voting_id' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'organization_id' => $data['organization_id'],
            ]);
            $user->assignRole('kandidat');

            $candidatePartner = CandidatePartner::create([
                'voting_id' => $data['voting_id'],
                'is_pass' => false
            ]);

            Candidate::create([
                'user_id' => $user->id,
                'candidate_partner_id' => $candidatePartner->id,
                'name' => $data['name'],
                'status' => Candidate::CHAIRMAN
            ]);

            DB::commit();
        } catch (Exception $error) {
            DB::rollback();
            dd($error);
            Log::error($error->getMessage());
        }

        return $user;
    }
}

<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use App\DataTables\UsersDataTable;
use App\Services\UserService;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    protected $userService, $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.user.index');
    }

    public function store(Request $request)
    {
        $this->userService->storeUserData([
            'name' => $request->name,
            'email' => $request->email,
            'organization_id' => auth()->user()->organization->id,
            'password' => Hash::make('password'),
            'roles' => $request->roles
        ]);

        return redirect()->route('users.index');
    }

    public function create()
    {
        $data = $this->roleService->getCommitteeRoles()->get();
        return view('pages.committee.user.create')->with(['roles' => $data]);
    }

    public function show($id)
    {
        $data = $this->userService->getUserById($id);

        return view('pages.committee.user.show')->with(['user' => $data]);
    }

    public function edit($id)
    {
        $data = $this->userService->getUserById($id);

        return view('pages.committee.user.edit')->with(['user' => $data]);
    }

    public function update(User $user, Request $request)
    {
        $this->userService->updateUser($user->id, [
            'name' => $request->name
        ]);

        return redirect()->route('users.index');
    }
}

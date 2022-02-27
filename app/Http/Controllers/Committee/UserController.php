<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use App\DataTables\UsersDataTable;
use App\Models\Organization;
use App\Services\UserService;
use App\Models\User;
use App\Services\OrganizationService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    protected $userService, $roleService, $organizationService;

    public function __construct(UserService $userService, RoleService $roleService, OrganizationService $organizationService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->organizationService = $organizationService;
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.user.index');
    }

    public function create()
    {
        $data = $this->roleService->getCommitteeRoles()->get();
        return view('pages.committee.user.create')->with(['roles' => $data]);
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

    public function show($id)
    {
        $roles = $this->roleService->getCommitteeRoles()->get();
        $user = $this->userService->getUserById($id);

        return view('pages.committee.user.show')->with(['user' => $user, 'roles' => $roles]);
    }

    public function edit($id)
    {
        $roles = $this->roleService->getCommitteeRoles()->get();
        $user = $this->userService->getUserById($id);

        return view('pages.committee.user.edit')->with(['user' => $user, 'roles' => $roles]);
    }

    public function update(User $user, Request $request)
    {
        $this->userService->updateUserData($user->id, [
            'name' => $request->name,
            'roles' => $request->roles
        ]);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $this->userService->destroyUserData($user->id);

        return redirect()->route('users.index');
    }
}

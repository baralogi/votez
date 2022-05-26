<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use App\DataTables\UsersDataTable;
use App\Http\Requests\Committee\User\StoreUserRequest;
use App\Http\Requests\Committee\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\UserRepository;



class UserController extends Controller
{
    protected $roleRepository, $userRepository;

    public function __construct(RoleRepository $roleRepository, UserRepository $userRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.user.index');
    }

    public function create()
    {
        $roles = $this->roleRepository->getCommitteeRole();
        return view('pages.committee.user.create')->with(['roles' => $roles]);
    }

    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->validated());
        return redirect()->route('committee.user.index');
    }

    public function show(User $user)
    {
        return view('pages.committee.user.show')->with(['user' => $user]);
    }

    public function edit(User $user)
    {
        $roles = $this->roleRepository->getCommitteeRole();
        return view('pages.committee.user.edit')->with(['user' => $user, 'roles' => $roles]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $this->userRepository->update($user, $request->validated());
        return redirect()->route('committee.user.index');
    }

    public function destroy(User $user)
    {
        $this->userRepository->destroy($user);
        return redirect()->route('committee.user.index');
    }
}

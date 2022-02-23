<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.user.index');
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

    public function update(Request $request)
    {
        # code...
    }
}

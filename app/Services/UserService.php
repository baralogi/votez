<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers()
    {
        return $this->userRepository->getAll();
    }

    public function getUserById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function storeUser($data)
    {
        return $this->userRepository->store($data);
    }

    public function updateUser($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function destroyUser($id)
    {
        return $this->userRepository->destroy($id);
    }
}

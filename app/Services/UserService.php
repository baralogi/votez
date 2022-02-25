<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class UserService
{

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * PostService constructor.
     *
     * @param UserRepository $userRepository
     */
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

    public function listUsersCommitte()
    {
        return $this->userRepository->getByOrganizationAndCommitteRoles();
    }

    public function storeUserData($data)
    {

        $validator = Validator::make($data, [
            'organization_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        DB::beginTransaction();
        try {
            $result = $this->userRepository->store($data);
            DB::commit();
            return $result;
        } catch (Exception $error) {
            DB::rollback();
            Log::error($error);
        }
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

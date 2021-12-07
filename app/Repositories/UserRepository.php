<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->get();
    }

    public function getById($id)
    {
        return $this->user->where('id', $id)->first();
    }

    public function store($data)
    {
        return $this->user->insert($data);
    }

    public function update($id, $data)
    {
        return $this->user->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}

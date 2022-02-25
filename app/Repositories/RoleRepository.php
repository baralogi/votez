<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getAll()
    {
        return $this->role->get();
    }

    public function getBySimilarName(String $name)
    {
        # get role by LIKE %name%
        return $this->role->where('name', 'LIKE', '%' . $name . '%');
    }
}

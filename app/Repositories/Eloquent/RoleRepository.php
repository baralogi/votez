<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;

class RoleRepository extends BaseRepository
{

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function getCommitteeRole()
    {
        return $this->model->CommitteeRole()->get();
    }
}

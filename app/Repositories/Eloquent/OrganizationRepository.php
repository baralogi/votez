<?php

namespace App\Repositories\Eloquent;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;

class OrganizationRepository extends BaseRepository
{

    public function __construct(Organization $model)
    {
        $this->model = $model;
    }

    public function list()
    {
        return parent::index()->get();
    }
}

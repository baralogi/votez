<?php

namespace App\Repositories\Eloquent;

use App\Models\Voting;
use Spatie\QueryBuilder\AllowedFilter;

class VotingRepository extends BaseRepository
{

    public function __construct(Voting $model)
    {
        $this->model = $model;
    }

    public function getByOrganizationId($organizationId)
    {
        return $this->model->where('organization_id', $organizationId);
    }
}

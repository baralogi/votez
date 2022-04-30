<?php

namespace App\Repositories\Eloquent;

use App\Models\Participant;

class ParticipantRepository extends BaseRepository
{

    public function __construct(Participant $model)
    {
        $this->model = $model;
    }

    public function listByOrganizationId($organizationId)
    {
        return $this->model->where('organization_id', $organizationId);
    }
}

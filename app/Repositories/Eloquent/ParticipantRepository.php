<?php

namespace App\Repositories\Eloquent;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Model;

class ParticipantRepository extends BaseRepository
{

    public function __construct(Participant $model)
    {
        $this->model = $model;
    }

    public function dataTables($organizationId)
    {
        return $this->model->where('organization_id', $organizationId)->newQuery();
    }

    public function create(array $attributes): Model
    {
        $attributes['organization_id'] = auth()->user()->organization->id;
        return parent::create($attributes);
    }
}

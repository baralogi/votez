<?php

namespace App\Repositories\Eloquent;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParticipantRepository extends BaseRepository
{

    public function __construct(Participant $model)
    {
        $this->model = $model;
    }

    public function groubByHaveVoted()
    {
        return $this->model
            ->select('have_voted', DB::raw('COUNT(*) as total'))
            ->where('organization_id', auth()->user()->organization_id)
            ->groupBy('have_voted')
            ->get();
    }

    public function dataTables($organizationId)
    {
        return $this->model->where('organization_id', $organizationId)->newQuery();
    }

    public function findByIdentityNumber($identityNumber, $organizationId)
    {
        return parent::index()
            ->where(['identity_number' => $identityNumber, 'organization_id' => $organizationId])
            ->first();
    }

    public function create(array $attributes): Model
    {
        $attributes['organization_id'] = auth()->user()->organization->id;
        return parent::create($attributes);
    }

    public function updateHaveVoted()
    {
        return $this->model->find(auth()->user()->id)->update(['have_voted' => true]);
    }
}

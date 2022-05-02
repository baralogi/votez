<?php

namespace App\Repositories\Eloquent;

use App\Models\CandidatePartner;
use App\Models\Voting;
use Illuminate\Database\Eloquent\Model;

class CandidatePartnerRepository extends BaseRepository
{

    public function __construct(CandidatePartner $model)
    {
        $this->model = $model;
    }

    public function approve(Model $model): Model
    {
        $attributes['is_pass'] = true;
        return parent::update($model, $attributes);
    }

    public function decline(Model $model): Model
    {
        $attributes['is_pass'] = false;
        return parent::update($model, $attributes);
    }

    public function setSequenceNumber(Model $model, array $attributes): Model
    {
        return parent::update($model, $attributes);
    }
}

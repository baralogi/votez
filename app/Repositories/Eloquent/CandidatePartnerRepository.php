<?php

namespace App\Repositories\Eloquent;

use App\Models\CandidatePartner;
use App\Models\Voting;

class CandidatePartnerRepository extends BaseRepository
{

    public function __construct(CandidatePartner $model)
    {
        $this->model = $model;
    }

    public function listByVotingId(Voting $voting)
    {
        return $this->model->where('voting_id', $voting->id)->first();
    }
}

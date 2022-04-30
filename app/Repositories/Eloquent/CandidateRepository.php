<?php

namespace App\Repositories\Eloquent;

use App\Models\Candidate;

class CandidatePartnerRepository extends BaseRepository
{

    public function __construct(Candidate $model)
    {
        $this->model = $model;
    }
}

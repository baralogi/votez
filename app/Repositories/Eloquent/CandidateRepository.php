<?php

namespace App\Repositories\Eloquent;

use App\Models\Candidate;

class CandidateRepository extends BaseRepository
{

    public function __construct(Candidate $model)
    {
        $this->model = $model;
    }

    public function listByPartnerId($candidatePartnerId)
    {
        return $this->model
            ->where('candidate_partner_id', $candidatePartnerId)
            ->get();
    }
}

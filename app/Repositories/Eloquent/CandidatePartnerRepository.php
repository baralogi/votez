<?php

namespace App\Repositories\Eloquent;

use App\Models\CandidatePartner;

class CandidatePartnerRepository extends BaseRepository
{

    public function __construct(CandidatePartner $model)
    {
        $this->model = $model;
    }

    public function list($id)
    {
        return $this->model->where('id', $id)->get();
    }
}

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
}

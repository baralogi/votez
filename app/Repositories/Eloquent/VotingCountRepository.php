<?php

namespace App\Repositories\Eloquent;

use App\Models\Voting;
use App\Models\VotingCount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VotingCountRepository extends BaseRepository
{

    public function __construct(VotingCount $model)
    {
        $this->model = $model;
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Models\Voting;
use App\Models\VotingCount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VotingCountRepository extends BaseRepository
{

    public function __construct(VotingCount $model)
    {
        $this->model = $model;
    }

    public function quickCount()
    {
        return $this->model
            ->select('candidate_partner_id', DB::raw('COUNT(*) as total'))
            ->groupBy('candidate_partner_id')
            ->get();
    }
}

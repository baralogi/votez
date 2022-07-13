<?php

namespace App\Repositories\Eloquent;

use App\Models\Voting;
use App\Models\VotingCheck;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VotingCheckRepository extends BaseRepository
{

    public function __construct(VotingCheck $model)
    {
        $this->model = $model;
    }

    public function checkHaveBeenVote(Voting $voting)
    {
        return $this->model
            ->where(['voting_id' => $voting->id, 'participant_id' => auth()->user()->id])
            ->count();
    }
}

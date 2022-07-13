<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VotingCountResource;
use App\Repositories\Eloquent\VotingCountRepository;
use Illuminate\Http\Request;

class VotingCountController extends Controller
{
    public function quickCount(VotingCountRepository $repository)
    {
        return VotingCountResource::collection($repository->quickCount());
    }
}

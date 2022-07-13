<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CandidatePartnerResource;
use App\Repositories\Eloquent\CandidatePartnerRepository;
use Illuminate\Http\Request;

class CandidatePartnerController extends Controller
{
    public function groubByVoting(CandidatePartnerRepository $repository)
    {
        return CandidatePartnerResource::collection($repository->groubByVoting());
    }
}

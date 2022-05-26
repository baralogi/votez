<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Repositories\Eloquent\VotingRepository;

class VotingController extends Controller
{
    protected $repository;

    public function __construct(VotingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Organization $organization)
    {
        $votings = $this->repository->listByOrganizationId($organization->id);
        return response()->json($votings);
    }
}

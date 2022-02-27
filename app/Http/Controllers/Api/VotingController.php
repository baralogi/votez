<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\VotingService;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    protected $votingService;

    public function __construct(VotingService $votingService)
    {
        $this->votingService = $votingService;
    }

    public function getByOrganization($id)
    {
        $votings = $this->votingService->getByOrganizationId($id)->get();
        return response()->json($votings);
    }
}

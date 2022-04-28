<?php

namespace App\Http\Controllers\Committee;

use App\DataTables\CandidatesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Voting;
use App\Services\CandidatePartnerService;
use App\Services\CandidateService;
use App\Services\VotingService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CandidateController extends Controller
{
    protected $votingService;
    protected $candidateService;
    protected $candidatePartnerService;

    public function __construct(
        VotingService $votingService,
        CandidateService $candidateService,
        CandidatePartnerService $candidatePartnerService
    ) {
        $this->votingService = $votingService;
        $this->candidateService = $candidateService;
        $this->candidatePartnerService = $candidatePartnerService;
    }

    public function index(Voting $voting)
    {
        return view('pages.committee.candidate.index')->with(['voting' => $voting]);
    }

    public function show($votingId, $candidateId)
    {
        $data = $this->candidateService->getCandidateById($votingId, $candidateId);

        return view('pages.committee.candidate.show')->with(['candidate' => $data]);
    }
}

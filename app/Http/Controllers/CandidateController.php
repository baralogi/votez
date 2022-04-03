<?php

namespace App\Http\Controllers;

use App\DataTables\CandidatesDataTable;
use App\Models\Candidate;
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

    public function index($id)
    {
        $data = $this->votingService->getVotingById($id);
        $candidatePartners = $this->candidatePartnerService->showCandidatePartnerByVoting($id);

        return view('pages.committee.candidate.index')->with(['voting' => $data, 'candidatePartners' => $candidatePartners]);
    }

    public function show($votingId, $candidateId)
    {
        $data = $this->candidateService->getCandidateById($votingId, $candidateId);

        return view('pages.committee.candidate.show')->with(['candidate' => $data]);
    }
}

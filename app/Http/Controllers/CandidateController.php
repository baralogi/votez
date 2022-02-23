<?php

namespace App\Http\Controllers;

use App\DataTables\CandidatesDataTable;
use App\Models\Candidate;
use App\Services\CandidateService;
use App\Services\VotingService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CandidateController extends Controller
{
    protected $votingService;
    protected $candidateService;

    public function __construct(VotingService $votingService, CandidateService $candidateService)
    {
        $this->votingService = $votingService;
        $this->candidateService = $candidateService;
    }

    public function index($id)
    {
        $data = $this->votingService->getVotingById($id);

        return view('pages.committee.candidate.index')->with(['voting' => $data]);
    }

    public function show($votingId, $candidateId)
    {
        $data = $this->candidateService->getCandidateById($votingId, $candidateId);

        return view('pages.committee.candidate.show')->with(['candidate' => $data]);
    }
}

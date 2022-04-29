<?php

namespace App\Http\Controllers\Committee;

use App\DataTables\CandidatesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidatePartner;
use App\Models\Voting;
use App\Repositories\Eloquent\CandidatePartnerRepository;
use App\Services\CandidatePartnerService;
use App\Services\CandidateService;
use App\Services\VotingService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CandidateController extends Controller
{
    private $candidatePartnerRepository;

    public function __construct(
        CandidatePartnerRepository $candidatePartnerRepository
    ) {
        $this->candidatePartnerRepository = $candidatePartnerRepository;
    }

    public function index(Voting $voting)
    {
        $candidatePartner = $this->candidatePartnerRepository->listByVotingId($voting);
        return view('pages.committee.candidate.index')->with(['voting' => $voting, 'candidatePartner' => $candidatePartner]);
    }

    public function show(Voting $voting, CandidatePartner $candidatePartner)
    {
        return view('pages.committee.candidate.show')->with(['voting' => $voting, 'candidatePartner' => $candidatePartner]);
    }
}

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

    public function index(CandidatesDataTable $dataTable, $id)
    {
        $data = $this->votingService->getVotingById($id);
        $dataX = $this->candidateService->getCandidate($id);

        return view('pages.candidate.index')->with(['voting' => $data, 'candidate' => DataTables::of($dataX)->toJson()]);
    }
}

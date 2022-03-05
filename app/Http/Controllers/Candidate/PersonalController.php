<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Services\CandidateService;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    protected $candidateService;

    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    public function index()
    {
        $votingId = Auth::user()->candidate->voting_id;
        $candidate_partners_id = Auth::user()->candidate->candidate_partner_id;
        $data = $this->candidateService->getCandidateByPartner($votingId, $candidate_partners_id)->get();

        return view('pages.candidate.personal.index')->with(['candidates' => $data]);
    }

    public function create()
    {
        return view('pages.candidate.personal.create');
    }
}

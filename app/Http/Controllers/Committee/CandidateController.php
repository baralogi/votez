<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidatePartner;
use App\Models\Voting;

class CandidateController extends Controller
{
    protected $candidate;

    public function __construct(
        Candidate $candidate
    ) {
        $this->candidate = $candidate;
    }

    public function show(Voting $voting, CandidatePartner $candidate_partner, Candidate $candidate)
    {
        return view('pages.committee.candidate.show')->with(['voting' => $voting, 'candidatePartner' => $candidate_partner, 'candidate' => $candidate]);
    }
}

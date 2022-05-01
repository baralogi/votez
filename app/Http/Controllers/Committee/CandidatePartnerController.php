<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use App\Models\CandidatePartner;
use App\Models\Voting;
use App\Repositories\Eloquent\CandidatePartnerRepository;

class CandidatePartnerController extends Controller
{
    private $candidatePartnerRepository;

    public function __construct(
        CandidatePartnerRepository $candidatePartnerRepository
    ) {
        $this->candidatePartnerRepository = $candidatePartnerRepository;
    }

    public function show(Voting $voting, CandidatePartner $candidate_partner)
    {
        return view('pages.committee.candidatePartner.show')->with(['voting' => $voting, 'candidatePartner' => $candidate_partner]);
    }

    public function approve(Voting $voting, CandidatePartner $candidate_partner)
    {
        $this->candidatePartnerRepository->approve($candidate_partner);
        return redirect()->back();
    }

    public function decline(Voting $voting, CandidatePartner $candidate_partner)
    {
        $this->candidatePartnerRepository->decline($candidate_partner);
        return redirect()->back();
    }
}

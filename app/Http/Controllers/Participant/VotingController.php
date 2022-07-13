<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\CandidatePartner;
use App\Models\Voting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:participant');
    }

    public function index()
    {
        $votings = Voting::where('organization_id', auth()->user()->organization_id)
            ->where('is_active', true)
            ->get();
        return view('pages.participant.voting')->with(['votings' => $votings]);
    }

    public function show(Voting $voting)
    {
        $candidatePartners = CandidatePartner::where('voting_id', $voting->id)->get();
        return view('pages.participant.voting-candidate-partner')->with(['candidatePartners' => $candidatePartners]);
    }
}

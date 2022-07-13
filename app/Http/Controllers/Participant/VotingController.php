<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Participant\UpsertCheckVotingRequest;
use App\Models\Candidate;
use App\Models\CandidatePartner;
use App\Models\Voting;
use App\Models\VotingCheck;
use App\Repositories\Eloquent\ParticipantRepository;
use App\Repositories\Eloquent\VotingCheckRepository;
use App\Repositories\Eloquent\VotingCountRepository;
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

    public function show(Voting $voting, VotingCheckRepository $repository)
    {
        $candidatePartners = CandidatePartner::where('voting_id', $voting->id)->get();
        $checkHaveBeenVote = $repository->checkHaveBeenVote($voting);
        return view('pages.participant.voting-candidate-partner')
            ->with([
                'candidatePartners' => $candidatePartners,
                'checkHaveBeenVote' => $checkHaveBeenVote
            ]);
    }

    public function showCandidate(Voting $voting, CandidatePartner $candidatePartner)
    {
        $candidates = Candidate::where('candidate_partner_id', $candidatePartner->id)->get();
        return view('pages.participant.voting-candidate')
            ->with([
                'candidates' => $candidates
            ]);
    }

    public function vote(VotingCheckRepository $repository, VotingCountRepository $votingCountRepository, ParticipantRepository $participantRepository, UpsertCheckVotingRequest $request)
    {
        $repository->upsert(['participant_id' => auth()->user()->id, 'voting_id' => $request->voting_id], ['voting_id' => $request->voting_id]);
        $votingCountRepository->upsert([
            'voting_id' => $request->voting_id,
            'candidate_partner_id' => $request->candidate_partner_id
        ], ['candidate_partner_id' => $request->candidate_partner_id]);

        $participantRepository->updateHaveVoted();

        return redirect()->route('participant.voting.index');
    }
}

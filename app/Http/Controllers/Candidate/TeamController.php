<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidatePartner;
use App\Services\CandidatePartnerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * @var CandidatePartnerService $candidatePartnerService
     * 
     */
    protected $candidatePartnerService;

    /**
     * @param CandidatePartnerService $candidatePartnerService
     * 
     */
    public function __construct(CandidatePartnerService $candidatePartnerService)
    {
        $this->candidatePartnerService = $candidatePartnerService;
    }

    public function index()
    {
        $id = Auth::user()->candidate->candidate_partner_id;
        $candidatePartners = $this->candidatePartnerService->showCandidatePartnerById($id);

        return view('pages.candidate.team.index')->with(['candidatePartners' => $candidatePartners]);
    }

    public function edit(CandidatePartner $candidatePartner)
    {
        $candidatePartners = $this->candidatePartnerService->showCandidatePartnerById($candidatePartner->id);
        return view('pages.candidate.team.edit')->with(['candidatePartners' => $candidatePartners]);
    }

    public function update(CandidatePartner $candidatePartner, Request $request)
    {
        $this->candidatePartnerService->updateCanditatePartnerData($candidatePartner->id, [
            'vision' => $request->vision,
            'mission' => $request->mission
        ]);

        return redirect()->route('candidate.team.index');
    }

    public function editPhoto(CandidatePartner $candidatePartner)
    {
        $candidatePartners = $this->candidatePartnerService->showCandidatePartnerById($candidatePartner->id);
        return view('pages.candidate.team.edit-photo')->with(['candidatePartners' => $candidatePartners]);
    }

    public function updatePhoto(CandidatePartner $candidatePartner, Request $request)
    {
        $this->candidatePartnerService->updateCandidatePhoto($candidatePartner->id, [
            'photo' => $request->file('photo')
        ]);

        return redirect()->route('candidate.team.index');
    }
}

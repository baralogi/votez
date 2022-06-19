<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
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
        $votings = Voting::where('organization_id', auth()->user()->organization_id)->simplePaginate(1);


        return view('pages.participant.voting')->with(['votings' => $votings]);
    }
}

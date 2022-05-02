<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use App\DataTables\VotingsDataTable;
use App\Http\Requests\Committee\Voting\StoreVotingRequest;
use App\Http\Requests\Committee\Voting\UpdateVotingRequest;
use App\Models\Voting;
use App\Repositories\Eloquent\VotingRepository;

class VotingController extends Controller
{
    protected $votingRepository;

    public function __construct(
        VotingRepository $votingRepository
    ) {
        $this->votingRepository = $votingRepository;
    }

    public function index(VotingsDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.voting.index');
    }

    public function show(Voting $voting)
    {
        return view('pages.committee.voting.show')->with(['voting' => $voting]);
    }

    public function create()
    {
        return view('pages.committee.voting.create');
    }

    public function store(StoreVotingRequest $request)
    {
        $this->votingRepository->create($request->validated());
        return redirect()->route('committee.voting.index');
    }

    public function edit(Voting $voting)
    {
        return view('pages.committee.voting.edit')->with(['voting' => $voting]);
    }

    public function update(UpdateVotingRequest $request, Voting $voting)
    {
        $this->votingRepository->update($voting, $request->validated());
        return redirect()->route('committee.voting.index');
    }

    public function destroy(Voting $voting)
    {
        $this->votingRepository->destroy($voting);
        return redirect()->route('committee.voting.index');
    }
}

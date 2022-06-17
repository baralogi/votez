<?php

namespace App\Http\Controllers\Committee;

use App\DataTables\ParticipantsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Committee\Participant\StoreParticipantRequest;
use App\Http\Requests\Committee\Participant\UpdateParticipantRequest;
use App\Models\Participant;
use App\Repositories\Eloquent\ParticipantRepository;

class ParticipantController extends Controller
{
    protected $repository;

    public function __construct(ParticipantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(ParticipantsDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.participant.index');
    }

    public function create()
    {
        return view('pages.committee.participant.create');
    }

    public function store(StoreParticipantRequest $request)
    {
        $this->repository->create($request->validated());
        return redirect()->route('committee.participant.index');
    }

    public function edit(Participant $participant)
    {
        return view('pages.committee.participant.edit')->with('participant', $participant);
    }

    public function update(Participant $participant, UpdateParticipantRequest $request)
    {
        $this->repository->update($participant, $request->validated());
        return redirect()->route('committee.participant.index');
    }

    public function destroy(Participant $participant)
    {
        $this->repository->destroy($participant);
        return redirect()->route('committee.participant.index');
    }
}

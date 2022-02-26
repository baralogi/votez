<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use App\DataTables\VotingsDataTable;
use App\Services\VotingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VotingController extends Controller
{
    protected $votingService;

    public function __construct(VotingService $votingService)
    {
        $this->votingService = $votingService;
    }

    public function index(VotingsDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.voting.index');
    }

    public function create()
    {
        return view('pages.committee.voting.create');
    }

    public function store(Request $request)
    {
        $this->votingService->storeVotingData([
            'organization_id' => auth()->user()->organization->id,
            'name' => $request->name,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'logo' => $request->file('logo')
        ]);

        return redirect()->route('votings.index');
    }

    public function edit($id)
    {
        $data = $this->votingService->getVotingById($id);
        return view('pages.committee.voting.edit')->with(['voting' => $data]);
    }

    public function update(Request $request)
    {
        $data = $this->votingService->getVotingById($request->voting);
        $logo = $request->logo;
        $logoName = null;
        if (!empty($logo)) {
            $extension = $request->file('logo')->extension();
            $logoName = date('dmyHis') . '.' . $extension;
            $path = Storage::putFileAs('public/images/logo', $request->file('logo'), $logoName);
            if ($path) {
                $oldLogo = $data->logo;
                Storage::delete('public/images/logo/' . $oldLogo);
            }
        }

        $this->votingService->updateVoting($request->voting, [
            'name' => $request->name,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'logo' => $logoName ? $logoName : $data->logo
        ]);

        return redirect()->route('votings.index')->withSuccess("Sukses bos");
    }

    public function destroy(Request $request)
    {
        $this->votingService->destroyVoting($request->voting);
        return redirect()->route('votings.index');
    }
}

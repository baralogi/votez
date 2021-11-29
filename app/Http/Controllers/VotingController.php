<?php

namespace App\Http\Controllers;

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
        return $dataTable->render('pages.voting.index');
    }

    // public function show($id)
    // {
    //     $data = $this->votingService->getPostById($id);
    //     return $data;
    // }

    public function create()
    {
        return view('pages.voting.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $extension = $request->file('logo')->extension();
        $logoName = date('dmyHis') . '.' . $extension;
        $path = Storage::putFileAs('public/images/logo', $request->file('logo'), $logoName);


        $data = $this->votingService->storeVoting([
            'name' => $request->name,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'logo' => $logoName
        ]);

        return redirect()->route('votings.index')->withSuccess("Sukses bos");
    }
}

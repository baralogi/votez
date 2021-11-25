<?php

namespace App\Http\Controllers;

use App\Services\VotingService;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    protected $votingService;

    public function __construct(VotingService $votingService)
    {
        $this->votingService = $votingService;
    }

    public function index()
    {
        $data = $this->votingService->getVotings();
        return view('pages.voting');
    }

    // public function show($id)
    // {
    //     $data = $this->votingService->getPostById($id);
    //     return $data;
    // }
}

<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidatePartnerController extends Controller
{
    private $candidatePartnerRepository;

    public function __construct(
        CandidatePartnerRepository $candidatePartnerRepository
    ) {
        $this->candidatePartnerRepository = $candidatePartnerRepository;
    }

    public function index(Voting $voting)
    {
        # code...
    }
}

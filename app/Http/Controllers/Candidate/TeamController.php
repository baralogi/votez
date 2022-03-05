<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        return view('pages.candidate.team.index');
    }
}

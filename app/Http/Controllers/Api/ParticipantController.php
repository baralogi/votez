<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\ParticipantRepository;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function groubByHaveVoted(ParticipantRepository $repository)
    {
        return $repository->groubByHaveVoted();
    }
}

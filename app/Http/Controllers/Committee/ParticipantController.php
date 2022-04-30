<?php

namespace App\Http\Controllers\Committee;

use App\DataTables\ParticipantsDataTable;
use App\Http\Controllers\Controller;

class ParticipantController extends Controller
{
    public function index(ParticipantsDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.participant.index');
    }
}

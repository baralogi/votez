<?php

namespace App\Http\Controllers;

use App\DataTables\ParticipantsDataTable;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(ParticipantsDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.participant.index');
    }
}

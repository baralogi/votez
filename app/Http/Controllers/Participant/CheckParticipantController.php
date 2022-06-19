<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Mail\ParticipantTokenMail;
use App\Repositories\Eloquent\OrganizationRepository;
use App\Repositories\Eloquent\ParticipantRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CheckParticipantController extends Controller
{
    protected $repository, $organizationRepository;

    public function __construct(ParticipantRepository $repository, OrganizationRepository $organizationRepository)
    {
        $this->repository = $repository;
        $this->organizationRepository = $organizationRepository;
    }

    public function index()
    {
        $oragnizations = $this->organizationRepository->list();
        return view('pages.participant.check-participant')->with(['organizations' => $oragnizations]);
    }

    public function store(Request $request)
    {
        $participant = $this->repository
            ->findByIdentityNumber($request->identity_number, $request->organization_id);

        if (!$participant) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan');
        }
        $token = Str::random(5);
        $this->repository
            ->upsert(
                [
                    'organization_id' => $request->organization_id,
                    'identity_number' => $request->identity_number
                ],
                ['token' => Hash::make($token)]
            );

        Mail::to($request->identity_number . '@dinamika.ac.id')
            ->send(new ParticipantTokenMail($participant->name, $token));

        return view('pages.participant.login');
    }
}

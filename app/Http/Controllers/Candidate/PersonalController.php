<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Services\CandidateService;
use App\Services\FacultyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    /**
     * @var CandidateService $candidateService
     * @var FacultyService $facultyService
     */
    protected $candidateService, $facultyService;

    /**
     * @var CandidateService $candidateService
     * @var FacultyService $facultyService
     */
    public function __construct(CandidateService $candidateService, FacultyService $facultyService)
    {
        $this->candidateService = $candidateService;
        $this->facultyService = $facultyService;
    }

    public function index()
    {
        $votingId = Auth::user()->candidate->voting_id;
        $candidate_partners_id = Auth::user()->candidate->candidate_partner_id;
        $candidates = $this->candidateService->getCandidateByPartner($votingId, $candidate_partners_id)->get();

        return view('pages.candidate.personal.index')->with(['candidates' => $candidates]);
    }

    public function create()
    {
        $faculties = $this->facultyService->listFaculty();
        return view('pages.candidate.personal.create')->with(['faculties' => $faculties]);
    }

    public function store(Request $request)
    {

        $this->candidateService->storeCandidate([
            'name' => $request->name,
            'nim' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'semester' => $request->semester,
            'ipk' => $request->ipk,
            'sskm' => $request->sskm,
        ]);

        return redirect()->route('candidate.personal.index');
    }

    public function show(Candidate $candidate)
    {
        $votingId = Auth::user()->candidate->voting_id;
        $candidates = $this->candidateService->getCandidateById($votingId, $candidate->id);

        return view('pages.candidate.personal.show')->with(['candidates' => $candidates]);
    }
}
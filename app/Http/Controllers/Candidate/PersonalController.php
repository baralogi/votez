<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Services\CandidateFileService;
use App\Services\CandidateService;
use App\Services\FacultyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    /**
     * @var CandidateService $candidateService
     * @var FacultyService $facultyService
     * @var CandidateFileService $candidateFileService
     */
    protected $candidateService, $facultyService, $candidateFileService;

    /**
     * @param CandidateService $candidateService
     * @param FacultyService $facultyService
     * @param CandidateFileService $candidateFileService
     */
    public function __construct(
        CandidateService $candidateService,
        FacultyService $facultyService,
        CandidateFileService $candidateFileService
    ) {
        $this->candidateService = $candidateService;
        $this->facultyService = $facultyService;
        $this->candidateFileService = $candidateFileService;
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
            'nim' => $request->nim,
            'email' => $request->email,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'faculty' => $request->facultyText,
            'major' => $request->majorText,
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

    public function edit(Candidate $candidate)
    {
        $faculties = $this->facultyService->listFaculty();
        $votingId = Auth::user()->candidate->voting_id;
        $candidates = $this->candidateService->getCandidateById($votingId, $candidate->id);

        return view('pages.candidate.personal.edit')->with(['faculties' => $faculties, 'candidates' => $candidates]);
    }

    public function update(Request $request, Candidate $candidate)
    {
        $this->candidateService->updateCanditate($candidate->id, [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'faculty' => $request->facultyText,
            'major' => $request->majorText,
            'semester' => $request->semester,
            'ipk' => $request->ipk,
            'sskm' => $request->sskm,
        ]);

        return redirect()->route('candidate.personal.index');
    }

    public function destroy(Candidate $candidate)
    {
        $this->candidateService->destroyCandidateData($candidate->id);

        return redirect()->route('candidate.personal.index');
    }

    public function createFile(Candidate $candidate)
    {
        $votingId = Auth::user()->candidate->voting_id;
        $candidates = $this->candidateService->getCandidateById($votingId, $candidate->id);
        return view('pages.candidate.personal.create-file')->with(['candidates' => $candidates]);
    }

    public function storeFile(Request $request)
    {
        $this->candidateFileService->storeFileData([
            'candidate_id' => $request->candidate,
            'sk_aktif' => $request->sk_aktif,
            'tk_nilai' => $request->tk_nilai,
            's_lkmmtd' => $request->s_lkmmtd,
            'sk_aktif_org' => $request->sk_aktif_org,
            's_org' => $request->s_org,
            'bukti_koalisi' => $request->bukti_koalisi,
        ]);

        return redirect()->route('candidate.personal.index');
    }
}

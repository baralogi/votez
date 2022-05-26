<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\Personal\StorePersonalRequest;
use App\Http\Requests\Candidate\Personal\UpdatePersonalRequest;
use App\Models\Candidate;
use App\Models\CandidateFile;
use App\Repositories\Eloquent\CandidatePartnerRepository;
use App\Repositories\Eloquent\CandidateRepository;
use App\Repositories\Eloquent\FacultyRepository;
use App\Services\CandidateFileService;
use App\Services\CandidateService;
use App\Services\FacultyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    private $facultyRepository, $candidateRepository, $candidateService, $candidateFileService;

    public function __construct(
        FacultyRepository $facultyRepository,
        CandidateRepository $candidateRepository,
        CandidateService $candidateService,
        CandidateFileService $candidateFileService
    ) {
        $this->facultyRepository = $facultyRepository;
        $this->candidateRepository = $candidateRepository;
        $this->candidateService = $candidateService;
        $this->candidateFileService = $candidateFileService;
    }

    public function index()
    {
        $candidates = $this->candidateRepository->listByPartnerId(auth()->user()->candidate->candidate_partner_id);
        return view('pages.candidate.personal.index')->with(['candidates' => $candidates]);
    }

    public function create()
    {
        $faculties = $this->facultyRepository->list();
        return view('pages.candidate.personal.create')->with(['faculties' => $faculties]);
    }

    public function store(StorePersonalRequest $request)
    {
        $this->candidateRepository->create($request->validated());
        return redirect()->route('candidate.personal.index');
    }

    public function show(Candidate $personal)
    {
        return view('pages.candidate.personal.show')->with(['candidate' => $personal]);
    }

    public function edit(Candidate $personal)
    {
        $faculties = $this->facultyRepository->list();
        return view('pages.candidate.personal.edit')->with(['faculties' => $faculties, 'candidates' => $personal]);
    }

    public function update(UpdatePersonalRequest $request, Candidate $personal)
    {
        $this->candidateRepository->update($personal, $request->validated());
        return redirect()->route('candidate.personal.index');
    }

    public function destroy(Candidate $personal)
    {
        $this->candidateRepository->destroy($personal);
        return redirect()->route('candidate.personal.index');
    }

    // belum refactor
    public function createFile(Candidate $candidate)
    {
        return view('pages.candidate.personal.create-file')->with(['candidates' => $candidate]);
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

    public function editFile($candidateId, $candidateFileId)
    {
        $candidates = $this->candidateService->getCandidateById($candidateId);
        $candidateFiles = $this->candidateFileService->getFilesById($candidateFileId);

        return view('pages.candidate.personal.edit-file')->with(['candidates' => $candidates, 'candidateFiles' => $candidateFiles]);
    }

    public function updateFile($candidateId, $candidateFileId, Request $request)
    {
        $this->candidateFileService->updateFileData($candidateFileId, [
            'filename' => $request->file('filename')
        ]);

        return redirect()->route('candidate.personal.index');
    }
}

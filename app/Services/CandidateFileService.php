<?php

namespace App\Services;

use App\Repositories\CandidateFileRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CandidateFileService
{

    /**
     * @var CandidateFileRepository $candidateFileRepository
     */
    protected $candidateFileRepository;

    /**
     * CandidateFileService Constructor.
     *
     * @param CandidateFileRepository $candidateFileRepository
     */
    public function __construct(CandidateFileRepository $candidateFileRepository)
    {
        $this->candidateFileRepository = $candidateFileRepository;
    }

    public function storeFileData($data)
    {
        Validator::make($data, [
            'sk_aktif' => 'mimes:pdf|max:5000',
            'tk_nilai' => 'mimes:pdf|max:5000',
            's_lkmmtd' => 'mimes:pdf|max:5000',
            'sk_aktif_org' => 'mimes:pdf|max:5000',
            's_org' => 'mimes:pdf|max:5000',
            'bukti_koalisi' => 'mimes:pdf|max:5000'
        ])->validate();

        DB::beginTransaction();
        try {
            $path = '/files';
            $files1 = $this->candidateFileRepository->uploadFile($data['sk_aktif'], $path);
            $files2 = $this->candidateFileRepository->uploadFile($data['tk_nilai'], $path);
            $files3 = $this->candidateFileRepository->uploadFile($data['s_lkmmtd'], $path);
            $files4 = $this->candidateFileRepository->uploadFile($data['sk_aktif_org'], $path);
            $files5 = $this->candidateFileRepository->uploadFile($data['s_org'], $path);
            $files6 = $this->candidateFileRepository->uploadFile($data['bukti_koalisi'], $path);
            $result = $this->candidateFileRepository->store($data['candidate_id'], $files1, $files2, $files3, $files4, $files5, $files6);
            DB::commit();
        } catch (Exception $error) {
            DB::rollback();
            Log::error($error->getMessage());
        }

        return $result;
    }
}
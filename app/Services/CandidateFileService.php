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

    public function getFilesById($id)
    {
        return $this->candidateFileRepository->getById($id);
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
            $files1 = $this->candidateFileRepository->uploadFile($data['sk_aktif'], $path, 'sk_aktif');
            $files2 = $this->candidateFileRepository->uploadFile($data['tk_nilai'], $path, 'tk_nilai');
            $files3 = $this->candidateFileRepository->uploadFile($data['s_lkmmtd'], $path, 's_lkmmtd');
            $files4 = $this->candidateFileRepository->uploadFile($data['sk_aktif_org'], $path, 'sk_aktif_org');
            $files5 = $this->candidateFileRepository->uploadFile($data['s_org'], $path, 's_org');
            $files6 = $this->candidateFileRepository->uploadFile($data['bukti_koalisi'], $path, 'bukti_koalisi');
            $result = $this->candidateFileRepository->store($data['candidate_id'], $files1, $files2, $files3, $files4, $files5, $files6);
            DB::commit();
        } catch (Exception $error) {
            DB::rollback();
            Log::error($error->getMessage());
        }

        return $result;
    }

    public function updateFileData($id, $data)
    {
        DB::beginTransaction();
        try {
            $getFileId = $this->candidateFileRepository->getById($id);
            $file = $data['filename'];
            $fileName = $getFileId->filename;
            $filePrefix = explode('-', $getFileId->filename);
            if (!empty($file)) {
                Validator::make($data, [
                    'filename' => 'required|mimes:pdf|max:2000'
                ])->validate();
                $fileName = $this->candidateFileRepository->uploadFile($data['filename'], '/files', $filePrefix[0]);

                if ($fileName) {
                    $this->candidateFileRepository->removeFile($getFileId, '/files/');
                }
            }

            $result = $this->candidateFileRepository->update($id, $fileName);

            DB::commit();
            return $result;
        } catch (Exception $error) {
            DB::rollback();
            Log::error($error->getMessage());
        }
    }
}

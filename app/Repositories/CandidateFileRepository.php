<?php

namespace App\Repositories;

use App\Models\CandidateFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CandidateFileRepository
{
    /**
     * @var CandidateFile $candidateFile
     */
    protected $candidateFile;

    /**
     * CandidateFileRepository constructor.
     *
     * @param CandidateFile $candidateFile
     */
    public function __construct(CandidateFile $candidateFile)
    {
        $this->candidateFile = $candidateFile;
    }

    public function getById($id)
    {
        return $this->candidateFile->where('id', $id)->first();
    }

    public function store($id, $files1, $files2, $files3, $files4, $files5, $files6)
    {

        $data = [
            [
                'candidate_id' => $id,
                'filename' => $files1,
                'filetype' => $this->candidateFile::SK_AK,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'candidate_id' => $id,
                'filename' => $files2,
                'filetype' => $this->candidateFile::TK_NILAI,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'candidate_id' => $id,
                'filename' => $files3,
                'filetype' => $this->candidateFile::LKMM_TD,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'candidate_id' => $id,
                'filename' => $files4,
                'filetype' => $this->candidateFile::SK_ORG,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'candidate_id' => $id,
                'filename' => $files5,
                'filetype' => $this->candidateFile::P_ORG,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'candidate_id' => $id,
                'filename' => $files6,
                'filetype' => $this->candidateFile::B_KOALISI,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        $candidateFiles = $this->candidateFile->insert($data);

        return $candidateFiles;
    }

    public function uploadFile($file, $filePath, $filePrefix)
    {
        $extension = $file->extension();
        $fileName = $filePrefix . '-' . date('dmyHis') . '.' . $extension;
        Storage::putFileAs('public' . $filePath, $file, $fileName);

        return $fileName;
    }

    public function removeFile($fileName, $filePath)
    {
        $oldPhoto = $fileName->photo;
        Storage::delete('public' . $filePath . $oldPhoto);

        return $oldPhoto;
    }
}

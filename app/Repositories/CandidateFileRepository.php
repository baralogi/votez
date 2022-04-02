<?php

namespace App\Repositories;

use App\Models\CandidateFile;
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

    public function getByCandidateId($id)
    {
        return $this->candidateFile->where('candidate_id', $id)->get();
    }

    public function updateImage($id, $photoName)
    {
        $candidatePartners = $this->candidatePartner->find($id);
        $candidatePartners->photo = $photoName;
        $candidatePartners->update();

        return $candidatePartners;
    }

    public function uploadFile($file, $filePath)
    {
        $extension = $file->extension();
        $fileName = date('dmyHis') . '.' . $extension;
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

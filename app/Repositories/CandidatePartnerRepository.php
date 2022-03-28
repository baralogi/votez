<?php

namespace App\Repositories;

use App\Models\CandidatePartner;
use Illuminate\Support\Facades\Storage;

class CandidatePartnerRepository
{
    /**
     * @var CandidatePartner $candidatePartner
     */
    protected $candidatePartner;

    /**
     * CandidatePartnerRepository constructor.
     *
     * @param CandidatePartner $candidatePartner
     */
    public function __construct(CandidatePartner $candidatePartner)
    {
        $this->candidatePartner = $candidatePartner;
    }

    public function getById($id)
    {
        return $this->candidatePartner->where('id', $id)->first();
    }

    public function update($id, $data)
    {
        $candidatePartners = $this->candidatePartner->find($id);
        $candidatePartners->vision = $data['vision'];
        $candidatePartners->mission = $data['mission'];
        $candidatePartners->update();

        return $candidatePartners;
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

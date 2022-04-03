<?php

namespace App\Services;

use App\Repositories\CandidatePartnerRepository;
use App\Repositories\CandidateRepository;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CandidatePartnerService
{

    /**
     * @var CandidatePartnerRepository $candidatePartnerRepository
     */
    protected $candidatePartnerRepository;

    /**
     * CandidatePartnerService constructor.
     *
     * @param CandidatePartnerRepository $candidatePartnerRepository
     */
    public function __construct(CandidatePartnerRepository $candidatePartnerRepository)
    {
        $this->candidatePartnerRepository = $candidatePartnerRepository;
    }

    public function showCandidatePartnerById($id)
    {
        return $this->candidatePartnerRepository->getById($id);
    }

    public function showCandidatePartnerByVoting($votingId)
    {
        return $this->candidatePartnerRepository->getByVotingId($votingId);
    }

    public function updateCanditatePartnerData($id, $data)
    {
        DB::beginTransaction();
        try {
            $result = $this->candidatePartnerRepository->update($id, $data);
            DB::commit();
        } catch (Exception $error) {
            dd($error->getMessage());
            DB::rollback();
            Log::error($error->getMessage());
        }
        return $result;
    }

    public function updateCandidatePhoto($id, $data)
    {
        DB::beginTransaction();
        try {
            $candidatePartners = $this->candidatePartnerRepository->getById($id);
            $photo = $data['photo'];
            $photoName = $candidatePartners->photo;

            if (!empty($photo)) {
                Validator::make($data, [
                    'photo' => 'mimes:jpeg,jpg,png|max:2000'
                ])->validate();
                $photoName = $this->candidatePartnerRepository->uploadFile($data['photo'], '/images/photo');

                if ($photoName) {
                    $this->candidatePartnerRepository->removeFile($candidatePartners, '/images/photo/');
                }
            }

            $result = $this->candidatePartnerRepository->updateImage($id, $photoName);

            DB::commit();
            return $result;
        } catch (Exception $error) {
            DB::rollback();
            Log::error($error->getMessage());
        }
    }
}

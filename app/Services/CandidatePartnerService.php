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
}

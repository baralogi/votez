<?php

namespace App\Services;

use App\Repositories\CandidateRepository;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CandidateService
{

    /**
     * @var CandidateRepository $candidateRepository
     */
    protected $candidateRepository;

    /**
     * CandidateService constructor.
     *
     * @param CandidateRepository $candidateRepository
     */
    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function getCandidate($id)
    {
        return $this->candidateRepository->getByVotingId($id);
    }

    public function getCandidateById($votingId, $candidateId)
    {
        return $this->candidateRepository->getById($votingId, $candidateId);
    }

    public function getCandidateByPartner($votingId, $partnerId)
    {
        return $this->candidateRepository->getByPartner($votingId, $partnerId);
    }

    public function storeCandidate($data)
    {
        Validator::make($data, [
            'name' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'faculty' => 'required',
            'major' => 'required',
            'semester' => 'required',
            'ipk' => 'required',
            'sskm' => 'required',
        ])->validate();

        DB::beginTransaction();
        try {
            $result = $this->candidateRepository->store($data);

            DB::commit();
        } catch (Exception $error) {
            dd($error->getMessage());
            DB::rollback();
            Log::error($error->getMessage());
        }
        return $result;
    }

    public function storeVoting($data)
    {
        return $this->candidateRepository->store($data);
    }

    public function updateVoting($id, $data)
    {
        return $this->candidateRepository->update($id, $data);
    }

    public function destroyVoting($id)
    {
        return $this->candidateRepository->destroy($id);
    }
}

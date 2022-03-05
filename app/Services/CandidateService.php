<?php

namespace App\Services;

use App\Repositories\CandidateRepository;

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

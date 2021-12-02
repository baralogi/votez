<?php

namespace App\Services;

use App\Repositories\CandidateRepository;

class CandidateService
{

    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function getCandidate($id)
    {
        return $this->candidateRepository->getByVotingId($id);
    }

    public function getVotingById($id)
    {
        return $this->candidateRepository->getById($id);
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

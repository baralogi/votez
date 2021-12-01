<?php

namespace App\Services;

use App\Repositories\VotingRepository;

class VotingService
{

    public function __construct(VotingRepository $votingRepository)
    {
        $this->votingRepository = $votingRepository;
    }

    public function getVotings()
    {
        return $this->votingRepository->getAll();
    }

    public function getVotingById($id)
    {
        return $this->votingRepository->getById($id);
    }

    public function storeVoting($data)
    {
        return $this->votingRepository->store($data);
    }

    public function updateVoting($id, $data)
    {

        return $this->votingRepository->update($id, $data);
    }

    public function destroyVoting($id)
    {
        return $this->votingRepository->destroy($id);
    }
}

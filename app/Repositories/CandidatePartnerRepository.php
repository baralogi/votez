<?php

namespace App\Repositories;

use App\Models\CandidatePartner;

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
}

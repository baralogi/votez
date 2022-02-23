<?php

namespace App\Repositories;

use App\Models\Candidate;

class CandidateRepository
{

    protected $candidate;

    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    public function getByVotingId($id)
    {
        return $this->candidate->where('voting_id', $id)->with('voting')->get();
    }

    public function getById($votingId, $candidateId)
    {
        return $this->candidate->where('voting_id', $votingId)->where('id', $candidateId)->with('candidateFiles')->first();
    }

    public function store($data)
    {
        return $this->candidate->insert($data);
    }

    public function update($id, $data)
    {
        return $this->candidate->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $this->candidate->where('id', $id)->delete();
    }
}

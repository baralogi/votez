<?php

namespace App\Repositories;

use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;

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

    public function getByIdAndVotingId($votingId, $candidateId)
    {
        return $this->candidate->where('voting_id', $votingId)->where('id', $candidateId)->with('candidateFiles')->first();
    }

    public function getById($candidateId)
    {
        return $this->candidate->where('id', $candidateId)->first();
    }

    public function getByPartner($votingId, $partnerId)
    {
        return $this->candidate->where('voting_id', $votingId)->where('candidate_partner_id', $partnerId);
    }

    public function store($data)
    {
        $desc['nim'] = $data['nim'];
        $desc['email'] = $data['email'];
        $desc['phone'] = $data['phone'];
        $desc['sex'] = $data['sex'];
        $desc['address'] = $data['address'];
        $desc['birth_place'] = $data['birth_place'];
        $desc['birth_date'] = $data['birth_date'];
        $desc['faculty'] = $data['faculty'];
        $desc['major'] = $data['major'];
        $desc['semester'] = $data['semester'];
        $desc['ipk'] = $data['ipk'];
        $desc['sskm'] = $data['sskm'];

        $candidate = new $this->candidate;
        $candidate->voting_id = Auth::user()->candidate->voting->id;
        $candidate->candidate_partner_id = Auth::user()->candidate->candidate_partner_id;
        $candidate->name = $data['name'];
        $candidate->status = $this->candidate::VICE;
        $candidate->description = json_encode($desc);
        $candidate->save();

        return $candidate;
    }

    public function update($id, $data)
    {
        $desc['nim'] = $data['nim'];
        $desc['email'] = $data['email'];
        $desc['phone'] = $data['phone'];
        $desc['sex'] = $data['sex'];
        $desc['address'] = $data['address'];
        $desc['birth_place'] = $data['birth_place'];
        $desc['birth_date'] = $data['birth_date'];
        $desc['faculty'] = $data['faculty'];
        $desc['major'] = $data['major'];
        $desc['semester'] = $data['semester'];
        $desc['ipk'] = $data['ipk'];
        $desc['sskm'] = $data['sskm'];

        $candidates = $this->candidate->find($id);
        $candidates->name = $data['name'];
        $candidates->description = json_encode($desc);
        $candidates->update();

        return $candidates;
    }

    public function destroy($id)
    {
        $candidates = $this->candidate->find($id);
        $candidates->delete();

        return $candidates;
    }
}

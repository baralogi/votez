<?php

namespace App\Repositories;

use App\Models\Voting;

class VotingRepository
{

    protected $voting;

    public function __construct(Voting $voting)
    {
        $this->voting = $voting;
    }

    public function getAll()
    {
        return $this->voting->get();
    }

    public function getById($id)
    {
        return $this->voting->where('id', $id)->first();
    }

    public function store($data)
    {
        return $this->voting->insert($data);
    }

    public function update($id, $data)
    {
        return $this->voting->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $this->voting->where('id', $id)->delete();
    }
}

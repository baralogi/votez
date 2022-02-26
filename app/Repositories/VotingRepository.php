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
        return $this->voting;
    }

    public function getById($id)
    {
        return $this->voting->where('id', $id)->first();
    }

    public function getByOrganizationId($id)
    {
        return $this->voting->where('organization_id', $id);
    }

    public function store($data, $logoName)
    {
        $voting = new $this->voting;
        $voting->organization_id = $data['organization_id'];
        $voting->name = $data['name'];
        $voting->description = $data['description'];
        $voting->start_at = $data['start_at'];
        $voting->end_at = $data['end_at'];
        $voting->logo = $logoName;
        $voting->save();

        return $voting;
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

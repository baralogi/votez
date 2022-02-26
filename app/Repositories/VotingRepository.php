<?php

namespace App\Repositories;

use App\Models\Voting;
use Illuminate\Support\Facades\Storage;

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

    public function update($id, $data, $logoName)
    {
        $voting = $this->voting->find($id);
        $voting->name = $data['name'];
        $voting->description = $data['description'];
        $voting->start_at = $data['start_at'];
        $voting->end_at = $data['end_at'];
        $voting->logo = $logoName;
        $voting->update();

        return $voting;
    }

    public function destroy($id)
    {
        $voting = $this->voting->find($id);
        $voting->delete();

        return $voting;
    }

    public function uploadFile($file, $filePath)
    {
        $extension = $file->extension();
        $fileName = date('dmyHis') . '.' . $extension;
        Storage::putFileAs('public' . $filePath, $file, $fileName);

        return $fileName;
    }

    public function removeFile($fileName, $filePath)
    {
        $oldLogo = $fileName->logo;
        Storage::delete('public' . $filePath . $oldLogo);

        return $oldLogo;
    }
}

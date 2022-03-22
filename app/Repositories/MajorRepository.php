<?php

namespace App\Repositories;

use App\Models\Major;

class MajorRepository
{
    /**
     * @var Major $major
     */
    protected $major;

    /**
     * @param Major $major
     */
    public function __construct(Major $major)
    {
        $this->major = $major;
    }

    public function get()
    {
        return $this->major->all();
    }

    public function getById($id)
    {
        return $this->major->where('id', $id)->first();
    }

    public function getByFacultyId($id)
    {
        return $this->major->where('faculty_id', $id)->get();
    }
}

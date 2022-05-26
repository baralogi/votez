<?php

namespace App\Repositories\Eloquent;

use App\Models\Major;

class MajorRepository extends BaseRepository
{

    public function __construct(Major $model)
    {
        $this->model = $model;
    }

    public function list($facultyId)
    {
        return $this->model->where('faculty_id', $facultyId)->get();
    }
}

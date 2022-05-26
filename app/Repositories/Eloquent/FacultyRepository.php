<?php

namespace App\Repositories\Eloquent;

use App\Models\Faculty;

class FacultyRepository extends BaseRepository
{

    public function __construct(Faculty $model)
    {
        $this->model = $model;
    }

    public function list()
    {
        return $this->model->get();
    }
}

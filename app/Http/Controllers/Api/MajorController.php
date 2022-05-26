<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MajorResource;
use App\Models\Faculty;
use App\Repositories\Eloquent\MajorRepository;

class MajorController extends Controller
{
    private $repository;

    public function __construct(MajorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Faculty $faculty)
    {
        $majors = $this->repository->list($faculty->id);

        return MajorResource::collection($majors);
    }
}

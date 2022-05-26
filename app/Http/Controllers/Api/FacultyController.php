<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacultyResource;
use App\Repositories\Eloquent\FacultyRepository;

class FacultyController extends Controller
{
    private $repository;

    public function __construct(FacultyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $faculties = $this->repository->list();

        return FacultyResource::collection($faculties);
    }
}

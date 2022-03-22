<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacultyResource;
use App\Services\FacultyService;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * @var FacultyService $facultyService
     */
    protected $facultyService;

    /**
     * FacultyService constructor.
     *
     * @param FacultyService $facultyService
     */
    public function __construct(FacultyService $facultyService)
    {
        $this->facultyService = $facultyService;
    }

    public function index()
    {
        $faculties = $this->facultyService->listFaculty();

        return FacultyResource::collection($faculties);
    }
}

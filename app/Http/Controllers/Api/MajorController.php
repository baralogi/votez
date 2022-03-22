<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MajorResource;
use App\Models\Faculty;
use App\Services\MajorService;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * @var MajorService $majorService
     */
    protected $majorService;

    /**
     * MajorService constructor.
     *
     * @param MajorService $majorService
     */
    public function __construct(MajorService $majorService)
    {
        $this->majorService = $majorService;
    }

    public function index()
    {
        $majors = $this->majorService->listMajor();

        return MajorResource::collection($majors);
    }

    public function getByFacultyId(Faculty $faculty)
    {
        $majors = $this->majorService->getMajorByFacultyId($faculty->id);

        return MajorResource::collection($majors);
    }
}

<?php

namespace App\Services;

use App\Repositories\FacultyRepository;

class FacultyService
{
    /**
     * @var FacultyRepository $facultyRepository
     */
    protected $facultyRepository;

    /**
     * FacultyService constructor.
     *
     * @param FacultyRepository $facultyRepository
     */
    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
    }

    public function listFaculty()
    {
        return $this->facultyRepository->get();
    }
}

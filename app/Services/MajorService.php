<?php

namespace App\Services;

use App\Repositories\MajorRepository;

class MajorService
{
    /**
     * @var MajorRepository $majorRepository
     */
    protected $majorRepository;

    /**
     * MajorService constructor.
     *
     * @param MajorRepository $majorRepository
     */
    public function __construct(MajorRepository $majorRepository)
    {
        $this->majorRepository = $majorRepository;
    }

    public function listMajor()
    {
        return $this->majorRepository->get();
    }

    public function getMajorByid($id)
    {
        return $this->majorRepository->getById($id);
    }

    public function getMajorByFacultyId($id)
    {
        return $this->majorRepository->getByFacultyId($id);
    }
}

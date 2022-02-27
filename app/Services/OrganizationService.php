<?php

namespace App\Services;

use App\Repositories\OrganizationRepository;

class OrganizationService
{
    /**
     * @var OrganizationRepository $organizationRepository
     */
    protected $organizationRepository;

    /**
     * OrganizationService constructor.
     *
     * @param OrganizationRepository $organizationRepository
     */
    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function listAll()
    {
        return $this->organizationRepository->getAll();
    }
}

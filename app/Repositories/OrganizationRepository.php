<?php

namespace App\Repositories;

use App\Models\Organization;

class OrganizationRepository
{
    /**
     * @var Organization $organization
     */
    protected $organization;

    /**
     * OrganizationRepository constructor.
     *
     * @param Organization $organization
     */
    public function __construct(Organization $organization)
    {
        $this->organization = $organization;
    }

    public function getAll()
    {
        return $this->organization->get();
    }
}

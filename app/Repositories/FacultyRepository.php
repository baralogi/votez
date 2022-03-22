<?php

namespace App\Repositories;

use App\Models\Faculty;

class FacultyRepository
{
    /**
     * @var Faculty $faculty
     */
    protected $faculty;

    /**
     * @param Faculty $faculty
     */
    public function __construct(Faculty $faculty)
    {
        $this->faculty = $faculty;
    }

    public function get()
    {
        return $this->faculty->all();
    }
}

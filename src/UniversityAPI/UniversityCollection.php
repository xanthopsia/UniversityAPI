<?php

namespace UniversityAPI;

class UniversityCollection
{
    private array $universities = [];

    public function add(University $university)
    {
        $this->universities[] = $university;
    }

    public function getUniversities(): array
    {
        return $this->universities;
    }
}

<?php

namespace App\Repositories;

use App\Models\Experience;
use App\Repositories\BaseRepository;

class ExperienceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Experience::class;
    }
}

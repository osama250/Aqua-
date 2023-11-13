<?php

namespace App\Repositories;

use App\Models\Cabinfeature;
use App\Repositories\BaseRepository;

class CabinfeatureRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'photo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cabinfeature::class;
    }
}

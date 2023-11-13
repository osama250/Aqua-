<?php

namespace App\Repositories;

use App\Models\Cabin;
use App\Repositories\BaseRepository;

class CabinRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cabin::class;
    }
}

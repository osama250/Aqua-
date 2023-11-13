<?php

namespace App\Repositories;

use App\Models\Unique;
use App\Repositories\BaseRepository;

class UniqueRepository extends BaseRepository
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
        return Unique::class;
    }
}

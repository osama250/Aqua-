<?php

namespace App\Repositories;

use App\Models\Overview;
use App\Repositories\BaseRepository;

class OverviewRepository extends BaseRepository
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
        return Overview::class;
    }
}

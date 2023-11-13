<?php

namespace App\Repositories;

use App\Models\TripCategory;
use App\Repositories\BaseRepository;

class TripCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'photo',
        'map'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TripCategory::class;
    }
}

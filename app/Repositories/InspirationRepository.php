<?php

namespace App\Repositories;

use App\Models\Inspiration;
use App\Repositories\BaseRepository;

class InspirationRepository extends BaseRepository
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
        return Inspiration::class;
    }
}

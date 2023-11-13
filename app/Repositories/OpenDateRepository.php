<?php

namespace App\Repositories;

use App\Models\OpenDate;
use App\Repositories\BaseRepository;

class OpenDateRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'date'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return OpenDate::class;
    }
}

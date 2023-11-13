<?php

namespace App\Repositories;

use App\Models\Info;
use App\Repositories\BaseRepository;

class InfoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'key',
        'value'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Info::class;
    }
}

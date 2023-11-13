<?php

namespace App\Repositories;

use App\Models\meta;
use App\Repositories\BaseRepository;

class metaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return meta::class;
    }
}

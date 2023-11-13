<?php

namespace App\Repositories;

use App\Models\Condition;
use App\Repositories\BaseRepository;

class ConditionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Condition::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\EscapadeDetail;
use App\Repositories\BaseRepository;

class EscapadeDetailRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return EscapadeDetail::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\Escapade;
use App\Repositories\BaseRepository;

class EscapadeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Escapade::class;
    }
}

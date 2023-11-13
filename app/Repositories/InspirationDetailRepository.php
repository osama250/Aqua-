<?php

namespace App\Repositories;

use App\Models\InspirationDetail;
use App\Repositories\BaseRepository;

class InspirationDetailRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return InspirationDetail::class;
    }
}

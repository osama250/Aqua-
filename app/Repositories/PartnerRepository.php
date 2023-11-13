<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Repositories\BaseRepository;

class PartnerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'photo',
        'url'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Partner::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\AdditionalTrip;
use App\Repositories\BaseRepository;

class AdditionalTripRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'price',
        'img'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return AdditionalTrip::class;
    }
}

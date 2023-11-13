<?php

namespace App\Repositories;

use App\Models\Trip;
use App\Repositories\BaseRepository;

class TripRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'trip_category_id',
        'check_in',
        'check_out',
        'cabin_count',
        'suite_count',
        'cabin_available',
        'suite_available',
        'cabin_price',
        'suite_price',
        'single_cabin_price',
        'single_suite_price',
        'is_home'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Trip::class;
    }
}

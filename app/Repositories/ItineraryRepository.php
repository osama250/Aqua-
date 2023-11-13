<?php

namespace App\Repositories;

use App\Models\Itinerary;
use App\Repositories\BaseRepository;

class ItineraryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'trip_category_id',
        'day'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Itinerary::class;
    }
}

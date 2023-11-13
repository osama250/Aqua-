<?php

namespace App\Repositories;

use App\Models\ItineraryDetail;
use App\Repositories\BaseRepository;

class ItineraryDetailRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'itinerary_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ItineraryDetail::class;
    }
}

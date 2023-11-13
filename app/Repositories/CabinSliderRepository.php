<?php

namespace App\Repositories;

use App\Models\CabinSlider;
use App\Repositories\BaseRepository;

class CabinSliderRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'photo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CabinSlider::class;
    }
}

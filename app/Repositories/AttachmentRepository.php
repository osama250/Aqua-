<?php

namespace App\Repositories;

use App\Models\Attachment;
use App\Repositories\BaseRepository;

class AttachmentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'factsheet',
        'itinerary',
        'sightseeing'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Attachment::class;
    }
}

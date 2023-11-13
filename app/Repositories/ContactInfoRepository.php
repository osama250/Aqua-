<?php

namespace App\Repositories;

use App\Models\ContactInfo;
use App\Repositories\BaseRepository;

class ContactInfoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'qu1',
        'qr2',
        'phone'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ContactInfo::class;
    }
}

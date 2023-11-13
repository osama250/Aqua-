<?php

namespace App\Repositories;

use App\Models\Deck;
use App\Repositories\BaseRepository;

class DeckRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'file',
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Deck::class;
    }
}

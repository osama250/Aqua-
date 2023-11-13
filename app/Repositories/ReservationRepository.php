<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Repositories\BaseRepository;

class ReservationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'trip_id',
        'user_id',
        'price',
        'comment',
        'uuid',
        'status',
        'payment_res_code',
        'payment_res_msg',
        'payment_res_full'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Reservation::class;
    }
}

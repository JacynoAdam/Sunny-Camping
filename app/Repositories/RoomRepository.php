<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class RoomRepository extends BaseRepository
{
    public function getWithReservationsByService(int $serviceId)
    {
        return $this->model
            ->with('reservations')
            ->where('service_id', '=', $serviceId)
            ->get();
    }
}

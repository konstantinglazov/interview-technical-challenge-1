<?php

namespace App\Repositories\Interfaces;

use App\Models\ParkingSpot;
use Illuminate\Database\Eloquent\Collection;

interface ParkingSpotRepositoryInterface
{
    public function all(): Collection;

    public function findOneBy(ParkingSpot $parkingSpot);

    public function park(ParkingSpot $parkingSpot, array $vehicleDetails);

    public function unpark(ParkingSpot $parkingSpot);
}
